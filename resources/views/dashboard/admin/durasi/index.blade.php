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
                <button class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal" data-target="#tambahDurasi"><i
                        class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah
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
                                    <label for="tujuanProyek">Pekerjaan:</label>
                                    <select name="instansi" id="tujuanProyek" class="form-control" required>
                                        @foreach ($instansis as $instansi)
                                            <option value="{{ $instansi->id }}">{{ $instansi->tujuan_proyek }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="waktuPelaksanaan">Waktu Penyelesaian (Hari):</label>
                                    <input type="number"
                                        class="form-control @error('lama_pengerjaan')
                                        is-invalid
                                    @enderror"
                                        name="lama_pengerjaan" placeholder="masukan angka" id="waktuPelaksanaan"
                                        onclick="autoJumlahHari()" required>
                                </div>
                                <div class="tgl_mulai" id="#tgl_mulai">
                                </div>
                                <div class="mb-3">
                                    <label for="dokumenSpmk">Dokumen Surat Perintah Mulai Kerja (SPMK):</label>
                                    <input type="file"
                                        class="form-control @error('dokumen_spmk')
                                        is-invalid
                                    @enderror"
                                        name="dokumen_spmk" id="dokumenSpmk" required>
                                    @error('dokumen_spmk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan">Keterangan:</label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="5" placeholder="Keterangan" class="form-control"></textarea>
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
                        {{-- <tfoot>
                            <tr>
                                <th>Intansi</th>
                                <th>Pekerjaan</th>
                                <th>Tanggal Mulai</th>
                                <th>Waktu Penyelesaian</th>
                                <th>Tanggal Selesai</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot> --}}
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
                                            data-target="#editWaktu-{{ $durasi->id }}"><i
                                                class="fa fa-edit mr-2"></i></a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#hapusWaktu-{{ $durasi->id }}"><i
                                                class="fa fa-trash mr-2"></i></a>
                                    </td>

                                    <!-- Modal Edit Instansi-->
                                    <div class="modal fade" id="editWaktu-{{ $durasi->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editWaktuLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-between">
                                                    <h5 class="modal-title" id="editWaktuLabel">Edit Waktu Pelaksanaan
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('waktu_perencanaan.update', $durasi->id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="tujuanProyek">Pekerjaan:</label>
                                                            <select name="instansi" id="tujuanProyek"
                                                                class="form-control" required>
                                                                <option value="{{ $durasi->instansi_id }}">
                                                                    {{ $durasi->instansi->tujuan_proyek }}</option>
                                                                @foreach ($instansis as $instansi)
                                                                    <option value="{{ $instansi->id }}">
                                                                        {{ $instansi->tujuan_proyek }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="waktuPelaksanaan">Waktu Penyelesaian
                                                                (Hari):</label>
                                                            <input type="number" class="form-control"
                                                                name="lama_pengerjaan" placeholder="masukan angka"
                                                                value="{{ $durasi->lama_pengerjaan }}"
                                                                id="waktuPelaksanaan" required>
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
                                                                value="{{ $durasi->tanggal_selesai }}"
                                                                name="tanggal_selesai" id="tanggalSelesai" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="dokumenSpmk">Dokumen Surat Perintah Mulai Kerja
                                                                (SPMK):</label>
                                                            <input type="file"
                                                                class="form-control @error('dokumen_spmk')
                                                                is-invalid
                                                            @enderror"
                                                                name="dokumen_spmk" id="dokumenSpmk">
                                                            @error('dokumen_spmk')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan">Keterangan:</label>
                                                            <textarea name="keterangan" id="keterangan" cols="30" rows="5" placeholder="Keterangan"
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
                                    <div class="modal fade" id="hapusWaktu-{{ $durasi->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus ?
                                                    </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
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

@push('script')
    <script>
        function autoJumlahHari() {
            deleteForm();
            $(".tgl_mulai").append(`
             <div class="mb-3" id="col-tgl-start">
                <label for="tanggalMulai">Tanggal Mulai:</label>
                <input type="date" class="form-control @error('tanggal_mulai')
                                        is-invalid
                                    @enderror" name="tanggal_mulai" id="tanggalMulai"
                    onchange="autoEndDate()" required>
                    @error('tanggal_mulai')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3" id="col-tgl-end">
                <label for="tanggalSelesai">Tanggal Selesai:</label>
                <input type="date" class="form-control"
                    id="tanggalSelesai" disabled required>
                <input type="hidden" class="form-control @error('tanggal_selesai')
                                        is-invalid
                                    @enderror" name="tanggal_selesai"
                id="tanggalSelesaiHidden" required>
                @error('tanggal_selesai')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            `);
        }

        function autoEndDate() {
            var tglMulai = document.getElementById('tanggalMulai');
            var waktuPelaksanaan = document.getElementById('waktuPelaksanaan');
            var startDate = new Date(tglMulai.value);
            var date = startDate.getDate();
            var dateInTwentyDays = date + Number(waktuPelaksanaan.value);
            startDate.setDate(dateInTwentyDays);
            var result = startDate.toLocaleDateString();
            var array = result.split("/");
            array = array.map(Number);
            console.log(array);
            if (Number(array[1]) < 10) {
                if (Number(array[0]) < 10) {
                    // var endDate = '0' + array[1] + "-0" + array[0] + "-" + array[2];
                    var endDate = array[2] + "-0" + array[0] + "-0" + array[1];
                    // document.getElementById('tanggalSelesai').value = "-0" + array[1] + "-0" + array[0] + array[2];
                    document.getElementById('tanggalSelesai').value = endDate;
                    document.getElementById('tanggalSelesaiHidden').value = endDate;
                } else {
                    var endDate = array[2] + "-" + array[0] + "-0" + array[1]
                    // document.getElementById('tanggalSelesai').value = "-0" + array[1] + "-" + array[0] + array[2];
                    document.getElementById('tanggalSelesai').value = endDate;
                    document.getElementById('tanggalSelesaiHidden').value = endDate;
                }
            } else {
                if (Number(array[0]) < 10) {
                    var endDate = array[2] + "-0" + array[0] + "-" + array[1];
                    // document.getElementById('tanggalSelesai').value = array[1] + "-0" + array[0] + "-" + array[2];
                    document.getElementById('tanggalSelesai').value = endDate;
                    document.getElementById('tanggalSelesaiHidden').value = endDate;
                } else {
                    var endDate = array[2] + "-" + array[0] + "-" + array[1];
                    // document.getElementById('tanggalSelesai').value = array[1] + "-" + array[0] + "-" + array[2];
                    document.getElementById('tanggalSelesai').value = endDate;
                    document.getElementById('tanggalSelesaiHidden').value = endDate;
                }
            }

            var hasil = endDate;
            // document.getElementById('tanggalSelesai').value = hasil;
        }

        function deleteForm() {
            $("#col-tgl-start").remove();
            $("#col-tgl-end").remove();
        }
    </script>
@endpush
