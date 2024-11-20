-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2020 at 08:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `br_id` int(11) NOT NULL AUTO_INCREMENT,
  `br_n` varchar(50) DEFAULT NULL,
  `br_stat` enum('open','close') NOT NULL,
  `br_add` varchar(60) DEFAULT NULL,
  `br_ph` varchar(20) DEFAULT NULL,
  `br_em` varchar(60) DEFAULT NULL,
  `br_lan` varchar(15) DEFAULT NULL COMMENT 'احداثي العرض',
  `br_log` varchar(15) DEFAULT NULL COMMENT 'احداثي الطول',
  PRIMARY KEY (`br_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_qus` varchar(150) NOT NULL,
  `f_ans` text NOT NULL,
  `fp_stat` enum('act','unact') NOT NULL,
  `f_uid` int(11) NOT NULL,
  PRIMARY KEY (`f_id`),
  UNIQUE KEY `f_uid` (`f_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ms_id` int(11) NOT NULL AUTO_INCREMENT,
  `ms_stat` enum('read','unread') NOT NULL,
  `ms_sn` varchar(50) DEFAULT NULL,
  `ms_sph` varchar(80) DEFAULT NULL,
  `ms_sem` varchar(100) DEFAULT NULL,
  `ms_subj` varchar(50) DEFAULT NULL,
  `ms_body` text,
  PRIMARY KEY (`ms_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `pg_id` int(11) NOT NULL AUTO_INCREMENT,
  `pg_titl` varchar(50) DEFAULT NULL,
  `pg_cont` text,
  `pg_pct` varchar(150) DEFAULT NULL,
  `pg_visit` int(11) DEFAULT NULL,
  `pg_stat` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`pg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_n` varchar(50) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_stat` enum('active','unactive') NOT NULL,
  `pro_visit` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pro_images`
--

DROP TABLE IF EXISTS `pro_images`;
CREATE TABLE IF NOT EXISTS `pro_images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_path` varchar(150) DEFAULT NULL,
  `img_desc` varchar(100) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`img_id`),
  UNIQUE KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_titl` varchar(50) DEFAULT NULL,
  `s_desc` text,
  `s_pct` varchar(150) DEFAULT NULL,
  `s_icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slid_id` int(11) NOT NULL AUTO_INCREMENT,
  `slid_st` enum('act','un') NOT NULL,
  `slid_img` varchar(150) NOT NULL,
  `s_path` varchar(150) NOT NULL,
  `s_clics` int(11) NOT NULL,
  PRIMARY KEY (`slid_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testmonies`
--

DROP TABLE IF EXISTS `testmonies`;
CREATE TABLE IF NOT EXISTS `testmonies` (
  `tst_id` int(11) NOT NULL AUTO_INCREMENT,
  `tst_st` enum('act','un') NOT NULL,
  `tst_comp` varchar(50) DEFAULT NULL,
  `tst_pct` varchar(150) DEFAULT NULL,
  `tst_n` varchar(60) DEFAULT NULL,
  `tst_cont` text,
  `tst_job` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tst_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL,
  `u_stat` enum('enable','unenable') NOT NULL,
  `u_ph` varchar(9) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
