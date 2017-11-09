-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 08:59 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`a_id`, `user_id`, `address`, `state`, `city`, `country`, `postcode`) VALUES
(1, 1, 'No.5C, Lorong 1A, Jalan Lopeng', 'Sarawak', 'Miri', 'Malaysia', 98000),
(2, 2, 'Lot 14942,Sublot 95,Block 11, Jalan Setia Raja\n', 'Sarawak', 'Kuching', 'Malaysia', 93350),
(3, 6, 'Lot G83A, Komplek Asia City', 'Sabah', 'Kota Kinabalu', 'Malaysia', 88450),
(4, 7, 'Lot 12, Jalan Bendahara 3, Taman Puteri', 'Johor', 'Johor Bahru', 'Malaysia', 83000),
(5, 10, '2-4-10, Condominium Indah Alam', 'Selangor', 'Shah Alam', 'Malaysia', 40400);

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
(1, 'Currency', '1.57'),
(2, 'Point', '1.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cu_id`, `name`, `contact`, `email`, `subject`, `tracknum`, `message`, `datetime`, `status`) VALUES
(2, 'Albert Ling', '0168749963', 'albert@email.com', 'Reset Password', NULL, 'Hi, can you reset my password? C I forgot my password', '2017-10-15 03:15:26', 'read'),
(3, 'Bobby Tang', '0139985562', 'bobby@email.com', 'About Tracking', '12', 'I can''t track my parcel, please check for me ', '2017-10-15 05:23:07', 'unread'),
(4, 'Gordon Yii', '0146587123', 'gordon@email.com', 'Can''t top-up', NULL, 'I send the receipt but didn''t receive any updates on my points', '2017-10-15 03:15:26', 'unread'),
(5, 'Desmond Kuok', '0192856375', 'desmond@email.com', 'Shipping address', '12', 'I would like to change my shipping address for this parcel', '2017-10-15 05:23:07', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`) VALUES
(1, 1, 8),
(2, 3, 1),
(3, 3, 2),
(4, 10, 3),
(5, 10, 5),
(6, 3, 5),
(7, 3, 6),
(8, 3, 8),
(9, 10, 8),
(10, 3, 7),
(11, 1, 12),
(12, 10, 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `s_id`, `from_id`, `name`, `order_code`, `weight`, `datetime`, `shipping_id`, `action`) VALUES
(17, 1, 'Order Item', 'Shoe-Rack', 'OC6685MY', '5.00', '2017-11-05 21:38:54', 17, 'Packing'),
(18, 1, 'Receive Request', 'Racket', 'OCM1033Y', '1.00', '2017-11-05 21:39:28', 18, 'Packing'),
(19, 1, 'Order Item', 'Dress', 'OC234MY', '1.50', '2017-11-05 21:34:28', NULL, 'In'),
(20, 7, 'Order Item', 'Polo', 'OC9622MY', '32.00', '2017-11-05 21:39:14', NULL, 'In'),
(21, 1, 'Receive Request', 'Trousers', 'OC8898MY', '0.50', '2017-11-05 21:36:04', NULL, 'In'),
(22, 7, 'Receive Request', 'T-shirt', 'OC8852MY', '3.00', '2017-11-05 21:39:22', NULL, 'In'),
(23, 1, 'Order Item', 'Smartphone', 'OC9658MY', '0.80', '2017-11-05 21:36:19', NULL, 'In'),
(24, 1, 'Order Item', 'Handbang', 'OC5502MY', '1.00', '2017-11-05 21:36:25', NULL, 'In');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `user_from`, `user_to`, `message`) VALUES
(1, 12, 10, 12, 'tatat'),
(2, 12, 10, 12, 'www'),
(3, 12, 10, 12, 'aaf');

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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`oi_id`, `order_id`, `name`, `link`, `type`, `unit`, `remark`, `price`, `statuss`, `order_code`, `datetimes`) VALUES
(85, 2, 'Skirt', 'https://detail.tmall.com/item.htm?id=559372192745&ali_refid=a3_430583_1006:1105096750:N:%E5%A5%B3%E8%A3%85%E8%BF%9E%E8%A1%A3%E8%A3%99:be9d9e86996d598ccdd967b451890373&ali_trackid=1_be9d9e86996d598ccdd967b451890373&spm=a230r.1.14.1', 'Girl', 2, NULL, '13.00', 'Received', 'OC2356MY', '2017-11-05 21:48:54'),
(86, 2, 'Short Pant', 'https://detail.tmall.com/item.htm?id=555783415904&skuId=3432269997610&user_id=196993935&cat_id=50026259&is_b=1&rn=777954618572119d10905708f0122b91', 'Boy', 2, NULL, '23.00', 'Pending', 'OC5278MY', '2017-11-05 21:49:03'),
(87, 3, 'Pen', 'http://www.lazada.com.my/engrave-it-electronic-pen-for-metal-wood-glass-amp-plastic-674345.html?ff=1&sc=EZ8y', 'Stationary', 3, NULL, '65.00', 'Received', 'OC2524MY', '2017-11-05 21:53:38'),
(88, 3, 'Sport Pant', 'http://www.lazada.com.my/men39s-summer-quick-dry-pants-outdoor-male-removable-shorts-hiking-camping-trekking-fishing-sport-trousers-men-fashion-pants-dark-grey-83020241.html?ff=1', 'Sport', 3, NULL, '12.00', 'Pending', 'OC7894MY', '2017-11-05 21:55:29'),
(89, 4, 'Ball', 'http://www.lazada.com.my/molten-gg7x-indoor-outdoor-pu-leather-basketball-official-size-7-basketball-ball-pu-match-training-equipment-gg7x-70634864.html?ff=1&sc=EZkJ', 'Sport', 4, NULL, '199.00', 'Pending', 'OC7758MY', '2017-11-05 21:56:24'),
(90, 9, 'Table', 'http://www.lazada.com.my/casa-sevil-mobile-height-adjustable-table-60cmx40cm-with-wheels-laptop-computer-desk-only-white-44997564.html?ff=1&sc=EQsz', 'Furniture', 4, NULL, '85.00', 'Received', 'OC1314MY', '2017-11-05 21:56:39'),
(91, 10, 'Chair', 'http://www.lazada.com.my/deluxe-high-back-mesh-swivel-office-chair-black-2340559.html?ff=1&sc=EQwz', 'Furniture', 4, NULL, '70.00', 'Received', 'OC7845MY', '2017-11-05 21:57:43'),
(92, 11, 'Food', 'http://www.lazada.com.my/opika-organic-chia-seed-900g-super-value-pack-pre-cleaned-114451743.html?ff=1&sc=EVUf', 'Daily Use', 2, NULL, '50.00', 'Received', 'OC5555MY', '2017-11-05 21:58:36'),
(93, 12, 'Book', 'http://www.lazada.com.my/photobook-malaysia-4r-photo-prints-50-pieces-7093547.html?ff=1&sc=ES8N', 'Stationary', 2, NULL, '30.00', 'Pending', 'OC1142MY', '2017-11-05 21:59:21'),
(94, 13, 'Cup', 'https://detail.tmall.com/item.htm?id=553601264030&ad_id=&am_id=&cm_id=140105335569ed55e27b&pm_id=&abbucket=11', 'Daily Use', 1, 'Fragile', '8.00', 'Received', 'OC9695MY', '2017-11-05 21:51:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`ol_id`, `user_id`, `status`, `datetime`, `price`) VALUES
(2, 10, 'Request', '2017-10-23 06:25:31', '35.00'),
(3, 10, 'Ready to pay', '2017-11-01 07:38:21', '35.00'),
(4, 10, 'Paid', '2017-11-01 07:38:42', '23.00'),
(9, 10, 'Proceed', '2017-10-23 06:25:45', NULL),
(10, 10, 'Received', '2017-10-23 06:25:45', '219.00'),
(11, 10, 'Request', '2017-10-22 08:46:13', NULL),
(12, 10, 'Request', '2017-10-25 11:58:40', NULL),
(13, 10, 'Paid', '2017-11-04 05:44:58', '7.64');

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
-- Table structure for table `parcel`
--

CREATE TABLE IF NOT EXISTS `parcel` (
  `id` int(11) NOT NULL,
  `fromsender` text NOT NULL,
  `toreceiver` text NOT NULL,
  `content` text NOT NULL,
  `value` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`id`, `fromsender`, `toreceiver`, `content`, `value`) VALUES
(2, 'Desmond', 'Ann', 'Drawing Book', 'rm50'),
(3, 'Albert', 'Cony', 'Shoes', 'rm100');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `user_id`, `datetime`, `title`, `amount`, `file`, `type`, `status`, `from_order`, `from_shipping`) VALUES
(5, 10, '2017-10-17 21:10:15', 'Pay Order', '500.00', '74679-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Completed', 0, NULL),
(6, 1, '2017-11-05 21:13:53', 'Reload + 444', '444.00', '8761-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Pending', 0, NULL),
(7, 10, '2017-11-05 21:10:42', 'Reload + 222', '222.00', '27001-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Completed', 0, NULL),
(8, 10, '2017-11-05 21:12:56', 'Reload 1', '1.00', '98523-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Pending', 0, NULL),
(9, 10, '2017-11-05 21:13:15', 'Reload 1000 Point', '1000.00', '76809-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Pending', 0, NULL),
(10, 10, '2017-10-29 07:50:37', 'Reload 5 Point', '5.00', '68676-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Completed', NULL, NULL),
(12, 10, '2017-11-05 21:13:27', 'Pay Order 3', '35.00', '74555-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Pending', 3, NULL),
(15, 10, '2017-11-01 07:43:18', 'Pay Order 13', '7.64', '55361-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Completed', 13, NULL),
(16, 10, '2017-11-05 21:14:25', 'Pay Shipping 17', '30.00', '62742-clone-pc.xlsx', 'application/vnd.openxmlformats', 'Pending', NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE IF NOT EXISTS `point` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`id`, `user_id`, `point`) VALUES
(1, 1, '2500.00'),
(2, 2, '1800.00'),
(3, 6, '200.00'),
(4, 7, '15050.00'),
(5, 10, '23500.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receive_request`
--

INSERT INTO `receive_request` (`rr_id`, `user_id`, `name`, `order_code`, `status`, `datetime`) VALUES
(2, 10, 'T-shirt', 'OC5055MY', 'Request', '2017-11-05 21:24:42'),
(3, 10, 'Mobile', 'OC7985MY', 'Request', '2017-11-05 21:25:08'),
(5, 10, 'Bag', 'OC5633MY', 'Received', '2017-11-05 21:26:16'),
(6, 10, 'Racket', 'O1123MY', 'Request', '2017-11-05 21:46:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`s_id`, `user_id`, `recipient_name`, `recipient_contact`, `a_id`, `weight`, `price`, `status`, `datetime`, `tracking_code`) VALUES
(1, 10, 'Desmond Kuok', '0192856375', 2, '5.00', '150.00', 'Pending Payment', '2017-11-05 21:21:31', NULL),
(4, 10, 'Desmond Kuok', '0192856375', 2, '2.00', '60.00', 'Proceed', '2017-10-15 22:15:19', NULL),
(17, 10, 'Desmond Kuok', '0192856375', 2, '1.00', '30.00', 'Delivered', '2017-10-11 01:35:01', 'EM8505MY'),
(18, 10, 'Desmond Kuok', '0192856375', 2, '1.01', '45.00', 'Request', '2017-11-05 21:18:12', NULL);

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

--
-- Dumping data for table `shipping_update_details`
--

INSERT INTO `shipping_update_details` (`det_id`, `HawbNo`, `TransactionDate`, `StationCode`, `StationDescription`, `CountryCode`, `CountryDescription`, `EventCode`, `EventDescription`, `ReasonCode`, `ReasonDescription`, `Remark`) VALUES
(1, '12873t587541', '2017-11-02 04:16:08', 'SZX', 'SHENZHEN, CHINA, PEOPLE''S REPUBLIC', 'CN', 'CHINA, PEOPLE''S REPUBLIC', 'RDL', 'Shipment info registered at SHENZHEN.', 'IS', 'In Shipping', NULL),
(2, '12873t587541', '2017-11-03 10:16:08', 'SZX', 'SHENZHEN, CHINA, PEOPLE''S REPUBLIC', 'CN', 'CHINA, PEOPLE''S REPUBLIC', 'PKI', 'Pickup shipment checked in at SHENZHEN.', 'IS', 'In Shipping', NULL);

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

--
-- Dumping data for table `shipping_update_summary`
--

INSERT INTO `shipping_update_summary` (`sum_id`, `HawbNo`, `XR1`, `XR2`, `ShipmentDate`, `DeliveryDate`, `RecipientName`, `SignedName`, `OriginStationCode`, `OriginStationDescription`, `OriginCountryCode`, `OriginCountryDescription`, `DestinationStationCode`, `DestinationStationDescription`, `DestinationCountryCode`, `DestinationCountryDescription`, `EventCode`, `EventDescription`, `ReasonCode`, `ReasonDescription`, `Remark`) VALUES
(1, '12873t587541', NULL, '12873t587541', '2017-11-02 02:07:11', NULL, 'desmond', NULL, 'SZX', 'SHENZHEN', 'HK', 'HONGKONG', 'KUL', 'KUALA LUMPUR', 'MY', 'MALAYSIA', 'IP', 'In Proceed', 'IS', 'In Shipping', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `contact`, `email`, `password`, `type`, `image`, `login_status`) VALUES
(1, 'Albert', 'Ling', '0168749963', 'albert@email.com', '$2y$10$pu6aq9Vsps5z/z7AyZct/OGfNnZCo1SH3Dzgr6R56Zd/iZXg8.A6.', 'customer', '../resources/avatar1.jpg', 'Offline'),
(2, 'Bobby ', 'Tang', '0139985562', 'bobby@email.com', '$2y$10$2453Uie/j6yywD02UOFlU.9cH0acQPlkXZsvL3XSbEEQjUTy9/sKS', 'customer', '../resources/avatar1.jpg', 'Offline'),
(3, 'Clement', 'Chuo', '0124789652', 'clement@email.com', '$2y$10$xzv/iSSjAuxLhLbR4rgTdeYHuy01BPZjzHJ.9R9hPix5Dpw0nGr2y', 'admin', '../resources/avatar1.jpg', 'Offline'),
(5, 'Eileeen', 'Kho', '01116589986', 'eileen@email.com', '$2y$10$NKkhLKxM46HnB/4EeRpjw.gWuvwiz/mfcsds7Q4zEMZxgq2N1vJ96', 'admin', '../resources/avatar1.jpg', 'Offline'),
(6, 'Fabian', 'Tang', '0178589321', 'fabian@email.com', '$2y$10$E3CcjibNLt/D79t7soUKve1j1JoZDUmMuVjgP1Piigugao6GG9F3C', 'staff', '../resources/avatar1.jpg', 'Offline'),
(7, 'Gordon', 'Yii', '0146587123', 'gordon@email.com', '$2y$10$uOpSbmMFqUesTmvPklp56OHMcAb..qshAlOz31xUN0LeXuYMYddYK', 'customer', '../resources/avatar1.jpg', 'Offline'),
(8, 'Samuel', 'Hii', '0105843214', 'samuel@email.com', '$2y$10$nuOJ73sWDmZsWvdrR.bLkOyNaXCXCj2fz1BWTsE3PYJaxA7k2KRo.', 'admin', '../resources/avatar1.jpg', 'Offline'),
(10, 'Desmond', 'Kuok', '0192856375', 'desmond@email.com', '$2y$10$pLraOonvL8szr4M/YISX/uX1xZZbbM9Tabe4CeX0iZVhq.9vXjVoO', 'customer', '../resources/avatar1.jpg', 'Online'),
(11, 'LAtest', 'user', '0123456789', 'user@email.com', '$2y$10$l4WUszvpaT1lUlkx3MwO6uhw9Tw3mnNz9gajHd1K/IRoXPFmW5BgW', 'admin', '../resources/avatar1.jpg', 'Offline'),
(12, 'Offline', 'Bot', '0123456789', 'offlinebot@email.com', '$2y$10$mtsJFDvph1QC3hjc9O577u/t.6n61ecNzksIvcwBUVKY6bYR1WM0C', 'bot', '../resources/avatar1.jpg', 'Online');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`wh_id`, `station_code`, `station_description`, `country_code`, `country_description`, `company_name`, `station_name`) VALUES
(1, 'L-HKG', 'Unit 9, 3/F, Hong Leong Industrial Complex\n4 Wang Kwong Road, Kowloon Bay\nKowloon, Hong Kong', 'HK', 'HONG KONG', 'LOGISTICS WORLDWIDE EXPRESS (HK) LTD', 'HONG KONG, HONGKONG'),
(2, 'L-SZ', 'SHENZHEN, CHINA, PEOPLE REPUBLIC', 'CN', 'CHINA', 'LOGISTICS WORLDWIDE EXPRESS (SHENZHEN)', 'SHENZHEN, CHINA, PEOPLE REPUBLIC'),
(3, 'L-KLK', 'Tower 3, Level 3A, Unit 7 (03-03A-07)\nUOA Business Park\nNo.1, Jalan Pengaturcara U1/51A\nSeksyen U1, 40150 Shah Alam\nSelangor Darul Ehsan. Malaysia', 'MY', 'MALAYSIA', 'LOGISTICS WORLDWIDE EXPRESS (MY)', 'Station of Malaysia'),
(4, 'L-TP', 'No.323, Sec. 2, Nanzhu Rd., Luzhu Dist., Taoyuan City 338, Taiwan', 'TW', 'TAIWAN', 'LOGISTICS WORLDWIDE EXPRESS (TW)', 'Station of Taiwan'),
(5, 'L-SGP', '26 Kallang Avenue #06-00\nSingapore 339417', 'SG', 'SINGAPORE', 'LOGISTICS WORLDWIDE EXPRESS (SINGAPORE)', 'Station of Singapore'),
(6, 'L-KR', 'ROOM 602, Bumhwa Building, 34 Namdaemun-Ro 1-Gil Jung-Gu', 'KR', 'KOREA', 'LOGISTICS WORLDWIDE EXPRESS (KOREA)', 'Station of Korea');

-- --------------------------------------------------------

--
-- Table structure for table `work_station`
--

CREATE TABLE IF NOT EXISTS `work_station` (
  `ws_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wh_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_station`
--

INSERT INTO `work_station` (`ws_id`, `user_id`, `wh_id`) VALUES
(1, 3, 1),
(2, 5, 2),
(3, 8, 3),
(4, 6, 4),
(5, 11, 6),
(6, 12, 6);

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
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `adjust`
--
ALTER TABLE `adjust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `receive_request`
--
ALTER TABLE `receive_request`
  MODIFY `rr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `wh_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `work_station`
--
ALTER TABLE `work_station`
  MODIFY `ws_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
