        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-user"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Admin</h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('c_admin/edit_data/'); ?><?= $admin['id_admin']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $admin['id_admin']; ?>" />
                        <div class="form-group">
                            <label for="nama_admin">Nama</label>
                            <input type="text" value="<?php echo $admin['nama_admin'] ?>" class="form-control" id="nama_admin" name="nama_admin">
                            <?= form_error('nama_admin', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username']; ?>">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" value="<?php echo $admin['password'] ?>" id="password" name="password">
                            <div class="input-group-append">
                                <a href="" class="btn btn-outline-secondary"><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                          </div>
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <img src="<?= base_url('assets/img/admin/'); ?><?= $admin['foto_admin']; ?>" class="img-thumbnail" width="200px"><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="file">Plih Gambar (maksimal ukuran gambar 2Mb)</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_admin" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url() . 'c_admin/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
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
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fas fa-eye-slash" );
                    $('#show_hide_password i').removeClass("fas fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fas fa-eye-slash" );
                    $('#show_hide_password i').addClass("fas fa-eye" );
                }
            });
            });
        </script>