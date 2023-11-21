-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 07:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `nama_anggaran` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id_anggaran`, `nama_anggaran`, `nominal`, `tgl_mulai`, `tgl_akhir`, `id_mhs`) VALUES
(31, 'November 2023', 4500000, '2023-11-01', '2023-11-30', 36),
(32, 'Desember 2023', 4000000, '2023-12-01', '2023-12-31', 37);

-- --------------------------------------------------------

--
-- Table structure for table `catatan_pengeluaran`
--

CREATE TABLE `catatan_pengeluaran` (
  `id_catatan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_anggaran` int(11) NOT NULL,
  `tgl_catatan` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catatan_pengeluaran`
--

INSERT INTO `catatan_pengeluaran` (`id_catatan`, `id_kategori`, `id_anggaran`, `tgl_catatan`, `nominal`, `keterangan`, `id_mhs`) VALUES
(11, 3, 31, '2023-11-19', 20000, 'nasi padang', 36),
(12, 4, 32, '2023-11-19', 30000, 'bensin', 37);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Makanan'),
(4, 'Transportasi'),
(6, 'Pendidikan'),
(7, 'Kesehatan'),
(8, 'Asuransi'),
(9, 'Olahraga'),
(10, 'Hiburan'),
(11, 'Belanja'),
(12, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama_mhs`, `username`, `password`, `no_hp`, `alamat`, `email`) VALUES
(36, 'Rizky Nurfadilah', 'kiki_dila', 'Kikicantik123', '081209891212', 'Nongsa', 'Kiki12@gmail.com'),
(37, 'Rudi Setiawan', 'setiawan', 'Rud090912', '087788990000', 'Nongsa', 'Rudi01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `nama_tagihan` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_due` date NOT NULL,
  `id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `nama_tagihan`, `nominal`, `tgl_due`, `id_mhs`) VALUES
(15, 'Wifi', 300000, '2023-12-01', 36),
(16, 'Air', 40000, '2023-12-20', 37);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id_anggaran`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `catatan_pengeluaran`
--
ALTER TABLE `catatan_pengeluaran`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_anggaran` (`id_anggaran`),
  ADD KEY `id_user` (`id_mhs`),
  ADD KEY `catatan_pengeluaran_ibfk_3` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `catatan_pengeluaran`
--
ALTER TABLE `catatan_pengeluaran`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD CONSTRAINT `anggaran_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`);

--
-- Constraints for table `catatan_pengeluaran`
--
ALTER TABLE `catatan_pengeluaran`
  ADD CONSTRAINT `catatan_pengeluaran_ibfk_2` FOREIGN KEY (`id_anggaran`) REFERENCES `anggaran` (`id_anggaran`),
  ADD CONSTRAINT `catatan_pengeluaran_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `catatan_pengeluaran_ibfk_4` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`);

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
