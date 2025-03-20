-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 18, 2025 lúc 07:59 AM
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
-- Cơ sở dữ liệu: `quan_ly_nhan_vien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `macv` varchar(20) NOT NULL,
  `tencv` varchar(50) NOT NULL,
  `pccv` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`macv`, `tencv`, `pccv`) VALUES
('CV001', 'Giám đốc', 5000000),
('CV002', 'Phó Giám đốc', 4000000),
('CV003', 'Trưởng phòng', 3000000),
('CV004', 'Nhân viên', 2000000),
('CV005', 'Chủ Tịch', 1000000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `madv` varchar(20) NOT NULL,
  `tendv` varchar(50) NOT NULL,
  `sonv` tinyint NOT NULL,
  `cbpt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`madv`, `tendv`, `sonv`, `cbpt`) VALUES
('DV001', 'Bộ Công An', 100, 'Hoàng Văn An'),
('DV002', 'Bộ Quốc Phòng', 120, 'Bùi Mạnh Tuấn'),
('DV003', 'Bộ Giáo Dục', 33, 'Nguyễn Ngọc Ánh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` char(20) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` enum('Nam','Nữ','Khác') NOT NULL,
  `hsl` float(3,2) NOT NULL,
  `madv_id` varchar(20) NOT NULL,
  `macv_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `hoten`, `ngaysinh`, `gioitinh`, `hsl`, `madv_id`, `macv_id`) VALUES
('NV0001', 'Nguyễn Ngọc Ánh', '2004-02-28', 'Nữ', 5.60, 'DV002', 'CV005'),
('NV0002', 'Nguyễn Ngọc Ánh', '2004-02-22', 'Nam', 2.40, 'DV002', 'CV001'),
('NV0003', 'Nguyễn Ngọc Ánh', '1993-02-28', 'Nữ', 3.20, 'DV003', 'CV005'),
('NV0004', 'Nguyễn Ngọc Ánh', '2004-01-02', 'Nam', 2.60, 'DV001', 'CV004'),
('NV0005', 'Nguyễn Ngọc Ánh', '2025-02-26', 'Khác', 2.60, 'DV003', 'CV004');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`macv`);

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`madv`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`),
  ADD KEY `fk_nhanvien_chuvu` (`macv_id`),
  ADD KEY `fk_nhanvien_donvi` (`madv_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_chuvu` FOREIGN KEY (`macv_id`) REFERENCES `chucvu` (`macv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nhanvien_donvi` FOREIGN KEY (`madv_id`) REFERENCES `donvi` (`madv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
