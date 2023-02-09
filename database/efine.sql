-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2023 at 11:42 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`, `role`, `timestamp`) VALUES
(1056, 'ravindupbalasooriya@gmail.com', '$2y$10$Ij87sN20LHDQJswao5iZCO/oSKNkDn3OEpUuh8quU1i4C8f4vA1sW', 'System Admin', '2022-12-15 03:42:46'),
(1003, 'lahirudanayake15@gmail.com', '$2y$10$WKREme8b4hVJ4gKxXFYx3OC61ZpuuyNqNzuKg36uBRtVoS8MhyQcC', 'RMV Admin', '2022-12-15 17:02:49'),
(1003, 'lahirudissanayake15@gmail.com', '$2y$10$rTj3YIKrDWAMEe48HL0XyulG5KpNB/F5RUJypX6Spd0p93KY72xTe', 'Police Officer', '2022-12-15 16:48:19'),
(1002, 'nayake15@gmail.com', '$2y$10$NPrI0hjMns/lNfOk3.8J6uQzA/zHvJUNhTIEVv9GHS59R.6lI9Et.', 'System Admin', '2022-12-15 11:57:50'),
(1003, 'lahirudke15@gmail.com', '$2y$10$CB0HGS/s39h1H73L0zmsTeXKnaibSJN0PIPOn/NJT0OylGVtyEpb.', 'System Admin', '2023-02-08 11:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `Nic_No` varchar(50) NOT NULL,
  `Licence_No` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Mobile_No` varchar(50) NOT NULL,
  `Point_Balance` decimal(50,0) NOT NULL,
  PRIMARY KEY (`Nic_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`Nic_No`, `Licence_No`, `Name`, `email`, `password`, `Address`, `Mobile_No`, `Point_Balance`) VALUES
('200', '1514', 'navindu', 'navindu@gmail.com', '1234', '297/xc', '0768414799', '15');

-- --------------------------------------------------------

--
-- Table structure for table `driver_payments`
--

DROP TABLE IF EXISTS `driver_payments`;
CREATE TABLE IF NOT EXISTS `driver_payments` (
  `Fine ID` int(10) NOT NULL,
  `Vialation` varchar(300) NOT NULL,
  `Payment_status` varchar(10) NOT NULL,
  `Points` int(5) NOT NULL,
  `amount` int(10) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Fine ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_payments`
--

INSERT INTO `driver_payments` (`Fine ID`, `Vialation`, `Payment_status`, `Points`, `amount`, `date`) VALUES
(10000, 'cross the sigle line', 'unpaid', 10, 0, '2022-12-19 18:30:00'),
(10003, 'he he he', 'paid', 10, 200, '2022-12-14 19:53:43'),
(10004, 'qqqqqqqqqqqqqqqqq', 'unpaid', 10, 200, '2022-12-15 11:03:53'),
(20000, 'stop at crosswalk', 'paid', 10, 0, '2022-12-14 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

DROP TABLE IF EXISTS `fines`;
CREATE TABLE IF NOT EXISTS `fines` (
  `fineId` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `violation` varchar(500) NOT NULL,
  `points` varchar(15) NOT NULL,
  `payamentStatus` varchar(15) NOT NULL,
  `amount` varchar(15) NOT NULL,
  PRIMARY KEY (`fineId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laws`
--

DROP TABLE IF EXISTS `laws`;
CREATE TABLE IF NOT EXISTS `laws` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `act` varchar(255) NOT NULL,
  `part` int(3) NOT NULL,
  `chapter` int(3) NOT NULL,
  `section` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `law` varchar(1000) NOT NULL,
  `fine` int(6) NOT NULL,
  `points` int(2) NOT NULL,
  `addedBy` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1009 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laws`
--

INSERT INTO `laws` (`id`, `act`, `part`, `chapter`, `section`, `title`, `law`, `fine`, `points`, `addedBy`, `timestamp`) VALUES
(1006, 'Motor Traffic (AMENDMENT) Act, No. 8 of 2009', 1, 1, 1, '56', '56', 56, 7, 'Lahiru', '2022-12-15 05:31:55'),
(1005, 'Motor Traffic (AMENDMENT) Act, No. 8 of 2009', 3, 3, 2, '453453445ertfgdfgd', 'fge5tyer5  rr fh f y56 rtytyrty rt yryty ryr yr', 5656, 12, 'Lahiru', '2022-12-15 02:10:41'),
(1007, 'Motor Traffic (AMENDMENT) Act, No. 8 of 2009', 1, 2, 1, 'ghjghj', 'hhhhhhhhhhhhhhhhhhhhhhhhhh', 76, 5, 'Lahiru', '2022-12-15 06:13:10'),
(1008, 'Motor Traffic (AMENDMENT) Act, No. 8 of 2009', 2, 2, 1, 'dfgdfg', 'fgd  dfgdfg', 2, 1, 'Lahiru', '2022-12-15 16:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `licence_details`
--

DROP TABLE IF EXISTS `licence_details`;
CREATE TABLE IF NOT EXISTS `licence_details` (
  `license_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `license validity` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `police_officer`
--

DROP TABLE IF EXISTS `police_officer`;
CREATE TABLE IF NOT EXISTS `police_officer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `serviceNo` int(10) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `policeStation` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addedBy` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_officer`
--

INSERT INTO `police_officer` (`id`, `name`, `serviceNo`, `rank`, `policeStation`, `email`, `addedBy`, `timestamp`) VALUES
(1000, 'kjk', 67, 'ghjghj', 'hjghj', 'hgjghj', '', '2022-12-15 03:42:24'),
(1003, 'ucsc', 5, 'IGP', 'Colombo', 'lahirudissanayake15@gmail.com', '', '2022-12-15 16:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `police_station_admin`
--

DROP TABLE IF EXISTS `police_station_admin`;
CREATE TABLE IF NOT EXISTS `police_station_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addedBy` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_station_admin`
--

INSERT INTO `police_station_admin` (`id`, `province`, `district`, `name`, `email`, `addedBy`, `timestamp`) VALUES
(1001, 'Western Province', 'Colombo', 'ucsc', 'ravisooriya@gmail.com', '', '2022-12-15 06:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `name` varchar(100) NOT NULL,
  `licence_no` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `description` varchar(225) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`licence_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rmv_admin`
--

DROP TABLE IF EXISTS `rmv_admin`;
CREATE TABLE IF NOT EXISTS `rmv_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addedBy` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rmv_admin`
--

INSERT INTO `rmv_admin` (`id`, `name`, `email`, `addedBy`, `timestamp`) VALUES
(1000, '456456', '45645', '', '2022-12-15 06:25:20'),
(1003, 'Lahiru', 'lahirudanayake15@gmail.com', '', '2022-12-15 17:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

DROP TABLE IF EXISTS `system_admin`;
CREATE TABLE IF NOT EXISTS `system_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`id`, `name`, `email`, `timestamp`) VALUES
(1000, 'ucsc', 'ravindupbalasooriya@gmail.com', '2022-12-15 03:42:02'),
(1003, 'try tyrty', 'lahirudke15@gmail.com', '2023-02-08 11:11:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
