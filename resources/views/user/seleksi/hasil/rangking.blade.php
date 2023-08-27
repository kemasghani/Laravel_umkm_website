@extends('layouts.app')

@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Hasil Perangkingan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Data Hasil Perangkingan</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="card-title"><b class="bi bi-calculator-fill"> HASIL PERANGKINGAN</b></div>


                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Kode Alternatif</th>
                                        <th>Nama Alternatif</th>
                                        <th>NIK</th>
                                        <th>Nama Usaha</th>
                                        <th>Jenis Usaha</th>
                                        <th>NIB</th>
                                        <th>Alamat Rumah</th>
                                        <th>Alamat Usaha</th>
                                        <th>No Telepon/HP</th>
                                        <th>Nilai Total</th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasil as $a)
                                        <tr>
                                            <td class="text-center">{{ $a->alternatif->kode_alternatif }}</td>
                                            <td>{{ $a->alternatif->umkm->nama_pemilik }}</td>
                                            <td class="text-center">{{ $a->alternatif->umkm->nik }}</td>
                                            <td>{{ $a->alternatif->umkm->nama_usaha }}</td>
                                            <td>{{ $a->alternatif->umkm->jenis_usaha }}</td>
                                            <td class="text-center">{{ $a->alternatif->umkm->nib }}</td>
                                            <td>{{ $a->alternatif->umkm->alamat_rumah }}</td>
                                            <td>{{ $a->alternatif->umkm->alamat_usaha }}</td>
                                            <td class="text-center">{{ $a->alternatif->umkm->no_hp }}</td>
                                            <td class="text-center">{{ $a->nilai_akhir }}</td>
                                            <td class="text-center"><b>{{ $loop->iteration }}</b></td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <div class="my-2">
                                <a  href="{{ route('admin.seleksi.rangking.pdf') }}" target="_blank" class ="btn btn-success"><i class="bi bi-file-pdf-fill"></i> Cetak Hasil</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
