<div class="ftco-blocks-cover-1" style="height:30vh; background-image: url('<?= base_url('assets/');?>images/car3.jpg'); background-repeat:no-repeat; background-size:cover;">
	<div class="ftco-cover-1 innerpage" style="height:30vh;">
		<div class="container">
			<div class="row align-items-start justify-content-center">
				<div class="col-lg-6 text-center" style="margin-top:20vh">
					<!-- <h1>Data Diri Anda</h1>
					<p>Berikut mobil berkualitas dari kami yang dapat Anda rasakan sensasinya</p> -->
				</div>
			</div>
		</div>
	</div>
</div>

<div class="site-section bg-light p-5" id="contact-section">
	<div class="container">
		<div class="row justify-content-start text-center">
			<div class="col-7 text-left mb-5">
				<h2>Data Diri</h2>
				<p>Lengkapilah form berikut sesuai dengan data diri Anda yang sebenar-benarnya sebagai persyaratan penyewaan mobil.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 mb-5">
				<?= $this->session->flashdata('message'); //pesan error khusus upload ?>

				<?= form_open_multipart('authCustomer/register2');?>

					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="name" class="form-label">Nama Lengkap</label>
						</div>
						<div class="col">
							<input name="name" type="text" class="form-control" placeholder="Nama Lengkap"
							value="<?= $customer['nama']; ?>">
							<?= form_error('name', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					
					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
						</div>
						<div class="col">
							<select name="jenis_kelamin" class="form-control" aria-label="" style="width:;">
								<option selected disabled>Pilih</option>
								<option value="0" <?= set_value('jenis_kelamin') == '0' ? "selected" : ""; ?>>Pria</option>
								<option value="1" <?= set_value('jenis_kelamin') == '1' ? "selected" : ""; ?>>Wanita</option>
							</select>
							<?= form_error('jenis_kelamin', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-3">
							<label for="alamat" class="form-label">Alamat Lengkap</label>
						</div>
						<div class="col">
							<textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" cols="30"
								rows="3"><?= set_value('alamat'); ?></textarea>
							<?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="nik" class="form-label">NIK</label>
						</div>
						<div class="col">
							<input name="nik" id="nik" type="text" class="form-control" placeholder="Nomor Induk Kependudukan"
							value="<?= set_value('nik'); ?>">
							<?= form_error('nik', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					
					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="no_sim" class="form-label">Nomor SIM</label>
						</div>
						<div class="col">
							<input name="no_sim" type="text" class="form-control" placeholder="Nomor SIM"
							value="<?= set_value('no_sim'); ?>">
							<?= form_error('no_sim', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					
					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="no_hp" class="form-label">Nomor HP</label>
						</div>
						<div class="col">
							<input name="no_hp" type="text" class="form-control" placeholder="Nomor HP"
							value="<?= set_value('no_hp'); ?>">
							<?= form_error('no_hp', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					
					<hr>
					
					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="foto_kk" class="form-label">Foto Kartu Keluarga</label>
						</div>
						<div class="col">
							<div class="custom-file">
								<label class="custom-file-label" for="foto_kk">Pilih Foto Kartu Keluarga</label>
								<input type="file" class="custom-file-input" id="foto_kk" name="foto_kk">
								<?= $this->session->flashdata('err_kk'); //pesan error khusus upload ?>
							</div>
							<?= form_error('foto_kk', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					
					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="foto_ktp" class="form-label">Foto KTP</label>
						</div>
						<div class="col">
							<div class="custom-file">
								<label class="custom-file-label" for="foto_ktp">Pilih Foto KTP</label>
								<input type="file" class="custom-file-input" id="foto_ktp" name="foto_ktp">
								<?= $this->session->flashdata('err_ktp'); //pesan error khusus upload ?>
							</div>
							<?= form_error('foto_ktp', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>
					
					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="foto_selfie_ktp" class="form-label">Foto Selfie KTP</label>
						</div>
						<div class="col">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="foto_selfie_ktp" name="foto_selfie_ktp">
								<label class="custom-file-label" for="foto_selfie_ktp">Pilih Foto Selfie KTP</label>
								<?= $this->session->flashdata('err_selfie'); //pesan error khusus upload ?>
							</div>
							<?= form_error('foto_selfie_ktp', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row flex align-items-center">
						<div class="col-3">
							<label for="foto_sim" class="form-label">Foto SIM</label>
						</div>
						<div class="col">
							<div class="custom-file">
								<label class="custom-file-label" for="foto_sim">Pilih Foto SIM</label>
								<input type="file" class="custom-file-input" id="foto_sim" name="foto_sim">
								<?= $this->session->flashdata('err_sim'); //pesan error khusus upload ?>
							</div>
							<?= form_error('foto_sim', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
					</div>

					<hr>

					<div class="form-group row">
						<div class="col-3"></div>
						<div class="col mr-auto">
							<button type="submit" class="btn btn-block btn-primary text-white py-3 px-5">
								Selesai</button>
						</div>
					</div>
				</form>
			</div>

			<!-- <div class="col-lg-4 ml-auto">
				<div class="bg-white p-3 p-md-5">
					<h3 class="text-black mb-4">Contact Info</h3>
					<ul class="list-unstyled footer-link">
						<li class="d-block mb-3">
							<span class="d-block text-black">Address:</span>
							<span>34 Street Name, City Name Here, United States</span></li>
						<li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+1 242 4942
								290</span></li>
						<li class="d-block mb-3"><span
								class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
					</ul>
				</div>
			</div> -->
		</div>
	</div>
</div>