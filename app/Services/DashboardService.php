<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DashboardService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function GetLaporanDashboard()
    {
        $response = Http::get("{$this->baseUrl}/dashboard");
        return $response->json();
    }

}
