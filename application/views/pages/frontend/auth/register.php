<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb"
		 style="background-image: url('<?= base_url("myassets/kiddos/kiddos/") ?>images/bg_5.jpg');"
		 data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 py-5 px-md-5 bg-primary">
				<div class="heading-section heading-section-white ftco-animate mb-5">
					<h2 class="mb-4">Register Siwsa</h2>
					<?php if ($this->session->flashdata("message")): ?>
						<p class="text-danger"><b><?= $this->session->flashdata("message") ?></b></p>
					<?php else: ?>
						<p>Isikan Identitas Anda dibawah ini dengan Benar.</b></p>
					<?php endif; ?>
				</div>
				<form action="<?= base_url("auth/register_post") ?>" class="appointment-form ftco-animate"
					  method="post">
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" name="nis" class="form-control" placeholder="Nomor Induk Siswa" autofocus
								   autocomplete="off" required>
						</div>
						<div class="form-group ml-md-4">
							<input type="text" name="nama" class="form-control" placeholder="Nama lengkap"
								   autocomplete="off" required>
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<div class="form-field">
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="jk" id="" class="form-control"
											style="background: #1eaaf1 !important;">
										<option value="">Jenis Kelamin</option>
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group ml-md-4">
							<input type="tel" name="no_hp" class="form-control" placeholder="No Hp Orang Tua"
								   autocomplete="off" required>
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="alamat" id="" cols="30" rows="2" class="form-control"
									  placeholder="Alamat lengkap" autocomplete="off" required></textarea>
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Username"
								   autocomplete="off" required>
						</div>
						<div class="form-group ml-md-4">
							<input type="password" name="password" class="form-control" placeholder="Password" minlength="6"
								   required>
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group ml-md-4">
							<input type="submit" value="Daftar Sekarang" class="btn btn-secondary py-3 px-4">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
