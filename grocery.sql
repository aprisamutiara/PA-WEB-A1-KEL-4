-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 04:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(1, 'pisang', 1230, '2023-11-16_20-54-01_pisang.jpg', 1),
(2, 'chicken', 40000, '2023-11-16_18-40-05_chicken.png', 1),
(3, 'tomato', 3000, '2023-11-16_11-38-55_tomato.png', 1),
(4, 'anggur', 45000, '2023-11-16_09-37-40_anggur.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `first_name`, `last_name`, `date_birth`, `email`, `username`, `password`, `confirm_password`, `login_time`) VALUES
(1, '', '', '0000-00-00', 'admin@gmail.com', 'admin', 'admin123', 'admin123', '2023-11-16 11:48:31'),
(2, 'Adriati', 'Manuk Allo', '2004-05-15', 'adriatimank75@gmail.com', 'tiaadri15', 'hambaallah33', 'hambaallah33', '2023-11-16 11:48:31'),
(3, 'aprisa', 'idma', '2023-11-18', 'risa@gmaill.com', 'risa', 'risa11', 'risa11', '2023-11-16 13:04:53'),
(4, 'juni', 'ver', '2023-11-18', 'juni@gmail.com', 'juniver', 'juni', 'juni', '2023-11-16 14:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `pendataan`
--

CREATE TABLE `pendataan` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date_of_entry` date NOT NULL,
  `expired` date NOT NULL,
  `stock` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendataan`
--

INSERT INTO `pendataan` (`id`, `category`, `name`, `price`, `date_of_entry`, `expired`, `stock`, `description`, `image`) VALUES
(7, 'fruits', 'anggur', 45000, '2023-11-16', '2023-11-16', 12, 'buah anggur ini sangat enak dan murah lohh', '2023-11-16_09-37-40_anggur.png'),
(9, 'vegetables', 'tomato', 3000, '2023-11-14', '2023-11-16', 12, 'tomat adalah anan', '2023-11-16_11-38-55_tomato.png'),
(10, 'meats', 'chicken', 40000, '0000-00-00', '0000-00-00', 1, 'sdfghjkl;', '2023-11-16_18-40-05_chicken.png'),
(11, 'fruits', 'pisang', 1230, '2023-11-16', '2023-11-30', 200, 'Pisang ini sangat bergizi', '2023-11-16_20-54-01_pisang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `user_id` int(255) DEFAULT NULL,
  `order_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `no_phone` int(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `address3` varchar(255) NOT NULL,
  `total_product` int(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `payment_method` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`user_id`, `order_date`, `email`, `name`, `no_phone`, `address`, `address2`, `address3`, `total_product`, `total_price`, `payment_method`) VALUES
(0, '0000-00-00', 'adriatimanukallo@gmail.com', 'adri', 789, 'ghjk', 'ghj', 'fgh', 0, 0, '45000'),
(0, '2023-11-16', 'adriatimanukallo@gmail.com', 'adri', 789, 'ghjk', 'ghj', 'fgh', 0, 0, '45000'),
(0, '2023-11-16', 'adriatimanukallo@gmail.com', 'adri', 789, 'ghjk', 'ghj', 'fgh', 0, 0, '45000'),
(0, '2023-11-16', 'risa@gmaill.com', 'adri', 12345, 'samarinda', 'jl.pramuka', 'pramuka mart', 0, 0, '45000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendataan`
--
ALTER TABLE `pendataan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendataan`
--
ALTER TABLE `pendataan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
