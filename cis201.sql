-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2023 at 11:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cis201`
--

-- --------------------------------------------------------

--
-- Table structure for table `std_table`
--

CREATE TABLE `std_table` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` int(100) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `std_table`
--

INSERT INTO `std_table` (`id`, `fname`, `lname`, `age`, `Status`) VALUES
(1, 'Ville Joe', 'Catig', 20, ''),
(2, 'Lee', 'Goner', 20, ''),
(3, 'Jacob', 'Malis', 20, ''),
(4, 'Franklin', 'Donovan', 23, ''),
(5, 'Ashley', 'Friga', 20, ''),
(6, 'Cristellie', 'Roblo', 20, ''),
(7, 'Kyle', 'Lim', 23, ''),
(8, 'John Paul', 'Pitogo', 23, ''),
(9, 'Francis', 'Adriano', 24, ''),
(10, 'Aj', 'Pingol', 20, ''),
(11, 'Kris', 'Rock', 30, ''),
(12, 'Jeck jeck', 'Pingol', 20, ''),
(13, 'Ashtra', 'Remi', 30, ''),
(14, 'Ellie', 'Morgan', 25, ''),
(15, 'Jake', 'Austria', 23, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `std_table`
--
ALTER TABLE `std_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `std_table`
--
ALTER TABLE `std_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
