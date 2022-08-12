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

    <script src="<?= base_url(); ?>vendors/js/jquery-3.6.0.min.js"></script>
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
                        <div class="title">
                            <h4>Kehamilan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kehamilan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row clearfix mb-30">
                <div class="col-md-12 col-sm-12">
                    <div class="card-box pd-20 height-100-p mb-30">
                        <div class="clearfix col-md-6">
                            <div class="pull-left">
                                <h4 class="text-blue h4 mb-20">Search Norm</h4>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <form class="form-inline form-search-norm" method="POST" action="">
                                    <div class="col-md-6">
                                        <div class="input-group custom">
                                            <div class="input-group-prepend custom">
                                                <div class="input-group-text" id="btnGroupAddon"><i class="icon-copy dw dw-search2"></i></div>
                                            </div>
                                            <input type="text" class="form-control" autofocus id="norm_cari" placeholder="......" name="norm_cari">
                                            <button type="submit" class="btn btn-primary ml-2 mb-2">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row clearfix mb-30">
                <div class="col-md-12">
                    <div class="card-box pd-20 height-100-p mb-30 hasil-norm" style="display: none;">
                        <div class="row align-items-center">
                            <div class="pd-20">
                                <h4 class="text-blue h4 ">Data Ibu</h4>
                            </div>
                            <div class="col-md-12">
                                <form class="form" method="POST" action="">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">NORM</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" readonly placeholder="NORM" name="norm">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">NAMA</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" readonly placeholder="NAMA" name="nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">TANGGAL LAHIR</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" readonly placeholder="TANGGAL LAHIR" name="tgl_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">ALAMAT</label>
                                        <div class="col-sm-12 col-md-10">
                                            <textarea name="alamat" id="alamat" class="form-control" readonly></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row clearfix mb-30">
                <div class="col-md-12">
                    <div class="card-box mb-30 data-hamil" style="display: none;">
                        <div class="pd-20">
                            <h4 class="text-blue h4">Data Kehamilan</h4>
                            <button type="button" class="btn btn-primary btn-hamil"><i class="icon-copy fa fa-plus-square-o"></i> Tambah Kehamilan </button>
                        </div>
                        <div class="pb-20">
                            <table id="data_table" class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kehamilan ke</th>
                                        <th>Tanggal Akhir Haid</th>
                                        <th>Status</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Periksa -->
    <div class="modal fade bs-example-modal-lg" id="modal-periksa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 95%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-periksa" id="myLargeModalLabel">Periksa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body">
                    <table width="100%" border="0" class="mb-4">
                        <tr>
                            <td width="25%" class="py-1">Nama</td>
                            <td width="5%">:</td>
                            <td><span class="nama_histori"></span></td>
                        </tr>
                        <tr>
                            <td width="25%" class="py-1">Tanggal Lahir</td>
                            <td width="5%">:</td>
                            <td><span class="tgl_lahir_histori"></span></td>
                        </tr>
                        <tr>
                            <td width="25%" class="py-1">Alamat</td>
                            <td width="5%">:</td>
                            <td><span class="alamat_histori"></span></td>
                        </tr>
                    </table>
                    <hr>
                    <div class="tab">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#form_periksa" role="tab" aria-selected="true">Form Periksa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#history_periksa" role="tab" aria-selected="false">History Periksa</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="form_periksa" role="tabpanel">
                                <div class="pd-20">
                                    <form action="<?= base_url('kehamilan/store_periksa'); ?>" class="store_periksa">
                                        <input type="hidden" name="id_kehamilan_ke" id="id_kehamilan_ke">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-blue h4">Ibu</h4>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Norm</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input class="form-control" type="text" placeholder="Norm" name="norm_periksa" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Tanggal Periksa</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input class="form-control" type="text" readonly placeholder="Tanggal Periksa" name="tgl_periksa" value="<?= date('Y-m-d'); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Minggu Kehamilan</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input class="form-control" type="text" placeholder="Minggu Kehamilan" name="minggu_ke" id="minggu_ke">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Berat Badan Ibu</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input class="form-control" type="text" placeholder="Berat Badan Ibu" name="berat_badan">
                                                            <span class="input-group-addon group-span input-group-append">
                                                                <span class="input-group-text">Kg</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Tinggi Badan Ibu</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input class="form-control" type="text" placeholder="Tinggi Badan Ibu" name="tinggi_badan">
                                                            <span class="input-group-addon group-span input-group-append">
                                                                <span class="input-group-text">cm</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Tensi Ibu</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input class="form-control" type="text" placeholder="Tensi" name="tensi">
                                                            <span class="input-group-addon group-span input-group-append">
                                                                <span class="input-group-text">mmHg</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="text-blue h4">Anak</h4>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">TBJJ (Berat Badan Janin)</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input class="form-control" type="text" placeholder="TBJJ (Berat Badan Janin)" name="berat_badan_janin">
                                                            <span class="input-group-addon group-span input-group-append">
                                                                <span class="input-group-text">gram</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">BPD (Lingkar Kepala)</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input class="form-control" type="text" placeholder="BPD (Lingkar Kepala)" name="lingkar_kepala">
                                                            <span class="input-group-addon group-span input-group-append">
                                                                <span class="input-group-text">cm</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">AC (Lingkar Perut)</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                            <input class="form-control" type="text" placeholder="AC (Lingkar Perut)" name="lingkar_perut">
                                                            <span class="input-group-addon group-span input-group-append">
                                                                <span class="input-group-text">cm</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ml-3">
                                                <div class="form-group row">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="history_periksa" role="tabpanel">
                                <div class="pd-20">
                                    <div class="pb-20">
                                        <table id="data_table_periksa" class="data-table table stripe hover nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Norm</th>
                                                    <th>Tanggal Periksa</th>
                                                    <th>Minggu Kehamilan</th>
                                                    <th>Berat Badan</th>
                                                    <th>Tinggi Badan</th>
                                                    <th>Tensi</th>
                                                    <th>TBJJ (Berat Badan Janin)</th>
                                                    <th>BPD (Lingkar Kepala)</th>
                                                    <th>AC (Lingkar Perut)</th>
                                                    <!-- <th class="datatable-nosort">Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody class="list_periksa">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL KEHAMILAN -->
    <div class="modal fade bs-example-modal-lg" id="modal-kehamilan-ke" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Kehamilan Ke</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="<?= base_url('kehamilan/store_kehamilan'); ?>" class="store_hamil">
                    <div class="modal-body">
                        <input class="form-control" type="hidden" name="norm_hamil">
                        <input class="form-control" type="hidden" name="nama_hamil">
                        <input class="form-control" type="hidden" name="alamat_hamil">
                        <input class="form-control" type="hidden" name="tgl_lahir_hamil">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Kehamilan Ke <span style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-6">
                                <input class="form-control" type="text" autocomplete="off" placeholder="Kehamilan Ke" name="kehamilan_ke" id="kehamilan_ke" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Akhir Haid <span style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-6">
                                <input class="form-control date-picker" autocomplete="off" placeholder="Select Date" name="tgl_akhir_mens" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
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
    <div class="modal fade bs-example-modal-lg" id="modal_grafik" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md  modal-dialog-centered" style="max-width: 95%">
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
                            <div class="text-right"><a href="javascript:void(0)" class="btn btn-primary btn-sm btn-view-grafik" style="display: none;" target="_blank">View Full Page</a></div>
                            <img class="loading-chart" src="<?php echo base_url('src/images/chart.png'); ?>" alt="Loading..." style="height: 380px;" />
                            <iframe id="grafik_kehamilan" width="100%" scrolling="no" src="<?php echo base_url('src/images/chart.png'); ?>" style="border: none;height: 380px;display: none;"></iframe>
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
    <script src="<?= base_url(); ?>src/plugins/apexcharts/apexcharts.min.js"></script>
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

    <script src="<?= base_url(); ?>vendors/js/moment.min.js"></script>
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
                    if (res.data_periksa.length > 0) {
                        let no = 1;
                        for (let i = 0; i < res.data_periksa.length; i++) {
                            html_tr += `<tr>
                                <td>${no++}</td>
                                <td>${res.data_periksa[i].NORM}</td>
                                <td>${res.data_periksa[i].TGL_PERIKSA}</td>
                                <td>${res.data_periksa[i].MINGGU_KE}</td>
                                <td>${res.data_periksa[i].BERAT_BADAN}</td>
                                <td>${res.data_periksa[i].TINGGI_BADAN}</td>
                                <td>${res.data_periksa[i].TENSI}</td>
                                <td>${res.data_periksa[i].BERAT_BADAN_JANIN}</td>
                                <td>${res.data_periksa[i].LINGKAR_KEPALA}</td>
                                <td>${res.data_periksa[i].LINGKAR_PERUT}</td>
                             
                                </tr>`;
                        }
                    }
                    $('#data_table_periksa').DataTable().clear();
                    $('#data_table_periksa').DataTable().destroy();
                    $(".list_periksa").html(html_tr);
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
                                <td>${res.data_hamil[i].KEHAMILAN_KE}</td>
                                <td>${moment(res.data_hamil[i].TGL_AKHIR_MENS_NEW).format('DD-MMMM-YYYY')}</td>
                                <td>${(res.data_hamil[i].STATUS == 0) ? `Belum Lahir` : `Sudah Lahir`}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0  line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                         ${(res.data_hamil[i].STATUS == 0) ? `<a class="dropdown-item btn-periksa" data-id="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-kehamilan_ke="${res.data_hamil[i].KEHAMILAN_KE}" data-norm="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-book"></i> Periksa</a>
                                            <a class="dropdown-item btn-lahir" data-id_edit="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-norm_edit="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-check"></i> Sudah Lahir</a>
                                            <a class="dropdown-item btn-grafik" data-kehamilan_ke_grafik="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_grafik="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-analytics1"></i> Grafik</a>` : `<a class="dropdown-item btn-grafik" data-kehamilan_ke_grafik="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_grafik="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-analytics1"></i> Grafik</a>`}   
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
                scrollY: true,
                scrollCollapse: true,
                scrollX: true,
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


        $(function() {
            init_datatable();

            $('#norm_cari').keydown(function(e) {
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

            $('#kehamilan_ke').keydown(function(e) {
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

            $('#minggu_ke').keydown(function(e) {
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

                data_periksa(id_hamil, norm);
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
                $.ajax({
                    type: "post",
                    url: url_periksa,
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.data == true) {
                            $('.store_periksa')[0].reset();
                            $(`input[name=norm_periksa]`).val(response.norm);
                            $(".text_alert_success").html(response.message);
                            $('#alert_modal_success').modal('show');
                            setInterval(function() {
                                $('#alert_modal_success').modal('hide');
                            }, 2000);
                            $('#data_table_periksa').DataTable().clear();
                            $('#data_table_periksa').DataTable().destroy();
                            data_periksa(response.id_kehamilan_ke, response.norm);
                            init_datatable_periksa();
                        } else {
                            $('.store_periksa')[0].reset();
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
                // console.log("test");
                // data_kehamilan(norm_cari);
                // init_datatable();
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
                                <td>${res.data_hamil[i].KEHAMILAN_KE}</td>
                                <td>${moment(res.data_hamil[i].TGL_AKHIR_MENS_NEW).format('DD-MMMM-YYYY')}</td>
                                <td>${(res.data_hamil[i].STATUS == 0) ? `Belum Lahir` : `Sudah Lahir`}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0  line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                         ${(res.data_hamil[i].STATUS == 0) ? `<a class="dropdown-item btn-periksa" data-id="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-kehamilan_ke="${res.data_hamil[i].KEHAMILAN_KE}" data-norm="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-book"></i> Periksa</a>
                                            <a class="dropdown-item btn-lahir" data-id_edit="${res.data_hamil[i].ID_KEHAMILAN_KE}" data-norm_edit="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-check"></i> Sudah Lahir</a>
                                            <a class="dropdown-item btn-grafik" data-kehamilan_ke_grafik="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_grafik="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-analytics1"></i> Grafik</a>` : `<a class="dropdown-item btn-grafik" data-kehamilan_ke_grafik="${res.data_hamil[i].KEHAMILAN_KE}" data-norm_grafik="${res.data_hamil[i].NORM}" href="javascript:void(0)"><i class="dw dw-analytics1"></i> Grafik</a>`}   
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