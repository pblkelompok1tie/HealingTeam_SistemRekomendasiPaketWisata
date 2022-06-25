        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-bed"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Penginapan</h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('c_penginapan/edit_data/'); ?><?= $penginapan['id_penginapan']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_penginapan" id="id_penginapan" value="<?php echo $penginapan['id_penginapan']; ?>" />
                        <div class="form-group">
                            <label for="nama_penginapan">Nama Penginapan</label>
                            <input type="text" value="<?php echo $penginapan['nama_penginapan'] ?>" class="form-control" id="nama_penginapan" name="nama_penginapan">
                            <?= form_error('nama_penginapan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_penginapan">Alamat Penginapan</label>
                            <input type="text" class="form-control" id="alamat_penginapan" name="alamat_penginapan" value="<?php echo $penginapan['alamat_penginapan']; ?>">
                            <?= form_error('alamat_penginapan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_orang">Jumlah Orang</label>
                            <input type="text" class="form-control" id="jumlah_orang" name="jumlah_orang" value="<?php echo $penginapan['jumlah_orang']; ?>">
                            <?= form_error('jumlah_orang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="fasilitas_penginapan">Fasilitas</label>
                            <input type="text" class="form-control" id="fasilitas_penginapan" name="fasilitas_penginapan" value="<?php echo $penginapan['fasilitas_penginapan']; ?>">
                            <?= form_error('fasilitas_penginapan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <img src="<?= base_url('assets/img/penginapan/'); ?><?= $penginapan['foto_penginapan']; ?>" class="img-thumbnail" width="200px"><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="file">Plih Gambar (maksimal ukuran gambar 2Mb)</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_penginapan" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url() . 'c_penginapan/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
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