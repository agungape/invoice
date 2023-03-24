<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                            <h3 class="card-title">Edit User</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <?php foreach ($user as $u) { ?>
                            <?= form_open('admin/user_update') ?>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="id" value="<?php echo $u->id ?>" hidden>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $u->nama ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="username" value="<?php echo $u->username ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="password" value="<?php echo $u->password ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Level</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="level" value="<?php echo $u->level ?> ">
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status" value="<?php echo $u->status ?>">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <a href="<?php echo base_url() . 'admin/user' ?>" class='btn btn-sm btn-outline-warning pull-right'><i class="fa fa-backward"></i> Kembali</a>
                                    <button type="submit" class='btn btn-sm btn-outline-primary pull-right'><i class="fa fa-save"></i> Update Data</button>
                                </div>
                                <?= form_close(); ?>
                            <?php } ?>
                            </div>

                            <div class="card-footer">

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>