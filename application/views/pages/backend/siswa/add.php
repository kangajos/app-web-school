<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/siswa/create") ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">NIS</label>
				<input type="text" name="nis" class="form-control" required autofocus>
			</div>
			<div class="form-group">
				<label for="">Nama Lengkap</label>
				<input type="text" name="nama" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Jenis Kelamin</label>
				<select name="jk" class="form-control select2" id="" required>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Kelas</label>
				<select name="kelas_id" class="form-control select2" id="" required>
					<option value="">----</option>
					<?php foreach ($kelas as $value): ?>
						<option value="<?= $value->kelas_id ?>"><?= $value->kode_kelas . "/" . $value->nama_kelas ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="">No HP Orang Tua</label>
				<input type="tel" name="no_hp" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Alamat Lengkap</label>
				<input type="text" name="alamat" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Username*</label>
				<input type="text" name="username" class="form-control" autocomplete="false" required>
			</div>
			<div class="form-group">
				<label for="">New Password*</label>
				<input type="password" name="password1" class="form-control" autocomplete="false" required>
			</div>
			<div class="form-group">
				<label for="">Confirm Password*</label>
				<input type="password" name="password2" class="form-control" autocomplete="false" required>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
