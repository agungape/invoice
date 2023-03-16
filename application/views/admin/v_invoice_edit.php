<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/invoice_list' ?>">Daftar Invoice</a></li>
                        <li class="breadcrumb-item active">Edit Invoice</li>
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
                    <?php foreach ($invoice as $u) { ?>
                        <?= form_open('admin/invoice_update') ?>
                        <div class="form-group">
                            <label for="invoice">Nomor Invoice</label>
                            <input type="text" class="form-control" name="invoice" value="<?php echo $u->nomor_invoice ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Invoice</label>
                            <input type="text" class="form-control" name="jenis" value="<?php echo $u->jenis_invoice ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $u->nama ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan"><?php echo $u->keterangan ?></textarea>
                        </div>
                        <input type="text" class="form-control" name="id" value="<?php echo $u->id ?>" readonly hidden>
                        <div class="form-group">
                            <a href="<?= base_url() . 'admin/invoice_list' ?>" class='btn btn-sm btn-outline-warning'><i class="fa fa-backward"></i> Kembali</a>
                            <button type="submit" class="btn btn-sm btn-outline-primary" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Update Invoice
                            </button>
                        </div>
                        <? form_close() ?>
                    <?php } ?>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>