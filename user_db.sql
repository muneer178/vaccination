-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 04:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_name`, `admin_password`) VALUES
('Muhammad', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `ap-status`
--

CREATE TABLE `ap-status` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `age` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `last_vaccination_date` date NOT NULL,
  `appointment_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap-status`
--

INSERT INTO `ap-status` (`fname`, `lname`, `age`, `gender`, `last_vaccination_date`, `appointment_date`, `status`) VALUES
('Muneer', 'Ahmed', 6, 'M', '2024-06-08', '2024-06-10', 'rejected'),
('Muneer', 'Ahmed', 6, 'M', '2024-06-08', '2024-06-10', 'rejected'),
('Muneer', 'Ahmed', 6, 'M', '2024-06-08', '2024-06-10', 'rejected'),
('Muneer', 'Ahmed', 10, 'M', '2024-06-02', '2024-06-05', 'rejected'),
('Muneer', 'Ahmed', 10, 'M', '2024-06-02', '2024-06-05', 'accepted'),
('Muneer', 'Ahmed', 10, 'M', '2024-06-02', '2024-06-05', 'rejected'),
('Muneer', 'Ahmed', 10, 'M', '2024-06-02', '2024-06-05', 'rejected'),
('Muneer', 'Ahmed', 10, 'M', '2024-06-02', '2024-06-05', 'rejected'),
('Muneer', 'Ahmed', 10, 'M', '2024-06-02', '2024-06-05', 'accepted'),
('Muneer', 'Ahmed', 10, 'M', '2024-06-02', '2024-06-05', 'accepted'),
('Muneer', 'Ahmed', 6, 'M', '2024-06-08', '2024-06-10', 'rejected'),
('Muneer', 'Ahmed', 6, 'M', '2024-06-08', '2024-06-10', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `appointment_date` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `age` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `last_vaccination_date` text NOT NULL,
  `parent_name` varchar(20) NOT NULL,
  `hospital_selected` varchar(50) NOT NULL,
  `vaccine_type` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `appointment_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `password`) VALUES
(29, 'sarwar', 'm@gmail.com', '1234'),
(30, 'h1', 'h1@gmail.com', '11111'),
(31, 'h1', 'h1@gmail.com', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_vac`
--

CREATE TABLE `hospitals_vac` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `vaccination_status` enum('Vaccinated','Not Vaccinated','','') NOT NULL DEFAULT 'Not Vaccinated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals_vac`
--

INSERT INTO `hospitals_vac` (`id`, `name`, `location`, `contact_person`, `email`, `phone`, `vaccination_status`) VALUES
(1, 'muhammad', 'h2', '30', 'm@gmail.com', '000000000', 'Vaccinated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaclist`
--

CREATE TABLE `vaclist` (
  `id` int(30) NOT NULL,
  `Vaccine_name` varchar(30) NOT NULL,
  `Availability` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaclist`
--

INSERT INTO `vaclist` (`id`, `Vaccine_name`, `Availability`) VALUES
(1, 'jonson and jonson', 'Yes'),
(2, 'something', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals_vac`
--
ALTER TABLE `hospitals_vac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hospitals_vac`
--
ALTER TABLE `hospitals_vac`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
