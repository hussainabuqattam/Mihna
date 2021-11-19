-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 07:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin', 'Admin@gmail.com', 'admin', 'user.png');

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
(8, 'حرف منزلية', 'pexels-flora-westbrook-4191618.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'خالد للسباكة', '25 سنة', '8 AM', '8 PM', 'Amman, Jordan', '', 'جميع اعمال السباكة والتمديدات خبرة لأكثر من 12 سنة في المجال لدي العديد من المشاريع يمكنك رؤيتها', '0771234567', 'loai.mustafa@gmail.com', 5, 1, 'pexels-pavel-danilyuk-7937299.jpg'),
(5, 'شركة راشد للنجارة', '25 سنة', '8 AM', '8 PM', 'Amman, Jordan', '', 'شركة راشد للنجارة هذه الشركة منذ 1997 نعمل في جميع ما يخص التجارة والمطابخ', '0771234567', 'loai.abdelqader.la@gmail.com', 1, 6, 'pexels-anna-shvets-5711901.jpg'),
(6, 'ايمن للحدادة', '10 سنوات', '10 AM', '7 PM', 'Amman, Jordan', '', 'اعمل في المجال منذ 10 سنوات ولدي العديد من المشاريع تواصل معي لرؤية بعض اعمالي', '0771234567', 'user1@gmail.com', 2, 5, 'pexels-luis-quintero-1659748.jpg'),
(7, 'محلات محمد ذيب للنجارة', '15 سنوات', '12 PM', '8 PM', 'Amman, Jordan', '', 'محمد ذيب للنجارة هذه الشركة منذ 2005 نعمل في جميع ما يخص التجارة والمطابخ', '0771234567', 'user3@gmail.com', 1, 7, 'pexels-thijs-van-der-weide-1094767.jpg'),
(8, 'رامي للنجارة', '15 سنوات', '11 AM', '5 PM', 'Amman, Jordan', '', 'شركة رامي للنجارة هذه الشركة منذ 2009 تعمل في جميع ما يخص التجارة والمطابخ', '0771234567', 'user4@gmail.com', 1, 8, 'pexels-anna-shvets-5711901.jpg'),
(9, 'اسعد للحدادة', '10 سنوات', '9 AM', '3 PM', 'Amman, Jordan', '', 'اعمل في المجال منذ 10 سنوات ولدي العديد من المشاريع تواصل معي لرؤية بعض اعمالي', '0771234567', 'user5@gmail.com', 2, 9, 'pexels-anete-lusina-4792478.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `craft_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number_ratings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `craft_id`, `user_id`, `number_ratings`) VALUES
(1, 3, 2, 5),
(2, 5, 2, 4),
(3, 7, 2, 3),
(4, 8, 2, 5),
(5, 6, 2, 1),
(6, 9, 2, 2),
(7, 5, 10, 4),
(8, 7, 10, 5),
(9, 8, 10, 5),
(10, 6, 10, 5),
(11, 9, 10, 2),
(12, 3, 10, 4);

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
  `type_user` varchar(255) NOT NULL DEFAULT 'craft presenter',
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `type_user`, `image`) VALUES
(1, 'user', 'user', 'user@gmail.com', 'user', 'مقدم حرفة', 'user.png'),
(2, 'user6', 'user6', 'user6@gmail.com', 'user', 'مواطن', 'user.png'),
(5, 'user1', 'user1', 'user1@gmail.com', 'user', 'مقدم حرفة', 'user.png'),
(6, 'user2', 'user2', 'user2@gmail.com', 'user', 'مقدم حرفة', 'user.png'),
(7, 'user3', 'user3', 'user3@gmail.com', 'user', 'مقدم حرفة', 'user.png'),
(8, 'user4', 'user4', 'user4@gmail.com', 'user', 'مقدم حرفة', 'user.png'),
(9, 'user5', 'user5', 'user5@gmail.com', 'user', 'مقدم حرفة', 'user.png'),
(10, 'user7', 'user7', 'user7@gmail.com', 'user', 'مواطن', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crafts`
--
ALTER TABLE `crafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crafts_ibfk_1` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `craft_id` (`craft_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `crafts`
--
ALTER TABLE `crafts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crafts`
--
ALTER TABLE `crafts`
  ADD CONSTRAINT `crafts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crafts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`craft_id`) REFERENCES `crafts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
