@extends('layouts.app')

@section('title', 'Form Edit Kategori')

@section('contents')
<form action="{{ isset($kategori['kd_kategori']) ? route('kategori.tambah.update', $kategori['kd_kategori']) : '' }}" method="post">
@csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Kategori</h6>
                </div>
                <div class="card-body">
                    @if(isset($kategori['kd_kategori']))
                        <div class="form-group">
                            <label for="kd_kategori">Kode Kategori</label>
                            <input type="text" class="form-control" id="kd_kategori" name="kd_kategori" value="{{ $kategori['kd_kategori'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori['nama_kategori']) }}">
                        @error('nama_kategori')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    @else
                        <div class="alert alert-danger">Data kategori tidak ditemukan.</div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" {{ isset($kategori['kd_kategori']) ? '' : 'disabled' }}>Update</button>
                    <a href="{{ route('kategori') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
