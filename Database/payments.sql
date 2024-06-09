-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 01:44 PM
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
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `cusId` int(8) NOT NULL,
  `cusName` varchar(20) NOT NULL,
  `package` varchar(12) NOT NULL,
  `jan` varchar(9) NOT NULL,
  `feb` varchar(9) NOT NULL,
  `march` varchar(9) NOT NULL,
  `april` varchar(9) NOT NULL,
  `may` varchar(9) NOT NULL,
  `june` varchar(9) NOT NULL,
  `july` varchar(9) NOT NULL,
  `aug` varchar(9) NOT NULL,
  `sep` varchar(9) NOT NULL,
  `oct` varchar(9) NOT NULL,
  `nov` varchar(9) NOT NULL,
  `december` varchar(9) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`cusId`, `cusName`, `package`, `jan`, `feb`, `march`, `april`, `may`, `june`, `july`, `aug`, `sep`, `oct`, `nov`, `december`, `approval`) VALUES
(1, 'Januka Dharamarathne', 'silver', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(2, 'Chanupa Athsara', 'gold', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(3, 'Punsandali Nimsara', 'silver', '', '', '', '', '', '', '', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`cusId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `cusId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
