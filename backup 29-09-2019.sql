-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 05:46 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Branch` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Class` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `Branch`, `Class`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science And Engineering', 'SYCSEI', NULL, NULL),
(2, 'Computer Science And Engineering', 'SYCSEII', NULL, NULL),
(3, 'Computer Science And Engineering', 'TYCSEI', NULL, NULL),
(4, 'Computer Science And Engineering', 'TYCSEII', NULL, NULL),
(5, 'Computer Science And Engineering', 'BECSEI', NULL, NULL),
(6, 'Mechanical Engineering', 'SYMECH', NULL, NULL),
(7, 'Mechanical Engineering', 'TYMECH', NULL, NULL),
(8, 'Mechanical Engineering', 'BEMECH', NULL, NULL),
(9, 'Civil Engineering', 'SYCIVIL', NULL, NULL),
(10, 'Civil Engineering', 'TYCIVIL', NULL, NULL),
(11, 'Civil Engineering', 'BECIVIL', NULL, NULL),
(12, 'Information Technology', 'SYIT', NULL, NULL),
(13, 'Information Technology', 'TYIT', NULL, NULL),
(14, 'Information Technology', 'BEIT', NULL, NULL),
(15, 'Electronics And Telecommunications', 'SYETC', NULL, NULL),
(16, 'Electronics And Telecommunications', 'TYETC', NULL, NULL),
(17, 'Electronics And Telecommunications', 'BEETC', NULL, NULL),
(19, 'Computer Science And Engineering', 'BECSEII', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `Email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'root',
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`Email`, `password`, `user_type`, `created_at`, `updated_at`) VALUES
('29furkhanshaikh@gmail.com', '$2y$10$ZnduXhKmc5kP2ob2ozahnOEoItBFmWBY5n9eJRbtgD9HSh99CfVv.', 'student', NULL, NULL),
('abhishekbagate15898@gmail.com', '$2y$10$isCr4czAcwenFN/P3S4NIehAO1NjbVVxhwMrlpktsV9TBN5FeJfg.', 'student', NULL, NULL),
('akchapule@gmail.com', '$2y$10$Yln4kSOa6iMxRXVKEPS/Gu7H3GwLHmP4RL5cN0vAByT1Fhi1MTORO', 'student', NULL, NULL),
('missu@gmail.com', '$2y$10$ZOcvoy0tsf1xdlNBKDyxu.HnCP2VSEGYEhJGeNszTj/dF2ICe6Umm', 'student', NULL, NULL),
('missushaikh@gmail.com', '$2y$10$CdsBAKoT67/VE08t0D6OJu3pOWW/Y6ljtQ0JrCoaJLx8gpdCapyvm', 'student', NULL, NULL),
('mmayur283@gmail.com', '$2y$10$JxQb0JFylQh.MGY8/M1o3ettKNcqE9.IhAcpPxoXvsmFEuYtuqzDK', 'student', NULL, NULL),
('monukamin3997@gmail.com', '$2y$10$m2LTjei1NWvd.1XzOLbhHOI4dkAUv6fguUHFWiDySSNDCgNPmYWCe', 'student', NULL, NULL),
('prashantphulari21@gmail.com', '$2y$10$3K/NRlQ9i3.TboNJVaxExOzspf.hdTZQpbNWckceIXD1E2.cu.QWy', 'student', NULL, NULL),
('rupalibhange98@gmail.com', '$2y$10$bBrCpbXtQElLGSaQ07Zeq.YdILdqSFG4qEhIDtvk1kAO8OEsz/tJq', 'student', NULL, NULL),
('sajjadahmed0901@gmail.com', '$2y$10$X4fX7B7VEcoyxOohzflsBObEBul0nwzp5kiVCnFGQdwgSFIeYcer6', 'student', NULL, NULL),
('san412tosh@gmail.com', '$2y$10$RbDk8YIOyBN23W01RQN.vuW0IGWisBD/GFvP9jPte6ZQTO0DaDU4W', 'student', NULL, NULL),
('tpo@mgmcen.ac.in', '$2y$10$jLtK5zOCRUonIVCHd5ZUXe.3iw/uHOXQM506mHAPv77DDeM6Uf1TK', 'TPO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_27_090031_create_main_d_b_s_table', 1),
(2, '2019_09_15_083607_create_users_table', 1),
(3, '2019_09_15_083650_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('29furkhanshaikh@gmail.com', NULL, NULL),
('prashantphulari21@gmail.com', NULL, NULL),
('tpo@mgmcen.ac.in', NULL, NULL),
('ar8483935878@gmail.com', NULL, NULL),
('29furkhanshaikh@gmail.con', NULL, NULL),
('29furkhanshaikh@gmail.cos', NULL, NULL),
('abhishekbagate15898@gmail.com', NULL, NULL),
('mmayur283@gmail.com', NULL, NULL),
('akchapule@gmail.com', NULL, NULL),
('san412tosh@gmail.com', NULL, NULL),
('rupalibhange98@gmail.com', NULL, NULL),
('gawarepradeep1999@gmail.com', NULL, NULL),
('sajjadahmed0901@gmail.com', NULL, NULL),
('monukamin3997@gmail.com', NULL, NULL),
('missu@gmail.com', NULL, NULL),
('missushaikh@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `placement_details`
--

CREATE TABLE `placement_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Placement_Status` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Placed',
  `Company_Name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Package` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placement_details`
--

INSERT INTO `placement_details` (`id`, `Email`, `Placement_Status`, `Company_Name`, `Package`, `created_at`, `updated_at`) VALUES
(1, '29furkhanshaikh@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(2, 'prashantphulari21@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(3, 'tpo@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(7, 'abhishekbagate15898@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(8, 'mmayur283@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(9, 'akchapule@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(10, 'san412tosh@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(11, 'rupalibhange98@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(13, 'sajjadahmed0901@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(14, 'monukamin3997@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(15, 'missu@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL),
(16, 'missushaikh@gmail.com', 'Not Placed', 'Null', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_academics`
--

CREATE TABLE `student_academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `CASERP_ID` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Empty',
  `SSC` decimal(6,3) NOT NULL DEFAULT 0.000,
  `HSC` decimal(6,3) NOT NULL DEFAULT 0.000,
  `Poly` decimal(6,3) NOT NULL DEFAULT 0.000,
  `FE_CGPA` decimal(4,2) NOT NULL DEFAULT 0.00,
  `SE_CGPA` decimal(4,2) NOT NULL DEFAULT 0.00,
  `TE_CGPA` decimal(4,2) NOT NULL DEFAULT 0.00,
  `FE_PERCENT` decimal(6,3) NOT NULL DEFAULT 0.000,
  `SE_PERCENT` decimal(6,3) NOT NULL DEFAULT 0.000,
  `TE_PERCENT` decimal(6,3) NOT NULL DEFAULT 0.000,
  `Overall_Gap` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_academics`
--

INSERT INTO `student_academics` (`id`, `Email`, `CASERP_ID`, `SSC`, `HSC`, `Poly`, `FE_CGPA`, `SE_CGPA`, `TE_CGPA`, `FE_PERCENT`, `SE_PERCENT`, `TE_PERCENT`, `Overall_Gap`, `created_at`, `updated_at`) VALUES
(1, '29furkhanshaikh@gmail.com', 'S1032170390', '87.800', '0.000', '87.800', '0.00', '9.55', '9.34', '0.000', '81.000', '81.000', 0, NULL, NULL),
(2, 'prashantphulari21@gmail.com', 'Empty', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
(3, 'tpo@mgmcen.ac.in', 'Empty', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
(7, 'abhishekbagate15898@gmail.com', 'Empty', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
(8, 'mmayur283@gmail.com', 'Empty', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
(9, 'akchapule@gmail.com', 'S1032170001', '69.800', '54.000', '0.000', '7.66', '6.80', '7.43', '72.000', '64.000', '69.000', 0, NULL, NULL),
(10, 'san412tosh@gmail.com', 'S1032160231', '84.000', '66.920', '0.000', '9.20', '7.50', '7.90', '92.000', '75.000', '79.000', 0, NULL, NULL),
(11, 'rupalibhange98@gmail.com', 'S1032170429', '85.200', '0.000', '83.410', '0.00', '7.25', '8.02', '0.000', '68.290', '76.200', 0, NULL, NULL),
(13, 'sajjadahmed0901@gmail.com', 'S1032160276', '84.720', '70.000', '0.000', '8.40', '6.80', '6.70', '82.000', '65.000', '64.000', 0, NULL, NULL),
(14, 'monukamin3997@gmail.com', 'S1032160153', '85.400', '69.380', '0.000', '8.50', '8.71', '8.14', '86.300', '88.200', '85.430', 0, NULL, NULL),
(15, 'missu@gmail.com', 's1032070398', '83.000', '0.000', '83.000', '0.00', '9.55', '9.34', '0.000', '83.000', '84.000', 0, NULL, NULL),
(16, 'missushaikh@gmail.com', 'S1032170390', '81.000', '0.000', '81.000', '0.00', '9.00', '9.00', '0.000', '98.000', '99.000', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `First_Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `Middle_Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `Last_Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `Class` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Branch` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Passout_Year` int(11) NOT NULL DEFAULT 2020,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`id`, `Email`, `First_Name`, `Middle_Name`, `Last_Name`, `Class`, `Branch`, `Passout_Year`, `created_at`, `updated_at`) VALUES
(1, '29furkhanshaikh@gmail.com', 'Furkhan', 'Mujibodden', 'Shaikh', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(2, 'prashantphulari21@gmail.com', 'Prashant', 'Manoj', 'Phulari', 'BEMECH', 'Mechanical Engineering', 2020, NULL, NULL),
(3, 'tpo@mgmcen.ac.in', 'Shivprasad', 'Anonymous', 'Titre', 'Null', 'Null', 2020, NULL, NULL),
(7, 'abhishekbagate15898@gmail.com', 'Abhishek', 'Anonymous', 'Bagate', 'Null', 'Null', 2020, NULL, NULL),
(8, 'mmayur283@gmail.com', 'Mayuresh', 'Anonymous', 'Pophale', 'Null', 'Null', 2020, NULL, NULL),
(9, 'akchapule@gmail.com', 'Akshata', 'Rajeshwar', 'Chapule', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(10, 'san412tosh@gmail.com', 'Santosh', 'Vinayakrao', 'Suryawanshi', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(11, 'rupalibhange98@gmail.com', 'Rupali', 'Anand', 'Bhange', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(13, 'sajjadahmed0901@gmail.com', 'Mohammed', 'JameelAhmed', 'Sajjad', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(14, 'monukamin3997@gmail.com', 'Minal', 'Laxmikant', 'Kaminwar', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(15, 'missu@gmail.com', 'Missu', 'Mujib', 'Shaikh', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(16, 'missushaikh@gmail.com', 'Missu', 'Mujib', 'Shaikh', 'SYCSEII', 'Computer Science And Engineering', 2020, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'students',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Furkhan Shaikh', '29furkhanshaikh@gmail.com', NULL, '$2y$10$ZnduXhKmc5kP2ob2ozahnOEoItBFmWBY5n9eJRbtgD9HSh99CfVv.', 'students', NULL, NULL, NULL),
(2, 'Prashant Phulari', 'prashantphulari21@gmail.com', NULL, '$2y$10$3K/NRlQ9i3.TboNJVaxExOzspf.hdTZQpbNWckceIXD1E2.cu.QWy', 'students', NULL, NULL, NULL),
(3, 'Shivprasad Titre', 'tpo@mgmcen.ac.in', NULL, '$2y$10$jLtK5zOCRUonIVCHd5ZUXe.3iw/uHOXQM506mHAPv77DDeM6Uf1TK', 'TPO', NULL, NULL, NULL),
(7, 'Abhishek Bagate', 'abhishekbagate15898@gmail.com', NULL, '$2y$10$isCr4czAcwenFN/P3S4NIehAO1NjbVVxhwMrlpktsV9TBN5FeJfg.', 'students', NULL, NULL, NULL),
(8, 'Mayuresh Pophale', 'mmayur283@gmail.com', NULL, '$2y$10$JxQb0JFylQh.MGY8/M1o3ettKNcqE9.IhAcpPxoXvsmFEuYtuqzDK', 'students', NULL, NULL, NULL),
(9, 'Akshata Chapule', 'akchapule@gmail.com', NULL, '$2y$10$Yln4kSOa6iMxRXVKEPS/Gu7H3GwLHmP4RL5cN0vAByT1Fhi1MTORO', 'students', NULL, NULL, NULL),
(10, 'Santosh Suryawanshi', 'san412tosh@gmail.com', NULL, '$2y$10$RbDk8YIOyBN23W01RQN.vuW0IGWisBD/GFvP9jPte6ZQTO0DaDU4W', 'students', NULL, NULL, NULL),
(11, 'Rupali Bhange', 'rupalibhange98@gmail.com', NULL, '$2y$10$bBrCpbXtQElLGSaQ07Zeq.YdILdqSFG4qEhIDtvk1kAO8OEsz/tJq', 'students', NULL, NULL, NULL),
(13, 'Mohammed Sajjad', 'sajjadahmed0901@gmail.com', NULL, '$2y$10$X4fX7B7VEcoyxOohzflsBObEBul0nwzp5kiVCnFGQdwgSFIeYcer6', 'students', NULL, NULL, NULL),
(14, 'Minal Kaminwar', 'monukamin3997@gmail.com', NULL, '$2y$10$m2LTjei1NWvd.1XzOLbhHOI4dkAUv6fguUHFWiDySSNDCgNPmYWCe', 'students', NULL, NULL, NULL),
(15, 'Missu Shaikh', 'missu@gmail.com', NULL, '$2y$10$ZOcvoy0tsf1xdlNBKDyxu.HnCP2VSEGYEhJGeNszTj/dF2ICe6Umm', 'students', NULL, NULL, NULL),
(16, 'Missu Shaikh', 'missushaikh@gmail.com', NULL, '$2y$10$CdsBAKoT67/VE08t0D6OJu3pOWW/Y6ljtQ0JrCoaJLx8gpdCapyvm', 'students', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`Email`);

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
-- Indexes for table `placement_details`
--
ALTER TABLE `placement_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `placement_details_email_foreign` (`Email`);

--
-- Indexes for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_academics_email_foreign` (`Email`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_profile_email_foreign` (`Email`);

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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `placement_details`
--
ALTER TABLE `placement_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_academics`
--
ALTER TABLE `student_academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `placement_details`
--
ALTER TABLE `placement_details`
  ADD CONSTRAINT `placement_details_email_foreign` FOREIGN KEY (`Email`) REFERENCES `login_details` (`Email`);

--
-- Constraints for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD CONSTRAINT `student_academics_email_foreign` FOREIGN KEY (`Email`) REFERENCES `login_details` (`Email`);

--
-- Constraints for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD CONSTRAINT `student_profile_email_foreign` FOREIGN KEY (`Email`) REFERENCES `login_details` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
