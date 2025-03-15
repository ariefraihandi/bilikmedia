<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Credit;
use Illuminate\Http\Request;
use App\Models\LandingPage;
use Illuminate\Support\Str;
use App\Models\Ad;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function showAddUrl()
    {
        $user           = Auth::user(); 
        $userDetail     = $user->userDetail;
        
        $LandingPage    = LandingPage::all();

        if ($user->role != 1) {
            Alert::error('Error', 'Forbidden Access.');           
            return redirect()->route('user.profile');
        }

        Credit::where('user_id', $user->id)->where('is_expires', true)->where('expires_at', '<', now())->update(['credit_amount' => 0]);

        $data = [
            'title'         => 'Add Url | Bilik Media',
            'user'          => $user,
            'userDetail'    => $userDetail,
            'LandingPage'   => $LandingPage,
         
        ];
        
        return view('Dashboard.Landing.addUrl', $data);
    }

    public function storeUrl(Request $request)
    {        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'target_url' => 'nullable|url',
        ]);
    
        // Generate random file name
        $imageName = Str::random(5) . '.' . $request->file('thumbnail')->getClientOriginalExtension(); // Nama file acak
    
        // Pindahkan gambar ke folder yang ditentukan (public/assets/images/pages)
        $request->file('thumbnail')->move(public_path('assets/images/pages'), $imageName); // Simpan file ke folder yang ditentukan
        
        // Generate slug otomatis
        $slug = Str::slug($request->input('title'));
    
        // Generate kode acak 5 karakter
        $code = Str::random(5);
    
        // Menyimpan data ke database dengan nama file saja (bukan path lengkap)
        LandingPage::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'thumbnail' => $imageName, // Menyimpan hanya nama file
            'target_url' => $validatedData['target_url'],
            'code' => $code,
            'slug' => $slug,
        ]);
    
        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('show.add.url')->with('success', 'Landing Page created successfully!');
    }
    

    public function showLandOne($code)
    {
        // Mencari landing page berdasarkan kode
        $landingPage = LandingPage::where('code', $code)->first();

        // Jika tidak ditemukan, tampilkan halaman 404
        if (!$landingPage) {
            return abort(404, 'Landing Page not found');
        }

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title'         => 'Nonton ' . $landingPage->title, 
            'landingPage'   => $landingPage,     
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
        ];

        return view('LandingPages.landOne', $data);
    }
    
    public function showLandTwo($code)
    {
        // Mencari landing page berdasarkan kode
        $landingPage = LandingPage::where('code', $code)->first();

        // Jika tidak ditemukan, tampilkan halaman 404
        if (!$landingPage) {
            return abort(404, 'Landing Page not found');
        }

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title'         => 'Nonton ' . $landingPage->title, 
            'landingPage'   => $landingPage,     
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
        ];

        return view('LandingPages.landTwo', $data);
    }
    

}
