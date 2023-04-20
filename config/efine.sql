-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2023 at 05:39 AM
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
-- Table structure for table `laws`
--

DROP TABLE IF EXISTS `laws`;
CREATE TABLE IF NOT EXISTS `laws` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `act` varchar(255) NOT NULL,
  `part_number` int(3) NOT NULL,
  `chapter_number` int(3) NOT NULL,
  `section_number` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `law_text` varchar(1000) NOT NULL,
  `fine_amount` int(6) NOT NULL,
  `points_deducted` int(2) NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_by` int(10) NOT NULL,
  `latest_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1012 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laws`
--

INSERT INTO `laws` (`id`, `act`, `part_number`, `chapter_number`, `section_number`, `title`, `law_text`, `fine_amount`, `points_deducted`, `added_by`, `created_at`, `latest_update_by`, `latest_update_at`) VALUES
(1011, 'Motor Traffic (AMENDMENT) Act, No. 8 of 2009', 1, 1, 1, 'r453453', '4534535345', 34, 3, 1056, '2023-04-10 04:48:49', 0, '2023-04-12 08:33:08'),
(1010, 'Motor Traffic (AMENDMENT) Act, No. 8 of 2009', 41, 31, 31, '3443', '34343', 3434, 3, 1056, '2023-03-20 03:59:57', 0, '2023-04-12 08:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `police_officer`
--

DROP TABLE IF EXISTS `police_officer`;
CREATE TABLE IF NOT EXISTS `police_officer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `service_number` int(10) NOT NULL,
  `police_station` varchar(100) NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_by` int(10) NOT NULL,
  `latest_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

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
  `added_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_by` int(10) NOT NULL,
  `latest_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rmv_admin`
--

DROP TABLE IF EXISTS `rmv_admin`;
CREATE TABLE IF NOT EXISTS `rmv_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_by` int(10) NOT NULL,
  `latest_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

DROP TABLE IF EXISTS `system_admin`;
CREATE TABLE IF NOT EXISTS `system_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1010 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`id`, `name`, `email`, `created_at`, `latest_update_at`) VALUES
(1000, 'ucsc', 'ravindupbalasooriya@gmail.com', '2022-12-15 03:42:02', '2023-04-12 08:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `email`, `password`, `user_role`, `created_at`, `latest_update_at`) VALUES
(1056, 'ravindupbalasooriya@gmail.com', '$2y$10$Ij87sN20LHDQJswao5iZCO/oSKNkDn3OEpUuh8quU1i4C8f4vA1sW', 'System Admin', '2022-12-15 03:42:46', '2023-04-12 08:37:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
