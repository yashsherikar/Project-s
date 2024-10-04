-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 07:58 AM
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
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pinnumber` varchar(50) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Authentication_token` varchar(100) NOT NULL,
  `Flag` int(5) NOT NULL,
  `GetId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`Id`, `Name`, `Email`, `Pinnumber`, `Type`, `Authentication_token`, `Flag`, `GetId`) VALUES
(45, 'Yash', 'yash@gmail.com', '1821', 'Input', 'd9528a421933', 1, '1'),
(46, 'Nilesh', 'yash@gmail.com', '123', 'Output', '59e393151a82', 1, '2'),
(47, 'first', 'yash@gmail.com', '219', 'Input', '305a185d418b', 1, '5'),
(48, 'econd', 'yash@gmail.com', '99', 'Input', '76af767b856e', 1, '2'),
(49, 'yashhh', 'yash@gmail.com', '1233', 'Output', 'eba6e4077a70', 1, '1'),
(50, 'rajj', 'yash@gmail.com', '5464', 'Input', '99dbd3bc68ed', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `balance` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `getdata`
--

CREATE TABLE `getdata` (
  `Id` int(11) NOT NULL,
  `Uid` varchar(50) NOT NULL,
  `Tid` varchar(50) NOT NULL,
  `Fid` varchar(50) NOT NULL,
  `Data` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `getdata`
--

INSERT INTO `getdata` (`Id`, `Uid`, `Tid`, `Fid`, `Data`, `date`) VALUES
(1, '235r32fc54376', '1b74d9a495562', 'd9528a421933', '23', '2024-08-23'),
(2, '235r32fc54376', '1b74d9a495562', 'd9528a421933', '28', '2024-08-23'),
(3, '235r32fc54376', '1b74d9a495562', 'd9528a421933', '12.3', '2024-08-23'),
(4, '235r32fc54376', '1b74d9a495562', 'd9528a421933', '14', '2024-08-23'),
(5, '235r32fc54376', '1b74d9a4955621', 'd9528a4219334', '23', '2024-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `idchecker`
--

CREATE TABLE `idchecker` (
  `Id` int(11) NOT NULL,
  `Uid` varchar(50) NOT NULL,
  `Tid` varchar(50) NOT NULL,
  `Fid` varchar(50) NOT NULL,
  `Ipadd` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `idchecker`
--

INSERT INTO `idchecker` (`Id`, `Uid`, `Tid`, `Fid`, `Ipadd`, `datetime`) VALUES
(1, '235r32fc54376 ', '1b74d9a495562 ', 'd9528a421933 ', '12:23:13:97', '2024-08-23 18:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `templatelist`
--

CREATE TABLE `templatelist` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Authentication_token` varchar(100) NOT NULL,
  `Flag` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templatelist`
--

INSERT INTO `templatelist` (`Id`, `Name`, `email`, `Description`, `Authentication_token`, `Flag`) VALUES
(1, 'yash', 'yash@gmail.com', 'this is for demo from yash', '1b74d9a495562', 1),
(2, 'Nilesh', 'yash@gmail.com', 'this id demo updated from nilesh', '', 1),
(3, 'nilesh', 'nilesh@gmail.com', 'this demo from another user nilesh', '', 1),
(4, 'yash', 'nilesh@gmail.com', 'this id demo updated two', '', 1),
(5, 'Shreyash', 'yash@gmail.com', 'its temp', '1b74d9a49c62', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dpass` varchar(20) NOT NULL,
  `flag` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `name`, `email`, `dpass`, `flag`) VALUES
(2, 'yash', 'yash@gmail.com', '123', 1),
(3, 'nilesh', 'nilesh@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` char(10) DEFAULT NULL,
  `Authentication_token` varchar(100) NOT NULL,
  `Flag` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`name`, `email`, `password`, `user_type`, `Authentication_token`, `Flag`) VALUES
('Admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'admin', '', 0),
('nilesh', 'nilesh@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '', 1),
('yash', 'yash@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '235r32fc54376', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`Id`);

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
-- Indexes for table `getdata`
--
ALTER TABLE `getdata`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `idchecker`
--
ALTER TABLE `idchecker`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `templatelist`
--
ALTER TABLE `templatelist`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `getdata`
--
ALTER TABLE `getdata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `idchecker`
--
ALTER TABLE `idchecker`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `templatelist`
--
ALTER TABLE `templatelist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
