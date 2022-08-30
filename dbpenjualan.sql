-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 04:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran`
--

CREATE TABLE `detail_pengeluaran` (
  `id` int(11) NOT NULL,
  `id_pengeluaran` varchar(5) DEFAULT NULL,
  `id_stok` varchar(5) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pengeluaran`
--

INSERT INTO `detail_pengeluaran` (`id`, `id_pengeluaran`, `id_stok`, `harga_satuan`) VALUES
(1, 'K0001', 'S0011', 16000),
(2, 'K0002', 'S0046', 10000),
(3, 'K0003', 'S0001', 11000),
(4, 'K0004', 'S0046', 10000),
(5, 'K0005', 'S0011', 2500),
(6, 'K0006', 'S0011', 18000),
(7, 'K0007', 'S0001', 12000),
(8, 'K0008', 'S0009', 12000),
(9, 'K0009', 'S0003', 14750),
(10, 'K0010', 'S0002', 10000),
(11, 'K0011', 'S0047', 4000),
(12, 'K0012', 'S0038', 9000),
(13, 'K0012', 'S0039', 9000),
(14, 'K0003', 'S0004', 12000),
(15, 'K0007', 'S0001', 66666);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(5) DEFAULT NULL,
  `id_menu` varchar(5) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_penjualan`, `id_menu`, `harga_satuan`) VALUES
(1, 'P0001', 'M0011', 12000),
(13, 'P0003', 'M0046', 8000),
(14, 'P0004', 'M0045', 17000),
(15, 'P0005', 'M0045', 17000),
(16, 'P0006', 'M0047', 8000),
(17, 'P0006', 'M0040', 2000),
(18, 'P0006', 'M0038', 15000),
(19, 'P0007', 'M0006', 15000),
(20, 'P0007', 'M0038', 15000),
(21, 'P0007', 'M0009', 12000),
(22, 'P0007', 'M0037', 5000),
(23, 'P0007', 'M0002', 15000),
(24, 'P0007', 'M0001', 14000),
(25, 'P0007', 'M0020', 5000),
(26, 'P0009', 'M0002', 15000),
(27, 'P0008', 'M0037', 15000),
(28, 'P0008', 'M0038', 15000),
(29, 'P0008', 'M0009', 12000),
(30, 'P0008', 'M0036', 5000),
(31, 'P0008', 'M0037', 5000),
(32, 'P0008', 'M0003', 15000),
(33, 'P0008', 'M0001', 14000),
(34, 'P0008', 'M0023', 7000),
(35, 'P0008', 'M0021', 5000),
(36, 'P0008', 'M0047', 10000),
(37, 'P0008', 'M0043', 2000),
(38, 'P0008', 'M0044', 10000),
(39, 'P0008', 'M0041', 3000),
(40, 'P0008', 'M0044', 10000),
(41, 'P0008', 'M0041', 3000),
(42, 'P0008', 'M0042', 3000),
(43, 'P0008', 'M0044', 10000),
(44, 'P0010', 'M0017', 15000),
(45, 'P0010', 'M0020', 5000),
(48, 'P0012', 'M0004', 10000),
(49, 'P0012', 'M0041', 2000),
(50, 'P0012', 'M0002', 15000),
(51, 'P0012', 'M0003', 15000),
(52, 'P0012', 'M0036', 15000),
(53, 'P0013', 'M0002', 15000),
(54, 'P0013', 'M0017', 12000),
(55, 'P0013', 'M0018', 15000),
(56, 'P0014', 'M0002', 15000),
(57, 'P0014', 'M0008', 12000),
(58, 'P0014', 'M0009', 12000),
(59, 'P0014', 'M0011', 12000),
(60, 'P0014', 'M0018', 12000),
(61, 'P0014', 'M0026', 5000),
(62, 'P0014', 'M0019', 5000),
(63, 'P0014', 'M0038', 15000),
(64, 'P0014', 'M0037', 5000),
(65, 'P0014', 'M0033', 5000),
(66, 'P0014', 'M0024', 5000),
(67, 'P0014', 'M0006', 15000),
(68, 'P0014', 'M0042', 16000),
(69, 'P0014', 'M0041', 2000),
(70, 'P0014', 'M0004', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(25) NOT NULL,
  `jenis_menu` enum('makanan','minuman','topping') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis_menu`) VALUES
('M0001', 'Nasi brantak', 'makanan'),
('M0002', 'Ricebowl chicken katsu bb', 'makanan'),
('M0003', 'Ricebowl chicken katsu bl', 'makanan'),
('M0004', 'Indomie kuah telor keju', 'makanan'),
('M0005', 'Indomie goreng telor keju', 'makanan'),
('M0006', 'Internet', 'makanan'),
('M0007', 'Kopi tubruk', 'minuman'),
('M0008', 'Milkblend tiramisu', 'minuman'),
('M0009', 'Milkblend vanilla', 'minuman'),
('M0010', 'Milkblend karamel', 'minuman'),
('M0011', 'Milkblend hazelnut', 'minuman'),
('M0012', 'Milk blend blue curcau', 'minuman'),
('M0013', 'Milk blend coco pandan', 'minuman'),
('M0014', 'Milk blend melon', 'minuman'),
('M0015', 'Milk blend pisang susu', 'minuman'),
('M0016', 'Milkblend jeruk', 'minuman'),
('M0017', 'Es kopi susu', 'minuman'),
('M0018', 'Vietnam drip', 'minuman'),
('M0019', 'Susu Frishian flag', 'minuman'),
('M0020', 'Kopi kapal api', 'minuman'),
('M0021', 'Kopi Luwak', 'minuman'),
('M0022', 'Susu dancow', 'minuman'),
('M0023', 'Kopi milo', 'minuman'),
('M0024', 'Kopi good day', 'minuman'),
('M0025', 'Nutrisari florida', 'minuman'),
('M0026', 'Nutrisari anggur', 'minuman'),
('M0027', 'Nutrisari semangka', 'minuman'),
('M0028', 'Finto jeruk', 'minuman'),
('M0029', 'Finto strawberry', 'minuman'),
('M0030', 'Finto melon', 'minuman'),
('M0031', 'Pop ice nanas', 'minuman'),
('M0032', 'Pop ice sirsak', 'minuman'),
('M0033', 'Pop ice duren', 'minuman'),
('M0034', 'Pop ice malt', 'minuman'),
('M0035', 'Pop ice Cookies', 'minuman'),
('M0036', 'Popshake tornado squash', 'minuman'),
('M0037', 'Popshake tornado chocomal', 'minuman'),
('M0038', 'Mojito orange', 'minuman'),
('M0039', 'Mojito ocean blue', 'minuman'),
('M0040', 'Nasi', 'topping'),
('M0041', 'Telur', 'topping'),
('M0042', 'Baso', 'topping'),
('M0043', 'Cuanky', 'topping'),
('M0044', 'Indomie double', 'makanan'),
('M0045', 'Ricebowl chicken katsu as', 'makanan'),
('M0046', 'Nasi Telur', 'makanan'),
('M0047', 'Indomie aja', 'makanan');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(5) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `password`, `nama_pegawai`, `alamat`, `no_hp`) VALUES
('BA001', 'admin123', 'Oman', 'Jl. Babakan Ciamis', '085155158722'),
('BA002', 'admin123', 'Irsyad', 'Jl. Batu Nunggal', '08592678890'),
('BA003', 'admin123', 'Bang Ajip', 'Jl. Babakan Ciamis', '089608842320');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` double NOT NULL,
  `id_pegawai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tanggal`, `total_harga`, `id_pegawai`) VALUES
('K0001', '2022-05-12', 16000, 'BA001'),
('K0002', '2022-06-16', 10000, 'BA001'),
('K0003', '2022-06-18', 11000, 'BA001'),
('K0004', '2022-06-21', 10000, 'BA001'),
('K0005', '2022-06-23', 5000, 'BA001'),
('K0006', '2022-06-25', 18000, 'BA001'),
('K0007', '2022-06-25', 36000, 'BA001'),
('K0008', '2022-06-25', 12000, 'BA001'),
('K0009', '2022-06-30', 14750, 'BA001'),
('K0010', '2022-06-30', 20000, 'BA001'),
('K0011', '2022-07-07', 8000, 'BA001'),
('K0012', '2022-07-18', 18000, 'BA003'),
('K0043', '2022-07-14', 12000, 'BA001'),
('K0045', '2022-07-15', 12000, 'BA003'),
('K0056', '2022-07-09', 15000, 'BA001');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` double NOT NULL,
  `id_pegawai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal`, `total_harga`, `id_pegawai`) VALUES
('P0001', '2022-06-06', 12000, 'BA002'),
('P0002', '2022-06-04', 164000, 'BA003'),
('P0003', '2022-06-06', 8000, 'BA002'),
('P0004', '2022-06-07', 17000, 'BA002'),
('P0005', '2022-06-08', 51000, 'BA002'),
('P0006', '2022-06-10', 55000, 'BA002'),
('P0007', '2022-06-12', 111000, 'BA002'),
('P0008', '2022-06-14', 220000, 'BA002'),
('P0009', '2022-06-15', 15000, 'BA002'),
('P0010', '2022-06-17', 20000, 'BA002'),
('P0011', '2022-07-18', 12000, 'BA002'),
('P0012', '2022-05-21', 69000, 'BA002'),
('P0013', '2022-06-22', 22000, 'BA002'),
('P0014', '2022-06-23', 255000, 'BA002'),
('P0015', '2022-06-25', 25000, 'BA002');

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan`
--

CREATE TABLE `stok_bahan` (
  `id_stok` varchar(5) NOT NULL,
  `nama_bahan` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_bahan`
--

INSERT INTO `stok_bahan` (`id_stok`, `nama_bahan`, `qty`, `satuan`) VALUES
('S0001', 'Beras', 3, 'Kg'),
('S0002', 'Baso', 750, 'Gram'),
('S0003', 'Sosis', 250, 'Gram'),
('S0004', 'Keju', 175, 'Gram'),
('S0005', 'Kol', 1, 'Kg'),
('S0006', 'Kecap Asin', 500, 'ml'),
('S0007', 'Bawang Bombay', 200, 'Gram'),
('S0008', 'Bawang Putih', 200, 'Gram'),
('S0009', 'Tiram', 800, 'ml'),
('S0010', 'Indomie', 20, 'bks'),
('S0011', 'Telur', 2, 'Kg'),
('S0012', 'Masako Ayam', 10, 'sache'),
('S0013', 'Sasa Vetsin', 3, 'sache'),
('S0014', 'Sasa Tepung', 250, 'Gram'),
('S0015', 'Santan Sun Kara', 2, 'bks'),
('S0016', 'Bawang Goreng', 3, 'bks'),
('S0017', 'Tepung Beras', 500, 'Gram'),
('S0018', 'Masako Sapi', 10, 'sache'),
('S0019', 'Triest Tiramisu', 650, 'ml'),
('S0020', 'Triest Vanilla', 650, 'ml'),
('S0021', 'Triest Karamel', 650, 'ml'),
('S0022', 'Triest Hazelnut', 650, 'ml'),
('S0023', 'Triest Blue Curcau', 650, 'ml'),
('S0024', 'Marjan Pandan', 460, 'ml'),
('S0025', 'Marjan Melon', 460, 'ml'),
('S0026', 'Marjan Pisang', 460, 'ml'),
('S0027', 'Marjan Jeruk', 460, 'ml'),
('S0028', 'Frishian flag\r\n', 5, 'sache'),
('S0029', 'Kopi kapal api\r\n', 3, 'sache'),
('S0030', 'Kopi Luwak\r\n', 8, 'sache'),
('S0031', 'Susu Dancow', 7, 'sache'),
('S0032', 'Susu Milo', 8, 'sache'),
('S0033', 'Kopi GoodDay', 9, 'sache'),
('S0034', 'Nutrisari Florida', 9, 'sache'),
('S0035', 'Nutrisari Anggur', 9, 'sache'),
('S0036', 'Nutrisari Melon', 5, 'sache'),
('S0037', 'Pop Ice Nanas', 4, 'sache'),
('S0038', 'Pop Ice Sirsak', 6, 'sache'),
('S0039', 'Pop Ice Duren', 6, 'sache'),
('S0040', 'Pop Ice Malt', 8, 'sache'),
('S0041', 'Pop Ice Coockies', 8, 'sache'),
('S0042', 'Finto Jeruk', 9, 'sache'),
('S0043', 'Finto Strawberry', 3, 'sache'),
('S0044', 'Finto melon', 10, 'sache'),
('S0045', 'Milk Base Diamond', 11, 'lt'),
('S0046', 'Galon', 1, 'lt'),
('S0047', 'Bumbu racik', 1, 'sache');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stok` (`id_stok`),
  ADD KEY `detail_pengeluaran_ibfk_1` (`id_pengeluaran`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  ADD PRIMARY KEY (`id_stok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  ADD CONSTRAINT `detail_pengeluaran_ibfk_1` FOREIGN KEY (`id_pengeluaran`) REFERENCES `pengeluaran` (`id_pengeluaran`),
  ADD CONSTRAINT `detail_pengeluaran_ibfk_2` FOREIGN KEY (`id_stok`) REFERENCES `stok_bahan` (`id_stok`);

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
