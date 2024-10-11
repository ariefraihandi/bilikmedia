<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\Credit;
use App\Models\RequestDownload;
use App\Models\Refferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\IncompleteProfileNotification;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();        
        $userDetail = $user->userDetail;

        if ($userDetail) {
            Credit::where('user_id', $user->id)
                ->where('is_expires', true)
                ->where('expires_at', '<', now())
                ->update(['credit_amount' => 0]);

            $totalCredit = Credit::where('user_id', $user->id)
                ->sum('credit_amount');

            // Update the credit amount in userDetail
            $userDetail->kredit = $totalCredit;
            $userDetail->save();
        }

        // Ambil referral code dari tabel Refferal
        $refferalCode = Refferal::where('user_id', $user->id)->value('refferal_code');

        // Hitung jumlah user yang direferensikan berdasarkan refcode
        $reffCount = 0; // Default value

        if ($refferalCode) {
            $reffCount = User::where('reffered_by', $refferalCode)->count();
        }

        // Hitung jumlah email download requests
        $emailCount = RequestDownload::where('email', $user->email)->count();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title'         => 'Profile | Bilik Media',
            'user'          => $user,
            'userDetail'    => $userDetail,
            'emailCount'    => $emailCount,
            'reffCount'     => $reffCount, // Kirim jumlah referral ke view
        ];

        return view('Dashboard.User.profile', $data);
    }

    public function showUserList()
    {        
        $users = User::all();
        $user = Auth::user();        
        $userDetail = $user->userDetail;

        // Perform credit operations only if userDetail exists
        if ($userDetail) {
            Credit::where('user_id', $user->id)
                ->where('is_expires', true)
                ->where('expires_at', '<', now())
                ->update(['credit_amount' => 0]);

            // Recalculate the total credit after updates
            $totalCredit = Credit::where('user_id', $user->id)
                ->sum('credit_amount');

            // Update the credit amount in userDetail
            $userDetail->kredit = $totalCredit;
            $userDetail->save();
        }

        $countUsersToday        = User::whereDate('created_at', Carbon::today())->count();
        $countUsersThisWeek     = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $countUsersThisMonth    = User::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        
        $data = [
            'title'             => 'User List | Bilik Media',
            'user'              => $user,
            'userDetail'        => $userDetail,         
            'usersToday'        => $countUsersToday,
            'usersThisWeek'     => $countUsersThisWeek,
            'usersThisMonth'    => $countUsersThisMonth,   
        ];

        return view('Dashboard.User.userList', $data);
    }

    
    public function showReffList()
    {
        $user = Auth::user();        
        $userDetail = $user->userDetail;
    
        // Jika ada userDetail, hitung dan update kredit
        if ($userDetail) {
            Credit::where('user_id', $user->id)
                ->where('is_expires', true)
                ->where('expires_at', '<', now())
                ->update(['credit_amount' => 0]);
    
            $totalCredit = Credit::where('user_id', $user->id)
                ->sum('credit_amount');
    
            // Update jumlah kredit di userDetail
            $userDetail->kredit = $totalCredit;
            $userDetail->save();
        }
    
        $refferalCode = null;
        
        // Pastikan $referredUsers didefinisikan sebagai koleksi kosong
        $referredUsers = collect();
    
        // Cek apakah user memiliki refferal
        $isReferred = Refferal::where('user_id', $user->id)->exists();
        if ($isReferred) {
            $refferalCode = Refferal::where('user_id', $user->id)->value('refferal_code');
            
            // Ambil data referredUsers hanya jika ada referral code
            if ($refferalCode) {
                $referredUsers = User::where('reffered_by', $refferalCode)->paginate(10); 
            }
        }
    
        $data = [
            'title'         => 'Referral List',
            'user'          => $user,
            'userDetail'    => $userDetail,
            'referredUsers' => $referredUsers,
        ];
    
        return view('Dashboard.User.refferalList', $data);
    }
    

    
    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
    
        // Mulai transaksi
     
        DB::beginTransaction();
    
        try {
            $userDetail = auth()->user()->userDetail;
            if ($userDetail) {
                $userDetail->name = $request->input('name');
                $userDetail->phone = $request->input('phone');
                $userDetail->save();

                Alert::success('Profile Updated', 'Your profile has been updated successfully.');
            } else {
                $userDetail = UserDetail::create([
                    'user_id' => auth()->user()->id,
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'kredit' => 1, 
                ]);
                
                $expiresAt = now()->setTime(23, 59); 
                Credit::create([
                    'uuid' => (string) Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'credit_amount' => 1,
                    'credit_type' => 'daily',
                    'is_expires' => true,
                    'expires_at' => $expiresAt,
                ]);
    
                Alert::success('Profile Info Complete', 'Congratulations on your first credit!');
            }
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
    
            Alert::error('Error', 'There was an error updating your profile. Please try again.');
    
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    
        return redirect()->back();
    }

    public function getUsersForDataTables(Request $request)
    {
        // Query untuk mendapatkan data user dan userDetail dengan eager loading
        $users = User::with('userDetail');

        return DataTables::of($users)
            ->addColumn('user', function($user) {
                // Gabungkan name, phone, dan email dalam satu kolom
                $name = $user->userDetail->name ?? 'No Name';
                $phone = $user->userDetail->phone ?? 'No Phone';
                $email = $user->email;
                return "{$name}<br>{$phone}<br>{$email}";
            })
            ->addColumn('status', function($user) {
                // Tambahkan badge tambahan untuk status "Complete" atau "Incomplete"
                $statusBadge = $user->status == 1 
                    ? '<span class="badge bg-success">Aktif</span>' 
                    : '<span class="badge bg-warning">Inactive</span>';

                // Cek apakah userDetail tersedia (Complete/Incomplete)
                $completionBadge = $user->userDetail 
                    ? '<span class="badge bg-success">Complete</span>' 
                    : '<span class="badge bg-warning">Incomplete</span>';
                return "{$statusBadge}<br><br>{$completionBadge}";
            })
            ->addColumn('kredit', function($user) {
                return $user->userDetail->kredit ?? 'No Credit'; // Menampilkan kredit user
            })
            ->addColumn('download_count', function($user) {
                // Hitung jumlah request download berdasarkan email user
                return RequestDownload::where('email', $user->email)->count();
            })
            ->addColumn('since', function($user) {
                // Menampilkan created_at dalam format readable
                return Carbon::parse($user->created_at)->format('d M Y');
            })
            ->rawColumns(['user', 'status']) // Agar HTML badge dan br bisa diproses
            ->make(true);
    }

    public function notifyIncomplete(Request $request)
    {
        // Proses notifikasi berdasarkan user_id
        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Kirim email menggunakan Mailable class
        try {
            Mail::to($user->email)->send(new IncompleteProfileNotification($user));

            return response()->json(['message' => 'Notification sent successfully and email has been sent.']);
        } catch (\Exception $e) {
            // Kirimkan pesan error spesifik dari exception
            return response()->json(['error' => 'Failed to send email: ' . $e->getMessage()], 500);
        }
    }
}
