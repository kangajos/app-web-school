<div class="card">
	<div class="card-header">Informasi SPP</div>
	<div class="card-body table-responsive">
		<form action="<?=base_url("siswa/setting/gantiKataSandi")?>" method="post">
			<div class="form-group">
				<label for="">Kata Sandi Lama</label>
				<input type="password" name="sandi_lama" class="form-control" autofocus required>
			</div>
			<div class="form-group">
				<label for="">Kata Sandi Baru</label>
				<input type="password" name="sandi_baru" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Konfirmasi Kata Sandi Baru</label>
				<input type="password" name="sandi_baru2" class="form-control" required>
			</div>
			<div class="form-group">
				<button type="reset" class="btn btn-danger">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
