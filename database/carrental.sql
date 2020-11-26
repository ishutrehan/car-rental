-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 10:59 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageURL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricePerDay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrationPlate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `subjectTypeId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `imageURL`, `fuel`, `pricePerDay`, `currency`, `year`, `type`, `status`, `groupId`, `registrationPlate`, `createdAt`, `updatedAt`, `subjectTypeId`, `location`) VALUES
(1, 'SKODA', 'Kodiaq', 'https://skodak2ngtools.blob.core.windows.net/images/Models/2018/112435926/Basic.png', 'petrol', '54', 'EUR', '2017', 'SUV', 'available', 'kodiaq', '2C7 2345', '2020-11-26 10:51:18', '2020-11-26 10:51:18', '1', '{\"latitude\":\"50.10676\",\"longitude\":\"50.10676\"}');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `subjectID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentalFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentalTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedAt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `subjectID`, `rentalFrom`, `rentalTo`, `createdAt`, `updatedAt`) VALUES
(1, '10', '2020-11-30 00:00:00', '2020-11-30 00:00:00', '2020-11-26 08:14:07', '2020-11-26 08:14:07'),
(2, '10', '2020-11-30 00:00:00', '2020-11-30 00:00:00', '2020-11-26 08:14:09', '2020-11-26 08:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `createdAt`, `updatedAt`) VALUES
(1, 'Developer', 'testing', 'dev@gmail.com', '12345678', '2020-11-26 10:44:01', '2020-11-26 10:44:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
