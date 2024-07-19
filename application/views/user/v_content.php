<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Wellcome</li>
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
                            <h3> <?php echo $this->m_invoice->get_data('invoice')->num_rows(); ?></h3>

                            <p>Jumlah Invoice</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-3">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3> <?php echo $this->m_invoice->get_data('jns_pelayanan')->num_rows(); ?></h3>

                            <p>Jumlah Jenis Pelayanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-medkit"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-3">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3> <?php foreach ($jml_nilai as $u) { ?>
                                    Rp <?php echo number_format($u['jumlah_nilai'], 0, ',', '.'); ?>
                                <?php } ?></h3>

                            <p>Jumlah Nilai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-calculator"></i>
                        </div>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-md-6">
                    <div class="card card-info">
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
                                <canvas id="bar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-maroon">
                        <div class="card-header">
                            <h3 class="card-title">Diagram Nilai</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="nilai" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('bar').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($invoice as $u) { ?> '<?php echo $u['bulan']; ?>',
                <?php } ?>
            ],
            datasets: [{
                label: 'Jumlah Invoice / Bulan',
                data: [
                    <?php foreach ($invoice as $u) { ?>
                        <?php echo $u['jumlah_invoice']; ?>,
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

    var ctx = document.getElementById('nilai').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($nilai as $u) { ?> '<?php echo $u['bulan']; ?>',
                <?php } ?>
            ],
            datasets: [{
                label: 'Jumlah Nilai / Bulan',
                data: [
                    <?php foreach ($nilai as $u) { ?>
                        <?php echo $u['jumlah_nilai']; ?>,
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