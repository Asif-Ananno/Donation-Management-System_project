-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 06:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation_details_1`
--

CREATE TABLE `donation_details_1` (
  `donation_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `trx_id` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `donor_name` varchar(30) NOT NULL,
  `receiver_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_details_1`
--

INSERT INTO `donation_details_1` (`donation_id`, `donor_id`, `receiver_id`, `amount`, `trx_id`, `account`, `donor_name`, `receiver_name`) VALUES
(2141, 17, 21, 5000, 75519, 11223344, 'kazi', 'Nowshad'),
(7404, 17, 22, 6700, 4304, 11223344, 'kazi', 'Imam'),
(4153, 20, 21, 3500, 438, 44666777, 'Hafsa', 'Nowshad'),
(3437, 20, 22, 4200, 81294, 44666777, 'Hafsa', 'Imam');

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_details`
--

INSERT INTO `request_details` (`user_id`, `name`, `email`, `amount`, `reason`, `request_id`) VALUES
(21, 'Nowshad', 'nowshad@gmail.com', 10000, 'for helping the flood affected people', 5522),
(22, 'Imam', 'imam@gmail.com', 5000, 'for buying warm cloths for poor people', 14692);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_name` varchar(30) NOT NULL,
  `subscriber_email` varchar(30) NOT NULL,
  `subscriber_phn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`subscriber_id`, `subscriber_name`, `subscriber_email`, `subscriber_phn`) VALUES
(23165, 'Asif', '  asif@gmail.com', 147474747),
(5512, 'Imamul', '  imamul@gmail.com', 12324578),
(13901, 'Farhan', '  farhan@gmail.com', 1111111111);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(30) NOT NULL,
  `user_last_name` varchar(30) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` varchar(30) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_password`, `user_type`, `user_email`) VALUES
(14, 'Asif', 'Rahman', '1234', 'admin', 'asifrahman@gmail.com'),
(17, 'kazi', 'Nazrul', '1234', 'donor', 'kazi@gmail.com'),
(20, 'Hafsa', 'Alim', '1234', 'donor', 'hafsa@gmail.com'),
(21, 'Nowshad', 'Hossain', '1234', 'receiver', 'nowshad@gmail.com'),
(22, 'Imam', 'Sujoy', '1234', 'receiver', 'imam@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
