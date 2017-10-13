/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : phpexcel

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-13 17:51:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `score` varchar(50) NOT NULL,
  `class` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='学生表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '啊', '10', '1', '1');
INSERT INTO `user` VALUES ('2', '不', '20', '2', '1');
INSERT INTO `user` VALUES ('3', '才', '30', '3', '1');
INSERT INTO `user` VALUES ('4', '的', '40', '1', '2');
INSERT INTO `user` VALUES ('5', '额', '50', '2', '2');
INSERT INTO `user` VALUES ('6', '发', '60', '3', '2');
