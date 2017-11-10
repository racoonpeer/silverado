<?php

/**
 * WEBlife CMS
 * Created on 10.10.2011, 12:20:17
 * Developed by http://weblife.ua/
 */
defined('WEBlife') or die('Restricted access'); // no direct access

require(dirname(__FILE__).'/../classes/Cache.php');
require('CatalogHelper.php');

/**
 * Description of PHPHelper class
 * This class provides methods for help you to change php data, or do sumsing dunamicaly
 * You can add new methods for your needs
 * @author WebLife
 * @copyright 2011
 */
class PHPHelper {

    static $cache = NULL;
    
    public static function getCache() {
        if(self::$cache === NULL) {
            self::$cache = new CacheWL();
        } 
        return self::$cache;
    } 
    
    /**
     *
     * все выборки в каталоге 'название поля в базе' => название выборки
     */
    public $SELECTIONS = array(
        'is_new'   => LABEL_NEWEST, 
        'is_top'   => LABEL_POPULAR,
        'is_stock' => LABEL_STOCK
    );

    /**
     * Список сортировок
     * @var array
     */
    static $SORT_COLUMNS = array(
        '1' => array(
            'active' => true,
            'title'  => 'по умолчанию',
            'column' => '`shortcutsOrder`',
            'show'   => 0,
        ),
        '2' => array(
            'active' => false,
            'title' => 'от дешевых к дорогим',
            'column' => '`price` ASC',
            'show'   => 1,
        ),
        '3' => array(
            'active' => false,
            'title'  => 'от дорогих к дешевым',
            'column' => '`price` DESC',
            'show'   => 1,
        ),
        '4' => array(
            'active' => false,
            'title'  => 'акционные',
            'column' => '`is_stock` DESC, `discount` DESC, `price` DESC',
            'show'   => 1,
        )
    );

    /**
     * Список лимитов
     * @var array
     */
    static $LIMIT_COLUMNS = array(
        '12' => array(
            'active' => true,
            'show'   => 1,
        ),
        '24' => array(
            'active' => false,
            'show'   => 1,
        ),
        '48' => array(
            'active' => false,
            'show'   => 1,
        )
    );
    
    static $meta_template = "{filter_%s}";

    /**
     * <p>Функция clearModulesData - CLEAR CATEGORY MODULES DATA. <br/>
     * Данная информация должна соответсвовать данным из модуля админки при удалении елемента. <br/>
     *  ! $params обязательно нужно чтобы массив из модуля админки $arrPageData['images_params']; <br/>
     *  ! логика удаления была полностью скопирована в соответствующий case switchа с модуля в папке admin; <br/>
     *  ! путь к файлам модуля должен быть правильный;<br/>
     * </p>
     * 
     * @param int $id           идентификатор удаляемой категории
     * @param String $module    модуль категории, которую нужно удалить
     * @param String $filepath  путь папки с файлами данного модуля
     */
    public static function clearModulesData($id, $module, $filepath){
        // Получаем путь к файлам модуля
        $filepath = prepareDirPath($filepath);
        if(!$filepath) return;
            
        if($id AND $module){
            
            switch ($module) {

                case 'catalog': // CATALOG_TABLE
                    $items = getRowItems(CATALOG_TABLE, '`id`', "`cid` = $id ");

                    while($item = each($items)){
                        $itemID = $item['value']['id'];
                        PHPHelper::deleteProduct($itemID, $filepath, $filepath.$itemID.'/');         
                    }
                    //delete category atribute groups
                    deleteRecords(CATEGORY_ATTRIBUTE_GROUPS_TABLE, ' WHERE `cid`='.$id);  
                    //delete category atributes
                    deleteRecords(CATEGORY_ATTRIBUTES_TABLE, ' WHERE `cid`='.$id);
                    //delete category filters
                    deleteRecords(CATEGORY_FILTERS_TABLE, ' WHERE `cid`='.$id);
                    //update banners redirectid
                    updateRecords(BANNERS_TABLE, '`redirectid`=0', ' WHERE `redirectid`='.$id);
                    //update main redirectid
                    updateRecords(MAIN_TABLE, '`redirectid`=0', ' WHERE `redirectid`='.$id);
                    break;

                case 'gallery': // GALLERY_TABLE
                    $items  = getRowItems(GALLERY_TABLE, '`id`, `title`', "`cid` = $id ");
                    while($item = each($items)){
                        $itemID = $item['value']['id'];
                      //  unlinkImageLangsSynchronize($itemID, GALLERY_TABLE, $filepath, $params);
                        PHPHelper::deleteImages($itemID, $filepath, $module);
                        deleteFileFromDB_AllLangs($itemID, GALLERY_TABLE, 'filename', ' WHERE `id`='.$itemID, $filepath);
                        deleteDBLangsSync(GALLERY_TABLE, ' WHERE id='.$itemID);
                        foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                            ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, 'Удалено "'.$item['value']['title'].'"', $key, $item['value']['title'], 0, 'gallery');
                    } break;

                case 'news': // NEWS_TABLE
                    $items  = getRowItems(NEWS_TABLE, '`id`, `title`', "`cid` = $id ");
                    while($item = each($items)){
                        $itemID = $item['value']['id'];
                       // unlinkImageLangsSynchronize($itemID, NEWS_TABLE, $filepath, $params);
                        PHPHelper::deleteImages($itemID, $filepath, $module);
                        deleteDBLangsSync(NEWS_TABLE, ' WHERE id='.$itemID);
                        foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                            ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, 'Удалено "'.$item['value']['title'].'"', $key, $item['value']['title'], 0, 'news');              
                    } break;

                case 'video': // VIDEOS_TABLE
                    $items  = getRowItems(VIDEOS_TABLE, '`id`, `title`', "`cid` = $id ");
                    while($item = each($items)){
                        $itemID = $item['value']['id'];
                     //   unlinkImageLangsSynchronize($itemID, VIDEOS_TABLE, $filepath, $params);
                        PHPHelper::deleteImages($itemID, $filepath, $module);
                        deleteFileFromDB_AllLangs($itemID, VIDEOS_TABLE, 'filename', ' WHERE `id`='.$itemID, $filepath);
                        deleteDBLangsSync(VIDEOS_TABLE, ' WHERE id='.$itemID);
                        foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                            ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, 'Удалено "'.$item['value']['title'].'"', $key, $item['value']['title'], 0, 'video');
                    } break;
                    
                default: break;
            }
        }
    }
    
    public static function getLastWatched($UrlWL) {
        require_once('include/classes/Cookie.php');
        $Cookie         = new CCookie();
        $items          = array();
        if ($Cookie->isSetCookie('watched')) {
            $itemsIDX      = unserialize($Cookie->getCookie('watched'));            
            $items         = getRowItems(CATALOG_TABLE, '*', '`id` IN('.implode(',', $itemsIDX).')', 'FIND_IN_SET(id, "'.implode(',', $itemsIDX).'") DESC');
            $images_params = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="catalog"'));
            if (!empty($items)) {
                foreach ($items as $key => $item) {
                    $items[$key] = PHPHelper::getProductItem($item, $UrlWL, UPLOAD_URL_DIR.'catalog/', $images_params);
                }
            }
        }
        return $items;
    }
    
    public static function addToLastWatched($itemID) {
        require_once('include/classes/Cookie.php');
        $Cookie = new CCookie();
        $itemsIDX = array();
        if ($Cookie->isSetCookie('watched')) $itemsIDX = unserialize($Cookie->getCookie('watched'));
        if (!in_array($itemID, $itemsIDX))   array_push($itemsIDX, $itemID);
        $Cookie->add('watched', serialize($itemsIDX), time()+(3600*(24*7)));
        $Cookie->process();
    }

    public static function deleteImages($itemID, $files_path, $module) {
        $images_params = getRowItems(IMAGES_PARAMS_TABLE, '*', '`module`="'.$module.'"');
        foreach($images_params as $param) {
            $aliases = SystemComponent::prepareImagesParams($param['aliases']);
            if($param['ftable']) {
                unlinkImageLangsSynchronize($itemID, constant($param['ftable']), $files_path, $aliases, $param['column']);
                deleteRecords(constant($param['ftable']), 'WHERE `pid`='.$itemID);
            } else {
                unlinkImageLangsSynchronize($itemID, constant($param['ptable']), $files_path, $aliases, $param['column']);
            }
        }
    }
    
    public static function deleteProduct($itemID, $file_path, $catalog_files_path, $module='catalog') {
        if($itemID) {
            $title = getValueFromDB(CATALOG_TABLE, 'title', 'WHERE `id`='.$itemID);
            self::deleteImages($itemID, $file_path, $module);
            deleteFileFromDB_AllLangs($itemID, CATALOG_TABLE, 'filename', ' WHERE `id`='.$itemID, $file_path);
            $result = deleteDBLangsSync(CATALOG_TABLE, ' WHERE id='.$itemID);
            if (!$result) {
                return false;
            } elseif ($result) {
                foreach(SystemComponent::getAcceptLangs() as $key => $arLang) {
                    ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, 'Удалено "'.$title.'"', $key, $title, 0, $module);
                }
                removeDir($catalog_files_path);
                //delete shortcuts
                deleteRecords(SHORTCUTS_TABLE, ' WHERE `module`="catalog" AND `pid`='.$itemID);
                //delete attributes
                deleteDBLangsSync(PRODUCT_ATTRIBUTE_TABLE, ' WHERE `pid`='.$itemID);
                //delete related products
                deleteRecords(CATALOG_RELATED_TABLE, ' WHERE `pid`='.$itemID.' OR `rid`='.$itemID);
                //delete product comments
                deleteRecords(COMMENTS_TABLE, ' WHERE pid='.$itemID.' AND `module`="'.$module.'"'); 
                //delete product kits
                deleteRecords(CATALOG_KITS_TABLE, ' WHERE `pid`='.$itemID.' OR `kid`='.$itemID); 
                //delete selections
                deleteRecords(PRODUCT_SELECTIONS_TABLE, ' WHERE `pid`='.$itemID);
                //delete options
                deleteRecords(PRODUCT_OPTIONS_TABLE, ' WHERE `pid`='.$itemID);
                deleteRecords(PRODUCT_OPTIONS_VALUES_TABLE, ' WHERE `product_id`='.$itemID);
                return true;
            }
        }
    }
    /**
     * 
     * @param array $item
     * @param UrlWL $UrlWL
     * @param string $images_path
     * @param array $arAliases
     * @param boolean $inList
     * @param int $shortcutCid
     * @param string $module
     * @param boolean $isKitItem
     * @param array $selectedOptions
     * @return array
     */
    public static function getProductItem (array $item, UrlWL $UrlWL, $images_path, $arAliases, $inList=true, $shortcutCid=false, $module='catalog', $isKitItem = false, array $selectedOptions = array()) {
        if (!empty($item)) {
            // Set vars
            $item["is_new"]    *= 1;
            $item["is_top"]    *= 1;
            $item["is_stock"]  *= 1;
            $item['arCategory'] = $UrlWL->getCategoryById($item['cid']);
            $item['title']      = unScreenData($item['title']);
            $item['name']       = $item['title'].(!empty($item["pcode"]) ? " {$item["pcode"]}" : "");
            $item['descr']      = unScreenData($item['descr']);
            $item['fulldescr']  = unScreenData($item['fulldescr']);
            // item options
            $item['options']         = self::getProductOptions($item['id'], $selectedOptions);
            $item['selectedOptions'] = self::getSelectedOptions($item['options']);
            $item["idKey"]           = Basket::generateIdKey($item["id"], $item['selectedOptions']);
            // init product kits
            self::initProductKitItems($item, $UrlWL, $images_path, $arAliases, $inList);
            // Recalc Item price
            self::calcProductPrices ($item, !$isKitItem);
            $item["discount_price"]  = !empty($item["old_price"]) ? abs($item["price"]-$item["old_price"]) : 0;
            $item["discount_percent"]= !empty($item["old_price"]) ? abs(round((($item["price"]-$item["old_price"])/$item["old_price"])*100)) : 0;
            // get brand
            $item['arBrand']   = getItemRow(BRANDS_TABLE, '*', 'WHERE `id`='.$item['bid']);
            // get item attributes
            $item['attrGroups'] = self::getProductAttributes($item['id'], false, ($inList ? false : true), $shortcutCid);        
            // get images
            self::getProductImages($images_path, $item, $inList, 'image', $arAliases);
        }
        return $item;
    }
    /**
     * Get product kits & kit elements
     * @param array $item
     * @param UrlWL $UrlWL
     * @param string $images_path
     * @param array $arAliases
     * @param string $module
     */
    public static function initProductKitItems(&$item, UrlWL $UrlWL, $images_path, $arAliases, $list=false) {
        // set kits arrays
        $item['kits'] = $item['elements'] = array();
        if (!$list) {
            // Select product elements if product is kit
            if ($item["is_kit"]) {
                $query  = 'SELECT DISTINCT c.* FROM `'.CATALOG_TABLE.'` c ';
                $query .= 'LEFT JOIN `'.CATALOG_KITS_TABLE.'` ck ON(ck.`kid` = c.`id`) ';
                $query .= 'WHERE ck.`pid`='.$item['id'].' ';
                $query .= 'ORDER BY ck.`id`';
                $result = mysql_query($query);
                if ($result and mysql_num_rows($result)>0) {
                    $item["old_price"] = 0;
                    while ($row = mysql_fetch_assoc($result)) {
                        $row = self::getProductItem($row, $UrlWL, $images_path, $arAliases, true, $row["cid"], "catalog", true, $item["selectedOptions"]);
                        $item['elements'][] = $row;
                        $item["old_price"] += $row["price"];
                    }
                }
            }
            // Select product kits when product isn't a kit, but is a kit element
            elseif ($item["has_kit"]) {
                $query  = 'SELECT DISTINCT c.* FROM `'.CATALOG_TABLE.'` c ';
                $query .= 'LEFT JOIN `'.CATALOG_KITS_TABLE.'` ck ON(ck.`pid` = c.`id`) ';
                $query .= 'WHERE ck.`kid`='.$item['id'].' ';
                $query .= 'ORDER BY ck.`id`';
                $result = mysql_query($query);
                if ($result and mysql_num_rows($result)>0) {
                    while ($row = mysql_fetch_assoc($result)) {
                        $item['kits'][] = self::getProductItem($row, $UrlWL, $images_path, $arAliases, false, $row["cid"], "catalog", true, $item["selectedOptions"]);
                    }
                }
            }
        }
    }
    /**
     * Calculate product prices
     * @param array $item
     * @param bool $isMaster
     */
    public static function calcProductPrices (&$item, $isMaster = true) {
        $item["price"]     = $item["price"]*1;
        $item["cprice"]    = $item["cprice"]*1;
        $item["buy_price"] = $item["buy_price"]*1;
        $item["is_stock"]  = (bool)$item["is_stock"];
        // AtFirst - Calc Item prices by options
        self::calcProductPricesByOptions($item);
        // set new price to zero
        $new_price = $item["price"];
        if (!isset($item["old_price"])) $item["old_price"] = $new_price;
        // if item is stock - block all other discounts
        if ($item["is_stock"] and $item["cprice"]>0) {
            $new_price = $item["cprice"];
        } else if (!$item["is_stock"] and $item["is_top"]) {
            $objSettingsInfo = PHPHelper::getCache()->get(CacheWL::KEY_OBJ_SETTINGS);//settings info object
            if ($objSettingsInfo === false) {
                $objSettingsInfo = getSettings(); 
                PHPHelper::getCache()->set(CacheWL::KEY_OBJ_SETTINGS, $objSettingsInfo, 3600);
            }
            $percent   = $objSettingsInfo->dailyDiscountPercent*1;
            $new_price = $item["price"] - ($item["price"]/100*$percent);
        }
        // set new price to price
        $item['price'] = $new_price;
    }
    /**
     * 
     * @param type $item
     */
    public static function calcProductPricesByOptions (&$item) {
        if (!empty($item["options"])) {
            foreach ($item["options"] as $optionID => $option) {
                foreach ($option["values"] as $valueID => $value) {
                    if ($value["selected"] > 0 AND $value["operator"]=="+") {
                        $item["price"] += $value["price"];
                    } elseif ($value["selected"] > 0 AND $value["operator"]=="-") {
                        $item["price"] -= $value["price"];
                    }
                }
            }
        }
    }
    /**
     * @example PHPHelper::getProductComments()
     * @param array $item
     * @param int $inList
     */
    public static function getProductComments (&$item, $offset = 0, $limit = 0) {
        $item["comments"] = self::getItemComments($item["id"], 0, "catalog", $offset, $limit);
    }
    /**
     * @example PHPHelper::getItemComments()
     * @param int $itemID
     * @param int $cid
     * @param string $module
     * @return array
     */
    public static function getItemComments ($itemID, $cid = 0, $module = "catalog", $offset = 0, $limit = 0) {
        $items  = array();
        $query  = "SELECT c.* FROM `".COMMENTS_TABLE."` c 
                   WHERE c.`active`>0 AND c.`module`='{$module}' AND c.`pid`={$itemID} AND c.`cid`={$cid} 
                   ORDER BY c.`created` DESC".($limit ? " LIMIT {$offset}, {$limit}" : "");
        $result = mysql_query($query);
        if ($result and mysql_num_rows($result)>0) {
            while ($row = mysql_fetch_assoc($result)) {
                $ceatedDate = date("Y-m-d", strtotime($row["created"]));
                $ceatedTime = date("H:i", strtotime($row["created"]));
                $timeNow    = time();
                $dateNow    = date("Y-m-d", $timeNow);
                $interval   = $timeNow - strtotime($row["created"]);
                if ($interval <= 600) $row["createdDate"] = "только что"; // если ~10 минут назад
                else {
                    if ($ceatedDate == $dateNow) $row["createdDate"] = "сегодня в ".$ceatedTime; // Если сегодня
                    else $row["createdDate"] = false; // Если раньше
                }
                $row["children"] = self::getItemComments($itemID, $row["id"], $module, 0, 0);
                $items[] = $row;
            }
        }
        return $items;
    }
    /**
     * @example PHPHelper::getProductImages()
     * @param String $img_path
     * @param array $item
     * @param boolean $list
     * @param string $filename
     * @param array $arAliases
     */
    public static function getProductImages ($img_path, &$item, $list = false, $filename='image', $arAliases=array('')) {
        $item_img_path  = $img_path.$item["id"].'/';
        $item["images"] = $item[$filename] = array();
        $query = "SELECT * FROM `".CATALOGFILES_TABLE."` WHERE `pid`={$item['id']} AND `active`=1 ORDER BY `isdefault` DESC, `fileorder`".($list ? " LIMIT 1" : "");
        $result = mysql_query($query);
        if ($result and mysql_num_rows($result) > 0) {
            $i=0;
            while ($image = mysql_fetch_assoc($result)) {
                if (!empty($arAliases)) {
                    foreach($arAliases as $arAlias) {
                        $image[$arAlias[0]."image"] = (!empty($image["filename"]) AND file_exists(prepareDirPath($item_img_path).$arAlias[0].$image["filename"])) ? $item_img_path.$arAlias[0].$image["filename"] : $img_path.$arAlias[0].'noimage.jpg';
                    }
                }
                $image["image"] = (!empty($image["filename"]) AND file_exists(prepareDirPath($item_img_path).$image["filename"])) ? $item_img_path.$image["filename"] : $img_path.'noimage.jpg';
                array_push($item["images"], $image);
                if ($i==0) $item[$filename] = $image;
                $i++;
            }
        } else {
            $item[$filename]["image"] = $img_path.'noimage.jpg';;
            if (!empty($arAliases)) {
                foreach($arAliases as $arAlias) {
                    $item[$filename][$arAlias[0]."image"] = $img_path.$arAlias[0].'noimage.jpg';
                }
            }
        }
    }
    /**
     * 
     * @global Basket $Basket
     * @param int $id
     * @param array $options
     * @return string
     */
    public static function makeProductIdKey ($id = 0, $options = array()) {
        global $Basket;
        $idKey = !empty($id) ? $id : "";
        if (!empty($options)) {
            $idKey .= $Basket->optionsIndicator;
            foreach ($options as $optionID=>$valueID) {
                $idKey .= $optionID.$Basket->valueSeparator.(is_array($valueID) ? implode($Basket->valueIterator, $valueID) : $valueID).$Basket->optionsSeparator;
            }
        }
        return $idKey;
    }
    /**
     * 
     * @param int $itemID
     * @param boolean $showEmptyAttr
     * @param boolean $showAll
     * @param boolean $shortcutCid
     * @return array
     */
    public static function getProductAttributes($itemID, $showEmptyAttr=false, $showAll = false, $shortcutCid=false){
        $attrGroups = array();
        $cid = $shortcutCid ? $shortcutCid : getValueFromDB(CATALOG_TABLE, 'cid', 'WHERE `id`='.$itemID);
        if ($cid) {
            $query  = "SELECT ag.* FROM `".ATTRIBUTE_GROUPS_TABLE."` ag 
                       LEFT JOIN `".CATEGORY_ATTRIBUTE_GROUPS_TABLE."` cag ON(cag.`gid`=ag.`id`) 
                       WHERE ag.`active`>0 AND cag.`cid`={$cid} ORDER BY ".(!$showAll ? 'cag.`order`' : 'ag.`order`');
            $result = mysql_query($query);
            if(mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_assoc($result)) {
                    $query  = "SELECT a.*, GROUP_CONCAT(DISTINCT avt.`title` SEPARATOR '|-|') AS `vals` FROM `".ATTRIBUTES_TABLE."` a 
                               LEFT JOIN `".PRODUCT_ATTRIBUTE_TABLE."` pa  ON(pa.`aid`=a.`id`) 
                               LEFT JOIN `".ATTRIBUTES_VALUES_TABLE."` avt ON(avt.`aid`=a.`id` AND avt.`id`=pa.`value`) 
                               LEFT JOIN `".CATEGORY_ATTRIBUTES_TABLE."` ca ON(ca.`aid`=a.`id`) 
                               WHERE pa.`pid`={$itemID} AND a.`gid`={$row['id']} ".(!$showAll ? "AND ca.`cid`={$cid} " : "")." 
                               GROUP BY a.`id` 
                               ORDER BY ca.`order`, a.`order`";
                    $aresult = mysql_query($query);
                    if ($aresult and mysql_num_rows($aresult) > 0) {
                        while ($r = mysql_fetch_assoc($aresult)) {
                            $r['values'] = explode('|-|', $r['vals']);
                            $row['attributes'][$r['id']] = $r; 
                        }
                    }
                    $attrGroups[] = $row;
                }
            }
        }
        return $attrGroups;
    }
    
    public static function getProductOptions($itemID, $selected = array()) {
        $arOptions = array();
        $filesUrl = UPLOAD_URL_DIR.'options/';
        $filesPath = prepareDirPath($filesUrl);
        $query = 'SELECT o.*, po.`required`, ot.`title` AS `typename` FROM `'.OPTIONS_TABLE.'` o '.PHP_EOL
                .'LEFT JOIN `'.OPTIONS_TYPES_TABLE.'` ot ON(ot.`id` = o.`type_id`) '.PHP_EOL
                .'LEFT JOIN `'.PRODUCT_OPTIONS_TABLE.'` po ON(po.`oid` = o.`id`) '.PHP_EOL
                .'WHERE o.`active`>0 AND po.`pid`='.$itemID.' '.PHP_EOL
                .'GROUP BY o.`id` ORDER BY o.`order`';
        $result = mysql_query($query);
        if($result AND mysql_num_rows($result) > 0) {
            while ($option = mysql_fetch_assoc($result)) {
                $option['descr']  = unScreenData($option['descr']);
                $option['image']  = (!empty($option['image']) AND is_file($filesPath.$option['image'])) ? $filesUrl.$option['image'] : '';
                $option["values"] = array();
                $qry = "SELECT ov.*, pov.`operator`, pov.`price`, pov.`primary`, '0' AS `selected` FROM `".OPTIONS_VALUES_TABLE."` ov "
                     . "LEFT JOIN `".PRODUCT_OPTIONS_VALUES_TABLE."` pov ON(pov.`value_id`=ov.`id`) "
                     . "WHERE pov.`option_id`={$option["id"]} AND pov.`product_id`={$itemID} "
                     . "GROUP BY ov.`id` "
                     . "ORDER BY ov.`order`";
                $res  = mysql_query($qry);
                if ($res AND mysql_num_rows($res) > 0) {
                    $primary = 0;
                    while ($value = mysql_fetch_assoc($res)) {
                        $value['image'] = (!empty($value['image']) AND is_file($filesPath.$value['image'])) ? $filesUrl.$value['image'] : '';
//                        if ($option['required']==0) $value['primary'] = 0;
                        if ($value['primary'] > 0) $primary = $value['id'];
                        $option["values"][$value["id"]] = $value;
                    }
                    if (isset($selected[$option['id']]) AND !is_array($selected[$option['id']]) AND isset($option["values"][$selected[$option['id']]])) {
                        $primary = $selected[$option['id']];
                    } elseif (isset($selected[$option['id']]) AND is_array($selected[$option['id']])) {
                        foreach ($option["values"] as $key=>$value) {
                            if (in_array($key, $selected[$option['id']])) $option["values"][$key]["selected"] = 1;
                        }
                    }
                    if ($primary) $option["values"][$primary]['selected'] = 1;
                    $arOptions[$option["id"]] = $option;
                }
            }
        }
        return $arOptions;
    }
    /**
     * 
     * @param array $options
     * @return array
     */
    public static function getSelectedOptions ($options) {
        $arOptions = array();
        $selected = array();
        if (!empty($options)) {
            foreach ($options as $optID => $option) {
                $selected[$optID] = array();
                foreach ($option["values"] as $valID => $value) {
                    if ($value["selected"] > 0) $selected[$optID][] = $valID;
                }
            }
        }
        if (!empty($selected)) {
            foreach ($selected as $optID => $arVal) {
                if (!empty($arVal))
                    $arOptions[$optID] = (count($arVal)>1) ? $arVal : $arVal[0];
            }
        }
        return $arOptions;
    }
    
    public static function getCatalogSearchSelectResource($searchtext = "") {
        if (empty($searchtext)) return '';
        $arStrings = explode(' ', $searchtext);
        $arSelect = array();
        foreach ($arStrings as $word) {
            $arSelect[] = '(IF(LPAD(t.`pcode`, 5, "0") LIKE "%'.$word.'%", 5, 0) + IF(LOWER(t.`title`) LIKE "%'.$word.'%", 7, 0))';
        } return "(".implode(" + ", $arSelect).")";
    }
    
    public static function getCatalogSearchWhereCondition($searchtext = "") {
        if (empty($searchtext)) return '';
        return "HAVING `shortcutsOrder`>0";
    }
    
    public static function getCatalogItemsWhereCondition($catid, $arCatsIDX) {
        $essential = (int)getValueFromDB(MAIN_TABLE, "essential", "WHERE `id`=$catid");
        $facet     = getItemRow(CATEGORY_PROPERTIES_TABLE, "*", "WHERE `category_id`=$catid");
        $subwhere  = "";
        $where     = "WHERE t.`active`=1 AND (t.`cid` IN(".implode(',', $arCatsIDX).") %s)";
        if (!$essential and !empty($facet)) {
            switch ($facet["type_id"]) :
                case CatalogMainProperty::TYPE_SALE : 
                        $subwhere .= "OR t.`is_sale`>0";
                    break;
                case CatalogMainProperty::TYPE_STOCK :
                        $subwhere .= "OR t.`is_stock`>0";
                    break;
                case CatalogMainProperty::TYPE_TOP :
                        $subwhere .= "OR t.`is_top`>0";
                    break;
                case CatalogMainProperty::TYPE_ATTRIBUTE :
                        $subwhere .= "OR t.`id` IN("
                        . "SELECT DISTINCT pa.`pid` FROM `".PRODUCT_ATTRIBUTE_TABLE."` pa "
                        . "WHERE pa.`aid`='{$facet["attribute_id"]}' AND pa.`value`='{$facet["value_id"]}'"
                        . ")";
                    break;
            endswitch;
        }
        return sprintf($where, $subwhere);
    }

    public static function getCatalogItemsSql($catid, $arCatsIDX, $lang, $module, $allwhere = '', $allorder = '', $alllimit = '', $onlyCnt = false, $searchtext = "") {
        $searchSelect = self::getCatalogSearchSelectResource($searchtext);
        $searchWhere  = self::getCatalogSearchWhereCondition($searchtext);
        $select = "SELECT t.*, ".(!empty($searchSelect) ? $searchSelect : "t.`order`")." AS shortcutsOrder";
        $from   = "FROM `".CATALOG_TABLE."` t ";
        $where  = self::getCatalogItemsWhereCondition($catid, $arCatsIDX)." $allwhere $searchWhere ";
        $query  = "$select \n $from \n $where \n $allorder \n $alllimit";
        return  ($onlyCnt ? 'SELECT COUNT(*) FROM (' : '').$query.($onlyCnt ? ') sbt ' : ''); 
    }
    
    public static function getCatalogItems($catid, $arCatsIDX, $lang, $module, $where = '', $order = '', $limit = '', $onlyIDX = false, $searchtext = "") {
        $items = array();
        $query = self::getCatalogItemsSql($catid, $arCatsIDX, $lang, $module, $where, $order, $limit, false, $searchtext);
        $result = mysql_query($query);
        if($result) {
            while(($row = mysql_fetch_assoc($result))) { 
                if($onlyIDX) {
                    $items[] = $row['id']; 
                } else {
                    $items[$row['id']] = $row; 
                }
            }              
        }
        return $items;
    }   
    
    public static function getCatalogItemsCnt($catid, $arCatsIDX, $lang, $module, $where = '', $order = '', $limit = '', $searchtext = "") {
        $query = self::getCatalogItemsSql($catid, $arCatsIDX, $lang, $module, $where, $order, $limit, true, $searchtext);
        $result = mysql_query($query);
        return $result ? mysql_result($result, 0) : 0;
    }
    
    /**
     * @param type $sortID
     * @return type
     */
    public static function getCatalogSorting(UrlWL $UrlWL, $sortID=0) {
        $columns = self::$SORT_COLUMNS;
        $_UrlWL = $UrlWL->copy();
        $_isDef = (!self::checkCatalogSort($sortID) or $sortID == self::getDefaultCatalogSort());
        foreach(array_keys($columns) as $key){
            $columns[$key]['active'] = ($sortID == $key);
            if ($columns[$key]['active'] and $_isDef) {
                $_UrlWL->unsetParam(UrlWL::SORT_KEY_NAME);
            } else {
                $_UrlWL->setParam(UrlWL::SORT_KEY_NAME, $key);
            }
            $columns[$key]['url'] = $_UrlWL->buildUrl();
        }
        unset($_UrlWL);
        return $columns;
    }

    /**
     * @param type $sortID
     * @return type
     */
    public static function getCatalogLimit(UrlWL $UrlWL, $limitID=0) {
        $columns = self::$LIMIT_COLUMNS;
        $_UrlWL = $UrlWL->copy();
        $_isDef = (!self::checkCatalogLimit($limitID) or $limitID == self::getDefaultCatalogLimit());
        foreach(array_keys($columns) as $key){
            $columns[$key]['active'] = ($limitID == $key);
            if ($columns[$key]['active'] and $_isDef) {
                $_UrlWL->unsetParam(UrlWL::LIMIT_KEY_NAME);
            } else {
                $_UrlWL->setParam(UrlWL::LIMIT_KEY_NAME, $key);
            }
            $columns[$key]['url'] = $_UrlWL->buildUrl();
        }
        unset($_UrlWL);
        return $columns;
    }

    /**
     * @param type $sortID
     * @return bool
     */
    public static function checkCatalogLimit($limitID) {
        return ($limitID and array_key_exists($limitID, self::$LIMIT_COLUMNS));
    }

    /**
     * @param type $sortID
     * @return bool
     */
    public static function checkCatalogSort($sortID) {
        return ($sortID and array_key_exists($sortID, self::$SORT_COLUMNS));
    }

    /**
     * @param type $sortID
     * @return int
     */
    public static function getCorrectCatalogLimit($limitID) {
        return self::checkCatalogLimit($limitID) ? $limitID : self::getDefaultCatalogLimit() ;
    }

    /**
     * @param type $sortID
     * @return int
     */
    public static function getCorrectCatalogSort($sortID) {
        return self::checkCatalogSort($sortID) ? $sortID : self::getDefaultCatalogSort() ;
    }

    /**
     * @param type $sortID
     * @return type
     */
    public static function getDefaultCatalogLimit() {
        $arr = array_keys(self::$LIMIT_COLUMNS);
        return reset($arr);
    }

    /**
     * @param type $sortID
     * @return type
     */
    public static function getDefaultCatalogSort() {
        $arr = array_keys(self::$SORT_COLUMNS);
        return reset($arr);
    }
    
    public static function getSliderItems() {
        static $items = array();
        if(empty($items)){
            $query  = "SELECT * FROM `".HOMESLIDER_TABLE."` WHERE `active`=1 AND `image`<>'' ORDER BY `order`, `id`";
            $result = mysql_query($query);
            while ($row = mysql_fetch_assoc($result)) {
                $row['path']  = UPLOAD_URL_DIR.'homeslider/';
                $row['title'] = unScreenData($row['title']);
                $items[] = $row;
            }
        } return $items;
    }
    
    public static function dataConv($item, $from = "windows-1251", $to = "utf-8", $translit = false, $bApplyTrim = false) {
        if (is_object($item) AND $item instanceof stdClass) $item = (array)$item;
        if (is_array($item)) {
            foreach ($item as $key => $value) {
                $item[$key] = PHPHelper::dataConv($value, $from, $to, $translit, $bApplyTrim);
            }
        } else if (!is_bool($item) AND $item) {
            if ($bApplyTrim) $item = trim($item);
            if ($item) $item = iconv($from, $to . ($translit ? "//TRANSLIT" : ''), $item);
        } return $item;
    }
    
    public static function mb_dataConv($item, $to = "CP1251", $from = 'UTF-8') {
        if (is_object($item) AND $item instanceof stdClass) $item = (array)$item;
        if (is_array($item)) {
            foreach ($item as $key => $value) {
                $item[$key] = self::mb_dataConv($value, $to, $from);
            }
        } else if (!is_bool($item) AND $item) {
            if ($item)  $item = mb_convert_encoding($item, $to, $from);
        } return $item;
    }
    
    public static function makeAttributeAlias($val) {
        $sibling = intval(getValueFromDB(PRODUCT_ATTRIBUTE_TABLE, '`alias`', 'WHERE `value`="'.$val.'"', 'val'));
        $increment = intval(getValueFromDB(PRODUCT_ATTRIBUTE_TABLE, 'MAX(`alias`)', '', 'maxval'));
        if(is_int($sibling) AND $sibling>0) {
            return $sibling;
        } else {
            if($increment > 0) {
                return $increment+1;
            } else {
                return 1;
            }
        }
    }

    /**
     * This function emulates php internal function basename
     * but does not behave badly on broken locale settings
     * @param string $path
     * @param string $ext
     * @return string
     */
    function BaseName($path, $ext="") {
        $path = rtrim($path, "\\/");
        if (preg_match("#[^\\\\/]+$#", $path, $match))
            $path = $match[0];
        if ($ext) {
            $ext_len = strlen($ext);
            if (strlen($path) > $ext_len AND substr($path, -$ext_len) == $ext)
                $path = substr($path, 0, -$ext_len);
        } return $path;
    }

    function StrRPos($haystack, $needle) {
        $idx = strpos(strrev($haystack), strrev($needle));
        if($idx === false) return false;
        $idx = strlen($haystack) - strlen($needle) - $idx;
        return $idx;
    }
    
    public static function BuildFilterMetaData ($meta, $filters) {
        foreach ($filters as $key=>$title) {
            $replace = sprintf(self::$meta_template, $key);
            $meta = str_replace($replace, $title, $meta);
        }
        $meta = preg_replace("/".sprintf(self::$meta_template, "\d+")."/", "", $meta);
        return trim(str_replace("  ", " ", $meta));
    }
    
    public static function prepareSearchText ($stext, $iconv = false, $addslashes = true) {
        if ($iconv) $stext = self::dataConv($stext, "utf-8", "windows-1251");
        $stext = urldecode($stext);
        $stext = trim(strip_tags($stext)); // add from xss attack
        if($addslashes) $stext = addslashes($stext);
        $stext = mb_strtolower($stext, "CP1251");
        return $stext;
    }
}

class Selections {
    
    static $COLUMNS = array(
        "is_top" => "Товар дня",
        "is_kit" => "Лучшие комплекты"
    );
    /**
     * 
     * @param UrlWL $UrlWL
     * @param int $limit
     * @return array
     */
    public static function getSelections (UrlWL $UrlWL, $limit = 10) {
        $selections = array();
        $images_params  = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="catalog"'));
        $files_url      = UPLOAD_URL_DIR.'catalog/';
        $files_path     = prepareDirPath($files_url);
        foreach (self::getColumns() as $colname=>$title) {
            $query  = "SELECT DISTINCT c.* FROM `".CATALOG_TABLE."` c "
                    . "WHERE c.`active`>0 AND c.`$colname`>0 "
                    . "ORDER BY c.`popularity` DESC LIMIT $limit";
            $result = mysql_query($query);
            if ($result and mysql_num_rows($result)>0) {
                $selections[$colname] = array();
                while ($row = mysql_fetch_assoc($result)) {
                    $selections[$colname][] = PHPHelper::getProductItem($row, $UrlWL, $files_url, $images_params);
                }
            }
        }
        return $selections;
    }
    /**
     * 
     * @return array
     */
    public static function getColumns () {
        return self::$COLUMNS;
    }
}

class CacheWL extends CMemCache {
    
    const KEY_OBJ_SETTINGS = 'obj_settings';
    const KEY_HOME_SELECTIONS = 'home_selections';
    const KEY_CATALOG_LINKS = 'catalog_links_';
    const KEY_CATALOG_RELATED = 'catalog_related_';

    public function set($id, $value, $expire = 0) {
        if (WLCMS_USE_CACHE) {
           $res =  parent::set($id, $value, $expire);
           if (!$res) {
               saveStrToFile("Потеря данных Memcached. Ключ: {$id}. Время: ".date("Y-m-d H:i:s"), "temp/memcached.log");
           }
        }
    }

    public function get($key) {
        if (WLCMS_USE_CACHE) {
            return parent::get($key);
        } else {
            return false;
        }
    }

    public function delete($key) {
        if (WLCMS_USE_CACHE) {
            return parent::delete($key);
        } else {
            return false;
        }
    }

    public function is_free() {
        if (WLCMS_USE_CACHE) {
            $stats = parent::getStats();
            return ($stats["bytes"] < $stats["limit_maxbytes"]);
        } else {
            return false;
        }
    }
}

/**
 * Description of ImportExport class
 * This class provides methods for Import / Export data
 * @author WebLife
 * @copyright 2013
 */
class ImportExport {

    const CSV_DELIMITER     = ';';
    const CSV_ENCLOSURE     = '"';
    const YML_TYPE_DEFAULT  = 'vendor.model';
    
    public function __construct() {
        setlocale(LC_ALL, array('ru_RU.CP1251', 'ru_RU', 'ru', 'rus_RUS'));
    }
    
    public static function __outputCSV(&$vals, $key, $filehandler) {
        fputcsv($filehandler, $vals, self::CSV_DELIMITER, self::CSV_ENCLOSURE); // add parameters if you want
    }
    
    public static function __outputYML($filehandler, $str) {
        fwrite($filehandler, $str); 
    }
    
    public static function __fgetcsv($handle, $length, $delimiter=',', $enclosure='"'){
        if (version_compare(PHP_VERSION, "5.2.1", ">")) {
            $arLine = fgetcsv($handle, $length, $delimiter, $enclosure);
        } else {
            $line   = fgets($handle);
            $arLine = $line ? explode($delimiter, trim($line)) : $line;
            if(is_array($arLine)){
                foreach($arLine as $k=>$v) { 
                    $arLine[$k] = ltrim(rtrim($v, $enclosure), $enclosure);
                }
            }
        } return $arLine;
    }
    
    public static function outputCSV(array $arCSVData, $filename='output', $exit=true){
        //  Вывод примера файла с десятю строчками информации о товарах    
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=\"{$filename}.csv\";");
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Content-Transfer-Encoding: binary");
        $outstream = fopen("php://output", "w");
        array_walk($arCSVData, "ImportExport::__outputCSV", $outstream);
        fclose($outstream);
        if($exit) exit();
    }
    
    public static function outputYML(array $arYMLData, $filename='output', $type="", $exit=true){ 
        header("Content-type: text/xml; charset=utf-8");
        header("Content-Disposition: attachment; filename=\"{$filename}.yml\";");
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Content-Transfer-Encoding: binary");
        $outstream = fopen("php://output", "w");
        //add <!DOCTYPE yml_catalog SYSTEM "shops.dtd">
        ImportExport::__outputYML($outstream, iconv('windows-1251', 'utf-8', ImportExport::generateYML($arYMLData)));
        fclose($outstream);
        if($exit) exit();
    }
    
    public static function generateYML(array $arYMLData){ 
        // http://partner.market.yandex.ru/legal/tt/#id1164252226643
        $dom = new domDocument("1.0", "utf-8");  
        $root = $dom->createElement("yml_catalog"); 
        $root->setAttribute("date", date("Y-m-d h:m")); 
        $dom->appendChild($root);

        $shop = $dom->createElement("shop");
        // основные данные про гамазин
        $shop->appendChild($dom->createElement("name", $arYMLData['name']));
        $shop->appendChild($dom->createElement("company", $arYMLData['company']));
        $shop->appendChild($dom->createElement("url", $arYMLData['url']));
        $shop->appendChild($dom->createElement("email", $arYMLData['email']));

        // валюты
        $currencies = $dom->createElement("currencies");
        if(!empty($arYMLData['arCurrencies'])) {
            foreach($arYMLData['arCurrencies'] as $value){
                $currency = $dom->createElement("currency");
                $currency->setAttribute("id", $value['id']);
                $currency->setAttribute("rate", $value['rate']);
                $currencies->appendChild($currency);
            }
        }
        $shop->appendChild($currencies);

        // категории
        $categories = $dom->createElement("categories");
        if(!empty($arYMLData['arCategories'])) {
            foreach($arYMLData['arCategories'] as $cat) {
                $category = $dom->createElement("category", $cat['title']);
                $category->setAttribute("id", $cat['id']);
                if($cat['pid']!=$arYMLData['catalog_root_id'])
                    $category->setAttribute("parentId", $cat['pid']);
                $categories->appendChild($category);
            }
        }
        $shop->appendChild($categories);    

        // стоимость доставки 
        $shop->appendChild($dom->createElement("local_delivery_cost", $arYMLData['local_delivery_cost'])); 
        
        // товары        
        // произвольный тип (vendor.model), параметры: ? - необязательный, !-обязательный
        // 1. url(? max 512) price(!) currencyId(!) categoryId(!) picture(? (для одежды обязательно)) store(?true|false) 
        // pickup(?true|false) delivery(?true|false) local_delivery_cost(?) typePrefix(? категория/группа)
        // name(!) vendor(!) vendorCode(?(артикул от производитеял)) model(!) description(?) 
        // sales_notes(? мин сум заказа) seller_warranty и manufacturer_warranty(?false|true - имеет|нет оф гарантию/строка гарантии (ISO 8601, например: P1Y2M10DT2H30M) 
        // country_of_origin(?) downloadable(?) adult(?) age(? =0, 6, 12, 16, 18) 
        // barcode(? штирхкод производителя) cpa(?) rec(? рекомендованные товары) expiry(?)
        // weight(? kg+tara kg) dimensions(?) param(? атрибуты - значения)
        $offers = $dom->createElement("offers");
        if(!empty($arYMLData['arProducts'])) {
            foreach($arYMLData['arProducts'] as $product) {
                $offer = $dom->createElement("offer");
                $offer->setAttribute("type", self::YML_TYPE_DEFAULT);
                $offer->setAttribute("id", $product['id']);
                $offer->setAttribute("bid", '');
                $offer->setAttribute("available", 'true');

                foreach($product['arParams'] as $key=>$value) {
                    $offer->appendChild($dom->createElement($key, $value));
                }

                if(!empty($product['arAttributes'])) {
                    foreach($product['arAttributes'] as $attr) {
                        $param = $dom->createElement('param', $attr['value']);
                        $param->setAttribute("name", $attr['title']);
                        $offer->appendChild($param);
                    }  
                }
                $offers->appendChild($offer);
            }
        }  
        $shop->appendChild($offers);  
        $root->appendChild($shop);
        $dom->formatOutput = true;
        return $dom->saveXML();
    }
    
    public static function outputSqlFiles(array $arFiles, $outfilename, $exit=true){
        // set headers
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");   
        header("Content-type: text/sql");
        header("Content-Disposition: attachment; filename=\"{$outfilename}.sql\"");
        header("Content-Transfer-Encoding: binary");
            
        $outstream = fopen("php://output", "w");
        foreach ($arFiles as $file) {
            if(file_exists($file) AND is_file($file) AND is_readable($file)){
                $file = @fopen($file, "rb");
                if($file) {
                    while(!feof($file)) {
                        fwrite($outstream, fread($file, 1024 * 8));
                        if( connection_status()!=0 ) {
                            @fclose($file);
                            die();
                        }
                    } @fclose($file);
                }
            }
        }
        fclose($outstream);
        if($exit) exit();
    }

    public static function outputFile($file, $exit=true){
        if( $file AND strpos($file, "\0") === FALSE/*Nullbyte hack fix*/){
            // Make sure program execution doesn't time out
            // Set maximum script execution time in seconds (0 means no limit)
            @set_time_limit(0);

            // Make sure that header not sent by error
            // Sets which PHP errors are reported
            @error_reporting(0);

            // Allow direct file download (hotlinking)?  Empty - allow hotlinking
            // If set to nonempty value (Example: example.com) will only allow downloads when referrer contains this text
            $allowed_referrer = $_SERVER['SERVER_NAME'];

            // If hotlinking not allowed then make hackers think there are some server problems
            if ( !empty($allowed_referrer) AND
                 (!isset($_SERVER['HTTP_REFERER']) || strpos(strtoupper($_SERVER['HTTP_REFERER']), strtoupper($allowed_referrer)) === false)
            ) die("Internal server error. Please contact system administrator.");

            // if don't exist and isn't file and  can't read them - die
            if (!file_exists($file) AND !is_file($file) AND !is_readable($file)) {
              header ("HTTP/1.0 404 Not Found");
              exit();
            }

            // Get real file name.
            // Remove any path info to avoid hacking by adding relative path, etc.
            $fname = basename($file);

            // file size in bytes
            $fsize = filesize($file);

            // get mime type
            $mtype = '';
            // mime type is not set, get from server settings
            if (function_exists('mime_content_type')) {
                $mtype = mime_content_type($file);
            } else if (function_exists('finfo_file')) {
                $finfo = finfo_open(FILEINFO_MIME); // return mime type
                $mtype = finfo_file($finfo, $file);
                finfo_close($finfo);
            }
            if ($mtype == '') {
                $mtype = "application/force-download";
            }

            // Browser will try to save file with this filename, regardless original filename.
            // You can override it if needed.

            // remove some bad chars
            $asfname = str_replace(array('"',"'",'\\','/'), '', $fname);
            if ($asfname === '') $asfname = 'NoName';

            // set headers
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Type: $mtype");
            header("Content-Disposition: attachment; filename=\"$asfname\"");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $fsize);

            // download
            // @readfile($file);
            $file = @fopen($file, "rb");
            if($file) {
                while(!feof($file)) {
                    print(fread($file, 1024 * 8));
                    flush();
                    if( connection_status()!=0 ) {
                        @fclose($file);
                        die();
                    }
                } @fclose($file);
            }
            if($exit) exit();
        } else { die(); }
    }

    public static function parseFile($csvfile, $presentColumnNames=true) {
        if(empty($csvfile) || !is_file($csvfile)) return false;
        
	$filesize       = filesize($csvfile);
	$handle         = fopen($csvfile, "r"); 
        if(!$filesize || !$handle) return false;

        $csvfilename    = basename($csvfile);
        $arLine         = array();
        if($presentColumnNames){
            //Получаем первую строку из CSV файла и приводим ее в нужный вид (удаляем пробелы в начале и в конце строки, понижаем в нижний регистр)
            $arLine = self::__fgetcsv($handle, $filesize, self::CSV_DELIMITER, self::CSV_ENCLOSURE);
            if(!empty($arLine)){
                foreach($arLine as $column=>$val) {
                    $arLine[$column] = strtolower(trim($val));
                }
            } //print_r($arLine); exit();
            // создаем массив с ключем(название колонки в базе) и позицией в строке CSV начиная с 0
            $arLine = array_flip($arLine); // Поменять местами ключи и значения массива, т.е. ключи становятся значениями, а значения становятся ключами
        }
        
        // Создаем результирующий массив
        $arData = array('columns'=>$arLine, 'data'=>array(), 'count'=>0);
        
        // Импортируем из CSV файла данные в пустую базу
        while( ($arLine = self::__fgetcsv($handle, $filesize, self::CSV_DELIMITER, self::CSV_ENCLOSURE)) !== FALSE ) {
            // проверка на правильное количество колонок. если не одинаковое - пропускаем
            if($presentColumnNames AND count($arLine)!=count($arData['columns'])) continue; //например строки где разделение каким-то текстом или неверный формат
            $arData['data'][] = $arLine;
            $arData['count']++;
        }
        // закрываем файл
        fclose($handle);
        // удаляем файл
//        @unlink($csvfile);
        // возвращаем 
        return $arData;
    }

    public static function assocArrayToQuery(array $arData, $arSkip=array(), $type='insert') {
        if(empty($arData)) return false;
        $keys = $values = $arSkiped = array();
        foreach($arSkip as $key) { if(key_exists($key, $arData)) $arSkiped[$key] = $arData[$key]; }
        switch($type) {
            case 'insert':
                foreach($arData as $key=>$value) {
                    if (!in_array($key, $arSkip)) {
                        $keys[]   = $key;
                        $values[] = ($value===NULL || $value==="NULL") ? 'NULL' : ($value==="NOW()" ? "NOW()" : "'".self::forSql($value)."'");
                    }
                } break;
            case 'update':
                foreach($arData as $key => $value) {
                    if (!in_array($key, $arSkip)) {
                        $values[] = ($value===NULL || $value==="NULL") ? $key."=NULL" : ($value==="NOW()" ? "NOW()" : $key."='".self::forSql($value)."'");
                    }
                } break;
        } return array("keys"=>implode(", ",$keys), "values"=>implode(", ",$values), 'arSkiped'=>$arSkiped);
    }

    public static function forSql($str, $imaxln=0) {
        $str = str_replace("\0",  '', $str);
        $str = str_replace("'", '"', $str);
        if($imaxln>0) $str = substr($str, 0, $imaxln);
        return $str;
    }
}


/**
 * Description of Pager class
 * This class provides methods for create and manage pages
 * @author WebLife
 * @copyright 2015
 */
class Pager {

    /**
     * @var UrlWL
     */
    protected $UrlWL;

    /**
     * @var int
     */
    protected $first;

    /**
     * @var int
     */
    protected $last;

    /**
     * @var int
     */
    protected $prev;

    /**
     * @var int
     */
    protected $next;

    /**
     * @var int
     */
    protected $count;

    /**
     * @var array
     */
    protected $pages;
    /**
     * @var UrlWL for url generate
     */
    private $_UrlWL;

    const PAGES_SEP = '...';

    /**
     * @param UrlWL $UrlWL
     * @param int $current
     * @param int $total
     * @param int $limit
     * @param mixed $separator | string or false
     */
    public function __construct(UrlWL $UrlWL, &$current, $total, $limit, $separator=self::PAGES_SEP) {
        $this->UrlWL = $UrlWL;
        $this->count = 0;
        $this->pages = array();
        $this->prev = $this->next = $this->first = $this->last = 1;
        $this->calc($current, $total, $limit, $separator);
        $this->UrlWL->setPage($current);
    }


    private function calc(&$current, $total, $limit, $separator=false){
        if(!$total) $total = 1;
        $this->count = $this->last = intval(ceil($total / $limit));
        if($current > $this->count) {
            $current = $this->count;
        }
        if ($this->count > 1) {
            $this->prev = ($current > 1)            ? $current-1 : 1;
            $this->next = ($current < $this->count) ? $current+1 : $this->count;

            $this->pages[] = 1;
            if($this->count <= 5 || $separator === false) {
                for($i = 2; $i < $this->count; $i++){
                    $this->pages[] = $i;
                }
            }
            else if($current <= 3) {
                for($i = 2; $i <= 5; $i++){
                    $this->pages[] = $i;
                }
                $this->pages[] = $separator;
            }
            else {
                $start = $this->count- ($this->count - $current + 3);
                if($current == $this->count){
                    $start -= 2;
                }
                if($current == $this->count - 1){
                    $start--;
                }
                if($start < 0) {
                    $start = 0;
                }

                $end = $this->count - ($this->count - $current-3);
                if( $end > $this->count){
                    $end=$this->count;
                }

                if($current > 4){
                    $this->pages[] = $separator;
                }
                for($i = 1+$start; $i < $end; $i++){
                    $this->pages[] = $i;
                }
                if($current < $this->count-3){
                    $this->pages[] = $separator;
                }
            }
            $this->pages[] = $this->count;
        }
        return $this;
    }

    /**
     * @param int $page
     * @return string
     */
    public function getUrl($page){
        if($this->_UrlWL===null){
            $this->_UrlWL = $this->UrlWL->copy();
        }
        $this->_UrlWL->setPath($this->UrlWL->getPath());
        if($page == UrlWL::PAGES_ALL_VAL){
            $page = 1;
            $this->_UrlWL->setParam(UrlWL::PAGES_KEY_NAME, UrlWL::PAGES_ALL_VAL);
        } else {
            $this->_UrlWL->unsetParam(UrlWL::PAGES_KEY_NAME);
        }
        $this->_UrlWL->setPage($page);
        return $this->_UrlWL->buildUrl();
    }
    /**
     * @return string
     */
    public function getAllUrl() {
        return $this->getUrl(UrlWL::PAGES_ALL_VAL);
    }
    /**
     * @return int
     */
    public function getFirst() {
        return $this->first;
    }
    /**
     * @return int
     */
    public function getLast() {
        return $this->last;
    }
    /**
     * @return int
     */
    public function getPrev() {
        return $this->prev;
    }
    /**
     * @return int
     */
    public function getNext() {
        return $this->next;
    }
    /**
     * @return int
     */
    public function getCount() {
        return $this->count;
    }
    /**
     * @return array
     */
    public function getPages() {
        return $this->pages;
    }
    /**
     * @return string
     */
    public function getSeparator() {
        return self::PAGES_SEP;
    }
}