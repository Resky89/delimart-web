@extends('layouts.app')

@section('title', 'Form Edit User')

@section('contents')
<form action="{{ isset($user['id']) ? route('user.tambah.update', $user['id']) : '' }}" method="post" id="editUserForm">
@csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
                </div>
                <div class="card-body">
                    @if(isset($user['id']))
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $user['id'] }}">
                        </div>
                        <div class="form-group">
                            <label for="kd_pegawai">Pegawai</label>
                            <select name="kd_pegawai" id="kd_pegawai" class="custom-select">
                            <option value="" selected disabled hidden>-- Pilih Pegawai --</option>
                            @foreach ($pegawai as $row)
                                <option value="{{ $row['kd_pegawai'] }}" {{ old('kd_pegawai', $user['kd_pegawai']) == $row['kd_pegawai'] ? 'selected' : '' }}>{{ $row['nama_pegawai'] }}</option>
                            @endforeach
                            </select>
                            @error('kd_pegawai')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user['username']) }}">
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"  value="{{ old('password', $user['password']) }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <div class="alert alert-danger">Data user tidak ditemukan.</div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" {{ isset($user['id']) ? '' : 'disabled' }}>Update</button>
                    <a href="{{ route('user') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
