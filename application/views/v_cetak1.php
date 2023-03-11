<!DOCTYPE html>
<html>

<head>
    <title>Cetak Kartu Anggota</title>
    <style style="text/css">
        .card {
            border: 1px solid #000;
            width: 310px;
            padding: 5px;
        }

        .card-header {
            border-bottom: 1px solid #000;
            text-align: center;
        }

        .card-body {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <img src="<?= base_url() ?>img/konawe.png" style="position: absolute; width: 45px; height: auto;" align="left">
        <img src="<?= base_url() ?>img/blud.png" style="position: absolute; width: 50px; height: auto;" align="right">
        <div class="card-header">
            <table style="width: 100%;">
                <tr>
                    <td align="center">
                        <span style="line-height: 1.2; font-weight: bold; font-size:10px;">
                            PEMERINTAH KABUPATEN KONAWE<br />
                            BADAN LAYANAN UMUM DAERAH (BLUD)<br />
                            RUMAH SAKIT KONAWE
                        </span><br />
                        <span style="font-size: 7px;">
                            Jln. Diponegoro No.301 Telp. 0408-2421014 Fax. 0408-2422349
                        </span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="card-body">
            <?php foreach ($invoice as $u) { ?>
                <div align="center">
                    <span style="line-height: 1.2; font-weight: bold; font-size:8px; ">
                        UNIT <?php echo $u->jenis_invoice ?><br>
                    </span>
                    <span style="font-size:8px;"> <?php echo $u->nomor_invoice ?></span>
                </div><br />
            <?php } ?>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>


</html>