-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2018 at 11:05 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolcrm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`, `active`, `added_by`) VALUES
(1, 'Course test 2', 'Course test 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales sapien non posuere blandit. Mauris et mauris in nibh condimentum pellentesque et at leo. Sed tristique, magna sagittis semper commodo, quam lorem euismod tellus, ac mattis neque leo sit amet velit. Sed consectetur varius varius. Duis justo quam, lacinia vel suscipit vitae, commodo sed lorem. Etiam eu turpis at lectus feugiat sagittis. Pellentesque auctor et nisi ac congue. Mauris malesuada pretium sem ac tincidunt. Suspendisse ornare orci vel sapien rutrum blandit. Mauris sed mattis eros. Fusce vitae enim blandit est porta viverra.\r\n\r\nDonec a eros vel est viverra vehicula faucibus at erat. Pellentesque pretium vel nisi vitae vestibulum. Etiam sapien sapien, pellentesque vitae lectus at, tempor fringilla urna. Aenean nibh lorem, venenatis a justo in, interdum varius sapien. Vestibulum dignissim eros turpis, at scelerisque elit semper sed. In in pulvinar diam. Aliquam gravida interdum urna quis malesuada. Donec tristique nisi gravida odio porttitor ullamcorper. Praesent elit ex, venenatis vel congue sit amet, sagittis ac metus.\r\n\r\nEtiam porta felis purus, nec pellentesque ex egestas a. Nunc nec eros vel purus pulvinar porttitor. Aliquam ac gravida erat. Vivamus consectetur odio vel magna maximus, in egestas arcu tincidunt. Donec rutrum nisl sapien, ac pulvinar est fringilla a. Vivamus scelerisque ante nulla, quis pharetra nisi lacinia a. Sed luctus augue eu aliquet ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nQuisque aliquet risus ut quam laoreet molestie. Ut eget convallis lacus, a imperdiet nibh. Sed euismod consequat lectus ut elementum. Vestibulum congue enim arcu, ac tristique augue auctor vel. Maecenas maximus maximus laoreet. Donec fermentum dolor non sapien congue tempus. Ut sem velit, euismod nec felis sed, convallis eleifend diam. Duis porta vitae erat eu volutpat. Praesent sed vehicula odio.\r\n\r\nDonec ac sagittis enim, eget interdum mauris. Mauris vel mauris pulvinar, tincidunt nunc eget, cursus dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat sit amet neque in scelerisque. Nullam efficitur turpis mauris, sit amet suscipit sem vestibulum et. Vestibulum nibh nisl, ultricies a diam vel, tempor eleifend dui. In hac habitasse platea dictumst. Curabitur quis eros ut erat ornare bibendum. Nulla neque massa, semper nec consectetur ac, fermentum sit amet mi.', '2018-04-19', '2018-04-30', '2018-04-20 06:50:58', '2018-04-20 06:50:58', 1, 'tester mcnuts'),
(2, 'Course test 3', 'Course test 3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales sapien non posuere blandit. Mauris et mauris in nibh condimentum pellentesque et at leo. Sed tristique, magna sagittis semper commodo, quam lorem euismod tellus, ac mattis neque leo sit amet velit. Sed consectetur varius varius. Duis justo quam, lacinia vel suscipit vitae, commodo sed lorem. Etiam eu turpis at lectus feugiat sagittis. Pellentesque auctor et nisi ac congue. Mauris malesuada pretium sem ac tincidunt. Suspendisse ornare orci vel sapien rutrum blandit. Mauris sed mattis eros. Fusce vitae enim blandit est porta viverra.\r\n\r\nDonec a eros vel est viverra vehicula faucibus at erat. Pellentesque pretium vel nisi vitae vestibulum. Etiam sapien sapien, pellentesque vitae lectus at, tempor fringilla urna. Aenean nibh lorem, venenatis a justo in, interdum varius sapien. Vestibulum dignissim eros turpis, at scelerisque elit semper sed. In in pulvinar diam. Aliquam gravida interdum urna quis malesuada. Donec tristique nisi gravida odio porttitor ullamcorper. Praesent elit ex, venenatis vel congue sit amet, sagittis ac metus.\r\n\r\nEtiam porta felis purus, nec pellentesque ex egestas a. Nunc nec eros vel purus pulvinar porttitor. Aliquam ac gravida erat. Vivamus consectetur odio vel magna maximus, in egestas arcu tincidunt. Donec rutrum nisl sapien, ac pulvinar est fringilla a. Vivamus scelerisque ante nulla, quis pharetra nisi lacinia a. Sed luctus augue eu aliquet ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nQuisque aliquet risus ut quam laoreet molestie. Ut eget convallis lacus, a imperdiet nibh. Sed euismod consequat lectus ut elementum. Vestibulum congue enim arcu, ac tristique augue auctor vel. Maecenas maximus maximus laoreet. Donec fermentum dolor non sapien congue tempus. Ut sem velit, euismod nec felis sed, convallis eleifend diam. Duis porta vitae erat eu volutpat. Praesent sed vehicula odio.\r\n\r\nDonec ac sagittis enim, eget interdum mauris. Mauris vel mauris pulvinar, tincidunt nunc eget, cursus dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat sit amet neque in scelerisque. Nullam efficitur turpis mauris, sit amet suscipit sem vestibulum et. Vestibulum nibh nisl, ultricies a diam vel, tempor eleifend dui. In hac habitasse platea dictumst. Curabitur quis eros ut erat ornare bibendum. Nulla neque massa, semper nec consectetur ac, fermentum sit amet mi.', '2018-04-19', '2018-04-30', '2018-04-20 06:50:58', '2018-04-20 06:50:58', 1, 'tester mcnuts'),
(3, 'Course test 4', 'Course test 4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales sapien non posuere blandit. Mauris et mauris in nibh condimentum pellentesque et at leo. Sed tristique, magna sagittis semper commodo, quam lorem euismod tellus, ac mattis neque leo sit amet velit. Sed consectetur varius varius. Duis justo quam, lacinia vel suscipit vitae, commodo sed lorem. Etiam eu turpis at lectus feugiat sagittis. Pellentesque auctor et nisi ac congue. Mauris malesuada pretium sem ac tincidunt. Suspendisse ornare orci vel sapien rutrum blandit. Mauris sed mattis eros. Fusce vitae enim blandit est porta viverra.\r\n\r\nDonec a eros vel est viverra vehicula faucibus at erat. Pellentesque pretium vel nisi vitae vestibulum. Etiam sapien sapien, pellentesque vitae lectus at, tempor fringilla urna. Aenean nibh lorem, venenatis a justo in, interdum varius sapien. Vestibulum dignissim eros turpis, at scelerisque elit semper sed. In in pulvinar diam. Aliquam gravida interdum urna quis malesuada. Donec tristique nisi gravida odio porttitor ullamcorper. Praesent elit ex, venenatis vel congue sit amet, sagittis ac metus.\r\n\r\nEtiam porta felis purus, nec pellentesque ex egestas a. Nunc nec eros vel purus pulvinar porttitor. Aliquam ac gravida erat. Vivamus consectetur odio vel magna maximus, in egestas arcu tincidunt. Donec rutrum nisl sapien, ac pulvinar est fringilla a. Vivamus scelerisque ante nulla, quis pharetra nisi lacinia a. Sed luctus augue eu aliquet ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nQuisque aliquet risus ut quam laoreet molestie. Ut eget convallis lacus, a imperdiet nibh. Sed euismod consequat lectus ut elementum. Vestibulum congue enim arcu, ac tristique augue auctor vel. Maecenas maximus maximus laoreet. Donec fermentum dolor non sapien congue tempus. Ut sem velit, euismod nec felis sed, convallis eleifend diam. Duis porta vitae erat eu volutpat. Praesent sed vehicula odio.\r\n\r\nDonec ac sagittis enim, eget interdum mauris. Mauris vel mauris pulvinar, tincidunt nunc eget, cursus dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat sit amet neque in scelerisque. Nullam efficitur turpis mauris, sit amet suscipit sem vestibulum et. Vestibulum nibh nisl, ultricies a diam vel, tempor eleifend dui. In hac habitasse platea dictumst. Curabitur quis eros ut erat ornare bibendum. Nulla neque massa, semper nec consectetur ac, fermentum sit amet mi.', '2018-04-19', '2018-04-30', '2018-04-20 06:50:58', '2018-04-20 06:50:58', 1, 'tester mcnuts'),
(4, 'Course test 5', 'Course test 5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales sapien non posuere blandit. Mauris et mauris in nibh condimentum pellentesque et at leo. Sed tristique, magna sagittis semper commodo, quam lorem euismod tellus, ac mattis neque leo sit amet velit. Sed consectetur varius varius. Duis justo quam, lacinia vel suscipit vitae, commodo sed lorem. Etiam eu turpis at lectus feugiat sagittis. Pellentesque auctor et nisi ac congue. Mauris malesuada pretium sem ac tincidunt. Suspendisse ornare orci vel sapien rutrum blandit. Mauris sed mattis eros. Fusce vitae enim blandit est porta viverra.\r\n\r\nDonec a eros vel est viverra vehicula faucibus at erat. Pellentesque pretium vel nisi vitae vestibulum. Etiam sapien sapien, pellentesque vitae lectus at, tempor fringilla urna. Aenean nibh lorem, venenatis a justo in, interdum varius sapien. Vestibulum dignissim eros turpis, at scelerisque elit semper sed. In in pulvinar diam. Aliquam gravida interdum urna quis malesuada. Donec tristique nisi gravida odio porttitor ullamcorper. Praesent elit ex, venenatis vel congue sit amet, sagittis ac metus.\r\n\r\nEtiam porta felis purus, nec pellentesque ex egestas a. Nunc nec eros vel purus pulvinar porttitor. Aliquam ac gravida erat. Vivamus consectetur odio vel magna maximus, in egestas arcu tincidunt. Donec rutrum nisl sapien, ac pulvinar est fringilla a. Vivamus scelerisque ante nulla, quis pharetra nisi lacinia a. Sed luctus augue eu aliquet ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nQuisque aliquet risus ut quam laoreet molestie. Ut eget convallis lacus, a imperdiet nibh. Sed euismod consequat lectus ut elementum. Vestibulum congue enim arcu, ac tristique augue auctor vel. Maecenas maximus maximus laoreet. Donec fermentum dolor non sapien congue tempus. Ut sem velit, euismod nec felis sed, convallis eleifend diam. Duis porta vitae erat eu volutpat. Praesent sed vehicula odio.\r\n\r\nDonec ac sagittis enim, eget interdum mauris. Mauris vel mauris pulvinar, tincidunt nunc eget, cursus dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat sit amet neque in scelerisque. Nullam efficitur turpis mauris, sit amet suscipit sem vestibulum et. Vestibulum nibh nisl, ultricies a diam vel, tempor eleifend dui. In hac habitasse platea dictumst. Curabitur quis eros ut erat ornare bibendum. Nulla neque massa, semper nec consectetur ac, fermentum sit amet mi.', '2018-04-19', '2018-04-30', '2018-04-20 06:50:58', '2018-04-20 06:50:58', 1, 'tester mcnuts');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(5) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_active` tinyint(1) NOT NULL DEFAULT '1',
  `course_active` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `student_id`, `course_id`, `user_id`, `created_at`, `updated_at`, `student_active`, `course_active`, `added_by`) VALUES
(1, 1, 1, 1, '2018-04-20 07:16:00', '2018-04-20 07:16:00', 1, 1, 'tester'),
(2, 1, 2, 1, '2018-04-20 07:16:00', '2018-04-20 07:16:00', 1, 1, 'tester'),
(3, 2, 2, 3, '2018-04-20 07:16:00', '2018-04-20 07:16:00', 1, 1, 'tester');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `name`, `phone`, `password`, `created_at`, `updated_at`, `active`, `added_by`) VALUES
(1, 'test1@ts.ts', 'test one student', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself'),
(2, 'test2@ts.ts', 'test two student', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself'),
(3, 'test3@ts.ts', 'test three student', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself'),
(4, 'test4@ts.ts', 'test four student', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself'),
(5, 'test5@ts.ts', 'test five student', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2','3') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `phone`, `password`, `role`, `created_at`, `updated_at`, `active`, `added_by`) VALUES
(1, 'test1@ts.ts', 'test one user', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '1', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself'),
(2, 'test2@ts.ts', 'test two user', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '2', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself'),
(3, 'test3@ts.ts', 'test three user', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '3', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself'),
(4, 'test4@ts.ts', 'test four user', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '1', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself'),
(5, 'test5@ts.ts', 'test five user', '0505556677', '$2y$10$S7.v0IVAKy9Mah3gdSBpae1GXciYyFInx8VHIP9ocYI5/q9ieGKbOv', '1', '2018-04-20 06:50:57', '2018-04-20 06:50:57', 1, 'himself');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_active` (`active`),
  ADD KEY `c_active` (`active`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_to_courses` (`course_active`),
  ADD KEY `enrollments_to_students` (`student_active`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `student_active` (`active`),
  ADD KEY `s_active` (`active`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_to_courses` FOREIGN KEY (`course_active`) REFERENCES `courses` (`active`) ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollments_to_students` FOREIGN KEY (`student_active`) REFERENCES `students` (`active`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
