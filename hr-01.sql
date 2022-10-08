
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




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
  `UpdatedDate` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `employee` (`ID`, `Code`, `EnName`, `ArName`, `DOB`, `SSN`, `Address`, `GenderID`, `MilitaryStatusID`, `NationalityID`, `StatusID`, `JobID`, `Phone`, `Email`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
(1, '3', '3', NULL, '2022-02-02', '3', '3', 33, NULL, 3, NULL, 3, '3', '3w@cd.com', 0, 39, NULL, NULL, NULL),
(2, '3', '3', NULL, '0000-00-00', '3', '3', 3, NULL, 3, NULL, 3, '3', 'tarekahmed1568@yahoo.com', 0, 47, NULL, NULL, NULL);


CREATE TABLE `lkp_department` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `lkp_gender` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `lkp_job` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `lkp_militarystatus` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `lkp_nationality` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `lkp_status` (
  `ID` int(11) NOT NULL,
  `EnName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `ArName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `users` (`ID`, `Username`, `DisplayName`, `Email`, `Password`, `SaltID`, `IsDeleted`, `isAdmin`, `IsActive`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `EmployeeID`) VALUES
(39, 'Ahmed3', 'AhmedTest', 'ahmed@ahmed.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 0, 1, 1, 39, '2022-08-12 07:03:56pm', NULL, NULL, 123),
(41, 'Hosnyx', 'Hosny', 'Hosny@d.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 0, 0, 1, 39, '2022-08-12 08:02:25pm', NULL, NULL, 122),
(42, 'sabrysdsdsd', 'sdsdsdsds', 'ee@e.com', '202cb962ac59075b964b07152d234b70', NULL, 0, 1, 1, 39, '2022-08-26 02:42:06pm', NULL, NULL, 444),
(43, 'sabrysdsdsd', 'sdsdsdsds', 'ee@e.com', '202cb962ac59075b964b07152d234b70', NULL, 0, 1, 1, 39, '2022-08-26 02:43:15pm', NULL, NULL, 444),
(44, 'sabry', 'SS', 'sw@s.om', '202cb962ac59075b964b07152d234b70', NULL, 0, 1, 0, 39, '2022-08-26 02:43:53pm', NULL, NULL, 555),
(45, 'sabry', 'ewqewq', 'ew@c.com', '6074c6aa3488f3c2dddff2a7ca821aab', NULL, 0, 0, 1, 39, '2022-08-26 02:48:20pm', NULL, NULL, 12),
(46, 'ccccccccccccccccccsad', 'cc', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 0, 0, 80, '2022-08-26 05:40:04pm', NULL, NULL, 0),
(47, 'tarek', 'tarek', 'tarek@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 0, '2022-08-27 12:18:05am', NULL, NULL, 300);

ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `idx_users_ID_EmployeeID` (`ID`,`EmployeeID`);


ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

