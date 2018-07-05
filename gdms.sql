/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : gdms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-06-08 16:06:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gdms_admin
-- ----------------------------
DROP TABLE IF EXISTS `gdms_admin`;
CREATE TABLE `gdms_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT '工号',
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `student_number` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_admin
-- ----------------------------
INSERT INTO `gdms_admin` VALUES ('1', 'admin', 'e95a9b45bd1c82c76b9423427ee551cd', '');

-- ----------------------------
-- Table structure for gdms_article
-- ----------------------------
DROP TABLE IF EXISTS `gdms_article`;
CREATE TABLE `gdms_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '论文标题',
  `describe` varchar(255) DEFAULT NULL COMMENT '论文描述',
  `category_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL COMMENT '老师id',
  `student_id` int(11) NOT NULL DEFAULT '0' COMMENT '是否已经被选',
  `schedule` tinyint(1) NOT NULL DEFAULT '0',
  `proposal` varchar(255) DEFAULT NULL COMMENT '开题报告',
  `thesis` varchar(255) DEFAULT NULL COMMENT '论文',
  `proposal_name` varchar(255) DEFAULT NULL,
  `thesis_name` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL COMMENT '评语',
  `point` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_article
-- ----------------------------
INSERT INTO `gdms_article` VALUES ('21', '论文题目', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('23', '测试题目1', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514896774', '1514896774', '2', '3', '1', '', '', '', '', null, '5');
INSERT INTO `gdms_article` VALUES ('24', '测试题目2', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514979663', '1514979663', '2', '1', '1', '\\uploads\\20180218\\934bf4144556ae93e869dc098a6ab842.gif', '\\uploads\\20180218\\4f3980cbfeb1dbeb7a2eaa43b7395784.jpg', 'giphy.gif', '斯塔克.jpg', '', null);
INSERT INTO `gdms_article` VALUES ('26', '论文题目4', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, '4');
INSERT INTO `gdms_article` VALUES ('27', '论文题目5', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, '3');
INSERT INTO `gdms_article` VALUES ('28', '论文题目6', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('29', '论文题目7', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('30', '论文题目8', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('31', '论文题目9', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('32', '论文题目10', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('33', '小电风扇的', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('34', '小电风扇的', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('35', '小电风扇的', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('36', '小电风扇的', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('37', '小电风扇的', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('39', '啊 ', '<p>这是论文描述<br/></p><p>这是论文描述</p>', '1', '1514895262', '1514896693', '2', '0', '1', '', '', '', '', null, null);
INSERT INTO `gdms_article` VALUES ('40', '功能测试', '<p>功能测试</p>', '1', '1522231488', '1522231488', '2', '0', '1', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for gdms_category
-- ----------------------------
DROP TABLE IF EXISTS `gdms_category`;
CREATE TABLE `gdms_category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `sort` tinyint(2) NOT NULL DEFAULT '10' COMMENT '排序 越小月前',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_category
-- ----------------------------
INSERT INTO `gdms_category` VALUES ('1', '工科1', '10');
INSERT INTO `gdms_category` VALUES ('2', '理科', '10');

-- ----------------------------
-- Table structure for gdms_category_article
-- ----------------------------
DROP TABLE IF EXISTS `gdms_category_article`;
CREATE TABLE `gdms_category_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_category_article
-- ----------------------------
INSERT INTO `gdms_category_article` VALUES ('1', '1', '5');
INSERT INTO `gdms_category_article` VALUES ('2', '1', '6');
INSERT INTO `gdms_category_article` VALUES ('3', '1', '7');
INSERT INTO `gdms_category_article` VALUES ('4', '1', '18');
INSERT INTO `gdms_category_article` VALUES ('5', '1', '19');
INSERT INTO `gdms_category_article` VALUES ('6', '1', '20');
INSERT INTO `gdms_category_article` VALUES ('7', '0', '21');

-- ----------------------------
-- Table structure for gdms_major_department
-- ----------------------------
DROP TABLE IF EXISTS `gdms_major_department`;
CREATE TABLE `gdms_major_department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_major_department
-- ----------------------------
INSERT INTO `gdms_major_department` VALUES ('1', '网络系', '0');
INSERT INTO `gdms_major_department` VALUES ('2', '网络安全', '1');
INSERT INTO `gdms_major_department` VALUES ('3', '网传', '1');
INSERT INTO `gdms_major_department` VALUES ('4', '网设', '1');
INSERT INTO `gdms_major_department` VALUES ('6', '123', '5');
INSERT INTO `gdms_major_department` VALUES ('7', '123432', '5');
INSERT INTO `gdms_major_department` VALUES ('8', '234', '5');
INSERT INTO `gdms_major_department` VALUES ('14', '5654g', '5');
INSERT INTO `gdms_major_department` VALUES ('15', '软件系', '0');
INSERT INTO `gdms_major_department` VALUES ('16', '软件嵌入', '15');

-- ----------------------------
-- Table structure for gdms_message
-- ----------------------------
DROP TABLE IF EXISTS `gdms_message`;
CREATE TABLE `gdms_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `student_name` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL DEFAULT '0',
  `teacher_name` varchar(255) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0老师 1学生',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_message
-- ----------------------------
INSERT INTO `gdms_message` VALUES ('22', '213123', '1', '唐光伟', '2', null, '1516511852', '1');
INSERT INTO `gdms_message` VALUES ('23', '12341223', '1', '唐光伟', '2', null, '1516525002', '1');
INSERT INTO `gdms_message` VALUES ('24', '4234324', '1', '唐光伟', '2', null, '1516525004', '1');
INSERT INTO `gdms_message` VALUES ('25', '胜多负少', '1', '唐光伟', '2', null, '1517485423', '1');
INSERT INTO `gdms_message` VALUES ('26', '阿萨德啊啊', '3', '李志豪', '2', null, '1516525022', '1');
INSERT INTO `gdms_message` VALUES ('27', '阿斯达', '3', '李志豪', '2', null, '1516525025', '1');
INSERT INTO `gdms_message` VALUES ('28', '123', '1', '唐光伟', '2', null, '1518181497', '1');
INSERT INTO `gdms_message` VALUES ('29', '老师测试', '1', null, '2', '王键', '1518182018', '0');
INSERT INTO `gdms_message` VALUES ('30', '毕业设计几时交啊', '1', '唐光伟', '2', null, '1518182280', '1');
INSERT INTO `gdms_message` VALUES ('31', '3月10号系统答辩', '1', null, '2', '王键', '1518182297', '0');
INSERT INTO `gdms_message` VALUES ('32', '好', '3', null, '2', '王键', '1518182382', '0');
INSERT INTO `gdms_message` VALUES ('33', '645', '3', '李志豪', '2', null, '1518182554', '1');

-- ----------------------------
-- Table structure for gdms_message_read
-- ----------------------------
DROP TABLE IF EXISTS `gdms_message_read`;
CREATE TABLE `gdms_message_read` (
  `message_id` int(11) NOT NULL,
  `teacher_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0',
  `student_id` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_message_read
-- ----------------------------
INSERT INTO `gdms_message_read` VALUES ('22', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('23', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('24', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('25', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('26', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('27', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('28', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('29', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('30', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('31', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('32', '2', '0');
INSERT INTO `gdms_message_read` VALUES ('33', '2', '0');

-- ----------------------------
-- Table structure for gdms_notice
-- ----------------------------
DROP TABLE IF EXISTS `gdms_notice`;
CREATE TABLE `gdms_notice` (
  `notice_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='公告表';

-- ----------------------------
-- Records of gdms_notice
-- ----------------------------
INSERT INTO `gdms_notice` VALUES ('1', '测试111', '<p>													</p><p>													测试213132234</p>', '0', '1514896693', '1515325180', '2');
INSERT INTO `gdms_notice` VALUES ('3', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('4', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('5', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('6', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('7', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('8', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('9', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('10', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('11', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');
INSERT INTO `gdms_notice` VALUES ('12', 'sas a', '<p>asasa</p>', '0', '1515325664', '1515325664', '2');

-- ----------------------------
-- Table structure for gdms_schedule
-- ----------------------------
DROP TABLE IF EXISTS `gdms_schedule`;
CREATE TABLE `gdms_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL DEFAULT '10',
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL COMMENT '描述',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0未开始 1进行中 2已完成',
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_schedule
-- ----------------------------
INSERT INTO `gdms_schedule` VALUES ('1', '10', '收集资料3', null, '0', null, null);
INSERT INTO `gdms_schedule` VALUES ('2', '10', '开题报告', null, '0', null, null);
INSERT INTO `gdms_schedule` VALUES ('3', '10', '初稿', null, '0', null, null);
INSERT INTO `gdms_schedule` VALUES ('4', '10', '定稿', null, '0', null, null);
INSERT INTO `gdms_schedule` VALUES ('5', '10', '完成', null, '0', null, null);
INSERT INTO `gdms_schedule` VALUES ('6', '10', 'sd', null, '0', null, null);

-- ----------------------------
-- Table structure for gdms_user
-- ----------------------------
DROP TABLE IF EXISTS `gdms_user`;
CREATE TABLE `gdms_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `number` int(11) NOT NULL COMMENT '工号',
  `name` varchar(255) NOT NULL,
  `major` varchar(255) DEFAULT NULL COMMENT '专业',
  `department` varchar(255) DEFAULT NULL COMMENT '系别',
  `phone` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `wechat` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login_ip` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0学生 1老师',
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `student_number` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gdms_user
-- ----------------------------
INSERT INTO `gdms_user` VALUES ('1', 'c28634d89bdab94593fe470ea5fb5106', '1444444444', '小明', '1', '2', '15602402446', '364971779', 'z364971779', 'R631', '364971779@qq.com', '', '0', '\\uploads\\20180218\\192e055c06b0bd4fea18775fa5a43047.jpeg');
INSERT INTO `gdms_user` VALUES ('2', 'c28634d89bdab94593fe470ea5fb5106', '1555555555', '王键', '1', '2', '15602402446', '36497177912', 'z364971779123', 'R631', '364971779@qq.com', '', '1', '\\uploads\\20180218\\42ea07e5d3005ff5eac3da110c9dd1b5.png');
INSERT INTO `gdms_user` VALUES ('3', 'c28634d89bdab94593fe470ea5fb5106', '1340224115', '李志豪', '1', '2', '15602402446', '364971779', 'z364971779', 'R631', '364971779@qq.com', '', '0', '\\uploads\\20180217\\ca5755238b4dd024cb4ed67dc59fdcf8.png');
