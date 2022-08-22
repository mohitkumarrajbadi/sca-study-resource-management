-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 12:58 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scaresource`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `FIRSTNAME` varchar(20) NOT NULL,
  `LASTNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `MOBNUMBER` varchar(10) NOT NULL,
  `IMAGELOCATION` varchar(100) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `MOBNUMBER`, `IMAGELOCATION`, `PASSWORD`) VALUES
(2, 'Mohit Kumar', 'Raj Badi', 'mohitkumarrajbadi@gmail.com', '7077000569', 'imageuploads/admin/adminadminadmin.png', 'mohit'),
(3, 'admin', 'sca', 'mohitkumarrajbadi@gmail.com', '1234567890', 'imageuploads/admin/adminadmin.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `examfile`
--

CREATE TABLE `examfile` (
  `EID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `EXAMTITLE` varchar(7) NOT NULL,
  `FILELOCATION` varchar(100) NOT NULL,
  `UPDATEDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examfile`
--

INSERT INTO `examfile` (`EID`, `SID`, `YEAR`, `EXAMTITLE`, `FILELOCATION`, `UPDATEDATE`, `AID`) VALUES
(3, 5, 2017, 'Mid Sem', 'files/examfiles/8851B677-2D5A-4B71-849D-77C46148311B.pdf', '2020-05-07 06:55:49', 2),
(4, 5, 2018, 'Mid Sem', 'files/examfiles/ICT_SECTION_B_3[1].pdf', '2020-05-07 06:57:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FID` int(11) NOT NULL,
  `FIRSTNAME` varchar(20) NOT NULL,
  `LASTNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `MOBNUMBER` varchar(10) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `IMAGELOCATION` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FID`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `MOBNUMBER`, `PASSWORD`, `IMAGELOCATION`) VALUES
(3, 'Mohit Kumar', 'Raj Badi', 'mohitkumarrajbadi@gmail.com', '7077000569', 'mohit', 'imageuploads/faculty/facultyMOHITblue.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pdffile`
--

CREATE TABLE `pdffile` (
  `FLID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `FID` int(11) NOT NULL,
  `FILETITLE` varchar(30) NOT NULL,
  `FILELOCATION` varchar(100) NOT NULL,
  `UPDATEDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdffile`
--

INSERT INTO `pdffile` (`FLID`, `SID`, `FID`, `FILETITLE`, `FILELOCATION`, `UPDATEDATE`) VALUES
(10, 5, 3, 'Programming Basic 1', 'files/studyfiles/Miniproject.pptx', '2020-04-16 15:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ROLLNO` int(7) NOT NULL,
  `FIRSTNAME` varchar(20) NOT NULL,
  `LASTNAME` varchar(20) NOT NULL,
  `IMAGELOCATION` varchar(100) NOT NULL,
  `BRANCH` varchar(3) NOT NULL,
  `SEMESTER` int(1) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `MOBNUMBER` varchar(10) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `PERMISSION` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ROLLNO`, `FIRSTNAME`, `LASTNAME`, `IMAGELOCATION`, `BRANCH`, `SEMESTER`, `EMAIL`, `MOBNUMBER`, `PASSWORD`, `PERMISSION`) VALUES
(1100154, 'Lohit', 'Tangudu', 'imageuploads/student/studentig-obama-portrait-800x480.jpg', 'MSC', 1, 'lohittangudu@gmail.com', '9435871215', '12345', 0),
(1234567, 'John', 'Doe', 'imageuploads/student/studentNewDoc2018-08-13.jpg', 'MSC', 1, 'johndoe@gmail.com', '9435871215', '12345', 2),
(1775018, 'Mohit Kumar', 'Raj Badi', 'imageuploads/student/studentMOHITblue.jpg', 'BCA', 6, 'mohitkumarrajbadi@gmail.com', '7077000569', 'mohit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SID` int(11) NOT NULL,
  `SUBJCODE` varchar(7) NOT NULL,
  `FID` int(11) NOT NULL,
  `BRANCH` varchar(3) NOT NULL,
  `SEMESTER` int(1) NOT NULL,
  `SUBJNAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SID`, `SUBJCODE`, `FID`, `BRANCH`, `SEMESTER`, `SUBJNAME`) VALUES
(5, 'BCA 401', 3, 'BCA', 3, 'Programming Basic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `examfile`
--
ALTER TABLE `examfile`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `SID` (`SID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `pdffile`
--
ALTER TABLE `pdffile`
  ADD PRIMARY KEY (`FLID`),
  ADD KEY `SID` (`SID`),
  ADD KEY `FID` (`FID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ROLLNO`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `FID` (`FID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `examfile`
--
ALTER TABLE `examfile`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pdffile`
--
ALTER TABLE `pdffile`
  MODIFY `FLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `examfile`
--
ALTER TABLE `examfile`
  ADD CONSTRAINT `AID` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`),
  ADD CONSTRAINT `examfile_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `subject` (`SID`);

--
-- Constraints for table `pdffile`
--
ALTER TABLE `pdffile`
  ADD CONSTRAINT `pdffile_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `subject` (`SID`),
  ADD CONSTRAINT `pdffile_ibfk_2` FOREIGN KEY (`FID`) REFERENCES `faculty` (`FID`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`FID`) REFERENCES `faculty` (`FID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
