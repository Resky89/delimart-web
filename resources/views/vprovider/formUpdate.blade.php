@extends('layouts.app')

@section('title', 'Form Edit Provider')

@section('contents')
<form action="{{ isset($provider['kd_provider']) ? route('provider.tambah.update', $provider['kd_provider']) : '' }}" method="post">
@csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Provider</h6>
                </div>
                <div class="card-body">
                    @if(isset($provider['kd_provider']))
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="kd_provider" name="kd_provider" value="{{ $provider['kd_provider'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="provider">Nama Provider</label>
                            <input type="text" class="form-control" id="provider" name="provider" value="{{  old('provider', $provider['provider']) }}">
                        </div>
                        @error('provider')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    @else
                        <div class="alert alert-danger">Data provider tidak ditemukan.</div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" {{ isset($provider['kd_provider']) ? '' : 'disabled' }}>Update</button>
                    <a href="{{ route('provider') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
