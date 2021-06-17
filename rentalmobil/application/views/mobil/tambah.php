<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title; ?></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- SweetAlert -->
	<div class="flash-data-mobil" data-flashdata="<?= $this->session->flashdata('message_tambah_mobil'); ?>"></div>
	
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- Horizontal Form -->
					<div class="card card-default shadow-sm" style="border-radius:10px;">
						<!-- form start -->
						<?= form_open_multipart('mobil/tambahmobil');?>

							<div class="card-body">
								<div class="form-group row">
									<label for="id_seri" class="col-sm-3 col-form-label">Seri Mobil</label>
									<div class="col-sm">
										<select class="form-control select2bs4 <?= form_error('id_seri') ? 'is-invalid' : ''; ?>" name="id_seri" style="width: 100%;">
											<option selected disabled>Pilih</option>
											<?php foreach ($getseri as $s ) :?>
												<?php if( set_value('id_seri') == $s['id_seri'] ) : ?>
													<option value="<?= $s['id_seri']; ?>" selected><?= $s['nama_merk']; ?> <?= $s['nama_seri']; ?></option>
												<?php else : ?>
													<option value="<?= $s['id_seri']; ?>"><?= $s['nama_merk']; ?> <?= $s['nama_seri']; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										</select>
										<?= form_error('id_seri', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="id_jenis" class="col-sm-3 col-form-label">Jenis Mobil</label>
									<div class="col-sm">
										<select class="form-control select2bs4 <?= form_error('id_jenis') ? 'is-invalid' : ''; ?>" name="id_jenis" style="width: 100%;">
											<option selected disabled>Pilih</option>
											<?php foreach ($getjenis as $s ) :?>
												<?php if( set_value('id_jenis') == $s['id_jenis'] ) : ?>
													<option value="<?= $s['id_jenis']; ?>" selected><?= $s['nama_jenis']; ?></option>
												<?php else : ?>
													<option value="<?= $s['id_jenis']; ?>"><?= $s['nama_jenis']; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										</select>
										<?= form_error('id_seri', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="warna" class="col-sm-3 col-form-label">Warna Mobil</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('warna') ? 'is-invalid' : ''; ?>"
										id="warna" name="warna" placeholder="Warna Mobil" value="<?= set_value('warna'); ?>">
										<?= form_error('warna', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tahun" class="col-sm-3 col-form-label">Tahun Mobil</label>
									<div class="col-sm">
										<input type="number" class="form-control <?= form_error('tahun') ? 'is-invalid' : ''; ?>"
										id="tahun" name="tahun" placeholder="Tahun Mobil" value="<?= set_value('tahun'); ?>">
										<?= form_error('tahun', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="plat_nomor" class="col-sm-3 col-form-label">Plat Nomor</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('plat_nomor') ? 'is-invalid' : ''; ?>"
										id="plat_nomor" name="plat_nomor" placeholder="Plat Nomor" value="<?= set_value('plat_nomor'); ?>">
										<?= form_error('plat_nomor', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nomor_rangka" class="col-sm-3 col-form-label">Nomor Rangka</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('nomor_rangka') ? 'is-invalid' : ''; ?>"
										id="nomor_rangka" name="nomor_rangka" placeholder="Nomor Rangka" value="<?= set_value('nomor_rangka'); ?>">
										<?= form_error('nomor_rangka', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nomor_mesin" class="col-sm-3 col-form-label">Nomor Mesin</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('nomor_mesin') ? 'is-invalid' : ''; ?>"
										id="nomor_mesin" name="nomor_mesin" placeholder="Nomor Mesin" value="<?= set_value('nomor_mesin'); ?>">
										<?= form_error('nomor_mesin', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="harga" class="col-sm-3 col-form-label">Harga</label>
									<div class="col-sm">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp</span>
											</div>
											<input type="number" class="form-control <?= form_error('harga') ? 'is-invalid' : ''; ?>"
											id="harga" name="harga" placeholder="Harga Mobil" value="<?= set_value('harga'); ?>">
											<?= form_error('harga', '<small class="form-text text-danger">', '</small>'); ?>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="foto_mobil" class="col-sm-3 col-form-label">Foto Mobil</label>
									<div class="col-sm">
										<div class="custom-file">
											<label class="custom-file-label" for="foto_mobil">Pilih Foto</label>
											<input type="file" class="custom-file-input" id="foto_mobil" name="foto_mobil">
											<?= $this->session->flashdata('foto_mobil'); //pesan error khusus upload ?>
										</div>
										<?= form_error('foto_mobil', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer flex d-flex justify-content-end">
								<a href="javascript:window.history.go(-1);" class="btn btn-default float-right">Batal</a>
								<button type="submit" class="btn btn-primary ml-2">Simpan</button>
							</div>
							<!-- /.card-footer -->
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
