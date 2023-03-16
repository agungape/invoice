<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InvoiceKU</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>dist/awesome/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
    <style>
        .login-page {
            background-image: url(<?php echo base_url('img/rskonawe.jpeg') ?>);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>



<body class="hold-transition login-page">
    <div class="bg-login">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a class="h1"><b>Invoice</b>BLUD</a>
                </div>
                <div class="card-body text-center">
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "gagal") {
                            echo "<div class='alert swalDefaultError font-weight-bold textcenter'>Username Atau Password Salah!</div>";
                        } else if ($_GET['alert'] == "belum_login") {
                            echo "<div class='alert alert-danger font-weight-bold textcenter'>SILAHKAN LOGIN TERLEBIH DULU!</div>";
                        } else if ($_GET['alert'] == "logout") {
                            echo "<div class='alert alert-success font-weight-bold textcenter'>ANDA TELAH KELUAR!</div>";
                        }
                    }
                    ?>

                    <!-- validasi error -->
                    <?php echo validation_errors(); ?>

                    <form action="<?= base_url() . 'login/login_aksi' ?> " method="post">
                        <div class="input-group mb-3">
                            <input name="username" type="text" class="form-control" placeholder="Masukkan Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sebagai">Login Sebagai :</label>
                            <select name="sebagai" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary float-center" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Masuk
                        </button>


                        <!-- <button type="submit" class="btn btn-primary btn-block float-right">Sign In</button> -->

                        <!-- /.col -->
                </div>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>dist/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>dist/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>