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
        foreach ($khotbah as $ktbh)
        {
            ?>
            <form action="<?= base_url() . 'Khotbah/update' ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tanggal Khotbah</label>
                    <input type="hidden" name="id_khotbah" class="form-control" value="<?= $ktbh->id_khotbah ?>">
                    <input type="date" name="tgl_khotbah" class="form-control" value="<?= $ktbh->tgl_khotbah ?>">
                </div>
                <div class="form-group">
                    <label>Judul Khotbah</label>
                    <input type="text" name="judul_khotbah" class="form-control" value="<?= $ktbh->judul_khotbah ?>">
                </div>
                <div class="form-group">
                    <label>Ayat Khotbah</label>
                    <input type="text" name="ayat_khotbah" class="form-control" value="<?= $ktbh->ayat_khotbah ?>">
                </div>
                <div class="form-group">
                    <label>Isi Khotbah</label>
                    <textarea name="isi_khotbah" rows="10" class="form-control"><?= $ktbh->isi_khotbah ?></textarea>
                </div>
                <div class="form-group">
                    <label>URL file gambar: <?= $ktbh->url_foto ?></label><br>
                    <img 
                        src="<?= base_url() ?>upload/foto/Khotbah/<?= $ktbh->url_foto ?>" 
                        width="500"
                        alt="(kosong)"/><p></p>
                    <p>
                        <a href="<?= site_url("Khotbah/hapusGambar/$ktbh->id_khotbah/$ktbh->url_foto") ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Hapus gambar
                        </a>
                    </p>
                    <input type="hidden" name="prev_data" class="form-control" value="<?= $ktbh->url_foto ?>">
                    <input type="file" name="url_foto" class="form-control" accept="image/*">
                </div>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <?php
        }
        ?>
    </section>
</div>