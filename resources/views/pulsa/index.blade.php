@extends('layouts.app')

@section('title', 'Data Pulsa')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a href="{{ route('pulsa.tambah') }}" class="btn btn-outline-primary">Tambah Pulsa</a>
        <div class="d-flex">
            <form id="searchForm" action="{{ route('search.pulsa') }}" method="GET" class="form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search pulsa" aria-label="Search" aria-describedby="basic-addon2" name="query">
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
                        <th>Kode Pulsa</th>
                        <th>Produk Pulsa</th>
                        <th>Provider</th>
                        <th>Modal</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($pulsa->currentPage() - 1) * $pulsa->perPage() + 1)
                    @forelse ($pulsa as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['kd_pulsa'] }}</td>
                            <td>{{ $row['nama_produk_pulsa'] }}</td>
                            <td>{{ $row['provider'] }}</td>
                            <td>{{ $row['modal'] }}</td>
                            <td>{{ $row['harga'] }}</td>
                            <td>
                                <a href="{{ route('pulsa.edit', $row['kd_pulsa']) }}" class="btn btn-outline-warning">Edit</a>

                                <!-- Tombol hapus dengan modal konfirmasi -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusPulsa{{ $row['kd_pulsa'] }}">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapusPulsa{{ $row['kd_pulsa'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusPulsaLabel{{ $row['kd_pulsa'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="hapusPulsaLabel{{ $row['kd_pulsa'] }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Apakah Anda yakin ingin menghapus pulsa "{{ $row['nama_produk_pulsa'] }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                                <a href="{{ route('pulsa.hapus', $row['kd_pulsa']) }}" class="btn btn-outline-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Konfirmasi Hapus -->

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pulsa ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
            {!! $pulsa->appends(['query' => request('query')])->links('pagination::bootstrap-5') !!}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
