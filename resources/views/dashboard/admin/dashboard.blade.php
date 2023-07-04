@extends('layouts.dashboard.template')

@section('title', 'Dashboard Admin')


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<h5>Selamat datang {{ $user->nama_lengkap }} anda login sebagai <b>{{ $user->role }}</b></h5>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Proyek</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $proyekCount ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Uraian Pekerjaan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $uraianCount ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rancangan Anggaran
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $rabCount ?? 0 }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Waktu Perencanaan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $waktuCount ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-5 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Data Proyek</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 20px">No</th>
                                <th>Nama Proyek</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th>Dibuat</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($proyeks as $proyek)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $proyek->nama_proyek }}</td>
                                <td>{{ $proyek->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-7 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Data Waktu Perencanaan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tableWaktuPerencanaan" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 20px">No</th>
                                <th>Uraian Pekerjaan</th>
                                <th>Waktu Perencanaan</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Uraian Pekerjaan</th>
                                <th>Waktu Perencanaan</th>
                                <th>Dibuat</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($uraians as $uraian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $uraian->nama_uraian }}</td>
                                <td>{{ $uraian->durasi->hari ?? 'belum terinput'}}</td>
                                <td>{{ $uraian->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Update Data Anggaran</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableAnggaran" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Proyek</th>
                        <th>Total Anggaran</th>
                        <th>Uraian Pekerjaan</th>
                        <th>Anggaran</th>
                        <th>Item Pekerjaan</th>
                        <th>Anggaran</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Proyek</th>
                        <th>Total Anggaran</th>
                        <th>Uraian Pekerjaan</th>
                        <th>Anggaran</th>
                        <th>Item Pekerjaan</th>
                        <th>Anggaran</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($proyeks as $item => $proyek)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $proyek->nama_proyek }}</td>
                        <td>{{ $anggaranProyek[$item] }}</td>
                        <td>
                            @foreach ($proyek->uraians as $uraian)
                            {{ $uraian->nama_uraian }} <br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($proyek->uraians as $uraian)
                            {{ $uraian->total_biaya }} <br>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

@endsection

@push('style')

@endpush

@push('script')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#tableWaktuPerencanaan').DataTable();
        $('#tableAnggaran').DataTable();
    });
    
</script>
@endpush