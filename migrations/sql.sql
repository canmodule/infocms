INSERT INTO `wp_calligrapher`(`name`, `title`, `description`, `dynasty`, `extfield`)
SELECT `name`, `name`, `introduction`, `dynasty_id`, `pic` FROM `wp_calligrapherbak`;

INSERT INTO `wp_calligrapher`(`name`, `title`, `description`, `dynasty`, `extfield`, `extfield2`)
SELECT `name`, `name`, `description`, `dynasty`, `extfield`, `id` FROM `wp_calligrapherfull` WHERE `id` > 185;

CREATE TABLE `wp_calligrapher` (
      `id` int(11) NOT NULL,
      `name` varchar(255) NOT NULL DEFAULT '' COMMENT '作者名字',
      `is_use` tinyint(1) DEFAULT '0' COMMENT '是否使用 0:使用1停用',
      `created_time` int(11) DEFAULT NULL COMMENT '添加时间',
      `sort` int(11) DEFAULT '0' COMMENT '排序',
      `dynasty_id` int(11) DEFAULT NULL COMMENT '朝代id',
      `pic` varchar(255) DEFAULT NULL COMMENT '作者头像',
      `introduction` text COMMENT '作者简介',
      `status` tinyint(1) DEFAULT '0' COMMENT '是否推荐0:不是1:是'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `wp_calligrapher`
  ADD PRIMARY KEY (`id`);


CREATE TABLE `wp_calligrapher` (
      `id` int(10) NOT NULL COMMENT 'ID',
      `code` varchar(500) NOT NULL DEFAULT '' COMMENT '代码',
      `title` varchar(200) NOT NULL DEFAULT '' COMMENT '标题',
      `name` varchar(500) NOT NULL DEFAULT '' COMMENT '第一名称',
      `nickname` varchar(200) NOT NULL DEFAULT '' COMMENT '第二名称',
      `name_full` varchar(200) NOT NULL DEFAULT '' COMMENT '全名',
      `description` varchar(2000) NOT NULL DEFAULT '' COMMENT '描述',
      `orderlist` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
      `birthday` varchar(100) NOT NULL DEFAULT '' COMMENT '出生日期',
      `deathday` varchar(100) NOT NULL DEFAULT '' COMMENT '逝世日期',
      `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '书法家';
ALTER TABLE `wp_calligrapher`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `wp_calligrapher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID';
