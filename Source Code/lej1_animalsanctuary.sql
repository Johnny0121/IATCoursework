-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2019 at 03:13 PM
-- Server version: 5.5.62
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lej1_animalsanctuary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `forename`, `surname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'johnny', 'le', 'lej1@aaa.ac.uk', NULL, '$2y$10$gJ95ll2O1MfgMR7BgWP4kuVyfMa2w.VmiT7wI24PuGu95QjeOZYb2', NULL, '2019-04-22 15:44:18', '2019-04-22 15:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_requests`
--

CREATE TABLE `adoption_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `animalid` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `state` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoption_requests`
--

INSERT INTO `adoption_requests` (`id`, `userid`, `animalid`, `description`, `state`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Please please', 'approved', '2019-04-23 10:52:04', '2019-04-23 13:29:18'),
(2, 1, 1, NULL, 'pending', '2019-04-23 13:15:28', '2019-04-23 13:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `microchipped` tinyint(1) NOT NULL DEFAULT '0',
  `vaccinated` tinyint(1) NOT NULL DEFAULT '0',
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `animal`, `type`, `date_of_birth`, `microchipped`, `vaccinated`, `availability`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Momo', 'Human', 'Siberian', '1999-08-20', 1, 1, 1, 'A good momo.', 'earth_1555951630.jpg', '2019-04-22 15:47:10', '2019-04-22 15:47:10'),
(2, 'Croacky', 'frog', 'Siberian', '1999-08-20', 1, 1, 1, 'A good froggy.', 'Chika_1555780794_1556022961.png', '2019-04-23 11:04:53', '2019-04-23 11:36:01'),
(3, 'Muller Yoghurt', 'hedgehog', 'Cute', '1954-07-20', 1, 1, 1, 'A cute little hedgehog ready for battle.', 'Kermit_1555852376_1556029845.png', '2019-04-23 13:30:45', '2019-04-23 13:30:45'),
(4, 'momoshipo', 'lion', 'British', '2019-04-27', 1, 1, 1, 'Roar. Roar.', 'Kermit_1555852376_1556030419.png', '2019-04-23 13:40:19', '2019-04-23 13:40:19'),
(5, 'Pico', 'panda', 'Chinese', '2019-04-01', 1, 1, 0, 'A good panda.', '804fac03d0b21b4558580df3d93f7ed1_1555815935_1556030495.png', '2019-04-23 13:41:11', '2019-04-23 13:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animalid` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `animalid`, `image`, `created_at`, `updated_at`) VALUES
(3, 2, 'harambe_1556036799.jpg', '2019-04-23 15:26:39', '2019-04-23 15:26:39');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_16_164321_create_animals_table', 1),
(4, '2019_04_16_164332_create_adoption_requests_table', 1),
(5, '2019_04_16_234030_create_admins_table', 1),
(6, '2019_04_20_133725_create_images_table', 1),
(7, '2019_04_21_194656_create_queries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` longtext COLLATE utf8mb4_unicode_ci,
  `responded_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `userid`, `question`, `response`, `responded_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'How many adoptions can I make in a day?', NULL, NULL, '2019-04-23 13:22:17', '2019-04-23 13:22:17'),
(3, 1, 'Are my account details safe from disgusting filths?', NULL, NULL, '2019-04-23 13:22:40', '2019-04-23 13:22:40'),
(4, 1, 'I would like to adopt a siberian tiger. Do you have any tigers available?', 'No, go away. Stop pestering the Aston animal team.\r\n- Johnny Le', '2019-04-23 14:29:03', '2019-04-23 13:23:13', '2019-04-23 13:29:03'),
(5, 4, 'How many spoons can be balanced on a pig\'s face?', NULL, NULL, '2019-04-23 13:59:30', '2019-04-23 13:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female','prefer_not_to_say','apache_helicoper','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `forename`, `surname`, `email`, `telephone`, `gender`, `date_of_birth`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Timmiy', 'Turner', 'turnert@aaa.ac.uk', '07425725638', 'male', NULL, NULL, '$2y$10$VJfhvhLZfKx8p4iQq17hd.spzMP4nrXq1AJwoa7Pi8yGfen1MGz3G', NULL, '2019-04-22 15:18:56', '2019-04-22 15:40:06'),
(2, 'james', 'chikcken', 'chickenj@aaa.ac.uk', '07539387174', 'male', NULL, NULL, '$2y$10$8so3LJd.mot53wzO1Jl/4uY7etJoL9.8ykDgVGzr9jxaycN9INF6.', NULL, '2019-04-23 09:15:58', '2019-04-23 09:15:58'),
(3, 'Tom', 'Snow', 'snowt@aaa.ac.uk', '07324556768', 'male', NULL, NULL, '$2y$10$tMJyirAuhyhwerpnt6Sk8uXZgWRS8rnlL/Nae32fAgkW6nWMh2UC2', NULL, '2019-04-23 13:28:12', '2019-04-23 13:28:12'),
(4, 'Sally', 'Cross', 'crosss@aaa.ac.uk', '07895887654', 'male', NULL, NULL, '$2y$10$1mxSPv6uDkvufauuAmFGJeLbcX5KtsSLTxfStK5NaDjliB45GG.5i', NULL, '2019-04-23 13:57:40', '2019-04-23 13:57:40'),
(5, 'Mr', 'Bean', 'beanm@aaa.ac.uk', '07856445664', 'male', NULL, NULL, '$2y$10$pY94BkTFhu2NNbkfALWeQeCZHcrq/ouP5R4cDFPLdh0OwihyThuoO', NULL, '2019-04-23 14:01:26', '2019-04-23 14:01:26');

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
-- Indexes for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adoption_requests_userid_foreign` (`userid`),
  ADD KEY `adoption_requests_animalid_foreign` (`animalid`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_animalid_foreign` (`animalid`);

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
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queries_userid_foreign` (`userid`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD CONSTRAINT `adoption_requests_animalid_foreign` FOREIGN KEY (`animalid`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adoption_requests_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_animalid_foreign` FOREIGN KEY (`animalid`) REFERENCES `animals` (`id`);

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
