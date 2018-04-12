-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 02:21 PM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `start_date`, `end_date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Pancakes 102', 'Lorem ipsum dolor sit amet, eu sanctus placerat repudiandae mei, laboramus neglegentur in has, ea meis velit reformidans qui. Laudem inimicus id mel, nam ei ipsum vidisse impedit, et aliquip tamquam epicurei eum. Cu cum mutat lobortis. Cum tritani necessitatibus te. Accusata intellegat delicatissimi pro ea, vel veri delenit ex, rebum invenire eu his. Eos cu autem graece, ei verterem patrioque dissentiunt sea.\r\n\r\nVim percipit petentium ad. Est id vocibus delectus, vim brute maiorum tractatos eu. Congue discere ut eam, duo modus saperet scriptorem cu. Augue eruditi nominavi ad his, reque facer at eos. Eu quem augue persecuti vis. Novum voluptaria eam ut. No iudico antiopam neglegentur eam, in sed viderer perfecto consequat.\r\n\r\nNo vidit oblique gloriatur sed, ut sit posse iudico denique. Mea in ullum melius, an mea option interpretaris. Per eripuit omittantur no, clita mentitum vix et, detracto ullamcorper no nam. Ad cum quas tollit. Oblique dissentias ad qui, scripta impedit ea eam. Te iisque feugait salutandi eam, ea novum prompta molestie has.\r\n\r\nVim ne reque aeterno eruditi, dicat dissentiet eam ne. An affert evertitur intellegam mel, rebum fugit vitae at eam, sed graeci eruditi mnesarchum ad. Soleat mucius graeci his te. At pro omnesque phaedrum.\r\n\r\nCu esse ponderum evertitur nam, vim agam interpretaris et. Eu nemore delenit pri, eum ea euismod instructior, et idque voluptua adolescens quo. Aliquip inimicus id vel, ad agam oratio quaerendum usu. Ullum nullam similique in per, ut alii ceteros democritum mel, ut mea conceptam reformidans. Vis et dicunt quodsi prompta, duo epicuri dolores eu. Soluta theophrastus usu ei.', '2018-04-05', '2018-04-28', 'Test tttt', '2018-04-11 17:03:05', '2018-04-11 17:03:05'),
(2, 'Pancakes 103', 'Lorem ipsum dolor sit amet, eu sanctus placerat repudiandae mei, laboramus neglegentur in has, ea meis velit reformidans qui. Laudem inimicus id mel, nam ei ipsum vidisse impedit, et aliquip tamquam epicurei eum. Cu cum mutat lobortis. Cum tritani necessitatibus te. Accusata intellegat delicatissimi pro ea, vel veri delenit ex, rebum invenire eu his. Eos cu autem graece, ei verterem patrioque dissentiunt sea.\r\n\r\nVim percipit petentium ad. Est id vocibus delectus, vim brute maiorum tractatos eu. Congue discere ut eam, duo modus saperet scriptorem cu. Augue eruditi nominavi ad his, reque facer at eos. Eu quem augue persecuti vis. Novum voluptaria eam ut. No iudico antiopam neglegentur eam, in sed viderer perfecto consequat.\r\n\r\nNo vidit oblique gloriatur sed, ut sit posse iudico denique. Mea in ullum melius, an mea option interpretaris. Per eripuit omittantur no, clita mentitum vix et, detracto ullamcorper no nam. Ad cum quas tollit. Oblique dissentias ad qui, scripta impedit ea eam. Te iisque feugait salutandi eam, ea novum prompta molestie has.\r\n\r\nVim ne reque aeterno eruditi, dicat dissentiet eam ne. An affert evertitur intellegam mel, rebum fugit vitae at eam, sed graeci eruditi mnesarchum ad. Soleat mucius graeci his te. At pro omnesque phaedrum.\r\n\r\nCu esse ponderum evertitur nam, vim agam interpretaris et. Eu nemore delenit pri, eum ea euismod instructior, et idque voluptua adolescens quo. Aliquip inimicus id vel, ad agam oratio quaerendum usu. Ullum nullam similique in per, ut alii ceteros democritum mel, ut mea conceptam reformidans. Vis et dicunt quodsi prompta, duo epicuri dolores eu. Soluta theophrastus usu ei.', '2018-04-05', '2018-04-28', 'Test tttt', '2018-04-11 17:04:06', '2018-04-11 17:04:06'),
(3, 'Pancakes 104', 'Lorem ipsum dolor sit amet, eu sanctus placerat repudiandae mei, laboramus neglegentur in has, ea meis velit reformidans qui. Laudem inimicus id mel, nam ei ipsum vidisse impedit, et aliquip tamquam epicurei eum. Cu cum mutat lobortis. Cum tritani necessitatibus te. Accusata intellegat delicatissimi pro ea, vel veri delenit ex, rebum invenire eu his. Eos cu autem graece, ei verterem patrioque dissentiunt sea.\r\n\r\nVim percipit petentium ad. Est id vocibus delectus, vim brute maiorum tractatos eu. Congue discere ut eam, duo modus saperet scriptorem cu. Augue eruditi nominavi ad his, reque facer at eos. Eu quem augue persecuti vis. Novum voluptaria eam ut. No iudico antiopam neglegentur eam, in sed viderer perfecto consequat.\r\n\r\nNo vidit oblique gloriatur sed, ut sit posse iudico denique. Mea in ullum melius, an mea option interpretaris. Per eripuit omittantur no, clita mentitum vix et, detracto ullamcorper no nam. Ad cum quas tollit. Oblique dissentias ad qui, scripta impedit ea eam. Te iisque feugait salutandi eam, ea novum prompta molestie has.\r\n\r\nVim ne reque aeterno eruditi, dicat dissentiet eam ne. An affert evertitur intellegam mel, rebum fugit vitae at eam, sed graeci eruditi mnesarchum ad. Soleat mucius graeci his te. At pro omnesque phaedrum.\r\n\r\nCu esse ponderum evertitur nam, vim agam interpretaris et. Eu nemore delenit pri, eum ea euismod instructior, et idque voluptua adolescens quo. Aliquip inimicus id vel, ad agam oratio quaerendum usu. Ullum nullam similique in per, ut alii ceteros democritum mel, ut mea conceptam reformidans. Vis et dicunt quodsi prompta, duo epicuri dolores eu. Soluta theophrastus usu ei.', '2018-04-05', '2018-04-28', 'Test tttt', '2018-04-11 17:06:24', '2018-04-11 17:06:24');

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
(27, 'Pavel is god', 'p@v.god', '$2y$10$LKrn2VFPnasM4C96/Cwb4OSJadUIm1kaPmW/wG0P5gryrzTCSXYNS', '2018-04-07 11:51:22', '2018-04-07 11:51:22'),
(29, 'Test Omega', 'tesomega@tst.ts', '$2y$10$ZVYILV40Ytvn.V6DTXM0ZuVmDa0sNyPeJEv/DamAHA2S2uR8eqQcu', '2018-04-11 12:06:50', '2018-04-11 12:31:37'),
(30, 'Test tttt', 'ts222@ts.ts', '$2y$10$bgJxo627aiViSuWPNdCptekMIYsYWq7b4bPc1FJ7KvHE6oOKP8kB.', '2018-04-11 13:17:20', '2018-04-11 13:17:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
