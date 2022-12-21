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
        <title>GBI Jogosetran</title>
        <link rel="shortcut icon" href="<?= base_url() ?>assets2/v_dashboard_assets/favicon.ico" type="image/x-icon">
        <!---custom css link--->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets2/v_dashboard_assets/css/style.css">

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <style>
            .home {
                height: 100vh;
                width: 100%;
                position: relative;
                background: url(<?= base_url() ?>upload/foto/TentangGereja/<?= $tentang->wallpaper_homepage ?>);
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: flex-start;
            }
        </style>
    </head>
    <body>
        <!---header--->
        <header>
            <!--<a href="#" class="logo"><img src="<?= base_url() ?>assets2/v_dashboard_assets/img/gjs.png"></a>-->
            <a href="#" class="logo"><img src="<?= base_url() ?>upload/foto/TentangGereja/<?= $tentang->logo_gereja ?>"></a>
            <h1><?= $tentang->nama_gereja ?></h1>
            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navbar">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#services">Media</a></li>
                <li><a href="#portfolio">Lokasi</a></li>
                <li><a href="#contact">Hubungi Kami</a></li>
            </ul>
        </header>

        <!---home--->
        <section class="home" id="home">
            <div class="home-text">
                <h1 class="tema"><?= $tentang->tema ?></h1>
                <h3 class="tema"><?= $tentang->sub_tema ?></h3>
            </div>
        </section>

        <!---profil pendeta--->
        <section class="about" id="about">
            <div class="about-img">
                <img src="<?= base_url() ?>upload/foto/TentangGereja/<?= $tentang->foto_pendeta ?>">
            </div>

            <div class="about-text">
                <h2><?= $tentang->profil_pendeta ?></h2>
                <div class="about-gri">
                    <div class="about-in">
                        <h5>VISI</h5>
                    </div>
                    <div class="about-in">
                        <h4><?= $tentang->visi ?></h4>
                    </div>

                    <div class="about-in">
                        <h5>MISI</h5>
                    </div>
                    <div class="about-in">
                        <h4><?= $tentang->misi ?></h4>
                    </div>

                    <div class="about-in">
                        <h5>Jadwal Ibadah</h5>
                    </div>
                    <div class="about-in">
                        <h4><?= $tentang->jadwal_ibadah ?></h4>
                    </div>
                    <!--<button href class="button button1">Profil Pendeta</button>-->
                </div>
            </div>
        </section>

        <!---Media--->
        <section class="services" id="services">
            <div class="main-text">
                <h2>Media Gereja</h2>
                <h4>------------</h4>
            </div>

            <div class="services-content">
                <div class="box">
                    <a href="<?= site_url("Media/listWarta") ?>">
                        <img src="<?= base_url() ?>assets2/v_dashboard_assets/img/warta1.png">
                        <h3>WARTA & BERITA</h3>
                        <p>Kami menyambut saudara-saudari dengan syalom dan selamat hari Minggu. Di awal ibadah ini mari kita dengarkan Warta Gereja tentang pelayan Tuhan dihari yang akan datang. </p>
                    </a>
                </div>

                <div class="box">
                    <a href="<?= site_url("Media/listKhotbah") ?>">
                        <img src="<?= base_url() ?>assets2/v_dashboard_assets/img/khotbah1.png">
                        <h3>KHOTBAH</h3>
                        <p>Sekecil apapun yang kau miliki saat ini bersyukurlah karena Tuhan tahu dan Dia adil dalam memberikan Berkatnya pada hambanya</p>
                    </a>
                </div>
            </div>

            <div class="services-content">
                <div class="box">
                    <a href="<?= site_url("Media/listDokumentasi") ?>">
                        <img src="<?= base_url() ?>assets2/v_dashboard_assets/img/dokumentasi1.png">
                        <h3>DOKUMENTASI</h3>
                        <p>Begitulah keajaiban fotografi, tidak hanya mengabadikan momen penting dalam hidup, tapi juga memberikan kenangan yang ingin diingat. </p>
                    </a>
                </div>

                <div class="box">
                    <a href="<?= site_url("Media/listDokumen") ?>">
                        <img src="<?= base_url() ?>assets2/v_dashboard_assets/img/berita1.png">
                        <h3>DOKUMEN</h3>
                        <p>"Dokumen asli jauh lebih baik dari pada dokumen salinan" <br> Dokumen gereja yang bisa jema'at perlukan untuk keperluan <?= $tentang->nama_lengkap_gereja ?> </p>
                    </a>
                </div>
            </div>




        </section>

        <!---portfolio--->
        <section class="portfolio" id="portfolio">
            <div class="main-text">
                <h2>Lokasi <?= $tentang->nama_gereja ?></h2>
                <h4><?= $tentang->alamat ?></h4>
                <br>
            </div>

            <center>
                <iframe src="<?= $tentang->google_map ?>" 
                        width="800" 
                        height="600" 
                        style="border:0; width: 80%;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </center>
            <div class="portfolio-content">
                <div class="row">
                    <div class="main-row">
                        <div class="row-text">

                        </div>
                        <div class="row-icon">
                        </div>
                    </div>
                    <center><h3>Google Maps <?= $tentang->nama_lengkap_gereja ?></h3></center>
                </div>		
        </section>

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

            <div class="contact-form">
                <img src="<?= base_url() ?>assets2/v_dashboard_assets/img/bg1.jpg"
                     alt="alt"
                     style="width: 100%; border-radius: 15px"/>
            </div>
        </section>

        <div class="last-text">
            <a href="<?= site_url("Admin/dashboard") ?>" target="_blank">
                <p><?= $tentang->nama_lengkap_gereja ?> © 2022</p>
            </a>
            <p>Dikembangkan oleh Kelompok PPL 15  UKRIM</p>
        </div>

        <!---scroll-top--->
        <a href="#" class="top"><i class='bx bx-up-arrow-alt' ></i></a>

        <script src="https://unpkg.com/scrollreveal"></script>

        <!---custom js link--->
        <script type="text/javascript" src="<?= base_url() ?>assets2/v_dashboard_assets/js/script.js"></script>

    </body>
</html>