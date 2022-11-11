-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 11:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasapedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `itemcategory`
--

CREATE TABLE `itemcategory` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `categoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `lastUpdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itemcategory`
--

INSERT INTO `itemcategory` (`categoryId`, `parentId`, `categoryName`, `isActive`, `lastUpdDate`) VALUES
(1, 0, 'Pertukangan', '1', '2022-02-07 07:37:22'),
(2, 0, 'Otomotif', '1', '2022-02-07 07:37:22'),
(3, 0, 'Rumah Tangga', '1', '2022-02-07 07:37:22'),
(4, 0, 'Elektronik', '1', '2022-02-07 07:37:22'),
(5, 0, 'Komputer & Laptop', '1', '2022-02-07 07:37:22'),
(6, 0, 'Handphone & Tablet', '1', '2022-02-07 07:37:22'),
(7, 1, 'Perlistrikan', '1', '2022-02-07 07:45:14'),
(8, 1, 'Perlistrikan', '1', '2022-02-07 07:45:14'),
(9, 1, 'Perledengan', '1', '2022-02-07 07:45:14'),
(10, 1, 'Bangunan', '1', '2022-02-07 07:45:14'),
(11, 1, 'Perkebunan', '1', '2022-02-07 07:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL,
  `itemCategoryId` int(11) NOT NULL,
  `storeId` int(11) NOT NULL,
  `itemName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `itemPrice` float NOT NULL,
  `itemDescription` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(37) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(37) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(37) COLLATE utf8_unicode_ci NOT NULL,
  `discountType` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `discountValue` float NOT NULL,
  `isActive` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `insertDate` datetime NOT NULL,
  `lastUpdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `requestDate` date NOT NULL,
  `requestPrice` float NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(11) NOT NULL,
  `paymentMethod` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `lastUpdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `storeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `storeName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `insertDate` datetime NOT NULL,
  `lastUpdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeId`, `userId`, `storeName`, `isActive`, `insertDate`, `lastUpdDate`) VALUES
(1, 1, 'Jasaku', '1', '2022-02-07 05:53:38', '2022-02-07 05:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(5) DEFAULT NULL,
  `newsletterNotif` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `insertDate` datetime NOT NULL,
  `lastUpdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `village`, `region`, `city`, `province`, `zipcode`, `newsletterNotif`, `insertDate`, `lastUpdDate`) VALUES
(1, 'onezsumlang', 'dc2d7de815dfad3b9bb8089700f8807b', 'Onez Sumlang', 'onez.sumlang@gmail.com', '081285988847', '', '', '', '', '', 0, '1', '2022-02-07 05:51:39', '2022-02-07 05:51:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itemcategory`
--
ALTER TABLE `itemcategory`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`storeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemcategory`
--
ALTER TABLE `itemcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `storeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
