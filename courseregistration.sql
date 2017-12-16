SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `courseregistration` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `courseregistration`;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `SID` varchar(11) NOT NULL,
  `SecId` varchar(11) NOT NULL,
  `Deleted` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cart` (`SID`, `SecId`, `Deleted`) VALUES
('0', '2000', 'N'),
('0', '2001', 'Y'),
('0', '2003', 'Y'),
('2', '2007', 'N'),
('2', '2017', 'N'),
('5', '2029', 'N'),
('6', '2000', 'N'),
('6', '2004', 'Y');

DROP TABLE IF EXISTS `college`;
CREATE TABLE IF NOT EXISTS `college` (
  `CName` varchar(20) NOT NULL,
  `COffice` varchar(20) NOT NULL,
  `DeanId` varchar(20) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `college` (`CName`, `COffice`, `DeanId`, `Deleted`) VALUES
('ATEC', '25', '1001', 'N'),
('ECS', '21', '1003', 'N'),
('JSOM', '22', '1002', 'N');

DROP TABLE IF EXISTS `collegephone`;
CREATE TABLE IF NOT EXISTS `collegephone` (
  `CName` varchar(20) NOT NULL DEFAULT '',
  `CPhone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `collegephone` (`CName`, `CPhone`, `Deleted`) VALUES
('ATEC', '2234561875', 'Y'),
('ATEC', '4656498741', 'Y'),
('ECS', '221', 'N'),
('JSOM', '12345', 'N'),
('JSOM', '222', 'N');

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `CoCode` int(5) NOT NULL DEFAULT '0',
  `CoName` varchar(20) DEFAULT NULL,
  `Credits` int(2) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `CoDescription` varchar(30) NOT NULL,
  `CoDCode` int(5) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `course` (`CoCode`, `CoName`, `Credits`, `Level`, `CoDescription`, `CoDCode`, `Deleted`) VALUES
(1, 'AI', 3, '6389', 'ARTIFICIAL INTELLIGENCE ', 10, 'N'),
(2, 'DB', 3, '6360', 'DATABASE DESIGN', 10, 'N'),
(3, 'DM', 3, '6314', 'DATA MINING', 11, 'N'),
(4, 'BI', 3, '6000', 'BUSINESS INTELLIGENCE', 11, 'N'),
(5, 'HM', 3, '6326', 'HUMANITIES', 12, 'N');

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `DCode` int(5) NOT NULL DEFAULT '0',
  `DName` varchar(20) DEFAULT NULL,
  `DOffice` varchar(20) NOT NULL,
  `DeptChairID` varchar(20) DEFAULT NULL,
  `CName` varchar(20) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `department` (`DCode`, `DName`, `DOffice`, `DeptChairID`, `CName`, `Deleted`) VALUES
(10, 'CS', '110', '1006', 'ECS', 'N'),
(11, 'ITM', '111', '1002', 'JSOM', 'N'),
(12, 'ARTS', '112', '1003', 'ATEC', 'N'),
(13, 'CE', 'ECSN 2.034', '1006', 'ECS', 'N');

DROP TABLE IF EXISTS `deptphone`;
CREATE TABLE IF NOT EXISTS `deptphone` (
  `DCode` int(5) NOT NULL DEFAULT '0',
  `DeptPhone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `deptphone` (`DCode`, `DeptPhone`, `Deleted`) VALUES
(10, '11111111111', 'N'),
(11, '2222222222', 'N'),
(12, '3333333333', 'N'),
(12, '4444444444', 'N');

DROP TABLE IF EXISTS `instrphone`;
CREATE TABLE IF NOT EXISTS `instrphone` (
  `ID` varchar(20) NOT NULL DEFAULT '',
  `IPhone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `instrphone` (`ID`, `IPhone`, `Deleted`) VALUES
('1002', '6666666666', 'N'),
('1003', '7777777777', 'N'),
('1004', '5555555555', 'Y'),
('1004', '8888888888', 'Y'),
('1005', '4444444444', 'N');

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `ID` varchar(20) NOT NULL DEFAULT '',
  `Rank` varchar(20) NOT NULL,
  `IName` varchar(20) DEFAULT NULL,
  `IOffice` varchar(20) NOT NULL,
  `DCode` int(5) DEFAULT NULL,
  `Deleted` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `instructor` (`ID`, `Rank`, `IName`, `IOffice`, `DCode`, `Deleted`) VALUES
('1001', '0001', 'NURCAN YURUK', '200', 10, 'N'),
('1002', '0002', 'ANURAG NAGAR', '201', 10, 'N'),
('1003', '0003', 'NEERAJ GUPTA', '202', 11, 'N'),
('1004', '0004', 'CATYLYN JOSEPH', '203', 11, 'N'),
('1005', '0005', 'JONAH', '204', 12, 'N'),
('1006', '005', 'DENIS DEAN', 'ECS 2.305', 10, 'N');

DROP TABLE IF EXISTS `logindetail`;
CREATE TABLE IF NOT EXISTS `logindetail` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `SID` varchar(20) DEFAULT NULL,
  `imagename` varchar(100) DEFAULT 'user_profile.png',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `logindetail` (`username`, `email`, `user_type`, `password`, `SID`, `imagename`, `Deleted`) VALUES
('admin', 'arthshah46@gmail.com', 'admin', 'c93ccd78b2076528346216b3b2f701e6', '0', 'admin.png', 'N'),
('arth', 'axs175430@utdallas.edu', 'user', 'e10adc3949ba59abbe56e057f20f883e', '1', 'arth.png', 'N'),
('devanshu', 'ddfg@jifg', 'user', '1084c29da0ccd38cfcf3d9c92c148026', '5', 'devanshu.png', 'N'),
('devanshudsheth', 'devanshudsheth@gmail.com', 'user', '9fe2f8334ff8eeb370462561e37c6826', '3', 'devanshudsheth.png', 'N'),
('user1', 'user@kdr', 'user', '1084c29da0ccd38cfcf3d9c92c148026', '6', 'devanshu.png', 'Y'),
('user2', 'admie@orfk', 'user', 'c93ccd78b2076528346216b3b2f701e6', '2', 'user2.png', 'N');

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `SecId` varchar(20) NOT NULL DEFAULT '',
  `SecNo` varchar(3) DEFAULT NULL,
  `Sem` int(2) NOT NULL,
  `OpenClosed` char(1) DEFAULT 'N',
  `Year` year(4) NOT NULL,
  `RoomNo` varchar(10) NOT NULL,
  `Building` varchar(20) NOT NULL,
  `DaysTime` varchar(20) NOT NULL,
  `InstructorID` varchar(20) DEFAULT NULL,
  `CoCode` int(5) DEFAULT NULL,
  `SectionLimit` int(3) DEFAULT NULL,
  `MaxCapacity` int(3) NOT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `section` (`SecId`, `SecNo`, `Sem`, `OpenClosed`, `Year`, `RoomNo`, `Building`, `DaysTime`, `InstructorID`, `CoCode`, `SectionLimit`, `MaxCapacity`, `Deleted`) VALUES
('2000', '863', 1, 'Y', 2017, '400', 'ECSS', '1:00-2:15', '1001', 2, 48, 50, 'N'),
('2001', '851', 1, 'Y', 2017, '401', 'ECSN', '11:00-12:15', '1002', 2, 1, 5, 'N'),
('2002', '858', 2, 'N', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22, 22, 'N'),
('2003', '853', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2004', '872', 2, 'Y', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 58, 60, 'N'),
('2005', '865', 1, 'N', 2017, '400', 'ECSS', '1:00-2:15', '1001', 2, 50, 50, 'N'),
('2006', '878', 1, 'Y', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2007', '854', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 21, 22, 'N'),
('2008', '881', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2009', '870', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 61, 60, 'N'),
('2010', '864', 1, 'Y', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 50, 50, 'N'),
('2011', '874', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2012', '852', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22, 22, 'N'),
('2013', '883', 2, 'Y', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2014', '871', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 60, 60, 'N'),
('2015', '861', 1, 'Y', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 50, 50, 'N'),
('2016', '876', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2017', '853', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 21, 22, 'N'),
('2018', '879', 2, 'Y', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2019', '866', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 60, 60, 'N'),
('2020', '859', 1, 'Y', 2017, '400', 'ECSS', '1:00-2:15', '1001', 2, 50, 50, 'N'),
('2021', '882', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2022', '856', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22, 22, 'N'),
('2023', '880', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2024', '868', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 59, 60, 'N'),
('2025', '862', 1, 'N', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 50, 50, 'N'),
('2026', '877', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2027', '857', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22, 22, 'N'),
('2028', '875', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2029', '869', 2, 'Y', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 60, 60, 'N'),
('2030', '860', 1, 'N', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 50, 50, 'N'),
('2031', '851', 1, 'Y', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2032', '855', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22, 22, 'N'),
('2033', '853', 2, 'Y', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2034', '867', 2, 'Y', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 60, 60, 'N'),
('2081', '889', 2, 'Y', 2018, '2.032', 'ECSS', '10:00-11:15', '1006', 2, 100, 100, 'N');

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `SID` varchar(20) NOT NULL DEFAULT '',
  `DOB` date NOT NULL,
  `SFname` varchar(20) DEFAULT NULL,
  `SMname` varchar(20) NOT NULL,
  `SLname` varchar(20) DEFAULT NULL,
  `Address` varchar(30) NOT NULL,
  `Major` varchar(20) DEFAULT NULL,
  `DCode` int(5) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student` (`SID`, `DOB`, `SFname`, `SMname`, `SLname`, `Address`, `Major`, `DCode`, `Deleted`) VALUES
('0', '0000-00-00', 'admin', '', 'admin', '', '', 10, 'N'),
('1', '2017-10-01', 'WAYNE ', 'CHETAN', 'ROONEY', 'NEW ENGLAND', 'COMPUTER SCIENCE', 10, 'N'),
('2', '2017-10-02', 'ALVARO', 'SANJAY', 'MORATA', '7575 FRANKFORD', 'COMPUTER SCIENCE', 10, 'N'),
('3', '2017-10-03', 'LIONEL', 'RAKESH', 'MESSI', '7676 FRANKFORD', 'MIS', 11, 'N'),
('4', '2017-10-04', 'EDEN', 'BHAVESH', 'HAZARD', '1011 COIT ROAD', 'MIS', 11, 'N'),
('5', '2017-10-05', 'JAMIE', 'KUMAR', 'VARDY', '1011 PRESTON ROAD', 'ARTS', 12, 'N'),
('6', '1998-12-03', 'JOHN', '', 'DOE', '', 'MIS', 11, 'N'),
('7', '1961-11-05', 'JANE', '', 'DOE', '', 'GRAPHICS', 12, 'N');

DROP TABLE IF EXISTS `studentphone`;
CREATE TABLE IF NOT EXISTS `studentphone` (
  `SID` varchar(20) NOT NULL DEFAULT '',
  `SPhone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `studentphone` (`SID`, `SPhone`, `Deleted`) VALUES
('2', '1111222222', 'N'),
('2', '2222333333', 'N'),
('3', '3333444444', 'N'),
('4', '4444555555', 'N'),
('5', '5555666666', 'N');

DROP TABLE IF EXISTS `takes`;
CREATE TABLE IF NOT EXISTS `takes` (
  `SID` varchar(20) NOT NULL DEFAULT '',
  `SecID` varchar(20) NOT NULL DEFAULT '',
  `Grade` varchar(2) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `takes` (`SID`, `SecID`, `Grade`, `Deleted`) VALUES
('0', '2000', 'A', 'N'),
('0', '2001', 'B', 'Y'),
('2', '2007', NULL, 'N'),
('2', '2017', NULL, 'N'),
('6', '2000', 'A', 'N'),
('6', '2004', NULL, 'N');


ALTER TABLE `cart`
  ADD PRIMARY KEY (`SID`,`SecId`),
  ADD KEY `SID_FK` (`SID`),
  ADD KEY `SecId_FK` (`SecId`);

ALTER TABLE `college`
  ADD PRIMARY KEY (`CName`),
  ADD KEY `DeanId` (`DeanId`);

ALTER TABLE `collegephone`
  ADD PRIMARY KEY (`CName`,`CPhone`);

ALTER TABLE `course`
  ADD PRIMARY KEY (`CoCode`),
  ADD KEY `CoDCode` (`CoDCode`);

ALTER TABLE `department`
  ADD PRIMARY KEY (`DCode`),
  ADD UNIQUE KEY `DName` (`DName`),
  ADD KEY `DeptChairID` (`DeptChairID`,`CName`),
  ADD KEY `FK_CName` (`CName`);

ALTER TABLE `deptphone`
  ADD PRIMARY KEY (`DCode`,`DeptPhone`);

ALTER TABLE `instrphone`
  ADD PRIMARY KEY (`ID`,`IPhone`);

ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DCode` (`DCode`);

ALTER TABLE `logindetail`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_SID_login` (`SID`);

ALTER TABLE `section`
  ADD PRIMARY KEY (`SecId`),
  ADD KEY `InstructorID` (`InstructorID`,`CoCode`),
  ADD KEY `FK_CoCode` (`CoCode`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `DCode` (`DCode`);

ALTER TABLE `studentphone`
  ADD PRIMARY KEY (`SID`,`SPhone`);

ALTER TABLE `takes`
  ADD PRIMARY KEY (`SID`,`SecID`),
  ADD KEY `FK_SecID` (`SecID`);


ALTER TABLE `cart`
  ADD CONSTRAINT `SID_FK` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `SecId_FK` FOREIGN KEY (`SecId`) REFERENCES `section` (`SecId`) ON UPDATE CASCADE;

ALTER TABLE `college`
  ADD CONSTRAINT `FK_DeanID` FOREIGN KEY (`DeanId`) REFERENCES `instructor` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `collegephone`
  ADD CONSTRAINT `FK_CollegePhone` FOREIGN KEY (`CName`) REFERENCES `college` (`CName`) ON UPDATE CASCADE;

ALTER TABLE `course`
  ADD CONSTRAINT `FK_CoDeptCode` FOREIGN KEY (`CoDCode`) REFERENCES `department` (`DCode`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `department`
  ADD CONSTRAINT `FK_CName` FOREIGN KEY (`CName`) REFERENCES `college` (`CName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DeptChairID` FOREIGN KEY (`DeptChairID`) REFERENCES `instructor` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `deptphone`
  ADD CONSTRAINT `FK_DeptPhone` FOREIGN KEY (`DCode`) REFERENCES `department` (`DCode`) ON UPDATE CASCADE;

ALTER TABLE `instrphone`
  ADD CONSTRAINT `FK_InstrPhone` FOREIGN KEY (`ID`) REFERENCES `instructor` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `instructor`
  ADD CONSTRAINT `FK_IDCode` FOREIGN KEY (`DCode`) REFERENCES `department` (`DCode`) ON UPDATE CASCADE;

ALTER TABLE `logindetail`
  ADD CONSTRAINT `FK_SID_login` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON UPDATE CASCADE;

ALTER TABLE `section`
  ADD CONSTRAINT `FK_CoCode` FOREIGN KEY (`CoCode`) REFERENCES `course` (`CoCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_InstrID` FOREIGN KEY (`InstructorID`) REFERENCES `instructor` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `student`
  ADD CONSTRAINT `FK_DeptCode` FOREIGN KEY (`DCode`) REFERENCES `department` (`DCode`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `studentphone`
  ADD CONSTRAINT `FK_StudentPhone` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON UPDATE CASCADE;

ALTER TABLE `takes`
  ADD CONSTRAINT `FK_SID` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SecID` FOREIGN KEY (`SecID`) REFERENCES `section` (`SecId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
