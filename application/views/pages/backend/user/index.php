<div class="card">
	<div class="card-header">
		<a href="<?= base_url("admin/user/add") ?>" class="btn btn-outline-primary">Add <i
				class="fa fa-plus"></i></a>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>Full Name</th>
				<th>Username</th>
				<th>Created</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($contents["user"] as $user) : ?>
				<tr>
					<td><?= $user->full_name ?></td>
					<td><?= $user->username ?></td>
					<td><?= $user->created_at ?></td>
					<td>
						<a href="<?= base_url("admin/user/edit/$user->user_id") ?>" class="btn btn-info btn-sm"><i
								class="fa fa-edit"></i></a>&emsp;
						<a href="<?= base_url("admin/user/delete/$user->user_id") ?>" class="btn btn-danger btn-sm"
						   onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
