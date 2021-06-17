<div class="ftco-blocks-cover-1">
	<div class="ftco-cover-1 overlay innerpage"
		style="background-image: url('<?= base_url('assets/');?>images/car3.jpg')">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-6 text-center">
					<h1>Mobil Sewaan Kami</h1>
					<p>Berikut mobil berkualitas dari kami yang dapat Anda rasakan sensasinya</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="site-section bg-light">
	<div class="container">
		<div class="row">
			
			<?php foreach ($allMobil as $m):?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="item-1">
						<a href="#"><img src="<?= base_url('assets/');?>images/foto_mobil/<?= $m['foto_mobil'];?>"
							alt="Image" style="width:100%; height:230px; object-fit: cover;" class="img-fluid"></a>
						<div class="item-1-contents">
							<div class="text-center">
								<h3><a href="#"><?= $m['nama_merk']; ?> <?= $m['nama_seri']; ?></a></h3>
								<!-- <div class="rating">
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
								</div> -->
								<div class="rent-price"><span>Rp<?= number_format($m['harga'], 0,',','.'); ?>,-/</span>hari</div>
							</div>
							<ul class="specs">
								<li>
									<span>Tahun</span>
									<span class="spec"><?= $m['tahun']; ?></span>
								</li>
								<li>
									<span>Jenis</span>
									<span class="spec"><?= $m['nama_jenis']; ?></span>
								</li>
								<li>
									<span>Warna</span>
									<span class="spec"><?= $m['warna']; ?></span>
								</li>
							</ul>
							<div class="d-flex action">
								<a href="<?= base_url(); ?>/customer/penyewaan/" class="btn btn-primary">Sewa Sekarang</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>

			<!-- <div class="col-12">
				<span class="p-3">1</span>
				<a href="#" class="p-3">2</a>
				<a href="#" class="p-3">3</a>
				<a href="#" class="p-3">4</a>
			</div> -->
		</div>
	</div>
</div>

<div class="container site-section mb-5">
	<div class="row justify-content-center text-center">
		<div class="col-7 text-center mb-5">
			<h2>Langkah Penyewaan</h2>
			<p>Berikut merupakan beberapa langkah yang akan Anda lakukan untuk dapat mulai merental mobil</p>
		</div>
	</div>
	<div class="how-it-works d-flex">
		<div class="step">
			<span class="number"><span>01</span></span>
			<span class="caption">Pilih Waktu &amp; Mobil</span>
		</div>
		<div class="step">
			<span class="number"><span>02</span></span>
			<span class="caption">Bayar DP</span>
		</div>
		<div class="step">
			<span class="number"><span>03</span></span>
			<span class="caption">Datang ke Kantor</span>
		</div>
		<div class="step">
			<span class="number"><span>04</span></span>
			<span class="caption">Checkout</span>
		</div>
		<div class="step">
			<span class="number"><span>05</span></span>
			<span class="caption">Selesai</span>
		</div>

	</div>
</div>
