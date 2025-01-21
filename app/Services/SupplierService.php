<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SupplierService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getSupplier()
    {
        $response = Http::get("{$this->baseUrl}/supplier");
        return $response->json();
    }

    public function getSupplierById($kd_supplier)
    {
        $response = Http::get( "{$this->baseUrl}/supplier/{$kd_supplier}");
        $data = $response->json();
        return $data;
    }


    public function createSupplier($data)
    {
        $response = Http::post("{$this->baseUrl}/supplier", $data);
        return $response->json();
    }

    public function updateSupplier($kd_supplier, $data)
    {
        $response = Http::put("{$this->baseUrl}/supplier/{$kd_supplier}", $data);
        return $response->json();
    }

    public function deleteSupplier($kd_supplier)
    {
        $response = Http::delete("{$this->baseUrl}/supplier/{$kd_supplier}");
        return $response->json();
    }
}
