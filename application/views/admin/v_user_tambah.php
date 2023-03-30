<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Tambah User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-success">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Tambah User</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <?= form_open('admin/user_tambah_aksi'); ?>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="level" class="col-sm-2 col-form-label">No User</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="no_user">
                                            <option value="user1">user 1</option>
                                            <option value="user2">User 2</option>
                                            <option value="user3">User 3</option>
                                            <option value="user4">User 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="password" placeholder="Masukkan Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="level" class="col-sm-2 col-form-label">Level</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="level">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="status" required>
                                            <option value="aktif">Aktif</option>
                                            <option value="tidak aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <a href="<?php echo base_url() . 'admin/user' ?>" class='btn btn-sm btn-outline-warning pull-right'><i class="fa fa-backward"></i> Kembali</a>
                                <button type="submit" class='btn btn-sm btn-outline-success pull-right'><i class="fa fa-plus"></i>Tambahkan</button>
                            </div>
                            <?= form_close(); ?>
                        </div>

                        <div class="card-footer">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>