-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 08:03 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `DOB` date NOT NULL,
  `SSN` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `GenderID` int(11) NOT NULL,
  `MilitaryStatusID` int(11) NOT NULL,
  `NationalityID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `Phone` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime(6) NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedDate` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `SaltID` varchar(0) CHARACTER SET utf8mb4 NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `IsActive` tinyint(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime(6) NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedDate` datetime(6) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `DisplayName`, `Email`, `Password`, `SaltID`, `IsDeleted`, `isAdmin`, `IsActive`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `EmployeeID`) VALUES
(39, 'sabry', 'Mohamed Sabry', 'sabry@gmail.com', '00979977da03766dc7550742fd551d90', '', 0, 1, 1, 0, '2022-08-12 07:51:54.000000', NULL, NULL, 299);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UQ__Users__536C85E4EAEFA0BB` (`Username`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
