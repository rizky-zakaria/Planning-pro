@extends('layouts.dashboard.template')

@section('title', 'Laporan Proyek')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Waktu Pelaksanaan</h1>
    </div>

    <div class="row">
        <div class="col col-12 card shadow mb-4">
            {{-- <div class="card-header mr-0 ml-0 py-3">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h6>Filter Data</h6>
                    <form action="{{ route('laporan.proyek') }}" method="GET">
                        <select name="proyek" id="dataProyek" class="form-control col-md-3">
                            <option value="all" {{ $selectedProyek=='all' ? 'selected' : '' }}>Semua Proyek</option>
                            @foreach ($proyeks as $proyek)
                            <option value="{{ $proyek->id }}" {{ $selectedProyek==$proyek->id ? 'selected' : '' }}>
                                {{ $proyek->nama_proyek }}
                            </option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-warning mt-4"><i
                                class="fas fa-filter mr-3"></i>Filter</button>
                    </form>
                </div>
                <div class="col-md-6 col-12 text-md-right text-center">
                    <a href="{{ route('print.proyek') }}?proyek={{ $selectedProyek }}"
                        class="btn btn-danger mt-4 col-md-2 col-12" target="_blank">
                        <i class="fas fa-print mr-3"></i>Print
                    </a>
                </div>
            </div>
        </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Intansi</th>
                                <th>Pekerjaan</th>
                                <th>Tanggal Mulai</th>
                                <th>Waktu Penyelesaian</th>
                                <th>Tanggal Selesai</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                        <tr>
                            <th>Intansi</th>
                            <th>Pekerjaan</th>
                            <th>Tanggal Mulai</th>
                            <th>Waktu Penyelesaian</th>
                            <th>Tanggal Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> --}}
                        <tbody>
                            @foreach ($durasis as $durasi)
                                <tr>
                                    <td>{{ $durasi->instansi->nama_instansi }}</td>
                                    <td>{{ $durasi->instansi->tujuan_proyek }}</td>
                                    <td>{{ $durasi->tanggal_mulai }}</td>
                                    <td>{{ $durasi->lama_pengerjaan }} Hari</td>
                                    <td>{{ $durasi->tanggal_selesai }}</td>
                                    <td>{{ $durasi->keterangan }}</td>
                                    <td>
                                        <a href="{{ $durasi->dokumen_spmk }}" target="_blank" class="dropdown-item"><i
                                                class="fas fa-eye mr-2"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
