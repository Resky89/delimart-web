<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RoleService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getRole()
    {
        $response = Http::get("{$this->baseUrl}/role");
        return $response->json();
    }

    public function getRoleById($kd_role)
    {
        $response = Http::get( "{$this->baseUrl}/role/{$kd_role}");
        $data = $response->json();
        return $data;
    }

    public function createRole($data)
    {
        $response = Http::post("{$this->baseUrl}/role", $data);
        return $response->json();
    }

    public function updateRole($kd_role, $data)
    {
        $response = Http::put("{$this->baseUrl}/role/{$kd_role}", $data);
        return $response->json();
    }

    public function deleteRole($kd_role)
    {
        $response = Http::delete("{$this->baseUrl}/role/{$kd_role}");
        return $response->json();
    }
}
