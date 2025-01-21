<?php

namespace App\Http\Controllers;

use App\Services\ProviderService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProviderController extends Controller
{
    protected $providerService;

    public function __construct(ProviderService $providerService)
    {
        $this->providerService = $providerService;
    }

    public function index()
    {
        $provider = $this->providerService->getProvider();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($provider, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($provider), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('vprovider.index', ['provider' => $paginatedItems]);
    }

    public function tambah()
    {
        return view('vprovider.formSimpan');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kd_provider' => 'required',
            'provider' => 'required',
        ], [
            'kd_provider.required' => 'Kode Provider harus diisi.',
            'provider.required' => 'Nama Provider harus diisi.',
        ]);

        $data = [
            'kd_provider' => $request->kd_provider,
            'provider' => $request->provider,
        ];
        $this->providerService->createProvider($data);
        return redirect()->route('provider');
    }

    public function edit($kd_provider)
    {
        $provider = $this->providerService->getProviderById($kd_provider);
        return view('vprovider.formUpdate', ['provider' => $provider]);
    }

    public function update($kd_provider, Request $request)
    {
        $request->validate([
            'provider' => 'required',
        ], [
            'provider.required' => 'Nama Provider harus diisi.',
        ]);
        $data = ['provider' => $request->provider];
        $this->providerService->updateProvider($kd_provider, $data);
        return redirect()->route('provider');
    }


    public function hapus($kd_provider)
    {
        $this->providerService->deleteProvider($kd_provider);
        return redirect()->route('provider');
    }
}
