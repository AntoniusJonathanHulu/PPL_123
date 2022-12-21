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
                    <h4 class="m-0">Detail Warta Gereja</h4>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <table class="table" style="width: 100%">
            <?php
            foreach ($warta as $wrt)
            {
                ?>
                <tr>
                    <th style="width: 20%">Tanggal</th>
                    <td><?= $wrt->tgl_warta ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Judul</th>
                    <td><?= $wrt->judul_warta ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Isi</th>
                    <td style="width: 80%">
                        <?= $wrt->isi_warta ?>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">File gambar</th>
                    <td><?= $wrt->url_dokumen ?></td>
                </tr>
                <tr>
                    <th>Gambar/Foto</th>
                    <td>
                        <img 
                            src="<?= base_url() ?>upload/foto/WartaGereja/<?= $wrt->url_dokumen ?>" 
                            width="500"
                            alt="(kosong)"/>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>