/*
Navicat MySQL Data Transfer

Source Server         : xampp
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : work

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-05-30 22:34:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `produce` varchar(255) DEFAULT NULL,
  `jing` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '123', ',1,5', null);
INSERT INTO `admin` VALUES ('2', 'li', '123', ',7,8,9', null);

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `issale` varchar(255) DEFAULT '0',
  `buyer` varchar(255) DEFAULT NULL,
  `buyer1` varchar(255) DEFAULT NULL,
  `start1` varchar(255) DEFAULT NULL,
  `start2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '123', '16', '126', '500', '2', 'admin', '1', 'admin', null, null, null);
INSERT INTO `product` VALUES ('2', '德莱文皮肤', '16', '127', '200', '2', 'admin', '0', 'li', 'admin', '126', '127');
INSERT INTO `product` VALUES ('3', '泰达米尔', '8', '100', '200', '1', 'admin', '0', 'wang', null, null, null);
INSERT INTO `product` VALUES ('4', '艾希皮肤', '48', '100', '200', '1', 'admin', '0', null, null, null, null);
INSERT INTO `product` VALUES ('5', '乌迪尔战甲', '24', '100', '300', '1', 'li', '1', 'admin', null, null, null);
INSERT INTO `product` VALUES ('6', '定魂丹', '16', '150', '200', '1', 'admin', '0', null, null, null, null);
INSERT INTO `product` VALUES ('7', '德莱文34', '16', '100', '300', '5', 'admin', '1', 'li', null, null, null);
INSERT INTO `product` VALUES ('8', '阿卡丽背包', '8', '102', '200', '1', 'admin', '1', 'li', 'admin', '102', null);
INSERT INTO `product` VALUES ('9', '德莱文666', '24', '104', '200', '2', 'admin', '1', 'li', 'admin', '104', null);
INSERT INTO `product` VALUES ('10', '泰达米尔666', '16', '200', '200', '3', 'li', '0', null, 'li', '200', null);
INSERT INTO `product` VALUES ('11', '寒冰123', '16', '199', '200', '2', 'admin', '0', null, 'admin', '199', null);
INSERT INTO `product` VALUES ('12', '123', '8', '123', '123', '1', 'admin', '0', null, null, null, null);
