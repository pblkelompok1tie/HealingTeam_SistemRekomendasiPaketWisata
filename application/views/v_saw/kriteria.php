<div class="container-fluid">
  <?php if ($this->session->flashdata('message')) : ?>
    <?= $this->session->flashdata('message'); ?>
  <?php endif; ?>
  <!-- Data Paket Wisata -->
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#kriteria" data-toggle="tab">KRITERIA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#subkriteria" data-toggle="tab">SUB KRITERIA</a>
        </li>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <!-- ahp -->
        <div class="tab-pane active" id="kriteria">
          <form method="post" action="<?= base_url() . 'c_kriteria/tambah_data'; ?>">
            <div class="form-group">
              <label>Kode kriteria</label>
              <input type="text" class="form-control" id="kd_kriteria" name="kd_kriteria" placeholder="Contoh: C3">
              <?= form_error('kd_kriteria', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Keterangan kriteria</label>
              <input type="text" class="form-control" id="ket" name="ket" placeholder="Contoh: Usia">
              <?= form_error('ket', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Bobot</label>
              <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Contoh: 5">
              <?= form_error('bobot', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Atribut</label>
              <select name="attribut" id="attribut" class="form-control input-lg">
                <option value="">Pilih Atribut</option>
                <option value="Benefit">Benefit</option>
                <option value="Cost">Cost</option>
              </select>
              <?= form_error('attribut', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Bobot Nilai</label>
              <input type="text" class="form-control" id="bobot" name="bobot_nilai" placeholder="Contoh: 0.25">
              <?= form_error('bobot_nilai', '<small class="text-danger">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
          </form>
          <br>
          <hr><br>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="table-success">
                <tr>
                  <th>No</th>
                  <th>Kode Kriteria</th>
                  <th>Keterangan</th>
                  <th>Bobot</th>
                  <th>Atribut</th>
                  <th>Bobot</th>
                  <th style="width: 15%">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($kriteria as $krt) : ?>
                  <tr>
                    <td width="20px"><?= $no++; ?></td>
                    <td><?= $krt->kd_kriteria; ?></td>
                    <td><?= $krt->ket; ?></td>
                    <td><?= $krt->bobot; ?> </td>
                    <td><?= $krt->attribut; ?></td>
                    <td><?= $krt->bobot_nilai; ?></td>
                    <td class="text-center">
                      <a href="<?= base_url(); ?>c_kriteria/edit_data/<?= $krt->kd_kriteria; ?>" class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Edit</a>
                      <a onclick="deleteConfirm('<?= base_url('c_kriteria/hapus_data/'); ?><?= $krt->kd_kriteria; ?>')" href="#!" class="badge badge-danger"><i class="far fa-trash-alt"></i> Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- tambah subkriteria -->
        <div class="tab-pane" id="subkriteria">
          <form method="post" action="<?= base_url() . 'c_subkriteria/tambah_data'; ?>">
            <div class="form-group">
              <label>Kode kriteria</label>
              <select name="kd_kriteria" id="kd_kriteria" class="form-control input-lg" required oninvalid="this.setCustomValidity('Kode kriteria tidak boleh kosong!')" oninput="setCustomValidity('')" placeholder="Contoh: C3">
                <option value="">Pilih Kode Kriteria</option>
                <?php foreach ($kriteria as $krt) : ?>
                  <option value="<?= $krt->kd_kriteria; ?>">
                    <?= $krt->ket; ?>[<?= $krt->kd_kriteria; ?>]</option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Keterangan Sub</label>
              <input type="text" class="form-control" name="ket_sub" required oninvalid="this.setCustomValidity('SubKriteria tidak boleh kosong!')" oninput="setCustomValidity('')" placeholder="Contoh: Usia">
            </div>
            <div class="form-group">
              <label>Bobot</label>
              <input type="number" class="form-control" name="bobot" required oninvalid="this.setCustomValidity('Bobot tidak boleh kosong!')" oninput="setCustomValidity('')" placeholder="Contoh: 5">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
          </form>
          <br>
          <hr><br>
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="data">
              <thead class="table-success">
                <tr>
                  <th>No</th>
                  <th>Kode Kriteria</th>
                  <th>Ket Kriteria</th>
                  <th>Ket SubKriteria</th>
                  <th>Bobot</th>
                  <th style="width: 30%">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($subkriteria as $sk) : ?>
                  <tr>
                    <td width="20px"><?= $no++; ?></td>
                    <td><?= $sk->kd_kriteria; ?></td>
                    <td><?= $sk->nm_kriteria; ?></td>
                    <td><?= $sk->ket_sub; ?></td>
                    <td><?= $sk->bobot; ?></td>
                    <td class="text-center">
                      <a href="<?= base_url(); ?>c_subkriteria/edit_data/<?= $sk->id_subkriteria; ?>" class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Edit</a>
                      <a onclick="deleteConfirm('<?= base_url('c_subkriteria/hapus_data/'); ?><?= $sk->id_subkriteria; ?>')" href="#!" class="badge badge-danger"><i class="far fa-trash-alt"></i> Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Modal tambah-->
<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus Data Kriteria ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>
<script>
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>
<script src="<?= base_url('assets/'); ?>bootstrap-validate/src/bootstrap-validate.js"></script>
<script>
  bootstrapValidate('#kd_kriteria_validasi', 'required:Please fill out this field!');
  bootstrapValidate('#ket', 'required:Please fill out this field!');
  bootstrapValidate('#bobot', 'required:Please fill out this field!');
  bootstrapValidate('#atribut', 'required:Please fill out this field!');
</script>