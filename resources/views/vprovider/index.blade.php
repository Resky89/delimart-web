@extends('layouts.app')

@section('title', 'Data Provider')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="{{ route('provider.tambah') }}" class="btn btn-outline-primary mb-3">Tambah Provider</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Provider</th>
                        <th>Nama Provider</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($provider->currentPage() - 1) * $provider->perPage() + 1)
                    @foreach ($provider as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['kd_provider'] }}</td>
                            <td>{{ $row['provider'] }}</td>
                            <td>
                                <a href="{{ route('provider.edit', $row['kd_provider']) }}" class="btn btn-outline-warning">Edit</a>

                                <!-- Tombol hapus dengan modal konfirmasi -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusProvider{{ $row['kd_provider'] }}">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapusProvider{{ $row['kd_provider'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusProviderLabel{{ $row['kd_provider'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="hapusProviderLabel{{ $row['kd_provider'] }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Apakah Anda yakin ingin menghapus provider "{{ $row['provider'] }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                                <a href="{{ route('provider.hapus', $row['kd_provider']) }}" class="btn btn-outline-danger">Hapus</a>
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
                {!! $provider->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>
@endsection
