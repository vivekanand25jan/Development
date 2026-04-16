-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2012 at 05:24 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `provab`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_deposit`
--

CREATE TABLE IF NOT EXISTS `agent_deposit` (
  `deposit_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) DEFAULT NULL,
  `deposit_type` varchar(256) DEFAULT NULL,
  `amount_credit` double(11,2) DEFAULT NULL,
  `deposited_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bank` varchar(256) NOT NULL,
  `branch` varchar(256) NOT NULL,
  `city` varchar(128) NOT NULL,
  `transaction_id` varchar(128) NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_number` varchar(128) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`deposit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `agent_deposit`
--

INSERT INTO `agent_deposit` (`deposit_id`, `agent_id`, `deposit_type`, `amount_credit`, `deposited_date`, `bank`, `branch`, `city`, `transaction_id`, `cheque_date`, `cheque_number`, `remarks`) VALUES
(1, 1, 'cash', 12000.00, '2012-05-26 16:09:42', '', '', '', '', '0000-00-00', '', ''),
(2, 1, 'cash', 2000.00, '2012-05-26 16:39:04', '', '', '', '', '0000-00-00', '', ''),
(9, 1, 'cash', 1000.00, '2012-05-25 00:00:00', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `call_center`
--

CREATE TABLE IF NOT EXISTS `call_center` (
  `call_center_id` int(11) NOT NULL AUTO_INCREMENT,
  `call_center` varchar(128) NOT NULL,
  PRIMARY KEY (`call_center_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `call_center`
--

INSERT INTO `call_center` (`call_center_id`, `call_center`) VALUES
(1, 'Mybooking1'),
(2, 'Mybooking2');

-- --------------------------------------------------------

--
-- Table structure for table `currency_converter`
--

CREATE TABLE IF NOT EXISTS `currency_converter` (
  `cur_id` int(12) NOT NULL AUTO_INCREMENT,
  `country` varchar(12) NOT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `currency_converter`
--

INSERT INTO `currency_converter` (`cur_id`, `country`, `value`) VALUES
(1, 'GBP', 0.63484002),
(2, 'THB', 31.497055),
(3, 'AUD', 1.02291327),
(4, 'USD', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
