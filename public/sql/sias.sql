-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jul 2022 pada 09.12
-- Versi server: 10.8.3-MariaDB-1:10.8.3+maria~jammy
-- Versi PHP: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sias`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '547dd597c835c99ce9a6adf260e7cfb8', '2022-07-19 17:11:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Superadmin'),
(2, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-03 19:23:42', 1),
(2, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-04 15:02:17', 1),
(3, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-04 15:03:13', 1),
(4, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-04 18:49:00', 1),
(5, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-05 01:56:06', 1),
(6, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-06 19:33:54', 1),
(7, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-07 21:10:52', 1),
(8, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-08 09:39:46', 1),
(9, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-08 10:22:56', 1),
(10, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-10 15:49:24', 1),
(11, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-11 08:54:28', 1),
(12, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-11 21:21:51', 1),
(13, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-12 10:32:33', 1),
(14, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-12 15:43:51', 1),
(15, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-12 18:35:49', 1),
(16, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-12 18:48:45', 1),
(17, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-14 15:00:42', 1),
(18, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-15 10:45:35', 1),
(19, '127.0.0.1', 'nurulmaulidiyah786@gmail.com', NULL, '2022-01-15 11:27:00', 0),
(20, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-15 11:28:04', 1),
(21, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-16 00:32:38', 1),
(22, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-17 00:17:58', 1),
(23, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-17 07:27:22', 1),
(24, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-17 14:49:06', 1),
(25, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-17 18:24:25', 1),
(26, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-18 00:00:35', 1),
(27, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-18 13:07:04', 1),
(28, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-18 17:52:15', 1),
(29, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-24 20:12:13', 1),
(30, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-24 20:27:25', 1),
(31, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-05-12 04:49:36', 1),
(32, '127.0.0.1', 'asnanmtakim', 3, '2022-05-12 04:50:49', 0),
(33, '127.0.0.1', 'asnanmtakim', 3, '2022-05-12 04:50:59', 0),
(34, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-05-12 04:51:47', 1),
(35, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-07-12 14:20:14', 1),
(36, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-07-18 18:30:01', 1),
(37, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-07-19 16:53:41', 1),
(38, '127.0.0.1', 'asnanmtakim', 3, '2022-07-19 17:00:22', 0),
(39, '127.0.0.1', 'asnanmtakim', 3, '2022-07-19 17:07:56', 0),
(40, '127.0.0.1', 'asnanmtakim', 3, '2022-07-19 17:10:57', 0),
(41, '127.0.0.1', 'h06216015@uinsby.ac.id', 3, '2022-07-19 17:11:50', 1),
(42, '127.0.0.1', 'h06216015@uinsby.ac.id', 3, '2022-07-19 17:12:06', 1),
(43, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-07-19 23:19:04', 1),
(44, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-07-24 09:10:42', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '', '2021-12-04 18:48:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `config_app`
--

CREATE TABLE `config_app` (
  `conf_char` varchar(50) NOT NULL,
  `conf_name` varchar(100) DEFAULT NULL,
  `conf_type` varchar(20) DEFAULT NULL,
  `conf_value` text DEFAULT NULL,
  `conf_descryption` text DEFAULT NULL,
  `conf_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `config_app`
--

INSERT INTO `config_app` (`conf_char`, `conf_name`, `conf_type`, `conf_value`, `conf_descryption`, `conf_order`) VALUES
('app_about', 'Tentang Aplikasi', 'textarea', 'Sistem Informasi Administrasi Klinik Karunia Sumberejo', NULL, 10),
('app_brand', 'Logo Aplikasi', 'img', 'assets/build/images/sias-logo.png', 'Logo Aplikasi', 3),
('app_descryption', 'Deskripsi Applikasi', 'textarea', 'Kata - Kata Ramasalah<br>Exercitatio Optimus Magister Est', 'Deskripsi singkat tentang Aplikasi', 6),
('app_icon', 'Icon Applikasi', 'img', 'assets/build/images/sias-icon.png', 'Gambar Icon Pada Tab Browser', 1),
('app_name', 'Nama Applikasi', 'text', 'SIAS Klinik Karunia Sumberejo', 'Nama Aplikasi', 4),
('app_title', 'Judul Browser', 'text', 'SIAS', 'Judul Aplikasi pada Tab Browser', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1638580644, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapat`
--

CREATE TABLE `rapat` (
  `id_rapat` int(11) NOT NULL,
  `tgl_rapat` datetime DEFAULT NULL,
  `tema_rapat` varchar(255) DEFAULT NULL,
  `pemimpin_rapat` varchar(255) DEFAULT NULL,
  `hasil_rapat` text DEFAULT NULL,
  `dokumentasi_rapat` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pasien`
--

CREATE TABLE `surat_pasien` (
  `id_surat_pasien` int(11) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `tgl_keluar` datetime DEFAULT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `jenis_surat` int(11) DEFAULT NULL COMMENT '1=umum; 2=bpjs',
  `no_bpjs` varchar(50) DEFAULT NULL COMMENT 'jika bpjs',
  `tagihan` int(11) DEFAULT NULL,
  `foto_surat` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_pasien`
--

INSERT INTO `surat_pasien` (`id_surat_pasien`, `tgl_surat`, `nama_pasien`, `tgl_masuk`, `tgl_keluar`, `diagnosa`, `jenis_surat`, `no_bpjs`, `tagihan`, `foto_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-01-18', 'Asnan Mustakim', '2022-01-12 13:05:36', '2022-01-18 13:05:44', 'Melahirkan', 2, '1039236448', 500000, 'default.png', '2022-01-18 13:06:40', '2022-01-18 19:56:28', '2022-01-18 19:56:28'),
(2, '2022-01-18', 'Irfan Kurniawan', '2022-01-09 20:00:00', '2022-01-18 17:00:00', 'Demam Berdarah', 2, '455235232123', 250000, '1642510318_cb4ec8d0c9ec172b5b41.jpg', '2022-01-18 19:51:58', '2022-01-18 19:51:58', NULL),
(3, '2022-01-17', 'Nurijah', '2022-01-16 20:00:00', '2022-01-17 19:00:00', 'Demam Berdarah', 1, '', 200000, '1642510462_a69876420b25d311d134.jpeg', '2022-01-18 19:54:22', '2022-01-18 20:35:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_umum`
--

CREATE TABLE `surat_umum` (
  `id_surat_umum` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL COMMENT '1=Biasa;2=Rahasia;3=Sangat Rahasia',
  `jenis` char(5) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `isi_surat` text DEFAULT NULL,
  `foto_surat` varchar(255) DEFAULT NULL,
  `id_surat_masuk` int(11) DEFAULT NULL,
  `id_surat_keluar` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_umum`
--

INSERT INTO `surat_umum` (`id_surat_umum`, `type`, `jenis`, `tgl_surat`, `pengirim`, `penerima`, `no_surat`, `perihal`, `isi_surat`, `foto_surat`, `id_surat_masuk`, `id_surat_keluar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'IN', '2022-01-15', 'Asnan', 'Diyah', '123-MWC-01-2020', 'Penting', 'Tes ajaja', 'default.png', NULL, 6, '2022-01-15 12:33:41', '2022-01-15 21:13:30', NULL),
(3, '1', 'IN', '2022-01-14', 'Dinas Pendidikan', 'Kurnia Sumberrejo', '110-DIPEN-01-2022', 'Undangan', '<p>Tes ajaaaaa</p>', '1642242005_e3173b12dcbfa274887b.jpg', NULL, 0, '2022-01-15 17:20:05', '2022-01-15 21:13:30', '2022-01-15 21:13:18'),
(4, '1', 'OUT', '2022-01-12', 'Kurnia', 'RSUD Bojonegoro', '10-KM-01-2022', 'Penting', '<p>Ini tesnyaa</p>', '1642247990_eff99ee780b45c4f5535.jpg', NULL, NULL, '2022-01-15 18:59:50', '2022-01-15 18:59:50', NULL),
(5, '1', 'OUT', '2022-01-13', 'Kurnia', 'Dinas Pendidikan', '11-KM-01-2022', 'Penting', '<p>TES TES</p>', '1642248057_649e558828cf9397b276.jpg', NULL, NULL, '2022-01-15 19:00:57', '2022-01-15 19:00:57', NULL),
(6, '3', 'OUT', '2022-01-14', 'Kurnia', 'Dinas Pendidikan', '12-KM-01-2022', 'Penting Pendidikan', '<p>Tes ajaaa hh</p>', '1642248126_9d1fc016c03a46671204.jpg', 1, NULL, '2022-01-15 19:02:06', '2022-01-15 21:13:30', NULL),
(9, '2', 'IN', '2022-07-14', 'Dinas Pendidikan', 'Kurnia Sumberrejo', '11-KM-102-2022', 'Undangan Penting Pendidikan', '<p>Isi tes surat</p>', '1658229167_2bf1dbf53d7210095241.jpg', NULL, NULL, '2022-07-19 18:12:47', '2022-07-19 18:12:47', NULL),
(10, '2', 'OUT', '2022-07-01', 'Kurnia', 'RSUD Bojonegoro', '110-DIPEN-03-2022', 'Penting', '<p>sadsadasfwefwefw</p>', '1658229293_53d3385b197f05af3901.png', NULL, NULL, '2022-07-19 18:14:53', '2022-07-19 18:14:53', NULL),
(11, '2', 'IN', '2022-07-02', 'sadasdas', 'dasdasdas', 'asdasdasdas', 'sadsadas', '<p>Tes edit</p>', '1658229502_d2879885eb30a7a823cc.png', NULL, NULL, '2022-07-19 18:18:22', '2022-07-19 18:18:56', '2022-07-19 18:18:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image_user` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `fullname`, `gender`, `phone`, `image_user`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asnanmustakim126@gmail.com', 'admin', '$2y$10$5wPl1S.sWzSgjPCHHV2K3Oi1yiABvkyjAWMQZ/X3MuH.3.T0tnWzO', 'Admin SIAS', 'L', '082334282708', 'asnanmustakim126gmailcom_image_user.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-03 19:23:11', '2021-12-11 09:59:23', NULL),
(2, 'nurulmaulidiyah786@gmail.com', 'diyahnurmaaa', '$2y$10$I8RYo75EDMn7Gz1ybhiaLeaP4fyPBfUZGmXCJaH0wZPn6uXqGH6Py', 'Nurul Maulidiyah', 'P', '08634353453', 'nurulmaulidiyah786gmailcom_image_user.jpg', NULL, NULL, NULL, 'b0c58c2a2866e1a9f4012c17ba63da7c', NULL, NULL, 0, 0, '2022-01-12 11:42:39', '2022-01-12 19:15:32', '2022-01-12 19:15:32'),
(3, 'h06216015@uinsby.ac.id', 'asnanmtakim', '$2y$10$gNL05WMG3AFPqd1N6O1K4eQdG4SmPeq.e/Q8X2WRb.wR6OHkPG9ni', 'Asnan Mustakim', 'L', '082334282708', 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-05-12 04:50:31', '2022-07-19 17:11:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `config_app`
--
ALTER TABLE `config_app`
  ADD PRIMARY KEY (`conf_char`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`id_rapat`);

--
-- Indeks untuk tabel `surat_pasien`
--
ALTER TABLE `surat_pasien`
  ADD PRIMARY KEY (`id_surat_pasien`);

--
-- Indeks untuk tabel `surat_umum`
--
ALTER TABLE `surat_umum`
  ADD PRIMARY KEY (`id_surat_umum`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rapat`
--
ALTER TABLE `rapat`
  MODIFY `id_rapat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_pasien`
--
ALTER TABLE `surat_pasien`
  MODIFY `id_surat_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_umum`
--
ALTER TABLE `surat_umum`
  MODIFY `id_surat_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
