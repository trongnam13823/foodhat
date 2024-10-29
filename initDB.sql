-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 12:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodhat`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `street` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `country`, `state`, `city`, `street`) VALUES
(2, 2, 'USA', 'CA', 'NY', '123 Main St'),
(9, 1, 'USA', 'CA', 'Tuyên Quang', 'Tp. Tuyên Quang'),
(10, 2, 'aaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaa'),
(11, 2, 'bbbbb', 'bbbbbbbbbbbb', 'bbbbbbbbb', 'bbbbbbbbbb'),
(12, 8, 'USA', 'CA', 'NY', '123 Main St'),
(13, 8, 'JP', 'WA', 'Los Angeles', '333 Redwood Dr'),
(14, 7, 'USA', 'CA', 'Anytown', '222 Elm St');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(8, 'Bơ ngơ'),
(9, 'Chicken'),
(11, 'Dresserts'),
(10, 'Pizza'),
(12, 'Sandwich');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `date`, `total`, `quantity`, `status_id`) VALUES
(1, 1, 9, '2023-12-17 17:12:07', 210.00, 3, 1),
(2, 2, 2, '2023-12-17 20:26:09', 1324.95, 6, 4),
(3, 2, 10, '2023-12-17 20:28:23', 1680.00, 3, 2),
(4, 1, 9, '2023-12-19 22:42:08', 987.97, 6, 3),
(5, 1, 9, '2023-12-20 00:03:06', 440.00, 2, 5),
(6, 1, 9, '2023-12-20 00:06:00', 500.00, 2, 6),
(7, 1, 9, '2023-12-20 20:37:59', 1769.94, 4, 4),
(8, 8, 13, '2023-12-29 19:09:15', 659.98, 4, 5),
(9, 7, 14, '2023-12-29 19:36:49', 746.97, 4, 1),
(10, 2, 2, '2024-01-02 14:50:11', 1320.00, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
(1, 1, 18, 120.00, 1),
(2, 1, 19, 40.00, 1),
(3, 1, 20, 50.00, 1),
(4, 2, 18, 120.00, 2),
(5, 2, 19, 40.00, 2),
(6, 2, 20, 50.00, 2),
(7, 2, 22, 60.00, 3),
(8, 2, 23, 75.00, 3),
(9, 2, 24, 99.99, 5),
(10, 3, 22, 60.00, 11),
(11, 3, 23, 75.00, 4),
(12, 3, 18, 120.00, 6),
(13, 4, 24, 99.99, 3),
(14, 4, 23, 75.00, 2),
(15, 4, 19, 40.00, 2),
(16, 4, 20, 99.00, 2),
(17, 4, 21, 70.00, 2),
(18, 4, 22, 60.00, 2),
(19, 5, 23, 75.00, 4),
(20, 5, 21, 70.00, 2),
(21, 6, 18, 120.00, 3),
(22, 6, 21, 70.00, 2),
(23, 7, 23, 75.00, 6),
(24, 7, 22, 60.00, 2),
(25, 7, 24, 99.99, 6),
(26, 7, 18, 120.00, 5),
(27, 8, 24, 99.99, 2),
(28, 8, 21, 70.00, 4),
(29, 8, 19, 40.00, 3),
(30, 8, 22, 60.00, 1),
(31, 9, 24, 99.99, 3),
(32, 9, 20, 99.00, 3),
(33, 9, 19, 40.00, 2),
(34, 9, 21, 70.00, 1),
(35, 10, 38, 123.00, 7),
(36, 10, 24, 88.00, 3),
(37, 10, 23, 75.00, 1),
(38, 10, 19, 40.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipping'),
(4, 'Delivered'),
(5, 'Completed'),
(6, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `name` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `offer` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `thumbnail`, `name`, `category_id`, `price`, `offer`, `active`) VALUES
(18, '656d6de7753c5.jpg', 'Daria Shevtsova', 11, 120.00, 200.00, 1),
(19, '656d6e03254aa.jpg', 'Spicy Burger', 9, 40.00, 80.00, 1),
(20, '656d6e24e2637.jpg', 'Fried Chicken', 8, 99.00, 150.00, 1),
(21, '656d6e43b277a.jpg', 'Mozzarella Sticks', 12, 70.00, 110.00, 1),
(22, '656d6e621f419.jpg', 'Popcorn Chicken', 12, 60.00, 90.00, 1),
(23, '656d6e823971d.jpg', 'Chicken Wings', 8, 75.00, 80.00, 1),
(24, '658ebe6c680cc.jpg', 'Onion Rings', 9, 88.00, 100.00, 1),
(37, '658ebe94bd29f.jpg', 'Đùi gà khổng lồ', 9, 9.90, 999.00, 1),
(38, '658ebed2a415b.jpg', 'Combo bụng không đáy', 11, 123.00, 456.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT 'default.jpg',
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Nam Đẹp Trai', '0886138003', '111111', '1.png', 1),
(2, 'Trần Trọng Nam', '0999999999', '999999', '2.jpg', 0),
(6, 'test123', '0123456789', '012345', 'default.jpg', 0),
(7, 'test28', '2828282828', '282828', 'default.jpg', 0),
(8, 'test29', '2929292929', '292929', '8.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `status` (`status_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH,
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;