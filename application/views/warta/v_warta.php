<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline" action="<?= site_url('WartaGereja/search') ?>" method="post">
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
                    <h1 class="m-0">Warta Gereja</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Warta Gereja</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Warta Gereja
        </button>
        <p></p>
        <div class="table-responsive">
            <table class="table" style="width: 100%">
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Isi Warta</th>
                    <th>URL Foto</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;
                foreach ($warta as $wrt)
                {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $wrt->tgl_warta ?></td>
                        <td><?= $wrt->judul_warta ?></td>
                        <td style="width: 40%">
                            <?= (strlen($wrt->isi_warta) > 100) ? substr($wrt->isi_warta, 0, 100) . "..." : "$wrt->isi_warta"; ?>
                        </td>
                        <td><?= $wrt->url_dokumen ?></td>
                        <td>
                            <!-- tombol edit -->
                            <?= anchor('WartaGereja/edit/' . $wrt->id_warta, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>

                            <!-- tombol hapus -->
                            <a href="#"
                               data-delete-url="<?= site_url('WartaGereja/hapus/' . $wrt->id_warta) ?>"
                               class="btn btn-danger btn-sm"
                               role="button"
                               onclick="deleteConfirm(this)">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- tombol detail -->
                            <a href="<?= site_url("WartaGereja/detail/$wrt->id_warta") ?>" class="btn btn-info btn-sm">
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
                        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Warta Gereja</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('WartaGereja/tambah') ?>
                        <div class="form-group">
                            <label>Tanggal Warta Gereja</label>
                            <input type="date" name="tgl_warta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Judul Warta Gereja</label>
                            <input type="text" name="judul_warta" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Isi Warta Gereja</label>
                            <textarea name="isi_warta" rows="3" class="form-control" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto Warta</label>
                            <input 
                                type="file" 
                                name="url_dokumen" 
                                class="form-control"
                                accept="image/*">
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
