<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the ads.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all(); // Mengambil semua data ads
        return view('ads.index', compact('ads')); // Menampilkan view dengan semua ads
    }

    /**
     * Show the form for creating a new ad.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create'); // Menampilkan form untuk membuat ad baru
    }
  
    public function adsStore(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
        ]);
    
        // Membuat ad baru
        Ad::create($validatedData);
    
        // Menampilkan SweetAlert success dan redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Ad created successfully!');
    }
    

    /**
     * Display the specified ad.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad')); // Menampilkan detail ad tertentu
    }

    /**
     * Show the form for editing the specified ad.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('ads.edit', compact('ad')); // Menampilkan form edit untuk ad tertentu
    }

    /**
     * Update the specified ad in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
        ]);

        // Update ad yang ada
        $ad->update($validatedData);

        // Redirect kembali ke halaman index ads
        return redirect()->route('ads.index')->with('success', 'Ad updated successfully!');
    }

    /**
     * Remove the specified ad from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete(); // Menghapus ad
        return redirect()->route('ads.index')->with('success', 'Ad deleted successfully!');
    }
}
