<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() . 'welcome'; ?>" class="brand-link">
        <img src="<?= base_url() ?>dist/img/invoice.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">InvoiceKU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url() . 'welcome'; ?>" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Invoice
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'invoice'; ?>" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Buat Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'invoice/invoice_list'; ?>" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Daftar Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'invoice/invoice_jenis'; ?>" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Jenis Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() . 'login/logout'; ?>" class="nav-link">
                                <i class="nav-icon fa fa-power-off"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>