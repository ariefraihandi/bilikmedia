<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\Credit;
use App\Models\RequestDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
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
        
        $emailCount = RequestDownload::where('email', $user->email)->count();
        // Prepare data to be sent to the view
        $data = [
            'title' => 'Profile | Bilik Media',
            'user' => $user,
            'userDetail' => $userDetail,
            'emailCount' => $emailCount,
        ];

        return view('Dashboard.User.profile', $data);
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
}
