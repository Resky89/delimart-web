@extends('layouts.app')

@section('title', 'Form Edit Role')

@section('contents')
<form action="{{ isset($role['kd_role']) ? route('role.tambah.update', $role['kd_role']) : '' }}" method="post">
@csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Role</h6>
                </div>
                <div class="card-body">
                    @if(isset($role['kd_role']))
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="kd_role" name="kd_role" value="{{  old('kd_role', $role['kd_role']) }}">
                            @error('kd_role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" id="role" name="role" value="{{  old('role', $role['role']) }}">
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <div class="alert alert-danger">Data role tidak ditemukan.</div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" {{ isset($role['kd_role']) ? '' : 'disabled' }}>Update</button>
                    <a href="{{ route('role') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
