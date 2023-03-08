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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-success">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Horizontal Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <?= form_open('invoice/invoice_jenis_tambah_aksi'); ?>
                                <div class="form-group row">
                                    <label for="kode" class="col-sm-2 col-form-label">Kode Invoice</label>
                                    <div class="col-sm-3">
                                        <?php echo form_error('kode'); ?>
                                        <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Invoice Baru">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Invoice</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="jenis" placeholder="Masukkan Jenis Invoice Baru">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <a href="<?php echo base_url() . 'invoice/invoice_jenis' ?>" class='btn btn-sm btn-warning pull-right'><i class="fa fa-backward"></i> Kembali</a>
                                <button type="submit" class='btn btn-sm btn-success pull-right'><i class="fa fa-plus"></i>Tambahkan</button>
                            </div>
                            <?= form_close(); ?>
                        </div>

                        <div class="card-footer">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>