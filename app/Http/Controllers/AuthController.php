<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\EmailVerifiedToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function showRegisterForm(Request $request)
    {
        // Cek apakah ada query parameter reff (atau invitedby)
        if ($request->has('reff')) {
            // Simpan reff di session
            session(['reff' => $request->query('reff')]);
        }
    
        // Ambil reff dari session jika ada, atau set null jika tidak ada
        $reff = session('reff', null);
    
        // Kirim data ke view
        $data = [
            'title' => 'Registration | Bilik Media',
            'reff' => $reff // Kirim reff ke view
        ];
            
        return view('Auth.register', $data);
    }
    
    public function showLoginForm()
    {
        $data = [
            'title' => 'Login | Bilik Media',
        ];
            
        return view('Auth.login', $data);
    }
    
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username'  => 'required|string|max:255|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
            'reff'      => 'nullable|string|max:255', // Reff adalah opsional
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = implode('& ', $errors);
            Alert::error('Registration Failed', $errorMessage);
            return redirect()->back()->withInput();
        }
        

        DB::beginTransaction();

        try {
            
            $refferedBy = $request->input('reff');
        
            if (empty($refferedBy)) {
                $refferedBy = session('reff', 'AJO9KSKKXH'); 
            }

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2, 
                'status' => 0,
                'reffered_by' => $refferedBy,
            ]);
        
            $verificationToken = Str::random(60);

            EmailVerifiedToken::create([
                'email' => $user->email,
                'token' => $verificationToken,
            ]);      

            $encryptedData = Crypt::encryptString("email={$user->email}&token={$verificationToken}");

            // Generate link verifikasi
            $verificationUrl = route('verify-email', ['data' => $encryptedData]);

            // Kirim email verifikasi
            Mail::send('emails.verify', [
                'username' => $user->username,
                'verificationUrl' => $verificationUrl,
            ], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Verify Your Email Address');
            });

            // Jika pengiriman email berhasil, komit perubahan
            DB::commit();

            // Tampilkan SweetAlert sukses
            Alert::success('Registration Successful', 'Check your email to verify your account.');

            // Redirect ke form login
            return redirect()->route('showLoginForm');

        } catch (\Exception $e) {
            // Jika ada kesalahan (termasuk gagal kirim email), rollback semua perubahan
            DB::rollBack();

            // Ambil pesan error spesifik
            $errorMessage = $e->getMessage();
            
            // Tampilkan pesan error beserta detail errornya
            Alert::error('Registration Failed', "An error occurred: $errorMessage");

            // Log the error for debugging
            \Log::error('Registration failed: ', ['error' => $e]);

            // Kembalikan ke form register dengan input lama
            return redirect()->back()->withInput();
        }
    }

    

    public function login(Request $request)
    {
        // Validasi input pengguna
        $credentials = $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah input berupa email atau username
        $fieldType = filter_var($request->identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Coba login berdasarkan email atau username
        if (Auth::attempt([$fieldType => $request->identifier, 'password' => $request->password], $request->remember)) {
            $user = Auth::user();

            if ($user->status == 0) {
                // Logout user karena akun belum diverifikasi
                Auth::logout();

                // Tampilkan SweetAlert gagal login dengan pesan verifikasi
                Alert::error('Account Not Verified', 'Your account has not been verified yet. Please check your email for verification instructions.');

                // Redirect kembali ke halaman login
                return redirect()->back()->withInput();
            }

            // Cek apakah user memiliki data di tabel user_details
            $userDetail = UserDetail::where('user_id', $user->id)->first();

            if (!$userDetail) {
                // Jika data user_id tidak ada di tabel user_details
                Alert::success('Login Successful', 'Please complete your personal information to get your first credit.');

                // Redirect ke halaman untuk melengkapi informasi pribadi
                return redirect()->route('user.profile');
            }
            
            Alert::success('Login Successful', 'Welcome back!');
            
            return redirect()->intended(route('user.profile'));
        } else {            
            Alert::error('Login Failed', 'Invalid username/email or password.');
            return redirect()->back()->withInput();
        }
    }


    public function verify(Request $request)
    {
        // Dekripsi data dari URL
        try {
            $decryptedData = Crypt::decryptString($request->data);
        } catch (\Exception $e) {
            return redirect()->route('showLoginForm')->withErrors('Invalid verification link.');
        }

        // Parse decrypted data
        parse_str($decryptedData, $data);

        // Ambil token dan email
        $email = $data['email'] ?? null;
        $token = $data['token'] ?? null;

        // Validasi token dan email
        $verification = EmailVerifiedToken::where('email', $email)->where('token', $token)->first();

        if (!$verification) {
            // Jika token tidak valid atau expired
            Alert::error('Verification Error', 'Invalid or expired verification token.');
            return redirect()->route('showLoginForm');
        }

        // Update status user menjadi verified
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->status = 1; // Set user status menjadi aktif
            $user->email_verified_at = now(); // Simpan waktu verifikasi
            $user->save();

            // Hapus token verifikasi setelah berhasil
            $verification->delete();

            // Redirect ke halaman login dengan pesan sukses
            Alert::success('Verification Successful', 'Your email has been verified. Please login.');
            return redirect()->route('showLoginForm');
        }

        // Jika user tidak ditemukan
        Alert::error('Verification Error', 'User not found.');
        return redirect()->route('showLoginForm');
    }

    // Logout userasas
    public function logout(Request $request)
    {
        // Logout pengguna
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate session token
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lain
        return redirect()->route('showLoginForm')->with('success', 'You have been logged out successfully.');
    }
}
