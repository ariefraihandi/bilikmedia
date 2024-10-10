<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credit; 
use App\Models\UserDetail;
use App\Models\AdCredit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CreditController extends Controller
{

    public function showCredit()
    {
        $user           = Auth::user();
        $userDetail     = $user->userDetail;

        Credit::where('user_id', $user->id)->where('is_expires', true)->where('expires_at', '<', now())->update(['credit_amount' => 0]);
       
        $dailyCredits       = Credit::where('user_id', $user->id)->where('credit_type', 'daily')->get();
        $shareCredits       = Credit::where('user_id', $user->id)->where('credit_type', 'share')->get();
        $adCredits          = Credit::where('user_id', $user->id)->where('credit_type', 'ad')->get();
        $credits            = Credit::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(100)->paginate(10);


        $data = [
            'title'         => 'Credit | Bilik Media',
            'user'          => $user,
            'userDetail'    => $userDetail,
            'dailyCredits'  => $dailyCredits,
            'shareCredits'  => $shareCredits,
            'adCredits'     => $adCredits,
            'credits'       => $credits,
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

        // Delay the process to simulate waiting for the user to complete sharing (random between 15 to 25 seconds)
        sleep(rand(10, 15));

        // Randomly determine if the sharing is detected or not (50% chance)
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
            if ($differenceInMinutes < 5) {
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
