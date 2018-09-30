-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 08:35 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `aid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `ispresent` tinyint(4) NOT NULL,
  `uid` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`aid`, `sid`, `date`, `ispresent`, `uid`, `id`) VALUES
(1, 1, 1522886400, 1, 1, 2),
(2, 2, 1522886400, 1, 1, 2),
(3, 3, 1522886400, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(255) NOT NULL,
  `did` int(255) NOT NULL,
  `dname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `did`, `dname`) VALUES
(1, 1, 'ce'),
(2, 2, 'ch'),
(3, 3, 'mh'),
(4, 4, 'it');

-- --------------------------------------------------------

--
-- Table structure for table `department_subject`
--

CREATE TABLE `department_subject` (
  `did` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_subject`
--

INSERT INTO `department_subject` (`did`, `id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 9),
(2, 10),
(3, 7),
(3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `department_user`
--

CREATE TABLE `department_user` (
  `did` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_user`
--

INSERT INTO `department_user` (`did`, `uid`) VALUES
(3, 8),
(3, 9),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rollno` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `name`, `rollno`) VALUES
(1, 'Aadinath Jain', '1'),
(2, 'Asha Pandey', '2'),
(3, 'Aarti Patel', '3'),
(4, 'Akshar Patel', '4'),
(5, 'Abhi Vachhani', '5'),
(6, 'Raj Patel', '6'),
(7, 'Manav Pandya', '7'),
(8, 'Bharat Vaghela', '8'),
(9, 'Parth Panchal', '9'),
(10, 'Rajat Movaliya', '10'),
(11, 'Bhumi Patel', '11'),
(12, 'Yogesh Goti', '12'),
(13, 'Rajnikant  Patel', '13'),
(14, 'Saurabh Tiwari', '14'),
(15, 'Vatsal Panchani', '15'),
(16, 'Jay Patel', '16'),
(17, 'Rahul Raiyani', '17'),
(18, 'Harsh Modi', '18'),
(19, 'Jaydev Patel', '19'),
(20, 'Vivek Patel', '20'),
(21, 'Sandip Baldaniya', '21'),
(22, 'Rohit Sharma', '22'),
(23, 'Ravi Vyas', '23'),
(24, 'Dilkhush Parmar', '24'),
(25, 'Jaynil Patel', '25');

-- --------------------------------------------------------

--
-- Table structure for table `student_new`
--

CREATE TABLE `student_new` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rollno` int(11) NOT NULL,
  `did` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_new`
--

INSERT INTO `student_new` (`sid`, `name`, `rollno`, `did`) VALUES
(1, 'jsn', 101, 1),
(2, 'parth', 102, 1),
(3, 'jainik', 103, 2),
(4, 'ronak', 104, 2),
(5, 'ritul', 105, 3),
(6, 'rutvik', 106, 1),
(7, 'mahesh', 107, 4),
(8, 'nik', 108, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `sid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ssid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`sid`, `id`, `ssid`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(2, 1, 6),
(2, 2, 7),
(2, 3, 8),
(2, 4, 9),
(2, 5, 10),
(3, 1, 11),
(3, 2, 12),
(3, 3, 13),
(3, 4, 14),
(3, 5, 15),
(4, 1, 16),
(4, 2, 17),
(4, 3, 18),
(4, 4, 19),
(4, 5, 20),
(5, 1, 21),
(5, 2, 22),
(5, 3, 23),
(5, 4, 24),
(5, 5, 25),
(6, 1, 26),
(6, 2, 27),
(6, 3, 28),
(6, 4, 29),
(6, 5, 30),
(7, 1, 31),
(7, 2, 32),
(7, 3, 33),
(7, 4, 34),
(7, 5, 35),
(8, 1, 36),
(8, 2, 37),
(8, 3, 38),
(8, 4, 39),
(8, 5, 40),
(9, 1, 41),
(9, 2, 42),
(9, 3, 43),
(9, 4, 44),
(9, 6, 45),
(10, 1, 46),
(10, 2, 47),
(10, 3, 48),
(10, 4, 49),
(10, 6, 50),
(11, 1, 51),
(11, 2, 52),
(11, 3, 53),
(11, 4, 54),
(11, 6, 55),
(12, 1, 56),
(12, 2, 57),
(12, 3, 58),
(12, 4, 59),
(12, 6, 60),
(13, 1, 61),
(13, 2, 62),
(13, 3, 63),
(13, 4, 64),
(13, 6, 65),
(14, 1, 66),
(14, 2, 67),
(14, 3, 68),
(14, 4, 69),
(14, 6, 70),
(15, 1, 71),
(15, 2, 72),
(15, 3, 73),
(15, 4, 74),
(15, 6, 75),
(16, 1, 76),
(16, 2, 77),
(16, 3, 78),
(16, 4, 79),
(16, 6, 80),
(17, 1, 81),
(17, 2, 82),
(17, 3, 83),
(17, 4, 84),
(17, 6, 85),
(18, 1, 86),
(18, 2, 87),
(18, 3, 88),
(18, 4, 89),
(18, 6, 90),
(19, 1, 91),
(19, 2, 92),
(19, 3, 93),
(19, 4, 94),
(19, 6, 95),
(20, 1, 96),
(20, 2, 97),
(20, 3, 98),
(20, 4, 99),
(20, 6, 100),
(21, 1, 101),
(21, 2, 102),
(21, 3, 103),
(21, 4, 104),
(21, 5, 105),
(22, 1, 106),
(22, 2, 107),
(22, 3, 108),
(22, 4, 109),
(22, 5, 110),
(23, 1, 111),
(23, 2, 112),
(23, 3, 113),
(23, 4, 114),
(23, 5, 115),
(24, 1, 116),
(24, 2, 117),
(24, 3, 118),
(24, 4, 119),
(24, 5, 120),
(25, 1, 121),
(25, 2, 122),
(25, 3, 123),
(25, 4, 124),
(25, 5, 125);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject_new`
--

CREATE TABLE `student_subject_new` (
  `sid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ssid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject_new`
--

INSERT INTO `student_subject_new` (`sid`, `id`, `ssid`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(2, 1, 6),
(2, 2, 7),
(2, 3, 8),
(2, 4, 9),
(2, 5, 10),
(3, 1, 11),
(3, 2, 12),
(3, 3, 13),
(3, 4, 14),
(3, 5, 15),
(4, 9, 16),
(4, 10, 17),
(5, 9, 18),
(5, 10, 19),
(6, 7, 20),
(6, 11, 21),
(7, 7, 22),
(7, 11, 23),
(8, 8, 24),
(8, 12, 25);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(1, 'sdp'),
(2, 'oose'),
(3, 'cn'),
(4, 'nis'),
(5, 'tafl'),
(6, 'soa'),
(7, 'mhsub1'),
(8, 'itsub1'),
(9, 'chsub1'),
(10, 'chsub2'),
(11, 'mhsub2'),
(12, 'itsub2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `password`, `email`, `status`, `created`) VALUES
(1, 'vbp', 'vbp', 'vbp@gmail.com', 1, 1489060137),
(2, 'njb', 'njb', 'njb@gmail.com', 1, 1489060137),
(3, 'prd', 'prd', 'prd@gmail.com', 1, 1489060137),
(4, 'pmc', 'pmc', 'pmc@gmail.com', 1, 1489060137),
(5, 'bsb', 'bsb', 'bsb@gmail.com', 1, 1489060137),
(6, 'sss', 'sss', 'sss@gmail.com', 1, 1489060137),
(7, 'ams', 'ams', 'ams@gmail.com', 1, 1489060137),
(8, 'abc', 'abc', 'abc@gmail.com', 1, 1489060137),
(9, 'xyz', 'xyz', 'xyz@gmail.com', 1, 1489060137);

-- --------------------------------------------------------

--
-- Table structure for table `user_new`
--

CREATE TABLE `user_new` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `did` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_new`
--

INSERT INTO `user_new` (`uid`, `uname`, `password`, `did`, `email`, `status`, `created`) VALUES
(1, 'apv', 'apv', 1, 'apv@gmail.com', 1, 1489060137),
(2, 'jhb', 'jhb', 1, 'jhb@gmail.com', 1, 1489060137),
(3, 'spm', 'spm', 1, 'spm@gmail.com', 1, 1489060137),
(4, 'pmc', 'pmc', 1, 'pmc@gmail.com', 1, 1489060137),
(5, 'bsb', 'bsb', 1, 'bsb@gmail.com', 1, 1489060137),
(6, 'sss', 'sss', 1, 'sss@gmail.com', 1, 1489060137),
(7, 'msb', 'msb', 1, 'msb@gmail.com', 1, 1489060137),
(8, 'ch1', 'ch1', 2, 'ch1@gmail.com', 1, 1489060137),
(9, 'ch2', 'ch2', 2, 'ch2@gmail.com', 1, 554554353),
(10, 'mh1', 'mh1', 3, 'mh1@gmail.com', 1, 345534534),
(11, 'itfac1', 'itfac1', 4, 'itfac1@gmail.com', 1, 54545454);

-- --------------------------------------------------------

--
-- Table structure for table `user_subject`
--

CREATE TABLE `user_subject` (
  `uid` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_subject`
--

INSERT INTO `user_subject` (`uid`, `id`) VALUES
(1, 2),
(1, 6),
(2, 2),
(3, 3),
(7, 5),
(10, 7),
(10, 11),
(11, 8),
(11, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_new`
--
ALTER TABLE `student_new`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`ssid`);

--
-- Indexes for table `student_subject_new`
--
ALTER TABLE `student_subject_new`
  ADD PRIMARY KEY (`ssid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_new`
--
ALTER TABLE `user_new`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `ssid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `student_subject_new`
--
ALTER TABLE `student_subject_new`
  MODIFY `ssid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_new`
--
ALTER TABLE `user_new`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
