-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 06:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dr_at_door`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospitalId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `scheduleId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards_achievements`
--

CREATE TABLE `awards_achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `detail`, `photo`, `doctorId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bloag 1', 'Blog', '1695202131.jpg', 2, 'Deleted', '2023-09-20 03:58:51', '2023-09-20 04:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stateId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `stateId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 1, 'Active', '2023-09-20 01:36:56', '2023-09-20 01:36:56'),
(2, 'Surendranagar', 1, 'Active', '2023-09-20 02:18:39', '2023-09-20 02:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospitalId` int(11) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `specialistId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `registerNumber` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `hospitalId`, `doctorName`, `contactNo`, `specialistId`, `userId`, `photo`, `experience`, `registerNumber`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dr. J.K. Shah', '7485963214', 11, 4, '1695204979.jpg', '5 Years', '123456', 'Active', '2023-09-20 01:56:26', '2023-09-20 04:46:19'),
(2, 2, 'Dr. B.D. Vaghela', '8347734731', 3, 1, '1695195739.jpg', '3 Years', '123456', 'Active', '2023-09-20 02:12:19', '2023-09-20 02:12:19'),
(3, 1, 'Dr. R.H. Parmar', '1234567890', 9, 1, '1695195857.webp', '5 Years', '123456', 'Active', '2023-09-20 02:14:17', '2023-09-20 02:14:17'),
(4, 1, 'Dr. N.H. Parmar', '9876543210', 14, 1, '1695195908.jpg', '5 Years', '1234', 'Active', '2023-09-20 02:15:08', '2023-09-20 02:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` int(11) NOT NULL,
  `education` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `doctorId`, `education`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'MBBS', 'Active', '2023-09-20 03:59:16', '2023-09-20 03:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospitalId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `hospitalId`, `title`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Operation  Theater', '1695195061.jpg', 'Active', '2023-09-20 02:01:01', '2023-09-20 02:01:01'),
(2, 2, 'Other', '1695205003.jpg', 'Active', '2023-09-20 02:08:09', '2023-09-20 04:46:43'),
(3, 1, 'Faciltity', '1695196009.webp', 'Active', '2023-09-20 02:16:49', '2023-09-20 02:16:49'),
(4, 1, 'Mediation', '1695196038.webp', 'Active', '2023-09-20 02:17:18', '2023-09-20 02:17:18');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospitalId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `hospitalId`, `title`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Building', '1695195131.jpg', 'Active', '2023-09-20 02:00:15', '2023-09-20 02:02:11'),
(2, 2, 'Other', '1695202425.jpg', 'Active', '2023-09-20 02:07:33', '2023-09-20 04:03:45'),
(3, 1, 'Operation Theater', '1695195941.jpg', 'Active', '2023-09-20 02:15:41', '2023-09-20 02:15:41'),
(4, 1, 'Gallery 1', '1695195962.webp', 'Active', '2023-09-20 02:16:02', '2023-09-20 02:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospitalName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `cityId` int(11) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `hospitalTypeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `siteUrl` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `hospitalLogo` varchar(255) NOT NULL,
  `hospitalTime` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hospitalName`, `address`, `cityId`, `contactNo`, `hospitalTypeId`, `userId`, `siteUrl`, `category`, `hospitalLogo`, `hospitalTime`, `services`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Narayana Hospital', 'Nr. Chakudiya Mahadev, Rakhial Cross Road , Opp. Rakhial Police Station, Rakhial\r\nAhmedabad, Gujarat - 380023', 1, '18003090309', 1, 1, 'https://www.narayanahealth.org/hospitals/ahmedabad/narayana-multispeciality-hospital-ahmedabad', 'Alopethi', '1695194020.jpg', '11:00', 'Paediatric and Adult Cardiac, Neurology, Orthopaedics, Nephrology & Urology, Obstetrics & Gynecology', 'Active', '2023-09-20 01:43:40', '2023-09-20 01:43:40'),
(2, 'Civil Hospital', '“D” block, Office of the Medical -\r\nSuperintendent Civil Hospital,\r\nAsarwa, Ahmedabad-380 016.', 1, '079-22683421', 1, 1, 'https://civilhospitalahd.gujarat.gov.in/', 'Homiopethi', '1695194358.jpg', '24*7', 'Inpatient ,Outpatient ,Emergency Care , Ancillary & Support Services , Hospital Statistics , Patient Guide , Departments, Unit, Activities ,', 'Active', '2023-09-20 01:49:18', '2023-09-20 01:49:18'),
(3, 'Medico Hospital', 'Surenrnagar', 2, '8527419630', 3, 1, 'http://127.0.0.1:8000/admin/hospital-create', 'Aayurvedi', '1695196212.jpg', '24*7', 'Paediatric and Adult Cardiac, Neurology, Orthopaedics, Nephrology & Urology, Obstetrics & Gynecology', 'Active', '2023-09-20 02:20:12', '2023-09-20 02:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_types`
--

CREATE TABLE `hospital_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `typeName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_types`
--

INSERT INTO `hospital_types` (`id`, `typeName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Multi Specialist', 'Active', '2023-09-20 01:22:56', '2023-09-20 01:22:56'),
(2, 'Women’s hospitals', 'Active', '2023-09-20 01:34:47', '2023-09-20 01:34:47'),
(3, 'Children’s hospitals', 'Active', '2023-09-20 01:35:03', '2023-09-20 01:35:03'),
(4, 'Cardiac hospitals', 'Active', '2023-09-20 01:35:11', '2023-09-20 01:35:11'),
(5, 'Oncology hospitals', 'Active', '2023-09-20 01:35:18', '2023-09-20 01:35:18'),
(6, 'Psychiatric hospitals', 'Active', '2023-09-20 01:35:25', '2023-09-20 01:35:25'),
(7, 'Trauma centers', 'Active', '2023-09-20 01:35:36', '2023-09-20 01:35:36'),
(8, 'Cancer treatment centers', 'Active', '2023-09-20 01:35:44', '2023-09-20 01:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `hospitalId` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_24_094415_create_permission_tables', 1),
(7, '2023_05_24_121617_create_cities_table', 1),
(8, '2023_05_24_121720_create_hospital_types_table', 1),
(9, '2023_05_24_121753_create_hospitals_table', 1),
(10, '2023_05_24_121840_create_facilities_table', 1),
(11, '2023_05_24_122141_create_galleries_table', 1),
(12, '2023_05_24_122257_create_specialists_table', 1),
(13, '2023_05_24_122407_create_doctors_table', 1),
(14, '2023_05_24_122851_create_education_table', 1),
(15, '2023_05_24_122930_create_schedules_table', 1),
(16, '2023_05_24_123104_create_blogs_table', 1),
(17, '2023_05_24_123419_create_awards_achievements_table', 1),
(18, '2023_05_24_123557_create_patients_table', 1),
(19, '2023_05_24_123946_create_appointments_table', 1),
(20, '2023_05_24_124148_create_social_links_table', 1),
(21, '2023_06_01_113417_create_sliders_table', 1),
(22, '2023_06_13_060516_create_leads_table', 1),
(23, '2023_07_04_115132_create_states_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `address` longtext DEFAULT NULL,
  `contactNo` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stateId` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `userId`, `address`, `contactNo`, `gender`, `age`, `cityId`, `photo`, `stateId`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Ahemedabad', '9865321470', 'Female', '30', NULL, '1695198026.webp', 1, 'Active', '2023-09-20 02:33:31', '2023-09-20 02:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-09-20 01:01:53', '2023-09-20 01:01:53'),
(2, 'User', 'web', '2023-09-20 07:57:56', '2023-09-20 07:57:56'),
(3, 'Hospital', 'web', '2023-09-20 08:57:53', '2023-09-20 08:57:53'),
(4, 'Doctor', 'web', '2023-09-20 08:57:53', '2023-09-20 08:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospitalId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `navigate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `place`, `navigate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CIMS Hospital', '1695191953.avif', 'outside', 'https://www.vaidam.com/hospitals/cims-hospital-ahmedabad', 'Active', '2023-09-20 01:09:13', '2023-09-20 01:09:13'),
(2, 'Narayana Hospital', '1695192169.jpg', 'outside', 'https://www.narayanahealth.org/hospitals/ahmedabad/narayana-multispeciality-hospital-ahmedabad', 'Active', '2023-09-20 01:12:49', '2023-09-20 01:12:49'),
(3, 'Civil Hospital', '1695192337.jpg', 'outside', 'https://civilhospitalahd.gujarat.gov.in/', 'Active', '2023-09-20 01:15:37', '2023-09-20 01:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `hospitalId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `title`, `link`, `hospitalId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Twitter', 'https://civilhospitalahd.gujarat.gov.in/', 2, 'Active', '2023-09-20 02:02:35', '2023-09-20 02:02:35'),
(2, 'Facebook', 'https://naraynahospitalahd.gujarat.gov.in/', 1, 'Active', '2023-09-20 02:17:43', '2023-09-20 02:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialistName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `specialistName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Allergists/Immunologists', 'Active', '2023-09-20 01:24:10', '2023-09-20 01:24:10'),
(2, 'Anesthesiologists', 'Active', '2023-09-20 01:26:26', '2023-09-20 01:26:26'),
(3, 'Cardiologists', 'Active', '2023-09-20 01:26:33', '2023-09-20 01:26:33'),
(4, 'Colon and Rectal Surgeons', 'Active', '2023-09-20 01:26:41', '2023-09-20 01:26:41'),
(5, 'Critical Care Medicine Specialists', 'Active', '2023-09-20 01:26:55', '2023-09-20 01:26:55'),
(6, 'Dermatologists', 'Active', '2023-09-20 01:27:02', '2023-09-20 01:27:02'),
(7, 'Endocrinologists', 'Active', '2023-09-20 01:27:12', '2023-09-20 01:27:12'),
(8, 'Gastroenterologists', 'Active', '2023-09-20 01:27:24', '2023-09-20 01:27:24'),
(9, 'Hematologists', 'Active', '2023-09-20 01:27:44', '2023-09-20 01:27:44'),
(10, 'Nephrologists', 'Active', '2023-09-20 01:27:57', '2023-09-20 01:27:57'),
(11, 'Neurologists', 'Active', '2023-09-20 01:28:04', '2023-09-20 01:28:04'),
(12, 'Obstetricians and Gynecologists', 'Active', '2023-09-20 01:28:19', '2023-09-20 01:28:19'),
(13, 'Oncologists', 'Active', '2023-09-20 01:28:27', '2023-09-20 01:28:27'),
(14, 'Ophthalmologists', 'Active', '2023-09-20 01:28:36', '2023-09-20 01:28:36'),
(15, 'Otolaryngologists', 'Active', '2023-09-20 01:28:49', '2023-09-20 01:28:49'),
(16, 'Pathologists', 'Active', '2023-09-20 01:28:55', '2023-09-20 01:28:55'),
(17, 'Pulmonologists', 'Active', '2023-09-20 01:29:11', '2023-09-20 01:29:11'),
(18, 'Radiologists', 'Active', '2023-09-20 01:29:17', '2023-09-20 01:29:17'),
(19, 'Rheumatologists', 'Active', '2023-09-20 01:29:28', '2023-09-20 01:29:28'),
(20, 'Urologists', 'Active', '2023-09-20 01:29:39', '2023-09-20 01:29:39'),
(21, 'aaaaaaaaa', 'Delete', '2023-09-20 01:30:42', '2023-09-20 01:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stateName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `stateName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gujrat', 'Active', '2023-09-20 01:20:51', '2023-09-20 01:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactNumber`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hardik Savani', 'admin@gmail.com', '8347734731', NULL, '$2y$10$sTkNXm.wR5RUPId1SIkXC.D8zroDzjOFTciLg7wYxEdiSrG4DsHF2', NULL, '2023-09-20 01:01:53', '2023-09-20 01:01:53'),
(2, 'Manisha', 'manisha@gmail.com', '9638527410', NULL, '$2y$10$L5Dr5dT93wAcBr1kQj7RoeMAX4fCXaYVoOa9eW6w/NrULv8ld.Ez.', NULL, '2023-09-20 02:27:32', '2023-09-20 02:27:32'),
(3, 'Manisha H. Parmar', 'manishaparmar@gmail.com', '9638527410', NULL, '$2y$10$AmLqQPvCN01WM1.kd4OlN.u67XM5A5WuGMssO6SWBshkSjvFXs3ua', NULL, '2023-09-20 02:29:13', '2023-09-20 02:29:13'),
(4, 'Lata', 'lata@gmail.com', '9865321470', NULL, '$2y$10$iXZa32cNwloS0LJouN/StuHTA1KePh4CnlhjQY1H5FAae9E0GXIXu', NULL, '2023-09-20 02:33:31', '2023-09-20 02:33:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards_achievements`
--
ALTER TABLE `awards_achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_types`
--
ALTER TABLE `hospital_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards_achievements`
--
ALTER TABLE `awards_achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital_types`
--
ALTER TABLE `hospital_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
