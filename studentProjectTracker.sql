-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 04:09 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentprojecttracker`
--
CREATE DATABASE IF NOT EXISTS `studentprojecttracker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studentprojecttracker`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin Guy', 'datguy@admin.com', '$2y$10$kkwsWIUexQLjoHRGwnE5F.HKPSyTOtWQv6nlBn1t/2I9CtOOLMmVK', NULL, '2017-04-19 23:05:37', '2017-04-19 23:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `project_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '8i87i', '2017-04-20 23:17:19', '2017-04-20 23:17:19'),
(2, 3, 2, 'fhbnghn', '2017-04-20 23:24:11', '2017-04-20 23:24:11'),
(3, 1, 2, 'ynyun', '2017-04-20 23:33:54', '2017-04-20 23:33:54'),
(4, 1, 2, 'yhytyhtyh', '2017-04-20 23:38:46', '2017-04-20 23:38:46'),
(5, 1, 1, 'ferferferfef', '2017-04-21 00:17:38', '2017-04-21 00:17:38'),
(6, 1, 2, 'rtgtrg', '2017-04-21 00:35:20', '2017-04-21 00:35:20'),
(7, 2, 2, 'refefref', '2017-04-21 00:36:14', '2017-04-21 00:36:14'),
(8, 2, 2, 'rgertg', '2017-04-21 00:38:32', '2017-04-21 00:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(51, '2014_10_12_000000_create_users_table', 1),
(52, '2014_10_12_100000_create_password_resets_table', 1),
(53, '2017_04_16_213117_create_projects_table', 1),
(54, '2017_04_18_005824_create_comments_table', 1),
(55, '2017_04_19_023819_create_tags_table', 2),
(56, '2017_04_19_023819_create_students_table', 3),
(57, '2017_04_19_164840_create_admins_table', 4),
(58, '2017_04_21_014315_create_project_files_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('datguy@admin.com', '$2y$10$2jMeMWybIKyEQ0vd81/rjeHRmVXFRdrhm8FEXgHQWM2ryEACB/Voq', '2017-04-20 01:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `collaborators` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_completed` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `rejection_reasons` longtext COLLATE utf8mb4_unicode_ci,
  `pending` tinyint(1) NOT NULL DEFAULT '1',
  `github` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `description`, `collaborators`, `tags`, `course_code`, `year_completed`, `approved`, `rejection_reasons`, `pending`, `github`, `created_at`, `updated_at`) VALUES
(1, 1, 'Go-ceries', 'a online grocery app', 'TSM', NULL, 'INFO3490', 3454, 1, NULL, 0, 'go-ceries.firebaseapp.com', '2017-04-19 00:19:55', '2017-04-19 00:19:55'),
(2, 2, 'Junk Trades', 'an item trading app', 'Traders', NULL, 'INFO3490', 6456, 1, NULL, 0, 'junktrades.com', '2017-05-19 00:34:47', '2017-04-20 10:19:14'),
(3, 1, 'Sports Junkies', 'a sports news app', 'Junkies', NULL, 'INFO3490', 4656, 0, NULL, 1, 'sportsjunkies.com', '2016-05-19 00:35:02', '2017-04-19 00:35:02'),
(4, 1, 'Student Project Tracker', 'a app for tracking student projects', 'peeeps', NULL, 'INFO 3490', 2017, 0, NULL, 1, 'studentprojecttracker.com', '2017-04-19 03:28:41', '2017-04-19 03:28:41'),
(40, 1, 'Test Project', 'a testing for tags and collabs', NULL, NULL, 'info 3410', 2017, 1, NULL, 0, 'github', '2017-04-21 05:01:58', '2017-04-21 05:14:35'),
(41, 1, 'my project', 'some stuff', NULL, NULL, 'info390000', 2017, 1, NULL, 0, 'd link', '2017-04-21 05:28:31', '2017-04-21 05:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_tag`
--

CREATE TABLE `project_tag` (
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `project_tag`
--

INSERT INTO `project_tag` (`project_id`, `tag_id`) VALUES
(1, 2),
(1, 3),
(2, 4),
(4, 1),
(40, 14),
(40, 15),
(40, 16),
(41, 17),
(41, 18);

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`user_id`, `project_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(1, 40),
(1, 41),
(2, 40),
(2, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'laravel', '2017-04-19 21:33:37', '2017-04-19 21:33:37'),
(2, 'vue', '2017-04-19 21:33:37', '2017-04-19 21:33:37'),
(3, 'javascript', '2017-04-19 21:33:48', '2017-04-19 21:33:48'),
(4, 'php', '2017-04-19 21:33:48', '2017-04-19 21:33:48'),
(5, 'angular', '2017-04-19 21:47:02', '2017-04-19 21:47:02'),
(6, 'slim', '2017-04-19 21:47:02', '2017-04-19 21:47:02'),
(14, 'test', '2017-04-21 05:01:58', '2017-04-21 05:01:58'),
(15, 'tags', '2017-04-21 05:01:58', '2017-04-21 05:01:58'),
(16, 'collabs', '2017-04-21 05:01:58', '2017-04-21 05:01:58'),
(17, 'dope', '2017-04-21 05:28:31', '2017-04-21 05:28:31'),
(18, 'swag', '2017-04-21 05:28:31', '2017-04-21 05:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Feng', 'Feng@lol.com', '$2y$10$Y9u/EnHjwAWeJDcJ8teh8.AQ3DU5xBqeBnneHP25vO8ZFW5XbMPpG', 'yyBp5c9RDJI07aUDPm8WNeGLYzdD3Fke0JHsmCPGQx4fE3Ss8srtWHUTLtwi', '2017-04-19 00:17:14', '2017-04-19 00:17:14'),
(2, 'john cena', 'john@cena.com', '$2y$10$YvVXEvwn0pGzjbkhFc/wMuFQPkBmvDBhDNtt1qT5OCt3Tt9F8Zw9K', 'VTr9VTDSUzczUdSBwShN6CCg8D0qlLvl4ET3zBpO2Nrzw3RwaREHgwDFUUl5', '2017-04-19 00:41:47', '2017-04-19 00:41:47'),
(3, 'rgfertg', 'dgtrg@lol.com', '$2y$10$HNhfQozLKolgAQbB93gPE.vG6HwiawP.sQhD4jssLpfSKVfxklkUe', 'ehihXLfbqGZJc5IKVlXhhVCqS3UXO21HfMX2dbdeR0FFXyi2ItD0Vua2tjII', '2017-04-20 22:30:54', '2017-04-20 22:30:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_files`
--
ALTER TABLE `project_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_files_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_tag`
--
ALTER TABLE `project_tag`
  ADD PRIMARY KEY (`project_id`,`tag_id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`user_id`,`project_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `project_files`
--
ALTER TABLE `project_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_files`
--
ALTER TABLE `project_files`
  ADD CONSTRAINT `project_files_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
