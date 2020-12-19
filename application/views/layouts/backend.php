<?php
$this->load->view("partials/backend/head", $contents);
$this->load->view("partials/backend/navbar");
$this->load->view("partials/backend/sidebar");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= isset($contents["title"]) ? ucwords($contents["title"]) : "" ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Menu</a></li>
						<li class="breadcrumb-item"><a href="#"><?=isset($contents["title"]) ? ucwords($contents["title"]) : ""?></a></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="container-fluid">
			<?php if ($this->session->flashdata("error")): ?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
					<?= $this->session->flashdata("error") ?>
				</div>
			<?php endif; ?>
			<?php if ($this->session->flashdata("success")): ?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-check"></i> Successfully!</h5>
					<?= $this->session->flashdata("success") ?>
				</div>
			<?php endif; ?>
			<?php
			// load result query here !!! //
			$this->load->view("pages/backend/" . $contents["page"], $contents);
			?>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view("partials/backend/footer");
?>
