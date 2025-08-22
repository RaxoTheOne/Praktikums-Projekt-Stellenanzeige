-- Komplette Datenbank für Stellenanzeige-Projekt
-- Diese Datei in phpMyAdmin importieren

-- Datenbank erstellen
CREATE DATABASE IF NOT EXISTS `stellenanzeige` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Datenbank auswählen
USE `stellenanzeige`;

-- Alle existierenden Tabellen löschen (falls vorhanden)
DROP TABLE IF EXISTS `category_job_listing`;
DROP TABLE IF EXISTS `job_listings`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `companies`;
DROP TABLE IF EXISTS `cache`;
DROP TABLE IF EXISTS `cache_locks`;
DROP TABLE IF EXISTS `failed_jobs`;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `migrations`;
DROP TABLE IF EXISTS `password_reset_tokens`;
DROP TABLE IF EXISTS `personal_access_tokens`;
DROP TABLE IF EXISTS `sessions`;
DROP TABLE IF EXISTS `users`;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `users`
-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `companies`
-- --------------------------------------------------------

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `categories`
-- --------------------------------------------------------

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `job_listings`
-- --------------------------------------------------------

CREATE TABLE `job_listings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_listings_company_id_foreign` (`company_id`),
  CONSTRAINT `job_listings_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `category_job_listing`
-- --------------------------------------------------------

CREATE TABLE `category_job_listing` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_listing_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_job_listing_job_listing_id_foreign` (`job_listing_id`),
  KEY `category_job_listing_category_id_foreign` (`category_id`),
  CONSTRAINT `category_job_listing_job_listing_id_foreign` FOREIGN KEY (`job_listing_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_job_listing_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `migrations`
-- --------------------------------------------------------

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `sessions`
-- --------------------------------------------------------

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `cache`
-- --------------------------------------------------------

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `cache_locks`
-- --------------------------------------------------------

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `failed_jobs`
-- --------------------------------------------------------

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `jobs`
-- --------------------------------------------------------

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `password_reset_tokens`
-- --------------------------------------------------------

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabellenstruktur für Tabelle `personal_access_tokens`
-- --------------------------------------------------------

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Beispieldaten einfügen
-- --------------------------------------------------------

-- Unternehmen
INSERT INTO `companies` (`name`, `website`, `email`, `phone`, `created_at`, `updated_at`) VALUES
('TechCorp Solutions', 'https://techcorp.com', 'info@techcorp.com', '+49 30 12345678', NOW(), NOW()),
('Digital Innovations GmbH', 'https://digitalinnovations.de', 'kontakt@digitalinnovations.de', '+49 40 87654321', NOW(), NOW()),
('StartupHub Berlin', 'https://startuphub.berlin', 'hello@startuphub.berlin', '+49 30 11223344', NOW(), NOW()),
('WebDev Studio', 'https://webdevstudio.de', 'info@webdevstudio.de', '+49 89 99887766', NOW(), NOW()),
('Mobile Apps Co.', 'https://mobileapps.co', 'contact@mobileapps.co', '+49 221 55443322', NOW(), NOW());

-- Kategorien
INSERT INTO `categories` (`name`, `slug`, `created_at`, `updated_at`) VALUES
('Software Development', 'software-development', NOW(), NOW()),
('Web Development', 'web-development', NOW(), NOW()),
('Mobile Development', 'mobile-development', NOW(), NOW()),
('Data Science', 'data-science', NOW(), NOW()),
('DevOps', 'devops', NOW(), NOW()),
('UI/UX Design', 'ui-ux-design', NOW(), NOW());

-- Stellenanzeigen
INSERT INTO `job_listings` (`title`, `company_id`, `location`, `description`, `type`, `salary`, `published_at`, `created_at`, `updated_at`) VALUES
('Senior PHP Developer', 1, 'Berlin', 'Wir suchen einen erfahrenen PHP-Entwickler für unser Team. Laravel-Kenntnisse sind ein Plus.', 'Vollzeit', 65000, NOW(), NOW(), NOW()),
('Frontend Developer (React)', 2, 'Hamburg', 'Entwickle moderne Webanwendungen mit React und TypeScript. Teamarbeit und agile Methoden.', 'Vollzeit', 58000, NOW(), NOW(), NOW()),
('Mobile App Developer', 3, 'Berlin', 'Entwickle iOS und Android Apps. Swift, Kotlin und Flutter-Kenntnisse erwünscht.', 'Vollzeit', 62000, NOW(), NOW(), NOW()),
('Full Stack Developer', 4, 'München', 'Entwickle sowohl Frontend als auch Backend. Node.js, React und MySQL-Kenntnisse.', 'Vollzeit', 70000, NOW(), NOW(), NOW()),
('DevOps Engineer', 5, 'Köln', 'Verwalte unsere Cloud-Infrastruktur. AWS, Docker und Kubernetes-Kenntnisse.', 'Vollzeit', 75000, NOW(), NOW(), NOW());

-- Kategorien für Stellenanzeigen verknüpfen
INSERT INTO `category_job_listing` (`job_listing_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 2, NOW(), NOW()), -- PHP Developer -> Web Development
(1, 6, NOW(), NOW()), -- PHP Developer -> UI/UX Design
(2, 2, NOW(), NOW()), -- React Developer -> Web Development
(2, 1, NOW(), NOW()), -- React Developer -> Software Development
(3, 3, NOW(), NOW()), -- Mobile Developer -> Mobile Development
(4, 1, NOW(), NOW()), -- Full Stack -> Software Development
(4, 2, NOW(), NOW()), -- Full Stack -> Web Development
(5, 5, NOW(), NOW()); -- DevOps -> DevOps

-- Migrationen eintragen (damit Laravel denkt, alle Migrationen seien bereits ausgeführt)
INSERT INTO `migrations` (`migration`, `batch`) VALUES
('0001_01_01_000000_create_users_table', 1),
('0001_01_01_000001_create_cache_table', 1),
('0001_01_01_000002_create_jobs_table', 1),
('2025_08_18_224624_create_job_listings_table', 1),
('2025_08_19_071241_create_companies_table', 1),
('2025_08_19_071242_create_categories_table', 1),
('2025_08_19_071243_add_foreign_keys_and_pivot_for_job_listings', 1);

-- Erfolgsmeldung
SELECT 'Datenbank erfolgreich erstellt!' AS status;
