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
	<div class="flash-data-data-customer" data-flashdata="<?= $this->session->flashdata('message_data_customer'); ?>"></div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-12">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-body">
							<table id="datacustomer" class="table table-bordered table-hover text-sm">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>No. HP</th>
										<th>NIK</th>
										<th>No. Sim</th>
										<th>Email</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allCustomer) ) :?>
									<tr>
										<td colspan="10">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allCustomer as $c ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $c['nama']?></td>
										<td><?= ($c['jenis_kelamin'] == 0) ? 'Pria' : 'Wanita'; ?></td>
										<td><?= $c['alamat']?></td>
										<td><?= $c['no_hp']?></td>
										<td><?= $c['nik']?></td>
										<td><?= $c['no_sim']?></td>
										<td><?= $c['email']?></td>
										<td>
											<?php if ( $c['status'] == 2 ) :?>
												<span class="text-bold text-success">Terverifikasi</span>
											<?php elseif ( $c['status'] == 1 ):?>
												<span class="text-bold text-danger">Belum Diverifikasi</span>
											<?php else:?>
												<span class="text-bold text-dark">Tidak Aktif</span>
											<?php endif;?>
										</td>
										<td>
                                            <span data-toggle="tooltip" data-placement="top" title="Detail">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#detail<?= $c['id_customer']?>">
                                                    <i class="fas fa-fw fa-info"></i>
                                                </button>
                                            </span>
											
                                            <?php if ( $c['status'] == 2) :?>
											<span data-toggle="tooltip" data-placement="top" title="Nonaktifkan">
                                                <a href="<?= base_url(); ?>customerData/nonaktifkanCustomer/<?= $c['id_customer']?>"
                                                    class="btn btn-danger ml-1 btn-sm tombol-nonaktifkan-customer">
                                                    <i class="fas fa-fw fa-power-off"></i>
                                                </a>
                                            </span>
											<?php elseif ( $c['status'] == 1) :?>
											<span data-toggle="tooltip" data-placement="top" title="Verifikasi">
                                                <a href="<?= base_url(); ?>customerData/verifikasiCustomer/<?= $c['id_customer']?>"
                                                    class="btn btn-success ml-1 btn-sm">
                                                    <i class="fas fa-fw fa-user-check"></i>
                                                </a>
                                            </span>
											<?php else:?>
											<span data-toggle="tooltip" data-placement="top" title="Aktifkan">
                                                <a href="<?= base_url(); ?>customerData/aktifkanCustomer/<?= $c['id_customer']?>"
                                                    class="btn btn-success ml-1 btn-sm tombol-aktifkan-customer">
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

<!-- Modal Detail Customer -->
<?php foreach ($allCustomer as $c ) :?>
<div class="modal fade" id="detail<?= $c['id_customer']?>">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Preview Data Customer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body flex d-flex justify-content-between">
				<div class="col">
					<div class="row">
						<div class="col">
							<img class="rounded bg-light" width="100%"
								src="<?= base_url('assets/images/foto_ktp/') . $c['foto_ktp']; ?>">
						</div>
						<div class="col">
							<img class="rounded bg-light" width="100%"
								src="<?= base_url('assets/images/foto_kk/') . $c['foto_kk']; ?>">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<img class="rounded bg-light" width="100%"
								src="<?= base_url('assets/images/foto_selfie_ktp/') . $c['foto_selfie_ktp']; ?>">
						</div>
						<div class="col">
							<img class="rounded bg-light" width="100%"
								src="<?= base_url('assets/images/foto_sim/') . $c['foto_sim']; ?>">
						</div>
					</div>
				</div>
				<div class="col ml-3">
					<div class="row mx-auto">
						<div class="col-3">
							<dt>Nama</dt>
						</div>
						<div class="col">
							<dd><?= $c['nama'];?></dd>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-3">
							<dt>Jenis Kelamin</dt>
						</div>
						<div class="col">
							<p><?= $c['jenis_kelamin'] == 0 ? 'Pria' : 'Wanita';?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-3">
							<dt>Alamat</dt>
						</div>
						<div class="col">
							<p><?= $c['alamat'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-3">
							<dt>Email</dt>
						</div>
						<div class="col">
							<p><?= $c['email'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-3">
							<dt>Nomor HP</dt>
						</div>
						<div class="col">
							<p><?= $c['no_hp'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-3">
							<dt>NIK</dt>
						</div>
						<div class="col">
							<p><?= $c['nik'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-3">
							<dt>Nomor SIM</dt>
						</div>
						<div class="col">
							<p><?= $c['no_sim'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-3">
							<dt>Status</dt>
						</div>
						<div class="col">
							<p>
								<?php if ( $c['status'] == 2 ) :?>
									<span class="text-bold text-success">Terverifikasi</span>
								<?php elseif ( $c['status'] == 1 ):?>
									<span class="text-bold text-danger">Belum Diverifikasi</span>
								<?php else:?>
									<span class="text-bold text-dark">Tidak Aktif</span>
								<?php endif;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<?php if ( $c['status'] == 1) :?>
				<span data-toggle="tooltip" data-placement="top" title="Aktifkan">
					<a href="<?= base_url(); ?>pegawai/aktifkanPegawai/<?= $c['id_customer']?>"
						class="btn btn-success ml-1 tombol-aktifkan-pegawai">
						<i class="fas fa-fw fa-user-check mr-2"></i>Verifikasi
					</a>
				</span>
				<?php endif;?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
