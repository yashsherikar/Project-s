-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 04:46 AM
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
-- Database: `burger_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_image`, `product_code`) VALUES
(2, 'hamburger', '220', 'assets/img/plate1.png\"', 'p1000'),
(3, 'veg patties\r\n', '200', 'assets/img/plate2.png\"', 'p1001'),
(4, 'chicken burger ', '250', 'assets/img/plate3.png\"', 'p1002'),
(5, 'Veg tower burger\r\n', '150', 'assets/img/plate4.png\"', 'p1003'),
(6, 'Double Cheeseburger', '140', 'assets/img/plate5.png\"', 'p1004'),
(7, 'Bacon Double', '199', 'assets/img/plate6.png\"', 'p1005'),
(8, 'Burger King', '210', 'assets/img/plate7.png\"', 'p1006'),
(9, 'Double Egg', '75', 'assets/img/plate8.png\"', 'p1007'),
(10, 'Cheese Muffin', '150', 'assets/img/plate9.png\"', 'p1008'),
(11, 'Hamburguesa', '180', 'assets/img/plate10.png\"', 'p1009'),
(12, 'Bacon Egg', '300', 'assets/img/plate11.png', 'p1010'),
(13, 'Pulled Pork ', '120', 'assets/img/plate12.png', 'p1011');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
