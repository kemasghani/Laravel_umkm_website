<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
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

        .tengah {
            text-align: center;
            line-height: 9%
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
        <h4 class="paragraf">Formulir Pemilik UMKM Kabupaten Maros</h4>
    </div>
    <br>

    <div>
        {{-- <img src="{{ public_path("storage"."/".$umkm->foto) }}" alt="foto" width="30%" >         --}}
        <div class="td">
        <table width="100%">
        <td width="20%" rowspan="12">
                    <img src="{{ public_path('storage' . '/' . $umkm->foto) }}" class="rounded-circle" alt="foto" width="120px" height="150px" border="2">
                </td>
        
                <td>Nama Pemilik</td>
                <td>{{ ': ' . $umkm->nama_pemilik }}</td>
            </tr>
            <tr>
                <td>Nama Usaha</td>
                <td>{{ ': ' . $umkm->nama_usaha }}</td>
            </tr>
            <tr>
                <td>Jenis Usaha</td>
                <td>{{ ': ' . $umkm->jenis_usaha }}</td>
            </tr>
            <tr>

                <td>Nomor Induk Kependudukan (NIK)</td>
                <td>{{ ': ' . $umkm->nik }}</td>
            </tr>
            <tr>
                <td>Nomor Induk Berusaha (NIB)</td>
                <td>{{ ': ' . $umkm->nib }}</td>
            </tr>
            <tr>
                <td>Pangan Industri Rumah Tangga (PIRT)</td>
                <td>{{ ': ' . $umkm->pirt }}</td>
            </tr>
                <td>Nomor Pokok Wajib Pajak (NPWP)</td>
                <td>{{ ': ' . $umkm->npwp }}</td>
            </tr>
            <tr>
                <td>Halal</td>
                <td>{{ ': ' . $umkm->halal }}</td>
            </tr>
            <tr>
                <td>Hak Atas Kekayaan Intelektual (HAKI)</td>
                <td>{{ ': ' . $umkm->haki }}</td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td>Modal Usaha</td>
                <td>{{ ': ' . number_format($umkm->modal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Jumlah Tenaga Kerja</td>
                <td>{{ ': ' . $umkm->jumlah_karyawan }}</td>
            </tr>
            <tr>
                <td >Mulai Usaha</td>
                <td >{{ ': ' . \Carbon\Carbon::createFromFormat('Y-m-d', $umkm->tanggal_mulai_usaha)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td>Lama Usaha</td>
                <td >{{ ': ' . $umkm->lama_usaha }}</td>
            </tr>
            <tr>
                <td >Omset Usaha</td>
                <td >{{ ': ' . number_format($umkm->omset_usaha, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td >Jenis Kemitraan Yang Diperoleh</td>
                <td >{{ ': ' . $umkm->jenis_kemitraan }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ ': ' . $umkm->email }}</td>
            </tr>
            <tr>
                <td>Nomor Handphone</td>
                <td>{{ ': ' . $umkm->no_hp }}</td>
            </tr>
            <tr>
                <td >Alamat Rumah</td>
                <td width="50%">{{ ': ' . $umkm->alamat_rumah }}</td>
            </tr>
            <tr>
                <td >Alamat Usaha</td>
                <td width="50%">{{ ': ' . $umkm->alamat_usaha }}</td>
            </tr>
            <br>
            <br>
            <tr>
                <td align="left" colspan="2">Maros, {{ date('d-M-Y') }}</td>
            </tr>
            <tr>
                <td align="left" colspan="2">Pemilik UMKM</td>
            </tr>
            <tr style="margin-top: 10px;width:30% ;">
                <td align="left" colspan="2">{{ $umkm->nama_usaha }}</td>
            </tr>
            <br>
            <br>
            <br>
            <br>
            <tr style="margin-top: 10px;">
                <td align="left" colspan="2">{{ $umkm->nama_pemilik }}</td>
            <tr style="margin-top: 10px;">
                <td align="left" colspan="2">{{ $umkm->nik }}</td>
            </tr>

        </table>


    </div>
    <div>
</body>

</html>
