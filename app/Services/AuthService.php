<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function login($username, $password, $platform)
    {
        try {
            $response = Http::asForm()->withHeaders([
                'X-Platform' => $platform,
            ])->post("{$this->baseUrl}/login", [
                'username' => $username,
                'password' => $password,
            ]);

            // Log response status and body for debugging
            Log::info('Login API response status', ['status' => $response->status()]);
            Log::info('Login API response body', ['body' => $response->body()]);

            // Check if the response was successful
            if ($response->successful()) {
                // Decode the JSON response
                $responseData = $response->json();
                Log::info('Login API successful response', ['response' => $responseData]);
                return $responseData;
            } else {
                // Handle non-successful responses
                $responseData = $response->json(); // Decode JSON if response is not successful
                Log::error('Login API failed', [
                    'status' => $response->status(),
                    'response' => $responseData // Log the decoded JSON response
                ]);
                return $responseData;
            }

        } catch (\Exception $e) {
            Log::error('Login API error', ['error' => $e->getMessage()]);
            return null;
        }
    }
    public function logout($kdPegawai)
    {
        try {
            $response = Http::post("{$this->baseUrl}/logout/{$kdPegawai}");

            if ($response->successful()) {
                return true;
            }

            return false;

        } catch (\Exception $e) {
            Log::error('Logout API error', ['error' => $e->getMessage()]);
            return false;
        }
    }
}


