<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InvoiceBLUD</title>

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
                        if ($_GET['alert'] == "username") {
                            echo "<div class='alert font-weight-bold textcenter'>USERNAME TIDAK TERDAFTAR!</div>";
                        } else if ($_GET['alert'] == "password") {
                            echo "<div class='alert font-weight-bold textcenter'>PASSWORD SALAH!</div>";
                        } else if ($_GET['alert'] == "status") {
                            echo "<div class='alert font-weight-bold textcenter'>AKUN BELUM AKTIF!</div>";
                        } else if ($_GET['alert'] == "belum_login") {
                            echo "<div class='alert font-weight-bold textcenter'>SILAHKAN LOGIN TERLEBIH DAHULU!</div>";
                        } else if ($_GET['alert'] == "logout") {
                            echo "<div class='alert font-weight-bold textcenter'>ANDA TELAH KELUAR!</div>";
                        }
                    }
                    ?>

                    <!-- validasi error -->
                    <?php echo validation_errors(); ?>

                    <form action="<?= base_url() . 'login/proses_login' ?> " method="post">
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
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('.swalDefaultError').click(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
        });
    </script>
</body>

</html>