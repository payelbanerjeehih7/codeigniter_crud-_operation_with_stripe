-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 23, 2023 at 10:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payelci`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `registrationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `email`, `age`, `password`, `phone`, `registrationdate`) VALUES
(1, 'payel banerjee', 'payel@gmail.com', 18, '12345', 9876543210, '2023-11-21'),
(2, 'abc', 'p2@gmail.com', 21, '1234', 1234554321, '2023-11-22'),
(3, 'red', 'p3@gmail.com', 35, '1234', 1234567898, '2023-11-21'),
(4, 'payel4', 'p4@gmail.com', 11, '1234', 1234432156, '2023-11-24'),
(5, 'payel5', 'p5@gmail.com', 16, '1234', 1234567890, '2023-11-23'),
(33, 'payel banerjee', 'payel@gmail.com', 18, '12345', 9876543210, '2023-11-21'),
(34, 'red', 'p3@gmail.com', 35, '1234', 1234567898, '2023-11-21'),
(35, 'ad', 'admin@gmail.com', 0, '1234', 1234567890, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
