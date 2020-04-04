-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 02:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uwu99.2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bike`
--

CREATE TABLE `bike` (
  `BID` char(8) NOT NULL,
  `Zone` char(20) NOT NULL,
  `Type` char(20) NOT NULL,
  `Rate` int(11) NOT NULL DEFAULT 0,
  `Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike`
--

INSERT INTO `bike` (`BID`, `Zone`, `Type`, `Rate`, `Active`) VALUES
('B1236785', 'Kitsilano', 'Road', 27, 0),
('B1243632', 'Downtown', 'Road', 25, 1),
('B1789434', 'Downtown', 'Road', 20, 1),
('B3456582', 'Kitsilano', 'Mountain', 20, 0),
('B3458323', 'UBC', 'Road', 18, 1),
('B4724785', 'Downtown', 'Road', 14, 1),
('B7246781', 'UBC', 'Folding', 26, 1),
('B7832451', 'Kitsilano', 'Mountain', 40, 1),
('B8723452', 'Downtown', 'Mountain', 35, 0),
('B8901234', 'Kitsilano', 'Folding', 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookedlisting`
--

CREATE TABLE `bookedlisting` (
  `Address` char(20) NOT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Username` char(40) NOT NULL,
  `BookedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookedlisting`
--

INSERT INTO `bookedlisting` (`Address`, `Duration`, `Username`, `BookedDate`) VALUES
('2020 BeBetter Rd.', 21, 'Amy99@gmail.com', '2023-12-05 00:00:00'),
('6123 Joseph St', 18, 'Brandon98@gmail.com', '2025-05-05 00:00:00'),
('445 UBC Rd', 5, 'G-Tang@gmail.com', '2025-04-04 00:00:00'),
('999 Kobe Street', 12, 'G-Tang@gmail.com', '2024-03-03 00:00:00'),
('321 Football Street', 7, 'Harry88@gmail.com', '2024-07-03 00:00:00'),
('2918 Granville St', 4, 'JK4Prez@gmail.com', '2020-01-01 00:00:00'),
('2918 Burrard St', 5, 'RL7799@gmail.com', '2022-02-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `PlateNumber` char(8) NOT NULL,
  `Zone` char(20) NOT NULL,
  `Insurance` char(20) NOT NULL,
  `Model` char(20) NOT NULL,
  `Rate` float NOT NULL DEFAULT 0,
  `Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`PlateNumber`, `Zone`, `Insurance`, `Model`, `Rate`, `Active`) VALUES
('123-BDDJ', 'Downtown', 'N1289427385', 'Honda Civic', 3.9, 1),
('13N-2N1', 'Downtown', 'N793628229', 'Toyota Camry', 4.1, 1),
('13N2-2N1', 'UBC', 'N7936283948', 'Toyota Camry', 4.2, 0),
('200-BBCI', 'Downtown', 'S0683729847', 'Porsche Cayenne', 5, 0),
('243-BBCI', 'Kitsilano', 'S0683720193', 'Porsche 9-11', 4.9, 1),
('243-BDDJ', 'Kitsilano', 'N1209427385', 'Honda Civic', 3.5, 1),
('911-C2K', 'Downtown', 'N435687492', 'Nissan GT-R', 2.8, 1),
('9362-C2K', 'Kitsilano', 'N5026837492', 'Nissan Rogue', 2.5, 1),
('LDK-2081', 'Kitsilano', 'S2336901384', 'Aston Martin One 77', 4.3, 0),
('LDK-2581', 'UBC', 'S2382959384', 'Aston Martin One 77', 4.1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `Username` char(40) NOT NULL,
  `Email` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`Username`, `Email`) VALUES
('BioProf@gmail.com', 'Bfriend@gmail.com'),
('G-Tang@gmail.com', 'Gfriend@gmail.com'),
('JK4Prez@gmail.com', 'Jfriend@gmail.com'),
('PhysicsProf@gmail.com', 'Pfriend@gmail.com'),
('RL7799@gmail.com', 'Rfriend@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeper`
--

CREATE TABLE `housekeeper` (
  `HID` char(8) NOT NULL,
  `Zone` char(20) NOT NULL,
  `Rate` float NOT NULL DEFAULT 0,
  `Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `housekeeper`
--

INSERT INTO `housekeeper` (`HID`, `Zone`, `Rate`, `Active`) VALUES
('HK127389', 'Downtown', 13.5, 1),
('HK128934', 'UBC', 13, 1),
('HK637823', 'Downtown', 13.5, 1),
('HK743234', 'Downtown', 14.2, 1),
('HK763489', 'North Vancouver', 16, 1),
('HK827303', 'Kitsilano', 16.2, 1),
('HK827346', 'Downtown', 15.5, 1),
('HK834857', 'Kitsilano', 14, 1),
('HK835782', 'Kerrisdale', 15.2, 1),
('HK873426', 'Kitsilano', 15.7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `housekeepingagent`
--

CREATE TABLE `housekeepingagent` (
  `Username` char(40) NOT NULL,
  `Zone` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `housekeepingagent`
--

INSERT INTO `housekeepingagent` (`Username`, `Zone`) VALUES
('DTClearnhouses@gmail.com', 'Downtown'),
('NoTrouble@gmail.com', 'Kerrisdale'),
('KitsHK@gmail.com', 'Kitsilano'),
('EasyLife@gmail.com', 'North Vancouver'),
('CheapCleaning@gmail.com', 'UBC');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `Address` char(30) NOT NULL,
  `Username` char(40) DEFAULT NULL,
  `Price` float NOT NULL,
  `Parking` tinyint(1) NOT NULL DEFAULT 0,
  `Active` tinyint(1) NOT NULL DEFAULT 1,
  `Rating` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`Address`, `Username`, `Price`, `Parking`, `Active`, `Rating`) VALUES
('001 GoodGame Ave', 'kitsRentals@gmail.com', 222, 1, 0, 3.8),
('001 Trump Ave', 'DTStays@gmail.com', 60, 0, 0, 2.2),
('123 CPSC Street', 'UBCvisits@gmail.com', 65, 1, 1, 2.8),
('2020 BeBetter Rd.', 'kitsRentals@gmail.com', 140, 1, 1, 4.2),
('2918 Burrard St', 'bestdtrentals@gmail.com', 240, 1, 0, 4.3),
('2918 Granville St', 'DTStays@gmail.com', 280, 1, 1, 4.3),
('321 Football Street', 'TripAdvisors@gmail.com', 175, 0, 0, 4.2),
('445 UBC Rd', 'UBCStay@gmail.com', 95, 0, 1, 3.9),
('6123 Joseph St', 'holidayStay@gmail.com', 180, 1, 0, 3.2),
('9 Basketball Street', 'tripstay@gmail.com', 88, 0, 1, 4.2),
('909 Bison Rd', 'holidayStay@gmail.com', 260, 1, 1, 4.7),
('909 UBCO Rd', 'UBCStay@gmail.com', 100, 1, 1, 3.8),
('999 Kobe Street', 'bestdtrentals@gmail.com', 300, 0, 1, 4.1);

-- --------------------------------------------------------

--
-- Table structure for table `loanedbike`
--

CREATE TABLE `loanedbike` (
  `BID` char(8) NOT NULL,
  `Username` char(40) NOT NULL,
  `LoanDate` datetime NOT NULL,
  `Duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loanedbike`
--

INSERT INTO `loanedbike` (`BID`, `Username`, `LoanDate`, `Duration`) VALUES
('B1243632', 'Brandon98@gmail.com', '2012-02-25 00:00:00', 2),
('B1789434', 'JK4Prez@gmail.com', '2012-01-01 00:00:00', 5),
('B3456582', 'Harry88@gmail.com', '2012-04-01 00:00:00', 6),
('B3458323', 'RL7799@gmail.com', '2012-03-12 00:00:00', 33),
('B7832451', 'G-Tang@gmail.com', '2012-02-23 00:00:00', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orderedhousekeeper`
--

CREATE TABLE `orderedhousekeeper` (
  `HID` char(8) NOT NULL,
  `Address` char(20) NOT NULL,
  `Username` char(40) NOT NULL,
  `OrderedDate` datetime NOT NULL,
  `Hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderedhousekeeper`
--

INSERT INTO `orderedhousekeeper` (`HID`, `Address`, `Username`, `OrderedDate`, `Hours`) VALUES
('HK127389', '2918 Granville St', 'JK4Prez@gmail.com', '2020-01-01 00:00:00', 6),
('HK128934', '445 UBC Rd', 'G-Tang@gmail.com', '2025-04-04 00:00:00', 4),
('HK743234', '999 Kobe Street', 'G-Tang@gmail.com', '2024-03-03 00:00:00', 3),
('HK827346', '2918 Burrard St', 'RL7799@gmail.com', '2022-02-02 00:00:00', 3),
('HK834857', '321 Football Street', 'Harry88@gmail.com', '2024-07-03 00:00:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `propertyagent`
--

CREATE TABLE `propertyagent` (
  `Username` char(40) NOT NULL,
  `Zone` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertyagent`
--

INSERT INTO `propertyagent` (`Username`, `Zone`) VALUES
('bestdtrentals@gmail.com', 'Downtown'),
('DTStays@gmail.com', 'Downtown'),
('holidayStay@gmail.com', 'North Vancouver'),
('kitsRentals@gmail.com', 'Kitsilano'),
('TripAdvisors@gmail.com', 'Kitsilano'),
('tripstay@gmail.com', 'Kerrisdale'),
('UBCStay@gmail.com', 'UBC'),
('UBCvisits@gmail.com', 'UBC');

-- --------------------------------------------------------

--
-- Table structure for table `rentedcar`
--

CREATE TABLE `rentedcar` (
  `PlateNumber` char(8) NOT NULL,
  `Username` char(40) NOT NULL,
  `RentDate` datetime NOT NULL,
  `Duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentedcar`
--

INSERT INTO `rentedcar` (`PlateNumber`, `Username`, `RentDate`, `Duration`) VALUES
('13N2-2N1', 'Harry88@gmail.com', '2019-04-01 00:00:00', 6),
('243-BBCI', 'RL7799@gmail.com', '2018-03-12 00:00:00', 21),
('243-BDDJ', 'JK4Prez@gmail.com', '2020-01-01 00:00:00', 5),
('9362-C2K', 'Brandon98@gmail.com', '2020-02-25 00:00:00', 14),
('LDK-2581', 'G-Tang@gmail.com', '2019-02-23 00:00:00', 18);

-- --------------------------------------------------------

--
-- Table structure for table `takentour`
--

CREATE TABLE `takentour` (
  `Name` char(30) NOT NULL,
  `Username` char(40) NOT NULL,
  `TakenDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `takentour`
--

INSERT INTO `takentour` (`Name`, `Username`, `TakenDate`) VALUES
('Campus tour', 'Harry78@gmail.com', '1999-02-03 00:00:00'),
('Fire works', 'RL7799@gmail.com', '2020-04-13 00:00:00'),
('Historical Walk', 'PhysicsProf@gmail.com', '1929-08-01 00:00:00'),
('Safari', 'JK4Prez@gmail.com', '2012-04-01 00:00:00'),
('Shopping tour', 'G-Tang@gmail.com', '2020-02-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `Name` char(30) NOT NULL,
  `Zone` char(20) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`Name`, `Zone`, `Price`, `Active`) VALUES
('Beach walk', 'Kitsilano', 20, 1),
('Campus tour', 'UBC', 15, 0),
('Christmas Market', 'Downtown', 15, 0),
('Fire works', 'Kitsilano', 20, 0),
('Garden walk', 'UBC', 15, 1),
('Historical Walk', 'Downtown', 15, 1),
('Museum tour', 'UBC', 15, 1),
('Night scene', 'Downtown', 20, 0),
('Safari', 'North Vancouver', 35, 1),
('Shopping tour', 'Downtown', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tourismagent`
--

CREATE TABLE `tourismagent` (
  `Username` char(40) NOT NULL,
  `Zone` char(20) NOT NULL,
  `Website` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourismagent`
--

INSERT INTO `tourismagent` (`Username`, `Zone`, `Website`) VALUES
('BestTours@gmail.com', 'Kitsilano', 'www.besttours.com'),
('FamilyTours@gmail.com', 'UBC', 'www.familytours.com'),
('Hottours@gmail.com', 'Kerrisdale', 'www.hottours.com'),
('ToursGo@gmail.com', 'Downtown', 'www.toursgo.com'),
('TravellingTours@gmail.com', 'North Vancouver', 'www.travellingtours.com');

-- --------------------------------------------------------

--
-- Table structure for table `transportationagent`
--

CREATE TABLE `transportationagent` (
  `Username` char(40) NOT NULL,
  `Zone` char(20) NOT NULL,
  `CRate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transportationagent`
--

INSERT INTO `transportationagent` (`Username`, `Zone`, `CRate`) VALUES
('Avis@gmail.com', 'Kitsilano', 4.2),
('Enterprise@gmail.com', 'Downtown', 4.1),
('TransportationRentals@gmail.com', 'North Vancouver', 3.9),
('TravelGo@gmail.com', 'Kerrisdale', 4.9),
('VanGo@gmail.com', 'UBC', 3.6);

-- --------------------------------------------------------

--
-- Table structure for table `traveller`
--

CREATE TABLE `traveller` (
  `Username` char(40) NOT NULL,
  `PreferredRating` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traveller`
--

INSERT INTO `traveller` (`Username`, `PreferredRating`) VALUES
('Amy99@gmail.com', 0),
('BioProf@gmail.com', 3),
('Brandon98@gmail.com', 5),
('G-Tang@gmail.com', 4),
('Harry78@gmail.com', 4),
('Harry88@gmail.com', 5),
('JK4Prez@gmail.com', 5),
('PhysicsProf@gmail.com', 2),
('RL7799@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(40) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `Name`) VALUES
('Amy99@gmail.com', 'ilovecats', 'Amy'),
('Avis@gmail.com', 'avisthebest', 'Avis'),
('bestdtrentals@gmail.com', 'cool', 'Best Rentals'),
('BestTours@gmail.com', 'best', 'Best Tours'),
('BioProf@gmail.com', 'IAmYourTeacherNow', 'Dr. Phong'),
('Brandon98@gmail.com', '1357APL', 'Brandon'),
('CheapCleaning@gmail.com', 'textbooks', 'UBC Housekeeping'),
('DTClearnhouses@gmail.com', 'apple', 'Downtown Housekeeping'),
('DTStays@gmail.com', 'wowdt', 'DT Stay'),
('EasyLife@gmail.com', 'NorthVan', 'North Van Housekeeping'),
('Enterprise@gmail.com', 'Enterprisecars', 'Enterprise'),
('FamilyTours@gmail.com', 'famyay', 'Family Tours'),
('G-Tang@gmail.com', 'ChinaNumbaWon', 'GalT'),
('Harry78@gmail.com', 'brownsugar', 'Harry'),
('Harry88@gmail.com', '19880707', 'Harry'),
('holidayStay@gmail.com', 'iloveNV', 'Holiday Stay'),
('Hottours@gmail.com', 'moneymoney', 'Hot Tours'),
('JK4Prez@gmail.com', 'IAmTheCaptainNow', 'John'),
('KitsHK@gmail.com', 'mango', 'Kits Housekeeping'),
('kitsRentals@gmail.com', 'kitsbeach', 'Kits Rentals'),
('Nancy77@gmail.com', 'mangoslush', 'Nancy'),
('NoTrouble@gmail.com', 'grapes', 'Kerrisdale Housekeeping'),
('PhysicsProf@gmail.com', 'CPSC304', 'Dr. Wang'),
('RL7799@gmail.com', 'TaiwanNumberOne', 'Renee'),
('ToursGo@gmail.com', 'tours', 'Tours Go'),
('TransportationRentals@gmail.com', 'rentals', 'Transportation Rentals'),
('TravelGo@gmail.com', 'yesgo!', 'Travel Go'),
('TravellingTours@gmail.com', '2020nice', 'Travelling Tours'),
('TripAdvisors@gmail.com', 'wow', 'Trip Advisors'),
('tripstay@gmail.com', 'Kerrisdale', 'Trip Stay'),
('UBCStay@gmail.com', 'foreveryoung', 'UBC Stay'),
('UBCvisits@gmail.com', 'schoolthebest', 'UBC Visits'),
('VanGo@gmail.com', 'vancouver', 'Vancouver Go');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike`
--
ALTER TABLE `bike`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `Zone` (`Zone`);

--
-- Indexes for table `bookedlisting`
--
ALTER TABLE `bookedlisting`
  ADD PRIMARY KEY (`Username`,`Address`),
  ADD KEY `Address` (`Address`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`PlateNumber`),
  ADD UNIQUE KEY `Insurance` (`Insurance`),
  ADD KEY `Zone` (`Zone`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`Username`,`Email`);

--
-- Indexes for table `housekeeper`
--
ALTER TABLE `housekeeper`
  ADD PRIMARY KEY (`HID`),
  ADD KEY `Zone` (`Zone`);

--
-- Indexes for table `housekeepingagent`
--
ALTER TABLE `housekeepingagent`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Zone` (`Zone`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`Address`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `loanedbike`
--
ALTER TABLE `loanedbike`
  ADD PRIMARY KEY (`BID`,`Username`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `orderedhousekeeper`
--
ALTER TABLE `orderedhousekeeper`
  ADD PRIMARY KEY (`HID`,`Address`,`Username`,`OrderedDate`),
  ADD KEY `Address` (`Address`,`Username`);

--
-- Indexes for table `propertyagent`
--
ALTER TABLE `propertyagent`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `rentedcar`
--
ALTER TABLE `rentedcar`
  ADD PRIMARY KEY (`PlateNumber`,`Username`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `takentour`
--
ALTER TABLE `takentour`
  ADD PRIMARY KEY (`Name`,`Username`,`TakenDate`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`Name`),
  ADD KEY `Zone` (`Zone`);

--
-- Indexes for table `tourismagent`
--
ALTER TABLE `tourismagent`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Zone` (`Zone`);

--
-- Indexes for table `transportationagent`
--
ALTER TABLE `transportationagent`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Zone` (`Zone`);

--
-- Indexes for table `traveller`
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bike`
--
ALTER TABLE `bike`
  ADD CONSTRAINT `bike_ibfk_1` FOREIGN KEY (`Zone`) REFERENCES `transportationagent` (`Zone`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `bookedlisting`
--
ALTER TABLE `bookedlisting`
  ADD CONSTRAINT `bookedlisting_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `traveller` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookedlisting_ibfk_2` FOREIGN KEY (`Address`) REFERENCES `listing` (`Address`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`Zone`) REFERENCES `transportationagent` (`Zone`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `traveller` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `housekeeper`
--
ALTER TABLE `housekeeper`
  ADD CONSTRAINT `housekeeper_ibfk_1` FOREIGN KEY (`Zone`) REFERENCES `housekeepingagent` (`Zone`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `housekeepingagent`
--
ALTER TABLE `housekeepingagent`
  ADD CONSTRAINT `housekeepingagent_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listing`
--
ALTER TABLE `listing`
  ADD CONSTRAINT `listing_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `propertyagent` (`Username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `loanedbike`
--
ALTER TABLE `loanedbike`
  ADD CONSTRAINT `loanedbike_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `bike` (`BID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `loanedbike_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `traveller` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderedhousekeeper`
--
ALTER TABLE `orderedhousekeeper`
  ADD CONSTRAINT `orderedhousekeeper_ibfk_1` FOREIGN KEY (`HID`) REFERENCES `housekeeper` (`HID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orderedhousekeeper_ibfk_2` FOREIGN KEY (`Address`,`Username`) REFERENCES `bookedlisting` (`Address`, `Username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `propertyagent`
--
ALTER TABLE `propertyagent`
  ADD CONSTRAINT `propertyagent_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rentedcar`
--
ALTER TABLE `rentedcar`
  ADD CONSTRAINT `rentedcar_ibfk_1` FOREIGN KEY (`PlateNumber`) REFERENCES `car` (`PlateNumber`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rentedcar_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `traveller` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `takentour`
--
ALTER TABLE `takentour`
  ADD CONSTRAINT `takentour_ibfk_1` FOREIGN KEY (`Name`) REFERENCES `tour` (`Name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `takentour_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `traveller` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`Zone`) REFERENCES `tourismagent` (`Zone`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tourismagent`
--
ALTER TABLE `tourismagent`
  ADD CONSTRAINT `tourismagent_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transportationagent`
--
ALTER TABLE `transportationagent`
  ADD CONSTRAINT `transportationagent_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traveller`
--
ALTER TABLE `traveller`
  ADD CONSTRAINT `traveller_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
