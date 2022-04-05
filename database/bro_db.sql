-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 02:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bro_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bro_accounts`
--

CREATE TABLE `bro_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `address` varchar(150) NOT NULL,
  `birthdate` date NOT NULL,
  `contact` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_leader` tinyint(1) NOT NULL,
  `is_pastor` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_attendance`
--

CREATE TABLE `bro_attendance` (
  `id` int(11) NOT NULL,
  `sunday_date` date NOT NULL,
  `account_pk` int(11) NOT NULL COMMENT 'pk ng attendee',
  `confirmed_by` int(11) NOT NULL COMMENT 'pk ng nag confirm',
  `date_confirmed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_lessons`
--

CREATE TABLE `bro_lessons` (
  `id` int(11) NOT NULL,
  `lesson_schedule` date NOT NULL,
  `lesson_type` enum('LIFE_CLASS','SOL1','SOL2','SOL3') NOT NULL,
  `lesson_contents` text NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'pk ng nagcreate ng lesson',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_tribe`
--

CREATE TABLE `bro_tribe` (
  `id` int(11) NOT NULL,
  `user_pk` int(11) DEFAULT NULL,
  `leader_pk` int(11) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `date_approved` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bro_accounts`
--
ALTER TABLE `bro_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_attendance`
--
ALTER TABLE `bro_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_lessons`
--
ALTER TABLE `bro_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_tribe`
--
ALTER TABLE `bro_tribe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bro_accounts`
--
ALTER TABLE `bro_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_attendance`
--
ALTER TABLE `bro_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_lessons`
--
ALTER TABLE `bro_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_tribe`
--
ALTER TABLE `bro_tribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
