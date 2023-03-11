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
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Sim-RS, BLUD RS Konawe
                                    <small class="float-right"> <?php echo date('l, d-m-Y') ?></small>
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <div class="form-group">
                                    <?= form_open('invoice/invoice_tambah'); ?>
                                    <label>Jenis Invoice</label>
                                    <select name="id" class="form-control select2" style="width: 100%;" required>
                                        <?php foreach ($jenis as $data) : ?>
                                            <option value="<?= $data['kode_invoice']; ?>"><?= $data['jenis_invoice']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <div class="form-group">
                                    <label class="text-white">Buat Invoice</label><br>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Generate</button>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-hover" id="table-datatable">
                                    <thead>
                                        <tr class="align-items-center">
                                            <th>No</th>
                                            <th>Jenis Invoice</th>
                                            <th>Nomor Invoice</th>
                                            <th>Nama Pasien</th>
                                            <th>Keterangan</th>
                                            <th>Dibuat</th>
                                            <th width="60">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($invoice as $u) : ?>
                                            <tr class="">
                                                <td><?= $no++ ?></td>
                                                <td><?php echo $u['jenis_invoice']; ?></td>
                                                <td><?php echo $u['nomor_invoice']; ?></td>
                                                <td><?php echo $u['nama']; ?></td>
                                                <td><?php echo $u['keterangan']; ?></td>
                                                <td><?php echo $u['created_at']; ?></td>
                                                <td>
                                                    <a target="_blank" href="<?php echo base_url() . 'invoice/cetak_invoice/' . $u['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-address-card"></i> Cetak</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>