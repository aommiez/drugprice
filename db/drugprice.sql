-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: 127.0.0.1
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.5.32
-- รุ่นของ PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `drugprice`
--
CREATE DATABASE IF NOT EXISTS `drugprice` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `drugprice`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `drug`
--

CREATE TABLE IF NOT EXISTS `drug` (
  `iddrug` int(11) NOT NULL AUTO_INCREMENT,
  `hospitalId` int(11) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qtc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_money` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `budget_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`iddrug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- dump ตาราง `drug`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `idhospital` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`idhospital`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- dump ตาราง `hospital`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`iduser`, `first_name`, `last_name`, `email`, `password`, `hospitalId`, `deleted`) VALUES
(1, 'admin', 'admin', 'admin@drugprice.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
