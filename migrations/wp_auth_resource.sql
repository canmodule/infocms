-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-02-10 15:33:09
-- 服务器版本： 5.7.30-log
-- PHP 版本： 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `data_passport`
--

-- --------------------------------------------------------

--
-- 表的结构 `wp_auth_resource`
--

CREATE TABLE `wp_auth_resource` (
  `app` varchar(100) NOT NULL DEFAULT '' COMMENT '所属应用',
  `code` varchar(100) NOT NULL DEFAULT '' COMMENT '菜单代码',
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '名称',
  `controller` varchar(100) NOT NULL DEFAULT '' COMMENT '控制器',
  `request` varchar(100) NOT NULL DEFAULT '' COMMENT '请求',
  `model` varchar(100) NOT NULL DEFAULT '' COMMENT '模型',
  `service` varchar(100) NOT NULL DEFAULT '' COMMENT '服务',
  `repository` varchar(100) NOT NULL DEFAULT '' COMMENT '资源',
  `resource` varchar(100) NOT NULL DEFAULT '' COMMENT '输出数据',
  `collection` varchar(100) NOT NULL DEFAULT '' COMMENT '数据集',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='资源';

--
-- 转存表中的数据 `wp_auth_resource`
--

INSERT INTO `wp_auth_resource` (`app`, `code`, `name`, `controller`, `request`, `model`, `service`, `repository`, `resource`, `collection`, `created_at`, `updated_at`) VALUES
('infocms', 'article', '资讯', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'attachment', '文件资源', '1', '1', '1', '1', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'brand', '品牌', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'category', '信息类目', '1', '1', '1', '', '1', '1', '1', '2021-08-18 09:23:11', '2021-08-18 09:23:11'),
('infocms', 'human', '人物', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'knowledge', '知识', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'mall', '网店', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'pet', '宠物', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'pet-article', '宠物资讯', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'pet-infosort', '宠物资讯分类', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'pet-petsort', '宠物分类', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'pet-sort', '宠物大分类', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'product', '产品', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'redis', 'IRedis', '', '', '', '1', '', '', '', '2021-07-27 08:34:55', '2021-07-27 08:34:55'),
('infocms', 'store', '门店', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'subject', '专题', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00'),
('infocms', 'website', '网店', '1', '1', '1', '', '1', '1', '1', '2021-02-04 07:54:00', '2021-02-04 07:54:00');

--
-- 转储表的索引
--

--
-- 表的索引 `wp_auth_resource`
--
ALTER TABLE `wp_auth_resource`
  ADD PRIMARY KEY (`app`,`code`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
