-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2014 at 07:21 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ma_prod1`
--

-- --------------------------------------------------------

--
-- Table structure for table `grid_config`
--

CREATE TABLE IF NOT EXISTS `grid_config` (
  `GRID_ID` int(11) NOT NULL,
  `PLANT_CODE` varchar(30) NOT NULL,
  `SOURCING_PLANT` varchar(10) NOT NULL,
  `INV_ID` varchar(20) NOT NULL,
  `GRID_DESCRIPTION` text NOT NULL,
  PRIMARY KEY (`GRID_ID`),
  UNIQUE KEY `GRID_ID` (`GRID_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grid_config`
--

INSERT INTO `grid_config` (`GRID_ID`, `PLANT_CODE`, `SOURCING_PLANT`, `INV_ID`, `GRID_DESCRIPTION`) VALUES
(1, '40, 41, 43, 84', '67', 'HRQAY', 'HSM-HR Material for CR Order!'),
(2, '40, 41, 43, 84', '62', 'TSCRQAY', 'TSCR-HR Material for CR Order!'),
(3, '62', '62', 'TSCRQAY', 'TSCR-HR Material for HR Order!'),
(4, '67', '67', 'HRQAY', 'HSM-HR Material for HR Order!');

-- --------------------------------------------------------

--
-- Table structure for table `material_characteristic`
--

CREATE TABLE IF NOT EXISTS `material_characteristic` (
  `CHR_ID` varchar(30) NOT NULL DEFAULT '',
  `CHAR_DESCRIPTION` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`CHR_ID`,`CHAR_DESCRIPTION`),
  UNIQUE KEY `CHR_ID` (`CHR_ID`,`CHAR_DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_characteristic`
--

INSERT INTO `material_characteristic` (`CHR_ID`, `CHAR_DESCRIPTION`) VALUES
('LAST_OPERATION_', 'Latest date of usage of meterial!'),
('QUALITY_CODE', 'Quality of the material desired!'),
('SECTION1', 'Thickness!'),
('SECTION2', 'Width!'),
('TOTAL_WEIGHT', 'Total Available weight available!');

-- --------------------------------------------------------

--
-- Table structure for table `material_unit`
--

CREATE TABLE IF NOT EXISTS `material_unit` (
  `MU_ID` varchar(120) NOT NULL,
  `INV_ID` varchar(120) NOT NULL,
  PRIMARY KEY (`MU_ID`),
  UNIQUE KEY `PK_MATERIAL_UNIT` (`MU_ID`),
  KEY `MU_INV_FK` (`INV_ID`),
  KEY `MU_INV_MU_IDX` (`INV_ID`,`MU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_unit`
--

INSERT INTO `material_unit` (`MU_ID`, `INV_ID`) VALUES
('75660111-ST', 'HRQAY'),
('75660113-ST', 'HRQAY'),
('T7566011-ST', 'TSCRQAY'),
('T7566012-ST', 'TSCRQAY');

-- --------------------------------------------------------

--
-- Table structure for table `material_unit_characteristic`
--

CREATE TABLE IF NOT EXISTS `material_unit_characteristic` (
  `MU_ID` varchar(120) NOT NULL,
  `CHR_ID` varchar(60) NOT NULL,
  `CHR_VALUE` varchar(300) NOT NULL,
  PRIMARY KEY (`MU_ID`,`CHR_ID`),
  UNIQUE KEY `PK_MATERIAL_UNIT_CHARACTERISTIC` (`MU_ID`,`CHR_ID`),
  KEY `MUCHAR_MCHAR_FK` (`CHR_ID`),
  KEY `MU_MUCHAR_FK` (`MU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_unit_characteristic`
--

INSERT INTO `material_unit_characteristic` (`MU_ID`, `CHR_ID`, `CHR_VALUE`) VALUES
('', '', ''),
('75660111-ST', 'LAST_OPERATION_', '29/03/2014'),
('75660111-ST', 'QUALITY_CODE', 'T01087'),
('75660111-ST', 'SECTION1', '3.5'),
('75660111-ST', 'SECTION2', '1015'),
('75660111-ST', 'TOTAL_WEIGHT', '13.1'),
('75660113-ST', 'LAST_OPERATION_', '20/04/2014'),
('75660113-ST', 'QUALITY_CODE', 'T01087'),
('75660113-ST', 'SECTION1', '3.7'),
('75660113-ST', 'SECTION2', '1020'),
('75660113-ST', 'TOTAL_WEIGHT', '20'),
('hgadsfhgf', 'hgfhjfhj', 'gfhjgh'),
('T7566011-ST', 'LAST_OPERATION_', '14/04/2014'),
('T7566011-ST', 'QUALITY_CODE', 'T01089'),
('T7566011-ST', 'SECTION1', '3.2'),
('T7566011-ST', 'SECTION2', '1024'),
('T7566011-ST', 'TOTAL_WEIGHT', '25'),
('T7566012-ST', 'LAST_OPERATION_', '12/05/2014'),
('T7566012-ST', 'QUALITY_CODE', 'T01090'),
('T7566012-ST', 'SECTION1', '3.4'),
('T7566012-ST', 'SECTION2', '1030'),
('T7566012-ST', 'TOTAL_WEIGHT', '15');

-- --------------------------------------------------------

--
-- Table structure for table `order_characteristic`
--

CREATE TABLE IF NOT EXISTS `order_characteristic` (
  `ODR_CHR_ID` varchar(15) NOT NULL DEFAULT '',
  `ODR_CHR_DESCRIPTION` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ODR_CHR_ID`,`ODR_CHR_DESCRIPTION`),
  UNIQUE KEY `ODR_CHR_ID` (`ODR_CHR_ID`,`ODR_CHR_DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_characteristic`
--

INSERT INTO `order_characteristic` (`ODR_CHR_ID`, `ODR_CHR_DESCRIPTION`) VALUES
('', ''),
('ORDER_BALANCE', 'Remaining part of order to be fulfilled!'),
('PLANT_CODE', 'Plant where order is placed!\r\nUsing this we get to know what kind of order it is!'),
('QUALITY_CODE', 'Quality code of the ordered material!'),
('SECTION1', 'Thickness!'),
('SECTION2', 'Width!'),
('sionuhuagdyj', 'kkumar'),
('SOURCING_PLANT', 'Plant Code for HR material, for HR/CR orders!');

-- --------------------------------------------------------

--
-- Table structure for table `production_order`
--

CREATE TABLE IF NOT EXISTS `production_order` (
  `PO_ID` varchar(270) NOT NULL,
  `ORDER_ID` varchar(270) NOT NULL,
  PRIMARY KEY (`PO_ID`),
  UNIQUE KEY `PK_PRODUCTION_ORDER` (`PO_ID`),
  KEY `CO_PO_FK` (`ORDER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_order_characteristic`
--

CREATE TABLE IF NOT EXISTS `prod_order_characteristic` (
  `PO_ID` varchar(270) NOT NULL,
  `ODR_CHR_ID` varchar(60) NOT NULL,
  `PO_CHR_VALUE` varchar(384) NOT NULL,
  PRIMARY KEY (`PO_ID`,`ODR_CHR_ID`),
  UNIQUE KEY `PK_PROD_ORDER_CHARACTERISTIC` (`PO_ID`,`ODR_CHR_ID`),
  KEY `ORDCHAR_POCHAR_FK` (`ODR_CHR_ID`),
  KEY `PO_POCHAR_FK` (`PO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_order_characteristic`
--

INSERT INTO `prod_order_characteristic` (`PO_ID`, `ODR_CHR_ID`, `PO_CHR_VALUE`) VALUES
('', '', ''),
('3450435-4-0000408415', 'ORDER_BALANCE', '200'),
('3450435-4-0000408415', 'PLANT_CODE', '41'),
('3450435-4-0000408415', 'QUALITY_CODE', 'T01087'),
('3450435-4-0000408415', 'SECTION1', '0.65'),
('3450435-4-0000408415', 'SECTION2', '995'),
('3450435-4-0000408415', 'SOURCING_PLANT', '67'),
('3450435-4-0000408420', 'ORDER_BALANCE', '200'),
('3450435-4-0000408420', 'PLANT_CODE', '67'),
('3450435-4-0000408420', 'QUALITY_CODE', 'T01087'),
('3450435-4-0000408420', 'SECTION1', '0.65'),
('3450435-4-0000408420', 'SECTION2', '995'),
('3450435-4-0000408420', 'SOURCING_PLANT', '67'),
('gfhtf', 'rdthrf', 'trdhtr'),
('hgfhjgjyh', 'gtfdhtf', 'tdhyrf');

-- --------------------------------------------------------

--
-- Table structure for table `route_operation`
--

CREATE TABLE IF NOT EXISTS `route_operation` (
  `ROUTE_ID` varchar(120) NOT NULL,
  `STEP_NUMBER` int(3) NOT NULL,
  PRIMARY KEY (`ROUTE_ID`,`STEP_NUMBER`),
  UNIQUE KEY `PK_ROUTE_OPERATION` (`ROUTE_ID`,`STEP_NUMBER`),
  KEY `RT_RTOPER_FK` (`ROUTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route_operation_characteristic`
--

CREATE TABLE IF NOT EXISTS `route_operation_characteristic` (
  `ROUTE_ID` varchar(120) NOT NULL,
  `STEP_NUMBER` varchar(5) NOT NULL,
  `CHR_ID` varchar(60) NOT NULL,
  `NOMINAL_VALUE` varchar(384) NOT NULL,
  `MIN_VALUE` varchar(384) NOT NULL,
  `MAX_VALUE` varchar(384) NOT NULL,
  PRIMARY KEY (`ROUTE_ID`,`STEP_NUMBER`,`CHR_ID`),
  UNIQUE KEY `PK_ROUTE_OPERATION_CHARACTERIS` (`ROUTE_ID`,`STEP_NUMBER`,`CHR_ID`),
  KEY `ROCHR_MCHAR_FK_IDX` (`CHR_ID`),
  KEY `ROC_ROUTE_ID_IDX` (`ROUTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_operation_characteristic`
--

INSERT INTO `route_operation_characteristic` (`ROUTE_ID`, `STEP_NUMBER`, `CHR_ID`, `NOMINAL_VALUE`, `MIN_VALUE`, `MAX_VALUE`) VALUES
('', '', '', '', '', ''),
('3450435-4-0000408415', '110', 'QUALITY_CODE', 'T01087', '', ''),
('3450435-4-0000408415', '110', 'SECTION1', '', '3.5', '3.8'),
('3450435-4-0000408415', '110', 'SECTION2', '', '1015', '1025'),
('3450435-4-0000408415', '250', 'SECTION1', '', '0.65', '0.65'),
('3450435-4-0000408415', '250', 'SECTION2', '', '995', '995'),
('3450435-4-0000408420', '110', 'QUALITY_CODE', 'T01087', '', ''),
('3450435-4-0000408420', '110', 'SECTION1', '3.7', '', ''),
('3450435-4-0000408420', '110', 'SECTION2', '1020', '', ''),
('hjghjg', 'ghgkj', 'kjhgkjhg', 'jhgkjhkjh', 'kjhkjh', 'kjhkj');

-- --------------------------------------------------------

--
-- Table structure for table `search_config`
--

CREATE TABLE IF NOT EXISTS `search_config` (
  `ODR_CHR_ID` varchar(15) NOT NULL DEFAULT '',
  `ODR_CHR_DESCRIPTION` varchar(250) NOT NULL DEFAULT '',
  `CHECKED` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ODR_CHR_ID`,`ODR_CHR_DESCRIPTION`),
  UNIQUE KEY `ODR_CHR_ID` (`ODR_CHR_ID`,`ODR_CHR_DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_config`
--

INSERT INTO `search_config` (`ODR_CHR_ID`, `ODR_CHR_DESCRIPTION`, `CHECKED`) VALUES
('ORDER_BALANCE', 'Remaining part of order to be fulfilled!', '0'),
('PLANT_CODE', 'Plant where order is placed!\r\nUsing this we get to know what kind of order it is!', '0'),
('QUALITY_CODE', 'Quality code of the ordered material!', '0'),
('SECTION1', 'Thickness!', '1'),
('SECTION2', 'Width!', '0'),
('SOURCING_PLANT', 'Plant Code for HR material, for HR/CR orders!', '0');

-- --------------------------------------------------------

--
-- Table structure for table `search_results`
--

CREATE TABLE IF NOT EXISTS `search_results` (
  `PO_ID` varchar(20) NOT NULL,
  `MU_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`PO_ID`,`MU_ID`),
  UNIQUE KEY `PO_ID` (`PO_ID`,`MU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_results`
--

INSERT INTO `search_results` (`PO_ID`, `MU_ID`) VALUES
('3450435-4-0000408415', '75660111-ST'),
('3450435-4-0000408415', '75660113-ST'),
('3450435-4-0000408420', '75660113-ST');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
