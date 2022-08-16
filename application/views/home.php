<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Home - Sikabungah</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>/vendors/images/apple-touch-icon.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendors/styles/style-custom.css">
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img width="140" src="<?php echo base_url();?>/vendors/images/logo_sikabungah.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php require 'header.php';?>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30 animated fadeIn">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="<?php echo base_url();?>/vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Selamat datang <div class="weight-600 font-30 text-blue"><?php echo $login_name;?>!</div>
						</h4>
						<p class="font-18 max-width-600">Aplikasi SIKABUNGAH (Sistem Kehamilan Ibu dan Tumbuh Kembang Anak Sehat), yaitu aplikasi untuk memantau kesehatan, perkembangan dan pertumbuhan ibu hamil dan anaknya.</p>
					</div>
				</div>
			</div>

			<div class="product-wrap">
				<div class="product-list">
					<ul class="row">
						<li class="col-lg-4 col-md-6 col-sm-12">
							<div class="product-box">
								<div class="producct-img"><img src="vendors/images/product-img1.jpg" alt=""></div>
								<div class="product-caption">
									<h4><a href="<?php echo base_url('kehamilan');?>">Kehamilan</a></h4>
									<div class="price">
										<span>Menu proses dari pembuahan sampai kelahiran</span>
									</div>
									<a href="<?php echo base_url('kehamilan');?>" class="btn btn-outline-primary btn-block mt-3">Pilih Menu</a>
								</div>
							</div>
						</li>
						<li class="col-lg-4 col-md-6 col-sm-12">
							<div class="product-box">
								<div class="producct-img"><img src="vendors/images/product-img2.jpg" alt=""></div>
								<div class="product-caption">
									<h4><a href="<?php echo base_url('pascalahir');?>">Pasca Lahir</a></h4>
									<div class="price">
										<span>Menu untuk kondisi ibu setelah melahirkan</span>
									</div>
									<a href="<?php echo base_url('pascalahir');?>" class="btn btn-outline-primary btn-block mt-3">Pilih Menu</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			
		</div>
	</div>

	<?php require 'footer.php';?>

	<!-- js -->
	<script src="<?php echo base_url();?>/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/dashboard.js"></script>
</body>
</html>