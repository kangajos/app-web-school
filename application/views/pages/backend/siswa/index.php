<div class="card">
	<div class="card-header">
		<a href="<?= base_url("admin/siswa/add") ?>" class="btn btn-outline-primary">Add <i
				class="fa fa-plus"></i></a>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>NIS</th>
				<th>Nama</th>
				<th>L/P</th>
				<th>NoHP Ortu</th>
				<th>Alamat</th>
				<th>Username</th>
				<th>Kelas</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($contents["siswa"] as $user) : ?>
				<tr>
					<td><?= $user->nis ?></td>
					<td><?= $user->nama ?></td>
					<td><?= $user->jk ?></td>
					<td><?= $user->no_hp ?></td>
					<td><?= $user->alamat ?></td>
					<td><?= $user->username ?></td>
					<td><?= $user->nama_kelas ?> - <?= $user->kode_kelas ?></td>
					<td>
						<a href="<?= base_url("admin/siswa/edit/$user->siswa_id") ?>" class="btn btn-info btn-sm"><i
								class="fa fa-edit"></i></a>&emsp;
						<a href="<?= base_url("admin/siswa/delete/$user->siswa_id") ?>" class="btn btn-danger btn-sm"
						   onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
