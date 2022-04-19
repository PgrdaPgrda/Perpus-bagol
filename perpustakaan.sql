-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2022 pada 02.48
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `ID` int(4) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Kelas` varchar(10) NOT NULL,
  `No_tlp` char(25) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`ID`, `Nama`, `Kelas`, `No_tlp`, `Alamat`) VALUES
(5321, 'Gopal', 'DKV', '085734567834', 'jl.Tukad Musi'),
(5322, 'Bhargo', 'RPL', '081212345678', 'jl.Tukad Badung'),
(5344, 'Galuh', 'MM', '082312345670', 'jl.Tukad Batanghari'),
(5346, 'Gek Risma', 'RPL', '085912345678', 'jl.Tukad Citarum'),
(5348, 'Amara', 'ANIMASI', '082312345437', 'jl.Tukad Yeh Aya'),
(5349, 'Rifaldo', 'TKJ', '082312344329', 'jl.Tukad Saba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `No` int(11) NOT NULL,
  `Judul` varchar(50) NOT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `Jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`No`, `Judul`, `Pengarang`, `Jenis`) VALUES
(3401, 'Dasar Logika Program Komputer', 'Abdul Kadir', 'pemrograman'),
(3402, 'Python untuk Programmer Pemula', 'Jubilee Enterprice', 'pemrograman'),
(3403, 'Buku Sakti Pemrograman Web', 'Dididk Setiawan', 'pemrograman'),
(3404, 'Teknik menjadi Teknisi Komputer', 'Ahmad Yani', 'Teknik Komputer'),
(3405, 'Teknologi Layanan Jaringan', 'Patwiyanto', 'Teknik Komputer'),
(3406, 'Administrasi Sistem Jaringan', 'Sri Wahyuni', 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `ID` int(4) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Bagian` varchar(50) NOT NULL,
  `No_tlp` char(13) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`ID`, `Nama`, `Bagian`, `No_tlp`, `Alamat`) VALUES
(2111, 'Rusmini', 'Kepala Perpustakaan', '085912345654', 'jl.Tukad Sari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `No` int(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `ID_anggota` char(4) NOT NULL,
  `No_buku` char(4) NOT NULL,
  `Tgl_pinjam` date NOT NULL DEFAULT current_timestamp(),
  `Tgl_kembali` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`No`, `Nama`, `ID_anggota`, `No_buku`, `Tgl_pinjam`, `Tgl_kembali`) VALUES
(1, 'Gek Risma', '5346', '3405', '2022-04-11', '2022-04-14'),
(2, 'Galuh', '5344', '3403', '2022-04-13', '2022-04-16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`No`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
