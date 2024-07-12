-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 06:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse.bsmru.ac.bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `researchInt` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'temp.png',
  `role` enum('admin','staff','student','false') NOT NULL DEFAULT 'false',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `special_desig` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_id`, `researchInt`, `institute`, `country`, `email`, `email_verified_at`, `photo`, `role`, `status`, `phone`, `password`, `designation`, `special_desig`, `remember_token`, `created_at`, `updated_at`, `dept`, `type`, `rank`) VALUES
(4, 'Swapnil Biswas.', '4', '<p><strong>Machine Learning, Deep Learning, NLP, Explainable AI.</strong></p>', 'Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj', 'Bangladesh', 'swapnil.cse16@gmail.com', NULL, '202405261739Swapnil.jpg', 'admin', 'active', '01759957277', '$2y$10$aXmpC5iX3VTEchDGJRrpjOCM40AFJ.08Sn5WNvSS0J72CyZmtgvIC', 'Lecturer', NULL, NULL, NULL, '2024-06-06 04:12:57', 'Department of CSE', NULL, NULL),
(10, 'Al Amin Biswas', '10', '<p><strong>Machine Learning, Deep Learning, NLP, Explainable AI.</strong></p>', 'BSMRU', 'Bangladesh', 'alaminbiswas.cse@gmail.com', NULL, '202405261751fac2_v1.jpg', 'admin', 'active', NULL, '$2y$10$6VBhTgJReW49wquktVTsHe2ndASiHtV19.nq313pvHTLiu1fDlpK6', 'Lecturer', 'Incharge of Sports', NULL, '2024-05-26 11:47:48', '2024-05-27 00:48:55', 'Department of CSE', NULL, NULL),
(11, 'Noshin Tahsin', '11', '<p><strong>Software Engineering, Human-Computer Interaction, Human-Centered Computing, Responsible AI</strong></p>', 'Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj', 'Bangladesh', 'noshintahsin914@gmail.com', NULL, '202405261804NOSHIN TAHSIN.jpg', 'admin', 'active', '01882959157', '$2y$10$A0.H0ZGdlut4vmWMLueKdO74RrJ6Vqq0FDWBCkZFTD/ensfBpFlt.', 'Lecturer', 'Assistant Proctor (Acting)', NULL, '2024-05-26 12:02:39', '2024-05-26 12:05:09', 'Department of CSE', NULL, NULL),
(12, 'Md. Sabab Zulfiker', '12', '<p>Machine Learning, Deep Learning, Natural Language Processing (NLP), Computer Vision, Image Processing.</p>', 'Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj', 'Bangladesh', 'sabab.bsmru@gmail.com', NULL, '202405261815fac4.jpg', 'admin', 'active', '01716033198', '$2y$10$uV1k1kAudTwiuBjizKd8husMccw82G.ldsPm9Pe0bwfoAjjHqLNia', 'Lecturer', 'Assistant Proctor (Acting)', NULL, '2024-05-26 12:13:37', '2024-05-26 12:15:17', 'Department of CSE', NULL, NULL),
(15, 'Saimon Islam', '15', NULL, NULL, NULL, 'saimonislam091@gmail.com', NULL, 'temp.png', 'false', 'inactive', NULL, '$2y$10$gXQxpDLrGT7qh6H/JKITBO54JNOZMS21tc7IPSSFernJqB9hGSll6', NULL, NULL, NULL, '2024-06-01 13:52:16', '2024-06-01 13:52:16', NULL, NULL, NULL),
(16, 'Saimon Islam', NULL, NULL, NULL, NULL, 'temp@gmail.com', NULL, 'temp.png', 'false', 'inactive', NULL, '$2y$10$uuALsfJVYxJKhIQ1FKmuaOfBatHjkffqpFRNJmhaH0S2R5kjx4/KS', NULL, NULL, NULL, '2024-06-05 05:08:47', '2024-06-05 05:08:47', NULL, NULL, NULL),
(17, 'Saimon Islam', '17', NULL, NULL, NULL, 'saim@gmail.com', NULL, 'temp.png', '', 'inactive', NULL, '$2y$10$1RLSDCEFLkmPxi2Vn5kj7.FH.k851WzWXihX8qM2KJQ7kXac8V.7a', NULL, NULL, NULL, '2024-06-05 09:51:11', '2024-06-05 09:51:11', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
