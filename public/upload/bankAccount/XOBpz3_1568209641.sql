-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2019 at 02:27 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `00a306-qamarwahed-orange`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remeber_token` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_super_admins` tinyint(1) NOT NULL DEFAULT 1,
  `permissions` enum('add','edit','view') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image`, `end_date`, `is_active`, `created_at`) VALUES
(1, '/uploads/beautyCentersImages/NQuZ8mDg_400x400.jpg', '2019-09-18', 0, '2019-06-28 06:23:42'),
(2, '/uploads/beautyCentersImages/NQuZ8mDg_400x400.jpg', '2019-10-10', 1, '2019-06-28 06:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `app_emails`
--

CREATE TABLE `app_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_emails`
--

INSERT INTO `app_emails` (`id`, `email`, `created_at`) VALUES
(1, 'admin@magdsoft.com', '2019-06-27 02:57:04'),
(2, 'supervisor@magdsoft.com', '2019-06-27 02:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `app_phones`
--

CREATE TABLE `app_phones` (
  `id` int(11) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_phones`
--

INSERT INTO `app_phones` (`id`, `phone`, `created_at`) VALUES
(1, '01008292985', '2019-06-27 02:56:21'),
(2, '010082092986', '2019-06-27 02:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE `app_setting` (
  `id` int(11) NOT NULL,
  `about_us_ar` text NOT NULL,
  `about_us_en` text NOT NULL,
  `policy_term_ar` text NOT NULL,
  `policy_term_en` text NOT NULL,
  `point_for_new_order` int(11) NOT NULL DEFAULT 0,
  `point_for_rating` int(11) NOT NULL DEFAULT 0,
  `minimum_to_accept_order` int(11) NOT NULL DEFAULT 0,
  `fees` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_setting`
--

INSERT INTO `app_setting` (`id`, `about_us_ar`, `about_us_en`, `policy_term_ar`, `policy_term_en`, `point_for_new_order`, `point_for_rating`, `minimum_to_accept_order`, `fees`, `created_at`) VALUES
(1, 'about_us_ar about_us_ar about_us_ar about_us_ar', 'about_us_en about_us_en about_us_en about_us_en', 'policy_term_ar policy_term_ar policy_term_ar policy_term_ar policy_term_ar ', ' policy_term_en  policy_term_en  policy_term_en  policy_term_en  policy_term_en ', 5, 15, 3000, 10, '2019-06-27 02:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `balance_recharge`
--

CREATE TABLE `balance_recharge` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `amount` double DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `users_id` int(11) DEFAULT NULL,
  `providers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `balance_recharge`
--

INSERT INTO `balance_recharge` (`id`, `image`, `amount`, `is_approved`, `created_at`, `users_id`, `providers_id`) VALUES
(1, '/uploads/balanceRecharge/balanceRecharge-9wKDfsRa13bJ9Lp3YOONO10EQ7AzqN1F4aMX2qkcz7OgHhcMuDOzWNp961SWkfD8B8JyI.png', NULL, NULL, '2019-06-28 06:11:21', 23, NULL),
(2, '/uploads/balanceRecharge/balanceRecharge-bipl4FQvzVaATu3kmyRb8idQbvd14YI3S60xziA97bBPEbcWPP42IaThz7RDvnN90AmiH.png', NULL, NULL, '2019-06-30 17:45:07', 23, NULL),
(3, '/uploads/balanceRecharge/balanceRecharge-G3jx4poFqEG7TxpKHGjrvCnKAq31eYrKORNC058xjEhlaM55gQKVAnCCwNfC1IGDQESnX.png', NULL, NULL, '2019-06-30 18:14:53', 23, NULL),
(4, '/uploads/balanceRecharge/balanceRecharge-VQ2r9EHvGDMIcOJjbK5gN4PAnVdrRnDkSTsdIY3XbtPT8MC2nEAg2Px0G0SOE7LcYBDku.png', NULL, NULL, '2019-06-30 18:31:36', 23, NULL),
(5, '/uploads/balanceRecharge/balanceRecharge-WXHrcFKmBKT4f4YlD3lwTw5knM6ooEajnvTdp8obVp04srOCZPUvbQHN7TxBjIwtXEvXj.png', NULL, NULL, '2019-07-01 13:34:54', 23, NULL),
(6, '/uploads/balanceRecharge/balanceRecharge_1562674235_4vmoCnUm13.jpeg', NULL, NULL, '2019-07-09 13:10:35', 34, NULL),
(7, '/uploads/balanceRecharge/balanceRecharge_1567258345_cWTF2BsuTO.jpeg', NULL, NULL, '2019-08-31 14:32:25', 55, NULL),
(8, '/uploads/balanceRecharge/balanceRecharge_1567258710_spOAFdekXJ.jpeg', NULL, NULL, '2019-08-31 14:38:30', 55, NULL),
(9, '/uploads/balanceRecharge/balanceRecharge_1567459921_tMZrwpo5HA.jpeg', NULL, NULL, '2019-09-02 22:32:01', 62, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `ipan` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `name_ar`, `name_en`, `image`, `account_number`, `person_name`, `ipan`, `is_active`, `created_at`) VALUES
(1, 'البنك التجارى الدولى', 'Commercial international bank', '/uploads/beautyCentersImages/download.jpeg', '129899787678', 'person_name', '129899787678', 1, '2019-06-28 05:52:57'),
(2, 'بنك القاهرة', 'Cairo bank', '/uploads/beautyCentersImages/Banque-Du-Caire.jpg', '129899787678', 'person_name', '129899787678', 1, '2019-06-28 05:52:57'),
(3, 'بنك الاسكندرية', 'Alex bank', '/uploads/beautyCentersImages/download.jpeg', '129899787678', 'person_name', '129899787678', 1, '2019-06-28 05:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `beauty_centers`
--

CREATE TABLE `beauty_centers` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `beauty_center_level_id` int(11) NOT NULL,
  `branches_number` int(11) NOT NULL,
  `about_beauty` text NOT NULL,
  `gender` enum('both','men','women') DEFAULT NULL,
  `from_day` varchar(45) NOT NULL,
  `to_day` varchar(45) NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `categories_id` int(11) NOT NULL,
  `providers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beauty_centers`
--

INSERT INTO `beauty_centers` (`id`, `logo`, `name`, `beauty_center_level_id`, `branches_number`, `about_beauty`, `gender`, `from_day`, `to_day`, `start_at`, `end_at`, `facebook_link`, `twitter_link`, `instagram_link`, `is_active`, `created_at`, `categories_id`, `providers_id`) VALUES
(16, '/uploads/beautyCentersLogos/beautyCentersLogos_1562691612_bPw7FVBhlA.jpeg', 'Shahrazad', 1, 15, 'Test Beauty Center', 'men', 'Sunday', 'Thursday', '10:30:00', '20:25:00', 'https://www.facebook.com/ww', 'https://www.twitter.com/ww', 'https://www.instgram.com/ww', 1, '2019-07-09 04:56:28', 1, 9),
(17, '/uploads/beautyCentersLogos/beautyCentersLogos_1562644697_wpHV1g9FKV.jpeg', 'Test Beauty Center', 1, 11, 'about Beauty Center', 'both', 'saturday', 'friday', '10:30:00', '20:25:00', NULL, NULL, NULL, 1, '2019-07-09 04:58:17', 2, 10),
(19, '/uploads/beautyCentersLogos/beautyCentersLogos_1567224272_fCAJuhjYeM.png', 'SharZad', 1, 11, 'About Shahrzad', 'men', 'saturday', 'friday', '04:30:00', '20:30:00', 'https://www.facebook.com/test', 'https://www.twitter.com/test', 'https://www.instgram.com/test', 1, '2019-08-31 05:04:32', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `beauty_center_levels`
--

CREATE TABLE `beauty_center_levels` (
  `id` int(11) NOT NULL,
  `level_ar` varchar(100) NOT NULL,
  `level_en` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beauty_center_levels`
--

INSERT INTO `beauty_center_levels` (`id`, `level_ar`, `level_en`, `is_active`, `created_at`) VALUES
(1, 'الفئة الاولى', 'class one', 1, '2019-06-28 05:41:10'),
(2, 'الفئة الثانية', 'class two', 1, '2019-06-28 05:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `beauty_images`
--

CREATE TABLE `beauty_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `beauty_centers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beauty_images`
--

INSERT INTO `beauty_images` (`id`, `image`, `created_at`, `beauty_centers_id`) VALUES
(18, '/uploads/beautyCentersImages/beautyCentersImages_1567224272_sEthT3AMtT.png', '2019-08-31 05:04:32', 19);

-- --------------------------------------------------------

--
-- Table structure for table `beauty_phone`
--

CREATE TABLE `beauty_phone` (
  `id` int(11) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `beauty_centers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beauty_phone`
--

INSERT INTO `beauty_phone` (`id`, `phone`, `created_at`, `beauty_centers_id`) VALUES
(35, '01008590021', '2019-08-28 13:01:49', 16),
(36, '01022696123', '2019-08-28 13:01:49', 16),
(37, '01008292666', '2019-08-31 05:04:32', 19);

-- --------------------------------------------------------

--
-- Table structure for table `beauty_services`
--

CREATE TABLE `beauty_services` (
  `id` int(11) NOT NULL,
  `service` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `beauty_centers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beauty_services`
--

INSERT INTO `beauty_services` (`id`, `service`, `price`, `created_at`, `beauty_centers_id`) VALUES
(27, 'watching tv', 1200, '2019-07-09 18:16:42', 16),
(28, 'listen to music', 20, '2019-07-09 18:16:42', 16),
(29, 'hair cut', 150, '2019-08-31 05:04:32', 19),
(30, 'hair dressing', 75, '2019-08-31 05:04:32', 19);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `logo`, `is_active`, `created_at`) VALUES
(1, 'تصفيف الشعر', 'hair Dressing', 'https://www.instagram.com/', 1, '2019-06-28 05:35:54'),
(2, 'الوشوم', 'Tato', 'https://www.instagram.com/', 1, '2019-06-28 05:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('open','close') NOT NULL DEFAULT 'open',
  `users_id` int(11) DEFAULT NULL,
  `providers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `message`, `created_at`, `status`, `users_id`, `providers_id`) VALUES
(11, 'this a user complain', '2019-07-09 03:25:04', 'open', 28, NULL),
(12, 'this a user complain', '2019-07-09 03:25:35', 'open', NULL, 9),
(13, 'Dlsmndsajlfndslanflasdnfdsa ndf sanmfsdmna fmsda', '2019-08-20 16:29:01', 'open', 43, NULL),
(14, 'Fldjnkfjnd n,fads nods', '2019-08-20 16:32:20', 'open', 43, NULL),
(15, 'D,fm a,af dsa', '2019-08-20 16:33:41', 'open', 43, NULL),
(16, 'Mohamed yahia mahmoud', '2019-08-27 11:32:22', 'open', 55, NULL),
(17, 'Mohamed yahia mahmoud', '2019-08-27 11:33:01', 'open', 55, NULL),
(18, 'this a user complain', '2019-08-28 09:48:38', 'open', 42, NULL),
(19, 'this a user complain', '2019-08-28 09:49:08', 'open', 44, NULL),
(20, 'the', '2019-08-28 09:49:56', 'open', 44, NULL),
(21, 'عللن', '2019-08-30 18:00:47', 'open', 55, NULL),
(22, 'S,dmfds', '2019-08-31 12:50:59', 'open', 28, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount_code`
--

CREATE TABLE `discount_code` (
  `id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `discount` double NOT NULL,
  `count` int(11) NOT NULL,
  `end_date` varchar(45) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount_code`
--

INSERT INTO `discount_code` (`id`, `code`, `discount`, `count`, `end_date`, `is_active`, `created_at`) VALUES
(1, '244633', 10, 1, '2019-09-12', 1, '2019-07-08 01:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `beauty_centers_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `users_id`, `beauty_centers_id`, `created_at`) VALUES
(9, 28, 2, '2019-07-09 03:50:52'),
(62, 28, 17, '2019-08-31 14:18:25'),
(67, 62, 17, '2019-09-03 09:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `beauty_center_id` int(11) DEFAULT NULL,
  `order_main_id` int(11) DEFAULT NULL,
  `order_secondary_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `longitude`, `latitude`, `address`, `created_at`, `beauty_center_id`, `order_main_id`, `order_secondary_id`) VALUES
(32, 22.3333344, 22.3333344, 'test Address', '2019-07-09 04:58:17', 17, NULL, NULL),
(33, 22.3333333, 22.3333333, 'test Address', '2019-07-09 06:03:51', NULL, 9, NULL),
(34, 22.3333333, 22.3333333, 'test Address', '2019-07-09 06:03:51', NULL, 9, NULL),
(35, 22.3333333, 22.3333333, 'test Address', '2019-07-09 06:12:24', NULL, 10, NULL),
(36, 22.3333333, 22.3333333, 'test Address', '2019-07-09 06:12:24', NULL, 10, NULL),
(37, 22.3333333, 22.3333333, 'test Address', '2019-07-09 06:22:03', NULL, 11, NULL),
(38, 22.3333333, 22.3333333, 'test Address', '2019-07-09 06:22:03', NULL, 11, NULL),
(47, 22.666666, 22.666666, 'Location address', '2019-07-10 17:42:36', NULL, 14, NULL),
(48, 22.666666, 22.666666, 'Location address', '2019-07-10 17:42:36', NULL, NULL, 14),
(49, 22.666666, 22.666666, 'Location address', '2019-07-10 17:44:27', NULL, 15, NULL),
(50, 22.666666, 22.666666, 'Location address', '2019-07-10 17:44:27', NULL, NULL, 15),
(51, 22.666666, 22.666666, 'Location address', '2019-07-10 17:45:42', NULL, 16, NULL),
(52, 22.666666, 22.666666, 'Location address', '2019-07-10 17:45:42', NULL, NULL, 16),
(53, 22.666666, 22.666666, 'Location address', '2019-07-10 17:46:06', NULL, 17, NULL),
(54, 22.666666, 22.666666, 'Location address', '2019-07-10 17:46:06', NULL, NULL, 17),
(55, 22.666666, 22.666666, 'Location address', '2019-07-10 17:47:24', NULL, 18, NULL),
(56, 22.666666, 22.666666, 'Location address', '2019-07-10 17:47:24', NULL, NULL, 18),
(57, 22.666666, 22.666666, 'Location address', '2019-07-10 17:54:04', NULL, 19, NULL),
(58, 22.666666, 22.666666, 'Location address', '2019-07-10 17:54:04', NULL, NULL, 19),
(59, 22.666666, 22.666666, 'Location address', '2019-07-10 17:54:44', NULL, 20, NULL),
(60, 22.666666, 22.666666, 'Location address', '2019-07-10 17:54:44', NULL, NULL, 20),
(61, 22.666666, 22.666666, 'Location address', '2019-07-10 17:55:04', NULL, 21, NULL),
(62, 22.666666, 22.666666, 'Location address', '2019-07-10 17:55:04', NULL, NULL, 21),
(63, 22.666666, 22.666666, 'Location address', '2019-07-10 17:56:09', NULL, 22, NULL),
(64, 22.666666, 22.666666, 'Location address', '2019-07-10 17:56:09', NULL, NULL, 22),
(65, 22.666666, 22.666666, 'Location address', '2019-07-10 17:57:55', NULL, 23, NULL),
(66, 22.666666, 22.666666, 'Location address', '2019-07-10 17:57:55', NULL, NULL, 23),
(67, 22.666666, 22.666666, 'Location address', '2019-07-10 17:58:19', NULL, 24, NULL),
(68, 22.666666, 22.666666, 'Location address', '2019-07-10 17:58:19', NULL, NULL, 24),
(69, 22.666666, 22.666666, 'Location address', '2019-07-10 17:59:32', NULL, 25, NULL),
(70, 22.666666, 22.666666, 'Location address', '2019-07-10 17:59:32', NULL, NULL, 25),
(71, 22.666666, 22.666666, 'Location address', '2019-07-10 18:00:20', NULL, 26, NULL),
(72, 22.666666, 22.666666, 'Location address', '2019-07-10 18:00:20', NULL, NULL, 26),
(73, 22.666666, 22.666666, 'Location address', '2019-07-10 18:02:40', NULL, 27, NULL),
(74, 22.666666, 22.666666, 'Location address', '2019-07-10 18:02:40', NULL, NULL, 27),
(75, 22.666666, 22.666666, 'Location address', '2019-07-10 18:04:40', NULL, 28, NULL),
(76, 22.666666, 22.666666, 'Location address', '2019-07-10 18:04:40', NULL, NULL, 28),
(77, 22.666666, 22.666666, 'Location address', '2019-07-10 18:05:44', NULL, 29, NULL),
(78, 22.666666, 22.666666, 'Location address', '2019-07-10 18:05:44', NULL, NULL, 29),
(79, 22.666666, 22.666666, 'Location address', '2019-07-10 18:05:51', NULL, 30, NULL),
(80, 22.666666, 22.666666, 'Location address', '2019-07-10 18:05:51', NULL, NULL, 30),
(81, 22.666666, 22.666666, 'Location address', '2019-07-10 18:06:58', NULL, 31, NULL),
(82, 22.666666, 22.666666, 'Location address', '2019-07-10 18:06:58', NULL, NULL, 31),
(83, 22.666666, 22.666666, 'Location address', '2019-07-10 18:07:38', NULL, 32, NULL),
(84, 22.666666, 22.666666, 'Location address', '2019-07-10 18:07:38', NULL, NULL, 32),
(85, 22.666666, 22.666666, 'Location address', '2019-07-10 18:09:40', NULL, 33, NULL),
(86, 22.666666, 22.666666, 'Location address', '2019-07-10 18:09:40', NULL, NULL, 33),
(87, 22.666666, 22.666666, 'Location address', '2019-07-10 18:10:46', NULL, 34, NULL),
(88, 22.666666, 22.666666, 'Location address', '2019-07-10 18:10:46', NULL, NULL, 34),
(89, 22.666666, 22.666666, 'Location address', '2019-07-10 18:11:42', NULL, 35, NULL),
(90, 22.666666, 22.666666, 'Location address', '2019-07-10 18:11:42', NULL, NULL, 35),
(91, 22.666666, 22.666666, 'Location address', '2019-07-10 18:16:17', NULL, 36, NULL),
(92, 22.666666, 22.666666, 'Location address', '2019-07-10 18:31:27', NULL, 37, NULL),
(93, 22.666666, 22.666666, 'Location address', '2019-07-10 18:32:16', NULL, 38, NULL),
(94, 22.666666, 22.666666, 'Location address', '2019-07-10 18:32:38', NULL, 39, NULL),
(95, 22.666666, 22.666666, 'Location address', '2019-07-10 18:32:45', NULL, 40, NULL),
(96, 22.666666, 22.666666, 'Location address', '2019-07-10 18:32:45', NULL, NULL, 40),
(97, 22.666666, 22.666666, 'Location address', '2019-07-10 18:33:35', NULL, 41, NULL),
(98, 22.666666, 22.666666, 'Location address', '2019-07-10 18:33:35', NULL, NULL, 41),
(99, 28.43, 31.43, 'test address', '2019-08-28 12:10:18', NULL, 42, NULL),
(101, 25.3333333, 25.333333, 'test Address  sss', '2019-08-28 13:01:49', 16, NULL, NULL),
(102, 31.2356996, 30.044414500000002, 'Tahrir Square', '2019-08-31 03:53:58', NULL, 43, NULL),
(103, 22.3333333, 22.3333333, 'test Address', '2019-08-31 05:04:32', 19, NULL, NULL),
(104, 31.319849099999995, 30.208577799999997, 'Saryaqos', '2019-08-31 12:50:17', NULL, 44, NULL),
(105, 30.74320077896118, 28.12713696375092, 'Damaris', '2019-09-03 10:59:39', NULL, 45, NULL),
(106, 30.74320077896118, 28.12713696375092, 'Damaris', '2019-09-03 11:03:04', NULL, 46, NULL),
(107, 30.74320077896118, 28.12713696375092, 'Damaris', '2019-09-03 11:03:14', NULL, 47, NULL),
(108, 30.745324753224846, 28.124061834631856, 'Damaris', '2019-09-03 11:30:09', NULL, 48, NULL),
(109, 30.74080422520638, 28.123600261964036, 'Damaris', '2019-09-03 11:33:04', NULL, 49, NULL),
(110, 30.74278939515352, 28.12793027361087, 'Damaris', '2019-09-03 11:34:49', NULL, 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `content_ar` text DEFAULT NULL,
  `content_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `content_ar`, `content_en`) VALUES
(1, 'تمت اضافة التقييم بنجاح.', 'Rate added successfully.'),
(2, 'تم الغاء طلبكم.', 'Order canceled'),
(3, 'تم الموافقة على طلبكم.', 'Order accepted'),
(4, 'تمت اضافة طلب جديد.', 'New order added.');

-- --------------------------------------------------------

--
-- Table structure for table `notify_users`
--

CREATE TABLE `notify_users` (
  `id` int(11) NOT NULL,
  `notifications_id` int(11) NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `users_id` int(11) DEFAULT NULL,
  `providers_id` int(11) DEFAULT NULL,
  `orders_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notify_users`
--

INSERT INTO `notify_users` (`id`, `notifications_id`, `is_seen`, `created_at`, `users_id`, `providers_id`, `orders_id`) VALUES
(44, 1, 1, '2019-07-09 03:13:21', 43, NULL, NULL),
(45, 1, 1, '2019-07-09 03:17:27', 43, 9, NULL),
(46, 1, 1, '2019-07-09 03:20:27', 43, 9, NULL),
(48, 1, 1, '2019-07-09 04:08:07', 43, 9, NULL),
(49, 1, 1, '2019-07-09 04:09:03', 43, 9, NULL),
(50, 4, 1, '2019-07-09 06:03:51', 43, NULL, NULL),
(51, 4, 1, '2019-07-09 06:12:24', 43, NULL, NULL),
(52, 4, 1, '2019-07-09 06:22:03', 43, NULL, NULL),
(53, 1, 1, '2019-07-09 12:24:51', 43, 9, NULL),
(54, 1, 1, '2019-07-09 12:24:54', 43, 9, NULL),
(55, 2, 1, '2019-07-09 12:50:16', 43, NULL, NULL),
(56, 2, 1, '2019-07-09 12:51:53', 43, NULL, NULL),
(57, 2, 1, '2019-07-09 12:53:17', 43, NULL, NULL),
(58, 2, 1, '2019-07-09 13:00:16', 28, NULL, NULL),
(59, 2, 1, '2019-07-09 18:19:08', 28, NULL, NULL),
(60, 4, 1, '2019-07-10 17:42:36', NULL, 9, NULL),
(61, 4, 1, '2019-07-10 17:44:27', NULL, 9, NULL),
(62, 4, 1, '2019-07-10 17:45:42', NULL, 9, NULL),
(63, 4, 1, '2019-07-10 17:46:06', NULL, 9, NULL),
(64, 4, 1, '2019-07-10 17:47:24', NULL, 9, NULL),
(65, 4, 1, '2019-07-10 17:54:04', NULL, 9, NULL),
(66, 4, 1, '2019-07-10 17:54:44', NULL, 9, NULL),
(67, 4, 1, '2019-07-10 17:55:04', NULL, 9, NULL),
(68, 4, 1, '2019-07-10 17:56:09', NULL, 9, NULL),
(69, 4, 1, '2019-07-10 17:57:55', NULL, 9, NULL),
(70, 4, 1, '2019-07-10 17:58:19', NULL, 9, 14),
(71, 4, 1, '2019-07-10 17:59:32', NULL, 9, NULL),
(72, 4, 1, '2019-07-10 18:00:20', NULL, 9, NULL),
(73, 4, 1, '2019-07-10 18:02:40', NULL, 9, NULL),
(74, 4, 1, '2019-07-10 18:04:40', NULL, 9, NULL),
(75, 4, 1, '2019-07-10 18:05:44', NULL, 9, NULL),
(76, 4, 1, '2019-07-10 18:05:51', NULL, 9, NULL),
(77, 4, 1, '2019-07-10 18:06:58', NULL, 9, NULL),
(78, 4, 1, '2019-07-10 18:07:38', NULL, 9, NULL),
(79, 4, 1, '2019-07-10 18:09:40', NULL, 9, NULL),
(80, 4, 1, '2019-07-10 18:10:46', NULL, 9, NULL),
(81, 4, 1, '2019-07-10 18:11:42', NULL, 9, NULL),
(82, 4, 1, '2019-07-10 18:16:17', NULL, 9, NULL),
(83, 4, 1, '2019-07-10 18:31:27', NULL, 9, NULL),
(84, 4, 1, '2019-07-10 18:32:16', NULL, 9, NULL),
(85, 4, 1, '2019-07-10 18:32:38', NULL, 9, NULL),
(86, 4, 1, '2019-07-10 18:32:45', NULL, 9, NULL),
(87, 4, 1, '2019-07-10 18:33:35', NULL, 9, NULL),
(88, 1, 0, '2019-08-28 10:42:56', NULL, 9, NULL),
(89, 1, 1, '2019-08-28 10:57:48', NULL, 10, NULL),
(90, 1, 1, '2019-08-28 10:58:44', NULL, 10, NULL),
(91, 4, 0, '2019-08-28 12:10:18', NULL, 9, NULL),
(92, 3, 0, '2019-08-28 12:46:06', 43, NULL, NULL),
(93, 2, 0, '2019-08-28 12:52:41', 43, NULL, NULL),
(94, 4, 0, '2019-08-31 03:53:58', NULL, 9, NULL),
(95, 4, 1, '2019-08-31 12:50:17', NULL, 10, NULL),
(96, 1, 1, '2019-07-09 03:13:21', 62, NULL, NULL),
(97, 1, 1, '2019-07-09 03:17:27', NULL, 9, NULL),
(98, 1, 1, '2019-07-09 03:20:27', 62, NULL, NULL),
(99, 1, 1, '2019-07-09 04:08:07', 43, NULL, NULL),
(100, 1, 1, '2019-07-09 04:09:03', 62, NULL, NULL),
(101, 4, 1, '2019-07-09 06:03:51', 62, NULL, NULL),
(102, 4, 1, '2019-07-09 06:12:24', 62, NULL, NULL),
(103, 4, 1, '2019-07-09 06:22:03', 62, NULL, NULL),
(104, 1, 1, '2019-07-09 12:24:51', 62, NULL, NULL),
(105, 2, 1, '2019-09-02 18:09:47', 28, NULL, NULL),
(106, 4, 0, '2019-09-03 10:59:39', NULL, 9, NULL),
(107, 4, 0, '2019-09-03 11:03:04', NULL, 9, NULL),
(108, 4, 0, '2019-09-03 11:03:14', NULL, 9, NULL),
(109, 4, 0, '2019-09-03 11:30:09', NULL, 9, NULL),
(110, 4, 0, '2019-09-03 11:33:04', NULL, 9, NULL),
(111, 4, 1, '2019-09-03 11:34:49', NULL, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cosmetic_material` text DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `payment_method` enum('cash','visa','wallet') NOT NULL,
  `schedule_session` timestamp NOT NULL DEFAULT current_timestamp(),
  `extra_comment` text DEFAULT NULL,
  `status` enum('waiting','accept','cancel') NOT NULL,
  `fees` int(11) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `users_id` int(11) NOT NULL,
  `providers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cosmetic_material`, `phone`, `payment_method`, `schedule_session`, `extra_comment`, `status`, `fees`, `total`, `created_at`, `users_id`, `providers_id`) VALUES
(14, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'accept', 10, 134.20000000000002, '2019-07-10 17:42:36', 62, 9),
(15, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 17:44:27', 62, 9),
(16, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 17:45:42', 43, 9),
(17, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'cancel', 10, 134.20000000000002, '2019-07-10 17:46:06', 43, 9),
(18, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 17:47:24', 43, 9),
(19, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 17:54:04', 43, 9),
(20, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'accept', 10, 134.20000000000002, '2019-07-10 17:54:44', 43, 9),
(21, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 17:55:04', 43, 9),
(22, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'cancel', 10, 134.20000000000002, '2019-07-10 17:56:09', 43, 9),
(23, 'Shampo', '01008292985', 'visa', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 17:57:55', 43, 9),
(24, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'accept', 10, 134.20000000000002, '2019-07-10 17:58:19', 43, 9),
(25, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'accept', 10, 134.20000000000002, '2019-07-10 17:59:32', 43, 9),
(26, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'cancel', 10, 134.20000000000002, '2019-07-10 18:00:20', 43, 9),
(27, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:02:40', 28, 9),
(28, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:04:40', 28, 9),
(29, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:05:44', 28, 9),
(30, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'cancel', 10, 134.20000000000002, '2019-07-10 18:05:51', 28, 9),
(31, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'accept', 10, 134.20000000000002, '2019-07-10 18:06:58', 28, 9),
(32, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:07:38', 28, 9),
(33, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:09:40', 28, 9),
(34, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:10:46', 28, 9),
(35, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:11:42', 28, 9),
(36, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:16:17', 28, 9),
(37, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:31:27', 28, 9),
(38, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:32:16', 28, 9),
(39, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:32:38', 28, 9),
(40, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:32:45', 28, 9),
(41, 'Shampo', '01008292985', 'wallet', '2019-07-02 16:54:22', 'test comment', 'waiting', 10, 134.20000000000002, '2019-07-10 18:33:35', 28, 9),
(42, 'Protien', '0129876543', 'cash', '1970-06-29 06:50:40', 'en', 'waiting', 10, 134.20000000000002, '2019-08-28 12:10:17', 55, 9),
(43, NULL, '+201144311409', 'cash', '2019-08-27 09:32:24', 'ssss', 'waiting', 10, 1342, '2019-08-31 03:53:58', 28, 9),
(44, NULL, '+201144311409', 'cash', '2019-12-01 11:49:51', 'mohamed', 'cancel', 10, 247.5, '2019-08-31 12:50:17', 28, 10),
(45, 'ityshd', '00201127445123', 'cash', '2019-10-03 08:25:17', NULL, 'waiting', 10, 2640, '2019-09-03 10:59:39', 62, 9),
(46, 'ityshd', '00201127445123', 'cash', '2019-10-03 08:25:17', NULL, 'waiting', 10, 264, '2019-09-03 11:03:04', 62, 9),
(47, 'ityshd', '00201127445123', 'cash', '2019-10-03 08:25:17', NULL, 'waiting', 10, 2640, '2019-09-03 11:03:14', 62, 9),
(48, 'itszti', '00201127552132', 'cash', '2019-10-02 21:30:04', NULL, 'waiting', 10, 1342, '2019-09-03 11:30:08', 62, 9),
(49, 'uddu', '00201127885195', 'cash', '2019-10-02 21:32:42', NULL, 'waiting', 10, 1320, '2019-09-03 11:33:04', 62, 9),
(50, 'urzutsufz', '00201127885195', 'cash', '2019-10-02 21:34:44', NULL, 'waiting', 10, 1507, '2019-09-03 11:34:49', 62, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders_services`
--

CREATE TABLE `orders_services` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `beauty_services_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_services`
--

INSERT INTO `orders_services` (`id`, `orders_id`, `beauty_services_id`, `price`, `created_at`) VALUES
(19, 14, 27, 1200, '2019-07-10 17:42:36'),
(20, 14, 28, 20, '2019-07-10 17:42:36'),
(21, 15, 27, 1200, '2019-07-10 17:44:27'),
(22, 15, 28, 20, '2019-07-10 17:44:27'),
(23, 16, 27, 1200, '2019-07-10 17:45:42'),
(24, 16, 28, 20, '2019-07-10 17:45:42'),
(25, 17, 27, 1200, '2019-07-10 17:46:06'),
(26, 17, 28, 20, '2019-07-10 17:46:06'),
(27, 18, 27, 1200, '2019-07-10 17:47:24'),
(28, 18, 28, 20, '2019-07-10 17:47:24'),
(29, 19, 27, 1200, '2019-07-10 17:54:04'),
(30, 19, 28, 20, '2019-07-10 17:54:04'),
(31, 20, 27, 1200, '2019-07-10 17:54:44'),
(32, 20, 28, 20, '2019-07-10 17:54:44'),
(33, 21, 27, 1200, '2019-07-10 17:55:04'),
(34, 21, 28, 20, '2019-07-10 17:55:04'),
(35, 22, 27, 1200, '2019-07-10 17:56:09'),
(36, 22, 28, 20, '2019-07-10 17:56:09'),
(37, 23, 27, 1200, '2019-07-10 17:57:55'),
(38, 23, 28, 20, '2019-07-10 17:57:55'),
(39, 24, 27, 1200, '2019-07-10 17:58:19'),
(40, 24, 28, 20, '2019-07-10 17:58:19'),
(41, 25, 27, 1200, '2019-07-10 17:59:32'),
(42, 25, 28, 20, '2019-07-10 17:59:32'),
(43, 26, 27, 1200, '2019-07-10 18:00:20'),
(44, 26, 28, 20, '2019-07-10 18:00:20'),
(45, 27, 27, 1200, '2019-07-10 18:02:40'),
(46, 27, 28, 20, '2019-07-10 18:02:40'),
(47, 28, 27, 1200, '2019-07-10 18:04:40'),
(48, 28, 28, 20, '2019-07-10 18:04:40'),
(49, 29, 27, 1200, '2019-07-10 18:05:44'),
(50, 29, 28, 20, '2019-07-10 18:05:44'),
(51, 30, 27, 1200, '2019-07-10 18:05:51'),
(52, 30, 28, 20, '2019-07-10 18:05:51'),
(53, 31, 27, 1200, '2019-07-10 18:06:58'),
(54, 31, 28, 20, '2019-07-10 18:06:58'),
(55, 32, 27, 1200, '2019-07-10 18:07:38'),
(56, 32, 28, 20, '2019-07-10 18:07:38'),
(57, 33, 27, 1200, '2019-07-10 18:09:40'),
(58, 33, 28, 20, '2019-07-10 18:09:40'),
(59, 34, 27, 1200, '2019-07-10 18:10:46'),
(60, 34, 28, 20, '2019-07-10 18:10:46'),
(61, 35, 27, 1200, '2019-07-10 18:11:42'),
(62, 35, 28, 20, '2019-07-10 18:11:42'),
(63, 36, 27, 1200, '2019-07-10 18:16:17'),
(64, 36, 28, 20, '2019-07-10 18:16:17'),
(65, 37, 27, 1200, '2019-07-10 18:31:27'),
(66, 37, 28, 20, '2019-07-10 18:31:27'),
(67, 38, 27, 1200, '2019-07-10 18:32:16'),
(68, 38, 28, 20, '2019-07-10 18:32:16'),
(69, 39, 27, 1200, '2019-07-10 18:32:38'),
(70, 39, 28, 20, '2019-07-10 18:32:38'),
(71, 40, 27, 1200, '2019-07-10 18:32:45'),
(72, 40, 28, 20, '2019-07-10 18:32:45'),
(73, 41, 27, 1200, '2019-07-10 18:33:35'),
(74, 41, 28, 20, '2019-07-10 18:33:35'),
(75, 42, 27, 1200, '2019-08-28 12:10:18'),
(76, 42, 28, 20, '2019-08-28 12:10:18'),
(77, 43, 28, 20, '2019-08-31 03:53:58'),
(78, 43, 27, 1200, '2019-08-31 03:53:58'),
(79, 44, 29, 150, '2019-08-31 12:50:17'),
(80, 44, 30, 75, '2019-08-31 12:50:17'),
(81, 45, 27, 1200, '2019-09-03 10:59:39'),
(82, 45, 27, 1200, '2019-09-03 10:59:39'),
(83, 46, 27, 1200, '2019-09-03 11:03:04'),
(84, 46, 27, 1200, '2019-09-03 11:03:04'),
(85, 47, 27, 1200, '2019-09-03 11:03:14'),
(86, 47, 27, 1200, '2019-09-03 11:03:14'),
(87, 48, 27, 1200, '2019-09-03 11:30:09'),
(88, 48, 28, 20, '2019-09-03 11:30:09'),
(89, 49, 27, 1200, '2019-09-03 11:33:04'),
(90, 50, 27, 1200, '2019-09-03 11:34:49'),
(91, 50, 28, 20, '2019-09-03 11:34:49'),
(92, 50, 29, 150, '2019-09-03 11:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` enum('ar','en') NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `api_token` varchar(255) NOT NULL,
  `firebase_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `email`, `phone`, `password`, `is_verified`, `is_active`, `created_at`, `language`, `balance`, `api_token`, `firebase_token`) VALUES
(9, 'pop', 'providerone@magdsoft.com', '01008292989', '$2y$10$b8q5A2JrAIcifXh2sRZaTOBpZJCpttqUKfH/PxQfosy3e4EBiTerK', 0, 1, '2019-07-09 01:05:34', 'ar', 377.36, 'tKNKAOeS3lSAlN2GphzbIVZwLYKlhgAq1AvlQl1VFmjVxRsqGoL88XCAyKMKUg5LXFk5A', 'tKNKAOeS3lSAlN2GphzbIVZwLYKlhgAq1AvlQl1VFmjVxRsqGoL88XCAyKMKUg5LXFk5A'),
(10, 'MyProvider', 'providerislisenting@properies.com', '01008292999', '$2y$10$/Qg2CiIpayFDvU2YQ1Y8OOjBMqAjfLYaa7ajE5G3MSZU8RnbNRkoy', 0, 1, '2019-07-09 01:07:24', 'ar', 0, '5qItq4lTQTGJd1olrJEeZ3dIywSOzreon8RlIolxeGSkB7cnx6jwsdQSeBYUJkmjFwxq8', NULL),
(11, 'test provider', 'providerthree@magdsoft.com', '01008292980', '$2y$10$f9BEm3p5glLhKlpTbL4O5.Fxqn9rUgJ..tqYbRAevfFpRu6FucpRK', 1, 1, '2019-08-28 08:26:23', 'en', 0, 'cEk9yC34U4wywdxxNk9NBQpBoQ46RkgywLaLsZGoyt9DIX9VfJvbUTSD7Qpx2staaAPqB', NULL),
(12, 'test provider', 'providerthree @magdsoft.com', '010082929800', '$2y$10$neB3bytEsManXlkOIhXMi.d4pzDF9r5891wUwiug26L2wouAqkwua', 1, 1, '2019-08-28 08:28:09', 'en', 0, 'PXyPpS6hvrLVgIX0iANYXRwGTgSzb1pStfrguS6cqidKAu6WbLqWCj4vwvOO9kLcJwslT', NULL),
(13, 'test provider', 'providerthree  @magdsoft.com', '0100829298', '$2y$10$3xl9Ebuk3CNJ6OzhP90pjeOW8im82O9T02MV69ns8yip3v8hqnTYq', 1, 1, '2019-08-28 08:29:22', 'en', 0, 'JYGLH6vVOE5Pz2AsKuWJaIPU3dM4nJthD5xOzfaYDctsZMRv63eQ7CVtuistSzjPaebiY', NULL),
(14, 'Mohamed', 'mohamed@yahoo.com', '01008293337', '$2y$10$4kdPvCj8/l9EH/TrlycUJusbThMzR0k3P7YEwTkOj2WAWLrJjSRJm', 0, 1, '2019-08-31 04:20:04', 'en', 0, 'AoDl1VUF5xBfuhUv5azyktek5bbmSkB3h6KiUHl3dZ0Qhd94z3XtmrVAf2tkut6ty3I0o', NULL),
(15, 'mustafa yahia', 'mustafa@gmail.com', '00201127885295', '$2y$10$PYDx7iQEQY7vTYK0TGUHgOHw5pMafpQgdjxt7Ic8wvaoKk6khbg6C', 0, 1, '2019-09-02 12:19:01', 'ar', 0, 'cun9y82gz27X6ZQc6m3odda6imbFk1tSRFbO9Kyr8cqafLIFniUrudkWcersujjgChObU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `beauty_center_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `beauty_center_id`, `users_id`, `rate`, `comment`, `created_at`) VALUES
(1, 16, 28, 1, 'test comment', '2019-07-09 12:24:51'),
(2, 16, 28, 1, 'test comment', '2019-07-09 12:24:54'),
(3, 17, 28, 4, 'test comment', '2019-07-09 12:24:54'),
(5, 16, 55, 1, NULL, '2019-08-28 10:42:56'),
(6, 17, 55, 50, NULL, '2019-08-28 10:57:48'),
(7, 17, 55, 50, 'not', '2019-08-28 10:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `code` varchar(6) DEFAULT NULL,
  `tmp_token` varchar(255) DEFAULT NULL,
  `tmp_phone` varchar(45) DEFAULT NULL,
  `tmp_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `users_id` int(11) DEFAULT NULL,
  `providers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `code`, `tmp_token`, `tmp_phone`, `tmp_email`, `created_at`, `users_id`, `providers_id`) VALUES
(45, '123456', NULL, '01008292989', NULL, '2019-07-09 01:05:35', NULL, 9),
(55, '123456', NULL, '+201144311422', NULL, '2019-07-31 16:49:17', 35, NULL),
(56, '123456', NULL, '+201144311411', NULL, '2019-07-31 17:37:10', 36, NULL),
(57, '123456', NULL, '+201144311425', NULL, '2019-07-31 18:32:53', 37, NULL),
(58, '123456', NULL, '+201234567231', NULL, '2019-07-31 18:34:40', 38, NULL),
(64, '123456', 'VOyf1UBjyDC19j1hIb2vGd6o5cyrEq08FxUJRMjGJq4gp2cSFEeqG345XJLEiqbyf7cTW', NULL, NULL, '2019-08-03 11:06:34', 43, NULL),
(65, '123456', 'thXLy49Do5canGsVBOdveYeoifflVnlTcY1KyfsrTIaNmfMEp7xTN2FwSzeWtXocWl9Ob', NULL, NULL, '2019-08-03 11:35:38', 43, NULL),
(66, '123456', 'AyrHucZRtEUS5yRQYqgwDO1n9n8s26V94vcKoeKozzeBzc7Jl7uC8aw7XF4j4E0IUX25d', NULL, NULL, '2019-08-03 11:38:05', 43, NULL),
(67, '123456', 'CZ9QbuCwYn8hVG343rIQ7CENxrAm3o618jJnJLSb1MKqQnz9Eofff6gUtD182TTg4Pngd', NULL, NULL, '2019-08-03 11:38:59', 43, NULL),
(68, '123456', '7fHJ7kCLvy1g1fmuih45zvoEXn8sU9ljeNcLAlGyff3IJLSBNgwN9DsKMaXx0F37fyPNJ', NULL, NULL, '2019-08-03 11:42:14', 43, NULL),
(69, '123456', '7OzSlvCprPWzP8d1SR3Mn8zU00UzRUNFeh2hvJB8KsNwgMiysxHNXIQE3snfjHID7adgZ', NULL, NULL, '2019-08-03 11:45:21', 43, NULL),
(71, '123456', NULL, '01127885195', NULL, '2019-08-24 12:47:23', 44, NULL),
(72, '123456', NULL, '01127885194', NULL, '2019-08-25 11:29:54', 45, NULL),
(74, '123456', NULL, '01127885190', NULL, '2019-08-25 11:51:56', 47, NULL),
(75, '123456', NULL, '02001127885195', NULL, '2019-08-25 12:59:58', 48, NULL),
(76, '123456', NULL, '12301127885195', NULL, '2019-08-25 13:03:27', 49, NULL),
(77, '123456', NULL, '02001127885191', NULL, '2019-08-25 13:16:17', 50, NULL),
(78, '123456', NULL, '02001127885196', NULL, '2019-08-25 13:27:36', 51, NULL),
(82, '239216', 'eTbV50uN7FiAc5wwr4KTHBkXhxAifnX8skbYOr0L5lmSSm2Kc595DamT7juYmPA1lnRAl', NULL, NULL, '2019-08-25 16:53:36', 54, NULL),
(83, '123456', 'RXKJMiQ4mQWOIwPWIYPjGSp5kMIZKXPAywLYmWM2T0eB2B87klcOVNxhkgNyHHNH7F6B6', NULL, NULL, '2019-08-25 15:11:03', 54, NULL),
(86, '123456', '1jROTE15ypcaWDXikt6YrjV08U89AhbnEt7UFChlizCeSDpDfGppYJWossFqu1YEg1WES', NULL, NULL, '2019-08-25 16:02:48', 54, NULL),
(87, '123456', 'wU7pT8hm0hrR31RMkKXJtVMRW8UR7LgIrmITwBFUxfYVRZd7mLssOnMrJGfM1jaxp2MpP', NULL, NULL, '2019-08-25 16:14:07', 54, NULL),
(88, '123456', 'EtWIpQfXrhLj3SMjNTSpH5RQBZt7h57OtxMbLcMmObJlgMzrdmATU2IqAVnnegpouoPIQ', NULL, NULL, '2019-08-25 16:16:30', 54, NULL),
(89, '123456', 'ZAIF7XaCyEHQiejZEW1jgOTyP3Om1Mr9J0z87YH9apDCNKGfjH7d3GjGjbmFefbPQ44NR', NULL, NULL, '2019-08-25 16:32:33', 54, NULL),
(90, '123456', 'EhQO6oeeuFHIkewN3kro81BLbc3cPJmxNUE3MaL8kL9S8JDTknEkV5lPrur2skUTtNNTl', NULL, NULL, '2019-08-25 16:33:50', 54, NULL),
(91, '123456', 't7H38b4s56ba0gZvTHR7BQ9Yr8gEGrKGA9IEEyYBqsjipvpkD1oTdlHJsS2H0pECVVYxT', NULL, NULL, '2019-08-25 16:33:55', 54, NULL),
(92, '123456', 'DGCNL1itkxKWX3C72UQrNpOm6qDr1bFDWdrouH3lf4BITOZLJJboTC2yNEhIi4UGq5Otw', NULL, NULL, '2019-08-25 16:34:09', 54, NULL),
(93, '123456', 'NMorzaA5dPZtQO1RuR6zxhcNQlJ4YFiB1uTjXhvnAnzQCDEa0JQbkRZpSNb51gqwXvKov', NULL, NULL, '2019-08-25 16:35:03', 54, NULL),
(94, '123456', 'zkwv9hfKwddS1zWSuuwJXd9HP0sDb3qZIxtrLYq16QkQdsDrxwMMzaiOHg3zTCo4FPgxm', NULL, NULL, '2019-08-25 16:36:18', 54, NULL),
(95, '123456', 'qkHjzLa229IzhM1ecUZwJlbHPgKY3NlvBEKWSdgNkO3HQNZOziutYiPzgL75GNE70211S', NULL, NULL, '2019-08-25 16:46:56', 54, NULL),
(96, '123456', 'AVQzYn373xn9xgdaEqUqO7EKijZ6u0WT5HsSOXQqoFZysnqaz6XgjVwx5xyaSFG6rreaa', NULL, NULL, '2019-08-25 16:51:26', 54, NULL),
(103, '123456', NULL, '010082923333', NULL, '2019-08-31 04:16:43', 56, NULL),
(104, '123456', NULL, '01008293337', NULL, '2019-08-31 04:20:04', NULL, 14),
(107, '123456', 'ejtbPucQlCcRt2bmJSQR6OeQ4VQSjJi1e0gi9NRv8kNm2Pct55y1xvGemTSPDHV4AbxMC', NULL, NULL, '2019-08-31 12:55:27', 43, NULL),
(108, '123456', 'dVfwTf6SC0cdqIS6IZ09bL9JtM4RJMsPgUcGppAXAY836IzAi7AUMMCByREZsv7JoKq4T', NULL, NULL, '2019-08-31 12:56:52', 43, NULL),
(109, '123456', 'tPwAeUuWw58uEQlwxE8Nf247sLEBo98foFtIxVvkkiAvFryPp89afuBdG9n5UOgfwqnaM', NULL, NULL, '2019-08-31 12:57:15', 43, NULL),
(110, '123456', 'pnGVtfeL2SEd0qqBGXPkCwI2mXu4hiUhKbfzP8HPWGxxFRunKm1bB3fBHyxRhfptndktv', NULL, NULL, '2019-08-31 12:59:15', 43, NULL),
(112, '123456', NULL, '00201127885197', NULL, '2019-08-31 16:24:05', 59, NULL),
(113, '123456', NULL, '00201127885194', NULL, '2019-08-31 16:24:23', 60, NULL),
(121, '123456', NULL, '00201127885295', NULL, '2019-09-02 12:19:01', NULL, 15),
(122, '123456', NULL, '00201144553689', NULL, '2019-09-03 13:28:26', 62, NULL),
(123, '123456', NULL, '00201127884632', NULL, '2019-09-03 13:33:30', 62, NULL),
(124, '123456', NULL, '00201127441235', NULL, '2019-09-03 14:05:57', 62, NULL),
(125, '123456', NULL, '00201127885188', NULL, '2019-09-03 14:07:25', 62, NULL),
(126, '123456', NULL, '00201193416348', NULL, '2019-09-03 14:46:15', 62, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `used_code`
--

CREATE TABLE `used_code` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `discount_code_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `used_code`
--

INSERT INTO `used_code` (`id`, `users_id`, `discount_code_id`, `orders_id`, `created_at`) VALUES
(6, 28, 1, 41, '2019-07-10 18:33:35'),
(7, 55, 1, 42, '2019-08-28 12:10:18'),
(8, 62, 1, 46, '2019-09-03 11:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` enum('ar','en') NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `api_token` varchar(255) NOT NULL,
  `firebase_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `phone`, `password`, `is_verified`, `is_active`, `created_at`, `language`, `balance`, `api_token`, `firebase_token`) VALUES
(28, '/uploads/user/user_1567410453_O6eoXdpWNt.png', 'pop', 'islamShaban@gmail.com', '0100829298777', '$2y$10$SEqgELMtno0PP7u/PMjhGeXmzNmGo59fM1wRG8B02zG/eYQLI2lOG', 1, 1, '2019-07-09 00:34:06', 'ar', 5000, 'ftrScgXwfHQDcyOV5zzTlSiz3qhPA5kLNH9LAwQ79yIBq7NnIzYKosSe01iRoqySHZ46P', NULL),
(29, NULL, 'Khaled Fathy', NULL, '01008292986', '$2y$10$YRXsACw2SCzmAhgbCjQ8IuUULkJtUrlua4fOc3vvqdDzCy07s70bm', 1, 1, '2019-07-09 00:38:22', 'en', 0, 'TLLpVPdNouA33xkQhY8fPGG8K1QniSUAEukOvrbJICohPS2Zg7eYqHzaLN4aXGFMPu0IK', NULL),
(30, '/uploads/user/user_1562629284_Q1C97gKGHb.jpeg', 'Aymen Fathy', 'aymenfathy@magdsoft.com', '01008292987', '$2y$10$jK1RA0uQVovg.p7rZ8oJd.EbUt0yU5mhNDh3S0vPqmJ80WGhg7eg6', 1, 1, '2019-07-09 00:41:24', 'en', 0, 'vjC1QxXOZSIkP9ojrG70jN9zDfKWgcy9yHZGNIwIdif2LASFDDyxSOPwDvYZ61CN67KqO', NULL),
(31, '/uploads/user/user_1562629314_I5PMqrC8lW.jpeg', 'Osama Fathy', 'osamafathy@magdsoft.com', '01008292988', '$2y$10$M42SKALrAaRrFb0UkVZEp.lcDRS61oP3yroBifP8IW5rGwKbdr.ka', 1, 1, '2019-07-09 00:41:54', 'ar', 0, 'bMNtgf1QtCpJ5GxfKnrgyOTqZ88vDk0eydr78pjgVwbURTnOVsBckHi1r5tnbZKDOevpX', NULL),
(32, '/uploads/user/user_1562637268_Nno2lRsgth.jpeg', 'Osama Osama', 'osamaosamad@magdsoft.com', '01008292666', '$2y$10$6GIotVmH0eCh/O5LX2pQkePpAX5fHsDQeHjZwbzuRY7NqI8cdoU/i', 0, 1, '2019-07-09 02:54:29', 'en', 0, 'Dyt4z12YHZsQdat3TUt8eUCqWZIFkow0sBD5fEQc7e9bpgX5VmlNMaMVaQb0TyJGNkqu0', NULL),
(33, '/uploads/user/user_1562637360_4UfjCeih6s.jpeg', 'Osama Osama', 'osamaosama@magdsoft.com', '01008292444', '$2y$10$eVCsztt29pzrPiAjr51tleDO906bWRK1zXoqg0bww8dqjqYqTEuzG', 0, 1, '2019-07-09 02:56:00', 'en', 0, 'krzb9MVBMx60h7kf9LLzRDpATmlboGx9pzWGDC7SGYMHYv6BN8A05LWR3ob6WjDJy1ZVP', NULL),
(34, '/uploads/user/user_1562637536_RBIjTSJf5u.jpeg', 'Osama Osama', 'osamaAhmed@magdsoft.com', '01008292555', '$2y$10$eLugPNWHxL9MhAptBoKXIu7jgwGKDLZKlofSwPSt9Nkkuy.dcwsee', 1, 1, '2019-07-09 02:58:56', 'en', 0, 'rxjzCIhN4unWs6HC1Pg3ps7JdTwEDL59wsxjXB1wJUrolBhN2OHhFYiHeWKSDDH5ZjFn7', NULL),
(35, NULL, 'adsfdsfs', NULL, '+201144311422', '$2y$10$5FnQh0yeb4esEKR4xLXQ/e197.f6GR3bFh2.pq/Vovd2bj6zPWRlq', 0, 1, '2019-07-31 16:49:17', 'en', 0, 'LMQk92KMc2VIpZWWgiLESMUoxOcWN4qkG3CM7KuL5z4IFDddD72DKdG6ZaMM5dAFzADuv', NULL),
(36, NULL, 'mkfdasmfdsa', NULL, '+201144311411', '$2y$10$U4JMoqlC7JNvSQQ7TXeEV.EvKJZka86rc51J57rHBhluxNSw0J.kS', 0, 1, '2019-07-31 17:37:10', 'en', 0, '7yl13Lt7yYT1rUWdp3M69MBdpMNqVmpVKXsCW1g7n0jUACIuQbtdtDyZMW4Z0YmrQ4uMw', NULL),
(37, NULL, 'mohamed', NULL, '+201144311425', '$2y$10$YQollcoxib9F/scW.TCPcO4A7argTICM086T3lDrwTLQ5Vdjr0eSy', 0, 1, '2019-07-31 18:32:53', 'en', 0, '5uQrpPqpZ8SniwK48uS2n499kHiSkRAXOjNLnOtXst9KmcSuG4mIKKS190qnkMAtdQ7rA', NULL),
(38, NULL, 'kjfds', NULL, '+201234567231', '$2y$10$ZphOFfxkMgWEI.fksxp1q.bGC2.YmAW1hh8qv8m.gh5MrD9FiKA7.', 0, 1, '2019-07-31 18:34:40', 'en', 0, 'v0oVIyejh8faIaAFml4TOgIU8ryjXQ0CxAFTiWe5cNqihn6zOfloEHTH35vRqNCK0b3uq', NULL),
(39, NULL, 'maflfa', NULL, '+201234567892', '$2y$10$dth2ENf3iZPNnrxiwAIziusfoQQwLbwbzD/q9Vf.IMMCjsvUiJ9Z6', 1, 1, '2019-07-31 18:42:18', 'en', 0, '6fPMN6ITDbt0NqZYtZulZufVDSCFjOUojYdpcU2xmnNkYxquKQ1M6FQdXgGhXn0csGX9s', NULL),
(40, NULL, 'fdas', NULL, '+201123123131', '$2y$10$.jZuEEXtSnhrkaw3Xd4oUeIvPajdzJJeRJGxMjbaOA1txoYMvS.Tq', 1, 1, '2019-07-31 18:45:10', 'en', 0, 'JDIpTNBn5f9c3Pohu45Fj5fN31TlPNy8b0DWSvVeTilIRlKqFNGEPJYhryquPmGC33GbE', NULL),
(41, NULL, 'dksnalsa', NULL, '+201221412414', '$2y$10$7opEW4Ly4JIayUWt2iCvyOBU3pTnmUn85OEaNL7uf8A6PsK7NKGOW', 1, 1, '2019-07-31 19:01:02', 'en', 0, 'JD661F0JaJP9Ki2hPeZRMMhReFnJlvQjDhDhYeSWq4yeDtUBrvdP3NSuLRh0rdJ91tdB0', NULL),
(42, NULL, 'mohamedmontser', NULL, '+201133221341', '$2y$10$MTnYw9PSSBEqr.LHHxn9Du40Xj6erD1wAU9dDTUchwfgm3gC6odAm', 1, 1, '2019-08-03 10:43:22', 'en', 0, 'oFftTrNP1OfREejVdy4lfYIqq0qMf020hGMSghIi9t7KtmCNia7ZWN0INNmcwuiISkYTv', NULL),
(43, NULL, 'knfdzsetxrrc', 'mohamedmontser12@magdsoft.com', '+201144311409', '$2y$10$DBfTd071F9bTEX/Y7tfo.OfLSXf.bFqqLsEvWdcVVMdAhMsmhaAe6', 1, 1, '2019-08-03 11:05:37', 'en', 84.21999999999998, 'cCQHXAmV8uPTeUETeSXBpvaqoTp4kwk6sA3fnHa54a0JDoOzZwXBcs3FhodrcWZxfgPN8', NULL),
(44, NULL, 'mahmoud', 'mohamed.yahia111m@gmail.com', '01127885195', '$2y$10$vOFgJimTequvtoIeVNnzSOuyP.vNM3RXnBBKxe.Iw9yt9W3EhSKmu', 0, 1, '2019-08-24 12:47:23', 'ar', 0, 'G2DNxKiOlCSFT1SabKnswlsPmIx2BXDBmfU9ujyFLonpb5Ui7ABRbFwFeKhJmiep9lnR7', NULL),
(45, NULL, 'mmmmm', 'mmmm@gmail.com', '01127885194', '$2y$10$74EYTQFMbRos.qCUkIxov.Nnkyf.XuHh4.ZcUypUghFEyKRa56n1S', 0, 1, '2019-08-25 11:29:54', 'en', 0, 'DtWzqBpHeqK3w0PqnLAGuVQQcQzPVkglDF0GxUqeUIH5B99RsV9DQsxHWMxDBsG6LcOgK', NULL),
(46, NULL, 'mmmmm', 'mmmfm@gmail.com', '02001127785194', '$2y$10$Rff6QKs4hkvAHRVP6mOm8OpxdHxsFvo7DzYHisfcCuFinL3U73XzS', 0, 1, '2019-08-25 11:39:29', 'en', 0, 'HrVl0kzK0D51w0Qu0TBBV4jRkaqkUBJeEXQDFjGOxR4j1GdX6NxDWDy7ny8YZNeO2H7Dd', NULL),
(47, NULL, 'mohamed', 'user1@admin.com', '01127885190', '$2y$10$/VxMefIrgG9qZmMIiHPefuU7ZZP8ACxaBkIQZXCleqqJF1GxoWwca', 0, 1, '2019-08-25 11:51:56', 'en', 0, 'fEYrloN3wtB07YpJTQ3b3dOSApGYlqpTUfkvoUgICsvspJnQSxbDlIraXFBRIotcHrTvW', NULL),
(48, NULL, 'Mohamed yahia mahmoud', 'user@admin.com', '02001127885195', '$2y$10$StjNv7mUesUcfJYHyVgQt.Oyd5RoRrkJO96BA.gctI/B8owCWYMIe', 0, 1, '2019-08-25 12:59:58', 'en', 0, '6S33qEifu1UkmJcdTnFTx4BZCII46qcDtmaXe8NHNYzyE57pqTjo5CNWor2Kb8W9HETNo', NULL),
(49, NULL, 'Mohamed yahia mahmoud', 'user11@admin.com', '12301127885195', '$2y$10$ybuaW.n/1fHOG64NsjnqpOAo6c77fiRml2lOGNx1UFS/dLAbtLyFa', 0, 1, '2019-08-25 13:03:27', 'en', 0, 'HexdrDDmVLEoDpIaavWERNvp9YWQpayqoeLPjxix6oPFGOueurFMF3oTIzbh3mM9RPiYj', NULL),
(50, NULL, 'Mohamed yahia mahmoud', 'mohamed@admin.com', '02001127885191', '$2y$10$NMfwnNWRNOjpnP7mcIPJ3.Jw/CLVxIPk1OdTlV1X5zmijh7LgogRe', 0, 1, '2019-08-25 13:16:17', 'en', 0, 'yhIktO6dI5p5jFSYum6702mloVqnp0GmkDaNdo1fTakmI94rwzOQgNhMnsqAC5ebmQOuq', NULL),
(51, NULL, 'Mohamed yahia mahmoud', 'mohamed@gyg.com', '02001127885196', '$2y$10$lRoojO2u2iofiepHExGaRepr6XhLOAGXWKYHlDjbrqsJ9WUZAI1wi', 0, 1, '2019-08-25 13:27:36', 'en', 0, 'jXsuGVx2ZXCMBMA44xHgiOspWxvoBlEBA0uh8gKb5PJoizLyAlMev7cZ3wG8eaIPAk1Sq', NULL),
(52, NULL, 'Mohamed yahia mahmoud', 'user6@admin.com', '02001111046143', '$2y$10$jZizuQymJLbJiMQjC1inYe.e1z2LZcFiUBMmnkyc33VSOMOp737Ju', 1, 1, '2019-08-25 13:31:04', 'en', 0, 'jN3nnW4zrgneiywbtrVojBJaismrCtbehmTlA09aAcTMkk7nHHPMNMjJSOP6g3c6EbZVX', NULL),
(53, NULL, 'Mohamed yahia mahmoud', 'user7@admin.com', '02001127885199', '$2y$10$KsO.cVtrZ11razFxPkN51.Ol6qG3XurKLa63W7O3P7MF6uQo3.os.', 1, 1, '2019-08-25 13:34:06', 'en', 0, 'pWPHasN2fHPWIFS3gvNr8lbXLyTqWUT51IR9ylxYCOqBybolTqRTg5G2S8F5QvAWGQdbl', NULL),
(54, NULL, 'Mohamed yahia mahmoud', 'usery@admin.com', '00201127885195', '$2y$10$wGW3gW/i6/UjBVmx6KnifeqVPIvzE1aqhw.66Sc.S7bdaUvMDNpXm', 1, 1, '2019-08-25 14:17:53', 'en', 0, 'HiXiwmdfRB2GYqylSVkGDVwh5Dio9zt3zQy7ts4oLfQGZVbZZVVZDBddFNCJWpW1rf6c8', NULL),
(55, NULL, 'mohamed9999', 'mohamed5@gmail.com', '02001127885190', '$2y$10$4zS49zzFcrLszZvrziJF0./Vb1hbx/g9rnK0EbmXBp1QFF0oL1jvO', 1, 1, '2019-08-27 11:31:46', 'en', 0, 'NWv2oKEHLNxL5XpO8xEW7TaWDyexW9jehJ8rQyfG4zy9e7oReHV0S2KuvEZ5UNdhsaQXJ', NULL),
(56, '/uploads/user/user_1567221403_Tj5TjwV2yW.png', 'User', 'userthree@magdsoft.com', '010082923333', '$2y$10$WB2.VuwDzk.8rCF/FH32EuNhHl/TXIP80EOt9LQhy6GfF8XytT5jm', 0, 1, '2019-08-31 04:16:43', 'en', 0, 'YQSSuFeKzZ7Er9CiktsDbKOPAQMzgaKjWyJ9O9ctPykg2LsLz6V5LPduVsb2oJrC0J7ja', NULL),
(57, NULL, 'Mohamed', NULL, '+201144311404', '$2y$10$0QwO0vzucsQxl2HDUAk19OhlkoRAJYRIhM0MrSSh4xLYsAZqt8VbG', 1, 1, '2019-08-31 12:26:10', 'en', 0, 'TRhzxtHxotiF7ycNhFQE4BYz1ycxBP9HOkDAgla5iMy1ltgc0jgyCtWVkk5lXqVqJLMYP', NULL),
(58, NULL, 'mohamed', NULL, '+201144311403', '$2y$10$aLB/m7z8JIJzphUEvfJcC.QaDZv82luBawktbQ.qhELW3RtPm5iku', 1, 1, '2019-08-31 12:32:14', 'en', 0, 'xVKB11dlh87Y2oRfvpDrPphXKhhiWXd47euGh0MuefG9Y0nYOEiomWUgNQcbHp5V4CF5c', NULL),
(59, NULL, 'mohamed@gmail.com', NULL, '00201127885197', '$2y$10$DiGHqioTWkfPqgnlRS/.HOM1uH4kFrin6fqjwwKhKHojvsdvQEHUO', 0, 1, '2019-08-31 16:24:05', 'en', 0, 'jRIOwkA0zQNzGHGuRmZ8UGRSiHcGYsHtPv9Ba54w9v4dR4ncl98fWWbJkgs9hVbYyhU1u', NULL),
(60, '/uploads/user/user_1567265063_dejf8UDCJN.jpeg', 'mohamed@gmail.com', NULL, '00201127885194', '$2y$10$qZ5BuZU68z.M6cnJrpyDu.IUglGAHZAoeXalbu58f5M0A1FJZMMta', 0, 1, '2019-08-31 16:24:23', 'en', 0, 'YKgu4kkSzhHDLpCFrwve0C6hPPm7EhjJlgiBF1CoKJXeMUOv59CZMQGuHP7Y7H3j9sARr', NULL),
(61, '/uploads/user/user_1567266733_HzwHrieuQl.jpeg', 'Mohamed yahia', 'mohamed_yahia111m@gmail.com', '02001093416348', '$2y$10$6iNqnb4yu4opIqkF2txzD.G6iCsj0w4KIK4l52iTpdsV2wtX7t80K', 1, 1, '2019-08-31 16:52:13', 'en', 0, '3AUQQij0ZOfl4Pzpc0gw0da9JkTEeKKbpqkP3SyTNJigBFTh2cNePakoWwfZyH6ukyS20', 'dDSz21v3HZo:APA91bHqAFT6IrPG_BaeyPP2my57YbT0iLjrVqfjVKECanHoMYhNNypNMt1JLmSdlYzikga4_OjUrFllA5MeQMUevOu_1G81SXV86rfSvha1GTYlIFvF_jXLFMS0u5wg0-J_RdtiGoKh'),
(62, '/uploads/user/user_1567518375_pJuApmwmMf.jpeg', 'hoodaaaaaa', 'mohamed98@gmail.com', '00201128661677', '$2y$12$BKhQI8wlOMSgBnSre1FP9uuMLrZXm1pgEQoJFutAJ71ca7dH/B/CS', 1, 1, '2019-09-01 16:38:06', 'en', 0, '7NCVBoM7Ed64JsDTqMbrlkwtu2GvPEYYFzaqdGUR5YKW3PxsbBPAYX3EjibPFmD6M6WaT', 'dDSz21v3HZo:APA91bHqAFT6IrPG_BaeyPP2my57YbT0iLjrVqfjVKECanHoMYhNNypNMt1JLmSdlYzikga4_OjUrFllA5MeQMUevOu_1G81SXV86rfSvha1GTYlIFvF_jXLFMS0u5wg0-J_RdtiGoKh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `app_emails`
--
ALTER TABLE `app_emails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `app_phones`
--
ALTER TABLE `app_phones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `balance_recharge`
--
ALTER TABLE `balance_recharge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_balance_recharge_users1_idx` (`users_id`),
  ADD KEY `fk_balance_recharge_providers1_idx` (`providers_id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `beauty_centers`
--
ALTER TABLE `beauty_centers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_beauty_centers_shop_levels1_idx` (`beauty_center_level_id`),
  ADD KEY `fk_beauty_centers_categories1_idx` (`categories_id`),
  ADD KEY `providers_id` (`providers_id`);

--
-- Indexes for table `beauty_center_levels`
--
ALTER TABLE `beauty_center_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `beauty_images`
--
ALTER TABLE `beauty_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_beauty_images_beauty_centers1_idx` (`beauty_centers_id`);

--
-- Indexes for table `beauty_phone`
--
ALTER TABLE `beauty_phone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_beauty_phone_beauty_centers1_idx` (`beauty_centers_id`);

--
-- Indexes for table `beauty_services`
--
ALTER TABLE `beauty_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_beauty_services_beauty_centers1_idx` (`beauty_centers_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_contacts_users1_idx` (`users_id`),
  ADD KEY `fk_contacts_providers1_idx` (`providers_id`);

--
-- Indexes for table `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_users_has_beauty_centers_beauty_centers1_idx` (`beauty_centers_id`),
  ADD KEY `fk_users_has_beauty_centers_users1_idx` (`users_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `beauty_center_id` (`beauty_center_id`),
  ADD KEY `order_main_id` (`order_main_id`),
  ADD KEY `order_secondary_id` (`order_secondary_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `notify_users`
--
ALTER TABLE `notify_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_notify_users_notifications1_idx` (`notifications_id`),
  ADD KEY `fk_notify_users_users1_idx` (`users_id`),
  ADD KEY `fk_notify_users_providers1_idx` (`providers_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `providers_id` (`providers_id`);

--
-- Indexes for table `orders_services`
--
ALTER TABLE `orders_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_orders_has_beauty_services_beauty_services1_idx` (`beauty_services_id`),
  ADD KEY `fk_orders_has_beauty_services_orders1_idx` (`orders_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `beauty_center_id` (`beauty_center_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_sessions_users_idx` (`users_id`),
  ADD KEY `fk_sessions_providers1_idx` (`providers_id`);

--
-- Indexes for table `used_code`
--
ALTER TABLE `used_code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_users_has_discount_code_discount_code1_idx` (`discount_code_id`),
  ADD KEY `fk_users_has_discount_code_users1_idx` (`users_id`),
  ADD KEY `fk_used_code_orders1_idx` (`orders_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_emails`
--
ALTER TABLE `app_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_phones`
--
ALTER TABLE `app_phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balance_recharge`
--
ALTER TABLE `balance_recharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beauty_centers`
--
ALTER TABLE `beauty_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `beauty_center_levels`
--
ALTER TABLE `beauty_center_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beauty_images`
--
ALTER TABLE `beauty_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `beauty_phone`
--
ALTER TABLE `beauty_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `beauty_services`
--
ALTER TABLE `beauty_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notify_users`
--
ALTER TABLE `notify_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders_services`
--
ALTER TABLE `orders_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `used_code`
--
ALTER TABLE `used_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balance_recharge`
--
ALTER TABLE `balance_recharge`
  ADD CONSTRAINT `fk_balance_recharge_providers1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_balance_recharge_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `beauty_centers`
--
ALTER TABLE `beauty_centers`
  ADD CONSTRAINT `beauty_centers_ibfk_1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_beauty_centers_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_beauty_centers_shop_levels1` FOREIGN KEY (`beauty_center_level_id`) REFERENCES `beauty_center_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beauty_images`
--
ALTER TABLE `beauty_images`
  ADD CONSTRAINT `fk_beauty_images_beauty_centers1` FOREIGN KEY (`beauty_centers_id`) REFERENCES `beauty_centers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `beauty_phone`
--
ALTER TABLE `beauty_phone`
  ADD CONSTRAINT `fk_beauty_phone_beauty_centers1` FOREIGN KEY (`beauty_centers_id`) REFERENCES `beauty_centers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `beauty_services`
--
ALTER TABLE `beauty_services`
  ADD CONSTRAINT `fk_beauty_services_beauty_centers1` FOREIGN KEY (`beauty_centers_id`) REFERENCES `beauty_centers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_contacts_providers1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contacts_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_users_has_beauty_centers_beauty_centers1` FOREIGN KEY (`beauty_centers_id`) REFERENCES `beauty_centers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_beauty_centers_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`beauty_center_id`) REFERENCES `beauty_centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`order_main_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `locations_ibfk_3` FOREIGN KEY (`order_secondary_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notify_users`
--
ALTER TABLE `notify_users`
  ADD CONSTRAINT `fk_notify_users_notifications1` FOREIGN KEY (`notifications_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notify_users_providers1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notify_users_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notify_users_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_services`
--
ALTER TABLE `orders_services`
  ADD CONSTRAINT `fk_orders_has_beauty_services_beauty_services1` FOREIGN KEY (`beauty_services_id`) REFERENCES `beauty_services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_has_beauty_services_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`beauty_center_id`) REFERENCES `beauty_centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_sessions_providers1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sessions_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `used_code`
--
ALTER TABLE `used_code`
  ADD CONSTRAINT `fk_used_code_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_discount_code_discount_code1` FOREIGN KEY (`discount_code_id`) REFERENCES `discount_code` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_discount_code_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
