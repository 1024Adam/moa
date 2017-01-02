-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2017 at 07:11 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `avg_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recipe_id`, `name`, `descr`, `amount`, `type`, `avg_price`) VALUES
(1, 1, 'Salmon Fillet', 'Raw salmon fillet', '2', 'Meat', 9),
(2, 1, 'Salt', 'Basic table salt', 'Sprinkle', 'Seasoning', NULL),
(3, 1, 'Black Pepper', 'Black pepper', 'Sprinkle', 'Seasoning', NULL),
(4, 1, 'Sunflower Oil', 'Basic sunflower oil', 'Splash', 'Oil', NULL),
(5, 2, 'Chicken Breast', 'Stir--fry style chicken breast', '1 pkg', 'Meat', NULL),
(6, 2, 'Hickory Smoked Barbecue Sauce', NULL, '100 mL', 'Sauce', 5),
(7, 2, 'Egg', NULL, '2', 'Protein', 3),
(8, 2, 'Bread Crumbs', NULL, '1 cup', 'Breading', NULL),
(9, 2, 'Flour', 'White flour', '1 cup', 'Flour', NULL),
(10, 3, 'Milk (2%)', NULL, '200 mL', 'Dairy', NULL),
(11, 3, 'Vanilla Ice Cream', NULL, '2 scoops', 'Dairy', 5),
(12, 3, 'Nutella', 'Hazelnut Nutella (375g)', '1.5 tablespoons', 'Spread', 8),
(13, 3, 'Banana', 'Single Banana', '1', 'Fruit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `sorted_id` int(11) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `est_time` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `recipe_id`, `sorted_id`, `descr`, `est_time`) VALUES
(1, 1, 1, 'Rub sunflower oil on salmon fillets', 1),
(2, 1, 2, 'Season fillets with salt and pepper', 1),
(3, 1, 3, ' Grill skin side down (400 F)', 12.5),
(4, 1, 4, 'Flip and continue grilling', 7.5),
(5, 2, 1, 'Shake chicken in flour', 2),
(6, 2, 2, 'Cover chicken in beaten eggs', 5),
(7, 2, 3, 'Cover chicken in bread crumbs', 5),
(8, 2, 4, 'Bake in oven (once per side)', 10),
(9, 2, 5, 'Serve with barbecue sauce', 1),
(10, 3, 1, 'Break up/add banana', 1),
(11, 3, 2, 'Add ice cream', 1),
(12, 3, 3, 'Add Nutella', 0.5),
(13, 3, 4, 'Add milk (or until full)', 1),
(14, 3, 5, 'Blend and serve', 1),
(15, 1, 5, 'Serve with appropriate side', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `serving` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `type`, `descr`, `serving`) VALUES
(1, 'Grilled Salmon', 'Meal', 'Grilled and seasoned salmon on the barbeque', 1),
(2, 'Chicken Fingers', 'Meal', 'Homemade breaded chicken fingers', 2),
(3, 'Nutella Banana Milkshake', 'Beverage', 'Homemade milkshake with Nutella spread and banana', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
