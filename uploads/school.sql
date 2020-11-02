-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 05:27 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Ruth Mwende', 'ruth@machakosboys.ac.ke', 'admin123', '1'),
(2, 'Hesbon Mbai', 'admin@machakos.ac.ke', 'pass123', '1'),
(7, 'Jacob', 'myk2030@gmail.com', '123456', '2'),
(8, 'Danielkatumbi', 'kinoo@meeza.com', 'daniel', '2'),
(9, 'Beryl Mawia', 'beryl@mawia.com', '541677', '2'),
(10, 'Jonathan Kitenge', 'jonathan@gmail.com', 'jonathan', '3');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `discipline`
--

CREATE TABLE `discipline` (
  `id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `discipline_type` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(32) NOT NULL,
  `max-score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam_id`, `exam_name`, `max-score`) VALUES
(1, 112, 'Opener', 30),
(2, 114, 'Midterm', 30),
(3, 211, 'Endterm', 70);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `grade_point` longtext NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`) VALUES
(1, 'A', '12', 80, 100, 'Excellent'),
(2, 'A-', '11', 75, 79, 'Very Good'),
(3, 'B+', '10', 70, 74, 'Good'),
(4, 'B', '9', 65, 69, 'Good'),
(5, 'B-', '8', 60, 64, 'Good'),
(6, 'C+', '7', 55, 59, 'Good'),
(7, 'C', '6', 50, 54, 'Average'),
(8, 'C-', '5', 45, 49, 'Average'),
(9, 'D+', '4', 40, 44, 'Average'),
(10, 'D', '3', 35, 39, 'Weak'),
(11, 'D-', '2', 30, 34, 'Weak'),
(12, 'E', '1', 0, 29, 'Poor');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT '0',
  `mark_total` int(11) NOT NULL DEFAULT '100',
  `attendance` int(11) NOT NULL DEFAULT '0',
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `relationship` varchar(32) NOT NULL,
  `std_admno` int(11) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `rs_id` int(11) NOT NULL,
  `adm_no` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`rs_id`, `adm_no`, `year`, `term_id`, `exam_type_id`, `subject_id`, `score`) VALUES
(1, 400, 2017, 1, 112, 1, 23),
(2, 330, 2017, 1, 112, 1, 45),
(3, 400, 2017, 1, 112, 2, 22),
(4, 330, 2017, 1, 112, 2, 23),
(5, 400, 2017, 1, 112, 3, 26),
(6, 330, 2017, 1, 112, 3, 18),
(7, 400, 2017, 1, 112, 4, 67),
(8, 330, 2017, 1, 112, 4, 67),
(9, 400, 2017, 1, 112, 5, 44),
(10, 330, 2017, 1, 112, 5, 45),
(11, 400, 2017, 1, 112, 6, 24),
(12, 330, 2017, 1, 112, 6, 28),
(13, 400, 2017, 1, 112, 7, 16),
(14, 330, 2017, 1, 112, 7, 18),
(15, 233, 2017, 1, 112, 6, 67),
(16, 233, 2017, 1, 112, 1, 34),
(17, 233, 2017, 1, 112, 5, 34);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `adm_no` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `101` int(11) NOT NULL,
  `102` int(11) NOT NULL,
  `103` int(11) NOT NULL,
  `104` int(11) NOT NULL,
  `105` int(11) NOT NULL,
  `106` int(11) NOT NULL,
  `107` int(11) NOT NULL,
  `108` int(11) NOT NULL,
  `109` int(11) NOT NULL,
  `110` int(11) NOT NULL,
  `111` int(11) NOT NULL,
  `112` int(11) NOT NULL,
  `113` int(11) NOT NULL,
  `114` int(11) NOT NULL,
  `115` int(11) NOT NULL,
  `116` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `institute_name` longtext NOT NULL,
  `address` longtext NOT NULL,
  `phone_number` longtext NOT NULL,
  `page_title` longtext NOT NULL,
  `page_meta_tag` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`institute_name`, `address`, `phone_number`, `page_title`, `page_meta_tag`) VALUES
('Machakos Boys School', 'Machakos', '044- 2410240', 'Machakos Boys School', '0');

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `stream_id` int(11) NOT NULL,
  `stream_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`stream_id`, `stream_name`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `adm_no` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `doa` date NOT NULL,
  `gender` varchar(32) NOT NULL,
  `religion` varchar(32) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `kcpe_marks` int(50) NOT NULL,
  `kcpe_pos` int(50) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `parent_contact` varchar(100) NOT NULL,
  `disability` varchar(100) NOT NULL,
  `special_condition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `adm_no`, `fname`, `lname`, `email`, `dob`, `doa`, `gender`, `religion`, `class_id`, `stream_id`, `kcpe_marks`, `kcpe_pos`, `parent_name`, `parent_contact`, `disability`, `special_condition`) VALUES
(1, 400, 'Agnes', 'Mwanza', '', '1995-12-12', '2013-01-28', 'female', 'Islam', 4, 1, 0, 0, 'Mwanza Kimanzi', '0737373716', 'None', 'None                                                 '),
(2, 330, 'Janet', 'Jackson', '', '1996-12-12', '2014-02-05', 'female', 'Christian', 1, 1, 0, 0, '28131018', 'janet@yahoo.com', 'None', '                                None'),
(3, 455, 'Jacob', 'Mwinzi', '', '1994-12-12', '2012-04-04', 'male', 'Christian', 2, 2, 0, 0, '28131016', 'jacob@yahoo.com', '', ''),
(4, 457, 'John', 'Doe', '', '1990-12-12', '2013-04-04', 'male', 'Christian', 2, 2, 0, 0, '28131014', 'john@yahoo.com', '', ''),
(6, 278, 'James', 'Kimanzi', '', '1993-06-28', '2013-03-12', 'male', 'Christian', 3, 2, 0, 0, 'Vaulo Mwikya', '0737373712', 'None', 'None'),
(7, 233, 'Sammy', 'Muinde', '', '1991-06-26', '2013-02-12', 'male', 'Islam', 1, 1, 278, 10, 'Paul Kathenge', '0737373713', 'Other', '                              None.   \r\n                            '),
(8, 443, 'Daniel', 'Akoto', '', '1993-03-28', '2015-02-12', 'male', 'Christian', 4, 2, 0, 0, 'Paul Umbisa', '0737373714', 'Physical', '                                                Does not  Eat Bread. \r\n                                                            '),
(9, 333, 'chandy', 'david', '', '1990-12-12', '2014-05-05', 'male', 'Christian', 2, 1, 299, 4, 'chandy david', '+254739186987', 'Physical', '                 \r\n            Doesnt eat ugali'),
(10, 411, 'Jonathan', 'Kitenge', 'jonathan@gmail.com', '1995-10-10', '2015-02-12', 'male', 'Christian', 3, 1, 309, 3, 'chandy david', '+254739186987', 'None', '\r\n            None');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `subject_name` varchar(32) NOT NULL,
  `sub_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `sub_group_id`) VALUES
(1, 101, 'ENGLISH', 1),
(2, 102, 'KISWAHILI', 1),
(3, 103, 'MATHEMATICS', 1),
(4, 104, 'CHEMISTRY', 2),
(5, 105, 'BIOLOGY', 2),
(6, 106, 'PHYSICS', 2),
(7, 107, 'GEOGRAPHY', 3),
(8, 108, 'HISTORY', 3),
(9, 109, 'CRE', 3),
(10, 110, 'AGRICULTURE', 4),
(11, 111, 'BUSINESS STUDIES', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subject_group`
--

CREATE TABLE `subject_group` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_group`
--

INSERT INTO `subject_group` (`id`, `group_id`, `group_name`) VALUES
(1, 1, 'COMPULSORY'),
(2, 2, 'SCIENCES'),
(3, 3, 'HUMANITIES'),
(4, 4, 'TECHNICALS');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `initials` varchar(50) NOT NULL,
  `tsc` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(32) NOT NULL,
  `religion` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `id_no`, `fname`, `lname`, `initials`, `tsc`, `dob`, `gender`, `religion`, `phone`, `email`) VALUES
(1, 28156787, 'Reynold', 'Muthui', 'RM', '444678', '1988-12-12', 'male', 'Islam', '0702567897', 'john@yahoo.com'),
(2, 13455666, 'Jacob', 'Kalinda', 'JK', 'TSC890', '2017-05-03', 'male', 'Christian', '0733456455', 'myk2030@gmail.com'),
(3, 13455670, 'Daniel', 'katumbi', 'DK', 'TSC865', '1976-06-12', 'male', 'Christian', '0739186987', 'kinoo@meeza.com'),
(4, 30117388, 'Beryl', 'Mawia', 'BM', 'TSC861', '1994-11-12', 'female', 'Christian', '0756789987', 'beryl@mawia.com');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `term_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term_id`, `term_name`) VALUES
(1, 1, 'Term 1'),
(2, 2, 'Term 2'),
(3, 3, 'Term 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`stream_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_group`
--
ALTER TABLE `subject_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `stream_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subject_group`
--
ALTER TABLE `subject_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
