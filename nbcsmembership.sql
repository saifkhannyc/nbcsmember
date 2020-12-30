-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 07:17 PM
-- Server version: 5.7.22-log
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbcsmembership`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencytype`
--

CREATE TABLE `agencytype` (
  `id` int(1) NOT NULL,
  `agencytype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `agencytype`
--

INSERT INTO `agencytype` (`id`, `agencytype`) VALUES
(1, 'Federal'),
(2, 'New York State'),
(3, 'New York City ');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mnumber` varchar(12) NOT NULL,
  `agencytypecode` int(1) NOT NULL,
  `agency` varchar(400) NOT NULL,
  `jobtitle` varchar(400) NOT NULL,
  `memtypecode` int(1) NOT NULL,
  `memstatuscode` int(1) NOT NULL,
  `registrationdate` date NOT NULL,
  `updatedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fname`, `lname`, `email`, `mnumber`, `agencytypecode`, `agency`, `jobtitle`, `memtypecode`, `memstatuscode`, `registrationdate`, `updatedate`) VALUES
(1, 'Saif', 'Khan', 'saifkhan6@gmail.com', '222-222-2222', 3, 'NYC Financial Information Service', 'Business Systems Analyst', 1, 2, '2020-12-29', '2020-12-29'),
(2, 'Awkat', 'Khan', 'aawkat@gmail.com', '212-222-2222', 3, 'NYC HRA', 'Program Specialist', 1, 5, '2020-12-29', '2020-12-29'),
(3, 'Prabal', 'Das', 'prabal@gmail.com', '212-222-1212', 1, 'Social Security Administration', 'Project Manager', 1, 2, '2020-12-29', '2020-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `memstatus`
--

CREATE TABLE `memstatus` (
  `id` int(1) NOT NULL,
  `memstatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `memstatus`
--

INSERT INTO `memstatus` (`id`, `memstatus`) VALUES
(3, 'Active'),
(2, 'Approved'),
(4, 'Expired'),
(1, 'Pending Approval'),
(5, 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `memtype`
--

CREATE TABLE `memtype` (
  `id` int(1) NOT NULL,
  `memtype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `memtype`
--

INSERT INTO `memtype` (`id`, `memtype`) VALUES
(1, 'General'),
(2, 'Executive'),
(3, 'Advisory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencytype`
--
ALTER TABLE `agencytype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `memstatus`
--
ALTER TABLE `memstatus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `memstatus` (`memstatus`);

--
-- Indexes for table `memtype`
--
ALTER TABLE `memtype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencytype`
--
ALTER TABLE `agencytype`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `memstatus`
--
ALTER TABLE `memstatus`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `memtype`
--
ALTER TABLE `memtype`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
