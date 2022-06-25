<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
    </div>
    <div class="card-body">
      <a href="<?= base_url('c_penilaian'); ?>" class="badge badge-danger">
        <i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>

      <?php foreach ($nilai as $n) : ?>
        <form method="post" action="<?= base_url('c_penilaian/edit_data/') ?><?= $n->id_nilai ?>">
          <div class="form-group">
            <input type="hidden" class="form-control input-lg" name="id_nilai" value="<?= $n->id_nilai ?>">
            <label>Nama paket wisata</label>
            <select name="id_paket_wisata" id="id_paket_wisata" class="form-control input-lg" readonly>
              <?php
              foreach ($paket_wisata as $row) {
                if ($n->id_paket_wisata == $row->id_paket_wisata) {
                  $pilih = "selected";
                } else {
                  $pilih = "";
                }
                echo "<option value='$row->id_paket_wisata' $pilih>" . $row->nama_paket_wisata . "</option>";
              }
              ?>
            </select>
            <?= form_error('id_paket_wisata', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Durasi(C1)</label>
            <select name="C1" id="C1" class="form-control input-lg">
              <?php
              foreach ($durasi as $row) {
                if ($n->C1 == $row->id_subkriteria) {
                  $pilih = "selected";
                } else {
                  $pilih = "";
                }
                echo "<option value='$row->id_subkriteria'$pilih>" . $row->ket_sub . "</option>";
              }
              ?>
            </select>
            <?= form_error('C1', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Usia(C2)</label>
            <select name="C2" id="C2" class="form-control input-lg">
              <?php
              foreach ($usia as $row) {
                if ($n->C2 == $row->id_subkriteria) {
                  $pilih = "selected";
                } else {
                  $pilih = "";
                }
                echo "<option value='$row->id_subkriteria'$pilih>" . $row->ket_sub . "</option>";
              }
              ?>
            </select>
            <?= form_error('C2', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Harga Paket Wisata(C3)</label>
            <select name="C3" id="C3" class="form-control input-lg">
              <?php
              foreach ($harga_paket as $row) {
                if ($n->C3 == $row->id_subkriteria) {
                  $pilih = "selected";
                } else {
                  $pilih = "";
                }
                echo "<option value='$row->id_subkriteria'$pilih>" . $row->ket_sub . "</option>";
              }
              ?>
            </select>
            <?= form_error('C3', '<small class="text-danger">', '</small>'); ?>
          </div>
          <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>