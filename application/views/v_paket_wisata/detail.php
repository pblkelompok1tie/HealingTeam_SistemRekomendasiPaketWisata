<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /> -->
    <div class="container">
        <div class="row">

            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($data_detail_paket_wisata as $d) : ?>
                            <h3 class="card-title">Detail <?= $d['nama_paket_wisata']; ?></h3>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6">
                                    <br>
                                    <br>
                                    <div class="white-box text-center"><img src="<?php echo base_url(); ?>assets/img/paket_wisata/<?= $d['foto_paket_wisata']; ?>" class="img-responsive"></div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6">
                                    <h4 class="box-title mt-5">Deskripsi Paket Wisata</h4>
                                    <p><?= $d['deskripsi_paket_wisata']; ?></p>
                                    <h4 class="box-title mt-4">Harga</h4>
                                    <h6>
                                        <?= "Rp" . number_format($d['harga_paket_wisata'], 2, ',', '.'); ?>
                                    </h6>
                                    <h4 class="box-title mt-4">Durasi Paket Wisata</h4>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-clock text-success"></i> <?= $d['durasi_paket_wisata']; ?> Hari</li>
                                    </ul>
                                    <h4 class="box-title mt-4">Destinasi Tujuan</h4>
                                    <ul class="list-unstyled">
                                        <?php foreach ($detail_paket_wisata as $dpw) : ?>
                                            <li><i class="fa fa-check text-success"></i> <?= $dpw['nama_destinasi_tujuan']; ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                    <h4 class="box-title mt-4">Penginapan</h4>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-bed text-success"></i> <?= $d['nama_penginapan']; ?></li>
                                    </ul>
                                    <h4 class="box-title mt-4">Tempat Makan</h4>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-cutlery text-success"> </i> <?= $d['nama_tempat_makan']; ?></li>
                                    </ul>
                                    <h4 class="box-title mt-4">Tourism Information Center</h4>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-phone text-success"></i> <?= $d['nama_tic']; ?></li>
                                    </ul>
                                    <h4 class="box-title mt-4">Rating Paket</h4>
                                    <ul class="list-unstyled">
                                        <?php if ($d['rating_paket_wisata'] == 0) {
                                            echo "Belum ada rating";
                                        } else if ($d['rating_paket_wisata'] == 1 || $d['rating_paket_wisata'] <= 1) {
                                            echo " <span class='fa fa-star text-warning'></span></i> ";
                                            echo number_format($d['rating_paket_wisata'], 1, ',', '.');
                                        } else
                                    if ($d['rating_paket_wisata'] == 2 || $d['rating_paket_wisata'] <= 2) {
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span'></i> ";
                                            echo number_format($d['rating_paket_wisata'], 1, ',', '.');
                                        } else
                                    if ($d['rating_paket_wisata'] == 3 || $d['rating_paket_wisata'] <= 3) {
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i> ";
                                            echo number_format($d['rating_paket_wisata'], 1, ',', '.');
                                        } else
                                    if ($d['rating_paket_wisata'] == 4 || $d['rating_paket_wisata'] <= 4) {
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i> ";
                                            echo number_format($d['rating_paket_wisata'], 1, ',', '.');
                                        } else
                                    if ($d['rating_paket_wisata'] == 5 || $d['rating_paket_wisata'] <= 5) {
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i>";
                                            echo " <span class='fa fa-star text-warning'></span></i> ";
                                            echo number_format($d['rating_paket_wisata'], 1, ',', '.');
                                        } else {
                                            echo "Tidak ada Rating";
                                        }
                                        ?>
                                    </ul>
                                    </h4>
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <a href="<?php echo base_url() . 'c_paket_wisata/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style type="text/css">
    .card {
        margin-bottom: 30px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: 0;
    }

    .card .card-subtitle {
        font-weight: 300;
        margin-bottom: 10px;
        color: #8898aa;
    }

    .table-product.table-striped tbody tr:nth-of-type(odd) {
        background-color: #cce7ff !important
    }

    .table-product td {
        border-top: 0px solid #dee2e6 !important;
        color: #728299 !important;
    }

    body {
        background: #efefef;
    }

    /*------- portfolio -------*/
    .project {
        margin: 15px 0;
    }

    .no-gutter .project {
        margin: 0 !important;
        padding: 0 !important;
    }

    .has-spacer {
        margin-left: 30px;
        margin-right: 30px;
        margin-bottom: 30px;
    }

    .has-spacer-extra-space {
        margin-left: 30px;
        margin-right: 30px;
        margin-bottom: 30px;
    }

    .has-side-spacer {
        margin-left: 30px;
        margin-right: 30px;
    }

    .project-title {
        font-size: 1.25rem;
    }

    .project-skill {
        font-size: 0.9rem;
        font-weight: 400;
        letter-spacing: 0.06rem;
    }

    .project-info-box {
        margin: 15px 0;
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 5px;
    }

    .project-info-box p {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #d5dadb;
    }

    .project-info-box p:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    img {
        width: 100%;
        max-width: 100%;
        height: auto;
        -webkit-backface-visibility: hidden;
    }

    .rounded {
        border-radius: 5px !important;
    }

    .btn-xs.btn-icon {
        width: 34px;
        height: 34px;
        max-width: 34px !important;
        max-height: 34px !important;
        font-size: 10px;
        line-height: 34px;
    }

    p {
        font-family: "Barlow", sans-serif !important;
        font-weight: 300;
        font-size: 1rem;
        color: #686c6d;
        letter-spacing: 0.03rem;
        margin-bottom: 10px;
    }

    b,
    strong {
        font-weight: 700 !important;
    }

    .yellow-color {
        color: yellow;
    }
</style>

<script type="text/javascript">

</script>