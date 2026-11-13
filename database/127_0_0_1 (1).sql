-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 17, 2018 at 02:36 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--
CREATE DATABASE IF NOT EXISTS `hms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hms`;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` varchar(5) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL,
  `kategori_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_status`) VALUES
('K1001', 'kemeja', 'active'),
('K1002', 'celana panjang', 'active'),
('K1004', 'jaket', 'active'),
('K1005', 'celana pendek', 'active'),
('K1006', 'hijab', 'active'),
('K1007', 'kaos', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(15) NOT NULL,
  `kategori_id` varchar(5) NOT NULL,
  `product_nama` varchar(50) NOT NULL,
  `product_keterangan` text NOT NULL,
  `product_harga` int(10) NOT NULL,
  `product_stock` int(3) NOT NULL,
  `product_gambar` varchar(20) NOT NULL,
  `product_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `kategori_id`, `product_nama`, `product_keterangan`, `product_harga`, `product_stock`, `product_gambar`, `product_status`) VALUES
('P18121001', 'K1001', 'kemeja orange', 'bahan katun', 60000, 15, 'P18121001.jpg', 'active'),
('P18121002', 'K1004', 'jaket babymilo', 'bahan babyteri', 72000, 15, 'P18121002.jpg', 'active'),
('P18121003', 'K1004', 'blazer coklat', 'bahan babyteri', 92000, 14, 'P18121003.jpg', 'active'),
('P18121004', 'K1001', 'kemeja sabila', 'bahan katun', 35000, 23, 'P18121004.jpg', 'active'),
('P18121005', 'K1001', 'kemeja polka', 'bahan satin', 46000, 12, 'P18121005.jpg', 'active'),
('P18121006', 'K1006', 'hijab tiara', 'bahan bagus', 89000, 17, 'P18121006.jpg', 'active'),
('P18121007', 'K1006', 'maxi long', 'bahan bagus', 79000, 7, 'P18121007.jpg', 'active'),
('P18121008', 'K1004', 'blazer coklat', 'bahan babyteri', 47000, 0, 'P18121008.jpg', 'active'),
('P18121009', 'K1004', 'sweater', 'bahan rajut', 23000, 12, 'P18121009.jpg', 'active'),
('P18121010', 'K1002', 'legging corak', 'bahan bagus', 12000, 4, 'P18121010.jpg', 'active'),
('P18121011', 'K1007', 'kaos orange', 'bahan bagus', 35000, 12, 'P18121011.jpg', 'active'),
('P18121012', 'K1007', 'kaos tengkorak', 'bahan bagus', 35000, 8, 'P18121012.jpg', 'active'),
('P18121013', 'K1007', 'kaos garis', 'bahan bagus', 34000, 12, 'P18121013.jpg', 'active'),
('P18121014', 'K1004', 'jaket couple nike', 'bahan bagus', 55000, 4, 'P18121014.jpg', 'active'),
('P18121015', 'K1004', 'jaket couple nb', 'bahan bagus', 45000, 3, 'P18121015.jpg', 'active'),
('P18121016', 'K1004', 'jaket levis', 'bahan bagus', 55000, 0, 'P18121016.JPG', 'active'),
('P18121017', 'K1001', 'kemeja babydoll', 'bahan bagus', 35000, 7, 'P18121017.JPG', 'active'),
('P18121018', 'K1001', 'kemeja kotak', 'bahan bagus', 34000, 9, 'P18121018.jpg', 'active'),
('P18121019', 'K1007', 'kaos kembang', 'bahan bagus', 35000, 12, 'P18121019.jpg', 'active'),
('P18121020', 'K1007', 'kaos corak', 'bahan bagus', 32000, 9, 'P18121020.jpg', 'active'),
('P18121021', 'K1001', 'kemeja channel', 'bahan bagus', 64000, 9, 'P18121021.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `transaksi_tanggal_order` date NOT NULL,
  `transaksi_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `email`, `transaksi_tanggal_order`, `transaksi_status`) VALUES
('T1001', 'irwin.wu@yahoo.com', '2018-12-17', 'pending'),
('T1002', 'irwin.wu@yahoo.com', '2018-12-17', 'pending'),
('T1003', 'irwin.wu@yahoo.com', '2018-12-17', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_detail_id` int(11) NOT NULL,
  `transaksi_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `transaksi_detail_qty` int(3) NOT NULL,
  `transaksi_detail_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_detail_id`, `transaksi_id`, `product_id`, `transaksi_detail_qty`, `transaksi_detail_harga`) VALUES
(3, 'T1001', 'P18121016', 2, 55000),
(4, 'T1001', 'P18121003', 3, 92000),
(5, 'T1002', 'P18121016', 1, 55000),
(6, 'T1002', 'P18121003', 3, 92000),
(7, 'T1003', 'P18121008', 4, 47000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `type` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `nama`, `alamat`, `telepon`, `session_id`, `type`, `status`) VALUES
('budi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'budianto', 'bekasi', '02823842842', '', 'administrator', 'active'),
('irwin.wu@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'santi', 'kemang', '0823423423', 'for87t28vm134l1gmbja8fmscs', 'member', 'active'),
('joe.kasian@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'joe 88', 'grogol', '12345678', '', 'administrator', 'active'),
('suangmin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'irwin', 'grogol', '083872047877', '8r30b0s3394cpqcr8u4sj2aqc3', 'administrator', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`,`kategori_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_detail_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `transaksi_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
