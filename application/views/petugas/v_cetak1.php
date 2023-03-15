<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Cetak Invoice</title>
    <style>
        .card {
            border: 1px solid #000;
            width: 350px;
            padding: 6px;
        }

        .card-header {
            border-bottom: 1px solid #000;
            text-align: center;
            padding: auto;
        }
    </style>
</head>

<body>
    <div class="card">
        <p style="text-align: left;"><img src="<?= base_url() ?>img/konawe.png" style="position: absolute; width: 50px; height: auto;"></p>
        <p style="text-align: right; width: 85%;"><img src="<?= base_url() ?>img/blud.png" style="position: absolute; width: 55px; height: auto;"></p>
        <div class="card-header">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="line-height:1.5; font-weight: bold; font-size:10px;">
                            PEMERINTAH KABUPATEN KONAWE<br>
                            BADAN LAYANAN UMUM DAERAH (BLUD)<br>
                            RUMAH SAKIT KONAWE<br />
                            <span style="font-size: 7px;">
                                Jln. Diponegoro No.301 Telp. 0408-2421014 Fax. 0408-2422349
                            </span>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card-body">
            <?php foreach ($invoice as $u) { ?>
                <div align="center">
                    <span style="line: height 5px;; font-size:8px; ">
                        <?php echo $u->jenis_invoice ?><br>
                        <?php echo $u->nomor_invoice ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>


</html>