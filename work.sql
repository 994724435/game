/*
Navicat MySQL Data Transfer

Source Server         : xampp
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : work

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-05-29 19:54:03
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '123', ',1,5');
INSERT INTO `admin` VALUES ('2', 'li', '123', ',2');
INSERT INTO `admin` VALUES ('3', 'wang', '123', ',3');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '123', '16', '123', '123', '2', 'admin', '1', 'admin');
INSERT INTO `product` VALUES ('2', '德莱文皮肤', '16', '100', '200', '2', 'admin', '1', 'li');
INSERT INTO `product` VALUES ('3', '泰达米尔', '8', '100', '100', '1', 'admin', '1', 'wang');
INSERT INTO `product` VALUES ('4', '艾希皮肤', '48', '100', '200', '1', 'admin', '0', null);
INSERT INTO `product` VALUES ('5', '乌迪尔战甲', '24', '100', '100', '1', 'li', '1', 'admin');
INSERT INTO `product` VALUES ('6', '定魂丹', '16', '200', '200', '1', 'admin', '0', null);
