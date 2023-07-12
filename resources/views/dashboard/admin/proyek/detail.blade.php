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

    <!-- Data Proyek -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Proyek</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="py-2">
                    <label for="nama">Nama Proyek:</label>
                    <input type="text" class="form-control" name="nama_proyek" id="nama"
                        value="{{ $proyek->nama_proyek }}" disabled>
                </div>
                <div class="py-2">
                    <label for="nama">Total Proyek:</label>
                    <input type="text" class="form-control" name="nama_proyek" id="nama"
                        value="Rp. {{ number_format($totalBiaya, 2, ',', '.')  }}" disabled>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Uraian Pekerjaan -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Uraian Pekerjaan</h6>
                <button class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal"
                    data-target="#tambahUraian"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
                    Uraian</button>
            </div>
            <!-- Modal Tambah Uraian-->
            <div class="modal fade" id="tambahUraian" tabindex="-1" role="dialog" aria-labelledby="tambahUraianLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between">
                            <h5 class="modal-title" id="tambahUraianLabel">Tambah Uraian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('uraian.store', $proyek->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <label for="nama">Nama Uraian:</label>
                                <input type="text" class="form-control" name="nama_uraian" id="nama" required>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End Modal --}}

            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 20px">No</th>
                                <th>List Uraian Pekerjaan</th>
                                <th>Biaya</th>
                                <th style="width: 20px">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>List Uraian Pekerjaan</th>
                                <th>Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($proyek->uraians as $uraian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $uraian->nama_uraian }}</td>
                                <td>Rp. {{ number_format($uraian->total_biaya ?? 0, 2, ',', '.') }}</td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#editUraian-{{ $uraian->id }}"><i
                                                    class="fa fa-edit mr-2"></i>Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#hapusUraian-{{ $uraian->id }}"><i
                                                    class="fa fa-trash mr-2"></i>Hapus</a>
                                        </div>
                                    </div>
                                </td>
                                <!-- Modal Edit Uraian-->
                                <div class="modal fade" id="editUraian-{{ $uraian->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editUraianLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-between">
                                                <h5 class="modal-title" id="editUraianLabel">Edit Uraian {{
                                                    $uraian->nama_uraian }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('uraian.update', $uraian->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <label for=" nama">Nama Uraian:</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $uraian->nama_uraian }}" name="nama_uraian" id="nama"
                                                        required>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal --}}

                                <!-- Modal Hapus-->
                                <div class="modal fade" id="hapusUraian-{{ $uraian->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus {{
                                                    $uraian->nama_uraian }}?</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('uraian.destroy', $uraian->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">Pilih "Hapus" dibawah ini jika anda siap untuk
                                                    menghapus data uraian.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection