<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2023 <a href="">AM</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>dist/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>dist/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
<script>
    //sweet alert
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil ' + flashData,
            showConfirmButton: false,
            timer: 1500
        })
    }

    //hapus data
    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin',
            text: "data akan dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    });
</script>

<!-- <script>
    const baseUrl = "<php echo base_url(); ?>"
    const myChart = (chartType) => {
        $.ajax({
            url: baseUrl + 'invoice/chart_data',
            dataType: 'json',
            method: 'get',
            success: data => {
                let chartX = []
                let chartY = []
                data.map(data => {
                    chartX.push(data.month)
                    chartY.push(data.sales)
                })
                const chartData = {
                    labels: chartX,
                    datasets: [{
                        label: 'Sales',
                        data: chartY,
                        backgroundColor: ['lightcoral'],
                        borderColor: ['lightcoral'],
                        borderWidth: 4
                    }]
                }
                const ctx = document.getElementById(chartType).getContext('2d')
                const config = {
                    type: chartType,
                    data: chartData
                }
                switch (chartType) {
                    case 'bar':
                        chartData.datasets[0].backgroundColor = ['skyblue']
                        chartData.datasets[0].borderColor = ['skyblue']
                        break;
                    default:
                        config.options = {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                }
                const chart = new Chart(ctx, config)
            }
        })
    }
    myChart('bar')
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#table-datatable').DataTable();
    });
</script>

</body>

</html>