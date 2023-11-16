-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 04:37 PM
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
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id_anggaran`, `nama_anggaran`, `nominal`, `tgl_mulai`, `tgl_akhir`) VALUES
(28, 'November 2023', 1000000, '2023-11-09', '2023-11-23');

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
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catatan_pengeluaran`
--

INSERT INTO `catatan_pengeluaran` (`id_catatan`, `id_kategori`, `id_anggaran`, `tgl_catatan`, `nominal`, `keterangan`, `id_user`) VALUES
(6, 3, 28, '2023-11-16', 10000, 'makann', 24);

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
(4, 'Transportasi');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `nama_tagihan` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `nama_tagihan`, `nominal`, `tgl_due`) VALUES
(1, 'wifi ', 300000, '2023-12-05'),
(12, 'air', 98000, '2023-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `no_hp`, `alamat`, `email`) VALUES
(19, 'asdas', 'asda', '$2y$10$a4O50oliq8IgeEXMcj.g2us8IqxSN7wgcXNpIu6YptbjsyFUhrT/i', 1231231, 'asda', 'mabruralmutaqi@gmail.com'),
(20, 'qwe', 'qwe', '$2y$10$VmO3sqtlfGukDFavC6qG8.7OXXOipSVBGc95Yz.pzaNNuoTUk7TZu', 1231231, 'batam', 'mabruralmutaqi@gmail.com'),
(21, 'Mabrur', 'mabrur123', '$2y$10$Dvvjpfsx4HwHGVm1zZYiLulfRroMlsfWqsX.lkdQc.quxLgvpcFsy', 2147483647, 'Sekupang', 'mabruralmutaqi@gmail.com'),
(22, 'Shahrizal', 'rizal26', '$2y$10$0553Wp1.PXyXj8SSy0OTC.gpmFcp9ZvrDTy9WcSdenq0C7UdS1pvK', 2147483647, 'Taman Sari', 'shahrizal71531@gmail.com'),
(23, 'Rizqi Fadhila', 'kix', '$2y$10$4lueUGqP2CyIfgeTxUhX9ef2.oXYwdstN75zSgBD14VGfps7fFF/2', 2147483647, 'Belian', 'rizqi.4342311004@students.polibatam.ac.id'),
(24, 'admin', 'admin', '$2y$10$vh0/ZLrKrHSms1dGrYF0buM1QQe3aYBjsFcwq8qjiyMFVIByGU7L.', 2147483647, 'kokslhfkhsk', '2shkjdhfkshkhdf@gmail.com'),
(25, '234234', '23423423', '$2y$10$nEeJYejhFxsJeTUjp/kv/.IcSdKwJ/tlHjcEIYUHtAVfRDRaj3HQ2', 123123123, '1231231', '2231231231@GMAIL.COM'),
(26, 'zxc', 'zxc', '$2y$10$59/tvkbvw73gSRhn56lizO3wlBYxYZrbzyaWFey/W6Wl3wc6Q4vne', 21312, 'zxczxc', 'das@gmail.com'),
(27, 'kiki', 'kiki11', '$2y$10$WuiUfnDhixksteMRJxTjk.TxZhc5DsjjbsfIO9iT8RerAJi1Y7pk2', 1231231, 'asda', 'mabruralmutaqi@gmail.com'),
(28, 'qqq', 'qqq', '$2y$10$jM4GjqodeE7ExfJejAmAoeq3vgWxUYJe9GZApJs/RD86St7zpZ5uW', 1231231, 'batam', 'mabruralmutaqi@gmail.com'),
(29, 'aska', 'aska', '$2y$10$yOXgMfpFJoKdkUbAwww7zuu8vR2NWtgljBKORHTJxpYKUXRw85MZW', 1321323, 'sekupang', 'mabruralmutaqi@gmail.com'),
(30, 'azx', 'azx', '$2y$10$7dmpnMBpJL6QP.dhafe7ju.r7G9ssM/2qxChWclLDXFHW.OhjKv1m', 1231231, 'Sekupang', 'mabruralmutaqi@gmail.com'),
(31, 'zzz', 'zzz', '$2y$10$zPScH4ySXuqkqU81G5JIKOEFF4YtSdVW9WU9lKiHC3yvpw4jHTIta', 2147483647, 'Sekupang', 'mabruralmutaqi@gmail.com'),
(32, 'nnn', 'nnn', '$2y$10$KWUZNbCdTHn.oHj1oMV3POeaVUW46Mu0xwMKZ0P60BClVy.fH8B6e', 2147483647, 'Sekupang', 'mabruralmutaqi@gmail.com'),
(33, 'www', 'www', '$2y$10$FUQke6uDlzMJe3NikKf94uIN8VumQoDn0LJQJoBQn3VuEo8v/.XLq', 2147483647, 'Batam Center', 'mabruralmutaqi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `catatan_pengeluaran`
--
ALTER TABLE `catatan_pengeluaran`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_anggaran` (`id_anggaran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `catatan_pengeluaran_ibfk_3` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `catatan_pengeluaran`
--
ALTER TABLE `catatan_pengeluaran`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan_pengeluaran`
--
ALTER TABLE `catatan_pengeluaran`
  ADD CONSTRAINT `catatan_pengeluaran_ibfk_2` FOREIGN KEY (`id_anggaran`) REFERENCES `anggaran` (`id_anggaran`),
  ADD CONSTRAINT `catatan_pengeluaran_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `catatan_pengeluaran_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
