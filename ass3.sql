-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2023 at 03:48 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ass3`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `assignment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_id` bigint(255) UNSIGNED NOT NULL,
  `d_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `submission_d_t` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dep_foreign` (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `assignment_name`, `t_id`, `d_id`, `semester`, `submission_d_t`, `created_at`, `updated_at`) VALUES
(9, 'Assignment1', 1, 4, 2, '2023-01-31 02:34:24', NULL, '2022-12-26 22:27:22'),
(10, 'Assignment2', 1, 4, 2, '2022-12-29 02:34:24', NULL, NULL),
(11, 'Assignment3', 1, 4, 2, '2022-12-25 02:37:27', NULL, NULL),
(12, 'Assignment4', 1, 1, 2, '2022-12-30 02:37:27', NULL, NULL),
(13, 'Assignment5', 1, 4, 2, '2022-12-29 02:39:16', NULL, NULL),
(14, 'Assignment-6', 1, 4, 2, '2023-01-31 06:53:56', NULL, NULL),
(15, 'assignment7', 1, 4, 2, '2023-01-26 15:45:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_statuses`
--

DROP TABLE IF EXISTS `assignment_statuses`;
CREATE TABLE IF NOT EXISTS `assignment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `a_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `marks_obtain` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignment_statuses_student_id_foreign` (`student_id`),
  KEY `assignment_statuses_a_id_foreign` (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignment_statuses`
--

INSERT INTO `assignment_statuses` (`id`, `student_id`, `a_id`, `status`, `marks_obtain`, `created_at`, `updated_at`) VALUES
(1, 3, 9, 1, NULL, '2023-01-19 09:59:58', '2023-01-19 09:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `d_id` int(10) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
(1, 'Physics'),
(2, 'Chemistry'),
(3, 'Math'),
(4, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_11_26_152900_create_students_table', 1),
(3, '2022_12_18_134500_departmant_table', 2),
(4, '2022_12_18_135332_student_table', 3),
(5, '2022_12_24_025337_create_assignments_table', 4),
(6, '2022_12_24_122506_create_questions_table', 5),
(7, '2022_12_25_153347_create_sub_ans_table', 6),
(8, '2022_12_25_155905_create_sub_ans_table', 7),
(9, '2023_01_17_060819_create_assignment_statuses_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marks_contain` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`q_id`),
  KEY `asignment_foreign` (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `a_id`, `question`, `marks_contain`, `created_at`, `updated_at`) VALUES
(1, 9, 'what is a+a = ?', 5, NULL, NULL),
(2, 9, 'what is a+a = ?', 5, NULL, NULL),
(3, 9, 'what is null?', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roll_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `d_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `gender` enum('M','F','O') COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_foreign` (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `roll_no`, `d_id`, `semester`, `gender`, `Address`, `password`, `dob`, `created_at`, `updated_at`) VALUES
(1, 'Biraj Khound', 'birajkhound@bk', '4', 4, 3, 'M', 'Joypur', '$2y$10$5WWi/6Ifzw.tyobjupqL9uaOnzO1pd4EmX7UZgPswySnVsjEKe4eG', '2022-12-19', '2022-12-18 08:46:05', '2022-12-19 12:32:02'),
(3, 'Madhurya Dutta', 'md@md', '1', 4, 2, 'M', 'Lakhimpur', '$2y$10$dVGh771LpM5fX7vGfojll.gKAQzJThgWBxZgrnlwFtBLtpMCfZJBC', '2022-12-19', '2022-12-19 12:35:46', '2022-12-24 03:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `sub_ans`
--

DROP TABLE IF EXISTS `sub_ans`;
CREATE TABLE IF NOT EXISTS `sub_ans` (
  `ans_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `answers` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ans_id`),
  KEY `student_foreign` (`student_id`),
  KEY `question_foreign` (`question_id`),
  KEY `assignment_foreign` (`assignment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_ans`
--

INSERT INTO `sub_ans` (`ans_id`, `student_id`, `question_id`, `assignment_id`, `answers`, `created_at`, `updated_at`) VALUES
(116, 3, 1, 9, '1', '2023-01-19 09:59:58', '2023-01-19 09:59:58'),
(117, 3, 2, 9, '2', '2023-01-19 09:59:58', '2023-01-19 09:59:58'),
(118, 3, 3, 9, '3', '2023-01-19 09:59:58', '2023-01-19 09:59:58'),
(119, 3, 0, 9, 'BCL-2023-CV-biraj.pdf-1674142198.pdf', '2023-01-19 09:59:58', '2023-01-19 09:59:58');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `dep_foreign` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assignment_statuses`
--
ALTER TABLE `assignment_statuses`
  ADD CONSTRAINT `assignment_statuses_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `assignments` (`id`),
  ADD CONSTRAINT `assignment_statuses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `asignment_foreign` FOREIGN KEY (`a_id`) REFERENCES `assignments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `department_foreign` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sub_ans`
--
ALTER TABLE `sub_ans`
  ADD CONSTRAINT `assignment_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
