<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/kelas/create") ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Kode Kelas</label>
				<input type="text" name="kode_kelas" class="form-control" required autofocus>
			</div>
			<div class="form-group">
				<label for="">Nama Kelas*</label>
				<select name="nama_kelas" id="" class="form-control select2" required>
					<option value="I">Kelas I</option>
					<option value="II">Kelas II</option>
					<option value="III">Kelas III</option>
					<option value="IV">Kelas IV</option>
					<option value="V">Kelas V</option>
					<option value="VI">Kelas VI</option>
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
