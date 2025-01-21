@extends('layouts.app')

@section('title', 'Data User')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('user.tambah') }}" class="btn btn-outline-primary">Tambah User</a>
        <div class="d-flex">
            <form id="searchForm" action="{{ route('search.user') }}" method="GET" class="form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search user" aria-label="Search" aria-describedby="basic-addon2" name="query">
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
                        <th>ID</th>
                        <th>Nama Pegawai</th>
                        <th>Username</th>
                        <th>Live</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = ($user->currentPage() - 1) * $user->perPage() + 1)
                    @forelse ($user as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row['id'] }}</td>
                            <td>{{ $row['nama_pegawai'] }}</td>
                            <td>{{ $row['username'] }}</td>
                            <td>{{ $row['live'] }}</td>
                            <td>
                                <a href="{{ route('user.edit', $row['id']) }}" class="btn btn-outline-warning">Edit</a>

                                <!-- Tombol hapus dengan modal konfirmasi -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapusUser{{ $row['id'] }}">
                                    Hapus
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="hapusUser{{ $row['id'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusUserLabel{{ $row['id'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-primary">
                                                <h5 class="modal-title" id="hapusUserLabel{{ $row['id'] }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Apakah Anda yakin ingin menghapus user "{{ $row['username'] }}"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                                <a href="{{ route('user.hapus', $row['id']) }}" class="btn btn-outline-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Konfirmasi Hapus -->

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data user ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
            {!! $user->appends(['query' => request('query')])->links('pagination::bootstrap-5') !!}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
