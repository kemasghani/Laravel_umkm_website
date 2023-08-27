@extends('layouts.app')

@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Sub Kriteria</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Data Sub Kriteria</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Tambah Data Sub Kriteria</h5>

                            <form action="{{ route('admin.seleksi.subkriteria.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="kriteria_id">Kriteria</label>
                                    <select class="form-select @error('kriteria_id') is-invalid @enderror" name="kriteria_id" id="kriteria_id">
                                        <option value="">- Pilih Kriteria -</option>
                                        @foreach ($kriteria as $row)
                                            <option value="{{ $row->id }}" {{ old('kriteria_id') == $row->id ? 'selected' : '' }}>{{ $row->kode_kriteria }} - {{ $row->nama_kriteria }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('kriteria_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_subkriteria">Nama Sub Kriteria</label>
                                    <input type="text" class="form-control @error('nama_subkriteria') is-invalid @enderror" name="nama_subkriteria" id="nama_subkriteria" value="{{ old('nama_subkriteria') }}">
                                    <div class="invalid-feedback">
                                        @error('nama_subkriteria')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nilai_bobot">Nilai Bobot</label>
                                    <input type="number" class="form-control @error('nilai_bobot') is-invalid @enderror" name="nilai_bobot" id="nilai_bobot" value="{{ old('nilai_bobot') }}">
                                    <div class="invalid-feedback">
                                        @error('nilai_bobot')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('admin.seleksi.subkriteria.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
