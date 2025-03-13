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
-- Cơ sở dữ liệu: `quan_ly_nhac`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `id` int NOT NULL,
  `ten_album` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nghe_si_id` int DEFAULT NULL,
  `nam_phat_hanh` year DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`id`, `ten_album`, `nghe_si_id`, `nam_phat_hanh`) VALUES
(1, '1989', 1, '2014'),
(2, 'Divide', 2, '2017'),
(3, 'Recovery', 3, '2010'),
(4, 'Memories...Do Not Open', 4, '2017'),
(5, 'Sơn Tùng MT-P', 5, '2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_hat`
--

CREATE TABLE `bai_hat` (
  `id` int NOT NULL,
  `ten_bai_hat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_id` int DEFAULT NULL,
  `the_loai_id` int DEFAULT NULL,
  `nghe_si_id` int DEFAULT NULL,
  `thoi_luong` int DEFAULT NULL,
  `ngay_phat_hanh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bai_hat`
--

INSERT INTO `bai_hat` (`id`, `ten_bai_hat`, `album_id`, `the_loai_id`, `nghe_si_id`, `thoi_luong`, `ngay_phat_hanh`) VALUES
(10, 'Đừng Làm Trái Tim Anh Đau', 5, 1, 5, 212, '2025-03-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int NOT NULL,
  `bai_hat_id` int DEFAULT NULL,
  `nguoi_dung_id` int DEFAULT NULL,
  `diem` decimal(2,1) DEFAULT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci,
  `ngay_danh_gia` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghe_si`
--

CREATE TABLE `nghe_si` (
  `id` int NOT NULL,
  `ten_nghe_si` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nghe_si`
--

INSERT INTO `nghe_si` (`id`, `ten_nghe_si`, `ngay_sinh`) VALUES
(1, 'Taylor Swift', '1989-12-13'),
(2, 'Ed Sheeran', '1991-02-17'),
(3, 'Eminem', '1972-10-17'),
(4, 'The Chainsmokers', '1989-05-16'),
(5, 'Sơn Tùng MT-P', '1994-07-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int NOT NULL,
  `ten_nguoi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_nguoi_dung`, `email`, `mat_khau`, `ngay_tao`) VALUES
(1, 'user1', 'user1@example.com', 'hashed_password1', '2025-03-09 15:33:43'),
(2, 'user2', 'user2@example.com', 'hashed_password2', '2025-03-09 15:33:43'),
(3, 'user3', 'user3@example.com', 'hashed_password3', '2025-03-09 15:33:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai`
--

CREATE TABLE `the_loai` (
  `id` int NOT NULL,
  `ten_the_loai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `the_loai`
--

INSERT INTO `the_loai` (`id`, `ten_the_loai`) VALUES
(4, 'EDM'),
(3, 'Hip-hop'),
(5, 'Jazz'),
(1, 'Pop'),
(2, 'Rock');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nghe_si_id` (`nghe_si_id`);

--
-- Chỉ mục cho bảng `bai_hat`
--
ALTER TABLE `bai_hat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `the_loai_id` (`the_loai_id`),
  ADD KEY `nghe_si_id` (`nghe_si_id`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bai_hat_id` (`bai_hat_id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`);

--
-- Chỉ mục cho bảng `nghe_si`
--
ALTER TABLE `nghe_si`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_nguoi_dung` (`ten_nguoi_dung`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `bai_hat`
--
ALTER TABLE `bai_hat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nghe_si`
--
ALTER TABLE `nghe_si`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`nghe_si_id`) REFERENCES `nghe_si` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `bai_hat`
--
ALTER TABLE `bai_hat`
  ADD CONSTRAINT `bai_hat_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bai_hat_ibfk_2` FOREIGN KEY (`the_loai_id`) REFERENCES `the_loai` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bai_hat_ibfk_3` FOREIGN KEY (`nghe_si_id`) REFERENCES `nghe_si` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`bai_hat_id`) REFERENCES `bai_hat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
