<?php foreach ($paket_wisata as $pkt) : ?>
    <!-- Hero Start -->
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="container-foto">
                <?php foreach ($detail_paket_wisata as $dpw => $value) {
                    if ($dpw == 0) { ?>
                        <div class="carousel-item active slide_img">
                            <img src="<?= base_url('assets/'); ?>img/destinasi_tujuan/<?= $value->foto_destinasi_tujuan; ?>">
                        </div>
                    <?php } else { ?>
                        <div class="carousel-item slide_img">
                            <img src="<?= base_url('assets/'); ?>img/destinasi_tujuan/<?= $value->foto_destinasi_tujuan; ?>">
                        </div>
                <?php }
                } ?>
                <div class="carousel-item slide_img">
                    <img src="<?= base_url('assets/'); ?>img/penginapan/<?= $pkt['foto_penginapan'] ?>">
                </div>
                <div class="carousel-item slide_img">
                    <img src="<?= base_url('assets/'); ?>img/tempat_makan/<?= $pkt['foto_tempat_makan'] ?>">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <style>
        @import url("<?= base_url('assets/'); ?>/fontawesome/css/font-awesome.css");

        form,
        label {
            margin: 0;
            padding: 0;
        }

        .content {
            width: 408px;
            border: 1px #ccc solid;
            padding: 15px;
            margin: auto;
            height: 200px;
        }

        .rating {
            border: none;
            float: left;
        }

        .rating>input {
            display: none;
        }

        .rating>label::before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating>label {
            color: #ddd;
            float: right;
        }

        .rating>input:checked~label,
        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: #f7d106;
        }

        .rating>input:checked+label:hover,
        .rating>input:checked~label:hover,
        .rating>label:hover~input:checked~label,
        .rating>input:checked~label:hover~label {
            color: #fce873;
        }

        h4 {
            font-weight: normal;
            margin-top: 40px;
            margin-bottom: 0px;
        }

        #hasil {
            font-size: 20px;
        }

        #star {
            float: left;
            padding-right: 20px;
        }

        #star span {
            padding: 3px;
            font-size: 20px;
        }

        .on {
            color: #f7d106
        }

        .off {
            color: #ddd;
        }
    </style>
    <!-- Conten -->
    <?= $this->session->flashdata('message'); ?>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <!-- Sisi Kiri -->
                <div class="section-title mb-2">
                    <h1 class="display-5 mb-0"><?= $pkt['nama_paket_wisata']; ?></h1>
                </div>
                <div class="section-title mb-2">
                    <?php
                    $hasil  = $pkt['rating_paket_wisata'];
                    $angka = $pkt['rating_paket_wisata'];
                    for ($i = 0; $i < $hasil; $i++) {
                        echo '<span class="on"><i class="fa fa-star"></i></span>';
                    }
                    for ($i = 5; $i > $hasil; $i--) {
                        echo '<span class="off"><i class="fa fa-star"></i></span>';
                    }
                    ?>
                    <?php
                    echo number_format($angka, 1, ',', '.');
                    ?>
                </div>
                <div class="mb-2">
                    <h5><i class="fas fa-clock text-secondary me-2" style="margin-left: 3px;"></i>2 Hari</h5>
                </div>
                <div class="mb-2">
                    <h5><i class="bi bi-tag-fill text-secondary me-2"></i><?= "Rp." . number_format($pkt['harga_paket_wisata'], 2, ',', '.'); ?></h5>
                </div>
                <style>
                    .ratings_stars {
                        background: url('star_empty.png') no-repeat;
                        float: left;
                        height: 28px;
                        padding: 2px;
                        width: 32px;
                    }

                    .ratings_vote {
                        background: url('star_full.png') no-repeat;
                    }

                    .ratings_over {
                        background: url('star_highlight.png') no-repeat;
                    }

                    .checked {
                        color: orange;
                    }
                </style>
                <div class="section-tittle mb-4" style="margin-left: 30px; margin-top: 30px;">
                    <h5><i class="bi bi-sticky-fill text-secondary me-1"></i>Deskripsi</h5>
                    <p><?= $pkt['deskripsi_paket_wisata']; ?></p>
                    <h5><i class="bi bi-geo-alt-fill text-secondary me-1"></i>Destinasi Tujuan</h5>
                    <ul style="list-style-type: disc;">
                        <?php foreach ($detail_paket_wisata as $dpw => $value) : ?>
                            <li><?= $value->nama_destinasi_tujuan ?> (<?= $value->durasi_jam ?> Jam)</li>
                        <?php endforeach ?>
                    </ul>
                    <h5><i class="fa fa-bed text-secondary me-1"></i>Penginapan</h5>
                    <ul style="list-style-type: disc;">
                        <li><?= $pkt['nama_penginapan']; ?></li>
                        <li><?= $pkt['jumlah_orang']; ?> Orang</li>
                    </ul>
                    <h5><i class="fa fa-cutlery text-secondary me-1"></i>Tempat Makan</h5>
                    <ul style="list-style-type: disc;">
                        <li><?= $pkt['nama_tempat_makan']; ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Sisi Kanan -->
            <div class="col-lg-5">
                <div class="box position-relative">
                    <h3>Informasi Paket Wisata</h3>
                    <h4 class="text-secondary"><?= $pkt['nama_tic']; ?></h4>
                    <h6 class="text-secondary"><?= $pkt['alamat_tic']; ?></h6>
                    <h6 class="text-secondary"><?= $pkt['kontak_tic']; ?></h6>
                    <a href="" class="btn-primary nav-item nav-link" style="border-radius: 20px; margin-top: 20px;"><i class="me-2 fab fa-whatsapp"></i>Hubungi Melalui WhattsApp</a>
                </div>
                <br>
                <hr />
                <?php if ($check == 0) { ?>
                    Penilaian Rating :
                    <form method="POST" action="<?php echo base_url('c_pengunjung/tambah_data_rating'); ?>">
                        <input type="hidden" name="id_rating" id="id_rating" />
                        <input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="<?php echo $pkt['id_paket_wisata']; ?>" />
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rating" value="1">
                                    <li class="fa fa-star text-warning"></li>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rating" value="2">
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rating" value="3">
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rating" value="4">
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rating" value="5">
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                    <li class="fa fa-star text-warning"></li>
                                </label>
                            </div>
                            <br>
                            <?= form_error('rating', '<small class="text-danger">', '</small>'); ?>
                            <button class="btn btn-primary" type="submit">
                                Submit
                            </button>
                        </div>
                    <?php } else { ?>
                        Penilaian Rating :
                        <br>
                        <br>
                        <form method="POST" action="<?php echo base_url('c_pengunjung/ubah_data_rating'); ?>">
                            <input type="hidden" name="id_rating" id="id_rating" />
                            <input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="<?php echo $pkt['id_paket_wisata']; ?>" />
                            <?php foreach ($deteksi_post_rating as $dpr) : ?>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="rating" value="1" <?php if (isset($dpr['rating']) && $dpr['rating'] == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                            <li class="fa fa-star text-warning"></li>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="rating" value="2" <?php if (isset($dpr['rating']) && $dpr['rating'] == 2) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="rating" value="3" <?php if (isset($dpr['rating']) && $dpr['rating'] == 3) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="rating" value="4" <?php if (isset($dpr['rating']) && $dpr['rating'] == 4) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="rating" value="5" <?php if (isset($deteksi_post_rating['rating']) && $deteksi_post_rating['rating'] == 5) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                            <li class="fa fa-star text-warning"></li>
                                        </label>
                                    </div>
                                    <br>
                                    <?= form_error('rating', '<small class="text-danger">', '</small>'); ?>
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                </div>
                            <?php endforeach ?>
                        <?php } ?>
                        </form>
            </div>
        <?php endforeach ?>
        </div>
    </div>
    <!-- Conten End -->
    <script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script>