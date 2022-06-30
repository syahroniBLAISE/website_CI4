-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2022 pada 10.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpartnersablon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_penjualan`
--

CREATE TABLE `catatan_penjualan` (
  `id_transaksi` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `uang_masuk` int(255) NOT NULL,
  `uang_keluar` int(255) NOT NULL,
  `time_transaksi` date DEFAULT NULL,
  `ket_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `catatan_penjualan`
--

INSERT INTO `catatan_penjualan` (`id_transaksi`, `nama_pelanggan`, `uang_masuk`, `uang_keluar`, `time_transaksi`, `ket_transaksi`) VALUES
(1, 'tewsrgsf', 400000, 40000, NULL, 'test'),
(3, 'syahroni', 100000, 50000, '0000-00-00', '06/01/2022'),
(4, 'roby', 200000, 50000, '0000-00-00', '07/06/2022'),
(5, 'bunga', 100000, 50000, '0000-00-00', '08/01/2022'),
(6, 'ridho', 90000, 30000, '0000-00-00', '09/01/2022'),
(7, 'bundo', 100000, 50000, '0000-00-00', '10/01/2022'),
(8, 'apa', 100000, 50000, '0000-00-00', '11/01/2022'),
(9, 'syahroni', 100000, 50000, '0000-00-00', '06/01/2022'),
(10, 'roby', 200000, 50000, '0000-00-00', '07/01/2022'),
(11, 'bunga', 100000, 50000, '0000-00-00', '08/01/2022'),
(12, 'ridho', 100000, 50000, '0000-00-00', '09/01/2022'),
(13, 'bundo', 100000, 50000, '0000-00-00', '10/01/2022'),
(14, 'apa', 100000, 50000, '0000-00-00', '11/01/2022'),
(15, 'syahroni', 100000, 50000, '0000-00-00', 'beli baju'),
(16, 'roby', 200000, 50000, '0000-00-00', 'beli baju'),
(17, 'bunga', 100000, 50000, '0000-00-00', 'beli baju'),
(18, 'ridho', 100000, 50000, '0000-00-00', 'beli baju'),
(19, 'bundo', 100000, 50000, '0000-00-00', 'beli baju'),
(20, 'apa', 100000, 50000, '0000-00-00', 'beli baju'),
(21, 'syahroni', 100000, 50000, '2022-01-06', 'beli baju'),
(22, 'roby', 200000, 50000, '2022-01-07', 'beli baju'),
(23, 'bunga', 100000, 50000, '2022-01-08', 'beli celana'),
(24, 'ridho', 100000, 50000, '2022-01-09', 'beli baju'),
(25, 'bundo', 100000, 50000, '2022-01-10', 'beli baju'),
(26, 'apa', 100000, 50000, '2022-01-11', 'beli baju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `databarang`
--

CREATE TABLE `databarang` (
  `id_produk` int(100) NOT NULL,
  `nama_produk` varchar(1000) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `kategori_produk` varchar(100) NOT NULL,
  `img_produk` varchar(100) NOT NULL,
  `rating_produk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakaos`
--

CREATE TABLE `datakaos` (
  `id_kaos` int(100) NOT NULL,
  `nama_kaos` varchar(1000) NOT NULL,
  `harga_kaos` int(100) NOT NULL,
  `kategori_kaos` varchar(1000) NOT NULL,
  `gambar_kaos` varchar(1000) NOT NULL,
  `warna_kaos` varchar(1000) NOT NULL,
  `waktu_update` varchar(1000) NOT NULL,
  `thumbnail_kaos` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakaos`
--

INSERT INTO `datakaos` (`id_kaos`, `nama_kaos`, `harga_kaos`, `kategori_kaos`, `gambar_kaos`, `warna_kaos`, `waktu_update`, `thumbnail_kaos`) VALUES
(6, 'KAOS KOZE COKLAT', 45000, 'KAOS POLOS', '/img/test.jpg', 'COKLAT', '26, 6, 2022', '/img/test.jpg'),
(7, 'KAOS KOZE GREY', 45000, 'KAOS POLOS', '/img/test.jpg', 'GREY', '26, 6, 2022', '/img/test.jpg'),
(8, 'KAOS KOZE HIJAU', 45000, 'KAOS POLOS', '/img/test.jpg', 'HIJAU', '26, 6, 2022', '/img/test.jpg'),
(9, 'KAOS KOZE HITAM', 45000, 'KAOS POLOS', '/img/test.jpg', 'HITAM', '26, 6, 2022', '/img/test.jpg'),
(10, 'KAOS KOZE MERAH MAROO', 45000, 'KAOS POLOS', '/img/test.jpg', 'COKLAT', '26, 6, 2022', '/img/test.jpg'),
(11, 'KAOS KOZE COKLAT', 45000, 'KAOS POLOS', '/img/test.jpg', 'COKLAT', '30, 6, 2022', '/img/test.jpg'),
(12, 'KAOS KOZE GREY', 45000, 'KAOS POLOS', '/img/test.jpg', 'GREY', '30, 6, 2022', '/img/test.jpg'),
(13, 'KAOS KOZE HIJAU', 45000, 'KAOS POLOS', '/img/test.jpg', 'HIJAU', '30, 6, 2022', '/img/test.jpg'),
(14, 'KAOS KOZE HITAM', 45000, 'KAOS POLOS', '/img/test.jpg', 'HITAM', '30, 6, 2022', '/img/test.jpg'),
(15, 'KAOS KOZE MERAH MAROO', 45000, 'KAOS POLOS', '/img/test.jpg', 'COKLAT', '30, 6, 2022', '/img/test.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id_halaman` int(100) NOT NULL,
  `judul_halaman` varchar(1000) NOT NULL,
  `url_halaman` varchar(1000) NOT NULL,
  `content_halaman` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `judul_halaman`, `url_halaman`, `content_halaman`) VALUES
(1, 'KAOS', 'adminKaos', 'ini halaman pengelolaan kaos'),
(5, 'STOK KAOS', 'adminStokKaos', 'ini halaman pembukuan stok kaos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokkaos`
--

CREATE TABLE `stokkaos` (
  `id_stok` int(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `warna_kaos` varchar(1000) NOT NULL,
  `size_kaos` varchar(100) NOT NULL,
  `jumlah_stok` int(255) NOT NULL,
  `kategori` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stokkaos`
--

INSERT INTO `stokkaos` (`id_stok`, `nama_produk`, `warna_kaos`, `size_kaos`, `jumlah_stok`, `kategori`) VALUES
(3, 'cotton combed ', 'merah', 'XXL', 8, 'kaos v'),
(5, 'cotton', 'hitam', 'XL', 8, 'kaos oblong'),
(6, 'cotton combed 20s', 'hitam', 'M', 7, 'kaos oblong'),
(8, 'cotton combed 20s', 'hitam', 'M', 11, 'kaos oblong'),
(9, 'cotton combed 20s', 'hitam', 'M', 6, 'kaos oblong'),
(10, 'cotton combed 20s', 'hitam', 'L', 7, 'kaos oblong'),
(11, 'cotton combed 20s', 'hitam', 'XL', 8, 'kaos oblong'),
(12, 'cotton combed 20s', 'hitam', 'M', 9, 'kaos oblong'),
(13, 'cotton combed 20s', 'hitam', 'M', 10, 'kaos oblong'),
(14, 'cotton combed 20s', 'hitam', 'M', 11, 'kaos oblong'),
(15, 'cotton combed 20s', 'hitam', 'M', 6, 'kaos oblong'),
(16, 'cotton combed 20s', 'hitam', 'L', 7, 'kaos oblong'),
(17, 'cotton combed 20s', 'hitam', 'XL', 8, 'kaos oblong'),
(18, 'cotton combed 20s', 'hitam', 'M', 9, 'kaos oblong'),
(19, 'cotton combed 20s', 'hitam', 'M', 10, 'kaos oblong'),
(20, 'cotton combed 20s', 'hitam', 'M', 11, 'kaos oblong'),
(21, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(22, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(23, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(24, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(25, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(26, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(27, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(28, 'undefined', 'undefined', 'undefined', 0, 'undefined');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Sandhika Galih', 'sandhikagalih@unpas.ac.id', 'profile1.jpg', '$2y$10$nXnrqGQTjpvg58OtOB/N.evYQjVlz7KIW37oUSQSQ2EgNMD0Dgrzq', 1, 1, 1552120289),
(6, 'Doddy Ferdiansyah', 'doddy@gmail.com', 'profile.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 2, 1, 1552285263),
(11, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `catatan_penjualan`
--
ALTER TABLE `catatan_penjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `databarang`
--
ALTER TABLE `databarang`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `datakaos`
--
ALTER TABLE `datakaos`
  ADD PRIMARY KEY (`id_kaos`);

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indeks untuk tabel `stokkaos`
--
ALTER TABLE `stokkaos`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatan_penjualan`
--
ALTER TABLE `catatan_penjualan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `databarang`
--
ALTER TABLE `databarang`
  MODIFY `id_produk` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `datakaos`
--
ALTER TABLE `datakaos`
  MODIFY `id_kaos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_halaman` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stokkaos`
--
ALTER TABLE `stokkaos`
  MODIFY `id_stok` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
