@extends('layouts.app')

@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Penilaian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Data Penilaian</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <a href="{{ route('admin.seleksi.penilaian.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">DETAIL DATA UMKM</h5>

                            <table class="table">
                                <tr>
                                    <td width="250">Kode Alternatif</td>
                                    <td>{{ $penilaian->alternatif->kode_alternatif }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Alternatif</td>
                                    <td>{{ $penilaian->alternatif->umkm->nama_pemilik }}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $penilaian->alternatif->umkm->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Usaha</td>
                                    <td>{{ $penilaian->alternatif->umkm->nama_usaha }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Usaha</td>
                                    <td>{{ $penilaian->alternatif->umkm->jenis_usaha }}</td>
                                </tr>
                                <tr>
                                    <td>NIB</td>
                                    <td>{{ $penilaian->alternatif->umkm->nib }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Rumah</td>
                                    <td>{{ $penilaian->alternatif->umkm->alamat_rumah }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Usaha</td>
                                    <td>{{ $penilaian->alternatif->umkm->alamat_usaha }}</td>
                                </tr>
                                <tr>
                                    <td>Modal Usaha</td>
                                    <td>{{ number_format($penilaian->alternatif->umkm->modal) }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Tenaga Kerja</td>
                                    <td>{{ $penilaian->alternatif->umkm->jumlah_karyawan }}</td>
                                </tr>
                                <tr>
                                    <td>Lama Usaha</td>
                                    <td>{{ $penilaian->alternatif->umkm->lama_usaha }}</td>
                                </tr>
                                <tr>
                                    <td>Omset Usaha</td>
                                    <td>{{ number_format($penilaian->alternatif->umkm->omset_usaha) }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $penilaian->alternatif->umkm->email }}</td>
                                </tr>
                                <tr>
                                    <td>No Telepon/HP</td>
                                    <td>{{ $penilaian->alternatif->umkm->no_hp }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">DETAIL PENILAIAN</h5>

                            @foreach ($aspek as $a)

                            <div class="card-title"><b class="bi bi-table">  {{ $a->nama_aspek }}</b></div>
                                <table class="table mb-4">
                                    @foreach ($a->kriteria as $k)
                                        <tr>
                                            <td width="250">{{ $k->nama_kriteria }}</td>
                                            <td>{{ $nilai[$k->id] }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
