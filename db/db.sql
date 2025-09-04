-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for landing_page
-- CREATE DATABASE IF NOT EXISTS `landing_page` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
-- USE `landing_page`;

-- Dumping structure for table landing_page.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.cache: ~0 rows (approximately)

-- Dumping structure for table landing_page.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.cache_locks: ~0 rows (approximately)

-- Dumping structure for table landing_page.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table landing_page.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.jobs: ~0 rows (approximately)

-- Dumping structure for table landing_page.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.job_batches: ~0 rows (approximately)

-- Dumping structure for table landing_page.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.migrations: ~4 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_09_01_185952_create_personal_access_tokens_table', 2),
	(5, '2025_09_02_054345_create_services_table', 3),
	(6, '2025_09_02_055257_create_service_values_table', 3),
	(7, '2025_09_02_110720_create_payment_configures_table', 4);

-- Dumping structure for table landing_page.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table landing_page.payment_configures
CREATE TABLE IF NOT EXISTS `payment_configures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.payment_configures: ~1 rows (approximately)
INSERT INTO `payment_configures` (`id`, `username`, `password`, `app_key`, `secret_key`, `created_at`, `updated_at`) VALUES
	(1, '01710604946', '$[rn:UK}1Fe', 'nN6agfzsBKfI7gZ3RubnGaqRtc', 'NxbUvV8815PxMKm1rfuLZ9y4RSoGmS67OrOtdmwotKjvvpYyfEO8', '2025-09-02 05:21:24', '2025-09-02 06:06:51');

-- Dumping structure for table landing_page.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table landing_page.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.services: ~3 rows (approximately)
INSERT INTO `services` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
	(3, 'Matthew Jensen', 910.00, '2025-09-02 00:51:45', '2025-09-02 00:51:45');

-- Dumping structure for table landing_page.service_values
CREATE TABLE IF NOT EXISTS `service_values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.service_values: ~1 rows (approximately)
INSERT INTO `service_values` (`id`, `service_id`, `description`, `created_at`, `updated_at`) VALUES
	(2, 3, 'asdfasdf', '2025-09-02 01:03:11', '2025-09-02 01:03:11'),
	(3, 3, 'Sonar Bangla', '2025-09-02 01:03:11', '2025-09-02 01:03:11');

-- Dumping structure for table landing_page.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('ZtBLvLV4wRnkhbVLzRLBtgVk6OQGjnr7YuMcrTDS', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTWNkN255VmJUQXZwVG9TREFqc1k0WHhiOWp4bE1YYjBNVjNpdWNZQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTMwOiJodHRwczovL2xhbmRpbmctcGFnZS50ZXN0L3N1Y2Nlc3M/YXBpVmVyc2lvbj0xLjIuMC1iZXRhJTJGJnBheW1lbnRJRD1UUjAwMTFWZlBKbk55MTc1NjgxNjIwOTEzOCZzaWduYXR1cmU9WnFha0VGUE5jcyZzdGF0dXM9Y2FuY2VsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fX0=', 1756816378);

-- Dumping structure for table landing_page.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table landing_page.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$Q1JfzI666z2ijtdLWhp5pe7ZAsRQXIoW.fwfb6ocVWZ0S.tnpizq6', NULL, '2025-09-01 23:37:05', '2025-09-01 23:37:05');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
