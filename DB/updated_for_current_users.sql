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


CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

  
  ALTER TABLE `settings` ADD `theme_color` VARCHAR(30) NOT NULL DEFAULT 'red' AFTER `registration`;