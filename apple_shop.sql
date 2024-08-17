-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 12:47 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10
create database apple_shop;
use apple_shop;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apple_shop`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2023_02_24_160438_create_tbl_admin_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2023_02_24_185544_create_tbl_category_product', 2),
(7, '2023_03_04_214912_create_tbl_brand_product', 3),
(8, '2023_03_05_173919_create_tbl_product', 4),
(9, '2023_03_10_161744_tbl_customer', 5),
(10, '2023_03_10_165303_tbl_shipping', 6),
(11, '2023_03_13_195944_tbl_payment', 7),
(12, '2023_03_13_200141_tbl_order', 7),
(13, '2023_03_13_200159_tbl_order_details', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(4, 'khacluat123@hotmail.com', '123', 'Luat', '0976683106', '2024-08-16 09:57:52', '2024-08-16 09:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `category_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(10, 1, 'Dior', 'Dior', 1, '2024-08-14 04:01:45', NULL),
(11, 1, 'Chanel', 'Chanel', 1, '2024-08-14 04:02:59', NULL),
(12, 1, 'Hermes', 'Hermes', 1, '2023-03-06 18:10:52', NULL),
(13, 1, 'Cartier', 'Cartier', 1, '2023-03-06 18:11:07', NULL),
(20, 2, 'Graff', 'Graff', 1, '2024-08-07 18:41:29', NULL),
(21, 2, 'H. Stern', 'H. Stern', 1, '2024-08-07 18:41:29', NULL),
(30, 3, 'Swarovski', 'Swarovski', 1, '2024-08-07 17:57:47', NULL),
(31, 3, 'Pandora', 'Pandora', 1, '2024-08-07 17:57:47', NULL),
(40, 4, 'Sokolov', 'Sokolov', 1, '2024-08-07 17:39:56', '0000-00-00 00:00:00'),
(41, 4, 'Chopard', 'Chopard', 1, '2024-08-07 17:42:07', NULL),
(42, 4, 'Saga', 'Saga', 1, '2024-08-07 17:42:07', NULL),
(48, 18, 'xxx', 'xxx', 1, '2024-08-16 08:37:44', NULL),
(49, 19, '999', '999', 1, '2024-08-16 09:17:09', NULL),
(50, 21, 'luat', 'luat', 1, '2024-08-16 09:31:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'day chuyen', 'day chuyen', 1, '2024-08-14 04:04:29', '2024-08-14 04:04:29'),
(2, 'bong tai', 'bong tai', 1, '2023-02-24 19:20:24', NULL),
(3, 'vong deo tay', 'vong deo tay', 1, '2023-02-24 19:20:32', NULL),
(4, 'nhan', 'nhan', 1, '2023-02-24 19:20:42', NULL),
(18, 'xxx', 'xxx', 1, '2024-08-16 08:37:32', '2024-08-16 08:37:32'),
(19, 'dc999', 'dc999', 1, '2024-08-16 09:16:38', '2024-08-16 09:16:38'),
(21, 'luat', 'luat', 1, '2024-08-16 09:29:25', '2024-08-16 09:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_type` int(11) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(70, 4, 77, 73, '15,832,000', '3', '2023-04-06 19:31:47', NULL),
(71, 4, 78, 74, '15,832,000', '3', '2023-04-06 19:36:30', NULL),
(72, 4, 79, 75, '1,699,000', '3', '2023-04-06 19:45:12', NULL),
(73, 4, 80, 76, '4,952,000', '4', '2023-04-06 19:59:31', NULL),
(74, 4, 81, 77, '11,271,200', '3', '2023-04-07 14:23:25', NULL),
(75, 4, 82, 78, '9,912,000', '4', '2023-04-07 19:13:59', NULL),
(79, 4, 86, 82, '9,912,000', '2', '2023-04-07 19:16:20', NULL),
(80, 4, 87, 83, '22,490,000', '2', '2023-04-07 19:18:56', NULL),
(81, 4, 88, 84, '40,304,000', '3', '2023-04-08 04:24:30', NULL),
(82, 4, 89, 85, '20,392,000', '4', '2023-04-08 05:42:28', NULL),
(83, 7, 90, 86, '115,680,000', '1', '2023-04-24 04:13:04', NULL),
(84, 7, 91, 87, '120,910,000', '1', '2023-04-24 05:09:35', NULL),
(85, 7, 92, 88, '76,830,000', '1', '2023-04-24 05:53:37', NULL),
(86, 8, 93, 89, '27,890,000', '1', '2024-08-09 07:34:50', NULL),
(87, 8, 94, 90, '27,890,000', '1', '2024-08-09 07:35:50', NULL),
(88, 8, 95, 91, '27,890,000', '1', '2024-08-09 07:36:39', NULL),
(89, 8, 96, 92, '27,890,000', '1', '2024-08-09 07:42:31', NULL),
(90, 8, 97, 93, '27,890,000', '1', '2024-08-09 07:46:08', NULL),
(91, 8, 98, 94, '29,950,000', '1', '2024-08-09 09:33:22', NULL),
(92, 9, 99, 95, '135,599,000', '1', '2024-08-09 09:47:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_details_quantity` int(11) DEFAULT 1,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `order_details_quantity`, `product_name`, `product_price`, `product_color`, `product_weight`, `created_at`, `updated_at`) VALUES
(67, 70, 8, 1, 'iPhone 14 128GB', '19790000', 'Red', '128GB', '2023-04-06 19:31:47', NULL),
(68, 71, 8, 1, 'iPhone 14 128GB', '19790000', 'Red', '128GB', '2023-04-06 19:36:30', NULL),
(69, 72, 18, 1, 'Mac mini M1 8GB RAM', '1699000', 'White', '256GB', '2023-04-06 19:45:12', NULL),
(70, 73, 22, 1, 'Apple Watch SE Nhôm 2022 GPS', '6190000', 'Starlight', '40mm', '2023-04-06 19:59:31', NULL),
(71, 74, 18, 1, 'Mac mini M1 8GB RAM', '1699000', 'White', '256GB', '2023-04-07 14:23:25', NULL),
(72, 74, 14, 1, 'iPad mini 6', '12390000', 'Space Gray', '64GB', '2023-04-07 14:23:25', NULL),
(73, 75, 14, 1, 'iPad mini 6', '12390000', 'Space Gray', '64GB', '2023-04-07 19:13:59', NULL),
(74, 76, 14, 1, 'iPad mini 6', '12390000', 'Space Gray', '64GB', '2023-04-07 19:15:23', NULL),
(75, 77, 14, 1, 'iPad mini 6', '12390000', 'Space Gray', '64GB', '2023-04-07 19:15:34', NULL),
(76, 78, 14, 1, 'iPad mini 6', '12390000', 'Space Gray', '64GB', '2023-04-07 19:15:51', NULL),
(77, 79, 14, 1, 'iPad mini 6', '12390000', 'Space Gray', '64GB', '2023-04-07 19:16:20', NULL),
(78, 80, 9, 1, 'Iphone 14 Plus 128GB', '22490000', 'Purple', '128GB', '2023-04-07 19:18:56', NULL),
(79, 81, 6, 1, 'iPhone 14 Pro Max 128GB', '27890000', 'Gold', '128GB', '2023-04-08 04:24:30', NULL),
(80, 81, 9, 1, 'Iphone 14 Plus 128GB', '22490000', 'Purple', '128GB', '2023-04-08 04:24:30', NULL),
(81, 82, 7, 1, 'iPhone 14 Pro 128GB', '25490000', 'Deep Purple', '128GB', '2023-04-08 05:42:28', NULL),
(82, 83, 12, 2, 'iPad Pro M1 12.9 inch WiFi 512GB', '29950000', 'Space Gray', '512GB', '2023-04-24 04:13:04', NULL),
(83, 83, 6, 2, 'iPhone 14 Pro Max 128GB', '27890000', 'Gold', '128GB', '2023-04-24 04:13:04', NULL),
(84, 84, 6, 1, 'iPhone 14 Pro Max 128GB', '27890000', 'Gold', '128GB', '2023-04-24 05:09:35', NULL),
(85, 84, 15, 1, 'MacBook Pro M1 2020', '28550000', 'Space Gray', '256GB', '2023-04-24 05:09:35', NULL),
(86, 84, 20, 2, 'Apple Watch Series 8 Thép GPS + Cellular', '17990000', 'Silver', '41mm', '2023-04-24 05:09:35', NULL),
(87, 84, 10, 1, 'iPad Pro M2 12.9 inch WiFi 128GB', '28490000', 'Silver', '128GB', '2023-04-24 05:09:35', NULL),
(88, 85, 6, 1, 'iPhone 14 Pro Max 128GB', '27890000', 'Gold', '128GB', '2023-04-24 05:53:37', NULL),
(89, 85, 19, 1, 'Apple Watch Ultra LTE 49mm Alpine Loop size S', '20390000', 'Orange', '49mm', '2023-04-24 05:53:37', NULL),
(90, 85, 15, 1, 'MacBook Pro M1 2020', '28550000', 'Space Gray', '256GB', '2023-04-24 05:53:37', NULL),
(91, 90, 6, 1, 'day chuyen vang 1', '27890000', 'Gold', '1g', '2024-08-09 07:46:08', NULL),
(92, 91, 11, 1, 'Bong tai 1', '29950000', 'Gold', '1g', '2024-08-09 09:33:22', NULL),
(93, 92, 8, 1, 'day chuyen bac 3', '19790000', 'Silver', '0.5g', '2024-08-09 09:47:33', NULL),
(94, 92, 7, 1, 'day chuyen vang 2', '25490000', 'Gold', '0.5g', '2024-08-09 09:47:33', NULL),
(95, 92, 11, 1, 'Bong tai 1', '29950000', 'Gold', '1g', '2024-08-09 09:47:33', NULL),
(96, 92, 12, 1, 'Bong tai 2', '14490000', 'Gold', '1g', '2024-08-09 09:47:33', NULL),
(97, 92, 16, 1, 'vong deo tay 1', '27990000', 'Gold', '1g', '2024-08-09 09:47:33', NULL),
(98, 92, 17, 1, 'vong deo tay 2', '1699000', 'Pink', '1.5g', '2024-08-09 09:47:33', NULL),
(99, 92, 21, 1, 'nhan vang 01', '6190000', 'Gold', '1g', '2024-08-09 09:47:33', NULL),
(100, 92, 22, 1, 'nhan vang 2', '10000000', 'Gold', '1g', '2024-08-09 09:47:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(73, '1', 'Pending', '2023-04-06 19:31:47', NULL),
(74, '1', 'Pending', '2023-04-06 19:36:30', NULL),
(75, '2', 'Pending', '2023-04-06 19:45:12', NULL),
(76, '2', 'Pending', '2023-04-06 19:59:31', NULL),
(77, '2', 'Pending', '2023-04-07 14:23:25', NULL),
(78, '2', 'Pending', '2023-04-07 19:13:59', NULL),
(79, '2', 'Pending', '2023-04-07 19:15:23', NULL),
(80, '2', 'Pending', '2023-04-07 19:15:34', NULL),
(81, '2', 'Pending', '2023-04-07 19:15:51', NULL),
(82, '2', 'Pending', '2023-04-07 19:16:20', NULL),
(83, '2', 'Pending', '2023-04-07 19:18:56', NULL),
(84, '2', 'Pending', '2023-04-08 04:24:30', NULL),
(85, '2', 'Pending', '2023-04-08 05:42:28', NULL),
(86, '1', 'Pending', '2023-04-24 04:13:04', NULL),
(87, '1', 'Pending', '2023-04-24 05:09:35', NULL),
(88, '1', 'Pending', '2023-04-24 05:53:37', NULL),
(89, '1', 'Pending', '2024-08-09 07:34:50', NULL),
(90, '1', 'Pending', '2024-08-09 07:35:50', NULL),
(91, '1', 'Pending', '2024-08-09 07:36:39', NULL),
(92, '1', 'Pending', '2024-08-09 07:42:31', NULL),
(93, '1', 'Pending', '2024-08-09 07:46:08', NULL),
(94, '1', 'Pending', '2024-08-09 09:33:22', NULL),
(95, '1', 'Pending', '2024-08-09 09:47:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_img`, `product_weight`, `product_color`, `product_status`, `created_at`, `updated_at`) VALUES
(6, 'day chuyen vang 1', 1, 10, 'day chuyen vang 1 sieu dep', 'day chuyen vang 1 sieu dep', '27890000', 'dc01.jpg', '1g', 'Gold', 1, '2023-03-06 17:58:16', NULL),
(7, 'day chuyen vang 2', 1, 12, 'day chuyen vang 2', 'day chuyen vang 2', '25490000', 'dc04.jpg', '0.5g', 'Gold', 1, '2023-03-06 17:59:30', NULL),
(8, 'day chuyen bac 3', 1, 13, 'day chuyen bac 3', 'day chuyen bac 3', '19790000', 'dc02.jpg', '0.5g', 'Silver', 1, '2023-03-06 18:00:30', NULL),
(9, 'day chuyen bac 4', 1, 10, 'day chuyen bac 4', 'day chuyen bac 4', '22490000', 'dc03.jpg', '0.5g', 'Silver', 1, '2023-03-08 06:27:06', NULL),
(10, 'day chuyen kim cuong 5', 1, 11, 'day chuyen kim cuong 5', 'day chuyen kim cuong 5', '28490000', 'dc05.jpg', '1kg', 'Silver', 1, '2023-03-09 17:11:04', NULL),
(11, 'Bong tai 1', 2, 20, 'Bong tai 1', 'Bong tai 1', '29950000', 'bt01.jpg', '1g', 'Gold', 1, '2023-03-09 17:18:01', NULL),
(12, 'Bong tai 2', 2, 21, 'Bong tai 2', 'Bong tai 2', '14490000', 'bt02.jpg', '1g', 'Gold', 1, '2023-03-09 17:19:10', NULL),
(13, 'Bong tai 3', 2, 20, 'Bong tai 3', 'Bong tai 3', '12390000', 'bt03.jpg', '1g', 'Silver', 1, '2023-03-09 17:20:03', NULL),
(14, 'Bong tai 4', 2, 21, 'Bong tai 4', 'Bong tai 4', '28550000', 'bt04.jpg', '1g', 'Silver', 1, '2023-03-09 17:20:47', NULL),
(15, 'Bong tai 05', 2, 21, 'Bong tai 05', 'Bong tai 05', '19790000', 'bt05.jpg', '0.5g', 'Silver', 1, '2023-03-09 17:23:41', NULL),
(16, 'vong deo tay 1', 3, 30, 'vong deo tay 1', 'vong deo tay 1', '27990000', 'vdt01.jpg', '1g', 'Gold', 1, '2023-03-09 17:26:03', NULL),
(17, 'vong deo tay 2', 3, 31, 'vong deo tay 2', 'vong deo tay 2', '1699000', 'vdt02.jpg', '1.5g', 'Pink', 1, '2023-03-09 17:27:30', NULL),
(18, 'vong deo tay 3', 3, 30, 'vong deo tay 3', 'vong deo tay 3', '20390000', 'vdt03.jpg', '0.5g', 'Silver', 1, '2023-03-09 17:29:04', NULL),
(19, 'vong deo tay 4', 3, 31, 'vong deo tay 4', 'vong deo tay 4', '17990000', 'vdt04.jpg', '1g', 'Silver', 1, '2023-03-09 17:30:20', NULL),
(20, 'vong deo tay 5', 3, 30, 'vong deo tay 5', 'vong deo tay 5', '10990000', 'vdt05.jpg', '0.5g', 'Silver', 1, '2023-03-09 17:31:14', NULL),
(21, 'nhan vang 01', 4, 40, 'nhan vang 01', 'nhan vang 01', '6190000', 'nh01.jpg', '1g', 'Gold', 1, '2023-03-09 17:32:04', NULL),
(22, 'nhan vang 2', 4, 42, 'nhan vang 2', 'nhan vang 2', '10000000', 'nh02.jpg', '1g', 'Gold', 1, '2024-08-07 19:47:20', NULL),
(23, 'nhan bac 3', 4, 41, 'nhan bac 3', 'nhan bac 3', '30000000', 'nh03.jpg', '0.5g', 'Silver', 1, '2024-08-07 19:47:20', NULL),
(24, 'nhan bac 4', 4, 42, 'nhan bac 4', 'nhan bac 4', '20000000', 'nh04.jpg', '1.5g', 'Silver', 1, '2024-08-07 19:53:50', NULL),
(25, 'nhan vang 5', 4, 42, 'nhan vang 5', 'nhan vang 5', '21000000', 'nh05.jpg', '2g', 'Gold', 1, '2024-08-07 19:53:50', NULL),
(33, 'xx', 4, 42, 'x', 'x', '5700000', 'nh0463.jpg', '1g', 'White', 1, '2024-08-15 19:25:48', NULL),
(34, 'dc6/8', 21, 50, 'luat', 'luat', '5700000', 'dc0323.jpg', '1g', 'White', 1, '2024-08-16 09:44:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_phone`, `shipping_note`, `created_at`, `updated_at`) VALUES
(90, 'Nguyễn Đình Vũ', 'nguyendinhvutkt@gmail.com', '29/4', '0365741845', '123', '2023-04-24 04:13:04', NULL),
(93, 'Đỗ Khắc Luật', 'luatdkgcs210262@fpt.edu.vn', '117/173 Nguyễn Hữu Cảnh', '0976683106', 'Luat Chot Mat', '2024-08-09 07:34:50', NULL),
(94, 'Đỗ Khắc Luật', 'luatdkgcs210262@fpt.edu.vn', '117/173 Nguyễn Hữu Cảnh', '0976683106', 'Luat Chot Mat', '2024-08-09 07:35:50', NULL),
(95, 'Đỗ Khắc Luật', 'luatdkgcs210262@fpt.edu.vn', '117/173 Nguyễn Hữu Cảnh', '0976683106', 'Luat Chot Mat', '2024-08-09 07:36:38', NULL),
(96, 'Đỗ Khắc Luật', 'luatdkgcs210262@fpt.edu.vn', '117/173 Nguyễn Hữu Cảnh', '0976683106', NULL, '2024-08-09 07:42:31', NULL),
(97, 'Đỗ Khắc Luật', 'luatdkgcs210262@fpt.edu.vn', '117/173 Nguyễn Hữu Cảnh', '0976683106', NULL, '2024-08-09 07:46:08', NULL),
(98, 'Đỗ Khắc Luật', 'luatdkgcs210262@fpt.edu.vn', '117/173 Nguyễn Hữu Cảnh', '0976683106', NULL, '2024-08-09 09:33:22', NULL),
(99, 'luat4', 'khacluat123@hotmail.com', '117/173 Nguyễn Hữu Cảnh', '123456', 'luat giau nhat the gioi', '2024-08-09 09:47:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Khac Luat', 'doluat1@gmail.com', '12345', 'nh canh', NULL, '1234', NULL, '2024-08-08 16:42:02', '2024-08-08 16:42:02'),
(7, 'Nguyễn Đình Vũ', 'nguyendinhvutkt@gmail.com', NULL, NULL, NULL, '123', NULL, '2023-04-23 20:41:58', '2023-04-23 20:41:58'),
(8, 'Đỗ Khắc Luật', 'luatdkgcs210262@fpt.edu.vn', '0976683106', '117/173 Nguyễn Hữu Cảnh', NULL, '$2y$10$7yuoZhEQC3VcXrG6bglRseNKsNhZlMK5Db7Ea.VEoQpZ7i1ssQCc6', NULL, '2024-08-09 00:33:34', '2024-08-09 00:34:08'),
(9, 'luat4', 'khacluat123@hotmail.com', '123456', '117/173 Nguyễn Hữu Cảnh', NULL, '$2y$10$9v77zDlK7ofSQ/Uqqs4jluev2P7IVwKNuT7qlF54lEnziiqv5dUru', NULL, '2024-08-09 02:45:25', '2024-08-09 02:46:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `tbl_brand` (`category_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `tbl_order_details` (`product_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `tbl_product` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD CONSTRAINT `tbl_brand` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`);

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`),
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
