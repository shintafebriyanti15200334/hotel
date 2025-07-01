-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 12:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasihotell`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` char(5) NOT NULL,
  `harga_kamar` bigint(15) NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `status_kamar` int(2) NOT NULL,
  `id_kelas_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `harga_kamar`, `fasilitas_kamar`, `status_kamar`, `id_kelas_kamar`) VALUES
(1, '110', 981818, '<p><p><span style=\"font-size: 1rem;\">Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain.&nbsp;</span><br></p><p>Fasilitas Kamar :&nbsp;</p> AC&nbsp;, TV, Minibar,&nbsp;Brankas,&nbsp;Tempat tidur yang nyaman, Kamar mandi, Akses internet</p><p><br></p>', 0, 1),
(3, '210', 981818, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain.&nbsp;</p><p>Fasilitas Kamar :&nbsp;</p> AC&nbsp;, TV, Minibar,&nbsp;Brankas,&nbsp;Tempat tidur yang nyaman, Kamar mandi, Akses internettt', 0, 3),
(7, '109', 454545, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet dan Tanpa Sarapan', 0, 3),
(8, '115', 981818, '<p><span style=\"font-size: 1rem;\">Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain.&nbsp;</span><br></p><p>Fasilitas Kamar :&nbsp;</p> AC&nbsp;, TV, Minibar,&nbsp;Brankas,&nbsp;Tempat tidur yang nyaman, Kamar mandi, Akses internet', 0, 1),
(10, '102', 568595, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain.&nbsp;</p><p>Fasilitas Kamar :&nbsp;</p> AC&nbsp;, TV, Minibar,&nbsp;Brankas,&nbsp;Tempat tidur yang nyaman, Kamar mandi, Akses internet, Dengan Sarapan', 0, 9),
(17, '112', 568595, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet, Dengan Sarapan', 0, 2),
(26, '207', 568595, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain.&nbsp;</p><p><br></p><p>Fasilitas Kamar :&nbsp;</p><p>- AC&nbsp;</p><p>- TV&nbsp;</p><p>- Minibar&nbsp;</p><p>- Brankas&nbsp;</p><p>- Tempat tidur yang nyaman&nbsp;</p><p>- Kamar mandi&nbsp;</p><p>- Akses internet</p><p>- Dengan sarapan</p>', 0, 2),
(28, '211', 568595, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet, Dengan Sarapan', 0, 2),
(35, '303', 568595, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet, Dengan Sarapan', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kamar_gambar`
--

CREATE TABLE `kamar_gambar` (
  `id_kamar_gambar` int(11) NOT NULL,
  `nama_kamar_gambar` varchar(50) NOT NULL,
  `id_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar_gambar`
--

INSERT INTO `kamar_gambar` (`id_kamar_gambar`, `nama_kamar_gambar`, `id_kamar`) VALUES
(1, 'shintaa.jpg', 1),
(10, 'trio.jpg', 7),
(72, 'nama_kamar_gambar1670301552.jpg', 1),
(73, 'nama_kamar_gambar1670301561.jpg', 1),
(74, 'nama_kamar_gambar1670301573.jpg', 1),
(75, 'nama_kamar_gambar1670301581.jpg', 1),
(82, 'nama_kamar_gambar1670301689.jpg', 7),
(83, 'nama_kamar_gambar1670301695.jpg', 7),
(84, 'nama_kamar_gambar1670301701.jpg', 7),
(85, 'nama_kamar_gambar1670301707.jpg', 7),
(87, 'nama_kamar_gambar1670301903.jpg', 8),
(91, 'nama_kamar_gambar1670302255.jpg', 10),
(92, 'nama_kamar_gambar1670302276.jpg', 17),
(94, 'nama_kamar_gambar1670302483.jpg', 3),
(95, 'nama_kamar_gambar1670302615.jpeg', 26),
(97, 'nama_kamar_gambar1670302831.jpg', 35),
(99, 'nama_kamar_gambar1670302886.jpg', 8),
(100, 'nama_kamar_gambar1670302893.jpg', 8),
(102, 'nama_kamar_gambar1670302905.jpg', 8),
(103, 'nama_kamar_gambar1670302913.jpg', 8),
(105, 'nama_kamar_gambar1670302978.jpg', 10),
(106, 'nama_kamar_gambar1670302988.jpg', 10),
(107, 'nama_kamar_gambar1670303004.jpg', 10),
(108, 'nama_kamar_gambar1670303165.jpg', 10),
(109, 'nama_kamar_gambar1670303238.jpg', 10),
(111, 'nama_kamar_gambar1670303341.jpg', 17),
(112, 'nama_kamar_gambar1670303352.jpg', 17),
(115, 'nama_kamar_gambar1670303477.jpg', 26),
(116, 'nama_kamar_gambar1670303488.jpg', 26),
(117, 'nama_kamar_gambar1670303503.jpg', 26),
(118, 'nama_kamar_gambar1670303512.jpg', 26),
(119, 'nama_kamar_gambar1670303535.jpg', 26),
(120, 'nama_kamar_gambar1670303603.jpg', 28),
(122, 'nama_kamar_gambar1670303717.jpeg', 28),
(123, 'nama_kamar_gambar1670303728.jpg', 28),
(124, 'nama_kamar_gambar1670303754.jpg', 28),
(125, 'nama_kamar_gambar1670303792.jpg', 35),
(126, 'nama_kamar_gambar1670303801.jpg', 35),
(127, 'nama_kamar_gambar1670303819.jpg', 35),
(128, 'nama_kamar_gambar1670303829.jpg', 35);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_kamar`
--

CREATE TABLE `kelas_kamar` (
  `id_kelas_kamar` int(11) NOT NULL,
  `nama_kelas_kamar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_kamar`
--

INSERT INTO `kelas_kamar` (`id_kelas_kamar`, `nama_kelas_kamar`) VALUES
(1, 'KELAS DULUXE'),
(2, 'KELAS SUPERIOR'),
(3, 'KELAS SUITE'),
(9, 'KELAS DELUXE');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nama_reservasi` varchar(25) NOT NULL,
  `tlp_reservasi` varchar(12) NOT NULL,
  `kode_reservasi` varchar(255) NOT NULL,
  `tgl_reservasi_masuk` date NOT NULL,
  `tgl_reservasi_keluar` date NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `status_reservasi` int(2) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nama_reservasi`, `tlp_reservasi`, `kode_reservasi`, `tgl_reservasi_masuk`, `tgl_reservasi_keluar`, `id_kamar`, `status_reservasi`, `id_user`) VALUES
(83, 'Shinta Febriyanti', '0189489184', 'c0ff16784003c2048978', '2022-12-07', '2022-12-10', 1, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_batal`
--

CREATE TABLE `reservasi_batal` (
  `id_batal` int(11) NOT NULL,
  `alasan_batal` varchar(255) NOT NULL,
  `id_reservasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_pembayaran`
--

CREATE TABLE `reservasi_pembayaran` (
  `id_reservasi_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi_pembayaran`
--

INSERT INTO `reservasi_pembayaran` (`id_reservasi_pembayaran`, `tgl_pembayaran`, `nominal_pembayaran`, `uang_bayar`, `kembalian`, `id_reservasi`) VALUES
(26, '2022-12-07', 2945454, 2945454, 0, 83);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `tlp_user` bigint(15) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `id_user_group` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `tlp_user`, `username_user`, `password_user`, `id_user_group`, `status`) VALUES
(1, 'Admin Billies Hotel', 'testing@gmail.com', 89876543210, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(12, 'Shinta Febriyanti', 'shinta@gmail.com', 189489184, 'shinta', '202cb962ac59075b964b07152d234b70', 2, 0),
(13, 'Anis Romzi', 'anis000romzi@gmail.com', 83185275055, 'lordanis123', '202cb962ac59075b964b07152d234b70', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id_user_group` int(11) NOT NULL,
  `nama_user_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id_user_group`, `nama_user_group`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `kamar_gambar`
--
ALTER TABLE `kamar_gambar`
  ADD PRIMARY KEY (`id_kamar_gambar`);

--
-- Indexes for table `kelas_kamar`
--
ALTER TABLE `kelas_kamar`
  ADD PRIMARY KEY (`id_kelas_kamar`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `reservasi_batal`
--
ALTER TABLE `reservasi_batal`
  ADD PRIMARY KEY (`id_batal`);

--
-- Indexes for table `reservasi_pembayaran`
--
ALTER TABLE `reservasi_pembayaran`
  ADD PRIMARY KEY (`id_reservasi_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id_user_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kamar_gambar`
--
ALTER TABLE `kamar_gambar`
  MODIFY `id_kamar_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `kelas_kamar`
--
ALTER TABLE `kelas_kamar`
  MODIFY `id_kelas_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `reservasi_batal`
--
ALTER TABLE `reservasi_batal`
  MODIFY `id_batal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservasi_pembayaran`
--
ALTER TABLE `reservasi_pembayaran`
  MODIFY `id_reservasi_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id_user_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
