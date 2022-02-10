-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-02-10 15:32:44
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
-- 表的结构 `wp_auth_permission`
--

CREATE TABLE `wp_auth_permission` (
  `code` varchar(100) NOT NULL DEFAULT '' COMMENT '菜单代码',
  `resource_code` varchar(100) NOT NULL DEFAULT '' COMMENT '资源代码',
  `parent_code` varchar(100) NOT NULL DEFAULT '' COMMENT '父菜单代码',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '名称',
  `app` varchar(20) NOT NULL DEFAULT '' COMMENT '所属应用',
  `controller` varchar(100) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(100) NOT NULL DEFAULT '' COMMENT '方法',
  `method` varchar(100) NOT NULL DEFAULT '' COMMENT '请求方法',
  `route` varchar(100) NOT NULL DEFAULT '' COMMENT '接口路由',
  `route_path` varchar(200) DEFAULT '' COMMENT '路由路径',
  `orderlist` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '0' COMMENT '显示类型',
  `icon` varchar(30) NOT NULL DEFAULT '' COMMENT '图标',
  `extparam` varchar(256) NOT NULL DEFAULT '' COMMENT '附加参数',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='操作权限';

--
-- 转存表中的数据 `wp_auth_permission`
--

INSERT INTO `wp_auth_permission` (`code`, `resource_code`, `parent_code`, `name`, `app`, `controller`, `action`, `method`, `route`, `route_path`, `orderlist`, `display`, `icon`, `extparam`, `created_at`, `updated_at`) VALUES
('infocms', '', '', 'CMS系统', 'infocms', '', '', '', '', '', 800, 1, 'nested', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_article_add', 'article', 'infocms_guide', '添加资讯', 'infocms', 'article', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_article_delete', 'article', 'infocms_guide', '删除', 'infocms', 'article', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_article_listinfo', 'article', 'infocms_guide', '资讯管理', 'infocms', 'article', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_article_update', 'article', 'infocms_guide', '编辑', 'infocms', 'article', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_article_view', 'article', 'infocms_guide', '查看', 'infocms', 'article', 'view', 'get', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_brand_add', 'brand', 'infocms_goodsbase', '添加品牌', 'infocms', 'brand', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_brand_delete', 'brand', 'infocms_goodsbase', '删除', 'infocms', 'brand', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_brand_listinfo', 'brand', 'infocms_goodsbase', '品牌管理', 'infocms', 'brand', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_brand_update', 'brand', 'infocms_goodsbase', '编辑', 'infocms', 'brand', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_brand_view', 'brand', 'infocms_goodsbase', '查看', 'infocms', 'brand', 'view', 'get', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_category_add', 'category', 'infocms_goodsbase', '添加商品分类', 'infocms', 'category', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_category_delete', 'category', 'infocms_goodsbase', '删除', 'infocms', 'category', 'delete', 'delete', '/categories/{code}', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_category_listinfo', 'category', 'infocms_goodsbase', '商品分类管理', 'infocms', 'category', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_category_listtree', 'category', 'infocms_goodsbase', '商品分类（树状)', 'infocms', 'category', 'listinfo-tree', 'get', '', 'listinfo/tree', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_category_update', 'category', 'infocms_goodsbase', '编辑', 'infocms', 'category', 'update', 'put', '/categories/{code}', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_goods', '', 'infocms', '商品', 'infocms', '', '', '', '', '', 900, 2, 'nested', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_goodsbase', '', 'infocms', '商品基本信息', 'infocms', '', '', '', '', '', 900, 2, 'nested', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_guide', '', 'infocms', '导购', 'infocms', '', '', '', '', '', 900, 2, 'nested', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_human_add', 'human', 'infocms_guide', '添加名人', 'infocms', 'human', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_human_delete', 'human', 'infocms_guide', '删除', 'infocms', 'human', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_human_listinfo', 'human', 'infocms_guide', '名人管理', 'infocms', 'human', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_human_update', 'human', 'infocms_guide', '编辑', 'infocms', 'human', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_knowledge_add', 'knowledge', 'infocms_guide', '添加知识', 'infocms', 'knowledge', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_knowledge_delete', 'knowledge', 'infocms_guide', '删除', 'infocms', 'knowledge', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_knowledge_listinfo', 'knowledge', 'infocms_guide', '知识管理', 'infocms', 'knowledge', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_knowledge_update', 'knowledge', 'infocms_guide', '编辑', 'infocms', 'knowledge', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_knowledge_view', 'knowledge', 'infocms_guide', '查看', 'infocms', 'knowledge', 'view', 'get', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet', '', 'infocms', '宠物', 'infocms', '', '', '', '', '', 900, 2, 'nested', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-article_add', 'pet-article', 'infocms_pet', '添加资讯', 'infocms', 'pet-article', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-article_delete', 'pet-article', 'infocms_pet', '删除', 'infocms', 'pet-article', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-article_listinfo', 'pet-article', 'infocms_pet', '资讯管理', 'infocms', 'pet-article', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-article_update', 'pet-article', 'infocms_pet', '编辑', 'infocms', 'pet-article', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-article_view', 'pet-article', 'infocms_pet', '查看', 'infocms', 'pet-article', 'view', 'get', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-infosort_add', 'pet-infosort', 'infocms_pet', '添加资讯类别', 'infocms', 'pet-infosort', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-infosort_delete', 'pet-infosort', 'infocms_pet', '删除', 'infocms', 'pet-infosort', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-infosort_listinfo', 'pet-infosort', 'infocms_pet', '资讯类别管理', 'infocms', 'pet-infosort', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-infosort_update', 'pet-infosort', 'infocms_pet', '编辑', 'infocms', 'pet-infosort', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-petsort_add', 'pet-petsort', 'infocms_pet', '添加宠物类别', 'infocms', 'pet-petsort', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-petsort_delete', 'pet-petsort', 'infocms_pet', '删除', 'infocms', 'pet-petsort', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-petsort_listinfo', 'pet-petsort', 'infocms_pet', '宠物类别管理', 'infocms', 'pet-petsort', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-petsort_update', 'pet-petsort', 'infocms_pet', '编辑', 'infocms', 'pet-petsort', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-sort_add', 'pet-sort', 'infocms_pet', '添加大栏目', 'infocms', 'pet-sort', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-sort_delete', 'pet-sort', 'infocms_pet', '删除', 'infocms', 'pet-sort', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-sort_listinfo', 'pet-sort', 'infocms_pet', '大栏目管理', 'infocms', 'pet-sort', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet-sort_update', 'pet-sort', 'infocms_pet', '编辑', 'infocms', 'pet-sort', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet_add', 'pet', 'infocms_pet', '添加宠物', 'infocms', 'pet', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet_delete', 'pet', 'infocms_pet', '删除', 'infocms', 'pet', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet_listinfo', 'pet', 'infocms_pet', '宠物管理', 'infocms', 'pet', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet_update', 'pet', 'infocms_pet', '编辑', 'infocms', 'pet', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_pet_view', 'pet', 'infocms_pet', '查看', 'infocms', 'pet', 'view', 'get', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_product_add', 'product', 'infocms_goodsbase', '添加产品', 'infocms', 'product', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_product_delete', 'product', 'infocms_goodsbase', '删除', 'infocms', 'product', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_product_listinfo', 'product', 'infocms_goodsbase', '产品管理', 'infocms', 'product', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_product_update', 'product', 'infocms_goodsbase', '编辑', 'infocms', 'product', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_product_view', 'product', 'infocms_goodsbase', '查看', 'infocms', 'product', 'view', 'get', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_store_add', 'store', 'infocms_guide', '添加门店', 'infocms', 'store', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_store_delete', 'store', 'infocms_guide', '删除', 'infocms', 'store', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_store_listinfo', 'store', 'infocms_guide', '门店管理', 'infocms', 'store', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_store_update', 'store', 'infocms_guide', '编辑', 'infocms', 'store', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_subject_add', 'subject', 'infocms_guide', '添加主题', 'infocms', 'subject', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_subject_delete', 'subject', 'infocms_guide', '删除', 'infocms', 'subject', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_subject_listinfo', 'subject', 'infocms_guide', '主题管理', 'infocms', 'subject', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_subject_update', 'subject', 'infocms_guide', '编辑', 'infocms', 'subject', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_website_add', 'website', 'infocms_goodsbase', '添加商城', 'infocms', 'website', 'add', 'post', '', '', 0, 4, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_website_delete', 'website', 'infocms_goodsbase', '删除', 'infocms', 'website', 'delete', 'delete', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_website_listinfo', 'website', 'infocms_goodsbase', '商城管理', 'infocms', 'website', 'listinfo', 'get', '', '', 99, 3, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44'),
('infocms_website_update', 'website', 'infocms_goodsbase', '编辑', 'infocms', 'website', 'update', 'put', '', '', 0, 5, '', '', '2021-02-04 07:54:44', '2021-02-04 07:54:44');

--
-- 转储表的索引
--

--
-- 表的索引 `wp_auth_permission`
--
ALTER TABLE `wp_auth_permission`
  ADD PRIMARY KEY (`code`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
