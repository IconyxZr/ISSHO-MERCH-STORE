-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 02:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isshomerch`
--

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
(10, 8, 'Vans old skool 02', 'vans-old-skool-pro-shoes-black-red-white-1_1490730508.jpg', '2020-05-12 04:08:38'),
(11, 8, 'Vans old skool 03', 'vans-1528119312.jpg', '2020-05-12 04:08:56'),
(12, 7, 'Nike Revolution 4 2', 'Nike-Revolution-4-Lateral-Side.jpg', '2020-05-12 04:16:07'),
(13, 7, 'Nike Revolution 4 3', 's-l16001__4_.jpg', '2020-05-12 04:16:47'),
(14, 6, 'Vans Classic Slip-on 02', 'vans-classic-slip-on-shoes-ages-4-12-big-boys-checkerboard-black-pewter-detail_1.jpg', '2020-05-12 04:30:13'),
(15, 6, 'Vans Classic Slip-on 03', 'VANS_CLASSIC_SLIP-ON_CHECK_VEYEBPJ_BLACK_GREY_1.jpg', '2020-05-12 04:30:38'),
(16, 5, 'Converse Chuck Taylor All Star Shoreline Slip On 02', 'OIP_(4).jpg', '2020-05-12 04:36:44'),
(17, 5, 'Converse Chuck Taylor All Star Shoreline Slip On 03', 'OIP_(5).jpg', '2020-05-12 04:36:56'),
(18, 3, 'Adidas samba 02', '81wMXWoEDbL.jpg', '2020-05-12 04:42:07'),
(19, 3, 'Adidas samba 03', '31863-3-4x.jpg', '2020-05-12 04:42:24'),
(20, 10, 'Bagian Belakang', 'Season_1_belakang.jpeg', '2020-11-30 13:40:30'),
(21, 9, 'Bagian Belakang', 'season_2_Belakang-01-9-20-fix1.jpg', '2020-11-30 13:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(4, 0, 4, 'John', 'bill@gmail.com', '03416971', 'Jl irak gang kadal', '11052020B9T7EUC3', '2020-05-11 00:00:00', 600000, 'Konfirmasi', 600000, '7667898', 'Johnny', '11.jpg', 1, '11-05-2020', 'BCA', '2020-05-11 04:54:41', '2020-05-11 09:10:24'),
(5, 0, 4, 'John sena', 'bill@gmail.com', '03416971', 'Jl irak gang kadal', '12052020CKWITNQX', '2020-05-12 00:00:00', 900000, 'Konfirmasi', 900000, '7667898', 'Johnny', '51.png', 1, '12-05-2020', 'BANK BRI', '2020-05-12 08:20:02', '2020-05-12 06:21:53'),
(6, 0, 4, 'John sena', 'bill@gmail.com', '03416971', 'Jl irak gang kadal', '120520204SPDJYL0', '2020-05-12 00:00:00', 1300000, 'Konfirmasi', 1300000, '7667898', 'Johnny', '12.jpg', 2, '12-05-2020', 'BCA', '2020-05-12 09:38:57', '2020-05-12 07:40:53'),
(7, 0, 5, 'abdulaha', 'abdulaha@gmail.com', '0876354718937', 'Ds. Batu Kec. Malang Kab. Nganjuk Blitar', '03112020LEBPU0Q1', '2020-11-03 00:00:00', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 11:22:48', '2020-11-03 10:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(2, 'season-1', 'SEASON-1', 1, '2020-11-19 14:50:41'),
(3, 'season-2', 'SEASON-2', 2, '2020-11-19 14:50:33'),
(4, 'season-3', 'SEASON-3', 3, '2020-11-19 14:50:25'),
(5, 'season-4', 'SEASON-4', 4, '2020-11-19 14:50:18'),
(6, 'season-5', 'SEASON-5', 5, '2020-11-19 14:51:54'),
(14, 'season-6', 'SEASON-6', 6, '2020-11-19 14:54:32');

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
  `keywords` text DEFAULT NULL,
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

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'ISSHO MERCH', 'STORE', 'ishhomerch@gmail.com', 'https://isshomerch.com', 'issho merch', 'issho merch', '+6281328128695', 'Perum DWiga Jl. Manunggal No.14 Mojolangu Sudimoro Kota Malang Jawa Timur 65142', 'https://facebook.com/', 'https://intagram.com/', 'issho merch', 'logo2_fix1.png', 'logo2_fix.png', '123456789', '2020-11-30 14:21:00');

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
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 0, 'Pending', 'John', 'john@gmail.com', '25d55ad283aa400af464c76d713c07ad', '03416971', 'Jl.Irak gang kadal', '2020-05-10 16:01:45', '2020-05-10 14:01:45'),
(2, 0, 'Pending', 'John', 'a@gmail.com', '25f9e794323b453885f5181f1b624d0b', '03416971', 'Jl Irak gang kadal', '2020-05-10 16:14:35', '2020-05-10 14:14:35'),
(3, 0, 'Pending', 'John', 'lemmy@gmail.com', '25f9e794323b453885f5181f1b624d0b', '03416971', 'jl Irak gang kadal', '2020-05-11 00:27:54', '2020-05-10 22:27:54'),
(4, 0, 'Pending', 'John sena', 'bill@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '03416971', 'Jl irak gang kadal', '2020-05-11 01:35:09', '2020-05-12 06:19:33'),
(5, 0, 'Pending', 'abdulaha', 'abdulaha@gmail.com', '202cb962ac59075b964b07152d234b70', '0876354718937', 'Ds. Batu Kec. Malang Kab. Nganjuk Blitar', '2020-11-03 10:18:35', '2020-11-03 09:18:35'),
(6, 0, 'Pending', 'reza', 'reza@gmail.com', 'bb98b1d0b523d5e783f931550d7702b6', '087666999696', 'Batu ', '2020-11-19 13:04:30', '2020-11-19 12:04:30'),
(7, 0, 'Pending', 'Gilang', 'gilang@gmail.com', '202cb962ac59075b964b07152d234b70', '089521683093', 'Madiun', '2020-12-01 13:03:01', '2020-12-01 12:03:01');

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
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(8, 8, 3, 'negro', 'Short T-shirt Negro', 'short-t-shirt-negro-negro', '<p>Negro T-shirt from ISSHO MERCH</p>\r\n', 'Negro', 120000, 13, 'Kaos21.png', 120, 'M,L,XL', 'Publish', '2020-05-08 10:32:01', '2020-12-01 12:17:21'),
(9, 8, 3, 'Army', 'Short T-shirt Team Army', 'short-t-shirt-team-army-army', '<p>Team Army T-shirt ISSHO MERCH</p>\r\n\r\n<p>Sepatu Adidas Gazelle berasal dari akhir 60-an, seorang ikon trainer Gazellle mencampurkan sport-meets-street-style menjadi kesatuan di koleksi sepatu Adidas. Bagian atas kulit, suede sintetis, nubuck atau Primeknit dikombinasikan dengan sol karet yang berbeda dan sockliner OrthoLite® yang lembut untuk kenyamanan dan daya tahan maksimal. Era lampau dan warna kontemporer menjadi pilihan gaya favorit untuk tampilan yang klasik sporty sepatu Adidas Anda.</p>\r\n\r\n<p><strong>SEPATU ADIDAS GAZELLE</strong></p>\r\n\r\n<p>Sepatu Adidas Gazelle telah ada di Adidas selama lima dekade dan terus bertambah. Dengan desain yang ramping dan fungsional, sepatu Adidas Gazelle telah menjadi pilihan sederhana yang sempurna untuk tampilan kasual harian. Dengan detail sepatu Adidas Gazelle menampilkan 3-Stripes bergerigi yang khasnya, overlay T-toe, patch tumit dan sol karet sederhana.</p>\r\n\r\n<p><strong>PERTEMUAN ANTARA GAYA DI JALANAN DAN GAYA SPORT</strong></p>\r\n\r\n<p>Sepatu Adidas Gazelle memulai debutnya sebagai sepatu latihan untuk sepak bola dalam ruangan, bola tangan dan permainan lainnya di mana kecepatan dan ketangkasan adalah kunci keberhasilan. Berbagai macam bagian atas sepatu memungkinkan Anda untuk memilih material favorit Anda, sedangkan cetakan Adidas Gazelle (kebanyakan dalam warna emas) memberi daya tarik tersendiri ketika berlatih. Sebagian besar model ditampilkan dengan sol karet putih untuk penggunaan semua medan, sementara beberapa dilengkapi dengan sol karet transparan yang khusus untuk pemakaian dalam ruangan.</p>\r\n\r\n<p><strong>THE GAZELLE - DARI WAKTU KE WAKTU</strong></p>\r\n\r\n<p>Selama beberapa dekade, sepatu Adidas Gazelle telah menjadi barang berharga untuk alas kaki di dalam dan di luar lapangan. Semenjak debutnya pada tahun 1960-an, design Adidas Gazelle hampir tidak berubah, membuat sepatu Adidas Gazelle langsung dikenali di antara berbagai macam sepatu. Bagian atas yang pas, lembut dan bantalan empuk dengan karet Cupole tingkat rendah menjamin kenyamanan di kaki Anda.</p>\r\n', 'Team Army', 130000, 12, 'Kaos31.png', 130, 'M,L,XL', 'Publish', '2020-05-08 10:33:16', '2020-12-01 12:16:31'),
(10, 8, 2, 'Blonde01', 'Short T-shirt Blonde', 'short-t-shirt-blonde-blonde01', '<p>Blonde T-Shirt from ISSHO MERCH</p>\r\n', 'Blonde', 120000, 12, 'Kaos41.png', 120, 'M,L,XL', 'Publish', '2020-05-08 10:34:06', '2020-12-01 12:17:07'),
(11, 8, 4, 'Tora', 'T-shirt Tora', 't-shirt-tora-tora', '<p>T-shirt Tora from ISSHO MERCH</p>', 'Tora', 12500, 11, 'Kaos11.png', 110, 'M,L,XL', 'Publish', '2020-12-01 12:30:46', '2020-12-01 12:16:46'),
(12, 8, 4, 'Solid', 'Hoddie Solid', 'hoddie-solid-solid', '<p>Hoddie Solid from ISSHO MERCH</p>', 'Hoddie', 250000, 20, 'Hoddie11.png', 150, 'M,L,XL', 'Publish', '2020-12-01 12:39:45', '2020-12-01 12:16:11');

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
(1, 'BCA SOMALIA', '2819032890312', 'Joni', NULL, '2020-11-30 14:15:11'),
(2, 'BANK BRI CABANG NIKARAGUA', '32893487237', 'Reza', NULL, '2020-11-30 14:14:55');

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
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 3, '11052020YO3HGYX0', 10, 700000, 1, 700000, '2020-05-11 00:00:00', '2020-05-10 22:45:52'),
(2, 0, 4, '11052020B9T7EUC3', 9, 600000, 1, 600000, '2020-05-11 00:00:00', '2020-05-11 02:54:41'),
(3, 0, 4, '12052020CKWITNQX', 3, 900000, 1, 900000, '2020-05-12 00:00:00', '2020-05-12 06:20:02'),
(4, 0, 4, '120520204SPDJYL0', 10, 700000, 1, 700000, '2020-05-12 00:00:00', '2020-05-12 07:38:58'),
(5, 0, 4, '120520204SPDJYL0', 9, 600000, 1, 600000, '2020-05-12 00:00:00', '2020-05-12 07:38:58');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `transaksi_penjualan` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok-NEW.jumlah
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(8, 'gilang', 'gilang@gmail.com', 'gilang', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2020-11-19 12:02:43'),
(9, 'brian', 'brian@gmail.com', 'brian anjay', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2020-11-19 12:27:18');

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`) USING BTREE;

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
