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
							<h1 class="h3 m-0 text-gray-800">Update <?= $title ?></h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('buku') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('buku/actionUpdate') ?>" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="buku_id" value="<?= $buku['buku_id'] ?>" />
										<div class="form-row">
											<div class="form-group col-md-4">
												<label><strong>Kategori</strong></label>
												<select class="form-control" name="kategori_id" id="">
													<option value="<?= $buku['kategori_id'] ?>"><?= $buku['kategori_name'] ?></option>
													<?php foreach ($row as $kategori) : ?>
														<option value="<?= $kategori->kategori_id ?>"><?= $kategori->kategori_name ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group col-md-4">
												<label><strong>Judul</strong></label>
												<input type="text" value="<?= $buku['judul'] ?>" name="judul" placeholder="Masukkan Judul" class="form-control">
											</div>
											<div class="form-group col-md-4">
												<label><strong>Author</strong></label>
												<input type="text" value="<?= $buku['author'] ?>" name="author" placeholder="Masukkan Nama Penulis" class="form-control">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label><strong>Image</strong></label>
												<?php if ($buku['image'] != null) { ?>
													<div style="margin-bottom: 4px">
														<img width="50" height="50" src="<?= base_url('assets/img/') . $buku['image'] ?>" width="50%">
													</div>
												<?php } ?>
												<input type="file" name="image" placeholder="Masukkan Image" class="form-control">
											</div>
											<div class="form-group col-md-4">
												<label><strong>Deskripsi</strong></label>
												<input type="text" value="<?= $buku['deskripsi'] ?>" name="deskripsi" placeholder="Masukkan Deskripsi" class="form-control">
											</div>
											<div class="form-group col-md-4">
												<label><strong>Harga</strong></label>
												<input type="text" value="<?= $buku['harga'] ?>" name="harga" placeholder="Masukkan Harga" class="form-control">
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
