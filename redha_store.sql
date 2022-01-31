-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2022 at 04:08 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redha_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(1, 4, 'samsung s8 ok ', 'S8-plus.jpg', '2021-03-03 05:01:30'),
(5, 4, ' s10', 'S10.jpg', '2021-03-08 05:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `kurir` int(11) DEFAULT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `ekspedisi` varchar(11) DEFAULT NULL,
  `resi` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `alamat`, `id_user`, `kode_transaksi`, `tanggal_transaksi`, `kurir`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `ekspedisi`, `resi`, `tanggal_post`, `tanggal_update`) VALUES
(46, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '05062021MUXYFVP4', '2021-06-05 00:00:00', NULL, 717000, 'Konfirmasi', 717000, '668756', 'redha', 'Screenshot_from_2020-08-04_10-19-00.png', 3, '  05-06-2021', 'BTPN', '', NULL, '2021-06-05 09:32:00', '2021-06-14 01:51:27'),
(47, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '05062021YH2DWDQB', '2021-06-05 00:00:00', NULL, 192250, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '2021-06-05 09:32:57', '2021-06-14 01:51:29'),
(48, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '08062021EUB81JGP', '2021-06-08 00:00:00', NULL, 263500, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '2021-06-08 08:00:22', '2021-06-13 14:11:43'),
(49, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '08062021UXSNIZJC', '2021-06-08 00:00:00', NULL, 263500, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '2021-06-08 08:00:40', '2021-06-13 14:11:41'),
(50, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '08062021KF4JZDMM', '2021-06-08 00:00:00', NULL, 457000, 'Konfirmasi', 457000, '86789687', 'andi', 'Screenshot_from_2020-07-13_09-34-37.png', 3, ' 08-06-2021', 'bri', 'jnt', '89789178923', '2021-06-08 08:44:29', '2021-06-13 14:14:59'),
(51, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '13062021DBWYRKHZ', '2021-06-13 00:00:00', NULL, 251000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '2021-06-13 14:56:41', '2021-06-13 14:11:38'),
(52, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '13062021RN3IPVJD', '2021-06-13 00:00:00', NULL, 206000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '2021-06-13 14:58:39', '2021-06-13 14:11:36'),
(53, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '130620218LKJZSUN', '2021-06-13 00:00:00', 26000, 251000, 'Konfirmasi', 251000, '9798172', 'reza rahardian', 'o_1ap866g6h1n2t1u6j2fujvtujma.jpg', 3, ' 13-06-2021', 'syariah', '', NULL, '2021-06-13 15:15:30', '2021-06-13 14:11:34'),
(54, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '13062021TBODZ9E0', '2021-06-13 00:00:00', 5226000, 5428500, 'Konfirmasi', 5428500, '098912389721', 'rere', 'kaggle11.png', 3, ' 13-06-2021', 'bri', 'jne', '17238768912', '2021-06-13 15:18:44', '2021-06-13 13:57:24'),
(55, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '14062021CNYGRMFC', '2021-06-14 00:00:00', 26000, 206000, 'Konfirmasi', 206000, '979878', 'yoga', 'Screenshot_from_2020-07-13_09-34-371.png', 3, ' 14-06-2021', 'btpn', 'ninja', '789698612', '2021-06-14 04:25:44', '2021-06-14 02:26:37'),
(56, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '14062021JDF2PIBE', '2021-06-14 00:00:00', 52000, 457000, 'Konfirmasi', 457000, 'asdqa', 'asdas', 'Screenshot_from_2020-07-18_16-14-54.png', 3, ' 14-06-2021', 'asdf', 'pos', 'jkjauyt87', '2021-06-14 04:38:02', '2021-06-14 02:39:29'),
(57, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '14062021LBENAC4L', '2021-06-14 00:00:00', 26000, 251000, 'Konfirmasi', 251000, '1ae', 'sdaf', 'Screenshot_from_2020-08-04_13-11-27.png', 3, ' 14-06-2021', 'sdf23', 'si cepat', '8789asjasdf', '2021-06-14 04:41:12', '2021-06-14 02:41:55'),
(58, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '19062021IBQ3GVN7', '2021-06-19 00:00:00', 52000, 637000, 'Konfirmasi', 637000, '12684879618274', 'gundul', 'Screenshot_from_2020-07-13_09-34-372.png', 3, ' 19-06-2021', 'BRI', 'JNE', '6745348905', '2021-06-19 08:30:25', '2021-06-19 06:36:09'),
(59, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '19062021TMRLD30V', '2021-06-19 00:00:00', 52000, 637000, 'Konfirmasi', 637000, '6874653657', 'gundul', 'Screenshot_from_2020-07-13_09-34-373.png', 3, ' 19-06-2021', 'BRI', 'JNE', '58764535697', '2021-06-19 08:59:45', '2021-06-19 07:05:00'),
(60, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '19062021SBA03UAX', '2021-06-19 00:00:00', 26000, 206000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-19 09:15:25', '2021-06-19 07:15:25'),
(61, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '19062021YGGQKSCO', '2021-06-19 00:00:00', 26000, 251000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-19 09:19:17', '2021-06-19 07:19:17'),
(62, 6, 'gundul', 'gundul@gmail.com', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', 0, '1906202198OWVKDS', '2021-06-19 00:00:00', 26000, 526000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-19 09:21:40', '2021-06-19 07:21:40'),
(63, 4, 'Sukmono Putra', 'sukmono@gmail.com', '0811255282', 'Ngemplak kidul', 'Margoyoso', 'Pati', '59154', 'ngemplak kidul, rumah warna kuning', 0, '19062021B06OQLU2', '2021-06-19 00:00:00', 52000, 802000, 'Konfirmasi', 802000, '868748768956', 'Sukmono', 'Screenshot_from_2020-07-13_09-34-374.png', 3, ' 19-06-2021', 'BTPN', 'jne', '757645879678', '2021-06-19 09:30:39', '2021-06-19 07:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `gambar`, `tanggal_update`) VALUES
(8, 'baju-wanita', 'Baju Wanita', 1, 'kategori3.jpg', '2021-04-27 02:08:32'),
(9, 'baju-pria', 'Baju Pria', 2, 'kategori2.jpg', '2021-04-27 02:08:22'),
(10, 'baju-anak-laki-laki', 'Baju Anak Laki Laki', 3, 'kategori.jpg', '2021-04-27 02:07:29'),
(11, 'baju-anak-perampuan', 'Baju Anak Perampuan', 4, 'kategori1.jpg', '2021-04-27 02:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keyword`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Redha Store', 'Baju Baru Alhamdulillah', 'redhastore@gmail.com', 'https://redhastore.com', 'redha store', 'redha store ', '085325224829', 'Tanjungrejo, Margoyoso, Pati ', 'http://facebook.com/redha%store', 'http://instagram.com/redha.store', 'redha store', 'logo_small.png', 'icon.png', 'BRI,BNI,BCA', '2021-05-16 12:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(64) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(4, 0, 'Pending', 'Sukmono Putra', 'sukmono@gmail.com', '$2y$10$cDSvuNJPjvbxMowfNNoJ9O9ulPgVBsfDmI/Mx3/Y5cb8PCWfa4Pcy', '0811255282', NULL, NULL, NULL, NULL, 'ngemplak kidul', '2021-03-09 10:48:20', '2021-03-11 03:27:08'),
(5, 0, 'Pending', 'Muhammad Muzni', 'muzna@gmail.com', '$2y$10$cDSvuNJPjvbxMowfNNoJ9O9ulPgVBsfDmI/Mx3/Y5cb8PCWfa4Pcy', '08122345566', NULL, NULL, NULL, NULL, 'kajen margoyoso pati', '2021-03-09 13:19:40', '2021-03-09 12:19:40'),
(6, 0, 'Pending', 'gundul', 'gundul@gmail.com', '$2y$10$Fb4d4pKdf1jE49urLPR4nuQQTIxLGSPl1jKvxjbh9f3Mo45nBYfFm', '7892637r6', 'pleburan', 'semarang', 'semarang', '897214', 'pleburan Rt10/Rw01, kecamatan semarang, kota semarang, pos 897214', '2021-04-26 09:35:57', '2021-05-25 03:01:31'),
(8, 0, 'Pending', 'redha', 'redha@gmail.com', '$2y$10$Uqw8x/EgXgQdtR/OM/HXt.wUkme7RcBohNKIQa03og9mc3IQtmzta', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-27 05:10:50', '2021-04-27 03:10:50'),
(9, 0, 'Pending', 'user', 'user@gmail.com', '$2y$10$YfgLzdZtmGnNt.bkxUvfaejTVIAqzL.MttwnJG/56UKU5BpRdLH9i', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-13 16:19:42', '2021-06-13 14:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keyword` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_diskon` bigint(20) DEFAULT NULL,
  `tanggal_mulai_diskon` date DEFAULT NULL,
  `tanggal_selesai_diskon` date DEFAULT NULL,
  `stok_minimal` int(11) DEFAULT NULL,
  `id_ukuran1` int(11) DEFAULT NULL,
  `stok1` int(11) DEFAULT NULL,
  `id_ukuran2` int(11) DEFAULT NULL,
  `stok2` int(11) DEFAULT NULL,
  `id_ukuran3` int(11) DEFAULT NULL,
  `stok3` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` varchar(11) DEFAULT NULL,
  `ukurank1` int(11) DEFAULT NULL,
  `ukurank2` int(11) DEFAULT NULL,
  `ukurank3` int(11) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keyword`, `harga`, `harga_beli`, `harga_diskon`, `tanggal_mulai_diskon`, `tanggal_selesai_diskon`, `stok_minimal`, `id_ukuran1`, `stok1`, `id_ukuran2`, `stok2`, `id_ukuran3`, `stok3`, `stok`, `gambar`, `berat`, `ukurank1`, `ukurank2`, `ukurank3`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(16, 12, 8, ' jeans_pubb', 'Jeans Pubb', 'jeans-pubb-jeans_pubb', '<p>baju bagus</p>\r\n', 'jeans pubb                        ', 250000, NULL, NULL, NULL, NULL, NULL, 3, 3, 4, 2, 5, 5, 10, '1.png', '1', 10, 10, 10, 'Publish', '2021-04-06 04:09:12', '2021-06-14 02:22:58'),
(17, 12, 8, 'gms', 'Gamis muslimah', 'gamis-muslimah-gms', '<p>gamis oke</p>\r\n', 'gamis wanita                                     ', 20000, NULL, NULL, NULL, NULL, NULL, 3, 2, 4, 2, 5, 2, 6, 'p-2.png', '1', 10, 10, 10, 'Publish', '2021-04-24 03:27:20', '2021-06-14 02:23:01'),
(18, 9, 8, 'oke', 'oke', 'oke-oke', '&lt;p&gt;oke&lt;/p&gt;\r\n', 'oke', 100000, NULL, NULL, NULL, NULL, NULL, 5, 20, 6, 20, 7, 20, 60, 'd-2@2x.png', '0.5', 10, 10, 10, 'Publish', '2021-04-24 03:41:50', '2021-06-14 02:23:08'),
(21, 12, 11, 'gamis anak ', 'gamis anak wanita pink', 'gamis-anak-wanita-pink-gamis-anak', '<p>baju anak cewek, bahan halus cocok untuk anak anak</p>\r\n', 'baju anak cewe', 75000, NULL, NULL, NULL, NULL, NULL, 2, 10, 3, 10, 4, 15, 35, '1_2.jpg', '0.5', 10, 10, 10, 'Publish', '2021-04-27 03:46:40', '2021-06-05 07:26:22'),
(22, 12, 10, 'gamis anak merah', 'Gamis anak laki laki warna merah', 'gamis-anak-laki-laki-warna-merah-gamis-anak-merah', '<p><strong>Baju Koko Anak Muslim Terbaru Terbuat Dengan Kain Katun Premium Grade A,Serat Halus Adem Dan Nyaman Di Pakai Cocok Buat Melakukan Ibadah. Dengan Desain Yang Khas Dari Toko Kami. Tersedia 6 Varian Warna Yang Best Seller . Deskripsi Produk: - Bahan Kain Katun Halus (Premium Quality) - Lembut, adem dan nyaman di gunakan - Kancing Hidup - Ada saku dalam (di bagian samping baju atas) - Jahitan Rapi (Kualitas Pasti OKE) - DIJAMIN BAGUS, ANAK PASTI SUKA - Reseller Welcome, Stock Banyak Sekali Ukuran : S (LD 80cm - PJ 60cm) usia 1-3tahun M (LD 82cm - PJ 62cm) usia 4-6tahun L (LD 84cm - PJ 64cm) usia 7-10tahun XL (LD 86cm - PJ 66cm) usia 11-13tahun</strong><br />\r\n&nbsp;</p>\r\n', 'gamis anak laki laki', 150000, 1, 1, '2021-06-09', '2021-06-16', 1, 2, 10, 3, 10, 4, 10, 30, '1.jpg', '0.5', 10, 10, 10, 'Publish', '2021-04-27 04:10:52', '2021-06-19 06:16:32'),
(23, 12, 10, 'kemeja anak laki ', 'Kemeja anak warna merah', 'kemeja-anak-warna-merah-kemeja-anak-laki', '<p><strong>Baju Koko Anak Muslim Terbaru Terbuat Dengan Kain Katun Premium Grade A,Serat Halus Adem Dan Nyaman Di Pakai Cocok Buat Melakukan Ibadah. Dengan Desain Yang Khas Dari Toko Kami. Tersedia 6 Varian Warna Yang Best Seller . Deskripsi Produk: - Bahan Kain Katun Halus (Premium Quality) - Lembut, adem dan nyaman di gunakan - Kancing Hidup - Ada saku dalam (di bagian samping baju atas) - Jahitan Rapi (Kualitas Pasti OKE) - DIJAMIN BAGUS, ANAK PASTI SUKA - Reseller Welcome, Stock Banyak Sekali Ukuran : S (LD 80cm - PJ 60cm) usia 1-3tahun M (LD 82cm - PJ 62cm) usia 4-6tahun L (LD 84cm - PJ 64cm) usia 7-10tahun XL (LD 86cm - PJ 66cm) usia 11-13tahun</strong></p>\r\n', ' kemeja anak', 100000, 1, 1, '2021-06-22', '2021-06-30', 1, 2, 10, 3, 10, 4, 10, 30, '2.jpg', '0.5', 10, 10, 10, 'Publish', '2021-04-27 04:12:48', '2021-06-19 06:16:14'),
(24, 12, 9, 'koko dewasa', 'Koko Pria hitam', 'koko-pria-hitam-koko-dewasa', '<p><strong>BAJU KOKO BATIK PRIA. Baju koko batik pria terbuat dari bahan yang super nyaman, 100% katun. Jadi pasti adem dengan ketebalan sedang, Jadi membuat si pemakai merasa nyaman untuk di pakai seharian. Di zaman sekarang ini Batik menjadi salah satu pakaianyang gk harus di pakai di acara formal saja, Bisa buat santai, ngedate, kencan, ngantor, jalan-jalan, dan kegitan yang lainya.Mari berbudaya dengan pakai Batik asli warisan budaya INDONESIA. Di toko kami tersedia berbagai macam model,motif, corak dengan paduan warna yang kekinian. Tersedia ukuran M sampai XL. Silahkan bisa cek langsung produk kami yang lainya. Bahan katun halus adem nyaman di pakai. Ukuran : M L XL M. LD 52(104) L. LD 54(108) XL. LD 56(112)</strong><br />\r\n&nbsp;</p>\r\n', 'koko dewasa', 20000, 2, 2, '2021-07-15', '2021-06-25', 2, 3, 10, 4, 10, 5, 10, 30, '11.jpg', '1', 10, 10, 10, 'Publish', '2021-04-27 04:14:30', '2021-06-19 06:15:16'),
(25, 12, 9, ' koko dewasa tosca', 'Koko pria tosca', 'koko-pria-tosca-koko-dewasa-tosca', '<p><strong>BAJU KOKO BATIK PRIA. Baju koko batik pria terbuat dari bahan yang super nyaman, 100% katun. Jadi pasti adem dengan ketebalan sedang, Jadi membuat si pemakai merasa nyaman untuk di pakai seharian. Di zaman sekarang ini Batik menjadi salah satu pakaianyang gk harus di pakai di acara formal saja, Bisa buat santai, ngedate, kencan, ngantor, jalan-jalan, dan kegitan yang lainya.Mari berbudaya dengan pakai Batik asli warisan budaya INDONESIA. Di toko kami tersedia berbagai macam model,motif, corak dengan paduan warna yang kekinian. Tersedia ukuran M sampai XL. Silahkan bisa cek langsung produk kami yang lainya. Bahan katun halus adem nyaman di pakai. Ukuran : M L XL M. LD 52(104) L. LD 54(108) XL. LD 56(112)</strong><br />\r\n&nbsp;</p>\r\n', ' koko de', 150000, 1, 1, '2021-06-30', '2021-06-26', 2, 3, 10, 4, 10, 5, 10, 30, '21.jpg', '1', 10, 10, 10, 'Publish', '2021-04-27 04:16:12', '2021-06-19 06:15:02'),
(26, 12, 9, 'kemeja pria abu', 'Kemeja pria abu abu', 'kemeja-pria-abu-abu-kemeja-pria-abu', '<p><strong>BAJU KOKO BATIK PRIA. Baju koko batik pria terbuat dari bahan yang super nyaman, 100% katun. Jadi pasti adem dengan ketebalan sedang, Jadi membuat si pemakai merasa nyaman untuk di pakai seharian. Di zaman sekarang ini Batik menjadi salah satu pakaianyang gk harus di pakai di acara formal saja, Bisa buat santai, ngedate, kencan, ngantor, jalan-jalan, dan kegitan yang lainya.Mari berbudaya dengan pakai Batik asli warisan budaya INDONESIA. Di toko kami tersedia berbagai macam model,motif, corak dengan paduan warna yang kekinian. Tersedia ukuran M sampai XL. Silahkan bisa cek langsung produk kami yang lainya. Bahan katun halus adem nyaman di pakai. Ukuran : M L XL M. LD 52(104) L. LD 54(108) XL. LD 56(112)</strong><br />\r\n&nbsp;</p>\r\n', 'kemeja pria', 125000, 1, 1, '2021-06-19', '2021-07-01', 1, 3, 10, 4, 10, 5, 10, 30, '3.jpg', '1', 10, 10, 10, 'Publish', '2021-04-27 04:17:29', '2021-06-19 06:14:21'),
(27, 12, 9, 'kemeja pria merah ma', 'kemeja pria warna merah maroon', 'kemeja-pria-warna-merah-maroon-kemeja-pria-merah-ma', '<p><strong>BAJU KOKO BATIK PRIA. Baju koko batik pria terbuat dari bahan yang super nyaman, 100% katun. Jadi pasti adem dengan ketebalan sedang, Jadi membuat si pemakai merasa nyaman untuk di pakai seharian. Di zaman sekarang ini Batik menjadi salah satu pakaianyang gk harus di pakai di acara formal saja, Bisa buat santai, ngedate, kencan, ngantor, jalan-jalan, dan kegitan yang lainya.Mari berbudaya dengan pakai Batik asli warisan budaya INDONESIA. Di toko kami tersedia berbagai macam model,motif, corak dengan paduan warna yang kekinian. Tersedia ukuran M sampai XL. Silahkan bisa cek langsung produk kami yang lainya. Bahan katun halus adem nyaman di pakai. Ukuran : M L XL M. LD 52(104) L. LD 54(108) XL. LD 56(112)</strong><br />\r\n&nbsp;</p>\r\n', 'kemeja pria', 100000, 3, 3, '2021-06-14', '2021-06-21', 3, 3, 10, 4, 10, 5, 10, 30, '4.jpg', '1', 10, 10, 10, 'Publish', '2021-04-27 04:19:06', '2021-06-19 06:14:35'),
(28, 12, 9, 'kemeja pria pink', 'Kemeja pria pink', 'kemeja-pria-pink-kemeja-pria-pink', '<p><strong>BAJU KOKO BATIK PRIA. Baju koko batik pria terbuat dari bahan yang super nyaman, 100% katun. Jadi pasti adem dengan ketebalan sedang, Jadi membuat si pemakai merasa nyaman untuk di pakai seharian. Di zaman sekarang ini Batik menjadi salah satu pakaianyang gk harus di pakai di acara formal saja, Bisa buat santai, ngedate, kencan, ngantor, jalan-jalan, dan kegitan yang lainya.Mari berbudaya dengan pakai Batik asli warisan budaya INDONESIA. Di toko kami tersedia berbagai macam model,motif, corak dengan paduan warna yang kekinian. Tersedia ukuran M sampai XL. Silahkan bisa cek langsung produk kami yang lainya. Bahan katun halus adem nyaman di pakai. Ukuran : M L XL M. LD 52(104) L. LD 54(108) XL. LD 56(112)</strong></p>\r\n', 'kemeja pria', 125000, 90000, 20000, '2021-06-01', '2021-06-02', 2, 3, 10, 4, 10, 5, 10, 30, '5.jpg', '1', 10, 10, 10, 'Publish', '2021-04-27 04:20:08', '2021-06-19 06:14:04'),
(29, 12, 9, 'kemeja pria putih', 'Kemeja putih', 'kemeja-putih-kemeja-pria-putih', '<p><strong>BAJU KOKO BATIK PRIA. Baju koko batik pria terbuat dari bahan yang super nyaman, 100% katun. Jadi pasti adem dengan ketebalan sedang, Jadi membuat si pemakai merasa nyaman untuk di pakai seharian. Di zaman sekarang ini Batik menjadi salah satu pakaianyang gk harus di pakai di acara formal saja, Bisa buat santai, ngedate, kencan, ngantor, jalan-jalan, dan kegitan yang lainya.Mari berbudaya dengan pakai Batik asli warisan budaya INDONESIA. Di toko kami tersedia berbagai macam model,motif, corak dengan paduan warna yang kekinian. Tersedia ukuran M sampai XL. Silahkan bisa cek langsung produk kami yang lainya. Bahan katun halus adem nyaman di pakai. Ukuran : M L XL M. LD 52(104) L. LD 54(108) XL. LD 56(112)</strong></p>\r\n', 'kemeja pria', 200000, 1, 1, '2021-06-22', '2021-06-15', 2, 3, 10, 4, 10, 5, 10, 30, '6_1.jpeg', '1', 10, 10, 10, 'Publish', '2021-04-27 04:22:24', '2021-06-19 06:13:52'),
(30, 12, 9, 'koko kurta', 'koko kurta pria navi', 'koko-kurta-pria-navi-koko-kurta', '<p><strong>BAJU KOKO BATIK PRIA. Baju koko batik pria terbuat dari bahan yang super nyaman, 100% katun. Jadi pasti adem dengan ketebalan sedang, Jadi membuat si pemakai merasa nyaman untuk di pakai seharian. Di zaman sekarang ini Batik menjadi salah satu pakaianyang gk harus di pakai di acara formal saja, Bisa buat santai, ngedate, kencan, ngantor, jalan-jalan, dan kegitan yang lainya.Mari berbudaya dengan pakai Batik asli warisan budaya INDONESIA. Di toko kami tersedia berbagai macam model,motif, corak dengan paduan warna yang kekinian. Tersedia ukuran M sampai XL. Silahkan bisa cek langsung produk kami yang lainya. Bahan katun halus adem nyaman di pakai. Ukuran : M L XL M. LD 52(104) L. LD 54(108) XL. LD 56(112)</strong></p>\r\n', 'koko kurta', 250000, 1, 1, '2021-06-22', '2021-06-27', 2, 3, 10, 4, 10, 5, 10, 30, '7.jpeg', '1', 10, 10, 10, 'Publish', '2021-04-27 04:23:27', '2021-06-19 06:13:14'),
(31, 12, 8, 'gamis wanita', 'Gamis Wanita Merah', 'gamis-wanita-merah-gamis-wanita', '<ul>\r\n	<li>Bahan Toyobo Super, Terdapat Resleting Di Bagian Dada (Cocok Untuk Busui)</li>\r\n	<li>BELUM TERMASUK JILBAB, HANYA GAMISNYA SAJA</li>\r\n	<li>Terdapat Ikat Pinggang Di Belakang</li>\r\n	<li>Ukuran S Ld 92cm dan pb 135cm</li>\r\n	<li>Ukuran M ld 94-96cm pb 135cm</li>\r\n	<li>Ukuran Allsize (LD 105cm, PB 135cm, Lebar Rok 2.7M)</li>\r\n	<li>Bagian Tangan Renda Kancing</li>\r\n	<li>Bahan Sangat Nyaman Saat Digunakan, Kualitas Warna Tidak Mudah Luntur Dan Kusut</li>\r\n	<li>Yuk Diorder Sebelum Kehabisan Stok</li>\r\n</ul>\r\n', 'gamis wanita', 250000, 1, 1, '2021-06-30', '2021-07-05', 2, 3, 10, 4, 10, 5, 10, 30, '1_3.jpg', '0.5', 10, 10, 10, 'Publish', '2021-05-16 14:40:44', '2021-06-19 06:10:03'),
(32, 12, 8, ' gamis wanita coklat', 'Baju Gamis Wanita Coklat', 'baju-gamis-wanita-coklat-gamis-wanita-coklat', '<ul>\r\n	<li>Bahan Toyobo Super, Terdapat Resleting Di Bagian Dada (Cocok Untuk Busui)</li>\r\n	<li>BELUM TERMASUK JILBAB, HANYA GAMISNYA SAJA</li>\r\n	<li>Terdapat Ikat Pinggang Di Belakang</li>\r\n	<li>Ukuran S Ld 92cm dan pb 135cm</li>\r\n	<li>Ukuran M ld 94-96cm pb 135cm</li>\r\n	<li>Ukuran Allsize (LD 105cm, PB 135cm, Lebar Rok 2.7M)</li>\r\n	<li>Bagian Tangan Renda Kancing</li>\r\n	<li>Bahan Sangat Nyaman Saat Digunakan, Kualitas Warna Tidak Mudah Luntur Dan Kusut</li>\r\n	<li>Yuk Diorder Sebelum Kehabisan Stok</li>\r\n</ul>\r\n', 'gamis wanita coklat', 200000, 150000, 50000, '2021-06-15', '2021-06-29', 2, 3, 10, 4, 10, 5, 10, 30, '1_21.jpg', '0.7', 10, 10, 10, 'Publish', '2021-05-16 14:46:44', '2021-06-19 06:09:47'),
(33, 12, 8, ' gamis wanita green ', 'Baju Gamis Wanita Green Frest', 'baju-gamis-wanita-green-frest-gamis-wanita-green', '<ul>\r\n	<li>Bahan Toyobo Super, Terdapat Resleting Di Bagian Dada (Cocok Untuk Busui)</li>\r\n	<li>BELUM TERMASUK JILBAB, HANYA GAMISNYA SAJA</li>\r\n	<li>Terdapat Ikat Pinggang Di Belakang</li>\r\n	<li>Ukuran S Ld 92cm dan pb 135cm</li>\r\n	<li>Ukuran M ld 94-96cm pb 135cm</li>\r\n	<li>Ukuran Allsize (LD 105cm, PB 135cm, Lebar Rok 2.7M)</li>\r\n	<li>Bagian Tangan Renda Kancing</li>\r\n	<li>Bahan Sangat Nyaman Saat Digunakan, Kualitas Warna Tidak Mudah Luntur Dan Kusut</li>\r\n	<li>Yuk Diorder Sebelum Kehabisan Stok</li>\r\n</ul>\r\n', 'gamis wanita', 250000, 200000, 50000, '2021-07-01', '2021-07-09', 2, 3, 10, 4, 10, 5, 10, 30, '13.jpg', '0.4', 10, 10, 10, 'Publish', '2021-05-16 14:48:37', '2021-06-19 06:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BANK BRI', '427428578', ' Muh Arip', NULL, '2021-03-11 04:09:28'),
(2, ' BANK BRI SYARIAH', '22774299', ' Ekhwan Juvana', NULL, '2021-03-11 04:10:12'),
(3, 'BANK BRI SYARIAH', '0072351678712', 'Al Fath ', NULL, '2021-04-27 02:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `id_ukuran`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(79, 0, 6, '05062021MUXYFVP4', 32, 3, 200000, 1, 200000, '2021-06-05 00:00:00', '2021-06-18 09:04:31'),
(80, 0, 6, '05062021MUXYFVP4', 33, 5, 250000, 1, 250000, '2021-06-05 00:00:00', '2021-06-05 07:32:00'),
(81, 0, 6, '05062021MUXYFVP4', 31, 4, 250000, 1, 250000, '2021-06-05 00:00:00', '2021-06-05 07:32:00'),
(82, 0, 6, '05062021YH2DWDQB', 21, 2, 75000, 1, 75000, '2021-06-05 00:00:00', '2021-06-05 07:32:57'),
(83, 0, 6, '05062021YH2DWDQB', 23, 2, 100000, 1, 100000, '2021-06-05 00:00:00', '2021-06-05 07:32:57'),
(84, 0, 6, '08062021EUB81JGP', 31, 3, 250000, 1, 250000, '2021-06-08 00:00:00', '2021-06-08 06:00:22'),
(85, 0, 6, '08062021UXSNIZJC', 33, 3, 250000, 1, 250000, '2021-06-08 00:00:00', '2021-06-08 06:00:40'),
(86, 0, 6, '08062021KF4JZDMM', 33, 3, 250000, 1, 250000, '2021-06-08 00:00:00', '2021-06-08 06:44:29'),
(87, 0, 6, '08062021KF4JZDMM', 32, 4, 200000, 1, 200000, '2021-06-08 00:00:00', '2021-06-08 06:44:29'),
(88, 0, 6, '13062021DBWYRKHZ', 33, 3, 250000, 1, 250000, '2021-06-13 00:00:00', '2021-06-13 12:56:41'),
(89, 0, 6, '13062021RN3IPVJD', 32, 3, 200000, 1, 200000, '2021-06-13 00:00:00', '2021-06-13 12:58:39'),
(90, 0, 6, '130620218LKJZSUN', 30, 3, 250000, 1, 250000, '2021-06-13 00:00:00', '2021-06-13 13:15:30'),
(91, 0, 6, '13062021TBODZ9E0', 27, 3, 100000, 1, 100000, '2021-06-13 00:00:00', '2021-06-13 13:18:44'),
(92, 0, 6, '13062021TBODZ9E0', 28, 3, 125000, 1, 125000, '2021-06-13 00:00:00', '2021-06-13 13:18:44'),
(93, 0, 6, '14062021CNYGRMFC', 32, 3, 200000, 1, 200000, '2021-06-14 00:00:00', '2021-06-14 02:25:44'),
(94, 0, 6, '14062021JDF2PIBE', 32, 3, 200000, 1, 200000, '2021-06-14 00:00:00', '2021-06-14 02:38:02'),
(95, 0, 6, '14062021JDF2PIBE', 31, 3, 250000, 1, 250000, '2021-06-14 00:00:00', '2021-06-14 02:38:02'),
(96, 0, 6, '14062021LBENAC4L', 30, 3, 250000, 1, 250000, '2021-06-14 00:00:00', '2021-06-14 02:41:12'),
(97, 0, 6, '19062021IBQ3GVN7', 33, 3, 250000, 1, 250000, '2021-06-19 00:00:00', '2021-06-19 06:30:25'),
(98, 0, 6, '19062021IBQ3GVN7', 32, 5, 200000, 2, 400000, '2021-06-19 00:00:00', '2021-06-19 06:30:25'),
(99, 0, 6, '19062021TMRLD30V', 33, 4, 250000, 1, 250000, '2021-06-19 00:00:00', '2021-06-19 06:59:45'),
(100, 0, 6, '19062021TMRLD30V', 32, 5, 200000, 2, 400000, '2021-06-19 00:00:00', '2021-06-19 06:59:45'),
(101, 0, 6, '19062021SBA03UAX', 32, 3, 200000, 1, 200000, '2021-06-19 00:00:00', '2021-06-19 07:15:25'),
(102, 0, 6, '19062021YGGQKSCO', 33, 3, 250000, 1, 250000, '2021-06-19 00:00:00', '2021-06-19 07:19:17'),
(103, 0, 6, '1906202198OWVKDS', 33, 3, 250000, 2, 500000, '2021-06-19 00:00:00', '2021-06-19 07:21:40'),
(104, 0, 4, '19062021B06OQLU2', 33, 4, 250000, 2, 500000, '2021-06-19 00:00:00', '2021-06-19 07:30:39'),
(105, 0, 4, '19062021B06OQLU2', 30, 5, 250000, 1, 250000, '2021-06-19 00:00:00', '2021-06-19 07:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `slug_ukuran` varchar(128) NOT NULL,
  `nama_ukuran` varchar(128) NOT NULL,
  `urutan` int(2) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `slug_ukuran`, `nama_ukuran`, `urutan`, `tanggal_update`) VALUES
(2, 's', 'S', 1, '2021-04-24 05:46:26'),
(3, 'm', 'M', 2, '2021-04-24 05:46:34'),
(4, 'l', 'L', 3, '2021-04-24 05:46:46'),
(5, 'xl', 'XL', 4, '2021-04-24 05:46:57'),
(6, 'xxl', 'XXL', 5, '0000-00-00 00:00:00'),
(7, 'xxxl', 'XXXL', 6, '2021-04-24 05:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `gambar`, `akses_level`, `tanggal_update`) VALUES
(2, 'Ekhwan Juvana', 'isaylees@gmail.com', ' ekhwan ', '$2y$10$IKV14.6reJ5J0/5F/6bTgeDoBED6kUXkQRR89sbCJdvomlwPnQFdq', NULL, 'Admin', '2021-03-03 00:32:55'),
(9, 'Muh Arip Islahuddin', 'islahekka@gmail.com', 'Aripee ', '$2y$10$GjpoytvvOSZRyHNAdXmXN.RXH0Tnj1J04.aJnlPl1gnS5fTN3oaIm', 'p-18.png', 'Admin', '2021-04-24 05:31:03'),
(12, 'redha13', 'redha@mail.com', 'redha', '$2y$10$tJfaxO8kGCfvFfjvyT8s8.kXeKiEvQTXiwHbVFpCsmj1wIr9gWlZO', '7.jpeg', 'Admin', '2021-04-27 02:36:30'),
(13, ' yogahh', 'yoga@mail.com', 'yogahh ', '$2y$10$A7c6jSB8JRZyhNN3R3lADeMbgc0mw5cCNWdheqGWH90Zc1/Fbiatu', NULL, 'Admin', '2021-04-24 04:13:35'),
(14, 'irawansyah', 'irawan@gmail.com', 'irawan ', '$2y$10$mw1T0mvEBY8E5t8Wcaf0IuE8wVcTLNIFVqOKPgWQRjNbojJyVZwIu', NULL, 'Admin', '2021-04-24 04:15:27'),
(15, 'admin', 'admin@gmail.com', 'admin', '$2y$10$x04luDjMuosTbLpFdDevDeIu7hGfGsELEqkQ0EbrtaLnSk2mftZf2', NULL, 'Admin', '2021-06-13 14:18:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
