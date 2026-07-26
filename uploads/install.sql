-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2026 at 10:23 AM
-- Server version: 5.7.24
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_academy71`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

DROP TABLE IF EXISTS `addons`;
CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `about` longtext,
  `purchase_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` longtext,
  `phone` varchar(255) DEFAULT NULL,
  `message` longtext,
  `document` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

DROP TABLE IF EXISTS `badges`;
CREATE TABLE `badges` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `condition_from` int(11) DEFAULT NULL,
  `condition_to` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bbb_meetings`
--

DROP TABLE IF EXISTS `bbb_meetings`;
CREATE TABLE `bbb_meetings` (
  `id` int(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `meeting_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moderator_pw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewer_pw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructions` longtext COLLATE utf8_unicode_ci,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_popular` int(11) NOT NULL,
  `likes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `blog_category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
CREATE TABLE `blog_comments` (
  `blog_comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `likes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `font_awesome_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_category_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0c636fb13f01f2591efcbc372ee12067afff844c', '127.0.0.1', 1770546068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303534363036343b636f756e7443616c6c7c693a313b5f5f63695f766172737c613a313a7b733a393a22636f756e7443616c6c223b733a333a226e6577223b7d636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('87cb2f675c830163e04adf9f2dd49c47b34d0df5', '127.0.0.1', 1770546068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303534363036343b636f756e7443616c6c7c693a313b5f5f63695f766172737c613a313a7b733a393a22636f756e7443616c6c223b733a333a226e6577223b7d636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('2e11f2ce9a7ed25ee9680ae0267a3e0e6d61557e', '127.0.0.1', 1770546068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303534363036343b636f756e7443616c6c7c693a313b5f5f63695f766172737c613a313a7b733a393a22636f756e7443616c6c223b733a333a226e6577223b7d636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('8956324491dc65d51affd0e52a63a291b6dd8ee2', '127.0.0.1', 1770546068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303534363036343b636f756e7443616c6c7c693a313b5f5f63695f766172737c613a313a7b733a393a22636f756e7443616c6c223b733a333a226e6577223b7d636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('eb2fbd5bb2a256f45fb931b91b93a2ec491c71b1', '127.0.0.1', 1770546068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303534363036343b636f756e7443616c6c7c693a313b5f5f63695f766172737c613a313a7b733a393a22636f756e7443616c6c223b733a333a226e6577223b7d636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('7f9b9a4b530444a9e8f72feeafa242c0d6d9301b', '127.0.0.1', 1770546068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303534363036343b636f756e7443616c6c7c693a313b5f5f63695f766172737c613a313a7b733a393a22636f756e7443616c6c223b733a333a226e6577223b7d636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('13dcde2e96397cd504d98ab2a2d8234c02863543', '127.0.0.1', 1770546068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303534363036383b636f756e7443616c6c7c693a313b5f5f63695f766172737c613a313a7b733a393a22636f756e7443616c6c223b733a333a226e6577223b7d636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('e4331b362c0fd7d72844716d19712ef4b49d7f8b', '127.0.0.1', 1770546131, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737303534363036383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b637573746f6d5f73657373696f6e5f6c696d69747c693a313737313431303133303b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a31323a2244617669642042726f77656e223b69735f696e7374727563746f727c733a313a2231223b61646d696e5f6c6f67696e7c733a313a2231223b636f756e7443616c6c7c693a313b5f5f63695f766172737c613a313a7b733a393a22636f756e7443616c6c223b733a333a226e6577223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `commentable_id` int(11) DEFAULT NULL,
  `commentable_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(21) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  `has_read` int(11) DEFAULT NULL,
  `replied` int(11) DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_percentage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `expiry_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `outcomes` longtext COLLATE utf8_unicode_ci,
  `faqs` text COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `section` longtext COLLATE utf8_unicode_ci,
  `requirements` longtext COLLATE utf8_unicode_ci,
  `price` double DEFAULT NULL,
  `discount_flag` int(11) DEFAULT '0',
  `discounted_price` double DEFAULT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `course_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_top_course` int(11) DEFAULT '0',
  `is_admin` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_overview_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8_unicode_ci,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `is_free_course` int(11) DEFAULT NULL,
  `multi_instructor` int(11) NOT NULL DEFAULT '0',
  `enable_drip_content` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL,
  `expiry_period` int(11) DEFAULT NULL,
  `upcoming_image_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL,
  `ccavenue_supported` int(11) DEFAULT '0',
  `iyzico_supported` int(11) DEFAULT '0',
  `paystack_supported` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`, `ccavenue_supported`, `iyzico_supported`, `paystack_supported`) VALUES
(1, 'US Dollar', 'USD', '$', 1, 1, 0, 0, 0),
(2, 'Albanian Lek', 'ALL', 'Lek', 0, 1, 0, 0, 0),
(3, 'Algerian Dinar', 'DZD', 'دج', 1, 1, 0, 0, 0),
(4, 'Angolan Kwanza', 'AOA', 'Kz', 1, 1, 0, 0, 0),
(5, 'Argentine Peso', 'ARS', '$', 1, 1, 0, 0, 0),
(6, 'Armenian Dram', 'AMD', '֏', 1, 1, 0, 0, 0),
(7, 'Aruban Florin', 'AWG', 'ƒ', 1, 1, 0, 0, 0),
(8, 'Australian Dollar', 'AUD', '$', 1, 1, 0, 0, 0),
(9, 'Azerbaijani Manat', 'AZN', 'm', 1, 1, 0, 0, 0),
(10, 'Bahamian Dollar', 'BSD', 'B$', 1, 1, 0, 0, 0),
(11, 'Bahraini Dinar', 'BHD', '.د.ب', 1, 1, 0, 0, 0),
(12, 'Bangladeshi Taka', 'BDT', '৳', 1, 1, 0, 0, 0),
(13, 'Barbadian Dollar', 'BBD', 'Bds$', 1, 1, 0, 0, 0),
(14, 'Belarusian Ruble', 'BYR', 'Br', 0, 0, 0, 0, 0),
(15, 'Belgian Franc', 'BEF', 'fr', 1, 1, 0, 0, 0),
(16, 'Belize Dollar', 'BZD', '$', 1, 1, 0, 0, 0),
(17, 'Bermudan Dollar', 'BMD', '$', 1, 1, 0, 0, 0),
(18, 'Bhutanese Ngultrum', 'BTN', 'Nu.', 1, 1, 0, 0, 0),
(19, 'Bitcoin', 'BTC', '฿', 1, 1, 0, 0, 0),
(20, 'Bolivian Boliviano', 'BOB', 'Bs.', 1, 1, 0, 0, 0),
(21, 'Bosnia', 'BAM', 'KM', 1, 1, 0, 0, 0),
(22, 'Botswanan Pula', 'BWP', 'P', 1, 1, 0, 0, 0),
(23, 'Brazilian Real', 'BRL', 'R$', 1, 1, 0, 0, 0),
(24, 'British Pound Sterling', 'GBP', '£', 1, 1, 0, 0, 0),
(25, 'Brunei Dollar', 'BND', 'B$', 1, 1, 0, 0, 0),
(26, 'Bulgarian Lev', 'BGN', 'Лв.', 1, 1, 0, 0, 0),
(27, 'Burundian Franc', 'BIF', 'FBu', 1, 1, 0, 0, 0),
(28, 'Cambodian Riel', 'KHR', 'KHR', 1, 1, 0, 0, 0),
(29, 'Canadian Dollar', 'CAD', '$', 1, 1, 0, 0, 0),
(30, 'Cape Verdean Escudo', 'CVE', '$', 1, 1, 0, 0, 0),
(31, 'Cayman Islands Dollar', 'KYD', '$', 1, 1, 0, 0, 0),
(32, 'CFA Franc BCEAO', 'XOF', 'CFA', 1, 1, 0, 0, 0),
(33, 'CFA Franc BEAC', 'XAF', 'FCFA', 1, 1, 0, 0, 0),
(34, 'CFP Franc', 'XPF', '₣', 1, 1, 0, 0, 0),
(35, 'Chilean Peso', 'CLP', '$', 1, 1, 0, 0, 0),
(36, 'Chinese Yuan', 'CNY', '¥', 1, 1, 0, 0, 0),
(37, 'Colombian Peso', 'COP', '$', 1, 1, 0, 0, 0),
(38, 'Comorian Franc', 'KMF', 'CF', 1, 1, 0, 0, 0),
(39, 'Congolese Franc', 'CDF', 'FC', 1, 1, 0, 0, 0),
(40, 'Costa Rican ColÃ³n', 'CRC', '₡', 1, 1, 0, 0, 0),
(41, 'Croatian Kuna', 'HRK', 'kn', 1, 1, 0, 0, 0),
(42, 'Cuban Convertible Peso', 'CUC', '$, CUC', 1, 1, 0, 0, 0),
(43, 'Czech Republic Koruna', 'CZK', 'Kč', 1, 1, 0, 0, 0),
(44, 'Danish Krone', 'DKK', 'Kr.', 1, 1, 0, 0, 0),
(45, 'Djiboutian Franc', 'DJF', 'Fdj', 1, 1, 0, 0, 0),
(46, 'Dominican Peso', 'DOP', '$', 1, 1, 0, 0, 0),
(47, 'East Caribbean Dollar', 'XCD', '$', 1, 1, 0, 0, 0),
(48, 'Egyptian Pound', 'EGP', 'ج.م', 1, 1, 0, 0, 0),
(49, 'Eritrean Nakfa', 'ERN', 'Nfk', 1, 1, 0, 0, 0),
(50, 'Estonian Kroon', 'EEK', 'kr', 1, 1, 0, 0, 0),
(51, 'Ethiopian Birr', 'ETB', 'Nkf', 1, 1, 0, 0, 0),
(52, 'Euro', 'EUR', '€', 1, 1, 0, 0, 0),
(53, 'Falkland Islands Pound', 'FKP', '£', 1, 1, 0, 0, 0),
(54, 'Fijian Dollar', 'FJD', 'FJ$', 1, 1, 0, 0, 0),
(55, 'Gambian Dalasi', 'GMD', 'D', 1, 1, 0, 0, 0),
(56, 'Georgian Lari', 'GEL', 'ლ', 1, 1, 0, 0, 0),
(57, 'German Mark', 'DEM', 'DM', 1, 1, 0, 0, 0),
(58, 'Ghanaian Cedi', 'GHS', 'GH₵', 1, 1, 0, 0, 0),
(59, 'Gibraltar Pound', 'GIP', '£', 1, 1, 0, 0, 0),
(60, 'Greek Drachma', 'GRD', '₯, Δρχ, Δρ', 1, 1, 0, 0, 0),
(61, 'Guatemalan Quetzal', 'GTQ', 'Q', 1, 1, 0, 0, 0),
(62, 'Guinean Franc', 'GNF', 'FG', 1, 1, 0, 0, 0),
(63, 'Guyanaese Dollar', 'GYD', '$', 1, 1, 0, 0, 0),
(64, 'Haitian Gourde', 'HTG', 'G', 1, 1, 0, 0, 0),
(65, 'Honduran Lempira', 'HNL', 'L', 1, 1, 0, 0, 0),
(66, 'Hong Kong Dollar', 'HKD', '$', 1, 1, 0, 0, 0),
(67, 'Hungarian Forint', 'HUF', 'Ft', 1, 1, 0, 0, 0),
(68, 'Icelandic KrÃ³na', 'ISK', 'kr', 1, 1, 0, 0, 0),
(69, 'Indian Rupee', 'INR', '₹', 1, 1, 1, 0, 0),
(70, 'Indonesian Rupiah', 'IDR', 'Rp', 1, 1, 0, 0, 0),
(71, 'Iranian Rial', 'IRR', '﷼', 1, 1, 0, 0, 0),
(72, 'Iraqi Dinar', 'IQD', 'د.ع', 1, 1, 0, 0, 0),
(73, 'Israeli New Sheqel', 'ILS', '₪', 1, 1, 0, 0, 0),
(74, 'Italian Lira', 'ITL', 'L,£', 1, 1, 0, 0, 0),
(75, 'Jamaican Dollar', 'JMD', 'J$', 1, 1, 0, 0, 0),
(76, 'Japanese Yen', 'JPY', '¥', 1, 1, 0, 0, 0),
(77, 'Jordanian Dinar', 'JOD', 'ا.د', 1, 1, 0, 0, 0),
(78, 'Kazakhstani Tenge', 'KZT', 'лв', 1, 1, 0, 0, 0),
(79, 'Kenyan Shilling', 'KES', 'KSh', 1, 1, 0, 0, 0),
(80, 'Kuwaiti Dinar', 'KWD', 'ك.د', 1, 1, 0, 0, 0),
(81, 'Kyrgystani Som', 'KGS', 'лв', 1, 1, 0, 0, 0),
(82, 'Laotian Kip', 'LAK', '₭', 1, 1, 0, 0, 0),
(83, 'Latvian Lats', 'LVL', 'Ls', 0, 0, 0, 0, 0),
(84, 'Lebanese Pound', 'LBP', '£', 1, 1, 0, 0, 0),
(85, 'Lesotho Loti', 'LSL', 'L', 1, 1, 0, 0, 0),
(86, 'Liberian Dollar', 'LRD', '$', 1, 1, 0, 0, 0),
(87, 'Libyan Dinar', 'LYD', 'د.ل', 1, 1, 0, 0, 0),
(88, 'Lithuanian Litas', 'LTL', 'Lt', 0, 0, 0, 0, 0),
(89, 'Macanese Pataca', 'MOP', '$', 1, 1, 0, 0, 0),
(90, 'Macedonian Denar', 'MKD', 'ден', 1, 1, 0, 0, 0),
(91, 'Malagasy Ariary', 'MGA', 'Ar', 1, 1, 0, 0, 0),
(92, 'Malawian Kwacha', 'MWK', 'MK', 1, 1, 0, 0, 0),
(93, 'Malaysian Ringgit', 'MYR', 'RM', 1, 1, 0, 0, 0),
(94, 'Maldivian Rufiyaa', 'MVR', 'Rf', 1, 1, 0, 0, 0),
(95, 'Mauritanian Ouguiya', 'MRO', 'MRU', 1, 1, 0, 0, 0),
(96, 'Mauritian Rupee', 'MUR', '₨', 1, 1, 0, 0, 0),
(97, 'Mexican Peso', 'MXN', '$', 1, 1, 0, 0, 0),
(98, 'Moldovan Leu', 'MDL', 'L', 1, 1, 0, 0, 0),
(99, 'Mongolian Tugrik', 'MNT', '₮', 1, 1, 0, 0, 0),
(100, 'Moroccan Dirham', 'MAD', 'MAD', 1, 1, 0, 0, 0),
(101, 'Mozambican Metical', 'MZM', 'MT', 1, 1, 0, 0, 0),
(102, 'Myanmar Kyat', 'MMK', 'K', 1, 1, 0, 0, 0),
(103, 'Namibian Dollar', 'NAD', '$', 1, 1, 0, 0, 0),
(104, 'Nepalese Rupee', 'NPR', '₨', 1, 1, 0, 0, 0),
(105, 'Netherlands Antillean Guilder', 'ANG', 'ƒ', 1, 1, 0, 0, 0),
(106, 'New Taiwan Dollar', 'TWD', '$', 1, 1, 0, 0, 0),
(107, 'New Zealand Dollar', 'NZD', '$', 1, 1, 0, 0, 0),
(108, 'Nicaraguan CÃ³rdoba', 'NIO', 'C$', 1, 1, 0, 0, 0),
(109, 'Nigerian Naira', 'NGN', '₦', 1, 1, 0, 0, 1),
(110, 'North Korean Won', 'KPW', '₩', 0, 0, 0, 0, 0),
(111, 'Norwegian Krone', 'NOK', 'kr', 1, 1, 0, 0, 0),
(112, 'Omani Rial', 'OMR', '.ع.ر', 0, 0, 0, 0, 0),
(113, 'Pakistani Rupee', 'PKR', '₨', 1, 1, 0, 0, 0),
(114, 'Panamanian Balboa', 'PAB', 'B/.', 1, 1, 0, 0, 0),
(115, 'Papua New Guinean Kina', 'PGK', 'K', 1, 1, 0, 0, 0),
(116, 'Paraguayan Guarani', 'PYG', '₲', 1, 1, 0, 0, 0),
(117, 'Peruvian Nuevo Sol', 'PEN', 'S/.', 1, 1, 0, 0, 0),
(118, 'Philippine Peso', 'PHP', '₱', 1, 1, 0, 0, 0),
(119, 'Polish Zloty', 'PLN', 'zł', 1, 1, 0, 0, 0),
(120, 'Qatari Rial', 'QAR', 'ق.ر', 1, 1, 0, 0, 0),
(121, 'Romanian Leu', 'RON', 'lei', 1, 1, 0, 0, 0),
(122, 'Russian Ruble', 'RUB', '₽', 1, 1, 0, 0, 0),
(123, 'Rwandan Franc', 'RWF', 'FRw', 1, 1, 0, 0, 0),
(124, 'Salvadoran ColÃ³n', 'SVC', '₡', 0, 0, 0, 0, 0),
(125, 'Samoan Tala', 'WST', 'SAT', 1, 1, 0, 0, 0),
(126, 'Saudi Riyal', 'SAR', '﷼', 1, 1, 0, 0, 0),
(127, 'Serbian Dinar', 'RSD', 'din', 1, 1, 0, 0, 0),
(128, 'Seychellois Rupee', 'SCR', 'SRe', 1, 1, 0, 0, 0),
(129, 'Sierra Leonean Leone', 'SLL', 'Le', 1, 1, 0, 0, 0),
(130, 'Singapore Dollar', 'SGD', '$', 1, 1, 0, 0, 0),
(131, 'Slovak Koruna', 'SKK', 'Sk', 1, 1, 0, 0, 0),
(132, 'Solomon Islands Dollar', 'SBD', 'Si$', 1, 1, 0, 0, 0),
(133, 'Somali Shilling', 'SOS', 'Sh.so.', 1, 1, 0, 0, 0),
(134, 'South African Rand', 'ZAR', 'R', 1, 1, 0, 0, 0),
(135, 'South Korean Won', 'KRW', '₩', 1, 1, 0, 0, 0),
(136, 'Special Drawing Rights', 'XDR', 'SDR', 1, 1, 0, 0, 0),
(137, 'Sri Lankan Rupee', 'LKR', 'Rs', 1, 1, 0, 0, 0),
(138, 'St. Helena Pound', 'SHP', '£', 1, 1, 0, 0, 0),
(139, 'Sudanese Pound', 'SDG', '.س.ج', 1, 1, 0, 0, 0),
(140, 'Surinamese Dollar', 'SRD', '$', 1, 1, 0, 0, 0),
(141, 'Swazi Lilangeni', 'SZL', 'E', 1, 1, 0, 0, 0),
(142, 'Swedish Krona', 'SEK', 'kr', 1, 1, 0, 0, 0),
(143, 'Swiss Franc', 'CHF', 'CHf', 1, 1, 0, 0, 0),
(144, 'Syrian Pound', 'SYP', 'LS', 0, 0, 0, 0, 0),
(145, 'São Tomé and Príncipe Dobra', 'STD', 'Db', 1, 1, 0, 0, 0),
(146, 'Tajikistani Somoni', 'TJS', 'SM', 1, 1, 0, 0, 0),
(147, 'Tanzanian Shilling', 'TZS', 'TSh', 1, 1, 0, 0, 0),
(148, 'Thai Baht', 'THB', '฿', 1, 1, 0, 0, 0),
(149, 'Tongan pa\'anga', 'TOP', '$', 1, 1, 0, 0, 0),
(150, 'Trinidad & Tobago Dollar', 'TTD', '$', 1, 1, 0, 0, 0),
(151, 'Tunisian Dinar', 'TND', 'ت.د', 1, 1, 0, 0, 0),
(152, 'Turkish Lira', 'TRY', '₺', 1, 1, 0, 1, 0),
(153, 'Turkmenistani Manat', 'TMT', 'T', 1, 1, 0, 0, 0),
(154, 'Ugandan Shilling', 'UGX', 'USh', 1, 1, 0, 0, 0),
(155, 'Ukrainian Hryvnia', 'UAH', '₴', 1, 1, 0, 0, 0),
(156, 'United Arab Emirates Dirham', 'AED', 'إ.د', 1, 1, 0, 0, 0),
(157, 'Uruguayan Peso', 'UYU', '$', 1, 1, 0, 0, 0),
(158, 'Afghan Afghani', 'AFA', '؋', 1, 1, 0, 0, 0),
(159, 'Uzbekistan Som', 'UZS', 'лв', 1, 1, 0, 0, 0),
(160, 'Vanuatu Vatu', 'VUV', 'VT', 1, 1, 0, 0, 0),
(161, 'Venezuelan BolÃvar', 'VEF', 'Bs', 0, 0, 0, 0, 0),
(162, 'Vietnamese Dong', 'VND', '₫', 1, 1, 0, 0, 0),
(163, 'Yemeni Rial', 'YER', '﷼', 1, 1, 0, 0, 0),
(164, 'Zambian Kwacha', 'ZMK', 'ZK', 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

DROP TABLE IF EXISTS `custom_fields`;
CREATE TABLE `custom_fields` (
  `id` int(11) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `custom_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_field` text COLLATE utf8_unicode_ci,
  `sorting` int(11) DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_page`
--

DROP TABLE IF EXISTS `custom_page`;
CREATE TABLE `custom_page` (
  `custom_page_id` int(11) NOT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrol`
--

DROP TABLE IF EXISTS `enrol`;
CREATE TABLE `enrol` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `gifted_by` int(11) NOT NULL DEFAULT '0',
  `expiry_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

DROP TABLE IF EXISTS `frontend_settings`;
CREATE TABLE `frontend_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `key`, `value`) VALUES
(1, 'banner_title', 'Start learning from best Platform'),
(2, 'banner_sub_title', 'Study any topic, anytime. Explore thousands of courses for the lowest price ever!'),
(4, 'about_us', '<p></p><h2><span xss=\"removed\">About us</span></h2>'),
(10, 'terms_and_condition', '<h2>Terms and Condition</h2>'),
(11, 'privacy_policy', '<p></p><p></p><h2><span xss=\"removed\">Privacy Policy</span></h2>'),
(13, 'theme', 'default-new'),
(14, 'cookie_note', 'This website uses cookies to personalize content and analyse traffic in order to offer you a better experience.'),
(15, 'cookie_status', 'active'),
(16, 'cookie_policy', '<h1>Cookie policy</h1><ol><li>Cookies are small text files that can be used by websites to make a user\'s experience more efficient.</li><li>The law states that we can store cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies we need your permission.</li><li>This site uses different types of cookies. Some cookies are placed by third party services that appear on our pages.</li></ol>'),
(17, 'banner_image', '{\"home_1\":\"home-1.png\"}'),
(18, 'light_logo', 'logo-light.png'),
(19, 'dark_logo', 'logo-dark.png'),
(20, 'small_logo', 'logo-light-sm.png'),
(21, 'favicon', 'favicon.png'),
(22, 'recaptcha_status', '0'),
(23, 'recaptcha_secretkey', 'Valid-secret-key'),
(24, 'recaptcha_sitekey', 'Valid-site-key'),
(25, 'refund_policy', '<h2><span xss=\"removed\">Refund Policy</span></h2>'),
(26, 'facebook', 'https://facebook.com'),
(27, 'twitter', 'https://twitter.com'),
(28, 'linkedin', ''),
(31, 'blog_page_title', 'Where possibilities begin'),
(32, 'blog_page_subtitle', 'We’re a leading marketplace platform for learning and teaching online. Explore some of our most popular content and learn something new.'),
(33, 'blog_page_banner', 'blog-page.png'),
(34, 'instructors_blog_permission', '0'),
(35, 'blog_visibility_on_the_home_page', '1'),
(37, 'website_faqs', '[]'),
(38, 'motivational_speech', '[]'),
(39, 'home_page', 'home_elegant'),
(40, 'contact_info', '{\"email\":\"admin@example.com,\\r\\nsystem@example.com\",\"phone\":\"609-502-5899\\r\\n345-444-2122\",\"address\":\"455 Wolff Streets Suite 674\",\"office_hours\":\"10:00 AM - 6:00 PM\"}'),
(41, 'custom_css', ''),
(42, 'embed_code', ''),
(43, 'top_course_section', '1'),
(44, 'latest_course_section', '1'),
(45, 'top_category_section', '1'),
(46, 'upcoming_course_section', '1'),
(47, 'faq_section', '1'),
(48, 'top_instructor_section', '1'),
(49, 'motivational_speech_section', '1'),
(50, 'promotional_section', '1'),
(51, 'water_mark', ''),
(52, 'water_mark_status', 'inactive'),
(53, 'recaptcha_status_v3', '0'),
(54, 'recaptcha_secretkey_v3', 'Valid-secret-key-v3'),
(55, 'recaptcha_sitekey_v3', 'Valid-site-key-v3'),
(56, 'review_section', '1'),
(57, 'water_mark_speed', '2000'),
(58, 'water_mark_opacity', '1'),
(59, 'water_mark_color', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

DROP TABLE IF EXISTS `home_pages`;
CREATE TABLE `home_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_permanent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html_file_names` text COLLATE utf8mb4_unicode_ci,
  `created_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `title`, `description`, `identifier`, `is_permanent`, `status`, `thumbnail`, `html_file_names`, `created_at`, `updated_at`) VALUES
(1, 'Learning Platform', NULL, 'startup', 1, 0, 'assets/frontend/default-new/home/home_7.png', '[\"home_7\"]', NULL, NULL),
(2, 'Cooking', NULL, 'cooking', 1, 0, 'assets/frontend/default-new/home/home_6.png', '[\"home_6\"]', NULL, NULL),
(3, 'Yoga', NULL, 'yoga', 1, 0, 'assets/frontend/default-new/home/home_5.png', '[\"home_5\"]', NULL, NULL),
(4, 'Photography', NULL, 'photography', 1, 0, 'assets/frontend/default-new/home/home_4.png', '[\"home_4\"]', NULL, NULL),
(5, 'Multi Course Selling 2', NULL, 'business', 1, 0, 'assets/frontend/default-new/home/home_3.png', '[\"home_3\"]', NULL, NULL),
(6, 'Online Coaching', NULL, 'university', 1, 0, 'assets/frontend/default-new/home/home_2.png', '[\"home_2\"]', NULL, NULL),
(7, 'Multi Course Selling', NULL, 'general', 1, 0, 'assets/frontend/default-new/home/home_1.png', '[\"home_1\"]', NULL, NULL),
(10, 'Corporate Training', NULL, 'elegant', 1, 1, 'assets/frontend/default-new/home/elegant.png', '[\"home_elegant\"]', NULL, NULL),
(11, 'Health & Fitness', NULL, 'fitness', 1, 0, 'assets/frontend/default-new/home/fitness.png', '[\"home_fitness\"]', NULL, NULL),
(15, 'Individual Instructor', NULL, 'kindergarten', 1, 0, 'assets/frontend/default-new/home/kindergarten.png', '[\"home_kindergarten\"]', NULL, NULL),
(16, 'Online Course Marketplace', NULL, 'marketplace', 1, 0, 'assets/frontend/default-new/home/marketplace.png', '[\"home_marketplace\"]', NULL, NULL),
(17, 'Tech & Programming', NULL, 'development', 1, 0, 'assets/frontend/default-new/home/development.png', '[\"home_development\"]', NULL, NULL),
(18, 'University', NULL, 'university2', 1, 0, 'assets/frontend/default-new/home/university2.png', '[\"home_university2\"]', NULL, NULL),
(22, 'Kids Learning Platform', NULL, 'cooking2', 1, 0, 'assets/frontend/default-new/home/cooking2.png', '[\"home_cooking2\"]', NULL, NULL),
(23, 'Language Learning', NULL, 'language', 1, 0, 'assets/frontend/default-new/home/language.png', '[\"home_language\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_followings`
--

DROP TABLE IF EXISTS `instructor_followings`;
CREATE TABLE `instructor_followings` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `is_following` int(11) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci,
  `english` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`) VALUES
(1, 'English', 'English'),
(2, '404_not_found', '404 not found'),
(3, 'courses', 'Courses'),
(4, 'all_courses', 'All courses'),
(5, 'all_courses', 'All courses'),
(6, 'all_courses', 'All courses'),
(7, 'search', 'Search'),
(8, 'search', 'Search'),
(9, 'search', 'Search'),
(10, 'search', 'Search'),
(11, 'search', 'Search'),
(12, 'search', 'Search'),
(13, 'you_have_no_items_in_your_cart!', 'You have no items in your cart!'),
(14, 'you_have_no_items_in_your_cart!', 'You have no items in your cart!'),
(15, 'you_have_no_items_in_your_cart!', 'You have no items in your cart!'),
(16, 'you_have_no_items_in_your_cart!', 'You have no items in your cart!'),
(17, 'you_have_no_items_in_your_cart!', 'You have no items in your cart!'),
(18, 'you_have_no_items_in_your_cart!', 'You have no items in your cart!'),
(19, 'checkout', 'Checkout'),
(20, 'checkout', 'Checkout'),
(21, 'checkout', 'Checkout'),
(22, 'login', 'Login'),
(23, 'login', 'Login'),
(24, 'login', 'Login'),
(25, 'join_now', 'Join now'),
(26, 'join_now', 'Join now'),
(27, 'join_now', 'Join now'),
(28, 'join_now', 'Join now'),
(29, 'join_now', 'Join now'),
(30, 'join_now', 'Join now'),
(31, 'sign_up', 'Sign up'),
(32, 'cart', 'Cart'),
(33, 'cart', 'Cart'),
(34, 'cart', 'Cart'),
(35, 'categories', 'Categories'),
(36, 'categories', 'Categories'),
(37, 'categories', 'Categories'),
(38, 'categories', 'Categories'),
(39, 'cookie_policy', 'Cookie policy'),
(40, 'cookie_policy', 'Cookie policy'),
(41, 'cookie_policy', 'Cookie policy'),
(42, 'cookie_policy', 'Cookie policy'),
(43, 'accept', 'Accept'),
(44, 'accept', 'Accept'),
(45, 'accept', 'Accept'),
(46, 'accept', 'Accept'),
(47, 'accept', 'Accept'),
(48, 'accept', 'Accept'),
(49, 'home', 'Home'),
(50, 'the_page_you_requested_could_not_be_found', 'The page you requested could not be found'),
(51, 'the_page_you_requested_could_not_be_found', 'The page you requested could not be found'),
(52, 'the_page_you_requested_could_not_be_found', 'The page you requested could not be found'),
(53, 'check_the_spelling_of_the_url', 'Check the spelling of the url'),
(54, 'check_the_spelling_of_the_url', 'Check the spelling of the url'),
(55, 'check_the_spelling_of_the_url', 'Check the spelling of the url'),
(56, 'check_the_spelling_of_the_url', 'Check the spelling of the url'),
(57, 'if_you_are_still_puzzled,_click_on_the_home_link_below', 'If you are still puzzled, click on the home link below'),
(58, 'if_you_are_still_puzzled,_click_on_the_home_link_below', 'If you are still puzzled, click on the home link below'),
(59, 'if_you_are_still_puzzled,_click_on_the_home_link_below', 'If you are still puzzled, click on the home link below'),
(60, 'if_you_are_still_puzzled,_click_on_the_home_link_below', 'If you are still puzzled, click on the home link below'),
(61, 'if_you_are_still_puzzled,_click_on_the_home_link_below', 'If you are still puzzled, click on the home link below'),
(62, 'if_you_are_still_puzzled,_click_on_the_home_link_below', 'If you are still puzzled, click on the home link below'),
(63, 'back_to_home', 'Back to home'),
(64, 'back_to_home', 'Back to home'),
(65, 'back_to_home', 'Back to home'),
(66, 'back_to_home', 'Back to home'),
(67, 'back_to_home', 'Back to home'),
(68, 'back_to_home', 'Back to home'),
(69, 'top_categories', 'Top categories'),
(70, 'useful_links', 'Useful links'),
(71, 'useful_links', 'Useful links'),
(72, 'useful_links', 'Useful links'),
(73, 'useful_links', 'Useful links'),
(74, 'useful_links', 'Useful links'),
(75, 'useful_links', 'Useful links'),
(76, 'become_an_instructor', 'Become an instructor'),
(77, 'become_an_instructor', 'Become an instructor'),
(78, 'become_an_instructor', 'Become an instructor'),
(79, 'become_an_instructor', 'Become an instructor'),
(80, 'blog', 'Blog'),
(81, 'blog', 'Blog'),
(82, 'blog', 'Blog'),
(83, 'blog', 'Blog'),
(84, 'blog', 'Blog'),
(85, 'help', 'Help'),
(86, 'help', 'Help'),
(87, 'help', 'Help'),
(88, 'help', 'Help'),
(89, 'help', 'Help'),
(90, 'help', 'Help'),
(91, 'contact_us', 'Contact us'),
(92, 'contact_us', 'Contact us'),
(93, 'contact_us', 'Contact us'),
(94, 'contact_us', 'Contact us'),
(95, 'contact_us', 'Contact us'),
(96, 'contact_us', 'Contact us'),
(97, 'about_us', 'About us'),
(98, 'about_us', 'About us'),
(99, 'about_us', 'About us'),
(100, 'about_us', 'About us'),
(101, 'privacy_policy', 'Privacy policy'),
(102, 'privacy_policy', 'Privacy policy'),
(103, 'privacy_policy', 'Privacy policy'),
(104, 'privacy_policy', 'Privacy policy'),
(105, 'privacy_policy', 'Privacy policy'),
(106, 'privacy_policy', 'Privacy policy'),
(107, 'terms_and_condition', 'Terms and condition'),
(108, 'terms_and_condition', 'Terms and condition'),
(109, 'terms_and_condition', 'Terms and condition'),
(110, 'terms_and_condition', 'Terms and condition'),
(111, 'terms_and_condition', 'Terms and condition'),
(112, 'terms_and_condition', 'Terms and condition'),
(113, 'faq', 'Faq'),
(114, 'faq', 'Faq'),
(115, 'faq', 'Faq'),
(116, 'faq', 'Faq'),
(117, 'faq', 'Faq'),
(118, 'refund_policy', 'Refund policy'),
(119, 'refund_policy', 'Refund policy'),
(120, 'refund_policy', 'Refund policy'),
(121, 'refund_policy', 'Refund policy'),
(122, 'refund_policy', 'Refund policy'),
(123, 'subscribe_to_our_newsletter', 'Subscribe to our newsletter'),
(124, 'subscribe_to_our_newsletter', 'Subscribe to our newsletter'),
(125, 'subscribe_to_our_newsletter', 'Subscribe to our newsletter'),
(126, 'subscribe_to_our_newsletter', 'Subscribe to our newsletter'),
(127, 'subscribe_to_our_newsletter', 'Subscribe to our newsletter'),
(128, 'subscribe_to_our_newsletter', 'Subscribe to our newsletter'),
(129, 'enter_your_email_address', 'Enter your email address'),
(130, 'enter_your_email_address', 'Enter your email address'),
(131, 'enter_your_email_address', 'Enter your email address'),
(132, 'enter_your_email_address', 'Enter your email address'),
(133, 'enter_your_email_address', 'Enter your email address'),
(134, 'enter_your_email_address', 'Enter your email address'),
(135, 'creativeitem', 'Creativeitem'),
(136, 'creativeitem', 'Creativeitem'),
(137, 'creativeitem', 'Creativeitem'),
(138, 'creativeitem', 'Creativeitem'),
(139, 'creativeitem', 'Creativeitem'),
(140, 'are_you_sure', 'Are you sure'),
(141, 'are_you_sure', 'Are you sure'),
(142, 'yes', 'Yes'),
(143, 'yes', 'Yes'),
(144, 'yes', 'Yes'),
(145, 'no', 'No'),
(146, 'no', 'No'),
(147, 'no', 'No'),
(148, 'no', 'No'),
(149, 'log_in', 'Log in'),
(150, 'explore,_learn,_and_grow_with_us._enjoy_a_seamless_and_enriching_educational_journey._lets_begin!', 'Explore, learn, and grow with us. enjoy a seamless and enriching educational journey. lets begin!'),
(151, 'your_email', 'Your email'),
(152, 'enter_your_email', 'Enter your email'),
(153, 'password', 'Password'),
(154, 'enter_your_valid_password', 'Enter your valid password'),
(155, 'forgot_password?', 'Forgot password?'),
(156, 'don`t_have_an_account?', 'Don`t have an account?'),
(157, 'or', 'Or'),
(158, 'welcome', 'Welcome'),
(159, 'dashboard', 'Dashboard'),
(160, 'quick_actions', 'Quick actions'),
(161, 'create_course', 'Create course'),
(162, 'add_course', 'Add course'),
(163, 'add_new_lesson', 'Add new lesson'),
(164, 'add_lesson', 'Add lesson'),
(165, 'add_student', 'Add student'),
(166, 'enrol_a_student', 'Enrol a student'),
(167, 'enrol_student', 'Enrol student'),
(168, 'help_center', 'Help center'),
(169, 'read_documentation', 'Read documentation'),
(170, 'watch_video_tutorial', 'Watch video tutorial'),
(171, 'get_customer_support', 'Get customer support'),
(172, 'order_customization', 'Order customization'),
(173, 'request_a_new_feature', 'Request a new feature'),
(174, 'browse_addons', 'Browse addons'),
(175, 'get_services', 'Get services'),
(176, 'remove_all', 'Remove all'),
(177, 'notification', 'Notification'),
(178, 'no_notification', 'No notification'),
(179, 'stay_tuned!', 'Stay tuned!'),
(180, 'notifications_about_your_activity_will_show_up_here.', 'Notifications about your activity will show up here.'),
(181, 'notification_settings', 'Notification settings'),
(182, 'mark_all_as_read', 'Mark all as read'),
(183, 'admin', 'Admin'),
(184, 'my_account', 'My account'),
(185, 'settings', 'Settings'),
(186, 'logout', 'Logout'),
(187, 'visit_website', 'Visit website'),
(188, 'navigation', 'Navigation'),
(189, 'manage_courses', 'Manage courses'),
(190, 'add_new_course', 'Add new course'),
(191, 'course_category', 'Course category'),
(192, 'coupons', 'Coupons'),
(193, 'enrollments', 'Enrollments'),
(194, 'course_enrollment', 'Course enrollment'),
(195, 'enrol_history', 'Enrol history'),
(196, 'report', 'Report'),
(197, 'admin_revenue', 'Admin revenue'),
(198, 'instructor_revenue', 'Instructor revenue'),
(199, 'purchase_history', 'Purchase history'),
(200, 'users', 'Users'),
(201, 'admins', 'Admins'),
(202, 'manage_admins', 'Manage admins'),
(203, 'add_new_admin', 'Add new admin'),
(204, 'instructors', 'Instructors'),
(205, 'manage_instructors', 'Manage instructors'),
(206, 'add_new_instructor', 'Add new instructor'),
(207, 'instructor_payout', 'Instructor payout'),
(208, 'instructor_settings', 'Instructor settings'),
(209, 'applications', 'Applications'),
(210, 'students', 'Students'),
(211, 'manage_students', 'Manage students'),
(212, 'add_new_student', 'Add new student'),
(213, 'message', 'Message'),
(214, 'newsletter', 'Newsletter'),
(215, 'all_newsletter', 'All newsletter'),
(216, 'subscribed_user', 'Subscribed user'),
(217, 'contact', 'Contact'),
(218, 'all_blogs', 'All blogs'),
(219, 'pending_blog', 'Pending blog'),
(220, 'blog_category', 'Blog category'),
(221, 'blog_settings', 'Blog settings'),
(222, 'addons', 'Addons'),
(223, 'themes', 'Themes'),
(224, 'system_settings', 'System settings'),
(225, 'website_settings', 'Website settings'),
(226, 'academy_cloud', 'Academy cloud'),
(227, 'drip_content_settings', 'Drip content settings'),
(228, 'wasabi_storage_settings', 'Wasabi storage settings'),
(229, 'bbb_live_class_settings', 'Bbb live class settings'),
(230, 'payment_settings', 'Payment settings'),
(231, 'language_settings', 'Language settings'),
(232, 'social_login', 'Social login'),
(233, 'custom_page_builder', 'Custom page builder'),
(234, 'data_center', 'Data center'),
(235, 'about', 'About'),
(236, 'manage_profile', 'Manage profile'),
(237, 'admin_revenue_this_year', 'Admin revenue this year'),
(238, 'number_courses', 'Number courses'),
(239, 'number_of_lessons', 'Number of lessons'),
(240, 'number_of_enrolment', 'Number of enrolment'),
(241, 'number_of_student', 'Number of student'),
(242, 'course_overview', 'Course overview'),
(243, 'active_courses', 'Active courses'),
(244, 'pending_courses', 'Pending courses'),
(245, 'requested_withdrawal', 'Requested withdrawal'),
(246, 'january', 'January'),
(247, 'february', 'February'),
(248, 'march', 'March'),
(249, 'april', 'April'),
(250, 'may', 'May'),
(251, 'june', 'June'),
(252, 'july', 'July'),
(253, 'august', 'August'),
(254, 'september', 'September'),
(255, 'october', 'October'),
(256, 'november', 'November'),
(257, 'december', 'December'),
(258, 'this_year', 'This year'),
(259, 'active_course', 'Active course'),
(260, 'pending_course', 'Pending course'),
(261, 'heads_up', 'Heads up'),
(262, 'congratulations', 'Congratulations'),
(263, 'oh_snap', 'Oh snap'),
(264, 'please_fill_all_the_required_fields', 'Please fill all the required fields'),
(265, 'close', 'Close'),
(266, 'cancel', 'Cancel'),
(267, 'continue', 'Continue'),
(268, 'ok', 'Ok'),
(269, 'success', 'Success'),
(270, 'your_server_does_not_allow_uploading_files_that_large.', 'Your server does not allow uploading files that large.'),
(271, 'your_servers_file_upload_limit_is_40mb', 'Your servers file upload limit is 40mb'),
(272, 'successfully', 'Successfully'),
(273, 'div_added_to_bottom_', 'Div added to bottom '),
(274, 'div_has_been_deleted_', 'Div has been deleted '),
(275, 'not_found', 'Not found'),
(276, 'about_this_application', 'About this application'),
(277, 'software_version', 'Software version'),
(278, 'check_update', 'Check update'),
(279, 'php_version', 'Php version'),
(280, 'curl_enable', 'Curl enable'),
(281, 'enabled', 'Enabled'),
(282, 'purchase_code', 'Purchase code'),
(283, 'product_license', 'Product license'),
(284, 'invalid', 'Invalid'),
(285, 'enter_valid_purchase_code', 'Enter valid purchase code'),
(286, 'customer_support_status', 'Customer support status'),
(287, 'support_expiry_date', 'Support expiry date'),
(288, 'customer_name', 'Customer name'),
(289, 'customer_support', 'Customer support'),
(290, 'our_premium_services', 'Our premium services'),
(291, 'website_name', 'Website name'),
(292, 'website_title', 'Website title'),
(293, 'website_keywords', 'Website keywords'),
(294, 'website_description', 'Website description'),
(295, 'author', 'Author'),
(296, 'slogan', 'Slogan'),
(297, 'system_email', 'System email'),
(298, 'address', 'Address'),
(299, 'phone', 'Phone'),
(300, 'youtube_api_key', 'Youtube api key'),
(301, 'get_youtube_api_key', 'Get youtube api key'),
(302, 'if_you_want_to_use_google_drive_video,_you_need_to_enable_the_google_drive_service_in_this_api', 'If you want to use google drive video, you need to enable the google drive service in this api'),
(303, 'vimeo_api_key', 'Vimeo api key'),
(304, 'get_vimeo_api_key', 'Get vimeo api key'),
(305, 'system_language', 'System language'),
(306, 'student_email_verification', 'Student email verification'),
(307, 'enable', 'Enable'),
(308, 'disable', 'Disable'),
(309, 'course_accessibility', 'Course accessibility'),
(310, 'publicly', 'Publicly'),
(311, 'only_logged_in_users', 'Only logged in users'),
(312, 'number_of_authorized_devices', 'Number of authorized devices'),
(313, 'how_many_devices_do_you_want_to_allow_for_logging_in_using_a_single_account', 'How many devices do you want to allow for logging in using a single account'),
(314, 'course_selling_tax', 'Course selling tax'),
(315, 'enter_0_if_you_want_to_disable_the_tax_option', 'Enter 0 if you want to disable the tax option'),
(316, 'google_analytics_id', 'Google analytics id'),
(317, 'keep_it_blank_if_you_want_to_disable_it', 'Keep it blank if you want to disable it'),
(318, 'meta_pixel_id', 'Meta pixel id'),
(319, 'footer_text', 'Footer text'),
(320, 'footer_link', 'Footer link'),
(321, 'timezone', 'Timezone'),
(322, 'can_students_disable_their_own_accounts?', 'Can students disable their own accounts?'),
(323, 'save', 'Save'),
(324, 'update_product', 'Update product'),
(325, 'file', 'File'),
(326, 'update', 'Update'),
(327, 'product_updated_successfully', 'Product updated successfully'),
(328, 'administration', 'Administration'),
(329, 'log_out', 'Log out'),
(330, 'start_learning_from_best_platform', 'Start learning from best platform'),
(331, 'study_any_topic,_anytime._explore_thousands_of_courses_for_the_lowest_price_ever!', 'Study any topic, anytime. explore thousands of courses for the lowest price ever!'),
(332, 'what_do_you_want_to_learn', 'What do you want to learn'),
(333, 'expert_instruction', 'Expert instruction'),
(334, 'find_the_right_course_for_you', 'Find the right course for you'),
(335, 'online_courses', 'Online courses'),
(336, 'explore_a_variety_of_fresh_topics', 'Explore a variety of fresh topics'),
(337, 'lifetime_access', 'Lifetime access'),
(338, 'learn_on_your_schedule', 'Learn on your schedule'),
(339, 'top_courses', 'Top courses'),
(340, 'these_are_the_most_popular_courses_among_listen_courses_learners_worldwide', 'These are the most popular courses among listen courses learners worldwide'),
(341, 'top', 'Top'),
(342, 'latest_courses', 'Latest courses'),
(343, 'these_are_the_most_latest_courses_among_listen_courses_learners_worldwide', 'These are the most latest courses among listen courses learners worldwide'),
(344, 'learn', 'Learn'),
(345, 'new_skills_when_and_where_you_like.', 'New skills when and where you like.'),
(346, 'discover_a_world_of_learning_opportunities_through_our_upcoming_courses,_where_industry_experts.', 'Discover a world of learning opportunities through our upcoming courses, where industry experts.'),
(347, 'join_course_for_free', 'Join course for free'),
(348, 'became_a_instructor', 'Became a instructor'),
(349, 'join_now_to_start_learning', 'Join now to start learning'),
(350, 'learn_from_our_quality_instructors!', 'Learn from our quality instructors!'),
(351, 'get_started', 'Get started'),
(352, 'become_a_new_instructor', 'Become a new instructor'),
(353, 'teach_thousands_of_students_and_earn_money!', 'Teach thousands of students and earn money!'),
(354, 'course_adding_form', 'Course adding form'),
(355, 'back_to_course_list', 'Back to course list'),
(356, 'basic', 'Basic'),
(357, 'info', 'Info'),
(358, 'pricing', 'Pricing'),
(359, 'media', 'Media'),
(360, 'seo', 'Seo'),
(361, 'finish', 'Finish'),
(362, 'course_title', 'Course title'),
(363, 'enter_course_title', 'Enter course title'),
(364, 'short_description', 'Short description'),
(365, 'description', 'Description'),
(366, 'category', 'Category'),
(367, 'select_a_category', 'Select a category'),
(368, 'select_sub_category', 'Select sub category'),
(369, 'level', 'Level'),
(370, 'beginner', 'Beginner'),
(371, 'advanced', 'Advanced'),
(372, 'intermediate', 'Intermediate'),
(373, 'language_made_in', 'Language made in'),
(374, 'enable_drip_content', 'Enable drip content'),
(375, 'create_as_a', 'Create as a'),
(376, 'private_course', 'Private course'),
(377, 'upcoming_course', 'Upcoming course'),
(378, 'upcoming_image_thumbnail', 'Upcoming image thumbnail'),
(379, 'the_image_size_should_be', 'The image size should be'),
(380, 'publish_date', 'Publish date'),
(381, 'enter_publish_date', 'Enter publish date'),
(382, 'check_if_this_course_is_top_course', 'Check if this course is top course'),
(383, 'course_faq', 'Course faq'),
(384, 'faq_question', 'Faq question'),
(385, 'answer', 'Answer'),
(386, 'requirements', 'Requirements'),
(387, 'provide_requirements', 'Provide requirements'),
(388, 'outcomes', 'Outcomes'),
(389, 'provide_outcomes', 'Provide outcomes'),
(390, 'check_if_this_is_a_free_course', 'Check if this is a free course'),
(391, 'course_price', 'Course price'),
(392, 'enter_course_course_price', 'Enter course course price'),
(393, 'check_if_this_course_has_discount', 'Check if this course has discount'),
(394, 'discounted_price', 'Discounted price'),
(395, 'this_course_has', 'This course has'),
(396, 'discount', 'Discount'),
(397, 'expiry_period', 'Expiry period'),
(398, 'lifetime', 'Lifetime'),
(399, 'limited_time', 'Limited time'),
(400, 'number_of_month', 'Number of month'),
(401, 'after_purchase,_students_can_access_the_course_until_your_selected_time.', 'After purchase, students can access the course until your selected time.'),
(402, 'course_overview_provider', 'Course overview provider'),
(403, 'youtube', 'Youtube'),
(404, 'vimeo', 'Vimeo'),
(405, 'html5', 'Html5'),
(406, 'course_overview_url', 'Course overview url'),
(407, 'course_thumbnail', 'Course thumbnail'),
(408, 'meta_keywords', 'Meta keywords'),
(409, 'write_a_keyword_and_then_press_enter_button', 'Write a keyword and then press enter button'),
(410, 'meta_description', 'Meta description'),
(411, 'thank_you', 'Thank you'),
(412, 'you_are_just_one_click_away', 'You are just one click away'),
(413, 'submit', 'Submit'),
(414, 'your_servers_file_upload_limit_is_64mb', 'Your servers file upload limit is 64mb'),
(415, 'website_notification', 'Website notification'),
(416, 'smtp_settings', 'Smtp settings'),
(417, 'email_template', 'Email template'),
(418, 'protocol', 'Protocol'),
(419, 'smtp_crypto', 'Smtp crypto'),
(420, 'smtp_host', 'Smtp host'),
(421, 'smtp_port', 'Smtp port'),
(422, 'smtp_from_email', 'Smtp from email'),
(423, 'smtp_username', 'Smtp username'),
(424, 'smtp_password', 'Smtp password'),
(425, 'email_type', 'Email type'),
(426, 'email_subject', 'Email subject'),
(427, 'action', 'Action'),
(428, 'to_admin', 'To admin'),
(429, 'to_user', 'To user'),
(430, 'edit_email_template', 'Edit email template'),
(431, 'to_instructor', 'To instructor'),
(432, 'to_student', 'To student'),
(433, 'to_affiliator', 'To affiliator'),
(434, 'to_payer', 'To payer'),
(435, 'to_receiver', 'To receiver'),
(436, 'configure_your_notification_settings', 'Configure your notification settings'),
(437, 'new_user_registration', 'New user registration'),
(438, 'get_notified_when_a_new_user_signs_up', 'Get notified when a new user signs up'),
(439, 'configure_for_admin', 'Configure for admin'),
(440, 'system_notification', 'System notification'),
(441, 'email_notification', 'Email notification'),
(442, 'configure_for_user', 'Configure for user'),
(443, 'email_verification', 'Email verification'),
(444, 'not_editable', 'Not editable'),
(445, 'it_is_permanently_enabled_for_student_email_verification.', 'It is permanently enabled for student email verification.'),
(446, 'forgot_password_mail', 'Forgot password mail'),
(447, 'account_security_alert', 'Account security alert'),
(448, 'send_verification_code_for_login_from_a_new_device', 'Send verification code for login from a new device'),
(449, 'course_purchase_notification', 'Course purchase notification'),
(450, 'stay_up-to-date_on_student_course_purchases.', 'Stay up-to-date on student course purchases.'),
(451, 'configure_for_student', 'Configure for student'),
(452, 'configure_for_instructor', 'Configure for instructor'),
(453, 'course_completion_mail', 'Course completion mail'),
(454, 'stay_up_to_date_on_student_course_completion.', 'Stay up to date on student course completion.'),
(455, 'course_gift_notification', 'Course gift notification'),
(456, 'notify_users_after_course_gift', 'Notify users after course gift'),
(457, 'configure_for_payer', 'Configure for payer'),
(458, 'configure_for_receiver', 'Configure for receiver'),
(459, 'public_signup', 'Public signup'),
(460, 'seo_settings', 'Seo settings'),
(461, 'sitemap', 'Sitemap'),
(462, 'frontend_settings', 'Frontend settings'),
(463, 'home_layout', 'Home layout'),
(464, 'home_page_settings', 'Home page settings'),
(465, 'website_faqs', 'Website faqs'),
(466, 'contact_information', 'Contact information'),
(467, 'recaptcha', 'Recaptcha'),
(468, 'logo_&_images', 'Logo & images'),
(469, 'custom_codes', 'Custom codes'),
(470, 'video_water_mark', 'Video water mark'),
(471, 'frontend_website_settings', 'Frontend website settings'),
(472, 'banner_title', 'Banner title'),
(473, 'banner_sub_title', 'Banner sub title'),
(474, 'cookie_status', 'Cookie status'),
(475, 'active', 'Active'),
(476, 'inactive', 'Inactive'),
(477, 'cookie_note', 'Cookie note'),
(478, 'facebook', 'Facebook'),
(479, 'twitter', 'Twitter'),
(480, 'linkedin', 'Linkedin'),
(481, 'update_settings', 'Update settings'),
(482, 'activated', 'Activated'),
(483, 'motivational_speech', 'Motivational speech'),
(484, 'title', 'Title'),
(485, 'image', 'Image'),
(486, 'upload_image', 'Upload image'),
(487, 'save_changes', 'Save changes'),
(488, 'home_page_section', 'Home page section'),
(489, 'upcoming_course_section', 'Upcoming course section'),
(490, 'top_course_section', 'Top course section'),
(491, 'latest_course_section', 'Latest course section'),
(492, 'top_category_section', 'Top category section'),
(493, 'top_instructor_section', 'Top instructor section'),
(494, 'faq_section', 'Faq section'),
(495, 'motivational_speech_section', 'Motivational speech section'),
(496, 'blog_visibility_on_the_home_page', 'Blog visibility on the home page'),
(497, 'promotional_section', 'Promotional section'),
(498, 'question', 'Question'),
(499, 'contact_email', 'Contact email'),
(500, 'phone_number', 'Phone number'),
(501, 'office_hours', 'Office hours'),
(502, 'recaptcha_settings', 'Recaptcha settings'),
(503, 'recaptcha_status', 'Recaptcha status'),
(504, 'off', 'Off'),
(505, 'on_(v2)', 'On (v2)'),
(506, 'on_(v3)', 'On (v3)'),
(507, 'recaptcha_sitekey', 'Recaptcha sitekey'),
(508, 'recaptcha_secretkey', 'Recaptcha secretkey'),
(509, 'update_recaptcha_settings', 'Update recaptcha settings'),
(510, 'update_banner_image', 'Update banner image'),
(511, 'upload_banner_image', 'Upload banner image'),
(512, 'update_light_logo', 'Update light logo'),
(513, 'upload_light_logo', 'Upload light logo'),
(514, 'update_dark_logo', 'Update dark logo'),
(515, 'upload_dark_logo', 'Upload dark logo'),
(516, 'update_small_logo', 'Update small logo'),
(517, 'upload_small_logo', 'Upload small logo'),
(518, 'update_favicon', 'Update favicon'),
(519, 'upload_favicon', 'Upload favicon'),
(520, 'you_can_modify_your_theme_style_and_add_external_embed_code_from_here', 'You can modify your theme style and add external embed code from here'),
(521, 'enter_your_custom_css', 'Enter your custom css'),
(522, 'only_css_code', 'Only css code'),
(523, 'these_codes_are_applicable_for_all_pages_of_the_frontend_site', 'These codes are applicable for all pages of the frontend site'),
(524, 'enter_your_embed_or_widget_code', 'Enter your embed or widget code'),
(525, 'enter_your_embed_or_widget_code_here', 'Enter your embed or widget code here'),
(526, 'video_water_mark_settings', 'Video water mark settings'),
(527, 'water_mark_status', 'Water mark status'),
(528, 'water_mark_text_/_image', 'Water mark text / image'),
(529, 'text', 'Text'),
(530, 'upload_water_mark_logo', 'Upload water mark logo'),
(531, 'latest_from_our_blog', 'Latest from our blog'),
(532, 'exploring_the_cutting-edge_insights_and_updates_on_our_blog', 'Exploring the cutting-edge insights and updates on our blog'),
(533, 'see_all', 'See all'),
(534, 'blogs', 'Blogs'),
(535, 'inspirational_journeys', 'Inspirational journeys'),
(536, 'follow_the_stories_of_academics_and_their_research_expeditions', 'Follow the stories of academics and their research expeditions'),
(537, 'total', 'Total'),
(538, 'articles', 'Articles'),
(539, 'type_your_keywords', 'Type your keywords'),
(540, 'all_categories', 'All categories'),
(541, 'recent_posts', 'Recent posts'),
(542, 'invalid_email_address', 'Invalid email address'),
(543, 'new_home_page_layout_has_been_activated', 'New home page layout has been activated'),
(544, 'we_provides_you_world_class_performance', 'We provides you world class performance'),
(545, 'smart_solution', 'Smart solution'),
(546, 'happy_students', 'Happy students'),
(547, 'experienced_instructors', 'Experienced instructors'),
(548, 'it_looks_like_you_are_skipping_a_version', 'It looks like you are skipping a version'),
(549, 'please_update_version', 'Please update version'),
(550, 'first', 'First'),
(551, 'gamification_badges', 'Gamification badges'),
(552, 'video_watermark', 'Video watermark'),
(553, 'review', 'Review'),
(554, 'review_section', 'Review section'),
(555, 'video_watermark_settings', 'Video watermark settings'),
(556, 'watermark_status', 'Watermark status'),
(557, 'watermark_animation_speed', 'Watermark animation speed'),
(558, 'set_the_watermark_animation_speed_in_milliseconds_(e.g.,_1000_for_1_second,_3000_for_3_seconds).', 'Set the watermark animation speed in milliseconds (e.g., 1000 for 1 second, 3000 for 3 seconds).'),
(559, 'opacity_level_of_watermark', 'Opacity level of watermark'),
(560, 'set_the_watermark_opacity_between_0_(completely_transparent)_and_1_(fully_visible)._for_example:_0.3,_0.5,_0.8.', 'Set the watermark opacity between 0 (completely transparent) and 1 (fully visible). for example: 0.3, 0.5, 0.8.'),
(561, 'watermark_text_/_image', 'Watermark text / image'),
(562, 'text_color', 'Text color'),
(563, 'click_the_color_box_to_set_the_watermark_text_color_according_to_your_preference.', 'Click the color box to set the watermark text color according to your preference.'),
(564, 'upload_watermark_logo', 'Upload watermark logo'),
(565, 'review_list', 'Review list'),
(566, 'add_a_review', 'Add a review'),
(567, 'add_review', 'Add review'),
(568, 'no_data_found', 'No data found'),
(569, 'video_water_marks_updated_successfully', 'Video water marks updated successfully'),
(570, 'what_the_people_thinks_about_us', 'What the people thinks about us'),
(571, 'it_highlights_feedback_and_testimonials_from_users,_reflecting_their_experiences_and_satisfaction.', 'It highlights feedback and testimonials from users, reflecting their experiences and satisfaction.'),
(572, 'upcoming_courses', 'Upcoming courses'),
(573, 'free_courses', 'Free courses'),
(574, 'paid_courses', 'Paid courses'),
(575, 'course_list', 'Course list'),
(576, 'all', 'All'),
(577, 'status', 'Status'),
(578, 'pending', 'Pending'),
(579, 'private', 'Private'),
(580, 'upcoming', 'Upcoming'),
(581, 'instructor', 'Instructor'),
(582, 'price', 'Price'),
(583, 'free', 'Free'),
(584, 'paid', 'Paid'),
(585, 'filter', 'Filter'),
(586, 'lesson_and_section', 'Lesson and section'),
(587, 'enrolled_student', 'Enrolled student'),
(588, 'actions', 'Actions'),
(589, 'add_new_category', 'Add new category'),
(590, 'add_category', 'Add category'),
(591, 'category_add_form', 'Category add form'),
(592, 'category_code', 'Category code'),
(593, 'category_title', 'Category title'),
(594, 'parent', 'Parent'),
(595, 'none', 'None'),
(596, 'select_none_to_create_a_parent_category', 'Select none to create a parent category'),
(597, 'icon_picker', 'Icon picker'),
(598, 'sub_category_thumbnail', 'Sub category thumbnail'),
(599, 'category_thumbnail', 'Category thumbnail'),
(600, 'choose_thumbnail', 'Choose thumbnail'),
(601, 'blog_categories', 'Blog categories'),
(602, 'add_a_new_category', 'Add a new category'),
(603, 'subtitle', 'Subtitle'),
(604, 'character', 'Character'),
(605, 'add_new_coupon', 'Add new coupon'),
(606, 'coupon_code', 'Coupon code'),
(607, 'discount_percentage', 'Discount percentage'),
(608, 'validity_till', 'Validity till'),
(609, 'add_coupons', 'Add coupons'),
(610, 'back_to_coupons', 'Back to coupons'),
(611, 'coupon_add_form', 'Coupon add form'),
(612, 'generate_a_random_coupon_code', 'Generate a random coupon code'),
(613, 'generate_random', 'Generate random'),
(614, 'expiry_date', 'Expiry date'),
(615, 'user', 'User'),
(616, 'course', 'Course'),
(617, 'paid_amount', 'Paid amount'),
(618, 'payment_method', 'Payment method'),
(619, 'purchased_date', 'Purchased date'),
(620, 'private_messaging', 'Private messaging'),
(621, 'private_message', 'Private message'),
(622, 'new_message', 'New message'),
(623, 'choose_an_option_from_the_left_side', 'Choose an option from the left side'),
(624, 'send_message', 'Send message'),
(625, 'send_message', 'Send message'),
(626, 'send_message', 'Send message'),
(627, 'subscribe', 'Subscribe'),
(628, 'email_address', 'Email address'),
(629, 'email_address', 'Email address'),
(630, 'subscribe_to_our_newsletter_to_receive_the_latest_news_and_promotions.', 'Subscribe to our newsletter to receive the latest news and promotions.'),
(631, 'subscribe_to_our_newsletter_to_receive_the_latest_news_and_promotions.', 'Subscribe to our newsletter to receive the latest news and promotions.'),
(632, 'copyright', 'Copyright'),
(633, 'copyright', 'Copyright'),
(634, 'all_rights_reserved', 'All rights reserved'),
(635, 'all_rights_reserved', 'All rights reserved'),
(636, 'home_page_builder', 'Home page builder');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE `lesson` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cloud_video_id` int(20) DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `audio_url` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `lesson_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment` longtext COLLATE utf8_unicode_ci,
  `attachment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8_unicode_ci,
  `is_free` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `quiz_attempt` int(11) NOT NULL DEFAULT '0',
  `video_type_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(20) NOT NULL,
  `message_thread_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `sender` int(20) DEFAULT NULL,
  `receiver` int(20) DEFAULT NULL,
  `timestamp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

DROP TABLE IF EXISTS `message_thread`;
CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `receiver` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `last_message_timestamp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_histories`
--

DROP TABLE IF EXISTS `newsletter_histories`;
CREATE TABLE `newsletter_histories` (
  `id` int(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tried_times` int(11) DEFAULT NULL,
  `sent_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscriber`
--

DROP TABLE IF EXISTS `newsletter_subscriber`;
CREATE TABLE `newsletter_subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `from_user` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_settings`
--

DROP TABLE IF EXISTS `notification_settings`;
CREATE TABLE `notification_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_editable` int(11) DEFAULT NULL,
  `addon_identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_types` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `system_notification` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_notification` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template` longtext COLLATE utf8_unicode_ci,
  `setting_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting_sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updated` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification_settings`
--

INSERT INTO `notification_settings` (`id`, `type`, `is_editable`, `addon_identifier`, `user_types`, `system_notification`, `email_notification`, `subject`, `template`, `setting_title`, `setting_sub_title`, `date_updated`) VALUES
(1, 'signup', 1, NULL, '[\"admin\",\"user\"]', '{\"admin\":\"1\",\"user\":\"1\"}', '{\"admin\":\"0\",\"user\":\"0\"}', '{\"admin\":\"New user registered\",\"user\":\"Registered successfully\"}', '{\"admin\":\"New user registered [user_name] \\r\\n<br>User email: <b>[user_email]<\\/b>\",\"user\":\"You have successfully registered with us at [system_name].\"}', 'New user registration', 'Get notified when a new user signs up', '1693215071'),
(2, 'email_verification', 0, NULL, '[\"user\"]', '{\"user\":\"0\"}', '{\"user\":\"1\"}', '{\"user\":\"Email verification code\"}', '{\"user\":\"You have received a email verification code. Your verification code is [email_verification_code]\"}', 'Email verification', 'It is permanently enabled for student email verification.', '1684135777'),
(3, 'forget_password_mail', 0, NULL, '[\"user\"]', '{\"user\":\"0\"}', '{\"user\":\"1\"}', '{\"user\":\"Forgot password verification code\"}', '{\"user\":\"You have received a email verification code. Your verification code is [system_name] [verification_link] [minutes]\"}', 'Forgot password mail', 'It is permanently enabled for student email verification.', '1684145383'),
(4, 'new_device_login_confirmation', 0, NULL, '[\"user\"]', '{\"user\":\"0\"}', '{\"user\":\"1\"}', '{\"user\":\"Please confirm your login\"}', '{\"user\":\"Have you tried logging in with a different device? Confirm using the verification code. Your verification code is [verification_code]. Remember that you will lose access to your previous device after logging in to the new device <b>[user_agent]<\\/b>.<br> Use the verification code within [minutes] minutes\"}', 'Account security alert', 'Send verification code for login from a new device', '1684145383'),
(6, 'course_purchase', 1, NULL, '[\"admin\",\"student\",\"instructor\"]', '{\"admin\":\"1\",\"student\":\"1\",\"instructor\":\"1\"}', '{\"admin\":\"0\",\"student\":\"0\",\"instructor\":\"0\"}', '{\"admin\":\"A new course has been sold\",\"instructor\":\"A new course has been sold\",\"student\":\"You have purchased a new course\"}', '{\"admin\":\"<p>Course title: [course_title]<\\/p><p>Student: [student_name]\\r\\n<\\/p><p>Paid amount: [paid_amount]<\\/p><p>Instructor: [instructor_name]<\\/p>\",\"instructor\":\"Course title: [course_title]\\r\\nStudent: [student_name]\\r\\nPaid amount: [paid_amount]\",\"student\":\"Course title: [course_title]\\r\\nPaid amount: [paid_amount]\\r\\nInstructor: [instructor_name]\"}', 'Course purchase notification', 'Stay up-to-date on student course purchases.', '1684303456'),
(7, 'course_completion_mail', 1, NULL, '[\"student\",\"instructor\"]', '{\"student\":\"1\",\"instructor\":\"1\"}', '{\"student\":\"0\",\"instructor\":\"0\"}', '{\"instructor\":\"Course completion\",\"student\":\"You have completed a new course\"}', '{\"instructor\":\"Course completed [course_title]\\r\\nStudent: [student_name]\",\"student\":\"Course: [course_title]\\r\\nInstructor: [instructor_name]\"}', 'Course completion mail', 'Stay up to date on student course completion.', '1699431547'),
(8, 'certificate_eligibility', 1, 'certificate', '[\"student\",\"instructor\"]', '{\"student\":\"1\",\"instructor\":\"1\"}', '{\"student\":\"0\",\"instructor\":\"0\"}', '{\"instructor\":\"Certificate eligibility\",\"student\":\"certificate eligibility\"}', '{\"instructor\":\"Course: [course_title]\\r\\nStudent: [student_name]\\r\\nCertificate link: [certificate_link]\",\"student\":\"Course: [course_title]\\r\\nInstructor: [instructor_name]\\r\\nCertificate link: [certificate_link]\"}', 'Course eligibility notification', 'Stay up to date on course certificate eligibility.', '1684303460'),
(9, 'offline_payment_suspended_mail', 1, 'offline_payment', '[\"student\"]', '{\"student\":\"1\"}', '{\"student\":\"0\"}', '{\"student\":\"Your payment has been suspended\"}', '{\"student\":\"<p>Your offline payment has been <b style=\'color: red;\'>suspended</b> !</p><p>Please provide a valid document of your payment.</p>\"}', 'Offline payment suspended mail', 'If students provides fake information, notify them of the suspension', '1684303463'),
(10, 'bundle_purchase', 1, 'course_bundle', '[\"admin\",\"student\",\"instructor\"]', '{\"admin\":\"1\",\"student\":\"1\",\"instructor\":\"1\"}', '{\"admin\":\"0\",\"student\":\"0\",\"instructor\":\"0\"}', '{\"admin\":\"A new course bundle has been sold \",\"instructor\":\"A new course bundle has been sold \",\"student\":\"You have purchased a new course bundle test\"}', '{\"admin\":\"Course bundle: [bundle_title]\\r\\nStudent: [student_name]\\r\\nInstructor: [instructor_name] \",\"instructor\":\"Course bundle: [bundle_title]\\r\\nStudent: [student_name] \",\"student\":\"Course bundle: [bundle_title]\\r\\nInstructor: [instructor_name] \"}', 'Course bundle purchase notification', 'Stay up-to-date on student course bundle purchases.', '1684303467'),
(13, 'add_new_user_as_affiliator', 0, 'affiliate_course', '[\"affiliator\"]', '{\"affiliator\":\"0\"}', '{\"affiliator\":\"1\"}', '{\"affiliator\":\"Congratulation ! You are assigned as an affiliator\"}', '{\"affiliator\":\"You are assigned as a website Affiliator.\\r\\nWebsite: [website_link]\\r\\n<br>\\r\\nPassword: [password]\"}', 'New user added as affiliator', 'Send account information to the new user', '1684135777'),
(14, 'affiliator_approval_notification', 1, 'affiliate_course', '[\"affiliator\"]', '{\"affiliator\":\"1\"}', '{\"affiliator\":\"0\"}', '{\"affiliator\":\"Congratulations! Your affiliate request has been approved\"}', '{\"affiliator\":\"Congratulations! Your affiliate request has been approved\"}', 'Affiliate approval notification', 'Send affiliate approval mail to the user account', '1684303472'),
(15, 'affiliator_request_cancellation', 1, 'affiliate_course', '[\"affiliator\"]', '{\"affiliator\":\"1\"}', '{\"affiliator\":\"0\"}', '{\"affiliator\":\"Sorry ! Your request has been currently refused\"}', '{\"affiliator\":\"Sorry ! Your request has been currently refused.\"}', 'Affiliator request cancellation', 'Send mail, when you cancel the affiliation request', '1684303473'),
(16, 'affiliation_amount_withdrawal_request', 1, 'affiliate_course', '[\"admin\",\"affiliator\"]', '{\"admin\":\"1\",\"affiliator\":\"1\"}', '{\"admin\":\"0\",\"affiliator\":\"0\"}', '{\"admin\":\"New money withdrawal request\",\"affiliator\":\"New money withdrawal request\"}', '{\"admin\":\"New money withdrawal request by [user_name] [amount]\",\"affiliator\":\"Your Withdrawal request of [amount] has been sent to authority\"}', 'Affiliation money withdrawal request', 'Send mail, when the users request the withdrawal of money', '1684303476'),
(17, 'approval_affiliation_amount_withdrawal_request', 1, 'affiliate_course', '[\"affiliator\"]', '{\"affiliator\":\"1\"}', '{\"affiliator\":\"0\"}', '{\"affiliator\":\"Congartulation ! Your withdrawal request has been approved\"}', '{\"affiliator\":\"Congartulation ! Your payment request has been approved.\"}', 'Approval of withdrawal request of affiliation', 'Send mail, when you approved the affiliation withdrawal request', '1684303480'),
(18, 'course_gift', 1, NULL, '[\"payer\",\"receiver\"]', '{\"payer\":\"1\",\"receiver\":\"1\"}', '{\"payer\":\"1\",\"receiver\":\"1\"}', '{\"payer\":\"You have gift a course\",\"receiver\":\"You have received a course gift\"}', '{\"payer\":\"You have gift a course to [user_name] [course_title][instructor]\",\"receiver\":\"You have received a course gift by [payer][course_title][instructor]\"}', 'Course gift notification', 'Notify users after course gift', '1691818623'),
(20, 'noticeboard', 1, 'noticeboard', '[\"student\"]', '{\"student\":\"1\"}', '{\"student\":\"1\"}', '{\"student\":\"Noticeboard\"}', '{\"student\":\"Hi, You have a new notice by [instructor_name]. The course [course_title] [notice_title][notice_description]\"}', 'Course Noticeboard', 'Notify to enrolled students when announcements are created by the instructor for a particular course.\n', '1699525375'),
(21, 'instructor_followups', 1, '', '[\"student\"]', '{\"student\":\"1\"}', '{\"student\":\"0\"}', '{\"student\":\"Instructor followups\"}', '{\"student\":\"Hi, You have a new notice by [instructor_name]. The course [course_title]\"}', 'Instructor followups', 'Notify to enrolled students when announcements are created by the instructor for a particular course.', '1699525375'),
(22, 'instructor_followups_reminder', 1, '', '[\"instructor\"]', '{\"instructor\":\"1\"}', '{\"instructor\":\"0\"}', '{\"instructor\":\"Follow-up of student\"}', '{\"instructor\":\"Hi, You have a new follow by [student_name].\"}', 'Instructor followups', 'When any student follows an instructor, the instructor should receive a notification.', '1699525375');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `admin_revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor_revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `instructor_payment_status` int(11) DEFAULT '0',
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

DROP TABLE IF EXISTS `payment_gateways`;
CREATE TABLE `payment_gateways` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keys` text COLLATE utf8_unicode_ci NOT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled_test_mode` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_addon` int(11) NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `identifier`, `currency`, `title`, `description`, `keys`, `model_name`, `enabled_test_mode`, `status`, `is_addon`, `created_at`, `updated_at`) VALUES
(1, 'paypal', 'USD', 'Paypal', '', '{\"sandbox_client_id\":\"AfGaziKslex-scLAyYdDYXNFaz2aL5qGau-SbDgE_D2E80D3AFauLagP8e0kCq9au7W4IasmFbirUUYc\",\"sandbox_secret_key\":\"EMa5pCTuOpmHkhHaCGibGhVUcKg0yt5-C3CzJw-OWJCzaXXzTlyD17SICob_BkfM_0Nlk7TWnN42cbGz\",\"production_client_id\":\"1234\",\"production_secret_key\":\"12345\"}', 'Payment_model', 1, 1, 0, '', '1673263724'),
(2, 'stripe', 'USD', 'Stripe', '', '{\"public_key\":\"pk_test_CAC3cB1mhgkJqXtypYBTGb4f\",\"secret_key\":\"sk_test_iatnshcHhQVRXdygXw3L2Pp2\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}', 'Payment_model', 1, 1, 0, '', '1673263724'),
(3, 'razorpay', 'INR', 'Razorpay', '', '{\"key_id\":\"rzp_test_J60bqBOi1z1aF5\",\"secret_key\":\"uk935K7p4j96UCJgHK8kAU4q\",\"theme_color\":\"#23d792\"}', 'Payment_model', 1, 1, 0, '', '1708580304'),
(4, 'xendit', 'USD', 'Xendit', '', '{\"api_key\":\"xnd_development_44KVee2PG4HeeZxG69R5eXOJHVD7t84FZUIH8dMxa37ZU3bZ8KDKV9ugPfy5fRK\",\"secret_key\":\"your_xendit_secret_key\",\"other_parameter\":\"value\"}', 'Payment_model', 1, 1, 0, '', '1700647736'),
(5, 'payu', 'PLN', 'Payu', '', '{\"pos_id\":\"PKf789971N2ig5hbF71y1BX46k\",\"second_key\":\"vaWDmIqbwiVUOVitXet9ZlC9mQ\",\"client_id\":\"PKf789971N2ig5hbF71y1BX46k\",\"client_secret\":\"vaWDmIqbwiVUOVitXet9ZlC9mQ\"}', 'Payment_model', 1, 1, 0, '', '1707980726'),
(6, 'pagseguro', 'BRL', 'Pagseguro', '', '{\"api_key\":\"BAE981AF77CA4768A93849AFF5BF2331\",\"secret_key\":\"8045696DBFBF765FF4189FBAE1E02AB5\",\"other_parameter\":\"value\"}', 'Payment_model', 1, 1, 0, '', '1705559611'),
(7, 'sslcommerz', 'USD', 'SSL Commerz', '', '{\"store_id\":\"sslcommerz_store_id\",\"store_password\":\"sslcommerz_store_password\"}', 'Payment_model', 1, 1, 0, '', '1673264610'),
(8, 'skrill', 'USD', 'Skrill', '', '{\"skrill_merchant_email\":\"urwatech@gmail.com\",\"secret_passphrase\":\"your_skrill_secret_key\"}', 'Payment_model', 1, 1, 0, '', '1700647745'),
(10, 'doku', 'USD', 'Doku', '', '{\"client_id\":\"BRN-0271-1700996849302\",\"shared_key\":\"SK-BxOS4PfUdIEMHLccyMI3\"}', 'Payment_model', 1, 1, 0, '', '1708603994'),
(11, 'bkash', 'BDT', 'Bkash', '', '{\"app_key\":\"app-key\",\"app_secret\":\"app-secret\",\"username\":\"username\",\"password\":\"passwoed\"}', 'Payment_model', 1, 1, 0, '1700997440', '1701596645'),
(12, 'cashfree', 'INR', 'CashFree', '', '{\"client_id\":\"TEST100748308df0665cabda6c2f38b903847001\",\"client_secret\":\"cfsk_ma_test_71065d7cadf8695e7845e86244bd7011_fff5714b\"}', 'Payment_model', 1, 1, 0, '1700997440', '1701688995'),
(13, 'maxicash', 'USD', 'Maxicash', '', '{\"merchant_id\":\"TEST100748308df0665cabda6c2f38b903847001\",\"merchant_password\":\"cfsk_ma_test_71065d7cadf8695e7845e86244bd7011_fff5714b\"}', 'Payment_model', 1, 1, 0, '1700997440', '1701688995'),
(14, 'aamarpay', 'BDT', 'Aamarpay', '', '{\"store_id\":\"aamarpaytest\",\"signature_key\":\"dbb74894e82415a2f7ff0ec3a97e4183\"}', 'Payment_model', 1, 1, 0, '1700997440', '1711366991'),
(15, 'flutterwave', 'NGN', 'Flutterwave', '', '{\"public_key\":\"FLWPUBK_TEST-b6fbee21fd2d9f13be74bf4d87fe6197-X\",\"secret_key\":\"FLWSECK_TEST-70c3f071a83a1d14bb8a0061e53845a7-X\"}', 'Payment_model', 1, 1, 0, '1700997440', '1711366991'),
(16, 'tazapay', 'USD', 'Tazapay', '', '{\"public_key\":\"pk_test_audpDpZGmHmYT46kmHvA\",\"api_key\":\"ak_test_CRXTUMNGV4MVPO7RDGT2\",\"api_secret\":\"sk_test_0OfyPSFUX4YqcQGkeyOWCVkEQ7WAWeZ6SmsNNpfFQ989qm15f8mu2gqmYhiXkZ87iF26Ej1Ex9pgNuTq9YoxksPmQjDEbyATBoWw0bNH12mQPIJQ4VGqEPIB5FEizarZ\"}', 'Payment_model', 1, 1, 0, '1700997440', '1711366991');

-- --------------------------------------------------------

--
-- Table structure for table `payout`
--

DROP TABLE IF EXISTS `payout`;
CREATE TABLE `payout` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `permissions` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) UNSIGNED NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_of_options` int(11) DEFAULT NULL,
  `options` longtext COLLATE utf8_unicode_ci,
  `correct_answers` longtext COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

DROP TABLE IF EXISTS `quiz_results`;
CREATE TABLE `quiz_results` (
  `quiz_result_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_answers` longtext COLLATE utf8_unicode_ci NOT NULL,
  `correct_answers` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'question_id',
  `total_obtained_marks` double NOT NULL,
  `date_added` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_updated` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_submitted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(11) UNSIGNED NOT NULL,
  `rating` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ratable_id` int(11) DEFAULT NULL,
  `ratable_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_files`
--

DROP TABLE IF EXISTS `resource_files`;
CREATE TABLE `resource_files` (
  `id` int(11) NOT NULL,
  `lesson_id` int(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `date_added`, `last_modified`) VALUES
(1, 'Admin', 1234567890, 1234567890),
(2, 'User', 1234567890, 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `restricted_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo_fields`
--

DROP TABLE IF EXISTS `seo_fields`;
CREATE TABLE `seo_fields` (
  `id` int(11) UNSIGNED NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_addon` int(11) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_robot` text COLLATE utf8_unicode_ci,
  `canonical_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8_unicode_ci,
  `og_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `json_ld` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seo_fields`
--

INSERT INTO `seo_fields` (`id`, `route`, `url`, `is_addon`, `meta_title`, `meta_keywords`, `meta_description`, `meta_robot`, `canonical_url`, `custom_url`, `og_title`, `og_description`, `og_image`, `json_ld`) VALUES
(1, 'home', 'home', NULL, 'Home page', NULL, 'Home page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy', 'https://demo.creativeitem.com/academy', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(2, 'courses', 'home/courses', NULL, 'Course page', NULL, 'Course page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/home/courses', 'https://demo.creativeitem.com/academy/home/courses', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(3, 'login', 'login', NULL, 'Login page', NULL, 'Login page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/login', 'https://demo.creativeitem.com/academy/login', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(4, 'sign_up', 'sign_up', NULL, 'Signup page', NULL, 'Signup page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/sign_up', 'https://demo.creativeitem.com/academy/sign_up', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(5, 'blog', 'blog', NULL, 'Blog page', NULL, 'Blog page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/blog', 'https://demo.creativeitem.com/academy/blog', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(6, 'contact_us', 'home/contact_us', NULL, 'Contact us page', NULL, 'Contact us page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/home/contact_us', 'https://demo.creativeitem.com/academy/home/contact_us', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(7, 'about_us', 'home/about_us', NULL, 'About us page', NULL, 'About us page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/home/about_us', 'https://demo.creativeitem.com/academy/home/about_us', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(8, 'privacy_policy', 'home/privacy_policy', NULL, 'Privacy policy page', NULL, 'Privacy policy page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/home/privacy_policy', 'https://demo.creativeitem.com/academy/home/privacy_policy', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(9, 'terms_and_condition', 'home/terms_and_condition', NULL, 'Terms and condition page', NULL, 'Terms and condition page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/home/terms_and_condition', 'https://demo.creativeitem.com/academy/home/terms_and_condition', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(10, 'refund_policy', 'home/refund_policy', NULL, 'Refund policy page', NULL, 'Refund policy page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/home/refund_policy', 'https://demo.creativeitem.com/academy/home/refund_policy', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(11, 'faq', 'home/faq', NULL, 'Faq page', NULL, 'Faq page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/home/faq', 'https://demo.creativeitem.com/academy/home/faq', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(12, 'ebook', 'ebook', 1, 'Ebook page', NULL, 'Ebook page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/ebook', 'https://demo.creativeitem.com/academy/ebook', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(13, 'course_bundles', 'course_bundles', 1, 'Course bundle page', NULL, 'Course bundle page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/course_bundles', 'https://demo.creativeitem.com/academy/course_bundles', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }'),
(14, 'bootcamps', 'addons/bootcamp/bootcamp_list', 1, 'Bootcamps page', NULL, 'Bootcamps page for academy Seo', 'Meta robot', 'https://demo.creativeitem.com/academy/addons/bootcamp/bootcamp_list', 'https://demo.creativeitem.com/academy/addons/bootcamp/bootcamp_list', 'Og title', 'Og description', NULL, '{ \"@context\": \"http://schema.org\", \"@type\": \"WebSite\", \"name\": \"CodeCanyon\", \"url\": \"https://codecanyon.net\" }');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'language', 'english'),
(2, 'system_name', 'Academy LMS'),
(3, 'system_title', 'Academy Learning Club'),
(4, 'system_email', 'academy@example.com'),
(5, 'address', 'Sydney, Australia'),
(6, 'phone', '+143-52-9933631'),
(7, 'purchase_code', 'your-purchase-code'),
(8, 'paypal', '[{\"active\":\"1\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AfGaziKslex-scLAyYdDYXNFaz2aL5qGau-SbDgE_D2E80D3AFauLagP8e0kCq9au7W4IasmFbirUUYc\",\"sandbox_secret_key\":\"EMa5pCTuOpmHkhHaCGibGhVUcKg0yt5-C3CzJw-OWJCzaXXzTlyD17SICob_BkfM_0Nlk7TWnN42cbGz\",\"production_client_id\":\"1234\",\"production_secret_key\":\"12345\"}]'),
(9, 'stripe_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_CAC3cB1mhgkJqXtypYBTGb4f\",\"secret_key\":\"sk_test_iatnshcHhQVRXdygXw3L2Pp2\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
(10, 'youtube_api_key', 'youtube-and-google-drive-api-key'),
(11, 'vimeo_api_key', 'vimeo-api-key'),
(12, 'slogan', 'A course based video CMS'),
(13, 'text_align', NULL),
(14, 'allow_instructor', '1'),
(15, 'instructor_revenue', '70'),
(16, 'system_currency', 'USD'),
(17, 'paypal_currency', 'USD'),
(18, 'stripe_currency', 'USD'),
(19, 'author', 'Creativeitem'),
(20, 'currency_position', 'left'),
(21, 'website_description', 'Study any topic, anytime. explore thousands of courses for the lowest price ever!'),
(22, 'website_keywords', 'LMS,Learning Management System,Creativeitem,Academy LMS'),
(23, 'footer_text', 'Creativeitem'),
(24, 'footer_link', 'https://creativeitem.com/'),
(25, 'protocol', 'smtp'),
(26, 'smtp_host', 'smtp.gmail.com'),
(27, 'smtp_port', '587'),
(28, 'smtp_user', 'admin@example.com'),
(29, 'smtp_pass', 'Enter-your-app-password'),
(30, 'version', '7.2'),
(31, 'student_email_verification', 'disable'),
(32, 'instructor_application_note', 'Fill all the fields carefully and share if you want to share any document with us it will help us to evaluate you as an instructor.'),
(33, 'razorpay_keys', '[{\"active\":\"1\",\"key\":\"rzp_test_J60bqBOi1z1aF5\",\"secret_key\":\"uk935K7p4j96UCJgHK8kAU4q\",\"theme_color\":\"#c7a600\"}]'),
(34, 'razorpay_currency', 'USD'),
(35, 'fb_app_id', NULL),
(36, 'fb_app_secret', NULL),
(37, 'fb_social_login', NULL),
(38, 'drip_content_settings', '{\"lesson_completion_role\":\"percentage\",\"minimum_duration\":15,\"minimum_percentage\":\"30\",\"locked_lesson_message\":\"&lt;h3 xss=&quot;removed&quot; style=&quot;text-align: center; &quot;&gt;&lt;span xss=&quot;removed&quot;&gt;&lt;strong&gt;Permission denied!&lt;\\/strong&gt;&lt;\\/span&gt;&lt;\\/h3&gt;&lt;p xss=&quot;removed&quot; style=&quot;text-align: center; &quot;&gt;&lt;span xss=&quot;removed&quot;&gt;This course supports drip content, so you must complete the previous lessons.&lt;\\/span&gt;&lt;\\/p&gt;\"}'),
(41, 'course_accessibility', 'publicly'),
(42, 'smtp_crypto', 'tls'),
(43, 'allowed_device_number_of_loging', '5'),
(47, 'academy_cloud_access_token', 'jdfghasdfasdfasdfasdfasdf'),
(48, 'course_selling_tax', '0'),
(49, 'ccavenue_keys', '[{\"active\":\"1\",\"ccavenue_merchant_id\":\"cmi_xxxxxx\",\"ccavenue_working_key\":\"cwk_xxxxxxxxxxxx\",\"ccavenue_access_code\":\"ccc_xxxxxxxxxxxxx\"}]'),
(50, 'ccavenue_currency', 'INR'),
(51, 'iyzico_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"iyzico_currency\":\"TRY\",\"api_test_key\":\"atk_xxxxxxxx\",\"secret_test_key\":\"stk_xxxxxxxx\",\"api_live_key\":\"alk_xxxxxxxx\",\"secret_live_key\":\"slk_xxxxxxxx\"}]'),
(52, 'iyzico_currency', 'TRY'),
(53, 'paystack_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"secret_test_key\":\"sk_test_c746060e693dd50c6f397dffc6c3b2f655217c94\",\"public_test_key\":\"pk_test_0816abbed3c339b8473ff22f970c7da1c78cbe1b\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxx\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxx\"}]'),
(54, 'paystack_currency', 'NGN'),
(55, 'paytm_keys', '[{\"PAYTM_MERCHANT_KEY\":\"PAYTM_MERCHANT_KEY\",\"PAYTM_MERCHANT_MID\":\"PAYTM_MERCHANT_MID\",\"PAYTM_MERCHANT_WEBSITE\":\"DEFAULT\",\"INDUSTRY_TYPE_ID\":\"Retail\",\"CHANNEL_ID\":\"WEB\"}]'),
(57, 'google_analytics_id', ''),
(58, 'meta_pixel_id', ''),
(59, 'smtp_from_email', 'admin@example.com'),
(61, 'language_dirs', '{\"english\":\"ltr\",\"hindi\":\"rtl\",\"arabic\":\"rtl\"}'),
(62, 'timezone', 'America/New_York'),
(63, 'account_disable', '0'),
(64, 'offline_bank_information', 'Enter your bank information'),
(65, 'randCallRange', '20'),
(70, 'wasabi_key', 'access-key'),
(71, 'wasabi_secret_key', 'secret-key'),
(72, 'wasabi_bucketname', 'bucket-name'),
(73, 'wasabi_region', 'region-name'),
(74, 'bbb_setting', '{\"endpoint\":\"https:\\/\\/manager.bigbluemeeting.com\\/bigbluebutton\\/\",\"secret\":\"shared-secret-or-salt\"}'),
(75, 'iso_country_codes', '{\"AF\": \"Afghanistan\",\"AX\": \"Åland Islands\",\"AL\": \"Albania\",\"DZ\": \"Algeria\",\"AS\": \"American Samoa\",\"AD\": \"Andorra\",\"AO\": \"Angola\",\"AI\": \"Anguilla\",\"AQ\": \"Antarctica\",\"AG\": \"Antigua and Barbuda\",\"AR\": \"Argentina\",\"AM\": \"Armenia\",\"AW\": \"Aruba\",\"AU\": \"Australia\",\"AT\": \"Austria\",\"AZ\": \"Azerbaijan\",\"BS\": \"Bahamas\",\"BH\": \"Bahrain\",\"BD\": \"Bangladesh\",\"BB\": \"Barbados\",\"BY\": \"Belarus\",\"BE\": \"Belgium\",\"BZ\": \"Belize\",\"BJ\": \"Benin\",\"BM\": \"Bermuda\",\"BT\": \"Bhutan\",\"BO\": \"Bolivia (Plurinational State of)\",\"BQ\": \"Bonaire, Sint Eustatius and Saba\",\"BA\": \"Bosnia and Herzegovina\",\"BW\": \"Botswana\",\"BV\": \"Bouvet Island\",\"BR\": \"Brazil\",\"IO\": \"British Indian Ocean Territory\",\"BN\": \"Brunei Darussalam\",\"BG\": \"Bulgaria\",\"BF\": \"Burkina Faso\",\"BI\": \"Burundi\",\"CV\": \"Cabo Verde\",\"KH\": \"Cambodia\",\"CM\": \"Cameroon\",\"CA\": \"Canada\",\"KY\": \"Cayman Islands\",\"CF\": \"Central African Republic\",\"TD\": \"Chad\",\"CL\": \"Chile\",\"CN\": \"China\",\"CX\": \"Christmas Island\",\"CC\": \"Cocos (Keeling) Islands\",\"CO\": \"Colombia\",\"KM\": \"Comoros\",\"CG\": \"Congo\",\"CD\": \"Congo (Democratic Republic of the)\",\"CK\": \"Cook Islands\",\"CR\": \"Costa Rica\",\"CI\": \"Côte d\"Ivoire\",\"HR\": \"Croatia\",\"CU\": \"Cuba\",\"CW\": \"Curaçao\",\"CY\": \"Cyprus\",\"CZ\": \"Czech Republic\",\"DK\": \"Denmark\",\"DJ\": \"Djibouti\",\"DM\": \"Dominica\",\"DO\": \"Dominican Republic\",\"EC\": \"Ecuador\",\"EG\": \"Egypt\",\"SV\": \"El Salvador\",\"GQ\": \"Equatorial Guinea\",\"ER\": \"Eritrea\",\"EE\": \"Estonia\",\"ET\": \"Ethiopia\",\"FK\": \"Falkland Islands (Malvinas)\",\"FO\": \"Faroe Islands\",\"FJ\": \"Fiji\",\"FI\": \"Finland\",\"FR\": \"France\",\"GF\": \"French Guiana\",\"PF\": \"French Polynesia\",\"TF\": \"French Southern Territories\",\"GA\": \"Gabon\",\"GM\": \"Gambia\",\"GE\": \"Georgia\",\"DE\": \"Germany\",\"GH\": \"Ghana\",\"GI\": \"Gibraltar\",\"GR\": \"Greece\",\"GL\": \"Greenland\",\"GD\": \"Grenada\",\"GP\": \"Guadeloupe\",\"GU\": \"Guam\",\"GT\": \"Guatemala\",\"GG\": \"Guernsey\",\"GN\": \"Guinea\",\"GW\": \"Guinea-Bissau\",\"GY\": \"Guyana\",\"HT\": \"Haiti\",\"HM\": \"Heard Island and McDonald Islands\",\"VA\": \"Holy See\",\"HN\": \"Honduras\",\"HK\": \"Hong Kong\",\"HU\": \"Hungary\",\"IS\": \"Iceland\",\"IN\": \"India\",\"ID\": \"Indonesia\",\"IR\": \"Iran (Islamic Republic of)\",\"IQ\": \"Iraq\",\"IE\": \"Ireland\",\"IM\": \"Isle of Man\",\"IL\": \"Israel\",\"IT\": \"Italy\",\"JM\": \"Jamaica\",\"JP\": \"Japan\",\"JE\": \"Jersey\",\"JO\": \"Jordan\",\"KZ\": \"Kazakhstan\",\"KE\": \"Kenya\",\"KI\": \"Kiribati\",\"KP\": \"Korea (Democratic People\"s Republic of)\",\"KR\": \"Korea (Republic of)\",\"KW\": \"Kuwait\",\"KG\": \"Kyrgyzstan\",\"LA\": \"Lao People\"s Democratic Republic\",\"LV\": \"Latvia\",\"LB\": \"Lebanon\",\"LS\": \"Lesotho\",\"LR\": \"Liberia\",\"LY\": \"Libya\",\"LI\": \"Liechtenstein\",\"LT\": \"Lithuania\",\"LU\": \"Luxembourg\",\"MO\": \"Macao\",\"MK\": \"North Macedonia\",\"MG\": \"Madagascar\",\"MW\": \"Malawi\",\"MY\": \"Malaysia\",\"MV\": \"Maldives\",\"ML\": \"Mali\",\"MT\": \"Malta\",\"MH\": \"Marshall Islands\",\"MQ\": \"Martinique\",\"MR\": \"Mauritania\",\"MU\": \"Mauritius\",\"YT\": \"Mayotte\",\"MX\": \"Mexico\",\"FM\": \"Micronesia (Federated States of)\",\"MD\": \"Moldova (Republic of)\",\"MC\": \"Monaco\",\"MN\": \"Mongolia\",\"ME\": \"Montenegro\",\"MS\": \"Montserrat\",\"MA\": \"Morocco\",\"MZ\": \"Mozambique\",\"MM\": \"Myanmar\",\"NA\": \"Namibia\",\"NR\": \"Nauru\",\"NP\": \"Nepal\",\"NL\": \"Netherlands\",\"NC\": \"New Caledonia\",\"NZ\": \"New Zealand\",\"NI\": \"Nicaragua\",\"NE\": \"Niger\",\"NG\": \"Nigeria\",\"NU\": \"Niue\",\"NF\": \"Norfolk Island\",\"MP\": \"Northern Mariana Islands\",\"NO\": \"Norway\",\"OM\": \"Oman\",\"PK\": \"Pakistan\",\"PW\": \"Palau\",\"PS\": \"Palestine, State of\",\"PA\": \"Panama\",\"PG\": \"Papua New Guinea\",\"PY\": \"Paraguay\",\"PE\": \"Peru\",\"PH\": \"Philippines\",\"PN\": \"Pitcairn\",\"PL\": \"Poland\",\"PT\": \"Portugal\",\"PR\": \"Puerto Rico\",\"QA\": \"Qatar\",\"RE\": \"Réunion\",\"RO\": \"Romania\",\"RU\": \"Russian Federation\",\"RW\": \"Rwanda\",\"BL\": \"Saint Barthélemy\",\"SH\": \"Saint Helena, Ascension and Tristan da Cunha\",\"KN\": \"Saint Kitts and Nevis\",\"LC\": \"Saint Lucia\",\"MF\": \"Saint Martin (French part)\",\"PM\": \"Saint Pierre and Miquelon\",\"VC\": \"Saint Vincent and the Grenadines\",\"WS\": \"Samoa\",\"SM\": \"San Marino\",\"ST\": \"Sao Tome and Principe\",\"SA\": \"Saudi Arabia\",\"SN\": \"Senegal\",\"RS\": \"Serbia\",\"SC\": \"Seychelles\",\"SL\": \"Sierra Leone\",\"SG\": \"Singapore\",\"SX\": \"Sint Maarten (Dutch part)\",\"SK\": \"Slovakia\",\"SI\": \"Slovenia\",\"SB\": \"Solomon Islands\",\"SO\": \"Somalia\",\"ZA\": \"South Africa\",\"GS\": \"South Georgia and the South Sandwich Islands\",\"SS\": \"South Sudan\",\"ES\": \"Spain\",\"LK\": \"Sri Lanka\",\"SD\": \"Sudan\",\"SR\": \"Suriname\",\"SJ\": \"Svalbard and Jan Mayen\",\"SE\": \"Sweden\",\"CH\": \"Switzerland\",\"SY\": \"Syrian Arab Republic\",\"TW\": \"Taiwan, Province of China\",\"TJ\": \"Tajikistan\",\"TZ\": \"Tanzania, United Republic of\",\"TH\": \"Thailand\",\"TL\": \"Timor-Leste\",\"TG\": \"Togo\",\"TK\": \"Tokelau\",\"TO\": \"Tonga\",\"TT\": \"Trinidad and Tobago\",\"TN\": \"Tunisia\",\"TR\": \"Turkey\",\"TM\": \"Turkmenistan\",\"TC\": \"Turks and Caicos Islands\",\"TV\": \"Tuvalu\",\"UG\": \"Uganda\",\"UA\": \"Ukraine\",\"AE\": \"United Arab Emirates\",\"GB\": \"United Kingdom of Great Britain and Northern Ireland\",\"UM\": \"United States Minor Outlying Islands\",\"US\": \"United States of America\",\"UY\": \"Uruguay\",\"UZ\": \"Uzbekistan\",\"VU\": \"Vanuatu\",\"VE\": \"Venezuela (Bolivarian Republic of)\",\"VN\": \"Viet Nam\",\"VG\": \"Virgin Islands (British)\",\"VI\": \"Virgin Islands (U.S.)\",\"WF\": \"Wallis and Futuna\",\"EH\": \"Western Sahara\",\"YE\": \"Yemen\",\"ZM\": \"Zambia\",\"ZW\": \"Zimbabwe\"}'),
(76, 'public_signup', 'enable'),
(77, 'sitemap_xml', '[ \"login\", \"sign_up\", \"login/forgot_password_request\", \"blog\", \"home/courses\", \"home/contact_us\", \"home/about_us\", \"home/privacy_policy\", \"home/terms_and_condition\", \"home/faq\", \"home/refund_policy\" ]');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagable_id` int(11) DEFAULT NULL,
  `tagable_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skills` longtext COLLATE utf8_unicode_ci NOT NULL,
  `social_links` longtext COLLATE utf8_unicode_ci,
  `biography` longtext COLLATE utf8_unicode_ci,
  `role_id` int(11) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `wishlist` longtext COLLATE utf8_unicode_ci,
  `title` longtext COLLATE utf8_unicode_ci,
  `payment_keys` longtext COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` longtext COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `is_instructor` int(11) DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `temp` longtext COLLATE utf8_unicode_ci,
  `sessions` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `watched_duration`
--

DROP TABLE IF EXISTS `watched_duration`;
CREATE TABLE `watched_duration` (
  `watched_id` int(11) UNSIGNED NOT NULL,
  `watched_student_id` int(11) DEFAULT NULL,
  `watched_course_id` int(11) DEFAULT NULL,
  `watched_lesson_id` int(11) DEFAULT NULL,
  `current_duration` int(20) DEFAULT NULL,
  `watched_counter` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `watch_histories`
--

DROP TABLE IF EXISTS `watch_histories`;
CREATE TABLE `watch_histories` (
  `watch_history_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `completed_lesson` longtext COLLATE utf8_unicode_ci NOT NULL,
  `course_progress` int(11) NOT NULL,
  `watching_lesson_id` int(11) NOT NULL,
  `quiz_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `completed_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updated` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `is_pinned` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_courses`
--

DROP TABLE IF EXISTS `announcement_courses`;
CREATE TABLE `announcement_courses` (
  `id` int(10) NOT NULL,
  `announcement_id` bigint(20) DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_posts`
--

DROP TABLE IF EXISTS `community_posts`;
CREATE TABLE `community_posts` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_type` enum('image','video') DEFAULT NULL,
  `total_likes` int(11) NOT NULL DEFAULT 0,
  `total_comments` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_post_comments`
--

DROP TABLE IF EXISTS `community_post_comments`;
CREATE TABLE `community_post_comments` (
  `id` int(10) NOT NULL,
  `post_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_post_likes`
--

DROP TABLE IF EXISTS `community_post_likes`;
CREATE TABLE `community_post_likes` (
  `id` int(10) NOT NULL,
  `post_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_saved_posts`
--

DROP TABLE IF EXISTS `community_saved_posts`;
CREATE TABLE `community_saved_posts` (
  `id` int(10) NOT NULL,
  `post_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbb_meetings`
--
ALTER TABLE `bbb_meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`blog_category_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`blog_comment_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_page`
--
ALTER TABLE `custom_page`
  ADD PRIMARY KEY (`custom_page_id`);

--
-- Indexes for table `enrol`
--
ALTER TABLE `enrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_followings`
--
ALTER TABLE `instructor_followings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_histories`
--
ALTER TABLE `newsletter_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscriber`
--
ALTER TABLE `newsletter_subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_settings`
--
ALTER TABLE `notification_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout`
--
ALTER TABLE `payout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`quiz_result_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_files`
--
ALTER TABLE `resource_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_fields`
--
ALTER TABLE `seo_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watched_duration`
--
ALTER TABLE `watched_duration`
  ADD PRIMARY KEY (`watched_id`);

--
-- Indexes for table `watch_histories`
--
ALTER TABLE `watch_histories`
  ADD PRIMARY KEY (`watch_history_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_courses`
--
ALTER TABLE `announcement_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_posts`
--
ALTER TABLE `community_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_post_comments`
--
ALTER TABLE `community_post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_post_likes`
--
ALTER TABLE `community_post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_saved_posts`
--
ALTER TABLE `community_saved_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bbb_meetings`
--
ALTER TABLE `bbb_meetings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `blog_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `blog_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_page`
--
ALTER TABLE `custom_page`
  MODIFY `custom_page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrol`
--
ALTER TABLE `enrol`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `instructor_followings`
--
ALTER TABLE `instructor_followings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=637;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_histories`
--
ALTER TABLE `newsletter_histories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_subscriber`
--
ALTER TABLE `newsletter_subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_settings`
--
ALTER TABLE `notification_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payout`
--
ALTER TABLE `payout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `quiz_result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_files`
--
ALTER TABLE `resource_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_fields`
--
ALTER TABLE `seo_fields`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watched_duration`
--
ALTER TABLE `watched_duration`
  MODIFY `watched_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watch_histories`
--
ALTER TABLE `watch_histories`
  MODIFY `watch_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement_courses`
--
ALTER TABLE `announcement_courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_posts`
--
ALTER TABLE `community_posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_post_comments`
--
ALTER TABLE `community_post_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_post_likes`
--
ALTER TABLE `community_post_likes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_saved_posts`
--
ALTER TABLE `community_saved_posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
