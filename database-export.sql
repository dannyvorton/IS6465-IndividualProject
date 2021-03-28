-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 28, 2021 at 10:22 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rewards`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_type` varchar(128) NOT NULL,
  `points` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gift_card`
--

CREATE TABLE `gift_card` (
  `card_id` int(11) UNSIGNED NOT NULL,
  `card_name` varchar(128) NOT NULL,
  `card_type` varchar(128) NOT NULL,
  `card_value` float NOT NULL,
  `points` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gift_card`
--

INSERT INTO `gift_card` (`card_id`, `card_name`, `card_type`, `card_value`, `points`) VALUES
(1, 'Visa', 'Credit Card', 25, 20),
(2, 'Grubhub', 'Restaurant Card', 50, 40),
(3, 'Chilis', 'Restaurant Card', 25, 20),
(4, 'Amazon', 'Store Card', 40, 35),
(5, 'Whole Foods', 'Store Card', 25, 20),
(6, 'Red Lobster', 'Restaurant Card', 25, 20),
(7, 'Chipotle', 'Restaurant Card', 45, 40),
(8, 'Panera Bread', 'Restaurant Card', 25, 25),
(9, 'Dominos', 'Restaurant Card', 20, 15),
(10, 'Buffalo Wild Wings', 'Restaurant Card', 30, 25),
(11, 'Lowes', 'Store Card', 200, 175),
(12, 'Papa Johns', 'Restaurant Card', 25, 20),
(13, 'Apple', 'Store Card', 50, 45),
(14, 'Best Buy', 'Store Card', 250, 200),
(15, 'Google Play', 'Store Card', 35, 30),
(16, 'Texas Roadhouse', 'Restaurant Card', 25, 20),
(17, 'DoorDash', 'Restaurant Card', 35, 30),
(18, 'Netflix', 'Subscription Card', 25, 20),
(19, 'Taco Bell', 'Restaurant Card', 25, 20),
(20, 'Spotify', 'Subsription Card', 99, 75);

-- --------------------------------------------------------

--
-- Table structure for table `redemption`
--

CREATE TABLE `redemption` (
  `redeem_id` int(11) UNSIGNED NOT NULL,
  `date` varchar(128) NOT NULL,
  `account_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `points_redeemed` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `username`, `password`, `role`, `points`) VALUES
(12, 'Bill', 'Smith', 'bill.smith@utah.edu', 'bsmith', '$2y$10$LFz1tujrPKKSqiPEkKT3/.YaFvXGg8FK1jVPIx657V./sSYg23z8.', 'admin', NULL),
(13, 'Pauline', 'Jones', 'pauline.jones@utah.edu', 'pjones', '$2y$10$Q6UQ3nJSisbNgZVPYvkfte4NdorldfC36Vo6wwBfO16Ud1paP25a.', 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `redemption`
--
ALTER TABLE `redemption`
  ADD PRIMARY KEY (`redeem_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `card_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `redemption`
--
ALTER TABLE `redemption`
  MODIFY `redeem_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
