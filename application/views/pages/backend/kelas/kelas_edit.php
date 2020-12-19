<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/kelas/update") ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="kelas_id" value="<?= $contents["kelas"]->kelas_id ?>" required>
			<div class="form-group">
				<label for="">Kode Kelas</label>
				<input type="text" name="kode_kelas" value="<?= $contents["kelas"]->kode_kelas ?>" class="form-control"
					   required autofocus>
			</div>
			<div class="form-group">
				<label for="">Nama Kelas*</label>
				<select name="nama_kelas" id="" class="form-control select2" required>
					<option value="I" <?= $contents["kelas"]->nama_kelas == "I" ? "selected" : "" ?>>Kelas I</option>
					<option value="II" <?= $contents["kelas"]->nama_kelas == "II" ? "selected" : "" ?>>Kelas II</option>
					<option value="III" <?= $contents["kelas"]->nama_kelas == "III" ? "selected" : "" ?>>Kelas III
					</option>
					<option value="IV" <?= $contents["kelas"]->nama_kelas == "IV" ? "selected" : "" ?>>Kelas IV</option>
					<option value="V" <?= $contents["kelas"]->nama_kelas == "V" ? "selected" : "" ?>>Kelas V</option>
					<option value="VI" <?= $contents["kelas"]->nama_kelas == "VI" ? "selected" : "" ?>>Kelas VI</option>
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
