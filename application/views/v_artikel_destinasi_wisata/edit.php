        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-newspaper"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Artikel Destinasi Wisata</h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('c_artikel_destinasi_wisata/edit_data/'); ?><?= $artikel_destinasi_wisata['id_artikel_destinasi_wisata']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_artikel_destinasi_wisata" id="id_artikel_destinasi_wisata" value="<?php echo $artikel_destinasi_wisata['id_artikel_destinasi_wisata']; ?>" />
                        <div class="form-group">
                            <label for="nama_destinasi_wisata">Nama destinasi Wisata</label>
                            <input type="text" class="form-control" id="nama_destinasi_wisata" name="nama_destinasi_wisata" value="<?php echo $artikel_destinasi_wisata['nama_destinasi_wisata']; ?>">
                            <?= form_error('nama_destinasi_wisata', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_destinasi_wisata">Alamat Destinasi Wisata</label>
                            <input type="text" class="form-control" id="alamat_destinasi_wisata" name="alamat_destinasi_wisata" value="<?php echo $artikel_destinasi_wisata['alamat_destinasi_wisata']; ?>">
                            <?= form_error('alamat_destinasi_wisata', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <label>Deskripsi destinasi Wisata</label>
                                </div>
                                <div class="panel-body">
                                    <textarea class="ckeditor" id="editor-custom" name="deskripsi_destinasi_wisata"><?php echo $artikel_destinasi_wisata['deskripsi_destinasi_wisata'] ?></textarea><br><br>
                                </div>
                                <?= form_error('deskripsi_destinasi_wisata', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tiket_masuk">Harga Tiket Masuk</label>
                            <input type="text" class="form-control" id="tiket_masuk" name="tiket_masuk" value="<?php echo $artikel_destinasi_wisata['tiket_masuk']; ?>">
                            <?= form_error('tiket_masuk', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jam_operational">Jam Operasional</label>
                            <input type="text" class="form-control" id="jam_operational" name="jam_operational" value="<?php echo $artikel_destinasi_wisata['jam_operational']; ?>">
                            <?= form_error('jam_operational', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <img src="<?= base_url('assets/img/artikel_destinasi_wisata/'); ?><?= $artikel_destinasi_wisata['foto_destinasi_wisata']; ?>" class="img-thumbnail" width="200px"><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="file">Plih Foto Artikel Destinasi Wisata (maksimal ukuran gambar 2Mb)</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_destinasi_wisata" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <img src="<?= base_url('assets/img/artikel_destinasi_wisata/'); ?><?= $artikel_destinasi_wisata['foto_banner_artikel']; ?>" class="img-thumbnail" width="200px"><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="file">Pilih Foto Banner Artikel Destinasi Wisata (maksimal ukuran gambar 2Mb)</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_banner_artikel" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url() . 'c_artikel_destinasi_wisata/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </form>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- panggil jquery -->
        <script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>

        <!-- panggil ckeditor.js -->
        <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        <!-- panggil adapter jquery ckeditor -->
        <script src="<?= base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>
        <!-- setup selector -->
        <script>
            $('textarea.texteditor').ckeditor();
        </script>
        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        </script>
        <script type="text/javascript">
            var uploadField = document.getElementById("file");
            uploadField.onchange = function() {
                if (this.files[0].size > 2000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                    alert("Maaf. Ukuran Foto Terlalu Besar ! Maksimal 2 Mb");
                    this.value = "";
                };
            };
        </script>
        <script>
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("fas fa-eye-slash");
                        $('#show_hide_password i').removeClass("fas fa-eye");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("fas fa-eye-slash");
                        $('#show_hide_password i').addClass("fas fa-eye");
                    }
                });
            });
        </script>
        <script>
            var resizefunc = [];
        </script>
        <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('editor-custom', {
                uiColor: '#537fbb'
            });
        </script>