-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2014 at 12:43 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erep`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(33) NOT NULL,
  `group_password` varchar(33) NOT NULL,
  `member_points` varchar(11) NOT NULL DEFAULT '0',
  `VIP` int(11) NOT NULL DEFAULT '0',
  `owner_id` varchar(33) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `group_password`, `member_points`, `VIP`, `owner_id`) VALUES
(1, 'testgroup', 'ab898bd3f17a66654ff3ed4458e81a2b', '0', 0, '16'),
(2, 'testgroup2', 'ab898bd3f17a66654ff3ed4458e81a2b', '0', 0, '16');

-- --------------------------------------------------------

--
-- Table structure for table `profile_comments`
--

CREATE TABLE IF NOT EXISTS `profile_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(255) NOT NULL,
  `receiver_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `profile_comments`
--

INSERT INTO `profile_comments` (`id`, `sender_id`, `receiver_id`, `title`, `content`) VALUES
(1, '0', '0', 'test', 'this is my first test comment'),
(2, '0', '0', 'second comment', 'hi im Hyki\r\n'),
(3, 'lohs', 'Solivar', 'yrdy', 'yfdy'),
(4, 'lohs', 'Solivar', 'hi', 'him '),
(5, 'lohs', 'lohatrons', 'tess', 'ts'),
(6, 'lohs', 'cirvis', 'baylife', 'bbbbbb'),
(7, 'lohs', 'cirvis', 'gg', 'gg'),
(8, 'lohs', 'cirvis', 'gg', 'gg'),
(9, 'lohs', 'cirvis', 'gg', 'gg'),
(10, 'lohs', 'cirvis', 'gg', 'gg'),
(11, 'lohs', 'cirvis', 'gdsfgdf', 'gdfgdf'),
(12, 'lohs', 'lohs', 'hi', 'hihihi\r\n'),
(13, 'lohs', 'lohatrons', 'hi', 'hi there\r\n'),
(14, 'lohs', 'lohs', 'hi', 'my own comment\r\n'),
(15, 'lohs', 'lohs', 'hi', 'hiihihi\r\n'),
(16, 'lohs', 'lohs', ':D', 'yup'),
(17, 'Solivar', 'Solivar', 'hi solivar', 'hi hihihihihih'),
(18, 'lohs', 'lohs', 'i comment', 'to myself'),
(19, 'lohs', 'lohs', 'hi', 'hhihihi'),
(20, 'lohs', 'lohs', 'testio', 'MY TEST'),
(21, 'lohs', 'lohs', 'trttdt', 'ttsts'),
(22, 'kuilis', 'kuilis', 'kuliga sajuta', 'vaine?');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `VIP` int(11) NOT NULL DEFAULT '0',
  `email` varchar(33) NOT NULL,
  `group1` varchar(33) NOT NULL,
  `group2` varchar(33) NOT NULL,
  `group3` varchar(33) NOT NULL,
  `group4` varchar(33) NOT NULL,
  `group5` varchar(33) NOT NULL,
  `group6` varchar(33) NOT NULL,
  `group7` varchar(33) NOT NULL,
  `group8` varchar(33) NOT NULL,
  `group9` varchar(33) NOT NULL,
  `group10` varchar(33) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `VIP`, `email`, `group1`, `group2`, `group3`, `group4`, `group5`, `group6`, `group7`, `group8`, `group9`, `group10`) VALUES
(16, 'Solivar', 'e13df8d3a0bc30345100c43c2b69c53a', 0, 'cool@cool-cool.cool', '6', '', '', '', '', '', '', '', '', ''),
(17, 'lohs', 'e13df8d3a0bc30345100c43c2b69c53a', 0, 'lohs', '', '', '', '', '', '', '', '', '', ''),
(18, 'lohatrons', 'e13df8d3a0bc30345100c43c2b69c53a', 0, 'rofly@in.lv', '', '', '', '', '', '', '', '', '', ''),
(19, 'cirvis', 'e13df8d3a0bc30345100c43c2b69c53a', 0, 'cirvis@lauksamieniciba.lv', '', '', '', '', '', '', '', '', '', ''),
(20, 'kuilis', 'e13df8d3a0bc30345100c43c2b69c53a', 0, 'vepris@kulis.lol', '', '', '', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
