-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 05:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resetfoodv5`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `supplier_post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `buyer_post_id` int(11) NOT NULL,
  `type` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` float NOT NULL,
  `allocation_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `allocation` float NOT NULL,
  `buyer_price` float NOT NULL,
  `supplier_price` float NOT NULL,
  `buyer_total` float NOT NULL,
  `supplier_total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_posts`
--

CREATE TABLE `buyer_posts` (
  `buyer_post_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expiry` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'pending',
  `rating` int(11) NOT NULL,
  `duration` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `remaning_days` varchar(40) NOT NULL,
  `search_keywords` text NOT NULL,
  `is_email` int(11) NOT NULL DEFAULT 0,
  `from_supplier_id` int(11) NOT NULL,
  `expiry2` varchar(255) NOT NULL,
  `delivery_window` datetime NOT NULL,
  `buyer_bid` float NOT NULL,
  `buyer_bid_quantity` varchar(100) NOT NULL,
  `buyer_bid_comment` varchar(600) NOT NULL,
  `supplier_post_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `is_low_bid` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_window_to` datetime NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `is_disable` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_posts`
--

INSERT INTO `buyer_posts` (`buyer_post_id`, `product_id`, `user_id`, `expiry`, `quantity`, `status`, `rating`, `duration`, `price`, `created_at`, `updated_at`, `category_id`, `remaning_days`, `search_keywords`, `is_email`, `from_supplier_id`, `expiry2`, `delivery_window`, `buyer_bid`, `buyer_bid_quantity`, `buyer_bid_comment`, `supplier_post_id`, `sku`, `is_low_bid`, `delivery_window_to`, `payment_status`, `is_disable`) VALUES
(1, 0, 34, '2018-02-17', 120, 'accepted', 0, '', 15, '2018-02-01 05:54:00', '2018-02-01 05:54:55', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1800, '50', 'my first coment', 1, '253', 0, '0000-00-00 00:00:00', 'pending', 0),
(2, 0, 34, '2018-02-26', 140, 'accepted', 0, '', 10, '2018-02-01 11:48:43', '2018-02-01 11:48:55', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1800, '60', 'Rajesh Test', 3, '254', 0, '0000-00-00 00:00:00', 'pending', 0),
(3, 0, 2, '2018-02-17', 70, 'accepted', 0, '', 15, '2018-02-01 23:23:59', '2018-02-01 23:25:33', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1000, '55', '', 5, '253', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(4, 0, 34, '2018-02-17', 15, 'accepted', 0, '', 15, '2018-02-02 13:50:51', '2018-02-02 13:51:46', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1800, '12', 'Rajesh TEst 1', 8, '253', 0, '0000-00-00 00:00:00', 'pending', 0),
(5, 0, 2, '2018-02-26', 80, 'accepted', 0, '', 10, '2018-02-07 01:47:34', '2018-02-07 01:47:52', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 677, '55', '', 13, '254', 0, '0000-00-00 00:00:00', 'pending', 0),
(6, 0, 2, '2018-02-26', 25, 'rejected', 0, '', 10, '2018-02-07 01:49:03', '2018-02-07 01:49:26', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 888, '1', '', 14, '254', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(7, 0, 34, '2018-02-17', 70, 'accepted', 0, '', 15, '2018-03-19 03:23:08', '2018-03-19 03:23:59', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 800, '67', 't', 20, '253', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(8, 0, 34, '2018-03-31', 50, 'accepted', 0, '', 5, '2018-03-31 03:55:32', '2018-03-31 03:56:48', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 120, '40', 'in need pls hep', 29, '268', 0, '0000-00-00 00:00:00', 'pending', 0),
(9, 0, 34, '2018-05-08', 100, 'accepted', 0, '', 5, '2018-05-04 05:19:24', '2018-05-04 05:20:30', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 6, '100', '', 31, '269', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(10, 0, 2, '2018-02-17', 15, 'accepted', 0, '', 0, '2018-06-20 12:32:44', '2018-06-20 12:33:26', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 500, '15', '', 38, '272', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(11, 0, 2, '2018-06-22', 10, 'accepted', 0, '', 10, '2018-06-21 12:56:52', '2018-06-21 12:57:54', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 11, '8', 'TEST10 ', 47, '281', 0, '0000-00-00 00:00:00', 'Completed', 0),
(12, 0, 2, '2018-06-22', 2, 'accepted', 0, '', 10, '2018-06-22 13:20:07', '2018-06-22 13:20:51', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 500, '1', '', 56, '290', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(13, 0, 2, '2018-06-29', 111111, 'accepted', 0, '', 11, '2018-06-29 00:11:24', '2018-06-29 00:11:55', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1111, '11111', '111', 58, '292', 0, '0000-00-00 00:00:00', 'Completed', 0),
(14, 0, 2, '2018-06-29', 333, 'rejected', 0, '', 33, '2018-06-29 00:28:33', '2018-06-29 00:31:07', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 333333, '33', '', 60, '294', 0, '0000-00-00 00:00:00', 'Completed', 0),
(15, 0, 8, '2018-07-07', 99999, 'accepted', 0, '', 9, '2018-07-06 14:00:38', '2018-07-09 04:30:03', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 9999, '9999', '', 62, '296', 0, '0000-00-00 00:00:00', 'pending', 0),
(16, 0, 8, '2018-07-07', 999, 'accepted', 0, '', 999, '2018-07-06 15:21:12', '2018-07-09 04:30:03', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 999, '991', '', 63, '297', 0, '0000-00-00 00:00:00', 'pending', 0),
(17, 0, 8, '2018-07-06', 888, 'Declined', 0, '', 888, '2018-07-09 23:01:44', '2018-07-09 23:01:44', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 888, '881', '', 64, '298', 0, '0000-00-00 00:00:00', 'pending', 0),
(18, 0, 8, '2018-07-07', 777, 'Declined', 0, '', 777, '2018-07-09 23:13:04', '2018-07-09 23:13:04', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 777, '777', '', 65, '299', 0, '0000-00-00 00:00:00', 'pending', 0),
(19, 0, 2, '2018-07-06', 888, 'accepted', 0, '', 888, '2018-07-09 23:28:14', '2018-07-10 00:00:03', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 889, '444', '', 64, '298', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(20, 0, 2, '2018-07-07', 777, 'rejected', 0, '', 777, '2018-07-09 23:28:33', '2018-07-10 00:01:00', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 778, '355', '', 65, '299', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(21, 0, 8, '2018-07-19', 555, 'accepted', 0, '', 555, '2018-07-10 12:39:19', '2018-07-10 12:44:59', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 555, '550', '', 68, '302', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(22, 0, 2, '2018-07-02', 22222, 'accepted', 0, '', 22222, '2018-07-12 00:40:52', '2018-07-12 00:45:45', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 22223, '22000', '', 70, '304', 0, '0000-00-00 00:00:00', 'pending', 0),
(23, 0, 8, '2018-07-21', 222, 'rejected', 0, '', 222, '2018-07-12 00:49:18', '2018-07-12 00:52:57', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 223, '0', '', 69, '303', 0, '0000-00-00 00:00:00', 'pending', 0),
(24, 0, 2, '1970-01-01', 33, 'accepted', 0, '', 5, '2018-07-12 03:21:43', '2018-07-12 09:30:03', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 150, '5', 'TEst Buyer Rely', 71, '305', 0, '0000-00-00 00:00:00', 'pending', 0),
(25, 0, 2, '1970-01-01', 33, 'accepted', 0, '', 5, '2018-07-12 03:22:59', '2018-07-12 09:30:03', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 90, '30', 'SECOND', 72, '306', 0, '0000-00-00 00:00:00', 'pending', 0),
(26, 0, 10, '2018-07-06', 999, 'Declined', 0, '', 999, '2018-07-14 00:33:35', '2018-07-14 00:33:35', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1000, '900', '', 75, '309', 0, '0000-00-00 00:00:00', 'pending', 0),
(27, 0, 2, '2018-07-06', 999, 'accepted', 0, '', 999, '2018-07-14 00:50:02', '2018-07-14 00:53:53', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1100, '995', '', 75, '309', 0, '0000-00-00 00:00:00', 'pending', 0),
(28, 0, 8, '2018-07-27', 888, 'rejected', 0, '', 888, '2018-07-14 00:51:39', '2018-07-14 00:54:03', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 889, '88', '', 76, '310', 0, '0000-00-00 00:00:00', 'pending', 0),
(29, 0, 8, '2018-07-06', 999, 'Declined', 0, '', 999, '2018-07-14 00:52:31', '2018-07-14 00:52:31', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 999, '999', '', 75, '309', 0, '0000-00-00 00:00:00', 'pending', 0),
(30, 0, 2, '2018-07-16', 33, 'accepted', 0, '', 5, '2018-07-15 11:13:01', '2018-07-15 17:30:02', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 99, '0', '', 78, '312', 0, '0000-00-00 00:00:00', 'pending', 0),
(31, 0, 2, '2018-07-17', 33, 'pending', 0, '', 5, '2018-07-15 11:18:05', '2018-07-15 11:18:05', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1, '0', '', 79, '313', 1, '0000-00-00 00:00:00', 'pending', 0),
(32, 0, 2, '2018-07-02', 5, 'accepted', 0, '', 5, '2018-07-15 11:23:21', '2018-07-15 17:30:02', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 201, '0', '', 80, '314', 0, '0000-00-00 00:00:00', 'pending', 0),
(33, 0, 9, '2018-07-10', 666, 'accepted', 0, '', 666, '2018-07-15 15:30:35', '2018-07-15 16:09:17', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 677, '500', '', 82, '316', 0, '0000-00-00 00:00:00', 'pending', 0),
(34, 0, 9, '2018-07-24', 555, 'Declined', 0, '', 555, '2018-07-15 15:30:54', '2018-07-15 15:30:54', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 555, '200', '', 83, '317', 0, '0000-00-00 00:00:00', 'pending', 0),
(35, 0, 9, '2018-07-11', 333, 'pending', 0, '', 333, '2018-07-15 15:31:47', '2018-07-15 15:31:47', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 331, '33', '', 85, '319', 1, '0000-00-00 00:00:00', 'pending', 0),
(36, 0, 9, '2018-07-26', 444, 'Declined', 0, '', 444, '2018-07-15 15:32:30', '2018-07-15 15:32:30', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 444, '444', '', 84, '318', 0, '0000-00-00 00:00:00', 'pending', 0),
(37, 0, 10, '2018-07-10', 666, 'Declined', 0, '', 666, '2018-07-15 15:34:33', '2018-07-15 15:34:33', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 669, '665', '', 82, '316', 0, '0000-00-00 00:00:00', 'pending', 0),
(38, 0, 10, '2018-07-24', 555, 'rejected', 0, '', 555, '2018-07-15 15:35:20', '2018-07-15 16:09:26', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 599, '555', '', 83, '317', 0, '0000-00-00 00:00:00', 'pending', 0),
(39, 0, 10, '2018-07-26', 444, 'Declined', 0, '', 444, '2018-07-15 15:36:30', '2018-07-15 15:36:30', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0', '', 84, '318', 1, '0000-00-00 00:00:00', 'pending', 0),
(40, 0, 10, '2018-07-11', 333, 'pending', 0, '', 333, '2018-07-15 15:36:35', '2018-07-15 15:36:35', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0', '', 85, '319', 1, '0000-00-00 00:00:00', 'pending', 0),
(41, 0, 2, '2018-07-11', 333, 'pending', 0, '', 333, '2018-07-15 15:45:04', '2018-07-15 15:45:04', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 301, '330', '', 85, '319', 1, '0000-00-00 00:00:00', 'pending', 0),
(42, 0, 8, '2018-07-11', 333, 'pending', 0, '', 333, '2018-07-15 15:55:30', '2018-07-15 15:55:30', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 301, '300', '', 85, '319', 1, '0000-00-00 00:00:00', 'pending', 0),
(43, 0, 8, '2018-07-26', 444, 'accepted', 0, '', 444, '2018-07-15 16:01:08', '2018-07-15 16:30:02', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 888, '222', '', 84, '318', 0, '0000-00-00 00:00:00', 'pending', 0),
(44, 0, 9, '2018-07-26', 111, 'pending', 0, '', 111, '2018-07-15 16:17:23', '2018-07-15 16:17:23', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 101, '55', '', 86, '320', 1, '0000-00-00 00:00:00', 'pending', 0),
(45, 0, 10, '2018-07-26', 111, 'pending', 0, '', 111, '2018-07-15 16:18:59', '2018-07-15 16:18:59', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 104, '66', '', 86, '320', 1, '0000-00-00 00:00:00', 'pending', 0),
(46, 0, 9, '2018-07-18', 222, 'pending', 0, '', 222, '2018-07-17 03:35:59', '2018-07-17 03:35:59', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 115, '200', '', 89, '323', 1, '0000-00-00 00:00:00', 'pending', 0),
(47, 0, 2, '2018-07-07', 8, 'accepted', 0, '', 999, '2018-07-18 01:17:40', '2018-07-18 01:44:08', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1000, '7', '', 91, '325', 0, '0000-00-00 00:00:00', 'pending', 0),
(48, 0, 10, '2018-07-06', 444, 'accepted', 0, '', 888, '2018-07-18 01:37:04', '2018-07-18 01:45:02', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 889, '442', '', 92, '326', 0, '0000-00-00 00:00:00', 'pending', 0),
(49, 0, 10, '2018-07-07', 5, 'accepted', 0, '', 999, '2018-07-18 01:41:22', '2018-07-18 01:44:13', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1999, '2', '', 93, '327', 0, '0000-00-00 00:00:00', 'pending', 0),
(50, 0, 2, '2018-07-07', 8, 'accepted', 0, '', 999, '2018-07-20 16:06:13', '2018-07-20 22:30:02', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 99999, '4', '', 96, '330', 0, '0000-00-00 00:00:00', 'pending', 0),
(51, 0, 2, '2018-07-07', 8, 'accepted', 0, '', 999, '2018-07-20 16:06:15', '2018-07-20 22:30:02', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 999999, '6', '', 97, '331', 0, '0000-00-00 00:00:00', 'pending', 0),
(52, 0, 10, '2018-07-26', 111, 'pending', 0, '', 111, '2018-07-20 16:17:22', '2018-07-20 16:17:22', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 100, '10', '', 98, '332', 1, '0000-00-00 00:00:00', 'pending', 0),
(53, 0, 10, '2018-07-26', 111, 'pending', 0, '', 111, '2018-07-20 16:17:24', '2018-07-20 16:17:24', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 101, '11', '', 99, '333', 1, '0000-00-00 00:00:00', 'pending', 0),
(54, 0, 10, '2018-07-26', 111, 'rejected', 0, '', 111, '2018-07-20 16:17:27', '2018-07-20 16:32:20', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 112, '12', '', 100, '334', 0, '0000-00-00 00:00:00', 'pending', 0),
(55, 0, 2, '2018-06-29', 100000, 'accepted', 0, '', 11, '2018-07-26 05:32:18', '2018-07-26 05:33:24', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 120, '1111', '', 101, '335', 0, '0000-00-00 00:00:00', 'pending', 0),
(56, 0, 2, '2018-07-28', 12345, 'pending', 0, '', 12345, '2018-07-26 05:39:38', '2018-07-26 05:39:38', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 22, '1000', '', 102, '336', 1, '0000-00-00 00:00:00', 'pending', 0),
(57, 0, 2, '2018-07-18', 2222, 'rejected', 0, '', 222, '2018-07-26 14:30:59', '2018-07-26 14:31:56', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1100, '300', '', 103, '337', 0, '0000-00-00 00:00:00', 'pending', 0),
(58, 0, 2, '2018-07-31', 111, 'accepted', 0, '', 111, '2018-07-27 21:48:07', '2018-07-27 21:58:56', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 111, '1', '', 104, '338', 0, '0000-00-00 00:00:00', 'Completed', 0),
(59, 0, 2, '2018-07-27', 111, 'rejected', 0, '', 111, '2018-07-27 21:48:09', '2018-07-27 21:59:03', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 333, '11', '', 105, '339', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(60, 0, 2, '2018-07-31', 111, 'pending', 0, '', 111, '2018-07-27 21:48:10', '2018-07-27 21:48:10', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 100, '10', '', 106, '340', 1, '0000-00-00 00:00:00', 'pending', 0),
(61, 0, 2, '2018-07-31', 110, 'accepted', 0, '', 111, '2018-07-30 23:23:57', '2018-07-30 23:37:50', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 111, '1', '1of3', 110, '344', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(62, 0, 2, '2018-07-27', 111, 'rejected', 0, '', 111, '2018-07-30 23:23:58', '2018-07-30 23:37:55', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 333, '11', '2of3', 111, '345', 0, '0000-00-00 00:00:00', 'pending', 0),
(63, 0, 2, '2018-07-31', 111, 'pending', 0, '', 111, '2018-07-30 23:23:59', '2018-07-30 23:23:59', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 100, '100', '3of3', 112, '346', 1, '0000-00-00 00:00:00', 'pending', 0),
(64, 0, 2, '2018-07-31', 111, 'accepted', 0, '', 111, '2018-08-03 04:47:23', '2018-08-03 04:50:30', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 111, '1', '4of3', 113, '347', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(65, 0, 2, '2018-07-31', 111, 'rejected', 0, '', 111, '2018-08-03 04:47:24', '2018-08-03 04:50:42', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 222, '11', '5of3', 114, '348', 0, '0000-00-00 00:00:00', 'pending', 0),
(66, 0, 2, '2018-07-31', 111, 'pending', 0, '', 111, '2018-08-03 04:47:26', '2018-08-03 04:47:26', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 101, '100', '6of3', 115, '349', 1, '0000-00-00 00:00:00', 'pending', 0),
(67, 0, 8, '2018-07-31', 111, 'pending', 0, '', 111, '2018-08-03 04:49:28', '2018-08-03 04:49:28', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 100, '1', '', 115, '349', 1, '0000-00-00 00:00:00', 'pending', 0),
(68, 0, 2, '2018-07-31', 109, 'accepted', 0, '', 111, '2018-08-06 03:33:13', '2018-08-06 05:00:04', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 113, '107', '', 116, '350', 0, '0000-00-00 00:00:00', 'Payment Made', 0),
(69, 0, 2, '2018-09-19', 123, 'accepted', 0, '', 12, '2018-09-11 11:42:20', '2018-09-11 11:45:41', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1234, '100', 'tryit', 117, '351', 0, '0000-00-00 00:00:00', 'Completed', 0),
(70, 0, 2, '2018-09-19', 123, 'accepted', 0, '', 12, '2018-09-18 03:19:07', '2018-09-18 03:21:14', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1000, '122', '', 118, '352', 0, '0000-00-00 00:00:00', 'pending', 0),
(71, 0, 2, '2019-08-16', 1, 'pending', 0, '', 1, '2019-08-07 02:07:06', '2019-08-07 02:07:06', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 123, '1', '', 132, '372', 0, '0000-00-00 00:00:00', 'pending', 0),
(72, 0, 2, '2019-08-07', 2222, 'pending', 0, '', 22222, '2019-08-07 02:07:07', '2019-08-07 02:07:07', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 231, '213', '', 133, '373', 1, '0000-00-00 00:00:00', 'pending', 0),
(73, 0, 2, '2019-08-07', 123, 'accepted', 0, '', 123, '2019-08-07 02:32:16', '2019-08-07 02:33:21', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 523, '23', '', 134, '374', 0, '0000-00-00 00:00:00', 'pending', 0),
(74, 0, 2, '2019-08-07', 12313, 'rejected', 0, '', 123, '2019-08-07 02:44:10', '2019-08-07 02:47:25', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 456, '54', '', 135, '375', 0, '0000-00-00 00:00:00', 'pending', 0),
(75, 0, 9, '2019-08-16', 1, 'pending', 0, '', 1, '2019-08-07 05:14:04', '2019-08-07 05:14:04', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1, '0', '', 132, '372', 0, '0000-00-00 00:00:00', 'pending', 0),
(76, 0, 9, '2019-08-07', 2222, 'pending', 0, '', 22222, '2019-08-07 05:14:06', '2019-08-07 05:14:06', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 2, '0', '', 133, '373', 1, '0000-00-00 00:00:00', 'pending', 0),
(77, 0, 9, '2019-08-29', 1, 'pending', 0, '', 1, '2019-08-12 12:58:45', '2019-08-12 12:58:45', 0, '', '', 0, 0, '', '0000-00-00 00:00:00', 1, '1', 'try', 140, '379', 0, '0000-00-00 00:00:00', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distribution_estrictions`
--

CREATE TABLE `distribution_estrictions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `supplier_post_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `actual_file_name` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expiry`
--

CREATE TABLE `expiry` (
  `id` int(11) NOT NULL,
  `expiry_value` int(11) NOT NULL,
  `expiry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expiry`
--

INSERT INTO `expiry` (`id`, `expiry_value`, `expiry`, `created_at`, `updated_at`) VALUES
(1, 0, '0', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(2, 2, 'Still Good - few days', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(3, 3, '3+ days', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(4, 4, '4', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(5, 5, '5', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(6, 6, '6', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(7, 7, '1+ week ', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(8, 8, '8', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(9, 9, '9', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(10, 10, '10', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(11, 11, '11', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(12, 12, '12', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(13, 13, '13', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(14, 14, '2+week', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(15, 15, '15', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(16, 16, '16', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(17, 17, '17', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(18, 18, '18', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(19, 19, '19', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(20, 20, '20', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(21, 21, '3+week', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(22, 22, '22', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(23, 23, '23', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(24, 24, '24', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(25, 25, '25', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(26, 26, '26', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(27, 27, '27', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(28, 28, '4 weeks +', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(29, 29, '29', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(30, 30, '30+', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(31, 60, '60+', '2017-07-25 08:04:35', '2017-07-25 08:04:35'),
(32, 90, '90+', '2017-07-25 08:04:35', '2017-07-25 08:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_31_135013_create_bank_details_table', 0),
(2, '2021_05_31_135013_create_buyer_posts_table', 0),
(3, '2021_05_31_135013_create_categories_table', 0),
(4, '2021_05_31_135013_create_distribution_estrictions_table', 0),
(5, '2021_05_31_135013_create_documents_table', 0),
(6, '2021_05_31_135013_create_expiry_table', 0),
(7, '2021_05_31_135013_create_notifications_table', 0),
(8, '2021_05_31_135013_create_pools_table', 0),
(9, '2021_05_31_135013_create_preferences_table', 0),
(10, '2021_05_31_135013_create_product_tags_table', 0),
(11, '2021_05_31_135013_create_products_table', 0),
(12, '2021_05_31_135013_create_settings_table', 0),
(13, '2021_05_31_135013_create_sku_table', 0),
(14, '2021_05_31_135013_create_supplier_allocations_table', 0),
(15, '2021_05_31_135013_create_supplier_posts_table', 0),
(16, '2021_05_31_135013_create_supplier_posts_temp_table', 0),
(17, '2021_05_31_135013_create_temp_warehouse_table', 0),
(18, '2021_05_31_135013_create_users_table', 0),
(19, '2021_05_31_135013_create_warehouse_table', 0),
(21, '2021_05_31_134710_add_user_profile_complete_status_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allocation_id` int(11) NOT NULL,
  `notification_content` text COLLATE utf8_unicode_ci NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unread',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `associate_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_title`, `allocation_id`, `notification_content`, `buyer_id`, `supplier_id`, `status`, `updated_at`, `created_at`, `user_id`, `associate_id`, `type`) VALUES
(1, 'Buyer Bid', 0, 'aj shuk (Buyer) Bid Your Post', 34, 3, 'read', '2018-02-01 05:54:00', '2018-02-01 05:54:00', 3, 1, 'Buyer Bid'),
(2, 'Allocation Accept', 1, 'Geoff (Supplier) accepted The Allocation', 34, 3, 'unread', '2018-02-01 05:54:55', '2018-02-01 05:54:55', 34, 0, ''),
(3, 'Buyer Bid', 0, 'aj shuk (Buyer) Bid Your Post', 34, 3, 'read', '2018-02-01 11:48:43', '2018-02-01 11:48:43', 3, 2, 'Buyer Bid'),
(4, 'Allocation Accept', 2, 'Geoff (Supplier) accepted The Allocation', 34, 3, 'unread', '2018-02-01 11:48:55', '2018-02-01 11:48:55', 34, 0, ''),
(5, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-02-01 23:23:59', '2018-02-01 23:23:59', 3, 3, 'Buyer Bid'),
(6, 'Allocation Accept', 3, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-02-01 23:25:33', '2018-02-01 23:25:33', 2, 0, ''),
(7, 'Buyer Bid', 0, 'aj shuk (Buyer) Bid Your Post', 34, 3, 'read', '2018-02-02 13:50:51', '2018-02-02 13:50:51', 3, 4, 'Buyer Bid'),
(8, 'Allocation Accept', 4, 'Geoff (Supplier) accepted The Allocation', 34, 3, 'unread', '2018-02-02 13:51:46', '2018-02-02 13:51:46', 34, 0, ''),
(9, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-02-07 01:47:34', '2018-02-07 01:47:34', 3, 5, 'Buyer Bid'),
(10, 'Allocation Accept', 5, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-02-07 01:47:52', '2018-02-07 01:47:52', 2, 0, ''),
(11, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-02-07 01:49:03', '2018-02-07 01:49:03', 3, 6, 'Buyer Bid'),
(12, 'Allocation Reject', 6, 'Geoff (Supplier) rejected The Allocation', 2, 3, 'unread', '2018-02-07 01:49:26', '2018-02-07 01:49:26', 2, 0, ''),
(13, 'Buyer Bid', 0, 'aj shuk (Buyer) Bid Your Post', 34, 3, 'read', '2018-03-19 03:23:08', '2018-03-19 03:23:08', 3, 7, 'Buyer Bid'),
(14, 'Allocation Accept', 7, 'Geoff (Supplier) accepted The Allocation', 34, 3, 'unread', '2018-03-19 03:23:59', '2018-03-19 03:23:59', 34, 0, ''),
(15, 'Buyer Bid', 0, 'aj shuk (Buyer) Bid Your Post', 34, 3, 'read', '2018-03-31 03:55:32', '2018-03-31 03:55:32', 3, 8, 'Buyer Bid'),
(16, 'Allocation Accept', 8, 'Geoff (Supplier) accepted The Allocation', 34, 3, 'unread', '2018-03-31 03:56:48', '2018-03-31 03:56:48', 34, 0, ''),
(17, 'Buyer Bid', 0, 'aj shuk (Buyer) Bid Your Post', 34, 3, 'read', '2018-05-04 05:19:24', '2018-05-04 05:19:24', 3, 9, 'Buyer Bid'),
(18, 'Allocation Accept', 9, 'Geoff (Supplier) accepted The Allocation', 34, 3, 'unread', '2018-05-04 05:20:30', '2018-05-04 05:20:30', 34, 0, ''),
(19, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-06-20 12:32:44', '2018-06-20 12:32:44', 3, 10, 'Buyer Bid'),
(20, 'Allocation Accept', 10, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-06-20 12:33:26', '2018-06-20 12:33:26', 2, 0, ''),
(21, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-06-21 12:56:52', '2018-06-21 12:56:52', 3, 11, 'Buyer Bid'),
(22, 'Allocation Accept', 11, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-06-21 12:57:54', '2018-06-21 12:57:54', 2, 0, ''),
(23, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-06-22 13:20:07', '2018-06-22 13:20:07', 3, 12, 'Buyer Bid'),
(24, 'Allocation Accept', 12, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-06-22 13:20:51', '2018-06-22 13:20:51', 2, 0, ''),
(25, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-06-29 00:11:24', '2018-06-29 00:11:24', 3, 13, 'Buyer Bid'),
(26, 'Allocation Accept', 13, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-06-29 00:11:55', '2018-06-29 00:11:55', 2, 0, ''),
(27, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-06-29 00:28:33', '2018-06-29 00:28:33', 3, 14, 'Buyer Bid'),
(28, 'Allocation Reject', 14, 'Geoff (Supplier) rejected The Allocation', 2, 3, 'unread', '2018-06-29 00:31:07', '2018-06-29 00:31:07', 2, 0, ''),
(29, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 3, 'read', '2018-07-06 14:00:38', '2018-07-06 14:00:38', 3, 15, 'Buyer Bid'),
(30, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 3, 'read', '2018-07-06 15:21:12', '2018-07-06 15:21:12', 3, 16, 'Buyer Bid'),
(31, 'Allocation Accept', 15, 'Geoff (Supplier) accepted The Allocation', 8, 3, 'unread', '2018-07-09 04:30:03', '2018-07-09 04:30:03', 8, 0, ''),
(32, 'Allocation Accept', 16, 'Geoff (Supplier) accepted The Allocation', 8, 3, 'unread', '2018-07-09 04:30:03', '2018-07-09 04:30:03', 8, 0, ''),
(33, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 3, 'read', '2018-07-09 23:01:44', '2018-07-09 23:01:44', 3, 17, 'Buyer Bid'),
(34, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 3, 'read', '2018-07-09 23:13:04', '2018-07-09 23:13:04', 3, 18, 'Buyer Bid'),
(35, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-07-09 23:28:14', '2018-07-09 23:28:14', 3, 19, 'Buyer Bid'),
(36, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-07-09 23:28:33', '2018-07-09 23:28:33', 3, 20, 'Buyer Bid'),
(37, 'Allocation Accept', 17, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-10 00:00:03', '2018-07-10 00:00:03', 2, 0, ''),
(38, 'Allocation Reject', 18, 'Geoff (Supplier) rejected The Allocation', 2, 3, 'unread', '2018-07-10 00:01:00', '2018-07-10 00:01:00', 2, 0, ''),
(39, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 3, 'read', '2018-07-10 12:39:19', '2018-07-10 12:39:19', 3, 21, 'Buyer Bid'),
(40, 'Allocation Accept', 19, 'Geoff (Supplier) accepted The Allocation', 8, 3, 'unread', '2018-07-10 12:44:59', '2018-07-10 12:44:59', 8, 0, ''),
(41, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-07-12 00:40:52', '2018-07-12 00:40:52', 3, 22, 'Buyer Bid'),
(42, 'Allocation Accept', 20, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-12 00:45:45', '2018-07-12 00:45:45', 2, 0, ''),
(43, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 3, 'read', '2018-07-12 00:49:18', '2018-07-12 00:49:18', 3, 23, 'Buyer Bid'),
(44, 'Allocation Reject', 21, 'Geoff (Supplier) rejected The Allocation', 8, 3, 'unread', '2018-07-12 00:52:57', '2018-07-12 00:52:57', 8, 0, ''),
(45, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-07-12 03:21:43', '2018-07-12 03:21:43', 3, 24, 'Buyer Bid'),
(46, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'read', '2018-07-12 03:22:59', '2018-07-12 03:22:59', 3, 25, 'Buyer Bid'),
(47, 'Allocation Accept', 22, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-12 09:30:03', '2018-07-12 09:30:03', 2, 0, ''),
(48, 'Allocation Accept', 23, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-12 09:30:03', '2018-07-12 09:30:03', 2, 0, ''),
(49, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 10, 5, 'unread', '2018-07-14 00:33:35', '2018-07-14 00:33:35', 5, 26, 'Buyer Bid'),
(50, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 5, 'unread', '2018-07-14 00:50:02', '2018-07-14 00:50:02', 5, 27, 'Buyer Bid'),
(51, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 5, 'unread', '2018-07-14 00:51:39', '2018-07-14 00:51:39', 5, 28, 'Buyer Bid'),
(52, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 5, 'unread', '2018-07-14 00:52:31', '2018-07-14 00:52:31', 5, 29, 'Buyer Bid'),
(53, 'Allocation Accept', 24, 'Geoff (Supplier) accepted The Allocation', 2, 5, 'unread', '2018-07-14 00:53:53', '2018-07-14 00:53:53', 2, 0, ''),
(54, 'Allocation Reject', 25, 'Geoff (Supplier) rejected The Allocation', 8, 5, 'unread', '2018-07-14 00:54:03', '2018-07-14 00:54:03', 8, 0, ''),
(55, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'unread', '2018-07-15 11:13:01', '2018-07-15 11:13:01', 3, 30, 'Buyer Bid'),
(56, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'unread', '2018-07-15 11:23:21', '2018-07-15 11:23:21', 3, 32, 'Buyer Bid'),
(57, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 9, 5, 'unread', '2018-07-15 15:30:35', '2018-07-15 15:30:35', 5, 33, 'Buyer Bid'),
(58, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 9, 5, 'unread', '2018-07-15 15:30:54', '2018-07-15 15:30:54', 5, 34, 'Buyer Bid'),
(59, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 9, 5, 'unread', '2018-07-15 15:32:30', '2018-07-15 15:32:30', 5, 36, 'Buyer Bid'),
(60, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 10, 5, 'unread', '2018-07-15 15:34:33', '2018-07-15 15:34:33', 5, 37, 'Buyer Bid'),
(61, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 10, 5, 'unread', '2018-07-15 15:35:20', '2018-07-15 15:35:20', 5, 38, 'Buyer Bid'),
(62, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 8, 5, 'unread', '2018-07-15 16:01:08', '2018-07-15 16:01:08', 5, 43, 'Buyer Bid'),
(63, 'Allocation Accept', 26, 'Geoff (Supplier) accepted The Allocation', 9, 5, 'unread', '2018-07-15 16:09:18', '2018-07-15 16:09:18', 9, 0, ''),
(64, 'Allocation Reject', 27, 'Geoff (Supplier) rejected The Allocation', 10, 5, 'unread', '2018-07-15 16:09:27', '2018-07-15 16:09:27', 10, 0, ''),
(65, 'Allocation Accept', 28, 'Geoff (Supplier) accepted The Allocation', 8, 5, 'unread', '2018-07-15 16:30:02', '2018-07-15 16:30:02', 8, 0, ''),
(66, 'Allocation Accept', 29, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-15 17:30:02', '2018-07-15 17:30:02', 2, 0, ''),
(67, 'Allocation Accept', 30, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-15 17:30:02', '2018-07-15 17:30:02', 2, 0, ''),
(68, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'unread', '2018-07-18 01:17:40', '2018-07-18 01:17:40', 3, 47, 'Buyer Bid'),
(69, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 10, 3, 'unread', '2018-07-18 01:37:04', '2018-07-18 01:37:04', 3, 48, 'Buyer Bid'),
(70, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 10, 3, 'unread', '2018-07-18 01:41:22', '2018-07-18 01:41:22', 3, 49, 'Buyer Bid'),
(71, 'Allocation Accept', 31, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-18 01:44:08', '2018-07-18 01:44:08', 2, 0, ''),
(72, 'Allocation Accept', 32, 'Geoff (Supplier) accepted The Allocation', 10, 3, 'unread', '2018-07-18 01:44:13', '2018-07-18 01:44:13', 10, 0, ''),
(73, 'Allocation Accept', 33, 'Geoff (Supplier) accepted The Allocation', 10, 3, 'unread', '2018-07-18 01:45:02', '2018-07-18 01:45:02', 10, 0, ''),
(74, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'unread', '2018-07-20 16:06:13', '2018-07-20 16:06:13', 3, 50, 'Buyer Bid'),
(75, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'unread', '2018-07-20 16:06:15', '2018-07-20 16:06:15', 3, 51, 'Buyer Bid'),
(76, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 10, 5, 'unread', '2018-07-20 16:17:27', '2018-07-20 16:17:27', 5, 54, 'Buyer Bid'),
(77, 'Allocation Reject', 34, 'Geoff (Supplier) rejected The Allocation', 10, 5, 'unread', '2018-07-20 16:32:20', '2018-07-20 16:32:20', 10, 0, ''),
(78, 'Allocation Accept', 35, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-20 22:30:02', '2018-07-20 22:30:02', 2, 0, ''),
(79, 'Allocation Accept', 36, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-20 22:30:02', '2018-07-20 22:30:02', 2, 0, ''),
(80, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'unread', '2018-07-26 05:32:18', '2018-07-26 05:32:18', 3, 55, 'Buyer Bid'),
(81, 'Allocation Accept', 37, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-07-26 05:33:24', '2018-07-26 05:33:24', 2, 0, ''),
(82, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 5, 'unread', '2018-07-26 14:30:59', '2018-07-26 14:30:59', 5, 57, 'Buyer Bid'),
(83, 'Allocation Reject', 38, 'Geoff (Supplier) rejected The Allocation', 2, 5, 'unread', '2018-07-26 14:31:56', '2018-07-26 14:31:56', 2, 0, ''),
(84, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2018-07-27 21:48:07', '2018-07-27 21:48:07', 4, 58, 'Buyer Bid'),
(85, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2018-07-27 21:48:09', '2018-07-27 21:48:09', 4, 59, 'Buyer Bid'),
(86, 'Allocation Accept', 39, 'Geoff (Supplier) accepted The Allocation', 2, 4, 'unread', '2018-07-27 21:58:56', '2018-07-27 21:58:56', 2, 0, ''),
(87, 'Allocation Reject', 40, 'Geoff (Supplier) rejected The Allocation', 2, 4, 'unread', '2018-07-27 21:59:04', '2018-07-27 21:59:04', 2, 0, ''),
(88, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2018-07-30 23:23:57', '2018-07-30 23:23:57', 4, 61, 'Buyer Bid'),
(89, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2018-07-30 23:23:58', '2018-07-30 23:23:58', 4, 62, 'Buyer Bid'),
(90, 'Allocation Accept', 41, 'Geoff (Supplier) accepted The Allocation', 2, 4, 'unread', '2018-07-30 23:37:50', '2018-07-30 23:37:50', 2, 0, ''),
(91, 'Allocation Reject', 42, 'Geoff (Supplier) rejected The Allocation', 2, 4, 'unread', '2018-07-30 23:37:55', '2018-07-30 23:37:55', 2, 0, ''),
(92, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2018-08-03 04:47:23', '2018-08-03 04:47:23', 4, 64, 'Buyer Bid'),
(93, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2018-08-03 04:47:24', '2018-08-03 04:47:24', 4, 65, 'Buyer Bid'),
(94, 'Allocation Accept', 43, 'Geoff (Supplier) accepted The Allocation', 2, 4, 'unread', '2018-08-03 04:50:30', '2018-08-03 04:50:30', 2, 0, ''),
(95, 'Allocation Reject', 44, 'Geoff (Supplier) rejected The Allocation', 2, 4, 'unread', '2018-08-03 04:50:42', '2018-08-03 04:50:42', 2, 0, ''),
(96, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2018-08-06 03:33:13', '2018-08-06 03:33:13', 4, 68, 'Buyer Bid'),
(97, 'Allocation Accept', 45, 'Geoff (Supplier) accepted The Allocation', 2, 4, 'unread', '2018-08-06 05:00:05', '2018-08-06 05:00:05', 2, 0, ''),
(98, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'unread', '2018-09-11 11:42:20', '2018-09-11 11:42:20', 3, 69, 'Buyer Bid'),
(99, 'Allocation Accept', 46, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-09-11 11:45:42', '2018-09-11 11:45:42', 2, 0, ''),
(100, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 3, 'unread', '2018-09-18 03:19:07', '2018-09-18 03:19:07', 3, 70, 'Buyer Bid'),
(101, 'Allocation Accept', 47, 'Geoff (Supplier) accepted The Allocation', 2, 3, 'unread', '2018-09-18 03:21:14', '2018-09-18 03:21:14', 2, 0, ''),
(102, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2019-08-07 02:07:06', '2019-08-07 02:07:06', 4, 71, 'Buyer Bid'),
(103, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2019-08-07 02:32:16', '2019-08-07 02:32:16', 4, 73, 'Buyer Bid'),
(104, 'Allocation Accept', 48, 'Geoff (Supplier) accepted The Allocation', 2, 4, 'unread', '2019-08-07 02:33:21', '2019-08-07 02:33:21', 2, 0, ''),
(105, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 2, 4, 'unread', '2019-08-07 02:44:10', '2019-08-07 02:44:10', 4, 74, 'Buyer Bid'),
(106, 'Allocation Reject', 49, 'Geoff (Supplier) rejected The Allocation', 2, 4, 'unread', '2019-08-07 02:47:25', '2019-08-07 02:47:25', 2, 0, ''),
(107, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 9, 4, 'unread', '2019-08-07 05:14:04', '2019-08-07 05:14:04', 4, 75, 'Buyer Bid'),
(108, 'Buyer Bid', 0, 'Jim (Buyer) Bid Your Post', 9, 4, 'unread', '2019-08-12 12:58:45', '2019-08-12 12:58:45', 4, 77, 'Buyer Bid');

-- --------------------------------------------------------

--
-- Table structure for table `pools`
--

CREATE TABLE `pools` (
  `id` int(11) NOT NULL,
  `pool_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `distance` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `pool_type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pools`
--

INSERT INTO `pools` (`id`, `pool_name`, `created_at`, `updated_at`, `distance`, `pool_type`) VALUES
(1, 'Pool 1', '2017-09-05 11:38:26', '2017-09-05 11:41:26', '100', 2),
(2, 'Pool 2', '2017-09-05 11:38:42', '2017-09-05 11:41:18', '200', 2),
(3, 'Pool 3', '2017-09-05 11:43:06', '2017-09-05 11:43:06', '300', 2),
(4, 'Pool 4', '2017-09-05 11:43:24', '2017-09-05 11:43:24', '400', 2),
(5, 'Pool 5', '2017-09-05 11:43:47', '2017-09-05 11:43:47', '500', 2),
(7, 'Pool 6', '2017-09-07 13:32:33', '2017-09-07 13:32:33', '600', 2),
(8, 'Unlimited Distance', '2017-09-16 10:37:31', '2017-09-25 15:25:26', '0', 2),
(12, 'Confectionary', '2017-09-21 13:48:06', '2017-09-25 15:24:52', '0', 1),
(13, 'Meat', '2017-09-21 13:48:19', '2017-09-21 13:48:19', '0', 1),
(14, 'Dairy', '2017-09-21 13:48:29', '2017-09-21 13:48:29', '0', 1),
(15, 'Poultry', '2017-09-21 13:48:39', '2017-09-21 13:48:39', '0', 1),
(16, 'Fish', '2017-09-21 13:48:49', '2017-09-21 13:48:49', '0', 1),
(17, 'All Preferences', '2017-09-21 13:50:59', '2017-09-25 15:25:08', '0', 1),
(18, 'Buyer Pool 1', '2017-09-21 13:51:33', '2017-09-25 09:59:41', '0', 3),
(20, 'Fruit and Vegitables', '2017-09-25 15:47:56', '2017-09-25 15:48:50', '0', 1),
(21, 'gta', '2017-09-26 13:31:14', '2017-09-26 13:31:14', '0', 3),
(22, 'Disfigured fruit ', '2018-01-09 23:24:37', '2018-01-09 23:24:37', '0', 1),
(23, 'Secured channel', '2018-06-22 23:14:28', '2018-06-22 23:14:28', '0', 3);

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'All', '2017-09-18 10:13:37', '2017-09-18 10:13:37'),
(2, 'Confectionary', '2017-09-18 10:13:46', '2017-09-18 10:13:52'),
(4, 'Meat', '2017-09-18 10:17:06', '2017-09-18 10:17:06'),
(5, 'Dairy', '2017-09-18 10:17:14', '2017-09-18 10:17:14'),
(6, 'Poultry', '2017-09-18 10:17:22', '2017-09-18 10:17:22'),
(7, 'Fish', '2017-09-18 10:17:30', '2017-09-18 10:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_tags` text NOT NULL,
  `type` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(11) NOT NULL,
  `product_tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_name` text NOT NULL,
  `setting_description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `price` text NOT NULL,
  `remainingdays` text NOT NULL,
  `quantity` text NOT NULL,
  `duration` text NOT NULL,
  `pool` text NOT NULL,
  `bank_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_name`, `setting_description`, `created_at`, `updated_at`, `price`, `remainingdays`, `quantity`, `duration`, `pool`, `bank_detail`) VALUES
(2, 'product_detail', '', '2017-06-30 00:00:00', '2017-12-30 01:06:20', '45', '0,Still Good - few days,3+ days,4,5,6,1+ week ,8,9,10,11,12,13,2+week,15,16,17,18,19,20,3+week,22,23,24,25,26,27,28,29,30+,60+,90+', '', '6,1,24,36,12', 'Dairy,Pool 1,Pool 2,Pool 3,Pool 5', 'Bank Name: PNB UK\r\nAc- 00001111222233335555\r\nBranch: Uk.\r\nIFSC Code: pnbuk001.\r\nName- Admin resetfood.');

-- --------------------------------------------------------

--
-- Table structure for table `sku`
--

CREATE TABLE `sku` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_use` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sku`
--

INSERT INTO `sku` (`id`, `sku`, `created_at`, `updated_at`, `is_use`, `created_by`) VALUES
(1, '602000019300', '2017-11-28 00:45:31', '2017-11-28 00:45:31', '1', 3),
(2, '602000019300', '2017-11-28 00:45:31', '2017-11-28 00:45:31', '1', 3),
(3, '602000019300', '2017-11-28 00:45:32', '2017-11-28 00:45:32', '1', 3),
(4, '570000037100', '2017-12-01 16:31:23', '2017-12-01 16:31:23', '1', 3),
(5, '602000019300', '2017-12-02 05:58:34', '2017-12-02 05:58:34', '1', 3),
(6, '681008997900', '2017-12-08 01:55:30', '2017-12-08 01:55:30', '1', 3),
(7, '602000019300', '2017-12-09 17:55:52', '2017-12-09 17:55:52', '1', 3),
(8, '681000842700', '2017-12-09 17:55:53', '2017-12-09 17:55:53', '1', 3),
(9, '681000845900', '2017-12-09 17:55:54', '2017-12-09 17:55:54', '1', 3),
(10, '681008997800', '2017-12-09 17:55:55', '2017-12-09 17:55:55', '1', 3),
(11, '681008997800', '2017-12-09 17:55:56', '2017-12-09 17:55:56', '1', 3),
(12, '681008997900', '2017-12-09 17:55:57', '2017-12-09 17:55:57', '1', 3),
(13, '681008997900', '2017-12-09 17:55:58', '2017-12-09 17:55:58', '1', 3),
(14, '570000060000', '2017-12-09 17:55:59', '2017-12-09 17:55:59', '1', 3),
(15, '570000374400', '2017-12-09 17:56:00', '2017-12-09 17:56:00', '1', 3),
(16, '570000374500', '2017-12-09 17:56:02', '2017-12-09 17:56:02', '1', 3),
(17, '467041684000', '2017-12-09 17:56:05', '2017-12-09 17:56:05', '1', 3),
(18, '570000366600', '2017-12-09 17:56:06', '2017-12-09 17:56:06', '1', 3),
(19, '570000366700', '2017-12-09 17:56:07', '2017-12-09 17:56:07', '1', 3),
(20, '570000366700', '2017-12-09 17:56:09', '2017-12-09 17:56:09', '1', 3),
(21, '570000037100', '2017-12-09 17:56:10', '2017-12-09 17:56:10', '1', 3),
(22, '570000037100', '2017-12-09 17:56:11', '2017-12-09 17:56:11', '1', 3),
(23, '570000068600', '2017-12-09 17:56:12', '2017-12-09 17:56:12', '1', 3),
(24, '570000026700', '2017-12-09 17:56:13', '2017-12-09 17:56:13', '1', 3),
(25, '570000296200', '2017-12-09 17:56:14', '2017-12-09 17:56:14', '1', 3),
(26, '570000340800', '2017-12-09 17:56:16', '2017-12-09 17:56:16', '1', 3),
(27, '570000353300', '2017-12-09 17:56:17', '2017-12-09 17:56:17', '1', 3),
(28, '570000353500', '2017-12-09 17:56:18', '2017-12-09 17:56:18', '1', 3),
(29, '570000353800', '2017-12-09 17:56:19', '2017-12-09 17:56:19', '1', 3),
(30, '570000354400', '2017-12-09 17:56:20', '2017-12-09 17:56:20', '1', 3),
(31, '570000355800', '2017-12-09 17:56:21', '2017-12-09 17:56:21', '1', 3),
(32, '570000343900', '2017-12-09 17:56:22', '2017-12-09 17:56:22', '1', 3),
(33, '570000343900', '2017-12-09 17:56:24', '2017-12-09 17:56:24', '1', 3),
(34, '681000069300', '2017-12-09 17:56:26', '2017-12-09 17:56:26', '1', 3),
(35, '681008935800', '2017-12-09 17:56:27', '2017-12-09 17:56:27', '1', 3),
(36, '681008935800', '2017-12-09 17:56:28', '2017-12-09 17:56:28', '1', 3),
(37, '661880043700', '2017-12-09 17:56:29', '2017-12-09 17:56:29', '1', 3),
(38, '622870520000', '2017-12-09 17:56:30', '2017-12-09 17:56:30', '1', 3),
(39, '622870521300', '2017-12-09 17:56:31', '2017-12-09 17:56:31', '1', 3),
(40, '622871120200', '2017-12-09 17:56:32', '2017-12-09 17:56:32', '1', 3),
(41, '622871120600', '2017-12-09 17:56:33', '2017-12-09 17:56:33', '1', 3),
(42, '622871120900', '2017-12-09 17:56:34', '2017-12-09 17:56:34', '1', 3),
(43, '622872120400', '2017-12-09 17:56:35', '2017-12-09 17:56:35', '1', 3),
(44, '622873120700', '2017-12-09 17:56:37', '2017-12-09 17:56:37', '1', 3),
(45, '622875651000', '2017-12-09 17:56:38', '2017-12-09 17:56:38', '1', 3),
(46, '622875663800', '2017-12-09 17:56:39', '2017-12-09 17:56:39', '1', 3),
(47, '622875664700', '2017-12-09 17:56:40', '2017-12-09 17:56:40', '1', 3),
(48, '622876120400', '2017-12-09 17:56:41', '2017-12-09 17:56:41', '1', 3),
(49, '622876121100', '2017-12-09 17:56:43', '2017-12-09 17:56:43', '1', 3),
(50, '622876121300', '2017-12-09 17:56:45', '2017-12-09 17:56:45', '1', 3),
(51, '622876121900', '2017-12-09 17:56:46', '2017-12-09 17:56:46', '1', 3),
(52, '622878120300', '2017-12-09 17:56:47', '2017-12-09 17:56:47', '1', 3),
(53, '622878120400', '2017-12-09 17:56:48', '2017-12-09 17:56:48', '1', 3),
(54, '622878120500', '2017-12-09 17:56:49', '2017-12-09 17:56:49', '1', 3),
(55, '622878120600', '2017-12-09 17:56:50', '2017-12-09 17:56:50', '1', 3),
(56, '661880039800', '2017-12-09 17:56:51', '2017-12-09 17:56:51', '1', 3),
(57, '661880045600', '2017-12-09 17:56:52', '2017-12-09 17:56:52', '1', 3),
(58, '681000410200', '2017-12-09 17:56:54', '2017-12-09 17:56:54', '1', 3),
(59, '681009001700', '2017-12-09 17:56:55', '2017-12-09 17:56:55', '1', 3),
(60, '681000012400', '2017-12-09 17:56:56', '2017-12-09 17:56:56', '1', 3),
(61, '681008944500', '2017-12-09 17:56:57', '2017-12-09 17:56:57', '1', 3),
(62, '681008994500', '2017-12-09 17:56:58', '2017-12-09 17:56:58', '1', 3),
(63, '681008999400', '2017-12-09 17:56:59', '2017-12-09 17:56:59', '1', 3),
(64, '681000024200', '2017-12-09 17:57:00', '2017-12-09 17:57:00', '1', 3),
(65, '681000029900', '2017-12-09 17:57:01', '2017-12-09 17:57:01', '1', 3),
(66, '681000248200', '2017-12-09 17:57:04', '2017-12-09 17:57:04', '1', 3),
(67, '681000304800', '2017-12-09 17:57:05', '2017-12-09 17:57:05', '1', 3),
(68, '681008946800', '2017-12-09 17:57:07', '2017-12-09 17:57:07', '1', 3),
(69, '681008947600', '2017-12-09 17:57:08', '2017-12-09 17:57:08', '1', 3),
(70, '681008998900', '2017-12-09 17:57:09', '2017-12-09 17:57:09', '1', 3),
(71, '681008998900', '2017-12-09 17:57:10', '2017-12-09 17:57:10', '1', 3),
(72, '681008937000', '2017-12-09 17:57:12', '2017-12-09 17:57:12', '1', 3),
(73, '602000019300', '2017-12-14 02:36:31', '2017-12-14 02:36:31', '1', 3),
(74, '681000024700', '2017-12-14 02:36:33', '2017-12-14 02:36:33', '1', 3),
(75, '622873120700', '2017-12-16 18:50:13', '2017-12-16 18:50:13', '1', 3),
(76, '681000024600', '2017-12-16 18:50:15', '2017-12-16 18:50:15', '1', 3),
(77, '681000024700', '2017-12-16 18:50:18', '2017-12-16 18:50:18', '1', 3),
(78, '570000353500', '2017-12-17 05:03:06', '2017-12-17 05:03:06', '1', 3),
(79, '681008944500', '2017-12-17 05:03:08', '2017-12-17 05:03:08', '1', 3),
(80, '681008994500', '2017-12-17 05:03:09', '2017-12-17 05:03:09', '1', 3),
(81, '681008999400', '2017-12-17 05:03:10', '2017-12-17 05:03:10', '1', 3),
(82, '681000024400', '2017-12-17 05:04:46', '2017-12-17 05:04:46', '1', 3),
(83, '681000024700', '2017-12-17 05:04:47', '2017-12-17 05:04:47', '1', 3),
(84, '681000024700', '2017-12-19 07:38:39', '2017-12-19 07:38:39', '1', 3),
(85, '681000024700', '2017-12-19 07:38:40', '2017-12-19 07:38:40', '1', 3),
(86, '602000019300', '2017-12-20 07:59:36', '2017-12-20 07:59:36', '1', 3),
(87, '602000019300', '2017-12-20 08:12:11', '2017-12-20 08:12:11', '1', 3),
(88, '602000019300', '2017-12-20 08:14:50', '2017-12-20 08:14:50', '1', 3),
(89, '681000842700', '2017-12-20 08:17:00', '2017-12-20 08:17:00', '1', 3),
(90, '602000019300', '2017-12-21 10:33:08', '2017-12-21 10:33:08', '1', 3),
(91, '681000842700', '2017-12-21 10:33:08', '2017-12-21 10:33:08', '1', 3),
(92, '681000845900', '2017-12-21 10:33:08', '2017-12-21 10:33:08', '1', 3),
(93, '681008997800', '2017-12-21 10:33:08', '2017-12-21 10:33:08', '1', 3),
(94, '681008997800', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(95, '681008997900', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(96, '681008997900', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(97, '570000060000', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(98, '570000374400', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(99, '570000374500', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(100, '467041684000', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(101, '570000366600', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(102, '570000366700', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(103, '570000366700', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(104, '570000037100', '2017-12-21 10:33:09', '2017-12-21 10:33:09', '1', 3),
(105, '570000037100', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(106, '570000068600', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(107, '570000026700', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(108, '570000296200', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(109, '570000340800', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(110, '570000353300', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(111, '570000353500', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(112, '570000353800', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(113, '570000354400', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(114, '570000355800', '2017-12-21 10:33:10', '2017-12-21 10:33:10', '1', 3),
(115, '570000343900', '2017-12-21 10:33:11', '2017-12-21 10:33:11', '1', 3),
(116, '570000343900', '2017-12-21 10:33:11', '2017-12-21 10:33:11', '1', 3),
(117, '681000069300', '2017-12-21 10:33:11', '2017-12-21 10:33:11', '1', 3),
(118, '681008935800', '2017-12-21 10:33:11', '2017-12-21 10:33:11', '1', 3),
(119, '681008935800', '2017-12-21 10:33:11', '2017-12-21 10:33:11', '1', 3),
(120, '681000024700', '2017-12-21 10:33:11', '2017-12-21 10:33:11', '1', 3),
(121, '602000019300', '2017-12-21 12:37:41', '2017-12-21 12:37:41', '1', 3),
(122, '681008937000', '2017-12-22 05:35:31', '2017-12-22 05:35:31', '1', 3),
(123, '681000024600', '2017-12-22 05:35:31', '2017-12-22 05:35:31', '1', 3),
(124, '681000024700', '2017-12-22 05:35:32', '2017-12-22 05:35:32', '1', 3),
(125, '602000019300', '2017-12-22 10:36:33', '2017-12-22 10:36:33', '1', 3),
(126, '602000019300', '2017-12-22 11:22:55', '2017-12-22 11:22:55', '1', 3),
(127, '602000019300', '2017-12-22 11:47:38', '2017-12-22 11:47:38', '1', 3),
(128, '602000019300', '2017-12-22 12:06:15', '2017-12-22 12:06:15', '1', 3),
(129, '602000019300', '2017-12-22 13:53:28', '2017-12-22 13:53:28', '1', 3),
(130, '681000012400', '2017-12-22 13:53:28', '2017-12-22 13:53:28', '1', 3),
(131, '681000024700', '2017-12-22 13:53:28', '2017-12-22 13:53:28', '1', 3),
(132, '602000019300', '2017-12-23 16:40:02', '2017-12-23 16:40:02', '1', 3),
(133, '681000842700', '2017-12-23 16:40:03', '2017-12-23 16:40:03', '1', 3),
(134, '681000024700', '2017-12-23 16:40:03', '2017-12-23 16:40:03', '1', 3),
(135, '602000019300', '2017-12-23 17:47:31', '2017-12-23 17:47:31', '1', 3),
(136, '622878120500', '2017-12-23 17:47:31', '2017-12-23 17:47:31', '1', 3),
(137, '622878120600', '2017-12-23 17:47:31', '2017-12-23 17:47:31', '1', 3),
(138, '681000024600', '2017-12-23 17:47:32', '2017-12-23 17:47:32', '1', 3),
(139, '681000024700', '2017-12-23 17:47:32', '2017-12-23 17:47:32', '1', 3),
(140, '5756778', '2017-12-23 17:47:32', '2017-12-23 17:47:32', '1', 3),
(141, '602000019300', '2017-12-26 06:16:44', '2017-12-26 06:16:44', '1', 3),
(142, '602000019300', '2017-12-27 03:12:25', '2017-12-27 03:12:25', '1', 3),
(143, '602000019300', '2017-12-27 13:38:44', '2017-12-27 13:38:44', '1', 3),
(144, '602000019300', '2017-12-28 12:46:35', '2017-12-28 12:46:35', '1', 3),
(145, '1000011', '2017-12-29 07:42:18', '2017-12-29 07:42:18', '1', 3),
(146, '570000060000', '2017-12-29 10:00:02', '2017-12-29 10:00:02', '1', 3),
(147, '681000024400', '2017-12-30 01:41:16', '2017-12-30 01:41:16', '1', 3),
(148, '681000024600', '2017-12-30 01:41:16', '2017-12-30 01:41:16', '1', 3),
(149, '681000024700', '2017-12-30 01:41:16', '2017-12-30 01:41:16', '1', 3),
(150, '681000842700', '2017-12-30 10:32:38', '2017-12-30 10:32:38', '1', 3),
(151, '681000845900', '2017-12-30 10:32:39', '2017-12-30 10:32:39', '1', 3),
(152, '602000019300', '2018-01-10 12:34:14', '2018-01-10 12:34:14', '1', 3),
(153, '681000842700', '2018-01-10 12:34:14', '2018-01-10 12:34:14', '1', 3),
(154, '681000842701', '2018-01-10 12:43:02', '2018-01-10 12:43:02', '1', 3),
(155, '681000024200', '2018-01-11 04:32:37', '2018-01-11 04:32:37', '1', 3),
(156, '681000024600', '2018-01-11 04:32:37', '2018-01-11 04:32:37', '1', 3),
(157, '681000024700', '2018-01-11 04:32:37', '2018-01-11 04:32:37', '1', 3),
(158, '602000019300', '2018-01-12 04:43:37', '2018-01-12 04:43:37', '1', 3),
(159, '681000842700', '2018-01-12 04:43:38', '2018-01-12 04:43:38', '1', 3),
(160, '570000060000', '2018-01-12 04:43:38', '2018-01-12 04:43:38', '1', 3),
(161, '570000374400', '2018-01-12 04:43:38', '2018-01-12 04:43:38', '1', 3),
(162, '373663', '2018-01-12 04:43:38', '2018-01-12 04:43:38', '1', 3),
(163, '681000012400', '2018-01-12 04:43:38', '2018-01-12 04:43:38', '1', 3),
(164, '681008944500', '2018-01-12 04:43:38', '2018-01-12 04:43:38', '1', 3),
(165, '681008994500', '2018-01-12 04:43:38', '2018-01-12 04:43:38', '1', 3),
(166, '681000024700', '2018-01-12 04:43:38', '2018-01-12 04:43:38', '1', 3),
(167, '868976', '2018-01-12 06:04:10', '2018-01-12 06:04:10', '1', 3),
(168, '681000842700', '2018-01-13 14:46:54', '2018-01-13 14:46:54', '1', 3),
(169, '681000012400', '2018-01-13 14:52:21', '2018-01-13 14:52:21', '1', 3),
(170, '68768', '2018-01-13 14:59:25', '2018-01-13 14:59:25', '1', 3),
(171, '681000024600', '2018-01-13 15:08:57', '2018-01-13 15:08:57', '1', 3),
(172, '602000019300', '2018-01-13 15:16:38', '2018-01-13 15:16:38', '1', 3),
(173, '602', '2018-01-13 15:16:38', '2018-01-13 15:16:38', '1', 3),
(174, '681000410200', '2018-01-13 15:23:00', '2018-01-13 15:23:00', '1', 3),
(175, '681', '2018-01-13 15:23:00', '2018-01-13 15:23:00', '1', 3),
(176, '570000068600', '2018-01-13 15:30:17', '2018-01-13 15:30:17', '1', 3),
(177, '57', '2018-01-13 15:30:17', '2018-01-13 15:30:17', '1', 3),
(178, '123', '2018-01-13 15:47:43', '2018-01-13 15:47:43', '1', 3),
(179, '1', '2018-01-13 16:36:38', '2018-01-13 16:36:38', '1', 3),
(180, '12', '2018-01-13 16:47:34', '2018-01-13 16:47:34', '1', 3),
(181, '4', '2018-01-13 17:04:23', '2018-01-13 17:04:23', '1', 3),
(182, '681000024600', '2018-01-16 09:59:02', '2018-01-16 09:59:02', '1', 3),
(183, '681000024700', '2018-01-16 09:59:03', '2018-01-16 09:59:03', '1', 3),
(184, '681000024600', '2018-01-16 12:25:32', '2018-01-16 12:25:32', '1', 3),
(185, '681000024700', '2018-01-16 12:25:32', '2018-01-16 12:25:32', '1', 3),
(186, '602000019300', '2018-01-16 12:40:13', '2018-01-16 12:40:13', '1', 3),
(187, '681000842700', '2018-01-16 12:40:13', '2018-01-16 12:40:13', '1', 3),
(188, '602000019300', '2018-01-16 13:07:39', '2018-01-16 13:07:39', '1', 3),
(189, '570000374400', '2018-01-16 13:13:21', '2018-01-16 13:13:21', '1', 3),
(190, '681009001700', '2018-01-16 13:20:56', '2018-01-16 13:20:56', '1', 3),
(191, '681000842700', '2018-01-16 13:25:09', '2018-01-16 13:25:09', '1', 3),
(192, '661880043700', '2018-01-16 13:34:11', '2018-01-16 13:34:11', '1', 3),
(193, '622876120400', '2018-01-16 13:37:41', '2018-01-16 13:37:41', '1', 3),
(194, '622876120400', '2018-01-16 13:52:19', '2018-01-16 13:52:19', '1', 3),
(195, '622875664700', '2018-01-16 14:28:27', '2018-01-16 14:28:27', '1', 3),
(196, '622876120400', '2018-01-16 14:28:28', '2018-01-16 14:28:28', '1', 3),
(197, '602000019300', '2018-01-16 23:01:11', '2018-01-16 23:01:11', '1', 3),
(198, '681000024600', '2018-01-16 23:01:11', '2018-01-16 23:01:11', '1', 3),
(199, '681000024700', '2018-01-16 23:01:11', '2018-01-16 23:01:11', '1', 3),
(200, 'y68969', '2018-01-16 23:01:11', '2018-01-16 23:01:11', '1', 3),
(201, '602000019300', '2018-01-17 06:54:36', '2018-01-17 06:54:36', '1', 3),
(202, '622870521300', '2018-01-17 07:36:30', '2018-01-17 07:36:30', '1', 3),
(203, '602000019300', '2018-01-17 08:07:15', '2018-01-17 08:07:15', '1', 3),
(204, '1234567890', '2018-01-17 08:30:36', '2018-01-17 08:30:36', '1', 3),
(205, '622875664700', '2018-01-17 11:09:50', '2018-01-17 11:09:50', '1', 3),
(206, '681000024700', '2018-01-17 11:09:50', '2018-01-17 11:09:50', '1', 3),
(207, '681000024400', '2018-01-17 12:42:49', '2018-01-17 12:42:49', '1', 3),
(208, '681000024600', '2018-01-17 12:42:49', '2018-01-17 12:42:49', '1', 3),
(209, '681000024700', '2018-01-17 12:42:49', '2018-01-17 12:42:49', '1', 3),
(210, '123', '2018-01-17 12:42:49', '2018-01-17 12:42:49', '1', 3),
(211, '602000019300', '2018-01-17 13:27:52', '2018-01-17 13:27:52', '1', 3),
(212, '602000019300', '2018-01-17 13:41:29', '2018-01-17 13:41:29', '1', 3),
(213, '602000019300', '2018-01-17 13:44:50', '2018-01-17 13:44:50', '1', 3),
(214, '681000024700', '2018-01-17 22:57:51', '2018-01-17 22:57:51', '1', 3),
(215, '456', '2018-01-17 22:57:51', '2018-01-17 22:57:51', '1', 3),
(216, '123', '2018-01-17 23:11:53', '2018-01-17 23:11:53', '1', 3),
(217, '111', '2018-01-17 23:28:36', '2018-01-17 23:28:36', '1', 3),
(218, '1', '2018-01-19 03:58:35', '2018-01-19 03:58:35', '1', 3),
(219, '123', '2018-01-19 04:06:00', '2018-01-19 04:06:00', '1', 3),
(220, '456', '2018-01-20 15:31:38', '2018-01-20 15:31:38', '1', 3),
(221, '602000019300', '2018-01-22 11:12:52', '2018-01-22 11:12:52', '1', 3),
(222, '602000019300', '2018-01-22 12:04:39', '2018-01-22 12:04:39', '1', 3),
(223, '602000019300', '2018-01-22 12:39:09', '2018-01-22 12:39:09', '1', 3),
(224, '681000024400', '2018-01-22 12:56:30', '2018-01-22 12:56:30', '1', 3),
(225, '602000019300', '2018-01-22 13:30:29', '2018-01-22 13:30:29', '1', 3),
(226, '622878120600', '2018-01-22 14:01:39', '2018-01-22 14:01:39', '1', 3),
(227, '1', '2018-01-23 00:40:43', '2018-01-23 00:40:43', '1', 3),
(228, '2', '2018-01-23 04:26:28', '2018-01-23 04:26:28', '1', 3),
(229, '3', '2018-01-23 04:31:13', '2018-01-23 04:31:13', '1', 3),
(230, '602000019300', '2018-01-23 08:15:30', '2018-01-23 08:15:30', '1', 3),
(231, '681000024700', '2018-01-23 08:15:30', '2018-01-23 08:15:30', '1', 3),
(232, '4', '2018-01-24 01:06:57', '2018-01-24 01:06:57', '1', 3),
(233, '681000024700', '2018-01-24 03:12:32', '2018-01-24 03:12:32', '1', 3),
(234, '570000340800', '2018-01-24 03:15:38', '2018-01-24 03:15:38', '1', 3),
(235, '4', '2018-01-24 22:58:02', '2018-01-24 22:58:02', '1', 3),
(236, '5', '2018-01-25 12:29:23', '2018-01-25 12:29:23', '1', 3),
(237, '3', '2018-01-25 12:31:23', '2018-01-25 12:31:23', '1', 3),
(238, '800', '2018-01-25 12:37:36', '2018-01-25 12:37:36', '1', 3),
(239, '1099', '2018-01-25 12:40:37', '2018-01-25 12:40:37', '1', 3),
(240, '`', '2018-01-25 17:49:25', '2018-01-25 17:49:25', '1', 3),
(241, '602000019300', '2018-01-27 11:25:48', '2018-01-27 11:25:48', '1', 3),
(242, '681000842700', '2018-01-27 11:25:48', '2018-01-27 11:25:48', '1', 3),
(243, '681000845900', '2018-01-27 11:25:48', '2018-01-27 11:25:48', '1', 3),
(244, '1', '2018-01-28 03:39:08', '2018-01-28 03:39:08', '1', 3),
(245, '1', '2018-01-28 04:11:38', '2018-01-28 04:11:38', '1', 3),
(246, '1', '2018-01-30 02:58:02', '2018-01-30 02:58:02', '1', 3),
(247, '602000019300', '2018-01-30 03:08:09', '2018-01-30 03:08:09', '1', 3),
(248, '1', '2018-01-30 23:00:29', '2018-01-30 23:00:29', '1', 3),
(249, '2', '2018-01-31 10:54:51', '2018-01-31 10:54:51', '1', 3),
(250, '3', '2018-01-31 10:54:51', '2018-01-31 10:54:51', '1', 3),
(251, 'itme', '2018-01-31 13:30:15', '2018-01-31 13:30:15', '1', 3),
(252, '1', '2018-01-31 23:42:54', '2018-01-31 23:42:54', '1', 3),
(253, '602000019300', '2018-02-01 05:46:27', '2018-02-01 05:46:27', '1', 3),
(254, '43000', '2018-02-01 11:47:35', '2018-02-01 11:47:35', '1', 3),
(255, '43000', '2018-02-03 21:37:44', '2018-02-03 21:37:44', '1', 3),
(256, '2525', '2018-03-09 08:17:41', '2018-03-09 08:17:41', '1', 3),
(257, '2525', '2018-03-09 08:19:42', '2018-03-09 08:19:42', '1', 3),
(258, '11', '2018-03-15 10:38:06', '2018-03-15 10:38:06', '1', 3),
(259, '1', '2018-03-18 06:26:45', '2018-03-18 06:26:45', '1', 3),
(260, '1', '2018-03-20 02:49:51', '2018-03-20 02:49:51', '1', 3),
(261, '602000019300', '2018-03-20 23:43:18', '2018-03-20 23:43:18', '1', 3),
(262, '681000024600', '2018-03-20 23:43:18', '2018-03-20 23:43:18', '1', 3),
(263, '681000024700', '2018-03-20 23:43:18', '2018-03-20 23:43:18', '1', 3),
(264, '1', '2018-03-20 23:43:18', '2018-03-20 23:43:18', '1', 3),
(265, '602000019300', '2018-03-23 14:59:46', '2018-03-23 14:59:46', '1', 3),
(266, '570000068600', '2018-03-23 14:59:47', '2018-03-23 14:59:47', '1', 3),
(267, '602000019300', '2018-03-31 03:53:23', '2018-03-31 03:53:23', '1', 3),
(268, '46546', '2018-03-31 03:53:23', '2018-03-31 03:53:23', '1', 3),
(269, '131', '2018-05-04 05:18:01', '2018-05-04 05:18:01', '1', 3),
(270, '1', '2018-05-06 03:29:29', '2018-05-06 03:29:29', '1', 3),
(271, '602000019300', '2018-06-20 12:15:23', '2018-06-20 12:15:23', '1', 3),
(272, '602000019300', '2018-06-20 12:28:39', '2018-06-20 12:28:39', '1', 3),
(273, '602000019300', '2018-06-21 03:53:23', '2018-06-21 03:53:23', '1', 3),
(274, '602000019300', '2018-06-21 04:23:19', '2018-06-21 04:23:19', '1', 3),
(275, '602000019300', '2018-06-21 04:24:16', '2018-06-21 04:24:16', '1', 3),
(276, '602000019300', '2018-06-21 04:25:04', '2018-06-21 04:25:04', '1', 3),
(277, '602000019300', '2018-06-21 04:26:07', '2018-06-21 04:26:07', '1', 3),
(278, '602000019300', '2018-06-21 11:24:40', '2018-06-21 11:24:40', '1', 3),
(279, '602000019300', '2018-06-21 11:27:09', '2018-06-21 11:27:09', '1', 3),
(280, '602000019300', '2018-06-21 11:30:44', '2018-06-21 11:30:44', '1', 3),
(281, '10', '2018-06-21 12:55:37', '2018-06-21 12:55:37', '1', 3),
(282, '10', '2018-06-21 13:05:01', '2018-06-21 13:05:01', '1', 3),
(283, '602000019300', '2018-06-22 05:53:23', '2018-06-22 05:53:23', '1', 3),
(284, '602000019300', '2018-06-22 05:53:23', '2018-06-22 05:53:23', '1', 3),
(285, '43000', '2018-06-22 05:58:32', '2018-06-22 05:58:32', '1', 3),
(286, '602000019300', '2018-06-22 09:47:49', '2018-06-22 09:47:49', '1', 3),
(287, '602000019300', '2018-06-22 09:47:49', '2018-06-22 09:47:49', '1', 3),
(288, '602000019300', '2018-06-22 09:51:11', '2018-06-22 09:51:11', '1', 3),
(289, '602000019300', '2018-06-22 09:51:11', '2018-06-22 09:51:11', '1', 3),
(290, '10', '2018-06-22 13:18:11', '2018-06-22 13:18:11', '1', 3),
(291, '566655', '2018-06-28 14:17:45', '2018-06-28 14:17:45', '1', 3),
(292, '11111111111111', '2018-06-29 00:07:06', '2018-06-29 00:07:06', '1', 3),
(293, '2222', '2018-06-29 00:14:21', '2018-06-29 00:14:21', '1', 3),
(294, '333', '2018-06-29 00:27:55', '2018-06-29 00:27:55', '1', 3),
(295, '4444', '2018-06-29 14:58:16', '2018-06-29 14:58:16', '1', 3),
(296, '9999', '2018-07-06 13:58:08', '2018-07-06 13:58:08', '1', 3),
(297, '9999', '2018-07-06 15:19:56', '2018-07-06 15:19:56', '1', 3),
(298, '888', '2018-07-09 22:57:07', '2018-07-09 22:57:07', '1', 3),
(299, '777', '2018-07-09 23:05:57', '2018-07-09 23:05:57', '1', 3),
(300, '666', '2018-07-09 23:26:02', '2018-07-09 23:26:02', '1', 3),
(301, '777', '2018-07-10 00:56:03', '2018-07-10 00:56:03', '1', 3),
(302, '555', '2018-07-10 12:38:10', '2018-07-10 12:38:10', '1', 3),
(303, '222', '2018-07-12 00:21:32', '2018-07-12 00:21:32', '1', 3),
(304, '22222', '2018-07-12 00:27:10', '2018-07-12 00:27:10', '1', 3),
(305, 'BRI123', '2018-07-12 03:11:12', '2018-07-12 03:11:12', '1', 3),
(306, 'PROD123', '2018-07-12 03:13:25', '2018-07-12 03:13:25', '1', 3),
(307, 'SDER', '2018-07-12 03:18:33', '2018-07-12 03:18:33', '1', 3),
(308, 'SKUNW', '2018-07-13 08:41:57', '2018-07-13 08:41:57', '1', 3),
(309, '999', '2018-07-14 00:21:27', '2018-07-14 00:21:27', '1', 5),
(310, '888', '2018-07-14 00:23:08', '2018-07-14 00:23:08', '1', 5),
(311, '777', '2018-07-14 00:37:10', '2018-07-14 00:37:10', '1', 5),
(312, '111', '2018-07-15 11:11:01', '2018-07-15 11:11:01', '1', 3),
(313, 'sadasd', '2018-07-15 11:13:44', '2018-07-15 11:13:44', '1', 3),
(314, 'ss', '2018-07-15 11:20:58', '2018-07-15 11:20:58', '1', 3),
(315, '777', '2018-07-15 15:19:55', '2018-07-15 15:19:55', '1', 5),
(316, '666', '2018-07-15 15:21:16', '2018-07-15 15:21:16', '1', 5),
(317, '555', '2018-07-15 15:22:29', '2018-07-15 15:22:29', '1', 5),
(318, '444', '2018-07-15 15:23:43', '2018-07-15 15:23:43', '1', 5),
(319, '333', '2018-07-15 15:29:08', '2018-07-15 15:29:08', '1', 5),
(320, '111', '2018-07-15 16:12:14', '2018-07-15 16:12:14', '1', 5),
(321, '333', '2018-07-17 03:24:11', '2018-07-17 03:24:11', '1', 3),
(322, '999', '2018-07-17 03:28:04', '2018-07-17 03:28:04', '1', 5),
(323, '222', '2018-07-17 03:34:21', '2018-07-17 03:34:21', '1', 5),
(324, 'NE222', '2018-07-17 05:18:15', '2018-07-17 05:18:15', '1', 3),
(325, '9999', '2018-07-18 01:13:13', '2018-07-18 01:13:13', '1', 3),
(326, '888', '2018-07-18 01:34:17', '2018-07-18 01:34:17', '1', 3),
(327, '9999', '2018-07-18 01:39:51', '2018-07-18 01:39:51', '1', 3),
(328, 'cat1', '2018-07-20 03:55:46', '2018-07-20 03:55:46', '1', 3),
(329, 'Nav1', '2018-07-20 04:12:38', '2018-07-20 04:12:38', '1', 3),
(330, '9999', '2018-07-20 16:03:33', '2018-07-20 16:03:33', '1', 3),
(331, '9999', '2018-07-20 16:03:33', '2018-07-20 16:03:33', '1', 3),
(332, '111', '2018-07-20 16:13:26', '2018-07-20 16:13:26', '1', 5),
(333, '111', '2018-07-20 16:13:26', '2018-07-20 16:13:26', '1', 5),
(334, '111', '2018-07-20 16:13:26', '2018-07-20 16:13:26', '1', 5),
(335, '11111111111111', '2018-07-26 05:31:06', '2018-07-26 05:31:06', '1', 3),
(336, '12345', '2018-07-26 05:38:13', '2018-07-26 05:38:13', '1', 3),
(337, '222', '2018-07-26 14:28:17', '2018-07-26 14:28:17', '1', 5),
(338, '111', '2018-07-27 21:40:44', '2018-07-27 21:40:44', '1', 4),
(339, '111', '2018-07-27 21:40:45', '2018-07-27 21:40:45', '1', 4),
(340, '111', '2018-07-27 21:40:45', '2018-07-27 21:40:45', '1', 4),
(341, 'SUPLIER1', '2018-07-30 11:18:34', '2018-07-30 11:18:34', '1', 3),
(342, 'SUPLIER1123', '2018-07-30 11:36:54', '2018-07-30 11:36:54', '1', 3),
(343, 'suppeler3', '2018-07-30 11:47:51', '2018-07-30 11:47:51', '1', 4),
(344, '111', '2018-07-30 23:18:52', '2018-07-30 23:18:52', '1', 4),
(345, '111', '2018-07-30 23:18:52', '2018-07-30 23:18:52', '1', 4),
(346, '111', '2018-07-30 23:18:52', '2018-07-30 23:18:52', '1', 4),
(347, '111', '2018-08-03 04:42:40', '2018-08-03 04:42:40', '1', 4),
(348, '111', '2018-08-03 04:42:41', '2018-08-03 04:42:41', '1', 4),
(349, '111', '2018-08-03 04:42:41', '2018-08-03 04:42:41', '1', 4),
(350, '111', '2018-08-06 03:31:50', '2018-08-06 03:31:50', '1', 4),
(351, '123', '2018-09-11 11:38:56', '2018-09-11 11:38:56', '1', 3),
(352, '123', '2018-09-18 03:16:47', '2018-09-18 03:16:47', '1', 3),
(353, '11', '2019-02-21 19:22:28', '2019-02-21 19:22:28', '0', 3),
(354, '1', '2019-02-21 19:29:16', '2019-02-21 19:29:16', '1', 3),
(355, '2', '2019-02-21 19:33:15', '2019-02-21 19:33:15', '1', 3),
(356, 'warwqrqw', '2019-04-10 14:31:44', '2019-04-10 14:31:44', '0', 4),
(357, '235235', '2019-05-01 10:06:32', '2019-05-01 10:06:32', '0', 4),
(358, '213', '2019-05-01 10:09:40', '2019-05-01 10:09:40', '0', 4),
(359, '54345', '2019-05-01 10:23:29', '2019-05-01 10:23:29', '0', 4),
(360, '123', '2019-05-01 10:25:22', '2019-05-01 10:25:22', '1', 4),
(361, '554', '2019-08-06 04:00:03', '2019-08-06 04:00:03', '1', 5),
(362, 'asbs', '2019-08-06 04:05:26', '2019-08-06 04:05:26', '1', 5),
(363, 'sdf', '2019-08-06 04:19:43', '2019-08-06 04:19:43', '1', 4),
(364, 'sdf', '2019-08-06 04:22:09', '2019-08-06 04:22:09', '1', 4),
(365, '111', '2019-08-06 04:22:56', '2019-08-06 04:22:56', '1', 4),
(366, '123', '2019-08-06 04:28:58', '2019-08-06 04:28:58', '1', 4),
(367, 'sdf', '2019-08-06 04:32:53', '2019-08-06 04:32:53', '1', 4),
(368, 'sdf', '2019-08-06 04:38:34', '2019-08-06 04:38:34', '1', 4),
(369, 'sdf', '2019-08-06 04:39:52', '2019-08-06 04:39:52', '1', 4),
(370, 'weq', '2019-08-06 04:45:45', '2019-08-06 04:45:45', '1', 4),
(371, '1', '2019-08-06 04:49:24', '2019-08-06 04:49:24', '1', 4),
(372, '1', '2019-08-06 12:38:35', '2019-08-06 12:38:35', '1', 4),
(373, '222', '2019-08-07 02:06:26', '2019-08-07 02:06:26', '1', 4),
(374, 'wqe', '2019-08-07 02:31:48', '2019-08-07 02:31:48', '1', 4),
(375, 'sada', '2019-08-07 02:42:29', '2019-08-07 02:42:29', '1', 4),
(376, '12312', '2019-08-07 04:04:50', '2019-08-07 04:04:50', '1', 4),
(377, '32', '2019-08-12 11:40:29', '2019-08-12 11:40:29', '1', 4),
(378, '123', '2019-08-12 12:52:19', '2019-08-12 12:52:19', '1', 4),
(379, '1', '2019-08-12 12:55:55', '2019-08-12 12:55:55', '1', 4),
(380, '2', '2019-08-12 18:43:43', '2019-08-12 18:43:43', '1', 4),
(381, '223', '2019-08-12 19:23:42', '2019-08-12 19:23:42', '1', 4),
(382, '231', '2019-08-12 19:29:12', '2019-08-12 19:29:12', '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_allocations`
--

CREATE TABLE `supplier_allocations` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `buyer_post_id` int(11) NOT NULL,
  `is_other_post` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `buyer_other_post_id` int(11) NOT NULL,
  `allocation` float NOT NULL,
  `requried_quantity` float NOT NULL,
  `reallocation` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_post_id` int(11) NOT NULL,
  `supplier_other_post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_email_sent` int(11) NOT NULL DEFAULT 0,
  `is_allocation_email` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_bid` float NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier_allocations`
--

INSERT INTO `supplier_allocations` (`id`, `supplier_id`, `buyer_id`, `buyer_post_id`, `is_other_post`, `buyer_other_post_id`, `allocation`, `requried_quantity`, `reallocation`, `category_id`, `product_id`, `product_name`, `supplier_post_id`, `supplier_other_post_id`, `created_at`, `updated_at`, `status`, `is_email_sent`, `is_allocation_email`, `parent_id`, `rating`, `comments`, `sku`, `buyer_bid`, `payment_status`) VALUES
(1, 3, 34, 1, '0', 0, 120, 120, 0, 0, '', '', 1, 0, '2018-02-01 05:54:55', '2018-02-01 05:54:55', 'accepted', 1, 1, 0, 0, '', '253', 1800, 'pending'),
(2, 3, 34, 2, '0', 0, 140, 140, 0, 0, '', '', 3, 0, '2018-02-01 11:48:55', '2018-02-01 11:48:55', 'accepted', 1, 1, 0, 0, '', '254', 1800, 'pending'),
(3, 3, 2, 3, '0', 0, 70, 70, 0, 0, '', '', 5, 0, '2018-02-01 23:25:33', '2018-07-05 05:07:21', 'accepted', 1, 1, 0, 0, '', '253', 1000, 'Payment Made'),
(4, 3, 34, 4, '0', 0, 15, 15, 0, 0, '', '', 8, 0, '2018-02-02 13:51:46', '2018-02-02 13:51:46', 'accepted', 1, 1, 0, 0, '', '253', 1800, 'pending'),
(5, 3, 2, 5, '0', 0, 80, 80, 0, 0, '', '', 13, 0, '2018-02-07 01:47:52', '2018-02-07 01:47:52', 'accepted', 1, 1, 0, 0, '', '254', 677, 'pending'),
(6, 3, 2, 6, '0', 0, 25, 25, 0, 0, '', '', 14, 0, '2018-02-07 01:49:26', '2018-07-05 05:06:03', 'rejected', 1, 1, 0, 0, '', '254', 888, 'Payment Made'),
(7, 3, 34, 7, '0', 0, 70, 70, 0, 0, '', '', 20, 0, '2018-03-19 03:23:59', '2018-07-05 04:58:21', 'accepted', 1, 1, 0, 0, '', '253', 800, 'Payment Made'),
(8, 3, 34, 8, '0', 0, 50, 50, 0, 0, '', '', 29, 0, '2018-03-31 03:56:48', '2018-03-31 03:56:48', 'accepted', 1, 1, 0, 0, '', '268', 120, 'pending'),
(9, 3, 34, 9, '0', 0, 100, 100, 0, 0, '', '', 31, 0, '2018-05-04 05:20:30', '2018-07-02 05:21:51', 'accepted', 1, 1, 0, 0, '', '269', 6, 'Payment Made'),
(10, 3, 2, 10, '0', 0, 15, 15, 0, 0, '', '', 38, 0, '2018-06-20 12:33:26', '2018-07-05 05:05:51', 'accepted', 1, 1, 0, 0, '', '272', 500, 'Payment Made'),
(11, 3, 2, 11, '0', 0, 10, 10, 0, 0, '', '', 47, 0, '2018-06-21 12:57:54', '2018-07-05 04:59:42', 'accepted', 1, 1, 0, 0, '', '281', 11, 'Completed'),
(12, 3, 2, 12, '0', 0, 2, 2, 0, 0, '', '', 56, 0, '2018-06-22 13:20:51', '2018-06-29 14:36:31', 'accepted', 1, 1, 0, 0, '', '290', 500, 'Payment Made'),
(13, 3, 2, 13, '0', 0, 111111, 111111, 0, 0, '', '', 58, 0, '2018-06-29 00:11:55', '2018-07-08 23:55:30', 'accepted', 1, 1, 0, 0, '', '292', 1111, 'Completed'),
(14, 3, 2, 14, '0', 0, 333, 333, 0, 0, '', '', 60, 0, '2018-06-29 00:31:07', '2018-07-05 05:56:05', 'rejected', 1, 1, 0, 0, '', '294', 333333, 'Completed'),
(15, 3, 8, 15, '0', 0, 99999, 99999, 0, 0, '', '', 62, 0, '2018-07-09 04:30:03', '2018-07-09 04:30:03', 'accepted', 1, 1, 0, 0, '', '296', 9999, 'pending'),
(16, 3, 8, 16, '0', 0, 999, 999, 0, 0, '', '', 63, 0, '2018-07-09 04:30:03', '2018-07-09 04:30:03', 'accepted', 1, 1, 0, 0, '', '297', 999, 'pending'),
(17, 3, 2, 19, '0', 0, 888, 888, 0, 0, '', '', 64, 0, '2018-07-10 00:00:03', '2018-07-10 00:17:55', 'accepted', 1, 1, 0, 0, '', '298', 889, 'Payment Made'),
(18, 3, 2, 20, '0', 0, 777, 777, 0, 0, '', '', 65, 0, '2018-07-10 00:01:00', '2018-07-10 06:22:27', 'rejected', 1, 1, 0, 0, '', '299', 778, 'Payment Made'),
(19, 3, 8, 21, '0', 0, 555, 555, 0, 0, '', '', 68, 0, '2018-07-10 12:44:59', '2018-07-11 06:49:55', 'accepted', 1, 1, 0, 0, '', '302', 555, 'Payment Made'),
(20, 3, 2, 22, '0', 0, 22222, 22222, 0, 0, '', '', 70, 0, '2018-07-12 00:45:45', '2018-07-12 00:45:45', 'accepted', 1, 1, 0, 0, '', '304', 22223, 'pending'),
(21, 3, 8, 23, '0', 0, 222, 222, 0, 0, '', '', 69, 0, '2018-07-12 00:52:57', '2018-07-12 00:52:57', 'rejected', 1, 1, 0, 0, '', '303', 223, 'pending'),
(22, 3, 2, 24, '0', 0, 33, 33, 0, 0, '', '', 71, 0, '2018-07-12 09:30:03', '2018-07-12 09:30:03', 'accepted', 1, 1, 0, 0, '', '305', 150, 'pending'),
(23, 3, 2, 25, '0', 0, 33, 33, 0, 0, '', '', 72, 0, '2018-07-12 09:30:03', '2018-07-12 09:30:03', 'accepted', 1, 1, 0, 0, '', '306', 90, 'pending'),
(24, 5, 2, 27, '0', 0, 999, 999, 0, 0, '', '', 75, 0, '2018-07-14 00:53:53', '2018-07-14 00:53:53', 'accepted', 1, 1, 0, 0, '', '309', 1100, 'pending'),
(25, 5, 8, 28, '0', 0, 888, 888, 0, 0, '', '', 76, 0, '2018-07-14 00:54:03', '2018-07-14 00:54:03', 'rejected', 1, 1, 0, 0, '', '310', 889, 'pending'),
(26, 5, 9, 33, '0', 0, 666, 666, 0, 0, '', '', 82, 0, '2018-07-15 16:09:17', '2018-07-15 16:09:17', 'accepted', 1, 1, 0, 0, '', '316', 677, 'pending'),
(27, 5, 10, 38, '0', 0, 555, 555, 0, 0, '', '', 83, 0, '2018-07-15 16:09:26', '2018-07-15 16:09:26', 'rejected', 1, 1, 0, 0, '', '317', 599, 'pending'),
(28, 5, 8, 43, '0', 0, 444, 444, 0, 0, '', '', 84, 0, '2018-07-15 16:30:02', '2018-07-15 16:30:02', 'accepted', 1, 1, 0, 0, '', '318', 888, 'pending'),
(29, 3, 2, 30, '0', 0, 33, 33, 0, 0, '', '', 78, 0, '2018-07-15 17:30:02', '2018-07-15 17:30:02', 'accepted', 1, 1, 0, 0, '', '312', 99, 'pending'),
(30, 3, 2, 32, '0', 0, 5, 5, 0, 0, '', '', 80, 0, '2018-07-15 17:30:02', '2018-07-15 17:30:02', 'accepted', 1, 1, 0, 0, '', '314', 201, 'pending'),
(31, 3, 2, 47, '0', 0, 8, 8, 0, 0, '', '', 91, 0, '2018-07-18 01:44:08', '2018-07-18 01:44:08', 'accepted', 1, 1, 0, 0, '', '325', 1000, 'pending'),
(32, 3, 10, 49, '0', 0, 5, 5, 0, 0, '', '', 93, 0, '2018-07-18 01:44:13', '2018-07-18 01:44:13', 'accepted', 1, 1, 0, 0, '', '327', 1999, 'pending'),
(33, 3, 10, 48, '0', 0, 444, 444, 0, 0, '', '', 92, 0, '2018-07-18 01:45:02', '2018-07-18 01:45:02', 'accepted', 1, 1, 0, 0, '', '326', 889, 'pending'),
(34, 5, 10, 54, '0', 0, 111, 111, 0, 0, '', '', 100, 0, '2018-07-20 16:32:20', '2018-07-20 16:32:20', 'rejected', 1, 1, 0, 0, '', '334', 112, 'pending'),
(35, 3, 2, 50, '0', 0, 8, 8, 0, 0, '', '', 96, 0, '2018-07-20 22:30:02', '2018-07-20 22:30:02', 'accepted', 1, 1, 0, 0, '', '330', 99999, 'pending'),
(36, 3, 2, 51, '0', 0, 8, 8, 0, 0, '', '', 97, 0, '2018-07-20 22:30:02', '2018-07-20 22:30:02', 'accepted', 1, 1, 0, 0, '', '331', 999999, 'pending'),
(37, 3, 2, 55, '0', 0, 100000, 100000, 0, 0, '', '', 101, 0, '2018-07-26 05:33:24', '2018-07-26 05:33:24', 'accepted', 1, 1, 0, 0, '', '335', 120, 'pending'),
(38, 5, 2, 57, '0', 0, 2222, 2222, 0, 0, '', '', 103, 0, '2018-07-26 14:31:56', '2018-07-26 14:31:56', 'rejected', 1, 1, 0, 0, '', '337', 1100, 'pending'),
(39, 4, 2, 58, '0', 0, 111, 111, 0, 0, '', '', 104, 0, '2018-07-27 21:58:56', '2018-07-27 22:02:04', 'accepted', 1, 1, 0, 0, '', '338', 111, 'Completed'),
(40, 4, 2, 59, '0', 0, 111, 111, 0, 0, '', '', 105, 0, '2018-07-27 21:59:04', '2018-07-27 22:01:59', 'rejected', 1, 1, 0, 0, '', '339', 333, 'Payment Made'),
(41, 4, 2, 61, '0', 0, 110, 110, 0, 0, '', '', 110, 0, '2018-07-30 23:37:50', '2018-07-30 23:56:37', 'accepted', 1, 1, 0, 0, '', '344', 111, 'Payment Made'),
(42, 4, 2, 62, '0', 0, 111, 111, 0, 0, '', '', 111, 0, '2018-07-30 23:37:55', '2018-07-30 23:37:55', 'rejected', 1, 1, 0, 0, '', '345', 333, 'pending'),
(43, 4, 2, 64, '0', 0, 111, 111, 0, 0, '', '', 113, 0, '2018-08-03 04:50:30', '2018-08-06 03:36:06', 'accepted', 1, 1, 0, 0, '', '347', 111, 'Payment Made'),
(44, 4, 2, 65, '0', 0, 111, 111, 0, 0, '', '', 114, 0, '2018-08-03 04:50:42', '2018-08-03 04:50:42', 'rejected', 1, 1, 0, 0, '', '348', 222, 'pending'),
(45, 4, 2, 68, '0', 0, 109, 109, 0, 0, '', '', 116, 0, '2018-08-06 05:00:04', '2018-08-31 17:45:30', 'accepted', 1, 1, 0, 0, '', '350', 113, 'Payment Made'),
(46, 3, 2, 69, '0', 0, 123, 123, 0, 0, '', '', 117, 0, '2018-09-11 11:45:42', '2018-09-11 11:50:10', 'accepted', 1, 1, 0, 0, '', '351', 1234, 'Completed'),
(47, 3, 2, 70, '0', 0, 123, 123, 0, 0, '', '', 118, 0, '2018-09-18 03:21:14', '2019-06-09 16:38:19', 'accepted', 1, 1, 0, 0, '', '352', 1000, 'pending'),
(48, 4, 2, 73, '0', 0, 123, 123, 0, 0, '', '', 134, 0, '2019-08-07 02:33:21', '2019-08-07 02:33:21', 'accepted', 1, 1, 0, 0, '', '374', 523, 'pending'),
(49, 4, 2, 74, '0', 0, 12313, 12313, 0, 0, '', '', 135, 0, '2019-08-07 02:47:25', '2019-08-07 02:47:25', 'rejected', 1, 1, 0, 0, '', '375', 456, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_posts`
--

CREATE TABLE `supplier_posts` (
  `supplier_post_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'pending',
  `quantity` int(11) NOT NULL,
  `order_duration` varchar(40) NOT NULL,
  `rating` int(11) NOT NULL,
  `destribution_restrictions` int(11) NOT NULL,
  `images` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit_per_case` int(11) NOT NULL DEFAULT 0,
  `net_weight` float NOT NULL DEFAULT 0,
  `list_price` float NOT NULL DEFAULT 0,
  `per_case_price` float NOT NULL DEFAULT 0,
  `item` text NOT NULL,
  `category` varchar(400) NOT NULL,
  `supplier_type` varchar(40) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `search_keywords` text NOT NULL,
  `expiry` date NOT NULL,
  `expiry2` varchar(255) NOT NULL,
  `des_keywords` text NOT NULL,
  `pool` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `product_location` varchar(255) NOT NULL,
  `delivery_window` datetime NOT NULL,
  `is_allocation` int(11) NOT NULL DEFAULT 0,
  `delivery_service` varchar(255) NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `description2` text NOT NULL,
  `geo_boundary` varchar(255) NOT NULL,
  `file_name` text NOT NULL,
  `delivery_window_to` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_posts`
--

INSERT INTO `supplier_posts` (`supplier_post_id`, `price`, `status`, `quantity`, `order_duration`, `rating`, `destribution_restrictions`, `images`, `user_id`, `description`, `unit_per_case`, `net_weight`, `list_price`, `per_case_price`, `item`, `category`, `supplier_type`, `updated_at`, `created_at`, `product_id`, `search_keywords`, `expiry`, `expiry2`, `des_keywords`, `pool`, `sku`, `product_location`, `delivery_window`, `is_allocation`, `delivery_service`, `delivery_location`, `description2`, `geo_boundary`, `file_name`, `delivery_window_to`) VALUES
(1, 15, 'accepted', 120, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-02-01 05:54:55', '2018-02-01 05:46:27', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(2, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-02-01 05:55:02', '2018-02-01 05:55:02', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(3, 10, 'accepted', 140, '1', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1', '', '2018-02-01 11:48:55', '2018-02-01 11:47:35', 0, '', '2018-02-26', '', '', '1', '254', 'India', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(4, 10, 'Unfilled', 80, '1', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1', '', '2018-02-01 11:49:01', '2018-02-01 11:49:01', 0, '', '2018-02-26', '', '', '1', '254', 'India', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(5, 15, 'accepted', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-02-01 23:25:33', '2018-02-01 23:22:57', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(6, 15, 'Unfilled', 15, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-02-01 23:25:41', '2018-02-01 23:25:41', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(7, 10, 'Unfilled', 80, '1', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1', '', '2018-02-02 05:33:56', '2018-02-02 05:33:56', 0, '', '2018-02-26', '', '', '1', '254', 'India', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(8, 15, 'accepted', 15, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-02-02 13:51:46', '2018-02-02 13:43:59', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(9, 15, 'Unfilled', 3, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-02-02 13:51:56', '2018-02-02 13:51:56', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(10, 10, 'Unfilled', 80, '1', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1', '', '2018-02-03 03:15:31', '2018-02-03 03:15:31', 0, '', '2018-02-26', '', '', '1', '254', 'India', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(11, 10, 'Unfilled', 80, '1', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1', '', '2018-02-03 20:45:18', '2018-02-03 20:45:18', 0, '', '2018-02-26', '', '', '1', '254', 'India', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(12, 10, 'Unfilled', 80, '1', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1a', '', '2018-02-03 21:37:44', '2018-02-03 21:37:44', 0, '', '2018-02-20', '', '', '8', '255', 'india', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(13, 10, 'accepted', 80, '1', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1', '', '2018-02-07 01:47:52', '2018-02-07 01:46:46', 0, '', '2018-02-26', '', '', '1', '254', 'India', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(14, 10, 'rejected', 25, '1', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1', '', '2018-02-07 01:49:26', '2018-02-07 01:48:01', 0, '', '2018-02-26', '', '', '1', '254', 'India', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(15, 10, 'Unfilled', 1, '6', 0, 0, 0, 3, 'test 1', 90, 108, 200, 50, '', 'test 1', '', '2018-03-09 08:17:41', '2018-03-09 08:17:41', 0, '', '2018-03-09', '', '', '21', '256', 'india', '2018-03-09 01:47:00', 0, '', '', '', '', '', '2018-03-10 01:47:00'),
(16, 10, 'Unfilled', 1, '1', 0, 0, 0, 3, 'test 1', 90, 108, 200, 50, '', 'test 1', '', '2018-03-09 08:19:42', '2018-03-09 08:19:42', 0, '', '2018-03-09', '', '', '21', '257', 'india', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(17, 111, 'Unfilled', 11, '6', 0, 0, 0, 3, '11', 11, 11, 11, 1, '', '111', '', '2018-03-15 10:38:06', '2018-03-15 10:38:06', 0, '', '2018-03-15', '', '', '18,1', '258', '11', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(18, 1, 'Unfilled', 1, '6', 0, 0, 0, 3, '1', 1, 1, 1, 1, '', '1', '', '2018-03-18 06:26:45', '2018-03-18 06:26:45', 0, '', '2018-03-18', '', '', '2', '259', '1', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(19, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-03-18 18:28:53', '2018-03-18 18:28:53', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(20, 15, 'accepted', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-03-19 03:23:59', '2018-03-19 03:21:56', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(21, 6, 'Unfilled', 5000, '1', 0, 0, 0, 3, '', 56, 5000, 56444, 66, '', '', '', '2018-03-20 02:49:51', '2018-03-20 02:49:51', 0, '', '2018-03-20', '', '', '1,13', '260', 'scarb', '0000-00-00 00:00:00', 0, '', '', '', '', '', '2018-03-21 10:48:00'),
(22, 10.0275, 'Unfilled', 12, '1', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1203.3, 902.475, '', 'Coffee Pods', '', '2018-03-20 23:43:18', '2018-03-20 23:43:18', 0, '', '2017-12-16', '', '', '8', '261', '4982-MATHESON BUFFER', '2018-03-20 11:40:00', 0, '', '', '', '', '', '2018-03-20 11:40:00'),
(23, 3.9225, 'Unfilled', 1169, '6', 0, 0, 0, 3, 'KR SGL BOLD SL JALAPENO(12)336G 24', 24, 18.122, 125.52, 94.14, '', 'Sandwich Cheese', '', '2018-03-20 23:43:18', '2018-03-20 23:43:18', 0, '', '2018-01-18', '', '', '8', '262', '5180-VAUDREUIL MC', '2018-03-20 11:40:00', 0, '', '', '', '', '', '2018-03-20 11:40:00'),
(24, 3.9225, 'Unfilled', 826, '6', 0, 0, 0, 3, 'KR SGL BOLD SRIRACHA (12) 336G 24', 24, 18.122, 125.52, 94.14, '', 'Sandwich Cheese', '', '2018-03-20 23:43:18', '2018-03-20 23:43:18', 0, '', '2018-01-13', '', '', '8', '263', '5180-VAUDREUIL MC', '2018-03-20 11:40:00', 0, '', '', '', '', '', '2018-03-20 11:40:00'),
(25, 1, 'Unfilled', 1, '1', 0, 0, 0, 3, 'test', 11, 1, 1, 1, '', '', '', '2018-03-20 23:43:18', '2018-03-20 23:43:18', 0, '', '2018-03-26', '', '', '1', '264', '1', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(26, 10.0275, 'Unfilled', 12, '1', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1203.3, 902.475, '', 'Coffee Pods', '', '2018-03-23 14:59:46', '2018-03-23 14:59:46', 0, '', '2017-12-16', '', '', '8', '265', '4982-MATHESON BUFFER', '2018-03-23 02:57:00', 0, '', '', '', '', '', '2018-03-23 02:57:00'),
(27, 1.20062, 'Unfilled', 74, '6', 0, 0, 0, 3, 'HNZ LIGHT RED KIDNEY BNS 398ML 24', 24, 27.514, 38.42, 28.815, '', 'Convenience Meals', '', '2018-03-23 14:59:47', '2018-03-23 14:59:47', 0, '', '2017-12-04', '', '', '8', '266', '4042-HIGHBURY LEAMINGTON BW', '2018-03-23 02:57:00', 0, '', '', '', '', '', '2018-03-23 02:57:00'),
(28, 10.0275, 'Unfilled', 12, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1203.3, 902.475, '', 'Coffee Pods', '', '2018-03-31 03:53:23', '2018-03-31 03:53:23', 0, '', '2017-12-16', '', '', '8', '267', '4982-MATHESON BUFFER', '2018-03-31 03:49:00', 0, '', '', '', '', '', '2018-03-31 03:49:00'),
(29, 5, 'accepted', 50, '36', 0, 0, 0, 3, '', 0, 0, 500, 100, '', '', '', '2018-03-31 03:56:48', '2018-03-31 03:53:23', 0, '', '2018-03-31', '', '', '2,13,14', '268', '', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(30, 5, 'Unfilled', 10, '36', 0, 0, 0, 3, '', 0, 0, 500, 100, '', '', '', '2018-03-31 03:57:14', '2018-03-31 03:57:14', 0, '', '2018-03-31', '', '', '2,13,14', '268', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(31, 5, 'accepted', 100, '6', 0, 0, 0, 3, 'greeat chic 2x600', 0, 0, 1, 1, '', 'poultry', '', '2018-05-04 05:20:30', '2018-05-04 05:18:01', 0, '', '2018-05-08', '', '', '2,14,15', '269', '', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(32, 1, 'Unfilled', 1, '6', 0, 0, 0, 3, '600x1', 1, 1, 60, 100, '', '1', '', '2018-05-06 03:29:29', '2018-05-06 03:29:29', 0, '', '2018-05-24', '', '', '3', '270', 'home', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(33, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-05-11 15:14:35', '2018-05-11 15:14:35', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(34, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-06-18 11:40:28', '2018-06-18 11:40:28', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(35, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-06-18 11:40:28', '2018-06-18 11:40:28', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(36, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.402, 1500, 900, '', 'Coffee Pods', '', '2018-06-18 11:40:28', '2018-06-18 11:40:28', 0, '', '2018-02-17', '', '', '8', '253', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(37, 0, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 0, 0, '', 'Coffee Pods', '', '2018-06-20 12:15:23', '2018-06-20 12:15:23', 0, '', '2018-02-17', '', '', '18,2', '271', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(38, 0, 'accepted', 15, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 0, 1, '', 'Coffee Pods', '', '2018-06-20 12:33:26', '2018-06-20 12:28:39', 0, '', '2018-02-17', '', '', '7', '272', 'china', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(39, 0, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 0, 0, '', 'Coffee Pods', '', '2018-06-21 03:53:23', '2018-06-21 03:53:23', 0, '', '2018-02-17', '', '', '7', '273', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(40, 0, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 0, 0, '', 'Coffee Pods111', '', '2018-06-21 04:23:19', '2018-06-21 04:23:19', 0, '', '2018-02-17', '', '', '21', '274', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(41, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', 'Coffee Pods', '', '2018-06-21 04:24:16', '2018-06-21 04:24:16', 0, '', '2018-02-17', '', '', '21', '275', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(42, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', 'Coffee Pods', '', '2018-06-21 04:25:04', '2018-06-21 04:25:04', 0, '', '2018-02-17', '', '', '2', '276', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(43, 15, 'Unfilled', 13, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', 'Coffee Pods', '', '2018-06-21 04:26:07', '2018-06-21 04:26:07', 0, '', '2018-02-17', '', '', '21', '277', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(44, 15, 'Unfilled', 2, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', '111Coffee Pods', '', '2018-06-21 11:24:40', '2018-06-21 11:24:40', 0, '', '2018-02-17', '', '', '21', '278', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(45, 15, 'Unfilled', 3, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', '333Coffee Pods', '', '2018-06-21 11:27:09', '2018-06-21 11:27:09', 0, '', '2018-02-17', '', '', '21', '279', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(46, 15, 'Unfilled', 4, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', '44Coffee Pods', '', '2018-06-21 11:30:44', '2018-06-21 11:30:44', 0, '', '2018-02-17', '', '', '21', '280', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(47, 10, 'accepted', 10, '1', 0, 0, 0, 3, 'TEST TEST TEST10', 10, 10, 10, 10, '', 'TEST10', '', '2018-06-21 12:57:54', '2018-06-21 12:55:37', 0, '', '2018-06-22', '', '', '7', '281', 'home', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(48, 10, 'Unfilled', 2, '6', 0, 0, 0, 3, 'TEST TEST TEST10', 10, 10, 10, 10, '', 'TEST10', '', '2018-06-21 13:05:01', '2018-06-21 13:05:01', 0, '', '2018-06-22', '', '', '7', '282', 'home', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(49, 15, 'Unfilled', 4, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', '4Coffee Pods', '', '2018-06-22 05:53:23', '2018-06-22 05:53:23', 0, '', '2018-02-17', '', '', '2,3', '283', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(50, 15, 'Unfilled', 6, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', '6Coffee Pods', '', '2018-06-22 05:53:23', '2018-06-22 05:53:23', 0, '', '2018-02-17', '', '', '21,2', '284', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(51, 10, 'Unfilled', 80, '6', 0, 0, 0, 3, 'Test1', 90, 108, 1500, 500, '', 'Test1', '', '2018-06-22 05:58:32', '2018-06-22 05:58:32', 0, '', '2018-02-26', '', '', '3', '285', 'India', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(52, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', 'Coffee Pods', '', '2018-06-22 09:47:49', '2018-06-22 09:47:49', 0, '', '2018-02-17', '', '', '21', '286', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(53, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', 'Coffee Pods', '', '2018-06-22 09:47:49', '2018-06-22 09:47:49', 0, '', '2018-02-17', '', '', '1', '287', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(54, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', 'Coffee Pods', '', '2018-06-22 09:51:11', '2018-06-22 09:51:11', 0, '', '2018-02-17', '', '', '12', '288', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(55, 15, 'Unfilled', 70, '6', 0, 0, 0, 3, 'NABOB PODS HLF MOD 292G 30Pods 90cases', 90, 108.4, 1500, 900, '', 'Coffee Pods', '', '2018-06-22 09:51:11', '2018-06-22 09:51:11', 0, '', '2018-02-17', '', '', '12', '289', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(56, 10, 'accepted', 2, '6', 0, 0, 0, 3, 'TEST TEST TEST10', 10, 10, 10, 10, '', 'TEST10', '', '2018-06-22 13:20:51', '2018-06-22 13:18:11', 0, '', '2018-06-22', '', '', '1', '290', 'home', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(57, 2, 'Unfilled', 8, '6', 0, 0, 0, 3, 'jjkjk', 88, 32, 8, 99, '', 'Coffee Pods', '', '2018-06-28 14:17:45', '2018-06-28 14:17:45', 0, '', '2018-06-09', '', '', '7', '291', 'here', '2018-06-15 03:00:00', 0, '', '', '', '', '', '2018-06-29 03:00:00'),
(58, 11, 'accepted', 111111, '6', 0, 0, 0, 3, '1111111111111111', 1111, 1111, 111, 111, '', '111', '', '2018-06-29 00:11:55', '2018-06-29 00:07:06', 0, '', '2018-06-29', '', '', '7', '292', '11111', '2018-08-04 08:05:00', 1, '', '', '', '', '', '2018-11-03 08:06:00'),
(59, 2, 'Unfilled', 22222, '6', 0, 0, 0, 3, '22222', 222222, 2222, 2222, 22, '', '222', '', '2018-06-29 00:14:21', '2018-06-29 00:14:21', 0, '', '2018-06-30', '', '', '18', '293', '2222', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(60, 33, 'rejected', 333, '6', 0, 0, 0, 3, '333', 3333, 333, 333, 333, '', '333', '', '2018-06-29 00:31:07', '2018-06-29 00:27:55', 0, '', '2018-06-29', '', '', '5', '294', '3333', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(61, 44, 'Unfilled', 4444, '6', 0, 0, 0, 3, '44444', 444444, 4444440, 4444440, 4, '', '44444', '', '2018-06-29 14:58:16', '2018-06-29 14:58:16', 0, '', '2018-06-30', '', '', '7', '295', 'home', '2018-06-09 10:54:00', 0, '', '', '', '', '', '2018-06-23 12:00:00'),
(62, 9, 'accepted', 99999, '1', 0, 0, 0, 3, '9999', 9999, 999, 999999, 99, '', '9999', '', '2018-07-09 04:30:03', '2018-07-06 13:58:08', 0, '', '2018-07-07', '', '', '5', '296', '9999', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(63, 999, 'accepted', 999, '1', 0, 0, 0, 3, '99999', 999, 9999, 9999, 999, '', '9999', '', '2018-07-09 04:30:03', '2018-07-06 15:19:56', 0, '', '2018-07-07', '', '', '7', '297', '9999', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(64, 888, 'accepted', 888, '1', 0, 0, 0, 3, '888', 888, 888, 888, 888, '', '888', '', '2018-07-10 00:00:03', '2018-07-09 22:57:07', 0, '', '2018-07-06', '', '', '7', '298', '888', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(65, 777, 'rejected', 777, '1', 0, 0, 0, 3, '777', 777, 777, 777, 777, '', '777', '', '2018-07-10 00:01:00', '2018-07-09 23:05:57', 0, '', '2018-07-07', '', '', '7', '299', '777', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(66, 666, 'Unfilled', 666, '1', 0, 0, 0, 3, '666', 666, 666, 666, 666, '', '666', '', '2018-07-09 23:26:02', '2018-07-09 23:26:02', 0, '', '2018-07-06', '', '', '7', '300', '666', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(67, 777, 'Unfilled', 777, '12', 0, 0, 0, 3, '777', 777, 777, 777, 777, '', '777', '', '2018-07-10 00:56:03', '2018-07-10 00:56:03', 0, '', '2018-07-07', '', '', '7', '301', '777', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(68, 555, 'accepted', 555, '1', 0, 0, 0, 3, '555', 555, 555, 555, 555, '', '555', '', '2018-07-10 12:44:59', '2018-07-10 12:38:10', 0, '', '2018-07-19', '', '', '7', '302', '555', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(69, 222, 'rejected', 222, '1', 0, 0, 0, 3, '222', 222, 222, 222, 222, '', '222', '', '2018-07-12 00:52:57', '2018-07-12 00:21:32', 0, '', '2018-07-21', '', '', '7', '303', '222', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(70, 22222, 'accepted', 22222, '1', 0, 0, 0, 3, '22222', 22222, 22222, 22222, 22, '', '22222', '', '2018-07-12 00:45:45', '2018-07-12 00:27:10', 0, '', '2018-07-02', '', '', '7', '304', '22222', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(71, 5, 'accepted', 33, '6', 0, 0, 0, 3, '', 0, 0, 100, 200, '', '', '', '2018-07-12 09:30:03', '2018-07-12 03:11:12', 0, '', '1970-01-01', '', '', '7', '305', '', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(72, 5, 'accepted', 33, '6', 0, 0, 0, 3, '', 0, 0, 100, 200, '', 'BRIJ12', '', '2018-07-12 09:30:03', '2018-07-12 03:13:25', 0, '', '1970-01-01', '', '', '7', '306', '', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(73, 5, 'Unfilled', 33, '6', 0, 0, 0, 3, 'TEST', 0, 12, 100, 200, '', 'BRIJ12', '', '2018-07-12 03:18:33', '2018-07-12 03:18:33', 0, '', '1970-01-01', '', '', '7', '307', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(74, 5, 'Unfilled', 12, '6', 0, 0, 0, 3, '1212', 0, 0, 100, 200, '', 'NEWOM', '', '2018-07-13 08:41:57', '2018-07-13 08:41:57', 0, '', '1970-01-01', '', '', '7', '308', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(75, 999, 'accepted', 999, '1', 0, 0, 0, 5, '999', 999, 999, 999, 999, '', '999', '', '2018-07-14 00:53:53', '2018-07-14 00:21:27', 0, '', '2018-07-06', '', '', '7', '309', '999', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(76, 888, 'rejected', 888, '1', 0, 0, 0, 5, '888', 888, 888, 888, 888, '', '888', '', '2018-07-14 00:54:03', '2018-07-14 00:23:08', 0, '', '2018-07-27', '', '', '7', '310', '888', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(77, 777, 'Unfilled', 777, '1', 0, 0, 0, 5, '777', 777, 777, 777, 77, '', '777', '', '2018-07-14 00:37:10', '2018-07-14 00:37:10', 0, '', '2018-07-07', '', '', '7', '311', '777', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(78, 5, 'accepted', 33, '6', 0, 0, 0, 3, 'TEST', 0, 12, 100, 200, '', 'BRIJ12344', '', '2018-07-15 17:30:02', '2018-07-15 11:11:01', 0, '', '2018-07-16', '', '', '7', '312', '', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(79, 5, 'Unfilled', 33, '6', 0, 0, 0, 3, 'asd', 0, 0, 100, 200, '', 'NEW', '', '2018-07-15 11:13:44', '2018-07-15 11:13:44', 0, '', '2018-07-17', '', '', '7', '313', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(80, 5, 'accepted', 5, '6', 0, 0, 0, 3, 'fsdf', 0, 12, 100, 200, '', 'BRIJ12df', '', '2018-07-15 17:30:02', '2018-07-15 11:20:58', 0, '', '2018-07-02', '', '', '7', '314', 'dfdf', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(81, 777, 'Unfilled', 777, '1', 0, 0, 0, 5, '777', 777, 777, 777, 60, '', '777', '', '2018-07-15 15:19:55', '2018-07-15 15:19:55', 0, '', '2018-07-07', '', '', '7', '315', '777', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(82, 666, 'accepted', 666, '1', 0, 0, 0, 5, '666', 666, 666, 666, 666, '', '666', '', '2018-07-15 16:09:17', '2018-07-15 15:21:16', 0, '', '2018-07-10', '', '', '7', '316', '666', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(83, 555, 'rejected', 555, '1', 0, 0, 0, 5, '555', 555, 555, 555, 555, '', '555', '', '2018-07-15 16:09:26', '2018-07-15 15:22:29', 0, '', '2018-07-24', '', '', '7', '317', '555', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(84, 444, 'accepted', 444, '1', 0, 0, 0, 5, '444', 444, 444, 444, 444, '', '444', '', '2018-07-15 16:30:02', '2018-07-15 15:23:43', 0, '', '2018-07-26', '', '', '7', '318', '444', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(85, 333, 'Unfilled', 333, '1', 0, 0, 0, 5, '333', 333, 333, 333, 300, '', '333', '', '2018-07-15 15:29:08', '2018-07-15 15:29:08', 0, '', '2018-07-11', '', '', '7', '319', '333', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(86, 111, 'Unfilled', 111, '1', 0, 0, 0, 5, '111', 111, 111, 111, 100, '', '111', '', '2018-07-15 16:12:14', '2018-07-15 16:12:14', 0, '', '2018-07-26', '', '', '7', '320', '111', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(87, 33, 'Unfilled', 333, '1', 0, 0, 0, 3, '333', 3, 333, 333, 333, '', '333', '', '2018-07-17 03:24:11', '2018-07-17 03:24:11', 0, '', '2018-06-29', '', '', '7', '321', '3333', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(88, 999, 'Unfilled', 4, '1', 0, 0, 0, 5, '999', 999, 999, 999, 999, '', '999', '', '2018-07-17 03:28:04', '2018-07-17 03:28:04', 0, '', '2018-07-06', '', '', '7', '322', '999', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(89, 222, 'Unfilled', 222, '1', 0, 0, 0, 5, '222', 222, 222, 222, 111, '', '222', '', '2018-07-17 03:34:21', '2018-07-17 03:34:21', 0, '', '2018-07-18', '', '', '7', '323', '222', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(90, 15, 'Unfilled', 1, '1', 0, 0, 0, 3, 'NE222', 2, 2, 100, 200, '', 'NE222', '', '2018-07-17 05:18:15', '2018-07-17 05:18:15', 0, '', '2018-07-17', '', '', '7', '324', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(91, 999, 'accepted', 8, '6', 0, 0, 0, 3, '99999', 999, 9, 9999, 999, '', '9999', '', '2018-07-18 01:44:08', '2018-07-18 01:13:13', 0, '', '2018-07-07', '', '', '7', '325', '9999', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(92, 888, 'accepted', 444, '1', 0, 0, 0, 3, '888', 888, 888, 888, 888, '', '888', '', '2018-07-18 01:45:02', '2018-07-18 01:34:17', 0, '', '2018-07-06', '', '', '7', '326', '888', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(93, 999, 'accepted', 5, '1', 0, 0, 0, 3, '99999', 999, 9, 9999, 999, '', '9999', '', '2018-07-18 01:44:13', '2018-07-18 01:39:51', 0, '', '2018-07-07', '', '', '7', '327', '9999', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(94, 5, 'Unfilled', 70, '6', 0, 0, 0, 3, 'cat1', 1, 1, 100, 200, '', 'cat11', '', '2018-07-20 03:55:46', '2018-07-20 03:55:46', 0, '', '2018-07-21', '', '', '7', '328', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(95, 15, 'Unfilled', 12, '6', 0, 0, 0, 3, 'DEWXR', 12, 12, 1500, 900, '', 'Nav1', '', '2018-07-20 04:12:38', '2018-07-20 04:12:38', 0, '', '2018-07-27', '', '', '7', '329', '12', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(96, 999, 'accepted', 8, '6', 0, 0, 0, 3, '99999', 999, 9, 9999, 999, '', '9999', '', '2018-07-20 22:30:02', '2018-07-20 16:03:33', 0, '', '2018-07-07', '', '', '7', '330', '9999', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(97, 999, 'accepted', 8, '6', 0, 0, 0, 3, '99999', 999, 9, 9999, 999, '', '9999', '', '2018-07-20 22:30:02', '2018-07-20 16:03:33', 0, '', '2018-07-07', '', '', '7', '331', '9999', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(98, 111, 'Unfilled', 111, '1', 0, 0, 0, 5, '111', 111, 111, 111, 100, '', '111', '', '2018-07-20 16:13:26', '2018-07-20 16:13:26', 0, '', '2018-07-26', '', '', '7', '332', '111', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(99, 111, 'Unfilled', 111, '1', 0, 0, 0, 5, '111', 111, 111, 111, 100, '', '111', '', '2018-07-20 16:13:26', '2018-07-20 16:13:26', 0, '', '2018-07-26', '', '', '7', '333', '111', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(100, 111, 'rejected', 111, '1', 0, 0, 0, 5, '111', 111, 111, 111, 100, '', '111', '', '2018-07-20 16:32:20', '2018-07-20 16:13:26', 0, '', '2018-07-26', '', '', '7', '334', '111', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(101, 11, 'accepted', 100000, '6', 0, 0, 0, 3, '1111111111111111', 1, 1, 150, 111, '', '111', '', '2018-07-26 05:33:24', '2018-07-26 05:31:06', 0, '', '2018-06-29', '', '', '7', '335', '11111', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(102, 12345, 'Unfilled', 12345, '1', 0, 0, 0, 3, '12345', 12345, 12345, 10, 20, '', '12345', '', '2018-07-26 05:38:13', '2018-07-26 05:38:13', 0, '', '2018-07-28', '', '', '7', '336', '12345', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(103, 222, 'rejected', 2222, '1', 0, 0, 0, 5, '222', 222, 222, 222, 1, '', '222', '', '2018-07-26 14:31:56', '2018-07-26 14:28:17', 0, '', '2018-07-18', '', '', '7', '337', '222', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(104, 111, 'accepted', 111, '1', 0, 0, 0, 4, '111', 111, 111, 111, 111, '', '111', '', '2018-07-27 21:58:56', '2018-07-27 21:40:44', 0, '', '2018-07-31', '', '', '7', '338', '111', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(105, 111, 'rejected', 111, '1', 0, 0, 0, 4, '111', 111, 111, 111, 222, '', '111', '', '2018-07-27 21:59:04', '2018-07-27 21:40:45', 0, '', '2018-07-27', '', '', '7', '339', '111', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(106, 111, 'Unfilled', 111, '1', 0, 0, 0, 4, '111', 111, 111, 111, 99, '', '111', '', '2018-07-27 21:40:45', '2018-07-27 21:40:45', 0, '', '2018-07-31', '', '', '7', '340', '111', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(107, 12, 'Unfilled', 123, '1', 0, 0, 0, 3, 'SUPLIER1', 0, 0, 12, 12, '', 'SUPLIER1', '', '2018-07-30 11:18:34', '2018-07-30 11:18:34', 0, '', '2018-08-04', '', '', '7', '341', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(108, 15, 'Unfilled', 12, '6', 0, 0, 0, 3, 'SUPLIER1123', 90, 108.4, 100, 12, '', 'SUPLIER1123', '', '2018-07-30 11:36:54', '2018-07-30 11:36:54', 0, '', '2018-07-31', '', '', '7', '342', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(109, 5, 'Unfilled', 33, '6', 0, 0, 0, 4, 'suppeler3', 1, 1, 100, 99, '', 'suppeler3', '', '2018-07-30 11:47:51', '2018-07-30 11:47:51', 0, '', '2018-07-31', '', '', '7', '343', 'china', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(110, 111, 'accepted', 110, '1', 0, 0, 0, 4, '111', 111, 111, 111, 111, '', '222', '', '2018-07-30 23:37:50', '2018-07-30 23:18:52', 0, '', '2018-07-31', '', '', '7', '344', '111', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(111, 111, 'rejected', 111, '1', 0, 0, 0, 4, '111', 111, 111, 111, 222, '', '222', '', '2018-07-30 23:37:55', '2018-07-30 23:18:52', 0, '', '2018-07-27', '', '', '7', '345', '111', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(112, 111, 'Unfilled', 111, '1', 0, 0, 0, 4, '111', 111, 111, 111, 99, '', '222', '', '2018-07-30 23:18:52', '2018-07-30 23:18:52', 0, '', '2018-07-31', '', '', '7', '346', '111', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(113, 111, 'accepted', 111, '1', 0, 0, 0, 4, '111', 111, 111, 111, 111, '', '222', '', '2018-08-03 04:50:30', '2018-08-03 04:42:40', 0, '', '2018-07-31', '', '', '7', '347', '111', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(114, 111, 'rejected', 111, '1', 0, 0, 0, 4, '111', 111, 111, 111, 222, '', '222', '', '2018-08-03 04:50:42', '2018-08-03 04:42:41', 0, '', '2018-07-31', '', '', '7', '348', '222', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(115, 111, 'Unfilled', 111, '1', 0, 0, 0, 4, '111', 111, 111, 111, 99, '', '222', '', '2018-08-03 04:42:41', '2018-08-03 04:42:41', 0, '', '2018-07-31', '', '', '7', '349', '111', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(116, 111, 'accepted', 109, '1', 0, 0, 0, 4, '111', 111, 111, 111, 111, '', '222', '', '2018-08-06 05:00:04', '2018-08-06 03:31:50', 0, '', '2018-07-31', '', '', '7,13,16', '350', '111', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(117, 12, 'accepted', 123, '1', 0, 0, 0, 3, '123', 123, 123, 123, 122, '', '123', '', '2018-09-11 11:45:42', '2018-09-11 11:38:56', 0, '', '2018-09-19', '', '', '1', '351', '123', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(118, 12, 'accepted', 123, '1', 0, 0, 0, 3, '123', 123, 123, 123, 123, '', '123', '', '2018-09-18 03:21:14', '2018-09-18 03:16:47', 0, '', '2018-09-19', '', '', '3', '352', '123', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(119, 0.5, 'pending', 2, '1', 0, 0, 0, 5, 'lindt', 123, 100, 3, 1, '', '', '', '2019-08-06 04:00:03', '2019-08-06 04:00:03', 0, '', '2019-08-21', '', '', '7,12', '361', 'toro', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(120, 2, 'pending', 1, '1', 0, 0, 0, 5, '', 0, 0, 3, 1, '', 'Matt', '', '2019-08-06 04:01:55', '2019-08-06 04:01:55', 0, '', '1970-01-01', '', '', '7,12', '354', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(121, 213, 'pending', 1200, '6', 0, 0, 0, 5, 'w', 1233, 213, 300, 2, '', '2', '', '2019-08-06 04:05:26', '2019-08-06 04:05:26', 0, '', '2019-08-07', '', '', '4,12', '362', 'ef', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(122, 234, 'pending', 423, '6', 0, 0, 0, 4, 'sdf', 234, 2323, 324, 234, '', 'dfa', '', '2019-08-06 04:19:43', '2019-08-06 04:19:43', 0, '', '2019-08-06', '', '', '2,15', '363', 'af', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(123, 234, 'pending', 423, '6', 0, 0, 0, 4, 'sdf', 234, 2323, 324, 234, '', 'dfa', '', '2019-08-06 04:22:09', '2019-08-06 04:22:09', 0, '', '2019-08-06', '', '', '2,15', '364', 'af', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(124, 111, 'pending', 111, '6', 0, 0, 0, 4, 'SDFS', 111, 234, 111, 111, '', '112', '', '2019-08-06 04:22:56', '2019-08-06 04:22:56', 0, '', '2019-08-15', '', '', '2', '365', '2222', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(125, 7567, 'pending', 312, '6', 0, 0, 0, 4, 'dfs', 1233, 123, 3123, 1, '', 'sf', '', '2019-08-06 04:27:35', '2019-08-06 04:27:35', 0, '', '2019-08-06', '', '', '1', '360', '123', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(126, 7567, 'pending', 312, '6', 0, 0, 0, 4, 'dfs', 1233, 123, 3123, 1, '', 'sf', '', '2019-08-06 04:28:58', '2019-08-06 04:28:58', 0, '', '2019-08-06', '', '', '1', '366', '123', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(127, 234, 'pending', 2342, '6', 0, 0, 0, 4, '3212', 3242, 234, 234, 453, '', 'sdf', '', '2019-08-06 04:32:53', '2019-08-06 04:32:53', 0, '', '2019-08-07', '', '', '1', '367', '234', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(128, 234, 'pending', 2342, '6', 0, 0, 0, 4, '3212', 3242, 234, 234, 453, '', 'sdf', '', '2019-08-06 04:38:34', '2019-08-06 04:38:34', 0, '', '2019-08-07', '', '', '1', '368', '234', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(129, 234, 'pending', 2342, '6', 0, 0, 0, 4, '3212', 3242, 234, 234, 453, '', 'sdf', '', '2019-08-06 04:39:52', '2019-08-06 04:39:52', 0, '', '2019-08-07', '', '', '1', '369', '234', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(130, 322, 'pending', 222, '1', 0, 0, 0, 4, '211', 11, 322, 333, 211, '', 'ASF', '', '2019-08-06 04:45:45', '2019-08-06 04:45:45', 0, '', '2019-08-08', '', '', '2,14', '370', '222', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(131, 2, 'pending', 2, '1', 0, 0, 0, 4, '1', 1, 1, 3, 1, '', 'Matt', '', '2019-08-06 04:49:24', '2019-08-06 04:49:24', 0, '', '2019-08-15', '', '', '7,12', '371', 'a', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(132, 1, 'pending', 1, '36', 0, 0, 0, 4, '11', 1, 1, 3, 1, '', 'matt2', '', '2019-08-06 12:38:35', '2019-08-06 12:38:35', 0, '', '2019-08-16', '', '', '7,12', '372', 'tor', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(133, 22222, 'pending', 2222, '6', 0, 0, 0, 4, '111', 1111, 11111, 2222, 2, '', '111', '', '2019-08-07 02:06:26', '2019-08-07 02:06:26', 0, '', '2019-08-07', '', '', '2,12', '373', '11111', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(134, 123, 'accepted', 123, '6', 0, 0, 0, 4, 'SDFS1312', 213, 123, 123, 123, '', 'ASF', '', '2019-08-07 02:33:21', '2019-08-07 02:31:48', 0, '', '2019-08-07', '', '', '2', '374', '123', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(135, 123, 'rejected', 12313, '6', 0, 0, 0, 4, 'sad', 213123, 1231, 123, 12, '', 'assd', '', '2019-08-07 02:47:25', '2019-08-07 02:42:29', 0, '', '2019-08-07', '', '', '2,17', '375', '123', '0000-00-00 00:00:00', 1, '', '', '', '', '', '0000-00-00 00:00:00'),
(136, 123, 'pending', 12323, '6', 0, 0, 0, 4, '1312', 131, 1231, 123, 12, '', '213', '', '2019-08-07 04:04:50', '2019-08-07 04:04:50', 0, '', '2019-08-07', '', '', '2', '376', '32123', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(137, 24, 'pending', 434, '1', 0, 0, 0, 4, '343', 4, 3, 342, 234, '', '23', '', '2019-08-12 11:40:29', '2019-08-12 11:40:29', 0, '', '2019-08-12', '', '', '23', '377', '434', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(138, 2, 'pending', 222, '6', 0, 0, 0, 4, '2', 22, 234, 2, 2, '', '2', '', '2019-08-12 11:40:56', '2019-08-12 11:40:56', 0, '', '2019-08-12', '', '', '18', '355', '2', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(139, 123, 'pending', 123, '6', 0, 0, 0, 4, '1231', 232, 2313, 123, 123, '', '31WER', '', '2019-08-12 12:52:19', '2019-08-12 12:52:19', 0, '', '2019-08-12', '', '', '1', '378', '231', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(140, 1, 'pending', 1, '6', 0, 0, 0, 4, '1', 1, 1, 1, 1, '', 'Matt11', '', '2019-08-12 12:55:55', '2019-08-12 12:55:55', 0, '', '2019-08-29', '', '', '3,5,12', '379', '1', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(141, 2, 'pending', 23, '6', 0, 0, 0, 4, '232', 2, 222, 2, 2, '', '2', '', '2019-08-12 18:43:43', '2019-08-12 18:43:43', 0, '', '2019-08-13', '', '', '3', '380', '22', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(142, 234, 'pending', 234, '6', 0, 0, 0, 4, '234', 234, 234, 243, 234, '', '123', '', '2019-08-12 19:23:42', '2019-08-12 19:23:42', 0, '', '2019-08-13', '', '', '12', '381', '24', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(143, 13, 'pending', 13, '6', 0, 0, 0, 4, '13', 123, 123, 13, 123, '', '231', '', '2019-08-12 19:29:12', '2019-08-12 19:29:12', 0, '', '2019-08-13', '', '', '12', '382', '123', '0000-00-00 00:00:00', 0, '', '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_posts_temp`
--

CREATE TABLE `supplier_posts_temp` (
  `supplier_post_id` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 0,
  `price` float NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'pending',
  `quantity` int(11) NOT NULL,
  `order_duration` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit_per_case` int(11) NOT NULL DEFAULT 0,
  `net_weight` float NOT NULL DEFAULT 0,
  `list_price` float NOT NULL DEFAULT 0,
  `per_case_price` float NOT NULL DEFAULT 0,
  `item` text NOT NULL,
  `category` varchar(400) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `expiry` date NOT NULL,
  `pool` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `product_location` varchar(255) NOT NULL,
  `delivery_window` datetime NOT NULL,
  `is_allocation` int(11) NOT NULL DEFAULT 0,
  `file_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_warehouse`
--

CREATE TABLE `temp_warehouse` (
  `id` int(11) NOT NULL,
  `keyid` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `geo_boundary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `delivery_window` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_service` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `text_notification` varchar(2) NOT NULL DEFAULT '0',
  `email_notification` varchar(2) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 1,
  `delivery_service` varchar(255) NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `delivery_window` datetime NOT NULL,
  `pikup` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `noti_email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `geo_boundary` varchar(255) NOT NULL,
  `pool` varchar(40) DEFAULT NULL,
  `bank` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `transit` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zipcode` text NOT NULL,
  `country` text NOT NULL,
  `street` text NOT NULL,
  `preference` varchar(255) DEFAULT NULL,
  `delivery_window_to` datetime NOT NULL,
  `user_status` varchar(55) NOT NULL DEFAULT 'active',
  `registration_step` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `created_at`, `updated_at`, `password`, `remember_token`, `text_notification`, `email_notification`, `address`, `company_name`, `user_role`, `delivery_service`, `delivery_location`, `delivery_window`, `pikup`, `description`, `noti_email`, `mobile`, `geo_boundary`, `pool`, `bank`, `branch`, `transit`, `account_number`, `details`, `lat`, `lng`, `city`, `state`, `zipcode`, `country`, `street`, `preference`, `delivery_window_to`, `user_status`, `registration_step`, `is_active`) VALUES
(1, 'Admin', 'admin@gmail.com', '2017-09-16 00:00:00', '2018-09-18 03:25:48', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'gSQZ0e87a9B0CyYSmmao3sesipVpYSgjdGkQvFmDmYI4zijN2dRwWHplZcAR', '0', '0', '', '', 1, '', '', '2017-09-27 13:30:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-10-22 11:05:34', 'active', 1, 0),
(2, 'Jim', 'buyer1@resetfoods.com', '2017-09-16 10:31:40', '2019-05-01 07:27:07', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'tUuDDRhhw87anRQZ8D3jkEeOtp81SANTT9x1qXNdbxNSchDkrt84aqkxYcIl', '0', '1', '555 Steeprock Dr, North York, ON, M3J2Z6', 'Johnvince foods', 2, 'Call Before Delivery', 'Canada', '2017-09-27 13:30:00', 'Buyer pickup', 'Welcome to resetfood', 'buyer1@resetfoods.com', '', '200', '12,13,14,15,16,17,20,22', '', '', '', '', '', '43.7588054', '-79.4686846', 'North York', 'ON', 'M3J2Z6', 'Canada', '555 Steeprock Dr', '1,2', '2017-10-22 11:05:00', 'active', 1, 0),
(3, 'Geoff', 'supplier1@resetfoods.com', '2017-09-16 10:51:51', '2021-05-31 14:49:10', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'eaDNB8viW159IUF3BbieN4dHrudq5I7bk5fUODZpH81zJG4JlOfiDyKH3HPu', '0', '0', '370 Progress Ave, Scarborough, ON, M1P2Z4', 'Dads', 3, 'Outside Delivery', '370 Progress Ave, Scarborough, ON M1P 2Z4', '2017-09-23 12:00:00', 'Supplier delivery Preference', '', 'supplier1@resetfoods.com', '', '200', '14,15', '', '', '', '', '', '43.7741249', '-79.2677164', 'Scarborough', 'ON', 'M1P2Z4', 'Canada', '370 Progress Ave', '', '2017-10-26 11:05:00', 'active', 1, 0),
(4, 'Geoff', 'supplier2@resetfoods.com', '2017-09-16 10:55:16', '2018-08-22 03:28:42', '$2y$10$LjPgDJlly3mHBuYNDScMFe8S5pWbUUISfb.ZpjdmMb.Oi6NXsQxe2', 'v3iMCncObLog91wqRUFButfy8H1uKu1dDDo2SsmhJnXqvP6hy5dmhsE5w0OX', '0', '0', '277 Gladstone Ave, Toronto, ON, M6J3L9', 'Cadbury', 3, 'Outside Delivery', '277 Gladstone Ave, Toronto, ON M6J 3L9', '2017-09-27 01:30:00', 'Supplier delivery Preference', '', 'supplier2@resetfoods.com', '', '200', '', '', '', '', '', '', '43.6515792', '-79.4302936', 'Toronto', 'ON', 'M6J3L9', 'Canada', '277 Gladstone Ave', '', '2017-10-22 11:05:00', 'active', 1, 0),
(5, 'Geoff', 'supplier3@resetfoods.com', '2017-09-16 10:57:03', '2018-07-26 14:30:04', '$2y$10$7HZrGaNRAXnITK4yE4nDjOVB71Nvekebosf1RwL1GfHXu6lR7xlEq', 'UbqWblPnfPU0tzOdhhFadpsU7gREKQt1r63eJxGvG1prIA93MkTYiI6whbSN', '0', '0', '5 Bermondsey Rd, East York, ON, M4B2T7', 'Peek Freans', 3, 'Outside Delivery', '5 Bermondsey Rd, East York, ON M4B 2T7', '2017-09-27 01:30:00', 'Supplier delivery Preference', '', 'supplier3@resetfoods.com', '', '200', '', '', '', '', '', '', '43.71275929999999', '-79.3097526', 'East York', 'ON', 'M4B2T7', 'Canada', '5 Bermondsey Rd', '', '2017-10-22 11:05:00', 'active', 1, 0),
(6, 'Geoff', 'supplier4@resetfoods.com', '2017-09-16 11:00:24', '2017-10-12 13:31:37', '$2y$10$3G95mFUtwUP35D1KmDa.9uLLW14Zopw1pbkm.6LVuLUuZQHM9Luqq', 'alnSZN4bLbzvxh3mq0z79KEJhqUWdmS9HFGxYUBdxQcJNWglMtiDOaU0DWw2', '0', '0', '45 Ewen Road, Hamilton, ON, L8S3C7', 'Trebor Allan Inc.', 3, 'Outside Delivery,Lift gate service at delivery', '45 Ewen Road, Hamilton, ON L8S 3C7', '2017-09-27 01:30:00', 'Supplier delivery Preference', '', 'supplier4@resetfoods.com', '', '200', '5,12,14', '', '', '', '', '', '43.2555572', '-79.9312154', 'Hamilton', 'ON', 'L8S3C7', 'Canada', '45 Ewen Road', '', '2017-10-22 11:05:00', 'active', 1, 0),
(7, 'Geoff', 'supplier5@resetfoods.com', '2017-09-16 11:01:49', '2017-11-22 02:38:38', '$2y$10$Xvc/ADyPs5cBUGh1Z0CZpejK78h5/wyEmQ/qo8UNrHDaOxm0HHwjm', 'dnB7Gt0u2y5RzG2F5MPBDaNFsofKEjsuTtvt6nxBpmqSRvd306qrrnF4Ss6b', '0', '0', '1400 O\'conner Dr, East York, ON, M4B2T8', 'Nabisco Ltd', 3, 'Outside Delivery', '1400 O\'conner Dr, East York, ON M4B 2T8', '2017-09-27 01:30:00', 'Supplier delivery Preference', '', 'supplier5@resetfoods.com', '', '200', '1', '', '', '', '', '', '43.7132871', '-79.3076349', 'East York', 'ON', 'M4B2T8', 'Canada', '1400 O\'conner Dr', '', '2017-10-22 11:05:00', 'active', 1, 0),
(8, 'Jim', 'buyer2@resetfoods.com', '2017-09-16 11:04:42', '2018-08-06 16:50:02', '$2y$10$J6vK29HITdTu9oWArnObn.ClXArS2bPDC6H6Hw8OeznMrp0X62vOS', 'cmk9V161yki1Z0ILKW5H3WeIgVpN6PICZuMH7UXGkcS2zQfqaS5pkH4Xlwpc', '0', '1', '2 Bloor Street West, suite 3300, Toronto, ON, M4W3K3', 'Ronald A. Chisholm Limited', 2, '', '2 Bloor Street West, suite 3300', '2017-09-27 13:30:00', 'Buyer pickup', '', 'buyer2@resetfoods.com', '', '200', '12,13', '', '', '', '', '', '43.6704097', '-79.3872779', 'Toronto', 'ON', 'M4W3K3', 'Canada', '2 Bloor Street West, suite 3300', '', '2017-10-22 11:05:00', 'active', 1, 0),
(9, 'Jim', 'buyer3@resetfoods.com', '2017-09-16 11:08:43', '2018-08-06 16:45:35', '$2y$10$KOrOOqifM4EBr56WOeA7EuWXK4tzpydPnKJvWOoOWrGqbP7d3Bd5.', 'EP7cUphuuamt9uax39gQw4Uq7mFHFXYu8HYQiTpssSYJ9Gbpio1cX4kzUUHJ', '0', '0', '218 Beverley Glen Blvd, Thornhill, ON, L4J7T5', 'International Food Merchant', 2, 'Call Before Delivery', '218 Beverley Glen Blvd, Thornhill, ON L4J 7T5', '2017-09-27 13:30:00', 'Buyer pickup', '', 'buyer3@resetfoods.com', '', '200', '12', '', '', '', '', '', '43.81384300000001', '-79.4648177', 'Thornhill', 'ON', 'L4J7T5', 'Canada', '218 Beverley Glen Blvd', '', '2017-10-22 11:05:00', 'active', 1, 0),
(10, 'Jim', 'buyer4@resetfoods.com', '2017-09-16 11:10:51', '2018-08-22 03:16:47', '$2y$10$82p9LEqD7e3ojGHhR7qhauF9VR2jT.uR.QutQ0BH18QDIUtOZij.C', 'LcGHf2RYZrEmhohqcYDyiAILfMtRudANKQfiPb6gVS1LvqcM9RxtTAM4X4T7', '0', '0', 'Acces Ingredients, 145, rue J.A. Bombardier, Boucherville, QC, J4B8P1', 'Ronald A. Chisholm Limited', 2, 'Call Before Delivery', 'Accès Ingrédients, 145, rue J.A. Bombardier, Boucherville, QC  J4B 8P1', '2017-09-27 13:30:00', 'Buyer pickup', '', 'buyer4@resetfoods.com', '', '200', '12', '', '', '', '', '', '45.5575183', '-73.4181207', 'Boucherville', 'QC', 'J4B8P1', 'canada', 'Acces Ingredients, 145, rue J.A. Bombardier', '', '2017-10-22 11:05:00', 'active', 1, 0),
(11, 'Jim', 'buyer5@resetfoods.com', '2017-09-16 11:12:07', '2018-07-14 00:48:46', '$2y$10$5IZPtWJExbwTMrdKgO5ue.cFiIDFeuKCZcnXeD0pN5278OG9Qr9tK', 'B4CNcU8uOjbCbM6H1elNTkSJLKQkQWz1OmzDo1MwORt2VcKoGp2boy8Mb0Yt', '0', '1', '2333 N Sheridan Way, Mississauga, ON, L5K1A7', 'Wilkinson Foods International Ltd', 2, '', 'Canada', '2017-09-27 13:30:00', 'Buyer pickup', '', 'buyer5@resetfoods.com', '', '200', '18,12', '', '', '', '', '', '43.5191342', '-79.6559159', 'Mississauga', 'ON', 'L5K1A7', 'Canada', '2333 N Sheridan Way', '', '2017-10-22 11:05:34', 'active', 1, 0),
(12, 'Jim', 'buyer6@resetfoods.com', '2017-09-16 11:13:18', '2018-01-13 17:09:57', '$2y$10$/slZ73DUKcF.wDf5ou5AKezn3Gx61MFQ/CApOPdSiVAnLtEyy8Ws.', 'ohivuTDAMTpmGAqrzsBIyYKuGvnkYMquIzCQktTmXWx2HPRRO7Ox57wAj8Ng', '0', '1', '2880 Portland Dr, Oakville, ON, L6H5S8', 'C.W. Shasky & Associates', 2, '', '2880 Portland Dr', '2017-09-27 13:30:00', 'Buyer pickup', '', 'buyer6@resetfoods.com', '', '200', '', '', '', '', '', '', '43.515887', '-79.6809445', 'Oakville', 'ON', 'L6H5S8', 'Canada', '2880 Portland Dr', '', '2017-10-22 11:05:34', 'active', 1, 0),
(13, 'Jim', 'buyer7@resetfoods.com', '2017-09-16 11:14:22', '2018-01-13 17:10:12', '$2y$10$SOjgI2HC8666hhINluYkA.pG.7Iv6cC7y421ZAMLTbqJ1lBGa/t2S', '1yZlmnwejVZpxJk8NX3zolI2yejBj3hKBKEDPrBm0AD5jUajx8Z9YWu4BGfv', '0', '1', '461 Alden Rd, Markham, ON, L3R3L4', 'Magnum Food Brokers Inc', 2, '', 'Canada', '2017-09-27 13:30:00', 'Buyer pickup', '', 'buyer7@resetfoods.com', '', '200', '18', '', '', '', '', '', '43.8348698', '-79.3327668', 'Markham', 'ON', 'L3R3L4', 'Canada', '461 Alden Rd', '', '2017-10-22 11:05:34', 'active', 1, 0),
(14, 'Jim', 'buyer8@resetfoods.com', '2017-09-16 11:15:38', '2018-01-13 17:10:30', '$2y$10$PG3FgkJYt1w/AIP/LA7ZoOFc7drjouxjtA8jMGk.OLiQVKMTy2cQi', 'jK33h01nfUF2n3gCKrRj3ChVuHV6PK26r686QKTEhkgqThFBoFE3SfXruMCY', '0', '1', '700 Oxford St, Oshawa, ON, L1J3V9', 'Topr Food Distributors', 2, '', 'Canada', '2017-09-27 13:30:00', 'Buyer pickup', '', 'buyer8@resetfoods.com', '', '200', '12', '', '', '', '', '', '43.877586', '-78.86031799999999', 'Oshawa', 'ON', 'L1J3V9', 'Canada', '700 Oxford St', '', '2017-10-22 11:05:00', 'active', 1, 0),
(15, 'jim', 'buyer9@resetfoods.com', '2017-09-16 12:34:31', '2018-01-13 17:10:57', '$2y$10$oBnb2Kr4P566vrDcZHoKZOEG8MjUcWU3OFSohleojhpRwMuv2Jrni', 'nXVzol5v39wLRS9Jx01MrSyvYInbNFALNIXB5xUrPzeGWrx1UUasEDedaUfE', '0', '1', '288 Catherine St, Ottawa, ON, K1R5T3', 'Tannis Food Distributors', 2, 'Inside delivery', '288 Catherine St, , ON K1R 5T3', '2017-09-27 13:30:00', 'Buyer pickup', 'tesr', 'buyer9@resetfoods.com', '', '200', '18,12,14', '', '', '', '', '', '45.4077985', '-75.69532459999999', 'Ottawa', 'ON', 'K1R5T3', 'Canada', '288 Catherine St', '', '2017-10-22 11:05:34', 'active', 1, 0),
(16, 'jim', 'buyer10@resetfoods.com', '2017-09-16 12:37:41', '2018-01-13 17:13:27', '$2y$10$nmKDL4zTBLP8sskWByfyxuTBB4oM.ckzP31suTRohR5cAsRvH2Jbq', 'zE5SSRhPQw8sY81ARqFH1EHUo1QzF2ovRtOKDLGR9NgZcVJOoLdN54RDi3WK', '0', '1', '97 Hanna Crt S, Belleville, ON, K8P5H2', 'Moira River Foods', 2, 'Inside delivery', '97 Hanna Crt S', '2017-09-27 13:30:00', 'Buyer pickup', 'test', 'buyer10@resetfoods.com', '', '200', '18,14', '', '', '', '', '', '44.1811529', '-77.415072', 'Belleville', 'ON', 'K8P5H2', 'Canada', '97 Hanna Crt S', '', '2017-10-22 11:05:34', 'active', 1, 0),
(17, 'Jim', 'buyer11@resetfoods.com', '2017-09-16 12:38:55', '2017-09-26 15:12:05', '$2y$10$0LYySci8FtltsSH4OU6h/.oqf7XTYF.iJTmSsifwnGrcLbm8Ni2qu', 'y3zzyA8wJi0h11zXKBRbikeAIQIP2kxZbNgLCYJQOcfkgT1etrMFda6xMBFt', '0', '0', '65 Elmdale Road, Cavan Monaghan, ON, K9J0G5', ' Sysco Central Ontario ', 2, 'Inside delivery', '65 Elmdale Road', '2017-09-27 13:30:00', 'Buyer pickup', '', 'buyer11@resetfoods.com', '', '200', '', '', '', '', '', '', '44.2567674', '-78.3883093', 'Cavan Monaghan', 'ON', 'K9J0G5', 'Canada', '65 Elmdale Road', '', '2017-10-22 11:05:34', 'active', 1, 0),
(31, 'Peter', 'peterkarrys@icloud.com', '2017-10-02 21:17:56', '2017-10-25 03:53:24', '$2y$10$sYRmf270WPKXIcog3Y9RhuW3be9A.boTDp0JJ/2Pd6b7Ox8MtHzNO', 'UEzMUnHE2YVST25QHvx5qbwRxhbDdriCVwVh0zQBX0PbGby00sDUPUoMr7IU', '0', '0', '3 scenic hill court, toronto, Ontario, M1C 3V5', 'Peter Karrys', 2, '', '3 scenic hill court', '2017-10-02 05:15:00', 'Buyer pickup', '', 'peterkarrys@icloud.com', '', '200', '', 'Good Guys Bank', 'Around the corner drive', '', '', '', '43.7818944', '-79.174112', 'toronto', 'Ontario', 'M1C 3V5', 'Canada', '3 scenic hill court', '', '2017-10-02 05:15:00', 'deactive', 1, 0),
(32, 'Geoff', 'geoff.benic@sofilialogistics.com', '2017-10-25 03:53:04', '2017-11-10 01:51:06', '$2y$10$obkqBU7lUOckLteqxjdEberb2q0bTK0BW0x2O9kVOxw.5obOC64jy', 'bTPj2Fdmtm1yZxvSiGzWWbfUSPEAJRfWLG5E3PiDUbSu2es64YtFHOwNVBTe', '0', '1', '3 Scenic Hill Court, toronto, Ontario, M1C 3V5', 'geoffB', 2, '', '3 Scenic Hill Court', '2017-10-24 23:52:00', 'Buyer pickup', '', 'geoff.benic@sofilialogistics.com', '', '200', '', '', '', '', '', '', '43.7818944', '-79.174112', 'toronto', 'Ontario', 'M1C 3V5', 'Canada', '3 Scenic Hill Court', '', '2017-10-24 23:52:00', 'deactive', 1, 0),
(33, 'Raj', 'aloktripathiprofessional1@gmail.com', '2017-12-15 10:18:38', '2017-12-22 11:44:17', '$2y$10$rRDCgZCsmKY.uh7FFsPYtOOpCNmHhBnyNgHJ/JUfRETHow/xkKKuW', 'BiJ7QA9aSJznDhbjVVnODrbnDN6HXCWUb6cQGqdQddGqIgrnw8yh7WyeCtM1', '0', '0', 'Londonstreetest, London, UK, 12345', 'Jamtech', 2, 'Outside Delivery', 'Londonstreetest', '2017-12-15 15:46:00', 'Buyer pickup', '123344545', 'aloktripathiprofessional@gmail.com', '', '200', '16', 'HDFC', 'London', 'Amazon', '123456789', 'TEst', '', '', 'London', 'UK', '12345', 'UK', 'Londonstreetest', '', '2017-12-15 15:46:00', 'active', 1, 0),
(34, 'aj shuk', 'aloktripathiprofessional@gmail.com', '2017-12-20 07:43:05', '2018-07-10 12:37:15', '$2y$10$WPd9i.HxvrDGmdmbrJbZqOWKDvjWc2y5/hsvznPYhSxtu/gqPwvaW', 'wRxxWDnQJ7vaxQyECKIWbwDBir8NGDHHYA6A15afx1U0mKMZeXCvTBZxNIRd', '0', '0', 'Vikas Nagar, teststandx, Lucknow, UP, 226022', 'abc', 2, '', 'Vikas Nagar, teststandx', '2017-12-20 13:12:00', 'Buyer pickup', '', 'aloktripathiprofessional@gmail.com', '', '200', '12,13,14,15', '', '', '', '', '', '', '', 'Lucknow', 'UP', '226022', 'India', 'Vikas Nagar, teststandx', '', '2017-12-20 13:12:00', 'active', 1, 0),
(35, 'Buyer100', 'Buyer100@resetfoods.com', '2017-12-22 05:29:03', '2018-01-18 03:43:20', '$2y$10$Jkm1WVJ5S1BN0vKqCv2rxOTDjxYrnamxufRqRuVQWodlnKllh4JLu', 'y8wftkHBAAQassyWHNvWVpVKi9mxavLo13iHMRPeORS5DZldBvjkeA9Pqcdj', '0', '1', '3 Scenic Hill Court, Toronto, M1C 3V5', 'Buyer100', 2, '', '', '2017-12-22 00:28:00', 'Buyer pickup', '', 'Buyer100@resetfoods.com', '', '200', '', '', '', '', '', '', '', '', 'Toronto', '', 'M1C 3V5', 'Canada', '3 Scenic Hill Court', '', '2017-12-22 00:28:00', 'active', 1, 0),
(36, 'Hussain Ahmad', 'engrhussainahmad@gmail.com', '2018-12-01 12:08:01', '2018-12-01 12:08:01', '$2y$10$vpKKPNaKyl2BTKw0oiO9BufK/wQDt7/7edukK8kUo2ivjQFVSspdu', 'IJdCpXMZrbNBpG2MhHZbPwBE12RpStsJ308VV6FHNAkI5mN4wazWZrsEKNYz', '1', '1', 'hkhkhk', 'Testing', 2, '', 'hkhkhk', '2018-12-01 04:34:00', 'Buyer pickup', 'gjkgjgjh', 'engrhussainahmad@gmail.com', '03452677313', '200', NULL, 'UBL', '178', 'hjhkh', 'hkhkhkhkj', 'hghgkkjhkh', 'nil', 'nil', 'nil', 'nil', 'nil', 'nil', 'hkhkhk', NULL, '2018-12-14 04:34:00', 'active', 1, 0),
(37, 'Admin', 'hussain@gmail.com', '2017-09-16 00:00:00', '2018-09-18 03:25:48', '$2y$10$iltu5fhB6cjtlcwCMTHR.ut/SuiKLTdzVCIhIdjPsq8ZoQHUJ4Jaa', 'iTKrrHrUgID8ClWHU61LVjZi2LjBdk6XdP1HP5gg6qtB9omVoM3D5Ffoj5Ej', '0', '0', '', '', 1, '', '', '2017-09-27 13:30:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-10-22 11:05:34', 'active', 1, 0),
(38, 'Ma', 'asdasd@sfd.com', '2019-08-03 14:08:43', '2019-08-03 14:08:43', '$2y$10$szWL9QF5PgxmV4uFwxj/l./mxZn4OMcBiW0bo7Jiau2J5lL/oFBz2', NULL, '0', '0', 'set2, san, Bra, 16023', 'Nothing', 2, '', 'set2', '2019-08-13 11:01:00', 'Buyer pickup', 'asd', 'asdasd@sfd.com', '', '200', NULL, '', '', '', '', '', '', '', 'san', 'Bra', '16023', 'Brazil', 'set2', NULL, '2019-08-14 10:50:00', 'active', 1, 0),
(39, 'Ma', 'asrqwqdasd@sfd.com', '2019-08-03 14:31:58', '2019-08-03 14:31:58', '$2y$10$TCeT5EYaQAuu7ELSUWxkiuC10VnQhnlBcq7i.YUK9DwqSftULzzLy', 'JrcWmkM7Y1sImWMgNogSKBSuYRQtItvJ6OG2ngl8pHxyNjuDCakd2JicCciE', '0', '0', 'set2, san, Bra, 16023', 'Nothing', 2, '', 'set2', '2019-08-05 10:50:00', 'Buyer pickup', 'sfa', 'asrqwqdasd@sfd.com', '', '200', NULL, '', '', '', '', '', '', '', 'san', 'Bra', '16023', 'Brazil', 'set2', NULL, '2019-08-22 11:01:00', 'active', 1, 0),
(40, 'inseasec@gmail.com', 'inseasec@gmail.com', '2021-03-25 09:28:22', '2021-03-25 09:28:41', '$2y$10$ScvrlPK1j4VMus.m8nVoY.Ya3l4vMXGoorZrVI9bo3x6gP72SqkEu', 'fO1ND3GlAA22FV4eoVrk3JpcmqIkul1PO6MxMbjv0iOhMJsOhEOqg8dkweYf', '1', '1', '23, chd, chd, 160003', 'seasec', 2, 'Call Before Delivery', '23', '2021-03-31 02:58:00', 'Buyer pickup', '', 'inseasec@gmail.com', '9041925042', '150', '12,13,14,15,16,17,20,22', '', '', '', '', '', '', '', 'chd', 'chd', '160003', 'India', '23', NULL, '2021-03-27 02:58:00', 'active', 1, 0),
(41, 'Shuvo', 'rawscripterx@gmail.com', '2021-05-12 14:05:59', '2021-05-12 14:05:59', '$2y$10$DN7ATjAgMBT4qJQDQOJCL.wqAjroBKkGKEcvS0AWnOf9tGRaJgMPS', 'e7CdCJizahxsxcw2g9ftu79Y2msnaCxWl5Sua01U1d51Ua3LD2ju9cbKwvSe', '0', '0', 'Shantinagor, Joypurhat, Joypurhat, Rajshahi, 5900', 'TF Digital Solucation', 2, 'Inside delivery,Outside Delivery,Call Before Delivery,Lift gate service at delivery,Elevated dock at delivery,Protect from freezing', 'Shantinagor, Joypurhat', '2021-05-12 08:05:00', 'Buyer pickup', 'Hello world', '', '', '200', NULL, '', '', '', '', '', '', '', 'Joypurhat', 'Rajshahi', '5900', 'Bangladesh', 'Shantinagor, Joypurhat', NULL, '2021-05-12 08:05:00', 'active', 1, 0),
(42, 'Shuvo', 'rawscripterx55@gmail.com', '2021-05-26 11:33:13', '2021-05-26 11:33:13', '$2y$10$VhIpQW5SyAnbYL9Ju3Ts8uNYmjvzfuzrF..BhVVoOzEWt4G0xoyTq', NULL, '0', '0', 'Shantinagor, Joypurhat, Joypurhat, Rajshahi, 5900', 'TF Digital Solucation', 2, '', '', '0000-00-00 00:00:00', '', '', '', '', '', NULL, '', '', '', '', '', '', '', 'Joypurhat', 'Rajshahi', '5900', 'Bangladesh', 'Shantinagor, Joypurhat', NULL, '0000-00-00 00:00:00', 'active', 1, 0),
(43, 'Shuvo', 'supplier11000@resetfoods.com', '2021-05-31 15:18:12', '2021-05-31 15:37:42', '$2y$10$lsEiBZpcKtTaTDXoCL93eus9i5z.7KhaU/nrveoNs2r2U1GCcrLYK', NULL, '0', '0', 'Shantinagor, Joypurhat, Joypurhat, Rajshahi, 5900', 'TF Digital Solucation', 2, '', '', '0000-00-00 00:00:00', '', '', '', '', '', '14,15', '', '', '', '', '', '', '', 'Joypurhat', 'Rajshahi', '5900', 'Bangladesh', 'Shantinagor, Joypurhat', NULL, '0000-00-00 00:00:00', 'active', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `company_name` text COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pool_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notification` text COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_service` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_window` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pikup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `geo_boundary` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_posts`
--
ALTER TABLE `buyer_posts`
  ADD PRIMARY KEY (`buyer_post_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribution_estrictions`
--
ALTER TABLE `distribution_estrictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expiry`
--
ALTER TABLE `expiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pools`
--
ALTER TABLE `pools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sku`
--
ALTER TABLE `sku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_allocations`
--
ALTER TABLE `supplier_allocations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `supplier_posts`
--
ALTER TABLE `supplier_posts`
  ADD PRIMARY KEY (`supplier_post_id`);

--
-- Indexes for table `supplier_posts_temp`
--
ALTER TABLE `supplier_posts_temp`
  ADD PRIMARY KEY (`supplier_post_id`);

--
-- Indexes for table `temp_warehouse`
--
ALTER TABLE `temp_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_posts`
--
ALTER TABLE `buyer_posts`
  MODIFY `buyer_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distribution_estrictions`
--
ALTER TABLE `distribution_estrictions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expiry`
--
ALTER TABLE `expiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `pools`
--
ALTER TABLE `pools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sku`
--
ALTER TABLE `sku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT for table `supplier_allocations`
--
ALTER TABLE `supplier_allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `supplier_posts`
--
ALTER TABLE `supplier_posts`
  MODIFY `supplier_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `supplier_posts_temp`
--
ALTER TABLE `supplier_posts_temp`
  MODIFY `supplier_post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_warehouse`
--
ALTER TABLE `temp_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
