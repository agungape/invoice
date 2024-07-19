<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/invoice' ?>">Invoice</a></li>
                        <li class="breadcrumb-item active">Buat Invoice</li>
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
                        <?php
                        $b = $in['kode_invoice'];
                        $c = $in['jenis_invoice'];
                        ?>
                        <?= form_open('admin/invoice_tambah_aksi') ?>
                        <div class="form-group">
                            <span class="text-danger"></span>
                            <label for="inputEmail">Jenis Invoice</label>
                            <input type="text" class="form-control" name="kode" value="<?= $b; ?>" readonly hidden>
                            <input type="text" class="form-control" name="jenis" value="<?= $c; ?>" readonly>
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
                                    <input type="number" class="form-control" id="rm" name="rm" placeholder="Masukkan No. RM">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <span class="text-danger">*</span>
                                    <label for="nama">Nama Pasien</label>
                                    <input style="text-transform: capitalize;" id="nama" type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pasien" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <span class="text-danger">*</span>
                                    <label for="alamat">Alamat</label>
                                    <textarea style="text-transform: capitalize;" id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat" rows="2" required="required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tb">Tinggi Badan</label>
                                    <input style="text-transform: capitalize;" type="number" id="tb" class="form-control" name="tb" placeholder="Cm">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tb">Berat Badan</label>
                                    <input style="text-transform: capitalize;" type="number" id="bb" class="form-control" name="bb" placeholder="Kg">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sh">Suhu Badan</label>
                                    <input style="text-transform: capitalize;" type="number" id="sh" class="form-control" name="sb" placeholder="&deg;C">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger">*</span>
                            <label for="nilai">Nilai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">IDR</span>
                                </div>
                                <input type="text" name="nilai" id="nilai" placeholder="Rp 000.000" class="form-control" required="required">
                            </div>
                            <p style="font-size: small;"> <span class="text-danger">*</span>periksa kembali inputan Nilai anda secara teliti</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                               <div class="form-group">
                                    <span class="text-danger">*</span>
                                    <label for="layanan">Jenis Pelayanan</label>
                                    <select name="layanan[]" class="form-control select2bs4" id="layanan" multiple="multiple" data-placeholder="Pilih Pelayanan" style="width: 100%;" required="required">
                                        <?php foreach ($pelayanan as $data) { ?>
                                            <option value="<?= $data->nama; ?>"><?= $data->nama; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="keterangan">Lainnya</label>
                                    <input style="text-transform: capitalize;" type="text" id="keterangan" class="form-control" name="keterangan" placeholder="Lainnya">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="<?= base_url() . 'admin/invoice' ?>" class='btn btn-sm btn-outline-warning'><i class="fa fa-backward"></i> Kembali</a>
                            <button type="submit" class="btn btn-sm btn-outline-primary" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Simpan Invoice
                            </button>
                        </div>
                    </div>
                </div>
                <? form_close() ?>
            </div>
        </div>
    </section>
</div>