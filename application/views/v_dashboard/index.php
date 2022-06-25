<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
    </div>
    <!-- Membuat Salam Ucapan -->
    <?php

    date_default_timezone_set("Asia/Jakarta");

    $b = time();
    $hour = date("G", $b);

    if ($hour >= 0 && $hour <= 11) {
        echo "<div class='alert alert-success' role='alert'>
        <h4 class='alert-heading'><b>Hai Kak,";
        echo $this->session->userdata('nama_admin');
        echo "<br>";
        echo "Selamat Pagi <i class='far fa-smile-beam text-info'></i></h4>
        <p>Selamat Datang di Halaman Admin Sistem Rekomendasi Paket Wisata</b></p>
        <hr>
        </div>";
    } elseif ($hour >= 12 && $hour <= 14) {
        echo "<div class='alert alert-success' role='alert'>
        <h4 class='alert-heading'><b>Hai Kak,";
        echo $this->session->userdata('nama_admin');
        echo "<br>";
        echo "Selamat Siang <i class='far fa-smile-beam text-info'></i></h4>
        <p>Selamat Datang di Halaman Admin Sistem Rekomendasi Paket Wisata</b></p>
        <hr>
        </div>";
    } elseif ($hour >= 15 && $hour <= 17) {
        echo "<div class='alert alert-success' role='alert'>
        <h4 class='alert-heading'><b>Hai Kak,";
        echo $this->session->userdata('nama_admin');
        echo "<br>";
        echo "Selamat Sore <i class='far fa-smile-beam text-info'></i></h4>
        <p>Selamat Datang di Halaman Admin Sistem Rekomendasi Paket Wisata</b></p>
        <hr>
        </div>";
    } elseif ($hour >= 17 && $hour <= 18) {
        echo "<div class='alert alert-success' role='alert'>
        <h4 class='alert-heading'><b>Hai Kak,";
        echo $this->session->userdata('nama_admin');
        echo "<br>";
        echo "Selamat Petang <i class='far fa-smile-beam text-info'></i></h4>
        <p>Selamat Datang di Halaman Admin Sistem Rekomendasi Paket Wisata</b></p>
        <hr>
        </div>";
    } elseif ($hour >= 19 && $hour <= 23) {
        echo "<div class='alert alert-success' role='alert'>
        <h4 class='alert-heading'><b>Hai Kak,";
        echo $this->session->userdata('nama_admin');
        echo "<br>";
        echo "Selamat Malam <i class='far fa-smile-beam text-info'></i></h4>
        <p>Selamat Datang di Halaman Admin Sistem Rekomendasi Paket Wisata</b></p>
        <hr>
        </div>";
    }

    ?>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_admin ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Paket Wisata</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_paket_wisata ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Destinasi Tujuan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_destinasi_tujuan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-mountain fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Kontak Tourism Information Center</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_tic ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Harga Paket Wisata</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-lg-4 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Buku Manual Admin</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <i class="fas fa-4x fa-book-reader text-success"></i>
                    </div>
                    <p class="mt-4 text-justify">Buku petunjuk (user manual book) pengelolahan data-data master Aplikasi Sisrepawa.</p>
                    <a href="<?php echo base_url('assets/bukupanduan/Versi1.0-ManualBookSisrepawaAdmin.pdf') ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<!-- /.container-fluid -->
<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->

<script src="assets/js/demo/chart-pie-demo.js"></script>
<script src="assets/js/demo/chart-bar-demo.js"></script>

<script>
    <?php
    $labele = "";
    $datane = "";
    foreach ($labelnya as $key => $value) {

        $labele .= '"' . $value['nama_paket_wisata'] . '",';
        $datane .= "" . $value['harga_paket_wisata'] . ",";
    }
    $labele = rtrim($labele, ",");
    $datane = rtrim($datane, ",");
    echo "var labele = [$labele];\n ";
    echo "var datane = [$datane];";
    ?>
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: labele,
            datasets: [{
                label: "Harga Paket",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: datane,
            }, ],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0,
                },
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: "date",
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        maxTicksLimit: 7,
                    },
                }, ],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return "Rp" + number_format(value);
                        },
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2],
                    },
                }, ],
            },
            legend: {
                display: false,
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: "#6e707e",
                titleFontSize: 14,
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: "index",
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel =
                            chart.datasets[tooltipItem.datasetIndex].label || "";
                        return datasetLabel + ": Rp" + number_format(tooltipItem.yLabel);
                    },
                },
            },
        },
    });
</script>