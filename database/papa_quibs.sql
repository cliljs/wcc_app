-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 08:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

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
(1, 'pastor', '$2y$12$LV.IQ2Ue77SmjVWDeNjGwOn3EmMnxipGCLj/oxzu5ZVma9As9Uqlq', 'Loyloy', 'Jonathan', '', 'MALE', 'Wcc Church', '2022-05-05', '09955591932', 'All', 1, 1, 0, '2022-05-07 06:16:27', NULL, NULL),
(2, 'jdoe', '$2y$12$UOlRPtRMuIB8GA1FuTADf.skVI8YW4aVd/rDXVSrU4Cz6WWXZJCJa', 'Doe', 'John', '', 'MALE', 'Jan lang', '2000-01-01', '091234567', 'Bataan', 0, 0, 0, '2022-05-07 06:16:27', NULL, NULL),
(3, 'jdoes', '$2y$12$p33iPgJBj23LI6CoT04Ehu4Myl/i7/1GiuQ1nYrclW/5NmkRCrzRW', 'Does', 'Jane', '', 'FEMALE', 'Jan lang', '2001-01-02', '0912354785', 'Bataan', 0, 0, 0, '2022-05-07 06:16:27', NULL, NULL),
(4, 'fbar', '$2y$12$pznid4gHxlPSuVxlXM.Ad.azOf3AiX/zNF7FMETIn6nDLNF6ti3Ku', 'Bar', 'Foo', '', 'MALE', 'Jan lang', '2002-01-03', '098751454', 'Bataan', 0, 0, 0, '2022-05-07 06:16:27', NULL, NULL),
(5, 'leader', '$2y$12$bsJQLLRJBtiqiOCno.1mKuF7aoEgkWioJ0b3R4NUDYOa8GjoGeJ9O', 'Joe', 'Average', '', 'MALE', 'Jan lang', '2002-01-04', '11111111', 'Bataan', 1, 0, 0, '2022-05-07 06:16:27', NULL, NULL),
(6, 'jpublic', '$2y$12$3AUQWJZbLJxDMtFC6bAhWeTyckkV0NGPwxqVmq0TdHpfusjJlK3GK', 'Public', 'John', '', 'MALE', 'Jan lang', '2002-01-05', '0924578454', 'Bataan', 0, 0, 0, '2022-05-07 06:16:27', NULL, NULL),
(7, 'iroe', '$2y$12$NpWWhzakscfJHkLopniaLenSc./NeDky6sSPZtQM85eovMH0YIRBG', 'Roe', 'Ivan', '', 'FEMALE', 'Jan lang', '2002-01-06', '096315454', 'Bataan', 0, 0, 0, '2022-05-07 06:16:27', NULL, NULL),
(8, 'admin', '$2y$12$h9DHBJBvv3WrPJzSS6AKcudK2q8pxF1EiA2Wj2eWPsms1b0Qgt/p2', 'Admin', 'Sample', '', 'FEMALE', 'Jan lang', '2002-01-06', '096315454', 'Bataan', 0, 0, 1, '2022-05-07 06:16:27', NULL, NULL);

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
  `admin_pk` int(11) DEFAULT 0,
  `is_enrolled` tinyint(1) NOT NULL DEFAULT 0,
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
  `invite_type` enum('VIP','INVITE') NOT NULL,
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
  `sequence` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1 COMMENT 'pk ng nagcreate ng lesson',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bro_lessons`
--

INSERT INTO `bro_lessons` (`id`, `lesson_type`, `lesson_title`, `sequence`, `created_by`, `created_at`) VALUES
(1, 'SOL1', 'M1:CLASS 1 - JESUS IS MY SHEPHERD', 1, 1, '2022-05-07 06:16:27'),
(2, 'SOL1', 'M2:CLASS 1 - WHAT IS VISION?', 2, 1, '2022-05-07 06:16:27'),
(3, 'SOL1', 'M1:CLASS 2 - CULTIVATING A RELATIONSHIP WITH GOD', 3, 1, '2022-05-07 06:16:27'),
(4, 'SOL1', 'M1:CLASS 2 - THE PRINCIPLES OF G12', 4, 1, '2022-05-07 06:16:27'),
(5, 'SOL1', 'M1:CLASS 3 - THE POWER OF PRAISE AND WORSHIP', 5, 1, '2022-05-07 06:16:27'),
(6, 'SOL1', 'M2:CLASS 3 - A FIRM FOUNDATION', 6, 1, '2022-05-07 06:16:27'),
(7, 'SOL1', 'M1:CLASS 4 - STRENGTHENED IN GOD', 7, 1, '2022-05-07 06:16:27'),
(8, 'SOL1', 'M2:CLASS 4 - THE VISION OF THE GOVERNMENT OF G12', 8, 1, '2022-05-07 06:16:27'),
(9, 'SOL1', 'M1:CLASS 5 - SPIRITUAL WARFARE', 9, 1, '2022-05-07 06:16:27'),
(10, 'SOL1', 'M2:CLASS 5 - FORMING THE BEST TEAM', 10, 1, '2022-05-07 06:16:27'),
(11, 'SOL1', 'M1:CLASS 6 - THE REDEMPTIVE POWER OF THE BLOOD', 11, 1, '2022-05-07 06:16:27'),
(12, 'SOL1', 'M2:CLASS 6 - SUCCESSFUL LEADERSHIP', 12, 1, '2022-05-07 06:16:27'),
(13, 'SOL1', 'M1:CLASS 7 - THE BIBLE WILL TRANSFORM YOUR LIFE', 13, 1, '2022-05-07 06:16:27'),
(14, 'SOL1', 'M2:CLASS 7 - THE ART OF WINNING', 14, 1, '2022-05-07 06:16:27'),
(15, 'SOL1', 'M1:CLASS 8 - THE ANOINTING OF THE HOLY SPIRIT', 15, 1, '2022-05-07 06:16:27'),
(16, 'SOL1', 'M2:CLASS 8 - BLESSING THROUGH THE CELL-GROUP', 16, 1, '2022-05-07 06:16:27'),
(17, 'SOL1', 'M1:CLASS 9 - THE BLESSING OF PROSPERITY', 17, 1, '2022-05-07 06:16:27'),
(18, 'SOL1', 'M2:CLASS 9 - READY TO CONSOLIDATE', 18, 1, '2022-05-07 06:16:27'),
(19, 'SOL1', 'M1:CLASS 10 - BUILDING MY CHURCH', 19, 1, '2022-05-07 06:16:27'),
(20, 'SOL1', 'M2:CLASS 10 - THE POWER OF THE 144', 20, 1, '2022-05-07 06:16:27'),
(21, 'SOL2', 'M3:CLASS 1 - THE PRESENT GLORY', 1, 1, '2022-05-07 06:16:27'),
(22, 'SOL2', 'M4:CLASS 1 - FAMILY', 2, 1, '2022-05-07 06:16:27'),
(23, 'SOL2', 'M3:CLASS 2 - KEY PRINCIPLES OF WINNING', 3, 1, '2022-05-07 06:16:27'),
(24, 'SOL2', 'M4:CLASS 2 - THE ROLE OF PARENTS AND CHILDREN', 4, 1, '2022-05-07 06:16:27'),
(25, 'SOL2', 'M3:CLASS 3 - THE POWER OF EVANGELISM', 5, 1, '2022-05-07 06:16:27'),
(26, 'SOL2', 'M4:CLASS 3 - HEALING WITHIN THE FAMILY', 6, 1, '2022-05-07 06:16:27'),
(27, 'SOL2', 'M3:CLASS 4 - EFFECTIVE EVANGELISM', 7, 1, '2022-05-07 06:16:27'),
(28, 'SOL2', 'M4:CLASS 4 - 7 PILLARS FOR A HAPPY MARRIAGE', 8, 1, '2022-05-07 06:16:27'),
(29, 'SOL2', 'M3:CLASS 5 - THE ANOINTING TO WIN', 9, 1, '2022-05-07 06:16:27'),
(30, 'SOL2', 'M4:CLASS 5 - THE BLESSING OF FATHERHOOD', 10, 1, '2022-05-07 06:16:27'),
(31, 'SOL2', 'M3:CLASS 6 - COMPASSION', 11, 1, '2022-05-07 06:16:27'),
(32, 'SOL2', 'M4:CLASS 6 - WHO IS THE RIGHT PERSON?', 12, 1, '2022-05-07 06:16:27'),
(33, 'SOL2', 'M3:CLASS 7 - WHO IS THE RIGHT PERSON?', 13, 1, '2022-05-07 06:16:27'),
(34, 'SOL2', 'M4:CLASS 7 - WHO IS THE RIGHT PERSON?', 14, 1, '2022-05-07 06:16:27'),
(35, 'SOL2', 'M3:CLASS 8 - WHO IS THE RIGHT PERSON?', 15, 1, '2022-05-07 06:16:27'),
(36, 'SOL2', 'M4:CLASS 8 - 7 STEPS FOR A SUCCESSFUL COURTSHIP', 16, 1, '2022-05-07 06:16:27'),
(37, 'SOL2', 'M3:CLASS 9 - VISION', 17, 1, '2022-05-07 06:16:27'),
(38, 'SOL2', 'M4:CLASS 9 - STRENGTHEN COMMUNICATION IN YOUR MARRIAGE', 18, 1, '2022-05-07 06:16:27'),
(39, 'SOL2', 'M3:CLASS 10 - CELL-GROUP STRUCTURE AND DEVELOPMENT', 19, 1, '2022-05-07 06:16:27'),
(40, 'SOL2', 'M4:CLASS 10 - COMMANDMENTS FOR THE FAMILY', 20, 1, '2022-05-07 06:16:27'),
(41, 'SOL3', 'M5:CLASS 1 - A LEADER OF FAITH', 1, 1, '2022-05-07 06:16:27'),
(42, 'SOL3', 'M6:CLASS 1 - SUBMERGED IN HIS SPIRIT', 2, 1, '2022-05-07 06:16:27'),
(43, 'SOL3', 'M5:CLASS 2 - A LEADER\'S FOR THE FLOCK', 3, 1, '2022-05-07 06:16:27'),
(44, 'SOL3', 'M6:CLASS 2 - PREPAIRING TO RECEIVE THE HOLY SPIRIT', 4, 1, '2022-05-07 06:16:27'),
(45, 'SOL3', 'M5:CLASS 3 - A LEADER THAT BUILDS', 5, 1, '2022-05-07 06:16:27'),
(46, 'SOL3', 'M6:CLASS 3 - KNOWING THE HOLY SPIRIT', 6, 1, '2022-05-07 06:16:27'),
(47, 'SOL3', 'M5:CLASS 4 - A LEADER WITH THE HEART OF A SERVANT', 7, 1, '2022-05-07 06:16:27'),
(48, 'SOL3', 'M6:CLASS 4 - THE FRUIT OF THE HOLY SPIRIT (PART 1)', 8, 1, '2022-05-07 06:16:27'),
(49, 'SOL3', 'M5:CLASS 5 - A LEADER CONTROLLED BY THE HOLY SPIRIT', 9, 1, '2022-05-07 06:16:27'),
(50, 'SOL3', 'M6:CLASS 5 - THE FRUIT OF THE HOLY SPIRIT (PART 2)', 10, 1, '2022-05-07 06:16:27'),
(51, 'SOL3', 'M5:CLASS 6 - THE LEADER AND PREACHING OF THE WORD', 11, 1, '2022-05-07 06:16:27'),
(52, 'SOL3', 'M6:CLASS 6 - THE FRUIT OF THE HOLY SPIRIT (PART 3)', 12, 1, '2022-05-07 06:16:27'),
(53, 'SOL3', 'M5:CLASS 7 - THE LEADER AND COUNSELING', 13, 1, '2022-05-07 06:16:27'),
(54, 'SOL3', 'M6:CLASS 7 - INTRODUCTION TO THE GIFTS OF THE HOLY SPIRIT', 14, 1, '2022-05-07 06:16:27'),
(55, 'SOL3', 'M5:CLASS 8 - THE LEADER AND SUPERVISION', 15, 1, '2022-05-07 06:16:27'),
(56, 'SOL3', 'M6:CLASS 8 - THE GIFTS OF REVELATION', 16, 1, '2022-05-07 06:16:27'),
(57, 'SOL3', 'M5:CLASS 9 - THE PRICE OF LEADERSHIP', 17, 1, '2022-05-07 06:16:27'),
(58, 'SOL3', 'M6:CLASS 9 - THE GIFTS OF POWER', 18, 1, '2022-05-07 06:16:27'),
(59, 'SOL3', 'M5:CLASS 10 - THE LEADER AND THE FORMATION OF DISCIPLES', 19, 1, '2022-05-07 06:16:27'),
(60, 'SOL3', 'M6:CLASS 10 - THE GIFTS OF INSPIRATION', 20, 1, '2022-05-07 06:16:27'),
(61, 'LIFE_CLASS', 'WEEK 1', 1, 1, '2022-05-07 06:16:27'),
(62, 'LIFE_CLASS', 'WEEK 2', 2, 1, '2022-05-07 06:16:27'),
(63, 'LIFE_CLASS', 'WEEK 3', 3, 1, '2022-05-07 06:16:27'),
(64, 'LIFE_CLASS', 'WEEK 4', 4, 1, '2022-05-07 06:16:27'),
(65, 'LIFE_CLASS', 'WEEK 5', 5, 1, '2022-05-07 06:16:27'),
(66, 'LIFE_CLASS', 'WEEK 6', 6, 1, '2022-05-07 06:16:27'),
(67, 'LIFE_CLASS', 'WEEK 7', 7, 1, '2022-05-07 06:16:27'),
(68, 'LIFE_CLASS', 'WEEK 8', 8, 1, '2022-05-07 06:16:27'),
(69, 'LIFE_CLASS', 'WEEK 9', 9, 1, '2022-05-07 06:16:27'),
(70, 'LIFE_CLASS', 'ENCOUNTER DAY 1', 10, 1, '2022-05-07 06:16:27'),
(71, 'LIFE_CLASS', 'ENCOUNTER DAY 2', 11, 1, '2022-05-07 06:16:27'),
(72, 'LIFE_CLASS', 'ENCOUNTER DAY 3', 12, 1, '2022-05-07 06:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `bro_mentoring`
--

CREATE TABLE `bro_mentoring` (
  `id` int(11) NOT NULL,
  `mentor_date` date NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bro_mentoring`
--

INSERT INTO `bro_mentoring` (`id`, `mentor_date`, `attendance`, `created_at`, `created_by`) VALUES
(4, '2022-04-23', 1, '2022-04-23 03:40:56', 6),
(7, '2022-04-29', 1, '2022-04-23 03:41:14', 6);

-- --------------------------------------------------------

--
-- Table structure for table `bro_notifications`
--

CREATE TABLE `bro_notifications` (
  `id` bigint(20) NOT NULL,
  `sender_pk` int(11) DEFAULT NULL,
  `receiver_pk` int(11) NOT NULL DEFAULT 0 COMMENT '0 - all admin',
  `subject_pk` int(11) DEFAULT NULL,
  `table_pk` int(11) NOT NULL COMMENT 'PK ng row sa table na i-uupdate',
  `caption` varchar(200) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - unread / 1 - read',
  `decision` tinyint(1) NOT NULL DEFAULT 0,
  `notif_hash` varchar(125) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bro_qr`
--

CREATE TABLE `bro_qr` (
  `id` bigint(20) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bro_qr`
--

INSERT INTO `bro_qr` (`id`, `qr_code`, `branch`, `created_by`, `created_at`) VALUES
(1, 'test', 'Bataan', 'Admin', '2022-05-07 14:16:27'),
(2, 'test', 'Gensan', 'Admin', '2022-05-07 14:16:27'),
(3, 'test', 'Kalibo', 'Admin', '2022-05-07 14:16:27'),
(4, 'test', 'Valenzuela', 'Admin', '2022-05-07 14:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `bro_schooling`
--

CREATE TABLE `bro_schooling` (
  `id` bigint(20) NOT NULL,
  `user_pk` int(11) DEFAULT NULL,
  `enrollment_pk` int(11) NOT NULL,
  `lesson_pk` int(11) DEFAULT NULL,
  `attendance` tinyint(1) DEFAULT NULL,
  `leader_pk` int(11) DEFAULT 0,
  `date_confirmed` timestamp NULL DEFAULT NULL,
  `date_approved` datetime DEFAULT NULL,
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
  `new_leader` int(11) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bro_tribe`
--

INSERT INTO `bro_tribe` (`id`, `leader_pk`, `member_pk`, `new_leader`, `is_approved`, `created_at`) VALUES
(1, 1, 1, 0, 1, '2022-05-07 14:16:27'),
(2, 2, 2, 0, 1, '2022-05-07 14:16:27'),
(3, 2, 3, 0, 1, '2022-05-07 14:16:27'),
(4, 2, 4, 0, 1, '2022-05-07 14:16:27'),
(5, 1, 5, 0, 1, '2022-05-07 14:16:27'),
(6, 2, 6, 0, 1, '2022-05-07 14:16:27'),
(7, 2, 7, 0, 1, '2022-05-07 14:16:27'),
(8, 2, 8, 0, 1, '2022-05-07 14:16:27');

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
-- Indexes for table `bro_mentoring`
--
ALTER TABLE `bro_mentoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_notifications`
--
ALTER TABLE `bro_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bro_qr`
--
ALTER TABLE `bro_qr`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `bro_mentoring`
--
ALTER TABLE `bro_mentoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bro_notifications`
--
ALTER TABLE `bro_notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_qr`
--
ALTER TABLE `bro_qr`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
