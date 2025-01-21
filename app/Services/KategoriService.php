<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class KategoriService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getKategori()
    {
        $response = Http::get("{$this->baseUrl}/kategori");
        return $response->json();
    }

    public function getKategoriById($kd_kategori)
    {
        $response = Http::get( "{$this->baseUrl}/kategori/{$kd_kategori}");
        $data = $response->json();
        return $data;
    }


    public function createKategori($data)
    {
        $response = Http::post("{$this->baseUrl}/kategori", $data);
        return $response->json();
    }

    public function updateKategori($kd_kategori, $data)
    {
        $response = Http::put("{$this->baseUrl}/kategori/{$kd_kategori}", $data);
        return $response->json();
    }

    public function deleteKategori($kd_kategori)
    {
        $response = Http::delete("{$this->baseUrl}/kategori/{$kd_kategori}");
        return $response->json();
    }
}
