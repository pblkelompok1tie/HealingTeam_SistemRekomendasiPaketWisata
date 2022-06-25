    <!-- Banner Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="container-foto-home">
                <?php foreach ($data_banner as $db => $value) {
                    if ($db == 0) { ?>
                        <div class="carousel-item active slide_img_home">
                            <img src="<?= base_url('assets/'); ?>img/artikel_destinasi_wisata/<?= $value->foto_banner_artikel; ?>">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 900px;">
                                    <a href="<?= base_url('c_pengunjung/artikel/'); ?><?= $value->id_artikel_destinasi_wisata; ?>" class="btn btn-secondary py-md-3 px-md-5 me-3 animated slideInLeft">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="carousel-item slide_img_home">
                            <img src="<?= base_url('assets/'); ?>img/artikel_destinasi_wisata/<?= $value->foto_banner_artikel; ?>">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 900px;">
                                    <a href="<?= base_url('c_pengunjung/artikel/'); ?><?= $value->id_artikel_destinasi_wisata; ?>   " class="btn btn-secondary py-md-3 px-md-5 me-3 animated slideInLeft">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
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
    <!-- Banner Carousel End -->
    <!-- Video Start -->
    <div class="container-fluid bg-light py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="my-3" style="text-align: center;">Inspirasi Wisata Kabupaten Madiun</h1>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="owl-carousel bg-light testimonial-carousel">
                        <!-- <div class="testimonial-item text-center">
                            <video width="835" height="470" style="border-radius: 30px;" controls>
                                <source src="<?= base_url('assets/'); ?>pengunjung/video/wisata_religi.mp4" type="video/mp4">
                            </video>
                            <h4 class="text-dark my-4">Judul Video Youtube</h4>
                        </div> -->
                        <div class="testimonial-item text-center text-white">
                            <iframe width="835" height="470" style="border-radius: 30px;" src="https://www.youtube.com/embed/38VTdYp5_eU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h4 class="text-dark my-4">Judul Video Youtube</h4>
                        </div>
                        <div class="testimonial-item text-center text-white">
                            <iframe width="835" height="470" style="border-radius: 30px;" src="https://www.youtube.com/embed/y4FQWBj59ZY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h4 class="text-dark my-4">Judul Video Youtube</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->
    <style>
        .img-artikel {
            width: 400px;
            height: 400px;
        }
    </style>
    <!-- Artikel Start -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.3s">
        <div class="container">
            <h1 class="mx-5 my-3">Artikel Destinasi Wisata Di Madiun</h1>
            <div class="row g-0 justify-content-center">
                <div class="row row-cols-md-3 row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 g-4">
                    <?php foreach ($artikel_destinasi_wisata as $adw) : ?>
                        <div class="col highlight-item onpagination-load">
                            <a style="--bs-aspect-ratio: 125%;" class="ratio d-block box2 overflow-hidden" href="<?= base_url('c_pengunjung/artikel/'); ?><?= $adw['id_artikel_destinasi_wisata']; ?>">
                                <img src="<?php echo base_url(); ?>assets/img/artikel_destinasi_wisata/<?= $adw['foto_destinasi_wisata']; ?>" class="bg-img w-100 h-100 object-fit-cover position-absolute top-0" style="filter: brightness(70%);" alt="">
                                <div class="overlay-text position-absolute top-0 w-100 px-4 text-center d-flex h-100 justify-content-center align-items-end">
                                    <h7 class="text-white font-weight-semi-bold pb-2 mb-4"><?= $adw['nama_destinasi_wisata']; ?></h7>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Artikel End -->
    <!-- Newsletter Start -->
    <div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1; margin-bottom: -150px;">
        <div class="container">
            <div class="bg-primary p-5">
                <form class="mx-auto" style="max-width: 550px;">
                    <div class="input-group-light">
                        <h1 class="text-white">#KABUPATENMADIUN2022</h1>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->
    <script>
        $(document).ready(function() {
            var pos = 0,
                slides = $('.slide'),
                numOfSlides = slides.length;

            function nextSlide() {
                // `[]` returns a vanilla DOM object from a jQuery object/collection
                slides[pos].video.stopVideo()
                slides.eq(pos).animate({
                    left: '-100%'
                }, 500);
                pos = (pos >= numOfSlides - 1 ? 0 : ++pos);
                slides.eq(pos).css({
                    left: '100%'
                }).animate({
                    left: 0
                }, 500);
            }

            function previousSlide() {
                slides[pos].video.stopVideo()
                slides.eq(pos).animate({
                    left: '100%'
                }, 500);
                pos = (pos == 0 ? numOfSlides - 1 : --pos);
                slides.eq(pos).css({
                    left: '-100%'
                }).animate({
                    left: 0
                }, 500);
            }

            $('.carousel-control-prev').click(previousSlide);
            $('.carousel-control-next').click(nextSlide);
        })

        function onYouTubeIframeAPIReady() {
            $('.slide').each(function(index, slide) {
                // Get the `.video` element inside each `.slide`
                var iframe = $(slide).find('.video')[0]
                // Create a new YT.Player from the iFrame, and store it on the `.slide` DOM object
                slide.video = new YT.Player(iframe)
            })
        }
    </script>