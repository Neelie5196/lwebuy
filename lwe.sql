-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 07:57 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lwe`
--

CREATE DATABASE IF NOT EXISTS `lwe`;
USE `lwe`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `a_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `postcode` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adjust`
--

CREATE TABLE IF NOT EXISTS `adjust` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adjust`
--

INSERT INTO `adjust` (`id`, `name`, `value`) VALUES
(1, 'currency', '1.57'),
(2, 'point', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `cu_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `tracknum` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `i_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `from_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order_code` varchar(25) NOT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shipping_id` int(11) DEFAULT NULL,
  `action` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `s_id`, `from_id`, `name`, `order_code`, `weight`, `datetime`, `shipping_id`, `action`) VALUES
(25, 2, 'Order Item', 'iphone casing', '12356782', '0.20', '2017-11-09 11:47:03', NULL, 'In');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `oi_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `unit` int(15) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `statuss` varchar(15) DEFAULT NULL,
  `order_code` varchar(25) DEFAULT NULL,
  `datetimes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`oi_id`, `order_id`, `name`, `link`, `type`, `unit`, `remark`, `price`, `statuss`, `order_code`, `datetimes`) VALUES
(101, 1, 'shirt 1', 'https://www.google.com.my/', 'red', 1, 'shirt ', '0.96', NULL, NULL, '2017-11-09 10:35:19'),
(102, 1, 'shirt 2', 'https://www.google.com.my/', 'blue', 3, 'shirt 2', '2.75', NULL, NULL, '2017-11-09 10:35:24'),
(103, 2, 'long pant', 'https://www.google.com.my/', 'yellow', 2, 'yellow', '1.27', NULL, NULL, '2017-11-09 10:39:58'),
(104, 3, 'table', 'https://www.google.com.my/', 'brown', 1, '', '9.55', 'Pending', '41235687', '2017-11-09 11:35:15'),
(105, 3, 'chair', 'https://www.google.com.my/', 'brown', 4, '', '8.28', 'Pending', '28912368', '2017-11-09 11:35:15'),
(106, 3, 'flower', 'https://www.google.com.my/', 'rose', 2, 'red', '12.74', 'Pending', '12329371', '2017-11-09 11:35:15'),
(107, 4, 'iphone cable', 'https://www.google.com.my/', 'blue', 2, '', NULL, NULL, NULL, '2017-11-09 09:22:00'),
(108, 4, 'type-c cable', 'https://www.google.com.my/', 'sliver', 4, '', NULL, NULL, NULL, '2017-11-09 09:22:00'),
(109, 5, 'iphone casing', 'https://www.google.com.my/', 'blue', 2, 'transparent', '7.64', 'Received', '12356782', '2017-11-09 11:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `ol_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`ol_id`, `user_id`, `status`, `datetime`, `price`) VALUES
(1, 10, 'Paid', '2017-11-09 10:42:08', '3.71'),
(2, 10, 'Ready to Pay', '2017-11-09 10:40:02', '1.27'),
(3, 10, 'Proceed', '2017-11-09 11:35:46', '30.57'),
(4, 10, 'Request', '2017-11-09 09:22:00', NULL),
(5, 10, 'Received', '2017-11-09 11:47:03', '7.64');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `price`) VALUES
(1, '100 PTS', 100.00),
(2, '300 PTS', 300.00),
(3, '5000 PTS', 5000.00),
(4, '10000 PTS', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(45) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `file` varchar(150) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `from_order` int(11) DEFAULT NULL,
  `from_shipping` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `user_id`, `datetime`, `title`, `amount`, `file`, `type`, `status`, `from_order`, `from_shipping`) VALUES
(23, 10, '2017-11-09 10:42:08', 'Pay Order 1', '3.71', '27677-ip3.jpg', 'image/jpeg', 'Waiting for Accept', 1, NULL),
(24, 10, '2017-11-09 11:25:06', 'Pay Order 3', '30.57', '76516-ipx.jpg', 'image/jpeg', 'Completed', 3, NULL),
(25, 10, '2017-11-09 11:45:25', 'Pay Order 5', '7.64', '38503-p5.jpg', 'image/jpeg', 'Completed', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE IF NOT EXISTS `point` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receive_request`
--

CREATE TABLE IF NOT EXISTS `receive_request` (
  `rr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order_code` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receive_request`
--

INSERT INTO `receive_request` (`rr_id`, `user_id`, `name`, `order_code`, `status`, `datetime`) VALUES
(8, 10, 'long pant', '123456789', 'Request', '2017-11-09 09:16:33'),
(9, 10, 'macbook', '98765432', 'Request', '2017-11-09 09:23:18'),
(10, 10, 'iphone', '23456789', 'Request', '2017-11-09 09:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `s_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_name` varchar(50) NOT NULL,
  `recipient_contact` varchar(15) NOT NULL,
  `a_id` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tracking_code` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_price`
--

CREATE TABLE IF NOT EXISTS `shipping_price` (
  `sp_id` int(11) NOT NULL,
  `below` varchar(10) NOT NULL,
  `bprice` decimal(10,2) NOT NULL,
  `over` varchar(10) NOT NULL,
  `oprice` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_price`
--

INSERT INTO `shipping_price` (`sp_id`, `below`, `bprice`, `over`, `oprice`) VALUES
(1, '1kg', '50.00', '500g', '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_update_details`
--

CREATE TABLE IF NOT EXISTS `shipping_update_details` (
  `det_id` int(11) NOT NULL,
  `HawbNo` varchar(20) NOT NULL,
  `TransactionDate` datetime NOT NULL,
  `StationCode` varchar(10) NOT NULL,
  `StationDescription` varchar(50) NOT NULL,
  `CountryCode` varchar(10) NOT NULL,
  `CountryDescription` varchar(50) NOT NULL,
  `EventCode` varchar(10) NOT NULL,
  `EventDescription` varchar(1000) NOT NULL,
  `ReasonCode` varchar(10) NOT NULL,
  `ReasonDescription` varchar(1000) NOT NULL,
  `Remark` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_update_summary`
--

CREATE TABLE IF NOT EXISTS `shipping_update_summary` (
  `sum_id` int(11) NOT NULL,
  `HawbNo` varchar(20) NOT NULL,
  `XR1` varchar(20) DEFAULT NULL,
  `XR2` varchar(20) NOT NULL,
  `ShipmentDate` datetime NOT NULL,
  `DeliveryDate` datetime DEFAULT NULL,
  `RecipientName` varchar(50) NOT NULL,
  `SignedName` varchar(50) DEFAULT NULL,
  `OriginStationCode` varchar(10) NOT NULL,
  `OriginStationDescription` varchar(50) NOT NULL,
  `OriginCountryCode` varchar(10) NOT NULL,
  `OriginCountryDescription` varchar(50) NOT NULL,
  `DestinationStationCode` varchar(10) NOT NULL,
  `DestinationStationDescription` varchar(50) NOT NULL,
  `DestinationCountryCode` varchar(10) NOT NULL,
  `DestinationCountryDescription` varchar(50) NOT NULL,
  `EventCode` varchar(10) DEFAULT NULL,
  `EventDescription` varchar(1000) DEFAULT NULL,
  `ReasonCode` varchar(10) NOT NULL,
  `ReasonDescription` varchar(1000) NOT NULL,
  `Remark` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE IF NOT EXISTS `slot` (
  `s_id` int(11) NOT NULL,
  `slot_code` int(100) NOT NULL,
  `slot_num` int(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`s_id`, `slot_code`, `slot_num`, `status`, `user_id`) VALUES
(1, 1000, 1, 'Not in Use', NULL),
(2, 1000, 2, 'In Use', 10),
(3, 2000, 3, 'Not in Use', NULL),
(4, 2000, 4, 'Not in Use', NULL),
(5, 3000, 5, 'Not in Use', NULL),
(6, 3000, 6, 'Not in Use', NULL),
(7, 4000, 7, 'Not in Use', NULL),
(8, 4000, 8, 'Not in Use', NULL),
(9, 5000, 9, 'Not in Use', NULL),
(10, 5000, 10, 'Not in Use', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `login_status` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `contact`, `email`, `password`, `type`, `image`, `login_status`) VALUES
(1, 'Albert', 'Ling', '1234', 'albert@email.com', '$2y$10$4Qss.2kEXKmEciQ0HZ0N1OOaYqXrbymg38gtdjiLlG5e4sFkGvarS', 'customer', '../resources/avatar1.jpg', 'Offline'),
(2, 'Bobby ', 'Tang', '1234', 'bobby@email.com', '$2y$10$2453Uie/j6yywD02UOFlU.9cH0acQPlkXZsvL3XSbEEQjUTy9/sKS', 'customer', '../resources/avatar1.jpg', 'Offline'),
(3, 'Clement', 'Chuo', '1234', 'clement@email.com', '$2y$10$pwUb/fUjz5XFB8L2EvMFJesC6qMe8FCj9/b8CQ1F2F/t5OniMbXdu', 'admin', '../resources/avatar1.jpg', 'Offline'),
(5, 'Eileeen', 'Kho', '1234', 'eileen@email.com', '$2y$10$NKkhLKxM46HnB/4EeRpjw.gWuvwiz/mfcsds7Q4zEMZxgq2N1vJ96', 'admin', '../resources/avatar1.jpg', 'Offline'),
(6, 'Fabian', 'Tang', '1234', 'fabian@email.com', '$2y$10$E3CcjibNLt/D79t7soUKve1j1JoZDUmMuVjgP1Piigugao6GG9F3C', 'staff', '../resources/avatar1.jpg', 'Offline'),
(7, 'Gordon', 'Yii', '1234', 'gordon@email.com', '$2y$10$uOpSbmMFqUesTmvPklp56OHMcAb..qshAlOz31xUN0LeXuYMYddYK', 'customer', '../resources/avatar1.jpg', 'Offline'),
(8, 'Samuel', 'Hto', '1234', 'samuel@email.com', '$2y$10$nuOJ73sWDmZsWvdrR.bLkOyNaXCXCj2fz1BWTsE3PYJaxA7k2KRo.', 'admin', '../resources/avatar1.jpg', 'Offline'),
(10, 'Desmond', 'Kuok', '1234', 'desmond@email.com', '$2y$10$pLraOonvL8szr4M/YISX/uX1xZZbbM9Tabe4CeX0iZVhq.9vXjVoO', 'customer', '../resources/avatar1.jpg', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `wh_id` int(11) NOT NULL,
  `station_code` varchar(10) NOT NULL,
  `station_description` text NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `country_description` text NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `station_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`wh_id`, `station_code`, `station_description`, `country_code`, `country_description`, `company_name`, `station_name`) VALUES
(0, 'SZX', 'SHENZHEN, CHINA, PEOPLE REPUBLIC', 'CN', 'CHINA, PEOPLE REPUBLIC', 'LOGISTICS WORLDWIDE EXPRESS (SHENZHEN)', 'SHENZHEN, CHINA, PEOPLE REPUBLIC'),
(1, 'HKG', 'HONG KONG, HONGKONG', 'HK', 'HONGKONG', 'LOGISTICS WORLDWIDE EXPRESS (HK) LTD', 'HONG KONG, HONGKONG'),
(3, 'MYS', 'LWE LOGISTICS HUB', 'MY', 'MALAYSIA', 'LOGISTICS WORLDWIDE EXPRESS (MALAYSIA)', 'LWE LOGISTICS HUB');
-- --------------------------------------------------------

--
-- Table structure for table `work_station`
--

CREATE TABLE IF NOT EXISTS `work_station` (
  `ws_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wh_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_station`
--

INSERT INTO `work_station` (`ws_id`, `user_id`, `wh_id`) VALUES
(1, 3, 0),
(2, 5, 1),
(3, 8, 1),
(4, 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `adjust`
--
ALTER TABLE `adjust`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`), ADD KEY `user_one` (`user_one`), ADD KEY `user_two` (`user_two`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`), ADD KEY `conversation_id` (`conversation_id`), ADD KEY `user_from` (`user_from`), ADD KEY `user_to` (`user_to`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`oi_id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`ol_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_request`
--
ALTER TABLE `receive_request`
  ADD PRIMARY KEY (`rr_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `shipping_price`
--
ALTER TABLE `shipping_price`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `shipping_update_details`
--
ALTER TABLE `shipping_update_details`
  ADD PRIMARY KEY (`det_id`);

--
-- Indexes for table `shipping_update_summary`
--
ALTER TABLE `shipping_update_summary`
  ADD PRIMARY KEY (`sum_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`s_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`wh_id`);

--
-- Indexes for table `work_station`
--
ALTER TABLE `work_station`
  ADD PRIMARY KEY (`ws_id`), ADD KEY `user_id` (`user_id`), ADD KEY `wh_id` (`wh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `adjust`
--
ALTER TABLE `adjust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `receive_request`
--
ALTER TABLE `receive_request`
  MODIFY `rr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `shipping_price`
--
ALTER TABLE `shipping_price`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shipping_update_details`
--
ALTER TABLE `shipping_update_details`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shipping_update_summary`
--
ALTER TABLE `shipping_update_summary`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `wh_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `work_station`
--
ALTER TABLE `work_station`
  MODIFY `ws_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`user_one`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`user_two`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_from`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`user_to`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `slot`
--
ALTER TABLE `slot`
ADD CONSTRAINT `slot_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `work_station`
--
ALTER TABLE `work_station`
ADD CONSTRAINT `work_station_ibfk_1` FOREIGN KEY (`wh_id`) REFERENCES `warehouse` (`wh_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `work_station_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
