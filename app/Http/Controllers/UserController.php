<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->getUser();
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($user, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems = new LengthAwarePaginator($currentItems, count($user), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('user.index', ['user' => $paginatedItems]);
    }

    public function tambah()
    {
        $pegawai = $this->userService->getAllPegawai();
        return view('user.formSimpan', ['pegawai' => $pegawai]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kd_pegawai' => 'required',
            'username' => 'required',
            'password' => 'required',
        ], [
            'kd_pegawai.required' => 'Pegawai harus dipilih.',
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);
        $data = [
            'kd_pegawai' => $request->kd_pegawai,
            'username' => $request->username,
            'password' => $request->password,
        ];
        $this->userService->createUser($data);
        return redirect()->route('user');
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $pegawai = $this->userService->getAllPegawai();
        return view('user.formUpdate', ['user' => $user, 'pegawai' => $pegawai]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'kd_pegawai' => 'required',
            'username' => 'required',
            'password' => 'required',
        ], [
            'kd_pegawai.required' => 'Kode Pegawai harus diisi.',
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);
        $data = [
            'kd_pegawai' => $request->kd_pegawai,
            'username' => $request->username,
            'password' => $request->password
        ];
        $this->userService->updateUser($id, $data);
        return redirect()->route('user');
    }


    public function hapus($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('user');
    }
}

