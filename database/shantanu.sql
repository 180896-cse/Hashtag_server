-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2020 at 06:52 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shantanu`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `address` varchar(200) COLLATE utf8_bin NOT NULL,
  `pincode` varchar(200) COLLATE utf8_bin NOT NULL,
  `landmark` varchar(200) COLLATE utf8_bin NOT NULL,
  `mobile_number` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `addresses`
--
-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(50) NOT NULL,
  `product_id` bigint(50) NOT NULL,
  `quantity` bigint(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_CATEGORY` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(200) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `images`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('e608744d48291c22a59ee0a688944f4f39099cfbe10ea0015871ea3306581cb8f19d5754c788eab5', 1, '92582f4d-e2ae-4292-ad15-7ac9f5e4fdf9', 'users', '[]', 0, '2020-12-27 07:38:13', '2020-12-27 07:38:13', '2021-12-27 13:08:13'),
('4d4db0150c5a249c7fc25b99f0dd469401d902c95b681d2c4bfacd729ad4cf258fcee3885dc50bd9', 1, '92582f4d-e2ae-4292-ad15-7ac9f5e4fdf9', 'users', '[]', 0, '2020-12-27 07:39:59', '2020-12-27 07:39:59', '2021-12-27 13:09:59'),
('cf7b4e0b6b07bfce771efe4648c9581155c249a1a97c9f8746ae667988c53a5b102e109c6d199ab9', 1, '92582f4d-e2ae-4292-ad15-7ac9f5e4fdf9', 'sellers', '[]', 0, '2020-12-27 09:39:09', '2020-12-27 09:39:09', '2021-12-27 15:09:09'),
('9de641dad042752f30cbe66352a01750ab61a6f3acb99292cd66b8745ef03d523550a712a0a4f3b8', 1, '92582f4d-e2ae-4292-ad15-7ac9f5e4fdf9', 'sellers', '[]', 0, '2020-12-27 22:16:18', '2020-12-27 22:16:18', '2021-12-28 03:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('92582f4d-e2ae-4292-ad15-7ac9f5e4fdf9', NULL, 'Laravel Personal Access Client', 'riCUxDSxdai3cRUPV0ivI4IIuLqTPh9aLhHuWkZl', NULL, 'http://localhost', 1, 0, 0, '2020-12-27 07:38:04', '2020-12-27 07:38:04'),
('92582f4d-e928-402a-8466-520f79f2a1d6', NULL, 'Laravel Password Grant Client', 'gyuAOHkuz7sjdypY1Mcvxr0FtF862FEwdCz3GCWz', 'users', 'http://localhost', 0, 1, 0, '2020-12-27 07:38:04', '2020-12-27 07:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '92582f4d-e2ae-4292-ad15-7ac9f5e4fdf9', '2020-12-27 07:38:04', '2020-12-27 07:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` bigint(100) NOT NULL,
  `quantity` bigint(200) NOT NULL,
  `price` int(11) NOT NULL,
  `address_id` bigint(100) NOT NULL,
  `status` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

DROP TABLE IF EXISTS `personal_details`;
CREATE TABLE IF NOT EXISTS `personal_details` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `first_name` longtext COLLATE utf8_bin NOT NULL,
  `middle_name` longtext COLLATE utf8_bin NOT NULL,
  `last_name` longtext COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `mobile_number` varchar(200) COLLATE utf8_bin NOT NULL,
  `images_id` bigint(200) NOT NULL,
  `address_id` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_EMAIL` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `personal_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT ' ',
  `quantity` bigint(20) NOT NULL DEFAULT '0',
  `category_id` bigint(200) NOT NULL,
  `product_images_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_1` varchar(200) COLLATE utf8_bin NOT NULL,
  `image_2` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image_3` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image_4` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image_5` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image_6` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image_7` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image_8` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image_9` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image_10` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_images`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

DROP TABLE IF EXISTS `product_ratings`;
CREATE TABLE IF NOT EXISTS `product_ratings` (
  `id` bigint(200) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(200) NOT NULL,
  `product_id` bigint(200) NOT NULL,
  `rating` bigint(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `sellers_login`
--

DROP TABLE IF EXISTS `sellers_login`;
CREATE TABLE IF NOT EXISTS `sellers_login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `seller_details_id` bigint(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sellers_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `seller_details`
--

DROP TABLE IF EXISTS `seller_details`;
CREATE TABLE IF NOT EXISTS `seller_details` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_bin NOT NULL,
  `personal_details_id` bigint(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `seller_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

DROP TABLE IF EXISTS `users_login`;
CREATE TABLE IF NOT EXISTS `users_login` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `personal_details_id` bigint(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
