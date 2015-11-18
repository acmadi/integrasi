/*
MySQL Data Transfer
Source Host: localhost
Source Database: integrasi
Target Host: localhost
Target Database: integrasi
Date: 02/11/2015 16:11:04
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for akses
-- ----------------------------
CREATE TABLE `akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) DEFAULT NULL,
  `controller_method` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `akses` int(11) DEFAULT '0',
  `arr_id` int(10) DEFAULT NULL,
  `route_name` varchar(20) DEFAULT NULL,
  `table_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3106 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for bidang
-- ----------------------------
CREATE TABLE `bidang` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) NOT NULL DEFAULT '0',
  `kd_urusan` char(5) NOT NULL DEFAULT '',
  `kd_bidang` char(5) NOT NULL DEFAULT '',
  `nm_bidang` varchar(255) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `files_id` int(10) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`tahun`,`kd_urusan`,`kd_bidang`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dpa
-- ----------------------------
CREATE TABLE `dpa` (
  `id` bigint(25) NOT NULL AUTO_INCREMENT,
  `kd_urusan` char(5) DEFAULT NULL,
  `kd_bidang` char(5) DEFAULT NULL,
  `kd_program` char(5) DEFAULT NULL,
  `kd_kegiatan` char(5) DEFAULT NULL,
  `kd_skpd` char(20) DEFAULT NULL,
  `indikator_capaian` varchar(255) DEFAULT NULL,
  `target_capaian` decimal(20,2) DEFAULT NULL,
  `satuan_capaian` varchar(255) DEFAULT NULL,
  `indikator_hasil` varchar(255) DEFAULT NULL,
  `target_hasil` decimal(20,5) DEFAULT NULL,
  `satuan_hasil` varchar(255) DEFAULT NULL,
  `indikator_keluaran` varchar(255) DEFAULT NULL,
  `target_keluaran` decimal(20,5) DEFAULT NULL,
  `satuan_keluaran` varchar(255) DEFAULT NULL,
  `pagu_anggaran` decimal(20,2) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kelompok_sasaran` varchar(255) DEFAULT NULL,
  `rencana_pengambilan_TB_1` decimal(20,2) DEFAULT NULL,
  `rencana_pengambilan_TB_2` decimal(20,2) DEFAULT NULL,
  `rencana_pengambilan_TB_3` decimal(20,2) DEFAULT NULL,
  `rencana_pengambilan_TB_4` decimal(20,2) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `exports_id` bigint(10) DEFAULT NULL,
  `files_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for eksports
-- ----------------------------
CREATE TABLE `eksports` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `files_id` bigint(10) DEFAULT NULL,
  `imports_id` bigint(10) DEFAULT NULL,
  `users_id` bigint(10) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `link_file` varchar(255) DEFAULT NULL,
  `status_eksport` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for files
-- ----------------------------
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size_file` bigint(100) DEFAULT NULL,
  `db_table` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for group_akses
-- ----------------------------
CREATE TABLE `group_akses` (
  `groups_id` int(10) DEFAULT NULL,
  `akses_id` int(10) DEFAULT NULL,
  `permission` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for imports
-- ----------------------------
CREATE TABLE `imports` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `files_id` bigint(10) DEFAULT NULL,
  `status_import` varchar(255) DEFAULT NULL,
  `jumlah_baris` int(10) DEFAULT NULL,
  `jumlah_kolom` int(10) DEFAULT NULL,
  `users_id` bigint(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
CREATE TABLE `kegiatan` (
  `tahun` int(4) NOT NULL DEFAULT '0',
  `kd_urusan` char(5) NOT NULL DEFAULT '',
  `kd_bidang` char(5) NOT NULL DEFAULT '',
  `kd_program` char(5) NOT NULL DEFAULT '',
  `kd_kegiatan` char(5) NOT NULL DEFAULT '',
  `nm_kegiatan` varchar(5) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `exports_id` bigint(10) DEFAULT NULL,
  `files_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`tahun`,`kd_urusan`,`kd_bidang`,`kd_program`,`kd_kegiatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for log
-- ----------------------------
CREATE TABLE `log` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(10) DEFAULT NULL,
  `groups_id` bigint(10) DEFAULT NULL,
  `arr_id` bigint(10) DEFAULT NULL,
  `table` varchar(225) DEFAULT NULL,
  `table_id` bigint(5) DEFAULT NULL,
  `action_name` varchar(255) DEFAULT NULL,
  `catatan` char(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for organisasi_skpd
-- ----------------------------
CREATE TABLE `organisasi_skpd` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) NOT NULL,
  `kd_urusan` char(5) NOT NULL,
  `kd_bidang` char(5) NOT NULL,
  `kd_organisasi` char(5) NOT NULL,
  `nm_organisasi` varchar(255) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `exports_id` bigint(10) DEFAULT NULL,
  `files_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for program
-- ----------------------------
CREATE TABLE `program` (
  `tahun` int(4) NOT NULL,
  `kd_urusan` char(5) NOT NULL,
  `kd_bidang` char(5) NOT NULL,
  `kd_program` char(5) NOT NULL,
  `nm_program` varchar(255) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `exports_id` bigint(10) DEFAULT NULL,
  `files_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`tahun`,`kd_urusan`,`kd_bidang`,`kd_program`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for realisasi
-- ----------------------------
CREATE TABLE `realisasi` (
  `tahun` int(4) NOT NULL,
  `kd_urusan` char(5) NOT NULL,
  `kd_bidang` char(5) NOT NULL,
  `kd_program` char(5) NOT NULL,
  `kd_kegiatan` char(5) NOT NULL,
  `kd_skpd` char(20) NOT NULL,
  `realisasi_bulan_1` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_2` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_3` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_4` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_5` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_6` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_7` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_8` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_9` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_10` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_11` decimal(20,2) DEFAULT NULL,
  `realisasi_bulan_12` decimal(20,2) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `exports_id` bigint(10) DEFAULT NULL,
  `files_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`tahun`,`kd_urusan`,`kd_bidang`,`kd_program`,`kd_kegiatan`,`kd_skpd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for rkpd
-- ----------------------------
CREATE TABLE `rkpd` (
  `id` bigint(255) unsigned zerofill NOT NULL,
  `kd_urusan` char(5) NOT NULL,
  `kd_bidang` char(5) NOT NULL,
  `kd_program` char(5) NOT NULL,
  `kd_kegiatan` char(5) NOT NULL,
  `kd_skpd` char(20) NOT NULL,
  `indikator_capaian` varchar(255) DEFAULT NULL,
  `target_capaian` decimal(20,2) DEFAULT NULL,
  `satuan_capaian` varchar(255) DEFAULT NULL,
  `indikator_hasil` varchar(255) DEFAULT NULL,
  `target_hasil` decimal(20,2) DEFAULT NULL,
  `satuan_hasil` varchar(255) DEFAULT NULL,
  `indikator_keluaran` varchar(255) DEFAULT NULL,
  `target_keluaran` decimal(20,2) DEFAULT NULL,
  `satuan_keluaran` varchar(255) DEFAULT NULL,
  `pagu_anggaran` decimal(20,2) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kelompok_sasaran` varchar(255) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `exports_id` bigint(10) DEFAULT NULL,
  `files_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for throttle
-- ----------------------------
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for tree_menu
-- ----------------------------
CREATE TABLE `tree_menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `parentid` int(3) NOT NULL DEFAULT '0',
  `text` varchar(20) DEFAULT NULL,
  `route_link` varchar(20) DEFAULT NULL,
  `id_datagrid` varchar(20) DEFAULT NULL,
  `db` varchar(20) DEFAULT NULL,
  `filter_filter` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`parentid`)
) ENGINE=InnoDB AUTO_INCREMENT=804 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for urusan
-- ----------------------------
CREATE TABLE `urusan` (
  `tahun` int(4) NOT NULL DEFAULT '0',
  `kd_urusan` char(5) NOT NULL DEFAULT '',
  `nm_urusan` varchar(255) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `exports_id` bigint(10) DEFAULT NULL,
  `files_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for usersx
-- ----------------------------
CREATE TABLE `usersx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usersx_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `akses` VALUES ('2818', null, null, '5', '1', '0', null, '0');
INSERT INTO `akses` VALUES ('2819', null, null, '5', '1', '1', null, '0');
INSERT INTO `akses` VALUES ('2820', null, null, '5', '1', '2', null, '0');
INSERT INTO `akses` VALUES ('2821', null, null, '5', '1', '3', null, '0');
INSERT INTO `akses` VALUES ('2822', null, null, '5', '1', '4', null, '0');
INSERT INTO `akses` VALUES ('2823', null, null, '5', '1', '5', null, '0');
INSERT INTO `akses` VALUES ('2824', null, null, '5', '1', '6', null, '0');
INSERT INTO `akses` VALUES ('2825', null, null, '5', '1', '7', null, '0');
INSERT INTO `akses` VALUES ('2826', null, null, '5', '1', '8', null, '0');
INSERT INTO `akses` VALUES ('2827', null, null, '5', '1', '9', null, '0');
INSERT INTO `akses` VALUES ('2828', null, null, '5', '1', '10', null, '0');
INSERT INTO `akses` VALUES ('2829', null, null, '5', '1', '11', null, '0');
INSERT INTO `akses` VALUES ('2830', null, null, '5', '1', '12', null, '0');
INSERT INTO `akses` VALUES ('2831', null, null, '5', '1', '13', null, '0');
INSERT INTO `akses` VALUES ('2832', null, null, '5', '1', '14', null, '0');
INSERT INTO `akses` VALUES ('2833', null, null, '5', '1', '15', null, '0');
INSERT INTO `akses` VALUES ('2834', null, null, '5', '1', '16', null, '0');
INSERT INTO `akses` VALUES ('2835', null, null, '5', '1', '17', null, '0');
INSERT INTO `akses` VALUES ('2836', null, null, '5', '1', '0', null, '1');
INSERT INTO `akses` VALUES ('2837', null, null, '5', '1', '1', null, '1');
INSERT INTO `akses` VALUES ('2838', null, null, '5', '1', '2', null, '1');
INSERT INTO `akses` VALUES ('2839', null, null, '5', '1', '3', null, '1');
INSERT INTO `akses` VALUES ('2840', null, null, '5', '1', '4', null, '1');
INSERT INTO `akses` VALUES ('2841', null, null, '5', '1', '5', null, '1');
INSERT INTO `akses` VALUES ('2842', null, null, '5', '1', '6', null, '1');
INSERT INTO `akses` VALUES ('2843', null, null, '5', '1', '7', null, '1');
INSERT INTO `akses` VALUES ('2844', null, null, '5', '1', '8', null, '1');
INSERT INTO `akses` VALUES ('2845', null, null, '5', '1', '9', null, '1');
INSERT INTO `akses` VALUES ('2846', null, null, '5', '1', '10', null, '1');
INSERT INTO `akses` VALUES ('2847', null, null, '5', '1', '11', null, '1');
INSERT INTO `akses` VALUES ('2848', null, null, '5', '1', '12', null, '1');
INSERT INTO `akses` VALUES ('2849', null, null, '5', '1', '13', null, '1');
INSERT INTO `akses` VALUES ('2850', null, null, '5', '1', '14', null, '1');
INSERT INTO `akses` VALUES ('2851', null, null, '5', '1', '15', null, '1');
INSERT INTO `akses` VALUES ('2852', null, null, '5', '1', '16', null, '1');
INSERT INTO `akses` VALUES ('2853', null, null, '5', '1', '17', null, '1');
INSERT INTO `akses` VALUES ('2854', null, null, '5', '0', '0', null, '2');
INSERT INTO `akses` VALUES ('2855', null, null, '5', '0', '1', null, '2');
INSERT INTO `akses` VALUES ('2856', null, null, '5', '0', '2', null, '2');
INSERT INTO `akses` VALUES ('2857', null, null, '5', '0', '3', null, '2');
INSERT INTO `akses` VALUES ('2858', null, null, '5', '0', '4', null, '2');
INSERT INTO `akses` VALUES ('2859', null, null, '5', '0', '5', null, '2');
INSERT INTO `akses` VALUES ('2860', null, null, '5', '0', '6', null, '2');
INSERT INTO `akses` VALUES ('2861', null, null, '5', '0', '7', null, '2');
INSERT INTO `akses` VALUES ('2862', null, null, '5', '0', '8', null, '2');
INSERT INTO `akses` VALUES ('2863', null, null, '5', '0', '9', null, '2');
INSERT INTO `akses` VALUES ('2864', null, null, '5', '0', '10', null, '2');
INSERT INTO `akses` VALUES ('2865', null, null, '5', '0', '11', null, '2');
INSERT INTO `akses` VALUES ('2866', null, null, '5', '0', '12', null, '2');
INSERT INTO `akses` VALUES ('2867', null, null, '5', '0', '13', null, '2');
INSERT INTO `akses` VALUES ('2868', null, null, '5', '0', '14', null, '2');
INSERT INTO `akses` VALUES ('2869', null, null, '5', '0', '15', null, '2');
INSERT INTO `akses` VALUES ('2870', null, null, '5', '0', '16', null, '2');
INSERT INTO `akses` VALUES ('2871', null, null, '5', '0', '17', null, '2');
INSERT INTO `akses` VALUES ('2872', null, null, '5', '0', '0', null, '3');
INSERT INTO `akses` VALUES ('2873', null, null, '5', '0', '1', null, '3');
INSERT INTO `akses` VALUES ('2874', null, null, '5', '0', '2', null, '3');
INSERT INTO `akses` VALUES ('2875', null, null, '5', '0', '3', null, '3');
INSERT INTO `akses` VALUES ('2876', null, null, '5', '0', '4', null, '3');
INSERT INTO `akses` VALUES ('2877', null, null, '5', '0', '5', null, '3');
INSERT INTO `akses` VALUES ('2878', null, null, '5', '0', '6', null, '3');
INSERT INTO `akses` VALUES ('2879', null, null, '5', '0', '7', null, '3');
INSERT INTO `akses` VALUES ('2880', null, null, '5', '0', '8', null, '3');
INSERT INTO `akses` VALUES ('2881', null, null, '5', '0', '9', null, '3');
INSERT INTO `akses` VALUES ('2882', null, null, '5', '0', '10', null, '3');
INSERT INTO `akses` VALUES ('2883', null, null, '5', '0', '11', null, '3');
INSERT INTO `akses` VALUES ('2884', null, null, '5', '0', '12', null, '3');
INSERT INTO `akses` VALUES ('2885', null, null, '5', '0', '13', null, '3');
INSERT INTO `akses` VALUES ('2886', null, null, '5', '0', '14', null, '3');
INSERT INTO `akses` VALUES ('2887', null, null, '5', '0', '15', null, '3');
INSERT INTO `akses` VALUES ('2888', null, null, '5', '0', '16', null, '3');
INSERT INTO `akses` VALUES ('2889', null, null, '5', '0', '17', null, '3');
INSERT INTO `akses` VALUES ('2890', null, null, '5', '0', '0', null, '4');
INSERT INTO `akses` VALUES ('2891', null, null, '5', '0', '1', null, '4');
INSERT INTO `akses` VALUES ('2892', null, null, '5', '0', '2', null, '4');
INSERT INTO `akses` VALUES ('2893', null, null, '5', '0', '3', null, '4');
INSERT INTO `akses` VALUES ('2894', null, null, '5', '0', '4', null, '4');
INSERT INTO `akses` VALUES ('2895', null, null, '5', '0', '5', null, '4');
INSERT INTO `akses` VALUES ('2896', null, null, '5', '0', '6', null, '4');
INSERT INTO `akses` VALUES ('2897', null, null, '5', '0', '7', null, '4');
INSERT INTO `akses` VALUES ('2898', null, null, '5', '0', '8', null, '4');
INSERT INTO `akses` VALUES ('2899', null, null, '5', '0', '9', null, '4');
INSERT INTO `akses` VALUES ('2900', null, null, '5', '0', '10', null, '4');
INSERT INTO `akses` VALUES ('2901', null, null, '5', '0', '11', null, '4');
INSERT INTO `akses` VALUES ('2902', null, null, '5', '0', '12', null, '4');
INSERT INTO `akses` VALUES ('2903', null, null, '5', '0', '13', null, '4');
INSERT INTO `akses` VALUES ('2904', null, null, '5', '0', '14', null, '4');
INSERT INTO `akses` VALUES ('2905', null, null, '5', '0', '15', null, '4');
INSERT INTO `akses` VALUES ('2906', null, null, '5', '0', '16', null, '4');
INSERT INTO `akses` VALUES ('2907', null, null, '5', '0', '17', null, '4');
INSERT INTO `akses` VALUES ('2908', null, null, '5', '0', '0', null, '5');
INSERT INTO `akses` VALUES ('2909', null, null, '5', '0', '1', null, '5');
INSERT INTO `akses` VALUES ('2910', null, null, '5', '0', '2', null, '5');
INSERT INTO `akses` VALUES ('2911', null, null, '5', '0', '3', null, '5');
INSERT INTO `akses` VALUES ('2912', null, null, '5', '0', '4', null, '5');
INSERT INTO `akses` VALUES ('2913', null, null, '5', '0', '5', null, '5');
INSERT INTO `akses` VALUES ('2914', null, null, '5', '0', '6', null, '5');
INSERT INTO `akses` VALUES ('2915', null, null, '5', '0', '7', null, '5');
INSERT INTO `akses` VALUES ('2916', null, null, '5', '0', '8', null, '5');
INSERT INTO `akses` VALUES ('2917', null, null, '5', '0', '9', null, '5');
INSERT INTO `akses` VALUES ('2918', null, null, '5', '0', '10', null, '5');
INSERT INTO `akses` VALUES ('2919', null, null, '5', '0', '11', null, '5');
INSERT INTO `akses` VALUES ('2920', null, null, '5', '0', '12', null, '5');
INSERT INTO `akses` VALUES ('2921', null, null, '5', '0', '13', null, '5');
INSERT INTO `akses` VALUES ('2922', null, null, '5', '0', '14', null, '5');
INSERT INTO `akses` VALUES ('2923', null, null, '5', '0', '15', null, '5');
INSERT INTO `akses` VALUES ('2924', null, null, '5', '0', '16', null, '5');
INSERT INTO `akses` VALUES ('2925', null, null, '5', '0', '17', null, '5');
INSERT INTO `akses` VALUES ('2926', null, null, '5', '0', '0', null, '6');
INSERT INTO `akses` VALUES ('2927', null, null, '5', '0', '1', null, '6');
INSERT INTO `akses` VALUES ('2928', null, null, '5', '0', '2', null, '6');
INSERT INTO `akses` VALUES ('2929', null, null, '5', '0', '3', null, '6');
INSERT INTO `akses` VALUES ('2930', null, null, '5', '0', '4', null, '6');
INSERT INTO `akses` VALUES ('2931', null, null, '5', '0', '5', null, '6');
INSERT INTO `akses` VALUES ('2932', null, null, '5', '0', '6', null, '6');
INSERT INTO `akses` VALUES ('2933', null, null, '5', '0', '7', null, '6');
INSERT INTO `akses` VALUES ('2934', null, null, '5', '0', '8', null, '6');
INSERT INTO `akses` VALUES ('2935', null, null, '5', '0', '9', null, '6');
INSERT INTO `akses` VALUES ('2936', null, null, '5', '0', '10', null, '6');
INSERT INTO `akses` VALUES ('2937', null, null, '5', '0', '11', null, '6');
INSERT INTO `akses` VALUES ('2938', null, null, '5', '0', '12', null, '6');
INSERT INTO `akses` VALUES ('2939', null, null, '5', '0', '13', null, '6');
INSERT INTO `akses` VALUES ('2940', null, null, '5', '0', '14', null, '6');
INSERT INTO `akses` VALUES ('2941', null, null, '5', '0', '15', null, '6');
INSERT INTO `akses` VALUES ('2942', null, null, '5', '0', '16', null, '6');
INSERT INTO `akses` VALUES ('2943', null, null, '5', '0', '17', null, '6');
INSERT INTO `akses` VALUES ('2944', null, null, '5', '1', '0', null, '7');
INSERT INTO `akses` VALUES ('2945', null, null, '5', '1', '1', null, '7');
INSERT INTO `akses` VALUES ('2946', null, null, '5', '0', '2', null, '7');
INSERT INTO `akses` VALUES ('2947', null, null, '5', '1', '3', null, '7');
INSERT INTO `akses` VALUES ('2948', null, null, '5', '1', '4', null, '7');
INSERT INTO `akses` VALUES ('2949', null, null, '5', '1', '5', null, '7');
INSERT INTO `akses` VALUES ('2950', null, null, '5', '1', '6', null, '7');
INSERT INTO `akses` VALUES ('2951', null, null, '5', '1', '7', null, '7');
INSERT INTO `akses` VALUES ('2952', null, null, '5', '1', '8', null, '7');
INSERT INTO `akses` VALUES ('2953', null, null, '5', '1', '9', null, '7');
INSERT INTO `akses` VALUES ('2954', null, null, '5', '1', '10', null, '7');
INSERT INTO `akses` VALUES ('2955', null, null, '5', '1', '11', null, '7');
INSERT INTO `akses` VALUES ('2956', null, null, '5', '1', '12', null, '7');
INSERT INTO `akses` VALUES ('2957', null, null, '5', '1', '13', null, '7');
INSERT INTO `akses` VALUES ('2958', null, null, '5', '1', '14', null, '7');
INSERT INTO `akses` VALUES ('2959', null, null, '5', '1', '15', null, '7');
INSERT INTO `akses` VALUES ('2960', null, null, '5', '1', '16', null, '7');
INSERT INTO `akses` VALUES ('2961', null, null, '5', '1', '17', null, '7');
INSERT INTO `akses` VALUES ('2962', null, null, '1', '1', '0', null, '0');
INSERT INTO `akses` VALUES ('2963', null, null, '1', '1', '1', null, '0');
INSERT INTO `akses` VALUES ('2964', null, null, '1', '1', '2', null, '0');
INSERT INTO `akses` VALUES ('2965', null, null, '1', '1', '3', null, '0');
INSERT INTO `akses` VALUES ('2966', null, null, '1', '1', '4', null, '0');
INSERT INTO `akses` VALUES ('2967', null, null, '1', '1', '5', null, '0');
INSERT INTO `akses` VALUES ('2968', null, null, '1', '1', '6', null, '0');
INSERT INTO `akses` VALUES ('2969', null, null, '1', '1', '7', null, '0');
INSERT INTO `akses` VALUES ('2970', null, null, '1', '1', '8', null, '0');
INSERT INTO `akses` VALUES ('2971', null, null, '1', '1', '9', null, '0');
INSERT INTO `akses` VALUES ('2972', null, null, '1', '0', '10', null, '0');
INSERT INTO `akses` VALUES ('2973', null, null, '1', '0', '11', null, '0');
INSERT INTO `akses` VALUES ('2974', null, null, '1', '0', '12', null, '0');
INSERT INTO `akses` VALUES ('2975', null, null, '1', '0', '13', null, '0');
INSERT INTO `akses` VALUES ('2976', null, null, '1', '0', '14', null, '0');
INSERT INTO `akses` VALUES ('2977', null, null, '1', '0', '15', null, '0');
INSERT INTO `akses` VALUES ('2978', null, null, '1', '0', '16', null, '0');
INSERT INTO `akses` VALUES ('2979', null, null, '1', '0', '17', null, '0');
INSERT INTO `akses` VALUES ('2980', null, null, '1', '1', '0', null, '1');
INSERT INTO `akses` VALUES ('2981', null, null, '1', '1', '1', null, '1');
INSERT INTO `akses` VALUES ('2982', null, null, '1', '1', '2', null, '1');
INSERT INTO `akses` VALUES ('2983', null, null, '1', '1', '3', null, '1');
INSERT INTO `akses` VALUES ('2984', null, null, '1', '1', '4', null, '1');
INSERT INTO `akses` VALUES ('2985', null, null, '1', '1', '5', null, '1');
INSERT INTO `akses` VALUES ('2986', null, null, '1', '1', '6', null, '1');
INSERT INTO `akses` VALUES ('2987', null, null, '1', '1', '7', null, '1');
INSERT INTO `akses` VALUES ('2988', null, null, '1', '1', '8', null, '1');
INSERT INTO `akses` VALUES ('2989', null, null, '1', '1', '9', null, '1');
INSERT INTO `akses` VALUES ('2990', null, null, '1', '1', '10', null, '1');
INSERT INTO `akses` VALUES ('2991', null, null, '1', '1', '11', null, '1');
INSERT INTO `akses` VALUES ('2992', null, null, '1', '1', '12', null, '1');
INSERT INTO `akses` VALUES ('2993', null, null, '1', '1', '13', null, '1');
INSERT INTO `akses` VALUES ('2994', null, null, '1', '1', '14', null, '1');
INSERT INTO `akses` VALUES ('2995', null, null, '1', '1', '15', null, '1');
INSERT INTO `akses` VALUES ('2996', null, null, '1', '1', '16', null, '1');
INSERT INTO `akses` VALUES ('2997', null, null, '1', '1', '17', null, '1');
INSERT INTO `akses` VALUES ('2998', null, null, '1', '1', '0', null, '2');
INSERT INTO `akses` VALUES ('2999', null, null, '1', '1', '1', null, '2');
INSERT INTO `akses` VALUES ('3000', null, null, '1', '1', '2', null, '2');
INSERT INTO `akses` VALUES ('3001', null, null, '1', '1', '3', null, '2');
INSERT INTO `akses` VALUES ('3002', null, null, '1', '1', '4', null, '2');
INSERT INTO `akses` VALUES ('3003', null, null, '1', '1', '5', null, '2');
INSERT INTO `akses` VALUES ('3004', null, null, '1', '0', '6', null, '2');
INSERT INTO `akses` VALUES ('3005', null, null, '1', '0', '7', null, '2');
INSERT INTO `akses` VALUES ('3006', null, null, '1', '0', '8', null, '2');
INSERT INTO `akses` VALUES ('3007', null, null, '1', '0', '9', null, '2');
INSERT INTO `akses` VALUES ('3008', null, null, '1', '0', '10', null, '2');
INSERT INTO `akses` VALUES ('3009', null, null, '1', '0', '11', null, '2');
INSERT INTO `akses` VALUES ('3010', null, null, '1', '0', '12', null, '2');
INSERT INTO `akses` VALUES ('3011', null, null, '1', '0', '13', null, '2');
INSERT INTO `akses` VALUES ('3012', null, null, '1', '0', '14', null, '2');
INSERT INTO `akses` VALUES ('3013', null, null, '1', '0', '15', null, '2');
INSERT INTO `akses` VALUES ('3014', null, null, '1', '0', '16', null, '2');
INSERT INTO `akses` VALUES ('3015', null, null, '1', '0', '17', null, '2');
INSERT INTO `akses` VALUES ('3016', null, null, '1', '0', '0', null, '3');
INSERT INTO `akses` VALUES ('3017', null, null, '1', '0', '1', null, '3');
INSERT INTO `akses` VALUES ('3018', null, null, '1', '0', '2', null, '3');
INSERT INTO `akses` VALUES ('3019', null, null, '1', '0', '3', null, '3');
INSERT INTO `akses` VALUES ('3020', null, null, '1', '0', '4', null, '3');
INSERT INTO `akses` VALUES ('3021', null, null, '1', '0', '5', null, '3');
INSERT INTO `akses` VALUES ('3022', null, null, '1', '0', '6', null, '3');
INSERT INTO `akses` VALUES ('3023', null, null, '1', '0', '7', null, '3');
INSERT INTO `akses` VALUES ('3024', null, null, '1', '0', '8', null, '3');
INSERT INTO `akses` VALUES ('3025', null, null, '1', '0', '9', null, '3');
INSERT INTO `akses` VALUES ('3026', null, null, '1', '0', '10', null, '3');
INSERT INTO `akses` VALUES ('3027', null, null, '1', '0', '11', null, '3');
INSERT INTO `akses` VALUES ('3028', null, null, '1', '0', '12', null, '3');
INSERT INTO `akses` VALUES ('3029', null, null, '1', '0', '13', null, '3');
INSERT INTO `akses` VALUES ('3030', null, null, '1', '0', '14', null, '3');
INSERT INTO `akses` VALUES ('3031', null, null, '1', '0', '15', null, '3');
INSERT INTO `akses` VALUES ('3032', null, null, '1', '0', '16', null, '3');
INSERT INTO `akses` VALUES ('3033', null, null, '1', '0', '17', null, '3');
INSERT INTO `akses` VALUES ('3034', null, null, '1', '0', '0', null, '4');
INSERT INTO `akses` VALUES ('3035', null, null, '1', '0', '1', null, '4');
INSERT INTO `akses` VALUES ('3036', null, null, '1', '0', '2', null, '4');
INSERT INTO `akses` VALUES ('3037', null, null, '1', '0', '3', null, '4');
INSERT INTO `akses` VALUES ('3038', null, null, '1', '0', '4', null, '4');
INSERT INTO `akses` VALUES ('3039', null, null, '1', '0', '5', null, '4');
INSERT INTO `akses` VALUES ('3040', null, null, '1', '0', '6', null, '4');
INSERT INTO `akses` VALUES ('3041', null, null, '1', '0', '7', null, '4');
INSERT INTO `akses` VALUES ('3042', null, null, '1', '0', '8', null, '4');
INSERT INTO `akses` VALUES ('3043', null, null, '1', '0', '9', null, '4');
INSERT INTO `akses` VALUES ('3044', null, null, '1', '0', '10', null, '4');
INSERT INTO `akses` VALUES ('3045', null, null, '1', '0', '11', null, '4');
INSERT INTO `akses` VALUES ('3046', null, null, '1', '0', '12', null, '4');
INSERT INTO `akses` VALUES ('3047', null, null, '1', '0', '13', null, '4');
INSERT INTO `akses` VALUES ('3048', null, null, '1', '0', '14', null, '4');
INSERT INTO `akses` VALUES ('3049', null, null, '1', '0', '15', null, '4');
INSERT INTO `akses` VALUES ('3050', null, null, '1', '0', '16', null, '4');
INSERT INTO `akses` VALUES ('3051', null, null, '1', '0', '17', null, '4');
INSERT INTO `akses` VALUES ('3052', null, null, '1', '0', '0', null, '5');
INSERT INTO `akses` VALUES ('3053', null, null, '1', '0', '1', null, '5');
INSERT INTO `akses` VALUES ('3054', null, null, '1', '0', '2', null, '5');
INSERT INTO `akses` VALUES ('3055', null, null, '1', '0', '3', null, '5');
INSERT INTO `akses` VALUES ('3056', null, null, '1', '0', '4', null, '5');
INSERT INTO `akses` VALUES ('3057', null, null, '1', '0', '5', null, '5');
INSERT INTO `akses` VALUES ('3058', null, null, '1', '0', '6', null, '5');
INSERT INTO `akses` VALUES ('3059', null, null, '1', '0', '7', null, '5');
INSERT INTO `akses` VALUES ('3060', null, null, '1', '0', '8', null, '5');
INSERT INTO `akses` VALUES ('3061', null, null, '1', '0', '9', null, '5');
INSERT INTO `akses` VALUES ('3062', null, null, '1', '0', '10', null, '5');
INSERT INTO `akses` VALUES ('3063', null, null, '1', '0', '11', null, '5');
INSERT INTO `akses` VALUES ('3064', null, null, '1', '0', '12', null, '5');
INSERT INTO `akses` VALUES ('3065', null, null, '1', '0', '13', null, '5');
INSERT INTO `akses` VALUES ('3066', null, null, '1', '0', '14', null, '5');
INSERT INTO `akses` VALUES ('3067', null, null, '1', '0', '15', null, '5');
INSERT INTO `akses` VALUES ('3068', null, null, '1', '0', '16', null, '5');
INSERT INTO `akses` VALUES ('3069', null, null, '1', '0', '17', null, '5');
INSERT INTO `akses` VALUES ('3070', null, null, '1', '0', '0', null, '6');
INSERT INTO `akses` VALUES ('3071', null, null, '1', '0', '1', null, '6');
INSERT INTO `akses` VALUES ('3072', null, null, '1', '0', '2', null, '6');
INSERT INTO `akses` VALUES ('3073', null, null, '1', '0', '3', null, '6');
INSERT INTO `akses` VALUES ('3074', null, null, '1', '0', '4', null, '6');
INSERT INTO `akses` VALUES ('3075', null, null, '1', '0', '5', null, '6');
INSERT INTO `akses` VALUES ('3076', null, null, '1', '0', '6', null, '6');
INSERT INTO `akses` VALUES ('3077', null, null, '1', '0', '7', null, '6');
INSERT INTO `akses` VALUES ('3078', null, null, '1', '0', '8', null, '6');
INSERT INTO `akses` VALUES ('3079', null, null, '1', '0', '9', null, '6');
INSERT INTO `akses` VALUES ('3080', null, null, '1', '0', '10', null, '6');
INSERT INTO `akses` VALUES ('3081', null, null, '1', '0', '11', null, '6');
INSERT INTO `akses` VALUES ('3082', null, null, '1', '0', '12', null, '6');
INSERT INTO `akses` VALUES ('3083', null, null, '1', '0', '13', null, '6');
INSERT INTO `akses` VALUES ('3084', null, null, '1', '0', '14', null, '6');
INSERT INTO `akses` VALUES ('3085', null, null, '1', '0', '15', null, '6');
INSERT INTO `akses` VALUES ('3086', null, null, '1', '0', '16', null, '6');
INSERT INTO `akses` VALUES ('3087', null, null, '1', '0', '17', null, '6');
INSERT INTO `akses` VALUES ('3088', null, null, '1', '0', '0', null, '7');
INSERT INTO `akses` VALUES ('3089', null, null, '1', '0', '1', null, '7');
INSERT INTO `akses` VALUES ('3090', null, null, '1', '0', '2', null, '7');
INSERT INTO `akses` VALUES ('3091', null, null, '1', '0', '3', null, '7');
INSERT INTO `akses` VALUES ('3092', null, null, '1', '0', '4', null, '7');
INSERT INTO `akses` VALUES ('3093', null, null, '1', '0', '5', null, '7');
INSERT INTO `akses` VALUES ('3094', null, null, '1', '0', '6', null, '7');
INSERT INTO `akses` VALUES ('3095', null, null, '1', '0', '7', null, '7');
INSERT INTO `akses` VALUES ('3096', null, null, '1', '0', '8', null, '7');
INSERT INTO `akses` VALUES ('3097', null, null, '1', '0', '9', null, '7');
INSERT INTO `akses` VALUES ('3098', null, null, '1', '0', '10', null, '7');
INSERT INTO `akses` VALUES ('3099', null, null, '1', '0', '11', null, '7');
INSERT INTO `akses` VALUES ('3100', null, null, '1', '0', '12', null, '7');
INSERT INTO `akses` VALUES ('3101', null, null, '1', '0', '13', null, '7');
INSERT INTO `akses` VALUES ('3102', null, null, '1', '0', '14', null, '7');
INSERT INTO `akses` VALUES ('3103', null, null, '1', '0', '15', null, '7');
INSERT INTO `akses` VALUES ('3104', null, null, '1', '0', '16', null, '7');
INSERT INTO `akses` VALUES ('3105', null, null, '1', '0', '17', null, '7');
INSERT INTO `bidang` VALUES ('239', '2013', '998', '10203', 'nama bidang 1', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('240', '2011', '966', '10203', 'nama bidang 2', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('241', '2009', '968', '10203', 'nama bidang 3', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('242', '2007', '948', '10203', 'nama bidang 4', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('243', '2005', '928', '10203', 'nama bidang 5', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('244', '2003', '948', '10203', 'nama bidang 6', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('245', '2001', '996', '10203', 'nama bidang 7', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `dpa` VALUES ('1', '1', '1', '1', '1', '1', '1', '0.00', '1', '1', '0.00000', '1', '1', '0.00000', '1', '0.00', '1', '1', '0.00', '0.00', '0.00', '0.00', '1', '0', null, null, null, null, '176');
INSERT INTO `eksports` VALUES ('2', '176', '27', '3', 'dpa_2015-10-06_176', 'http://localhost/integrasi/public/resultdb/download/dpa_2015-10-06_176', 'ok ', '2015-10-06', '2015-10-06');
INSERT INTO `files` VALUES ('182', '', 'phpAC7C.tmp.xls', 'application/vnd.ms-excel', 'rkpd.xls', null, 'rkpd', '3', '2015-10-06 14:11:13', '2015-10-06 14:11:13');
INSERT INTO `files` VALUES ('183', '', 'php54A3.tmp.xls', 'application/vnd.ms-excel', 'realisasi.xls', null, 'realisasi', '3', '2015-10-06 14:11:56', '2015-10-06 14:11:56');
INSERT INTO `files` VALUES ('185', '', 'phpF641.tmp.xls', 'application/vnd.ms-excel', 'urusan.xls', null, 'urusan', '3', '2015-10-06 14:42:07', '2015-10-06 14:42:07');
INSERT INTO `group_akses` VALUES ('2', '1', null);
INSERT INTO `group_akses` VALUES ('2', '2', null);
INSERT INTO `group_akses` VALUES ('2', '3', null);
INSERT INTO `group_akses` VALUES ('2', '4', null);
INSERT INTO `group_akses` VALUES ('2', '5', null);
INSERT INTO `group_akses` VALUES ('2', '6', null);
INSERT INTO `group_akses` VALUES ('2', '7', null);
INSERT INTO `group_akses` VALUES ('2', '8', null);
INSERT INTO `group_akses` VALUES ('2', '9', null);
INSERT INTO `group_akses` VALUES ('2', '10', null);
INSERT INTO `group_akses` VALUES ('2', '11', null);
INSERT INTO `group_akses` VALUES ('2', '12', null);
INSERT INTO `group_akses` VALUES ('1', '1', null);
INSERT INTO `group_akses` VALUES ('1', '2', null);
INSERT INTO `group_akses` VALUES ('1', '3', null);
INSERT INTO `group_akses` VALUES ('1', '4', null);
INSERT INTO `group_akses` VALUES ('1', '5', null);
INSERT INTO `group_akses` VALUES ('1', '6', null);
INSERT INTO `group_akses` VALUES ('1', '7', null);
INSERT INTO `group_akses` VALUES ('1', '8', null);
INSERT INTO `group_akses` VALUES ('1', '9', null);
INSERT INTO `group_akses` VALUES ('1', '10', null);
INSERT INTO `group_akses` VALUES ('1', '11', null);
INSERT INTO `group_akses` VALUES ('1', '12', null);
INSERT INTO `groups` VALUES ('1', 'Users', '{\"users\":1}', '2015-07-06 04:02:20', '2015-07-06 04:02:20');
INSERT INTO `groups` VALUES ('2', 'Super Admin', '{\"admin\":1,\"users\":1}', '2015-07-06 04:02:20', '2015-07-06 04:02:20');
INSERT INTO `groups` VALUES ('5', 'Group B', '{\"users\":1}', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `imports` VALUES ('23', '162', 'OK', '7', '1', '3', '2015-10-05', '2015-10-05');
INSERT INTO `imports` VALUES ('27', '176', 'OK', '1', '1', '3', '2015-10-06', '2015-10-06');
INSERT INTO `log` VALUES ('3', '3', '1', '4', 'urusan', null, 'excel.l.u', 'Gagal', '2015-10-08', '2015-10-08');
INSERT INTO `log` VALUES ('4', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-08', '2015-10-08');
INSERT INTO `log` VALUES ('5', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-08', '2015-10-08');
INSERT INTO `log` VALUES ('6', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-08', '2015-10-08');
INSERT INTO `log` VALUES ('7', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-08', '2015-10-08');
INSERT INTO `log` VALUES ('8', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-08', '2015-10-08');
INSERT INTO `log` VALUES ('9', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-09', '2015-10-09');
INSERT INTO `log` VALUES ('10', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-09', '2015-10-09');
INSERT INTO `log` VALUES ('11', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-09', '2015-10-09');
INSERT INTO `log` VALUES ('12', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('13', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('14', '3', '1', '11', 'bidang', null, 'resultdb.l.t', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('15', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('16', '3', '1', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('17', '3', '1', '11', 'bidang', null, 'resultdb.l.t', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('18', '3', '1', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('19', '3', '1', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('20', '3', '1', '11', 'bidang', null, 'resultdb.l.t', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('21', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('22', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('23', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('24', '3', '1', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('25', '3', '1', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('26', '3', '1', '4', 'kegiatan', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('27', '3', '1', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('28', '3', '1', '4', 'program', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('29', '3', '1', '11', 'realisasi', null, 'resultdb.l.t', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('30', '3', '1', '4', 'urusan', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('31', '3', '1', '4', 'program', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('32', '3', '1', '0', 'organisasi_skpd', null, 'log.l.g', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('33', '3', '1', '4', 'kegiatan', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('34', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('35', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('36', '3', '1', '11', 'organisasi_skpd', null, 'resultdb.l.t', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('37', '3', '1', '0', 'urusan', null, 'log.l.g', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('38', '3', '1', '4', 'realisasi', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('39', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('40', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('41', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('42', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('43', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('44', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('45', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('46', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('47', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('48', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('49', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('50', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('51', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('52', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('53', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('54', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('55', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('56', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('57', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('58', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('59', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('60', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('61', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('62', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('63', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('64', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('65', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('66', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('67', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('68', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('69', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('70', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('71', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('72', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('73', '3', '1', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('74', '3', '1', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('75', '3', '1', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('76', '3', '1', '2', 'bidang', null, 'excel.f.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('77', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('78', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('79', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('80', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('81', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('82', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('83', '3', '1', '3', 'bidang', null, 'excel.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('84', '3', '1', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-10-10', '2015-10-10');
INSERT INTO `log` VALUES ('85', '13', '1', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('86', '13', '1', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('87', '13', '1', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('88', '13', '1', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('89', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('90', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('91', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('92', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('93', '13', '5', '4', 'bidang', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('94', '13', '5', '11', 'bidang', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('95', '13', '5', '0', 'bidang', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('96', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('97', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('98', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('99', '13', '5', '11', 'kegiatan', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('100', '13', '5', '4', 'kegiatan', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('101', '13', '5', '4', 'kegiatan', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('102', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('103', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('104', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('105', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('106', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('107', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('108', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('109', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('110', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('111', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('112', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('113', '13', '5', '11', 'bidang', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('114', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('115', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('116', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('117', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('118', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('119', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('120', '13', '5', '11', 'kegiatan', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('121', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('122', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('123', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('124', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('125', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('126', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('127', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('128', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('129', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('130', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('131', '13', '5', '4', 'urusan', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('132', '13', '5', '0', 'rkpd', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('133', '13', '5', '0', 'realisasi', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('134', '13', '5', '4', 'realisasi', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('135', '13', '5', '4', 'urusan', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('136', '13', '5', '4', 'urusan', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('137', '13', '5', '11', 'urusan', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('138', '13', '5', '4', 'program', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('139', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('140', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('141', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('142', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('143', '13', '5', '11', 'kegiatan', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('144', '13', '5', '11', 'organisasi_skpd', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('145', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('146', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('147', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('148', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('149', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('150', '13', '5', '0', 'dpa', null, 'log.l.g', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('151', '13', '5', '4', 'kegiatan', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('152', '13', '5', '4', 'kegiatan', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('153', '13', '5', '11', 'dpa', null, 'resultdb.l.t', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('154', '13', '5', '4', 'dpa', null, 'excel.l.u', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('155', '13', '5', '17', 'kegiatan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('156', '13', '5', '17', 'kegiatan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('157', '13', '5', '17', 'rkpd', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('158', '13', '5', '17', 'kegiatan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('159', '13', '5', '17', 'urusan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('160', '13', '5', '17', 'urusan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('161', '13', '5', '17', 'urusan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('162', '13', '5', '17', 'urusan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('163', '13', '5', '17', 'program', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('164', '13', '5', '17', 'kegiatan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('165', '13', '5', '17', 'organisasi_skpd', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('166', '13', '5', '17', 'kegiatan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('167', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('168', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('169', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('170', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `log` VALUES ('171', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal', '2015-11-02', '2015-11-02');
INSERT INTO `migrations` VALUES ('2012_12_06_225921_migration_cartalyst_sentry_install_users', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225929_migration_cartalyst_sentry_install_groups', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_14_053439_migration_sentinel_add_username', '1');
INSERT INTO `migrations` VALUES ('2015_07_06_022646_create_fileentries_table', '2');
INSERT INTO `throttle` VALUES ('17', '2', '127.0.0.1', '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('18', '3', '::1', '2', '0', '0', '2015-10-30 16:07:03', null, null);
INSERT INTO `throttle` VALUES ('19', '6', null, '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('20', '7', null, '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('21', '8', null, '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('22', '9', null, '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('23', '10', null, '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('24', '11', null, '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('25', '12', null, '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('26', '13', null, '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('27', '14', null, '0', '0', '1', null, null, '2015-08-06 23:02:01');
INSERT INTO `throttle` VALUES ('28', '15', null, '0', '1', '0', null, '2015-08-07 11:48:14', null);
INSERT INTO `throttle` VALUES ('29', '2', '::1', '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('30', '3', '192.168.1.127', '5', '1', '0', '2015-10-23 10:01:08', '2015-10-23 10:01:08', null);
INSERT INTO `throttle` VALUES ('31', '2', '192.168.1.127', '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('32', '2', '192.168.1.50', '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('33', '3', '192.168.1.50', '0', '0', '0', '2015-11-02 14:57:57', null, null);
INSERT INTO `tree_menu` VALUES ('100', '0', 'Bidang', 'excel.l.u', 'bidang', 'bidang', null);
INSERT INTO `tree_menu` VALUES ('101', '100', 'Import', 'excel.l.u', null, 'bidang', null);
INSERT INTO `tree_menu` VALUES ('102', '100', 'Eksport', 'resultdb.l.t', null, 'bidang', null);
INSERT INTO `tree_menu` VALUES ('103', '100', 'Log action', 'log.l.g', '', 'bidang', null);
INSERT INTO `tree_menu` VALUES ('117', '111', 'Import', 'excel.l.u', '', 'bidang', null);
INSERT INTO `tree_menu` VALUES ('200', '0', 'dpa', 'excel.l.u', 'dpa', 'dpa', null);
INSERT INTO `tree_menu` VALUES ('201', '200', 'Import', 'excel.l.u', '', 'dpa', null);
INSERT INTO `tree_menu` VALUES ('202', '200', 'Eksport', 'resultdb.l.t', '', 'dpa', null);
INSERT INTO `tree_menu` VALUES ('203', '200', 'Log action', 'log.l.g', '', 'dpa', null);
INSERT INTO `tree_menu` VALUES ('300', '0', 'kegiatan', 'excel.l.u', 'kegiatan', 'kegiatan', null);
INSERT INTO `tree_menu` VALUES ('301', '300', 'Import', 'excel.l.u', '', 'kegiatan', null);
INSERT INTO `tree_menu` VALUES ('302', '300', 'Eksport', 'resultdb.l.t', '', 'kegiatan', null);
INSERT INTO `tree_menu` VALUES ('303', '300', 'Log action', 'log.l.g', '', 'kegiatan', null);
INSERT INTO `tree_menu` VALUES ('400', '0', 'organisasi_skpd', 'excel.l.u', 'organisasi_skpd', 'organisasi_skpd', null);
INSERT INTO `tree_menu` VALUES ('401', '400', 'Import', 'excel.l.u', '', 'organisasi_skpd', null);
INSERT INTO `tree_menu` VALUES ('403', '400', 'Eksport', 'resultdb.l.t', '', 'organisasi_skpd', null);
INSERT INTO `tree_menu` VALUES ('404', '400', 'Log action', 'log.l.g', '', 'organisasi_skpd', null);
INSERT INTO `tree_menu` VALUES ('500', '0', 'program', 'excel.l.u', 'program', 'program', null);
INSERT INTO `tree_menu` VALUES ('501', '500', 'Import', 'excel.l.u', '', 'program', null);
INSERT INTO `tree_menu` VALUES ('502', '500', 'Eksport', 'resultdb.l.t', '', 'program', null);
INSERT INTO `tree_menu` VALUES ('503', '500', 'Log action', 'log.l.g', '', 'program', null);
INSERT INTO `tree_menu` VALUES ('600', '0', 'realisasi', 'excel.l.u', 'realisasi', 'realisasi', null);
INSERT INTO `tree_menu` VALUES ('601', '600', 'Import', 'excel.l.u', '', 'realisasi', null);
INSERT INTO `tree_menu` VALUES ('602', '600', 'Eksport', 'resultdb.l.t', 'realisasi', 'realisasi', null);
INSERT INTO `tree_menu` VALUES ('603', '600', 'Log action', 'log.l.g', '', 'realisasi', null);
INSERT INTO `tree_menu` VALUES ('700', '0', 'rkpd', 'excel.l.u', 'rkpd', 'rkpd', null);
INSERT INTO `tree_menu` VALUES ('701', '700', 'Import', 'excel.l.u', '', 'rkpd', null);
INSERT INTO `tree_menu` VALUES ('702', '700', 'Log action', 'log.l.g', '', 'rkpd', null);
INSERT INTO `tree_menu` VALUES ('703', '700', 'Eksport', 'resultdb.l.t', '', 'rkpd', null);
INSERT INTO `tree_menu` VALUES ('800', '0', 'urusan', 'excel.l.u', 'urusan', 'urusan', null);
INSERT INTO `tree_menu` VALUES ('801', '800', 'Import', 'excel.l.u', '', 'urusan', null);
INSERT INTO `tree_menu` VALUES ('802', '800', 'Eksport', 'resultdb.l.t', '', 'urusan', null);
INSERT INTO `tree_menu` VALUES ('803', '800', 'Log action', 'log.l.g', '', 'urusan', null);
INSERT INTO `users` VALUES ('2', 'admin@admin.com', '$2y$10$qjChYycAUmd4wgsQzvZUIeCOnl5Z3vnbzi2wuDOY3rgBv3Q2z.UjS', null, '1', null, null, '2015-11-02 14:58:12', '$2y$10$XUzUnR4X.GqCzKOiQnikTOomP0eShVamhzNg0xK7vu9mmL8TKn5By', null, 'achmadi', 'achmadi', '2015-07-06 04:02:21', '2015-11-02 14:58:12', 'admin');
INSERT INTO `users` VALUES ('3', 'user@user.com', '$2y$10$GUTPgw9h7YC9qqKqzGpVVOc8jTkFI8gdlcSUUbk30QWnqovbcRJvK', null, '1', null, null, '2015-11-02 16:08:41', '$2y$10$Yzp2QsAySr/rLmec3g2lLeR6UuPahvU2lPxGtuQbMMERfapmmeRnS', null, null, null, '2015-07-06 04:02:21', '2015-11-02 16:08:41', '');
INSERT INTO `users` VALUES ('11', 'userxxx@gmail.com', '$2y$10$SAO0BxFa7GuLN2u8rt.bautV6brvsqqPlx175kVOgorlZhpY40Whi', null, '1', 'YczX1QqpEHrsDfaI3VduuiGOD8OVcJnuhp97Hdo5BF', '2015-08-05 12:55:10', null, null, null, null, null, '2015-08-05 12:55:10', '2015-08-05 12:55:10', 'userxxx');
INSERT INTO `users` VALUES ('12', 'userxxxvvvv@gmail.com', '$2y$10$dv65gUdgC0a3DSuvTbfm0OrUgsWNGGNMaeqp72e4LwV53VUTSq8rK', null, '1', 'PwtF08ArVdmI39poI91lddBplZeS6DYkFfZuMDTHuJ', '2015-08-05 12:57:28', null, null, null, 'profil empat', 'nama empat', '2015-08-05 12:57:28', '2015-10-20 08:08:52', 'userxxxvvvv');
INSERT INTO `users` VALUES ('13', 'groupa@gmail.com', '$2y$10$a.cQG7CjYvtA5pDwKJoV5.ck5m3YyazE1LE9ULE1k47iM6Mdt/FiC', null, '1', 'mVZ4UO8TcgusAZ7IyTGac0EeGjA6kcR0BxYNNWNmaj', '2015-11-02 15:00:38', '2015-11-02 15:04:20', '$2y$10$5kbnXqu1tbptNo4ps5im3eNR0fUwj1mnEiBGcQpYbziZq5AeI9W4C', null, null, null, '2015-11-02 15:00:38', '2015-11-02 15:04:20', 'groupa');
INSERT INTO `users_groups` VALUES ('2', '1');
INSERT INTO `users_groups` VALUES ('2', '2');
INSERT INTO `users_groups` VALUES ('3', '1');
INSERT INTO `users_groups` VALUES ('6', '1');
INSERT INTO `users_groups` VALUES ('6', '3');
INSERT INTO `users_groups` VALUES ('11', '5');
INSERT INTO `users_groups` VALUES ('12', '1');
INSERT INTO `users_groups` VALUES ('13', '5');
