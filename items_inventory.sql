-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2015 at 01:39 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `items_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `shortname` varchar(25) NOT NULL,
  `mailaddress` varchar(50) NOT NULL,
  `billaddress` varchar(50) NOT NULL,
  `memo` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `shortname`, `mailaddress`, `billaddress`, `memo`, `status`) VALUES
(1, 'name', 'shortname', 'mailaddress', 'billaddress', 'memo', 1),
(2, 'Michael', 'JM', 'Kalentong', 'Kalentong', 'Memo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` int(2) NOT NULL,
  `tax_type` int(2) NOT NULL,
  `item_type` int(2) NOT NULL,
  `unit_measure` int(1) NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `item_status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_code`, `name`, `description`, `category`, `tax_type`, `item_type`, `unit_measure`, `dimension`, `image`, `item_status`) VALUES
(4, '4342', 'Wallet', 'for money', 1, 1, 1, 1, 'Support', '', 0),
(5, '1222', 'Charger', 'For phones', 1, 1, 1, 1, 'Support', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_status`
--

CREATE TABLE IF NOT EXISTS `item_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `item_status`
--


-- --------------------------------------------------------

--
-- Table structure for table `list_order_items`
--

CREATE TABLE IF NOT EXISTS `list_order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `pbt` int(11) NOT NULL,
  `memo` varchar(100) NOT NULL,
  `p_o_reference` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `list_order_items`
--

INSERT INTO `list_order_items` (`id`, `item_id`, `quantity`, `delivery_date`, `pbt`, `memo`, `p_o_reference`) VALUES
(21, '0', 30, '2015-10-29', 50, 'hahahha', 80),
(22, '0', 22, '2015-10-09', 500, 'g', 80),
(23, '0', 500, '2015-10-19', 400, 'Am I right chuwakay', 81),
(24, 'Charger', 56, '2015-10-08', 45, 'Hahaha', 82),
(25, 'Wallet', 0, '0000-00-00', 0, '', 83),
(26, 'Wallet', 0, '0000-00-00', 0, '', 84),
(27, 'Wallet', 0, '0000-00-00', 0, '', 84),
(28, 'Wallet', 0, '0000-00-00', 0, '', 84);

-- --------------------------------------------------------

--
-- Table structure for table `opt_category`
--

CREATE TABLE IF NOT EXISTS `opt_category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `item_tax_type` varchar(30) NOT NULL,
  `unit_of_measure` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `opt_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `opt_currency`
--

CREATE TABLE IF NOT EXISTS `opt_currency` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `short_name` varchar(3) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `opt_currency`
--

INSERT INTO `opt_currency` (`id`, `name`, `short_name`, `rate`) VALUES
(1, 'US Dollars', 'USD', 46),
(2, 'Arab', 'AED', 13),
(3, 'Peso', 'PHP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opt_inventory_location`
--

CREATE TABLE IF NOT EXISTS `opt_inventory_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `phone2` int(20) NOT NULL,
  `fax` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `opt_inventory_location`
--


-- --------------------------------------------------------

--
-- Table structure for table `opt_item_status`
--

CREATE TABLE IF NOT EXISTS `opt_item_status` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opt_item_status`
--


-- --------------------------------------------------------

--
-- Table structure for table `opt_item_type`
--

CREATE TABLE IF NOT EXISTS `opt_item_type` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `opt_item_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `opt_order_status`
--

CREATE TABLE IF NOT EXISTS `opt_order_status` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opt_order_status`
--


-- --------------------------------------------------------

--
-- Table structure for table `opt_status`
--

CREATE TABLE IF NOT EXISTS `opt_status` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `opt_status`
--

INSERT INTO `opt_status` (`id`, `name`) VALUES
(1, 'Enabled'),
(2, 'Disabled');

-- --------------------------------------------------------

--
-- Table structure for table `opt_tax_type`
--

CREATE TABLE IF NOT EXISTS `opt_tax_type` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `opt_tax_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `opt_unit_of_measure`
--

CREATE TABLE IF NOT EXISTS `opt_unit_of_measure` (
  `id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `dp` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opt_unit_of_measure`
--

INSERT INTO `opt_unit_of_measure` (`id`, `name`, `description`, `dp`) VALUES
(0, 'kg', 'lala', 9);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_entry`
--

CREATE TABLE IF NOT EXISTS `purchase_order_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `currency` varchar(100) NOT NULL,
  `receive_into` int(2) NOT NULL,
  `deliver_to` varchar(100) NOT NULL,
  `order_status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `purchase_order_entry`
--

INSERT INTO `purchase_order_entry` (`id`, `supplier`, `order_date`, `currency`, `receive_into`, `deliver_to`, `order_status`) VALUES
(80, '1', '2015-10-28', '3', 1, 'Marc Will', 1),
(81, '3', '2015-10-21', '1', 2, 'Pader Abe', 1),
(82, 'Apple', '2015-10-28', '0', 1, 'Michael Joslyn', 1),
(83, 'Samsung', '2015-10-20', '0', 3, '12', 1),
(84, 'asd', '0000-00-00', 'AED', 3, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_pricing`
--

CREATE TABLE IF NOT EXISTS `purchase_pricing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `supplier_unit_measure` varchar(10) NOT NULL,
  `conversion_factor` int(10) NOT NULL,
  `supplier_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `price` (`price`),
  UNIQUE KEY `price_2` (`price`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchase_pricing`
--

INSERT INTO `purchase_pricing` (`id`, `item_code`, `supplier`, `price`, `supplier_unit_measure`, `conversion_factor`, `supplier_code`) VALUES
(2, 'Wallet', 'Samsung', 100, 'kg', 46, '60'),
(3, 'Wallet', 'Samsung', 45, 'kg', 10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `sales_pricing`
--

CREATE TABLE IF NOT EXISTS `sales_pricing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) NOT NULL,
  `currency` int(20) NOT NULL,
  `sale_type` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sales_pricing`
--

INSERT INTO `sales_pricing` (`id`, `item_code`, `currency`, `sale_type`, `price`) VALUES
(1, 'Wallet', 0, 'Wholesale', 23);

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE IF NOT EXISTS `sample` (
  `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `haha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `haha`) VALUES
(01, 'haha');

-- --------------------------------------------------------

--
-- Table structure for table `standard_cost`
--

CREATE TABLE IF NOT EXISTS `standard_cost` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` char(50) NOT NULL,
  `standard_cost_per_unit` int(10) NOT NULL,
  `labor_cost_per_unit` int(10) NOT NULL,
  `overhead_cost_per_unit` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `standard_cost`
--

INSERT INTO `standard_cost` (`id`, `item_code`, `standard_cost_per_unit`, `labor_cost_per_unit`, `overhead_cost_per_unit`) VALUES
(9, 'Wallet', 2147483647, 1234, 12312),
(10, 'Charger', 222, 222, 222);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `website` varchar(30) NOT NULL,
  `currency` int(2) NOT NULL,
  `bank` int(2) NOT NULL,
  `credit_limit` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `memo` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `phone` int(15) NOT NULL,
  `fax` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `short_name`, `website`, `currency`, `bank`, `credit_limit`, `email`, `address`, `memo`, `status`, `phone`, `fax`) VALUES
(3, 'Samsung', 'Samsung', 'www.samsung.com', 1, 22, 12222, 'sdf@yahoo.com', 'Ortigas', 'a', 0, 3454545, 354545),
(4, 'Apple', 'Ap', 'apple.com', 1, 0, 1, 'sdsd@yahoo.com', 'sdfsdfdsf', '23232', 1, 23323, 23232),
(5, 'Apple', 'Ap', 'apple.com', 1, 0, 1, 'sdsd@yahoo.com', 'sdfsdfdsf', '23232', 1, 23323, 23232),
(6, 'asd', 'asd', 'asd.com', 2, 2, 32, 'asd@yahoo.com', 'assd', 'fdgdfgd', 2, 232423, 12121),
(7, 'asd', 'asd', 'asd.com', 2, 2, 32, 'asd@yahoo.com', 'assd', 'fdgdfgd', 2, 232423, 12121);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '21232f297a');
