-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 06:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grand_kenari`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `idfasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`idfasilitas`, `nama_fasilitas`) VALUES
(1, 'Wifi'),
(2, 'kipas angin'),
(3, 'kursi dan meja'),
(4, 'AC 1 PK'),
(5, 'closet jongkok'),
(6, 'single bed 150x200'),
(7, 'single bed 160x200'),
(8, 'lemari set'),
(9, 'exhaust fan'),
(10, 'wastafel'),
(11, 'full kaca'),
(12, 'water heater'),
(13, 'sofa'),
(14, 'breakfast'),
(15, 'latex single bed 180x200'),
(16, 'double bed 120x200'),
(17, 'closet duduk'),
(18, 'TV LED 40\"'),
(19, 'TV LED 24\"'),
(20, 'bath hub'),
(21, 'TV LED 32 inch'),
(24, 'AC 1/2 PK'),
(25, 'Single Bed 120 x 200');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_umu`
--

CREATE TABLE `fasilitas_umu` (
  `idf_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `idkamar` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`idkamar`, `tipe`, `jumlah`, `harga`, `gambar`) VALUES
(2, 'Vvip', 12, 380000, 'Vvip.jpeg'),
(4, 'Vip', 10, 350000, 'Vip.jpeg'),
(5, 'EXECUTIVE', 10, 295000, 'Executive.jpeg'),
(6, 'Suite', 10, 275000, 'Suite.jpeg'),
(7, 'Deluxe A', 10, 250000, 'DeluxeA.jpeg'),
(8, 'Deluxe B', 10, 210000, 'Deluxeb.jpeg'),
(9, 'Standar A', 10, 175000, 'standrA.jpeg'),
(10, 'Standar B', 10, 155000, 'standarB.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar_fasilitas`
--

CREATE TABLE `kamar_fasilitas` (
  `idkamar` int(11) NOT NULL,
  `idfasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kamar_fasilitas`
--

INSERT INTO `kamar_fasilitas` (`idkamar`, `idfasilitas`) VALUES
(2, 3),
(2, 8),
(2, 10),
(2, 13),
(2, 15),
(2, 17),
(2, 18),
(2, 20),
(4, 3),
(4, 4),
(4, 8),
(4, 10),
(4, 11),
(4, 12),
(4, 14),
(4, 15),
(4, 17),
(4, 18),
(4, 20),
(5, 3),
(5, 4),
(5, 8),
(5, 10),
(5, 16),
(5, 17),
(5, 21),
(6, 3),
(6, 4),
(6, 7),
(6, 8),
(6, 10),
(6, 11),
(6, 17),
(6, 21),
(7, 3),
(7, 4),
(7, 7),
(7, 8),
(7, 10),
(7, 17),
(7, 21),
(8, 3),
(8, 5),
(8, 7),
(8, 19),
(8, 24),
(9, 2),
(9, 3),
(9, 5),
(9, 6),
(9, 9),
(9, 19),
(10, 2),
(10, 5),
(10, 9),
(10, 25);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `norek` varchar(15) NOT NULL,
  `namarek` varchar(50) NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpesan` int(11) NOT NULL,
  `tglpesan` datetime NOT NULL,
  `batasbayar` datetime NOT NULL,
  `idkamar` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idtamu` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tglmasuk` date NOT NULL,
  `tglkeluar` date NOT NULL,
  `lamahari` int(11) DEFAULT 0,
  `totalbayar` int(11) DEFAULT 0,
  `status` varchar(50) DEFAULT 'Pending...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idreview` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pesanuser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stokkamar`
--

CREATE TABLE `stokkamar` (
  `idkamar` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stokkamar`
--

INSERT INTO `stokkamar` (`idkamar`, `tipe`, `stok`) VALUES
(2, 'Vvip', 12),
(4, 'Vip', 10),
(5, 'EXECUTIVE', 10),
(6, 'Suite', 10),
(7, 'Deluxe A', 10),
(8, 'Deluxe B', 10),
(9, 'Standar A', 10),
(10, 'Standar B', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama_lengkap`, `email`, `username`, `password`, `nomor_hp`, `alamat`, `role`, `created_at`) VALUES
(1, 'admin', '', 'admin', '$2y$10$xXfgV9xcziwstaGZ7wVMR.008JDL1AGVyselGni/89EEJKIFCo3Ze', '', '', 'admin', '2024-11-09 15:07:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`idfasilitas`);

--
-- Indexes for table `fasilitas_umu`
--
ALTER TABLE `fasilitas_umu`
  ADD PRIMARY KEY (`idf_fasilitas`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indexes for table `kamar_fasilitas`
--
ALTER TABLE `kamar_fasilitas`
  ADD PRIMARY KEY (`idkamar`,`idfasilitas`),
  ADD KEY `fk_fasilitas` (`idfasilitas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpesan`),
  ADD KEY `fk_pemesanan_kamar` (`idkamar`),
  ADD KEY `fk_pemesanan_user` (`idtamu`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idreview`),
  ADD KEY `fk_review_user` (`iduser`);

--
-- Indexes for table `stokkamar`
--
ALTER TABLE `stokkamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `idfasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `fasilitas_umu`
--
ALTER TABLE `fasilitas_umu`
  MODIFY `idf_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `idkamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `idreview` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kamar_fasilitas`
--
ALTER TABLE `kamar_fasilitas`
  ADD CONSTRAINT `fk_fasilitas` FOREIGN KEY (`idfasilitas`) REFERENCES `fasilitas` (`idfasilitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kamar` FOREIGN KEY (`idkamar`) REFERENCES `kamar` (`idkamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_pemesanan` FOREIGN KEY (`idpesan`) REFERENCES `pemesanan` (`idpesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_kamar` FOREIGN KEY (`idkamar`) REFERENCES `kamar` (`idkamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pemesanan_user` FOREIGN KEY (`idtamu`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`iduser`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stokkamar`
--
ALTER TABLE `stokkamar`
  ADD CONSTRAINT `fk_stok_kamar` FOREIGN KEY (`idkamar`) REFERENCES `kamar` (`idkamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
