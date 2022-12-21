<?php
$ttg = array('id_tentang' => 1);
$tentang = $this->db->get_where("tentang_gereja", $ttg)->row();

$usr = array('id' => 1);
$user = $this->db->get_where("user", $usr)->row();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Galeri Foto Dokumentasi</title>
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <!---custom css link--->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/v_media_assets/css/style.css">

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
              rel="stylesheet">
        <style>
            body {
                background-image: url("<?= base_url() ?>assets2/v_media_assets/img/xx2.png");
                background-repeat: no-repeat;
                background-size: cover
            }
        </style>
    </head>

    <body>
        <!---header--->
        <header>
            <a href="<?= base_url() ?>" class="logo"><img src="<?= base_url() ?>upload/foto/TentangGereja/<?= $tentang->logo_gereja ?>"></a>
            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navigation-bar">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#dokumen">Dokumentasi Gereja</a></li>
                <li><a href="#contact">Hubungi Kami</a></li>
            </ul>
        </header>

        <!---home--->
        <section class="foto_dokumentasi" id="home">
            <div class="home-text">
                <h4></h4>
                <center>
                </center>
                <h1>Dokumentasi <br><?= $tentang->nama_gereja ?></h1>

                <h3>Semua Foto Dokumentasi Kegiatan<br><?= $tentang->nama_lengkap_gereja ?></h3>
                <center>
                </center>
            </div>
        </section>

        <!--dokumen-->
        <section class="dokumen" id="dokumen">
            <div class="dokumen-text">
                <center>
                    <h2 class="kotbah">Dokumentasi</h2>
                </center>

                <!-- item dokumentasi -->
                <div class="container text-left">
                    <div class="list-group">
                        <?php foreach ($dokumentasi as $dkts) : ?>
                            <a href="<?= site_url("Media/detailDokumentasi/$dkts->id_dokumentasi") ?>" 
                               class="list-group-item list-group-item-action"
                               style="font-size: 20px; color: gray; text-align: center">
                                <?= $dkts->tgl_dokumentasi ?> // <?= $dkts->judul_dokumentasi ?> // <?= $dkts->id_dokumentasi ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>


        <!--FOOTER-->
        <!---contact--->
        <section class="contact" id="contact">
            <div class="contact-text">
                <h2>Hubungi Kami</h2>
                <h4></h4>
                <p>Melayani dan menjadi saksi Kristus</p>
                <div class="contact-list">
                    <li><a href="#"></a></li>
                    <li><a href="#"><?= $user->email ?></a></li>
                    <li><a href="https://wa.me/<?= $tentang->kontak ?>"><?= $tentang->kontak ?></a></li>
                </div>
                <div class="contact-icons">

                    <a href="<?= $tentang->sosmed_fb ?>" target="_blank"><i class='bx bxl-facebook' ></i></a>
                    <a href="#"><i class='bx bxl-gmail' ></i></a>
                    <a href="<?= $tentang->sosmed_ig ?>" target="_blank"><i class='bx bxl-instagram' ></i></a>
                    <a href="https://wa.me/<?= $tentang->kontak ?>"><i class='bx bxl-whatsapp' ></i></a>
                </div>
            </div>
        </section>

        <div class="last-text">
            <p><?= $tentang->nama_lengkap_gereja ?> © 2022</p>
        </div>

        <!---scroll-top--->
        <a href="#" class="top"><i class='bx bx-up-arrow-alt'></i></a>

        <script src="https://unpkg.com/scrollreveal"></script>

        <!---custom js link--->
        <script type="text/javascript" src="<?= base_url() ?>assets2/v_media_assets/js/script.js"></script>

    </body>

</html>