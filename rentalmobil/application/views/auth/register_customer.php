<div class="ftco-blocks-cover-1">
	<div class="ftco-cover-1 overlay" style="background-image: url('<?= base_url('assets/');?>images/car3.jpg')">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="feature-car-rent-box-1" style="width:32em;">
						<h3>Daftar Akun</h3>
						<h6>Silahkan isi form dengan data yang valid</h6>
						<form class="pt-3" action="" method="post">
							<div class="form-group row">
								<div class="form-group col">
									<label for="cf-1">Email</label>
									<input name="email" type="email" id="cf-1" placeholder="email@email.com" class="form-control">
								</div>
							</div>
							<div class="form-group row mt-n3">
                                <div class="form-group col"><label for="cf-2">Password</label></div>
                            </div>
                            <div class="form-group row" style="margin-top:-6%;">
                                <div class="form-group col">
                                    <input name="password" type="password" id="cf-2" placeholder="Password" class="form-control">
                                </div>
                                <div class="form-group col">
                                    <input type="password" id="cf-2" placeholder="Ketik Ulang Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mt-n3">
								<div class="form-group col">
									<label for="nama">Nama Lengkap (sesuai KTP)</label>
									<input name="nama" type="text" id="nama" placeholder="contoh:Amin Amiruddin" class="form-control">
								</div>
							</div>

							<!-- <div class="form-group row">
                                <div class="form-group col-3 d-flex align-items-center">
                                    <label for="cf-1">Jenis Kelamin</label></div>
                                <div class="form-group col">
                                    <select name="jenis_kelamin" id="" class="form-control">
                                        <option disabled selected>Pilih</option>
                                        <option value="1">Pria</option>
                                        <option value="0">Wanita</option>
                                    </select>
								</div>
							</div> -->

							<div class="form-group row mb-0">
								<div class="col d-flex align-items-center">
									<input style="width:100%" type="submit" value="Daftar"
										class="mx-auto btn btn-primary">
								</div>
							</div>
							<small class="text-dark d-flex align-items-center my-1 justify-content-center">atau</small>
							<div class="form-group row">
								<div class="col d-flex align-items-center">
									<input type="button" class="border-dark btn btn-outline-dark" style="width:100%;"
										onclick="location.href='<?= base_url('authCustomer'); ?>';" value="Masuk">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
