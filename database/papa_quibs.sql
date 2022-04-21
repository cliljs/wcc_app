-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 07:52 AM
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
(1, 'pastor123', '$2y$12$YH2ZFaYbAyf42MKSBe2SJORc/MLuG8BqtCQ9kvj/s8mH6u6C.iA6a', 'Loyloy', 'Jonathan', '', 'MALE', 'Wcc Church', '2022-05-05', '09955591932', 'Langit', 1, 1, 0, '2022-04-17 12:47:31', NULL, 0),
(2, 'cliljdn', '$2y$12$RRYXXkt2eS2f6.l4b1Y8vO31DHh.Na4I6uPz/ytTUFQgmr1RmV83e', 'Jaudian', 'Calil', '', 'MALE', 'Jan lang', '0000-00-00', '09955591932', 'Langit', 1, 0, 0, '2022-04-17 12:47:31', NULL, 1),
(3, 'jdoe', '$2y$12$FWLne/EZqBM57ukHNn6/Z.GAbjA0PfYkC4nbmc4h4JWWtKSJv2hjG', 'Doe', 'John', '', 'MALE', 'Jan lang', '2000-01-01', '091234567', 'Bataan', 0, 0, 0, '2022-04-17 12:47:31', NULL, 1),
(4, 'janedoe', '$2y$12$OKagsmU60tfRftktry9MiO4C6R2HUsm7dWdkUsAtHXi/hyzwqJAu2', 'Does', 'Jane', '', 'FEMALE', 'Jan lang', '2001-01-02', '0912354785', 'Bataan', 0, 0, 0, '2022-04-17 12:47:31', NULL, NULL),
(5, 'fbar', '$2y$12$NDg0aycXhXI9x8.Tpf3WWOnqOto5zz5soLpQIae3QTtdQdQtXqVwu', 'Bar', 'Foo', '', 'MALE', 'Jan lang', '2002-01-03', '098751454', 'Bataan', 0, 0, 0, '2022-04-17 12:47:31', NULL, NULL),
(6, 'ajoe', '$2y$12$Bo/QxWsDI54g3XR2YOGcD.JSQttYT3adJRR1Ge8bG8vGQchOW2Zh2', 'Joe', 'Average', '', 'MALE', 'Jan lang', '1994-02-11', '11111111', 'Bataan', 1, 0, 0, '2022-04-17 12:47:31', NULL, NULL),
(7, 'jpublic', '$2y$12$HSq/5KPTlGLlN9RhL3Ru8eRW7ZKL2c2.2..qSvIC6uzbRdhzNQZMa', 'Public', 'John', '', 'MALE', 'Jan lang', '2002-01-05', '0924578454', 'Bataan', 0, 0, 0, '2022-04-17 12:47:31', NULL, NULL),
(8, 'iroe', '$2y$12$3ovKh4GFNzNRk1xvbPNrzOse2ff7ml.26cokmsONLmnEfnFNDWGQm', 'Roe', 'Ivan', '', 'FEMALE', 'Jan lang', '2002-01-06', '096315454', 'Bataan', 0, 0, 0, '2022-04-17 12:47:31', NULL, NULL),
(9, 'sample123', '$2y$12$LdaQZTPOiI1lwlrv.bASEOXqtZsc7MMJMT8CPWl6RHdxT4fDVPS9W', 'Sample', 'Test', 'User', 'MALE', 'dyan lang', '2000-01-01', '+12345', 'Bataan', 0, 0, 0, '2022-04-20 12:36:09', '9_1650458169.jpg', 7);

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

--
-- Dumping data for table `bro_enrollment`
--

INSERT INTO `bro_enrollment` (`id`, `user_pk`, `lesson_type`, `admin_pk`, `is_enrolled`, `is_graduated`, `date_approved`, `created_at`) VALUES
(3, 6, 'LIFE_CLASS', 0, 1, 1, '0000-00-00 00:00:00', '2022-04-21 05:18:33'),
(4, 6, 'SOL1', 0, 1, 1, '0000-00-00 00:00:00', '2022-04-21 05:23:00'),
(5, 6, 'SOL2', 0, 1, 1, '0000-00-00 00:00:00', '2022-04-21 05:26:11');

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
(1, 'SOL1', 'M1:CLASS 1 - JESUS IS MY SHEPHERD', 1, 1, '2022-04-17 12:47:31'),
(2, 'SOL1', 'M2:CLASS 1 - WHAT IS VISION?', 2, 1, '2022-04-17 12:47:31'),
(3, 'SOL1', 'M1:CLASS 2 - CULTIVATING A RELATIONSHIP WITH GOD', 3, 1, '2022-04-17 12:47:31'),
(4, 'SOL1', 'M1:CLASS 2 - THE PRINCIPLES OF G12', 4, 1, '2022-04-17 12:47:31'),
(5, 'SOL1', 'M1:CLASS 3 - THE POWER OF PRAISE AND WORSHIP', 5, 1, '2022-04-17 12:47:31'),
(6, 'SOL1', 'M2:CLASS 3 - A FIRM FOUNDATION', 6, 1, '2022-04-17 12:47:31'),
(7, 'SOL1', 'M1:CLASS 4 - STRENGTHENED IN GOD', 7, 1, '2022-04-17 12:47:31'),
(8, 'SOL1', 'M2:CLASS 4 - THE VISION OF THE GOVERNMENT OF G12', 8, 1, '2022-04-17 12:47:31'),
(9, 'SOL1', 'M1:CLASS 5 - SPIRITUAL WARFARE', 9, 1, '2022-04-17 12:47:31'),
(10, 'SOL1', 'M2:CLASS 5 - FORMING THE BEST TEAM', 10, 1, '2022-04-17 12:47:31'),
(11, 'SOL1', 'M1:CLASS 6 - THE REDEMPTIVE POWER OF THE BLOOD', 11, 1, '2022-04-17 12:47:31'),
(12, 'SOL1', 'M2:CLASS 6 - SUCCESSFUL LEADERSHIP', 12, 1, '2022-04-17 12:47:31'),
(13, 'SOL1', 'M1:CLASS 7 - THE BIBLE WILL TRANSFORM YOUR LIFE', 13, 1, '2022-04-17 12:47:31'),
(14, 'SOL1', 'M2:CLASS 7 - THE ART OF WINNING', 14, 1, '2022-04-17 12:47:31'),
(15, 'SOL1', 'M1:CLASS 8 - THE ANOINTING OF THE HOLY SPIRIT', 15, 1, '2022-04-17 12:47:31'),
(16, 'SOL1', 'M2:CLASS 8 - BLESSING THROUGH THE CELL-GROUP', 16, 1, '2022-04-17 12:47:31'),
(17, 'SOL1', 'M1:CLASS 9 - THE BLESSING OF PROSPERITY', 17, 1, '2022-04-17 12:47:31'),
(18, 'SOL1', 'M2:CLASS 9 - READY TO CONSOLIDATE', 18, 1, '2022-04-17 12:47:31'),
(19, 'SOL1', 'M1:CLASS 10 - BUILDING MY CHURCH', 19, 1, '2022-04-17 12:47:31'),
(20, 'SOL1', 'M2:CLASS 10 - THE POWER OF THE 144', 20, 1, '2022-04-17 12:47:31'),
(21, 'SOL2', 'M3:CLASS 1 - THE PRESENT GLORY', 1, 1, '2022-04-17 12:47:31'),
(22, 'SOL2', 'M4:CLASS 1 - FAMILY', 2, 1, '2022-04-17 12:47:31'),
(23, 'SOL2', 'M3:CLASS 2 - KEY PRINCIPLES OF WINNING', 3, 1, '2022-04-17 12:47:31'),
(24, 'SOL2', 'M4:CLASS 2 - THE ROLE OF PARENTS AND CHILDREN', 4, 1, '2022-04-17 12:47:31'),
(25, 'SOL2', 'M3:CLASS 3 - THE POWER OF EVANGELISM', 5, 1, '2022-04-17 12:47:31'),
(26, 'SOL2', 'M4:CLASS 3 - HEALING WITHIN THE FAMILY', 6, 1, '2022-04-17 12:47:31'),
(27, 'SOL2', 'M3:CLASS 4 - EFFECTIVE EVANGELISM', 7, 1, '2022-04-17 12:47:31'),
(28, 'SOL2', 'M4:CLASS 4 - 7 PILLARS FOR A HAPPY MARRIAGE', 8, 1, '2022-04-17 12:47:31'),
(29, 'SOL2', 'M3:CLASS 5 - THE ANOINTING TO WIN', 9, 1, '2022-04-17 12:47:31'),
(30, 'SOL2', 'M4:CLASS 5 - THE BLESSING OF FATHERHOOD', 10, 1, '2022-04-17 12:47:31'),
(31, 'SOL2', 'M3:CLASS 6 - COMPASSION', 11, 1, '2022-04-17 12:47:31'),
(32, 'SOL2', 'M4:CLASS 6 - WHO IS THE RIGHT PERSON?', 12, 1, '2022-04-17 12:47:31'),
(33, 'SOL2', 'M3:CLASS 7 - WHO IS THE RIGHT PERSON?', 13, 1, '2022-04-17 12:47:31'),
(34, 'SOL2', 'M4:CLASS 7 - WHO IS THE RIGHT PERSON?', 14, 1, '2022-04-17 12:47:31'),
(35, 'SOL2', 'M3:CLASS 8 - WHO IS THE RIGHT PERSON?', 15, 1, '2022-04-17 12:47:31'),
(36, 'SOL2', 'M4:CLASS 8 - 7 STEPS FOR A SUCCESSFUL COURTSHIP', 16, 1, '2022-04-17 12:47:31'),
(37, 'SOL2', 'M3:CLASS 9 - VISION', 17, 1, '2022-04-17 12:47:31'),
(38, 'SOL2', 'M4:CLASS 9 - STRENGTHEN COMMUNICATION IN YOUR MARRIAGE', 18, 1, '2022-04-17 12:47:31'),
(39, 'SOL2', 'M3:CLASS 10 - CELL-GROUP STRUCTURE AND DEVELOPMENT', 19, 1, '2022-04-17 12:47:31'),
(40, 'SOL2', 'M4:CLASS 10 - COMMANDMENTS FOR THE FAMILY', 20, 1, '2022-04-17 12:47:31'),
(41, 'SOL3', 'M5:CLASS 1 - A LEADER OF FAITH', 1, 1, '2022-04-17 12:47:31'),
(42, 'SOL3', 'M6:CLASS 1 - SUBMERGED IN HIS SPIRIT', 2, 1, '2022-04-17 12:47:31'),
(43, 'SOL3', 'M5:CLASS 2 - A LEADER\'S FOR THE FLOCK', 3, 1, '2022-04-17 12:47:31'),
(44, 'SOL3', 'M6:CLASS 2 - PREPAIRING TO RECEIVE THE HOLY SPIRIT', 4, 1, '2022-04-17 12:47:31'),
(45, 'SOL3', 'M5:CLASS 3 - A LEADER THAT BUILDS', 5, 1, '2022-04-17 12:47:31'),
(46, 'SOL3', 'M6:CLASS 3 - KNOWING THE HOLY SPIRIT', 6, 1, '2022-04-17 12:47:31'),
(47, 'SOL3', 'M5:CLASS 4 - A LEADER WITH THE HEART OF A SERVANT', 7, 1, '2022-04-17 12:47:31'),
(48, 'SOL3', 'M6:CLASS 4 - THE FRUIT OF THE HOLY SPIRIT (PART 1)', 8, 1, '2022-04-17 12:47:31'),
(49, 'SOL3', 'M5:CLASS 5 - A LEADER CONTROLLED BY THE HOLY SPIRIT', 9, 1, '2022-04-17 12:47:31'),
(50, 'SOL3', 'M6:CLASS 5 - THE FRUIT OF THE HOLY SPIRIT (PART 2)', 10, 1, '2022-04-17 12:47:31'),
(51, 'SOL3', 'M5:CLASS 6 - THE LEADER AND PREACHING OF THE WORD', 11, 1, '2022-04-17 12:47:31'),
(52, 'SOL3', 'M6:CLASS 6 - THE FRUIT OF THE HOLY SPIRIT (PART 3)', 12, 1, '2022-04-17 12:47:31'),
(53, 'SOL3', 'M5:CLASS 7 - THE LEADER AND COUNSELING', 13, 1, '2022-04-17 12:47:31'),
(54, 'SOL3', 'M6:CLASS 7 - INTRODUCTION TO THE GIFTS OF THE HOLY SPIRIT', 14, 1, '2022-04-17 12:47:31'),
(55, 'SOL3', 'M5:CLASS 8 - THE LEADER AND SUPERVISION', 15, 1, '2022-04-17 12:47:31'),
(56, 'SOL3', 'M6:CLASS 8 - THE GIFTS OF REVELATION', 16, 1, '2022-04-17 12:47:31'),
(57, 'SOL3', 'M5:CLASS 9 - THE PRICE OF LEADERSHIP', 17, 1, '2022-04-17 12:47:31'),
(58, 'SOL3', 'M6:CLASS 9 - THE GIFTS OF POWER', 18, 1, '2022-04-17 12:47:31'),
(59, 'SOL3', 'M5:CLASS 10 - THE LEADER AND THE FORMATION OF DISCIPLES', 19, 1, '2022-04-17 12:47:31'),
(60, 'SOL3', 'M6:CLASS 10 - THE GIFTS OF INSPIRATION', 20, 1, '2022-04-17 12:47:31'),
(61, 'LIFE_CLASS', 'WEEK 1', 1, 1, '2022-04-17 12:47:31'),
(62, 'LIFE_CLASS', 'WEEK 2', 2, 1, '2022-04-17 12:47:31'),
(63, 'LIFE_CLASS', 'WEEK 3', 3, 1, '2022-04-17 12:47:31'),
(64, 'LIFE_CLASS', 'WEEK 4', 4, 1, '2022-04-17 12:47:31'),
(65, 'LIFE_CLASS', 'WEEK 5', 5, 1, '2022-04-17 12:47:31'),
(66, 'LIFE_CLASS', 'WEEK 6', 6, 1, '2022-04-17 12:47:31'),
(67, 'LIFE_CLASS', 'WEEK 7', 7, 1, '2022-04-17 12:47:31'),
(68, 'LIFE_CLASS', 'WEEK 8', 8, 1, '2022-04-17 12:47:31'),
(69, 'LIFE_CLASS', 'ENCOUNTER DAY 1', 9, 1, '2022-04-17 12:47:31'),
(70, 'LIFE_CLASS', 'ENCOUNTER DAY 2', 10, 1, '2022-04-17 12:47:31'),
(71, 'LIFE_CLASS', 'ENCOUTNER DAY 3', 11, 1, '2022-04-17 12:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `bro_notifications`
--

CREATE TABLE `bro_notifications` (
  `id` bigint(20) NOT NULL,
  `sender_pk` int(11) DEFAULT NULL,
  `receiver_pk` int(11) NOT NULL DEFAULT 0 COMMENT '0 - all admin',
  `subject_pk` int(11) DEFAULT NULL,
  `caption` varchar(200) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - unread / 1 - read',
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bro_notifications`
--

INSERT INTO `bro_notifications` (`id`, `sender_pk`, `receiver_pk`, `subject_pk`, `caption`, `action`, `status`, `date_created`, `date_updated`) VALUES
(1, 6, 0, 6, NULL, 'ENROLL', 0, '2022-04-19 13:14:57', NULL),
(2, 6, 0, 6, NULL, 'ENROLL', 0, '2022-04-19 13:15:53', NULL),
(3, 9, 6, 9, NULL, 'SIGNUP', 0, '2022-04-20 12:36:09', NULL),
(4, 1, 0, 6, NULL, 'ENROLL', 0, '2022-04-20 13:47:28', NULL),
(5, 1, 0, 6, NULL, 'ENROLL', 0, '2022-04-21 01:16:36', NULL),
(6, 6, 0, 6, NULL, 'ENROLL', 0, '2022-04-21 05:18:33', NULL),
(7, NULL, 0, 6, NULL, 'ENROLL', 0, '2022-04-21 05:20:33', NULL),
(8, 6, 0, 6, NULL, 'ENROLL', 0, '2022-04-21 05:23:00', NULL),
(9, NULL, 0, 6, NULL, 'ENROLL', 0, '2022-04-21 05:23:09', NULL),
(10, 6, 0, 6, NULL, 'ENROLL', 0, '2022-04-21 05:26:11', NULL),
(11, NULL, 0, 6, NULL, 'ENROLL', 0, '2022-04-21 05:26:29', NULL);

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
(1, 'test', 'Bataan', 'Admin', '2022-04-17 20:47:31'),
(2, 'test', 'Gensan', 'Admin', '2022-04-17 20:47:31'),
(3, 'test', 'Kalibo', 'Admin', '2022-04-17 20:47:31'),
(4, 'test', 'Valenzuela', 'Admin', '2022-04-17 20:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `bro_schooling`
--

CREATE TABLE `bro_schooling` (
  `id` bigint(20) NOT NULL,
  `user_pk` int(11) DEFAULT NULL,
  `lesson_pk` int(11) DEFAULT NULL,
  `attendance` tinyint(1) DEFAULT NULL,
  `leader_pk` int(11) DEFAULT 0,
  `date_confirmed` timestamp NULL DEFAULT NULL,
  `date_approved` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bro_schooling`
--

INSERT INTO `bro_schooling` (`id`, `user_pk`, `lesson_pk`, `attendance`, `leader_pk`, `date_confirmed`, `date_approved`, `created_at`) VALUES
(41, 6, 61, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(42, 6, 62, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(43, 6, 63, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(44, 6, 64, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(45, 6, 65, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(46, 6, 66, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(47, 6, 67, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(48, 6, 68, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(49, 6, 69, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(50, 6, 70, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(51, 6, 71, NULL, 0, NULL, NULL, '2022-04-21 05:20:33'),
(52, 6, 1, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(53, 6, 2, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(54, 6, 3, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(55, 6, 4, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(56, 6, 5, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(57, 6, 6, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(58, 6, 7, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(59, 6, 8, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(60, 6, 9, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(61, 6, 10, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(62, 6, 11, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(63, 6, 12, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(64, 6, 13, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(65, 6, 14, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(66, 6, 15, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(67, 6, 16, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(68, 6, 17, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(69, 6, 18, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(70, 6, 19, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(71, 6, 20, NULL, 0, NULL, NULL, '2022-04-21 05:23:09'),
(72, 6, 21, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(73, 6, 22, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(74, 6, 23, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(75, 6, 24, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(76, 6, 25, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(77, 6, 26, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(78, 6, 27, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(79, 6, 28, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(80, 6, 29, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(81, 6, 30, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(82, 6, 31, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(83, 6, 32, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(84, 6, 33, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(85, 6, 34, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(86, 6, 35, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(87, 6, 36, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(88, 6, 37, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(89, 6, 38, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(90, 6, 39, NULL, 0, NULL, NULL, '2022-04-21 05:26:29'),
(91, 6, 40, NULL, 0, NULL, NULL, '2022-04-21 05:26:29');

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
(1, 1, 1, 1, '2022-04-17 20:47:31'),
(2, 1, 2, 1, '2022-04-17 20:47:31'),
(3, 2, 3, 1, '2022-04-17 20:47:31'),
(4, 2, 4, 1, '2022-04-17 20:47:31'),
(5, 2, 5, 1, '2022-04-17 20:47:31'),
(6, 1, 6, 1, '2022-04-17 20:47:31'),
(7, 2, 7, 1, '2022-04-17 20:47:31'),
(8, 2, 8, 1, '2022-04-17 20:47:31'),
(9, 6, 9, 0, '2022-04-20 20:36:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bro_invites`
--
ALTER TABLE `bro_invites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bro_lessons`
--
ALTER TABLE `bro_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `bro_notifications`
--
ALTER TABLE `bro_notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bro_qr`
--
ALTER TABLE `bro_qr`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bro_schooling`
--
ALTER TABLE `bro_schooling`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `bro_tribe`
--
ALTER TABLE `bro_tribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
