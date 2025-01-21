<?php

namespace App\Http\Controllers;

use App\Services\SupplierService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        $supplier = $this->supplierService->getSupplier();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($supplier, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($supplier), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('supplier.index', ['supplier' => $paginatedItems]);
    }

    public function tambah()
    {
        return view('supplier.formSimpan');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kd_supplier' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ], [
            'kd_supplier.required' => 'Kode Supplier harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'telepon.required' => 'Telepon harus diisi.',
            'telepon.numeric' => 'Telepon harus berupa angka.',
        ]);

        $data = [
            'kd_supplier' => $request->kd_supplier,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ];
        $this->supplierService->createSupplier($data);
        return redirect()->route('supplier');
    }

    public function edit($kd_supplier)
    {
        $supplier = $this->supplierService->getSupplierById($kd_supplier);
        return view('supplier.formUpdate', ['supplier' => $supplier]);
    }

    public function update($kd_supplier, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'telepon.required' => 'Telepon harus diisi.',
            'telepon.numeric' => 'Telepon harus berupa angka.',
        ]);
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ];
        $this->supplierService->updateSupplier($kd_supplier, $data);
        return redirect()->route('supplier');
    }

    public function hapus($kd_supplier)
    {
        $this->supplierService->deleteSupplier($kd_supplier);
        return redirect()->route('supplier');
    }
}
