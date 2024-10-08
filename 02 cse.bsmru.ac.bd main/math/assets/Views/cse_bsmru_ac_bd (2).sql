-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 04:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `user`, `type`, `title`, `year`, `country`, `description`, `created_at`, `updated_at`, `rank`) VALUES
(3, 10, 'award', 'Dean award', '2022', 'bd', 'nothing', '2024-06-06 10:54:21', '2024-06-06 12:24:43', 2),
(4, 10, 'award', 'Dean award', '202333', 'bd', 'nothing', '2024-06-06 12:15:59', '2024-06-06 12:24:43', 1),
(6, 4, 'sb2', 'sb2', 'sb2', 'sb2', 'sb2', '2024-06-06 22:39:12', '2024-06-06 22:46:06', 1),
(7, 4, 'sb3', 'sb3', 'sb3', 'sb3', 'sb3', '2024-06-06 22:39:26', '2024-06-06 23:24:01', 2),
(8, 4, 'sb4', 'sb4', 'sb4', 'sb4', 'sb4', '2024-06-06 22:39:38', '2024-06-06 23:24:01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `image`, `created_at`, `updated_at`, `rank`) VALUES
(19, '202405261715c3_v3.jpg', '2024-05-26 11:15:52', '2024-06-01 13:43:20', 1),
(20, '202406061005Swapnil.jpg', '2024-06-01 13:42:59', '2024-06-06 04:05:55', 2),
(21, '202406061536NOSHIN TAHSIN.jpg', '2024-06-01 13:43:20', '2024-06-06 09:36:02', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dept_attributes`
--

CREATE TABLE `dept_attributes` (
  `id` int(11) NOT NULL,
  `about` varchar(2000) DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dept_code` int(11) DEFAULT NULL,
  `dept_short_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_attributes`
--

INSERT INTO `dept_attributes` (`id`, `about`, `phone`, `email`, `dept_name`, `address`, `dept_code`, `dept_short_name`) VALUES
(1, 'Welcome to the Computer Science and Engineering (CSE) Department at Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj! This department started its academic journey in 2022, offering bachelor\'s degrees. Here, the focus is on nurturing problem-solving abilities and fostering skills in competitive programming of the students.\r\n\r\nIn a remarkable start to its competitive programming journey, the CSE Department secured the 69th spot in the BUET IUPC 2023, a national competition that draws participants from all over Bangladesh. The department boasts well-equipped computer and hardware labs, providing students with hands-on experience and cutting-edge tools.\r\n\r\nBut that\'s not all. The CSE Department also encourages the exciting world of robotics, sparking the imaginations of budding engineers. Moreover, it consistently motivates students to develop practical systems that find real-world applications, bridging the gap between theory and practice.\r\n\r\nAt Bangabandhu Sheikh Mujibur Rahman ', '+88 017 3433 1313', ' cse@bsmru.ac.bd', 'Department of Computer Science and Engineering', 'Kishoreganj, Bangladesh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `passYear` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `user`, `degree`, `institution`, `passYear`, `created_at`, `updated_at`, `rank`) VALUES
(2, 4, 'M.Sc. in Computer Science and Engineering', 'Military Institute of Science and Technology', 'Ongoing', '2024-05-26 11:45:51', '2024-06-06 23:23:01', 2),
(6, 10, 'ab1', 'ab1', 'ab1', '2024-06-06 22:18:09', '2024-06-06 22:18:09', 1),
(7, 10, 'ab2', 'ab2', 'ab2', '2024-06-06 22:18:17', '2024-06-06 22:30:51', 2),
(9, 4, 'sb1', 'sb1', 'sb1', '2024-06-06 23:14:45', '2024-06-06 23:14:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `title`, `description`, `file`, `created_at`, `updated_at`, `rank`) VALUES
(10, '2024-06-13', 'Lecturer, Department of Computer Science and Engineering', NULL, 'events_202406061709_100010.png', NULL, '2024-06-07 08:13:20', 4),
(13, '2024-06-13', 'Bsc CSE', NULL, 'events_202406061716_100000.jpg', NULL, '2024-06-07 08:13:20', 2),
(14, '2024-06-13', 'Dean award', NULL, 'events_202406061740_100000.jpg', NULL, '2024-06-07 08:13:20', 3),
(15, '2024-06-05', 'Dean award', 's', 'events_202406071413_100000.png', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user`, `title`, `organization`, `from_date`, `to_date`, `created_at`, `updated_at`, `rank`) VALUES
(3, 10, 'Lecturer, Department of Computer Science and Engineering', 'University of Information Technology and Sciences (UITS)', '15 Jan 2020', '30 Jun 2020', '2024-05-26 11:41:59', '2024-06-06 12:27:17', 1),
(5, 10, 'Lecturer, Department of Computer Science and Engineering', 'University of Information Technology and Sciences (UITS)', '15 Jan 2020', '1 Feb 2023', '2024-06-05 14:54:23', '2024-06-06 12:27:17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2024_01_27_185202_seed', 1),
(23, '2024_01_27_224155_create_notices_table', 1),
(24, '2024_02_03_200304_create_events_table', 1),
(25, '2024_04_21_103645_create_publications_table', 1),
(26, '2024_04_26_141256_create_carousels_table', 2),
(27, '2024_04_30_142426_add_is_approved_to_users_table', 3),
(28, '2024_04_30_143448_add_is_approved_to_users_table', 3),
(29, '2024_05_16_094142_create_educations_table', 3),
(30, '2024_05_16_101124_create_experiences_table', 3),
(31, '2024_05_16_121026_create_awards_table', 3),
(32, '2024_06_05_212009_create_other_experiences_table', 4),
(33, '2024_06_05_221919_create_research_profiles_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `not_date` date NOT NULL,
  `not_title` varchar(255) NOT NULL,
  `not_des` varchar(255) DEFAULT NULL,
  `not_file` varchar(255) NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `not_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `not_date`, `not_title`, `not_des`, `not_file`, `rank`, `created_at`, `updated_at`, `not_type`) VALUES
(15, '2024-06-11', 'Notice 10', NULL, 'notice_202406052027_100015.pdf', 1, '2024-06-01 13:42:21', '2024-06-07 03:21:12', NULL),
(19, '2024-06-06', 'Notice message', NULL, 'notice_202406060733_100019.pdf', 2, '2024-06-06 01:33:19', '2024-06-07 03:21:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `other_experiences`
--

CREATE TABLE `other_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_experiences`
--

INSERT INTO `other_experiences` (`id`, `user`, `experience`, `created_at`, `updated_at`, `rank`) VALUES
(2, '4', '<p><strong>Reviewer</strong>, “International Conference on Embracing Industry 4.0 for Sustainable Business Growth (EISBG 2024)”, Noakhali Science and Technology University (NSTU), Noakhali, Bangladesh.</p>', '2024-06-05 15:35:54', '2024-06-05 15:35:54', NULL),
(3, '4', '<p><strong>Reviewer</strong>, “International Conference on Embracing Industry 4.0 for Sustainable Business Growth (EISBG 2024)”, Noakhali Science and Technology University (NSTU), Noakhali, Bangladesh.</p>', '2024-06-05 15:56:29', '2024-06-05 15:56:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('saimonislam091@gmail.com', '$2y$10$BHVXdtqAF.whE.s1Akw3le44dMbYgd0OyUzRRc5J64NxtlGVpuCbW', '2024-06-07 03:16:11'),
('swapnil.cse16@gmail.com', '$2y$10$6q6JWgq4dXn6Dfw9wcDykO81RAQbPI2NR1NKEZEs.PMkcHrqgzm0u', '2024-06-07 03:17:14'),
('yilixa6103@picdv.com', '$2y$10$cncOhGsld2OrR3xwpsPFj.fP4OHpJW6VPpWVNoE9pnI4p4h/RFsWO', '2024-04-30 09:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `type` text DEFAULT '\'journal\'',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `created_at`, `updated_at`, `user`, `description`, `type`, `rank`) VALUES
(38, '2024-06-06 07:53:33', '2024-06-06 23:53:54', 4, '<p>jsb3</p>', 'Journal Article', 2),
(41, '2024-06-06 08:44:33', '2024-06-06 23:53:54', 4, '<p>jsb5</p>', 'Journal Article', 1),
(60, '2024-06-06 10:28:03', '2024-06-06 21:25:36', 10, '<p>M. R. Barman et al., “A<strong>utomated Classification of Diseased Cauliflowe</strong>r: A Feature-Driven Machine Learning Approach,” TELKOMNIKA (Telecommunication Computing Electronics and Control), 2024. [Scopus Indexed] [Journal Rank: Q3] [Accepted]</p>', 'Journal Article', 3),
(61, '2024-06-06 10:28:10', '2024-06-06 13:56:25', 10, '<p>M. R. Barman et al., “Automated Classification of Diseased Cauliflower: A Feature-Driven Machine Learning Approach,” TELKOMNIKA (Telecommunication Computing Electronics and Control), 2024. [S<strong>copus Indexed] [Journal Rank: Q3] [Accept</strong>ed]</p>', 'Journal Article', 2),
(62, '2024-06-06 10:28:17', '2024-06-06 13:56:08', 10, '<p>M. R. Barman et al., “Automated Classification of Diseased Cauliflower: A Feature-Driven Machine Learning Approach,” TELKOMNIKA (Telecommunication Computing Electronics and Control), 2024. [Scopus Indexed] [Journal Rank: Q3] [Accepted]</p>', 'Journal Article', 1);

-- --------------------------------------------------------

--
-- Table structure for table `research_profiles`
--

CREATE TABLE `research_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research_profiles`
--

INSERT INTO `research_profiles` (`id`, `user`, `title`, `created_at`, `updated_at`, `rank`) VALUES
(5, '4', '<p>Sb------------------------google scholar</p>', '2024-06-07 03:21:54', '2024-06-07 03:21:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`, `category`, `rank`) VALUES
(1, 'Journal Article', 'publication', 1),
(2, 'Conference Proceedings', 'publication', 2),
(3, 'Published Books', 'publication', 3),
(4, 'Other Publications', 'publication', 4),
(11, 'NOC', 'notice', 2),
(12, 'NOC', 'notice', 2),
(13, 'Admin', 'Role', 1),
(14, 'Teacher', 'Role', 2),
(15, 'Staff', 'Role', 3),
(19, 'Teacher', 'Visibility', 1),
(20, 'Staff', 'Visibility', 2),
(21, 'Not Visible', 'Visibility', 3);

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
  `type` enum('Teacher','Staff','Not Visible') DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `controller_role` enum('Admin','Staff','Teacher') DEFAULT NULL,
  `display_email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_id`, `researchInt`, `institute`, `country`, `email`, `email_verified_at`, `photo`, `role`, `status`, `phone`, `password`, `designation`, `special_desig`, `remember_token`, `created_at`, `updated_at`, `dept`, `type`, `rank`, `controller_role`, `display_email`) VALUES
(4, 'Swapnil Biswas', '4', '<p><strong>Machine Learning, Deep Learning, NLP, Explainable AI.</strong></p>', 'Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj', 'Bangladesh', 'swapnil.cse16@gmail.com', NULL, '202405261739Swapnil.jpg', 'admin', 'active', '01759957277', '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lecturer', NULL, NULL, NULL, '2024-06-07 08:18:21', 'Department of CSE', 'Staff', 1, 'Admin', 'hhhhhhhhhhhhh@gma.com'),
(10, 'Al Amin Biswas', '10', '<p><strong>Machine Learning, Deep Learning, NLP, Explainable AI.</strong></p>', 'BSMRU', 'Bangladesh', 'alaminbiswas.cse@gmail.com', NULL, '202405261751fac2_v1.jpg', 'admin', 'active', NULL, '$2y$10$6VBhTgJReW49wquktVTsHe2ndASiHtV19.nq313pvHTLiu1fDlpK6', 'Lecturer', 'Incharge of Sports', NULL, '2024-05-26 11:47:48', '2024-06-07 06:42:33', 'Department of CSE', 'Not Visible', 2, 'Admin', NULL),
(11, 'Noshin Tahsin', '11', '<p><strong>Software Engineering, Human-Computer Interaction, Human-Centered Computing, Responsible AI</strong></p>', 'Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj', 'Bangladesh', 'noshintahsin914@gmail.com', NULL, '202405261804NOSHIN TAHSIN.jpg', 'admin', 'active', '01882959157', '$2y$10$A0.H0ZGdlut4vmWMLueKdO74RrJ6Vqq0FDWBCkZFTD/ensfBpFlt.', 'Lecturer', 'Assistant Proctor (Acting)', NULL, '2024-05-26 12:02:39', '2024-06-07 06:13:08', 'Department of CSE', 'Teacher', 3, 'Teacher', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_attributes`
--
ALTER TABLE `dept_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_experiences`
--
ALTER TABLE `other_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_profiles`
--
ALTER TABLE `research_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dept_attributes`
--
ALTER TABLE `dept_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `other_experiences`
--
ALTER TABLE `other_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `research_profiles`
--
ALTER TABLE `research_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
