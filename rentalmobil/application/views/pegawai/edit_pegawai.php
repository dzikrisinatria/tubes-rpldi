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

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-7">
					<!-- Horizontal Form -->
					<div class="card card-info shadow-sm" style="border-radius:10px;">
						<!-- <div class="card-header">
							<h3 class="card-title">Tambah Pegawai</h3>
						</div> -->
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('pegawai/editPegawai/'.$getpegawai['id_pegawai']);?>

							<div class="card-body">
								<div class="form-group row">
									<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>"
										id="nama" name="nama" placeholder="Nama Lengkap" autofocus value="<?= $getpegawai['nama'];?>">
										<?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
									<div class="col-sm">
										<select name="jenis_kelamin" class="custom-select <?= form_error('jenis_kelamin') ? 'is-invalid' : ''; ?>" aria-label="">
											<option selected disabled>Pilih</option>
											<option value="0" <?= $getpegawai['jenis_kelamin'] == '0' ? "selected" : ""; ?>>Pria</option>
											<option value="1" <?= $getpegawai['jenis_kelamin'] == '1' ? "selected" : ""; ?>>Wanita</option>
										</select>
										<?= form_error('jenis_kelamin', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="id_role" class="col-sm-3 col-form-label">Jabatan</label>
									<div class="col-sm">
										<select class="custom-select <?= form_error('id_role') ? 'is-invalid' : ''; ?>" name="id_role">
											<option selected disabled>Pilih</option>
											<?php foreach ($getrole as $r ) :?>
												<?php if( $getpegawai['id_role'] == $r['id_role'] ) : ?>
													<option value="<?= $r['id_role']; ?>" selected><?= $r['nama_role']; ?></option>
												<?php else : ?>
													<option value="<?= $r['id_role']; ?>"><?= $r['nama_role']; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										</select>
										<?= form_error('id_role', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
									<div class="col-sm">
										<input type="date" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : ''; ?>"
										id="tgl_lahir" name="tgl_lahir" value="<?= $getpegawai['tgl_lahir']; ?>">
										<?= form_error('tgl_lahir', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
									<div class="col-sm">
										<textarea name="alamat" id="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>"
										placeholder="Alamat" cols="30" rows="3"><?= $getpegawai['alamat']; ?></textarea>
										<?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="email" class="col-sm-3 col-form-label">Email</label>
									<div class="col-sm">
										<input name="email" type="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>"
										placeholder="email@mail.com" value="<?= $getpegawai['email']; ?>">
										<?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="foto_profil" class="col-sm-3 col-form-label">Foto Profil</label>
									<div class="col-sm">
										<div class="custom-file">
											<label class="custom-file-label" for="foto_profil">Pilih Foto</label>
											<input type="file" class="custom-file-input" id="foto_profil" name="foto_profil">
											<?= $this->session->flashdata('err_profil'); //pesan error khusus upload ?>
										</div>
										<?= form_error('foto_profil', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer flex d-flex justify-content-end">
								<a type="button" href="<?= base_url(); ?>pegawai" class="btn btn-default">Batal</a>
								<button type="submit" class="btn btn-primary ml-2">Update</button>
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
