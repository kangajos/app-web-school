<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/spp/create") ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Nama Siswa</label>
				<select name="siswa_id" class="form-control select2" required>
					<option value="">---</option>
					<?php foreach ($siswa as $value): ?>
						<option value="<?= $value->siswa_id ?>"><?= $value->nama ?> - <?= $value->nis ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Jumlah Bayar (IDR)</label>
				<input type="number" name="jumlah" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Catatan (opsional)</label>
				<textarea name="catatan" class="form-control" rows="3" placeholder="tulis catatan bila ada."></textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
				<button type="submit" name="simpan_sms" value="simpan_sms" class="btn btn-primary">Simpan & Kirim SMS</button>
			</div>
		</form>
	</div>
</div>
