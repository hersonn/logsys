-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2019 at 05:41 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `administrator` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID`, `user`, `password`, `administrator`) VALUES
(0000000036, 'herson', '$2y$10$Zl4kbr3eAsbzxu2rGieDu.eXZnwWfIfIzqHOrAzEduO8oB8DDEbT2', 0),
(0000000038, 'admin', '$2y$10$MuVzARRC2WDxDD7RBRCN5u7uoa7j5UTEO.Ak1ncNERy6LZd2l/xre', 1),
(0000000039, 'mackenzie', '$2y$10$8mF2MWfJ1lEWD3XETp1kEOP6b4uPUYq8sIefQlBcMg1pxC0zNVrYC', 0),
(0000000040, 'alfred', '$2y$10$XxBQi.EDe.uoeJXQsNKvz.oYUPmElTkmNr8T/MaHV.vVvq33Nk7Xe', 0),
(0000000041, 'Starbucks', '$2y$10$tov42tHK8ZdnMmfb16x4su/Vm5mbs.MxhrxQ8DJTbEF0aDiV7T6ce', 0),
(0000000042, 'owner', '$2y$10$gt.F/IAP79uYiNbG.YttLuhT5nfPirfL6ceb3ohh552E9jGTSV5Pi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
