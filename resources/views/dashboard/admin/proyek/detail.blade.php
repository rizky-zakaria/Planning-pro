@extends('layouts.dashboard.template')

@section('title', 'Detail Proyek')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Proyek {{ $proyek->nama_proyek }}</h1>
    <p class="text-secondary">

        <a href="{{ route('proyek.index') }}">Proyek </a>
        <span><i class="fas fa-angle-right"></i></span>
        <span>Detail Proyek</span>
    </p>
</div>

<div class="row">

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Proyek</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">

            </div>
        </div>
    </div>

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Uraian Pekerjaan</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
            </div>
        </div>
    </div>


</div>
@endsection