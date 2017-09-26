-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2017 at 04:29 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goindo_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `goindo_city`
--

CREATE TABLE `goindo_city` (
  `idCITY` int(11) NOT NULL,
  `idPROVINCE` int(11) NOT NULL,
  `nameCITY` varchar(255) NOT NULL,
  `statusCITY` int(1) NOT NULL,
  `createdateCITY` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateCITY` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_more_desc`
--

CREATE TABLE `goindo_more_desc` (
  `idDESC` int(11) NOT NULL,
  `idPROVINCE` int(11) NOT NULL,
  `titleDESC` varchar(255) NOT NULL,
  `moreDESC` varchar(255) NOT NULL,
  `createdateDESC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusDESC` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goindo_more_desc`
--

INSERT INTO `goindo_more_desc` (`idDESC`, `idPROVINCE`, `titleDESC`, `moreDESC`, `createdateDESC`, `statusDESC`) VALUES
(1, 4, 'Key Features', 'Kepulauan Riau is a highly attractive place for tourists and other travellers. On the main islands of Bintan and Batam, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:43:13', 1),
(2, 4, 'How to Get There', 'Kepulauan Riau is a highly attractive place for tourists and other travellers. On the main islands of Bintan and Batam, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:44:12', 1),
(3, 4, 'Attraction', 'Kepulauan Riau is a highly attractive place for tourists and other travellers. On the main islands of Bintan and Batam, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:51:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `goindo_province`
--

CREATE TABLE `goindo_province` (
  `idPROVINCE` int(11) NOT NULL,
  `namePROVINCE` varchar(255) NOT NULL,
  `populationPROVINCE` varchar(255) NOT NULL,
  `densityPROVINCE` varchar(255) NOT NULL,
  `areaPROVINCE` varchar(255) NOT NULL,
  `capitalPROVINCE` varchar(255) NOT NULL,
  `largestcityPROVINCE` varchar(255) NOT NULL,
  `descPROVINCE` text NOT NULL,
  `createdatePROVINCE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusPROVINCE` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goindo_province`
--

INSERT INTO `goindo_province` (`idPROVINCE`, `namePROVINCE`, `populationPROVINCE`, `densityPROVINCE`, `areaPROVINCE`, `capitalPROVINCE`, `largestcityPROVINCE`, `descPROVINCE`, `createdatePROVINCE`, `statusPROVINCE`) VALUES
(4, 'Kepulauan Riau', '1,500,000', '234M', '1,200M2', 'Tanjung Pinang', 'Batam', 'Comprised of over 3200 islands, Kepulauan Riau is one of the younger and smaller Indonesia provinces; being incorporated as the 32nd province in September 2002. It is an attractive destination for tourists and travellers with the wide range of choices of accomodations, food and touring, recreation and entertainment facilities and welcoming people.', '2017-09-24 02:09:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `goindo_users_admin`
--

CREATE TABLE `goindo_users_admin` (
  `idADMIN` int(11) NOT NULL,
  `emailADMIN` varchar(40) NOT NULL,
  `passwordADMIN` varchar(129) NOT NULL,
  `createdateADMIN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goindo_users_admin`
--

INSERT INTO `goindo_users_admin` (`idADMIN`, `emailADMIN`, `passwordADMIN`, `createdateADMIN`) VALUES
(1, 'admin@goindo.me', '83a00bab882e5f3b81d94961a4e936e03d88f1b045508bad447cc942f56019f79b32bbbfe135defa47589b8baa5cdd033d83bf59cf66a5fad111114ce0bfe5a3', '2017-08-21 13:33:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goindo_city`
--
ALTER TABLE `goindo_city`
  ADD PRIMARY KEY (`idCITY`);

--
-- Indexes for table `goindo_more_desc`
--
ALTER TABLE `goindo_more_desc`
  ADD PRIMARY KEY (`idDESC`);

--
-- Indexes for table `goindo_province`
--
ALTER TABLE `goindo_province`
  ADD PRIMARY KEY (`idPROVINCE`);

--
-- Indexes for table `goindo_users_admin`
--
ALTER TABLE `goindo_users_admin`
  ADD PRIMARY KEY (`idADMIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goindo_city`
--
ALTER TABLE `goindo_city`
  MODIFY `idCITY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `goindo_more_desc`
--
ALTER TABLE `goindo_more_desc`
  MODIFY `idDESC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `goindo_province`
--
ALTER TABLE `goindo_province`
  MODIFY `idPROVINCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `goindo_users_admin`
--
ALTER TABLE `goindo_users_admin`
  MODIFY `idADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
