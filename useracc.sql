-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 05:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `useracc`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `Apartment_ID` int(15) NOT NULL,
  `APT_Name` varchar(100) NOT NULL,
  `APT_Address` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Apt_Details` varchar(1000) NOT NULL,
  `Price` varchar(15) NOT NULL,
  `APT_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`Apartment_ID`, `APT_Name`, `APT_Address`, `City`, `Apt_Details`, `Price`, `APT_image`) VALUES
(11, 'Cityscraper', 'Beckam St, Kurunegala', 'Kurunegala', 'With the best city view. lower price.', '250 000 000', 'apartment_image/66fff9eb27a6e_APT1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inq_id` int(11) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `imessage` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inq_id`, `iname`, `email`, `contactNo`, `imessage`) VALUES
(25, 'Dasun', 'dasun@gmail.com', '0740245892', 'What type of payment methods do you have ?');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `useremail` varchar(32) NOT NULL,
  `rating` int(2) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `useremail`, `rating`, `comment`, `created_at`) VALUES
(15, 'john@gmail.com', 9, 'Very nice and convenience apartment. Nice view!', '2024-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `seller_details`
--

CREATE TABLE `seller_details` (
  `seller_id` int(10) NOT NULL,
  `sellerFName` varchar(15) NOT NULL,
  `sellerLName` varchar(15) NOT NULL,
  `sellerEmail` varchar(30) NOT NULL,
  `sellerPassword` varchar(32) NOT NULL,
  `sellerDOB` date NOT NULL,
  `sellerPhone` varchar(15) NOT NULL,
  `sellerAddress` varchar(50) NOT NULL,
  `sellerPcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_details`
--

INSERT INTO `seller_details` (`seller_id`, `sellerFName`, `sellerLName`, `sellerEmail`, `sellerPassword`, `sellerDOB`, `sellerPhone`, `sellerAddress`, `sellerPcode`) VALUES
(13, 'Yasitha', 'Sewmini', 'yasitha@gmail.com', 'yasitha', '2001-10-06', '0712654547', 'Malabe, ', '20120');

-- --------------------------------------------------------

--
-- Table structure for table `staffacc`
--

CREATE TABLE `staffacc` (
  `staff_id` int(5) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Sname` varchar(32) NOT NULL,
  `Semail` varchar(32) NOT NULL,
  `Spassword` varchar(32) NOT NULL,
  `SDOB` date NOT NULL,
  `SPhone` varchar(15) NOT NULL,
  `SAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffacc`
--

INSERT INTO `staffacc` (`staff_id`, `Position`, `Sname`, `Semail`, `Spassword`, `SDOB`, `SPhone`, `SAddress`) VALUES
(1001, 'Administrator', 'Pramira Mindula', 'pramira0@gmail.com', 'Pramira@2003', '2003-08-02', '0740302602', 'Kuliyapitiya, 60240'),
(1002, 'Marketing Manager', 'Umesha Divyangi', 'umesha0@gmail.com', 'Umesha#2003', '2003-05-30', '0706259530', 'Narammala');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(10) NOT NULL,
  `userFName` varchar(15) NOT NULL,
  `userLName` varchar(15) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `userPassword` varchar(32) NOT NULL,
  `userDOB` date NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userAddress` varchar(50) NOT NULL,
  `userPcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `userFName`, `userLName`, `userEmail`, `userPassword`, `userDOB`, `userPhone`, `userAddress`, `userPcode`) VALUES
(24, 'mindula', 'herath', 'mindula@gmail.com', 'mindula2003@@', '2003-08-02', '070579000', 'Kuliyapitiya', '60240');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`Apartment_ID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inq_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `seller_details`
--
ALTER TABLE `seller_details`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `staffacc`
--
ALTER TABLE `staffacc`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `Apartment_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seller_details`
--
ALTER TABLE `seller_details`
  MODIFY `seller_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
