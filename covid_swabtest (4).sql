-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2021 at 12:26 PM
-- Server version: 8.0.26
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_swabtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','editor','medical','scanner') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medical',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `voornaam`, `achternaam`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Admin', 'admin@example.com', 'admin', '$2y$10$vXOoftKlHJHu80oS/gcm1OM.U.K6ZOpKuekc9eSWnKp11BGPi7v9W', NULL, '2021-11-20 20:04:06', '2021-11-20 20:04:06'),
(2, 'Shivan', 'Bhagwandin', 'shivan_bhagwandin@example.com', 'medical', '$2y$10$InsgZOGlGr6qlZIuLhIsau6SEQod2ogdevpSgFvNdupNJ6YycJh/O', NULL, '2021-11-20 20:04:06', '2021-11-20 20:04:06'),
(3, 'Denzil', 'Rasidin', 'denzil_rasidin@example.com', 'scanner', '$2y$10$8o4iVl2A97y5FmOMtIIyuepAnUZJGEFMDtH3ZTvDzmhmSuCLrDray', NULL, '2021-11-20 20:04:06', '2021-11-20 20:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `regio`, `created_at`, `updated_at`) VALUES
(1, 'BOG', 'centrum', '2021-11-20 20:04:06', '2021-11-20 20:04:06'),
(2, 'AZP checkpoint', 'centrum', '2021-11-20 20:04:06', '2021-11-20 20:04:06'),
(3, 'RZW', 'wanica', '2021-11-20 20:04:06', '2021-11-20 20:04:06'),
(4, 'Tropical clinic Parbo', 'centrum', '2021-11-20 20:04:06', '2021-11-20 20:04:06'),
(5, 'MMC Nickerie', 'nickerie', '2021-11-20 20:04:06', '2021-11-20 20:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_06_100730_create_admins_table', 1),
(5, '2021_11_04_000000_create_registratie_table', 1),
(6, '2021_11_06_000000_create_vaccinatie_table', 1),
(7, '2021_11_5_000000_create_location_table', 1),
(8, '2021_11_6_000000_create_result_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registratie`
--

CREATE TABLE `registratie` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opmerking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saturation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registratie`
--

INSERT INTO `registratie` (`id`, `user_id`, `opmerking`, `location`, `status`, `email`, `saturation`, `vax`, `bp`, `created_at`, `updated_at`) VALUES
(1, '2', 'Geen', 3, 'afgehandeld', NULL, '95', '[\"wel\",\"2\"]', '[\"140\",\"75\"]', '2021-11-21 18:00:16', '2021-11-24 01:39:00'),
(2, '1', 'Hoofd en keel pijn', 3, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-21 18:01:38', NULL),
(3, '1', 'Hoofd en keel pijn', 3, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-21 18:02:31', NULL),
(4, '4', 'Hoofd en keel pijn', 3, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-21 18:02:31', NULL),
(5, '1', 'geen', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-21 18:11:52', NULL),
(6, '1', 'geen', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-21 18:12:49', NULL),
(7, '1', 'geen', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-21 18:15:20', NULL),
(8, '1', 'geen', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-21 18:15:53', NULL),
(9, '8', 'Keelpijn', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:34:21', NULL),
(10, '1', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:38:07', NULL),
(11, '8', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:48:37', NULL),
(12, '8', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:49:40', NULL),
(13, '12', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:50:21', NULL),
(14, '12', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:50:30', NULL),
(15, '1', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:59:32', NULL),
(16, '2', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:59:32', NULL),
(17, '8', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:59:32', NULL),
(18, '12', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:59:32', NULL),
(19, '1', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:59:45', NULL),
(20, '2', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:59:45', NULL),
(21, '8', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:59:45', NULL),
(22, '12', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 02:59:45', NULL),
(23, '21', 'waterall', 2, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 03:00:20', NULL),
(24, '1', 'geen', 1, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 03:25:55', NULL),
(25, '12', 'geen', 1, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 03:26:12', NULL),
(26, '24', 'geen', 1, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 03:27:46', NULL),
(27, '12', 'geen', 1, 'preregistratie', NULL, NULL, NULL, NULL, '2021-11-22 03:28:15', NULL),
(28, '25', 'Geen smaak en geur', NULL, 'afgehandeld', NULL, '95', '[\"wel\",\"2\"]', '[\"140\",\"75\"]', '2021-11-22 04:15:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` bigint UNSIGNED NOT NULL,
  `registration_id` int DEFAULT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `registration_id`, `result`, `qr_code`, `created_at`, `updated_at`) VALUES
(1, 28, 'negatief', 'generated_qrcodes/pcr28-negatief.png', '2021-11-23 16:59:24', NULL),
(2, 28, 'negatief', 'generated_qrcodes/pcr28-negatief.png', '2021-11-23 17:03:14', NULL),
(3, 28, 'negatief', 'generated_qrcodes/pcr28-negatief.png', '2021-11-23 17:03:34', NULL),
(4, 1, 'positief', 'generated_qrcodes/pcr1-positief.png', '2021-11-24 01:39:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `voornaam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achternaam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geboorte_datum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_nummer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobiel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `geboorte_datum`, `adress`, `id_nummer`, `mobiel`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Shivan', 'Bhagwandin', '09-10-2000', 'Lelydorp 73', 'FS000001M', '+5978920264', 'shivanb09@hotmail.com', NULL, NULL),
(2, 'Randy', 'Van Dijk', '2021-11-01', 'Kernkampweg 14', 'FS002', '+5978642221', 'randy@outlook.com', '2021-11-21 18:00:16', NULL),
(8, 'Shivan', 'Bhagwandin', '2021-11-01', 'Burenstraat 4', 'FS000002M', '+5978920264', 'shivanb09@hotmail.com', '2021-11-22 02:34:21', NULL),
(12, 'Shivan', 'Bhagwandin', '2021-11-02', 'Kernkampweg', 'FS000003M', '+597', 'shivanb09@hotmail.com', '2021-11-22 02:50:21', NULL),
(21, 'Shivan', 'Bhagwandin', '2021-11-02', 'Kernkampweg', 'FS000004M', '+597', 'shivanb09@hotmail.com', '2021-11-22 03:00:20', NULL),
(24, 'Shivan', 'Bhagwandin', '2021-11-02', 'Burenstraat 4', 'FS000005M', '+597345543', 'shivanb09@hotmail.com', '2021-11-22 03:27:46', NULL),
(25, 'John', 'Quatro', '1948-06-17', 'Libanonweg 19', 'FR000001M', '8920264', NULL, '2021-11-22 04:15:58', NULL),
(26, 'Steffie', 'Parker', '2021-11-01', NULL, 'FP000005V', NULL, NULL, '2021-11-23 05:26:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaccinatie`
--

CREATE TABLE `vaccinatie` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufracturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lot_number1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaccinator1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lot_number2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccinator2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot_number3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccinator3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccinatie`
--

INSERT INTO `vaccinatie` (`id`, `user_id`, `manufracturer`, `lot_number1`, `date1`, `vaccinator1`, `lot_number2`, `date2`, `vaccinator2`, `lot_number3`, `date3`, `vaccinator3`, `status`, `qr_code`, `created_at`, `updated_at`) VALUES
(1, '8', 'AstraZeneca', '12345', '2021-11-01', 'John', '45677', '2021-11-24', 'Rodger', '67778', '2021-11-27', 'Steffie', NULL, 'generated_qrcodes/FS000002M.png', '2021-11-23 04:34:42', '2021-11-23 05:23:12'),
(2, '26', 'Moderna', '6543', '2021-11-22', 'Derby', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'generated_qrcodes/FP000005V.png', '2021-11-23 05:29:01', NULL),
(3, '25', 'AstraZeneca', '34556', '2021-11-09', 'Derby', '45677', '2021-11-24', 'Rodger', NULL, NULL, NULL, NULL, 'generated_qrcodes/FR000001M.png', '2021-11-24 14:03:43', '2021-11-24 15:20:46');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
-- Indexes for table `registratie`
--
ALTER TABLE `registratie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nummer` (`id_nummer`);

--
-- Indexes for table `vaccinatie`
--
ALTER TABLE `vaccinatie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registratie`
--
ALTER TABLE `registratie`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vaccinatie`
--
ALTER TABLE `vaccinatie`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
