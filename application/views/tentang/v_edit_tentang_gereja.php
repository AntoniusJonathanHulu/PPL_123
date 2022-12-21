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
        foreach ($tentang as $ttg)
        {
            ?>
            <form action="<?= base_url() . 'TentangGereja/update' ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">                                        <!-- Nama Gereja -->
                    <label>Nama Gereja</label>
                    <input type="hidden" name="id_tentang" class="form-control" value="<?= $ttg->id_tentang ?>">
                    <textarea name="nama_gereja" rows="2" class="form-control"><?= $ttg->nama_gereja ?></textarea>
                </div>
                <div class="form-group">                                        <!-- Nama Lengkap Gereja -->
                    <label>Nama Lengkap Gereja</label>
                    <textarea name="nama_lengkap_gereja" rows="2" class="form-control"><?= $ttg->nama_lengkap_gereja ?></textarea>
                </div>
                <div class="form-group">
                    <label>Visi</label>
                    <textarea name="visi" rows="5" class="form-control"><?= $ttg->visi ?></textarea>
                </div>
                <div class="form-group">
                    <label>Misi</label>
                    <textarea name="misi" rows="5" class="form-control"><?= $ttg->misi ?></textarea>
                </div>
                <div class="form-group">
                    <label>Jadwal Ibadah</label>
                    <textarea name="jadwal_ibadah" rows="2" class="form-control"><?= $ttg->jadwal_ibadah ?></textarea>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="5" class="form-control"><?= $ttg->alamat ?></textarea>
                </div>
                <div class="form-group">
                    <label>Goolge Map</label>
                    <textarea name="google_map" rows="5" class="form-control"><?= $ttg->google_map ?></textarea>
                </div>
                <div class="form-group">
                    <label>Kontak</label>
                    <textarea name="kontak" rows="2" class="form-control"><?= $ttg->kontak ?></textarea>
                </div>
                <div class="form-group">
                    <label>Profil Pendeta</label>
                    <textarea name="profil_pendeta" rows="5" class="form-control"><?= $ttg->profil_pendeta ?></textarea>
                </div>
                <div class="form-group">                                        <!-- Foto Pendeta -->
                    <label>URL file foto pendeta: <?= $ttg->foto_pendeta ?></label><br>
                    <img 
                        src="<?= base_url() ?>upload/foto/TentangGereja/<?= $ttg->foto_pendeta ?>" 
                        width="300"
                        alt="(kosong)"/><p></p>
                    <p>
                        <a href="<?= site_url("TentangGereja/hapusFotoPendeta/$ttg->id_tentang/$ttg->foto_pendeta") ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Hapus gambar
                        </a>
                    </p>
                    <p><b>Catatan: upload foto berukuran persegi. Cth: 500px X 500px</b></p>
                    <input type="hidden" name="prev_foto_pendeta" class="form-control" value="<?= $ttg->foto_pendeta ?>">
                    <input type="file" name="foto_pendeta" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Sosmed FB</label>
                    <textarea name="sosmed_fb" rows="2" class="form-control"><?= $ttg->sosmed_fb ?></textarea>
                </div>
                <div class="form-group">
                    <label>Sosmed IG</label>
                    <textarea name="sosmed_ig" rows="2" class="form-control"><?= $ttg->sosmed_ig ?></textarea>
                </div>
                <div class="form-group">
                    <label>URL file logo: <?= $ttg->logo_gereja ?></label><br>
                    <img 
                        src="<?= base_url() ?>upload/foto/TentangGereja/<?= $ttg->logo_gereja ?>" 
                        width="200"
                        alt="(kosong)"/><p></p>
                    <p>
                        <a href="<?= site_url("TentangGereja/hapusLogo/$ttg->id_tentang/$ttg->logo_gereja") ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Hapus gambar
                        </a>
                    </p>
                    <input type="hidden" name="prev_logo" class="form-control" value="<?= $ttg->logo_gereja ?>">
                    <input type="file" name="logo_gereja" class="form-control" accept="image/*">
                </div>
                <div class="form-group">                                        <!-- Wallpaper Homepage -->
                    <label>URL file wallpaper homepage: <?= $ttg->wallpaper_homepage ?></label><br>
                    <img 
                        src="<?= base_url() ?>upload/foto/TentangGereja/<?= $ttg->wallpaper_homepage ?>" 
                        width="400"
                        alt="(kosong)"/><p></p>
                    <p>
                        <a href="<?= site_url("TentangGereja/hapusWallpaperHomepage/$ttg->id_tentang/$ttg->wallpaper_homepage") ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Hapus gambar
                        </a>
                    </p>
                    <p><b>Catatan: upload gambar berukuran besar dengan lebar paling kecil 1920px</b></p>
                    <input type="hidden" name="prev_wallpaper" class="form-control" value="<?= $ttg->wallpaper_homepage ?>">
                    <input type="file" name="wallpaper_homepage" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Tema</label>
                    <textarea name="tema" rows="2" class="form-control"><?= $ttg->tema ?></textarea>
                </div>
                <div class="form-group">
                    <label>Sub Tema</label>
                    <textarea name="sub_tema" rows="2" class="form-control"><?= $ttg->sub_tema ?></textarea>
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary" >Simpan</button>
            </form><br>
            <?php
        }
        ?>
    </section>
</div>