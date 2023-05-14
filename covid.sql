-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 09:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--
CREATE DATABASE IF NOT EXISTS `covid` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `covid`;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` char(6) NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL,
  `mobile_number` char(11) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `body_temp_celsius` decimal(3,1) NOT NULL,
  `covid19_diagnosed` char(3) NOT NULL,
  `covid19_encounter` char(3) NOT NULL,
  `vaccinated` char(3) NOT NULL,
  `nationality` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `sex`, `age`, `mobile_number`, `email_address`, `body_temp_celsius`, `covid19_diagnosed`, `covid19_encounter`, `vaccinated`, `nationality`) VALUES
(1, 'Stephen Janseen Balo', 'Male', 99, '09123456789', 'jeannes.thepsen@gmail.com', '36.1', 'No', 'No', 'Yes', 'Filipino'),
(2, 'Sharmaine D. Balo', 'Female', 70, '09123456788', 'sharmaine@yahoo.com', '38.1', 'Yes', 'No', 'Yes', 'Filipino'),
(3, 'Henry Balo', 'Male', 65, '09123456787', 'henrybalo@gmail.com', '37.1', 'No', 'Yes', 'No', 'Filipino'),
(4, 'Ayiesha Hermo', 'Female', 8, '09123456786', 'ayieshahermo@gmail.com', '36.1', 'No', 'No', 'No', 'American'),
(10, 'Rochelle Balo', 'Female', 35, '09171647007', 'rochellebalo@gmail.com', '31.1', 'No', 'No', 'Yes', 'Filipino'),
(12, 'Roselyn Balo', 'Female', 59, '9171647006', 'roselynbalo@gmail.com', '37.1', 'Yes', 'No', 'Yes', 'Filipino');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
