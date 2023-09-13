@extends('layouts.dashboard.template')

@section('title', 'Laporan Proyek')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Data Proyek</h1>
    </div>

    <div class="row">
        <div class="col col-12 card shadow mb-4">
            <div class="card-header mr-0 ml-0 py-3">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h6>Filter Data</h6>
                        <form action="{{ route('laporan.proyek') }}" method="GET">
                            <select name="proyek" id="dataProyek" class="form-control col-md-3">
                                <option value="all" {{ $selectedProyek == 'all' ? 'selected' : '' }}>Semua Proyek
                                </option>
                                @foreach ($proyeks as $proyek)
                                    <option value="{{ $proyek->id }}"
                                        {{ $selectedProyek == $proyek->id ? 'selected' : '' }}>
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Proyek</th>
                                <th>Total Anggaran</th>
                                <th>Uraian Pekerjaan</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                        <tr>
                            <th>Nama Proyek</th>
                            <th>Total Anggaran</th>
                            <th>Uraian Pekerjaan</th>
                            <th>Total Harga</th>
                        </tr>
                    </tfoot> --}}
                        <tbody>
                            @foreach ($proyeks as $proyek)
                                @php
                                    $jumlah = 0;
                                    foreach ($proyek->uraians as $uraian) {
                                        $jumlah += $uraian->total_biaya;
                                    }
                                    
                                    $jumlahBaris = $proyek->uraians->count() + 1;
                                @endphp
                                <tr>
                                    <td rowspan="{{ $jumlahBaris }}">{{ $proyek->nama_proyek }}</td>
                                    <td rowspan="{{ $jumlahBaris }}">Rp. {{ number_format($jumlah, 2, ',', '.') }}</td>
                                    @foreach ($proyek->uraians as $uraian)
                                <tr>
                                    <td>{{ $uraian->nama_uraian }}</td>
                                    <td>Rp. {{ number_format($uraian->total_biaya ?? 0, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
