-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 09:08 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc_lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `bcategory` varchar(255) NOT NULL,
  `bDate` date NOT NULL,
  `cnumber` varchar(255) NOT NULL,
  `price` int(12) NOT NULL,
  `discription` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookName`, `bcategory`, `bDate`, `cnumber`, `price`, `discription`, `image`) VALUES
(45, 'fbfbnc', 'JAVA', '2019-03-02', '-1', 0, 'dvs', 'reading.png'),
(52, 'book 1', 'LOVE', '2019-05-09', '2', 0, 'book  details are awsome', 'b1.jpg'),
(53, 'book 2', 'HISTORY', '2019-05-16', '0', 0, 'awsome book', 'alfons-morales-410757-unsplash.jpg'),
(54, 'BG book', 'WEB', '2019-05-02', '3', 250, 'njsdcnds vja nv s', 'bg1.jpg'),
(55, 'Back', 'HISTORY', '2019-05-24', '2', 70, 'dfsdfsd', 'back.jpg'),
(56, 'Book 8', 'WEB', '2019-05-16', '0', 780, 'awsome book', 'b8.jpg'),
(57, 'Cube', 'JAVA', '2019-05-10', '-3', 300, 'bsamfn asb abmsfbmae fkqb afmba fba fb afmba fnma hfnaenf aeknf asnmf amn fafnam fkna fmamfamn fna', 'Cube-Math-HD-Wallpaper.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `edate` date NOT NULL,
  `eabout` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `ename`, `edate`, `eabout`, `image`) VALUES
(7, 'bvcbvc', '2019-03-08', 'cvbc', 'book.jpg'),
(8, 'book events', '2019-05-11', 'khbkn ,jk j ', 'eve.jpg'),
(9, 'Event 1', '2019-05-03', 'Welcome to event 1', 'LogoMakr_1t25mE.png');

-- --------------------------------------------------------

--
-- Table structure for table `recervations`
--

CREATE TABLE `recervations` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `rDate` date NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bcategory` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `lateFee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recervations`
--

INSERT INTO `recervations` (`id`, `user_id`, `book_id`, `rDate`, `bookname`, `email`, `contact`, `status`, `image`, `bcategory`, `discription`, `firstName`, `lastname`, `mobile`, `price`, `lateFee`) VALUES
(28, 26, 57, '2019-04-02', 'Cube', 'cloudy@gmail.com', '0778500835', 'submited', 'Cube-Math-HD-Wallpaper.png', 'JAVA', 'bsamfn asb abmsfbmae fkqb afmba fba fb afmba fnma hfnaenf aeknf asnmf amn fafnam fkna fmamfamn fna', 'cloudy', 'cloudi', '0778500835', 200, 0),
(29, 26, 52, '2019-05-05', 'book 1', 'cloudy@gmail.com', '0778500835', 'submited', 'b1.jpg', 'LOVE', 'book  details are awsome', 'cloudy', 'cloudi', '0778500835', 200, 0),
(30, 26, 55, '2019-05-05', 'Back', 'cloudy@gmail.com', '0778500835', 'submited', 'back.jpg', 'HISTORY', 'dfsdfsd', 'cloudy', 'cloudi', '0778500835', 200, 0),
(31, 30, 52, '2019-05-05', 'book 1', 'cloudy@gmail.com', '0778500835', 'borrow', 'b1.jpg', 'LOVE', 'book  details are awsome', 'cloudy', 'cloudi', '0778500835', 200, 0),
(32, 30, 54, '2019-05-05', 'BG book', 'cloudy@gmail.com', '0778500835', 'borrow', 'bg1.jpg', 'WEB', 'njsdcnds vja nv s', 'cloudy', 'cloudi', '0778500835', 200, 0),
(33, 26, 54, '2019-05-05', 'BG book', 'cloudy@gmail.com', '0778500835', 'submited', 'bg1.jpg', 'WEB', 'njsdcnds vja nv s', 'cloudy', 'cloudi', '0778500835', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstName`, `lastname`, `username`, `email`, `password`, `address`, `mobile`) VALUES
(23, 'menol', 'shehan', 'menol', 'aceproperty7@gmail.com', 'menolshehan', 'kudawewa', '0778500835'),
(24, 'admin', 'admin', 'admin', 'admin@admin', 'pptx', 'owner', ''),
(26, 'cloudy', 'cloudi', 'cloudy', 'cloudy@gmail.com', '0000', 'kudawewa1u', '0778500835');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recervations`
--
ALTER TABLE `recervations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recervations`
--
ALTER TABLE `recervations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
