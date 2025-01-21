@extends('layouts.app')

@section('title', 'Form Edit Prefix')

@section('contents')
  <form action="{{ isset($prefix['kd_prefix']) ? route('prefix.tambah.update', $prefix['kd_prefix']) : '' }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Prefix</h6>
          </div>
          <div class="card-body">
            @if(isset($prefix['kd_prefix']))
              <div class="form-group">
                <input type="hidden" class="form-control" id="kd_prefix" name="kd_prefix" value="{{  $prefix['kd_prefix'] }}">
              </div>
              <div class="form-group">
                <label for="prefix">Prefix</label>
                <input type="text" class="form-control" id="prefix" name="prefix" value="{{ old('prefix', $prefix['prefix']) }}">
                @error('prefix')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="kd_provider">Provider</label>
                <select name="kd_provider" id="kd_provider" class="custom-select">
                  <option value="" selected disabled hidden>-- Pilih Provider --</option>
                  @foreach ($provider as $row)
                    <option value="{{ $row['kd_provider'] }}" {{ old('kd_provider', $prefix['kd_provider']) == $row['kd_provider'] ? 'selected' : '' }}>{{ $row['provider'] }}</option>
                  @endforeach
                </select>
                @error('kd_provider')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            @else
              <div class="alert alert-danger">Data provider tidak ditemukan.</div>
            @endif
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" {{ isset($prefix['kd_prefix']) ? '' : 'disabled' }}>Update</button>
            <a href="{{ route('prefix') }}" class="btn btn-secondary">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
