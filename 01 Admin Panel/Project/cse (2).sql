-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 12:31 PM
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
-- Database: `cse`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(50) NOT NULL,
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
(1, '20', 'Third International Conference on Smart Systems: Innovations in Computing (SSIC)', 'Best Paper Award', '2021', 'India', NULL, NULL, NULL, 1),
(2, '20', 'International Conference on Machine Intelligence and Data Science Application (MIDAS)', 'Best Paper Award', '2021', 'Bangladesh', NULL, NULL, NULL, 2),
(3, '30', 'International', '2023 ACM SIGSOFT Distinguished\n        Paper - Best Regular Paper (Software\n        Ecosystems) at the ACM/IEEE 11th\n        International Workshop on Software\n        Engineering for Systems-of-Systems\n        and Software Ecosystems (SESoS\n        2023)', '2023', 'Australia', NULL, NULL, NULL, 1),
(4, '30', 'National', 'Masters Fellowship from ICT Division,\n        Government of Bangladesh', '2021-22', 'Bangladesh', NULL, NULL, NULL, 2);

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
  `dept_short_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dept_url` text DEFAULT NULL,
  `folder_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_attributes`
--

INSERT INTO `dept_attributes` (`id`, `about`, `phone`, `email`, `dept_name`, `address`, `dept_code`, `dept_short_name`, `created_at`, `updated_at`, `dept_url`, `folder_name`) VALUES
(1, 'Welcome to the Computer Science and Engineering (CSE) Department at Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj! This department started its academic journey in 2022, offering bachelor\'s degrees. Here, the focus is on nurturing problem-solving abilities and fostering skills in competitive programming of the students.<br><br>\r\n\r\n    In a remarkable start to its competitive programming journey, the CSE Department secured the 69th spot in the BUET IUPC 2023, a national competition that draws participants from all over Bangladesh. The department boasts well-equipped computer and hardware labs, providing students with hands-on experience and cutting-edge tools.<br><br>\r\n    \r\n    But that\'s not all. The CSE Department also encourages the exciting world of robotics, sparking the imaginations of budding engineers. Moreover, it consistently motivates students to develop practical systems that find real-world applications, bridging the gap between theory and practice.<br><br>\r\n    \r\n    At Bangabandhu Sheikh Mujibur Rahman University, the CSE Department aims to create an inclusive and supportive community where students can pursue their academic dreams while contributing to the ever-evolving fields of computer science and engineering. Join this exciting journey and be a part of shaping the future!', '+88 017 3433 1313', 'cse@bsmru.ac.bd', 'Computer Science and Engineering', 'Kishoreganj, Bangladesh', 1, 'CSE', NULL, NULL, 'https://cse.bsmru.ac.bd/', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(50) NOT NULL,
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
(1, '10', 'M.Sc. in Computer Science and Engineering', 'Military Institute of Science and Technology', 'Ongoing', NULL, NULL, 1),
(2, '10', 'B.Sc. in Computer Science and Engineering', 'Military Institute of Science and Technology', '2020', NULL, NULL, 2),
(3, '20', 'M.Sc. in Computer Science and Engineering', 'Jahangirnagar University, Dhaka', '2017', NULL, NULL, 1),
(4, '20', 'B.Sc. in Computer Science and Engineering', 'Jahangirnagar University, Dhaka', '2016', NULL, NULL, 2),
(5, '30', 'Master of Science in Software Engineering (MSSE)', 'Institute of Information Technology (IIT), University of Dhaka', '2023', NULL, NULL, 1),
(6, '30', 'Bachelor of Science in Software Engineering (BSSE)', 'Institute of Information Technology (IIT), University of Dhaka', '2021', NULL, NULL, 2),
(7, '40', 'M.Sc. in Computer Science and Engineering', 'Jahangirnagar University', '2017', NULL, NULL, 1),
(8, '40', 'B.Sc. in Computer Science and Engineering', 'Jahangirnagar University', '2016', NULL, NULL, 2);

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
(1, '0000-00-00', 'Cricket Tournament 2023', NULL, 'assets/img/Events/ev1.jpg', NULL, NULL, 1),
(2, '0000-00-00', 'BSMRU Programming Camp 2023', NULL, 'assets/img/Events/ev2.jpg', NULL, NULL, 2),
(3, '0000-00-00', 'CoU IUPC 2023', NULL, 'assets/img/Events/ev3.jpg', NULL, NULL, 3),
(4, '0000-00-00', 'ICPC Dhaka Regional 2023', NULL, 'assets/img/Events/ev5.jpg', NULL, NULL, 4),
(5, '0000-00-00', 'Colloquium 2: শিক্ষা ও গবেষণা ক্ষেত্রে কৃত্রিম বুদ্ধিমত্তা ও প্রযুক্তির ব্যবহার', NULL, 'assets/img/Events/ev6.jpg', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(50) NOT NULL,
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
(1, '10', 'Lecturer, Department of Computer Science and Engineering', 'Military Institute of Science and Technology', '1 Jul 2020', '1 Feb 2023', NULL, NULL, 1),
(2, '10', 'Lecturer, Department of Computer Science and Engineering', 'University of Information Technology and Sciences (UITS)', '15 Jan 2020', '30 Jun 2020', NULL, NULL, 2),
(3, '20', 'Lecturer', 'Department of Computer Science and Engineering, Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj', '5 Feb 2023', 'Continue', NULL, NULL, 1),
(4, '20', 'Lecturer (Senior Scale)', 'Department of Computer Science and Engineering, Daffodil International University, Dhaka', '1 Jan 2022', '31  Jan, 2023', NULL, NULL, 2),
(5, '20', 'Lecturer', 'Department of Computer Science and Engineering, Daffodil International University, Dhaka', '5  Sep 2018', '31 Dec, 2021', NULL, NULL, 3),
(6, '30', 'Product Manager', 'ProSpotters', 'Aug 2023', 'Oct 2023', NULL, NULL, 1),
(7, '30', 'Software Engineer Intern', 'Secured Link Services (SELISE)', 'Jan 2020', 'Jun 2020', NULL, NULL, 2),
(8, '40', 'Lecturer at Department of Computer Science and Engineering', 'Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj, Bangladesh', 'Oct 2023', 'Present', NULL, NULL, 1),
(9, '40', 'Lecturer (Sr. Scale) at Department of\n        Computer Science and Engineering', 'Daffodil International University, Dhaka, Bangladesh', 'Jan 2022', 'Oct 2023', NULL, NULL, 2),
(10, '40', 'Lecturer at Department of Computer Science and Engineering', 'Daffodil International University, Dhaka, Bangladesh', 'Jan 2019', 'Dec 2021', NULL, NULL, 3),
(11, '40', 'Lecturer (Contractual) at\n        Department of Computer Science and Engineering', 'Daffodil International University, Dhaka, Bangladesh', 'Sep 2018', 'Dec 2018', NULL, NULL, 4);

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
(1, '0000-00-00', '1st Incourse Examination Schedule, Session 2021-22', NULL, 'assets/Files/notice_0001.pdf', 1, NULL, NULL, 'Academic'),
(2, '0000-00-00', 'Class Routine, 1st year, 1st and 2nd semester', NULL, 'assets/Files/notice_0002.pdf', 2, NULL, NULL, 'Academic'),
(3, '0000-00-00', '2nd Incourse Examination Schedule, Session 2021-22', NULL, 'assets/Files/notice_0003.pdf', 3, NULL, NULL, 'Academic'),
(4, '0000-00-00', 'শিক্ষাবোর্ড প্রদত্ত বৃত্তির জরুরি বিজ্ঞপ্তি', NULL, 'assets/Files/notice_0004.pdf', 4, NULL, NULL, 'Academic'),
(5, '0000-00-00', '1st Incourse Examination Schedule, Session 2022-23', NULL, 'assets/Files/notice_0005.pdf', 5, NULL, NULL, 'Academic'),
(6, '0000-00-00', 'Final Examination Routine, 1st Year 2nd Semester, Session 2021-22)', NULL, 'assets/Files/notice_0006.pdf', 6, NULL, NULL, 'Academic'),
(7, '0000-00-00', 'Lab Final Routine: 1st year 1st sem (2022-23)', NULL, 'assets/Files/notice_0008.pdf', 7, NULL, NULL, 'Academic'),
(8, '0000-00-00', 'Class Routine', NULL, 'assets/Files/notice_0009.pdf', 8, NULL, NULL, 'Academic');

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
(1, '20', '<b>Session Chair</b>, “2021 International Conference on Computer Communication and Informatics”, IEEE, Sri Shakthi Institute of Engineering and Technology (SIET), India.', NULL, NULL, 1),
(2, '20', '<b>Co-convener</b>, International Conference on Machine Intelligence and Data Science Applications (MIDAS 2021), Springer, Comilla University, Cumilla, Bangladesh.', NULL, NULL, 2),
(3, '20', '<b>Reviewer</b>, Computers in Biology and Medicine. <b>[Elsevier Journal] [Journal Rank: Q1, Impact Factor 7.7]</b>', NULL, NULL, 3),
(4, '20', '<b>Reviewer</b>, Heliyon. <b>[Elsevier Journal] [Journal Rank: Q1]</b>', NULL, NULL, 4),
(5, '20', '<b>Reviewer</b>, Array.<b> [Elsevier Journal] [Journal Rank: Q1]</b>', NULL, NULL, 5),
(6, '20', '<b>Reviewer</b>, Healthcare Analytics.<b> [Elsevier Journal]</b>', NULL, NULL, 6),
(7, '20', '<b>Reviewer</b>, Current Research in Behavioral Sciences.<b> [Elsevier Journal] [Journal Rank: Q2]</b>', NULL, NULL, 7),
(8, '20', '<b>Reviewer</b>, IEEE Access.<b> [Journal Rank: Q1]</b>', NULL, NULL, 8),
(9, '20', '<b>Reviewer</b>, Computer Methods in Biomechanics and Biomedical Engineering. <b>[Taylor & Francis] [Journal Rank: Q3]</b>', NULL, NULL, 9),
(10, '20', '<b>Reviewer</b>, “Bulletin of Electrical Engineering and Informatics (BEEI)”, Published by the Institute of Advanced Engineering and Science, Indonesia<b> [Scopus Indexed Journal] [Journal Rank: Q3]</b>', NULL, NULL, 10),
(11, '20', '<b>Reviewer</b>, “Asia-Pacific Journal of Science and Technology (APST)”, Division of Research Administration Khon Kaen University, Thailand<b> [Scopus Indexed Journal] [Journal Rank: Q4]</b>', NULL, NULL, 11),
(12, '20', '<b>Reviewer</b>, “6th International Conference on Computer Science and Application Engineering (CSAE 2022)”, ACM International Conference Proceedings Series, Nanjing, China.', NULL, NULL, 12),
(13, '20', '<b>Reviewer</b>, “2021 International Conference on Computer Communication and Informatics”, IEEE, Sri Shakthi Institute of Engineering and Technology (SIET), India.', NULL, NULL, 13),
(14, '20', '<b>Reviewer,,</b> International Conference on Machine Intelligence and Data Science Applications (MIDAS 2021), Springer, Comilla University, Cumilla, Bangladesh.', NULL, NULL, 14),
(15, '20', '<b>Reviewer,</b> “International Conference on Science & Contemporary Technologies (ICSCT-2021)”, IEEE, Bangladesh University of Business and Technology (BUBT), Dhaka, Bangladesh.', NULL, NULL, 15),
(16, '20', '<b>Reviewer</b>, “International Conference on Embracing Industry 4.0 for Sustainable Business Growth (EISBG 2024)”, Noakhali Science and Technology University (NSTU), Noakhali, Bangladesh.', NULL, NULL, 16),
(17, '20', '<b>Judge,</b> Mujib 100 Idea Contest 2021, Organized by UGC of Bangladesh.\n    ', NULL, NULL, 17);

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
  `user` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `type` text DEFAULT '\'journal\'',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `created_at`, `updated_at`, `user`, `description`, `type`, `rank`) VALUES
(1, NULL, NULL, '10', '<b>S. Biswas,</b> S. A. Nusrat, N. Sharmin and M. Rahman, <i>“Graph Coloring in University Timetable Scheduling”</i>, International Journal of Intelligent Systems and Applications (IJISA), vol. 15, no. 3, 8 Jun. 2023. doi: https://doi.org/10.5815/ijisa.2023.03.02', 'Journal Article', 1),
(2, NULL, NULL, '20', 'M. R. Barman et al., “Automated Classification of Diseased Cauliflower: A Feature-Driven Machine Learning Approach,” TELKOMNIKA (Telecommunication Computing Electronics and Control), 2024. [Scopus Indexed] [Journal Rank: Q3] [Accepted]', 'Journal Article', 1),
(3, NULL, NULL, '20', 'A. A. Biswas, “A Comprehensive Review of Explainable AI for Disease Diagnosis,” Array, Volume 22, July 2024. [Elsevier] [DBLP, ESCI, Scopus Indexed] [Journal Rank: Q1]', 'Journal Article', 2),
(4, NULL, NULL, '20', 'S. G. Paul et al., “A Comprehensive Review of Green Computing: Past, Present, and Future Research,” in IEEE Access, vol. 11, pp. 87445-87494, 2023. [DBLP, Scopus Indexed] [Journal Rank: Q1]\n        ', 'Journal Article', 3),
(5, NULL, NULL, '20', 'S. G. Paul et al., “A real-time application-based convolutional neural network approach for tomato leaf disease classification,” Array, Volume 19, August 2023. [Elsevier] [DBLP, ESCI, Scopus Indexed] [Journal Rank: Q1]', 'Journal Article', 4),
(6, NULL, NULL, '20', 'R. Sadik, A. Majumder, A. A. Biswas, B. Ahammad, and M. M. Rahman, “An in-depth analysis of Convolutional Neural Network architectures with transfer learning for skin disease diagnosis,” Healthcare Analytics, Volume 3, February, 2023. [Elsevier] [Scopus Indexed]', 'Journal Article', 5),
(7, NULL, NULL, '20', 'S. G. Paula, A. Saha, A. A.Biswas, M. S. Zulfiker, M. S. Arefin, M. M. Rahman, and A. W. Reza, “Combating Covid-19 using machine learning and deep learning: Applications, challenges, and future perspectives,” Array, Volume 17, December, 2022. [Elsevier] [DBLP, ESCI, Scopus Indexed] [Journal Rank: Q1]', 'Journal Article', 6),
(8, NULL, NULL, '20', 'M. S. Zulfiker, N. Kabir, A. A. Biswas, S. Zulfiker, and M. S. Uddin, “Analyzing the Public Sentiment on COVID-19 Vaccination in Social Media: Bangladesh Context,” Array, 12 June, 2022. [Elsevier] [DBLP, ESCI, Scopus Indexed] [Journal Rank: Q1]', 'Journal Article', 7),
(9, NULL, NULL, '20', 'M. S. Zulfiker, N. Kabir, A. A. Biswas, T. Nazneen, and M. S. Uddin, “An In-Depth Analysis of Machine Learning Approaches to Predict Depression,” Current Research in Behavioral Sciences, 06 May, 2021. [Elsevier] [Scopus Indexed] [Journal Rank: Q2]', 'Journal Article', 8),
(10, NULL, NULL, '20', 'M. J. Mia, S. K. Maria, S. S. Taki, and A. A. Biswas, “Cucumber Disease Recognition Using Machine Learning and Transfer Learning,” Bulletin of Electrical Engineering and Informatics, vol. 10, no. 6 (2021), Indonesia. [Scopus Indexed] [Journal Rank: Q3]', 'Journal Article', 9),
(11, NULL, NULL, '20', 'A. Majumder, A. Rajbongshi, M. M. Rahman, and A. A. Biswas, “Local Freshwater Fish Recognition Using Different CNN Architectures with Transfer Learning,” International Journal on Advanced Science, Engineering and Information Technology, vol. 11, no. 03, 2020, Indonesia. [Scopus Indexed] [Journal Rank: Q3]', 'Journal Article', 10),
(12, NULL, NULL, '20', 'M. M. Rahman, A. A. Biswas, A. Rajbongshi, and A. Majumder, ”Recognition of Local Birds of Bangladesh using MobileNet and Inception-v3”, International Journal of Advanced Computer Science and Applications (IJACSA), vol. 11, no. 08, August, 2020. [Scopus Indexed] [Journal Rank: Q3]', 'Journal Article', 11),
(13, NULL, NULL, '20', 'A. Rajbongshi, M. I. Islam, A. A. Biswas, M. M. Rahman, A. Majumder, and M. E. Islam, ”Bangla Optical Character Recognition and Text-to-Speech Conversion using Raspberry PI,” International Journal of Advanced Computer Science and Applications (IJACSA), vol. 11, no. 06, pp. 274-278, June, 2020. [Scopus Indexed] [Journal Rank: Q3]', 'Journal Article', 12),
(14, NULL, NULL, '20', 'M. S. Zulfiker, N. Kabir, A. A. Biswas, P. Chakraborty, and M. M. Rahman, ”Predicting Students’ Performance of the Private Universities of Bangladesh using Machine Learning Approaches”, International Journal of Advanced Computer Science and Applications (IJACSA), vol. 11, no. 03, pp. 672-679, 2020. [Scopus Indexed] [Journal Rank: Q3]', 'Journal Article', 13),
(15, NULL, NULL, '20', 'M. J. Mia, A. A. Biswas, M. T. Habib, and A. Sattar, ”Registration Status Prediction Using Machine Learning in the Context of Private University of Bangladesh,” International Journal of Innovative Technology and Exploring Engineering, vol. 9, no. 1, pp. 2594-2600, November, 2019. [Scopus Indexed]', 'Journal Article', 14),
(16, NULL, NULL, '20', 'A. A. Biswas, A. Majumder, M. J. Mia, I. Nowrin, and N. A. Ritu, ”Predicting the Enrollment and Dropout of Students in the Post-Graduation Degree using Machine Learning Classifier”,  International Journal of Innovative Technology and Exploring Engineering, vol. 8, no. 11, pp. 3083-3088, September, 2019. [Scopus Indexed]', 'Journal Article', 15),
(17, NULL, NULL, '30', 'Tahsin, N. and Joarder, M.M.A., 2022. Community smells in software engineering: A systematic literature review.<i> Systematic Literature Review and Meta-Analysis Journal, </i>3(4), pp.127-145.', 'Journal Article', 1),
(18, NULL, NULL, '40', '<b>Md. Sabab Zulfiker,</b> Nasrin Kabir, Al Amin Biswas, Sunjare Zulfiker, and Mohammad Shorif Uddin, “Analyzing the public sentiment on COVID-19 vaccination in social media: Bangladesh context,” Array, vol. 15, p. 100204, Sep. 2022, doi: https://doi.org/10.1016/j.array.2022.100204.', 'Journal Article', 1),
(19, NULL, NULL, '40', '<b>Md. Sabab Zulfiker</b>, Nasrin Kabir, Al Amin Biswas, Tahmina Nazneen, and Mohammad Shorif Uddin, “An in-depth analysis of machine learning approaches to predict depression,” Current Research in Behavioral Sciences, vol. 2, p. 100044, Nov. 2021, doi: 10.1016/j.crbeha.2021.100044.', 'Journal Article', 2),
(20, NULL, NULL, '40', '<b>Md. Sabab Zulfiker</b>, Nasrin Kabir, Al Amin Biswas, Partha Chakraborty, and Md. Mahfujur Rahman, “Predicting Students’ Performance of the Private Universities of Bangladesh using Machine Learning Approaches,” IJACSA, vol. 11, no. 3, 2020, doi: https://doi.org/10.14569/IJACSA.2020.0110383.', 'Journal Article', 3),
(21, NULL, NULL, '40', 'Showmick Guha Paul, Al Amin Biswas, Arpa Saha,<b> Md. Sabab Zulfiker</b>, Nadia Afrin Ritu, Ifrat Zahan, Mushfiqur Rahman, Mohammad Ashraful Islam, “A real-time application-based convolutional neural network approach for tomato leaf disease classification,” Array, vol. 19, p. 100313, Sep. 2023, doi: 10.1016/j.array.2023.100313.', 'Journal Article', 4),
(22, NULL, NULL, '40', 'Showmick Guha Paul, Arpa Saha, Al Amin Biswas, <b>Md Sabab Zulfiker</b>, Mohammad Shamsul Arefin, Md Mahfujur Rahman, Ahmed Wasif Reza, “Combating Covid-19 using machine learning and deep learning: Applications, challenges, and future perspectives,” Array, vol. 17, p. 100271, Mar. 2023, doi: https://doi.org/10.1016/j.array.2022.100271.', 'Journal Article', 5),
(23, NULL, NULL, '10', '<b>S. Biswas</b>, S. A. Nusrat and N. Tasnim, <i>“Grid-Based Pathfinding Using Ant Colony Optimization Algorithm”</i>, In: Reddy, A.B., Nagini, S., Balas, V.E., Raju, K.S. (eds) Proceedings of Third International Conference on Advances in Computer Engineering and Communication Systems. Lecture Notes in Networks and Systems, vol 612. Springer, Singapore. https://doi.org/10.1007/978-981-19-9228-5_23', 'Conference Proceedings', 1),
(24, NULL, NULL, '10', '\n        S. Tasfia,<b> S. Biswas, </b>S. A. Nusrat and M. Rahman,<i> “Increased Cyber Activities and its Impacts During Covid-19 in Context of Bangladesh: An Exploratory Study,”</i> 2022 IEEE International Women in Engineering (WIE) Conference on Electrical and Computer Engineering (WIECON-ECE), Naya Raipur, India, 2022, pp. 12-18, doi: 10.1109/WIECON-ECE57977.2022.10150821. ', 'Conference Proceedings', 2),
(25, NULL, NULL, '20', 'T. Tabassum et al., “A Comprehensive Review of Machine Learning and Deep Learning Techniques for Rice Leaf Disease Classification,” 6th International Conference on Computational Intelligence in Pattern Recognition (CIPR), Springer, 2024 [Scopus Indexed] [Presented]', 'Conference Proceedings', 1),
(26, NULL, NULL, '20', 'T. T. Prama, A. A. Biswas, and M. M. Anwar, “Deep Learning-Based Classification of Conference Paper Reviews:\n            Accept or Reject?” 23rd International Conference on Intelligent Systems Design and Applications (ISDA 2023),\n            Springer, 2023 [Scopus Indexed] [Accepted] [Ranked Conference]', 'Conference Proceedings', 2),
(27, NULL, NULL, '20', 'A. Saha, S. G. Paul, M. S. Zulfiker, A. A. Biswas, M. M. Fuad, “Transfer-learning-based feature extractor\n            performance analysis to classify black gram leaf disease,” International Conference on Big Data, IoT and Machine\n            Learning (BIM 2023), Springer, 2023 [Scopus Indexed] [Presented]', 'Conference Proceedings', 3),
(28, NULL, NULL, '20', 'M. M. Rahman, B. C. Das, A. A. Biswas, and M. M. Anwar, “Predicting Participants’ Performance in Programming\n            Contests using Deep Learning Techniques,” 22th International Conference on Hybrid Intelligent Systems (HIS\n            2022), Springer, 2022. [DBLP &amp; Scopus Indexed] [Ranked Conference]', 'Conference Proceedings', 4),
(29, NULL, NULL, '20', 'A. A. Biswas, M. S. Zulfiker, A. Rajbongshi, M. J. Mia, and A. Majumder, “Feature Ranking Based Carrot Disease\n            Recognition Using MIFS Method,” 21th International Conference on Hybrid Intelligent Systems (HIS 2021),\n            Springer, 2021. [DBLP &amp; Scopus Indexed] [Ranked Conference]', 'Conference Proceedings', 5),
(30, NULL, NULL, '20', 'M. J. Ali, B. C. Das, S. Saha, A. A. Biswas, and P. Chakraborty, “A Comparative Study of Machine Learning\n            Algorithms to Detect Cardiovascular Disease with Feature Selection Method,” International Conference on Machine\n            Intelligence and Data Science Application (MIDAS 2021), vol. 132, Springer. [Scopus Indexed] [Received Best\n            Paper Award]', 'Conference Proceedings', 6),
(31, NULL, NULL, '20', 'M. A. Pramanik, M. M. H. Suzan, A. A. Biswas, M. Z. Rahman, A. Kalaiarasi, “Performance Analysis of\n            Classification Algorithms for Outcome Prediction of T20 Cricket Tournament Matches,” International Conference\n            on Computer Communication and Informatics (ICCCI 2022), IEEE, 2022. [Scopus Indexed]', 'Conference Proceedings', 7),
(32, NULL, NULL, '20', 'A. Rajbongshi, A. A. Biswas, J. Biswas, R. Shakil, B. Akter, and M. R. Barman, “Sunflower Diseases Recognition\n            Using Computer Vision-Based Approach,” IEEE Region 10 Humanitarian Technology Conference 2021, IEEE,\n            2021. [Scopus Indexed]', 'Conference Proceedings', 8),
(33, NULL, NULL, '20', 'N. A. Ritu, A. Abid, A. A. Biswas, and M. I. Islam, “Watermarking of Digital Image Based on Complex Number\n            Theory,” Third International Conference on Smart Systems: Innovations in Computing (SSIC 2021), Springer, 2021.\n            [Scopus Indexed]', 'Conference Proceedings', 9),
(34, NULL, NULL, '20', 'M. M. H. Suzan, N. A. Samrin, A. A. Biswas, and M. A. Pramanik, “Students’ Adaptability Level Prediction in\n            Online Education using Machine Learning Approaches,” 12th International Conference on Computing,\n            Communication and Networking Technologies (ICCCNT), IEEE, 2021. [DBLP &amp; Scopus Indexed]', 'Conference Proceedings', 10),
(35, NULL, NULL, '20', 'T. I. Meghla, M. M. Rahman, A. A. Biswas, J. T. Hossain, and T. Khatun, “Supply Chain Management with\n            Demand Forecasting of Covid-19 Vaccine using Blockchain and Machine Learning,” 12th International Conference\n            on Computing, Communication and Networking Technologies (ICCCNT), IEEE, 2021. [DBLP &amp; Scopus Indexed]', 'Conference Proceedings', 11),
(36, NULL, NULL, '20', 'M. A. Pramanik, M. A. Z. Khan, A. A. Biswas, and Md. Mahbubur Rahman, “Lemon Leaf Disease Classification\n            Using CNN-based Architectures with Transfer Learning,” 12th International Conference on Computing,\n            Communication and Networking Technologies (ICCCNT), IEEE, 2021. [DBLP &amp; Scopus Indexed]', 'Conference Proceedings', 12),
(37, NULL, NULL, '20', 'M. S. Zulfiker, N. Kabir, A. A. Biswas, P. Chakraborty, “Predicting Insomnia Using Multilayer Stacked Ensemble\n            Model,” 5th International Conference on Advances in Computing and Data Sciences (ICACDS 2021),\n            Communications in Computer and Information Science, Springer, 2021. [Scopus Indexed]', 'Conference Proceedings', 13),
(38, NULL, NULL, '20', 'S. K. Maria, S. S. Taki, M. J. Mia, A. A. Biswas, A. Majumder, and F. Hasan, “Cauliflower Disease Recognition\n            using Machine Learning and Transfer Learning,” Third International Conference on Smart Systems: Innovations in\n            Computing (SSIC 2021), Springer, 2021. [Scopus Indexed]', 'Conference Proceedings', 14),
(39, NULL, NULL, '20', 'M. J. Mia, M. Hasan, and A. A. Biswas, “Effectiveness Analysis of Different POS Tagging Techniques for Bangla\n\n            Language,” Third International Conference on Smart Systems: Innovations in Computing (SSIC 2021), Springer,\n            2021. [Scopus Indexed] [Received Best Paper Award]', 'Conference Proceedings', 15),
(40, NULL, NULL, '20', 'A. Majumder, M. M Rahman, A. A. Biswas, M. S. Zulfiker, and S. Basak, “Stock Market Prediction: A Time Series\n            Analysis,” Third International Conference on Smart Systems: Innovations in Computing (SSIC 2021), Springer,\n            2021. [Scopus Indexed]', 'Conference Proceedings', 16),
(41, NULL, NULL, '20', 'A. Nawar, N. K. Sabuz, S. M. T. Siddiquee, M. Rabbani, A. A. Biswas, and A. Majumder, “Skin Disease\n            Recognition: A Machine Vision Based Approach,” 2021 International Conference on Advanced Computing and\n            Communication Systems (ICACCS), IEEE, 2021. [Scopus Indexed]', 'Conference Proceedings', 17),
(42, NULL, NULL, '20', 'J. Biswas, M. M. Rahman, A. A. Biswas, M. A. Z. Khan, A. Rajbongshi and H. A. Niloy, “Sentiment Analysis on\n            User Reaction for Online Food Delivery Services using BERT Model,” 2021 International Conference on Advanced\n            Computing and Communication Systems (ICACCS), IEEE, 2021. [Scopus Indexed]', 'Conference Proceedings', 18),
(43, NULL, NULL, '20', 'A. A. Biswas, M. M. Rahman, A. Rajbongshi, and A. Majumder, “Recognition of Local Birds using Different CNN\n            Architectures with Transfer Learning,” In 2021 International Conference on Computer Communication and\n            Informatics (ICCCI 2021), IEEE, 2021. [Scopus Indexed]', 'Conference Proceedings', 19),
(44, NULL, NULL, '20', 'M. M. Rahman, M. A. Z. Khan, and A. A. Biswas, “Bangla News Classification using Graph Convolutional\n            Networks,” In 2021 International Conference on Computer Communication and Informatics(ICCCI 2021), IEEE,\n            2021. [Scopus Indexed]', 'Conference Proceedings', 20),
(45, NULL, NULL, '20', 'S. Basak, F. F. Nandiny, S. M. M. H. Chowdhury, and A. A. Biswas, “Gesture-based Smart Wheelchair for\n            Assisting Physically Challenged People,” In 2021 International Conference on Computer Communication and\n            Informatics (ICCCI 2021), IEEE, 2021.   [Scopus Indexed]', 'Conference Proceedings', 21),
(46, NULL, NULL, '20', 'A. A. Biswas, A. Majumder, M. J Mia, R. Basri, and M. S. Zulfiker, “Career Prediction with Analysis of Influential\n            Factors Using Data Mining in the Context of Bangladesh,” In Second International Conference on Trends in\n            Computational and Cognitive Engineering (TCCE-2020), Advances in Intelligent Systems and Computing, Vol\n            1309, pp. 441-451, Springer, 2020. [Scopus Indexed]', 'Conference Proceedings', 22),
(47, NULL, NULL, '20', 'M. M. Rahman, R. Sadik, and A. A. Biswas, “Bangla Document Classification Using Character Level Deep\n            Learning,” In 4th International Symposium on Multidisciplinary Studies and Innovative Technologies, IEEE, 2020.\n            [Scopus Indexed]', 'Conference Proceedings', 23),
(48, NULL, NULL, '20', 'A. A. Biswas, M. J. Mia, and A. Majumder, &quot;Forecasting the Number of Road Accidents and Casualties using\n            Random Forest Regression in the Context of Bangladesh,&quot; In 10th International Conference on Computing,\n            Communication and Networking Technologies (ICCCNT), IEEE, pp. 1-5, 2019. [DBLP and Scopus Indexed]', 'Conference Proceedings', 24),
(49, NULL, NULL, '20', 'A. A. Biswas and S. Basak, &quot;Forecasting the Trends and Patterns of Crime in Bangladesh using Machine Learning\n            Model,&quot; In 2 nd International Conference on Intelligent Communication and Computational Techniques (ICCT),\n            IEEE, pp. 115-119, 2019. [Scopus Indexed]', 'Conference Proceedings', 25),
(50, NULL, NULL, '30', 'Tahsin, N. and Sakib, K., 2022, December. Refactoring Community Smells: An Empirical Study on the Software Practitioners of Bangladesh. In 2022 29th Asia-Pacific Software Engineering Conference (APSEC) (pp. 422-426). IEEE.', 'Conference Proceedings', 1),
(51, NULL, NULL, '30', 'Tahsin, N. and Sakib, K., 2023, May. Exploring Community Smell Co-occurrences in the Context of Bangladesh: An Empirical Study. In 2023 IEEE/ACM 11th International Workshop on Software Engineering for Systems-of-Systems and Software Ecosystems (SESoS) (pp. 22-29). IEEE.', 'Conference Proceedings', 2),
(52, NULL, NULL, '30', 'Tahsin, N., Hasan, M.A., Islam, R. and Sakib, K., 2023, May. Cognitive Distance and Women in Software Engineering: An Empirical Study in the Context of Bangladesh. In<i> 2023 IEEE/ACM 4th Workshop on Gender Equity, Diversity, and Inclusion in Software Engineering (GEICSE)</i> (pp. 1-8). IEEE.\n        ', 'Conference Proceedings', 3),
(53, NULL, NULL, '40', '<b>Md. Sabab Zulfiker</b>, Nasrin Kabir, Al Amin Biswas, and Partha Chakraborty, “Predicting Insomnia Using Multilayer Stacked Ensemble Model,” in Advances in Computing and Data Sciences, vol. 1440, M. Singh, V. Tyagi, P. K. Gupta, J. Flusser, T. Ören, and V. R. Sonawane, Eds. Cham: Springer International Publishing, 2021, pp. 338–350. doi: 10.1007/978-3-030-81462-5_31.', 'Conference Proceedings', 1),
(54, NULL, NULL, '40', '<b>Md. Sabab Zulfiker,</b> Nasrin Kabir, Hafsa Moontari Ali, Mohammad Reduanul Haque, Morium Akter, and Mohammad Shorif Uddin, “Sentiment Analysis Based on Users’ Emotional Reactions About Ride-Sharing Services on Facebook and Twitter,” in Proceedings of International Joint Conference on Computational Intelligence, M. S. Uddin and J. C. Bansal, Eds. Singapore: Springer Singapore, 2020, pp. 397–408. doi: 10.1007/978-981-15-3607-6_32.', 'Conference Proceedings', 2),
(55, NULL, NULL, '40', 'Al Amin Biswas,<b> Md. Sabab Zulfiker</b>, Aditya Rajbongshi, Md. Jueal Mia, and Anup Majumder, “Feature Ranking Based Carrot Disease Recognition Using MIFS Method,” in Hybrid Intelligent Systems, vol. 420, A. Abraham, P. Siarry, V. Piuri, N. Gandhi, G. Casalino, O. Castillo, and P. Hung, Eds. Cham: Springer International Publishing, 2022, pp. 56–68. doi: 10.1007/978-3-030-96305-7_6. ', 'Conference Proceedings', 3),
(56, NULL, NULL, '40', 'Anup Majumder, Md. Mahbubur Rahman, Al Amin Biswas, <b>Md. Sabab Zulfiker</b>, and Sarnali Basak, “Stock Market Prediction: A Time Series Analysis,” in Smart Systems: Innovations in Computing, vol. 235, A. K. Somani, A. Mundra, R. Doss, and S. Bhattacharya, Eds. Singapore: Springer Singapore, 2022, pp. 389–401. doi: 10.1007/978-981-16-2877-1_35.', 'Conference Proceedings', 4),
(57, NULL, NULL, '40', 'Al Amin Biswas, Anup Majumder, Md. Jueal Mia, Rabeya Basri, and <b>Md. Sabab Zulfiker,</b> “Career Prediction with Analysis of Influential Factors Using Data Mining in the Context of Bangladesh,” in Proceedings of International Conference on Trends in Computational and Cognitive Engineering, vol. 1309, M. S. Kaiser, A. Bandyopadhyay, M. Mahmud, and K. Ray, Eds. Singapore: Springer Singapore, 2021, pp. 441–451. doi: https://doi.org/10.1007/978-981-33-4673-4_35. ', 'Conference Proceedings', 5),
(58, NULL, NULL, '40', 'Partha Chakraborty, Sabakun Nahar Tafhim, Mahmuda Khatun, Md. Abu Sayed, <b>Sabab Zulfiker,</b> Priyanka Paul, Md. Farhad Hossain, Tanupriya Choudhury, (2022). Detection of Copy–Move Image Forgery Applying Robust Matching with K-D Tree Sorting. In: Gupta, D., Goswami, R.S., Banerjee, S., Tanveer, M., Pachori, R.B. (eds) Pattern Recognition and Data Analysis with Applications. Lecture Notes in Electrical Engineering, vol 888. Springer, Singapore. https://doi.org/10.1007/978-981-19-1520-8_22 .', 'Conference Proceedings', 6),
(59, NULL, NULL, '40', 'Minhaz Uddin Emon, Maria Sultana Keya, Md. Salman Kaiser, Md. Ariful islam, Tabassum Tanha<b>, Md. Sabab Zulfiker,</b> “Primary Stage of Diabetes Prediction using Machine Learning Approaches,” in 2021 International Conference on Artificial Intelligence and Smart Systems (ICAIS), Coimbatore, India, Mar. 2021, pp. 364–367. doi: https://doi.org/10.1109/ICAIS50930.2021.9395968', 'Conference Proceedings', 7),
(60, NULL, NULL, '40', 'Maria Sultana Keya, Himu Akter, Md. Atiqur Rahman, Md. Mahbobur Rahman, Minhaz Uddin Emon, and <b>Md. Sabab Zulfiker,</b> “Comparison of Different Machine Learning Algorithms for Detecting Bankruptcy,” in 2021 6th International Conference on Inventive Computation Technologies (ICICT), Coimbatore, India, Jan. 2021, pp. 705–712. doi: 10.1109/ICICT50816.2021.9358587.', 'Conference Proceedings', 8),
(61, NULL, NULL, '40', 'Md Robiul Islam, Tanjina Nur Jeba, <b>Md Sabab Zulfiker</b>, Mirza Shahriyar Rahman, Mokhlesur Rahman, “Analyzing the ML and DL-based Models for Predicting Malarial Fever Prior to Clinical Trial,” in 2023 7th International Conference on Trends in Electronics and Informatics (ICOEI), Tirunelveli, India, 2023, pp. 1040-1045, doi: 10.1109/ICOEI56765.2023.10126059', 'Conference Proceedings', 9),
(62, NULL, NULL, '40', 'Mushfiqur Rahman, Md Faridul Islam Suny, Jerin Tasnim,<b> Md Sabab Zulfiker,</b> Mohammad Jahangir Alam, Tajim Md Niamat Ullah Akhund (2023), “IoT and ML Based Approach for Highway Monitoring and Streetlamp Controlling,” In: Satu, M.S., Moni, M.A., Kaiser, M.S., Arefin, M.S. (eds) Machine Intelligence and Emerging Technologies. MIET 2022. Lecture Notes of the Institute for Computer Sciences, Social Informatics and Telecommunications Engineering, vol 491. Springer, Cham. https://doi.org/10.1007/978-3-031-34622-4_30.', 'Conference Proceedings', 10);

-- --------------------------------------------------------

--
-- Table structure for table `question_banks`
--

CREATE TABLE `question_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `exam_year` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `degree_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research_profiles`
--

INSERT INTO `research_profiles` (`id`, `user`, `title`, `created_at`, `updated_at`, `rank`) VALUES
(1, '20', 'ResearchGate Profile: <a href=\"https://www.researchgate.net/profile/Al_Amin_Biswas\" target=\"_blank\" style=\"text-decoration: underline; color:#0000EE\">https://www.researchgate.net/profile/Al_Amin_Biswas</a>', NULL, NULL, 1),
(2, '20', 'Google Scholar Profile: <a href=\"https://scholar.google.com/citations?hl=en&view_op=&user=JiaLPHwAAAAJ\" target=\"_blank\" style=\"text-decoration: underline; color:#0000EE\">https://scholar.google.com/citations?hl=en&view_op=&user=JiaLPHwAAAAJ</a>', NULL, NULL, 2),
(3, '20', 'ORCID ID: <a href=\"https://orcid.org/0000-0002-1354-3042\" target=\"_blank\" style=\"text-decoration: underline; color:#0000EE\">https://orcid.org/0000-0002-1354-3042</a>', NULL, NULL, 3),
(4, '20', 'Scopus ID: <a href=\"https://www.scopus.com/authid/detail.uri?authorId=57211300215\" target=\"_blank\" style=\"text-decoration: underline; color:#0000EE\">https://www.scopus.com/authid/detail.uri?authorId=57211300215</a>', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` int(5) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `year` varchar(1000) DEFAULT NULL,
  `file` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Swapnil Biswas', '10', 'Algorithms', NULL, NULL, 'swapnil.cse16@gmail.com', NULL, 'temp.png', 'admin', 'inactive', '01759957277', '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lecturer', '', NULL, NULL, NULL, NULL, 'Teacher', 1, 'Teacher', 'swapnil.cse16@gmail.com'),
(2, 'Al Amin Biswas', '20', 'Machine Learning, Deep Learning, NLP, Explainable AI.', NULL, NULL, 'alaminbiswas.cse@gmail.com', NULL, 'temp.png', 'admin', 'inactive', 'N/A', '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lecturer', 'Incharge of Sports', NULL, NULL, NULL, NULL, 'Teacher', 2, 'Teacher', 'alaminbiswas.cse@gmail.com'),
(3, 'Noshin Tahsin', '30', 'Software Engineering, Human-Computer Interaction, Human-Centered Computing, Responsible AI', NULL, NULL, 'noshintahsin914@gmail.com', NULL, 'temp.png', 'admin', 'inactive', '01882959157', '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lecturer', 'Assistant Proctor (Acting)', NULL, NULL, NULL, NULL, 'Teacher', 3, 'Teacher', 'noshintahsin914@gmail.com'),
(4, 'Md. Sabab Zulfiker', '40', 'Machine Learning, Deep Learning, Natural Language Processing (NLP), Computer Vision, Image Processing.\n\n', NULL, NULL, 'sabab.bsmru@gmail.com', NULL, 'temp.png', 'admin', 'inactive', '01716033198', '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lecturer', '', NULL, NULL, NULL, NULL, 'Teacher', 4, 'Teacher', 'sabab.bsmru@gmail.com'),
(5, 'Dablu Lasker', '50', NULL, NULL, NULL, 'dip.du66@gmail.com', NULL, 'temp.png', 'false', 'inactive', '01754834564', '$2y$10$1OMlHpheoBqHIcIDdE5b9e8oIkE.mu7AcnBvgcprIJn9ENVB5o85m', 'Lab Technician', NULL, NULL, NULL, NULL, NULL, 'Staff', 1, 'Staff', 'dip.du66@gmail.com');

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
-- Indexes for table `question_banks`
--
ALTER TABLE `question_banks`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dept_attributes`
--
ALTER TABLE `dept_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `other_experiences`
--
ALTER TABLE `other_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `question_banks`
--
ALTER TABLE `question_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_profiles`
--
ALTER TABLE `research_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
