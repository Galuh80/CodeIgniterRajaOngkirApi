<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('layouts/header'); ?>
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<?php $this->load->view('layouts/sidebar'); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<?php $this->load->view('layouts/topbar'); ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800">Insert <?= $title ?></h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('kategori') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form method="POST">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label><strong>Kode Kategori</strong></label>
												<input type="text" name="kategori_code" placeholder="Masukkan Kode Kategori" class="form-control">
												<?= form_error('kategori_code', '<small class="pl-3 text-danger">', '</small>'); ?>
											</div>
											<div class="form-group col-md-6">
												<label><strong>Nama Kategori</strong></label>
												<input type="text" name="kategori_name" placeholder="Masukkan Nama Kategori" class="form-control">
												<?= form_error('kategori_name', '<small class="pl-3 text-danger">', '</small>'); ?>
											</div>
										</div>
										<hr>
										<div class="form-group">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Reset</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->

	<!-- Footer -->
	<?php $this->load->view('layouts/footer'); ?>
	<!-- End of Footer -->

	</div>
	<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->
	<?php $this->load->view('layouts/scripts'); ?>
</body>

</html>
