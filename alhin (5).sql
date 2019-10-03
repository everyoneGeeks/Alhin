-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2019 at 07:33 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alhin`
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
  `remeber_token` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_super_admins`, `permissions`, `created_at`, `remeber_token`, `updated_at`) VALUES
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
  `salary` int(11) DEFAULT '0',
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

INSERT INTO `company` (`id`, `apiToken`, `firebaseToken`, `name`, `salary`, `is_active`, `email`, `password`, `language`, `logo`, `code`, `tmpApiToken`, `created_at`, `updated_at`) VALUES
(2, '0pZbwZQwwo5kpEAtvcl4HLuB5rXFYdJkspXvozJEfpAH845m1wSLEPuK7FyWYbm9', NULL, 'magdsoft', 0, '0', 'pops@gmail.com', '$2y$10$1uDREORzJM0GFTj2TVrCIujrzF2NWYzK/2G.lM.lZxB90y9h//uy.', 'ar', 'images/LOuiQb_1568657800.png', NULL, 'mZiaLaUplwTdNOtgozKD3pkwQDLRY4OIUgwPRgmRsz4YtHrN8ZAIXHX6H3rXaSSw', '2019-09-16 16:16:40', '2019-09-28 21:17:28'),
(3, '9aN0fI6Y40n4JPIxDcFZuIjC37yRhZeo1Bdv2TLwdtSfBfeJ6F968mcJOgp66OcK', NULL, 'pop', 0, '1', 'abdomohmdaed00001@gmail.com', '$2y$10$B/VggYBe8MyKTznDkP1xG.vKnSgb.odXPxVS9LHVU8hGuIeD4KAoW', 'en', 'images/7ZuUbK_1570055839.png', NULL, NULL, '2019-10-02 20:34:59', '2019-10-02 20:42:40'),
(4, 'JzojP6nqa96NDFM7S37PvOaBBE6poxBLWof23UhryMXSn542j3C5h6S97S5pX7Nf', NULL, 'pop', 0, '1', 'abdomohmdaed0001@gmail.com', '$2y$10$RIWuodtM2RLmcdjuyQlyv.tK8et2W86DNLa0xZEP8PL.14acOYsxe', 'ar', NULL, NULL, NULL, '2019-10-03 08:33:21', '2019-10-03 08:59:29');

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
(3, 'gfdggddfgdfgdf', 'gdfgdgdfgdf', '2019-09-28 00:33:15');

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
  `note` text,
  `photo` varchar(255) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `work_experience` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CV`
--

INSERT INTO `CV` (`id`, `phone`, `employee_id`, `date_of_birth`, `expected_salary`, `martial_status`, `residence_country_id`, `religion_id`, `total_experience`, `job_title`, `note`, `photo`, `nationality_id`, `work_experience`, `created_at`) VALUES
(4, '01025478765', 2, '2019-09-25', '0.000', 'Widowed', 1, 1, 20, 'web DEveloper', 'I am a student', 'CV/G3koAY_1569292479.pdf', 1, '[{\"job_title\": \"sssss\", \"company_name\": \"wwwww\", \"experirnce_years\": 55}, {\"job_title\": \"sssss\", \"company_name\": \"wwwww\", \"experirnce_years\": 55}]', '2019-09-24 00:34:39'),
(11, '01025478760', 3, '2019-09-25', '5.500', 'Single', 1, 1, 2, 'web DEveloper ss', 'I am a student', 'photo/keVBuY_1570111412.png', 1, '[{\"job_title\": \"sssss\", \"company_name\": \"wwwww\", \"experirnce_years\": 55}, {\"job_title\": \"sssss\", \"company_name\": \"wwwww\", \"experirnce_years\": 55}]', '2019-10-03 12:03:32');

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
(2, 'XJfldpiKNL9IeNGVzGp1DGoINM9m2Qb0QEGtHD7POIHifyPp4BK5SDV6UmcGABiq', NULL, 'magdsoft', 'popds@gmail.com', 'ar', '$2y$10$bj5VNEcgMoawllw00/2whOA4mW8uc9mAh52in.2cfzwF8ox3k6Mbe', 'images/YhqKR2_1568706444.png', NULL, '1', NULL, '2019-09-17 05:47:24', '2019-10-02 20:41:09'),
(3, 'pGlryBYOh8SseQqb1L4Vtb30cmq2ZcA1s39FwMOl1SEaNXtY9fk5c36t4RgjZGcs', NULL, 'pop', 'dabdomdohaedd00d1@gmail.com', 'ar', '$2y$10$Q9TUIKaMWVmp41SsuCBJqewQMpt1cI1awYY6z4i0WFkp04RdKyxjO', NULL, NULL, '1', NULL, '2019-10-02 20:45:04', '2019-10-02 20:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_company`
--

CREATE TABLE `favourite_company` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `is_fave` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite_company`
--

INSERT INTO `favourite_company` (`id`, `employee_id`, `company_id`, `is_fave`, `created_at`) VALUES
(1, 2, 2, '1', '2019-10-03 12:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_employee`
--

CREATE TABLE `favourite_employee` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `is_fave` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite_employee`
--

INSERT INTO `favourite_employee` (`id`, `employee_id`, `job_id`, `is_fave`, `created_at`) VALUES
(1, 2, 1, '1', '2019-10-03 13:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_title_ar` varchar(255) NOT NULL,
  `job_title_en` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_exprience` int(2) NOT NULL,
  `company_id` int(11) NOT NULL,
  `residence_country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `job_title_ar`, `job_title_en`, `image`, `phone`, `email`, `total_exprience`, `company_id`, `residence_country_id`, `created_at`) VALUES
(1, 'hgfhhfghfg', 'hfghg', 'hgf', '654654656', 'sdsad@dsfsd.com', 20, 2, 1, '2019-10-03 13:13:46');

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
(2, 'dasdsadasd', 'فغقفغفقغفق', '2019-09-28 00:21:42', NULL),
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
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rate_employee`
--

CREATE TABLE `rate_employee` (
  `id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `residence_country_id` (`residence_country_id`),
  ADD KEY `religion_id` (`religion_id`),
  ADD KEY `nationality_id` (`nationality_id`),
  ADD KEY `CV_ibfk_4` (`employee_id`);

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
  ADD KEY `favourite_company_ibfk_1` (`employee_id`),
  ADD KEY `favourite_company_ibfk_2` (`company_id`);

--
-- Indexes for table `favourite_employee`
--
ALTER TABLE `favourite_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `favourite_employee_ibfk_1` (`employee_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `CV`
--
ALTER TABLE `CV`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `favourite_company`
--
ALTER TABLE `favourite_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rate_employee`
--
ALTER TABLE `rate_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `residence_country`
--
ALTER TABLE `residence_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applyed`
--
ALTER TABLE `applyed`
  ADD CONSTRAINT `applyed_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `applyed_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CV`
--
ALTER TABLE `CV`
  ADD CONSTRAINT `CV_ibfk_1` FOREIGN KEY (`residence_country_id`) REFERENCES `residence_country` (`id`),
  ADD CONSTRAINT `CV_ibfk_2` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`id`),
  ADD CONSTRAINT `CV_ibfk_3` FOREIGN KEY (`nationality_id`) REFERENCES `nationality` (`id`),
  ADD CONSTRAINT `CV_ibfk_4` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favourite_company`
--
ALTER TABLE `favourite_company`
  ADD CONSTRAINT `favourite_company_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `favourite_company_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `favourite_employee`
--
ALTER TABLE `favourite_employee`
  ADD CONSTRAINT `favourite_employee_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `favourite_employee_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`residence_country_id`) REFERENCES `residence_country` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
