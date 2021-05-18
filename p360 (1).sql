-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 12:57 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p360`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `uid` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `upass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ulevel` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `uid`, `upass`, `ulevel`) VALUES
(11, 'บริษัทสร้างบ้าน', 'user1', '81dc9bdb52d04dc20036dbd8313ed055', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hbuilding`
--

CREATE TABLE `hbuilding` (
  `HBID` int(11) NOT NULL,
  `HJID` int(11) NOT NULL,
  `HBName` text COLLATE utf8_unicode_ci NOT NULL,
  `HBimage` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hbuilding`
--

INSERT INTO `hbuilding` (`HBID`, `HJID`, `HBName`, `HBimage`) VALUES
(12, 12, 'บ้านทดสอบบบ1', '1534586243.jpg'),
(11, 11, 'ตึกไลฟ์A', '490159097.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hproject`
--

CREATE TABLE `hproject` (
  `HJID` int(11) NOT NULL,
  `HJName` text COLLATE utf8_unicode_ci NOT NULL,
  `HJimage` text COLLATE utf8_unicode_ci NOT NULL,
  `HJText` text COLLATE utf8_unicode_ci NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hproject`
--

INSERT INTO `hproject` (`HJID`, `HJName`, `HJimage`, `HJText`, `aid`) VALUES
(12, 'โครงการทดสอบบบบ', '896316754.png', '123456789', 11),
(11, 'โครงการไลฟ์วัลเลย์', '417523990.jpg', 'อ.เมือง ชลบุรี', 11);

-- --------------------------------------------------------

--
-- Table structure for table `img360`
--

CREATE TABLE `img360` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `360Name` text COLLATE utf8_unicode_ci NOT NULL,
  `pointX` float NOT NULL,
  `pointY` float NOT NULL,
  `image360` text COLLATE utf8_unicode_ci NOT NULL,
  `imagetitle` text COLLATE utf8_unicode_ci NOT NULL,
  `T360` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img360`
--

INSERT INTO `img360` (`id`, `pid`, `360Name`, `pointX`, `pointY`, `image360`, `imagetitle`, `T360`) VALUES
(48, 29, 'ห้องครัว', 71.19, 32.21, '1295987818.jpg', '', 'มีตู้เย็น'),
(47, 27, 'ห้องครับ', 70.31, 29.67, '784441841.jpg', '', 'กระทะ ตะหลิว ตู้เย็น');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pid` int(11) NOT NULL,
  `HBID` int(11) NOT NULL,
  `pname` text COLLATE utf8_unicode_ci NOT NULL,
  `pimages` text COLLATE utf8_unicode_ci NOT NULL,
  `Pshowimage` text COLLATE utf8_unicode_ci NOT NULL,
  `Ptext` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pid`, `HBID`, `pname`, `pimages`, `Pshowimage`, `Ptext`) VALUES
(29, 12, 'แปลนชั้นล่าง', '193290188.jpg', '', 'ฟหกนด่ฟหกด'),
(27, 11, 'แปลนชั้นล่าง', '1678017178.jpg', '', 'บ้านไลฟ์A'),
(28, 11, 'แปลนชั้นบน', '1773988742.jpg', '', 'ตึกไลฟ์A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `hbuilding`
--
ALTER TABLE `hbuilding`
  ADD PRIMARY KEY (`HBID`);

--
-- Indexes for table `hproject`
--
ALTER TABLE `hproject`
  ADD PRIMARY KEY (`HJID`);

--
-- Indexes for table `img360`
--
ALTER TABLE `img360`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hbuilding`
--
ALTER TABLE `hbuilding`
  MODIFY `HBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hproject`
--
ALTER TABLE `hproject`
  MODIFY `HJID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `img360`
--
ALTER TABLE `img360`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
