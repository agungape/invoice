<?php
$bulan_array = ['JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];
header("Content-Type:application/xls");
header("Content-Disposition: attachment; filename=LAPORAN" . $bulan_array[$bulan - 1] . ".xls");
header("Pragma: no-chace");
header("Expires:0");
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <table border='1'>
        <thead align='center'>
            <tr>
                <th colspan='8'>
                    <h3>LAPORAN PENJUALAN</h3>
                </th>
            </tr>
            <tr>
                <th>NO</th>
                <th>DIBUAT</th>
                <th>NOMOR INVOICE</th>
                <th>NAMA PASIEN</th>
                <th>ALAMAT</th>
                <th>JENIS PELAYANAN</th>
                <th>KETERANGAN</th>
                <th>NILAI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total = 0;
            foreach ($invoice as $inv) { ?>
                <tr>
                    <td align='center'><?= $no++; ?></td>
                    <td align='left'><?= $inv['created_at'] ?></td>
                    <td align='left'><?= $inv['nomor_invoice'] ?></td>
                    <td align='left'><?= $inv['nama'] ?></td>
                    <td align='left'><?= $inv['alamat'] ?></td>
                    <td align='left'><?= $inv['jns_pelayanan'] ?></td>
                    <td align='left'><?= $inv['keterangan'] ?></td>
                    <td align='right'><?= number_format($inv['nilai'], 0, ',', '.'); ?></td>
                </tr>

            <?php
                $total += $inv['nilai'];
            } ?>
            <tr>
                <td colspan="7" align="center">JUMLAH </td>
                <td><?= number_format($total, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>