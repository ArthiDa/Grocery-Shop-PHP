-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 05:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(11) NOT NULL,
  `C_FIRSTNAME` varchar(100) NOT NULL,
  `C_LASTNAME` varchar(100) DEFAULT NULL,
  `C_ADDRESS` varchar(100) NOT NULL,
  `C_MOBILE` int(11) NOT NULL,
  `C_EMAIL` varchar(100) NOT NULL,
  `C_PASS` varchar(100) NOT NULL,
  `JOIN_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_FIRSTNAME`, `C_LASTNAME`, `C_ADDRESS`, `C_MOBILE`, `C_EMAIL`, `C_PASS`, `JOIN_DATE`) VALUES
(4, 'Tasmi', 'Khair', 'Chittagong', 1234556787, 'tasmi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-11-30'),
(5, 'Dennis', 'Wilder', 'Reprehenderit error ', 862, 'fete@mailinator.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-11-30'),
(6, 'Yvette', 'Mccoy', 'Quos sit eos ut ali', 50, 'jepa@mailinator.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `ORDER_QUANTITY` int(11) NOT NULL,
  `TOTAL_PRICE` int(11) NOT NULL,
  `ORDER_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `C_ID`, `PRODUCT_ID`, `ORDER_QUANTITY`, `TOTAL_PRICE`, `ORDER_DATE`) VALUES
(1, 4, 1, 2, 200, '2022-11-30'),
(17, 6, 26, 2, 940, '2022-11-30'),
(18, 6, 31, 5, 840, '2022-11-30'),
(19, 6, 1, 5, 500, '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` int(11) NOT NULL,
  `ORDER_ID` int(11) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAYMENT_ID`, `ORDER_ID`, `STATUS`) VALUES
(1, 1, 'Paid'),
(2, 17, 'Pending'),
(3, 18, 'Paid'),
(4, 19, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCTTYPE_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(100) DEFAULT NULL,
  `PRODUCT_BRAND` varchar(100) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `STOCK_ID` int(11) DEFAULT NULL,
  `PRODUCT_IMG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCTTYPE_ID`, `PRODUCT_NAME`, `PRODUCT_BRAND`, `PRICE`, `STOCK_ID`, `PRODUCT_IMG`) VALUES
(1, 8, 'Bread', 'Canyon Bakehouse', 100, 1, 'Bread.png'),
(2, 3, 'Yogurt', 'Yoplait', 250, 9, 'Yogurt.png'),
(3, 11, 'Frozen Pizza', 'Tonys Pizza', 480, 4, 'Frozen_Pizza.png'),
(25, 6, 'Parathas', 'Paragon Family Paratha', 320, 7, 'Parathas.png'),
(26, 2, 'Grass-Fed-Beef', 'Clemens Food Group', 470, 2, 'Beef.png'),
(27, 2, 'Canned Salmon', 'Beer Battered Fillets', 410, 2, 'Canned_Salmon.png'),
(28, 4, 'Carrots', 'Birds Eye', 120, 7, 'Carrots.png'),
(29, 4, 'Onion', 'Birds Eye', 140, 2, 'Onion.png'),
(30, 4, 'Broccoli', 'Greed Giant', 60, 2, 'Broccoli.png'),
(31, 4, 'Capsicum', 'Green Food', 168, 8, 'Capsicum.png');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `PRODUCTTYPE_ID` int(11) NOT NULL,
  `TITLE` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`PRODUCTTYPE_ID`, `TITLE`) VALUES
(2, 'Meat'),
(3, 'Fish'),
(4, 'Dairy'),
(5, 'Vegetables'),
(6, 'Fruits'),
(7, 'Frozen Items'),
(8, 'Dry Goods'),
(9, 'Snacks'),
(10, 'Case Products'),
(11, 'Toiletries');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `STOCK_ID` int(11) NOT NULL,
  `TOTAL_PRODUCTS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`STOCK_ID`, `TOTAL_PRODUCTS`) VALUES
(1, 133),
(2, 140),
(3, 190),
(4, 270),
(5, 480),
(6, 370),
(7, 480),
(8, 340),
(9, 260),
(10, 233),
(11, 78);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`),
  ADD UNIQUE KEY `C_MOBILE` (`C_MOBILE`),
  ADD UNIQUE KEY `C_EMAIL` (`C_EMAIL`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `fk_C_ID` (`C_ID`),
  ADD KEY `fk_PRODUCT_ID` (`PRODUCT_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `FK_ORDER` (`ORDER_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `fk_pt` (`PRODUCTTYPE_ID`),
  ADD KEY `fk_st` (`STOCK_ID`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`PRODUCTTYPE_ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`STOCK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `PRODUCTTYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `STOCK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_C_ID` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `fk_PRODUCT_ID` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_ORDER` FOREIGN KEY (`ORDER_ID`) REFERENCES `orders` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_pt` FOREIGN KEY (`PRODUCTTYPE_ID`) REFERENCES `producttype` (`PRODUCTTYPE_ID`),
  ADD CONSTRAINT `fk_st` FOREIGN KEY (`STOCK_ID`) REFERENCES `stock` (`STOCK_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
