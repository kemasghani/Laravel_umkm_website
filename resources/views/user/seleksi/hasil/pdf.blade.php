<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Hasil Seleksi UMKM Maros</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        th {
            height: 20px;
            align: center;
        }
        

        table,
        th,
        td {
            border: 1px solid black;
            vertical-align: top;
        }

        th,
        td {
            padding: 3px;
        }

        thead {
            background: lightgray;
        }

        .center {
            text-align: center;
        }

        .mt-1 {
            margin-top: 20px;
        }

        .mt-2 {
            margin-top: 40px;
        }

        .container {
            display: table;
            width: 100%;
        }

        .left-column {
            display: table-cell;
            width: 20%;
            text-align: center;
        }

        .right-column {
            display: table-cell;
            width: 80%;
            text-align: center;
        }

        .table-no-border {
            font-size: 15px;
            table-layout: fixed;
        }

        .table-no-border,
        .table-no-border th,
        .table-no-border td {
            border: none;
        }

        .table-no-border-2,
        .table-no-border-2 th,
        .table-no-border-2 td {
            border: none;
        }

        .tengah {
            text-align: center;
            line-height: 9%;
        }

        .rangkasurat {
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 1%;
        }

        .td {
            font-size: 15px;
        }

        .table {
            border-bottom: 3px solid #000;
            padding: 1%;
        }

        
        .paragraf {
            text-align: center;
            margin-top: 3%;
            /* font-weight: 500; */
        }
    </style>
</head>

<body>
    <div class="rangkasurat">
        <table width="100%" class="table">
            <tr>
                <td>
                <td class="tengah">
                <img src="{{ public_path('img/logo.jpg') }}" width="80px" alt="" class="rounded">
                    <h4>PEMERINTAH KABUPATEN MAROS</h4>
                    <h4>DINAS KOPERASI, USAHA KECIL DAN MENENGAH</h4>
                    <h4>PERINDUSTRIAN DAN PERDAGANGAN</h4>
                    <small>Jln. Jend. Sudirman (Kompleks Kantor Bupati Maros), Kel. Pettuadae, Kec. Turikale, Kab. Maros Kode Pos : 90561</small>
                    <p><small>Email : koperasi@maroskab.go.id, Website : www.maroskab.go.id</small></p>
                    </td>
                
                </td>
            </tr>

        </table>
        </div>

    <h3 class="center">HASIL REKOMENDASI BANTUAN UMKM MAROS</h3>

    <hr>

    <table class="mt-2">
        <thead>
            <tr class="center">
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>NIK</th>
                <th>Nama Usaha</th>
                <th>Jenis Usaha</th>
                <th>NIB</th>
                <th>No Telepon/HP</th>
                <th>Nilai Total</th>
                <th>Ranking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $a)
                <tr>
                    <td class="center">{{ $a->alternatif->kode_alternatif }}</td>
                    <td>{{ $a->alternatif->umkm->nama_pemilik }}</td>
                    <td class="center">{{ $a->alternatif->umkm->nik }}</td>
                    <td>{{ $a->alternatif->umkm->nama_usaha }}</td>
                    <td>{{ $a->alternatif->umkm->jenis_usaha }}</td>
                    <td class="center">{{ $a->alternatif->umkm->nib }}</td>
                    <td class="center">{{ $a->alternatif->umkm->no_hp }}</td>
                    <td class="center">{{ $a->nilai_akhir }}</td>
                    <td class="center"><b>{{ $loop->iteration }}</b></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="mt-2" style="text-indent: 30px; text-align: justify;">
        Dari hasil perhitungan nilai total maka diperoleh hasil rekomendasi untuk yang diambil untuk mendapatkan rekomendasi bantuan UMKM yaitu hasil perangkingan yang nilai totalnya dari terbesar.
    </p>

    <table class="table-no-border mt-1">
        <tr>
            <td>
                Dikeluarkan Di Maros<br>
                Pada Tanggal : {{ date('d-m-Y') }}<br>
                Kepala Bidang UMKM
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table class="table-no-border mt-2">
        <tr>
            <td><b>.............................................</b></td>
            <td></td>
        </tr>
        <tr>
            <td>NIP.</td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>
