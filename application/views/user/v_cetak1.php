<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Invoice</title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table th {
            text-align: center;
            line-height: 1.1;
            font-weight: bold;
            font-size: 7px;
            border-bottom: 1px solid #000;
        }

        #tabel {
            padding-top: 5px;
        }

        #tabel td {
            text-align: left;
            line-height: 1.1;
            font-size: 8px;
        }

        #tabel tr {
            padding-bottom: 10px;
        }

        #tabel1 th {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            text-align: center;
            line-height: 1.1;
            font-size: 7px;
        }
        
        .watermark {

            position: fixed;
            /*bottom: 5px;*/
            /*right: 5px;*/
            top: 0.8%;
            left: 10%;
            transform: translate(-10%, -10%);
            font-size: 45px;
            font-weight: bold;
            color: #cccccc;
            opacity: 0.5;
            z-index: -1;
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
    </style>
</head>

<body>
 <div class="watermark">LUNAS</div>
    <table id="table" style="width: 100%;">
        <tr>
            <th>
                <img src="<?= base_url() ?>img/konawe.png" style=" width: 25px; height: auto;">
            </th>
            <th>
                PEMERINTAH KABUPATEN KONAWE<br>
                BADAN LAYANAN UMUM DAERAH (BLUD)<br>
                RUMAH SAKIT KONAWE<br />
                <span style="font-size: 4px;">
                    Jln. Diponegoro No.301 Telp. 0408-2421014 Fax. 0408-2422349
                </span>
            </th>
            <th>
                <img src="<?= base_url() ?>img/logo.png" style="width:25px; height: auto;">
            </th>
        </tr>
    </table>
    <table id="tabel1" style="width: 100%;">
        <th>
            <?php foreach ($invoice as $i) { ?>
                <?php echo $i->jenis_invoice ?>
                <br>
                <?php echo $i->nomor_invoice ?>
            <?php } ?>
        </th>
    </table>

    <table id="tabel">
        <?php foreach ($invoice as $i) { 
             // Ambil nilai waktu dari setiap data
            $waktu_db = $i->created_at;

            // Konversi nilai waktu ke dalam format waktu 
            $waktu_view = date("d/m/Y", strtotime($waktu_db)); ?>

            <tr>
                <td width="33%">Tanggal</td>
                <td width="2%">:</td>
                <td><?php echo $waktu_view; ?></td>
            </tr>
            <tr>
                <td width="33%">No. Rekam Medis</td>
                <td width="2%">:</td>
                <td>
                    <?php if ($i->no_rm > 0) { ?>
                        <?php echo $i->no_rm ?>
                    <?php
                    } else {
                        echo "-";
                    } ?>
                </td>
            </tr>
            <tr>
                <td width="25%">Nama Pasien</td>
                <td width="2%">:</td>
                <td style="text-transform: capitalize;"><?php echo $i->nama; ?></td>
            </tr>
            <tr>
                <td width="25%">Tanggal Lahir</td>
                <td width="2%">:</td>
                <td>
                    <?php if ($i->tgl_lahir > 0) { ?>
                        <?php echo $i->tgl_lahir ?>
                    <?php
                    } else {
                        echo "-";
                    } ?>
                </td>
            </tr>
            <tr>
                <td width="25%">Alamat</td>
                <td width="2%">:</td>
                <td style="text-transform: capitalize;"><?php echo $i->alamat; ?></td>
            </tr>
            <tr>
                <td valign="top" width="25%">Jenis Pelayanan</td>
                <td valign="top" width="2%">:</td>
                <td style="text-transform: capitalize;"><?php echo $i->jns_pelayanan; ?></td>
            </tr>
            <tr>
                <td valign="top" width="25%">Keterangan</td>
                <td valign="top" width="2%">:</td>
                <td style="text-transform: capitalize;">
                    <?php if ($i->tinggi_badan > 0) { ?>
                        Tb:<?php echo $i->tinggi_badan ?> cm.&nbsp;
                    <?php
                    } else {
                        echo "";
                    } ?>
                    <?php if ($i->berat_badan > 0) { ?>
                        Bb:<?php echo $i->berat_badan ?> kg.&nbsp;
                    <?php
                    } else {
                        echo "";
                    } ?>
                    <?php if ($i->suhu_badan > 0) { ?>
                        Sb:<?php echo $i->suhu_badan ?> &deg;C.
                    <?php
                    } else {
                        echo "";
                    } ?>
                    <?php if ($i->keterangan == true) { ?>
                        Lainnya : <?php echo $i->keterangan; ?>
                    <?php
                    } else {
                        echo "-";
                    } ?>
                </td>
            </tr>
            <tr>
                <td valign="top" width="25%">Nilai Tagihan</td>
                <td valign="top" width="2%">:</td>
                <td style="text-transform: capitalize;"><strong>Rp <?php echo number_format($i->nilai, 0, ',', '.'); ?></strong></td>
            </tr>

        <?php } ?>
    </table>
    
    <div style="font-size: 7px;" align="center">
        <p>HARAP SIMPAN STRUK <strong>INVOICE</strong><br>SEBAGAI BUKTI PEMBAYARAN ANDA</p>
        <p>TERIMA KASIH</p>
    </div>
    <div style="height:100px; color:white;">
        <hr style="border-top: 1px dashed red;">
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>


</html>