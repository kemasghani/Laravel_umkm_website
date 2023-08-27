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

                    <form action="{{ route('admin.seleksi.penilaian.update', $penilaian->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Ubah Data Penilaian</h5>

                                <div class="mb-3">
                                    <label for="kode_alternatif">Kode Alternatif</label>
                                    <input type="text" class="form-control" name="kode_alternatif" id="kode_alternatif" readonly value="{{ old('kode_alternatif', $penilaian->alternatif->kode_alternatif) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_alternatif">Nama Alternatif</label>
                                    <input type="text" class="form-control" name="nama_alternatif" id="nama_alternatif" readonly value="{{ old('nama_alternatif', $penilaian->alternatif->umkm->nama_pemilik) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" name="nik" id="nik" readonly value="{{ old('nik', $penilaian->alternatif->umkm->nik) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_usaha">Nama Usaha</label>
                                    <input type="text" class="form-control" name="nama_usaha" id="nama_usaha" readonly value="{{ old('nama_usaha', $penilaian->alternatif->umkm->nama_usaha) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_usaha">Jenis Usaha</label>
                                    <input type="text" class="form-control" name="jenis_usaha" id="jenis_usaha" readonly value="{{ old('jenis_usaha', $penilaian->alternatif->umkm->jenis_usaha) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nib">NIB</label>
                                    <input type="text" class="form-control" name="nib" id="nib" readonly value="{{ old('nib', $penilaian->alternatif->umkm->nib) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_rumah">Alamat Rumah</label>
                                    <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah" readonly value="{{ old('alamat_rumah', $penilaian->alternatif->umkm->alamat_rumah) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_usaha">Alamat Usaha</label>
                                    <input type="text" class="form-control" name="alamat_usaha" id="alamat_usaha" readonly value="{{ old('alamat_usaha', $penilaian->alternatif->umkm->alamat_usaha) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="modal">Modal Usaha</label>
                                    <input type="text" class="form-control" name="modal" id="modal" readonly value="{{ old('modal', $penilaian->alternatif->umkm->modal) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_karyawan">Jumlah Tenaga Kerja</label>
                                    <input type="text" class="form-control" name="jumlah_karyawan" id="jumlah_karyawan" readonly value="{{ old('jumlah_karyawan', $penilaian->alternatif->umkm->jumlah_karyawan) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="lama_usaha">Lama Usaha</label>
                                    <input type="text" class="form-control" name="lama_usaha" id="lama_usaha" readonly value="{{ old('lama_usaha', $penilaian->alternatif->umkm->lama_usaha) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="omset_usaha">Omset Usaha</label>
                                    <input type="text" class="form-control" name="omset_usaha" id="omset_usaha" readonly value="{{ old('omset_usaha', $penilaian->alternatif->umkm->omset_usaha) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" readonly value="{{ old('email', $penilaian->alternatif->umkm->email) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp">No Telepon/HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" readonly value="{{ old('no_hp', $penilaian->alternatif->umkm->no_hp) }}">
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Penilaian</h5>

                                @foreach ($aspek as $a)
                                    <div class="mb1">
                                    <div class="card-title"><b class="bi bi-table">  {{ $a->nama_aspek }}</b></div>
                                    </div>

                                    @foreach ($a->kriteria as $k)
                                        <div class="mb-3">
                                            <label for="kriteria_id.{{ $k->id }}">{{ $k->nama_kriteria }}</label>
                                            <select class="form-select @error('kriteria_id.' . $k->id) is-invalid @enderror" name="kriteria_id[{{ $k->id }}]" id="kriteria_id.{{ $k->id }}" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($k->subkriteria as $row)
                                                    <option value="{{ $row->id }}" {{ old('kriteria_id.' . $k->id, $nilai[$k->id]) == $row->id ? 'selected' : '' }}>{{ $row->nama_subkriteria }}</option>
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
                        $('#nama_usaha').val(result.nama_usaha);
                    }
                });
            });
        });
    </script>
@endpush
