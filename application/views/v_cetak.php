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
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Laporan Invoice</h3>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Invoice</th>
                <th>Jenis Invoice</th>
                <th>Nama Pasien</th>
                <th>Keterangan</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            <?php
            $no = 1;
            foreach ($inv as $u) : ?>
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?php echo $u['nomor_invoice']; ?></td>
                    <td><?php echo $u['jenis_invoice']; ?></td>
                    <td><?php echo $u['nama']; ?></td>
                    <td><?php echo $u['keterangan']; ?></td>
                    <td><?php echo $u['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>
</body>

</html>