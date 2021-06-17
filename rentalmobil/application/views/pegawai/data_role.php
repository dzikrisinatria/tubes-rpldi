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
							data-toggle="modal" data-target="#tambah-role">
							<i class="fas fa-fw fa-plus mr-1"></i>Tambah Jabatan</a>
					</div>
				</div>
				
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- SweetAlert -->
	<div class="flash-data-role" data-flashdata="<?= $this->session->flashdata('message_role'); ?>"></div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-7">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-body">
							<table id="datarole" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Jabatan</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allRole) ) :?>
									<tr>
										<td colspan="3">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allRole as $r ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $r['nama_role']?></td>
										<td>
											<?php if ( $r['status_role'] != 0 ) :?>
												<span class="text-bold text-success">Aktif</span>
											<?php else:?>
												<span class="text-bold text-danger">Non-Aktif</span>
											<?php endif;?>
										</td>
										<td>
                                            <span data-toggle="tooltip" data-placement="top" title="Detail">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#detail<?= $r['id_role']?>">
                                                    <i class="fas fa-fw fa-info"></i>
                                                </button>
                                            </span>
                                            
                                            <?php if ( $r['status_role'] == 1) :?>
                                            <span data-toggle="tooltip" data-placement="top" title="Ubah">
												<button type="button" class="btn btn-warning ml-1 btn-sm" data-toggle="modal"
													data-target="#ubahrole<?= $r['id_role']?>">
													<i class="fas fa-fw fa-pen"></i>
												</button>
                                            </span>
                                            <?php else:?>
                                                <button type="button" class="btn btn-warning ml-1 btn-sm" disabled>
													<i class="fas fa-fw fa-pen"></i>
												</button>
                                            <?php endif;?>

                                            <?php if ( $r['id_role'] != 1 && $r['id_role'] != 2 && $r['status_role'] == 1) :?>
                                                <span data-toggle="tooltip" data-placement="top" title="Nonaktifkan">
                                                    <a href="<?= base_url(); ?>pegawai/nonaktifkanRole/<?= $r['id_role']?>"
                                                        class="btn btn-danger ml-1 btn-sm tombol-hapus-role">
                                                        <i class="fas fa-fw fa-power-off"></i>
                                                    </a>
                                                </span>
                                            <?php else:?>
                                                <?php if ($r['status_role'] == 0) :?>
                                                <span data-toggle="tooltip" data-placement="top" title="Aktifkan">
                                                    <a href="<?= base_url(); ?>pegawai/aktifkanRole/<?= $r['id_role']?>"
                                                        class="btn btn-success ml-1 btn-sm tombol-aktifkan-role">
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

<!-- Modal Detail Jabatan -->
<?php foreach ($allRole as $r ) :?>
<div class="modal fade" id="detail<?= $r['id_role']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Jabatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Nama Jabatan</dt>
                    </div>
                    <div class="col-8">
                        <dd><?= $r['nama_role'];?></dd>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Status Jabatan</dt>
                    </div>
                    <div class="col-8">
                        <dd>
                            <?php if ( $r['status_role'] != 0 ) :?>
								<span class="text-success">Aktif</span>
							<?php else:?>
								<span class="text-danger">Telah Non-Aktif</span>
							<?php endif;?>
                        </dd>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-warning ml-1" data-toggle="modal"
                    data-target="#ubahrole<?= $r['id_role']?>">
                    <i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
                </button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<!-- Modal Tambah Jabatan -->
<div class="modal fade" id="tambah-role">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Jabatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('pegawai/tambahRole', array('id' => 'form-tambah-role', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama_role" class="col-sm-4 col-form-label">Nama Jabatan</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="nama_role" name="nama_role" placeholder="Nama Jabatan">
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

<!-- Modal Ubah Jabatan -->
<?php foreach ($allRole as $r ) :?>
<div class="modal fade" id="ubahrole<?= $r['id_role']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Jabatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('pegawai/ubahRole/'.$r['id_role'], array('id' => 'form-ubah-role', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama_role" class="col-sm-4 col-form-label">Nama Jabatan</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="nama_role" name="nama_role"
								placeholder="Nama Jabatan" value="<?= $r['nama_role']?>">
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