<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProviderService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getProvider()
    {
        $response = Http::get("{$this->baseUrl}/provider");
        return $response->json();
    }

    public function getProviderById($kd_provider)
    {
        $response = Http::get( "{$this->baseUrl}/provider/{$kd_provider}");
        $data = $response->json();
        return $data;
    }

    public function createProvider($data)
    {
        $response = Http::post("{$this->baseUrl}/provider", $data);
        return $response->json();
    }

    public function updateProvider($kd_provider, $data)
    {
        $response = Http::put("{$this->baseUrl}/provider/{$kd_provider}", $data);
        return $response->json();
    }

    public function deleteProvider($kd_provider)
    {
        $response = Http::delete("{$this->baseUrl}/provider/{$kd_provider}");
        return $response->json();
    }
}
