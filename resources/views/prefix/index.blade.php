@extends('layouts.app')

@section('title', 'Data Prefix')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('prefix.tambah') }}" class="btn btn-outline-primary mb-3">Tambah Prefix</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Prefix</th>
                        <th>Provider</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($prefix->currentPage() - 1) * $prefix->perPage() + 1)
                    @foreach ($prefix as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['prefix'] }}</td>
                            <td>{{ $row['provider'] }}</td>
                            <td>
                                <a href="{{ route('prefix.edit', $row['kd_prefix']) }}" class="btn btn-outline-warning">Edit</a>

                                <!-- Tombol hapus dengan modal konfirmasi -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusPrefix{{ $row['kd_prefix'] }}">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapusPrefix{{ $row['kd_prefix'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusPrefixLabel{{ $row['kd_prefix'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="hapusPrefixLabel{{ $row['kd_prefix'] }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Apakah Anda yakin ingin menghapus prefix "{{ $row['prefix'] }}" dari provider "{{ $row['provider'] }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                                <a href="{{ route('prefix.hapus', $row['kd_prefix']) }}" class="btn btn-outline-danger">Hapus</a>
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
                {!! $prefix->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>
@endsection
