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
                        <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/invoice' ?>">Invoice</a></li>
                        <li class="breadcrumb-item active">Edit Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Invoice</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-center d-flex align-items-center justify-content-center">
                            <div class="lead mb-4">
                                <img src="<?= base_url() ?>img/blud.png" style="width: 150px; height: auto;" align="center">
                                <br>
                                <h2><strong>BLUD RS KONAWE</strong></h2>
                            </div>
                        </div>
                        <?php foreach ($invoice as $u) { ?>
                            <?= form_open('admin/invoice_update') ?>
                            <div class="form-group">
                                <span class="text-danger">*</span>
                                <label for="inputName">Nomor Invoice</label>
                                <input type="text" class="form-control" name="invoice" value="<?php echo $u->nomor_invoice ?>" readonly>
                            </div>
                            <div class="form-group">
                                <span class="text-danger">*</span>
                                <label for="inputEmail">Jenis Invoice</label>
                                <input type="text" class="form-control" name="jenis" value="<?php echo $u->jenis_invoice ?>" readonly>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Invoice</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="rm">No. Rekam Medik</label>
                                    <input type="text" class="form-control" id="rm" name="rm" value="<?php echo $u->no_rm ?>">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <span class="text-danger">*</span>
                                    <label for="nama">Nama Pasien</label>
                                    <input style="text-transform: capitalize;" id="nama" type="text" class="form-control" name="nama" value="<?php echo $u->nama ?>" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <span class="text-danger">*</span>
                                    <label for="tanggal">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo $u->tgl_lahir ?>" required="required">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <span class="text-danger">*</span>
                                    <label for="alamat">Alamat</label>
                                    <input style="text-transform: capitalize;" id="alamat" type="text" class="form-control" name="alamat" value="<?php echo $u->alamat ?>" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger">*</span>
                            <label for="nilai">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" name="nilai" id="nilai" value="<?php echo $u->nilai ?>" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="layanan">Jenis Pelayanan</label>
                            <select name="layanan[]" id="layanan" class="form-control select2bs4" multiple="multiple" style="width: 100%;">
                                <?php foreach ($pelayanan as $data) { ?>
                                    <option value="<?= $data->nama; ?>" <?php echo in_array($data->nama, explode(',', $u->jns_pelayanan)) ? 'selected' : ''; ?>><?php echo $data->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="id" value="<?php echo $u->id ?>" readonly hidden>
                        <input type="text" class="form-control" name="kode" value="<?php echo $u->kode_invoice ?>" readonly hidden>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea style="text-transform: capitalize;" id="keterangan" class="form-control" name="keterangan"><?php echo $u->keterangan ?></textarea>
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url() . 'admin/invoice' ?>" class='btn btn-sm btn-outline-warning'><i class="fa fa-backward"></i> Kembali</a>
                            <button type="submit" class="btn btn-sm btn-outline-primary" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Update Invoice
                            </button>
                        </div>

                        <? form_close() ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>