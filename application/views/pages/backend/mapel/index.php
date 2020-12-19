<div class="card">
	<div class="card-header">
		<a href="<?= base_url("admin/mapel/add") ?>" class="btn btn-outline-primary">Add <i
				class="fa fa-plus"></i></a>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>Kode mapel</th>
				<th>Nama mapel</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($contents["mapel"] as $key => $value) : ?>
				<tr>
					<td><?= ($key+1)?></td>
					<td><?= $value->kode_mapel ?></td>
					<td><?= $value->nama_mapel ?></td>
					<td>
						<a href="<?= base_url("admin/mapel/edit/$value->mapel_id") ?>" class="btn btn-info btn-sm"><i
								class="fa fa-edit"></i></a>&emsp;
						<a href="<?= base_url("admin/mapel/delete/$value->mapel_id") ?>" class="btn btn-danger btn-sm"
						   onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
