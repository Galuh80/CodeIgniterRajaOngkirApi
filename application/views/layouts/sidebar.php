<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Dashboard</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('home') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Tables -->
	<li class="nav-item <?= $aktif == 'kategori' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('kategori') ?>">
			<i class="fas fa-fw fa-folder"></i>
			<span>Kategori</span></a>
	</li>

	<!-- Nav Item - Tables -->
	<li class="nav-item <?= $aktif == 'buku' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('buku') ?>">
			<i class="fas fa-fw fa-book"></i>
			<span>Buku</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
