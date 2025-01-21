@extends('layouts.app')

@section('title', 'Form Edit Supplier')

@section('contents')
  <form action="{{ isset($kd_supplier['kd_supplier']) ? route('supplier.tambah.simpan', $supplier['kd_supplier']):'' }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Supplier</h6>
          </div>
          <div class="card-body">
            @if(isset($supplier['kd_supplier']))
                <div class="form-group">
                    <input type="hidden" class="form-control" id="kd_supplier" name="kd_supplier" value="{{ $supplier['kd_supplier'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{  old('nama', $supplier['nama']) }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{  old('alamat', $supplier['alamat']) }}">
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $supplier['telepon']) }}">
                    @error('telepon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            @else
                <div class="alert alert-danger">Data supplier tidak ditemukan.</div>
            @endif
          </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary {{ isset($supplier['kd_supplier']) ? '' : 'disabled' }}">Update</button>
                <a href="{{ route('supplier') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
      </div>
    </div>
  </form>
@endsection
