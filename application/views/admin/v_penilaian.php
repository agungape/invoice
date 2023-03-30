<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penilaian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penilaian</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-3">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php foreach ($user1 as $u) { ?>
                                    <?php echo $u['jumlah_invoice']; ?>
                                <?php } ?></h3>
                            <p> <?php foreach ($user as $u) {
                                    if ($u['no_user'] == "user1") {
                                        echo $u['nama'];
                                    }
                                } ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contact"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-3">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3><?php foreach ($user2 as $u) { ?>
                                    <?php echo $u['jumlah_invoice']; ?>
                                <?php } ?></h3>

                            <p> <?php foreach ($user as $u) {
                                    if ($u['no_user'] == "user2") {
                                        echo $u['nama'];
                                    }
                                } ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contact"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-3">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3><?php foreach ($user3 as $u) { ?>
                                    <?php echo $u['jumlah_invoice']; ?>
                                <?php } ?></h3>

                            <p> <?php foreach ($user as $u) {
                                    if ($u['no_user'] == "user3") {
                                        echo $u['nama'];
                                    }
                                } ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contact"></i>
                        </div>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-md-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Diagram Invoice </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="user1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-teal">
                        <div class="card-header">
                            <h3 class="card-title">Diagram Invoice</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart">
                                <canvas id="user2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-maroon">
                        <div class="card-header">
                            <h3 class="card-title">Diagram Invoice</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart">
                                <canvas id="user3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-purple">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Aktifitas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-striped table-hover" id="table-datatable">
                                    <thead>
                                        <tr class="align-items-center">
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Aktifitas</th>
                                            <th>Tabel</th>
                                            <th>Waktu</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($log as $u) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $u['username']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($u['aktifitas'] == "mengubah") {
                                                        echo "<span class='badge badge-warning'>Mengubah</span>";
                                                    } else if ($u['aktifitas'] == "menambahkan") {
                                                        echo "<span class='badge badge-success'>Membuat</span>";
                                                    } else if ($u['aktifitas'] == "menghapus") {
                                                        echo "<span class='badge badge-danger'>Menghapus</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $u['tb_aktifitas']; ?></td>
                                                <td><?php echo $u['waktu_log']; ?></td>
                                                <td>
                                                    <a title="Detail" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#modal-default<?php echo $u['id']; ?>"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php foreach ($log as $u) : ?>

    <div class="modal fade" id="modal-default<?php echo $u['id']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail</h4>
                </div>
                <div class="modal-body">
                    <?php $data = json_decode($u['data_aktifitas'], true); ?>
                    <?php if ($u['tb_aktifitas'] == 'invoice' and $u['aktifitas'] == 'menambahkan') {
                    ?>
                        <table>
                            <tr>
                                <td>Nomor Invoice</td>
                                <td>:</td>
                                <td> <?php echo $data['nomor_invoice']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td> <?php echo $data['nama']; ?></td>
                            </tr>
                        </table>
                    <?php
                    } elseif ($u['tb_aktifitas'] == 'invoice' and $u['aktifitas'] == 'mengubah') {
                    ?>
                        <table>
                            <tr>
                                <td>Nomor Invoice</td>
                                <td>:</td>
                                <td> <?php echo $data['nomor_invoice']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td> <?php echo $data['nama']; ?></td>
                            </tr>
                        </table>
                    <?php
                    } elseif ($u['tb_aktifitas'] == 'invoice' and $u['aktifitas'] == 'menghapus') {
                    ?>
                        <table>
                            <tr>
                                <td>Nomor Invoice</td>
                                <td>:</td>
                                <td> <?php echo $data['nomor_invoice']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td> <?php echo $data['nama']; ?></td>
                            </tr>
                        </table>
                    <?php
                    } elseif ($u['tb_aktifitas'] == 'user' and $u['aktifitas'] == 'menambahkan') {
                    ?>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td> <?php echo $data['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td> <?php echo $data['username']; ?></td>
                            </tr>
                        </table>
                    <?php } elseif ($u['tb_aktifitas'] == 'user' and $u['aktifitas'] == 'mengubah') {
                    ?>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td> <?php echo $data['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td> <?php echo $data['username']; ?></td>
                            </tr>
                        </table>
                    <?php } elseif ($u['tb_aktifitas'] == 'user' and $u['aktifitas'] == 'menghapus') {
                    ?>
                        <table>
                            <tr>
                                <td>Id User</td>
                                <td>:</td>
                                <td> <?php echo $data['id']; ?></td>
                            </tr>
                        </table>
                    <?php } ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<script script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('user1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($nilai1 as $u) { ?> '<?php echo $u['bulan']; ?>',
                <?php } ?>
            ],
            datasets: [{
                label: 'Jumlah Invoice / Bulan',
                data: [
                    <?php foreach ($nilai1 as $u) { ?>
                        <?php echo $u['jumlah_user']; ?>,
                    <?php } ?>
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('user2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($nilai2 as $u) { ?> '<?php echo $u['bulan']; ?>',
                <?php } ?>
            ],
            datasets: [{
                label: 'Jumlah Invoice / Bulan',
                data: [
                    <?php foreach ($nilai2 as $u) { ?>
                        <?php echo $u['jumlah_user']; ?>,
                    <?php } ?>
                ],
                backgroundColor: 'rgba(10, 225, 147, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('user3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($nilai3 as $u) { ?> '<?php echo $u['bulan']; ?>',
                <?php } ?>
            ],
            datasets: [{
                label: 'Jumlah Invoice / Bulan',
                data: [
                    <?php foreach ($nilai3 as $u) { ?>
                        <?php echo $u['jumlah_user']; ?>,
                    <?php } ?>
                ],
                backgroundColor: 'rgba(243, 0, 82, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>