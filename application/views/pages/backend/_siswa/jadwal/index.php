<div class="card">
	<div class="card-header">
		Informasi Jadwal Mata Pelajaran
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>Kelas</th>
				<th>Mapel</th>
				<th>Guru</th>
				<th>Hari</th>
				<th>Jam</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($contents["jadwal"] as $key => $value) : ?>
				<tr>
					<td><?= ($key+1)?></td>
					<td>Kelas <?= $value->nama_kelas ?> - <?= $value->kode_kelas ?></td>
					<td><?= $value->nama_mapel ?></td>
					<td><?= $value->nama_guru ?></td>
					<td><?= $value->hari ?></td>
					<td><?= date("H:i", strtotime($value->awal)) ?> - <?= date("H:i", strtotime($value->akhir)) ?> </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
