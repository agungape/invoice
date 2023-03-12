<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() . 'invoice' ?>">Invoice</a></li>
                        <li class="breadcrumb-item active">Buat Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body row">
                <div class="col-5 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <img src="<?= base_url() ?>img/blud.png" style="width: 150px; height: auto;" align="center">
                        <br>
                        <h2><strong>BLUD RS KONAWE</strong></h2>
                        <p class="lead mb-5"> Jln. Diponegoro No.301<br>
                            Telp. 0408-2421014 Fax. 0408-2422349
                        </p>
                    </div>
                </div>
                <div class="col-7">
                    <?php
                    $a = $kode['InvoiceMax'];
                    $b = $in['kode_invoice'];
                    $c = $in['jenis_invoice'];
                    $hari = date('Y');
                    $rs = ('RSK');
                    $garing = ('/');
                    $urut = (int)substr($a, 13, 4);
                    $urut++;
                    $kd = $b . $garing . $rs . $garing . $hari  . $garing . sprintf("%04s", $urut);
                    // echo '<h5 class="text-center">' . $c . '</h5><h1 class="text-center">' . $kd . '</h1>'
                    ?>
                    <?= form_open('invoice/invoice_tambah_aksi') ?>
                    <div class="form-group">
                        <label for="inputName">Nomor Invoice</label>
                        <input type="text" class="form-control" name="invoice" value="<?= $kd; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Jenis Invoice</label>
                        <input type="text" class="form-control" name="jenis" value="<?= $c; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pasien" required="required">
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="Masukkan Keterangan" rows="4"></textarea>
                    </div>
                    <input type="text" class="form-control" name="kode" value="<?= $b; ?>" readonly hidden>
                    <div class="form-group">
                        <a href="<?= base_url() . 'invoice' ?>" class='btn btn-sm btn-outline-warning'><i class="fa fa-backward"></i> Kembali</a>
                        <button type="submit" class="btn btn-sm btn-outline-primary" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Simpan Invoice
                        </button>
                    </div>
                    <? form_close() ?>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>