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
                    <h4 class="m-0">Detail User</h4>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <table class="table" style="width: 100%">
            <?php
            foreach ($user as $us)
            {
                ?>
                <tr>
                    <th style="width: 20%">User ID</th>
                    <td><?= $us->id ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Nama Lengkap</th>
                    <td><?= $us->name ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Email</th>
                    <td><?= $us->email ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Username (login)</th>
                    <td><?= $us->username ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Password</th>
                    <td><?= $us->password ?></td>
                </tr>
                <tr>
                    <th>Avatar</th>
                    <td>
                        <img 
                            src="<?= base_url() ?>upload/foto/User/<?= $us->avatar ?>" 
                            width="200"
                            alt="(kosong)"/>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%">Waktu dibuat</th>
                    <td><?= $us->created_at ?></td>
                </tr>
                <tr>
                    <th style="width: 20%">Login terakhir</th>
                    <td><?= $us->last_login ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        
        <!--edit data-->
        <a href="<?= site_url("user/edit/$us->id") ?>" class="btn btn-primary">
            <i class="fa fa-edit"></i> Edit User
        </a>
    </div>
</div>