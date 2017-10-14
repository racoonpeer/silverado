DELIMITER $$

#
# Trigger "comments_ai"
#

DROP TRIGGER IF EXISTS `comments_ai` $$
CREATE TRIGGER `comments_ai`
    AFTER INSERT
    ON `comments`
    FOR EACH ROW
BEGIN
    UPDATE `ru_catalog` 
    SET `comments_count`=(SELECT COUNT(*) FROM `comments` c WHERE c.`pid`=NEW.`pid` AND c.`active`>0 AND c.`isnew`=0) 
    WHERE `id`=NEW.`pid`;
END $$

#
# Trigger "comments_au"
#

DROP TRIGGER IF EXISTS `comments_au` $$
CREATE TRIGGER `comments_au`
    AFTER UPDATE
    ON `comments`
    FOR EACH ROW
BEGIN
    UPDATE `ru_catalog` 
    SET `comments_count`=(SELECT COUNT(*) FROM `comments` c WHERE c.`pid`=NEW.`pid` AND c.`active`>0 AND c.`isnew`=0) 
    WHERE `id`=NEW.`pid`;
END $$

#
# Trigger "comments_ad"
#

DROP TRIGGER IF EXISTS `comments_ad` $$
CREATE TRIGGER `comments_ad`
    AFTER DELETE
    ON `comments`
    FOR EACH ROW
BEGIN
    UPDATE `ru_catalog` 
    SET `comments_count`=(SELECT COUNT(*) FROM `comments` c WHERE c.`pid`=OLD.`pid` AND c.`active`>0 AND c.`isnew`=0) 
    WHERE `id`=OLD.`pid`;
END $$

#
# Trigger "comments_ad"
#

DROP TRIGGER IF EXISTS `order_products_ai` $$
CREATE TRIGGER `order_products_ai`
    AFTER DELETE
    ON `order_products`
    FOR EACH ROW
BEGIN
    UPDATE `ru_catalog` 
    SET `popularity`=(SELECT COUNT(*) FROM `order_products` op WHERE op.`pid`=NEW.`pid`) 
    WHERE `id`=NEW.`pid`;
END $$

DELIMITER ;