-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 08:15 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imots`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `seats` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `travel_id`, `type`, `user`, `seats`, `price`, `date`, `status`) VALUES
(1, 1, 4, '', 'Joel', 3, '2500', '2024-04-17', 'pending'),
(2, 1, 4, '', 'mike', 4, '2500', '2024-04-17', 'pending'),
(3, 1, 4, '', 'mike', 5, '2500', '2024-04-20', 'pending'),
(4, 1, 4, 'Premium', 'anju', 3, '2500', '2024-04-23', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(225) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `cardname` varchar(200) NOT NULL,
  `cardnumber` varchar(225) NOT NULL,
  `card_type` varchar(225) NOT NULL,
  `expiry` varchar(225) NOT NULL,
  `cvv` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `uid`, `booking_id`, `amount`, `cardname`, `cardnumber`, `card_type`, `expiry`, `cvv`, `date`) VALUES
(1, '3', 1, '200', 'roshan', '12345678987654', 'debit', '2026', '123', '2024-04-10'),
(2, '3', 1, '200', 'roshan', '12345678909876', 'debit', '2027', '123', '2024-04-11'),
(3, '1', 4, '7500', 'roshan', '2345654321', 'credit', '2024-02', '123', '2024-04-23'),
(4, '1', 4, '7500', 'roshan', '23456765432', 'credit', '2024-08', '123', '2024-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE IF NOT EXISTS `travels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_type` varchar(100) NOT NULL,
  `travel_name` varchar(100) NOT NULL,
  `start_location` varchar(100) NOT NULL,
  `end_location` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date NOT NULL,
  `price` varchar(100) NOT NULL,
  `class_1` varchar(50) NOT NULL,
  `class_2` varchar(50) NOT NULL,
  `class_3` varchar(50) NOT NULL,
  `class_1seat` varchar(50) NOT NULL,
  `class_2seat` varchar(50) NOT NULL,
  `class_3seat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `travel_type`, `travel_name`, `start_location`, `end_location`, `start_time`, `end_time`, `date`, `price`, `class_1`, `class_2`, `class_3`, `class_1seat`, `class_2seat`, `class_3seat`) VALUES
(1, '1', 'Sony', 'kochi', 'bangalore', '09:00:00', '12:00:00', '2024-04-02', '200', '', '', '', '', '', ''),
(2, '2', 'Mubai csi', 'kochi', 'bangalore', '09:00:00', '11:01:00', '2024-04-02', '150', '2A', '3A', 'SL', '20', '15', '40'),
(3, '3', 'Indigo', 'kochi', 'bangalore', '10:01:00', '11:02:00', '2024-04-02', '2500', 'Premium', 'Business', 'Economy', '10', '15', '20'),
(4, '3', 'Indigo', 'kochi', 'trivandrum', '09:00:00', '12:00:00', '2024-04-17', '2500', 'Premium', 'Business', 'Economy', '10', '15', '20'),
(5, '3', 'spicejet', 'kochi', 'chennai', '22:04:00', '02:04:00', '2024-04-17', '5000', 'Premium', 'Business', 'Economy', '15', '20', '30'),
(6, '3', 'spicejet', 'kochi', 'trivandrum', '11:05:00', '13:15:00', '2024-04-17', '3500', 'Premium', 'Business', 'Economy', '15', '20', '30'),
(7, '1', 'Alpha', 'kochi', 'trivandrum', '05:00:00', '14:15:00', '2024-04-17', '500', '', '', '', '', '', ''),
(8, '1', 'kerala travels', 'kochi', 'trivandrum', '22:07:00', '02:15:00', '2024-04-17', '750', '', '', '', '', '', ''),
(9, '2', 'chennai mail', 'kochi', 'trivandrum', '21:08:00', '00:10:00', '2024-04-17', '250', '2A', '3A', 'SL', '20', '15', '40'),
(10, '2', 'Express', 'kochi', 'trivandrum', '23:15:00', '14:11:00', '2024-04-17', '1000', '2A', '3A', 'SL', '20', '15', '40');

-- --------------------------------------------------------

--
-- Table structure for table `travel_mode`
--

CREATE TABLE IF NOT EXISTS `travel_mode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `travel_mode`
--

INSERT INTO `travel_mode` (`id`, `name`) VALUES
(1, 'Bus'),
(2, 'Train'),
(3, 'Plane');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `address`) VALUES
(1, 'mike', 'mike@gmail.com', '7355612288', '123', 'kochi'),
(2, 'Roshan', 'roshanjose23@gmail.com', '7355612288', '123', 'kochi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
