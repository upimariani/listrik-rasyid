-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 09:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listrik-rasyid`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pelanggan_send` text NOT NULL DEFAULT '0',
  `admin_send` text NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_pelanggan`, `id_user`, `time`, `pelanggan_send`, `admin_send`, `status`) VALUES
(1, 1, 1, '2024-11-05 04:10:12', 'haloo', '0', 1),
(2, 1, 1, '2024-11-05 04:20:59', '0', 'halo arif, ada yg bisa dibantu?', 1),
(3, 1, 1, '2024-11-05 04:21:30', '0', 'saya admin listrik rasyid syidiq', 1),
(4, 1, 1, '2024-11-05 04:22:06', '0', 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tran`
--

CREATE TABLE `detail_tran` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tran`
--

INSERT INTO `detail_tran` (`id_detail`, `id_transaksi`, `id_produk`, `qty`) VALUES
(1, 1, 3, 1),
(2, 1, 4, 1),
(3, 2, 3, 1),
(4, 2, 4, 1),
(5, 3, 1, 3),
(6, 3, 2, 1),
(7, 3, 3, 1),
(8, 3, 4, 1),
(9, 4, 3, 10),
(10, 5, 3, 6),
(11, 6, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_diskon` varchar(125) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_diskon`, `diskon`) VALUES
(1, 1, 'Sale!', 5),
(2, 2, 'Sale Of Day', 6);

-- --------------------------------------------------------

--
-- Table structure for table `kupon`
--

CREATE TABLE `kupon` (
  `id_kupon` int(11) NOT NULL,
  `nama_kupon` varchar(125) NOT NULL,
  `deskripsi_kupon` varchar(125) NOT NULL,
  `potongan_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kupon`
--

INSERT INTO `kupon` (`id_kupon`, `nama_kupon`, `deskripsi_kupon`, `potongan_harga`) VALUES
(1, 'Cuppon Gajian!', 'Kupon Gajian!', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(125) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `username`, `password`) VALUES
(1, 'Arif S', 'Kuningan, Jawa Barat', '089987564732', 'arif', 'arif');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_transaksi`, `review`, `rating`, `time`) VALUES
(1, 5, 'bagus', 4, '2024-11-05 05:52:28'),
(2, 3, 'bagus banget', 4, '2024-11-05 06:09:47'),
(3, 6, 'barang real banget', 5, '2024-11-05 08:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori_produk` varchar(125) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `keterangan`, `harga`, `kategori_produk`, `stok`, `foto`) VALUES
(1, 'Produk A', 'Deskripsi Produk A ...', 'pcs', 10000, 'Colokan', 4995, 'ab.jpeg'),
(2, 'Produk B', 'Deskripsi Produk B', 'pcs', 10000, 'Colokan', 992, 'cd.jpeg'),
(3, 'Produk C', 'Deskripsi Produk C ...', 'pcs', 12000, 'Colokan', 73, 'ef.jpeg'),
(4, 'Produk D', 'Deskripsi Produk E', 'pcs', 10000, 'Colokan', 15, 'gh.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kupon` int(11) NOT NULL,
  `tgl_transaksi` varchar(20) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `stat_transaksi` int(11) NOT NULL,
  `bukti_payment` text NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `metode_pengiriman` varchar(50) NOT NULL,
  `alamat_pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_kupon`, `tgl_transaksi`, `total_transaksi`, `total_pembayaran`, `ongkir`, `stat_transaksi`, `bukti_payment`, `metode_pembayaran`, `metode_pengiriman`, `alamat_pengiriman`) VALUES
(1, 1, 1, '2024-11-05', 22000, 17000, 0, 0, '0', '1', '1', 'COD'),
(2, 1, 0, '2024-11-05', 22000, 22000, 0, 0, '0', '2', '1', 'COD'),
(3, 1, 1, '2024-11-05', 62000, 57000, 0, 3, 'download1.jpeg', '1', '1', 'COD'),
(4, 1, 0, '2024-11-05', 120000, 160000, 40000, 2, 'download3.jpeg', '1', '2', 'Kota Cirebon Prov. Jawa BaratExpedisi. jneJTR'),
(5, 1, 1, '2024-11-05', 72000, 74000, 7000, 3, 'download2.jpeg', '2', '2', 'Kota Kuningan Prov. Jawa BaratExpedisi. jneCTC'),
(6, 1, 1, '2024-11-05', 47000, 42000, 0, 3, 'download4.jpeg', '1', '1', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'admin', 'admin', 1),
(3, 'Pemilik', 'pemilik', 'pemilik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indexes for table `detail_tran`
--
ALTER TABLE `detail_tran`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `kupon`
--
ALTER TABLE `kupon`
  ADD PRIMARY KEY (`id_kupon`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_tran`
--
ALTER TABLE `detail_tran`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kupon`
--
ALTER TABLE `kupon`
  MODIFY `id_kupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
