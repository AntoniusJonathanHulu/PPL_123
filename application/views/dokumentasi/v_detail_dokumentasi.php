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
                    <h4 class="m-0">Detail Dokumentasi</h4>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <table class="table" style="width: 100%">
            <?php
            foreach ($dokumentasi as $dkts)
            {
                ?>
                <tr>
                    <th style="width: 20%">Tanggal</th>
                    <td><?= $dkts->tgl_dokumentasi ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Judul</th>
                    <td><?= $dkts->judul_dokumentasi ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Deskripsi</th>
                    <td style="width: 80%">
                        <?= $dkts->deskripsi_dokumentasi ?>
                    </td>
                </tr>
                
                <?php
            }
            ?>
        </table>
    </div>
</div>