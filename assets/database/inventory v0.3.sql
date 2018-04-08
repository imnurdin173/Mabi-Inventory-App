-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 12:20 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory2_t`
--

CREATE TABLE IF NOT EXISTS `inventory2_t` (
  `idBarang` text NOT NULL,
  `namaBarang` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `id_transaksi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_t`
--

CREATE TABLE IF NOT EXISTS `inventory_t` (
  `idBarang` varchar(250) NOT NULL,
  `namaBarang` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_t`
--

INSERT INTO `inventory_t` (`idBarang`, `namaBarang`, `harga`) VALUES
('K203', 'AHay', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi2_t`
--

CREATE TABLE IF NOT EXISTS `transaksi2_t` (
  `idBarang` varchar(250) NOT NULL,
  `namaBarang` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi2_t`
--

INSERT INTO `transaksi2_t` (`idBarang`, `namaBarang`, `harga`, `quantity`, `harga_total`) VALUES
('k202', 'obat', 2000, 2, 4000),
('k209', 'cincau', 3000, 3, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_t`
--

CREATE TABLE IF NOT EXISTS `transaksi_t` (
  `idTransaksi` int(250) NOT NULL,
  `idBarang` int(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_t`
--

CREATE TABLE IF NOT EXISTS `user_t` (
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_t`
--

INSERT INTO `user_t` (`username`, `nama_user`, `email`, `password`) VALUES
('imam', 'imam', 'imam@x.com', 'imam'),
('nurdin', 'nurdin', 'nurdin', 'nurdin'),
('test@x.com', 'asd', 'asd', '0Admintest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_t`
--
ALTER TABLE `inventory_t`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `transaksi2_t`
--
ALTER TABLE `transaksi2_t`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `transaksi_t`
--
ALTER TABLE `transaksi_t`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indexes for table `user_t`
--
ALTER TABLE `user_t`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
