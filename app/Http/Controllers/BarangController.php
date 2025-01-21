<?php

namespace App\Http\Controllers;

use App\Services\BarangService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class BarangController extends Controller
{
    protected $barangService;

    public function __construct(BarangService $barangService)
    {
        $this->barangService = $barangService;
    }

    public function index()
    {
        $barang = $this->barangService->getAllBarang();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($barang, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($barang), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('barang.index', ['barang' => $paginatedItems]);
    }


    public function tambah()
    {
        $kategori = $this->barangService->getAllKategori();
        $supplier = $this->barangService->getAllSuppliers();

        return view('barang.formSimpan', ['kategori' => $kategori, 'supplier' => $supplier]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kd_barang' => 'required',
            'kd_supplier' => 'required',
            'nama' => 'required',
            'kd_kategori' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'diskon' => 'required|numeric|max:90',
            'stok' => 'required|numeric',
        ], [
            'kd_barang.required' => 'Kode Barang harus diisi.',
            'kd_supplier.required' => 'Supplier harus dipilih.',
            'nama.required' => 'Nama Barang harus diisi.',
            'kd_kategori.required' => 'Kategori Barang harus dipilih.',
            'harga_beli.required' => 'Harga Beli harus diisi.',
            'harga_beli.numeric' => 'Harga Beli harus berupa angka.',
            'harga_jual.required' => 'Harga Jual harus diisi.',
            'harga_jual.numeric' => 'Harga Jual harus berupa angka.',
            'diskon.required' => 'Diskon harus diisi.',
            'diskon.numeric' => 'Diskon harus berupa angka.',
            'diskon.max' => 'Diskon tidak boleh lebih dari 90.',
            'stok.required' => 'Stok Barang harus diisi.',
            'stok.numeric' => 'Stok Barang harus berupa angka.',
        ]);

        $data = [
            'kd_barang' => $request->kd_barang,
            'kd_supplier' => $request->kd_supplier,
            'nama' => $request->nama,
            'kd_kategori' => $request->kd_kategori,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
        ];

        $this->barangService->createBarang($data);

        return redirect()->route('barang');
    }

    public function edit($kd_barang)
    {
        $barang = $this->barangService->getBarangById($kd_barang);
        $kategori = $this->barangService->getAllKategori();
        $supplier = $this->barangService->getAllSuppliers();

        return view('barang.formUpdate', ['barang' => $barang, 'kategori' => $kategori, 'supplier' => $supplier]);
    }

    public function update($kd_barang, Request $request)
    {
        $request->validate([
            'kd_supplier' => 'required',
            'nama' => 'required',
            'kd_kategori' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'diskon' => 'required|numeric',
            'stok' => 'required|numeric',
        ], [
            'kd_supplier.required' => 'Supplier harus dipilih.',
            'nama.required' => 'Nama Barang harus diisi.',
            'kd_kategori.required' => 'Kategori Barang harus dipilih.',
            'harga_beli.required' => 'Harga Beli harus diisi.',
            'harga_beli.numeric' => 'Harga Beli harus berupa angka.',
            'harga_jual.required' => 'Harga Jual harus diisi.',
            'harga_jual.numeric' => 'Harga Jual harus berupa angka.',
            'diskon.required' => 'Diskon harus diisi.',
            'diskon.numeric' => 'Diskon harus berupa angka.',
            'stok.required' => 'Stok Barang harus diisi.',
            'stok.numeric' => 'Stok Barang harus berupa angka.',
        ]);

        $data = [
            'kd_supplier' => $request->kd_supplier,
            'nama' => $request->nama,
            'kd_kategori' => $request->kd_kategori,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
        ];

        $this->barangService->updateBarang($kd_barang, $data);

        return redirect()->route('barang');
    }

    public function hapus($kd_barang)
    {
        $this->barangService->deleteBarang($kd_barang);

        return redirect()->route('barang');
    }
}
