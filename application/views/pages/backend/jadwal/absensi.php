<div class="card">
	<div class="card-header">
		List Absensi Hari ini : <b><?= $this->input->get("hari") ? getDay($this->input->get("hari")) :  getDay(date("l")) ?>, <?= $this->input->get("hari") ? "" : date("d-M-Y") ?></b>
		<hr>
		<select name="hari" id="filter" class="form-control select2 w-25 float-right" onchange="filter()" required>
			<option value="">Filter Hari</option>
			<?php $hari = (object)array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); ?>
			<?php foreach ($hari as $value): ?>
				<option value="<?= $value ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="card-body table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>Kelas</th>
				<th>Mapel</th>
				<th>Guru</th>
				<th>Hari</th>
				<th>Jam</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($contents["jadwal"] as $key => $value) : ?>
				<tr>
					<td><?= ($key + 1) ?></td>
					<td><?= $value->nama_kelas ?></td>
					<td><?= $value->nama_mapel ?></td>
					<td><?= $value->nama_guru ?></td>
					<td><?= $value->hari ?></td>
					<td><?= date("H:i", strtotime($value->awal)) ?> - <?= date("H:i", strtotime($value->akhir)) ?> </td>
					<td>
						<a href="<?= base_url("admin/jadwal/isi_absensi/$value->jadwal_id/$value->kelas_id/$value->mapel_id") ?>"
						   class="btn btn-info btn-sm"><i
								class="fa fa-edit"></i> Isi Absensi</a>&emsp;
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	function filter() {
		var filter = document.getElementById("filter").value;
		if (filter != ""){
			window.location = "<?=base_url("admin/jadwal/absensi")?>?hari="+filter;
		}
	}
</script>
