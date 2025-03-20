-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 18, 2025 lúc 07:13 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_cau_thu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caulacbo`
--

CREATE TABLE `caulacbo` (
  `maCLB` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenCLB` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truSo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `caulacbo`
--

INSERT INTO `caulacbo` (`maCLB`, `tenCLB`, `truSo`, `sdt`) VALUES
('CLB001', 'Hà Nội FC', 'Hà Nội', 123456789),
('CLB002', 'Hoàng Anh Gia Lai', 'Gia Lai', 987654321),
('CLB003', 'Sông Lam Nghệ An', 'Nghệ An', 567890123),
('CLB004', 'SHB Đà Nẵng', 'Đà Nẵng', 345678901),
('CLB005', 'Becamex Bình Dương', 'Bình Dương', 234567890);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtincauthu`
--

CREATE TABLE `thongtincauthu` (
  `maSo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaySinh` date NOT NULL,
  `viTri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CLB_ID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtincauthu`
--

INSERT INTO `thongtincauthu` (`maSo`, `hoTen`, `ngaySinh`, `viTri`, `CLB_ID`) VALUES
('CT001', 'Bùi Mạnh Tuấn', '2025-03-06', 'Tiền đạo', 'CLB002'),
('CT002', 'Trần Hoàn', '2025-03-08', 'Tiền đạo', 'CLB001'),
('CT003', 'Mai Tiến Dũng', '2025-03-21', 'Tiền về', 'CLB005');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `caulacbo`
--
ALTER TABLE `caulacbo`
  ADD PRIMARY KEY (`maCLB`);

--
-- Chỉ mục cho bảng `thongtincauthu`
--
ALTER TABLE `thongtincauthu`
  ADD PRIMARY KEY (`maSo`),
  ADD KEY `fk_thongtincauthu_caulacbo` (`CLB_ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `thongtincauthu`
--
ALTER TABLE `thongtincauthu`
  ADD CONSTRAINT `fk_thongtincauthu_caulacbo` FOREIGN KEY (`CLB_ID`) REFERENCES `caulacbo` (`maCLB`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
