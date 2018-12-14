-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2018 lúc 10:15 AM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ngoai_ngu_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cbtt`
--

CREATE TABLE `cbtt` (
  `MaNV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinhNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinhNV` date NOT NULL,
  `SDTNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EmailNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cbtt`
--

INSERT INTO `cbtt` (`MaNV`, `HoTenNV`, `GioiTinhNV`, `NgaySinhNV`, `SDTNV`, `DiaChiNV`, `EmailNV`, `TinhTrang`) VALUES
('NV001', 'Dr Bradford Mante MD', 'nữ', '1992-11-04', '01274664', '162 Khalid StravenueNorth Andres, SC 78476-8604', 'ngerlach@example.org', '1'),
('NV002', 'Kaleb Gerlach II', 'Nữ', '1994-10-06', '1111111', '23692 Rutherford PortPort Adolfo, WI 18715-4683', 'abraham39@example.com', '1'),
('NV003', 'Rafaela Dibbert', 'Nữ', '1999-01-25', '473-431-5729', '67406 Koss Dam Apt. 291\nAddieport, AL 46919-8547', 'stacy16@example.com', '1'),
('NV004', 'Mr. Dedrick Leuschke', 'Nữ', '1994-07-28', '569.858.7840 x4277', '538 Celestine Course Apt. 891\nNew Tomstad, OH 21216-4144', 'pspinka@example.net', '1'),
('NV005', 'Raquel Dach', 'Nữ', '1992-03-21', '+1 (272) 391-9506', '9678 Leannon Village\nSouth Stonehaven, VA 69867', 'romaine75@example.net', '1'),
('NV006', 'Gerard Pollich MD', 'Nữ', '1999-08-28', '376.732.9860 x61312', '362 Alec Coves\nSouth Russ, TX 20871-2676', 'yvonrueden@example.com', '1'),
('NV007', 'Remington Eichmann', 'Nữ', '1990-05-04', '1-604-464-3412', '946 Javonte Wells Apt. 559\nSouth Geovannystad, TN 31302', 'rico72@example.net', '1'),
('NV008', 'Camilla Cole', 'nam', '1993-07-03', '86188888', '46131 Johathan Drive Apt. 816West June, NE 60006', 'bettye31@example.com', '1'),
('NV009', 'Valerie Volkman', 'Nam', '1994-09-14', '596.455.9015 x1523', '4244 Lionel Village Suite 355\nWatersfort, AL 37721-7700', 'eveline57@example.net', '1'),
('NV010', 'Prof. Justus O\'Keefe', 'Nam', '1992-03-17', '+15417159818', '841 Loren Pike Suite 802\nEast Emmyton, MS 88954-8005', 'feil.blaise@example.org', '1');

--
-- Bẫy `cbtt`
--
DELIMITER $$
CREATE TRIGGER `cbtt_table_insert` BEFORE INSERT ON `cbtt` FOR EACH ROW BEGIN
         INSERT INTO cbtt_sq1 VALUES (NULL);
         SET NEW.MaNV = CONCAT("NV", LPAD(LAST_INSERT_ID(), 3, "00"));
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cbtt_sq1`
--

CREATE TABLE `cbtt_sq1` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cbtt_sq1`
--

INSERT INTO `cbtt_sq1` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphancong`
--

CREATE TABLE `chitietphancong` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaGV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` int(10) UNSIGNED NOT NULL,
  `MaNhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_ThoiGian` int(10) UNSIGNED NOT NULL,
  `id_TKB` int(10) UNSIGNED NOT NULL,
  `id_TietHoc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphancong`
--

INSERT INTO `chitietphancong` (`id`, `MaGV`, `MaMonHoc`, `MaNhom`, `id_ThoiGian`, `id_TKB`, `id_TietHoc`, `created_at`, `updated_at`) VALUES
(10, 'GV006', 2, 'N056', 4, 7, 4, '2018-11-26 22:02:12', '2018-11-26 22:02:12'),
(11, 'GV006', 1, 'N009', 6, 6, 4, '2018-11-26 23:57:19', '2018-11-26 23:57:19'),
(13, 'GV005', 3, 'N056', 3, 7, 4, '2018-11-27 00:01:55', '2018-11-27 00:01:55'),
(15, 'GV010', 3, 'N056', 5, 7, 4, '2018-11-28 00:51:53', '2018-11-28 00:51:53'),
(16, 'GV006', 2, 'N056', 6, 7, 4, '2018-11-28 00:53:54', '2018-11-28 00:53:54'),
(24, 'GV010', 2, 'N060', 1, 8, 4, '2018-11-29 01:22:46', '2018-11-29 01:22:46'),
(25, 'GV010', 5, 'N060', 3, 8, 4, '2018-11-29 01:22:47', '2018-11-29 01:22:47'),
(26, 'GV038', 6, 'N060', 5, 8, 4, '2018-11-30 00:11:39', '2018-11-30 00:11:39'),
(27, 'GV003', 1, 'N060', 6, 8, 4, '2018-11-30 00:14:28', '2018-11-30 00:14:28'),
(28, 'GV008', 3, 'N061', 2, 9, 4, '2018-11-30 01:03:18', '2018-11-30 01:03:18'),
(29, 'GV006', 2, 'N061', 3, 9, 4, '2018-11-30 01:03:18', '2018-11-30 01:03:18'),
(30, 'GV038', 6, 'N061', 6, 9, 4, '2018-11-30 01:03:36', '2018-11-30 01:03:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_tiethoc`
--

CREATE TABLE `chitiet_tiethoc` (
  `id_chitiet` int(10) UNSIGNED NOT NULL,
  `MaMonHoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_TKB` int(11) NOT NULL,
  `id_Tiet` int(11) NOT NULL,
  `MaGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungchis`
--

CREATE TABLE `chungchis` (
  `MaCC` int(10) UNSIGNED NOT NULL,
  `tenCC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thangDiemXL` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chungchis`
--

INSERT INTO `chungchis` (`MaCC`, `tenCC`, `thangDiemXL`) VALUES
(1, 'TOEIC', '[\"246\",\"381\",\"541\"]'),
(2, 'TOEFL-iBT', '[\"25\",\"32\",\"61\"]'),
(3, 'IELTS', '[\"3.5\",\"4.5\",\"5\"]'),
(4, 'TOEFL cBT', '[\"97\",\"127\",\"177\"]\r\n'),
(5, 'KET (Key English Test)', '\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `co`
--

CREATE TABLE `co` (
  `MaKM` int(10) UNSIGNED NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `co`
--

INSERT INTO `co` (`MaKM`, `MaLop`, `created_at`, `updated_at`) VALUES
(1, 'L001', '2018-11-30 00:09:45', '2018-11-30 00:09:45'),
(1, 'L003', '2018-11-30 00:09:45', '2018-11-30 00:09:45'),
(1, 'L006', '2018-11-30 00:09:45', '2018-11-30 00:09:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cotuanhoc`
--

CREATE TABLE `cotuanhoc` (
  `id_Tuan` int(10) UNSIGNED NOT NULL,
  `id_TKB` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `day_mon_hocs`
--

CREATE TABLE `day_mon_hocs` (
  `MaMonHoc` int(10) UNSIGNED NOT NULL,
  `MaGV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `day_mon_hocs`
--

INSERT INTO `day_mon_hocs` (`MaMonHoc`, `MaGV`, `created_at`, `updated_at`) VALUES
(1, 'GV004', NULL, NULL),
(1, 'GV006', NULL, NULL),
(1, 'GV008', '2018-11-21 02:19:12', '2018-11-21 02:19:12'),
(1, 'GV010', NULL, NULL),
(1, 'GV015', '2018-11-21 02:19:13', '2018-11-21 02:19:13'),
(2, 'GV006', NULL, NULL),
(2, 'GV007', NULL, NULL),
(2, 'GV008', '2018-11-21 02:19:13', '2018-11-21 02:19:13'),
(2, 'GV010', NULL, NULL),
(2, 'GV015', '2018-11-21 02:19:13', '2018-11-21 02:19:13'),
(3, 'GV005', '2018-11-21 02:19:14', '2018-11-21 02:19:14'),
(3, 'GV008', '2018-11-21 02:19:14', '2018-11-21 02:19:14'),
(3, 'GV009', NULL, NULL),
(3, 'GV010', NULL, NULL),
(3, 'GV016', '2018-11-21 02:19:14', '2018-11-21 02:19:14'),
(5, 'GV004', NULL, NULL),
(5, 'GV006', NULL, NULL),
(5, 'GV007', NULL, NULL),
(5, 'GV010', NULL, NULL),
(5, 'GV038', NULL, NULL),
(6, 'GV038', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemthichungchis`
--

CREATE TABLE `diemthichungchis` (
  `MaHocVien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaKiThi` int(10) UNSIGNED NOT NULL,
  `PhongThi` int(11) NOT NULL,
  `DiemThi` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diemthichungchis`
--

INSERT INTO `diemthichungchis` (`MaHocVien`, `MaKiThi`, `PhongThi`, `DiemThi`, `created_at`, `updated_at`) VALUES
('HV005', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV005', 4, 1, '{\"nghe\":\"4\",\"noi\":\"3\",\"doc\":\"3\",\"viet\":\"0\"}', NULL, NULL),
('HV038', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV048', 2, 1, '{\"nghe\":\"5\",\"noi\":\"5\",\"doc\":\"5\",\"viet\":\"5\"}', NULL, NULL),
('HV057', 2, 3, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV061', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV065', 2, 3, '{\"nghe\":\"3\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV068', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV078', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV080', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV082', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV085', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV086', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV089', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV094', 2, 3, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV095', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV104', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV118', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV125', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV126', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV129', 2, 3, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV130', 2, 2, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV134', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV135', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV144', 2, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL),
('HV163', 4, 1, '{\"nghe\":\"0\",\"noi\":\"0\",\"doc\":\"0\",\"viet\":\"3\"}', NULL, NULL),
('HV172', 4, 1, '{\"nghe\":\"3\",\"noi\":\"4\",\"doc\":\"0\",\"viet\":\"0\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `MaGV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinhGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinhGV` date NOT NULL,
  `TrinhDoGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EmailGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDTGV` text COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`MaGV`, `HoTenGV`, `GioiTinhGV`, `NgaySinhGV`, `TrinhDoGV`, `EmailGV`, `SDTGV`, `DiaChiGV`, `created_at`, `updated_at`, `TinhTrang`) VALUES
('GV003', 'Prof Mac Upton II', 'Nam', '2000-11-20', 'Đại học', 'avolkman@example.com', '8122884539', '7701 Hermann VistaSouth Colt CT 12732', '2018-11-14 01:05:21', '2018-11-14 01:05:21', 0),
('GV004', 'Velda Parker', 'Nữ', '1992-07-09', 'Đại học', 'greenholt.gabriel@example.org', '329.613.2248 x9410', '327 Rhianna Unions Suite 050South Kevonside, NM 44295-9753', '2018-11-14 01:05:21', '2018-11-28 21:59:42', 0),
('GV005', 'Ignatius Cummerata', 'Nam', '1994-07-03', 'Đại học', 'maida.barton@example.com', '1-241-496-7111 x458', '631 Schneider Place Apt. 381\nWest Maxchester, MI 04412-9102', '2018-11-14 01:05:21', '2018-11-14 01:05:21', 0),
('GV006', 'Prof. Shad Goldner', 'Nữ', '1992-12-31', 'Đại học', 'kaya47@example.net', '270.512.1154 x377', '3389 Tony Parkways Suite 136West Brad, MS 01339-3790', '2018-11-14 01:05:21', '2018-11-28 22:00:23', 0),
('GV007', 'Dr. Billie Johnston Sr.', 'Nam', '1993-09-20', 'Đại học', 'duncan.homenick@example.com', '(347) 259-5037', '897 Chelsey RapidsEast Faeland, WY 46290-1197', '2018-11-14 01:05:23', '2018-11-28 21:59:48', 0),
('GV008', 'Chanel Rodriguez', 'Nam', '1999-10-12', 'Đại học', 'glennie.lind@example.net', '1-769-549-5288 x2654', '22487 Tre Street\nPort Janyside, VT 16215-2233', '2018-11-14 01:05:23', '2018-11-14 01:05:23', 0),
('GV009', 'Dr. Ludie Bernier', 'Nữ', '1996-08-02', 'Đại học', 'kris01@example.org', '+1.486.430.9813', '388 Wilkinson Mill Suite 965Rockyfort, DE 90366', '2018-11-14 01:05:23', '2018-11-28 22:04:25', 0),
('GV010', 'Valentine Reilly V', 'Nam', '2000-12-29', 'Đại học', 'carson17@example.net', '+1.428.962.6101', '38183 Little TraceDouglaschester, MD 61422', '2018-11-14 01:05:23', '2018-11-28 22:00:01', 0),
('GV011', 'Vito Cole', 'Nam', '1993-01-16', 'Đại học', 'slangworth@example.com', '563-455-4699 x470', '2981 Harris Gateway\nBatzberg, IN 42014', '2018-11-14 01:05:23', '2018-11-14 01:05:23', 0),
('GV015', 'adsd', 'Nam', '2018-10-28', 'Trung Cấp', 'aa@gmail.com', '1323', 'aqsa', '2018-11-21 00:08:38', '2018-11-21 01:15:48', 1),
('GV016', 'hiujp', 'Nam', '2018-10-29', 'Trung Cấp', 'aall@gmail.com', '1346809', 'vvv', '2018-11-21 01:57:34', '2018-11-21 01:57:34', 1),
('GV038', 'Trần văn B', 'Nam', '1995-12-12', 'Đại Học', 'b@gmail.com', '123456789', 'Cần Thơ', '2018-11-28 22:24:36', '2018-11-28 22:24:36', 1);

--
-- Bẫy `giangvien`
--
DELIMITER $$
CREATE TRIGGER `giangvien_table_insert` BEFORE INSERT ON `giangvien` FOR EACH ROW BEGIN
         INSERT INTO giangvien_sq1 VALUES (NULL);
         SET NEW.MaGV = CONCAT("GV", LPAD(LAST_INSERT_ID(), 3, "00"));
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien_sq1`
--

CREATE TABLE `giangvien_sq1` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien_sq1`
--

INSERT INTO `giangvien_sq1` (`id`) VALUES
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadondkhoc`
--

CREATE TABLE `hoadondkhoc` (
  `id_HoaDonDkHoc` int(10) UNSIGNED NOT NULL,
  `id_PhieuDKHoc` int(10) UNSIGNED NOT NULL,
  `MaNhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `MaNV` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadondkhoc`
--

INSERT INTO `hoadondkhoc` (`id_HoaDonDkHoc`, `id_PhieuDKHoc`, `MaNhom`, `created_at`, `updated_at`, `MaNV`) VALUES
(1, 103, 'N057', '2018-11-27 01:04:29', '2018-11-27 01:04:29', 'NV001'),
(2, 96, 'N056', '2018-11-27 01:06:55', '2018-11-27 01:06:55', 'NV001'),
(3, 125, 'N060', '2018-11-29 01:24:24', '2018-11-29 01:24:24', 'NV001'),
(4, 126, 'N061', '2018-11-30 01:04:12', '2018-11-30 01:04:12', 'NV009'),
(5, 92, 'N056', '2018-11-30 01:05:49', '2018-11-30 01:05:49', 'NV009');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonthis`
--

CREATE TABLE `hoadonthis` (
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `idphieudk` int(10) UNSIGNED NOT NULL,
  `MaNV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phongthi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonthis`
--

INSERT INTO `hoadonthis` (`id_hoadon`, `idphieudk`, `MaNV`, `phongthi`, `created_at`, `updated_at`) VALUES
(8, 4, 'NV001', 0, '2018-11-26 02:45:24', '2018-11-26 02:45:24'),
(9, 4, 'NV001', 0, '2018-11-26 22:24:06', '2018-11-26 22:24:06'),
(11, 47, 'NV001', 1, '2018-11-29 01:38:08', '2018-11-29 01:38:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphi`
--

CREATE TABLE `hocphi` (
  `MaLop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_KhoaHoc` int(11) NOT NULL,
  `HocPhi` double(8,2) NOT NULL,
  `NgayKhaiGiang` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `BuoiHoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayChan` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `MaHocVien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenHocVien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` text COLLATE utf8_unicode_ci,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CMND` int(15) DEFAULT NULL,
  `NgayCap` date DEFAULT NULL,
  `NgheNghiep` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`MaHocVien`, `HoTenHocVien`, `GioiTinh`, `NgaySinh`, `DiaChi`, `Email`, `SDT`, `created_at`, `updated_at`, `CMND`, `NgayCap`, `NgheNghiep`) VALUES
('HV005', 'Trần Kiều An', 'Nữ', '2018-11-30', '01 Ninh Kiều, Cần Thơ', 'kieuan@gmail.com', '19889099', '2018-11-13 22:42:19', '2018-11-28 21:36:34', 132435465, '2018-11-06', 'sinh viên'),
('HV038', 'Brielle Schmidt', 'Nu', '1990-02-05', '62812 Zboncak Estates Suite 061\nWest Lilla, AK 07542-1590', 'dewayne48@example.org', '(894) 628-4545 x968', '2018-11-18 23:24:12', '2018-11-18 23:24:12', NULL, NULL, NULL),
('HV039', 'Skyla Wunsch', 'Nam', '1999-04-30', '58283 Wisozk Inlet\nKshlerinberg, OK 75665-1248', 'wade.hill@example.com', '+1-259-949-8998', '2018-11-18 23:24:12', '2018-11-18 23:24:12', NULL, NULL, NULL),
('HV040', 'Elijah Reynolds', 'Nam', '1990-06-28', '558 Horace Square Apt. 555\nEast Adahland, TX 37785-1549', 'schinner.arvilla@example.org', '(590) 914-9272', '2018-11-18 23:24:12', '2018-11-18 23:24:12', NULL, NULL, NULL),
('HV041', 'Prof. Cory Stark DVM', 'Nu', '1991-02-13', '62075 Mitchell Cape\nNorth Jacyntheport, IA 87982', 'blowe@example.com', '+1 (503) 858-4195', '2018-11-18 23:24:13', '2018-11-18 23:24:13', NULL, NULL, NULL),
('HV042', 'Prof. Tyra Gutkowski PhD', 'Nu', '1999-07-03', '5025 Hayes Heights\nReyfort, AL 95164-3884', 'watsica.ila@example.com', '1-687-956-4161 x1134', '2018-11-18 23:24:13', '2018-11-18 23:24:13', NULL, NULL, NULL),
('HV043', 'Mr. Quincy Beatty Jr.', 'Nam', '1992-12-27', '15570 Sherman Glens\nGrantville, MA 06013', 'runolfsson.jaycee@example.com', '1-553-848-0378 x395', '2018-11-18 23:24:13', '2018-11-18 23:24:13', NULL, NULL, NULL),
('HV045', 'Miss Edythe Champlin V', 'Nam', '1996-11-18', '60311 Rolfson Drives\nWest Aileen, MA 87554', 'enoch20@example.org', '282.641.8364', '2018-11-18 23:24:13', '2018-11-18 23:24:13', NULL, NULL, NULL),
('HV046', 'Prof. Rozella Ritchie III', 'Nu', '1999-07-18', '39367 Amir Forks\nEast Parisfurt, NM 95969', 'doris91@example.org', '(612) 277-5750 x3627', '2018-11-18 23:24:13', '2018-11-18 23:24:13', NULL, NULL, NULL),
('HV047', 'Nestor Mitchell', 'Nam', '1997-12-26', '282 Kari Meadow\nNorth Freeman, NJ 38835', 'rempel.lera@example.com', '256-701-4124', '2018-11-18 23:24:13', '2018-11-18 23:24:13', NULL, NULL, NULL),
('HV048', 'Prof. Dennis Schulist', 'Nu', '1998-03-18', '77561 Zboncak Neck\nNorth Lavernestad, WV 32410-2313', 'kirsten.kerluke@example.org', '1-640-514-4645', '2018-11-18 23:25:51', '2018-11-18 23:25:51', NULL, NULL, NULL),
('HV049', 'John Braun', 'Nu', '1995-01-01', '9994 Schamberger Knoll Suite 315\nEmmanuellechester, DE 65384', 'helene88@example.net', '656.349.5903 x638', '2018-11-18 23:25:51', '2018-11-18 23:25:51', NULL, NULL, NULL),
('HV050', 'Nia Hudson', 'Nu', '1994-11-02', '36871 Augustine Flats Suite 506\nSouth Marianne, IA 72571-4256', 'nikolaus.lula@example.org', '(602) 681-1460', '2018-11-18 23:25:51', '2018-11-18 23:25:51', NULL, NULL, NULL),
('HV051', 'Mr. Steve Kuvalis PhD', 'Nu', '1995-07-10', '1017 Dina Via Suite 574\nLueilwitzside, MT 72259', 'smitham.braden@example.org', '(717) 558-8476 x4815', '2018-11-18 23:25:52', '2018-11-18 23:25:52', NULL, NULL, NULL),
('HV052', 'Celia Renner', 'Nu', '1993-06-27', '111 Bogan Drive Suite 634\nWest Pamelachester, NJ 89143-9410', 'treutel.minnie@example.org', '1-964-734-6993', '2018-11-18 23:25:52', '2018-11-18 23:25:52', NULL, NULL, NULL),
('HV053', 'Hans Ratke', 'Nu', '1999-05-28', '8605 Amanda Valley\nMitchellburgh, NV 01260', 'larry35@example.net', '+12394157148', '2018-11-18 23:25:52', '2018-11-18 23:25:52', NULL, NULL, NULL),
('HV054', 'June McCullough', 'Nu', '1995-11-21', '5351 Bayer Junctions Apt. 148\nPort Summer, TN 28011', 'amira.koch@example.net', '+1-916-405-5459', '2018-11-18 23:25:52', '2018-11-18 23:25:52', NULL, NULL, NULL),
('HV055', 'Reyes Mueller DVM', 'Nu', '1992-04-18', '54375 Trisha Mountain\nSouth Rubyview, NM 51161-6180', 'wunsch.otilia@example.com', '(573) 295-9295', '2018-11-18 23:25:52', '2018-11-18 23:25:52', NULL, NULL, NULL),
('HV056', 'Kurtis Schmitt', 'Nu', '1998-03-24', '636 Providenci Causeway\nWarrentown, MO 89584', 'eladio22@example.net', '(253) 922-3578', '2018-11-18 23:25:53', '2018-11-18 23:25:53', NULL, NULL, NULL),
('HV057', 'Dr. Emanuel Reynolds', 'Nu', '1993-09-05', '81219 Wilderman Terrace Apt. 780\nShanelbury, MA 72657', 'guy95@example.org', '746-461-5905 x202', '2018-11-18 23:25:53', '2018-11-18 23:25:53', NULL, NULL, NULL),
('HV058', 'Prof. Jacky Balistreri II', 'Nam', '2000-04-18', '45009 Zboncak Path Suite 246\nPort Lauryn, VA 29343-1910', 'griffin12@example.com', '+1-825-305-0538', '2018-11-18 23:33:53', '2018-11-18 23:33:53', NULL, NULL, NULL),
('HV059', 'Rasheed Gaylord', 'Nu', '1998-03-24', '20956 Crooks Estates\nPort Cooper, DC 46413-8793', 'phuels@example.org', '1-665-606-5450 x993', '2018-11-18 23:34:07', '2018-11-18 23:34:07', NULL, NULL, NULL),
('HV060', 'Mr. Marcelino Prohaska IV', 'Nam', '1991-10-19', '7052 Abernathy Crossroad\nSouth Stephanie, NY 01864-1006', 'darrell.grady@example.com', '(367) 690-8664 x3135', '2018-11-18 23:34:07', '2018-11-18 23:34:07', NULL, NULL, NULL),
('HV061', 'Hazel Hirthe', 'Nu', '1990-03-26', '803 Aiyana Mill Suite 292\nLake Myrtle, OH 49649', 'vivianne74@example.org', '1-610-571-8755 x98742', '2018-11-18 23:34:07', '2018-11-18 23:34:07', NULL, NULL, NULL),
('HV062', 'Nia King', 'Nu', '1993-09-09', '7565 Roberts Island Apt. 786\nYundtfort, OH 03153', 'rosalee.yundt@example.net', '709.742.6673', '2018-11-18 23:34:07', '2018-11-18 23:34:07', NULL, NULL, NULL),
('HV063', 'Dr. Arjun Kassulke', 'Nu', '1994-10-06', '3533 Reichert Coves\nLuisaberg, HI 21859', 'qgraham@example.org', '845-446-6257', '2018-11-18 23:34:08', '2018-11-18 23:34:08', NULL, NULL, NULL),
('HV064', 'Jazmyn Reilly', 'Nam', '1994-09-19', '7594 Demetris Manors\nChandlerland, WA 70202-1441', 'rice.aurelia@example.net', '1-508-559-8020', '2018-11-18 23:34:08', '2018-11-18 23:34:08', NULL, NULL, NULL),
('HV065', 'Elisa Keeling III', 'Nam', '2000-04-02', '24633 Gislason Throughway\nBernhardtown, VA 02679-1201', 'collier.carolina@example.com', '+1 (216) 297-6768', '2018-11-18 23:34:08', '2018-11-18 23:34:08', NULL, NULL, NULL),
('HV066', 'Miss Meredith Koepp', 'Nam', '2000-06-23', '354 Pascale Squares Apt. 245\nWest Edyth, LA 08039-0160', 'haley.alberta@example.org', '1-559-415-6119 x17863', '2018-11-18 23:34:08', '2018-11-18 23:34:08', NULL, NULL, NULL),
('HV067', 'Freida Schaefer', 'Nu', '1998-04-14', '27148 Rosenbaum Tunnel Apt. 200\nWest Chanel, GA 89787-2021', 'bryce.wilderman@example.com', '497.915.0794 x15922', '2018-11-18 23:34:08', '2018-11-18 23:34:08', NULL, NULL, NULL),
('HV068', 'Dr. Providenci Miller MD', 'Nu', '1991-08-05', '37252 Casimer Mills\nBuckridgehaven, NH 20030-9649', 'jayden.murray@example.org', '(572) 536-3900 x071', '2018-11-18 23:34:09', '2018-11-18 23:34:09', NULL, NULL, NULL),
('HV069', 'Christop Lindgren', 'Nu', '1995-05-13', '56917 Pfannerstill Well Apt. 112\nJacobiton, UT 02809-0398', 'cale84@example.org', '702.415.8464', '2018-11-18 23:37:15', '2018-11-18 23:37:15', NULL, NULL, NULL),
('HV070', 'Jadyn Rice V', 'Nam', '1991-05-25', '74385 Christy Station\nBrandynstad, AL 96923', 'novella.kutch@example.com', '668.367.2074 x44521', '2018-11-18 23:37:15', '2018-11-18 23:37:15', NULL, NULL, NULL),
('HV071', 'Leonie Gislason', 'Nu', '2000-07-08', '439 Concepcion Groves Apt. 951\nNew Roxanefurt, HI 43965', 'yhirthe@example.org', '368.443.1965 x374', '2018-11-18 23:37:15', '2018-11-18 23:37:15', NULL, NULL, NULL),
('HV072', 'Mr. Jan Ebert', 'Nam', '1994-11-06', '30634 Casper Court Apt. 519\nKulasstad, CT 62236-4780', 'wyman.ella@example.com', '829-830-6953 x65991', '2018-11-18 23:37:15', '2018-11-18 23:37:15', NULL, NULL, NULL),
('HV073', 'Dr. Ismael Kozey', 'Nam', '1998-02-26', '615 Pollich Falls\nSchroederborough, MA 36606-9063', 'blick.sabryna@example.com', '+1.937.263.4952', '2018-11-18 23:37:15', '2018-11-18 23:37:15', NULL, NULL, NULL),
('HV074', 'Dr. Gustave Hills Sr.', 'Nam', '1994-09-14', '1813 Price Bridge\nGlennafurt, AL 40657-9810', 'qlebsack@example.com', '238-608-2879 x5130', '2018-11-18 23:37:15', '2018-11-18 23:37:15', NULL, NULL, NULL),
('HV075', 'Alexie Kulas', 'Nu', '1993-08-10', '2515 Renner Union Apt. 754\nNew Dallasshire, WA 53731', 'stephan.waters@example.net', '(924) 818-1309 x8686', '2018-11-18 23:37:15', '2018-11-18 23:37:15', NULL, NULL, NULL),
('HV076', 'Miss Geraldine Stamm', 'Nam', '1991-12-02', '3343 Durward Road Suite 686\nJakubowskiburgh, IN 50559-6768', 'dach.eddie@example.org', '289-887-0682', '2018-11-18 23:37:16', '2018-11-18 23:37:16', NULL, NULL, NULL),
('HV077', 'Kevin Hackett', 'Nam', '1997-12-22', '49827 Aditya Court\nHalietown, CT 59018', 'druecker@example.org', '240-957-1398', '2018-11-18 23:37:16', '2018-11-18 23:37:16', NULL, NULL, NULL),
('HV078', 'Mr. Mathias Adams PhD', 'Nam', '1998-02-05', '820 Vergie Gateway Suite 262\nLake Pearlie, ID 49872', 'ismitham@example.org', '838-601-3768 x80703', '2018-11-18 23:37:16', '2018-11-18 23:37:16', NULL, NULL, NULL),
('HV079', 'Prof. Jerrell Dickens', 'Nu', '1992-08-05', '78245 Cordell Mount\nEdythville, DE 06851-2454', 'parisian.vita@example.org', '(392) 736-2161 x720', '2018-11-18 23:37:29', '2018-11-18 23:37:29', NULL, NULL, NULL),
('HV080', 'Chelsie Towne', 'Nam', '1999-07-31', '56040 Batz Bypass Apt. 643\nEast Maddison, NH 66559-3908', 'bell49@example.net', '+12833061943', '2018-11-18 23:37:29', '2018-11-18 23:37:29', NULL, NULL, NULL),
('HV081', 'Mr. Consuelo Hudson', 'Nu', '1993-08-10', '2998 Wehner Burgs\nWest Sonny, IN 96293-3579', 'aoconner@example.net', '958.262.0249 x58953', '2018-11-18 23:37:30', '2018-11-18 23:37:30', NULL, NULL, NULL),
('HV082', 'Dr. Bill Kutch', 'Nam', '1994-06-10', '487 Lyla Pine Apt. 645\nVolkmanmouth, NV 79839', 'qfeeney@example.org', '+13936011069', '2018-11-18 23:37:30', '2018-11-18 23:37:30', NULL, NULL, NULL),
('HV083', 'Ethelyn Bernier', 'Nam', '1996-01-02', '8742 Walker Way Apt. 027\nCorkerystad, MD 21990-4695', 'laurence00@example.com', '+1-578-498-2049', '2018-11-18 23:37:30', '2018-11-18 23:37:30', NULL, NULL, NULL),
('HV084', 'Eli Welch', 'Nam', '1994-01-23', '8706 Prince Centers Apt. 929\nPredovicton, SC 48068-9474', 'nakia.wunsch@example.net', '1-627-854-5712 x853', '2018-11-18 23:37:30', '2018-11-18 23:37:30', NULL, NULL, NULL),
('HV085', 'Eli Orn', 'Nu', '1995-11-28', '51052 Luettgen Run Apt. 427\nBinsberg, TX 90631', 'bgottlieb@example.net', '1-829-277-2449 x26048', '2018-11-18 23:37:30', '2018-11-18 23:37:30', NULL, NULL, NULL),
('HV086', 'Terrell Schmitt MD', 'Nam', '1998-04-24', '17203 Prohaska Spurs Apt. 183\nWest Vicky, CT 61708', 'linnie71@example.com', '681.480.7998 x5288', '2018-11-18 23:37:30', '2018-11-18 23:37:30', NULL, NULL, NULL),
('HV087', 'Mr. Izaiah Denesik', 'Nu', '1994-10-17', '7473 Ursula Inlet Suite 780\nVonborough, FL 47531-2660', 'hzulauf@example.net', '379-697-2527', '2018-11-18 23:37:31', '2018-11-18 23:37:31', NULL, NULL, NULL),
('HV088', 'Vella Graham', 'Nam', '1994-02-24', '40641 Jedidiah Crescent\nSmithamtown, HI 00040-9528', 'ottilie27@example.org', '(297) 392-1339', '2018-11-18 23:37:31', '2018-11-18 23:37:31', NULL, NULL, NULL),
('HV089', 'Ashley Okuneva III', 'Nu', '1992-06-16', '4649 Odessa Divide\nSouth Billyside, WA 36909-8045', 'mdach@example.net', '+1.541.492.3780', '2018-11-18 23:44:52', '2018-11-18 23:44:52', NULL, NULL, NULL),
('HV090', 'Georgette Beier', 'Nam', '2000-11-21', '10739 Bechtelar Lock\nEast Cleveland, WV 27229-4857', 'asa.king@example.com', '+1.714.251.0396', '2018-11-18 23:44:52', '2018-11-18 23:44:52', NULL, NULL, NULL),
('HV091', 'Alec Gusikowski', 'Nu', '1992-05-02', '187 Ivah Station Suite 266\nEnolaburgh, NJ 32623-9813', 'krista82@example.org', '689.621.1356 x47239', '2018-11-18 23:44:52', '2018-11-18 23:44:52', NULL, NULL, NULL),
('HV092', 'Kamille Lebsack', 'Nam', '1994-02-07', '744 Wilfredo Station\nNew Connor, MN 84673', 'clovis.hammes@example.org', '+1-256-313-2156', '2018-11-18 23:44:52', '2018-11-18 23:44:52', NULL, NULL, NULL),
('HV093', 'Dr. Tre Lubowitz DDS', 'Nu', '1993-07-24', '5953 Bosco Mission Suite 847\nWatersfort, UT 85409-4648', 'schinner.fannie@example.com', '+1-717-248-1687', '2018-11-18 23:44:52', '2018-11-18 23:44:52', NULL, NULL, NULL),
('HV094', 'Laurence Jakubowski', 'Nam', '1990-08-01', '4521 Jakubowski Camp Apt. 255\nMarquiseside, TX 84269-2930', 'uullrich@example.com', '691-678-2884 x16229', '2018-11-18 23:44:52', '2018-11-18 23:44:52', NULL, NULL, NULL),
('HV095', 'Claudie Cole PhD', 'Nu', '1997-06-14', '302 Smith Mills Suite 635\nEddmouth, WV 55836', 'leif15@example.com', '489-916-5793', '2018-11-18 23:44:53', '2018-11-18 23:44:53', NULL, NULL, NULL),
('HV096', 'Dr. Elenora Runolfsdottir', 'Nam', '1990-05-13', '26787 Dahlia Views\nO\'Connellchester, CA 24474', 'murray.shad@example.com', '381-734-2789 x703', '2018-11-18 23:44:53', '2018-11-18 23:44:53', NULL, NULL, NULL),
('HV097', 'Kyle Harber', 'Nam', '1999-01-18', '4073 Johnston View Apt. 632\nEast Evalyn, RI 20046-4610', 'ebba.braun@example.net', '(883) 915-9102 x6897', '2018-11-18 23:44:53', '2018-11-18 23:44:53', NULL, NULL, NULL),
('HV098', 'Stephan Howell', 'Nam', '1990-09-14', '94880 Ardella Village Suite 788\nSouth Keenanberg, SD 53966-7677', 'schmidt.zechariah@example.net', '1-463-764-4590', '2018-11-18 23:44:53', '2018-11-18 23:44:53', NULL, NULL, NULL),
('HV099', 'Vicenta Keebler II', 'Nu', '1998-06-13', '98894 O\'Keefe Rue Apt. 887\nSouth Jenifer, WA 44356', 'queenie93@example.net', '+1.507.594.2362', '2018-11-18 23:56:35', '2018-11-18 23:56:35', NULL, NULL, NULL),
('HV100', 'Carrie Bosco', 'Nu', '1991-01-13', '917 Mann Course Apt. 192\nEast Laynestad, WY 52592-0978', 'gullrich@example.org', '1-220-762-1311 x119', '2018-11-18 23:56:35', '2018-11-18 23:56:35', NULL, NULL, NULL),
('HV101', 'Dr. Louvenia Wintheiser V', 'Nam', '1994-10-05', '71078 Kirlin Road\nEast Torrancemouth, RI 01348-4765', 'mandy.stracke@example.com', '1-247-426-0178', '2018-11-18 23:56:36', '2018-11-18 23:56:36', NULL, NULL, NULL),
('HV102', 'Gus Mitchell', 'Nam', '1990-03-08', '487 Esther Pines Apt. 017\nPort Alfredburgh, SC 36778-3131', 'robert.jacobi@example.org', '763.864.3169 x49424', '2018-11-18 23:56:36', '2018-11-18 23:56:36', NULL, NULL, NULL),
('HV103', 'Nelson Gaylord', 'Nam', '1993-04-22', '960 Brigitte Views Suite 426\nNew Alanis, MN 44511', 'jones.tanner@example.net', '1-429-992-3203 x0913', '2018-11-18 23:56:36', '2018-11-18 23:56:36', NULL, NULL, NULL),
('HV104', 'Ima Hettinger', 'Nu', '1992-08-19', '549 Hoppe Spring Suite 856\nCalichester, AK 64930', 'pmonahan@example.com', '497-243-5051', '2018-11-18 23:56:36', '2018-11-18 23:56:36', NULL, NULL, NULL),
('HV105', 'Emely Thiel', 'Nu', '1995-10-26', '13951 Stark Knoll\nReynoldsmouth, DC 20221-8511', 'elda.wiza@example.com', '1-984-445-9451 x11472', '2018-11-18 23:56:36', '2018-11-18 23:56:36', NULL, NULL, NULL),
('HV106', 'Jedediah Kertzmann', 'Nam', '1999-03-10', '65890 Salvador Isle Suite 913\nLarkinchester, NH 10972', 'altenwerth.rosalyn@example.net', '890-905-1965 x06251', '2018-11-18 23:56:36', '2018-11-18 23:56:36', NULL, NULL, NULL),
('HV107', 'Garrett Weber', 'Nam', '2000-04-22', '8548 Marquardt Drive Apt. 180\nWest Dillanchester, AZ 48732', 'berniece19@example.com', '+1.882.641.2604', '2018-11-18 23:56:36', '2018-11-18 23:56:36', NULL, NULL, NULL),
('HV108', 'Alan Goodwin', 'Nu', '1997-10-11', '3828 Etha Extension Suite 810\nLake Raymundo, NC 84636', 'fahey.jared@example.net', '398.451.5711 x046', '2018-11-18 23:56:37', '2018-11-18 23:56:37', NULL, NULL, NULL),
('HV109', 'Horace Weissnat Sr.', 'Nu', '1990-07-17', '71735 Schaefer Divide\nSouth Tiana, PA 15179', 'demetris.treutel@example.net', '+12725517072', '2018-11-18 23:56:37', '2018-11-18 23:56:37', NULL, NULL, NULL),
('HV110', 'Miss Mona Johns', 'Nu', '2000-05-09', '7143 Smitham Isle\nDejaview, MO 85117-2256', 'vstanton@example.net', '(237) 912-9308', '2018-11-18 23:56:37', '2018-11-18 23:56:37', NULL, NULL, NULL),
('HV111', 'Lorenza Baumbach', 'Nu', '1998-07-18', '41866 Anderson Island Suite 774\nNew Maryjanechester, PA 97633', 'utowne@example.org', '(757) 781-5732', '2018-11-18 23:56:37', '2018-11-18 23:56:37', NULL, NULL, NULL),
('HV112', 'Maeve Ernser I', 'Nu', '1996-10-28', '427 Nicole Cove Suite 213\nNew Garth, MA 21401', 'barrows.judge@example.net', '+1 (934) 576-6140', '2018-11-18 23:56:37', '2018-11-18 23:56:37', NULL, NULL, NULL),
('HV113', 'Caleigh Purdy', 'Nu', '2000-05-10', '9151 Fay Turnpike\nNorth Tabitha, WI 59434-4392', 'medhurst.nakia@example.org', '(445) 474-7438 x1892', '2018-11-18 23:56:37', '2018-11-18 23:56:37', NULL, NULL, NULL),
('HV114', 'Halle Schoen', 'Nam', '2000-06-18', '2268 Ethyl Alley Apt. 198\nNew Theodoraville, VA 29248', 'prudence.predovic@example.org', '1-380-484-9068 x074', '2018-11-18 23:56:37', '2018-11-18 23:56:37', NULL, NULL, NULL),
('HV115', 'Brennon Bradtke', 'Nu', '1990-04-20', '89433 Kuhlman Plains\nNorth Monserrat, MD 88359-5013', 'lschumm@example.com', '704.983.3003', '2018-11-18 23:56:37', '2018-11-18 23:56:37', NULL, NULL, NULL),
('HV116', 'Malcolm McDermott III', 'Nam', '1998-08-07', '89613 Koch Corner\nAnitashire, AL 02154-6010', 'abel04@example.com', '(465) 768-7610 x9932', '2018-11-18 23:56:38', '2018-11-18 23:56:38', NULL, NULL, NULL),
('HV117', 'Mr. Lewis Murphy', 'Nam', '1991-05-28', '472 Allen Divide\nNorth Salma, WY 28810-8739', 'torp.candelario@example.net', '313-981-3318', '2018-11-18 23:56:38', '2018-11-18 23:56:38', NULL, NULL, NULL),
('HV118', 'Prof. Connor Kirlin', 'Nam', '1996-03-04', '22199 Schultz Locks Apt. 298\nFilibertoview, AR 44333-7049', 'kiana.cummerata@example.org', '369-851-2617 x72297', '2018-11-18 23:56:38', '2018-11-18 23:56:38', NULL, NULL, NULL),
('HV119', 'Magnus Botsford PhD', 'Nu', '1992-03-24', '40352 Buckridge Pines\nSouth Efren, ND 71166-5340', 'jessy.homenick@example.com', '1-602-882-7975 x097', '2018-11-18 23:56:38', '2018-11-18 23:56:38', NULL, NULL, NULL),
('HV120', 'Doris Lebsack', 'Nam', '1997-11-08', '4320 Bechtelar Estate Apt. 196\nSouth Verlie, KY 39053-1791', 'wisoky.tania@example.net', '+1-783-306-5154', '2018-11-18 23:56:38', '2018-11-18 23:56:38', NULL, NULL, NULL),
('HV121', 'Florian Haley', 'Nu', '1994-04-09', '739 Becker Wall Apt. 213\nCristinahaven, WV 31066-8415', 'rabbott@example.com', '+1.330.399.1421', '2018-11-18 23:56:38', '2018-11-18 23:56:38', NULL, NULL, NULL),
('HV122', 'Ray Zemlak DDS', 'Nam', '1996-04-28', '375 Schroeder Hills Suite 101\nEast Eleanore, TX 36908-5320', 'estell.ernser@example.com', '1-938-774-7552 x3381', '2018-11-18 23:56:38', '2018-11-18 23:56:38', NULL, NULL, NULL),
('HV123', 'Adelbert Goyette', 'Nam', '1997-11-28', '60087 Angus Keys\nNew Ernestinestad, MA 13922', 'zbode@example.com', '(513) 619-6580 x12428', '2018-11-18 23:56:38', '2018-11-18 23:56:38', NULL, NULL, NULL),
('HV124', 'Erling Padberg', 'Nu', '1996-09-28', '409 Abagail Corners Apt. 835\nSouth Angelina, FL 89294-8931', 'heath.harvey@example.com', '+1 (925) 713-4899', '2018-11-19 00:07:44', '2018-11-19 00:07:44', NULL, NULL, NULL),
('HV125', 'Dr. Marianna Weissnat V', 'Nu', '1992-10-13', '3236 Alayna Village\nJustineland, RI 62655', 'blick.dewitt@example.org', '580.370.1095', '2018-11-19 00:07:44', '2018-11-19 00:07:44', NULL, NULL, NULL),
('HV126', 'Dr. Lavinia Cronin', 'Nam', '1996-08-11', '9639 Pete Landing\nPort Natasha, MN 90908-3085', 'kub.edmond@example.com', '+1-770-757-5081', '2018-11-19 00:07:44', '2018-11-19 00:07:44', NULL, NULL, NULL),
('HV127', 'Prof. Jaclyn Mills', 'Nam', '2000-04-12', '839 Morissette Ranch\nJanieburgh, AZ 67530', 'sporer.charley@example.org', '689-373-3612', '2018-11-19 00:07:44', '2018-11-19 00:07:44', NULL, NULL, NULL),
('HV128', 'Seamus Luettgen', 'Nam', '1990-01-16', '64638 Santina Ridges Suite 429\nGarlandberg, PA 99742', 'kutch.art@example.com', '+1-369-399-9775', '2018-11-19 00:07:44', '2018-11-19 00:07:44', NULL, NULL, NULL),
('HV129', 'Katherine Will II', 'Nam', '1999-10-25', '17303 Lesley Parkways\nEast Lelandton, OK 70840-1966', 'svandervort@example.org', '1-537-479-2516', '2018-11-19 00:07:45', '2018-11-19 00:07:45', NULL, NULL, NULL),
('HV130', 'Taya Greenfelder I', 'Nu', '1998-02-06', '973 Laron Pine Suite 630\nHartmannland, AK 93184-8441', 'blick.christine@example.com', '(806) 577-9501 x91446', '2018-11-19 00:07:45', '2018-11-19 00:07:45', NULL, NULL, NULL),
('HV131', 'Adam Boehm', 'Nam', '1998-09-04', '605 Mosciski Stream Apt. 789\nDavisshire, WA 20789', 'reece.hilpert@example.org', '(282) 367-5939 x0677', '2018-11-19 00:07:45', '2018-11-19 00:07:45', NULL, NULL, NULL),
('HV132', 'Ms. Maurine O\'Connell', 'Nu', '1999-02-22', '6472 Melyna Spurs\nHectorville, SD 49201-5983', 'wdeckow@example.net', '1-702-934-9421 x049', '2018-11-19 00:07:45', '2018-11-19 00:07:45', NULL, NULL, NULL),
('HV133', 'Arnold Baumbach', 'Nu', '1998-01-28', '8001 Wisozk Lights\nReynoldsside, SD 74935', 'ccasper@example.org', '539.388.1256', '2018-11-19 00:07:45', '2018-11-19 00:07:45', NULL, NULL, NULL),
('HV134', 'Lilliana Hauck III', 'Nam', '1997-05-09', '74695 Stokes Court\nBergemouth, DC 08889-4440', 'gdare@example.org', '437.295.3387 x539', '2018-11-19 00:07:45', '2018-11-19 00:07:45', NULL, NULL, NULL),
('HV135', 'Daisha West V', 'Nam', '1997-11-13', '23903 Cormier Meadows\nGermainemouth, VA 46123', 'jena.romaguera@example.org', '403.482.5081', '2018-11-19 00:07:45', '2018-11-19 00:07:45', NULL, NULL, NULL),
('HV136', 'Myrna Homenick', 'Nu', '1995-11-27', '5706 Kshlerin Flat Suite 128\nEast Kristian, NJ 03949-2491', 'hershel06@example.org', '589.508.9020', '2018-11-19 00:07:46', '2018-11-19 00:07:46', NULL, NULL, NULL),
('HV137', 'Prof. Felicia Zemlak', 'Nu', '1995-08-28', '4381 Kiehn Pines\nBrendonview, VT 13051', 'erau@example.org', '(914) 775-8690 x1390', '2018-11-19 00:07:46', '2018-11-19 00:07:46', NULL, NULL, NULL),
('HV138', 'Caleb Morissette PhD', 'Nam', '1994-02-08', '313 Jessie Bypass Suite 085\nCarolannestad, HI 77457-4480', 'heller.garett@example.com', '279-557-6649 x85403', '2018-11-19 00:07:46', '2018-11-19 00:07:46', NULL, NULL, NULL),
('HV139', 'Dr. Lamont Legros Jr.', 'Nam', '1999-08-18', '37034 Kunde Well\nFerryport, VA 04337', 'fcasper@example.net', '343.416.6018 x625', '2018-11-19 00:07:46', '2018-11-19 00:07:46', NULL, NULL, NULL),
('HV140', 'Allison Raynor DDS', 'Nam', '1998-02-22', '127 Hyatt Motorway Apt. 841\nLake Mariela, NV 33286', 'moen.hallie@example.com', '(962) 254-2187 x3042', '2018-11-19 00:07:46', '2018-11-19 00:07:46', NULL, NULL, NULL),
('HV141', 'Amanda Klocko', 'Nu', '1999-10-10', '1828 Yessenia Green Suite 381\nNorth Angelicatown, NC 31384', 'zackery99@example.com', '+1-456-900-2258', '2018-11-19 00:07:47', '2018-11-19 00:07:47', NULL, NULL, NULL),
('HV142', 'Desiree Brekke', 'Nu', '1990-02-25', '5226 Labadie Haven Suite 082\nNorth Murphyhaven, ME 87613', 'vincenzo54@example.org', '515.227.2044 x295', '2018-11-19 00:07:47', '2018-11-19 00:07:47', NULL, NULL, NULL),
('HV143', 'Nico Bergstrom', 'Nam', '1995-01-19', '304 Israel Spurs Apt. 176\nNorth Mollieland, UT 46789', 'cjones@example.org', '(817) 269-9521', '2018-11-19 00:07:47', '2018-11-19 00:07:47', NULL, NULL, NULL),
('HV144', 'Enid Heller', 'Nu', '1998-02-14', '291 Gaylord Courts Suite 313\nNew Xzavier, IL 58142-9715', 'zelma.lockman@example.net', '1-505-968-5461', '2018-11-19 00:07:47', '2018-11-19 00:07:47', NULL, NULL, NULL),
('HV145', 'Jessyca O\'Conner MD', 'Nam', '1994-07-19', '9873 Kuhlman Unions Suite 302\nVallieport, NJ 99628', 'zvonrueden@example.org', '+1-605-789-2775', '2018-11-19 00:07:48', '2018-11-19 00:07:48', NULL, NULL, NULL),
('HV146', 'Jedidiah Weber', 'Nu', '1997-05-03', '4178 Demond Skyway Apt. 739\nAshleyton, MN 26138', 'vivienne32@example.org', '+14864470168', '2018-11-19 00:07:48', '2018-11-19 00:07:48', NULL, NULL, NULL),
('HV147', 'Oswald Lockman', 'Nu', '1995-08-26', '375 Weimann Station\nWest Dolly, ND 07591-7301', 'osvaldo.blick@example.com', '+1-709-274-6993', '2018-11-19 00:07:48', '2018-11-19 00:07:48', NULL, NULL, NULL),
('HV148', 'Emmitt Mayert', 'Nu', '2000-01-12', '19938 Conroy Keys Suite 077\nPort Websterburgh, NY 06478-8139', 'rkunze@example.org', '527-539-2683 x7775', '2018-11-19 00:07:48', '2018-11-19 00:07:48', NULL, NULL, NULL),
('HV149', 'Lê Hồng Đạt', 'Nữ', '1996-02-23', 'Cần Thơ', 'dat@gmail.com', '1234567890', '2018-11-28 08:39:30', '2018-11-28 08:39:30', NULL, NULL, NULL),
('HV150', 'Lê Hồng Đạt', 'Nam', '1996-02-23', 'Cần Thơ', 'dat123@gmail.com', '01233005213', '2018-11-28 19:56:27', '2018-11-28 19:56:27', NULL, NULL, NULL),
('HV151', 'Lê Hồng Đạt', 'Nam', '1996-02-23', 'Cần Thơ', 'dat45@gmail.com', '0962682357', '2018-11-28 19:58:08', '2018-11-28 19:58:08', NULL, NULL, NULL),
('HV152', 'Lê Hồng Đạt', 'Nam', '1996-02-23', 'Cần Thơ', 'dat67@gmail.com', '543221111', '2018-11-28 19:59:27', '2018-11-28 19:59:27', NULL, NULL, NULL),
('HV153', 'Lê Hồng Đạt', 'Nam', '1996-02-23', 'Cần Thơ', 'dat167@gmail.com', '54322111188', '2018-11-28 20:04:50', '2018-11-28 20:04:50', NULL, NULL, NULL),
('HV154', 'Lê Hồng Đạt', 'Nam', '1996-02-23', 'Cần Thơ', 'dat168@gmail.com', '54322111189', '2018-11-28 20:11:48', '2018-11-28 20:11:48', 123456789, '2018-11-01', 'sinh viên'),
('HV156', 'Lê Hồng Đạt', 'Nam', '2018-11-05', 'Cần Thơ', 'dat1168@gmail.com', '543221122', '2018-11-28 20:16:33', '2018-11-28 20:16:33', 12345333, '2018-11-20', 'sinh viên'),
('HV157', 'Lê Hồng Đạt', 'Nam', '2018-11-20', 'Cần Thơ', 'dat125@gmail.com', '543221123', '2018-11-28 20:20:01', '2018-11-28 20:20:01', 1234534, '2018-12-01', 'sinh viên'),
('HV158', 'Lê Hồng Đạt', 'Nam', '2018-11-20', 'Cần Thơ', 'dat1099@gmail.com', '5432211099', '2018-11-28 20:23:32', '2018-11-28 20:23:32', 12345099, '2018-12-01', 'sinh viên'),
('HV159', 'Trần Mỹ Tiên', 'Nữ', '1996-12-12', 'Cần Thơ', 'tien123@gmail.com', '54321678', '2018-11-28 20:32:17', '2018-11-28 20:32:17', 5432167, '2018-11-01', 'sinh viên'),
('HV160', 'Trần An', 'Nữ', '2018-11-07', 'An Khánh', 'kk@gmail.com', '125666666', '2018-11-28 21:02:48', '2018-11-28 21:02:48', 123456766, '2018-11-14', 'sinh viên'),
('HV161', 'Trần An', 'Nữ', '2018-11-07', 'An Khánh', 'kk12@gmail.com', '125666612', '2018-11-28 21:09:12', '2018-11-28 21:09:12', 123456712, '2018-11-14', 'sinh viên'),
('HV162', 'Lê Hồng Đạt', 'Nam', '1996-02-23', 'Cần Thơ', 'dat8@gmail.com', '0987654320', '2018-11-28 23:49:35', '2018-11-28 23:49:35', 9876543, '2018-11-08', 'sinh viên'),
('HV163', 'Trần Mỹ Tiên', 'Nam', '1996-12-23', 'Cần Thơ', 'tien3@gmail.com', '0962682356', '2018-11-29 01:14:11', '2018-11-29 01:14:11', 87654387, '2018-11-29', 'sinh viên'),
('HV164', 'Nguyen thi C', 'Nữ', '1996-02-23', 'Cần Thơ', 'dat1@gmail.com', '01233005214', '2018-11-29 19:26:22', '2018-11-29 19:26:22', 385652406, '2018-09-03', 'sinh viên'),
('HV165', 'Nguyen thi C', 'Nam', '2018-11-06', 'Cần Thơ', 'dat3@gmail.com', '01233005216', '2018-11-29 19:30:37', '2018-11-29 19:30:37', 385652409, '2018-11-30', 'sinh viên'),
('HV166', 'L ê Hồng Đạt', 'Nam', '2018-11-30', 'Cần Thơ', 'hondat@gmail.com', '01233005217', '2018-11-29 19:35:31', '2018-11-29 19:35:31', 385652450, '2018-11-30', 'sinh viên'),
('HV167', 'L ê Hồng Đạt', 'Nam', '2018-11-14', 'Cần Thơ', 'hodat@gmail.com', '01233005218', '2018-11-29 19:37:16', '2018-11-29 19:37:16', 385652460, '2018-11-27', 'sinh viên'),
('HV168', 'sxsww', 'Nam', '2018-10-29', 'wsw', '11@gmail.com', '1111111', '2018-11-29 19:47:49', '2018-11-29 19:47:49', 234567, '2018-11-07', 'sii'),
('HV169', 'aaza', 'Nam', '2018-11-06', '345 vv', 'aa@gmail.com', '12323', '2018-11-29 19:50:19', '2018-11-29 19:50:19', 97743438, '2018-11-12', 'sinh viên'),
('HV170', 'nhjjj', 'Nam', '2018-11-06', 'eutlupo\'', 'aa22@gmail.com', '234567855', '2018-11-29 20:00:36', '2018-11-29 20:00:36', 23456799, '2018-11-07', 'sinh viên'),
('HV171', 'Lin lin', 'Nữ', '2018-10-30', '7701 Hermann VistaSouth Colt, CT 12732', 'ggg@gmail.com', '12345678899', '2018-11-29 23:46:25', '2018-11-29 23:46:25', 123456777, '2018-11-21', 'sii'),
('HV172', 'Nguyen Thi Mai', 'Nữ', '1996-12-12', 'Cần Thơ', 'mai@gmail.com', '1234567898', '2018-11-30 00:53:50', '2018-11-30 00:53:50', 765443433, '2018-11-09', 'sinh viên');

--
-- Bẫy `hocvien`
--
DELIMITER $$
CREATE TRIGGER `hocvien_table_insert` BEFORE INSERT ON `hocvien` FOR EACH ROW BEGIN
         INSERT INTO hocvien_sq1 VALUES (NULL);
         SET NEW.MaHocVien = CONCAT("HV", LPAD(LAST_INSERT_ID(), 3, "00"));
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien_sq1`
--

CREATE TABLE `hocvien_sq1` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocvien_sq1`
--

INSERT INTO `hocvien_sq1` (`id`) VALUES
(5),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145),
(146),
(147),
(148),
(149),
(150),
(151),
(152),
(153),
(154),
(156),
(157),
(158),
(159),
(160),
(161),
(162),
(163),
(164),
(165),
(166),
(167),
(168),
(169),
(170),
(171),
(172);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `MaKhoa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhoaHoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Nam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`MaKhoa`, `TenKhoaHoc`, `Nam`, `created_at`, `updated_at`) VALUES
('K001', 'K01', '2018', '2018-11-14 03:38:28', '2018-11-14 03:38:28'),
('K002', 'khóa 2', '2019', '2018-11-28 06:43:38', '2018-11-28 06:43:38'),
('K003', 'Khóa 3', '2020', '2018-11-28 06:43:53', '2018-11-28 06:43:53');

--
-- Bẫy `khoahoc`
--
DELIMITER $$
CREATE TRIGGER `khoahoc_table_insert` BEFORE INSERT ON `khoahoc` FOR EACH ROW BEGIN
         INSERT INTO khoahoc_sq1 VALUES (NULL);
         SET NEW.MaKhoa = CONCAT("K", LPAD(LAST_INSERT_ID(), 3, "00"));
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc_sq1`
--

CREATE TABLE `khoahoc_sq1` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc_sq1`
--

INSERT INTO `khoahoc_sq1` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `MaKhuVuc` int(10) UNSIGNED NOT NULL,
  `TenKhuVuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`MaKhuVuc`, `TenKhuVuc`, `created_at`, `updated_at`) VALUES
(1, 'A100', '2018-11-14 03:58:20', '2018-11-14 03:58:20'),
(4, 'C5', '2018-11-28 21:36:21', '2018-11-28 21:36:26'),
(6, 'TN', '2018-11-28 21:41:58', '2018-11-28 21:41:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(10) UNSIGNED NOT NULL,
  `TenKM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ThoiGianBD` date NOT NULL,
  `ThoiGianKT` date NOT NULL,
  `MucGiam` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TenKM`, `ThoiGianBD`, `ThoiGianKT`, `MucGiam`, `created_at`, `updated_at`) VALUES
(1, 'Giảm 50%', '2018-11-05', '2018-11-30', 500000.00, '2018-11-17 23:47:33', '2018-11-27 01:06:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kythis`
--

CREATE TABLE `kythis` (
  `MaKiThi` int(10) UNSIGNED NOT NULL,
  `TenKiThi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaCC` int(10) UNSIGNED NOT NULL,
  `NgayThi` date NOT NULL,
  `GioBatDau` time NOT NULL,
  `GioKetThuc` time NOT NULL,
  `LePhi` double(255,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kythis`
--

INSERT INTO `kythis` (`MaKiThi`, `TenKiThi`, `MaCC`, `NgayThi`, `GioBatDau`, `GioKetThuc`, `LePhi`, `created_at`, `updated_at`) VALUES
(2, 'Kì thi Toeic I', 1, '2018-12-07', '01:00:00', '03:00:00', 15000000.00, '2018-11-15 09:19:52', '2018-11-15 09:19:52'),
(3, 'demo', 1, '2018-10-28', '22:00:00', '23:11:00', 6500.00, '2018-11-25 08:50:18', '2018-11-25 08:50:18'),
(4, 'toeic II', 1, '2018-12-18', '06:03:00', '17:02:00', 1100000.00, '2018-11-25 22:19:04', '2018-11-25 22:19:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaLopHoc` int(10) UNSIGNED NOT NULL,
  `TenLopHoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ImgLopHoc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenLop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_TietHoc` int(10) UNSIGNED NOT NULL,
  `SoTuanHoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GioiThieu` text COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`MaLop`, `TenLop`, `id_TietHoc`, `SoTuanHoc`, `GioiThieu`, `Hinh`, `created_at`, `updated_at`) VALUES
('L001', 'Pre TOEIC Tối', 4, '13', '<p>Rrow itself, let it be sorrow; let him love it; let him pursue it, ishing for its acquisitiendum. Because he will ab hold, unless but through concer, and also of those who resist. Now a pure snore disturbeded sum dust. He ejjnoyes, in order that somewon, also with a severe one, unless of life.</p>', 'BDO0_dn.jpg', '2018-11-15 10:21:34', '2018-11-28 21:39:20'),
('L002', 'TOEIC  350', 4, '10', '<p>Rrow itself, let it be sorrow; let him love it; let him pursue it, ishing for its acquisitiendum. Because he will ab hold, unless but through concer, and also of those who resist. Now a pure snore disturbeded sum dust. He ejjnoyes, in order that somewon, also with a severe one, unless of life.</p>', 'Ot5e_em.jpg', '2018-11-15 10:49:19', '2018-11-28 05:57:27'),
('L003', 'aaa', 1, '10', '<p>zzzz</p>', '0VXZ_anh.jpg', '2018-11-22 22:59:23', '2018-11-28 05:57:11'),
('L004', 'Tiếng anh trẻ em', 3, '15', '<h2 style=\"font-style:normal; text-align:start\">&nbsp;</h2>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">Sự tự tin sử dụng tiếng Anh l&agrave; lợi thế cho con bạn ngay từ l&uacute;c c&ograve;n ngồi tr&ecirc;n ghế nh&agrave; trường, để trẻ c&oacute; thể tự nhi&ecirc;n ph&aacute;t triển kiến thức v&agrave; nền tảng th&agrave;nh c&ocirc;ng cho c&aacute;c cơ hội nghề nghiệp trong tương lai.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">C&aacute;c kh&oacute;a học tiếng Anh cho trẻ em tại Hội đồng Anh được thiết kế đặc biệt dựa tr&ecirc;n đặc t&iacute;nh của mỗi c&aacute; nh&acirc;n, v&agrave; được giảng dạy bởi c&aacute;c chuy&ecirc;n gia tiếng Anh to&agrave;n cầu lu&ocirc;n t&acirc;m huyết với sự nghiệp gi&aacute;o dục trẻ em.&nbsp;</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">Tại Hội đồng Anh, ch&uacute;ng t&ocirc;i khuyến kh&iacute;ch trẻ tự do ph&aacute;t biểu &yacute; kiến, được chơi đ&ugrave;a, v&agrave; tương t&aacute;c trong một m&ocirc;i trường l&agrave;nh manh, an to&agrave;n v&agrave; thoải m&aacute;i, để trẻ chuẩn bị nền tảng tốt nhất cho tương lai.&nbsp;</p>', '2J7O_lo.jpeg', '2018-11-28 05:55:34', '2018-11-28 21:39:31'),
('L005', 'Tiếng anh giao tiếp', 4, '11', '<p>Tiếng anh giao tiếp</p>', 'DoiH_thi.jpg', '2018-11-28 06:01:14', '2018-11-28 06:01:14'),
('L006', 'Tiếng anh chứng chỉ A', 4, '15', '<p>Tiếng anh thi chứng chỉ A</p>', 'z7Hs_tanh.jpg', '2018-11-28 06:01:53', '2018-11-28 06:34:10'),
('L007', 'Tiếng anh chứng chỉ B', 4, '13', '<p>Tiếng anh thi chứng chỉ B</p>', 'iW0d_2.jpg', '2018-11-28 06:22:08', '2018-11-28 06:39:52'),
('L008', 'Tiếng anh chứng chỉ C', 4, '13', '<p>Tiếng anh thi chứng chỉ C</p>', 'MMRn_tải xuống (1).jpg', '2018-11-28 06:22:40', '2018-11-28 06:40:02'),
('L010', 'Tiếng anh cấp tốc', 4, '15', '<p>Tiếng anh cấp tốc</p>', 'Utke_banner5.jpg', '2018-11-28 06:25:24', '2018-11-28 06:25:24'),
('L011', 'Tiếng anh ielts', 1, '13', '<p>Tiếng anh ielts</p>', 'TByD_1.jpg', '2018-11-28 06:54:48', '2018-11-28 06:54:48');

--
-- Bẫy `lophoc`
--
DELIMITER $$
CREATE TRIGGER `lop_table_insert` BEFORE INSERT ON `lophoc` FOR EACH ROW BEGIN
         INSERT INTO lop_sq1 VALUES (NULL);
         SET NEW.MaLop = CONCAT("L", LPAD(LAST_INSERT_ID(), 3, "00"));
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lopkhoa`
--

CREATE TABLE `lopkhoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaKhoa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lopkhoa` double(8,2) DEFAULT NULL,
  `NgayKhaiGiang` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayChan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `HocPhi` float(255,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lopkhoa`
--

INSERT INTO `lopkhoa` (`id`, `MaLop`, `MaKhoa`, `lopkhoa`, `NgayKhaiGiang`, `NgayKetThuc`, `TieuDe`, `NgayChan`, `created_at`, `updated_at`, `HocPhi`) VALUES
(1, 'L001', 'K001', NULL, '2018-11-23', '2019-02-23', 'Khai giảng Pre TOEIC Tối', '[\"3\",\"4\",\"5\"]', '2018-11-15 10:45:13', '2018-11-28 01:39:22', 3500000.00),
(2, 'L001', 'K001', NULL, '2018-12-01', '2019-02-19', 'Khai giảng lớp TOEIC Tối', '[\"2\",\"4\",\"5\"]', '2018-11-15 10:51:21', '2018-11-20 20:27:21', 3500000.00),
(3, 'L002', 'K001', NULL, '2018-11-25', '2019-02-18', 'THI TOEIC', '[\"2\",\"4\",\"5\"]', '2018-11-20 00:59:23', '2018-11-20 02:21:39', 4000000.00),
(4, 'L001', 'K001', NULL, '2018-12-19', '2018-12-11', 'Khai giảng Pre TOEIC Tối', '[\"3\",\"4\",\"5\"]', '2018-11-25 22:37:49', '2018-11-28 01:39:33', 3500000.00),
(5, 'L004', 'K001', NULL, '2018-12-09', '2019-02-01', 'Tếng anh trẻ em tối', '[\"2\",\"4\",\"6\"]', '2018-11-28 06:27:17', '2018-11-28 06:32:28', 3000000.00),
(6, 'L007', 'K001', NULL, '2019-01-01', '2019-02-01', 'Chứng chỉ B tối', '[\"3\",\"5\",\"7\"]', '2018-11-28 06:31:27', '2018-11-28 06:32:17', 4000000.00),
(7, 'L006', 'K001', NULL, '2018-12-19', '2019-01-01', 'Tiếng anh chứng A sáng', '[\"2\",\"4\",\"6\"]', '2018-11-28 06:33:31', '2018-11-28 06:45:25', 2500000.00),
(8, 'L005', 'K002', NULL, '2018-12-01', '2019-01-01', 'Tiếng anh giao tiếp', '[\"3\",\"5\",\"7\"]', '2018-11-28 06:55:41', '2018-11-28 06:55:41', 5000000.00),
(9, 'L008', 'K001', NULL, '2018-12-17', '2019-01-31', 'Khai giảng chứng chỉ C', '[\"3\",\"5\",\"7\"]', '2018-11-28 21:45:55', '2018-11-28 21:45:55', 6000000.00),
(10, 'L011', 'K001', NULL, '2018-12-20', '2018-12-01', 'Khai giảng ielts', '[\"2\",\"4\",\"6\"]', '2018-11-28 21:48:05', '2018-11-28 21:51:26', 7000000.00),
(11, 'L010', 'K001', NULL, '2018-12-21', '2019-01-01', 'Tiếng anh cấp tốc sáng', '[\"3\",\"5\",\"7\"]', '2018-11-28 21:57:06', '2018-11-28 21:57:06', 4000000.00),
(12, 'L003', 'K001', NULL, '2018-11-29', '2018-12-01', 'Tiếng anh cuối tuần', '[\"7\",\"CN\"]', '2018-11-28 21:57:40', '2018-11-28 21:57:40', 3000000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_sq1`
--

CREATE TABLE `lop_sq1` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_sq1`
--

INSERT INTO `lop_sq1` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_20_141657_create_khoahoc_table', 1),
(4, '2018_09_20_141658_create_khoahoc_sq1_table', 1),
(5, '2018_09_20_155052_create_hocvien_table', 1),
(6, '2018_09_20_155129_create_giangvien_table', 1),
(7, '2018_09_21_141656_create_tiethoc_table', 1),
(8, '2018_09_21_141658_create_khuvuc_table', 1),
(9, '2018_09_21_141659_create_phonghoc_table', 1),
(10, '2018_09_21_141660_create_lophoc_table', 1),
(11, '2018_09_21_150809_create_lopkhoa_table', 1),
(12, '2018_09_21_184644_create_lop_table', 1),
(13, '2018_09_21_184645_create_nhom_table', 2),
(14, '2018_09_21_184744_create_phieudkhoc_table', 2),
(15, '2018_09_21_184835_create_khuyenmai_table', 2),
(16, '2018_09_21_185728_create_monhoc_table', 2),
(17, '2018_09_21_190127_create_tuanhoc_table', 2),
(18, '2018_09_21_190152_create_tkb_table', 2),
(19, '2018_09_21_190213_create_thoigian_table', 2),
(20, '2018_09_21_190508_create_hocphi_table', 2),
(21, '2018_09_23_165150_create_hoadondkhoc_table', 2),
(22, '2018_09_25_092253_create_taikhoan_table', 3),
(23, '2018_09_25_092254_create_tkhocvien_table', 3),
(24, '2018_09_25_092308_create_tkgiangvien_table', 3),
(25, '2018_09_25_092308_create_tkhocgiangvien_table', 3),
(26, '2018_09_25_095724_create_chitiet_tiethoc_table', 3),
(27, '2018_09_25_154119_create_cbtt_table', 3),
(28, '2018_09_25_160527_create_tb_table', 3),
(29, '2018_09_25_163928_create_tkcbtt_table', 3),
(30, '2018_09_26_081426_create_chungchis_table', 3),
(31, '2018_09_26_082400_create_kythis_table', 3),
(32, '2018_09_26_082401_create_phieudkthis_table', 3),
(33, '2018_09_26_091717_create_diemthichungchis_table', 3),
(34, '2018_09_26_092908_create_hoadonthis_table', 3),
(35, '2018_09_26_141344_create_co_table', 3),
(36, '2018_09_26_153514_create_tuan_hocs_table', 3),
(37, '2018_09_26_153515_create_cotuanhoc_table', 3),
(38, '2018_09_26_161210_create_day_mon_hocs_table', 3),
(39, '2018_09_26_161548_create_thuoc_lop_hocs_table', 3),
(40, '2018_09_30_075703_create_tkhv_table', 3),
(41, '2018_09_30_104424_create_hocvien_sq1_table', 3),
(42, '2018_09_30_104444_create_giangvien_sq1_table', 3),
(43, '2018_09_30_104509_create_cbtt_sq1_table', 3),
(44, '2018_10_05_205838_create_nhom_sq1_table', 3),
(45, '2018_10_12_161355_create_slide_table', 3),
(46, '2018_10_13_221733_create_lop_sq1_table', 3),
(47, '2018_10_27_160406_create_chitietphancong_table', 3),
(55, '2018_11_14_034637_create_trigger_lop', 7),
(56, '2018_11_14_033204_create_trigger_hv', 8),
(57, '2018_11_14_034233_create_trigger_gv', 8),
(58, '2018_11_14_034337_create_trigger_cbtt', 8),
(59, '2018_11_14_034625_create_trigger_khoa', 8),
(60, '2018_11_14_034650_create_trigger_nhom', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` int(10) UNSIGNED NOT NULL,
  `TenMonHoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GioiThieu` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`, `GioiThieu`, `created_at`, `updated_at`) VALUES
(1, 'Speaking', 'Luyện nói', '2018-11-14 04:47:58', '2018-11-14 04:50:58'),
(2, 'IELTS Speaking', 'Luyện nói cho kì thi IELTS', '2018-11-21 00:51:05', '2018-11-21 00:51:05'),
(3, 'TOEIC Reading', '122', '2018-11-21 00:51:30', '2018-11-21 00:51:30'),
(5, 'Grammar', '<p>Ngữ ph&aacute;p l&agrave; .................</p>', '2018-11-28 21:29:16', '2018-11-28 21:29:16'),
(6, 'Writing', '<p>viết l&agrave;</p>', '2018-11-28 21:39:03', '2018-11-28 21:39:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom`
--

CREATE TABLE `nhom` (
  `MaNhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `MaPhongHoc` int(10) UNSIGNED DEFAULT NULL,
  `TenNhom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SLHocVien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom`
--

INSERT INTO `nhom` (`MaNhom`, `id`, `MaPhongHoc`, `TenNhom`, `SLHocVien`, `created_at`, `updated_at`) VALUES
('N009', 3, 11, 'test', 10, NULL, '2018-11-26 11:47:12'),
('N056', 2, 12, 'Nhóm1', 9, NULL, NULL),
('N057', 2, 13, 'Nhóm2', 9, NULL, NULL),
('N058', 2, 14, 'Nhóm3', 9, NULL, NULL),
('N060', 7, 11, 'Nhóm1', 10, NULL, NULL),
('N061', 7, 11, 'Nhóm1', 10, NULL, NULL);

--
-- Bẫy `nhom`
--
DELIMITER $$
CREATE TRIGGER `nhom_table_insert` BEFORE INSERT ON `nhom` FOR EACH ROW BEGIN
         INSERT INTO nhom_sq1 VALUES (NULL);
         SET NEW.MaNhom = CONCAT("N", LPAD(LAST_INSERT_ID(), 3, "00"));
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom_sq1`
--

CREATE TABLE `nhom_sq1` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom_sq1`
--

INSERT INTO `nhom_sq1` (`id`) VALUES
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudkhoc`
--

CREATE TABLE `phieudkhoc` (
  `id_PhieuDKHoc` int(10) UNSIGNED NOT NULL,
  `MaHocVien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudkhoc`
--

INSERT INTO `phieudkhoc` (`id_PhieuDKHoc`, `MaHocVien`, `id`, `TinhTrang`, `created_at`, `updated_at`) VALUES
(92, 'HV135', 2, 1, '2018-11-19 00:37:01', '2018-11-19 00:37:01'),
(93, 'HV120', 2, 1, '2018-11-19 00:37:02', '2018-11-19 00:37:02'),
(94, 'HV068', 2, 1, '2018-11-19 00:37:02', '2018-11-19 00:37:02'),
(95, 'HV049', 2, 1, '2018-11-19 00:37:02', '2018-11-19 00:37:02'),
(96, 'HV105', 2, 1, '2018-11-19 00:37:02', '2018-11-19 00:37:02'),
(97, 'HV091', 2, 1, '2018-11-19 00:37:02', '2018-11-19 00:37:02'),
(98, 'HV133', 2, 1, '2018-11-19 00:37:02', '2018-11-19 00:37:02'),
(99, 'HV085', 2, 1, '2018-11-19 00:37:03', '2018-11-19 00:37:03'),
(100, 'HV098', 2, 1, '2018-11-19 00:37:03', '2018-11-19 00:37:03'),
(103, 'HV067', 2, 1, '2018-11-19 00:37:03', '2018-11-19 00:37:03'),
(104, 'HV106', 2, 1, '2018-11-19 00:37:03', '2018-11-19 00:37:03'),
(105, 'HV081', 2, 1, '2018-11-19 00:37:03', '2018-11-19 00:37:03'),
(106, 'HV108', 2, 1, '2018-11-19 00:37:04', '2018-11-19 00:37:04'),
(107, 'HV110', 2, 1, '2018-11-19 00:37:04', '2018-11-19 00:37:04'),
(108, 'HV100', 2, 1, '2018-11-19 00:37:04', '2018-11-19 00:37:04'),
(109, 'HV136', 2, 1, '2018-11-19 00:37:04', '2018-11-19 00:37:04'),
(110, 'HV050', 2, 1, '2018-11-19 00:37:04', '2018-11-19 00:37:04'),
(111, 'HV147', 2, 1, '2018-11-19 00:37:04', '2018-11-19 00:37:04'),
(112, 'HV049', 2, 1, '2018-11-19 00:37:04', '2018-11-19 00:37:04'),
(113, 'HV040', 2, 1, '2018-11-19 00:37:05', '2018-11-19 00:37:05'),
(114, 'HV147', 2, 1, '2018-11-19 00:37:05', '2018-11-19 00:37:05'),
(115, 'HV128', 2, 1, '2018-11-19 00:37:05', '2018-11-19 00:37:05'),
(116, 'HV056', 2, 1, '2018-11-19 00:37:05', '2018-11-19 00:37:05'),
(124, 'HV005', 7, 0, '2018-11-28 08:07:54', '2018-11-28 08:07:54'),
(125, 'HV163', 7, 1, '2018-11-29 01:19:03', '2018-11-29 01:19:03'),
(126, 'HV172', 7, 1, '2018-11-30 00:56:24', '2018-11-30 00:56:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudkthis`
--

CREATE TABLE `phieudkthis` (
  `idphieudk` int(10) UNSIGNED NOT NULL,
  `MaKiThi` int(10) UNSIGNED NOT NULL,
  `MaHocVien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudkthis`
--

INSERT INTO `phieudkthis` (`idphieudk`, `MaKiThi`, `MaHocVien`, `TinhTrang`, `created_at`, `updated_at`) VALUES
(4, 2, 'HV085', '1', '2018-11-19 00:31:49', '2018-11-19 00:31:49'),
(5, 2, 'HV082', '1', '2018-11-19 00:31:49', '2018-11-19 00:31:49'),
(6, 2, 'HV125', '1', '2018-11-19 00:31:50', '2018-11-19 00:31:50'),
(7, 2, 'HV134', '1', '2018-11-19 00:31:50', '2018-11-19 00:31:50'),
(8, 2, 'HV038', '1', '2018-11-19 00:31:50', '2018-11-19 00:31:50'),
(9, 2, 'HV126', '1', '2018-11-19 00:31:51', '2018-11-19 00:31:51'),
(10, 2, 'HV048', '1', '2018-11-19 00:31:51', '2018-11-19 00:31:51'),
(11, 2, 'HV144', '1', '2018-11-19 00:31:51', '2018-11-19 00:31:51'),
(12, 2, 'HV135', '1', '2018-11-19 00:31:51', '2018-11-19 00:31:51'),
(14, 2, 'HV061', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(15, 2, 'HV118', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(16, 2, 'HV089', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(17, 2, 'HV104', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(18, 2, 'HV080', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(19, 2, 'HV068', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(20, 2, 'HV078', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(21, 2, 'HV095', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(22, 2, 'HV086', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(23, 2, 'HV130', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(24, 2, 'HV057', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(25, 2, 'HV094', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(27, 2, 'HV065', '1', '2018-11-19 00:31:52', '2018-11-19 00:31:52'),
(28, 2, 'HV129', '1', '2018-11-19 00:31:53', '2018-11-19 00:31:53'),
(46, 4, 'HV005', '0', '2018-11-28 08:36:39', '2018-11-28 08:36:39'),
(47, 4, 'HV163', '1', '2018-11-29 01:19:39', '2018-11-29 01:19:39'),
(48, 4, 'HV172', '1', '2018-11-30 01:00:12', '2018-11-30 01:00:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phonghoc`
--

CREATE TABLE `phonghoc` (
  `MaPhongHoc` int(10) UNSIGNED NOT NULL,
  `MaKhuVuc` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phonghoc`
--

INSERT INTO `phonghoc` (`MaPhongHoc`, `MaKhuVuc`, `created_at`, `updated_at`) VALUES
(11, 1, '2018-11-14 21:46:29', '2018-11-14 21:46:29'),
(12, 1, '2018-11-20 12:04:33', '2018-11-20 12:04:33'),
(13, 1, NULL, NULL),
(14, 1, '2018-11-20 21:55:36', '2018-11-20 21:55:36'),
(88, 1, '2018-11-29 00:24:51', '2018-11-29 00:24:51'),
(100, 4, '2018-11-28 21:40:36', '2018-11-28 21:40:36'),
(113, 1, '2018-11-29 00:24:37', '2018-11-29 00:24:37'),
(444, 1, '2018-11-29 00:24:43', '2018-11-29 00:24:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'banner.jpg', NULL, NULL),
(2, 'banner5.jpg', NULL, NULL),
(3, 'banner3.png\r\n\r\n\r\n\r\n', NULL, NULL),
(4, 'banner1.jpg', NULL, NULL),
(5, 'banner2.jpg', NULL, NULL),
(6, 'banner3.png', NULL, NULL),
(7, 'banner4.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `password`, `quyen`, `confirmed`, `confirmation_code`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
('1111', '$2y$10$H571meBAmE8WgNWDctFb0erSaxlqZrnZxqwqNMOQZkgZgA5XwdHLu', 4, 1, NULL, NULL, '1543546219_a.jpg', '2018-11-29 19:50:19', '2018-11-29 19:50:19'),
('Admin', '$2y$10$c08QS2JrZNznV/rozMfQXOqWjsJTosi/9kDsl7X1yTA2w2pC7KNRu', 1, 1, NULL, 'lKCrqiq2EBd44diG43XGyaBC6MZzHj5NO7oTsd4pr7MzqRFhlwtEj8IjMUex', NULL, NULL, NULL),
('Admin1', '$2y$10$CiOYojvN6ArMgcKU4wzbQOr12poUU6jTqFq96rN5FPIijoTUucQh6', 1, 1, NULL, 'b6wAAgBaHvp94a7aL4CSFF9EseF1i8w9UBl2PShM0XLkvoTF58Rc0YFB2zyQ', '1543169639_jagaaaan_oc2.jpg', '2018-11-14 02:31:46', '2018-11-14 02:31:46'),
('aff1', '$2y$10$u4cCs4dPIyiPcLemxrrSHeYlpyVLCAoVnRFr..ldTg181dc.VC2yq', 4, 0, '154346416815bff64e81b606', NULL, '1543464168_a.jpg', '2018-11-28 21:02:48', '2018-11-28 21:02:48'),
('aff12', '$2y$10$sHRtQ2IkqUdtFZ8vUCNKAunPXsP33dSZzHjcbcL47sEb3Ty6gPCkq', 4, 0, '154346455115bff6667de306', 'tAGT8hpWgdQy8fY51ajcnhWtrqXb1Sgv5JKcUEkalFlzJ1G9mjjnGwVmPaEx', '1543464551_a.jpg', '2018-11-28 21:09:12', '2018-11-28 21:09:12'),
('gg', '$2y$10$SLz0G.jlbd7YJN45tdguoOHj9B7RlF/P35vic3qdNUKn.E46YEmRi', 4, 1, NULL, NULL, '0', '2018-11-29 23:46:25', '2018-11-29 23:46:25'),
('giangv11', '$2y$10$A7hf/O615eW5FPDS1cikxe8OvC.iFya4YzzB5MrYbLDfO3hb9iCV6', 4, 1, NULL, NULL, '1543546068_a.jpg', '2018-11-29 19:47:49', '2018-11-29 19:47:49'),
('giangvien', '$2y$10$EwLsuKDLlaVluLxk1.wfxuNfbxdxNe5qjdKrGuzTaf8sPGHn2E59C', 3, 1, NULL, 'dWIRPDU6zu78sgha8rXa2I3IQIv6fEMlq6HN5uqUUPtX3ZE9RqcBaOBpTT8y', '1543470802_a.jpg', '2018-11-28 22:49:39', '2018-11-28 22:49:39'),
('gjg', '$2y$10$TX1bvHMUHvOFwxiu.3nYhu/gnQs/oLc94D858p6lKiGTIEFkxOeQe', 4, 1, NULL, NULL, '1543546836_a.jpg', '2018-11-29 20:00:36', '2018-11-29 20:00:36'),
('hodat', '$2y$10$EPRjyned5H97b/KvDD48xOXjeIw6jqFgJB2FJIodatRoIf3TJ4Yda', 4, 1, NULL, NULL, '1543545436_a.jpg', '2018-11-29 19:37:16', '2018-11-29 19:37:16'),
('hondat1', '$2y$10$iZxHt2uinE05/Zx.Tb7PLOU67STYfFE6HpF/MXgmbgl7lKYlpuD7S', 4, 1, NULL, NULL, '1543545331_a.jpg', '2018-11-29 19:35:31', '2018-11-29 19:35:31'),
('hongdat', '$2y$10$6fMpZINr7rO1Xe3bNbYNYeyC0X92v7IWsEMikPUMT.oBfICyLo1ey', 1, 0, '154341957015bfeb6b260fa5', NULL, '1543419570_a.jpg', '2018-11-28 08:39:30', '2018-11-28 08:39:30'),
('hongdat099', '$2y$10$Sbz8Da8AV4wbIrIfQJCjjeB/XwYC9rRDTHsm1ywT/MBUQv3xaHzfG', 4, 0, '154346181215bff5bb489d00', NULL, '1543461812_a.jpg', '2018-11-28 20:23:32', '2018-11-28 20:23:32'),
('hongdat1', '$2y$10$oPaouJUP7kgVy/RkY0M6cuDVI/t3uZstWHJRKqtLI5dtJDaLLGi5m', 4, 1, NULL, NULL, '1543544781_a.jpg', '2018-11-29 19:26:21', '2018-11-29 19:26:21'),
('hongdat123', '$2y$10$hKWhsxpJHa8qJZOqftv7AOOolF3yp7fWcwlfoSwuplaAOV3OxQy6q', 1, 0, '154346018615bff555a97baa', NULL, '1543460186_a.jpg', '2018-11-28 19:56:26', '2018-11-28 19:56:26'),
('hongdat222', '$2y$10$7vzS7bSMcz7cUymJhSFUGuYsIGHVM7MTBQIDbrrGIs6RXMJslZW.6', 4, 0, '154346139315bff5a1135197', NULL, '1543461393_a.jpg', '2018-11-28 20:16:33', '2018-11-28 20:16:33'),
('hongdat23', '$2y$10$5NUGemRh9kqc/FOXecKmdu7LuN8GwK/hOsMePjVk6xl45dS7a7o4y', 4, 0, '154346160115bff5ae1433c3', NULL, '1543461601_a.jpg', '2018-11-28 20:20:01', '2018-11-28 20:20:01'),
('hongdat3', '$2y$10$I9S0eD54AprYdk4us/6k7.M/0bp9YDKIbJXb789iO.h1I.UqMlSsC', 4, 0, '154354503715c00a0cd54025', NULL, '1543545037_a.jpg', '2018-11-29 19:30:37', '2018-11-29 19:30:37'),
('hongdat33', '$2y$10$/ghrfaY3G7/6NJ.GKjl.UeMnAXsUOm3FIbjKxOUKnxQFVhq3aPRBe', 4, 0, '154346136115bff59f12871e', NULL, '1543461361_a.jpg', '2018-11-28 20:16:01', '2018-11-28 20:16:01'),
('hongdat45', '$2y$10$z35n/3IBrcHX8IztX05vcOlYMqGQOOmfFuG0b5cSUTAijgJtGxEni', 1, 0, '154346028815bff55c07216b', NULL, '1543460288_a.jpg', '2018-11-28 19:58:08', '2018-11-28 19:58:08'),
('hongdat60', '$2y$10$9x7mqjbIIObgTb06VowFwOZ55qXTaHU5LLR.b5sZRZfqic9r0FgUW', 4, 0, '154346068915bff5751e4566', NULL, '1543460689_a.jpg', '2018-11-28 20:04:50', '2018-11-28 20:04:50'),
('hongdat66', '$2y$10$j3/cD1GC/pjxNZtVJqD1jewa1SZ7YN61bLb6sqHi6cVDGlJ5ermNe', 4, 0, '154346110815bff58f448506', NULL, '1543461108_a.jpg', '2018-11-28 20:11:48', '2018-11-28 20:11:48'),
('hongdat67', '$2y$10$U0A3AZJLzXdBzF1fh14rYOsii8ob3jYhkPKdYutrNYwJE.cZnrZBO', 1, 0, '154346036715bff560f8d8f8', NULL, '1543460367_a.jpg', '2018-11-28 19:59:27', '2018-11-28 19:59:27'),
('hongdat689', '$2y$10$iABrdL6nCSKHFkKks9Vr1uvhU5c4YkMnDgTuIXKw0v.ZwtzWs7NIG', 4, 0, '154346132015bff59c8b5b9e', NULL, '1543461320_a.jpg', '2018-11-28 20:15:20', '2018-11-28 20:15:20'),
('hongdat8', '$2y$10$l1KuAgvPRqAdu1zdjxiGAeupTKqV6n9BXqWAJTPWcenNL8CIU6O3m', 4, 0, '154347417415bff8bfe92add', NULL, '1543474174_a.jpg', '2018-11-28 23:49:35', '2018-11-28 23:49:35'),
('kian1', '$2y$10$c08QS2JrZNznV/rozMfQXOqWjsJTosi/9kDsl7X1yTA2w2pC7KNRu', 4, 1, NULL, '0SxknQ0J8Wjz7JSeElmu5xco7zKo7YQ1SCdqYdPqZCvxfBNCHfv1Ye7BmTTI', '1543560510_a.jpg', '2018-11-13 22:42:19', '2018-11-13 23:42:09'),
('mai123', '$2y$10$.QnfR8qI5FsZz71JjSX69eTV.TP98XraqIuEGrWpsgBoE3Uz2SOve', 4, 1, NULL, 'mm8radSczT4NfHf2yNtXVkdebSL9qtSCfBo4ne94V6ym1lNXRoRO8Vt356Lm', '1543564430_a.jpg', '2018-11-30 00:53:50', '2018-11-30 00:53:50'),
('nhanvien', '$2y$10$N3EwIYzlzmKKxeHaBmGaWeMi09uPFRZc6WNE8SsqQOr66bn5SUcfC', 2, 1, NULL, '8tYCSz3pn9NBvH7JKFUhpjHWvtebGBRGTds5JOufJyqFIt2uqAukHreqXyhf', '0', '2018-11-30 00:02:21', '2018-11-30 00:02:21'),
('tien123', '$2y$10$RKXnw9TS3nEQwi2oU9Varujn6iRJwbWYhbCibVTPqQS3KLh96tKWC', 4, 0, '154346233615bff5dc0e9bd6', NULL, '1543462336_a.jpg', '2018-11-28 20:32:17', '2018-11-28 20:32:17'),
('tien3', '$2y$10$ag3ZRNJVzkdGyVSzp3u5P.su6g6m7mJ2A7EG4gruOJFZpA/E4kl4C', 4, 1, NULL, NULL, '1543479250_a.jpg', '2018-11-29 01:14:10', '2018-11-29 01:14:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoigian`
--

CREATE TABLE `thoigian` (
  `id_ThoiGian` int(10) UNSIGNED NOT NULL,
  `Thu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thoigian`
--

INSERT INTO `thoigian` (`id_ThoiGian`, `Thu`, `created_at`, `updated_at`) VALUES
(0, 'CN', NULL, NULL),
(1, '2', NULL, NULL),
(2, '3', NULL, NULL),
(3, '4', NULL, NULL),
(4, '5', NULL, NULL),
(5, '6', NULL, NULL),
(6, '7', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `MaTB` int(10) UNSIGNED NOT NULL,
  `MaNV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenTB` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDungTB` text COLLATE utf8_unicode_ci NOT NULL,
  `LoaiTB` int(11) NOT NULL,
  `file` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`MaTB`, `MaNV`, `TenTB`, `NoiDungTB`, `LoaiTB`, `file`, `created_at`, `updated_at`) VALUES
(1, 'NV001', 'Thi toeic', '<p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></p>', 2, '1542301431_on-tap-phan-ly-thuyet.docx', '2018-11-15 10:03:51', '2018-11-15 10:03:51'),
(2, 'NV001', 'Lịch khai giảng', '<p>lịch khai giảng th&aacute;ng 12</p>', 1, '1543406465_baitap_pttkht.docx', '2018-11-28 05:01:05', '2018-11-28 05:01:05'),
(3, 'NV001', 'Ket qua thi', '<p>ggggggggggggggggggggg</p>', 3, '1543408688_baocao (1).docx', '2018-11-28 05:38:08', '2018-11-28 05:38:08'),
(4, 'NV001', 'tttttttttttt', '<p>tttttttttttttttttttttttttttttttt</p>', 1, '1543408782_1.txt', '2018-11-28 05:39:42', '2018-11-28 05:39:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc_lop_hocs`
--

CREATE TABLE `thuoc_lop_hocs` (
  `MaNhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocVien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc_lop_hocs`
--

INSERT INTO `thuoc_lop_hocs` (`MaNhom`, `MaHocVien`, `created_at`, `updated_at`) VALUES
('N009', 'HV005', NULL, NULL),
('N056', 'HV005', NULL, NULL),
('N060', 'HV005', '2018-11-29 01:21:47', '2018-11-29 01:21:47'),
('N061', 'HV005', '2018-11-30 01:02:09', '2018-11-30 01:02:09'),
('N058', 'HV040', '2018-11-20 23:04:32', '2018-11-20 23:04:32'),
('N056', 'HV049', '2018-11-20 23:04:29', '2018-11-20 23:04:29'),
('N058', 'HV049', '2018-11-20 23:04:32', '2018-11-20 23:04:32'),
('N057', 'HV050', '2018-11-20 23:04:31', '2018-11-20 23:04:31'),
('N058', 'HV056', '2018-11-20 23:04:32', '2018-11-20 23:04:32'),
('N057', 'HV067', '2018-11-20 23:04:30', '2018-11-20 23:04:30'),
('N056', 'HV068', '2018-11-20 23:04:29', '2018-11-20 23:04:29'),
('N057', 'HV081', '2018-11-20 23:04:30', '2018-11-20 23:04:30'),
('N056', 'HV085', '2018-11-20 23:04:29', '2018-11-20 23:04:29'),
('N056', 'HV091', '2018-11-20 23:04:29', '2018-11-20 23:04:29'),
('N056', 'HV098', '2018-11-20 23:04:30', '2018-11-20 23:04:30'),
('N057', 'HV100', '2018-11-20 23:04:31', '2018-11-20 23:04:31'),
('N056', 'HV105', '2018-11-20 23:04:29', '2018-11-20 23:04:29'),
('N057', 'HV106', '2018-11-20 23:04:30', '2018-11-20 23:04:30'),
('N057', 'HV108', '2018-11-20 23:04:30', '2018-11-20 23:04:30'),
('N057', 'HV110', '2018-11-20 23:04:31', '2018-11-20 23:04:31'),
('N056', 'HV120', '2018-11-20 23:04:29', '2018-11-20 23:04:29'),
('N058', 'HV128', '2018-11-20 23:04:32', '2018-11-20 23:04:32'),
('N056', 'HV133', '2018-11-20 23:04:29', '2018-11-20 23:04:29'),
('N056', 'HV135', '2018-11-20 23:04:29', '2018-11-20 23:04:29'),
('N057', 'HV136', '2018-11-20 23:04:31', '2018-11-20 23:04:31'),
('N057', 'HV147', '2018-11-20 23:04:31', '2018-11-20 23:04:31'),
('N058', 'HV147', '2018-11-20 23:04:32', '2018-11-20 23:04:32'),
('N060', 'HV163', '2018-11-29 01:21:47', '2018-11-29 01:21:47'),
('N061', 'HV163', '2018-11-30 01:02:09', '2018-11-30 01:02:09'),
('N061', 'HV172', '2018-11-30 01:02:10', '2018-11-30 01:02:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiethoc`
--

CREATE TABLE `tiethoc` (
  `id_TietHoc` int(10) UNSIGNED NOT NULL,
  `ThoiGianBD` time NOT NULL,
  `ThoiGianKT` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tiethoc`
--

INSERT INTO `tiethoc` (`id_TietHoc`, `ThoiGianBD`, `ThoiGianKT`, `created_at`, `updated_at`) VALUES
(1, '07:00:00', '11:00:00', NULL, NULL),
(3, '13:30:00', '17:00:00', NULL, NULL),
(4, '18:00:00', '22:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tkb`
--

CREATE TABLE `tkb` (
  `id_TKB` int(10) UNSIGNED NOT NULL,
  `MaNhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tkb`
--

INSERT INTO `tkb` (`id_TKB`, `MaNhom`, `created_at`, `updated_at`) VALUES
(6, 'N009', '2018-11-26 11:47:12', '2018-11-26 11:47:12'),
(7, 'N056', '2018-11-26 22:02:12', '2018-11-26 22:02:12'),
(8, 'N060', '2018-11-29 01:22:46', '2018-11-29 01:22:46'),
(9, 'N061', '2018-11-30 01:03:18', '2018-11-30 01:03:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tkcbtt`
--

CREATE TABLE `tkcbtt` (
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaNV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tkcbtt`
--

INSERT INTO `tkcbtt` (`username`, `MaNV`, `created_at`, `updated_at`) VALUES
('Admin1', 'NV001', '2018-11-14 02:31:46', '2018-11-14 02:31:46'),
('nhanvien', 'NV009', '2018-11-30 00:02:22', '2018-11-30 00:02:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tkhocgiangvien`
--

CREATE TABLE `tkhocgiangvien` (
  `UserName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tkhocgiangvien`
--

INSERT INTO `tkhocgiangvien` (`UserName`, `MaGV`, `created_at`, `updated_at`) VALUES
('giangvien', 'GV003', '2018-11-28 22:49:39', '2018-11-28 22:49:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tkhv`
--

CREATE TABLE `tkhv` (
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocVien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tkhv`
--

INSERT INTO `tkhv` (`username`, `MaHocVien`, `created_at`, `updated_at`) VALUES
('1111', 'HV169', '2018-11-29 19:50:19', '2018-11-29 19:50:19'),
('aff1', 'HV160', '2018-11-28 21:02:48', '2018-11-28 21:02:48'),
('aff12', 'HV161', '2018-11-28 21:09:12', '2018-11-28 21:09:12'),
('gg', 'HV171', '2018-11-29 23:46:25', '2018-11-29 23:46:25'),
('giangv11', 'HV168', '2018-11-29 19:47:49', '2018-11-29 19:47:49'),
('gjg', 'HV170', '2018-11-29 20:00:37', '2018-11-29 20:00:37'),
('hodat', 'HV167', '2018-11-29 19:37:16', '2018-11-29 19:37:16'),
('hondat1', 'HV166', '2018-11-29 19:35:31', '2018-11-29 19:35:31'),
('hongdat', 'HV149', '2018-11-28 08:39:30', '2018-11-28 08:39:30'),
('hongdat099', 'HV158', '2018-11-28 20:23:32', '2018-11-28 20:23:32'),
('hongdat1', 'HV164', '2018-11-29 19:26:23', '2018-11-29 19:26:23'),
('hongdat123', 'HV150', '2018-11-28 19:56:27', '2018-11-28 19:56:27'),
('hongdat222', 'HV156', '2018-11-28 20:16:33', '2018-11-28 20:16:33'),
('hongdat23', 'HV157', '2018-11-28 20:20:01', '2018-11-28 20:20:01'),
('hongdat3', 'HV165', '2018-11-29 19:30:37', '2018-11-29 19:30:37'),
('hongdat45', 'HV151', '2018-11-28 19:58:08', '2018-11-28 19:58:08'),
('hongdat60', 'HV153', '2018-11-28 20:04:50', '2018-11-28 20:04:50'),
('hongdat66', 'HV154', '2018-11-28 20:11:48', '2018-11-28 20:11:48'),
('hongdat67', 'HV152', '2018-11-28 19:59:28', '2018-11-28 19:59:28'),
('hongdat8', 'HV162', '2018-11-28 23:49:35', '2018-11-28 23:49:35'),
('kian1', 'HV005', '2018-11-13 22:42:19', '2018-11-13 22:42:19'),
('mai123', 'HV172', '2018-11-30 00:53:50', '2018-11-30 00:53:50'),
('tien123', 'HV159', '2018-11-28 20:32:17', '2018-11-28 20:32:17'),
('tien3', 'HV163', '2018-11-29 01:14:11', '2018-11-29 01:14:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuanhoc`
--

CREATE TABLE `tuanhoc` (
  `id_Tuan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuan_hocs`
--

CREATE TABLE `tuan_hocs` (
  `id_Tuan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cbtt`
--
ALTER TABLE `cbtt`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `cbtt_sq1`
--
ALTER TABLE `cbtt_sq1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietphancong`
--
ALTER TABLE `chitietphancong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietphancong_id_thoigian_foreign` (`id_ThoiGian`),
  ADD KEY `chitietphancong_id_tkb_foreign` (`id_TKB`),
  ADD KEY `chitietphancong_magv_foreign` (`MaGV`),
  ADD KEY `chitietphancong_mamonhoc_foreign` (`MaMonHoc`),
  ADD KEY `chitietphancong_manhom_foreign` (`MaNhom`);

--
-- Chỉ mục cho bảng `chitiet_tiethoc`
--
ALTER TABLE `chitiet_tiethoc`
  ADD PRIMARY KEY (`id_chitiet`);

--
-- Chỉ mục cho bảng `chungchis`
--
ALTER TABLE `chungchis`
  ADD PRIMARY KEY (`MaCC`);

--
-- Chỉ mục cho bảng `co`
--
ALTER TABLE `co`
  ADD PRIMARY KEY (`MaKM`,`MaLop`),
  ADD KEY `co_malop_foreign` (`MaLop`);

--
-- Chỉ mục cho bảng `cotuanhoc`
--
ALTER TABLE `cotuanhoc`
  ADD PRIMARY KEY (`id_Tuan`,`id_TKB`),
  ADD KEY `cotuanhoc_id_tkb_foreign` (`id_TKB`);

--
-- Chỉ mục cho bảng `day_mon_hocs`
--
ALTER TABLE `day_mon_hocs`
  ADD PRIMARY KEY (`MaMonHoc`,`MaGV`),
  ADD KEY `day_mon_hocs_magv_foreign` (`MaGV`);

--
-- Chỉ mục cho bảng `diemthichungchis`
--
ALTER TABLE `diemthichungchis`
  ADD PRIMARY KEY (`MaHocVien`,`MaKiThi`),
  ADD KEY `diemthichungchis_makithi_foreign` (`MaKiThi`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MaGV`);

--
-- Chỉ mục cho bảng `giangvien_sq1`
--
ALTER TABLE `giangvien_sq1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadondkhoc`
--
ALTER TABLE `hoadondkhoc`
  ADD PRIMARY KEY (`id_HoaDonDkHoc`),
  ADD KEY `hoadondkhoc_manhom_foreign` (`MaNhom`),
  ADD KEY `fk-MaNVNV` (`MaNV`),
  ADD KEY `hoadondkhoc_id_phieudkhoc_foreign` (`id_PhieuDKHoc`);

--
-- Chỉ mục cho bảng `hoadonthis`
--
ALTER TABLE `hoadonthis`
  ADD PRIMARY KEY (`id_hoadon`),
  ADD KEY `hoadonthis_idphieudk_foreign` (`idphieudk`),
  ADD KEY `hoadonthis_manv_foreign` (`MaNV`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`MaHocVien`);

--
-- Chỉ mục cho bảng `hocvien_sq1`
--
ALTER TABLE `hocvien_sq1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Chỉ mục cho bảng `khoahoc_sq1`
--
ALTER TABLE `khoahoc_sq1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`MaKhuVuc`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `kythis`
--
ALTER TABLE `kythis`
  ADD PRIMARY KEY (`MaKiThi`),
  ADD KEY `kythis_macc_foreign` (`MaCC`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLopHoc`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `lophoc_id_tiethoc_foreign` (`id_TietHoc`);

--
-- Chỉ mục cho bảng `lopkhoa`
--
ALTER TABLE `lopkhoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lopkhoa_malop_foreign` (`MaLop`),
  ADD KEY `lopkhoa_makhoa_foreign` (`MaKhoa`);

--
-- Chỉ mục cho bảng `lop_sq1`
--
ALTER TABLE `lop_sq1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Chỉ mục cho bảng `nhom`
--
ALTER TABLE `nhom`
  ADD PRIMARY KEY (`MaNhom`),
  ADD KEY `nhom_id_lop_khoa_foreign` (`id`),
  ADD KEY `nhom_maphonghoc_foreign` (`MaPhongHoc`);

--
-- Chỉ mục cho bảng `nhom_sq1`
--
ALTER TABLE `nhom_sq1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `phieudkhoc`
--
ALTER TABLE `phieudkhoc`
  ADD PRIMARY KEY (`id_PhieuDKHoc`),
  ADD KEY `phieudkhoc_id_foreign` (`id`),
  ADD KEY `phieudkhoc_mahocvien_foreign` (`MaHocVien`);

--
-- Chỉ mục cho bảng `phieudkthis`
--
ALTER TABLE `phieudkthis`
  ADD PRIMARY KEY (`idphieudk`),
  ADD KEY `phieudkthis_mahocvien_foreign` (`MaHocVien`),
  ADD KEY `phieudkthis_makithi_foreign` (`MaKiThi`);

--
-- Chỉ mục cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  ADD PRIMARY KEY (`MaPhongHoc`),
  ADD KEY `phonghoc_makhuvuc_foreign` (`MaKhuVuc`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `thoigian`
--
ALTER TABLE `thoigian`
  ADD PRIMARY KEY (`id_ThoiGian`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`MaTB`),
  ADD KEY `thongbao_manv_foreign` (`MaNV`);

--
-- Chỉ mục cho bảng `thuoc_lop_hocs`
--
ALTER TABLE `thuoc_lop_hocs`
  ADD PRIMARY KEY (`MaHocVien`,`MaNhom`),
  ADD KEY `thuoc_lop_hocs_manhom_foreign` (`MaNhom`);

--
-- Chỉ mục cho bảng `tiethoc`
--
ALTER TABLE `tiethoc`
  ADD PRIMARY KEY (`id_TietHoc`);

--
-- Chỉ mục cho bảng `tkb`
--
ALTER TABLE `tkb`
  ADD PRIMARY KEY (`id_TKB`),
  ADD KEY `tkb_manhom_foreign` (`MaNhom`);

--
-- Chỉ mục cho bảng `tkcbtt`
--
ALTER TABLE `tkcbtt`
  ADD PRIMARY KEY (`username`,`MaNV`),
  ADD KEY `tkcbtt_manv_foreign` (`MaNV`);

--
-- Chỉ mục cho bảng `tkhocgiangvien`
--
ALTER TABLE `tkhocgiangvien`
  ADD PRIMARY KEY (`UserName`,`MaGV`),
  ADD KEY `fk-tk` (`MaGV`);

--
-- Chỉ mục cho bảng `tkhv`
--
ALTER TABLE `tkhv`
  ADD PRIMARY KEY (`username`,`MaHocVien`),
  ADD KEY `tkhv_mahocvien_foreign` (`MaHocVien`);

--
-- Chỉ mục cho bảng `tuanhoc`
--
ALTER TABLE `tuanhoc`
  ADD PRIMARY KEY (`id_Tuan`);

--
-- Chỉ mục cho bảng `tuan_hocs`
--
ALTER TABLE `tuan_hocs`
  ADD PRIMARY KEY (`id_Tuan`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cbtt_sq1`
--
ALTER TABLE `cbtt_sq1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitietphancong`
--
ALTER TABLE `chitietphancong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `chitiet_tiethoc`
--
ALTER TABLE `chitiet_tiethoc`
  MODIFY `id_chitiet` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chungchis`
--
ALTER TABLE `chungchis`
  MODIFY `MaCC` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `giangvien_sq1`
--
ALTER TABLE `giangvien_sq1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `hoadondkhoc`
--
ALTER TABLE `hoadondkhoc`
  MODIFY `id_HoaDonDkHoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadonthis`
--
ALTER TABLE `hoadonthis`
  MODIFY `id_hoadon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hocvien_sq1`
--
ALTER TABLE `hocvien_sq1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT cho bảng `khoahoc_sq1`
--
ALTER TABLE `khoahoc_sq1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  MODIFY `MaKhuVuc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `kythis`
--
ALTER TABLE `kythis`
  MODIFY `MaKiThi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `MaLopHoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lopkhoa`
--
ALTER TABLE `lopkhoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `lop_sq1`
--
ALTER TABLE `lop_sq1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `MaMonHoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhom_sq1`
--
ALTER TABLE `nhom_sq1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `phieudkhoc`
--
ALTER TABLE `phieudkhoc`
  MODIFY `id_PhieuDKHoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `phieudkthis`
--
ALTER TABLE `phieudkthis`
  MODIFY `idphieudk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  MODIFY `MaPhongHoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `thoigian`
--
ALTER TABLE `thoigian`
  MODIFY `id_ThoiGian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `MaTB` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tiethoc`
--
ALTER TABLE `tiethoc`
  MODIFY `id_TietHoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tkb`
--
ALTER TABLE `tkb`
  MODIFY `id_TKB` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tuanhoc`
--
ALTER TABLE `tuanhoc`
  MODIFY `id_Tuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tuan_hocs`
--
ALTER TABLE `tuan_hocs`
  MODIFY `id_Tuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietphancong`
--
ALTER TABLE `chitietphancong`
  ADD CONSTRAINT `chitietphancong_id_thoigian_foreign` FOREIGN KEY (`id_ThoiGian`) REFERENCES `thoigian` (`id_ThoiGian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietphancong_id_tkb_foreign` FOREIGN KEY (`id_TKB`) REFERENCES `tkb` (`id_TKB`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietphancong_magv_foreign` FOREIGN KEY (`MaGV`) REFERENCES `giangvien` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietphancong_mamonhoc_foreign` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietphancong_manhom_foreign` FOREIGN KEY (`MaNhom`) REFERENCES `nhom` (`MaNhom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `co`
--
ALTER TABLE `co`
  ADD CONSTRAINT `co_makm_foreign` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `co_malop_foreign` FOREIGN KEY (`MaLop`) REFERENCES `lophoc` (`MaLop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cotuanhoc`
--
ALTER TABLE `cotuanhoc`
  ADD CONSTRAINT `cotuanhoc_id_tkb_foreign` FOREIGN KEY (`id_TKB`) REFERENCES `tkb` (`id_TKB`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cotuanhoc_id_tuan_foreign` FOREIGN KEY (`id_Tuan`) REFERENCES `tuan_hocs` (`id_Tuan`);

--
-- Các ràng buộc cho bảng `day_mon_hocs`
--
ALTER TABLE `day_mon_hocs`
  ADD CONSTRAINT `day_mon_hocs_magv_foreign` FOREIGN KEY (`MaGV`) REFERENCES `giangvien` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_mon_hocs_mamonhoc_foreign` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diemthichungchis`
--
ALTER TABLE `diemthichungchis`
  ADD CONSTRAINT `diemthichungchis_mahocvien_foreign` FOREIGN KEY (`MaHocVien`) REFERENCES `hocvien` (`MaHocVien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diemthichungchis_makithi_foreign` FOREIGN KEY (`MaKiThi`) REFERENCES `kythis` (`MaKiThi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadondkhoc`
--
ALTER TABLE `hoadondkhoc`
  ADD CONSTRAINT `fk-MaNVNV` FOREIGN KEY (`MaNV`) REFERENCES `cbtt` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadondkhoc_id_phieudkhoc_foreign` FOREIGN KEY (`id_PhieuDKHoc`) REFERENCES `phieudkhoc` (`id_PhieuDKHoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadondkhoc_manhom_foreign` FOREIGN KEY (`MaNhom`) REFERENCES `nhom` (`MaNhom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonthis`
--
ALTER TABLE `hoadonthis`
  ADD CONSTRAINT `hoadonthis_manv_foreign` FOREIGN KEY (`MaNV`) REFERENCES `cbtt` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kythis`
--
ALTER TABLE `kythis`
  ADD CONSTRAINT `kythis_macc_foreign` FOREIGN KEY (`MaCC`) REFERENCES `chungchis` (`MaCC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_id_tiethoc_foreign` FOREIGN KEY (`id_TietHoc`) REFERENCES `tiethoc` (`id_TietHoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lopkhoa`
--
ALTER TABLE `lopkhoa`
  ADD CONSTRAINT `lopkhoa_makhoa_foreign` FOREIGN KEY (`MaKhoa`) REFERENCES `khoahoc` (`MaKhoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lopkhoa_malop_foreign` FOREIGN KEY (`MaLop`) REFERENCES `lophoc` (`MaLop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhom`
--
ALTER TABLE `nhom`
  ADD CONSTRAINT `nhom_maphonghoc_foreign` FOREIGN KEY (`MaPhongHoc`) REFERENCES `phonghoc` (`MaPhongHoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieudkhoc`
--
ALTER TABLE `phieudkhoc`
  ADD CONSTRAINT `phieudkhoc_id_foreign` FOREIGN KEY (`id`) REFERENCES `lopkhoa` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `phieudkhoc_mahocvien_foreign` FOREIGN KEY (`MaHocVien`) REFERENCES `hocvien` (`MaHocVien`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieudkthis`
--
ALTER TABLE `phieudkthis`
  ADD CONSTRAINT `phieudkthis_mahocvien_foreign` FOREIGN KEY (`MaHocVien`) REFERENCES `hocvien` (`MaHocVien`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `phieudkthis_makithi_foreign` FOREIGN KEY (`MaKiThi`) REFERENCES `kythis` (`MaKiThi`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  ADD CONSTRAINT `phonghoc_makhuvuc_foreign` FOREIGN KEY (`MaKhuVuc`) REFERENCES `khuvuc` (`MaKhuVuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_manv_foreign` FOREIGN KEY (`MaNV`) REFERENCES `cbtt` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thuoc_lop_hocs`
--
ALTER TABLE `thuoc_lop_hocs`
  ADD CONSTRAINT `fk-hoc-vien` FOREIGN KEY (`MaHocVien`) REFERENCES `hocvien` (`MaHocVien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thuoc_lop_hocs_mahocvien_foreign` FOREIGN KEY (`MaHocVien`) REFERENCES `hocvien` (`MaHocVien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thuoc_lop_hocs_manhom_foreign` FOREIGN KEY (`MaNhom`) REFERENCES `nhom` (`MaNhom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tkb`
--
ALTER TABLE `tkb`
  ADD CONSTRAINT `tkb_manhom_foreign` FOREIGN KEY (`MaNhom`) REFERENCES `nhom` (`MaNhom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tkcbtt`
--
ALTER TABLE `tkcbtt`
  ADD CONSTRAINT `tkcbtt_manv_foreign` FOREIGN KEY (`MaNV`) REFERENCES `cbtt` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tkcbtt_username_foreign` FOREIGN KEY (`username`) REFERENCES `taikhoan` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tkhocgiangvien`
--
ALTER TABLE `tkhocgiangvien`
  ADD CONSTRAINT `fk-tk` FOREIGN KEY (`MaGV`) REFERENCES `giangvien` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tkhv`
--
ALTER TABLE `tkhv`
  ADD CONSTRAINT `tkhv_mahocvien_foreign` FOREIGN KEY (`MaHocVien`) REFERENCES `hocvien` (`MaHocVien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tkhv_username_foreign` FOREIGN KEY (`username`) REFERENCES `taikhoan` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
