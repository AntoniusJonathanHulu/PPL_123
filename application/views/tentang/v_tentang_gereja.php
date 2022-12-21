<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline" action="<?= site_url('TentangGereja/search') ?>" method="post">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Cari" aria-label="Search" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
        </a>
    </li>
</ul>
</nav>
<!-- /.navbar -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tentang Gereja</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tentang Gereja</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Tentang Gereja
        </button>
        <blockquote>
            <p>Jangan hapus tentang gereja dengan id = 1. Cukup ubah jika perlu.</p>
        </blockquote>
        <div class="table-responsive">
            <table class="table" style="width: 100%">
                <tr>
                    <th>Id</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Jadwal Ibadah</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Profil Pendeta</th>
                    <th>Sosmed FB</th>
                    <th>Sosmed IG</th>
                    <th>Logo Gereja</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;
                foreach ($tentang as $ttg)
                {
                    ?>
                    <tr>
                        <td><?= $ttg->id_tentang ?></td>
                        <td>
                            <?= (isset($ttg->visi) && strlen($ttg->visi) > 20) ? substr($ttg->visi, 0, 20) . "..." : "$ttg->visi"; ?>
                        </td>
                        <td>
                            <?= (isset($ttg->misi) && strlen($ttg->misi) > 20) ? substr($ttg->misi, 0, 20) . "..." : "$ttg->misi"; ?>
                        </td>
                        <td>
                            <?= (isset($ttg->jadwal_ibadah) && strlen($ttg->jadwal_ibadah) > 20) ? substr($ttg->jadwal_ibadah, 0, 20) . "..." : "$ttg->jadwal_ibadah"; ?>
                        </td>
                        <td>
                            <?= (isset($ttg->alamat) && strlen($ttg->alamat) > 20) ? substr($ttg->alamat, 0, 20) . "..." : "$ttg->alamat"; ?>
                        </td>
                        <td>
                            <?= (isset($ttg->kontak) && strlen($ttg->kontak) > 20) ? substr($ttg->kontak, 0, 20) . "..." : "$ttg->kontak"; ?>
                        </td>
                        <td>
                            <?= (isset($ttg->profil_pendeta) && strlen($ttg->profil_pendeta) > 20) ? substr($ttg->profil_pendeta, 0, 20) . "..." : "$ttg->profil_pendeta"; ?>
                        </td>
                        <td>
                            <?= (isset($ttg->sosmed_fb) && strlen($ttg->sosmed_fb) > 20) ? substr($ttg->sosmed_fb, 0, 20) . "..." : "$ttg->sosmed_fb"; ?>
                        </td>
                        <td>
                            <?= (isset($ttg->sosmed_ig) && strlen($ttg->sosmed_ig) > 20) ? substr($ttg->sosmed_ig, 0, 20) . "..." : "$ttg->sosmed_ig"; ?>
                        </td>
                        <td>
                            <?= (isset($ttg->logo_gereja) && strlen($ttg->logo_gereja) > 20) ? substr($ttg->logo_gereja, 0, 20) . "..." : "$ttg->logo_gereja"; ?>
                        </td>
                        <td>
                            <!-- tombol edit -->
                            <?= anchor('TentangGereja/edit/' . $ttg->id_tentang, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>

                            <!-- tombol hapus -->
                            <a href="#"
                               data-delete-url="<?= site_url('TentangGereja/hapus/' . $ttg->id_tentang) ?>"
                               class="btn btn-danger btn-sm"
                               role="button"
                               onclick="deleteConfirm(this)">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- tombol detail -->
                            <a href="<?= site_url("TentangGereja/detail/$ttg->id_tentang") ?>" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Tentang Gereja</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('TentangGereja/tambah') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Visi</label>
                                <textarea name="visi" rows="4" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Misi</label>
                                <textarea name="misi" rows="4" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Ibadah</label>
                                <textarea name="jadwal_ibadah" rows="3" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" rows="2" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Google Map</label>
                                <textarea name="google_map" rows="2" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kontak</label>
                                <textarea name="kontak" rows="2" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Profil Pendeta</label>
                                <textarea name="profil_pendeta" rows="4" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Sosmed FB</label>
                                <textarea name="sosmed_fb" rows="2" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Sosmed IG</label>
                                <textarea name="sosmed_ig" rows="2" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Logo Gereja</label>
                                <input 
                                    type="file" 
                                    name="logo_gereja" 
                                    class="form-control"
                                    accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Tema</label>
                                <textarea name="tema" rows="2" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Sub Tema</label>
                                <textarea name="sub_tema" rows="2" class="form-control" required=""></textarea>
                            </div>

                            <button type="reset" class="btn btn-warning" >Reset</button>
                            <button type="submit" class="btn btn-primary" value="upload">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
