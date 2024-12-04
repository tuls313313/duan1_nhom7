-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2024 at 11:48 AM
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
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user`, `password`, `email`, `address`, `tel`, `role`, `status`, `create_at`, `update_at`) VALUES
(1, 'user1', 'password1', 'user1@example.com', 'Address 1', '0123456789', 0, 0, '2024-11-18 14:23:49', '2024-11-26 13:58:47'),
(2, 'user2', 'password2', 'user2@example.com', 'Address 2', '0987654321', 0, 0, '2024-11-18 14:23:49', '2024-11-18 14:23:49'),
(3, 'admin', 'admin123', 'admin@example.com', 'Lạng sơn', '0971810376', 1, 0, '2024-11-18 14:23:49', '2024-11-27 15:42:38'),
(45, 'dvprovn', 'dvprovn', 'pcls313313@gmail.com', 'dvprovn', '1234567891', 0, 0, '2024-11-22 09:50:57', '2024-11-22 09:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL COMMENT 'pk',
  `id_user` int NOT NULL COMMENT 'fk user',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 chưa mua,1 đã mua',
  `total_money` decimal(10,2) NOT NULL COMMENT 'tổng giá',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tạo',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `status`, `total_money`, `created_at`, `updated_at`) VALUES
(150, 3, 1, '1080000.00', '2024-12-04 09:37:53', '2024-12-04 10:38:49'),
(151, 3, 1, '150000.00', '2024-12-04 09:38:11', '2024-12-04 10:38:49'),
(153, 3, 1, '200000.00', '2024-12-04 10:54:13', '2024-12-04 11:15:02'),
(154, 3, 1, '540000.00', '2024-12-04 11:03:55', '2024-12-04 11:15:02'),
(155, 3, 1, '100000.00', '2024-12-04 11:15:21', '2024-12-04 11:15:51'),
(156, 3, 1, '150000.00', '2024-12-04 11:15:29', '2024-12-04 11:15:51'),
(157, 3, 1, '100000.00', '2024-12-04 11:25:52', '2024-12-04 11:25:56'),
(158, 3, 1, '100000.00', '2024-12-04 11:26:04', '2024-12-04 11:26:09'),
(159, 3, 1, '200000.00', '2024-12-04 11:31:23', '2024-12-04 11:31:38'),
(160, 3, 1, '200000.00', '2024-12-04 11:38:02', '2024-12-04 11:38:10'),
(161, 3, 1, '540000.00', '2024-12-04 11:41:11', '2024-12-04 11:48:29'),
(162, 3, 1, '200000.00', '2024-12-04 11:48:23', '2024-12-04 11:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id_detail` int NOT NULL COMMENT 'pk',
  `id_cart` int NOT NULL COMMENT 'fk cart',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `id_color` int NOT NULL,
  `id_size` int NOT NULL,
  `Quantity` int NOT NULL COMMENT 'số lượng',
  `money` decimal(10,2) NOT NULL COMMENT 'giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id_detail`, `id_cart`, `id_pro`, `id_color`, `id_size`, `Quantity`, `money`) VALUES
(121, 150, 9, 1, 1, 2, '540000.00'),
(122, 151, 2, 3, 1, 1, '150000.00'),
(124, 153, 3, 2, 1, 2, '100000.00'),
(125, 154, 9, 2, 2, 1, '540000.00'),
(126, 155, 7, 1, 1, 1, '100000.00'),
(127, 156, 2, 1, 2, 1, '150000.00'),
(128, 157, 3, 2, 2, 1, '100000.00'),
(129, 158, 7, 1, 1, 1, '100000.00'),
(130, 159, 7, 1, 1, 2, '100000.00'),
(131, 160, 8, 2, 2, 1, '200000.00'),
(132, 161, 9, 2, 2, 1, '540000.00'),
(133, 162, 8, 2, 2, 1, '200000.00');

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
(1, 'Sneakers', 1),
(2, 'Formal Shoes', 1),
(3, 'Sandals', 1);

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
(1, 'Đen', 0),
(2, 'Trắng', 0),
(3, 'Đỏ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int NOT NULL COMMENT 'pk',
  `id_user` int NOT NULL COMMENT 'fk account',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `conten` text NOT NULL COMMENT 'nội dung',
  `rating` tinyint NOT NULL DEFAULT '5' COMMENT 'Giá trị đánh giá (1-5).',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 chờ duyệt,1 đã duyệt',
  `time_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'thời gian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_cmt`, `id_user`, `id_pro`, `conten`, `rating`, `status`, `time_comment`) VALUES
(1, 1, 1, 'Sản phẩm rất tốt!', 5, 1, '2024-11-18 14:27:18'),
(2, 2, 2, 'Hài lòng với sản phẩm.', 5, 1, '2024-11-18 14:27:18'),
(3, 3, 3, 'Chưa nhận được hàng.', 3, 1, '2024-11-18 14:27:18'),
(21, 2, 3, 'Công nhận 1122', 5, 1, '2024-11-27 11:08:10'),
(22, 45, 1, 'Công nhận 2222', 5, 1, '2024-11-27 11:08:35'),
(24, 3, 9, 'fghj', 5, 1, '2024-11-27 12:52:13'),
(25, 3, 9, 'okok', 3, 1, '2024-11-27 13:01:53'),
(27, 3, 8, 'gfhj', 5, 1, '2024-11-27 13:37:24'),
(29, 3, 8, 'fdghjm,mdfghjkljhgfdghjkl', 5, 1, '2024-11-27 13:45:10'),
(30, 3, 8, 'fdghjkjgfdghj', 5, 1, '2024-11-27 13:45:28'),
(45, 3, 7, 'fghjk', 5, 1, '2024-11-28 06:48:43'),
(46, 3, 8, 'abcgdtdh', 5, 1, '2024-11-30 10:19:57'),
(47, 3, 9, 'all all', 5, 0, '2024-12-01 11:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL COMMENT 'pk',
  `user_id` int NOT NULL COMMENT 'fk user account',
  `id_promotion` int DEFAULT NULL COMMENT 'fk promotion - khuyến mãi',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Tên người nhận',
  `tel` varchar(10) NOT NULL COMMENT 'sdt người nhận',
  `shipping_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'địa chỉ người nhận',
  `status_order` tinyint NOT NULL DEFAULT '1' COMMENT '1 là đang chờ,2 đang giao,3 hoàn thành,4 hủy đơn',
  `payment` tinyint NOT NULL DEFAULT '0' COMMENT '0 là thanh toán khi nhận hàng,1 là thanh toán online',
  `total_amount` int NOT NULL COMMENT 'tổng số lượng đơn hàng',
  `total_money` decimal(10,2) NOT NULL COMMENT 'tổng số tiền',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `user_id`, `id_promotion`, `name`, `tel`, `shipping_address`, `status_order`, `payment`, `total_amount`, `total_money`, `create_at`, `update_at`) VALUES
(359, 3, NULL, ' admin', '971810376', ' Lạng sơn', 1, 0, 1, '540000.00', '2024-12-04 11:48:12', '2024-12-04 11:48:12'),
(360, 3, NULL, 'admin', '971810376', 'Lạng sơn', 1, 0, 2, '740000.00', '2024-12-04 11:48:29', '2024-12-04 11:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL COMMENT 'pk',
  `order_id` int NOT NULL COMMENT 'fk order',
  `product_id` int DEFAULT NULL COMMENT 'fk product',
  `cart_id` int DEFAULT NULL COMMENT 'fk cart',
  `id_color` int DEFAULT NULL,
  `id_size` int DEFAULT NULL,
  `quantity` int DEFAULT NULL COMMENT 'số lượng',
  `price` decimal(10,2) DEFAULT NULL COMMENT 'giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `cart_id`, `id_color`, `id_size`, `quantity`, `price`) VALUES
(318, 359, 9, NULL, 1, 1, 1, '540000.00'),
(319, 360, 9, 161, 2, 2, 1, '540000.00'),
(320, 360, 8, 162, 2, 2, 1, '200000.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL COMMENT 'pk',
  `id_categories` int NOT NULL COMMENT 'fk categories',
  `name` varchar(255) NOT NULL COMMENT 'tên',
  `views` int DEFAULT '0' COMMENT 'views',
  `price` decimal(10,2) NOT NULL COMMENT 'giá',
  `img` varchar(255) NOT NULL COMMENT 'hình ảnh',
  `description` text NOT NULL COMMENT 'mô tả',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hoạt động,1 là không hoạt động',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_categories`, `name`, `views`, `price`, `img`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nike Air Max', 58, '200000.00', 'z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg', 'Nike Air Max – Biểu tượng của sự thoải mái và phong cách\r\nNike Air Max là dòng giày thể thao mang tính biểu tượng của Nike, nổi bật với công nghệ đệm khí Air Max Unit, mang lại cảm giác êm ái vượt trội và thiết kế thời thượng. Đây là một lựa chọn hoàn hảo cho cả hoạt động hàng ngày và các buổi luyện tập.\r\n\r\nChất liệu:\r\nThân giày: Làm từ vải dệt cao cấp hoặc da tổng hợp, giúp giày nhẹ, thoáng khí, và bền bỉ.\r\nĐế giữa: Công nghệ Air Max tích hợp túi khí lớn, tăng cường khả năng hấp thụ lực khi di chuyển.\r\nĐế ngoài: Cao su chống trơn trượt, giúp người dùng thoải mái trên mọi địa hình.\r\n\r\nThiết kế:\r\nKiểu dáng hiện đại, phối màu sắc độc đáo, phù hợp với nhiều phong cách khác nhau.\r\nLogo Nike Swoosh được in nổi bật ở hai bên, tạo điểm nhấn đặc trưng.\r\nCổ giày và lưỡi gà được đệm êm, mang lại sự thoải mái tối đa khi mang trong thời gian dài.\r\n\r\nCông nghệ:\r\nAir Max Unit: Túi khí lớn ở đế giữa mang lại sự êm ái và đàn hồi tuyệt vời, giảm tác động lên bàn chân khi vận động.\r\nHệ thống đệm tiên tiến hỗ trợ tốt cho các hoạt động thể thao như chạy bộ, đi bộ, hoặc tập gym.\r\n\r\nPhong cách ứng dụng:\r\nThể thao: Lý tưởng cho các buổi tập luyện nhờ khả năng hỗ trợ và độ bền.\r\nThời trang: Là món đồ không thể thiếu cho những ai yêu thích phong cách streetwear và phong cách năng động.\r\n\r\nMàu sắc:\r\nPhổ biến với các tông màu kinh điển như trắng, đen, xám, hoặc các phiên bản phối màu giới hạn.\r\n\r\nKết luận:\r\nNike Air Max không chỉ là một đôi giày thể thao, mà còn là biểu tượng của phong cách, sự đổi mới và công nghệ tiên tiến. Đây là lựa chọn hoàn hảo cho cả những người yêu thể thao và tín đồ thời trang.                                                                        ', 0, '2024-11-18 14:20:51', '2024-11-29 14:39:12'),
(2, 2, 'Clarks Leather Shoes', 329, '150000.00', 'z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg', 'Giày công sở da cao cấp', 0, '2024-11-18 14:20:51', '2024-12-04 11:15:26'),
(3, 3, 'Birkenstock Arizona', 369, '100000.00', 'z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg', 'Dép quai thoáng mát', 0, '2024-11-18 14:20:51', '2024-12-04 11:25:49'),
(7, 3, 'Birkenstock Arizona b', 156, '100000.00', 'z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg', 'Dép quai thoáng mát b', 0, '2024-11-26 02:35:30', '2024-12-04 11:31:21'),
(8, 1, 'Nike Air Max A', 241, '200000.00', 'z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg', 'Nike Air Max – Biểu tượng của sự thoải mái và phong cách\r\nNike Air Max là dòng giày thể thao mang tính biểu tượng của Nike, nổi bật với công nghệ đệm khí Air Max Unit, mang lại cảm giác êm ái vượt trội và thiết kế thời thượng. Đây là một lựa chọn hoàn hảo cho cả hoạt động hàng ngày và các buổi luyện tập.\r\n\r\nChất liệu:\r\nThân giày: Làm từ vải dệt cao cấp hoặc da tổng hợp, giúp giày nhẹ, thoáng khí, và bền bỉ.\r\nĐế giữa: Công nghệ Air Max tích hợp túi khí lớn, tăng cường khả năng hấp thụ lực khi di chuyển.\r\nĐế ngoài: Cao su chống trơn trượt, giúp người dùng thoải mái trên mọi địa hình.\r\n\r\nThiết kế:\r\nKiểu dáng hiện đại, phối màu sắc độc đáo, phù hợp với nhiều phong cách khác nhau.\r\nLogo Nike Swoosh được in nổi bật ở hai bên, tạo điểm nhấn đặc trưng.\r\nCổ giày và lưỡi gà được đệm êm, mang lại sự thoải mái tối đa khi mang trong thời gian dài.\r\n\r\nCông nghệ:\r\nAir Max Unit: Túi khí lớn ở đế giữa mang lại sự êm ái và đàn hồi tuyệt vời, giảm tác động lên bàn chân khi vận động.\r\nHệ thống đệm tiên tiến hỗ trợ tốt cho các hoạt động thể thao như chạy bộ, đi bộ, hoặc tập gym.\r\n\r\nPhong cách ứng dụng:\r\nThể thao: Lý tưởng cho các buổi tập luyện nhờ khả năng hỗ trợ và độ bền.\r\nThời trang: Là món đồ không thể thiếu cho những ai yêu thích phong cách streetwear và phong cách năng động.\r\n\r\nMàu sắc:\r\nPhổ biến với các tông màu kinh điển như trắng, đen, xám, hoặc các phiên bản phối màu giới hạn.\r\n\r\nKết luận:\r\nNike Air Max không chỉ là một đôi giày thể thao, mà còn là biểu tượng của phong cách, sự đổi mới và công nghệ tiên tiến. Đây là lựa chọn hoàn hảo cho cả những người yêu thể thao và tín đồ thời trang.                                                                                                ', 0, '2024-11-26 02:59:58', '2024-12-04 11:48:20'),
(9, 2, 'Oxford Elegance', 708, '540000.00', 'z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg', '        Oxford Elegance là một mẫu giày công sở cao cấp với thiết kế thanh lịch và tinh tế, mang lại sự sang trọng cho người sử dụng. \r\nDưới đây là mô tả chi tiết về sản phẩm này: \r\n\r\nChất liệu: Được làm từ da thật cao cấp, giày Oxford Elegance sở hữu một bề mặt bóng mịn và bền bỉ. Da có độ mềm mại và độ chắc chắn giúp giày luôn giữ được form dáng đẹp mắt.  \r\n\r\n-Thiết kế\r\nMũi giày: Mũi giày vuông nhẹ, tạo nên vẻ lịch lãm nhưng không kém phần thoải mái. Mặt trên: Thiết kế đơn giản với những đường chỉ khéo léo, không có quá nhiều chi tiết phức tạp nhưng vẫn rất nổi bật. \r\n\r\nCổ giày: Cổ giày được làm vừa vặn với chân, ôm sát mà không gây cảm giác khó chịu. Màu sắc: Chủ yếu có sẵn trong các màu sắc cổ điển như đen, nâu và nâu đậm. Những màu này dễ dàng kết hợp với nhiều trang phục khác nhau, từ bộ vest cho đến quần tây.  \r\n\r\nĐế giày: Đế giày được làm từ cao su chống trơn, giúp tăng cường độ bám và độ bền khi di chuyển trên các bề mặt khác nhau, đồng thời mang đến sự thoải mái khi sử dụng lâu dài.\r\n\r\nỨng dụng: Oxford Elegance là sự lựa chọn lý tưởng cho các sự kiện trang trọng, như đi làm, dự tiệc cưới, hay các cuộc họp quan trọng. Nó cũng là món đồ không thể thiếu trong tủ đồ của những quý ông yêu thích sự thanh lịch và chuyên nghiệp. \r\n \r\nGiày Oxford Elegance không chỉ mang đến sự thoải mái mà còn thể hiện được phong cách lịch lãm, khiến bạn luôn nổi bật trong mọi hoàn cảnh.                                                                                                                                                            ', 0, '2024-11-26 03:01:35', '2024-12-04 11:48:05');

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
  `min_money` decimal(10,2) NOT NULL COMMENT 'số tiền áp dụng',
  `discount_value` decimal(5,2) NOT NULL COMMENT 'giá trị',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hoạt động,1 là hết thời gian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `code`, `start_date`, `end_date`, `quantity`, `min_money`, `discount_value`, `status`) VALUES
(24, 'nhom7S1', '2024-12-02 18:25:00', '2024-12-02 18:25:00', 10, '100000.00', '10.00', 0);

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
(1, '38', 0),
(2, '39', 0),
(3, '40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `id_order` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 chưa thanh toán 1 đã thanh toán',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_order`, `status`, `create_at`, `update_at`) VALUES
(149, 359, 0, '2024-12-04 11:48:12', '2024-12-04 11:48:12'),
(150, 360, 0, '2024-12-04 11:48:29', '2024-12-04 11:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `varianti`
--

CREATE TABLE `varianti` (
  `id_var` int NOT NULL COMMENT 'pk',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `id_color` int NOT NULL COMMENT 'màu',
  `id_size` int NOT NULL COMMENT 'fk size',
  `quantity` int NOT NULL COMMENT 'só lượng',
  `img` varchar(255) NOT NULL COMMENT 'hình ảnh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `varianti`
--

INSERT INTO `varianti` (`id_var`, `id_pro`, `id_color`, `id_size`, `quantity`, `img`) VALUES
(12, 1, 2, 2, 10, 'z6078897737249_5428a1cdaed793746f817a953d88570c.jpg'),
(15, 1, 1, 2, 10, 'z6078897737249_5428a1cdaed793746f817a953d88570c.jpg'),
(16, 2, 1, 1, 11, 'z6078897737249_5428a1cdaed793746f817a953d88570c.jpg'),
(17, 2, 2, 2, 12, 'z6078897737249_5428a1cdaed793746f817a953d88570c.jpg'),
(18, 3, 2, 1, 10, 'z6078897737249_5428a1cdaed793746f817a953d88570c.jpg'),
(19, 3, 2, 2, 10, 'z6078897737249_5428a1cdaed793746f817a953d88570c.jpg'),
(20, 9, 1, 1, 10, 'z6078897737249_5428a1cdaed793746f817a953d88570c.jpg'),
(21, 9, 2, 2, 10, 'z6078897737249_5428a1cdaed793746f817a953d88570c.jpg'),
(22, 7, 1, 1, 1, 'giày.jpg'),
(23, 8, 2, 2, 1, 'giày.jpg'),
(26, 2, 1, 2, 10, 'z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg'),
(27, 2, 3, 1, 30, 'z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg');

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
  ADD KEY `name` (`name`),
  ADD KEY `id_categories` (`id_categories`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id danh mục', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `varianti`
--
ALTER TABLE `varianti`
  MODIFY `id_var` int NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=28;

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
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
