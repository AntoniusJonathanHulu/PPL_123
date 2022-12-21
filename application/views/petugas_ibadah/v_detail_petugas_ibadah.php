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
                    <h4 class="m-0">Detail Petugas Ibadah</h4>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <table class="table" style="width: 100%">
            <?php
            foreach ($petugas_ibadah as $ptg)
            {
                ?>
                <tr>
                    <th style="width: 20%">Tanggal Ibadah</th>
                    <td><?= $ptg->tgl_petugas_ibadah ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Pembawa Acara</th>
                    <td><?= $ptg->pembawa_acara ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Singer</th>
                    <td><?= $ptg->singer ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Pemain Musik</th>
                    <td><?= $ptg->pemain_musik ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Doa Syafaat</th>
                    <td><?= $ptg->doa_syafaat ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Pengkhotbah</th>
                    <td><?= $ptg->pengkhotbah ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Operator LCD</th>
                    <td><?= $ptg->operator_lcd ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>