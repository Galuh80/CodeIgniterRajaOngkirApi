<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Book Store Online</title>

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		.card-title {
			min-height: 50px;
		}

		.card-text {
			min-height: 20px;
		}
	</style>
</head>

<body>
	<div class="container">
		<br>
		<h2 align="center">Book Store</h2>
		<hr>
		<div class="row" id="load-data">
			<?php foreach ($row as $buku) : ?>
				<div class="col-sm-3 mb-3">
					<div class="card">
						<img width="254" height="300" src="<?= base_url('assets/img/') . $buku->image; ?>" class="card-image-top" alt="image">
						<div class="card-body">
							<h5 class="card-title"><?= $buku->judul ?></h5>
							<p class="card-text">Deskripsi : <?= $buku->deskripsi ?></p>
						</div>
						<div class="card-footer">
							<small class="text-muted">Harga : <?= $buku->harga ?></small>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<hr>
		<h4 align="center">Cek Ongkir</h4><br>
		<div class="form-group">
			<label for="from_province">Dari Provinsi </label>
			<select class="form-control" name="from_province" id="from_province">
				<option value="" selected="" disabled="">- Pilih Provinsi -</option>
				<?php $this->load->view('rajaongkir/getProvince2'); ?>
			</select>
		</div>
		<div class="form-group">
			<label for="from_city">Dari Kota </label>
			<select class="form-control" name="from_city" id="origin">
				<option value="" selected="" disabled="">- Pilih Kota-</option>
			</select>
		</div>
		<div class="form-group">
			<label for="to_province">Ke Provinsi </label>
			<select class="form-control" name="to_province" id="to_province">
				<option value="" selected="" disabled="">- Pilih Provinsi -</option>
				<?php $this->load->view('rajaongkir/getProvince'); ?>
			</select>
		</div>
		<div class="form-group">
			<label for="to_city">Ke Kota </label>
			<select class="form-control" name="destination" id="destination">
				<option value="" selected="" disabled="">- Pilih Kota -</option>
			</select>
		</div>
		<div class="form-group">
			<label for="courier">Kurir </label>
			<select class="form-control" name="courier" id="courier">
				<option value="">- Pilih Kurir -</option>
				<option value="jne">JNE</option>
				<option value="pos">POS</option>
				<option value="tiki">TIKI</option>
			</select>
		</div>
		<div class="form-group">
			<label for="weight">Berat (gram)</label>
			<input type="text" class="form-control" name="weight" id="weight" value="100">
		</div>
		<div class="form-group">
			<button type="button" onclick="tampil_data('data')" class="btn btn-success">Check In</button>
		</div>
		<div class="panel-heading">
			<h3 class="panel-title">Delivery Payment List</h3>
		</div>
		<div class="panel-body">
			<div id="hasil"></div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">
		function tampil_data(act) {
			var origin = $('#origin').val();
			var destination = $('#destination').val();
			var weight = $('#weight').val();
			var courier = $('#courier').val();

			$.ajax({
				url: "welcome/getCost",
				type: "GET",
				data: {
					origin: origin,
					destination: destination,
					berat: weight,
					courier: courier
				},
				success: function(ajaxData) {
					$("#hasil").html(ajaxData);
				}
			});
		};

		$(document).ready(function() {
			$("#from_province").click(function() {
				$.post("<?= base_url(); ?>welcome/getCity/" + $('#from_province').val(), function(obj) {
					$('#origin').html(obj);
				});
			});

			$("#to_province").click(function() {
				$.post("<?= base_url(); ?>welcome/getCity/" + $('#to_province').val(), function(obj) {
					$('#destination').html(obj);
				});
			});
		});
	</script>
</body>

</html>
