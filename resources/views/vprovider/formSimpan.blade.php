@extends('layouts.app')

@section('title', 'Form Tambah Provider')

@section('contents')
<form action="{{ route('provider.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Provider</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="provider">Nama Provider</label>
                        <input type="text" class="form-control" id="provider" name="provider" value="{{ old('provider') }}">
                        @error('provider')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('provider') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
