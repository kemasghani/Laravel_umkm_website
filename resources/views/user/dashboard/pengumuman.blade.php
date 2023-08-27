@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pengumuman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Pengumuman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            @if (empty($hasil->pengumuman))
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Belum Ada Pengumuman!!!</h4>
                    <p class="mb-0">Silahkan Menunggu Hasil Penilaian Dari Petugas</p>
                </div>
            @elseif ($hasil->pengumuman == 'Lulus')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Selamat Anda Lulus Seleksi UMKM!!!</h4>
                    <p class="mb-0">Semoga Usahanya Tetap Lancar, Sukses terus Dan Tetap Semangat!!!</p>
                </div>
            @else
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Mohon Maaf Anda Tidak Lulus Seleksi UMKM!!!</h4>
                    <p class="mb-0">Silahkan Anda Coba Lagi Dan Menunggu Seleksi Tahap Selanjutnya, Tetap Semangat!!!</p>
                </div>
            @endif
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
