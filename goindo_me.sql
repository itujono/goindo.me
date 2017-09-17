-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 03:17 PM
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
-- Table structure for table `goindo_island`
--

CREATE TABLE `goindo_island` (
  `idISLAND` int(11) NOT NULL,
  `nameISLAND` varchar(255) NOT NULL,
  `populationISLAND` varchar(255) NOT NULL,
  `densityISLAND` varchar(255) NOT NULL,
  `areaISLAND` varchar(255) NOT NULL,
  `capitalISLAND` varchar(255) NOT NULL,
  `largestcityISLAND` varchar(255) NOT NULL,
  `descISLAND` text NOT NULL,
  `createdateISLAND` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusISLAND` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goindo_island`
--

INSERT INTO `goindo_island` (`idISLAND`, `nameISLAND`, `populationISLAND`, `densityISLAND`, `areaISLAND`, `capitalISLAND`, `largestcityISLAND`, `descISLAND`, `createdateISLAND`, `statusISLAND`) VALUES
(1, 'Kepulauan Riau', '1,500,000', '521 / km2', '1,801 km2', 'Tanjung Pinang', 'Batam', 'Comprised of over 3200 islands, Kepulauan Riau, Riau Islands, or Riau Archipelago is one of the younger and smaller Indonesia provinces; being incorporated as the 32nd province in September 2002. It is an attractive destination for tourists and travellers with the wide range of choices of accomodations, food and touring, recreation and entertainment facilities and welcoming people. Just a quick 40 minute ferry trip from Singapore, the two main islands of Bintan and Batam offer tourists a wide range of activities...', '2017-09-17 11:32:28', 1),
(3, 'Makasar', '500,000', '400 / km2', '1992 km2', 'Sulawesi Tenggara', 'Kendari', 'Comprised of over 3200 islands, Makasar is one of the younger and smaller Indonesia provinces; being incorporated as the 32nd province in September 2002. It is an attractive destination for tourists and travellers with the wide range of choices of accomodations, food and touring, recreation and entertainment facilities and welcoming people.', '2017-09-17 12:58:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `goindo_more_desc`
--

CREATE TABLE `goindo_more_desc` (
  `idDESC` int(11) NOT NULL,
  `idISLAND` int(11) NOT NULL,
  `titleDESC` varchar(255) NOT NULL,
  `moreDESC` varchar(255) NOT NULL,
  `createdateDESC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusDESC` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goindo_more_desc`
--

INSERT INTO `goindo_more_desc` (`idDESC`, `idISLAND`, `titleDESC`, `moreDESC`, `createdateDESC`, `statusDESC`) VALUES
(1, 1, 'Key Features', 'Kepulauan Riau is a highly attractive place for tourists and other travellers. On the main islands of Bintan and Batam, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:43:13', 1),
(2, 1, 'How to Get There', 'Kepulauan Riau is a highly attractive place for tourists and other travellers. On the main islands of Bintan and Batam, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:44:12', 1),
(3, 1, 'Attraction', 'Kepulauan Riau is a highly attractive place for tourists and other travellers. On the main islands of Bintan and Batam, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:51:33', 1),
(4, 1, 'Facility', 'Kepulauan Riau is a highly attractive place for tourists and other travellers. On the main islands of Bintan and Batam, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:52:01', 1),
(5, 3, 'Key Features', 'Makasar is a highly attractive place for tourists and other travellers. On the main islands of Sulawesi Tenggara, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:58:44', 1),
(6, 3, 'How to Get There', 'Makasar is a highly attractive place for tourists and other travellers. On the main islands of Sulawesi Tenggara, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:59:01', 1),
(7, 3, 'Attraction', 'Makasar is a highly attractive place for tourists and other travellers. On the main islands of Sulawesi Tenggara, there is a wealth of excellent hotels and resorts, shopping malls full of bargains, a vast array of restaurants, cafes...', '2017-09-17 12:59:22', 1);

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
-- Indexes for table `goindo_island`
--
ALTER TABLE `goindo_island`
  ADD PRIMARY KEY (`idISLAND`);

--
-- Indexes for table `goindo_more_desc`
--
ALTER TABLE `goindo_more_desc`
  ADD PRIMARY KEY (`idDESC`);

--
-- Indexes for table `goindo_users_admin`
--
ALTER TABLE `goindo_users_admin`
  ADD PRIMARY KEY (`idADMIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goindo_island`
--
ALTER TABLE `goindo_island`
  MODIFY `idISLAND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `goindo_more_desc`
--
ALTER TABLE `goindo_more_desc`
  MODIFY `idDESC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `goindo_users_admin`
--
ALTER TABLE `goindo_users_admin`
  MODIFY `idADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
