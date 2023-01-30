-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2023 at 04:05 AM
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
-- Database: `e-fine-lahiru`
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
(1002, 'nayake15@gmail.com', '$2y$10$NPrI0hjMns/lNfOk3.8J6uQzA/zHvJUNhTIEVv9GHS59R.6lI9Et.', 'System Admin', '2022-12-15 11:57:50');

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
-- Table structure for table `police_officer`
--

DROP TABLE IF EXISTS `police_officer`;
CREATE TABLE IF NOT EXISTS `police_officer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sNo` int(10) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `pStation` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addedBy` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_officer`
--

INSERT INTO `police_officer` (`id`, `name`, `sNo`, `rank`, `pStation`, `email`, `addedBy`, `timestamp`) VALUES
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
) ENGINE=MyISAM AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`id`, `name`, `email`, `timestamp`) VALUES
(1000, 'ucsc', 'ravindupbalasooriya@gmail.com', '2022-12-15 03:42:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
