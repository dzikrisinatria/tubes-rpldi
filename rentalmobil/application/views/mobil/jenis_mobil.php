<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<div class="float-sm-right">
						<a href="javascript:void(0);" class="btn btn-sm btn-primary"
							data-toggle="modal" data-target="#tambah-jenis">
							<i class="fas fa-fw fa-plus mr-1"></i>Tambah Jenis</a>
					</div>
				</div>
				
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- SweetAlert -->
	<div class="flash-data-jenis" data-flashdata="<?= $this->session->flashdata('message_jenis'); ?>"></div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-7">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-body">
							<table id="datajenismobil" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Jenis Mobil</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allJenis) ) :?>
									<tr>
										<td colspan="4">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allJenis as $j ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $j['nama_jenis']?></td>
										<td>
											<?php if ( $j['status_jenis'] == 1 ) :?>
												<span class="text-bold text-success">Tersedia</span>
											<?php else:?>
												<span class="text-bold text-danger">Tidak Tersedia</span>
											<?php endif;?>
										</td>
										<td>
                                            <span data-toggle="tooltip" data-placement="top" title="Detail">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#detail<?= $j['id_jenis']?>">
                                                    <i class="fas fa-fw fa-info"></i>
                                                </button>
                                            </span>
											
											<?php if ( $j['status_jenis'] == 1 ) :?>
                                            <span data-toggle="tooltip" data-placement="top" title="Ubah">
												<button type="button" class="btn btn-warning ml-1 btn-sm" data-toggle="modal"
													data-target="#ubahjenis<?= $j['id_jenis']?>">
													<i class="fas fa-fw fa-pen"></i>
												</button>
                                            </span>
											<?php else:?>
												<button type="button" class="btn btn-warning ml-1 btn-sm" disabled>
													<i class="fas fa-fw fa-pen"></i>
												</button>
											<?php endif;?>
											
											<?php if ( $j['status_jenis'] == 1 ) :?>
												<span data-toggle="tooltip" data-placement="top" title="Nonaktifkan">
													<a href="<?= base_url(); ?>mobil/nonaktifkanjenismobil/<?= $j['id_jenis']?>"
														class="btn btn-danger ml-1 btn-sm tombol-nonaktifan-jenis">
														<i class="fas fa-fw fa-power-off"></i>
													</a>
												</span>
											<?php else:?>
												<span data-toggle="tooltip" data-placement="top" title="Aktifkan">
													<a href="<?= base_url(); ?>mobil/aktifkanjenismobil/<?= $j['id_jenis']?>"
														class="btn btn-success ml-1 btn-sm tombol-aktifan-jenis">
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
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<!-- Modal Detail Jenis Mobil -->
<?php foreach ($allJenis as $j ) :?>
<div class="modal fade" id="detail<?= $j['id_jenis']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Jenis Mobil</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Nama Jenis</dt>
                    </div>
                    <div class="col-8">
                        <dd><?= $j['nama_jenis'];?></dd>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Status</dt>
                    </div>
                    <div class="col-8">
                        <dd>
							<?php if ( $j['status_jenis'] == 1 ) :?>
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
				<button type="button" class="btn btn-warning ml-1" data-toggle="modal"
					data-target="#ubahjenis<?= $j['id_jenis']?>">
					<i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
				</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<!-- Modal Tambah Jenis Mobil -->
<div class="modal fade" id="tambah-jenis">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Jenis</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('mobil/tambahjenismobil', array('id' => 'form-tambah-jenis', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama_jenis" class="col-sm-4 col-form-label">Nama Jenis Mobil</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="nama_jenis" name="nama_jenis" placeholder="Jenis Mobil"
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
	</div>
</div>

<!-- Modal Ubah Jenis Mobil -->
<?php foreach ($allJenis as $j ) :?>
<div class="modal fade" id="ubahjenis<?= $j['id_jenis']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Jenis</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('mobil/editjenismobil/'.$j['id_jenis'], array('id' => 'form-ubah-jenis', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama_jenis" class="col-sm-4 col-form-label">Nama Jenis Mobil</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="nama_jenis" name="nama_jenis"
								placeholder="Jenis Mobil" autofocus value="<?= $j['nama_jenis']?>">
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