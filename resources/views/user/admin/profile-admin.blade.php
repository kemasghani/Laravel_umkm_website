@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profile Admin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="profile-picture">
                                <br><br>
                                <center><img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Picture" class="img-circle" style="border-radius: 150px" width="150px" height="150px"></center>
                            </div>
                            <h5 class="mt-3">{{ Auth::user()->username }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#personal-info">Data Diri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#upload-photo">Upload Foto</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3">
                                <div class="tab-pane fade show active" id="personal-info">
                                    <h5>Profiles Detail</h5>
                                    <form action="{{ route('admin.umkm.edit_nama_admin') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->nama }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jabatan" class="form-label">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ Auth::user()->jabatan }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nip" class="form-label">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip" value="{{ Auth::user()->nip }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->username }}">
                                        </div>

                                        <br><br>
                                        <center><button type="submit" class="btn btn-primary">Save</button></center>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="upload-photo">
                                    <h5>Upload Foto</h5>


                                    <div class="form-group">
                                        <center><img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Picture" class="img-circle" style="border-radius: 150px" width="150px" height="150px"></center>
                                        <label for="photo">Pilih Foto</label><br>
                                        <input type="file" name="foto" class="image form-control">
                                        <div class="modal fade" id="crop-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="img-container">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <img id="crop-image" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="preview"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" id="crop-btn">Crop</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            var $cropModal = $('#crop-modal');
            var cropImage = document.getElementById('crop-image');
            var cropper;

            $("body").on("change", ".image", function(e) {
                var files = e.target.files;
                var done = function(url) {
                    cropImage.src = url;
                    $cropModal.modal('show');
                };

                var reader;
                var file;
                var url;

                if (files && files.length > 0) {
                    file = files[0];

                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $cropModal.on('shown.bs.modal', function() {
                cropper = new Cropper(cropImage, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: '.preview'
                });
            });

            $cropModal.on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            $cropModal.on('click', '.close, .btn-secondary', function() {
                $cropModal.modal('hide');
            });

            $("#crop-btn").click(function() {
                var canvas = cropper.getCroppedCanvas({
                    width: 160,
                    height: 160,
                });

                canvas.toBlob(function(blob) {
                    var formData = new FormData();
                    formData.append('foto', blob, 'foto.png');
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('id', '{{ Auth::user()->id }}');

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('admin.umkm.upload_foto') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            console.log(data);
                            $cropModal.modal('hide');
                            // alert("Crop image successfully uploaded");
                            Swal.fire(
                                'Berhasil!',
                                'Upload Foto Berhasil Disimpan',
                                'success'
                            );
                            window.location.href = "{{ route('admin.umkm.profile_admin') }}";
                        },
                        error: function(xhr, status, error) {
                            var err = JSON.parse(xhr.responseText);
                            alert(err.message);
                        }
                    });
                }, 'image/png');
            });
        </script>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span></span></strong>All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="#">Dinas Kopurindag Kabupaten Maros</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
