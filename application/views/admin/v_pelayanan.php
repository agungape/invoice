<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Pelayanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pelayanan</li>
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
                        Halaman ini untuk membuat <b>Jenis Pelayanan</b> baru. Klik tombol <b>Tambah baru</b> di bagian kiri faktur untuk membuat.
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <a href="<?php echo base_url() . 'admin/invoice_tambah_pelayanan' ?>" class='btn btn-sm btn-outline-success pull-right'><i class="fa fa-plus"></i> Tambah Baru</a><br><br>
                                <table class="table table-striped table-hover" id="table-datatable">
                                    <thead>
                                        <tr class="align-items-center">
                                            <th>No</th>
                                            <th>Jenis Pelayanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pelayanan as $u) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $u->nama; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'admin/invoice_pelayanan_hapus/' . $u->id; ?>" title="hapus" class="btn btn-sm btn-outline-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>