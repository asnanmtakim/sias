/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 100703
 Source Host           : 127.0.0.1:3306
 Source Schema         : sias

 Target Server Type    : MariaDB
 Target Server Version : 100703
 File Encoding         : 65001

 Date: 12/05/2022 05:13:52
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_activation_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_activation_attempts
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_groups
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_groups
-- ----------------------------
BEGIN;
INSERT INTO `auth_groups` VALUES (1, 'superadmin', 'Superadmin');
INSERT INTO `auth_groups` VALUES (2, 'admin', 'Admin');
COMMIT;

-- ----------------------------
-- Table structure for auth_groups_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_groups_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_groups_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_groups_users
-- ----------------------------
BEGIN;
INSERT INTO `auth_groups_users` VALUES (1, 1);
INSERT INTO `auth_groups_users` VALUES (1, 2);
INSERT INTO `auth_groups_users` VALUES (2, 3);
COMMIT;

-- ----------------------------
-- Table structure for auth_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
BEGIN;
INSERT INTO `auth_logins` VALUES (1, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-03 19:23:42', 1);
INSERT INTO `auth_logins` VALUES (2, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-04 15:02:17', 1);
INSERT INTO `auth_logins` VALUES (3, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-04 15:03:13', 1);
INSERT INTO `auth_logins` VALUES (4, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-04 18:49:00', 1);
INSERT INTO `auth_logins` VALUES (5, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-05 01:56:06', 1);
INSERT INTO `auth_logins` VALUES (6, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-06 19:33:54', 1);
INSERT INTO `auth_logins` VALUES (7, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-07 21:10:52', 1);
INSERT INTO `auth_logins` VALUES (8, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-08 09:39:46', 1);
INSERT INTO `auth_logins` VALUES (9, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-08 10:22:56', 1);
INSERT INTO `auth_logins` VALUES (10, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-10 15:49:24', 1);
INSERT INTO `auth_logins` VALUES (11, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-11 08:54:28', 1);
INSERT INTO `auth_logins` VALUES (12, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2021-12-11 21:21:51', 1);
INSERT INTO `auth_logins` VALUES (13, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-12 10:32:33', 1);
INSERT INTO `auth_logins` VALUES (14, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-12 15:43:51', 1);
INSERT INTO `auth_logins` VALUES (15, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-12 18:35:49', 1);
INSERT INTO `auth_logins` VALUES (16, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-12 18:48:45', 1);
INSERT INTO `auth_logins` VALUES (17, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-14 15:00:42', 1);
INSERT INTO `auth_logins` VALUES (18, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-15 10:45:35', 1);
INSERT INTO `auth_logins` VALUES (19, '127.0.0.1', 'nurulmaulidiyah786@gmail.com', NULL, '2022-01-15 11:27:00', 0);
INSERT INTO `auth_logins` VALUES (20, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-15 11:28:04', 1);
INSERT INTO `auth_logins` VALUES (21, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-16 00:32:38', 1);
INSERT INTO `auth_logins` VALUES (22, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-17 00:17:58', 1);
INSERT INTO `auth_logins` VALUES (23, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-17 07:27:22', 1);
INSERT INTO `auth_logins` VALUES (24, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-17 14:49:06', 1);
INSERT INTO `auth_logins` VALUES (25, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-17 18:24:25', 1);
INSERT INTO `auth_logins` VALUES (26, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-18 00:00:35', 1);
INSERT INTO `auth_logins` VALUES (27, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-18 13:07:04', 1);
INSERT INTO `auth_logins` VALUES (28, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-01-18 17:52:15', 1);
INSERT INTO `auth_logins` VALUES (29, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-24 20:12:13', 1);
INSERT INTO `auth_logins` VALUES (30, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-04-24 20:27:25', 1);
INSERT INTO `auth_logins` VALUES (31, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-05-12 04:49:36', 1);
INSERT INTO `auth_logins` VALUES (32, '127.0.0.1', 'asnanmtakim', 3, '2022-05-12 04:50:49', 0);
INSERT INTO `auth_logins` VALUES (33, '127.0.0.1', 'asnanmtakim', 3, '2022-05-12 04:50:59', 0);
INSERT INTO `auth_logins` VALUES (34, '127.0.0.1', 'asnanmustakim126@gmail.com', 1, '2022-05-12 04:51:47', 1);
COMMIT;

-- ----------------------------
-- Table structure for auth_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_reset_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_reset_attempts
-- ----------------------------
BEGIN;
INSERT INTO `auth_reset_attempts` VALUES (1, '', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '', '2021-12-04 18:48:17');
COMMIT;

-- ----------------------------
-- Table structure for auth_tokens
-- ----------------------------
DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for auth_users_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of auth_users_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for config_app
-- ----------------------------
DROP TABLE IF EXISTS `config_app`;
CREATE TABLE `config_app` (
  `conf_char` varchar(50) NOT NULL,
  `conf_name` varchar(100) DEFAULT NULL,
  `conf_type` varchar(20) DEFAULT NULL,
  `conf_value` text DEFAULT NULL,
  `conf_descryption` text DEFAULT NULL,
  `conf_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`conf_char`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of config_app
-- ----------------------------
BEGIN;
INSERT INTO `config_app` VALUES ('app_about', 'Tentang Aplikasi', 'textarea', 'Sistem Informasi Administrasi Klinik Karunia Sumberejo', NULL, 10);
INSERT INTO `config_app` VALUES ('app_brand', 'Logo Aplikasi', 'img', 'assets/build/images/sias-logo.png', 'Logo Aplikasi', 3);
INSERT INTO `config_app` VALUES ('app_descryption', 'Deskripsi Applikasi', 'textarea', 'Kata - Kata Ramasalah<br>Exercitatio Optimus Magister Est', 'Deskripsi singkat tentang Aplikasi', 6);
INSERT INTO `config_app` VALUES ('app_icon', 'Icon Applikasi', 'img', 'assets/build/images/sias-icon.png', 'Gambar Icon Pada Tab Browser', 1);
INSERT INTO `config_app` VALUES ('app_name', 'Nama Applikasi', 'text', 'SIAS Klinik Karunia Sumberejo', 'Nama Aplikasi', 4);
INSERT INTO `config_app` VALUES ('app_title', 'Judul Browser', 'text', 'SIAS', 'Judul Aplikasi pada Tab Browser', 2);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1638580644, 1);
COMMIT;

-- ----------------------------
-- Table structure for rapat
-- ----------------------------
DROP TABLE IF EXISTS `rapat`;
CREATE TABLE `rapat` (
  `id_rapat` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_rapat` datetime DEFAULT NULL,
  `tema_rapat` varchar(255) DEFAULT NULL,
  `pemimpin_rapat` varchar(255) DEFAULT NULL,
  `hasil_rapat` text DEFAULT NULL,
  `dokumentasi_rapat` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rapat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of rapat
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for surat_pasien
-- ----------------------------
DROP TABLE IF EXISTS `surat_pasien`;
CREATE TABLE `surat_pasien` (
  `id_surat_pasien` int(11) NOT NULL AUTO_INCREMENT,
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
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_surat_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of surat_pasien
-- ----------------------------
BEGIN;
INSERT INTO `surat_pasien` VALUES (1, '2022-01-18', 'Asnan Mustakim', '2022-01-12 13:05:36', '2022-01-18 13:05:44', 'Melahirkan', 2, '1039236448', 500000, 'default.png', '2022-01-18 13:06:40', '2022-01-18 19:56:28', '2022-01-18 19:56:28');
INSERT INTO `surat_pasien` VALUES (2, '2022-01-18', 'Irfan Kurniawan', '2022-01-09 20:00:00', '2022-01-18 17:00:00', 'Demam Berdarah', 2, '455235232123', 250000, '1642510318_cb4ec8d0c9ec172b5b41.jpg', '2022-01-18 19:51:58', '2022-01-18 19:51:58', NULL);
INSERT INTO `surat_pasien` VALUES (3, '2022-01-17', 'Nurijah', '2022-01-16 20:00:00', '2022-01-17 19:00:00', 'Demam Berdarah', 1, '', 200000, '1642510462_a69876420b25d311d134.jpeg', '2022-01-18 19:54:22', '2022-01-18 20:35:23', NULL);
COMMIT;

-- ----------------------------
-- Table structure for surat_umum
-- ----------------------------
DROP TABLE IF EXISTS `surat_umum`;
CREATE TABLE `surat_umum` (
  `id_surat_umum` int(11) NOT NULL AUTO_INCREMENT,
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
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_surat_umum`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of surat_umum
-- ----------------------------
BEGIN;
INSERT INTO `surat_umum` VALUES (1, 'IN', '2022-01-15', 'Asnan', 'Diyah', '123-MWC-01-2020', 'Penting', 'Tes ajaja', 'default.png', NULL, 6, '2022-01-15 12:33:41', '2022-01-15 21:13:30', NULL);
INSERT INTO `surat_umum` VALUES (3, 'IN', '2022-01-14', 'Dinas Pendidikan', 'Kurnia Sumberrejo', '110-DIPEN-01-2022', 'Undangan', '<p>Tes ajaaaaa</p>', '1642242005_e3173b12dcbfa274887b.jpg', NULL, 0, '2022-01-15 17:20:05', '2022-01-15 21:13:30', '2022-01-15 21:13:18');
INSERT INTO `surat_umum` VALUES (4, 'OUT', '2022-01-12', 'Kurnia', 'RSUD Bojonegoro', '10-KM-01-2022', 'Penting', '<p>Ini tesnyaa</p>', '1642247990_eff99ee780b45c4f5535.jpg', NULL, NULL, '2022-01-15 18:59:50', '2022-01-15 18:59:50', NULL);
INSERT INTO `surat_umum` VALUES (5, 'OUT', '2022-01-13', 'Kurnia', 'Dinas Pendidikan', '11-KM-01-2022', 'Penting', '<p>TES TES</p>', '1642248057_649e558828cf9397b276.jpg', NULL, NULL, '2022-01-15 19:00:57', '2022-01-15 19:00:57', NULL);
INSERT INTO `surat_umum` VALUES (6, 'OUT', '2022-01-14', 'Kurnia', 'Dinas Pendidikan', '12-KM-01-2022', 'Penting Pendidikan', '<p>Tes ajaaa hh</p>', '1642248126_9d1fc016c03a46671204.jpg', 1, NULL, '2022-01-15 19:02:06', '2022-01-15 21:13:30', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'asnanmustakim126@gmail.com', 'admin', '$2y$10$5wPl1S.sWzSgjPCHHV2K3Oi1yiABvkyjAWMQZ/X3MuH.3.T0tnWzO', 'Admin SIAS', 'L', '082334282708', 'asnanmustakim126gmailcom_image_user.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-03 19:23:11', '2021-12-11 09:59:23', NULL);
INSERT INTO `users` VALUES (2, 'nurulmaulidiyah786@gmail.com', 'diyahnurmaaa', '$2y$10$I8RYo75EDMn7Gz1ybhiaLeaP4fyPBfUZGmXCJaH0wZPn6uXqGH6Py', 'Nurul Maulidiyah', 'P', '08634353453', 'nurulmaulidiyah786gmailcom_image_user.jpg', NULL, NULL, NULL, 'b0c58c2a2866e1a9f4012c17ba63da7c', NULL, NULL, 0, 0, '2022-01-12 11:42:39', '2022-01-12 19:15:32', '2022-01-12 19:15:32');
INSERT INTO `users` VALUES (3, 'h06216015@uinsby.ac.id', 'asnanmtakim', '$2y$10$gNL05WMG3AFPqd1N6O1K4eQdG4SmPeq.e/Q8X2WRb.wR6OHkPG9ni', 'Asnan Mustakim', 'L', '082334282708', 'default.png', NULL, NULL, NULL, '547dd597c835c99ce9a6adf260e7cfb8', NULL, NULL, 0, 0, '2022-05-12 04:50:31', '2022-05-12 04:50:31', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
