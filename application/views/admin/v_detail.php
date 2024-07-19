<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Detail Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-info">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <?php
            foreach ($invoice as $i) { ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>img/invoice.png" alt="User profile picture">

                                        <h3 class="profile-username text-center" style="text-transform: capitalize;"><?= $i->nama ?></h3>
                                        <p class="text-muted text-center"><?= $i->tgl_lahir ?></p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>No. Rekam Medik</b><br>
                                                <span><?= $i->no_rm ?></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Alamat</b><br>
                                                <span style="text-transform: capitalize;"><?= $i->alamat ?></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Di Buat</b><br>
                                                <span style="text-transform: capitalize;"><?= $i->created_at ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Nomor Invoice</span>
                                            <span class="info-box-number text-center text-muted mb-0"><?php echo $i->nomor_invoice ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Jenis Invoice</span>
                                            <span class="info-box-number text-center text-muted mb-0"><?= $i->jenis_invoice ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Nilai</span>
                                            <span class="info-box-number text-center text-muted mb-0">Rp. <?php echo number_format($i->nilai, 0, ',', '.'); ?></span>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="col-12 col-sm-6 text-center">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Jenis Pelayanan :</b><br>
                                            <p style="text-transform: capitalize;" align="left"><?= $i->jns_pelayanan ?></p><br>
                                            <b>Lainnya:</b>
                                            <p style="text-transform: capitalize;" align="left"><?= $i->keterangan ?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-6 text-center">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Keterangan :</b><br>
                                            <p style="text-transform: capitalize;" align="left">
                                                <tr>
                                                    <td>Tinggi Badan</td>
                                                    <td>:</td>
                                                    <td><?= $i->tinggi_badan ?></td>
                                                </tr><br>
                                                <tr>
                                                    <td>Berat Badan</td>
                                                    <td>:</td>
                                                    <td><?= $i->berat_badan ?></td>
                                                </tr><br>
                                                <tr>
                                                    <td>Suhu Badan</td>
                                                    <td>:</td>
                                                    <td><?= $i->suhu_badan ?></td>
                                                </tr>

                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 text-center pt-5">
                                    <a href="<?= base_url() . 'admin/invoice' ?>" class='btn btn-sm btn-outline-warning'><i class="fa fa-backward"></i> Kembali</a>
                                    <?php if ($i->status == "lunas") { ?>
                                        <a target="_blank" href="<?php echo base_url() . 'admin/cetak_invoice/' . $i->id; ?>" class="btn btn-sm btn-outline-success"><i class="fa fa-address-card"></i> Cetak Invoice</a>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php } ?>
</div>