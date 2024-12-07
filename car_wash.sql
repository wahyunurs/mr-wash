-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2023 pada 20.50
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_wash`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin123', '$2y$10$Dku1Xm2IFSZ0vPHbUnpTFO/.R5ZTaD/mtFcW2cQQo6d6v0FK8CCla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_customers`
--

CREATE TABLE `akun_customers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun_customers`
--

INSERT INTO `akun_customers` (`id`, `username`, `password`) VALUES
(1, 'alifbata123', '$2y$10$6mcsc.4Lax30fV7DYrPbC.937C.bizI91sLNm4xhHdo5UKsob1M7u'),
(2, 'gembul123', '$2y$10$1J3U/2g7e5Z9QK2o3yLFe.27XG56CZfN26KArs5RsR.2FQJFzxvK2'),
(6, 'aku12', '$2y$10$ZD5/O.W9rQNSxpNql0gvkuhT6dJaFE6qciBPcZ7FmIENjQbj8bPMy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_customer`
--

CREATE TABLE `data_customer` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telpon` int(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_customer`
--

INSERT INTO `data_customer` (`id`, `nama_lengkap`, `alamat`, `no_telpon`, `email`) VALUES
(6, 'Aku', 'Semarang', 2147483647, 'aku12@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_perusahaan`
--

CREATE TABLE `info_perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `kontak_perusahaan` int(12) NOT NULL,
  `email_perusahaan` varchar(50) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rekening` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `info_perusahaan`
--

INSERT INTO `info_perusahaan` (`id`, `nama_perusahaan`, `alamat_perusahaan`, `kontak_perusahaan`, `email_perusahaan`, `nama_bank`, `no_rekening`) VALUES
(1, 'Mr Wash', 'Jl. Ksatria Baja Hitam No. 253 Kota Semarang Jawa Tengah', 123987654, 'mrwash@gmail.com', 'BNI', 1200238900);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_cuci`
--

CREATE TABLE `jenis_cuci` (
  `id` int(11) NOT NULL,
  `jenis_cuci` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_cuci`
--

INSERT INTO `jenis_cuci` (`id`, `jenis_cuci`, `harga`) VALUES
(1, 'Cuci Body', 35000),
(2, 'Cuci Menyeluruh', 45000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `merk_mobil` varchar(50) NOT NULL,
  `jenis_cuci` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_cuci` date NOT NULL,
  `jam_cuci` time NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `status_cuci` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama_lengkap`, `merk_mobil`, `jenis_cuci`, `harga`, `tanggal_cuci`, `jam_cuci`, `no_antrian`, `metode_pembayaran`, `bukti_pembayaran`, `status_pembayaran`, `status_cuci`) VALUES
(11, 'M Alifqi Zaki', 'My Little Bus', 'Cuci Menyeluruh', 45000, '2023-07-05', '08:48:00', 12, 'Transfer', 'tf1.jpg', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun_customers`
--
ALTER TABLE `akun_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `info_perusahaan`
--
ALTER TABLE `info_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_cuci`
--
ALTER TABLE `jenis_cuci`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akun_customers`
--
ALTER TABLE `akun_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `info_perusahaan`
--
ALTER TABLE `info_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_cuci`
--
ALTER TABLE `jenis_cuci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
