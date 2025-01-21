<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PulsaService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getPulsa()
    {
        $response = Http::get("{$this->baseUrl}/pulsa");
        return $response->json();
    }

    public function getAllProvider()
    {
        $response = Http::get("{$this->baseUrl}/provider");
        return $response->json();
    }

    public function getPulsaById($kd_pulsa)
    {
        $response = Http::get( "{$this->baseUrl}/pulsa/{$kd_pulsa}");
        $data = $response->json();
        return $data;
    }


    public function createPulsa($data)
    {
        $response = Http::post("{$this->baseUrl}/pulsa", $data);
        return $response->json();
    }

    public function updatePulsa($kd_pulsa, $data)
    {
        $response = Http::put("{$this->baseUrl}/pulsa/{$kd_pulsa}", $data);
        return $response->json();
    }

    public function deletePulsa($kd_pulsa)
    {
        $response = Http::delete("{$this->baseUrl}/pulsa/{$kd_pulsa}");
        return $response->json();
    }
}
