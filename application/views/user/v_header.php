<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InvoiceBLUD</title>
    <link rel="icon" href="<?= base_url() ?>img/invoice.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>dist/awesome/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>dist/plugins/datatables/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>dist/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>dist/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <h5 class="nav-link">
                        <strong>BLUD Rumah Sakit Konawe - <?= date('Y') ?></strong>
                    </h5>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <span class="navbar-text mr-3 text-center">
                    <b><?php echo $this->session->userdata('level'); ?></b> (<?php echo $this->session->userdata('nama'); ?>)
                </span>
                <a href="<?= base_url() . 'login/logout'; ?>" class="btn btn-outline-dark ml-1"><i class="fa fa-power-off"></i> Keluar</a>
            </ul>
        </nav>