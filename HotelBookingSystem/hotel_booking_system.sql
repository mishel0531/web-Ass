-- phpMyAdmin SQL Dump
-- version 5.1.3-1.fc35
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2022 at 05:36 PM
-- Server version: 10.5.13-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `Architects`
--

CREATE TABLE `Architects` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Qualifications` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Architects`
--

INSERT INTO `Architects` (`ID`, `Name`, `Email`, `Address`, `Phone`, `Qualifications`) VALUES
(1, 'Dulithi De Silva', 'dulithidesilva@gmail.com', '54, Garden Road, Colombo 01', 714585269, 'BA(Honours) in Architecture'),
(2, 'Mishelle Medagama', 'mishellemedagama@gmail.com', '2/45, Town Hall Road, Gampaha', 356859584, 'BA(Honours) in Architecture'),
(3, 'Chethana Jathunarachchi', 'chethanajathunarachchi@gmail.com', '45, Highlevel Road, Kandy', 441125452, 'BA(Honours) in Architecture'),
(4, 'Pasindu Pamuditha', 'pasidupamuditha@gmail.com', '5/41, Lake House Road, Colombo', 545857584, 'BA(Honours) in Architecture'),
(5, 'Githmi Vithanage', 'githmivithanage@gmail.com', '45, Flower Street, Kandy', 554585782, 'BA(Honours) in Architecture');

-- --------------------------------------------------------

--
-- Table structure for table `architect_ratings`
--

CREATE TABLE `architect_ratings` (
  `ID` int(11) NOT NULL,
  `Architect_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `architect_ratings`
--

INSERT INTO `architect_ratings` (`ID`, `Architect_ID`, `User_ID`, `Rating`, `Feedback`) VALUES
(1, 1, 2, 5, 'I love you so much'),
(2, 1, 1, 4, 'I love you even more'),
(3, 1, 1, 1, '\r\n        asdasdas'),
(4, 1, 2, 2, '\r\n        asdasdasdasd'),
(5, 1, 2, 1, '\r\n        asdasdasda'),
(6, 2, 2, 1, '\r\n        '),
(7, 2, 2, 2, '\r\n        asdasdasdsad'),
(8, 2, 2, 0, '\r\n        asdasd'),
(9, 5, 2, 5, '\r\n   Excellent Work\r\n     ');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Architect_ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`ID`, `User_ID`, `Architect_ID`, `Date`) VALUES
(1, 2, 1, '2022-02-09'),
(2, 1, 1, '2022-02-04'),
(3, 2, 1, '2022-02-01'),
(4, 2, 2, '2022-02-08'),
(5, 2, 1, '2022-02-10'),
(6, 2, 1, '2022-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`ID`, `Email`, `Password`) VALUES
(1, 'asiriiroshan@hotmail.com', 'asiriiroshan'),
(2, 'asiriiroshan@gmail.com', 'asiriiroshan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Architects`
--
ALTER TABLE `Architects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `architect_ratings`
--
ALTER TABLE `architect_ratings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Architect_ID` (`Architect_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Architect_ID` (`Architect_ID`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Architects`
--
ALTER TABLE `Architects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `architect_ratings`
--
ALTER TABLE `architect_ratings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_credentials`
--
ALTER TABLE `login_credentials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `architect_ratings`
--
ALTER TABLE `architect_ratings`
  ADD CONSTRAINT `architect_rating` FOREIGN KEY (`Architect_ID`) REFERENCES `Architects` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_rating` FOREIGN KEY (`User_ID`) REFERENCES `login_credentials` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `architect_booking` FOREIGN KEY (`Architect_ID`) REFERENCES `Architects` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_booking` FOREIGN KEY (`User_ID`) REFERENCES `login_credentials` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
