-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2013 at 04:33 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `devnila`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date_post` datetime NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `description`, `date_post`) VALUES
(1, 'Portofolio', 'kategori ini untuk postingan yang mengandung portofolio perusahaan', '0000-00-00 00:00:00'),
(2, 'Open Source', 'Mengandung unsur open source dan lalala yeyeye', '0000-00-00 00:00:00'),
(3, 'Event ', 'ini lllaaa yyyy eeeeee', '0000-00-00 00:00:00'),
(4, 'Pemrograman', 'llllaaaa yeeyeyeyeyeyeyeyeyeye&nbsp;', '0000-00-00 00:00:00'),
(5, 'Mobile', 'lalalalalal yeyeyeyeyeyeyeyey<span class="Apple-tab-span" style="white-space:pre">		</span>', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date_post` datetime NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contactus`
--


-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(240) NOT NULL,
  `title` varchar(240) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `page`
--


-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(240) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_post` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`),
  UNIQUE KEY `id_post` (`id_post`),
  UNIQUE KEY `id_post_2` (`id_post`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `user_id`, `title`, `note`, `status`, `date_post`, `date_updated`) VALUES
(1, 1, 'Game Pesawat Terbang', 'ini menggunakan library andengine, perfect tum lores ipsum soladolarodas aoy geboy gedebung enjoy lala yeye , oh apaka', 1, '2013-06-22 08:28:15', '2013-06-23 23:19:57'),
(2, 1, 'Blackberry 10', 'Perusahaan Research in Motion telah melakukan perombakan total di bagian operating system untuk handset andalan mereka yaitu Blackberry 10. Operating system ini sangat berbeda dengan versi sebelumnya. Memiliki kemampuan yang istimewa dalam interaksi dengan usernya. Berbeda dengan versi sebelumnya yang menggunakan platform java, kini Blackberry 10 mengusung platform dengan bahasa pemrograman C/C++ untuk native developernya.', 1, '2013-06-22 08:31:36', '2013-06-23 23:19:51'),
(3, 2, 'Lalala Yeyeye', 'Sekarang sudah banyak sekali lowongan pekerjaan untuk orang-orang alay. Perkembangan dunia permusikan di Indonesia menyebabkan orang alay semakin dibutuhkan. Terutama untuk bumbu kemeriahan panggung. Salah satu kemampuan yang harus dimiliki oleh orang alay adalah kemampuannya dalam menyuarakan suara LALALA YEYEYE. Dan akan menjadi nilai jual ketika kemampuannya dalam merubah jati diri nya menjadi kemayu khusus untuk lelaki.', 1, '2013-06-23 18:14:30', '2013-06-23 23:20:13'),
(4, 1, 'Coba-coba', 'anak muda jaman sekarang sudah senang sekali dengan hal hal yang mengandung coba2. terutama di dalam hal coba2 menjadi anak shaleh. porto folio lorem ipsum laladuks ubaduks kana waduks', 1, '2013-06-19 01:32:46', '2013-06-23 23:24:08'),
(5, 2, 'Kini Berbeda', 'Semakin hari semakin berbeda. Jaman ini sudah terbalik. Sudah banyak perubahan di dunia dan di maya. lalala yeyeye ulalala ubebebbebe, sekarang juga orang semakin menggila.', 1, '2013-06-23 23:23:09', '2013-06-23 23:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id_post_category` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id_post_category`, `post_id`, `category_id`) VALUES
(2, 1, 1),
(3, 1, 5),
(5, 2, 5),
(19, 5, 5),
(18, 5, 4),
(17, 5, 2),
(20, 4, 1),
(21, 4, 3),
(22, 3, 1),
(23, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `post_resource`
--

CREATE TABLE IF NOT EXISTS `post_resource` (
  `id_post_resource` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post_resource`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `post_resource`
--


-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `id_resource` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_location` text NOT NULL,
  `title` varchar(240) NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  PRIMARY KEY (`id_resource`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resource`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `full_name`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin sok iyey', 'iyey_lalala@gmail.com'),
(2, 'ulala', '21232f297a57a5a743894a0e4a801fc3', 'Ulala bin Admin', 'ulala_bin_admin@gmail.com');
