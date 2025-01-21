<?php

namespace App\Http\Controllers;

use App\Services\PrefixService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PrefixController extends Controller
{
    protected $prefixService;

    public function __construct(PrefixService $prefixService)
    {
        $this->prefixService = $prefixService;
    }

    public function index()
    {
        $prefix = $this->prefixService->getPrefix();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($prefix, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($prefix), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('prefix.index', ['prefix' => $paginatedItems]);
    }

    public function tambah()
    {
        $provider = $this->prefixService->getAllProvider();
        return view('prefix.formSimpan', ['provider' => $provider]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'prefix' => 'required',
            'kd_provider' => 'required',
        ], [
            'prefix.required' => 'Prefix harus diisi.',
            'kd_provider.required' => 'Provider harus dipilih.',
        ]);

        $data = [
            'prefix' => $request->prefix,
            'kd_provider' => $request->kd_provider,
        ];
        $this->prefixService->createPrefix($data);
        return redirect()->route('prefix');
    }

    public function edit($kd_prefix)
    {
        $prefix = $this->prefixService->getPrefixById($kd_prefix);
        $provider = $this->prefixService->getAllProvider();
        return view('prefix.formUpdate', ['prefix' => $prefix, 'provider' => $provider]);
    }

    public function update($kd_prefix, Request $request)
    {
        $request->validate([
            'prefix' => 'required',
            'kd_provider' => 'required',
        ], [
            'prefix.required' => 'Prefix harus diisi.',
            'kd_provider.required' => 'Provider harus dipilih.',
        ]);
        $data = [
            'prefix' => $request->prefix,
            'kd_provider' => $request->kd_provider,
        ];
        $this->prefixService->updatePrefix($kd_prefix, $data);

        return redirect()->route('prefix');
    }

    public function hapus($kd_prefix)
    {
        $this->prefixService->deletePrefix($kd_prefix);
        return redirect()->route('prefix');
    }
}
