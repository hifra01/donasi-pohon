-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2021 at 03:18 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasi-pohon`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `plant_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=Awaiting payment, 2=Processing,\r\n3=Completed,\r\n4=Canceled ',
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `event_id`, `plant_id`, `price`, `amount`, `total_price`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 3, 25000, 4, 100000, 3, NULL, '2021-06-13 07:47:14', '2021-06-14 05:09:13'),
(2, 1, 4, 3, 25000, 9, 225000, 4, NULL, '2021-06-14 04:46:52', '2021-06-14 05:09:20'),
(3, 2, 4, 3, 25000, 4, 100000, 2, NULL, '2021-06-14 04:49:22', '2021-06-14 04:50:15'),
(4, 1, 4, 3, 25000, 9, 225000, 2, NULL, '2021-06-14 13:26:06', '2021-06-14 13:37:07'),
(5, 1, 4, 2, 10000, 6, 60000, 2, NULL, '2021-06-14 13:37:57', '2021-06-14 13:39:54'),
(6, 3, 4, 3, 25000, 3, 75000, 3, NULL, '2021-06-15 13:23:39', '2021-06-15 13:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1' COMMENT '1. Coming soon,\r\n2. Ongoing,\r\n3. Finished',
  `start_date` datetime NOT NULL COMMENT 'Tanggal mulai event',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `location`, `description`, `status`, `start_date`, `created_at`, `updated_at`) VALUES
(4, 'Penghijauan Desa Sukaneduh', 'Desa Sukaneduh, Zimbabwe Timur', '<p>Penghijauan Desa Sukaneduh Kabupaten Zimbabwe Barat.</p><p>Ayo datang dan ramaikan!<br></p>', 1, '2021-07-01 08:00:00', '2021-06-10 04:26:22', '2021-06-14 13:24:52'),
(5, 'Taman Kota Jember', 'Jember', '<p>Menanam tanaman untuk taman kota<br></p>', 1, '2021-06-20 08:00:00', '2021-06-15 13:30:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_plants`
--

CREATE TABLE `events_plants` (
  `id` bigint(20) NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `plant_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_plants`
--

INSERT INTO `events_plants` (`id`, `event_id`, `plant_id`) VALUES
(4, 4, 2),
(9, 4, 3),
(10, 5, 2),
(11, 5, 3),
(12, 5, 4),
(13, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `donation_id` bigint(20) NOT NULL,
  `amount` bigint(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_account` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=pending, 2=confirmed',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `donation_id`, `amount`, `bank_name`, `bank_account`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 100000, 'BCA', '89290393727', 2, '2021-06-13 07:47:14', '2021-06-14 04:44:15'),
(2, 2, 225000, 'ABC', '123456789', 2, '2021-06-14 04:46:52', '2021-06-14 04:47:40'),
(3, 3, 100000, 'BNI', '41566162717621', 2, '2021-06-14 04:49:22', '2021-06-14 04:50:15'),
(4, 4, 225000, 'BNI', '3767367273632', 2, '2021-06-14 13:26:06', '2021-06-14 13:37:07'),
(5, 5, 60000, 'BCA', '87387438738', 2, '2021-06-14 13:37:57', '2021-06-14 13:39:54'),
(6, 6, 75000, 'BCA', '6262688712', 2, '2021-06-15 13:23:39', '2021-06-15 13:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Bakau', 12000, '2021-06-07 06:45:38', '2021-06-10 12:58:18'),
(2, 'Mahoni', 10000, '2021-06-07 06:48:54', NULL),
(3, 'Cemara', 25000, '2021-06-08 14:24:58', NULL),
(4, 'Pinus', 45000, '2021-06-15 13:06:44', NULL),
(5, 'Angsana', 10000, '2021-06-15 13:08:02', NULL),
(6, 'Jati', 5000, '2021-06-15 13:29:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(2) NOT NULL DEFAULT '2' COMMENT '1. Admin\r\n2. User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@donasi-pohon.test', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Hilman F. Rakhmad', 'hilman@donasi-pohon.test', '202cb962ac59075b964b07152d234b70', 2),
(3, 'Hilman', 'hilman@email.com', 'cf081b11e184de45ecce347f758936f9', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_plants`
--
ALTER TABLE `events_plants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_id` (`donation_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events_plants`
--
ALTER TABLE `events_plants`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `donations_ibfk_3` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`);

--
-- Constraints for table `events_plants`
--
ALTER TABLE `events_plants`
  ADD CONSTRAINT `events_plants_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `events_plants_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
