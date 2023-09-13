@extends('layouts.dashboard.template')

@section('title', 'Page Proyek')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Proyek</h1>
    </div>


    <div class="row">
        <div class="col col-12 card shadow mb-4">
            <div class="card-header mr-0 ml-0 py-3">
                <div class="row">
                    <div class="col-md-11 col-12">
                        <h6>Filter Data</h6>
                        <form action="{{ route('proyek.index') }}" method="GET">
                            <select name="instansi" id="dataInstansi" class="form-control col-md-4">
                                <option value="all" {{ $selectedInstansi == 'all' ? 'selected' : '' }}>Semua Proyek
                                </option>
                                @foreach ($instansis as $instansi)
                                    <option value="{{ $instansi->id }}"
                                        {{ $selectedInstansi == $instansi->id ? 'selected' : '' }}>
                                        {{ $instansi->nama_instansi }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <button type="submit" class="btn btn-warning mt-4"><i class="fas fa-filter mr-3"></i>Filter</button>
                    </form>
                </div>
            </div>

            <div class="d-flex card-header justify-content-between align-items-center mr-0 ml-0 py-3">
                <h5 class="m-0 font-weight-bold text-primary float-left">List Data Proyek</h5>
                <button class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal"
                    data-target="#tambahProyek"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
                    Proyek</button>
            </div>
            <!-- Modal Tambah Proyek-->
            <div class="modal fade" id="tambahProyek" tabindex="-1" role="dialog" aria-labelledby="tambahProyekLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between">
                            <h5 class="modal-title" id="tambahProyekLabel">Tambah Pekerjaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('proyek.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="namaInstansi">Nama Instansi:</label>
                                    <select name="instansi_id" id="namaInstansi" class="form-control">
                                        @foreach ($instansis as $instansi)
                                            <option value="{{ $instansi->id }}" style="font-size: 11px">
                                                {{ $instansi->nama_instansi }} ({{ $instansi->tujuan_proyek }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="nama">Sub Pekerjaan:</label>
                                <input type="text" class="form-control" name="nama_proyek" id="nama" required>

                                <h5 class="font-weight-bold modal-title mt-4">Uraian Pekerjaan</h5>
                                <div id="uraian-container">
                                    <div class="uraian-input form-group">
                                        <label for="uraian">Uraian Pekerjaan 1:</label>
                                        <div class="input-group">
                                            <input type="text" name="uraian[]" class="form-control" required>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger hapus-uraian">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="tambah-uraian" class="btn btn-primary"><i
                                        class="fa fa-plus mr-2"></i>Uraian</button>

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
                                <th style="width: 20px">No</th>
                                <th>Instansi</th>
                                <th>Sub Pekerjaan</th>
                                <th>List Uraian Pekerjaan</th>
                                <th style="width: 20px">Aksi</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>List Uraian Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> --}}
                        <tbody>
                            @foreach ($proyeks as $proyek)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $proyek->nama_instansi }}</td>
                                    <td>{{ $proyek->nama_proyek }}</td>
                                    <td>
                                        @foreach ($proyek->uraians as $uraian)
                                            <ul class="list-with-icon">
                                                <li>{{ $uraian->nama_uraian }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink" style="">
                                                <a class="dropdown-item" href="{{ route('proyek.show', $proyek->id) }}"><i
                                                        class="fa fa-eye mr-2"></i>Detail</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#editProyek-{{ $proyek->id }}"><i
                                                        class="fa fa-edit mr-2"></i>Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#hapusProyek-{{ $proyek->id }}"><i
                                                        class="fa fa-trash mr-2"></i>Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Modal Edit Proyek-->
                                    <div class="modal fade" id="editProyek-{{ $proyek->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editProyekLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-between">
                                                    <h5 class="modal-title" id="editProyekLabel">Edit Proyek
                                                        {{ $proyek->nama_proyek }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('proyek.update', $proyek->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <label for="nama">Nama Proyek:</label>
                                                        <input type="text" class="form-control" name="nama_proyek"
                                                            id="nama" value="{{ $proyek->nama_proyek }}" required>
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
                                    <div class="modal fade" id="hapusProyek-{{ $proyek->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus
                                                        {{ $proyek->nama_proyek }}?</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('proyek.destroy', $proyek->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">Pilih "Hapus" dibawah ini jika anda siap untuk
                                                        menghapus data proyek.
                                                    </div>
                                                    <div class="px-3">
                                                        <sup class="text-danger">Catatan: ini akan menghapus urainnya dan
                                                            semua
                                                            yang terhubung ke proyek ini</sup>
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

@push('style')
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
@endpush
@push('script')
    <script>
        document.getElementById('tambah-uraian').addEventListener('click', function() {
            const container = document.getElementById('uraian-container');
            const count = container.getElementsByClassName('uraian-input').length;

            const uraianInput = document.createElement('div');
            uraianInput.classList.add('uraian-input', 'form-group');

            const label = document.createElement('label');
            label.textContent = `Uraian Pekerjaan ${count + 1}:`;

            const inputGroup = document.createElement('div');
            inputGroup.classList.add('input-group');

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'uraian[]';
            input.classList.add('form-control');
            input.required = true;

            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.classList.add('btn', 'btn-danger', 'hapus-uraian');
            deleteButton.innerHTML = '<i class="fas fa-trash"></i>';

            const inputGroupAppend = document.createElement('div');
            inputGroupAppend.classList.add('input-group-append');
            inputGroupAppend.appendChild(deleteButton);

            inputGroup.appendChild(input);
            inputGroup.appendChild(inputGroupAppend);

            uraianInput.appendChild(label);
            uraianInput.appendChild(inputGroup);
            container.appendChild(uraianInput);

            // Tambahkan event listener untuk menghapus uraian saat tombol "Hapus Uraian" ditekan
            deleteButton.addEventListener('click', function() {
                uraianInput.remove();
            });
        });
    </script>
@endpush
