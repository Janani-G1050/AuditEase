-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 09:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `user_id`, `title`, `password`, `files`, `created_on`) VALUES
(1, '1', '2024 Tax', '123', 'ABSTRACT (1).pdf', '2024-11-22 10:38:38'),
(2, '1', '2024 Tax', '123', 'ABSTRACT (1).pdf', '2024-11-22 10:38:38'),
(3, '1', '2024 Tax', '123', 'ABSTRACT (1).pdf', '2024-11-22 10:38:38'),
(4, '1', 'tax', '123', 'ABSTRACT (1).pdf', '2024-11-22 10:38:38'),
(5, '1', 'tax', '4436', 'ABSTRACT (1).pdf', '2024-11-22 10:38:38'),
(6, '1', 'tax', '8637', 'CSA06 Design and Analysis of Algorithms - 246 Copies.pdf', '2024-11-22 10:38:11'),
(7, '1', 'janani', '9659', 'janani.pdf', '2024-11-23 04:09:40'),
(8, '1', 'jana', '1019', 'CAPSTONE 12.pptx', '2024-11-23 04:24:57'),
(9, '1', 'Salary Slip Overall 2024', '1964', '1000128184.pdf', '2024-11-23 05:06:20'),
(10, '1', 'Salary Slip Overall 2024', '9838', '1000128184.pdf', '2024-11-23 05:10:32'),
(11, '1', 'Salary Slip Overall 2024', '7022', '1000128184.pdf', '2024-11-23 05:11:32'),
(12, '1', 'Added last invoice for Inventory', '9085', 'janani.pdf', '2024-11-23 05:14:34'),
(13, '1', 'Added last invoice for Inventory', '3166', 'janani.pdf', '2024-11-23 05:15:01'),
(14, '1', 'hello', '2524', 'ABSTRACT (1) (1).pdf', '2024-11-25 07:58:57'),
(15, '1', 'hello', '3878', 'ABSTRACT (1) (1).pdf', '2024-11-25 07:59:08'),
(16, '1', 'hello', '1870', 'ABSTRACT (1) (1).pdf', '2024-11-25 07:59:18'),
(17, '1', 'janani', '1541', 'CAPSTONE 12.pptx', '2024-11-25 14:18:00'),
(18, '1', '2024 Finance Budget', '3474', 'CAPSTONE 12.pptx', '2024-11-26 10:24:48'),
(19, '1', '2025 Finance Budget', '8147', '1000128184.pdf', '2024-11-26 10:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`id`, `amount`, `category`, `date`, `purpose`, `user_id`) VALUES
(1, '200', 'education', '2024-11-15', 'fee', '1'),
(2, '600', 'house', '2024-11-15', 'wifi', '1'),
(3, '40000', 'income', '2024-11-22', 'rent', '1'),
(4, '10', 'salary', '2024-11-18', 'wifi', '1'),
(5, '100', 'tax', '2024-11-11', 'paid', '1'),
(6, '10', 'salary', '2024-11-18', 'wifi', '1'),
(7, '1', 'Income', '2024-11-18', 'got salary', '1'),
(8, '10', 'salary', '2024-11-18', 'salary given', '1'),
(9, '10', 'salary', '2024-11-18', 'salary given1', '1'),
(10, '10', 'Income', '2024-11-19', 'paid bill', '1'),
(11, '10', 'profits', '2024-11-19', 'profit', '1'),
(12, '12', 'Income', '2024-11-19', 'got', '1'),
(13, '10', 'salary', '2024-11-18', 'employee1', '1'),
(14, '10', 'salary', '2024-11-18', 'employee1', '1'),
(15, '20', 'salary', '2024-11-19', 'emp2', '1'),
(16, '10', 'salary', '2024-11-18', '1', '1'),
(17, '100', 'salary', '2024-11-18', 'sal', '1'),
(18, '10', 'loss', '2024-11-19', 'loss in mnc', '1'),
(19, '100', 'Others', '2024-11-20', 'other_expenses_manufacturing', '1'),
(20, '100', 'investment', '2024-11-19', 'inv', '1'),
(21, '10', 'investment', '2024-11-19', 'inv1', '1'),
(22, '12', 'investment', '2024-11-19', 'inv2', '1'),
(23, '2', 'investment', '2024-11-20', 'inv', '1'),
(24, '12', 'salary', '2024-11-20', 'salaryguven2', '1'),
(25, '20', 'salary', '2024-11-20', 's', '1'),
(26, '600', 'investment', '2024-11-20', 'inv', '1'),
(27, '100', 'Others', '2024-11-20', 'employee1', '1'),
(28, '100', 'Others', '2024-11-20', 'wifi', ''),
(29, '10', 'Others', '2024-11-28', 'wifi', ''),
(30, '230', 'salary', '2024-11-23', 'wifi', '1'),
(31, '100', 'Others', '2024-11-29', 'wifi1', '1'),
(32, '30', 'Income', '2024-11-27', 'employee5', '1'),
(33, '30', 'Income', '2024-11-27', 'edeeqw', '1'),
(34, '10', 'Income', '2024-11-27', '26719', '1'),
(35, '30000', 'Income', '2024-11-27', 'inv', '1'),
(36, '4000', 'investment', '2024-11-27', 'investment', '1'),
(37, '890', 'investment', '2024-11-26', 'inv', '1'),
(38, '20', 'Income', '2024-11-27', 'wwu', '1'),
(39, '300', 'tax', '2024-11-29', 'Rto office', '1'),
(40, '20', 'salary', '2024-11-26', 'yyyyy', '1'),
(41, '5000', 'Income', '2024-11-28', 'salary from janani', '1'),
(42, '10', 'investment', '2024-11-25', 'hello enna bhaa', '1'),
(43, '600', 'Total', '2024-11-28', 'inv2345', '1'),
(44, '1000', 'Income', '2024-11-30', 'hello', '1'),
(45, '500', 'Income', '2024-11-29', 'wait', '1');

-- --------------------------------------------------------

--
-- Table structure for table `expin`
--

CREATE TABLE `expin` (
  `id` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expin`
--

INSERT INTO `expin` (`id`, `amount`, `category`, `purpose`, `user_id`, `date`) VALUES
(1, '400', 'income', 'income collected', '2', '2024-11-28'),
(2, '800', 'houseexp', 'grocery', '2', '2024-11-29'),
(3, '10', 'Income', 'enna thambi', '1', '2024-12-01'),
(4, '30', 'Income', 'na sonna la', '1', '2024-11-26'),
(5, '10', 'Income', 'poppp', '1', '2024-11-28'),
(6, '10', 'Income', 'emp', '1', '2024-11-30'),
(7, '20', 'investment', 'save panniten ', '1', '2024-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('janani', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tax_rem`
--

CREATE TABLE `tax_rem` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax_rem`
--

INSERT INTO `tax_rem` (`id`, `amount`, `category`, `deadline`, `status`, `created_on`) VALUES
(6, '100', 'Tax', '2024-11-24', 'read', '2024-11-21 10:48:26'),
(7, '450000', 'bill_payment', '2024-11-24', 'read', '2024-11-22 08:38:29'),
(8, '700', 'loan_bill', '2024-11-28', 'read', '2024-11-26 16:19:05'),
(9, '800', 'tax_bill', '2024-11-27', 'read', '2024-11-26 16:19:58'),
(10, '200', 'tax_bill', '2024-11-28', 'read', '2024-11-27 04:21:48'),
(11, '20000', 'loan_bill', '2024-11-30', 'read', '2024-11-27 09:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `Company_Name` varchar(255) DEFAULT NULL,
  `count` varchar(255) DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `username`, `email`, `password`, `phone`, `usertype`, `Company_Name`, `count`, `Region`, `createdon`) VALUES
(1, 'jananig', 'jananigunasegaran6@gmail.com', '1', '8923782291', 'business', 'kj_designs', '12', 'TN1', '2024-11-27 08:42:28'),
(2, 'Aakash Ranga', 'ak@gmail.com', '123', '979878979', 'business', NULL, NULL, NULL, '2024-11-12 05:05:50'),
(3, 'janani g', 'ka@gmail.com', '123545', '233', 'individual', NULL, NULL, NULL, '2024-11-22 08:32:09'),
(6, 'JANANI G', 'vijiguna2001@gmail.com', '136474', '+918939141637', 'individual', NULL, NULL, NULL, '2024-11-15 04:05:20'),
(20, 'JANANI G', 'jananigunasegaran6@gmail.com', '123', '+918939141637', 'individual', NULL, NULL, NULL, '2024-11-15 04:16:41'),
(22, 'JANANI G', 'vijiguna2001@gmail.com', '123', '8939141637', 'individual', NULL, NULL, NULL, '2024-11-15 05:39:06'),
(23, 'JANANI G', 'vijiguna2001@gmail.com', '123', '1234', 'business', NULL, NULL, NULL, '2024-11-21 03:33:55'),
(24, 'JANANI G', 'jan@gmail.com', '123456', '8939141637', 'business', NULL, NULL, NULL, '2024-11-25 13:55:13'),
(26, 'JANANI G', 'jan@gmail.com', '123456', '8939141637', 'business', NULL, NULL, NULL, '2024-11-25 13:57:41'),
(27, 'JANANI G', 'jan@gmail.com', '123456', '8939141637', 'business', NULL, NULL, NULL, '2024-11-25 14:01:37'),
(28, 'JANANI G', 'jan@gmail.com', '123456', '8939141637', 'business', NULL, NULL, NULL, '2024-11-25 14:01:56'),
(29, 'JANANI GUNASEGARAN', 'jwjw@gmail.com', '0000', '123456', 'business', NULL, NULL, NULL, '2024-11-25 14:02:26'),
(30, 'JANANI G', 'vijiguna2001@gmail.com', '5678', '12', 'business', NULL, NULL, NULL, '2024-11-25 14:03:35'),
(31, 'JANANI G', 'vijiguna2001@gmail.com', '5678', '12', 'business', NULL, NULL, NULL, '2024-11-25 14:05:08'),
(32, 'JANANI G', 'vijiguna2001@gmail.com', '5678', '12', 'business', NULL, NULL, NULL, '2024-11-25 14:06:12'),
(33, 'JANANI G', 'gasi@gmail.com', '12345678', '8923782291', 'business', NULL, NULL, NULL, '2024-11-26 15:50:05'),
(34, 'JANANI G', 'gasi@gmail.com', '12345678', '8923782291', 'business', NULL, NULL, NULL, '2024-11-26 15:51:54'),
(35, 'JANANI G', 'gasi@gmail.com', '12345678', '8923782291', 'business', NULL, NULL, NULL, '2024-11-26 15:52:27'),
(36, 'JANANI G', 'jananigun@gmail.com', '1234', '773190981', 'business', NULL, NULL, NULL, '2024-11-27 03:13:19'),
(37, 'jana g', 'siswo@gmail.com', '23', '125', 'business', NULL, NULL, NULL, '2024-11-28 08:57:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expin`
--
ALTER TABLE `expin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_rem`
--
ALTER TABLE `tax_rem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `expin`
--
ALTER TABLE `expin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tax_rem`
--
ALTER TABLE `tax_rem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
