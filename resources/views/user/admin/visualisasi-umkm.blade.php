<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chartContainer {
            display: flex;
            flex-direction: column;

            width: 75vh;
        }

        .div1,
        .div2,
        .div3 {
            display: flex;
        }

        #main {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    @extends('layouts.app')
    @section('content')
    @include('components.navbar')
    @include('components.sidebar')

    <main id="main" class="main">
        <button id="barChartButton">Bar Chart</button>
        <button id="lineChartButton">Line Chart</button>
        <a href="{{ route('admin.umkm.pdf_download') }}" class="btn btn-primary">Download PDF</a>

        <div class="chartContainer">
            <div class="div1">
                <canvas id="myChart"></canvas>
                <canvas id="myChart2"></canvas>
            </div>
            <div class="div2">
                <canvas id="myChart3"></canvas>
                <canvas id="myChart4"></canvas>
            </div>
            <div class="div3">
                <canvas id="myChart5"></canvas>
            </div>
        </div>
    </main>

    <script>
        // chart 1
        var umkmData = <?php echo $list_umkm; ?>;

        // Replace null values with 0
        umkmData.forEach(item => {
            if (item.total_modal === null) {
                item.total_modal = 0;
            }
        });

        var ctx1 = document.getElementById('myChart').getContext('2d');
        var myChart1;

        // Function to create or update the chart
        function createOrUpdateChart1(chartType) {
            if (myChart1) {
                myChart1.destroy(); // Destroy previous chart if exists
            }

            var chartConfig = {
                type: chartType,
                data: {
                    labels: umkmData.map(item => item.id),
                    datasets: [{
                        label: 'Total Modal',
                        data: umkmData.map(item => item.total_modal),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            offset: true
                        },
                        y: {
                            beginAtZero: true
                        }

                    }
                }
            };

            myChart1 = new Chart(ctx1, chartConfig);
        }

        // Initial creation of chart 1
        createOrUpdateChart1('bar');

        // chart 2
        var jumlahKaryawanData = <?php echo $jumlah_karyawan; ?>;

        // Replace null values with 0
        jumlahKaryawanData.forEach(item => {
            if (item.jumlah_karyawan === null) {
                item.jumlah_karyawan = 0;
            }
        });

        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2;

        // Function to create or update chart 2
        function createOrUpdateChart2(chartType) {
            if (myChart2) {
                myChart2.destroy(); // Destroy previous chart if exists
            }

            var chartConfig = {
                type: chartType,
                data: {
                    labels: jumlahKaryawanData.map(item => item.id),
                    datasets: [{
                        label: 'Jumlah Karyawan',
                        data: jumlahKaryawanData.map(item => item.jumlah_karyawan),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            offset: true
                        },
                        y: {
                            beginAtZero: true
                        }

                    }
                }
            };

            myChart2 = new Chart(ctx2, chartConfig);
        }

        // Initial creation of chart 2
        createOrUpdateChart2('bar');

        // chart 3
        var jumlahUmkm = <?php echo $jumlah_umkm; ?>;

        // Replace null values with 0
        jumlahUmkm.forEach(item => {
            if (item.jumlah_umkm === null) {
                item.jumlah_umkm = 0;
            }
        });

        var ctx3 = document.getElementById('myChart3').getContext('2d');
        var myChart3;

        // Function to create or update chart 3
        function createOrUpdateChart3(chartType) {
            if (myChart3) {
                myChart3.destroy(); // Destroy previous chart if exists
            }

            var chartConfig = {
                type: chartType,
                data: {
                    labels: jumlahUmkm.map(item => item.kecamatan),
                    datasets: [{
                        label: 'jumlah umkm berdasarkan kecamatan',
                        data: jumlahUmkm.map(item => item.jumlah_umkm),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            offset: true
                        },
                        y: {
                            beginAtZero: true
                        }

                    }
                }
            };

            myChart3 = new Chart(ctx3, chartConfig);
        }

        // Initial creation of chart 3
        createOrUpdateChart3('bar');


        // chart 4
        var jumkahUmkmBidang = <?php echo $jumlah_umkm_bidang; ?>;

        var ctx4 = document.getElementById('myChart4').getContext('2d');
        var myChart4;

        // Function to create or update chart 4
        function createOrUpdateChart4(chartType) {
            if (myChart4) {
                myChart4.destroy(); // Destroy previous chart if exists
            }

            var chartConfig = {
                type: chartType,
                data: {
                    labels: jumkahUmkmBidang.map(item => item.bidang_usaha),
                    datasets: [{
                        label: 'Jumlah umkm berdasarkan bidang usaha',
                        data: jumkahUmkmBidang.map(item => item.jumlah_umkm_bidang),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            offset: true
                        },
                        y: {
                            beginAtZero: true,
                            min: 0,
                        }
                    }
                }
            };

            myChart4 = new Chart(ctx4, chartConfig);
        }

        // Initial creation of chart 4
        createOrUpdateChart4('bar');

        // chart 5
        var omset_usaha = <?php echo $omset_usaha; ?>;

        var ctx5 = document.getElementById('myChart5').getContext('2d');
        var myChart5;

        // Function to create or update chart 5
        function createOrUpdateChart5(chartType) {
            if (myChart5) {
                myChart5.destroy(); // Destroy previous chart if exists
            }

            var chartConfig = {
                type: chartType,
                data: {
                    labels: omset_usaha.map(item => item.id),
                    datasets: [{
                        label: 'Omset usaha',
                        data: omset_usaha.map(item => item.omset_usaha),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {

                    scales: {
                        x: {
                            beginAtZero: true,
                            offset: true
                        },
                        y: {
                            beginAtZero: true
                        }

                    }

                }
            };

            myChart5 = new Chart(ctx5, chartConfig);
        }

        // Initial creation of chart 5
        createOrUpdateChart5('bar');
        // Button click event handlers
        document.getElementById('barChartButton').addEventListener('click', function() {
            createOrUpdateChart1('bar');
            createOrUpdateChart2('bar');
            createOrUpdateChart3('bar');
            createOrUpdateChart4('bar');
            createOrUpdateChart5('bar');
        });

        document.getElementById('lineChartButton').addEventListener('click', function() {
            createOrUpdateChart1('line');
            createOrUpdateChart2('line');
            createOrUpdateChart3('line');
            createOrUpdateChart4('line');
            createOrUpdateChart5('line');
        });
    </script>
</body>

</html>