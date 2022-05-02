-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2022 at 09:36 PM
-- Server version: 8.0.28-0ubuntu0.21.10.4
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-invetory-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Super Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'Rashid Almasoud', 'rashid', '7d0ba610dea3dbcc848a97d8dfd767ae');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Cakes and Biscuits', '280427650199.jpg', 'Yes', 'Yes'),
(2, 'Fast foods', 'G11-cate132.jpg', 'Yes', 'Yes'),
(3, 'Chocolate', '883795182096.jpeg', 'Yes', 'Yes'),
(4, 'Breakfast', '50829562567.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE `food_orders` (
  `id` int UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `food_orders`
--

INSERT INTO `food_orders` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Fries', '5.00', 5, '25.00', '2022-05-02 04:32:40', 'Ordered', 'TEST Customer', '755502255555', 'will@gmail.com', '1021 Saint Street-Tampa Florida');

-- --------------------------------------------------------

--
-- Table structure for table `food_varieties`
--

CREATE TABLE `food_varieties` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `food_varieties`
--

INSERT INTO `food_varieties` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Creamy Cake', 'Enjoy a creamy birthday cake made in love by Group 11. We ensure that the cream is just enough for a delicious cake.', '26.00', '536181086087.jpg', 1, 'Yes', 'Yes'),
(2, 'BBQ Pizza', 'A warm pizza is as delicious as the image. At our cafe, you stand to enjoy a juicy BBQ pizza made in our cafe and an accompaniment of your choice.', '12.00', '744418915562.jpg', 2, 'Yes', 'Yes'),
(3, 'Fries', 'Grab a pack of fries at the best price in town. We offer quality and full plate of chips with a chicken drumstick at the very best price and an accompaniment of your choice.', '5.00', '348463331646.jpg', 2, 'Yes', 'Yes'),
(4, 'Fish Buger', 'For a meal the whole family will enjoy, try these tasty fish burgers, topped with crunchy coleslaw, rocket and tartare sauce.', '11.00', '795806106208.jpg', 2, 'Yes', 'Yes'),
(5, 'Pudding Chocolate', 'Enjoy a cup of chocolate mix with cream for a taste bite.', '3.00', '187779622987.jpeg', 3, 'Yes', 'Yes'),
(6, 'Chocolate brownies', 'With our chocolate brownies bars, you get the taste of freshness that comes with a variety of flavors.', '4.00', '296619971415.jpeg', 3, 'Yes', 'Yes'),
(7, 'French Toast Breakfast', 'Break is a a good source of carbohydrates and when mixed with a well cooked egg, the result is just yummy. Enjoy the full pack of french breakfast toast from us.', '3.00', '154619921043.jpeg', 4, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_varieties`
--
ALTER TABLE `food_varieties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_varieties`
--
ALTER TABLE `food_varieties`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
