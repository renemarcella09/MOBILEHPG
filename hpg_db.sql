-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2025 at 10:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `iduseraccounts` int(11) NOT NULL,
  `completename` varchar(100) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `Action` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`iduseraccounts`, `completename`, `username`, `password`, `role`, `Action`) VALUES
(13, 'RENE MARCELLA', 'admin', 'admin', 'Administrator', 'Administrator'),
(48, 'GENSAN HPG', 'GENSAN', '12345', 'Staff', NULL),
(49, 'NORTH COT HPG', 'NORTH COT', '12345', 'Staff', NULL),
(50, 'SARANGANI HPG', 'SARANGANI', '12345', 'Staff', NULL),
(47, 'SK HPG', 'SK', '12345', 'Staff', NULL),
(45, 'SOUTH COT HPG', 'SOUTH COT', '12345', 'Staff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vin`
--

CREATE TABLE `vin` (
  `Vinid` int(15) NOT NULL,
  `engine` varchar(30) NOT NULL,
  `chassis` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Rname` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vin`
--

INSERT INTO `vin` (`Vinid`, `engine`, `chassis`, `type`, `Rname`, `Address`) VALUES
(1, '4be1hf1234', '4cb2fg54672', 'truck', 'king marcella', 'sison bagumbayan sk'),
(2, '2ec2235647', 'qwssss9999', 'mc', 'prince marcella', 'sison bagumbayan sultan kudara'),
(3, 'sdfhgzjgz', 'gzzfhjzj', 'mc', 'hhh', 'sison bag'),
(4, '2cccc', 'nnggggg', 'mv', 'rene', 'bagumbayan'),
(5, 'ddfff', 'FFGGFGGG', 'MV', 'LOCAS', 'isulan'),
(6, '3334RERER', 'GFG54666', 'P-UP', 'TRGFJJJJJF', 'TACURONG'),
(7, 'EEEEEEEEEfffff', 'CCCCCCCC', 'CAR', 'MONKEY', 'FOREST'),
(8, 'yytyytyyt', 'rrrrrrrrrrr', 'mc', 'pato', 'maguindanao'),
(9, 'LLLLLLLL', 'GGGGGGG', 'UV', 'MICHAEL', 'KORONADAL'),
(10, '4BE1BC23456', '4BCCC3241BE443', 'TRUCK', 'TOTOY BIBO', 'NORTH COTABATO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `iduseraccounts_UNIQUE` (`iduseraccounts`);

--
-- Indexes for table `vin`
--
ALTER TABLE `vin`
  ADD PRIMARY KEY (`Vinid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `iduseraccounts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `vin`
--
ALTER TABLE `vin`
  MODIFY `Vinid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
