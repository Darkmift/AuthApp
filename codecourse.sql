-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 12:19 AM
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
-- Database: `codecourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'alex', 'alex@codecourse.com', '', '2018-03-17 21:35:25', '2018-03-17 21:35:25'),
(2, 'TEST01', 'TEST01@email.com', '12345', '2018-03-31 13:41:42', '2018-03-31 13:41:42'),
(5, 'TEST02', 'TEST02@email.com', '12345', '2018-03-31 13:42:58', '2018-03-31 13:42:58'),
(6, 'TEST03', 'TEST03@ts.ts', '123456', '2018-03-31 16:03:13', '2018-03-31 16:03:13'),
(7, 'TEST04', 'tesst04@ts.ts', '$2y$10$I.tSxKKfWcNLMo.DGOz/guJod0QOlAumQwsV/I0qeC1ArUGq5tqdC', '2018-03-31 17:26:05', '2018-03-31 17:26:05'),
(8, 'TEST five', 'TEST05@ts.ts', '$2y$10$VBGcGVdrFZO57VpQnWuNK.0YW7Sfq4e0lwVXs7pEDtOJkUtOme4WW', '2018-03-31 18:03:58', '2018-03-31 18:03:58'),
(9, 'Jerry Seinfeld', 'Jerry@yadda.com', '$2y$10$teBWQllSiy9FlRKdF99anOZ0BBs90hoHVW7faYhSDCer2wO1rQ0yO', '2018-04-02 09:48:15', '2018-04-02 09:48:15'),
(10, 'TEST nine', 'test09@test.ts', '$2y$10$7YYrvhUGjqP3JLjT6Pff7eEUFwZh4Vz1/GzWiqmDC5BwnCvnKRkUO', '2018-04-02 11:46:55', '2018-04-02 11:46:55'),
(11, 'test ten', 'test@test.ts', '$2y$10$6ZYq4DFEKWRqnzQw47DIYe0Pb71BbSeBMOD7KkRMp3tO..iYpbWTC', '2018-04-04 21:06:17', '2018-04-04 21:06:17'),
(12, 'test eleven', 'test11@ts.ts', '$2y$10$joBLZTmmKVPY5k/wYeVmEuYKFNhci7zsA9UtLC5jCq3T7AqvwUhAa', '2018-04-04 21:07:14', '2018-04-04 21:07:14'),
(13, 'test twelve', 'test12@test.com', '$2y$10$X4gTdnzfVwtbT1QRQykeqeglcmIwx/gzbP8Fs0Ud4B1HwrlysMY3S', '2018-04-04 21:17:33', '2018-04-04 21:17:33');
(14, 'Pavel is god', 'p@v.god', '$2y$10$LKrn2VFPnasM4C96/Cwb4OSJadUIm1kaPmW/wG0P5gryrzTCSXYNS', '2018-04-04 22:13:13', '2018-04-04 22:13:13');
--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
