-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 07:14 AM
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
-- Database: `papa_quibs`
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
  `is_leader` tinyint(1) NOT NULL,
  `is_pastor` tinyint(1) NOT NULL,
  `is_admin` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(255) DEFAULT NULL,
  `inviter_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bro_accounts`
--

INSERT INTO `bro_accounts` (`id`, `username`, `password`, `lastname`, `firstname`, `middlename`, `gender`, `address`, `birthdate`, `contact`, `branch`, `is_leader`, `is_pastor`, `is_admin`, `created_at`, `profile_pic`, `inviter_pk`) VALUES
(1, 'pastor123', '$2y$12$/AIoB91klbfAP7LrYRb6yeFS2QyAnfpqMIs3D5QrGpn4y7COOb0n2', 'Loyloy', 'Jonathan', '', 'MALE', 'Wcc Church', '2022-05-05', '09955591932', 'Roaming', 1, 1, 0, '2022-04-13 04:20:15', NULL, 0),
(2, 'cliljdn', '$2y$12$zPtdMXOtBn2s0QhsAktYQemUEi1pW2u5LtRMM1bdTfN00vn0PUMHu', 'Jaudian', 'Calil Christopher', '', 'MALE', 'Jan lang', '0000-00-00', '09955591932', 'Bataan', 1, 0, 0, '2022-04-13 04:20:15', NULL, 2),
(3, 'jdoe', '$2y$12$vH1CV.TNd7UJ6lvcxnFUXulxGRTNEEIyvSjQcqhQdYZY7pT5MKZj6', 'Doe', 'John', '', 'MALE', 'Jan lang', '2000-01-01', '091234567', 'Bataan', 0, 0, 0, '2022-04-13 04:20:15', NULL, 2),
(4, 'janedoe', '$2y$12$AT1VWcwRNjoU47y25sziIeok4IN2hZcsTWzipW6N25yVyTbmkH.e.', 'Does', 'Jane', '', 'FEMALE', 'Jan lang', '2001-01-02', '0912354785', 'Bataan', 0, 0, 0, '2022-04-13 04:20:15', NULL, 2),
(5, 'fbar', '$2y$12$fG5/w8UsSQZ4MtsU6sODw.iZSxE9uIKlpXoXrC.10/erOF2oGV7uy', 'Bar', 'Foo', '', 'MALE', 'Jan lang', '2002-01-03', '098751454', 'Bataan', 0, 0, 0, '2022-04-13 04:20:15', NULL, 3),
(6, 'ajoe', '$2y$12$/CCLy8RiNJOV/gKnQ6aV9uKGR2q3AuRCiYY890Q1fFA5oGaB3TXnO', 'Joe', 'Average', '', 'MALE', 'Jan lang', '2002-01-04', '11111111', 'Gensan', 1, 0, 0, '2022-04-13 04:20:15', NULL, 2),
(7, 'jpublic', '$2y$12$m.DZHIjiQhLF9svZtHcWl.e9kFP4Q8hZ/Y24VzNVf1aoqwSW5Ctd6', 'Public', 'John', '', 'MALE', 'Jan lang', '2002-01-05', '0924578454', 'Gensan', 0, 0, 0, '2022-04-13 04:20:15', NULL, 2),
(8, 'iroe', '$2y$12$L8/1okY4zNjggVXgVzv2duFTfAvNvRU2jP.Mf6YnavzQAvCrfgYoK', 'Roe', 'Ivan', '', 'FEMALE', 'Jan lang', '2002-01-06', '096315454', 'Valenzuela', 0, 0, 0, '2022-04-13 04:20:15', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bro_attendance`
--

CREATE TABLE `bro_attendance` (
  `id` int(11) NOT NULL,
  `sunday_date` date NOT NULL,
  `account_pk` int(11) NOT NULL COMMENT 'pk ng attendee',
  `confirmed_by` int(11) NOT NULL COMMENT 'pk ng nag confirm',
  `date_confirmed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_cellgroup`
--

CREATE TABLE `bro_cellgroup` (
  `id` bigint(20) NOT NULL,
  `user_pk` int(11) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `event_place` varchar(100) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_enrollment`
--

CREATE TABLE `bro_enrollment` (
  `id` bigint(20) NOT NULL,
  `user_pk` int(11) DEFAULT NULL,
  `lesson_type` enum('LIFE_CLASS','SOL1','SOL2','SOL3','RE_ENCOUNTER') DEFAULT NULL,
  `leader_pk` int(11) DEFAULT NULL,
  `is_graduated` tinyint(1) DEFAULT 0,
  `date_approved` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_invites`
--

CREATE TABLE `bro_invites` (
  `id` bigint(20) NOT NULL,
  `date_invited` date DEFAULT NULL,
  `inviter_pk` int(11) DEFAULT NULL,
  `invitee_name` varchar(100) DEFAULT NULL,
  `is_vip` tinyint(4) DEFAULT NULL,
  `is_invite` tinyint(4) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_lessons`
--

CREATE TABLE `bro_lessons` (
  `id` int(11) NOT NULL,
  `lesson_type` enum('LIFE_CLASS','SOL1','SOL2','SOL3','RE_ENCOUNTER') NOT NULL,
  `lesson_title` varchar(300) NOT NULL DEFAULT '',
  `sequence` int(11) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'pk ng nagcreate ng lesson',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_notifications`
--

CREATE TABLE `bro_notifications` (
  `id` bigint(20) NOT NULL,
  `sender_pk` int(11) DEFAULT NULL,
  `receiver_pk` int(11) DEFAULT NULL,
  `subject_pk` int(11) DEFAULT NULL,
  `caption` varchar(200) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_schooling`
--

CREATE TABLE `bro_schooling` (
  `id` bigint(20) NOT NULL,
  `user_pk` int(11) DEFAULT NULL,
  `lesson_pk` int(11) DEFAULT NULL,
  `attendance` tinyint(1) DEFAULT NULL,
  `leader_pk` int(11) DEFAULT NULL,
  `date_confirmed` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_tribe`
--

CREATE TABLE `bro_tribe` (
  `id` int(11) NOT NULL,
  `leader_pk` int(11) NOT NULL,
  `member_pk` int(11) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bro_tribe`
--

INSERT INTO `bro_tribe` (`id`, `leader_pk`, `member_pk`, `is_approved`, `created_at`) VALUES
(1, 1, 1, 1, '2022-04-13 12:20:15'),
(2, 1, 2, 1, '2022-04-13 12:20:15'),
(3, 1, 3, 1, '2022-04-13 12:20:15'),
(4, 1, 4, 1, '2022-04-13 12:20:15'),
(5, 1, 5, 1, '2022-04-13 12:20:15'),
(6, 1, 6, 1, '2022-04-13 12:20:15'),
(7, 1, 7, 1, '2022-04-13 12:20:15'),
(8, 1, 8, 1, '2022-04-13 12:20:15');

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
-- Indexes for table `bro_cellgroup`
--
ALTER TABLE `bro_cellgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_enrollment`
--
ALTER TABLE `bro_enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_invites`
--
ALTER TABLE `bro_invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_lessons`
--
ALTER TABLE `bro_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_notifications`
--
ALTER TABLE `bro_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_schooling`
--
ALTER TABLE `bro_schooling`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bro_attendance`
--
ALTER TABLE `bro_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_cellgroup`
--
ALTER TABLE `bro_cellgroup`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_enrollment`
--
ALTER TABLE `bro_enrollment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_invites`
--
ALTER TABLE `bro_invites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_lessons`
--
ALTER TABLE `bro_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_notifications`
--
ALTER TABLE `bro_notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_schooling`
--
ALTER TABLE `bro_schooling`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_tribe`
--
ALTER TABLE `bro_tribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
