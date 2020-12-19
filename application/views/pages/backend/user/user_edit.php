<div class="card">
	<div class="card-body">
		<form action="<?= base_url("admin/user/update") ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Full Name*</label>
				<input type="hidden" name="user_id" value="<?= $contents["user"]->user_id ?>" required>
				<input type="text" name="full_name" class="form-control" value="<?= $contents["user"]->full_name ?>"
					   required autofocus>
			</div>
			<div class="form-group">
				<label for="">Username*</label>
				<input type="text" name="username" class="form-control" value="<?= $contents["user"]->username ?>"
					   readonly required>
			</div>
			<div class="form-group">
				<label for="">New Password*</label>
				<input type="password" name="password1" class="form-control" autocomplete="false">
			</div>
			<div class="form-group">
				<label for="">Confirm Password*</label>
				<input type="password" name="password2" class="form-control" autocomplete="false">
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
