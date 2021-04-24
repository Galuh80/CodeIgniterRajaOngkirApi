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
					<?= $this->session->flashdata('success'); ?>
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<a href="<?= base_url('kategori/insert') ?>" class="pull-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-sm text-white-50"></i> Tambah <?= $title; ?></a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th width="20px">No</th>
											<th>Kode Kategori</th>
											<th>Nama Kategori</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($row as $kategori) : ?>
											<tr>
												<td><strong><?= $no++; ?></strong></td>
												<td><strong><?= $kategori->kategori_code; ?></strong></td>
												<td><strong><?= $kategori->kategori_name; ?></strong></td>
												<td>
													<a href="<?= base_url('kategori/update/' . $kategori->kategori_id) ?>" class="btn btn-info btn-sm">Update</a>
													<a href="<?= base_url('kategori/delete/' . $kategori->kategori_id) ?>" onclick="return confirm('Apakah anda yakin hapus data ini?')" class="btn btn-danger btn-sm">Delete</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
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
