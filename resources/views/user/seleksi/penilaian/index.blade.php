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
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Data Penilaian</h5>

                            <div class="mb-3">
                                <a href="{{ route('admin.seleksi.penilaian.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>

                            <table id="dataTable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Alternatif</th>
                                        <th scope="col">Nama Alternatif</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Nama Usaha</th>
                                        <th scope="col">Jenis Usaha</th>
                                        <th scope="col">NIB</th>
                                        <th scope="col">Alamat Rumah</th>
                                        <th scope="col">Alamat Usaha</th>
                                        <th scope="col">Modal Usaha</th>
                                        <th scope="col">Jumlah Tenaga Kerja</th>
                                        <th scope="col">Lama Usaha</th>
                                        <th scope="col">Omset Usaha</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No Telepon/HP</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penilaian as $row)
                                        <tr>
                                            <td></td>
                                            <td>{{ $row->alternatif->kode_alternatif }}</td>
                                            <td>{{ $row->alternatif->umkm->nama_pemilik }}</td>
                                            <td>{{ $row->alternatif->umkm->nik }}</td>
                                            <td>{{ $row->alternatif->umkm->nama_usaha }}</td>
                                            <td>{{ $row->alternatif->umkm->jenis_usaha }}</td>
                                            <td>{{ $row->alternatif->umkm->nib }}</td>
                                            <td>{{ $row->alternatif->umkm->alamat_rumah }}</td>
                                            <td>{{ $row->alternatif->umkm->alamat_usaha }}</td>
                                            <td>{{ number_format($row->alternatif->umkm->modal) }}</td>
                                            <td>{{ $row->alternatif->umkm->jumlah_karyawan }}</td>
                                            <td>{{ $row->alternatif->umkm->lama_usaha }}</td>
                                            <td>{{ number_format($row->alternatif->umkm->omset_usaha) }}</td>
                                            <td>{{ $row->alternatif->umkm->email }}</td>
                                            <td>{{ $row->alternatif->umkm->no_hp }}</td>
                                            <td>
                                                <form action="{{ route('admin.seleksi.penilaian.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.seleksi.penilaian.show', $row->id) }}" class="btn btn-info btn-sm text-white me-1" title="Detail"><i class="bi bi-list"></i></a>
                                                        <a href="{{ route('admin.seleksi.penilaian.edit', $row->id) }}" class="btn btn-success btn-sm me-1" title="Ubah"><i class="bi bi-pencil"></i></a>
                                                        <button class="btn btn-danger btn-sm delete-confirm" type="submit" title="Hapus"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@push('js')
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            let dt = $("#dataTable").DataTable({
                responsive: true,
                lengthChange: true,
                info: true,
                oLanguage: {
                    sSearch: "Cari : ",
                    sLengthMenu: "_MENU_ &nbsp;&nbsp;data per halaman",
                    sInfo: "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
                    sInfoEmpty: "",
                    sInfoFiltered: "(difilter dari _MAX_ total data)",
                    sZeroRecords: "Pencarian tidak ditemukan",
                    sEmptyTable: "Tidak ada data",
                },
            });

            dt.on("order.dt search.dt", function() {
                dt.column(0, {
                        search: "applied",
                        order: "applied",
                    })
                    .nodes()
                    .each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
            }).draw();

            $('#dataTable').on('click', '.delete-confirm', function(event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal({
                        title: "Konfirmasi",
                        text: "Anda yakin data ini mau dihapus?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        });

        @if (session()->has('success'))
            swal({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success'
            });
        @elseif (session()->has('error'))
            swal({
                title: 'Gagal!',
                text: '{{ session('error') }}',
                icon: 'error'
            });
        @endif
    </script>
@endpush
