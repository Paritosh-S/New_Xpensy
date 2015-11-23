-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2015 at 01:45 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE IF NOT EXISTS `demo` (
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

INSERT INTO `demo` (`id`, `name`, `company`, `branch`, `job_pro`, `email`, `contact`, `mgs`) VALUES
(1, 'raj', 'com', 'uk ', 'manger', '@gmail,com', 999999999, 'id : 1 name: raj'),
(2, 'taj', 'com', 'bk', 'mm', 'salksdfjkl#ga;l', 0, 'id :2 name: taj'),
(6, 'habby', 'xamm', 'bhagdad', 'chor', 'www..33#4.com', 945029, 'id : 6 name: habby'),
(5, 'taj', 'cm', 'uk', 'mm', 'akldsjfak', 0, 'id : 5 name: taj'),
(3, 'diplai', 'ystmnd', 'khdvli', 'boss', 'BOss@my.com', 99944444, 'id : 3 name: dipali'),
(4, 'mani', 'tech', 'domblvli', 'hod', 'myhead@gmail.co', 2147483647, 'id : 4 name: tech'),
(7, 'josh', 'wamm', 'usa', 'SR,', 'LAKDJS@MO.COM', 0, 'id :7 name: josh');

-- --------------------------------------------------------

--
-- Table structure for table `grp`
--

CREATE TABLE IF NOT EXISTS `grp` (
  `userid` int(3) NOT NULL,
  `gr_name` varchar(11) NOT NULL,
  `member` varchar(11) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grp`
--


-- --------------------------------------------------------

--
-- Table structure for table `msg_box`
--

CREATE TABLE IF NOT EXISTS `msg_box` (
  `id` int(3) NOT NULL,
  `box` varchar(7) NOT NULL,
  `sender_name` varchar(12) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg_box`
--

INSERT INTO `msg_box` (`id`, `box`, `sender_name`, `msg`, `date`) VALUES
(2, 'outbox', 'raj maitry', 'out box mssssssssssssssssssssssss', '0000-00-00 00:00:00'),
(1, 'inbox', 'navjot', 'this is 2nd test mgs', '2015-02-24 15:52:25'),
(2, 'outbox', 'raj maitry', 'out box mssssssssssssssssssssssss', '0000-00-00 00:00:00'),
(1, 'inbox', 'raj maitry', 'this is test mgs', '2015-02-24 15:51:06'),
(2, 'outbox', 'raj maitry', 'out box mssssssssssssssssssssssss', '0000-00-00 00:00:00'),
(1, 'outbox', '6', 'this is tex ignadsfjaklsdjf;alksd', '0000-00-00 00:00:00'),
(1, 'outbox', '1', '', '0000-00-00 00:00:00'),
(1, 'outbox', '1', 'hi..... thi si test mags', '0000-00-00 00:00:00'),
(1, 'outbox', '5', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '0000-00-00 00:00:00'),
(1, 'outbox', '5', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserdetails`
--

CREATE TABLE IF NOT EXISTS `tbluserdetails` (
  `UserID` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `UserPassword` char(32) NOT NULL,
  `Gender` char(1) DEFAULT NULL,
  `AcType` varchar(1) NOT NULL,
  `DOB` date DEFAULT NULL,
  `MobileNo` varchar(10) DEFAULT NULL,
  `EmailID2` varchar(40) DEFAULT NULL,
  `AcDate` datetime NOT NULL,
  PRIMARY KEY (`UserID`,`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbluserexpenses`
--

CREATE TABLE IF NOT EXISTS `tbluserexpenses` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbluserexpenses`
--

INSERT INTO `tbluserexpenses` (`UserName`, `ExCategory`, `ClaimDate`, `ClaimFrom`, `ClaimTo`, `ClaimAmt`, `ClaimClass`, `ClaimReceipt`, `ClaimRowid`) VALUES
(1, 'Local', '01/05/2015', '1111111', '22aa', '11212', 'Bus', '104292', 8),
(1, 'Local', '01/05/2015', '1111111', '22', '11212', 'Bus', '104292', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserexpenses1`
--

CREATE TABLE IF NOT EXISTS `tbluserexpenses1` (
  `UserName` varchar(45) NOT NULL,
  `ExCategory` varchar(15) NOT NULL,
  `ClaimDate` varchar(10) NOT NULL,
  `ClaimFrom` varchar(10) NOT NULL,
  `ClaimTo` varchar(10) NOT NULL,
  `ClaimAmt` int(11) NOT NULL,
  `ClaimDesc` varchar(100) DEFAULT NULL,
  `ClaimReceipt` varchar(20) DEFAULT NULL,
  `ClaimRowid` int(7) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `ClaimRowid_UNIQUE` (`ClaimRowid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbluserexpenses1`
--

INSERT INTO `tbluserexpenses1` (`UserName`, `ExCategory`, `ClaimDate`, `ClaimFrom`, `ClaimTo`, `ClaimAmt`, `ClaimDesc`, `ClaimReceipt`, `ClaimRowid`) VALUES
('1111', '1', '1', '1', '1', 1, '1', 'Untitled.jpg', 7),
('1111', '1', '1', '1', '1', 1, '11', 'Untitled1.jpg', 16),
('', '', '', '', '', 0, NULL, 'Untitled1.jpg', 11),
('', '', '', '', '', 0, NULL, 'Untitled1.jpg', 15),
('', '', '', '', '', 0, NULL, 'untitled4.JPG', 17),
('', '', '', '', '', 0, NULL, 'new.JPG', 18),
('', '', '', '', '', 0, NULL, 'new3.JPG', 20),
('', '', '', '', '', 0, NULL, 'untitled2.JPG', 21),
('', '', '', '', '', 0, NULL, 'untitled3.JPG', 22);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
