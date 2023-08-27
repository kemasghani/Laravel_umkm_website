@extends('layouts.app')
@section('content')
@include('components.navbar')
@include('components.sidebar')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Jumlah UMKM</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$jumlah_umkm}}</h6>
                    </div>
                </div>

            </div>
        </div>
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Jumlah Per Kecamatan</h5>
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['daerah'] }}</h5>
                                <p class="card-text">Jumlah: {{ $item['jumlah'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


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
                            <h5>Pengembalian Berkas Formulir Pendaftaran UMKM Kabupaten Maros Pada Dinas UMKM Maros
                                Untuk melakukan validasi Data UMKM</h5>

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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>


@endsection