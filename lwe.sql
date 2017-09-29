-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 05:23 AM
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
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cu_id`, `name`, `contact`, `email`, `subject`, `tracknum`, `message`) VALUES
(2, 'SAD', '123', 'qwe@as.com', 'qwe', 'qwe', 'df');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `package` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reference_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `oi_id` int(11) NOT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`oi_id`, `order_id`, `name`, `link`, `type`, `unit`, `remark`, `price`) VALUES
(50, 1, '1', '1', '1', 1, '', '10.00'),
(52, 2, '2', '2', '2', 2, '', '20.00'),
(55, 3, 'SAD', 'https://www.youtube.com/', 'YOU', 3, 'TUBEeeeeee', '45.00'),
(56, 3, '3', '3', '3', 3, '12344566', '3.00'),
(57, 4, '1', '1', '1', 1, '1111', NULL),
(58, 4, '2', '2', '2', 2, '2222', NULL);

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
(1, 1, 'Success', '2017-09-24 10:51:00', '12.50'),
(2, 1, 'Pending', '2017-09-24 05:33:46', NULL),
(3, 1, 'Pending', '2017-09-24 10:43:21', NULL),
(4, 2, 'Pending', '2017-09-24 10:47:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reference_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `s_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `contact`, `email`, `password`, `type`) VALUES
(1, 'one', 'user one one', '44444411', '11@gmail.com', '44', 'customer'),
(2, 'qwe', 'asdasd', '12334123', 'adsasd', 'ADXas', 'customer'),
(4, '123', '123', NULL, '123@d.com', '123', 'customer');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`c_id`);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`s_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
