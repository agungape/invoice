<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Invoice</li>
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
                        Halaman ini untuk mengelolah data <b>Invoice</b>. Klik tombol <b>Aksi</b> di bagian kanan faktur untuk mengelolah.
                    </div>
                    <div class="invoice p-3 mb-3">
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
                                            <th width="100">Di Buat</th>
                                            <th width="100">Aksi</th>
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
                                                    <a target="_blank" href="<?php echo base_url() . 'admin/cetak_invoice/' . $u['id']; ?>" title="cetak invoice" class="btn btn-sm btn-outline-info"><i class="fa fa-address-card"></i></a>
                                                    <a href="<?php echo base_url() . 'admin/invoice_edit/' . $u['id']; ?>" title="edit" class="btn btn-sm btn-outline-warning"><i class="fa fa-pencil-alt"></i></a>
                                                    <a href="<?php echo base_url() . 'admin/invoice_hapus/' . $u['id']; ?>" title="hapus" class="btn btn-sm btn-outline-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <a target="_blank" class='btn btn-primary' href="<?php echo base_url() . 'admin/print'; ?>"><i class='fa fa-print'></i> CETAK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>