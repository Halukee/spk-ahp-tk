/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : spk_ahptk

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 05/05/2024 11:56:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for absensi
-- ----------------------------
DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_absensi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_absensi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `users_id` int NOT NULL,
  `tanggal_absensi` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_id`(`users_id` ASC) USING BTREE,
  CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of absensi
-- ----------------------------
INSERT INTO `absensi` VALUES (3, 'sakit', 'Sakit Gigi', 7, '2024-05-05 11:42:00');
INSERT INTO `absensi` VALUES (4, 'izin', 'Izin menikah', 7, '2024-05-05 11:42:00');
INSERT INTO `absensi` VALUES (5, 'perjalanan dinas', 'Perjalanan membawamu', 7, '2024-05-05 18:00:00');
INSERT INTO `absensi` VALUES (6, 'keperluan agama', 'Mau taubat', 7, '2024-05-28 23:00:00');

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_kriteria` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES (6, 'Kriteria 1', 'K001', 'Keterangan kriteria 1\r\n');
INSERT INTO `kriteria` VALUES (7, 'Kriteria 2', 'K002', 'Keterangan kriteria 2');
INSERT INTO `kriteria` VALUES (8, 'Kriteria 3', 'K003', 'Keterangan kriteria 3');
INSERT INTO `kriteria` VALUES (12, 'Kriteria 4', 'K004', 'Keterangan kriteria 4');
INSERT INTO `kriteria` VALUES (13, 'Kriteria 5', 'K005', 'Keterangan kriteria 5');
INSERT INTO `kriteria` VALUES (14, 'Kriteria 6', 'K006', 'Keterangan kriteria 6');

-- ----------------------------
-- Table structure for nilai
-- ----------------------------
DROP TABLE IF EXISTS `nilai`;
CREATE TABLE `nilai`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `value_nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_nilai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `users_id` int NOT NULL,
  `matapelajaran_nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_id`(`users_id` ASC) USING BTREE,
  CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nilai
-- ----------------------------
INSERT INTO `nilai` VALUES (1, '89.89', 'Keterangan nilai ini perfect', 7, 'Bahasa Indonesia');
INSERT INTO `nilai` VALUES (2, '85.85', 'Sudah bagus nilainya', 7, 'Matematika');
INSERT INTO `nilai` VALUES (3, '80.53', 'Keterangan sudah sip sih', 7, 'Bahasa Indonesia');

-- ----------------------------
-- Table structure for pengaturan
-- ----------------------------
DROP TABLE IF EXISTS `pengaturan`;
CREATE TABLE `pengaturan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pembuat_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nokontak_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_pengaturan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengaturan
-- ----------------------------
INSERT INTO `pengaturan` VALUES (1, 'create bima', 'uke aplikasi', '2024-04-18-15-21-dev-hospita_2024-04-26_17-56-02_662bce92e4be3.png', '0328972389', 'alamat uke testing');

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `jeniskelamin_profile` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomorhp_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `users_id` int NULL DEFAULT NULL,
  `kode_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_id`(`users_id` ASC) USING BTREE,
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (4, 'guru123 nama', 'guru123 alamat', 'P', '8293478', 4, NULL);
INSERT INTO `profile` VALUES (5, 'walimurid123 nama', 'alamat walimurid123', 'L', '90238478', 5, NULL);
INSERT INTO `profile` VALUES (6, 'admin123', 'alamat admin123', 'P', '329072389', 6, NULL);
INSERT INTO `profile` VALUES (7, 'Siswa 123', 'alamat siswa 123', 'L', '89837289732', 7, 'A001');
INSERT INTO `profile` VALUES (8, 'siswa124', 'alamat siswa124', 'L', '83293729827', 8, 'A002');
INSERT INTO `profile` VALUES (9, 'siswa125', 'alamat siswa125', 'L', '982379237', 9, 'A003');
INSERT INTO `profile` VALUES (10, 'siswa126', 'alamat siswa126', 'L', '923898329', 10, 'A004');
INSERT INTO `profile` VALUES (14, 'guru124', 'alamat guru124', 'L', '83982379', 21, NULL);
INSERT INTO `profile` VALUES (15, 'walimurid124', 'alamat walimurid124', 'L', '823923798', 22, NULL);
INSERT INTO `profile` VALUES (16, 'admin124', 'alamat admin124', 'L', '8923723897', 23, NULL);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `roles_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_id`(`users_id` ASC) USING BTREE,
  INDEX `roles_id`(`roles_id` ASC) USING BTREE,
  CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (4, 4, 2);
INSERT INTO `role_user` VALUES (5, 5, 6);
INSERT INTO `role_user` VALUES (6, 6, 1);
INSERT INTO `role_user` VALUES (7, 7, 3);
INSERT INTO `role_user` VALUES (8, 8, 3);
INSERT INTO `role_user` VALUES (9, 9, 3);
INSERT INTO `role_user` VALUES (10, 10, 3);
INSERT INTO `role_user` VALUES (12, 19, 2);
INSERT INTO `role_user` VALUES (13, 20, 2);
INSERT INTO `role_user` VALUES (14, 21, 2);
INSERT INTO `role_user` VALUES (15, 22, 6);
INSERT INTO `role_user` VALUES (16, 23, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_roles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin');
INSERT INTO `roles` VALUES (2, 'Guru');
INSERT INTO `roles` VALUES (3, 'Siswa');
INSERT INTO `roles` VALUES (4, 'Developer');
INSERT INTO `roles` VALUES (6, 'Wali Murid');

-- ----------------------------
-- Table structure for status_perkembangan
-- ----------------------------
DROP TABLE IF EXISTS `status_perkembangan`;
CREATE TABLE `status_perkembangan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_sperkembangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_sperkembangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `users_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_id`(`users_id` ASC) USING BTREE,
  CONSTRAINT `status_perkembangan_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status_perkembangan
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username_users` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_users` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_users` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email_users` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token_expiration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (4, 'guru123', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'guru123@gmail.com', NULL);
INSERT INTO `users` VALUES (5, 'walimurid123', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'walimurid123@gmail.com', NULL);
INSERT INTO `users` VALUES (6, 'admin123', '0192023a7bbd73250516f069df18b500', '912d5f255277454f0b5e94284f4c2dbd', 'admin123@gmail.com', '1714755421');
INSERT INTO `users` VALUES (7, 'siswa123', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'siswa123@gmail.com', NULL);
INSERT INTO `users` VALUES (8, 'siswa124', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'siswa124@gmail.com', NULL);
INSERT INTO `users` VALUES (9, 'siswa125', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'siswa125@gmail.com', NULL);
INSERT INTO `users` VALUES (10, 'siswa126', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'siswa126@gmail.com', NULL);
INSERT INTO `users` VALUES (11, 'gurutesting123', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'gurutesting123@gmail.com', NULL);
INSERT INTO `users` VALUES (19, 'guru124', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'guru124@gmail.com', NULL);
INSERT INTO `users` VALUES (20, 'guru124', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'guru124@gmail.com', NULL);
INSERT INTO `users` VALUES (21, 'guru124', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'guru124@gmail.com', NULL);
INSERT INTO `users` VALUES (22, 'walimurid124', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 'walimurid124@gmail.com', NULL);
INSERT INTO `users` VALUES (23, 'admin124', 'd325ffe191a600f562fb59ae52ccbc75', NULL, 'admin124@gmail.com', NULL);

SET FOREIGN_KEY_CHECKS = 1;
