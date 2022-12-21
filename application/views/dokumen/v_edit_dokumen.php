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
        foreach ($dokumen as $dkm)
        {
            ?>
            <form action="<?= base_url() . 'DokumenGereja/update' ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id_dokumen" class="form-control" value="<?= $dkm->id_dokumen ?>">
                </div>
                <div class="form-group">
                    <label>Judul Dokumen</label>
                    <input type="text" name="judul_dokumen" class="form-control" value="<?= $dkm->judul_dokumen ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi Dokumen</label>
                    <textarea name="deskripsi_dokumen" rows="3" class="form-control"><?= $dkm->deskripsi_dokumen ?></textarea>
                </div>
                <div class="form-group">
                    <label>File Dokumen: <?= $dkm->url_dokumen ?></label>
                    <p>
                        <a href="<?= site_url("DokumenGereja/hapusDokumen/$dkm->id_dokumen/$dkm->url_dokumen") ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Hapus dokumen
                        </a>
                    </p>
                    <input type="hidden" name="prev_data" class="form-control" value="<?= $dkm->url_dokumen ?>">
                    <input type="file" name="url_dokumen" class="form-control" accept=".doc, .docx, .pdf, .html, .ppt, .pptx">
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <?php
        }
        ?>
    </section>
</div>