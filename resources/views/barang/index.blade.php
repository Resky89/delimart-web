@extends('layouts.app')

@section('title', 'Data Barang')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('barang.tambah') }}" class="btn btn-outline-primary">Tambah Barang</a>
        <div class="d-flex">
            <form id="searchForm" action="{{ route('search.barang') }}" method="GET" class="form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search barang" aria-label="Search" aria-describedby="basic-addon2" name="query">
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
                        <th>Kode Barang</th>
                        <th>Supplier</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($barang->currentPage() - 1) * $barang->perPage() + 1)
                    @forelse ($barang as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row['kd_barang'] }}</td>
                        <td>{{ $row['supplier'] }}</td>
                        <td>{{ $row['nama'] }}</td>
                        <td>{{ $row['kategori'] }}</td>
                        <td>{{ $row['harga_beli'] }}</td>
                        <td>{{ $row['harga_jual'] }}</td>
                        <td>{{ $row['diskon'] }}</td>
                        <td>{{ $row['stok'] }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $row['kd_barang']) }}" class="btn btn-outline-warning">Edit</a>

                            <!-- Tombol hapus dengan modal konfirmasi -->
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusBarang{{ $row['kd_barang'] }}">
                                Hapus
                            </button>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="hapusBarang{{ $row['kd_barang'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusBarangLabel{{ $row['kd_barang'] }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="hapusBarangLabel{{ $row['kd_barang'] }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            Apakah Anda yakin ingin menghapus barang "{{ $row['nama'] }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                            <a href="{{ route('barang.hapus', $row['kd_barang']) }}" class="btn btn-outline-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Konfirmasi Hapus -->

                        </td>
                    </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Tidak ada data barang ditemukan.</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {!! $barang->appends(['query' => request('query')])->links('pagination::bootstrap-5') !!}
            </div>

        </div>
    </div>
</div>
@endsection
