-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 07:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `antiharassment`
--

CREATE TABLE `antiharassment` (
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question1` enum('Yes','No') DEFAULT NULL,
  `question2` enum('Yes','No') DEFAULT NULL,
  `question3` enum('Yes','No') DEFAULT NULL,
  `question4` enum('Yes','No') DEFAULT NULL,
  `question5` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `antiharassment`
--

INSERT INTO `antiharassment` (`survey_id`, `user_id`, `question1`, `question2`, `question3`, `question4`, `question5`) VALUES
(1, 1, 'Yes', 'Yes', 'Yes', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `safespace`
--

CREATE TABLE `safespace` (
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question1` enum('Yes','No') DEFAULT NULL,
  `question2` enum('Yes','No') DEFAULT NULL,
  `question3` enum('Yes','No') DEFAULT NULL,
  `question4` enum('Yes','No') DEFAULT NULL,
  `question5` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `safespace`
--

INSERT INTO `safespace` (`survey_id`, `user_id`, `question1`, `question2`, `question3`, `question4`, `question5`) VALUES
(1, 1, 'Yes', 'Yes', 'Yes', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `code` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `gender`, `email`, `code`) VALUES
(1, 'Test', '$2y$10$BsylHflSOJcfk/w2XXeX/esEsRgrKDkCuT2fpwC3WFj.wLofG8Eb6', 'Trans Man', 'jiroluismanalo24@gmail.com', 7630);

-- --------------------------------------------------------

--
-- Table structure for table `vawc`
--

CREATE TABLE `vawc` (
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question1` enum('Yes','No') DEFAULT NULL,
  `question2` enum('Yes','No') DEFAULT NULL,
  `question3` enum('Yes','No') DEFAULT NULL,
  `question4` enum('Yes','No') DEFAULT NULL,
  `question5` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vawc`
--

INSERT INTO `vawc` (`survey_id`, `user_id`, `question1`, `question2`, `question3`, `question4`, `question5`) VALUES
(1, 1, 'No', 'No', 'No', 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `antiharassment`
--
ALTER TABLE `antiharassment`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `safespace`
--
ALTER TABLE `safespace`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vawc`
--
ALTER TABLE `vawc`
  ADD PRIMARY KEY (`survey_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `antiharassment`
--
ALTER TABLE `antiharassment`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `safespace`
--
ALTER TABLE `safespace`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vawc`
--
ALTER TABLE `vawc`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
