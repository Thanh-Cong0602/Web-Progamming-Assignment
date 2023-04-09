-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 04:44 AM
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
  `user_id` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_name`, `price`, `quantity`, `image`) VALUES
(1, 'UvHhPrzKzI', 'Nhà giả kim', 100000, 1, 'https://medio.vn/wp-content/uploads/2017/11/265266-nha-gia-kim-tai-ban-05-2015.jpg'),
(2, '0Rk2uEgpJb', 'Nhà giả kim', 100000, 1, 'https://medio.vn/wp-content/uploads/2017/11/265266-nha-gia-kim-tai-ban-05-2015.jpg'),
(3, 'UvHhPrzKzI', 'Tuổi trẻ đáng giá bao nhiêu', 121000, 1, 'https://images.thuvienpdf.com/002/BUsRzLImN6.webp'),
(4, 'tbljO8qAlK', 'Tuổi trẻ đáng giá bao nhiêu', 121000, 1, 'https://images.thuvienpdf.com/002/BUsRzLImN6.webp'),
(5, 'tbljO8qAlK', 'Khéo ăn nói sẽ có được thiên hạ', 95000, 1, 'https://file.hstatic.net/1000237375/file/kheo-an-noi-900x900_617a5dffb3e3494f838aa767d5866669_grande'),
(6, 'tbljO8qAlK', 'Hành trình về phương Đông', 55000, 1, 'https://salt.tikicdn.com/cache/w1200/media/catalog/product/h/a/hanh_trinh_ve_phuong_dong_2.jpg'),
(11, 'tbljO8qAlK', 'Trí tuệ do thái', 111222, 1, 'https://temibook.com.vn/wp-content/uploads/2022/11/9.jpg'),
(12, 'tbljO8qAlK', 'Nhà giả kim', 100000, 1, 'https://medio.vn/wp-content/uploads/2017/11/265266-nha-gia-kim-tai-ban-05-2015.jpg'),
(26, 'U2PHm8hQj3', 'Nhà giả kim', 100000, 3, 'https://medio.vn/wp-content/uploads/2017/11/265266-nha-gia-kim-tai-ban-05-2015.jpg'),
(27, 'U2PHm8hQj3', 'Tuổi trẻ đáng giá bao nhiêu', 121000, 1, 'https://images.thuvienpdf.com/002/BUsRzLImN6.webp');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(0, 0, 'Thanh Cong Nguyen', '0847476547', 'thanhcongnguyen0602@gmail.com', 'cash on delivery', '79/25 Dinh Nup', ', Bố già (3) , Đắc nhân tâm (2) , Trí tuệ do thái (5) , Hành trình về phương Đông (4) ', 1676110, '07-Apr-2023', 'pending'),
(0, 0, 'Ngoc Linh', '0123127309', 'ngoclinh_1703@gmail.com', 'e-wallet', 'Ho Chi Minh', ', Không phải sói nhưng cũng đừng là cừu (1) , Trí tuệ do thái (3) , Khéo ăn nói sẽ có được thiên hạ (1) ', 749666, '07-Apr-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `author`, `price`, `image`) VALUES
(1, 'Nhà giả kim', '', 100000, 'https://medio.vn/wp-content/uploads/2017/11/265266-nha-gia-kim-tai-ban-05-2015.jpg'),
(2, 'Tuổi trẻ đáng giá bao nhiêu', '', 121000, 'https://images.thuvienpdf.com/002/BUsRzLImN6.webp'),
(3, 'Khéo ăn nói sẽ có được thiên hạ', '', 95000, 'https://lzd-img-global.slatic.net/g/p/da59103876cd0f1675ae9add24a29e2e.jpg_720x720q80.jpg_.webp'),
(4, 'Hành trình về phương Đông', '', 55000, 'https://salt.tikicdn.com/cache/w1200/media/catalog/product/h/a/hanh_trinh_ve_phuong_dong_2.jpg'),
(5, 'Không phải sói nhưng cũng đừng là cừu', '', 321000, 'https://temibook.com.vn/wp-content/uploads/2022/11/118.jpg'),
(6, 'Trí tuệ do thái', '', 111222, 'https://temibook.com.vn/wp-content/uploads/2022/11/9.jpg'),
(7, 'Đắc nhân tâm', '', 150000, 'https://s3-hcm-r1.longvan.net/truyenmp3/wp-content/uploads/2021/04/08150635/Dac-Nhan-Tam.jpg'),
(8, 'Hạt giống tâm hồn', '', 51000, 'https://cdn0.fahasa.com/media/catalog/product/i/m/image_225159.jpg'),
(9, 'Bố già', 'Mario Puzo', 200000, 'https://cdn0.fahasa.com/media/catalog/product/z/2/z2611575615164_9f60c133cfed1c7bb3f59b247f-600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` varchar(10) NOT NULL,
  `post_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `post_id`, `user_id`, `rating`, `title`, `description`, `date`) VALUES
('2h4vqU8YA9', '1', '0Rk2uEgpJb', '4', 'TCN ahuhu', 'Hay song la chinh minh', '2023-04-07'),
('KurXDFlVHA', '9', 'tbljO8qAlK', '5', 'Tuyet voi', 'Truyen nay hay lam &lt;33333', '2023-04-07');

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
  `user_type` varchar(100) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `phonenumber`, `password`, `user_type`, `image`) VALUES
('RIHIJafONk', 'Thanh Cong Nguyen', 'thanh_luon29', 'thanhcongnguyen0602@gmail.com', '0847476547', '$2y$10$hpPlEItu6bvl/.QywclYae9S3.qC7IT3ZP5lGzLptKXWvuWAmtNmK', 'user', 't1qu4Ht5vm.jpg'),
('UvHhPrzKzI', 'Thanh Cong Nguyen', 'cong.nguyen0602@hcmut.edu.vn', 'cong.nguyen0602@hcmut.edu.vn', '0847476547', '$2y$10$rQvScSRrrrrrlGaqkkZAYOrCTbunZN5GLOUkumKOgpxK7n5pGdcm2', 'user', '7suq9ZQ7QI.jpg'),
('0Rk2uEgpJb', 'Ha ma tau', 'thu_ha1209', 'thuha1209@gmail.com', '0847476547', '$2y$10$yRvFEt51DM3XxaSFzxI02e61euRJ78bxF3PsbLjRcW4tUN.diKh/m', 'user', 'wsyqqkEm8U.jpeg'),
('', 'test', '', 'test@gmail.com', '', '202cb962ac59075b964b07152d234b70', 'user', ''),
('tbljO8qAlK', 'Thanh Cong Nguyen', 'thanh_luon29', 'thanhcongnguyen060202@gmail.com', '0847476547', '$2y$10$JRs/5vMuE7owbn7eipQftus5ScFZfOHc/TnPy4mdNOElS8xUdvKCG', 'user', 'hV0wPQa1jQ.jpg'),
('U2PHm8hQj3', 'Ngoc Linh', 'ngoc_linh1703', 'ngoclinh1703@gmail.com', '0847476547', '$2y$10$Cj8crljO5EoUw7KFm6Wdcu/qMyg2xJh5/w2GnRejeuwROIgOiDHjy', 'user', 'TTX7XhmN86.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
