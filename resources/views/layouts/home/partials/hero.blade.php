<div id="fh5co-hero-wrapper">
    <nav class="container navbar navbar-expand-lg main-navbar-nav navbar-light">
        <a class="navbar-brand" href="">SIPP</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-items-center ml-auto">
                <li class="nav-item active">
                    @guest
                    <a class="nav-link btn btn-warning pl-4 pr-4" href="{{ route('login') }}">Login</a>
                    @endguest
                    @auth
                    @if (auth()->user()->role == 'admin')
                    <a class="nav-link btn btn-primary pl-4 pr-4" href="{{ route('admin.dashboard')}}">Dashboard</a>
                    @elseif (auth()->user()->role == 'direktur')
                    <a class="nav-link btn btn-primary pl-4 pr-4" href="{{ route('direktur.dashboard')}}">Dashboard</a>
                    @elseif (auth()->user()->role == 'estimator')
                    <a class="nav-link btn btn-primary pl-4 pr-4" href="{{ route('estimator.dashboard')}}">Dashboard</a>
                    @else
                    <a class="nav-link btn btn-primary pl-4 pr-4" href="{{ route('draftek.dashboard')}}">Dashboard</a>
                    @endif
                    @endauth
                </li>
            </ul>
        </div>
    </nav>

    <div class="container fh5co-hero-inner">
        <h1 class="animated fadeIn wow" data-wow-delay="0.4s">Sistem Informasi Perencanaan Proyek
        </h1>
        {{-- <p class="animated fadeIn wow" data-wow-delay="0.67s">Memberikan Solusi Terkait Perencanaan Projek Dan
            Racangan
            Anggaran Yang Anda Hadapi </p> --}}
        <p class="animated fadeIn wow" data-wow-delay="0.672">CV Arvil Tunggal'29 Enginnering Consultant merupakan
            perusahaan yang bergerak di bidang jasa konsultasi.</p>
        <img class="fh5co-hero-smartphone animated fadeInRight wow w-100 h-50" data-wow-delay="1s"
            src="{{ asset('assets/dashboard/img/gambar.jpeg') }}" alt="Smartphone">
    </div>


</div> <!-- first section wrapper -->