-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2022 lúc 08:40 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'Mã loại hàng',
  `title_category` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Tên loại hàng',
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'miêu tả',
  `id_category_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title_category`, `description`, `id_category_type`) VALUES
(2, 'áo polo ', 'Chất liệu vải cá sấu Cotton xuất xịn, chuẩn form cao cấp không xù lông, bề mặt vải mượt và bóng, thoáng mát, mang vận động vẫn thích hợp. ', 1),
(11, 'áo sơ mi', 'Chất liệu vải cá sấu Cotton xuất xịn, chuẩn form cao cấp không xù lông, bề mặt vải mượt và bóng, thoáng mát, mang vận động vẫn thích hợp. ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_type`
--

CREATE TABLE `category_type` (
  `id` int(11) NOT NULL COMMENT 'mã loại danh mục',
  `type` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'tên thể loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category_type`
--

INSERT INTO `category_type` (`id`, `type`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'All');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL COMMENT 'Mã bình luận',
  `comment_content` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Nội dung bình luận',
  `idItem` int(11) NOT NULL COMMENT 'Mã hàng hóa được bình luận',
  `idPerson` int(11) NOT NULL COMMENT 'Mã người bình luận',
  `timeComment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `comment_content`, `idItem`, `idPerson`, `timeComment`) VALUES
(26, 'haha', 34, 1, '2022-11-20 12:37:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL COMMENT 'Mã đăng nhập',
  `name_customer` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Họ và tên',
  `passWord` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Mật khẩu',
  `email` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Địa chỉ email',
  `address` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Địa chỉ',
  `phone_number` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'số điện thoại',
  `picture` varchar(250) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL COMMENT 'Tên hình ảnh',
  `active` bit(1) DEFAULT b'0' COMMENT 'Trạng thái kích hoạt',
  `role` int(1) NOT NULL COMMENT 'Vai trò'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name_customer`, `passWord`, `email`, `address`, `phone_number`, `picture`, `active`, `role`) VALUES
(1, 'admin', '123456', 'admin@fpt.edu.vn', '666 HELL', '0101010101', 'woman2.PNG', b'0', 1),
(2, 'đặng tiến hưng', '123456', 'hungdtph23624@fpt.edu.vn', '666 HELL', '0101010101', NULL, b'0', 2),
(3, 'người dùng 1', '123456', 'nguoidung@gmail.com', '666 HELL', '0101010101', NULL, b'0', 3),
(20, 'Nguyễn Quang Đăng2', '123456', 'mrbat92205@gmail.com', '666 HELL', '0101010101', NULL, b'0', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'mã đơn hàng',
  `id_customer` int(11) NOT NULL COMMENT 'mã người dùng\r\n',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày đặt đơn',
  `total` int(11) NOT NULL COMMENT 'tổng tiền của hóa đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_customer`, `order_date`, `total`) VALUES
(2, 1, '2022-11-21 19:02:38', 130),
(3, 1, '2022-11-21 19:04:44', 85);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'id chi tiết hóa đơn',
  `id_order` int(11) NOT NULL COMMENT 'id hóa đơn',
  `name_product` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'tên sản phẩm',
  `picture` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'ảnh sản phẩm',
  `price` float NOT NULL COMMENT 'giá sản phẩm',
  `quantity` int(11) NOT NULL COMMENT 'số lượng đặt ',
  `total` int(11) NOT NULL COMMENT 'tổng tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `name_product`, `picture`, `price`, `quantity`, `total`) VALUES
(1, 2, 'Set quần áo mùa hè', '1664641179.webp', 45, 2, 90),
(2, 2, 'Blue Hoodie ShirtCopy', 'Cool.jpg', 40, 1, 40),
(3, 3, 'Set quần áo mùa hè', '1664641179.webp', 45, 1, 45),
(4, 3, 'Blue Hoodie ShirtCopy', 'Cool.jpg', 40, 1, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL COMMENT 'Mã hàng hóa',
  `name` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Tên hàng hóa',
  `price` float NOT NULL COMMENT 'Đơn giá',
  `saleOff` float NOT NULL COMMENT 'Mức giảm giá',
  `picture` varchar(256) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Hình ảnh',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày nhập hàng',
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Mô tả hàng hóa',
  `quantity` int(11) NOT NULL COMMENT 'Số lượng sản phẩm',
  `view_number` int(11) NOT NULL COMMENT 'Số lượt xem',
  `id_category` int(11) NOT NULL COMMENT 'Mã loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `saleOff`, `picture`, `date_added`, `description`, `quantity`, `view_number`, `id_category`) VALUES
(10, 'Set quần áo mùa hè', 450, 10, '1664641179.webp', '2022-11-21 19:04:44', 'Thiết kế mới mẻ, đơn giản nhưng cá tính, chất liệu thoáng mát, mềm mịn', 7, 77, 11),
(34, 'Blue Hoodie ShirtCopy', 200, 20, 'Cool.jpg', '2022-11-21 19:04:44', 'Thiết kế độc đáo, phong cách hiện đại hợp thời giới trẻ, chất liệu bền bỉ, thoáng mát, đem đến trải nghiệm tốt nhất cho người mặc', 7, 33, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'nhân viên'),
(3, 'khách hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_type` (`id_category_type`);

--
-- Chỉ mục cho bảng `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idItem` (`idItem`,`idPerson`),
  ADD KEY `idPerson` (`idPerson`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_customer`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLoai` (`id_category`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại hàng', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `category_type`
--
ALTER TABLE `category_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã loại danh mục', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đăng nhập', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã đơn hàng', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id chi tiết hóa đơn', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hàng hóa', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_category_type`) REFERENCES `category_type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `product` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idPerson`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
