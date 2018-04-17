-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 09:04 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muabansuachualaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietcombo`
--

CREATE TABLE `chitietcombo` (
  `MACTCB` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MASP` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MACBO` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `CHIETKHAU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietcombo`
--

INSERT INTO `chitietcombo` (`MACTCB`, `MASP`, `MACBO`, `CHIETKHAU`) VALUES
('1', 'ip3', 'cb1', 0),
('2', 'ip3', 'cb1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_order`
--

CREATE TABLE `chitiet_order` (
  `MA_CTORDER` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MACBO` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MAORDER` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MASP` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `SOLUONGSP` int(11) DEFAULT NULL,
  `TIEN` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiet_order`
--

INSERT INTO `chitiet_order` (`MA_CTORDER`, `MACBO`, `MAORDER`, `MASP`, `SOLUONGSP`, `TIEN`) VALUES
('0', NULL, '0', 'ip3', 1, 600000),
('1', NULL, '1', 'ip3', 3, 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE `combo` (
  `MACBO` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYBD` date NOT NULL,
  `NGAKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `combo`
--

INSERT INTO `combo` (`MACBO`, `NGAYBD`, `NGAKT`) VALUES
('cb1', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

CREATE TABLE `giaodich` (
  `MAGD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TIME` date DEFAULT NULL,
  `TRANGTHAI` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHAI` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MAKH` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `NOINHAN` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaodich`
--

INSERT INTO `giaodich` (`MAGD`, `TIME`, `TRANGTHAI`, `PHAI`, `MAKH`, `NOINHAN`) VALUES
('4sldiceqts6jse9uiblr', '2018-04-11', NULL, NULL, '0976124684', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `TENKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `PHAI` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `SDT`, `DIACHI`, `PHAI`) VALUES
('0976124684', 'Kha', '0976124684', 'HCM', 'men'),
('34567856565', 'ADAD', '34567856565', 'hcm', 'men');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MALOAI` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TENLOAI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MANSX` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MALOAI`, `TENLOAI`, `MANSX`) VALUES
('acer', 'Acer', 'ACER'),
('AdrLe', 'AdrLe', 'LENOVO'),
('AdrNo', 'Nokia android', 'NOKIA'),
('GALA', 'Samsung Galaxy', 'SAMSUNG'),
('IP', 'Iphone', 'APPLE'),
('LUMIA', 'Lumia', 'NOKIA'),
('VOS', 'dell VOSTROL', 'DELL'),
('Zenf', 'Zenfone', 'ASUS');

-- --------------------------------------------------------

--
-- Table structure for table `messager`
--

CREATE TABLE `messager` (
  `body` varchar(45) DEFAULT NULL,
  `id_messeger` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `id_send` varchar(45) NOT NULL,
  `id_receive` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messager`
--

INSERT INTO `messager` (`body`, `id_messeger`, `date_added`, `id_send`, `id_receive`) VALUES
('asadadada', 2, '2018-04-14 03:03:52', 'kharomts95@gmail.com.vn', 'thoibay74@outlook.com.vn'),
('anh dang o dau do', 3, '2018-04-14 03:22:41', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('kha đại ca là vô địch thiên hạ', 4, '2018-04-14 03:22:41', 'kharomts95@gmail.com.vn', 'thoibay74@outlook.com.vn'),
('ahihi', 5, '2018-04-14 03:22:49', 'kharomts95@gmail.com.vn', 'thoibay74@outlook.com.vn'),
('không có chi', 6, '2018-04-14 03:22:20', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('ừ vậy cũng được', 7, '2018-04-14 03:22:00', 'kharomts95@gmail.com.vn', 'thoibay74@outlook.com.vn'),
('vậy hả', 8, '2018-04-11 03:22:00', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('tin nhắn từ yahoo', 9, '2018-04-11 03:22:00', 'kharomts95@gmail.com.vn', 'khathts@yahoo.com.vn'),
('tin nhắn phản hồi cho  yahoo 1', 10, '2018-04-14 03:03:52', 'khathts@yahoo.com.vn', 'kharomts95@gmail.com.vn'),
('tin nhứn phản hồi từ yahoo2', 11, '2018-04-14 03:22:41', 'kharomts95@gmail.com.vn', 'khathts@yahoo.com.vn'),
('tam sơn núi thành quảng nam', 12, '2018-04-15 04:20:29', 'kharomts95@gmail.com.vn', 'thoibay74@outlook.com.vn'),
('thành phố Đà Nẵng', 13, '2018-04-15 04:22:36', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('âfafafa', 14, '2018-04-15 04:24:52', 'kharomts95@gmail.com.vn', 'thoibay74@outlook.com.vn'),
('Thuận yên Tây', 15, '2018-04-15 04:26:21', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('ahihi', 16, '2018-04-15 04:31:37', 'kharomts95@gmail.com.vn', 'thoibay74@outlook.com.vn'),
('Hôm nay là ngày chủ nhật', 17, '2018-04-15 05:13:20', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('thử tin nhắn thôi bạn ơi', 22, '2018-04-15 05:23:38', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('khả đại ca là võ lâm chí tôn', 23, '2018-04-15 05:25:28', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('khả đại ca là võ lâm chí tôn', 24, '2018-04-15 05:25:28', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('ừ vậy thôi', 25, '2018-04-15 06:03:13', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('tin nhắn thử lần 1', 26, '2018-04-15 06:06:14', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('In my country, Viet nam, people are hospitabl', 146, '2018-04-17 04:10:50', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('mes1', 152, '2018-04-17 05:04:52', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('lợi đẹp trai', 153, '2018-04-17 13:21:03', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('khả đep trai', 154, '2018-04-17 13:22:18', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('huhuhu', 155, '2018-04-17 13:55:34', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('aaa', 156, '2018-04-17 13:56:10', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn'),
('bbb', 157, '2018-04-17 13:56:18', 'thoibay74@outlook.com.vn', 'kharomts95@gmail.com.vn');

-- --------------------------------------------------------

--
-- Table structure for table `nhapkho`
--

CREATE TABLE `nhapkho` (
  `MANK` int(11) NOT NULL,
  `NGAYNHAP` datetime DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `MASP` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhapkho`
--

INSERT INTO `nhapkho` (`MANK`, `NGAYNHAP`, `SOLUONG`, `MASP`) VALUES
(1, '2016-01-01 00:00:00', 50, 'ip3'),
(2, '2017-01-06 00:00:00', 150, 'ip4'),
(3, '2018-01-09 00:00:00', 200, 'ss7'),
(4, '2017-05-06 00:00:00', 270, 'ss8'),
(5, '2018-09-07 00:00:00', 30, 'j7Pro'),
(6, '2017-04-07 00:00:00', 480, 'lm520'),
(7, '2018-01-01 00:00:00', 45, 'noki6'),
(8, '0000-00-00 00:00:00', 45, 'lm520'),
(14, '2004-01-31 00:00:00', 150, 'ip3'),
(21, '2018-04-16 00:00:00', 99999, 'noki6'),
(22, '2018-04-02 00:00:00', 250, 'ip3'),
(24, '2018-04-17 00:00:00', 60, 'j7Pro'),
(26, '2018-04-03 00:00:00', 500, 'ip3'),
(27, '2018-03-26 00:00:00', 400, 'ip4'),
(55, '2018-04-09 00:00:00', 200, 'ss7');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `MANSX` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `TENNSX` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`MANSX`, `TENNSX`) VALUES
('ACER', 'Acer'),
('APPLE', 'Apple'),
('ASUS', 'Asus'),
('DELL', 'Dell'),
('LENOVO', 'Lenovo'),
('NOKIA', 'Nokia-Microsoft'),
('SAMSUNG', 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `MAORDER` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MAGD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIAN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`MAORDER`, `MAGD`, `TRANGTHAI`, `THOIGIAN`) VALUES
('0', '4sldiceqts6jse9uiblr', '', '0000-00-00'),
('1', '4sldiceqts6jse9uiblr', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `permision`
--

CREATE TABLE `permision` (
  `id_func` int(11) DEFAULT NULL,
  `id_permision` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permision`
--

INSERT INTO `permision` (`id_func`, `id_permision`, `id_user`) VALUES
(1, 1, 'kharomts95@gmail.com.vn'),
(0, 3, 'thoibay74@outlook.com.vn'),
(0, 4, 'khathts@yahoo.com.vn');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TENSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MALOAI` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TENSP`, `MALOAI`) VALUES
('ip3', 'Apple Iphone 3', 'ip'),
('ip4', 'Apple Iphone 4', 'ip'),
('J7Pro', 'Samsung Galaxy J7 Pro', 'GALA'),
('lm520', 'Micrsoft lumia 520', 'LUMIA'),
('Noki6', 'Nokia android 6', 'AdrNo'),
('ss7', 'Samgsung Galaxy S7', 'GALA'),
('ss8', 'Samgsung Galaxy S8', 'GALA');

-- --------------------------------------------------------

--
-- Table structure for table `thongtin`
--

CREATE TABLE `thongtin` (
  `MATT` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENTT` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtin`
--

INSERT INTO `thongtin` (`MATT`, `TENTT`) VALUES
('audio', 'Định dạng audio'),
('bcam', 'CAMERA sau'),
('card', 'Card đồ họa'),
('chip', 'Chip'),
('cpu', 'CPU'),
('design', 'Thiết kế'),
('discount', 'chietkhau'),
('exter', 'không giới hạn'),
('fcam', 'CAMERA trước'),
('flash', 'có'),
('giacu', 'Giá cũ'),
('giamoi', 'Giá mớii'),
('GPS', 'Kiểu định vị'),
('inter', 'Bộ nhớ trong'),
('LINKANH', 'Link ảnh'),
('name', 'Tên sản phẩm'),
('net', 'Mạng kết nối'),
('ngaynhap', 'Ngày nhập'),
('nsx', 'Nhà sản xuất'),
('phone', 'cổng tai nghe'),
('pin', 'Dung lượng pin'),
('ram', 'Ram'),
('relea', 'ngày ra mắt'),
('size', 'Kích thước màn hình'),
('touch', 'Corning Gorilla Glass 5'),
('video', 'Định dạng video'),
('weigh', 'Khối lượng');

-- --------------------------------------------------------

--
-- Table structure for table `thongtinchitiet`
--

CREATE TABLE `thongtinchitiet` (
  `MANHOMTT` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MASP` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MATT` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `GIATRI` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtinchitiet`
--

INSERT INTO `thongtinchitiet` (`MANHOMTT`, `MASP`, `MATT`, `GIATRI`) VALUES
('1', 'ss7', 'ram', '4GB'),
('10', 'ip3', 'size', '4 inches'),
('11', 'ip3', 'audio', 'MP3'),
('12', 'ip3', 'bcam', '12 MP'),
('13', 'ip3', 'card', 'Genforce 2GB'),
('14', 'ip3', 'chip', 'core i7 thế hệ mới '),
('15', 'ip3', 'cpu', 'Siêu mạnh'),
('16', 'lm520', 'size', '4.5 inches'),
('17', 'lm520', 'audio', 'MP3,AUDIO'),
('18', 'lm520', 'bcam', '12 MP'),
('2', 'ss7', 'size', '4 inches'),
('20', 'lm520', 'chip', 'Adreno 306 mới'),
('21', 'lm520', 'cpu', 'Qualcomm Snapdragon 410 4 nhân 64-bit'),
('22', 'lm520', 'ram', '2GB'),
('23', 'ss8', 'bcam', '20 MP'),
('24', 'ss8', 'chip', 'Exynos 8895 8 nhân 64-bit'),
('25', 'ss8', 'cpu', '4 nhân 2.3 GHz và 4 nhân 1.7 GHz'),
('26', 'ss8', 'ram', '16GB'),
('27', 'ss8', 'audio', 'MP3,audio,jack'),
('28', 'ip4', 'ram', '2GB'),
('29', 'ip4', 'size', '4 inches'),
('3', 'ss7', 'audio', 'MP3'),
('30', 'ip4', 'audio', 'MP3,Jack Audio'),
('31', 'ip4', 'bcam', '5 MP'),
('32', 'ip4', 'card', 'none'),
('33', 'ip4', 'chip', 'Apple A4'),
('34', 'ip4', 'cpu', 'PowerVR SGX535'),
('35', 'ip3', 'linkanh', 'images/iphone3gs-black.png '),
('37', 'lm520', 'linkanh', 'images/microsoft-lumia-535.png '),
('38', 'ss7', 'linkanh', 'images/samsung-galaxy-s7.png'),
('39', 'ss8', 'linkanh', 'images/samsung-galaxy-s8.png'),
('4', 'ss7', 'bcam', '12 MP'),
('40', 'noki6', 'linkanh', 'images/nokia-6.png '),
('41', 'J7Pro', 'linkanh', 'images/samsung-galaxy-j7-pro.png'),
('42', 'ip4', 'linkanh', 'images/iphone-4-8gb.png'),
('43', 'ip3', 'giacu', '4000000'),
('44', 'ip4', 'giacu', '5000000'),
('45', 'ss8', 'giacu', '4000000'),
('46', 'ss7', 'giacu', '4500000'),
('47', 'lm520', 'giacu', '5000000'),
('48', 'noki6', 'giacu', '3000000'),
('49', 'j7Pro', 'giacu', '7000000'),
('5', 'ss7', 'card', 'Genforce'),
('50', 'ip3', 'giamoi', '2000000'),
('53', 'ss8', 'giamoi', '12000000'),
('54', 'lm520', 'giamoi', '2000000'),
('55', 'noki6', 'giamoi', '3000000'),
('56', 'j7Pro', 'giamoi', '6700000'),
('58', 'ip4', 'giamoi', '4000000'),
('59', 'noki6', 'size', '4 inches'),
('6', 'ss7', 'chip', 'core i3'),
('60', 'noki6', 'size', '4 inches'),
('61', 'noki6', 'audio', 'MP3'),
('62', 'noki6', 'card', 'Genforce'),
('63', 'noki6', 'ram', '4GB'),
('64', 'noki6', 'cpu', 'Siêu mạnh'),
('65', 'noki6', 'chip', 'core i3'),
('66', 'noki6', 'ngaynhap', '13/2/2016'),
('68', 'ip3', 'ngaynhap', '2/2/2014'),
('69', 'ip3', 'discount', '30'),
('7', 'ss7', 'cpu', 'Siêu mạnh'),
('71', 'ip4', 'ngaynhap', '5/2/2018'),
('72', 'J7Pro', 'ngaynhap', '1/1/2018'),
('73', 'j7pro', 'chip', 'Mạnh mẽ hơn nữa'),
('74', 'j7pro', 'card', 'thẻ nhớ sd 2GB'),
('75', 'lm520', 'ngaynhap', '3/3/2011'),
('76', 'lm520', 'card', 'Đồ họa tốc độ cao'),
('79', 'ss7', 'giamoi', '4500000'),
('80', 'ss8', 'card', 'Đồhọa 3D'),
('9', 'ip3', 'ram', '8GB');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `password` varchar(45) DEFAULT NULL,
  `full_name` varchar(45) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `user_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`password`, `full_name`, `date_created`, `user_name`) VALUES
('21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'kharomts95@gmail.com.vn'),
('202cb962ac59075b964b07152d234b70', NULL, NULL, 'khathts@yahoo.com.vn'),
('202cb962ac59075b964b07152d234b70', NULL, NULL, 'thoibay74@outlook.com.vn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietcombo`
--
ALTER TABLE `chitietcombo`
  ADD PRIMARY KEY (`MACTCB`),
  ADD KEY `MACTCB` (`MACTCB`,`MASP`,`MACBO`),
  ADD KEY `MACBO` (`MACBO`),
  ADD KEY `MASP` (`MASP`);

--
-- Indexes for table `chitiet_order`
--
ALTER TABLE `chitiet_order`
  ADD PRIMARY KEY (`MA_CTORDER`),
  ADD KEY `MACBO` (`MACBO`),
  ADD KEY `MAORDER` (`MAORDER`),
  ADD KEY `fk_chitiet_order_sanpham1_idx` (`MASP`);

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`MACBO`);

--
-- Indexes for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`MAGD`),
  ADD KEY `fk_giaodich_khachhang1_idx` (`MAKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MALOAI`),
  ADD KEY `MALOAI` (`MALOAI`),
  ADD KEY `MALOAI_2` (`MALOAI`),
  ADD KEY `MANSX` (`MANSX`);

--
-- Indexes for table `messager`
--
ALTER TABLE `messager`
  ADD PRIMARY KEY (`id_messeger`),
  ADD KEY `fk_messager_user1_idx` (`id_send`),
  ADD KEY `fk_messager_user2_idx` (`id_receive`);

--
-- Indexes for table `nhapkho`
--
ALTER TABLE `nhapkho`
  ADD UNIQUE KEY `MANK` (`MANK`),
  ADD KEY `fk_nhapkho_sanpham1_idx` (`MASP`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`MANSX`),
  ADD KEY `MANSX` (`MANSX`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`MAORDER`),
  ADD KEY `MAGD` (`MAGD`);

--
-- Indexes for table `permision`
--
ALTER TABLE `permision`
  ADD KEY `id_permision` (`id_permision`),
  ADD KEY `fk_permision_user1_idx` (`id_user`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MALOAI` (`MALOAI`);

--
-- Indexes for table `thongtin`
--
ALTER TABLE `thongtin`
  ADD PRIMARY KEY (`MATT`),
  ADD KEY `MATT` (`MATT`),
  ADD KEY `MATT_2` (`MATT`);

--
-- Indexes for table `thongtinchitiet`
--
ALTER TABLE `thongtinchitiet`
  ADD PRIMARY KEY (`MANHOMTT`),
  ADD KEY `MASP` (`MASP`,`MATT`),
  ADD KEY `thongtinchitiet_ibfk_1` (`MATT`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messager`
--
ALTER TABLE `messager`
  MODIFY `id_messeger` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `nhapkho`
--
ALTER TABLE `nhapkho`
  MODIFY `MANK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `permision`
--
ALTER TABLE `permision`
  MODIFY `id_permision` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietcombo`
--
ALTER TABLE `chitietcombo`
  ADD CONSTRAINT `chitietcombo_ibfk_1` FOREIGN KEY (`MACBO`) REFERENCES `combo` (`MACBO`),
  ADD CONSTRAINT `chitietcombo_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Constraints for table `chitiet_order`
--
ALTER TABLE `chitiet_order`
  ADD CONSTRAINT `chitiet_order_ibfk_1` FOREIGN KEY (`MAORDER`) REFERENCES `order` (`MAORDER`),
  ADD CONSTRAINT `chitiet_order_ibfk_2` FOREIGN KEY (`MACBO`) REFERENCES `combo` (`MACBO`),
  ADD CONSTRAINT `fk_chitiet_order_sanpham1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `fk_giaodich_khachhang1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD CONSTRAINT `FK_NSX_MANSX` FOREIGN KEY (`MANSX`) REFERENCES `nhasanxuat` (`MANSX`);

--
-- Constraints for table `messager`
--
ALTER TABLE `messager`
  ADD CONSTRAINT `fk_messager_user1` FOREIGN KEY (`id_send`) REFERENCES `user` (`user_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_messager_user2` FOREIGN KEY (`id_receive`) REFERENCES `user` (`user_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nhapkho`
--
ALTER TABLE `nhapkho`
  ADD CONSTRAINT `fk_nhapkho_sanpham1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`MAGD`) REFERENCES `giaodich` (`MAGD`);

--
-- Constraints for table `permision`
--
ALTER TABLE `permision`
  ADD CONSTRAINT `fk_permision_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MALOAI`) REFERENCES `loaisanpham` (`MALOAI`);

--
-- Constraints for table `thongtinchitiet`
--
ALTER TABLE `thongtinchitiet`
  ADD CONSTRAINT `fk_Sanpham_mash` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`),
  ADD CONSTRAINT `thongtinchitiet_ibfk_1` FOREIGN KEY (`MATT`) REFERENCES `thongtin` (`MATT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
