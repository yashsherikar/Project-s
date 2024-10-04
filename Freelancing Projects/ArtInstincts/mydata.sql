-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 07:37 AM
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
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`name`, `email`, `address`, `phone`, `password`, `user_type`) VALUES
('Admin', 'admin@gmail.com', 'nan', 0, 'admin@123', 'admin'),
('yash', 'yash@gmail.com', 'sangli', 86980115606, '123', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
