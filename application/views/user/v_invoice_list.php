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
                                            <th>#</th>
                                            <th>Di Buat</th>
                                            <th>Jenis Invoice</th>
                                            <th>Nomor Invoice</th>
                                            <th>Nama Pasien</th>
                                            <th>No. RM</th>
                                            <th>Alamat</th>
                                            <th>Jenis Pelayanan</th>
                                            <th>Nilai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($invoice as $u) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $u['created_at']; ?></td>
                                                <td><?php echo $u['jenis_invoice']; ?></td>
                                                <td><a href="<?php echo base_url() . 'user/detail_invoice/' . $u['id']; ?>"><strong><?php echo $u['nomor_invoice']; ?></strong></a></td>
                                                <td style="text-transform: capitalize;"><?php echo $u['nama']; ?></td>
                                                <td><?php echo $u['no_rm']; ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $u['alamat']; ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $u['jns_pelayanan']; ?></td>
                                                <td width="100">Rp. <?php echo number_format($u['nilai'], 0, ',', '.'); ?></td>
                                                <td class="text-center">
                                                    <?php if ($u['status'] == "lunas") {
                                                        echo "<div class='badge badge-success badge-outlined'>Lunas</div>"; ?>
                                                    <?php
                                                    } else if ($u['status'] == "belum lunas") {
                                                        echo "<div class='badge badge-primary'>Menunggu Pembayaran</div>"; ?>
                                                    <?php } else {
                                                        echo "-";
                                                    }
                                                    ?>
                                                </td>
                                                <td> 
                                                    <?php if ($u['status'] == "lunas") { ?>
                                                    <a target="_blank" href="<?php echo base_url() . 'user/cetak_invoice/' . $u['id']; ?>" title="cetak invoice" class="btn btn-sm"><i class="fa fa-address-card text-success"></i></a>
                                                    <?php }  ?>
                                                    <a href="<?php echo base_url() . 'user/invoice_edit/' . $u['id']; ?>" title="edit" class="btn btn-sm "><i class="fas fa-edit text-warning"></i></a>
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