@extends('layouts.app')

@section('title', 'Data Kategori')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a href="{{ route('kategori.tambah') }}" class="btn btn-outline-primary ">Tambah Kategori</a>
        <div class="d-flex">
            <form id="searchForm" action="{{ route('search.kategori') }}" method="GET" class="form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search kategori" aria-label="Search" aria-describedby="basic-addon2" name="query">
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
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($kategori->currentPage() - 1) * $kategori->perPage() + 1)
                    @forelse ($kategori as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['kd_kategori'] }}</td>
                            <td>{{ $row['nama_kategori'] }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $row['kd_kategori']) }}" class="btn btn-outline-warning">Edit</a>

                                <!-- Tombol hapus dengan modal konfirmasi -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusKategori{{ $row['kd_kategori'] }}">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapusKategori{{ $row['kd_kategori'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusKategoriLabel{{ $row['kd_kategori'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="hapusKategoriLabel{{ $row['kd_kategori'] }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Apakah Anda yakin ingin menghapus kategori "{{ $row['nama_kategori'] }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                                <a href="{{ route('kategori.hapus', $row['kd_kategori']) }}" class="btn btn-outline-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Konfirmasi Hapus -->

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data kategori ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
            {!! $kategori->appends(['query' => request('query')])->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>
@endsection
