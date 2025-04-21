-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 02:55 PM
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
-- Database: `user_managements`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `outstanding_payment` decimal(10,0) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `job_title`, `city`, `balance`, `outstanding_payment`, `role`) VALUES
(1, 'Tine', 'c20ad4d76fe97759aa27a0c99bff6710', 'Tine', 'tine@gmail.com', 'Scientist', 'Harare', 23, 0, 'user'),
(2, 'Taku', 'c20ad4d76fe97759aa27a0c99bff6710', 'Taku', 'taku@gamil.com', 'Lawyer', 'Chipinge', 23, 0, 'admin'),
(3, 'Tana', '$2y$10$EkyrtGqLmtflIQIbi6KYq.DUCC.bobgojEJyHI7sccQGjqtJ5fbLu', 'Tana', 'tana@gmail.com', 'Social worker', 'admin', 0, 12, ''),
(4, 'Kudzai', 'c20ad4d76fe97759aa27a0c99bff6710', 'Kudzai', 'kudzai@gmail.com', 'Engineer', 'Harare', 129, 0, 'admin'),
(5, 'Lisa', 'd41d8cd98f00b204e9800998ecf8427e', 'Lisa', 'lisa@gmail.com', 'Doctor', 'Harare', 0, 12330, 'user'),
(6, 'Ellen', 'c20ad4d76fe97759aa27a0c99bff6710', 'Ellen', 'elle@gmail.com', 'Pharmacist', 'Harare', 111, 0, 'admin'),
(7, 'Bee', 'c20ad4d76fe97759aa27a0c99bff6710', 'Bee', 'bee@gmail.com', 'Lawyer', 'Zaka', 0, 1234, 'user'),
(8, 'Juniour', 'c20ad4d76fe97759aa27a0c99bff6710', 'Junior', 'ju@gmail.com', 'Nurse', 'Harare', 0, 46464, 'user'),
(9, 'Sida', 'c20ad4d76fe97759aa27a0c99bff6710', 'Sida', 'sida@gmail.com', 'Accountant', 'Harare', 0, 54545, 'user'),
(10, 'Enock', 'c20ad4d76fe97759aa27a0c99bff6710', 'Enock', 'eno@gmail.com', 'Salesman', 'Harare', 0, 12, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
