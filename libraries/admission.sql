-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 02:27 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_info`
--

CREATE TABLE `academic_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_region` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `field_of_study` varchar(100) NOT NULL,
  `cert` varchar(10) NOT NULL,
  `mathematics` varchar(100) NOT NULL,
  `english_language` varchar(100) NOT NULL,
  `social_studies` varchar(100) NOT NULL,
  `science` varchar(100) NOT NULL,
  `first_elective` varchar(100) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `second_elective` varchar(100) NOT NULL,
  `grades` varchar(11) NOT NULL,
  `third_elective` varchar(100) NOT NULL,
  `gradess` varchar(11) NOT NULL,
  `fourth_elective` varchar(100) NOT NULL,
  `gradesss` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adminp`
--

CREATE TABLE `adminp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picProfile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminp`
--

INSERT INTO `adminp` (`id`, `name`, `picProfile`, `email`, `password`) VALUES
(1, 'Admission HOD', '319957.jpg', 'admin@admin.com', '$2y$10$b3WE0j4tdn7KxNX7A0YRYeesbcTFkABjgj4xV3Q9Oqg37vUywMpkG');

-- --------------------------------------------------------

--
-- Table structure for table `admitted`
--

CREATE TABLE `admitted` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`) VALUES
(1, 'Bachelor of Technology Science Laboratory technology'),
(2, 'Bachelor of Technology Fashion Design and Textiles'),
(3, 'Bachelor of Technology Automobile Engineering'),
(4, 'Bachelor of Technology Building Technology'),
(5, 'Bachelor of Technology Civil Engineering'),
(6, 'Bachelor of Technology Electrical/Electronic Engineering'),
(7, 'Bachelor of Technology Hospitality Management'),
(8, 'Bachelor of Technology Procurement & Supply Chain Management'),
(9, 'HND Science Laboratory Technology'),
(11, 'HND Hotel, Catering and Institutional Management'),
(12, 'HND Fashion Design and Textiles Studies'),
(13, 'HND Computer Science'),
(14, 'HND Secretaryship and Management studies'),
(15, 'HND Bilingual Secretaryship and Management studies'),
(16, 'HND Marketing'),
(17, 'HND Purchasing and Supply'),
(18, 'HND Accounting'),
(19, 'HND Electrical/Electronic Engineering'),
(20, 'HND Mechanical Engineering'),
(21, 'HND Building Technology'),
(22, 'HND Civil Engineering'),
(23, 'HND Furniture  design and Production ');

-- --------------------------------------------------------

--
-- Table structure for table `course_offered`
--

CREATE TABLE `course_offered` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `first_choice` varchar(255) NOT NULL,
  `second_choice` varchar(255) NOT NULL,
  `third_choice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wassce_cert` varchar(255) NOT NULL,
  `birth_cert` varchar(255) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hnd`
--

CREATE TABLE `hnd` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hnd_transcript` varchar(255) NOT NULL,
  `hnd_certificate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hnd`
--

INSERT INTO `hnd` (`id`, `user_id`, `hnd_transcript`, `hnd_certificate`) VALUES
(1, 5, '984217.jpg', '868996.jpg'),
(2, 6, '772974.', '183557.');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `course` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `course`) VALUES
(1, 'HND'),
(2, 'B-TECH'),
(3, 'NON-HND');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `picProfile` varchar(255) NOT NULL,
  `title` varchar(11) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `postalAddress` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `denomination` varchar(50) NOT NULL,
  `otherSpecify` varchar(50) NOT NULL,
  `sponsor_t` varchar(25) NOT NULL,
  `sponsor_fullname` varchar(25) NOT NULL,
  `sponsor_relation` varchar(11) NOT NULL,
  `sponsor_oc` varchar(50) NOT NULL,
  `sponsor_mail` varchar(50) NOT NULL,
  `sponsor_contact` varchar(25) NOT NULL,
  `sponsor_address` varchar(50) NOT NULL,
  `disability` varchar(255) NOT NULL,
  `yes` text NOT NULL,
  `date_applied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_info`
--
ALTER TABLE `academic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminp`
--
ALTER TABLE `adminp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admitted`
--
ALTER TABLE `admitted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_offered`
--
ALTER TABLE `course_offered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hnd`
--
ALTER TABLE `hnd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_info`
--
ALTER TABLE `academic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminp`
--
ALTER TABLE `adminp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admitted`
--
ALTER TABLE `admitted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course_offered`
--
ALTER TABLE `course_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hnd`
--
ALTER TABLE `hnd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
