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
            font-size: 14px;
        }

        .table {
            border-bottom: 3px solid #000;
            padding: 1%;
        }

        .tengah {
            text-align: center;
            line-height: 9%;
        }

        .paragraf {
            text-align: center;
            margin-top: 2%;
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
        <h4 class="paragraf">Formulir Pendaftaran UMKM Kabupaten Maros</h4>
    </div>

    <div>
        {{-- <img src="{{ public_path("storage"."/".$umkm->foto) }}" alt="foto" width="30%" >         --}}
    <div class="td">
        <table width="100%">
            <tr>
                <td width="0.5%"><b>1.</b></td>
                <td width="3%">
                    <b>Data Peserta UMKM</b>
                </td>
                <td width="5%"></td>
            </tr>
            <tr>
                <td></td>
                <td width="5%">Nama Pemilik</td>
                <td width="3%">{{ ': ' . $umkm->nama_pemilik }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Tempat Lahir</td>
                <td width="5%">{{ ': ' . $umkm->tempat_lahir }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Tanggal Lahir</td>
                <td width="5%">{{ ': ' . \Carbon\Carbon::createFromFormat('Y-m-d', $umkm->tanggal_lahir)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Jenis Kelamin</td>
                <td width="5%">{{ ': ' . $umkm->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Agama</td>
                <td width="5%">{{ ': ' . $umkm->agama }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Kewarganegaraan</td>
                <td width="5%">{{ ': ' . $umkm->kewarganegaraan }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Nama Usaha</td>
                <td width="5%">{{ ': ' . $umkm->nama_usaha }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Jenis Usaha</td>
                <td width="5%">{{ ': ' . $umkm->jenis_usaha }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Nomor Induk Kependudukan (NIK)</td>
                <td width="5%">{{ ': ' . $umkm->nik }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Nomor Induk Berusaha (NIB)</td>
                <td width="5%">{{ ': ' . $umkm->nib }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="5%">Pangan Industri Rumah Tangga (PIRT)</td>
                <td width="5%">{{ ': ' . $umkm->pirt }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Nomor Pokok Wajib Pajak (NPWP)</td>
                <td width="5%">{{ ': ' . $umkm->npwp }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Halal</td>
                <td width="5%">{{ ': ' . $umkm->halal }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Hak Atas Kekayaan Intelektual (HAKI)</td>
                <td width="5%">{{ ': ' . $umkm->haki }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Modal Usaha</td>
                <td width="5%">{{ ': ' . number_format($umkm->modal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Jumlah Tenaga Kerja</td>
                <td width="5%">{{ ': ' . $umkm->jumlah_karyawan }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Mulai Usaha</td>
                <td width="5%">{{ ': ' . \Carbon\Carbon::createFromFormat('Y-m-d', $umkm->tanggal_mulai_usaha)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Lama Usaha</td>
                <td width="5%">{{ ': ' . $umkm->lama_usaha }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Omset Usaha</td>
                <td width="5%">{{ ': ' . number_format($umkm->omset_usaha, 0, ',', '.') }}</td>
            </tr>

            <tr>
                <td></td>
                <td width="3%">Jenis Kemitraan Yang Diperoleh</td>
                <td width="5%">{{ ': ' . $umkm->jenis_kemitraan }}</td>
            </tr>

            <tr>
                <td></td>
                <td width="3%">Email</td>
                <td width="5%">{{ ': ' . $umkm->email }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">No Telepon/HP</td>
                <td width="5%">{{ ': ' . $umkm->no_hp }}</td>
            </tr>
            <tr>
                <td width="0.5%"><b>2.</b></td>
                <td width="3%">
                    <b>Data Alamat UMKM</b>
                </td>
                <td width="5%"></td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Alamat Rumah </td>
                <td width="5%">{{ ': ' . $umkm->alamat_rumah }}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Alamat Usaha</td>
                <td width="5%">{{ ': ' . $umkm->alamat_usaha }}</td>
            </tr>
        </table>
        <table style="" width="100%">
            <tr height="100%">
                <td><img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $umkm->nik . '-' . $umkm->nama_pemilik }}&amp;size=80x80" alt=""></td>
                <td><img src="{{ public_path('storage' . '/' . $umkm->foto) }}" alt="foto" width="35%"></td>
                <td width="30%">
                    <p>Maros, {{ date('d-M-Y') }}</p>
                    <p>Pendaftar</p>
                    <br />
                    <br />
                    <b>{{ $umkm->nama_pemilik }}</b>
                </td>
            </tr>
        </table>
    </div>
    </div>
</body>

</html>
