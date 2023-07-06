<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIPP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is($user->role.'/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route($user->role.'.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if ($user->role == 'admin')

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>


    <!-- Nav Item - Charts -->
    <li class="nav-item {{ Request::is($user->role.'/instansi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('instansi.index') }}">
            <i class="fas fa-fw fa-project-diagram"></i>
            <span>Data Instansi</span></a>
    </li>
    <li class="nav-item {{ Request::is($user->role.'/proyek') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('proyek.index') }}">
            <i class="fas fa-fw fa-project-diagram"></i>
            <span>Data Proyek</span></a>
    </li>
    <li class="nav-item {{ Request::is($user->role.'/anggaran') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('anggaran.index') }}">
            <i class="fas fa-fw fa-money-bill-alt"></i>
            <span>Data RAB</span></a>
    </li>
    <li class="nav-item {{ Request::is($user->role.'/waktu_perencanaan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('waktu_perencanaan.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Waktu Perencanaan</span></a>
    </li>

    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item {{ Request::is($user->role.'/laporan/rab') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('waktu_perencanaan.index') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>RAB</span></a>
    </li>
    <li class="nav-item {{ Request::is($user->role.'/laporan/durasi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('waktu_perencanaan.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Waktu Perencanaan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>