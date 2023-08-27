@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')
    <main id="main" class="main">

        <div class="pagetitle">
            @include('components.alert')
            <h1>Formulir</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Upload Berkas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            @if ($user->status == 2)
                <div class="alert alert-info  alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Terima Kasih Sudah melakukan pendaftaran</h4>
                    <p class="mb-0">Silahkan Menunggu konfirmasi Dari Petugas</p>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-4 text-center">
                            <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">1</button>
                            <h6 class="mt-2">Bukti Formulir Pendaftaran</h6>
                            <a class="btn btn-success btn-sm rounded-pill" href="{{ route('user.download-pdf') }}"><i class="bi bi-download"></i> Download</a>
                        </div>
                        <div class="col-md-4 text-center">
                                <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">2</button>
                                <h6 class="mt-2">Formulir Pemilik UMKM</h6>
                                <a class="btn btn-success btn-sm rounded-pill" href="{{ route('user.show-pdf') }}"><i class="bi bi-eye-fill"></i> Lihat formulir</a>
                            </div>
                        <div class="col-sm-4 text-center">
                                <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">3</button>
                                <h6 class="mt-2">Pengumuman</h6>
                                <a class="btn btn-success btn-sm rounded-pill" href="{{ route('user.pengumuman') }}"><i class="bi bi-eye-fill"></i> Lihat pengumuman</a>
                        </div>
                    </div>
                </div>
                
            @else
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Upload Berkas</h5>
                                <form class="row g-3" action="{{ route('user.document.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <label for="kartu_keluarga" class="col-form-label bold">Kartu Keluarga (KK)</label>
                                        <div class="col-sm-12">
                                            <span class="badge bg-success"><i class="bi bi-check-lg me-1"></i> Sudah Upload</span>
                                            <span class="badge bg-success"><a href="{{ asset('storage/' . $data->kartu_keluarga) }}" class="text-white" target="_blank"><i class="bi bi-download me-1"></i> Lihat Berkas</a></span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="ktp" class="col-form-label bold">Kartu Tanda Penduduk (KTP)</label>
                                        <div class="col-sm-12">
                                            <span class="badge bg-success"><i class="bi bi-check-lg me-1"></i> Sudah Upload</span>
                                            <span class="badge bg-success"><a href="{{ asset('storage/' . $data->ktp) }}" class="text-white" target="_blank"><i class="bi bi-download me-1"></i> Lihat Berkas</a></span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="nib" class="col-form-label bold">NIB (Nomor Induk Berusaha)</label>
                                        <div class="col-sm-12">
                                            <span class="badge bg-success"><i class="bi bi-check-lg me-1"></i> Sudah Upload</span>
                                            <span class="badge bg-success"><a href="{{ asset('storage/' . $data->nib) }}" class="text-white" target="_blank"><i class="bi bi-download me-1"></i> Lihat Berkas</a></span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="tempat" class="col-form-label bold">Foto Tempat Usaha</label>
                                        <div class="col-sm-12">
                                            <span class="badge bg-success"><i class="bi bi-check-lg me-1"></i> Sudah Upload</span>
                                            <span class="badge bg-success"><a href="{{ asset('storage/' . $data->tempat) }}" class="text-white" target="_blank"><i class="bi bi-download me-1"></i> Lihat Berkas</a></span>
                                        </div>
                                    </div>
                                    <script>
                                        // preview image after file is selected
                                        function previewImage(input, previewId) {
                                            var preview = document.getElementById(previewId);
                                            var file = input.files[0];
                                            var reader = new FileReader();

                                            reader.onloadend = function() {
                                                preview.src = reader.result;
                                                preview.style.display = 'block';
                                            }

                                            if (file) {
                                                reader.readAsDataURL(file);
                                            } else {
                                                preview.src = "#";
                                                preview.style.display = 'none';
                                            }
                                        }

                                        // call previewImage function when file input changes
                                        document.getElementById('kartu_keluarga').addEventListener('change', function() {
                                            previewImage(this, 'kartu_keluarga_preview');
                                        });

                                        document.getElementById('ktp').addEventListener('change', function() {
                                            previewImage(this, 'ktp_preview');
                                        });

                                        document.getElementById('nib').addEventListener('change', function() {
                                            previewImage(this, 'nib_preview');
                                        });

                                        document.getElementById('tempat').addEventListener('change', function() {
                                            previewImage(this, 'tempat_preview');
                                        });
                                    </script>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
            
        </section>

    </main><!-- End #main -->
@endsection
