/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : dekorumah

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 06/12/2020 23:45:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_group
-- ----------------------------
DROP TABLE IF EXISTS `m_group`;
CREATE TABLE `m_group`  (
  `id_group` int NOT NULL AUTO_INCREMENT,
  `nm_group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_group`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_group
-- ----------------------------
INSERT INTO `m_group` VALUES (1, 'Debit');
INSERT INTO `m_group` VALUES (2, 'Kredit');

-- ----------------------------
-- Table structure for m_group_sub
-- ----------------------------
DROP TABLE IF EXISTS `m_group_sub`;
CREATE TABLE `m_group_sub`  (
  `id_group_sub` int NOT NULL AUTO_INCREMENT,
  `id_group` int NULL DEFAULT NULL,
  `nm_group_sub` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_group_sub`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_group_sub
-- ----------------------------
INSERT INTO `m_group_sub` VALUES (1, 1, 'Uang Muka (DP)');
INSERT INTO `m_group_sub` VALUES (2, 1, 'Tambah Uang Muka (DP)');
INSERT INTO `m_group_sub` VALUES (3, 1, 'Pelunasan');
INSERT INTO `m_group_sub` VALUES (4, 2, 'Material');
INSERT INTO `m_group_sub` VALUES (5, 2, 'Jasa Tukang');
INSERT INTO `m_group_sub` VALUES (6, 2, 'Biaya Kirim');
INSERT INTO `m_group_sub` VALUES (7, 2, 'Biaya Design');
INSERT INTO `m_group_sub` VALUES (8, 2, 'Biaya Lain-lain');

-- ----------------------------
-- Table structure for m_status
-- ----------------------------
DROP TABLE IF EXISTS `m_status`;
CREATE TABLE `m_status`  (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_status
-- ----------------------------
INSERT INTO `m_status` VALUES (1, 'Prospek');

-- ----------------------------
-- Table structure for m_survei
-- ----------------------------
DROP TABLE IF EXISTS `m_survei`;
CREATE TABLE `m_survei`  (
  `id_survei` int NOT NULL AUTO_INCREMENT,
  `tgl_survei` date NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hp` char(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `users` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_survei`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_survei
-- ----------------------------
INSERT INTO `m_survei` VALUES (4, '2020-12-17', 'kinan', 'mampang', 'angkel.muthu@gmail.com', '08158340900', 'jam 1 siang', 'warning', '2020-12-06 21:40:01', 'Superadmin');
INSERT INTO `m_survei` VALUES (5, '2020-12-05', 'mansyur', 'adf adf ', 'angkel.muthu@gmail.com', '08158340900', 'adfafd dafda dafd da fda', 'success', '2020-12-06 22:14:47', 'Superadmin');
INSERT INTO `m_survei` VALUES (6, '2020-12-08', 'sandi', 'asd  asd', 'angkel.muthu@gmail.com', '08158340900', 'asdsa asdsd sad sad', 'danger', '2020-12-06 22:14:47', 'Superadmin');
INSERT INTO `m_survei` VALUES (13, '2020-12-09', 'doddy ahmad', 'asdsd sadadsa sadsads', 'angkel.muthu@gmail.com', '08158340900', 'asdsad asdsad adsadas', 'primary', '2020-12-06 22:56:08', 'Superadmin');

-- ----------------------------
-- Table structure for t_pesanan
-- ----------------------------
DROP TABLE IF EXISTS `t_pesanan`;
CREATE TABLE `t_pesanan`  (
  `id_pesanan` int NOT NULL AUTO_INCREMENT,
  `no_pesanan` int NOT NULL,
  `id_survei` int NOT NULL,
  `id_tipe` int NOT NULL,
  `id_bahan` int NULL DEFAULT NULL,
  `p` decimal(5, 0) NULL DEFAULT NULL,
  `l` decimal(5, 0) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `t` decimal(5, 0) NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_status` int NOT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `users` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_deleted` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'N',
  PRIMARY KEY (`id_pesanan`) USING BTREE,
  INDEX `fk_t_pesanan_t_pesanan_1`(`id_survei`) USING BTREE,
  INDEX `fk_t_pesanan_t_pesanan_2`(`id_status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pesanan
-- ----------------------------

-- ----------------------------
-- Table structure for t_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `t_transaksi`;
CREATE TABLE `t_transaksi`  (
  `id_kredit` int NOT NULL AUTO_INCREMENT,
  `no_pesanan` int NULL DEFAULT NULL,
  `id_group_sub` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `h_satuan` int NULL DEFAULT NULL,
  `total` int NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `users` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kredit`) USING BTREE,
  CONSTRAINT `fk_t_transaksi_t_transaksi_1` FOREIGN KEY (`id_group_sub`) REFERENCES `m_group_sub` (`id_group_sub`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_transaksi
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_hak_akses
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hak_akses`;
CREATE TABLE `tbl_hak_akses`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user_level` int NOT NULL,
  `id_menu` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_hak_akses
-- ----------------------------
INSERT INTO `tbl_hak_akses` VALUES (1, 1, 1);
INSERT INTO `tbl_hak_akses` VALUES (2, 1, 2);
INSERT INTO `tbl_hak_akses` VALUES (3, 1, 3);
INSERT INTO `tbl_hak_akses` VALUES (4, 1, 4);
INSERT INTO `tbl_hak_akses` VALUES (5, 1, 5);
INSERT INTO `tbl_hak_akses` VALUES (7, 1, 7);
INSERT INTO `tbl_hak_akses` VALUES (8, 1, 8);
INSERT INTO `tbl_hak_akses` VALUES (9, 1, 9);
INSERT INTO `tbl_hak_akses` VALUES (10, 1, 11);

-- ----------------------------
-- Table structure for tbl_menu
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu`  (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_main_menu` int NOT NULL,
  `is_aktif` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_menu
-- ----------------------------
INSERT INTO `tbl_menu` VALUES (1, 'KELOLA MENU', 'kelolamenu', 'fal fa-server', 5, 'y');
INSERT INTO `tbl_menu` VALUES (2, 'KELOLA PENGGUNA', 'user', 'fal fa-users', 5, 'y');
INSERT INTO `tbl_menu` VALUES (3, 'level PENGGUNA', 'userlevel', 'fal fa-users', 5, 'y');
INSERT INTO `tbl_menu` VALUES (4, 'CRUD GEN', 'Vaicrud', 'fal fa-users', 5, 'y');
INSERT INTO `tbl_menu` VALUES (5, 'SETTING', '#', 'fal fa-cogs', 0, 'y');
INSERT INTO `tbl_menu` VALUES (6, 'M_group', 'M_group', 'fal fa-align-justify', 0, 'y');
INSERT INTO `tbl_menu` VALUES (7, 'Group Sub', 'M_group_sub', 'fal fa-align-justify', 0, 'y');
INSERT INTO `tbl_menu` VALUES (8, 'Data Pelanggan', 'M_pelanggan', 'fal fa-align-justify', 0, 'y');
INSERT INTO `tbl_menu` VALUES (9, 'Master Status', 'M_status', 'fal fa-align-justify', 0, 'y');
INSERT INTO `tbl_menu` VALUES (10, 'Jadwal Survei', 'T_survei', 'fal fa-align-justify', 0, 'y');
INSERT INTO `tbl_menu` VALUES (11, 'Jadwal Survei', 'calendar', 'fal fa-angle-right', 0, 'y');

-- ----------------------------
-- Table structure for tbl_setting
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE `tbl_setting`  (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `value` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_setting
-- ----------------------------
INSERT INTO `tbl_setting` VALUES (1, 'Tampil Menu', 'ya');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `images` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user_level` int NOT NULL,
  `is_aktif` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_users`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'Superadmin', 'superadmin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y');
INSERT INTO `tbl_user` VALUES (2, 'Administrator', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '7.png', 2, 'y');

-- ----------------------------
-- Table structure for tbl_user_level
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_level`;
CREATE TABLE `tbl_user_level`  (
  `id_user_level` int NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user_level
-- ----------------------------
INSERT INTO `tbl_user_level` VALUES (1, 'Super Admin');
INSERT INTO `tbl_user_level` VALUES (2, 'Admin');

-- ----------------------------
-- View structure for v_group_sub
-- ----------------------------
DROP VIEW IF EXISTS `v_group_sub`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_group_sub` AS SELECT a.*,b.nm_group from m_group_sub a LEFT JOIN m_group b on a.id_group=b.id_group ORDER BY a.id_group,a.nm_group_sub asc ;

SET FOREIGN_KEY_CHECKS = 1;
