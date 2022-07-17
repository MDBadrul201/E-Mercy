-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 08:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospitalID` int(30) NOT NULL,
  `hospitalName` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospitalID`, `hospitalName`, `department`) VALUES
(1, 'Avenue Hospital Kuala Lumpur', 'Obstetrics and Gynaecology (O&G)'),
(2, 'Avenue Hospital Skudai Johor', 'Orthopaedic & Trauma Surgery'),
(3, 'Avenue Hospital Miri Serawak', 'Respiratory Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `staffID` int(30) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASS` varchar(30) NOT NULL,
  `staffName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`staffID`, `USERNAME`, `PASS`, `staffName`) VALUES
(2, 'abc', '123', 'NUR AISYAH BINTI MOHD ASRI'),
(3, 'bad', '123', 'MOHD BADRUL AMIN BIN SAFARY'),
(4, 'hilman', '123', 'HILMAN HAKIMI BIN NOR AFFANDI'),
(5, 'bal', '123', 'SITIE NOOR AMIRRA BALQQIS BINTI AHMAD TAJMUNIZAM');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(30) NOT NULL,
  `patientName` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(3) NOT NULL,
  `patientIC` bigint(25) NOT NULL,
  `patientPhone` varchar(25) NOT NULL,
  `patientAddress` varchar(255) NOT NULL,
  `hospitalID` int(30) NOT NULL,
  `staffID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `patientName`, `gender`, `age`, `patientIC`, `patientPhone`, `patientAddress`, `hospitalID`, `staffID`) VALUES
(1, 'MOHAMAD HALIM BIN ABDUL', 'L', 26, 960714145789, '0133310224', 'Taman Impian Putra', 1, 1),
(2, 'ISMAIL BIN ISHAK', 'L', 62, 600514105663, '0183474839', 'Bandar Bukit Mahkota', 1, 1),
(3, 'AINUR ALISA BINTI RUZIAN', 'P', 21, 11113102736, '0183747567', 'Desa Pinggiran Putra', 1, 1),
(4, 'AHMED MALIK BIN AHMED KHAIR', 'L', 52, 700415106785, '0178378393', 'Miri', 3, 3),
(5, 'MOHD JALIL  BIN HAMID', 'L', 55, 670101035861, '0196896990', 'Taman Skudai Lama', 2, 5),
(6, 'AHMAD ALI BIN JAMEL', 'L', 53, 690209146371, '0173782939', 'Parit Raja', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(30) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `staffDepartment` varchar(255) NOT NULL,
  `hospitalID` int(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender_staff` varchar(6) NOT NULL,
  `age_staff` int(3) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffDepartment`, `hospitalID`, `address`, `gender_staff`, `age_staff`, `img_name`, `img_data`) VALUES
(3, 'MOHD BADRUL AMIN BIN SAFARY', 'ENT / Otorhinolaryngology', 3, 'Miri', 'L', 45, '', ''),
(7, 'SITIE NOOR AMIRRA BALQQIS BINTI AHMAD TAJMUNIZAM', 'Anaesthesiology', 2, 'Jenjarom', 'P', 40, '', ''),
(8, 'DR NUR AISYAH BINTI MOHD ASRI', 'Obstetrics and Gynaecology (O&G) ', 1, 'BANDAR SERI PUTRA', 'P', 30, '', ''),
(9, 'DR ALIA YASMIN SUZLY', 'ENT', 1, 'TAMAN IMPIAN PUTRA', 'P', 45, '', ''),
(11, 'DR KAMAL HASAN', 'SURGERY', 2, 'MIRI', 'L', 45, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `type_treatment` varchar(20) NOT NULL,
  `staffID` varchar(20) NOT NULL,
  `patientID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`type_treatment`, `staffID`, `patientID`) VALUES
('BRAIN SURGERY', '9', 4),
('OnG', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `bed_num` int(30) NOT NULL,
  `room_num` int(30) NOT NULL,
  `patientID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospitalID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`),
  ADD KEY `fkey2` (`hospitalID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `fkeykot` (`staffID`),
  ADD KEY `hospitalID` (`hospitalID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`type_treatment`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD KEY `patientID` (`patientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `staffID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
