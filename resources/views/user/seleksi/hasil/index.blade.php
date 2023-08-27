@extends('layouts.app')

@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Perhitungan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Data Perhitungan</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                        <div class="card-title"><b class="bi bi-table">  PENILAIAN ALTERNATIF</b></div>
                  
                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Kode Alternatif</th>
                                            <th rowspan="2">Nama Alternatif</th>
                                            <th rowspan="2">NIK</th>
                                            <th rowspan="2">Nama Usaha</th>
                                            <th rowspan="2">Jenis Usaha</th>
                                            <th rowspan="2">NIB</th>
                                            <th rowspan="2">Email</th>
                                            <th rowspan="2">No Telepon/HP</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->nama_kriteria }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $a->kode_alternatif }}</td>
                                                <td>{{ $a->umkm->nama_pemilik }}</td>
                                                <td class="text-center">{{ $a->umkm->nik }}</td>
                                                <td>{{ $a->umkm->nama_usaha }}</td>
                                                <td>{{ $a->umkm->jenis_usaha }}</td>
                                                <td class="text-center">{{ $a->umkm->nib }}</td>
                                                <td>{{ $a->umkm->email }}</td>
                                                <td class="text-center">{{ $a->umkm->no_hp }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $nilai[$a->id][$k->id]['nama_sub'] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="card-title"><b class="bi bi-table">  BOBOT ALTERNATIF</b></div>

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Kode Alternatif</th>
                                            <th rowspan="2">Nama Alternatif</th>
                                            <th rowspan="2">NIK</th>
                                            <th rowspan="2">Nama Usaha</th>
                                            <th rowspan="2">Jenis Usaha</th>
                                            <th rowspan="2">NIB</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->kode_kriteria }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $a->kode_alternatif }}</td>
                                                <td>{{ $a->umkm->nama_pemilik }}</td>
                                                <td class="text-center">{{ $a->umkm->nik }}</td>
                                                <td>{{ $a->umkm->nama_usaha }}</td>
                                                <td>{{ $a->umkm->jenis_usaha }}</td>
                                                <td class="text-center">{{ $a->umkm->nib }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $nilai[$a->id][$k->id]['bobot'] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="card-title"><b class="bi bi-table">  PEMETAAN GAP</b></div>

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Alternatif</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->kode_kriteria }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->kode_alternatif }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $nilai[$a->id][$k->id]['bobot'] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach

                                        <tr class="bg-secondary text-white">
                                            <td class="text-center" colspan="2">Target</td>
                                            @foreach ($aspek as $asp)
                                                @foreach ($asp->kriteria as $k)
                                                    <td class="text-center">{{ $k->target }}</td>
                                                @endforeach
                                            @endforeach
                                        </tr>

                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->kode_alternatif }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $gap[$a->id][$k->id] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="card-title"><b class="bi bi-table">  BOBOT NILAI GAP PROFILE MATCHING</b></div>

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Selisih</th>
                                            <th>Bobot</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($selisih as $s)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $s->selisih }}</td>
                                                <td class="text-center">{{ $s->bobot }}</td>
                                                <td>{{ $s->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body table-responsive">
                        <div class="card-title"><b class="bi bi-table">  PEMBOBOTAN</b></div>

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Kode Alternatif</th>
                                            <th rowspan="2">Nama Alternatif</th>
                                            <th rowspan="2">NIK</th>
                                            <th rowspan="2">Nama Usaha</th>
                                            <th rowspan="2">Jenis Usaha</th>
                                            <th rowspan="2">NIB</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->kode_kriteria }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $a->kode_alternatif }}</td>
                                                <td>{{ $a->umkm->nama_pemilik }}</td>
                                                <td class="text-center">{{ $a->umkm->nik }}</td>
                                                <td>{{ $a->umkm->nama_usaha }}</td>
                                                <td>{{ $a->umkm->jenis_usaha }}</td>
                                                <td class="text-center">{{ $a->umkm->nib }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $bobot[$a->id][$k->id] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="card-title"><b class="bi bi-table">  PERHITUNGAN CORE FACTOR DAN SECONDARY FACTOR</b></div>

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Kode Alternatif</th>
                                            <th rowspan="2">Nama Alternatif</th>
                                            <th rowspan="2">NIK</th>
                                            <th rowspan="2">Nama Usaha</th>
                                            <th rowspan="2">Jenis Usaha</th>
                                            <th rowspan="2">NIB</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) + 3 }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->kode_kriteria }}</th>
                                                @endforeach
                                                <th>Core Factor (NCF)</th>
                                                <th>Secondary Factor (NSF)</th>
                                                <th>Nilai Total</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $a->kode_alternatif }}</td>
                                                <td>{{ $a->umkm->nama_pemilik }}</td>
                                                <td class="text-center">{{ $a->umkm->nik }}</td>
                                                <td>{{ $a->umkm->nama_usaha }}</td>
                                                <td>{{ $a->umkm->jenis_usaha }}</td>
                                                <td class="text-center">{{ $a->umkm->nib }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $bobot[$a->id][$k->id] }}</td>
                                                    @endforeach
                                                    <td class="text-center">{{ $ncf[$a->id][$asp->id] }}</td>
                                                    <td class="text-center">{{ $nsf[$a->id][$asp->id] }}</td>
                                                    <td class="text-center">{{ $total[$a->id][$asp->id] }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="7"></td>
                                            @foreach ($aspek as $asp)
                                                @foreach ($asp->kriteria as $k)
                                                    <td class="text-center">{{ $k->jenis == 'cf' ? 'Core Factor' : 'Secondary Factor' }}</td>
                                                @endforeach
                                                <td colspan="3"></td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body table-responsive">
                        <div class="card-title"><b class="bi bi-table">  PERHITUNGAN HASIL AKHIR</b></div>
                       

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kode Alternatif</th>
                                            <th>Nama Alternatif</th>
                                            <th>NIK</th>
                                            <th>Nama Usaha</th>
                                            <th>Jenis Usaha</th>
                                            <th>NIB</th>
                                            <th>Alamat Rumah</th>
                                            <th>Alamat Usaha</th>
                                            <th>No Telepon/HP</th>
                                            @foreach ($aspek as $a)
                                                <th>{{ $a->nama_aspek . ' (' . $a->bobot . '%)' }}</th>
                                            @endforeach
                                            <th>Nilai Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $a->kode_alternatif }}</td>
                                                <td>{{ $a->umkm->nama_pemilik }}</td>
                                                <td class="text-center">{{ $a->umkm->nik }}</td>
                                                <td>{{ $a->umkm->nama_usaha }}</td>
                                                <td>{{ $a->umkm->jenis_usaha }}</td>
                                                <td class="text-center">{{ $a->umkm->nib }}</td>
                                                <td>{{ $a->umkm->alamat_rumah }}</td>
                                                <td>{{ $a->umkm->alamat_usaha }}</td>
                                                <td class="text-center">{{ $a->umkm->no_hp }}</td>
                                                @foreach ($aspek as $asp)
                                                    <td class="text-center">{{ $total[$a->id][$asp->id] }}</td>
                                                @endforeach
                                                <td class="text-center">{{ $akhir[$a->id] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>


                    {{-- <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Data Perhitungan</h5>

                            <div class="table-responsive">

                                <h4>Penilaian Alternatif</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Alternatif</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->nama_kriteria }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->umkm->nama_pemilik }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $nilai[$a->id][$k->id]['nama_sub'] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h4>Bobot Alternatif</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Alternatif</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->kode_kriteria }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->kode_alternatif }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $nilai[$a->id][$k->id]['bobot'] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h4>Perhitungan GAP</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Alternatif</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->kode_kriteria }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->kode_alternatif }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $nilai[$a->id][$k->id]['bobot'] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach

                                        <tr class="bg-secondary text-white">
                                            <td class="text-center" colspan="2">Target</td>
                                            @foreach ($aspek as $asp)
                                                @foreach ($asp->kriteria as $k)
                                                    <td class="text-center">{{ $k->target }}</td>
                                                @endforeach
                                            @endforeach
                                        </tr>

                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->kode_alternatif }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $gap[$a->id][$k->id] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h4>Bobot Nilai Gap</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Selisih</th>
                                            <th>Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($selisih as $s)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $s->selisih }}</td>
                                                <td class="text-center">{{ $s->bobot }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h4>Pembobotan</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Alternatif</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="{{ count($a->kriteria) }}">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                @foreach ($a->kriteria as $k)
                                                    <th>{{ $k->kode_kriteria }}</th>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->kode_alternatif }}</td>
                                                @foreach ($aspek as $asp)
                                                    @foreach ($asp->kriteria as $k)
                                                        <td class="text-center">{{ $bobot[$a->id][$k->id] }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h4>Perhitungan Core dan Secondary Factor</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Alternatif</th>
                                            @foreach ($aspek as $a)
                                                <th colspan="3">{{ $a->nama_aspek }}</th>
                                            @endforeach
                                        </tr>
                                        <tr class="text-center">
                                            @foreach ($aspek as $a)
                                                <th>NCF</th>
                                                <th>NSF</th>
                                                <th>Total</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->kode_alternatif }}</td>
                                                @foreach ($aspek as $asp)
                                                    <td class="text-center">{{ $ncf[$a->id][$asp->id] }}</td>
                                                    <td class="text-center">{{ $nsf[$a->id][$asp->id] }}</td>
                                                    <td class="text-center">{{ $total[$a->id][$asp->id] }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h4>Hasil Akhir</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            <th>Nilai Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $a->kode_alternatif }} - {{ $a->umkm->nama_pemilik }}</td>
                                                <td class="text-center">{{ $akhir[$a->id] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h4>Penentuan Ranking</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Rangking</th>
                                            <th>Alternatif</th>
                                            <th>Nilai Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rangking as $r)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $r->alternatif->kode_alternatif }} - {{ $r->alternatif->umkm->nama_pemilik }}</td>
                                                <td class="text-center">{{ $r->nilai_akhir }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <p>
                                    Dari hasil perhitungan maka diperoleh hasil keputusan alternatif <b>{{ $first->alternatif->umkm->nama_pemilik }}</b> dengan nilai <b>{{ $first->nilai_akhir }}</b> sebagai UMKM yang terpilih
                                </p>

                                <div class="mt-2">
                                    <a href="{{ route('admin.seleksi.hasil.pdf') }}" target="_blank" class="btn btn-success"><i class="bi bi-file-pdf-fill"></i> Export PDF</a>
                                </div>
                            </div>

                        </div>
                    </div> --}}

                </div>
            </div>
        </section>
    </main>
@endsection
