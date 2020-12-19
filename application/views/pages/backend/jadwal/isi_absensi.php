<div class="card">
	<div class="card-body">
		<table>
			<tbody>
			<tr>
				<td>Kode/Kelas</td>
				<td>: <?= $absensi->kode_kelas ?>/<?= $absensi->nama_kelas ?></td>
			</tr>
			<tr>
				<td>Kode/Mapel</td>
				<td>: <?= $absensi->kode_mapel ?>/<?= $absensi->nama_mapel ?></td>
			</tr>
			<tr>
				<td>Jam Mapel</td>
				<td>: <?= date("H:i", strtotime($absensi->awal)) ?>
					- <?= date("H:i", strtotime($absensi->akhir)) ?></td>
			</tr>
			<tr>
				<td>Guru Pengampu</td>
				<td>: <?= $absensi->nama_guru ?> (<?= $absensi->no_hp ?>)</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
<form action="<?= isset($edit) ? base_url("admin/jadwal/save_absensi") : base_url("admin/jadwal/update_absensi") ?>"
	  method="post">
	<input type="hidden" name="kelas_id" value="<?= $absensi->kelas_id ?>">
	<input type="hidden" name="mapel_id" value="<?= $absensi->mapel_id ?>">
	<input type="hidden" name="mapel" value="<?= $absensi->nama_mapel?>">
	<input type="hidden" name="jadwal_id" value="<?= $absensi->jadwal_id ?>">
	<div class="card">
		<div class="card-header">
			Form Absensi Hari ini : <b><?= getDay(date("l")) ?>, <?= date("d-M-Y") ?></b>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped table-hover">
				<thead class="bg-purple">
				<tr>
					<th>#</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>L/P</th>
					<th>Absensi</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($detail_absensi as $key => $value) : ?>
					<tr>
						<td><?= ($key + 1) ?></td>
						<td><?= $value->nis ?></td>
						<td><?= $value->nama ?></td>
						<td><?= $value->jk ?></td>
						<td>
							<?php if (isset($value->absensi_id)): ?>
								<input type="hidden" name="absensi_id[]" value="<?= $value->absensi_id ?>" required>
							<?php endif; ?>
							<input type="hidden" name="siswa_id[]" value="<?= $value->siswa_id ?>" required>
							<input type="hidden" name="nama[]" value="<?= $value->nama ?>" required>
							<input type="hidden" name="no_hp[]" value="<?= $value->no_hp ?>" required>
							<?php $checked = isset($value->absensi) ? $value->absensi : "" ?>
							<select name="absensi[]" class="form-control">
								<option value="H" <?= $checked == "H" ? "selected" : "" ?>>Hadir</option>
								<option value="I" <?= $checked == "I" ? "selected" : "" ?>>Izin</option>
								<option value="A" <?= $checked == "A" ? "selected" : "" ?>>Alpa</option>
							</select>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
			<button type="submit" name="simpan_sms" value="simpan_sms" class="btn btn-info">Simpan & Kirim SMS</button>
		</div>
	</div>
</form>
