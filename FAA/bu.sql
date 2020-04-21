-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2020 at 09:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bu`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `persoon_id` int(11) DEFAULT NULL,
  `acces` char(6) DEFAULT NULL,
  `log_date` date DEFAULT NULL,
  `log_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `persoon`
--

CREATE TABLE `persoon` (
  `persoon_id` int(11) NOT NULL,
  `persoon_naam` varchar(50) NOT NULL,
  `persoon_voornaam` varchar(50) NOT NULL,
  `persoon_tel` varchar(10) DEFAULT NULL,
  `persoon_email` varchar(20) DEFAULT NULL,
  `persoon_adres` varchar(20) DEFAULT NULL,
  `rol_id` int(20) DEFAULT NULL,
  `richting_id` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persoon`
--

INSERT INTO `persoon` (`persoon_id`, `persoon_naam`, `persoon_voornaam`, `persoon_tel`, `persoon_email`, `persoon_adres`, `rol_id`, `richting_id`, `password`) VALUES
(8, 'admin', 'admin', NULL, NULL, NULL, 1, NULL, '$2y$10$12dLqdJVvQqASwf2Fem2uOm7Z7ySaFCr7xCmaoxgNz4oTveJowZpy'),
(14, 'overall', 'overall', NULL, NULL, NULL, 2, NULL, '$2y$10$gy8SaTjaBsbUj1TwTm78ne58ChCruptQTeHeSD7mPaySeMhhIPFym');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_naam` varchar(40) NOT NULL,
  `persoon_id` int(11) DEFAULT NULL,
  `prject_budget` double DEFAULT NULL,
  `project_start` date DEFAULT NULL,
  `project_eind` date DEFAULT NULL,
  `project_beschrijving` text DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `richting`
--

CREATE TABLE `richting` (
  `richting_id` int(20) NOT NULL,
  `naam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `richting`
--

INSERT INTO `richting` (`richting_id`, `naam`) VALUES
(1, 'ict');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(20) NOT NULL,
  `naam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`rol_id`, `naam`) VALUES
(1, 'admin'),
(2, 'overall'),
(3, 'student'),
(4, 'docent'),
(5, 'fin');

-- --------------------------------------------------------

--
-- Table structure for table `taak`
--

CREATE TABLE `taak` (
  `taak_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `persoon_id` int(11) DEFAULT NULL,
  `taak_naam` varchar(20) DEFAULT NULL,
  `taak_beschrijving` text DEFAULT NULL,
  `taak_einde` date DEFAULT NULL,
  `taak_status` varchar(8) DEFAULT 'progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `persoon`
--
ALTER TABLE `persoon`
  ADD PRIMARY KEY (`persoon_id`,`persoon_naam`,`persoon_voornaam`),
  ADD KEY `FK_rol` (`rol_id`),
  ADD KEY `FK_richting` (`richting_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`,`project_naam`),
  ADD KEY `FK_persoon` (`persoon_id`);

--
-- Indexes for table `richting`
--
ALTER TABLE `richting`
  ADD PRIMARY KEY (`richting_id`),
  ADD KEY `rol` (`richting_id`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`),
  ADD KEY `richting` (`rol_id`);

--
-- Indexes for table `taak`
--
ALTER TABLE `taak`
  ADD PRIMARY KEY (`taak_id`),
  ADD KEY `FK_TKproject` (`project_id`),
  ADD KEY `FK_TKpersoon` (`persoon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persoon`
--
ALTER TABLE `persoon`
  MODIFY `persoon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `richting`
--
ALTER TABLE `richting`
  MODIFY `richting_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taak`
--
ALTER TABLE `taak`
  MODIFY `taak_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_persoon` FOREIGN KEY (`persoon_id`) REFERENCES `persoon` (`persoon_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
