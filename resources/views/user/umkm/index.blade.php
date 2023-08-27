@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">


    <main id="main" class="main">

        <div class="pagetitle">
            @include('components.alert')
            <h1>Formulir</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Formulir UMKM</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    @if ($umkm == null or $umkm->status != 2)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Formulir Pendaftaran UMKM</h5>
                                <!-- Vertical Form -->
                                <ul class="nav nav-tabs nav-tabs-bordered d-flex mb-4  " id="borderedTabJustified" role="tablist">
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100 active" id="pilihan-sekolah-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-pilihan-sekolah" type="button" role="tab" aria-controls="pilihan-sekolah" aria-selected="true">Pilihan Kecamatan</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-data-diri" type="button" role="tab" aria-controls="data-diri" aria-selected="true">Data UMKM</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-data-alamat" type="button" role="tab" aria-controls="data-alamat" aria-selected="false">Data Alamat UMKM</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-upload-foto" type="button" role="tab" aria-controls="upload-foto" aria-selected="false">Upload Pas Foto </button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                    <div class="tab-pane fade show active" id="bordered-justified-pilihan-sekolah" role="tabpanel" aria-labelledby="pilihan-sekolah-tab">
                                        <form class="row g-3" action="{{ route('user.umkm.updatePilihanKecamatan') }}" method="post">
                                            @csrf
                                            <!--@method('PUT')-->
                                            <div class="col-12">
                                                @if ($umkm !== null)
                                                    <input type="hidden" id="id" name="id" value="{{ $umkm->id }}" />
                                                @endif
                                                <input type="hidden" id="users_id" name="users_id" value="{{ Auth::id() }}" />
                                                <label for="kecamatan" class="form-label">Kecamatan Usaha</label>
                                                <select class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}" id="kecamatan" name="kecamatan">
                                                    <option value="">Pilih Kecamatan</option>
                                                    <option value="BANTIMURUNG" {{ old('kecamatan', $umkm?->kecamatan) == 'BANTIMURUNG' ? 'selected' : '' }}>
                                                        Bantimurung</option>
                                                    <option value="BONTOA" {{ old('kecamatan', $umkm?->kecamatan) == 'BONTOA' ? 'selected' : '' }}>
                                                        Bontoa</option>
                                                    <option value="CAMBA" {{ old('kecamatan', $umkm?->kecamatan) == 'CAMBA' ? 'selected' : '' }}>
                                                        Camba</option>
                                                    <option value="CENRANA" {{ old('kecamatan', $umkm?->kecamatan) == 'CENRANA' ? 'selected' : '' }}>
                                                        Cenrana</option>
                                                    <option value="LAU" {{ old('kecamatan', $umkm?->kecamatan) == 'LAU' ? 'selected' : '' }}>Lau
                                                    </option>
                                                    <option value="MALLAWA" {{ old('kecamatan', $umkm?->kecamatan) == 'MALLAWA' ? 'selected' : '' }}>
                                                        Mallawa</option>
                                                    <option value="MANDAI" {{ old('kecamatan', $umkm?->kecamatan) == 'MANDAI' ? 'selected' : '' }}>
                                                        Mandai</option>
                                                    <option value="MAROS BARU" {{ old('kecamatan', $umkm?->kecamatan) == 'MAROS BARU' ? 'selected' : '' }}>
                                                        Maros Baru</option>
                                                    <option value="MARUSU" {{ old('kecamatan', $umkm?->kecamatan) == 'MARUSU' ? 'selected' : '' }}>
                                                        Marusu</option>
                                                    <option value="MONCONGLOE" {{ old('kecamatan', $umkm?->kecamatan) == 'MONCONGLOE' ? 'selected' : '' }}>
                                                        Moncongloe</option>
                                                    <option value="SIMBANG" {{ old('kecamatan', $umkm?->kecamatan) == 'SIMBANG' ? 'selected' : '' }}>
                                                        Simbang</option>
                                                    <option value="TANRALILI" {{ old('kecamatan', $umkm?->kecamatan) == 'TANRALILI' ? 'selected' : '' }}>
                                                        Tanralili</option>
                                                    <option value="TOMPOBULU" {{ old('kecamatan', $umkm?->kecamatan) == 'TOMPOBULU' ? 'selected' : '' }}>
                                                        Tompobulu</option>
                                                    <option value="TURIKALE" {{ old('kecamatan', $umkm?->kecamatan) == 'TURIKALE' ? 'selected' : '' }}>
                                                        Turikale</option>

                                                </select>
                                                @if ($errors->has('kecamatan'))
                                                    <p class="text-danger">{{ $errors->first('kecamatan') }}</p>
                                                @endif
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade show" id="bordered-justified-data-diri" role="tabpanel" aria-labelledby="data-diri-tab">
                                        <form class="row g-3" action="{{ route('user.umkm.update', $umkm ? $umkm->id : '1000000') }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            @if ($umkm !== null)
                                                <input type="hidden" id="id" name="id" value="{{ $umkm->id }}" />
                                            @endif

                                            <input type="hidden" id="users_id" name="users_id" value="{{ Auth::id() }}" />
                                            <form method="POST" action="/form">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                                                    <input type="text" class="form-control {{ $errors->has('nama_pemilik') ? 'is-invalid' : '' }}" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') ?: $umkm?->nama_pemilik }}">
                                                    @if ($errors->has('nama_pemilik'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('nama_pemilik') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?: $umkm?->tempat_lahir }}">
                                                    @if ($errors->has('tempat_lahir'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?: $umkm?->tanggal_lahir }}">
                                                    @if ($errors->has('tanggal_lahir'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" id="jenis_kelamin" name="jenis_kelamin">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki" {{ old('jenis_kelamin', $umkm?->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                                            Laki-laki</option>
                                                        <option value="Perempuan" {{ old('jenis_kelamin', $umkm?->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                                            Perempuan</option>
                                                    </select>
                                                    @if ($errors->has('jenis_kelamin'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="agama" class="form-label">Agama</label>
                                                    <select class="form-control {{ $errors->has('agama') ? 'is-invalid' : '' }}" id="agama" name="agama">
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam" {{ old('agama', $umkm?->agama) == 'Islam' ? 'selected' : '' }}>
                                                            Islam</option>
                                                        <option value="Kristen" {{ old('agama', $umkm?->agama) == 'Kristen' ? 'selected' : '' }}>
                                                            Kristen</option>
                                                        <option value="Katolik" {{ old('agama', $umkm?->agama) == 'Katolik' ? 'selected' : '' }}>
                                                            Katolik</option>
                                                        <option value="Hindu" {{ old('agama', $umkm?->agama) == 'Hindu' ? 'selected' : '' }}>
                                                            Hindu</option>
                                                        <option value="Buddha" {{ old('agama', $umkm?->agama) == 'Buddha' ? 'selected' : '' }}>
                                                            Buddha</option>
                                                        <option value="Kong Hu Cu" {{ old('agama', $umkm?->agama) == 'Kong Hu Cu' ? 'selected' : '' }}>
                                                            Kong Hu Cu</option>
                                                        <option value="lainnya" {{ old('agama', $umkm?->agama) == 'lainnya' ? 'selected' : '' }}>
                                                            Lainnya</option>
                                                    </select>
                                                    @if ($errors->has('agama'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('agama') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                                    <select class="form-select {{ $errors->has('kewarganegaraan') ? 'is-invalid' : '' }}" id="kewarganegaraan" name="kewarganegaraan">
                                                        <option value="">-- Pilih Kewarganegaraan --</option>
                                                        <option value="WNI" {{ old('kewarganegaraan', $umkm?->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>
                                                            WNI</option>
                                                        <option value="WNA" {{ old('kewarganegaraan', $umkm?->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>
                                                            WNA</option>
                                                    </select>
                                                    @if ($errors->has('kewarganegaraan'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('kewarganegaraan') }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="nama_usaha" class="form-label">Nama Usaha</label>
                                                    <input type="text" class="form-control {{ $errors->has('nama_usaha') ? 'is-invalid' : '' }}" id="nama_usaha" name="nama_usaha" value="{{ old('nama_usaha') ?: $umkm?->nama_usaha }}">
                                                    @if ($errors->has('nama_usaha'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('nama_usaha') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="bidang_usaha" class="form-label">Bidang Usaha</label>
                                                    <select class="form-select {{ $errors->has('bidang_usaha') ? 'is-invalid' : '' }}" id="bidang_usaha" name="bidang_usaha">
                                                        <option value="">Pilih Bidang Usaha</option>
                                                        <option value="Kuliner" {{ old('bidang_usaha', $umkm?->bidang_usaha) == 'Kuliner' ? 'selected' : '' }}>
                                                            Bidang Kuliner</option>
                                                        <option value="Fashion" {{ old('bidang_usaha', $umkm?->bidang_usaha) == 'Fashion' ? 'selected' : '' }}>
                                                            Bidang Fashion</option>
                                                        <option value="Pendidikan" {{ old('bidang_usaha', $umkm?->bidang_usaha) == 'Pendidikan' ? 'selected' : '' }}>
                                                            Bidang Pendidikan</option>
                                                        <option value="Otomotif" {{ old('bidang_usaha', $umkm?->bidang_usaha) == 'Otomotif' ? 'selected' : '' }}>
                                                            Bidang Otomotif</option>
                                                        <option value="Agribisnis" {{ old('bidang_usaha', $umkm?->bidang_usaha) == 'Agribisnis' ? 'selected' : '' }}>
                                                            Bidang Agribisnis</option>
                                                        <option value="Teknologi" {{ old('bidang_usaha', $umkm?->bidang_usaha) == 'Teknologi' ? 'selected' : '' }}>
                                                            Bidang Teknologi Internet</option>
                                                        <option value="Kriya" {{ old('bidang_usaha', $umkm?->bidang_usaha) == 'Kriya' ? 'selected' : '' }}>
                                                            Bidang Kriya</option>
                                                    </select>
                                                    @if ($errors->has('bidang_usaha'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('bidang_usaha') }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                                    <input type="text" class="form-control {{ $errors->has('jenis_usaha') ? 'is-invalid' : '' }}" id="jenis_usaha" name="jenis_usaha" value="{{ old('jenis_usaha') ?: $umkm?->jenis_usaha }}">
                                                    @if ($errors->has('jenis_usaha'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('jenis_usaha') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                                    <input type="text" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" id="nik" name="nik" value="{{ old('nik') ?: $umkm?->nik }}">
                                                    @if ($errors->has('nik'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('nik') }}</strong>
                                                        </span>
                                                    @endif
                                                    <small>Contoh : 7309144107720166</small>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="nib" class="form-label">Nomor Induk Berusaha
                                                                (NIB)</label>
                                                            <input type="text" class="form-control {{ $errors->has('nib') ? 'is-invalid' : '' }}" id="nib" name="nib" value="{{ old('nib') ?: $umkm?->nib }}">
                                                            @if ($errors->has('nib'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('nib') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 98/SIU-IUMK/MRSU/IV/2021</small>
                                                        </div>
                                                        <div class="col">
                                                            <label for="nib_tahun" class="form-label">Tahun Terbit</label>
                                                            <input type="text" class="form-control {{ $errors->has('nib_tahun') ? 'is-invalid' : '' }}" id="nib_tahun" name="nib_tahun" value="{{ old('nib_tahun') ?: $umkm?->nib_tahun }}">
                                                            @if ($errors->has('nib_tahun'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('nib_tahun') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 22 Maret 2023</small>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="pirt" class="form-label">Pangan Industri Rumah Tangga
                                                                (PIRT)</label>
                                                            <input type="text" class="form-control {{ $errors->has('pirt') ? 'is-invalid' : '' }}" id="pirt" name="pirt" value="{{ old('pirt') ?: $umkm?->pirt }}">
                                                            @if ($errors->has('pirt'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('pirt') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 2103203011559-24, Apabila tidak ada boleh
                                                                kosong</small>
                                                        </div>
                                                        <div class="col">
                                                            <label for="pirt_tahun" class="form-label">Tahun Terbit</label>
                                                            <input type="text" class="form-control {{ $errors->has('pirt_tahun') ? 'is-invalid' : '' }}" id="pirt_tahun" name="pirt_tahun" value="{{ old('pirt_tahun') ?: $umkm?->pirt_tahun }}">
                                                            @if ($errors->has('pirt_tahun'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('pirt_tahun') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 14 Februari 2023</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="npwp" class="form-label">Nomor Pokok Wajib Pajak
                                                                (NPWP)</label>
                                                            <input type="text" class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}" id="npwp" name="npwp" value="{{ old('npwp') ?: $umkm?->npwp }}">
                                                            @if ($errors->has('npwp'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('npwp') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 09.254.294.3-407.000, Apabila tidak ada boleh
                                                                kosong</small>
                                                        </div>
                                                        <div class="col">
                                                            <label for="npwp_tahun" class="form-label">Tahun Terbit</label>
                                                            <input type="text" class="form-control {{ $errors->has('v') ? 'is-invalid' : '' }}" id="npwp_tahun" name="npwp_tahun" value="{{ old('npwp_tahun') ?: $umkm?->npwp_tahun }}">
                                                            @if ($errors->has('npwp_tahun'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('npwp_tahun') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 10 Oktober 2023</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="halal" class="form-label">Halal</label>
                                                            <input type="text" class="form-control {{ $errors->has('halal') ? 'is-invalid' : '' }}" id="halal" name="halal" value="{{ old('halal') ?: $umkm?->halal }}">
                                                            @if ($errors->has('halal'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('halal') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 51220000016050420, Apabila tidak ada boleh
                                                                kosong</small>
                                                        </div>
                                                        <div class="col">
                                                            <label for="halal_tahun" class="form-label">Tahun Terbit</label>
                                                            <input type="text" class="form-control {{ $errors->has('halal_tahun') ? 'is-invalid' : '' }}" id="halal_tahun" name="halal_tahun" value="{{ old('halal_tahun') ?: $umkm?->halal_tahun }}">
                                                            @if ($errors->has('halal_tahun'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('halal_tahun') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 1 September 2020</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="haki" class="form-label">Hak Atas Kekayaan Intelektual
                                                                (HAKI)</label>
                                                            <input type="text" class="form-control {{ $errors->has('haki') ? 'is-invalid' : '' }}" id="haki" name="haki" value="{{ old('haki') ?: $umkm?->haki }}">
                                                            @if ($errors->has('haki'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('haki') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : EC00201823258, Apabila tidak ada boleh
                                                                kosong</small>
                                                        </div>
                                                        <div class="col">
                                                            <label for="haki_tahun" class="form-label">Tahun Terbit</label>
                                                            <input type="text" class="form-control {{ $errors->has('haki_tahun') ? 'is-invalid' : '' }}" id="haki_tahun" name="haki_tahun" value="{{ old('haki_tahun') ?: $umkm?->haki_tahun }}">
                                                            @if ($errors->has('haki_tahun'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('haki_tahun') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 8 Agustus 2018</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="modal" class="form-label">Modal Usaha</label>
                                                    <input type="text" class="form-control {{ $errors->has('modal') ? 'is-invalid' : '' }}" id="modal" name="modal" value="{{ old('modal') ?: $umkm?->modal }}">
                                                    @if ($errors->has('modal'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('modal') }}</strong>
                                                        </span>
                                                    @endif
                                                    <small>Contoh : 2000000</small>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="jumlah_karyawan" class="form-label">Jumlah Tenaga
                                                                Kerja</label>
                                                            <input type="text" class="form-control {{ $errors->has('jumlah_karyawan') ? 'is-invalid' : '' }}" id="jumlah_karyawan" name="jumlah_karyawan" value="{{ old('jumlah_karyawan') ?: $umkm?->jumlah_karyawan }}">
                                                            @if ($errors->has('jumlah_karyawan'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('jumlah_karyawan') }}</strong>
                                                                </span>
                                                            @endif
                                                            <small>Contoh : 12 Orang</small>
                                                        </div>
                                                        <div class="col">
                                                            <label for="jumlah_karyawan_pria" class="form-label">Tenaga Kerja
                                                                Laki - laki</label>
                                                            <input type="text" class="form-control {{ $errors->has('jumlah_karyawan_pria') ? 'is-invalid' : '' }}" id="jumlah_karyawan_pria" name="jumlah_karyawan_pria" value="{{ old('jumlah_karyawan_pria') ?: $umkm?->jumlah_karyawan_pria }}">
                                                            @if ($errors->has('jumlah_karyawan_pria'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('jumlah_karyawan_pria') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col">
                                                            <label for="jumlah_karyawan_wanita" class="form-label">Tenaga Kerja
                                                                Perempuan</label>
                                                            <input type="text" class="form-control {{ $errors->has('jumlah_karyawan_wanita') ? 'is-invalid' : '' }}" id="jumlah_karyawan_wanita" name="jumlah_karyawan_wanita" value="{{ old('jumlah_karyawan_wanita') ?: $umkm?->jumlah_karyawan_wanita }}">
                                                            @if ($errors->has('jumlah_karyawan_wanita'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('jumlah_karyawan_wanita') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="tanggal_mulai_usaha" class="form-label">Mulai Usaha</label>
                                                    <input type="date" class="form-control {{ $errors->has('tanggal_mulai_usaha') ? 'is-invalid' : '' }}" id="tanggal_mulai_usaha" name="tanggal_mulai_usaha" value="{{ old('tanggal_mulai_usaha') ?: $umkm?->tanggal_mulai_usaha }}">
                                                    @if ($errors->has('tanggal_mulai_usaha'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('tanggal_mulai_usaha') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <label for="lama_usaha" class="form-label">Lama Usaha</label>
                                                    <input type="text" class="form-control {{ $errors->has('lama_usaha') ? 'is-invalid' : '' }}" id="lama_usaha" name="lama_usaha" value="{{ old('lama_usaha') ?: $umkm?->lama_usaha }}">
                                                    @if ($errors->has('lama_usaha'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('lama_usaha') }}</strong>
                                                        </span>
                                                    @endif
                                                    <small>Contoh : 5 Tahun</small>
                                                </div>
                                                <div class="col-12">
                                                    <label for="omset_usaha" class="form-label">Omset Usaha</label>
                                                    <input type="number" class="form-control {{ $errors->has('omset_usaha') ? 'is-invalid' : '' }}" id="omset_usaha" name="omset_usaha" value="{{ old('omset_usaha') ?: $umkm?->omset_usaha }}">
                                                    @if ($errors->has('omset_usaha'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('omset_usaha') }}</strong>
                                                        </span>
                                                    @endif
                                                    <small>Contoh : 1000000</small>
                                                </div>
                                                <div class="col-12">
                                                    <label for="jenis_kemitraan" class="form-label">Jenis Kemitraan Yang
                                                        Diperoleh</label>
                                                    <select class="form-select {{ $errors->has('jenis_kemitraan') ? 'is-invalid' : '' }}" id="jenis_kemitraan" name="jenis_kemitraan">
                                                        <option value="">-- Pilih Jenis --</option>
                                                        <option value="Kur" {{ old('jenis_kemitraan', $umkm?->jenis_kemitraan) == 'Kur' ? 'selected' : '' }}>
                                                            Kur</option>
                                                        <option value="Pelatihan" {{ old('jenis_kemitraan', $umkm?->jenis_kemitraan) == 'Pelatihan' ? 'selected' : '' }}>
                                                            Pelatihan</option>
                                                        <option value="Pemasaran" {{ old('jenis_kemitraan', $umkm?->jenis_kemitraan) == 'Pemasaran' ? 'selected' : '' }}>
                                                            Pemasaran</option>
                                                        <option value="Hibah" {{ old('jenis_kemitraan', $umkm?->jenis_kemitraan) == 'Hibah' ? 'selected' : '' }}>
                                                            Hibah</option>
                                                        <option value="Pendampingan" {{ old('jenis_kemitraan', $umkm?->jenis_kemitraan) == 'Pendampingan' ? 'selected' : '' }}>
                                                            Pendampingan</option>
                                                    </select>
                                                    @if ($errors->has('jenis_kemitraan'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('jenis_kemitraan') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') ?: $umkm?->email }}">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                    <small>Contoh : abdulrahmann012@gmail.com</small>
                                                </div>
                                                <div class="col-12">
                                                    <label for="no_hp" class="form-label">No Telepon/HP</label>
                                                    <input type="text" class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" id="no_hp" name="no_hp" value="{{ old('no_hp') ?: $umkm?->no_hp }}">
                                                    @if ($errors->has('no_hp'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('no_hp') }}</strong>
                                                        </span>
                                                    @endif
                                                    <small>Contoh : 085375555802</small>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form><!-- Vertical Form -->
                                    </div>
                                    <div class="tab-pane fade" id="bordered-justified-data-alamat" role="tabpanel" aria-labelledby="data-alamat-tab">
                                        <form class="row g-3" action="{{ route('user.umkm.updateDataAlamat') }}" method="post">
                                            @csrf
                                            <!--@method('PUT')-->
                                            @if ($umkm !== null)
                                                <input type="hidden" id="id" name="id" value="{{ $umkm->id }}" />
                                            @endif
                                            <input type="hidden" id="users_id" name="users_id" value="{{ Auth::id() }}" />
                                            <div class="col-12 row">
                                                <label for="alamat" class="form-label"><b>Alamat Rumah</b></label>
                                                <div class="mb-3">
                                                    <label for="alamat_rumah" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control {{ $errors->has('alamat_rumah') ? 'is-invalid' : '' }}" id="" name="alamat_rumah" value="{{ old('alamat_rumah') ?: $umkm?->alamat_rumah }}">
                                                    @if ($errors->has('alamat_rumah'))
                                                        <p class="text-danger">{{ $errors->first('alamat_rumah') }}</p>
                                                    @endif
                                                    <small>Contoh : Jln. Poros Bantimurung No.3, Dusun Pakalli, Desa Alatengae,
                                                        Kec. Bantimurung</small>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="rt_rumah" class="form-label">RT</label>
                                                            <input type="number" class="form-control {{ $errors->has('rt_rumah') ? 'is-invalid' : '' }}" id="" name="rt_rumah" value="{{ old('rt_rumah') ?: $umkm?->rt_rumah }}">
                                                            @if ($errors->has('rt_rumah'))
                                                                <p class="text-danger">{{ $errors->first('rt_rumah') }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="col">
                                                            <label for="rw_rumah" class="form-label">RW</label>
                                                            <input type="number" class="form-control {{ $errors->has('rw_rumah') ? 'is-invalid' : '' }}" id="" name="rw_rumah" value="{{ old('rw_rumah') ?: $umkm?->rw_rumah }}">
                                                            @if ($errors->has('rw_rumah'))
                                                                <p class="text-danger">{{ $errors->first('rw') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <br></br>
                                                <div class="mb-3">
                                                    <label for="desa_rumah" class="form-label">Kelurahan / Desa</label>
                                                    <input type="text" class="form-control {{ $errors->has('desa_rumah') ? 'is-invalid' : '' }}" id="" name="desa_rumah" value="{{ old('desa_rumah') ?: $umkm?->desa_rumah }}">
                                                    @if ($errors->has('desa_rumah'))
                                                        <p class="text-danger">{{ $errors->first('desa_rumah') }}</p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kecamatan_rumah" class="form-label">Kecamatan</label>
                                                    <input type="text" class="form-control {{ $errors->has('kecamatan_rumah') ? 'is-invalid' : '' }}" id="" name="kecamatan_rumah" value="{{ old('kecamatan_rumah') ?: $umkm?->kecamatan_rumah }}">
                                                    @if ($errors->has('kecamatan_rumah'))
                                                        <p class="text-danger">{{ $errors->first('kecamatan_rumah') }}</p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kabupaten_rumah" class="form-label">Kabupaten/Kota</label>
                                                    <input type="text" class="form-control {{ $errors->has('kabupaten_rumah') ? 'is-invalid' : '' }}" id="" name="kabupaten_rumah" value="{{ old('kabupaten_rumah') ?: $umkm?->kabupaten_rumah }}">
                                                    @if ($errors->has('kabupaten_rumah'))
                                                        <p class="text-danger">{{ $errors->first('kabupaten_rumah') }}</p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="provinsi_rumah" class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control {{ $errors->has('provinsi_rumah') ? 'is-invalid' : '' }}" id="" name="provinsi_rumah" value="{{ old('provinsi_rumah') ?: $umkm?->provinsi_rumah }}">
                                                    @if ($errors->has('provinsi_rumah'))
                                                        <p class="text-danger">{{ $errors->first('provinsi_rumah') }}</p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kode_pos_rumah" class="form-label">Kode Pos</label>
                                                    <input type="number" class="form-control {{ $errors->has('kode_pos_rumah') ? 'is-invalid' : '' }}" id="" name="kode_pos_rumah" value="{{ old('kode_pos_rumah') ?: $umkm?->kode_pos_rumah }}">
                                                    @if ($errors->has('kode_pos_rumah'))
                                                        <p class="text-danger">{{ $errors->first('kode_pos_rumah') }}</p>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-12 row">
                                                <label for="alamat" class="form-label"><b>Alamat Usaha</b></label>
                                                <div class="mb-3">
                                                    <label for="alamat_usaha" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control {{ $errors->has('alamat_usaha') ? 'is-invalid' : '' }}" id="" name="alamat_usaha" value="{{ old('alamat_usaha') ?: $umkm?->alamat_usaha }}">
                                                    @if ($errors->has('alamat_usaha'))
                                                        <p class="text-danger">{{ $errors->first('alamat_usaha') }}</p>
                                                    @endif
                                                    <small>Contoh : Jln. Poros Maros Makassar (Batangase) No.03, Kel Bontoa,
                                                        Kec. Mandai</small>
                                                </div>

                                            <div class="col-12">
                                                <label for="koordinat_alamat_usaha" class="form-label">Koordinat Alamat</label>
                                                <input id="koordinat" type="text" class="form-control {{$errors->has('koordinat_alamat_usaha') ? 'is-invalid' : ''}}" id="" name="koordinat_alamat_usaha" value="{{ old('koordinat_alamat_usaha') ?: ($umkm ? $umkm->koordinat_alamat_usaha : '') }}" placeholder="Contoh penulisan -5.15078,119.452467">
                                                    @if ($errors->has('koordinat_alamat_usaha'))
                                                        <p class="text-danger">{{$errors->first('koordinat_alamat_usaha')}}</p>
                                                    @endif
                                                    <div class="text-end mt-3">
                                                        <button type="button" class="btn btn-primary btn-sm rounded-pill" onclick="getLocation()">Cari lokasi</button>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="rt_usaha" class="form-label">RT</label>
                                                            <input type="number" class="form-control {{ $errors->has('rt_usaha') ? 'is-invalid' : '' }}" id="" name="rt_usaha" value="{{ old('rt_usaha') ?: $umkm?->rt_usaha }}">
                                                            @if ($errors->has('rt_usaha'))
                                                                <p class="text-danger">{{ $errors->first('rt_usaha') }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="col">
                                                            <label for="rw_usaha" class="form-label">RW</label>
                                                            <input type="number" class="form-control {{ $errors->has('rw_usaha') ? 'is-invalid' : '' }}" id="" name="rw_usaha" value="{{ old('rw_usaha') ?: $umkm?->rw_usaha }}">
                                                            @if ($errors->has('rw_usaha'))
                                                                <p class="text-danger">{{ $errors->first('rw') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="desa_usaha" class="form-label">Kelurahan / Desa</label>
                                                    <input type="text" class="form-control {{ $errors->has('desa_usaha') ? 'is-invalid' : '' }}" id="" name="desa_usaha" value="{{ old('desa_usaha') ?: $umkm?->desa_usaha }}">
                                                    @if ($errors->has('desa_usaha'))
                                                        <p class="text-danger">{{ $errors->first('desa_usaha') }}</p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kecamatan_usaha" class="form-label">Kecamatan</label>
                                                    <input type="text" class="form-control {{ $errors->has('kecamatan_usaha') ? 'is-invalid' : '' }}" id="" name="kecamatan_usaha" value="{{ old('kecamatan_usaha') ?: $umkm?->kecamatan_usaha }}">
                                                    @if ($errors->has('kecamatan_usaha'))
                                                        <p class="text-danger">{{ $errors->first('kecamatan_usaha') }}</p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kabupaten_usaha" class="form-label">Kabupaten/Kota</label>
                                                    <input type="text" class="form-control {{ $errors->has('kabupaten_usaha') ? 'is-invalid' : '' }}" id="" name="kabupaten_usaha" value="{{ old('kabupaten_usaha') ?: $umkm?->kabupaten_usaha }}">
                                                    @if ($errors->has('kabupaten_usaha'))
                                                        <p class="text-danger">{{ $errors->first('kabupaten_usaha') }}</p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="provinsi_usaha" class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control {{ $errors->has('provinsi_usaha') ? 'is-invalid' : '' }}" id="" name="provinsi_usaha" value="{{ old('provinsi_usaha') ?: $umkm?->provinsi_usaha }}">
                                                    @if ($errors->has('provinsi_usaha'))
                                                        <p class="text-danger">{{ $errors->first('provinsi_usaha') }}</p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kode_pos_usaha" class="form-label">Kode Pos</label>
                                                    <input type="number" class="form-control {{ $errors->has('kode_pos_usaha') ? 'is-invalid' : '' }}" id="" name="kode_pos_usaha" value="{{ old('kode_pos_usaha') ?: $umkm?->kode_pos_usaha }}">
                                                    @if ($errors->has('kode_pos_usaha'))
                                                        <p class="text-danger">{{ $errors->first('kode_pos_usaha') }}</p>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form><!-- Vertical Form -->
                                    </div>
                                    <div class="tab-pane fade" id="bordered-justified-upload-foto" role="tabpanel" aria-labelledby="uploadfoto-tab">
                                        {{-- css content center --}}
                                        <div class="d-flex justify-content-center">
                                            @if ($umkm !== null)
                                                @if ($umkm->foto)
                                                    <img src="{{ asset('storage/' . $umkm->foto) }}" alt="foto" class="img-circle" style="border-radius: 200px" width="200px" height="200px">
                                                @else
                                                    <img src="https://ui-avatars.com/api/?name=hendra" alt="" class="img-fluid" style="border-radius: 200px" width="200px" height="200px">
                                                @endif
                                            @else
                                                <img src="https://ui-avatars.com/api/?name=hendra" alt="" class="img-fluid" style="border-radius: 200px" width="200px" height="200px">
                                            @endif
                                        </div>
                                        <form class="row g-3" action="{{ route('user.umkm.uploadFoto') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <!--@method('PUT')-->
                                            @if ($umkm !== null)
                                                <input type="hidden" id="id" name="id" value="{{ $umkm->id }}" />
                                            @endif
                                            <div class="col-12">
                                                <label for="inputNumber" class="col-sm-2 col-form-label">Upload Pas Foto</label>
                                                <div class="col-sm-12">

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
                                                                                <img id="crop-image" src="#">
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

                                                    @if ($errors->has('foto'))
                                                        <p class="text-danger">{{ $errors->first('foto') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Foto</button>
                                            </div> -->
                                        </form>
                                    </div>
                                </div><!-- End Bordered Tabs Justified -->
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Terima Kasih Sudah melakukan pendaftaran</h4>
                            <p class="mb-0">Selamat pendaftaran anda telah berhasil</p>
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 text-center">
                                    <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">1</button>
                                    <h5 class="mt-2">Formulir</h5>
                                    <a class="btn btn-success btn-sm rounded-pill" href="{{ route('user.download-pdf') }}"><i class="bi bi-download"></i> Download</a>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">2</button>
                                    <h5 class="mt-2">Formulir Pendaftaran</h5>
                                    <a class="btn btn-success btn-sm rounded-pill" href="{{ route('user.show-pdf') }}"><i class="bi bi-eye-fill"></i> Lihat formulir</a>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">3</button>
                                    <h5 class="mt-2">Berkas Lainnya</h5>
                                    <a class="btn btn-secondary btn-sm rounded-pill" href="{{ route('user.umkm.download_all') }}"><i class="bi bi-download"></i> Download
                                        Berkas</a>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script>
        var button = document.getElementById("koordinat")

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert('Geolocation is not supported by this browser.')
            }
        }

        function showPosition(position) {
            button.value = position.coords.latitude + "," + position.coords.longitude;
        }
    </script>


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

                @if ($umkm !== null)
                    formData.append('id', '{{ $umkm->id }}');
                @endif

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('user.umkm.uploadFoto') }}",
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
                        window.location.href = "{{ route('user.umkm.index') }}";
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText);
                        alert(err.message);
                    }
                });
            }, 'image/png');
        });
    </script>


@endsection
