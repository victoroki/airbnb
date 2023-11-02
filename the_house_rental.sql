-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 11:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_house_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area`, `city`) VALUES
(1, 'Shalimare', 'Lahore'),
(3, 'Shadarah', 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `house_id`) VALUES
(1, 10, 1),
(3, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'Lahore'),
(2, 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `status`) VALUES
(2, '10', 'Usama Ali', 'usama@gmail.com', 'abc', 'abc test', 'Answered');

-- --------------------------------------------------------

--
-- Table structure for table `dum_card`
--

CREATE TABLE `dum_card` (
  `id` int(11) NOT NULL,
  `card_name` varchar(200) NOT NULL,
  `card_num` varchar(50) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `cvv` varchar(20) NOT NULL,
  `exp_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dum_card`
--

INSERT INTO `dum_card` (`id`, `card_name`, `card_num`, `exp_month`, `cvv`, `exp_year`) VALUES
(1, 'Asad Ali', '1111-2222-3333-4444', 'September', '352', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Rooms` int(11) NOT NULL,
  `Room_Area` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `Detail` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `City`, `Area`, `Address`, `Type`, `Rooms`, `Room_Area`, `Price`, `Detail`, `image`, `status`) VALUES
(1, 'Lahore', 'Shalimar', 'H# 16, ST# 5, Angoori road, Lahore', 'House', 4, '5 Marla', 50000, 'abc', 'img1.jpg', 'in_use'),
(2, 'Lahore', 'Ferozpur', 'H# 123, ST# 12, link road, Lahore', 'House', 5, '5 Marla', 50000, 'The covered area is 1,925 sq. ft. for a double-story 5 Marla building. There is a covered area of 875 per sq. ft. each for the first floor and the second floor. There are two kitchens, three bedrooms along with attached washrooms and a mumtee. ', 'img2.jpeg', ''),
(3, 'Lahore', 'Al-Rehman Garden', 'H# 3, ST# 9, Lahore', 'Apartment', 6, '10 Marla', 80000, 'abc', 'img4.jpg', ''),
(4, 'Lahore', 'DHA', 'H# 46, ST# 2, Phase 2, Lahore', 'Apartment', 6, '10 Marla', 90000, 'abc', 'img2.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `card_name` varchar(200) NOT NULL,
  `card_num` varchar(50) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `cvv` varchar(20) NOT NULL,
  `exp_year` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `house_id` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `card_name`, `card_num`, `exp_month`, `cvv`, `exp_year`, `userid`, `house_id`, `date`) VALUES
(6, 'Asad Ali', '1111-2222-3333-4444', 'September', '352', '2022', 10, '1', '2022-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `contact`, `gender`, `image`, `dob`, `account_type`, `password`) VALUES
(10, 'Usama', 'Ali', 'usama@gmail.com', '030112314567', 'Male', 'profile4.png', '1997-02-18', 'Customer', '123'),
(11, 'Iftikhar', 'Ali', 'admin@gmail.com', '030112314567', 'Male', 'NealSkura.jpg', '', 'Admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dum_card`
--
ALTER TABLE `dum_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dum_card`
--
ALTER TABLE `dum_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
