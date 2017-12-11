-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 12:01 PM
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
-- Table structure for table `goindo_area`
--

CREATE TABLE `goindo_area` (
  `idAREA` int(11) NOT NULL,
  `idCITY` int(11) NOT NULL,
  `nameAREA` varchar(70) NOT NULL,
  `createdateAREA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateAREA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusAREA` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_article_area`
--

CREATE TABLE `goindo_article_area` (
  `idARTICLEAREA` int(11) NOT NULL,
  `idAREA` int(11) NOT NULL,
  `top10citiesARTICLEAREA` int(1) NOT NULL,
  `placetovisitARTICLEAREA` int(1) NOT NULL,
  `thingstoseeARTICLEAREA` int(1) NOT NULL,
  `titleARTICLEAREA` varchar(255) NOT NULL,
  `descARTICLEAREA` text NOT NULL,
  `createdateARTICLEAREA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateARTICLEAREA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusARTICLEAREA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_article_beatentrack`
--

CREATE TABLE `goindo_article_beatentrack` (
  `idARTICLEBEATEN` int(11) NOT NULL,
  `titleARTICLEBEATEN` varchar(150) NOT NULL,
  `idPROVINCE` int(11) NOT NULL,
  `idCITY` int(11) NOT NULL,
  `descARTICLEBEATEN` text NOT NULL,
  `createdateARTICLEBEATEN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateARTICLEBEATEN` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusARTICLEBEATEN` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_article_city`
--

CREATE TABLE `goindo_article_city` (
  `idARTICLECITY` int(11) NOT NULL,
  `idCITY` int(11) NOT NULL,
  `top10citiesARTICLECITY` int(1) NOT NULL,
  `majorcitiesARTICLECITY` int(1) NOT NULL,
  `placetovisitARTICLECITY` int(1) NOT NULL,
  `thingstoseeARTICLECITY` int(1) NOT NULL,
  `titleARTICLECITY` varchar(255) NOT NULL,
  `descARTICLECITY` text NOT NULL,
  `createdateARTICLECITY` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateARTICLECITY` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusARTICLECITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_article_navigation_city`
--

CREATE TABLE `goindo_article_navigation_city` (
  `idARTICLENAVCITY` int(11) NOT NULL,
  `idNAVCITY` int(11) NOT NULL,
  `titleARTICLENAVCITY` varchar(255) NOT NULL,
  `descARTICLENAVCITY` text NOT NULL,
  `createdateARTICLENAVCITY` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateARTICLENAVCITY` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusARTICLENAVCITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_article_provinces`
--

CREATE TABLE `goindo_article_provinces` (
  `idARTICLEPROV` int(11) NOT NULL,
  `idPROVINCE` int(11) NOT NULL,
  `titleARTICLEPROV` varchar(120) NOT NULL,
  `descARTICLEPROV` text NOT NULL,
  `statisticARTICLEPROV` varchar(120) NOT NULL,
  `interactiveARTICLEPROV` varchar(120) NOT NULL,
  `createdateARTICLEPROV` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateARTICLEPROV` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusARTICLEPROV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_article_top10_destinations`
--

CREATE TABLE `goindo_article_top10_destinations` (
  `idARTICLETOP10DESTI` int(11) NOT NULL,
  `categoryARTICLETOP10DESTI` varchar(80) NOT NULL,
  `titleARTICLETOP10DESTI` varchar(255) NOT NULL,
  `descARTICLETOP10DESTI` text NOT NULL,
  `createdateARTICLETOP10DESTI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateARTICLETOP10DESTI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusARTICLETOP10DESTI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_banner`
--

CREATE TABLE `goindo_banner` (
  `idBANNER` int(11) NOT NULL,
  `idCLIENT` int(11) NOT NULL,
  `nameBANNER` varchar(120) NOT NULL,
  `linkBANNER` varchar(255) NOT NULL,
  `hitsBANNER` int(11) NOT NULL,
  `positionBANNER` int(1) NOT NULL,
  `createdateBANNER` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateBANNER` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusBANNER` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_city`
--

CREATE TABLE `goindo_city` (
  `idCITY` int(11) NOT NULL,
  `idPROVINCE` int(11) NOT NULL,
  `nameCITY` varchar(70) NOT NULL,
  `createdateCITY` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateCITY` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusCITY` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_client_banner`
--

CREATE TABLE `goindo_client_banner` (
  `idCLIENT` int(11) NOT NULL,
  `nameCLIENT` varchar(120) NOT NULL,
  `telpCLIENT` varchar(16) NOT NULL,
  `addressCLIENT` varchar(180) NOT NULL,
  `createdateCLIENT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateCLIENT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusCLIENT` int(1) NOT NULL
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
-- Table structure for table `goindo_navcity`
--

CREATE TABLE `goindo_navcity` (
  `idNAVCITY` int(11) NOT NULL,
  `nameNAVCITY` varchar(50) NOT NULL,
  `idCITY` int(11) NOT NULL,
  `createdateNAVCITY` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateNAVCITY` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusNAVCITY` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_profile`
--

CREATE TABLE `goindo_profile` (
  `idPROFILE` int(11) NOT NULL,
  `idPROVINCE` int(11) NOT NULL,
  `titlePROFILE` varchar(70) NOT NULL,
  `descPROFILE` text NOT NULL,
  `createdatePROFILE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedatePROFILE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusPROFILE` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_province`
--

CREATE TABLE `goindo_province` (
  `idPROVINCE` int(11) NOT NULL,
  `namePROVINCE` varchar(70) NOT NULL,
  `top10citiesPROVINCE` int(1) NOT NULL,
  `createdatePROVINCE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedatePROVINCE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusPROVINCE` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goindo_service_directory`
--

CREATE TABLE `goindo_service_directory` (
  `idSERDIR` int(11) NOT NULL,
  `infoSERDIR` text NOT NULL,
  `typeSERDIR` int(1) NOT NULL,
  `createdateSERDIR` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateSERDIR` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusSERDIR` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `goindo_area`
--
ALTER TABLE `goindo_area`
  ADD PRIMARY KEY (`idAREA`);

--
-- Indexes for table `goindo_article_area`
--
ALTER TABLE `goindo_article_area`
  ADD PRIMARY KEY (`idARTICLEAREA`);

--
-- Indexes for table `goindo_article_beatentrack`
--
ALTER TABLE `goindo_article_beatentrack`
  ADD PRIMARY KEY (`idARTICLEBEATEN`);

--
-- Indexes for table `goindo_article_city`
--
ALTER TABLE `goindo_article_city`
  ADD PRIMARY KEY (`idARTICLECITY`);

--
-- Indexes for table `goindo_article_navigation_city`
--
ALTER TABLE `goindo_article_navigation_city`
  ADD PRIMARY KEY (`idARTICLENAVCITY`);

--
-- Indexes for table `goindo_article_provinces`
--
ALTER TABLE `goindo_article_provinces`
  ADD PRIMARY KEY (`idARTICLEPROV`);

--
-- Indexes for table `goindo_article_top10_destinations`
--
ALTER TABLE `goindo_article_top10_destinations`
  ADD PRIMARY KEY (`idARTICLETOP10DESTI`);

--
-- Indexes for table `goindo_banner`
--
ALTER TABLE `goindo_banner`
  ADD PRIMARY KEY (`idBANNER`);

--
-- Indexes for table `goindo_city`
--
ALTER TABLE `goindo_city`
  ADD PRIMARY KEY (`idCITY`);

--
-- Indexes for table `goindo_client_banner`
--
ALTER TABLE `goindo_client_banner`
  ADD PRIMARY KEY (`idCLIENT`);

--
-- Indexes for table `goindo_more_desc`
--
ALTER TABLE `goindo_more_desc`
  ADD PRIMARY KEY (`idDESC`);

--
-- Indexes for table `goindo_navcity`
--
ALTER TABLE `goindo_navcity`
  ADD PRIMARY KEY (`idNAVCITY`);

--
-- Indexes for table `goindo_profile`
--
ALTER TABLE `goindo_profile`
  ADD PRIMARY KEY (`idPROFILE`);

--
-- Indexes for table `goindo_province`
--
ALTER TABLE `goindo_province`
  ADD PRIMARY KEY (`idPROVINCE`);

--
-- Indexes for table `goindo_service_directory`
--
ALTER TABLE `goindo_service_directory`
  ADD PRIMARY KEY (`idSERDIR`);

--
-- Indexes for table `goindo_users_admin`
--
ALTER TABLE `goindo_users_admin`
  ADD PRIMARY KEY (`idADMIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goindo_area`
--
ALTER TABLE `goindo_area`
  MODIFY `idAREA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_article_area`
--
ALTER TABLE `goindo_article_area`
  MODIFY `idARTICLEAREA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_article_city`
--
ALTER TABLE `goindo_article_city`
  MODIFY `idARTICLECITY` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_article_navigation_city`
--
ALTER TABLE `goindo_article_navigation_city`
  MODIFY `idARTICLENAVCITY` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_article_provinces`
--
ALTER TABLE `goindo_article_provinces`
  MODIFY `idARTICLEPROV` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_article_top10_destinations`
--
ALTER TABLE `goindo_article_top10_destinations`
  MODIFY `idARTICLETOP10DESTI` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_banner`
--
ALTER TABLE `goindo_banner`
  MODIFY `idBANNER` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_city`
--
ALTER TABLE `goindo_city`
  MODIFY `idCITY` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_client_banner`
--
ALTER TABLE `goindo_client_banner`
  MODIFY `idCLIENT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_more_desc`
--
ALTER TABLE `goindo_more_desc`
  MODIFY `idDESC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `goindo_navcity`
--
ALTER TABLE `goindo_navcity`
  MODIFY `idNAVCITY` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_profile`
--
ALTER TABLE `goindo_profile`
  MODIFY `idPROFILE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_province`
--
ALTER TABLE `goindo_province`
  MODIFY `idPROVINCE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_service_directory`
--
ALTER TABLE `goindo_service_directory`
  MODIFY `idSERDIR` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goindo_users_admin`
--
ALTER TABLE `goindo_users_admin`
  MODIFY `idADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
