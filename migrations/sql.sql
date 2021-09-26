UPDATE `wp_rubbing_word` AS `w`, `wp_rubbing_detail` AS `d` SET `w`.`extfied2` = `d`.`extfied2` WHERE `w`.`extfield2` = 0 AND`w`.`extfied3` = `d`.`extfield3`;

INSERT INTO `wp_rubbing_word` (`name`, `word`, `orderlist`, `word_simple`, `spell`, `word_traditional`, `word_variant`, `description`, `created_at`, `updated_at`, `extfield`, `extfield2`, `extfield3`, `extfield4`) 
SELECT `pic_file_name`, `word_name`, `sort`, `simple_word`, `pinyin`, `traditional_word`, `variant_word`, `explain_word`, FROM_UNIXTIME(`create_time`), FROM_UNIXTIME(`update_time`), `pic`, `rubbing_id`, `page_id`, `id` FROM `wp_rubbing_wordbak`;


UPDATE `wp_rubbing_detail` AS `d`, `wp_rubbing_detailfull` AS `df` SET `d`.`extfield3` = `df`.`browse_num` WHERE `df`.`browse_num` > 0 AND `d`.`extfield` = `df`.`pic` AND `d`.`extfield2` = `df`.`rubbing_id` ;
UPDATE `wp_rubbing_detail` AS `d`, `wp_rubbing_detailfull` AS `df` SET `d`.`extfield3` = `df`.`id` WHERE `df`.`browse_num` = 0 AND `df`.`rubbing_id` != 649 AND `d`.`extfield` = `df`.`pic` AND `d`.`extfield2` = `df`.`rubbing_id` ;



SELECT * FROM `wp_rubbing` AS `r`, (SELECT `rubbing_id`, COUNT(*) AS `count` FROM `wp_rubbing_detail` GROUP BY `rubbing_id`) AS `rd` WHERE `r`.`id` = `rd`.`rubbing_id` ;
UPDATE `wp_rubbing` AS `r`, (SELECT `rubbing_id`, COUNT(*) AS `count` FROM `wp_rubbing_detail` GROUP BY `rubbing_id`) AS `rd` SET `r`.`status` = `rd`.`count` WHERE `r`.`extfield2` = `rd`.`rubbing_id` ;


INSERT INTO `wp_rubbing` (`name`, `title`, `calligrapher`, `dynasty`, `calligraphy_style`, `orderlist`, `page_number`, `word_number`, `description`, `grid_color`, `original`, `clarity`, `width`, `height`, `is_original`, `status`, `created_at`, `updated_at`, `extfield`, `extfield2`) 
SELECT `ru_title`, `app_title`, `ru_auther`, `ru_dynasty`, `chirography`, `sort`, `page`, `words_num`, `introduce`, `mi_color`, `original`, `clarity`, `wide`, `high`, `is_original`, `status`, FROM_UNIXTIME(`create_time`), FROM_UNIXTIME(`update_time`), `pic`, `id` FROM `wp_rubbingfull`;


INSERT INTO `wp_calligrapher`(`name`, `title`, `description`, `dynasty`, `extfield`) SELECT `name`, `name`, `introduction`, `dynasty_id`, `pic` FROM `wp_calligrapherbak`;

INSERT INTO `wp_calligrapher`(`name`, `title`, `description`, `dynasty`, `extfield`, `extfield2`) SELECT `name`, `name`, `description`, `dynasty`, `extfield`, `id` FROM `wp_calligrapherfull`;

INSERT INTO `wp_rubbing_detail` (`name`, `orderlist`, `word_number`, `width`, `height`, `is_original`, `extfield`, `extfield2`) VALUES  
SELECT `pic_file_name`, `sort`, `words_num`, `wide`, `high`, `is_original`, `pic`, `rubbing_id` FROM `wp_rubbing_detailfull`;

UPDATE `wp_rubbing` AS `r`, `wp_rubbing_detail` AS `rd` SET `rd`.`rubbing_id` = `r`.`id`, `rd`.`created_at` = `r`.`created_at`, `rd`.`updated_at` = `r`.`updated_at` WHERE `r`.`extfield2` = `rd`.`extfield2`;

