<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollingModal">
                Scrolling Modal
</button> -->
<?php $data="";?>
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard='false' id="scrollingModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Scrolling Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="min-height: 1500px;">
       <input type="hidden" id="id" name="id">
       <div class="row">

          <div>
              <b class="mt-3">Data Diri</b>
          </div>
          <div class="mb-3">
            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
            <input type="text" class="form-control {{$errors->has('nama_pemilik') ? 'is-invalid' : ''}}" id="nama_pemilik" name="nama_pemilik" value="">
            @if ($errors->has('nama_pemilik'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nama_pemilik') }}</strong>
              </span>
            @endif
          </div>
        
          <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control {{$errors->has('tempat_lahir') ? 'is-invalid' : ''}}" id="tempat_lahir" name="tempat_lahir" value="">
            @if ($errors->has('tempat_lahir'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tempat_lahir') }}</strong>
              </span>
            @endif
          </div>
        
          <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control {{$errors->has('tanggal_lahir') ? 'is-invalid' : ''}}" id="tanggal_lahir" name="tanggal_lahir" value="">
            @if ($errors->has('tanggal_lahir'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tanggal_lahir') }}</strong>
              </span>
            @endif
          </div>
        
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control {{$errors->has('jenis_kelamin') ? 'is-invalid' : ''}}" id="jenis_kelamin" name="jenis_kelamin">
              <option value="">Pilih Jenis Kelamin</option>
              <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option value="Perempuan" {{ old('jenis_kelamin')  == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @if ($errors->has('jenis_kelamin'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-control {{$errors->has('agama') ? 'is-invalid' : ''}}" id="agama" name="agama">
              <option value="">Pilih Agama</option>
              <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
              <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
              <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
              <option value="Hindu" {{ old('agama')== 'Hindu' ? 'selected' : '' }}>Hindu</option>
              <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
              <option value="Kong Hu Cu" {{ old('agama') == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
              <option value="lainnya" {{ old('agama') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
              </select>
              @if ($errors->has('agama'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('agama') }}</strong>
              </span>
              @endif
              
          </div>
          <div class="mb-3">
            <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
            <select class="form-select {{$errors->has('kewarganegaraan') ? 'is-invalid' : ''}}" id="kewarganegaraan" name="kewarganegaraan">
              <option value="">-- Pilih Kewarganegaraan --</option>
              <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
              <option value="WNA" {{ old('kewarganegaraan')  == 'WNA' ? 'selected' : '' }}>WNA</option>
            </select>
            @if ($errors->has('kewarganegaraan'))
              <div class="invalid-feedback">
                {{$errors->first('kewarganegaraan')}}
              </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
            <input type="text" class="form-control {{$errors->has('nik') ? 'is-invalid' : ''}}" id="nik" name="nik" value="">
            @if ($errors->has('nik'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nik') }}</strong>
              </span>
            @endif
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="">
            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="no_hp" class="form-label">No Handphone</label>
            <input type="text" class="form-control {{$errors->has('no_hp') ? 'is-invalid' : ''}}" id="no_hp" name="no_hp" value="">
            @if ($errors->has('no_hp'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('no_hp') }}</strong>
              </span>
            @endif
          </div>
          <div>
              <b class="mt-3">Data Usaha</b>
          </div>
          <div class="mb-3">
            <label for="nama_usaha" class="form-label">Nama Usaha</label>
            <input type="text" class="form-control {{$errors->has('nama_usaha') ? 'is-invalid' : ''}}" id="nama_usaha" name="nama_usaha" value="">
            @if ($errors->has('nama_usaha'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nama_usaha') }}</strong>
              </span>
            @endif
          </div>
          
          <div class="mb-3">
            <label for="bidang_usaha" class="form-label">Bidang Usaha</label>
            <select class="form-select {{ $errors->has('bidang_usaha') ? 'is-invalid' : '' }}" id="bidang_usaha" name="bidang_usaha">
                <option value="">Pilih Bidang Usaha</option>
                <option value="Kuliner" {{ old('bidang_usaha') == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                <option value="Fashion" {{ old('bidang_usaha') == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                <option value="Pendidikan" {{ old('bidang_usaha') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                <option value="Otomotif" {{ old('bidang_usaha') == 'Otomotif' ? 'selected' : '' }}>Otomotif</option>
                <option value="Agribisnis" {{ old('bidang_usaha') == 'Agribisnis' ? 'selected' : '' }}>Agribisnis</option>
                <option value="Teknologi" {{ old('bidang_usaha') == 'Teknologi' ? 'selected' : '' }}>Teknologi Internet</option>
                <option value="Kriya" {{ old('bidang_usaha') == 'Kriya' ? 'selected' : '' }}>Kriya</option>
            </select>
            @if ($errors->has('bidang_usaha'))
                <div class="invalid-feedback">
                {{ $errors->first('bidang_usaha') }}
                </div>
            @endif
          </div>

            <div class="mb-3">
              <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
              <select class="form-select {{$errors->has('kewarganegaraan') ? 'is-invalid' : ''}}" id="kewarganegaraan" name="kewarganegaraan">
                <option value="">-- Pilih Kewarganegaraan --</option>
                <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
                <option value="WNA" {{ old('kewarganegaraan')  == 'WNA' ? 'selected' : '' }}>WNA</option>
              </select>
              @if ($errors->has('kewarganegaraan'))
                <div class="invalid-feedback">
                  {{$errors->first('kewarganegaraan')}}
                </div>
              @endif
            </div>

          <div class="mb-3">
            <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
            <input type="text" class="form-control {{$errors->has('jenis_usaha') ? 'is-invalid' : ''}}" id="jenis_usaha" name="jenis_usaha" value="">
            @if ($errors->has('jenis_usaha'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('jenis_usaha') }}</strong>
              </span>
            @endif

          </div>
          <div class="mb-3">
            <label for="nib" class="form-label">Nomor Induk Berusaha (NIB)</label>
            <input type="text" class="form-control {{$errors->has('nib') ? 'is-invalid' : ''}}" id="nib" name="nib" value="">
            @if ($errors->has('nib'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nib') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="nib_tahun" class="form-label">Tahun Terbit NIB</label>
            <input type="text" class="form-control {{$errors->has('nib_tahun') ? 'is-invalid' : ''}}" id="nib_tahun" name="nib_tahun" value="">
            @if ($errors->has('nib_tahun'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nib_tahun') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="pirt" class="form-label">Pangan Industri Rumah Tangga (PIRT)</label>
            <input type="text" class="form-control {{$errors->has('pirt') ? 'is-invalid' : ''}}" id="pirt" name="pirt" value="">
            @if ($errors->has('pirt'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('pirt') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="pirt_tahun" class="form-label">Tahun Terbit PIRT</label>
            <input type="text" class="form-control {{$errors->has('pirt_tahun') ? 'is-invalid' : ''}}" id="pirt_tahun" name="pirt_tahun" value="">
            @if ($errors->has('pirt_tahun'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('pirt_tahun') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="npwp" class="form-label">Nomor Pokok Wajib Pajak (NPWP)</label>
            <input type="text" class="form-control {{$errors->has('npwp') ? 'is-invalid' : ''}}" id="npwp" name="npwp" value="">
            @if ($errors->has('npwp'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('npwp') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="npwp_tahun" class="form-label">Tahun Terbit NPWP</label>
            <input type="text" class="form-control {{$errors->has('npwp_tahun') ? 'is-invalid' : ''}}" id="npwp_tahun" name="npwp_tahun" value="">
            @if ($errors->has('npwp_tahun'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('npwp_tahun') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="halal" class="form-label">Halal</label>
            <input type="text" class="form-control {{$errors->has('halal') ? 'is-invalid' : ''}}" id="halal" name="halal" value="">
            @if ($errors->has('halal'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('halal') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="halal_tahun" class="form-label">Tahun Terbit Halal</label>
            <input type="text" class="form-control {{$errors->has('halal_tahun') ? 'is-invalid' : ''}}" id="halal_tahun" name="halal_tahun" value="">
            @if ($errors->has('halal_tahun'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('halal_tahun') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="haki" class="form-label">Hak Atas Kekayaan Intelektual (HAKI)</label>
            <input type="text" class="form-control {{$errors->has('haki') ? 'is-invalid' : ''}}" id="haki" name="haki" value="">
            @if ($errors->has('haki'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('haki') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="haki_tahun" class="form-label">Tahun Terbit HAKI</label>
            <input type="text" class="form-control {{$errors->has('haki_tahun') ? 'is-invalid' : ''}}" id="haki_tahun" name="haki_tahun" value="">
            @if ($errors->has('haki_tahun'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('haki_tahun') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="modal" class="form-label">Modal Usaha</label>
            <input type="text" class="form-control {{$errors->has('modal') ? 'is-invalid' : ''}}" id="modal" name="modal" value="">
            @if ($errors->has('modal'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('modal') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="jumlah_karyawan" class="form-label">Jumlah Tenaga Kerja</label>
            <input type="text" class="form-control {{$errors->has('jumlah_karyawan') ? 'is-invalid' : ''}}" id="jumlah_karyawan" name="jumlah_karyawan" value="">
            @if ($errors->has('jumlah_karyawan'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('jumlah_karyawan') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="jumlah_karyawan_pria" class="form-label">Tenaga Kerja Laki - laki</label>
            <input type="text" class="form-control {{$errors->has('jumlah_karyawan_pria') ? 'is-invalid' : ''}}" id="jumlah_karyawan_pria" name="jumlah_karyawan_pria" value="">
            @if ($errors->has('jumlah_karyawan_pria'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('jumlah_karyawan_pria') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="jumlah_karyawan_wanita" class="form-label">Tenaga Kerja Perempuan</label>
            <input type="text" class="form-control {{$errors->has('jumlah_karyawan_wanita') ? 'is-invalid' : ''}}" id="jumlah_karyawan_wanita" name="jumlah_karyawan_wanita" value="">
            @if ($errors->has('jumlah_karyawan_wanita'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('jumlah_karyawan_wanita') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="tanggal_mulai_usaha" class="form-label">Mulai Usaha</label>
            <input type="date" class="form-control {{$errors->has('tanggal_mulai_usaha') ? 'is-invalid' : ''}}" id="tanggal_mulai_usaha" name="tanggal_mulai_usaha" value="">
            @if ($errors->has('tanggal_mulai_usaha'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tanggal_mulai_usaha') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="lama_usaha" class="form-label">Lama Usaha</label>
            <input type="text" class="form-control {{$errors->has('lama_usaha') ? 'is-invalid' : ''}}" id="lama_usaha" name="lama_usaha" value="">
            @if ($errors->has('lama_usaha'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lama_usaha') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="omset_usaha" class="form-label">Omset Usaha</label>
            <input type="text" class="form-control {{$errors->has('omset_usaha') ? 'is-invalid' : ''}}" id="omset_usaha" name="omset_usaha" value="">
            @if ($errors->has('omset_usaha'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('omset_usaha') }}</strong>
              </span>
            @endif
          </div>
          <div class="mb-3">
            <label for="jenis_kemitraan" class="form-label">Jenis Kemitraan yang diperoleh</label>
            <select class="form-select {{$errors->has('jenis_kemitraan') ? 'is-invalid' : ''}}" id="jenis_kemitraan" name="jenis_kemitraan">
              <option value="">-- Pilih Jenis --</option>
              <option value="Kur">Kur</option>
              <option value="Pelatihan">Pelatihan</option>
              <option value="Pemasaran">Pemasaran</option>
              <option value="Hibah">Hibah</option>
              <option value="Pendampingan">Pendampingan</option>
            </select>
            @if ($errors->has('omset_usaha'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('omset_usaha') }}</strong>
              </span>
            @endif
          </div>
        <div>
          <b class="mt-3">Data Alamat</b>
        </div>
        <div class="col-12 row">
          <label for="alamat" class="form-label"><b>Alamat Rumah</b></label>
          <div class="col-12">
            <label for="alamat_rumah" class="form-label">Alamat</label>
            <input type="text" class="form-control {{$errors->has('alamat_rumah') ? 'is-invalid' : ''}}" id="alamat_rumah" name="alamat_rumah" value="">
            @if ($errors->has('alamat_rumah'))
                  <p class="text-danger">{{$errors->first('alamat_rumah')}}</p>
            @endif
          </div>
          <div class="col-6">
            <label for="rt_rumah" class="form-label">RT</label>
            <input type="number" class="form-control {{$errors->has('rt_rumah') ? 'is-invalid' : ''}}" id="rt_rumah" name="rt_rumah" value="">
            @if ($errors->has('rt_rumah'))
                    <p class="text-danger">{{$errors->first('rt_rumah')}}</p>
            @endif
          </div>
          <div class="col-6">
            <label for="rw_rumah" class="form-label">RW</label>
            <input type="number" class="form-control {{$errors->has('rw_rumah') ? 'is-invalid' : ''}}" id="rw_rumah" name="rw_rumah" value="">
            @if ($errors->has('rw_rumah'))
                    <p class="text-danger">{{$errors->first('rw')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="desa_rumah" class="form-label">Kelurahan / Desa</label>
            <input type="text" class="form-control {{$errors->has('desa_rumah') ? 'is-invalid' : ''}}" id="desa_rumah" name="desa_rumah" value="">
            @if ($errors->has('desa_rumah'))
                <p class="text-danger">{{$errors->first('desa_rumah')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="kecamatan_rumah" class="form-label">Kecamatan</label>
            <input type="text" class="form-control {{$errors->has('kecamatan_rumah') ? 'is-invalid' : ''}}" id="kecamatan_rumah" name="kecamatan_rumah" value="">
            @if ($errors->has('kecamatan_rumah'))
                      <p class="text-danger">{{$errors->first('kecamatan_rumah')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="kabupaten_rumah" class="form-label">Kabupaten/Kota</label>
            <input type="text" class="form-control {{$errors->has('kabupaten_rumah') ? 'is-invalid' : ''}}" id="kabupaten_rumah" name="kabupaten_rumah" value="">
            @if ($errors->has('kabupaten_rumah'))
                      <p class="text-danger">{{$errors->first('kabupaten_rumah')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="provinsi_rumah" class="form-label">Provinsi</label>
            <input type="text" class="form-control {{$errors->has('provinsi_rumah') ? 'is-invalid' : ''}}" id="provinsi_rumah" name="provinsi_rumah" value="">
            @if ($errors->has('provinsi_rumah'))
                      <p class="text-danger">{{$errors->first('provinsi_rumah')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="kode_pos_rumah" class="form-label">Kode Pos</label>
            <input type="number" class="form-control {{$errors->has('kode_pos_rumah') ? 'is-invalid' : ''}}" id="kode_pos_rumah" name="kode_pos_rumah" value="">
            @if ($errors->has('kode_pos_rumah'))
                <p class="text-danger">{{$errors->first('kode_pos_rumah')}}</p>
            @endif
          </div>
          
        </div>
        <div class="col-12  row">
          <label for="alamat" class="form-label"><b>Alamat Usaha</b></label>
          <div class="col-12">
            <label for="alamat_usaha" class="form-label">Alamat</label>
            <input type="text" class="form-control {{$errors->has('alamat_usaha') ? 'is-invalid' : ''}}" id="alamat_usaha" name="alamat_usaha" value="">
            @if ($errors->has('alamat_usaha'))
                  <p class="text-danger">{{$errors->first('alamat_usaha')}}</p>
            @endif
          </div>
          <div class="col-6">
            <label for="rt_usaha" class="form-label">RT</label>
            <input type="number" class="form-control {{$errors->has('rt_usaha') ? 'is-invalid' : ''}}" id="rt_usaha" name="rt_usaha" value="">
            @if ($errors->has('rt_usaha'))
                    <p class="text-danger">{{$errors->first('rt_usaha')}}</p>
            @endif
          </div>
          <div class="col-6">
            <label for="rw_usaha" class="form-label">RW</label>
            <input type="number" class="form-control {{$errors->has('rw_usaha') ? 'is-invalid' : ''}}" id="rw_usaha" name="rw_usaha" value="">
            @if ($errors->has('rw_usaha'))
                    <p class="text-danger">{{$errors->first('rw')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="desa_usaha" class="form-label">Kelurahan / Desa</label>
            <input type="text" class="form-control {{$errors->has('desa_usaha') ? 'is-invalid' : ''}}" id="desa_usaha" name="desa_usaha" value="">
            @if ($errors->has('desa_usaha'))
                <p class="text-danger">{{$errors->first('desa_usaha')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="kecamatan_usaha" class="form-label">Kecamatan</label>
            <input type="text" class="form-control {{$errors->has('kecamatan_usaha') ? 'is-invalid' : ''}}" id="kecamatan_usaha" name="kecamatan_usaha" value="">
            @if ($errors->has('kecamatan_usaha'))
                      <p class="text-danger">{{$errors->first('kecamatan_usaha')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="kabupaten_usaha" class="form-label">Kabupaten/Kota</label>
            <input type="text" class="form-control {{$errors->has('kabupaten_usaha') ? 'is-invalid' : ''}}" id="kabupaten_usaha" name="kabupaten_usaha" value="">
            @if ($errors->has('kabupaten_usaha'))
                      <p class="text-danger">{{$errors->first('kabupaten_usaha')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="provinsi_usaha" class="form-label">Provinsi</label>
            <input type="text" class="form-control {{$errors->has('provinsi_usaha') ? 'is-invalid' : ''}}" id="provinsi_usaha" name="provinsi_usaha" value="">
            @if ($errors->has('provinsi_usaha'))
                      <p class="text-danger">{{$errors->first('provinsi_usaha')}}</p>
            @endif
          </div>
          <div class="col-12">
            <label for="kode_pos_usaha" class="form-label">Kode Pos</label>
            <input type="number" class="form-control {{$errors->has('kode_pos_usaha') ? 'is-invalid' : ''}}" id="kode_pos_usaha" name="kode_pos_usaha" value="">
            @if ($errors->has('kode_pos_usaha'))
                <p class="text-danger">{{$errors->first('kode_pos_usaha')}}</p>
            @endif
          </div>
          
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="simpan" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div><!-- End Scrolling Modal-->