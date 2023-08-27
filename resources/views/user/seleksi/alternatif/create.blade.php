@extends('layouts.app')

@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Alternatif</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Data Alternatif</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Tambah Data Alternatif</h5>

                            <form action="{{ route('admin.seleksi.alternatif.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_alternatif">Kode Alternatif</label>
                                    <input type="text" class="form-control @error('kode_alternatif') is-invalid @enderror" name="kode_alternatif" id="kode_alternatif" value="{{ old('kode_alternatif') }}">
                                    <div class="invalid-feedback">
                                        @error('kode_alternatif')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="umkms_id">UMKM</label>
                                    <select class="form-select @error('umkms_id') is-invalid @enderror" name="umkms_id" id="umkms_id">
                                        <option value="">- Pilih UMKM -</option>
                                        @foreach ($umkm as $row)
                                            <option value="{{ $row->id }}" {{ old('umkms_id') == $row->id ? 'selected' : '' }}>{{ $row->nama_pemilik }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('umkms_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" name="nik" id="nik" readonly value="{{ old('nik') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_usaha">Nama Usaha</label>
                                    <input type="text" class="form-control" name="nama_usaha" id="nama_usaha" readonly value="{{ old('nama_usaha') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_usaha">Jenis Usaha</label>
                                    <input type="text" class="form-control" name="jenis_usaha" id="jenis_usaha" readonly value="{{ old('jenis_usaha') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nib">NIB</label>
                                    <input type="text" class="form-control" name="nib" id="nib" readonly value="{{ old('nib') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_rumah">Alamat Rumah</label>
                                    <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah" readonly value="{{ old('alamat_rumah') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_usaha">Alamat Usaha</label>
                                    <input type="text" class="form-control" name="alamat_usaha" id="alamat_usaha" readonly value="{{ old('alamat_usaha') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" readonly value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp">No Telepon/HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" readonly value="{{ old('no_hp') }}">
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('admin.seleksi.alternatif.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection

@push('js')
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#umkms_id').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "{{ route('admin.seleksi.alternatif.get-umkm') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        $('#nama_usaha').val(result.nama_usaha);
                        $('#jenis_usaha').val(result.jenis_usaha);
                        $('#nik').val(result.nik);
                        $('#nib').val(result.nib);
                        $('#alamat_rumah').val(result.alamat_rumah);
                        $('#alamat_usaha').val(result.alamat_usaha);
                        $('#email').val(result.email);
                        $('#no_hp').val(result.no_hp);
                    }
                });
            });
        });
    </script>
@endpush
