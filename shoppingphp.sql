-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 02:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `chitiethoadon_id` int(11) NOT NULL,
  `hoadon_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `NgayThem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`chitiethoadon_id`, `hoadon_id`, `sanpham_id`, `SoLuong`, `Gia`, `NgayThem`) VALUES
(1, 1, 3, 1, 0, '0000-00-00'),
(2, 1, 2, 1, 0, '0000-00-00'),
(3, 1, 1, 1, 0, '0000-00-00'),
(4, 2, 3, 3, 699, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `danhmuc_id` int(11) NOT NULL,
  `TenDanhMuc` varchar(255) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `TenDanhMuc`, `TrangThai`) VALUES
(2, 'Nội Thất', 1),
(3, 'Điện Tử', 1),
(4, 'Tranh Ảnh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `hoadon_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `TinhThanh` varchar(50) NOT NULL,
  `Zip` int(11) NOT NULL,
  `HinhThucThanhToan` varchar(20) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TinhTrangThanhToan` varchar(20) NOT NULL,
  `tinhtrang_id` int(20) NOT NULL,
  `NgayThem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`hoadon_id`, `users_id`, `DiaChi`, `TinhThanh`, `Zip`, `HinhThucThanhToan`, `TongTien`, `TinhTrangThanhToan`, `tinhtrang_id`, `NgayThem`) VALUES
(1, 2, 'Khu2 Tiên Kiên Lâm Thao', 'Phú Thọ', 35000, 'COD', 3944, 'Đang chờ', 1, '2022-10-01 09:29:47'),
(2, 2, 'Khu2 Tiên Kiên Lâm Thao Phú Thọ', 'Tiên Kiên', 35000, 'payu', 2097, 'Đang chờ', 1, '2022-10-01 09:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `lienhe_id` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `SoDT` varchar(15) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `NgayThem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`lienhe_id`, `Ten`, `email`, `SoDT`, `NoiDung`, `NgayThem`) VALUES
(1, 'Lê Ba', 'Leba@gmail.com', '01234567', 'Ok', '2022-09-30 08:31:56'),
(2, 'Lê Ba', 'luaxongphan345@gmail.com', '0866458599', 'nice', '2022-09-30 09:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `GiaGoc` float NOT NULL,
  `Gia` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `BanChay` int(11) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`sanpham_id`, `danhmuc_id`, `TenSanPham`, `GiaGoc`, `Gia`, `SoLuong`, `image`, `short_desc`, `description`, `BanChay`, `meta_title`, `meta_desc`, `meta_keyword`, `TrangThai`) VALUES
(1, 2, 'Ghế bành(Vàng)', 1000, 1245, 100, '438788577_2.jpg', 'short', 'desc', 1, 'Ghế bành', '', 'meta key', 1),
(2, 2, 'Ghế sofa(Nâu)', 2999, 2000, 15, '122534041_3.jpg', 'short', 'Ghế sofa màu nâu', 1, 'Ghế sofa', 'meta desc', 'meta key', 1),
(3, 2, 'Ghế đồ chơi', 999, 699, 10, '653666042_1.jpg', 'short', 'ghế đồ chơi', 1, 'Ghế đồ chơi', '', 'test', 1),
(4, 4, 'TRANH BỘ HOA 3 BỨC TB01', 1000, 700, 10, '179966787_TB01.jpg', 'Kích thước: 40x60cm', 'TRANH TREO TƯỜNG BỘ HOA 3 BỨC TB01', 0, 'Tranh Bộ Hoa TB01', 'meta des', 'meta key', 1),
(5, 4, 'NGỘ NGHĨNH TRANG TRÍ PHÒNG TRẺ EM - TBAV12-15', 1100, 900, 6, '542433773_TBAV12-15.jpg', 'Kích thước: 50x75cmx03', 'Tranh Trang Trí NGỘ NGHĨNH', 0, 'Tranh Trang Trí', 'meta', 'meta', 1),
(6, 4, 'HOA VÀ LÁ - STTV-86', 1200, 1000, 3, '791811049_STTV-86.jpg', 'Kích thước: 40x60x03', 'Tranh trang trí HOA VÀ LÁ', 1, 'Tranh Trang Trí', '', 'meta', 1),
(7, 4, 'TRANH BỘ TRỪU TƯỢNG TB10', 900, 800, 12, '993317219_STTV2-012.jpg', 'Kích thước: 90x140cm', 'Tranh treo tường TRỪU TƯỢNG TB10', 0, 'Tranh Treo Tường', 'meta', 'meta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangdathang`
--

CREATE TABLE `tinhtrangdathang` (
  `tinhtrang_id` int(11) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinhtrangdathang`
--

INSERT INTO `tinhtrangdathang` (`tinhtrang_id`, `TrangThai`) VALUES
(1, 'Đang chờ'),
(2, 'Đang xử lý'),
(3, 'Đã giao hàng'),
(4, 'Đã hủy'),
(5, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `SoDT` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `NgayThem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `HoTen`, `email`, `SoDT`, `password`, `NgayThem`) VALUES
(1, 'Lê Ba', 'Leba@gmail.com', '012245678', '12345', '2022-09-30 08:39:10'),
(2, 'Nam Pham', 'admin@yahoo.com', '84971488194', '12345', '2022-10-01 02:52:59'),
(3, 'Tùng', 'tungnui@gmail.com', '0123456789', '12345', '2022-10-07 03:59:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`chitiethoadon_id`),
  ADD KEY `hoadon_id` (`hoadon_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`danhmuc_id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hoadon_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `tinhtrang_id` (`tinhtrang_id`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`lienhe_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanpham_id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Indexes for table `tinhtrangdathang`
--
ALTER TABLE `tinhtrangdathang`
  ADD PRIMARY KEY (`tinhtrang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `chitiethoadon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `danhmuc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hoadon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `lienhe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tinhtrangdathang`
--
ALTER TABLE `tinhtrangdathang`
  MODIFY `tinhtrang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`hoadon_id`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`sanpham_id`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`tinhtrang_id`) REFERENCES `tinhtrangdathang` (`tinhtrang_id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`danhmuc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
