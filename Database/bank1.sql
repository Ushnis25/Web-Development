-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 02:45 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank1`
--

-- --------------------------------------------------------

--
-- Table structure for table `a/c_master`
--

CREATE TABLE `a/c_master` (
  `AccType` varchar(25) NOT NULL,
  `Prefix` varchar(11) NOT NULL,
  `MinBalance` double(12,2) NOT NULL,
  `Interest` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a/c_master`
--

INSERT INTO `a/c_master` (`AccType`, `Prefix`, `MinBalance`, `Interest`) VALUES
('Current', 'cur', 60000.00, 600.00),
('Salary', 'sal', 0.00, 10.00),
('Savings', 'sv', 4000.00, 500.00),
('Student', 'stu', 500.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `a/c_status`
--

CREATE TABLE `a/c_status` (
  `AccStatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a/c_status`
--

INSERT INTO `a/c_status` (`AccStatus`) VALUES
('Active'),
('Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccNo` varchar(25) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `AccStatus` varchar(25) NOT NULL,
  `AccOpenDate` date NOT NULL,
  `AccType` varchar(25) NOT NULL,
  `AccBalance` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccNo`, `CustomerID`, `AccStatus`, `AccOpenDate`, `AccType`, `AccBalance`) VALUES
('89768', 0, 'active', '2019-10-22', 'Current', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `IFSCCode` varchar(25) NOT NULL,
  `BranchName` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `BranchAddr` varchar(70) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`IFSCCode`, `BranchName`, `City`, `BranchAddr`, `State`, `Country`) VALUES
('KOWB2345', 'Parent Branch', 'Kolkata', '3A/4 Sector I,Salt Lake City,Kol-08', 'West Bengal', 'India'),
('LOENG8990', 'Child Branch 2', 'London', '29DE/55 Lake View Road, London-98', 'Edgbaston', 'England'),
('PUMR5676', 'Child Branch 1', 'Pune', '9A/3 Shivaji Road, Pune - 09', 'Maharashtra', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `IFSCCode` varchar(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `LoginID` varchar(25) NOT NULL,
  `AccPass` varchar(50) NOT NULL,
  `TransPass` varchar(50) NOT NULL,
  `AccStatus` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `AccOpenDate` date NOT NULL,
  `LastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `IFSCCode`, `FirstName`, `LastName`, `LoginID`, `AccPass`, `TransPass`, `AccStatus`, `City`, `State`, `Country`, `AccOpenDate`, `LastLogin`) VALUES
(0, 'KOWB2345', 'user', 'user', 'user', 'user', 'user', 'active', 'Kolkata', 'WestBengal', 'India', '2019-10-22', '2019-10-23 02:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `registered_payee`
--

CREATE TABLE `registered_payee` (
  `SlNo` int(11) NOT NULL,
  `CustomerID` varchar(25) NOT NULL,
  `PayeeName` varchar(25) NOT NULL,
  `AccNo` varchar(25) NOT NULL,
  `AccType` varchar(25) NOT NULL,
  `BankName` varchar(25) NOT NULL,
  `IFSCCode` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_payee`
--

INSERT INTO `registered_payee` (`SlNo`, `CustomerID`, `PayeeName`, `AccNo`, `AccType`, `BankName`, `IFSCCode`) VALUES
(1, '0', 'Ushnis', '7908', 'Savings', 'PNB', 'PNB7656'),
(2, '1', 'Sugata', '9545', 'Savings', 'SBI', 'SBI67543');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransID` int(11) NOT NULL,
  `PaymentDate` datetime NOT NULL,
  `PayeeID` int(11) NOT NULL,
  `ReceiveID` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `PaymentStat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `LoginID` varchar(25) NOT NULL,
  `Pass` varchar(25) NOT NULL,
  `CreateDate` date NOT NULL,
  `LastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `LoginID`, `Pass`, `CreateDate`, `LastLogin`) VALUES
(0, 'user', 'user', 'user', '2019-10-22', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a/c_master`
--
ALTER TABLE `a/c_master`
  ADD PRIMARY KEY (`AccType`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`IFSCCode`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `registered_payee`
--
ALTER TABLE `registered_payee`
  ADD PRIMARY KEY (`SlNo`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_payee`
--
ALTER TABLE `registered_payee`
  MODIFY `SlNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
