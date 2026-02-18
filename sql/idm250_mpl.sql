-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 18, 2026 at 03:25 PM
-- Server version: 8.0.44
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rem357_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `idm250_mpl`
--

CREATE TABLE `idm250_mpl` (
  `id` int NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `trailer_number` varchar(50) NOT NULL,
  `expected_arrival_date` date NOT NULL,
  `status` enum('draft','sent','confirmed') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `idm250_mpl_items`
--

CREATE TABLE `idm250_mpl_items` (
  `id` int NOT NULL,
  `mpl_id` int NOT NULL,
  `inventory_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idm250_mpl`
--
ALTER TABLE `idm250_mpl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idm250_mpl_items`
--
ALTER TABLE `idm250_mpl_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mpl_id` (`mpl_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idm250_mpl`
--
ALTER TABLE `idm250_mpl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idm250_mpl_items`
--
ALTER TABLE `idm250_mpl_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `idm250_mpl_items`
--
ALTER TABLE `idm250_mpl_items`
  ADD CONSTRAINT `idm250_mpl_items_ibfk_1` FOREIGN KEY (`mpl_id`) REFERENCES `idm250_mpl` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idm250_mpl_items_ibfk_2` FOREIGN KEY (`inventory_id`) REFERENCES `idm250_inventory` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
