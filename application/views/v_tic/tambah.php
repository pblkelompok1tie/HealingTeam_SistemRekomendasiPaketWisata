        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-headset"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah TIC</h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('c_tic/tambah_data/'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_tic" id="id_tic"  />
                        <div class="form-group">
                            <label for="nama_tic">Nama TIC</label>
                            <input type="text" class="form-control" id="nama_tic" name="nama_tic"  placeholder="Contoh : Agus Mulyono">
                            <?= form_error('nama_tic', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_tic">Alamat TIC</label>
                            <input type="text" class="form-control" id="alamat_tic" name="alamat_tic"  placeholder="Contoh : Jalan Merdeka no.4, Madiun, Jawa Timur">
                            <?= form_error('alamat_tic', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kontak_tic">Kontak TIC</label>
                            <input type="text" class="form-control" id="kontak_tic" name="kontak_tic"  placeholder="Masukkan nomor 10 digit">
                            <?= form_error('kontak_tic', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?php echo base_url() . 'c_tic/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
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
     