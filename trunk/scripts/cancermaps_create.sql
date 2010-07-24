-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2010 at 05:53 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cancermaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `addressID` int(11) NOT NULL AUTO_INCREMENT,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `street1` varchar(255) NOT NULL,
  `street2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` text NOT NULL,
  PRIMARY KEY (`addressID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `address`
--


-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diagnosisID` int(11) NOT NULL AUTO_INCREMENT,
  `diagnosisDate` date NOT NULL DEFAULT '0000-00-00',
  `personID` int(11) NOT NULL,
  `illnessTypeID` int(11) NOT NULL,
  PRIMARY KEY (`diagnosisID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `diagnosis`
--


-- --------------------------------------------------------

--
-- Table structure for table `illnesstype`
--

CREATE TABLE IF NOT EXISTS `illnesstype` (
  `illnessTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `illnessType` varchar(50) NOT NULL,
  PRIMARY KEY (`illnessTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `illnesstype`
--


-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `personID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `addressID` int(11) DEFAULT NULL,
  PRIMARY KEY (`personID`),
  KEY `addressID` (`addressID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `person`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `Person_ibfk_1` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`);
