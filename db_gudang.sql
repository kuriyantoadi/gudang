-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2020 at 07:03 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudang_cabang`
--

CREATE TABLE `gudang_cabang` (
  `id` int(11) NOT NULL,
  `id_material` varchar(30) NOT NULL,
  `nama_material` varchar(30) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `jenis_satuan_material` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `gudang_cabang`
--

INSERT INTO `gudang_cabang` (`id`, `id_material`, `nama_material`, `jumlah_material`, `jenis_satuan_material`) VALUES
(3, '2', 'Laptop', 200, 'Meter'),
(5, '101', 'sepatu', 200, 'Batang');

-- --------------------------------------------------------

--
-- Table structure for table `gudang_pusat`
--

CREATE TABLE `gudang_pusat` (
  `id` int(11) NOT NULL,
  `id_material` varchar(30) NOT NULL,
  `nama_material` varchar(30) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `jenis_satuan_material` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `gudang_pusat`
--

INSERT INTO `gudang_pusat` (`id`, `id_material`, `nama_material`, `jumlah_material`, `jenis_satuan_material`) VALUES
(3, '2', 'Laptop', 55, 'Meter'),
(4, '10001', 'tas', 5, 'Pcs'),
(5, '101', 'sepatu', -10, 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `lap_cabang`
--

CREATE TABLE `lap_cabang` (
  `id` int(11) NOT NULL,
  `id_material` varchar(20) NOT NULL,
  `nama_material` varchar(30) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `jenis_satuan_material` varchar(30) NOT NULL,
  `status_barang` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `pj_petugas` varchar(50) NOT NULL,
  `pj_lapangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lap_cabang`
--

INSERT INTO `lap_cabang` (`id`, `id_material`, `nama_material`, `jumlah_material`, `jenis_satuan_material`, `status_barang`, `tanggal`, `pj_petugas`, `pj_lapangan`) VALUES
(8, '2', 'Laptop', 290, 'Meter', 'Barang Keluar', '09-06-2020', 'admin', '0'),
(9, '2', 'Laptop', 200, 'Meter', 'Barang Keluar', '09-06-2020', 'admin', '0'),
(10, '2', 'Laptop', 199, 'Meter', 'Barang Keluar', '11-06-2020', 'santoso', '0'),
(11, '2', 'Laptop', 198, 'Meter', 'Barang Keluar', '11-06-2020', 'santoso', 'santi'),
(12, '2', 'Laptop', 189, 'Meter', 'Barang Masuk', '14-06-2020', 'santo', ''),
(13, '2', 'Laptop', 190, 'Meter', 'Barang Masuk', '14-06-2020', 'diki', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `lap_pusat`
--

CREATE TABLE `lap_pusat` (
  `id` int(11) NOT NULL,
  `id_material` varchar(20) NOT NULL,
  `nama_material` varchar(30) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `jenis_satuan_material` varchar(30) NOT NULL,
  `status_barang` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `pj_petugas` varchar(50) NOT NULL,
  `pj_lapangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lap_pusat`
--

INSERT INTO `lap_pusat` (`id`, `id_material`, `nama_material`, `jumlah_material`, `jenis_satuan_material`, `status_barang`, `tanggal`, `pj_petugas`, `pj_lapangan`) VALUES
(12, '2', 'Laptop', 1, 'Meter', 'Barang Masuk', '14-06-2020', 'agus', ''),
(13, '12', 'Laptop', 10, 'Meter', 'Barang Masuk', '14-06-2020', '', '-'),
(14, '123', 'Laptop', 240, 'Meter', 'Barang Keluar', '14-06-2020', 'kipas', 'lampu');

-- --------------------------------------------------------

--
-- Table structure for table `t_order`
--

CREATE TABLE `t_order` (
  `id` int(11) NOT NULL,
  `kode_order` varchar(10) NOT NULL,
  `tanggal_order` varchar(12) NOT NULL,
  `id_material` varchar(15) NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `kondisi` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl_kirim` varchar(15) NOT NULL,
  `ekspedisi` varchar(50) NOT NULL,
  `tgl_terima` varchar(15) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_order`
--

INSERT INTO `t_order` (`id`, `kode_order`, `tanggal_order`, `id_material`, `nama_material`, `jumlah_material`, `kondisi`, `status`, `tgl_kirim`, `ekspedisi`, `tgl_terima`, `nama_penerima`) VALUES
(140, '00001', '28-06-2020', '2', 'Laptop', 1, 'a', 'Acc', '28-06-2020', 'a', '28-06-2020', 'santo'),
(141, '00001', '28-06-2020', '10001', 'tas', 1, '', 'reject', '', '', '', ''),
(143, '00142', '28-06-2020', '2', 'Laptop', 1, 'mantab', 'Acc', '28-06-2020', 'jne', '28-06-2020', 'saya sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'pusat', '42836637e4afa63e6ba120974d7671dc', 'pusat'),
(3, 'cabang', 'f74e4339be40ffd3b2a263873e653be4', 'cabang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gudang_cabang`
--
ALTER TABLE `gudang_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gudang_pusat`
--
ALTER TABLE `gudang_pusat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lap_cabang`
--
ALTER TABLE `lap_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lap_pusat`
--
ALTER TABLE `lap_pusat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gudang_cabang`
--
ALTER TABLE `gudang_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gudang_pusat`
--
ALTER TABLE `gudang_pusat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lap_cabang`
--
ALTER TABLE `lap_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lap_pusat`
--
ALTER TABLE `lap_pusat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_order`
--
ALTER TABLE `t_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
