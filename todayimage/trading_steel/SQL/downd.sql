-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2017 at 08:21 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `downd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(140) NOT NULL,
  `password` varchar(140) NOT NULL,
  `metaDescription` varchar(255) NOT NULL,
  `metaKeywords` varchar(255) NOT NULL,
  `profilePicture` varchar(255) NOT NULL,
  `lastVisit` int(11) NOT NULL,
  `ip` varchar(33) NOT NULL,
  `locked` enum('no','yes') NOT NULL,
  `permissions` text NOT NULL,
  `isDelete` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `firstName`, `lastName`, `username`, `email`, `password`, `metaDescription`, `metaKeywords`, `profilePicture`, `lastVisit`, `ip`, `locked`, `permissions`, `isDelete`) VALUES
(1, 'Oscer', 'Oscer', 'admin', 'admin', 'i5f355z4j5e3d336', 'Oscer', 'Oscer', 'Oscer', 0, '78787', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL,
  `referId` int(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `IP` varchar(255) NOT NULL,
  `parent_referId` int(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT '1',
  `account_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `referId`, `fullname`, `email`, `pswd`, `phone`, `country`, `address`, `image`, `IP`, `parent_referId`, `status`, `block`, `account_date`) VALUES
(1, 5367955, 'shahzad tariq', 'shahzad.tariq92@gmail.com', 'i5f355z4j5a3g356h336e433', '+923226070231', 'USA', 'Holiday Inn Express & Suites Pittsburg.', '', '39.52.20.111', 0, 1, 1, '2017-12-11 12:35:48'),
(4, 1513486794, 'richard clark', 'shahzadtariq25@yahoo.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 5367955, 1, 1, '2017-12-16 10:59:54'),
(5, 1513487045, 'Micheal Jordan', 'micheal@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513486794, 1, 1, '2017-12-16 11:04:05'),
(6, 1513487247, 'james smith', 'james@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 5367955, 1, 1, '2017-12-16 11:07:27'),
(7, 1513487914, 'David Smith', 'david@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 5367955, 1, 1, '2017-12-16 11:18:34'),
(8, 1513488058, 'johnson parker', 'johson@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 5367955, 1, 1, '2017-12-16 11:20:58'),
(9, 1513488169, 'John Richard', 'john@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513486794, 1, 1, '2017-12-16 11:22:49'),
(10, 1513488273, 'Adam Shaw', 'adam@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513486794, 1, 1, '2017-12-16 11:24:33'),
(11, 1513488377, 'johnathan james', 'johnathan@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513487045, 1, 1, '2017-12-16 11:26:17'),
(12, 1513488534, 'kimberlee kane', 'kimberlee@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513487045, 1, 1, '2017-12-16 11:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id` int(100) NOT NULL,
  `no_share` int(100) NOT NULL,
  `pack_cost` int(100) NOT NULL,
  `mem_fees` int(100) NOT NULL,
  `total_roi` int(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id`, `no_share`, `pack_cost`, `mem_fees`, `total_roi`, `date_created`, `status`) VALUES
(1, 1, 100, 50, 25, '2017-12-09 12:52:59', 1),
(2, 6, 4, 10, 16, '2017-12-09 12:55:48', 0),
(3, 3, 2, 3, 4, '2017-12-09 13:06:35', 1),
(4, 5, 4, 5, 4, '2017-12-10 04:34:08', 1),
(5, 1, 50, 5, 70, '2017-12-10 05:18:02', 0),
(8, 10, 500, 5, 42, '2017-12-21 03:26:44', 1),
(9, 20, 1000, 10, 42, '2017-12-21 03:27:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `id` int(11) NOT NULL,
  `rank_name` varchar(255) NOT NULL,
  `personal_share` int(20) NOT NULL,
  `team_share` int(20) NOT NULL,
  `achievement_award` int(100) NOT NULL,
  `check_match` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `mem_id` int(20) NOT NULL,
  `package_id` int(20) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `qrcode_url` text NOT NULL,
  `address` text NOT NULL,
  `amount_usd` int(20) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `txn_id` text NOT NULL,
  `status_url` text NOT NULL,
  `timeout` int(200) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `mem_id`, `package_id`, `currency`, `qrcode_url`, `address`, `amount_usd`, `amount`, `txn_id`, `status_url`, `timeout`, `status`, `created_date`) VALUES
(7, 1, 1, 'LTCT', 'https://www.coinpayments.net/qrgen.php?id=CPBL591HJLWUSRBEJJSOE18BSM&key=d26e962bd32d6f6c6dc1b788e0244800', 'mqDQeBZhfok6yboCxcjc4Q5zL2vHCtb2EZ', 0, '0.00103386', 'CPBL591HJLWUSRBEJJSOE18BSM', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL591HJLWUSRBEJJSOE18BSM&key=d26e962bd32d6f6c6dc1b788e0244800', 3600, 1, '2017-12-16 08:30:30'),
(15, 1, 1, 'LTCT', 'https://www.coinpayments.net/qrgen.php?id=CPBL2C7O3HWVFGZMGLSAE0LKP9&key=8ea4176367b3bff4d1fb52f839b049a5', 'mn53fKU2MeveRD4CkipefCSMhQsgXoK5CY', 150, '0.00800251', 'CPBL2C7O3HWVFGZMGLSAE0LKP9', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL2C7O3HWVFGZMGLSAE0LKP9&key=8ea4176367b3bff4d1fb52f839b049a5', 3600, 1, '2017-12-18 10:41:25'),
(18, 1, 1, 'LTCT', 'https://www.coinpayments.net/qrgen.php?id=CPBL5AWABUOXTS8CYWVYFKPJ16&key=52766ed1a88c131fbf52e3e847f86d17', 'mne4K8yEqw3kXSALDHMwV2QQo3FwhFr7JB', 150, '0.00807417', 'CPBL5AWABUOXTS8CYWVYFKPJ16', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL5AWABUOXTS8CYWVYFKPJ16&key=52766ed1a88c131fbf52e3e847f86d17', 3600, 1, '2017-12-18 11:45:48'),
(23, 1, 4, 'USD', 'admin', 'admin', 9, '', 'admin', 'admin', 0, 1, '2017-12-18 03:01:44'),
(27, 1, 3, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL3XASIDJE3IHSDGZVJ8WUYW&key=ef9e73eee8e47ef75393edac738ace99', '32foArde5dKESPMLbNs932uES96SBsoZbu', 5, '0.00030687', 'CPBL3XASIDJE3IHSDGZVJ8WUYW', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL3XASIDJE3IHSDGZVJ8WUYW&key=ef9e73eee8e47ef75393edac738ace99', 95400, 0, '2017-12-21 08:52:37'),
(28, 1, 3, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL3LXZFQDOJ9FCTW976B6YZA&key=43660e46711023bb3d5e05ac590f7955', '39S4jVNYJC5UWiocrC1qfumhMcBf9sioAn', 5, '0.00030868', 'CPBL3LXZFQDOJ9FCTW976B6YZA', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL3LXZFQDOJ9FCTW976B6YZA&key=43660e46711023bb3d5e05ac590f7955', 95400, 0, '2017-12-21 09:11:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
