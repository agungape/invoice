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

<script>
    <?php if ($this->session->flashdata('sukses')) { ?>
        $isi = <?php echo json_encode($this->session->flashdata('sukses')) ?>;
        Swal.fire({
            title: 'Berhasil',
            text: $isi,
            icon: 'success'
        })
    <?php } ?>
    <?php if ($this->session->flashdata('gagal')) { ?>
        $isi = <?php echo json_encode($this->session->flashdata('gagal')) ?>;
        Swal.fire({
            title: 'Gagal',
            text: $isi,
            icon: 'error'
        })
    <?php } ?>

    function deletedata($kode_invoice) {
        Swal.fire({
                title: 'Apakah yakin menghapus?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            },

            function() {
                $.ajax({
                    url: "<?php echo base_url('invoice/invoice_jenis_hapus/') ?>",
                    type: "post",
                    data: {
                        kode_invoice: kode_invoice
                    },
                    success: function() {
                        Swal.fire(
                            'Data Berhasil di Hapus',
                            'success'
                        );
                        $("#delete").fadeTo("slow", 0.7, function() {
                            $(this).remove();
                        });
                    },
                    error: function() {
                        Swal.fire(
                            'Data Gagal di Hapus',
                            'error'
                        );
                    },
                });
            });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table-datatable').DataTable();
    });
</script>

</body>

</html>