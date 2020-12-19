<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-purple elevation-4">
	<!-- Brand Logo -->
	<a href="<?=base_url('')?>" class="brand-link bg-purple">
		<img src="<?=base_url("myassets/adminlte")?>/dist/img/AdminLTELogo.png"
			 alt="AdminLTE Logo"
			 class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text text-xs">SDN</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?=base_url('myassets/adminlte')?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Arminareka</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-header"><i class="fa fa-list"></i> Menu</li>
				<li class="nav-item">
					<a href="<?=base_url("admin/dashboard")?>" class="nav-link <?=$contents['active'] == 'dashboard' ? 'active' : ''?>">
						<i class="nav-icon fa fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url("admin/jadwal/absensi")?>" class="nav-link <?=$contents['active'] == 'absensi' ? 'active' : ''?>">
						<i class="nav-icon fa fa-book-reader"></i>
						<p>Absensi</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url("admin/kelas")?>" class="nav-link <?=$contents['active'] == 'kelas' ? 'active' : ''?>">
						<i class="nav-icon fa fa-book-reader"></i>
						<p>Kelas</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url("admin/mapel")?>" class="nav-link <?=$contents['active'] == 'mapel' ? 'active' : ''?>">
						<i class="nav-icon fa fa-book-reader"></i>
						<p>Mapel</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url("admin/jadwal")?>" class="nav-link <?=$contents['active'] == 'jadwal' ? 'active' : ''?>">
						<i class="nav-icon fa fa-book-reader"></i>
						<p>Jadwal Mapel</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url("admin/siswa")?>" class="nav-link <?=$contents['active'] == 'siswa' ? 'active' : ''?>">
						<i class="nav-icon fa fa-user-plus"></i>
						<p>Siswa</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url("admin/guru")?>" class="nav-link <?=$contents['active'] == 'guru' ? 'active' : ''?>">
						<i class="nav-icon fa fa-user-plus"></i>
						<p>Guru</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url("admin/user")?>" class="nav-link <?=$contents['active'] == 'user' ? 'active' : ''?>">
						<i class="nav-icon fa fa-user-plus"></i>
						<p>Admin</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url("auth/out")?>" class="nav-link" onclick="return confirm('Yakin ?')">
						<i class="nav-icon fa fa-power-off"></i>
						<p>Logout</p>
					</a>
				</li>
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
<!--				<li class="nav-header">STATISTIK</li>-->
<!--				<li class="nav-item">-->
<!--					<a href="#" class="nav-link">-->
<!--					<i class="nav-icon fa fa-chart-pie"></i>-->
<!--					<p>Dashboard</p>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="nav-header">PRODUK</li>-->
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=base_url("admin/gallery")?><!--" class="nav-link --><?//=$contents['active'] == 'gallery' ? 'active' : ''?><!--">-->
<!--						<i class="nav-icon fa fa-file-image"></i>-->
<!--						<p>Galery</p>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=base_url("admin/gallery")?><!--" class="nav-link --><?//=$contents['active'] == 'gallery' ? 'active' : ''?><!--">-->
<!--						<i class="nav-icon fa fa-file-image"></i>-->
<!--						<p>Galery</p>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=base_url("admin/news")?><!--" class="nav-link --><?//=$contents['active'] == 'news' ? 'active' : ''?><!--">-->
<!--						<i class="nav-icon fa fa-newspaper"></i>-->
<!--						<p>News</p>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=base_url("admin/package")?><!--" class="nav-link --><?//=$contents['active'] == 'package' ? 'active' : ''?><!--">-->
<!--						<i class="nav-icon fa fa-info"></i>-->
<!--						<p>Package</p>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=base_url("admin/price")?><!--" class="nav-link --><?//=$contents['active'] == 'price' ? 'active' : ''?><!--">-->
<!--						<i class="nav-icon fa fa-money-bill"></i>-->
<!--						<p>Price</p>-->
<!--					</a>-->
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=base_url("admin/testimonial")?><!--" class="nav-link --><?//=$contents['active'] == 'testimonial' ? 'active' : ''?><!--">-->
<!--						<i class="nav-icon fa fa-quote-left"></i>-->
<!--						<p>Testimonial</p>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=base_url("admin/about")?><!--" class="nav-link --><?//=$contents['active'] == 'about' ? 'active' : ''?><!--">-->
<!--						<i class="nav-icon fa fa-info-circle"></i>-->
<!--						<p>About Us</p>-->
<!--					</a>-->
<!--				</li>-->
				<li class="nav-header text-xs">SD Rahmat islamiyah MEDAN &copy;2019</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
