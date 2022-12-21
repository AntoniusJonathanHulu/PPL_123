<?php
$where = array('id' => 1);
$user = $this->db->get_where("user", $where)->row();
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Admin Website</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url() ?>upload/foto/User/<?= $user->avatar; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= site_url("user/detail/1") ?>" class="d-block"><?= $user->name ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu">
                    <a href="<?= site_url('Admin/dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('WartaGereja/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Warta Gereja
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('Khotbah/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Khotbah dan Renungan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('Dokumentasi/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Dokumentasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('DokumenGereja/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-file-contract"></i>
                        <p>
                            Dokumen Gereja
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('PetugasIbadah/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-people-line"></i>
                        <p>
                            Petugas Ibadah
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('TentangGereja/detail/1') ?>" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-church"></i>
                        <p>
                            Tentang Gereja
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('Auth/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-arrow-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>