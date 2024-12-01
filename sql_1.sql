
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

CREATE TABLE `cart` (
  `id_cart` int NOT NULL COMMENT 'pk',
  `id_user` int NOT NULL COMMENT 'fk user',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 chưa mua,1 đã mua',
  `total_money` decimal(10,2) NOT NULL COMMENT 'tổng giá',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tạo',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `cart_details` (
  `id_detail` int NOT NULL COMMENT 'pk',
  `id_cart` int NOT NULL COMMENT 'fk cart',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `id_color` int NOT NULL,
  `id_size` int NOT NULL,
  `Quantity` int NOT NULL COMMENT 'số lượng',
  `money` decimal(10,2) NOT NULL COMMENT 'giá',
  `total_money` decimal(10,2) NOT NULL COMMENT 'tổng giá',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tạo',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `categories` (
  `id` int NOT NULL COMMENT 'id danh mục',
  `name` varchar(255) NOT NULL COMMENT 'tên',
  `status_categories` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hoạt động,1 là không hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `color` (
  `id` int NOT NULL COMMENT 'pk',
  `name` varchar(255) NOT NULL COMMENT 'tên màu',
  `status` tinyint DEFAULT '0' COMMENT '0 hoạt động , 1 không hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `comment` (
  `id_cmt` int NOT NULL COMMENT 'pk',
  `id_user` int NOT NULL COMMENT 'fk account',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `conten` text NOT NULL COMMENT 'nội dung',
  `rating` tinyint NOT NULL DEFAULT '5' COMMENT 'Giá trị đánh giá (1-5).',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 chờ duyệt,1 đã duyệt',
  `time_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'thời gian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


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

CREATE TABLE `order_items` (
  `id` int NOT NULL COMMENT 'pk',
  `order_id` int NOT NULL COMMENT 'fk order',
  `product_id` int NOT NULL COMMENT 'fk product',
  `id_color` int NOT NULL,
  `id_size` int NOT NULL,
  `quantity` int NOT NULL COMMENT 'số lượng',
  `price` decimal(10,2) NOT NULL COMMENT 'giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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


CREATE TABLE `size` (
  `id` int NOT NULL COMMENT 'pk',
  `name` varchar(45) NOT NULL COMMENT 'tên màu vd x,m,l,xxl',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 hoạt động,1 không hoạt động '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `id_order` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 chưa thanh toán 1 đã thanh toán',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `varianti` (
  `id_var` int NOT NULL COMMENT 'pk',
  `id_pro` int NOT NULL COMMENT 'fk product',
  `id_color` int NOT NULL COMMENT 'màu',
  `id_size` int NOT NULL COMMENT 'fk size',
  `price` int NOT NULL COMMENT 'giá',
  `quantity` int NOT NULL COMMENT 'só lượng',
  `img` varchar(255) NOT NULL COMMENT 'hình ảnh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
