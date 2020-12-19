<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/guru/create") ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">NIP guru</label>
				<input type="text" name="nip" class="form-control" autocomplete="false" required>
			</div>
			<div class="form-group">
				<label for="">Nama guru</label>
				<input type="text" name="nama_guru" class="form-control" autocomplete="false" required>
			</div>
			<div class="form-group">
				<label for="">Jenis Kelamin</label>
				<select name="jk" id="" class="form-control select2" required>
					<option value="">Pilih</option>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">No HP</label>
				<input type="text" name="no_hp" class="form-control" autocomplete="false" required>
			</div>
			<div class="form-group">
				<label for="">Alamat Lenkap</label>
				<input type="text" name="alamat" class="form-control" autocomplete="false" required>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
