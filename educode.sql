-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2018 pada 18.14
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `satuan_barang` varchar(10) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stock_barang` int(11) NOT NULL,
  `id_mitra` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kode_barangmasuk` varchar(15) NOT NULL,
  `tgl_barangmasuk` date NOT NULL,
  `total_qty` int(3) NOT NULL,
  `grandtotal_harga_beli` int(11) NOT NULL,
  `grandtotal_harga_jual` int(11) NOT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk_details`
--

CREATE TABLE `barang_masuk_details` (
  `no` int(11) NOT NULL,
  `kode_barangmasuk` varchar(15) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_harga_beli` int(11) NOT NULL,
  `total_harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barang_masuk_details`
--
DELIMITER $$
CREATE TRIGGER `STOKDANHARGA_UPDATE` BEFORE INSERT ON `barang_masuk_details` FOR EACH ROW BEGIN
 UPDATE barang SET stock_barang = stock_barang + NEW.qty, harga_beli = NEW.harga_beli, harga_jual = NEW.harga_jual
 WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk_details_temp`
--

CREATE TABLE `barang_masuk_details_temp` (
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
-- Struktur dari tabel `edu_kelas`
--

CREATE TABLE `edu_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `seat` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `edu_kelas`
--

INSERT INTO `edu_kelas` (`id`, `nama_kelas`, `seat`, `status`) VALUES
(1, 'Educode Bath 1', 45, 'open'),
(2, 'Educode Batch 2', 56, 'close');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `deskripsi_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` varchar(5) NOT NULL,
  `nama_mitra` varchar(30) NOT NULL,
  `alamat_mitra` varchar(100) NOT NULL,
  `telp_mitra` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `tlp` varchar(25) NOT NULL,
  `alasan` text NOT NULL,
  `jenis_event` varchar(255) NOT NULL DEFAULT 'Batch1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` varchar(15) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_qty` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_details`
--

CREATE TABLE `penjualan_details` (
  `no` int(11) NOT NULL,
  `kode_penjualan` varchar(15) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `penjualan_details`
--
DELIMITER $$
CREATE TRIGGER `UPDATE STOK` BEFORE INSERT ON `penjualan_details` FOR EACH ROW BEGIN
 UPDATE barang SET stock_barang = stock_barang - NEW.qty
 WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_details_temp`
--

CREATE TABLE `penjualan_details_temp` (
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

CREATE TABLE `retur_penjualan` (
  `kode_returpenjualan` varchar(15) NOT NULL,
  `tgl_returpenjualan` date NOT NULL,
  `kode_penjualan` varchar(15) NOT NULL,
  `totalqty_barangretur` int(11) NOT NULL,
  `grandtotal_barangretur` int(11) NOT NULL,
  `username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_penjualan_details`
--

CREATE TABLE `retur_penjualan_details` (
  `no` int(11) NOT NULL,
  `kode_returpenjualan` varchar(15) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `qty_retur` int(11) NOT NULL,
  `harga_retur` int(11) NOT NULL,
  `total_retur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_penjualan_details_temp`
--

CREATE TABLE `retur_penjualan_details_temp` (
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

CREATE TABLE `users` (
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
('dbkedu', 'c5cbc99313fd16065a1c0e1e528babf8', 'Dwi Budi Kurniawan', 'Administrator', 'assets/images/avatars/IMG_20180614_094315311.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_mitra` (`id_mitra`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kode_barangmasuk`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `barang_masuk_details`
--
ALTER TABLE `barang_masuk_details`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kode_barangmasuk` (`kode_barangmasuk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `barang_masuk_details_temp`
--
ALTER TABLE `barang_masuk_details_temp`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `edu_kelas`
--
ALTER TABLE `edu_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kode_penjualan` (`kode_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `penjualan_details_temp`
--
ALTER TABLE `penjualan_details_temp`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  ADD PRIMARY KEY (`kode_returpenjualan`),
  ADD KEY `kode_penjualan` (`kode_penjualan`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `retur_penjualan_details`
--
ALTER TABLE `retur_penjualan_details`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `kode_returpenjualan` (`kode_returpenjualan`);

--
-- Indeks untuk tabel `retur_penjualan_details_temp`
--
ALTER TABLE `retur_penjualan_details_temp`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_masuk_details`
--
ALTER TABLE `barang_masuk_details`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `edu_kelas`
--
ALTER TABLE `edu_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `retur_penjualan_details`
--
ALTER TABLE `retur_penjualan_details`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
