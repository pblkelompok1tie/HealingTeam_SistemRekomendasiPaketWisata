  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-user"></i> <?= $title; ?></h1>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Admin</h6>
          </div>
          <div class="card-body">
              <form action="<?php base_url('c_admin/tambah_data/'); ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="nama_admin">Nama</label>
                      <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Contoh : Dispapora Kab Madiun">
                      <?= form_error('nama_admin', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Contoh : dispapora123">
                      <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <div class="input-group" id="show_hide_password">
                          <input type="text" class="form-control" id="password" name="password" placeholder="Contoh : Rafi1007_">
                      </div>
                      <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 mb-3">
                          <label for="file">Plih Gambar (maksimal ukuran gambar 2Mb)</label>
                          <div class="custom-file">
                              <input type="file" name="foto_admin" class="custom-file-input" id="file" required>
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              <?= form_error('foto_admin', '<small class="text-danger">', '</small>'); ?>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <a href="<?php echo base_url() . 'c_admin/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
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
      $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
  </script>