-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2017 at 12:29 PM
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
(5, '123', '123', '123@d.com', '123', '12', '123', '2017-10-15 05:23:07', 'unread');

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

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`c_id`, `user_id`, `datetime`, `package`, `amount`, `status`, `reference_code`) VALUES
(1, 10, '2017-10-07 07:58:21', '', '0.00', '', 0);

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
(85, 2, 'test2', 'test2', 'test2', 2, 'test2-1', '12.00'),
(86, 2, 'test2', 'test2', 'test2', 2, 'test2-2', '23.00'),
(87, 3, 'test3', 'test3', 'test3', 3, 'test3-1', '23.00'),
(88, 3, 'test3', 'test3', 'test3', 3, 'test3-2', '12.00'),
(89, 4, '4', '4', '4', 4, '444', '219.00'),
(90, 9, '4', '4', '4', 4, '444', '219.00'),
(91, 10, '4', '4', '4', 4, '444', '219.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `ol_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(10,2) DEFAULT NULL,
  `order_code` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`ol_id`, `user_id`, `status`, `datetime`, `price`, `order_code`) VALUES
(2, 10, 'Request', '2017-10-12 02:47:02', '35.00', NULL),
(3, 10, 'ready to pay', '2017-10-15 03:26:32', '35.00', NULL),
(4, 10, 'paid', '2017-10-12 06:16:44', '23.00', 123),
(9, 10, 'proceed', '2017-10-12 06:17:21', NULL, 123),
(10, 10, 'received', '2017-10-12 02:34:50', '219.00', NULL);

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
  `amount` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reference_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, '123', '123', NULL, '123@d.com', '123', 'admin'),
(4, '234', '234', '2332', '234@s.com', '234', 'customer'),
(5, '678', '8876', '23525241', 'sdf@gmail.com', '11', 'staff'),
(10, '51', '96', '1234', '5196@email.com', '5106', 'customer'),
(11, 'hii', 'hii', '1131', 'sam@email.com', '123', 'admin');

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
-- Indexes for table `poslaju`
--
ALTER TABLE `poslaju`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poslaju`
--
ALTER TABLE `poslaju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
-- Constraints for table `work_station`
--
ALTER TABLE `work_station`
  ADD CONSTRAINT `work_station_ibfk_1` FOREIGN KEY (`wh_id`) REFERENCES `warehouse` (`wh_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `work_station_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
