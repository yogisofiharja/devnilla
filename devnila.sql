-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2013 at 06:46 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_resource`
--

CREATE TABLE IF NOT EXISTS `page_resource` (
  `id_page_resource` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_post` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_post`),
  UNIQUE KEY `id_post` (`id_post`),
  UNIQUE KEY `id_post_2` (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id_post_category` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `id_resource` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_location` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  PRIMARY KEY (`id_resource`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `full_name`, `email`, `user_type_id`, `date_modified`) VALUES
(1, 'yogi', '938e14c074c45c62eb15cc05a6f36d79', 'Yogi Sofi Harja', 'hardja.ogie@gmail.com', 1, '2013-03-08 20:00:00'),
(2, 'admin', '84fc02daf5252224f212e6383c243407', 'Admin Nurdin Nasution', 'admin@devnila.com', 1, '2013-03-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id_user_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id_user_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id_user_type`, `name`, `description`, `date_modified`) VALUES
(1, 'admin', 'admin', '2013-03-08 20:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
