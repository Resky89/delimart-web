@extends('layouts.app')

@section('title', 'Form Edit Barang')

@section('contents')
  <form action="{{ isset($barang['kd_barang']) ? route('barang.tambah.update', $barang['kd_barang']) : '' }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Barang</h6>
          </div>
          <div class="card-body">
            @if(isset($barang['kd_barang']))
              <div class="form-group">
                <input type="hidden" class="form-control" id="kd_barang" name="kd_barang" value="{{ $barang['kd_barang'] }}">
              </div>
              <div class="form-group">
                <label for="kd_supplier">Supplier</label>
                <select name="kd_supplier" id="kd_supplier" class="custom-select">
                  <option value="" selected disabled hidden>-- Pilih Supplier --</option>
                  @foreach ($supplier as $row)
                    <option value="{{ $row['kd_supplier'] }}" {{ $barang['kd_supplier'] == $row['kd_supplier'] ? 'selected' : '' }}>{{ $row['nama'] }}</option>
                  @endforeach
                </select>
                @error('kd_supplier')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $barang['nama']) }}">
              @error('nama')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
              <div class="form-group">
                <label for="kd_kategori">Kategori</label>
                <select name="kd_kategori" id="kd_kategori" class="custom-select">
                  <option value="" selected disabled hidden>-- Pilih Kategori --</option>
                  @foreach ($kategori as $row)
                    <option value="{{ $row['kd_kategori'] }}" {{ $barang['kd_kategori'] == $row['kd_kategori'] ? 'selected' : '' }}>{{ $row['nama_kategori'] }}</option>
                  @endforeach
                </select>
                @error('kd_kategori')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              </div>
              <div class="form-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $barang['harga_beli']) }}">
                @error('harga_beli')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $barang['harga_jual']) }}">
                @error('harga_jual')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
              <div class="form-group">
                <label for="diskon">Diskon</label>
                <input type="text" class="form-control" id="diskon" name="diskon" value="{{ old('diskon', $barang['diskon']) }}">
                @error('diskon')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="{{ old('stok', $barang['stok']) }}">
                @error('stok')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            @else
              <div class="alert alert-danger">Data barang tidak ditemukan.</div>
            @endif
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" {{ isset($barang['kd_barang']) ? '' : 'disabled' }}>Update</button>
            <a href="{{ route('barang') }}" class="btn btn-secondary">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
