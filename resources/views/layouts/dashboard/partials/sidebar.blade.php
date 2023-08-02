<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ asset('assets/dashboard/img/gambar.png') }}" alt="SIPP" class="w-100">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">SIPP</div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is($user->role . '/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route($user->role . '.dashboard') }}">
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
        <li class="nav-item {{ Request::is($user->role . '/instansi') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('instansi.index') }}">
                <i class="fas fa-fw fa-project-diagram"></i>
                <span>Data Instansi</span></a>
        </li>
        {{-- <li class="nav-item {{ Request::is($user->role . '/proyek') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('proyek.index') }}">
            <i class="fas fa-fw fa-project-diagram"></i>
            <span>Data Proyek</span></a>
    </li> --}}

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data Transaksi
        </div>
        {{-- <li class="nav-item {{ Request::is($user->role . '/anggaran') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('anggaran.index') }}">
            <i class="fas fa-fw fa-money-bill-alt"></i>
            <span>Data Anggaran</span></a>
    </li> --}}
        <li class="nav-item {{ Request::is($user->role . '/waktu_perencanaan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('waktu_perencanaan.index') }}">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Waktu Pelaksanaan</span></a>
        </li>
        {{-- <li class="nav-item {{ Request::is($user->role . '/ded') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('ded.index') }}">
            <i class="fas fa-fw fa-pen-nib"></i>
            <span>Rancangan DED</span></a>
    </li> --}}
    @endif


    @if ($user->role == 'estimator')
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Data Master
        </div>

        <!-- Nav Item - Charts -->
        {{-- <li class="nav-item {{ Request::is($user->role . '/instansi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('instansi.index') }}">
            <i class="fas fa-fw fa-project-diagram"></i>
            <span>Data Instansi</span></a>
    </li> --}}
        <li class="nav-item {{ Request::is($user->role . '/proyek') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('proyek.index') }}">
                <i class="fas fa-fw fa-project-diagram"></i>
                <span>Data Proyek</span></a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Data Transaksi
        </div>
        <li class="nav-item {{ Request::is($user->role . '/anggaran') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('anggaran.index') }}">
                <i class="fas fa-fw fa-money-bill-alt"></i>
                <span>Data Anggaran</span></a>
        </li>
        {{-- <li class="nav-item {{ Request::is($user->role . '/waktu_perencanaan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('waktu_perencanaan.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Waktu Pelaksanaan</span></a>
    </li> --}}
    @endif

    @if ($user->role == 'draftek')
        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Data Transaksi
        </div>
        <li class="nav-item {{ Request::is($user->role . '/ded') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ded.index') }}">
                <i class="fas fa-fw fa-pen-nib"></i>
                <span>Rancangan DED</span></a>
        </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item {{ Request::is('laporan/instansi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.instansi') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Laporan Data Instansi</span></a>
    </li>

    <li class="nav-item {{ Request::is('laporan/ded') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.ded') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Laporan Data DED</span></a>
    </li>

    <li class="nav-item {{ Request::is('laporan/waktu-pelaksanaan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.jadwal') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Laporan Jadwal</span></a>
    </li>

    <li class="nav-item {{ Request::is('laporan/proyek') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.proyek') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan Proyek</span></a>
    </li>

    <li class="nav-item {{ Request::is('laporan/rab') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan.rab') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>RAB</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
