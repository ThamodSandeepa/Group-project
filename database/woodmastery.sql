-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 12:48 PM
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
-- Database: `woodmastery`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Wood_type` varchar(50) NOT NULL,
  `Sizes` varchar(50) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `AStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Product_id`, `Customer_id`, `Wood_type`, `Sizes`, `Color`, `Quantity`, `Price`, `AStatus`) VALUES
(1, 5, 5, 'Kohomba', '10 X 20 X 30', 'Color #1', 1, 7000, 0),
(2, 11, 8, 'Suriya', '18 X 20 X 35', 'Color #2', 2, 8000, 3),
(3, 15, 20, 'Suriya', '18 X 20 X 35', 'Color #2', 4, 8000, 4),
(4, 11, 2, 'Jak', '18 X 20 X 35', 'Color #5', 1, 8000, 0),
(5, 10, 12, 'Kohomba', '15 X 28 X 30', 'color #6', 3, 3000, 1),
(6, 10, 18, 'Kohomba', '15 X 28 X 35', 'color #7', 1, 3000, 2),
(7, 15, 13, 'suriya', '11 X 22 X 33', 'color #7', 8, 4000, 2),
(8, 29, 24, 'Badidel', '10 X 20 X 30', 'Color#2', 1, 10000, 2),
(9, 31, 23, 'Kohomba', '33 X 44 X 55', 'Color#4', 5, 0, 0),
(10, 31, 21, 'Teak', '8 X 9 X 10', 'Color#6', 10, 1000, 2),
(11, 31, 28, 'Jak', '1 X 1 X 1', 'Color#2', 5, 0, 0),
(12, 31, 28, 'Buruta', '3 X 6 X 9', 'Color#4', 4, 0, 0),
(13, 31, 28, 'Kohomba', '8 X 9 X 10', 'Color#6', 2, 15000, 2),
(14, 46, 28, 'Halmilla', '5 X 5 X 5', 'Color#2', 6, 10000, 0),
(15, 46, 28, 'Badidel', '5 X 9 X 2', 'Color#4', 1, 10000, 3),
(16, 8, 33, 'Halmilla', '5 X 2 X 8', 'Color#4', 2, 1000, 2),
(17, 46, 28, 'Badidel', '5 X 10 X 15', 'Color#2', 1, 0, 0),
(18, 13, 28, 'Jak', '6 X 8 X 6', 'Color#3', 1, 50000, 2),
(19, 5, 28, 'Jak', '5 X 5 X 5', 'Color#1', 2, 18000, 2),
(20, 1, 32, 'Halmilla', '1 X 2 X 4', 'Color#4', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(11) NOT NULL,
  `Images` varchar(255) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Catagory` text NOT NULL,
  `Unlisted_or_Deleted` tinyint(4) DEFAULT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Images`, `Title`, `Catagory`, `Unlisted_or_Deleted`, `time_date`) VALUES
(1, 'images/table 3.jpg', 'Table Design 3', 'Chair', 1, '2023-09-26 18:21:57'),
(2, 'images/IMG-20230512-WA0012.jpg', 'Example Cantent #2', 'Chair', 1, '2023-08-23 15:43:08'),
(3, 'images/IMG-20230512-WA0008.jpg', 'Example Cantent #3', 'Dore', 1, '2023-08-23 15:43:13'),
(4, 'images/IMG-20230512-WA0007.jpg', 'Example Cantent #4', 'Dore', 1, '2023-08-23 15:43:22'),
(5, 'images/Door6.png', 'Door Design 03', 'Dore', 1, '2023-09-30 17:29:49'),
(6, 'images/IMG-20230512-WA0003 - Copy - Copy.jpg', 'Example Cantent #6', 'Cabinet', 0, '2023-08-23 15:35:12'),
(7, 'images/Bed3.png', 'Bed Design 03', 'Bed', 1, '2023-09-30 17:30:17'),
(8, 'images/table 21.jpg', 'Table Design 2', 'Chair', 1, '2023-09-26 18:22:06'),
(9, 'images/IMG-20230512-WA0011.jpg', 'Example Cantent #9', 'Dore', 0, '2023-08-23 15:35:12'),
(10, 'images/IMG-20230512-WA0010.jpg', 'Example Cantent #10', 'Window', 0, '2023-08-23 15:35:12'),
(11, 'images/Bed2.png', 'Bed Design 01', 'Bed', 1, '2023-09-26 03:51:02'),
(12, 'images/Door5.png', 'Door Design 02', 'Dore', 1, '2023-09-30 17:28:24'),
(13, 'images/Bed0.png', 'Bed Design 02', 'Bed', 1, '2023-09-30 17:28:36'),
(14, 'images/IMG-20230512-WA0001 - Copy (2).jpg', 'Example Cantent #14', 'Table', 0, '2023-08-23 15:35:12'),
(15, 'images/IMG-20230512-WA0005.jpg', 'Example Cantent #15', 'Chair', 0, '2023-08-23 15:35:12'),
(16, 'images/Windows1.png', 'Window Design 1', 'Window', 1, '2023-09-26 03:49:38'),
(17, 'images/IMG-20230512-WA0012.jpg', 'Example Cantent #17', 'Window', 0, '2023-08-23 15:35:12'),
(18, 'images/IMG-20230512-WA0012.jpg', 'Example Cantent #18', 'Cabinet', 0, '2023-08-23 15:35:12'),
(19, 'images/2.jpg', 'Exampal Cantent', 'Table', 0, '2023-08-23 15:35:12'),
(20, 'images/3.jpg', 'aaaaaaaaaaaaaaaa', 'Chair', 0, '2023-08-23 15:35:12'),
(21, 'images/IMG-20230512-WA0001.jpg', 'ggjh', 'Dore', 0, '2023-08-23 15:35:12'),
(22, 'images/Picture1.png', 'abcd', 'Table', 2, '2023-09-04 19:45:45'),
(23, 'images/Screenshot 2023-06-26 204016.png', 'bbbbbbbbbbb', 'Chair', 2, '2023-09-04 19:45:48'),
(24, 'images/cv[7] copy.jpg', 'ex aaaaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaa aaaaaaa aaaaaaaa aaaaaaaaa aaaaaaaaa', 'Table', 2, '2023-09-24 07:47:21'),
(25, 'images/cv[7] copy.jpg', 'ex', 'Table', 2, '2023-09-04 19:45:06'),
(26, 'images/cv[7] copy.jpg', 'ex', 'Table', 2, '2023-09-04 19:45:05'),
(27, 'images/cv[7] copy.jpg', 'ex', 'Table', 2, '2023-09-04 19:45:03'),
(28, 'images/cv[7] copy.jpg', 'ex', 'Table', 2, '2023-09-04 19:44:59'),
(29, 'images/cv[7] copy.jpg', 'ggggg', 'Table', 2, '2023-09-04 19:44:58'),
(30, 'images/cv[7] copy.jpg', 'jffjhvn', 'Chair', 2, '2023-09-04 19:44:56'),
(31, 'images/66.png', 'ccccc', 'Dore', 0, '2023-09-04 18:09:44'),
(32, 'images/', 'aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaa', 'Window', 0, '2023-09-04 18:08:51'),
(33, 'images/Screenshot 2023-07-18 125020.png', 'hhhhhhh', 'Chair', 0, '2023-09-26 05:17:47'),
(34, 'images/Screenshot 2023-07-18 125020.png', 'hhhhhhh', 'Chair', 0, '2023-09-26 05:17:44'),
(35, 'images/Screenshot 2023-07-18 125020.png', 'hhhhhhh', 'Chair', 0, '2023-09-26 05:17:42'),
(36, 'images/Screenshot 2023-04-14 004347.png', 'hhhhhhh', 'Chair', 0, '2023-09-26 05:17:40'),
(37, 'images/Screenshot 2023-04-14 004347.png', 'hhhhhhh', 'Chair', 0, '2023-09-26 05:17:38'),
(38, 'images/Screenshot 2023-04-14 004347.png', 'hhhhhhh', 'Chair', 0, '2023-09-26 05:17:37'),
(39, 'images/logosymbol2.jpg', 'wwwwwwwwww', 'Chair', 0, '2023-09-26 05:17:35'),
(40, 'images/logosymbol2.jpg', 'wwwwwwwwww', 'Chair', 0, '2023-09-26 05:17:33'),
(41, 'images/chair 5.jpeg', 'Chair Design 04', 'Chair', 0, '2023-09-26 05:36:17'),
(42, 'images/Door4.png', 'Door Design 1', 'Dore', 1, '2023-09-30 17:33:46'),
(43, 'images/chair 03.jpeg', 'Chair Design 03', 'Chair', 2, '2023-09-26 05:36:26'),
(44, 'images/C.jpg', 'Chair Design 02', 'Chair', 0, '2023-09-26 05:36:29'),
(45, 'images/chair 01.jpg', 'Chair Design 01', 'Chair', 1, '2023-09-26 04:12:16'),
(46, 'images/table 01.jpg', 'Table Design 01', 'Chair', 1, '2023-09-26 18:22:45'),
(47, 'images/table 4.jpg', 'door12', 'Chair', 2, '2023-09-26 05:36:20'),
(48, 'images/chair 03.jpeg', 'chair 123', 'Chair', 0, '2023-09-30 17:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `User_image` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `con-password` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `Phone_no` int(11) NOT NULL,
  `updated_time` datetime NOT NULL,
  `Is_deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `User_image`, `name`, `Username`, `email`, `pwd`, `con-password`, `code`, `Phone_no`, `updated_time`, `Is_deleted`) VALUES
(1, 'images/123.png', 'Example user #1', 'user#1', 'user#1@gmail.com', '', '', '', 760000001, '2023-08-15 14:33:27', 1),
(2, 'images/123.png', 'Example user #2', 'user#2', 'user#2@gmail.com', '', '', '', 760000002, '2023-08-15 14:33:27', 1),
(3, 'images/123.png', 'Example user #3', 'user#3', 'user#3@gmail.com', '', '', '', 760000003, '2023-08-15 14:33:27', 1),
(4, 'images/123.png', 'Example user #4', 'user#4', 'user#4@gmail.com', '', '', '', 760000004, '2023-08-15 14:33:27', 1),
(5, 'images/123.png', 'Example user #5', 'user#5', 'user#5@gmail.com', '', '', '', 760000005, '2023-08-15 14:40:08', 1),
(6, 'images/123.png', 'Example user #6', 'user#6', 'user#6@gmail.com', '', '', '', 760000006, '2023-08-15 14:40:08', 1),
(7, 'images/123.png', 'Example user #7', 'user#7', 'user#7@gmail.com', '', '', '', 760000007, '2023-08-15 14:44:29', 1),
(8, 'images/123.png', 'Example user #8', 'user#8', 'user#8@gmail.com', '', '', '', 760000008, '2023-08-15 14:44:29', 1),
(9, 'images/123.png', 'Example user #9', 'user#9', 'user#9@gmail.com', '', '', '', 760000009, '2023-08-15 14:59:48', 1),
(10, 'images/123.png', 'Example user #10', 'user#10', 'user#10@gmail.com', '', '', '', 760000010, '2023-08-15 14:59:48', 1),
(11, 'images/123.png', 'Example user #11', 'user#11', 'user#11@gmail.com', '', '', '', 760000011, '2023-08-15 14:59:48', 1),
(12, 'images/123.png', 'Example user #12', 'user#12', 'user#12@gmail.com', '', '', '', 760000012, '2023-08-15 14:59:48', 1),
(13, 'images/123.png', 'Example user #13', 'user#13', 'user#13@gmail.com', '', '', '', 760000013, '2023-08-15 14:59:48', 1),
(14, 'images/123.png', 'Example user #14', 'user#14', 'user#14@gmail.com', '', '', '', 760000014, '2023-08-15 14:59:48', 1),
(15, 'images/123.png', 'Example user #15', 'user#15', 'user#15@gmail.com', '', '', '', 760000015, '2023-08-15 14:59:48', 1),
(16, 'images/123.png', 'Example user #16', 'user#16', 'user#16@gmail.com', '', '', '', 760000016, '2023-08-15 14:59:48', 1),
(17, 'images/123.png', 'Example user #17', 'user#17', 'user#17@gmail.com', '', '', '', 760000017, '2023-08-15 14:59:48', 0),
(18, 'images/123.png', 'Example user #18', 'user#18', 'user#18@gmail.com', '', '', '', 760000018, '2023-08-15 14:59:48', 1),
(19, 'images/123.png', 'Example user #19', 'user#19', 'user#19@gmail.com', '', '', '', 760000019, '2023-08-15 14:59:48', 1),
(20, 'images/123.png', 'Example user #20', 'user#20', 'user#20@gmail.com', '', '', '', 760000020, '2023-08-15 14:59:48', 1),
(21, 'images/123.png', 'Example user #21', 'user#21', 'user#21@gmail.com', '123abc', '', '', 760000021, '2023-08-15 14:59:48', 1),
(22, 'images/123.png', 'Example user #22', 'user#22', 'user#22@gmail.com', 'abcd123\r\n', '', '', 760000022, '2023-08-15 14:59:48', 1),
(23, 'images/123.png', 'Example user #23', 'user#23', 'user#23@gmail.com', 'abcd123', '', '', 760000023, '2023-08-15 14:59:48', 0),
(24, 'images/123.png', 'Example user #24', 'user#24', 'user#24@gmail.com', 'abcd123', '', '', 760000024, '2023-08-15 14:59:48', 1),
(26, '', 'admin', 'admin', 'admin@Email.com', 'admin123', '', '', 0, '2023-09-23 15:48:07', 3),
(27, '', 'testg', '', 'test123@gmail.com', 'abcd1478', 'abcd1478', '', 0, '0000-00-00 00:00:00', 1),
(28, '', 'gihan', '', 'gihan@email.com', 'abcdefg123', 'abcdefg123', '', 762548357, '0000-00-00 00:00:00', 1),
(29, '', 'gihan', 'gihan', 'gswmohotti@gmail.com', 'binara@123', 'gihan1234', 'B61DNAK9UI', 712356841, '2023-09-25 12:55:13', 1),
(30, '', 'abcd', '', 'abcd@gmail.com', 'abcd3698', 'abcd3698', '', 761235468, '0000-00-00 00:00:00', 1),
(31, '', 'binara', '', 'binara@gmail.com', 'aabb1234', 'aabb1234', '', 761234895, '0000-00-00 00:00:00', 0),
(32, '', 'test', '', 'test@gmail.com', '12345678', '12345678', '', 761737741, '0000-00-00 00:00:00', 1),
(33, '', 'heshan', '', 'heshan@gmail.com', 'abcd4567', 'abcd4567', '', 761245863, '0000-00-00 00:00:00', 1),
(34, '', 'test', '', 'test@gmail.com', '12345678', '12345678', '', 761737741, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wood`
--

CREATE TABLE `wood` (
  `Product_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `types` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wood`
--

INSERT INTO `wood` (`Product_id`, `type_id`, `types`, `is_deleted`) VALUES
(16, 1, 'Badidel', 1),
(16, 2, 'Halmilla', 1),
(16, 3, 'Jak', 1),
(16, 8, 'Palu', 1),
(16, 9, 'Buruta', 1),
(11, 3, 'Jak', 1),
(11, 7, 'Nedun', 1),
(11, 9, 'Buruta', 1),
(11, 11, 'Teak', 1),
(45, 2, 'Halmilla', 1),
(45, 3, 'Jak', 1),
(45, 9, 'Buruta', 1),
(45, 10, 'Suriya', 1),
(45, 11, 'Teak', 1),
(44, 3, 'Jak', 1),
(44, 7, 'Nedun', 1),
(44, 9, 'Buruta', 1),
(44, 11, 'Teak', 1),
(43, 2, 'Halmilla', 1),
(43, 3, 'Jak', 1),
(43, 9, 'Buruta', 1),
(43, 11, 'Teak', 1),
(41, 3, 'Jak', 1),
(41, 7, 'Nedun', 1),
(41, 9, 'Buruta', 1),
(41, 10, 'Suriya', 1),
(41, 11, 'Teak', 1),
(47, 1, 'Badidel', 1),
(47, 2, 'Halmilla', 1),
(47, 3, 'Jak', 1),
(47, 10, 'Suriya', 1),
(1, 2, 'Halmilla', 1),
(1, 3, 'Jak', 1),
(1, 9, 'Buruta', 1),
(1, 11, 'Teak', 1),
(8, 2, 'Halmilla', 1),
(8, 3, 'Jak', 1),
(8, 7, 'Nedun', 1),
(8, 10, 'Suriya', 1),
(8, 11, 'Teak', 1),
(46, 1, 'Badidel', 1),
(46, 2, 'Halmilla', 1),
(46, 3, 'Jak', 1),
(46, 4, 'Kohomba', 1),
(46, 5, 'Kumbuk', 1),
(12, 2, 'Halmilla', 1),
(12, 3, 'Jak', 1),
(12, 7, 'Nedun', 1),
(12, 9, 'Buruta', 1),
(12, 11, 'Teak', 1),
(13, 2, 'Halmilla', 1),
(13, 3, 'Jak', 1),
(13, 9, 'Buruta', 1),
(13, 10, 'Suriya', 1),
(13, 11, 'Teak', 1),
(5, 3, 'Jak', 1),
(5, 7, 'Nedun', 1),
(5, 9, 'Buruta', 1),
(5, 10, 'Suriya', 1),
(5, 11, 'Teak', 1),
(7, 3, 'Jak', 1),
(7, 7, 'Nedun', 1),
(7, 10, 'Suriya', 1),
(7, 11, 'Teak', 1),
(42, 1, 'Badidel', 1),
(42, 2, 'Halmilla', 1),
(42, 3, 'Jak', 1),
(42, 5, 'Kumbuk', 1),
(42, 11, 'Teak', 1),
(48, 1, 'Badidel', 1),
(48, 2, 'Halmilla', 1),
(48, 3, 'Jak', 1),
(48, 8, 'Palu', 1),
(48, 9, 'Buruta', 1),
(48, 10, 'Suriya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `woodtype`
--

CREATE TABLE `woodtype` (
  `Type_id` int(11) NOT NULL,
  `Wood_type` text NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `woodtype`
--

INSERT INTO `woodtype` (`Type_id`, `Wood_type`, `Price`) VALUES
(1, 'Badidel', 1000),
(2, 'Halmilla', 200),
(3, 'Jak', 105),
(4, 'Kohomba', 100),
(5, 'Kumbuk', 300),
(6, 'Mara', 250),
(7, 'Nedun', 150),
(8, 'Palu', 125),
(9, 'Buruta', 500),
(10, 'Suriya', 220),
(11, 'Teak', 190);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Product_id` (`Product_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `woodtype`
--
ALTER TABLE `woodtype`
  ADD PRIMARY KEY (`Type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `woodtype`
--
ALTER TABLE `woodtype`
  MODIFY `Type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
