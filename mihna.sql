-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 10:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mihna`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'حرفة النجارة', 'pexels-anna-shvets-5711901.jpg'),
(2, 'حرفة الحدادة', 'pexels-luis-quintero-1659748.jpg'),
(3, 'مبرمج', 'pexels-luis-gomes-546819.jpg'),
(4, 'عامل منازل', 'pexels-andrea-piacquadio-3769740.jpg'),
(5, 'حرفة السباكة', 'pexels-pavel-danilyuk-7937299.jpg'),
(6, 'حرف منزلية', 'pexels-flora-westbrook-4191618.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `crafts`
--

CREATE TABLE `crafts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `start_work` varchar(255) NOT NULL,
  `end_work` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `previous_jobs` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crafts`
--

INSERT INTO `crafts` (`id`, `name`, `experience`, `start_work`, `end_work`, `address`, `previous_jobs`, `notes`, `phone_number`, `email`, `category_id`, `user_id`, `image`) VALUES
(1, 'خالد للسباكة', '12 سنة', '8 AM', '8 PM', 'Amman, Jordan', '', 'جميع اعمال السباكة والتمديدات خبرة لأكثر من 12 سنة في المجال لدي العديد من المشاريع يمكنك رؤيتها', '0778122927', 'admin@admin.com', 5, 1, 'pexels-pavel-danilyuk-7937299.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `image`) VALUES
(1, 'Loai', 'Mustafa', 'Loai@gmail.com', 'Loai.st12', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crafts`
--
ALTER TABLE `crafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crafts_ibfk_1` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `crafts`
--
ALTER TABLE `crafts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crafts`
--
ALTER TABLE `crafts`
  ADD CONSTRAINT `crafts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crafts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
