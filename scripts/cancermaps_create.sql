-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2010 at 03:20 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cancermaps`
--
CREATE DATABASE `cancermaps` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cancermaps`;

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE IF NOT EXISTS `Address` (
  `addressID` int(11) NOT NULL AUTO_INCREMENT,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `street1` varchar(255) NOT NULL,
  `street2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` text NOT NULL,
  PRIMARY KEY  (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--


-- --------------------------------------------------------

--
-- Table structure for table `Diagnosis`
--

CREATE TABLE IF NOT EXISTS `Diagnosis` (
  `diagnosisID` int(11) NOT NULL AUTO_INCREMENT,
  `diagnosisDate` date NOT NULL default '0000-00-00',
  `personID` int(11) NOT NULL,
  `illnessTypeID` int(11) NOT NULL,
  PRIMARY KEY  (`diagnosisID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Diagnosis`
--


-- --------------------------------------------------------

--
-- Table structure for table `IllnessType`
--

CREATE TABLE IF NOT EXISTS `IllnessType` (
  `illnessTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `illnessType` varchar(50) NOT NULL,
  PRIMARY KEY  (`illnessTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IllnessType`
--


-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE IF NOT EXISTS `Person` (
  `personID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `username` varchar(45) default NULL,
  `email` varchar(255) default NULL,
  `addressID` int(255) default NULL,
  PRIMARY KEY  (`personID`),
  KEY `addressID` (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Person`
--


--
-- Constraints for dumped tables
--


--
-- Constraints for table `Person`
--
ALTER TABLE `Person`
  ADD CONSTRAINT `Person_ibfk_1` FOREIGN KEY (`addressID`) REFERENCES `Address` (`addressID`);
