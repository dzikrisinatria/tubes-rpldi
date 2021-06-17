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
						<a href="<?= base_url(); ?>pegawai/tambahPegawai">
							<button type="button" class="btn btn-sm btn-primary ml-1">
								<i class="fas fa-fw fa-plus mr-1"></i>Tambah Pegawai
							</button>
						</a>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- SweetAlert -->
	<div class="flash-data-pegawai" data-flashdata="<?= $this->session->flashdata('message_pegawai'); ?>"></div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-12">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-body">
							<table id="datapegawai" class="table table-bordered table-hover text-sm">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Jenis Kelamin</th>
										<th>Tanggal Lahir</th>
										<th>Alamat</th>
										<th>Email</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allPegawai) ) :?>
									<tr>
										<td colspan="9">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allPegawai as $p ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $p['nama']?></td>
										<td><?= $p['nama_role']?></td>
										<td><?= ($p['jenis_kelamin'] == 0) ? 'Pria' : 'Wanita'; ?></td>
										<td><?= date("d F Y", strtotime($p['tgl_lahir']))?></td>
										<td><?= $p['alamat']?></td>
										<td><?= $p['email']?></td>
										<td>
											<?php if ( $p['status'] == 1 ) :?>
												<span class="text-bold text-success">Aktif</span>
											<?php else:?>
												<span class="text-bold text-danger">Non-Aktif</span>
											<?php endif;?>
										</td>
										<td>
                                            <span data-toggle="tooltip" data-placement="top" title="Detail">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#detail<?= $p['id_pegawai']?>">
                                                    <i class="fas fa-fw fa-info"></i>
                                                </button>
                                            </span>
											
											<?php if ( $p['status'] == 1) :?>
                                            <span data-toggle="tooltip" data-placement="top" title="Ubah">
                                                <a href="<?= base_url(); ?>pegawai/editPegawai/<?= $p['id_pegawai']?>">
                                                    <button type="button" class="btn btn-warning ml-1 btn-sm">
                                                        <i class="fas fa-fw fa-pen"></i>
                                                    </button>
                                                </a>
                                            </span>
											<?php else:?>
                                                <button type="button" class="btn btn-warning ml-1 btn-sm" disabled>
													<i class="fas fa-fw fa-pen"></i>
												</button>
											<?php endif;?>

                                            <?php if ( $p['status'] == 1) :?>
											<span data-toggle="tooltip" data-placement="top" title="Nonaktifkan">
                                                <a href="<?= base_url(); ?>pegawai/nonaktifkanPegawai/<?= $p['id_pegawai']?>"
                                                    class="btn btn-danger ml-1 btn-sm tombol-nonaktifkan-pegawai">
                                                    <i class="fas fa-fw fa-power-off"></i>
                                                </a>
                                            </span>
											<?php else:?>
												<span data-toggle="tooltip" data-placement="top" title="Aktifkan">
                                                <a href="<?= base_url(); ?>pegawai/aktifkanPegawai/<?= $p['id_pegawai']?>"
                                                    class="btn btn-success ml-1 btn-sm tombol-aktifkan-pegawai">
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

<!-- Modal Detail Pegawai -->
<?php foreach ($allPegawai as $p ) :?>
<div class="modal fade" id="detail<?= $p['id_pegawai']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Pegawai</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <center>
                <img class="rounded-circle mx-2 mb-3 mt-2 bg-light" height="100px" width="100px"
                    src="<?= base_url('assets/images/foto_profil/') . $p['foto_profil']; ?>">
				<h5><?= $p['nama'];?></h5>
				<p><?= $p['nama_role'];?></p>
                </center>
                <hr>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Nama</dt>
                    </div>
                    <div class="col-8">
                        <dd><?= $p['nama'];?></dd>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Jenis Kelamin</dt>
                    </div>
                    <div class="col-8">
                        <p><?= $p['jenis_kelamin'] == 0 ? 'Pria' : 'Wanita';?></p>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Tanggal Lahir</dt>
                    </div>
                    <div class="col-8">
                        <p><?= date("d F Y", strtotime($p['tgl_lahir']));?></p>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Alamat</dt>
                    </div>
                    <div class="col-8">
                        <p><?= $p['alamat'];?></p>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Email</dt>
                    </div>
                    <div class="col-8">
                        <p><?= $p['email'];?></p>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Status</dt>
                    </div>
                    <div class="col-8">
                        <p>
							<?php if ( $p['status'] != 0 ) :?>
								<span class="text-success">Pegawai Aktif</span>
							<?php else:?>
								<span class="text-danger">Telah Non-Aktif</span>
							<?php endif;?>
						</p>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<?php if ( $p['status'] == 1) :?>
				<a href="<?= base_url(); ?>pegawai/editPegawai/<?= $p['id_pegawai']?>">
                    <button type="button" class="btn btn-warning ml-1">
                        <i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
                    </button>
                </a>
				<?php else:?>
				<a href="<?= base_url(); ?>pegawai/aktifkanPegawai/<?= $p['id_pegawai']?>"
					class="btn btn-success ml-1 tombol-aktifkan-pegawai">
					<i class="fas fa-fw fa-power-off mr-2"></i>Aktifkan Pegawai
				</a>
				<?php endif;?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
