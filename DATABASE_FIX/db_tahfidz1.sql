-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 10:03 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tahfidz1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabsensi_santri`
--

CREATE TABLE `tabsensi_santri` (
  `id_absen` int(100) NOT NULL,
  `id_santri` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_santri` varchar(25) NOT NULL,
  `status_kehadiran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabsensi_santri`
--

INSERT INTO `tabsensi_santri` (`id_absen`, `id_santri`, `tanggal`, `nama_santri`, `status_kehadiran`) VALUES
(0, 0, '2020-12-25', 'putri rahmadhani', 'masuk'),
(1, 201, '2020-08-27', 'putri ramadhani', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tabsen_pengajar`
--

CREATE TABLE `tabsen_pengajar` (
  `id_absen` int(11) NOT NULL,
  `id_pengajar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status_kehadiran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabsen_pengajar`
--

INSERT INTO `tabsen_pengajar` (`id_absen`, `id_pengajar`, `tanggal`, `status_kehadiran`) VALUES
(3, 'G001', '2020-12-25', 'Izin'),
(6, 'G001', '2020-12-26', 'Complate'),
(7, 'G002', '2020-12-30', 'Izin'),
(8, 'G001', '2121-01-11', 'Sakit'),
(9, 'G001', '2121-01-12', 'Complate'),
(10, 'G003', '2121-01-21', 'Complate');

-- --------------------------------------------------------

--
-- Table structure for table `tberita`
--

CREATE TABLE `tberita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tberita`
--

INSERT INTO `tberita` (`id_berita`, `judul`, `isi`, `tanggal_terbit`, `gambar`) VALUES
(1, 'Penyebaran virus corona', 'Melansir dari Forbes, dalam proses menginfeksi, virus perlu masuk ke saluran pernapasan untuk membajak mesin sel dan menggunakannya untuk bereproduksi. Gejala akan muncul saat akhirnya seseorang yang terinfeksi dan antibodinya mulai berusaha melawan virus. Masa ini biasanya lebih pendek dari masa inkubasi. Umumnya hanya sekitar 24 sampai 48 jam atau lebih pendek dari itu. Saat itu seseorang mungkin akan mulai menularkan virus setidaknya satu hingga dua hari sebelum seseorang menunjukkan gejalanya.  Artikel ini telah tayang di Kompas.com dengan judul ', '2020-01-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `thafalan`
--

CREATE TABLE `thafalan` (
  `id_hafalan` int(10) NOT NULL,
  `id_santri` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `surah_mulai` varchar(200) NOT NULL,
  `surah_selesai` varchar(200) NOT NULL,
  `hasil_akhir` int(15) NOT NULL,
  `bonus_hafalan` int(21) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thafalan`
--

INSERT INTO `thafalan` (`id_hafalan`, `id_santri`, `tanggal`, `surah_mulai`, `surah_selesai`, `hasil_akhir`, `bonus_hafalan`, `keterangan`) VALUES
(1, 5, '2021-01-17', 'Al-baqarah 1', 'Al-baqarah 200', 200, 4, 'Lulus/GratisSPP'),
(2, 4, '2021-01-17', 'Al-baqarah 1', 'Ali-imran200', 10, 0, 'Belum Lulus'),
(4, 6, '2021-01-17', 'Ali-imran1', 'Ali-imran200', 200, 7, 'Lulus/GratisSPP'),
(5, 7, '2021-01-17', 'Ali-imran1', 'Ali-imran200', 200, 2, 'Lulus/GratisSPP');

-- --------------------------------------------------------

--
-- Table structure for table `tpengajar`
--

CREATE TABLE `tpengajar` (
  `nama_pengajar` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `status_kawin` varchar(25) NOT NULL,
  `pendidikan_terakhir` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `id_pengajar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpengajar`
--

INSERT INTO `tpengajar` (`nama_pengajar`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jk`, `status_kawin`, `pendidikan_terakhir`, `email`, `nohp`, `tahun_masuk`, `id_pengajar`) VALUES
('putri rahmadhani', 'Pasaman Timur', '2020-12-15', 'Rao', 'Perempuan', 'belum menikah', 'D3', 'putri_rdh@gmail.com', '083182233073', 2020, 'G001'),
('satria rahmat putra', '', '0000-00-00', '', '', '', '', '', '', 0000, 'G002'),
('putri', '', '0000-00-00', '', '', '', '', '', '', 0000, 'G003');

-- --------------------------------------------------------

--
-- Table structure for table `tsantri`
--

CREATE TABLE `tsantri` (
  `id_santri` int(10) NOT NULL,
  `nama_santri` varchar(25) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `jumlah_hafalan_sementara` float NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `nama_ayah` varchar(25) NOT NULL,
  `nama_ibu` varchar(25) NOT NULL,
  `pekerjaan_ayah` text NOT NULL,
  `pekerjaan_ibu` text NOT NULL,
  `kontak_ortu` varchar(25) NOT NULL,
  `email_ortu` varchar(50) NOT NULL,
  `id_pengajar` varchar(100) NOT NULL,
  `foto_santri` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsantri`
--

INSERT INTO `tsantri` (`id_santri`, `nama_santri`, `jk`, `jumlah_hafalan_sementara`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tahun_masuk`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `kontak_ortu`, `email_ortu`, `id_pengajar`, `foto_santri`) VALUES
(4, 'Putri pintar nomor1', 'Perempuan', 2.5, 'rao', '2020-12-02', 'pasaman', 2020, 'kdjfkgjdh', 'jgfhgn', 'hdfjksfhjd', 'rdjhgfsh', '083178221037', 'hsdgha@gmail.com', 'G001', 'DONASI_UWA2.jpg'),
(5, 'satria pintar nomor2', 'Laki-Laki', 1.5, 'padang', '2020-12-01', 'padang', 2020, 'kkhjkl', 'hkkjj', 'gdjkghdfj', 'rdjhgfsh', '083178221036', 'ajashsd@gmail.com', 'G002', 'SATRIA-RAHMAT-PUTRA1.png'),
(6, 'zamzam', 'Laki-Laki', 0, 'Pasaman Timur', '2021-02-16', 'rimbo data', 2010, 'dasd', 'jlkl', 'jk', 'jlk', '032132132132', 'sa@gmail.com', 'G002', 'HD_bupati.JPG'),
(7, 'rifiisss', 'Perempuan', 0, 'Pasaman Timur', '2021-01-17', 'rimbo datah', 2010, 'dasd', 'jlkl', 'jk', 'jlk', '032132132132', 'sa@gmail.com', 'G001', 'HD_wabup.JPG'),
(8, 'prin', 'Perempuan', 0, 'Pasaman Timur', '2021-01-22', 'rimbo datah', 2010, 'dasd', 'jlkl', 'jk', 'jlk', '032132132132', 'sa@gmail.com', 'G003', 'IMG_20210119_071617.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tsurah`
--

CREATE TABLE `tsurah` (
  `id_surah` int(11) NOT NULL,
  `nama_surah` varchar(100) NOT NULL,
  `target_hafalan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsurah`
--

INSERT INTO `tsurah` (`id_surah`, `nama_surah`, `target_hafalan`) VALUES
(8, 'al fil', 'capai target'),
(9, 'al baqarah', 'capai target');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `password` varchar(260) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
('0', 'admin', 'admin@gmail.com', 'default.png', '$2y$10$hWI2gkMUd9sX06bgXu6QIO7GPIlqUHEeMAd3AC5qqXCIX7N5qv.AS', 1, 1, 1601653500),
('G001', 'putri rahmadhani', 'putri_rdh@gmail.com', 'default.png', '$2y$10$NyFj3V8dkUaG1PJMkQAUhOmHRfOStAAgN6A90jzvcv97/4AIbBMeC', 2, 1, 1608889899),
('G002', 'satria rahmat putra', 'satriarahmatputra@gmail.com', 'default.png', '$2y$10$FhwNJeBnMc5gEv94AAJryO7KRlVr5ZJBFJEp/lUUUCJOFcpHns0xq', 2, 1, 1609328559),
('G003', 'putri', 'putri@gmail.com', 'default.png', '$2y$10$nEj1F1KZC.ZMkiJrAAa9FOcp/Sl8vG4B69Wmji9EQ5kaH/qSNbElm', 2, 1, 1611218993);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 2, 9),
(11, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'santri'),
(6, 'pengajar'),
(9, 'Presensi'),
(10, 'Santri');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'donatur');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `url` varchar(120) NOT NULL,
  `icon` varchar(120) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profile', 'user', 'fas fa-fw fa-user-circle', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'Santri', 'santri', 'fas fa-fw fa-user-friends', 1),
(7, 6, 'Pengajar', 'pengajar', 'fas fa-fw fa-user-friends', 1),
(12, 9, 'Harian', 'PresensiR2', 'fas fa-fw fa-folder', 1),
(13, 6, 'Presensi', 'PresensiR1', 'fas fa-fw fa-user-friends', 1),
(14, 6, 'Rekap Presensi', 'RekapPresensi', 'fas fa-fw fa-user-friends', 1),
(15, 6, 'Rekap Semua', 'RekapSemua', 'fas fa-fw fa-user-friends', 1),
(16, 10, 'Hafalan', 'Hafalan', 'fas fa-fw fa-folder', 1),
(17, 4, 'Rapor', 'Rapor', 'fas fa-fw fa-folder', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabsensi_santri`
--
ALTER TABLE `tabsensi_santri`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tabsen_pengajar`
--
ALTER TABLE `tabsen_pengajar`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tberita`
--
ALTER TABLE `tberita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `thafalan`
--
ALTER TABLE `thafalan`
  ADD PRIMARY KEY (`id_hafalan`);

--
-- Indexes for table `tpengajar`
--
ALTER TABLE `tpengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `tsantri`
--
ALTER TABLE `tsantri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `tsurah`
--
ALTER TABLE `tsurah`
  ADD PRIMARY KEY (`id_surah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabsen_pengajar`
--
ALTER TABLE `tabsen_pengajar`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tberita`
--
ALTER TABLE `tberita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thafalan`
--
ALTER TABLE `thafalan`
  MODIFY `id_hafalan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tsantri`
--
ALTER TABLE `tsantri`
  MODIFY `id_santri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tsurah`
--
ALTER TABLE `tsurah`
  MODIFY `id_surah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
