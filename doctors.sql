-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 12:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mindflex`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `specialization`, `experience`, `phone`, `address`, `image`, `documents`, `notes`, `created_at`, `updated_at`) VALUES
(1, 4, '1', 1, '123-456-7898', '123456', '1726255214.jpg', '[\"1726255214_compleate resume.docx\"]', '98765', '2024-09-13 14:20:14', '2024-09-13 14:20:14'),
(2, 5, '2', 1, '123-456-7898', '098765', '1726255296.jpg', '[\"1726255296_23-CS-129.docx\"]', '12345678', '2024-09-13 14:21:36', '2024-09-13 14:21:36'),
(3, 7, '1', 6, '03122978533', 'brain and mind diagnosis rehabilatation centre, DHA phase 1, Karachi.', '1731598622.jpg', '[\"1731598622_ReactNative_Signup_Login_Pages_with_UI_Examples.pdf\"]', NULL, '2024-11-14 10:37:02', '2024-11-14 10:37:02'),
(4, 10, '1', 7, '03122978533', 'brain and mind diagnosis rehabilatation centre, DHA phase 1, Karachi.', '1733483864.jpg', '[\"1733483864_medical_history.pdf\"]', NULL, '2024-12-06 06:17:44', '2024-12-06 06:17:44'),
(5, 11, '2', 15, '03193316783', 'Plot No. C, 45 Street 24, Phase I Sector A Defence Housing Authority, Karachi', '1734949226.jpg', '[\"1734949226_Dr sadaj.docx\"]', NULL, '2024-12-23 05:20:26', '2024-12-23 05:20:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
