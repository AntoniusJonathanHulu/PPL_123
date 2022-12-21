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
        <title>Warta & Berita</title>

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
                background-image: url("<?= base_url() ?>assets2/v_media_assets/img/bg3.jpg");
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
                <li><a href="#berita">Berita Gereja</a></li>
                <li><a href="#petugas">Petugas Pelayanan</a></li>
                <li><a href="#contact">Hubungi Kami</a></li>
            </ul>
        </header>

        <!---home--->
        <section class="berita" id="home">
            <div class="berita-text">
                <center>
                    <h1>Warta & Berita<br><?= $tentang->nama_gereja ?></h1>
                </center>
                <center>
                    <h3>Semua informasi tentang berita yang ada di Gereja tersedia disini.</h3>
                </center>

            </div>
        </section>

        <!---list Berita--->
        <section id="berita">
            <div >
                <center>
                    <h2 class="kotbah">BERITA & WARTA GEREJA</h2>
                </center>

                <!-- item berita -->
                <div class="container text-left">
                    <?php foreach ($warta as $wrt) : ?>
                        <div class="row" style="margin-bottom: 10px; background-color: white;">
                            <div class="col-lg-4">
                                <img src="<?= base_url() ?>upload/foto/WartaGereja/<?= $wrt->url_dokumen ?>" alt="thumb" class="rounded">
                            </div>
                            <div class="col-lg-8" style="color: gray;">
                                <h5><?= $wrt->judul_warta ?></h5>
                                <h6>Tanggal: <?= $wrt->tgl_warta ?></h6>
                                <p>
                                    <?= (isset($wrt->isi_warta) && strlen($wrt->isi_warta) > 500) ? substr($wrt->isi_warta, 0, 500) . '...' : $wrt->isi_warta ?>
                                </p>
                                <a href="<?= site_url("Media/detailWarta/$wrt->id_warta") ?>" class="btn btn-secondary">Lebih lanjut</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!--Jadwal Petugas Ibadah-->
        <section id="petugas">
            <div >
                <center>
                    <h2 class="kotbah">Petugas Ibadah dan Pelayanan</h2>
                </center>

                <!-- item petugas -->
                <div class="container text-left">
                    <div class="list-group">
                        <?php foreach ($petugas_ibadah as $ptg) : ?>
                            <a href="<?= site_url("Media/detailPetugas/$ptg->id_petugas_ibadah") ?>" 
                               class="list-group-item list-group-item-action"
                               style="font-size: 20px; color: gray; text-align: center">
                                Petugas Ibadah Tanggal: <?= $ptg->tgl_petugas_ibadah ?>
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