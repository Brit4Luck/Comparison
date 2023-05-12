-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2023 at 04:35 PM
-- Server version: 5.7.41-0ubuntu0.18.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` integer(20) COLLATE utf8mb4_unicode_ci DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'sadmin@gmail.com', '', NULL, '$2y$10$0nsZ2iITY7.J4SwIOo7Q3OsmyJ.yMM4ygbLMYM8fnRaDjFrRtqnLi', NULL, '2023-02-22 14:26:53', '2023-02-22 14:26:53'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$nQ9agrFXVMwR5kF0/f8MZeZjlbGfr/hnvix7KnlzTcwue66JT.JUa', NULL, '2023-02-22 14:26:52', '2023-02-22 14:26:52'),
(3, 'user', 'user@gmail.com', NULL, '$2y$10$Ponc/KxDSIBDxJIY3KjSIO7exHQVaVKcoGf.FNi3aTTX5nhmKSrqy', NULL, '2023-02-22 14:26:52', '2023-02-22 14:26:52'),
(4, 'user_1', 'user1@gmail.com', NULL, '$2y$10$LhMo6Da.a/9.GwFbCfirTuVYSU3b4cOvG3SkEKM/FNuIVnnQp0bBi', NULL, '2023-02-23 04:35:53', '2023-02-23 04:35:53'),
(5, 'user_2', 'user2@gmail.com', NULL, '$2y$10$Mqrn0bjh4SPCub58b11GvuGMGW5H6ycxYbrw03Ej17NjeEGUpouUm', NULL, '2023-02-23 04:36:59', '2023-02-23 04:36:59'),
(6, 'Kennedy Mutethia', 'admin@admin.com', NULL, '$2y$10$2XBAQ.QoxLNrJpV/H7RSD.EAcFI7FtHVFAsQNEBV5L.qP/Q8y7b8.', NULL, '2023-02-23 10:46:20', '2023-02-23 10:46:20'),
(7, 'Tom', 'kenmutesh@gmail.com', NULL, '$2y$10$ikuEhxENMTWVndQhe5AXCe.cuHGUfQgMZvyAY5D5Qm3ttYsuKRCIC', NULL, '2023-02-25 04:38:27', '2023-02-25 04:38:27'),
(8, 'Kennedy Mutethia', 'kenmutesh901@gmail.comp', NULL, '$2y$10$p/RdYfwj93OGMcnE00bzUuhUH7oPm7egA6AdJKe0Qiz.cF3jwqlKy', NULL, '2023-02-25 04:55:24', '2023-02-25 04:55:24'),
(9, 'Kennedy Mutethia', 'kenmutesh901@gmail.com1', NULL, '$2y$10$UvV8V.6pJ7PEetPmCefJq.c0.Q7gqWEpKmdrNfZ4DRPnYdLDCmVm2', NULL, '2023-02-25 04:59:33', '2023-02-25 04:59:33');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
