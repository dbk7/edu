-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11 Okt 2018 pada 05.37
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_212`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `satuan_barang` varchar(10) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stock_barang` int(11) NOT NULL,
  `id_mitra` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `satuan_barang`, `id_kategori`, `harga_beli`, `harga_jual`, `stock_barang`, `id_mitra`) VALUES
('BG0001', 'Bimoli', 'PCS', 'KG001', 22000, 23000, 19, 'MT001'),
('BG0002', 'Royco', 'PCS', 'KG001', 1100, 1200, 28, 'MT001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `kode_barangmasuk` varchar(15) NOT NULL,
  `tgl_barangmasuk` date NOT NULL,
  `total_qty` int(3) NOT NULL,
  `grandtotal_harga_beli` int(11) NOT NULL,
  `grandtotal_harga_jual` int(11) NOT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`kode_barangmasuk`, `tgl_barangmasuk`, `total_qty`, `grandtotal_harga_beli`, `grandtotal_harga_jual`, `username`) VALUES
('BM-201808130001', '2018-08-13', 2, 40000, 42000, 'fitri'),
('BM-201809170001', '2018-09-17', 5, 5500, 6000, 'fitri'),
('BM-201809270001', '2018-09-27', 20, 440000, 460000, 'fitri'),
('BM-201810050001', '2018-10-05', 2, 44000, 46000, 'fitri'),
('BM-201810050002', '2018-10-05', 1, 22000, 23000, 'fitri'),
('BM-201810050003', '2018-10-05', 1, 22000, 23000, 'fitri'),
('BM-201810090001', '2018-10-09', 2, 2200, 2400, 'fitri'),
('BM-201810090002', '2018-10-09', 1, 1100, 1200, 'fitri'),
('BM-201810090003', '2018-10-09', 2, 2200, 2400, 'fitri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk_details`
--

CREATE TABLE IF NOT EXISTS `barang_masuk_details` (
`no` int(11) NOT NULL,
  `kode_barangmasuk` varchar(15) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_harga_beli` int(11) NOT NULL,
  `total_harga_jual` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk_details`
--

INSERT INTO `barang_masuk_details` (`no`, `kode_barangmasuk`, `id_barang`, `qty`, `harga_beli`, `harga_jual`, `total_harga_beli`, `total_harga_jual`) VALUES
(3, 'BM-201808130001', 'BG0001', 2, 20000, 21000, 40000, 42000),
(4, 'BM-201809170001', 'BG0002', 5, 1100, 1200, 5500, 6000),
(5, 'BM-201809270001', 'BG0001', 20, 22000, 23000, 440000, 460000),
(6, 'BM-201810050001', 'BG0001', 2, 22000, 23000, 44000, 46000),
(7, 'BM-201810050002', 'BG0001', 1, 22000, 23000, 22000, 23000),
(8, 'BM-201810050003', 'BG0001', 1, 22000, 23000, 22000, 23000),
(9, 'BM-201810090001', 'BG0002', 2, 1100, 1200, 2200, 2400),
(10, 'BM-201810090002', 'BG0002', 1, 1100, 1200, 1100, 1200),
(11, 'BM-201810090003', 'BG0002', 2, 1100, 1200, 2200, 2400);

--
-- Trigger `barang_masuk_details`
--
DELIMITER //
CREATE TRIGGER `STOKDANHARGA_UPDATE` BEFORE INSERT ON `barang_masuk_details`
 FOR EACH ROW BEGIN
 UPDATE barang SET stock_barang = stock_barang + NEW.qty, harga_beli = NEW.harga_beli, harga_jual = NEW.harga_jual
 WHERE id_barang = NEW.id_barang;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk_details_temp`
--

CREATE TABLE IF NOT EXISTS `barang_masuk_details_temp` (
  `kode_barangmasuk` varchar(15) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `qty` int(3) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_harga_beli` int(11) NOT NULL,
  `total_harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `deskripsi_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`) VALUES
('KG001', 'Bumbu dapur', 'Segala jenis aneka bumbu dapur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE IF NOT EXISTS `mitra` (
  `id_mitra` varchar(5) NOT NULL,
  `nama_mitra` varchar(30) NOT NULL,
  `alamat_mitra` varchar(100) NOT NULL,
  `telp_mitra` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `alamat_mitra`, `telp_mitra`) VALUES
('MT001', 'Subur Jaya', 'Kp. Kadu', '089630963190');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `kode_penjualan` varchar(15) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_qty` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `tgl_penjualan`, `total_qty`, `grandtotal`, `bayar`, `kembalian`, `username`) VALUES
('JL-201808100001', '2018-08-10', 3, 6000, 6200, 100, 'fitri'),
('JL-201808100002', '2018-08-10', 1, 2000, 2200, 100, 'fitri'),
('JL-201808110001', '2018-08-11', 5, 100000, 100000, 0, 'fitri'),
('JL-201808110002', '2018-08-11', 2, 40000, 40000, 0, 'fitri'),
('JL-201808110003', '2018-08-11', 2, 40000, 41000, 1000, 'fitri'),
('JL-201809040001', '2018-09-04', 2, 42000, 42000, 0, 'fitri'),
('JL-201809040002', '2018-09-04', 2, 2200, 2300, 100, 'fitri'),
('JL-201809040003', '2018-09-04', 2, 42000, 42000, 0, 'fitri'),
('JL-201809040004', '2018-09-04', 2, 2200, 2200, 0, 'fitri'),
('JL-201809040005', '2018-09-04', 2, 2200, 2200, 0, 'fitri'),
('JL-201809040006', '2018-09-04', 1, 21000, 21000, 0, 'fitri'),
('JL-201809040007', '2018-09-04', 1, 21000, 21000, 0, 'fitri'),
('JL-201809040008', '2018-09-04', 1, 21000, 21000, 0, 'fitri'),
('JL-201809040009', '2018-09-04', 1, 1100, 1100, 0, 'fitri'),
('JL-201809040010', '2018-09-04', 1, 21000, 21000, 0, 'fitri'),
('JL-201809040011', '2018-09-04', 1, 21000, 21000, 0, 'fitri'),
('JL-201809040012', '2018-09-04', 1, 1100, 1100, 0, 'fitri'),
('JL-201809040013', '2018-09-04', 2, 22100, 22100, 0, 'fitri'),
('JL-201809040014', '2018-09-04', 1, 21000, 30000, 9000, 'fitri'),
('JL-201809040015', '2018-09-04', 3, 43100, 45000, 1900, 'fitri'),
('JL-201809100001', '2018-09-10', 1, 21000, 21000, 0, 'fitri'),
('JL-201809170001', '2018-09-17', 2, 42000, 42000, 0, 'fitri'),
('JL-201809170002', '2018-09-17', 1, 1100, 1100, 0, 'fitri'),
('JL-201809220001', '2018-09-22', 2, 2400, 2400, 0, 'fitri'),
('JL-201809260001', '2018-09-26', 2, 42000, 42000, 0, 'fitri'),
('JL-201809270001', '2018-09-27', 2, 46000, 46000, 0, 'fitri'),
('JL-201810050001', '2018-10-05', 2, 46000, 46000, 0, 'fitri'),
('JL-201810090001', '2018-10-09', 1, 23000, 23000, 0, 'fitri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_details`
--

CREATE TABLE IF NOT EXISTS `penjualan_details` (
`no` int(11) NOT NULL,
  `kode_penjualan` varchar(15) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan_details`
--

INSERT INTO `penjualan_details` (`no`, `kode_penjualan`, `id_barang`, `qty`, `harga_jual`, `total`) VALUES
(1, 'JL-201808100001', 'BG0001', 2, 2000, 4000),
(2, 'JL-201808100001', 'BG0002', 1, 2000, 2000),
(5, 'JL-201808100002', 'BG0002', 1, 2000, 2000),
(6, 'JL-201808110001', 'BG0001', 5, 20000, 100000),
(7, 'JL-201808110002', 'BG0001', 2, 20000, 40000),
(10, 'JL-201808110003', 'BG0001', 2, 20000, 40000),
(11, 'JL-201809040001', 'BG0001', 2, 21000, 42000),
(12, 'JL-201809040002', 'BG0002', 2, 1100, 2200),
(13, 'JL-201809040003', 'BG0001', 2, 21000, 42000),
(14, 'JL-201809040004', 'BG0002', 2, 1100, 2200),
(15, 'JL-201809040005', 'BG0002', 2, 1100, 2200),
(16, 'JL-201809040006', 'BG0001', 1, 21000, 21000),
(17, 'JL-201809040007', 'BG0001', 1, 21000, 21000),
(18, 'JL-201809040008', 'BG0001', 1, 21000, 21000),
(19, 'JL-201809040009', 'BG0002', 1, 1100, 1100),
(20, 'JL-201809040010', 'BG0001', 1, 21000, 21000),
(21, 'JL-201809040011', 'BG0001', 1, 21000, 21000),
(22, 'JL-201809040012', 'BG0002', 1, 1100, 1100),
(23, 'JL-201809040013', 'BG0001', 1, 21000, 21000),
(24, 'JL-201809040013', 'BG0002', 1, 1100, 1100),
(26, 'JL-201809040014', 'BG0001', 1, 21000, 21000),
(27, 'JL-201809040015', 'BG0001', 2, 21000, 42000),
(28, 'JL-201809040015', 'BG0002', 1, 1100, 1100),
(29, 'JL-201809100001', 'BG0001', 1, 21000, 21000),
(30, 'JL-201809170001', 'BG0001', 2, 21000, 42000),
(31, 'JL-201809170002', 'BG0002', 1, 1100, 1100),
(32, 'JL-201809220001', 'BG0002', 2, 1200, 2400),
(33, 'JL-201809260001', 'BG0001', 2, 21000, 42000),
(34, 'JL-201809270001', 'BG0001', 2, 23000, 46000),
(35, 'JL-201810050001', 'BG0001', 2, 23000, 46000),
(36, 'JL-201810090001', 'BG0001', 1, 23000, 23000);

--
-- Trigger `penjualan_details`
--
DELIMITER //
CREATE TRIGGER `UPDATE STOK` BEFORE INSERT ON `penjualan_details`
 FOR EACH ROW BEGIN
 UPDATE barang SET stock_barang = stock_barang - NEW.qty
 WHERE id_barang = NEW.id_barang;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_details_temp`
--

CREATE TABLE IF NOT EXISTS `penjualan_details_temp` (
  `kode_penjualan` varchar(15) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_penjualan`
--

CREATE TABLE IF NOT EXISTS `retur_penjualan` (
  `kode_returpenjualan` varchar(15) NOT NULL,
  `tgl_returpenjualan` date NOT NULL,
  `kode_penjualan` varchar(15) NOT NULL,
  `totalqty_barangretur` int(11) NOT NULL,
  `grandtotal_barangretur` int(11) NOT NULL,
  `username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur_penjualan`
--

INSERT INTO `retur_penjualan` (`kode_returpenjualan`, `tgl_returpenjualan`, `kode_penjualan`, `totalqty_barangretur`, `grandtotal_barangretur`, `username`) VALUES
('RJ-201808140001', '2018-08-14', 'JL-201808100001', 2, 4000, 'fitri'),
('RJ-201809270001', '2018-09-27', 'JL-201809270001', 1, 23000, 'fitri'),
('RJ-201810050001', '2018-10-05', 'JL-201808100001', 1, 2000, 'fitri'),
('RJ-201810090001', '2018-10-09', 'JL-201808110001', 1, 20000, 'fitri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_penjualan_details`
--

CREATE TABLE IF NOT EXISTS `retur_penjualan_details` (
`no` int(11) NOT NULL,
  `kode_returpenjualan` varchar(15) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `qty_retur` int(11) NOT NULL,
  `harga_retur` int(11) NOT NULL,
  `total_retur` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur_penjualan_details`
--

INSERT INTO `retur_penjualan_details` (`no`, `kode_returpenjualan`, `id_barang`, `qty_retur`, `harga_retur`, `total_retur`) VALUES
(4, 'RJ-201808140001', 'BG0001', 2, 2000, 4000),
(5, 'RJ-201809270001', 'BG0001', 1, 23000, 23000),
(6, 'RJ-201810050001', 'BG0001', 1, 2000, 2000),
(7, 'RJ-201810090001', 'BG0001', 1, 20000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_penjualan_details_temp`
--

CREATE TABLE IF NOT EXISTS `retur_penjualan_details_temp` (
  `kode_returpenjualan` varchar(15) NOT NULL,
  `kode_penjualan` varchar(15) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `qty_retur` int(11) NOT NULL,
  `harga_retur` int(11) NOT NULL,
  `total_retur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(8) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `authorization` varchar(20) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `fullname`, `authorization`, `photo`) VALUES
('arigo', '1bc0249a6412ef49b07fe6f62e6dc8de', 'Arigo', 'Kasir', 'assets/images/avatars/arigo.jpg'),
('elisa', '1bc0249a6412ef49b07fe6f62e6dc8de', 'Elisa Fitriani', 'Kepala Toko', 'assets/images/avatars/elisa.jpg'),
('fitri', '1bc0249a6412ef49b07fe6f62e6dc8de', 'Fitri Nurul Fathonah', 'Administrator', 'assets/images/avatars/Fitri.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`), ADD KEY `id_mitra` (`id_mitra`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
 ADD PRIMARY KEY (`kode_barangmasuk`), ADD KEY `username` (`username`);

--
-- Indexes for table `barang_masuk_details`
--
ALTER TABLE `barang_masuk_details`
 ADD PRIMARY KEY (`no`), ADD KEY `kode_barangmasuk` (`kode_barangmasuk`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `barang_masuk_details_temp`
--
ALTER TABLE `barang_masuk_details_temp`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
 ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`kode_penjualan`), ADD KEY `username` (`username`);

--
-- Indexes for table `penjualan_details`
--
ALTER TABLE `penjualan_details`
 ADD PRIMARY KEY (`no`), ADD KEY `kode_penjualan` (`kode_penjualan`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `penjualan_details_temp`
--
ALTER TABLE `penjualan_details_temp`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
 ADD PRIMARY KEY (`kode_returpenjualan`), ADD KEY `kode_penjualan` (`kode_penjualan`), ADD KEY `username` (`username`);

--
-- Indexes for table `retur_penjualan_details`
--
ALTER TABLE `retur_penjualan_details`
 ADD PRIMARY KEY (`no`), ADD KEY `id_barang` (`id_barang`), ADD KEY `kode_returpenjualan` (`kode_returpenjualan`);

--
-- Indexes for table `retur_penjualan_details_temp`
--
ALTER TABLE `retur_penjualan_details_temp`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk_details`
--
ALTER TABLE `barang_masuk_details`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `penjualan_details`
--
ALTER TABLE `penjualan_details`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `retur_penjualan_details`
--
ALTER TABLE `retur_penjualan_details`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`),
ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk_details`
--
ALTER TABLE `barang_masuk_details`
ADD CONSTRAINT `barang_masuk_details_ibfk_1` FOREIGN KEY (`kode_barangmasuk`) REFERENCES `barang_masuk` (`kode_barangmasuk`) ON UPDATE CASCADE,
ADD CONSTRAINT `barang_masuk_details_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
ADD CONSTRAINT `penjualan_details_ibfk_1` FOREIGN KEY (`kode_penjualan`) REFERENCES `penjualan` (`kode_penjualan`) ON UPDATE CASCADE,
ADD CONSTRAINT `penjualan_details_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
ADD CONSTRAINT `retur_penjualan_ibfk_1` FOREIGN KEY (`kode_penjualan`) REFERENCES `penjualan` (`kode_penjualan`),
ADD CONSTRAINT `retur_penjualan_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `retur_penjualan_details`
--
ALTER TABLE `retur_penjualan_details`
ADD CONSTRAINT `retur_penjualan_details_ibfk_1` FOREIGN KEY (`kode_returpenjualan`) REFERENCES `retur_penjualan` (`kode_returpenjualan`),
ADD CONSTRAINT `retur_penjualan_details_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
