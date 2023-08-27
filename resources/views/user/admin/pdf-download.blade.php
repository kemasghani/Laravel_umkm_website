<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'nunito', sans-serif;
        }
    </style>

</head>

<body>
    <h1>UMKM Data PDF Report</h1>
    <!-- menampilkan data Jumlah UMKM Berdasarkan Kecamatan -->
    <h2>Jumlah UMKM Berdasarkan Kecamatan</h2>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Kecamatan</th>
                <th>Jumlah UMKM</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jumlah_umkm as $item)
            <tr>
                <td>{{ $item->kecamatan }}</td>
                <td>{{ $item->jumlah_umkm }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- menampilkan data Jumlah UMKM Berdasarkan Bidang Usaha -->
    <h2>Jumlah UMKM Berdasarkan Bidang Usaha</h2>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Bidang Usaha</th>
                <th>Jumlah UMKM</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jumlah_umkm_bidang as $item)
            <tr>
                <td>{{ $item->bidang_usaha }}</td>
                <td>{{ $item->jumlah_umkm_bidang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- menampilkan data UMKM Berdasarkan Total Modal -->
    <h2>List UMKM Berdasarkan Total Modal</h2>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID Umkm</th>
                <th>Total Modal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_umkm as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->total_modal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- menampilkan data UMKM Berdasarkan Jumlah Karyawan -->
    <h2>List UMKM Berdasarkan Jumlah Karyawan</h2>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID Umkm</th>
                <th>Jumlah Karyawan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jumlah_karyawan as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->jumlah_karyawan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- menampilkan data UMKM Berdasarkan Jumlah Omset -->
    <h2>List UMKM Berdasarkan Jumlah Omset</h2>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID Umkm</th>
                <th>Jumlah Omset</th>
            </tr>
        </thead>
        <tbody>
            @foreach($omset_usaha as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->omset_usaha }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>