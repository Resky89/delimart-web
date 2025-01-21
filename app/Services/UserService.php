<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UserService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getUser()
    {
        $response = Http::get("{$this->baseUrl}/user");
        return $response->json();
    }

    public function getAllPegawai()
    {
        $response = Http::get("{$this->baseUrl}/pegawai");
        return $response->json();
    }

    public function getUserById($id)
    {
        $response = Http::get( "{$this->baseUrl}/user/{$id}");
        $data = $response->json();
        return $data;
    }

    public function createUser($data)
    {
        $response = Http::post("{$this->baseUrl}/user", $data);
        return $response->json();
    }

    public function updateUser($id, $data)
    {
        $response = Http::put("{$this->baseUrl}/user/{$id}", $data);
        return $response->json();
    }

    public function deleteUser($id)
    {
        $response = Http::delete("{$this->baseUrl}/user/{$id}");
        return $response->json();
    }


}
