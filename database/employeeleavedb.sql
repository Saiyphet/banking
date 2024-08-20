-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 09:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeeleavedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `fullname`, `email`, `updationDate`) VALUES
(1, 'admin', 'd00f5d5217896fb7fd601412cb890830', 'Liam Moore', 'admin@mail.com', '2022-02-09 08:15:46'),
(2, 'bruno', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bruno Den', 'itsbruno@mail.com', '2022-02-09 08:15:50'),
(3, 'greenwood', '5f4dcc3b5aa765d61d8327deb882cf99', 'Johnny Greenwood', 'greenwood@mail.com', '2022-02-09 08:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(100) NOT NULL,
  `class` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `class`) VALUES
(1, 'BB720'),
(2, 'BB820'),
(3, 'BB920');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `classroom` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `classroom`) VALUES
(1, 'E111'),
(2, 'E112');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_det`
--

CREATE TABLE `invoice_det` (
  `DET_ID` int(11) NOT NULL,
  `MST_ID` int(11) DEFAULT NULL,
  `PRODUCT_NAME` varchar(255) DEFAULT NULL,
  `AMOUNT` double(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_det`
--

INSERT INTO `invoice_det` (`DET_ID`, `MST_ID`, `PRODUCT_NAME`, `AMOUNT`) VALUES
(1, 1, 'DOMAIN WWW.SHINERWEB.COM', 899.00),
(2, 1, 'DATABASE MYSQL', 3499.00),
(3, 1, 'EMAIL SERVICES', 799.00),
(4, 2, 'DOMAIN WWW.GOOGLE.COM', 4500.00),
(5, 2, 'EMAIL SERVICES', 799.00),
(6, 3, 'DOMAIN WWW.FACEBOOK.COM', 7999.00);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_mst`
--

CREATE TABLE `invoice_mst` (
  `MST_ID` int(11) NOT NULL,
  `INV_NO` varchar(100) DEFAULT NULL,
  `CUSTOMER_NAME` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CUSTOMER_MOBILENO` varchar(10) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_mst`
--

INSERT INTO `invoice_mst` (`MST_ID`, `INV_NO`, `CUSTOMER_NAME`, `CUSTOMER_MOBILENO`, `ADDRESS`) VALUES
(1, 'INV01', 'ສາຍເພັດ\r\n', '9825121212', 'VALSAD, GUJARAT'),
(2, 'INV02', 'ROSHNI PATEL', '8457878878', 'CHIKHLI, GUJARAT'),
(3, 'INV03', 'DITYA PATEL', '7487878788', 'JESPOR, VALSAD');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DepartmentShortName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DepartmentCode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'Human Resource', 'HR', 'HR160', '2020-11-01 00:16:25'),
(2, 'Information Technology', 'IT', 'IT807', '2020-11-01 00:19:37'),
(3, 'Operations', 'OP', 'OP640', '2020-12-02 14:28:56'),
(4, 'Volunteer', 'VL', 'VL9696', '2021-03-03 01:27:52'),
(5, 'Marketing', 'MK', 'MK369', '2021-03-03 03:53:52'),
(6, 'Finance', 'FI', 'FI123', '2021-03-03 03:54:27'),
(7, 'Sales', 'SS', 'SS469', '2021-03-03 03:55:24'),
(8, 'Research', 'RS', 'RS666', '2021-03-03 09:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `EmailId` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Dob` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Country` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Phonenumber` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `City`, `Country`, `Phonenumber`, `Status`, `RegDate`) VALUES
(1, 'ASTR001245', 'ສາຍເພັດ', 'ວົງດາລາ', 'saiyphet@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', '2003-06-02', 'Information Technology', 'borlikhamxai', 'paksun', 'LAOs', '7854785477', 1, '2020-11-10 04:29:59'),
(2, 'ASTR001369', 'Milton', 'Doe', 'milt@mail.com', '01cfcd4f6b8770febfb40cb906715822', 'Male', '1990-02-02', 'Operations', '15 Kincheloe Road', 'Salem', 'US', '8587944255', 1, '2020-11-10 06:40:02'),
(3, 'ASTR004699', 'ສາຍຄຳ', 'Den', 'Shawnden@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', '1995-03-22', 'Human Resource', '239 Desert Court', 'Wayne', 'US', '7458887169', 1, '2021-03-03 00:24:17'),
(4, 'ASTR002996', 'Carol', 'Reed', 'carol@mail.com', '723e1489a45d2cbaefec82eee410abd5', 'Female', '1989-03-23', 'Volunteer', 'Demo Address', 'Demo City', 'Demo Country', '7854448550', 1, '2021-03-03 03:44:13'),
(5, 'ASTR001439', 'Danny', 'Wood', 'danny@mail.com', 'b7bee6b36bd35b773132d4e3a74c2bb5', 'Male', '1986-03-12', 'Research', '11 Rardin Drive', 'San Francisco', 'US', '4587777744', 1, '2021-03-04 10:14:48'),
(6, 'ASTR006946', 'Shawn', 'Martin', 'shawn@mail.com', 'a3cceba83235dc95f750108d22c14731', 'Male', '1992-08-28', 'Finance', '3259 Ray Court', 'Wilmington', 'US', '8520259670', 1, '2021-03-04 10:46:02'),
(7, 'ASTR000084', 'Jennifer', 'Foltz', 'jennifer@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Female', '1992-12-11', 'Marketing', '977 Smithfield Avenue', 'Elkins', 'US', '7401256696', 1, '2022-02-09 08:29:00'),
(8, 'ASTR012447', 'Will', 'Williams', 'williams@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', '1992-02-15', 'Research', '366 Cemetery Street', 'Houston', 'US', '7854000065', 1, '2022-02-10 08:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `Fromdate` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdminRemarkDate` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `timestart` time DEFAULT NULL,
  `endtime` time NOT NULL,
  `classroom` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `Fromdate`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `empid`, `timestart`, `endtime`, `classroom`, `class`) VALUES
(74, 'ສາຂາການບັນຊີກວດສອບ', '2020-03-21', 'ddddddddddddd', '2023-10-18 06:05:11', 'ສອນແທນ', '2024-06-14 9:05:57 ', 1, 1, 1, '08:01:00', '08:15:00', 'E112', 'BB820'),
(76, 'ສາຂາການບັນຊີກວດສອບ', '2000-03-05', 'eeeeeeeeeeeeee', '2023-10-19 06:32:15', NULL, NULL, 0, 1, 1, '08:31:00', '09:32:00', 'E111', 'BB820'),
(91, 'ສາຂາການບັນຊີກວດສອບ', '2023-10-21', 'iioo', '2023-10-21 03:36:07', NULL, 'No comments!!', 1, 1, 1, '00:35:00', '00:38:00', 'E111', 'BB720'),
(96, 'ສາຂາການເງິນ', '2023-10-23', 'ບົດທີ່ 3 ການບັນຊີ', '2023-10-23 10:32:43', 'ຂື້ນຫ້ອງຊ້າ', '2023-10-25 12:49:43 ', 2, 1, 1, '08:00:00', '10:50:00', 'E111', 'BB820'),
(99, 'ສາຂາການເງິນ', '2023-11-05', 'eeeeeeeeeeeeeeeeeeeeeklhlhhklhlkhlkhlkh', '2023-11-05 06:52:51', 'ຂຶ້ນສອນປົກກະຕິ', '2024-05-22 20:02:36 ', 1, 1, 1, '18:56:00', '04:52:00', 'E111', 'BB820'),
(100, 'ສາຂາການບັນຊິ', '2023-11-05', 'hew', '2023-11-05 06:55:05', 'as', '2023-12-20 2:41:09 ', 1, 1, 1, '07:00:00', '08:00:00', 'E111', 'BB820'),
(106, 'ສາຂາການເງິນ', '2023-11-26', 'ສາບາຍດີ kafdakf', '2023-11-26 15:39:47', 'klkl', '2023-11-26 21:11:03 ', 1, 1, 3, '14:39:00', '03:39:00', 'E112', 'BB720'),
(107, 'ສາຂາການທະນາຄານ', '2023-12-05', 'adsasd', '2023-12-05 07:22:13', 'l', '2023-12-19 18:40:00 ', 1, 1, 3, '08:21:00', '09:00:00', 'E111', 'BB720'),
(108, 'ສາຂາການບັນຊີກວດສອບ', '2024-06-14', 'ບົດທີ່5 alert into', '2024-06-14 03:41:56', NULL, NULL, 0, 1, 1, '08:41:00', '11:00:00', 'E111', 'BB720');

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `CreationDate`) VALUES
(1, 'ສາຂາການທະນາຄານ', 'Provided for urgent or unforeseen matters to the employees.', '2020-11-01 05:07:56'),
(2, 'ສາຂາການເງິນ', 'Related to Health Problems of Employee', '2020-11-06 06:16:09'),
(3, 'ສາຂາການບັນຊິ', 'Holiday that is optional', '2020-11-06 06:16:38'),
(5, 'ສາຂາການບັນຊີກວດສອບ', 'To take care of newborns', '2021-03-03 03:46:31'),
(6, 'ສາຂາການເງິນຈຸລະພາກ', 'Grieve their loss of losing loved ones', '2021-03-03 03:47:48');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_report_pdf`
-- (See below for the actual view)
--
CREATE TABLE `v_report_pdf` (
`id` int(11)
,`LeaveType` varchar(110)
,`Fromdate` varchar(120)
,`Description` mediumtext
,`PostingDate` timestamp
,`IsRead` int(1)
,`EmpId` varchar(100)
,`FirstName` varchar(150)
,`LastName` varchar(150)
,`timestart` time
,`endtime` time
,`classroom` varchar(30)
,`class` varchar(30)
,`Status` int(1)
,`AdminRemark` mediumtext
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_report_user`
-- (See below for the actual view)
--
CREATE TABLE `v_report_user` (
`LeaveType` varchar(110)
,`Fromdate` varchar(120)
,`Description` mediumtext
,`AdminRemark` mediumtext
,`timestart` time
,`endtime` time
,`Status` int(1)
,`class` varchar(30)
,`classroom` varchar(30)
,`id` int(11)
,`idEmp` int(11)
,`EmpId` varchar(100)
,`FirstName` varchar(150)
,`LastName` varchar(150)
);

-- --------------------------------------------------------

--
-- Structure for view `v_report_pdf`
--
DROP TABLE IF EXISTS `v_report_pdf`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_report_pdf`  AS SELECT `tblleaves`.`id` AS `id`, `tblleaves`.`LeaveType` AS `LeaveType`, `tblleaves`.`Fromdate` AS `Fromdate`, `tblleaves`.`Description` AS `Description`, `tblleaves`.`PostingDate` AS `PostingDate`, `tblleaves`.`IsRead` AS `IsRead`, `tblemployees`.`EmpId` AS `EmpId`, `tblemployees`.`FirstName` AS `FirstName`, `tblemployees`.`LastName` AS `LastName`, `tblleaves`.`timestart` AS `timestart`, `tblleaves`.`endtime` AS `endtime`, `tblleaves`.`classroom` AS `classroom`, `tblleaves`.`class` AS `class`, `tblleaves`.`Status` AS `Status`, `tblleaves`.`AdminRemark` AS `AdminRemark` FROM (`tblleaves` left join `tblemployees` on(`tblleaves`.`empid` = `tblemployees`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_report_user`
--
DROP TABLE IF EXISTS `v_report_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_report_user`  AS SELECT `tblleaves`.`LeaveType` AS `LeaveType`, `tblleaves`.`Fromdate` AS `Fromdate`, `tblleaves`.`Description` AS `Description`, `tblleaves`.`AdminRemark` AS `AdminRemark`, `tblleaves`.`timestart` AS `timestart`, `tblleaves`.`endtime` AS `endtime`, `tblleaves`.`Status` AS `Status`, `tblleaves`.`class` AS `class`, `tblleaves`.`classroom` AS `classroom`, `tblleaves`.`id` AS `id`, `tblemployees`.`id` AS `idEmp`, `tblemployees`.`EmpId` AS `EmpId`, `tblemployees`.`FirstName` AS `FirstName`, `tblemployees`.`LastName` AS `LastName` FROM ((`tblemployees` join `tblleaves` on(`tblemployees`.`id` = `tblleaves`.`empid` and `tblemployees`.`id` = `tblleaves`.`empid`)) join `tblleavetype`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_det`
--
ALTER TABLE `invoice_det`
  ADD PRIMARY KEY (`DET_ID`);

--
-- Indexes for table `invoice_mst`
--
ALTER TABLE `invoice_mst`
  ADD PRIMARY KEY (`MST_ID`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_det`
--
ALTER TABLE `invoice_det`
  MODIFY `DET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_mst`
--
ALTER TABLE `invoice_mst`
  MODIFY `MST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
