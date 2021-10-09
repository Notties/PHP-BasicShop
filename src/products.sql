-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 02:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(255) NOT NULL COMMENT 'รหัสสินค้า',
  `ProductName` text NOT NULL COMMENT 'ชื่อสินค้า',
  `Picture` text DEFAULT NULL COMMENT 'รูปภาพสินค้า',
  `Category` text NOT NULL COMMENT 'ประเภทสินค้า',
  `ProductDescription` text NOT NULL COMMENT 'รายละเอียดสินค้า',
  `Price` int(4) NOT NULL COMMENT 'ราคาสินค้า',
  `QuantityStock` int(3) NOT NULL COMMENT 'จำนวนสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Picture`, `Category`, `ProductDescription`, `Price`, `QuantityStock`) VALUES
(1, 'LIFX', 'https://www.muzzley.com/uploads/devices/main_56001ea6215708f9755113ed.png', 'Lighting', 'The brightest, most efficient Wi-Fi LED light bulb.', 150, 48),
(2, 'Amazone Echo', 'https://www.muzzley.com/uploads/devices/main_56f44bc87570537d86229100.png', 'Voice', 'Use your voice to control your Muzzley devices.\r\n', 151, 102),
(3, 'Nest Learning Thermostat', 'https://sm.pcmag.com/t/pcmag_ap/gallery/n/nest-learn/nest-learning-thermostat-3rd-generation_dp4u.1920.jpg', 'Thermostats', 'Set the perfect temperature and save money while you\'re away.', 152, 77),
(4, 'Nest Protect: Smoke + Carbon Monoxident', 'https://www.muzzley.com/uploads/devices/main_56097e0b6cab5e733821638e.jpg', 'Detectors & Sensors', 'It speaks up to tell you if there\'s smoke or CO and tells you where the problem is so you know what to do.\r\n', 168, 145),
(5, 'ecobee3', 'https://www.muzzley.com/uploads/devices/main_5605eade6cab5e733821637b.png', 'Thermostats', 'ecobee3 is an Apple HomeKit enabled smart thermostat with wireless remote sensors.', 169, 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(255) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
