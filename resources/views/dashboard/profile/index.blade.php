@extends('layouts.dashboard.template')

@section('title', 'Page Profil')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Halaman Profile</h1>
</div>

<!-- Account page navigation-->
<hr class="mt-0 mb-4" />
<div class="row justify-content-center">
    <div class="col-md-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">Photo Profil</div>
            <div class="card-body text-center">
                <!-- Profile picture image-->
                <img class="rounded-circle mb-2" style="height: 10rem"
                    src="{{ $user->photo_profile ? $user->photo_profile : asset('assets/dashboard/img/avatar_male.svg') }}"
                    alt="" />
                <!-- Profile picture help block-->
                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                <!-- Profile picture upload button-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                    Upload new image
                </button>

            </div>
        </div>
    </div>

    <!-- Modal Upload Gambar-->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('updatePhoto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="text-center">
                            <label for="imageInput" class="custom-file-upload">
                                <i class="fas fa-cloud-upload-alt"></i> Choose File
                            </label>
                            <input type="file" id="imageInput" name="photo" accept="image/*" required>
                        </div>
                        <small class="form-text text-muted text-center">JPG or PNG no larger than 5 MB</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="uploadBtn">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Detail Akun</div>

            <div class="card-body">
                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">Nama Depan</label>
                            <input class="form-control" id="inputFirstName" type="text" name="nama_depan"
                                placeholder="Masukan nama depan" value="{{ $user->nama_depan }}" />
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Nama Belakang</label>
                            <input class="form-control" id="inputLastName" type="text" name="nama_belakang"
                                placeholder="Masukan nama belakang" value="{{ $user->nama_belakang }}" />
                        </div>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputPhone">Nomor Telepon</label>
                            <input class="form-control" id="inputPhone" type="tel" name="nomor_telepon"
                                placeholder="Masukan nomor telepon" value="{{ $user->nomor_telepon }}" />
                        </div>
                        <!-- Form Group (birthday)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputEmail">Email</label>
                            <input class="form-control" id="inputEmail" type="email" name="email"
                                placeholder="Masukan Email" value="{{ $user->email }}" />
                        </div>
                    </div>
                    <!-- Form Group (Password)-->
                    <label class="small" for="inputPassword">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" id="inputPassword" name="password" class="form-control"
                            placeholder="Ubah Password (jika diperlukan)">
                        <div class="input-group-append">
                            <span class="input-group-text" id="togglePassword">
                                <i class="fas fa-fw fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Form Group (Alamat)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputAlamat">Alamat</label>
                        <input class="form-control" id="inputAlamat" type="text" name="alamat"
                            placeholder="Masukan alamat" value="{{ $user->alamat }}" />
                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                </form>
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

@push('script')
<script>
    $(document).ready(function() {
            $('#togglePassword').click(function() {
                const passwordInput = $('#inputPassword');
                const passwordFieldType = passwordInput.attr('type');

                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                    $('#togglePassword i').removeClass('fe-eye').addClass('fe-eye-off');
                } else {
                    passwordInput.attr('type', 'password');
                    $('#togglePassword i').removeClass('fe-eye-off').addClass('fe-eye');
                }
            });
        });
</script>
@endpush