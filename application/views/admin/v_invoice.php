<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>

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
                        Halaman ini untuk membuat <b>Invoice</b>. Klik tombol <b>Buat Invoice</b> di bagian tengah faktur untuk membuat.
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Forsa BLUD RS Konawe
                                    <small class="float-right"> <?php echo date('l, d-m-Y') ?></small>
                                </h4>
                            </div>
                        </div>

                        <div class="form-group row pt-4">
                            <label for="kode" class="col-sm-2 col-form-label">&emsp;&emsp;Jenis Invoice</label>
                            <div class="col-sm-4">
                                <?= form_open('admin/invoice_tambah'); ?>
                                <select name="kode" id="kode" class="form-control select2bs4" style="width: 100%;" required>
                                    <?php
                                    foreach ($jenis as $data) : ?>
                                        <option value="<?= $data['kode_invoice']; ?>">(<?= $data['kode_invoice']; ?>) <?= $data['jenis_invoice']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modaltambah"><i class="fas fa-sync-alt"></i> Buat Invoice</button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-hover" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Tambah Invoice</th>
                                            <th></th>
                                            <th>Jenis Invoice</th>
                                            <th>Nomor Invoice</th>
                                            <th>Nama Pasien</th>
                                            <th>No. RM</th>
                                            <th>Alamat</th>
                                            <th>Jenis Pelayanan</th>
                                            <th>Nilai</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoice as $u) : ?>
                                            <tr>
                                                <?= form_open('admin/invoice_add/' . $u['id']); ?>
                                                <td>
                                                     <a href="<?php echo base_url() . 'admin/invoice_edit/' . $u['id']; ?>" title="edit" class="btn btn-sm "><i class="fas fa-edit text-warning"></i></a>
                                                </td>
                                                <td>
                                                    <select name="kode" id="kode" class="form-control" style="width: 100%;" required>
                                                        <?php
                                                        foreach ($jenis as $data) : ?>
                                                            <option value="<?= $data['kode_invoice']; ?>">(<?= $data['kode_invoice']; ?>) <?= $data['jenis_invoice']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td> <button type="submit" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modaltambah"><i class="fas fa-sync-alt"></i></button></td>
                                                <td><?php echo $u['jenis_invoice']; ?></td>
                                                 <td><a href="<?php echo base_url() . 'admin/detail_invoice/' . $u['id']; ?>"><strong><?php echo $u['nomor_invoice']; ?></strong></a></td>
                                                <td style="text-transform: capitalize;"><?php echo $u['nama']; ?></td>
                                                <td><?php echo $u['no_rm']; ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $u['alamat']; ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $u['jns_pelayanan']; ?></td>
                                                <td width="100">Rp. <?php echo number_format($u['nilai'], 0, ',', '.'); ?></td>
                                                <td class="text-center">
                                                    <?php if ($u['status'] == "lunas") {
                                                        echo "<div class='badge badge-success badge-outlined'>Lunas</div>"; ?>
                                                        <a target="_blank" href="<?php echo base_url() . 'admin/cetak_invoice/' . $u['id']; ?>" title="Cetak" class="btn btn-md btn-outline-success"><i class="fa fa-address-card"></i></a>
                                                    <?php
                                                    } else if ($u['status'] == "belum lunas") {
                                                        echo "<div class='badge badge-primary'>Menunggu Pembayaran</div>"; ?>
                                                        <a href="<?php echo base_url() . 'admin/invoice_lunas/' . $u['id']; ?>" title="Lunas" class="btn btn-sm btn-outline-success"><i class="fa fa-dollar-sign"></i> Lunas</a>
                                                        <a href="<?php echo base_url() . 'admin/invoice_hapus/' . $u['id']; ?>" title="Batalkan" class="btn btn-sm btn-outline-danger tombol-hapus"><i class="fa fa-delete-left"></i> Batal</a>
                                                    <?php } else {
                                                        echo "-";
                                                    } ?>
                                                </td>
                                                <?= form_close(); ?>
                                            </tr>
                                        <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row no-print">
                            <div class="col-12">
                                <a class='btn btn-success' href="<?php echo base_url() . 'admin/excel'; ?>"><i class='fa fa-newspaper'></i> Export Excel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>