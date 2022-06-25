<div class="container-fluid">
  <!-- DataAlternatif -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Penilaian Alternatif</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-success">
            <tr>
              <th>No</th>
              <th>Nama Paket Wisata</th>
              <th>Harga Paket(C1)</th>
              <th>Durasi(C2)</th>
              <th>Usia(C3)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($nilai as $n) : ?>
              <tr>
                <td width="20px"><?= $no++; ?></td>
                <td><?= $n->nm_ag; ?></td>
                <td><?= $n->nm_sub; ?></td><!-- C1 -->
                <td><?= $n->sub; ?></td><!-- C2 -->
                <td><?= $n->nmsub; ?></td><!-- C3 -->
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- DataRating Kecocokan -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Rating Kecocokan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-success">
            <tr>
              <th>No</th>
              <th>Nama Paket Wisata</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($rating as $row) : ?>
              <tr>
                <td width="20px"><?= $no++; ?></td>
                <td><?= $row['nm_ag']; ?></td>
                <!-- Normalisasi C1,C2,C3 ke bobot -->
                <td><?= $row['b1'];  ?></td>
                <td><?= $row['b2']; ?></td>
                <td><?= $row['b3']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- DataNormalisasi -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Normalisasi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-success">
            <tr>
              <th>No</th>
              <th>Nama Paket Wisata</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($rating as $row) : ?>
              <tr>
                <td width="20px"><?= $no++; ?></td>
                <td><?= $row['nm_ag']; ?></td>
                <?php foreach ($sifat as $data) : ?>
                  <!-- Menghitung bobot dari nilai max -->
                  <?php if ($data['kd_kriteria'] == "C1" && $data['attribut']  == "Benefit") { ?>
                    <td><?= round(($row['b1'] / $c1max), 2); ?></td>
                  <?php } else if ($data['kd_kriteria'] == "C1" && $data['attribut']  == "Cost") { ?>
                    <td><?= round(($c1min / $row['b1']), 2); ?></td>
                  <?php } ?>
                  <?php if ($data['kd_kriteria'] == "C2" && $data['attribut']  == "Benefit") { ?>
                    <td><?= round(($row['b2'] / $c2max), 2); ?></td>
                  <?php } else if ($data['kd_kriteria'] == "C2" && $data['attribut']  == "Cost") { ?>
                    <td><?= round(($c2min / $row['b2']), 2); ?></td>
                  <?php } ?>
                  <?php if ($data['kd_kriteria'] == "C3" && $data['attribut']  == "Benefit") { ?>
                    <td><?= round(($row['b3'] / $c3max), 2); ?></td>
                  <?php } else if ($data['kd_kriteria'] == "C3" && $data['attribut']  == "Cost") { ?>
                    <td><?= round(($c3min / $row['b3']), 2); ?></td>
                  <?php } ?>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- DataPerangkingan -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Perangkingan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-success">
            <tr>
              <th>No</th>
              <th>Nama Paket Wisata</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;  
            foreach ($rating as $row) : ?>
              <tr>
                <td width="20px"><?= $no++; ?></td>
                <td width="350px"><?= $row['nm_ag'];  ?></td>
                <?php sort($sifat);
                foreach ($sifat as $data) : ?>
                  <!-- Menghitung bobot dari nilai max -->
                  <?php if ($data['kd_kriteria'] == "C1" && $data['attribut']  == "Benefit") { ?>
                    <?php $data1 = $row['b1'] / $c1max ?>
                  <?php } else if ($data['kd_kriteria'] == "C1" && $data['attribut']  == "Cost") { ?>
                    <?php $data1 = $c1min / $row['b1'] ?>
                  <?php } else ?>
                  <?php if ($data['kd_kriteria'] == "C2" && $data['attribut']  == "Benefit") { ?>
                    <?php round($data2 = $row['b2'] / $c2max, 2); ?>
                  <?php } else if ($data['kd_kriteria'] == "C2" && $data['attribut']  == "Cost") { ?>
                    <?php round($data2 = $c2min / $row['b2'], 2); ?>
                  <?php } else ?>
                  <?php if ($data['kd_kriteria'] == "C3" && $data['attribut']  == "Benefit") { ?>
                    <?php round($data3 = $row['b3'] / $c3max, 2); ?>
                  <?php } else if ($data['kd_kriteria'] == "C3" && $data['attribut']  == "Cost") { ?>
                    <?php round(($data3 = $c3min / $row['b3']), 2); ?>
                  <?php } ?>
                <?php endforeach; ?>
                <td><?= round(($bobotc1 * $data1) + ($bobotc2 * $data2) + ($bobotc3 * $data3), 2);?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin mau logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Jika pilih ya anda akan logout, ingin batal klik cancel atau tanda kali(x)</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ya</a>
      </div>
    </div>
  </div>
</div>

<!-- end modal logout -->