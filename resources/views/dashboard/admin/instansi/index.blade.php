@extends('layouts.dashboard.template')

@section('title', 'Page Instansi')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Halaman Instansi</h1>
</div>


<div class="row">
    <div class="col col-12 card shadow mb-4">
        <div class="d-flex card-header justify-content-between align-items-center mr-0 ml-0 py-3">
            <h5 class="m-0 font-weight-bold text-primary float-left">List Data Instansi</h5>
            <button class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal"
                data-target="#tambahInstansi"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
                Instansi</button>
        </div>
        <!-- Modal Tambah Instansi-->
        <div class="modal fade" id="tambahInstansi" tabindex="-1" role="dialog" aria-labelledby="tambahInstansiLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-between">
                        <h5 class="modal-title" id="tambahInstansiLabel">Tambah Instansi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('instansi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="namaInstansi">Nama Instansi:</label>
                                <input type="text" class="form-control" name="nama_instansi" id="namaInstansi" required>
                            </div>
                            <div class="mb-3">
                                <label for="programInstansi">Program Instansi:</label>
                                <input type="text" class="form-control" name="program_instansi" id="programInstansi"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="kegiatanInstansi">Kegiatan Instansi:</label>
                                <input type="text" class="form-control" name="kegiatan_instansi" id="kegiatanInstansi"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="tujuanProyek">Tujuan Proyek:</label>
                                <input type="text" class="form-control" name="tujuan_proyek" id="tujuanProyek" required>
                            </div>
                            <div class="mb-3">
                                <label for="lokasiInstansi">Lokasi Instansi:</label>
                                <input type="text" class="form-control" name="lokasi_instansi" id="lokasiInstansi"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="tahunAnggaran">Tahun Anggaran:</label>
                                <input type="text" class="form-control" name="tahun_anggaran" id="tahunAnggaran"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="dokumenSpk">Dokumen Surat Perjanjian Kerja (SPK):</label>
                                <input type="file" class="form-control" name="dokumen_spk" id="dokumenSpk" required>
                            </div>
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
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink" style="">
                                        <a class="dropdown-item" href="{{ $instansi->dokumen_spk }}"><i
                                                class="fa fa-eye mr-2"></i>Lihat Dokumen</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#editInstansi-{{ $instansi->id }}"><i
                                                class="fa fa-edit mr-2"></i>Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#hapusInstansi-{{ $instansi->id }}"><i
                                                class="fa fa-trash mr-2"></i>Hapus</a>
                                    </div>
                                </div>
                            </td>
                            <!-- Modal Edit Instansi-->
                            <div class="modal fade" id="editInstansi-{{ $instansi->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editInstansiLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-between">
                                            <h5 class="modal-title" id="editInstansiLabel">Edit Instansi {{
                                                $instansi->nama_instansi }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('instansi.update', $instansi->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="namaInstansi required">Nama Instansi:</label>
                                                    <input type="text" class="form-control" name="nama_instansi"
                                                        id="namaInstansi" value="{{ $instansi->nama_instansi }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="programInstansi required">Program Instansi:</label>
                                                    <input type="text" class="form-control" name="program_instansi"
                                                        id="programInstansi" value="{{ $instansi->program_instansi }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kegiatanInstansi required">Kegiatan Instansi:</label>
                                                    <input type="text" class="form-control" name="kegiatan_instansi"
                                                        id="kegiatanInstansi" value="{{ $instansi->kegiatan_instansi }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tujuanProyek required">Tujuan Proyek:</label>
                                                    <input type="text" class="form-control" name="tujuan_proyek"
                                                        id="tujuanProyek" value="{{ $instansi->tujuan_proyek }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lokasiInstansi required">Lokasi Instansi:</label>
                                                    <input type="text" class="form-control" name="lokasi_instansi"
                                                        id="lokasiInstansi" value="{{ $instansi->lokasi_instansi }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tahunAnggaran required">Tahun Anggaran:</label>
                                                    <input type="text" class="form-control" name="tahun_anggaran"
                                                        id="tahunAnggaran" value="{{ $instansi->tahun_anggaran }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dokumenSpk">Dokumen Surat Perjanjian Kerja:</label>
                                                    <input type="file" class="form-control" name="dokumen_spk"
                                                        id="dokumenSpk">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}

                            <!-- Modal Hapus-->
                            <div class="modal fade" id="hapusInstansi-{{ $instansi->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus {{
                                                $instansi->nama_instansi }}?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('instansi.destroy', $instansi->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">Pilih "Hapus" dibawah ini jika anda siap untuk
                                                menghapus data instansi.
                                            </div>
                                            <div class="px-3">
                                                <sup class="text-danger">Catatan: ini akan menghapus urainnya dan semua
                                                    yang terhubung ke instansi ini</sup>
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
@endsection