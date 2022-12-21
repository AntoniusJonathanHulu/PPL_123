<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline" action="<?= site_url('Dokumentasi/search') ?>" method="post">
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
                    <h1 class="m-0">Dokumentasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Foto Dokumentasi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Dokumentasi
        </button>
        <p></p>
        <table class="table" style="width: 100%">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
                <th>CRUD Foto</th>
            </tr>

            <?php
            $no = 1;
            foreach ($dokumentasi as $dkts)
            {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dkts->tgl_dokumentasi ?></td>
                    <td><?= $dkts->judul_dokumentasi ?></td>
                    <td style="width: 40%">
                        <?= (strlen($dkts->deskripsi_dokumentasi) > 100) ? substr($dkts->deskripsi_dokumentasi, 0, 100) . "..." : "$dkts->deskripsi_dokumentasi"; ?>
                    </td>
                    <td>
                        <!-- tombol edit -->
                        <?= anchor('Dokumentasi/edit/' . $dkts->id_dokumentasi, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>

                        <!-- tombol hapus -->
                        <a href="#"
                           data-delete-url="<?= site_url('Dokumentasi/hapus/' . $dkts->id_dokumentasi) ?>"
                           class="btn btn-danger btn-sm"
                           role="button"
                           onclick="deleteConfirm(this)">
                            <i class="fa fa-trash"></i>
                        </a>

                        <!-- tombol detail -->
                        <a href="<?= site_url("Dokumentasi/detail/$dkts->id_dokumentasi") ?>" class="btn btn-info btn-sm">
                            <i class="fa-solid fa-circle-info"></i>
                        </a>
                    </td>
                    <td>
                        <!--tombol lihat foto-->
                        <a href="<?= site_url("FotoDokumentasi/index/$dkts->id_dokumentasi") ?>" class="btn btn-success btn-sm">
                            <i class="fa fa-images"></i> Lihat Foto
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Dokumentasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('Dokumentasi/tambah') ?>
                        <div class="form-group">
                            <label>Tanggal Dokumentasi</label>
                            <input type="date" name="tgl_dokumentasi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Judul Dokumentasi</label>
                            <input type="text" name="judul_dokumentasi" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Dokumentasi</label>
                            <textarea name="deskripsi_dokumentasi" rows="3" class="form-control" required=""></textarea>
                        </div>
                        <button type="reset" class="btn btn-warning" >Reset</button>
                        <button type="submit" class="btn btn-primary" value="upload">Simpan</button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
