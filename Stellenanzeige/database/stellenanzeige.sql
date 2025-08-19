-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Aug 2025 um 14:42
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `stellenanzeige`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'qui', 'et-debitis-ut-qui', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(2, 'sed', 'odit-maxime-dolor-quo-molestiae', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(3, 'aut', 'eum-voluptas-ad-consequatur-similique', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(4, 'commodi', 'rem-labore-est-soluta-incidunt', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(5, 'delectus', 'sunt-voluptatibus-porro-quia-ratione-porro-atque', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(6, 'soluta', 'facere-illum-sed-aut-asperiores-qui-fugit-cupiditate', '2025-08-19 05:21:01', '2025-08-19 05:21:01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category_job_listing`
--

CREATE TABLE `category_job_listing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_listing_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `category_job_listing`
--

INSERT INTO `category_job_listing` (`id`, `job_listing_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 6, NULL, NULL),
(3, 1, 4, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 2, 4, NULL, NULL),
(7, 3, 6, NULL, NULL),
(8, 4, 4, NULL, NULL),
(9, 4, 5, NULL, NULL),
(10, 4, 2, NULL, NULL),
(11, 5, 5, NULL, NULL),
(12, 6, 5, NULL, NULL),
(13, 6, 1, NULL, NULL),
(14, 6, 6, NULL, NULL),
(15, 7, 4, NULL, NULL),
(16, 7, 6, NULL, NULL),
(17, 7, 3, NULL, NULL),
(18, 8, 5, NULL, NULL),
(19, 8, 6, NULL, NULL),
(20, 8, 1, NULL, NULL),
(21, 9, 1, NULL, NULL),
(22, 9, 5, NULL, NULL),
(23, 10, 3, NULL, NULL),
(24, 10, 6, NULL, NULL),
(25, 11, 4, NULL, NULL),
(26, 11, 1, NULL, NULL),
(27, 12, 1, NULL, NULL),
(28, 13, 6, NULL, NULL),
(29, 13, 2, NULL, NULL),
(30, 14, 2, NULL, NULL),
(31, 14, 3, NULL, NULL),
(32, 14, 5, NULL, NULL),
(33, 15, 1, NULL, NULL),
(34, 16, 3, NULL, NULL),
(35, 16, 6, NULL, NULL),
(36, 17, 3, NULL, NULL),
(37, 17, 1, NULL, NULL),
(38, 17, 4, NULL, NULL),
(39, 18, 3, NULL, NULL),
(40, 19, 2, NULL, NULL),
(41, 19, 3, NULL, NULL),
(42, 20, 1, NULL, NULL),
(43, 20, 2, NULL, NULL),
(44, 21, 4, NULL, NULL),
(45, 21, 5, NULL, NULL),
(46, 21, 1, NULL, NULL),
(47, 22, 3, NULL, NULL),
(48, 22, 5, NULL, NULL),
(49, 22, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `companies`
--

INSERT INTO `companies` (`id`, `name`, `website`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Roberts, Wilkinson and Hessel', 'https://bauch.com/assumenda-laboriosam-sed-non-voluptatem-magni.html', NULL, '562-624-3146', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(2, 'Mueller, Corkery and McDermott', 'http://buckridge.com/quia-delectus-vero-atque-magnam-consequatur', NULL, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(3, 'Johns Inc', NULL, 'hal.windler@klein.com', '316-925-4118', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(4, 'Hoppe-Renner', NULL, NULL, '1-575-920-2331', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(5, 'Carter Group', NULL, NULL, '(657) 993-7963', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(6, 'TenMedia GmbH', NULL, NULL, NULL, '2025-08-19 10:07:37', '2025-08-19 10:07:37');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `failed_jobs`
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
-- Tabellenstruktur für Tabelle `jobs`
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
-- Tabellenstruktur für Tabelle `job_batches`
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
-- Tabellenstruktur für Tabelle `job_listings`
--

CREATE TABLE `job_listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `job_listings`
--

INSERT INTO `job_listings` (`id`, `title`, `company_id`, `location`, `description`, `type`, `salary`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Fabric Mender', 5, 'Sherwoodside', 'Voluptate est distinctio alias consectetur. Molestias ut quia dolorem voluptatibus similique. In et quo quos magni minus ex corporis. Non quam amet accusantium qui corrupti.\n\nEveniet quibusdam omnis et. Nemo sunt fuga illum vitae accusantium.\n\nVoluptas autem et temporibus voluptatum expedita voluptas. Enim voluptatibus est unde eaque. Eos et et quo ab tempora quaerat. Id sequi magni molestias qui ipsa.', 'internship', 118746, '2025-08-17 15:31:11', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(2, 'Director Of Marketing', 2, 'North Rodrick', 'Corporis nulla laboriosam quia necessitatibus ducimus eum ea. Id vitae et voluptas. Optio rerum enim sunt. Reprehenderit quia quasi sit similique enim architecto molestias.\n\nSoluta reiciendis aut blanditiis dolore veritatis sunt doloribus architecto. Voluptates et ratione magnam ea provident. Et et non tenetur consectetur enim dolor cum est. Sit eos quasi nisi illo labore.\n\nConsequatur omnis cum quia rerum ex voluptas. Voluptatibus enim ipsa sit voluptate consequatur quia. Enim atque odio velit. Asperiores quia earum omnis dolore ipsa. Alias debitis qui voluptas rem ad ut.', 'internship', 106625, '2025-08-16 05:20:58', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(3, 'Landscape Architect', 1, 'Ashleighview', 'Voluptas rem illo non nihil qui id. Quia quo hic harum magni commodi magnam. Laboriosam consequatur nihil quod consequatur enim tempore. Aliquid voluptas nisi voluptas ea sit atque ipsum.\n\nAssumenda labore veniam explicabo rem tempora quisquam in. Non voluptas quia eum repellendus velit facere. Corrupti quaerat tempora magni corrupti ut laborum consequatur non.\n\nDolor aut expedita sunt sunt impedit distinctio sunt. Iste nam et in et aut non facere. Voluptas cumque accusantium atque.', 'part-time', 96299, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(4, 'Biochemist', 1, 'Johnsonborough', 'Perspiciatis officia vel dolorem aliquam veniam inventore est qui. Dolores quis ut eligendi sed nemo dolores. Totam aut necessitatibus distinctio. Odio eius et ipsum minima.\n\nMinus perferendis quia fuga nam ullam cupiditate nesciunt. Laudantium voluptatum necessitatibus cupiditate cumque. Vero possimus optio laborum consequatur. Natus qui consequatur eos doloribus eius.\n\nPraesentium voluptas dolores error ab. Consectetur omnis nulla quos fugit. Quo qui quasi quam autem reprehenderit. Aut ad provident nesciunt dicta error fugiat quis in.', 'internship', 32081, '2025-08-10 15:47:13', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(5, 'Cutting Machine Operator', 4, 'Blandaport', 'Voluptate cumque laboriosam natus repudiandae impedit qui. Illo sunt dolorum veniam alias ea. Nihil sequi beatae quia repellendus sunt.\n\nQuasi et incidunt nam esse perferendis consectetur culpa. Consequatur eveniet facere ut consequatur sit dolores. Non ab officiis voluptatem voluptatem inventore velit.\n\nDeleniti quis nemo in excepturi velit. Necessitatibus assumenda quisquam exercitationem maxime nulla aperiam. Aut hic dolor ut possimus et voluptas excepturi. Qui aliquam voluptatem numquam occaecati eaque.', 'full-time', 109955, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(6, 'Sheriff', 5, 'West Jonatan', 'Beatae sed qui natus fugiat in sed est. Deserunt qui laboriosam aut. Sapiente sed voluptatibus dolor et. Et aut ipsum qui.\n\nQuidem quibusdam vel ipsum illo aperiam. Quia minus praesentium dignissimos ad exercitationem. Voluptatem deserunt eligendi dolores ut voluptatem pariatur eos. Earum nihil distinctio alias sequi officia sint.\n\nDolore veniam omnis temporibus rerum voluptas commodi consequuntur. Eaque iste officia quasi doloremque modi quis molestiae. Voluptas cupiditate sit sequi veritatis suscipit qui.', 'contract', 109550, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(7, 'Licensed Practical Nurse', 2, 'South Vitohaven', 'Quasi sint blanditiis ipsum ex occaecati. Voluptatem sit aut non dolor.\n\nQui iste enim asperiores et dolor nihil. Quia sequi quos eum. Sed eum neque reiciendis. Reiciendis repudiandae est aut molestiae.\n\nFuga officiis numquam ad saepe autem molestiae blanditiis autem. Excepturi a occaecati esse odio. Quasi eum et reprehenderit quis aut harum suscipit exercitationem. Earum aspernatur dolor odit minima.', 'contract', 94822, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(8, 'Title Searcher', 5, 'Port Zettahaven', 'Ea eaque molestiae at ea fugiat. Magnam tempora ab in eveniet qui. Harum vel quos modi.\n\nOmnis ea et minima facilis ut. Aut reiciendis tempora eum. Tempora natus sit nam exercitationem at sit. Sapiente animi harum quidem velit fugiat voluptatem repellat numquam.\n\nOfficiis ullam voluptatem ea. Quo non inventore non esse est quaerat et. Et consequatur accusamus alias pariatur.', 'contract', 106290, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(9, 'Copy Machine Operator', 3, 'New Anikafort', 'Deleniti labore quaerat et accusantium excepturi. Nam nihil id sint fugit. Excepturi beatae molestiae unde fuga ut labore.\n\nDistinctio illum porro ea debitis voluptatem reprehenderit et. At doloremque unde quis aut numquam. Laudantium quae provident quae non ipsam iure a quo. Qui expedita tenetur voluptas molestias natus autem commodi.\n\nQuasi enim corrupti voluptas ea accusantium accusantium eligendi voluptate. Harum in saepe adipisci quis ex suscipit perspiciatis.', 'full-time', 69005, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(10, 'Construction Manager', 1, 'Devintown', 'Ea aut quod magni inventore modi. Qui alias consequatur maxime natus exercitationem asperiores. Animi magnam enim laborum nesciunt ut et cupiditate. Corporis ut est asperiores qui.\n\nSapiente tenetur quos sed. Vero sit reprehenderit porro eveniet sit ipsam dignissimos. Dolorem ea ex sit ab ea quas. Sunt debitis nihil quam non corrupti unde.\n\nEos est eos sapiente est aut optio. Molestiae tempore quisquam officia earum est eos expedita. Quod blanditiis repudiandae placeat animi aperiam. Voluptatibus temporibus quisquam sed.', 'contract', 118989, '2025-08-15 20:01:58', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(11, 'Photographic Restorer', 5, 'East Wyatt', 'Et et at fugiat odit aliquid harum labore. Voluptas delectus et aut laudantium. Voluptatem fuga perferendis eos est fugiat at earum. Dolor quidem voluptatem delectus iusto quaerat nam aut.\n\nVoluptatem omnis est molestias quis accusantium sit. Quia velit rerum sapiente quos veniam enim. Id hic ea pariatur iusto exercitationem.\n\nIusto ullam similique sit eum. Provident aliquam ut nam perferendis culpa sed veniam. Eum nihil omnis qui quas. Consequatur iste ea commodi quos pariatur aut.', 'full-time', 88468, '2025-07-31 08:18:46', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(12, 'Silversmith', 5, 'North Nola', 'Aliquam sint quia eum laborum velit. Aliquid earum aliquam rerum labore quaerat. Ipsa eos sed et eligendi ducimus. Harum ut doloribus assumenda est.\n\nQuis nihil impedit et et consequatur. In nihil facilis maxime veniam reprehenderit consequuntur. Et omnis alias similique qui doloribus laborum aliquid. Vero odit ut blanditiis est.\n\nEx quisquam ut aut nobis voluptas aspernatur consequatur. Fuga et est ea. Molestias dolorum quidem ut vitae exercitationem maiores. Quaerat ipsam et et est.', 'part-time', 33375, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(13, 'Transportation and Material-Moving', 5, 'East Treva', 'Velit omnis sit molestiae aut a. Et sint et molestiae tempore dolor officia. Quae rerum dolorem quo voluptatem. Est magnam quia quasi eum aut.\n\nUt non ipsam laboriosam expedita ipsa est. Et assumenda eius non omnis eum corrupti. Fugiat occaecati temporibus cupiditate et molestias ut.\n\nQuod quisquam velit et eius unde quibusdam molestias. Aut sint quidem sed et. Nostrum suscipit alias qui non. Ipsum at amet saepe enim.', 'part-time', 84606, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(14, 'Grinding Machine Operator', 5, 'New Bellview', 'Exercitationem facilis quas vitae sit voluptates. Non et dolorum et vero sint. Voluptates necessitatibus consequatur exercitationem illum necessitatibus vel distinctio.\n\nAsperiores ut dicta magni nemo. Culpa qui occaecati consequatur quae velit sunt et. Pariatur sint est repellendus consectetur architecto dolores. Voluptatem consectetur officiis qui soluta aut in voluptate.\n\nImpedit autem autem id perspiciatis. Dolorem odit velit eum facere. Nobis sit est ratione sed mollitia rerum rem. Quos deserunt optio ducimus dolores voluptas at.', 'internship', 46291, '2025-08-17 17:19:01', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(15, 'Tool Sharpener', 2, 'Houstonfurt', 'Sed vel deserunt nostrum numquam soluta et similique. Est voluptas quod necessitatibus. Expedita voluptas nobis qui.\n\nCum qui earum architecto repellat corporis. Consectetur a fugiat ut error quo. Deserunt exercitationem iusto odit nihil.\n\nMollitia minus sunt sint sunt. Occaecati id incidunt consequatur tempora soluta labore. Modi eos eveniet officiis aut voluptas quia et.', 'internship', 46357, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(16, 'Patrol Officer', 3, 'North Tillman', 'Dolor aut qui architecto eaque officia ducimus. Qui dolor ut ut officia quos ea reiciendis facilis. Quia iste necessitatibus et aperiam eveniet. Ipsum laboriosam porro non maiores dolores autem dolores.\n\nEx aut aspernatur maiores velit. Autem repellat velit laudantium non qui. Neque tempore beatae dolorem tempore.\n\nQuaerat velit ratione culpa qui. Eum necessitatibus quia aut minima dolor ad aut. Dolor nam amet voluptas.', 'internship', 93831, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(17, 'Data Processing Equipment Repairer', 5, 'Ambrosefort', 'Exercitationem sint iure occaecati nulla cupiditate fuga qui asperiores. Exercitationem repellendus similique sunt inventore id facere sunt. Iusto accusamus veritatis suscipit et. Est atque laborum voluptatem.\n\nDicta repellendus corrupti assumenda. Est rerum rerum quia perspiciatis provident dignissimos ducimus. Minus ab adipisci officiis eum et provident.\n\nNostrum voluptatum hic sint quam voluptas nihil aperiam. Doloremque praesentium voluptas rerum et molestiae. Voluptatem sit cumque est voluptate harum velit. Fuga nemo aut rem vel qui maiores. Quasi minima nesciunt tenetur culpa est deleniti dolor.', 'part-time', 117878, '2025-08-05 12:40:51', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(18, 'Textile Worker', 5, 'West Clayville', 'Quod voluptatibus corporis et qui sed necessitatibus id eligendi. Modi labore sed odio fugit.\n\nRatione et nostrum velit. Tempore alias laboriosam libero delectus odit explicabo nemo. Est ipsum ea quod excepturi. Maiores officiis accusamus itaque molestias a.\n\nDignissimos cum quae ratione tempore sequi. In aspernatur harum eveniet. Quibusdam velit ullam voluptatem ad qui.', 'full-time', 66152, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(19, 'Vice President Of Human Resources', 1, 'Emmytown', 'Quidem ipsa non nostrum. Quis quos consequatur enim error quidem architecto aut. Ut delectus doloribus commodi pariatur. Et sit iusto et omnis a dolores. Quia voluptates aut repudiandae est voluptatum officiis recusandae.\n\nMollitia odit libero cupiditate pariatur eius at in. Consequatur esse consequuntur non qui facilis odit. Praesentium modi corporis sint delectus. Totam quis ab quae et facilis aut doloribus.\n\nFacere quia dicta adipisci aspernatur earum et nobis quae. Et aut cum autem velit eligendi aspernatur mollitia in. Et quam qui nemo explicabo hic.', 'full-time', 34663, NULL, '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(20, 'Tailor', 2, 'Moniquetown', 'Voluptas itaque pariatur iure facere optio porro. Ex non ut ut quaerat eos ea.\n\nEst nemo autem dolore voluptas tempora. Et occaecati quam sit omnis. Molestiae nihil laboriosam iusto magni harum est. Qui ut eius placeat sequi voluptatibus harum dolores. Quam consectetur voluptatem voluptates sequi laborum praesentium in dolor.\n\nPossimus voluptatem ut qui. Non sit ipsum reiciendis maiores in eveniet.', 'contract', 34011, '2025-07-21 04:40:25', '2025-08-19 05:21:01', '2025-08-19 05:21:01'),
(21, 'Fachinformatiker Anwendungsentwicklung', 5, 'Berlin', 'Als Fachinformatiker für Anwendungsentwicklung sind Sie für die Konzeption, Entwicklung und Wartung individueller Softwarelösungen verantwortlich. Sie analysieren Anforderungen, entwickeln praxisnahe Anwendungen und optimieren bestehende Systeme. Dabei arbeiten Sie eng mit Fachabteilungen und Kunden zusammen und sorgen für eine benutzerfreundliche, performante und sichere Umsetzung.\r\n\r\nIhre Aufgaben:\r\n\r\nEntwicklung und Pflege von Softwareanwendungen\r\n\r\nAnalyse von Anforderungen und Erstellung technischer Konzepte\r\n\r\nDurchführung von Tests und Fehleranalysen\r\n\r\nDokumentation und Support der entwickelten Lösungen\r\n\r\nZusammenarbeit mit Projektteams und Anwendern\r\n\r\nIhr Profil:\r\n\r\nAbgeschlossene Ausbildung als Fachinformatiker/in Anwendungsentwicklung oder vergleichbare Qualifikation\r\n\r\nGute Kenntnisse in Programmiersprachen wie Java, C#, Python oder JavaScript\r\n\r\nErfahrung mit Datenbanken und modernen Entwicklungswerkzeugen\r\n\r\nAnalytisches Denken und Teamfähigkeit', 'full-time', 150000, '2025-08-19 09:05:00', '2025-08-19 07:10:42', '2025-08-19 08:52:21'),
(22, 'Fachinformatiker (m/w/d) Anwendungsentwicklung – Schwerpunkt PHP / Laravel / MySQL', 6, 'Berlin', 'Als Fachinformatiker für Anwendungsentwicklung mit Schwerpunkt PHP sind Sie maßgeblich an der Entwicklung und Weiterentwicklung moderner Webanwendungen beteiligt. Sie arbeiten mit aktuellen Technologien wie Laravel, PHP und MySQL (inkl. Verwaltung über phpMyAdmin) und setzen individuelle Kundenanforderungen in funktionale, skalierbare Lösungen um.\r\n\r\nIhre Aufgaben:\r\n\r\nEntwicklung und Pflege von Webanwendungen auf Basis von PHP und dem Laravel-Framework\r\n\r\nDatenbankmodellierung, -pflege und -optimierung mit MySQL/phpMyAdmin\r\n\r\nAnalyse von Anforderungen und Umsetzung technischer Konzepte\r\n\r\nDurchführung von Tests, Fehlerbehebungen und Performance-Optimierungen\r\n\r\nDokumentation der entwickelten Anwendungen sowie technischer Prozesse\r\n\r\nZusammenarbeit mit Frontend-Entwicklung, Projektmanagement und Anwendern\r\n\r\nIhr Profil:\r\n\r\nAbgeschlossene Ausbildung als Fachinformatiker/in für Anwendungsentwicklung oder vergleichbare Qualifikation\r\n\r\nSehr gute Kenntnisse in PHP sowie im Laravel-Framework\r\n\r\nErfahrung im Umgang mit MySQL-Datenbanken und phpMyAdmin\r\n\r\nVerständnis für sauberen, wartbaren Code (z. B. MVC-Strukturen, REST-APIs)\r\n\r\nSelbstständige, strukturierte Arbeitsweise und Teamfähigkeit', 'full-time', NULL, NULL, '2025-08-19 10:07:37', '2025-08-19 10:07:37');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_18_224624_create_job_listings_table', 1),
(5, '2025_08_19_071241_create_companies_table', 1),
(6, '2025_08_19_071242_create_categories_table', 1),
(7, '2025_08_19_071243_add_foreign_keys_and_pivot_for_job_listings', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sessions`
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
-- Daten für Tabelle `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('uqeLbUnlUhy6TyWSZFEz3hkx2MIT2GuS3LtyB175', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTF1VEJ3SExKa2VSOXgyZGRSRHFXZTVJZFdjcnhMZDlDNk9VR0JEbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODQ6Imh0dHA6Ly9sb2NhbGhvc3QvUHJha3Rpa3VtcyUyMFByb2pla3QlMjBTdGVsbGVuYW56ZWlnZS9TdGVsbGVuYW56ZWlnZS9wdWJsaWMvam9icy8yMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755605273);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
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
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-08-19 05:21:00', '$2y$12$ZhL/5WUmh8n4tA2NCQUyMOYTFlQCZkMDMyRp0xnSR/4uDTxMkIGS.', 'Z6ezOw5RTJ', '2025-08-19 05:21:01', '2025-08-19 05:21:01');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indizes für die Tabelle `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indizes für die Tabelle `category_job_listing`
--
ALTER TABLE `category_job_listing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_job_listing_job_listing_id_category_id_unique` (`job_listing_id`,`category_id`),
  ADD KEY `category_job_listing_category_id_foreign` (`category_id`);

--
-- Indizes für die Tabelle `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indizes für die Tabelle `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indizes für die Tabelle `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_listings_company_id_foreign` (`company_id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indizes für die Tabelle `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `category_job_listing`
--
ALTER TABLE `category_job_listing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT für Tabelle `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `category_job_listing`
--
ALTER TABLE `category_job_listing`
  ADD CONSTRAINT `category_job_listing_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_job_listing_job_listing_id_foreign` FOREIGN KEY (`job_listing_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `job_listings`
--
ALTER TABLE `job_listings`
  ADD CONSTRAINT `job_listings_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
