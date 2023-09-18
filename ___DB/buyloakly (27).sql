-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 03:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buyloakly`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confirmpassword` varchar(190) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `confirmpassword`, `email`, `profileimage`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin', '$2y$10$oqXHV2kpET/45GmYZNlUruYH21W2FMl2x.3ObTALcV06lhiN3n.82', '$2y$10$3X7uNjd2ZMGEQWZSWWSLKeW0wH7sZjuHGMnJIImLKKTnb0KhWADOW', 'admin@gmail.com', '20230606_054852_profileimage.jpg', '2023-05-31 05:05:05', '2023-06-14 04:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `book_services`
--

CREATE TABLE `book_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `servicelocation` bigint(20) UNSIGNED DEFAULT NULL,
  `serviceamount` varchar(20) DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `service_timeslot` varchar(190) DEFAULT NULL,
  `service_notes` text DEFAULT NULL,
  `payment` varchar(190) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_services`
--

INSERT INTO `book_services` (`id`, `user_id`, `service_id`, `servicelocation`, `serviceamount`, `service_date`, `service_timeslot`, `service_notes`, `payment`, `created_at`, `updated_at`) VALUES
(1, 8, 10, 2, '₹4522', '2023-06-07', '23:22 - 19:27', 'Service', NULL, '2023-06-06 23:01:53', '2023-06-06 23:01:53'),
(9, 8, 9, 1, '₹5700', '2023-06-07', '15:22 - 16:22', 'Service booking', NULL, '2023-06-07 06:27:54', '2023-06-07 06:27:54'),
(10, 8, 11, 2, '₹600', '2023-06-07', '21:22 - 19:25', 'Service', NULL, '2023-06-07 06:31:24', '2023-06-07 06:31:24'),
(13, 8, 10, 2, '₹4522', '2023-06-07', '12:22 - 19:27', 'Service', NULL, '2023-06-07 06:37:04', '2023-06-07 06:37:04'),
(14, 8, 12, 2, '₹1000', '2023-06-07', '10:00 - 19:00', 'Service booking', NULL, '2023-06-07 07:37:36', '2023-06-07 07:37:36'),
(15, 9, 12, 2, '₹1000', '2023-06-09', '09:00 - 19:00', NULL, NULL, '2023-06-08 06:52:07', '2023-06-08 06:52:07'),
(16, 11, 11, 2, '₹600', '2023-06-10', '21:22 - 21:22', 'this is note', NULL, '2023-06-10 04:55:27', '2023-06-10 04:55:27'),
(17, 8, 13, 1, '₹560', '2023-06-14', '22:22 - 19:26', 'Motor service booking', NULL, '2023-06-14 06:26:43', '2023-06-14 06:26:43'),
(18, 8, 13, 1, '₹560', '2023-06-14', '22:22 - 19:26', 'Motor service booking', NULL, '2023-06-14 06:26:58', '2023-06-14 06:26:58'),
(19, 8, 10, 2, '₹4522', '2023-06-17', '20:22 - 19:25', 'Service booking', NULL, '2023-06-17 00:23:00', '2023-06-17 00:23:00'),
(20, 8, 10, 1, '₹4522', '2023-06-17', '15:22 - 16:22', 'Serviceee Demo Booking', NULL, '2023-06-17 00:26:34', '2023-06-17 00:26:34'),
(21, 8, 10, 1, '₹4522', '2023-06-17', '15:22 - 16:22', 'Serviceee Demo Booking', NULL, '2023-06-17 00:26:58', '2023-06-17 00:26:58'),
(22, 8, 10, 1, '₹4522', '2023-06-17', '15:22 - 16:22', 'Serviceee Demo Booking', NULL, '2023-06-17 00:27:07', '2023-06-17 00:27:07'),
(23, 8, 10, 1, '₹4522', '2023-06-17', '15:22 - 16:22', 'Serviceee Demo Booking', NULL, '2023-06-17 00:27:13', '2023-06-17 00:27:13'),
(24, 8, 10, 1, '₹4522', '2023-06-17', '15:22 - 16:22', 'Serviceee Demo Booking', NULL, '2023-06-17 00:27:17', '2023-06-17 00:27:17'),
(25, 8, 12, 2, '₹1000', '2023-06-17', '10:00 - 19:00', 'Testtttt', NULL, '2023-06-17 02:06:35', '2023-06-17 02:06:35'),
(26, 8, 14, 1, '₹400', '2023-06-20', '15:22 - 16:22', 'Cooking service booking', NULL, '2023-06-20 02:24:55', '2023-06-20 02:24:55'),
(31, 8, 17, 2, '540', '2023-06-24', '21:22 - 19:25', 'Demo', 'wallet', '2023-06-23 01:22:13', '2023-06-23 01:22:13'),
(32, 8, 17, 2, '540', '2023-06-16', '21:22 - 19:25', 'fef', NULL, '2023-06-23 01:24:13', '2023-06-23 01:24:13'),
(33, 8, 17, 2, '540', '2023-06-24', '21:22 - 19:25', 'Demo test', NULL, '2023-06-23 01:32:06', '2023-06-23 01:32:06'),
(34, 8, 19, 2, '600', '2023-06-30', '20:22 - 19:25', 'Demo Testing', NULL, '2023-06-23 06:52:17', '2023-06-23 06:52:17'),
(35, 8, 19, 2, '600', '2023-06-30', '21:22 - 19:25', 'wsw', 'wallet', '2023-06-23 06:55:14', '2023-06-23 06:55:14'),
(36, 8, 19, 1, '600', '2023-06-24', '12:22 - 19:27', 'Demo', 'wallet', '2023-06-23 06:56:26', '2023-06-23 06:56:26'),
(37, 8, 19, 2, '600', '2023-06-25', '20:22 - 19:25', 'Test', 'wallet', '2023-06-23 06:58:02', '2023-06-23 06:58:02'),
(38, 8, 19, 1, '600', '2023-06-16', '20:22 - 19:25', 'ggr', 'wallet', '2023-06-23 07:06:44', '2023-06-23 07:06:44'),
(39, 8, 19, 1, '600', '2023-06-16', '21:22 - 21:22', 'fefr', 'wallet', '2023-06-23 07:08:57', '2023-06-23 07:08:57'),
(40, 8, 19, 2, '600', '2023-06-16', '21:22 - 19:25', 'rwfwfw', 'wallet', '2023-06-23 07:11:33', '2023-06-23 07:11:33'),
(41, 8, 19, 1, '600', '2023-06-16', '21:22 - 19:25', 'eee', 'wallet', '2023-06-23 07:37:11', '2023-06-23 07:37:11'),
(42, 8, 19, 2, '600', '2023-06-09', '21:22 - 19:25', 'try6y', 'wallet', '2023-06-23 07:38:20', '2023-06-23 07:38:20'),
(43, 8, 19, 2, '600', '2023-06-22', '21:22 - 19:25', 'ererw', 'wallet', '2023-06-23 07:49:47', '2023-06-23 07:49:47'),
(44, 8, 19, 2, '600', '2023-06-23', '21:22 - 21:22', 'wdedw', 'wallet', '2023-06-23 07:51:09', '2023-06-23 07:51:09'),
(45, 8, 19, 2, '600', '2023-06-16', '21:22 - 19:25', 'huo', 'wallet', '2023-06-23 07:52:40', '2023-06-23 07:52:40'),
(46, 8, 19, 2, '600', '2023-06-22', '20:22 - 19:25', 'hui', 'wallet', '2023-06-23 07:55:24', '2023-06-23 07:55:24'),
(47, 8, 19, 2, '600', '2023-06-22', '21:22 - 21:22', 'nl', 'wallet', '2023-06-23 07:57:10', '2023-06-23 07:57:10'),
(48, 8, 19, 2, '600', '2023-06-16', '20:22 - 19:25', 'Demo', 'wallet', '2023-06-23 08:04:56', '2023-06-23 08:04:56'),
(49, 10, 19, 2, '600', '2023-06-24', '20:22 - 19:25', 'Demo', 'wallet', '2023-06-24 01:18:55', '2023-06-24 01:18:55'),
(50, 10, 19, 2, '600', '2023-06-23', '21:22 - 19:25', 'dwedewd', 'wallet', '2023-06-24 02:06:45', '2023-06-24 02:06:45'),
(51, 10, 19, 1, '600', '2023-06-17', '20:22 - 19:25', 'wqdewqd', 'wallet', '2023-06-24 02:08:59', '2023-06-24 02:08:59'),
(52, 10, 19, 2, '600', '2023-06-17', '21:22 - 21:22', 'Demo wallet', 'wallet', '2023-06-24 02:12:42', '2023-06-24 02:12:42'),
(53, 10, 19, 2, '600', '2023-06-24', '20:22 - 19:25', 'Demo', 'wallet', '2023-06-24 02:16:06', '2023-06-24 02:16:06'),
(54, 10, 19, 2, '600', '2023-07-01', '21:22 - 19:25', 'Demo', 'wallet', '2023-06-24 02:23:34', '2023-06-24 02:23:34'),
(55, 10, 19, 2, '600', '2023-06-17', '21:22 - 21:22', 'Demo', 'wallet', '2023-06-24 02:24:32', '2023-06-24 02:24:32'),
(56, 10, 19, 2, '600', '2023-07-01', '21:22 - 19:25', 'Demo', 'wallet', '2023-06-24 02:27:18', '2023-06-24 02:27:18'),
(57, 10, 19, 2, '600', '2023-06-24', '20:22 - 19:25', 'Demo', 'wallet', '2023-06-24 02:30:56', '2023-06-24 02:30:56'),
(58, 10, 11, 1, '700', '2023-06-24', '20:22 - 19:25', 'demo', 'wallet', '2023-06-24 05:02:58', '2023-06-24 05:02:58'),
(59, 10, 12, 2, '1000', '2023-06-24', '10:00 - 19:00', 'Demo', 'wallet', '2023-06-24 05:43:44', '2023-06-24 05:43:44'),
(60, 10, 12, 1, '1000', '2023-06-24', '10:00 - 19:00', 'demo', 'wallet', '2023-06-24 05:46:04', '2023-06-24 05:46:04'),
(61, 10, 12, 2, '1000', '2023-06-24', '10:00 - 19:00', 'demo', 'wallet', '2023-06-24 05:48:14', '2023-06-24 05:48:14'),
(62, 10, 12, 2, '1000', '2023-06-24', '09:00 - 19:00', 'wefwff', 'wallet', '2023-06-24 05:50:38', '2023-06-24 05:50:38'),
(63, 10, 12, 2, '1000', '2023-06-24', '10:00 - 19:00', 'dd', 'wallet', '2023-06-24 05:51:53', '2023-06-24 05:51:53'),
(64, 10, 12, 2, '1000', '2023-06-24', '10:00 - 19:00', 'frfr', 'wallet', '2023-06-24 05:52:58', '2023-06-24 05:52:58'),
(65, 10, 11, 2, '700', '2023-06-24', '20:22 - 19:25', 'dww', 'wallet', '2023-06-24 05:53:53', '2023-06-24 05:53:53'),
(66, 10, 11, 1, '700', '2023-06-24', '20:22 - 19:25', 'ewdwed', 'wallet', '2023-06-24 05:57:01', '2023-06-24 05:57:01'),
(67, 10, 11, 2, '700', '2023-06-24', '20:22 - 19:25', 'fig', 'wallet', '2023-06-24 05:57:23', '2023-06-24 05:57:23'),
(68, 10, 19, 1, '600', '2023-06-09', '21:22 - 19:25', 'hyyhty', 'wallet', '2023-06-24 05:59:01', '2023-06-24 05:59:01'),
(69, 10, 19, 1, '600', '2023-06-24', '21:22 - 19:25', 'rfrf', 'wallet', '2023-06-24 05:59:43', '2023-06-24 05:59:43'),
(70, 10, 19, 2, '600', '2023-06-24', '21:22 - 19:25', 'swsw', 'wallet', '2023-06-24 06:05:02', '2023-06-24 06:05:02'),
(71, 10, 19, 1, '600', '2023-06-07', '21:22 - 21:22', 'uuku', 'wallet', '2023-06-24 06:07:19', '2023-06-24 06:07:19'),
(72, 10, 19, 2, '600', '2023-06-24', '23:22 - 19:27', 'dwdw', 'wallet', '2023-06-24 06:09:04', '2023-06-24 06:09:04'),
(74, 10, 19, 2, '600', '2023-06-24', '20:22 - 19:25', 'eded', 'wallet', '2023-06-24 06:10:52', '2023-06-24 06:10:52'),
(75, 10, 19, 1, '540', '2023-06-24', '20:22 - 19:25', 'rter', 'wallet', '2023-06-24 06:52:00', '2023-06-24 06:52:00'),
(76, 14, 21, 2, '378', '2023-06-27', '21:22 - 19:25', 'Demo', 'wallet', '2023-06-27 08:07:11', '2023-06-27 08:07:11'),
(77, 14, 21, 2, '378', '2023-06-30', '21:22 - 19:25', 'sdwdwd', 'wallet', '2023-06-27 08:15:36', '2023-06-27 08:15:36'),
(78, 14, 21, 1, '378', '2023-06-27', '20:22 - 19:25', 'Demo', 'wallet', '2023-06-27 08:23:52', '2023-06-27 08:23:52'),
(79, 14, 21, 1, '378', '2023-06-26', '22:22 - 19:26', 'tyhth', 'wallet', '2023-06-27 08:24:43', '2023-06-27 08:24:43'),
(82, 15, 19, 2, '540', '2023-06-30', '21:22 - 21:22', 'gheger', 'wallet', '2023-06-30 05:14:08', '2023-06-30 05:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryname` varchar(150) DEFAULT NULL,
  `categoryslug` varchar(190) DEFAULT NULL,
  `categoryimage` varchar(255) DEFAULT NULL,
  `categoryfeature` varchar(255) DEFAULT NULL,
  `status` varchar(190) NOT NULL DEFAULT 'inactive',
  `commission_percentage` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `categoryslug`, `categoryimage`, `categoryfeature`, `status`, `commission_percentage`, `created_at`, `updated_at`) VALUES
(4, 'Plumber', 'plumber', '20230530_034642_categoryimage.jpg', 'yes', 'active', 20, '2023-05-29 22:16:42', '2023-05-29 22:16:42'),
(5, 'Cook', 'cook', '20230530_034704_categoryimage.jpg', 'yes', 'active', 15, '2023-05-29 22:17:04', '2023-05-29 22:17:04'),
(6, 'Hostel', 'category-hostel', '20230602_080011_categoryimage.webp', 'yes', 'active', 10, '2023-06-02 02:30:11', '2023-06-02 02:30:11'),
(7, 'test School', 'test-school', '20230602_080115_categoryimage.jpg', 'yes', 'active', 14, '2023-06-02 02:31:15', '2023-06-10 04:38:09'),
(8, 'test 2', 'test', '20230610_100957_categoryimage.jpg', 'no', 'active', 12, '2023-06-10 04:39:57', '2023-06-10 05:16:23'),
(9, 'Demo', 'demo', '20230629_060229_categoryimage.jpg', 'yes', 'active', 20, '2023-06-29 00:32:29', '2023-06-29 00:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cityname` varchar(80) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `cityname`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Pune', '2023-05-26 06:34:36', '2023-05-26 06:39:26'),
(2, 1, 1, 'Mumbai', '2023-05-27 06:22:20', '2023-05-27 06:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `firstname`, `lastname`, `email`, `mobilenumber`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Demo', 'Demo', 'demo@gmail.com', '8567356423', 'Demo Message.', '2023-06-09 01:45:44', '2023-06-09 01:45:44'),
(3, 'Test2', 'Test', 'test@gmail.com', '9856735642', 'Test Message', '2023-06-09 01:46:27', '2023-06-10 04:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countryname` varchar(80) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryname`, `created_at`, `updated_at`) VALUES
(1, 'India', '2023-05-26 05:50:41', '2023-05-26 06:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `websitename` varchar(100) DEFAULT NULL,
  `contactdetails` varchar(100) DEFAULT NULL,
  `mobilenumber` varchar(20) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `location_radius` varchar(190) DEFAULT NULL,
  `service_locationtype` varchar(20) DEFAULT NULL,
  `service_placeholder` varchar(255) DEFAULT NULL,
  `profile_placeholder` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `demo_access` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `websitename`, `contactdetails`, `mobilenumber`, `language`, `location_radius`, `service_locationtype`, `service_placeholder`, `profile_placeholder`, `logo`, `favicon`, `icon`, `demo_access`, `created_at`, `updated_at`) VALUES
(1, 'Buy Lokaly Truly Local', 'Pune, Maharashtra', '985478563', 'English', '7005', 'manual', '20230617_174705_service_placeholder.jpg', '20230617_174705_profile_placeholder.jpg', '20230617_174858_logo.jpeg', '20230617_174858_favicon.jpeg', '20230617_174858_icon.jpeg', 'yes', '2023-06-17 11:45:15', '2023-06-27 04:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_26_104248_create_countries_table', 2),
(7, '2023_05_26_104456_create_states_table', 3),
(8, '2023_05_26_104544_create_cities_table', 4),
(9, '2023_05_26_130148_create_categories_table', 5),
(10, '2023_05_26_130807_create_subcategories_table', 6),
(11, '2023_05_26_131512_create_admin_table', 7),
(12, '2023_05_26_132948_create_provider_table', 8),
(13, '2023_05_30_042544_create_table_seosettings', 9),
(14, '2023_05_30_043025_create_seosettings_table', 10),
(15, '2023_05_30_073802_create_subscription_table', 11),
(16, '2023_06_06_132151_create_book_services_table', 12),
(17, '2023_06_07_103448_create_notifications_table', 13),
(18, '2023_06_09_060723_create_contactus_table', 14),
(19, '2023_06_17_105239_create_general_settings_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('00236de2-c444-49f6-ab25-ca18f56e20d1', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 01:22:13', '2023-06-23 01:22:13'),
('0177d8ed-9e27-487f-a6fd-dae164ff0886', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 06:07:19', '2023-06-24 06:07:19'),
('1345d508-4dfe-4fe2-80c4-26e2d20bc993', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:46:04', '2023-06-24 05:46:04'),
('13c9e4d1-6d26-4ff5-90ef-213b342f44f5', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:11:33', '2023-06-23 07:11:33'),
('14a28bde-4793-44bf-9ed5-7d06170431f1', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-29 05:34:53', '2023-06-29 05:34:53'),
('168b7d63-a357-48ad-b19c-4b8b02b6637c', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:43:44', '2023-06-24 05:43:44'),
('17c24c07-53bf-477e-a808-fb1a608620ae', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:59:43', '2023-06-24 05:59:43'),
('19677058-8f79-43a1-bcfc-6d0765599745', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:02:59', '2023-06-24 05:02:59'),
('1ddf26e8-f7a2-460f-83c5-b7e50bbceb8a', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-14 06:26:58', '2023-06-19 08:41:11'),
('205753e7-2a4b-455a-a3ed-126fe491768e', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 06:05:02', '2023-06-24 06:05:02'),
('23a8d7f1-bba2-4212-ae8c-a6e972ff489d', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"demotest has booked your service.\"}', NULL, '2023-06-27 08:07:11', '2023-06-27 08:07:11'),
('249cf2d0-161b-4f70-9c02-a747c8226b91', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 06:55:14', '2023-06-23 06:55:14'),
('24c8b7dc-739f-408e-a526-684b2402c151', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:59:43', '2023-06-24 05:59:43'),
('29f06e93-be3d-4c84-baa9-53d6b0d0cfa1', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 06:10:52', '2023-06-24 06:10:52'),
('2a76f882-3e20-4575-abaf-759f7a373525', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 02:12:43', '2023-06-24 02:12:43'),
('322a7ad3-7e95-4ab9-b612-d2f7fd07a74a', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:38:21', '2023-06-23 07:38:21'),
('332213d1-20cc-48be-9832-f3bffa437839', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 06:58:02', '2023-06-23 06:58:02'),
('36f2f8cd-3df3-442a-83df-74083ca8b119', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:08:57', '2023-06-23 07:08:57'),
('36fdff36-4c3a-4e7c-b3c0-39639c1a3708', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"Purvi has booked your service.\"}', '2023-07-01 04:55:10', '2023-06-30 05:14:09', '2023-07-01 04:55:10'),
('37738e76-5a26-4f78-ac30-a3d9c338cee5', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:49:47', '2023-06-23 07:49:47'),
('3b3679e5-c881-48d8-9364-87097da3dff9', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:06:44', '2023-06-23 07:06:44'),
('3caa1689-d910-417c-bf5b-d4c0e248f43d', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 06:56:26', '2023-06-23 06:56:26'),
('41bf9744-4e8d-4501-b7c0-7337cafb553e', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 02:06:35', '2023-06-17 02:06:35'),
('43ea376d-3de9-4778-861d-81813d6c8bf5', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 06:55:14', '2023-06-23 06:55:14'),
('470842d5-0508-402c-828f-b84e093cb447', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"demotest has booked your service.\"}', NULL, '2023-06-27 08:24:43', '2023-06-27 08:24:43'),
('4773fc98-ffe5-4299-a724-36b7adb55cfc', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:37:11', '2023-06-23 07:37:11'),
('48097d58-c011-4ac1-b0f5-1f9df8d37b89', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 01:32:06', '2023-06-23 01:32:06'),
('48e1ab30-9ecc-48df-9b21-dbc281859402', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 00:27:07', '2023-06-19 07:12:56'),
('4a2e225e-4753-498b-9c36-6fadea64fa74', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-21 02:00:52', '2023-06-21 02:00:52'),
('4a542858-bba6-48e6-ac07-038754ceda8c', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 00:27:17', '2023-06-19 07:25:21'),
('4b62b329-c197-4cdf-a5d2-b2479ab9db73', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:57:01', '2023-06-24 05:57:01'),
('4c1e2315-be04-4efb-befa-ab750a54dd47', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:53:53', '2023-06-24 05:53:53'),
('50afe50e-e71b-4df0-a3b5-1b8a47d38569', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"demotest has booked your service.\"}', NULL, '2023-06-27 08:07:11', '2023-06-27 08:07:11'),
('51671e6c-c0fb-4fca-b296-ad130d8c0973', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"demotest has booked your service.\"}', NULL, '2023-06-27 08:24:43', '2023-06-27 08:24:43'),
('51b7ac1d-3cb2-4128-81fa-821ca1779c1e', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"Purvi has booked your service.\"}', NULL, '2023-06-30 05:14:09', '2023-06-30 05:14:09'),
('521ffe72-dfb2-4ed3-93a4-142e63162f65', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"demotest has booked your service.\"}', NULL, '2023-06-27 08:23:52', '2023-06-27 08:23:52'),
('52e8cd7c-74b4-4877-84fb-3b5540771ef7', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:48:14', '2023-06-24 05:48:14'),
('537a154c-f3be-405f-84a7-6e20ec0a5905', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:46:04', '2023-06-24 05:46:04'),
('54eb981c-179d-4b5f-aa06-9b54ce05e485', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-29 05:34:53', '2023-06-29 05:34:53'),
('54fe1602-c58e-4b87-9e71-8c1f0ccdf768', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:48:14', '2023-06-24 05:48:14'),
('5a8aca5b-1f6a-41a3-b5ae-1f11951ad0d6', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 06:56:26', '2023-06-23 06:56:26'),
('5da37107-cd93-4e32-a86f-51fd2f907706', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:51:53', '2023-06-24 05:51:53'),
('5febb7e4-a91b-40c5-9fa8-0d6d86f0f3b7', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"qaz has booked your service.\"}', NULL, '2023-06-07 07:37:36', '2023-06-07 07:37:36'),
('6687adfe-cb5b-40a9-a91a-d28fae4b7106', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-29 05:38:45', '2023-06-29 05:38:45'),
('668dc9d4-e21e-465b-8f70-18280971da91', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"edit has booked your service.\"}', NULL, '2023-06-10 04:55:28', '2023-06-19 08:38:51'),
('6a97d461-c388-4dd8-8d24-b903ed134ec1', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-21 02:00:52', '2023-06-21 02:00:52'),
('6b24dc1c-644b-4ec9-90f0-cd73ac76556a', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:50:38', '2023-06-24 05:50:38'),
('6cea521c-26f7-4c07-b5cb-d6e3edbf4506', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-21 02:01:43', '2023-06-21 02:01:43'),
('6d208be2-758b-4a62-9a73-32d12e0cbbd4', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-21 01:58:19', '2023-06-21 01:58:19'),
('6d78fd03-49f7-45b6-8dba-8540e2d34bd7', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 00:27:17', '2023-06-19 08:41:11'),
('6dbe1ae1-b044-4b55-ac3b-3bcd4573ab11', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 06:52:17', '2023-06-23 06:52:17'),
('7087f2c2-5f7d-4fb2-8726-5815a5ee8b5d', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 00:27:13', '2023-06-19 08:41:11'),
('72fc7772-5560-4873-9779-edc2a271e047', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:53:53', '2023-06-24 05:53:53'),
('73dc7abb-bf3f-4b68-8c1d-d227f3c751cc', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:37:11', '2023-06-23 07:37:11'),
('78c5b102-4fb1-438a-8394-fdc630c6aa82', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-20 02:24:56', '2023-06-20 02:24:56'),
('78f11d1d-3719-45a7-a1b6-1e3b41ec09f0', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 01:22:13', '2023-06-23 01:22:13'),
('7a802adf-f90b-4c7d-8164-b6d4ee4f1ddc', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 00:23:00', '2023-06-19 08:41:11'),
('80cbc7d0-654b-41f5-b98e-684d7ea0caa1', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 02:06:35', '2023-06-19 07:25:19'),
('82647851-5f88-442e-9ff3-ac46a2b509e8', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-21 01:58:19', '2023-06-21 01:58:19'),
('89cde471-8654-4932-ab72-b97516e6068f', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:57:23', '2023-06-24 05:57:23'),
('978a5f19-f30a-4096-b3a1-44e91e5b1528', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:51:53', '2023-06-24 05:51:53'),
('97bf6205-2d66-4d42-be2a-2cbef9830e2f', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 02:30:56', '2023-06-24 02:30:56'),
('9a033ab9-5773-445a-87eb-80e27d70b900', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:52:58', '2023-06-24 05:52:58'),
('9b582cda-02bb-452f-9a04-48ca12a3a73f', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:50:38', '2023-06-24 05:50:38'),
('9b73ec4d-8b6e-45ea-adaf-f4cc5b690449', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:59:01', '2023-06-24 05:59:01'),
('9c9d58ec-466d-449a-8669-b960ed9e18d0', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 02:30:56', '2023-06-24 02:30:56'),
('a422a00f-e887-4c63-a730-7c462583bb70', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 06:58:02', '2023-06-23 06:58:02'),
('a616d5f0-2753-4a74-8999-178e09979f32', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:52:58', '2023-06-24 05:52:58'),
('a696e96b-a5ef-4250-9a3d-157ffca62352', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 6, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"kalpesh@gmail.com has booked your service.\"}', NULL, '2023-06-08 06:52:08', '2023-06-08 06:52:08'),
('a6b1b0fa-bde4-495b-8a6a-2de2cd18523c', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 06:52:00', '2023-06-24 06:52:00'),
('a6e257ea-501a-4a21-952a-ba6d3edfb766', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-21 02:01:43', '2023-06-21 02:01:43'),
('a7aee23b-4b4f-450a-9adf-f11454765829', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:11:33', '2023-06-23 07:11:33'),
('a7bcfa14-6cf7-42f5-8844-b1723a4f1ce1', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 01:24:13', '2023-06-23 01:24:13'),
('acf087ed-9c7b-4c99-9cc9-da199c2091e5', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:49:47', '2023-06-23 07:49:47'),
('acf410fa-2938-4c3c-8188-3f8974ad3ef1', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"demotest has booked your service.\"}', NULL, '2023-06-27 08:15:36', '2023-06-27 08:15:36'),
('ae5eb241-538c-4f9e-af7f-10810cf6f515', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 06:10:52', '2023-06-24 06:10:52'),
('afe9ec70-603a-4a44-88c3-be5cdc832a99', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:57:01', '2023-06-24 05:57:01'),
('b1b8606c-59df-465e-bdc3-bba4268050f7', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"demotest has booked your service.\"}', NULL, '2023-06-27 08:23:52', '2023-06-27 08:23:52'),
('b52bf8fd-a234-4380-be65-7dc25061d9d3', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 06:05:02', '2023-06-24 06:05:02'),
('bc329128-57e9-44f2-acbf-a11a774017b2', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 06:52:00', '2023-06-24 06:52:00'),
('c1378672-1bdd-4e3a-b0a3-6bf6937754a2', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 06:52:17', '2023-06-23 06:52:17'),
('c93c900b-7ccb-456a-8951-69ffc24c0596', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:38:21', '2023-06-23 07:38:21'),
('c9ddcf74-89fe-48f0-8110-1e397c26648e', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:02:59', '2023-06-24 05:02:59'),
('d0224b57-7a31-4b7e-8da3-3af42379e1b4', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-14 06:26:43', '2023-06-19 08:40:48'),
('d4ca0d57-0de7-4779-bfb5-1042e665f856', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 02:27:18', '2023-06-24 02:27:18'),
('d804b3ca-c7ce-4951-9e84-32899783b705', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:43:44', '2023-06-24 05:43:44'),
('de45586f-0683-401b-8269-6592fb0aba6a', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 01:24:13', '2023-06-23 01:24:13'),
('df1b4646-d376-4633-9629-8d7a5e85507a', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-20 02:24:56', '2023-06-20 02:24:56'),
('e0657421-5885-4a0f-a979-8bcbf4489ae3', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-29 05:38:45', '2023-06-29 05:38:45'),
('e1de61c6-bf33-46b2-980a-3b9d10043382', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:59:01', '2023-06-24 05:59:01'),
('e213ce7b-1bd8-4d52-a56e-3dac66ba09b0', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 01:32:06', '2023-06-23 01:32:06'),
('e3b9298d-b422-4b10-aaba-622d30b51690', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 00:27:13', '2023-06-19 07:12:56'),
('e5caf46b-0586-4504-9be4-b5089cb59fed', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 06:07:19', '2023-06-24 06:07:19'),
('ec71d500-1e6c-4a83-a278-7974acc23a91', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 02:12:43', '2023-06-24 02:12:43'),
('ee14003e-582f-42ea-a7b2-a18b23dba68d', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"demotest has booked your service.\"}', NULL, '2023-06-27 08:15:36', '2023-06-27 08:15:36'),
('f34b8040-e999-486f-965d-5e4ac21bb0df', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Admin', 2, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 05:57:23', '2023-06-24 05:57:23'),
('f615abe5-aa16-403a-9028-0c82c90301e0', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:06:44', '2023-06-23 07:06:44'),
('f7fa626b-090b-43ed-872f-9969c1e9c0e2', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"piyu has booked your service.\"}', NULL, '2023-06-24 02:27:18', '2023-06-24 02:27:18'),
('f95a38ab-c795-467c-8084-18f957cd4bf9', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-17 00:27:07', '2023-06-19 08:41:11'),
('faf9d80c-2fdb-49c9-a84d-f442b930989c', 'App\\Notifications\\BookServiceNotification', 'App\\Models\\Provider', 4, '{\"name\":\"Service Booking Notification\",\"noti-msg\":\"user has booked your service.\"}', NULL, '2023-06-23 07:08:57', '2023-06-23 07:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(100) NOT NULL,
  `token` varchar(190) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `razorpay_id` varchar(255) NOT NULL,
  `method` varchar(190) NOT NULL,
  `currency` varchar(190) NOT NULL,
  `json_response` longtext NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `razorpay_id`, `method`, `currency`, `json_response`, `service_id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(3, 'pay_M5HWNtWQERAG4M', 'card', 'INR', 'Success', 17, 8, '40', '2023-06-23 01:32:06', '2023-06-23 01:32:06'),
(4, 'pay_M5N2yoyGDaVq33', 'card', 'INR', 'Success', 19, 8, '600', '2023-06-23 06:56:26', '2023-06-23 06:56:26'),
(5, 'pay_M5N4gHZDhJhac9', 'card', 'INR', 'Success', 19, 8, '500', '2023-06-23 06:58:02', '2023-06-23 06:58:02'),
(6, 'pay_M5NDsDDqzj09Uu', 'card', 'INR', 'Success', 19, 8, '500', '2023-06-23 07:06:44', '2023-06-23 07:06:44'),
(7, 'pay_M5NG4rNEHZ13OB', 'card', 'INR', 'Success', 19, 8, '600', '2023-06-23 07:08:57', '2023-06-23 07:08:57'),
(8, 'pay_M5NIwfnOGtuhow', 'card', 'INR', 'Success', 19, 8, '600', '2023-06-23 07:11:33', '2023-06-23 07:11:33'),
(9, 'pay_M5NjyH1i2fUEES', 'card', 'INR', 'Success', 19, 8, '500', '2023-06-23 07:37:11', '2023-06-23 07:37:11'),
(10, 'pay_M5fpafctTG3QkZ', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 01:18:55', '2023-06-24 01:18:55'),
(11, 'pay_M5ge6Dho3ux0ze', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 02:06:45', '2023-06-24 02:06:45'),
(12, 'pay_M5gg4E2VOujjpq', 'card', 'INR', 'Success', 19, 10, '500', '2023-06-24 02:08:59', '2023-06-24 02:08:59'),
(13, 'pay_M5gkLosFOzHngz', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 02:12:42', '2023-06-24 02:12:42'),
(14, 'pay_M5gnnXsC6CNqey', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 02:16:06', '2023-06-24 02:16:06'),
(15, 'pay_M5gvrmu3rTWa3l', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 02:23:34', '2023-06-24 02:23:34'),
(16, 'pay_M5gwtqaXPmowRq', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 02:24:32', '2023-06-24 02:24:32'),
(17, 'pay_M5gzp2YDLgGfhd', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 02:27:18', '2023-06-24 02:27:18'),
(18, 'pay_M5h3e8fhNcyoIx', 'card', 'INR', 'Success', 19, 10, '400', '2023-06-24 02:30:56', '2023-06-24 02:30:56'),
(19, 'pay_M5jeDmr9PihiED', 'card', 'INR', 'Success', 11, 10, '700', '2023-06-24 05:02:58', '2023-06-24 05:02:58'),
(20, 'pay_M5kLHcCwWwnPUz', 'card', 'INR', 'Success', 12, 10, '1000', '2023-06-24 05:43:44', '2023-06-24 05:43:44'),
(21, 'pay_M5kNmgq9kZevpk', 'card', 'INR', 'Success', 12, 10, '800', '2023-06-24 05:46:04', '2023-06-24 05:46:04'),
(22, 'pay_M5kQ3ZRdXHWON1', 'card', 'INR', 'Success', 12, 10, '800', '2023-06-24 05:48:14', '2023-06-24 05:48:14'),
(23, 'pay_M5kScUgNRwNp08', 'card', 'INR', 'Success', 12, 10, '800', '2023-06-24 05:50:38', '2023-06-24 05:50:38'),
(24, 'pay_M5kW1cn7Ty2WIZ', 'card', 'INR', 'Success', 11, 10, '700', '2023-06-24 05:53:53', '2023-06-24 05:53:53'),
(25, 'pay_M5kZLgQqzsnq2P', 'card', 'INR', 'Success', 11, 10, '700', '2023-06-24 05:57:01', '2023-06-24 05:57:01'),
(26, 'pay_M5kbTd2A0L6sV0', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 05:59:01', '2023-06-24 05:59:01'),
(27, 'pay_M5kcCXnqDMZYdP', 'card', 'INR', 'Success', 19, 10, '200', '2023-06-24 05:59:43', '2023-06-24 05:59:43'),
(28, 'pay_M5khgZVFPJgggo', 'card', 'INR', 'Success', 19, 10, '100', '2023-06-24 06:05:02', '2023-06-24 06:05:02'),
(29, 'pay_M5kkEiZyqBCNp2', 'card', 'INR', 'Success', 19, 10, '600', '2023-06-24 06:07:19', '2023-06-24 06:07:19'),
(30, 'pay_M5km489Z1MCe91', 'card', 'INR', 'Success', 19, 10, '300', '2023-06-24 06:09:04', '2023-06-24 06:09:04'),
(31, 'pay_M5knz0nFnQda1w', 'card', 'INR', 'Success', 19, 10, '300', '2023-06-24 06:10:52', '2023-06-24 06:10:52'),
(32, 'pay_M5lVRJVJwzv6Wz', 'card', 'INR', 'Success', 19, 10, '440', '2023-06-24 06:52:00', '2023-06-24 06:52:00'),
(33, 'pay_M6yO7HNmj43vl4', 'card', 'INR', 'Success', 21, 14, '378', '2023-06-27 08:07:11', '2023-06-27 08:07:11'),
(34, 'pay_M6yWo0SLR6vx9I', 'card', 'INR', 'Success', 21, 14, '378', '2023-06-27 08:15:36', '2023-06-27 08:15:36'),
(35, 'pay_M6ygeSsl2XNaLZ', 'card', 'INR', 'Success', 21, 14, '356', '2023-06-27 08:24:43', '2023-06-27 08:24:43'),
(38, 'pay_M872joiGBVJSEI', 'card', 'INR', 'Success', 19, 15, '540', '2023-06-30 05:14:08', '2023-06-30 05:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(190) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobilenumber` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `countrycode` varchar(190) DEFAULT '91',
  `password` varchar(190) DEFAULT NULL,
  `confirmpassword` varchar(190) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postalcode` varchar(190) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `from_time` varchar(190) DEFAULT NULL,
  `to_time` varchar(190) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `subscription_id`, `name`, `mobilenumber`, `email`, `countrycode`, `password`, `confirmpassword`, `profileimage`, `dob`, `category_id`, `subcategory_id`, `country_id`, `state_id`, `city_id`, `address`, `postalcode`, `about`, `from_time`, `to_time`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 'provider', '9856362541', 'provider@gmail.com', '91', '$2y$10$PNUbhQ6Bzfm1WTUlApQmpexWYl0OGUd20KDHApLpB6oFMflJCHERu', '$2y$10$A/vYp0OZ9Z//U.MFBWkloOzft/4EjJq5RNTlwfXv0zTJlCUWg8.x6', '20230626_075126_profileimage.jpg', '1999-03-05', 5, 2, 1, 1, 1, 'Adddd', '12345678', 'Provider Demo About', '[\"19:22\",\"21:22\",\"21:22\",\"20:22\",\"22:22\",\"23:22\",\"12:22\",\"15:22\"]', '[\"23:22\",\"21:22\",\"19:25\",\"19:25\",\"19:26\",\"19:27\",\"19:27\",\"16:22\"]', 'active', '2023-06-01 00:02:43', '2023-06-28 07:22:04'),
(5, 5, 'admin', '9856325478', 'admin@gmail.com', '91', '$2y$10$zIgjqqqfnQAa14bObLNvn.T0Ddb1qfEZpl9.mvba1hYbupDnh/QOm', '$2y$10$A/vYp0OZ9Z//U.MFBWkloOzft/4EjJq5RNTlwfXv0zTJlCUWg8.x6', 'packaging_image-min.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inactive', '2023-06-01 00:06:14', '2023-06-01 00:06:14'),
(6, 6, 'rucha', '9856362541', 'rucha@gmail.com', '91', '$2y$10$zIgjqqqfnQAa14bObLNvn.T0Ddb1qfEZpl9.mvba1hYbupDnh/QOm', '$2y$10$A/vYp0OZ9Z//U.MFBWkloOzft/4EjJq5RNTlwfXv0zTJlCUWg8.x6', 'dryfruits-min.jpg', NULL, 5, 2, 1, 1, 2, 'Addd', '331', NULL, '[\"09:00\",\"09:00\",\"10:00\",\"09:00\",\"09:00\",\"09:00\",\"09:00\",\"09:00\"]', '[\"19:00\",\"19:00\",\"19:00\",\"19:00\",\"19:00\",\"19:00\",\"19:00\",\"19:00\"]', 'inactive', '2023-06-01 00:11:02', '2023-06-07 07:36:55'),
(7, 7, 'Preksha', '9856325478', 'preksha@gmail.com', '91', '$2y$10$Bn3yfPdkzFJUNuYy7iRJLu0Nri5xNXEecgq0ddOeG3IXlAZECR.Ju', '$2y$10$8fSuYjjXfPdXqzjV70gBreCwd.dgp6xrriD67JzpmKPvxfrH4mipy', 'img1 (1).png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inactive', '2023-06-01 00:13:20', '2023-06-01 00:13:20'),
(8, 8, 'lilam', '0987654676', 'lilam@gmail.com', '91', '$2y$10$/JU7pB3pIZ94wMEXc88CvuNOE73oHp9xUNUrKYukeEaUiM2brLGAy', '$2y$10$s25HhQGuJ4QdAMDtR7wYa.DCI8TLa.DifUVGuGaLrXdoW.pdDgap.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2023-06-01 00:17:46', '2023-06-01 00:17:46'),
(12, 9, 'qwed', '9033193128', 'ed@gmail.com', '91', '$2y$10$OgXF6YAxDqmdcKI46dW4NOHYr3cdQIaOk2RDzxVeMYGeUaOQCF9cC', '$2y$10$MVdWRlv4UO7SBHZSGffS6OgpoifC4e.WiD9SAJrnnxpKu3PbtDMWC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inactive', '2023-06-01 00:33:20', '2023-06-01 00:33:58'),
(401, 10, 'test', '8758', 'qwq@gmail.com', '91', NULL, NULL, '20230610_100419_profileimage.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2023-06-10 04:34:19', '2023-06-10 04:34:19'),
(405, 14, 'vidhi', '9856325412', 'vidhi@gmail.com', NULL, '$2y$10$QYwH8lSGcDi3oSZvyzCB2emNE/4AWYF3L7Pw8By6mlcRNQnG6rP/6', '$2y$10$dqY6C.xSv5.vbH/xQu0Wg.NE32Ni.lsRvbRWi4kyDQQMKssTEr2y.', '20230624_130053_profileimage.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inactive', '2023-06-24 07:30:53', '2023-06-24 07:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `seosettings`
--

CREATE TABLE `seosettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metatitle` varchar(100) DEFAULT NULL,
  `metakeyword` varchar(160) DEFAULT NULL,
  `metadescription` varchar(160) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seosettings`
--

INSERT INTO `seosettings` (`id`, `metatitle`, `metakeyword`, `metadescription`, `created_at`, `updated_at`) VALUES
(1, 'Buy Lokaly', 'buy lokaly', 'but lokaly', '2023-06-10 02:12:02', '2023-06-17 12:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` varchar(190) DEFAULT '0',
  `rate` varchar(190) DEFAULT NULL,
  `cashback` varchar(190) DEFAULT NULL,
  `servicetitle` varchar(100) DEFAULT NULL,
  `slug` varchar(190) DEFAULT NULL,
  `serviceamount` int(11) DEFAULT NULL,
  `totalamount` int(11) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `serviceoffer` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `serviceimage` varchar(255) DEFAULT NULL,
  `service_gallery` text DEFAULT NULL,
  `status` varchar(190) NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `provider_id`, `discount`, `rate`, `cashback`, `servicetitle`, `slug`, `serviceamount`, `totalamount`, `country_id`, `state_id`, `city_id`, `category_id`, `subcategory_id`, `serviceoffer`, `description`, `serviceimage`, `service_gallery`, `status`, `created_at`, `updated_at`) VALUES
(9, 4, NULL, NULL, NULL, 'Test', 'test', 5700, NULL, 1, 1, 1, 4, 3, 'Test', 'Test', '20230601_135028_serviceimage.jpg', NULL, 'inactive', '2023-06-01 08:20:28', '2023-06-03 00:38:02'),
(10, 4, NULL, NULL, NULL, 'Testing', 'testing', 4522, NULL, 1, 1, 2, 5, 2, 'Testing servie ', 'Testing', '20230602_044015_serviceimage.webp', NULL, 'active', '2023-06-01 23:10:15', '2023-06-02 23:21:03'),
(11, 4, NULL, '', NULL, 'Plumbing', 'plumbing', 700, NULL, 1, 1, 2, 4, 3, 'Plumbing work', '<p><img alt=\"\" src=\"http://127.0.0.1:8000/images_ckeditor/img5_1686118770.png\" style=\"height:200px; width:200px\" /></p>\r\n\r\n<p>Plumbing description&nbsp;</p>', '20230607_062117_serviceimage.jpg', NULL, 'active', '2023-06-07 00:51:17', '2023-06-07 00:51:17'),
(12, 6, NULL, NULL, NULL, 'Cooking', 'cooking', 1000, NULL, 1, 1, 1, 5, 2, 'They purchase the freshest and finest ingredients before coming home and preparing your meals', '<p>Service will be provided as a cook who will cook the meals for you.</p>', '', NULL, 'active', '2023-06-07 07:08:07', '2023-06-07 07:09:40'),
(13, 4, '0', NULL, NULL, 'Motor Repairing', 'motor-repairing', 560, NULL, 1, 1, 1, 8, 4, 'With Motor repairing service, cleaning the motor is also provided.', '<p>With Motor repairing service, cleaning the motor is also provided.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/images_ckeditor/demo_1686375696.jpg\" style=\"height:64px; width:226px\" /></p>\r\n\r\n<p>Demo Description</p>', '20230610_063056_serviceimage.jpg', NULL, 'active', '2023-06-10 00:11:49', '2023-06-10 04:45:30'),
(14, 4, '10', NULL, NULL, 'Cooking Meals', 'cooking-meals', 400, NULL, 1, 1, 2, 5, 2, 'Meal', '<p>Meal&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/images_ckeditor/jumbo spring roll_1687239310.jpg\" style=\"height:564px; width:752px\" /></p>', NULL, NULL, 'active', '2023-06-20 00:06:15', '2023-06-20 00:06:15'),
(16, 4, '10', '50', NULL, 'Demo', 'demo', 500, NULL, 1, 1, 1, 5, 2, 'Meal', '<p>Meal</p>', NULL, NULL, 'active', '2023-06-21 00:35:59', '2023-06-21 00:51:00'),
(17, 4, '10', '540', NULL, 'dew', 'dew', 600, NULL, 1, 1, 1, 5, 2, 'gvdgd', '<p>gggd</p>', '20230626_061517_serviceimage.webp', NULL, 'active', '2023-06-21 23:13:02', '2023-06-26 00:45:17'),
(19, 4, '10', '540', '200', 'Demo Test', 'demo-test', 600, NULL, 1, 1, 1, 5, 2, 'Cooking', '<p>Cook</p>', NULL, NULL, 'active', '2023-06-23 01:43:09', '2023-06-24 06:50:02'),
(20, 4, NULL, '150', NULL, 'Test', 'test-1', 150, NULL, 1, 1, 1, 8, 4, 'Demo service', '<p>Demo service</p>', '20230627_062117_serviceimage.jpg', NULL, 'inactive', '2023-06-27 00:47:20', '2023-06-27 00:51:17'),
(21, 4, '0', NULL, NULL, 'test', 'test-2', 378, NULL, 1, 1, 2, 5, 2, 'Service demo', '<p>Demo</p>', '20230627_063906_serviceimage.webp', NULL, 'active', '2023-06-27 01:00:16', '2023-06-27 01:09:06'),
(22, 4, NULL, '3200', '200', 'Test', 'test-3', 3200, NULL, 1, 1, 1, 8, 4, 'Service demo', '<p>service</p>', '20230628_070458_serviceimage.jpg', NULL, 'inactive', '2023-06-28 01:34:58', '2023-06-28 01:44:58'),
(38, 4, NULL, '0', NULL, 'Service test', 'service-test', 1000, NULL, 1, 1, 2, 9, 5, 'Demo', '<p>Demo</p>', '20230630_070929_serviceimage.jpg', '[\"20230630_072544_10-min.jpg\"]', 'active', '2023-06-30 01:39:29', '2023-06-30 01:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `statename` varchar(80) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `statename`, `created_at`, `updated_at`) VALUES
(1, 1, 'Maharashtra', '2023-05-26 06:12:26', '2023-05-30 01:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategoryname` varchar(150) DEFAULT NULL,
  `subcategoryslug` varchar(150) DEFAULT NULL,
  `subcategoryimage` varchar(255) DEFAULT NULL,
  `status` varchar(190) NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategoryname`, `subcategoryslug`, `subcategoryimage`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 'Cooking men', 'cooking-men', NULL, 'inactive', '2023-05-29 22:17:46', '2023-06-02 08:40:32'),
(3, 4, 'Motor Plumber', 'motor-plumber', NULL, 'inactive', '2023-05-29 22:18:21', '2023-06-02 08:40:23'),
(4, 8, 'TWSEF', 'twsef', '20230610_101155_subcategoryimage.jpg', 'inactive', '2023-06-10 04:41:55', '2023-06-10 04:42:05'),
(5, 9, 'Demo subcategory', 'demo-subcategory', '20230629_061118_subcategoryimage.jpg', 'active', '2023-06-29 00:41:18', '2023-06-29 00:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan` varchar(150) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `plan`, `startdate`, `enddate`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Basic', NULL, NULL, '0', 'paid', '2023-06-01 00:15:45', '2023-06-01 00:15:45'),
(5, 'Basic', NULL, NULL, '0', 'paid', '2023-06-01 00:18:04', '2023-06-01 00:18:04'),
(6, 'Basic', NULL, NULL, '0', 'paid', '2023-06-01 00:19:57', '2023-06-01 00:19:57'),
(7, 'Basic', NULL, NULL, '0', 'paid', '2023-06-01 00:24:50', '2023-06-01 00:24:50'),
(8, 'Basic', NULL, NULL, '0', 'paid', '2023-06-01 00:33:29', '2023-06-01 00:33:29'),
(9, 'Basic', NULL, NULL, '0', 'paid', '2023-06-01 00:33:58', '2023-06-01 00:33:58'),
(10, 'Basic', NULL, NULL, '0', 'paid', '2023-06-07 06:22:56', '2023-06-07 06:22:56'),
(12, 'Basic', NULL, NULL, '0', 'paid', '2023-06-20 06:48:43', '2023-06-20 06:48:43'),
(14, 'Basic', NULL, NULL, '0', 'paid', '2023-06-24 07:31:06', '2023-06-24 07:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactno` varchar(20) DEFAULT NULL,
  `profileimage` varchar(190) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `confirmpassword` varchar(100) DEFAULT NULL,
  `countrycode` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `postalcode` varchar(50) DEFAULT NULL,
  `user_wallet` varchar(190) DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(190) NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `profileimage`, `email_verified_at`, `password`, `confirmpassword`, `countrycode`, `dob`, `address`, `country_id`, `state_id`, `city_id`, `postalcode`, `user_wallet`, `service_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test@gmail.com', '9856325478', '20230529_123129_profileimage.webp', NULL, NULL, '', '91', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'inactive', NULL, '2023-05-29 07:00:39', '2023-05-29 07:01:29'),
(2, 'Kalpesh', 'kalpeshamlani1@gmail.com', '9033193128', '20230530_034350_profileimage.jpg', NULL, NULL, '', '91', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'active', NULL, '2023-05-29 22:13:50', '2023-05-29 22:13:50'),
(3, 'Kalpesh', 'kalpeshamlani12@gmail.com', '9033193128', '20230530_034425_profileimage.jpg', NULL, NULL, '', '91', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'active', NULL, '2023-05-29 22:14:25', '2023-05-29 22:14:25'),
(4, 'superadmin', 'superadmin@gmail.com', NULL, NULL, NULL, '$2y$10$bT0wNYy9wmzTzIO8/f0kLumVD8nMFEuut0zEHnWZs0rNMb6ibXuJ.', '', '91', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'inactive', NULL, '2023-06-01 01:03:32', '2023-06-01 01:03:32'),
(5, 'qwer', 'qwer@gmail.com', '9856325478', 'mix-spice3-min.jpg', NULL, '$2y$10$a/HzeWbzIw7R.F1f/x3xz.6916tAS95MBrf7afVkl7/vov6Lj19mm', '$2y$10$P7QTcay1mnphqhlFeMUkMuZU7RhtEQH4LvYTjSXrYi7FI..e6lQtO', '91', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'inactive', NULL, '2023-06-01 06:25:39', '2023-06-01 06:25:39'),
(8, 'user', 'user@gmail.com', '9033193128', '20230619_080326_profileimage.jpg', NULL, '$2y$10$aL9waNe4EfMsGkM1frSyBeEaIjRuiMA8KCe/N54zMDJU5x8Nag8D2', '$2y$10$81cFLsFPrp5hZuirieUcruWQZU1XKnO.1alHVshuCGcsSNeSvpr1y', '91', '2023-06-05', 'Address', 1, 1, 2, '400002', '0', NULL, 'active', NULL, '2023-06-01 06:27:43', '2023-06-29 05:34:52'),
(9, 'kalpesh@gmail.com', '123@gg.coms', '123', NULL, NULL, '$2y$10$HdggF5XgI/WJs998vYfgr.jknlQml9w1ETuuYV0wBdwOJAo3IGOgm', '$2y$10$U1SZnLJoFWmqOnEQ80vRpuWaLPIpn3/1umrpPCfKVXDARjL4nMk6y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'inactive', NULL, '2023-06-08 06:50:46', '2023-06-08 06:50:46'),
(10, 'piyu', 'piyu@gmail.com', '12345678', NULL, NULL, '$2y$10$HdggF5XgI/WJs998vYfgr.jknlQml9w1ETuuYV0wBdwOJAo3IGOgm', '$2y$10$C54EHfNCiBLIy3oDp4mYRORm3axEKiKtQm/at0mgOJjnoQLWA5LWG', NULL, '2023-06-10', 'adfsdfasdf', 1, 1, 1, '123123123', '', NULL, 'active', NULL, '2023-06-08 06:53:53', '2023-06-24 06:52:00'),
(11, 'edit', 'qwq@gmail.com', '1234565432', '20230610_100706_profileimage.jpg', NULL, '$2y$10$7cyZ8nkN3xf3Y3kO0k7Yo.lFcsbJrvzrUJqJHRHX/8eo5592BuwAq', '$2y$10$HAGvwxlfTDr5uYom03JCP.awKU4f65UL4zFPmxzKpoOkEl31JR9NO', NULL, '2023-06-10', NULL, 1, 1, 1, '0002', '', NULL, 'active', NULL, '2023-06-08 08:22:49', '2023-06-10 04:56:54'),
(14, 'demotest', 'demotest@gmail.com', '1231231234', NULL, NULL, '$2y$10$UpbLKWHzqwPaluTBMr4F8OBMsv.B/OLEuOiNK18qIkgXtYNYimwqO', '$2y$10$7zpngkyeJ1t7aGS8ytNfOe33e4ojex5sWqdYQpAUDjOjA6d5e6LPO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'inactive', NULL, '2023-06-27 08:05:38', '2023-06-27 08:24:43'),
(15, 'Purvi', 'purvi@gmail.com', '9834251634', '20230630_102531_profileimage.jpg', NULL, '$2y$10$wacWElgAmOZqKqenXhqh5.IDCMd7TnSdHYTFwUJ9T5dyauaVkMJcy', '$2y$10$/Dv0mGYXWp7iSqEHu0Tk..FuYl6FUzaaO0KGkO1/ZqdKo2gTlhqki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200', NULL, 'inactive', NULL, '2023-06-30 04:55:31', '2023-06-30 05:14:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_services`
--
ALTER TABLE `book_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_services_user_id_foreign` (`user_id`),
  ADD KEY `book_services_service_id_foreign` (`service_id`),
  ADD KEY `book_services_servicelocation_foreign` (`servicelocation`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_service_id_foreign` (`service_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_subscription_id_foreign` (`subscription_id`),
  ADD KEY `provider_category_id_foreign` (`category_id`),
  ADD KEY `provider_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `provider_country_id_foreign` (`country_id`),
  ADD KEY `provider_state_id_foreign` (`state_id`),
  ADD KEY `provider_city_id_foreign` (`city_id`);

--
-- Indexes for table `seosettings`
--
ALTER TABLE `seosettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_provider_id_foreign` (`provider_id`),
  ADD KEY `service_country_id_foreign` (`country_id`),
  ADD KEY `service_state_id_foreign` (`state_id`),
  ADD KEY `service_city_id_foreign` (`city_id`),
  ADD KEY `service_category_id_foreign` (`category_id`),
  ADD KEY `service_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book_services`
--
ALTER TABLE `book_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `seosettings`
--
ALTER TABLE `seosettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_services`
--
ALTER TABLE `book_services`
  ADD CONSTRAINT `book_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_services_servicelocation_foreign` FOREIGN KEY (`servicelocation`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `provider_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `provider_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `provider_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `provider_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `provider_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `service_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
