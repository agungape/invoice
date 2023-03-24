<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Jenis Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jenis Invoice</li>
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
                        Halaman ini untuk membuat <b>jenis Invoice</b> baru. Klik tombol <b>Tambah baru</b> di bagian kiri faktur untuk membuat.
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <a href="<?php echo base_url() . 'admin/invoice_jenis_tambah' ?>" class='btn btn-sm btn-outline-success pull-right'><i class="fa fa-plus"></i> Tambah Baru</a><br><br>
                                <table class="table table-striped table-hover" id="table-datatable">
                                    <thead>
                                        <tr class="align-items-center">
                                            <th>No</th>
                                            <th>Kode Invoice</th>
                                            <th>Jenis Invoice</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jenis as $u) : ?>
                                            <tr class="">
                                                <td><?= $no++ ?></td>
                                                <td><?php echo $u['kode_invoice']; ?></td>
                                                <td><?php echo $u['jenis_invoice']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'admin/invoice_jenis_hapus/' . $u['kode_invoice']; ?>" title="hapus" class="btn btn-sm btn-outline-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
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