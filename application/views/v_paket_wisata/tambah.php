<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-box"></i> <?= $title; ?></h1>
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Paket Wisata</h6>
        </div>
        <div class="card-body">
            <form action="<?php base_url('c_paket_wisata/tambah_data/'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="rating" value=NULL>
                <div class="form-group">
                    <label>Nama Penginapan</label>
                    <select class="form-control" name="id_penginapan">
                        <option value="">--Pilih Nama Penginapan--</option>
                        <?php foreach ($penginapan as $p) : ?>
                            <option value="<?php echo $p['id_penginapan']; ?>"><?php echo $p['nama_penginapan']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_penginapan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Nama Tempat Makan</label>
                    <select class="form-control" name="id_tempat_makan">
                        <option value="">--Pilih Nama Tempat Makan--</option>
                        <?php foreach ($tempat_makan as $tm) : ?>
                            <option value="<?php echo $tm['id_tempat_makan']; ?>"><?php echo $tm['nama_tempat_makan']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_tempat_makan', '<small class="text-danger">', '</small>'); ?>

                </div>
                <div class="form-group">
                    <label>Nama TIC</label>
                    <select class="form-control" name="id_tic">
                        <option value="">--Pilih Nama TIC--</option>
                        <?php foreach ($tic as $t) : ?>
                            <option value="<?php echo $t['id_tic']; ?>"><?php echo $t['nama_tic']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_tic', '<small class="text-danger">', '</small>'); ?>

                </div>
                <div class="form-group">
                    <label for="nama_paket_wisata">Nama Paket Wisata</label>
                    <input type="text" class="form-control" id="nama_paket_wisata" name="nama_paket_wisata" placeholder="Contoh : Paket Wisata Hemat 1">
                    <?= form_error('nama_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <label>Deskripsi Paket Wisata</label>
                            <textarea class="ckeditor" id="editor-custom" name="deskripsi_paket_wisata"></textarea>
                        </div>
                    </div>
                    <?= form_error('deskripsi_paket_wisata', '<small class="text-danger">', '</small>'); ?>

                </div>
                <div class="form-group">
                    <label for="harga_paket_wisata">Harga Paket Wisata (Rp)</label>
                    <input type="text" class="form-control" name="harga_paket_wisata" placeholder="Contoh : 200000">
                    <?= form_error('harga_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                </div>
                <style>
                    .yellow-color {
                        color: yellow;
                    }
                </style>
                <div class="form-group">
                    <label for="durasi_paket_wisata">Durasi Paket Wisata</label>
                    <select class="form-control" name="durasi_paket_wisata" id="durasi_paket_wisata">
                        <option value="">--Pilih Durasi Paket Wisata--</option>
                        <option value="1">1 Hari</option>
                        <option value="2">2 Hari</option>
                        <option value="3">3 Hari</option>
                        <option value="4">4 Hari</option>
                        <option value="5">5 Hari</option>
                        <?= form_error('durasi_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Destinasi Tujuan (pilih satu atau beberapa destinasi tujuan)</label>
                    <select class="form-control selectpicker" multiple title="--Pilih Destinasi Tujuan--" data-live-search="true" name="id_destinasi_tujuan[]" data-max-options="3" data-max-options-text="Maximal 3 Destinasi yang dapat dipilih">
                        <?php foreach ($destinasi_tujuan as $d) : ?>
                            <option value="<?php echo $d['id_destinasi_tujuan']; ?>"><?php echo $d['nama_destinasi_tujuan']; ?></option>
                        <?php endforeach ?>
                        <?= form_error('id_destinasi_tujuan[]', '<small class="text-danger">', '</small>'); ?>
                    </select>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="file">Plih Gambar (maksimal ukuran gambar 2Mb)</label>
                        <div class="custom-file">
                            <input type="file" name="foto_paket_wisata" class="custom-file-input" id="file" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <?= form_error('foto_paket_wisata', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
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
    $(function() {
        $('select').selectpicker();
    });
</script>