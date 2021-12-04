-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 08:10 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonsai`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_list`
--

CREATE TABLE `access_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `EN_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `access_list`
--

INSERT INTO `access_list` (`id`, `title`, `EN_name`, `status`) VALUES
(1, 'داشبورد', 'admin_panel', 'ACTIVE'),
(2, 'گالری و اسلایدر', 'admin_gallery', 'ACTIVE'),
(3, 'پیام کاربران', 'admin_comments', 'ACTIVE'),
(4, 'تنضیمات سایت', 'admin_options', 'ACTIVE'),
(5, 'admin_ecomm_add_product', 'admin_ecomm_add_product', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_persian_ci NOT NULL DEFAULT '#',
  `alt` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `text` text COLLATE utf8_persian_ci DEFAULT NULL,
  `slider` enum('YES','NO') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO',
  `img_show` enum('YES','NO') COLLATE utf8_persian_ci DEFAULT 'NO',
  `category` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `img_name`, `link`, `alt`, `title`, `text`, `slider`, `img_show`, `category`) VALUES
(7, '1556969541.mp3', '#', '', '', '', 'NO', 'NO', 9);

-- --------------------------------------------------------

--
-- Table structure for table `audio_category`
--

CREATE TABLE `audio_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `img_count` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `audio_category`
--

INSERT INTO `audio_category` (`id`, `title`, `img_count`, `status`) VALUES
(4, 'بیت کوین', 1, 'ACTIVE'),
(9, 'تست', 0, 'ACTIVE'),
(11, 'sosl', 0, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `clients_gallery`
--

CREATE TABLE `clients_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `text` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_persian_ci NOT NULL DEFAULT 'inactive',
  `img_name` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `clients_gallery`
--

INSERT INTO `clients_gallery` (`id`, `name`, `text`, `status`, `img_name`) VALUES
(5, NULL, NULL, 'active', 'adp.png'),
(12, NULL, NULL, 'active', 'uni-e.png'),
(13, NULL, NULL, 'active', 'tach.png'),
(17, NULL, NULL, 'active', '1547557382.png'),
(18, NULL, NULL, 'active', '150=150.png'),
(19, NULL, NULL, 'active', '1567089734.png'),
(20, NULL, NULL, 'active', '1567940148.png'),
(21, NULL, NULL, 'active', '1567772514.png'),
(22, NULL, NULL, 'active', '1566711610.jpg'),
(23, NULL, NULL, 'active', '1563095308.png'),
(24, NULL, NULL, 'active', '1560250661.png'),
(25, NULL, NULL, 'active', '1557719980.png'),
(26, NULL, NULL, 'active', '1570511273.jpg'),
(27, NULL, NULL, 'active', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `comment` text COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('NEW','SEEN') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `phone`, `comment`, `email`, `name`, `date`, `status`) VALUES
(1, '09223093724', 'asdefas', 'm1ohamadimahdi@yahoo.com1', 'admin', '2019-12-25 16:09:21', 'SEEN'),
(2, '09223093724', 'hlkj;', 'mahdi_mohamadi110@yahoo.com', 'نظرسنجی', '2019-12-25 16:09:36', 'SEEN'),
(3, '34324324', 'sdxfsd', 'm1ohamadimahdi@yahoo.com', 'asal', '2019-12-25 16:21:30', 'NEW'),
(4, '091211111111', 'پیام تستی', 'test@yahoo.com', 'تست', '2020-10-27 12:23:31', 'SEEN');

-- --------------------------------------------------------

--
-- Table structure for table `credit_log`
--

CREATE TABLE `credit_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `clerk_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `add_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `befor_pay` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `after_pay` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `pay_port` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `pay_status` enum('payed','unpayed') COLLATE utf8_persian_ci DEFAULT 'unpayed',
  `pay_error` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `credit_log`
--

INSERT INTO `credit_log` (`id`, `clerk_id`, `user_id`, `amount`, `summary`, `add_date`, `status`, `befor_pay`, `after_pay`, `pay_port`, `pay_status`, `pay_error`) VALUES
(1, 13, 13, '1000', 'sas', '2019-12-30 21:16:18', 'ACTIVE', '000000000000000000000000000143685656', NULL, 'زرین پال', 'payed', NULL),
(3, 1, 218, '780', '', '2019-08-09 16:49:17', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(4, 1, 218, '22', '', '2019-08-09 17:12:44', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(5, 1, 215, '22', '', '2019-08-09 17:32:15', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(6, 1, 215, '300', '', '2019-08-09 17:34:42', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(7, 1, 215, '100', '', '2019-08-09 17:34:59', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(8, 1, 202, '-150', '', '2019-08-09 23:23:02', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(9, 1, 214, '25000', '', '2019-08-10 00:36:15', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(10, 1, 214, '-20000', '', '2019-08-10 00:36:27', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(11, 1, 203, '1200', '', '2019-08-10 01:28:06', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(12, 1, 201, '150', '', '2019-08-10 01:30:06', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(13, 1, 206, '6900', '', '2019-08-10 01:30:32', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(14, 1, 206, '500', '', '2019-08-10 01:30:42', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(15, 1, 206, '-2560', '', '2019-08-10 01:31:02', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(16, 1, 217, '120000', '', '2019-08-15 21:27:11', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(17, 1, 220, '29000', '', '2019-08-15 23:12:19', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(18, 1, 220, '-200', '', '2019-08-16 02:41:25', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(19, 1, 219, '400', '', '2019-08-16 02:41:41', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(20, 1, 202, '200', '', '2019-08-16 02:51:52', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(21, 223, 223, '12500', '00', '2019-11-10 20:45:39', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(22, 223, 223, '3600', 'dfgdfg', '2019-11-10 20:58:21', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(23, 223, 223, '1', '11', '2019-11-11 01:46:14', 'ACTIVE', '', NULL, NULL, 'payed', NULL),
(24, 223, 223, '1', '11', '2019-11-11 01:47:58', 'ACTIVE', '', NULL, NULL, 'payed', NULL),
(25, 223, 223, '25', 'ssss', '2019-11-11 01:51:54', 'ACTIVE', '', NULL, NULL, 'payed', NULL),
(26, 223, 223, '25', 'ssss', '2019-11-11 02:16:51', 'ACTIVE', '', NULL, NULL, 'payed', NULL),
(27, 223, 223, '1500', '00', '2019-11-11 02:29:18', 'ACTIVE', '000000000000000000000000000138034916', NULL, NULL, 'payed', NULL),
(28, 223, 223, '25000', '00', '2019-11-11 02:34:43', 'ACTIVE', '000000000000000000000000000138035146', NULL, 'زرین پال', 'unpayed', 'هيچ نوع عمليات مالي براي اين تراكنش يافت نشد.'),
(29, 223, 223, '1000', 'ssss', '2019-11-11 02:41:52', 'ACTIVE', '000000000000000000000000000138035329', NULL, 'زرین پال', 'unpayed', 'تراكنش نا موفق ميباشد.'),
(30, 223, 223, '1000', 'ssss', '2019-11-11 02:44:04', 'ACTIVE', '000000000000000000000000000138035397', '53949974020', 'زرین پال', 'payed', NULL),
(31, 1, 223, '285000', '5ooo', '2019-11-11 02:53:30', 'ACTIVE', NULL, NULL, NULL, 'payed', NULL),
(32, 223, 223, '1000', 'بامبو وب', '2019-11-11 05:09:59', 'ACTIVE', '000000000000000000000000000138038740', '66949987920', 'زرین پال', 'payed', NULL),
(33, 223, 223, '-300000', ' ثبت نام در کلاس انگلیسی در ترم پاییز', '2019-11-11 05:12:31', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(34, 1, 223, '370000', 'لل', '2019-11-11 05:18:09', 'ACTIVE', NULL, NULL, 'پنل مدیریت', 'payed', NULL),
(35, 223, 223, '-300000', ' ثبت نام در کلاس انگلیسی در ترم پاییز', '2019-11-11 05:32:22', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(36, 223, 223, '970000', ' پرداخت فاکتور : ', '2019-11-17 13:07:41', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(37, 223, 223, '970000', ' پرداخت فاکتور : mani25.652:463', '2019-11-17 13:08:09', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(38, 223, 223, '970000', ' پرداخت فاکتور : mani25.652:463', '2019-11-17 15:38:02', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(39, 223, 223, '1220000', ' پرداخت فاکتور : F-98.0873', '2019-11-17 16:16:29', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(40, 223, 223, '1220000', ' پرداخت فاکتور : F-98.0874', '2019-11-17 16:17:02', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(41, 223, 223, '1220000', ' پرداخت فاکتور : F-98.0875', '2019-11-17 16:17:06', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(42, 223, 223, '1220000', ' پرداخت فاکتور : F-98.0876', '2019-11-17 16:18:07', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(43, 223, 223, '1220000', ' پرداخت فاکتور : F-98.0877', '2019-11-17 16:22:39', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(44, 223, 223, '250000', ' پرداخت فاکتور : F-98.0878', '2019-11-17 16:26:27', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(45, 223, 223, '0', ' پرداخت فاکتور : F-98.0880', '2019-11-17 16:27:28', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(46, 223, 223, '0', ' پرداخت فاکتور : F-98.0883', '2019-11-17 16:33:25', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(47, 223, 223, '0', ' پرداخت فاکتور : F-98.0884', '2019-11-17 16:33:25', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(48, 223, 223, '0', ' پرداخت فاکتور : F-98.0886', '2019-11-17 16:34:31', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(49, 223, 223, '0', ' پرداخت فاکتور : F-98.0887', '2019-11-17 16:34:32', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(50, 223, 223, '360000', ' پرداخت فاکتور : F-98.0888', '2019-11-17 16:34:42', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(51, 223, 223, '250000', ' پرداخت فاکتور : F-98.0896', '2019-11-17 18:37:50', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(52, 223, 223, '360000', ' پرداخت فاکتور : F-98.0894', '2019-11-17 18:37:59', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(53, 223, 223, '250000', ' پرداخت فاکتور : F-98.0895', '2019-11-17 18:38:06', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(54, 223, 223, '720000', ' پرداخت فاکتور : F-98.0882', '2019-11-17 18:38:57', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(55, 223, 223, '360000', ' پرداخت فاکتور : F-98.0893', '2019-11-17 18:39:37', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(56, 223, 223, '360000', ' پرداخت فاکتور : F-98.0890', '2019-11-17 18:40:12', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(57, 223, 223, '360000', ' پرداخت فاکتور : F-98.0890', '2019-11-17 18:40:12', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(58, 223, 223, '720000', ' پرداخت فاکتور : F-98.0889', '2019-11-17 18:43:44', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(59, 223, 223, '360000', ' پرداخت فاکتور : F-98.0892', '2019-11-17 18:44:34', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(60, 223, 223, '250000', ' پرداخت فاکتور : F-98.0897', '2019-11-17 20:38:53', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(61, 13, 13, '1000', 'rf', '2019-12-30 21:52:24', 'ACTIVE', '000000000000000000000000000143690444', NULL, 'زرین پال', 'unpayed', NULL),
(62, 13, 13, '1000', 'asdsd', '2019-12-30 21:53:57', 'ACTIVE', '000000000000000000000000000143690652', NULL, 'زرین پال', 'unpayed', NULL),
(63, 13, 13, '1000', 'sad', '2019-12-30 22:01:31', 'ACTIVE', '000000000000000000000000000143691596', NULL, 'زرین پال', 'unpayed', NULL),
(64, 13, 13, '1000', 'rtwert', '2019-12-30 22:08:02', 'ACTIVE', '000000000000000000000000000143692397', NULL, 'زرین پال', 'unpayed', NULL),
(65, 13, 13, '1000', 'xgfd', '2019-12-30 22:14:20', 'ACTIVE', '000000000000000000000000000143693176', '63986936589', 'زرین پال', 'payed', NULL),
(66, 13, 13, '1000', 'jhnklj', '2019-12-30 22:16:02', 'ACTIVE', '000000000000000000000000000143693398', '68986937899', 'زرین پال', 'payed', NULL),
(67, 13, 13, '1000', ' پرداخت فاکتور : F-98.1023', '2019-12-30 22:17:10', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(68, 13, 13, '1000', 'ere', '2019-12-30 22:21:05', 'ACTIVE', '000000000000000000000000000143694092', '58986942749', 'زرین پال', 'payed', NULL),
(69, 13, 13, '1000', ' پرداخت فاکتور : F-98.1022', '2019-12-30 22:21:21', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(70, 13, 13, '1000', 'dfasd', '2019-12-30 22:21:46', 'ACTIVE', '000000000000000000000000000143694189', '53986943509', 'زرین پال', 'payed', NULL),
(71, 13, 13, '1000', ' پرداخت فاکتور : F-98.1024', '2019-12-30 22:21:58', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(72, 1, 16, '5000', 'asdasd', '2020-02-05 14:12:05', 'ACTIVE', NULL, NULL, 'پنل مدیریت', 'payed', NULL),
(73, 16, 16, '10000', 'ssss', '2020-10-25 13:50:21', 'ACTIVE', 'A00000000000000000000000000222030312', NULL, 'زرین پال', 'unpayed', NULL),
(74, 16, 16, '500000', '545', '2020-10-25 14:30:50', 'ACTIVE', NULL, NULL, 'زرین پال', 'unpayed', NULL),
(75, 16, 16, '500000', 'ssss', '2020-10-25 14:31:38', 'ACTIVE', NULL, NULL, 'زرین پال', 'unpayed', NULL),
(76, 16, 16, '500000', 'ssss', '2020-10-25 14:32:09', 'ACTIVE', '100', NULL, 'زرین پال', 'unpayed', NULL),
(77, 16, 16, '500000', 'ssss', '2020-10-25 14:32:33', 'ACTIVE', '100', NULL, 'زرین پال', 'unpayed', NULL),
(78, 16, 16, '500000', 'ssss', '2020-10-25 14:33:33', 'ACTIVE', '100', NULL, 'زرین پال', 'unpayed', NULL),
(79, 16, 16, '500000', 'ss', '2020-10-25 14:36:23', 'ACTIVE', '100', NULL, 'زرین پال', 'unpayed', NULL),
(80, 16, 16, '30000', ' پرداخت فاکتور : F-99.0827', '2020-10-25 14:36:26', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(81, 16, 16, '30000', ' پرداخت فاکتور : F-99.0828', '2020-10-25 14:39:30', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(82, 21, 21, '500000', 'خرید کتاب', '2020-10-27 12:30:41', 'ACTIVE', '100', NULL, 'زرین پال', 'unpayed', NULL),
(83, 21, 21, '2000', ' پرداخت فاکتور : F-99.0829', '2020-10-27 12:31:26', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(84, 22, 22, '555555', 'buy', '2020-12-03 21:53:34', 'ACTIVE', '100', NULL, 'زرین پال', 'unpayed', NULL),
(85, 22, 22, '1000', ' پرداخت فاکتور : F-99.0930', '2020-12-03 21:54:05', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(86, 22, 22, '90700', ' پرداخت فاکتور : F-99.0932', '2020-12-05 20:42:22', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(87, 22, 22, '81850', ' پرداخت فاکتور : F-99.0934', '2020-12-07 12:46:20', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(88, 22, 22, '81850', ' پرداخت فاکتور : ', '2020-12-07 12:46:28', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(89, 22, 22, '44850', ' پرداخت فاکتور : F-990931', '2020-12-07 12:46:31', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(90, 22, 22, '2000', ' پرداخت فاکتور : F-99.0937', '2020-12-07 12:58:12', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(91, 22, 22, '0', ' پرداخت فاکتور : F-990938', '2020-12-07 12:58:46', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(92, 22, 22, '2000', ' پرداخت فاکتور : ', '2020-12-07 12:58:48', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(93, 22, 22, '2000', ' پرداخت فاکتور : ', '2020-12-07 12:58:49', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(94, 22, 22, '110850', ' پرداخت فاکتور : F-99.0940', '2020-12-07 13:00:49', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(95, 22, 22, '110850', ' پرداخت فاکتور : ', '2020-12-07 13:00:56', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(96, 22, 22, '1000', ' پرداخت فاکتور : F-99.0941', '2020-12-07 14:31:21', 'ACTIVE', NULL, NULL, 'پنل کاربری', 'payed', NULL),
(97, 22, 22, '9999999', 'شهریه کلاس', '2020-12-07 14:36:47', 'ACTIVE', 'A00000000000000000000000000229569790', NULL, 'زرین پال', 'unpayed', NULL),
(98, 22, 22, '999999', 'شهریه کلاس', '2020-12-07 14:37:09', 'ACTIVE', 'A00000000000000000000000000229569877', NULL, 'زرین پال', 'unpayed', NULL),
(99, 22, 22, '11111111', 'خرید کتاب', '2020-12-07 14:38:40', 'ACTIVE', 'A00000000000000000000000000229570144', NULL, 'زرین پال', 'unpayed', NULL),
(100, 22, 22, '999999', 'شهریه کلاس', '2020-12-07 14:39:17', 'ACTIVE', 'A00000000000000000000000000229570252', NULL, 'زرین پال', 'unpayed', NULL),
(101, 22, 22, '99999', 'شهریه کلاس', '2020-12-07 14:42:18', 'ACTIVE', 'A00000000000000000000000000229570794', NULL, 'زرین پال', 'unpayed', NULL),
(102, 22, 22, '9999', 'خرید کتاب', '2020-12-07 15:42:36', 'ACTIVE', 'A00000000000000000000000000229580734', NULL, 'زرین پال', 'unpayed', '');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `category` int(5) UNSIGNED DEFAULT NULL,
  `view_count` int(10) UNSIGNED DEFAULT 0,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `img_name`, `link`, `title`, `category`, `view_count`, `status`) VALUES
(4, 'nemooneh.png', 'http://nemoonehrestaurant.com', 'رستوران نمونه قزوین', 15, 18, 'ACTIVE'),
(6, '1560926083.png', 'http://aradbeauty.ir/', 'لوازم آرایش آراد', 14, 0, 'ACTIVE'),
(7, '1563097757.png', 'http://yassamin.ir/', 'لوازم آرایشی یاسمین', 14, 1, 'ACTIVE'),
(8, '1563097210.png', 'http://sibsupermarket.com/', 'هایپر مارکت سیب', 14, 0, 'ACTIVE'),
(9, '1560926151.png', 'http://arsamdecor.ir/', 'دکوراسیون داخلی ارسام', 14, 0, 'ACTIVE'),
(10, '1560926521.png', 'http://www.imtit.com', 'فناوری ریزپردازنده فراهوش', 12, 0, 'ACTIVE'),
(11, '1562748945.png', 'http://karizmadecor.ir/', 'دکوراسیون داخلی کاریزما', 14, 0, 'ACTIVE'),
(12, '1563097122.png', 'http://ghafory.ir/', 'پرده سرای غفوری', 14, 1, 'ACTIVE'),
(13, '1571057805833.png', 'http://amlakesarmayeqazvin.ir/', 'مشاور املاک سرمایه قزوین', 15, 0, 'ACTIVE'),
(15, 'dad afarin.png', 'http://dad-afarin.com/', 'ثبت شرکت دادآفرین', 11, 4, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `demo_category`
--

CREATE TABLE `demo_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `EN_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `img_count` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `cat_group` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `demo_category`
--

INSERT INTO `demo_category` (`id`, `title`, `EN_name`, `img_count`, `status`, `parent`, `cat_group`) VALUES
(11, 'سایت', '', 0, 'ACTIVE', 0, 11),
(12, 'شرکتی', '', 0, 'ACTIVE', 11, 11),
(13, 'شخصی', '', 0, 'ACTIVE', 11, 11),
(14, 'فروشگاهی', '', 0, 'ACTIVE', 11, 11),
(15, 'خدماتی', '', 0, 'ACTIVE', 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_basket`
--

CREATE TABLE `ecomm_basket` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ACTIVE','INACTIVE','DELETE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_basket`
--

INSERT INTO `ecomm_basket` (`id`, `user_id`, `product_id`, `count`, `date`, `status`) VALUES
(2, 13, 2, 1, '2019-12-31 11:30:23', 'ACTIVE'),
(3, 287, 2, 1, '2020-12-03 21:47:07', 'ACTIVE'),
(4, 23, 3, 1, '2021-12-02 15:08:51', 'ACTIVE'),
(5, 23, 1, 1, '2021-12-02 15:09:10', 'ACTIVE'),
(6, 23, 4, 1, '2021-12-02 15:09:15', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_category_attr`
--

CREATE TABLE `ecomm_category_attr` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `title` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_category_attr`
--

INSERT INTO `ecomm_category_attr` (`id`, `category_id`, `status`, `title`, `parent`) VALUES
(52, 42, 'ACTIVE', 'اطلاعات صفحات', 0),
(53, 42, 'ACTIVE', 'زبان برنامه نویسی', 0),
(54, 42, 'ACTIVE', 'php', 53),
(55, 42, 'ACTIVE', 'html', 53),
(56, 42, 'ACTIVE', 'درباره ما', 52),
(57, 42, 'ACTIVE', 'تماس با ما', 52),
(58, 42, 'ACTIVE', 'بلاگ', 52);

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_factors`
--

CREATE TABLE `ecomm_factors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_count` int(10) UNSIGNED DEFAULT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `pay_status` enum('PAID','UNPAID') COLLATE utf8_persian_ci NOT NULL DEFAULT 'UNPAID',
  `befor_pay` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `after_pay` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `pay_error` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `factor_number` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_factors`
--

INSERT INTO `ecomm_factors` (`id`, `user_name`, `user_id`, `product_count`, `amount`, `pay_status`, `befor_pay`, `after_pay`, `pay_error`, `factor_number`, `date`, `status`) VALUES
(29, 'mani محمدی', 21, 1, 2000, 'PAID', NULL, NULL, NULL, 'F-99.0829', '2020-10-27 12:29:38', 'ACTIVE'),
(30, 'مهدی محمدی', 22, 1, 1000, 'PAID', NULL, NULL, NULL, 'F-99.0930', '2020-12-03 21:53:13', 'ACTIVE'),
(31, 'مهدی محمدی', 22, 1, 44850, 'PAID', '', NULL, NULL, 'F-990931', '2020-12-05 20:41:38', 'ACTIVE'),
(32, 'مهدی محمدی', 22, 2, 90700, 'PAID', NULL, NULL, NULL, 'F-99.0932', '2020-12-05 20:42:22', 'ACTIVE'),
(33, 'مهدی محمدی', 22, 3, 81850, 'PAID', NULL, NULL, NULL, NULL, '2020-12-07 12:44:50', 'ACTIVE'),
(34, 'مهدی محمدی', 22, 3, 81850, 'PAID', NULL, NULL, NULL, 'F-99.0934', '2020-12-07 12:46:20', 'ACTIVE'),
(35, 'مهدی محمدی', 22, 1, 2000, 'PAID', NULL, NULL, NULL, NULL, '2020-12-07 12:56:52', 'ACTIVE'),
(36, 'مهدی محمدی', 22, 1, 2000, 'PAID', NULL, NULL, NULL, NULL, '2020-12-07 12:57:36', 'ACTIVE'),
(37, 'مهدی محمدی', 22, 1, 2000, 'PAID', NULL, NULL, NULL, 'F-99.0937', '2020-12-07 12:58:12', 'ACTIVE'),
(38, 'مهدی محمدی', 22, 0, 0, 'PAID', '', NULL, NULL, 'F-990938', '2020-12-07 12:58:19', 'ACTIVE'),
(39, 'مهدی محمدی', 22, 4, 110850, 'PAID', NULL, NULL, NULL, NULL, '2020-12-07 12:59:27', 'ACTIVE'),
(40, 'مهدی محمدی', 22, 4, 110850, 'PAID', NULL, NULL, NULL, 'F-99.0940', '2020-12-07 13:00:48', 'ACTIVE'),
(41, 'مهدی محمدی', 22, 1, 1000, 'PAID', NULL, NULL, NULL, 'F-99.0941', '2020-12-07 14:31:20', 'ACTIVE'),
(42, 'مهدی محمدی', 22, 2, 90700, 'UNPAID', NULL, NULL, NULL, 'F-99.0942', '2020-12-07 14:31:41', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_factor_products`
--

CREATE TABLE `ecomm_factor_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `factor_id` int(10) UNSIGNED DEFAULT NULL,
  `product_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `count` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `category` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `discount` int(10) UNSIGNED DEFAULT NULL,
  `product_status` enum('ACTIVE','INACTIVE','DELETE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_factor_products`
--

INSERT INTO `ecomm_factor_products` (`id`, `factor_id`, `product_name`, `price`, `count`, `category_id`, `category`, `discount`, `product_status`) VALUES
(37, 29, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 2, 51, NULL, 0, 'ACTIVE'),
(38, 30, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 1, 51, NULL, 0, 'ACTIVE'),
(39, 31, 'خرید', 44850, 1, NULL, 'علمی', 0, 'ACTIVE'),
(40, 32, 'خرید', 44850, 2, 51, NULL, 0, 'ACTIVE'),
(41, 32, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 1, 51, NULL, 0, 'ACTIVE'),
(42, 33, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 2, NULL, 'علمی', 0, 'ACTIVE'),
(43, 33, 'خرید', 44850, 1, NULL, 'علمی', 0, 'ACTIVE'),
(44, 33, 'تفکر نیچه', 35000, 1, NULL, 'انگیزشی', 0, 'ACTIVE'),
(45, 34, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 2, 51, NULL, 0, 'ACTIVE'),
(46, 34, 'خرید', 44850, 1, 51, NULL, 0, 'ACTIVE'),
(47, 34, 'تفکر نیچه', 35000, 1, 50, NULL, 0, 'ACTIVE'),
(48, 35, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 2, NULL, 'علمی', 0, 'ACTIVE'),
(49, 36, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 2, NULL, 'علمی', 0, 'ACTIVE'),
(50, 37, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 2, 51, NULL, 0, 'ACTIVE'),
(51, 39, 'تفکر نیچه', 35000, 1, NULL, 'انگیزشی', 0, 'ACTIVE'),
(52, 39, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 1, NULL, 'علمی', 0, 'ACTIVE'),
(53, 39, 'خرید', 44850, 1, NULL, 'علمی', 0, 'ACTIVE'),
(54, 39, 'کتاب «فراتر از قهرمانی»', 30000, 1, NULL, 'انگیزشی', 0, 'ACTIVE'),
(55, 40, 'تفکر نیچه', 35000, 1, 50, NULL, 0, 'ACTIVE'),
(56, 40, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 1, 51, NULL, 0, 'ACTIVE'),
(57, 40, 'خرید', 44850, 1, 51, NULL, 0, 'ACTIVE'),
(58, 40, 'کتاب «فراتر از قهرمانی»', 30000, 1, 50, NULL, 0, 'ACTIVE'),
(59, 41, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 1, 51, NULL, 0, 'ACTIVE'),
(60, 42, 'خلاصه کتاب «دانسته هایت را به کار بگیر»', 1000, 1, 51, NULL, 0, 'ACTIVE'),
(61, 42, 'خرید', 44850, 2, 51, NULL, 0, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_favorit`
--

CREATE TABLE `ecomm_favorit` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_favorit`
--

INSERT INTO `ecomm_favorit` (`id`, `user_id`, `product_id`, `date`) VALUES
(1, 13, 1, '2019-12-28 21:48:09'),
(2, 13, 2, '2019-12-31 11:29:31'),
(3, 16, 1, '2020-10-25 13:49:57'),
(4, 21, 1, '2020-10-27 12:27:55'),
(6, 22, 2, '2020-12-03 21:52:41'),
(7, 22, 4, '2020-12-07 12:59:02'),
(8, 23, 3, '2021-12-02 15:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_likes`
--

CREATE TABLE `ecomm_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('like','dislike') COLLATE utf8_persian_ci DEFAULT 'like'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_likes`
--

INSERT INTO `ecomm_likes` (`id`, `user_id`, `product_id`, `date`, `status`) VALUES
(27, 21, 1, '2020-10-27 12:27:49', 'like'),
(28, 21, 2, '2020-10-27 12:28:19', 'like'),
(29, 22, 3, '2020-12-03 21:51:59', 'like'),
(30, 22, 2, '2020-12-03 21:52:31', 'like'),
(31, 23, 3, '2021-12-02 15:08:50', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_menu`
--

CREATE TABLE `ecomm_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `EN_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `position` int(10) UNSIGNED DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `icon` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_menu`
--

INSERT INTO `ecomm_menu` (`id`, `name`, `EN_name`, `position`, `link`, `status`, `icon`) VALUES
(1, 'فروشگاه', 'shop', 4, 'ecomm', 'ACTIVE', 'fa fa-shop'),
(4, 'صفحه اصلی', 'home', 2, 'index', 'ACTIVE', 'fa fa-home'),
(5, 'وبلاگ', 'blog', 2, 'blog', 'ACTIVE', 'fa fa-newspaper-o'),
(6, 'درباره ما', 'about us', 2, 'about', 'ACTIVE', 'fa fa-users'),
(8, 'تماس با ما', 'contact us', 3, 'contact', 'ACTIVE', 'fa fa-phone');

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_newsletter`
--

CREATE TABLE `ecomm_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_products`
--

CREATE TABLE `ecomm_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `category` int(10) UNSIGNED DEFAULT NULL,
  `introduction` text COLLATE utf8_persian_ci DEFAULT NULL,
  `summary` text COLLATE utf8_persian_ci DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT 0,
  `pro_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `seo` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `likes` int(10) UNSIGNED DEFAULT 0,
  `dislikes` int(10) UNSIGNED DEFAULT 0,
  `view` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `discount` int(10) UNSIGNED DEFAULT 0,
  `sell_count` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_products`
--

INSERT INTO `ecomm_products` (`id`, `name`, `category`, `introduction`, `summary`, `price`, `pro_count`, `seo`, `status`, `date`, `image`, `likes`, `dislikes`, `view`, `discount`, `sell_count`) VALUES
(1, 'بونسای کد 4401', 61, '<h3>بونسای کد 4401 گلدانی مناسب روی میز</h3>\r\n', 'بونسای کد 4401', 300000, 11, 'بونسای', 'ACTIVE', '2019-12-28 12:11:43', '1617181412.jpg', 3, 0, 2, 0, 0),
(2, 'بونسای کد 4402', 60, '<h2>بونسای کد 4402 مناسب اتاق خواب</h2>\r\n', 'بونسای کد 4402', 100000, 13, 'بونسای', 'ACTIVE', '2019-12-28 20:18:32', '1617181538.jpg', 3, 0, 4, 0, 0),
(3, 'بونسای کد 4403', 59, '<p>بونسای کد 4403&nbsp; مناسب دفتر کار و اداره&nbsp;</p>\r\n', 'بونسای کد 4403', 35000, 9, 'نیچه', 'ACTIVE', '2020-10-27 09:21:54', '1617181609.jpg', 2, 0, 0, 0, 0),
(4, 'بونسای کد 4404', 51, '<p>بونسای کد 4404 مناسب راه پله و محیط اپارتمانی</p>\r\n', 'بونسای کد 4404', 250000, 55, 'بونسای', 'ACTIVE', '2020-12-03 18:35:57', '1617181681.jpg', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_product_attr`
--

CREATE TABLE `ecomm_product_attr` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `attr_id` int(10) UNSIGNED DEFAULT NULL,
  `value` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_product_attr`
--

INSERT INTO `ecomm_product_attr` (`id`, `product_id`, `attr_id`, `value`) VALUES
(1, 15, 54, 'دارد'),
(2, 15, 55, 'بله'),
(3, 15, 56, '+'),
(4, 15, 57, '+'),
(5, 15, 58, '-'),
(6, 14, 54, '4'),
(7, 14, 55, '5');

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_product_category`
--

CREATE TABLE `ecomm_product_category` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `parent` int(255) NOT NULL,
  `picurl` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `cat_group` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_product_category`
--

INSERT INTO `ecomm_product_category` (`id`, `title`, `parent`, `picurl`, `status`, `cat_group`) VALUES
(47, 'بونسای', 0, '', 'ACTIVE', 0),
(51, 'بونسای گلدانی', 47, '', 'ACTIVE', 0),
(59, 'باغچه ای', 47, '', 'ACTIVE', 0),
(60, 'اپارتمانی', 47, '', 'ACTIVE', 0),
(61, 'تزیینی', 47, '', 'ACTIVE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_product_gallery`
--

CREATE TABLE `ecomm_product_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `seo` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `main` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_product_gallery`
--

INSERT INTO `ecomm_product_gallery` (`id`, `img_name`, `product_id`, `status`, `date`, `seo`, `main`) VALUES
(12, '1617181412.jpg', 1, 'ACTIVE', '2021-03-31 13:33:33', NULL, 'ACTIVE'),
(14, '1617181538.jpg', 2, 'ACTIVE', '2021-03-31 13:35:39', NULL, 'ACTIVE'),
(15, '1617181609.jpg', 3, 'ACTIVE', '2021-03-31 13:36:49', NULL, 'ACTIVE'),
(16, '1617181681.jpg', 4, 'ACTIVE', '2021-03-31 13:38:01', NULL, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `ecomm_product_message`
--

CREATE TABLE `ecomm_product_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8_persian_ci DEFAULT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'INACTIVE',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ecomm_product_message`
--

INSERT INTO `ecomm_product_message` (`id`, `user_id`, `product_id`, `message`, `parent`, `status`, `date`) VALUES
(1, 1, 8, 'hi \r\nthis product is very goooooooood', 0, 'ACTIVE', '2019-03-10 05:57:47'),
(2, 1, 8, 'salam', 0, 'ACTIVE', '2019-03-10 07:35:21'),
(3, 1, 8, 'salam', 0, 'ACTIVE', '2019-03-10 07:43:22'),
(4, 1, 8, 'ss', 0, 'ACTIVE', '2019-03-10 08:02:36'),
(5, 1, 8, 'ss', 0, 'INACTIVE', '2019-03-10 08:02:47'),
(6, 1, 8, '11', 0, 'INACTIVE', '2019-03-10 08:05:29'),
(7, 1, 8, 'wef', 0, 'INACTIVE', '2019-03-10 08:07:01'),
(8, 9, 13, '2222', 0, 'ACTIVE', '2019-03-19 05:27:14'),
(9, 9, 12, 'resr', 0, 'INACTIVE', '2019-03-19 06:12:26'),
(10, 2, 30, 'خوبه', 0, 'ACTIVE', '2019-04-21 12:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `feed_bmi`
--

CREATE TABLE `feed_bmi` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_age` int(10) UNSIGNED DEFAULT NULL,
  `max_age` int(10) UNSIGNED DEFAULT NULL,
  `min_body` int(10) UNSIGNED DEFAULT NULL,
  `max_body` int(10) UNSIGNED DEFAULT NULL,
  `min_weight` int(10) UNSIGNED DEFAULT NULL,
  `max_weight` int(10) UNSIGNED DEFAULT NULL,
  `BMI` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feed_user_physique`
--

CREATE TABLE `feed_user_physique` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `height` int(10) UNSIGNED DEFAULT NULL,
  `weight` int(10) UNSIGNED DEFAULT NULL,
  `age` int(10) UNSIGNED DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `in_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `activity_percent` enum('30','50','75') DEFAULT NULL,
  `activity` float DEFAULT NULL,
  `sleep_time` int(10) UNSIGNED DEFAULT NULL,
  `sleep_energy` float DEFAULT NULL,
  `BMI` float DEFAULT NULL,
  `metabolism` float DEFAULT NULL,
  `eat_energy` float DEFAULT NULL COMMENT 'انرژی گرمایشی غذا',
  `spend_calory` float DEFAULT NULL,
  `need_calory` float DEFAULT NULL,
  `CHO_C` float DEFAULT NULL,
  `PRO_C` float DEFAULT NULL,
  `FAT_C` float DEFAULT NULL,
  `CHO_G` float DEFAULT NULL,
  `PRO_G` float DEFAULT NULL,
  `FAT_G` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feed_user_physique`
--

INSERT INTO `feed_user_physique` (`id`, `user_id`, `height`, `weight`, `age`, `gender`, `in_date`, `activity_percent`, `activity`, `sleep_time`, `sleep_energy`, `BMI`, `metabolism`, `eat_energy`, `spend_calory`, `need_calory`, `CHO_C`, `PRO_C`, `FAT_C`, `CHO_G`, `PRO_G`, `FAT_G`) VALUES
(9, 11, 162, 52, 27, 'MALE', '2019-11-24 22:43:46', '50', 702.4, 7, 36.4, 0.166914, 1404.8, 207.08, 2277.88, 1777.88, 977.834, 266.682, 533.364, 244.458, 66.6705, 59.2627),
(10, 11, 162, 52, 27, 'MALE', '2019-11-24 22:46:36', '50', 702.4, 7, 36.4, 0.166914, 1404.8, 207.08, 2277.88, 1777.88, 977.834, 266.682, 533.364, 244.458, 66.6705, 59.2627),
(11, 11, 162, 52, 27, 'MALE', '2019-11-24 22:47:03', '50', 702.4, 7, 36.4, 0.166914, 1404.8, 207.08, 2277.88, 1777.88, 977.834, 266.682, 533.364, 244.458, 66.6705, 59.2627),
(12, 11, 52, 22, 7, 'FEMALE', '2019-11-24 22:48:58', '30', 173.94, 4, 8.8, 0.0930769, 579.8, 74.494, 819.434, 319.434, 175.689, 47.9151, 95.8302, 43.9222, 11.9788, 10.6478),
(13, 11, 162, 52, 27, 'MALE', '2019-11-30 07:56:13', '50', 70125, 7, 36.4, 19.8141, 1402.5, 7152.75, 78643.9, 79143.9, 43529.1, 11871.6, 23743.2, 10882.3, 2967.89, 2638.13),
(14, 11, 162, 52, 27, 'MALE', '2019-11-30 07:57:43', '50', 701.25, 7, 36.4, 19.8141, 1402.5, 210.375, 2277.73, 2777.73, 1527.75, 416.659, 833.318, 381.937, 104.165, 92.5908),
(15, 11, 162, 52, 27, 'MALE', '2019-11-30 08:06:31', '50', 701.25, 7, 36.4, 19.8141, 1402.5, 210.375, 2277.73, 2777.73, 1527.75, 416.659, 833.318, 381.937, 104.165, 92.5908),
(16, 11, 104, 34, 20, 'MALE', '2019-11-30 11:46:28', '50', 447.5, 4, 13.6, 31.4349, 895, 134.25, 1463.15, 963.15, 529.732, 144.473, 288.945, 132.433, 36.1181, 32.105),
(17, 11, 162, 43, 28, 'MALE', '2019-11-30 11:47:15', '50', 653.75, 7, 30.1, 16.3847, 1307.5, 196.125, 2127.27, 2627.27, 1445, 394.091, 788.182, 361.25, 98.5228, 87.5758),
(18, 11, 162, 68, 28, 'MALE', '2019-11-30 11:48:04', '50', 778.75, 7, 47.6, 25.9107, 1557.5, 233.625, 2522.27, 2022.28, 1112.25, 303.341, 606.682, 278.063, 75.8353, 67.4092),
(19, 11, 162, 52, 28, 'MALE', '2019-11-30 11:48:22', '50', 698.75, 7, 36.4, 19.8141, 1397.5, 209.625, 2269.48, 2769.48, 1523.21, 415.421, 830.843, 380.803, 103.855, 92.3158),
(20, 12, 103, 34, 17, 'MALE', '2019-11-30 12:04:28', '50', 451.875, 4, 13.6, 32.0483, 903.75, 135.562, 1477.59, 977.588, 537.673, 146.638, 293.276, 134.418, 36.6595, 32.5863),
(21, 11, 102, 31, 17, 'MALE', '2019-11-30 12:27:32', '50', 433.75, 4, 12.4, 29.7962, 867.5, 130.125, 1418.97, 918.975, 505.436, 137.846, 275.693, 126.359, 34.4616, 30.6325),
(22, 11, 106, 38, 16, 'MALE', '2019-11-30 17:03:14', '50', 483.75, 12, 45.6, 33.8199, 967.5, 145.125, 1550.78, 1050.78, 577.926, 157.616, 315.233, 144.482, 39.4041, 35.0258),
(23, 11, 162, 53, 27, 'MALE', '2019-12-11 06:23:57', '50', 706.25, 7, 37.1, 20.1951, 1412.5, 211.875, 2293.52, 2293.52, 1261.44, 344.029, 688.057, 315.36, 86.0072, 76.4508),
(24, 11, 162, 54, 28, 'MALE', '2019-12-31 09:33:04', '50', 708.75, 6, 32.4, 20.5761, 1417.5, 212.625, 2306.48, 2306.48, 1268.56, 345.971, 691.943, 317.14, 86.4928, 76.8825),
(25, 11, 131, 52, 16, 'MALE', '2020-02-03 20:37:16', '50', 631.875, 13, 67.6, 30.3013, 1263.75, 189.562, 2017.59, 2017.59, 1109.67, 302.638, 605.276, 277.418, 75.6595, 67.2529),
(26, 11, 130, 51, 17, 'MALE', '2020-02-03 21:29:34', '30', 372.75, 12, 61.2, 30.1775, 1242.5, 161.525, 1715.57, 1715.57, 943.566, 257.336, 514.672, 235.892, 64.3341, 57.1858),
(27, 16, 131, 52, 18, 'MALE', '2020-02-03 21:32:56', '50', 626.875, 12, 62.4, 30.3013, 1253.75, 188.062, 2006.29, 2006.29, 1103.46, 300.943, 601.886, 275.865, 75.2358, 66.8763),
(28, 16, 164, 82, 21, 'MALE', '2020-02-05 10:15:03', '30', 523.5, 6, 49.2, 30.4878, 1745, 226.85, 2446.15, 2446.15, 1345.38, 366.922, 733.845, 336.346, 91.7306, 81.5383),
(29, 16, 162, 55, 28, 'MALE', '2020-02-05 10:23:59', '50', 713.75, 6, 33, 20.9572, 1427.5, 214.125, 2322.38, 2322.38, 1277.31, 348.356, 696.713, 319.327, 87.0891, 77.4125),
(30, 19, 168, 62, 25, 'MALE', '2020-02-08 03:25:39', '30', 465, 7, 43.4, 21.9671, 1550, 201.5, 2173.1, 2173.1, 1195.2, 325.965, 651.93, 298.801, 81.4912, 72.4367);

-- --------------------------------------------------------

--
-- Table structure for table `food_unit`
--

CREATE TABLE `food_unit` (
  `id` int(10) UNSIGNED NOT NULL,
  `calori_min` int(10) UNSIGNED DEFAULT NULL,
  `calori_max` int(10) UNSIGNED DEFAULT NULL,
  `dairy_asc` int(10) UNSIGNED DEFAULT NULL,
  `dairy_desc` int(10) UNSIGNED DEFAULT NULL,
  `vegetable_asc` int(10) UNSIGNED DEFAULT NULL,
  `vegetable_desc` int(10) UNSIGNED DEFAULT NULL,
  `fruit_asc` int(10) UNSIGNED DEFAULT NULL,
  `fruit_desc` int(10) UNSIGNED DEFAULT NULL,
  `sugar_asc` int(10) UNSIGNED DEFAULT NULL,
  `sugar_desc` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_unit`
--

INSERT INTO `food_unit` (`id`, `calori_min`, `calori_max`, `dairy_asc`, `dairy_desc`, `vegetable_asc`, `vegetable_desc`, `fruit_asc`, `fruit_desc`, `sugar_asc`, `sugar_desc`, `status`) VALUES
(1, 500, 1500, 2, 2, 3, 3, 2, 2, 2, 1, 'ACTIVE'),
(2, 1501, 2000, 2, 2, 3, 3, 3, 2, 3, 2, 'ACTIVE'),
(3, 2001, 2500, 3, 3, 4, 4, 4, 3, 4, 3, 'ACTIVE'),
(4, 2501, 3000, 3, 3, 5, 5, 5, 4, 5, 4, 'ACTIVE'),
(5, 3001, 3500, 4, 3, 5, 5, 6, 5, 5, 4, 'ACTIVE'),
(6, 3501, 4000, 4, 4, 5, 5, 6, 5, 5, 5, 'ACTIVE'),
(7, 4001, 10000, 4, 4, 5, 5, 6, 5, 0, 0, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_persian_ci NOT NULL DEFAULT '#',
  `alt` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `text` text COLLATE utf8_persian_ci DEFAULT NULL,
  `slider` enum('YES','NO') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO',
  `img_show` enum('YES','NO') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO',
  `category` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img_name`, `link`, `alt`, `title`, `text`, `slider`, `img_show`, `category`) VALUES
(25, 'joniper.jpg', '#', NULL, NULL, NULL, 'YES', 'NO', NULL),
(27, 'Untitled.png', '#', NULL, NULL, NULL, 'YES', 'NO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE `gallery_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `img_count` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `title`, `img_count`, `status`) VALUES
(5, 'کودک 2', 1, 'ACTIVE'),
(6, 'تست', 0, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `idea_room_employ`
--

CREATE TABLE `idea_room_employ` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `age` varchar(3) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('NEW','SEEN') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NEW',
  `comment` text COLLATE utf8_persian_ci DEFAULT NULL,
  `creat_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `idea_room_employ`
--

INSERT INTO `idea_room_employ` (`id`, `name`, `age`, `mobile`, `status`, `comment`, `creat_date`) VALUES
(1, 'mani', '27', '09191930406', 'SEEN', 'i like it', '2019-01-22 14:31:44'),
(26, 'mani', '27', '09191930402', 'SEEN', 'i like it', '2019-01-22 14:31:44'),
(27, 'mani', '27', '09191930406', 'SEEN', 'i like it', '2019-01-22 14:31:44'),
(28, 'mani', '27', '09191930402', 'SEEN', 'i like it', '2019-01-22 14:31:44'),
(29, 'mani', '27', '09191930406', 'SEEN', 'i like it', '2019-01-22 14:31:44'),
(30, 'mani', '27', '09191930402', 'SEEN', 'i like it', '2019-01-22 14:31:44'),
(31, 'mani', '27', '09191930406', 'SEEN', 'i like it', '2019-01-22 14:31:44'),
(32, 'mani', '27', '09191930402', 'SEEN', 'i like it', '2019-01-22 14:31:44'),
(33, 'ali', '', '09123456789', 'SEEN', 'i am mani mohamadi twoeny years old and a smart boy\r\niam  a progammer\r\ni work very hardly becous i need a big success\r\ni am going to travel to enother contry like american or canada', '2019-01-22 15:22:07'),
(34, 'mani', '', '0919193040622', 'NEW', 'sqwdqwdqwdwdqwdqwdwd\r\nqwd\r\nqwdqwdqwd\r\nwq qwdwqdqdwd\r\nqw wd\r\nqwdqwdsqwdqwdqwdwdqwdqwdwd\r\nqwd\r\nqwdqwdqwd\r\nwq qwdwqdqdwd\r\nqw wd\r\nqwdqwd', '2019-04-23 12:16:03'),
(35, 'مهدی محمدی', '', '09918222426', 'NEW', 'unset($_SESSION[&quot;captcha_answer_idea&quot;]);   unset($_SESSION[&quot;captcha_answer_idea&quot;]);   unset($_SESSION[&quot;captcha_answer_idea&quot;]);   unset($_SESSION[&quot;captcha_answer_idea&quot;]);   unset($_SESSION[&quot;captcha_answer_idea&quot;]);   unset($_SESSION[&quot;captcha_answer_idea&quot;]);   unset($_SESSION[&quot;captcha_answer_idea&quot;]);   unset($_SESSION[&quot;captcha_answer_idea&quot;]);', '2019-04-23 15:03:15'),
(36, 'mani', '', '0919188304061', 'NEW', 'unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);', '2019-04-23 15:13:37'),
(37, 'mani', '', '09191884061', 'NEW', 'unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);', '2019-04-23 15:13:52'),
(38, 'mani', '', '09191884161', 'NEW', 'unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);', '2019-04-23 15:30:10'),
(39, 'mani', '', '09191384161', 'NEW', 'unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);\r\n   unset($_SESSION[&quot;captcha_answer_idea&quot;]);', '2019-04-23 15:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `institute_class`
--

CREATE TABLE `institute_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED DEFAULT NULL,
  `lang_id` int(10) UNSIGNED DEFAULT NULL,
  `lang_level` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `class_type` enum('public','semiprivate','private') COLLATE utf8_persian_ci DEFAULT 'public',
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `tuition` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `capacity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `registered` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `session_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `institute_class`
--

INSERT INTO `institute_class` (`id`, `term_id`, `lang_id`, `lang_level`, `class_type`, `teacher_id`, `tuition`, `capacity`, `registered`, `session_count`, `status`, `user_id`) VALUES
(7, 1, 2, '2', 'public', 219, 600000, 10, 3, 17, 'ACTIVE', 1),
(8, 3, 1, 'tttttt', 'public', 219, 500000, 12, 0, 15, 'ACTIVE', 1),
(9, 4, 2, '2', 'private', 220, 400000, 11, 0, 18, 'ACTIVE', 1),
(10, 4, 1, 'advanse', 'private', 220, 300000, 10, 2, 15, 'ACTIVE', 1),
(11, 4, 2, '4', 'public', 220, 365000, 10, 1, 15, 'ACTIVE', 1),
(12, 4, 1, 'advance', 'semiprivate', 220, 500000, 11, 0, 17, 'ACTIVE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `institute_class_time`
--

CREATE TABLE `institute_class_time` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `day` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `time` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `persion_name` varchar(12) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `institute_class_time`
--

INSERT INTO `institute_class_time` (`id`, `class_id`, `day`, `time`, `status`, `user_id`, `persion_name`) VALUES
(32, 9, 'sat', '11', 'ACTIVE', 1, NULL),
(33, 9, 'sun', '12', 'ACTIVE', 1, NULL),
(34, 9, 'mon', '14', 'ACTIVE', 1, NULL),
(35, 9, 'tue', '13', 'ACTIVE', 1, NULL),
(36, 9, 'wed', '15', 'ACTIVE', 1, NULL),
(37, 9, 'thu', '16', 'ACTIVE', 1, NULL),
(76, 8, 'sun', '12', 'ACTIVE', 1, NULL),
(77, 8, 'mon', '14', 'ACTIVE', 1, NULL),
(78, 8, 'wed', '15', 'ACTIVE', 1, NULL),
(86, 7, 'sat', '11', 'ACTIVE', 1, NULL),
(87, 7, 'sun', '12', 'ACTIVE', 1, NULL),
(88, 7, 'mon', '14', 'ACTIVE', 1, NULL),
(89, 7, 'tue', '13', 'ACTIVE', 1, NULL),
(111, 11, 'sun', '18', 'ACTIVE', 1, ' یک شنبه '),
(112, 11, 'mon', '14', 'ACTIVE', 1, ' دو شنبه '),
(113, 11, 'tue', '13', 'ACTIVE', 1, ' سه شنبه '),
(114, 12, 'sat', '12', 'ACTIVE', 1, ' شنبه '),
(115, 12, 'sun', '12', 'ACTIVE', 1, ' یک شنبه '),
(116, 12, 'mon', '14', 'ACTIVE', 1, ' دو شنبه '),
(117, 12, 'tue', '13', 'ACTIVE', 1, ' سه شنبه '),
(118, 12, 'wed', '15', 'ACTIVE', 1, ' چهار شنبه '),
(119, 10, 'sat', '18', 'ACTIVE', 1, 'شنبه'),
(120, 10, 'sun', '12', 'ACTIVE', 1, 'یک شنبه'),
(121, 10, 'mon', '14', 'ACTIVE', 1, 'دو شنبه'),
(122, 10, 'tue', '13', 'ACTIVE', 1, 'سه شنبه'),
(123, 10, 'wed', '16', 'ACTIVE', 1, 'چهار شنبه');

-- --------------------------------------------------------

--
-- Table structure for table `institute_langs`
--

CREATE TABLE `institute_langs` (
  `id` int(11) NOT NULL,
  `lang_name` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `lang_level` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `institute_langs`
--

INSERT INTO `institute_langs` (`id`, `lang_name`, `lang_level`, `status`) VALUES
(1, 'انگلیسی', 'elementry , advance , bigner,sss,tttttt', 'ACTIVE'),
(2, 'persion', '1,2,3,4', 'ACTIVE'),
(3, 'arabi', '1,2,3,4,5', 'ACTIVE'),
(4, 'روسی', '1,2,3,4', 'ACTIVE'),
(5, 'spanish', '1,2', 'ACTIVE'),
(6, 'germany', '1,2,3', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `institute_onvacation`
--

CREATE TABLE `institute_onvacation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ACTIVE','INACTIVE','REQUEST') COLLATE utf8_persian_ci NOT NULL DEFAULT 'REQUEST',
  `reason` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `clerk_id` int(10) UNSIGNED DEFAULT NULL,
  `v_day` varchar(5) COLLATE utf8_persian_ci DEFAULT NULL,
  `v_hour` varchar(2) COLLATE utf8_persian_ci DEFAULT NULL,
  `persion_name` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `institute_onvacation`
--

INSERT INTO `institute_onvacation` (`id`, `user_id`, `class_id`, `request_date`, `status`, `reason`, `clerk_id`, `v_day`, `v_hour`, `persion_name`) VALUES
(4, 223, 11, '2019-11-19 14:56:54', 'ACTIVE', 'asdasd', NULL, '  sun', '18', '  یک شنبه '),
(5, 223, 10, '2019-11-19 14:56:59', 'REQUEST', 'asdad', NULL, '  sat', '18', ' شنبه '),
(6, 223, 10, '2019-11-19 14:57:34', 'REQUEST', 'xvc', NULL, '  sun', '12', ' یک شنبه '),
(7, 223, 11, '2019-11-19 14:58:28', 'REQUEST', 'df', NULL, '  sun', '18', '  یک شنبه ');

-- --------------------------------------------------------

--
-- Table structure for table `institute_terms`
--

CREATE TABLE `institute_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `term_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `register_start_time` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `register_end_time` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `term_start_time` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `term_end_time` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `insert_user_id` int(5) UNSIGNED NOT NULL DEFAULT 0,
  `update_user_id` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `institute_terms`
--

INSERT INTO `institute_terms` (`id`, `term_name`, `register_start_time`, `register_end_time`, `term_start_time`, `term_end_time`, `status`, `create_date`, `insert_user_id`, `update_user_id`) VALUES
(1, 'paeez', '25-7', '15-8', '15-8', '15-11', 'ACTIVE', '2019-10-28 13:15:21', 1, 0),
(3, 'summer', '8/15', '8/25', '8/25', '11/25', 'ACTIVE', '2019-10-28 14:17:00', 1, 1),
(4, 'پاییز', '1398/8/6', '1398/8/13', '1398/8/13', '1398/8/30', 'ACTIVE', '2019-10-28 14:40:09', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `institute_tickets`
--

CREATE TABLE `institute_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8_persian_ci DEFAULT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `seen_status` enum('NEW','OLD') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NEW',
  `sender_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `institute_tickets`
--

INSERT INTO `institute_tickets` (`id`, `user_id`, `partner_id`, `message`, `parent`, `status`, `date`, `seen_status`, `sender_id`) VALUES
(11, 223, 1, 'sss', 0, 'ACTIVE', '2019-11-18 10:57:53', 'NEW', 223),
(12, 223, 1, 'asdASd sdasdas', 0, 'ACTIVE', '2019-11-18 11:07:43', 'NEW', 223),
(13, 223, 1, 'noooooo nooo noooo', 17, 'ACTIVE', '2019-11-18 11:07:43', 'NEW', 1),
(14, 223, 1, 'yess', 0, 'ACTIVE', '2019-11-18 11:16:32', 'NEW', 223),
(15, 223, 1, 'ss1ss22s2', 17, 'ACTIVE', '2019-11-18 11:07:43', 'NEW', 1),
(16, 223, 1, 'test for manager', 0, 'ACTIVE', '2019-11-18 11:25:12', 'NEW', 223),
(17, 223, 1, 'my name is mani mohamadi', 0, 'ACTIVE', '2019-11-18 11:25:28', 'NEW', 223),
(19, 223, 1, 'سلام روز بخیر کلاسهای ریاضی هم دارید؟', 0, 'ACTIVE', '2019-11-18 12:29:40', 'NEW', 223),
(27, 223, 1, 'کلاس زبان چرا کنسل شد؟', 0, 'ACTIVE', '2019-11-18 13:08:32', 'NEW', 223),
(28, 13, 1, 'tttttt', 0, 'ACTIVE', '2019-12-31 08:50:53', 'NEW', 13),
(29, 13, 1, 'rrrrr', 0, 'ACTIVE', '2019-12-31 08:51:00', 'NEW', 13);

-- --------------------------------------------------------

--
-- Table structure for table `institute_users`
--

CREATE TABLE `institute_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `credit` int(9) DEFAULT 0,
  `user_type` enum('teacher','student') DEFAULT 'student',
  `ashnaei` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `family` varchar(50) DEFAULT NULL,
  `birthdate` varchar(13) DEFAULT NULL,
  `code_meli` varchar(10) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `emergency_phone` varchar(12) DEFAULT NULL,
  `education` varchar(20) DEFAULT NULL,
  `study_field` varchar(30) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `carte_meli_img` varchar(20) DEFAULT NULL,
  `register_date` timestamp NULL DEFAULT current_timestamp(),
  `last_login` varchar(20) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `gender` enum('MALE','FEMALE') DEFAULT 'MALE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `institute_users`
--

INSERT INTO `institute_users` (`id`, `username`, `password`, `email`, `credit`, `user_type`, `ashnaei`, `name`, `family`, `birthdate`, `code_meli`, `state`, `city`, `address`, `postal_code`, `phone`, `mobile`, `emergency_phone`, `education`, `study_field`, `picture`, `carte_meli_img`, `register_date`, `last_login`, `status`, `gender`) VALUES
(20, 'safura', '$2y$12$nDlbcf5Xa2FNJbMi172/Iu4MAaz4j47Ik2i43twzBUVVaULaMc4je', NULL, 0, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09036465129', NULL, NULL, NULL, NULL, NULL, '2020-10-25 19:27:36', '1399/8/4 - 10:57:36', 'INACTIVE', 'MALE'),
(21, '1234567890', '$2y$12$fG9fDU/F93WSVd6ZnmEDf.L9Y2DQG9E3dBwsw0nZRRo6MtbtiFKwq', 'mohamadimahdi@yahoo.com', 498000, 'student', 'تبلیغات در سطح شهر', 'mani', 'محمدی', '1399/8/13', '234234234', 'قزوین', 'dssd', 'sdfsd', '23423423', '09191930406', '09191930406', '02811111111', 'لیسانس', 'software', '1603788918.jpg', NULL, '2020-10-27 08:54:49', '1399/8/6 - 12:24:49', 'ACTIVE', 'MALE'),
(22, '1111111111', '$2y$12$MSWQnsBGUhS0HQzM2hGiBua9G.cizYhK906Avv0M5DtKWupk3F1H.', 'sarahashemi@yahoo.com', 26605, 'student', 'تبلیغات پیامکی', 'مهدی', 'محمدی', '1384/1/15', '4345345345', 'قزوین', 'تهران', 'تهران', '23423423', '9191930406', '09191950406', '0919111111', 'لیسانس', 'software', '1607019583.jpg', NULL, '2020-12-03 18:19:08', '1399/9/17 - 03:25:16', 'ACTIVE', 'MALE'),
(23, '11111111', '$2y$12$tAOWg7vH9/GLkuZd1nVw/ejB7kgtQqVVly0fhtumElHBaRYSGDNfa', NULL, 0, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09191930401', NULL, NULL, NULL, NULL, NULL, '2021-12-02 11:38:14', '1400/9/11 - 03:08:14', 'ACTIVE', 'MALE');

-- --------------------------------------------------------

--
-- Table structure for table `institute_users_class`
--

CREATE TABLE `institute_users_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp(),
  `class_mark` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `class_comment` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `final_mark` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `final_comment` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `institute_users_class`
--

INSERT INTO `institute_users_class` (`id`, `user_id`, `class_id`, `register_date`, `class_mark`, `class_comment`, `final_mark`, `final_comment`, `status`) VALUES
(21, 223, 11, '2019-11-10 15:00:20', 16, 'درس بخون پسر', 15, 'بی سواد', 'ACTIVE'),
(24, 222, 10, '2019-11-11 05:12:31', 0, NULL, 0, '', 'ACTIVE'),
(25, 223, 10, '2019-11-11 05:32:22', 18, NULL, 0, 'بخووون', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `institute_users_level`
--

CREATE TABLE `institute_users_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `lang_id` int(10) UNSIGNED DEFAULT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ACTIVE','INACTIVE','REQUEST') COLLATE utf8_persian_ci DEFAULT 'REQUEST',
  `user_level` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `exam_date` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `clerk_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `institute_users_level`
--

INSERT INTO `institute_users_level` (`id`, `user_id`, `lang_id`, `request_date`, `status`, `user_level`, `exam_date`, `clerk_id`) VALUES
(6, 223, 2, '2019-11-09 06:04:54', 'REQUEST', '4', NULL, NULL),
(7, 223, 1, '2019-11-09 06:04:57', 'REQUEST', 'advanse', NULL, NULL),
(8, 218, 1, '2019-11-11 05:36:17', 'REQUEST', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `license_api`
--

CREATE TABLE `license_api` (
  `id` int(10) UNSIGNED NOT NULL,
  `token_key` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `exp_date` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `domain` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_info` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'INACTIVE',
  `DB_name` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_name` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `host_name` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `license_api`
--

INSERT INTO `license_api` (`id`, `token_key`, `register_date`, `last_update`, `exp_date`, `domain`, `user_info`, `status`, `DB_name`, `user_name`, `password`, `host_name`) VALUES
(1, '7c4116017d818f418687c1a777c181a85gyu6325', '2019-10-19 22:19:39', '1571511550', '1571515900', 'http://www.bamboweb.ir', 'mani mohamadi', 'ACTIVE', 'imtit_old', 'root', ' ', 'localhost');

-- --------------------------------------------------------

--
-- Table structure for table `mirrormx_customer_chat_message`
--

CREATE TABLE `mirrormx_customer_chat_message` (
  `id` bigint(20) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `talk_id` bigint(20) NOT NULL,
  `is_new` char(1) NOT NULL DEFAULT 'y',
  `from_user_info` text NOT NULL,
  `to_user_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mirrormx_customer_chat_message`
--

INSERT INTO `mirrormx_customer_chat_message` (`id`, `from_id`, `to_id`, `body`, `datetime`, `talk_id`, `is_new`, `from_user_info`, `to_user_info`) VALUES
(1, 2, 1, 'salam', '2019-02-02 13:18:04', 1, 'n', '{\"id\":\"2\",\"name\":\"mani-1549113479\",\"mail\":\"mahdi@mohamdi110.com\",\"image\":\"\\/imtit\\/public\\/admin\\/chat\\/pslivechat\\/upload\\/default-avatars\\/a.png\",\"info\":{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"},\"roles\":[\"GUEST\"],\"last_activity\":\"2019-02-02 14:18:03\"}', 'all'),
(2, 1, 2, 'salam', '2019-02-02 13:18:20', 1, 'n', '{\"id\":\"1\",\"name\":\"admin2\",\"mail\":\"mohamdimahdi@yahoo.com\",\"roles\":[\"OPERATOR\"],\"last_activity\":\"2019-02-02 14:18:17\",\"7\":\"2019-02-02 14:18:17\"}', '{\"id\":\"2\",\"name\":\"mani-1549113479\",\"mail\":\"mahdi@mohamdi110.com\",\"image\":\"\\/imtit\\/public\\/admin\\/chat\\/pslivechat\\/upload\\/default-avatars\\/a.png\",\"info\":{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"},\"roles\":[\"GUEST\"],\"last_activity\":\"2019-02-02 14:18:19\"}'),
(3, 2, 1, ';lskxioadcdc', '2019-02-02 13:18:28', 1, 'n', '{\"id\":\"2\",\"name\":\"mani-1549113479\",\"mail\":\"mahdi@mohamdi110.com\",\"image\":\"\\/imtit\\/public\\/admin\\/chat\\/pslivechat\\/upload\\/default-avatars\\/a.png\",\"info\":{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"},\"roles\":[\"GUEST\"],\"last_activity\":\"2019-02-02 14:18:23\"}', '{\"id\":\"1\",\"name\":\"admin2\",\"mail\":\"mohamdimahdi@yahoo.com\",\"roles\":[\"OPERATOR\"],\"last_activity\":\"2019-02-02 14:18:17\",\"7\":\"2019-02-02 14:18:17\"}'),
(4, 1, 2, 'fvwerw', '2019-02-02 13:18:39', 1, 'n', '{\"id\":\"1\",\"name\":\"admin2\",\"mail\":\"mohamdimahdi@yahoo.com\",\"roles\":[\"OPERATOR\"],\"last_activity\":\"2019-02-02 14:18:37\",\"7\":\"2019-02-02 14:18:37\"}', '{\"id\":\"2\",\"name\":\"mani-1549113479\",\"mail\":\"mahdi@mohamdi110.com\",\"image\":\"\\/imtit\\/public\\/admin\\/chat\\/pslivechat\\/upload\\/default-avatars\\/a.png\",\"info\":{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"},\"roles\":[\"GUEST\"],\"last_activity\":\"2019-02-02 14:18:33\"}'),
(5, 3, 1, 'wefwefwef', '2019-02-02 14:00:57', 2, 'n', '{\"id\":\"3\",\"name\":\"dqwdq-1549116054\",\"mail\":\"add@efwef.com\",\"image\":\"\\/imtit\\/chat\\/upload\\/default-avatars\\/a.png\",\"info\":{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"},\"roles\":[\"GUEST\"],\"last_activity\":\"2019-02-02 15:00:56\"}', 'all'),
(6, 1, 3, 'hzth', '2019-02-02 14:01:03', 2, 'n', '{\"id\":\"1\",\"name\":\"admin2\",\"mail\":\"mohamdimahdi@yahoo.com\",\"roles\":[\"OPERATOR\"],\"last_activity\":\"2019-02-02 15:00:59\",\"7\":\"2019-02-02 15:00:59\"}', '{\"id\":\"3\",\"name\":\"dqwdq-1549116054\",\"mail\":\"add@efwef.com\",\"image\":\"\\/imtit\\/chat\\/upload\\/default-avatars\\/a.png\",\"info\":{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"},\"roles\":[\"GUEST\"],\"last_activity\":\"2019-02-02 15:01:02\"}'),
(7, 3, 1, 'efefef', '2019-02-02 14:01:10', 2, 'n', '{\"id\":\"3\",\"name\":\"dqwdq-1549116054\",\"mail\":\"add@efwef.com\",\"image\":\"\\/imtit\\/chat\\/upload\\/default-avatars\\/a.png\",\"info\":{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"},\"roles\":[\"GUEST\"],\"last_activity\":\"2019-02-02 15:01:07\"}', '{\"id\":\"1\",\"name\":\"admin2\",\"mail\":\"mohamdimahdi@yahoo.com\",\"roles\":[\"OPERATOR\"],\"last_activity\":\"2019-02-02 15:00:59\",\"7\":\"2019-02-02 15:00:59\"}');

-- --------------------------------------------------------

--
-- Table structure for table `mirrormx_customer_chat_user`
--

CREATE TABLE `mirrormx_customer_chat_user` (
  `id` bigint(20) NOT NULL,
  `name` char(32) NOT NULL,
  `mail` char(64) NOT NULL,
  `password` char(255) NOT NULL,
  `image` char(128) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `roles` char(128) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mirrormx_customer_chat_user`
--

INSERT INTO `mirrormx_customer_chat_user` (`id`, `name`, `mail`, `password`, `image`, `info`, `roles`, `last_activity`) VALUES
(2, 'mani-1549113479', 'mahdi@mohamdi110.com', 'x', '/imtit/public/admin/chat/pslivechat/upload/default-avatars/a.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"}', 'GUEST', '2019-02-02 10:51:33'),
(3, 'dqwdq-1549116054', 'add@efwef.com', 'x', '/imtit/chat/upload/default-avatars/a.png', '{\"ip\":\"::1\",\"referer\":\"http:\\/\\/localhost\\/imtit\\/\"}', 'GUEST', '2019-02-02 11:59:42'),
(4, 'mohamadimani', 'mohamadimahdi@yahoo.com', '74c2fdac4a1e0f250e8eaa258a25bf7508cc6eb3', NULL, NULL, 'OPERATOR', '2019-02-12 04:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `options` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `EN_name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `category` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `options`, `value`, `EN_name`, `category`, `status`) VALUES
(1, 'آدرس', 'تهران، خیابان قائم مقام فراهانی، کوچه هشتم پلاک 4', 'address', '', 'ACTIVE'),
(2, 'نام سایت', 'فروشگاه بونسای', 'site_name', '', 'ACTIVE'),
(3, 'توضیحات سایت', 'فروش گیاه زینتی بونسای', 'site_description', '', 'ACTIVE'),
(4, 'تلفن', '09191930406', 'phone', '', 'ACTIVE'),
(5, 'موبایل', '09191930406', 'mobile', '', 'ACTIVE'),
(6, 'لوگوی سایت', '1638446658.png', 'site_logo', '', 'ACTIVE'),
(7, 'کلمات کلیدی', 'گل،گل زینتی،بونسای ، آپارتمانی ، رو میزی ،', 'keywords', '', 'ACTIVE'),
(8, 'ایمیل', 'mohamadimahdi@yahoo.com', 'email', '', 'ACTIVE'),
(9, 'رنگ منوی اصلی - راست', '#480048', 'main_menu_right', 'color', 'ACTIVE'),
(10, 'رنگ منوی اصلی - چپ', '#c04848', 'main_menu_left', 'color', 'ACTIVE'),
(11, 'رنگ منوی اصلی - متن', '#ffffff', 'main_menu_text', 'color', 'ACTIVE'),
(12, 'رنگ دکمه ها - زمینه', '#c04848', 'btn_back_color', 'color', 'ACTIVE'),
(13, 'رنگ دکمه ها - متن', '#ffffff', 'btn_text_color', 'color', 'ACTIVE'),
(14, 'رنگ دکمه های ادامه مطلب - متن', '#c04848', 'more_btn_text_color', 'color', 'ACTIVE'),
(15, 'رنگ دکمه های ادامه مطلب - زمینه', '#c04848', 'more_btn_border_color', 'color', 'ACTIVE'),
(16, 'رنگ دکمه خبرنامه - زمینه', '#c04848', 'newslatter_btn_back_color', 'color', 'ACTIVE'),
(17, 'رنگ دکمه خبرنامه - متن', '#ffffff', 'newslatter_btn_text_color', 'color', 'ACTIVE'),
(18, 'رنگ خدمات ما - زمینه', '#2d2d2d', 'service_back_color', 'color', 'ACTIVE'),
(19, 'رنگ خدمات ما - متن', '#c04848', 'service_text_color', 'color', 'ACTIVE'),
(20, 'رنگ دکمه ها هاور- زمینه', '#c04848', 'btn_hover_back_color', 'color', 'ACTIVE'),
(21, 'رنگ دکمه ها هاور- متن', '#ffffff', 'btn_hover_text_color', 'color', 'ACTIVE'),
(22, 'رنگ ایکون شبکه اجتماعی', '#ffffff', 'social_icon_color', 'color', 'ACTIVE'),
(23, 'رنگ تب دسته بندی مدیا - زمینه', '#c04848', 'media_tab_back_color', 'color', 'ACTIVE'),
(24, 'رنگ تب دسته بندی مدیا - متن', '#ffffff', 'media_tab_text_color', 'color', 'ACTIVE'),
(25, 'رنگ زیرخط ها ', '#255ee2', 'unders_color', 'color', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `page_views_log`
--

CREATE TABLE `page_views_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `views` int(10) UNSIGNED NOT NULL,
  `user_ip` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `view_date` varchar(100) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `page_views_log`
--

INSERT INTO `page_views_log` (`id`, `page_name`, `views`, `user_ip`, `view_date`) VALUES
(0, 'index', 1, '::1', '1625754442'),
(157, 'index', 8, '127.0.0.12', '1577189489'),
(158, 'index', 20, '127.0.0.11', '1577190517'),
(159, 'index', 169, '127.0.0.1', '1577207494'),
(160, 'index', 304, '127.0.0.1', '1577278605'),
(161, 'index', 1, '::1', '1577267559'),
(162, 'index', 206, '127.0.0.1', '1577564779'),
(163, 'index', 22, '127.0.0.1', '1577622330'),
(164, 'index', 96, '127.0.0.1', '1577731889'),
(165, 'index', 34, '127.0.0.1', '1577784988'),
(166, 'index', 1, '::1', '1578297612'),
(167, 'index', 2, '::1', '1580054230'),
(168, 'index', 1, '::1', '1580152511'),
(169, 'index', 2, '::1', '1580203612'),
(170, 'index', 1, '::1', '1580592508'),
(171, 'index', 2, '::1', '1580899219'),
(172, 'index', 1, '::1', '1581711118'),
(173, 'index', 1, '::1', '1582273790'),
(174, 'index', 15, '::1', '1587466304'),
(175, 'index', 15, '::1', '1589900147'),
(176, 'index', 1, '::1', '1589919846'),
(177, 'index', 32, '::1', '1603653995'),
(178, 'index', 32, '::1', '1603790597'),
(179, 'index', 1, '::1', '1604231745'),
(180, 'index', 6, '::1', '1605434722'),
(181, 'index', 1, '::1', '1605507854'),
(182, 'index', 1, '::1', '1605596121'),
(183, 'index', 10, '::1', '1607020457'),
(184, 'index', 3, '::1', '1607188312'),
(185, 'index', 7, '::1', '1607337689'),
(186, 'index', 1, '::1', '1607454660'),
(187, 'index', 9, '::1', '1609080189'),
(188, 'index', 1, '::1', '1614842827'),
(189, 'index', 56, '::1', '1617182674'),
(190, 'index', 1, '::1', '1636637972'),
(191, 'index', 20, '::1', '1638451184');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `category` int(10) UNSIGNED DEFAULT NULL,
  `contect` text COLLATE utf8_persian_ci DEFAULT NULL,
  `creat_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ACTIVE','INACTIVE','DELETE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'INACTIVE',
  `view_count` int(10) UNSIGNED DEFAULT 0,
  `img_name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `post_icon` varchar(40) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `contect`, `creat_date`, `status`, `view_count`, `img_name`, `post_icon`) VALUES
(27, 'با ما بیشتر آشنا بشید', 18, '<p>در بونسای سایت فرصتی فراهم شده تا مشتريان بتوانند بدون دغدغه و استرس خرید اینترنتی گل های مورد نظر خود را برای مناسبت های مختلف تهيه نموده و در موعد مقرر تحويل بگيرند. ماموریت ما تبدیل گل از یک کالای لوکس به محصولی در سبد خرید روزانه افراد است.</p>\r\n', '2020-10-19 09:31:46', 'ACTIVE', 0, 'شذخعف.jpg', 'سس'),
(33, 'فروش گل', 21, '<p>فروش گل</p>\r\n', '2020-10-23 17:17:37', 'ACTIVE', 28, 'bon03.jpg', 'fa fa-desktop'),
(44, 'تزیین گل', 21, '<p>تزیین گل به سلیقه خود شما&nbsp;</p>\r\n', '2020-10-13 02:31:54', 'ACTIVE', 10, 'bon03.jpg', 'fa fa-line-chart'),
(45, 'ارسال گل', 21, '<p>ارسال گل به ادرس مورد نظر شما&nbsp;</p>\r\n', '2020-10-13 02:43:09', 'ACTIVE', 5, 'bon03.jpg', 'fa fa-android'),
(52, 'همه چیز درباره بونسای', 22, '<h4 dir=\"rtl\">واژه بونسای یا Bonsai که از دو قسمت &quot;بن&quot; و &quot;سای&quot; تشکیل شده است به معنای گیاه درون ظرف می باشد. بونسای که همان&nbsp;درختان، گیاهان یا درختچه های مینیاتوری&nbsp;هستند در واقع گیاهانی می باشند که به صورت شگفت انگیزی کوچک تر از حالت عادی نوع اصلی درخت هستند.&nbsp;<br />\r\nاگر چه بسیاری از افراد به اشتباه تصور می کنند که گیاهان بونسای تیره&nbsp;خاصی از گیاهان می باشند و به طور مثال بن سای درخت گیلاس با خود درخت گیلاس تفاوت دارد اما توجه کنید که در واقع بن سای گیاه با نوع اصلی و موجود در باغچه&zwnj;ها و طبیعت این گیاه تفاوتی ندارد و تنها تفاوت آن در اندازه های آن ها است.<br />\r\nاگر چه که تاریخچه کاشت&nbsp;گیاهان زینتی&nbsp;به قدمت تاریخ بشر می باشد و ابتدایی ترین آثار استفاده از این گیاهان به ژاپن و قرون 11 و 12 باز می گردد اما معمولا گفته می شود که&nbsp;تاریخچه&nbsp;بونسای&nbsp;به چین و تایلند باز می گردد.</h4>\r\n', '2020-10-27 12:42:16', 'ACTIVE', 5, 'bon04.jpg', 'نقد و بررسی رمان عاشقانه'),
(53, 'انواع گیاه بونسای', 22, '<p><br />\r\nدر نوعی از طبقه بندی، گیاه بونسای به دو دسته زیر تقسیم بندی می شود:<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;بنسای خارج از خانه:</strong>&nbsp;این گونه ها قابلیت زندگی در خارج از خانه را دارند و تنها در مدت زمان کوتاهی در فصل زمستان بایستی به خارج از فضای خانه منتقل شوند. کاج ها، سرو کوهی، افرا ها و .. از این نوع می باشند.<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;بنسای درون خانه:</strong>&nbsp;این نوع از گیاهان بنسای که در سال های اخیر رواج یافته اند نسبت به تغییرات دما و سرما حساس هستند و بایستی حتما در&nbsp;محیط های بسته&nbsp;به طور مثال خانه نگهداری شوند.<br />\r\nهمچنین در نوع دیگری از طبقه بندی گیاه بنسای، این گیاهان براساس اندازه نیز به دسته های زیر طبقه بندی می شوند:<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;بنسای مینیاتوری:</strong>&nbsp;بن سای هایی که کمتر از 15 سانتی متر ارتفاع دارند.<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;بن سای کوچک:</strong>&nbsp;بن سای هایی که 15 تا 32 سانتی متر ارتفاع دارند.<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;بن سای متوسط:&nbsp;</strong>بن سای هایی که 32 تا 60 سانتی متر ارتفاع دارند.<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;بن سای بزرگ:</strong>&nbsp;بن سای هایی که بیشتر از 60 سانتی متر ارتفاع دارند.<br />\r\n<em>علاوه بر این ها، نوع دیگری از طبقه بندی گیاه بونسای وجود دارد که در آن این نوع گیاهان به 2 دسته ی زیر تقسیم بندی می شوند:</em><br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;گیاهان بنسای خزان دار</strong>: کاج<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;گیاهان بنسای همیشه سبز&zwnj;:</strong>&nbsp;نارون، بلوط، ابریشم، سیب و ...</p>\r\n', '2020-12-03 22:00:43', 'ACTIVE', 3, 'شذخعف.jpg', 'تست'),
(54, 'انواع تکنیک ها یا روش های پرورش گیاه بونسای', 22, '<p><br />\r\nبرای آن که یک تکنیک مناسب برای پرورش گیاه بونسای را پیدا کنند معمولا گیاهان را در دسته بندی های مختلفی تقسیم بندی می کنند تا بتوانند بسته به نوع گیاه مورد نظر و شرایط مناسب برای رشد کوچک شده ی آن، روش های متفاوتی را برای انواع گیاهان انتخاب می نمایند.<br />\r\nبنابراین از جمله روش های پرورش گیاه بونسای عبارتند از:<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;Die-back:</strong>&nbsp;در این روش که زیبا ترین بونسای ها را می دهد، ابتدا درخت را در شرایط سخت رشد می دهند تا قسمت های از ساقه ی آن بمیرد و سپس با رشد دادن دیگر قسمت های زنده آن،&nbsp;<strong>گیاه بونسای&nbsp;</strong>را به وجود می آورند.<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;Kokutan bonsai:</strong>&nbsp;در این روش به کمک بذر های گیاه، نوع بونسای آن به دست می آید.&nbsp;<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;Penjing Type:</strong>&nbsp;در این روش به کمک هرس های سنگین بر قسمت های بالایی درختان، گیاه بونسای به دست می آید.<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;Cascade Type:</strong>&nbsp;در این روش به کمک هرس مناسب شاخه ها، گیاه بونسای به دست می آید.<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;Fuku bonsai (Sumo):</strong>&nbsp;در این روش از گیاهان محکم با تنه های ستبر استفاده شده و گیاه بونسای به دست می آید.<br />\r\n&bull;&nbsp;&nbsp;<strong>&nbsp;&nbsp;Exposed the root:</strong>&nbsp;در این روش، گیاه بونسای به کمک کشیدن درخت به سمت بالا و سپس انجام عملیاتی بر روی تاج آن به دست می آید.<br />\r\n<strong>&bull;&nbsp;&nbsp; &nbsp;Shin type:</strong>&nbsp;در این روش با محافظت از بزرگ ترین شاخه ی اصلی و محکم درختان و هرس به موقع آن، گیاه بونسای به دست می آید.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-03-31 13:22:00', 'ACTIVE', 2, 'bon05.jpg', 'سیببس');

-- --------------------------------------------------------

--
-- Table structure for table `posts_category`
--

CREATE TABLE `posts_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `EN_name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `post_count` int(10) UNSIGNED NOT NULL DEFAULT 20,
  `posts` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `posts_category`
--

INSERT INTO `posts_category` (`id`, `name`, `EN_name`, `post_count`, `posts`, `status`) VALUES
(18, 'درباره ما', 'about_us', 1, 1, 'ACTIVE'),
(21, 'خدمات ما', 'services', 6, 3, 'ACTIVE'),
(22, 'مقالات', 'blog', 27, 8, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `projects_info`
--

CREATE TABLE `projects_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `introduction` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `client` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `start` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `finish` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `progress` int(10) UNSIGNED DEFAULT NULL,
  `stop` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `stop_info` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `bird_date` varchar(50) DEFAULT NULL COMMENT 'تاریخ تولد',
  `ID_number` varchar(20) DEFAULT NULL COMMENT 'شماره شناسنامه',
  `email` varchar(30) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `marrid` enum('YES','NO') DEFAULT NULL COMMENT 'تاهل',
  `major` varchar(50) DEFAULT NULL COMMENT 'رشته',
  `comment` text DEFAULT NULL,
  `evidence` varchar(50) DEFAULT NULL COMMENT 'مدرک تحصیلی',
  `sex` enum('MAIL','FEMAIL') DEFAULT NULL,
  `experience_work` varchar(20) DEFAULT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('NEW','SEEN') NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `EN_name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `icon` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `name`, `EN_name`, `icon`, `link`, `status`) VALUES
(1, 'اینستاگرام', 'instagram', 'fa fa-instagram', 'https://www.instagram.com/manimohamadi0406/', 'ACTIVE'),
(2, 'تلگرام', 'telegram', 'fa fa-paper-plane', 'https://t.me/manimohamadi_work', 'ACTIVE'),
(13, 'لینکدین', 'linkdin', 'fa fa-linkedin', 'https://www.linkedin.com/in/mani-mohamadi-30a840149/', 'ACTIVE'),
(14, 'فیسبوک', 'facebook', 'fa fa-facebook', '', 'INACTIVE'),
(15, 'گوگل پلاس', 'google-plus', 'fa fa-google-plus', '', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `team_gallery`
--

CREATE TABLE `team_gallery` (
  `id` int(11) NOT NULL,
  `img_name` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_name` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `occupation` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `team_gallery`
--

INSERT INTO `team_gallery` (`id`, `img_name`, `user_name`, `occupation`, `status`) VALUES
(2, '1577207121.jpg', 'مانی محمدی', 'کاربر', 'active'),
(3, '1577207127.jpg', 'mani mohamadi', 'admin', 'active'),
(4, '1577207136.png', 'mani mohamadi', 'admin', 'active'),
(5, '1577207143.jpg', 'مانی محمدی', 'مدیر', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'INACTIVE',
  `department` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile`, `username`, `password`, `last_login`, `status`, `department`) VALUES
(1, 'admin', '0406', 'admin', '$2y$12$RX0Rz7Zmzf/KEgCGuYk16uKq64TNXCN.GrUWx96fC7Sx.zUi/RMGi', '1400/9/11 - 04:21:59', 'ACTIVE', 'مدیریت'),
(3, 'mani', '09191930406', '0406', '$2y$12$fzCgSVm5Z2EwGhoutOBpkOWWw01rWrJ6Z.5PWyycsubwKbWRiCR4q', NULL, 'ACTIVE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `family` varchar(70) COLLATE utf8_persian_ci DEFAULT NULL,
  `age` varchar(4) COLLATE utf8_persian_ci DEFAULT NULL,
  `sex` enum('M','F') COLLATE utf8_persian_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT 'محل خریدار',
  `email` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ACTIVE',
  `phone` varchar(16) COLLATE utf8_persian_ci DEFAULT NULL,
  `id_number` varchar(12) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_feed_plan`
--

CREATE TABLE `users_feed_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `physique_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `plan` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `write_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_feed_plan`
--

INSERT INTO `users_feed_plan` (`id`, `user_id`, `physique_id`, `title`, `plan`, `status`, `write_date`, `update_date`) VALUES
(5, 19, 30, '11111111', '<p style=\"text-align:center\">ttttttttttt222222222</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n', 'ACTIVE', '2020-02-08 12:39:49', '2020-10-25 10:10:17'),
(6, 16, 29, 'برنامه فیت 2', '<p>تو فیتنسی تو تو</p>\r\n\r\n<p>تو فیتنسی تو تو</p>\r\n\r\n<p>تو فیتنسی تو تو</p>\r\n\r\n<p>تو فیتنسی تو تو</p>\r\n\r\n<p>تو فیتنسی تو توتو فیتنسی تو تو</p>\r\n\r\n<p>تو فیتنسی تو تو</p>\r\n\r\n<p>تو فیتنسی تو تو</p>\r\n\r\n<p>تو فیتنسی تو توتو فیتنسی تو تو</p>\r\n\r\n<p>تو فیتنسی تو توتو فیتنسی تو توتو فیتنسی تو تو</p>\r\n', 'ACTIVE', '2020-02-08 12:45:42', '2020-02-08 20:53:34'),
(7, 16, 27, 'برنامه 15', '<p>تست برنامه 15</p>\r\n\r\n<p>1</p>\r\n\r\n<p>2</p>\r\n\r\n<p>3</p>\r\n\r\n<p>4</p>\r\n\r\n<p>5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'ACTIVE', '2020-02-08 22:20:27', '2020-02-08 20:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `access` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `user_id`, `access`) VALUES
(1, 1, 'all'),
(30, 2, 'admin_panel'),
(32, 5, 'admin_panel'),
(33, 5, 'admin_gallery'),
(35, 5, 'admin_options'),
(37, 2, 'admin_ecomm_add_product'),
(38, 5, 'admin_comments'),
(39, 5, 'user_delete'),
(40, 3, 'admin_panel'),
(41, 3, 'admin_gallery'),
(42, 3, 'admin_comments'),
(43, 3, 'admin_options'),
(44, 3, 'admin_ecomm_add_product');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_persian_ci NOT NULL DEFAULT '#',
  `alt` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `text` text COLLATE utf8_persian_ci DEFAULT NULL,
  `slider` enum('YES','NO') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO',
  `img_show` enum('YES','NO') COLLATE utf8_persian_ci NOT NULL DEFAULT 'NO',
  `category` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `img_name`, `link`, `alt`, `title`, `text`, `slider`, `img_show`, `category`) VALUES
(8, '1556619821.mp4', '#', '', '', '', 'NO', 'NO', 11),
(16, '1556620454.mp4', 'test', '', '', '', 'NO', 'NO', 4),
(17, '1556620584.mp4', '2222', '1111', '', '', 'YES', 'YES', 11);

-- --------------------------------------------------------

--
-- Table structure for table `video_category`
--

CREATE TABLE `video_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `img_count` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `video_category`
--

INSERT INTO `video_category` (`id`, `title`, `img_count`, `status`) VALUES
(4, 'بیت کوین', 1, 'ACTIVE'),
(9, 'تست', 0, 'ACTIVE'),
(11, 'سیسیل', 0, 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_list`
--
ALTER TABLE `access_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audio_category`
--
ALTER TABLE `audio_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_gallery`
--
ALTER TABLE `clients_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_log`
--
ALTER TABLE `credit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_category`
--
ALTER TABLE `demo_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_basket`
--
ALTER TABLE `ecomm_basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_category_attr`
--
ALTER TABLE `ecomm_category_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_factors`
--
ALTER TABLE `ecomm_factors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_factor_products`
--
ALTER TABLE `ecomm_factor_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_favorit`
--
ALTER TABLE `ecomm_favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_likes`
--
ALTER TABLE `ecomm_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_menu`
--
ALTER TABLE `ecomm_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_newsletter`
--
ALTER TABLE `ecomm_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_products`
--
ALTER TABLE `ecomm_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_product_attr`
--
ALTER TABLE `ecomm_product_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_product_category`
--
ALTER TABLE `ecomm_product_category`
  ADD PRIMARY KEY (`id`,`title`,`parent`,`picurl`,`status`,`cat_group`);

--
-- Indexes for table `ecomm_product_gallery`
--
ALTER TABLE `ecomm_product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecomm_product_message`
--
ALTER TABLE `ecomm_product_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_bmi`
--
ALTER TABLE `feed_bmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_user_physique`
--
ALTER TABLE `feed_user_physique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_unit`
--
ALTER TABLE `food_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_category`
--
ALTER TABLE `gallery_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea_room_employ`
--
ALTER TABLE `idea_room_employ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_class`
--
ALTER TABLE `institute_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_class_time`
--
ALTER TABLE `institute_class_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_langs`
--
ALTER TABLE `institute_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_onvacation`
--
ALTER TABLE `institute_onvacation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_terms`
--
ALTER TABLE `institute_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_tickets`
--
ALTER TABLE `institute_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_users`
--
ALTER TABLE `institute_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `ostan` (`state`) USING BTREE,
  ADD KEY `city` (`city`) USING BTREE,
  ADD KEY `name` (`name`,`family`) USING BTREE,
  ADD KEY `type` (`user_type`),
  ADD KEY `nationalcode` (`code_meli`) USING BTREE,
  ADD KEY `credit` (`credit`) USING BTREE;

--
-- Indexes for table `institute_users_class`
--
ALTER TABLE `institute_users_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_users_level`
--
ALTER TABLE `institute_users_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license_api`
--
ALTER TABLE `license_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mirrormx_customer_chat_message`
--
ALTER TABLE `mirrormx_customer_chat_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mirrormx_customer_chat_user`
--
ALTER TABLE `mirrormx_customer_chat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_views_log`
--
ALTER TABLE `page_views_log`
  ADD PRIMARY KEY (`id`,`page_name`,`views`,`user_ip`,`view_date`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_category`
--
ALTER TABLE `posts_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_info`
--
ALTER TABLE `projects_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_gallery`
--
ALTER TABLE `team_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_feed_plan`
--
ALTER TABLE `users_feed_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_category`
--
ALTER TABLE `video_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_list`
--
ALTER TABLE `access_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `audio_category`
--
ALTER TABLE `audio_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clients_gallery`
--
ALTER TABLE `clients_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `credit_log`
--
ALTER TABLE `credit_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `demo_category`
--
ALTER TABLE `demo_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ecomm_basket`
--
ALTER TABLE `ecomm_basket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ecomm_category_attr`
--
ALTER TABLE `ecomm_category_attr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `ecomm_factors`
--
ALTER TABLE `ecomm_factors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ecomm_factor_products`
--
ALTER TABLE `ecomm_factor_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `ecomm_favorit`
--
ALTER TABLE `ecomm_favorit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ecomm_likes`
--
ALTER TABLE `ecomm_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ecomm_menu`
--
ALTER TABLE `ecomm_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ecomm_newsletter`
--
ALTER TABLE `ecomm_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecomm_products`
--
ALTER TABLE `ecomm_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ecomm_product_attr`
--
ALTER TABLE `ecomm_product_attr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ecomm_product_category`
--
ALTER TABLE `ecomm_product_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `ecomm_product_gallery`
--
ALTER TABLE `ecomm_product_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ecomm_product_message`
--
ALTER TABLE `ecomm_product_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feed_bmi`
--
ALTER TABLE `feed_bmi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed_user_physique`
--
ALTER TABLE `feed_user_physique`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `food_unit`
--
ALTER TABLE `food_unit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `gallery_category`
--
ALTER TABLE `gallery_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `idea_room_employ`
--
ALTER TABLE `idea_room_employ`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `institute_class`
--
ALTER TABLE `institute_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `institute_class_time`
--
ALTER TABLE `institute_class_time`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `institute_langs`
--
ALTER TABLE `institute_langs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `institute_onvacation`
--
ALTER TABLE `institute_onvacation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `institute_terms`
--
ALTER TABLE `institute_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `institute_tickets`
--
ALTER TABLE `institute_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `institute_users`
--
ALTER TABLE `institute_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `institute_users_class`
--
ALTER TABLE `institute_users_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `institute_users_level`
--
ALTER TABLE `institute_users_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `page_views_log`
--
ALTER TABLE `page_views_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `posts_category`
--
ALTER TABLE `posts_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `projects_info`
--
ALTER TABLE `projects_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `team_gallery`
--
ALTER TABLE `team_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_feed_plan`
--
ALTER TABLE `users_feed_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `video_category`
--
ALTER TABLE `video_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
