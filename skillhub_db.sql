-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2025 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillhub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Coffee 101', 'Learning the basics of Coffee Origin, Process, and Varietals.', 'Beginner', '2025-11-22 02:38:10', '2025-11-22 02:38:10'),
(2, 'Coffee 201', 'Learning the basics of Coffee Extraction, Equipments, and Methods', 'Beginner', '2025-11-22 02:38:35', '2025-11-22 02:38:35'),
(3, 'Sensory Training', 'Learning the basics of Coffee Flavor Wheel & Sensory Principles (Flavor, Aroma, Body)', 'Beginner', '2025-11-22 02:39:55', '2025-11-22 02:39:55'),
(4, 'SCA CVA Cupping', 'Learning the Newest Cupping protocol (CVA) based on the Specialty Coffee Association', 'Intermediate', '2025-11-22 02:40:31', '2025-11-22 02:40:31'),
(5, 'Manual Brewing', 'Learning Manual Brewing', 'Intermediate', '2025-11-22 02:41:41', '2025-11-22 02:41:41'),
(6, 'Espresso', 'Learning Espresso Extraction & Variables', 'Intermediate', '2025-11-22 02:42:02', '2025-11-22 02:42:02'),
(7, 'SOUP', 'Spro Only UnPressurized', 'Advanced', '2025-11-22 02:42:16', '2025-11-22 02:42:16'),
(8, 'Coffee Roasting', 'Learning Coffee Origin, Roast level. Reading Roast Curves', 'Advanced', '2025-11-22 02:43:37', '2025-11-22 02:43:37'),
(9, 'Competition Brewing', 'Learning what is expected when joining Brewing Competition', 'Advanced', '2025-11-22 04:14:38', '2025-11-22 04:14:38'),
(10, 'Brewing Different Roast Levels', 'In depth explanation on Brewing Different Roast levels using Measurements and Metrics', 'Intermediate', '2025-11-22 04:17:51', '2025-11-22 04:17:51'),
(11, 'SCA Judge Certification', 'Certication for Brewing, Barista, Latte Art, Coffee in Good Spirits Competition', 'Advanced', '2025-11-22 04:24:22', '2025-11-22 04:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `course_participant`
--

CREATE TABLE `course_participant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participant_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `enrolled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_participant`
--

INSERT INTO `course_participant` (`id`, `participant_id`, `course_id`, `enrolled_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-11-22 02:49:31', '2025-11-22 02:49:31', '2025-11-22 02:49:31'),
(2, 1, 2, '2025-11-22 02:49:35', '2025-11-22 02:49:35', '2025-11-22 02:49:35'),
(3, 1, 5, '2025-11-22 02:49:45', '2025-11-22 02:49:45', '2025-11-22 02:49:45'),
(4, 3, 6, '2025-11-22 02:50:00', '2025-11-22 02:50:00', '2025-11-22 02:50:00'),
(5, 3, 7, '2025-11-22 02:50:04', '2025-11-22 02:50:03', '2025-11-22 02:50:04'),
(6, 2, 1, '2025-11-22 02:50:18', '2025-11-22 02:50:18', '2025-11-22 02:50:18'),
(7, 2, 2, '2025-11-22 02:50:22', '2025-11-22 02:50:22', '2025-11-22 02:50:22'),
(8, 2, 5, '2025-11-22 02:50:26', '2025-11-22 02:50:26', '2025-11-22 02:50:26'),
(9, 2, 4, '2025-11-22 02:50:30', '2025-11-22 02:50:30', '2025-11-22 02:50:30'),
(10, 4, 2, '2025-11-22 02:50:45', '2025-11-22 02:50:45', '2025-11-22 02:50:45'),
(11, 4, 4, '2025-11-22 02:50:50', '2025-11-22 02:50:50', '2025-11-22 02:50:50'),
(12, 4, 3, '2025-11-22 02:50:54', '2025-11-22 02:50:54', '2025-11-22 02:50:54'),
(13, 4, 8, '2025-11-22 02:50:59', '2025-11-22 02:50:59', '2025-11-22 02:50:59'),
(14, 3, 5, '2025-11-22 04:01:46', '2025-11-22 04:01:46', '2025-11-22 04:01:46'),
(15, 5, 1, '2025-11-22 04:21:53', '2025-11-22 04:21:53', '2025-11-22 04:21:53'),
(16, 5, 2, '2025-11-22 04:21:57', '2025-11-22 04:21:57', '2025-11-22 04:21:57'),
(17, 5, 9, '2025-11-22 04:22:08', '2025-11-22 04:22:08', '2025-11-22 04:22:08'),
(18, 5, 5, '2025-11-22 04:22:17', '2025-11-22 04:22:17', '2025-11-22 04:22:17'),
(19, 6, 1, '2025-11-22 04:22:33', '2025-11-22 04:22:33', '2025-11-22 04:22:33'),
(20, 6, 5, '2025-11-22 04:22:41', '2025-11-22 04:22:41', '2025-11-22 04:22:41'),
(21, 6, 10, '2025-11-22 04:22:46', '2025-11-22 04:22:46', '2025-11-22 04:22:46'),
(22, 6, 9, '2025-11-22 04:22:51', '2025-11-22 04:22:51', '2025-11-22 04:22:51'),
(23, 7, 3, '2025-11-22 04:25:00', '2025-11-22 04:25:00', '2025-11-22 04:25:00'),
(24, 7, 5, '2025-11-22 04:25:05', '2025-11-22 04:25:05', '2025-11-22 04:25:05'),
(25, 7, 6, '2025-11-22 04:25:17', '2025-11-22 04:25:17', '2025-11-22 04:25:17'),
(26, 7, 1, '2025-11-22 04:25:25', '2025-11-22 04:25:25', '2025-11-22 04:25:25'),
(27, 7, 2, '2025-11-22 04:25:31', '2025-11-22 04:25:31', '2025-11-22 04:25:31'),
(28, 7, 11, '2025-11-22 04:25:40', '2025-11-22 04:25:40', '2025-11-22 04:25:40'),
(29, 1, 3, '2025-11-22 04:26:05', '2025-11-22 04:26:05', '2025-11-22 04:26:05'),
(30, 3, 1, '2025-11-22 04:27:41', '2025-11-22 04:27:41', '2025-11-22 04:27:41'),
(31, 1, 10, '2025-11-22 04:29:01', '2025-11-22 04:29:01', '2025-11-22 04:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_22_070541_create_participants_table', 2),
(5, '2025_11_22_070753_create_courses_table', 2),
(6, '2025_11_22_070817_create_course_participant_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Kimi Harisen', 'kimi@email.com', '081234556789', '2025-11-22 02:15:57', '2025-11-22 02:15:57'),
(2, 'Brian Quan', 'NTBQ@email.com', '089876554321', '2025-11-22 02:17:25', '2025-11-22 02:17:25'),
(3, 'Lance Hedrick', 'lancehedrick@email.com', '080808080808', '2025-11-22 02:18:20', '2025-11-22 02:18:20'),
(4, 'Jiyoon Han', 'bean2bean@email.com', '084269159000', '2025-11-22 02:43:08', '2025-11-22 02:43:08'),
(5, 'Martin Wolfl', 'martinwolfl@email.com', '081111190909', '2025-11-22 04:13:13', '2025-11-22 04:13:13'),
(6, 'Ryan Wibawa', 'ryanwibawa@email.com', '084513801922', '2025-11-22 04:13:49', '2025-11-22 04:13:49'),
(7, 'Christ Hartono', 'sebenzacoffee@email.com', '089245611887', '2025-11-22 04:24:47', '2025-11-22 04:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EgRLLkCwjdjPBBkHDNsavlQ0eSCRFIRrC5a4BnPa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQk1jdHVMUkNxa1hraktrbnY1NXJXTEdtRjhnbzgzbUh0YjBjbVhRZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXJ0aWNpcGFudHMiO3M6NToicm91dGUiO3M6MTg6InBhcnRpY2lwYW50cy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1763885446),
('hKIWY7hAODLug78zeQRLRtBNDLnIGMYEc3XA0HxP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFZ6OXdONFdCMzNERVZuWmVjUUJVVUZTY0VZanJXcUR2NnluSnpnTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb3Vyc2VzIjtzOjU6InJvdXRlIjtzOjEzOiJjb3Vyc2VzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1763874933),
('WzpooIggQh8fuj6YnSNeA9hvzIceMyEIaPPYMBB2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1NDSWJMc2QySk1MOHhVc2tlQ1VDRDFQd01wQ3VBNm1iZFpta01MUSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXJ0aWNpcGFudHMvNyI7czo1OiJyb3V0ZSI7czoxNzoicGFydGljaXBhbnRzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1763838707);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_participant`
--
ALTER TABLE `course_participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_participant_participant_id_foreign` (`participant_id`),
  ADD KEY `course_participant_course_id_foreign` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `participants_email_unique` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course_participant`
--
ALTER TABLE `course_participant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_participant`
--
ALTER TABLE `course_participant`
  ADD CONSTRAINT `course_participant_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_participant_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
