-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 11:47 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ms17`
--

-- --------------------------------------------------------

--
-- Table structure for table `nimekiri`
--

CREATE TABLE `nimekiri` (
  `id` int(3) NOT NULL,
  `EesNimi` varchar(30) NOT NULL,
  `PereNimi` varchar(30) NOT NULL,
  `id_code` char(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nimekiri`
--

INSERT INTO `nimekiri` (`id`, `EesNimi`, `PereNimi`, `id_code`, `time`) VALUES
(10, 'Anna', 'Laktionova', '48198239876', '2018-09-11 10:42:36'),
(12, 'Anna', 'Laktionova', '48198239346', '2018-09-11 11:02:07'),
(13, 'Anna', 'Laktionova', '48198245934', '2018-09-11 11:02:14'),
(17, 'Endel', 'Eesvarav', '32875764984', '2018-09-18 10:31:27'),
(18, 'Endel', 'Eesvarav', '32875764984', '2018-09-18 10:52:19'),
(19, 'Endel', 'Eesvarav', '32875764984', '2018-09-18 10:52:22'),
(20, 'Endel', 'Eesvarav', '32875764984', '2018-09-18 12:01:44'),
(21, 'Endel', 'Eesvarav', '32875764984', '2018-09-18 12:01:48'),
(22, 'Endel', 'Eesvarav', '32875764984', '2018-09-18 12:03:10'),
(23, 'Endel', 'Eesvarav', '32875764984', '2018-09-18 12:03:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nimekiri`
--
ALTER TABLE `nimekiri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nimekiri`
--
ALTER TABLE `nimekiri`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
