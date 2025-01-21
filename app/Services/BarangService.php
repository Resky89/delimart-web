<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BarangService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');

    }

    public function getAllKategori()
    {
        $response = Http::get("{$this->baseUrl}/kategori");
        return $response->json();
    }

    public function getAllSuppliers()
    {
        $response = Http::get("{$this->baseUrl}/supplier");
        return $response->json();
    }

    public function getAllBarang()
    {
        $response = Http::get("{$this->baseUrl}/barang");
        return $response->json();
    }
    

    public function getBarangById($kd_barang)
    {
        $response = Http::get("{$this->baseUrl}/barang/{$kd_barang}");
        return $response->json();
    }

    public function createBarang($data)
    {
        $response = Http::post("{$this->baseUrl}/barang", $data);
        return $response->json();

    }

    public function updateBarang($kd_barang, $data)
    {
        $response = Http::put("{$this->baseUrl}/barang/{$kd_barang}", $data);
        return $response->json();
    }

    public function deleteBarang($kd_barang)
    {
        $response = Http::delete("{$this->baseUrl}/barang/{$kd_barang}");
        return $response->json();
    }
}
