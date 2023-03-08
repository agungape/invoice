<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Invoice BLUD RS Konawe</title>
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

        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <img src="<?= base_url() ?>img/konawe.png" style="position: absolute; width: 70px; height: auto;" align="left">
    <img src="<?= base_url() ?>img/blud.png" style="position: absolute; width: 80px; height: auto;" align="right">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.2; font-weight: bold; font-size:medium;">
                    PEMERINTAH KABUPATEN KONAWE<br>
                    BADAN LAYANAN UMUM DAERAH (BLUD)<br>
                    RUMAH SAKIT KONAWE
                </span><br />
                <span style="font-size: small;">
                    Jln. Diponegoro No.301 Telp. 0408-2421014 Fax. 0408-2422349
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <?php
    $a = $in['nomor_invoice'];
    echo '<p>Unit ' . $a . '</p>'
    ?>

</body>

</html>