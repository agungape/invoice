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
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item "><a href="">Invoice</a></li>
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
                        <h5><i class="fas fa-info"></i> Buat Invoice : </h5>
                        <!-- KDE/RSK/2023/0001 -->
                        <?php
                        $a = $kode['InvoiceMax'];
                        $b = $in['kode_invoice'];
                        $c = $in['jenis_invoice'];
                        $hari = date('Y');
                        $rs = ('RSK');
                        $garing = ('/');
                        $urut = (int)substr($a, 13, 4);
                        $urut++;
                        $kd = $b . $garing . $rs . $garing . $hari  . $garing . sprintf("%04s", $urut);
                        // echo '<h5 class="text-center">' . $c . '</h5><h1 class="text-center">' . $kd . '</h1>'
                        ?>
                        <?= form_open('invoice/invoice_tambah_aksi') ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="jenis">Jenis Invoice</label>
                                <input type="text" class="form-control" name="jenis" value="<?= $c; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="invoice">Nomor Invoice</label>
                                <input type="text" class="form-control" name="invoice" value="<?= $kd; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="nama">Nama Pasien</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pasien" required="required">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" placeholder="Masukkan Keterangan"></textarea>
                            </div>
                            <input type="text" class="form-control" name="kode" value="<?= $b; ?>" readonly hidden>
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Simpan Invoice
                                </button>
                                <a href="<?= base_url() . 'invoice' ?>" class="btn btn-sm btn-warning float-left" style="margin-right: 5px;">
                                    <i class="fas fa-backward-step"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <? form_close() ?>

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>