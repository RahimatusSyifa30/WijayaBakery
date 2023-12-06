-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2023 at 01:00 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wijaya_bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int NOT NULL,
  `id_pesanan` int NOT NULL,
  `id_produk` int NOT NULL,
  `id_user` int NOT NULL,
  `kuantitas` int NOT NULL,
  `sub_modal` bigint NOT NULL,
  `sub_total` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_produk`, `id_user`, `kuantitas`, `sub_modal`, `sub_total`) VALUES
(1, 1, 1, 2, 20, 50000, 100000),
(2, 2, 2, 2, 1399, 3497500, 6995000),
(3, 3, 1, 1, 18, 45000, 90000),
(4, 4, 3, 1, 1, 2500, 5000),
(5, 4, 4, 1, 1, 2500, 5000),
(6, 5, 2, 1, 1, 2500, 5000),
(7, 6, 5, 2, 1, 6500, 13000),
(8, 7, 7, 2, 1499, 13116250, 26232500);

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id_favorit` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_produk`
--

CREATE TABLE `kelompok_produk` (
  `id_kel` int NOT NULL,
  `nama_kel` varchar(10) NOT NULL,
  `gambar_kel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kelompok_produk`
--

INSERT INTO `kelompok_produk` (`id_kel`, `nama_kel`, `gambar_kel`) VALUES
(1, 'Roti', 'roti_mboi.jpeg'),
(2, 'Pizza', 'pizza_jumbo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int UNSIGNED NOT NULL,
  `id_pesanan` int NOT NULL,
  `tanggal_laporan` timestamp NOT NULL,
  `modal` bigint NOT NULL,
  `keuntungan_kotor` bigint NOT NULL,
  `keuntungan_bersih` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pesanan`, `tanggal_laporan`, `modal`, `keuntungan_kotor`, `keuntungan_bersih`) VALUES
(1, 3, '2023-10-19 09:23:55', 45000, 90000, 45000),
(2, 1, '2023-10-19 09:24:57', 50000, 100000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(113, '2023-05-28-032051', 'App\\Database\\Migrations\\User', 'default', 'App', 1697309584, 1),
(114, '2023-05-29-100100', 'App\\Database\\Migrations\\KelompokProduk', 'default', 'App', 1697309584, 1),
(115, '2023-05-29-100200', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1697309584, 1),
(116, '2023-05-29-100300', 'App\\Database\\Migrations\\Pesanan', 'default', 'App', 1697309584, 1),
(117, '2023-05-29-100400', 'App\\Database\\Migrations\\DetailPesanan', 'default', 'App', 1697309584, 1),
(118, '2023-05-29-100743', 'App\\Database\\Migrations\\Laporan', 'default', 'App', 1697309584, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `tanggal` timestamp NOT NULL,
  `tanggal_pengambilan` date NOT NULL,
  `id_user` int NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Belum',
  `total_modal` bigint NOT NULL,
  `total_harga` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal`, `tanggal_pengambilan`, `id_user`, `status`, `total_modal`, `total_harga`) VALUES
(1, '2023-10-19 09:24:57', '0000-00-00', 2, 'Selesai', 50000, 100000),
(2, '2023-10-14 19:10:05', '2023-10-24', 2, 'Diproses', 3497500, 6995000),
(3, '2023-10-19 09:23:55', '2023-10-19', 1, 'Selesai', 45000, 90000),
(4, '2023-10-19 09:40:08', '2023-10-19', 1, 'Belum', 5000, 10000),
(5, '2023-10-23 14:53:33', '2023-10-23', 1, 'Belum', 2500, 5000),
(6, '2023-10-23 14:53:55', '2023-10-23', 2, 'Belum', 6500, 13000),
(7, '2023-10-23 14:56:41', '2023-10-24', 2, 'Belum', 13116250, 26232500);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `jenis_produk` int NOT NULL,
  `stok_produk` int NOT NULL,
  `modal_produk` bigint NOT NULL,
  `harga_produk` bigint NOT NULL,
  `informasi_produk` longtext NOT NULL,
  `gambar_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jenis_produk`, `stok_produk`, `modal_produk`, `harga_produk`, `informasi_produk`, `gambar_produk`) VALUES
(1, 'Beef Roll', 1, 2, 2500, 5000, '', 'bee_roll.jpeg'),
(2, 'Coklat Keju', 1, 29, 2500, 5000, 'Roti coklat keju adalah pilihan sempurna bagi pecinta roti yang mencari rasa manis yang lezat dan gurih yang kaya. Roti ini terbuat dari bahan-bahan berkualitas tinggi, termasuk coklat berkualitas baik yang memberikan rasa manis dan aroma yang sedap, serta keju yang meleleh di mulut dan memberikan sentuhan gurih yang sempurna.', 'coklat_keju.jpeg'),
(3, 'Palm Roll', 1, 19, 2500, 5000, '', 'palm_roll.jpeg'),
(4, 'Pisang Coklat', 1, 19, 2500, 5000, '', 'pisang_coklat.jpeg'),
(5, 'Pizza Jumbo', 2, 19, 6500, 13000, '', 'pizza_jumbo.jpeg'),
(7, 'Pizza Super Jumbo', 2, 20, 8750, 17500, '', 'pizza_jumbo.jpeg'),
(8, 'Pizza Mini', 2, 0, 1500, 3000, '', 'pizza_mini.jpeg'),
(9, 'Roti Kasur Jumbo', 1, 20, 5500, 11000, '', 'roti_kasur_jumbo.jpeg'),
(10, 'Roti Mboi', 1, 20, 2500, 5000, '', 'roti_mboi.jpeg'),
(11, 'Roti Pandan', 1, 20, 2500, 5000, '', 'roti_pandan.jpeg'),
(12, 'Roti Sosis', 1, 20, 2500, 5000, '', 'roti_sosis.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `no_hp_user` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `alamat` longtext NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `verifikasi` varchar(10) NOT NULL DEFAULT 'Belum',
  `foto_profil` varchar(50) NOT NULL DEFAULT 'prof_default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_hp_user`, `password`, `alamat`, `ktp`, `verifikasi`, `foto_profil`) VALUES
(1, 'Inge Dien Safitri', '082236047539', 'admin111', '', '', 'Diterima', 'prof_default.png'),
(2, 'Allan', '081318140558', '123', 'Jalan Pakuniran, Dusun Pasar , RT 16 RW 04, Desa Bucor Kulon, Kecamatan Pakuniran', '1697309630_598c2315ae7c7ad26285.png', 'Diterima', 'prof_default.png'),
(3, 'Syifa', '081359316368', '123', 'Jalan Pakuniran, Dusun Pasar , RT 16 RW 04, Desa Bucor Kulon, Kecamatan Pakuniran', '1697708762_78ce1dc5980f3bf1bbb6.png', 'Belum', 'prof_default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_pesanan_id_pesanan_foreign` (`id_pesanan`),
  ADD KEY `detail_pesanan_id_produk_foreign` (`id_produk`),
  ADD KEY `detail_pesanan_id_user_foreign` (`id_user`);

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_produk` (`id_produk`);

--
-- Indexes for table `kelompok_produk`
--
ALTER TABLE `kelompok_produk`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `laporan_id_pesanan_foreign` (`id_pesanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pesanan_id_user_foreign` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_jenis_produk_foreign` (`jenis_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `no_hp_user` (`no_hp_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelompok_produk`
--
ALTER TABLE `kelompok_produk`
  MODIFY `id_kel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `fk_id_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_jenis_produk_foreign` FOREIGN KEY (`jenis_produk`) REFERENCES `kelompok_produk` (`id_kel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
