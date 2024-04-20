<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Profile</h1>
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-user"></i> My Profile
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?= BASEURL ?>/public/image/male.png" alt="Male">
                            </div>
                            <hr />
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Nama
                                        </div>
                                        <div>
                                            Bima Ega Farizky
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Role
                                        </div>
                                        <div>
                                            Admin
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <strong>Email / Username</strong> <br />
                                    bimaega15@gmail.com / bimaega15
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa-solid fa-pen-to-square"></i> Edit Profile
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-edit">
                                        <i class="fa-solid fa-pencil"></i> Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>Nama</div>
                                        <div>Bima Ega Farizky</div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>Alamat</div>
                                        <div>
                                            JL. Diponegoro Gg. Nenas LK. VI Kisaran
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>Jenis Kelamin</div>
                                        <div>
                                            Laki-laki
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>No. Handphone</div>
                                        <div>
                                            082277506232
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>