@extends('layouts.dashboard.template')

@section('title', 'Laporan RAB')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Rancangan Anggaran Biaya (RAB)</h1>
</div>

<div class="row">
    <div class="col col-12 card shadow mb-4">
        <div class="card-header mr-0 ml-0 py-3">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h6>Filter Data</h6>
                    <form action="{{ route('laporan.rab') }}" method="GET">
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
                    <a href="{{ route('print.rab') }}?rab-proyek={{ $selectedProyek }}"
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
                            <th>ID</th>
                            <th>Uraian</th>
                            <th>Nama Item</th>
                            <th>Satuan</th>
                            <th>Volume</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Uraian</th>
                            <th>Nama Item</th>
                            <th>Satuan</th>
                            <th>Volume</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($proyeks as $proyek)
                        @foreach ($proyek->uraians as $uraian)
                        @php
                        $jumlahBaris = count($uraian->rabs) +1;
                        @endphp
                        <tr>
                            <td rowspan="{{ $jumlahBaris }}">{{ $uraian->id }}</td>
                            <td rowspan="{{ $jumlahBaris }}">{{ $uraian->nama_uraian }}</td>
                            @forelse ($uraian->rabs as $anggaran)

                        <tr>
                            <td>{{ $anggaran->nama_item ?? '-'}}</td>
                            <td>{{ $anggaran->satuan ?? '-'}}</td>
                            <td>{{ $anggaran->volume ?? '-'}}</td>
                            <td>Rp. {{ number_format($anggaran->harga_satuan ?? 0, 2, ',', '.') }}</td>
                            <td>Rp. {{ number_format($anggaran->harga_total_per_item ?? 0, 2, ',', '.') }}</td>
                            <td>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink" style="">
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#editAnggaran-{{ $anggaran->id }}"><i
                                                class="fa fa-edit mr-2"></i>Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#hapusAnggaran-{{ $anggaran->id }}"><i
                                                class="fa fa-trash mr-2"></i>Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <td colspan="9" class="text-center">Belum Ada Data</td>
                        @endforelse
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

{{-- @push('style')
<style>
    ul.list-with-icon li {
        position: relative;
        padding-left: 20px;
        list-style: none;
    }

    ul.list-with-icon li::before {
        content: '\f105';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }
</style>
@endpush --}}