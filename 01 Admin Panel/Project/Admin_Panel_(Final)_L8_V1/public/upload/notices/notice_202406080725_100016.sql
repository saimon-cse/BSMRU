-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 11:57 PM
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
-- Database: `eng.bsmru.ac.bd`
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
(9, 21, 'Dean’s Award', 'Dean’s Award 2020', '2020', 'Bangladesh', NULL, '2024-06-08 02:25:44', '2024-06-08 02:26:16', 1);

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
(3, 'The Department of English aims to spread versatile knowledge about topics related to literature, language, and other branches of liberal arts. The students of this department are supposed to commit themselves to lifelong learning in these disciplines. The faculty pool, consisting of scholars from multiple universities, is dedicated to utilize the updated pedagogical skills to initiate critical and creative insights in young minds. The department equally emphasizes literature and language. Alongside, it believes in multidisciplinary approaches that involve other disciplines of arts, sociology, economy, politics, history, ethics, psychology, media, cultural studies, etc. The department nurtures the basic communication skills, develops academic and professional writing, and encourages research in vast areas of knowledge. The students learn how to improve their personal, professional, and social life.', '+88 017 3433 1313', 'english@bsmru.ac.bd', 'English', 'Kishoreganj, Bangladesh', 1, 'Eng');

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
(10, 19, 'B.A in English', 'University of Rajshahi', '2015', '2024-06-08 01:48:37', '2024-06-08 01:48:59', 2),
(11, 19, 'M.A. in English Literature', 'University of Rajshahi', '2017', '2024-06-08 01:48:59', '2024-06-08 01:48:59', 1),
(12, 20, 'BA (hons) in English', 'Jahangirnagar University', '2018', '2024-06-08 02:12:47', '2024-06-08 02:13:36', 2),
(13, 20, 'MA in Literatures in English and Cultural Studies', 'Jahangirnagar University', '2019', '2024-06-08 02:13:36', '2024-06-08 02:13:36', 1),
(14, 21, 'BA in English', 'Shahjalal University of Science and Technology, Sylhet', '2021', '2024-06-08 02:22:11', '2024-06-08 02:22:37', 2),
(15, 21, 'MA in English', 'Shahjalal University of Science and Technology, Sylhet', '2023', '2024-06-08 02:22:37', '2024-06-08 02:22:37', 1);

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
(17, '2023-10-13', 'Ludo Competition', NULL, 'ev6.jpg', NULL, '2024-06-08 02:08:21', 4),
(18, '2023-10-13', 'Chess Competition', NULL, 'ev5.jpg', NULL, '2024-06-08 02:08:21', 3),
(19, '2023-11-06', 'Colloquium 01: বিশ্ববিদ্যালয়ের বিকাশ ও আমাদের প্রত্যাশা', NULL, 'ev4.jpg', NULL, '2024-06-08 02:08:21', 2),
(20, '2023-12-21', 'Visit of Prof. Abdullah Al Mamun from Rajshahi University', NULL, 'ev3.jpg', NULL, NULL, 1);

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
(6, 19, 'Lecturer, Department of English', 'Bangladesh Army University of Engineering & Technology (BAUET), Qadirabad, Natore.', '14 March 2019', '4 February 2023', '2024-06-08 01:49:47', '2024-06-08 01:49:47', 1),
(7, 20, 'Lecturer, Department of English', 'Cox’s Bazar International University', '1 December 2021', '15 May 2022', '2024-06-08 02:15:19', '2024-06-08 02:16:46', 2),
(8, 20, 'Lecturer, Department of English', 'East Delta University', '16 May 2022', '7 February 2023', '2024-06-08 02:16:13', '2024-06-08 02:16:46', 1),
(9, 21, 'Lecturer, Department of English', 'North East University Bangladesh', '6 August 2023', '15 October 2023', '2024-06-08 02:24:25', '2024-06-08 02:24:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(23, '2023-09-25', 'Mid-I Routine - Sem 1.2', NULL, 'notice_0007.pdf', 7, '2024-06-08 01:56:37', '2024-06-08 02:01:37', NULL),
(24, '2023-10-12', 'Class Routine - Sem 1.2 (2021-22)', NULL, 'notice_0006.pdf', 6, '2024-06-08 01:57:42', '2024-06-08 02:01:37', NULL),
(25, '2023-10-12', 'Class Routine - Sem 1.1 (2022-23)', NULL, 'notice_0005.pdf', 5, '2024-06-08 01:58:30', '2024-06-08 02:01:37', NULL),
(26, '2023-11-08', 'Mid-2 Routine - Sem 1.2', NULL, 'notice_0004.pdf', 4, '2024-06-08 01:59:18', '2024-06-08 02:01:37', NULL),
(27, '2023-11-13', 'শিক্ষাবোর্ড প্রদত্ত বৃত্তির জরুরি বিজ্ঞপ্তি', NULL, 'notice_0003.pdf', 3, '2024-06-08 02:00:02', '2024-06-08 02:01:37', NULL),
(28, '2023-12-21', 'Final Examination Routine, 1st Year 2nd Semester, Session 2021-22', NULL, 'notice_0002.pdf', 2, '2024-06-08 02:00:55', '2024-06-08 02:01:37', NULL),
(29, '2024-04-18', 'Class Routine', NULL, 'notice_0001.pdf', 1, '2024-06-08 02:01:37', '2024-06-08 02:01:37', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(64, '2024-06-08 01:24:10', '2024-06-08 01:42:42', 19, '<p>1. <i><strong>Traces of Time</strong></i>, Author: Rakibul Alam, ISBN: 9789843555786, Anvil Publications, February 2024<br>Link: <a href=\"https://baatighar.com/shop/product/9789843555786-traces-of-time-94629#attr=\"><strong>https://baatighar.com/shop/product/9789843555786-traces-of-time-94629#attr=</strong></a></p>', 'Published Books', 2),
(65, '2024-06-08 01:24:39', '2024-06-08 01:45:49', 19, '<p>2. <i><strong>Violence in Literature: Studies in Agency, Ethics and Identity</strong></i>, Associate Editor: Rakibul Alam, ISBN: 978-984-35-5579-3, Anvil Publications, February 2024<br>Link: <a href=\"https://baatighar.com/shop/product/9789843555793-violence-in-literature-studies-in-agency-ethics-and-identity-95706#attr=\"><strong>https://baatighar.com/shop/product/9789843555793-violence-in-literature-studies-in-agency-ethics-and-identity-95706#attr=</strong></a></p>', 'Published Books', 4),
(66, '2024-06-08 01:25:30', '2024-06-08 01:39:26', 19, '<p>1. <i><strong>“Getting Rid of Translation’s ‘Guilt’: Contrastive Mapping of ‘Eastern’ and ‘Western’ Approaches” </strong></i>Published in the Praxis 13, Department of English, University of Rajshahi, 2022.</p>', 'Journal Article', 1),
(67, '2024-06-08 01:26:09', '2024-06-08 01:39:35', 19, '<p>2. <i><strong>“Violence and its Ramifications: Exploring Theory” </strong></i>Published in the Praxis 12: Special Volume on Identity and Violence, Department of English, University of Rajshahi, 2022.</p>', 'Journal Article', 1),
(68, '2024-06-08 01:26:20', '2024-06-08 01:31:13', 19, '<p>3. <i><strong>“Negotiating Noosphere: Romantic Odyssey Towards Authenticity”, </strong></i>BAUET JOURNAL, Vol. 3, Issue 1, 2021.</p>', 'Journal Article', 2),
(69, '2024-06-08 01:26:30', '2024-06-08 01:47:09', 19, '<p>4. <i><strong>“The Agonies of Nationhood: Perceiving Partition in a Postcolonial Context”</strong></i> , Published in the Journal of Emerging Technologies and Innovative Research (JETIR); Volume: 7 Issue.: 10, Pages: 673-680, 2020.</p>', 'Journal Article', 3),
(70, '2024-06-08 01:26:43', '2024-06-08 01:47:09', 19, '<p>5. <i><strong>“Translation as a Transformative Act of Resistance: A Postcolonial Exploration of the Western Metaphysics of Guilt”</strong></i> , Published in the International Journal of English Learning and Teaching Skills; Vol. 2, No. 2; ISSN: 2638-5546 (Online) ISSN: 2639-7412 (Print), 2019.</p>', 'Journal Article', 4),
(71, '2024-06-08 01:26:57', '2024-06-08 01:45:02', 19, '<p>6. <i><strong>“The Post Human Promise: Building Future Beyond Binaries”</strong></i> , published in the Special Volume 1, Literature, History, Culture, 1st International Conference, Arts Faculty, University of Rajshahi. ISSN 1813-0402, 2018.</p>', 'Journal Article', 5),
(72, '2024-06-08 01:32:59', '2024-06-08 01:39:16', 19, '<p>1. “Reflections on identity formations”, The <i>New Age,</i> Nov 18, 2021. <a href=\"https://www.newagebd.net/article/154960/reflections-on-identity-formations\"><strong>https://www.newagebd.net/article/154960/reflections-on-identity-formations</strong></a></p>', 'Other Publications', 1),
(73, '2024-06-08 01:33:19', '2024-06-08 01:42:19', 19, '<p>2. “Languages and their translation: manufacturing our ‘narrative identity’”. The <i>New Age,</i> Feb 21, 2022. <a href=\"https://www.newagebd.net/article/163286/languages-and-their-translation-manufacturing-our-narrative-identity\"><strong>https://www.newagebd.net/article/163286/languages-and-their-translation-manufacturing-our-narrative-identity</strong></a></p>', 'Other Publications', 2),
(74, '2024-06-08 01:33:36', '2024-06-08 01:44:16', 19, '<p>3. “Justice still cries in RU professor murder”. The <i>New Age,</i> April 23, 2022. <a href=\"https://www.newagebd.net/article/168734/justice-still-cries-in-ru-professor-murder\"><strong>https://www.newagebd.net/article/168734/justice-still-cries-in-ru-professor-murder</strong></a></p>', 'Other Publications', 3),
(75, '2024-06-08 01:34:46', '2024-06-08 01:47:01', 19, '<p>4. “Rethinking human condition”. The<i> New Age</i>, May 1, 2022. <a href=\"https://www.newagebd.net/article/169451/rethinking-human-condition\"><strong>https://www.newagebd.net/article/169451/rethinking-human-condition</strong></a></p>', 'Other Publications', 5),
(76, '2024-06-08 01:35:26', '2024-06-08 01:47:01', 19, '<p>5. “Future of human nature”. The <i>New Age,</i> June 16, 2022. <a href=\"https://www.newagebd.net/article/169451/rethinking-human-condition\"><strong>https://www.newagebd.net/article/173384/future-of-human-nature</strong></a></p>', 'Other Publications', 6),
(77, '2024-06-08 01:35:58', '2024-06-08 01:45:34', 19, '<p>6. “Human dignities in zones of exception”. The <i>New Age</i>, June 20, 2022. <a href=\"https://www.newagebd.net/article/173751/human-dignities-in-zones-of-exception\"><strong>https://www.newagebd.net/article/173751/human-dignities-in-zones-of-exception</strong></a></p>', 'Other Publications', 6),
(78, '2024-06-08 01:36:40', '2024-06-08 01:46:49', 19, '<p>7. “The politics of scapegoating.” The <i>New Age</i>, July 20, 2022. <a href=\"https://www.newagebd.net/article/176257/the-politics-of-scapegoating\"><strong>https://www.newagebd.net/article/176257/the-politics-of-scapegoating</strong></a></p>', 'Other Publications', 7),
(79, '2024-06-08 01:36:57', '2024-06-08 01:45:21', 19, '<p>8. “The Other Side of Schooling”. The <i>New Age,</i> December 16, 2022. <a href=\"https://www.newagebd.net/article/189211/the-other-side-of-schooling\"><strong>https://www.newagebd.net/article/189211/the-other-side-of-schooling</strong></a></p>', 'Other Publications', 8),
(80, '2024-06-08 01:38:00', '2024-06-08 01:43:24', 19, '<p>9. “True Cost of a Click”. The<i> New Age</i>, August 20, 2022. <a href=\"https://www.newagebd.net/article/179710/true-cost-of-a-click\"><strong>https://www.newagebd.net/article/179710/true-cost-of-a-click</strong></a></p>', 'Other Publications', 9),
(81, '2024-06-08 01:38:15', '2024-06-08 01:40:41', 19, '<p>10. “Defending Liberty at University”. The <i>New Age</i>, Sept. 15, 2022. <a href=\"https://www.newagebd.net/article/181098/defending-liberty-at-university\"><strong>https://www.newagebd.net/article/181098/defending-liberty-at-university</strong></a></p>', 'Other Publications', 10);

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
(19, 'Md. Rakibul Alam', '19', NULL, 'BSMRU', 'Bangladesh', 'mhk@gmail.com', NULL, '202406071821fac1_v1.jpg', 'admin', 'inactive', '01685001020', '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lecturer', 'Assistant Proctor (Acting)', NULL, NULL, '2024-06-08 01:21:39', 'English', NULL, 1, 'Admin', 'rakib.bsmru@gmail.com'),
(20, 'Nafis Jamal Arnab', '20', '<p>American Literature, Comparative Literature, European Literature, South Asian Literature in English, Cultural Studies, Media Studies, Gender Studies, Interdisciplinary Research Approaches.</p>', 'BSMRU', 'Bangladesh', 'saiful@gmail.com', NULL, '202406071911fac2.jpg', 'admin', 'inactive', '01781597357', '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lecturer', NULL, NULL, NULL, '2024-06-08 02:11:53', 'English', NULL, NULL, 'Teacher', 'afisarnabbd@gmail.com'),
(21, 'Tasnim Sultana Daizy', '21', '<p>Postcolonialism, Postmodernism, Feminism, Poetry</p>', 'BSMRU', 'Bangladesh', 'adan@gmail.com', NULL, '202406071920fac3 (1).jpg', 'admin', 'inactive', NULL, '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lecturer', NULL, NULL, NULL, '2024-06-08 02:20:28', 'English', NULL, NULL, 'Teacher', 'tsdaizy71@gmail.com'),
(22, 'Noor', '22', NULL, NULL, NULL, 'noor@gmail.com', NULL, 'temp.png', 'admin', 'inactive', NULL, '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dept_attributes`
--
ALTER TABLE `dept_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
