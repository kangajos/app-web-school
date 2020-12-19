<div class="card">
	<div class="card-header">
		<a href="<?= base_url("admin/spp/add") ?>" class="btn btn-outline-primary">Add <i
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
				<th>Bayar</th>
				<th>Catatan</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($contents["spp"] as $key => $value) : ?>
				<tr>
					<td><?= ($key+1)?></td>
					<td><?= $value->nis ?></td>
					<td><?= $value->nama?></td>
					<td><?= $value->jk ?></td>
					<td><?= $value->no_hp ?></td>
					<td><?= number_format($value->jumlah, 0, ",", "." ) ?></td>
					<td><?= $value->catatan ?></td>
					<td>
						<a href="<?= base_url("admin/spp/edit/$value->spp_id") ?>" class="btn btn-info btn-sm"><i
								class="fa fa-edit"></i></a>&emsp;
						<a href="<?= base_url("admin/spp/delete/$value->spp_id") ?>" class="btn btn-danger btn-sm"
						   onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
