@extends('layouts.app')

@section('title', 'Data Supplier')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('supplier.tambah') }}" class="btn btn-outline-primary">Tambah Supplier</a>
        <div class="d-flex">
            <form id="searchForm" action="{{ route('search.supplier') }}" method="GET" class="form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search supplier" aria-label="Search" aria-describedby="basic-addon2" name="query">
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
                        <th>Kode supplier</th>
                        <th>Nama supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($supplier->currentPage() - 1) * $supplier->perPage() + 1)
                    @forelse ($supplier as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['kd_supplier'] }}</td>
                            <td>{{ $row['nama'] }}</td>
                            <td>{{ $row['alamat'] }}</td>
                            <td>{{ $row['telepon'] }}</td>
                            <td>
                                <a href="{{ route('supplier.edit', $row['kd_supplier']) }}" class="btn btn-outline-warning">Edit</a>

                                <!-- Tombol hapus dengan modal konfirmasi -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusSupplier{{ $row['kd_supplier'] }}">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapusSupplier{{ $row['kd_supplier'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusSupplierLabel{{ $row['kd_supplier'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-primary">
                                                <h5 class="modal-title" id="hapusSupplierLabel{{ $row['kd_supplier'] }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Apakah Anda yakin ingin menghapus supplier "{{ $row['nama'] }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                                <a href="{{ route('supplier.hapus', $row['kd_supplier']) }}" class="btn btn-outline-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Konfirmasi Hapus -->

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data supplier ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
            {!! $supplier->appends(['query' => request('query')])->links('pagination::bootstrap-5') !!}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
