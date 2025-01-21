<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon">
        <img src="{{ asset('img/Logo_Shape.png') }}" alt="Brand Icon" style="width: 50%; height: auto; margin-left: 10px">
    </div>
    <div class="sidebar-brand-text">
        <img src="{{ asset('img/Logo_Teks.png') }}" alt="Brand Icon" style="width: 100%; height: auto; margin-right: 100px; padding-right: 40px;">
    </div>
</a>


  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePergudangan" aria-expanded="true" aria-controls="collapsePergudangan">
      <i class="fas fa-fw fa-warehouse"></i>
      <span>Gudang</span>
    </a>
    <div id="collapsePergudangan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-primary py-2 collapse-inner rounded">
        <a class="collapse-item text-white bg-primary" href="{{ route('barang') }}">Barang</a>
        <a class="collapse-item text-white bg-primary" href="{{ route('kategori') }}">Kategori</a>
        <a class="collapse-item text-white bg-primary" href="{{ route('supplier') }}">Supplier</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun" aria-expanded="true" aria-controls="collapseAkun">
        <i class="fas fa-fw fa-users"></i>
        <span>Akun</span>
        </a>
    <div id="collapseAkun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-primary py-2 collapse-inner rounded">
            <a class="collapse-item text-white bg-primary" href="{{ route('pegawai') }}">Pegawai</a>
            <a class="collapse-item text-white bg-primary" href="{{ route('role') }}">Role</a>
            <a class="collapse-item text-white bg-primary" href="{{ route('user') }}">User</a>
        </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePulsa" aria-expanded="true" aria-controls="collapsePulsa">
      <i class="fas fa-fw fa-mobile-alt"></i>
      <span>Pulsa</span>
    </a>
    <div id="collapsePulsa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-primary py-2 collapse-inner rounded">
        <a class="collapse-item text-white bg-primary" href="{{ route('provider') }}">Provider</a>
        <a class="collapse-item text-white bg-primary" href="{{ route('prefix') }}">Prefix</a>
        <a class="collapse-item text-white bg-primary" href="{{ route('pulsa') }}">Produk Pulsa</a>
      </div>
    </div>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
