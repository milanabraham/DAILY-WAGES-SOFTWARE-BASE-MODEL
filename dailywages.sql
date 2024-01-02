-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2023 at 08:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Sam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobvacancy`
--

CREATE TABLE IF NOT EXISTS `tbl_jobvacancy` (
  `Title` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Salary` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobvacancy`
--

INSERT INTO `tbl_jobvacancy` (`Title`, `Description`, `Location`, `Salary`, `start_date`, `end_date`) VALUES
('Garden', 'Cutting Trees', 'Pala', 1000, '2023-12-08', '2023-12-12'),
('Construction', 'Building Shed', 'Pala', 999, '2023-12-08', '2023-12-10'),
('Painting', 'Painting Main Building', 'Pala', 999, '2023-12-09', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time`
--

CREATE TABLE IF NOT EXISTS `tbl_time` (
  `time` datetime NOT NULL,
  `id` varchar(10) NOT NULL,
  `status` text NOT NULL,
  `payment_status` varchar(25) DEFAULT NULL,
  `wage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_time`
--

INSERT INTO `tbl_time` (`time`, `id`, `status`, `payment_status`, `wage`) VALUES
('2023-12-08 07:51:39', '10', 'punch in', '', 0),
('2023-12-08 07:51:41', '10', 'punch out', 'approve', 1000),
('2023-12-08 07:52:58', '11', 'punch in', '', 0),
('2023-12-08 07:53:00', '11', 'punch out', 'approve', 999),
('2023-12-08 08:00:32', '11', 'punch in', '', 0),
('2023-12-08 08:00:34', '11', 'punch out', 'approve', 999),
('2023-12-08 08:17:06', '11', 'punch in', '', 0),
('2023-12-08 08:17:12', '11', 'punch out', 'approve', 999);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `Worker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Phone_No` bigint(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`Worker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Worker_ID`, `First_Name`, `Last_Name`, `Phone_No`, `Email`, `Pass`, `user_type`, `Designation`) VALUES
(9, 'Sreehari', 'm', 21312, 'm@gmail.com', '999', 'admin', 'Garden'),
(10, 'Tinu', 'tt', 122343342, 'tt@gmail.com', 'TT', 'user', 'Garden'),
(11, 'Tejus', 'b', 32424432, 'cc@gmail.com', 'cc', 'user', 'Construction');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
