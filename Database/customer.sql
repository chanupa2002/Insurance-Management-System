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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusId` int(8) NOT NULL,
  `cusName` varchar(20) NOT NULL,
  `cusEmail` varchar(40) NOT NULL,
  `cusMobile` int(10) NOT NULL,
  `cusDob` date NOT NULL,
  `cusAddress` varchar(200) NOT NULL,
  `cusGender` varchar(6) NOT NULL,
  `package` varchar(12) NOT NULL,
  `profilePicture` varchar(150) NOT NULL,
  `agreementPdf` varchar(150) NOT NULL,
  `password` varchar(20) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusId`, `cusName`, `cusEmail`, `cusMobile`, `cusDob`, `cusAddress`, `cusGender`, `package`, `profilePicture`, `agreementPdf`, `password`, `approval`) VALUES
(1, 'Januka Dharamarathne', 'januka123@gmail.com', 706070655, '2024-05-15', 'Kandy rd,Malabe', 'male', 'silver', '[\"663dfbe898475.jpg\"]', '[\"663dfbe899a2f.pdf\"]', 'Januka123#', 1),
(2, 'Chanupa Athsara', 'athsara141@gmail.com', 766992183, '2024-05-02', '49/3, Weliveriya west, Weliveriya', 'male', 'gold', '[\"663e074f79f58.jpg\"]', '[\"663e074f7a67f.pdf\"]', 'Athsara@123', 1),
(3, 'Punsandali Nimsara', 'punsandali@gmail.com', 778907891, '2024-05-05', 'No. 34/B, Ganahena, Unawatuna', 'female', 'silver', '[\"663e07e6c885b.jpg\"]', '[\"663e07e6c8c83.pdf\"]', 'Punsandali@123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cusId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
