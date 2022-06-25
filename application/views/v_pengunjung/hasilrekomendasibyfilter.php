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
            <!-- <h5 class="mb-4"></h5>
                    <h5 class="mb-4">IDR 1.000.000 - IDR 2.000.000</h5>
                    <h5 class="mb-4">Durasi 2 Hari</h5>
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
            <?php
            if (empty($hasil_generate)) {
                echo "<h6><center><i class='far fa-frown'> Yah, Kriteria paket wisata yang kaka cari tidak ada </i></center></h6>";
            }
            ?>
            <?php $no = 1; foreach ($hasil_generate as $pkt) : ?>
                <div class="col-lg-2 mx-4 my-4 box2">
                    <a href="<?= base_url('c_pengunjung/paketpilihan/'); ?><?= $pkt['id_paket_wisata']; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/paket_wisata/<?= $pkt['foto_paket_wisata']; ?>" class="card-img-top sampul" alt="">
                        <div class="card-body">
                            <h6 class="card-title float-right">
                                <?php $pembulatan_rating = round($pkt['rating_paket_wisata'], 2); ?>
                                <?php
                                $hasil  = $pkt['rating_paket_wisata'];
                                for ($i = 0; $i < $hasil; $i++) {
                                    echo '<span class="on"><i class="fa fa-star"></i></span>';
                                }
                                for ($i = 4; $i >= $hasil; $i--) {
                                    echo '<span class="off"><i class="fa fa-star"></i></span>';
                                }
                                ?>
                                <?php
                                echo number_format($hasil, 1, ',', '.');
                                ?>
                            </h6>
                            <h6 class="card-text text-secondary"><?= "Rp." . number_format($pkt['harga_paket_wisata'], 2, ',', '.'); ?></h6>
                            <center>
                                <h6 class="text-secondary option"><?= $pkt['nama_paket_wisata'] ?></h6>
                                <!-- <h6 class="text-secondary option">Rekomendasi Ke - </h6> -->
                                <!-- <h6 class="text-secondary option">Skor  -->
                                <?php /* round(($bobotc1 * ($pkt['b1'] / $c1max)) + ($bobotc2 * ($pkt['b2'] / $c2max)) + ($bobotc3 * ($pkt['b3'] / $c3max)), 1);  */ ?>
                                <!-- </h6> -->
                                <center>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>