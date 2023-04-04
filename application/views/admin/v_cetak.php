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

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        #tabel th {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <table id="tabel" style="width: 100%;">
        <tr>
            <th>
                <img src="<?= base_url() ?>img/konawe.png" style=" width: 100px; height: auto;">
            </th>
            <th>
                PEMERINTAH KABUPATEN KONAWE<br>
                BADAN LAYANAN UMUM DAERAH (BLUD)<br>
                RUMAH SAKIT KONAWE<br />
                <span style="font-size: 15px;">
                    Jln. Diponegoro No.301 Telp. 0408-2421014 Fax. 0408-2422349
                </span>
            </th>
            <th>
                <img src="<?= base_url() ?>img/logo.png" style="width:100px; height: auto;">
            </th>
        </tr>
    </table>
    <hr>
    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Invoice</th>
                <th>Jenis Invoice</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Jenis Pelayanan</th>
                <th>Nilai</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            <?php
            $no = 1;
            foreach ($invoice as $u) : ?>
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?php echo $u['nomor_invoice']; ?></td>
                    <td><?php echo $u['jenis_invoice']; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $u['nama']; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $u['alamat']; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $u['jns_pelayanan']; ?></td>
                    <td>Rp <?php echo number_format($u['nilai'], 0, ',', '.'); ?></td>
                    <td><?php echo $u['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>


</html>