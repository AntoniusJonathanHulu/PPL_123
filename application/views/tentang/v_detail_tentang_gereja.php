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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Detail Tentang Gereja</h4>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <table class="table" style="width: 100%">
            <?php
            foreach ($tentang as $ttg)
            {
                ?>
                <tr>                                        <!-- nama gereja -->
                    <th style="width: 20%">Nama Gereja</th>
                    <td style="width: 80%">
                        <?= $ttg->nama_gereja ?>
                    </td>
                </tr>
                <tr>                                <!-- nama lengkap gereja -->
                    <th style="width: 20%">Nama Lengkap Gereja</th>
                    <td style="width: 80%">
                        <?= $ttg->nama_lengkap_gereja ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Visi</th>
                    <td style="width: 80%">
                        <?= $ttg->visi ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Misi</th>
                    <td style="width: 80%">
                        <?= $ttg->misi ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Jadwal Ibadah</th>
                    <td style="width: 80%">
                        <?= $ttg->jadwal_ibadah ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Alamat</th>
                    <td style="width: 80%">
                        <?= $ttg->alamat ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Google Map</th>
                    <td style="width: 80%">
                        <?= $ttg->google_map ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Kontak</th>
                    <td style="width: 80%">
                        <?= $ttg->kontak ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Profil Pendeta</th>
                    <td style="width: 80%">
                        <?= $ttg->profil_pendeta ?>
                    </td>
                </tr>
                <tr>                                <!-- Foto pendeta -->
                    <th>Foto Pendeta</th>
                    <td>
                        <img 
                            src="<?= base_url() ?>upload/foto/TentangGereja/<?= $ttg->foto_pendeta ?>" 
                            width="300"
                            alt="(kosong)"/>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Sosmed FB</th>
                    <td style="width: 80%">
                        <?= $ttg->sosmed_fb ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Sosmed IG</th>
                    <td style="width: 80%">
                        <?= $ttg->sosmed_ig ?>
                    </td>
                </tr>
                <tr>
                    <th>Logo Gereja</th>
                    <td>
                        <img 
                            src="<?= base_url() ?>upload/foto/TentangGereja/<?= $ttg->logo_gereja ?>" 
                            width="200"
                            alt="(kosong)"/>
                    </td>
                </tr>
                <tr>                                <!-- wallpaper homepage -->
                    <th>Wallpaper Homepage</th>
                    <td>
                        <img 
                            src="<?= base_url() ?>upload/foto/TentangGereja/<?= $ttg->wallpaper_homepage ?>" 
                            width="400"
                            alt="(kosong)"/>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Tema</th>
                    <td style="width: 80%">
                        <?= $ttg->tema ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Sub Tema</th>
                    <td style="width: 80%">
                        <?= $ttg->sub_tema ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <!--edit tentang gereja-->
        <a href="<?= site_url("TentangGereja/edit/$ttg->id_tentang") ?>" class="btn btn-primary">
            <i class="fa fa-edit"></i> Edit Tentang Gereja
        </a><p></p>
    </div>
</div>