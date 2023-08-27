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
          <li class="breadcrumb-item">Cetak Formulir</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulir Pendaftaran UMKM </h5>
                <div class="row mt-3">
                    <div class="col">
                        <div class="row text-center">
                            <div class="col-12">
                                @if ($umkm?->foto)
                                    <img  src="{{asset('storage/'.$umkm?->foto)}}" alt="foto"  style="border-radius: 200px" width="200px" height="200px">
                                
                                    
                                @else
                                <img src="{{asset('img/profile-img.jpg')}}" style="border-radius: 200px" width="200px" height="200px">
                                    
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <b>Status Pendaftaran</b>
                            </div>
                            <div class="col-12 mt-3">
                                @if ($umkm?->status == 0)
                                    <button class="btn btn-danger">Data Belum Lengkap</span>
                                    
                                @elseif ($umkm?->status == 1)
                                    <button class="btn btn-warning">Data Belum Dikirim</span>                                  
                                @elseif ($umkm?->status == 2)
                                    <button class="btn btn-warning">Belum Dikonfirmasi</span>                                  
                                @elseif ($umkm?->status == 3)
                                    <button class="btn btn-success">Sudah Dikonfirmasi</span>                                  
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row mb-3">
                            <label for="nama_pemilik" class="col-sm-4 col-form-label">Nama Pemilik</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" value="{{ old('nik', $umkm?->nama_pemilik ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="nama_usaha" class="col-sm-4 col-form-label">Nama Usaha</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="nama_usaha" id="nama_usaha" value="{{ old('nik', $umkm?->nama_usaha ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="jenis_usaha" class="col-sm-4 col-form-label">Jenis Usaha</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="jenis_usaha" id="jenis_usaha" value="{{ old('nik', $umkm?->jenis_usaha ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-4">
                            <label for="nik" class="col-sm-4 col-form-label">Nomor Induk Kependudukan (NIK)</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="nik" id="nik" value="{{ old('nik', $umkm?->nik ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-4">
                            <div class="col-9">
                              <label for="nib" class="">Nomor Induk Berusaha (NIB)</label>
                              <div class="">
                                <input type="text" class="form-control" name="nib" id="nib" value="{{ old('nik', $umkm?->nib ?? '') }}" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <label for="nib_tahun" class="">Tahun Terbit</label>
                              <div class="">
                                <input type="text" class="form-control" name="nib_tahun" id="nib_tahun" value="{{ old('nik', $umkm?->nib_tahun ?? '') }}" disabled>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row mb-4">
                            <div class="col-9">
                              <label for="pirt" class="">Pangan Industri Rumah Tangga (PIRT)</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="pirt" id="pirt" value="{{ old('pirt', $umkm?->pirt ?? '') }}" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <label for="pirt_tahun" class="">Tahun Terbit</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="pirt_tahun" id="pirt_tahun" value="{{ old('pirt_tahun', $umkm?->pirt_tahun ?? '') }}" disabled>
                              </div>
                            </div>
                          </div>

                          <div class="row mb-4">
                            <div class="col-9">
                              <label for="npwp" class="">Nomor Pokok Wajib Pajak (NPWP)</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="npwp" id="npwp" value="{{ old('npwp', $umkm?->npwp ?? '') }}" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <label for="npwp_tahun" class="">Tahun Terbit</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="npwp_tahun" id="npwp_tahun" value="{{ old('npwp_tahun', $umkm?->npwp_tahun ?? '') }}" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-4">
                            <div class="col-9">
                              <label for="halal" class="">Halal</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="halal" id="halal" value="{{ old('halal', $umkm?->halal ?? '') }}" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <label for="halal_tahun" class="">Tahun Terbit</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="halal_tahun" id="halal_tahun" value="{{ old('halal_tahun', $umkm?->halal_tahun ?? '') }}" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-9">
                              <label for="haki" class="">Hak Atas Kekayaan Intelektual (HAKI)</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="haki" id="haki" value="{{ old('haki', $umkm?->haki ?? '') }}" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <label for="haki_tahun" class="">Tahun Terbit</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="haki_tahun" id="haki_tahun" value="{{ old('haki_tahun', $umkm?->haki_tahun ?? '') }}" disabled>
                              </div>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="alamat_rumah" class="col-sm-4 col-form-label">Alamat Rumah</label>
                            <?php  $alamat_rumah = $umkm?->alamat_rumah." RT ".$umkm?->rt_rumah." RW ".$umkm?->rw_rumah." Desa/Keluarahan ".$umkm?->desa_rumah." Kecamatan ".$umkm?->kecamatan_rumah." Kabupaten/Kota".$umkm?->kabupaten_rumah." Provinsi ".$umkm?->provinsi_rumah." Kode Pos ".$umkm?->kode_pos_rumah;?>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah" value="{{$umkm?->alamat_rumah}}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="alamat_usaha" class="col-sm-4 col-form-label">Alamat Usaha</label>
                            <div class="col-sm-12">
                              <?php  $alamat_usaha = $umkm?->alamat_usaha." RT ".$umkm?->rt_usaha." RW ".$umkm?->rw_usaha." Desa/Keluarahan ".$umkm?->desa_usaha." Kecamatan ".$umkm?->kecamatan_usaha." Kabupaten/Kota ".$umkm?->kabupaten_usaha." Provinsi ".$umkm?->provinsi_usaha." Kode Pos ".$umkm?->kode_pos_usaha;?>
                              <input type="text" class="form-control" name="alamat_usaha" id="alamat_usaha" value="{{$umkm?->alamat_usaha}}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="modal" class="col-sm-4 col-form-label">Modal Usaha</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="modal" id="modal" value="{{ old('modal', number_format($umkm?->modal,0,',','.') ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="jumlah_karyawan" class="col-sm-4 col-form-label">Jumlah Tenaga Kerja</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="jumlah_karyawan" id="jumlah_karyawan" min="0" value="{{ old('jumlah_karyawan', $umkm?->jumlah_karyawan ?? '') }}" disabled>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="tanggal_mulai_usaha" class="col-sm-4 col-form-label">Mulai Usaha</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="tanggal_mulai_usaha" id="tanggal_mulai_usaha" value="{{ old('tanggal_mulai_usaha', $umkm?->tanggal_mulai_usaha ?? '') }}" disabled>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="lama_usaha" class="col-sm-4 col-form-label">Lama Usaha</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="lama_usaha" id="lama_usaha" value="{{ old('lama_usaha', $umkm?->lama_usaha ?? '') }}" disabled>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="omset_usaha" class="col-sm-4 col-form-label">Omset Usaha</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="omset_usaha" id="omset_usaha" value="{{ old('omset_usaha', number_format($umkm?->omset_usaha,0,',','.') ?? '') }}" disabled>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="jenis_kemitraan" class="col-sm-4 col-form-label">Jenis Kemitraan Yang Diperoleh</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" name="jenis_kemitraan" id="jenis_kemitraan" value="{{ old('jenis_kemitraan', $umkm?->jenis_kemitraan ?? '') }}" disabled>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="email" class="col-sm-4 col-form-label">Email </label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="email" id="email" min="0" value="{{ old('email', $umkm?->email ?? '') }}" disabled>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="no_hp" class="col-sm-4 col-form-label">No Telepon/HP</label>
                            <div class="col-sm-12">
                              <input type="number" class="form-control" name="no_hp" id="no_hp" min="0" value="{{ old('no_hp', $umkm?->no_hp ?? '') }}" disabled>
                            </div>
                          </div>
                    </div>

                </div>
                      
                <div class="text-center">
                  @if ($umkm?->email)
                  <a class="btn btn-primary" href="{{route('user.download-pdf')}}"><i class="bi bi-download"></i> Download PDF</a>
                  @else
                  <a class="btn btn-primary bg-70" href="#"><i class="bi bi-download"></i> Download PDF</a>
                  @endif
                </div>
            </div>
          </div>

        </div>
        
    </div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Perhatian !!!</h4>
            <p>Harap Melengkapi data sebelum melakukan Download</p>   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
    </section>

</main><!-- End #main -->
@endsection