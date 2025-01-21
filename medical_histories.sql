-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 11:35 AM
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
-- Table structure for table `medical_histories`
--

CREATE TABLE `medical_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultation_date` date NOT NULL,
  `past_medical_history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_medications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_for_visit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allergies` tinyint(1) NOT NULL DEFAULT 0,
  `allergy_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `health_rating` int(11) NOT NULL,
  `family_history` tinyint(1) NOT NULL DEFAULT 0,
  `family_history_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exercise` tinyint(1) NOT NULL DEFAULT 0,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_histories`
--

INSERT INTO `medical_histories` (`id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `doctor_first_name`, `doctor_last_name`, `consultation_date`, `past_medical_history`, `current_medications`, `reason_for_visit`, `allergies`, `allergy_details`, `health_rating`, `family_history`, `family_history_details`, `exercise`, `comments`, `created_at`, `updated_at`) VALUES
(1, 'Raza', 'S', '2021-06-04', 'Female', 'Maryam', 'naeem', '2024-11-14', 'null', 'null', 'Check-up', 0, 'null', 2, 0, NULL, 1, 'no', '2024-11-14 10:21:12', '2024-11-14 10:21:12'),
(2, 'Maryam', 'Raza', '2000-03-14', 'Female', 'Dr. Maryam', 'Naeem', '2024-11-27', 'null', 'complicated', 'Follow-up', 0, 'null', 2, 0, 'null', 0, 'null', '2024-11-28 11:07:52', '2024-11-28 11:07:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_histories`
--
ALTER TABLE `medical_histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_histories`
--
ALTER TABLE `medical_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
