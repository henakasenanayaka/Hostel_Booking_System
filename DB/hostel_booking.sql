-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 10:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` int(64) NOT NULL,
  `adminName` varchar(64) NOT NULL,
  `adminEmail` varchar(64) NOT NULL,
  `adminPassword` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `adminName`, `adminEmail`, `adminPassword`) VALUES
(1, 'Admin', 'admin123@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `hostelId` int(64) NOT NULL,
  `ownerEmail` varchar(64) NOT NULL,
  `hostelName` varchar(64) NOT NULL,
  `scale` varchar(24) NOT NULL,
  `address` varchar(128) NOT NULL,
  `gMapLink` text NOT NULL,
  `roomCount` int(24) NOT NULL,
  `studentsPerRoom` int(24) NOT NULL,
  `description` text NOT NULL,
  `mainImagePath` text NOT NULL,
  `cardImagePath1` text NOT NULL,
  `cardImagePath2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`hostelId`, `ownerEmail`, `hostelName`, `scale`, `address`, `gMapLink`, `roomCount`, `studentsPerRoom`, `description`, `mainImagePath`, `cardImagePath1`, `cardImagePath2`) VALUES
(33, 'kasun@gmail.com', 'hostel 1', 'Small', '57/4, Gannoruwa, Preadeniya.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.64159766627!2d80.03365777466092!3d6.813373993184241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24dd1caf3e667%3A0x54a8b535a21aaee5!2z4La04LeU4Lav4LeP4Lac4LeZIOC2tuC3neC2qeC3kuC2uA!5e0!3m2!1sen!2slk!4v1710916686365!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 10, 5, 'A stunning 19th-century Seattle mansion, sold for $6 million, is set to be torn ', 'hostel2.jpg', 'hostel1.jpg', 'loginBack3.jpg'),
(34, 'kasun@gmail.com', 'hostel 2', 'Medium', '57/4, Gannoruwa, Preadeniya.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.64159766627!2d80.03365777466092!3d6.813373993184241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24dd1caf3e667%3A0x54a8b535a21aaee5!2z4La04LeU4Lav4LeP4Lac4LeZIOC2tuC3neC2qeC3kuC2uA!5e0!3m2!1sen!2slk!4v1710916686365!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 10, 5, 'A stunning 19th-century Seattle mansion, sold for $6 million, is set to be torn ', 'hostel1.jpg', 'loginBack3.jpg', 'hostel2.jpg'),
(35, 'kasun2@gmail.com', 'hostel 3', 'Large', '57/4, Gannoruwa, Preadeniya.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.64159766627!2d80.03365777466092!3d6.813373993184241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24dd1caf3e667%3A0x54a8b535a21aaee5!2z4La04LeU4Lav4LeP4Lac4LeZIOC2tuC3neC2qeC3kuC2uA!5e0!3m2!1sen!2slk!4v1710916686365!5m2!1sen!2slk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 10, 5, 'A stunning 19th-century Seattle mansion, sold for $6 million, is set to be torn ', 'loginBack3.jpg', 'hostel2.jpg', 'hostel1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `ownerId` int(64) NOT NULL,
  `ownerName` varchar(128) NOT NULL,
  `ownerFirstName` varchar(64) NOT NULL,
  `ownerLastName` varchar(64) NOT NULL,
  `ownerEmail` varchar(128) NOT NULL,
  `hostelAddress` varchar(128) NOT NULL,
  `contactNumber` int(16) NOT NULL,
  `ownerPassword` varchar(256) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`ownerId`, `ownerName`, `ownerFirstName`, `ownerLastName`, `ownerEmail`, `hostelAddress`, `contactNumber`, `ownerPassword`, `description`) VALUES
(19, 'kasun123', 'Kasun', 'Karunarathne', 'kasun@gmail.com', '57/4, Gannoruwa, Preadeniya.', 714877001, '123456', 'testing12345'),
(20, 'kasun123', 'Kasun2', 'Karunarathne', 'kasun2@gmail.com', '57/4, Gannoruwa, Preadeniya.', 714877001, '123456', 'testing12345');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(64) NOT NULL,
  `studentFirstName` varchar(128) NOT NULL,
  `studentLastName` varchar(64) NOT NULL,
  `studentEmail` varchar(128) NOT NULL,
  `contactNumber` varchar(24) NOT NULL,
  `studentPassword` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `studentFirstName`, `studentLastName`, `studentEmail`, `contactNumber`, `studentPassword`) VALUES
(9, 'Navindu', 'Dissanayake.', 'navindu158@gmail.com', '0321654987', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`hostelId`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`ownerId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `hostelId` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `ownerId` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
