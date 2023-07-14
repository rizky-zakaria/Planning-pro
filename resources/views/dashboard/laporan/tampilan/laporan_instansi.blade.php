@extends('layouts.dashboard.template')

@section('title', 'Laporan Data Instansi')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Data Instansi</h1>
</div>

<div class="row">
    <div class="col col-12 card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Instansi</th>
                            <th>Program Instansi</th>
                            <th>Kegiatan Instansi</th>
                            <th>Tujuan Proyek</th>
                            <th>Lokasi Instansi</th>
                            <th>Tahun Anggaran</th>
                            <th style="width: 20px">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Instansi</th>
                            <th>Program Instansi</th>
                            <th>Kegiatan Instansi</th>
                            <th>Tujuan Proyek</th>
                            <th>Lokasi Instansi</th>
                            <th>Tahun Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($instansis as $instansi)
                        <tr>
                            <td>{{ $instansi->nama_instansi }}</td>
                            <td>{{ $instansi->program_instansi }}</td>
                            <td>{{ $instansi->kegiatan_instansi }}</td>
                            <td>{{ $instansi->tujuan_proyek }}</td>
                            <td>{{ $instansi->lokasi_instansi }}</td>
                            <td>{{ $instansi->tahun_anggaran }}</td>
                            <td>
                                <a href="{{ $instansi->dokumen_spk }}" target="_blank"
                                    class="dropdown-item {{ $instansi->dokumen_spk == null ? 'disabled' : '' }}"><i
                                        class="fas fa-eye mr-2"></i>Dokumen</a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection