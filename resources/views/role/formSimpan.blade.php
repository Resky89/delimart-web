@extends('layouts.app')

@section('title', 'Form Tambah Role')

@section('contents')
<form action="{{ route('role.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Role</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kd_role">Kode Role</label>
                        <input type="text" class="form-control" id="kd_role" name="kd_role" value="{{ old('kd_role') }}">
                        @error('kd_role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role" value="{{ old('role') }}">
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('role') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
