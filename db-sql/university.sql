-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 11:09 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` varchar(20) NOT NULL,
  `bookISBN` varchar(20) NOT NULL,
  `bookYear` int(5) NOT NULL,
  `bookTitle` varchar(100) NOT NULL,
  `bookPublisher` varchar(100) NOT NULL,
  `profID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `bookISBN`, `bookYear`, `bookTitle`, `bookPublisher`, `profID`) VALUES
('1', '5568545', 2017, 'Software Engineering', 'Sarasavi', NULL),
('2', '5568546', 2016, 'Data Structures', 'Gamage', NULL),
('3', '5568549', 2014, 'Programming in C', 'Gunasena', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companysession`
--

CREATE TABLE `companysession` (
  `comSesName` varchar(100) NOT NULL,
  `sesYear` int(5) NOT NULL,
  `sesSem` int(5) NOT NULL,
  `comSesAssesment` varchar(50) NOT NULL,
  `comSesManager` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companysession`
--

INSERT INTO `companysession` (`comSesName`, `sesYear`, `sesSem`, `comSesAssesment`, `comSesManager`) VALUES
('1', 2018, 1, '52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `company_sess_manager`
--

CREATE TABLE `company_sess_manager` (
  `empID` varchar(20) NOT NULL,
  `empFName` varchar(50) NOT NULL,
  `empLName` varchar(50) NOT NULL,
  `sesYear` int(5) DEFAULT NULL,
  `sesSem` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_sess_manager`
--

INSERT INTO `company_sess_manager` (`empID`, `empFName`, `empLName`, `sesYear`, `sesSem`) VALUES
('1', 'Kamal', 'Gunasena', 2018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` varchar(20) NOT NULL,
  `depID` varchar(20) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseCredits` int(3) NOT NULL,
  `courseHours` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `depID`, `courseName`, `courseCredits`, `courseHours`) VALUES
('1', '1', 'CSS', 34, 56);

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `courseID` varchar(20) NOT NULL,
  `secSem` int(5) NOT NULL,
  `secYear` int(5) NOT NULL,
  `secNo` int(5) NOT NULL,
  `secName` varchar(50) NOT NULL,
  `secClass` varchar(20) NOT NULL,
  `secClassSize` int(5) NOT NULL,
  `secTime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `depID` varchar(20) NOT NULL,
  `depName` varchar(100) NOT NULL,
  `depPhone` varchar(20) NOT NULL,
  `profID` varchar(20) DEFAULT NULL,
  `locationID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`depID`, `depName`, `depPhone`, `profID`, `locationID`) VALUES
('1', 'ABE', '0854565257', '5', NULL),
('45', 'sadsad', '5465', '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `graduate`
--

CREATE TABLE `graduate` (
  `stdID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `labsession`
--

CREATE TABLE `labsession` (
  `courseID` varchar(20) NOT NULL,
  `secSem` int(5) NOT NULL,
  `secYear` int(5) NOT NULL,
  `secNo` int(5) NOT NULL,
  `labSessionNo` int(5) NOT NULL,
  `labTopic` varchar(100) DEFAULT NULL,
  `labTime` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `stdID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` varchar(20) NOT NULL,
  `locStreet` varchar(50) NOT NULL,
  `locStreeNo` varchar(10) NOT NULL,
  `locCity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `locStreet`, `locStreeNo`, `locCity`) VALUES
('', '', '', ''),
('5', 'no 08, Colmbo road', 'Colmbo roa', 'Kurunegala');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `profID` varchar(20) NOT NULL,
  `profFName` varchar(50) NOT NULL,
  `profLName` varchar(50) NOT NULL,
  `profContact` varchar(20) NOT NULL,
  `profEmail` varchar(50) DEFAULT NULL,
  `depID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`profID`, `profFName`, `profLName`, `profContact`, `profEmail`, `depID`) VALUES
('5', 'Malaka ', 'Perera', '0758565254', 'abc@prof.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stdID` varchar(20) NOT NULL,
  `stdFName` varchar(50) DEFAULT NULL,
  `stdLName` varchar(50) DEFAULT NULL,
  `stdStreetNo` varchar(20) DEFAULT NULL,
  `stdStreet` varchar(20) DEFAULT NULL,
  `stdCity` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stdID`, `stdFName`, `stdLName`, `stdStreetNo`, `stdStreet`, `stdCity`) VALUES
('1', 'Kamal1', 'Perera', 'No 02', 'Samagi Mawatha', 'Colombo 03'),
('2', 'Nimal', 'Gunarathne', 'No 10', 'Dharamapala Mawatha', 'Borella');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_section`
--

CREATE TABLE `student_course_section` (
  `courseID` varchar(20) NOT NULL,
  `secSem` int(5) NOT NULL,
  `secYear` int(5) NOT NULL,
  `secNo` int(5) NOT NULL,
  `stdID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stud_book_borrow`
--

CREATE TABLE `stud_book_borrow` (
  `stdID` varchar(20) NOT NULL,
  `bookID` varchar(20) NOT NULL,
  `issuedDate` varchar(50) DEFAULT NULL,
  `returnedDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_book_borrow`
--

INSERT INTO `stud_book_borrow` (`stdID`, `bookID`, `issuedDate`, `returnedDate`) VALUES
('1', '1', '2018/06/05', '2018/06/31'),
('2', '2', '2018/06/01', '2018/06/05');

-- --------------------------------------------------------

--
-- Table structure for table `teachingbooks`
--

CREATE TABLE `teachingbooks` (
  `profID` varchar(20) NOT NULL,
  `courseID` varchar(20) NOT NULL,
  `secSem` int(5) NOT NULL,
  `secYear` int(5) NOT NULL,
  `secNo` int(5) NOT NULL,
  `bookID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `undergraduate`
--

CREATE TABLE `undergraduate` (
  `stdID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `undergraduatecompanysessions`
--

CREATE TABLE `undergraduatecompanysessions` (
  `stdID` varchar(20) NOT NULL,
  `sesYear` int(5) NOT NULL,
  `sesSem` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `type` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `type`, `user_id`) VALUES
('admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1, 1),
('librarian1', '265e0a0c036c151896b94453b7aa2123', 3, 3),
('student1', '5e5545d38a68148a2d5bd5ec9a89e327', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `profID` (`profID`);

--
-- Indexes for table `companysession`
--
ALTER TABLE `companysession`
  ADD PRIMARY KEY (`sesYear`,`sesSem`),
  ADD KEY `sesSem` (`sesSem`);

--
-- Indexes for table `company_sess_manager`
--
ALTER TABLE `company_sess_manager`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `sesYear` (`sesYear`),
  ADD KEY `sesSem` (`sesSem`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`,`depID`),
  ADD KEY `depID` (`depID`);

--
-- Indexes for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD PRIMARY KEY (`courseID`,`secSem`,`secYear`,`secNo`),
  ADD KEY `secSem` (`secSem`),
  ADD KEY `secYear` (`secYear`),
  ADD KEY `secNo` (`secNo`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`depID`),
  ADD KEY `locationID` (`locationID`),
  ADD KEY `profID` (`profID`);

--
-- Indexes for table `graduate`
--
ALTER TABLE `graduate`
  ADD PRIMARY KEY (`stdID`);

--
-- Indexes for table `labsession`
--
ALTER TABLE `labsession`
  ADD PRIMARY KEY (`courseID`,`secSem`,`secYear`,`secNo`,`labSessionNo`),
  ADD KEY `secSem` (`secSem`),
  ADD KEY `secYear` (`secYear`),
  ADD KEY `secNo` (`secNo`),
  ADD KEY `stdID` (`stdID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`profID`),
  ADD KEY `depID` (`depID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stdID`);

--
-- Indexes for table `student_course_section`
--
ALTER TABLE `student_course_section`
  ADD PRIMARY KEY (`courseID`,`secSem`,`secYear`,`secNo`,`stdID`),
  ADD KEY `secSem` (`secSem`),
  ADD KEY `secYear` (`secYear`),
  ADD KEY `secNo` (`secNo`),
  ADD KEY `stdID` (`stdID`);

--
-- Indexes for table `stud_book_borrow`
--
ALTER TABLE `stud_book_borrow`
  ADD PRIMARY KEY (`stdID`,`bookID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `teachingbooks`
--
ALTER TABLE `teachingbooks`
  ADD PRIMARY KEY (`profID`,`courseID`,`secSem`,`secYear`,`secNo`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `secSem` (`secSem`),
  ADD KEY `secYear` (`secYear`),
  ADD KEY `secNo` (`secNo`);

--
-- Indexes for table `undergraduate`
--
ALTER TABLE `undergraduate`
  ADD PRIMARY KEY (`stdID`);

--
-- Indexes for table `undergraduatecompanysessions`
--
ALTER TABLE `undergraduatecompanysessions`
  ADD PRIMARY KEY (`stdID`,`sesYear`,`sesSem`),
  ADD KEY `sesYear` (`sesYear`),
  ADD KEY `sesSem` (`sesSem`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`profID`) REFERENCES `professors` (`profID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_sess_manager`
--
ALTER TABLE `company_sess_manager`
  ADD CONSTRAINT `company_sess_manager_ibfk_1` FOREIGN KEY (`sesYear`) REFERENCES `companysession` (`sesYear`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `company_sess_manager_ibfk_2` FOREIGN KEY (`sesSem`) REFERENCES `companysession` (`sesSem`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`depID`) REFERENCES `departments` (`depID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD CONSTRAINT `course_sections_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `departments_ibfk_2` FOREIGN KEY (`profID`) REFERENCES `professors` (`profID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `graduate`
--
ALTER TABLE `graduate`
  ADD CONSTRAINT `graduate_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `students` (`stdID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `labsession`
--
ALTER TABLE `labsession`
  ADD CONSTRAINT `labsession_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course_sections` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labsession_ibfk_2` FOREIGN KEY (`secSem`) REFERENCES `course_sections` (`secSem`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labsession_ibfk_3` FOREIGN KEY (`secYear`) REFERENCES `course_sections` (`secYear`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labsession_ibfk_4` FOREIGN KEY (`secNo`) REFERENCES `course_sections` (`secNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labsession_ibfk_5` FOREIGN KEY (`stdID`) REFERENCES `graduate` (`stdID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `professors_ibfk_1` FOREIGN KEY (`depID`) REFERENCES `departments` (`depID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student_course_section`
--
ALTER TABLE `student_course_section`
  ADD CONSTRAINT `student_course_section_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course_sections` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_section_ibfk_2` FOREIGN KEY (`secSem`) REFERENCES `course_sections` (`secSem`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_section_ibfk_3` FOREIGN KEY (`secYear`) REFERENCES `course_sections` (`secYear`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_section_ibfk_4` FOREIGN KEY (`secNo`) REFERENCES `course_sections` (`secNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_section_ibfk_5` FOREIGN KEY (`stdID`) REFERENCES `students` (`stdID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_book_borrow`
--
ALTER TABLE `stud_book_borrow`
  ADD CONSTRAINT `stud_book_borrow_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `students` (`stdID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stud_book_borrow_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachingbooks`
--
ALTER TABLE `teachingbooks`
  ADD CONSTRAINT `teachingbooks_ibfk_1` FOREIGN KEY (`profID`) REFERENCES `professors` (`profID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachingbooks_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course_sections` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachingbooks_ibfk_3` FOREIGN KEY (`secSem`) REFERENCES `course_sections` (`secSem`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachingbooks_ibfk_4` FOREIGN KEY (`secYear`) REFERENCES `course_sections` (`secYear`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachingbooks_ibfk_5` FOREIGN KEY (`secNo`) REFERENCES `course_sections` (`secNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `undergraduate`
--
ALTER TABLE `undergraduate`
  ADD CONSTRAINT `undergraduate_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `students` (`stdID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `undergraduatecompanysessions`
--
ALTER TABLE `undergraduatecompanysessions`
  ADD CONSTRAINT `undergraduatecompanysessions_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `undergraduate` (`stdID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `undergraduatecompanysessions_ibfk_2` FOREIGN KEY (`sesYear`) REFERENCES `companysession` (`sesYear`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `undergraduatecompanysessions_ibfk_3` FOREIGN KEY (`sesSem`) REFERENCES `companysession` (`sesSem`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
