-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2011 at 08:03 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmsulake`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL,
  `story` int(10) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user`, `story`, `message`, `date`) VALUES
(1, 1, 1, 'This is a message!', '9-17-11');

-- --------------------------------------------------------

--
-- Table structure for table `cron`
--

CREATE TABLE IF NOT EXISTS `cron` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` int(11) NOT NULL DEFAULT '5',
  `enabled` enum('no','yes') NOT NULL DEFAULT 'yes',
  `file` varchar(50) NOT NULL,
  `last` int(11) NOT NULL,
  `interval` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cron`
--

INSERT INTO `cron` (`id`, `priority`, `enabled`, `file`, `last`, `interval`) VALUES
(1, 5, 'yes', 'credits.php', 0, 10800);

-- --------------------------------------------------------

--
-- Table structure for table `head_navi`
--

CREATE TABLE IF NOT EXISTS `head_navi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(14) NOT NULL,
  `rank` int(1) NOT NULL,
  `url` varchar(58) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `head_navi`
--

INSERT INTO `head_navi` (`id`, `name`, `rank`, `url`) VALUES
(1, 'Home', 1, 'index.php'),
(2, 'Community', 1, 'community.php'),
(3, 'House', 7, 'house');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `snippet` text NOT NULL,
  `story` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `author` varchar(37) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `snippet`, `story`, `timestamp`, `date`, `author`) VALUES
(1, 'This is a title', 'This is the news'' snippet!', 'This is the news'' body!', 1, '9-17-11', 'Makarov'),
(2, '2nd Title', '2nd Snippet', '2nd Story', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE IF NOT EXISTS `ranks` (
  `rank` int(10) NOT NULL,
  `name` varchar(16) NOT NULL,
  `badge` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`rank`, `name`, `badge`) VALUES
(7, 'Administrator', 'ADM.gif'),
(6, 'Moderator', 'They keep '),
(5, 'Support Staff', 'They answe');

-- --------------------------------------------------------

--
-- Table structure for table `sub_navi`
--

CREATE TABLE IF NOT EXISTS `sub_navi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(14) NOT NULL,
  `parent` int(10) NOT NULL,
  `rank` int(10) NOT NULL,
  `url` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sub_navi`
--

INSERT INTO `sub_navi` (`id`, `name`, `parent`, `rank`, `url`) VALUES
(1, 'Staff', 2, 1, 'staff.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `real_name` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL DEFAULT 'defaultuser@meth0d.org',
  `auth_ticket` text NOT NULL,
  `rank` int(11) unsigned NOT NULL DEFAULT '1',
  `credits` int(11) NOT NULL DEFAULT '0',
  `vip_points` int(11) NOT NULL DEFAULT '0',
  `activity_points` int(11) NOT NULL DEFAULT '0',
  `activity_points_lastupdate` double NOT NULL DEFAULT '0',
  `look` varchar(100) NOT NULL DEFAULT 'hr-115-42.hd-190-1.ch-215-62.lg-285-91.sh-290-62',
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `motto` varchar(50) NOT NULL,
  `account_created` varchar(50) NOT NULL,
  `last_online` varchar(50) NOT NULL,
  `online` enum('0','1') NOT NULL DEFAULT '0',
  `ip_last` varchar(120) NOT NULL,
  `ip_reg` varchar(120) NOT NULL,
  `home_room` int(10) unsigned NOT NULL DEFAULT '0',
  `respect` int(11) NOT NULL DEFAULT '0',
  `daily_respect_points` int(11) NOT NULL DEFAULT '3',
  `daily_pet_respect_points` int(11) NOT NULL DEFAULT '3',
  `newbie_status` int(11) NOT NULL DEFAULT '0',
  `is_muted` enum('0','1') NOT NULL DEFAULT '0',
  `mutant_penalty` enum('0','1','2') NOT NULL DEFAULT '0',
  `mutant_penalty_expire` int(11) NOT NULL DEFAULT '0',
  `block_newfriends` enum('0','1') NOT NULL DEFAULT '0',
  `BattleBanzai` varchar(1) NOT NULL DEFAULT 'r',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `real_name`, `password`, `mail`, `auth_ticket`, `rank`, `credits`, `vip_points`, `activity_points`, `activity_points_lastupdate`, `look`, `gender`, `motto`, `account_created`, `last_online`, `online`, `ip_last`, `ip_reg`, `home_room`, `respect`, `daily_respect_points`, `daily_pet_respect_points`, `newbie_status`, `is_muted`, `mutant_penalty`, `mutant_penalty_expire`, `block_newfriends`, `BattleBanzai`) VALUES
(1, 'Makarov', '', '1a9914b39514feea6dd2af21ac9bfaee75f09ad8', 'a@a.com', 'Sulake-Makarov', 7, 0, 0, 0, 0, 'ch-3001-100-62.lg-3057-82.ha-1023-110.hr-3163-61.ca-3175-62.sh-295-110.hd-3092-3.ea-3168-110', 'M', 'This is a Motto', '19-09-11', '', '0', '', '127.0.0.1', 0, 0, 3, 3, 0, '0', '0', 0, '0', 'r');
