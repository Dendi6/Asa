-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 06:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asa`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Manage All'),
(2, 'user', 'Add Penghasilan, dan manage profil');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'mdendi6@gmail.com', 1, '2020-12-22 08:36:22', 1),
(2, '::1', 'mdendi6@gmail.com', 1, '2020-12-24 08:33:04', 1),
(3, '::1', 'mdendi6@gmail.com', 1, '2020-12-26 02:46:58', 1),
(4, '::1', 'mdendi6@gmail.com', 1, '2020-12-27 03:22:51', 1),
(5, '::1', 'mdendi6@gmail.com', NULL, '2020-12-27 03:47:15', 0),
(6, '::1', 'mdendi6@gmail.com', 1, '2020-12-27 03:47:24', 1),
(7, '::1', 'mdendi6@gmail.com', 1, '2020-12-27 07:14:02', 1),
(8, '::1', 'mdendi6@gmail.com', 1, '2020-12-27 09:51:09', 1),
(9, '::1', 'simar@gmail.com', 2, '2020-12-27 10:09:07', 1),
(10, '::1', 'simar@gmail.com', NULL, '2020-12-27 10:10:57', 0),
(11, '::1', 'simar@gmail.com', NULL, '2020-12-27 10:11:06', 0),
(12, '::1', 'mdendi6@gmail.com', 1, '2020-12-28 23:45:19', 1),
(13, '::1', 'simar@gmail.com', 3, '2020-12-28 23:47:00', 1),
(14, '::1', 'mdendi6@gmail.com', 1, '2020-12-29 08:13:37', 1),
(15, '::1', 'simar@gmail.com', 2, '2020-12-29 09:17:46', 1),
(16, '::1', 'simar@gmail.com', 3, '2020-12-29 09:23:15', 1),
(17, '::1', 'mdendi6@gmail.com', 1, '2021-01-07 04:58:15', 1),
(18, '::1', 'simar@gmail.com', 3, '2021-01-07 05:04:54', 1),
(19, '::1', 'mdendi6@gmail.com', 1, '2021-01-07 05:10:38', 1),
(20, '::1', 'mdendi6@gmail.com', 1, '2021-01-14 05:58:27', 1),
(21, '::1', 'mdendi6@gmail.com', 1, '2021-01-14 21:56:30', 1),
(22, '::1', 'mdendi6@gmail.com', 1, '2021-01-16 00:38:31', 1),
(23, '::1', 'simar@gmail.com', 3, '2021-01-16 01:08:53', 1),
(24, '::1', 'mdendi6@gmail.com', 1, '2021-01-16 01:22:39', 1),
(25, '::1', 'simar@gmail.com', NULL, '2021-01-16 01:28:48', 0),
(26, '::1', 'simar@gmail.com', NULL, '2021-01-16 01:28:55', 0),
(27, '::1', 'simar@gmail.com', 3, '2021-01-16 01:29:04', 1),
(28, '::1', 'mdendi6@gmail.com', 1, '2021-01-16 01:30:33', 1),
(29, '::1', 'mdendi6@gmail.com', 1, '2021-01-20 03:05:28', 1),
(30, '::1', 'myusuf@gmail.com', 2, '2021-01-20 03:08:12', 1),
(31, '::1', 'safri@gmail.com', 3, '2021-01-20 03:42:15', 1),
(32, '::1', 'mdendi6@gmail.com', 1, '2021-01-21 06:04:11', 1),
(33, '::1', 'sapri@gmail.com', NULL, '2021-01-21 06:05:48', 0),
(34, '::1', 'safri@gmail.com', 3, '2021-01-21 06:06:16', 1),
(35, '::1', 'kandar@gmail.com', NULL, '2021-01-21 06:24:38', 0),
(36, '::1', 'mdendi6@gmail.com', 1, '2021-01-21 06:24:46', 1),
(37, '::1', 'kandar@gmail.com', 4, '2021-01-21 06:25:42', 1),
(38, '::1', 'mdendi6@gmail.com', NULL, '2021-01-23 20:21:06', 0),
(39, '::1', 'mdendi6@gmail.com', 1, '2021-01-23 20:21:13', 1),
(40, '::1', 'kandar@gmail.com', 4, '2021-01-23 20:28:45', 1),
(41, '::1', 'myusuf@gmail.com', 2, '2021-01-23 20:37:41', 1),
(42, '::1', 'mdendi6@gmail.com', 1, '2021-01-23 20:42:04', 1),
(43, '::1', 'kandar@gmail.com', 4, '2021-01-23 22:18:46', 1),
(44, '::1', 'mdendi6@gmail.com', NULL, '2021-01-23 22:19:57', 0),
(45, '::1', 'mdendi6@gmail.com', 1, '2021-01-23 22:20:12', 1),
(46, '::1', 'mdendi6@gmail.com', 1, '2021-01-24 02:47:13', 1),
(47, '::1', 'myusuf@gmail.com', 2, '2021-01-24 11:38:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Mananger all'),
(2, 'user', 'manage one');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tangkapan`
--

CREATE TABLE `hasil_tangkapan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlahTangkapan` float NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_tangkapan`
--

INSERT INTO `hasil_tangkapan` (`id`, `id_user`, `jumlahTangkapan`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 2, 2.4, '2020-09-02', '2021-01-19 20:09:34', '2021-01-19 20:33:54'),
(2, 2, 0.5, '2020-09-03', '2021-01-19 20:10:15', '2021-01-19 20:33:40'),
(4, 2, 1, '2020-09-04', '2021-01-19 20:34:16', '2021-01-19 20:34:16'),
(5, 2, 0, '2020-09-05', '2021-01-19 20:34:34', '2021-01-19 20:34:34'),
(6, 2, 1, '2020-09-06', '2021-01-19 20:34:58', '2021-01-19 20:34:58'),
(7, 2, 0.7, '2020-09-08', '2021-01-19 20:35:20', '2021-01-19 20:35:20'),
(8, 2, 3, '2020-09-10', '2021-01-19 20:35:48', '2021-01-19 20:35:48'),
(10, 2, 0, '2020-09-11', '2021-01-19 20:37:35', '2021-01-19 20:37:35'),
(11, 2, 1, '2020-09-13', '2021-01-19 20:37:50', '2021-01-19 20:37:50'),
(12, 2, 5, '2020-09-14', '2021-01-19 20:38:21', '2021-01-19 20:38:21'),
(13, 2, 2, '2020-09-15', '2021-01-19 20:38:37', '2021-01-19 20:38:37'),
(14, 2, 2, '2020-09-19', '2021-01-19 20:38:51', '2021-01-19 20:38:51'),
(15, 2, 0.5, '2020-09-20', '2021-01-19 20:39:10', '2021-01-19 20:39:10'),
(16, 2, 19.5, '2020-09-24', '2021-01-19 20:39:29', '2021-01-19 20:39:29'),
(17, 2, 3, '2020-09-27', '2021-01-19 20:39:44', '2021-01-19 20:39:44'),
(18, 2, 2.5, '2020-09-29', '2021-01-19 20:39:59', '2021-01-19 20:39:59'),
(19, 3, 4, '2020-09-02', '2021-01-20 23:07:45', '2021-01-20 23:07:45'),
(20, 3, 0.1, '2020-09-03', '2021-01-20 23:08:14', '2021-01-20 23:08:14'),
(21, 3, 3, '2020-09-04', '2021-01-20 23:08:44', '2021-01-20 23:08:44'),
(22, 3, 0, '2020-09-05', '2021-01-20 23:09:23', '2021-01-20 23:09:23'),
(23, 3, 0, '2020-09-06', '2021-01-20 23:09:57', '2021-01-20 23:09:57'),
(24, 3, 0, '2020-09-08', '2021-01-20 23:10:25', '2021-01-20 23:10:25'),
(25, 3, 2.8, '2020-09-10', '2021-01-20 23:11:00', '2021-01-20 23:11:00'),
(26, 3, 0, '2020-09-11', '2021-01-20 23:11:25', '2021-01-20 23:11:25'),
(27, 3, 3, '2020-09-13', '2021-01-20 23:12:22', '2021-01-20 23:12:22'),
(28, 3, 8, '2020-09-14', '2021-01-20 23:12:45', '2021-01-20 23:12:45'),
(29, 3, 0, '2020-09-15', '2021-01-20 23:21:05', '2021-01-20 23:21:05'),
(30, 3, 2.3, '2020-09-19', '2021-01-20 23:21:28', '2021-01-20 23:21:28'),
(31, 3, 0.1, '2020-09-20', '2021-01-20 23:21:45', '2021-01-20 23:21:45'),
(32, 3, 0, '2020-09-24', '2021-01-20 23:22:03', '2021-01-20 23:22:03'),
(33, 3, 2, '2020-09-27', '2021-01-20 23:22:21', '2021-01-20 23:22:21'),
(34, 3, 0, '2020-09-29', '2021-01-20 23:22:48', '2021-01-20 23:22:48'),
(36, 4, 2.6, '2020-09-02', '2021-01-20 23:25:59', '2021-01-20 23:25:59'),
(37, 4, 1, '2020-09-03', '2021-01-20 23:26:13', '2021-01-20 23:26:13'),
(38, 4, 1.5, '2020-09-04', '2021-01-20 23:26:29', '2021-01-20 23:26:29'),
(39, 4, 0, '2020-09-05', '2021-01-20 23:26:45', '2021-01-20 23:26:45'),
(40, 4, 0.6, '2020-09-06', '2021-01-20 23:27:06', '2021-01-20 23:27:06'),
(41, 4, 0, '2020-09-08', '2021-01-20 23:27:22', '2021-01-20 23:27:22'),
(42, 4, 3, '2020-09-10', '2021-01-20 23:27:38', '2021-01-20 23:27:38'),
(43, 4, 0.3, '2020-09-11', '2021-01-20 23:27:57', '2021-01-20 23:27:57'),
(44, 4, 1, '2020-09-13', '2021-01-20 23:28:52', '2021-01-20 23:28:52'),
(45, 4, 4, '2020-09-14', '2021-01-20 23:29:15', '2021-01-20 23:29:15'),
(46, 4, 3, '2020-09-15', '2021-01-20 23:29:33', '2021-01-20 23:29:33'),
(47, 4, 3, '2020-09-19', '2021-01-20 23:31:05', '2021-01-20 23:31:05'),
(48, 4, 0.9, '2020-09-20', '2021-01-20 23:35:21', '2021-01-20 23:35:21'),
(49, 4, 12, '2020-09-24', '2021-01-20 23:35:38', '2021-01-20 23:35:38'),
(50, 4, 0, '2020-09-27', '2021-01-20 23:35:59', '2021-01-20 23:35:59'),
(51, 4, 0, '2020-09-29', '2021-01-20 23:36:14', '2021-01-20 23:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1608627939, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prediksidata`
--

CREATE TABLE `prediksidata` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `curahHujan` float NOT NULL,
  `cuaca` varchar(255) NOT NULL,
  `kecepatanAngin` float NOT NULL,
  `arahAngin` varchar(25) NOT NULL,
  `hasilTangkapan` float NOT NULL,
  `kelasData` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prediksidata`
--

INSERT INTO `prediksidata` (`id`, `tanggal`, `curahHujan`, `cuaca`, `kecepatanAngin`, `arahAngin`, `hasilTangkapan`, `kelasData`) VALUES
(1, '2020-09-02', 0, 'Berawan', 4, 'C', 3, 'Yes'),
(2, '2020-09-03', 11.9, 'Hujan Rigan', 2, 'C', 0.533333, 'No'),
(3, '2020-09-04', 40.1, 'Hujan Sedang', 3, 'W', 1.83333, 'Yes'),
(4, '2020-09-05', 30.8, 'Hujan Sedang', 3, 'S', 0, 'No'),
(5, '2020-09-06', 113.7, 'Hujan Sangat Lebat', 3, 'C', 0.533333, 'No'),
(6, '2020-09-08', 12, 'Hujan Rigan', 3, 'SE', 0.233333, 'No'),
(7, '2020-09-10', 12.8, 'Hujan Rigan', 3, 'S', 2.93333, 'Yes'),
(8, '2020-09-11', 9.7, 'Hujan Rigan', 4, 'S', 0.1, 'No'),
(9, '2020-09-13', 1.5, 'Berawan', 4, 'C', 1.66667, 'Yes'),
(10, '2020-09-14', 43, 'Hujan Sedang', 3, 'E', 5.66667, 'Yes'),
(11, '2020-09-15', 21.8, 'Hujan Sedang', 4, 'S', 1.66667, 'Yes'),
(12, '2020-09-19', 0, 'Berawan', 3, 'E', 2.43333, 'Yes'),
(13, '2020-09-20', 28.5, 'Hujan Sedang', 4, 'S', 0.5, 'No'),
(14, '2020-09-24', 2, 'Berawan', 3, 'SE', 10.5, 'Yes'),
(15, '2020-09-27', 12.5, 'Hujan Rigan', 4, 'S', 1.66667, 'Yes'),
(16, '2020-09-29', 25, 'Hujan Sedang', 4, 'S', 0.833333, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `sampul` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `sampul`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mdendi6@gmail.com', 'Dendi', '1609254071_92e90bc43292cb6bd65f.png', '$2y$10$k8EXzN37KJEKvtqV.cMyVeXyeDWcOvTsRmiJ1JYhlSCbzDrJ/Ffti', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-22 08:36:11', '2020-12-29 09:01:11', NULL),
(2, 'myusuf@gmail.com', 'myusuf', 'default.jpg', '$2y$10$9v7Ko/TDAt4sV7y5I9bzmu9T8pqImzWk6gRATCe0uDF0aJ32E5.ru', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-01-20 03:07:56', '2021-01-20 03:07:56', NULL),
(3, 'safri@gmail.com', 'safri', 'default.jpg', '$2y$10$TVVLZmb0TwqjPy6ix/dNrOESBwFhulPxvyCI0hu.8tL8Dvz1Sm8qG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-01-20 03:42:00', '2021-01-20 03:42:00', NULL),
(4, 'kandar@gmail.com', 'kandar', 'default.jpg', '$2y$10$DeroFyZy0I6nTF/Z4v4q8.8kGY2WwXxusgs7zOUa2y8Xpwt3EbEHW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-01-21 06:24:28', '2021-01-21 06:24:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `hasil_tangkapan`
--
ALTER TABLE `hasil_tangkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prediksidata`
--
ALTER TABLE `prediksidata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_tangkapan`
--
ALTER TABLE `hasil_tangkapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prediksidata`
--
ALTER TABLE `prediksidata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
