<div class="card">
	<div class="card-header">
		<a href="<?= base_url("admin/guru/add") ?>" class="btn btn-outline-primary">Add <i
				class="fa fa-plus"></i></a>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>L/P</th>
				<th>NoHP</th>
				<th>Alamat</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($contents["guru"] as $key => $value) : ?>
				<tr>
					<td><?= ($key+1)?></td>
					<td><?= $value->nip ?></td>
					<td><?= $value->nama_guru ?></td>
					<td><?= $value->jk ?></td>
					<td><?= $value->no_hp ?></td>
					<td><?= $value->alamat ?></td>
					<td>
						<a href="<?= base_url("admin/guru/edit/$value->guru_id") ?>" class="btn btn-info btn-sm"><i
								class="fa fa-edit"></i></a>&emsp;
						<a href="<?= base_url("admin/guru/delete/$value->guru_id") ?>" class="btn btn-danger btn-sm"
						   onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
