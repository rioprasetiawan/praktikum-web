-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2025 pada 09.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barbershop`
--

CREATE TABLE `barbershop` (
  `id` int(11) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `kapster` text NOT NULL,
  `harga` text NOT NULL,
  `lokasi` text NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barbershop`
--

INSERT INTO `barbershop` (`id`, `nama_cabang`, `logo_path`, `kapster`, `harga`, `lokasi`, `gambar`, `deskripsi`) VALUES
(17, 'Cabang 1', 'uploads/logos/logo_68eca18740510-logo_67432c441b8d0-logocabang6.png', '[\"A - Hikmal\",\" B - Jade\",\"C - Raqib\"]', '[\"Potong Rambut - 70.000\",\"Cuci Rambut - 30.000\",\"Cukur Jenggot - 20.000\"]', 'https://maps.app.goo.gl/6N7CxcpFqyhH1YSR6', '[\"uploads\\/gallery_68eca1874072d-5.jpg\",\"uploads\\/gallery_68eca187408c1-4.jpg\",\"uploads\\/gallery_68eca18740a1e-3.jpg\",\"uploads\\/gallery_68eca18740b73-2.jpg\",\"uploads\\/gallery_68eca18740ce8-1.jpg\"]', NULL),
(24, 'Cabang 2', 'uploads/logos/logo_68eca5bf6a617-logo_68eca17d226fc-logo_67432c441b8d0-logocabang6.png', '[\"A - Rio\",\"B - Fandy\",\"C - Putra\"]', '[\"Potong Rambut - 80.000\",\"Cuci Rambut - 35.000\",\"Cukur Jenggot - 25.000\"]', 'https://maps.app.goo.gl/WSTunkQScR99G49V7', '[\"uploads\\/gallery_68eca5bf6b13f-gallery_68eca18740a1e-3.jpg\",\"uploads\\/gallery_68eca5bf6b31b-gallery_68eca18740b73-2.jpg\",\"uploads\\/gallery_68eca5bf6b43c-gallery_68eca187408c1-4.jpg\",\"uploads\\/gallery_68eca5bf6bd46-gallery_68eca357772ff-1.jpg\",\"uploads\\/gallery_68eca5bf6be3a-gallery_68eca1874072d-5.jpg\"]', NULL),
(25, 'Cabang 3', 'uploads/logos/logo_68eca64aaf3b2-logo_68eca18740510-logo_67432c441b8d0-logocabang6.png', '[\"A - Raka\",\"B - Reza\",\"C - Arab\"]', '[\"Potong Rambut - 85.000\",\"Cuci Rambut - 35.000\",\"Cukur Jenggot - 25.000\"]', 'https://maps.app.goo.gl/WSTunkQScR99G49V7', '[\"uploads\\/gallery_68eca64aaf5be-gallery_68eca2e46c704-3.jpg\",\"uploads\\/gallery_68eca64aaf740-gallery_68eca5bf6b31b-gallery_68eca18740b73-2.jpg\",\"uploads\\/gallery_68eca64ab3ac5-gallery_68eca5bf6b43c-gallery_68eca187408c1-4.jpg\",\"uploads\\/gallery_68eca64ab3c56-gallery_68eca5bf6bd46-gallery_68eca357772ff-1.jpg\",\"uploads\\/gallery_68eca64ab3d8d-gallery_68eca5bf6be3a-gallery_68eca1874072d-5.jpg\"]', NULL),
(26, 'Cabang 4', 'uploads/logos/logo_68eca6c7d03fb-logo_68eca5bf6a617-logo_68eca17d226fc-logo_67432c441b8d0-logocabang6.png', '[\"A - Ken\",\"B - Shirio\",\"C - Fadil\"]', '[\"Potong Rambut - 90.000\",\"Cuci Rambut - 20.000\",\"Cukur Jenggot - 10.000\"]', 'https://maps.app.goo.gl/WSTunkQScR99G49V7', '[\"uploads\\/gallery_68eca6c7d0568-gallery_68eca2e46c704-3.jpg\",\"uploads\\/gallery_68eca6c7d0650-gallery_68eca4c23cef4-4.jpg\",\"uploads\\/gallery_68eca6c7d0716-gallery_68eca5bf6b31b-gallery_68eca18740b73-2.jpg\",\"uploads\\/gallery_68eca6c7d0aae-gallery_68eca5bf6bd46-gallery_68eca357772ff-1.jpg\",\"uploads\\/gallery_68eca6c7d0b6c-gallery_68eca5bf6be3a-gallery_68eca1874072d-5.jpg\"]', NULL),
(27, 'Cabang 5', 'uploads/logos/logo_68eca720d4494-logo_68eca5bf6a617-logo_68eca17d226fc-logo_67432c441b8d0-logocabang6.png', '[\"A - Rizky\",\"B - Lian\",\"C - Ocha\"]', '[\"Potong Rambut - 100.000\",\"Cuci Rambut - 35.000\",\"Cukur Jenggot - 25.000\"]', 'https://maps.app.goo.gl/WSTunkQScR99G49V7', '[\"uploads\\/gallery_68eca720d478e-gallery_68eca5bf6b13f-gallery_68eca18740a1e-3.jpg\",\"uploads\\/gallery_68eca720d4944-gallery_68eca5bf6b31b-gallery_68eca18740b73-2.jpg\",\"uploads\\/gallery_68eca720d7a0e-gallery_68eca5bf6b43c-gallery_68eca187408c1-4.jpg\",\"uploads\\/gallery_68eca720d7b7a-gallery_68eca5bf6be3a-gallery_68eca1874072d-5.jpg\",\"uploads\\/gallery_68eca720d7c7d-gallery_68eca6c7d0aae-gallery_68eca5bf6bd46-gallery_68eca357772ff-1.jpg\"]', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_antrean`
--

CREATE TABLE `tb_antrean` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `jadwal` datetime NOT NULL,
  `aksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barberadmin`
--

CREATE TABLE `tb_barberadmin` (
  `nama_barbershop` varchar(100) NOT NULL,
  `nama_kapster` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_crud`
--

CREATE TABLE `tb_crud` (
  `id` int(11) NOT NULL,
  `nama_barbershop` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_kapster` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telpo` varchar(20) NOT NULL,
  `jadwal` datetime NOT NULL,
  `detail_pesanan` varchar(100) NOT NULL,
  `kapster` varchar(100) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `bukti_pembayaran` longblob NOT NULL,
  `status_pembayaran` enum('konfirmasi','batal','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `jadwal` datetime NOT NULL,
  `detail_pesanan` varchar(100) NOT NULL,
  `kapster` varchar(100) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `status_pemesanan` enum('lanjutkan','batal','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id`, `nama`, `no_telpon`, `jadwal`, `detail_pesanan`, `kapster`, `cabang`, `pembayaran`, `status_pemesanan`) VALUES
(1, 'Rio Prasetiawan', '081348484848', '2025-10-14 05:18:00', 'Potong Rambut', 'Kapster A', 'Cabang 3', 'Transfer', 'lanjutkan'),
(2, 'Jade Wardana', '0813484746453', '2025-10-14 15:21:00', 'Cuci Rambut', 'Kapster B', 'Cabang 1', 'Cash', 'lanjutkan'),
(3, 'Hikmal Nur Wahid', '081348574643', '2025-10-15 15:21:00', 'Cukur Jenggot', 'Kapster B', 'Cabang 2', 'Debit', 'lanjutkan'),
(4, 'Raqib Fahreza', '081235454362', '2025-10-16 15:21:00', 'Cukur Jenggot', 'Kapster A', 'Cabang 3', 'Transfer', 'lanjutkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barbershop`
--
ALTER TABLE `barbershop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barbershop`
--
ALTER TABLE `barbershop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
