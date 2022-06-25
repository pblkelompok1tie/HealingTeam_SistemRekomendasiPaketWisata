<?php foreach ($artikel_destinasi_wisata as $artikel) : ?>
    <!-- Banner Hero Start -->
    <!-- Banner Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="container-foto-home">
                <div class="carousel-item active slide_img_home">
                    <img src="<?php echo base_url(); ?>assets/img/artikel_destinasi_wisata/<?= $artikel['foto_banner_artikel']; ?>">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Carousel End -->
    <!-- Banner Hero End -->
    <!-- konten Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Artikel Wisata</h5>
                        <h1 class="display-5 mb-0"><?= $artikel['nama_destinasi_wisata']; ?></h1>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt fs-2 text-secondary me-3" style="margin-top: -23px;"></i>
                        <h4 class="text-body mb-4"><?= $artikel['alamat_destinasi_wisata']; ?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock fs-2 text-secondary me-3 fw-normal" style="margin-top: -23px;"></i>
                        <h4 class="text-body mb-4"><?= $artikel['jam_operational']; ?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-tag text-secondary me-3 fs-2" style="margin-top: -20px;"></i>
                        <h4 class="text-body mb-4"><?= "Rp." . number_format($artikel['tiket_masuk'], 2, ',', '.'); ?></h4>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute mw-100 mh-100 rounded wow fadeInUp" data-wow-delay="0.5s" src="<?php echo base_url(); ?>assets/img/artikel_destinasi_wisata/<?= $artikel['foto_destinasi_wisata']; ?>" style="object-fit: cover; max-width: 50%; max-height: 10px;">
                    </div>
                </div>
                <div class="section-title mb-4 wow fadeInUp" style="margin-top: -2%;" data-wow-delay="0.9s">
                    <p class="mb-5 text-dark"><?= $artikel['deskripsi_destinasi_wisata']; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- konten End -->