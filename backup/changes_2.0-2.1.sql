-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
-- РћР±СЏР·Р°С‚РµР»СЊРЅРѕ СЃС‚Р°РІРёРј РґР°С‚Сѓ. 
-- РћРґРёРЅ Р±Р»РѕРє Р·Р°РїРёСЃРµР№ - СЌС‚Рѕ: 
-- 	* РёР·РјРµРЅРµРЅРёСЏ РєРѕС‚РѕСЂС‹Рµ Р±С‹Р»Рё РїСЂРѕРёР·РІРµРґРµРЅС‹ РѕС‚ РѕРґРЅРѕР№ РІС‹РєР°С‡РєРё РЅР° SVN Рє РґСЂСѓРіРѕР№.
-- 	* РїСЂРё РєРѕРїРёСЂРѕРІР°РЅРёРё Р·Р°РїРёСЃРµР№ Рё РїСЂРёРјРµРЅРµРЅРёРё - РЅРµ РІС‹Р·С‹РІР°Р»Рѕ РѕС€РёР±РѕРє
-- 	* РІРєР»СЋС‡Р°СЋС‚ РІ СЃРµР±СЏ РІСЃРµ СЏР·С‹РєРѕРІС‹Рµ РІРµСЂСЃРёРё СЃР°Р№С‚Р°
-- 	* РїРѕСЃР»Рµ РґР°С‚С‹ РІ СЌС‚РѕРј Р±Р»РѕРєРµ РїРёС€РµРј РѕРїРёСЃР°РЅРёРµ РёР·РјРµРЅРµРЅРёР№ РµСЃР»Рё РЅСѓР¶РЅРѕ
-- 	* РµСЃР»Рё РЅР°Рґ РїСЂРѕРµРєС‚РѕРј С‚СЂСѓРґРёС‚СЃСЏ Р±РѕР»СЊС€Рµ РѕРґРЅРѕРіРѕ РїСЂРѕРіСЂР°РјРјРёСЃС‚Р°:
-- 	 	- РїСЂРµРґС‹РґСѓС‰РёРµ РІС‹РєР°С‡РµРЅРЅС‹Рµ Р·Р°РїРёСЃРё РЅРµ СѓРґР°Р»СЏС‚СЊ Рё РЅРµ РёР·РјРµРЅСЏС‚СЊ
-- 	 	- РїРёСЃР°С‚СЊ РЅРѕРІС‹Рµ Р·Р°РїРёСЃРё СЃ СѓС‡РµС‚РѕРј РІС‹РіСЂСѓР¶РµРЅРЅС‹С… СЂР°РЅРµРµ
-- =====================================================================================



-- -----------------------------------------------------------------------------
-- 15.12.2015
-- РґРѕР±Р°РІР»РµРЅРёРµ РїРѕР»СЏ СЃРµРѕРїСѓС‚РµР№ РІ Р·РЅР°С‡РµРЅРёСЏ Р°С‚СЂРёР±СѓС‚РѕРІ
-- -----------------------------------------------------------------------------
ALTER TABLE `product_options` ADD `required` tinyint(1) unsigned NOT NULL DEFAULT '0' AFTER `pid`;
ALTER TABLE `en_attributes_values` ADD `seo_path` varchar(255) NOT NULL DEFAULT '' AFTER `image`;
ALTER TABLE `ua_attributes_values` ADD `seo_path` varchar(255) NOT NULL DEFAULT '' AFTER `image`;
ALTER TABLE `ru_attributes_values` ADD `seo_path` varchar(255) NOT NULL DEFAULT '' AFTER `image`;
-- ----------------------------------------------------------------------------- СЃРґРµР»Р°РЅРѕ



-- -----------------------------------------------------------------------------
-- 18.12.2015
-- РѕРїС†РёРё С‚РѕРІР°СЂРѕРІ
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `ru_options_values`;
CREATE TABLE IF NOT EXISTS `ru_options_values` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Option ID',
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `order` int(11) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_oid` (`option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COMMENT='Product Options Values';

DROP TABLE IF EXISTS `en_options_values`;
CREATE TABLE IF NOT EXISTS `en_options_values` LIKE `ru_options_values`;

DROP TABLE IF EXISTS `ua_options_values`;
CREATE TABLE IF NOT EXISTS `ua_options_values`  LIKE `ru_options_values`;

DROP TABLE IF EXISTS `product_options_values`;
CREATE TABLE IF NOT EXISTS `product_options_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'ID Product',
  `option_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'ID Option',
  `value_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'ID Option Value',
  `operator` char(1) NOT NULL DEFAULT '+' COMMENT 'Price Operator',
  `price` float unsigned NOT NULL DEFAULT '0' COMMENT 'Option Value Price',
  `primary` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Primary Option',
  `order` int(11) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_pid` (`product_id`),
  KEY `idx_oid` (`option_id`),
  KEY `idx_vid` (`value_id`),
  KEY `idx_primary` (`primary`),
  KEY `idx_order` (`order`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COMMENT='Р—РЅР°С‡РµРЅРёСЏ РѕРїС†РёР№ С‚РѕРІР°СЂРѕРІ';
-- -----------------------------------------------------------------------------



-- -----------------------------------------------------------------------------
-- 21.12.2015
-- РґРѕР±Р°РІР»РµРЅРёРµ РІ РЅР°СЃС‚СЂРѕР№РєРё РІРѕР·РјРѕР¶РЅРѕСЃС‚Рё СѓРїСЂР°РІР»РµРЅРёСЏ СЃРµРѕРїСѓС‚СЏРјРё РґР»СЏ РїСЂРѕРІРµСЂРєРё СѓРЅРёРєР°Р»СЊРЅРѕСЃС‚Рё
-- -----------------------------------------------------------------------------
ALTER TABLE `modules_params`  ADD `seotable` VARCHAR(50) NOT NULL DEFAULT '' COMMENT 'РўР°Р±Р»РёС†Р° c СЃРµРѕРїСѓС‚РµРј. РљРѕРЅСЃС‚Р°РЅС‚С‹' AFTER `short_title`
    ,  ADD `seogroup` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'РЈРЅРёРєР°Р»СЊРЅС‹Р№ СЃРµРѕРїСѓС‚СЊ: 0-РЅРµС‚, 1-РµСЃС‚СЊ' AFTER `seotable`
    , CHANGE `images` `images` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'РќР°СЃС‚СЂРѕР№РєРё РёР·РѕР±СЂР°Р¶РµРЅРёР№: 0-РЅРµС‚, 1-РµСЃС‚СЊ'
    , CHANGE `access` `access` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'РќР°СЃС‚СЂРѕР№РєРё РґРѕСЃС‚СѓРїРѕРІ: 0-РЅРµС‚, 1-РµСЃС‚СЊ'
    , CHANGE `history` `history` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'РЎРѕС…СЂР°РЅСЏС‚СЊ РёСЃС‚РѕСЂРёСЋ: 0-РЅРµС‚, 1-РґР°'
    , CHANGE `menu` `menu` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'РћС‚РѕР±СЂР°Р¶Р°С‚СЊ РІ РјРµРЅСЋ: 0-РЅРµС‚, 1-РґР°'
    , CHANGE `order` `order` INT(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'РЎРѕСЂС‚РёСЂРѕРІРєР° РјРѕРґСѓР»РµР№'
;
UPDATE `modules_params` SET `seotable` = 'MAIN_TABLE',`seogroup`='1' WHERE `module`='main';
UPDATE `modules_params` SET `seotable` = 'BRANDS_TABLE',`seogroup`='1' WHERE `module`='brands';
UPDATE `modules_params` SET `seotable` = 'CATALOG_TABLE',`seogroup`='1' WHERE `module`='catalog';
UPDATE `modules_params` SET `seotable` = 'ATTRIBUTES_VALUES_TABLE',`seogroup`='1' WHERE `module`='attributes';
UPDATE `modules_params` SET `seotable` = 'GALLERY_TABLE',`seogroup`='1' WHERE `module`='gallery';
UPDATE `modules_params` SET `seotable` = 'NEWS_TABLE',`seogroup`='1' WHERE `module`='news';
UPDATE `modules_params` SET `seotable` = 'VIDEOS_TABLE',`seogroup`='1' WHERE `module`='video';
-- РїСЂРѕСЃС‚Р°РІР»РµРЅРёРµ РєРѕСЂСЂРµРєС‚РЅРѕР№ СЃРѕСЂС‚РёСЂРѕРІРєРё РґР»СЏ СЃСѓС‰РµСЃС‚РІСѓСЋС‰РёС… Р·Р°РїРёСЃРµР№
DROP TABLE IF EXISTS `__tmp_modules_params_order`;
CREATE TABLE IF NOT EXISTS `__tmp_modules_params_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
INSERT INTO `__tmp_modules_params_order` (`id`, `module`)
SELECT NULL `id`, `module` FROM `modules_params` ORDER BY `order` ASC;
UPDATE `modules_params` t JOIN `__tmp_modules_params_order` tt ON tt.`module`=t.`module` SET t.`order`=tt.`id`;
DROP TABLE IF EXISTS `__tmp_modules_params_order`;
-- -----------------------------------------------------------------------------



-- -----------------------------------------------------------------------------
-- 23.12.2015
-- СЃРёРЅС…СЂРѕРЅРёР·Р°С†РёСЏ С‚Р°Р±Р»РёС† Р‘Р”
-- -----------------------------------------------------------------------------
UPDATE `ua_main` SET `module`='news' WHERE `id`='72';
UPDATE `en_main` SET `module`='news' WHERE `id`='72';
UPDATE `ua_main` SET `module`='gallery' WHERE `id`='73';
UPDATE `en_main` SET `module`='gallery' WHERE `id`='73';
UPDATE `ua_main` SET `module`='video' WHERE `id`='74';
UPDATE `en_main` SET `module`='video' WHERE `id`='74';

TRUNCATE `en_attributes_values`;
INSERT INTO `en_attributes_values` (`id`, `aid`, `title`, `image`, `seo_path`, `order`)
SELECT `id`, `aid`, `title`, `image`, `seo_path`, `order` FROM `ru_attributes_values`;
TRUNCATE `ua_attributes_values`;
INSERT INTO `ua_attributes_values` (`id`, `aid`, `title`, `image`, `seo_path`, `order`)
SELECT `id`, `aid`, `title`, `image`, `seo_path`, `order` FROM `ru_attributes_values`;

TRUNCATE `en_options_values`;
INSERT INTO `en_options_values` (`id`, `option_id`, `title`, `image`, `order`)
SELECT `id`, `option_id`, `title`, `image`, `order` FROM `ru_options_values`;
TRUNCATE `ua_options_values`;
INSERT INTO `ua_options_values` (`id`, `option_id`, `title`, `image`, `order`)
SELECT `id`, `option_id`, `title`, `image`, `order` FROM `ru_options_values`;

TRUNCATE `en_product_attribute`;
INSERT INTO `en_product_attribute` (`id`, `aid`, `pid`, `value`, `alias`, `created`, `modified`)
SELECT `id`, `aid`, `pid`, `value`, `alias`, `created`, `modified` FROM `ru_product_attribute`;
TRUNCATE `ua_product_attribute`;
INSERT INTO `ua_product_attribute` (`id`, `aid`, `pid`, `value`, `alias`, `created`, `modified`)
SELECT `id`, `aid`, `pid`, `value`, `alias`, `created`, `modified` FROM `ru_product_attribute`;

TRUNCATE `en_filters`;
INSERT INTO `en_filters` (`id`, `tid`, `aid`, `title`, `order`, `created`, `modified`)
SELECT `id`, `tid`, `aid`, `title`, `order`, `created`, `modified` FROM `ru_filters`;
TRUNCATE `ua_filters`;
INSERT INTO `ua_filters` (`id`, `tid`, `aid`, `title`, `order`, `created`, `modified`)
SELECT `id`, `tid`, `aid`, `title`, `order`, `created`, `modified` FROM `ru_filters`;

TRUNCATE `en_options`;
INSERT INTO `en_options` (`id`, `type_id`, `title`, `stitle`, `descr`, `image`, `order`, `basket`, `active`, `created`, `modified`)
SELECT `id`, `type_id`, `title`, `stitle`, `descr`, `image`, `order`, `basket`, `active`, `created`, `modified` FROM `ru_options`;
TRUNCATE `ua_options`;
INSERT INTO `ua_options` (`id`, `type_id`, `title`, `stitle`, `descr`, `image`, `order`, `basket`, `active`, `created`, `modified`)
SELECT `id`, `type_id`, `title`, `stitle`, `descr`, `image`, `order`, `basket`, `active`, `created`, `modified` FROM `ru_options`;

DROP TABLE IF EXISTS `related_category`;

TRUNCATE `en_catalogfiles`;
INSERT INTO `en_catalogfiles` (`id`, `pid`, `title`, `filename`, `fileorder`, `isdefault`, `active`)
SELECT `id`, `pid`, `title`, `filename`, `fileorder`, `isdefault`, `active` FROM `ru_catalogfiles`;
TRUNCATE `ua_catalogfiles`;
INSERT INTO `ua_catalogfiles` (`id`, `pid`, `title`, `filename`, `fileorder`, `isdefault`, `active`)
SELECT `id`, `pid`, `title`, `filename`, `fileorder`, `isdefault`, `active` FROM `ru_catalogfiles`;

ALTER TABLE `category_filters` CHANGE `type` `type` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1 - default list; 2 - seo settings';
-- -----------------------------------------------------------------------------



-- -----------------------------------------------------------------------------
-- 23.12.2015
-- РїСЂРѕРёР·РІРѕРґРёРј СЃРµРѕ СѓРЅРёС„РёРєР°С†РёСЋ РїСѓС‚РµР№
-- -----------------------------------------------------------------------------
-- СЃРѕР·РґР°РµРј РѕС‚РґРµР»СЊРЅСѓСЋ С‚Р°Р±Р»РёС†Сѓ РґР»СЏ РІСЃРµС… СЃСѓС‰РµСЃС‚РІСѓСЋС‰РёС… СЃРµРѕРїСѓС‚РµР№ 
DROP TABLE IF EXISTS `__tmp_unique_seopathes`;
CREATE TABLE IF NOT EXISTS `__tmp_unique_seopathes` (
  `seopath` varchar(255) NOT NULL,
  `tblname` varchar(100) NOT NULL,
  `modname` varchar(100) NOT NULL,
  `rowid` int(11) NOT NULL,
  `cnt` int(11) NOT NULL DEFAULT '0',
  `usedmods` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`seopath`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
-- Р’СЃС‚Р°РІР»СЏРµРј РІРЅР°С‡Р°Р»Рµ РёР· ru_main
INSERT INTO `__tmp_unique_seopathes`
SELECT `seo_path` `seopath`, 'ru_main' `tblname`, 'main' `modname`, `id` `rowid`, '1' `cnt`, '' `usedmods` 
FROM `ru_main` WHERE `seo_path`<>'' GROUP BY `id`, `seo_path`;
-- Р·Р°РїРѕР»РЅСЏРµРј РЅСѓР¶РЅС‹РјРё Р·РЅР°С‡РµРЅРёСЏРјРё
INSERT INTO `__tmp_unique_seopathes` (`seopath`, `tblname`, `modname`, `rowid`, `cnt`)
SELECT t.`seopath`, t.`tblname`, t.`modname`, t.`rowid`, '1' `cnt` FROM (
    SELECT `seo_path` `seopath`, 'ru_main' `tblname`, 'main' `modname`, `id` `rowid`, (0) `seq` FROM `ru_main` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ru_catalog' `tblname`, 'catalog' `modname`, `id` `rowid`, (1) `seq` FROM `ru_catalog` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ru_brands' `tblname`, 'brands' `modname`, `id` `rowid`, (2) `seq` FROM `ru_brands` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ru_news' `tblname`, 'news' `modname`, `id` `rowid`, (3) `seq` FROM `ru_news` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ru_gallery' `tblname`, 'gallery' `modname`, `id` `rowid`, (4) `seq` FROM `ru_gallery` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ru_videos' `tblname`, 'videos' `modname`, `id` `rowid`, (5) `seq` FROM `ru_videos` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ru_attributes_values' `tblname`, 'attributes_values' `modname`, `id` `rowid`, (6) `seq` FROM `ru_attributes_values` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ua_main' `tblname`, 'catalog' `modname`, `id` `rowid`, (10) `seq` FROM `ua_main` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ua_catalog' `tblname`, 'catalog' `modname`, `id` `rowid`, (11) `seq` FROM `ua_catalog` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ua_brands' `tblname`, 'brands' `modname`, `id` `rowid`, (12) `seq` FROM `ua_brands` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ua_news' `tblname`, 'news' `modname`, `id` `rowid`, (13) `seq` FROM `ua_news` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ua_gallery' `tblname`, 'gallery' `modname`, `id` `rowid`, (14) `seq` FROM `ua_gallery` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ua_videos' `tblname`, 'videos' `modname`, `id` `rowid`, (15) `seq` FROM `ua_videos` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'ua_attributes_values' `tblname`, 'attributes_values' `modname`, `id` `rowid`, (16) `seq` FROM `ua_attributes_values` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'en_main' `tblname`, 'catalog' `modname`, `id` `rowid`, (10) `seq` FROM `en_main` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'en_catalog' `tblname`, 'catalog' `modname`, `id` `rowid`, (11) `seq` FROM `en_catalog` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'en_brands' `tblname`, 'brands' `modname`, `id` `rowid`, (12) `seq` FROM `en_brands` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'en_news' `tblname`, 'news' `modname`, `id` `rowid`, (13) `seq` FROM `en_news` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'en_gallery' `tblname`, 'gallery' `modname`, `id` `rowid`, (14) `seq` FROM `en_gallery` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'en_videos' `tblname`, 'videos' `modname`, `id` `rowid`, (15) `seq` FROM `en_videos` WHERE `seo_path`<>'' UNION ALL
    SELECT `seo_path` `seopath`, 'en_attributes_values' `tblname`, 'attributes_values' `modname`, `id` `rowid`, (16) `seq` FROM `en_attributes_values` WHERE `seo_path`<>''
) t GROUP BY t.`seopath`, t.`modname`, t.`rowid` ORDER BY t.`seq`
ON DUPLICATE KEY UPDATE `cnt`=`cnt`+IF(`rowid`<>VALUES(`rowid`), 1, 0), `usedmods`=IF(`usedmods`='', VALUES(`modname`), IF(LOCATE(VALUES(`modname`), `usedmods`)>0, `usedmods`, CONCAT(`usedmods`, ',', VALUES(`modname`))));
-- СѓРґР°Р»СЏРµРј Р·Р°РїРёСЃРё РєРѕС‚РѕСЂС‹Рµ СѓРЅРёРєР°Р»СЊРЅС‹
DELETE FROM `__tmp_unique_seopathes` WHERE `cnt`<=1;
-- СЃРѕР·РґР°РµРј РїСЂРѕС†РµРґСѓСЂСѓ РґР»СЏ РІРёРґРѕРёР·РјРµРЅРµРЅРёР№ СЃРµРѕРїСѓС‚РµР№
DELIMITER $$
DROP PROCEDURE IF EXISTS `tmp_update_seopath`$$
CREATE PROCEDURE `tmp_update_seopath`()
BEGIN
 DECLARE done TINYINT(1) UNSIGNED DEFAULT 0;
 DECLARE iLn INT(11) UNSIGNED DEFAULT 0;
 DECLARE iPos INT(11) UNSIGNED DEFAULT 0;
 DECLARE iRowID INT(11) UNSIGNED DEFAULT 0;
 DECLARE sSeoPath VARCHAR(255) DEFAULT '';
 DECLARE sNewPath VARCHAR(255) DEFAULT '';
 DECLARE sModName VARCHAR(100) DEFAULT '';
 DECLARE sModNames VARCHAR(255) DEFAULT '';
 DECLARE cur CURSOR FOR SELECT seopath, rowid, usedmods FROM __tmp_unique_seopathes;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
 OPEN cur;
 read_loop: LOOP
   FETCH FROM cur INTO sSeoPath, iRowID, sModNames;

   IF done THEN 
     LEAVE read_loop;
   ELSE

    SET iLn = LENGTH(sModNames);
    SET iPos = iLn;

    WHILE iPos > 0 DO
      BEGIN

        SET iPos = LOCATE(',', sModNames);
        SET sNewPath = CONCAT(sSeoPath, '_', DATE_FORMAT(NOW(), '%y%m%d%H%i%s'));

        IF iPos = 0 THEN
            SET sModName = sModNames;
        ELSE 
            SET sModName = LEFT(sModNames, iPos-1);
            SET sModNames = TRIM(BOTH ',' FROM SUBSTRING(sModNames, iPos));
            SET iLn = LENGTH(sModNames);
        END IF;

        IF sModName='main' THEN
           UPDATE ru_main SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE ua_main SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE en_main SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
        ELSEIF sModName='catalog' THEN
           UPDATE ru_catalog SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE ua_catalog SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE en_catalog SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
        ELSEIF sModName='brands' THEN
           UPDATE ru_brands SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE ua_brands SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE en_brands SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
        ELSEIF sModName='news' THEN
           UPDATE ru_news SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE ua_news SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE en_news SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
        ELSEIF sModName='gallery' THEN
           UPDATE ru_gallery SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE ua_gallery SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE en_gallery SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
        ELSEIF sModName='videos' THEN
           UPDATE ru_videos SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE ua_videos SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE en_videos SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
        ELSEIF sModName='attributes_values' THEN
           UPDATE ru_attributes_values SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE ua_attributes_values SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
           UPDATE en_attributes_values SET seo_path=sNewPath WHERE `seo_path`=sSeoPath AND id<>iRowID;
        ELSE SET sModName='?';
        END IF;

      END;
    END WHILE;
  END IF;
 END LOOP read_loop;
 CLOSE cur;
END$$
DELIMITER ;
-- call to replace
CALL tmp_update_seopath();
-- delete temp data
DROP TABLE IF EXISTS `__tmp_unique_seopathes`;
DROP PROCEDURE IF EXISTS `tmp_update_seopath`;
-- -----------------------------------------------------------------------------



-- -----------------------------------------------------------------------------
-- 26.12.2015
-- РґРѕР±Р°РІР»РµРЅРёРµ С‚РёРїР° С„РёР»СЊС‚СЂР° РљР°С‚РµРіРѕСЂРёСЏ
-- -----------------------------------------------------------------------------
INSERT IGNORE INTO `en_filter_types` (`id`, `title`, `type`, `colname`) VALUES (5, 'Category', 'varchar', 'cid');
INSERT IGNORE INTO `ru_filter_types` (`id`, `title`, `type`, `colname`) VALUES (5, 'РљР°С‚РµРіРѕСЂРёСЏ', 'varchar', 'cid');
INSERT IGNORE INTO `en_filter_types` (`id`, `title`, `type`, `colname`) VALUES (5, 'РљР°С‚РµРіРѕСЂС–СЏ', 'varchar', 'cid');
-- РґРѕР±Р°РІР»РµРЅРёРµ РјРѕРґСѓР»СЏ РђРєС†РёРё
DROP TABLE IF EXISTS `ru_stocks`;
CREATE TABLE IF NOT EXISTS `ru_stocks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `descr` text,
  `fulldescr` text,
  `image` varchar(255) DEFAULT NULL,
  `relations` varchar(255) NOT NULL DEFAULT '',
  `meta_descr` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_robots` varchar(63) NOT NULL DEFAULT '',
  `seo_path` varchar(255) NOT NULL DEFAULT '',
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `order` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_title` (`title`),
  KEY `idx_rel` (`relations`),
  KEY `idx_order` (`order`),
  KEY `idx_active` (`active`),
  KEY `idx_start` (`date_start`),
  KEY `idx_end` (`date_end`),
  KEY `idx_created` (`created`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
DROP TABLE IF EXISTS `en_stocks`;
CREATE TABLE IF NOT EXISTS `en_stocks`  LIKE `ru_stocks`;
DROP TABLE IF EXISTS `ua_stocks`;
CREATE TABLE IF NOT EXISTS `ua_stocks`  LIKE `ru_stocks`;
-- РґРѕР±Р°РІР»РµРЅРёРµ Р·Р°РїРёСЃРё РІ РїР°СЂР°РјРµС‚СЂС‹ РјРѕРґСѓР»РµР№
INSERT INTO `modules_params` (`module`, `title`, `short_title`, `seotable`, `seogroup`, `images`, `access`, `history`, `menu`, `order`) VALUES
('stocks', 'РђРєС†РёРё', 'РђРєС†РёРё', 'STOCKS_TABLE', 1, 1, 1, 1, 1, 3);
-- РїСЂРѕСЃС‚Р°РІР»РµРЅРёРµ РєРѕСЂСЂРµРєС‚РЅРѕР№ СЃРѕСЂС‚РёСЂРѕРІРєРё РґР»СЏ СЃСѓС‰РµСЃС‚РІСѓСЋС‰РёС… Р·Р°РїРёСЃРµР№
DROP TABLE IF EXISTS `__tmp_modules_params_order`;
CREATE TABLE IF NOT EXISTS `__tmp_modules_params_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
INSERT INTO `__tmp_modules_params_order` (`id`, `module`)
SELECT NULL `id`, `module` FROM `modules_params` ORDER BY `order` ASC, `module`;
UPDATE `modules_params` t JOIN `__tmp_modules_params_order` tt ON tt.`module`=t.`module` SET t.`order`=tt.`id`;
DROP TABLE IF EXISTS `__tmp_modules_params_order`;
-- СѓРґР°Р»СЏРµРј СЂР°РЅРµРµ СЃРѕР·РґР°РЅРЅСѓСЋ С‚Р°Р±Р»РёС†Сѓ РїРѕ РѕС€РёР±РєРµ СЃ РґСЂСѓРіРёРј РёРјРµРЅРµРј
DROP TABLE IF EXISTS `ru_actions`, `en_actions`, `ua_actions`;
-- РґРѕР±Р°РІР»РµРЅРёРµ РїСЂРѕРїСѓС‰РµРЅРЅС‹С… РєРѕР»РѕРЅРѕРє РІ ua_main, en_main
ALTER TABLE `ru_main` 
  CHANGE `seo_text` `seo_text` text NOT NULL DEFAULT '',
  CHANGE `filter_seo_title` `filter_seo_title` varchar(255) NOT NULL DEFAULT '',
  CHANGE `filter_seo_text` `filter_seo_text` text NOT NULL DEFAULT '',
  CHANGE `filter_meta_descr` `filter_meta_descr` text NOT NULL DEFAULT '',
  CHANGE `filter_meta_key` `filter_meta_key` text NOT NULL DEFAULT '';
ALTER TABLE `ua_main` 
    ADD `seo_text` text NOT NULL DEFAULT '' AFTER `seo_title`,
    ADD `filter_seo_title` varchar(255) NOT NULL DEFAULT '' AFTER `seo_text`,
    ADD `filter_seo_text` text NOT NULL DEFAULT '' AFTER `filter_seo_title`,
    ADD `filter_meta_descr` text NOT NULL DEFAULT '' AFTER `filter_seo_text`,
    ADD `filter_meta_key` text NOT NULL DEFAULT '' AFTER `filter_meta_descr`;
ALTER TABLE `en_main` 
    ADD `seo_text` text NOT NULL DEFAULT '' AFTER `seo_title`,
    ADD `filter_seo_title` varchar(255) NOT NULL DEFAULT '' AFTER `seo_text`,
    ADD `filter_seo_text` text NOT NULL DEFAULT '' AFTER `filter_seo_title`,
    ADD `filter_meta_descr` text NOT NULL DEFAULT '' AFTER `filter_seo_text`,
    ADD `filter_meta_key` text NOT NULL DEFAULT '' AFTER `filter_meta_descr`;
-- -----------------------------------------------------------------------------



-- -----------------------------------------------------------------------------
-- 28.12.2015
-- Р”РѕР±Р°РІР»РµРЅРёРµ С‚Р°Р±Р»РёС†С‹ Р°РєС†РёРѕРЅРЅС‹С… С‚РѕРІР°СЂРѕРІ
-- -----------------------------------------------------------------------------
CREATE TABLE `stocks_related` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `rid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_pid` (`pid`),
  KEY `idx_rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=cp1251 COMMENT='Stocks relations';
-- ----------------------------------------------------------------------------- СЃРґРµР»Р°РЅРѕ
-- np_city ---------------------------------------------------------------------
DROP TABLE IF EXISTS `np_city`;
CREATE TABLE IF NOT EXISTS `np_city` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `city_id` int(11) NOT NULL DEFAULT '0',
    `ref` varchar(255) NOT NULL DEFAULT '',
    `title_ua` varchar(255) NOT NULL DEFAULT '',
    `title_ru` varchar(255) NOT NULL DEFAULT '',
    `area` varchar(255) NOT NULL DEFAULT '',
    `settlement_ua` varchar(255) NOT NULL DEFAULT '',
    `settlement_ru` varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`),
    KEY `idx_ref` (`ref`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=cp1251;
-- np_warehouse ----------------------------------------------------------------
DROP TABLE IF EXISTS `np_warehouse`;
CREATE TABLE IF NOT EXISTS `np_warehouse` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `ref` varchar(255) NOT NULL DEFAULT '',
    `type` varchar(255) NOT NULL DEFAULT '',
    `number` int(11) NOT NULL DEFAULT '0',
    `title_ua` varchar(255) NOT NULL DEFAULT '',
    `title_ru` varchar(255) NOT NULL DEFAULT '',
    `city_ref` varchar(255) NOT NULL DEFAULT '',
    `city_title_ua` varchar(255) NOT NULL DEFAULT '',
    `city_title_ru` varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`),
    KEY `idx_ref` (`city_ref`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=cp1251;


-- -----------------------------------------------------------------------------
-- ..2016
-- -----------------------------------------------------------------------------
-- -----------------------------------------------------------------------------



-- -----------------------------------------------------------------------------
-- ..2016
-- -----------------------------------------------------------------------------
-- -----------------------------------------------------------------------------



-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
-- =============================================================================

ALTER TABLE `ru_main` ADD `is_stock` TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER `essential`;
ALTER TABLE `ru_main` ADD `separate` TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER `is_stock`;
ALTER TABLE `ru_main` ADD `filter_title` VARCHAR(255) NOT NULL DEFAULT '' AFTER `seo_text`;