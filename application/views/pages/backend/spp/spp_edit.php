<div class="card">
	<div class="card-header bg-gradient-purple">
		<h3>NIS : <?=$contents["siswa"]->nis?><br>NAMA : <?=$contents["siswa"]->nama?> </h3>
	</div>
	<div class="card-body">
		<form action="<?= base_url("admin/spp/update") ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="spp_id" value="<?= $contents["spp"]->spp_id ?>" required>
			<input type="hidden" name="siswa_id" value="<?= $contents["spp"]->siswa_id ?>" required>
			<div class="form-group">
				<label for="">Jumlah Bayar (IDR)</label>
				<input type="number" name="jumlah" value="<?=$contents["spp"]->jumlah?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Catatan (opsional)</label>
				<textarea name="catatan" class="form-control" rows="3" placeholder="tulis catatan bila ada."><?=$contents["spp"]->catatan?></textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
				<button type="submit" name="simpan_sms" value="simpan_sms" class="btn btn-primary">Simpan & Kirim SMS</button>
			</div>
		</form>
	</div>
</div>
