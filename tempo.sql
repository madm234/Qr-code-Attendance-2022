-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 05:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tempo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(233) NOT NULL,
  `password` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$zuz2sl/m6FCLAhv8SHntfe2gbqKnEy4z87d8wqxEfTFlsNu2NJwLq');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `sap_id` int(11) NOT NULL,
  `subject1` int(11) NOT NULL,
  `subject2` int(11) NOT NULL,
  `subject3` int(11) NOT NULL,
  `subject4` int(11) NOT NULL,
  `subject5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `sap_id`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`) VALUES
(13, 1000011454, 3, 0, 2, 0, 6),
(14, 1000014214, 0, 0, 0, 1, 3),
(15, 1000015631, 4, 3, 4, 1, 7),
(16, 1000014275, 0, 1, 0, 1, 1),
(17, 1000015603, 0, 0, 0, 0, 4),
(18, 1000011562, 0, 2, 0, 0, 0),
(19, 1000011114, 0, 0, 0, 0, 5),
(20, 1000011116, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(233) NOT NULL,
  `email` varchar(233) NOT NULL,
  `password` varchar(233) NOT NULL,
  `department` varchar(233) NOT NULL,
  `position` varchar(233) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `department`, `position`, `phone_no`, `status`, `image`) VALUES
(3, 'Priya', 'prpi@dit.edu.in', '$2y$10$DMf4YrU4Fy710/afmoYzjuRp5.8L269zM66lKTW2K1twIj2AP6N5m', 'Office', 'Assistant Manager', 724832330, 1, 'https://dsbindia.com/assets/images/ourcommunity/teachers/Ami%20Shah.jpg'),
(10, 'Chirag Bansal', '1000055559@dit.edu.in', '$2y$10$dTAJnjDnnJsYvyYCpIpIFeh1zFsfgIs4xOER92KhSLRtTAjhbzdhq', 'Library', 'Extra', 2147483647, 1, 'http://idhunammaavadi.com/wp-content/uploads/2021/01/07156b4680962b650af1c6927c7019d5.jpg'),
(11, 'Vijendra Kumar', '1000033342@dit.edu.in', '$2y$10$ci95TkjdGN6tIoRof5xnquW/jghhqj6DM3JG0F6IlmzkLCnU01JCW', 'Library', 'Employee', 2147483647, 1, 'https://anurag.edu.in/wp-content/uploads/2021/11/025-Mr.-M.-MURALI-KRISHNA-ece-scaled.jpg'),
(12, 'Lakshmi Tripathi', '1000077656@dit.edu.in', '$2y$10$Z3zteNyrqY1oqC5hmvyQUO2c5RHMgjLmF97Oh.uJ.wdWW40vkODbi', 'Library', 'Employee', 2147483647, 1, 'https://erp.oav.edu.in/documents/oav/uploads/employee_photo/SAS030/SAS030.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `sap_id` int(11) NOT NULL,
  `entry` varchar(23) NOT NULL,
  `ex` varchar(233) NOT NULL,
  `issued` varchar(233) NOT NULL,
  `issued_on` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `sap_id`, `entry`, `ex`, `issued`, `issued_on`) VALUES
(2, 1000011454, '9:46:14', '9:46:53', '2,56789,55554', '11:17:27'),
(16, 1000015631, '15:08:17', '15:08:37', '', ''),
(17, 1000015603, '', '', '1,56789', '15:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `email` varchar(233) NOT NULL,
  `des` varchar(233) NOT NULL,
  `date` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `des`, `date`) VALUES
(1, '2', 'Welcome to your account! Enjoy your stay.', '09-07-2022'),
(3, '1', 'Scan with QR .You can see any user\'s detail as well as can take attendance of your student.', '2022-07-10 01:35:11'),
(21, '3', 'Scan with QR .You can see any user\'s detail.', '2022-07-10 01:35:11'),
(28, '2', 'college is openeing', '2022-07-11 15:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `qr_code`
--

CREATE TABLE `qr_code` (
  `id` int(11) NOT NULL,
  `name` varchar(233) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qr_code`
--

INSERT INTO `qr_code` (`id`, `name`, `email`, `status`, `added_on`) VALUES
(8, 'Meenakshi Lekhi', 'lekhi@dit.edu.in', 1, '2022-06-27 15:10:13'),
(10, 'Gani', 'gani@dit.edu.in', 1, '2022-06-27 15:11:24'),
(11, 'Yogesh Giri', '15603@dit.edu.in', 1, '2022-06-29 00:21:59'),
(12, 'Shriya', 'rahulgiri6806@gmail.com', 1, '2022-07-01 11:46:26'),
(13, 'ty', '', 1, '2022-07-01 11:48:03'),
(15, 'fghjk', '', 1, '2022-07-01 11:49:17'),
(16, 'Jain', '1000034567@dit.edu.in', 1, '2022-07-01 11:52:36'),
(17, 'Kamlesh', 'rahulgiri6806@gmail.com', 1, '2022-07-01 11:56:52'),
(18, 'Harsh Sharma', 'pahadi7337@gmail.com', 1, '2022-07-01 15:19:07'),
(19, 'Harsh Sharma', 'sharmaharsh2265@gmail.com', 1, '2022-07-01 15:23:18'),
(20, 'Harsh Sharma', 'sharmaharsh2265@gmail.com', 1, '2022-07-01 15:31:22'),
(21, 'Palaksh Ghildiyal', 'ghildiyalpalaksh17@gmail.com', 1, '2022-07-01 15:34:45'),
(22, 'ronu', 'rahulgiri6806@gmail.com', 1, '2022-07-01 15:51:31'),
(23, 'Palaksh Ghildiyal', 'ghildiyalpalaksh17@gmail.com', 1, '2022-07-02 00:03:44'),
(24, 'fo', 'pahadi7337@gmail.com', 1, '2022-07-02 02:28:01'),
(25, 'shama', 'rahulgiri6806@gmail.com', 1, '2022-07-02 02:56:37'),
(26, 'shama', 'rahulgiri6806@gmail.com', 1, '2022-07-02 02:56:40'),
(27, 'fiza', 'rahulgiri6806@gmail.com', 1, '2022-07-02 02:57:30'),
(28, 'Shikander', 'rahulgiri6806@gmail.com', 1, '2022-07-02 03:00:34'),
(29, 'Nagarjun', 'rahulgiri6806@gmail.com', 1, '2022-07-02 03:07:05'),
(30, 'Shiva', 'rahulgiri6806@gmail.com', 1, '2022-07-02 03:09:29'),
(31, 'Akshdeep', 'rahulgiri6806@gmail.com', 1, '2022-07-02 03:40:51'),
(32, 'simha', 'rahulgiri6806@gmail.com', 1, '2022-07-02 03:43:03'),
(33, 'Lala', 'rahulgiri6806@gmail.com', 1, '2022-07-02 03:46:03'),
(34, 'boman', 'rahulgiri6806@gmail.com', 1, '2022-07-02 03:47:33'),
(35, 'Lokesh', 'rahulgiri6806@gmail.com', 1, '2022-07-02 04:04:02'),
(36, 'Yogesh Giri', 'yogeshgiri6806@gmail.com', 1, '2022-07-02 13:01:06'),
(37, 'Harsh Sharma', 'sharmaharsh2265@gmail.com', 1, '2022-07-02 20:08:00'),
(38, 'Palaksh Ghildiyal', 'rahulgiri6806@gmail.com', 1, '2022-07-03 14:04:03'),
(39, 'Harsha', 'yogeshgiri6806@gmail.com', 1, '2022-07-03 14:06:02'),
(40, 'Riya', 'yogeshgiri6806@gmail.com', 1, '2022-07-03 14:14:50'),
(41, 'tyw', 'yogeshgiri6806@gmail.com', 1, '2022-07-03 14:16:14'),
(42, 'yu', 'yogeshgiri6806@gmail.com', 1, '2022-07-03 14:19:12'),
(43, 'Kamlesh Singh', 'rahulgiri6806@gmail.com', 1, '2022-07-03 14:37:01'),
(44, 'Sagar Awasthi', 'rahulgiri6806@gmail.com', 1, '2022-07-03 14:56:46'),
(45, 'Garima chaudhary', 'rahulgiri6806@gmail.com', 1, '0000-00-00 00:00:00'),
(46, 'Kamlesh', 'kamleshsingh0198@gmail.com', 1, '2022-07-03 22:09:45'),
(47, 'Shiva verma', 'rahulgiri6806@gmail.com', 1, '2022-07-04 11:27:25'),
(48, 'Maya', 'rahulgiri6806@gmail.com', 1, '2022-07-08 02:51:13'),
(49, 'Ramesh', 'rahulgiri6806@gmail.com', 1, '0000-00-00 00:00:00'),
(50, 'Garima Chaudhary', 'rahulgiri6806@gmail.com', 1, '0000-00-00 00:00:00'),
(51, 'Atul Shrivastava', 'rahulgiri6806@gmail.com', 1, '0000-00-00 00:00:00'),
(52, 'Vijay Bisht', 'rahulgiri6806@gmail.com', 1, '2022-07-08 03:14:05'),
(53, 'Annu Sharma', 'rahulgiri6806@gmail.com', 1, '2022-07-08 03:17:48'),
(54, 'Palaksh Ghildiyal', 'rahulgiri6806@gmail.com', 1, '2022-07-08 03:25:11'),
(55, 'Kamlesh Singh', 'rahulgiri6806@gmail.com', 1, '2022-07-08 03:36:55'),
(56, 'Akshanshu Verma', 'rahulgiri6806@gmail.com', 1, '2022-07-08 03:42:48'),
(57, 'Smriti Chauhan', 'rahulgiri6806@gmail.com', 1, '2022-07-08 03:47:28'),
(58, 'Lavanya Jain', 'rahulgiri6806@gmail.com', 1, '2022-07-08 03:51:19'),
(59, 'Sumitra Panwar', 'rahulgiri6806@gmail.com', 1, '2022-07-08 03:54:31'),
(60, 'Chirag Bansal', 'rahulgiri6806@gmail.com', 1, '2022-07-10 21:38:23'),
(61, 'Vijendra Kumar', 'pahadi7337@gmail.com', 1, '2022-07-11 10:07:21'),
(62, 'Lakshmi Tripathi', 'rahulgiri6806@gmail.com', 1, '2022-07-11 10:09:45'),
(63, 'Parul Gulati', 'yogeshgiri6806@gmail.com', 1, '2022-07-11 14:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `qr_traffic`
--

CREATE TABLE `qr_traffic` (
  `id` int(11) NOT NULL,
  `name` varchar(233) NOT NULL,
  `email` varchar(233) NOT NULL,
  `added_by` varchar(233) NOT NULL,
  `venue` varchar(233) NOT NULL,
  `device` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `added_on_str` date NOT NULL,
  `added_on` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `os` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qr_traffic`
--

INSERT INTO `qr_traffic` (`id`, `name`, `email`, `added_by`, `venue`, `device`, `browser`, `city`, `state`, `country`, `added_on_str`, `added_on`, `ip_address`, `os`) VALUES
(419, 'Palaksh Ghildiyal', '1000015631@dit.edu.in', 'Vijay Bisht', 'VISH305', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-08', '2022-07-08 05:04:41', '106.78.66.161', 'Window'),
(420, 'Akshanshu Verma', '1000011454@dit.edu.in', 'Vijay Bisht', 'VISH305', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-08', '2022-07-08 05:05:48', '106.78.66.161', 'Window'),
(421, 'Sumitra Panwar', '1000011562@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-08', '2022-07-08 05:09:38', '106.78.66.161', 'Window'),
(422, 'Palaksh Ghildiyal', '1000015631@dit.edu.in', 'Annu Sharma', 'VED209', 'Mobile', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-08', '2022-07-08 05:04:41', '106.78.66.161', 'Window'),
(429, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:15:33', '106.78.66.111', 'Window'),
(430, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:21:11', '106.78.66.111', 'Window'),
(431, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:22:01', '106.78.66.111', 'Window'),
(432, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:24:18', '106.78.66.111', 'Window'),
(433, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:26:15', '106.78.66.111', 'Window'),
(434, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:27:07', '106.78.66.111', 'Window'),
(435, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:29:02', '106.78.66.111', 'Window'),
(436, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:29:04', '106.78.66.111', 'Window'),
(437, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:29:23', '106.78.66.111', 'Window'),
(438, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:29:31', '106.78.66.111', 'Window'),
(439, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:29:53', '106.78.66.111', 'Window'),
(440, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:29:57', '106.78.66.111', 'Window'),
(441, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:30:03', '106.78.66.111', 'Window'),
(442, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:30:16', '106.78.66.111', 'Window'),
(443, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:30:23', '106.78.66.111', 'Window'),
(444, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:31:09', '106.78.66.111', 'Window'),
(445, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:31:33', '106.78.66.111', 'Window'),
(446, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:31:45', '106.78.66.111', 'Window'),
(447, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:31:59', '106.78.66.111', 'Window'),
(448, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:32:01', '106.78.66.111', 'Window'),
(449, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:32:06', '106.78.66.111', 'Window'),
(450, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:32:11', '106.78.66.111', 'Window'),
(451, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:32:15', '106.78.66.111', 'Window'),
(452, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:32:25', '106.78.66.111', 'Window'),
(453, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:32:54', '106.78.66.111', 'Window'),
(454, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:33:05', '106.78.66.111', 'Window'),
(455, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:33:32', '106.78.66.111', 'Window'),
(456, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:33:34', '106.78.66.111', 'Window'),
(457, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:33:40', '106.78.66.111', 'Window'),
(458, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:33:57', '106.78.66.111', 'Window'),
(459, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:34:11', '106.78.66.111', 'Window'),
(460, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:34:21', '106.78.66.111', 'Window'),
(461, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:34:29', '106.78.66.111', 'Window'),
(462, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:34:58', '106.78.66.111', 'Window'),
(463, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:35:09', '106.78.66.111', 'Window'),
(464, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:36:07', '106.78.66.111', 'Window'),
(465, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:36:17', '106.78.66.111', 'Window'),
(466, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:38:36', '106.78.66.111', 'Window'),
(467, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:39:59', '106.78.66.111', 'Window'),
(468, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:40:24', '106.78.66.111', 'Window'),
(469, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:41:22', '106.78.66.111', 'Window'),
(470, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:42:15', '106.78.66.111', 'Window'),
(471, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:43:37', '106.78.66.111', 'Window'),
(472, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:44:54', '106.78.66.111', 'Window'),
(473, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:46:56', '106.78.66.111', 'Window'),
(474, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:47:24', '106.78.66.111', 'Window'),
(475, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:48:23', '106.78.66.111', 'Window'),
(476, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:48:48', '106.78.66.111', 'Window'),
(477, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:49:51', '106.78.66.111', 'Window'),
(478, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:50:25', '106.78.66.111', 'Window'),
(479, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:50:49', '106.78.66.111', 'Window'),
(480, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:50:56', '106.78.66.111', 'Window'),
(481, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:51:04', '106.78.66.111', 'Window'),
(482, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:51:14', '106.78.66.111', 'Window'),
(483, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:51:18', '106.78.66.111', 'Window'),
(484, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:51:31', '106.78.66.111', 'Window'),
(485, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:51:39', '106.78.66.111', 'Window'),
(486, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:52:11', '106.78.66.111', 'Window'),
(487, 'Palaksh Ghildiyal', '1000015631@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:56:29', '106.78.66.111', 'Window'),
(488, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:56:37', '106.78.66.111', 'Window'),
(489, 'Akshanshu Verma', '1000011454@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:57:33', '106.78.66.111', 'Window'),
(490, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 01:58:53', '106.78.66.111', 'Window'),
(491, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:01:10', '106.78.66.111', 'Window'),
(492, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:02:30', '106.78.66.111', 'Window'),
(493, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:03:31', '106.78.66.111', 'Window'),
(494, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:04:36', '106.78.66.111', 'Window'),
(495, 'Lavanya Jain', '1000011116@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:05:04', '106.78.66.111', 'Window'),
(496, 'Palaksh Ghildiyal', '1000015631@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:06:42', '106.78.66.111', 'Window'),
(497, 'Smriti Chauhan', '1000011114@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:14:24', '106.78.66.111', 'Window'),
(498, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:14:33', '106.78.66.111', 'Window'),
(499, 'Sumitra Panwar', '1000011562@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:14:45', '106.78.66.111', 'Window'),
(500, 'Shriya', 'rahulgiri6806@gmail.com', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:17:29', '106.78.66.111', 'Window'),
(501, 'Shriya', 'rahulgiri6806@gmail.com', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:19:18', '106.78.66.111', 'Window'),
(502, 'Shriya', 'rahulgiri6806@gmail.com', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:20:10', '106.78.66.111', 'Window'),
(503, 'Shriya', 'rahulgiri6806@gmail.com', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:20:28', '106.78.66.111', 'Window'),
(504, 'Shriya', 'rahulgiri6806@gmail.com', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:20:35', '106.78.66.111', 'Window'),
(505, 'Shriya', 'rahulgiri6806@gmail.com', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:25:58', '106.78.66.111', 'Window'),
(506, 'Ramesh Bijlani', '1000012346@dit.edu.in', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:26:30', '106.78.66.111', 'Window'),
(507, 'Ramesh Bijlani', '1000012346@dit.edu.in', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:28:19', '106.78.66.111', 'Window'),
(508, 'Yogesh Giri', '1000015603@dit.edu.in', 'Annu Sharma', 'VISH312', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 02:29:55', '106.78.66.111', 'Window'),
(509, 'Shriya', 'rahulgiri6806@gmail.com', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 11:57:41', '106.77.129.50', 'Window'),
(510, 'Johan', 'rahulgiri6806@gmail.com', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 11:57:54', '106.77.129.50', 'Window'),
(511, 'Atul Shrivastava', '1000012348@dit.edu.in', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 11:58:06', '106.77.129.50', 'Window'),
(512, 'Ramesh Bijlani', '1000012346@dit.edu.in', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 11:59:30', '106.77.129.50', 'Window'),
(513, 'Garima Chaudhary', '1000012347@dit.edu.in', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 11:59:38', '106.77.129.50', 'Window'),
(514, 'Atul Shrivastava', '1000012348@dit.edu.in', 'Annu Sharma', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 11:59:49', '106.77.129.50', 'Window'),
(515, 'Palaksh Ghildiyal', '1000015631@dit.edu.in', 'Priya', '', 'Mobile', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-09', '2022-07-09 13:04:41', '139.167.180.248', 'Android'),
(516, 'Garima Chaudhary', '1000012347@dit.edu.in', 'Garima Chaudhary', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 13:53:28', '106.66.61.152', 'Window'),
(517, 'Garima Chaudhary', '1000012347@dit.edu.in', 'Garima Chaudhary', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 13:54:19', '106.66.61.152', 'Window'),
(518, 'Ramesh Bijlani', '1000012346@dit.edu.in', 'Garima Chaudhary', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-09', '2022-07-09 13:54:27', '106.66.61.152', 'Window'),
(519, 'Kamlesh Singh', '1000014214@dit.edu.in', 'Ramesh Bijlani', 'VISH305', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:23:18', '106.78.73.21', 'Window'),
(520, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:56:01', '106.78.73.21', 'Window'),
(521, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:56:59', '106.78.73.21', 'Window'),
(522, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:57:48', '106.78.73.21', 'Window'),
(523, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:58:17', '106.78.73.21', 'Window'),
(524, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:58:58', '106.78.73.21', 'Window'),
(525, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:59:03', '106.78.73.21', 'Window'),
(526, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:59:20', '106.78.73.21', 'Window'),
(527, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:59:43', '106.78.73.21', 'Window'),
(528, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:59:56', '106.78.73.21', 'Window'),
(529, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 03:00:06', '106.78.73.21', 'Window'),
(530, 'Lavanya Jain', '1000011116@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 03:00:41', '106.78.73.21', 'Window'),
(531, 'Palaksh Ghildiyal', '1000014214@dit.edu.in', 'Ramesh Bijlani', 'VISH305', 'Mobile', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-11', '2022-07-11 12:19:00', '106.78.73.21', 'Window'),
(532, 'Palaksh Ghildiyal', '1000015631@dit.edu.in', 'Atul Shrivastava', 'VISH308', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-08', '2022-07-08 05:04:41', '106.78.66.161', 'Window'),
(533, 'Lavanya Jain', '1000011116@dit.edu.in', 'Chirag Bansal', '', 'PC', 'Chrome', 'Dehradun', 'Uttarakhand', 'India', '2022-07-10', '2022-07-10 02:59:56', '106.78.73.21', 'Window'),
(534, 'Garima Chaudhary', '1000012347@dit.edu.in', 'Akshanshu Verma', '', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 09:49:36', '106.78.72.4', 'Window'),
(535, 'Garima Chaudhary', '1000012347@dit.edu.in', 'Garima Chaudhary', '', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 12:07:06', '117.99.1.173', 'Window'),
(536, 'Harsh Sharma', '1000014275@dit.edu.in', 'Atul Shrivastava', 'VE212', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 12:24:50', '117.99.1.173', 'Window'),
(537, 'Palaksh Ghildiyal', '1000015631@dit.edu.in', 'Atul Shrivastava', 'VE212', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 12:25:16', '117.99.1.173', 'Window'),
(538, 'Ramesh Bijlani', '1000012346@dit.edu.in', 'Ramesh Bijlani', '', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 12:35:29', '117.99.1.173', 'Window'),
(539, 'Garima Chaudhary', '1000012347@dit.edu.in', 'Ramesh Bijlani', '', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 12:35:38', '117.99.1.173', 'Window'),
(540, 'Atul Shrivastava', '1000012348@dit.edu.in', 'Ramesh Bijlani', '', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 13:05:38', '117.99.1.173', 'Window'),
(541, 'Harsh Sharma', '1000014275@dit.edu.in', 'Garima Chaudhary', 'VE209', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 13:26:10', '117.99.1.173', 'Window'),
(542, 'Harsh Sharma', '1000014275@dit.edu.in', 'Priya', '', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 13:27:35', '117.99.1.173', 'Window'),
(543, 'Harsh Sharma', '1000014275@dit.edu.in', 'Vijay Bisht', 'WL205', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 15:13:27', '106.215.188.57', 'Window'),
(544, 'Palaksh Ghildiyal', '1000015631@dit.edu.in', 'Vijay Bisht', 'WL205', 'PC', 'Chrome', 'Delhi', 'National Capital Territory of Delhi', 'India', '2022-07-11', '2022-07-11 15:13:57', '106.215.188.57', 'Window');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(233) NOT NULL,
  `email` varchar(233) NOT NULL,
  `email_prev` varchar(233) NOT NULL,
  `password` varchar(233) NOT NULL,
  `subject` varchar(233) NOT NULL,
  `course` varchar(233) NOT NULL,
  `branch` varchar(233) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `status` int(11) NOT NULL,
  `position` varchar(233) NOT NULL,
  `image` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `email_prev`, `password`, `subject`, `course`, `branch`, `phone_no`, `status`, `position`, `image`) VALUES
(38, 'Ramesh Bijlani', '1000012346@dit.edu.in', 'rahulgiri6806@gmail.com', '$2y$10$/INWArdJxKauE9rC9sjcROm3ZiRUxfGc/Y1QRCXsQFvnbi.ycn./2', 'Java', 'BTech', 'Computer Science', 7248354755, 1, 'Teacher', 'https://www.dituniversity.edu.in/Uploads/faculty/5frt_10000515.jpg'),
(39, 'Garima Chaudhary', '1000012347@dit.edu.in', 'rahulgiri6806@gmail.com', '$2y$10$uJdgCUE4cZYqar.jlBhzTOG59s4gVW6oFpTwBeHQ7LW2at.W684Vm', 'DBMS', 'BTech', 'Computer Science', 9248376559, 1, 'Head of Department', 'https://www.dituniversity.edu.in/Uploads/faculty/12frt_10000235.jpg'),
(40, 'Atul Shrivastava', '1000012348@dit.edu.in', 'rahulgiri6806@gmail.com', '$2y$10$OxiPeA.dD2MEySs80j1Ax.nzBfxX14cndB4U0YTEYqCckrkrtSHme', 'OS', 'BTech', 'Computer Science', 9520256068, 1, 'Head of Department', 'https://www.dituniversity.edu.in/Uploads/faculty/6frt_thumbnail_Convener_Dr.JogendraKumar.jpg'),
(41, 'Vijay Bisht', '1000012349@dit.edu.in', 'rahulgiri6806@gmail.com', '$2y$10$lte8sAfRiB2n/xVs8Q.fc.LFWWFygsXV501EQnseQPViai0zEuMJK', 'Human Values', 'General', 'Economics', 9576234399, 1, 'Senior of Department', 'https://www.dituniversity.edu.in/Uploads/faculty/16frt_Dr.ParveenKumar.jpg'),
(42, 'Annu Sharma', '1000012351@dit.edu.in', 'rahulgiri6806@gmail.com', '$2y$10$b.Mhf1.W3lFs4o3p1YJopONmodIjat2.GWO9C2YEapmEr.zUjegUu', 'Physiology', 'General', 'General', 9589876756, 1, 'Teacher', 'https://www.dituniversity.edu.in/Uploads/faculty/19frt_10000682.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff_class`
--

CREATE TABLE `staff_class` (
  `id` int(11) NOT NULL,
  `username` varchar(233) NOT NULL,
  `subject` varchar(233) NOT NULL,
  `section` varchar(12) NOT NULL,
  `day` varchar(233) NOT NULL,
  `time` varchar(233) NOT NULL,
  `room` varchar(233) NOT NULL,
  `building` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_class`
--

INSERT INTO `staff_class` (`id`, `username`, `subject`, `section`, `day`, `time`, `room`, `building`) VALUES
(13, '1000012346@dit.edu.in', 'Java', 'a,b,c', '1', '9,11,2', '202,204,208', 'VE,VE,WL'),
(14, '1000012346@dit.edu.in', 'Java', 'd,e', '2', '9,10', '204,206', 'VE,WL'),
(15, '1000012346@dit.edu.in', 'Java', 'b,c,d', '4', '9,11,3', '304,306,308', 'VISH,CH,CH'),
(16, '1000012346@dit.edu.in', 'Java', 'a,b', '5', '11,2', '307,305', 'CH,VISH'),
(17, '1000012347@dit.edu.in', 'DBMS', 'd,e', '1', '1,10', '209,212', 'VE,VE'),
(18, '1000012347@dit.edu.in', 'DBMS', 'b,c', '2', '9,10', '212,210', 'VE,WL'),
(19, '1000012347@dit.edu.in', 'DBMS', 'a', '3', '9', '305', 'VISH'),
(20, '1000012347@dit.edu.in', 'DBMS', 'a,d,e', '4', '10,2,4', '302,312,306', 'CH,VISH,CH'),
(21, '1000012347@dit.edu.in', 'DBMS', 'b,c', '5', '10,12', '308,309', 'CH,CH'),
(22, '1000012348@dit.edu.in', 'OS', 'b,e', '1', '2,12', '204,212', 'VE,VE'),
(23, '1000012348@dit.edu.in', 'OS', 'c,d', '3', '10,12', '302,304', 'CH,VISH'),
(24, '1000012348@dit.edu.in', 'OS', 'a,b,e', '4', '9,11,12', '306,312,305', 'CH,VISH,VISH'),
(25, '1000012348@dit.edu.in', 'OS', 'c,d', '5', '10,12', '304,306', 'VISH,CH'),
(26, '1000012349@dit.edu.in', 'Human Values', 'a,d', '1', '11,3', '210,205', 'WL,WL'),
(27, '1000012349@dit.edu.in', 'Human Values', 'a,b,c', '2', '9,2,3', '202,205,212', 'VE,WL,VE'),
(28, '1000012349@dit.edu.in', 'Human Values', 'a,e', '3', '10,3', '308,312', 'CH,VISH'),
(29, '1000012349@dit.edu.in', 'Human Values', 'b,c,d', '4', '10,12,4', '304,306,312', 'VISH,CH,VISH'),
(30, '1000012349@dit.edu.in', 'Human Values', 'a,b', '5', '11,5', '307,305', 'CH,VISH'),
(31, '1000012351@dit.edu.in', 'Physiology', 'a,d,e', '2', '10,12,2', '204,212,208', 'VE,VE,WL'),
(32, '1000012351@dit.edu.in', 'Physiology', 'b,c', '3', '11,4', '306,307', 'CH,CH'),
(33, '1000012351@dit.edu.in', 'Physiology', 'a,e', '4', '11,3', '309,304', 'CH,VISH'),
(34, '1000012351@dit.edu.in', 'Physiology', 'c,d,e', '5', '9,11,2', '304,306,312', 'VISH,CH,VISH');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sap_id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `course` varchar(233) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `joined` year(4) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `subject1` varchar(122) NOT NULL,
  `subject2` varchar(122) NOT NULL,
  `subject3` varchar(122) NOT NULL,
  `subject4` varchar(233) NOT NULL,
  `subject5` varchar(233) NOT NULL,
  `hit1` int(11) NOT NULL,
  `hit2` int(11) NOT NULL,
  `hit3` int(11) NOT NULL,
  `hit4` int(11) NOT NULL,
  `hit5` int(11) NOT NULL,
  `image` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `sap_id`, `roll_no`, `password`, `course`, `branch`, `email`, `joined`, `phone_no`, `status`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `hit1`, `hit2`, `hit3`, `hit4`, `hit5`, `image`) VALUES
(40, 'Yogesh Giri', 1000015603, 200102499, '$2y$10$s4GoK8iS9FLy3blUnJ.i4OMcxn9nfY3lY4l4gRY.Y4Fu.IpoacWuK', 'BTech', 'Computer Science', '1000015603@dit.edu.in', 2021, 9520256068, 1, 'Data Structures,a', 'Java,c', 'Advanced Java,e', 'COA,b', 'Physiology,e', 0, 12, 2, 0, 2, 'https://i.postimg.cc/G34gzsS0/yogesh.jpg'),
(41, 'Harsh Sharma', 1000014275, 200102580, '$2y$10$9v0.Ma/k1w.P8NJwf22Qo.cPt4PY1z8bBrItpp22HaE9rCx0eS3c6', 'BTech', 'Computer Science', '1000014275@dit.edu.in', 2020, 9027764311, 1, 'Data Structures,a', 'DBMS,d', 'Java,d', 'OS,e', 'Human Values,d', 0, 1, 0, 12, 3, 'https://i.postimg.cc/MHf6tKg7/harsh.jpg'),
(53, 'Palaksh Ghildiyal', 1000015631, 2000102435, '$2y$10$tDhd/2b698G2a4i2Yr9sOOkSRXc38TTmTePiT53NugVS9v5e7sQGS', 'BTech', 'Computer Science', '1000015631@dit.edu.in', 2020, 9343287311, 1, 'Java,a', 'OS,e', 'DBMS,c', 'COA,b', 'Human Values,d', 0, 12, 0, 0, 3, 'https://i.postimg.cc/tCdnWBbB/palaksh.jpg'),
(54, 'Kamlesh Singh', 1000014214, 200102037, '$2y$10$plFNFCHAdvAnIUQDiGhp2Oa9JlQFQY.RUavsSaRD7iYtdnJBkTTee', 'BTech', 'Computer Science', '1000014214@dit.edu.in', 2020, 9520256068, 1, 'DBMS,e', 'Java,c', 'OS,c', 'Java,b', 'Physiology,e', 0, 0, 0, 2, 0, 'https://i.postimg.cc/FRv7Fytq/kamlesh.jpg'),
(55, 'Akshanshu Verma', 1000011454, 2000102655, '$2y$10$aeWz7WTocW1LFvOq8eUOP.B0.HA2TB1ogd1LXSNqqDBPEzAd8ZARO', 'BArch', 'Architecture', '1000011454@dit.edu.in', 2021, 9520259987, 1, 'Architectural Design II,d', 'COA,c', 'OS,a', 'COA,b', 'Physiology,e', 0, 0, 4, 0, 5, ''),
(56, 'Smriti Chauhan', 1000011114, 2000102114, '$2y$10$E7GKG.DOnPyJ4QfvYBAql.EUfrr9q1iPZi56C8TYHFxLitdrubkpO', 'BTech', 'Computer Science', '1000011114@dit.edu.in', 2021, 9520256068, 1, 'Data Structures,d', 'Java,b', 'DBMS,d', 'COA,a', 'Physiology,e', 0, 0, 0, 0, 0, ''),
(58, 'Sumitra Panwar', 1000011562, 200102666, '$2y$10$sQ3g3zFpxV9nVYTiblQfmO5v3L7ZL3YzRwsz2bEPo60D6Nl3XfyqW', 'BCA', 'Banking', '1000011562@dit.edu.in', 2022, 9520256068, 1, 'Humanities,a', 'Physiology,e', 'COA,c', 'OS,a', 'Physiology,e', 0, 2, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_code`
--
ALTER TABLE `qr_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_traffic`
--
ALTER TABLE `qr_traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_class`
--
ALTER TABLE `staff_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `qr_code`
--
ALTER TABLE `qr_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `qr_traffic`
--
ALTER TABLE `qr_traffic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=545;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `staff_class`
--
ALTER TABLE `staff_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
