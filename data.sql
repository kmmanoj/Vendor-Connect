-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2016 at 07:10 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_productlisting`
--

CREATE DATABASE project;
use project;


CREATE TABLE `table_productlisting` (
  `ProductCode` int(10) NOT NULL,
  `ProductName` varchar(20) DEFAULT NULL,
  `SubcategoryName` varchar(20) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_productlisting`
--

INSERT INTO `table_productlisting` (`ProductCode`, `ProductName`, `SubcategoryName`, `path`) VALUES
(1, 'Kookabura', 'Bat', 'res/kookaburra.jpg'),
(2, 'MT', 'Bat', 'res/MT.jpg'),
(3, 'Yonex', 'Stud', 'res/yonex.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_subcategory`
--

CREATE TABLE `table_subcategory` (
  `SubcategoryCode` int(11) NOT NULL,
  `CategoryName` varchar(25) DEFAULT NULL,
  `SubcategoryName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_subcategory`
--

INSERT INTO `table_subcategory` (`SubcategoryCode`, `CategoryName`, `SubcategoryName`) VALUES
(1, 'Cricket', 'Bat'),
(3, 'Football', 'Shin Pad'),
(2, 'Football', 'Stud');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_productlisting`
--
ALTER TABLE `table_productlisting`
  ADD PRIMARY KEY (`ProductCode`),
  ADD KEY `tp` (`SubcategoryName`);

--
-- Indexes for table `table_subcategory`
--
ALTER TABLE `table_subcategory`
  ADD PRIMARY KEY (`SubcategoryCode`),
  ADD KEY `ts` (`CategoryName`,`SubcategoryName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_productlisting`
--
ALTER TABLE `table_productlisting`
  MODIFY `ProductCode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `table_subcategory`
--
ALTER TABLE `table_subcategory`
  MODIFY `SubcategoryCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
