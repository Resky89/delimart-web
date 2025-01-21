@extends('layouts.app')

@section('contents')
  <div class="row">
    <div class="col-12 mb-4">
      <h1 class="h3 mb-2 text-gray-800">Gudang</h1>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Barang yang Terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard[0]['total_barang'] ?? 'N/A' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-box fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Kategori yang Terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard[0]['total_kategori'] ?? 'N/A' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Supplier yang Terdaftar
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $dashboard[0]['total_supplier'] ?? 'N/A'}}</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-truck fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 mb-4">
      <h1 class="h3 mb-2 text-gray-800">Akun</h1>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Pegawai yang Terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard[0]['total_pegawai'] ?? 'N/A' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Role yang Terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard[0]['total_role'] ?? 'N/A' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-tag fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">User yang Terdaftar
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $dashboard[0]['total_user'] ?? 'N/A' }}</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 mb-4">
      <h1 class="h3 mb-2 text-gray-800">Pulsa</h1>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Provider yang Terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard[0]['total_provider'] ?? 'N/A' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-server fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Prefix yang Terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard[0]['total_prefix'] ?? 'N/A' }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-wrench fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Produk Pulsa yang Terdaftar
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $dashboard[0]['total_pulsa'] ?? 'N/A' }}</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
