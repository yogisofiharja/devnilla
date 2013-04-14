-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2013 at 10:50 PM
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
(2, 'Open Source', 'bejo benget mens online<br>', '0000-00-00 00:00:00'),
(3, 'Oracle Technology', 'heheheheheheh', '0000-00-00 00:00:00'),
(4, 'Android Apps', 'Android applications ....', '0000-00-00 00:00:00'),
(5, 'Unity Web Game', 'description .....', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `user_id`, `title`, `note`, `status`, `date_post`, `date_updated`) VALUES
(3, 2, 'ini adalah postingan 3', 'test', 1, '2013-04-14 11:58:50', '2013-04-14 11:58:53'),
(4, 1, 'Belajar open sources', 'test test test ...', 1, '2013-04-14 00:00:00', '2013-04-14 14:58:42'),
(5, 1, 'Game AndEngine', 'test test test ...', 0, '2013-04-14 14:54:11', '2013-04-14 14:54:11'),
(6, 1, 'Game berbasis Cocos2D', 'test test test ...', 1, '2013-04-14 15:13:17', '2013-04-14 15:13:17'),
(7, 1, 'Belajar Construct 2', 'hehehhehe', 1, '2013-04-14 15:18:03', '2013-04-14 15:18:03'),
(15, 1, 'Belajar Linux Ubuntu', 'belajar ubuntu precies pangolin', 1, '2013-04-14 20:48:39', '2013-04-14 20:48:39'),
(16, 1, 'Ngulik AndEngine and Unity', 'ajhsdjhajshdjahsdjkahsdjahsjd', 1, '2013-04-14 20:49:28', '2013-04-14 20:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id_post_category` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id_post_category`, `post_id`, `category_id`) VALUES
(14, 16, 5),
(13, 16, 4),
(12, 16, 2),
(11, 15, 2);

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
(1, 'ridwanbejo', '8e3fb21d8f166439477bf4af4ae19a19', 'ridwanbejo', 'ridwanbejo@gmail.com'),
(2, 'ridwanfs', '418232d74ad342473a0d8f1eaa68c3f8', 'ridwanfs', 'ridwanfs@gmail.com');
