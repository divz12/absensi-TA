-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2024 pada 16.52
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensidb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id`, `nama_jurusan`) VALUES
(1, 'RPL '),
(2, 'TKJ'),
(4, 'OTKP'),
(7, 'AKL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `nama_kelas`) VALUES
(1, '12'),
(2, '11'),
(4, '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id` int(11) NOT NULL,
  `no_kartu` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `nama_jurusan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` enum('approved','rejected','pending') DEFAULT 'pending',
  `tanggal` date NOT NULL,
  `detail` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `masuk` time NOT NULL,
  `keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `no_kartu`, `nama_lengkap`, `nama_kelas`, `nama_jurusan`, `keterangan`, `status`, `tanggal`, `detail`, `foto`, `masuk`, `keluar`) VALUES
(30, '1951772900', 'Zai', '11', 'TKJ', 'sakit', 'pending', '2024-06-19', 'demam', '../masuk/uploads/obat.jpg', '15:41:38', '15:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekap`
--

CREATE TABLE `tbl_rekap` (
  `id` int(11) NOT NULL,
  `no_kartu` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `nama_jurusan` varchar(255) DEFAULT NULL,
  `keterangan` enum('hadir','izin','sakit','alpa') DEFAULT 'hadir',
  `foto` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` time NOT NULL,
  `keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekap`
--

INSERT INTO `tbl_rekap` (`id`, `no_kartu`, `nama_lengkap`, `nama_kelas`, `nama_jurusan`, `keterangan`, `foto`, `tanggal`, `masuk`, `keluar`) VALUES
(45, '2856720104', 'Shiva Almira Hasti', '10', 'AKL', 'hadir', 'uploads/zia.png', '2024-06-29', '12:48:49', '14:27:40'),
(46, '2854878696', 'Annisa Halimatus Sadiyah', '10', 'AKL', 'hadir', 'uploads/zia.png', '2024-06-29', '13:00:28', '14:38:35'),
(47, '1951772900', 'Suci Lestari', '10', 'AKL', 'hadir', 'uploads/pipit.jpeg', '2024-06-29', '13:01:09', '00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(11) NOT NULL,
  `no_kartu` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `no_kartu`, `nama_lengkap`, `kelas_id`, `jurusan_id`) VALUES
(8, '2854878696', 'Annisa Halimatus Sadiyah', 4, 7),
(9, '2875685192', 'Desty Rizqy Aulia', 4, 7),
(10, '2872577144', 'Fitria Rahmadani', 4, 7),
(11, '2859561720', 'Mutiara Aulia Putri Azahra', 4, 7),
(12, '2861582072', 'Nadea Maharani', 4, 7),
(13, '2873631688', 'Ocylia Putri Arsika', 4, 7),
(14, '2856720104', 'Shiva Almira Hasti', 4, 7),
(15, '1951772900', 'Suci Lestari', 4, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'siswa', 'siswa123', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_rekap`
--
ALTER TABLE `tbl_rekap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekap`
--
ALTER TABLE `tbl_rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
