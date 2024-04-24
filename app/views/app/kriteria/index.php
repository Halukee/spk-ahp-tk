<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kriteria</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?= Utils::generateBreadcrumb($data['breadcrumbs']) ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i class="fa-solid fa-note-sticky"></i> Kriteria
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-add">
                                        <i class="fa-solid fa-plus"></i> Tambah Data
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data['data'] as $key => $item) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $item['kode_kriteria'] ?></td>
                                                <td><?= $item['nama_kriteria'] ?></td>
                                                <td><?= $item['keterangan_kriteria'] ?></td>
                                                <td>
                                                    <a href="<?= BASEURL ?>/Kriteria/edit/<?= $item['id'] ?>" class="btn btn-warning btn-edit btn-sm">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                    <a href="<?= BASEURL ?>/Kriteria/delete/<?= $item['id'] ?>" class="btn btn-danger btn-delete btn-sm">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>