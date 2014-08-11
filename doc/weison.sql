-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 08 月 11 日 13:28
-- 服务器版本: 5.5.28
-- PHP 版本: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `weison`
--

-- --------------------------------------------------------

--
-- 表的结构 `ws_profiles`
--

CREATE TABLE IF NOT EXISTS `ws_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(64) NOT NULL DEFAULT '',
  `avatar_bg` varchar(256) NOT NULL DEFAULT '',
  `avatar_sm` varchar(256) NOT NULL DEFAULT '',
  `gender` varchar(8) NOT NULL DEFAULT '',
  `province` int(11) NOT NULL DEFAULT '0',
  `city` int(11) NOT NULL DEFAULT '0',
  `born` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `ws_profiles`
--

INSERT INTO `ws_profiles` (`user_id`, `nickname`, `avatar_bg`, `avatar_sm`, `gender`, `province`, `city`, `born`) VALUES
(8, '', '', '', '', 0, 0, 0),
(9, '.', 'http://qzapp.qlogo.cn/qzapp/101145780/10B4C92D99E312BCD34C99A809A691E2/100', 'http://qzapp.qlogo.cn/qzapp/101145780/10B4C92D99E312BCD34C99A809A691E2/30', '男', 0, 0, 1987);

-- --------------------------------------------------------

--
-- 表的结构 `ws_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `ws_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `ws_profiles_fields`
--

INSERT INTO `ws_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(4, 'nickname', '昵称', 'VARCHAR', '64', '1', 0, '', '', '', '', '', '', '', 0, 3),
(5, 'avatar_bg', '大头像', 'VARCHAR', '256', '0', 0, '', '', '', '', '', '', '', 0, 3),
(6, 'avatar_sm', '小头像', 'VARCHAR', '256', '0', 0, '', '', '', '', '', '', '', 0, 3),
(7, 'gender', '性别', 'VARCHAR', '8', '0', 0, '', '', '', '', '', '', '', 0, 3),
(8, 'province', '省', 'INTEGER', '11', '0', 0, '', '', '', '', '', '', '', 0, 3),
(9, 'city', '市', 'INTEGER', '11', '0', 0, '', '', '', '', '', '', '', 0, 3),
(10, 'born', '出生年月', 'INTEGER', '11', '0', 0, '', '', '', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- 表的结构 `ws_qq_users`
--

CREATE TABLE IF NOT EXISTS `ws_qq_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `openid` varchar(64) NOT NULL COMMENT 'qq_openid',
  `access_token` varchar(64) NOT NULL COMMENT '访问令牌',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ws_qq_users`
--

INSERT INTO `ws_qq_users` (`id`, `user_id`, `openid`, `access_token`, `create_at`, `update_at`) VALUES
(1, 9, '10B4C92D99E312BCD34C99A809A691E2', '0CBB90A5A718EF80C250C9917893D158', '2014-08-11 05:19:08', '2014-08-11 13:27:17');

-- --------------------------------------------------------

--
-- 表的结构 `ws_site_setting`
--

CREATE TABLE IF NOT EXISTS `ws_site_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frontend_icon` varchar(128) NOT NULL,
  `frontend_logo` varchar(128) NOT NULL,
  `backend_icon` varchar(128) NOT NULL,
  `backend_logo` varchar(128) NOT NULL,
  `frontend_name` varchar(128) NOT NULL,
  `backend_name` varchar(128) NOT NULL,
  `copyright` varchar(256) NOT NULL COMMENT '版权信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站全局参数设置表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ws_site_setting`
--

INSERT INTO `ws_site_setting` (`id`, `frontend_icon`, `frontend_logo`, `backend_icon`, `backend_logo`, `frontend_name`, `backend_name`, `copyright`) VALUES
(1, 'http://img.weison.com/site/icon.jpg', 'cccccc', 'http://img.weison.com/site/icon.jpg', 'cccccc', 'nlq', 'nlq后台管理系统', 'mahongbo');

-- --------------------------------------------------------

--
-- 表的结构 `ws_users`
--

CREATE TABLE IF NOT EXISTS `ws_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `ws_users`
--

INSERT INTO `ws_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(8, 'admin', 'c90be6ee5df6128ccee1c56e7e253b97', 'xiaoma21@126.com', '07ad81bd229936371d2b49bc16e9deee', '2014-08-11 05:16:53', '2014-08-11 05:22:45', 1, 1),
(9, 'qu_10b4c92d99e312bcd', '', '', '', '2014-08-11 05:19:08', '0000-00-00 00:00:00', 0, 0);

--
-- 限制导出的表
--

--
-- 限制表 `ws_profiles`
--
ALTER TABLE `ws_profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `ws_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
