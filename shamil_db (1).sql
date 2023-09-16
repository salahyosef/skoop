-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 أغسطس 2023 الساعة 11:49
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shamil_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `accounts_tbl`
--

CREATE TABLE `accounts_tbl` (
  `id` int(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `isAdmin` tinyint(150) NOT NULL,
  `isActive` tinyint(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`id`, `login`, `password`, `isAdmin`, `isActive`) VALUES
(1, 'salah', 'salah', 0, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(150) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_image` varchar(150) NOT NULL,
  `creation_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `user_name`, `user_email`, `user_image`, `creation_date`) VALUES
(31, 'salah', 'salah.msemh@gamil.com', '75002-IMG-20211109-WA0017.jpg', '2023-08-22 11:53:31.989959'),
(34, 'salah', 'salah.msemh@gamil.com', '29926-9d0e125f-7e6a-4358-959c-338fe42a62be.jpeg', '2023-08-26 12:53:27.229947');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
