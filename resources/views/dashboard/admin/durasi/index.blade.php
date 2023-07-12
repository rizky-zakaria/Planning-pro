@extends('layouts.dashboard.template')

@section('title', 'Page Durasi')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Halaman Waktu Pelaksanaan Proyek</h1>
</div>


<div class="row">
    <div class="col col-12 card shadow mb-4">
        <div class="d-flex card-header justify-content-between align-items-center mr-0 ml-0 py-3">
            <h5 class="m-0 font-weight-bold text-primary float-left">Waktu Pelaksanaan</h5>
            <button class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal"
                data-target="#tambahDurasi"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
                Waktu Pelaksanaan</button>
        </div>
        <!-- Modal Tambah Waktu Perencanaan-->
        <div class="modal fade" id="tambahDurasi" tabindex="-1" role="dialog" aria-labelledby="tambahDurasiLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-between">
                        <h5 class="modal-title" id="tambahDurasiLabel">Tambah Waktu Pelaksanaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('waktu_perencanaan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tujuanProyek">Tujuan Proyek:</label>
                                <select name="instansi" id="tujuanProyek" class="form-control" required>
                                    @foreach ($instansis as $instansi)
                                    <option value="{{ $instansi->id }}">{{ $instansi->tujuan_proyek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="waktuPelaksanaan">Waktu Penyelesaian:</label>
                                <input type="number" class="form-control" name="lama_pengerjaan"
                                    placeholder="masukan angka" id="waktuPelaksanaan" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggalMulai">Tanggal Mulai:</label>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggalMulai" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggalSelesai">Tanggal Selesai:</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggalSelesai"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="dokumenSpmk">Dokumen Surat Perintah Mulai Kerja (SPMK):</label>
                                <input type="file" class="form-control" name="dokumen_spmk" id="dokumenSpmk" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan:</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5" placeholder="Keterangan"
                                    class="form-control"></textarea>
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
                            <th>Intansi</th>
                            <th>Pekerjaan</th>
                            <th>Tanggal Mulai</th>
                            <th>Waktu Penyelesaian</th>
                            <th>Tanggal Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Intansi</th>
                            <th>Pekerjaan</th>
                            <th>Tanggal Mulai</th>
                            <th>Waktu Penyelesaian</th>
                            <th>Tanggal Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
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
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#editWaktu-{{ $durasi->id }}"><i class="fa fa-edit mr-2"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#hapusWaktu-{{ $durasi->id }}"><i class="fa fa-trash mr-2"></i></a>
                            </td>

                            <!-- Modal Edit Instansi-->
                            <div class="modal fade" id="editWaktu-{{ $durasi->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editWaktuLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-between">
                                            <h5 class="modal-title" id="editWaktuLabel">Edit Waktu Pelaksanaan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('waktu_perencanaan.update', $durasi->id) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="tujuanProyek">Tujuan Proyek:</label>
                                                    <select name="instansi" id="tujuanProyek" class="form-control"
                                                        required>
                                                        <option value="{{ $durasi->instansi_id }}">{{
                                                            $durasi->instansi->tujuan_proyek }}</option>
                                                        @foreach ($instansis as $instansi)
                                                        <option value="{{ $instansi->id }}">{{ $instansi->tujuan_proyek
                                                            }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="waktuPelaksanaan">Waktu Penyelesaian:</label>
                                                    <input type="number" class="form-control" name="lama_pengerjaan"
                                                        placeholder="masukan angka"
                                                        value="{{ $durasi->lama_pengerjaan }}" id="waktuPelaksanaan"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggalMulai">Tanggal Mulai:</label>
                                                    <input type="date" class="form-control"
                                                        value="{{ $durasi->tanggal_mulai }}" name="tanggal_mulai"
                                                        id="tanggalMulai" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggalSelesai">Tanggal Selesai:</label>
                                                    <input type="date" class="form-control"
                                                        value="{{ $durasi->tanggal_selesai }}" name="tanggal_selesai"
                                                        id="tanggalSelesai" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dokumenSpmk">Dokumen Surat Perintah Mulai Kerja
                                                        (SPMK):</label>
                                                    <input type="file" class="form-control" name="dokumen_spmk"
                                                        id="dokumenSpmk">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="keterangan">Keterangan:</label>
                                                    <textarea name="keterangan" id="keterangan" cols="30" rows="5"
                                                        placeholder="Keterangan"
                                                        class="form-control">{{ $durasi->keterangan }}</textarea>
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
                            <div class="modal fade" id="hapusWaktu-{{ $durasi->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus ?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('waktu_perencanaan.destroy', $durasi->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">Pilih "Hapus" dibawah ini jika anda siap untuk
                                                menghapus waktu pelaksanaan.
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