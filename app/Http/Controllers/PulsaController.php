<?php

namespace App\Http\Controllers;

use App\Services\PulsaService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PulsaController extends Controller
{
    protected $pulsaService;

    public function __construct(PulsaService $pulsaService)
    {
        $this->pulsaService = $pulsaService;
    }

    public function index()
    {
        $pulsa = $this->pulsaService->getPulsa();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($pulsa, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($pulsa), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('pulsa.index', ['pulsa' => $paginatedItems]);
    }

    public function tambah()
    {
        $provider = $this->pulsaService->getAllProvider();
        return view('pulsa.formSimpan', ['provider' => $provider]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kd_pulsa' => 'required',
            'nama_produk_pulsa' => 'required',
            'kd_provider' => 'required',
            'modal' => 'required|numeric',
            'harga' => 'required|numeric',
        ], [
            'kd_pulsa.required' => 'Kode Pulsa harus diisi.',
            'nama_produk_pulsa.required' => 'Nama Produk Pulsa harus diisi.',
            'kd_provider.required' => 'Provider harus dipilih.',
            'modal.required' => 'Modal harus diisi.',
            'modal.numeric' => 'Modal harus berupa angka.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
        ]);

        $data = [
            'kd_pulsa' => $request->kd_pulsa,
            'nama_produk_pulsa' => $request->nama_produk_pulsa,
            'kd_provider' => $request->kd_provider,
            'modal' => $request->modal,
            'harga' => $request->harga,
        ];
        $this->pulsaService->createPulsa($data);
        return redirect()->route('pulsa');
    }

    public function edit($kd_pulsa)
    {
        $pulsa = $this->pulsaService->getPulsaById($kd_pulsa);
        $provider = $this->pulsaService->getAllProvider();
        return view('pulsa.formUpdate', ['pulsa' => $pulsa, 'provider' => $provider]);
    }

    public function update($kd_pulsa, Request $request)
    {
        $request->validate([
            'nama_produk_pulsa' => 'required',
            'kd_provider' => 'required',
            'modal' => 'required|numeric',
            'harga' => 'required|numeric',
        ], [
            'nama_produk_pulsa.required' => 'Nama Produk Pulsa harus diisi.',
            'kd_provider.required' => 'Provider harus dipilih.',
            'modal.required' => 'Modal harus diisi.',
            'modal.numeric' => 'Modal harus berupa angka.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
        ]);

        $data = [
            'nama_produk_pulsa' => $request->nama_produk_pulsa,
            'kd_provider' => $request->kd_provider,
            'modal' => $request->modal,
            'harga' => $request->harga,
        ];
        $this->pulsaService->updatePulsa($kd_pulsa, $data);
        return redirect()->route('pulsa');
    }

    public function hapus($kd_pulsa)
    {
        $this->pulsaService->deletePulsa($kd_pulsa);
        return redirect()->route('pulsa');
    }
}
