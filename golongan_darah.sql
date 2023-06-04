-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 04:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golongan_darah`
--

-- --------------------------------------------------------

--
-- Table structure for table `goldar`
--

CREATE TABLE `goldar` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `jumlah_total` int(10) NOT NULL,
  `persen_total` varchar(20) NOT NULL,
  `jumlah_laki` int(10) NOT NULL,
  `persen_laki` varchar(20) NOT NULL,
  `jumlah_perempuan` int(10) NOT NULL,
  `persen_perempuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goldar`
--

INSERT INTO `goldar` (`id`, `kategori_id`, `jumlah_total`, `persen_total`, `jumlah_laki`, `persen_laki`, `jumlah_perempuan`, `persen_perempuan`) VALUES
(1, 1, 2685, '34.02%', 1390, '17.61%', 1295, '16.41%'),
(2, 2, 569, '7.21%', 295, '3.74%', 274, '3.47%'),
(4, 3, 371, '4.70%', 178, '2.26%', 193, '2.45%'),
(5, 4, 315, '3.99%', 135, '1.71%', 180, '2.28%'),
(6, 5, 140, '1.77%', 74, '0.94%', 66, '0.84%'),
(7, 6, 19, '0.24%', 12, '0.15%', 7, '0.09%'),
(8, 7, 5, '0.06%', 2, '0.03%', 3, '0.04%'),
(9, 8, 5, '0.06%', 2, '0.03%', 3, '0.04%'),
(10, 9, 3, '0.04%', 3, '0.04%', 0, '0.00%'),
(11, 10, 2, '0.03%', 0, '0.00%', 2, '0.03%');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'TIDAK TAHU'),
(2, 'O'),
(3, 'B'),
(4, 'A'),
(5, 'AB'),
(6, 'A+'),
(7, 'O+'),
(8, 'B+'),
(9, 'AB+'),
(10, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(4, 'Dendra', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goldar`
--
ALTER TABLE `goldar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goldar`
--
ALTER TABLE `goldar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goldar`
--
ALTER TABLE `goldar`
  ADD CONSTRAINT `goldar_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
