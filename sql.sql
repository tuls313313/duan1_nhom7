-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2024 at 02:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL COMMENT 'pk',
  `user` varchar(50) NOT NULL COMMENT 'tên đăng nhập',
  `password` varchar(50) NOT NULL COMMENT 'mật khẩu',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `address` varchar(255) NOT NULL COMMENT 'địa chỉ',
  `tel` varchar(10) NOT NULL COMMENT 'sdt',
  `role` tinyint NOT NULL DEFAULT '0' COMMENT '0 là người dùng,1 là admin',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 là active 1 là locked',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tạo acc',
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user`, `password`, `email`, `address`, `tel`, `role`, `status`, `create_at`, `update_at`) VALUES
(15, 'dvprovn', '4444444', 'chome1@gmail.com', 'Lạng sơn', '0971810376', 0, 0, '2024-11-10 16:19:49', '2016-11-24 08:55:47'),
(23, 'tuntphe', 'gfhgngh', 'ntt3132004@gmail.com', 'LANG SON', '0971810376', 0, 0, '2024-11-16 10:18:16', '2024-11-16 13:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL COMMENT 'pk',
  `id_user` int NOT NULL COMMENT 'fk user',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 chưa mua,1 đã mua',
  `total_money` int NOT NULL COMMENT 'tổng giá',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tạo',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `status`, `total_money`, `created_at`, `updated_at`) VALUES
(2, 15, 0, 100, '2024-11-16 14:15:26', '2024-11-16 14:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id_detail` int NOT NULL COMMENT 'pk',
  `id_cart` int NOT NULL COMMENT 'fk cart',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `Quantity` int NOT NULL COMMENT 'số lượng',
  `money` decimal(10,2) NOT NULL COMMENT 'giá',
  `total_money` decimal(10,2) NOT NULL COMMENT 'tổng giá',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tạo',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id_detail`, `id_cart`, `id_pro`, `Quantity`, `money`, `total_money`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10, '100.00', '100.00', '2024-11-16 14:16:28', '2024-11-16 14:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL COMMENT 'id danh mục',
  `name` varchar(255) NOT NULL COMMENT 'tên',
  `status_categories` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hoạt động,1 là không hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status_categories`) VALUES
(1, 'Giày', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL COMMENT 'pk',
  `name` varchar(255) NOT NULL COMMENT 'tên màu',
  `status` tinyint DEFAULT '0' COMMENT '0 hoạt động , 1 không hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `status`) VALUES
(1, 'xanh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int NOT NULL COMMENT 'pk',
  `id_user` int NOT NULL COMMENT 'fk account',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `conten` text NOT NULL COMMENT 'nội dung',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 chờ duyệt,1 đã duyệt',
  `time_comment` timestamp NULL DEFAULT NULL COMMENT 'thời gian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_cmt`, `id_user`, `id_pro`, `conten`, `status`, `time_comment`) VALUES
(14, 15, 1, 'Tốt', 0, '2016-11-24 10:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL COMMENT 'pk',
  `user_id` int NOT NULL COMMENT 'fk user account',
  `id_promotion` int NOT NULL COMMENT 'fk promotion - khuyến mãi',
  `order_date` timestamp NOT NULL COMMENT 'ngày đặt hàng',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Tên người nhận',
  `tel` varchar(10) NOT NULL COMMENT 'sdt người nhận',
  `address` varchar(255) NOT NULL COMMENT 'địa chỉ người nhận',
  `status_order` tinyint NOT NULL DEFAULT '0' COMMENT '0 là đang chờ,1 đang giao,2 hoàn thành',
  `payment` tinyint NOT NULL DEFAULT '0' COMMENT '0 là thanh toán khi nhận hàng,1 là thanh toán online',
  `total_amount` int NOT NULL COMMENT 'tổng số lượng đơn hàng',
  `total_money` decimal(10,2) NOT NULL COMMENT 'tổng số tiền',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `user_id`, `id_promotion`, `order_date`, `name`, `tel`, `address`, `status_order`, `payment`, `total_amount`, `total_money`, `create_at`, `update_at`) VALUES
(3, 15, 1, '2024-11-16 09:51:19', '1', '0971810376', 'Lạng sơn', 0, 0, 1, '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL COMMENT 'pk',
  `order_id` int NOT NULL COMMENT 'fk order',
  `product_id` int NOT NULL COMMENT 'fk product',
  `quantity` int NOT NULL COMMENT 'số lượng',
  `price` decimal(10,2) NOT NULL COMMENT 'giá',
  `total_money` decimal(10,2) NOT NULL COMMENT 'tổng giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total_money`) VALUES
(1, 3, 1, 1, '10.00', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL COMMENT 'pk',
  `name` varchar(255) NOT NULL COMMENT 'tên',
  `price` decimal(10,2) NOT NULL COMMENT 'giá',
  `img` varchar(255) NOT NULL COMMENT 'hình ảnh',
  `description` text NOT NULL COMMENT 'mô tả',
  `id_categories` int NOT NULL COMMENT 'fk',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hoạt động,1 là không hoạt động',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img`, `description`, `id_categories`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sản phẩm 1', '10.00', 'img_sp1', 'sp_1', 1, 0, '0000-00-00 00:00:00', '2024-11-16 14:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int NOT NULL COMMENT 'pk',
  `code` varchar(255) NOT NULL COMMENT 'mã giảm giá',
  `start_date` datetime NOT NULL COMMENT 'bắt đầu',
  `end_date` datetime NOT NULL COMMENT 'kết thúc',
  `quantity` int NOT NULL COMMENT 'số lượng',
  `min_money` int NOT NULL COMMENT 'số tiền áp dụng',
  `discount_value` decimal(10,2) NOT NULL COMMENT 'giá trị',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hoạt động,1 là hết thời gian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `code`, `start_date`, `end_date`, `quantity`, `min_money`, `discount_value`, `status`) VALUES
(1, 'Km10d', '2024-11-16 09:50:48', '2024-11-16 09:50:48', 1, 100000, '10.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int NOT NULL COMMENT 'pk',
  `name` varchar(45) NOT NULL COMMENT 'tên màu vd x,m,l,xxl',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 hoạt động,1 không hoạt động '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `status`) VALUES
(1, 'x', 0);

-- --------------------------------------------------------

--
-- Table structure for table `varianti`
--

CREATE TABLE `varianti` (
  `id_var` int NOT NULL COMMENT 'pk',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `id_color` int NOT NULL COMMENT 'màu',
  `id_size` int NOT NULL COMMENT 'fk size',
  `price` int NOT NULL COMMENT 'giá',
  `quantity` int NOT NULL COMMENT 'só lượng',
  `img` varchar(255) NOT NULL COMMENT 'hình ảnh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `varianti`
--

INSERT INTO `varianti` (`id_var`, `id_pro`, `id_color`, `id_size`, `price`, `quantity`, `img`) VALUES
(2, 1, 1, 1, 10, 1, 'fgdfhj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_promotion` (`id_promotion`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categories` (`id_categories`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `varianti`
--
ALTER TABLE `varianti`
  ADD PRIMARY KEY (`id_var`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_size` (`id_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id danh mục', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `varianti`
--
ALTER TABLE `varianti`
  MODIFY `id_var` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id_order`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `varianti`
--
ALTER TABLE `varianti`
  ADD CONSTRAINT `varianti_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `varianti_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `varianti_ibfk_3` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;