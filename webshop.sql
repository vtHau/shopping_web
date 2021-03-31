-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 31, 2021 lúc 08:47 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` varchar(255) NOT NULL DEFAULT 'admin',
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminImage` varchar(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminUser`, `adminPass`, `adminImage`, `adminName`, `adminEmail`, `adminDescription`) VALUES
('admin', 'trunghau', '25d55ad283aa400af464c76d713c07ad', 'trunghau.png', 'Trung Hậu', 'crtrunghau@gmail.com', 'Quản trị viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_appuser`
--

CREATE TABLE `tbl_appuser` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_appuser`
--

INSERT INTO `tbl_appuser` (`userID`, `fullName`, `username`, `password`) VALUES
(3, 'Vo Trung Hau', 'trunghau', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'test ahaihahia', 'ahihihi', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `brandDescription` varchar(255) NOT NULL,
  `brandImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `brandName`, `brandDescription`, `brandImage`) VALUES
(4, 'Samsung', 'This is Samsung', 'af1724ebd2.jpg'),
(5, 'Apple', 'This is Apple', '39e2f65302.jpg'),
(6, 'Xiaomi', 'This is Xiaomi', '6c3a532be0.png'),
(7, 'Vivo', 'This is Apple', 'f896b48f73.jpg'),
(8, 'rtdrt', 'retert', '22de998c19.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartID`, `userID`, `productID`, `productName`, `productPrice`, `productQuantity`, `productImage`) VALUES
(30, 'dccfisguhddh58leclu54pa6vk', 3, 'Iphone 12 Pro Max', '33000000', 1, '2b7f69d060.jpg'),
(35, 'o71uadipf6cjb05lgtc0op3lhv', 13, 'Xiaomi Mi 11 Ultral', '20201000', 1, '1af7b2a724.jpg'),
(36, 'o71uadipf6cjb05lgtc0op3lhv', 13, 'Xiaomi Mi 11 Ultral', '20201000', 1, '1af7b2a724.jpg'),
(37, '5a7t7to45ihr5gu8tta60vo0fi', 14, 'tetesstttt', '234343', 2, '1bb7ad540f.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catDescription` varchar(255) NOT NULL,
  `catImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`, `catDescription`, `catImage`) VALUES
(7, 'Smart Phone', 'This is Phone', '3b9b79163f.jpg'),
(8, 'Laptop', 'This is Laptop', 'a16cfd8d51.jpg'),
(9, 'fdfsdfd', 'dsfsdfdfs', 'bbeedec092.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `chatID` int(11) NOT NULL,
  `toID` varchar(255) NOT NULL,
  `fromID` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chat`
--

INSERT INTO `tbl_chat` (`chatID`, `toID`, `fromID`, `message`) VALUES
(178, 'admin', '1', 'hello i am nguoi dung day ne'),
(179, '1', 'admin', 'hello i am quan tri vien'),
(190, 'admin', '28', 'heheeh'),
(191, '28', 'admin', 'hihi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `compareID` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_compare`
--

INSERT INTO `tbl_compare` (`compareID`, `userID`, `productID`, `productName`, `productPrice`, `productImage`, `productDesc`) VALUES
(13, 'dccfisguhddh58leclu54pa6vk', 13, 'Xiaomi Mi 11 Ultralllllll', '1423423423423', '1af7b2a724.jpg', 'Đây là chi tiết về sản phẩm nèeeeee');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_countvisitor`
--

CREATE TABLE `tbl_countvisitor` (
  `visitID` int(11) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_countvisitor`
--

INSERT INTO `tbl_countvisitor` (`visitID`, `quantity`) VALUES
(1, 47);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_device`
--

CREATE TABLE `tbl_device` (
  `deviceID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `device` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT current_timestamp(),
  `moreDetails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_device`
--

INSERT INTO `tbl_device` (`deviceID`, `userID`, `device`, `os`, `browser`, `lastLogin`, `moreDetails`) VALUES
(1, 1, 'Máy tính', 'Windows 10', 'Chrome', '2021-03-24 05:18:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36'),
(2, 3, 'Máy tính', 'Windows 10', 'Chrome', '2021-03-24 05:14:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57'),
(3, 0, 'Máy tính', 'Windows 10', 'Chrome', '2021-03-08 16:15:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36'),
(4, 26, 'Máy tính', 'Windows 10', 'Chrome', '2021-03-20 03:25:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36'),
(5, 27, 'Máy tính', 'Windows 10', 'Chrome', '2021-03-21 14:04:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36'),
(6, 28, 'Máy tính', 'Windows 10', 'Chrome', '2021-03-21 14:28:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36'),
(7, 30, 'Máy tính', 'Windows 10', 'Chrome', '2021-03-24 05:18:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36'),
(8, 31, 'Máy tính', 'Windows 10', 'Chrome', '2021-03-31 06:38:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `timeOrder` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statusOrder` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `userID`, `productID`, `productName`, `productQuantity`, `productPrice`, `productImage`, `timeOrder`, `statusOrder`) VALUES
(7, '3', 13, 'Xiaomi Mi 11 Ultral', 4, '13333332', '7f4ec247b6.jpg', '2021-03-20 03:24:27', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productCategory` int(11) NOT NULL,
  `productBrand` int(11) NOT NULL,
  `productDesc` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productQuantity` int(11) NOT NULL DEFAULT 100,
  `productFeather` int(11) NOT NULL,
  `productSell` int(11) NOT NULL,
  `productHotDeal` int(11) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `productCategory`, `productBrand`, `productDesc`, `productPrice`, `productQuantity`, `productFeather`, `productSell`, `productHotDeal`, `productImage`) VALUES
(3, 'Iphone 12 Pro Max', 8, 5, 'Iphone 12 Pro Max by Apple', '33000000', 100, 0, 1, 1, '2b7f69d060.jpg'),
(12, 'fdsfsdfsd', 7, 4, 'This is Samsung', '23000000', 9997, 1, 0, 1, '46efe03c9d.jpg'),
(13, 'Xiaomi Mi 11 Ultral', 7, 7, 'Đây là mô tả về sản phẩm Xiaomi Mi 11 Ultral', '20201000', 98, 1, 0, 0, '1af7b2a724.jpg'),
(14, 'tetesstttt', 9, 8, '3423423444', '234343', 224545, 1, 1, 1, '1bb7ad540f.jpg'),
(15, 'dgdfgdf', 7, 4, 'sdsdf', '3232', 1212121, 0, 1, 1, '65210b4d20.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_review`
--

CREATE TABLE `tbl_review` (
  `reviewID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `star` int(11) NOT NULL,
  `timeReview` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_review`
--

INSERT INTO `tbl_review` (`reviewID`, `userID`, `productID`, `comment`, `star`, `timeReview`, `status`) VALUES
(73, 3, 13, 'Comment by trungduy', 4, '2021-03-01 16:38:31', 1),
(79, 1, 13, 'da binh luan ahihihi\ndsdsdsdsd', 4, '2021-03-04 16:50:05', 1),
(80, 3, 14, 'fgfgfgvcvv', 2, '2021-03-07 12:32:53', 1),
(82, 1, 14, 'trunghaujhjh', 5, '2021-03-08 16:31:13', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderImage` varchar(255) NOT NULL,
  `sliderType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderID`, `productID`, `sliderName`, `sliderImage`, `sliderType`) VALUES
(1, 3, 'Slider is Phone 12 Pro Max', 'slider1.png', 1),
(3, 13, 'Samsung Galaxy S21', '7776dfa73a.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userFullName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPhone` varchar(255) NOT NULL,
  `userBirthDay` date NOT NULL,
  `userSex` int(11) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userImage` varchar(255) NOT NULL,
  `userStatus` varchar(255) NOT NULL,
  `userLastLogin` bigint(20) NOT NULL DEFAULT 0,
  `userBlock` int(11) NOT NULL DEFAULT 0,
  `userActive` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `username`, `password`, `userFullName`, `userEmail`, `userPhone`, `userBirthDay`, `userSex`, `userAddress`, `userImage`, `userStatus`, `userLastLogin`, `userBlock`, `userActive`) VALUES
(1, 'trunghau', '81dc9bdb52d04dc20036dbd8313ed055', 'Trung Hậu', 'crtrunghau@gmail.com', '0382881573', '2001-01-25', 0, 'Bến Tre', 'trunghau.png', 'Đây là tài khoản của Khách hàng', 1616563145, 0, '1'),
(32, 'khachhang', '4ff75da0d3b8234fb3edcd1d4ad17c85', 'Khách hàng', 'crtrunghau@gmail.com', '12345', '1995-01-01', 0, '1234', 'default.png', '1234', 0, 0, 'HTStore:8ed23c79e729671c46d50dc7ca659369b9bc4dd06b7d2d49cb9fb3d8d9fba6c1a48007efdc56c121083212200cc09cce827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlistID` int(11) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlistID`, `userID`, `productID`, `productName`, `productPrice`, `productImage`) VALUES
(16, 'dccfisguhddh58leclu54pa6vk', 3, 'Iphone 12 Pro Max', '33000000', '2b7f69d060.jpg'),
(20, 'o71uadipf6cjb05lgtc0op3lhv', 13, 'Xiaomi Mi 11 Ultral', '20201000', '1af7b2a724.jpg'),
(21, '1', 3, 'Iphone 12 Pro Max', '33000000', '2b7f69d060.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `tbl_appuser`
--
ALTER TABLE `tbl_appuser`
  ADD PRIMARY KEY (`userID`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Chỉ mục cho bảng `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`chatID`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`compareID`);

--
-- Chỉ mục cho bảng `tbl_countvisitor`
--
ALTER TABLE `tbl_countvisitor`
  ADD PRIMARY KEY (`visitID`);

--
-- Chỉ mục cho bảng `tbl_device`
--
ALTER TABLE `tbl_device`
  ADD PRIMARY KEY (`deviceID`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- Chỉ mục cho bảng `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`reviewID`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderID`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlistID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_appuser`
--
ALTER TABLE `tbl_appuser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `chatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `compareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_countvisitor`
--
ALTER TABLE `tbl_countvisitor`
  MODIFY `visitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_device`
--
ALTER TABLE `tbl_device`
  MODIFY `deviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
