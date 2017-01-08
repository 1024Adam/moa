-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2017 at 02:09 AM
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
-- Table structure for table `grocery`
--

CREATE TABLE `grocery` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 2, 'Hickory Smoked Barbecue Sauce', '', '100 mL', 'Sauce', 5),
(7, 2, 'Egg', '', '2', 'Protein', 3),
(8, 2, 'Bread Crumbs', '', '1 cup', 'Breading', NULL),
(9, 2, 'Flour', 'White flour', '1 cup', 'Flour', NULL),
(10, 3, 'Milk (2%)', '', '200 mL', 'Dairy', NULL),
(11, 3, 'Vanilla Ice Cream', '', '2 scoops', 'Dairy', 5),
(12, 3, 'Nutella', 'Hazelnut Nutella (375g)', '1.5 tablespoons', 'Spread', 8),
(13, 3, 'Banana', 'Single Banana', '1', 'Fruit', 1),
(14, 4, 'Chicken Fingers', 'Fully cooked breaded chicken fingers', '4 fingers', 'Meat', 4.5),
(15, 4, 'Wrap Shells', 'White or whole wheat wrap shells', '2', 'Wheat', 4),
(16, 4, 'Lettuce', 'Preferred: Romain/Iceberg lettuce', '6 decent leaves', 'Vegetable', 3),
(17, 4, 'Tomato', 'Tomato Slices', '2 slices', 'Vegetable', 1.5),
(18, 4, 'BBQ Sauce', 'Preferred: Bulls Eye - Old West Hickory BBQ Sauce', '4 table spoons', 'Sauce', 4.5),
(19, 4, 'Bacon Bits', 'Bacon bits', '12 bits', 'Meat', 2),
(20, 5, 'Raspberries', 'Fresh raspberries', '1 generous handful', 'Fruit', 2.5),
(21, 5, 'Vanilla Ice Cream', 'Vanilla ice cream', '1 1/2 scoops', 'Dairy', 3),
(22, 5, 'Milk', '2% Milk', '250 mL', 'Dairy', 4),
(23, 6, 'Salmon Fillet', 'Plain salmon fillet', '2 fillets', 'Meat', 7),
(24, 6, 'Salt', 'Basic table salt', '1 teaspoon', 'Seasoning', 2),
(25, 6, 'Pepper', 'Black pepper', '1 teaspoon', 'Seaoning', 2),
(26, 6, 'Sunflower Oil', 'Sunflower oil', '1 tablespoon', 'Oil', 2),
(27, 7, 'Lean Ground Beef', 'Lean ground beef', '1 lb', 'Meat', 8),
(28, 7, 'Bread crumbs', 'Bread crumbs', '1/2 cup', 'Bread', 3),
(29, 7, 'Egg', 'Egg', '2', 'Protein', 4),
(30, 7, 'BBQ Sauce', 'Preferred: Bulls Eye - Old West Hickory', '5 table spoons', 'Sauce', 4),
(31, 7, 'Lettuce', 'Preferred: Romain/Iceberg lettuce', '4-6 leaves', 'Vegetable', 3),
(32, 7, 'Tomato', 'Tomato slices', '4 slices', 'Vegetable', 1.5),
(33, 7, 'Ketchup', 'Ketchup', '4 table spoons', 'Sauce', 4),
(34, 8, 'Raspberries', 'Fresh raspberries', '1 handful', 'Fruit', 2.5),
(35, 8, 'Banana', 'Banana', '1', 'Fruit', 2),
(36, 8, 'Pear', 'Bartlett pear', '1', 'Fruit', 2),
(37, 8, 'Greek Yogurt', 'Greek yogurt', '2 table spoons', 'Dairy', 3),
(38, 8, 'Five Alive Citrus Fruit Juice', 'Five Alive Citrus fruit juice', '100 mL', 'Juice', 4);

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
(15, 1, 5, 'Serve with appropriate side', 1),
(16, 4, 1, 'Evenly spread BBQ sauce onto wraps', 1),
(17, 4, 2, 'Place lettuce onto wraps', 2),
(18, 4, 3, 'Cut tomato slices into halves and place on wraps', 2),
(19, 4, 4, 'Cut up chicken into small pieces', 2),
(20, 4, 6, 'Place chicken evenly onto wraps', 1),
(21, 4, 5, 'Shake bacon bits onto wraps', 1),
(22, 4, 7, 'Enclose contents together into wrap; serve with appropriate side', 2),
(23, 5, 1, 'Dump raspberries into cup', 1),
(24, 5, 2, 'Place ice cream into cup', 1),
(25, 5, 3, 'Fill with milk (250mL or until full)', 1),
(26, 5, 4, 'Blend and serve', 2),
(27, 6, 1, 'Rub sunflower oil on salmon fillets', 1),
(28, 6, 2, 'Place fillets onto pan', 1),
(29, 6, 3, 'Fry until cooked (flipping constantly)', 15),
(30, 6, 4, 'Serve with appropriate side', 1),
(31, 7, 1, 'Mix together beef, bread crumbs, bbq sauce, and eggs', 5),
(32, 7, 2, 'Form into 4 even patties; flatten', 3),
(33, 7, 3, 'Grill (per side) (400 F) (time may vary)', 15),
(34, 7, 4, 'Serve on buns with appropriate toppings, and side(s)', 4),
(35, 8, 1, 'Place assorted fruits into cup', 3),
(36, 8, 2, 'Scoop yogurt into cup', 1),
(37, 8, 3, 'Pour juice into cup (100 mL or until full)', 2),
(38, 8, 4, 'Blend and serve', 2);

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
(1, 'Grilled Salmon', 'Meal', 'Grilled and seasoned salmon on the barbeque.', 1),
(2, 'Chicken Fingers', 'Meal', 'Homemade breaded chicken fingers.', 2),
(3, 'Nutella Banana Milkshake', 'Beverage', 'Homemade milkshake with Nutella spread and banana.', 1),
(4, 'BBQ Chicken Wraps', 'Meal', 'Homemade BBQ chicken wraps with lettuce and tomato.', 2),
(5, 'Raspberry Milkshake', 'Beverage', 'Fresh raspberry milkshake.', 1),
(6, 'Pan-fried Salmon', 'Meal', 'Pan-fried and seasoned salmon', 1),
(7, 'BBQ Burgers', 'Meal', 'Homemade BBQ style hamburgers with lettuce, tomato, and ketchup.', 4),
(8, 'Pear Raspberry Banana Smoothie', 'Beverage', 'A fruity smoothie with Greek yogurt and fruit juice.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grocery`
--
ALTER TABLE `grocery`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `grocery`
--
ALTER TABLE `grocery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
