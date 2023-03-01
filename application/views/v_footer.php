<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>dist/js/demo.js"></script>
</body>

</html>

<!--Ajax tambah data  -->
<!-- <script>
    $("#form-tambah-pasien").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $.ajax({
            type: "POST",
            url: "Belajar/tambah",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: true,
            beforeSend: function() {
                $(".loading").show();
                $(".tambah-pasien").hide();
            },
            success: function(respons) {
                $(".loading").hide();
                $(".tambah-pasien").show();

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000
                })

                Toast.fire({
                    icon: "success",
                    title: "asdasd"
                })
            }
        });
    });
</script> -->
<!-- end ajax -->