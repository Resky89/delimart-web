@extends('layouts.app')

@section('title', 'Form Kategori')

@section('contents')
  <form action="{{ route('kategori.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kategori</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="kd_kategori">Kode Kategori</label>
              <input type="text" class="form-control" id="kd_kategori" name="kd_kategori" value="{{ old('kd_kategori') }}">
              @error('kd_kategori')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_kategori">Nama Kategori</label>
              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
              @error('nama_kategori')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori') }}" class="btn btn-secondary">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
