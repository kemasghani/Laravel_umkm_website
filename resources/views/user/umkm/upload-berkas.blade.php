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
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Upload Berkas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Upload Berkas</h5>
                            @if (empty($users))
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">Belum Melakukan Pengisian Formulir!!!</h4>
                                    <p class="mb-0">Silahkan Isi Dan Lengkapi Formulir Terlebih Dahulu</p>
                                </div>
                            @else
                                <form class="row g-3" action="{{ route('user.document.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="col-12">
                                        <label for="kartu_keluarga" class="col-form-label bold">Kartu Keluarga (KK)</label>
                                        <p class="text-secondary h6">Unggah Kartu Keluarga kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control-file" name="kartu_keluarga" id="kartu_keluarga" accept="image/*">
                                            <img id="kartu_keluarga_preview" src="#" alt="preview" style="display: none; height: 200px; margin-top: 10px;">
                                            @if ($errors->has('kartu_keluarga'))
                                                <p class="text-danger">{{ $errors->first('kartu_keluarga') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="ktp" class="col-form-label bold">Kartu Tanda Penduduk (KTP)</label>
                                        <p class="text-secondary h6">Unggah Kartu Tanda Penduduk kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control-file" name="ktp" id="ktp" accept="image/*">
                                            <img id="ktp_preview" src="#" alt="preview" style="display: none; height: 200px; margin-top: 10px;">
                                            @if ($errors->has('ktp'))
                                                <p class="text-danger">{{ $errors->first('ktp') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="nib" class="col-form-label bold">NIB (Nomor Induk Berusaha)</label>
                                        <p class="text-secondary h6">Unggah NIB (Nomor Induk Berusaha) dalam format <strong>pdf</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control-file" name="nib" id="nib" accept="application/pdf">
                                            <embed id="nib_preview" src="#" alt="preview" height="300" width="300" style="display: none; height: 200px; margin-top: 10px;">
                                            @if ($errors->has('nib'))
                                                <p class="text-danger">{{ $errors->first('nib') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="tempat" class="col-form-label bold">Foto Tempat Usaha</label>
                                        <p class="text-secondary h6">Unggah foto tempat usaha kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control-file" name="tempat" id="tempat" accept="image/*">
                                            <img id="tempat_preview" src="#" alt="preview" style="display: none; height:200px; margin-top: 10px;">
                                            @if ($errors->has('tempat'))
                                                <p class="text-danger">{{ $errors->first('tempat') }}</p>
                                            @endif

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
                                    <!-- add submit button and other form elements here -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Upload File</button>
                                    </div>
                                </form>
                            @endif
                            
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
