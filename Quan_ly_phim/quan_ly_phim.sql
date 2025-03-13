-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 10, 2025 lúc 02:49 PM
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
-- Cơ sở dữ liệu: `quan_ly_phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int NOT NULL,
  `phim_id` int DEFAULT NULL,
  `nguoi_dung_id` int DEFAULT NULL,
  `diem` decimal(2,1) DEFAULT NULL,
  `binh_luan` text,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `phim_id`, `nguoi_dung_id`, `diem`, `binh_luan`, `ngay_tao`) VALUES
(1, 1, 1, 9.0, 'Phim quá xuất sắc!', '2025-03-09 12:50:49'),
(2, 2, 2, 8.5, 'Một câu chuyện tình đầy cảm động', '2025-03-09 12:50:49'),
(3, 3, 3, 7.5, 'Phim khoa học viễn tưởng rất hay', '2025-03-09 12:50:49'),
(4, 4, 1, 9.5, 'Tarantino làm phim quá chất!', '2025-03-09 12:50:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dao_dien`
--

CREATE TABLE `dao_dien` (
  `id` int NOT NULL,
  `ten_dao_dien` varchar(255) NOT NULL,
  `ngay_sinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `dao_dien`
--

INSERT INTO `dao_dien` (`id`, `ten_dao_dien`, `ngay_sinh`) VALUES
(1, 'Christopher Nolan', '1970-07-30'),
(2, 'James Cameron', '1954-08-16'),
(3, 'Steven Spielberg', '1946-12-18'),
(4, 'Quentin Tarantino', '1963-03-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dien_vien`
--

CREATE TABLE `dien_vien` (
  `id` int NOT NULL,
  `ten_dien_vien` varchar(255) NOT NULL,
  `ngay_sinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `dien_vien`
--

INSERT INTO `dien_vien` (`id`, `ten_dien_vien`, `ngay_sinh`) VALUES
(1, 'Leonardo DiCaprio', '1974-11-11'),
(2, 'Kate Winslet', '1975-10-05'),
(3, 'Samuel L. Jackson', '1948-12-21'),
(4, 'Tom Hardy', '1977-09-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int NOT NULL,
  `ten_nguoi_dung` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_nguoi_dung`, `email`, `mat_khau`, `ngay_tao`) VALUES
(1, 'nguoidung1', 'nguoidung1@example.com', 'matkhau1', '2025-03-09 12:50:49'),
(2, 'nguoidung2', 'nguoidung2@example.com', 'matkhau2', '2025-03-09 12:50:49'),
(3, 'nguoidung3', 'nguoidung3@example.com', 'matkhau3', '2025-03-09 12:50:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id` int NOT NULL,
  `ten_phim` varchar(255) NOT NULL,
  `nam_phat_hanh` int DEFAULT NULL,
  `thoi_luong` int DEFAULT NULL,
  `the_loai_id` int DEFAULT NULL,
  `dao_dien_id` int DEFAULT NULL,
  `mo_ta` text,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id`, `ten_phim`, `nam_phat_hanh`, `thoi_luong`, `the_loai_id`, `dao_dien_id`, `mo_ta`, `ngay_tao`) VALUES
(1, 'Kẻ Đánh Cắp Giấc Mơ', 2010, 148, 5, 1, 'Một bộ phim về giấc mơ trong giấc mơ', '2025-03-09 12:50:49'),
(2, 'Chuyến Tàu Titanic', 1997, 195, 4, 2, 'Chuyện tình kinh điển trên con tàu Titanic', '2025-03-09 12:50:49'),
(3, 'Công Viên Kỷ Jura', 1993, 127, 5, 3, 'Công viên kỷ Jura với những con khủng long sống lại', '2025-03-09 12:50:49'),
(4, 'Chuyện Tào Lao', 1994, 154, 1, 4, 'Bộ phim hình sự nổi tiếng của Quentin Tarantino', '2025-03-09 12:50:49'),
(5, 'Saitama', 2019, 192, 3, 1, 'Phim kể về siêu anh hùng 1 đám chết 1 thằng', '2025-03-10 03:04:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim_dien_vien`
--

CREATE TABLE `phim_dien_vien` (
  `phim_id` int NOT NULL,
  `dien_vien_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `phim_dien_vien`
--

INSERT INTO `phim_dien_vien` (`phim_id`, `dien_vien_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(4, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai`
--

CREATE TABLE `the_loai` (
  `id` int NOT NULL,
  `ten_the_loai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `the_loai`
--

INSERT INTO `the_loai` (`id`, `ten_the_loai`) VALUES
(3, 'Hài'),
(1, 'Hành động'),
(5, 'Khoa học viễn tưởng'),
(2, 'Kinh dị'),
(4, 'Tình cảm');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phim_id` (`phim_id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`);

--
-- Chỉ mục cho bảng `dao_dien`
--
ALTER TABLE `dao_dien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dien_vien`
--
ALTER TABLE `dien_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_nguoi_dung` (`ten_nguoi_dung`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `the_loai_id` (`the_loai_id`),
  ADD KEY `dao_dien_id` (`dao_dien_id`);

--
-- Chỉ mục cho bảng `phim_dien_vien`
--
ALTER TABLE `phim_dien_vien`
  ADD PRIMARY KEY (`phim_id`,`dien_vien_id`),
  ADD KEY `dien_vien_id` (`dien_vien_id`);

--
-- Chỉ mục cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_the_loai` (`ten_the_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dao_dien`
--
ALTER TABLE `dao_dien`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dien_vien`
--
ALTER TABLE `dien_vien`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_ibfk_1` FOREIGN KEY (`the_loai_id`) REFERENCES `the_loai` (`id`),
  ADD CONSTRAINT `phim_ibfk_2` FOREIGN KEY (`dao_dien_id`) REFERENCES `dao_dien` (`id`);

--
-- Các ràng buộc cho bảng `phim_dien_vien`
--
ALTER TABLE `phim_dien_vien`
  ADD CONSTRAINT `phim_dien_vien_ibfk_1` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phim_dien_vien_ibfk_2` FOREIGN KEY (`dien_vien_id`) REFERENCES `dien_vien` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
