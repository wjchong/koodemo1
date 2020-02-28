-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 01:44 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_oscar`
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
(1, 'Oscer', 'Oscer', 'admin', 'info@crypto.in', '75v315t4g5t3z2h4', 'i5f355z4j5e3d336', 'Oscer', 'Oscer', 'Oscer', 0, '78787', 'no', 'no', 'no');

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
(11, 1, 1513487045, 3, '7', '35.35', '', '2017-12-25 10:43:43'),
(12, 1, 5367955, 1, '7', '3.5', '', '2017-12-30 06:38:17');

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
(1, 5367955, 'shahzad tariq', 'shahzad.tariq92@gmail.com', '75v315t4g5t3z2h4', '+923226070231', 'USA', 'Holiday Inn Express & Suites Pittsburg.', '', '39.52.20.111', 0, 1, 1, '2017-12-11 12:35:48'),
(4, 1513486794, 'richard clark', 'shahzadtariq25@yahoo.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 5367955, 1, 1, '2017-12-16 10:59:54'),
(5, 1513487045, 'Micheal Jordan', 'micheal@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513486794, 1, 1, '2017-12-16 11:04:05'),
(6, 1513487247, 'james smith', 'james@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 5367955, 1, 1, '2017-12-16 11:07:27'),
(7, 1513487914, 'David Smith', 'david@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 5367955, 1, 1, '2017-12-16 11:18:34'),
(8, 1513488058, 'johnson parker', 'johson@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 5367955, 1, 1, '2017-12-16 11:20:58'),
(9, 1513488169, 'John Richard', 'john@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513486794, 1, 1, '2017-12-16 11:22:49'),
(10, 1513488273, 'Adam Shaw', 'adam@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513486794, 1, 1, '2017-12-16 11:24:33'),
(11, 1513488377, 'johnathan james', 'johnathan@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513487045, 1, 1, '2017-12-16 11:26:17'),
(12, 1513488534, 'kimberlee kane', 'kimberlee@gmail.com', 'i5f355z4j5e3d336', '', '', '', '', '103.255.5.37', 1513487045, 1, 1, '2017-12-16 11:28:54'),
(13, 1513969560, 'Srikanth', 'ponnuru.srikanth@gmail.com', 'h5v2t4p4g5s2h31644r4l573n3o3h3x4', '', '', '', NULL, '::1', 5367955, 1, 1, '2017-12-22 08:06:00'),
(14, 1514889993, 'kamal', 'kamalji010@gmail.com', 'f5u2p4t485t3v46614r4n4r484r3d383', '', '', '', NULL, '::1', 5367955, 0, 1, '2018-01-02 11:46:33'),
(15, 1514890498, 'Keshav', 'admin@gmail.com', '75v315t4g5t3z2h4', '', '', '', NULL, '::1', 5367955, 0, 1, '2018-01-02 11:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `ticketid` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `ticketid`, `message`, `uid`) VALUES
(1, '4sGMqLLG3P3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id porttitor tortor. Nunc sed mi et dui dignissim vestibulum ac semper metus. In pellentesque a nisl quis ultrices. Nulla eu lobortis lacus. Vestibulum malesuada quam vel enim dignissim fringilla. Sed finibus tortor et velit fringilla, et commodo risus sagittis', 4),
(2, '4sGMqLLG3P3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id porttitor tortor. Nunc sed mi et dui dignissim vestibulum ac semper metus. In pellentesque a nisl quis ultrices. Nulla eu lobortis lacus. Vestibulum malesuada quam vel enim dignissim fringilla.', 1),
(3, '4ljCb05YKCD', 'kp[opo', 4),
(4, '', 'aaaaaaaaaaaa\r\n', 0),
(5, '', 'sdfsfsafas\r\n\r\n\r\n', 0),
(6, '4ljCb05YKCD', 'sdopfjkasof', 4);

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
  `pack_name` varchar(100) NOT NULL,
  `no_share` varchar(100) NOT NULL,
  `pack_cost` int(100) NOT NULL,
  `cry_fees` int(100) NOT NULL,
  `pack_income` varchar(100) NOT NULL,
  `pack_permonth` varchar(100) NOT NULL,
  `pack_daily` varchar(100) NOT NULL,
  `pack_capbacaft` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id`, `pack_name`, `no_share`, `pack_cost`, `cry_fees`, `pack_income`, `pack_permonth`, `pack_daily`, `pack_capbacaft`, `date_created`, `status`) VALUES
(2, 'Crypto Abundance Silver Pack ', '1,20', 50, 3, 'Crypto Mining & Trading Income', '(Up to 42% per Month)', 'Income Accrued Daily', 'Capital Back after 320 Days', '2017-12-27 12:15:17', 1),
(14, 'Crypto Abundance Gold Pack', '21,100', 40, 2, 'Crypto Mining & Trading Income', '(Up to 45% per Month)', 'Income Accrued Daily', 'Capital Back after 280 Days', '2017-12-27 13:02:52', 1),
(15, 'Crypto Abundance Diamond Pack', '101,200', 30, 2, 'Crypto Mining & Trading Income', '(Up to 47% per Month)', 'Income Accrued Daily', 'Capital Back after 240 Days', '2017-12-27 13:05:19', 1),
(16, 'Crypto Abundance Platinum Pack', '201,2000', 20, 1, 'Crypto Mining & Trading Income', '(Up to 50% per Month)', 'Income Accrued Daily', 'Capital Back after 180 Days', '2017-12-27 13:06:25', 1);

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
-- Table structure for table `tbl_tickets`
--

CREATE TABLE `tbl_tickets` (
  `id` int(11) NOT NULL,
  `ticketid` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `tickettype` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attachment` text NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tickets`
--

INSERT INTO `tbl_tickets` (`id`, `ticketid`, `uid`, `tickettype`, `name`, `sub`, `message`, `attachment`, `status`) VALUES
(1, '4sGMqLLG3P3', 4, 'Option One', 'richard clark', 'first ticket', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id porttitor tortor. Nunc sed mi et dui dignissim vestibulum ac semper metus. In pellentesque a nisl quis ultrices. Nulla eu lobortis lacus. Vestibulum malesuada quam vel enim dignissim fringilla. Sed finibus tortor et velit fringilla, et commodo risus sagittis', '0/480-Chrysanthemum.jpg', 2),
(2, '4ljCb05YKCD', 4, 'Option Two', 'richard clark', 'kj', 'kp[opo', '0/144-logo.png', 0);

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
  `totalshare` int(10) NOT NULL,
  `txn_id` text NOT NULL,
  `status_url` text NOT NULL,
  `timeout` int(200) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `mem_id`, `package_id`, `currency`, `qrcode_url`, `address`, `amount_usd`, `amount`, `totalshare`, `txn_id`, `status_url`, `timeout`, `status`, `created_date`) VALUES
(7, 1, 2, 'LTCT', 'https://www.coinpayments.net/qrgen.php?id=CPBL591HJLWUSRBEJJSOE18BSM&key=d26e962bd32d6f6c6dc1b788e0244800', 'mqDQeBZhfok6yboCxcjc4Q5zL2vHCtb2EZ', 0, '0.00103386', 0, 'CPBL591HJLWUSRBEJJSOE18BSM', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL591HJLWUSRBEJJSOE18BSM&key=d26e962bd32d6f6c6dc1b788e0244800', 3600, 1, '2017-12-16 08:30:30'),
(15, 1, 2, 'LTCT', 'https://www.coinpayments.net/qrgen.php?id=CPBL2C7O3HWVFGZMGLSAE0LKP9&key=8ea4176367b3bff4d1fb52f839b049a5', 'mn53fKU2MeveRD4CkipefCSMhQsgXoK5CY', 150, '0.00800251', 0, 'CPBL2C7O3HWVFGZMGLSAE0LKP9', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL2C7O3HWVFGZMGLSAE0LKP9&key=8ea4176367b3bff4d1fb52f839b049a5', 3600, 1, '2017-12-18 10:41:25'),
(18, 1, 2, 'LTCT', 'https://www.coinpayments.net/qrgen.php?id=CPBL5AWABUOXTS8CYWVYFKPJ16&key=52766ed1a88c131fbf52e3e847f86d17', 'mne4K8yEqw3kXSALDHMwV2QQo3FwhFr7JB', 150, '0.00807417', 0, 'CPBL5AWABUOXTS8CYWVYFKPJ16', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL5AWABUOXTS8CYWVYFKPJ16&key=52766ed1a88c131fbf52e3e847f86d17', 3600, 1, '2017-12-18 11:45:48'),
(23, 1, 16, 'USD', 'admin', 'admin', 9, '', 0, 'admin', 'admin', 0, 1, '2017-12-18 03:01:44'),
(27, 1, 15, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL3XASIDJE3IHSDGZVJ8WUYW&key=ef9e73eee8e47ef75393edac738ace99', '32foArde5dKESPMLbNs932uES96SBsoZbu', 5, '0.00030687', 0, 'CPBL3XASIDJE3IHSDGZVJ8WUYW', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL3XASIDJE3IHSDGZVJ8WUYW&key=ef9e73eee8e47ef75393edac738ace99', 95400, 0, '2017-12-21 08:52:37'),
(28, 1, 15, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL3LXZFQDOJ9FCTW976B6YZA&key=43660e46711023bb3d5e05ac590f7955', '39S4jVNYJC5UWiocrC1qfumhMcBf9sioAn', 5, '0.00030868', 0, 'CPBL3LXZFQDOJ9FCTW976B6YZA', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL3LXZFQDOJ9FCTW976B6YZA&key=43660e46711023bb3d5e05ac590f7955', 95400, 0, '2017-12-21 09:11:52'),
(43, 13, 14, 'USD', 'admin', 'admin', 505, '', 0, 'admin', 'admin', 0, 1, '2017-12-25 09:10:33'),
(44, 10, 14, 'USD', 'admin', 'admin', 1010, '', 0, 'admin', 'admin', 0, 1, '2017-12-25 09:10:49'),
(45, 11, 14, 'USD', 'admin', 'admin', 505, '', 0, 'admin', 'admin', 0, 1, '2017-12-25 11:43:42'),
(46, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL4ATVFEBAN0B7IG2SV17DXG&key=3c87168b3942302febcc5ac90f121ce3', '3LK2MnaEbsnWbFXe2irQmQpUF76t6bV25f', 53, '0.00354998', 0, 'CPBL4ATVFEBAN0B7IG2SV17DXG', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL4ATVFEBAN0B7IG2SV17DXG&key=3c87168b3942302febcc5ac90f121ce3', 97200, 0, '2017-12-29 06:17:24'),
(47, 4, 2, 'LTCT', 'https://www.coinpayments.net/qrgen.php?id=CPBL5CJWI6AUIYDOLYPXURKKST&key=1937a2fe7a19af57ec571b80a343d3f1', 'mnMBq7KezcnJsgJ3kivbsKZioJM1Pk4XFN', 53, '0.00354998', 0, 'CPBL5CJWI6AUIYDOLYPXURKKST', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL5CJWI6AUIYDOLYPXURKKST&key=1937a2fe7a19af57ec571b80a343d3f1', 5400, 0, '2017-12-29 06:18:48'),
(48, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL7EXJERSD1STYZV6DM7YA3T&key=9ff341091ed661100e1ad1db7dcaf797', '343nku5htcMxT2XorNdGeXWYaYAwjznvBy', 53, '0.00354998', 0, 'CPBL7EXJERSD1STYZV6DM7YA3T', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL7EXJERSD1STYZV6DM7YA3T&key=9ff341091ed661100e1ad1db7dcaf797', 97200, 0, '2017-12-29 06:19:28'),
(49, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL5EWVBQ5ZDJ7PPKJ55FPBDR&key=376bdd23345f8bd77d953b714aecb74e', '36K2H4G6EqLR2yBLTcxbkbhexspB8kM2MX', 53, '0.00360741', 0, 'CPBL5EWVBQ5ZDJ7PPKJ55FPBDR', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL5EWVBQ5ZDJ7PPKJ55FPBDR&key=376bdd23345f8bd77d953b714aecb74e', 97200, 0, '2017-12-29 08:01:36'),
(50, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL5DNGTKFL3LB3RWOGZP610E&key=8358262efdc65d4219b517deef680ce3', '35gYdpi4uPvv2gay5vUoGrjur1ivKujnPJ', 53, '0.00360741', 0, 'CPBL5DNGTKFL3LB3RWOGZP610E', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL5DNGTKFL3LB3RWOGZP610E&key=8358262efdc65d4219b517deef680ce3', 97200, 0, '2017-12-29 08:02:33'),
(51, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL4NML4WHWWHD9MUGUE6NOAK&key=58ede2852a299d9aaeaa6c7c177ac844', '3ExvFrZjf9GiLVEpRG263yMmwNyhSk9emH', 53, '0.00360741', 0, 'CPBL4NML4WHWWHD9MUGUE6NOAK', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL4NML4WHWWHD9MUGUE6NOAK&key=58ede2852a299d9aaeaa6c7c177ac844', 97200, 0, '2017-12-29 08:03:01'),
(52, 4, 2, 'LTCT', 'https://www.coinpayments.net/qrgen.php?id=CPBL25QI3D2VIVO9WIL4KBDD5O&key=6bf019c8b0940be85795d42a1b30ea1a', 'micQHb3ngySZk43s2m2r27ra45BuMrmRR6', 53, '0.00360741', 0, 'CPBL25QI3D2VIVO9WIL4KBDD5O', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL25QI3D2VIVO9WIL4KBDD5O&key=6bf019c8b0940be85795d42a1b30ea1a', 5400, 0, '2017-12-29 08:07:54'),
(53, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL1I5HFW4C9QYXZQCMPCHS11&key=5b8287eb07c2858733922042e1831640', '3C1BGLUVsbhZN5JwhVUYw2xZyfub1K87jA', 553, '0.03839968', 0, 'CPBL1I5HFW4C9QYXZQCMPCHS11', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL1I5HFW4C9QYXZQCMPCHS11&key=5b8287eb07c2858733922042e1831640', 97200, 0, '2017-12-29 09:49:58'),
(54, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL2P3HEX64AOLUMJQPGGQYQK&key=03a57f7a7b799c09968f8bc506b516d1', '35dwtsepXrTi5YjsQ2h4yYvYmhRaLaDafW', 103, '0.00715220', 0, 'CPBL2P3HEX64AOLUMJQPGGQYQK', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL2P3HEX64AOLUMJQPGGQYQK&key=03a57f7a7b799c09968f8bc506b516d1', 97200, 0, '2017-12-29 09:54:42'),
(55, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL7GS30QDYFDCEPHUTJ4SYNF&key=641ff990d007f1a6e7f3aec7dba2ad0f', '3NAMYRA5JnTJHC46xeBM4UZ5ydPccEYHn7', 103, '0.00749379', 0, 'CPBL7GS30QDYFDCEPHUTJ4SYNF', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL7GS30QDYFDCEPHUTJ4SYNF&key=641ff990d007f1a6e7f3aec7dba2ad0f', 97200, 0, '2017-12-30 03:52:22'),
(56, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL3LZIFD9CNO9NKGQTMEKK6B&key=7f60dfcce89c739fcaab8dcb9ff0c767', '38YrV7c1C9ZvdTnZKU5QdrZofuRDBbG6Zz', 53, '0.00392900', 0, 'CPBL3LZIFD9CNO9NKGQTMEKK6B', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL3LZIFD9CNO9NKGQTMEKK6B&key=7f60dfcce89c739fcaab8dcb9ff0c767', 97200, 0, '2017-12-30 06:03:30'),
(57, 4, 2, 'USD', 'admin', 'admin', 50, '', 0, 'admin', 'admin', 0, 1, '2017-12-30 06:38:17'),
(58, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL4G1M2YTMKEU4R50GTA8WGD&key=585a0b64cca0a3f927973f199b05b1d0', '34qCzuEXd1Vx1As94FnmW1Xo6c2ipooKHm', 43, '0.00314654', 0, 'CPBL4G1M2YTMKEU4R50GTA8WGD', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL4G1M2YTMKEU4R50GTA8WGD&key=585a0b64cca0a3f927973f199b05b1d0', 97200, 0, '2017-12-30 06:39:50'),
(59, 4, 2, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL29WM6SAZ1JR7TG9EFSX9OZ&key=bc77d05b5d6194ab1b2a6ce04e43c67e', '3B13rkWE4EHt4UvrA4aaQ9445dckENeQkj', 103, '0.00749635', 0, 'CPBL29WM6SAZ1JR7TG9EFSX9OZ', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL29WM6SAZ1JR7TG9EFSX9OZ&key=bc77d05b5d6194ab1b2a6ce04e43c67e', 97200, 0, '2017-12-30 09:14:20'),
(60, 4, 14, 'BTC', 'https://www.coinpayments.net/qrgen.php?id=CPBL2SQYTRICVDR3EKUEM8K6JA&key=978258ef8d48aa9c0d03553c54accc35', '3CBHyPF5VHrWyG5t2eTqrYw4wBseZAJmyH', 1442, '0.10584986', 36, 'CPBL2SQYTRICVDR3EKUEM8K6JA', 'https://www.coinpayments.net/index.php?cmd=status&id=CPBL2SQYTRICVDR3EKUEM8K6JA&key=978258ef8d48aa9c0d03553c54accc35', 97200, 0, '2017-12-30 12:05:08');

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
(3, 11, 10, '2017-12-25 10:43:42'),
(4, 4, 1, '2017-12-30 06:38:17');

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
(9, 4, '100', '2017-12-25 10:43:43', 0, '', 'From Comission of ReferId1513487045'),
(10, 1, '35', '2017-12-25 10:43:43', 0, '', 'From Comission of ReferId1513487045'),
(11, 10, '1', '2017-12-25 11:32:55', 0, '', 'From Shares Mining'),
(12, 11, '0', '2017-12-25 11:32:55', 0, '', 'From Shares Mining'),
(13, 13, '1', '2017-12-25 11:32:55', 0, '', 'From Shares Mining'),
(14, 10, '0.6', '2017-12-25 11:33:39', 0, '', 'From Shares Mining'),
(15, 11, '0.1', '2017-12-25 11:33:39', 0, '', 'From Shares Mining'),
(16, 13, '1', '2017-12-25 11:33:39', 0, '', 'From Shares Mining'),
(17, 13, '1000', '2017-12-25 13:08:35', 0, '', 'Credit Based on Share bonus'),
(18, 13, '1000', '2017-12-25 13:09:03', 0, '', 'Credit Based on Share bonus'),
(19, 13, '10', '2017-12-25 17:21:43', 0, 'admin', 'asdasdasd'),
(20, 1, '3.5', '2017-12-30 06:38:17', 0, '', 'From Comission of ReferId5367955');

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
(3, 13, 1, '2017-12-25 11:18:57', 'mywallet', 'asdasdasdasdd', '0.00008456', 0, NULL),
(4, 4, 100, '2017-12-30 09:34:30', 'mywallet', 'mywallet', '', 0, NULL),
(6, 4, 0, '2017-12-30 09:44:20', 'mywallet', 'mywallet', '', 0, NULL);

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
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
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
-- Indexes for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_comission_levels`
--
ALTER TABLE `tbl_comission_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_mining`
--
ALTER TABLE `tbl_mining`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tbl_user_shares`
--
ALTER TABLE `tbl_user_shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user_wallet_blnc`
--
ALTER TABLE `tbl_user_wallet_blnc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_user_wallet_withdraw`
--
ALTER TABLE `tbl_user_wallet_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
