  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-mountain"></i> <?= $title; ?></h1>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Destinasi Tujuan</h6>
          </div>
          <div class="card-body">
              <form action="<?php base_url('c_destinasi_tujuan/tambah_data/'); ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Nama Destinasi Tujuan</label>
                      <input type="text" name="nama_destinasi_tujuan" placeholder="Contoh : Hutan Pinus Nongko Ijo" class="form-control">
                      <?= form_error('nama_destinasi_tujuan', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label>Durasi (jam)</label>
                      <input type="text" name="durasi_jam" placeholder="Contoh : 2 " class="form-control">
                      <?= form_error('durasi_jam', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label>Foto</label>
                      <input type="file" name="foto_destinasi_tujuan" class="form-control" required>
                      <?= form_error('foto_destinasi_tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <a href="<?php echo base_url() . 'c_destinasi_tujuan/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
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