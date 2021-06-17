<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title; ?></h1>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- SweetAlert -->
	<div class="flash-data-data-transaksi" data-flashdata="<?= $this->session->flashdata('message-data-transaksi'); ?>"></div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-12">
					<!-- Horizontal Form -->
					<div class="card shadow-sm" style="border-radius:10px;">
						<div class="card-body">
							<table id="datapegawai" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>Email</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( empty($allTransaksi) ) :?>
									<tr>
										<td colspan="7">
											<div class="alert alert-default text-center" role="alert">
												Tidak ada data apapapun.
											</div>
										</td>
									</tr>
									<?php endif; ?>
									<?php $no=1; foreach ($allTransaksi as $t ) :?>
									<?php if ( $t['status'] != 0 ) :?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $t['nama']?></td>
										<td><?= $t['nama_role']?></td>
										<td><?= ($t['jenis_kelamin'] == 0) ? 'Pria' : 'Wanita'; ?></td>
										<td><?= $t['alamat']?></td>
										<td><?= $t['email']?></td>
										<td>
                                            <span data-toggle="tooltip" data-placement="top" title="Detail">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#detail<?= $t['id_pegawai']?>">
                                                    <i class="fas fa-fw fa-info"></i>
                                                </button>
                                            </span>

                                            <span data-toggle="tooltip" data-placement="top" title="Ubah">
                                                <a href="<?= base_url(); ?>pegawai/editPegawai/<?= $t['id_pegawai']?>">
                                                    <button type="button" class="btn btn-warning ml-1 btn-sm">
                                                        <i class="fas fa-fw fa-pen"></i>
                                                    </button>
                                                </a>
                                            </span>

                                            <span data-toggle="tooltip" data-placement="top" title="Hapus">
                                                <a href="<?= base_url(); ?>pegawai/hapusPegawai/<?= $t['id_pegawai']?>"
                                                    class="btn btn-danger ml-1 btn-sm tombol-hapus">
                                                    <i class="fas fa-fw fa-trash-alt"></i>
                                                </a>
                                            </span>

										</td>
									</tr>
									<?php endif; ?>
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

<!-- Modal Detail Transaksi -->
<?php foreach ($allTransaksi as $t ) :?>
<div class="modal fade" id="detail<?= $t['id_pegawai']?>">
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
                <!-- <div class="row mx-auto">
                    <div class="col-4">
                        <dt>Terdaftar Sejak</dt>
                    </div>
                    <div class="col-8">
                        <p><?= date('d F Y', $p['date_created']);?></p>
                    </div>
                </div> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<a href="<?= base_url(); ?>pegawai/editPegawai/<?= $p['id_pegawai']?>">
                    <button type="button" class="btn btn-warning ml-1">
                        <i class="fas fa-fw fa-pen mr-1"></i>Ubah Data
                    </button>
                </a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
