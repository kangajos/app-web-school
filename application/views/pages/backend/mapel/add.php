<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/mapel/create") ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Kode mapel</label>
				<input type="text" name="kode_mapel" class="form-control" required autofocus>
			</div>
			<div class="form-group">
				<label for="">Nama mapel*</label>
				<input type="text" name="nama_mapel" class="form-control" autocomplete="false" required>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
