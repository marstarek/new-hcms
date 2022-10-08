-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 11:20 AM
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
  `IsLeader` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `DisplayName`, `Email`, `Password`, `SaltID`, `IsDeleted`, `isAdmin`, `IsActive`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `EmployeeID`, `IsLeader`) VALUES
(39, 'Ahmed3', 'AhmedTest', 'ahmed@ahmed.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 1, 1, 1, 39, '2022-08-12 07:03:56pm', NULL, NULL, 123, NULL),
(41, 'Hosnyx', 'Hosny', 'Hosny00@d.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 0, 0, 1, 39, '2022-08-12 08:02:25pm', NULL, NULL, 122, 1),
(123, 'tarek', 'tarek', 'tarek@ggg.com', '123456789', NULL, 0, 1, 1, 0, '', NULL, NULL, NULL, 1),
(124, 'tarek', 'tarekahmed', 'tarekahmed1568@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 41, '2022-08-27 10:38:26am', NULL, NULL, 300, 1);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
