<div class="container h-100">
		<div class="row h-100 justify-content-center align-items-center">
			<div class="col-10 col-md-8 col-lg-5">
				<div class="card o-hidden border-0 p-2" style="border-radius:20px;">
					<div class="card-body">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4 mt-2">Login Pegawai</h1>
						</div>
						
						<?= $this->session->flashdata('message'); ?>

						<form action="<?= base_url('authPegawai');?>" method="post">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>"
								id="email" name="email" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>"
								id="password" name="password">
								<?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary form-control mt-2">Login</button>
							</div>
							<!-- <hr>
							<div class="text-center">
								<a class="small" href="<?= base_url('auth/register'); ?>">Belum memiliki akun? Silahkan <b>Daftar!</b></a>
							</div> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
