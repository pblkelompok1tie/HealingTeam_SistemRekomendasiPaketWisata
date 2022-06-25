<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
			<a href="<?= base_url('c_kriteria'); ?>" class="badge badge-danger">
				<i class="far fa-arrow-alt-circle-left"></i> Kembali</a><br><br>
			<div class="table-responsive">
				<?php foreach ($subkriteria as $sk) : ?>
					<form method="post" action="<?= base_url('c_subkriteria/edit_data/') ?><?= $sk->id_subkriteria; ?>">
						<div class="form-group">
							<label>Kode kriteria</label>
							<input type="text" class="form-control" readonly name="kd_kriteria" value="<?= $sk->kd_kriteria; ?>">
							<?= form_error('kd_kriteria', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label>Ket Subkriteria</label>
							<input type="text" class="form-control" name="ket_sub" value="<?= $sk->ket_sub; ?>">
							<?= form_error('ket_sub', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label>Bobot</label>
							<input type="number" class="form-control" name="bobot" value="<?= $sk->bobot; ?>">
							<?= form_error('bobot', '<small class="text-danger">', '</small>'); ?>
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