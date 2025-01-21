<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PegawaiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getAllRole()
    {
        $response = Http::get("{$this->baseUrl}/role");
        return $response->json();
    }

    public function getPegawai()
    {
        $response = Http::get("{$this->baseUrl}/pegawai");
        return $response->json();
    }

    public function getPegawaiById($kd_pegawai)
    {
        $response = Http::get( "{$this->baseUrl}/pegawai/{$kd_pegawai}");
        $data = $response->json();
        return $data;
    }


    public function createPegawai($data)
    {
        $response = Http::post("{$this->baseUrl}/pegawai", $data);
        return $response->json();
    }

    public function updatePegawai($kd_pegawai, $data)
    {
        $response = Http::put("{$this->baseUrl}/pegawai/{$kd_pegawai}", $data);
        return $response->json();
    }

    public function deletePegawai($kd_pegawai)
    {
        $response = Http::delete("{$this->baseUrl}/pegawai/{$kd_pegawai}");
        return $response->json();
    }
}
