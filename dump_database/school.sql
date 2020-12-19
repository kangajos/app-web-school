-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2020 at 05:12 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `absensi_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `absensi` char(1) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`absensi_id`, `jadwal_id`, `kelas_id`, `mapel_id`, `siswa_id`, `absensi`, `message`, `status`, `created_at`, `created_by`) VALUES
(1, 4, 1, 4, 1, 'H', NULL, NULL, '2020-01-16 12:28:39', 'admin'),
(2, 4, 1, 4, 2, 'H', NULL, NULL, '2020-01-16 12:28:39', 'admin'),
(3, 5, 1, 5, 1, 'I', NULL, NULL, '2020-01-17 19:01:58', 'admin'),
(4, 5, 1, 5, 2, 'H', NULL, NULL, '2020-01-17 19:01:59', 'admin'),
(5, 5, 1, 5, 3, 'H', NULL, NULL, '2020-01-17 19:01:59', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jk` char(1) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `nama_guru`, `nip`, `jk`, `no_hp`, `alamat`, `is_active`) VALUES
(1, 'Boy Pangabean S.Kom', '5566332211', 'L', '083191408349', 'Jalan Padang bulan Medan ', 1),
(2, 'Daniel Sinaga S.Pd, S.Kom,M.Kom', '109900', 'L', '085732126690', 'Jalan Kelambir V blok 17', 1),
(3, 'Nursyafitri Chaniago Hasibuan S.Pd,M.Pd', '332210', 'P', '085270034022', 'Jalan Setia Abadi Tu Selamat', 1),
(4, 'Reynhard Sinaga S.H,M.H S.Kom,M.Kom', '00845', 'L', '082212558878', 'Jalan Helvetia by pass', 1),
(5, 'Sri Wahyuni Hasibuan S.Si,M.Si', '1299', 'P', '085355114455', 'Jalan Sei Mencirim No 12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `hari` char(10) NOT NULL,
  `awal` time NOT NULL,
  `akhir` time NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `kelas_id`, `mapel_id`, `guru_id`, `hari`, `awal`, `akhir`, `is_active`) VALUES
(1, 1, 1, 1, 'Senin', '07:00:00', '09:00:00', 1),
(2, 1, 2, 1, 'Selasa', '07:05:00', '09:05:00', 1),
(3, 1, 3, 1, 'Rabu', '07:30:00', '09:15:00', 1),
(4, 1, 4, 1, 'Kamis', '07:00:00', '09:00:00', 1),
(5, 1, 5, 1, 'Jumat', '08:00:00', '09:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kode_kelas` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kode_kelas`, `nama_kelas`, `is_active`) VALUES
(1, '1A', 'I', 1),
(2, '2A', 'II', 1),
(3, '3A', 'III', 1),
(4, '4A', 'IV', 1),
(5, '5A', 'V', 1),
(6, '6A', 'VI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(11) NOT NULL,
  `kode_mapel` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `kode_mapel`, `nama_mapel`, `is_active`) VALUES
(1, 'MM', 'Matematika', 1),
(2, 'Indo', 'Bahasa Indonesia ', 1),
(3, 'BING', 'Bahasa Inggris', 1),
(4, 'TIK', 'Teknologi Informasi Komunikasi', 1),
(5, 'IPS', 'Ilmu Pengetahuan Sosial', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `kelas_id`, `nis`, `nama`, `jk`, `no_hp`, `alamat`, `username`, `password`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, '1212', 'Geofani Cristoper Sinaga', 'L', '083191408349', 'Jalan kamboja IV NO 68 HELVETIA ', 'geosinaga', '$2y$10$AZWs4gj65Txxckg80pQvJeOa/6snLvpAjofl9LsxgsUlP/DwfKKtO', '2020-01-16', '2020-01-15 23:52:19', 1),
(2, 1, '443328', 'agus salim', '', '081324275549', 'Jakarta Pusat', 'agus', '$2y$10$1QFJC8l05wljKRQFiUESb.qKmq.UlY15X2OFnfDZdmLOAfbw7KXgy', '2020-01-16', '2020-01-16 04:55:16', 1),
(3, 1, '9908', 'Dewi Azizah', 'P', '083191408349', 'Jalan Sukamaju indah Tahap 12', 'dewiazizah', '$2y$10$ojx6t.GGzUozMRFTzPazWuip11g7.8lkXEYxWytzE5zSxyL4Ekir2', '2020-01-16', '2020-01-16 05:39:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `spp_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`spp_id`, `siswa_id`, `jumlah`, `catatan`, `created_at`, `created_by`) VALUES
(1, 1, 75000, 'Pembayaran spp bulan januari Lunas', '2020-01-16 11:52:47', 'admin'),
(2, 3, 1000000, 'Pembayaran spp bulan November dan desember 2019 belum dibayar!!!  Harap segera melunasi spp anda... ', '2020-01-16 12:46:49', 'admin'),
(3, 2, 540000, 'Harap segera bayar spp bulan Januari 2020.', '2020-01-16 12:47:41', 'admin'),
(4, 2, 150000, 'bayar spp', '2020-01-17 18:56:45', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `full_name`, `password`, `created_at`) VALUES
(1, 'admin', 'Super Admin', '$2y$10$wA8j.87pWXef7rlWzYxdsej/MBoTBjAc4hCwDR03MwLAnXHpEGTEq', '2020-01-11 08:23:09'),
(2, 'ajos', 'Ajos', '$2y$10$I0cql.jceQxz62PodNpl5OP0emf2E1VNkWb0xKJdtswdKyKFlGWDa', '2020-01-11 08:49:48'),
(3, 'dewi', 'Dewi Azizah', '$2y$10$etRtFUYk30Cn70YogJ2K.u.vnpOzjB4/poGQj3uDriMOenSnbPzma', '2020-01-16 00:14:40'),
(4, 'andre', 'andre', '$2y$10$zzU6nIBynbliq7TO6NhWb.2SxYcyxUjzEDbdBFgp7xk3ca48i.sWm', '2020-01-16 00:17:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`spp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `absensi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `spp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
