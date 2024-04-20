<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASEURL ?>/Dashboard" class="brand-link">
        <img src="<?= BASEURL ?>/public/image/icon.png" alt="SPK AHP" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SPK AHP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= BASEURL ?>/public/template/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= BASEURL ?>/Profile" class="d-block">Admin Profile</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/Dashboard" class="nav-link <?= Utils::urlNow() == 'Dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-gauge"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL ?>/Profile" class="nav-link <?= Utils::urlNow() == 'Profile' ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>