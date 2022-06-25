-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 02:47 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisrepawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `foto_admin`) VALUES
(36, 'Muhammad Yeiko Akbar', 'myko12', 'myko123', '5841eddd291e3fee251e8f3e334c45c7.jpg'),
(38, 'Muhammad Hanif Arafi', 'hanif12', 'hanif123', 'c4d3512c3b5cea7561d2db51683b9cb6.png');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_destinasi_wisata`
--

CREATE TABLE `artikel_destinasi_wisata` (
  `id_artikel_destinasi_wisata` int(11) NOT NULL,
  `foto_destinasi_wisata` varchar(100) NOT NULL,
  `foto_banner_artikel` varchar(100) NOT NULL,
  `tiket_masuk` bigint(100) NOT NULL,
  `nama_destinasi_wisata` varchar(100) NOT NULL,
  `alamat_destinasi_wisata` varchar(100) NOT NULL,
  `deskripsi_destinasi_wisata` text NOT NULL,
  `jam_operational` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel_destinasi_wisata`
--

INSERT INTO `artikel_destinasi_wisata` (`id_artikel_destinasi_wisata`, `foto_destinasi_wisata`, `foto_banner_artikel`, `tiket_masuk`, `nama_destinasi_wisata`, `alamat_destinasi_wisata`, `deskripsi_destinasi_wisata`, `jam_operational`) VALUES
(23, '812dea980d69557a29d3bb379f67c077.jpg', 'a1753c5063977c162e8d93baab51c486.jpg', 5000, 'Wisata Rumpuk Watu', 'Desa Mendak, Kecamatan Dagangan, Kabupaten Madiun, Provinsi Jawa Timur', '<p>Alam Watu Rumpuk begitu indah, hijaunya pepohonan menyatu dengan langit biru. Ditambah lagi, warna-warni dari bunga di taman menjadikannya lebih indah. Tidak hanya indah, tempat ini pun tertata rapi dengan pola-pola yang unik. B4:D4Spot-spot foto kekinian tak lupa dihadirkan di wisata alam ini. Seperti semak yang dibentuk, cangkir raksasa hingga bambu yang dibentuk seperti pusaran api. Dan tak lupa, ikon tulisan Watu Rumpuk yang di bawahnya terdapat taman berbentuk hati.</p>', '08.00 AM - 16.00 PM'),
(26, '1c35ef7dee9ea91dff5c8ffb365e139c.jpg', '13922995f1f42a80907e2c8dd3d943a3.jpg', 100000, 'Taman Wisata Gunung Kendil', 'Area Sawah, Pilangrejo, Wungu, Madiun, Jawa Timur', '<p>Taman Wisata Gunung Kendil, salah satu wisata alam di Madiun. Objek wisata ini cukup terkenal di Jawa Timur. Tempat ini cukup sering diadakan untuk lokasi off-road. Selain itu masih banyak fasilitas yang menarik. Taman Wisata Gunung Kendil ini berlokasi di desa Pilangrejo, kecamatan Wungu, Kabupaten Madiun. Dulunya, tempat ini dipergunakan sebagai latihan militer. Sekarang menjadi salah satu obyek wisata.Wahana rekreasi yang disediakan di Taman Wisata Gunung Kendil seperti tempat pemancingan, lapangan latihan menembak, bumi perkemahan hingga arena balap motor. Pengunjung yang datang pun bisa dengan puas menikmati seluruh fasilitas yang disediakan.Disini terdapat fasilitas pendukung seperti gazebo, toilet dan lainnya</p>', '08.00 AM – 17.00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi_tujuan`
--

CREATE TABLE `destinasi_tujuan` (
  `id_destinasi_tujuan` int(11) NOT NULL,
  `nama_destinasi_tujuan` varchar(100) NOT NULL,
  `foto_destinasi_tujuan` varchar(100) NOT NULL,
  `durasi_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi_tujuan`
--

INSERT INTO `destinasi_tujuan` (`id_destinasi_tujuan`, `nama_destinasi_tujuan`, `foto_destinasi_tujuan`, `durasi_jam`) VALUES
(40, 'Monumen PKI Madiun', 'f885abdc71b07cc4e12cb5e30b2e1c21.jpg', 2),
(41, 'Hutan Pinus Nongko Ijo', 'b7293a2e65f0141e7a593f4344a5acf9.jpg', 3),
(42, 'Wisata Rumpuk Watu', '2ec2c3bad063b87f8cce8f6b9ab34d00.jpg', 3),
(43, 'Wana Wisata Grape', 'eb3f61f9cd1b2b54b0586cc4c4801392.jpg', 3),
(44, 'Kedung Malem Waterfall', '896067f0ed996614db0d611808504911.jpg', 2),
(45, 'Taman Wisata Gunung Kendil', '1fd45621fa345c5c49e2da249398f7e1.jpg', 2),
(46, 'Desa Wisata Brumbun Brumbun Tubing', '4d7e4b0ae45c05b07f82b1c56fe8a5b9.jpg', 3),
(47, 'Air Terjun Banyulawe', 'f0a4c2f56279c1e6aae7af16ecdc7431.jpg', 3),
(48, 'Waduk Bening Widas', '0b32110f3ca0624e89e8ce369ee0afdb.jpg', 1),
(49, 'Dungus Forest Park', '5df39fe7694c239fbdad4437cabd3d18.jpg', 2),
(50, 'Camp Sekar Arum Kare', 'e0cfb829093c743d2630ec5c79430890.jpg', 2),
(51, 'Pasar Pundensari Desa Gunungsari', 'f6668ae4f498f27de8e5cf49fc5271f9.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket_wisata`
--

CREATE TABLE `detail_paket_wisata` (
  `id_detail_paket_wisata` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `id_destinasi_tujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_paket_wisata`
--

INSERT INTO `detail_paket_wisata` (`id_detail_paket_wisata`, `id_paket_wisata`, `id_destinasi_tujuan`) VALUES
(375, 85, 40),
(376, 85, 41),
(383, 87, 40),
(384, 87, 41),
(385, 87, 43),
(386, 86, 40),
(387, 86, 41),
(388, 86, 42),
(389, 88, 46),
(390, 88, 51),
(391, 89, 50),
(392, 89, 51),
(393, 90, 42),
(394, 90, 43),
(395, 90, 46),
(396, 91, 40),
(397, 91, 41),
(398, 92, 40),
(399, 92, 41),
(400, 92, 50),
(401, 93, 40),
(402, 93, 47),
(403, 93, 48),
(404, 94, 50),
(405, 94, 51),
(406, 95, 42),
(407, 95, 43),
(408, 95, 46);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rating`
--

CREATE TABLE `detail_rating` (
  `id_rating` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_rating`
--

INSERT INTO `detail_rating` (`id_rating`, `id_paket_wisata`, `ip_address`, `rating`) VALUES
(93, 85, '::1', 3),
(94, 86, '::1', 2),
(95, 87, '::1', 5),
(96, 88, '::1', NULL),
(97, 89, '::1', NULL),
(98, 90, '::1', NULL),
(99, 91, '::1', NULL),
(100, 92, '::1', NULL),
(101, 93, '::1', NULL),
(102, 94, '::1', NULL),
(103, 95, '::1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` varchar(100) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `bobot` float NOT NULL,
  `attribut` enum('Benefit','Cost','','') NOT NULL,
  `bobot_nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `ket`, `bobot`, `attribut`, `bobot_nilai`) VALUES
('C1', 'Harga Paket', 5, 'Cost', 0.25),
('C2', 'Durasi', 5, 'Benefit', 0.25),
('C3', 'Usia', 5, 'Cost', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `C1` int(11) NOT NULL,
  `C2` int(11) NOT NULL,
  `C3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_paket_wisata`, `C1`, `C2`, `C3`) VALUES
(24, 85, 47, 52, 63),
(25, 86, 49, 53, 63),
(26, 87, 47, 52, 64),
(27, 88, 48, 53, 64),
(28, 89, 48, 53, 64),
(29, 90, 48, 52, 64),
(30, 91, 47, 52, 62),
(31, 92, 50, 54, 63),
(32, 93, 51, 55, 63),
(33, 94, 47, 52, 64),
(34, 95, 49, 54, 64);

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_paket_wisata` int(11) NOT NULL,
  `id_penginapan` int(11) NOT NULL,
  `id_tempat_makan` int(11) NOT NULL,
  `id_tic` int(11) NOT NULL,
  `nama_paket_wisata` varchar(50) NOT NULL,
  `deskripsi_paket_wisata` text NOT NULL,
  `foto_paket_wisata` varchar(100) NOT NULL,
  `harga_paket_wisata` bigint(100) NOT NULL,
  `durasi_paket_wisata` varchar(20) NOT NULL,
  `rating_paket_wisata` decimal(19,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket_wisata`, `id_penginapan`, `id_tempat_makan`, `id_tic`, `nama_paket_wisata`, `deskripsi_paket_wisata`, `foto_paket_wisata`, `harga_paket_wisata`, `durasi_paket_wisata`, `rating_paket_wisata`) VALUES
(85, 12, 7, 7, 'Paket Wisata Hemat 1', '<p>Paket Wisata Hemat 1 menawarkan berbagai macam destinasi wisata yang dapat dikunjungi oleh pengunjung selama satu hari penuh. Paket wisata ini juga sudah tersedia penginapan dan tempat makan yang menjadi favorite pengunjung</p>', '38bde7cf547551ed8ee1606d9208bd2d.png', 250000, '1', '3.0'),
(86, 19, 15, 7, 'Paket Wisata Grape 1', '<p>Paket Wisata yang memiliki berbagai macam destinasi wisata yang cocok untuk keluarga. Paket wisata ini juga dilengkapi dengan penginapan terbaik dan tempat makan yang memiliki menu-menu favorite</p>', '59699539d0d5d98af7bb87fa22158aa9.png', 1250000, '2', '2.0'),
(87, 13, 15, 7, 'Paket Wisata Keluarga 3', '<p>Paket wisata grape 1 merupakan paket wisata yang berisi destinasi wisata yang hanya terdapat di daerah Grape, Kab. Madiun. Paket wisata ini tidak hanya menawarkan wisata alam melainkan juga wisata yang menguji ardenailin</p>', 'fc4485ff9661859915da4ea0f9c2c30e.png', 350000, '1', '5.0'),
(88, 19, 16, 7, 'Paket Wisata Hemat 2', '<p>Paket Wisata yang menyediakan berbagai destinasi alam yang tengah tranding di daerah Kabpuaten Madiun. Paket wisata ini sudah dilengkapi dengan penginapan dan tempat makan</p>', '4570a9dfbc3da2a39a5cf11d089be7f5.png', 789000, '2', '0.0'),
(89, 12, 7, 7, 'Paket Wisata Family ', '<p>Paket Wisata Family yang menyediakan berbagai destinasi alam yang tengah tranding di daerah Kabpuaten Madiun dan khusus untuk perjalanan keluarga. Paket wisata ini sudah dilengkapi dengan penginapan dan tempat makan</p>', 'ccb329e330733db10a3c5d9b2838462c.png', 930000, '2', '0.0'),
(90, 13, 6, 7, 'Paket Wisata Weekend 1 ', '<p>Paket wisata yang cocok bagi anda yang tengah mencari paket wisata khusus Weekend. Paket wisata ini hanya tersedia saat weekend saja. Memiliki destinasi tujuan (4 destinasi) yang kekinian dan bertemakan alam, tempat makan, dan penginapan. Untuk harga paket ini sangat ramah di kantong Anda!</p>', 'e117b48e9a2d6f94980355f757b4bca8.png', 750000, '1', '0.0'),
(91, 13, 16, 7, 'Paket Wisata Kilat', '<p>Paket wisata yang ditujukan bagi anda yang ingin menikmati beberapa destinasi wisata kabupaten Madiun hanya dengan waktu 1 hari</p>', '94793ed615b17b3e8f8e7c4ff975a0eb.png', 250000, '1', '0.0'),
(92, 13, 7, 7, 'Paket Wisata Family Plus', '<p>Paket Wisata Family Plus yang menyediakan berbagai destinasi alam yang tengah tranding di daerah Kabpuaten Madiun dan khusus untuk perjalanan keluarga. Paket wisata ini sudah dilengkapi dengan penginapan dan tempat makan. Kunjungan 4 destinasi wisata</p>', '4574e68edf0074ee57aa8bd32a797757.png', 2500000, '3', '0.0'),
(93, 12, 7, 7, 'Paket Wisata Keluarga 1', '<p>Paket Wisata yang memiliki berbagai macam destinasi wisata yang cocok untuk keluarga. Paket wisata ini juga dilengkapi dengan penginapan terbaik dan tempat makan yang memiliki menu-menu favorite</p>', '2d0a8bf1b0e82199ca7b5b21b55c89d5.png', 3100000, '4', '0.0'),
(94, 13, 6, 7, 'Paket Wisata Kilat 2', '<p>Paket wisata yang ditujukan bagi anda yang ingin menikmati beberapa destinasi wisata kabupaten Madiun hanya dengan waktu 1 hari dan dilengkapi dengan makan dan penginapan</p>', 'f4f377e3b022b711a4f7706ce61f98c4.png', 260000, '1', '0.0'),
(95, 19, 16, 7, 'Paket Wisata Weekend  2', '<p>Paket wisata yang cocok bagi anda yang tengah mencari paket wisata khusus Weekend. Paket wisata ini hanya tersedia saat weekend saja. Memiliki destinasi tujuan (5 destinasi) yang kekinian dan bertemakan alam, tempat makan, dan penginapan. Untuk harga paket ini sangat ramah di kantong Anda!</p>', '2a5893ef5d29416f00557c9d2d66e2a7.png', 1400000, '3', '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id_penginapan` int(11) NOT NULL,
  `nama_penginapan` varchar(100) NOT NULL,
  `jumlah_orang` varchar(20) NOT NULL,
  `alamat_penginapan` text NOT NULL,
  `fasilitas_penginapan` varchar(200) NOT NULL,
  `foto_penginapan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id_penginapan`, `nama_penginapan`, `jumlah_orang`, `alamat_penginapan`, `fasilitas_penginapan`, `foto_penginapan`) VALUES
(12, 'Artayya Puri Homestay 2', '2', 'Jl. Kolonel Marhadi No.25, Pereng, Mejayan, Kec. Mejayan, Kabupaten Madiun, Jawa Timur', 'parkir gratis, AC, Tv Layar datar, Kamar mandi pribadi, area bebas rokok', '1e0184c0d5ad385976215f60dfa3f9ae.PNG'),
(13, 'Login Homestay', '2', 'Jl. Musi No.13, Pandean, Kec. Taman, Kota Madiun, Jawa Timur', 'parkir gratis, Tv Layar datar, kamar mandi pribadi, Wifi, Sarapan gratis, dapur kecil, layanan kamar', '8cb464647f724d8efb46d0932280ea2e.jpg'),
(19, 'MM HOMESTAY', '2', 'Jl. Raya Solo No.27, Sumber, Kraton, Kec. Maospati, Kabupaten Magetan, Jawa Timur', 'parkir gratis, Tv Layar datar, kamar mandi pribadi, Wifi, Sarapan gratis, dapur kecil, layanan kamar', '957237408ba9fba744d8d0dd03c4af8f.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `kd_kriteria` varchar(100) NOT NULL,
  `ket_sub` varchar(128) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `kd_kriteria`, `ket_sub`, `bobot`) VALUES
(47, 'C1', '0-500.000', 1),
(48, 'C1', '501.000-1.000.000', 2),
(49, 'C1', '1.001.000-2.000.000', 3),
(50, 'C1', '2.001.000-3.000.000', 4),
(51, 'C1', '>3.000.000', 5),
(52, 'C2', '1 Hari', 1),
(53, 'C2', '2 Hari', 2),
(54, 'C2', '3 Hari', 3),
(55, 'C2', '4 Hari', 4),
(56, 'C2', '5 Hari', 5),
(62, 'C3', 'Usia < 5 tahun', 1),
(63, 'C3', 'Usia 6-10 tahun', 2),
(64, 'C3', 'Usia 11-30 tahun', 3),
(65, 'C3', 'Usia 31-49 tahun', 4),
(66, 'C3', 'Usia > 50 tahun', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_makan`
--

CREATE TABLE `tempat_makan` (
  `id_tempat_makan` int(11) NOT NULL,
  `nama_tempat_makan` varchar(100) NOT NULL,
  `alamat_tempat_makan` text NOT NULL,
  `menu_favorite` varchar(100) NOT NULL,
  `foto_tempat_makan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_makan`
--

INSERT INTO `tempat_makan` (`id_tempat_makan`, `nama_tempat_makan`, `alamat_tempat_makan`, `menu_favorite`, `foto_tempat_makan`) VALUES
(6, 'Gado Gado dan Tahu Campur Pak Tomo', 'Jl. Biliton No.20, Madiun Lor, Kec. Manguharjo, Kota Madiun, Jawa Timur', 'gado-gado, tahu campur', '62dfea87c5308c6a375a0dd51a174e4a.jpg'),
(7, 'Ayam Goreng Kemangi', 'Jl. Sulawesi No.2A, Kartoharjo, Kec. Kartoharjo, Kota Madiun, Jawa Timur', 'ayam kemangi', '65e51067c44941869c2c6c9aaf95d040.jpg'),
(15, 'Lombok Idjo Madiun', 'Jl. Kalimantan No.36, Kartoharjo, Kec. Kartoharjo, Kota Madiun, Jawa Timur', 'ayam goreng lombok ijo, ayam bakar, gurame bakar', '9f55cf7632b5cc1149bc18427a8f633e.jpg'),
(16, 'Depot Es Segar', 'Jl. Dr. Sutomo No.116, Kejuron, Kec. Kartoharjo, Kota Madiun, Jawa Timur', 'es campur, es sanghai', 'ba0c23edd7c914ededcfc9c8d9c35595.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tic`
--

CREATE TABLE `tic` (
  `id_tic` int(11) NOT NULL,
  `nama_tic` varchar(100) NOT NULL,
  `alamat_tic` text NOT NULL,
  `kontak_tic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tic`
--

INSERT INTO `tic` (`id_tic`, `nama_tic`, `alamat_tic`, `kontak_tic`) VALUES
(7, 'TIC Pangeran Timur', 'Jl. Singoludro, Kronggahan, Mejayan, Kec. Mejayan', '035138909834');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel_destinasi_wisata`
--
ALTER TABLE `artikel_destinasi_wisata`
  ADD PRIMARY KEY (`id_artikel_destinasi_wisata`);

--
-- Indexes for table `destinasi_tujuan`
--
ALTER TABLE `destinasi_tujuan`
  ADD PRIMARY KEY (`id_destinasi_tujuan`);

--
-- Indexes for table `detail_paket_wisata`
--
ALTER TABLE `detail_paket_wisata`
  ADD PRIMARY KEY (`id_detail_paket_wisata`),
  ADD KEY `Id_destinasi_tujuan` (`id_destinasi_tujuan`),
  ADD KEY `Id_paket_wisata` (`id_paket_wisata`);

--
-- Indexes for table `detail_rating`
--
ALTER TABLE `detail_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_paket_wisata` (`id_paket_wisata`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_paket_wisata` (`id_paket_wisata`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_paket_wisata`),
  ADD KEY `Id_penginapan` (`id_penginapan`),
  ADD KEY `Id_tempat_makan` (`id_tempat_makan`),
  ADD KEY `Id_tic` (`id_tic`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `kd_kriteria` (`kd_kriteria`) USING BTREE;

--
-- Indexes for table `tempat_makan`
--
ALTER TABLE `tempat_makan`
  ADD PRIMARY KEY (`id_tempat_makan`);

--
-- Indexes for table `tic`
--
ALTER TABLE `tic`
  ADD PRIMARY KEY (`id_tic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `artikel_destinasi_wisata`
--
ALTER TABLE `artikel_destinasi_wisata`
  MODIFY `id_artikel_destinasi_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `destinasi_tujuan`
--
ALTER TABLE `destinasi_tujuan`
  MODIFY `id_destinasi_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `detail_paket_wisata`
--
ALTER TABLE `detail_paket_wisata`
  MODIFY `id_detail_paket_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;

--
-- AUTO_INCREMENT for table `detail_rating`
--
ALTER TABLE `detail_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_paket_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tempat_makan`
--
ALTER TABLE `tempat_makan`
  MODIFY `id_tempat_makan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tic`
--
ALTER TABLE `tic`
  MODIFY `id_tic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_paket_wisata`
--
ALTER TABLE `detail_paket_wisata`
  ADD CONSTRAINT `detail_paket_wisata_ibfk_1` FOREIGN KEY (`id_paket_wisata`) REFERENCES `paket_wisata` (`id_paket_wisata`),
  ADD CONSTRAINT `detail_paket_wisata_ibfk_2` FOREIGN KEY (`id_destinasi_tujuan`) REFERENCES `destinasi_tujuan` (`id_destinasi_tujuan`);

--
-- Constraints for table `detail_rating`
--
ALTER TABLE `detail_rating`
  ADD CONSTRAINT `detail_rating_ibfk_1` FOREIGN KEY (`id_paket_wisata`) REFERENCES `paket_wisata` (`id_paket_wisata`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_paket_wisata`) REFERENCES `paket_wisata` (`id_paket_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD CONSTRAINT `paket_wisata_ibfk_2` FOREIGN KEY (`id_tempat_makan`) REFERENCES `tempat_makan` (`id_tempat_makan`),
  ADD CONSTRAINT `paket_wisata_ibfk_3` FOREIGN KEY (`id_tic`) REFERENCES `tic` (`id_tic`),
  ADD CONSTRAINT `paket_wisata_ibfk_4` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`);

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
