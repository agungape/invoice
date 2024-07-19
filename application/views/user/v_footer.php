<footer class="main-footer">
    <p align="center">Copyright &copy; <?= date('Y') ?> <a href="">Sistem Informasi BLUD Rumah Sakit Konawe</a></p>
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
<script src="<?= base_url() ?>dist/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>dist/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>dist/plugins/datatables/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>dist/plugins/datatables/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>dist/js/jquery.masknumber.js"></script>
<script src="<?= base_url() ?>dist/plugins/select2/js/select2.full.min.js"></script>
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
            title: 'Konfirmasi',
            text: "Data Akan Dihapus!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Batal',
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#table-datatable').DataTable();
    });
</script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<script>
    const input = document.getElementById("nilai");

    // Add event listener to input field
    input.addEventListener("input", function(event) {
        // Get input value
        let value = event.target.value;

        // Remove non-numeric characters
        value = value.replace(/[^0-9]/g, '');

        // Format value as currency
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });

        const formattedValue = formatter.format(value);

        // Update input value
        event.target.value = formattedValue;
    });
</script>
</body>

</html>