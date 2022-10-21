-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 03:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr-01`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `Code` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `DOB` date NOT NULL,
  `SSN` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `GenderID` int(11) DEFAULT NULL,
  `MilitaryStatusID` int(11) DEFAULT NULL,
  `NationalityID` int(11) DEFAULT NULL,
  `StatusID` int(11) DEFAULT NULL,
  `JobID` int(11) DEFAULT NULL,
  `Phone` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `IsDeleted` tinyint(1) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedDate` datetime(6) DEFAULT NULL,
  `isleader` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `Code`, `EnName`, `ArName`, `DOB`, `SSN`, `Address`, `GenderID`, `MilitaryStatusID`, `NationalityID`, `StatusID`, `JobID`, `Phone`, `Email`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `isleader`) VALUES
(1, '3', '3', NULL, '2022-02-02', '3', '3', 33, NULL, 3, NULL, 3, '3', '3w@cd.com', 0, 39, NULL, NULL, NULL, NULL),
(2, '3', '3', NULL, '0000-00-00', '3', '3', 3, NULL, 3, NULL, 3, '3', 'tarekahmed1568@yahoo.com', 0, 47, NULL, NULL, NULL, NULL),
(3, '1', '1', NULL, '0000-00-00', '1', '1', 1, NULL, 1, NULL, 1, '1', 'rjkl@fg.com', 0, 47, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_department`
--

CREATE TABLE `lkp_department` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lkp_gender`
--

CREATE TABLE `lkp_gender` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lkp_job`
--

CREATE TABLE `lkp_job` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lkp_militarystatus`
--

CREATE TABLE `lkp_militarystatus` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lkp_nationality`
--

CREATE TABLE `lkp_nationality` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lkp_status`
--

CREATE TABLE `lkp_status` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskID` int(255) NOT NULL,
  `userTo` varchar(255) DEFAULT NULL,
  `userIdTo` int(255) DEFAULT NULL,
  `leaderaName` varchar(255) DEFAULT NULL,
  `leaderaID` int(255) DEFAULT NULL,
  `taskContent` varchar(255) DEFAULT NULL,
  `taskTitle` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `startIn` datetime DEFAULT NULL,
  `deadLine` datetime DEFAULT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` int(20) NOT NULL,
  `timein` datetime NOT NULL,
  `timeout` datetime DEFAULT NULL,
  `break` datetime DEFAULT NULL,
  `workingon` varchar(100) NOT NULL,
  `total` int(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `endbreak` datetime DEFAULT NULL,
  `totaltime2` datetime GENERATED ALWAYS AS (timediff(`timeout`,`timein`)) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `name`, `code`, `timein`, `timeout`, `break`, `workingon`, `total`, `status`, `endbreak`) VALUES
(195, 'tarekahmed', 300, '2022-09-10 11:08:20', '2022-09-10 11:09:08', '2022-09-10 11:09:01', '0', NULL, 0, '2022-09-10 12:11:25'),
(196, 'admin', 155, '2022-09-10 13:05:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `DisplayName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Password` varchar(200) NOT NULL,
  `SaltID` varchar(0) CHARACTER SET utf8mb4 DEFAULT NULL,
  `IsDeleted` tinyint(1) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `IsActive` tinyint(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` varchar(255) NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedDate` datetime(6) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `IsLeader` tinyint(4) DEFAULT NULL,
  `leadername` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `DisplayName`, `Email`, `Password`, `SaltID`, `IsDeleted`, `isAdmin`, `IsActive`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `EmployeeID`, `IsLeader`, `leadername`) VALUES
(39, 'Ahmed3', 'AhmedTest', 'ahmed@ahmed.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 1, 1, 1, 39, '2022-08-12 07:03:56pm', NULL, NULL, 123, NULL, NULL),
(41, 'Hosnyx', 'Hosny', 'Hosny00@d.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 0, 0, 1, 39, '2022-08-12 08:02:25pm', NULL, NULL, 122, 1, NULL),
(124, 'tarek', 'tarekahmed', 'tarekahmed1568@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 41, '2022-08-27 10:38:26am', NULL, NULL, 300, 1, 'admin'),
(125, 'admin', 'admin', 'tarekahmed2020@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 124, '2022-09-06 04:32:18pm', NULL, NULL, 155, 1, NULL),
(158, 'tarek', '', '', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 0, 0, 125, '2022-09-10 01:37:25pm', NULL, NULL, 0, 0, '2'),
(159, 'leader', 'boda', 'tarekahmed1568@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 125, '2022-09-10 01:38:04pm', NULL, NULL, 1233, 1, '2'),
(160, 'leader', 'boda', 'tarekahmed1568@gmail.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 0, 1, 1, 125, '2022-09-10 01:39:19pm', NULL, NULL, 1233, 1, '2'),
(161, 'tarekx', 'tarekx', 'tarekahmed1568@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 125, '2022-09-10 01:40:20pm', NULL, NULL, 0, 1, 'Hosnyx'),
(162, 'tarekx', 'tarekx', 'tarekahmed1568@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 125, '2022-09-10 01:41:17pm', NULL, NULL, 0, 1, 'Hosnyx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `idx_users_ID_EmployeeID` (`ID`,`EmployeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
