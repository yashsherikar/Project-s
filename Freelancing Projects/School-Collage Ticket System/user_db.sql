-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `balance` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `email`, `balance`) VALUES
(4, 'yash@gmail.com', 242);

-- --------------------------------------------------------

--
-- Table structure for table `fund_history`
--

CREATE TABLE `fund_history` (
  `tid` int(11) NOT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `type` char(10) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `Dates` date NOT NULL,
  `Times` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fund_history`
--

INSERT INTO `fund_history` (`tid`, `useremail`, `type`, `amount`, `Dates`, `Times`) VALUES
(202257319, 'yash@gmail.com', 'credit', 12, '2024-04-09', '12:14:57'),
(338618381, 'yash@gmail.com', 'credit', 2, '2024-04-09', '12:13:16'),
(938671296, 'yash@gmail.com', 'credit', 7, '2024-04-09', '12:09:03'),
(1044374170, 'yash@gmail.com', 'credit', 20, '2024-04-09', '12:05:41'),
(1148537990, 'yash@gmail.com', 'credit', 98, '2024-04-09', '12:12:13'),
(1458120711, 'yash@gmail.com', 'credit', 3, '2024-04-09', '12:06:33'),
(1984895882, 'yash@gmail.com', 'credit', 100, '2024-04-09', '12:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` char(10) DEFAULT NULL,
  `Cardnum` int(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Destination` varchar(20) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`name`, `email`, `password`, `user_type`, `Cardnum`, `Location`, `Destination`, `Amount`) VALUES
('Yash Sherikar', 'yash@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'user', 323212, 'sangli', 'kolhapur', 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `fund_history`
--
ALTER TABLE `fund_history`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `useremail` (`useremail`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funds`
--
ALTER TABLE `funds`
  ADD CONSTRAINT `funds_ibfk_1` FOREIGN KEY (`email`) REFERENCES `userinfo` (`email`);

--
-- Constraints for table `fund_history`
--
ALTER TABLE `fund_history`
  ADD CONSTRAINT `fund_history_ibfk_1` FOREIGN KEY (`useremail`) REFERENCES `userinfo` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
