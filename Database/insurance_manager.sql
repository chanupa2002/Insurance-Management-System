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
-- Table structure for table `insurance_manager`
--

CREATE TABLE `insurance_manager` (
  `managerId` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `startDate` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilePicture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance_manager`
--

INSERT INTO `insurance_manager` (`managerId`, `name`, `email`, `mobile`, `address`, `startDate`, `password`, `profilePicture`) VALUES
(7, 'Manuri Kosgallana', 'manuri@gmail.com', 772535274, 'Ganahena\r\nUnawatuna', '2024-05-08', 'manuri123#', '[\"663def97588bb.jpg\"]'),
(8, 'Saman Silva', 'saman@gmail.com', 7645789, 'Galle rd,Galle', '2024-05-02', 'Saman', '[\"663df792e2793.jpg\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insurance_manager`
--
ALTER TABLE `insurance_manager`
  ADD PRIMARY KEY (`managerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insurance_manager`
--
ALTER TABLE `insurance_manager`
  MODIFY `managerId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
