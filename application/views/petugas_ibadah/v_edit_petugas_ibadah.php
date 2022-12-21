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
        foreach ($petugas_ibadah as $ptg)
        {
            ?>
            <?= form_open_multipart('PetugasIbadah/update') ?>
            <div class="form-group">
                <label>Tanggal Ibadah</label>
                <input type="hidden" name="id_petugas_ibadah" class="form-control" value="<?= $ptg->id_petugas_ibadah ?>">
                <input type="date" name="tgl_petugas_ibadah" class="form-control" value="<?= $ptg->tgl_petugas_ibadah ?>">
            </div>
            <div class="form-group">
                <label>Pembawa Acara</label>
                <input type="text" name="pembawa_acara" class="form-control" value="<?= $ptg->pembawa_acara ?>">
            </div>
            <div class="form-group">
                <label>Singer</label>
                <input type="text" name="singer" class="form-control" value="<?= $ptg->singer ?>">
            </div>
            <div class="form-group">
                <label>Pemain Musik</label>
                <input type="text" name="pemain_musik" class="form-control" value="<?= $ptg->pemain_musik ?>">
            </div>
            <div class="form-group">
                <label>Doa Syafaat</label>
                <input type="text" name="doa_syafaat" class="form-control" value="<?= $ptg->doa_syafaat ?>">
            </div>
            <div class="form-group">
                <label>Pengkhotbah</label>
                <input type="text" name="pengkhotbah" class="form-control" value="<?= $ptg->pengkhotbah ?>">
            </div>
            <div class="form-group">
                <label>Operator LCD</label>
                <input type="text" name="operator_lcd" class="form-control" value="<?= $ptg->operator_lcd ?>">
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