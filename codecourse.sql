-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2018 at 01:52 PM
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
(1, 'alex', 'alex@codecourse.com', '$2y$10$X4gTdnzfVwtbT1QRQykeqeglcmIwx/gzbP8Fs0Ud4B1HwrlysMY3S', '2018-03-17 21:35:25', '2018-03-17 21:35:25'),
(22, 'test twentyone', 't21@ts.ts', '$2y$10$VQdwSJ7ltG8Cs0Y6hBl67uPZcOrX/GEarvg3Gbr5lzbu8Zw0E6kba', '2018-04-06 12:25:53', '2018-04-06 12:25:53'),
(23, 'Test Login one', 'tlogin1@test.ts', '$2y$10$4Kn5.LOD5wE/MY4k4ga9fu2IFRh0tHhMq/.aO2SvKxy8RiB1pG6v.', '2018-04-06 12:49:07', '2018-04-07 09:02:54'),
(24, 'Billy Ray', 'Billy@ts.ts', '$2y$10$qGlqDUvwXSYaUoh/to7kDexbYmaF2H62CCveRpg3.o/ibakQVOVSi', '2018-04-06 16:27:45', '2018-04-06 16:27:45'),
(25, 'Billy Jay', 'jay@ts.ts', '$2y$10$GNvsJtKl0xLCiGYvjtstK.BwaC3ckk8KnxRJI8n8cIIf8VslfAvre', '2018-04-06 16:28:53', '2018-04-06 16:28:53'),
(26, 'little dummy', 'dumdum@dummy.com', '$2y$10$GAXTQjhneZYm1xjtRks31.70U3kJn1UpGND5wI.OzmnGpVM.4MwLW', '2018-04-06 17:43:34', '2018-04-06 17:43:34'),
(27, 'Pavel is god', 'p@v.god', '$2y$10$LKrn2VFPnasM4C96/Cwb4OSJadUIm1kaPmW/wG0P5gryrzTCSXYNS', '2018-04-07 11:51:22', '2018-04-07 11:51:22');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
