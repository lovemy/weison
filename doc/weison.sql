-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 07 月 12 日 17:24
-- 服务器版本: 5.5.28
-- PHP 版本: 5.5.9

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
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ws_profiles`
--

INSERT INTO `ws_profiles` (`user_id`, `lastname`, `firstname`, `qq`) VALUES
(1, '洪波', '马', '513667682'),
(2, 'Demo', 'Demo', ''),
(3, '', '', '513667682');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ws_profiles_fields`
--

INSERT INTO `ws_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '1', 0, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '1', 0, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'qq', 'QQ号', 'VARCHAR', '50', '4', 1, '/^\\d{5,12}$/u', '', '', '', '', '', '', 0, 3);

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
(1, 'http://img.weison.com/site/icon.jpg', 'cccccc', 'http://img.weison.com/site/icon.jpg', 'cccccc', 'weison', 'weison后台管理系统', 'mahongbo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ws_users`
--

INSERT INTO `ws_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', 'c90be6ee5df6128ccee1c56e7e253b97', 'xiaoma21@126.com', 'e9f5aec205d7631511e0129c7ae48a5e', '2014-07-12 04:00:27', '2014-07-12 08:30:27', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2014-07-12 04:00:27', '0000-00-00 00:00:00', 0, 1),
(3, 'weison', 'c90be6ee5df6128ccee1c56e7e253b97', '513667682@qq.com', 'faa78dd03a52a1083efaa1c372f5fbd2', '2014-07-12 04:56:40', '2014-07-12 07:19:51', 0, 1);

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
