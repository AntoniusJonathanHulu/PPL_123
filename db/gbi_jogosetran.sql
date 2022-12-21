-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 12:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gbi_jogosetran`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `tgl_dokumentasi` date DEFAULT NULL,
  `judul_dokumentasi` text DEFAULT NULL,
  `deskripsi_dokumentasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_dokumentasi`, `tgl_dokumentasi`, `judul_dokumentasi`, `deskripsi_dokumentasi`) VALUES
(7, '2022-09-07', 'Dokumentasi paskah', 'sesuai judul'),
(10, '2022-09-06', 'Dokumentasi Natal', 'sesuai judul edit'),
(11, '2022-09-27', 'Dokumentasi Ibadah Padang', 'asdf'),
(12, '2022-10-05', 'Dokumentasi Perjamuan Kasih', 'sesuai judul'),
(13, '2022-10-26', 'Dokumentasi Baptisan', 'werwe'),
(14, '2022-10-19', 'Dokumentasi Rekreasi Gereja', 'dfad');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_gereja`
--

CREATE TABLE `dokumen_gereja` (
  `id_dokumen` int(11) NOT NULL,
  `judul_dokumen` varchar(50) DEFAULT NULL,
  `deskripsi_dokumen` text DEFAULT NULL,
  `url_dokumen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_gereja`
--

INSERT INTO `dokumen_gereja` (`id_dokumen`, `judul_dokumen`, `deskripsi_dokumen`, `url_dokumen`) VALUES
(6, 'judul 2', 'adfadfadf', 'Atomic_Habits_An_Easy_Proven_Way_to_Build_Good_Habits_Break_Bad_Ones_by_James_Clear_(z-lib_org).pdf'),
(7, 'judul 3', 'doc 3', '22-ST-01_Arduino_Dasar_C.pdf'),
(8, 'Judul 1', 'adfadfad', 'Daftar_Padanan_Kur21_dan_Kur19_.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `foto_dokumentasi`
--

CREATE TABLE `foto_dokumentasi` (
  `id_foto` int(11) NOT NULL,
  `url_foto` varchar(5000) NOT NULL,
  `id_dokumentasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_dokumentasi`
--

INSERT INTO `foto_dokumentasi` (`id_foto`, `url_foto`, `id_dokumentasi`) VALUES
(13, 'Untitled.png', 10),
(16, 'project-image1.jpg', 7),
(17, 'project-image2.jpg', 7),
(18, 'project-image3.jpg', 7),
(19, 'bg1.jpg', 7),
(20, 'img-08.jpg', 7),
(21, 'xx.jpg', 10),
(22, 'pray.jpg', 11),
(23, 'cross2.jpg', 12),
(24, 'img-04.jpg', 13),
(25, 'img-09.jpg', 14),
(34, '88867202_p0.jpg', 14),
(36, 'lumine.png', 14),
(37, 'bgd1.jpg', 14),
(38, 'miku4.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `khotbah`
--

CREATE TABLE `khotbah` (
  `id_khotbah` int(11) NOT NULL,
  `tgl_khotbah` date DEFAULT NULL,
  `judul_khotbah` text NOT NULL,
  `ayat_khotbah` text DEFAULT NULL,
  `isi_khotbah` text DEFAULT NULL,
  `url_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khotbah`
--

INSERT INTO `khotbah` (`id_khotbah`, `tgl_khotbah`, `judul_khotbah`, `ayat_khotbah`, `isi_khotbah`, `url_foto`) VALUES
(1, '2022-08-02', 'Kemerdekaan Sejati', 'Roma 6:6', 'Karena kita tahu bahwa manusia lama kita telah turut disalibkan, supaya tubuh dosa kita hilang kuassanya, agar kita jangan menghambakan diri lagi kepada dosa.\r\n<br><br>\r\nPatung Rebellious Slave karya Michelangelo, seniman ternama dari Italia, berwujud seorang pria tampan, bertubuh kekar dan berotot, serta berperawakan tinggi. Namun, kepala patung tersebut tidak tegak, seolah menggeleng dan tangannya terikat ke belakang oleh seutas tali. Tak ayal apabila banyak penikmat karya seni tertarik untuk menangkap makna dibalik kontradiksi visual yang ditampilkan oleh seniman besar itu Penggambaran sosok budak, sebagaimana ditampilkan oleh Michelangelo, mau tidak mau menggiring pemikiran banyak orang sampai pada hakikat manusia yang bebas secara fisik, tetapi terpasung dalam mentalitas budak Mentalitas semacam ini dapat ditemukan dalam diri banyak orang, termasuk orang percaya. Tidak sedikit orang percaya yang tetap tinggal dalam perbudakan dosa, meskipun telah mengalami kemerdekaan hidup di dalam Kristus (ay. 2). Realitas inilah yang memiriskan hati Rasul Paulus. la pun merasa perlu untuk membuka selubung kesadaran orang percaya supaya mereka tidak menghambakan diri lagi kepada dosa (ay. 6). Rasul Paulus yakin, jika Yesus telah memerdekakan, maka setiap orang yang percaya kepada-Nya akan benar-benar merdeka (Yoh 8.36), baik fisik maupun mental. Pada tataran inilah kebebasan hidup sebagai orang yang menerima anugerah keselamatan beroleh arti yang sesungguhnya. Kemerdekaan sejati seorang pengikut Kristus pada dasamya ditandai oleh kesadaran dirinya untuk berpaling dan dosa. Tidak ada alasan baginya untuk kembali menjalani hidup di bawah belenggu penjajahan dosa ', 'Kemerdekaan-Sejati.jpg'),
(3, '2022-09-02', 'Bertumbuh Melalui Persekutuan', '1 Korintus 15:58', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis eligendi doloribus optio deserunt nisi porro incidunt minus magnam labore dolores, voluptates autem accusamus! Quis illum consetetur aliquam, exercitationem aut perspiciatis.', 'cth_gambar_khotbah.jpg'),
(13, '2022-11-09', 'Bertumbuh dalam Ibadah', 'adfadfadf', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'tree.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_ibadah`
--

CREATE TABLE `petugas_ibadah` (
  `id_petugas_ibadah` int(11) NOT NULL,
  `tgl_petugas_ibadah` date DEFAULT NULL,
  `pembawa_acara` varchar(100) DEFAULT NULL,
  `singer` varchar(100) DEFAULT NULL,
  `pemain_musik` varchar(100) DEFAULT NULL,
  `doa_syafaat` varchar(100) DEFAULT NULL,
  `pengkhotbah` varchar(100) DEFAULT NULL,
  `operator_lcd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas_ibadah`
--

INSERT INTO `petugas_ibadah` (`id_petugas_ibadah`, `tgl_petugas_ibadah`, `pembawa_acara`, `singer`, `pemain_musik`, `doa_syafaat`, `pengkhotbah`, `operator_lcd`) VALUES
(1, '2022-08-28', 'Ibu Lindawati', 'Sdri. Putri <br> Sdri. Chelsea', 'Sdr. Bambang', 'Ibu Purwono', 'Gembala Sidang (Pdt. Ryan)', 'Sdri. Ellena'),
(3, '2022-10-27', 'fddf', 'erer', 'erer', 'ere', 'rere', '');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_gereja`
--

CREATE TABLE `tentang_gereja` (
  `id_tentang` int(11) NOT NULL,
  `nama_gereja` text DEFAULT NULL,
  `nama_lengkap_gereja` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `jadwal_ibadah` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `kontak` text DEFAULT NULL,
  `profil_pendeta` text DEFAULT NULL,
  `foto_pendeta` varchar(100) DEFAULT NULL,
  `sosmed_fb` text DEFAULT NULL,
  `sosmed_ig` text DEFAULT NULL,
  `logo_gereja` varchar(100) DEFAULT NULL,
  `wallpaper_homepage` varchar(100) DEFAULT NULL,
  `tema` text DEFAULT NULL,
  `sub_tema` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang_gereja`
--

INSERT INTO `tentang_gereja` (`id_tentang`, `nama_gereja`, `nama_lengkap_gereja`, `visi`, `misi`, `jadwal_ibadah`, `alamat`, `google_map`, `kontak`, `profil_pendeta`, `foto_pendeta`, `sosmed_fb`, `sosmed_ig`, `logo_gereja`, `wallpaper_homepage`, `tema`, `sub_tema`) VALUES
(1, 'GBI Jogosetran', 'Gereja Baptis Indonesia Jogosetran', 'Gereja yang bertumbuh ke arah Kristus Yesus', '- Mencari kehendak Allah <br>\r\n- Melakukan kehendak Allah Bapa', 'Minggu, 08:00 WIB - 10:00 WIB', 'Boyogaten, Jogosetran, Kalikotes Klaten 57451', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d73799.08224862115!2d110.63208036277165!3d-7.684321269961301!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ea096618cf99c88!2sGereja%20Baptis%20Indonesia%20Jogosetran!5e0!3m2!1sid!2sid!4v1667569223117!5m2!1sid!2sid', '082242561329', 'Pendeta<br>Ryan Herista Adi', 'foto_1.jpg', 'https://www.facebook.com/profile.php?id=100085543907828', 'https://www.instagram.com/gbijogosetran/?hl=en', 'gjs.png', 'Welcome.JPG', '“Bertumbuh dalam Persekutuan”', '1 Korintus 15:58 <br>\r\nKarena itu, saudara-saudaraku yang kekasih, berdirilah teguh, jangan goyah, dan giatlah selalu dalam pekerjaan Tuhan! Sebab kamu tahu, bahwa dalam persekutuan dengan Tuhan jerih payahmu tidak sia-sia.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `avatar`, `created_at`, `last_login`) VALUES
('1', 'Admin GBI Jogosetran', 'gbijogse@gmail.com', 'admin', '123admin', 'logo_gbi_j.png', '2022-09-19 22:53:35', '2022-11-07 05:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `warta_gereja`
--

CREATE TABLE `warta_gereja` (
  `id_warta` int(11) NOT NULL,
  `tgl_warta` date DEFAULT NULL,
  `judul_warta` text NOT NULL,
  `isi_warta` text NOT NULL,
  `url_dokumen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warta_gereja`
--

INSERT INTO `warta_gereja` (`id_warta`, `tgl_warta`, `judul_warta`, `isi_warta`, `url_dokumen`) VALUES
(45, '2022-09-06', 'Baptis Selam', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis nemo non commodi culpa consectetur fuga maxime consequuntur hic vitae id impedit, nobis cumque itaque quaerat perferendis consequatur tempora! Voluptates, obcaecati! ', 'baptis.jpg'),
(48, '2022-09-05', 'KKR Gabungan', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis nemo non commodi culpa consectetur fuga maxime consequuntur hic vitae id impedit, nobis cumque itaque quaerat perferendis consequatur tempora! Voluptates, obcaecati! ', 'KKR.jpeg'),
(50, '2022-09-13', 'Penyerahan Anak', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis nemo non commodi culpa consectetur fuga maxime consequuntur hic vitae id impedit, nobis cumque itaque quaerat perferendis consequatur tempora! Voluptates, obcaecati! ', 'penyerahan_anak.jpg'),
(58, '2022-11-08', 'adfadfa', 'adfadfadffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdadfadfadfadfa', 'img-11.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `dokumen_gereja`
--
ALTER TABLE `dokumen_gereja`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `foto_dokumentasi`
--
ALTER TABLE `foto_dokumentasi`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `dokumen_foto` (`id_dokumentasi`);

--
-- Indexes for table `khotbah`
--
ALTER TABLE `khotbah`
  ADD PRIMARY KEY (`id_khotbah`);

--
-- Indexes for table `petugas_ibadah`
--
ALTER TABLE `petugas_ibadah`
  ADD PRIMARY KEY (`id_petugas_ibadah`);

--
-- Indexes for table `tentang_gereja`
--
ALTER TABLE `tentang_gereja`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warta_gereja`
--
ALTER TABLE `warta_gereja`
  ADD PRIMARY KEY (`id_warta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dokumen_gereja`
--
ALTER TABLE `dokumen_gereja`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `foto_dokumentasi`
--
ALTER TABLE `foto_dokumentasi`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `khotbah`
--
ALTER TABLE `khotbah`
  MODIFY `id_khotbah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `petugas_ibadah`
--
ALTER TABLE `petugas_ibadah`
  MODIFY `id_petugas_ibadah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tentang_gereja`
--
ALTER TABLE `tentang_gereja`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `warta_gereja`
--
ALTER TABLE `warta_gereja`
  MODIFY `id_warta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_dokumentasi`
--
ALTER TABLE `foto_dokumentasi`
  ADD CONSTRAINT `dokumen_foto` FOREIGN KEY (`id_dokumentasi`) REFERENCES `dokumentasi` (`id_dokumentasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
