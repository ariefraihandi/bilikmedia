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

        // API endpoint for the TikTok downloader (godownloader)
        
        $apiUrl = "https://godownloader.com/api/tiktok-no-watermark-free?key=godownloader.com&url=" . urlencode($url) ;
        
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
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
