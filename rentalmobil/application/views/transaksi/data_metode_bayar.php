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
							data-toggle="modal" data-target="#tambah-metode">
							<i class="fas fa-fw fa-plus mr-1"></i>Tambah Metode</a>
					</div>
				</div>
				
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- SweetAlert -->
	<div class="flash-data-metode" data-flashdata="<?= $this->session->flashdata('message_metode'); ?>"></div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-7">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-body">
							<table id="datametodebayar" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Metode Pembayaran</th>
										<th>Status Metode</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allMetode) ) :?>
									<tr>
										<td colspan="3">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allMetode as $m ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $m['metode_pembayaran']?></td>
										<td>
											<?php if ( $m['status_metode'] == 1 ) :?>
												<span class="text-bold text-success">Tersedia</span>
											<?php else:?>
												<span class="text-bold text-danger">Tidak Tersedia</span>
											<?php endif;?>
										</td>
										<td>
                                            <span data-toggle="tooltip" data-placement="top" title="Detail">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#detail<?= $m['id_metode_bayar']?>">
                                                    <i class="fas fa-fw fa-info"></i>
                                                </button>
                                            </span>

											<?php if ( $m['status_metode'] == 1) :?>
                                            <span data-toggle="tooltip" data-placement="top" title="Ubah">
												<button type="button" class="btn btn-warning ml-1 btn-sm" data-toggle="modal"
													data-target="#ubahmetode<?= $m['id_metode_bayar']?>">
													<i class="fas fa-fw fa-pen"></i>
												</button>
                                            </span>
											<?php else:?>
                                                <button type="button" class="btn btn-warning ml-1 btn-sm" disabled>
													<i class="fas fa-fw fa-pen"></i>
												</button>
											<?php endif;?>
											
											<?php if ( $m['status_metode'] == 1) :?>
                                            <span data-toggle="tooltip" data-placement="top" title="Nonaktifkan">
                                                <a href="<?= base_url(); ?>transaksi/nonaktifkanMetodeBayar/<?= $m['id_metode_bayar']?>"
                                                    class="btn btn-danger ml-1 btn-sm tombol-nonaktifkan-metode">
                                                    <i class="fas fa-fw fa-power-off"></i>
                                                </a>
                                            </span>
											<?php else:?>
											<span data-toggle="tooltip" data-placement="top" title="Aktifkan">
											<a href="<?= base_url(); ?>transaksi/aktifkanMetodeBayar/<?= $m['id_metode_bayar']?>"
												class="btn btn-success ml-1 btn-sm tombol-aktifkan-metode">
												<i class="fas fa-fw fa-power-off"></i>
											</a>
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

<!-- Modal Detail Metode Pembayaran -->
<?php foreach ($allMetode as $m ) :?>
<div class="modal fade" id="detail<?= $m['id_metode_bayar']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Metode Pembayaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Nama Metode</dt>
                    </div>
                    <div class="col-8">
                        <dd><?= $m['metode_pembayaran'];?></dd>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Status</dt>
                    </div>
                    <div class="col-8">
                        <dd>
							<?php if ( $m['status_metode'] == 1 ) :?>
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
                    data-target="#ubahmetode<?= $m['id_metode_bayar']?>">
                    <i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
                </button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<!-- Modal Tambah Metode Pembayaran -->
<div class="modal fade" id="tambah-metode">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Metode Pembayaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('transaksi/tambahmetodebayar', array('id' => 'form-tambah-metode', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="metode_pembayaran" class="col-sm-4 col-form-label">Nama Metode</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran" placeholder="Nama Metode">
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

<!-- Modal Ubah Metode Pembayaran -->
<?php foreach ($allMetode as $m ) :?>
<div class="modal fade" id="ubahmetode<?= $m['id_metode_bayar']?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Metode Pembayaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('transaksi/ubahMetodeBayar/'.$m['id_metode_bayar'], array('id' => 'form-ubah-metode', 'role' => 'form'));?>
				<div class="modal-body">
					<div class="form-group row">
						<label for="metode_pembayaran" class="col-sm-4 col-form-label">Nama Metode</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran"
								placeholder="Metode Pembayaran" autofocus value="<?= $m['metode_pembayaran']?>">
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