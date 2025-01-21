@extends('layouts.app')

@section('title', 'Form Tambah User')

@section('contents')
  <form action="{{ route('user.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah User</h6>
          </div>
        <div class="card-body">
          <div class="form-group">
              <label for="kd_pegawai">Pegawai</label>
              <select name="kd_pegawai" id="kd_pegawai" class="custom-select">
                <option value="" selected disabled hidden>-- Pilih Pegawai --</option>
                @foreach ($pegawai as $row)
                  <option value="{{ $row['kd_pegawai'] }}" {{ old('kd_pegawai') == $row['kd_pegawai'] ? 'selected' : '' }}>{{ $row['nama_pegawai'] }}</option>
                @endforeach
              </select>
              @error('kd_pegawai')
                    <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
              @error('username')
                    <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="text">Password</label>
              <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}">
              @error('password')
                    <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('user') }}" class="btn btn-secondary">Batal</a>
          </div>
      </div>
    </div>
    </div>
  </form>
@endsection
