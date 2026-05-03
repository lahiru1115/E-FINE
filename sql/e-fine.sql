-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2023 at 05:56 AM
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
-- Database: `e-fine`
--

-- --------------------------------------------------------

--
-- Table structure for table `court_cases`
--

DROP TABLE IF EXISTS `court_cases`;
CREATE TABLE IF NOT EXISTS `court_cases` (
  `fine_id` int(15) NOT NULL AUTO_INCREMENT,
  `licence_no` varchar(50) NOT NULL,
  `violation` varchar(500) NOT NULL,
  `points` varchar(15) NOT NULL,
  `violation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicle_no` varchar(20) NOT NULL,
  `officer_id` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `court_name` varchar(50) NOT NULL,
  `court_date` date DEFAULT NULL,
  `payment_status` int(1) NOT NULL,
  PRIMARY KEY (`fine_id`),
  KEY `driver_details` (`licence_no`),
  KEY `officer_details` (`officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `nic` varchar(50) NOT NULL,
  `licence_no` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `point_balance` int(2) NOT NULL,
  `licence_status` int(1) NOT NULL,
  `register_status` int(1) NOT NULL,
  `added_by` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`licence_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

DROP TABLE IF EXISTS `fine`;
CREATE TABLE IF NOT EXISTS `fine` (
  `fine_id` int(15) NOT NULL AUTO_INCREMENT,
  `licence_no` varchar(50) NOT NULL,
  `violation` varchar(500) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `points` varchar(15) NOT NULL,
  `violation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicle_no` varchar(20) NOT NULL,
  `officer_id` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `court_name` varchar(50) NOT NULL,
  `court_date` date DEFAULT NULL,
  `payment_status` int(1) NOT NULL,
  PRIMARY KEY (`fine_id`),
  KEY `driver_details` (`licence_no`),
  KEY `officer_details` (`officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
  `law_type` varchar(10) DEFAULT NULL,
  `fine_amount` int(6) NOT NULL,
  `points_deducted` int(2) NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_by` int(10) DEFAULT NULL,
  `latest_update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1136 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laws`
--

INSERT INTO `laws` (`id`, `act`, `part_number`, `chapter_number`, `section_number`, `title`, `law_text`, `law_type`, `fine_amount`, `points_deducted`, `added_by`, `created_at`, `latest_update_by`, `latest_update_at`) VALUES
(1041, 'Motor Vehicles Act', 1, 103, 2, 'Running a Red Light', 'No driver shall run a red traffic light or stop sign.', 'Court', 200, 3, 1056, '2022-01-07 18:30:00', 1056, '2022-01-08 18:30:00'),
(1042, 'Motor Vehicles Act', 1, 103, 3, 'Failure to Signal', 'No driver shall fail to signal when turning or changing lanes.', 'Court', 50, 1, 1056, '2022-01-08 18:30:00', 1056, '2022-01-09 18:30:00'),
(1043, 'Motor Vehicles Act', 2, 201, 1, 'Speeding in a School Zone', 'No driver shall exceed the posted speed limit in a designated school zone during school hours.', 'Fine', 250, 4, 1056, '2022-01-09 18:30:00', 1056, '2022-01-10 18:30:00'),
(1044, 'Motor Vehicles Act', 2, 201, 2, 'Passing a Stopped School Bus', 'No driver shall pass a stopped school bus with its red lights flashing and stop arm extended.', 'Court', 500, 6, 1056, '2022-01-10 18:30:00', 1056, '2022-01-11 18:30:00'),
(1045, 'Motor Vehicles Act', 2, 202, 1, 'Driving Without Insurance', 'No person shall operate a motor vehicle without proper insurance coverage.', 'Court', 500, 5, 1056, '2022-01-11 18:30:00', 1056, '2022-01-12 18:30:00'),
(1046, 'Motor Vehicles Act', 2, 202, 2, 'Operating a Vehicle with Defective Equipment', 'No person shall operate a motor vehicle with defective equipment, such as brakes, lights, or tires.', 'Court', 100, 2, 1056, '2022-01-12 18:30:00', 1056, '2022-01-13 18:30:00'),
(1047, 'Motor Vehicles Act', 2, 202, 3, 'Driving Without Proper Registration', 'No person shall operate a motor vehicle without proper registration and license plates.', 'Court', 150, 2, 1056, '2022-01-13 18:30:00', 1056, '2022-01-14 18:30:00'),
(1048, 'Motor Vehicles Act', 2, 203, 1, 'Driving a Commercial Vehicle Without Proper License', 'No person shall operate a commercial vehicle without a proper commercial driver’s license.', 'Court', 1000, 10, 1056, '2022-01-14 18:30:00', 1056, '2022-01-15 18:30:00'),
(1049, 'Motor Vehicles Act', 2, 203, 2, 'Failure to Secure Cargo on a Commercial Vehicle', 'No person shall operate a commercial vehicle with unsecured cargo.', 'Court', 250, 3, 1056, '2022-01-15 18:30:00', 1056, '2022-01-16 18:30:00'),
(1050, 'Motor Vehicles Act', 2, 203, 3, 'Operating a Commercial Vehicle in a Prohibited Area', 'No person shall operate a commercial vehicle in a prohibited area, such as a residential neighborhood or park.', 'Court', 500, 6, 1056, '2022-01-16 18:30:00', 1056, '2022-01-17 18:30:00'),
(1051, 'Motor Vehicles Act', 1, 101, 1, 'Speed Limit', 'No driver of a motor vehicle shall exceed the posted speed limit.', 'Court', 100, 2, 1056, '2021-12-31 18:30:00', 1056, '2022-01-01 18:30:00'),
(1052, 'Motor Vehicles Act', 1, 101, 2, 'Reckless Driving', 'No driver of a motor vehicle shall engage in reckless driving.', 'Court', 500, 5, 1056, '2022-01-01 18:30:00', 1056, '2022-01-02 18:30:00'),
(1053, 'Motor Vehicles Act', 1, 101, 3, 'Distracted Driving', 'No driver of a motor vehicle shall operate the vehicle while distracted by a mobile device or other activity.', 'Court', 200, 3, 1056, '2022-01-02 18:30:00', 1056, '2022-01-03 18:30:00'),
(1054, 'Motor Vehicles Act', 1, 102, 1, 'Driving Under the Influence', 'No driver of a motor vehicle shall operate the vehicle while under the influence of drugs or alcohol.', 'Court', 1000, 10, 1056, '2022-01-03 18:30:00', 1056, '2022-01-04 18:30:00'),
(1055, 'Motor Vehicles Act', 1, 102, 2, 'Driving Without a License', 'No person shall operate a motor vehicle without a valid driver’s license.', 'Court', 250, 3, 1056, '2022-01-04 18:30:00', 1056, '2022-01-05 18:30:00'),
(1056, 'Motor Vehicles Act', 1, 102, 3, 'Expired Registration', 'No person shall operate a motor vehicle with an expired registration.', 'Fine', 100, 1, 1056, '2022-01-05 18:30:00', 1056, '2022-01-06 18:30:00'),
(1057, 'Motor Vehicles Act', 1, 103, 1, 'Failure to Yield', 'No driver shall fail to yield the right of way to another vehicle or pedestrian.', 'Fine', 150, 2, 1056, '2022-01-06 18:30:00', 1056, '2022-01-07 18:30:00'),
(1058, 'Motor Vehicles Act', 1, 103, 2, 'Running a Red Light', 'No driver shall run a red traffic light or stop sign.', 'Fine', 200, 3, 1056, '2022-01-07 18:30:00', 1056, '2022-01-08 18:30:00'),
(1059, 'Motor Vehicles Act', 1, 103, 3, 'Failure to Signal', 'No driver shall fail to signal when turning or changing lanes.', 'Fine', 50, 1, 1056, '2022-01-08 18:30:00', 1056, '2022-01-09 18:30:00'),
(1060, 'Motor Vehicles Act', 2, 201, 1, 'Speeding in a School Zone', 'No driver shall exceed the posted speed limit in a designated school zone during school hours.', 'Fine', 250, 4, 1056, '2022-01-09 18:30:00', 1056, '2022-01-10 18:30:00'),
(1061, 'Motor Vehicles Act', 2, 201, 2, 'Passing a Stopped School Bus', 'No driver shall pass a stopped school bus with its red lights flashing and stop arm extended.', 'Fine', 500, 6, 1056, '2022-01-10 18:30:00', 1056, '2022-01-11 18:30:00'),
(1062, 'Motor Vehicles Act', 2, 202, 1, 'Driving Without Insurance', 'No person shall operate a motor vehicle without proper insurance coverage.', 'Fine', 500, 5, 1056, '2022-01-11 18:30:00', 1056, '2022-01-12 18:30:00'),
(1063, 'Motor Vehicles Act', 2, 202, 2, 'Operating a Vehicle with Defective Equipment', 'No person shall operate a motor vehicle with defective equipment, such as brakes, lights, or tires.', 'Fine', 100, 2, 1056, '2022-01-12 18:30:00', 1056, '2022-01-13 18:30:00'),
(1064, 'Motor Vehicles Act', 2, 202, 3, 'Driving Without Proper Registration', 'No person shall operate a motor vehicle without proper registration and license plates.', 'Fine', 150, 2, 1056, '2022-01-13 18:30:00', 1056, '2022-01-14 18:30:00'),
(1065, 'Motor Vehicles Act', 2, 203, 1, 'Driving a Commercial Vehicle Without Proper License', 'No person shall operate a commercial vehicle without a proper commercial driver’s license.', 'Fine', 1000, 10, 1056, '2022-01-14 18:30:00', 1056, '2022-01-15 18:30:00'),
(1116, 'Motor Vehicles Act', 2, 202, 2, 'Operating a Vehicle with Defective Equipment', 'No person shall operate a motor vehicle with defective equipment, such as brakes, lights, or tires.', 'Fine', 100, 2, 1056, '2022-01-12 18:30:00', 1056, '2022-01-13 18:30:00'),
(1117, 'Motor Vehicles Act', 2, 202, 3, 'Driving Without Proper Registration', 'No person shall operate a motor vehicle without proper registration and license plates.', 'Fine', 150, 2, 1056, '2022-01-13 18:30:00', 1056, '2022-01-14 18:30:00'),
(1119, 'Motor Vehicles Act', 2, 203, 2, 'Failure to Secure Cargo on a Commercial Vehicle', 'No person shall operate a commercial vehicle with unsecured cargo.', 'Fine', 250, 3, 1056, '2022-01-15 18:30:00', 1056, '2022-01-16 18:30:00'),
(1120, 'Motor Vehicles Act', 2, 203, 3, 'Operating a Commercial Vehicle in a Prohibited Area', 'No person shall operate a commercial vehicle in a prohibited area, such as a residential neighborhood or park.', 'Fine', 500, 6, 1056, '2022-01-16 18:30:00', 1056, '2022-01-17 18:30:00'),
(1121, 'Motor Vehicles Act', 1, 101, 1, 'Speed Limit', 'No driver of a motor vehicle shall exceed the posted speed limit.', 'Fine', 100, 2, 1056, '2021-12-31 18:30:00', 1056, '2022-01-01 18:30:00'),
(1122, 'Motor Vehicles Act', 1, 101, 2, 'Reckless Driving', 'No driver of a motor vehicle shall engage in reckless driving.', 'Fine', 500, 5, 1056, '2022-01-01 18:30:00', 1056, '2022-01-02 18:30:00'),
(1123, 'Motor Vehicles Act', 1, 101, 3, 'Distracted Driving', 'No driver of a motor vehicle shall operate the vehicle while distracted by a mobile device or other activity.', 'Fine', 200, 3, 1056, '2022-01-02 18:30:00', 1056, '2022-01-03 18:30:00'),
(1124, 'Motor Vehicles Act', 1, 102, 1, 'Driving Under the Influence', 'No driver of a motor vehicle shall operate the vehicle while under the influence of drugs or alcohol.', 'Fine', 1000, 10, 1056, '2022-01-03 18:30:00', 1056, '2022-01-04 18:30:00'),
(1126, 'Motor Vehicles Act', 1, 102, 3, 'Expired Registration', 'No person shall operate a motor vehicle with an expired registration.', 'Fine', 100, 1, 1056, '2022-01-05 18:30:00', 1056, '2022-01-06 18:30:00'),
(1127, 'Motor Vehicles Act', 1, 103, 1, 'Failure to Yield', 'No driver shall fail to yield the right of way to another vehicle or pedestrian.', 'Fine', 150, 2, 1056, '2022-01-06 18:30:00', 1056, '2022-01-07 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `fine_id` int(10) NOT NULL,
  `receipt_id` varchar(50) NOT NULL,
  `licence_no` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `card_holder_name` varchar(50) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`receipt_id`),
  KEY `fine` (`fine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `police_officer`
--

DROP TABLE IF EXISTS `police_officer`;
CREATE TABLE IF NOT EXISTS `police_officer` (
  `officer_id` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` int(11) NOT NULL,
  PRIMARY KEY (`officer_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `court_name` varchar(255) NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_by` int(10) DEFAULT NULL,
  `latest_update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `error_type` varchar(50) NOT NULL,
  `description` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `solved_by` int(10) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`id`, `name`, `email`, `created_at`, `latest_update_at`) VALUES
(1000, 'System Admin', 'system_admin@example.com', '2022-12-15 03:42:02', '2023-04-12 08:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` varchar(10) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_role` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latest_update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `email`, `password`, `user_role`, `created_at`, `latest_update_at`) VALUES
('1056', 'system_admin@example.com', '$2y$10$Ij87sN20LHDQJswao5iZCO/oSKNkDn3OEpUuh8quU1i4C8f4vA1sW', 'System Admin', '2022-12-15 03:42:46', '2023-04-12 08:37:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `driver_details` FOREIGN KEY (`licence_no`) REFERENCES `driver` (`licence_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `officer_details` FOREIGN KEY (`officer_id`) REFERENCES `police_officer` (`officer_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fine` FOREIGN KEY (`fine_id`) REFERENCES `fine` (`fine_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `police_officer`
--
ALTER TABLE `police_officer`
  ADD CONSTRAINT `police_officer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
