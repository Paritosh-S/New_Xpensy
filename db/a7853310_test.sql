
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2015 at 05:56 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a7853310_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` VALUES(1, 'Navjyot', 'hi');
INSERT INTO `chat` VALUES(2, 'raj', 'dfd');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `company` varchar(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `job_pro` varchar(10) NOT NULL,
  `email` varchar(15) NOT NULL,
  `contact` int(12) NOT NULL,
  `mgs` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` VALUES(1, 'raj', 'com', 'uk ', 'manger', '@gmail,com', 999999999, 'r 1');
INSERT INTO `demo` VALUES(2, 'john', 'filmy-con', 'africa', 'manger', 'john@fimly-con.', 2147483647, 'a');
INSERT INTO `demo` VALUES(2, 'saif', 'uniliver', 'utharakhan', 'trainer', 'abc@gmail.com', 2147483647, 'a');
INSERT INTO `demo` VALUES(3, 'aajay', 'teamrocks', 'khonnre', 'joint mana', 'qen@yhooo.com', 2147483647, '');
INSERT INTO `demo` VALUES(4, 'aabhay', 'data', 'nyor', 'woker', 'sod@gmail.com', 999999, '');
INSERT INTO `demo` VALUES(4, 'aabhay', 'data', 'nyor', 'woker', 'sod@gmail.com', 999999, '');
INSERT INTO `demo` VALUES(5, 'john', 'sellini', 'uk', 'manger', 'oidansdi@india.', 2147483647, '');
INSERT INTO `demo` VALUES(9, 'john', 'aman', 'uk', 'worker', 'aaac1850i@india', 12131855, '');
INSERT INTO `demo` VALUES(9, 'saif', 'proteam', 'bk', 'manager', 'ggae501@india.o', 252455, '');
INSERT INTO `demo` VALUES(11, 'ali', 'team', 'africa', 'head', 'dafdsf@india.oc', 200005, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` VALUES('Navjyot', 'nav');
INSERT INTO `login` VALUES('Omkar', 'om');
INSERT INTO `login` VALUES('nav', 'bb');
INSERT INTO `login` VALUES('nn', 'nn');
INSERT INTO `login` VALUES('bbbb', 'bb');
INSERT INTO `login` VALUES('raj', 'raj');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserexpenses`
--

CREATE TABLE `tbluserexpenses` (
  `UserName` int(5) NOT NULL,
  `ExCategory` varchar(10) NOT NULL,
  `ClaimDate` varchar(10) NOT NULL,
  `ClaimFrom` varchar(10) NOT NULL,
  `ClaimTo` varchar(10) NOT NULL,
  `ClaimAmt` varchar(7) NOT NULL,
  `ClaimClass` varchar(7) DEFAULT NULL,
  `ClaimReceipt` varchar(10) DEFAULT NULL,
  `ClaimRowid` int(7) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `ClaimRowid` (`ClaimRowid`),
  UNIQUE KEY `ClaimRowid_2` (`ClaimRowid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbluserexpenses`
--

INSERT INTO `tbluserexpenses` VALUES(0, 'train', '2015-01-13', 'dddD', '', 'in rs', 'Class1', NULL, 6);
INSERT INTO `tbluserexpenses` VALUES(0, 'train', '2015-01-13', 'dddD', '', 'in rs', 'Class1', NULL, 4);
INSERT INTO `tbluserexpenses` VALUES(0, 'Bus', '', 'F', '', 'in rs', 'Class1', NULL, 7);
INSERT INTO `tbluserexpenses` VALUES(1, 'Local', '02/03/2015', '1111111', '22222', '112222', 'Bus', '4617', 9);
INSERT INTO `tbluserexpenses` VALUES(1, 'Local', '02/03/2015', '1111111', '22222', '112222', 'Bus', '0', 10);
