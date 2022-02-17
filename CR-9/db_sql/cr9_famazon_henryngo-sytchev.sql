-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 11:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr9_famazon_henryngosytchev`
--
CREATE DATABASE IF NOT EXISTS `cr9_famazon_henryngosytchev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cr9_famazon_henryngosytchev`;

-- --------------------------------------------------------

--
-- Table structure for table `famazon`
--

CREATE TABLE `famazon` (
  `f_id` int(11) NOT NULL,
  `status` enum('company','customer') NOT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `fk_s_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `famazon`
--

INSERT INTO `famazon` (`f_id`, `status`, `fk_user_id`, `fk_s_id`) VALUES
(1, 'customer', 1, NULL),
(2, 'customer', 3, NULL),
(3, 'customer', 2, NULL),
(4, 'company', NULL, 3),
(5, 'company', NULL, 1),
(6, 'company', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `inv_id` int(11) NOT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `final_price` float DEFAULT NULL,
  `fk_pay_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`inv_id`, `purchase_date`, `final_price`, `fk_pay_id`) VALUES
(1, '2021-10-11 14:33:03', 299.98, 4),
(2, '2021-10-13 11:33:03', 60.75, 3),
(3, '2021-10-06 14:34:47', 148.99, 1),
(4, '2021-11-16 15:24:41', 31.7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `city` varchar(25) DEFAULT NULL,
  `zip` char(4) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `city`, `zip`, `country`) VALUES
(1, 'Graz', '8010', 'Austria'),
(2, 'Wien', '1020', 'Austria'),
(3, 'Innsbruck', '6020', 'Austria');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `fk_sc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `fk_user_id`, `fk_sc_id`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 1, 2),
(4, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` int(11) NOT NULL,
  `fk_order_id` int(11) DEFAULT NULL,
  `fk_prod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `fk_order_id`, `fk_prod_id`) VALUES
(1, 1, 2),
(2, 1, 2),
(5, 2, 3),
(6, 2, 3),
(7, 2, 3),
(8, 3, 2),
(9, 4, 1),
(10, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `pay_date` datetime DEFAULT NULL,
  `order_price` float DEFAULT NULL,
  `fk_pm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `pay_date`, `order_price`, `fk_pm_id`) VALUES
(1, '2021-11-16 21:11:37', 31.7, 4),
(2, '2021-10-06 08:19:37', 139.99, 2),
(3, '2021-10-03 17:45:19', 53.25, 3),
(4, '2021-11-10 11:16:23', 279.98, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `pm_id` int(11) NOT NULL,
  `pm_name` varchar(20) DEFAULT NULL,
  `fk_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`pm_id`, `pm_name`, `fk_order_id`) VALUES
(1, 'Master Card', 1),
(2, 'PayPal', 3),
(3, 'VISA', 2),
(4, 'Bank Contact', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fk_s_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `price`, `description`, `fk_s_id`) VALUES
(1, 'Hand creme', 13.95, 'Hand creme for a soft skin', 1),
(2, 'Xiaomi Redmi 3', 139.99, 'The main screen size is 5.0 inches with 720 x 1280 pixels resolution. It has a 294 ppi pixel density. The screen covers about 71.1% of the device\'s body. ', 2),
(3, 'Retro T-shirt', 17.75, 'Feel the vibe of the 90\'s though an unbeatable look', 3);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_company`
--

CREATE TABLE `shipping_company` (
  `sc_id` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `sc_name` varchar(20) DEFAULT NULL,
  `ship_fee` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_company`
--

INSERT INTO `shipping_company` (`sc_id`, `date_start`, `date_end`, `sc_name`, `ship_fee`) VALUES
(1, '2021-11-12 10:17:30', '2021-11-16 20:43:39', 'DHL', 15.99),
(2, '2021-11-14 20:24:09', '2021-11-16 13:43:53', 'DPD', 12.95),
(5, '2021-10-07 11:05:00', '2021-10-10 09:08:30', 'POST', 9.95);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`s_id`, `s_name`) VALUES
(1, 'Nivea'),
(2, 'Xiaomi'),
(3, 'H&M');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `fk_location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `l_name`, `f_name`, `email`, `phone`, `street`, `fk_location_id`) VALUES
(1, 'Wicked', 'John', 'jwick@mail.us', '01-0023-345-43', 'Gloriettengasse 5/6', 1),
(2, 'Botter', 'Larry', 'lbotter@gmx.at', '0674-345-43-21', 'Weinstrasse 1/23', 3),
(3, 'Klamov', 'Olena', 'oklamov@gmail.ru', '0650-340-43-29', 'Kreiskygasse,12', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `famazon`
--
ALTER TABLE `famazon`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_s_id` (`fk_s_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `fk_pay_id` (`fk_pay_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_sc_id` (`fk_sc_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `fk_prod_id` (`fk_prod_id`),
  ADD KEY `fk_order_id` (`fk_order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `fk_pm_id` (`fk_pm_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`pm_id`),
  ADD KEY `fk_order_id` (`fk_order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_s_id` (`fk_s_id`);

--
-- Indexes for table `shipping_company`
--
ALTER TABLE `shipping_company`
  ADD PRIMARY KEY (`sc_id`),
  ADD UNIQUE KEY `sc_name` (`sc_name`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_location_id` (`fk_location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `famazon`
--
ALTER TABLE `famazon`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_company`
--
ALTER TABLE `shipping_company`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `famazon`
--
ALTER TABLE `famazon`
  ADD CONSTRAINT `famazon_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `famazon_ibfk_2` FOREIGN KEY (`fk_s_id`) REFERENCES `suppliers` (`s_id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`fk_pay_id`) REFERENCES `payments` (`pay_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`fk_sc_id`) REFERENCES `shipping_company` (`sc_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`fk_prod_id`) REFERENCES `products` (`prod_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`fk_order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`fk_pm_id`) REFERENCES `payment_methods` (`pm_id`);

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_ibfk_1` FOREIGN KEY (`fk_order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_s_id`) REFERENCES `suppliers` (`s_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_location_id`) REFERENCES `locations` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
