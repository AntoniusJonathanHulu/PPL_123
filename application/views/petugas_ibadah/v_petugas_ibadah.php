<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline" action="<?= site_url('PetugasIbadah/search') ?>" method="post">
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
                    <h1 class="m-0">Petugas Ibadah</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Petugas Ibadah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Petugas Ibadah
        </button>
        <p></p>
        <div class="table-responsive">
            <table class="table" style="width: 100%">
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Pembawa Acara</th>
                    <th>Singer</th>
                    <th>Pemain Musik</th>
                    <th>Doa Syafaat</th>
                    <th>Pengkhotbah</th>
                    <th>Operator LCD</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;
                foreach ($petugas_ibadah as $ptg)
                {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $ptg->tgl_petugas_ibadah ?></td>
                        <td>
                            <?= (isset($ptg->pembawa_acara) && strlen($ptg->pembawa_acara) > 30) ? substr($ptg->pembawa_acara, 0, 30) . "..." : "$ptg->pembawa_acara"; ?>
                        </td>
                        <td>
                            <?= (isset($ptg->singer) && strlen($ptg->singer) > 30) ? substr($ptg->singer, 0, 30) . "..." : "$ptg->singer"; ?>
                        </td>
                        <td>
                            <?= (isset($ptg->pemain_musik) && strlen($ptg->pemain_musik) > 30) ? substr($ptg->pemain_musik, 0, 30) . "..." : "$ptg->pemain_musik"; ?>
                        </td>
                        <td>
                            <?= (isset($ptg->doa_syafaat) && strlen($ptg->doa_syafaat) > 30) ? substr($ptg->doa_syafaat, 0, 30) . "..." : "$ptg->doa_syafaat"; ?>
                        </td>
                        <td>
                            <?= (isset($ptg->pengkhotbah) && strlen($ptg->pengkhotbah) > 30) ? substr($ptg->pengkhotbah, 0, 30) . "..." : "$ptg->pengkhotbah"; ?>
                        </td>
                        <td>
                            <?= (isset($ptg->operator_lcd) && strlen($ptg->operator_lcd) > 30) ? substr($ptg->operator_lcd, 0, 30) . "..." : "$ptg->operator_lcd"; ?>
                        </td>
                        <td>
                            <!-- tombol edit -->
                            <?= anchor('PetugasIbadah/edit/' . $ptg->id_petugas_ibadah, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>

                            <!-- tombol hapus -->
                            <a href="#"
                               data-delete-url="<?= site_url('PetugasIbadah/hapus/' . $ptg->id_petugas_ibadah) ?>"
                               class="btn btn-danger btn-sm"
                               role="button"
                               onclick="deleteConfirm(this)">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- tombol detail -->
                            <a href="<?= site_url("PetugasIbadah/detail/$ptg->id_petugas_ibadah") ?>" class="btn btn-info btn-sm">
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
                        <h4 class="modal-title" id="exampleModalLabel">Form Tambah Petugas Ibadah</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url("PetugasIbadah/tambah") ?>" method="post">
                            <div class="form-group">
                                <label>Tanggal Ibadah</label>
                                <input type="date" name="tgl_petugas_ibadah" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Pembawa Acara</label>
                                <input type="text" name="pembawa_acara" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Singer</label>
                                <input type="text" name="singer" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Pemain Musik</label>
                                <input type="text" name="pemain_musik" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Doa Syafaat</label>
                                <input type="text" name="doa_syafaat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Pengkhotbah</label>
                                <input type="text" name="pengkhotbah" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Operator LCD</label>
                                <input type="text" name="operator_lcd" class="form-control">
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
