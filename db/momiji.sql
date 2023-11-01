-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 06:28 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `momiji`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `active`) VALUES
(8, 'Men', 'Fashion_Cloth_269.jpg', 'Yes'),
(9, 'Women', 'Fashion_Cloth_737.jpg', 'Yes'),
(10, 'Kid', 'Fashion_Cloth_819.jpg', 'Yes'),
(11, 'Accessory', 'Fashion_Cloth_251.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `description`) VALUES
(4, 'july lin', 'julylin@gmail.com', 'Hi'),
(5, 'july lin', 'julylin@gmail.com', 'Hi'),
(6, 'july lin', 'julylin@gmail.com', 'Hi'),
(8, 'july lin', 'julylin@gmail.com', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `image_name`, `category_id`, `active`) VALUES
(18, 'Cloth', 15000, 'Fashion_Prod_561.jpg', 8, 'Yes'),
(20, 'One-set', 25000, 'Fashion_Prod_142.jpg', 0, 'Yes'),
(21, 'Bag', 20000, 'Fashion_Prod_897.jpg', 0, 'Yes'),
(23, 'Shoe', 10000, 'Fashion_Prod_695.jpg', 10, 'Yes'),
(24, 'Pant', 10000, 'Fashion-Prod-806.jpg', 8, 'Yes'),
(25, 'Dress', 15000, 'Fashion-Prod-350.jpg', 8, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int(1) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `product`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(12, 'Cloth', 15000, 1, 15000, '2023-10-26 07:10:07pm', 'Cancelled', 'july lin', '09788866675', 'julylin@gmail.com', 'Yangon'),
(13, 'Shoe', 10000, 2, 20000, '2023-10-26 07:10:19pm', 'Delivered', 'M t', '09788866675', 'mt@gmail.com', 'Yangon'),
(14, 'One-set', 25000, 3, 75000, '2023-10-26 07:10:35pm', 'On Delivery', 'july lin', '09788866675', 'mt@gmail.com', 'Yangon');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `email`, `password`, `phonenumber`) VALUES
(1, 'Mayri', 'mayri@gmail.com', 'c7513f844a3d58c07d95a7132cc54060', '09788866676'),
(2, 'aung', 'aung@gmail.com', 'ac659f2427e96cd6456c5d85d248ebd0', '097777777777');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
