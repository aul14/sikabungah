<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Sikabungah</title>

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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendors/styles/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>src/plugins/animate/animate.min.css">
</head>
<body class="login-page" style="background-color: #fff !important">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="<?php echo base_url();?>">
					<img width="45" src="<?php echo base_url();?>/vendors/images/apple-touch-icon.png" alt="" class="mr-3">
					<h5 class="">SIKABUNGAH</h5>
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="<?php echo base_url();?>/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10 animated fadeIn">
						<center><img width="140" src="<?php echo base_url();?>/vendors/images/logo_sikabungah.png" class=""></center>
						<form class="mt-5" id="formlogin" method="POST" autocomplete="off">
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="perawat">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>Saya</span>
										Perawat
									</label>
									<label class="btn">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>Saya</span>
										Admin
									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block btn-login" type="button" value="LOGIN">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- alert modal -->
	<div class="modal fade" id="alert_modal_danger" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content bg-danger text-white">
				<div class="modal-body text-center">
					<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
					<p class="text_alert_danger">Testing alert modal</p>
					<button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>

	<!-- js -->
	<script src="<?php echo base_url();?>/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/layout-settings.js"></script>
	<script type="text/javascript">
		$('document').ready(function() {
			$(".btn-login").click(function(){
				var dataform = $("#formlogin").serialize();
	        	$.ajax({
	        		type        : "POST",
	        		url         : "<?php echo base_url('login/login_process')?>",
	        		dataType    : "JSON",
	        		data 		: dataform,
	        		beforeSend: function() {
	        			$(".btn-login").prop("disabled", true);
	        		},
	        		success: function(data) {
		        		$(".btn-login").prop("disabled", false);
	        			if (data.status === 1) {
		        			$("#formlogin")[0].reset();
		        			window.location.replace('<?php echo base_url();?>');
		        		}
		        		else {
		        			$(".text_alert_danger").html(data.message);
		        			$('#alert_modal_danger').modal('show');
		        		}
	        		}
	        	})
	        });

	        $('#username').keypress(function (e) {
				if (e.which == 13) {
					$('#password').focus();
				}
			});

			$('#password').keypress(function (e) {
				if (e.which == 13) {
					$(".btn-login").click();
				}
			});
		});
	</script>
</body>
</html>