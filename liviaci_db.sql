-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 01:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liviaci_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `livia_group`
--

CREATE TABLE `livia_group` (
  `GID` int(11) NOT NULL,
  `GName` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `livia_mail_log`
--

CREATE TABLE `livia_mail_log` (
  `LID` int(11) NOT NULL,
  `GRP` varchar(50) NOT NULL,
  `SUBJECT` longtext NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `livia_smtp`
--

CREATE TABLE `livia_smtp` (
  `SMTP_ID` int(11) NOT NULL,
  `protocol` varchar(50) NOT NULL,
  `email` varchar(110) NOT NULL,
  `smtp_host` varchar(110) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_user` varchar(110) NOT NULL,
  `smtp_pass` varchar(110) NOT NULL,
  `smtp_crypto` varchar(50) NOT NULL,
  `mailtype` varchar(50) NOT NULL,
  `smtp_timeout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `livia_subscribers`
--

CREATE TABLE `livia_subscribers` (
  `UID` int(11) NOT NULL,
  `EMAIL` varchar(110) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `GRP` varchar(50) NOT NULL,
  `CREATED` datetime NOT NULL,
  `MODIFIED` datetime NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `livia_user`
--

CREATE TABLE `livia_user` (
  `UID` int(11) NOT NULL,
  `Full_Name` varchar(110) NOT NULL,
  `Email` varchar(110) NOT NULL,
  `Password` varchar(110) NOT NULL,
  `Verification_Key` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livia_group`
--
ALTER TABLE `livia_group`
  ADD PRIMARY KEY (`GID`);

--
-- Indexes for table `livia_mail_log`
--
ALTER TABLE `livia_mail_log`
  ADD PRIMARY KEY (`LID`);

--
-- Indexes for table `livia_smtp`
--
ALTER TABLE `livia_smtp`
  ADD PRIMARY KEY (`SMTP_ID`);

--
-- Indexes for table `livia_subscribers`
--
ALTER TABLE `livia_subscribers`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `livia_user`
--
ALTER TABLE `livia_user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livia_group`
--
ALTER TABLE `livia_group`
  MODIFY `GID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `livia_mail_log`
--
ALTER TABLE `livia_mail_log`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `livia_smtp`
--
ALTER TABLE `livia_smtp`
  MODIFY `SMTP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `livia_subscribers`
--
ALTER TABLE `livia_subscribers`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17816;

--
-- AUTO_INCREMENT for table `livia_user`
--
ALTER TABLE `livia_user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
