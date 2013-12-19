-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2013 at 11:13 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drugprice`
--

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE IF NOT EXISTS `drug` (
  `iddrug` int(11) NOT NULL AUTO_INCREMENT,
  `Text76` date DEFAULT NULL,
  `dt1` date DEFAULT NULL,
  `dt2` date DEFAULT NULL,
  `CODE1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTENT` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Text50` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inv_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VendorCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receive_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_money` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `budgget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receive_header` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Text2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `hospitalId` int(11) NOT NULL,
  `xlsId` int(11) NOT NULL,
  PRIMARY KEY (`iddrug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `drug_xls`
--

CREATE TABLE IF NOT EXISTS `drug_xls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `filename` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `hospitalId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `idhospital` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`idhospital`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`idhospital`, `hospital_name`, `deleted`) VALUES
(1, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hospitalId` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `first_name`, `last_name`, `email`, `password`, `hospitalId`, `deleted`) VALUES
(1, 'admin', 'admin', 'admin@drugprice.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
