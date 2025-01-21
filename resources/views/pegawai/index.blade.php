@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('pegawai.tambah') }}" class="btn btn-outline-primary">Tambah Pegawai</a>
        <div class="d-flex">
            <form id="searchForm" action="{{ route('search.pegawai') }}" method="GET" class="form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search pegawai" aria-label="Search" aria-describedby="basic-addon2" name="query">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($pegawai->currentPage() - 1) * $pegawai->perPage() + 1)
                    @forelse ($pegawai as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['kd_pegawai'] }}</td>
                            <td>{{ $row['nama_pegawai'] }}</td>
                            <td>{{ $row['tanggal_lahir'] }}</td>
                            <td>{{ $row['jenis_kelamin'] }}</td>
                            <td>{{ $row['alamat'] }}</td>
                            <td>{{ $row['telepon'] }}</td>
                            <td>{{ $row['role'] }}</td>
                            <td>
                                <a href="{{ route('pegawai.edit', $row['kd_pegawai']) }}" class="btn btn-outline-warning">Edit</a>

                                <!-- Tombol hapus dengan modal konfirmasi -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusPegawai{{ $row['kd_pegawai'] }}">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapusPegawai{{ $row['kd_pegawai'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusPegawaiLabel{{ $row['kd_pegawai'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="hapusPegawaiLabel{{ $row['kd_pegawai'] }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Apakah Anda yakin ingin menghapus pegawai "{{ $row['nama_pegawai'] }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                                <a href="{{ route('pegawai.hapus', $row['kd_pegawai']) }}" class="btn btn-outline-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Konfirmasi Hapus -->

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data pegawai ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
            {!! $pegawai->appends(['query' => request('query')])->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>
@endsection
