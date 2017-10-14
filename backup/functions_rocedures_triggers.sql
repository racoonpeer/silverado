/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  yyyaaazzz
 * Created: Jun 24, 2017
 */

DELIMITER $$

/**
 * Sync product kits
 */
DROP PROCEDURE IF EXISTS `sync_product_kits` $$
CREATE PROCEDURE `sync_product_kits`(productID INT(11))
BEGIN
    DECLARE isKit, hasKit INT DEFAULT 0;
    SELECT COUNT(*) INTO isKit FROM `catalog_kits` WHERE `pid`=productID;
    SELECT COUNT(*) INTO hasKit FROM `catalog_kits` WHERE `kid`=productID;
    UPDATE `ru_catalog` SET
            `is_kit` = IF(isKit > 0 AND hasKit = 0, 1, 0), 
            `has_kit` = IF(hasKit > 0 AND isKit = 0, 1, 0) 
            WHERE `id`=productID;
END $$

/**
 * After insert comment
 */
DROP TRIGGER IF EXISTS `comments_ai` $$
CREATE TRIGGER `comments_ai` 
AFTER INSERT
    ON `comments`
    FOR EACH ROW
BEGIN
    UPDATE `ru_catalog` SET 
            `comments_count`=(SELECT COUNT(*) FROM `comments` c WHERE c.`pid`=NEW.`pid` AND c.`active`>0 AND c.`isnew`=0),
            `rating`=(SELECT AVG(`rating`) FROM `comments` c WHERE c.`pid`=NEW.`pid` AND c.`active`>0 AND c.`isnew`=0) 
            WHERE `id`=NEW.`pid`;
END $$

/**
 * After update comment
 */
DROP TRIGGER IF EXISTS `comments_au` $$
CREATE TRIGGER `comments_au`
AFTER UPDATE
    ON `comments`
    FOR EACH ROW
BEGIN
    UPDATE `ru_catalog` SET 
            `comments_count`=(SELECT COUNT(*) FROM `comments` c WHERE c.`pid`=NEW.`pid` AND c.`active`>0 AND c.`isnew`=0),
            `rating`=(SELECT AVG(`rating`) FROM `comments` c WHERE c.`pid`=NEW.`pid` AND c.`active`>0 AND c.`isnew`=0) 
            WHERE `id`=NEW.`pid`;
END $$

/**
 * After delete comment
 */
DROP TRIGGER IF EXISTS `comments_ad` $$
CREATE TRIGGER `comments_ad`
AFTER DELETE
    ON `comments`
    FOR EACH ROW
BEGIN
    UPDATE `ru_catalog` SET 
            `comments_count`=(SELECT COUNT(*) FROM `comments` c WHERE c.`pid`=OLD.`pid` AND c.`active`>0 AND c.`isnew`=0),
            `rating`=(SELECT AVG(`rating`) FROM `comments` c WHERE c.`pid`=OLD.`pid` AND c.`active`>0 AND c.`isnew`=0) 
            WHERE `id`=OLD.`pid`;
END $$

DELIMITER ;