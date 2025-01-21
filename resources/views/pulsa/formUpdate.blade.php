@extends('layouts.app')

@section('title', 'Form Edit Pulsa')

@section('contents')
  <form action="{{ isset($pulsa['kd_pulsa']) ? route('pulsa.tambah.update', $pulsa['kd_pulsa']) : '' }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pulsa</h6>
          </div>
          <div class="card-body">
            @if(isset($pulsa['kd_pulsa']))
              <div class="form-group">
                <input type="hidden" class="form-control" id="kd_pulsa" name="kd_pulsa" value="{{  $pulsa['kd_pulsa'] }}" readonly>
              </div>
              <div class="form-group">
                <label for="nama_produk_pulsa">Pulsa</label>
                <input type="text" class="form-control" id="nama_produk_pulsa" name="nama_produk_pulsa" value="{{  old('nama_produk_pulsa', $pulsa['nama_produk_pulsa']) }}">
                @error('nama_produk_pulsa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="kd_provider">Provider</label>
                <select name="kd_provider" id="kd_provider" class="custom-select">
                  <option value="" selected disabled hidden>-- Pilih Provider --</option>
                  @foreach ($provider as $row)
                    <option value="{{ $row['kd_provider'] }}" {{ $pulsa['kd_provider'] == $row['kd_provider'] ? 'selected' : '' }}>{{ $row['provider'] }}</option>
                  @endforeach
                </select>
                @error('kd_provider')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="modal">Modal</label>
                <input type="text" class="form-control" id="modal" name="modal" value="{{  old('modal', $pulsa['modal']) }}">
                @error('modal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{  old('harga', $pulsa['harga']) }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            @else
              <div class="alert alert-danger">Data pulsa tidak ditemukan.</div>
            @endif
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" {{ isset($pulsa['kd_pulsa']) ? '' : 'disabled' }}>Update</button>
            <a href="{{ route('pulsa') }}" class="btn btn-secondary">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
