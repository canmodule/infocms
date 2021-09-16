SELECT * FROM `wp_rubbing` AS `r`, (SELECT `rubbing_id`, COUNT(*) AS `count` FROM `wp_rubbing_detail` GROUP BY `rubbing_id`) AS `rd` WHERE `r`.`id` = `rd`.`rubbing_id` ;
UPDATE `wp_rubbing` AS `r`, (SELECT `rubbing_id`, COUNT(*) AS `count` FROM `wp_rubbing_detail` GROUP BY `rubbing_id`) AS `rd` SET `r`.`status` = `rd`.`count` WHERE `r`.`extfield2` = `rd`.`rubbing_id` ;

UPDATE `wp_rubbing` AS `r`, (SELECT `rubbing_id`, COUNT(*) AS `count` FROM `wp_rubbing_detail` GROUP BY `rubbing_id`) AS `rd` SET `r`.`status` = `rd`.`count` WHERE `r`.`extfield2` = `rd`.`rubbing_id` ;


INSERT INTO `wp_rubbing` (`name`, `title`, `calligrapher`, `dynasty`, `calligraphy_style`, `orderlist`, `page_number`, `word_number`, `description`, `grid_color`, `original`, `clarity`, `width`, `height`, `is_original`, `status`, `created_at`, `updated_at`, `extfield`, `extfield2`) 
SELECT `ru_title`, `app_title`, `ru_auther`, `ru_dynasty`, `chirography`, `sort`, `page`, `words_num`, `introduce`, `mi_color`, `original`, `clarity`, `wide`, `high`, `is_original`, `status`, FROM_UNIXTIME(`create_time`), FROM_UNIXTIME(`update_time`), `pic`, `id` FROM `wp_rubbingfull`;


INSERT INTO `wp_calligrapher`(`name`, `title`, `description`, `dynasty`, `extfield`)
SELECT `name`, `name`, `introduction`, `dynasty_id`, `pic` FROM `wp_calligrapherbak`;

INSERT INTO `wp_calligrapher`(`name`, `title`, `description`, `dynasty`, `extfield`, `extfield2`)
SELECT `name`, `name`, `description`, `dynasty`, `extfield`, `id` FROM `wp_calligrapherfull` WHERE `id` > 185;



CREATE TABLE `wp_rubbing` (
      `id` int(11) NOT NULL,
      `code` varchar(100) NOT NULL DEFAULT '' COMMENT '代码',
      `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
      `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
      `auther` varchar(100) NOT NULL DEFAULT '' COMMENT '作者',
      `dynasty` varchar(30) NOT NULL DEFAULT '' COMMENT '朝代',
      `calligraphy_style` varchar(30) NOT NULL DEFAULT '' COMMENT '书体',
      `orderlist` int(11) NOT NULL DEFAULT '500' COMMENT '排序',
      `page_number` smallint(5) NOT NULL DEFAULT '0' COMMENT '页数',
      `word_number` smallint(5) NOT NULL DEFAULT '0' COMMENT '字数',
      `description` varchar(2000) NOT NULL DEFAULT '' COMMENT '简介',
      `grid_color` tinyint(1) NOT NULL DEFAULT '0' COMMENT '背景颜色',
      `original` varchar(5000) NOT NULL DEFAULT '' COMMENT '碑帖原文',
      `clarity` tinyint(1) NOT NULL DEFAULT '5' COMMENT '清晰度',
      `width` int(11) NOT NULL DEFAULT '0' COMMENT '宽',
      `height` int(11) NOT NULL DEFAULT '0' COMMENT '高',
      `is_original` varchar(100) NOT NULL DEFAULT '0.5' COMMENT '是否原图',
      `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
      `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
      `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
      `extfield` varchar(200) NOT NULL DEFAULT '' COMMENT '附加字段',
      `extfield2` varchar(100) NOT NULL DEFAULT '' COMMENT '附加字段'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT="碑帖";


欧阳询兰亭记====nnnnnn
祝允明楷书东坡游记====nnnnnn
文征明四体千字文====nnnnnn
沈度小楷赤壁赋====nnnnnn
续千字文====续千字文卷
文徵明书札册====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
冯承素书冯师英墓志铭====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
篆书陶公庙碑====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
边武草书千字文====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片处士石定墓志====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
欧阳询小楷千字文====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
旧金山阴符经====nnnnnn
欧阳询兰亭记====nnnnnn
右和王仲至少监咏桃花四首====nnnnnn
真草千字文-便利堂本====nnnnnn
前赤壁赋-民国拓本====nnnnnn
司马顕姿墓志====nnnnnn
司马昞====司马昞墓志
于右任_标准草书千字文====nnnnnn
吴昌硕_书法册页====nnnnnn
乾隆_乾隆皇帝行书册====nnnnnn
吴昌硕_篆书节临石鼓文====nnnnnn
赵构临兰亭序====nnnnnn
虞世南摹兰亭序卷====nnnnnn
朱耷书法册====nnnnnn
启功临苏轼诗文帖====nnnnnn
文征明归去来====nnnnnn
重修城隍庙碑记====重修城隍庙碑记（墨迹本）
五言诗====五言诗 郑板桥
郑板桥坡公小品册====nnnnnn
对联====兰亭序集字对联
弘一法师对联====nnnnnn
水墨花果写生册页自题====nnnnnn
弘一法师信系列====nnnnnn
信系列信封====nnnnnn
弘一法师信笺====nnnnnn
水墨花果写生册页自题====nnnnnn
水墨花果写生册页自题====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
图片====nnnnnn
启功临玄秘塔碑====nnnnnn
丧乱帖====丧乱帖（二玄社唐摹本）
王羲之兰亭序集字对联====nnnnnn
欧阳询楷书唐诗集字====nnnnnn
赵佶秾芳====nnnnnn

