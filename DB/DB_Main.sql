-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2017 at 06:06 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `googlestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `create_date`, `update_date`, `is_delete`) VALUES
(1, 'House', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'Apartment', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Flat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'Basement', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'Land', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'Plot', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_request`
--

CREATE TABLE IF NOT EXISTS `customers_request` (
  `id` int(11) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` mediumtext NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `is_delete`) VALUES
(2, 'Balcony', 0),
(3, 'Dishwasher', 0),
(4, 'Heating', 0),
(5, 'Cable TV', 0),
(6, 'Pool', 0),
(7, 'Parking', 0),
(8, 'Internet', 0),
(10, 'Grill', 1),
(11, 'More', 0),
(12, 'Inctercard', 0),
(13, 'internet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `image`, `body`, `parent_id`, `is_delete`) VALUES
(1, 'About Us', '48321_page.jpg', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. </p>\r\n\r\n<h2> Heading 1</h2>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. </p>\r\n<h2> Heading 2</h2>\r\n\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. </p>', 0, 0);
-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `type` enum('SALE','RENT') NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` mediumtext,
  `image_name` varchar(255) DEFAULT NULL,
  `image_ext` varchar(10) NOT NULL,
  `meta_keywords` varchar(500) DEFAULT NULL,
  `meta_desc` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime,
  `updated_at` datetime,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `beds` int(2) DEFAULT NULL,
  `bath` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `features` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `size` int(11) NOT NULL,
  `related` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `category_id`, `agent_id`, `type`, `title`, `slug`, `body`, `image_name`, `image_ext`, `meta_keywords`, `meta_desc`, `status`, `created_at`, `updated_at`, `address`, `city`, `state`, `zip`, `country`, `latitude`, `longitude`, `price`, `beds`, `bath`, `year`, `features`, `is_delete`, `featured`, `size`, `related`) VALUES
(1, 1, 1, 'SALE', '42-15 Crescent Street #8C', '', 'Introducing Luna LIC - Your Boutique Luxury RetreatAt Luna LIC, the chic, new Long Island City boutique rental development, enjoy open floor plans and sprawling city views. With just 124 residences, Luna LIC provides every guest with an intimate oasis tucked away in a concierge building. Luna LICs dynamic selection of studio, one, and two-bedroom apartments, and stunning rooftop duplex penthouses', '800882.jpg', '', NULL, NULL, 1, '2017-01-02 00:00:00', '2017-01-28 15:50:03', '69-28 53rd Ave, Flushing, NY 11378, USA', 'Queens', 'New York', '11378', NULL, '40.73088356343787', '-73.89463798508291', 250000, 3, 4, 2001, '2,3,4', 0, 1, 0, '1,2');
-- --------------------------------------------------------

--
-- Table structure for table `property_payments`
--

CREATE TABLE IF NOT EXISTS `property_payments` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `stripe_transaction_id` varchar(155) NOT NULL,
  `paypal_trasection_id` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `phone_no` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(55) CHARACTER SET latin1 DEFAULT NULL,
  `state` varchar(100) CHARACTER SET latin1 NOT NULL,
  `zip` varchar(10) CHARACTER SET latin1 NOT NULL,
  `latitude` varchar(30) CHARACTER SET latin1 NOT NULL,
  `longitude` varchar(30) CHARACTER SET latin1 NOT NULL,
  `currency` varchar(20) CHARACTER SET latin1 NOT NULL,
  `theme_color` varchar(20) CHARACTER SET latin1 DEFAULT 'red',
  `country` varchar(55) CHARACTER SET latin1 DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `google` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `logo` varchar(25) DEFAULT NULL,
  `captcha` tinyint(1) NOT NULL DEFAULT '0',
  `captcha_secret` varchar(150) NOT NULL,
  `captcha_public` varchar(150) NOT NULL,
  `attempts` tinyint(1) NOT NULL,
  `featured_price` double(10,2) NOT NULL,
  `stripe_mode` enum('test','live') NOT NULL,
  `stripe_secret` varchar(150) NOT NULL,
  `stripe_publish` varchar(150) NOT NULL,
  `paypal_mode` enum('test','live') NOT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `email`, `phone_no`, `address`, `city`, `state`, `zip`, `latitude`, `longitude`, `currency`, `country`, `facebook`, `twitter`, `google`, `linkedin`, `youtube`, `logo`, `captcha`, `captcha_secret`, `captcha_public`, `attempts`, `featured_price`, `stripe_mode`, `stripe_secret`, `stripe_publish`, `paypal_mode`, `paypal_email`, `registration`) VALUES
(1, 'Easy Estate', 'arfan67@gmail.com', '03005095213', 'Market St, Brooklyn, NY 11205, USA', 'Queens', 'New York', '11419', '40.701218251717', '-73.97360221848135', '$', 'Pakistan', 'https://www.facebook.com/cent040', 'https://www.twitter.com/cent040', 'cent040', 'us', 'fdsfsd', 'logo.png', 1, '6LfeqCkTAAAAAFi3XAAeos3qsXi4BSgTipj4cgtl', '6LfeqCkTAAAAAGMoJQLdmkjNBtCJcBQVi7SjFpRj', 0, 10.00, 'test', '', '', 'test', 'webguy040-buyer@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` datetime  NULL,
  `updated_at` datetime NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, '42-15 Crescent Street ', 1, '304385.jpg', '2017-01-24 09:58:22', '0000-00-00 00:00:00'),
(2, '355 a Clinton Street ', 1, '405242.jpg', '2017-01-24 09:58:37', '0000-00-00 00:00:00'),
(3, 'FLOORPLANS 15 Willow Street', 1, '613443.jpg', '2017-01-24 09:58:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supporting_images`
--

CREATE TABLE IF NOT EXISTS `supporting_images` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `g_id` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(155) NOT NULL,
  `facebook_id` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` datetime  NULL,
  `created_at` datetime  NULL,
  `AccessLevel` tinyint(1) NOT NULL DEFAULT '1',
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `google2fa_secret` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `facebook_id`, `password`, `phone`, `remember_token`, `updated_at`, `created_at`, `AccessLevel`, `facebook`, `twitter`, `google2fa_secret`, `status`, `is_delete`) VALUES
(1, 'Admin', 'admin@admin.com', '', '$2y$10$jfUe8p9vdZ8UfVI1Rjf3ouvf/5LM9v2dz1usy/tAhwdHQR/jndVQq', '033005095213', '36D4ldPyNyYPFgTlCaki1VKFBa42kGye4rdhS5iqaE1tpab41f20klO3tctV', '2017-01-28 15:25:31', '2016-08-12 20:44:53', 0, 'http://facebook.com/cent040', 'http://twitter.com/cent040', '', 0, 0);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_request`
--
ALTER TABLE `customers_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_payments`
--
ALTER TABLE `property_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_images`
--
ALTER TABLE `supporting_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers_request`
--
ALTER TABLE `customers_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `property_payments`
--
ALTER TABLE `property_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supporting_images`
--
ALTER TABLE `supporting_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;