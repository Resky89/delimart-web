@extends('layouts.app')

@section('title', 'Form Prefix')

@section('contents')
  <form action="{{ route('prefix.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Prefix</h6>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label for="prefix">Prefix</label>
              <input type="text" class="form-control" id="prefix" name="prefix" value="{{ old('prefix') }}">
              @error('prefix')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="kd_provider">Provider</label>
              <select name="kd_provider" id="kd_provider" class="custom-select">
                <option value="" selected disabled hidden>-- Pilih Provider --</option>
                @foreach ($provider as $row)
                  <option value="{{ $row['kd_provider'] }}" {{ old('kd_provider') == $row['kd_provider'] ? 'selected' : '' }}>{{ $row['provider'] }}</option>
                @endforeach
              </select>
              @error('kd_provider')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('prefix') }}" class="btn btn-secondary">Batal</a>
        </div>
      </div>
    </div>
    </div>
  </form>
@endsection
