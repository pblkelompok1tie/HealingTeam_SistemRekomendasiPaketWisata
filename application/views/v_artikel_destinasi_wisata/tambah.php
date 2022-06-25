  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-newspaper"></i> <?= $title; ?></h1>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Artikel Destinasi Wisata</h6>
          </div>
          <div class="card-body">
              <form action="<?php base_url('c_artikel_destinasi_wisata/tambah_data/'); ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Nama destinasi Wisata</label>
                      <input type="text" name="nama_destinasi_wisata" placeholder="Contoh : Nongko Ijo" class="form-control">
                      <?= form_error('nama_destinasi_wisata', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label>Alamat destinasi Wisata</label>
                      <input type="text" name="alamat_destinasi_wisata" placeholder="Contoh : Jalan Apel No.3, Madiun, Jawa Timur" class="form-control">
                      <?= form_error('alamat_destinasi_wisata', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <label>Deskripsi destinasi Wisata</label>
                          </div>
                          <div class="panel-body">
                              <textarea class="ckeditor" id="editor-custom" name="deskripsi_destinasi_wisata"></textarea>
                          </div>
                      </div>
                  </div>
                  <?= form_error('deskripsi_destinasi_wisata', '<small class="text-danger">', '</small>'); ?>
                  <div class="form-group">
                      <label>Harga Tiket Masuk</label>
                      <input type="text" name="tiket_masuk" class="form-control" placeholder="Contoh : 5000">
                      <?= form_error('tiket_masuk', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label>Jam Operasional</label>
                      <input type="text" name="jam_operational" class="form-control" placeholder="Contoh : 10.00 PM - 15.00 AM">
                      <?= form_error('jam_operational', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label>Foto Artikel Destinasi Wisata</label>
                      <input type="file" name="foto_destinasi_wisata" class="form-control" required>
                      <?= form_error('foto_destinasi_wisata', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label>Foto Banner Artikel Destinasi Wisata</label>
                      <input type="file" name="foto_banner_artikel" class="form-control" required>
                      <?= form_error('foto_banner_artikel', '<small class="text-danger">', '</small>'); ?>
                  </div>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                      <a href="<?php echo base_url() . 'c_artikel_destinasi_wisata/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
              </form>
          </div>
      </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
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
      var resizefunc = [];
  </script>
  <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
      CKEDITOR.replace('editor-custom', {
          uiColor: '#537fbb'
      });
  </script>