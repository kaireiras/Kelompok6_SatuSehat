<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SatuSehatController extends Controller
{
    /**
     * Mendapatkan access token dari SATUSEHAT
     */
    public function getAccessToken()
    {
        // Parameter dari environment variables
        $authUrl = env('SATUSEHAT_AUTH_URL', 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken?grant_type=client_credentials');
        $clientId = env('SATUSEHAT_CLIENT_ID');
        $clientSecret = env('SATUSEHAT_CLIENT_SECRET');

        if (!$clientId || !$clientSecret) {
            return response()->json([
                'success' => false,
                'message' => 'Client ID atau Client Secret SATUSEHAT belum dikonfigurasi di .env'
            ], 500);
        }

        try {
            // Mengirimkan request POST (Form URL Encoded) sesuai standar OAuth2
            $response = Http::asForm()->post($authUrl, [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
            ]);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'data' => $response->json()
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Gagal mendapatkan token',
                'error' => $response->json()
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
