-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 12, 2020 lúc 11:16 PM
-- Phiên bản máy phục vụ: 8.0.22-0ubuntu0.20.04.2
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `local`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `province`
--

CREATE TABLE `province` (
  `id` int UNSIGNED NOT NULL,
  `_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `province`
--

INSERT INTO `province` (`id`, `_name`, `_code`) VALUES
(1, 'Hồ Chí Minh', 'SG'),
(2, 'Hà Nội', 'HN'),
(3, 'Đà Nẵng', 'DDN'),
(4, 'Bình Dương', 'BD'),
(5, 'Đồng Nai', 'DNA'),
(6, 'Khánh Hòa', 'KH'),
(7, 'Hải Phòng', 'HP'),
(8, 'Long An', 'LA'),
(9, 'Quảng Nam', 'QNA'),
(10, 'Bà Rịa Vũng Tàu', 'VT'),
(11, 'Đắk Lắk', 'DDL'),
(12, 'Cần Thơ', 'CT'),
(13, 'Bình Thuận  ', 'BTH'),
(14, 'Lâm Đồng', 'LDD'),
(15, 'Thừa Thiên Huế', 'TTH'),
(16, 'Kiên Giang', 'KG'),
(17, 'Bắc Ninh', 'BN'),
(18, 'Quảng Ninh', 'QNI'),
(19, 'Thanh Hóa', 'TH'),
(20, 'Nghệ An', 'NA'),
(21, 'Hải Dương', 'HD'),
(22, 'Gia Lai', 'GL'),
(23, 'Bình Phước', 'BP'),
(24, 'Hưng Yên', 'HY'),
(25, 'Bình Định', 'BDD'),
(26, 'Tiền Giang', 'TG'),
(27, 'Thái Bình', 'TB'),
(28, 'Bắc Giang', 'BG'),
(29, 'Hòa Bình', 'HB'),
(30, 'An Giang', 'AG'),
(31, 'Vĩnh Phúc', 'VP'),
(32, 'Tây Ninh', 'TNI'),
(33, 'Thái Nguyên', 'TN'),
(34, 'Lào Cai', 'LCA'),
(35, 'Nam Định', 'NDD'),
(36, 'Quảng Ngãi', 'QNG'),
(37, 'Bến Tre', 'BTR'),
(38, 'Đắk Nông', 'DNO'),
(39, 'Cà Mau', 'CM'),
(40, 'Vĩnh Long', 'VL'),
(41, 'Ninh Bình', 'NB'),
(42, 'Phú Thọ', 'PT'),
(43, 'Ninh Thuận', 'NT'),
(44, 'Phú Yên', 'PY'),
(45, 'Hà Nam', 'HNA'),
(46, 'Hà Tĩnh', 'HT'),
(47, 'Đồng Tháp', 'DDT'),
(48, 'Sóc Trăng', 'ST'),
(49, 'Kon Tum', 'KT'),
(50, 'Quảng Bình', 'QB'),
(51, 'Quảng Trị', 'QT'),
(52, 'Trà Vinh', 'TV'),
(53, 'Hậu Giang', 'HGI'),
(54, 'Sơn La', 'SL'),
(55, 'Bạc Liêu', 'BL'),
(56, 'Yên Bái', 'YB'),
(57, 'Tuyên Quang', 'TQ'),
(58, 'Điện Biên', 'DDB'),
(59, 'Lai Châu', 'LCH'),
(60, 'Lạng Sơn', 'LS'),
(61, 'Hà Giang', 'HG'),
(62, 'Bắc Kạn', 'BK'),
(63, 'Cao Bằng', 'CB');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `province`
--
ALTER TABLE `province`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
