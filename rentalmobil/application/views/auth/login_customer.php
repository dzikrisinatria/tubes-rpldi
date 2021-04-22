<div class="ftco-blocks-cover-1">
	<div class="ftco-cover-1 overlay" style="background-image: url('<?= base_url('assets/');?>images/car3.jpg')">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="feature-car-rent-box-1">
						
						<?= $this->session->flashdata('message'); ?>

						<h3>Selamat datang,</h3>
						<h6>Silahkan masuk untuk melanjutkan</h6>
						<form class="pt-3" action="" method="post">
							<div class="form-group row">
								<div class="form-group col">
									<label for="cf-1">Email</label>
									<input type="text" id="cf-1" placeholder="email@email.com" class="form-control">
								</div>
							</div>
							<div class="form-group row mt-n2">
								<div class="form-group col">
									<label for="cf-2">Password</label>
									<input type="password" id="cf-2" placeholder="Password"
										class="form-control">
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col d-flex align-items-center">
									<input style="width:100%" type="submit" value="Masuk" class="mx-auto btn btn-primary">
								</div>
							</div>
							<small class="text-dark d-flex align-items-center my-1 justify-content-center">atau</small>
							<div class="form-group row">
								<div class="col d-flex align-items-center">
									<input type="button" class="border-primary btn btn-outline-primary" style="width:100%;"
									onclick="location.href='<?= base_url('authCustomer/register'); ?>';" value="Daftar">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
