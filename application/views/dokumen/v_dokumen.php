<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline" action="<?= site_url('DokumenGereja/search') ?>" method="post">
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
                    <h1 class="m-0">Dokumen Gereja</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dokumen Gereja</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Dokumen Gereja
        </button>
        <p></p>
        <table class="table" style="width: 100%">
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Deskripsi Dokumen</th>
                <th>File Dokumen</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($dokumen as $dkm)
            {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dkm->judul_dokumen ?></td>
                    <td style="width: 40%">
                        <?= (isset($dkm->deskripsi_dokumen) && strlen($dkm->deskripsi_dokumen) > 100) ? substr($dkm->deskripsi_dokumen, 0, 50) . '...' : $dkm->deskripsi_dokumen ?>
                    </td>
                    <td>
                        <?= (isset($dkm->url_dokumen) && strlen($dkm->url_dokumen) > 50) ? substr($dkm->url_dokumen, 0, 50) . '...' : $dkm->url_dokumen ?>
                    </td>
                    <td>
                        <!-- tombol edit -->
                        <?= anchor('DokumenGereja/edit/' . $dkm->id_dokumen, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>

                        <!-- Button hapus -->
                        <a href="#"
                           data-delete-url="<?= site_url('DokumenGereja/hapus/' . $dkm->id_dokumen) ?>"
                           class="btn btn-danger btn-sm"
                           role="button"
                           onclick="deleteConfirm(this)">
                            <i class="fa fa-trash"></i>
                        </a>

                        <!-- tombol detail -->
                        <a href="<?= site_url("DokumenGereja/detail/$dkm->id_dokumen") ?>" class="btn btn-info btn-sm">
                            <i class="fa-solid fa-circle-info"></i>
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
                        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Dokumen Gereja</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= site_url('DokumenGereja/tambah') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul Dokumen Gereja</label>
                                <input type="text" name="judul_dokumen" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Dokumen Gereja</label>
                                <textarea name="deskripsi_dokumen" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Dokumen (Boleh Kosong)</label>
                                <input 
                                    type="file" 
                                    name="url_dokumen" 
                                    class="form-control" 
                                    accept=".doc, .docx, .pdf, .html, .ppt, .pptx">
                            </div>

                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
