-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2013 at 01:26 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.14

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
  `thumbnail` text NOT NULL,
  `date_post` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`),
  UNIQUE KEY `id_post` (`id_post`),
  UNIQUE KEY `id_post_2` (`id_post`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `user_id`, `title`, `note`, `status`, `thumbnail`, `date_post`, `date_updated`) VALUES
(9, 2, 'Game Mobile', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/cloud_20.jpg', '2013-09-09 23:38:53', '2013-09-09 23:38:53'),
(10, 2, 'Game Edukasi', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/opensourcephotography-alles2-klein.png', '2013-09-09 23:43:14', '2013-09-09 23:43:14'),
(8, 2, 'Seminar Software Freedom Day', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/images.jpeg\r\n', '2013-09-09 23:34:17', '2013-09-09 23:38:15'),
(7, 2, 'Game Tebak Kata', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/pic1.jpg', '2013-09-09 23:18:04', '2013-09-09 23:29:29'),
(11, 2, 'Crot Gosok Bilas', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/shelldriver.jpg', '2013-09-09 23:44:35', '2013-09-09 23:44:35'),
(12, 2, 'Web Dev', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/Screenshot-1.png', '2013-09-09 23:46:02', '2013-09-09 23:46:02'),
(13, 2, 'awww', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/pic1.jpg', '2013-09-09 23:47:40', '2013-09-10 00:36:58'),
(14, 2, 'ya ampun', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/dinamik7.jpg', '2013-09-09 23:48:03', '2013-09-09 23:48:03'),
(15, 2, 'crot', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/208097_123151671169982_275879533_n.png', '2013-09-09 23:48:26', '2013-09-09 23:48:26'),
(16, 2, 'haha', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', 1, 'asset/resource/keluarga_besar.jpg', '2013-09-09 23:48:47', '2013-09-09 23:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id_post_category` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id_post_category`, `post_id`, `category_id`) VALUES
(2, 1, 1),
(3, 1, 5),
(5, 2, 5),
(29, 10, 1),
(28, 9, 1),
(27, 8, 1),
(20, 4, 1),
(21, 4, 3),
(31, 12, 1),
(30, 11, 1),
(24, 6, 1),
(26, 7, 1),
(50, 13, 1),
(33, 14, 1),
(34, 15, 1),
(35, 16, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`id_resource`, `user_id`, `file_location`, `title`, `description`, `type`, `size`, `extension`, `date_uploaded`) VALUES
(1, 2, 'asset/resource/pic1.jpg', '', '', 1, 0, '', '2013-09-09 23:18:04'),
(2, 2, 'asset/resource/images.jpeg', '', '', 1, 0, '', '2013-09-09 23:34:17'),
(3, 2, 'asset/resource/cloud_20.jpg', '', '', 1, 0, '', '2013-09-09 23:38:53'),
(4, 2, 'asset/resource/opensourcephotography-alles2-klein.png', '', '', 1, 0, '', '2013-09-09 23:43:14'),
(5, 2, 'asset/resource/shelldriver.jpg', '', '', 1, 0, '', '2013-09-09 23:44:35'),
(6, 2, 'asset/resource/Screenshot-1.png', '', '', 1, 0, '', '2013-09-09 23:46:02'),
(7, 2, 'asset/resource/156122_10150646796686496_1034292401_n2.jpg', '', '', 1, 0, '', '2013-09-09 23:47:40'),
(8, 2, 'asset/resource/dinamik7.jpg', '', '', 1, 0, '', '2013-09-09 23:48:03'),
(9, 2, 'asset/resource/208097_123151671169982_275879533_n.png', '', '', 1, 0, '', '2013-09-09 23:48:26'),
(10, 2, 'asset/resource/keluarga_besar.jpg', '', '', 1, 0, '', '2013-09-09 23:48:47');

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
