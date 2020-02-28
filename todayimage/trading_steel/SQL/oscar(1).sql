-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2017 at 07:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oscar`
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
  `transactionpwd` varchar(140) NOT NULL,
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

INSERT INTO `tbl_admin` (`id`, `firstName`, `lastName`, `username`, `email`, `password`, `transactionpwd`, `metaDescription`, `metaKeywords`, `profilePicture`, `lastVisit`, `ip`, `locked`, `permissions`, `isDelete`) VALUES
(1, 'Oscer', 'Oscer', 'admin', 'admin', 'i5f355z4j5e3d336', 'i5f355z4j5e3d336', 'Oscer', 'Oscer', 'Oscer', 0, '78787', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comissions`
--

CREATE TABLE `tbl_comissions` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `referId` int(20) NOT NULL,
  `level` int(11) NOT NULL,
  `comission_percentage` varchar(255) NOT NULL,
  `comission_amount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comissions`
--

INSERT INTO `tbl_comissions` (`id`, `member_id`, `referId`, `level`, `comission_percentage`, `comission_amount`, `description`, `created_on`) VALUES
(1, 1, 5367955, 1, '7', '70.7', '', '2017-12-25 05:34:21'),
(2, 4, 1513486794, 1, '7', '35.35', '', '2017-12-25 05:34:58'),
(3, 1, 1513486794, 2, '4', '20.2', '', '2017-12-25 05:34:58'),
(4, 1, 5367955, 1, '7', '35.35', '', '2017-12-25 08:08:31'),
(5, 1, 5367955, 1, '7', '35.35', '', '2017-12-25 08:09:51'),
(6, 1, 5367955, 1, '7', '35.35', '', '2017-12-25 08:10:33'),
(7, 4, 1513486794, 1, '7', '70.7', '', '2017-12-25 08:10:49'),
(8, 1, 1513486794, 2, '4', '40.4', '', '2017-12-25 08:10:50'),
(9, 5, 1513487045, 1, '7', '35.35', '', '2017-12-25 10:43:43'),
(10, 4, 1513487045, 2, '4', '20.2', '', '2017-12-25 10:43:43'),
(11, 1, 1513487045, 3, '7', '35.35', '', '2017-12-25 10:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comission_levels`
--

CREATE TABLE `tbl_comission_levels` (
  `id` int(11) NOT NULL,
  `comission_level` varchar(255) NOT NULL,
  `comission_percent` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comission_levels`
--

INSERT INTO `tbl_comission_levels` (`id`, `comission_level`, `comission_percent`, `created`) VALUES
(1, '1', '7', '2017-12-23 16:43:33'),
(2, '2', '4', '2017-12-23 16:43:33'),
(3, '3', '7', '2017-12-23 16:44:12'),
(4, '4', '4', '2017-12-23 16:44:12'),
(5, '5', '3', '2017-12-23 16:44:12'),
(6, '6', '4', '2017-12-23 16:44:12');

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
(12, 1513488534, 'kimberlee kane', 'kimberlee@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513487045, 1, 1, '2017-12-16 11:28:54'),
(13, 1513969560, 'Srikanth', 'ponnuru.srikanth@gmail.com', 'h5v2t4p4g5s2h31644r4l573n3o3h3x4', '', '', '', NULL, '::1', 5367955, 1, 1, '2017-12-22 08:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mining`
--

CREATE TABLE `tbl_mining` (
  `id` int(11) NOT NULL,
  `rangefrom` varchar(255) NOT NULL,
  `rangeto` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mining`
--

INSERT INTO `tbl_mining` (`id`, `rangefrom`, `rangeto`, `amount`) VALUES
(1, '1', '20', '0.01'),
(2, '21', '100', '0.02'),
(3, '101', '200', '0.03'),
(4, '201', '2000', '0.04');

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
-- Table structure for table `tbl_payout_history`
--

CREATE TABLE `tbl_payout_history` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `payout_type` varchar(140) NOT NULL,
  `payout_amount` varchar(140) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payout_history`
--

INSERT INTO `tbl_payout_history` (`id`, `member_id`, `payout_type`, `payout_amount`, `comments`, `status`, `created_date`) VALUES
(1, 1, 'Share Bonus', '250', 'Based on Share bonus', 1, '2017-12-25 12:36:03'),
(2, 4, 'Share Bonus', '50', 'Based on Share bonus', 1, '2017-12-25 12:36:03'),
(3, 10, 'Share Bonus', '250', 'Based on Share bonus', 0, '2017-12-25 12:36:03'),
(4, 11, 'Share Bonus', '50', 'Based on Share bonus', 1, '2017-12-25 12:36:03'),
(5, 13, 'Share Bonus', '1000', 'Based on Share bonus', 2, '2017-12-25 12:36:03'),
(6, 1, 'Share Bonus', '250', 'Based on Share bonus', 1, '2017-12-25 17:23:40'),
(7, 4, 'Share Bonus', '50', 'Based on Share bonus', 1, '2017-12-25 17:23:40'),
(8, 10, 'Share Bonus', '250', 'Based on Share bonus', 1, '2017-12-25 17:23:40'),
(9, 11, 'Share Bonus', '50', 'Based on Share bonus', 1, '2017-12-25 17:23:40'),
(10, 13, 'Share Bonus', '1000', 'Based on Share bonus', 1, '2017-12-25 17:23:40');

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

--
-- Dumping data for table `tbl_rank`
--

INSERT INTO `tbl_rank` (`id`, `rank_name`, `personal_share`, `team_share`, `achievement_award`, `check_match`) VALUES
(1, 'ASSOCIATE', 0, 0, 0, 0),
(2, 'SENIOR ASSOCIATE', 10, 20, 50, 0),
(3, 'GLOBAL MANAGER', 20, 50, 250, 0),
(4, 'DIRECTOR', 50, 400, 1000, 1),
(5, 'PRESIDENT', 100, 1000, 2500, 2),
(6, 'CHAIRMAN', 200, 2000, 5000, 4),
(7, 'DIAMOND CHAIRMAN', 400, 6000, 15000, 7),
(8, 'AMBASSADOR', 600, 10000, 25000, 10),
(9, 'ELITE AMBASSADOR	', 1000, 20000, 50000, 15),
(10, 'BLACK DIAMOND AMBASSADOR', 1500, 40000, 100000, 20);

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
(28, 1, 3, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL3LXZFQDOJ9FCTW976B6YZA&key=43660e46711023bb3d5e05ac590f7955', '39S4jVNYJC5UWiocrC1qfumhMcBf9sioAn', 5, '0.00030868', 'CPBL3LXZFQDOJ9FCTW976B6YZA', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL3LXZFQDOJ9FCTW976B6YZA&key=43660e46711023bb3d5e05ac590f7955', 95400, 0, '2017-12-21 09:11:52'),
(43, 13, 8, 'USD', 'admin', 'admin', 505, '', 'admin', 'admin', 0, 1, '2017-12-25 09:10:33'),
(44, 10, 9, 'USD', 'admin', 'admin', 1010, '', 'admin', 'admin', 0, 1, '2017-12-25 09:10:49'),
(45, 11, 8, 'USD', 'admin', 'admin', 505, '', 'admin', 'admin', 0, 1, '2017-12-25 11:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_shares`
--

CREATE TABLE `tbl_user_shares` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `shares_count` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_shares`
--

INSERT INTO `tbl_user_shares` (`id`, `member_id`, `shares_count`, `createdon`) VALUES
(1, 13, 50, '2017-12-25 05:34:21'),
(2, 10, 30, '2017-12-25 05:34:58'),
(3, 11, 10, '2017-12-25 10:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_wallet_blnc`
--

CREATE TABLE `tbl_user_wallet_blnc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by_id` int(11) NOT NULL,
  `added_by_role` varchar(255) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_wallet_blnc`
--

INSERT INTO `tbl_user_wallet_blnc` (`id`, `user_id`, `balance`, `date_created`, `added_by_id`, `added_by_role`, `comments`) VALUES
(1, 1, '35', '2017-12-25 08:09:52', 0, '', ''),
(2, 1, '35', '2017-12-25 08:10:33', 0, '', ''),
(3, 13, '71', '2017-12-25 08:10:50', 0, '', ''),
(4, 1, '40', '2017-12-25 08:10:50', 0, '', ''),
(6, 13, '100', '2017-12-25 10:01:26', 0, 'admin', 'assad'),
(7, 13, '12', '2017-12-25 10:16:54', 0, 'admin', 'asdasd'),
(8, 5, '35', '2017-12-25 10:43:43', 0, '', 'From Comission of ReferId1513487045'),
(9, 4, '20', '2017-12-25 10:43:43', 0, '', 'From Comission of ReferId1513487045'),
(10, 1, '35', '2017-12-25 10:43:43', 0, '', 'From Comission of ReferId1513487045'),
(11, 10, '1', '2017-12-25 11:32:55', 0, '', 'From Shares Mining'),
(12, 11, '0', '2017-12-25 11:32:55', 0, '', 'From Shares Mining'),
(13, 13, '1', '2017-12-25 11:32:55', 0, '', 'From Shares Mining'),
(14, 10, '0.6', '2017-12-25 11:33:39', 0, '', 'From Shares Mining'),
(15, 11, '0.1', '2017-12-25 11:33:39', 0, '', 'From Shares Mining'),
(16, 13, '1', '2017-12-25 11:33:39', 0, '', 'From Shares Mining'),
(17, 13, '1000', '2017-12-25 13:08:35', 0, '', 'Credit Based on Share bonus'),
(18, 13, '1000', '2017-12-25 13:09:03', 0, '', 'Credit Based on Share bonus'),
(19, 13, '10', '2017-12-25 17:21:43', 0, 'admin', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_wallet_block`
--

CREATE TABLE `tbl_user_wallet_block` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `create_dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_wallet_withdraw`
--

CREATE TABLE `tbl_user_wallet_withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `withdraw_balance` int(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `way` varchar(255) NOT NULL,
  `btc_address` varchar(255) NOT NULL,
  `btc_price` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `paidDatetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_wallet_withdraw`
--

INSERT INTO `tbl_user_wallet_withdraw` (`id`, `user_id`, `withdraw_balance`, `date_created`, `way`, `btc_address`, `btc_price`, `status`, `paidDatetime`) VALUES
(1, 2, 1, '2017-12-25 08:29:19', 'mywallet', 'asdasdasdaasdasd', '0.00008488', 0, '0000-00-00 00:00:00'),
(2, 13, 2, '2017-12-23 08:32:34', 'mywallet', 'asdasdasdasdasd', '0.00016756', 0, '0000-00-00 00:00:00'),
(3, 13, 1, '2017-12-25 11:18:57', 'mywallet', 'asdasdasdasdd', '0.00008456', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `wallet_amount` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`id`, `member_id`, `wallet_amount`, `updated_date`) VALUES
(1, 1, '90.9', '2017-12-25 05:34:21'),
(2, 4, '35.35', '2017-12-25 05:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comissions`
--
ALTER TABLE `tbl_comissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comission_levels`
--
ALTER TABLE `tbl_comission_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mining`
--
ALTER TABLE `tbl_mining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payout_history`
--
ALTER TABLE `tbl_payout_history`
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
-- Indexes for table `tbl_user_shares`
--
ALTER TABLE `tbl_user_shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_wallet_blnc`
--
ALTER TABLE `tbl_user_wallet_blnc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_wallet_block`
--
ALTER TABLE `tbl_user_wallet_block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_wallet_withdraw`
--
ALTER TABLE `tbl_user_wallet_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
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
-- AUTO_INCREMENT for table `tbl_comissions`
--
ALTER TABLE `tbl_comissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_comission_levels`
--
ALTER TABLE `tbl_comission_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_mining`
--
ALTER TABLE `tbl_mining`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_payout_history`
--
ALTER TABLE `tbl_payout_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tbl_user_shares`
--
ALTER TABLE `tbl_user_shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user_wallet_blnc`
--
ALTER TABLE `tbl_user_wallet_blnc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_user_wallet_withdraw`
--
ALTER TABLE `tbl_user_wallet_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
