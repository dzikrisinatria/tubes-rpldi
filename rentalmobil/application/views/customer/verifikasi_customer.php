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
                <!-- right column -->
                <div class="col-12 col-md">
                    <div class="card card-dark card-outline card-outline-tabs shadow-sm" style="border-radius:10px;">
                        <div class="card-header border-0">
							<div class="d-flex justify-content-between">
								<h5>Foto Dokumen</h5>
							</div>
						</div>
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                        aria-selected="true">Foto KTP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                        aria-selected="false">Foto Selfie KTP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                        href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                                        aria-selected="false">Foto KK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                                        href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings"
                                        aria-selected="false">Foto SIM</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-home-tab">
                                    <img class="rounded bg-light" width="100%" id="foto-dokumen"
                                        src="<?= base_url('assets/images/foto_ktp/') . $getCustomer['foto_ktp']; ?>">
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-profile-tab">
                                    <img class="rounded bg-light" width="100%"
                                        src="<?= base_url('assets/images/foto_selfie_ktp/') . $getCustomer['foto_selfie_ktp']; ?>">
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-messages-tab">
                                    <img class="rounded bg-light" width="100%"
                                        src="<?= base_url('assets/images/foto_kk/') . $getCustomer['foto_kk']; ?>">
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-settings-tab">
                                    <img class="rounded bg-light" width="100%"
                                        src="<?= base_url('assets/images/foto_sim/') . $getCustomer['foto_sim']; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
				<!--/.col (right) -->
				<!-- left column -->
				<div class="col-md-5">
					<!-- Horizontal Form -->
					<div class="card card-default shadow-sm" style="border-radius:10px;">
						<div class="card-header border-0">
							<div class="d-flex justify-content-between">
								<h5>Data Customer</h5>
							</div>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('pegawai/datacustomer/verifikasi/'.$getCustomer['id_customer']);?>
							<div class="card-body">
								<div class="form-group row">
									<label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>"
										id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $getCustomer['nama']; ?>">
										<?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
                                <div class="form-group row">
									<label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
									<div class="col-sm">
										<select name="jenis_kelamin" class="custom-select <?= form_error('jenis_kelamin') ? 'is-invalid' : ''; ?>" aria-label="">
											<option selected disabled>Pilih</option>
											<option value="0" <?= $getCustomer['jenis_kelamin'] == '0' ? "selected" : ""; ?>>Pria</option>
											<option value="1" <?= $getCustomer['jenis_kelamin'] == '1' ? "selected" : ""; ?>>Wanita</option>
										</select>
										<?= form_error('jenis_kelamin', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="alamat" class="col-sm-4 col-form-label">Alamat Lengkap</label>
									<div class="col-sm">
										<textarea name="alamat" id="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>"
										placeholder="Alamat" cols="30" rows="3"><?= $getCustomer['alamat']; ?></textarea>
										<?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="email" class="col-sm-4 col-form-label">Email</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>"
										id="email" name="email" placeholder="Email" value="<?= $getCustomer['email']; ?>">
										<?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_hp" class="col-sm-4 col-form-label">Nomor HP</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('no_hp') ? 'is-invalid' : ''; ?>"
										id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="<?= $getCustomer['no_hp']; ?>">
										<?= form_error('no_hp', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="nik" class="col-sm-4 col-form-label">NIK</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('nik') ? 'is-invalid' : ''; ?>"
										id="nik" name="nik" placeholder="NIK" value="<?= $getCustomer['nik']; ?>">
										<?= form_error('nik', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
                                <div class="form-group row">
									<label for="no_sim" class="col-sm-4 col-form-label">Nomor SIM</label>
									<div class="col-sm">
										<input type="text" class="form-control <?= form_error('no_sim') ? 'is-invalid' : ''; ?>"
										id="no_sim" name="no_sim" placeholder="Nomor SIM" value="<?= $getCustomer['no_sim']; ?>">
										<?= form_error('no_sim', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer flex d-flex justify-content-end">
								<a href="javascript:window.history.go(-1);" class="btn btn-default float-right">Batal</a>
								<button type="submit" class="btn btn-success ml-2">Verifikasi</button>
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
