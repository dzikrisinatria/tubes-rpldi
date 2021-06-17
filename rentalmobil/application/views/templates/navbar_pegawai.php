<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-0">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<!-- <li class="nav-item d-none d-sm-inline-block">
			<a href="index3.html" class="nav-link">Home</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="#" class="nav-link">Contact</a>
		</li> -->
	</ul>

	<!-- SEARCH FORM -->
	<!-- <form class="form-inline ml-3">
		<div class="input-group input-group-sm">
			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
			<div class="input-group-append">
				<button class="btn btn-navbar" type="submit">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
	</form> -->

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Notifications Dropdown Menu -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-bell"></i>
				<span class="badge badge-warning navbar-badge">15</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">15 Notifications</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-envelope mr-2"></i> 4 new messages
					<span class="float-right text-muted text-sm">3 mins</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-users mr-2"></i> 8 friend requests
					<span class="float-right text-muted text-sm">12 hours</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-file mr-2"></i> 3 new reports
					<span class="float-right text-muted text-sm">2 days</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
			</div>
		</li>
	</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-0">
	<!-- Brand Logo -->
	<a href="<?= base_url(); ?>pegawai/<?= ($pegawai['id_role'] == '1') ? 'pemimpin' : 'admin'; ?>" class="brand-link">
		<!-- <img src="<?= base_url('assets/');?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
			style="opacity: .8"> -->
        <span class="fas fa-car text-white fa-lg ml-3 mr-2"></span>
		<span class="brand-text font-weight-light"><strong><?= $appname; ?></strong></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/images/foto_profil/') . $pegawai['foto_profil']; ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= strtok($pegawai['nama'], " "); ?></a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<!-- <div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div> -->

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				
				<li class="nav-item">
					<a href="<?= base_url(); ?>pegawai/<?= ($pegawai['id_role'] == '1') ? 'pemimpin' : 'admin'; ?>" class="nav-link
                        <?= ($title == 'Dasbor') ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dasbor</p>
					</a>
				</li>

				<?php $menupegawai = ($title == 'Data Pegawai' || 
									  $title == 'Tambah Pegawai' || 
									  $title == 'Ubah Pegawai' ||
									  $title == 'Data Jabatan Pegawai');?>
                
				<li class="nav-item <?= $menupegawai ? 'menu-open' : ''; ?>">
					<a href="#" class="nav-link <?= $menupegawai ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Pegawai
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datapegawai" class="nav-link
                            <?= ($title == 'Data Pegawai' || $title == 'Ubah Pegawai') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Pegawai</p>
							</a>
						</li>
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datapegawai/tambah" class="nav-link
                            <?= ($title == 'Tambah Pegawai') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Pegawai</p>
							</a>
						</li>
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datapegawai/jabatan" class="nav-link
                            <?= ($title == 'Data Jabatan Pegawai') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Jabatan</p>
							</a>
						</li>
					</ul>
				</li>
                
				<?php $menucustomer = ($title == 'Data Customer' || 
									   $title == 'Verifikasi Customer' || 
									   $title == 'Ubah Customer'); ?>

                <li class="nav-item <?= $menucustomer ? 'menu-open' : ''; ?>">
					<a href="#" class="nav-link <?= $menucustomer ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-user"></i>
						<p>
							Customer
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datacustomer" class="nav-link
                            <?= ($title == 'Data Customer' || $title == 'Ubah Customer') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Customer</p>
							</a>
						</li>
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datacustomer/verifikasi" class="nav-link
                            <?= ($title == 'Verifikasi Customer') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Verifikasi Customer</p>
							</a>
						</li>
					</ul>
				</li>

                <?php $menumobil = ($title == 'Data Mobil' || 
									$title == 'Tambah Mobil' || 
									$title == 'Ubah Mobil' || 
									$title == 'Merk dan Seri Mobil' || 
									$title == 'Jenis Mobil'); ?>
                
				<li class="nav-item <?= $menumobil ? 'menu-open' : ''; ?>">
					<a href="#" class="nav-link <?= $menumobil ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-car-alt"></i>
						<p>
							Mobil
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datamobil" class="nav-link
                            <?= ($title == 'Data Mobil' || $title == 'Ubah Mobil') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Mobil</p>
							</a>
						</li>
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datamobil/tambah" class="nav-link
                            <?= ($title == 'Tambah Mobil') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Mobil</p>
							</a>
						</li>
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datamobil/merkseri" class="nav-link
                            <?= ($title == 'Merk dan Seri Mobil') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Merk dan Seri</p>
							</a>
						</li>
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datamobil/jenis" class="nav-link
                            <?= ($title == 'Jenis Mobil') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Jenis Mobil</p>
							</a>
						</li>
					</ul>
				</li>

				<?php $menutransaksi = ($title == 'Data Transaksi' || 
										$title == 'Tambah Transaksi' || 
										$title == 'Ubah Transaksi' || 
										$title == 'Data Metode Pembayaran'); ?>

                <li class="nav-item <?= $menutransaksi ? 'menu-open' : ''; ?>">
					<a href="#" class="nav-link <?= $menutransaksi ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-hand-holding-usd"></i>
						<p>
							Transaksi
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datatransaksi" class="nav-link
                            <?= ($title == 'Data Transaksi') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Transaksi</p>
							</a>
						</li>
						<li class="nav-item">
                            <a href="<?= base_url(); ?>pegawai/datatransaksi/metodebayar" class="nav-link
                            <?= ($title == 'Data Metode Pembayaran') ? 'active' : ''; ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Metode Pembayaran</p>
							</a>
						</li>
					</ul>
				</li>

                <li class="nav-item">
					<a href="<?= base_url(); ?>authPegawai/logout" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>Keluar</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
