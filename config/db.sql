-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 04:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `price_product` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `img_product` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `name_product`, `price_product`, `amount`, `img_product`, `id_user`) VALUES
(1, ' ส้ม', '15', '1', 'ดาวน์โหลด.jfif', 20),
(7, ' น้ำอ้อย', '15', '1', 'anime-sunset-marnuj7ndwap0r7r.jpg', 20),
(8, ' ส้ม', '15', '1', 'ดาวน์โหลด.jfif', 20),
(9, ' น้ำอ้อย', '15', '1', 'anime-sunset-marnuj7ndwap0r7r.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `product_shop`
--

CREATE TABLE `product_shop` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `price_product` varchar(50) NOT NULL,
  `img_product` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `id_shop` int(11) NOT NULL,
  `type_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_shop`
--

INSERT INTO `product_shop` (`id_product`, `name_product`, `price_product`, `img_product`, `amount`, `id_shop`, `type_product`) VALUES
(1, 'แตงโม', '15', 'g7.jpg', 0, 5, 2),
(2, 'ส้ม', '15', 'ดาวน์โหลด.jfif', 5, 5, 2),
(3, 'น้ำอ้อย', '15', 'anime-sunset-marnuj7ndwap0r7r.jpg', 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id_shop` int(11) NOT NULL,
  `email_shop` varchar(100) NOT NULL,
  `password_shop` varchar(100) NOT NULL,
  `name_shop` varchar(100) NOT NULL,
  `phone_shop` varchar(100) NOT NULL,
  `img_shop` varchar(100) NOT NULL,
  `status_shop` varchar(100) NOT NULL,
  `type_shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id_shop`, `email_shop`, `password_shop`, `name_shop`, `phone_shop`, `img_shop`, `status_shop`, `type_shop`) VALUES
(5, 'teerapatchuchuay4240@gmail.com', '123', 'kov', '34234', 'AAAABYTfjC7jBn4roleuR4IwFQNwegtAR-VEU_Ig0MxhNOY1_UKVAddHlhJEN961JNfDxt2xpJnrvzQTJHE7zwhYXIZnpkf7wOsk', '1', 1),
(19, 'terawep@gmail.com', '123', 'kov', '123', 'dis.jpg', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(50) NOT NULL,
  `img_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id_type`, `name_type`, `img_type`) VALUES
(1, 'ผัก', 'g6.jpg'),
(2, 'ผลไม้', 'g6.jpg'),
(3, 'สมุนไพร', 'g6.jpg'),
(4, 'พืชไร่', 'g7.jpg\r\n'),
(5, 'สินค้าแปรรูป', 'g7.jpg\r\n'),
(6, 'บริการ', 'g7.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `type_user`
--

CREATE TABLE `type_user` (
  `id_typeuser` int(11) NOT NULL,
  `nametype_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_user`
--

INSERT INTO `type_user` (`id_typeuser`, `nametype_user`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `fname_user` varchar(50) NOT NULL,
  `lname_user` varchar(50) NOT NULL,
  `address_user` varchar(50) NOT NULL,
  `phone_user` varchar(50) NOT NULL,
  `img_user` varchar(50) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  `type_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email_user`, `password_user`, `fname_user`, `lname_user`, `address_user`, `phone_user`, `img_user`, `status_user`, `type_user`) VALUES
(20, 'teerapat@gmail.com', '123', 'teerpat', '123', '123', '123', 'AAAABYTfjC7jBn4roleuR4IwFQNwegtAR-VEU_Ig0MxhNOY1_U', '2', 1),
(21, 'teerapat1@gmail.com', '123', 'teerpat', 'chuchuqy', '123', '123', 'unnamed.jpg', '1', 2),
(30, 'teerapat2@gmail.com', '123', 'teerpat', 'chuchuqy', '123', '123', 'AAAABYTfjC7jBn4roleuR4IwFQNwegtAR-VEU_Ig0MxhNOY1_U', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `product_shop`
--
ALTER TABLE `product_shop`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_shop` (`id_shop`,`type_product`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id_shop`),
  ADD KEY `type_shop` (`type_shop`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id_typeuser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `type_user` (`type_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_shop`
--
ALTER TABLE `product_shop`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_user`
--
ALTER TABLE `type_user`
  MODIFY `id_typeuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_shop`
--
ALTER TABLE `product_shop`
  ADD CONSTRAINT `product_shop_ibfk_1` FOREIGN KEY (`id_shop`) REFERENCES `shop` (`id_shop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`type_shop`) REFERENCES `type_shop` (`id_typeshop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_user`) REFERENCES `type_user` (`id_typeuser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
