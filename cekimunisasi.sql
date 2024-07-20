-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 12:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cekimunisasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:2;', 1720166474),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1720166474;', 1720166474);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_checks`
--

CREATE TABLE `health_checks` (
  `check_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `hasil_pemeriksaan` text NOT NULL,
  `petugas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immunizations`
--

CREATE TABLE `immunizations` (
  `immunization_id` bigint(20) UNSIGNED NOT NULL,
  `nama_vaksin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `immunizations`
--

INSERT INTO `immunizations` (`immunization_id`, `nama_vaksin`, `created_at`, `updated_at`) VALUES
(6, 'HB0', NULL, NULL),
(7, 'BCG', NULL, NULL),
(8, 'PVC1', NULL, NULL),
(9, 'PCV2', NULL, NULL),
(10, 'DPTHBHIB1', NULL, NULL),
(11, 'DPTHBHIB2', NULL, NULL),
(12, 'DPTHBHIB3', NULL, NULL),
(13, 'POLIO1', NULL, NULL),
(14, 'POLIO2', NULL, NULL),
(15, 'POLIO3', NULL, NULL),
(16, 'POLIO4', NULL, NULL),
(17, 'IPV1', NULL, NULL),
(18, 'IPV2', NULL, NULL),
(19, 'MR', NULL, NULL),
(20, 'IRL', NULL, NULL),
(21, 'BOOSTER DPTHBHIB', NULL, NULL),
(22, 'BOOSTER MR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `immunization_records`
--

CREATE TABLE `immunization_records` (
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `immunization_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pemberian` date NOT NULL,
  `petugas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `immunization_records`
--

INSERT INTO `immunization_records` (`record_id`, `patient_id`, `immunization_id`, `tanggal_pemberian`, `petugas_id`, `created_at`, `updated_at`) VALUES
(4, 3, 9, '2001-09-14', 1, '2024-07-04 10:18:07', '2024-07-04 10:18:07'),
(5, 5, 20, '2010-08-05', 1, '2024-07-04 10:18:16', '2024-07-04 10:18:16'),
(6, 28, 22, '2024-07-30', 1, '2024-07-04 10:19:05', '2024-07-04 10:19:05'),
(7, 3, 6, '2024-10-05', 1, '2024-07-04 10:27:24', '2024-07-04 10:27:24'),
(8, 3, 8, '2024-07-05', 1, '2024-07-04 11:13:39', '2024-07-04 11:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `measurement_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `berat_badan` double NOT NULL,
  `tinggi_badan` double NOT NULL,
  `petugas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`measurement_id`, `patient_id`, `tanggal`, `berat_badan`, `tinggi_badan`, `petugas_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1973-11-10', 49, 35, 1, '2024-07-02 21:58:02', '2024-07-02 21:58:02'),
(2, 2, '1974-12-16', 39, 58, 1, '2024-07-02 21:58:07', '2024-07-02 21:58:07'),
(3, 3, '2008-05-07', 13, 47, 1, '2024-07-02 21:58:15', '2024-07-02 21:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_22_174117_create_patients_table', 1),
(5, '2024_06_22_174138_create_imunizations_table', 1),
(6, '2024_06_22_174208_create_imunization_records_table', 1),
(7, '2024_06_22_174232_create_measurements_table', 1),
(8, '2024_06_22_174254_create_health_checks_table', 1),
(9, '2024_06_23_071250_create_guardians_table', 1),
(10, '2024_07_02_072842_create_penyuluhans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `nama_balita` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `telepon_wali` varchar(255) NOT NULL,
  `email_wali` varchar(255) NOT NULL,
  `tinggi_badan_lahir` double NOT NULL,
  `berat_badan_lahir` double NOT NULL,
  `lingkar_kepala` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `nama_balita`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nama_wali`, `telepon_wali`, `email_wali`, `tinggi_badan_lahir`, `berat_badan_lahir`, `lingkar_kepala`, `created_at`, `updated_at`) VALUES
(1, 'Illum totam et exce', '2012-03-25', 'Perempuan', 'In ipsa provident ', 'Esse in est laborum', '29', 'nocilebire@mailinator.com', 95, 32, 61, '2024-07-02 21:57:46', '2024-07-02 21:57:46'),
(2, 'Culpa porro odio oc', '1981-08-22', 'Perempuan', 'Libero fuga Ipsam s', 'In et aut odit culpa', '63', 'bikowo@mailinator.com', 75, 54, 61, '2024-07-02 21:57:49', '2024-07-02 21:57:49'),
(3, 'Error quaerat totam ', '2018-12-16', 'Perempuan', 'Molestiae excepteur ', 'Laudantium nostrud ', '14', 'vybujobivi@mailinator.com', 48, 56, 49, '2024-07-02 21:57:52', '2024-07-02 21:57:52'),
(4, 'Bernice Roob', '2022-09-06', 'Perempuan', '866 Eda Roads Apt. 708\nPort Adolphus, WA 07712', 'Ms. Iliana Pfannerstill I', '+12526290976', 'enos.walsh@example.net', 58.17, 2.7, 32.31, '2024-12-01 03:55:34', '2024-07-04 09:55:53'),
(5, 'Elody Frami', '2020-10-18', 'Perempuan', '249 Gage Port\nMuellermouth, VA 44101-8558', 'Miss Kasey Conn', '856.718.7325', 'hschroeder@example.com', 49.79, 4.19, 36.63, '2024-05-11 10:53:25', '2024-07-04 09:55:53'),
(6, 'Martina Reichel', '2020-03-19', 'Perempuan', '86665 Spinka Curve\nNorth Jalynburgh, ID 26312', 'Princess Mante', '(240) 762-2241', 'oschinner@example.net', 55.94, 2.8, 39.53, '2024-09-15 08:18:30', '2024-07-04 09:55:53'),
(7, 'Mr. Freddy Luettgen Sr.', '2019-12-18', 'Laki-laki', '625 Murphy Points\nHillview, NY 49394', 'Prof. Lucas Padberg V', '520-373-5318', 'tressa11@example.net', 55.66, 2.82, 34.91, '2024-09-10 23:06:23', '2024-07-04 09:55:53'),
(8, 'Myrtice Torphy', '2022-05-01', 'Perempuan', '5122 Marielle Highway\nDickitown, OK 47724', 'Dr. Philip Hoeger', '+13124834751', 'gleason.hettie@example.net', 55.77, 3.2, 33.25, '2024-08-13 09:22:19', '2024-07-04 09:55:53'),
(9, 'Ms. Kiera Barton', '2022-07-29', 'Perempuan', '691 Joanne Meadow\nNew Caroline, AR 97226-7573', 'Pierce Senger', '904-926-3409', 'stephen.mitchell@example.org', 47.39, 2.63, 38.75, '2024-01-10 13:50:09', '2024-07-04 09:55:53'),
(10, 'Anais Farrell', '2020-01-08', 'Perempuan', '250 Schaden Road\nNew Lilyan, IL 04112-6001', 'Kristy Murphy', '+1.938.737.2479', 'hodkiewicz.domenico@example.com', 49.64, 4.28, 38.34, '2024-08-05 00:07:14', '2024-07-04 09:55:53'),
(11, 'Myrtis Funk', '2021-06-22', 'Laki-laki', '636 Walker Ports\nKaylishire, MS 92637-3469', 'Danny Davis IV', '747-400-0240', 'theresia.pfannerstill@example.com', 50.76, 4.49, 31.23, '2024-01-26 20:26:54', '2024-07-04 09:55:53'),
(12, 'Bert Hagenes', '2024-03-15', 'Laki-laki', '3337 Weissnat Rue Suite 745\nGleichnerchester, TN 86608', 'Markus Ledner', '636.510.9238', 'lpredovic@example.net', 45.09, 4.35, 35.2, '2024-02-16 13:46:41', '2024-07-04 09:55:53'),
(13, 'Louvenia Abernathy', '2021-10-25', 'Laki-laki', '74964 Morissette Road Apt. 539\nGladysville, TN 01913', 'Brenda Mitchell', '386.260.2493', 'danielle09@example.org', 51.66, 2.9, 35.09, '2024-12-28 08:26:33', '2024-07-04 09:55:53'),
(14, 'Prof. Kris Schultz III', '2022-08-31', 'Laki-laki', '592 Dominique Village\nKochstad, AZ 59851-9406', 'Rosamond Ledner', '865-457-8999', 'minnie.rodriguez@example.org', 52.57, 3.03, 36.15, '2024-04-13 23:46:39', '2024-07-04 09:55:53'),
(15, 'Isobel West', '2024-04-26', 'Laki-laki', '4413 Erika Alley\nObiemouth, OK 25055-6317', 'Kitty Orn', '740-691-7112', 'teagan.cremin@example.net', 57.24, 3.27, 33.48, '2024-01-08 11:23:54', '2024-07-04 09:55:53'),
(16, 'Dr. Kimberly Erdman DDS', '2023-12-13', 'Perempuan', '61138 Hill Manors\nDeangeloborough, MA 12163', 'Darius Grimes', '1-479-686-8213', 'jacobs.raina@example.org', 45.15, 4.36, 36, '2024-10-20 00:53:20', '2024-07-04 09:55:53'),
(17, 'Juanita Pollich', '2022-12-25', 'Perempuan', '8651 Jakayla Overpass\nNorth Nathen, MI 87246', 'Prof. Janis Reichel', '+12516813448', 'al.stamm@example.net', 53.24, 2.77, 36.03, '2024-06-10 00:36:20', '2024-07-04 09:55:53'),
(18, 'Monica Gibson', '2020-06-25', 'Perempuan', '580 Weimann Tunnel\nNew Allen, TN 45512-5545', 'Karelle Bailey', '248.445.9758', 'prosacco.wallace@example.com', 55.65, 3.21, 37.87, '2024-03-08 19:01:51', '2024-07-04 09:55:53'),
(19, 'Prof. Laisha Emmerich IV', '2021-10-29', 'Perempuan', '718 Veum Isle Suite 615\nJermaineton, MO 16283', 'Ashton Kirlin', '530.701.9552', 'bethany.lubowitz@example.net', 47.31, 2.58, 35.15, '2024-01-03 15:37:35', '2024-07-04 09:55:53'),
(20, 'Golda Marquardt', '2021-12-21', 'Laki-laki', '634 Wehner Parks Apt. 263\nVandervorthaven, IN 96115', 'Noemi Spinka', '(248) 838-2513', 'nader.arnoldo@example.net', 59.14, 2.57, 32.88, '2024-10-31 00:08:12', '2024-07-04 09:55:53'),
(21, 'Mrs. Justina Hayes III', '2022-06-30', 'Laki-laki', '161 Marvin Plain\nNew Alexis, UT 59436', 'Marshall Schneider', '+1 (907) 227-5065', 'theodore.kuhic@example.com', 53.42, 4.01, 36.55, '2024-02-08 14:59:20', '2024-07-04 09:55:53'),
(22, 'Nat Gottlieb DDS', '2020-06-03', 'Laki-laki', '691 Alfreda Unions Suite 111\nMurrayhaven, TX 75358', 'Toy Paucek', '+1-256-297-9394', 'elmo.stehr@example.com', 51.29, 2.9, 35.89, '2024-10-14 18:15:38', '2024-07-04 09:55:53'),
(23, 'Linnie Renner', '2024-05-12', 'Laki-laki', '743 Kaya Springs Suite 181\nPort Rossiemouth, OK 57246-5823', 'Dr. Muhammad Volkman', '1-682-348-7734', 'okuneva.lucio@example.com', 50.3, 4.17, 37.68, '2024-08-29 02:09:21', '2024-07-04 09:55:53'),
(24, 'Ewell Kilback', '2021-04-05', 'Perempuan', '3046 Nasir Place\nNew Zellaborough, DE 07198-9064', 'Josue Kreiger', '251.370.6211', 'leannon.abe@example.net', 59.94, 3.05, 32.71, '2024-12-21 18:05:27', '2024-07-04 09:55:53'),
(25, 'Royal Bradtke', '2024-06-22', 'Perempuan', '16973 Laila Prairie Apt. 266\nSabinastad, MD 98421-4041', 'Virgil Rodriguez', '575-978-3581', 'collins.maryjane@example.com', 53.67, 3.63, 39.87, '2024-08-25 15:45:36', '2024-07-04 09:55:53'),
(26, 'Erin Kovacek', '2020-08-14', 'Perempuan', '275 Hansen Crossroad Suite 283\nPort Benny, CO 97606-7246', 'Prof. Tavares Roob DDS', '(765) 521-3579', 'mittie93@example.com', 47.75, 3.03, 33.31, '2024-03-20 16:43:49', '2024-07-04 09:55:53'),
(27, 'Alisa Heller', '2020-11-24', 'Perempuan', '973 Luis Isle\nHyatthaven, SC 62461', 'Prof. Greta Kris I', '(757) 323-7237', 'camden.nitzsche@example.com', 54.46, 4.24, 34.99, '2024-05-23 04:48:33', '2024-07-04 09:55:53'),
(28, 'Dina Gerhold I', '2020-05-28', 'Laki-laki', '54665 Rau View Suite 931\nWest Leilaport, CT 18125', 'Edwina Hartmann', '+12405334250', 'destin16@example.com', 56.65, 2.69, 39.74, '2024-08-14 01:31:10', '2024-07-04 09:55:53'),
(29, 'Prof. Wilma Smith', '2023-05-21', 'Perempuan', '1649 Hermiston Manor\nWest Jamir, CA 50287-6088', 'Nathanael Hayes', '682-828-2831', 'brakus.evangeline@example.com', 52.8, 4.3, 30.6, '2024-10-02 11:49:28', '2024-07-04 09:55:53'),
(30, 'Domenick Doyle IV', '2021-08-17', 'Perempuan', '22350 Rosetta Corners Apt. 713\nLaurianneville, NJ 51586', 'Macey Runolfsdottir', '+1 (857) 340-7218', 'bahringer.nellie@example.com', 55.24, 3.96, 39.34, '2024-04-01 12:27:46', '2024-07-04 09:55:53'),
(31, 'Fausto Pollich IV', '2020-07-09', 'Perempuan', '908 Botsford Key\nScottiemouth, AZ 58144-7304', 'Oceane Konopelski', '+1 (781) 571-6117', 'helga.grady@example.net', 52.86, 2.62, 30.33, '2024-07-29 17:21:35', '2024-07-04 09:55:53'),
(32, 'Cooper Schroeder', '2020-06-25', 'Laki-laki', '9649 Keebler Lights Apt. 881\nPort Mikayla, TX 29331-2395', 'Dayna Bernhard II', '718.990.0919', 'tschowalter@example.com', 47.93, 4.4, 36.15, '2024-04-21 22:37:13', '2024-07-04 09:55:53'),
(33, 'Emile Brekke', '2021-08-29', 'Perempuan', '26978 Stracke Mount\nNew Crawford, OK 79601-4325', 'Dr. Donato McClure', '336-408-3353', 'jace.fahey@example.net', 47.34, 2.86, 39.81, '2024-09-14 16:28:27', '2024-07-04 09:55:53'),
(34, 'Javon Watsica', '2020-09-28', 'Perempuan', '613 Ward Island\nKohlerborough, WA 80330', 'Katelin Rogahn', '+1-410-276-5795', 'emard.jewell@example.org', 50.66, 2.81, 34.93, '2024-11-05 12:12:21', '2024-07-04 09:55:53'),
(35, 'Amari Wisozk', '2022-08-19', 'Laki-laki', '70525 Thiel Centers Apt. 945\nGladysville, MN 34779-0200', 'Dan Cruickshank', '1-978-419-3757', 'dandre.mann@example.com', 57.34, 3.26, 37.39, '2024-02-01 03:00:08', '2024-07-04 09:55:53'),
(36, 'Damon Leuschke', '2022-07-13', 'Laki-laki', '390 Aliya Crossing Suite 584\nEast Sethburgh, IN 97590', 'Simeon Osinski', '+1 (678) 216-9316', 'ymorar@example.com', 59.72, 4.45, 31.88, '2024-01-29 17:43:26', '2024-07-04 09:55:53'),
(37, 'Thalia Mosciski', '2020-12-17', 'Perempuan', '77484 Mayert Turnpike Apt. 211\nSouth Moniquefort, PA 94373', 'Dr. Sylvia Grimes', '+1.678.700.0509', 'lind.ambrose@example.com', 48.76, 3.56, 31.21, '2024-08-14 08:27:39', '2024-07-04 09:55:53'),
(38, 'Maximillia Beahan', '2024-06-08', 'Laki-laki', '71481 Robbie Green Apt. 156\nIvoryton, IL 91724-0352', 'Berry Waelchi', '+1-414-588-5836', 'rkeebler@example.org', 50.13, 4.39, 32.15, '2024-01-17 11:08:46', '2024-07-04 09:55:53'),
(39, 'Kelly Jenkins', '2023-11-14', 'Perempuan', '9353 Stiedemann Mountains\nKatelinchester, CO 52743-3635', 'Braden Willms', '860.996.9106', 'hazel70@example.com', 46.71, 3.25, 37.56, '2024-07-24 09:56:06', '2024-07-04 09:55:53'),
(40, 'Gideon Toy', '2021-08-12', 'Laki-laki', '72336 Hane Mews\nMilanside, VT 66667-5086', 'Erwin Keebler', '539.865.8576', 'mitchell.brianne@example.net', 56.36, 3.91, 37.7, '2024-02-12 05:00:41', '2024-07-04 09:55:53'),
(41, 'Dr. Deshaun Kreiger', '2022-06-17', 'Laki-laki', '80350 Terrill Hills\nBeattyville, WY 14634', 'Nayeli Kuhlman', '385-961-8986', 'danika86@example.com', 55.61, 3.43, 30.24, '2024-04-21 08:21:35', '2024-07-04 09:55:53'),
(42, 'Kayleigh Cummings', '2020-03-25', 'Laki-laki', '6858 Thiel Rapids Apt. 753\nSouth Willardview, OR 76718-9130', 'Garett Jerde V', '843.957.7895', 'austyn.mosciski@example.com', 47.56, 2.66, 37.34, '2024-04-24 18:34:16', '2024-07-04 09:55:53'),
(43, 'Prof. Ashley Marks', '2021-01-27', 'Laki-laki', '571 O\'Connell View\nCamronmouth, RI 60561', 'Meredith Sanford', '+1 (304) 218-7602', 'jacques.satterfield@example.net', 45.21, 3.14, 32.45, '2024-04-14 10:28:00', '2024-07-04 09:55:53'),
(44, 'Jedidiah Torphy DVM', '2020-12-03', 'Perempuan', '8008 Dan Green Suite 670\nDinomouth, AR 01234-1026', 'Melvin Smitham', '+1 (714) 932-5556', 'fredy91@example.com', 53.26, 2.66, 32.28, '2024-07-19 09:49:31', '2024-07-04 09:55:53'),
(45, 'Demetrius Gislason', '2022-02-15', 'Laki-laki', '9776 Jaskolski Wells Suite 049\nJarvisshire, HI 83121-7817', 'Reyna Baumbach', '(332) 392-5009', 'makenna34@example.com', 52.04, 2.79, 38.95, '2024-07-14 10:09:45', '2024-07-04 09:55:53'),
(46, 'Cloyd Hermann', '2022-01-05', 'Laki-laki', '56616 Kelvin Curve Suite 616\nWizaland, DC 46191', 'Prof. Bernardo Jenkins', '424.631.0290', 'alexandra82@example.com', 49.44, 3.02, 38, '2024-05-27 03:56:01', '2024-07-04 09:55:53'),
(47, 'Adelbert Hayes', '2021-01-09', 'Perempuan', '73101 Yadira Summit\nGiovannaberg, WI 12055', 'Jeffrey Cassin Sr.', '463.610.9433', 'rico12@example.org', 56.67, 2.62, 37.6, '2024-05-21 19:09:27', '2024-07-04 09:55:53'),
(48, 'Prof. David Douglas PhD', '2020-09-28', 'Perempuan', '5397 Kilback Track\nGerrytown, UT 88897-5791', 'Murl Schimmel', '+1 (657) 682-3845', 'jeremie.heathcote@example.org', 46.16, 3.49, 37.68, '2024-04-24 16:22:54', '2024-07-04 09:55:53'),
(49, 'Prof. Vernie Hagenes', '2022-07-18', 'Laki-laki', '16381 Asia Creek\nTurcottefort, OR 48602-0297', 'Marge Green', '+1 (445) 485-2174', 'tanner17@example.net', 49.6, 2.8, 39.15, '2024-08-08 14:10:09', '2024-07-04 09:55:53'),
(50, 'Mrs. Ethyl Kreiger', '2023-05-26', 'Perempuan', '70503 Shields Course Suite 821\nDejafurt, AL 70073-4334', 'Dr. Keyon Wilkinson I', '510.250.1555', 'arnoldo.mcclure@example.net', 50.05, 4.05, 32.03, '2024-03-28 23:27:30', '2024-07-04 09:55:53'),
(51, 'Conrad McClure', '2024-02-14', 'Perempuan', '9124 Gaylord Pass Apt. 466\nMariannaton, ND 06730-4756', 'Makenzie Boyle', '+1-737-368-5861', 'hermiston.kaelyn@example.org', 50.21, 3.41, 35.71, '2024-06-07 05:56:05', '2024-07-04 09:55:53'),
(52, 'Estrella Pagac', '2020-06-06', 'Perempuan', '83424 Effertz Ford\nBoyleside, KS 90029', 'Fay Collier', '+1.469.751.8140', 'hermann.nadia@example.com', 59.06, 3.18, 31.71, '2024-08-17 20:14:05', '2024-07-04 09:55:53'),
(53, 'Stevie Koepp', '2021-05-09', 'Laki-laki', '478 Twila Rest Apt. 333\nMaggieville, NY 72852', 'Elisha Littel', '+1-984-423-9170', 'harvey.aaliyah@example.org', 47.31, 3.03, 37.58, '2024-12-17 23:24:55', '2024-07-04 09:55:53'),
(54, 'Annabell Ondricka', '2023-12-12', 'Laki-laki', '256 Otha Ford Suite 514\nMorissetteview, NY 38997-7425', 'Helene Zieme DVM', '480-627-4788', 'nnader@example.org', 57.36, 3.59, 34.5, '2024-09-11 07:33:27', '2024-07-04 09:55:53'),
(55, 'Mr. Aron Satterfield DDS', '2020-01-06', 'Laki-laki', '22695 Wintheiser Village\nKearafort, MT 04105', 'Prince Harvey Sr.', '+1 (417) 495-7399', 'lennie92@example.com', 55.05, 4.31, 39.88, '2024-07-06 02:15:03', '2024-07-04 09:55:53'),
(56, 'Miss Talia Murray MD', '2024-03-07', 'Perempuan', '58348 Rosella Course Suite 557\nNew Andreaneshire, UT 29419', 'Jovan Feest', '351-462-1291', 'luettgen.monserrate@example.net', 48.11, 3.84, 30.23, '2024-04-29 00:58:45', '2024-07-04 09:55:53'),
(57, 'Darby Willms', '2020-12-12', 'Laki-laki', '8100 Barton Walk Suite 627\nNew Ruthe, CO 84069', 'Prof. Gussie West IV', '+1-323-350-1060', 'ratke.eddie@example.net', 47.53, 3.61, 36.9, '2024-10-26 18:54:20', '2024-07-04 09:55:53'),
(58, 'Theodore Fisher', '2023-02-07', 'Perempuan', '1116 Quentin Stravenue\nLake Celestinotown, ND 94820', 'Andrew DuBuque', '(419) 890-3985', 'rossie.willms@example.net', 46.55, 3.94, 30.16, '2024-04-26 15:22:06', '2024-07-04 09:55:53'),
(59, 'Jerrold Mertz', '2024-05-03', 'Laki-laki', '5242 Lind Views Suite 077\nPfefferstad, MO 94791', 'Miss Justina Mraz', '+1-361-559-6229', 'johnson.vena@example.net', 46.38, 3.23, 37.77, '2024-08-14 04:42:21', '2024-07-04 09:55:53'),
(60, 'Axel Conn', '2020-09-27', 'Laki-laki', '92276 Alexzander Springs Apt. 754\nDarronberg, CA 47232', 'Fletcher Roob', '+1 (938) 635-0752', 'yheathcote@example.org', 51.94, 3.51, 30.58, '2024-09-23 17:10:25', '2024-07-04 09:55:53'),
(61, 'Sherman Hagenes', '2019-09-25', 'Perempuan', '77430 Frami Summit\nHillschester, ND 71409-4882', 'Audreanne Medhurst MD', '+1-763-797-8765', 'glover.orpha@example.org', 54.86, 4.28, 35.07, '2024-09-19 10:04:46', '2024-07-04 09:55:53'),
(62, 'Soledad Kunze DVM', '2022-08-20', 'Laki-laki', '521 Terry Landing Apt. 418\nEast Eliane, VT 86580', 'Zane Dibbert', '+1-458-960-1902', 'hudson.maribel@example.com', 46.42, 2.77, 30.49, '2024-12-17 12:13:20', '2024-07-04 09:55:53'),
(63, 'Iva Kris', '2019-07-27', 'Laki-laki', '77131 Marlene Lakes Suite 369\nHarberfort, NJ 35793', 'Mr. Ludwig Wuckert I', '1-229-741-2483', 'ebartell@example.org', 47.24, 2.56, 35.28, '2024-02-21 18:55:02', '2024-07-04 09:55:53'),
(64, 'Shana Kuphal', '2020-03-31', 'Laki-laki', '466 Annamae Corners Apt. 773\nOlsonburgh, AL 24762-8156', 'Dolly Rolfson Sr.', '831.709.5241', 'pattie75@example.net', 45.3, 4.07, 33.81, '2024-08-22 21:54:41', '2024-07-04 09:55:53'),
(65, 'Moses Haag DVM', '2019-10-09', 'Perempuan', '9466 Moen Way\nNorth Granvilleburgh, AZ 51823', 'Mr. Demario Kassulke', '+1-609-796-7028', 'ignatius43@example.com', 49.59, 3.09, 35.19, '2024-09-06 20:39:34', '2024-07-04 09:55:53'),
(66, 'Dr. Orin Abbott', '2022-05-11', 'Perempuan', '33869 Strosin Shores\nSouth Lindamouth, OH 41700', 'Prof. Roscoe Lehner', '1-641-849-9650', 'fahey.della@example.com', 55.39, 4.35, 36.13, '2024-06-21 22:50:36', '2024-07-04 09:55:53'),
(67, 'Lorena Braun MD', '2024-02-23', 'Perempuan', '23099 Leffler Estate Apt. 393\nSouth Lawrenceburgh, KS 02653', 'Dr. Ari Mayer', '+12813892514', 'assunta.frami@example.org', 58.12, 4.31, 33.97, '2024-08-14 11:23:25', '2024-07-04 09:55:53'),
(68, 'Mrs. Kelsi Wiza', '2020-11-12', 'Laki-laki', '187 Quigley Turnpike Apt. 354\nPort Damaris, MI 34495', 'May Lubowitz', '559-219-6715', 'torrey.nicolas@example.net', 46.05, 3.75, 30.38, '2024-08-28 09:32:49', '2024-07-04 09:55:53'),
(69, 'Lottie Beatty III', '2023-05-15', 'Laki-laki', '66063 Elena Highway Suite 747\nSouth Roosevelt, GA 20184', 'Ella Fahey Jr.', '+12835314941', 'cielo.hackett@example.com', 52.45, 3.29, 37.54, '2024-12-05 09:08:44', '2024-07-04 09:55:53'),
(70, 'Johnathan Feil', '2023-12-20', 'Laki-laki', '162 Auer Pass\nMillsville, AL 26262', 'Tatum Renner', '1-863-550-3332', 'layne45@example.net', 50.46, 4.46, 39.26, '2024-06-05 11:38:15', '2024-07-04 09:55:53'),
(71, 'Prof. Darwin Spencer', '2022-04-15', 'Laki-laki', '9594 King Mountain\nKautzermouth, VT 58165', 'Jerrod Hudson', '+15205946001', 'hailey23@example.org', 46.96, 3.82, 37.15, '2024-12-19 23:00:56', '2024-07-04 09:55:53'),
(72, 'Tia Bogan', '2020-06-06', 'Laki-laki', '6459 Altenwerth Forest\nLake Estevan, CA 06139', 'Dee Greenfelder', '+1-757-325-4877', 'stephania65@example.net', 52.24, 3.64, 35.9, '2024-08-22 21:46:40', '2024-07-04 09:55:53'),
(73, 'Marquise Stark', '2020-09-09', 'Laki-laki', '76595 Terrance Ford Apt. 421\nEast Marcia, TN 93197', 'Osbaldo Parisian IV', '1-463-912-5611', 'keaton.borer@example.net', 57.42, 2.9, 36.92, '2024-05-28 04:58:17', '2024-07-04 09:55:53'),
(74, 'Dr. Ryder Wiegand I', '2023-07-09', 'Laki-laki', '62315 Gerard Club\nBonniebury, AZ 78337', 'Prof. Rhianna Bins MD', '918-546-6618', 'jeanne92@example.com', 55.7, 3.19, 34.42, '2024-03-09 07:22:05', '2024-07-04 09:55:53'),
(75, 'Kenya McCullough', '2024-07-02', 'Laki-laki', '23770 Murray Mount\nSchneidermouth, MT 97759-3839', 'Furman Walsh', '+1.609.607.4932', 'cruickshank.susanna@example.net', 57.1, 4.38, 39.05, '2024-09-19 01:21:14', '2024-07-04 09:55:53'),
(76, 'Prof. Jordy Prosacco', '2019-12-19', 'Laki-laki', '2742 Demond Well\nGreenbury, PA 99306', 'Nella Grant', '1-364-323-5908', 'rhea07@example.org', 49.14, 2.77, 33.9, '2024-01-07 02:52:04', '2024-07-04 09:55:53'),
(77, 'Earline Muller', '2023-09-04', 'Perempuan', '20279 Heidenreich Falls Suite 171\nJacobiborough, HI 62968-4790', 'Dr. Emiliano Smitham DDS', '909-296-2770', 'okeefe.destini@example.net', 58.01, 2.75, 37.04, '2024-12-19 06:47:16', '2024-07-04 09:55:53'),
(78, 'Dr. Dillan Nolan V', '2023-11-20', 'Perempuan', '401 Olson Greens Suite 264\nKemmerfurt, KS 04188-6652', 'Patience Lebsack', '971-702-8220', 'godfrey.barrows@example.org', 53.29, 2.75, 34.59, '2024-11-10 22:29:34', '2024-07-04 09:55:53'),
(79, 'Mrs. Beulah Pfeffer DVM', '2020-07-13', 'Laki-laki', '781 Runte Islands Apt. 494\nPort Jaydon, NE 02871', 'Abdullah Breitenberg', '828-285-0690', 'caterina72@example.net', 55.89, 3.92, 33.07, '2024-03-26 21:07:44', '2024-07-04 09:55:53'),
(80, 'Cody Okuneva', '2023-10-23', 'Laki-laki', '400 Burnice Cliff\nEast Ewald, MA 94207', 'Charlene Williamson', '+1.347.281.5294', 'seamus.donnelly@example.org', 50.34, 3.27, 31.18, '2024-09-25 04:31:34', '2024-07-04 09:55:53'),
(81, 'Crystal Bogan', '2022-02-25', 'Laki-laki', '2397 Keebler Loaf Suite 460\nColeside, MN 32044-2707', 'Fatima Hamill', '+1 (469) 659-4636', 'xjohnston@example.org', 55.22, 4.5, 31.16, '2024-04-22 23:15:42', '2024-07-04 09:55:53'),
(82, 'Prof. Eloise Moen', '2021-05-16', 'Laki-laki', '85760 Joel Port\nDallinshire, MD 63499-1042', 'Brad Halvorson III', '1-410-678-3642', 'hirthe.sabina@example.org', 45.54, 3.07, 37.66, '2024-09-02 12:35:22', '2024-07-04 09:55:53'),
(83, 'Ms. Danyka Hilpert DVM', '2021-02-14', 'Laki-laki', '67835 Kautzer Shoals Apt. 726\nGrimesborough, HI 97539', 'Viva Kuhn III', '352.397.7704', 'jordane.prosacco@example.org', 57.06, 3.35, 37.08, '2024-12-01 04:07:42', '2024-07-04 09:55:53'),
(84, 'Cielo Goyette', '2020-07-21', 'Perempuan', '69721 Noemie Skyway Suite 024\nGusikowskifurt, FL 86022-7460', 'Garland Waelchi', '(854) 326-8689', 'madie.rau@example.com', 53.92, 3.33, 36.8, '2024-04-13 04:55:05', '2024-07-04 09:55:53'),
(85, 'Frieda Heller', '2022-08-13', 'Perempuan', '91261 Parisian Throughway Suite 896\nSmithamshire, IA 12685', 'Candido Schaefer', '201-932-8870', 'pdavis@example.net', 49.17, 2.82, 30.69, '2024-08-22 02:38:51', '2024-07-04 09:55:53'),
(86, 'Miss Rosetta Kovacek', '2023-10-02', 'Laki-laki', '5734 Weissnat Rapids\nPort Odellland, ME 29720', 'Cristal Abbott V', '219.218.4752', 'amina61@example.net', 59.97, 4.14, 33.65, '2024-04-11 05:34:32', '2024-07-04 09:55:53'),
(87, 'Dr. Ernie Robel DDS', '2021-05-13', 'Perempuan', '7357 Predovic Pike Suite 278\nWest Sibylland, OK 05756-6870', 'Roderick Mayert', '+1.662.653.0849', 'gwen.hoppe@example.com', 52.26, 2.72, 36.31, '2024-12-30 16:11:45', '2024-07-04 09:55:53'),
(88, 'Prof. Pablo Armstrong', '2023-01-29', 'Perempuan', '5285 Lenore Wells\nAngusshire, AL 82139-2935', 'Norberto Kuvalis', '+1.734.850.5467', 'reynolds.kirsten@example.net', 56.23, 3.21, 31.9, '2024-01-09 04:21:53', '2024-07-04 09:55:53'),
(89, 'Serena West', '2022-04-23', 'Perempuan', '375 Nienow Junctions Suite 649\nKirlinview, PA 58124', 'Suzanne Schuster', '757.428.1467', 'magdalen72@example.com', 58.23, 2.95, 30.38, '2024-12-05 15:11:09', '2024-07-04 09:55:53'),
(90, 'Carlee Eichmann', '2020-04-02', 'Perempuan', '607 DuBuque Hills Apt. 173\nAylinfort, MT 51185-1643', 'Brisa Lebsack', '409.475.5152', 'juliet.waters@example.com', 53.33, 4.15, 32.91, '2024-07-11 22:18:41', '2024-07-04 09:55:53'),
(91, 'Jaime Corkery II', '2021-01-19', 'Perempuan', '307 Hyatt Hills Apt. 851\nWymanberg, GA 25176', 'Gussie Sauer', '401-874-5938', 'dbecker@example.com', 50.26, 3.93, 36.36, '2024-01-03 05:34:06', '2024-07-04 09:55:53'),
(92, 'Mr. Dayne Rempel', '2023-08-31', 'Laki-laki', '938 Mraz Station\nNew Rosariofurt, PA 50580', 'Missouri Schneider', '469.273.3423', 'winona.kozey@example.com', 45.01, 3.76, 34.77, '2024-03-20 02:22:25', '2024-07-04 09:55:53'),
(93, 'Hal Senger', '2024-04-11', 'Laki-laki', '878 Suzanne Court\nYazminside, VT 62264-9302', 'Mr. Evan Hahn', '+1-234-335-7480', 'baumbach.chet@example.com', 55.42, 3.39, 35.87, '2024-11-22 04:01:50', '2024-07-04 09:55:53'),
(94, 'Aisha Brekke Sr.', '2024-04-24', 'Perempuan', '864 Cole Harbor\nKuphalland, DE 04714-9931', 'Amelie Bahringer MD', '1-806-780-1863', 'emiller@example.net', 50.6, 2.59, 38.64, '2024-12-10 03:49:04', '2024-07-04 09:55:53'),
(95, 'Herta Dietrich MD', '2020-10-22', 'Laki-laki', '2365 Eichmann Squares Suite 825\nNew Judd, MT 03985-4624', 'Mrs. Elise Dietrich', '+1-580-242-3847', 'helga.sporer@example.net', 56.05, 3.28, 39.24, '2024-06-25 05:04:21', '2024-07-04 09:55:53'),
(96, 'Shane Crist', '2020-10-13', 'Laki-laki', '562 Ryley Manor\nEast Lionel, AK 60778', 'Sidney Dare', '+19384195515', 'erling72@example.org', 59.34, 3.12, 39.94, '2024-01-05 09:26:15', '2024-07-04 09:55:53'),
(97, 'Dr. Annabelle Rippin V', '2022-06-21', 'Perempuan', '3087 Newton Port\nPort Letitia, WV 19595', 'Mrs. Fatima Reilly', '+1 (415) 484-6997', 'eleanora65@example.org', 58.06, 3.99, 38.73, '2024-11-19 03:53:14', '2024-07-04 09:55:53'),
(98, 'Lizeth Boehm', '2022-05-20', 'Perempuan', '428 Shawn Roads Apt. 164\nLake Gennaroside, KY 92720-8205', 'Maryse Kilback', '+1-947-718-4028', 'clarissa28@example.com', 53.87, 3.69, 34.4, '2024-01-26 00:22:13', '2024-07-04 09:55:53'),
(99, 'Ines Hodkiewicz II', '2020-02-17', 'Laki-laki', '451 Juwan Shores\nPort Milesbury, OH 43225-4563', 'Mr. Oswald Kris Sr.', '731.853.6852', 'ondricka.briana@example.com', 50.79, 2.93, 37.42, '2024-03-08 15:23:26', '2024-07-04 09:55:53'),
(100, 'Whitney Wintheiser', '2020-07-19', 'Laki-laki', '19395 Janelle Ramp Apt. 792\nNew Mable, IL 68260-2670', 'Melody West', '1-828-719-7526', 'dorris.mayert@example.org', 47.29, 2.56, 37.74, '2024-05-14 17:58:35', '2024-07-04 09:55:53'),
(101, 'Creola Eichmann', '2023-01-22', 'Laki-laki', '2001 Ryan Ports Suite 521\nNorth Seamushaven, CO 59636', 'Reyna Murazik', '(909) 849-6232', 'percy.veum@example.org', 53.71, 3.94, 35.06, '2024-10-02 21:03:14', '2024-07-04 09:55:53'),
(102, 'Kayley Harris II', '2023-02-06', 'Perempuan', '142 Doug Islands Apt. 427\nLottieside, NE 41623', 'Dillon Bernier', '+1-469-657-0876', 'krista83@example.net', 54.77, 2.76, 38.3, '2024-05-11 01:56:11', '2024-07-04 09:55:53'),
(103, 'Roy Kulas', '2022-02-08', 'Perempuan', '313 Naomi Radial\nKonopelskiton, PA 28610-0205', 'Vern Reichel Sr.', '661-932-5468', 'elroy.ratke@example.org', 58.14, 3.31, 35.77, '2024-06-18 05:00:36', '2024-07-04 09:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `penyuluhans`
--

CREATE TABLE `penyuluhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Gn8V7W5iPAzTVWW6H0kOZkxfroXbbiKcMLGQ5QHs', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoib2w4MVhoSW9KVjRMb2REVXNsdFE3MU16bEYyd3k5bUhBdk9sQk9NSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9jZWtpbXVuaXNhc2kudGVzdC9hZG1pbi9pbXVuaXphdGlvbi1yZWNvcmRzIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiR6TWd4RHRwMjJ0UmlTYjBLU09ld2VlSURyVXdOZVlKWXpDa0lPNzJSbjZUY2NyME1kSWtIQyI7fQ==', 1720166527);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas_kesehatan','petugas_pendaftaran','kepala_puskesmas') NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nisa', 'admin@gmail.com', NULL, '$2y$12$eH6dJJ4z2DrtCd61pm1nQewWO7z9Jr77X60fOn11D8V87CQY8Xi.y', 'admin', NULL, '2024-07-02 21:56:59', '2024-07-02 21:56:59'),
(2, 'budi', 'petkes@gmail.com', NULL, '$2y$12$zMgxDtp22tRiSb0KSOeweeIDrUwNeYJYzCkIO72Rn6Tccr0MdIkHC', 'petugas_kesehatan', NULL, NULL, NULL),
(3, 'putri', 'petpen@gmail.com', NULL, '$2y$12$Bi86VQUpP7wquyW0p8slpeDliyh/va4J48Ulnf8dCoy0qPJiE/LEe', 'petugas_pendaftaran', NULL, NULL, NULL),
(4, 'arjuna', 'leader@gmail.com', NULL, '$2y$12$eQxwLI8o4i87nZyytS8OreOD62ALXxsv03yfLWGYJjzcvs2tb7wr.', 'kepala_puskesmas', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guardians_email_unique` (`email`);

--
-- Indexes for table `health_checks`
--
ALTER TABLE `health_checks`
  ADD PRIMARY KEY (`check_id`),
  ADD KEY `health_checks_patient_id_foreign` (`patient_id`),
  ADD KEY `health_checks_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `immunizations`
--
ALTER TABLE `immunizations`
  ADD PRIMARY KEY (`immunization_id`);

--
-- Indexes for table `immunization_records`
--
ALTER TABLE `immunization_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `immunization_records_patient_id_foreign` (`patient_id`),
  ADD KEY `immunization_records_immunization_id_foreign` (`immunization_id`),
  ADD KEY `immunization_records_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`measurement_id`),
  ADD KEY `measurements_patient_id_foreign` (`patient_id`),
  ADD KEY `measurements_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `penyuluhans`
--
ALTER TABLE `penyuluhans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_checks`
--
ALTER TABLE `health_checks`
  MODIFY `check_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `immunizations`
--
ALTER TABLE `immunizations`
  MODIFY `immunization_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `immunization_records`
--
ALTER TABLE `immunization_records`
  MODIFY `record_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `measurement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `penyuluhans`
--
ALTER TABLE `penyuluhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `health_checks`
--
ALTER TABLE `health_checks`
  ADD CONSTRAINT `health_checks_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `health_checks_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `immunization_records`
--
ALTER TABLE `immunization_records`
  ADD CONSTRAINT `immunization_records_immunization_id_foreign` FOREIGN KEY (`immunization_id`) REFERENCES `immunizations` (`immunization_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `immunization_records_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `immunization_records_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `measurements_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `measurements_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
