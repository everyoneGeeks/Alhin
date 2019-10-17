-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2019 at 09:56 AM
-- Server version: 5.6.32-78.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsael_alhin`
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
  `is_super_admins` int(11) NOT NULL DEFAULT '1',
  `permissions` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_super_admins`, `permissions`, `created_at`, `remember_token`, `updated_at`) VALUES
(1, 'pop', 'admin@admin.com', NULL, '$2y$10$OBE7H01yCX2rDU2qnTJYGOHnV2CpzO4zHcdivXvQpMtV9dPi4Y8sC', 1, NULL, '2019-09-27 17:58:03', NULL, NULL),
(10, 'dsadasd asdsadas', 'sdsad@dsfsd.com', NULL, '$2y$10$l7Md5oP/rvW4nhWfa2aV6.w9fBv.2zpln2O5znAhZTcqFfbTay.5u', 0, '{\"employee\":{\"add\":null,\"edit\":null,\"delete\":null},\"company\":{\"add\":null,\"edit\":null,\"delete\":null},\"country\":{\"add\":\"1\",\"edit\":null,\"delete\":null},\"religion\":{\"add\":null,\"edit\":null,\"delete\":null},\"ads\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"app_setting\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"contact\":{\"add\":null,\"edit\":null,\"delete\":null},\"nationality\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"}}', '2019-09-27 19:04:23', NULL, '2019-09-27 20:50:40'),
(11, 'dsadasd asdsadas', 'sdsad@dsfsd.com', NULL, '$2y$10$QzyaTc86RL5RuBZJgW.m.er4g3zaeQLJCY7as/7kwE.mxk/mU2Xd2', 0, '{\"employee\":{\"add\":\"1\",\"edit\":null,\"delete\":null},\"company\":{\"add\":\"1\",\"edit\":null,\"delete\":null},\"country\":{\"add\":\"1\",\"edit\":null,\"delete\":null},\"religion\":{\"add\":\"1\",\"edit\":null,\"delete\":null},\"ads\":{\"add\":\"1\",\"edit\":null,\"delete\":null},\"app_setting\":{\"add\":\"1\",\"edit\":null,\"delete\":null},\"contact\":{\"add\":\"1\",\"edit\":null,\"delete\":null},\"nationality\":{\"add\":\"1\",\"edit\":null,\"delete\":null}}', '2019-09-27 19:05:57', NULL, '2019-09-27 21:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `end_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `url`, `image`, `end_at`, `created_at`) VALUES
(2, 'Https://www.ggoll.com', 'image/DTX42y_1569632933.png', '2019-09-28 01:08:53', '2019-09-27 23:08:53'),
(3, 'Https://wwتw.ggoll.com', 'image/14cPaa_1569632949.gif', '2019-09-28 01:09:09', '2019-09-27 23:09:09'),
(4, 'Https://www.ggoll.com', 'image/0Ak15q_1569632958.png', '2019-09-28 01:09:18', '2019-09-27 23:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `applyed`
--

CREATE TABLE `applyed` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE `app_setting` (
  `id` int(11) NOT NULL,
  `about_us_ar` text NOT NULL,
  `about_us_en` text NOT NULL,
  `terms_conditions_ar` text NOT NULL,
  `terms_conditions_en` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_setting`
--

INSERT INTO `app_setting` (`id`, `about_us_ar`, `about_us_en`, `terms_conditions_ar`, `terms_conditions_en`, `created_at`) VALUES
(1, 'dasdasdasتالتلاتال', 'dsadasdsaتلاتلات', 'dsadasdasالتلاتلاالاللالا', 'تتتتتتتتتتتت', '2019-09-24 09:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `apiToken` varchar(255) NOT NULL,
  `firebaseToken` varchar(250) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `language` enum('ar','en') NOT NULL DEFAULT 'ar',
  `logo` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `tmpApiToken` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `apiToken`, `firebaseToken`, `name`, `is_active`, `email`, `password`, `language`, `logo`, `code`, `tmpApiToken`, `created_at`, `updated_at`) VALUES
(2, '0pZbwZQwwo5kpEAtvcl4HLuB5rXFYdJkspXvozJEfpAH845m1wSLEPuK7FyWYbm9', NULL, 'magdsoft', '1', 'pops@gmail.com', '$2y$10$1xofgsKv6ZMPZV/doxmNYOs3ZP50cDKQYe4L4v8yuoaskfKj0NWSi', 'ar', 'images/LOuiQb_1568657800.png', NULL, NULL, '2019-09-16 16:16:40', '2019-10-10 22:32:12'),
(3, 'GIHHhGjaVQvT08kWMtlC47XXsI7e7u6B2AHInJJIP9lzexsURJwGTqaaR42A6qq2', NULL, 'pop', '1', 'pop@gmai.com', '$2y$10$vg1lxML67tVomUbJ/UDgV.uKt/TShrFTaYPE5Pv7vEYkuoll7IeSC', 'ar', NULL, NULL, NULL, '2019-09-28 16:47:50', '2019-10-10 22:32:14'),
(4, '54fo2Fqvih2Y8kNTEv5M8G3ZTiYeGQiwpFu1c56LlNQKWZIOdjwZLZgKz9N2RwkA', NULL, 'mohamed', '1', 'mohamed@gmail.com', '$2y$10$oxzgwkqgzHxR/5cUf5amZe5rEl03hU6YRXbpWvoWpu.s7e9Qw8jLy', 'ar', NULL, NULL, NULL, '2019-09-28 17:26:20', '2019-09-28 17:26:20'),
(5, '76hR4MKMR8Kz7uEf0L8pyN2yctZdm3Z103LVKY6GCbmB0aps2VZbia31DoOcnoou', NULL, 'pop', '1', 'abdomohmaed00001@gmail.com', '$2y$10$NXqvKIjG96DV7WfXxy2A4uy/KXy0jlSIu8ol8WMlrT7OY2a/SRcLm', 'ar', NULL, NULL, NULL, '2019-09-28 23:51:56', '2019-09-28 23:51:56'),
(6, 'CKp5xJ1T0KlWwM761dj2wdbPHg9NB20ybKAAMofvnKZ5BDFHJYPYOpAQwJpVTSaj', NULL, 'mohamed', '1', 'mo@gmail.com', '$2y$10$G/fNwVk5QtuijzdSEPFrW.cMEtD7HV13wr2dPNPYLRvsXJJrifefG', 'ar', NULL, NULL, NULL, '2019-09-29 16:12:57', '2019-10-05 07:29:18'),
(7, 'dr12UU9mTc4jwEOJ1z3WxabpdnvLC3pYWCpAUhBXKclsdwSPhtOhKWle3T6RRZwO', NULL, 'mohamed', '1', 'mohammedd.a.gwad@gmail.com', '$2y$10$dAu7MxZouuDGSf/TfW80NuljP/ibm95kIXWJSTDi24Hp75EX.ahCy', 'ar', NULL, NULL, NULL, '2019-09-29 16:21:48', '2019-09-29 16:21:48'),
(8, '2jeInOtgr0ItjpyM3dj0GEG4nL6Mx01baEEjtbGfIy05Zc77lsVs5lrFgR1vAj7B', NULL, 'mohamed', '1', 'mohammed.a.gwad@gmail.com', '$2y$10$Zj1AVlFbdpYZYVOOKXic9OUtqPprWJEWGdDFDrU6hC70/TcifS/JW', 'ar', NULL, NULL, NULL, '2019-09-29 16:21:54', '2019-09-29 21:28:56'),
(9, 'ynSpC5bCsZk06yNp4tdn9xyxD8kGnWxOsnKGdAQf589lCDwBLZZZ0YWY33E3vqaz', NULL, 'ahmed', '1', 'liberty_eg@yahoo.com', '$2y$10$1p.FWJAwGOupDQOt/wv6G.hLAjsV76.3I5F0v/5hYEzvPr8fMP0du', 'en', NULL, NULL, NULL, '2019-10-16 17:09:27', '2019-10-16 17:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `message`, `email`, `created_at`) VALUES
(3, 'gfdggddfgdfgdf', 'gdfgdgdfgdf', '2019-09-28 00:33:15'),
(4, 'ssssss', 'pop@gmai.com', '2019-09-28 17:03:19'),
(5, 'mohamed', 'mohamed@gmail.com', '2019-09-28 17:29:23'),
(6, 'Mohamed', 'mohamed@gmaiil.com', '2019-09-28 17:32:51'),
(7, 'Mohamed', 'mohamed@gmail.com', '2019-09-28 17:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `CV`
--

CREATE TABLE `CV` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `expected_salary` decimal(10,3) NOT NULL DEFAULT '0.000',
  `martial_status` enum('Single','Widowed','Married') NOT NULL DEFAULT 'Single',
  `residence_country_id` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `total_experience` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `note` text,
  `photo` varchar(255) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `work_experience_job_title` varchar(255) DEFAULT NULL,
  `work_experience_company_name` varchar(255) DEFAULT NULL,
  `work_experience_experirnce_years` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CV`
--

INSERT INTO `CV` (`id`, `phone`, `employee_id`, `date_of_birth`, `expected_salary`, `martial_status`, `residence_country_id`, `religion_id`, `total_experience`, `job_title`, `view`, `note`, `photo`, `nationality_id`, `work_experience_job_title`, `work_experience_company_name`, `work_experience_experirnce_years`, `created_at`) VALUES
(1, '010254787585', 4, '2019-10-11', '5.000', 'Single', 1, 1, 8, 'web DEveloper', 9, NULL, 'photo/1vtAL4_1570727730.png', 1, 'يسبيسبسيب', 'ببيسبسيبسي', 0, '2019-10-10 22:15:30'),
(2, '888', 6, '1993-09-22', '46.000', 'Married', 2, 2, 1, 'IOSDEveloper', 44, 'Hello I’m IOS Developer', 'photo/NFMFEp_1571138977.jpeg', 3, 'IOSDEveloper', 'InstaBug', 2, '2019-10-15 16:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `apiToken` varchar(255) NOT NULL,
  `firebaseToken` varchar(250) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `language` enum('ar','en') NOT NULL DEFAULT 'ar',
  `password` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `tmpApiToken` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `apiToken`, `firebaseToken`, `name`, `email`, `language`, `password`, `logo`, `code`, `is_active`, `tmpApiToken`, `created_at`, `updated_at`) VALUES
(2, 'XJfldpiKNL9IeNGVzGp1DGoINM9m2Qb0QEGtHD7POIHifyPp4BK5SDV6UmcGABiq', NULL, 'magdsoft', 'popds@gmail.com', 'ar', '$2y$10$lCrVJ8KB5POCqmuJCSkABe3M.tkGqlUMNa4myM0F9pr.juQBCmMGG', 'images/YhqKR2_1568706444.png', 'xx', '1', NULL, '2019-09-17 05:47:24', '2019-10-15 15:31:11'),
(3, 'f3IzfJrBZPlsPKEtXWUU9K92rbkNfj2iht8hDgQmP8pC3T1IUwh5oqxpFd3qv4UO', NULL, 'pop', 'pop@gmai.com', 'ar', '$2y$10$XDYIwr5cDJdixaA3Z4m0r.wnCc28F7VqJ/iBMM9mA.GouCzeBPQ9q', NULL, NULL, '1', NULL, '2019-09-28 16:40:30', '2019-09-28 16:40:30'),
(4, 'GiTXaKc854SQeu8nnRdQyUmnpBcrka8j1ziS4yWNalXNdeO5J3bfXmq5HLTssTNw', NULL, 'pop', 'podp@gmai.com', 'ar', '$2y$10$D5Og0MhlZ1zbL3/RYUGvyez5sHo8MhxI2QAW8sYrsRPf8.o0unpii', NULL, NULL, '1', NULL, '2019-09-28 17:06:14', '2019-09-28 17:06:14'),
(5, '1POMVQANN13drimtZNYM1niYD8Q9WxZEUhkBySpSX67GawZppd4AubdG3t2MWiYW', NULL, 'Mohammed', 'mo@gmail.com', 'en', '$2y$10$Vy0i1/zWxAU9WSpf8kAp5ey3wXVc6fJBGw137kco2YmmbIrszSX5.', NULL, NULL, '1', NULL, '2019-09-28 19:08:03', '2019-09-28 19:08:03'),
(6, '9KbfhoPJ0ZsbHkPNAdl6QDkaUNvSlY1xgR2hWHIWBiKnYw8XZt1mwUSrxgehfZ5Z', NULL, 'Mido', 'moo@gmail.com', 'en', '$2y$10$54.FotUPPpAFqwl8V2VfCeAiFUhHE9lAQwEBU/Do/TGJTGlX74QDa', NULL, NULL, '1', 'Cs8sCB6rJUwczrfaOXfM4C1SbKNn7VlIlqdxIxdRTV7VOdkOoUWWxtmTil8izvJi', '2019-10-07 17:42:09', '2019-10-08 18:20:25'),
(7, 'oXmn43w2ZnPmPm7EFjbec1uLxlOTFpaiS3q40FLnen3BMLWCxi7qMUHgTYnmKddg', NULL, 'Mohamed abd el gawad', 'moh@gmail.com', 'en', '$2y$10$cmXy7t3f0.ccIfvDSvUF7uj69eyrohASak4H/QXnpoRjMRRYsxO3O', NULL, NULL, '1', NULL, '2019-10-17 05:21:17', '2019-10-17 05:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_company`
--

CREATE TABLE `favourite_company` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `is_fave` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite_company`
--

INSERT INTO `favourite_company` (`id`, `cv_id`, `job_id`, `company_id`, `is_fave`, `created_at`) VALUES
(26, 2, NULL, 6, '1', '2019-10-16 15:55:11'),
(27, NULL, 2, 9, '1', '2019-10-16 17:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_employee`
--

CREATE TABLE `favourite_employee` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `is_fave` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite_employee`
--

INSERT INTO `favourite_employee` (`id`, `cv_id`, `job_id`, `employee_id`, `is_fave`, `created_at`) VALUES
(9, 2, NULL, 6, '1', '2019-10-13 21:01:33'),
(12, NULL, 2, 6, '1', '2019-10-13 21:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `employee_id`, `cv`, `created_at`) VALUES
(1, 2, 'CV/wREfM5_1569291147.pdf', '2019-09-24 02:12:27'),
(2, 2, 'CV/MWSlgA_1569292322.pdf', '2019-09-24 02:32:02'),
(3, 2, 'CV/G3koAY_1569292479.pdf', '2019-09-24 02:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `job_title` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_exprience` int(2) NOT NULL,
  `company_id` int(11) NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `residence_country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `view`, `job_title`, `companyName`, `image`, `phone`, `email`, `total_exprience`, `company_id`, `salary`, `residence_country_id`, `created_at`) VALUES
(1, 11, 'accountant', 'al horia', 'image/2rYWoG_1570979500.jpeg', '0100500100', 'Mo@gmail.com', 1, 6, '5000.00', 2, '2019-10-13 20:11:40'),
(2, 20, 'sales', 'hello', 'image/b2Fdxw_1570637793.jpeg', '2345678', 'Mo@gmail.comm', 4, 6, '345678.00', 2, '2019-10-09 21:16:33'),
(3, 11, 'ceo', 'Horia', 'image/t8VjBY_1570643596.jpeg', '01000500100', 'Mo@gmail.com', 6, 6, '345678.00', 1, '2019-10-09 22:53:16'),
(4, 5, 'APG', 'Americana', 'image/YIKjIt_1570644589.jpeg', '0100200300', 'Mo@gmail.com', 4, 6, '23446.00', 2, '2019-10-09 23:09:49'),
(5, 6, 'doctor', 'medical', 'image/HG397L_1570724693.jpeg', '0100200300', 'Mo@gmail.com', 4, 6, '50000.00', 2, '2019-10-10 21:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `id` int(11) NOT NULL,
  `nationality_ar` varchar(255) NOT NULL,
  `nationality_en` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`id`, `nationality_ar`, `nationality_en`, `created_at`, `deleted_at`) VALUES
(1, 'dasdsadasd', 'الباابلابلابلا', '2019-09-28 00:22:11', '2019-09-27 22:22:11'),
(2, 'dasdsadasd', 'فغقفغفقغفق', '2019-09-28 23:44:54', '2019-09-29 04:44:54'),
(3, 'jhgjghj', 'jghjhgjghjgh', '2019-09-28 00:21:44', NULL),
(4, 'fdsfds', 'fdsfdsfdsfdsfsd', '2019-09-28 00:22:14', '2019-09-27 22:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `notification_company`
--

CREATE TABLE `notification_company` (
  `id` int(11) NOT NULL,
  `message_ar` text NOT NULL,
  `message_en` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification_employee`
--

CREATE TABLE `notification_employee` (
  `id` int(11) NOT NULL,
  `message_ar` text NOT NULL,
  `message_en` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rate_company`
--

CREATE TABLE `rate_company` (
  `id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `job_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate_company`
--

INSERT INTO `rate_company` (`id`, `rate`, `created_at`, `job_id`) VALUES
(1, 3, '2019-10-14 10:36:57', 1),
(2, 2, '2019-10-14 10:37:09', 2),
(3, 3, '2019-10-14 10:37:18', 3),
(4, 4, '2019-10-14 10:37:25', 4),
(5, 4, '2019-10-14 10:37:30', 4),
(6, 5, '2019-10-14 10:37:43', 5),
(7, 5, '2019-10-14 10:45:24', 2),
(8, 5, '2019-10-16 15:58:44', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rate_employee`
--

CREATE TABLE `rate_employee` (
  `id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate_employee`
--

INSERT INTO `rate_employee` (`id`, `rate`, `cv_id`, `created_at`) VALUES
(1, 5, 1, '2019-10-13 07:46:32'),
(2, 4, 2, '2019-10-14 10:36:07'),
(3, 3, 1, '2019-10-14 10:36:47'),
(4, 5, 2, '2019-10-15 14:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `religion_ar` varchar(255) NOT NULL,
  `religion_en` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `religion_ar`, `religion_en`, `created_at`) VALUES
(1, 'sdasdasdasdasda', 'ljklkjlkjljkl', '2019-09-22 04:16:44'),
(2, 'sdasdasdasdasda', 'hjkhjkhjkhj', '2019-09-22 04:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `residence_country`
--

CREATE TABLE `residence_country` (
  `id` int(11) NOT NULL,
  `country_ar` varchar(255) NOT NULL,
  `country_en` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `residence_country`
--

INSERT INTO `residence_country` (`id`, `country_ar`, `country_en`, `created_at`) VALUES
(1, 'sadasdasdasdasdasتتتتت', 'daserewrewrwe', '2019-09-22 04:11:23'),
(2, 'sadasdasdasdasdas', 'dsadasdsa', '2019-09-22 04:11:23');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applyed`
--
ALTER TABLE `applyed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `applyed_ibfk_2` (`job_id`);

--
-- Indexes for table `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CV`
--
ALTER TABLE `CV`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_company`
--
ALTER TABLE `favourite_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `favourite_company_ibfk_1` (`cv_id`),
  ADD KEY `favourite_company_ibfk_2` (`company_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `favourite_employee`
--
ALTER TABLE `favourite_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `favourite_employee_ibfk_1` (`cv_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_ibfk_1` (`employee_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residence_country_id` (`residence_country_id`),
  ADD KEY `job_ibfk_1` (`company_id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_company`
--
ALTER TABLE `notification_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_employee`
--
ALTER TABLE `notification_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_company`
--
ALTER TABLE `rate_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_employee`
--
ALTER TABLE `rate_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residence_country`
--
ALTER TABLE `residence_country`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applyed`
--
ALTER TABLE `applyed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `CV`
--
ALTER TABLE `CV`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favourite_company`
--
ALTER TABLE `favourite_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `favourite_employee`
--
ALTER TABLE `favourite_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification_company`
--
ALTER TABLE `notification_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_employee`
--
ALTER TABLE `notification_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_company`
--
ALTER TABLE `rate_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rate_employee`
--
ALTER TABLE `rate_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `residence_country`
--
ALTER TABLE `residence_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourite_company`
--
ALTER TABLE `favourite_company`
  ADD CONSTRAINT `favourite_company_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `CV` (`id`),
  ADD CONSTRAINT `favourite_company_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `favourite_company_ibfk_3` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Constraints for table `favourite_employee`
--
ALTER TABLE `favourite_employee`
  ADD CONSTRAINT `favourite_employee_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `CV` (`id`),
  ADD CONSTRAINT `favourite_employee_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `favourite_employee_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
