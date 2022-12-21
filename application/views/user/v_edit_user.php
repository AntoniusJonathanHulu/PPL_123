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
        foreach ($user as $us)
        {
            ?>
            <form action="<?= base_url() . 'User/update' ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="hidden" name="id" class="form-control" value="<?= $us->id ?>">
                    <input type="text" name="name" class="form-control" value="<?= $us->name ?>" required="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $us->email ?>" required="">
                </div>
                <div class="form-group">
                    <label>Username (login)</label>
                    <input type="text" name="username" class="form-control" value="<?= $us->username ?>" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="<?= $us->password ?>" required="">
                </div>
                <div class="form-group">
                    <label>Avatar: <?= $us->avatar ?></label><br>
                    <img 
                        src="<?= base_url() ?>upload/foto/User/<?= $us->avatar ?>" 
                        width="200"
                        alt="(kosong)"/><p></p>
                    <p>
                        <a href="<?= site_url("User/hapusFile/$us->id") ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Hapus gambar
                        </a>
                    </p>
                    <input type="hidden" name="prev_data" class="form-control" value="<?= $us->avatar ?>">
                    <input type="file" name="avatar" class="form-control" accept="image/*">
                </div>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary" >Simpan</button>
            </form><br>
            <?php
        }
        ?>
    </section>
</div>