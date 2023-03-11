<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item "><a href="">Invoice</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Edit Invoice : </h5><br />
                        <?php foreach ($invoice as $u) { ?>
                            <?= form_open('invoice/invoice_update') ?>

                            <div class="form-group row">
                                <label for="jenis" class="col-sm-2 col-form-label">Jenis Invoice</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="jenis" value="<?php echo $u->jenis_invoice ?>" readonly>
                                    <input type="text" class="form-control" name="id" value="<?php echo $u->id ?>" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="invoice">Nomor Invoice</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="invoice" value="<?php echo $u->nomor_invoice ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="nama">Nama Pasien</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $u->nama ?>" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" name="keterangan"><?php echo $u->keterangan ?></textarea>
                                </div>
                            </div>

                            <div class="row no-print">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Update Invoice
                                    </button>
                                    <a href="<?= base_url() . 'invoice/invoice_list' ?>" class='btn btn-sm btn-warning pull-right'><i class="fa fa-backward"></i> Kembali</a>
                                </div>
                            </div>
                            <? form_close() ?>
                        <?php } ?>

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>