<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/guru/update") ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="guru_id" value="<?= $contents["guru"]->guru_id ?>" required>
			<div class="form-group">
				<label for="">NIP guru</label>
				<input type="text" name="nip" class="form-control" value="<?= $contents["guru"]->nip ?>" autocomplete="false" required>
			</div>
			<div class="form-group">
				<label for="">Nama guru</label>
				<input type="text" name="nama_guru" class="form-control" value="<?= $contents["guru"]->nama_guru ?>" autocomplete="false" required>
			</div>
			<div class="form-group">
				<label for="">Jenis Kelamin</label>
				<select name="jk" id="" class="form-control select2" required>
					<option value="">Pilih</option>
					<option value="L" <?= $contents["guru"]->jk == "L" ? "selected" : "" ?>>Laki-laki</option>
					<option value="P" <?= $contents["guru"]->jk == "P" ? "selected" : "" ?>>Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">No HP</label>
				<input type="text" name="no_hp" class="form-control" value="<?= $contents["guru"]->no_hp ?>" autocomplete="false" required>
			</div>
			<div class="form-group">
				<label for="">Alamat Lenkap</label>
				<input type="text" name="alamat" class="form-control" value="<?= $contents["guru"]->alamat ?>" autocomplete="false" required>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
