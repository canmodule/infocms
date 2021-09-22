SELECT * FROM `wp_rubbing` AS `r`, (SELECT `rubbing_id`, COUNT(*) AS `count` FROM `wp_rubbing_detail` GROUP BY `rubbing_id`) AS `rd` WHERE `r`.`id` = `rd`.`rubbing_id` ;
UPDATE `wp_rubbing` AS `r`, (SELECT `rubbing_id`, COUNT(*) AS `count` FROM `wp_rubbing_detail` GROUP BY `rubbing_id`) AS `rd` SET `r`.`status` = `rd`.`count` WHERE `r`.`extfield2` = `rd`.`rubbing_id` ;


INSERT INTO `wp_rubbing` (`name`, `title`, `calligrapher`, `dynasty`, `calligraphy_style`, `orderlist`, `page_number`, `word_number`, `description`, `grid_color`, `original`, `clarity`, `width`, `height`, `is_original`, `status`, `created_at`, `updated_at`, `extfield`, `extfield2`) 
SELECT `ru_title`, `app_title`, `ru_auther`, `ru_dynasty`, `chirography`, `sort`, `page`, `words_num`, `introduce`, `mi_color`, `original`, `clarity`, `wide`, `high`, `is_original`, `status`, FROM_UNIXTIME(`create_time`), FROM_UNIXTIME(`update_time`), `pic`, `id` FROM `wp_rubbingfull`;


INSERT INTO `wp_calligrapher`(`name`, `title`, `description`, `dynasty`, `extfield`) SELECT `name`, `name`, `introduction`, `dynasty_id`, `pic` FROM `wp_calligrapherbak`;

INSERT INTO `wp_calligrapher`(`name`, `title`, `description`, `dynasty`, `extfield`, `extfield2`) SELECT `name`, `name`, `description`, `dynasty`, `extfield`, `id` FROM `wp_calligrapherfull`;

INSERT INTO `wp_rubbing_detail` (`name`, `orderlist`, `word_number`, `width`, `height`, `is_original`, `extfield`, `extfield2`) VALUES  
SELECT `pic_file_name`, `sort`, `words_num`, `wide`, `high`, `is_original`, `pic`, `rubbing_id` FROM `wp_rubbing_detailfull`;

UPDATE `wp_rubbing` AS `r`, `wp_rubbing_detail` AS `rd` SET `rd`.`rubbing_id` = `r`.`id`, `rd`.`created_at` = `r`.`created_at`, `rd`.`updated_at` = `r`.`updated_at` WHERE `r`.`extfield2` = `rd`.`extfield2`;


CREATE TABLE `wp_rubbing_detail` (
      `id` int(11) NOT NULL COMMENT 'ID',
      `rubbing_id` int(11) NOT NULL DEFAULT '0' COMMENT '碑帖ID',
      `name` varchar(255) NOT NULL DEFAULT '' COMMENT '图片名称',
      `orderlist` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
      `word_number` int(11) DEFAULT '0' COMMENT '字数',
      `width` int(11) DEFAULT NULL COMMENT '宽',
      `height` int(11) DEFAULT NULL COMMENT '高',
      `is_original` tinyint(1) DEFAULT '0' COMMENT '是否原图',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
      `extfield` varchar(255) DEFAULT NULL COMMENT '附加字段',
      `extfield2` varchar(255) DEFAULT NULL COMMENT '附加字段2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '碑帖详情';
ALTER TABLE `wp_rubbing_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rubbing_id` (`rubbing_id`),
  ADD KEY `sort` (`sort`);
ALTER TABLE `wp_rubbing_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
