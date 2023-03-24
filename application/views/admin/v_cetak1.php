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
            /* font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; */
            text-align: left;
            line-height: 1.1;
            font-size: 8px;
        }

        #tabel1 th {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            text-align: center;
            line-height: 1.1;
            font-size: 7px;
        }
    </style>
</head>

<body>

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
        <?php foreach ($invoice as $i) { ?>
            <tr>
                <td width="35%">No. Rekam Medis</td>
                <td width="2%">:</td>
                <td><?php echo $i->no_rm; ?></td>
            </tr>
            <tr>
                <td width="25%">Nama Pasien</td>
                <td width="2%">:</td>
                <td style="text-transform: capitalize;"><?php echo $i->nama; ?></td>
            </tr>
            <tr>
                <td width="25%">Tanggal Lahir</td>
                <td width="2%">:</td>
                <td><?php echo $i->tgl_lahir; ?></td>
            </tr>
            <tr>
                <td width="25%">Alamat</td>
                <td width="2%">:</td>
                <td style="text-transform: capitalize;"><?php echo $i->alamat; ?></td>
            </tr>
            <tr style="padding-bottom:10px;">
                <td valign="top" width="25%">Jenis Pelayanan</td>
                <td valign="top" width="2%">:</td>
                <td style="text-transform: capitalize;"><?php echo $i->jns_pelayanan; ?></td>
            </tr>
            <tr>
                <td width="25%">Keterangan</td>
                <td width="2%">:</td>
                <td style="text-transform: capitalize;"><?php echo $i->keterangan; ?></td>
            </tr>
            <tr style="padding-bottom:10px;">
                <td valign="top" width="25%">Nilai Tagihan</td>
                <td valign="top" width="2%">:</td>
                <td style="text-transform: capitalize;">Rp <?php echo number_format($i->nilai, 0, ',', '.'); ?></td>
            </tr>
        <?php } ?>
    </table>



    <script type="text/javascript">
        window.print();
    </script>
</body>


</html>