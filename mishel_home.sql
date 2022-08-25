-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 01:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mishel_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1911) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `address`, `avatar`, `password`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin mia', 'admin@gmail.com', '01620193118', 'Rashidabad, KishoreganjSadar, Kishoreganj', 'dgihlwgziz1657179196.jpg', '$2y$10$pvwqZ5HXt4AsGPrln58nWuWdid7LxEQO4cPASeRKeMnfPy3QrI.W6', 0, NULL, NULL, '2022-07-02 01:14:47', '2022-07-07 01:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactie',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lunch', 0, '2022-07-02 23:29:02', '2022-07-02 23:29:02'),
(2, 'Bar', 0, '2022-07-02 23:29:11', '2022-07-03 02:08:48'),
(4, 'Swimming', 0, '2022-07-02 23:29:27', '2022-07-02 23:29:27'),
(5, 'Dinner', 0, '2022-07-02 23:29:31', '2022-07-02 23:29:31'),
(7, 'Snack', 0, '2022-07-02 23:29:44', '2022-07-03 00:10:41'),
(8, 'AC', 0, '2022-07-03 04:47:55', '2022-07-03 04:47:55'),
(10, 'WIFI', 0, '2022-07-03 04:48:24', '2022-07-03 04:48:24'),
(11, 'fdfds', 0, '2022-08-17 05:27:56', '2022-08-17 05:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `amenity_room_types`
--

CREATE TABLE `amenity_room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `amenity_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenity_room_types`
--

INSERT INTO `amenity_room_types` (`id`, `room_type_id`, `amenity_id`, `created_at`, `updated_at`) VALUES
(14, 7, 7, '2022-07-03 02:14:11', '2022-07-03 02:14:11'),
(15, 7, 5, '2022-07-03 02:14:11', '2022-07-03 02:14:11'),
(16, 7, 1, '2022-07-03 02:14:11', '2022-07-03 02:14:11'),
(21, 7, 4, '2022-07-03 02:47:06', '2022-07-03 02:47:06'),
(22, 7, 1, '2022-07-03 02:47:06', '2022-07-03 02:47:06'),
(36, 6, 5, '2022-07-03 03:01:22', '2022-07-03 03:01:22'),
(37, 6, 2, '2022-07-03 03:01:22', '2022-07-03 03:01:22'),
(39, 5, 7, '2022-07-03 03:01:53', '2022-07-03 03:01:53'),
(40, 5, 4, '2022-07-03 03:01:53', '2022-07-03 03:01:53'),
(41, 5, 2, '2022-07-03 03:01:53', '2022-07-03 03:01:53'),
(43, 9, 7, '2022-07-04 00:33:55', '2022-07-04 00:33:55'),
(44, 9, 4, '2022-07-04 00:33:55', '2022-07-04 00:33:55'),
(45, 10, 10, '2022-07-05 04:27:54', '2022-07-05 04:27:54'),
(47, 10, 8, '2022-07-05 04:27:54', '2022-07-05 04:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('explore_one','explore_two','city','footer','contact_one','contact_two') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 'kvwpmy3cpm1657000383.png', 'footer', 0, '2022-07-04 23:53:05', '2022-07-04 23:53:05'),
(3, NULL, NULL, 'f62cf6wsmh1657000412.png', 'contact_one', 0, '2022-07-04 23:53:32', '2022-07-04 23:53:32'),
(4, NULL, NULL, 'yk1ofolsma1657000421.png', 'contact_two', 0, '2022-07-04 23:53:41', '2022-07-04 23:53:41'),
(5, NULL, NULL, '9zhsk7ouom1657000446.jpg', 'city', 0, '2022-07-04 23:54:06', '2022-07-04 23:54:06'),
(6, NULL, NULL, 'myx9c4pmia1657002644.png', 'explore_one', 0, '2022-07-04 23:57:51', '2022-07-05 00:30:45'),
(7, 'fedfgvfdhbgh', '<p>gdfgf</p>', 'nq2ovcoquo1657001839.png', 'explore_two', 0, '2022-07-04 23:58:00', '2022-07-07 00:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `num_of_guest` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'duration will be calculate as day',
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `user_id`, `num_of_guest`, `date`, `duration`, `guest_name`, `guest_email`, `guest_phone`, `guest_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, '07/06/2022', 2, 'Developer', 'developer1000486@gmail.com', '01964719349', 'Rashidabad, KishoreganjSadar, Kishoreganj', 'declined', '2022-07-06 02:03:16', '2022-08-03 01:31:50'),
(2, 4, 3, 2, '07/14/2022', 2, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'Banglamotor Dhaka', 'approved', '2022-07-06 02:10:31', '2022-08-03 01:31:45'),
(3, 3, 3, 3, '07/30/2022', 2, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'Banglamotor Dhaka', 'pending', '2022-07-06 02:11:20', '2022-07-06 02:11:20'),
(4, 2, 3, 3, '07/12/2022', 2, 'Developer', 'developer1000486@gmail.com', '01964719349', 'sdfdsfgsd', 'approved', '2022-07-06 04:00:46', '2022-08-03 01:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'HGFH', 'HGFH', '2022-08-04 03:42:07', '2022-08-04 03:42:07'),
(2, 'Rasel Rana', 'raselrana1147@gmail.com', '01964719349', 'vERY ARGENT NEWS', 'DSDSAD DSAFSDRWEdfsdfgd', '2022-08-04 03:43:04', '2022-08-04 03:43:04'),
(3, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'ss', 'fdsf', '2022-08-06 06:02:48', '2022-08-06 06:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feed_backs`
--

CREATE TABLE `feed_backs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=unpublish,1=publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feed_backs`
--

INSERT INTO `feed_backs` (`id`, `user_id`, `title`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'THis awesome', 'Lorem ipsum dolor sit amconsectetur Risus commodo viverra maecenas acumsan lacus vel facilisisLorem dolor sitonsectetur Risus commodo.', 1, '2022-07-31 03:12:45', '2022-08-03 00:32:50'),
(2, 4, 'What charming area', 'Lorem ipsum dolor sit amconsectetur Risus commodo viverra maecenas acumsan lacus vel facilisisLorem dolor sitonsectetur Risus commodo.', 1, '2022-07-31 03:18:29', '2022-08-03 00:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactie',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `floor_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '1st Floor', 0, '2022-07-03 03:58:17', '2022-07-03 04:42:43'),
(2, '2nd Floor', 0, '2022-07-03 03:58:59', '2022-07-03 03:58:59'),
(3, '3rd Floor', 0, '2022-07-03 03:59:05', '2022-07-03 03:59:05'),
(4, '4th Floor', 0, '2022-07-03 03:59:14', '2022-07-03 03:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('picture','video') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `link`, `image`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Very awesome', NULL, 'qdo5jaqtsr1659418241.png', 'picture', 0, '2022-08-01 23:30:45', '2022-08-01 23:30:45'),
(3, 'Very attactive', NULL, 'he9ifpop8h1659418267.png', 'picture', 0, '2022-08-01 23:31:11', '2022-08-01 23:31:11'),
(4, 'This is awesome', NULL, 'po5kgaq7x91659420852.jpg', 'picture', 0, '2022-08-01 23:32:28', '2022-08-02 00:14:31'),
(5, 'Our Intro', 'https://www.youtube.com/embed/5sYk-7v74C8', NULL, 'video', 0, '2022-08-01 23:37:11', '2022-08-02 00:34:51');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_23_123038_create_admins_table', 1),
(6, '2022_07_02_065711_create_sliders_table', 1),
(7, '2022_07_03_050136_create_amenities_table', 2),
(8, '2022_07_03_061137_create_room_types_table', 3),
(9, '2022_07_03_061520_create_amenity_room_types_table', 4),
(10, '2022_07_03_094152_create_floors_table', 5),
(11, '2022_07_03_110130_create_room_keepers_table', 6),
(13, '2022_07_03_122925_create_rooms_table', 8),
(14, '2022_07_04_084517_create_restaurants_table', 9),
(16, '2022_07_05_050203_create_banners_table', 10),
(17, '2014_10_12_000000_create_users_table', 11),
(18, '2022_07_06_064817_create_bookings_table', 12),
(24, '2022_07_31_053906_create_reviews_table', 14),
(25, '2022_07_17_104920_create_feed_backs_table', 15),
(26, '2022_07_31_101341_create_projects_table', 16),
(27, '2022_07_03_121029_create_galleries_table', 17),
(28, '2022_08_04_070413_create_contacts_table', 18),
(29, '2022_08_11_054644_create_packahes_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `packahes`
--

CREATE TABLE `packahes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(11,2) NOT NULL,
  `old_price` double(11,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Mishel Hotel and Resort', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'tayglnfddf1659343428.jpg', '2022-08-01 02:43:49', '2022-08-01 02:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `title`, `description`, `icon`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Restaurant', 'Lorem ipsum dolor sit amconsectetur Risus commodo viverra maecenas acumsan lacus vel facilisisLorem dolor sitonsectetur Risus commodo.', '<i class=\"fa fa-facebook\"></i>', 'm6fmwoyrrd1656928035.png', 0, '2022-07-04 03:47:17', '2022-07-04 03:47:17'),
(6, 'GYM', 'Lorem ipsum dolor sit amconsectetur Risus commodo viverra maecenas acumsan lacus vel facilisisLorem dolor sitonsectetur Risus commodo.', '<i class=\"fa fa-facebook\"></i>', 'j9vxfdnyxw1656928050.png', 0, '2022-07-04 03:47:32', '2022-07-04 03:47:32'),
(7, 'Swimming Pool', 'Lorem ipsum dolor sit amconsectetur Risus commodo viverra maecenas acumsan lacus vel facilisisLorem dolor sitonsectetur Risus commodo.', '<i class=\"fa fa-facebook\"></i>', '55f3gaudos1656928076.png', 0, '2022-07-04 03:47:58', '2022-07-04 03:47:58'),
(8, 'Meeting Room', 'Lorem ipsum dolor sit amconsectetur Risus commodo viverra maecenas acumsan lacus vel facilisisLorem dolor sitonsectetur Risus commodo.', '<i class=\"fa fa-facebook\"></i>', '2tsufbvyou1656928100.png', 0, '2022-07-04 03:48:22', '2022-07-04 03:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `ratting` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=unpublish,1=publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `room_id`, `ratting`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 5, 4, 'fgfgfd', 1, '2022-07-31 03:02:29', '2022-08-03 01:12:18'),
(3, 4, 5, 5, 'This was very awesome service', 0, '2022-08-03 23:19:20', '2022-08-03 23:19:20'),
(4, 4, 6, 4, 'ipsa quaerat nostrum eveniet?', 0, '2022-08-03 23:46:37', '2022-08-03 23:46:37'),
(5, 4, 6, 5, 'ipsa quaerat nostrum eveniet?', 0, '2022-08-03 23:46:54', '2022-08-03 23:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `room_keeper_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `num_of_bed` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=available,1=unavailable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type_id`, `floor_id`, `room_keeper_id`, `title`, `slug`, `room_number`, `max_capacity`, `num_of_bed`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 4, 'Deluxe-Room-for-Relax-1', 'Deluxe Room for Relax', 'MH-478978', 5, 2, 'alwhpjbzgy1656927688.png', '<p>This is very good room</p>', 0, '2022-07-04 00:19:37', '2022-07-04 03:41:30'),
(2, 6, 4, 3, 'Deluxe-Room-for-Relax-2', 'Deluxe-Room-for-Relax-2', 'MH-819576', 4, 2, 'ihqzobo1hv1656927677.png', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 0, '2022-07-04 00:31:22', '2022-07-04 03:41:19'),
(3, 6, 1, 4, 'Deluxe-Room-for-Relax-3', 'Deluxe-Room-for-Relax-3', 'MH-306989', 10, 3, 'yqvqrdnsod1656927662.png', '<p><span style=\"font-weight: bolder; margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 0, '2022-07-04 00:32:02', '2022-07-04 03:41:04'),
(4, 5, 4, 2, 'Deluxe-Room-for-Relax-4', 'Deluxe-Room-for-Relax-4', 'MH-691196', 3, 1, 'gleileeg5j1656927645.png', '<p><span style=\"font-weight: bolder; margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 0, '2022-07-04 00:32:46', '2022-07-04 03:40:46'),
(5, 7, 4, NULL, 'Deluxe-Room-for-Relax-5', 'Deluxe-Room-for-Relax-5', 'MH-481078', 5, 2, 'msuqfhmflu1656927631.png', '<p><span style=\"font-weight: bolder; margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 0, '2022-07-04 00:33:17', '2022-07-04 03:40:33');
INSERT INTO `rooms` (`id`, `room_type_id`, `floor_id`, `room_keeper_id`, `title`, `slug`, `room_number`, `max_capacity`, `num_of_bed`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(6, 9, 1, 4, 'Deluxe-Room-for-Relax-6', 'Deluxe-Room-for-Relax-6', 'MH-954602', 2, 2, '9mo6utyyx71656927610.jpg', '<h3 style=\"box-sizing: border-box; margin-bottom: 20px; font-weight: 700; line-height: 1.2; color: rgb(36, 65, 107); font-size: 25px; font-family: &quot;DM Serif Display&quot;, serif;\">The charming view of the city</h3><h3 style=\"box-sizing: border-box; margin-bottom: 10px; font-weight: 700; line-height: 1.2; color: rgb(36, 65, 107); font-size: 20px; font-family: &quot;DM Serif Display&quot;, serif;\"><p style=\"box-sizing: border-box; margin-bottom: 15px; font-size: 16px; font-family: Muli, sans-serif; color: rgb(122, 126, 154); font-weight: 400;\"><span style=\"font-family: Arial;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas veritatis ducimus rerum sunt dignissimos libero et eum modi! Consequuntur rem incidunt et ducimus magnam sunt rerum hic beatae sed obcaecati. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium asperiores eos obcaecati nostrum sed, corporis placeat quasi pariatur id, est iure, minus.</span></p><p style=\"box-sizing: border-box; margin-bottom: 15px; font-size: 16px; font-family: Muli, sans-serif; color: rgb(122, 126, 154); font-weight: 400;\"><span style=\"font-family: Arial;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words.</span><img src=\"data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAAeAAD/4QMsaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0OCA3OS4xNjQwMzYsIDIwMTkvMDgvMTMtMDE6MDY6NTcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyMS4xIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpFNzdCRUI1NUU1RjExMUVBOEE4ODk1RkNGMDE2QTIwNyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpFNzdCRUI1NkU1RjExMUVBOEE4ODk1RkNGMDE2QTIwNyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkU3N0JFQjUzRTVGMTExRUE4QTg4OTVGQ0YwMTZBMjA3IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkU3N0JFQjU0RTVGMTExRUE4QTg4OTVGQ0YwMTZBMjA3Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQAEAsLCwwLEAwMEBcPDQ8XGxQQ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\" style=\"width: 600px;\" data-filename=\"fashion.jpg\"></p><p class=\"mb-30\" style=\"box-sizing: border-box; margin-bottom: 30px; font-size: 16px; font-family: Muli, sans-serif; color: rgb(122, 126, 154); font-weight: 400;\"><span style=\"font-family: Tahoma;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem, you to be sure there.</span></p><div class=\"rooms-details mb-30\" style=\"box-sizing: border-box; margin-bottom: 30px; color: rgb(122, 126, 154); font-family: Poppins, sans-serif; font-size: 14px; font-weight: 400;\"><img src=\"data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAAeAAD/4QMsaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0OCA3OS4xNjQwMzYsIDIwMTkvMDgvMTMtMDE6MDY6NTcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyMS4xIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCQzhBMEU3OEU1RUYxMUVBQUFFM0M3RUUyMUE1MDFDMCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCQzhBMEU3OUU1RUYxMUVBQUFFM0M3RUUyMUE1MDFDMCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkJDOEEwRTc2RTVFRjExRUFBQUUzQzdFRTIxQTUwMUMwIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkJDOEEwRTc3RTVFRjExRUFBQUUzQzdFRTIxQTUwMUMwIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQAEAsLCwwLEAwMEBcPDQ8XGxQQ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\" style=\"width: 600px;\" data-filename=\"electronics.jpg\"><br></div><p class=\"mb-30\" style=\"box-sizing: border-box; margin-bottom: 30px; font-size: 16px; font-family: Muli, sans-serif; color: rgb(122, 126, 154); font-weight: 400;\"><span style=\"font-family: Verdana;\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit veritatis repellendus magnam tempora quibusdam dignissimos ab hic autem, dolore facere, soluta excepturi neque necessitatibus qui tenetur, ipsa quaerat nostrum eveniet? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit veritatis repellendus magnam tempora quibusdam dignissimos ab hic autem, dolore facere, soluta excepturi neque necessitatibus qui tenetur, ipsa quaerat nostrum eveniet?</span></p></h3>', 0, '2022-07-04 00:34:42', '2022-07-05 23:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `room_keepers`
--

CREATE TABLE `room_keepers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` double(11,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=available,1=unavailable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_keepers`
--

INSERT INTO `room_keepers` (`id`, `name`, `phone`, `avatar`, `charge`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Shahed Ali', '254855555', 'ytgzsbmdwj1656848194.jpg', 500.00, 0, '2022-07-03 05:36:34', '2022-07-03 05:36:34'),
(3, 'Millat', '01245785255', 'rwk4ufpdd01656848219.jpg', 500.00, 0, '2022-07-03 05:36:59', '2022-07-03 05:36:59'),
(4, 'Shanto Shaha', '017555', 'gwkee2rhoe1656848814.jpg', 500.00, 0, '2022-07-03 05:46:54', '2022-07-03 05:46:54'),
(5, 'dsad', 'dsadqwe12321', 'h0b8aptbn81656848826.jpg', 500.00, 0, '2022-07-03 05:47:06', '2022-07-03 05:47:06'),
(6, 'Artsoft Developer', 'fdhgfh', NULL, 222.00, 0, '2022-07-03 05:48:18', '2022-07-03 05:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(11,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactie',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Honeymonn', 50000.00, '<p>This is very good room</p>', 0, '2022-07-03 02:08:20', '2022-07-03 02:08:20'),
(6, 'Double Room', 15000.00, '<p>This is very good room</p>', 0, '2022-07-03 02:13:34', '2022-07-03 02:13:34'),
(7, 'Couple Room', 10000.00, '<p>This is very good room</p>', 0, '2022-07-03 02:14:11', '2022-07-03 02:14:11'),
(9, 'Single room', 5000.00, '<h3 style=\"box-sizing: border-box; margin-bottom: 10px; font-weight: 700; line-height: 1.2; color: rgb(36, 65, 107); font-size: 20px; font-family: &quot;DM Serif Display&quot;, serif;\">Budget Room</h3>', 0, '2022-07-04 00:33:55', '2022-07-04 00:33:55'),
(10, 'test', 5000.00, '<ul><li>xjhxdscfgdsahgfd</li></ul>', 0, '2022-07-05 04:27:54', '2022-07-05 04:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('slider') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactie',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_1`, `title_2`, `button_title`, `url`, `image`, `type`, `status`, `created_at`, `updated_at`) VALUES
(7, 'This is very good offer', '10 % big discount one selected room', 'Click Now', 'http://dss.com/', 'wovo1svkdu1656927488.png', 'slider', 0, '2022-07-02 04:35:56', '2022-07-04 03:38:13'),
(9, 'This is very mega offer', '52 % big discount all item', 'Visit Now', 'http://dss.com/', '5fx6h6jaeh1656927449.png', 'slider', 0, '2022-07-02 04:46:53', '2022-07-04 03:37:34'),
(10, 'This is very mega offer', '10 % big discount one selected room', 'Visit Now', 'http://dss.com/', 'c1zmj1wzdf1656844535.jpg', 'slider', 0, '2022-07-02 04:47:25', '2022-07-03 04:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Developer', 'developer1000486@gmail.com', '01964719349', NULL, NULL, '$2y$10$.GJYw/YxXiZM98dXlAonmeu0XyIIrnebsTFGeTa1khVRExdrYEZ.m', NULL, '2022-07-05 01:56:40', '2022-07-05 01:56:40'),
(4, 'test', 'test123@gmail.com', '019647193492', NULL, NULL, '$2y$10$9a70.KhwpjH3VpEV1WC3AepwEPVf9LoiOFW8Bxtc/X7jJ7GLlyAPC', NULL, '2022-07-17 00:52:13', '2022-07-17 00:52:13'),
(5, 'Artsoft Developer', 'develo1per1000486@gmail.com', '019647191349', NULL, NULL, '$2y$10$jyU6bnBcklbV48kxzhMZbuLzXldVm02S0Zh92ZXArxc7nUsA79EOS', NULL, '2022-08-16 03:03:29', '2022-08-16 03:03:29');

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
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenity_room_types`
--
ALTER TABLE `amenity_room_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amenity_room_types_room_type_id_foreign` (`room_type_id`),
  ADD KEY `amenity_room_types_amenity_id_foreign` (`amenity_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feed_backs_user_id_foreign` (`user_id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `floors_floor_name_unique` (`floor_name`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packahes`
--
ALTER TABLE `packahes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_room_id_foreign` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_room_number_unique` (`room_number`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `rooms_room_type_id_foreign` (`room_type_id`),
  ADD KEY `rooms_floor_id_foreign` (`floor_id`),
  ADD KEY `rooms_room_keeper_id_foreign` (`room_keeper_id`);

--
-- Indexes for table `room_keepers`
--
ALTER TABLE `room_keepers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_keepers_phone_unique` (`phone`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `amenity_room_types`
--
ALTER TABLE `amenity_room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed_backs`
--
ALTER TABLE `feed_backs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `packahes`
--
ALTER TABLE `packahes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_keepers`
--
ALTER TABLE `room_keepers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amenity_room_types`
--
ALTER TABLE `amenity_room_types`
  ADD CONSTRAINT `amenity_room_types_amenity_id_foreign` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `amenity_room_types_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD CONSTRAINT `feed_backs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_room_keeper_id_foreign` FOREIGN KEY (`room_keeper_id`) REFERENCES `room_keepers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
