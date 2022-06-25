    <!-- Conten -->
    <div class="container-fluid py-3">
        <img class="bg-primary py-5 hero-header mb-5" style="border-radius: 10px; margin-top: 30px;">
    </div>

    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <!-- <div class="col-lg-5" style="min-height: 500px;"> -->
                <!-- <div class="position-relative h-100"> -->
                <!-- <img class="position-absolute w-100 h-100 rounded wow fadeInUp" data-wow-delay="0.5s" src="<?= base_url('assets/'); ?>pengunjung/img/vacation.jpg" style="object-fit: cover;"> -->
                <!-- </div> -->
            </div>
            <div class="col-lg-7" style="margin-top: 80px;">
                <div class="section-title mb-4">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Berikut Hasil Rekomendasi Paket Wisata untuk anda</h5>
                </div>
                <!-- <h5 class="mb-4">Destinasi Sarangan</h5>
                    <h5 class="mb-4">IDR 1.000.000 - IDR 2.000.000</h5>
                    <h5 class="mb-4">Penginapan 2 Orang</h5>
                    <h5 class="mb-4">Tempat Makan</h5>
                    <h5 class="mb-4">Durasi 2 Hari</h5>
                    <h5 class="mb-4">18 Tahun</h5>
                    <h5 class="mb-4">Laki-Laki & Perempuan</h5>
                    <h6 class="stars">
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </h6> -->
            </div>
        </div>
    </div>
    </div>

    <div class="container-fluid py-3">
        <div class="line bg-secondary my-2" style="height: 5px; background-size: cover; border-radius: 50px;"></div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-0" style="justify-content: center; margin-top: -60px;">
                <?php foreach ($tampil_hasil_rekomendasi as $pkt) : ?>
                    <div class="col-lg-2 mx-4 my-4 box2">
                        <a href="<?= base_url('c_pengunjung/paketpilihan/'); ?><?= $pkt['id_paket_wisata']; ?>">
                            <img src="<?php echo base_url(); ?>assets/img/paket_wisata/<?= $pkt['foto_paket_wisata']; ?>" class="card-img-top sampul" alt="">
                            <div class="card-body">
                                <?php $pembulatan_rating = round($pkt['rating_paket_wisata'],2); ?>
                                <h6 class="card-title float-right">
                                    <?php if ($pembulatan_rating == 0) {
                                        echo "Belum ada rating";
                                    } else if ($pembulatan_rating == 1 || $pembulatan_rating <= 1) {
                                        echo " <span class='fa fa-star text-warning'></span></i> ";
                                        echo number_format($pembulatan_rating, 1, ',', '.');
                                    }else
                                    if ($pembulatan_rating == 2 || $pembulatan_rating <= 2) {
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span'></i> ";
                                        echo number_format($pembulatan_rating, 1, ',', '.');
                                    } else
                                    if ($pembulatan_rating == 3 || $pembulatan_rating <= 3) {
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i> ";
                                        echo number_format($pembulatan_rating, 1, ',', '.');
                                    } else
                                    if ($pembulatan_rating == 4 || $pembulatan_rating <= 4) {
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i> ";
                                        echo number_format($pembulatan_rating, 1, ',', '.');
                                    } else
                                    if ($pembulatan_rating == 5 || $pembulatan_rating <= 5) {
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i>";
                                        echo " <span class='fa fa-star text-warning'></span></i> ";
                                        echo number_format($pembulatan_rating, 1, ',', '.');
                                    } else {
                                        echo "Tidak ada Rating";
                                    }
                                    ?>
                                </h6>
                                <h6 class="card-text text-secondary"><?= "Rp." . number_format($pkt['harga_paket_wisata'], 2, ',', '.'); ?></h6>
                                <center>
                                    <h6 class="text-secondary option"><?= $pkt['nama_paket_wisata'] ?></h6>
                                    <h6 class="text-secondary option">Skor <?= ($bobotc1 * ($pkt['b1'] / $c1max)) + ($bobotc2 * ($pkt['b2'] / $c2max)) + ($bobotc3 * ($pkt['b3'] / $c3max));  ?></h6>
                                <center>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>