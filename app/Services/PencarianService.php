<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PencarianService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function cariBarang($query)
    {
        $response = Http::get("{$this->baseUrl}/barang/search", [
            'query' => $query,
        ]);

        if ($response->successful()) {
            return $response->json();
        }
        return $response->json();
    }

    public function cariPegawai($query)
    {
        $response = Http::get("{$this->baseUrl}/pegawai/search", [
            'query' => $query,
        ]);
        if ($response->successful()) {
            return $response->json();
        }
        return $response->json();
    }

    public function cariUser($query)
    {
        $response = Http::get("{$this->baseUrl}/user/search", [
            'query' => $query,
        ]);
        if ($response->successful()) {
            return $response->json();
        }
        return $response->json();
    }

    public function cariPulsa($query)
    {
        $response = Http::get("{$this->baseUrl}/pulsa/search", [
            'query' => $query,
        ]);
        if ($response->successful()) {
            return $response->json();
        }
        return $response->json();
    }

    public function cariKategori($query)
    {
        $response = Http::get("{$this->baseUrl}/kategori/search", [
            'query' => $query,
        ]);
        if ($response->successful()) {
            return $response->json();
        }
        return $response->json();
    }

    public function cariSupplier($query)
    {
        $response = Http::get("{$this->baseUrl}/supplier/search", [
            'query' => $query,
        ]);
        if ($response->successful()) {
            return $response->json();
        }
        return $response->json();
    }
}
