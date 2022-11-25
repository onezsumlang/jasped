-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 11:15 AM
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
(8, 1, 'Perkayuan', '1', '2022-02-07 07:45:14'),
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

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `itemCategoryId`, `storeId`, `itemName`, `itemPrice`, `itemDescription`, `image1`, `image2`, `image3`, `discountType`, `discountValue`, `isActive`, `insertDate`, `lastUpdDate`) VALUES
(1, 8, 1, 'Tukang Meubel', 150000, 'tes', 'e83238c14b74a2ac6177c2614314b78a.png', '', '', '', 0, '1', '2022-11-25 13:31:03', '2022-11-25 13:31:03'),
(2, 8, 1, 'Perbaikan Furniture', 150000, 'tes', 'ed1b524cf909288c643ee86cb7dd5e3d.png', '', '', '', 0, '1', '2022-11-25 14:02:21', '2022-11-25 14:02:21'),
(3, 3, 1, 'Jasa Bersih Rumah Harian', 200000, 'tes', 'da699a15e6e8406676eb3eccc594e5d1.png', '0863cba9fe25a1ae46cf69a264ab1302.png', 'd9137b3fe942ec19cfeace1fb38230e1.png', '', 0, '1', '2022-11-25 14:24:44', '2022-11-25 14:24:44'),
(4, 3, 1, 'Jasa Cuci Setrika', 150000, 'tes', 'c6f1be77f836425310d0ed4725752e5f.png', '3ab1077ec7980535f1ad32a52dbceca5.png', '', '', 0, '1', '2022-11-25 14:27:56', '2022-11-25 14:27:56'),
(5, 11, 2, 'Jasa Urus Taman', 100000, 'harga untuk 1 hari', 'db93a30c31118f52f04dd406650b300d.png', '', '', '', 0, '1', '2022-11-25 15:07:41', '2022-11-25 15:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logId` int(11) NOT NULL,
  `method` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lastUpdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logId`, `method`, `detail`, `lastUpdDate`) VALUES
(1, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 11:34:59'),
(2, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 11:35:54'),
(3, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 11:37:52'),
(4, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 11:39:06'),
(5, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 11:39:54'),
(6, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 12:00:46'),
(7, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 12:02:30'),
(8, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 12:06:54'),
(9, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 12:08:27'),
(10, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 12:09:22'),
(11, 'auth/doRegister', '{\"regStatus\":true,\"fullname\":\"Onez Sumlang\",\"email\":\"onez.christin@gmail.com\",\"username\":\"22110002\"}', '2022-11-23 12:31:18'),
(12, 'account/doAddStore', '{\"regStatus\":true,\"storeName\":\"Pertukangan\",\"province\":\"DKI Jakarta\",\"city\":\"Jakarta Barat\"}', '2022-11-23 14:27:52'),
(13, 'account/doAddStore', '{\"regStatus\":true,\"userId\":\"13\",\"storeName\":\"Go Clean\",\"province\":\"DKI Jakarta\",\"city\":\"Jakarta Pusat\"}', '2022-11-23 14:29:57'),
(14, 'account/doAddStore', '{\"regStatus\":true,\"userId\":\"13\",\"storeName\":\"Kebun Jakarta\",\"province\":\"DKI Jakarta\",\"city\":\"Jakarta Pusat\"}', '2022-11-23 14:31:19'),
(15, 'account/doAddStore', '{\"regStatus\":true,\"userId\":\"13\",\"storeName\":\"Go Clean\",\"province\":\"DKI Jakarta\",\"city\":\"Jakarta Pusat\"}', '2022-11-23 17:10:59'),
(16, 'account/doAddService', '{\"regStatus\":true,\"userId\":\"13\",\"itemName\":\"Tukang Meubel\",\"itemPrice\":\"150000\",\"itemDescription\":\"tes\"}', '2022-11-25 13:30:07'),
(17, 'account/doAddService', '{\"regStatus\":true,\"userId\":\"13\",\"itemName\":\"Tukang Meubel\",\"itemPrice\":\"150000\",\"itemDescription\":\"tes\"}', '2022-11-25 13:31:03'),
(18, 'account/doAddService', '{\"regStatus\":true,\"userId\":\"13\",\"itemName\":\"Perbaikan Furniture\",\"itemPrice\":\"150000\",\"itemDescription\":\"tes\"}', '2022-11-25 14:02:22'),
(19, 'account/doAddService', '{\"regStatus\":true,\"userId\":\"13\",\"itemName\":\"Jasa Bersih Rumah Harian\",\"itemPrice\":\"200000\",\"itemDescription\":\"tes\"}', '2022-11-25 14:24:44'),
(20, 'account/doAddService', '{\"regStatus\":true,\"userId\":\"13\",\"itemName\":\"Jasa Cuci Setrika\",\"itemPrice\":\"150000\",\"itemDescription\":\"tes\"}', '2022-11-25 14:27:56'),
(21, 'account/doAddStore', '{\"regStatus\":true,\"userId\":\"13\",\"storeName\":\"Taman Hias\",\"province\":\"DKI Jakarta\",\"city\":\"Jakarta Pusat\"}', '2022-11-25 14:54:49'),
(22, 'account/doAddService', '{\"regStatus\":true,\"userId\":\"13\",\"itemName\":\"Jasa Urus Taman\",\"itemPrice\":\"100000\",\"itemDescription\":\"harga untuk 1 hari\"}', '2022-11-25 15:07:41');

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
  `storeCode` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `storeName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `insertDate` datetime NOT NULL,
  `lastUpdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeId`, `storeCode`, `userId`, `storeName`, `address`, `city`, `province`, `image`, `isActive`, `insertDate`, `lastUpdDate`) VALUES
(1, '2211000201', 13, 'Go Clean', '', 'Jakarta Pusat', 'DKI Jakarta', '', '1', '2022-11-23 17:10:59', '2022-11-23 17:10:59'),
(2, '2211000202', 13, 'Taman Hias', '', 'Jakarta Pusat', 'DKI Jakarta', 'c54e6b104b96974e711a6473fb11ff91.png', '1', '2022-11-25 14:54:49', '2022-11-25 14:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` char(8) COLLATE utf8_unicode_ci NOT NULL,
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
(1, 'onezsuml', 'dc2d7de815dfad3b9bb8089700f8807b', 'Onez Sumlang', 'onez.sumlang@gmail.com', '081285988847', '', '', '', '', '', 0, '1', '2022-02-07 05:51:39', '2022-02-07 05:51:39'),
(13, '22110002', '92d2489ed369f1c0b22ecfbbcd47ed84', 'Onez Sumlang', 'onez.christin@gmail.com', '085882068927', '', '', '', '', '', NULL, '0', '2022-11-23 12:31:18', '0000-00-00 00:00:00');

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logId`);

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
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `storeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
