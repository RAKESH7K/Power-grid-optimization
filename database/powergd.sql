-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 09:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `powergd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `Log_Id` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `contactno` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `utype` varchar(200) NOT NULL,
  `design` varchar(200) NOT NULL,
  `addrs` text NOT NULL,
  `photo` text NOT NULL,
  `locatin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `Log_Id`, `name`, `contactno`, `email`, `username`, `password`, `date`, `utype`, `design`, `addrs`, `photo`, `locatin`) VALUES
(1, 'AKL0021542786003', 'Administrator', '9847011216', 'powergrd@gmail.com', 'admin', 'admin', '2023-04-09', 'Administrator', 'E C', 'PALAKKAD', '6.jpg', 'Palakkad');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `msg_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `cntno` varchar(200) NOT NULL,
  `subjct` varchar(200) NOT NULL,
  `descp` text NOT NULL,
  `date` varchar(200) NOT NULL,
  `reply` text NOT NULL,
  `rdate` varchar(200) NOT NULL,
  `tm` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`msg_id`, `Log_Id`, `name`, `age`, `sex`, `cntno`, `subjct`, `descp`, `date`, `reply`, `rdate`, `tm`, `photo`) VALUES
(9, 'CRT576719728', 'Rai', '12', 'Male', '4124124124', 'sfasf', 'welcome', '02-01-2025', 'asfsfasf', '2025-01-06', '12:47:53 PM', 'abstral-official-bdlMO9z5yco-unsplash.jpg'),
(10, 'CRT576719728', 'Rai', '12', 'Male', '4124124124', 'sfasf', 'welcome', '02-01-2025', 'sadasdsafasf', '2025-05-21', '12:48:26 PM', 'abstral-official-bdlMO9z5yco-unsplash.jpg'),
(11, 'CRT576719728', 'Rai', '12', 'Male', '4124124124', 'ss', 'ADad', '06-01-2025', 'Pending', '', '10:06:44 AM', 'abstral-official-bdlMO9z5yco-unsplash.jpg'),
(12, 'CRT767203937', 'Shameer', '2', 'Male', '1241241241', 'aD', 'ad', '21-05-2025', 'Pending', '', '10:30:18 AM', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `tname` varchar(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `subjt` varchar(200) NOT NULL,
  `desp` text NOT NULL,
  `photo` text NOT NULL,
  `file1` text NOT NULL,
  `date` varchar(200) NOT NULL,
  `tm` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `tname`, `sname`, `subjt`, `desp`, `photo`, `file1`, `date`, `tm`) VALUES
(17, 'RAJ', 'RAJ', 'hi', 'dfasfasf', 'pexels-alexander-suhorucov-6457579.jpg', 'soundtrap-rAT6FJ6wltE-unsplash.jpg', '01-01-2025', '01:05:36 PM'),
(18, 'SHAMEER', 'Rai', 'hi', 'dfasfasf', 'pexels-alexander-suhorucov-6457579.jpg', 'soundtrap-rAT6FJ6wltE-unsplash.jpg', '01-01-2025', '01:05:56 PM'),
(19, 'Rai', 'RAJ', 'Welcome To', 'dfasfasf', 'pexels-alexander-suhorucov-6457579.jpg', 'soundtrap-rAT6FJ6wltE-unsplash.jpg', '01-01-2025', '01:05:59 PM'),
(21, 'Administrator', 'RAJ', 'hi', 'dfasfasf', 'pexels-alexander-suhorucov-6457579.jpg', 'soundtrap-rAT6FJ6wltE-unsplash.jpg', '01-01-2025', '01:06:32 PM'),
(23, 'KOTTAYI', 'Administrator', 'hi', 'gasg', 'person-08-big.jpg', 'soundtrap-rAT6FJ6wltE-unsplash.jpg', '01-01-2025', '02:51:55 PM'),
(24, 'Rai', 'Rai', 'dAD', 'adAD', 'abstral-official-bdlMO9z5yco-unsplash.jpg', 'soundtrap-rAT6FJ6wltE-unsplash.jpg', '06-01-2025', '10:36:45 AM'),
(25, 'sd', 'Administrator', 'ada', 'adad', 'person-08-big.jpg', 'SHAMSEENA V.docx', '21-05-2025', '10:13:06 AM'),
(26, 'Administrator', 'Shameer', 'AD', 'ad', '4.jpg', '5.jpg', '21-05-2025', '10:30:32 AM');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subjct` varchar(200) NOT NULL,
  `descp` text NOT NULL,
  `date` date NOT NULL,
  `tme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `name`, `subjct`, `descp`, `date`, `tme`) VALUES
(6, 'SAJI', 'ss', 'sss', '2023-02-02', '12:11:57 PM'),
(7, 'Akila', 'ss', 'ss', '2023-02-03', '01:13:46 PM'),
(8, 'People', 's', 'sss', '2023-02-03', '01:14:23 PM'),
(9, 'Police', 'sdgs', 'sdgsdg', '2023-04-10', '04:49:52 AM'),
(10, 'People', 'dfhdf', 'hdfhdf', '2024-02-16', '08:10:05 PM'),
(11, 'zdz', 'ada', 'ADad', '2025-05-29', '10:15'),
(12, 'zdz', 'ada', 'ADad', '2025-05-29', '10:15');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `peop_id` int(11) NOT NULL,
  `Log_Id` text NOT NULL,
  `aadharno` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `cntno` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `addr` text NOT NULL,
  `dstrct` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `pcode` varchar(200) NOT NULL,
  `pncth` varchar(200) NOT NULL,
  `wrd` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `utype` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`peop_id`, `Log_Id`, `aadharno`, `name`, `sex`, `age`, `dob`, `cntno`, `email`, `photo`, `addr`, `dstrct`, `state`, `pcode`, `pncth`, `wrd`, `username`, `password`, `date`, `utype`, `location`, `about`) VALUES
(7, 'CRT767203937', '', 'Shameer', 'Male', 0, '0000-00-00', '1241241241', 'sham@gmail.com', '4.jpg', '', '', '', '', '', '', 'sham', '123456', '2025-05-21', 'People', 'Palakkad', 'Pala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`peop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `peop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
