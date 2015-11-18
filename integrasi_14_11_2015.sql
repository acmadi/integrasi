/*
MySQL Data Transfer
Source Host: localhost
Source Database: integrasi
Target Host: localhost
Target Database: integrasi
Date: 14/11/2015 15:08:46
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
) ENGINE=InnoDB AUTO_INCREMENT=5154 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `nama_singkat_instansi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_instansi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=370 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `akses` VALUES ('4722', null, null, '6', '1', '0', null, '0');
INSERT INTO `akses` VALUES ('4723', null, null, '6', '1', '1', null, '0');
INSERT INTO `akses` VALUES ('4724', null, null, '6', '0', '2', null, '0');
INSERT INTO `akses` VALUES ('4725', null, null, '6', '0', '3', null, '0');
INSERT INTO `akses` VALUES ('4726', null, null, '6', '0', '4', null, '0');
INSERT INTO `akses` VALUES ('4727', null, null, '6', '0', '5', null, '0');
INSERT INTO `akses` VALUES ('4728', null, null, '6', '0', '6', null, '0');
INSERT INTO `akses` VALUES ('4729', null, null, '6', '1', '7', null, '0');
INSERT INTO `akses` VALUES ('4730', null, null, '6', '1', '8', null, '0');
INSERT INTO `akses` VALUES ('4731', null, null, '6', '1', '9', null, '0');
INSERT INTO `akses` VALUES ('4732', null, null, '6', '1', '10', null, '0');
INSERT INTO `akses` VALUES ('4733', null, null, '6', '1', '11', null, '0');
INSERT INTO `akses` VALUES ('4734', null, null, '6', '1', '12', null, '0');
INSERT INTO `akses` VALUES ('4735', null, null, '6', '1', '13', null, '0');
INSERT INTO `akses` VALUES ('4736', null, null, '6', '1', '14', null, '0');
INSERT INTO `akses` VALUES ('4737', null, null, '6', '1', '15', null, '0');
INSERT INTO `akses` VALUES ('4738', null, null, '6', '1', '16', null, '0');
INSERT INTO `akses` VALUES ('4739', null, null, '6', '1', '17', null, '0');
INSERT INTO `akses` VALUES ('4740', null, null, '6', '1', '0', null, '1');
INSERT INTO `akses` VALUES ('4741', null, null, '6', '1', '1', null, '1');
INSERT INTO `akses` VALUES ('4742', null, null, '6', '1', '2', null, '1');
INSERT INTO `akses` VALUES ('4743', null, null, '6', '1', '3', null, '1');
INSERT INTO `akses` VALUES ('4744', null, null, '6', '1', '4', null, '1');
INSERT INTO `akses` VALUES ('4745', null, null, '6', '1', '5', null, '1');
INSERT INTO `akses` VALUES ('4746', null, null, '6', '1', '6', null, '1');
INSERT INTO `akses` VALUES ('4747', null, null, '6', '0', '7', null, '1');
INSERT INTO `akses` VALUES ('4748', null, null, '6', '0', '8', null, '1');
INSERT INTO `akses` VALUES ('4749', null, null, '6', '0', '9', null, '1');
INSERT INTO `akses` VALUES ('4750', null, null, '6', '0', '10', null, '1');
INSERT INTO `akses` VALUES ('4751', null, null, '6', '0', '11', null, '1');
INSERT INTO `akses` VALUES ('4752', null, null, '6', '0', '12', null, '1');
INSERT INTO `akses` VALUES ('4753', null, null, '6', '0', '13', null, '1');
INSERT INTO `akses` VALUES ('4754', null, null, '6', '0', '14', null, '1');
INSERT INTO `akses` VALUES ('4755', null, null, '6', '0', '15', null, '1');
INSERT INTO `akses` VALUES ('4756', null, null, '6', '0', '16', null, '1');
INSERT INTO `akses` VALUES ('4757', null, null, '6', '0', '17', null, '1');
INSERT INTO `akses` VALUES ('4758', null, null, '6', '0', '0', null, '2');
INSERT INTO `akses` VALUES ('4759', null, null, '6', '0', '1', null, '2');
INSERT INTO `akses` VALUES ('4760', null, null, '6', '0', '2', null, '2');
INSERT INTO `akses` VALUES ('4761', null, null, '6', '0', '3', null, '2');
INSERT INTO `akses` VALUES ('4762', null, null, '6', '0', '4', null, '2');
INSERT INTO `akses` VALUES ('4763', null, null, '6', '0', '5', null, '2');
INSERT INTO `akses` VALUES ('4764', null, null, '6', '0', '6', null, '2');
INSERT INTO `akses` VALUES ('4765', null, null, '6', '0', '7', null, '2');
INSERT INTO `akses` VALUES ('4766', null, null, '6', '0', '8', null, '2');
INSERT INTO `akses` VALUES ('4767', null, null, '6', '0', '9', null, '2');
INSERT INTO `akses` VALUES ('4768', null, null, '6', '0', '10', null, '2');
INSERT INTO `akses` VALUES ('4769', null, null, '6', '0', '11', null, '2');
INSERT INTO `akses` VALUES ('4770', null, null, '6', '0', '12', null, '2');
INSERT INTO `akses` VALUES ('4771', null, null, '6', '0', '13', null, '2');
INSERT INTO `akses` VALUES ('4772', null, null, '6', '0', '14', null, '2');
INSERT INTO `akses` VALUES ('4773', null, null, '6', '0', '15', null, '2');
INSERT INTO `akses` VALUES ('4774', null, null, '6', '0', '16', null, '2');
INSERT INTO `akses` VALUES ('4775', null, null, '6', '0', '17', null, '2');
INSERT INTO `akses` VALUES ('4776', null, null, '6', '0', '0', null, '3');
INSERT INTO `akses` VALUES ('4777', null, null, '6', '0', '1', null, '3');
INSERT INTO `akses` VALUES ('4778', null, null, '6', '0', '2', null, '3');
INSERT INTO `akses` VALUES ('4779', null, null, '6', '0', '3', null, '3');
INSERT INTO `akses` VALUES ('4780', null, null, '6', '0', '4', null, '3');
INSERT INTO `akses` VALUES ('4781', null, null, '6', '0', '5', null, '3');
INSERT INTO `akses` VALUES ('4782', null, null, '6', '0', '6', null, '3');
INSERT INTO `akses` VALUES ('4783', null, null, '6', '0', '7', null, '3');
INSERT INTO `akses` VALUES ('4784', null, null, '6', '0', '8', null, '3');
INSERT INTO `akses` VALUES ('4785', null, null, '6', '0', '9', null, '3');
INSERT INTO `akses` VALUES ('4786', null, null, '6', '0', '10', null, '3');
INSERT INTO `akses` VALUES ('4787', null, null, '6', '0', '11', null, '3');
INSERT INTO `akses` VALUES ('4788', null, null, '6', '0', '12', null, '3');
INSERT INTO `akses` VALUES ('4789', null, null, '6', '0', '13', null, '3');
INSERT INTO `akses` VALUES ('4790', null, null, '6', '0', '14', null, '3');
INSERT INTO `akses` VALUES ('4791', null, null, '6', '0', '15', null, '3');
INSERT INTO `akses` VALUES ('4792', null, null, '6', '0', '16', null, '3');
INSERT INTO `akses` VALUES ('4793', null, null, '6', '0', '17', null, '3');
INSERT INTO `akses` VALUES ('4794', null, null, '6', '0', '0', null, '4');
INSERT INTO `akses` VALUES ('4795', null, null, '6', '0', '1', null, '4');
INSERT INTO `akses` VALUES ('4796', null, null, '6', '0', '2', null, '4');
INSERT INTO `akses` VALUES ('4797', null, null, '6', '0', '3', null, '4');
INSERT INTO `akses` VALUES ('4798', null, null, '6', '0', '4', null, '4');
INSERT INTO `akses` VALUES ('4799', null, null, '6', '0', '5', null, '4');
INSERT INTO `akses` VALUES ('4800', null, null, '6', '0', '6', null, '4');
INSERT INTO `akses` VALUES ('4801', null, null, '6', '0', '7', null, '4');
INSERT INTO `akses` VALUES ('4802', null, null, '6', '0', '8', null, '4');
INSERT INTO `akses` VALUES ('4803', null, null, '6', '0', '9', null, '4');
INSERT INTO `akses` VALUES ('4804', null, null, '6', '0', '10', null, '4');
INSERT INTO `akses` VALUES ('4805', null, null, '6', '0', '11', null, '4');
INSERT INTO `akses` VALUES ('4806', null, null, '6', '0', '12', null, '4');
INSERT INTO `akses` VALUES ('4807', null, null, '6', '0', '13', null, '4');
INSERT INTO `akses` VALUES ('4808', null, null, '6', '0', '14', null, '4');
INSERT INTO `akses` VALUES ('4809', null, null, '6', '0', '15', null, '4');
INSERT INTO `akses` VALUES ('4810', null, null, '6', '0', '16', null, '4');
INSERT INTO `akses` VALUES ('4811', null, null, '6', '0', '17', null, '4');
INSERT INTO `akses` VALUES ('4812', null, null, '6', '0', '0', null, '5');
INSERT INTO `akses` VALUES ('4813', null, null, '6', '0', '1', null, '5');
INSERT INTO `akses` VALUES ('4814', null, null, '6', '0', '2', null, '5');
INSERT INTO `akses` VALUES ('4815', null, null, '6', '0', '3', null, '5');
INSERT INTO `akses` VALUES ('4816', null, null, '6', '0', '4', null, '5');
INSERT INTO `akses` VALUES ('4817', null, null, '6', '0', '5', null, '5');
INSERT INTO `akses` VALUES ('4818', null, null, '6', '0', '6', null, '5');
INSERT INTO `akses` VALUES ('4819', null, null, '6', '0', '7', null, '5');
INSERT INTO `akses` VALUES ('4820', null, null, '6', '0', '8', null, '5');
INSERT INTO `akses` VALUES ('4821', null, null, '6', '0', '9', null, '5');
INSERT INTO `akses` VALUES ('4822', null, null, '6', '0', '10', null, '5');
INSERT INTO `akses` VALUES ('4823', null, null, '6', '0', '11', null, '5');
INSERT INTO `akses` VALUES ('4824', null, null, '6', '0', '12', null, '5');
INSERT INTO `akses` VALUES ('4825', null, null, '6', '0', '13', null, '5');
INSERT INTO `akses` VALUES ('4826', null, null, '6', '0', '14', null, '5');
INSERT INTO `akses` VALUES ('4827', null, null, '6', '0', '15', null, '5');
INSERT INTO `akses` VALUES ('4828', null, null, '6', '0', '16', null, '5');
INSERT INTO `akses` VALUES ('4829', null, null, '6', '0', '17', null, '5');
INSERT INTO `akses` VALUES ('4830', null, null, '6', '0', '0', null, '6');
INSERT INTO `akses` VALUES ('4831', null, null, '6', '0', '1', null, '6');
INSERT INTO `akses` VALUES ('4832', null, null, '6', '0', '2', null, '6');
INSERT INTO `akses` VALUES ('4833', null, null, '6', '0', '3', null, '6');
INSERT INTO `akses` VALUES ('4834', null, null, '6', '0', '4', null, '6');
INSERT INTO `akses` VALUES ('4835', null, null, '6', '0', '5', null, '6');
INSERT INTO `akses` VALUES ('4836', null, null, '6', '0', '6', null, '6');
INSERT INTO `akses` VALUES ('4837', null, null, '6', '0', '7', null, '6');
INSERT INTO `akses` VALUES ('4838', null, null, '6', '0', '8', null, '6');
INSERT INTO `akses` VALUES ('4839', null, null, '6', '0', '9', null, '6');
INSERT INTO `akses` VALUES ('4840', null, null, '6', '0', '10', null, '6');
INSERT INTO `akses` VALUES ('4841', null, null, '6', '0', '11', null, '6');
INSERT INTO `akses` VALUES ('4842', null, null, '6', '0', '12', null, '6');
INSERT INTO `akses` VALUES ('4843', null, null, '6', '0', '13', null, '6');
INSERT INTO `akses` VALUES ('4844', null, null, '6', '0', '14', null, '6');
INSERT INTO `akses` VALUES ('4845', null, null, '6', '0', '15', null, '6');
INSERT INTO `akses` VALUES ('4846', null, null, '6', '0', '16', null, '6');
INSERT INTO `akses` VALUES ('4847', null, null, '6', '0', '17', null, '6');
INSERT INTO `akses` VALUES ('4848', null, null, '6', '0', '0', null, '7');
INSERT INTO `akses` VALUES ('4849', null, null, '6', '0', '1', null, '7');
INSERT INTO `akses` VALUES ('4850', null, null, '6', '0', '2', null, '7');
INSERT INTO `akses` VALUES ('4851', null, null, '6', '0', '3', null, '7');
INSERT INTO `akses` VALUES ('4852', null, null, '6', '0', '4', null, '7');
INSERT INTO `akses` VALUES ('4853', null, null, '6', '0', '5', null, '7');
INSERT INTO `akses` VALUES ('4854', null, null, '6', '0', '6', null, '7');
INSERT INTO `akses` VALUES ('4855', null, null, '6', '0', '7', null, '7');
INSERT INTO `akses` VALUES ('4856', null, null, '6', '0', '8', null, '7');
INSERT INTO `akses` VALUES ('4857', null, null, '6', '0', '9', null, '7');
INSERT INTO `akses` VALUES ('4858', null, null, '6', '0', '10', null, '7');
INSERT INTO `akses` VALUES ('4859', null, null, '6', '0', '11', null, '7');
INSERT INTO `akses` VALUES ('4860', null, null, '6', '0', '12', null, '7');
INSERT INTO `akses` VALUES ('4861', null, null, '6', '0', '13', null, '7');
INSERT INTO `akses` VALUES ('4862', null, null, '6', '0', '14', null, '7');
INSERT INTO `akses` VALUES ('4863', null, null, '6', '0', '15', null, '7');
INSERT INTO `akses` VALUES ('4864', null, null, '6', '0', '16', null, '7');
INSERT INTO `akses` VALUES ('4865', null, null, '6', '0', '17', null, '7');
INSERT INTO `akses` VALUES ('4866', null, null, '1', '1', '0', null, '0');
INSERT INTO `akses` VALUES ('4867', null, null, '1', '1', '1', null, '0');
INSERT INTO `akses` VALUES ('4868', null, null, '1', '1', '2', null, '0');
INSERT INTO `akses` VALUES ('4869', null, null, '1', '1', '3', null, '0');
INSERT INTO `akses` VALUES ('4870', null, null, '1', '1', '4', null, '0');
INSERT INTO `akses` VALUES ('4871', null, null, '1', '1', '5', null, '0');
INSERT INTO `akses` VALUES ('4872', null, null, '1', '1', '6', null, '0');
INSERT INTO `akses` VALUES ('4873', null, null, '1', '0', '7', null, '0');
INSERT INTO `akses` VALUES ('4874', null, null, '1', '0', '8', null, '0');
INSERT INTO `akses` VALUES ('4875', null, null, '1', '0', '9', null, '0');
INSERT INTO `akses` VALUES ('4876', null, null, '1', '0', '10', null, '0');
INSERT INTO `akses` VALUES ('4877', null, null, '1', '0', '11', null, '0');
INSERT INTO `akses` VALUES ('4878', null, null, '1', '0', '12', null, '0');
INSERT INTO `akses` VALUES ('4879', null, null, '1', '0', '13', null, '0');
INSERT INTO `akses` VALUES ('4880', null, null, '1', '0', '14', null, '0');
INSERT INTO `akses` VALUES ('4881', null, null, '1', '0', '15', null, '0');
INSERT INTO `akses` VALUES ('4882', null, null, '1', '0', '16', null, '0');
INSERT INTO `akses` VALUES ('4883', null, null, '1', '0', '17', null, '0');
INSERT INTO `akses` VALUES ('4884', null, null, '1', '1', '0', null, '1');
INSERT INTO `akses` VALUES ('4885', null, null, '1', '1', '1', null, '1');
INSERT INTO `akses` VALUES ('4886', null, null, '1', '0', '2', null, '1');
INSERT INTO `akses` VALUES ('4887', null, null, '1', '0', '3', null, '1');
INSERT INTO `akses` VALUES ('4888', null, null, '1', '0', '4', null, '1');
INSERT INTO `akses` VALUES ('4889', null, null, '1', '0', '5', null, '1');
INSERT INTO `akses` VALUES ('4890', null, null, '1', '0', '6', null, '1');
INSERT INTO `akses` VALUES ('4891', null, null, '1', '1', '7', null, '1');
INSERT INTO `akses` VALUES ('4892', null, null, '1', '1', '8', null, '1');
INSERT INTO `akses` VALUES ('4893', null, null, '1', '1', '9', null, '1');
INSERT INTO `akses` VALUES ('4894', null, null, '1', '1', '10', null, '1');
INSERT INTO `akses` VALUES ('4895', null, null, '1', '1', '11', null, '1');
INSERT INTO `akses` VALUES ('4896', null, null, '1', '1', '12', null, '1');
INSERT INTO `akses` VALUES ('4897', null, null, '1', '1', '13', null, '1');
INSERT INTO `akses` VALUES ('4898', null, null, '1', '1', '14', null, '1');
INSERT INTO `akses` VALUES ('4899', null, null, '1', '1', '15', null, '1');
INSERT INTO `akses` VALUES ('4900', null, null, '1', '1', '16', null, '1');
INSERT INTO `akses` VALUES ('4901', null, null, '1', '1', '17', null, '1');
INSERT INTO `akses` VALUES ('4902', null, null, '1', '0', '0', null, '2');
INSERT INTO `akses` VALUES ('4903', null, null, '1', '0', '1', null, '2');
INSERT INTO `akses` VALUES ('4904', null, null, '1', '0', '2', null, '2');
INSERT INTO `akses` VALUES ('4905', null, null, '1', '0', '3', null, '2');
INSERT INTO `akses` VALUES ('4906', null, null, '1', '0', '4', null, '2');
INSERT INTO `akses` VALUES ('4907', null, null, '1', '0', '5', null, '2');
INSERT INTO `akses` VALUES ('4908', null, null, '1', '0', '6', null, '2');
INSERT INTO `akses` VALUES ('4909', null, null, '1', '0', '7', null, '2');
INSERT INTO `akses` VALUES ('4910', null, null, '1', '0', '8', null, '2');
INSERT INTO `akses` VALUES ('4911', null, null, '1', '0', '9', null, '2');
INSERT INTO `akses` VALUES ('4912', null, null, '1', '0', '10', null, '2');
INSERT INTO `akses` VALUES ('4913', null, null, '1', '0', '11', null, '2');
INSERT INTO `akses` VALUES ('4914', null, null, '1', '0', '12', null, '2');
INSERT INTO `akses` VALUES ('4915', null, null, '1', '0', '13', null, '2');
INSERT INTO `akses` VALUES ('4916', null, null, '1', '0', '14', null, '2');
INSERT INTO `akses` VALUES ('4917', null, null, '1', '0', '15', null, '2');
INSERT INTO `akses` VALUES ('4918', null, null, '1', '0', '16', null, '2');
INSERT INTO `akses` VALUES ('4919', null, null, '1', '0', '17', null, '2');
INSERT INTO `akses` VALUES ('4920', null, null, '1', '0', '0', null, '3');
INSERT INTO `akses` VALUES ('4921', null, null, '1', '0', '1', null, '3');
INSERT INTO `akses` VALUES ('4922', null, null, '1', '0', '2', null, '3');
INSERT INTO `akses` VALUES ('4923', null, null, '1', '0', '3', null, '3');
INSERT INTO `akses` VALUES ('4924', null, null, '1', '0', '4', null, '3');
INSERT INTO `akses` VALUES ('4925', null, null, '1', '0', '5', null, '3');
INSERT INTO `akses` VALUES ('4926', null, null, '1', '0', '6', null, '3');
INSERT INTO `akses` VALUES ('4927', null, null, '1', '0', '7', null, '3');
INSERT INTO `akses` VALUES ('4928', null, null, '1', '0', '8', null, '3');
INSERT INTO `akses` VALUES ('4929', null, null, '1', '0', '9', null, '3');
INSERT INTO `akses` VALUES ('4930', null, null, '1', '0', '10', null, '3');
INSERT INTO `akses` VALUES ('4931', null, null, '1', '0', '11', null, '3');
INSERT INTO `akses` VALUES ('4932', null, null, '1', '0', '12', null, '3');
INSERT INTO `akses` VALUES ('4933', null, null, '1', '0', '13', null, '3');
INSERT INTO `akses` VALUES ('4934', null, null, '1', '0', '14', null, '3');
INSERT INTO `akses` VALUES ('4935', null, null, '1', '0', '15', null, '3');
INSERT INTO `akses` VALUES ('4936', null, null, '1', '0', '16', null, '3');
INSERT INTO `akses` VALUES ('4937', null, null, '1', '0', '17', null, '3');
INSERT INTO `akses` VALUES ('4938', null, null, '1', '0', '0', null, '4');
INSERT INTO `akses` VALUES ('4939', null, null, '1', '0', '1', null, '4');
INSERT INTO `akses` VALUES ('4940', null, null, '1', '0', '2', null, '4');
INSERT INTO `akses` VALUES ('4941', null, null, '1', '0', '3', null, '4');
INSERT INTO `akses` VALUES ('4942', null, null, '1', '0', '4', null, '4');
INSERT INTO `akses` VALUES ('4943', null, null, '1', '0', '5', null, '4');
INSERT INTO `akses` VALUES ('4944', null, null, '1', '0', '6', null, '4');
INSERT INTO `akses` VALUES ('4945', null, null, '1', '0', '7', null, '4');
INSERT INTO `akses` VALUES ('4946', null, null, '1', '0', '8', null, '4');
INSERT INTO `akses` VALUES ('4947', null, null, '1', '0', '9', null, '4');
INSERT INTO `akses` VALUES ('4948', null, null, '1', '0', '10', null, '4');
INSERT INTO `akses` VALUES ('4949', null, null, '1', '0', '11', null, '4');
INSERT INTO `akses` VALUES ('4950', null, null, '1', '0', '12', null, '4');
INSERT INTO `akses` VALUES ('4951', null, null, '1', '0', '13', null, '4');
INSERT INTO `akses` VALUES ('4952', null, null, '1', '0', '14', null, '4');
INSERT INTO `akses` VALUES ('4953', null, null, '1', '0', '15', null, '4');
INSERT INTO `akses` VALUES ('4954', null, null, '1', '0', '16', null, '4');
INSERT INTO `akses` VALUES ('4955', null, null, '1', '0', '17', null, '4');
INSERT INTO `akses` VALUES ('4956', null, null, '1', '0', '0', null, '5');
INSERT INTO `akses` VALUES ('4957', null, null, '1', '0', '1', null, '5');
INSERT INTO `akses` VALUES ('4958', null, null, '1', '0', '2', null, '5');
INSERT INTO `akses` VALUES ('4959', null, null, '1', '0', '3', null, '5');
INSERT INTO `akses` VALUES ('4960', null, null, '1', '0', '4', null, '5');
INSERT INTO `akses` VALUES ('4961', null, null, '1', '0', '5', null, '5');
INSERT INTO `akses` VALUES ('4962', null, null, '1', '0', '6', null, '5');
INSERT INTO `akses` VALUES ('4963', null, null, '1', '0', '7', null, '5');
INSERT INTO `akses` VALUES ('4964', null, null, '1', '0', '8', null, '5');
INSERT INTO `akses` VALUES ('4965', null, null, '1', '0', '9', null, '5');
INSERT INTO `akses` VALUES ('4966', null, null, '1', '0', '10', null, '5');
INSERT INTO `akses` VALUES ('4967', null, null, '1', '0', '11', null, '5');
INSERT INTO `akses` VALUES ('4968', null, null, '1', '0', '12', null, '5');
INSERT INTO `akses` VALUES ('4969', null, null, '1', '0', '13', null, '5');
INSERT INTO `akses` VALUES ('4970', null, null, '1', '0', '14', null, '5');
INSERT INTO `akses` VALUES ('4971', null, null, '1', '0', '15', null, '5');
INSERT INTO `akses` VALUES ('4972', null, null, '1', '0', '16', null, '5');
INSERT INTO `akses` VALUES ('4973', null, null, '1', '0', '17', null, '5');
INSERT INTO `akses` VALUES ('4974', null, null, '1', '0', '0', null, '6');
INSERT INTO `akses` VALUES ('4975', null, null, '1', '0', '1', null, '6');
INSERT INTO `akses` VALUES ('4976', null, null, '1', '0', '2', null, '6');
INSERT INTO `akses` VALUES ('4977', null, null, '1', '0', '3', null, '6');
INSERT INTO `akses` VALUES ('4978', null, null, '1', '0', '4', null, '6');
INSERT INTO `akses` VALUES ('4979', null, null, '1', '0', '5', null, '6');
INSERT INTO `akses` VALUES ('4980', null, null, '1', '0', '6', null, '6');
INSERT INTO `akses` VALUES ('4981', null, null, '1', '0', '7', null, '6');
INSERT INTO `akses` VALUES ('4982', null, null, '1', '0', '8', null, '6');
INSERT INTO `akses` VALUES ('4983', null, null, '1', '0', '9', null, '6');
INSERT INTO `akses` VALUES ('4984', null, null, '1', '0', '10', null, '6');
INSERT INTO `akses` VALUES ('4985', null, null, '1', '0', '11', null, '6');
INSERT INTO `akses` VALUES ('4986', null, null, '1', '0', '12', null, '6');
INSERT INTO `akses` VALUES ('4987', null, null, '1', '0', '13', null, '6');
INSERT INTO `akses` VALUES ('4988', null, null, '1', '0', '14', null, '6');
INSERT INTO `akses` VALUES ('4989', null, null, '1', '0', '15', null, '6');
INSERT INTO `akses` VALUES ('4990', null, null, '1', '0', '16', null, '6');
INSERT INTO `akses` VALUES ('4991', null, null, '1', '0', '17', null, '6');
INSERT INTO `akses` VALUES ('4992', null, null, '1', '0', '0', null, '7');
INSERT INTO `akses` VALUES ('4993', null, null, '1', '0', '1', null, '7');
INSERT INTO `akses` VALUES ('4994', null, null, '1', '0', '2', null, '7');
INSERT INTO `akses` VALUES ('4995', null, null, '1', '0', '3', null, '7');
INSERT INTO `akses` VALUES ('4996', null, null, '1', '0', '4', null, '7');
INSERT INTO `akses` VALUES ('4997', null, null, '1', '0', '5', null, '7');
INSERT INTO `akses` VALUES ('4998', null, null, '1', '0', '6', null, '7');
INSERT INTO `akses` VALUES ('4999', null, null, '1', '0', '7', null, '7');
INSERT INTO `akses` VALUES ('5000', null, null, '1', '0', '8', null, '7');
INSERT INTO `akses` VALUES ('5001', null, null, '1', '0', '9', null, '7');
INSERT INTO `akses` VALUES ('5002', null, null, '1', '0', '10', null, '7');
INSERT INTO `akses` VALUES ('5003', null, null, '1', '0', '11', null, '7');
INSERT INTO `akses` VALUES ('5004', null, null, '1', '0', '12', null, '7');
INSERT INTO `akses` VALUES ('5005', null, null, '1', '0', '13', null, '7');
INSERT INTO `akses` VALUES ('5006', null, null, '1', '0', '14', null, '7');
INSERT INTO `akses` VALUES ('5007', null, null, '1', '0', '15', null, '7');
INSERT INTO `akses` VALUES ('5008', null, null, '1', '0', '16', null, '7');
INSERT INTO `akses` VALUES ('5009', null, null, '1', '0', '17', null, '7');
INSERT INTO `akses` VALUES ('5010', null, null, '5', '0', '0', null, '0');
INSERT INTO `akses` VALUES ('5011', null, null, '5', '0', '1', null, '0');
INSERT INTO `akses` VALUES ('5012', null, null, '5', '0', '2', null, '0');
INSERT INTO `akses` VALUES ('5013', null, null, '5', '0', '3', null, '0');
INSERT INTO `akses` VALUES ('5014', null, null, '5', '0', '4', null, '0');
INSERT INTO `akses` VALUES ('5015', null, null, '5', '0', '5', null, '0');
INSERT INTO `akses` VALUES ('5016', null, null, '5', '0', '6', null, '0');
INSERT INTO `akses` VALUES ('5017', null, null, '5', '0', '7', null, '0');
INSERT INTO `akses` VALUES ('5018', null, null, '5', '0', '8', null, '0');
INSERT INTO `akses` VALUES ('5019', null, null, '5', '0', '9', null, '0');
INSERT INTO `akses` VALUES ('5020', null, null, '5', '0', '10', null, '0');
INSERT INTO `akses` VALUES ('5021', null, null, '5', '0', '11', null, '0');
INSERT INTO `akses` VALUES ('5022', null, null, '5', '0', '12', null, '0');
INSERT INTO `akses` VALUES ('5023', null, null, '5', '0', '13', null, '0');
INSERT INTO `akses` VALUES ('5024', null, null, '5', '0', '14', null, '0');
INSERT INTO `akses` VALUES ('5025', null, null, '5', '0', '15', null, '0');
INSERT INTO `akses` VALUES ('5026', null, null, '5', '0', '16', null, '0');
INSERT INTO `akses` VALUES ('5027', null, null, '5', '0', '17', null, '0');
INSERT INTO `akses` VALUES ('5028', null, null, '5', '0', '0', null, '1');
INSERT INTO `akses` VALUES ('5029', null, null, '5', '0', '1', null, '1');
INSERT INTO `akses` VALUES ('5030', null, null, '5', '0', '2', null, '1');
INSERT INTO `akses` VALUES ('5031', null, null, '5', '0', '3', null, '1');
INSERT INTO `akses` VALUES ('5032', null, null, '5', '0', '4', null, '1');
INSERT INTO `akses` VALUES ('5033', null, null, '5', '0', '5', null, '1');
INSERT INTO `akses` VALUES ('5034', null, null, '5', '0', '6', null, '1');
INSERT INTO `akses` VALUES ('5035', null, null, '5', '0', '7', null, '1');
INSERT INTO `akses` VALUES ('5036', null, null, '5', '0', '8', null, '1');
INSERT INTO `akses` VALUES ('5037', null, null, '5', '0', '9', null, '1');
INSERT INTO `akses` VALUES ('5038', null, null, '5', '0', '10', null, '1');
INSERT INTO `akses` VALUES ('5039', null, null, '5', '0', '11', null, '1');
INSERT INTO `akses` VALUES ('5040', null, null, '5', '0', '12', null, '1');
INSERT INTO `akses` VALUES ('5041', null, null, '5', '0', '13', null, '1');
INSERT INTO `akses` VALUES ('5042', null, null, '5', '0', '14', null, '1');
INSERT INTO `akses` VALUES ('5043', null, null, '5', '0', '15', null, '1');
INSERT INTO `akses` VALUES ('5044', null, null, '5', '0', '16', null, '1');
INSERT INTO `akses` VALUES ('5045', null, null, '5', '0', '17', null, '1');
INSERT INTO `akses` VALUES ('5046', null, null, '5', '0', '0', null, '2');
INSERT INTO `akses` VALUES ('5047', null, null, '5', '0', '1', null, '2');
INSERT INTO `akses` VALUES ('5048', null, null, '5', '0', '2', null, '2');
INSERT INTO `akses` VALUES ('5049', null, null, '5', '0', '3', null, '2');
INSERT INTO `akses` VALUES ('5050', null, null, '5', '0', '4', null, '2');
INSERT INTO `akses` VALUES ('5051', null, null, '5', '0', '5', null, '2');
INSERT INTO `akses` VALUES ('5052', null, null, '5', '0', '6', null, '2');
INSERT INTO `akses` VALUES ('5053', null, null, '5', '0', '7', null, '2');
INSERT INTO `akses` VALUES ('5054', null, null, '5', '0', '8', null, '2');
INSERT INTO `akses` VALUES ('5055', null, null, '5', '0', '9', null, '2');
INSERT INTO `akses` VALUES ('5056', null, null, '5', '0', '10', null, '2');
INSERT INTO `akses` VALUES ('5057', null, null, '5', '0', '11', null, '2');
INSERT INTO `akses` VALUES ('5058', null, null, '5', '0', '12', null, '2');
INSERT INTO `akses` VALUES ('5059', null, null, '5', '0', '13', null, '2');
INSERT INTO `akses` VALUES ('5060', null, null, '5', '0', '14', null, '2');
INSERT INTO `akses` VALUES ('5061', null, null, '5', '0', '15', null, '2');
INSERT INTO `akses` VALUES ('5062', null, null, '5', '0', '16', null, '2');
INSERT INTO `akses` VALUES ('5063', null, null, '5', '0', '17', null, '2');
INSERT INTO `akses` VALUES ('5064', null, null, '5', '0', '0', null, '3');
INSERT INTO `akses` VALUES ('5065', null, null, '5', '0', '1', null, '3');
INSERT INTO `akses` VALUES ('5066', null, null, '5', '0', '2', null, '3');
INSERT INTO `akses` VALUES ('5067', null, null, '5', '0', '3', null, '3');
INSERT INTO `akses` VALUES ('5068', null, null, '5', '0', '4', null, '3');
INSERT INTO `akses` VALUES ('5069', null, null, '5', '0', '5', null, '3');
INSERT INTO `akses` VALUES ('5070', null, null, '5', '0', '6', null, '3');
INSERT INTO `akses` VALUES ('5071', null, null, '5', '0', '7', null, '3');
INSERT INTO `akses` VALUES ('5072', null, null, '5', '0', '8', null, '3');
INSERT INTO `akses` VALUES ('5073', null, null, '5', '0', '9', null, '3');
INSERT INTO `akses` VALUES ('5074', null, null, '5', '0', '10', null, '3');
INSERT INTO `akses` VALUES ('5075', null, null, '5', '0', '11', null, '3');
INSERT INTO `akses` VALUES ('5076', null, null, '5', '0', '12', null, '3');
INSERT INTO `akses` VALUES ('5077', null, null, '5', '0', '13', null, '3');
INSERT INTO `akses` VALUES ('5078', null, null, '5', '0', '14', null, '3');
INSERT INTO `akses` VALUES ('5079', null, null, '5', '0', '15', null, '3');
INSERT INTO `akses` VALUES ('5080', null, null, '5', '0', '16', null, '3');
INSERT INTO `akses` VALUES ('5081', null, null, '5', '0', '17', null, '3');
INSERT INTO `akses` VALUES ('5082', null, null, '5', '0', '0', null, '4');
INSERT INTO `akses` VALUES ('5083', null, null, '5', '0', '1', null, '4');
INSERT INTO `akses` VALUES ('5084', null, null, '5', '0', '2', null, '4');
INSERT INTO `akses` VALUES ('5085', null, null, '5', '0', '3', null, '4');
INSERT INTO `akses` VALUES ('5086', null, null, '5', '0', '4', null, '4');
INSERT INTO `akses` VALUES ('5087', null, null, '5', '0', '5', null, '4');
INSERT INTO `akses` VALUES ('5088', null, null, '5', '0', '6', null, '4');
INSERT INTO `akses` VALUES ('5089', null, null, '5', '0', '7', null, '4');
INSERT INTO `akses` VALUES ('5090', null, null, '5', '0', '8', null, '4');
INSERT INTO `akses` VALUES ('5091', null, null, '5', '0', '9', null, '4');
INSERT INTO `akses` VALUES ('5092', null, null, '5', '0', '10', null, '4');
INSERT INTO `akses` VALUES ('5093', null, null, '5', '0', '11', null, '4');
INSERT INTO `akses` VALUES ('5094', null, null, '5', '0', '12', null, '4');
INSERT INTO `akses` VALUES ('5095', null, null, '5', '0', '13', null, '4');
INSERT INTO `akses` VALUES ('5096', null, null, '5', '0', '14', null, '4');
INSERT INTO `akses` VALUES ('5097', null, null, '5', '0', '15', null, '4');
INSERT INTO `akses` VALUES ('5098', null, null, '5', '0', '16', null, '4');
INSERT INTO `akses` VALUES ('5099', null, null, '5', '0', '17', null, '4');
INSERT INTO `akses` VALUES ('5100', null, null, '5', '0', '0', null, '5');
INSERT INTO `akses` VALUES ('5101', null, null, '5', '0', '1', null, '5');
INSERT INTO `akses` VALUES ('5102', null, null, '5', '0', '2', null, '5');
INSERT INTO `akses` VALUES ('5103', null, null, '5', '0', '3', null, '5');
INSERT INTO `akses` VALUES ('5104', null, null, '5', '0', '4', null, '5');
INSERT INTO `akses` VALUES ('5105', null, null, '5', '0', '5', null, '5');
INSERT INTO `akses` VALUES ('5106', null, null, '5', '0', '6', null, '5');
INSERT INTO `akses` VALUES ('5107', null, null, '5', '0', '7', null, '5');
INSERT INTO `akses` VALUES ('5108', null, null, '5', '0', '8', null, '5');
INSERT INTO `akses` VALUES ('5109', null, null, '5', '0', '9', null, '5');
INSERT INTO `akses` VALUES ('5110', null, null, '5', '0', '10', null, '5');
INSERT INTO `akses` VALUES ('5111', null, null, '5', '0', '11', null, '5');
INSERT INTO `akses` VALUES ('5112', null, null, '5', '0', '12', null, '5');
INSERT INTO `akses` VALUES ('5113', null, null, '5', '0', '13', null, '5');
INSERT INTO `akses` VALUES ('5114', null, null, '5', '0', '14', null, '5');
INSERT INTO `akses` VALUES ('5115', null, null, '5', '0', '15', null, '5');
INSERT INTO `akses` VALUES ('5116', null, null, '5', '0', '16', null, '5');
INSERT INTO `akses` VALUES ('5117', null, null, '5', '0', '17', null, '5');
INSERT INTO `akses` VALUES ('5118', null, null, '5', '0', '0', null, '6');
INSERT INTO `akses` VALUES ('5119', null, null, '5', '0', '1', null, '6');
INSERT INTO `akses` VALUES ('5120', null, null, '5', '0', '2', null, '6');
INSERT INTO `akses` VALUES ('5121', null, null, '5', '0', '3', null, '6');
INSERT INTO `akses` VALUES ('5122', null, null, '5', '0', '4', null, '6');
INSERT INTO `akses` VALUES ('5123', null, null, '5', '0', '5', null, '6');
INSERT INTO `akses` VALUES ('5124', null, null, '5', '0', '6', null, '6');
INSERT INTO `akses` VALUES ('5125', null, null, '5', '0', '7', null, '6');
INSERT INTO `akses` VALUES ('5126', null, null, '5', '0', '8', null, '6');
INSERT INTO `akses` VALUES ('5127', null, null, '5', '0', '9', null, '6');
INSERT INTO `akses` VALUES ('5128', null, null, '5', '0', '10', null, '6');
INSERT INTO `akses` VALUES ('5129', null, null, '5', '0', '11', null, '6');
INSERT INTO `akses` VALUES ('5130', null, null, '5', '0', '12', null, '6');
INSERT INTO `akses` VALUES ('5131', null, null, '5', '0', '13', null, '6');
INSERT INTO `akses` VALUES ('5132', null, null, '5', '0', '14', null, '6');
INSERT INTO `akses` VALUES ('5133', null, null, '5', '0', '15', null, '6');
INSERT INTO `akses` VALUES ('5134', null, null, '5', '0', '16', null, '6');
INSERT INTO `akses` VALUES ('5135', null, null, '5', '0', '17', null, '6');
INSERT INTO `akses` VALUES ('5136', null, null, '5', '0', '0', null, '7');
INSERT INTO `akses` VALUES ('5137', null, null, '5', '0', '1', null, '7');
INSERT INTO `akses` VALUES ('5138', null, null, '5', '0', '2', null, '7');
INSERT INTO `akses` VALUES ('5139', null, null, '5', '0', '3', null, '7');
INSERT INTO `akses` VALUES ('5140', null, null, '5', '0', '4', null, '7');
INSERT INTO `akses` VALUES ('5141', null, null, '5', '0', '5', null, '7');
INSERT INTO `akses` VALUES ('5142', null, null, '5', '0', '6', null, '7');
INSERT INTO `akses` VALUES ('5143', null, null, '5', '0', '7', null, '7');
INSERT INTO `akses` VALUES ('5144', null, null, '5', '0', '8', null, '7');
INSERT INTO `akses` VALUES ('5145', null, null, '5', '0', '9', null, '7');
INSERT INTO `akses` VALUES ('5146', null, null, '5', '0', '10', null, '7');
INSERT INTO `akses` VALUES ('5147', null, null, '5', '0', '11', null, '7');
INSERT INTO `akses` VALUES ('5148', null, null, '5', '0', '12', null, '7');
INSERT INTO `akses` VALUES ('5149', null, null, '5', '0', '13', null, '7');
INSERT INTO `akses` VALUES ('5150', null, null, '5', '0', '14', null, '7');
INSERT INTO `akses` VALUES ('5151', null, null, '5', '0', '15', null, '7');
INSERT INTO `akses` VALUES ('5152', null, null, '5', '0', '16', null, '7');
INSERT INTO `akses` VALUES ('5153', null, null, '5', '0', '17', null, '7');
INSERT INTO `bidang` VALUES ('239', '2013', '998', '10203', 'nama bidang 1', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('240', '2011', '966', '10203', 'nama bidang 2', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('241', '2009', '968', '10203', 'nama bidang 3', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('242', '2007', '948', '10203', 'nama bidang 4', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('243', '2005', '928', '10203', 'nama bidang 5', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('244', '2003', '948', '10203', 'nama bidang 6', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('245', '2001', '996', '10203', 'nama bidang 7', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `dpa` VALUES ('1', '1', '1', '1', '1', '1', '1', '0.00', '1', '1', '0.00000', '1', '1', '0.00000', '1', '0.00', '1', '1', '0.00', '0.00', '0.00', '0.00', '1', '0', null, null, null, null, '176');
INSERT INTO `eksports` VALUES ('2', '176', '27', '3', 'dpa_2015-10-06_176', 'http://localhost/integrasi/public/resultdb/download/dpa_2015-10-06_176', 'ok ', '2015-10-06', '2015-10-06');
INSERT INTO `eksports` VALUES ('11', '190', '30', '3', 'bidang_2015-11-13_190', 'http://localhost/integrasi/public/resultdb/download/bidang/bidang_2015-11-13_190', 'ok ', '2015-11-13', '2015-11-13');
INSERT INTO `files` VALUES ('182', '', 'phpAC7C.tmp.xls', 'application/vnd.ms-excel', 'rkpd.xls', null, 'rkpd', '3', '2015-10-06 14:11:13', '2015-10-06 14:11:13');
INSERT INTO `files` VALUES ('183', '', 'php54A3.tmp.xls', 'application/vnd.ms-excel', 'realisasi.xls', null, 'realisasi', '3', '2015-10-06 14:11:56', '2015-10-06 14:11:56');
INSERT INTO `files` VALUES ('185', '', 'phpF641.tmp.xls', 'application/vnd.ms-excel', 'urusan.xls', null, 'urusan', '3', '2015-10-06 14:42:07', '2015-10-06 14:42:07');
INSERT INTO `files` VALUES ('192', '', 'phpE4E9.tmp.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'bidang.xlsx', null, 'bidang', '3', '2015-11-13 09:48:20', '2015-11-13 09:48:20');
INSERT INTO `files` VALUES ('193', '', 'php2A2A.tmp.xls', 'application/vnd.ms-excel', 'urusan.xls', null, 'bidang', '3', '2015-11-13 11:21:28', '2015-11-13 11:21:28');
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
INSERT INTO `groups` VALUES ('1', 'Operator Simoneva', '{\"users\":1}', 'BAPPEKO', 'Badan Perencenaan dan Pembangunan Kota Mojokerto', '2015-07-06 04:02:20', '2015-07-06 04:02:20');
INSERT INTO `groups` VALUES ('2', 'Super Admin', '{\"admin\":1}', 'Super Admin', 'Super Admin', '2015-07-06 04:02:20', '2015-07-06 04:02:20');
INSERT INTO `groups` VALUES ('5', 'Operator Simda', '{\"users\":1}', 'DPPKA', 'Dinas Pendapatan, pengelolaan Keuangan dan Aset .SKPD.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `groups` VALUES ('6', 'Operator SI-RKPD', '{\"users\":1}', 'BAPPEKO', 'Badan Perencenaan dan Pembangunan Kota Mojokerto', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `imports` VALUES ('23', '162', 'OK', '7', '1', '3', '2015-10-05', '2015-10-05');
INSERT INTO `imports` VALUES ('27', '176', 'OK', '1', '1', '3', '2015-10-06', '2015-10-06');
INSERT INTO `log` VALUES ('302', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:02:54', '2015-11-13 10:02:54');
INSERT INTO `log` VALUES ('303', '12', '6', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:03:44', '2015-11-13 10:03:44');
INSERT INTO `log` VALUES ('304', '12', '6', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:03:51', '2015-11-13 10:03:51');
INSERT INTO `log` VALUES ('305', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:03:55', '2015-11-13 10:03:55');
INSERT INTO `log` VALUES ('306', '12', '6', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 10:03:59', '2015-11-13 10:03:59');
INSERT INTO `log` VALUES ('307', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:07:53', '2015-11-13 10:07:53');
INSERT INTO `log` VALUES ('308', '12', '6', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:07:57', '2015-11-13 10:07:57');
INSERT INTO `log` VALUES ('309', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:08:06', '2015-11-13 10:08:06');
INSERT INTO `log` VALUES ('310', '12', '6', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:08:13', '2015-11-13 10:08:13');
INSERT INTO `log` VALUES ('311', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:08:26', '2015-11-13 10:08:26');
INSERT INTO `log` VALUES ('312', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:08:31', '2015-11-13 10:08:31');
INSERT INTO `log` VALUES ('313', '12', '6', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:08:37', '2015-11-13 10:08:37');
INSERT INTO `log` VALUES ('314', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:09:15', '2015-11-13 10:09:15');
INSERT INTO `log` VALUES ('315', '12', '6', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:09:20', '2015-11-13 10:09:20');
INSERT INTO `log` VALUES ('316', '12', '6', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 10:09:24', '2015-11-13 10:09:24');
INSERT INTO `log` VALUES ('317', '12', '6', '17', 'organisasi_skpd', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:09:26', '2015-11-13 10:09:26');
INSERT INTO `log` VALUES ('318', '12', '6', '17', 'organisasi_skpd', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 10:09:28', '2015-11-13 10:09:28');
INSERT INTO `log` VALUES ('319', '12', '6', '17', 'program', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:09:30', '2015-11-13 10:09:30');
INSERT INTO `log` VALUES ('320', '12', '6', '17', 'rkpd', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:09:32', '2015-11-13 10:09:32');
INSERT INTO `log` VALUES ('321', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:09:35', '2015-11-13 10:09:35');
INSERT INTO `log` VALUES ('322', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:10:01', '2015-11-13 10:10:01');
INSERT INTO `log` VALUES ('323', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:13:06', '2015-11-13 10:13:06');
INSERT INTO `log` VALUES ('324', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:13:57', '2015-11-13 10:13:57');
INSERT INTO `log` VALUES ('325', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:14:03', '2015-11-13 10:14:03');
INSERT INTO `log` VALUES ('326', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Ambil Form Upload', '2015-11-13 10:14:49', '2015-11-13 10:14:49');
INSERT INTO `log` VALUES ('327', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi :  Delete file terupload', '2015-11-13 10:15:09', '2015-11-13 10:15:09');
INSERT INTO `log` VALUES ('328', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi :  Delete file terupload', '2015-11-13 10:15:14', '2015-11-13 10:15:14');
INSERT INTO `log` VALUES ('329', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi :  Delete file terupload', '2015-11-13 10:15:17', '2015-11-13 10:15:17');
INSERT INTO `log` VALUES ('330', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:35:42', '2015-11-13 10:35:42');
INSERT INTO `log` VALUES ('331', '3', '1', '17', 'realisasi', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 10:46:12', '2015-11-13 10:46:12');
INSERT INTO `log` VALUES ('332', '3', '1', '17', 'rkpd', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:46:27', '2015-11-13 10:46:27');
INSERT INTO `log` VALUES ('333', '3', '1', '17', 'program', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 10:49:20', '2015-11-13 10:49:20');
INSERT INTO `log` VALUES ('334', '11', '5', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:53:01', '2015-11-13 10:53:01');
INSERT INTO `log` VALUES ('335', '11', '5', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 10:53:03', '2015-11-13 10:53:03');
INSERT INTO `log` VALUES ('336', '11', '5', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 10:53:05', '2015-11-13 10:53:05');
INSERT INTO `log` VALUES ('337', '11', '5', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 10:53:07', '2015-11-13 10:53:07');
INSERT INTO `log` VALUES ('338', '3', '1', '17', 'organisasi_skpd', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:00:11', '2015-11-13 11:00:11');
INSERT INTO `log` VALUES ('339', '3', '1', '17', 'program', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 11:00:15', '2015-11-13 11:00:15');
INSERT INTO `log` VALUES ('340', '3', '1', '17', 'realisasi', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 11:00:17', '2015-11-13 11:00:17');
INSERT INTO `log` VALUES ('341', '3', '1', '17', 'rkpd', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:00:19', '2015-11-13 11:00:19');
INSERT INTO `log` VALUES ('342', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:00:23', '2015-11-13 11:00:23');
INSERT INTO `log` VALUES ('343', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:00:24', '2015-11-13 11:00:24');
INSERT INTO `log` VALUES ('344', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:00:26', '2015-11-13 11:00:26');
INSERT INTO `log` VALUES ('345', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:00:30', '2015-11-13 11:00:30');
INSERT INTO `log` VALUES ('346', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:00:36', '2015-11-13 11:00:36');
INSERT INTO `log` VALUES ('347', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:00:40', '2015-11-13 11:00:40');
INSERT INTO `log` VALUES ('348', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:01:07', '2015-11-13 11:01:07');
INSERT INTO `log` VALUES ('349', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:20:11', '2015-11-13 11:20:11');
INSERT INTO `log` VALUES ('350', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:20:57', '2015-11-13 11:20:57');
INSERT INTO `log` VALUES ('351', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:20:59', '2015-11-13 11:20:59');
INSERT INTO `log` VALUES ('352', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:21:01', '2015-11-13 11:21:01');
INSERT INTO `log` VALUES ('353', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:21:06', '2015-11-13 11:21:06');
INSERT INTO `log` VALUES ('354', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:21:10', '2015-11-13 11:21:10');
INSERT INTO `log` VALUES ('355', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:21:17', '2015-11-13 11:21:17');
INSERT INTO `log` VALUES ('356', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Ambil form import', '2015-11-13 11:21:31', '2015-11-13 11:21:31');
INSERT INTO `log` VALUES ('357', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Ambil form import', '2015-11-13 11:21:36', '2015-11-13 11:21:36');
INSERT INTO `log` VALUES ('358', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Ambil form import', '2015-11-13 11:21:38', '2015-11-13 11:21:38');
INSERT INTO `log` VALUES ('359', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Ambil form import', '2015-11-13 11:21:41', '2015-11-13 11:21:41');
INSERT INTO `log` VALUES ('360', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Ambil form import', '2015-11-13 11:21:43', '2015-11-13 11:21:43');
INSERT INTO `log` VALUES ('361', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:22:12', '2015-11-13 11:22:12');
INSERT INTO `log` VALUES ('362', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:22:57', '2015-11-13 11:22:57');
INSERT INTO `log` VALUES ('363', '3', '1', '17', 'organisasi_skpd', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:22:59', '2015-11-13 11:22:59');
INSERT INTO `log` VALUES ('364', '3', '1', '17', 'organisasi_skpd', null, 'resultdb.d', 'Gagal Aksi : Daftar History', '2015-11-13 11:23:01', '2015-11-13 11:23:01');
INSERT INTO `log` VALUES ('365', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:23:06', '2015-11-13 11:23:06');
INSERT INTO `log` VALUES ('366', '3', '1', '17', 'bidang', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:27:30', '2015-11-13 11:27:30');
INSERT INTO `log` VALUES ('367', '3', '1', '17', 'dpa', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:27:33', '2015-11-13 11:27:33');
INSERT INTO `log` VALUES ('368', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar file terupload', '2015-11-13 11:27:39', '2015-11-13 11:27:39');
INSERT INTO `log` VALUES ('369', '3', '1', '17', 'kegiatan', null, 'resultdb.d', 'Gagal Aksi : Daftar ekspor file', '2015-11-13 11:27:41', '2015-11-13 11:27:41');
INSERT INTO `migrations` VALUES ('2012_12_06_225921_migration_cartalyst_sentry_install_users', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225929_migration_cartalyst_sentry_install_groups', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_14_053439_migration_sentinel_add_username', '1');
INSERT INTO `migrations` VALUES ('2015_07_06_022646_create_fileentries_table', '2');
INSERT INTO `throttle` VALUES ('17', '2', '127.0.0.1', '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('18', '3', '::1', '0', '0', '0', null, null, null);
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
INSERT INTO `throttle` VALUES ('33', '3', '192.168.1.50', '5', '1', '0', '2015-11-05 12:47:57', '2015-11-05 12:47:57', null);
INSERT INTO `throttle` VALUES ('34', '2', '192.168.1.103', '0', '0', '0', null, null, null);
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
INSERT INTO `users` VALUES ('2', 'admin@admin.com', '$2y$10$qjChYycAUmd4wgsQzvZUIeCOnl5Z3vnbzi2wuDOY3rgBv3Q2z.UjS', null, '1', null, null, '2015-11-14 14:27:50', '$2y$10$yR1OHFdDCV3OEdA1PV0qP.2KNhscdGH6mdVqMnBlqyvspq8JmBtlm', null, 'achmadi', 'achmadi', '2015-07-06 04:02:21', '2015-11-14 14:27:50', 'admin');
INSERT INTO `users` VALUES ('3', 'monev@monev.com', '$2y$10$Fc/Q0GqTUB24luabyokVm.NvNNNAJrgEY6yL29UlR/lQiv2Ixo2aC', null, '1', null, null, '2015-11-13 10:53:29', '$2y$10$mCWZgJf.cWSUJePmUKzV7eyXRQJhqmGgmrNSynOJEVuNkbD55R.3G', null, null, null, '2015-07-06 04:02:21', '2015-11-13 10:53:29', '');
INSERT INTO `users` VALUES ('11', 'simda@simda.com', '$2y$10$VP09bZs05.6a0pi1y18Sgef/eO2o2ZMmD5iYE9rkOESOecNplwY2y', null, '1', 'YczX1QqpEHrsDfaI3VduuiGOD8OVcJnuhp97Hdo5BF', '2015-08-05 12:55:10', '2015-11-14 14:29:32', '$2y$10$5w7REgYAEGN/.y62UcbV9OK8fkgp9Cr6pkgSJmmYAcK81reYzzDMS', null, null, null, '2015-08-05 12:55:10', '2015-11-14 14:29:32', 'userxxx');
INSERT INTO `users` VALUES ('12', 'rkpd@rkpd.com', '$2y$10$7YwVZuTz4Hx4q.hLgiucn.OGv.tDM4gTLKJp/H0hi6SYC5VFgo0cy', null, '1', 'PwtF08ArVdmI39poI91lddBplZeS6DYkFfZuMDTHuJ', '2015-08-05 12:57:28', '2015-11-13 10:03:28', '$2y$10$ilvHzblgVqsEpWm3twPPkefk6ZF/UdcReFb67ZfSAyRMzazqs9./6', null, 'profil empat', 'nama empat', '2015-08-05 12:57:28', '2015-11-13 10:03:28', 'userxxxvvvv');
INSERT INTO `users` VALUES ('13', 'groupa@gmail.com', '$2y$10$a.cQG7CjYvtA5pDwKJoV5.ck5m3YyazE1LE9ULE1k47iM6Mdt/FiC', null, '1', 'mVZ4UO8TcgusAZ7IyTGac0EeGjA6kcR0BxYNNWNmaj', '2015-11-02 15:00:38', '2015-11-02 15:04:20', '$2y$10$5kbnXqu1tbptNo4ps5im3eNR0fUwj1mnEiBGcQpYbziZq5AeI9W4C', null, null, null, '2015-11-02 15:00:38', '2015-11-02 15:04:20', 'groupa');
INSERT INTO `users_groups` VALUES ('2', '2');
INSERT INTO `users_groups` VALUES ('3', '1');
INSERT INTO `users_groups` VALUES ('6', '1');
INSERT INTO `users_groups` VALUES ('6', '3');
INSERT INTO `users_groups` VALUES ('11', '5');
INSERT INTO `users_groups` VALUES ('12', '6');
INSERT INTO `users_groups` VALUES ('13', '5');
