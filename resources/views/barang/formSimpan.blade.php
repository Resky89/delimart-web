@extends('layouts.app')

@section('title', 'Form Barang')

@section('contents')
  <form action="{{ route('barang.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="kd_barang">Kode Barang</label>
              <input type="text" class="form-control" id="kd_barang" name="kd_barang" value="{{ old('kd_barang') }}">
              @error('kd_barang')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="kd_supplier">Supplier</label>
              <select name="kd_supplier" id="kd_supplier" class="custom-select">
                <option value="" selected disabled hidden>-- Pilih Supplier --</option>
                @foreach ($supplier as $row)
                  <option value="{{ $row['kd_supplier'] }}" {{ old('kd_supplier') == $row['kd_supplier'] ? 'selected' : '' }}>
                    {{ $row['nama'] }}
                  </option>
                @endforeach
              </select>
              @error('kd_supplier')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama Barang</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
              @error('nama')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="kd_kategori">Kategori Barang</label>
              <select name="kd_kategori" id="kd_kategori" class="custom-select">
                <option value="" selected disabled hidden>-- Pilih Kategori --</option>
                @foreach ($kategori as $row)
                  <option value="{{ $row['kd_kategori'] }}" {{ old('kd_kategori') == $row['kd_kategori'] ? 'selected' : '' }}>
                    {{ $row['nama_kategori'] }}
                  </option>
                @endforeach
              </select>
              @error('kd_kategori')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga_beli">Harga Beli</label>
              <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}">
              @error('harga_beli')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga_jual">Harga Jual</label>
              <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}">
              @error('harga_jual')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="diskon">Diskon</label>
              <input type="number" class="form-control" id="diskon" name="diskon" value="{{ old('diskon') }}">
              @error('diskon')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="stok">Stok Barang</label>
              <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok') }}">
              @error('stok')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang') }}" class="btn btn-secondary">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
