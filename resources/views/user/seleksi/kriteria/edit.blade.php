@extends('layouts.app')

@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Kriteria</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Data Kriteria</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Ubah Data Kriteria</h5>

                            <form action="{{ route('admin.seleksi.kriteria.update', $kriteria->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="aspek_id">Aspek</label>
                                    <select class="form-select @error('aspek_id') is-invalid @enderror" name="aspek_id" id="aspek_id">
                                        <option value="">- Pilih Aspek -</option>
                                        @foreach ($aspek as $row)
                                            <option value="{{ $row->id }}" {{ old('aspek_id', $kriteria->aspek_id) == $row->id ? 'selected' : '' }}>{{ $row->nama_aspek }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('aspek_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kode_kriteria">Kode Kriteria</label>
                                    <input type="text" class="form-control @error('kode_kriteria') is-invalid @enderror" name="kode_kriteria" id="kode_kriteria" value="{{ old('kode_kriteria', $kriteria->kode_kriteria) }}">
                                    <div class="invalid-feedback">
                                        @error('kode_kriteria')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kriteria">Nama Kriteria</label>
                                    <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" name="nama_kriteria" id="nama_kriteria" value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}">
                                    <div class="invalid-feedback">
                                        @error('nama_kriteria')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis">Jenis Factor</label>
                                    <select class="form-select @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                                        <option value="">- Pilih Jenis Factor -</option>
                                        <option value="cf" {{ old('jenis', $kriteria->jenis) == 'cf' ? 'selected' : '' }}>Core Factor</option>
                                        <option value="sf" {{ old('jenis', $kriteria->jenis) == 'sf' ? 'selected' : '' }}>Secondary Factor</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('jenis')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="target">Nilai Target</label>
                                    <input type="number" class="form-control @error('target') is-invalid @enderror" name="target" id="target" value="{{ old('target', $kriteria->target) }}">
                                    <div class="invalid-feedback">
                                        @error('target')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('admin.seleksi.kriteria.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
