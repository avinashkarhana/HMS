-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 06:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--
CREATE DATABASE IF NOT EXISTS `hms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hms`;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `c_code` int(2) NOT NULL,
  `ctype` varchar(50) NOT NULL,
  `c_cat` int(1) NOT NULL COMMENT '1-Electricity Related 2-Civil Related'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`c_code`, `ctype`, `c_cat`) VALUES
(1, 'Fan Related', 1),
(2, 'Lighting Related', 1),
(3, 'Short Circuit Related', 1),
(4, 'Broken Taps and Accessory  Related', 2),
(5, 'Water Shortage Related', 2),
(6, 'Damaged Furniture Related', 0),
(7, 'Sweeping And Cleaning  Related', 0),
(8, 'Sports And Game Equipment Related', 0),
(9, 'Security Related', 0),
(10, 'Other', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `serial` int(5) NOT NULL,
  `Date` date NOT NULL,
  `uidai` bigint(12) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `Hcode` varchar(5) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=Under Process 2=Solved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`serial`, `Date`, `uidai`, `type`, `description`, `Hcode`, `status`) VALUES
(1, '2017-05-04', 332692004203, '6', 'door handles broken and broken table lock', '121', 2),
(2, '2017-05-13', 332692004203, '6', 'Common Hall Gate broken.  ', '121', 2),
(3, '2017-06-14', 332692004203, '9', 'No CCTV cams in hostel. ', '121', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_code` int(3) NOT NULL,
  `Course_name` varchar(70) NOT NULL,
  `Duration` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_code`, `Course_name`, `Duration`) VALUES
(501, 'B.Tech CSE', 4),
(502, 'B.Tech IT', 4),
(503, 'B.Tech ME', 4);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `uidai` bigint(12) NOT NULL,
  `fdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`uidai`, `fdate`) VALUES
(332692004203, '2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `Hcode` char(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Type` char(1) NOT NULL,
  `fees` int(4) NOT NULL,
  `warden1` varchar(30) NOT NULL COMMENT 'Warden 1 Name',
  `w1mobile` bigint(10) NOT NULL COMMENT 'Warden 1 Mobile',
  `warden2` varchar(30) NOT NULL COMMENT 'Warden 2 Name',
  `w2mobile` bigint(10) NOT NULL COMMENT 'Warden 2 Mobile',
  `caretaker` varchar(30) NOT NULL,
  `ctmobile` bigint(10) NOT NULL,
  `Total_seats` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`Hcode`, `Name`, `Type`, `fees`, `warden1`, `w1mobile`, `warden2`, `w2mobile`, `caretaker`, `ctmobile`, `Total_seats`) VALUES
('111', 'Bhagirathi Girls Hostel', 'F', 0, '', 0, '', 0, '', 0, 120),
('112', 'Yamuna Girls Hostel', 'F', 0, '', 0, '', 0, '', 0, 90),
('121', 'Shri Vivekananda Hostel', 'M', 0, 'Varun Barthwal', 0, 'Dr. Brijesh Gangil', 0, '', 0, 90),
('122', 'Shridev Suman Boys Hostel', 'M', 0, '', 0, 'Dr.Narender Rawal', 0, '', 0, 90),
('123', 'Trishul Boys Hostel', 'M', 0, '', 0, '', 0, '', 0, 90),
('221', 'Babu Jagjeevan Ram Boys Hostel', 'M', 0, '', 0, '', 0, '', 0, 90),
('222', 'Chaukhamba Boys Hostel', 'M', 0, '', 0, '', 0, '', 0, 90);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `Hcode` char(5) NOT NULL,
  `Seat` varchar(5) NOT NULL,
  `uidai` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`Hcode`, `Seat`, `uidai`) VALUES
('121', '001A', ''),
('121', '001B', ''),
('121', '002A', ''),
('121', '002B', ''),
('121', '003A', ''),
('121', '003B', ''),
('121', '004A', ''),
('121', '004B', ''),
('121', '005A', ''),
('121', '005B', ''),
('121', '006A', ''),
('121', '006B', ''),
('121', '007A', '33269200403'),
('121', '007B', ''),
('121', '008A', ''),
('121', '008B', ''),
('121', '009A', ''),
('121', '009B', ''),
('121', '010A', ''),
('121', '010B', ''),
('121', '011A', ''),
('121', '011B', ''),
('121', '012A', ''),
('121', '012B', ''),
('121', '013A', ''),
('121', '013B', ''),
('121', '014A', ''),
('121', '014B', ''),
('121', '015A', ''),
('121', '015B', ''),
('121', '016A', ''),
('121', '016B', ''),
('121', '017A', ''),
('121', '017B', ''),
('121', '018A', ''),
('121', '018B', ''),
('121', '019A', ''),
('121', '019B', ''),
('121', '020A', ''),
('121', '020B', ''),
('121', '021A', ''),
('121', '021B', ''),
('121', '022A', ''),
('121', '022B', ''),
('121', '023A', ''),
('121', '023B', ''),
('121', '024A', ''),
('121', '024B', ''),
('121', '025A', ''),
('121', '025B', ''),
('121', '026A', ''),
('121', '026B', ''),
('121', '027A', ''),
('121', '027B', ''),
('121', '028A', ''),
('121', '028B', ''),
('121', '029A', ''),
('121', '029B', ''),
('121', '030A', ''),
('121', '030B', ''),
('121', '031A', ''),
('121', '031B', ''),
('121', '032A', ''),
('121', '032B', ''),
('121', '033A', ''),
('121', '033B', ''),
('121', '034A', ''),
('121', '034B', ''),
('121', '035A', ''),
('121', '035B', ''),
('121', '036A', ''),
('121', '036B', ''),
('121', '037A', ''),
('121', '037B', ''),
('121', '038A', ''),
('121', '038B', ''),
('121', '039A', ''),
('121', '039B', ''),
('121', '040A', ''),
('121', '040B', ''),
('121', '041A', ''),
('121', '041B', ''),
('121', '042A', ''),
('121', '042B', ''),
('121', '043A', ''),
('121', '043B', ''),
('121', '044A', ''),
('121', '044B', ''),
('121', '045A', ''),
('121', '045B', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `uidai` bigint(12) NOT NULL,
  `pass` varchar(20) NOT NULL DEFAULT 'password',
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Mname` varchar(30) NOT NULL,
  `Hostel` varchar(20) NOT NULL DEFAULT 'Not Alloted',
  `seat` varchar(5) NOT NULL,
  `Sex` char(1) NOT NULL,
  `Category` char(3) NOT NULL DEFAULT 'GEN',
  `Mobile` bigint(10) NOT NULL,
  `Gmobile` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Batch` varchar(4) NOT NULL,
  `course` int(3) NOT NULL,
  `omarks` int(3) NOT NULL COMMENT 'Obtained Marks in UG/10+2',
  `tmarks` int(3) NOT NULL COMMENT 'Total Marks in UG/10+2',
  `percentage` float NOT NULL,
  `vdate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0=Not Ageed 1=Agreed 2=Verified 3=alloted 4=fee submitted',
  `p1` varchar(4) DEFAULT NULL,
  `p2` varchar(4) DEFAULT NULL,
  `p3` varchar(4) DEFAULT NULL,
  `Date` varchar(30) NOT NULL,
  `last_login` varchar(30) NOT NULL DEFAULT 'Not Logined Yet'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`uidai`, `pass`, `Name`, `Fname`, `Mname`, `Hostel`, `seat`, `Sex`, `Category`, `Mobile`, `Gmobile`, `email`, `Address`, `Batch`, `course`, `omarks`, `tmarks`, `percentage`, `vdate`, `status`, `p1`, `p2`, `p3`, `Date`, `last_login`) VALUES
(123456789012, 'p', 'ABCDEF', 'XYZ', 'PQR', '122', '01A', 'M', 'GEN', 9876543210, 9876543210, 'ab@ab.ab', 'STUV MKK , QQW 123456', '2016', 503, 450, 800, 56.25, '2017-08-01', 4, '', '', '', '16:46 22nd July 2017', '07:29 9 January 2018'),
(332692004203, 'punit', 'Avinash Karhana', 'Omkar Singh', 'Sunita Rani', '121', '07A', 'M', 'OBC', 9416029640, 8295347077, 'avinashkarhana1@gmail.com', 'V.P.O Bhodwal Majri, Teh. Samalkha , Dist. Panipat(Haryana)', '2013', 501, 399, 500, 79.8, '0000-00-00', 4, '', '', '', '07:14 23rd July 2017', '17:40 18 January 2018'),
(987654321011, '1', 'xyz', '', '', 'Not Alloted', '', 'M', 'GEN', 9654781230, 0, 'a@a.c', '', '2013', 501, 420, 500, 84, '0000-00-00', 0, '', '', '', '17:09 17th August 2017', '17:10 17 August 2017');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `last_login` varchar(30) NOT NULL DEFAULT 'Not Logined Yet'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user`, `pass`, `last_login`) VALUES
('111', 'bgh1', '22:03 4 May 2017'),
('112', 'ygh1', 'Not Logined Yet'),
('121', 'svh1', '09:53 9 January 2018'),
('122', 'sds1', '17:10 1 August 2017'),
('123', 'tbh1', 'Not Logined Yet'),
('221', 'bjjr1', 'Not Logined Yet'),
('222', 'cbh1', '19:53 27 March 2017'),
('admin', 'hnb123hs', '17:30 18 January 2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`c_code`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_code`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`Hcode`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD KEY `Hcode` (`Hcode`,`Seat`,`uidai`),
  ADD KEY `Hcode_2` (`Hcode`,`Seat`,`uidai`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`uidai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `serial` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
