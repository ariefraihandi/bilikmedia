<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credit; 
use App\Models\UserDetail;
use App\Models\User;
use App\Models\Refferal;
use App\Models\AdCredit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CreditController extends Controller
{

    public function showCredit()
    {
        $user = Auth::user();
        $userDetail = $user->userDetail;

        // Cek apakah user memiliki referral
        $isReferred = Refferal::where('user_id', $user->id)->exists();

        // Inisialisasi referral code dengan null
        $reffCode = null;

        // Jika user memiliki referral, ambil referral code
        if ($isReferred) {
            $reffCode = Refferal::where('user_id', $user->id)->value('refferal_code');
        }

        // Update credit yang telah expired
        Credit::where('user_id', $user->id)
            ->where('is_expires', true)
            ->where('expires_at', '<', now())
            ->update(['credit_amount' => 0]);

        // Ambil data credit
        $dailyCredits = Credit::where('user_id', $user->id)
            ->where('credit_type', 'daily')
            ->get();
        $shareCredits = Credit::where('user_id', $user->id)
            ->where('credit_type', 'share')
            ->get();
        $adCredits = Credit::where('user_id', $user->id)
            ->where('credit_type', 'ad')
            ->get();
        $credits = Credit::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(100)
            ->paginate(10);

        // Hitung total kredit reff
        $totalReffCredits = Credit::where('user_id', $user->id)
            ->where('credit_type', 'reff')
            ->sum('credit_amount'); // Menghitung total jumlah kredit dari tipe reff

        // Data untuk dikirim ke view
        $data = [
            'title' => 'Credit | Bilik Media',
            'user' => $user,
            'userDetail' => $userDetail,
            'dailyCredits' => $dailyCredits,
            'shareCredits' => $shareCredits,
            'adCredits' => $adCredits,
            'credits' => $credits,
            'isReferred' => $isReferred,
            'reffCode' => $reffCode,  // Mengirim referral code ke view jika ada
            'totalReffCredits' => $totalReffCredits,  // Mengirim total kredit reff ke view
        ];

        return view('Dashboard.Credit.index', $data);
    }


    public function showCreditRedemtion()
    {

        $user           = Auth::user();
        $userDetail     = $user->userDetail;

        $data = [
            'title'         => 'Credit Redemption | Bilik Media',
            'user'          => $user,
            'userDetail'    => $userDetail,           
        ];

        // Kembalikan view dengan data total kredit
        return view('Dashboard.Credit.redemtion', $data);
    }

    public function claimDailyCredit(Request $request) 
    {
        $user = Auth::user();

        // Check if the user has already claimed their daily credit today
        $alreadyClaimed = Credit::where('user_id', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->where('credit_type', 'daily')
            ->exists();

        if ($alreadyClaimed) {
            return response()->json(['error' => 'You have already claimed your daily credit today.'], 400);
        }

        $expiresAt = now()->setTime(23, 59);

        // Create the new credit entry for daily credit
        Credit::create([
            'uuid' => (string) Str::uuid(),
            'user_id' => $user->id,
            'credit_amount' => 1, // You can modify this amount as needed
            'credit_type' => 'daily',
            'is_expires' => true,
            'expires_at' => $expiresAt,
        ]);

        // Get the updated total daily credits
        $totalDailyCredits = Credit::where('user_id', $user->id)
            ->where('credit_type', 'daily')
            ->sum('credit_amount');

        // Get the updated total credit amount from all types
        $totalCredits = Credit::where('user_id', $user->id)->sum('credit_amount');

        // Update the user's total credit in the UserDetail table
        $userDetail = UserDetail::where('user_id', $user->id)->first();
        if ($userDetail) {
            $userDetail->kredit = $totalCredits;
            $userDetail->save();
        }

        return response()->json([
            'success' => 'Daily credit successfully claimed!',
            'totalDailyCredits' => $totalDailyCredits,
            'totalCredits' => $totalCredits
        ], 200);
    }

    public function claimSharingCredit(Request $request)
    {
        $user = Auth::user();

        sleep(rand(10, 15));

        $isShareDetected = rand(0, 1) === 1;

        if (!$isShareDetected) {
            return response()->json(['error' => 'Sharing failed to detect, please try sharing again.'], 400);
        }

        // Check if the user has already claimed their sharing credit today
        $alreadyClaimed = Credit::where('user_id', $user->id)
            ->whereDate('created_at', now()->toDateString())
            ->where('credit_type', 'share')
            ->exists();

        if ($alreadyClaimed) {
            return response()->json(['error' => 'You have already claimed your sharing credit today.'], 400);
        }

        $creditAmount = 1; // Example amount of credit for sharing
        Credit::create([
            'uuid' => (string) Str::uuid(),
            'user_id' => $user->id,
            'credit_amount' => $creditAmount,
            'credit_type' => 'share',
            'is_expires' => false,
            'expires_at' => null,
        ]);

        // Get the updated total credit amount for sharing
        $totalShareCredits = Credit::where('user_id', $user->id)
            ->where('credit_type', 'share')
            ->sum('credit_amount');

        // Get the updated total credit amount from all types for the user
        $totalCredits = Credit::where('user_id', $user->id)->sum('credit_amount');

        // Optionally update the UserDetail model if needed
        $userDetail = $user->userDetail;
        if ($userDetail) {
            $userDetail->kredit = $totalCredits;
            $userDetail->save();
        }

        return response()->json([
            'success' => 'Sharing credit successfully claimed!',
            'totalShareCredits' => $totalShareCredits,
            'totalCredits' => $totalCredits
        ], 200);
    }

    public function claimCodeCredit(Request $request)
    {
        $user = Auth::user();
        $redeemCode = $request->input('code');

        // Cek apakah ada AdCredit yang sesuai dengan kode redeem dan belum di-redeem
        $adCredit = AdCredit::where('user_id', $user->id)
            ->where('redeem_code', $redeemCode)
            ->where('is_redeemed', false)
            ->first();

        // Jika tidak ada kode yang valid
        if (!$adCredit) {
            return response()->json(['error' => 'Invalid or already redeemed code.'], 400);
        }

        // Jika kode valid, redeem kode dan tambahkan kredit
        $creditAmount = 1; // Contoh jumlah kredit yang didapat dari iklan
        $adCredit->is_redeemed = true; // Tandai kode sebagai sudah di-redeem
        $adCredit->save();

        // Tambahkan histori kredit untuk tipe ad
        Credit::create([
            'uuid' => (string) Str::uuid(),
            'user_id' => $user->id,
            'credit_amount' => $creditAmount,
            'credit_type' => 'ad', // Tipe ad
            'is_expires' => false,
            'expires_at' => null,
        ]);

        // Hitung total kredit untuk tipe ad
        $totalAdsCredits = Credit::where('user_id', $user->id)
            ->where('credit_type', 'ad')
            ->sum('credit_amount');

        // Hitung total kredit dari semua tipe untuk pengguna
        $totalCredits = Credit::where('user_id', $user->id)->sum('credit_amount');

        // Update UserDetail jika perlu
        $userDetail = $user->userDetail;
        if ($userDetail) {
            $userDetail->kredit = $totalCredits;
            $userDetail->save();
        }

        return response()->json([
            'success' => 'Ad credit successfully claimed!',
            'totalAdsCredits' => $totalAdsCredits,
            'totalCredits' => $totalCredits
        ], 200);
    }

    public function claimRefferal(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Temukan user berdasarkan ID yang diterima (user yang dirujuk)
        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        // Hitung jumlah kredit yang sudah digunakan oleh user yang dirujuk
        $creditCount = Credit::where('user_id', $user->id)
            ->where('credit_amount', 0)
            ->count();
        
        // Jika kredit yang digunakan >= 10, proses klaim
        if ($creditCount >= 10) {
            // Tambahkan 5 kredit baru untuk user yang dirujuk
           

            $userDetail = $user->userDetail;  // Ambil user detail dari user yang dirujuk
            if ($userDetail) {
                $userDetail->is_claimed = 1;  // Ubah kolom is_claimed menjadi 1
                $userDetail->save();  // Simpan perubahan ke database
            }

            // Untuk Auth user (user yang sedang login), hitung total kredit
            $authUser = Auth::user();
            $authUserDetail = $authUser->userDetail;  // Ambil user detail dari Auth user
            
            if ($authUserDetail) {              
                Credit::create([
                    'uuid' => (string) Str::uuid(),       // Generate UUID baru
                    'user_id' => $authUserDetail->user_id,               // ID user yang dirujuk
                    'credit_amount' => 5,                 // Menambahkan 5 kredit
                    'credit_type' => 'reff',              // Jenis kredit dari referral
                    'is_expires' => false,                // Kredit tidak memiliki waktu expired
                    'expires_at' => null,                 // Tidak ada expired date
                ]);  
                $totalCredits = Credit::where('user_id', $authUser->id)->sum('credit_amount');
                
                $authUserDetail->kredit = $totalCredits;
                $authUserDetail->save(); 
            }

            return response()->json([
                'success' => true,
                'message' => 'Referral claim successfully processed. 5 credits added for referred user, total credits updated for authenticated user.',
            ]);
        }

        // Jika kurang dari 10 credit dengan amount = 0, klaim gagal
        return response()->json([
            'success' => false,
            'message' => 'The user has not used 10 credits yet.',
        ], 400);
    }



    public function generateReff(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();  // Pastikan ini adalah ID integer dari tabel users
    
        // Generate referral code dan UUID di controller
        $uuid = (string) Str::uuid();  // Generate UUID
        $referralCode = strtoupper(Str::random(10));  // Generate referral code acak
        $existingReferral = Refferal::where('user_id', $user->id)->first();
        
        if ($existingReferral) {
            return response()->json([
                'success' => false,
                'message' => 'You have already generated a referral code.',
                'refferal_code' => $existingReferral->refferal_code
            ], 400);  // Mengembalikan pesan bahwa referral code sudah ada
        }
        
        // Simpan ke database
        $referral = new Refferal();
        $referral->user_id = $user->id;  // Menggunakan ID integer dari user yang sedang login
        $referral->refferal_code = $referralCode;  // Referral code yang di-generate
        $referral->uuid = $uuid;  // UUID yang dihasilkan di controller
        $referral->save();
    
        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Referral code successfully generated.',
            'refferal_code' => $referral->refferal_code,
            'uuid' => $referral->uuid  // Mengembalikan UUID juga jika diperlukan
        ]);
    }
        

    public function storeAdTokens(Request $request)
    {
        $user = Auth::user();

        // Cari entri terakhir yang belum di-redeem
        $lastUnredeemedAdCredit = AdCredit::where('user_id', $user->id)
            ->where('is_redeemed', 0)
            ->orderBy('created_at', 'desc')
            ->first();

        // Jika ada entri yang belum di-redeem, kembalikan token_1 dari entri tersebut
        if ($lastUnredeemedAdCredit) {
            return response()->json([
                'success' => 'You still have a pending redeemable code!',
                'token_1' => $lastUnredeemedAdCredit->token_1 // Return token_1 of the unredeemed entry
            ], 200);
        }

        // Cek AdCredit terakhir berdasarkan user_id untuk membatasi waktu 5 menit
        $lastAdCredit = AdCredit::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($lastAdCredit) {
            $lastAdWatchTime = Carbon::parse($lastAdCredit->created_at);
            $currentTime = Carbon::now();

            // Hitung selisih waktu dalam menit
            $differenceInMinutes = $lastAdWatchTime->diffInMinutes($currentTime);

            // Jika selisih waktunya kurang dari 5 menit, kembalikan respon menunggu
            if ($differenceInMinutes < 0) {
                return response()->json([
                    'status' => 'attention',
                    'message' => 'Please wait ' . ceil(5 - $differenceInMinutes) . ' more minutes to claim your next reward with ads.'
                ], 429); // 429 Too Many Requests
            }
        }

        // Jika sudah lebih dari 5 menit, buat entri AdCredit baru
        $adCredit = AdCredit::create([
            'user_id' => $user->id,
            'redeem_code' => $request->input('redeem_code'),
            'token_1' => $request->input('tokens')[0],
            'token_2' => $request->input('tokens')[1],
            'token_3' => $request->input('tokens')[2],
            'token_4' => $request->input('tokens')[3],
            'token_5' => $request->input('tokens')[4],
            'is_redeemed' => false
        ]);

        // Kembalikan token_1 dari entri baru yang berhasil dibuat
        return response()->json([
            'success' => 'Tokens and redeem code successfully stored!',
            'token_1' => $adCredit->token_1 // Return token_1 to the front end
        ], 200);
    }


}
