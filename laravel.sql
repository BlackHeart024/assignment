-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 10:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_id` bigint(255) UNSIGNED NOT NULL,
  `d_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `submission_d_t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `assignment_name`, `t_id`, `d_id`, `semester`, `submission_d_t`, `created_at`, `updated_at`) VALUES
(9, 'Android', 1, 4, 6, '2023-04-22 18:30:00', '2023-04-16 11:04:51', '2023-04-16 11:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_statuses`
--

CREATE TABLE `assignment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `a_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `marks_obtain` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignment_statuses`
--

INSERT INTO `assignment_statuses` (`id`, `student_id`, `a_id`, `status`, `marks_obtain`, `created_at`, `updated_at`) VALUES
(15, 1, 9, 1, NULL, '2023-04-16 11:05:26', '2023-04-16 11:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(10) NOT NULL,
  `d_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` bigint(20) UNSIGNED NOT NULL,
  `a_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marks_contain` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `a_id`, `question`, `marks_contain`, `created_at`, `updated_at`) VALUES
(10, 9, 'What is Android?', 10, '2023-04-16 11:04:51', '2023-04-16 11:04:51'),
(11, 9, 'What is SDK?', 10, '2023-04-16 11:04:51', '2023-04-16 11:04:51'),
(12, 9, 'What is APK?', 10, '2023-04-16 11:04:51', '2023-04-16 11:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `roll_no`, `d_id`, `semester`, `gender`, `Address`, `password`, `dob`, `created_at`, `updated_at`) VALUES
(1, 'Chintan Kishorbhai Patel', 'chintan@mail.com', '16', 4, 6, 'M', '204/B, Amardham apt., Tithal road, ValsadValsad', '$2y$10$YM0PIwLgAjQc.LvRwugsuejRKDSWi0DojTtdTbOEC1vtrq42df052', '2023-03-01', '2023-02-28 23:06:29', '2023-02-28 23:06:56'),
(2, 'Chintan Kishorbhai Patel', 'chintan15@mail.com', '15', 4, 6, 'M', '204/B, Amardham apt., Tithal road, ValsadValsad', '$2y$10$aHZxraTuVwGpxGMW5ovI0eW8FzmTCMpIx2uEzd8D0j2TQHsuRF4Ou', '2023-04-13', '2023-04-13 10:20:24', '2023-04-13 10:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `sub_ans`
--

CREATE TABLE `sub_ans` (
  `ans_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `answers` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_ans`
--

INSERT INTO `sub_ans` (`ans_id`, `student_id`, `question_id`, `assignment_id`, `answers`, `created_at`, `updated_at`) VALUES
(134, 1, 10, 9, '', '2023-04-16 11:05:26', '2023-04-16 11:05:26'),
(135, 1, 11, 9, '', '2023-04-16 11:05:26', '2023-04-16 11:05:26'),
(136, 1, 12, 9, '', '2023-04-16 11:05:26', '2023-04-16 11:05:26'),
(137, 1, 0, 9, 'Project documentation.pdf-1681662926.pdf', '2023-04-16 11:05:26', '2023-04-16 11:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_id` bigint(20) UNSIGNED NOT NULL,
  `t_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t_d_id` int(11) NOT NULL,
  `t_gender` enum('M','F','O') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `t_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_id`, `t_name`, `t_email`, `t_d_id`, `t_gender`, `t_address`, `t_password`, `dob`, `updated_at`, `created_at`) VALUES
(1, 'Chintan Kishorbhai Patel', 'admin@mail.com', 4, 'M', '204/B, Amardham apt., Tithal road, Valsad\r\nValsad', '$2y$10$S0Mx7wUD2Q2sOtgEwsDMtu9k7hoZ.Rco1xbPydeutp36F0Bmq3.aS', '2023-03-01', '2023-02-28 22:40:51', '2023-02-28 22:40:51'),
(2, 'Chintan Patel', 'admin15@mail.com', 4, 'M', '204/B, Amardham apt., Tithal road, Valsad\r\nValsad', '$2y$10$Cp5GY6lMjoswhzbPN.MiZ.UmtKYoXOMmTSAu19zzdrIys5MgINr0O', '2023-04-13', '2023-04-13 10:22:17', '2023-04-13 10:22:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_foreign` (`d_id`);

--
-- Indexes for table `assignment_statuses`
--
ALTER TABLE `assignment_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_statuses_student_id_foreign` (`student_id`),
  ADD KEY `assignment_statuses_a_id_foreign` (`a_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `asignment_foreign` (`a_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_foreign` (`d_id`);

--
-- Indexes for table `sub_ans`
--
ALTER TABLE `sub_ans`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `student_foreign` (`student_id`),
  ADD KEY `question_foreign` (`question_id`),
  ADD KEY `assignment_foreign` (`assignment_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `department_foreign` (`t_d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assignment_statuses`
--
ALTER TABLE `assignment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_ans`
--
ALTER TABLE `sub_ans`
  MODIFY `ans_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `t_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
