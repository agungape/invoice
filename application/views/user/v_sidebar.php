<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div align="center">
        <a href="<?= base_url() . 'user'; ?>" class="brand-link">
            <img src="<?= base_url() ?>dist/img/invoice.png" alt="Invoice" style="width:30%">
            <h3 class="brand-text"><b>INVOICE</b></h3>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">


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
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'user/invoice'; ?>" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Buat Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'user/invoice_list'; ?>" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Daftar Invoice</p>
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