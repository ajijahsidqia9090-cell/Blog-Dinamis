-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2026 pada 04.12
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `tanggal`, `id_user`, `id_kategori`, `gambar`) VALUES
(10, 'NCTOT23', 'Mereka merupakan Boy Grup dari SM yang jumlah membernya itu banyak dan bisa bertambah member. akan tetaapi sekarang sistem itu sudah dihapus.', '2026-04-06', 7, 2, '1775491795.jpg'),
(11, 'SMTR25', 'rooki sm25. Yang dimana mereka beranggotakan 20, mereka bersaing agar bisa debut di SM ENTERTAIMENT', '2026-04-06', 5, 1, '1775371889.jpg'),
(15, 'NCT DREAM', 'NBF', '2026-04-07', 1, 2, '1775499340.jpeg'),
(16, 'aespa', 'Gril grup aespa ini dari agensi SM ENTERTAIMENT, yang dimana beranggotakan 4 member. Dengan anggotanya yaitu Karina, Gisel, Winter dan Ningning. Mereka debut di gen ke-4, yang dimana pada saat itu sedang terjadi virus.', '2026-04-07', 5, 3, '1775500136.jpg'),
(17, 'h2h', 'H2H ini grilgrup dari SM ENTERTAIMENT dimana salah satu membernya berasal dari Indonesia yaitu di Bali. Lagu-lagu mereka juga juga essy lesening, dan jika didengarkan itu langsung hafal', '2026-04-07', 7, 1, '1775508554.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel_tag`
--

CREATE TABLE `artikel_tag` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel_tag`
--

INSERT INTO `artikel_tag` (`id`, `id_artikel`, `id_tag`) VALUES
(1, 11, 2),
(3, 15, 1),
(4, 14, 2),
(5, 10, 4),
(6, 16, 2),
(7, 17, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'k-pop'),
(2, 'gen3'),
(3, 'gen4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_artikel`, `nama`, `komentar`, `tanggal`) VALUES
(1, 16, 'user', 'wahhhh', '2026-04-07'),
(3, 11, 'user', 'sm cuma mentingin visual doang, tapi setiap nyanyi mereka masih lipsing', '2026-04-07'),
(4, 10, 'neo', 'semoga secepatnya konser yaa\r\n', '2026-04-07'),
(6, 11, 'eyo', 'wahhh', '2026-04-07'),
(7, 15, 'neo', 'yo dreamm', '2026-04-07'),
(8, 17, 'neo', 'huhauhdhg', '2026-04-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `nama_tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`) VALUES
(1, '#nctdream'),
(2, '#smtown'),
(4, '#nct');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `role` enum('admin','author','pengguna') DEFAULT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`, `email`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'jijahh', 'admin', 'jjhh@gmail.com'),
(5, 'author', 'b6d767d2f8ed5d21a44b0e5886680cb9', NULL, 'author', 'au@gmail.com'),
(6, 'mark', 'ac627ab1ccbdb62ec96e702f07f6425b', NULL, 'admin', 'mark@gmail.com'),
(7, 'jisung', 'f7177163c833dff4b38fc8d2872f1ec6', NULL, 'author', 'icung@gmail.com'),
(8, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', NULL, 'pengguna', 'user@gmail.com'),
(9, 'neo', '202cb962ac59075b964b07152d234b70', NULL, 'pengguna', 'neo@gmail.com'),
(13, 'eyo', '183c5ec4581b85099655a71a7f46f955', NULL, 'pengguna', 'eyo@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `artikel_tag`
--
ALTER TABLE `artikel_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `artikel_tag`
--
ALTER TABLE `artikel_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
