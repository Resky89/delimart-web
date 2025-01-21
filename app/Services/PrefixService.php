<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PrefixService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getPrefix()
    {
        $response = Http::get("{$this->baseUrl}/prefix");
        return $response->json();
    }

    public function getAllProvider()
    {
        $response = Http::get("{$this->baseUrl}/provider");
        return $response->json();
    }

    public function getPrefixById($kd_prefix)
    {
        $response = Http::get( "{$this->baseUrl}/prefix/{$kd_prefix}");
        $data = $response->json();
        return $data;
    }


    public function createPrefix($data)
    {
        $response = Http::post("{$this->baseUrl}/prefix", $data);
        return $response->json();
    }

    public function updatePrefix($kd_prefix, $data)
    {
        $response = Http::put("{$this->baseUrl}/prefix/{$kd_prefix}", $data);
        return $response->json();
    }

    public function deletePrefix($kd_prefix)
    {
        $response = Http::delete("{$this->baseUrl}/prefix/{$kd_prefix}");
        return $response->json();
    }
}
