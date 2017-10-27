-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 06:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lwe`
--

-- --------------------------------------------------------

--
-- Table structure for table `abx`
--

CREATE TABLE `abx` (
  `id` int(11) NOT NULL,
  `weight` varchar(25) NOT NULL,
  `price` varchar(25) NOT NULL,
  `place` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abx`
--

INSERT INTO `abx` (`id`, `weight`, `price`, `place`) VALUES
(1, 'First 1 KG', 'RM19', 'east'),
(2, '1.5 - 10 KG', 'RM8/ 0.5 KG', 'east'),
(3, 'above 10 KG', 'RM7.5 / 0.5 KG', 'east');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `a_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `postcode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`a_id`, `user_id`, `address`, `state`, `city`, `postcode`) VALUES
(1, 1, 'erwer,wer,wer,wer,wer,wer', 'ewdzf', 'wdasd', 12345),
(2, 1, 'qwedzxcwr ,awsdad,asdqw', 'asda', 'sfasf', 23455);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cu_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `tracknum` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cu_id`, `name`, `contact`, `email`, `subject`, `tracknum`, `message`, `datetime`, `status`) VALUES
(2, 'SAD', '123', 'qwe@as.com', 'qwe', 'qwe', 'df', '2017-10-15 03:15:26', 'unread'),
(3, '123', '123', '123@d.com', '123', '12', '123', '2017-10-15 05:23:07', 'read'),
(4, 'SAD', '123', 'qwe@as.com', 'qwe', 'qwe', 'df', '2017-10-15 03:15:26', 'read'),
(5, '123', '123', '123@d.com', '123', '12', '123', '2017-10-15 05:23:07', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `ib_id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_reply`
--

CREATE TABLE `inbox_reply` (
  `ibr_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inbox_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `i_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `from_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order_code` varchar(25) NOT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `s_id`, `from_id`, `name`, `order_code`, `weight`, `datetime`) VALUES
(17, 1, 'Order Item', 'test3', '123', '12.00', '2017-10-27 15:40:15'),
(18, 1, 'Receive Request', '1', '9789861985350', '21.00', '2017-10-27 15:40:23'),
(19, 1, 'Order Item', 'test3', '234', '23.00', '2017-10-27 15:40:28'),
(20, 7, 'Order Item', '4', 'FREIGHT MARK', '32.00', '2017-10-27 15:40:48'),
(21, 1, 'Receive Request', '2', '2', '12.00', '2017-10-27 15:40:53'),
(22, 7, 'Receive Request', '1', '1', '43.00', '2017-10-27 15:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`oi_id`, `order_id`, `name`, `link`, `type`, `unit`, `remark`, `price`, `statuss`, `order_code`, `datetimes`) VALUES
(85, 2, 'test2', 'test2', 'test2', 2, 'test2-1', '13.00', '', NULL, '0000-00-00 00:00:00'),
(86, 2, 'test2', 'test2', 'test2', 2, 'test2-2', '23.00', '', NULL, '0000-00-00 00:00:00'),
(87, 3, 'test3', 'test3', 'test3', 3, 'test3-1', '23.00', 'Pending', '123', '2017-10-27 13:42:35'),
(88, 3, 'test3', 'test3', 'test3', 3, 'test3-2', '12.00', 'Pending', '234', '2017-10-27 13:26:50'),
(89, 4, '4', '4', '4', 4, '444', '219.00', 'Pending', 'FREIGHT MARK', '2017-10-27 13:42:38'),
(90, 9, '4', '4', '4', 4, '444', '219.00', 'Received', '123', '0000-00-00 00:00:00'),
(91, 10, '4', '4', '4', 4, '444', '219.00', 'Received', '234', '0000-00-00 00:00:00'),
(92, 11, 'try', 'try', 'try', 2, 'try', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(93, 12, '1', '2', '1', 2, '12', NULL, NULL, NULL, '2017-10-25 11:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `ol_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`ol_id`, `user_id`, `status`, `datetime`, `price`) VALUES
(2, 10, 'Request', '2017-10-23 06:25:31', '35.00'),
(3, 10, 'Ready to pay', '2017-10-26 05:12:56', '35.00'),
(4, 1, 'Paid', '2017-10-27 13:42:23', '23.00'),
(9, 10, 'Proceed', '2017-10-23 06:25:45', NULL),
(10, 10, 'Received', '2017-10-23 06:25:45', '219.00'),
(11, 10, 'Request', '2017-10-22 08:46:13', NULL),
(12, 10, 'Request', '2017-10-25 11:58:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `id` int(11) NOT NULL,
  `fromsender` text NOT NULL,
  `toreceiver` text NOT NULL,
  `content` text NOT NULL,
  `value` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`id`, `fromsender`, `toreceiver`, `content`, `value`) VALUES
(2, '', '', 'yoyo', 'rm100'),
(3, 'me', 'yoy', 'yoyo', 'rm100');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(45) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `file` varchar(150) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `from_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `user_id`, `datetime`, `title`, `amount`, `file`, `type`, `status`, `from_id`) VALUES
(5, 10, '2017-10-25 11:25:50', '6666', '66.66', '74679-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Completed', 0),
(6, 1, '2017-10-25 11:17:10', '444', '4.44', '8761-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Waiting for Approve', 0),
(7, 10, '2017-10-25 09:55:22', 'Reload + 222', '2.22', '27001-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Completed', 0),
(8, 10, '2017-10-25 11:17:10', 'Reload 1', '0.01', '98523-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Waiting for Approve', 0),
(9, 10, '2017-10-25 10:09:05', 'Reload 444 Point', '4.44', '76809-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Waiting for Approve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`id`, `user_id`, `point`) VALUES
(1, 10, 16500),
(3, 1, 444);

-- --------------------------------------------------------

--
-- Table structure for table `poslaju`
--

CREATE TABLE `poslaju` (
  `id` int(11) NOT NULL,
  `weight` varchar(25) NOT NULL,
  `price` varchar(25) NOT NULL,
  `place` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poslaju`
--

INSERT INTO `poslaju` (`id`, `weight`, `price`, `place`) VALUES
(1, '0.5 - 1.5 KG', 'RM6 / 0.5 KG', 'west'),
(2, '2.0 - 3.5 KG', 'RM5.5 / 0.5 KG', 'west'),
(3, '4.0 - 10 KG', 'RM5.0 / 0.5 KG', 'west'),
(4, 'above 10 KG', 'RM4.5 / 0.5 KG', 'west'),
(5, 'First 1 KG', 'RM19', 'east'),
(6, '1.5 - 10 KG', 'RM8 / 0.5 KG', 'east'),
(7, 'above 10 KG', 'RM7.5 / 0.5 KG', 'east');

-- --------------------------------------------------------

--
-- Table structure for table `receive_request`
--

CREATE TABLE `receive_request` (
  `rr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order_code` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receive_request`
--

INSERT INTO `receive_request` (`rr_id`, `user_id`, `name`, `order_code`, `status`, `datetime`) VALUES
(2, 10, '1', '9789861985350', 'Request', '2017-10-27 11:45:38'),
(3, 10, '2', '2', 'Request', '2017-10-26 04:17:14'),
(5, 10, '2', '3', 'Received', '2017-10-21 09:28:08'),
(6, 1, '1', '1', 'Request', '2017-10-27 13:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `s_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_code` varchar(20) NOT NULL,
  `order_number` int(11) NOT NULL,
  `ship_to` varchar(25) NOT NULL,
  `courier` varchar(25) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`s_id`, `user_id`, `tracking_code`, `order_number`, `ship_to`, `courier`, `order_date`, `status`) VALUES
(1, 10, 'ASFLF214', 112214141, 'house', 'Skynet', '2017-10-04 06:12:29', 'pending'),
(2, 10, 'SGLH12H3', 0, '', '', '0000-00-00 00:00:00', 'proceeded');

-- --------------------------------------------------------

--
-- Table structure for table `skynet`
--

CREATE TABLE `skynet` (
  `id` int(11) NOT NULL,
  `weight` varchar(25) NOT NULL,
  `price` varchar(25) NOT NULL,
  `place` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skynet`
--

INSERT INTO `skynet` (`id`, `weight`, `price`, `place`) VALUES
(1, '0.5 - 2.0 KG', 'RM6 / 0.5 KG', 'west'),
(2, '2.5 KG', 'RM5.5 / 0.5 KG', 'west'),
(3, '3.0 - 10 KG', 'RM5 / 0.5 KG', 'west'),
(4, 'above 10 KG', 'RM4.5 / 0.5 KG', 'west');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `s_id` int(11) NOT NULL,
  `slot_code` int(100) NOT NULL,
  `slot_num` int(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`s_id`, `slot_code`, `slot_num`, `status`, `user_id`) VALUES
(1, 1000, 1, 'In Use', 10),
(2, 1000, 2, 'Not in Use', NULL),
(3, 2000, 3, 'In Use', 3),
(4, 2000, 4, 'In Use', 5),
(5, 3000, 5, 'Not in Use', NULL),
(6, 3000, 6, 'In Use', 7),
(7, 4000, 7, 'In Use', 1),
(8, 4000, 8, 'Not in Use', NULL),
(9, 5000, 9, 'In Use', 2),
(10, 5000, 10, 'Not in Use', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `track_detail`
--

CREATE TABLE `track_detail` (
  `td_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `track_summary`
--

CREATE TABLE `track_summary` (
  `ts_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `contact`, `email`, `password`, `type`) VALUES
(1, 'Albert', 'Ling', NULL, 'albert@email.com', '$2y$10$4Qss.2kEXKmEciQ0HZ0N1OOaYqXrbymg38gtdjiLlG5e4sFkGvarS', 'customer'),
(2, 'Bobby ', 'Tang', NULL, 'bobby@email.com', '$2y$10$2453Uie/j6yywD02UOFlU.9cH0acQPlkXZsvL3XSbEEQjUTy9/sKS', 'customer'),
(3, 'Clement', 'Chuo', NULL, 'clement@email.com', '$2y$10$xzv/iSSjAuxLhLbR4rgTdeYHuy01BPZjzHJ.9R9hPix5Dpw0nGr2y', 'admin'),
(5, 'Eileeen', 'Kho', NULL, 'eileen@email.com', '$2y$10$NKkhLKxM46HnB/4EeRpjw.gWuvwiz/mfcsds7Q4zEMZxgq2N1vJ96', 'admin'),
(6, 'Fabian', 'Tang', NULL, 'fabian@email.com', '$2y$10$E3CcjibNLt/D79t7soUKve1j1JoZDUmMuVjgP1Piigugao6GG9F3C', 'staff'),
(7, 'Gordon', 'Yii', NULL, 'gordon@email.com', '$2y$10$uOpSbmMFqUesTmvPklp56OHMcAb..qshAlOz31xUN0LeXuYMYddYK', 'customer'),
(8, 'Samuel', 'Hto', NULL, 'samuel@email.com', '$2y$10$nuOJ73sWDmZsWvdrR.bLkOyNaXCXCj2fz1BWTsE3PYJaxA7k2KRo.', 'admin'),
(10, 'Desmond', 'Kuok', NULL, 'desmond@email.com', '$2y$10$pLraOonvL8szr4M/YISX/uX1xZZbbM9Tabe4CeX0iZVhq.9vXjVoO', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `wh_id` int(11) NOT NULL,
  `station_code` varchar(10) NOT NULL,
  `station_description` text NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `country_description` text NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `station_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`wh_id`, `station_code`, `station_description`, `country_code`, `country_description`, `company_name`, `station_name`) VALUES
(0, 'SZX', 'SHENZHEN, CHINA, PEOPLE REPUBLIC', 'CN', 'CHINA, PEOPLE REPUBLIC', 'LOGISTICS WORLDWIDE EXPRESS (SHENZHEN)', 'SHENZHEN, CHINA, PEOPLE REPUBLIC'),
(1, 'HKG', 'HONG KONG, HONGKONG', 'HK', 'HONGKONG', 'LOGISTICS WORLDWIDE EXPRESS (HK) LTD', 'HONG KONG, HONGKONG');

-- --------------------------------------------------------

--
-- Table structure for table `work_station`
--

CREATE TABLE `work_station` (
  `ws_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_station`
--

INSERT INTO `work_station` (`ws_id`, `user_id`, `wh_id`) VALUES
(1, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abx`
--
ALTER TABLE `abx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ib_id`);

--
-- Indexes for table `inbox_reply`
--
ALTER TABLE `inbox_reply`
  ADD PRIMARY KEY (`ibr_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`oi_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`ol_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
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
-- Indexes for table `poslaju`
--
ALTER TABLE `poslaju`
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
-- Indexes for table `skynet`
--
ALTER TABLE `skynet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `track_detail`
--
ALTER TABLE `track_detail`
  ADD PRIMARY KEY (`td_id`);

--
-- Indexes for table `track_summary`
--
ALTER TABLE `track_summary`
  ADD PRIMARY KEY (`ts_id`);

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
  ADD PRIMARY KEY (`ws_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `wh_id` (`wh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abx`
--
ALTER TABLE `abx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ib_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_reply`
--
ALTER TABLE `inbox_reply`
  MODIFY `ibr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `poslaju`
--
ALTER TABLE `poslaju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `receive_request`
--
ALTER TABLE `receive_request`
  MODIFY `rr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skynet`
--
ALTER TABLE `skynet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `track_detail`
--
ALTER TABLE `track_detail`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `track_summary`
--
ALTER TABLE `track_summary`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `wh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `work_station`
--
ALTER TABLE `work_station`
  MODIFY `ws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

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
