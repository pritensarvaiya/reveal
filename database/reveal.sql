-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 05:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reveal`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_users`
--

CREATE TABLE `active_users` (
  `id` int(11) NOT NULL,
  `tuition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcements_id` int(11) NOT NULL,
  `tuition_id` int(11) NOT NULL,
  `send_to` varchar(50) NOT NULL,
  `medium` varchar(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcements_id`, `tuition_id`, `send_to`, `medium`, `title`, `message`, `timestamp`) VALUES
(1, 1, '10th', 'Gujarati', 'Demo', 'Hello My name is Priten and i am study in BSCIT in Atmiya University', '2021-01-24 13:14:17'),
(2, 1, '8th', 'Gujarati', 'test', 'hello', '2021-01-24 13:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(11) NOT NULL,
  `tuition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `tuition_id`, `user_id`, `user_name`, `user_email`, `title`, `message`, `timestamp`) VALUES
(1, 1, 1, 'Neel Sarvaiya', 'neel@gmail.com', 'For Test', 'This message write by PRITEN ', '2021-01-25 11:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `attendance_id` int(11) NOT NULL,
  `tuition_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_class` varchar(20) NOT NULL,
  `student_medium` varchar(10) NOT NULL,
  `attendance_status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `tuition_id`, `student_id`, `student_name`, `student_class`, `student_medium`, `attendance_status`, `date`, `timestamp`) VALUES
(1, 1, 1, 'Tank Rajkumar', '11th Commerce', 'Gujarati', 'Present', '2021-01-24', '2021-01-24 05:48:55'),
(2, 1, 4, 'abc harsit', '8th', 'Gujarati', 'Present', '2021-01-24', '2021-01-24 05:57:39'),
(3, 1, 2, 'Sarvaiya Neel', '8th', 'Gujarati', 'Present', '2021-01-23', '2021-01-24 06:49:19'),
(4, 1, 4, 'abc harsit', '8th', 'Gujarati', 'Present', '2021-01-23', '2021-01-24 06:49:19'),
(5, 1, 2, 'Sarvaiya Neel', '8th', 'Gujarati', 'Absent', '2021-01-22', '2021-01-24 06:49:46'),
(6, 1, 4, 'abc harsit', '8th', 'Gujarati', 'Absent', '2021-01-22', '2021-01-24 06:49:46'),
(7, 1, 2, 'Sarvaiya Neel', '8th', 'Gujarati', 'Present', '2021-01-21', '2021-01-24 06:50:03'),
(8, 1, 4, 'abc harsit', '8th', 'Gujarati', 'Absent', '2021-01-21', '2021-01-24 06:50:03'),
(9, 1, 2, 'Sarvaiya Neel', '8th', 'Gujarati', 'Absent', '2021-01-25', '2021-01-25 09:04:01'),
(10, 1, 4, 'abc harsit', '8th', 'Gujarati', 'Present', '2021-01-25', '2021-01-25 09:04:01'),
(11, 1, 1, 'Tank Rajkumar', '11th Commerce', 'Gujarati', 'Absent', '2021-01-25', '2021-01-25 10:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_class`
--

CREATE TABLE `tuition_class` (
  `id` int(11) NOT NULL,
  `tuition_id` int(255) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `medium` varchar(50) NOT NULL,
  `class_fees` int(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition_class`
--

INSERT INTO `tuition_class` (`id`, `tuition_id`, `class_name`, `medium`, `class_fees`, `time`) VALUES
(3, 1, '2nd', 'Gujarati', 7000, '2021-01-19 14:20:32'),
(4, 1, '3rd', 'Gujarati', 10000, '2021-01-19 14:20:42'),
(5, 1, '4th', 'Gujarati', 4000, '2021-01-19 14:22:34'),
(6, 1, '8th', 'Gujarati', 10000, '2021-01-19 14:25:32'),
(7, 1, '11th Commerce', 'Gujarati', 15000, '2021-01-19 15:09:39'),
(11, 1, '9th', 'Gujarati', 6000, '2021-01-20 03:58:06'),
(13, 1, '2nd', 'English', 2000, '2021-01-20 04:01:05'),
(15, 1, '1st', 'English', 1000, '2021-01-20 04:02:30'),
(16, 1, '3rd', 'English', 9000, '2021-01-20 04:04:25'),
(17, 1, '8th', 'English', 2500, '2021-01-20 05:19:08'),
(21, 1, '12th Commerce', 'English', 5200, '2021-01-21 05:38:24'),
(22, 1, '10th', 'Gujarati', 0, '2021-01-21 05:52:21'),
(23, 1, '5th', 'Gujarati', 115, '2021-01-21 05:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_head`
--

CREATE TABLE `tuition_head` (
  `tuition_id` int(11) NOT NULL,
  `tuition_img` varchar(277) NOT NULL DEFAULT 'user.jpg',
  `tuition_name` varchar(50) NOT NULL,
  `head_fname` varchar(50) NOT NULL,
  `head_lname` varchar(50) NOT NULL,
  `tuition_mobile` varchar(10) NOT NULL,
  `tuition_email` varchar(50) NOT NULL,
  `tuition_password` varchar(277) NOT NULL,
  `tuition_address` varchar(200) NOT NULL,
  `tuition_city` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition_head`
--

INSERT INTO `tuition_head` (`tuition_id`, `tuition_img`, `tuition_name`, `head_fname`, `head_lname`, `tuition_mobile`, `tuition_email`, `tuition_password`, `tuition_address`, `tuition_city`, `created_at`) VALUES
(1, '1.jpg', 'Brenin', 'Priten', 'Sarvaiya', '9586650538', 'priten@gmail.com', 'd63fe6f190c15627233789931371e6246e2f39ee', 'kailash park-7', 'Rajkot', '2021-01-10 18:01:09'),
(2, 'user.jpg', 'abc', 'Pri10', 'demo', '9586650538', 'demo@gmail.com', 'cd790dbde57f96eb0ed6a9229c0850232f1f8bcf', 'jcnjdcn', 'Rajkot', '2021-01-10 18:03:29'),
(3, '3.jpg', 'Dark', 'Pri10', 'Sarvaiya', '9586650538', 'pri10@gmail.com', 'd63fe6f190c15627233789931371e6246e2f39ee', 'shri nathaji', 'Rajkot', '2021-01-12 10:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_student`
--

CREATE TABLE `tuition_student` (
  `student_id` int(11) NOT NULL,
  `tuition_id` varchar(255) NOT NULL,
  `student_fname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_class` varchar(20) NOT NULL,
  `student_medium` varchar(10) NOT NULL,
  `student_number` int(10) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  `student_city` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition_student`
--

INSERT INTO `tuition_student` (`student_id`, `tuition_id`, `student_fname`, `student_lname`, `student_gender`, `student_password`, `student_class`, `student_medium`, `student_number`, `student_email`, `student_address`, `student_city`, `timestamp`) VALUES
(1, '1', 'Rajkumar', 'Tank', 'male', 'd63fe6f190c15627233789931371e6246e2f39ee', '11th Commerce', 'Gujarati', 1234567890, 'raj777@gmail.com', 'anc xyz university Road', 'Rajkot', '2021-01-20 05:39:33'),
(2, '1', 'Neel', 'Sarvaiya', 'male', 'd63fe6f190c15627233789931371e6246e2f39ee', '8th', 'Gujarati', 1478523601, 'neel@gmail.com', 'kailash park-7', 'Rajkot', '2021-01-21 06:30:11'),
(3, '1', 'Priten', 'Sarvaiya', 'male', 'd63fe6f190c15627233789931371e6246e2f39ee', '12th Commerce', 'Gujarati', 2147483647, 'priten@gmail.com', 'aefsv vwfwfarfa rvererw', 'Rajkot', '2021-01-21 06:36:42'),
(4, '1', 'harsit', 'abc', 'male', 'd63fe6f190c15627233789931371e6246e2f39ee', '8th', 'Gujarati', 1478520398, 'harsit@priten.com', 'abc kalawad road', 'Rajkot', '2021-01-24 05:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_teacher`
--

CREATE TABLE `tuition_teacher` (
  `teacher_id` int(11) NOT NULL,
  `tuition_id` int(255) NOT NULL,
  `teacher_class` varchar(255) NOT NULL,
  `teacher_fname` varchar(50) NOT NULL,
  `teacher_lname` varchar(50) NOT NULL,
  `teacher_gender` varchar(10) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `teacher_number` varchar(10) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_address` varchar(100) NOT NULL,
  `teacher_city` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition_teacher`
--

INSERT INTO `tuition_teacher` (`teacher_id`, `tuition_id`, `teacher_class`, `teacher_fname`, `teacher_lname`, `teacher_gender`, `teacher_password`, `teacher_number`, `teacher_email`, `teacher_address`, `teacher_city`, `timestamp`) VALUES
(1, 1, '10th,Gujarati|11th Commerce,Gujarati|12th Commerce,English|3rd,Gujarati', 'Neel', 'Sarvaiya', 'male', 'd63fe6f190c15627233789931371e6246e2f39ee', '8128813453', 'neel@gmail.com', 'Kailash park-7 near nataraj nagar University Road', 'Rajkot', '2021-01-20 04:55:11'),
(2, 1, '10th,Gujarati|11th Commerce,Gujarati|12th Commerce,English|3rd,Gujarati', 'Raj', 'Tank', 'male', 'd63fe6f190c15627233789931371e6246e2f39ee', '1111111111', 'raj@gmail.com', 'Parimal sr no.-3 Aakash vani', 'Rajkot', '2021-01-20 05:06:37'),
(3, 1, '10th,Gujarati|11th Commerce,Gujarati|12th Commerce,English|3rd,Gujarati', 'test', 'abc', 'female', '17a8a72b155114766f113c1980011c9f3b8d898a', '8128813453', 'test@priten.com', 'hjvhjvvhjvh', 'Rajkot', '2021-01-21 06:21:30'),
(4, 1, '10th,Gujarati|11th Commerce,Gujarati|12th Commerce,English|3rd,Gujarati', 'Priten', 'abc', 'male', 'd63fe6f190c15627233789931371e6246e2f39ee', '9586650537', 'priten@gmail.com', 'kailashbchgd uyfgayufa auyfguAFV', 'Rajkot', '2021-01-21 06:34:20'),
(5, 1, '10th,Gujarati|11th Commerce,Gujarati|12th Commerce,English|3rd,Gujarati|5th,Gujarati', 'Priten Update', 'Sarvaiya', 'male', 'd63fe6f190c15627233789931371e6246e2f39ee', '9586650538', 'priten3@gmail.com', 'kailash park-7 near nataraj nagar', 'Rajkot', '2021-01-25 06:04:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_users`
--
ALTER TABLE `active_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcements_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `tuition_class`
--
ALTER TABLE `tuition_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuition_head`
--
ALTER TABLE `tuition_head`
  ADD PRIMARY KEY (`tuition_id`);

--
-- Indexes for table `tuition_student`
--
ALTER TABLE `tuition_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tuition_teacher`
--
ALTER TABLE `tuition_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_users`
--
ALTER TABLE `active_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tuition_class`
--
ALTER TABLE `tuition_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tuition_head`
--
ALTER TABLE `tuition_head`
  MODIFY `tuition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tuition_student`
--
ALTER TABLE `tuition_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tuition_teacher`
--
ALTER TABLE `tuition_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
