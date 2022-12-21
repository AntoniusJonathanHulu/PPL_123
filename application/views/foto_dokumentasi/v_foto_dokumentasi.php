<?php
foreach ($dokumentasi as $dkts)
{
    $id = $dkts->id_dokumentasi;
    $judul = $dkts->judul_dokumentasi;
    $tanggal = $dkts->tgl_dokumentasi;
}
?>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline" action="<?= site_url("FotoDokumentasi/search/$id") ?>" method="post">
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
                    <h1 class="m-0">Foto Dokumentasi</h1>
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

            <p>
                Judul: <?= $judul ?><br>
                Tanggal: <?= $tanggal ?>
            </p>

        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Foto Dokumentasi
        </button>
        <p></p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm" 
                   style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama File</th>
                        <th>ID Dokumentasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <?php
                $no = 1;
                foreach ($foto_dokumentasi as $fdkt)
                {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $fdkt->url_foto ?></td>
                        <td><?= $fdkt->id_dokumentasi ?></td>
                        <td>
                            <!-- tombol hapus -->
                            <a href="#"
                               data-delete-url="<?= site_url("FotoDokumentasi/hapus/$fdkt->id_foto/$fdkt->id_dokumentasi") ?>"
                               class="btn btn-danger btn-sm"
                               role="button"
                               onclick="deleteConfirm(this)">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- tombol detail -->
                            <a href="<?= site_url("FotoDokumentasi/detail/$fdkt->id_foto") ?>" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

        <p></p>
        <a href="<?= site_url("Dokumentasi/index") ?>" class="btn btn-warning">
            <i class="fa-solid fa-reply"></i> Kembali
        </a>


        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Foto Dokumentasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart("FotoDokumentasi/tambah/$id") ?>
                        <div class="form-group">
                            <label>File Foto</label>
                            <input 
                                type="file" 
                                name="url_foto" 
                                class="form-control"
                                accept="image/*"
                                required="">
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
