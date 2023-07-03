@extends('layouts.dashboard.template')

@section('title', 'Page Proyek')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Halaman Proyek</h1>
</div>


<div class="row">
    <div class="col col-12 card shadow mb-4">
        <div class="d-flex card-header justify-content-between align-items-center mr-0 ml-0 py-3">
            <h5 class="m-0 font-weight-bold text-primary float-left">List Data Proyek</h5>
            <button class="btn btn-sm btn-primary shadow-sm float-right"><i
                    class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
                Proyek</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($proyeks as $proyek)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $proyek->nama_proyek }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection