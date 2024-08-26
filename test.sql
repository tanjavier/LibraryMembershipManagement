-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 11:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aID` int(3) NOT NULL,
  `aName` varchar(30) NOT NULL,
  `aEmail` varchar(60) NOT NULL,
  `aPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aID`, `aName`, `aEmail`, `aPassword`) VALUES
(1, 'Tan Javier', 'admin@test.com', 'adminadmin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bID` int(3) NOT NULL,
  `bName` varchar(200) NOT NULL,
  `bCategory` varchar(30) NOT NULL,
  `bAuthor` varchar(100) NOT NULL,
  `ISBN` int(15) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bID`, `bName`, `bCategory`, `bAuthor`, `ISBN`, `RegDate`) VALUES
(3, 'Science', 'Education', 'Carla Gaines', 1111, '2021-06-18 10:06:53'),
(4, 'History', 'Education', 'Monica Massey', 2222, '2021-06-18 10:26:06'),
(5, 'English', 'Education', 'Adrian Zimmerman', 3333, '2021-06-18 10:31:04'),
(6, 'Mathematics', 'Education', 'Susan Giles', 4444, '2021-06-18 10:35:23'),
(16, 'Malay', 'Language', 'Aysha Mathis', 5555, '2021-07-03 03:47:07'),
(17, 'Moral', 'Education', 'Bonnie Jennings', 6666, '2021-07-03 03:47:07'),
(18, 'Islamic', 'Education', 'Tianna Dorsey', 7777, '2021-07-03 03:47:07'),
(19, 'Chinese', 'Language', 'Fleur Chandler', 8888, '2021-07-03 03:47:07'),
(20, 'Tamil', 'Language', 'Imogen Robinson', 9999, '2021-07-03 03:47:07'),
(21, 'French', 'Language', 'Sienna Zuniga', 9096, '2021-07-03 03:47:07'),
(22, 'Germen', 'Language', 'Kimberley Petty', 5374, '2021-07-03 03:47:07'),
(23, 'Japanese', 'Langauge', 'Elizabeth Donaldson', 2323, '2021-07-03 03:47:07'),
(24, 'Chemistry', 'Education', 'Priya Haines', 5463, '2021-07-03 03:47:07'),
(25, 'Biology', 'Education', 'Claudia Glenn', 7425, '2021-07-03 03:47:07'),
(26, 'Accountiung', 'Education', 'Lois Haas', 3459, '2021-07-03 03:47:07'),
(27, 'Commerce', 'Education', 'Sophia Riggs', 3336, '2021-07-03 03:47:07'),
(28, 'Computer Graphics', 'Education', 'Betty Alexander', 1115, '2021-07-03 03:47:07'),
(29, 'Automotive', 'Education', 'Aysha Stein', 1232, '2021-07-03 03:47:07'),
(30, 'Law Education', 'Education', 'Kara Snow', 9764, '2021-07-03 03:47:07'),
(31, 'Pride and Prejudice', 'Novel', 'Jane Austen', 4356, '2021-07-03 03:47:07'),
(32, 'To Kill a Mockingbird', 'Novel', 'Harper Lee', 7531, '2021-07-03 03:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `brID` int(3) NOT NULL,
  `bName` varchar(30) NOT NULL,
  `ISBN` int(15) NOT NULL,
  `uUsername` varchar(30) NOT NULL,
  `uEmail` varchar(60) NOT NULL,
  `borrowDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `returnDate` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`brID`, `bName`, `ISBN`, `uUsername`, `uEmail`, `borrowDate`, `returnDate`, `status`) VALUES
(1, 'Science', 1111, 'John122', 'bbb@gmail.com', '2021-06-20 03:10:39', '2021-06-30 16:00:00', 1),
(2, 'History', 2222, 'Ivan123', 'ivan@gmail.com', '2021-06-20 04:50:56', '2021-06-30 16:00:00', 1),
(3, 'Malay', 5555, 'John122', 'bbb@gmail.com', '2021-06-20 04:52:09', NULL, 0),
(4, 'English', 3333, 'Ivan123', 'ivan@gmail.com', '2021-07-03 04:06:38', NULL, 0),
(5, 'Mathmatics', 4444, 'Javier12', 'tanjavier10@gmail.com', '2021-07-03 04:06:38', NULL, 0),
(6, 'Islamic', 7777, 'John122', 'bbb@gmail.com', '2021-07-03 04:06:38', NULL, 0),
(7, 'Tamil', 9999, 'lvandrielj', 'lvandrielj@altervista.org', '2021-07-03 04:06:38', NULL, 0),
(8, 'French', 9096, 'wfaino', 'wfaino@exblog.jp', '2021-07-03 04:06:38', NULL, 0),
(9, 'Pride and Prejudice', 4356, 'John122', 'bbb@gmail.com', '2021-07-03 04:06:38', NULL, 0),
(10, 'Law Education', 9764, 'wfaino', 'wfaino@exblog.jp', '2021-07-03 04:06:38', NULL, 0),
(11, 'Accounting', 3459, 'wfaino', 'wfaino@exblog.jp', '2021-07-03 04:06:38', NULL, 0),
(12, 'Chemistry', 5463, 'aroadknightd', 'aroadknigh@gmail.com', '2021-07-03 04:06:38', NULL, 0),
(13, 'Japanese', 2323, 'aroadknightd', 'aroadknigh@gmail.com', '2021-07-03 04:06:38', NULL, 0),
(14, 'Moral', 6666, 'aroadknightd', 'aroadknigh@gmail.com', '2021-07-03 04:06:38', NULL, 0),
(15, 'Computer Graphics', 1115, 'aivie8', 'aivie8@un.org', '2021-07-03 04:06:38', NULL, 0),
(16, 'Biology', 7425, 'aivie8', 'aivie8@un.org', '2021-07-03 04:06:38', NULL, 0),
(17, 'Japanese', 2323, 'bmelbury5', 'bmelbury5@weebly.com', '2021-07-03 04:06:38', NULL, 0),
(18, 'German', 5374, 'aivie8', 'aivie8@un.org', '2021-07-03 04:06:38', NULL, 0),
(19, 'To Kill a Mockingbird', 7531, 'John122', 'bbb@gmail.com', '2021-07-03 04:06:38', NULL, 0),
(20, 'To Kill a Mockingbird', 7531, 'bmelbury5', 'bmelbury5@weebly.com', '2021-07-03 04:06:38', NULL, 0),
(21, 'Tamil', 9999, 'John122', 'bbb@gmail.com', '2021-07-03 04:56:37', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `rID` int(3) NOT NULL,
  `rName` varchar(60) NOT NULL,
  `rUsername` varchar(30) NOT NULL,
  `rPassword` varchar(30) NOT NULL,
  `rEmail` varchar(60) NOT NULL,
  `rMembership` varchar(10) NOT NULL,
  `rCreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`rID`, `rName`, `rUsername`, `rPassword`, `rEmail`, `rMembership`, `rCreatedDate`) VALUES
(11, 'Bastian', 'bprazer2', 'xJAZzo', 'bprazer2@last.fm', '1 Year', '2021-07-03 03:31:33'),
(12, 'Euphemia', 'eswinley0', 't64JK61dFSNV', 'eswinley0@mlb.com', '6 Month', '2021-07-03 03:31:33'),
(13, 'Lyndell', 'lrabjohns0', '80HFTQRNq', 'lrabjohns0@imgur.com', '1 Month', '2021-07-03 03:31:33'),
(14, 'Renado', 'rgottelier1', 'RJsOgCxkd', 'rgottelier1@tamu.edu', '6 Month', '2021-07-03 03:31:33'),
(15, 'Arlyn', 'aberceros8', '93ttnEECR3', 'aberceros8@so-net.ne.jp', '1 Month', '2021-07-03 03:31:33'),
(16, 'Winnifred', 'wkiezlert', 'Gk2v9dPUuTL', 'wkiezlert@sun.com', '1 Month', '2021-07-03 03:31:33'),
(17, 'Thorsten', 'tknotte7', 'RXgwjVPil6Z', 'tknotte7@vk.com', '1 Month', '2021-07-03 03:31:33'),
(18, 'Pamela', 'pwarlawn', 'FUubORuqEoBm', 'pwarlawn@cbslocal.com', '1 Year', '2021-07-03 03:31:33'),
(19, 'Annabel', 'aromaninim', 'usbWdm6E', 'aromaninim@disqus.com', '6 Month', '2021-07-03 03:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uID` int(3) NOT NULL,
  `uName` varchar(60) NOT NULL,
  `uUsername` varchar(30) NOT NULL,
  `uPassword` varchar(30) NOT NULL,
  `uEmail` varchar(60) NOT NULL,
  `uMembership` varchar(10) NOT NULL,
  `uCreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `uNewDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uID`, `uName`, `uUsername`, `uPassword`, `uEmail`, `uMembership`, `uCreatedDate`, `uNewDate`) VALUES
(3, 'John', 'John122', 'bbb', 'bbb@gmail.com', '1 Month', '2021-06-16 03:38:10', NULL),
(6, 'Ivan Stone', 'Ivan123', 'ivan', 'ivan@gmail.com', '6 Month', '2021-06-19 02:56:15', NULL),
(10, 'Tan Javier', 'Javier12', 'fff', 'tanjavier10@gmail.com', '1 Month', '2021-06-19 05:09:22', NULL),
(12, 'Cletis Iorillo', 'ciorillo4', 'SoXO0A5tunt1', 'ciorillo4@ask.com', '1 Month', '2021-06-30 09:36:15', NULL),
(13, 'Bald Melbury', 'bmelbury5', 'MyuVPL45R2qT', 'bmelbury5@weebly.com', '6 Month', '2021-06-30 09:36:15', NULL),
(14, 'Tabard', 'stabard6', 'L8h1mhwvm', 'stabard6@goo.ne.jp', '1 Year', '2021-06-30 09:36:15', NULL),
(15, 'Farndale', 'afarndale7', 'KeKY4A', 'afarndale7@imdb.com', '1 Year', '2021-06-30 09:36:15', NULL),
(16, 'Ivie', 'aivie8', 'bbwyIsQL', 'aivie8@un.org', '6 Month', '2021-06-30 09:36:15', NULL),
(17, 'Pearle', 'dpearle9', 'CFJ5oHl', 'dpearle9@t-online.de', '1 Month', '2021-06-30 09:36:15', NULL),
(18, 'Baudinet', 'abaudineta', 'X9UsaYq', 'abaudineta@mysql.com', '1 Month', '2021-06-30 09:36:15', NULL),
(19, 'McMackin', 'jmcmackinb', 'xjf8wX', 'jmcmackinb@psu.edu', '1 Month', '2021-06-30 09:36:15', NULL),
(20, 'Kilpin', 'hkilpinc', 'VFvEjLi', 'hkilpinc@gmail.com', '1 Year', '2021-06-30 09:36:15', NULL),
(21, 'Roadknight', 'aroadknightd', 'AsgEgDSK', 'aroadknigh@gmail.com', '1 Month', '2021-06-30 09:36:15', NULL),
(22, 'Woolpert', 'awoolperte', 'GPtqt8baq', 'awoolperte@senate.gov', '1 Month', '2021-06-30 09:36:15', NULL),
(23, 'Strutley', 'pstrutleyf', 'ebtwbnG', 'pstrutleyf@drupal.org', '6 Month', '2021-06-30 09:36:15', NULL),
(24, 'Goodbarr', 'rgoodbarrg', 'BpYDUp', 'rgoodbarrg@princeton.edu', '6 Month', '2021-06-30 09:36:15', NULL),
(25, 'Stainburn', 'estainburnh', 'iKHDuja', 'estainburnh@bloglines.com', '6 Month', '2021-06-30 09:36:15', NULL),
(26, 'McKeon', 'amckeoni', '1gojkp', 'amckeoni@php.net', '6 Month', '2021-06-30 09:36:15', NULL),
(27, 'Van Driel', 'lvandrielj', 'Kay3ljSr', 'lvandrielj@altervista.org', '1 Month', '2021-06-30 09:36:15', NULL),
(28, 'Wethered', 'cwetheredk', 'WRYo1iy', 'cwetheredk@businessweek.com', '6 Month', '2021-06-30 09:36:15', NULL),
(29, 'Noyce', 'mnoycel', 'aHnOjsD', 'mnoycel@bing.com', '6 Month', '2021-06-30 09:36:15', NULL),
(30, 'Lardeur', 'alardeurm', 'ONB27H', 'alardeurm@abc.net.au', '1 Month', '2021-06-30 09:36:15', NULL),
(31, 'Reynolds', 'mreynoolldsn', 'WVtORo1C', 'mreynoolldsn@gmail.com', '1 Year', '2021-06-30 09:36:15', NULL),
(32, 'Fain', 'wfaino', 'IEECVw', 'wfaino@exblog.jp', '6 Month', '2021-06-30 09:36:15', NULL),
(33, 'Wadham', 'dwadhamp', '44CY0aq', 'dwadhamp@php.net', '1 Year', '2021-06-30 09:36:15', NULL),
(34, 'Burling', 'vburlingq', 'LRACGKb', 'vburlingq@twitter.com', '1 Year', '2021-06-30 09:36:15', NULL),
(35, 'isaac', 'isaac123', 'isaac', 'isaac@gmail.com', '6 Month', '2021-07-01 01:45:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`brID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`rID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `brID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `rID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
