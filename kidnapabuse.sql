-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 08:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidnapabuse`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cases`
--

CREATE TABLE `tb_cases` (
  `case_id` int(11) NOT NULL,
  `case_date` date DEFAULT current_timestamp(),
  `case_title` varchar(25) DEFAULT NULL,
  `case_description` varchar(252) DEFAULT NULL,
  `cover_image` varchar(150) DEFAULT NULL,
  `category` enum('kidnap','abuse') DEFAULT NULL,
  `case_time` time DEFAULT current_timestamp(),
  `case_state` varchar(25) DEFAULT NULL,
  `case_address` varchar(225) DEFAULT NULL,
  `case_status` enum('Solved','Pending','Closed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cases`
--

INSERT INTO `tb_cases` (`case_id`, `case_date`, `case_title`, `case_description`, `cover_image`, `category`, `case_time`, `case_state`, `case_address`, `case_status`) VALUES
(1264, '2024-03-26', 'End sars', 'burnt cars and shops', 'end-sars.jpeg', 'abuse', '15:08:35', 'FCT', 'Wuse market in front of fidelity bank', 'Solved'),
(1984, '2024-03-26', 'End sars lagos', 'burnt cars and shops lagos', 'end-sars.jpeg', 'kidnap', '15:15:16', 'Lagos', 'MainlAnd Bridge', 'Pending'),
(1988, '2024-03-26', 'Chibok Girls', 'the school girls were abducted at night', 'chibok-girls.jpg', 'kidnap', '15:15:16', 'Kaduna', 'Behind malali school', 'Solved'),
(4514, '2024-03-21', 'Mararaba', 'took some people', 'end-sars.jpeg', 'kidnap', '12:15:16', 'FCT', 'Front of that nyanay bridge', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cases`
--
ALTER TABLE `tb_cases`
  ADD PRIMARY KEY (`case_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
