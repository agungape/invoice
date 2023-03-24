<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        Halaman ini untuk membuat <b>User Baru</b> baru. Klik tombol <b>Tambah User</b> di bagian kiri faktur untuk membuat.
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <a href="<?php echo base_url() . 'admin/user_tambah' ?>" class='btn btn-sm btn-outline-success pull-right'><i class="fa fa-plus"></i> Tambah User</a><br><br>
                                <table class="table table-striped table-hover" id="table-datatable">
                                    <thead>
                                        <tr class="align-items-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($user as $u) : ?>
                                            <tr class="">
                                                <td><?= $no++ ?></td>
                                                <td><?php echo $u['nama']; ?></td>
                                                <td><?php echo $u['username']; ?></td>
                                                <td><?php echo $u['password']; ?></td>
                                                <td><?php echo $u['level']; ?></td>
                                                <td><?php echo $u['status']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'admin/user_edit/' . $u['id']; ?>" title="edit" class="btn btn-sm btn-outline-warning"><i class="fa fa-pencil-alt"></i></a>
                                                    <a href="<?php echo base_url() . 'admin/user_hapus/' . $u['id']; ?>" title="hapus" class="btn btn-sm btn-outline-danger tombol-hapus"><i class="fa fa-trash-alt"></i></a>
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