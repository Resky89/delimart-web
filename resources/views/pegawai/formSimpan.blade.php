@extends('layouts.app')

@section('title', 'Form Tambah Pegawai')

@section('contents')
  <form action="{{ route('pegawai.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pegawai</h6>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label for="nama_pegawai">Nama Pegawai</label>
              <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai') }}">
              @error('nama_pegawai')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
              @error('tanggal_lahir')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'checked' : '' }}>
                  <label class="form-check-label" for="jenis_kelamin_pria">Pria</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="Wanita" {{ old('jenis_kelamin') == 'Wanita' ? 'checked' : '' }}>
                  <label class="form-check-label" for="jenis_kelamin_wanita">Wanita</label>
                </div>
              </div>
              @error('jenis_kelamin')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
              @error('alamat')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="telepon">Telepon</label>
              <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon') }}">
              @error('telepon')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="kd_role">Role</label>
              <select name="kd_role" id="kd_role" class="custom-select">
                <option value="" selected disabled hidden>-- Pilih Role --</option>
                @foreach ($role as $row)
                  <option value="{{ $row['kd_role'] }}" {{ old('kd_role') == $row['kd_role'] ? 'selected' : '' }}>{{ $row['role'] }}</option>
                @endforeach
              </select>
              @error('kd_role')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pegawai') }}" class="btn btn-secondary">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
