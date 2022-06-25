<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
			<a href="<?= base_url('c_kriteria'); ?>" class="badge badge-danger">
				<i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
			<div class="table-responsive">

				<?php foreach ($kriteria as $krt) :	?>

					<form method="post" action="<?= base_url('c_kriteria/edit_data/') ?><?= $krt->kd_kriteria; ?>">
						<div class="form-group">
							<label>Kode kriteria</label>
							<input type="text" class="form-control" readonly name="kd_kriteria" id="kd_kriteria" value="<?= $krt->kd_kriteria; ?>">
							<?= form_error('kd_kriteria', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label>Nama kriteria</label>
							<input type="text" class="form-control" name="ket" id="ket" value="<?= $krt->ket; ?>">
							<?= form_error('ket', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label>Bobot</label>
							<input type="number" class="form-control" name="bobot" id="bobot" value="<?= $krt->bobot; ?>">
							<?= form_error('bobot', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label>Attribut</label>
							<select name="attribut" id="attribut" class="form-control input-lg">
								<option <?= ($krt->attribut == "Benefit" ? 'selected=""' : '') ?> value="Benefit">Benefit</option>
								<option <?= ($krt->attribut == "Cost" ? 'selected=""' : '') ?> value="Cost">Cost</option>
							</select>
							<?= form_error('attribut', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label>Bobot nilai</label>
							<input type="text" class="form-control" name="bobot_nilai" id="bobot" value="<?= $krt->bobot_nilai; ?>">
							<?= form_error('bobot_nilai', '<small class="text-danger">', '</small>'); ?>
						</div>
						<button type="submit" class="btn btn-primary float-right">Simpan</button>
					</form>

				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>