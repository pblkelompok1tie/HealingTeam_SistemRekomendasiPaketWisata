        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-mountain"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Destinasi Tujuan</h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('c_destinasi_tujuan/edit_data/'); ?><?= $destinasi_tujuan['id_destinasi_tujuan']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_destinasi_tujuan" id="id_destinasi_tujuan" value="<?php echo $destinasi_tujuan['id_destinasi_tujuan']; ?>" />
                        <div class="form-group">
                            <label for="nama_destinasi_tujuan">Nama Destinasi Tujuan</label>
                            <input type="text" value="<?php echo $destinasi_tujuan['nama_destinasi_tujuan'] ?>" class="form-control" id="nama_destinasi_tujuan" name="nama_destinasi_tujuan">
                            <?= form_error('nama_destinasi_tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="durasi_jam">Durasi Berkunjung </label>
                            <input type="text" value="<?php echo $destinasi_tujuan['durasi_jam'] ?>" class="form-control" id="durasi_jam" name="durasi_jam">
                            <?= form_error('durasi_jam', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <img src="<?= base_url('assets/img/destinasi_tujuan/'); ?><?= $destinasi_tujuan['foto_destinasi_tujuan']; ?>" class="img-thumbnail" width="200px"><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="file">Plih Gambar (maksimal ukuran gambar 2Mb)</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_destinasi_tujuan" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url() . 'c_destinasi_tujuan/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
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
         <!-- Protect jika ada yang upload ukuran foto terlalu besar -->
        <script type="text/javascript">
            var uploadField = document.getElementById("file");
            uploadField.onchange = function() {
                if (this.files[0].size > 2000000) {
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