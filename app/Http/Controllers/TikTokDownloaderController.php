<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TikTokDownloaderController extends Controller
{
    public function download(Request $request)
    {
        // Ambil URL TikTok dari request
        $url = $request->input('url');

        // Validasi apakah URL ada
        if (!$url) {
            return response()->json(['error' => 'URL TikTok diperlukan'], 400);
        }

        // API endpoint for the TikTok downloader (this is a locally hosted service from the TikTok-Downloader project)
        $apiUrl = "http://localhost:3000/api/tiktok"; // Assuming TikTok-Downloader runs on localhost:3000

        // Konfigurasi cURL untuk memanggil API TikTok Downloader lokal
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query(['url' => $url]),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded',
            ],
        ]);

        // Execute cURL request
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);

        curl_close($curl);

        // Handle cURL response
        if ($err) {
            return response()->json(['error' => "cURL Error: " . $err], 500);
        } else {
            // Check HTTP response code
            if ($httpCode == 200) {
                $responseData = json_decode($response, true);
                return response()->json($responseData);
            } else {
                return response()->json([
                    'error' => 'Gagal mendapatkan data dari API',
                    'status' => $httpCode,
                    'response' => $response
                ], 500);
            }
        }
    }
}
