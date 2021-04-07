<div class="site-mobile-menu site-navbar-target">
	<div class="site-mobile-menu-header">
		<div class="site-mobile-menu-close mt-3">
			<span class="icon-close2 js-menu-toggle"></span>
		</div>
	</div>
	<div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar site-navbar-target" role="banner">

	<div class="container">
		<div class="row align-items-center position-relative">

			<div class="col-3 ">
				<div class="site-logo">
					<a href="index.html"><span class="icon-car text-white pr-2"></span> <?= $appname; ?></a>
				</div>
			</div>

			<div class="col-9  text-right">
				<span class="d-inline-block d-lg-none"><a href="#"
						class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span
							class="icon-menu h3 text-white"></span></a></span>

				<nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
					<ul class="site-menu main-menu js-clone-nav ml-auto ">
						<?php if ($title == 'Beranda') :?><li class="active"><?php else : ?><li><?php endif; ?>
							<a href="<?= base_url(); ?>" class="nav-link">Beranda</a></li>
							
						<?php if ($title == 'Mobil') :?><li class="active"><?php else : ?><li><?php endif; ?>
							<a href="<?= base_url('customer/mobil'); ?>" class="nav-link">Mobil</a></li>

						<li><a href="<?= base_url(); ?>" class="nav-link">Tentang Kami</a></li>
						<li><a href="<?= base_url(); ?>" class="nav-link">Kontak</a></li>
						
                        <?php if ( $this->session->userdata('email') ) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                    <?= $customer['email']; ?></span>
                                    <!-- <img class="rounded-circle mx-2 bg-light" height="35px" width="35px"
                                        src="<?= base_url('assets/img/profile/') . $customer['foto']; ?>"> -->
                                    <img class="rounded-circle mx-2 bg-light" height="35px" width="35px"
                                        src="<?= base_url('assets/images/profilephoto.png')?>">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= base_url('customer/profile'); ?>">Akun Saya</a>
                                    <a class="dropdown-item" href="<?= base_url('customer/profile'); ?>">Riwayat Transaksi</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                                </div>
                            </li>
                        <?php else : ?>
                            <li><a href="<?= base_url('authCustomer'); ?>"><button type="button" class="btn btn-outline-light py-2 px-3">Masuk</button></a></li>
                            <li><a href="<?= base_url('authCustomer/register'); ?>" class="ml-auto"><button type="button" class="btn btn-primary py-2 px-3">Daftar</button></a></li>
                        <?php endif; ?>
					</ul>
				</nav>

			</div>


		</div>
	</div>

</header>
