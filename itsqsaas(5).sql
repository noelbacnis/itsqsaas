-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2015 at 12:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itsqsaas`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
`id` int(10) unsigned NOT NULL,
  `client_id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `client_id`, `filename`, `status`, `created_at`, `updated_at`, `email`) VALUES
(4, 3, 'burger.jpg', 1, '2015-06-02 00:33:30', '2015-06-02 00:33:33', 'free@yahoo.com'),
(5, 3, 'chicken.jpg', 1, '2015-06-02 00:33:30', '2015-06-02 00:33:33', 'free@yahoo.com'),
(6, 4, 'chicken.jpg', 1, '2015-06-02 00:48:49', '2015-06-02 00:48:56', 'star@yahoo.com'),
(7, 4, 'fries.jpg', 1, '2015-06-02 00:48:49', '2015-06-02 00:48:56', 'star@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `client_id`) VALUES
(1, 'Lunch', '2015-06-02 00:34:42', '2015-06-02 00:34:42', 3),
(2, 'Dinner', '2015-06-02 00:34:48', '2015-06-02 00:34:48', 3),
(3, 'Brunch', '2015-06-02 00:54:50', '2015-06-02 00:54:50', 4);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subscription_id` int(11) NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `description`, `tagline`, `image`, `primary_color`, `contact_number`, `address`, `status`, `created_at`, `updated_at`, `subscription_id`, `domain`, `email`) VALUES
(3, 'Free', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit cum eaque magnam distinctio consequuntur expedita magni odio eligendi, totam ad debitis ducimus saepe enim numquam voluptates incidunt voluptas, tempora? Molestias, quo minima! Temporibus esse eum, modi voluptates illum laudantium harum quidem assumenda suscipit eius sequi laboriosam dolores dolor minus voluptatibus velit non sapiente delectus. Quod debitis, aliquid dolor delectus nisi assumenda a ad. Voluptatem, temporibus quia similique eveniet provident, cupiditate modi vitae minima esse earum, at accusantium alias nulla numquam qui architecto ut veniam, adipisci dolor libero repellendus itaque obcaecati sunt cum quibusdam! Impedit placeat iusto molestias enim, libero dolor.', 'Create. Innovate. Repeat', 'logo2.png', '4f0d0d', '34234', 'Manila', 'ACTIVE', '2015-06-02 00:33:30', '2015-06-02 00:33:30', 0, 'free', 'free@yahoo.com'),
(4, 'Star', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit cum eaque magnam distinctio consequuntur expedita magni odio eligendi, totam ad debitis ducimus saepe enim numquam voluptates incidunt voluptas, tempora? Molestias, quo minima! Temporibus esse eum, modi voluptates illum laudantium harum quidem assumenda suscipit eius sequi laboriosam dolores dolor minus voluptatibus velit non sapiente delectus. Quod debitis, aliquid dolor delectus nisi assumenda a ad. Voluptatem, temporibus quia similique eveniet provident, cupiditate modi vitae minima esse earum, at accusantium alias nulla numquam qui architecto ut veniam, adipisci dolor libero repellendus itaque obcaecati sunt cum quibusdam! Impedit placeat iusto molestias enim, libero dolor.', 'Create star', 'logo10.png', '751717', '34535', 'Manila', 'ACTIVE', '2015-06-02 00:48:49', '2015-06-02 00:48:49', 0, 'star', 'star@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(10) unsigned NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_address_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_address_baranggay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_address_municipal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_address_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_05_14_152250_create_clients_table', 1),
('2015_05_18_070257_create_products_table', 1),
('2015_05_18_072707_create_categories_table', 1),
('2015_05_18_072904_create_customers_table', 1),
('2015_05_18_073350_create_orders_table', 1),
('2015_05_18_074218_create_product_orders_table', 1),
('2015_05_18_085739_create_subscriptions_table', 2),
('2015_05_18_090011_add_subscription_id_to_clients_table', 3),
('2015_05_21_043822_add_domain_to_clients_table', 4),
('2015_05_21_100556_create_accounts_table', 5),
('2015_05_21_105830_create_users_table', 6),
('2015_05_21_111300_create_orders_products_table', 7),
('2015_05_21_114111_add_usertype_to_users_table', 8),
('2015_05_21_153544_drop_columns_to_customers_table', 9),
('2015_05_21_154521_drop_accounts_table', 10),
('2015_05_22_033916_add_column_to_products_table', 11),
('2015_05_22_034839_create_banners_table', 11),
('2015_05_22_045256_drop_categories_to_products_table', 12),
('2015_05_24_112241_add_clientid_to_products_table', 13),
('2015_05_25_105416_add_clientid_to_orders_table', 14),
('2015_05_25_105706_add_clientid_to_categories_table', 15),
('2015_05_25_110642_add_registered_to_orders_table', 16),
('2015_05_25_120114_add_clientid_to_customers_table', 17),
('2015_05_25_094326_add_email_to_clients_table', 18),
('2015_05_25_124153_create_subscriptions_table', 18),
('2015_05_27_123711_add_guesthash_to_orders_table', 18),
('2015_05_26_230303_add_subscription_type_id_to_subscriptions_table', 19),
('2015_05_27_004101_create_subscriptions_table', 20),
('2015_05_28_014124_add_names_to_orders_table', 21),
('2015_05_28_014509_add_email_to_orders_table', 22),
('2015_05_31_223149_add_email_to_banners_table', 23),
('2015_06_01_063415_add_status_to_subscriptions_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(10) unsigned NOT NULL,
  `total` double NOT NULL,
  `cash` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `del_contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_address_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_address_baranggay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_address_municipal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_address_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(11) NOT NULL,
  `registered` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guest_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `cash`, `customer_id`, `del_contact_number`, `del_address_number`, `del_address_baranggay`, `del_address_municipal`, `del_address_province`, `del_message`, `status`, `created_at`, `updated_at`, `client_id`, `registered`, `guest_hash`, `first_name`, `last_name`, `email`) VALUES
(1, 250, 500, 0, '98988', '234', 'Lambakin', 'Marilao', 'Bulacan', 'adasd', 'APPROVED', '2015-06-02 00:37:52', '2015-06-02 00:39:03', 3, '', '$2y$10$WttpOt1eyyQHWges.gj9DeYe6ZOxbny4yQqnBoqnVaUd6PEb9ifki', 'dk', 'reyes', 'd@yahoo.com'),
(2, 2340, 1000, 0, '2323234', '345', 'Lambakin', 'Marilao', 'Bulacan', 'faster!!!', 'APPROVED', '2015-06-02 00:56:44', '2015-06-02 00:58:04', 4, '', '$2y$10$EF4P.d00RTc4vjoSdoLHZ.JUqjNsfQCgBjy8z65IBygEJqpxpo1Dq', 'Nicole', 'Pads', 'nic@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
`id` int(10) unsigned NOT NULL,
  `quantity` double NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `quantity`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 3, '2015-06-02 00:37:52', '2015-06-02 00:37:52'),
(2, 10, 2, 5, '2015-06-02 00:56:44', '2015-06-02 00:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `status`, `created_at`, `updated_at`, `category_id`, `client_id`) VALUES
(1, 'Burger', 'burger', 456, 'burger.jpg', 'ACTIVE', '2015-06-02 00:17:03', '2015-06-02 00:17:03', '', 1),
(2, 'asdas', 'asdas', 23234, 'chicken.jpg', 'ACTIVE', '2015-06-02 00:27:45', '2015-06-02 00:27:45', '', 2),
(3, 'Burger', 'burger', 50, 'burger.jpg', 'ACTIVE', '2015-06-02 00:33:30', '2015-06-02 00:35:56', '2', 3),
(4, 'Chicken', 'chicken', 345, 'chicken.jpg', 'ACTIVE', '2015-06-02 00:35:22', '2015-06-02 00:35:22', '2', 3),
(5, 'Fries', 'french fries', 234, 'fries.jpg', 'ACTIVE', '2015-06-02 00:48:49', '2015-06-02 00:55:03', '3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE IF NOT EXISTS `product_orders` (
`id` int(10) unsigned NOT NULL,
  `quantity` double NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
`id` int(10) unsigned NOT NULL,
  `client_id` int(11) NOT NULL,
  `subscription_type_id` int(11) NOT NULL,
  `transaction_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` int(11) NOT NULL,
  `start_period` datetime NOT NULL,
  `end_period` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `client_id`, `subscription_type_id`, `transaction_number`, `total_amount`, `start_period`, `end_period`, `created_at`, `updated_at`, `status`) VALUES
(6, 3, 1, '0', 0, '2015-06-02 08:33:33', '2015-06-02 08:34:07', '2015-06-02 00:33:33', '2015-06-02 00:34:13', 'INACTIVE'),
(7, 3, 2, '564645', 0, '2015-06-02 08:34:07', '1970-01-01 08:00:00', '2015-06-02 00:33:58', '2015-06-02 00:37:32', 'INACTIVE'),
(8, 3, 3, '', 180, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-06-02 00:36:36', '2015-06-02 00:37:29', 'ACTIVE'),
(9, 4, 1, '0', 0, '2015-06-02 08:48:56', '2015-06-02 08:53:46', '2015-06-02 00:48:56', '2015-06-02 00:53:57', 'INACTIVE'),
(11, 4, 2, '5645645', 0, '2015-06-02 08:53:46', '1970-01-01 08:00:00', '2015-06-02 00:53:30', '2015-06-02 00:56:20', 'INACTIVE'),
(12, 4, 3, '', 180, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-06-02 00:55:50', '2015-06-02 00:56:19', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions_types`
--

CREATE TABLE IF NOT EXISTS `subscriptions_types` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions_types`
--

INSERT INTO `subscriptions_types` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Free', 0, '2015-05-28 02:28:11', '0000-00-00 00:00:00'),
(2, 'Paid', 19.99, '2015-05-28 02:28:11', '0000-00-00 00:00:00'),
(3, 'Premium', 59.99, '2015-05-28 02:28:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `foreign_id`, `created_at`, `updated_at`, `user_type`) VALUES
(5, 'admin', '$2y$10$RJE4OF7bSMIu.E2kVbsj7.LqQ1Ta.bZ8TWoEZ2kcgbfabIXjsZsX6', 'aWpfqm4YFVHZRfon1ouBuc3YfgKZqKdqcxBvAnAgVKextHCy0I0tB550iFjQ', 0, '0000-00-00 00:00:00', '2015-06-02 00:05:47', 'admin'),
(56, 'free@yahoo.com', '$2y$10$L2bahSN1TywFzitLv32RYemn43PXaS3jtvHIfz9228MexQU9dVGhW', 'crlMYPgAeqYcMWVDAymcgBJagh0Cp8TbG3YcIbEsu994ZFQqRFzJWGq4zHyH', 3, '2015-06-02 00:33:58', '2015-06-02 00:51:36', 'client'),
(57, 'star@yahoo.com', '$2y$10$zyS794/NRM7qSrVttQmkrOehmS4vnYnVPVjuz6Ze6kubTtzivNVPC', 'hq4gMF8UGdhwrHF3NDN9s7Ma5XP4RKK8NrsACyLPX6MtKHgjWiKRBDEf0gMH', 4, '2015-06-02 00:49:47', '2015-06-02 00:57:42', 'client'),
(58, 'star@yahoo.com', '$2y$10$ElZBlH8duUkv24ErfrLfxeJHYcgM.uVBP6qcst/Ov5JCKAGkqlUVa', '', 4, '2015-06-02 00:53:30', '2015-06-02 00:53:30', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions_types`
--
ALTER TABLE `subscriptions_types`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subscriptions_types`
--
ALTER TABLE `subscriptions_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
