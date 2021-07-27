-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 09:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `avatar`, `phone_no`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rasel Rana', 'raselrana500@gmail.com', '$2y$10$bx/OLXZEac2/EPYwJyQxi.K9R.fTyIU/oN562HFOhW8lhdgeuvGK6', NULL, '01716530037', 'Super Admin', 'N6N0YBYjZe9qGDN5XWnGaKiv8Y7rWEWCEDYXE0s3IrrApMYgxvkEE7kz8I5J', '2021-05-29 19:07:01', '2021-06-03 11:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Samsung', 'Nothing', '1618846753.png', '2021-04-19 02:56:14', '2021-04-19 09:39:14'),
(3, 'Book', 'Desc', '1618846670.jpg', '2021-04-19 09:29:00', '2021-04-19 09:37:50'),
(4, 'Walton', 'Description', '1618846637.jpg', '2021-04-19 09:31:51', '2021-04-19 09:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(16, 20, NULL, 7, '::1', 1, '2021-06-23 00:37:59', '2021-06-23 00:38:19'),
(18, 20, NULL, 8, '::1', 1, '2021-06-23 03:04:06', '2021-06-23 03:04:25'),
(20, 17, NULL, 8, '::1', 1, '2021-06-23 03:04:08', '2021-06-23 03:04:25'),
(21, 13, NULL, 8, '::1', 1, '2021-06-23 03:04:10', '2021-06-23 03:04:25'),
(22, 11, NULL, 8, '::1', 1, '2021-06-23 03:04:11', '2021-06-23 03:04:26'),
(23, 10, NULL, 8, '::1', 1, '2021-06-23 03:04:12', '2021-06-23 03:04:26'),
(24, 9, NULL, 8, '::1', 1, '2021-06-23 03:04:14', '2021-06-23 03:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Book', 'All Book', '1618846778.jpg', NULL, '2021-01-04 11:34:55', '2021-04-19 09:39:38'),
(12, 'Vegetable', 'desc', '1615970920.png', 12, '2021-02-27 13:49:36', '2021-03-17 02:48:40'),
(13, 'Munzerin shahed', 'no desc', '1618846836.jpg', 2, '2021-04-18 22:30:33', '2021-04-19 09:40:36'),
(15, 'Electronics', 'Desc', '1618846504.jpg', NULL, '2021-04-19 09:35:05', '2021-04-19 09:35:05'),
(16, 'Mobile', 'Desc', '1618846608.jpg', 15, '2021-04-19 09:36:48', '2021-04-19 09:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Tangail', 1, '2021-02-15 13:36:49', '2021-02-15 13:36:49'),
(3, 'Bogura', 11, '2021-02-16 09:23:57', '2021-02-16 09:23:57'),
(4, 'Dhaka Division', 1, '2021-06-03 12:17:19', '2021-06-03 12:17:19'),
(5, 'Rajshahi Division', 11, '2021-06-03 12:18:28', '2021-06-03 12:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2021-02-15 11:53:15', '2021-02-15 12:19:09'),
(11, 'Rajshahi', 2, '2021-02-16 09:23:32', '2021-02-16 09:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2020_12_23_042826_create_products_table', 2),
(10, '2020_12_24_123557_create_categories_table', 2),
(11, '2020_12_24_123634_create_brands_table', 2),
(13, '2020_12_24_130327_create_productimages_table', 2),
(15, '2014_10_12_000000_create_users_table', 3),
(16, '2021_02_13_184840_create_divisions_table', 4),
(17, '2021_02_13_185004_create_districts_table', 4),
(23, '2021_05_24_103108_create_carts_table', 5),
(24, '2021_05_25_193655_create_settings_table', 6),
(25, '2021_05_25_202327_create_payments_table', 7),
(26, '2021_05_24_102833_create_orders_table', 8),
(27, '2020_12_24_123735_create_admins_table', 9),
(29, '2021_06_02_200746_create_sliders_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messege` text COLLATE utf8mb4_unicode_ci,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `shipping_charge` int(11) NOT NULL DEFAULT '60',
  `custom_discount` int(11) NOT NULL DEFAULT '0',
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `email`, `messege`, `is_paid`, `is_completed`, `shipping_charge`, `custom_discount`, `is_seen_by_admin`, `transaction_id`, `created_at`, `updated_at`) VALUES
(7, 17, 2, '::1', 'Rasel Rana', '01716530037', 'New  shipping address', 'raselrana500@gmail.com', NULL, 0, 0, 70, 100, 1, '67788', '2021-06-23 00:38:19', '2021-06-23 00:43:25'),
(8, 17, 1, '::1', 'Rasel Rana', '01716530037', 'New  shipping address', 'raselrana500@gmail.com', NULL, 0, 0, 60, 0, 1, NULL, '2021-06-23 03:04:25', '2021-06-23 03:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('raselrana500@gmail.com', '$2y$10$1dkh.XRkyXCWJllFDZkQKea.ScnScdJPfOP8Ax03i0yDTRXgd4a2O', '2021-06-04 23:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Agent|Personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `short_name`, `image`, `Transaction_id`, `priority`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash On Delivery', 'cash_in', 'cash.jpg', '123456', 1, '01716530037', 'personal', '2021-05-25 20:36:51', '2021-05-25 20:36:51'),
(2, 'Bkash', 'bkash', 'bkash.jpg', '1234567', 2, '01716530037', 'personal', '2021-05-25 20:36:51', '2021-05-25 20:36:51'),
(3, 'Rocket', 'rocket', 'bkash.jpg', '123459', 3, '01716530037', 'personal', '2021-05-25 20:36:51', '2021-05-25 20:36:51'),
(4, 'Nagad', 'nagad', 'nagad.jpg', '1234536', 4, '01716530037', 'personal', '2021-05-25 20:36:51', '2021-05-25 20:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1.png', NULL, NULL),
(2, 2, '2.png', NULL, NULL),
(3, 1, '3.jpg', NULL, NULL),
(4, 3, '4.png', NULL, NULL),
(5, 6, '1609090768.png', '2020-12-27 11:39:28', '2020-12-27 11:39:28'),
(6, 7, '1609091000.png', '2020-12-27 11:43:21', '2020-12-27 11:43:21'),
(7, 8, '1609091196.png', '2020-12-27 11:46:36', '2020-12-27 11:46:36'),
(8, 9, '1609091240.png', '2020-12-27 11:47:20', '2020-12-27 11:47:20'),
(9, 10, '1609091310.png', '2020-12-27 11:48:30', '2020-12-27 11:48:30'),
(10, 12, '1609092428.png', '2020-12-27 12:07:08', '2020-12-27 12:07:08'),
(11, 12, '1609092428.png', '2020-12-27 12:07:08', '2020-12-27 12:07:08'),
(12, 13, '1609094033.png', '2020-12-27 12:33:53', '2020-12-27 12:33:53'),
(13, 14, '1609095320.png', '2020-12-27 12:55:20', '2020-12-27 12:55:20'),
(14, 13, '1609514192.jpg', '2021-01-01 09:16:33', '2021-01-01 09:16:33'),
(15, 14, '1609514400.png', '2021-01-01 09:20:01', '2021-01-01 09:20:01'),
(16, 14, '1609514401.png', '2021-01-01 09:20:01', '2021-01-01 09:20:01'),
(17, 11, '1611682479.png', '2021-01-26 11:34:40', '2021-01-26 11:34:40'),
(18, 12, '1612539192.PNG', '2021-02-05 09:33:12', '2021-02-05 09:33:12'),
(19, 13, '1612539360.PNG', '2021-02-05 09:36:00', '2021-02-05 09:36:00'),
(20, 14, '1613497803.jpg', '2021-02-16 11:50:03', '2021-02-16 11:50:03'),
(21, 15, '1613497865.png', '2021-02-16 11:51:05', '2021-02-16 11:51:05'),
(22, 16, '1613498140.png', '2021-02-16 11:55:40', '2021-02-16 11:55:40'),
(23, 17, '1613500005.png', '2021-02-16 12:26:45', '2021-02-16 12:26:45'),
(24, 18, '1618823254.png', '2021-04-19 03:07:34', '2021-04-19 03:07:34'),
(27, 20, '1621659240.webp', '2021-05-21 22:54:01', '2021-05-21 22:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `offer_price`, `status`, `admin_id`, `created_at`, `updated_at`) VALUES
(9, 16, 2, 'zte axon 20', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'zte', 15, 45000, NULL, 0, 1, '2020-12-27 11:47:20', '2020-12-27 11:47:20'),
(10, 13, 2, 'Mi 10 Lite', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'mi-10-lite', 20, 35000, NULL, 0, 1, '2020-12-27 11:48:30', '2020-12-28 04:46:03'),
(11, 16, 2, 'this is second post', 'this is second post', 'this-is-second-post', 5, 5000, NULL, 0, 1, '2021-01-26 11:34:39', '2021-01-26 11:34:39'),
(13, 13, 2, 'galaxy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'galaxy', 10, 5000, NULL, 0, 1, '2021-02-05 09:36:00', '2021-02-05 09:37:40'),
(17, 16, 2, 'Recent Product', 'This is Description .This is DescriptionThis is DescriptionThis is DescriptionThis is DescriptionThis is DescriptionThis is DescriptionThis is DescriptionThis is Description', 'recent-product', 5, 6000, NULL, 0, 1, '2021-02-16 12:26:45', '2021-02-16 12:26:45'),
(20, 16, 2, 'New Post', 'This is Descriptoin', 'new-post', 5, 2000, NULL, 0, 1, '2021-05-21 22:54:00', '2021-05-21 23:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `shipping_cost`, `email`, `phone`, `address`, `footer_info`, `created_at`, `updated_at`) VALUES
(1, 100, 'test@laraecommerce.com', '01716530037', 'Dhaka,Bangladesh', 'This is footer info', '2021-05-25 19:42:12', '2021-05-25 19:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(8, 'This is slider One', '1624353715.jpg', 'Shop Now', 'https://www.youtube.com/', 2, '2021-06-22 03:21:56', '2021-06-22 03:24:21'),
(9, 'This is slider Two', '1624353822.jpg', 'Shop Now', 'https://www.youtube.com/', 1, '2021-06-22 03:23:42', '2021-06-22 03:24:15'),
(10, 'This is slider Three', '1624353893.png', 'Shop Now', 'https://www.youtube.com/', 3, '2021-06-22 03:24:54', '2021-06-22 03:24:54'),
(11, 'This is slider Four', '1624353913.jpg', 'Shop Now', 'https://www.youtube.com/', 4, '2021-06-22 03:25:13', '2021-06-22 03:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division Table id',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District Table id',
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=inactive|1=active|2=ban',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avatar`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'Rasel', 'Rana', 'raselrana', '01716530037', 'raselrana500@gmail.com', '$2y$10$hNDQIiAZABttihTaiHj7L.YVvI44aiiYFFhc8DSONHcQGSqeYQtrS', 'Rowail,Shatihati,Kalihati,Tangail', 1, 1, 1, '::1', NULL, 'New  shipping address', 'rGgBsCvn1JwbA2EXAbq1R9kLqCh9lPl8MXhXikBGiwPkDF9lnW53oxmRD0qC', '2021-04-21 00:24:48', '2021-05-23 09:38:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
