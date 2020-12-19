<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/siswa/update") ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">NIS</label>
				<input type="hidden" name="siswa_id" value="<?= $contents["siswa"]->siswa_id ?>" required>
				<input type="text" name="nis" class="form-control" value="<?= $contents["siswa"]->nis ?>"
					   required autofocus>
			</div>
			<div class="form-group">
				<label for="">Nama Lengkap</label>
				<input type="text" name="nama" class="form-control" value="<?= $contents["siswa"]->nama ?>" required>
			</div>
			<div class="form-group">
				<label for="">Jenis Kelamin</label>
				<select name="jk" class="form-control select2" id="" required>
					<option value="L" <?= $contents["siswa"]->jk == "L" ? "selected" : "" ?>>Laki-laki</option>
					<option value="P" <?= $contents["siswa"]->jk == "P" ? "selected" : "" ?>>Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Kelas</label>
				<select name="kelas_id" class="form-control select2" id="" required>
					<?php foreach ($kelas as $value): ?>
						<option value="<?= $value->kelas_id ?>"
								<?= $contents["siswa"]->kelas_id == $value->kelas_id ? "selected" : "" ?>><?= $value->kode_kelas . "/" . $value->nama_kelas ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="">No HP Orang Tua</label>
				<input type="text" name="no_hp" value="<?= $contents["siswa"]->no_hp ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Alamat Lengkap</label>
				<input type="text" name="alamat" value="<?= $contents["siswa"]->alamat ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
