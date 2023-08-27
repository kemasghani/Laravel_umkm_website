<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style type="text/css">
        html {
            height: 100%
        }

        body {
            height: 100%;
            margin: 0;
            padding: 0
        }

        #map {
            width: 100%;
            height: 82%
        }

        .popUp {
            display: flex;
            align-items: center;
            column-gap: 20px;
            width: 100%;
        }

        .popUpContent {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
        }
    </style>

    @extends('layouts.app')
    @section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <title>Website Pemetaan</title>
    <main id="main" class="main">
        <div class="container-fluid bg-info-light mb-2 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <form id="search-form">
                                    @csrf
                                    <input type="text" class="form-control border-0 py-3" id="alamat_usaha" placeholder="Cari UMKM..." name="search">
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3" name="bidang_usaha">
                                    <option selected>Bidang UMKM</option>
                                    <option value="Kuliner">Kuliner</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Otomotif">Otomotif</option>
                                    <option value="Agribisnis">Agribisnis</option>
                                    <option value="Teknologi Internet"></option>
                                    <option value="Kriya"></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3" name="kecamatan">
                                    <option selected>Kecamatan</option>
                                    <option value="Bantimurung">Bantimurung</option>
                                    <option value="Bontoa">Bontoa</option>
                                    <option value="Camba">Camba</option>
                                    <option value="Cenrana">Cenrana</option>
                                    <option value="Lau">Lau</option>
                                    <option value="Mallawa">Mallawa</option>
                                    <option value="Mandai">Mandai</option>
                                    <option value="Maros Baru">Maros Baru</option>
                                    <option value="Marusu">Marusu</option>
                                    <option value="Moncongloe">Moncongloe</option>
                                    <option value="Simbang">Simbang</option>
                                    <option value="Tanralili">Tanralili</option>
                                    <option value="Tompobulu">Tompobulu</option>
                                    <option value="Turikale">Turikale</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100 py-3" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="map" style="width: 100%; height: 600px;"></div>
    </main>
    <script>
        let latitude = <?php echo ($latitude); ?>;
        let longitude = <?php echo ($longitude); ?>;
        let hasilAllMap = <?php echo ($allMap); ?>;
        var map;
        // Create a map centered at the specified latitude and longitude, and set the zoom level
        // jika tidak ada serach input maka tampil semuanya
        if (hasilAllMap == 1) {
            map = L.map('map').setView([-2.5489, 118.0149], 5);
        } else {
            map = L.map('map').setView([latitude, longitude], 100);
        };
        // Add a tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add a marker to the map
        var umkmsAll = @json($umkmsAll);
        umkmsAll.forEach(function(umkm) {
            var latitude = umkm.latitude;
            var longitude = umkm.longitude;

            var marker = L.marker([latitude, longitude]).addTo(map);
            // tambah content pada pop up marker
            var popupContent = `
            <div class="popUp">
                <div>
                    <img src="{{ asset('storage/') }}/${umkm.foto}" alt="" width="500">
                </div>
                <div class="popUpContent">
                    <span>Nama Usaha : ${umkm.nama_usaha}</span>
                    <span>Nama Pemilik : ${umkm.nama_pemilik}</span>
                    <span>Alamat Usaha : ${umkm.alamat_usaha}</span>
                    <span>Bidang Usaha : ${umkm.bidang_usaha}</span>
                    <span>Jenis Usaha : ${umkm.jenis_usaha}</span>
                    <span>Kecamata : ${umkm.kecamatan}</span>
                    <span>Jumlah karyawan : ${umkm.jumlah_karyawan}</span>
                    <span>NIB : ${umkm.nib}</span>
                    <span>Latitude : ${umkm.latitude}</span>
                    <span>Longitude : ${umkm.longitude}</span>
                </div>
            </div>`;
            marker.bindPopup(popupContent, {
                minWidth: 520, // Adjust the minWidth as needed
            });
            marker.on('click', function() {
                map.addLayer(marker);
            });
            map.addLayer(marker);
        });
    </script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    </body>

</html>