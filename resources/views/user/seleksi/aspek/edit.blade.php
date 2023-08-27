@extends('layouts.app')

@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Aspek</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Data Aspek</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Ubah Data Aspek</h5>

                            <form action="{{ route('admin.seleksi.aspek.update', $aspek->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama_aspek">Nama Aspek</label>
                                    <input type="text" class="form-control @error('nama_aspek') is-invalid @enderror" name="nama_aspek" id="nama_aspek" value="{{ old('nama_aspek', $aspek->nama_aspek) }}">
                                    <div class="invalid-feedback">
                                        @error('nama_aspek')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bobot">Bobot (%)</label>
                                    <input type="number" class="form-control @error('bobot') is-invalid @enderror" name="bobot" id="bobot" value="{{ old('bobot', $aspek->bobot) }}">
                                    <div class="invalid-feedback">
                                        @error('bobot')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="cf">Core Factor (%)</label>
                                    <input type="number" class="form-control @error('cf') is-invalid @enderror" name="cf" id="cf" value="{{ old('cf', $aspek->cf) }}">
                                    <div class="invalid-feedback">
                                        @error('cf')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="sf">Secondary Factor (%)</label>
                                    <input type="number" class="form-control @error('sf') is-invalid @enderror" name="sf" id="sf" value="{{ old('sf', $aspek->sf) }}">
                                    <div class="invalid-feedback">
                                        @error('sf')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('admin.seleksi.aspek.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
