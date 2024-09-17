<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function showDashboard()
    {
        // Data yang ingin dikirim ke view dashboard
        $data = [
            'title' => 'Dashboard',
            'message' => 'Welcome to your dashboard!',
        ];

        // Menampilkan view dashboard dengan data
        return view('Dashboard.dashboard', $data);
    }
}
