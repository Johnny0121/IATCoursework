-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 10:58 PM
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
(1, 'johnny', 'le', 'lej1@aaa.ac.uk', NULL, '$2y$10$HGm8D8UkvKrTyjkHfOQ63.Z/cdY7SXQMVsjcXxrNhUNT6ytvlO7Qu', NULL, '2019-05-01 19:55:18', '2019-05-01 19:55:18');

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
(1, 1, 1, 'This animal is very cool. much coolios.', 'approved', '2019-05-01 21:23:02', '2019-05-01 21:36:50'),
(2, 1, 3, NULL, 'pending', '2019-05-01 21:26:25', '2019-05-01 21:26:25'),
(3, 1, 9, NULL, 'rejected', '2019-05-01 21:27:25', '2019-05-01 21:36:50');

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
(1, 'Kermit', 'frog', 'Tree', '2010-08-20', 1, 0, 1, 'A high depressed frog that needs a new home after his old pond had been blown to bits by a bomb.', 'kermit_1556744237.png', '2019-05-01 19:57:17', '2019-05-01 19:57:17'),
(2, 'Zingo', 'monkey', 'Mandril', '1997-08-12', 1, 1, 1, 'A jolly mandril monkey who loves eating bananas 24/7 and making new friends.', 'mandrillmonkey(1)_1556747301.png', '2019-05-01 20:48:21', '2019-05-01 20:48:21'),
(3, 'Kermit', 'frog', 'Siberian', '1999-05-12', 1, 1, 1, 'A very depressed frog looking for companionship but cannot find it. He needs to friends to boost his self-esteem again.', 'kermit_1556747387.png', '2019-05-01 20:49:47', '2019-05-01 20:49:47'),
(4, 'Pingu', 'penguin', 'Antarctic', '2005-02-19', 0, 1, 1, 'A warm insulated fatty penguin looking for a new home with a lot of fatty foods.', 'pingu_1556747448.jpg', '2019-05-01 20:50:48', '2019-05-01 20:50:48'),
(5, 'Ruffles', 'cow', 'Highland Cattle', '2003-12-31', 1, 1, 1, 'A super-galactic rad cow, looking for new cow friends in a new barn. His friends ditched him because his hair was too rad for the cow group.', 'hairycow_1556747527.jpg', '2019-05-01 20:52:07', '2019-05-01 20:52:07'),
(6, 'Croacky', 'frog', 'Siberian', '2018-01-03', 1, 1, 1, 'A good froggy that dreams to one day be the mascot for Freddo\'s chocolate bars.', 'frog_1556747577.jpg', '2019-05-01 20:52:57', '2019-05-01 20:52:57'),
(7, 'Shushu', 'panda', 'Chinese', '2004-08-16', 1, 1, 1, 'A chinese panda looking for a new home with lots of bamboo shoots to eat.', 'happypanda_1556747674.jpg', '2019-05-01 20:54:34', '2019-05-01 20:54:34'),
(8, 'Nomnom', 'monkey', 'Chinese', '1998-11-04', 1, 0, 1, 'A chinese full-sized adult panda looking for a new home to retire.', 'oldpanda_1556747740.jpg', '2019-05-01 20:55:40', '2019-05-01 20:55:40'),
(9, 'Moko', 'panda', 'Vietnamese', '2013-04-02', 1, 1, 1, 'A very lazy panda that does nothing all day but steals his brother\'s bamboo shoots and slaps his dad. Help him be separated from his family, forced into PandaCamp and taught proper Panda etiquette.', 'lazypanda(1)_1556747977.png', '2019-05-01 20:59:38', '2019-05-01 20:59:38'),
(10, 'Chika', 'human', 'Kawaii', '2003-04-30', 1, 1, 1, 'This girls has swag and is on the daily dance grind. She hopes to one day become a rapper, and worldwide handsome.', 'Chika_1556748381.png', '2019-05-01 21:06:21', '2019-05-01 21:06:21'),
(11, 'TriggeredKermit', 'frog', 'Imposter', '2019-05-07', 0, 1, 1, 'An unhappy frog with the fact that someone stole his name.', 'Kermit_1556748442.png', '2019-05-01 21:07:22', '2019-05-01 21:07:22'),
(12, 'Happy', 'duck', 'Exceed', '2000-09-19', 1, 1, 1, 'A small blue enthusiastic bundle of joy.', 'happy_1556748611.png', '2019-05-01 21:10:11', '2019-05-01 21:10:11'),
(13, 'Tortor', 'turtle', 'Sea', '1600-12-12', 1, 1, 0, 'A very old unhappy turtle.', 'turtle_1556748726.jpg', '2019-05-01 21:12:06', '2019-05-01 21:12:06');

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
(1, 5, 'ruffles2(1)_1556750136.jpg', '2019-05-01 21:35:36', '2019-05-01 21:35:36'),
(2, 5, 'youngruffles(1)_1556750178.jpg', '2019-05-01 21:36:18', '2019-05-01 21:36:18');

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
(1, 1, 'Hello, how many pandas do you guys have in-stock?', NULL, NULL, '2019-05-01 21:27:55', '2019-05-01 21:27:55'),
(2, 1, 'Hello, is there a limit to the number of adoption requests I can make in a single day?', 'Hello! \r\nYou can make as much requests as you wish\r\n- Johnny Le', '2019-05-01 22:36:42', '2019-05-01 21:28:16', '2019-05-01 21:36:42'),
(3, 1, 'Hello Aston Team, do you have a contact page?', NULL, NULL, '2019-05-01 21:28:55', '2019-05-01 21:28:55');

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
(1, 'Timmy', 'Turner', 'turnert@aaa.ac.uk', '07534557689', 'male', NULL, NULL, '$2y$10$gqNSQhYnGzwLHSBjDNw.NOb67xcft0T8LK4efA/DLzPjrApDwpm7C', NULL, '2019-05-01 19:50:58', '2019-05-01 19:50:58'),
(2, 'Samantha', 'Jones', 'joness@aaa.ac.uk', '07865556741', 'female', NULL, NULL, '$2y$10$9W2rYGlZiUlkqn1CAc/UauB5MJMWN0lMYaymHZyOgyyf5VcxGCHjm', NULL, '2019-05-01 19:54:29', '2019-05-01 19:54:29');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
