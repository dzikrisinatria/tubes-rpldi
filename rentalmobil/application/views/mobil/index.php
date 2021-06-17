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
						<a href="<?= base_url(); ?>pegawai/datamobil/tambah">
							<button type="button" class="btn btn-sm btn-primary ml-1">
								<i class="fas fa-fw fa-plus mr-1"></i>Tambah Mobil
							</button>
						</a>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- SweetAlert -->
	<div class="flash-data-mobil" data-flashdata="<?= $this->session->flashdata('message_data_mobil'); ?>"></div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-12">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-body">
							<table id="datamobil" class="table table-bordered table-hover text-sm">
								<thead>
									<tr>
										<th>No</th>
										<th>Seri</th>
										<th>Jenis</th>
										<th>Warna</th>
										<th>Tahun</th>
										<th>No. Plat</th>
										<th>No. Rangka</th>
										<th>No. Mesin</th>
										<th>Harga</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allMobil) ) :?>
									<tr>
										<td colspan="11">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allMobil as $m ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $m['nama_merk']?> <?= $m['nama_seri']?></td>
										<td><?= $m['nama_jenis']?></td>
										<td><?= $m['warna']?></td>
										<td><?= $m['tahun']?></td>
										<td><?= $m['plat_nomor']?></td>
										<td><?= $m['nomor_rangka']?></td>
										<td><?= $m['nomor_mesin']?></td>
										<td>Rp<?= number_format($m['harga'], 0,',','.'); ?>,-</td>
										<td>
											<?php if ($m['status_pinjaman'] == 2) : ?>
												<span class="text-success text-bold">Tersedia</span>
											<?php elseif ($m['status_pinjaman'] == 1) : ?>
												<span class="text-warning text-bold">Dirental</span>
											<?php else:?>
												<span class="text-danger text-bold">Tidak Tersedia</span>
											<?php endif; ?>
										</td>
										<td>
											<span data-toggle="tooltip" data-placement="top" title="Detail">
												<button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
													data-target="#detail<?= $m['id_mobil']?>">
													<i class="fas fa-fw fa-info"></i>
												</button>
											</span>

											<?php if ( $m['status_pinjaman'] == 1 || $m['status_pinjaman'] == 2) :?>
											<span data-toggle="tooltip" data-placement="top" title="Ubah">
												<a href="<?= base_url(); ?>pegawai/datamobil/ubah/<?= $m['id_mobil']?>">
													<button type="button" class="btn btn-warning btn-xs ml-1">
														<i class="fas fa-fw fa-pen"></i>
													</button>
												</a>
											</span>
											<?php else:?>
												<button type="button" class="btn btn-warning ml-1 btn-xs" disabled>
													<i class="fas fa-fw fa-pen"></i>
												</button>
											<?php endif;?>
											
											<?php if ( $m['status_pinjaman'] == 2) :?>
												<span data-toggle="tooltip" data-placement="top" title="Nonaktifkan">
													<a href="<?= base_url(); ?>mobil/nonaktifkanmobil/<?= $m['id_mobil']?>"
														class="btn btn-danger btn-xs tombol-nonaktifkan-mobil ml-1">
														<i class="fas fa-fw fa-power-off"></i>
													</a>
												</span>
											<?php elseif ($m['status_pinjaman'] == 0):?>

												<?php if ($m['status_merk'] == 1 && $m['status_seri'] == 1 && $m['status_jenis'] == 1):?>
													<span data-toggle="tooltip" data-placement="top" title="Aktifkan">
													<a href="<?= base_url(); ?>mobil/aktifkanmobil/<?= $m['id_mobil']?>"
														class="btn btn-success ml-1 btn-xs tombol-aktifkan-mobil">
														<i class="fas fa-fw fa-power-off"></i>
													</a>
												<?php else:?>
													<button type="button" class="btn btn-success ml-1 btn-xs" disabled>
														<i class="fas fa-fw fa-power-off"></i>
													</button>
												<?php endif;?>

											<?php else:?>
												<button type="button" class="btn btn-danger ml-1 btn-xs" disabled>
													<i class="fas fa-fw fa-power-off"></i>
												</button>
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

<!-- Modal Detail Mobil -->
<?php foreach ($allMobil as $m ) :?>
<div class="modal fade" id="detail<?= $m['id_mobil']?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Mobil</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body flex d-flex justify-content-between">
                <!-- <center>
                <img class="rounded-circle mx-2 mb-3 mt-2 bg-light" height="100px" width="100px"
                    src="<?= base_url('assets/images/foto_profil/') . $m['foto_profil']; ?>">
				<h5><?= $m['nama'];?></h5>
				<p><?= $m['nama_role'];?></p>
                </center>
                <hr> -->
				<div class="col-6">
					<div class="row">
						<img class="rounded bg-light" width="100%"
							src="<?= base_url('assets/images/foto_mobil/') . $m['foto_mobil']; ?>">
					</div>
				</div>
				<div class="col ml-2">
					<div class="row mx-auto">
						<div class="col-6">
							<dt>Seri Mobil</dt>
						</div>
						<div class="col-6">
							<dd><?= $m['nama_merk'];?> <?= $m['nama_seri'];?></dd>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-6">
							<dt>Jenis Mobil</dt>
						</div>
						<div class="col-6">
							<dd><?= $m['nama_jenis'];?></dd>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-6">
							<dt>Warna</dt>
						</div>
						<div class="col-6">
							<dd><?= $m['warna'];?></dd>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-6">
							<dt>Tahun Mobil</dt>
						</div>
						<div class="col-6">
							<p><?= $m['tahun'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-6">
							<dt>Nomor Plat</dt>
						</div>
						<div class="col-6">
							<p><?= $m['plat_nomor'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-6">
							<dt>Nomor Rangka</dt>
						</div>
						<div class="col-6">
							<p><?= $m['nomor_rangka'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-6">
							<dt>Nomor Mesin</dt>
						</div>
						<div class="col-6">
							<p><?= $m['nomor_mesin'];?></p>
						</div>
					</div>
					<div class="row mx-auto">
						<div class="col-6">
							<dt>Harga</dt>
						</div>
						<div class="col-6">
							<p>Rp<?= number_format($m['harga'], 0,',','.'); ?>,-</p>
						</div>
					</div>
				</div>
                <!-- <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Terdaftar Sejak</dt>
                    </div>
                    <div class="col-8">
                        <p><?= date('d F Y', $m['date_created']);?></p>
                    </div>
                </div> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<?php if ( $m['status_pinjaman'] == 2) :?>
				<a href="<?= base_url(); ?>pegawai/datamobil/ubah/<?= $m['id_mobil']?>">
                    <button type="button" class="btn btn-warning ml-1">
                        <i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
                    </button>
                </a>
				<?php elseif ( $m['status_pinjaman'] == 1) :?>
					<button type="button" class="btn btn-warning ml-1" disabled>
                        <i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
                    </button>
				<?php else:?>
					<?php if ($m['status_jenis'] == 0):?>
						<a href="<?= base_url(); ?>mobil/aktifkanjenismobil/<?= $m['id_jenis']?>"
							class="btn btn-success ml-1 tombol-aktifkan-jenis">
							<i class="fas fa-fw fa-power-off mr-2"></i>Aktifkan Jenis <?= $m['nama_jenis']?>
						</a>
					<?php elseif ($m['status_merk'] == 1 && $m['status_seri'] == 1) :?>
						<a href="<?= base_url(); ?>mobil/aktifkanmobil/<?= $m['id_mobil']?>"
							class="btn btn-success ml-1 tombol-aktifkan-mobil">
							<i class="fas fa-fw fa-power-off mr-2"></i>Aktifkan Mobil
						</a>
					<?php elseif ($m['status_merk'] == 0 && $m['status_seri'] == 0):?>
						<a href="<?= base_url(); ?>mobil/aktifkanmerkmobil/<?= $m['id_merk']?>"
							class="btn btn-success ml-1 tombol-aktifkan-merk">
							<i class="fas fa-fw fa-power-off mr-2"></i>Aktifkan Merk <?= $m['nama_merk']?>
						</a>
					<?php elseif ($m['status_merk'] == 1 && $m['status_seri'] == 0):?>
						<a href="<?= base_url(); ?>mobil/aktifkanserimobil/<?= $m['id_seri']?>"
							class="btn btn-success ml-1 tombol-aktifkan-seri">
							<i class="fas fa-fw fa-power-off mr-2"></i>Aktifkan Seri <?= $m['nama_merk']?> <?= $m['nama_seri'];?>
						</a>
					<?php endif;?>
				<?php endif;?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
