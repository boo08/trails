-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 03:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trail`
--

-- --------------------------------------------------------

--
-- Table structure for table `trail`
--

CREATE TABLE `trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `trail_to` varchar(45) DEFAULT NULL,
  `flying_from` varchar(45) DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY(`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trail`
--

INSERT INTO `trail` (`id`, `customer_id`, `trail_to`, `flying_from`, `total_cost`, `created_at`, `updated_at`) VALUES
(20491, 2179, 'United Arab Emirates', 'Chennai', 67044, '2017-09-16 18:23:34', '2021-06-30 08:42:14'),
(NULL, 214, 'United Arab Emirates', 'Madurai', 346, '2021-06-30 07:31:35', '2021-06-30 07:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `trail_items`
--

CREATE TABLE `trail_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trail_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cost` double DEFAULT NULL,
      PRIMARY KEY(`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trail_items`
--

INSERT INTO `trail_items` (`id`, `trail_id`, `date`, `cost`) VALUES
(1061657, 20491, '2017-09-30', 566),
(1061659, 20491, '2017-09-30', 15145),
(1061660, 20491, '2017-09-30', 2340),
(1061661, 20491, '2017-10-04', 2340),
(1061662, 20491, '2017-10-02', 9360),
(1061663, 20491, '2017-10-02', 7176),
(1061664, 20491, '2017-10-01', 2071),
(1061665, 20491, '2017-10-01', 3382),
(1061666, 20491, '2017-10-03', 18720),
(1061667, 20491, '2017-10-01', 5944);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
