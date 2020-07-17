/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : template_login

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 17/07/2020 16:39:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for template_action
-- ----------------------------
DROP TABLE IF EXISTS `template_action`;
CREATE TABLE `template_action`  (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `action_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`action_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template_action
-- ----------------------------
INSERT INTO `template_action` VALUES (1, 'Login');
INSERT INTO `template_action` VALUES (2, 'Logout');

-- ----------------------------
-- Table structure for template_session
-- ----------------------------
DROP TABLE IF EXISTS `template_session`;
CREATE TABLE `template_session`  (
  `sess_id` int(11) NOT NULL AUTO_INCREMENT,
  `sess_usr` int(255) NULL DEFAULT NULL,
  `sess_ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `sess_date` datetime(0) NULL DEFAULT NULL,
  `sess_action` int(255) NULL DEFAULT 0 COMMENT '1 in 2 out',
  PRIMARY KEY (`sess_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template_session
-- ----------------------------
INSERT INTO `template_session` VALUES (1, 1, '192.168.0.12', '2020-07-04 16:10:05', 1);
INSERT INTO `template_session` VALUES (2, 1, '192.168.0.12', '2020-07-06 16:32:00', 1);
INSERT INTO `template_session` VALUES (3, 1, '192.168.0.12', '2020-07-06 16:46:18', 2);
INSERT INTO `template_session` VALUES (4, 1, '192.168.0.12', '2020-07-06 16:47:00', 1);
INSERT INTO `template_session` VALUES (5, 1, '192.168.0.12', '2020-07-06 17:05:23', 2);
INSERT INTO `template_session` VALUES (6, 1, '192.168.0.12', '2020-07-06 17:05:36', 1);
INSERT INTO `template_session` VALUES (7, 1, '192.168.0.12', '2020-07-06 17:09:28', 2);
INSERT INTO `template_session` VALUES (8, 1, '192.168.0.12', '2020-07-06 17:09:31', 1);
INSERT INTO `template_session` VALUES (9, 1, '192.168.0.12', '2020-07-13 14:57:19', 1);
INSERT INTO `template_session` VALUES (10, 1, '192.168.0.12', '2020-07-13 14:57:54', 2);
INSERT INTO `template_session` VALUES (11, 1, '192.168.0.12', '2020-07-17 20:59:21', 1);
INSERT INTO `template_session` VALUES (12, 1, '192.168.0.12', '2020-07-17 21:04:58', 2);
INSERT INTO `template_session` VALUES (13, 1, '192.168.0.12', '2020-07-17 21:06:24', 1);
INSERT INTO `template_session` VALUES (14, 1, '192.168.0.12', '2020-07-17 21:22:32', 2);
INSERT INTO `template_session` VALUES (15, 1, '192.168.0.12', '2020-07-17 21:25:57', 1);
INSERT INTO `template_session` VALUES (16, 1, '192.168.0.12', '2020-07-17 21:28:31', 2);
INSERT INTO `template_session` VALUES (17, 1, '192.168.0.12', '2020-07-17 21:28:41', 1);
INSERT INTO `template_session` VALUES (18, 1, '192.168.0.12', '2020-07-17 21:29:14', 2);
INSERT INTO `template_session` VALUES (19, 3, '192.168.0.12', '2020-07-17 21:29:47', 1);

-- ----------------------------
-- Table structure for template_usr
-- ----------------------------
DROP TABLE IF EXISTS `template_usr`;
CREATE TABLE `template_usr`  (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `usr_lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `usr_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `usr_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT 'images/usr/avatar.png',
  `usr_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `usr_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `usr_timezone` int(11) NOT NULL DEFAULT 0,
  `usr_right` int(255) NULL DEFAULT 2,
  `usr_delete` int(255) NULL DEFAULT 0,
  PRIMARY KEY (`usr_id`) USING BTREE,
  UNIQUE INDEX `usr_email`(`usr_email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template_usr
-- ----------------------------
INSERT INTO `template_usr` VALUES (1, 'Admin', 'Template', 'admin@template.com', 'images/usr/avatar.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'fd38f01eec84a468ab33e0e5089d4ac3', 0, 1, 0);
INSERT INTO `template_usr` VALUES (2, 'User1', 'Template', 'user@template.com', 'images/usr/avatar.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', NULL, 0, 1, 0);
INSERT INTO `template_usr` VALUES (3, 'User2 ', 'Template', 'user2@template.com', 'images/usr/avatar.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', NULL, 0, 2, 0);
INSERT INTO `template_usr` VALUES (4, 'fasfasf', 'asfasf', 'juanmaioli@gmail.com', 'images/usr/avatar.png', '2339103de47b3d3fbe513f297af02635684e8bd301404ef46f6100e65f519215', NULL, 0, 2, 1);

SET FOREIGN_KEY_CHECKS = 1;
