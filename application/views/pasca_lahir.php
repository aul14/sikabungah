<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Pasca Lahir - Sikabungah</title>

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
	<link rel="stylesheet" type="text/css" href="src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/src/styles/style-custom.css">
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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header mb-30">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="row">
	                            <div class="col-12 col-sm-12 col-md-8">
	                                <div class="title">
										<h4>Pasca Lahir</h4>
									</div>
									<nav aria-label="breadcrumb" role="navigation" id="scroll_history">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
											<li class="breadcrumb-item active" aria-current="page">Pasca Lahir</li>
										</ol>
									</nav>
	                            </div>
	                            <div class="col-12 col-sm-12 col-md-4">
	                                <div class="text-right">
	                                    <a href="<?php echo base_url();?>" class="btn btn-primary"><i class="icon-copy dw dw-menu mr-2"></i>Back To Menu</a>
	                                </div>
	                            </div>
	                        </div>
						</div>
					</div>
				</div>

				<div class="row clearfix">
					<div class="col-md-6 col-sm-12 mb-30">
						<div class="pd-20 card-box mb-30">
							<div class="clearfix">
								<div class="pull-left">
									<h4 class="text-blue h4 mb-20">Search Pasien</h4>
								</div>
							</div>
							<div>
								<div class="form-group row p-0 m-0">
									<div class="col-sm-12 col-md-12">
										<div class="input-group custom">
											<div class="input-group-prepend custom">
												<div class="input-group-text" id="btnGroupAddon"><i class="icon-copy dw dw-search2"></i></div>
											</div>
											<input type="text" class="form-control" id="search_norm" name="search_norm" placeholder="Nomor Medical Record" aria-label="Nomor Medical Record" aria-describedby="btnGroupAddon" oninput="this.value = this.value.replace(/[^0-9]/g, '');" autocomplete="off">
											<button type="button" class="btn btn-primary ml-2 btn-search">Search</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="pd-20 card-box">
							<!-- detail pasien -->
							<div class="clearfix">
								<div class="pull-left">
									<h4 class="text-blue h4">Detail Pasien</h4>
									<p class="mb-30">Detail Pasien Pasca Lahir</p>
								</div>
							</div>
							<form id="form_detail_pasien" name="form_detail_pasien" method="POST">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Norm</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text" id="norm_pasien" name="norm_pasien" placeholder="Nomor Medical Record" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Tgl. Lahir</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" id="tgl_lahir_pasien" name="tgl_lahir_pasien" placeholder="Tanggal Lahir Pasien" type="text" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
									<div class="col-sm-12 col-md-10">
										<textarea class="form-control" id="alamat_pasien" name="alamat_pasien" readonly></textarea>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<h4 class="h4 text-blue">Histori Pemeriksaan Anak</h5>
							<p class="">Tampilan Data Histori Pemeriksaan Anak</p>
							<ul class="list-group list-group-flush mb-30">
								<li class="list-group-item py-2">
									<table width="100%" border="0" class="p-0 m-0">
										<tr>
											<td width="25%">Nama Anak</td>
											<td width="5%">:</td>
											<td><span class="nama_anak_histori font-weight-bold"> ... </span><span class="anakke_histori font-weight-light small"></span><input type="hidden" name="ibu_norm_anak_histori" id="ibu_norm_anak_histori" readonly></td>
										</tr>
									</table>
								</li>
								<li class="list-group-item py-2">
									<table width="100%" border="0" class="p-0 m-0">
										<tr>
											<td width="25%">Tanggal Lahir</td>
											<td width="5%">:</td>
											<td><span class="lahir_anak_histori"> ... </span></td>
										</tr>
									</table>
								</li>
								<li class="list-group-item py-2">
									<table width="100%" border="0" class="p-0 m-0">
										<tr>
											<td width="25%">Jenis Kelamin</td>
											<td width="5%">:</td>
											<td><span class="jekel_anak_histori"> ... </span></td>
										</tr>
									</table>
								</li>
							</ul>
							<table id="data_table_histori" class="data-table table stripe hover nowrap mb-3">
								<thead>
									<tr>
										<th class="text-center">Tanggal Periksa</th>
										<th class="text-center">Berat Badan</th>
										<th class="text-center">Tinggi Badan</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody id="tbody_history_periksa">
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="clearfix">
				<div class="row">
					<div class="col-12 col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box mb-30">
							<div class="row mb-30">
								<div class="col-md-9 col-sm-12">
									<h4 class="text-blue h4">Anak Pasien</h4>
									<p class="mb-0">Histori semua anak dari pasien</p>
								</div>
								<div class="col-md-3 col-sm-12 py-3 text-right">
									<button type="button" class="btn btn-primary btn-add-anak-modal" data-toggle="modal" data-target="#modal_add_anak"><i class="icon-copy fa fa-plus-square mr-2" aria-hidden="true"></i>Tambah Anak</button>
								</div>
							</div>
							<div class="pb-20">
								<table id="data_table" class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th class="table-plus datatable-nosort text-center">Anak Ke</th>
											<th>Nama</th>
											<th class="text-center">Tanggal Lahir</th>
											<th class="text-center">Jenis Kelamin</th>
											<th class="text-center">Create Date</th>
											<th class="datatable-nosort text-center">Action</th>
										</tr>
									</thead>
									<tbody id="tbody_anak">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php require 'footer.php';?>
		</div>
	</div>

	<!-- modal add anak -->
	<div class="modal fade" id="modal_add_anak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Tambah Anak</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form id="formddanak" method="POST" autocomplete="off">
						<input type="hidden" class="form-control form-control-lg" id="norm_add_anak" name="norm_add_anak" readonly>
						<label for="anak_ke">Anak ke</label>
						<div class="input-group custom mb-3">
							<input type="text" class="form-control form-control-lg" id="anak_ke" name="anak_ke" placeholder="Anak Keberapa" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-add-user"></i></span>
							</div>
						</div>
						<label for="nama_anak">Nama Anak</label>
						<div class="input-group custom mb-3">
							<input type="text" class="form-control form-control-lg" id="nama_anak" name="nama_anak" placeholder="Nama Anak" oninput="this.value = this.value.toUpperCase();this.value = this.value.replace(/[^a-zA-Z.\s]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
							</div>
						</div>
						<label for="tanggal_lahir">Tanggal Lahir</label>
						<div class="input-group custom mb-3">
							<input class="form-control date-picker" id="tanggal_lahir" name="tanggal_lahir" placeholder="Select Date" type="text">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-calendar-1"></i></span>
							</div>
						</div>
						<label for="nama_anak">Jenis Kelamin</label>
						<div class="select-role">
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn active">
									<input type="radio" name="jekel_anak" id="jekel_laki" value="L">
									<div class="icon"><i class="icon-copy fa fa-male fa-2x text-primary" aria-hidden="true"></i></div>
									<span>Anak</span>
									Laki-laki
								</label>
								<label class="btn">
									<input type="radio" name="jekel_anak" id="jekel_perem" value="P">
									<div class="icon"><i class="icon-copy fa fa-female fa-2x text-primary" aria-hidden="true"></i></div>
									<span>Anak</span>
									Perempuan
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<input class="btn btn-primary btn-lg btn-block mt-3 btn-add-anak" type="button" value="Simpan">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- modal periksa -->
	<div class="modal fade" id="modal_periksa_anak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Periksa Anak</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form id="formperiksaanak" method="POST" autocomplete="off">
						<input type="hidden" class="form-control form-control-lg" id="norm_periksa_anak" name="norm_periksa_anak" readonly>
						<input type="hidden" class="form-control form-control-lg" id="id_anak" name="id_anak" readonly>
						<input type="hidden" class="form-control form-control-lg" id="anak_ke_periksa" name="anak_ke_periksa" readonly>
						<label for="tanggal_periksa">Tanggal Periksa</label>
						<div class="input-group custom mb-3">
							<input class="form-control datetimepicker" id="tanggal_periksa" name="tanggal_periksa" placeholder="Select Date" type="text" value="<?php echo date('Y-m-d H:i:s');?>">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-calendar-1"></i></span>
							</div>
						</div>
						<label for="bb_anak">Berat badan Anak (Kg)</label>
						<div class="input-group custom mb-3">
							<input type="text" class="form-control form-control-lg" id="bb_anak" name="bb_anak" placeholder="Berat Badan Anak" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
							</div>
						</div>
						<label for="tb_anak">Tinggi badan Anak (Cm)</label>
						<div class="input-group custom mb-3">
							<input type="text" class="form-control form-control-lg" id="tb_anak" name="tb_anak" placeholder="Tinggi Badan Anak" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-user-3"></i></span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<input class="btn btn-primary btn-lg btn-block mt-3 btn-periksa-anak" type="button" value="Simpan">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- modal edit periksa -->
	<div class="modal fade" id="modal_edit_periksa_anak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Edit Pemeriksaan Anak</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form id="formeditperiksaanak" method="POST" autocomplete="off">
						<input type="hidden" class="form-control form-control-lg" id="id_edit_periksa" name="id_edit_periksa" readonly>
						<input type="hidden" class="form-control form-control-lg" id="edit_anakke_periksa" name="edit_anakke_periksa" readonly>
						<label for="tanggal_periksa">Tanggal Periksa</label>
						<div class="input-group custom mb-3">
							<input class="form-control" id="edit_tanggal_periksa" name="edit_tanggal_periksa" placeholder="Select Date" type="text" readonly>
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-calendar-1"></i></span>
							</div>
						</div>
						<label for="bb_anak">Berat badan Anak (Kg)</label>
						<div class="input-group custom mb-3">
							<input type="text" class="form-control form-control-lg" id="edit_bb_anak" name="edit_bb_anak" placeholder="Berat Badan Anak" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
							</div>
						</div>
						<label for="tb_anak">Tinggi badan Anak (Cm)</label>
						<div class="input-group custom mb-3">
							<input type="text" class="form-control form-control-lg" id="edit_tb_anak" name="edit_tb_anak" placeholder="Tinggi Badan Anak" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-user-3"></i></span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<input class="btn btn-primary btn-lg btn-block mt-3 btn-edit-periksa-anak" type="button" value="Update">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- chart modal -->
	<div class="modal fade bs-example-modal-lg" id="modal_chart_periksa_anak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 95%">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Grafik Pemeriksaan Anak</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="ibu_norm_anak_grafik" id="ibu_norm_anak_grafik" readonly>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-6">
							<div class="tab">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active text-primary" data-toggle="tab" href="#bb" role="tab" aria-selected="true">Berat Badan</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="bb" role="tabpanel">
										<div class="pd-20">
											<div class="text-right"><a id="btn_full_chart_bb" href="" class="btn btn-primary btn-sm" target="_blank"><i class="icon-copy ion-android-expand mr-2"></i>View Full Page</a></div>
											<img class="loading-chart" src="<?php echo base_url('src/images/chart.png');?>" alt="Loading..." style="height: 380px;display: block;padding: 8px;" />
											<iframe id="grafik_bb_anak" width="100%" scrolling="no" src="" style="border: none;height: 380px;display: none;"></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6">
							<div class="tab">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active text-primary" data-toggle="tab" href="#tb" role="tab" aria-selected="true">Tinggi Badan</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="tb" role="tabpanel">
										<div class="pd-20">
											<div class="text-right"><a id="btn_full_chart_tb" href="" class="btn btn-primary btn-sm" target="_blank"><i class="icon-copy ion-android-expand mr-2"></i>View Full Page</a></div>
											<img class="loading-chart" src="<?php echo base_url('src/images/chart.png');?>" alt="Loading..." style="height: 380px;display: block;padding: 8px;" />
											<iframe id="grafik_tb_anak" width="100%" scrolling="no" src="" style="border: none;height: 380px;display: none;"></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
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

	<div class="modal fade" id="alert_modal_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20">Form Submitted!</h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					<span class="text_alert_success">Testing alert modal</span>
				</div>
				<div class="modal-footer justify-content-center">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="alert_modal_success_interval" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20">Successfully!</h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					<span class="text_alert_success_interval">Testing alert modal</span>
				</div>
			</div>
		</div>
	</div>

	<!-- cofirm modal -->
	<div class="modal fade" id="modal_delete_periksa" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h4 class="padding-top-30 mb-30 weight-500">Yakin hapus data pemeriksaan?</h4>
					<input type="hidden" class="form-control form-control-lg" id="id_periksa" name="id_periksa" readonly>
					<input type="hidden" class="form-control form-control-lg" id="id_anak_del" name="id_anak_del" readonly>
					<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
						<div class="col-6">
							<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
							TIDAK
						</div>
						<div class="col-6">
							<button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn btn-confirm-del-ya" data-dismiss="modal"><i class="fa fa-check"></i></button>
							YA
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- js -->
	<script src="<?php echo base_url();?>/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url();?>/vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url();?>/src/plugins/datatables/js/vfs_fonts.js"></script>

	<script type="text/javascript">
		$('document').ready(function() {
			initiatDTableAnak();
			initiatDTableHistori();

			$("#form_detail_pasien")[0].reset();
			$(".btn-add-anak-modal").prop("disabled", true);

			$(".btn-search").click(function(){
				var norm = $("#search_norm").val();

	        	$.ajax({
	        		type        : "POST",
	        		url         : "<?php echo base_url('pascalahir/search_norm')?>",
	        		dataType    : "JSON",
	        		data 		: {norm : norm},
	        		beforeSend: function() {
	        			$(".btn-search").prop("disabled", true);
	        		},
	        		success: function(data) {
		        		$(".btn-search").prop("disabled", false);
		        		$(".btn-add-anak-modal").prop("disabled", false);
	        			if (data.status === 1) {
	        				$("#form_detail_pasien")[0].reset();
		        			$("#norm_pasien").val(data.response.rm);
		        			$("#norm_add_anak").val(data.response.rm);
		        			$("#norm_periksa_anak").val(data.response.rm);
		        			$("#ibu_norm_anak_histori").val(data.response.rm);
		        			$("#ibu_norm_anak_grafik").val(data.response.rm);
		        			$("#nama_pasien").val(data.response.name);
		        			$("#nama_ibu_anak_histori").text(data.response.name);
		        			$("#tgl_lahir_pasien").val(data.response.tgl_lahir);
		        			$("#alamat_pasien").val(data.response.alamat);
		        			$('#data_table').DataTable().clear();
							$('#data_table').DataTable().destroy();
							$('#tbody_anak tbody').empty();
		        			$("#tbody_anak").html(data.response.anak_html);

		        			initiatDTableAnak();

		        			$('.nama_anak_histori').text(" ... ");
	        				$('.lahir_anak_histori').text(" ... ");
	        				$('.jekel_anak_histori').text(" ... ");
	        				$('#data_table_histori').DataTable().clear();
							$('#data_table_histori').DataTable().destroy();
							$('#tbody_history_periksa tbody').empty();

		        			initiatDTableHistori();

		        			$(".text_alert_success_interval").html(data.message);
		        			$('#alert_modal_success_interval').modal('show');
		        			setInterval(function(){ 
		        				$('#alert_modal_success_interval').modal('hide');
							}, 1100);
		        		}
		        		else {
		        			$(".text_alert_danger").html(data.message);
		        			$('#alert_modal_danger').modal('show');
		        		}
	        		}
	        	})
	        });

	        $(".btn-add-anak").click(function(){
				var dataform = $("#formddanak").serialize();
	        	$.ajax({
	        		type        : "POST",
	        		url         : "<?php echo base_url('pascalahir/add_anak')?>",
	        		dataType    : "JSON",
	        		data 		: dataform,
	        		beforeSend: function() {
	        			$(".btn-add-anak").prop("disabled", true);
	        		},
	        		success: function(data) {
		        		$(".btn-add-anak").prop("disabled", false);
	        			if (data.status === 1) {
	        				$('#modal_add_anak').modal('hide');
		        			$(".text_alert_success").html(data.message);
		        			$('#alert_modal_success').modal('show');
		        			$('#data_table').DataTable().clear();
							$('#data_table').DataTable().destroy();
							$('#tbody_anak tbody').empty();
		        			$("#tbody_anak").html(data.anak_html);
		        			initiatDTableAnak();
							$("#formddanak")[0].reset();
							$(".select-role .btn").removeClass("active");
		        		}
		        		else {
		        			$(".text_alert_danger").html(data.message);
		        			$('#alert_modal_danger').modal('show');
		        		}
	        		}
	        	})
	        });

	        $(".btn-periksa-anak").click(function(){
				var dataform 		= $("#formperiksaanak").serialize();
				var anak_ke_periksa = $("#anak_ke_periksa").val();

				if (anak_ke_periksa === "") {
					$(".text_alert_danger").html("Data ID anak tidak ditemukan!");
			        $('#alert_modal_danger').modal('show');
				}
				else {
					$.ajax({
		        		type        : "POST",
		        		url         : "<?php echo base_url('pascalahir/periksa_anak')?>",
		        		dataType    : "JSON",
		        		data 		: dataform,
		        		beforeSend: function() {
		        			$(".btn-periksa-anak").prop("disabled", true);
		        		},
		        		success: function(data) {
			        		$(".btn-periksa-anak").prop("disabled", false);
		        			if (data.status === 1) {
		        				$('#modal_periksa_anak').modal('hide');
			        			$(".text_alert_success").html(data.message);
			        			$('#alert_modal_success').modal('show');

			        			$("#formperiksaanak")[0].reset();

			        			set_history(anak_ke_periksa);
			        		}
			        		else {
			        			$(".text_alert_danger").html(data.message);
			        			$('#alert_modal_danger').modal('show');
			        		}
		        		}
		        	})
				}
	        });

	        $(".btn-edit-periksa-anak").click(function(){
				var dataform = $("#formeditperiksaanak").serialize();
				$.ajax({
	        		type        : "POST",
	        		url         : "<?php echo base_url('pascalahir/update_periksa')?>",
	        		dataType    : "JSON",
	        		data 		: dataform,
	        		beforeSend: function() {
	        			$(".btn-edit-periksa-anak").prop("disabled", true);
	        		},
	        		success: function(data) {
		        		$(".btn-edit-periksa-anak").prop("disabled", false);
	        			if (data.status === 1) {
	        				$('#modal_edit_periksa_anak').modal('hide');
		        			$(".text_alert_success").html(data.message);
		        			$('#alert_modal_success').modal('show');

		        			$("#formeditperiksaanak")[0].reset();

		        			set_history(data.anak_ke);
		        		}
		        		else {
		        			$(".text_alert_danger").html(data.message);
		        			$('#alert_modal_danger').modal('show');
		        		}
	        		}
	        	})
	        });

	        $(".btn-confirm-del-ya").click(function(){
				var id_periksa 	= $("#id_periksa").val();
				var id_anak_del = $("#id_anak_del").val();

	        	$.ajax({
	        		type        : "POST",
	        		url         : "<?php echo base_url('pascalahir/delete_periksa')?>",
	        		dataType    : "JSON",
	        		data 		: {idperiksa : id_periksa, id_anak : id_anak_del},
	        		beforeSend: function() {
	        			$(".btn-confirm-del-ya").prop("disabled", true);
	        		},
	        		success: function(data) {
		        		$(".btn-confirm-del-ya").prop("disabled", false);
		        		console.log(data);
	        			if (data.status === 1) {
	        				$('#modal_delete_periksa').modal('hide');
		        			$(".text_alert_success_interval").html(data.message);
		        			$('#alert_modal_success_interval').modal('show');
		        			setInterval(function() { 
		        				$('#alert_modal_success_interval').modal('hide');
							}, 1100);

		        			set_history(id_anak_del);
		        		}
		        		else {
		        			$('#modal_delete_periksa').modal('hide');
		        			$(".text_alert_danger").html(data.message);
		        			$('#alert_modal_danger').modal('show');
		        		}
	        		}
	        	})
	        });

	        $('#search_norm').keypress(function (e) {
				if (e.which == 13) {
					$(".btn-search").click();
				}
			});
		});

		function set_periksa($id, $anak_ke) {
			$("#id_anak").val($id);
			$("#anak_ke_periksa").val($anak_ke);
			$("#edit_anakke_periksa").val($anak_ke);
			$("#tanggal_periksa").val("<?php echo date('Y-m-d H:i:s');?>");
		}

		function initiatDTableAnak() {
			$('#data_table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				destroy : true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: true,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search",
					paginate: {
						next: '<i class="ion-chevron-right"></i>',
						previous: '<i class="ion-chevron-left"></i>'  
					}
				},
			});
		}

		function initiatDTableHistori() {
			$('#data_table_histori').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				destroy : true,
				searching: false,
				order: [[0, 'desc']],
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: true,
				}],
				"lengthMenu": [[5, 15, 30, 60, 100, -1], [5, 15, 30, 60, 100, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search",
					paginate: {
						next: '<i class="ion-chevron-right"></i>',
						previous: '<i class="ion-chevron-left"></i>'  
					}
				},
			});
		}

		function set_history($id) {
			var normibu = $("#ibu_norm_anak_histori").val();
			$.ajax({
        		type        : "POST",
        		url         : "<?php echo base_url('pascalahir/history_periksa_anak')?>",
        		dataType    : "JSON",
        		data 		: {id : $id, norm : normibu},
        		beforeSend: function() {
        			// 
        		},
        		success: function(data) {
        			if (data.status === 1) {
        				$('.nama_anak_histori').text(data.name);
        				$('.anakke_histori').text(" - (anak ke " + data.anak_ke + ")");
        				$("#id_anak_del").val(data.anak_ke);
        				$("#edit_anakke_periksa").val(data.anak_ke);
        				$('.lahir_anak_histori').text(data.tgl_lahir);
        				$('.jekel_anak_histori').text(data.jenis_kelamin);
        				$('#data_table_histori').DataTable().clear();
						$('#data_table_histori').DataTable().destroy();
						$('#tbody_history_periksa tbody').empty();
	        			$("#tbody_history_periksa").html(data.history_html);
        				initiatDTableHistori();

        				$('html, body').animate({
					        scrollTop: $("#scroll_history").offset().top
					    }, 600);
	        		}
	        		else {
	        			$(".text_alert_danger").html(data.message);
	        			$('#alert_modal_danger').modal('show');
	        		}
        		}
        	})
		}

		function set_grafik($anak_ke, $jekel) {
			var normibu = $("#ibu_norm_anak_grafik").val();
			var loading_frame = "<?php echo base_url('src/images/chart.png');?>";

			if ($jekel === 1) {
				$jekel = 'L'
			}
			else {
				$jekel = 'P'
			}

			$("#btn_full_chart_bb").attr("href", "https://platform-reservasi.mirsahallo.com:8089/sikabungah/chart_bb.php?jk=" + $jekel + "&norm=" + normibu + "&anak_ke=" + $anak_ke + "");
			$("#btn_full_chart_tb").attr("href", "https://platform-reservasi.mirsahallo.com:8089/sikabungah/chart_tb.php?jk=" + $jekel + "&norm=" + normibu + "&anak_ke=" + $anak_ke + "");

			$("#grafik_bb_anak").attr("src", "https://platform-reservasi.mirsahallo.com:8089/sikabungah/chart_bb.php?jk=" + $jekel + "&norm=" + normibu + "&anak_ke=" + $anak_ke + "");
			$("#grafik_tb_anak").attr("src", "https://platform-reservasi.mirsahallo.com:8089/sikabungah/chart_tb.php?jk=" + $jekel + "&norm=" + normibu + "&anak_ke=" + $anak_ke + "");

			$(".loading-chart").show();
			$("#grafik_bb_anak").hide();
			$("#grafik_tb_anak").hide();

			setInterval(function(){ 
				$(".loading-chart").hide();
				$("#grafik_bb_anak").show();
				$("#grafik_tb_anak").show();
			}, 1500);

			$('#modal_chart_periksa_anak').modal('show');
		}

		function action_del_periksa($id) {
			$("#id_periksa").val($id);
			$('#modal_delete_periksa').modal('show');
		}

		function action_edit_periksa($id) {
			$("#id_edit_periksa").val($id);
			$.ajax({
        		type        : "POST",
        		url         : "<?php echo base_url('pascalahir/periksa_anak_by_idperiksa')?>",
        		dataType    : "JSON",
        		data 		: {idperiksa : $id},
        		beforeSend: function() {
        			// 
        		},
        		success: function(data) {
        			if (data.status === 1) {
        				$("#edit_tanggal_periksa").val(data.tanggal_priksa);
        				$("#edit_bb_anak").val(data.bb_anak);
        				$("#edit_tb_anak").val(data.tb_anak);
						$('#modal_edit_periksa_anak').modal('show');
	        		}
	        		else {
	        			$(".text_alert_danger").html(data.message);
	        			$('#alert_modal_danger').modal('show');
	        		}
        		}
        	})
		}
	</script>
</body>
</html>