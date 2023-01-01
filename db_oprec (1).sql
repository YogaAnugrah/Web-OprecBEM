-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2022 pada 08.56
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
-- Database: `db_oprec`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `periode` varchar(40) NOT NULL,
  `nama_presiden` varchar(30) NOT NULL,
  `nama_kabinet` varchar(40) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `tgl_seleksi` date NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `status` enum('Aktif','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `periode`, `nama_presiden`, `nama_kabinet`, `tgl_pendaftaran`, `tgl_seleksi`, `tgl_pengumuman`, `status`) VALUES
(1, 'Periode 2021/2022', 'Muhammad Fadil Akbar', 'Ragam Aksi dan Karya (RAKSA)', '2021-09-03', '2021-09-20', '2021-09-24', 'Selesai'),
(2, 'Periode 2022/2023', 'Adil Dharma Wibowo Sadewa', 'Satuan Aksi Dekat Berwawasan (SADEWA)', '2022-08-28', '2022-09-18', '2022-09-27', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Ekonomi dan Bisnis'),
(2, 'Budidaya Tanaman Pangan'),
(3, 'Teknologi Pertanian'),
(4, 'Budidaya Tanaman Perkebunan'),
(5, 'Peternakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftar`
--

CREATE TABLE `tb_pendaftar` (
  `id_mhs` int(10) NOT NULL,
  `npm` char(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `skor` int(20) NOT NULL,
  `status` enum('Verifikasi','Lolos','Tidak Lolos') NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`id_mhs`, `npm`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `id_jurusan`, `id_prodi`, `berkas`, `skor`, `status`, `id_user`, `id_periode`) VALUES
(3, '20753054', 'kaisar', 'Laki-laki', '2002-01-01', 1, 50, '63a0815bde009.pdf', 82, 'Lolos', 61, 2),
(4, '20753043', 'andra', 'Laki-laki', '2002-01-01', 3, 60, '63a0828e36311.pdf', 0, 'Verifikasi', 64, 1),
(5, '20753077', 'elsa', 'Perempuan', '2001-01-01', 1, 48, '63a08328112dd.pdf', 0, 'Verifikasi', 65, 2),
(6, '20753046', 'dimas', 'Laki-laki', '2002-01-01', 1, 50, '63a08378430ed.pdf', 50, 'Tidak Lolos', 66, 2),
(8, '20753075', 'riski', 'Perempuan', '2002-01-01', 1, 33, '63a1bb5e7657a.pdf', 0, 'Verifikasi', 68, 2),
(9, '20753001', 'wahyu', 'Laki-laki', '2001-01-01', 1, 65, '63a1bc034eb2a.pdf', 0, 'Verifikasi', 69, 2),
(10, '20753002', 'romi', 'Perempuan', '2002-01-01', 1, 51, '63a1bc7bdf10f.pdf', 0, 'Verifikasi', 70, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `program_studi`, `id_jurusan`) VALUES
(33, 'S1 Terapan Pengelolaan Agribisnis', 1),
(34, 'S1 Terapan Akuntansi Bisnis Digital', 1),
(47, 'D3 Manajemen Informatika', 1),
(48, 'S1 Terapan Akuntansi Perpajakan', 1),
(49, 'S1 Terapan Agribisnis Pangan', 1),
(50, 'D3 Perjalanan Wisata', 1),
(51, 'S1 Terapan Pengelolaan Perhotelan', 1),
(52, 'D2 Administrasi Perpajakan', 1),
(55, 'D3 Produksi Tanaman Pangan', 2),
(56, 'D3 Hortikultura', 2),
(57, 'S1 Terapan Teknologi Perbenihan', 2),
(58, 'S1 Terapan Teknologi Produksi Tanaman Holtikultura', 2),
(59, 'D3 Teknik Sumberdaya Lahan dan Lingkungan', 3),
(60, 'D3 Mekaninsasi Pertanian', 3),
(61, 'D3 Teknologi Pangan', 3),
(62, 'S1 Terapan Teknologi Rekayasa Kimia Industri', 3),
(63, 'S1 Terapan Teknologi Rekayasa Konstruksi Jalan dan Jembatan', 3),
(64, 'S1 Terapan Pengembangan Produk Argoindustri', 3),
(65, 'D2 Pengolahan Patiseri', 3),
(66, 'D3 Produksi Tanaman Perkebunan', 4),
(67, 'S1 Terapan Produksi dan Manajemen Industri Perkebunan', 4),
(68, 'S1 Terapan Pengelolaan Perkebunan Kopi', 4),
(69, 'D3 Produksi Ternak', 5),
(70, 'D3 Budidaya Perikanan', 5),
(71, 'S1 Terapan Teknologi Produksi Ternak', 5),
(72, 'S1 Terapan Teknologi Pembenihan Ikan', 5),
(73, 'D3 Perikanan Tangkap', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Student','Admin','Supervisor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(61, 'kaisar', '$2y$10$o.WxmNufI8XoRAU0hHaJq.u2cG82vAEmfQYdQYg.SfJ3bzmBOPHd6', 'Student'),
(62, 'bunga', '$2y$10$FzQoasxhGvqUOImA5.8JdOEbKnVOo.tt1.SHK2PGqG13gGnAOLX8e', 'Admin'),
(63, 'yoga', '$2y$10$dOk5VNDmApA46Zxci5VGhOdrEuNu/DbwucZAEODHayMmsh0lBrTBm', 'Supervisor'),
(64, 'andra', '$2y$10$xSS1flcID7nEjq/598nO4.kCJCffPnP2ZPbEVuWVk96UboIZoLmQi', 'Student'),
(65, 'elsa', '$2y$10$DR2bNyfs3NCAp0k49DXr5.o8Ej1wjHj8O.BkdyeAawy34/qNi3KJq', 'Student'),
(66, 'dimas', '$2y$10$po5Rg39sraGZyZTc9hBUSOqx3WE/DYZzU44T4U6Nzaq2DqBCHd9Iq', 'Student'),
(67, 'bintang', '$2y$10$/KFCK0uDGcDt/t2pjtwSSOyJewPL4eWOYkfQMxKQMKOv3mR99y7Qi', 'Student'),
(68, 'riski', '$2y$10$wNXcnYUP.qi20bp.FNubIeC74zbHlC1FqokpcC3vvVowKspRMDcmK', 'Student'),
(69, 'wahyu', '$2y$10$tnvR7DlwzgSlAwf91asmHO7j.PLqe4zlLtB5bHGFUnER5QLLpWgvy', 'Student'),
(70, 'romi', '$2y$10$jZwlEF1XRPorff9rF8E7M.KZabhP1/5cXMBJzQPp1LCDwOOmz43FC', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  MODIFY `id_mhs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD CONSTRAINT `tb_pendaftar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tb_pendaftar_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `tb_pendaftar_ibfk_3` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`),
  ADD CONSTRAINT `tb_pendaftar_ibfk_4` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`);

--
-- Ketidakleluasaan untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD CONSTRAINT `tb_prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
