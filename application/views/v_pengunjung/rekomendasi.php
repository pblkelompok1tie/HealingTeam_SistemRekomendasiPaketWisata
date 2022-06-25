	<!--conten -->
	<div class="container-fluid py-3">
		<img class="container-fluid bg-primary py-5 hero-header mb-5" style="border-radius: 10px; margin-top: 30px;	">
	</div>
	<div class="judul wow fadeInUp" style="margin: 30px 40px;">
		<h1>Rekomendasi Paket Wisata</h1>
		<h5>Dapatkan Rekomendasi Paket Wisata di Kabuparen Madiun yang kamu inginkan dengan mengisi kriteria dibawah</h5>
	</div>
	<main></main>
	<div class="wrap wow fadeInUp" data-wow-delay="0.3s">
		<div id="content" style="flex-grow: 1; width: 55%; padding: 40px; margin-bottom: 100px;">
			<form method="post" action="<?= base_url() . 'c_pengunjung/generate_search_by_filter'; ?>">
				<h5>Harga :</h5>
				<div class="wrap">
					<select class="form-input" tabindex="1" name="C1" style="margin-right: 10px;">
						<option value="">Pilih Harga Paket Wisata</option>
						<?php foreach ($harga_paket as $row) : ?>
							<option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
						<?php endforeach; ?>
					</select>
					<?= form_error('C1', '<small class="text-danger">', '</small>'); ?>
				</div>
				<h5>Durasi :</h5>
				<div class="wrap" onkeypress="return hanyaAngka(event)">
					<select class="form-input" tabindex="1" name="C2" style="margin-right: 10px;">
						<option value="">Pilih Durasi Paket Wisata</option>
						<?php foreach ($durasi as $row) : ?>
							<option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
						<?php endforeach; ?>
					</select>
					<?= form_error('C2', '<small class="text-danger">', '</small>'); ?>
				</div>
				<h5>Usia :</h5>
				<div class="wrap" onkeypress="return hanyaAngka(event)">
					<select class="form-input" tabindex="1" name="C3" style="margin-right: 10px;">
						<option value="">Pilih Usia</option>
						<?php foreach ($usia as $row) : ?>
							<option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
						<?php endforeach; ?>
					</select>
					<?= form_error('C3', '<small class="text-danger">', '</small>'); ?>
				</div>
				<h5>Rating :</h5>
				<div class="rating">
					<input type="radio" name="rating_paket_wisata" id="star" value="1">
					<label for="star">
						<i class="fa fa-star">1</i>
					</label>
					<input type="radio" name="rating_paket_wisata" id="star2" value="2">
					<label for="star2">
						<i class="fa fa-star">2</i>
					</label>
					<input type="radio" name="rating_paket_wisata" id="star3" value="3">
					<label for="star3">
						<i class="fa fa-star">3</i>
					</label>
					<input type="radio" name="rating_paket_wisata" id="star4" value="4">
					<label for="star4">
						<i class="fa fa-star">4</i>
					</label>
					<input type="radio" name="rating_paket_wisata" id="star5" value="5">
					<label class="section-tittle" for="star5">
						<i class="fa fa-star">5</i>
					</label>
				</div>
				<?= form_error('rating_paket_wisata', '<small class="text-danger">', '</small>'); ?>
				<style>
					.rating {
						display: flex;
						justify-content: space-between;
						margin-bottom: 50px;
					}

					.rating label i {
						width: 10px;
						height: 10px;
						justify-content: space-between;
						text-align: center;
						font-size: 20px;
						padding: 0px 30px 40px 0px;
					}

					.rating input {
						display: none;
						margin-right: -50px;
					}

					.rating label {
						text-align: center;
						color: #ffc107;
						font-size: 30px;
						border: 2px solid #ccc;
						padding: 10px 30px;
						border: none;
						border-radius: 30px;
						box-shadow: 0px 0px 8px grey;
					}

					.rating input:checked+label {
						background-color: #ffc107;
						color: white;
						box-shadow: 0px 0px 8px grey;
					}
				</style>
				<div class="wrap wow fadeInUp" data-wow-delay="0.3s">
					<input type="reset" class="flex btn btn-dark py-md-3 px-md-5 me-3 animated slideInLeft" style="width: 33%;" />
					<button type="submit" class="flex btn btn-secondary py-md-3 px-md-5 me-3 animated slideInLeft">Cari Paket Wisata</a>
				</div>
			</form>
		</div>
		<aside>
			<span>
				<img class="w-100 wow fadeInUp" data-wow-delay="0.5s" src="<?= base_url('assets/'); ?>pengunjung/img/vacation.jpg" style="max-height: 500px;">
			</span>
		</aside>
	</div>
	</main>
	<script>
		function hanyaAngka(event) {
			var angka = (event.which) ? event.which : event.keyCode
			if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
				return false;
			return true;
		}
	</script>