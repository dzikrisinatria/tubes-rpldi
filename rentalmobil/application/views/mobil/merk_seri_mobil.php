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
	<div class="flash-data-merk" data-flashdata="<?= $this->session->flashdata('message_merk'); ?>"></div>
	<div class="flash-data-seri" data-flashdata="<?= $this->session->flashdata('message_seri'); ?>"></div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-6">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-header border-0">
							<div class="d-flex justify-content-between">
								<h5>Merk Mobil</h5>
								<a href="javascript:void(0);" class="btn btn-sm btn-primary"
									data-toggle="modal" data-target="#tambah-merk">
									<i class="fas fa-fw fa-plus mr-1"></i>Tambah Merk</a>
							</div>
						</div>
						<div class="card-body">
							<table id="datamerkmobil" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Merk</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allMerk) ) :?>
									<tr>
										<td colspan="4">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allMerk as $m ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $m['nama_merk']?></td>
										<td>
											<?php if ( $m['status_merk'] == 1 ) :?>
												<span class="text-bold text-success">Tersedia</span>
											<?php else:?>
												<span class="text-bold text-danger">Tidak Tersedia</span>
											<?php endif;?>
										</td>
										<td>
											<span data-toggle="tooltip" data-placement="top" title="Detail">
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
													data-target="#detailmerk<?= $m['id_merk']?>">
													<i class="fas fa-fw fa-info"></i>
												</button>
											</span>
											
											<?php if ( $m['status_merk'] == 1) :?>
											<span data-toggle="tooltip" data-placement="top" title="Ubah">
												<button type="button" class="btn btn-warning ml-1 btn-sm" data-toggle="modal"
													data-target="#ubahmerk<?= $m['id_merk']?>">
													<i class="fas fa-fw fa-pen"></i>
												</button>
											</span>
											<?php else:?>
                                                <button type="button" class="btn btn-warning ml-1 btn-sm" disabled>
													<i class="fas fa-fw fa-pen"></i>
												</button>
											<?php endif;?>
											
											<?php if ( $m['status_merk'] == 1 ) :?>
											<span data-toggle="tooltip" data-placement="top" title="Nonaktifkan">
												<a href="<?= base_url(); ?>mobil/nonaktifkanmerkmobil/<?= $m['id_merk']?>"
													class="btn btn-danger ml-1 btn-sm tombol-nonaktifkan-merk">
													<i class="fas fa-fw fa-power-off"></i>
												</a>
											</span>
											<?php else:?>
												<span data-toggle="tooltip" data-placement="top" title="Aktifkan">
												<a href="<?= base_url(); ?>mobil/aktifkanmerkmobil/<?= $m['id_merk']?>"
													class="btn btn-success ml-1 btn-sm tombol-aktifkan-merk">
													<i class="fas fa-fw fa-power-off"></i>
												</a>
											</span>
											<?php endif;?>

										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>

				</div>
				<!--/.col (right) -->
				<!-- right column -->
				<div class="col-6">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-header border-0">
							<div class="d-flex justify-content-between">
								<h5>Seri Mobil</h5>
								<a href="javascript:void(0);" class="btn btn-sm btn-primary"
									data-toggle="modal" data-target="#tambah-seri">
									<i class="fas fa-fw fa-plus mr-1"></i>Tambah Seri</a>
							</div>
						</div>
						<div class="card-body">
							<table id="dataserimobil" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Merk</th>
										<th>Seri</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allSeri) ) :?>
									<tr>
										<td colspan="5">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allSeri as $s ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $s['nama_merk']?></td>
										<td><?= $s['nama_seri']?></td>
										<td>
											<?php if ( $s['status_seri'] == 1 ) :?>
												<span class="text-bold text-success">Tersedia</span>
											<?php else:?>
												<span class="text-bold text-danger">Tidak Tersedia</span>
											<?php endif;?>
										</td>
										<td>
											<span data-toggle="tooltip" data-placement="top" title="Detail">
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
													data-target="#detailseri<?= $s['id_seri']?>">
													<i class="fas fa-fw fa-info"></i>
												</button>
											</span>

											<?php if ( $s['status_seri'] == 1) :?>
											<span data-toggle="tooltip" data-placement="top" title="Ubah">
												<button type="button" class="btn btn-warning ml-1 btn-sm" data-toggle="modal"
													data-target="#ubahseri<?= $s['id_seri']?>">
													<i class="fas fa-fw fa-pen"></i>
												</button>
											</span>
											<?php else:?>
                                                <button type="button" class="btn btn-warning ml-1 btn-sm" disabled>
													<i class="fas fa-fw fa-pen"></i>
												</button>
											<?php endif;?>
											
											<?php if ( $s['status_seri'] == 1 ) :?>
											<span data-toggle="tooltip" data-placement="top" title="Nonaktifkan">
												<a href="<?= base_url(); ?>mobil/nonaktifkanserimobil/<?= $s['id_seri']?>"
													class="btn btn-danger ml-1 btn-sm tombol-nonaktifkan-seri">
													<i class="fas fa-fw fa-power-off"></i>
												</a>
											</span>
											<?php elseif ( $s['status_seri'] == 0 ) :?>
												<?php if ( $s['status_merk'] == 0 ) :?>
													<button type="button" class="btn btn-success ml-1 btn-sm" disabled>
														<i class="fas fa-fw fa-power-off"></i>
													</button>
												<?php else:?>
													<span data-toggle="tooltip" data-placement="top" title="Aktifkan">
														<a href="<?= base_url(); ?>mobil/aktifkanserimobil/<?= $s['id_seri']?>"
															class="btn btn-success ml-1 btn-sm tombol-aktifkan-seri">
															<i class="fas fa-fw fa-power-off"></i>
														</a>
													</span>
												<?php endif;?>
											<?php endif;?>

										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>

				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<!-- Modal Detail Merk Mobil -->
<?php foreach ($allMerk as $m ) :?>
<div class="modal fade" id="detailmerk<?= $m['id_merk']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Merk Mobil</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row mx-auto">
					<div class="col-4">
						<dt>Nama Merk</dt>
					</div>
					<div class="col-8">
						<dd><?= $m['nama_merk'];?></dd>
					</div>
				</div>
				<div class="row mx-auto">
					<div class="col-4">
						<dt>Status</dt>
					</div>
					<div class="col-8">
						<dd>
							<?php if ( $m['status_merk'] == 1 ) :?>
								<span class="text-bold text-success">Tersedia</span>
							<?php else:?>
								<span class="text-bold text-danger">Tidak Tersedia</span>
							<?php endif;?>
						</dd>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<?php if ( $m['status_merk'] == 1 ) :?>
					<button type="button" class="btn btn-warning ml-1"
						data-toggle="modal" data-target="#ubahmerk<?= $m['id_merk']?>">
						<i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
					</button>
				<?php else:?>
					<a href="<?= base_url(); ?>mobil/aktifkanmerkmobil/<?= $m['id_merk']?>"
						class="btn btn-success ml-1 tombol-aktifkan-merk">
						<i class="fas fa-fw fa-power-off mr-2"></i>Aktifkan Merk
					</a>
				<?php endif;?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<!-- Modal Detail Seri Mobil -->
<?php foreach ($allSeri as $s ) :?>
<div class="modal fade" id="detailseri<?= $s['id_seri']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Seri Mobil</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row mx-auto">
					<div class="col-4">
						<dt>Nama Merk</dt>
					</div>
					<div class="col-8">
						<dd><?= $s['nama_merk'];?></dd>
					</div>
				</div>
				<div class="row mx-auto">
					<div class="col-4">
						<dt>Nama Seri</dt>
					</div>
					<div class="col-8">
						<dd><?= $s['nama_seri'];?></dd>
					</div>
				</div>
				<div class="row mx-auto">
					<div class="col-4">
						<dt>Status</dt>
					</div>
					<div class="col-8">
						<dd>
							<?php if ( $s['status_seri'] == 1 ) :?>
								<span class="text-bold text-success">Tersedia</span>
							<?php else:?>
								<span class="text-bold text-danger">Tidak Tersedia</span>
							<?php endif;?>
						</dd>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<?php if ( $s['status_seri'] == 1 && $s['status_merk'] == 1 ) :?>
					<button type="button" class="btn btn-warning ml-1 btn-sm"
						data-toggle="modal" data-target="#ubahseri<?= $s['id_seri']?>">
						<i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
					</button>
				<?php endif;?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<!-- Modal Tambah Merk Mobil -->
<div class="modal fade" id="tambah-merk">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Merk</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('mobil/tambahmerkmobil', array('id' => 'form-tambah-merk', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama_merk" class="col-sm-4 col-form-label">Nama Merk Mobil</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="nama_merk" name="nama_merk" placeholder="Merk Mobil"
								autofocus>
							<div class="error"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-default float-right" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary ml-2">Simpan</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- Modal Tambah Seri Mobil -->
<div class="modal fade" id="tambah-seri">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Seri</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('mobil/tambahserimobil', array('id' => 'form-tambah-seri', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="id_merk" class="col-sm-4 col-form-label">Merk Mobil</label>
						<div class="col-sm">
							<select class="custom-select" name="id_merk">
								<option selected disabled>Pilih</option>
								<?php foreach ($allMerk as $m ) :?>
									<option value="<?= $m['id_merk']; ?>"><?= $m['nama_merk']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_seri" class="col-sm-4 col-form-label">Nama Seri Mobil</label>
						<div class="col-sm">
							<input type="text" class="form-control"
							id="nama_seri" name="nama_seri" placeholder="Seri Mobil" autofocus>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-default float-right" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary ml-2">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Ubah Merk Mobil -->
<?php foreach ($allMerk as $m ) :?>
<div class="modal fade" id="ubahmerk<?= $m['id_merk']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Merk</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('mobil/editmerkmobil/'.$m['id_merk'], array('id' => 'form-ubah-merk', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama_merk" class="col-sm-4 col-form-label">Nama Merk Mobil</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="nama_merk" name="nama_merk"
								placeholder="Merk Mobil" autofocus value="<?= $m['nama_merk']?>">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-default float-right" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary ml-2">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>

<!-- Modal Ubah Seri Mobil -->
<?php foreach ($allSeri as $s ) :?>
<div class="modal fade" id="ubahseri<?= $s['id_seri']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Seri</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('mobil/editserimobil/'.$s['id_seri'], array('id' => 'form-ubah-seri', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="id_merk" class="col-sm-4 col-form-label">Merk Mobil</label>
						<div class="col-sm">
							<select class="custom-select" name="id_merk">
								<option selected disabled>Pilih</option>
								<?php foreach ($allMerk as $m ) :?>
									<?php if($s['id_merk'] == $m['id_merk']) : ?>
										<option value="<?= $m['id_merk']; ?>" selected><?= $m['nama_merk']; ?></option>
									<?php else : ?>
										<option value="<?= $m['id_merk']; ?>"><?= $m['nama_merk']; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_seri" class="col-sm-4 col-form-label">Nama Seri Mobil</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="nama_seri" name="nama_seri"
								placeholder="Seri Mobil" autofocus value="<?= $s['nama_seri']?>">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-default float-right" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary ml-2">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>