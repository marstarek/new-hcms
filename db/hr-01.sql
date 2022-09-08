

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `UpdatedDate` datetime(6) DEFAULT NULL,
  `isleader` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `employee` (`ID`, `Code`, `EnName`, `ArName`, `DOB`, `SSN`, `Address`, `GenderID`, `MilitaryStatusID`, `NationalityID`, `StatusID`, `JobID`, `Phone`, `Email`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `isleader`) VALUES
(1, '3', '3', NULL, '2022-02-02', '3', '3', 33, NULL, 3, NULL, 3, '3', '3w@cd.com', 0, 39, NULL, NULL, NULL, NULL),
(2, '3', '3', NULL, '0000-00-00', '3', '3', 3, NULL, 3, NULL, 3, '3', 'tarekahmed1568@yahoo.com', 0, 47, NULL, NULL, NULL, NULL),
(3, '1', '1', NULL, '0000-00-00', '1', '1', 1, NULL, 1, NULL, 1, '1', 'rjkl@fg.com', 0, 47, NULL, NULL, NULL, 1);



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
  `endbreak` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `trans` (`id`, `name`, `code`, `timein`, `timeout`, `break`, `workingon`, `total`, `status`, `endbreak`) VALUES
(181, 'tarekahmed', 300, '2022-09-08 12:09:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(182, 'tarekahmed', 300, '2022-09-08 12:14:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(183, 'tarekahmed', 300, '2022-09-08 12:14:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(184, 'tarekahmed', 300, '2022-09-08 12:15:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(185, 'tarekahmed', 300, '2022-09-08 12:21:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(186, 'tarekahmed', 300, '2022-09-08 12:22:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(187, 'tarekahmed', 300, '2022-09-08 12:23:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(188, 'tarekahmed', 300, '2022-09-08 12:24:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(189, 'tarekahmed', 300, '2022-09-08 12:25:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000'),
(190, 'tarekahmed', 300, '2022-09-08 12:26:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', NULL, 0, '0000-00-00 00:00:00.000000');

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



INSERT INTO `users` (`ID`, `Username`, `DisplayName`, `Email`, `Password`, `SaltID`, `IsDeleted`, `isAdmin`, `IsActive`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `EmployeeID`, `IsLeader`) VALUES
(39, 'Ahmed3', 'AhmedTest', 'ahmed@ahmed.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 1, 1, 1, 39, '2022-08-12 07:03:56pm', NULL, NULL, 123, NULL),
(41, 'Hosnyx', 'Hosny', 'Hosny00@d.com', 'd1dea2317205115223634dfd2b7219ae', NULL, 0, 0, 1, 39, '2022-08-12 08:02:25pm', NULL, NULL, 122, 1),
(124, 'tarek', 'tarekahmed', 'tarekahmed1568@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 41, '2022-08-27 10:38:26am', NULL, NULL, 300, 1),
(125, 'admin', 'admin', 'tarekahmed2020@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 0, 1, 1, 124, '2022-09-06 04:32:18pm', NULL, NULL, 155, 1);


ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);


ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`) USING BTREE;


ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `idx_users_ID_EmployeeID` (`ID`,`EmployeeID`);


ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `trans`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;


ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;
