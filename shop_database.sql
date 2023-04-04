-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 04:47 PM
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
-- Database: `shop_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(0, 2, 'Nhà giả kim', 100000, 4, 'https://medio.vn/wp-content/uploads/2017/11/265266-nha-gia-kim-tai-ban-05-2015.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(200) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 'Nhà giả kim', 100000, 'https://medio.vn/wp-content/uploads/2017/11/265266-nha-gia-kim-tai-ban-05-2015.jpg', 'thanhcongnguyen0602@gmail.com', '', '', '', 0, '', 'pending'),
(2, 'Tuổi trẻ đáng giá bao nhiêu', 121000, 'https://images.thuvienpdf.com/002/BUsRzLImN6.webp', '', '', '', '', 0, '', 'pending'),
(3, 'Khéo ăn nói sẽ có được thiên hạ', 95000, 'https://file.hstatic.net/1000237375/file/kheo-an-noi-900x900_617a5dffb3e3494f838aa767d5866669_grande.png', '', '', '', '', 0, '', 'pending'),
(4, 'Hành trình về phương Đông', 55000, 'https://salt.tikicdn.com/cache/w1200/media/catalog/product/h/a/hanh_trinh_ve_phuong_dong_2.jpg', '', '', '', '', 0, '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(100) NOT NULL,
  `post_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `post_id`, `user_id`, `rating`, `title`, `description`, `date`) VALUES
(5, '1', 'QiXhDCOADM', '5', 'TCN ahuah', 'ahuahuha 5sao', '2023-04-04'),
(6, '1', 'M3PmILjELP', '3', 'Thanh Luon', 'S&aacute;ch hay qu&aacute; ahuahu', '2023-04-04'),
(7, '1', 'N0bzjkRdXQ', '5', 'TCN 1', '&Acirc;UHUHAUHAUHAUH&Acirc;U', '2023-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `phonenumber`, `password`, `user_type`) VALUES
('M3PmILjELP', 'Thanh Cong Nguyen', 'thanh_luon29', 'thanhcongnguyen0602@gmail.com', '0847476547', 'ba53cf3847fdf865dec29b7356cdf1ae', 'user'),
('QiXhDCOADM', 'Thanh Luon', 'thanh_luon29', 'cong.nguyen0602@hcmut.edu.vn', '0847476547', 'ba53cf3847fdf865dec29b7356cdf1ae', 'user'),
('N0bzjkRdXQ', 'Thanh Cong Nguyen', 'thanh_luon29', 'thanhcongnguyen06021@gmail.com', '0847476547', 'ba53cf3847fdf865dec29b7356cdf1ae', 'user'),
('lE5xTBQFtU', 'Thanh Cong Nguyen', 'cong.nguyen0602@hcmut.edu.vn', 'thanhcongnguyen060202@gmail.com', '0847476547', 'ba53cf3847fdf865dec29b7356cdf1ae', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
