/*
MySQL Data Transfer
Source Host: localhost
Source Database: integrasi
Target Host: localhost
Target Database: integrasi
Date: 05/10/2015 15:44:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for akses
-- ----------------------------
CREATE TABLE `akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `controller_method` varchar(255) DEFAULT NULL,
  `akses` enum('1','0') DEFAULT '0',
  `arr_id` int(10) DEFAULT NULL,
  `table_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for fileentries_copy
-- ----------------------------
CREATE TABLE `fileentries_copy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `db` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=631 DEFAULT CHARSET=utf8;

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
  `tahun` int(4) NOT NULL,
  `kd_urusan` char(5) NOT NULL,
  `kd_bidang` char(5) NOT NULL,
  `kd_organisasi` char(5) NOT NULL,
  `nm_organisasi` varchar(255) DEFAULT NULL,
  `fileentries_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `filename` varchar(255) DEFAULT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `akses` VALUES ('1', null, '1', null, '0', '0', '1');
INSERT INTO `akses` VALUES ('2', null, '1', null, '1', '1', '1');
INSERT INTO `akses` VALUES ('3', null, '1', null, '1', '2', '1');
INSERT INTO `akses` VALUES ('4', null, '1', null, '1', '3', '1');
INSERT INTO `akses` VALUES ('5', null, '1', null, '0', '4', '1');
INSERT INTO `akses` VALUES ('6', null, '1', null, '1', '5', '1');
INSERT INTO `akses` VALUES ('7', null, '1', null, '1', '6', '1');
INSERT INTO `akses` VALUES ('8', null, '1', null, '1', '7', '1');
INSERT INTO `akses` VALUES ('9', null, '1', null, '1', '8', '1');
INSERT INTO `akses` VALUES ('10', null, '1', null, '1', '9', '1');
INSERT INTO `akses` VALUES ('11', null, '1', null, '1', '10', '1');
INSERT INTO `akses` VALUES ('12', null, '1', null, '1', '11', '1');
INSERT INTO `akses` VALUES ('13', null, '1', null, '1', '12', '1');
INSERT INTO `akses` VALUES ('14', null, '1', null, '1', '13', '1');
INSERT INTO `akses` VALUES ('15', null, '1', null, '1', '14', '1');
INSERT INTO `akses` VALUES ('16', null, '1', null, '1', '15', '1');
INSERT INTO `akses` VALUES ('17', null, '1', null, '1', '16', '1');
INSERT INTO `akses` VALUES ('18', null, '1', null, '1', '17', '1');
INSERT INTO `akses` VALUES ('19', null, '1', null, '1', '18', '1');
INSERT INTO `akses` VALUES ('20', null, '1', null, '1', '19', '1');
INSERT INTO `akses` VALUES ('21', null, '1', null, '1', '20', '1');
INSERT INTO `akses` VALUES ('22', null, '1', null, '1', '21', '1');
INSERT INTO `akses` VALUES ('23', null, '1', null, '1', '22', '1');
INSERT INTO `akses` VALUES ('24', null, '1', null, '1', '23', '1');
INSERT INTO `akses` VALUES ('25', null, '1', null, '1', '24', '1');
INSERT INTO `akses` VALUES ('26', null, '1', null, '1', '25', '1');
INSERT INTO `akses` VALUES ('27', null, '1', null, '1', '26', '1');
INSERT INTO `akses` VALUES ('28', null, '1', null, '1', '27', '1');
INSERT INTO `akses` VALUES ('29', null, '1', null, '1', '0', '2');
INSERT INTO `akses` VALUES ('30', null, '1', null, '1', '1', '2');
INSERT INTO `akses` VALUES ('31', null, '1', null, '1', '2', '2');
INSERT INTO `akses` VALUES ('32', null, '1', null, '1', '3', '2');
INSERT INTO `akses` VALUES ('33', null, '1', null, '1', '4', '2');
INSERT INTO `akses` VALUES ('34', null, '1', null, '1', '5', '2');
INSERT INTO `akses` VALUES ('35', null, '1', null, '1', '6', '2');
INSERT INTO `akses` VALUES ('36', null, '1', null, '1', '7', '2');
INSERT INTO `akses` VALUES ('37', null, '1', null, '1', '8', '2');
INSERT INTO `akses` VALUES ('38', null, '1', null, '1', '9', '2');
INSERT INTO `akses` VALUES ('39', null, '1', null, '1', '10', '2');
INSERT INTO `akses` VALUES ('40', null, '1', null, '1', '11', '2');
INSERT INTO `akses` VALUES ('41', null, '1', null, '1', '12', '2');
INSERT INTO `akses` VALUES ('42', null, '1', null, '1', '13', '2');
INSERT INTO `akses` VALUES ('43', null, '1', null, '1', '14', '2');
INSERT INTO `akses` VALUES ('44', null, '1', null, '1', '15', '2');
INSERT INTO `akses` VALUES ('45', null, '1', null, '1', '16', '2');
INSERT INTO `akses` VALUES ('46', null, '1', null, '1', '17', '2');
INSERT INTO `akses` VALUES ('47', null, '1', null, '1', '18', '2');
INSERT INTO `akses` VALUES ('48', null, '1', null, '1', '19', '2');
INSERT INTO `akses` VALUES ('49', null, '1', null, '1', '20', '2');
INSERT INTO `akses` VALUES ('50', null, '1', null, '1', '21', '2');
INSERT INTO `akses` VALUES ('51', null, '1', null, '1', '22', '2');
INSERT INTO `akses` VALUES ('52', null, '1', null, '1', '23', '2');
INSERT INTO `akses` VALUES ('53', null, '1', null, '1', '24', '2');
INSERT INTO `akses` VALUES ('54', null, '1', null, '1', '25', '2');
INSERT INTO `akses` VALUES ('55', null, '1', null, '1', '26', '2');
INSERT INTO `akses` VALUES ('56', null, '1', null, '0', '27', '2');
INSERT INTO `akses` VALUES ('57', null, '1', null, '1', '0', '3');
INSERT INTO `akses` VALUES ('58', null, '1', null, '1', '1', '3');
INSERT INTO `akses` VALUES ('59', null, '1', null, '1', '2', '3');
INSERT INTO `akses` VALUES ('60', null, '1', null, '1', '3', '3');
INSERT INTO `akses` VALUES ('61', null, '1', null, '1', '4', '3');
INSERT INTO `akses` VALUES ('62', null, '1', null, '1', '5', '3');
INSERT INTO `akses` VALUES ('63', null, '1', null, '1', '6', '3');
INSERT INTO `akses` VALUES ('64', null, '1', null, '1', '7', '3');
INSERT INTO `akses` VALUES ('65', null, '1', null, '1', '8', '3');
INSERT INTO `akses` VALUES ('66', null, '1', null, '1', '9', '3');
INSERT INTO `akses` VALUES ('67', null, '1', null, '1', '10', '3');
INSERT INTO `akses` VALUES ('68', null, '1', null, '1', '11', '3');
INSERT INTO `akses` VALUES ('69', null, '1', null, '1', '12', '3');
INSERT INTO `akses` VALUES ('70', null, '1', null, '1', '13', '3');
INSERT INTO `akses` VALUES ('71', null, '1', null, '1', '14', '3');
INSERT INTO `akses` VALUES ('72', null, '1', null, '1', '15', '3');
INSERT INTO `akses` VALUES ('73', null, '1', null, '1', '16', '3');
INSERT INTO `akses` VALUES ('74', null, '1', null, '1', '17', '3');
INSERT INTO `akses` VALUES ('75', null, '1', null, '1', '18', '3');
INSERT INTO `akses` VALUES ('76', null, '1', null, '1', '19', '3');
INSERT INTO `akses` VALUES ('77', null, '1', null, '1', '20', '3');
INSERT INTO `akses` VALUES ('78', null, '1', null, '1', '21', '3');
INSERT INTO `akses` VALUES ('79', null, '1', null, '1', '22', '3');
INSERT INTO `akses` VALUES ('80', null, '1', null, '1', '23', '3');
INSERT INTO `akses` VALUES ('81', null, '1', null, '1', '24', '3');
INSERT INTO `akses` VALUES ('82', null, '1', null, '1', '25', '3');
INSERT INTO `akses` VALUES ('83', null, '1', null, '1', '26', '3');
INSERT INTO `akses` VALUES ('84', null, '1', null, '1', '27', '3');
INSERT INTO `akses` VALUES ('85', null, '1', null, '1', '0', '4');
INSERT INTO `akses` VALUES ('86', null, '1', null, '1', '1', '4');
INSERT INTO `akses` VALUES ('87', null, '1', null, '1', '2', '4');
INSERT INTO `akses` VALUES ('88', null, '1', null, '1', '3', '4');
INSERT INTO `akses` VALUES ('89', null, '1', null, '1', '4', '4');
INSERT INTO `akses` VALUES ('90', null, '1', null, '1', '5', '4');
INSERT INTO `akses` VALUES ('91', null, '1', null, '1', '6', '4');
INSERT INTO `akses` VALUES ('92', null, '1', null, '1', '7', '4');
INSERT INTO `akses` VALUES ('93', null, '1', null, '1', '8', '4');
INSERT INTO `akses` VALUES ('94', null, '1', null, '1', '9', '4');
INSERT INTO `akses` VALUES ('95', null, '1', null, '1', '10', '4');
INSERT INTO `akses` VALUES ('96', null, '1', null, '1', '11', '4');
INSERT INTO `akses` VALUES ('97', null, '1', null, '1', '12', '4');
INSERT INTO `akses` VALUES ('98', null, '1', null, '1', '13', '4');
INSERT INTO `akses` VALUES ('99', null, '1', null, '1', '14', '4');
INSERT INTO `akses` VALUES ('100', null, '1', null, '1', '15', '4');
INSERT INTO `akses` VALUES ('101', null, '1', null, '1', '16', '4');
INSERT INTO `akses` VALUES ('102', null, '1', null, '1', '17', '4');
INSERT INTO `akses` VALUES ('103', null, '1', null, '1', '18', '4');
INSERT INTO `akses` VALUES ('104', null, '1', null, '1', '19', '4');
INSERT INTO `akses` VALUES ('105', null, '1', null, '1', '20', '4');
INSERT INTO `akses` VALUES ('106', null, '1', null, '1', '21', '4');
INSERT INTO `akses` VALUES ('107', null, '1', null, '1', '22', '4');
INSERT INTO `akses` VALUES ('108', null, '1', null, '1', '23', '4');
INSERT INTO `akses` VALUES ('109', null, '1', null, '1', '24', '4');
INSERT INTO `akses` VALUES ('110', null, '1', null, '1', '25', '4');
INSERT INTO `akses` VALUES ('111', null, '1', null, '1', '26', '4');
INSERT INTO `akses` VALUES ('112', null, '1', null, '1', '27', '4');
INSERT INTO `akses` VALUES ('113', null, '1', null, '1', '0', '5');
INSERT INTO `akses` VALUES ('114', null, '1', null, '1', '1', '5');
INSERT INTO `akses` VALUES ('115', null, '1', null, '1', '2', '5');
INSERT INTO `akses` VALUES ('116', null, '1', null, '1', '3', '5');
INSERT INTO `akses` VALUES ('117', null, '1', null, '1', '4', '5');
INSERT INTO `akses` VALUES ('118', null, '1', null, '1', '5', '5');
INSERT INTO `akses` VALUES ('119', null, '1', null, '1', '6', '5');
INSERT INTO `akses` VALUES ('120', null, '1', null, '1', '7', '5');
INSERT INTO `akses` VALUES ('121', null, '1', null, '1', '8', '5');
INSERT INTO `akses` VALUES ('122', null, '1', null, '1', '9', '5');
INSERT INTO `akses` VALUES ('123', null, '1', null, '1', '10', '5');
INSERT INTO `akses` VALUES ('124', null, '1', null, '1', '11', '5');
INSERT INTO `akses` VALUES ('125', null, '1', null, '1', '12', '5');
INSERT INTO `akses` VALUES ('126', null, '1', null, '1', '13', '5');
INSERT INTO `akses` VALUES ('127', null, '1', null, '1', '14', '5');
INSERT INTO `akses` VALUES ('128', null, '1', null, '1', '15', '5');
INSERT INTO `akses` VALUES ('129', null, '1', null, '1', '16', '5');
INSERT INTO `akses` VALUES ('130', null, '1', null, '1', '17', '5');
INSERT INTO `akses` VALUES ('131', null, '1', null, '1', '18', '5');
INSERT INTO `akses` VALUES ('132', null, '1', null, '1', '19', '5');
INSERT INTO `akses` VALUES ('133', null, '1', null, '1', '20', '5');
INSERT INTO `akses` VALUES ('134', null, '1', null, '1', '21', '5');
INSERT INTO `akses` VALUES ('135', null, '1', null, '1', '22', '5');
INSERT INTO `akses` VALUES ('136', null, '1', null, '1', '23', '5');
INSERT INTO `akses` VALUES ('137', null, '1', null, '1', '24', '5');
INSERT INTO `akses` VALUES ('138', null, '1', null, '1', '25', '5');
INSERT INTO `akses` VALUES ('139', null, '1', null, '1', '26', '5');
INSERT INTO `akses` VALUES ('140', null, '1', null, '1', '27', '5');
INSERT INTO `akses` VALUES ('141', null, '1', null, '1', '0', '6');
INSERT INTO `akses` VALUES ('142', null, '1', null, '1', '1', '6');
INSERT INTO `akses` VALUES ('143', null, '1', null, '1', '2', '6');
INSERT INTO `akses` VALUES ('144', null, '1', null, '1', '3', '6');
INSERT INTO `akses` VALUES ('145', null, '1', null, '1', '4', '6');
INSERT INTO `akses` VALUES ('146', null, '1', null, '1', '5', '6');
INSERT INTO `akses` VALUES ('147', null, '1', null, '1', '6', '6');
INSERT INTO `akses` VALUES ('148', null, '1', null, '1', '7', '6');
INSERT INTO `akses` VALUES ('149', null, '1', null, '1', '8', '6');
INSERT INTO `akses` VALUES ('150', null, '1', null, '1', '9', '6');
INSERT INTO `akses` VALUES ('151', null, '1', null, '1', '10', '6');
INSERT INTO `akses` VALUES ('152', null, '1', null, '1', '11', '6');
INSERT INTO `akses` VALUES ('153', null, '1', null, '1', '12', '6');
INSERT INTO `akses` VALUES ('154', null, '1', null, '1', '13', '6');
INSERT INTO `akses` VALUES ('155', null, '1', null, '1', '14', '6');
INSERT INTO `akses` VALUES ('156', null, '1', null, '1', '15', '6');
INSERT INTO `akses` VALUES ('157', null, '1', null, '1', '16', '6');
INSERT INTO `akses` VALUES ('158', null, '1', null, '1', '17', '6');
INSERT INTO `akses` VALUES ('159', null, '1', null, '1', '18', '6');
INSERT INTO `akses` VALUES ('160', null, '1', null, '1', '19', '6');
INSERT INTO `akses` VALUES ('161', null, '1', null, '1', '20', '6');
INSERT INTO `akses` VALUES ('162', null, '1', null, '1', '21', '6');
INSERT INTO `akses` VALUES ('163', null, '1', null, '1', '22', '6');
INSERT INTO `akses` VALUES ('164', null, '1', null, '1', '23', '6');
INSERT INTO `akses` VALUES ('165', null, '1', null, '1', '24', '6');
INSERT INTO `akses` VALUES ('166', null, '1', null, '1', '25', '6');
INSERT INTO `akses` VALUES ('167', null, '1', null, '1', '26', '6');
INSERT INTO `akses` VALUES ('168', null, '1', null, '1', '27', '6');
INSERT INTO `akses` VALUES ('169', null, '1', null, '1', '0', '7');
INSERT INTO `akses` VALUES ('170', null, '1', null, '1', '1', '7');
INSERT INTO `akses` VALUES ('171', null, '1', null, '1', '2', '7');
INSERT INTO `akses` VALUES ('172', null, '1', null, '1', '3', '7');
INSERT INTO `akses` VALUES ('173', null, '1', null, '1', '4', '7');
INSERT INTO `akses` VALUES ('174', null, '1', null, '1', '5', '7');
INSERT INTO `akses` VALUES ('175', null, '1', null, '1', '6', '7');
INSERT INTO `akses` VALUES ('176', null, '1', null, '1', '7', '7');
INSERT INTO `akses` VALUES ('177', null, '1', null, '1', '8', '7');
INSERT INTO `akses` VALUES ('178', null, '1', null, '1', '9', '7');
INSERT INTO `akses` VALUES ('179', null, '1', null, '1', '10', '7');
INSERT INTO `akses` VALUES ('180', null, '1', null, '1', '11', '7');
INSERT INTO `akses` VALUES ('181', null, '1', null, '1', '12', '7');
INSERT INTO `akses` VALUES ('182', null, '1', null, '1', '13', '7');
INSERT INTO `akses` VALUES ('183', null, '1', null, '1', '14', '7');
INSERT INTO `akses` VALUES ('184', null, '1', null, '1', '15', '7');
INSERT INTO `akses` VALUES ('185', null, '1', null, '1', '16', '7');
INSERT INTO `akses` VALUES ('186', null, '1', null, '1', '17', '7');
INSERT INTO `akses` VALUES ('187', null, '1', null, '1', '18', '7');
INSERT INTO `akses` VALUES ('188', null, '1', null, '1', '19', '7');
INSERT INTO `akses` VALUES ('189', null, '1', null, '1', '20', '7');
INSERT INTO `akses` VALUES ('190', null, '1', null, '1', '21', '7');
INSERT INTO `akses` VALUES ('191', null, '1', null, '1', '22', '7');
INSERT INTO `akses` VALUES ('192', null, '1', null, '1', '23', '7');
INSERT INTO `akses` VALUES ('193', null, '1', null, '1', '24', '7');
INSERT INTO `akses` VALUES ('194', null, '1', null, '1', '25', '7');
INSERT INTO `akses` VALUES ('195', null, '1', null, '1', '26', '7');
INSERT INTO `akses` VALUES ('196', null, '1', null, '1', '27', '7');
INSERT INTO `akses` VALUES ('197', null, '1', null, '1', '0', '8');
INSERT INTO `akses` VALUES ('198', null, '1', null, '1', '1', '8');
INSERT INTO `akses` VALUES ('199', null, '1', null, '1', '2', '8');
INSERT INTO `akses` VALUES ('200', null, '1', null, '1', '3', '8');
INSERT INTO `akses` VALUES ('201', null, '1', null, '1', '4', '8');
INSERT INTO `akses` VALUES ('202', null, '1', null, '1', '5', '8');
INSERT INTO `akses` VALUES ('203', null, '1', null, '1', '6', '8');
INSERT INTO `akses` VALUES ('204', null, '1', null, '1', '7', '8');
INSERT INTO `akses` VALUES ('205', null, '1', null, '1', '8', '8');
INSERT INTO `akses` VALUES ('206', null, '1', null, '1', '9', '8');
INSERT INTO `akses` VALUES ('207', null, '1', null, '1', '10', '8');
INSERT INTO `akses` VALUES ('208', null, '1', null, '1', '11', '8');
INSERT INTO `akses` VALUES ('209', null, '1', null, '1', '12', '8');
INSERT INTO `akses` VALUES ('210', null, '1', null, '1', '13', '8');
INSERT INTO `akses` VALUES ('211', null, '1', null, '1', '14', '8');
INSERT INTO `akses` VALUES ('212', null, '1', null, '1', '15', '8');
INSERT INTO `akses` VALUES ('213', null, '1', null, '1', '16', '8');
INSERT INTO `akses` VALUES ('214', null, '1', null, '1', '17', '8');
INSERT INTO `akses` VALUES ('215', null, '1', null, '1', '18', '8');
INSERT INTO `akses` VALUES ('216', null, '1', null, '0', '19', '8');
INSERT INTO `akses` VALUES ('217', null, '1', null, '1', '20', '8');
INSERT INTO `akses` VALUES ('218', null, '1', null, '1', '21', '8');
INSERT INTO `akses` VALUES ('219', null, '1', null, '1', '22', '8');
INSERT INTO `akses` VALUES ('220', null, '1', null, '1', '23', '8');
INSERT INTO `akses` VALUES ('221', null, '1', null, '1', '24', '8');
INSERT INTO `akses` VALUES ('222', null, '1', null, '1', '25', '8');
INSERT INTO `akses` VALUES ('223', null, '1', null, '1', '26', '8');
INSERT INTO `akses` VALUES ('224', null, '1', null, '0', '27', '8');
INSERT INTO `akses` VALUES ('225', null, '3', null, '0', '0', '1');
INSERT INTO `akses` VALUES ('226', null, '3', null, '0', '1', '1');
INSERT INTO `akses` VALUES ('227', null, '3', null, '0', '2', '1');
INSERT INTO `akses` VALUES ('228', null, '3', null, '0', '3', '1');
INSERT INTO `akses` VALUES ('229', null, '3', null, '0', '4', '1');
INSERT INTO `akses` VALUES ('230', null, '3', null, '0', '5', '1');
INSERT INTO `akses` VALUES ('231', null, '3', null, '0', '6', '1');
INSERT INTO `akses` VALUES ('232', null, '3', null, '0', '7', '1');
INSERT INTO `akses` VALUES ('233', null, '3', null, '0', '8', '1');
INSERT INTO `akses` VALUES ('234', null, '3', null, '0', '9', '1');
INSERT INTO `akses` VALUES ('235', null, '3', null, '0', '10', '1');
INSERT INTO `akses` VALUES ('236', null, '3', null, '0', '11', '1');
INSERT INTO `akses` VALUES ('237', null, '3', null, '0', '12', '1');
INSERT INTO `akses` VALUES ('238', null, '3', null, '0', '13', '1');
INSERT INTO `akses` VALUES ('239', null, '3', null, '0', '14', '1');
INSERT INTO `akses` VALUES ('240', null, '3', null, '0', '15', '1');
INSERT INTO `akses` VALUES ('241', null, '3', null, '0', '16', '1');
INSERT INTO `akses` VALUES ('242', null, '3', null, '0', '17', '1');
INSERT INTO `akses` VALUES ('243', null, '3', null, '0', '18', '1');
INSERT INTO `akses` VALUES ('244', null, '3', null, '0', '19', '1');
INSERT INTO `akses` VALUES ('245', null, '3', null, '0', '20', '1');
INSERT INTO `akses` VALUES ('246', null, '3', null, '0', '21', '1');
INSERT INTO `akses` VALUES ('247', null, '3', null, '0', '22', '1');
INSERT INTO `akses` VALUES ('248', null, '3', null, '0', '23', '1');
INSERT INTO `akses` VALUES ('249', null, '3', null, '0', '24', '1');
INSERT INTO `akses` VALUES ('250', null, '3', null, '0', '25', '1');
INSERT INTO `akses` VALUES ('251', null, '3', null, '0', '26', '1');
INSERT INTO `akses` VALUES ('252', null, '3', null, '0', '27', '1');
INSERT INTO `akses` VALUES ('253', null, '3', null, '0', '0', '2');
INSERT INTO `akses` VALUES ('254', null, '3', null, '0', '1', '2');
INSERT INTO `akses` VALUES ('255', null, '3', null, '0', '2', '2');
INSERT INTO `akses` VALUES ('256', null, '3', null, '0', '3', '2');
INSERT INTO `akses` VALUES ('257', null, '3', null, '0', '4', '2');
INSERT INTO `akses` VALUES ('258', null, '3', null, '0', '5', '2');
INSERT INTO `akses` VALUES ('259', null, '3', null, '0', '6', '2');
INSERT INTO `akses` VALUES ('260', null, '3', null, '0', '7', '2');
INSERT INTO `akses` VALUES ('261', null, '3', null, '0', '8', '2');
INSERT INTO `akses` VALUES ('262', null, '3', null, '0', '9', '2');
INSERT INTO `akses` VALUES ('263', null, '3', null, '0', '10', '2');
INSERT INTO `akses` VALUES ('264', null, '3', null, '0', '11', '2');
INSERT INTO `akses` VALUES ('265', null, '3', null, '0', '12', '2');
INSERT INTO `akses` VALUES ('266', null, '3', null, '0', '13', '2');
INSERT INTO `akses` VALUES ('267', null, '3', null, '0', '14', '2');
INSERT INTO `akses` VALUES ('268', null, '3', null, '0', '15', '2');
INSERT INTO `akses` VALUES ('269', null, '3', null, '0', '16', '2');
INSERT INTO `akses` VALUES ('270', null, '3', null, '0', '17', '2');
INSERT INTO `akses` VALUES ('271', null, '3', null, '0', '18', '2');
INSERT INTO `akses` VALUES ('272', null, '3', null, '0', '19', '2');
INSERT INTO `akses` VALUES ('273', null, '3', null, '0', '20', '2');
INSERT INTO `akses` VALUES ('274', null, '3', null, '0', '21', '2');
INSERT INTO `akses` VALUES ('275', null, '3', null, '0', '22', '2');
INSERT INTO `akses` VALUES ('276', null, '3', null, '0', '23', '2');
INSERT INTO `akses` VALUES ('277', null, '3', null, '0', '24', '2');
INSERT INTO `akses` VALUES ('278', null, '3', null, '0', '25', '2');
INSERT INTO `akses` VALUES ('279', null, '3', null, '0', '26', '2');
INSERT INTO `akses` VALUES ('280', null, '3', null, '0', '27', '2');
INSERT INTO `akses` VALUES ('281', null, '3', null, '0', '0', '3');
INSERT INTO `akses` VALUES ('282', null, '3', null, '0', '1', '3');
INSERT INTO `akses` VALUES ('283', null, '3', null, '0', '2', '3');
INSERT INTO `akses` VALUES ('284', null, '3', null, '0', '3', '3');
INSERT INTO `akses` VALUES ('285', null, '3', null, '0', '4', '3');
INSERT INTO `akses` VALUES ('286', null, '3', null, '0', '5', '3');
INSERT INTO `akses` VALUES ('287', null, '3', null, '0', '6', '3');
INSERT INTO `akses` VALUES ('288', null, '3', null, '0', '7', '3');
INSERT INTO `akses` VALUES ('289', null, '3', null, '0', '8', '3');
INSERT INTO `akses` VALUES ('290', null, '3', null, '0', '9', '3');
INSERT INTO `akses` VALUES ('291', null, '3', null, '0', '10', '3');
INSERT INTO `akses` VALUES ('292', null, '3', null, '0', '11', '3');
INSERT INTO `akses` VALUES ('293', null, '3', null, '0', '12', '3');
INSERT INTO `akses` VALUES ('294', null, '3', null, '0', '13', '3');
INSERT INTO `akses` VALUES ('295', null, '3', null, '0', '14', '3');
INSERT INTO `akses` VALUES ('296', null, '3', null, '0', '15', '3');
INSERT INTO `akses` VALUES ('297', null, '3', null, '0', '16', '3');
INSERT INTO `akses` VALUES ('298', null, '3', null, '0', '17', '3');
INSERT INTO `akses` VALUES ('299', null, '3', null, '0', '18', '3');
INSERT INTO `akses` VALUES ('300', null, '3', null, '0', '19', '3');
INSERT INTO `akses` VALUES ('301', null, '3', null, '0', '20', '3');
INSERT INTO `akses` VALUES ('302', null, '3', null, '0', '21', '3');
INSERT INTO `akses` VALUES ('303', null, '3', null, '0', '22', '3');
INSERT INTO `akses` VALUES ('304', null, '3', null, '0', '23', '3');
INSERT INTO `akses` VALUES ('305', null, '3', null, '0', '24', '3');
INSERT INTO `akses` VALUES ('306', null, '3', null, '0', '25', '3');
INSERT INTO `akses` VALUES ('307', null, '3', null, '0', '26', '3');
INSERT INTO `akses` VALUES ('308', null, '3', null, '0', '27', '3');
INSERT INTO `akses` VALUES ('309', null, '3', null, '0', '0', '4');
INSERT INTO `akses` VALUES ('310', null, '3', null, '0', '1', '4');
INSERT INTO `akses` VALUES ('311', null, '3', null, '0', '2', '4');
INSERT INTO `akses` VALUES ('312', null, '3', null, '0', '3', '4');
INSERT INTO `akses` VALUES ('313', null, '3', null, '0', '4', '4');
INSERT INTO `akses` VALUES ('314', null, '3', null, '0', '5', '4');
INSERT INTO `akses` VALUES ('315', null, '3', null, '0', '6', '4');
INSERT INTO `akses` VALUES ('316', null, '3', null, '0', '7', '4');
INSERT INTO `akses` VALUES ('317', null, '3', null, '0', '8', '4');
INSERT INTO `akses` VALUES ('318', null, '3', null, '0', '9', '4');
INSERT INTO `akses` VALUES ('319', null, '3', null, '0', '10', '4');
INSERT INTO `akses` VALUES ('320', null, '3', null, '0', '11', '4');
INSERT INTO `akses` VALUES ('321', null, '3', null, '0', '12', '4');
INSERT INTO `akses` VALUES ('322', null, '3', null, '0', '13', '4');
INSERT INTO `akses` VALUES ('323', null, '3', null, '0', '14', '4');
INSERT INTO `akses` VALUES ('324', null, '3', null, '0', '15', '4');
INSERT INTO `akses` VALUES ('325', null, '3', null, '0', '16', '4');
INSERT INTO `akses` VALUES ('326', null, '3', null, '0', '17', '4');
INSERT INTO `akses` VALUES ('327', null, '3', null, '0', '18', '4');
INSERT INTO `akses` VALUES ('328', null, '3', null, '0', '19', '4');
INSERT INTO `akses` VALUES ('329', null, '3', null, '0', '20', '4');
INSERT INTO `akses` VALUES ('330', null, '3', null, '0', '21', '4');
INSERT INTO `akses` VALUES ('331', null, '3', null, '0', '22', '4');
INSERT INTO `akses` VALUES ('332', null, '3', null, '0', '23', '4');
INSERT INTO `akses` VALUES ('333', null, '3', null, '0', '24', '4');
INSERT INTO `akses` VALUES ('334', null, '3', null, '0', '25', '4');
INSERT INTO `akses` VALUES ('335', null, '3', null, '0', '26', '4');
INSERT INTO `akses` VALUES ('336', null, '3', null, '0', '27', '4');
INSERT INTO `akses` VALUES ('337', null, '3', null, '0', '0', '5');
INSERT INTO `akses` VALUES ('338', null, '3', null, '0', '1', '5');
INSERT INTO `akses` VALUES ('339', null, '3', null, '0', '2', '5');
INSERT INTO `akses` VALUES ('340', null, '3', null, '0', '3', '5');
INSERT INTO `akses` VALUES ('341', null, '3', null, '0', '4', '5');
INSERT INTO `akses` VALUES ('342', null, '3', null, '0', '5', '5');
INSERT INTO `akses` VALUES ('343', null, '3', null, '0', '6', '5');
INSERT INTO `akses` VALUES ('344', null, '3', null, '0', '7', '5');
INSERT INTO `akses` VALUES ('345', null, '3', null, '0', '8', '5');
INSERT INTO `akses` VALUES ('346', null, '3', null, '0', '9', '5');
INSERT INTO `akses` VALUES ('347', null, '3', null, '0', '10', '5');
INSERT INTO `akses` VALUES ('348', null, '3', null, '0', '11', '5');
INSERT INTO `akses` VALUES ('349', null, '3', null, '0', '12', '5');
INSERT INTO `akses` VALUES ('350', null, '3', null, '0', '13', '5');
INSERT INTO `akses` VALUES ('351', null, '3', null, '0', '14', '5');
INSERT INTO `akses` VALUES ('352', null, '3', null, '0', '15', '5');
INSERT INTO `akses` VALUES ('353', null, '3', null, '0', '16', '5');
INSERT INTO `akses` VALUES ('354', null, '3', null, '0', '17', '5');
INSERT INTO `akses` VALUES ('355', null, '3', null, '0', '18', '5');
INSERT INTO `akses` VALUES ('356', null, '3', null, '0', '19', '5');
INSERT INTO `akses` VALUES ('357', null, '3', null, '0', '20', '5');
INSERT INTO `akses` VALUES ('358', null, '3', null, '0', '21', '5');
INSERT INTO `akses` VALUES ('359', null, '3', null, '0', '22', '5');
INSERT INTO `akses` VALUES ('360', null, '3', null, '0', '23', '5');
INSERT INTO `akses` VALUES ('361', null, '3', null, '0', '24', '5');
INSERT INTO `akses` VALUES ('362', null, '3', null, '0', '25', '5');
INSERT INTO `akses` VALUES ('363', null, '3', null, '0', '26', '5');
INSERT INTO `akses` VALUES ('364', null, '3', null, '0', '27', '5');
INSERT INTO `akses` VALUES ('365', null, '3', null, '0', '0', '6');
INSERT INTO `akses` VALUES ('366', null, '3', null, '0', '1', '6');
INSERT INTO `akses` VALUES ('367', null, '3', null, '0', '2', '6');
INSERT INTO `akses` VALUES ('368', null, '3', null, '0', '3', '6');
INSERT INTO `akses` VALUES ('369', null, '3', null, '0', '4', '6');
INSERT INTO `akses` VALUES ('370', null, '3', null, '0', '5', '6');
INSERT INTO `akses` VALUES ('371', null, '3', null, '0', '6', '6');
INSERT INTO `akses` VALUES ('372', null, '3', null, '0', '7', '6');
INSERT INTO `akses` VALUES ('373', null, '3', null, '0', '8', '6');
INSERT INTO `akses` VALUES ('374', null, '3', null, '0', '9', '6');
INSERT INTO `akses` VALUES ('375', null, '3', null, '0', '10', '6');
INSERT INTO `akses` VALUES ('376', null, '3', null, '0', '11', '6');
INSERT INTO `akses` VALUES ('377', null, '3', null, '0', '12', '6');
INSERT INTO `akses` VALUES ('378', null, '3', null, '0', '13', '6');
INSERT INTO `akses` VALUES ('379', null, '3', null, '0', '14', '6');
INSERT INTO `akses` VALUES ('380', null, '3', null, '0', '15', '6');
INSERT INTO `akses` VALUES ('381', null, '3', null, '0', '16', '6');
INSERT INTO `akses` VALUES ('382', null, '3', null, '0', '17', '6');
INSERT INTO `akses` VALUES ('383', null, '3', null, '0', '18', '6');
INSERT INTO `akses` VALUES ('384', null, '3', null, '0', '19', '6');
INSERT INTO `akses` VALUES ('385', null, '3', null, '0', '20', '6');
INSERT INTO `akses` VALUES ('386', null, '3', null, '0', '21', '6');
INSERT INTO `akses` VALUES ('387', null, '3', null, '0', '22', '6');
INSERT INTO `akses` VALUES ('388', null, '3', null, '0', '23', '6');
INSERT INTO `akses` VALUES ('389', null, '3', null, '0', '24', '6');
INSERT INTO `akses` VALUES ('390', null, '3', null, '0', '25', '6');
INSERT INTO `akses` VALUES ('391', null, '3', null, '0', null, '6');
INSERT INTO `akses` VALUES ('392', null, '2', null, '0', '0', '0');
INSERT INTO `akses` VALUES ('393', null, '2', null, '0', '1', '0');
INSERT INTO `akses` VALUES ('394', null, '2', null, '0', '2', '0');
INSERT INTO `akses` VALUES ('395', null, '2', null, '0', '3', '0');
INSERT INTO `akses` VALUES ('396', null, '2', null, '0', '4', '0');
INSERT INTO `akses` VALUES ('397', null, '2', null, '0', '5', '0');
INSERT INTO `akses` VALUES ('398', null, '2', null, '0', '6', '0');
INSERT INTO `akses` VALUES ('399', null, '2', null, '0', '7', '0');
INSERT INTO `akses` VALUES ('400', null, '2', null, '0', '8', '0');
INSERT INTO `akses` VALUES ('401', null, '2', null, '0', '9', '0');
INSERT INTO `akses` VALUES ('402', null, '2', null, '0', '10', '0');
INSERT INTO `akses` VALUES ('403', null, '2', null, '0', '11', '0');
INSERT INTO `akses` VALUES ('404', null, '2', null, '0', '12', '0');
INSERT INTO `akses` VALUES ('405', null, '2', null, '0', '13', '0');
INSERT INTO `akses` VALUES ('406', null, '2', null, '0', '14', '0');
INSERT INTO `akses` VALUES ('407', null, '2', null, '0', '15', '0');
INSERT INTO `akses` VALUES ('408', null, '2', null, '0', '16', '0');
INSERT INTO `akses` VALUES ('409', null, '2', null, '0', '17', '0');
INSERT INTO `akses` VALUES ('410', null, '2', null, '0', '18', '0');
INSERT INTO `akses` VALUES ('411', null, '2', null, '0', '19', '0');
INSERT INTO `akses` VALUES ('412', null, '2', null, '0', '20', '0');
INSERT INTO `akses` VALUES ('413', null, '2', null, '0', '21', '0');
INSERT INTO `akses` VALUES ('414', null, '2', null, '0', '22', '0');
INSERT INTO `akses` VALUES ('415', null, '2', null, '0', '23', '0');
INSERT INTO `akses` VALUES ('416', null, '2', null, '0', '24', '0');
INSERT INTO `akses` VALUES ('417', null, '2', null, '0', '25', '0');
INSERT INTO `akses` VALUES ('418', null, '2', null, '0', '26', '0');
INSERT INTO `akses` VALUES ('419', null, '2', null, '0', '27', '0');
INSERT INTO `akses` VALUES ('420', null, '5', null, '1', '0', '0');
INSERT INTO `akses` VALUES ('421', null, '5', null, '1', '1', '0');
INSERT INTO `akses` VALUES ('422', null, '5', null, '1', '2', '0');
INSERT INTO `akses` VALUES ('423', null, '5', null, '1', '3', '0');
INSERT INTO `akses` VALUES ('424', null, '5', null, '0', '4', '0');
INSERT INTO `akses` VALUES ('425', null, '5', null, '0', '5', '0');
INSERT INTO `akses` VALUES ('426', null, '5', null, '0', '6', '0');
INSERT INTO `akses` VALUES ('427', null, '5', null, '0', '7', '0');
INSERT INTO `akses` VALUES ('428', null, '5', null, '0', '8', '0');
INSERT INTO `akses` VALUES ('429', null, '5', null, '0', '9', '0');
INSERT INTO `akses` VALUES ('430', null, '5', null, '0', '10', '0');
INSERT INTO `akses` VALUES ('431', null, '5', null, '0', '11', '0');
INSERT INTO `akses` VALUES ('432', null, '5', null, '0', '12', '0');
INSERT INTO `akses` VALUES ('433', null, '5', null, '0', '13', '0');
INSERT INTO `akses` VALUES ('434', null, '5', null, '0', '14', '0');
INSERT INTO `akses` VALUES ('435', null, '5', null, '0', '15', '0');
INSERT INTO `akses` VALUES ('436', null, '5', null, '0', '16', '0');
INSERT INTO `akses` VALUES ('437', null, '5', null, '0', '17', '0');
INSERT INTO `akses` VALUES ('438', null, '5', null, '0', '18', '0');
INSERT INTO `akses` VALUES ('439', null, '5', null, '0', '19', '0');
INSERT INTO `akses` VALUES ('440', null, '5', null, '0', '20', '0');
INSERT INTO `akses` VALUES ('441', null, '5', null, '0', '21', '0');
INSERT INTO `akses` VALUES ('442', null, '5', null, '0', '22', '0');
INSERT INTO `akses` VALUES ('443', null, '5', null, '0', '23', '0');
INSERT INTO `akses` VALUES ('444', null, '5', null, '0', '24', '0');
INSERT INTO `akses` VALUES ('445', null, '5', null, '0', '25', '0');
INSERT INTO `akses` VALUES ('446', null, '5', null, '0', '26', '0');
INSERT INTO `akses` VALUES ('447', null, '5', null, '0', '27', '0');
INSERT INTO `akses` VALUES ('448', null, '2', null, '0', '0', '4');
INSERT INTO `akses` VALUES ('449', null, '2', null, '1', '1', '4');
INSERT INTO `akses` VALUES ('450', null, '2', null, '1', '2', '4');
INSERT INTO `akses` VALUES ('451', null, '2', null, '1', '3', '4');
INSERT INTO `akses` VALUES ('452', null, '2', null, '0', '4', '4');
INSERT INTO `akses` VALUES ('453', null, '2', null, '0', '5', '4');
INSERT INTO `akses` VALUES ('454', null, '2', null, '0', '6', '4');
INSERT INTO `akses` VALUES ('455', null, '2', null, '0', '7', '4');
INSERT INTO `akses` VALUES ('456', null, '2', null, '0', '8', '4');
INSERT INTO `akses` VALUES ('457', null, '2', null, '0', '9', '4');
INSERT INTO `akses` VALUES ('458', null, '2', null, '0', '10', '4');
INSERT INTO `akses` VALUES ('459', null, '2', null, '0', '11', '4');
INSERT INTO `akses` VALUES ('460', null, '2', null, '0', '12', '4');
INSERT INTO `akses` VALUES ('461', null, '2', null, '0', '13', '4');
INSERT INTO `akses` VALUES ('462', null, '2', null, '0', '14', '4');
INSERT INTO `akses` VALUES ('463', null, '2', null, '0', '15', '4');
INSERT INTO `akses` VALUES ('464', null, '2', null, '0', '16', '4');
INSERT INTO `akses` VALUES ('465', null, '2', null, '0', '17', '4');
INSERT INTO `akses` VALUES ('466', null, '2', null, '0', '18', '4');
INSERT INTO `akses` VALUES ('467', null, '2', null, '0', '19', '4');
INSERT INTO `akses` VALUES ('468', null, '2', null, '0', '20', '4');
INSERT INTO `akses` VALUES ('469', null, '2', null, '0', '21', '4');
INSERT INTO `akses` VALUES ('470', null, '2', null, '0', '22', '4');
INSERT INTO `akses` VALUES ('471', null, '2', null, '0', '23', '4');
INSERT INTO `akses` VALUES ('472', null, '2', null, '0', '24', '4');
INSERT INTO `akses` VALUES ('473', null, '2', null, '0', '25', '4');
INSERT INTO `akses` VALUES ('474', null, '2', null, '0', '26', '4');
INSERT INTO `akses` VALUES ('475', null, '2', null, '0', '27', '4');
INSERT INTO `akses` VALUES ('476', null, '6', null, '0', '0', '0');
INSERT INTO `akses` VALUES ('477', null, '6', null, '0', '1', '0');
INSERT INTO `akses` VALUES ('478', null, '6', null, '0', '2', '0');
INSERT INTO `akses` VALUES ('479', null, '6', null, '0', '3', '0');
INSERT INTO `akses` VALUES ('480', null, '6', null, '0', '4', '0');
INSERT INTO `akses` VALUES ('481', null, '6', null, '0', '5', '0');
INSERT INTO `akses` VALUES ('482', null, '6', null, '0', '6', '0');
INSERT INTO `akses` VALUES ('483', null, '6', null, '0', '7', '0');
INSERT INTO `akses` VALUES ('484', null, '6', null, '0', '8', '0');
INSERT INTO `akses` VALUES ('485', null, '6', null, '0', '9', '0');
INSERT INTO `akses` VALUES ('486', null, '6', null, '0', '10', '0');
INSERT INTO `akses` VALUES ('487', null, '6', null, '0', '11', '0');
INSERT INTO `akses` VALUES ('488', null, '6', null, '0', '12', '0');
INSERT INTO `akses` VALUES ('489', null, '6', null, '0', '13', '0');
INSERT INTO `akses` VALUES ('490', null, '6', null, '0', '14', '0');
INSERT INTO `akses` VALUES ('491', null, '6', null, '0', '15', '0');
INSERT INTO `akses` VALUES ('492', null, '6', null, '0', '16', '0');
INSERT INTO `akses` VALUES ('493', null, '6', null, '0', '17', '0');
INSERT INTO `akses` VALUES ('494', null, '6', null, '0', '18', '0');
INSERT INTO `akses` VALUES ('495', null, '6', null, '0', '19', '0');
INSERT INTO `akses` VALUES ('496', null, '6', null, '0', '20', '0');
INSERT INTO `akses` VALUES ('497', null, '6', null, '0', '21', '0');
INSERT INTO `akses` VALUES ('498', null, '6', null, '0', '22', '0');
INSERT INTO `akses` VALUES ('499', null, '6', null, '0', '23', '0');
INSERT INTO `akses` VALUES ('500', null, '6', null, '0', '24', '0');
INSERT INTO `akses` VALUES ('501', null, '6', null, '0', '25', '0');
INSERT INTO `akses` VALUES ('502', null, '6', null, '0', '26', '0');
INSERT INTO `akses` VALUES ('503', null, '6', null, '0', '27', '0');
INSERT INTO `bidang` VALUES ('239', '2013', '998', '10203', 'nama bidang 1', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('240', '2011', '966', '10203', 'nama bidang 2', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('241', '2009', '968', '10203', 'nama bidang 3', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('242', '2007', '948', '10203', 'nama bidang 4', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('243', '2005', '928', '10203', 'nama bidang 5', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('244', '2003', '948', '10203', 'nama bidang 6', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `bidang` VALUES ('245', '2001', '996', '10203', 'nama bidang 7', null, '2015-10-05 13:31:09', '2015-10-05 13:31:09', '162', null);
INSERT INTO `files` VALUES ('165', '', 'phpAFFE.tmp.xls', 'application/vnd.ms-excel', 'bidang.xls', null, 'bidang', '3', '2015-10-05 15:10:40', '2015-10-05 15:10:40');
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
INSERT INTO `groups` VALUES ('6', 'GROUPX', '{\"admin\":1}', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `imports` VALUES ('23', '162', 'OK', '7', '1', '3', '2015-10-05', '2015-10-05');
INSERT INTO `migrations` VALUES ('2012_12_06_225921_migration_cartalyst_sentry_install_users', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225929_migration_cartalyst_sentry_install_groups', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', '1');
INSERT INTO `migrations` VALUES ('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_14_053439_migration_sentinel_add_username', '1');
INSERT INTO `migrations` VALUES ('2015_07_06_022646_create_fileentries_table', '2');
INSERT INTO `throttle` VALUES ('17', '2', '127.0.0.1', '0', '0', '0', null, null, null);
INSERT INTO `throttle` VALUES ('18', '3', null, '0', '0', '0', null, null, null);
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
INSERT INTO `tree_menu` VALUES ('100', '0', 'Bidang', 'excel.l.u', 'bidang', 'bidang', null);
INSERT INTO `tree_menu` VALUES ('101', '100', 'Import', 'excel.l.u', null, 'bidang', null);
INSERT INTO `tree_menu` VALUES ('102', '100', 'ResultDB', 'resultdb.l.t', null, 'bidang', null);
INSERT INTO `tree_menu` VALUES ('103', '100', 'Log action', 'log.l.g', '', 'bidang', null);
INSERT INTO `tree_menu` VALUES ('117', '111', 'Import', 'excel.l.u', '', 'bidang', null);
INSERT INTO `tree_menu` VALUES ('200', '0', 'dpa', 'excel.l.u', 'dpa', 'dpa', null);
INSERT INTO `tree_menu` VALUES ('201', '200', 'Import', 'excel.l.u', '', 'dpa', null);
INSERT INTO `tree_menu` VALUES ('202', '200', 'ResultDB', 'resultdb.l.t', '', 'dpa', null);
INSERT INTO `tree_menu` VALUES ('203', '200', 'Log action', 'log.l.g', '', 'dpa', null);
INSERT INTO `tree_menu` VALUES ('300', '0', 'kegiatan', 'excel.l.u', 'kegiatan', 'kegiatan', null);
INSERT INTO `tree_menu` VALUES ('301', '300', 'Import', 'excel.l.u', '', 'kegiatan', null);
INSERT INTO `tree_menu` VALUES ('302', '300', 'ResultDB', 'resultdb.l.t', '', 'kegiatan', null);
INSERT INTO `tree_menu` VALUES ('303', '300', 'Log action', 'log.l.g', '', 'kegiatan', null);
INSERT INTO `tree_menu` VALUES ('400', '0', 'organisasi_skpd', 'excel.l.u', 'organisasi_skpd', 'organisasi_skpd', null);
INSERT INTO `tree_menu` VALUES ('401', '400', 'Import', 'excel.l.u', '', 'organisasi_skpd', null);
INSERT INTO `tree_menu` VALUES ('403', '400', 'ResultDB', 'resultdb.l.t', '', 'organisasi_skpd', null);
INSERT INTO `tree_menu` VALUES ('404', '400', 'Log action', 'log.l.g', '', 'organisasi_skpd', null);
INSERT INTO `tree_menu` VALUES ('500', '0', 'program', 'excel.l.u', 'program', 'program', null);
INSERT INTO `tree_menu` VALUES ('501', '500', 'Import', 'excel.l.u', '', 'program', null);
INSERT INTO `tree_menu` VALUES ('502', '500', 'ResultDB', 'resultdb.l.t', '', 'program', null);
INSERT INTO `tree_menu` VALUES ('503', '500', 'Log action', 'log.l.g', '', 'program', null);
INSERT INTO `tree_menu` VALUES ('600', '0', 'realisasi', 'excel.l.u', 'realisasi', 'realisasi', null);
INSERT INTO `tree_menu` VALUES ('601', '600', 'Import', 'excel.l.u', '', 'realisasi', null);
INSERT INTO `tree_menu` VALUES ('602', '600', 'ResultDB', '', '', 'realisasi', null);
INSERT INTO `tree_menu` VALUES ('603', '600', 'Log action', 'log.l.g', '', 'realisasi', null);
INSERT INTO `tree_menu` VALUES ('700', '0', 'rkpd', 'excel.l.u', 'rkpd', 'rkpd', null);
INSERT INTO `tree_menu` VALUES ('701', '700', 'Import', 'excel.l.u', '', 'rkpd', null);
INSERT INTO `tree_menu` VALUES ('702', '700', 'Log action', 'log.l.g', '', 'rkpd', null);
INSERT INTO `tree_menu` VALUES ('703', '700', 'ResultDB', 'resultdb.l.t', '', 'rkpd', null);
INSERT INTO `tree_menu` VALUES ('800', '0', 'urusan', 'excel.l.u', 'urusan', 'urusan', null);
INSERT INTO `tree_menu` VALUES ('801', '800', 'Import', 'excel.l.u', '', 'urusan', null);
INSERT INTO `tree_menu` VALUES ('802', '800', 'ResultDB', 'resultdb.l.t', '', 'urusan', null);
INSERT INTO `tree_menu` VALUES ('803', '800', 'Log action', 'log.l.g', '', 'urusan', null);
INSERT INTO `users` VALUES ('2', 'admin@admin.com', '$2y$10$W17QR3cyblWl1N3BJMqKqexzNw7g3pIVtFDHjbFhr46eSfvbrCscu', null, '1', null, null, '2015-10-05 08:32:56', '$2y$10$fMeM.1d/Dwj8LCxKE91LueZAaBTuBi0RyzaYW5ZEKmOJGXEbeopDe', null, null, null, '2015-07-06 04:02:21', '2015-10-05 08:32:56', 'admin');
INSERT INTO `users` VALUES ('3', 'user@user.com', '$2y$10$P0f40hA4a2HVSZrBfc0NSuxUTkAnsg4of/.m7iOXRMBC1HCB1Py.a', null, '1', null, null, '2015-10-05 08:53:12', '$2y$10$e8F1IlR7HR7mXTBteAIlLOR/4NgOnbWcR5SP/HZ04C6T4sH48Oxtq', null, null, null, '2015-07-06 04:02:21', '2015-10-05 08:53:12', '');
INSERT INTO `users` VALUES ('11', 'userxxx@gmail.com', '$2y$10$SAO0BxFa7GuLN2u8rt.bautV6brvsqqPlx175kVOgorlZhpY40Whi', null, '1', 'YczX1QqpEHrsDfaI3VduuiGOD8OVcJnuhp97Hdo5BF', '2015-08-05 12:55:10', null, null, null, null, null, '2015-08-05 12:55:10', '2015-08-05 12:55:10', 'userxxx');
INSERT INTO `users` VALUES ('12', 'userxxxvvvv@gmail.com', '$2y$10$tZGi3VFRytBKXFDpX6p.JOUJhRcLpznYcC8ABBX7xSAZArPpQacPG', null, '1', 'PwtF08ArVdmI39poI91lddBplZeS6DYkFfZuMDTHuJ', '2015-08-05 12:57:28', null, null, null, null, null, '2015-08-05 12:57:28', '2015-08-05 12:57:29', 'userxxxvvvv');
INSERT INTO `users` VALUES ('13', 'userxxxvvvvgggg@gmail.com', '$2y$10$LENkvIY60H1grUDz6ijCU..lLaJTIfi19pX3Qm33YPM7W/RqeL5iC', null, '1', 'YVJrQ6XStAuPaUaKnhRqq6uVKmdwQAkpSSG8u0Ejfk', '2015-08-05 12:58:09', null, null, null, null, null, '2015-08-05 12:58:09', '2015-08-05 12:58:09', 'userxxxvvvvgggg');
INSERT INTO `users_groups` VALUES ('2', '1');
INSERT INTO `users_groups` VALUES ('2', '2');
INSERT INTO `users_groups` VALUES ('3', '2');
INSERT INTO `users_groups` VALUES ('6', '1');
INSERT INTO `users_groups` VALUES ('6', '3');
INSERT INTO `users_groups` VALUES ('11', '1');
INSERT INTO `users_groups` VALUES ('12', '1');
INSERT INTO `users_groups` VALUES ('13', '1');
