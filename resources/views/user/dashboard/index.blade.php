@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section dashboard">
            @if ($umkm !== null)
                @if ($umkm->status == 2)
                    <div class="alert alert-info  alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Terima Kasih Sudah melakukan pendaftaran</h4>
                        <p class="mb-0">Silahkan menunggu konfirmasi dari petugas</p>
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4 text-center">
                                <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">1</button>
                                <h6 class="mt-2"> Bukti Formulir Pendaftaran</h6>
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
                @elseif ($umkm->status == 3)
                    <div class="alert alert-info  alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Terima Kasih Sudah melakukan pendaftaran</h4>
                        <p class="mb-0">Selamat anda berhasil melakukan pendaftaran</p>
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4 text-center">
                                <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">1</button>
                                <h5 class="mt-2">Bukti Formulir Pendaftaran</h5>
                                <a class="btn btn-success btn-sm rounded-pill" href="{{ route('user.download-pdf') }}"><i class="bi bi-download"></i> Download</a>
                            </div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">2</button>
                                <h5 class="mt-2">Formulir Pemilik UMKM</h5>
                                <a class="btn btn-success btn-sm rounded-pill" href="{{ route('user.show-pdf') }}"><i class="bi bi-eye-fill"></i> Lihat formulir</a>
                            </div>
                            <div class="col-sm-4 text-center">
                                <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">3</button>
                                <h5 class="mt-2">Pengumuman</h5>
                                <a class="btn btn-success btn-sm rounded-pill" href="{{ route('user.pengumuman') }}"><i class="bi bi-eye-fill"></i> Lihat pengumuman</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <!-- Recent Activity -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengumuman <span>| Today</span></h5>

                    <div class="activity">
                        <div class="activity-item d-flex">
                            <div class="activite-label">Announcement!!</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                                <h5>Kelengkapan Berkas untuk Validasi Data UMKM Kabupaten Maros</h5>
                                <p>berkas persyaratan pendaftaran Validasi Data UMKM Kabupaten Maros, berupa :</p>
                                <ol>
                                    <li>Formulir Pendaftaran UMKM Pada Website</li>
                                    <li>Foto copy Kartu Keluarga (1 lembar);</li>
                                    <li>Foto copy Surat Keterangan Usaha (SKU)/ Nomor Induk Berusaha (NIB);</li>
                                    <li>Foto copy KTP (1 lembar);</li>
                                    <li>Foto Tempat Usaha</li>
                                    <li>Foto ukuran 4 x 6 ( 1 lembar)</li>
                                </ol>
                            </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                            <div class="activite-label">Announcement!!</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                                <h5>Pengembalian Berkas Formulir Pendaftaran UMKM Kabupaten Maros Pada Dinas UMKM Maros Untuk melakukan validasi Data UMKM</h5>

                            </div>
                        </div><!-- End activity item-->

                    </div>

                </div>
            </div><!-- End Recent Activity -->

        </section>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong></strong>All Rights Reserved
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
