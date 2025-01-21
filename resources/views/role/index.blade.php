@extends('layouts.app')

@section('title', 'Data Role')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('role.tambah') }}" class="btn btn-outline-primary mb-3">Tambah Role</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Role</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($role->currentPage() - 1) * $role->perPage() + 1)
                    @foreach ($role as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['kd_role'] }}</td>
                            <td>{{ $row['role'] }}</td>
                            <td>
                                <a href="{{ route('role.edit', $row['kd_role']) }}" class="btn btn-outline-warning">Edit</a>

                                <!-- Tombol hapus dengan modal konfirmasi -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusRole{{ $row['kd_role'] }}">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapusRole{{ $row['kd_role'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusRoleLabel{{ $row['kd_role'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="hapusRoleLabel{{ $row['kd_role'] }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Apakah Anda yakin ingin menghapus role "{{ $row['role'] }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                                <a href="{{ route('role.hapus', $row['kd_role']) }}" class="btn btn-outline-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Konfirmasi Hapus -->

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {!! $role->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>
@endsection
