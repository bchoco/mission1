# Host: localhost  (Version: 5.1.50-community-log)
# Date: 2017-08-24 17:49:17
# Generator: MySQL-Front 5.3  (Build 4.89)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "cz_admin"
#

DROP TABLE IF EXISTS `cz_admin`;
CREATE TABLE `cz_admin` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `roleid` smallint(5) DEFAULT NULL,
  `salt` char(6) DEFAULT NULL,
  `lastloginip` varchar(15) DEFAULT NULL,
  `lastlogintime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "cz_admin"
#

/*!40000 ALTER TABLE `cz_admin` DISABLE KEYS */;
INSERT INTO `cz_admin` VALUES (1,'admin','8387a2df7e6b7313db0f981ceb0bc75c',1,'retywt','127.0.0.1',1501910023),(2,'test','b116bd123820b7cebec8203bda8a39ee',3,'xqrxtp','127.0.0.1',1501910023);
/*!40000 ALTER TABLE `cz_admin` ENABLE KEYS */;

#
# Structure for table "cz_hot"
#

DROP TABLE IF EXISTS `cz_hot`;
CREATE TABLE `cz_hot` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `small` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT '',
  `listorder` tinyint(4) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "cz_hot"
#

/*!40000 ALTER TABLE `cz_hot` DISABLE KEYS */;
INSERT INTO `cz_hot` VALUES (1,'小雨点儿广场舞《爱你每一天》','20170824/small_599e339daf89a.png','20170824/599e339daf89a.png','XMjc3ODQyODkwNA',1,'小雨点儿广场舞《爱你每一天》',1503540158);
/*!40000 ALTER TABLE `cz_hot` ENABLE KEYS */;

#
# Structure for table "cz_menu"
#

DROP TABLE IF EXISTS `cz_menu`;
CREATE TABLE `cz_menu` (
  `menuid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `level` tinyint(3) unsigned DEFAULT '0',
  `m` varchar(20) DEFAULT NULL,
  `c` varchar(20) DEFAULT NULL,
  `a` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `listorder` tinyint(4) NOT NULL DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`menuid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "cz_menu"
#

/*!40000 ALTER TABLE `cz_menu` DISABLE KEYS */;
INSERT INTO `cz_menu` VALUES (1,'热门管理','fa-home',0,'-1-',1,'Admin','Hot','','热门管理',1,1502082465),(2,'热门列表',NULL,1,'-1-2-',2,'Admin','Hot','index','热门列表',1,1502082561),(3,'添加热门',NULL,1,'-1-3-',2,'Admin','Hot','add','添加热门',2,1502082562),(4,'广场管理','fa-bar-chart-o',0,'-4-',1,'Admin','Square','','广场管理',2,1502082714),(5,'广场列表',NULL,4,'-4-5-',2,'Admin','Square','index','广场列表',1,1502082714),(6,'添加广场',NULL,4,'-4-6-',2,'Admin','Square','add','添加广场',2,1502082715),(9,'动态管理','fa-edit',0,'-9-',1,'Admin','News','','动态管理',4,1502083082),(10,'动态列表',NULL,9,'-9-10-',2,'Admin','News','index','动态列表',1,1502083082),(11,'添加动态',NULL,9,'-9-11-',2,'Admin','News','add','添加动态',2,1502083083),(12,'权限管理','fa-firefox',0,'-12-',1,'Admin','','','权限管理',5,1502083404),(13,'管理列表',NULL,12,'-12-13-',2,'Admin','Admin','index','管理列表',1,1502083404),(14,'角色列表',NULL,12,'-12-14-',2,'Admin','Role','index','角色列表',2,1502083404),(15,'菜单列表',NULL,12,'-12-15-',2,'Admin','Menu','index','菜单列表',3,1502083405);
/*!40000 ALTER TABLE `cz_menu` ENABLE KEYS */;

#
# Structure for table "cz_news"
#

DROP TABLE IF EXISTS `cz_news`;
CREATE TABLE `cz_news` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `small` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT '',
  `listorder` tinyint(4) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "cz_news"
#

/*!40000 ALTER TABLE `cz_news` DISABLE KEYS */;
INSERT INTO `cz_news` VALUES (1,'成都','20170824/small_599e32f2c575f.png','20170824/599e32f2c575f.png','http://192.168.69.52/Uploads/music/chengdu.mp3',1,'崔一乔成名曲之成都',1503540030),(2,'小苹果','20170824/small_599e4d6237a4e.png','20170824/599e4d6237a4e.png','http://192.168.69.52/Uploads/music/apple.mp3',2,'筷子兄弟成名曲之小苹果',1503546747),(4,'买买买','20170824/small_599e9b164b00a.png','20170824/599e9b164b00a.png','http://192.168.69.52/Uploads/music/maimaimai.mp3',3,'陈妍希最新单曲之买买买',1503566663);
/*!40000 ALTER TABLE `cz_news` ENABLE KEYS */;

#
# Structure for table "cz_privileges"
#

DROP TABLE IF EXISTS `cz_privileges`;
CREATE TABLE `cz_privileges` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `roleid` mediumint(8) unsigned NOT NULL,
  `menuid` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`roleid`),
  KEY `menuid` (`menuid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

#
# Data for table "cz_privileges"
#

/*!40000 ALTER TABLE `cz_privileges` DISABLE KEYS */;
INSERT INTO `cz_privileges` VALUES (1,2,1),(2,2,2),(3,2,3),(4,2,4),(5,2,5),(6,2,6),(7,1,1),(8,1,2),(9,1,3),(10,1,4),(11,1,5),(12,1,6),(13,1,7),(14,1,8),(15,1,9),(16,1,10),(17,1,11),(18,1,12),(19,1,13),(20,1,14),(21,1,15),(22,3,9),(23,3,10),(24,3,11);
/*!40000 ALTER TABLE `cz_privileges` ENABLE KEYS */;

#
# Structure for table "cz_role"
#

DROP TABLE IF EXISTS `cz_role`;
CREATE TABLE `cz_role` (
  `roleid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `listorder` smallint(5) unsigned DEFAULT '0',
  `disabled` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`roleid`),
  KEY `listorder` (`listorder`),
  KEY `disabled` (`disabled`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "cz_role"
#

/*!40000 ALTER TABLE `cz_role` DISABLE KEYS */;
INSERT INTO `cz_role` VALUES (1,'超管用户','超级管理员,拥有项目所有权限...',1,0),(2,'普通用户','普通用户,拥有项目基本权限...',2,0),(3,'测试用户','测试用户,只具有基本浏览权限...',3,0);
/*!40000 ALTER TABLE `cz_role` ENABLE KEYS */;
