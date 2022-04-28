-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 06:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bps`
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

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-09 00:08:10', 1),
(2, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-09 00:12:26', 1),
(3, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-09 00:15:44', 1),
(4, '::1', 'sabda1110', NULL, '2022-04-09 00:16:42', 0),
(5, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-09 00:16:51', 1),
(6, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-09 00:22:43', 1),
(7, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-09 02:13:55', 1),
(8, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-10 03:00:45', 1),
(9, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-10 03:10:47', 1),
(10, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-10 03:47:10', 1),
(11, '::1', 'sabdasetiawan204@gmail.com', 2, '2022-04-10 03:51:18', 1),
(12, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-10 23:53:30', 1),
(13, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-10 23:56:24', 1),
(14, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-11 00:21:33', 1),
(15, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-11 02:00:07', 1),
(16, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-12 21:15:42', 1),
(17, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-12 21:23:51', 1),
(18, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-12 21:33:53', 1),
(19, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-12 22:24:41', 1),
(20, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-12 22:33:09', 1),
(21, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-15 01:18:22', 1),
(22, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-16 00:58:38', 1),
(23, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-17 06:54:59', 1),
(24, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-17 08:07:30', 1),
(25, '::1', 'sabda1110', NULL, '2022-04-17 08:13:19', 0),
(26, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-17 08:13:27', 1),
(27, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-17 09:11:09', 1),
(28, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-17 21:01:22', 1),
(29, '::1', 'sabda1110', NULL, '2022-04-17 21:02:29', 0),
(30, '::1', 'sabda1110', NULL, '2022-04-17 21:02:36', 0),
(31, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-17 21:02:48', 1),
(32, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-17 22:06:46', 1),
(33, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-18 01:18:55', 1),
(34, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-18 07:36:35', 1),
(35, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-18 22:05:11', 1),
(36, '::1', 'sabda1110', NULL, '2022-04-18 23:49:34', 0),
(37, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-18 23:49:42', 1),
(38, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-20 01:45:13', 1),
(39, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-20 01:49:53', 1),
(40, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-20 01:50:31', 1),
(41, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-20 01:50:57', 1),
(42, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-20 06:57:27', 1),
(43, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-20 08:32:44', 1),
(44, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-20 23:05:46', 1),
(45, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-21 03:33:29', 1),
(46, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-21 04:38:50', 1),
(47, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-25 00:54:20', 1),
(48, '::1', 'sabdasetiawan206@gmail.com', 1, '2022-04-25 01:07:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kd_kegiatan` char(5) NOT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `sub_kegiatan` varchar(100) DEFAULT NULL,
  `desc_kegiatan` varchar(500) DEFAULT NULL,
  `satuan_hasil` varchar(100) DEFAULT NULL,
  `angka_kredit` float DEFAULT NULL,
  `batasan_penilaian` varchar(100) DEFAULT NULL,
  `pelaksana` varchar(100) DEFAULT NULL,
  `bukti_fisik` varchar(500) DEFAULT NULL,
  `contoh` varchar(500) DEFAULT NULL,
  `kd_kerja` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`kd_kegiatan`, `kegiatan`, `sub_kegiatan`, `desc_kegiatan`, `satuan_hasil`, `angka_kredit`, `batasan_penilaian`, `pelaksana`, `bukti_fisik`, `contoh`, `kd_kerja`) VALUES
('KP01', 'sdfsa', 'sadfasfd', 'sdfsa', 'sadfas', 2, 'sdfsa', 'sadfasf', 'sdafsa', 'sdafsa', 'K02'),
('KP02', 'safsa', 'sdfsaf', 'sfasf', 'sfsaf', 2, 'sdfsadf', 'sfsaf', 'sfsadf', 'sdfsdaf', 'K01'),
('KP03', 'sdfa', 'sdfdas', 'sfas', 'sdfa', 2, 'asdfas', 'asdfas', 'sdafas', 'sfs', 'K02');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_statistisi`
--

CREATE TABLE `kegiatan_statistisi` (
  `kode_kegiatan` varchar(5) NOT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `desc_kegiatan` varchar(500) NOT NULL,
  `satuan_hasil` varchar(20) DEFAULT NULL,
  `angka_kredit` float DEFAULT NULL,
  `pelaksana` varchar(20) DEFAULT NULL,
  `bukti_fisik` varchar(500) DEFAULT NULL,
  `contoh` varchar(500) DEFAULT NULL,
  `kode_jabatan` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan_statistisi`
--

INSERT INTO `kegiatan_statistisi` (`kode_kegiatan`, `kegiatan`, `desc_kegiatan`, `satuan_hasil`, `angka_kredit`, `pelaksana`, `bukti_fisik`, `contoh`, `kode_jabatan`) VALUES
('K01', 'Melakukan Validasi Data', 'Tes', 'gak tau', 0.1, 'Pranata', 'asdfas', 'asdfsdf', 'KS01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1649479475, 1);

-- --------------------------------------------------------

--
-- Table structure for table `struktur_bps`
--

CREATE TABLE `struktur_bps` (
  `kd_kerja` char(5) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `butir_kegiatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struktur_bps`
--

INSERT INTO `struktur_bps` (`kd_kerja`, `jabatan`, `jenjang`, `butir_kegiatan`) VALUES
('K01', 'Pranata', 'Mahir', 'Melakukan Penggandaan data'),
('K012', 'dsfdsa', 'sdfas', 'sdfasdf'),
('K02', 'Pranata', 'Mahir', 'melakukan pencatatan infrastruktur teknologi \r\ninformasi'),
('K03', 'Pranata', 'Mahir', 'Melakukan Informasi'),
('K04', 'asdfas', 'asdfas', 'asdfasdf'),
('K05', 'sfdafsdf', 'asfasf', 'asfsdf'),
('K08', 'sdfsa', 'sdfasf', 'asdfasfd'),
('K09', 'sdfas', 'asdfasdf', 'asfsafasd'),
('K10', 'sdfsad', 'safasf', 'asdfasdf'),
('K11', 'sfdsaf', 'asfdasf', 'asdfasfasf');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_statistisi`
--

CREATE TABLE `struktur_statistisi` (
  `kode_jabatan` varchar(5) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `sub_jabatan` varchar(20) NOT NULL,
  `rincian_kegiatan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struktur_statistisi`
--

INSERT INTO `struktur_statistisi` (`kode_jabatan`, `jabatan`, `sub_jabatan`, `rincian_kegiatan`) VALUES
('KS01', 'Pranata', 'Muda', 'Melakukan validasi data'),
('KS02', 'Pranata', 'Mahir', 'Melakukan Validasi Data');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sabdasetiawan206@gmail.com', 'sabda1110', '$2y$10$fCkrlsQdxuGUuSKSQHOeMO.Zu.SBhGbPB41u9xnV4STm/eujhDOBS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-04-09 00:08:00', '2022-04-09 00:08:00', NULL),
(2, 'sabdasetiawan204@gmail.com', 'sabda1210', '$2y$10$y6Ln6fEzpnWypyUTQsCT6.RPXL4m4ZoenuN8JnsvRWc/4Gm1FVkdK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-04-10 03:51:04', '2022-04-10 03:51:04', NULL);

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
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kd_kegiatan`),
  ADD KEY `data_kegiatan` (`kd_kerja`);

--
-- Indexes for table `kegiatan_statistisi`
--
ALTER TABLE `kegiatan_statistisi`
  ADD PRIMARY KEY (`kode_kegiatan`),
  ADD KEY `kode_jabata` (`kode_jabatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_bps`
--
ALTER TABLE `struktur_bps`
  ADD PRIMARY KEY (`kd_kerja`);

--
-- Indexes for table `struktur_statistisi`
--
ALTER TABLE `struktur_statistisi`
  ADD PRIMARY KEY (`kode_jabatan`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `data_kegiatan` FOREIGN KEY (`kd_kerja`) REFERENCES `struktur_bps` (`kd_kerja`);

--
-- Constraints for table `kegiatan_statistisi`
--
ALTER TABLE `kegiatan_statistisi`
  ADD CONSTRAINT `kode_jabata` FOREIGN KEY (`kode_jabatan`) REFERENCES `struktur_statistisi` (`kode_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
