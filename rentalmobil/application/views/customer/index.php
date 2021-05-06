
<!-- CTA -->
<?php if ( !$this->session->userdata('email') ) :?>
	<div class="ftco-blocks-cover-1">
		<div class="ftco-cover-1 overlay" style="background-image: url('<?= base_url('assets/');?>images/car3.jpg')">
			<div class="container">
				<div class="row align-items-center">
					<!-- <div class="col-lg-5">
						<div class="feature-car-rent-box-1">
							<h3>Range Rover S7</h3>
							<ul class="list-unstyled">
								<li>
									<span>Doors</span>
									<span class="spec">4</span>
								</li>
								<li>
									<span>Seats</span>
									<span class="spec">6</span>
								</li>
								<li>
									<span>Lugage</span>
									<span class="spec">2 Suitcase/2 Bags</span>
								</li>
								<li>
									<span>Transmission</span>
									<span class="spec">Automatic</span>
								</li>
								<li>
									<span>Minium age</span>
									<span class="spec">Automatic</span>
								</li>
							</ul>
							<div class="d-flex align-items-center bg-light p-3">
								<span>$150/day</span>
								<a href="contact.html" class="ml-auto btn btn-primary">Rent Now</a>
							</div>
						</div>
					</div> -->
					<!-- <div class="row"> -->
						<div class="col-lg-7 mt-n5 mb-0">
							<h1 class="text-white mb-4">Merental mobil kini menjadi lebih mudah!</h1>
							<h6 class="text-white mb-4">Kesulitan merental mobil? Tenang saja, dengan syarat yang mudah Anda sudah mulai <br>
							dapat merasakan sensasi berkendara. Tunggu apa lagi? Mulailah sekarang!</h6>
							<a href="<?= base_url('authCustomer/register'); ?>"><button type="button" class="btn btn-primary py-2 px-4 mt-2">Mulai Sekarang</button></a>
						</div>
					<!-- </div> -->
					<!-- <div class="row">
						<div class="col-lg-4">
							<div class="service-1">
								<span class="service-1-icon">
									<span class="flaticon-car-1"></span>
								</span>
								<div class="service-1-contents">
									<h3>Repair</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="service-1">
								<span class="service-1-icon">
									<span class="flaticon-traffic"></span>
								</span>
								<div class="service-1-contents">
									<h3>Car Accessories</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="service-1">
								<span class="service-1-icon">
									<span class="flaticon-valet"></span>
								</span>
								<div class="service-1-contents">
									<h3>Own a Car</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
								</div>
							</div>
						</div>
					</div>        -->
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<?php if ($customer['status'] == 2) :?>
		<div class="ftco-blocks-cover-1">
			<div class="ftco-cover-1 overlay" style="background-image: url('<?= base_url('assets/');?>images/car3.jpg')">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-7 mt-n5 mb-0">
							<h1 class="text-white mb-4">Lengkapi data diri Anda, <br>dan mulailah berkendara!</h1>
							<h6 class="text-white mb-4">Anda dapat mulai melengkapi data diri Anda dan melampirkan <br>dokumen-dokumen penting lainnya untuk dapat mulai berkendara.</h6>
							<a href="<?= base_url('authCustomer/register2'); ?>"><button type="button" class="btn btn-primary py-2 px-4 mt-2">Lengkapi Sekarang</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php elseif ($customer['status'] == 1) : ?>
		<div class="ftco-blocks-cover-1">
			<div class="ftco-cover-1 overlay" style="background-image: url('<?= base_url('assets/');?>images/car3.jpg')">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-7 mt-n5 mb-0">
							<h1 class="text-white mb-4">Lengkapi data diri Anda, <br>dan mulailah berkendara!</h1>
							<h6 class="text-white mb-4">Anda dapat mulai melengkapi data diri Anda dan melampirkan <br>dokumen-dokumen penting lainnya untuk dapat mulai berkendara.</h6>
							<a href="<?= base_url('authCustomer/register'); ?>"><button type="button" class="btn btn-primary py-2 px-4 mt-2">Lengkapi Sekarang</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<!-- Stok Mobil -->
<div class="site-section pt-0 pb-0 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-12">

				<form class="trip-form">
					<div class="row align-items-center mb-4">
						<div class="col-md-6">
							<h3 class="m-0">Stok Mobil</h3>
						</div>
						<div class="col-md-6 text-md-right">
							<span class="text-primary">32</span> <span>mobil tersedia</span></span>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
                        <span class="text-primary">10</span> <label for="cf-1">Honda</label>
							<!-- <input type="text" id="cf-1" placeholder="Your pickup address" class="form-control"> -->
						</div>
						<div class="form-group col-md-3">
                        <span class="text-primary">05</span> <label for="cf-2">Toyota</label>
							<!-- <input type="text" id="cf-2" placeholder="Your drop-off address" class="form-control"> -->
						</div>
						<div class="form-group col-md-3">
                            <span class="text-primary">05</span> <label for="cf-3">Mitsubishi</label>
							<!-- <input type="text" id="cf-3" placeholder="Your pickup address"
								class="form-control datepicker px-3"> -->
						</div>
						<div class="form-group col-md-3">
                            <span class="text-primary">05</span> <label for="cf-4">Daihatsu</label>
							<!-- <input type="text" id="cf-4" placeholder="Your pickup address"
								class="form-control datepicker px-3"> -->
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
                            <span class="text-primary">01</span> <label for="cf-1">Mercedez Benz</label>
						</div>
						<div class="form-group col-md-3">
                            <span class="text-primary">02</span> <label for="cf-2">BMW</label>
						</div>
						<div class="form-group col-md-3">
                            <span class="text-primary">02</span> <label for="cf-3">Nissan</label>
						</div>
						<div class="form-group col-md-3">
                            <span class="text-primary">02</span> <label for="cf-4">Audi</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<!-- <a href="<?= base_url('authCustomer/register'); ?>"><button type="button" class="btn btn-primary py-2 px-4 mt-2">Mulai Sekarang</button></a> -->
							<a href="<?= base_url('customer/mobil');?>"><button type="button" class="btn btn-primary">Lihat lebih detail</button></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Terpopuler -->
<div class="site-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h3>Terpopuler</h3>
				<p class="mb-4">Berikut beberapa mobil yang paling sering disewa oleh setiap pelanggan kami</p>
				<p>
					<a href="#" class="btn btn-primary custom-prev"><</a>
					<span class="mx-2">/</span>
					<a href="#" class="btn btn-primary custom-next">></a>
				</p>
			</div>
			<div class="col-lg-9">
				<div class="nonloop-block-13 owl-carousel">
					<div class="item-1">
						<a href="#"><img src="<?= base_url('assets/');?>images/img_1.jpg" alt="Image" class="img-fluid"></a>
						<div class="item-1-contents">
							<div class="text-center">
								<h3><a href="#">Audi RS7</a></h3>
								<div class="rating">
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
								</div>
								<div class="rent-price"><span>Rp500.000/</span>hari</div>
							</div>
							<ul class="specs">
								<li>
									<span>Doors</span>
									<span class="spec">4</span>
								</li>
								<li>
									<span>Seats</span>
									<span class="spec">5</span>
								</li>
								<li>
									<span>Transmission</span>
									<span class="spec">Automatic</span>
								</li>
								<li>
									<span>Minium age</span>
									<span class="spec">18 years</span>
								</li>
							</ul>
							<div class="d-flex action">
								<a href="contact.html" class="btn btn-primary">Sewa Sekarang</a>
							</div>
						</div>
					</div>

					<div class="item-1">
						<a href="#"><img src="<?= base_url('assets/');?>images/img_2.jpg" alt="Image" class="img-fluid"></a>
						<div class="item-1-contents">
							<div class="text-center">
								<h3><a href="#">BMW M2</a></h3>
								<div class="rating">
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
									<span class="icon-star text-warning"></span>
								</div>
								<div class="rent-price"><span>Rp250.000/</span>hari</div>
							</div>
							<ul class="specs">
								<li>
									<span>Doors</span>
									<span class="spec">2</span>
								</li>
								<li>
									<span>Seats</span>
									<span class="spec">2</span>
								</li>
								<li>
									<span>Transmission</span>
									<span class="spec">Automatic</span>
								</li>
								<li>
									<span>Minium age</span>
									<span class="spec">18 years</span>
								</li>
							</ul>
							<div class="d-flex action">
								<a href="contact.html" class="btn btn-primary">Sewa Sekarang</a>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<!-- Keunggulan Kami -->
<div class="site-section section-3" style="background-image: url('<?= base_url('assets/');?>images/hero_2.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-5">
				<h2 class="text-white">Keunggulan Kami</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="service-1">
					<span class="service-1-icon">
						<span class="flaticon-car-1"></span>
					</span>
					<div class="service-1-contents">
						<h3>Performa Baik</h3>
						<p>Kami dapat pastikan bahwa mobil yang kami sewakan selalu dalam performa terbaik</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-1">
					<span class="service-1-icon">
						<span class="flaticon-traffic"></span>
					</span>
					<div class="service-1-contents">
						<h3>Persyaratan Mudah</h3>
						<p>Dengan persyaratan yang mudah, Anda dapat menyewa mobil dari kami dengan lebih enak</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-1">
					<span class="service-1-icon">
						<span class="flaticon-valet"></span>
					</span>
					<div class="service-1-contents">
						<h3>Lepas Kunci</h3>
						<p>Demi kenyamanan Anda, mobil yang disewakan dapat kami berikan kuncinya kepada Anda</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Langkah Penyewaan -->
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

<!-- Testimoni Pelanggan -->
<div class="site-section bg-light">
	<div class="container">
		<div class="row justify-content-center text-center mb-5">
			<div class="col-7 text-center mb-5">
				<h2>Testimoni Pelanggan</h2>
				<p>Berikut kata mereka yang sudah pernah menyewa mobil pada perusahaan kami</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="testimonial-2">
					<blockquote class="mb-4">
						<p>"Mobilnya bagus, aksesoris yang disediakan juga lengkap, saya acungkan seribu jempol untuk pak Amin"</p>
					</blockquote>
					<div class="d-flex v-card align-items-center">
						<img src="<?= base_url('assets/');?>images/person_1.jpg" alt="Image" class="img-fluid mr-3">
						<span>Mahmud Mike</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="testimonial-2">
					<blockquote class="mb-4">
						<p>"Ketika mobil ku gas, musuh manalagi yang bakal cemas. ANJAY PRI PAYER PAPALE PAPALE"</p>
					</blockquote>
					<div class="d-flex v-card align-items-center">
						<img src="<?= base_url('assets/');?>images/person_2.jpg" alt="Image" class="img-fluid mr-3">
						<span>Ahmad Stanley</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="testimonial-2">
					<blockquote class="mb-4">
						<p>"Terima kasih, dengan meminjam mobil disini saya bisa menipu mertua saya kalau saya kaya"</p>
					</blockquote>
					<div class="d-flex v-card align-items-center">
						<img src="<?= base_url('assets/');?>images/person_3.jpg" alt="Image" class="img-fluid mr-3">
						<span>Mawar Rose</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
