@extends('layouts.dashboard.template')

@section('title', 'Laporan Data Instansi')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan DED</h1>
    </div>

    <div class="row">
        <div class="col col-12 card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Proyek</th>
                                <th>Gambar Desain</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                        <tr>
                            <th>Nama Proyek</th>
                            <th>Gambar Desain</th>
                        </tr>
                    </tfoot> --}}
                        <tbody>
                            @foreach ($proyeks as $proyek)
                                @php
                                    $baris = count($proyek->desain) + 1;
                                @endphp
                                @if ($proyek->desain->isNotEmpty())
                                    <tr>
                                        <td rowspan="{{ $baris }}">{{ $proyek->nama_proyek }}</td>
                                    </tr>
                                @endif
                                @foreach ($proyek->desain as $desain)
                                    <tr>
                                        <td>
                                            <a href="{{ $desain->ded }}" target="_blank" class="mr-3"><i
                                                    class="fas fa-eye mr-2"></i>Lihat DED</a> |
                                            <a href="{{ $desain->ded }}" target="_blank" class="mr-3" download=""><i
                                                    class="fas fa-download mr-2"></i>Download
                                                DED</a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
