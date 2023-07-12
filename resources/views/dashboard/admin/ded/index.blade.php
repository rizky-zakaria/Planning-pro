@extends('layouts.dashboard.template')

@section('title', 'Desain Perencanaan')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Desain Perencanaan</h1>
</div>


<div class="row">
    <div class="col col-12 card shadow mb-4">
        <div class="d-flex card-header justify-content-between align-items-center mr-0 ml-0 py-3">
            <h5 class="m-0 font-weight-bold text-primary float-left">Desain DED (Detail Engineering Design)</h5>
            <button class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal"
                data-target="#tambahDesain"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
                DED</button>
        </div>
        <!-- Modal Tambah Instansi-->
        <div class="modal fade" id="tambahDesain" tabindex="-1" role="dialog" aria-labelledby="tambahDesainLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-between">
                        <h5 class="modal-title" id="tambahDesainLabel">Tambah DED</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('ded.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="namaProyek">Proyek</label>
                                <select name="proyek" id="namaProyek" class="form-control">
                                    @foreach ($proyeks as $proyek)
                                    <option value="{{ $proyek->id }}">{{ $proyek->nama_proyek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                {{-- <label for="dokumenKontrak">Upload Desain</label>
                                <input type="file" class="form-control" name="dokumen" id="dokumenKontrak" required>
                                --}}
                                <div class="text-center">
                                    <label for="imageInput" class="custom-file-upload">
                                        <i class="fas fa-cloud-upload-alt"></i> Choose File
                                    </label>
                                    <input type="file" id="imageInput" name="ded" required>
                                </div>
                                <small class="form-text text-muted text-center">JPG or PNG no larger than 5 MB</small>
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
                            <th>Nama Proyek</th>
                            <th>Gambar Desain</th>
                            <th style="width: 20px">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Proyek</th>
                            <th>Gambar Desain</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
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
                            <td>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink" style="">
                                        {{-- <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#editDokumen-{{ $kontrak->id }}"><i
                                                class="fa fa-edit mr-2"></i>Ubah Data</a> --}}
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#hapusDesain-{{ $desain->id }}"><i
                                                class="fa fa-trash mr-2"></i>Hapus</a>
                                    </div>
                                </div>
                            </td>
                            <!-- Modal Edit Instansi-->
                            {{-- <div class="modal fade" id="editDokumen-{{ $kontrak->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editDokumenLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-between">
                                            <h5 class="modal-title" id="editDokumenLabel">Ubah Dokumen Kontrak {{
                                                $kontrak->proyek->nama_proyek }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('dokumen_kontrak.update', $kontrak->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="namaProyek">Proyek</label>
                                                    <select name="proyek" id="namaProyek" class="form-control">
                                                        <option value="{{ $kontrak->proyek_id }}">{{
                                                            $kontrak->proyek->nama_proyek }}</option>
                                                        @foreach ($proyeks as $proyek)
                                                        <option value="{{ $proyek->id }}">{{ $proyek->nama_proyek }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dokumenKontrak">Upload Bukti Tagihan</label>
                                                    <input type="file" class="form-control" name="dokumen"
                                                        id="dokumenKontrak">
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
                            </div> --}}
                            {{-- End Modal --}}


                            <!-- Modal Hapus-->
                            <div class="modal fade" id="hapusDesain-{{ $desain->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus desain
                                                perancangan{{
                                                $desain->proyek->nama_proyek }}?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('ded.destroy', $desain->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">Pilih "Hapus" dibawah ini jika anda siap untuk
                                                menghapus desain perancangan.
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
<style>
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        background-color: #f8f9fa;
    }

    .custom-file-upload:hover {
        background-color: #e9ecef;
    }

    #imageInput {
        display: none;
    }
</style>
@endpush