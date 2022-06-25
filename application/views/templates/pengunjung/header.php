<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>pengunjung/img/wonderfull.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/'); ?>pengunjung/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>pengunjung/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>pengunjung/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/'); ?>pengunjung/lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/'); ?>pengunjung/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/'); ?>pengunjung/css/style.css" rel="stylesheet">
    <style>
        .checkbox1 {
            margin-right: 10px;
            padding-bottom: 30px;
            width: 20px;
            height: 15px;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-nav-dark navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="<?= base_url('c_pengunjung/index'); ?>" class="p-0">
            <h3 class="m-0 text-light"><img style="max-width: 90px; max-height: 60px;" src="<?= base_url('assets/'); ?>pengunjung/img/wonderfull.png">SISREPAWA</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a class="nav-item nav-link" href="<?= base_url('c_pengunjung/index'); ?>">
                    <span>Halaman Home</span></a>
                </li>
                <a href="<?= base_url('c_pengunjung/rekomendasi'); ?>" class="nav-link">Rekomendasi Paket Wisata</a>
                <a href="<?= base_url('c_pengunjung/contact'); ?>" class="nav-link">Hubungi Kami</a>
            </div>
            <button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <style type="text/css">
                    #bootstrapSelectForm .selectContainer .form-control-feedback {
                        /* Adjust feedback icon position */
                        right: -15px;
                    }
                </style>
                <?php echo form_open('c_pengunjung/cari_paket', 'id="form"') ?>
                <div class="d-flex align-items-center justify-content-center" style="margin-top: 240px;">
                    <div class="input-group" style="justify-content: center; max-width: 400px;min-width: 150px;;border-radius: 30px;display: flex;">
                        <select class="form-control selectpicker mb-5" multiple title="Nama Destinasi Tujuan" data-live-search="true" name="keyword[]" data-max-options="3" data-max-options-text="Maximal 3 Destinasi yang dapat dipilih" required>
                            <?php foreach ($destinasi_tujuan as $d) : ?>
                                <option value="<?php echo $d['nama_destinasi_tujuan']; ?>"><?php echo $d['nama_destinasi_tujuan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="error"></div>
                        <button type="submit" class="btn btn-light px-4 mb-5"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->
    <!-- Multipe Insert Field -->
    <script src="<?= base_url('assets/'); ?>multiselect/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>multiselect/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/'); ?>multiselect/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="<?= base_url('assets/'); ?>multiselect/css/multiple.min.css" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?= base_url('assets/'); ?>multiselect/bootstrap-select.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script> -->

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script>
        $(function() {
            $('select').selectpicker();
        });
        $(function() {
            $("#form_cari").validate({
                rules: {
                    keyword: {
                        required: true,
                        minlength: 8
                    },
                    action: "required"
                },
                messages: {
                    pName: {
                        required: "Please enter some data",
                        minlength: "Your data must be at least 8 characters"
                    },
                    action: "Please provide some data"
                }
            });
        });
    </script>