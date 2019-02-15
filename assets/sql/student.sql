-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 03:12 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(8) NOT NULL,
  `student_id` int(8) NOT NULL,
  `class_name_id` int(8) NOT NULL,
  `section_id` int(2) NOT NULL,
  `class_roll` int(8) NOT NULL,
  `entry_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `student_id`, `class_name_id`, `section_id`, `class_roll`, `entry_dt`) VALUES
(1, 50003, 1, 1, 25, '2019-02-09 05:38:10'),
(2, 50005, 1, 1, 27, '2019-02-09 15:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(8) NOT NULL,
  `dt` date NOT NULL,
  `class_name_id` int(2) NOT NULL,
  `section_id` int(2) NOT NULL,
  `attend` int(2) NOT NULL DEFAULT '0',
  `entry_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `dt`, `class_name_id`, `section_id`, `attend`, `entry_dt`) VALUES
(3, 50003, '2019-02-09', 1, 1, 0, '2019-02-08 23:05:50'),
(4, 50005, '2019-02-09', 1, 1, 0, '2019-02-08 23:05:50'),
(5, 50003, '2019-02-10', 1, 1, 1, '2019-02-09 23:28:16'),
(6, 50005, '2019-02-10', 1, 1, 0, '2019-02-09 23:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `class_name`
--

CREATE TABLE `class_name` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_name`
--

INSERT INTO `class_name` (`id`, `name`) VALUES
(1, 'Kg1'),
(2, 'Kg2');

-- --------------------------------------------------------

--
-- Table structure for table `pw`
--

CREATE TABLE `pw` (
  `id` int(8) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pw`
--

INSERT INTO `pw` (`id`, `user`, `pw`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL,
  `start_dt` date NOT NULL,
  `reg_no` int(16) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `entry_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `address`, `mobile`, `mail`, `web`, `start_dt`, `reg_no`, `pic`, `entry_dt`) VALUES
(1, 'ABS School', 'House-71, Road -9/A, Dhanmondia R/A, Dhaka -1209', '124578999', 'abc@gmail.com', 'www.abc.com', '2018-06-06', 9999, 'school.jpg', '2019-02-11 05:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `session_name`
--

CREATE TABLE `session_name` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_name`
--

INSERT INTO `session_name` (`id`, `name`) VALUES
(1, '2016-2017'),
(2, '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE `sex` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `bdate` date NOT NULL,
  `sex_id` int(1) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `class_name_id` int(2) NOT NULL,
  `marks` int(8) NOT NULL,
  `position` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `entry_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `fname`, `mname`, `address`, `mobile`, `bdate`, `sex_id`, `school_name`, `class_name_id`, `marks`, `position`, `remarks`, `pic`, `entry_dt`) VALUES
(50000, 'Valanath', 'wqeq', 'dfg', 'sdfse', '4234234', '2018-10-09', 2, '', 2, 2, '', 'fsd', 'blank.png', '2019-02-06 00:00:00'),
(50002, 'rtyret', 'ertwe4rt', 'werwer', 'Village- Bamnachara, Post- Tabakpur, Thana- Ulipir, District- Kurigram', 'erweerewr', '2014-12-29', 1, '', 1, 1, '', 'erewr', 'blank.png', '2019-02-06 10:05:17'),
(50003, 'Christine George', 'Andrew	Patrick', 'Colleen	Rice', '3944  Half and Half Drive, Five Points, California, 93624, 559-884-0322', '559-884-0322', '2012-02-06', 1, 'Wave of the Future\r\nAdvanced\r\nInstitute', 1, 4275, 'gpa 5 ', 'Ever wonder how NYC comes up with school names? Not like this.\r\nClick SCHOOLIFY! to create a new school name that may just exist someday.', '1549646593.jpg', '2019-02-06 10:09:46'),
(50005, 'Salam Mia', 'Sahabuddin', 'Salma Begum', 'House-71, Road -9/A, Dhanmondi R/A, Dhaka -1209', '125487887787', '2019-02-08', 1, 'Umananda high school', 2, 850, 'gpa5', 'dfsdf dsfhdsf dhfsdf df dfh dsf', '1549646307.jpg', '2019-02-08 04:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `bdate` date NOT NULL,
  `sex_id` int(1) NOT NULL,
  `max_qualification` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `entry_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `fname`, `mname`, `address`, `mobile`, `bdate`, `sex_id`, `max_qualification`, `designation`, `remarks`, `pic`, `entry_dt`) VALUES
(10, 'Jashim Uddin', 'Zamal Uddin', 'Zirina Jui', 'House-88, Mirpur, Dahak', '12548777888', '2019-02-13', 2, 'BSS', 'Assistent Teacher', 'fdfhdf df', 'blank_man.png', '2019-02-11 18:05:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_name`
--
ALTER TABLE `class_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pw`
--
ALTER TABLE `pw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_name`
--
ALTER TABLE `session_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_name`
--
ALTER TABLE `class_name`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pw`
--
ALTER TABLE `pw`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session_name`
--
ALTER TABLE `session_name`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sex`
--
ALTER TABLE `sex`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50006;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
