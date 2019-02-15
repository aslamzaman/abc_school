-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2016 at 09:54 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_edn`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_fees`
--

CREATE TABLE IF NOT EXISTS `db_fees` (
`fees_id` int(10) NOT NULL,
  `student_id` int(8) NOT NULL,
  `fees` int(8) NOT NULL,
  `fees_dt` date NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `db_fees`
--

INSERT INTO `db_fees` (`fees_id`, `student_id`, `fees`, `fees_dt`, `user_id`) VALUES
(1, 1, 500, '2016-02-21', 1),
(2, 13, 2500, '2016-02-21', 1),
(3, 1, 4100, '2016-02-21', 1),
(4, 1, 500, '2016-02-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_fees_setting`
--

CREATE TABLE IF NOT EXISTS `db_fees_setting` (
`fees_id` int(8) NOT NULL,
  `fees_session` int(5) NOT NULL,
  `fees_class` int(5) NOT NULL,
  `fees` int(8) NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `db_fees_setting`
--

INSERT INTO `db_fees_setting` (`fees_id`, `fees_session`, `fees_class`, `fees`, `user_id`) VALUES
(3, 2016, 16, 300, 1),
(4, 2016, 6, 3000, 1),
(5, 2016, 9, 4500, 1),
(6, 2016, 1, 3500, 1),
(7, 2016, 2, 7500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_student`
--

CREATE TABLE IF NOT EXISTS `db_student` (
`student_id` int(11) NOT NULL,
  `idcard` int(6) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `bdate` date NOT NULL,
  `sex_id` int(5) NOT NULL,
  `situationtype_id` int(5) NOT NULL,
  `occupation_id` int(4) NOT NULL,
  `income` int(8) NOT NULL,
  `class_id_pres` int(5) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `session` int(4) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `db_student`
--

INSERT INTO `db_student` (`student_id`, `idcard`, `student_name`, `father_name`, `address`, `mobile`, `bdate`, `sex_id`, `situationtype_id`, `occupation_id`, `income`, `class_id_pres`, `remarks`, `session`, `pic`, `user_id`, `entry`) VALUES
(1, 1001, 'Lloyd Horton ', 'Elmer Henry ', '785 Route 9 Medina, OH 44256', '07700 90089', '2003-02-12', 2, 2, 0, 0, 1, 'Do so written as raising parlors spirits mr elderly. Made late in of high left hold. Carried females of up highest calling. Limits marked led silent d', 2016, '1001.jpg', 1, '2016-02-12'),
(4, 1002, 'Eduardo Cain', 'Heidi Meyer', '6605 Tanglewood Drive Homestead, FL 33030', '07700 90055', '2016-02-12', 2, 1, 0, 0, 1, 'By so delight of showing neither believe he present. Deal sigh up in shew away when. Pursuit express no or prepare replied. Wholly formed old latter f', 2016, '1002.jpg', 1, '2016-02-12'),
(3, 1003, 'Timothy Nunez', 'Mindy Rowe', '9926 Prospect Avenue Fairmont, WV 26554', '07700 90008', '2016-02-12', 3, 1, 0, 0, 1, 'Greatly cottage thought fortune no mention he. Of mr certainty arranging am smallness by conveying. Him plate you allow built grave. Sigh sang nay sex', 2016, '1003.jpg', 1, '2016-02-12'),
(5, 1004, 'Delbert Henderson', 'Jake Jacobs', '605 8th Street Pittsburgh, PA 15206', '07700 90073', '2016-02-12', 1, 1, 0, 0, 1, 'Endeavor bachelor but add eat pleasure doubtful sociable. Age forming covered you entered the examine. Blessing scarcely confined her contempt wondere', 2016, '1004.jpg', 1, '2016-02-12'),
(6, 1005, 'Dana Simpson', 'Terry Butler', '2958 Franklin Street Belmont, MA 02478', '07700 90088', '2016-02-12', 1, 1, 0, 0, 1, 'Its sometimes her behaviour are contented. Do listening am eagerness oh objection collected. Together gay feelings continue juvenile had off one. Unkn', 2016, '1005.jpg', 1, '2016-02-12'),
(7, 1006, 'Arlene Reeves', 'Erin Peters', '980 Vine Street Sykesville, MD 21784', '07700 90054', '2016-02-12', 1, 1, 2, 5000, 1, 'Boy favourable day can introduced sentiments entreaties. Noisier carried of in warrant because. So mr plate seems cause chief widen first. Two differe', 2016, '1006.jpg', 1, '2016-02-12'),
(8, 1007, 'Michelle Boyd', 'Yvonne Bowman', '695 Catherine Street Manitowoc, WI 54220', '07700 90030', '2016-02-12', 1, 1, 2, 4500, 1, 'Increasing impression interested expression he my at. Respect invited request charmed me warrant to. Expect no pretty as do though so genius afraid co', 2016, '1007.jpg', 1, '2016-02-12'),
(10, 1009, 'Clyde Rivera', 'Lula Dixon', '430 Jefferson Court Reston, VA 20191', '07700 90035', '2016-02-13', 1, 1, 1, 54, 1, 'Sudden she seeing garret far regard. By hardly it direct if pretty up regret. Ability thought enquire settled prudent you sir. Or easy knew sold on we', 2016, '1009.jpg', 1, '2016-02-13'),
(11, 1010, 'Byron Cruz ', 'Martin Rodgers', '404 Lake Avenue Rochester, NY 14606', '07700 90065', '2016-02-13', 1, 4, 1, 444, 1, 'It if sometimes furnished unwilling as additions so. Blessing resolved peculiar fat graceful ham. Sussex on at really ladies in as elinor. Sir sex opi', 2016, '1010.jpg', 1, '2016-02-13'),
(13, 1011, 'Alma Morales ', 'Doyle Hansen', '585 Hawthorne Lane Lake Jackson, TX 77566', '07700 90091', '1997-02-18', 2, 4, 7, 5000, 1, 'It if sometimes furnished unwilling as additions so. Blessing resolved peculiar fat graceful ham. Su', 2016, '1011.jpg', 1, '0000-00-00'),
(14, 1012, 'Horrrboure Marks', 'Joans Clark', '67, Horbour Avenue, NY.', '778365412', '1995-06-12', 1, 4, 3, 5500, 1, 'It if sometimes furnished unwilling as additions so. Blessing resolved peculiar fat graceful ham. Su', 2016, '1012.jpg', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `db_student_attendance`
--

CREATE TABLE IF NOT EXISTS `db_student_attendance` (
`attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `atd_date` date NOT NULL,
  `class_id_pres` int(5) NOT NULL,
  `session` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance` int(2) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `db_student_attendance`
--

INSERT INTO `db_student_attendance` (`attendance_id`, `student_id`, `atd_date`, `class_id_pres`, `session`, `user_id`, `attendance`) VALUES
(1, 11, '2016-02-19', 1, 2016, 1, 1),
(2, 6, '2016-02-19', 1, 2015, 1, 1),
(23, 6, '2016-02-20', 1, 2015, 1, 1),
(22, 5, '2016-02-20', 1, 2015, 1, 1),
(5, 10, '2016-02-19', 1, 2015, 1, 1),
(21, 4, '2016-02-19', 1, 2015, 1, 1),
(19, 4, '2016-02-18', 1, 2015, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_class`
--

CREATE TABLE IF NOT EXISTS `list_class` (
`class_id` int(11) NOT NULL,
  `class_name` varchar(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `list_class`
--

INSERT INTO `list_class` (`class_id`, `class_name`) VALUES
(1, 'Play'),
(2, 'Nursery'),
(3, 'KG1'),
(4, 'KG2'),
(5, 'One'),
(6, 'Two'),
(7, 'Three'),
(8, 'Four'),
(9, 'Five'),
(10, 'Six'),
(11, 'Seven'),
(12, 'Eight'),
(13, 'Nine'),
(14, 'Ten'),
(15, 'Level-1'),
(16, 'Level-2'),
(17, 'Level-3'),
(18, 'Level-4'),
(19, 'Level-5');

-- --------------------------------------------------------

--
-- Table structure for table `list_occupation`
--

CREATE TABLE IF NOT EXISTS `list_occupation` (
`occupation_id` int(2) NOT NULL,
  `occupation_name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `list_occupation`
--

INSERT INTO `list_occupation` (`occupation_id`, `occupation_name`) VALUES
(1, 'Farmer'),
(2, 'Bussiness'),
(3, 'Service'),
(4, 'Driver'),
(5, 'Teacher'),
(6, 'Doctor'),
(7, 'Engineer'),
(8, 'Day Labour');

-- --------------------------------------------------------

--
-- Table structure for table `list_session`
--

CREATE TABLE IF NOT EXISTS `list_session` (
`session_id` int(5) NOT NULL,
  `session_name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `list_session`
--

INSERT INTO `list_session` (`session_id`, `session_name`) VALUES
(1, '2015'),
(2, '2016'),
(3, '2017'),
(4, '2018'),
(5, '2019'),
(6, '2020'),
(7, '2021'),
(8, '2022'),
(9, '2023'),
(10, '2024'),
(11, '2025');

-- --------------------------------------------------------

--
-- Table structure for table `list_sex`
--

CREATE TABLE IF NOT EXISTS `list_sex` (
`sex_id` int(5) NOT NULL,
  `sex_name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `list_sex`
--

INSERT INTO `list_sex` (`sex_id`, `sex_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `list_situationtype`
--

CREATE TABLE IF NOT EXISTS `list_situationtype` (
`situationtype_id` int(2) NOT NULL,
  `situationtype` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `list_situationtype`
--

INSERT INTO `list_situationtype` (`situationtype_id`, `situationtype`) VALUES
(1, 'One Eyed'),
(2, 'Physical Disable'),
(3, 'Abnormal'),
(4, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `pw_user`
--

CREATE TABLE IF NOT EXISTS `pw_user` (
`user_id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `restricted` int(2) NOT NULL,
  `user_ip` varchar(50) NOT NULL,
  `entry` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pw_user`
--

INSERT INTO `pw_user` (`user_id`, `school_name`, `address`, `user`, `password`, `restricted`, `user_ip`, `entry`) VALUES
(1, 'Oyster Harbour High School', '9524 Brandywine Drive Wake Forest, NC 27587', '11111111', '11111111', 0, '', '2016-02-17 01:12:17'),
(2, '', 'dfdf', 'sdf', 'df', 0, '', '2016-02-22 00:00:00'),
(3, '', 'df', 'ghg', 'gh', 0, '', '2016-02-22 00:00:00'),
(4, '', 'hgh', 'gh', 'fgh', 0, '', '2016-02-22 00:00:00'),
(5, '', 'gh', 'gh', 'gh', 0, '', '2016-02-22 00:00:00'),
(6, '', 'hgjf', 'hh', 'hjkhgj', 0, '127.0.0.1', '2016-02-23 00:00:00'),
(7, '', 'reter', 'ER', 'ER', 0, '127.0.0.1', '2016-02-23 00:00:00'),
(8, '', 'df', 'dsf', 'fsd', 0, '127.0.0.1', '2016-02-23 00:00:00'),
(9, '', 'fdg', 'df', 'dfgwd', 0, '127.0.0.1', '2016-02-23 00:00:00'),
(10, '', 'fdtd', 'fdgdf', 'fgfd', 0, '::1', '2016-02-24 00:00:00'),
(11, '', 'hgjhg', 'hjhg', 'hgjghj', 0, '::1', '2016-02-24 00:00:00'),
(12, 'dfdsf', 'sdfds', 'sdfsd', 'dsfds', 0, '::1', '2016-02-24 00:00:00'),
(13, 'jk', 'jk', 'jhk', 'jhk', 0, '::1', '2016-02-24 00:00:00'),
(14, 'fdgf', 'ffdg', 'fgfdg', 'erfewr', 0, '::1', '2016-02-24 02:50:32'),
(15, 'fdgfdtg', 'dfgdsf', 'dfds', 'fdsdf', 0, '::1', '2016-02-24 02:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE IF NOT EXISTS `views` (
`views_id` int(8) NOT NULL,
  `views_address` varchar(100) NOT NULL,
  `views_dt_time` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`views_id`, `views_address`, `views_dt_time`) VALUES
(1, '127.0.0.1', '2016-02-23 09:52:09'),
(2, '127.0.0.1', '2016-02-23 09:52:17'),
(3, '127.0.0.1', '2016-02-23 09:55:04'),
(4, '127.0.0.1', '2016-02-23 10:13:26'),
(5, '127.0.0.1', '2016-02-23 10:15:03'),
(6, '127.0.0.1', '2016-02-23 10:24:00'),
(7, '127.0.0.1', '2016-02-23 10:50:50'),
(8, '127.0.0.1', '2016-02-23 10:52:06'),
(9, '127.0.0.1', '2016-02-23 10:52:16'),
(10, '127.0.0.1', '2016-02-23 10:57:06'),
(11, '127.0.0.1', '2016-02-23 11:02:51'),
(12, '127.0.0.1', '2016-02-23 11:02:57'),
(13, '127.0.0.1', '2016-02-23 11:03:38'),
(14, '127.0.0.1', '2016-02-23 11:05:07'),
(15, '127.0.0.1', '2016-02-23 11:17:44'),
(16, '127.0.0.1', '2016-02-23 11:17:51'),
(17, '127.0.0.1', '2016-02-23 11:18:10'),
(18, '127.0.0.1', '2016-02-23 11:27:34'),
(19, '127.0.0.1', '2016-02-23 11:28:43'),
(20, '127.0.0.1', '2016-02-23 11:29:52'),
(21, '127.0.0.1', '2016-02-23 11:42:10'),
(22, '127.0.0.1', '2016-02-23 11:42:17'),
(23, '127.0.0.1', '2016-02-23 11:42:53'),
(24, '127.0.0.1', '2016-02-23 11:42:59'),
(25, '127.0.0.1', '2016-02-23 11:43:18'),
(26, '127.0.0.1', '2016-02-23 11:44:10'),
(27, '127.0.0.1', '2016-02-23 11:44:37'),
(28, '127.0.0.1', '2016-02-23 11:51:57'),
(29, '127.0.0.1', '2016-02-23 11:52:30'),
(30, '127.0.0.1', '2016-02-23 11:53:18'),
(31, '127.0.0.1', '2016-02-23 11:53:35'),
(32, '127.0.0.1', '2016-02-23 11:53:55'),
(33, '127.0.0.1', '2016-02-23 11:54:11'),
(34, '127.0.0.1', '2016-02-23 11:57:44'),
(35, '127.0.0.1', '2016-02-23 11:57:59'),
(36, '127.0.0.1', '2016-02-23 11:58:14'),
(37, '127.0.0.1', '2016-02-23 11:59:10'),
(38, '127.0.0.1', '2016-02-23 11:59:13'),
(39, '127.0.0.1', '2016-02-24 12:00:21'),
(40, '127.0.0.1', '2016-02-24 12:02:32'),
(41, '127.0.0.1', '2016-02-24 12:05:22'),
(42, '127.0.0.1', '2016-02-24 12:06:05'),
(43, '127.0.0.1', '2016-02-24 12:06:56'),
(44, '127.0.0.1', '2016-02-24 12:07:20'),
(45, '127.0.0.1', '2016-02-24 12:07:23'),
(46, '127.0.0.1', '2016-02-24 12:08:19'),
(47, '127.0.0.1', '2016-02-24 12:09:25'),
(48, '127.0.0.1', '2016-02-24 12:13:08'),
(49, '127.0.0.1', '2016-02-24 12:35:42'),
(50, '127.0.0.1', '2016-02-24 12:45:57'),
(51, '127.0.0.1', '2016-02-24 12:46:19'),
(52, '127.0.0.1', '2016-02-24 12:49:05'),
(53, '127.0.0.1', '2016-02-24 12:52:36'),
(54, '127.0.0.1', '2016-02-24 12:54:07'),
(55, '127.0.0.1', '2016-02-24 12:54:25'),
(56, '127.0.0.1', '2016-02-24 12:54:48'),
(57, '127.0.0.1', '2016-02-24 12:55:07'),
(58, '127.0.0.1', '2016-02-24 12:55:34'),
(59, '127.0.0.1', '2016-02-24 12:59:29'),
(60, '127.0.0.1', '2016-02-24 12:59:55'),
(61, '127.0.0.1', '2016-02-24 01:00:01'),
(62, '127.0.0.1', '2016-02-24 01:02:38'),
(63, '127.0.0.1', '2016-02-24 01:03:07'),
(64, '127.0.0.1', '2016-02-24 01:04:12'),
(65, '127.0.0.1', '2016-02-24 01:05:08'),
(66, '127.0.0.1', '2016-02-24 01:09:16'),
(67, '127.0.0.1', '2016-02-24 01:09:19'),
(68, '127.0.0.1', '2016-02-24 01:09:30'),
(69, '127.0.0.1', '2016-02-24 01:11:38'),
(70, '127.0.0.1', '2016-02-24 01:13:09'),
(71, '127.0.0.1', '2016-02-24 01:13:32'),
(72, '127.0.0.1', '2016-02-24 01:13:59'),
(73, '127.0.0.1', '2016-02-24 01:14:01'),
(74, '127.0.0.1', '2016-02-24 01:14:28'),
(75, '127.0.0.1', '2016-02-24 01:15:02'),
(76, '127.0.0.1', '2016-02-24 01:15:48'),
(77, '127.0.0.1', '2016-02-24 01:16:17'),
(78, '127.0.0.1', '2016-02-24 01:16:20'),
(79, '127.0.0.1', '2016-02-24 01:16:53'),
(80, '127.0.0.1', '2016-02-24 01:16:55'),
(81, '127.0.0.1', '2016-02-24 01:18:03'),
(82, '127.0.0.1', '2016-02-24 01:18:21'),
(83, '127.0.0.1', '2016-02-24 01:18:50'),
(84, '127.0.0.1', '2016-02-24 01:19:10'),
(85, '127.0.0.1', '2016-02-24 01:20:52'),
(86, '127.0.0.1', '2016-02-24 01:22:42'),
(87, '127.0.0.1', '2016-02-24 01:22:56'),
(88, '127.0.0.1', '2016-02-24 01:25:35'),
(89, '127.0.0.1', '2016-02-24 01:26:04'),
(90, '127.0.0.1', '2016-02-24 01:26:06'),
(91, '127.0.0.1', '2016-02-24 01:26:14'),
(92, '127.0.0.1', '2016-02-24 01:26:16'),
(93, '127.0.0.1', '2016-02-24 01:26:31'),
(94, '127.0.0.1', '2016-02-24 01:26:32'),
(95, '127.0.0.1', '2016-02-24 01:26:39'),
(96, '127.0.0.1', '2016-02-24 01:26:55'),
(97, '127.0.0.1', '2016-02-24 01:29:19'),
(98, '127.0.0.1', '2016-02-24 01:29:24'),
(99, '127.0.0.1', '2016-02-24 01:29:47'),
(100, '127.0.0.1', '2016-02-24 01:29:47'),
(101, '127.0.0.1', '2016-02-24 01:31:43'),
(102, '127.0.0.1', '2016-02-24 01:31:49'),
(103, '127.0.0.1', '2016-02-24 01:32:41'),
(104, '127.0.0.1', '2016-02-24 01:32:55'),
(105, '127.0.0.1', '2016-02-24 01:33:35'),
(106, '127.0.0.1', '2016-02-24 01:33:43'),
(107, '127.0.0.1', '2016-02-24 01:33:51'),
(108, '127.0.0.1', '2016-02-24 01:34:53'),
(109, '127.0.0.1', '2016-02-24 01:35:00'),
(110, '127.0.0.1', '2016-02-24 01:35:31'),
(111, '127.0.0.1', '2016-02-24 01:35:56'),
(112, '127.0.0.1', '2016-02-24 01:36:07'),
(113, '127.0.0.1', '2016-02-24 01:37:25'),
(114, '127.0.0.1', '2016-02-24 01:38:02'),
(115, '127.0.0.1', '2016-02-24 01:38:06'),
(116, '127.0.0.1', '2016-02-24 01:38:15'),
(117, '127.0.0.1', '2016-02-24 01:38:32'),
(118, '127.0.0.1', '2016-02-24 01:39:25'),
(119, '127.0.0.1', '2016-02-24 01:39:46'),
(120, '::1', '2016-02-24 10:40:50'),
(121, '::1', '2016-02-24 10:41:19'),
(122, '::1', '2016-02-24 10:41:45'),
(123, '::1', '2016-02-24 10:41:57'),
(124, '::1', '2016-02-24 10:49:13'),
(125, '::1', '2016-02-24 10:50:32'),
(126, '::1', '2016-02-24 10:51:11'),
(127, '::1', '2016-02-24 10:51:17'),
(128, '::1', '2016-02-24 10:51:40'),
(129, '::1', '2016-02-24 10:57:44'),
(130, '::1', '2016-02-24 10:58:29'),
(131, '::1', '2016-02-24 12:14:55'),
(132, '::1', '2016-02-24 12:15:34'),
(133, '::1', '2016-02-24 12:18:26'),
(134, '::1', '2016-02-24 12:33:45'),
(135, '::1', '2016-02-24 12:37:44'),
(136, '::1', '2016-02-24 12:37:55'),
(137, '::1', '2016-02-24 12:38:03'),
(138, '::1', '2016-02-24 12:40:39'),
(139, '::1', '2016-02-24 12:41:44'),
(140, '::1', '2016-02-24 12:41:49'),
(141, '::1', '2016-02-24 12:55:04'),
(142, '::1', '2016-02-24 12:55:42'),
(143, '::1', '2016-02-24 02:31:59'),
(144, '::1', '2016-02-24 02:39:00'),
(145, '::1', '2016-02-24 02:41:16'),
(146, '::1', '2016-02-24 02:43:14'),
(147, '::1', '2016-02-24 02:43:49'),
(148, '::1', '2016-02-24 02:43:53'),
(149, '::1', '2016-02-24 02:44:08'),
(150, '::1', '2016-02-24 02:45:23'),
(151, '::1', '2016-02-24 02:45:32'),
(152, '::1', '2016-02-24 02:45:35'),
(153, '::1', '2016-02-24 02:50:34'),
(154, '::1', '2016-02-24 02:50:50'),
(155, '::1', '2016-02-24 02:50:54'),
(156, '::1', '2016-02-24 02:53:06'),
(157, '::1', '2016-02-24 02:54:10'),
(158, '::1', '2016-02-24 02:54:13'),
(159, '::1', '2016-02-24 02:54:21'),
(160, '::1', '2016-02-24 02:54:24'),
(161, '::1', '2016-02-24 02:54:26'),
(162, '::1', '2016-02-24 02:54:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_fees`
--
ALTER TABLE `db_fees`
 ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `db_fees_setting`
--
ALTER TABLE `db_fees_setting`
 ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `db_student`
--
ALTER TABLE `db_student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `db_student_attendance`
--
ALTER TABLE `db_student_attendance`
 ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `list_class`
--
ALTER TABLE `list_class`
 ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `list_occupation`
--
ALTER TABLE `list_occupation`
 ADD PRIMARY KEY (`occupation_id`);

--
-- Indexes for table `list_session`
--
ALTER TABLE `list_session`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `list_sex`
--
ALTER TABLE `list_sex`
 ADD PRIMARY KEY (`sex_id`);

--
-- Indexes for table `list_situationtype`
--
ALTER TABLE `list_situationtype`
 ADD PRIMARY KEY (`situationtype_id`);

--
-- Indexes for table `pw_user`
--
ALTER TABLE `pw_user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
 ADD PRIMARY KEY (`views_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_fees`
--
ALTER TABLE `db_fees`
MODIFY `fees_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `db_fees_setting`
--
ALTER TABLE `db_fees_setting`
MODIFY `fees_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `db_student`
--
ALTER TABLE `db_student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `db_student_attendance`
--
ALTER TABLE `db_student_attendance`
MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `list_class`
--
ALTER TABLE `list_class`
MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `list_occupation`
--
ALTER TABLE `list_occupation`
MODIFY `occupation_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `list_session`
--
ALTER TABLE `list_session`
MODIFY `session_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `list_sex`
--
ALTER TABLE `list_sex`
MODIFY `sex_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `list_situationtype`
--
ALTER TABLE `list_situationtype`
MODIFY `situationtype_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pw_user`
--
ALTER TABLE `pw_user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
MODIFY `views_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=163;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
