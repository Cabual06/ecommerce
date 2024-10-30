-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2024 at 05:12 PM
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
-- Database: `finery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(200) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` int(200) NOT NULL,
  `placed_on` varchar(200) NOT NULL,
  `payment_status` varchar(200) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(40, 0, 'nash', '123', 'nash@gmail.com', 'Cash On Delivery', 'flat no. dumaguete', '', 0, '19-Feb-2024', 'On your Way'),
(41, 70, 'nash', '123', 'nash@gmail.com', 'Cash On Delivery', 'flat no. dumaguete', 'Striped Shirt with Pocket and Flat Print (2)', 1798, '19-Feb-2024', 'On your Way'),
(42, 0, 'morallo', '123', 'morallo@gmail.com', 'Cash On Delivery', 'flat no. daro,. dumaguete city', '', 0, '20-Feb-2024', 'Pending'),
(43, 70, 'morallo', '123', 'morallo@gmail.com', 'Cash On Delivery', 'flat no. daro,. dumaguete city', 'Super Skinny Jeans (1)', 799, '20-Feb-2024', 'Pending'),
(44, 0, 'nash', '12', 'nash@gmail.com', 'Cash On Delivery', 'flat no. dumaguete', '', 0, '20-Feb-2024', 'Pending'),
(45, 70, 'nash', '12', 'nash@gmail.com', 'Cash On Delivery', 'flat no. dumaguete', 'Nano Smart Travel Bag Nano Smart Travel Bag (1)', 500, '20-Feb-2024', 'Pending'),
(46, 0, 'nash', '12', 'nash@gmail.com', 'Cash On Delivery', 'flat no. dumaguete', '', 0, '20-Feb-2024', 'Pending'),
(47, 70, 'nash', '12', 'nash@gmail.com', 'Cash On Delivery', 'flat no. dumaguete', '', 0, '20-Feb-2024', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `product_detail` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `product_quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_detail`, `image`, `product_quantity`) VALUES
(278, 'Furniture One', 700, 'MEN', 'item1.webp', 200),
(279, 'Furniture Two', 899, 'MEN', 'item2.png', 55),
(280, 'Furniture Three', 399, 'MEN', 'item3.png', 146),
(281, 'Furniture Four', 699, 'MEN', 'item1.webp', 100),
(346, 'Furniture Five', 699, 'MEN', 'item1.webp', 100),
(347, 'Furniture Six', 699, 'MEN', 'item1.webp', 100),
(348, 'Furniture Seven\r\n\r\n', 399, 'MEN', 'item3.png', 146),
(349, 'Furniture Eight\r\n', 700, 'MEN', 'item1.webp', 200),
(350, 'Furniture Nine', 700, 'MEN', 'item1.webp', 200),
(351, 'Furniture Ten', 700, 'MEN', 'item2.png', 200),
(352, 'Furniture Eleven', 700, 'MEN', 'item1.webp', 200),
(353, 'Furniture Twelve', 700, 'MEN', 'item2.png', 200),
(354, 'Furniture Thirteen', 700, 'MEN', 'item1.webp', 200),
(355, 'Furniture Fourteen', 700, 'MEN', 'item1.webp', 200);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(78, 'Ferdinand Cabua', 'efcabual09@gmail.com', 'cabual'),
(79, 'asda', 'sdasd@asdas', 'dasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `pid` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
