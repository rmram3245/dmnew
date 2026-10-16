-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2025 at 01:44 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreadyst_dmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `regular_price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percent` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `regular_price`, `final_price`, `discount_percent`, `image_url`, `rating`, `ratings_count`) VALUES
(1, 'Dmart Offer today online: Buy 20kg ashirwad atta+1 kg Besan + 5 kg sugar + 5 kg mustard oil', 'Dmart Offer today online: Buy 20kg ashirwad atta+1 kg Besan + 5 kg sugar + 5 kg mustard oil', '1099', '499', '55', 'https://dashind.com.tr/cdn/1720600667.jpg', '5', 2165),
(3, 'Dmart Offer today online: Get Combo of 1kg Kaju and 1 kg Badam', 'Dmart Offer today online: Get Combo of 1kg Kaju and 1 kg Badam', '899', '299', '67', 'https://dashind.com.tr/cdn/1720600784.jpg', '5', 956),
(4, 'Dmart Offer Today 9 Combo packs \' 10 kg Ashirwaad atta , 5 kg india gate basmati rice , fortune oil 5 L , Surf Excel 5 kg and more 5Kg', 'Dmart Offer Today 9 Combo packs \' 10 kg Ashirwaad atta , 5 kg india gate basmati rice , fortune oil 5 L , Surf Excel 5 kg and more 5Kg', '2478', '699', '72', 'https://dashind.com.tr/cdn/1720600900.jpg', '5', 654),
(5, 'May Offer - Get 4Kg Dry Fruit Mix Combo', 'May Offer - Get 4Kg Dry Fruit Mix Combo', '999', '399', '60', 'https://dashind.com.tr/cdn/1720600938.jpeg', '5', 1714),
(6, 'Dmart Offer Today 9 Combo packs \' 10 kg Ashirwaad atta , 5 kg india gate basmati rice , fortune oil 5 L , Surf Excel 5 kg and more 5Kg', 'Dmart Offer Today 9 Combo packs \' 10 kg Ashirwaad atta , 5 kg india gate basmati rice , fortune oil 5 L , Surf Excel 5 kg and more 5Kg', '2478', '699', '72', 'https://dashind.com.tr/cdn/1722696423.jpg', '4', 4877),
(7, 'Dmart Offer Today 9 Combo packs \' 10 kg Ashirwaad atta , 5 kg india gate basmati rice , fortune oil 5 L , Surf Excel 5 kg and more 5Kg', 'Dmart Offer Today 9 Combo packs \' 10 kg Ashirwaad atta , 5 kg india gate basmati rice , fortune oil 5 L , Surf Excel 5 kg and more 5Kg', '3999', '369', '91', 'https://dashind.com.tr/cdn/1722700076.jpg', '5', 8366),
(9, '4 combo pack\' india basmati 10kg \'tata agni 500g ashirwaad atta 10kg fortune sugar 5kg', '4 combo pack\' india basmati 10kg \'tata agni 500g ashirwaad atta 10kg fortune sugar 5kg', '2789', '595', '79', 'https://dashind.com.tr/cdn/1722700182.jpg', '5', 3681),
(11, 'Aashirvaad Atta 5kg, India gate basmati rice 5kg, Fortune Suger 5kg, Lipton 1kg TATA Agni 1Kg, Super Sarvottam Refined Rice Bran Oil 1L', 'Aashirvaad Atta 5kg, India gate basmati rice 5kg, Fortune Suger 5kg, Lipton 1kg TATA Agni 1Kg, Super Sarvottam Refined Rice Bran Oil 1L', '3999', '369', '91', 'https://dashind.com.tr/cdn/1722700324.jpg', '3', 6756),
(12, 'Dmart Offer today: Combo of 5 kg Fortune oil+ 5 kg sugar+ 5 kg Basmati rice', 'Dmart Offer today: Combo of 5 kg Fortune oil+ 5 kg sugar+ 5 kg Basmati rice', '999', '298', '70', 'https://dashind.com.tr/cdn/1722700435.jpg', '5', 8742),
(14, 'Dmart Offer today online: Get Combo of 5 liter Fortune Oil and 5 Litre Mustard Oil', 'Dmart Offer today online: Get Combo of 5 liter Fortune Oil and 5 Litre Mustard Oil', '1286', '399', '69', 'https://dashind.com.tr/cdn/1722700753.png', '5', 1483),
(15, 'Dmart Offer today online: Buy 20kg ashirwad atta+1 kg Besan + 5 kg sugar + 5 kg mustard oil', 'Dmart Offer today online: Buy 20kg ashirwad atta+1 kg Besan + 5 kg sugar + 5 kg mustard oil', '1099', '499', '55', 'https://dashind.com.tr/cdn/1722700896.jpg', '3', 4522),
(16, 'Dmart Offer today online: Get Combo of 1kg Kaju and 1 kg Badam', 'Dmart Offer today online: Get Combo of 1kg Kaju and 1 kg Badam', '1988', '199', '90', 'https://dashind.com.tr/cdn/1722700947.jpg', '5', 11537),
(17, 'Dmart Offer today online: Get Basmati Rice 5kg+ Fortune Oil 5L', 'Dmart Offer today online: Get Basmati Rice 5kg+ Fortune Oil 5L', '996', '299', '75', 'https://dashind.com.tr/assets/uploads/299.jpg', '4', 9614),
(18, 'Dmart Offer today: Combo of 10 kg Surf Excel + 1 Liter Comforter', 'Dmart Offer today: Combo of 10 kg Surf Excel + 1 Liter Comforter', '699', '399', '43', 'https://dashind.com.tr/cdn/1722701099.jpg', '4', 6371),
(19, 'Dmart Offer today online: Get 1 KG Dry and 12 Packet Gravy Cat Food Combo Offer', 'Dmart Offer today online: Get 1 KG Dry and 12 Packet Gravy Cat Food Combo Offer', '2589', '299', '88', 'https://dashind.com.tr/cdn/1722701187.jpg', '4', 4325),
(20, 'Dmart Offer today: Combo of 5 kg Fortune oil+ 5 kg sugar+ 5 kg Basmati rice', 'Dmart Offer today: Combo of 5 kg Fortune oil+ 5 kg sugar+ 5 kg Basmati rice', '999', '298', '70', 'https://dashind.com.tr/cdn/1723143388.png', '5', 6778),
(21, 'Dmart Offer Today: 5 kg India Gate Basmati Rice + 5 L Fortune Kachi Ghani Mustard Oil + 5 kg Sugar + 1 kg Amul Pure Ghee', 'Dmart Offer Today: 5 kg India Gate Basmati Rice + 5 L Fortune Kachi Ghani Mustard Oil + 5 kg Sugar + 1 kg Amul Pure Ghee', '2526', '499', '80', 'https://dashind.com.tr/admin/uploads/1755238598_मात्र_20250815_091712_0000_page-0001.jpg', '4.2', 912),
(22, 'Dmart Mega Offer: 5 kg India Gate Basmati Rice + 5 L Fortune Sunlite Refined Oil + 5 L Fortune Kachi Ghani Mustard Oil + 5 kg Surf Excel Easy Wash', 'Dmart Mega Offer: 5 kg India Gate Basmati Rice + 5 L Fortune Sunlite Refined Oil + 5 L Fortune Kachi Ghani Mustard Oil + 5 kg Surf Excel Easy Wash', '2999', '499', '83', 'https://dashind.com.tr/admin/uploads/1755238727_मात्र_20250815_091712_0000_page-0002.jpg', '4.4', 865),
(23, 'Dmart Limited Time Offer: 5 kg India Gate Basmati Rice + 5 L Fortune Sunlite Refined Oil + 5 L Fortune Kachi Ghani Mustard Oil', 'Dmart Limited Time Offer: 5 kg India Gate Basmati Rice + 5 L Fortune Sunlite Refined Oil + 5 L Fortune Kachi Ghani Mustard Oil', '2484', '499', '80', 'https://dashind.com.tr/admin/uploads/1755238795_मात्र_20250815_091712_0000_page-0003.jpg', '4.2', 1126);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
