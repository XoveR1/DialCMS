-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2012 at 09:24 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dial_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `dial_role`
--

CREATE TABLE IF NOT EXISTS `dial_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dial_role`
--

INSERT INTO `dial_role` (`id`, `name`) VALUES
(3, 'role_administrator'),
(1, 'role_guest'),
(2, 'role_user');

-- --------------------------------------------------------

--
-- Table structure for table `dial_user`
--

CREATE TABLE IF NOT EXISTS `dial_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dial_user`
--

INSERT INTO `dial_user` (`id`, `name`, `password`, `email`, `role_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 3),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@user.com', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dial_user`
--
ALTER TABLE `dial_user`
  ADD CONSTRAINT `dial_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `dial_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
