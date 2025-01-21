<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $role = $this->roleService->getRole();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($role, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($role), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('role.index', ['role' => $paginatedItems]);
    }

    public function tambah()
    {
        return view('role.formSimpan');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kd_role' => 'required',
            'role' => 'required',
        ], [
            'kd_role.required' => 'Kode Role harus diisi.',
            'role.required' => 'Role harus diisi.',
        ]);

        $data = [
            'kd_role' => $request->kd_role,
            'role' => $request->role,
        ];
        $this->roleService->createRole($data);
        return redirect()->route('role');
    }

    public function edit($kd_role)
    {
        $role = $this->roleService->getRoleById($kd_role);
        return view('role.formUpdate', ['role' => $role]);
    }

    public function update($kd_role, Request $request)
    {
        $request->validate([
            'role' => 'required',
        ], [
            'role.required' => 'Role harus diisi.',
        ]);

        $data = ['role' => $request->role];
        $this->roleService->updateRole($kd_role, $data);
        return redirect()->route('role');
    }

    public function hapus($kd_role)
    {
        $this->roleService->deleteRole($kd_role);
        return redirect()->route('role');
    }
}
