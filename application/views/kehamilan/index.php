<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Kehamilan - Sikabungah</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>vendors/images/apple-touch-icon.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/styles/style-custom.css">

    <style>
        .modal-body {
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }

        .group-span {
            border-top: 1px solid #d4d4d4;
            border-bottom: 1px solid #d4d4d4;
            border-right: 1px solid #d4d4d4;
        }
    </style>
</head>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img width="140" src="<?= base_url(); ?>vendors/images/logo_sikabungah.png" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-left">
            <img width="45" src="<?php echo base_url(); ?>/vendors/images/apple-touch-icon.png" alt="" class="ml-5 mr-3">
            <h5 class="">SIKABUNGAH</h5>
        </div>
        <div class="header-right">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?php echo base_url(); ?>/vendors/images/photo1.jpg" alt="">
                        </span>
                        <span class="user-name text-capitalize"><?php echo $login_name; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
            <div class="github-link">
                <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>/vendors/images/github.svg" alt=""></a>
            </div>
        </div>
    </div>


    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="page-header mb-30">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-8">
                                <div class="title">
                                    <h4>Kehamilan</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation" id="scroll_history">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Kehamilan</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="text-right">
                                    <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="icon-copy dw dw-menu mr-2"></i>Back To Menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix mb-30">
                <div class="col-md-6 col-sm-12">
                    <div class="card-box pd-20 mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4 mb-20">Search Pasien</h4>
                            </div>
                        </div>
                        <form class="form-inline form-search-norm" method="POST" action="">
                            <div class="form-group row p-0 m-0 w-100">
                                <div class="col-sm-12 col-md-12">
                                    <div class="input-group custom">
                                        <div class="input-group-prepend custom">
                                            <div class="input-group-text" id="btnGroupAddon"><i class="icon-copy dw dw-search2"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="norm_cari" name="norm_cari" placeholder="Nomor Medical Record" aria-label="Nomor Medical Record" aria-describedby="btnGroupAddon" oninput="this.value = this.value.replace(/[^0-9]/g, '');" autocomplete="off">
                                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="pd-20 card-box">
                        <!-- detail pasien -->
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Detail Pasien</h4>
                                <p class="mb-30">Detail Pasien Kehamilan</p>
                            </div>
                        </div>
                        <form id="form_detail_pasien" class="form">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Norm</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" readonly placeholder="Nomor Medical Record" name="norm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" readonly placeholder="Nama Pasien" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tgl. Lahir</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" readonly placeholder="Tanggal Lahir Pasien" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="alamat" id="alamat" class="form-control" readonly></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card-box pd-20 height-100-p mb-30">
                        <h4 class="h4 text-blue">Histori Pemeriksaan</h5>
                            <p class="">Tampilan Data Histori Pemeriksaan</p>
                            <ul class="list-group list-group-flush mb-30">
                                <li class="list-group-item py-2">
                                    <table width="100%" border="0" class="p-0 m-0">
                                        <tr>
                                            <td width="25%">Nama</td>
                                            <td width="5%">:</td>
                                            <td><span class="nama_histori font-weight-bold"> ... </span></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="list-group-item py-2">
                                    <table width="100%" border="0" class="p-0 m-0">
                                        <tr>
                                            <td width="25%">Tanggal Lahir</td>
                                            <td width="5%">:</td>
                                            <td><span class="tgl_lahir_histori"> ... </span></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="list-group-item py-2">
                                    <table width="100%" border="0" class="p-0 m-0">
                                        <tr>
                                            <td width="25%">Alamat</td>
                                            <td width="5%">:</td>
                                            <td><span class="alamat_histori"> ... </span></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                            <div class="">
                                <div class="tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-primary" data-toggle="tab" href="#histori_per_ibu" role="tab" aria-selected="true">Ibu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-blue" data-toggle="tab" href="#histori_per_anak" role="tab" aria-selected="false">Anak</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="histori_per_ibu" role="tabpanel">
                                            <div class="pd-20">
                                                <table id="data_table_periksa" class="data-table table stripe hover nowrap" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class='text-center'>Tgl. Periksa</th>
                                                            <th class='text-center'>Minggu Kehamilan</th>
                                                            <th class='text-center'>Berat Badan</th>
                                                            <th class='text-center'>Tinggi Badan</th>
                                                            <th class='text-center'>Tensi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list_periksa"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="histori_per_anak" role="tabpanel">
                                            <div class="pd-20">
                                                <table id="data_table_periksa_anak" class="data-table table stripe hover nowrap" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Berat Badan Janin</th>
                                                            <th>Lingkar Kepala</th>
                                                            <th>Lingkar Perut</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list_periksa_anak"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix mb-30">
                <div class="col-12 col-md-12 col-sm-12 mb-30">
                    <div class="card-box pd-20 height-100-p mb-30">
                        <div class="row mb-30">
                            <div class="col-md-9 col-sm-12">
                                <h4 class="text-blue h4">Kehamilan Pasien</h4>
                                <p class="mb-0">Data semua kehamilan dari pasien</p>
                            </div>
                            <div class="col-md-3 col-sm-12 py-3 text-right">
                                <button type="button" class="btn btn-primary btn-hamil"><i class="icon-copy fa fa-plus-square mr-2" aria-hidden="true"></i>Tambah Kehamilan</button>
                            </div>
                        </div>
                        <div class="pb-20">
                            <table id="data_table" class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kehamilan ke</th>
                                        <th>Tanggal Akhir Haid</th>
                                        <th>Status</th>
                                        <th class="text-center datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 mb-20 card-box footer-wrap text-center">
                @<?php echo date('Y'); ?> - Buana Varia Komputama</a>
            </div>
        </div>
    </div>

    <!-- Modal Periksa -->
    <div class="modal fade bs-example-modal-lg" id="modal-periksa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 90%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-periksa" id="myLargeModalLabel">Periksa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body">
                    <form action="<?= base_url('kehamilan/store_periksa'); ?>" class="store_periksa px-3">
                        <input type="hidden" name="id_kehamilan_ke" id="id_kehamilan_ke">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-primary" data-toggle="tab" href="#periksaibu" role="tab" aria-selected="true">Periksa Ibu</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="periksaibu" role="tabpanel">
                                            <div class="pd-20">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Norm</label>
                                                    <div class="col-sm-12 col-md-8">
                                                        <input class="form-control" type="text" placeholder="Norm" name="norm_periksa" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Tanggal Periksa</label>
                                                    <div class="col-sm-12 col-md-8">
                                                        <input class="form-control" type="text" readonly placeholder="Tanggal Periksa" name="tgl_periksa" value="<?= date('Y-m-d'); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Minggu Kehamilan</label>
                                                    <div class="col-sm-12 col-md-8">
                                                        <input class="form-control" type="text" placeholder="Minggu Kehamilan" name="minggu_ke" id="minggu_ke">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Berat Badan Ibu</label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected col-sm-12 col-md-8 my-0">
                                                        <input class="form-control" type="text" placeholder="Berat Badan Ibu" name="berat_badan">
                                                        <span class="input-group-addon group-span input-group-append">
                                                            <span class="input-group-text">Kg</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Tinggi Badan Ibu</label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected col-sm-12 col-md-8 my-0">
                                                        <input class="form-control" type="text" placeholder="Tinggi Badan Ibu" name="tinggi_badan">
                                                        <span class="input-group-addon group-span input-group-append">
                                                            <span class="input-group-text">cm</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Tensi Ibu</label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected col-sm-12 col-md-8 my-0">
                                                        <input class="form-control" type="text" placeholder="Tensi" name="tensi">
                                                        <span class="input-group-addon group-span input-group-append">
                                                            <span class="input-group-text">mmHg</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-primary" data-toggle="tab" href="#periksaanak" role="tab" aria-selected="true">Periksa Anak</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="periksaanak" role="tabpanel">
                                            <div class="pd-20">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-2 col-form-label">TBJJ</label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected col-sm-12 col-md-10 my-0">
                                                        <input class="form-control" type="text" placeholder="Berat Badan Janin" name="berat_badan_janin">
                                                        <span class="input-group-addon group-span input-group-append">
                                                            <span class="input-group-text">gram</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-2 col-form-label">BPD</label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected col-sm-10 col-md-10 my-0">
                                                        <input class="form-control" type="text" placeholder="Lingkar Kepala" name="lingkar_kepala">
                                                        <span class="input-group-addon group-span input-group-append">
                                                            <span class="input-group-text">cm</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-2 col-form-label">AC</label>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected col-sm-10 col-md-10 my-0">
                                                        <input class="form-control" type="text" placeholder="Lingkar Perut" name="lingkar_perut">
                                                        <span class="input-group-addon group-span input-group-append">
                                                            <span class="input-group-text">cm</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-20">
                            <button type="submit" class="btn btn-primary btn-block btn-lg btn-simpan-periksa">SIMPAN</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- MODAL KEHAMILAN -->
    <div class="modal fade" id="modal-kehamilan-ke" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Kehamilan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('kehamilan/store_kehamilan'); ?>" class="store_hamil px-3">
                        <input class="form-control" type="hidden" name="norm_hamil">
                        <input class="form-control" type="hidden" name="nama_hamil">
                        <input class="form-control" type="hidden" name="alamat_hamil">
                        <input class="form-control" type="hidden" name="tgl_lahir_hamil">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-3 col-form-label">Kehamilan Ke <span style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-9">
                                <input class="form-control" type="text" autocomplete="off" placeholder="Kehamilan Ke" name="kehamilan_ke" id="kehamilan_ke" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-3 col-form-label">Tgl. Terakhir Haid <span style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-9">
                                <input class="form-control date-picker" autocomplete="off" placeholder="Select Date" name="tgl_akhir_mens" type="text" required>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL ALERT SUCCESS -->
    <div class="modal fade" id="alert_modal_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">Success!</h3>
                    <div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
                    <span class="text_alert_success">Testing alert modal</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL ALERT FAILED -->
    <div class="modal fade" id="alert_modal_failed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-danger text-white">
                <div class="modal-body text-center font-18">
                    <h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Failed </h3>
                    <span class="text_alert_failed">Testing alert modal</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation modal -->
    <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500 text-judul">Are you sure you want to continue?</h4>
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <form action="<?= base_url('kehamilan/update_lahir'); ?>" class="update_lahir form-inline">
                            <input type="hidden" name="edit_id_kehamilan_ke">
                            <input type="hidden" name="norm_edit">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                TIDAK
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                                YA
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL GRAFIK -->
    <div class="modal fade" id="modal_grafik" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Data Grafik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="norm_grafik" id="norm_grafik" readonly>
                    <input type="hidden" name="kehamilan_ke_grafik" id="kehamilan_ke_grafik" readonly>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 text-center">
                            <div class="text-right"><a href="javascript:void(0)" class="btn btn-primary btn-sm btn-view-grafik" style="display: none;" target="_blank"><i class="icon-copy ion-android-expand mr-2"></i>View Full Page</a></div>
                            <img class="loading-chart" src="<?php echo base_url('src/images/chart.png'); ?>" alt="Loading..." style="height: 380px;" />
                            <iframe id="grafik_kehamilan" width="100%" scrolling="no" src="" style="border: none;height: 380px;display: none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?= base_url(); ?>vendors/scripts/core.js"></script>
    <script src="<?= base_url(); ?>vendors/scripts/script.min.js"></script>
    <script src="<?= base_url(); ?>vendors/scripts/process.js"></script>
    <script src="<?= base_url(); ?>vendors/scripts/layout-settings.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="<?= base_url(); ?>src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>src/plugins/datatables/js/vfs_fonts.js"></script>
    <script>
        function data_periksa(id_kehamilan_ke, norm) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('kehamilan/data_periksa'); ?>",
                data: {
                    id_kehamilan_ke: id_kehamilan_ke,
                    norm: norm
                },
                dataType: "json",
                success: function(res) {
                    let html_tr = "";
                    let html_tr_anak = "";
                    if (res.data_periksa.length > 0) {
                        let no = 1;
                        for (let i = 0; i < res.data_periksa.length; i++) {
                            html_tr += `<tr>
                                <td class='text-center'>${res.data_periksa[i].TGL_PERIKSA}</td>
                                <td class='text-center'>${res.data_periksa[i].MINGGU_KE}</td>
                                <td class='text-center'>${res.data_periksa[i].BERAT_BADAN} kg</td>
                                <td class='text-center'>${res.data_periksa[i].TINGGI_BADAN} cm</td>
                                <td class='text-center'>${res.data_periksa[i].TENSI} mmHg</td>
                                </tr>`;
                            html_tr_anak += `<tr>
                                <td>${res.data_periksa[i].BERAT_BADAN_JANIN} gram</td>
                                <td>${res.data_periksa[i].LINGKAR_KEPALA} cm</td>
                                <td>${res.data_periksa[i].LINGKAR_PERUT} cm</td>
                                </tr>`;
                        }
                    }

                    $('#data_table_periksa').DataTable().clear();
                    $('#data_table_periksa').DataTable().destroy();
                    $(".list_periksa").html(html_tr);
                    $('#data_table_periksa_anak').DataTable().clear();
                    $('#data_table_periksa_anak').DataTable().destroy();
                    $(".list_periksa_anak").html(html_tr_anak);
                    init_datatable_periksa();
                }
            });
        }

        function data_kehamilan(norm) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('kehamilan/search_norm'); ?>",
                data: {
                    norm_cari: norm
                },
                dataType: "json",
                success: function(res) {
                    // console.log(res);
                    if (res.result == true) {
                        let norm = res.data.NORM.trim();
                        let nama = res.data.NAMA.trim();
                        let alamat = res.data.ALAMAT.trim();
                        let tgl_lahir = res.tgl_lahir;

                        $(`.hasil-norm`).show('slow');
                        $(`.data-hamil`).show('slow');
                        $(`.data-histori`).show('slow');
                        $(`input[name=norm]`).val(norm);
                        $(`input[name=nama]`).val(nama);
                        $(`input[name=tgl_lahir]`).val(tgl_lahir);
                        $(`textarea[name=alamat]`).val(alamat);

                        $(`.nama_histori`).html(nama);
                        $(`.tgl_lahir_histori`).html(tgl_lahir);
                        $(`.alamat_histori`).html(alamat);

                        $(`input[name=norm_periksa]`).val(norm);

                        $(`input[name=norm_hamil]`).val(norm);
                        $(`input[name=nama_hamil]`).val(nama);
                        $(`input[name=tgl_lahir_hamil]`).val(tgl_lahir);
                        $(`input[name=alamat_hamil]`).val(alamat);

                        let html_tr = "";
                        if (res.data_hamil.length > 0) {
                            let no = 1;
                            for (let i = 0; i < res.data_hamil.length; i++) {
                                html_tr += `<tr>
                                <td class="table-plus text-center">${no++}</td>
                                <td class='text-center'>${res.data_hamil[i].KEHAMILAN_KE}</td>
                                <td>${moment(res.data_hamil[i].TGL_AKHIR_MENS_NEW).format('DD-MMMM-YYYY')}</td>
                                <td>${(res.data_hamil[i].STATUS == 0) ? `Belum Lahir` : `Sudah Lahir`}</td>
                                <td class='text-center'>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0  line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                         ${(res.data_hamil[i].STATUS == 0) ? `<a class="dropdown-item btn-periksa" data-id="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-kehamilan_ke="${res.data_hamil[i].KEHAMILAN_KE}" data-norm="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-edit2"></i> Periksa</a>
                                            <a class="dropdown-item btn-lahir" data-id_edit="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-norm_edit="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-check"></i> Sudah Lahir</a>
                                            <a class="dropdown-item btn-grafik" data-kehamilan_ke_grafik="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_grafik="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-list"></i> Grafik</a>
                                            <a class="dropdown-item btn-history" data-id_history="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-kehamilan_ke_history="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_history="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-analytics1"></i> History</a>` : `<a class="dropdown-item btn-grafik" data-kehamilan_ke_grafik="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_grafik="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-analytics1"></i> Grafik</a>
                                            <a class="dropdown-item btn-history" data-id_history="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-kehamilan_ke_history="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_history="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-list"></i> History</a>`}   
                                        </div>
                                    </div>
                                </td>
                                </tr>`;
                            }
                        }
                        $('#data_table').DataTable().clear();
                        $('#data_table').DataTable().destroy();
                        $('#data_table_periksa').DataTable().clear();
                        $('#data_table_periksa').DataTable().destroy();
                        $('#data_table_periksa_anak').DataTable().clear();
                        $('#data_table_periksa_anak').DataTable().destroy();
                        $(".list").html(html_tr);
                        init_datatable();
                        init_datatable_periksa();
                    } else {
                        $(`.hasil-norm`).hide('slow');
                    }
                }
            });
        }

        function init_datatable() {
            $('#data_table').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
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

        function init_datatable_periksa() {
            $('#data_table_periksa').DataTable({
                scrollY: "340px",
                scrollCollapse: true,
                scrollX: true,
                searching: false,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'
                    }
                },
            });

            $('#data_table_periksa_anak').DataTable({
                scrollY: "340px",
                scrollCollapse: true,
                scrollX: true,
                searching: false,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
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


        $(function() {
            init_datatable();
            init_datatable_periksa();

            $("#form_detail_pasien")[0].reset();
            $(".btn-hamil").prop("disabled", true);

            $('#norm_cari, #kehamilan_ke, #minggu_ke, input[name=berat_badan], input[name=tinggi_badan], input[name=berat_badan_janin],input[name=lingkar_kepala], input[name=lingkar_perut]').keydown(function(e) {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    key == 8 ||
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105));
            });

            // $(document).on('click', '.btn-exit-periksa', function(e) {
            //     e.preventDefault();
            //     $(`.hal-periksa`).hide('slow');
            // });

            $(document).on('click', '.btn-grafik', function(e) {
                e.preventDefault();
                let kehamilan_ke_grafik = $(this).data('kehamilan_ke_grafik');
                let norm_grafik = $(this).data('norm_grafik');

                $("#grafik_kehamilan").attr(`src`, `https://platform-reservasi.mirsahallo.com:8089/sikabungah/chart_ttbj.php?norm=${norm_grafik}&anak_ke=${kehamilan_ke_grafik}`);
                $(".btn-view-grafik").attr(`href`, `https://platform-reservasi.mirsahallo.com:8089/sikabungah/chart_ttbj.php?norm=${norm_grafik}&anak_ke=${kehamilan_ke_grafik}`);


                $(".loading-chart").show();
                $(".btn-view-grafik").hide();
                $("#grafik_kehamilan").hide();

                setInterval(function() {
                    $(".loading-chart").hide();
                    $(".btn-view-grafik").show();
                    $("#grafik_kehamilan").show();
                }, 1200);

                $('#modal_grafik').modal('show');
            });

            $(document).on('click', '.btn-history', function(e) {
                e.preventDefault();
                let id_history = $(this).data('id_history');
                let norm_history = $(this).data('norm_history');
                $('#data_table_periksa').DataTable().clear();
                $('#data_table_periksa').DataTable().destroy();
                $('#data_table_periksa_anak').DataTable().clear();
                $('#data_table_periksa_anak').DataTable().destroy();
                data_periksa(id_history, norm_history);
                init_datatable_periksa();

                $('html, body').animate({
                    scrollTop: $("#scroll_history").offset().top
                }, 600);
            });

            $(document).on('click', '.btn-lahir', function(e) {
                e.preventDefault();
                let id = $(this).data('id_edit');
                let norm = $(this).data('norm_edit');
                $(`#confirmation-modal`).modal('show');
                $(`.text-judul`).html('Apa sudah lahir?');
                $(`input[name=edit_id_kehamilan_ke]`).val(id);
                $(`input[name=norm_edit]`).val(norm);
            });

            $(document).on('click', '.btn-periksa', function(e) {
                e.preventDefault();
                let id_hamil = $(this).data('id');
                let kehamilan_ke = $(this).data('kehamilan_ke');
                let norm = $(this).data('norm');
                $(`#modal-periksa`).modal('show');
                $('input[name=id_kehamilan_ke]').val(id_hamil);
                $('.text-periksa').html(`Periksa Kehamilan ke ${kehamilan_ke}`);
            });

            $(`.btn-hamil`).click(function(e) {
                e.preventDefault();
                $(`#modal-kehamilan-ke`).modal('show');
            });

            $(`.update_lahir`).submit(function(e) {
                e.preventDefault();
                let url_update = $(this).attr('action');
                $.ajax({
                    type: "post",
                    url: url_update,
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.data == true) {
                            $('.update_lahir')[0].reset();
                            $(`#confirmation-modal`).modal('hide');
                            $(".text_alert_success").html(response.message);
                            $('#alert_modal_success').modal('show');
                            setInterval(function() {
                                $('#alert_modal_success').modal('hide');
                            }, 2000);
                            $('#data_table').DataTable().clear();
                            $('#data_table').DataTable().destroy();
                            data_kehamilan(response.norm);
                            init_datatable();
                        } else {
                            $('.store_hamil')[0].reset();
                            $(`#confirmation-modal`).modal('hide');
                            $(".text_alert_failed").html(response.message);
                            $('#alert_modal_failed').modal('show');
                            setInterval(function() {
                                $('#alert_modal_failed').modal('hide');
                            }, 2000);
                        }
                    }
                });
            });

            $(`.store_periksa`).submit(function(e) {
                e.preventDefault();
                let url_periksa = $(this).attr('action');

                // alert('test');

                $.ajax({
                    type: "post",
                    url: url_periksa,
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.data == true) {
                            $('#data_table_periksa').DataTable().clear();
                            $('#data_table_periksa').DataTable().destroy();
                            $('#data_table_periksa_anak').DataTable().clear();
                            $('#data_table_periksa_anak').DataTable().destroy();
                            data_periksa(response.id_kehamilan_ke, response.norm);
                            init_datatable_periksa();

                            $('.store_periksa')[0].reset();
                            $(`#modal-periksa`).modal('hide');
                            $(`input[name=norm_periksa]`).val(response.norm);
                            $(".text_alert_success").html(response.message);
                            $('#alert_modal_success').modal('show');
                            setInterval(function() {
                                $('#alert_modal_success').modal('hide');
                            }, 2000);

                            $('html, body').animate({
                                scrollTop: $("#scroll_history").offset().top
                            }, 600);

                        } else {
                            $('.store_periksa')[0].reset();
                            $(`#modal-periksa`).modal('hide');
                            $(`input[name=norm_periksa]`).val(response.norm);
                            $(".text_alert_failed").html(response.message);
                            $('#alert_modal_failed').modal('show');
                            setInterval(function() {
                                $('#alert_modal_failed').modal('hide');
                            }, 2000);
                        }
                    }
                });
            });

            $(`.store_hamil`).submit(function(e) {
                e.preventDefault();
                let url = $(this).attr('action');
                $.ajax({
                    type: "post",
                    url: url,
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.data == true) {
                            $('.store_hamil')[0].reset();
                            $(`#modal-kehamilan-ke`).modal('hide');
                            $(".text_alert_success").html(response.message);
                            $('#alert_modal_success').modal('show');
                            setInterval(function() {
                                $('#alert_modal_success').modal('hide');
                            }, 2000);
                            $('#data_table').DataTable().clear();
                            $('#data_table').DataTable().destroy();
                            data_kehamilan(response.norm);
                            init_datatable();
                        } else {
                            $('.store_hamil')[0].reset();
                            $(`#modal-kehamilan-ke`).modal('hide');
                            $(".text_alert_failed").html(response.message);
                            $('#alert_modal_failed').modal('show');
                            setInterval(function() {
                                $('#alert_modal_failed').modal('hide');
                            }, 2000);
                        }
                    }
                });
            });

            $(`.form-search-norm`).submit(function(e) {
                e.preventDefault();
                let norm_cari = $(`input[name=norm_cari]`).val();
                $('#data_table').DataTable().clear();
                $('#data_table').DataTable().destroy();
                $('#data_table_periksa').DataTable().clear();
                $('#data_table_periksa').DataTable().destroy();
                $('#data_table_periksa_anak').DataTable().clear();
                $('#data_table_periksa_anak').DataTable().destroy();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('kehamilan/search_norm'); ?>",
                    data: {
                        norm_cari: norm_cari
                    },
                    dataType: "json",
                    success: function(res) {
                        // console.log(res);
                        if (res.result == true) {
                            $(".btn-hamil").prop("disabled", false);

                            let norm = res.data.NORM.trim();
                            let nama = res.data.NAMA.trim();
                            let alamat = res.data.ALAMAT.trim();
                            let tgl_lahir = res.tgl_lahir;

                            $(".text_alert_success").html(res.message);
                            $('#alert_modal_success').modal('show');
                            setInterval(function() {
                                $('#alert_modal_success').modal('hide');
                            }, 2000);

                            $(`.hasil-norm`).show('slow');
                            $(`.data-hamil`).show('slow');
                            $(`.data-histori`).show('slow');
                            $(`input[name=norm]`).val(norm);
                            $(`input[name=nama]`).val(nama);
                            $(`input[name=tgl_lahir]`).val(tgl_lahir);
                            $(`textarea[name=alamat]`).val(alamat);

                            $(`.nama_histori`).html(nama);
                            $(`.tgl_lahir_histori`).html(tgl_lahir);
                            $(`.alamat_histori`).html(alamat);

                            $(`input[name=norm_periksa]`).val(norm);

                            $(`input[name=norm_hamil]`).val(norm);
                            $(`input[name=nama_hamil]`).val(nama);
                            $(`input[name=tgl_lahir_hamil]`).val(tgl_lahir);
                            $(`input[name=alamat_hamil]`).val(alamat);

                            let html_tr = "";
                            if (res.data_hamil.length > 0) {
                                let no = 1;
                                for (let i = 0; i < res.data_hamil.length; i++) {
                                    html_tr += `<tr>
                                <td class="table-plus text-center">${no++}</td>
                                <td class='text-center'>${res.data_hamil[i].KEHAMILAN_KE}</td>
                                <td>${moment(res.data_hamil[i].TGL_AKHIR_MENS_NEW).format('DD-MMMM-YYYY')}</td>
                                <td>${(res.data_hamil[i].STATUS == 0) ? `Belum Lahir` : `Sudah Lahir`}</td>
                                <td class='text-center'>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0  line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                         ${(res.data_hamil[i].STATUS == 0) ? `<a class="dropdown-item btn-periksa" data-id="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-kehamilan_ke="${res.data_hamil[i].KEHAMILAN_KE}" data-norm="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-edit2"></i> Periksa</a>
                                            <a class="dropdown-item btn-lahir" data-id_edit="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-norm_edit="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-check"></i> Sudah Lahir</a>
                                            <a class="dropdown-item btn-grafik" data-kehamilan_ke_grafik="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_grafik="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-analytics1"></i> Grafik</a>
                                            <a class="dropdown-item btn-history" data-id_history="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-kehamilan_ke_history="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_history="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-list"></i> History</a>` : `<a class="dropdown-item btn-grafik" data-kehamilan_ke_grafik="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_grafik="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-analytics1"></i> Grafik</a>
                                            <a class="dropdown-item btn-history" data-id_history="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-kehamilan_ke_history="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_history="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-list"></i> History</a>`}   
                                        </div>
                                    </div>
                                </td>
                                </tr>`;
                                }
                            }
                            $('#data_table').DataTable().clear();
                            $('#data_table').DataTable().destroy();
                            $(".list").html(html_tr);
                            init_datatable();

                            init_datatable_periksa();
                        } else {
                            $(".text_alert_failed").html(res.message);
                            $('#alert_modal_failed').modal('show');
                            setInterval(function() {
                                $('#alert_modal_failed').modal('hide');
                            }, 2000);
                            $(`.hasil-norm`).hide('slow');
                            $(`.data-hamil`).hide('slow');
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>