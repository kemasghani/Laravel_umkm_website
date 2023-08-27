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

                    <form action="{{ route('admin.seleksi.penilaian.store') }}" method="post">
                        @csrf

                        <div class="card">
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Tambah Data Penilaian</h5>

                                <div class="mb-3">
                                    <label for="alternatif_id">Alternatif</label>
                                    <select class="form-select @error('alternatif_id') is-invalid @enderror" name="alternatif_id" id="alternatif_id">
                                        <option value="">- Pilih Alternatif -</option>
                                        @foreach ($alternatif as $row)
                                            <option value="{{ $row->id }}" {{ old('alternatif_id') == $row->id ? 'selected' : '' }}>{{ $row->kode_alternatif }} - {{ $row->umkm->nama_pemilik }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('alternatif_id')
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
                                    <label for="modal">Modal Usaha</label>
                                    <input type="text" class="form-control" name="modal" id="modal" readonly value="{{ old('modal') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_karyawan">Jumlah Tenaga Kerja</label>
                                    <input type="text" class="form-control" name="jumlah_karyawan" id="jumlah_karyawan" readonly value="{{ old('jumlah_karyawan') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="lama_usaha">Lama Usaha</label>
                                    <input type="text" class="form-control" name="lama_usaha" id="lama_usaha" readonly value="{{ old('lama_usaha') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="omset_usaha">Omset Usaha</label>
                                    <input type="text" class="form-control" name="omset_usaha" id="omset_usaha" readonly value="{{ old('omset_usaha') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" readonly value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp">No Telepon/HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" readonly value="{{ old('no_hp') }}">
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Penilaian</h5>

                                @foreach ($aspek as $a)
                                    <div class="mb-1">
                                    <div class="card-title"><b class="bi bi-table">  {{ $a->nama_aspek }}</b></div>
                                    </div>

                                    @foreach ($a->kriteria as $k)
                                        <div class="mb-3">
                                            <label for="kriteria_id.{{ $k->id }}">{{ $k->nama_kriteria }}</label>
                                            <select class="form-select @error('kriteria_id.' . $k->id) is-invalid @enderror" name="kriteria_id[{{ $k->id }}]" id="kriteria_id.{{ $k->id }}" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($k->subkriteria as $row)
                                                    <option value="{{ $row->id }}" {{ old('kriteria_id.' . $k->id) == $row->id ? 'selected' : '' }}>{{ $row->nama_subkriteria }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                @error('kriteria_id.' . $k->id)
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('admin.seleksi.penilaian.index') }}" class="btn btn-secondary">Batal</a>
                                </div>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </section>
    </main>
@endsection

@push('js')
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#alternatif_id').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "{{ route('admin.seleksi.alternatif.get-alternatif') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        $('#nik').val(result.nik);
                        $('#nama_usaha').val(result.nama_usaha);
                        $('#jenis_usaha').val(result.jenis_usaha);
                        $('#nib').val(result.nib);
                        $('#alamat_rumah').val(result.alamat_rumah);
                        $('#alamat_usaha').val(result.alamat_usaha);
                        $('#modal').val(result.modal);
                        $('#jumlah_karyawan').val(result.jumlah_karyawan);
                        $('#lama_usaha').val(result.lama_usaha);
                        $('#omset_usaha').val(result.omset_usaha);
                        $('#email').val(result.email);
                        $('#no_hp').val(result.no_hp);
                    }
                });
            });
        });
    </script>
@endpush
