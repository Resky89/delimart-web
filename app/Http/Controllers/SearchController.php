<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PencarianService;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    protected $pencarianService;

    public function __construct(PencarianService $pencarianService)
    {
        $this->pencarianService = $pencarianService;
    }

    public function searchBarang(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('barang');
        }

        $results = $this->pencarianService->cariBarang($query);

        if (empty($results)) {
            $results = [];
        }

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($results, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($results), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('barang.index', ['barang' => $paginatedItems, 'query' => $query]);
    }

    public function searchPegawai(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('pegawai');
        }

        $results = $this->pencarianService->cariPegawai($query);

        if (empty($results)) {
            $results = [];
        }

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($results, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($results), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('pegawai.index', ['pegawai' => $paginatedItems, 'query' => $query]);
    }

    public function searchUser(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('user');
        }

        $results = $this->pencarianService->cariUser($query);

        if (empty($results)) {
            $results = [];
        }

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($results, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($results), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('user.index', ['user' => $paginatedItems, 'query' => $query]);
    }

    public function searchPulsa(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('pulsa');
        }

        $results = $this->pencarianService->cariPulsa($query);

        if (empty($results)) {
            $results = [];
        }

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($results, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($results), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('pulsa.index', ['pulsa' => $paginatedItems, 'query' => $query]);
    }

    public function searchKategori(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('kategori');
        }

        $results = $this->pencarianService->cariKategori($query);

        if (empty($results)) {
            $results = [];
        }

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($results, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($results), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('kategori.index', ['kategori' => $paginatedItems, 'query' => $query]);
    }

    public function searchSupplier(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('supplier');
        }

        $results = $this->pencarianService->cariSupplier($query);

        if (empty($results)) {
            $results = [];
        }

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($results, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($results), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('supplier.index', ['supplier' => $paginatedItems, 'query' => $query]);
    }
}
