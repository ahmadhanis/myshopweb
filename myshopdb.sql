-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 01:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `email` varchar(50) NOT NULL,
  `prid` varchar(10) NOT NULL,
  `qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_carts`
--

INSERT INTO `tbl_carts` (`email`, `prid`, `qty`) VALUES
('slumberjer@gmail.com', '50', 3),
('slumberjer@gmail.com', '49', 4),
('slumberjer@gmail.com', '45', 1),
('slumberjer@gmail.com', '46', 2),
('slumberjer@gmail.com', '43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `prid` int(11) NOT NULL,
  `prname` varchar(30) NOT NULL,
  `prtype` varchar(30) NOT NULL,
  `prprice` double NOT NULL,
  `prqty` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `picture` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prid`, `prname`, `prtype`, `prprice`, `prqty`, `datecreated`, `picture`) VALUES
(28, 'Acoustic Guitar', 'electronic', 312.9, 10, '2021-05-19 20:58:10', '60a51972dd733.png'),
(29, 'Mechanical Keyboard', 'electronic', 412.2, 5, '2021-05-19 20:59:52', '60a519d81f552.png'),
(30, 'Gaming Chair', 'furniture', 523.3, 3, '2021-05-19 21:04:50', '60a51b0215725.png'),
(31, 'Farm Dining Table', 'furniture', 172, 21, '2021-05-19 21:05:29', '60a51b29713e8.png'),
(32, 'Rounded Table', 'furniture', 242.3, 3, '2021-05-19 21:06:11', '60a51b53a3992.png'),
(33, 'Mrvls Table', 'furniture', 321, 3, '2021-05-19 21:06:52', '60a51b7c2e87b.png'),
(34, 'Crystal Dining Table', 'furniture', 1234.3, 2, '2021-05-19 21:08:42', '60a51bea3f7b5.png'),
(35, 'Television', 'electronic', 32.3, 1, '2021-05-19 21:32:00', '60a52160bd41a.png'),
(36, 'Comfy Couch', 'furniture', 200, 1, '2021-05-19 21:33:11', '60a521a70d7be.png'),
(37, 'TV', 'electronic', 500, 10, '2021-05-21 22:32:58', '60a7c49a9a001.png'),
(39, 'SailBoat RC', 'electronic', 559, 10, '2021-05-24 13:31:53', '60ab3a49e524e.png'),
(40, 'Cessna RC', 'electronic', 700, 5, '2021-05-24 13:36:48', '60ab3b70e8cd7.png'),
(41, 'Del Monte Leaf Sninach', 'canned', 3.5, 50, '2021-05-24 14:03:27', '60ab41afb3653.png'),
(42, 'Shirley', 'beverage', 15, 10, '2021-05-25 11:07:01', '60ac69d595874.png'),
(43, 'Pink Drink', 'beverage', 8, 10, '2021-05-25 11:15:26', '60ac6bce0cfae.png'),
(44, 'Tuna Premium', 'canned', 12, 50, '2021-05-25 11:17:50', '60ac6c5ee2d54.png'),
(45, 'Soup', 'canned', 7, 10, '2021-05-25 11:21:12', '60ac6d28a774f.png'),
(46, 'Sardines Tomatoes', 'canned', 4.5, 50, '2021-05-25 11:53:30', '60ac74baeef29.png'),
(47, 'Ayam Sardines', 'canned', 4, 55, '2021-05-25 11:55:32', '60ac753411d37.png'),
(48, 'Alishan Sardines', 'canned', 4, 3, '2021-05-25 12:06:03', '60ac77ab1d431.png'),
(49, 'Canned Bread', 'canned', 5, 44, '2021-05-25 12:11:07', '60ac78db810a5.png'),
(50, 'Sunfield  Potatoes', 'canned', 6, 55, '2021-05-25 12:22:27', '60ac7b836aac6.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchased`
--

CREATE TABLE `tbl_purchased` (
  `orderid` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`prid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
