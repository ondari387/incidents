-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 10:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `incidents`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '08-05-2020 07:23:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `anonymous`
--

CREATE TABLE `anonymous` (
  `incident_no` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `incident` varchar(1000) NOT NULL,
  `incident_file` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anonymous`
--

INSERT INTO `anonymous` (`incident_no`, `college`, `school`, `department`, `year`, `subject`, `incident`, `incident_file`, `status`, `created_at`, `updated_at`) VALUES
('8a958413ebee02982838', '1', '1', '1', 0, 'TEST', 'Testing..', '10-2-christmas-hat-png-pic-thumb.png', 'closed', '2021-11-27 06:07:29', '2021-11-27 06:07:29'),
('ad8fe8c2aa69ade94cda', '1', '1', '1', 0, 'TESTING', 'TESTING', '9d908120-bf35-49e9-83dd-bc0419804ba6.jpg', 'in process', '2021-11-27 23:48:42', '2021-11-27 23:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `anonymousmessages`
--

CREATE TABLE `anonymousmessages` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `counsellor_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college_name`, `counsellor_name`, `created_at`, `updated_at`) VALUES
(1, 'COPAS', 'John Ondar', '2021-11-20 05:39:38', '0000-00-00 00:00:00'),
(5, 'COANRE', 'Josep Tom', '2021-11-21 06:58:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `incident_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `incident_no`, `status`, `remark`, `created_at`) VALUES
(1, '1', 'in process', 'Complaint received and action will be taken! Thank you.', '2021-09-28 02:47:41.000000'),
(2, '1', 'in process', 'in process', '2021-09-30 15:28:47.000000'),
(3, '1', 'in process', 'Talked to them waiting for response', '2021-09-30 20:05:40.000000'),
(4, '1', 'closed', 'Incident Closed', '2021-10-01 11:20:14.000000'),
(5, '1', 'in process', 'processing', '2021-10-02 20:52:54.000000'),
(6, '1', 'in process', 'Receiveddd', '2021-11-20 12:36:53.000000');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `chair_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `school`, `department_name`, `chair_name`, `created_at`, `updated_at`) VALUES
(10, '', 'Information Technology', 'Francis Thiong', '2021-11-20 14:47:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `incidentremark`
--

CREATE TABLE `incidentremark` (
  `id` int(11) NOT NULL,
  `incident_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incidentremark`
--

INSERT INTO `incidentremark` (`id`, `incident_no`, `status`, `remark`, `created_at`) VALUES
(11, '8a958413ebee02982838', 'in process', 'in process', '2021-11-27 23:24:42.301621'),
(12, '8a958413ebee02982838', 'closed', 'Case resolved', '2021-11-27 23:28:43.037676'),
(13, 'ad8fe8c2aa69ade94cda', 'in process', 'IN PROGRESS', '2021-11-27 23:55:32.653211');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `dean_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `school_name`, `dean_name`, `created_at`, `updated_at`) VALUES
(1, 'SCIT', 'John Do', '2021-11-20 05:41:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 0, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:43', '', 0),
(2, 1, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:50', '08-05-2020 07:44:51 PM', 1),
(3, 1, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 1),
(4, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-09-28 02:37:27', '28-09-2021 08:08:20 AM', 1),
(5, 2, 'mike@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-28 02:41:27', '28-09-2021 12:35:38 PM', 1),
(6, 0, 'ondari.mike@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-29 19:05:21', '', 0),
(7, 3, 'ondari.mike@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-29 19:12:01', '', 1),
(8, 3, 'ondari.mike@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-30 07:20:05', '', 1),
(9, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-09-30 08:36:40', '30-09-2021 07:24:17 PM', 1),
(10, 2, 'mike@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-30 14:00:50', '30-09-2021 10:29:28 PM', 1),
(11, 0, 'admin', 0x3a3a3100000000000000000000000000, '2021-10-02 20:12:50', '', 0),
(12, 0, 'admin', 0x3a3a3100000000000000000000000000, '2021-10-02 20:13:00', '', 0),
(13, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-10-02 20:13:04', '', 1),
(14, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-10-03 01:41:55', '', 1),
(15, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-10-03 08:18:59', '', 1),
(16, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-10-04 18:17:43', '', 1),
(17, 2, 'mike@gmail.com', 0x3a3a3100000000000000000000000000, '2021-10-04 23:25:32', '05-10-2021 04:56:55 AM', 1),
(18, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-10-11 09:10:23', '', 1),
(19, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-10-11 10:12:18', '', 1),
(20, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-10-11 11:29:18', '', 1),
(21, 2, 'MIKE@GMAIL.COM', 0x3a3a3100000000000000000000000000, '2021-11-26 06:12:43', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `State`, `country`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(1, 'John Smith', 'john@gmail.com', '202cb962ac59075b964b07152d234b70', 9999999999, NULL, NULL, NULL, NULL, NULL, '2020-05-08 14:10:50', '2020-05-08 14:16:22', 1),
(2, 'Michael', 'MIKE@GMAIL.COM', '25d55ad283aa400af464c76d713c07ad', 70000000, NULL, NULL, NULL, NULL, NULL, '2021-09-28 02:37:05', '0000-00-00 00:00:00', 1),
(3, 'Michael Ondari', 'ondari.mike@gmail.com', '25d55ad283aa400af464c76d713c07ad', 700000000, NULL, NULL, NULL, NULL, NULL, '2021-09-29 19:11:37', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anonymousmessages`
--
ALTER TABLE `anonymousmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incidentremark`
--
ALTER TABLE `incidentremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anonymousmessages`
--
ALTER TABLE `anonymousmessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `incidentremark`
--
ALTER TABLE `incidentremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
