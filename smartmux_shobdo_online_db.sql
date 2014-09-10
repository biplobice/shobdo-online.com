-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2014 at 10:14 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartmux_shobdo_online_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE `gallery_category` (
  `category_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id_2` (`category_id`),
  UNIQUE KEY `category_name` (`category_name`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`category_id`, `category_name`) VALUES
(1, 'My First Gallery'),
(2, 'My Second Gallery'),
(3, 'My Third Gallery'),
(4, 'My Fourth Gallery'),
(5, 'New Gallery'),
(8, 'safasf'),
(9, 'Wonderful'),
(10, 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `photo_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo_filename` varchar(225) DEFAULT NULL,
  `photo_caption` text,
  `photo_category` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`photo_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `gallery_photos`
--

INSERT INTO `gallery_photos` (`photo_id`, `photo_filename`, `photo_caption`, `photo_category`) VALUES
(28, '307703_442739435778457_406652734_n.jpg', 'wonderfull', 2),
(27, '217849_418320071553727_676814469_n.jpg', 'nice', 2),
(26, '2013-Chevrolet-Camaro-SS-1LE-Muscle-Car-04.jpg', 'car', 2),
(25, '1112-sbkp-01-z+2012-kawasaki-ZX-14R+lead-shot.jpg', 'bike', 2),
(24, '295209_458317437524130_2024695526_n.jpg', 'nice', 1),
(23, '208010_418059821585322_1017912733_n.jpg', 'wonder', 1),
(22, '61119_452290434823357_1776629549_n.jpg', 'like', 1),
(21, 'Biplob_ICE.jpg', 'hjghjughuygu', 1),
(29, '389393_483758258322208_545818683_n.jpg', 'nice', 3),
(30, '16191_10151346345887269_540785656_n.png', 'like it', 3),
(31, 'awesome.jpg', 'hello', 3),
(32, '8 Anika kabir Shokh.jpg', 'hi', 3),
(33, '487486_10151099262002746_2022418066_n.jpg', 'my world', 4),
(34, '2012_04_03_5_1_b.jpg', 'world', 4),
(35, '578171_220619028039426_100002739911239_299790_707445764_n.jpg', 'nice', 4),
(36, 'Untitled-1.jpg', 'yes', 4),
(37, '427892_440391936013207_1682962886_n.jpg', 'like', 1),
(38, '309315_10151140137224529_1595368294_n.jpg', 'hi world', 1),
(39, '246443_10151028438767033_300523496_n.jpg', 'fantacy', 1),
(40, '318883_10151134334374529_1265816020_n.jpg', 'awesome', 3),
(41, '309315_10151140137224529_1595368294_n', 'joss', 3),
(42, '16191_10151346345887269_540785656_n.png', 'wonder', 4),
(43, '311585_10151175902122518_907175168_n.jpg', 'nice', 4),
(44, '389632_307858362639769_966031099_n.jpg', 'beauti', 4),
(45, '2012_06_20_5_0_b.jpg', 'awesome', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `online` int(20) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `rtime` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `online`, `email`, `active`, `rtime`) VALUES
(2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1393916240, '', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
