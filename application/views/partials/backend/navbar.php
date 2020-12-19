<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-purple">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item">
			<a href="#" class="nav-link text-md"><?= isset($title) ? $title : "" ?></a>
		</li>
<!--		<li class="nav-item d-none d-sm-inline-block">-->
<!--			<a href="#" class="nav-link">Contact</a>-->
<!--		</li>-->
	</ul>

	<!-- SEARCH FORM -->
	<form class="form-inline ml-3">
<!--		<div class="input-group input-group-sm">-->
<!--			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">-->
<!--			<div class="input-group-append">-->
<!--				<button class="btn btn-navbar" type="submit">-->
<!--					<i class="fas fa-search"></i>-->
<!--				</button>-->
<!--			</div>-->
<!--		</div>-->
	</form>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Messages Dropdown Menu -->
		<li class="nav-item dropdown">
			<!--			<a class="nav-link" data-toggle="dropdown" href="#">-->
			<!--				<i class="far fa-comments"></i>-->
			<!--				<span class="badge badge-danger navbar-badge">3</span>-->
			<!--			</a>-->
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<a href="#" class="dropdown-item">
					<!-- Message Start -->
					<div class="media">
						<img src="<?= base_url('myassets/adminlte') ?>/dist/img/user1-128x128.jpg" alt="User Avatar"
							 class="img-size-50 mr-3 img-circle">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								Brad Diesel
								<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
							</h3>
							<p class="text-sm">Call me whenever you can...</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
					<!-- Message End -->
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<!-- Message Start -->
					<div class="media">
						<img src="<?= base_url('myassets/adminlte') ?>//dist/img/user8-128x128.jpg" alt="User Avatar"
							 class="img-size-50 img-circle mr-3">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								John Pierce
								<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
							</h3>
							<p class="text-sm">I got your message bro</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
					<!-- Message End -->
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<!-- Message Start -->
					<div class="media">
						<img src="<?= base_url('myassets/adminlte') ?>//dist/img/user3-128x128.jpg" alt="User Avatar"
							 class="img-size-50 img-circle mr-3">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								Nora Silvester
								<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
							</h3>
							<p class="text-sm">The subject goes here</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
					<!-- Message End -->
				</a>
				<!--				<div class="dropdown-divider"></div>-->
				<!--				<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>-->
			</div>
		</li>
		<!-- Notifications Dropdown Menu -->
		<li class="nav-item dropdown">
<!--		<li class="nav-item">-->
<!--			<button class="nav-link btn btn-outline-light btn-sm" onclick="window.history.back()">-->
<!--				<span class="fas fa-arrow-circle-left text-danger">&nbsp;Back</span>-->
<!--			</button>-->
		</li>
		<li class="nav-item">
			<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
				<i class="fas fa-th-large"></i>
			</a>
		</li>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">
				<i class="fa fa-user-edit"></i> Profil
			</a>
			<a href="#" class="dropdown-item">
				<i class="fa fa-envelope"></i> Pesan <sup class="badge badge-danger">3</sup>
			</a>
			<div class="dropdown-divider"></div>
			<a href="#" onclick="return confirm('Yakin ingin keluar ?')"
			   class="dropdown-item text-danger">
				<i class="fa fa-power-off"></i> Keluar ?
			</a>
		</div>
	</ul>
</nav>
<!-- /.navbar -->
