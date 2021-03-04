-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 09:50 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sy_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `Id` int(11) NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Total pay` text NOT NULL,
  `User_Id` varchar(255) DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_checkout`
--

INSERT INTO `tb_checkout` (`Id`, `SKU`, `Quantity`, `Price`, `Total pay`, `User_Id`, `Address`, `Username`, `tel`) VALUES
(10, 'Bag', '50', '50', '', '', '', '', ''),
(11, 'Bag', '50', '50', '', '', '', '', ''),
(12, 'Table', '150', '155', '', '', '', '', ''),
(13, 'Bag', '50', '50', '2500', 'us2', '', '', ''),
(14, 'Bag', '50', '50', '2500', 'us2', '', '', 'd'),
(15, 'Bag', '50', '50', '2500', 'us2', '', '', ''),
(16, 'Bag', '50', '50', '2500', 'us2', 'd', '', ''),
(17, 'Bag', '50', '50', '2500', 'us2', 'd', '', '012'),
(18, 'Bag', '50', '50', '2500', 'us2', 'f', '', 'f'),
(19, 'Bag', '50', '50', '2500', '', 'f', '', 'f'),
(20, 'Pencil', '20', '1', '20', 'us2', 'd', '', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE `tb_item` (
  `Id` int(11) NOT NULL,
  `Picture` varchar(400) NOT NULL,
  `SKU` varchar(250) NOT NULL,
  `Quantity` varchar(250) NOT NULL,
  `Price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`Id`, `Picture`, `SKU`, `Quantity`, `Price`) VALUES
(1, 'Picture/20190822035525.jpg', 'Bag', '50', '50'),
(2, 'Picture/20190822035629.jpg', 'Table', '150', '155'),
(3, 'Picture/20190822035634.jpg', 'Pencil', '20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Permission` varchar(255) NOT NULL,
  `User_Id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`Id`, `Username`, `Password`, `Permission`, `User_Id`) VALUES
(1, 'h', 'h', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
