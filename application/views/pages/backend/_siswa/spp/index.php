<div class="card">
	<div class="card-header">Informasi SPP</div>
	<div class="card-body table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>Tanggal Bayar</th>
				<th>Catatan</th>
				<th>Jumlah Bayar</th>
			</tr>
			</thead>
			<tbody>
			<?php $total = 0;
			foreach ($spp as $key => $value): ?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><?= $value->spp_created_at ?></td>
					<td><?= $value->catatan ?></td>
					<td>Rp <?= number_format($value->jumlah, 0, ",", ".") ?></td>
				</tr>
				<?php $total += $value->jumlah; endforeach; ?>
			</tbody>
			<tfooter>
				<tr class="bg-gradient-purple">
					<td colspan="3" align="right">Total Bayar</td>
					<td colspan="3">Rp <?= number_format($total, 0, ",", ".") ?></td>
				</tr>
			</tfooter>
		</table>
	</div>
</div>
