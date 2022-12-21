<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline" action="<?= site_url('khotbah/search') ?>" method="post">
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
                    <h1 class="m-0">Khotbah dan Renungan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Khotbah dan Renugan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Khotbah/Renungan
        </button>
        <p></p>
        <table class="table" style="width: 100%">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Judul Khotbah</th>
                <th>Ayat Khotbah</th>
                <th>Isi Khotbah</th>
                <th>URL Gambar</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($khotbah as $ktbh)
            {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $ktbh->tgl_khotbah ?></td>
                    <td><?= $ktbh->judul_khotbah ?></td>
                    <td><?= $ktbh->ayat_khotbah ?></td>
                    <td style="width: 40%">
                        <?= (isset($ktbh->isi_khotbah) && strlen($ktbh->isi_khotbah) > 100) ? substr($ktbh->isi_khotbah, 0, 100) . '...' : $ktbh->isi_khotbah ?>
                    </td>
                    <td><?= $ktbh->url_foto ?></td>
                    <td>
                        <!-- tombol edit -->
                        <?= anchor('Khotbah/edit/' . $ktbh->id_khotbah, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>

                        <!-- tombol hapus -->
                        <a href="#"
                           data-delete-url="<?= site_url('Khotbah/hapus/' . $ktbh->id_khotbah) ?>"
                           class="btn btn-danger btn-sm"
                           role="button"
                           onclick="deleteConfirm(this)">
                            <i class="fa fa-trash"></i>
                        </a>

                        <!-- tombol detail -->
                        <a href="<?= site_url("Khotbah/detail/$ktbh->id_khotbah") ?>" class="btn btn-info btn-sm">
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
                        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Khotbah Gereja</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('Khotbah/tambah') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tanggal Khotbah/Renungan</label>
                                <input type="date" name="tgl_khotbah" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Judul Khotbah/Renungan</label>
                                <input type="text" name="judul_khotbah" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ayat Khotbah/Renungan</label>
                                <input type="text" name="ayat_khotbah" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Isi Khotbah/Renungan</label>
                                <textarea name="isi_khotbah" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar (boleh kosong)</label>
                                <input
                                    type="file"
                                    name="url_foto"
                                    class="form-control"
                                    accept="image/*">
                            </div>

                            <button type="Reset" class="btn btn-warning">Reset</button>
                            <button type="submit" class="btn btn-primary" value="upload">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
