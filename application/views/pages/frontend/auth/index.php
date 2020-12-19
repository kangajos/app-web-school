<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb"
		 style="background-image: url('<?= base_url("myassets/kiddos/kiddos/") ?>images/bg_5.jpg');"
		 data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 py-5 px-md-5 bg-primary">
				<div class="heading-section heading-section-white ftco-animate mb-5">
					<h2 class="mb-4">Form Login Siswa</h2>
					<?php if ($this->session->flashdata("message")): ?>
						<p class="text-danger"><b><?= $this->session->flashdata("message") ?></b></p>
					<?php endif; ?>
				</div>
				<form action="<?=base_url("auth/login_siswa")?>" method="post" class="appointment-form ftco-animate">
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Username" required>
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password" required>
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group ml-md-4">
							<button type="submit" class="btn btn-secondary py-3 px-4">Login <span
									class="fa fa-lock-open"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
