SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 0 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;



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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template_usr
-- ----------------------------
INSERT INTO `template_usr` VALUES (1, 'Admin', 'Template', 'admin@template.com', 'images/usr/avatar.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'fd38f01eec84a468ab33e0e5089d4ac3', 0, 1, 0);
INSERT INTO `template_usr` VALUES (2, 'User1', 'Template', 'user@template.com', 'images/usr/avatar.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', NULL, 0, 1, 0);
INSERT INTO `template_usr` VALUES (3, 'User2 ', 'Template', 'user2@template.com', 'images/usr/avatar.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', NULL, 0, 2, 0);

SET FOREIGN_KEY_CHECKS = 1;
