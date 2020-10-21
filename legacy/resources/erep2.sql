-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2014 at 05:25 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erep2`
--

-- --------------------------------------------------------

--
-- Table structure for table `erep_all_groups`
--

CREATE TABLE IF NOT EXISTS `erep_all_groups` (
  `id` int(11) NOT NULL,
  `group_password` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_creator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `erep_user`
--

CREATE TABLE IF NOT EXISTS `erep_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` int(255) NOT NULL,
  `user_points` int(255) NOT NULL,
  `user_groups` int(255) NOT NULL,
  `user_main_group` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `erep_user_groups`
--

CREATE TABLE IF NOT EXISTS `erep_user_groups` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `group1` int(100) NOT NULL,
  `group2` int(100) NOT NULL,
  `group3` int(100) NOT NULL,
  `group4` int(100) NOT NULL,
  `group5` int(100) NOT NULL,
  `group6` int(100) NOT NULL,
  `group7` int(100) NOT NULL,
  `group8` int(100) NOT NULL,
  `group9` int(100) NOT NULL,
  `group10` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
