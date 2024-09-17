<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        $data = [
            'title' => 'Welcome'
        ];
            
        return view('Auth.register', $data);
    }
    
    public function showLoginForm()
    {
        $data = [
            'title' => 'Welcome'
        ];
            
        return view('Auth.login', $data);
    }
    
    public function register(Request $request)
    {
        // Validasi input pengguna
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            // Ambil pesan error dari validasi
            $errors = $validator->errors()->all();

            // Gabungkan error menjadi satu string
            $errorMessage = implode('<br>', $errors);

            // Tampilkan SweetAlert error
            Alert::error('Registration Failed', $errorMessage);

            // Redirect kembali ke halaman register dengan input lama
            return redirect()->back()->withInput();
        }

        // Buat user baru jika validasi sukses
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Tampilkan SweetAlert sukses
        Alert::success('Registration Successful', 'You have registered successfully! Please login.');

        // Redirect ke form login
        return redirect()->route('showLoginForm');
    }

    public function login(Request $request)
    {
        // Validasi input pengguna
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek apakah kredensial sesuai
        if (Auth::attempt($credentials, $request->remember)) {
            // Jika berhasil login
            Alert::success('Login Successful', 'Welcome back!');
            
            // Redirect ke URL yang dimaksud atau ke dashboard jika tidak ada URL tujuan
            return redirect()->intended(route('showDashboard'));
        } else {
            // Jika gagal login
            Alert::error('Login Failed', 'Invalid email or password.');
            return redirect()->back()->withInput();
        }
    }

    // Logout user
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
