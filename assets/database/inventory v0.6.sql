-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 06:01 AM
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
-- Table structure for table `inventory_t`
--

CREATE TABLE IF NOT EXISTS `inventory_t` (
  `idBarang` varchar(250) NOT NULL,
  `namaBarang` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `idPenyedia` varchar(250) NOT NULL,
  `tanggal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyedia_t`
--

CREATE TABLE IF NOT EXISTS `penyedia_t` (
  `idPenyedia` varchar(250) NOT NULL,
  `namaPenyedia` varchar(500) NOT NULL,
  `discount` int(11) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_t`
--

CREATE TABLE IF NOT EXISTS `transaksi_t` (
  `idBarang` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL
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
-- Indexes for table `penyedia_t`
--
ALTER TABLE `penyedia_t`
  ADD PRIMARY KEY (`idPenyedia`);

--
-- Indexes for table `user_t`
--
ALTER TABLE `user_t`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
