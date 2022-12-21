<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
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
    <section class="content">
        <?php
        foreach ($dokumentasi as $dkts)
        {
            ?>
            <form action="<?= base_url() . 'Dokumentasi/update' ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tanggal Dokumentasi</label>
                    <input type="hidden" name="id_dokumentasi" class="form-control" value="<?= $dkts->id_dokumentasi ?>">
                    <input type="date" name="tgl_dokumentasi" class="form-control" value="<?= $dkts->tgl_dokumentasi ?>">
                </div>
                <div class="form-group">
                    <label>Judul Dokumentasi</label>
                    <input type="text" name="judul_dokumentasi" class="form-control" value="<?= $dkts->judul_dokumentasi ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi Dokumentasi</label>
                    <textarea name="deskripsi_dokumentasi" rows="10" class="form-control"><?= $dkts->deskripsi_dokumentasi ?></textarea>
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary" >Simpan</button>
            </form><br>
            <?php
        }
        ?>
    </section>
</div>