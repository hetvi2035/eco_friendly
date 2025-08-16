-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2025 at 04:30 PM
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
-- Database: `eco_recycle`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaborations`
--

CREATE TABLE `collaborations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `type_of_waste` varchar(100) DEFAULT NULL,
  `cities` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collaborations`
--

INSERT INTO `collaborations` (`id`, `name`, `address`, `contact`, `type_of_waste`, `cities`, `submitted_at`) VALUES
(1, 'GreenIndia', 'Lunawada, Gujarat', '2356798256', 'Plastic', 'Lunawada ', '2025-06-29 14:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `status` enum('company','citizen','volunteer','municipality') NOT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `organization_name`, `user_name`, `address`, `email`, `contact`, `username`, `password`, `points`) VALUES
(1, 'citizen', 'None', 'abc', 'Mahisagar , Gujarat , India', 'xv299@gmail.com', '6354265565', 'xyz@gmail.com', '$2y$10$AsnD6oETf6JThpOlmx6gdu/kIKGnq206DS/mv56bi8wMuLBgl7t2.', 0),
(2, 'volunteer', 'None', 'Hetvi Patel', 'Mahisagar , Gujarat , India', 'hh203@gmail.com', '6354265565', 'hhh5@', '$2y$10$T8ihhjq/b8u34PEqGbPCde0lHEllVxwFpfFXk0UWoN/jXYM5VIhmu', 0),
(4, 'volunteer', 'None', 'Hetvi Patel', 'Mahisagar , Gujarat , India', 'hh203@gmail.com', '6354265565', 'hetvi20@', '$2y$10$sO2I2valrCoostraHJMJ6uS5Ce9EJyseXcjPxrxfWfZ3d60Jmjw5m', 50),
(5, 'citizen', '', 'User1', 'Xyz', 'hhhh@gmail.com', '654684654', 'User1@', '$2y$10$sXGmDwfEnFTfdKexla1F3ucVcBCOoMMlVR3lMrGl1OPnELqIDpcYi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `waste_contributions`
--

CREATE TABLE `waste_contributions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `waste_type` varchar(50) DEFAULT NULL,
  `amount` decimal(5,2) DEFAULT NULL,
  `city_area` varchar(100) DEFAULT NULL,
  `sunday_slot` enum('1st','2nd','3rd','4th') DEFAULT NULL,
  `contribution_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste_contributions`
--

INSERT INTO `waste_contributions` (`id`, `user_id`, `waste_type`, `amount`, `city_area`, `sunday_slot`, `contribution_date`) VALUES
(1, 4, 'Paper', 5.00, 'Mahisagar', '', '2025-06-30 04:06:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collaborations`
--
ALTER TABLE `collaborations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `waste_contributions`
--
ALTER TABLE `waste_contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collaborations`
--
ALTER TABLE `collaborations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `waste_contributions`
--
ALTER TABLE `waste_contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `waste_contributions`
--
ALTER TABLE `waste_contributions`
  ADD CONSTRAINT `waste_contributions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
