        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-box"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Paket Wisata</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($paket_wisata as $pkt) : ?>
                        <form action="<?php base_url('c_paket_wisata/edit_data/'); ?><?= $pkt['id_paket_wisata']; ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="<?php echo $pkt['id_paket_wisata']; ?>" />
                            <div class="form-group">
                                <label>Nama Penginapan</label>
                                <select class="form-control" name="id_penginapan" required>
                                    <?php foreach ($penginapan as $p) : ?>
                                        <option <?= ($p['id_penginapan'] == $pkt['id_penginapan'] ? 'selected=""' : '') ?> value="<?php echo $p['id_penginapan']; ?>"><?php echo $p['nama_penginapan']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Tempat Makan</label>
                                <select class="form-control" name="id_tempat_makan" required>
                                    <?php foreach ($tempat_makan as $tm) : ?>
                                        <option <?= ($tm['id_tempat_makan'] == $pkt['id_tempat_makan'] ? 'selected=""' : '') ?> value="<?php echo $tm['id_tempat_makan']; ?>"><?php echo $tm['nama_tempat_makan']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama TIC</label>
                                <select class="form-control" name="id_tic" required>
                                    <?php foreach ($tic as $t) : ?>
                                        <option <?= ($t['id_tic'] == $pkt['id_tic'] ? 'selected=""' : '') ?>value="<?php echo $t['id_tic']; ?>"><?php echo $t['nama_tic']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_paket_wisata">Nama Paket Wisata</label>
                                <input type="text" class="form-control" id="nama_paket_wisata" name="nama_paket_wisata" value="<?php echo $pkt['nama_paket_wisata']; ?>">
                                <?= form_error('nama_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <label>Deskripsi Paket Wisata</label>
                                    </div>
                                    <div class="panel-body">
                                        <textarea class="ckeditor" id="editor-custom" name="deskripsi_paket_wisata"><?php echo $pkt['deskripsi_paket_wisata'] ?></textarea><br><br>
                                    </div>
                                    <?= form_error('deskripsi_paket_wisata', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga_paket_wisata">Harga Paket Wisata (Rp)</label>
                                <input type="text" class="form-control" name="harga_paket_wisata" value="<?php echo $pkt['harga_paket_wisata']; ?>">
                                <?= form_error('harga_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <style>
                                .yellow-color {
                                    color: yellow;
                                }
                            </style>
                            <div class="form-group">
                                <label for="durasi_paket_wisata">Durasi Paket Wisata(Hari)</label>
                                <input type="text" class="form-control" id="durasi_paket_wisata" name="durasi_paket_wisata" value="<?php echo $pkt['durasi_paket_wisata']; ?>">
                                <?= form_error('durasi_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <img src="<?= base_url('assets/img/paket_wisata/'); ?><?= $pkt['foto_paket_wisata']; ?>" class="img-thumbnail" width="200px"><br>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="file">Plih Gambar (maksimal ukuran gambar 2Mb)</label>
                                    <div class="custom-file">
                                        <input type="file" name="foto_paket_wisata" class="custom-file-input" id="file">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Destinasi Tujuan (pilih satu atau beberapa destinasi tujuan)</label>
                                <select class="form-control selectpicker strings" multiple data-live-search="true" name="id_destinasi_tujuan[]" data-max-options="3" data-max-options-text="Maximal 3 Destinasi yang dapat dipilih">
                                    <?php foreach ($destinasi_tujuan as $row) : ?>
                                        <option value="<?php echo $row['id_destinasi_tujuan']; ?>" <?php foreach ($detail_paket_wisata as $dpw) : ?> <?= $dpw['id_destinasi_tujuan'] == $row['id_destinasi_tujuan'] ? "selected" : null ?><?php endforeach ?>><?php echo $row['nama_destinasi_tujuan']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        <?php endforeach ?>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url() . 'c_paket_wisata/tampil_data' ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Kembali</a>
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
        <!-- untuk menyembunyikan dan melihat password -->
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
        <!-- Multipe Insert Field -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link href="<?= base_url('assets/'); ?>multiselect/css/multiple.min.css" rel="stylesheet">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
        <script>
            $('.selectpicker').selectpicker();
            //AJAX REQUEST TO GET SELECTED PRODUCT
            $.ajax({
                url: "<?php echo site_url('c_paket_wisata/get_destinasi_tujuan_by_paket_wisata'); ?>",
                method: "POST",
                data: {
                    id_paket_wisata: id_paket_wisata
                },
                cache: false,
                success: function(data) {
                    var item = data;
                    var val1 = item.replace("[", "");
                    var val2 = val1.replace("]", "");
                    var values = val2;
                    $.each(values.split(","), function(i, e) {
                        $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                        $(".strings").selectpicker('refresh');
                    });
                }
            });
            return false;
        </script>