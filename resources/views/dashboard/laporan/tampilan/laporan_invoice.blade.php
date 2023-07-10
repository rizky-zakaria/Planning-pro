@extends('layouts.dashboard.template')

@section('title', 'Bukti Tagihan')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bukti Tagihan</h1>
</div>


<div class="row">
    <div class="col col-12 card shadow mb-4">
        <div class="d-flex card-header justify-content-between align-items-center mr-0 ml-0 py-3">
            <h5 class="m-0 font-weight-bold text-primary float-left">List Data Tagihan</h5>
            <button class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal"
                data-target="#tambahBuktiTagihan"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
                Bukti Tagihan</button>
        </div>
        <!-- Modal Tambah Instansi-->
        <div class="modal fade" id="tambahBuktiTagihan" tabindex="-1" role="dialog"
            aria-labelledby="tambahBuktiTagihanLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-between">
                        <h5 class="modal-title" id="tambahBuktiTagihanLabel">Tambah Instansi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('invoice.store') }}" method="post" enctype="multipart/form-data">
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
                            {{-- <div class="mb-3">
                                <label for="statusTagihan">Status Tagihan</label>
                                <select name="status" id="statusTagihan" class="form-control">
                                    <option value="Diajukan">Diajukan</option>
                                    <option value="Dibayarkan">Dibayarkan</option>
                                </select>
                            </div> --}}
                            <div class="mb-3">
                                <label for="tanggal">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                            </div>
                            <div class="mb-3">
                                <label for="buktiTagihan">Upload Bukti Tagihan</label>
                                <input type="file" class="form-control" name="invoice" id="buktiTagihan" required>
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
                            <th>Status Pengajuan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Bukti Invoice</th>
                            <th style="width: 20px">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Proyek</th>
                            <th>Status Pengajuan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Bukti Invoice</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->proyek->nama_proyek }}</td>
                            <td>{{ $invoice->status }}</td>
                            <td>{{ $invoice->tanggal }}</td>
                            <td>
                                <a href="{{ $invoice->invoice }}" target="_blank"><i
                                        class="fas fa-file-alt mr-3"></i>Lihat
                                    Bukti Tagihan</a>
                            </td>
                            <td>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink" style="">
                                        <a class="dropdown-item" href="{{ route('invoice.show', $invoice->id) }}"><i
                                                class="fa fa-check-double mr-2"></i>Update Status</a>

                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#editInvoice-{{ $invoice->id }}"><i
                                                class="fa fa-edit mr-2"></i>Ubah Data</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#hapusInvoice-{{ $invoice->id }}"><i
                                                class="fa fa-trash mr-2"></i>Hapus</a>
                                    </div>
                                </div>
                            </td>
                            <!-- Modal Edit Instansi-->
                            <div class="modal fade" id="editInvoice-{{ $invoice->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editInvoiceLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-between">
                                            <h5 class="modal-title" id="editInvoiceLabel">Ubah Bukti Invoice {{
                                                $invoice->proyek->nama_proyek }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('invoice.update', $invoice->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="namaProyek">Proyek</label>
                                                    <select name="proyek" id="namaProyek" class="form-control">
                                                        <option value="{{ $invoice->proyek_id }}">{{
                                                            $invoice->proyek->nama_proyek }}</option>
                                                        @foreach ($proyeks as $proyek)
                                                        <option value="{{ $proyek->id }}">{{ $proyek->nama_proyek }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal">Tanggal Pengajuan</label>
                                                    <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                        value="{{ $invoice->tanggal }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="buktiTagihan">Upload Bukti Tagihan</label>
                                                    <input type="file" class="form-control" name="invoice"
                                                        id="buktiTagihan">
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
                            <div class="modal fade" id="hapusInvoice-{{ $invoice->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus bukti
                                                tagihan{{
                                                $invoice->proyek->nama_proyek }}?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('invoice.destroy', $invoice->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">Pilih "Hapus" dibawah ini jika anda siap untuk
                                                menghapus invoice.
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