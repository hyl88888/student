/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : student

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-09-20 17:31:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banji
-- ----------------------------
DROP TABLE IF EXISTS `banji`;
CREATE TABLE `banji` (
  `班号` char(100) NOT NULL,
  `班长` varchar(100) NOT NULL,
  `教室` varchar(20) NOT NULL,
  `班主任` varchar(20) NOT NULL,
  `班级口号` char(200) NOT NULL,
  PRIMARY KEY (`班号`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banji
-- ----------------------------
INSERT INTO `banji` VALUES ('1712B', '张舒鹏', '308西', '郭洁', '666....');
INSERT INTO `banji` VALUES ('1802B', '李国昕', '311东', '贾晓桐', '666....');
INSERT INTO `banji` VALUES ('1803B', '张三', '410西', '肖旭', '12121');
INSERT INTO `banji` VALUES ('1708B', '李国祥', '303东', '贾老师', '00000');
INSERT INTO `banji` VALUES ('1711B', '吉祥', '301西', '曹新星', 'GOGOGO');

-- ----------------------------
-- Table structure for guanli
-- ----------------------------
DROP TABLE IF EXISTS `guanli`;
CREATE TABLE `guanli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `新闻标题` char(50) NOT NULL,
  `时间` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guanli
-- ----------------------------

-- ----------------------------
-- Table structure for kecheng
-- ----------------------------
DROP TABLE IF EXISTS `kecheng`;
CREATE TABLE `kecheng` (
  `课程编号` int(11) NOT NULL AUTO_INCREMENT,
  `课程名` varchar(30) CHARACTER SET utf8 NOT NULL,
  `时间` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`课程编号`),
  UNIQUE KEY `课程编号` (`课程编号`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kecheng
-- ----------------------------
INSERT INTO `kecheng` VALUES ('43', 'HTML5', '2018-09-26');
INSERT INTO `kecheng` VALUES ('26', 'HTML5', '2018-08-04');
INSERT INTO `kecheng` VALUES ('45', 'JS加HTML', '2018-08-31');
INSERT INTO `kecheng` VALUES ('38', 'JS加HTML', '2018-08-21');
INSERT INTO `kecheng` VALUES ('39', 'HTML5', '2018-09-01');
INSERT INTO `kecheng` VALUES ('46', 'CSS3', '2018-09-13');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `标题` varchar(255) NOT NULL,
  `肩题` varchar(255) NOT NULL,
  `图片` varchar(200) NOT NULL,
  `内容` text NOT NULL,
  `发布时间` date NOT NULL,
  `创建时间` char(11) DEFAULT NULL,
  `userid` char(50) NOT NULL,
  `columnid` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('21', '月考月考月考', '考考考', 'upload/20180919034516t016ad5ff0d45869c6a.jpg', '66666666666666666666666666666.。。。', '2018-09-19', '1537328716', 'grfbx', '北网新闻');
INSERT INTO `news` VALUES ('20', '今天天真好啊！', '是挺好的', 'upload/2018092000471811.jpg', '今天有雨，记得明天带伞', '2018-09-19', '1537328571', 'kkk', '北网新闻');

-- ----------------------------
-- Table structure for newscolumn
-- ----------------------------
DROP TABLE IF EXISTS `newscolumn`;
CREATE TABLE `newscolumn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newscolumn
-- ----------------------------
INSERT INTO `newscolumn` VALUES ('1', '北网新闻');
INSERT INTO `newscolumn` VALUES ('2', '学生动态');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `学号` char(100) CHARACTER SET utf8 NOT NULL,
  `班号` char(100) CHARACTER SET utf8 NOT NULL,
  `姓名` varchar(50) CHARACTER SET utf8 NOT NULL,
  `性别` tinyint(4) DEFAULT '1' COMMENT '1代表男，0代表女',
  `图片` varchar(200) NOT NULL,
  `出生日期` date DEFAULT NULL,
  `电话` char(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('52', '171279', '1708B', '张舒鹏', '1', '1', '2018-09-17', '13453632805');
INSERT INTO `student` VALUES ('53', '180203', '1708B', '马武', '0', '', '2018-11-06', '13333333333');
INSERT INTO `student` VALUES ('54', '171115', '1711B', '随志', '0', '', '2018-09-30', '15555555555');
INSERT INTO `student` VALUES ('55', '180333', '1803B', '红鸾1', '0', '1', '2018-09-19', '18888888889');
INSERT INTO `student` VALUES ('56', '170843', '1708B', '蝶舞', '0', 'upload/2018092008515411.jpg', '2018-11-07', '17777777777');
INSERT INTO `student` VALUES ('58', '171123', '1711B', '煜昆', '0', 'upload/2018092007124821.jpg', '2018-10-06', '187888888888');
INSERT INTO `student` VALUES ('59', '171212', '1708B', '韩轶', '0', '', '2018-10-02', '181818181818');
INSERT INTO `student` VALUES ('60', '171198', '1711B', '梦茜', '0', 'upload/20180918082830benchi01s960x639.jpg', '2018-09-05', '15599999999');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL COMMENT '电子邮件，不可重复',
  `name` varchar(100) DEFAULT NULL COMMENT '昵称，可重复',
  `password` varchar(16) DEFAULT NULL COMMENT '密码',
  `question` varchar(255) DEFAULT NULL COMMENT '密码提示问题',
  `answer` varchar(255) DEFAULT NULL COMMENT '忘记密码答案',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('72', 'hhhh@yy.cn', 'kkk', '123', '你的家住在哪里？', 'qwert');
INSERT INTO `user` VALUES ('71', 'grf@edz.yh', 'grfbx', '111', '你的小学在哪上学', 'efrsgg');
INSERT INTO `user` VALUES ('74', 'sss@ss.ss', 'sad', '123123', '你的小学在哪上学', 'fbfgn');
INSERT INTO `user` VALUES ('73', 'sss@aaa.bb', '666', '666', '你的小学在哪上学', 'afgfs');
INSERT INTO `user` VALUES ('75', '56222@qq.cm', 'aa', '123', '你的小学在哪上学', '11');

-- ----------------------------
-- Table structure for xinwen
-- ----------------------------
DROP TABLE IF EXISTS `xinwen`;
CREATE TABLE `xinwen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `标题` int(50) NOT NULL,
  `肩题` int(50) NOT NULL,
  `作者` char(20) NOT NULL,
  `内容` varchar(255) NOT NULL,
  `发布时间` date NOT NULL,
  `图片` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xinwen
-- ----------------------------
INSERT INTO `xinwen` VALUES ('6', '123', '2', '张舒鹏', '2345345', '2018-09-07', 'upload/20180907033755565fb6614622a023ad2305295adb378e.jpg');
INSERT INTO `xinwen` VALUES ('5', '12', '2', '张舒鹏', '24\r\n2\r\n4', '2018-09-07', 'upload/201809070337280ca75fc5dfce41a4!400x400_big.jpg');
INSERT INTO `xinwen` VALUES ('4', '1', '2', '张舒鹏', '4\r\n86532', '2018-09-07', 'upload/2018090703342708cf96151e7b217f5e7e7fd8c6dfbdab.jpg');
INSERT INTO `xinwen` VALUES ('7', '1234', '2', '张舒鹏', '87654', '2018-09-07', 'upload/2018090703403553a68f9de1b34543.png!200x200.jpg');

-- ----------------------------
-- Table structure for xuanxiu
-- ----------------------------
DROP TABLE IF EXISTS `xuanxiu`;
CREATE TABLE `xuanxiu` (
  `学号` char(255) NOT NULL,
  `课程编号` char(255) NOT NULL,
  `成绩` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xuanxiu
-- ----------------------------
INSERT INTO `xuanxiu` VALUES ('171279', '46', '90');
INSERT INTO `xuanxiu` VALUES ('180303', '35', '88');
INSERT INTO `xuanxiu` VALUES ('171111', '43', '69');
INSERT INTO `xuanxiu` VALUES ('180203', '45', '74');
