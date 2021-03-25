-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 07, 2021 at 06:07 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rewards`
--

-- --------------------------------------------------------

--
-- Table structure for table `giftcard`
--

CREATE TABLE `giftcard` (
  `cardId` int(11) UNSIGNED NOT NULL,
  `cardName` varchar(100) NOT NULL,
  `cardType` varchar(100) NOT NULL,
  `cardValue` float NOT NULL,
  `points` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giftcard`
--

INSERT INTO `giftcard` (`cardId`, `cardName`, `cardType`, `cardValue`, `points`) VALUES
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giftcard`
--
ALTER TABLE `giftcard`
  ADD PRIMARY KEY (`cardId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giftcard`
--
ALTER TABLE `giftcard`
  MODIFY `cardId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
