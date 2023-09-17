@extends('layouts.dashboard.template')

@section('title', 'Page Anggaran')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Rancangan Anggaran</h1>
    </div>

    <div class="row">
        <div class="col col-12 card shadow mb-4">
            <div class="card-header mr-0 ml-0 py-3">
                <div class="row">
                    <div class="col-md-11 col-12">
                        <h6>Filter Data</h6>
                        <form action="{{ route('anggaran.index') }}" method="GET">
                            <select name="proyek" id="dataProyek" class="form-control col-md-4">
                                <option value="all" {{ $selectedProyek == 'all' ? 'selected' : '' }}>Semua Proyek
                                </option>
                                @foreach ($proyeks as $proyek)
                                    <option value="{{ $proyek->id }}"
                                        {{ $selectedProyek == $proyek->id ? 'selected' : '' }}>
                                        {{ $proyek->nama_proyek }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <button type="submit" class="btn btn-warning mt-4"><i class="fas fa-filter mr-3"></i>Filter</button>
                    </form>
                </div>
            </div>
            <div class="d-flex card-header justify-content-between align-items-center mr-0 ml-0 py-3">
                <h5 class="m-0 font-weight-bold text-primary float-left">List Data Anggaran</h5>
                <button class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal"
                    data-target="#tambahInstansi"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
                    Anggaran</button>
            </div>

            <!-- Modal Tambah Instansi-->
            <div class="modal fade" id="tambahInstansi" tabindex="-1" role="dialog" aria-labelledby="tambahInstansiLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between">
                            <h5 class="modal-title" id="tambahInstansiLabel">Tambah RAB</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('anggaran.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="uraian">Uraian Pekerjaan:</label>
                                    <select name="uraian_id" id="uraian" class="form-control">
                                        @foreach ($uraians as $uraian)
                                            <option value="{{ $uraian->id }}">
                                                {{ $uraian->nama_uraian .
                                                    " (Proyek
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        " .
                                                    $uraian->proyek->nama_proyek .
                                                    ' )' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="namaItem">Nama Item:</label>
                                    <input type="text" class="form-control"
                                        placeholder="Contoh (Pekerjaan papan nama proyek)" name="nama_item" id="namaItem"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="satuan">Satuan:</label>
                                    <input type="text" class="form-control" min="1" max="4" name="satuan"
                                        id="satuan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="volumen">Volume:</label>
                                    <input type="number" step="0.01" class="form-control" name="volume" id="volumen"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="hargaSatuan">Harga Satuan:</label>
                                    <input type="number" step="0.01" class="form-control" name="harga_satuan"
                                        id="hargaSatuan" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="number" class="btn btn-primary">Simpan</button>
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
                                <th>No</th>
                                <th>Nama Instansi</th>
                                <th>Nama Pekerjaan</th>
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
                                <th>No</th>
                                <th>Nama Instansi</th>
                                <th>Nama Pekerjaan</th>
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
                            @foreach ($uraians as $uraian)
                                @php
                                    $jumlahBaris = count($uraian->rabs) + 1;
                                @endphp
                                <tr>
                                    <td rowspan="{{ $jumlahBaris }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $jumlahBaris }}">{{ $uraian->proyek->instansi->nama_instansi }}</td>
                                    <td rowspan="{{ $jumlahBaris }}">{{ $uraian->proyek->nama_proyek }}</td>
                                    <td rowspan="{{ $jumlahBaris }}">{{ $uraian->nama_uraian }}</td>
                                    @forelse ($uraian->rabs as $anggaran)
                                <tr>
                                    <td>{{ $anggaran->nama_item ?? '-' }}</td>
                                    <td>{{ $anggaran->satuan ?? '-' }}</td>
                                    <td>{{ $anggaran->volume ?? '-' }}</td>
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
                                    <!-- Modal Edit anggaran-->
                                    <div class="modal fade" id="editAnggaran-{{ $anggaran->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editAnggaranLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-between">
                                                    <h5 class="modal-title" id="editAnggaranLabel">Edit Anggaran
                                                        {{ $anggaran->nama_item }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('anggaran.update', $anggaran->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="uraian">Uraian Pekerjaan:</label>
                                                            <select name="uraian_id" id="uraian" class="form-control">
                                                                <option value="{{ $anggaran->uraian_id }}">
                                                                    {{ $anggaran->uraian->nama_uraian }}</option>
                                                                @foreach ($uraians as $uraian)
                                                                    <option value="{{ $uraian->id }}">
                                                                        {{ $uraian->nama_uraian }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="namaItem">Nama Item:</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Contoh (Pekerjaan papan nama proyek)"
                                                                name="nama_item" id="namaItem"
                                                                value="{{ $anggaran->nama_item }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="satuan">Satuan:</label>
                                                            <input type="text" class="form-control" min="1"
                                                                max="4" name="satuan" id="satuan"
                                                                value="{{ $anggaran->satuan }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="volumen">Volume:</label>
                                                            <input type="number" step="0.01" class="form-control"
                                                                name="volume" id="volumen"
                                                                value="{{ $anggaran->volume }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="hargaSatuan">Harga Satuan:</label>
                                                            <input type="number" step="0.01" class="form-control"
                                                                name="harga_satuan" id="hargaSatuan"
                                                                value="{{ $anggaran->harga_satuan }}" required>
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
                                    <div class="modal fade" id="hapusAnggaran-{{ $anggaran->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus
                                                        {{ $anggaran->nama_item }}?</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('anggaran.destroy', $anggaran->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">Pilih "Hapus" dibawah ini jika anda siap untuk
                                                        menghapus data anggaran.
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
                            @empty
                                {{-- <td colspan="7" class="text-center">Belum Ada Data</td> --}}
                                {{-- <tr> --}}
                                <td colspan="9" class="text-center">Belum Ada Data</td>
                                {{--
                        </tr> --}}
                            @endforelse
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
