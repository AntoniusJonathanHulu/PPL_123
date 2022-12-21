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
        foreach ($warta as $wrt)
        {
            ?>
            <?= form_open_multipart('WartaGereja/update') ?>
            <div class="form-group">
                <label>Tanggal Warta</label>
                <input type="hidden" name="id_warta" class="form-control" value="<?= $wrt->id_warta ?>">
                <input type="date" name="tgl_warta" class="form-control" value="<?= $wrt->tgl_warta ?>">
            </div>
            <div class="form-group">
                <label>Judul Warta</label>
                <input type="text" name="judul_warta" class="form-control" value="<?= $wrt->judul_warta ?>">
            </div>
            <div class="form-group">
                <label>Isi Warta</label>
                <textarea name="isi_warta" rows="10" class="form-control"><?= $wrt->isi_warta ?></textarea>
            </div>
            <div class="form-group">
                <label>URL file gambar: <?= $wrt->url_dokumen ?></label><br>
                <img 
                    src="<?= base_url() ?>upload/foto/WartaGereja/<?= $wrt->url_dokumen ?>" 
                    width="500"
                    alt="(kosong)"/><p></p>
                <p>
                    <a href="<?= site_url("WartaGereja/hapusGambar/$wrt->id_warta/$wrt->url_dokumen") ?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus gambar
                    </a>
                </p>
                <input type="hidden" name="prev_data" class="form-control" value="<?= $wrt->url_dokumen ?>">
                <input type="file" name="url_dokumen" class="form-control" accept="image/*">
            </div>
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
            <?= form_close() ?>
            <br>
            <?php
        }
        ?>
    </section>
</div>