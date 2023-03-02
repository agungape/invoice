<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered">
                            <?= form_open('invoice/form'); ?>
                            <tr>
                                <th>Jenis Invoice</th>
                                <select name="id" id="">
                                    <option value="">Pilih Jenis Invoice</option>
                                    <?php foreach ($fk as $data) : ?>
                                        <option value="<?= $data['id_fakultas']; ?>"><?= $data['nama_fakultas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <tr>
                            <tr>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Generate</button>
                            </tr>
                            <?= form_close(); ?>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <tr>
                            <td><input type="text" name="invoice" id="invoice" value=""></td>

                        </tr>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>