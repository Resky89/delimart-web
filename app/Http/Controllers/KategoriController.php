<?php

namespace App\Http\Controllers;

use App\Services\KategoriService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class KategoriController extends Controller
{
    protected $kategoriService;

    public function __construct(KategoriService $kategoriService)
    {
        $this->kategoriService = $kategoriService;
    }

    public function index()
    {
        $kategori = $this->kategoriService->getKategori();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($kategori, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($kategori), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('kategori.index', ['kategori' => $paginatedItems]);
    }

    public function tambah()
    {
        return view('kategori.formSimpan');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kd_kategori' => 'required',
            'nama_kategori' => 'required',
        ], [
            'kd_kategori.required' => 'Kode Kategori harus diisi.',
            'nama_kategori.required' => 'Nama Kategori harus diisi.',
        ]);
        $data = [
            'kd_kategori' => $request->kd_kategori,
            'nama_kategori' => $request->nama_kategori,
        ];
        $this->kategoriService->createKategori($data);
        return redirect()->route('kategori');
    }

    public function edit($kd_kategori)
    {
        $kategori = $this->kategoriService->getKategoriById($kd_kategori);
        return view('kategori.formUpdate', ['kategori' => $kategori]);
    }

    public function update($kd_kategori, Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori harus diisi.',
        ]);
        $data = ['nama_kategori' => $request->nama_kategori];
        $this->kategoriService->updateKategori($kd_kategori, $data);
        return redirect()->route('kategori');
    }

    public function hapus($kd_kategori)
    {
        $this->kategoriService->deleteKategori($kd_kategori);
        return redirect()->route('kategori');
    }
}
