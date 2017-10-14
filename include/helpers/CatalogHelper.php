<?php

/**
 * WEBlife CMS
 * Created on 20.10.2016, 12:15:17
 * Developed by http://weblife.ua/
 */
defined('WEBlife') or die('Restricted access'); // no direct access

/**
 * Description of CategoryHelper class
 * Class realized Materialized Path structure for catalog tree
 * You can add new methods for your needs
 * @author WebLife
 * @copyright 2016
 */
class CatalogHelper {
    
    /**
     * @var string sql fields
     */
    const FIELDS = "id, pid, title, navtitle, treepath, redirectid, TRIM(redirecturl) AS redirecturl, title, image, module, menutype, pagetype, TRIM(seo_path) AS seo_path, active, essential, '0' AS is_sale";
    const ASSORTMENT_TYPE_VOLUME = 1;
    const ASSORTMENT_TYPE_COLOR  = 2;
    
    public static function getFieldsToSEOFieldsRelations() {
        return array(
            'title' => 'filter_title',
            'seo_title' => 'filter_seo_title',
            'seo_text' => 'filter_seo_text',
            'meta_descr' => 'filter_meta_descr',
            'meta_key' => 'filter_meta_key'
        );
    }
    /**
     * 
     * @param int $categoryID
     * @return string
     */
    public static function createTreePath($categoryID, $parentTreePath = '') {
        if($categoryID == CatalogTreePath::ROOT_ID){
            return CatalogTreePath::getRoot();
        } else if(!$parentTreePath) {
            $parentTreePath = !($arParent = self::getParent($categoryID)) ? CatalogTreePath::getRoot() : $arParent['treepath'];
        }
        return $parentTreePath.intval($categoryID).CatalogTreePath::DELIMITER;
    }
    
    /**
     * 
     * @param int $pid
     * @param string $treepath
     */
    public static function generateRecursiveTreePath($pid = 0, $treepath = '') {    
        if(!$treepath) $treepath = self::createTreePath($pid);        
        $query = 'SELECT id, treepath FROM '.MAIN_TABLE.' WHERE pid='.$pid;
        $result = mysql_query($query);
        if($result && mysql_num_rows($result)) {
            updateRecords(MAIN_TABLE, 'treepath = CONCAT("'.$treepath.'", id, "'.CatalogTreePath::DELIMITER.'")', 'WHERE pid='.$pid);         
            while(($row = mysql_fetch_assoc($result))) { 
                self::generateRecursiveTreePath($row['id'], CatalogTreePath::createLevel($row['id'], $treepath));
            }            
        }        
    }
    
    /**
     *
     * @param int $categoryID
     * @param string $selectFields
     * @param bool $withText
     * @param string $table
     * @return array
     */
    public static function getCategory($categoryID, $selectFields = '*', $withText = false, $table = MAIN_TABLE) {
        return getItemRow($table, $selectFields.(($withText && $selectFields != '*') ? ', `text`' : ''), 'WHERE id='.$categoryID);
    }
    
    /**
     * 
     * @param string $module
     * @param string $selectFields
     * @param bool $withText
     * @return array
     */
    public static function getCategoryByModule($module, $selectFields = '*', $withText = false) {
        if($module) {
            $where = 'WHERE `module`="'.$module.'" ORDER BY count_treepath_levels(treepath, "'.CatalogTreePath::DELIMITER.'")';
            return getItemRow(MAIN_TABLE, $selectFields.(($withText && $selectFields != '*') ? ', `text`' : ''), $where);
        } else return array();
    }
    
    /**
     * 
     * @param string $module
     * @param string $selectFields
     * @param bool $withText
     * @return array
     */
    public static function getCategoryModules($selectFields = '*') {
        $selectFields = 'm.*';
        $join = 'LEFT JOIN (SELECT MIN(count_treepath_levels(treepath,",")) pathlen, module FROM '.MAIN_TABLE.' GROUP BY module) m2 ON m.module = m2.module';
        $where = 'WHERE m.module<>"" AND count_treepath_levels(m.treepath,",") = m2.pathlen';
        return getRowItemsInKey('module', MAIN_TABLE.' m '.$join, $selectFields, $where);
    }
    
    /**
     * 
     * @param int $categoryID
     * @return array 
     */
    public static function getParent($categoryID) {
        return getItemRow(MAIN_TABLE, self::FIELDS, 'WHERE id=(SELECT pid FROM '.MAIN_TABLE.' WHERE id='.$categoryID.' LIMIT 1)');
    }
    
    /**
     * 
     * @param int $categoryID
     * @return int 
     */
    public static function getParentID($categoryID) {
        return getValueFromDB(MAIN_TABLE, 'pid', 'WHERE id='.$categoryID.' LIMIT 1');
    }
    
    /**
     * 
     * @param int $categoryID
     * @return string 
     */
    public static function getParentTreePath($categoryID) {
        return getValueFromDB(MAIN_TABLE, 'treepath', 'WHERE id=(SELECT pid FROM '.MAIN_TABLE.' WHERE id='.$categoryID.' LIMIT 1) LIMIT 1');
    }
    
    /**
     * 
     * @param int $parentCategoryID
     * @param int $categoryID
     * @return bool
     */
    public static function isParentByID($parentCategoryID, $categoryID) {
        $treepath = getValueFromDB(MAIN_TABLE, 'treepath', 'WHERE id='.$categoryID.' LIMIT 1');
        return ($treepath && self::isParentByTreepath($parentCategoryID, $treepath));
    }
    
    /**
     * 
     * @param int $parentCategoryID
     * @param string $treepath
     * @return bool
     */
    public static function isParentByTreepath($parentCategoryID, $treepath) {
        return ($treepath && in_array($parentCategoryID, CatalogTreePath::toArray($treepath)));
    }    
    
    /**
     * 
     * @param int $categoryID
     * @return bool
     */
    public static function isActiveParentsByID($categoryID) {        
        $subquery = '(SELECT CONCAT(treepath, "'.CatalogTreePath::EMPTY_ID.'") FROM '.MAIN_TABLE.' WHERE id='.$categoryID.')';
        $where = 'WHERE FIND_IN_SET(id, '.$subquery.')>0 AND active=0';
        return (getValueFromDB(MAIN_TABLE, 'COUNT(id)', $where) == 0);
    }
    
    /**
     * 
     * @param string $treepath
     * @return bool
     */
    public static function isActiveParentsByTreepath($treepath) {
        $where = 'WHERE id IN('.CatalogTreePath::toSelect($treepath).') AND active=0';
        return (getValueFromDB(MAIN_TABLE, 'COUNT(id)', $where) == 0);
    }
        
    /**
     * 
     * @param int $categoryID
     * @param int $currentCategoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getTreeByID($categoryID = 0, $currentCategoryID = 0, $onlyActive = true, $excludeCurrent = true) {  
        $where = 'WHERE treepath LIKE '.($categoryID == CatalogTreePath::ROOT_ID ? '"'.CatalogTreePath::ROOT_ID.',%" ' : ' CONCAT((SELECT treepath FROM '.MAIN_TABLE.' WHERE id='.$categoryID.'), "%") ');
        $where .= ($excludeCurrent ? ' AND id<>'.$categoryID : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return self::generateTreeFromCategories(getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY treepath'), $currentCategoryID);
    }
    
    /**
     * 
     * @return array
     */
    public static function getSettingsTree($lang, $excludeFictive = true) {  
        $table = MAIN_TABLE.' m LEFT JOIN '.MENUTYPES_TABLE.' mt ON m.menutype = mt.menutype';
        $select = 'm.*, mt.title_'.$lang.' menutitle ';
        $where = 'WHERE m.active=1 AND m.treepath LIKE "'.CatalogTreePath::ROOT_ID.',%" ';
        if($excludeFictive) $where .= ' AND IF(m.module="catalog" AND m.essential=0 AND m.pid>0, 1, 0) = 0 ';        
        return self::generateTreeFromCategories(getRowItemsInKey('id', $table, $select, $where, 'ORDER BY m.treepath'));
    }

    /**
     * 
     * @param string $treepath
     * @param int $currentCategoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getTreeByTreepath($treepath = '', $currentCategoryID = 0, $onlyActive = true, $excludeCurrent = true) {  
        $where = 'WHERE treepath LIKE "'.$treepath.'%"';
        $where .= ($excludeCurrent ? ' AND treepath<>"'.$treepath.'"' : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return self::generateTreeFromCategories(getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY treepath'), $currentCategoryID);
    }
    
    /**
     * 
     * @param int $parentID
     * @param int $menuType
     * @param int $currentCategoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getMenu($parentID = 0, $menuType = 0, $currentCategoryID = 0, $onlyActive = true, $excludeCurrent = true) {  
        $where = 'WHERE '.($parentID > CatalogTreePath::ROOT_ID ? 'treepath LIKE CONCAT((SELECT treepath FROM '.MAIN_TABLE.' WHERE id='.$parentID.'), "%")' : 'pid='.CatalogTreePath::ROOT_ID);
        $where .= ($menuType ? ' AND menutype='.$menuType : '');
        $where .= ($excludeCurrent ? ' AND id<>'.$parentID : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return self::generateTreeFromCategories(getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY count_treepath_levels(treepath, "'.CatalogTreePath::DELIMITER.'"), `order`'), $currentCategoryID);
    }
    
    /**
     * 
     * @param array $arCategories
     * @param int $currentCategoryID
     * @return array
     */
    public static function generateTreeFromCategories($arCategories = array(), $currentCategoryID = 0) {
        $tree = array();
        if(!empty($arCategories)) {
            $arCatIDX = array_keys($arCategories);
            foreach ($arCategories as $category) {
                $category['arPath'] = array();
                $category['redirecturl'] = trim($category['redirecturl']);
                $category['redirectid']  = intval($category['redirectid']);                
                if ($category['redirecturl'] != '') {
                    $category['redirectid'] = 0; 
                } 
                $category['arPath'] = $category['redirectid'] ? self::getCategoryPathByID($category['redirectid']) : self::getCategoryPathByTreepath($category['treepath']);
                $level = &$tree;
                $path = CatalogTreePath::toArray($category['treepath']);     
                foreach ($path as $id) {
                    if ($id && in_array($id, $arCatIDX)) {                                                   
                        if (!isset($level[$id])) {
                            $level[$id] = array();
                            $level[$id]['level'] = 0;
                            $level[$id]['current'] = false;
                            $level[$id]['children'] = array();
                        }
                        if($id == $category['id']) {
                            $level[$id] = $category;
                            $level[$id]['level'] = count($path);
                            $level[$id]['current'] = ($currentCategoryID && $currentCategoryID == $category['id']);
                            $level[$id]['children'] = array();
                        }                        
                        $level = &$level[$id]['children'];
                    }
                }
            }
        }
        return $tree;
    } 
    
    /**
     * 
     * @param type $categoryID
     * @return array
     */
    public static function getCategoryPathByID($categoryID) {
        if($categoryID > CatalogTreePath::ROOT_ID) {
            $subquery = '(SELECT CONCAT(treepath, "'.CatalogTreePath::EMPTY_ID.'") FROM '.MAIN_TABLE.' WHERE id='.$categoryID.')';
            $where = 'WHERE FIND_IN_SET(id, '.$subquery.')>0 ORDER BY treepath';
            return getArrValueFromDB(MAIN_TABLE, 'seo_path', $where);
        } else return array();
    }
    
    /**
     * 
     * @param string $treepath
     * @return array
     */
    public static function getCategoryPathByTreepath($treepath) {
        if($treepath) {
            $where = 'WHERE id IN('.CatalogTreePath::toSelect($treepath).') ORDER BY treepath';
            return getArrValueFromDB(MAIN_TABLE, 'seo_path', $where);
        } else return array();        
    }

    /**
     * 
     * @param int $categoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getAllChildrenByID($categoryID = 0, $onlyActive = true, $excludeCurrent = true) {
        $where = 'WHERE '.($categoryID > CatalogTreePath::ROOT_ID ? 'treepath LIKE CONCAT((SELECT treepath FROM '.MAIN_TABLE.' WHERE id='.$categoryID.'), "%")' : 'pid='.CatalogTreePath::ROOT_ID);
        $where .= ($excludeCurrent ? ' AND id<>'.$categoryID : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY treepath');        
    }
    
    /**
     * 
     * @param string $treepath
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getAllChildrenByTreepath($treepath, $onlyActive = true, $excludeCurrent = true) {
        $where = 'WHERE treepath LIKE "'.$treepath.'%"';
        $where .= ($excludeCurrent ? ' AND treepath<>"'.$treepath.'"' : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY treepath');        
    }
    
    /**
     * 
     * @param int $categoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getAllChildrenIDByID($categoryID = 0, $onlyActive = true, $excludeCurrent = true) {
        $where = 'WHERE '.($categoryID > CatalogTreePath::ROOT_ID ? 'treepath LIKE CONCAT((SELECT treepath FROM '.MAIN_TABLE.' WHERE id='.$categoryID.'), "%")' : 'pid='.CatalogTreePath::ROOT_ID);
        $where .= ($excludeCurrent ? ' AND id<>'.$categoryID : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return getArrValueFromDB(MAIN_TABLE, 'id', $where);    
    }
    
    /**
     * 
     * @param int $treepath
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getAllChildrenIDByTreepath($treepath, $onlyActive = true, $excludeCurrent = true) {        
        $where = 'WHERE treepath LIKE "'.$treepath.'%"';
        $where .= ($excludeCurrent ? ' AND treepath<>"'.$treepath.'"' : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return getArrValueFromDB(MAIN_TABLE, 'id', $where);       
    }
    
    /**
     * 
     * @param int $categoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getChildrenByID($categoryID, $onlyActive = true, $excludeCurrent = true) {
        $treepath = getValueFromDB(MAIN_TABLE, 'treepath', 'WHERE id='.$categoryID.' LIMIT 1');
        return self::getChildrenByTreepath($treepath, $onlyActive, $excludeCurrent); 
    }
    
    /**
     * 
     * @param int $categoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getChildrenIDByID($categoryID, $onlyActive = true, $excludeCurrent = true) {
        $treepath = getValueFromDB(MAIN_TABLE, 'treepath', 'WHERE id='.$categoryID.' LIMIT 1');
        return self::getChildrenIDByTreepath($treepath, $onlyActive, $excludeCurrent); 
    }
    
    /**
     * 
     * @param int $treepath
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getChildrenByTreepath($treepath, $onlyActive = true, $excludeCurrent = true) {        
        return self::getSiblingsByTreepath($treepath.CatalogTreePath::EMPTY_ID.CatalogTreePath::DELIMITER, $onlyActive, $excludeCurrent);       
    }
    
    /**
     * 
     * @param int $treepath
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getChildrenIDByTreepath($treepath, $onlyActive = true, $excludeCurrent = true) {        
        return self::getSiblingsIDByTreepath($treepath.CatalogTreePath::EMPTY_ID.CatalogTreePath::DELIMITER, $onlyActive, $excludeCurrent);       
    }
        
    /**
     * 
     * @param int $categoryID
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getParentsByID($categoryID = 0, $excludeCurrent = true) {
        $subquery = '(SELECT CONCAT(treepath, "'.CatalogTreePath::EMPTY_ID.'") FROM '.MAIN_TABLE.' WHERE id='.$categoryID.')';
        $where = 'WHERE FIND_IN_SET(id, '.$subquery.')>0'.($excludeCurrent ? ' AND id<>"'.$categoryID.'"' : '');
        return getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY treepath');   
    }
    
    /**
     * 
     * @param int $categoryID
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getParentsIDByID($categoryID = 0, $excludeCurrent = true) {
        $subquery = '(SELECT CONCAT(treepath, "'.CatalogTreePath::EMPTY_ID.'") FROM '.MAIN_TABLE.' WHERE id='.$categoryID.')';
        $where = 'WHERE FIND_IN_SET(id, '.$subquery.')>0'.($excludeCurrent ? ' AND id<>"'.$categoryID.'"' : '');
        return getArrValueFromDB(MAIN_TABLE, 'id', $where);   
    }
    
    /**
     * 
     * @param string $treepath
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getParentsByTreepath($treepath, $excludeCurrent = true) {
        $where = 'WHERE id IN ('.CatalogTreePath::toSelect($treepath).')'.($excludeCurrent ? ' AND treepath<>"'.$treepath.'"' : '');
        return getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY treepath');
    }
    
    /**
     * 
     * @param string $treepath
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getParentsIDByTreepath($treepath, $excludeCurrent = true) {
        $where = 'WHERE id IN ('.CatalogTreePath::toSelect($treepath).')'.($excludeCurrent ? ' AND treepath<>"'.$treepath.'"' : '');
        return getArrValueFromDB(MAIN_TABLE, 'id', $where);
    }
    
    /**
     * 
     * @param int $categoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getSiblingsByID($categoryID = 0, $onlyActive = true, $excludeCurrent = true) {
        $treepath = 'REPLACE((SELECT treepath FROM '.MAIN_TABLE.' WHERE id='.$categoryID.'), "'.$categoryID.CatalogTreePath::DELIMITER.'", "")';        
        $where = 'WHERE treepath = CONCAT('.$treepath.', id, "'.CatalogTreePath::DELIMITER.'")';
        $where .= ($excludeCurrent ? ' AND id<>"'.$categoryID.'"' : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY treepath'); 
    }
    
    /**
     * 
     * @param string $treepath
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getSiblingsByTreepath($treepath, $onlyActive = true, $excludeCurrent = true) {    
        $where = 'WHERE ';
        if(($pos = strrpos(CatalogTreePath::toSelect($treepath), CatalogTreePath::DELIMITER, -1)) > 0) {
            $where .= 'treepath = CONCAT("'.substr($treepath, 0, $pos).'", "'.CatalogTreePath::DELIMITER.'", id, "'.CatalogTreePath::DELIMITER.'")';
        } else {
            $where .= 'pid='.CatalogTreePath::ROOT_ID;
        }
        $where .= ($excludeCurrent ? ' AND treepath<>"'.$treepath.'"' : '');
        $where .= ($onlyActive ? ' AND active=1' : '');        
        return getRowItemsInKey('id', MAIN_TABLE, self::FIELDS, $where, 'ORDER BY treepath'); 
    }
    
    /**
     * 
     * @param int $categoryID
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getSiblingsIDByID($categoryID = 0, $onlyActive = true, $excludeCurrent = true) {
        $treepath = 'REPLACE((SELECT treepath FROM '.MAIN_TABLE.' WHERE id='.$categoryID.'), "'.$categoryID.CatalogTreePath::DELIMITER.'", "")';        
        $where = 'WHERE treepath = CONCAT('.$treepath.', id, "'.CatalogTreePath::DELIMITER.'")';
        $where .= ($excludeCurrent ? ' AND id<>"'.$categoryID.'"' : '');
        $where .= ($onlyActive ? ' AND active=1' : '');
        return getArrValueFromDB(MAIN_TABLE, 'id', $where); 
    }
        
    /**
     * 
     * @param string $treepath
     * @param bool $onlyActive
     * @param bool $excludeCurrent
     * @return array
     */
    public static function getSiblingsIDByTreepath($treepath, $onlyActive = true, $excludeCurrent = true) { 
        $parentTreePath = CatalogTreePath::getParent($treepath);
        $where = 'WHERE ' . ($parentTreePath ? 'treepath = CONCAT("'.$parentTreePath.'", id, "'.CatalogTreePath::DELIMITER.'")' : 'pid='.CatalogTreePath::ROOT_ID);
        if ($excludeCurrent) $where .= ' AND treepath<>"'.$treepath.'"';
        if ($onlyActive) $where .= ' AND active=1';
        return getArrValueFromDB(MAIN_TABLE, 'id', $where); 
    }
    
    /**
     * 
     * @param int $categoryID
     * @param int $moduleRootID
     * @return array
     */
    public static function getBaseCategoryByID($categoryID, $moduleRootID) {
        if($categoryID == $moduleRootID) {
            return array();
        } else {
            $subquery = '(SELECT CONCAT(treepath, "'.CatalogTreePath::EMPTY_ID.'") FROM '.MAIN_TABLE.' WHERE id='.$categoryID.')';
            $where = 'WHERE FIND_IN_SET(id, '.$subquery.')>0 AND pid='.$moduleRootID;
            return getItemRow(MAIN_TABLE, '*', $where, 'ORDER BY treepath');
        }
    }
    
    /**
     * 
     * @param string $treepath
     * @param int $moduleRootID
     * @return array
     */
    public static function getBaseCategoryByTreepath($treepath, $moduleRootID) {
        $where = 'WHERE id IN('.CatalogTreePath::toSelect($treepath).') AND pid='.$moduleRootID;
        return getItemRow(MAIN_TABLE, '*', $where, 'ORDER BY treepath');
    }
    
    /**
     * 
     * @param int $categoryID
     * @param int $typeID
     * @param int $valueID
     * @return int
     */
    public static function getChildrenIDByMainProperty($categoryID, $typeID, $valueID) {
        $table = CATEGORY_PROPERTIES_TABLE.' cp LEFT JOIN '.MAIN_TABLE.' m ON cp.category_id=m.id';
        $subquery = '(SELECT treepath FROM '.MAIN_TABLE.' WHERE id='.$categoryID.' LIMIT 1)';
        $where = 'WHERE cp.type_id='.$typeID.' AND cp.value_id='.$valueID.' AND m.treepath = CONCAT('.$subquery.', m.id, "'.CatalogTreePath::DELIMITER.'")';
        return getValueFromDB($table, 'cp.category_id', $where);
    }
    
    /**
     * @param string $treepath
     * @param int $typeID
     * @param int $valueID
     * @return array
     */
    public static function getChildByMainProperty($treepath, $typeID, $valueID, $onlyActive = true, $withOptionTitle = false) {
        $select = 't.*';
        $table = MAIN_TABLE.' t JOIN '.CATEGORY_PROPERTIES_TABLE.' cpt ON cpt.`category_id`=t.`id` AND cpt.`type_id`='.$typeID.' AND cpt.`value_id`='.$valueID;
        $where = 'WHERE t.`treepath` = CONCAT("'.$treepath.'", t.`id`, "'.CatalogTreePath::DELIMITER.'")';
        if ($onlyActive) $where .= ' AND t.`active`=1';
        switch ($withOptionTitle ? $typeID : CatalogMainProperty::TYPE_UNDEFINED) {
            case CatalogMainProperty::TYPE_HIT:
            case CatalogMainProperty::TYPE_NEW:
            case CatalogMainProperty::TYPE_TOP:
            case CatalogMainProperty::TYPE_STOCK:
            case CatalogMainProperty::TYPE_SALE:
            case CatalogMainProperty::TYPE_REVIEW:
                $select .= ', (SELECT `title` FROM '.CATEGORY_PROPERTIES_TYPES_TABLE.' WHERE `id`='.$typeID.' LIMIT 1) `optionTitle`';
                break;
            case CatalogMainProperty::TYPE_ATTRIBUTE:
                $select .= ', (SELECT `title` FROM '.ATTRIBUTES_VALUES_TABLE.' WHERE `id`='.$valueID.' LIMIT 1) `optionTitle`';
                break;
            case CatalogMainProperty::TYPE_BRAND:
                $select .= ', (SELECT `title` FROM '.BRANDS_TABLE.' WHERE `id`='.$valueID.' LIMIT 1) `optionTitle`';
                break;
            case CatalogMainProperty::TYPE_SERIES:
                $select .= ', (SELECT `title` FROM '.SERIES_TABLE.' WHERE `id`='.$valueID.' LIMIT 1) `optionTitle`';
                break;
            default:
                $select .= ', "" `optionTitle`';
                break;
        }
        return getItemRow($table, $select, $where);
    }
    
    /**
     * 
     * @param DB $DB
     * @param int $moduleRootID
     * @param int $categoryID
     * @param inr $brandID
     * @param int $seriesID
     */
    public static function createManufacturerCategories($DB, $moduleRootID, $categoryID, $brandID, $seriesID) {
        $arCategory = self::getCategory($categoryID);
        $baseCategory = self::getBaseCategoryByTreepath($arCategory['treepath'], $moduleRootID);
        if($arCategory && $baseCategory) {
            $CatalogManufacturer = new CatalogManufacturer($DB, $brandID, $seriesID, $arCategory['treepath']);
            //выкидываем из трипаса все до базового трипаса
            if (($treepath = str_replace(CatalogTreePath::getParent($baseCategory['treepath']), '', $arCategory['treepath']))) {
                // по каждому уровню трипаса колбасим дочерние элементы
                foreach(CatalogTreePath::toArray($treepath) as $cid) {
                    // манипуляции с дочерними категориями
                    $CatalogManufacturer->createLevel($cid);
                }
            }
        }
    }

    /*
     * Получение ключевых пропертей для категории и всей ветке ее родителей
     * property_type => array(property_attribute => array(id => val, id=>val) , )
     * property_type => valueID
    */
    private static function _getBranchMainProperties(array $propertyRows) {
        $data = array('branch' => new CatalogMainProperties(), 'branches' => array(), 'properties' => array());
        foreach($propertyRows as $row) {
            // создаем свойство
            $property = new CatalogMainProperty($row['type_id'], $row['value_id'], $row['category_id'], $row['attribute_id']);
            // добавляем его к массиву свойств по категории
            $data['properties'][$row['category_id']] = $property;
            // добавляем его к ветке свойств
            $data['branch']->add($property);
            // добавляем ветку по категории
            $data['branches'][$row['category_id']] = clone $data['branch'];
        }
        return $data;
    }

    /*
     * Получение ключевых пропертей для категории и всей ветке ее родителей
     * property_type => array(property_attribute => array(id => val, id=>val) , )
     * property_type => valueID
    */
    private static function getBranchAllMainProperties($treepath, $excludeCurrent = false) {
        $table = MAIN_TABLE . ' t LEFT JOIN '.CATEGORY_PROPERTIES_TABLE.' cpt ON cpt.`category_id`=t.`id`';
        $inset = 'FIND_IN_SET(t.`id`, "'.CatalogTreePath::toSelect($treepath).'")';
        $where = $inset.'>0 AND `module`="catalog"'.($excludeCurrent ? ' AND t.`id`<>"'.CatalogTreePath::getCategoryID($treepath).'"' : '');
        return self::_getBranchMainProperties(getRowItems($table, 't.`treepath`, cpt.*', $where, $inset));
    }
    
    /*
     * Получение ключевых пропертей для категории и всей ветке ее родителей
     * property_type => array(property_attribute => array(id => val, id=>val) , )
     * property_type => valueID
    */
    private static function getBranchActualMainProperties($treepath, $excludeCurrent = false) {        
        $inset = 'FIND_IN_SET(category_id, "'.CatalogTreePath::toSelect($treepath).'")';
        $where = $inset.'>0'.($excludeCurrent ? ' AND category_id<>"'.CatalogTreePath::getCategoryID($treepath).'"' : '');
        return self::_getBranchMainProperties(getRowItems(CATEGORY_PROPERTIES_TABLE, '*', $where, $inset));
    }
    
    /*
     * Получение дочерних ключевых пропертей для категории
     * property_type => array(property_attribute => array(id => val, id=>val) , )
     * property_type => valueID
    */
    private static function getChildrenPropertiesByTreepath($treepath, $onlyActive = true, $excludeID = 0) {        
        if($treepath){
            $where = 't.`treepath` = CONCAT("'.$treepath.'", t.`id`, "'.CatalogTreePath::DELIMITER.'")';
            if($onlyActive) $where .= ' AND t.`active`=1';
            if($excludeID) $where .= ' AND t.`id`<>'.$excludeID;
            return getRowItems(MAIN_TABLE.' t LEFT JOIN '.CATEGORY_PROPERTIES_TABLE.' cpt ON cpt.`category_id`=t.`id`', 't.`treepath`, cpt.*', $where, 't.`order`');
        }
        return array();
    }
    
    /*
     * Получение всех актуальных дочерних ключевых пропертей для категории
     * property_type => array(property_attribute => array(id => val, id=>val) , )
     * property_type => valueID
    */
    private static function getAllActualChildrenPropertiesByTreepathes(array $treepathes, $onlyActive = true, array $excludeIDSet = array()) {        
        if($treepathes){
            $conditions = $likes = array();
            // исключаем неактивные 
            if($onlyActive) $conditions[] = 't.`active`=1';
            // исключаем которые нужно исключить
            if($excludeIDSet) $conditions[] = 't.`id` NOT IN ('.implode(',', $excludeIDSet).')';
            // перебираем treepath для построения OR запроса с использование LIKE 
            // добавляем в конец treepath _% для того чтобы только дочерних подхватывало
            foreach($treepathes as $treepath){
                $likes[] = 't.`treepath` LIKE "'.$treepath.'_%"';
            }
            $conditions[] = '(' . implode(' OR ', $likes) . ')';
            return getRowItems(MAIN_TABLE.' t INNER JOIN '.CATEGORY_PROPERTIES_TABLE.' cpt ON cpt.`category_id`=t.`id`', 't.`treepath`, cpt.*', implode(' AND ', $conditions), 't.`order`');
        }
        return array();
    }
    
    public static function isUniqBranchMainProperties($ptreepath, $ctreepath, $typeID, $valueID, $attrID = 0) {     
        // _% добавляем к текущей ($ctreepath) катеории чтобы получить только дочерние категории и не получить свойства самого себя
        $subquery = 'SELECT id FROM '.MAIN_TABLE.' WHERE treepath LIKE "'.$ctreepath.'_%" OR FIND_IN_SET(id, "'.$ptreepath.CatalogTreePath::EMPTY_ID.'")>0';
        $condition = 'value_id='.$valueID;
        if($attrID > 0) $condition = '('.$condition.' OR attribute_id='.$attrID.')';
        $query = 'SELECT id FROM '.CATEGORY_PROPERTIES_TABLE.' WHERE category_id IN('.$subquery.') AND type_id='.$typeID.' AND '.$condition.' GROUP BY type_id, value_id HAVING COUNT(id)>0';  
        $result = mysql_query($query);
        return ($result && mysql_num_rows($result) == 0);      
    }
    
    public static function isUniqLevelMainProperties($treepath, $typeID, $valueID, $excludeID = 0) {
        $arProperties = self::getChildrenPropertiesByTreepath($treepath, false, $excludeID);
        foreach($arProperties as $property) {
            if($property['treepath'] != $treepath && $property['type_id'] == $typeID && $property['value_id'] == $valueID) {
                return false;
            }
        }
        return true;
    }
    
    public static function checkCategory($itemID = 0, $arSaveData) {
        //определяем нужные значения из сохраняемых данных
        $type = isset($arSaveData['property_type']) ? $arSaveData['property_type'] : 0;
        $value = isset($arSaveData['property_value']) ? $arSaveData['property_value'] : 0;
        $attr = isset($arSaveData['property_attribute']) ? $arSaveData['property_attribute'] : 0;
        
        // родительская категория
        $arParent = CatalogHelper::getCategory($arSaveData['pid']);
        // Инициализируем ключевые свойства для родителя
        CatalogHelper::initProperties($arParent, false, false);
        $arParent['mainProperties']->add(new CatalogMainProperty($type, $value, $itemID, $attr));
        
        if(!($arErrors = $arParent['mainProperties']->getErrors())) {
            // добавляем базовую проверку на существование такого же свойства в добавляемый уровень
            // одинаковая проверка и для новой и для существующей категории
            if (!self::isUniqLevelMainProperties($arParent['treepath'], $type, $value, $itemID)) {
                $arErrors[] = 'Нельзя добавить категорию с выбранным ключевым свойством так как эти свойства уже используются в этом уровне!';
            }
            //если редактирование категории
            elseif($itemID > 0) {
                // получаем данные текущей категории
                if(!($arCategory = CatalogHelper::getCategory($itemID))){
                    $arErrors[] = 'По какой то причине не удалось получить данные о редактируемой категории!';
                }
                //проверяем дочерние категории и родительские, уровень на уникальность ключевых свойств
                elseif(!self::isUniqBranchMainProperties($arParent['treepath'], $arCategory['treepath'], $type, $value, $attr)) {
                    $arErrors[] = 'Нельзя добавить категорию с выбранными ключевыми свойствами в эту ветку, так как выбранные свойства уже используются!';
                }
            }
        }
        return $arErrors;
    }
    
    /**
     * 
     * @param array $arCategory
     * @param bool $onlyActive
     * @param bool $forFrontend
     * @return array
     */
    public static function initProperties(array & $arCategory, $onlyActive = true, $forFrontend = true) {
        // получаем все данные по свойствам на ветке
        $data = $forFrontend ? self::getBranchActualMainProperties($arCategory['treepath']) : self::getBranchAllMainProperties($arCategory['treepath']);
        // создаем основное свойство категории
        $arCategory['mainProperty'] = isset($data['properties'][$arCategory['id']]) ? $data['properties'][$arCategory['id']] : new CatalogMainProperty();
        // создаем список свойств ветки до текущего узла
        $arCategory['mainProperties'] = $data['branch'];
        // добавляем дочерние свойства если это не для админки
        if($forFrontend){
            /** @tutorial 
             * Реорганизация работы по ключевым свойствам!!!!!!!!!!!!!!!!!!!!!!!
             * Логика следующая:
             * 1) Если Текущее свойство корректное - запоминаем в массив его treepath
             * 2) Если текущее свойство НЕ корректное - ищем в дочерних свойствах первое корректное и 
             *  а) добавляем его к mainProperties как обычное, т.е через ->add($property);
             *  б) запоминаем в массив его treepath 
             * 3) По всем найденным treepath получаем все дочерние свойства на всех их подуровнях одним запросом и 
             *    добавляем в mainProperties как дочерние через ->addChild($property);
             *  4) Переписать построитель запросов таким образом, чтобы из mainProperties строил запросы через AND а дочерние - через  IN и OR
             *     Также нужно добавить чтобы в mainProperty были бренды, серии, атрибуты и опции в множественном числе  
             */
            $treepathes = $rows = array();
            if($arCategory['mainProperty']->isCorrect()){
                $treepathes[] = $arCategory['treepath'];
            } else {
                $rows = self::getChildrenPropertiesByTreepath($arCategory['treepath'], $onlyActive);
            }
            while (NULL !== ($row = array_shift($rows))) {
                // создаем свойство
                $property = new CatalogMainProperty($row['type_id'], $row['value_id'], $row['attribute_id'], $row['category_id']);
                if($property->isCorrect()) {
                    $treepathes[] = $row['treepath'];
                    $arCategory['mainProperties']->addChild($property, false);
                } else {
                    $rows = array_merge($rows, self::getChildrenPropertiesByTreepath($row['treepath'], $onlyActive));
                }
            }
            // теперь получаем все дочерние по трипасам
            foreach (self::getAllActualChildrenPropertiesByTreepathes($treepathes, $onlyActive) as $row) {
                // создаем свойство
                $property = new CatalogMainProperty($row['type_id'], $row['value_id'], $row['attribute_id'], $row['category_id']);
                if($property->isCorrect()) {
                    $arCategory['mainProperties']->addChild($property, false);
                }
            }
        }
        return $arCategory['mainProperties']->getErrors();
    }
    
    /**
     * @param CatalogQueryBuilder $QB
     * @param string $orderCondition
     * @param bool $enableGroupConcat
     * @param string $separator
     * @return string
     */
    public static function getBaseProductsSet(CatalogQueryBuilder $QB, $orderCondition='', $enableGroupConcat = false, $separator = ',') {
        if($orderCondition) $orderCondition = ' ORDER BY ' . $orderCondition;
        if ($enableGroupConcat) {
            $query = $QB->getQuery('GROUP_CONCAT(DISTINCT t.`id` ORDER BY t.`id` SEPARATOR "' . $separator . '") items') . $orderCondition;
            $result = mysql_query($query);
            if ($result && mysql_num_rows($result) > 0 && ($items = mysql_result($result, 0))) {
                return $items;
            }
        } else {
            $query = $QB->getQuery('DISTINCT t.`id`') . $orderCondition;
            $result = mysql_query($query);
            if ($result && ($cnt = mysql_num_rows($result)) > 0) {
                $items = array();
                for ($i = 0; $i < $cnt; $i++) {
                    $items[] = mysql_result($result, $i);
                }
                return implode($separator, $items);
            }
        }
        return '0';
    }
    
    /**
     * @param array $arCategory
     * @return string
     */
    public static function getCategoryProductsSet(array $arCategory) {
        return self::getBaseProductsSet($arCategory['mainProperties']->getQueryBuilder($arCategory['treepath'], $arCategory['mainProperty']->isOption()));
    }
    /**
     * @param array $arBrand
     * @param array $arCategory
     * @return string
     */
    public static function getBrandedProductsSet(array $arBrand, array $arCategory = null) {
        $properties = array (
            'brandID' => $arBrand['id'],
            'treepath' => ($arCategory && $arCategory['treepath']) ? $arCategory['treepath'] : '',
        );
        return self::getBaseProductsSet(new CatalogCommonQueryBuilder($properties));
    }
    /**
     * @param string $searchtext
     * @return string
     */
    public static function getSearchedProductsSet($searchtext) {
        $QB = new CatalogSearchQueryBuilder(array('searchtext' => $searchtext));
        return $QB->getSearchWordsCount()>0 ? self::getBaseProductsSet($QB, 't.`available` DESC, ' . $QB->getOrderCondition() . ', t.`title`, t.`order`') : '0';
    }
    /**
     *
     * @param String $productsSet
     * @param String $filterСonditions
     * @param String $order
     * @param String $limit
     * @param boolean $onlyCnt
     * @return String
     */
    public static function getProductItemsSelectSql($productsSet, $filterСonditions = '', $order = '', $limit = '', $onlyCnt = false) {
        $QB = new CatalogItemsQueryBuilder(array(
            'productsSet' => $productsSet,
            'filterСonditions' => $filterСonditions,
        ));
        return ($onlyCnt ? $QB->getCountQuery() : $QB->getQuery(CatalogItemsQueryBuilder::getSelect(true)) . " {$order} {$limit}");
    }
    /**
     *
     * @param String $productsSet
     * @param String $filterСonditions
     * @param String $order
     * @param String $limit
     * @param String $module
     * @return String
     */
    public static function getProductItemsSelectResource($productsSet, $filterСonditions = '', $order = '', $limit = '', $module = '') {
        if($productsSet){
            $query = self::getProductItemsSelectSql($productsSet, $filterСonditions, $order, $limit);
            $result = mysql_query($query) or die(strtoupper($module).' SELECT: ' . mysql_error());
            if(mysql_num_rows($result) > 0) {
                return $result;
            }
        }
        return null;
    }
    /**
     *
     * @param String $productsSet
     * @param String $filterСonditions
     * @return int
     */
    public static function getProductItemsCount($productsSet, $filterСonditions = '') {
        $query = self::getProductItemsSelectSql($productsSet, $filterСonditions, '', '', true);
        return ($productsSet && ($result = mysql_query($query)) && mysql_num_rows($result)>0) ? (int)mysql_result($result, 0) : 0;
    }
    
    /**
     * Проверяем используется ли товар в заказах, если да, то его нельзя удалить
     * @param bool $productID
     */
    public static function canDeleteProduct($productID) {
        return (getValueFromDB(ORDER_PRODUCTS_TABLE, 'COUNT(pid)', 'WHERE pid='.$productID, 'cnt') == 0);
    }
    
    /**
     *
     * @param string $treepath
     * @param array $types
     * @return CatalogMainProperty
     */
    public static function getChildrenWithMainPropertiesByTreepath($treepath, array $types = null) {
        $arCategories = array();
        if(($arChildren = self::getChildrenByTreepath($treepath))) {
            $arProperties = getRowItemsInKey('category_id', CATEGORY_PROPERTIES_TABLE, '*', 'WHERE category_id IN('.implode(',', array_keys($arChildren)).')');
            foreach($arProperties as $categoryID => $row) {
                $property = new CatalogMainProperty($row['type_id'], $row['value_id'], $row['category_id'], $row['attribute_id']);
                if(!$types || ($property->isCorrect() && in_array($row['type_id'], $types))) {
                    $arChildren[$categoryID]['mainProperty'] = $property;
                    $arCategories[$property->getKey()] = $arChildren[$categoryID];
                }
            }           
        }
        return $arCategories;
    }

    /**
     * @param array $arCategory
     * @param int $brandID
     * @param int $seriesID
     * @return array
     */
    public static function getProductBrandSeriesCategories(array $arCategory, $brandID, $seriesID) {
        $categories = array();
        if($arCategory && $brandID && ($row = self::getChildByMainProperty($arCategory['treepath'], CatalogMainProperty::TYPE_BRAND, $brandID))){
            $categories[] = $row;
            if($seriesID && ($row = self::getChildByMainProperty($row['treepath'], CatalogMainProperty::TYPE_SERIES, $seriesID))){
                $categories[] = $row;
            }
        }
        return $categories;
    }
    
    public static function testFunctions() {
//        echo 'createTreePath:'.self::createTreePath(143)."\n";        
//        echo 'generateRecursiveTreePath:'.self::generateRecursiveTreePath()."\n";  
//        echo 'getCategory :'.var_export(self::getCategory(143), 1)."\n";  
//        echo 'getCategoryByModule: '.var_export(self::getCategoryByModule('catalog'), 1)."\n";     
//        echo 'getParent :'.var_export(self::getParent(143), 1)."\n";   
//        echo 'getParentID :'.var_export(self::getParentID(143), 1)."\n";  
//        echo 'getParentTreepath :'.var_export(self::getParentTreepath(143), 1)."\n";      
//        echo 'isParentByID :'.var_export(self::isParentByID(18, 143), 1)."\n";        
//        echo 'isParentByTreepath :'.var_export(self::isParentByTreepath(18, '0,18,64,'), 1)."\n";        
//        echo 'isActiveParentsByID :'.var_export(self::isActiveParentsByID(64), 1)."\n";        
//        echo 'isActiveParentsByTreepath :'.var_export(self::isActiveParentsByTreepath('0,18,64,'), 1)."\n";        
//        echo 'getTreeByID :'.var_export(self::getTreeByID(138), 1)."\n";        
//        echo 'getTreeByTreepath :'.var_export(self::getTreeByTreepath('0,18,'), 1)."\n";      
//        echo 'getMenu: '.var_export(self::getMenu(0, 2, 1), 1)."\n"; 
//        echo 'getCategoryPathByID :'.var_export(self::getCategoryPathByID(138), 1)."\n";        
//        echo 'getCategoryPathByTreepath :'.var_export(self::getCategoryPathByTreepath('0,18,64,80,', true), 1)."\n";   
//        echo 'getAllChildrenByID :'.var_export(self::getAllChildrenByID(18, true), 1)."\n"; 
//        echo 'getAllChildrenByTreepath :'.var_export(self::getChildrenByTreepath('0,18,64,80,', true), 1)."\n"; 
//        echo 'getAllChildrenIDByID :'.var_export(self::getAllChildrenIDByID(64, true), 1)."\n"; 
//        echo 'getAllChildrenIDByTreepath :'.var_export(self::getAllChildrenIDByTreepath('0,18,64,80,', true), 1)."\n"; 
//        echo 'getChildrenByID :'.var_export(self::getChildrenByID(138), 1)."\n";        
//        echo 'getChildrenByTreepath :'.var_export(self::getChildrenByTreepath('0,18,64,80,', true), 1)."\n";   
//        echo 'getParentsByID :'.var_export(self::getParentsByID(80), 1)."\n";        
//        echo 'getParentsByTreepath :'.var_export(self::getParentsByTreepath('0,18,64,80,'), 1)."\n";        
//        echo 'getSiblingsByID :'.var_export(self::getSiblingsByID(64, true), 1)."\n";
//        echo 'getSiblingsByTreepath :'.var_export(self::getSiblingsByTreepath('0,18,64,', false), 1)."\n"; 
//        echo 'getSiblingsIDByID :'.var_export(self::getSiblingsByID(64, true), 1)."\n";
//        echo 'getSiblingsIDByTreepath :'.var_export(self::getSiblingsByTreepath('0,18,64,', false), 1)."\n";  
//        echo 'getBranchMainPropertiesByID: '.var_export(self::getBranchMainPropertiesByID(151), 1)."\n"; 
//        echo 'getBranchMainPropertiesByTreepath: '.var_export(self::getBranchMainPropertiesByTreepath('0,18,64,80,'), 1)."\n"; 
//        echo 'getCategoryModules: '.var_export(self::getCategoryModules(), 1)."\n"; 
//        echo 'getChildrenWithMainPropertiesByTreepath: '.var_export(self::getChildrenWithMainPropertiesByTreepath('0,18,64,'));
//        echo 'checkLevelMainProperties: '.  var_export(self::checkLevelMainProperties(69, 8, 2));
        die();
    }
}   

class CatalogManufacturer {
    /**
     * массив с данными бренда
     * @var array 
     */
    private $brand;
    
    /**
     * массив с данными серии
     * @var array 
     */
    private $series;    
    
    /**
     *
     * @var type 
     */
    private $_DB;
    
    /**
     * 
     * @param int $brandID
     * @param int $seriesID
     * @param string treepath - category treepath
     */
    public function __construct(DbConnector $DB, $brandID, $seriesID, $treepath = '') {
        $this->_DB = $DB;   
        $idSet = $treepath ? implode(',', array_reverse(CatalogTreePath::toArray($treepath))) : '0';
        $this->brand = (object)$this->fillTypeData(BRANDS_TABLE, $brandID, CatalogMainProperty::TYPE_BRAND, UrlFilters::TYPE_BRAND, $idSet);
        $this->series = (object)$this->fillTypeData(SERIES_TABLE, $seriesID, CatalogMainProperty::TYPE_SERIES, UrlFilters::TYPE_SERIES, $idSet);
    }
    
    /**
     * 
     * @param string $table
     * @param int $itemID
     * @param int $mainPropertyID
     * @param int $filterTypeID
     * @param string $categoryIdSet
     * @return int
     */
    private function fillTypeData($table, $itemID, $mainPropertyID, $filterTypeID, $categoryIdSet) {
        $item = array('id' => $itemID, 'title' => '', 'property_type_id' => $mainPropertyID, 'filter_type_id' => $filterTypeID, 'filter_id' => 0, 'empty' => 1);
        if($itemID){
            static $items = array();
            $key = $mainPropertyID.'_'.$itemID;
            if(array_key_exists($key, $items)) {
                $item = $items[$key];
            } else {
                $query = 'SELECT f.id FROM '.CATEGORY_FILTERS_TABLE.' ca '
                       . 'LEFT JOIN '.FILTERS_TABLE.' f ON f.id=ca.fid '
                       . 'WHERE f.tid='.$filterTypeID.' AND FIND_IN_SET(ca.cid, "'.$categoryIdSet.'")>0 '
                       . 'ORDER BY FIND_IN_SET(ca.cid, "'.$categoryIdSet.'") LIMIT 1';
                if(($obj = getItemObj($table, 'title,('.$query.') fid', 'WHERE id='.$itemID))) {
                    $item['empty'] = 0;
                    $item['title'] = $obj->title;
                    $item['filter_id'] = $obj->fid;
                    $items[$key] = $item;
                }
            }
        }
        return $item;
    }
    
    /**
     * 
     * @return array
     */
    public function getBrand() {
        return $this->brand;
    }
    
    /**
     * 
     * @return array
     */
    public function getSeries() {
        return $this->series;
    }
    
    /**
     * 
     * @param array $brand
     * @return CatalogManufacturer
     */
    public function setBrand($brand) {
        $this->brand = $brand;
        return $this;
    }
    
    /**
     * 
     * @param array $series
     * @return CatalogManufacturer
     */
    public function setSeries($series) {
        $this->series = $series;
        return $this;
    }
    
    /**
     * 
     * @return int
     */
    public function createEmptyCategory() {
        return $this->_DB->postToDB(array('created' => date('Y-m-d H:i:s')), MAIN_TABLE);
    }
    
    /**
     * 
     * @param object $typeObj
     * @return array
     */
    public function getFilterTitles($typeObj) {
        $arTitles = array();
        if(!$typeObj->empty) {
            $arTitles[$typeObj->filter_id] = $typeObj->title;
        }
        return $arTitles;
    }
    
    /**
     * 
     * @param array $arCategory
     * @param object $typeObj
     * @return array
     */
    public function copyCategory($arCategory, $typeObj) {   
        $category = array(
            'pid'        => $arCategory['id'],   
            'pagetype'   => $arCategory['pagetype'],
            'menutype'   => 0,
            'module'     => $arCategory['module'],
            'navtitle'   => $typeObj->title,
            'titlecase'  => $arCategory['titlecase'],
            'essential'  => 0,
            'order'      => getMaxPosition($arCategory['id'], 'order', 'pid', MAIN_TABLE),
            'active'     => $arCategory['active'],
            'access'     => $arCategory['access'],
            'created'    => date('Y-m-d H:i:s')
        );  
        $this->prepareCategorySeo($category, $arCategory, $typeObj);
        return $category;
    }
    
    /**
     * 
     * @param array $category - new category
     * @param array $arCategory - parent category
     * @param object $typeObj - type object (brand|series)
     */
    public function prepareCategorySeo(&$category, $arCategory, $typeObj) {
        $seoFilters = $this->getFilterTitles($typeObj);
        if (!empty($seoFilters)) {
            foreach(CatalogHelper::getFieldsToSEOFieldsRelations() as $field => $seofield) {
                if(!empty($arCategory[$seofield])) {
                    $category[$field] = PHPHelper::BuildFilterMetaData($arCategory[$seofield], $seoFilters);
                    $category[$seofield] = PHPHelper::BuildFilterMetaData($arCategory[$seofield], $seoFilters, false, false);
                } else if($field == 'title' && !$typeObj->empty){
                    $category[$field] = $arCategory['title'].' '.$typeObj->title;     
                } else if($field != 'title' && !$typeObj->empty && strpos($arCategory[$field], $arCategory['title']) !== false){
                    $category[$field] = str_replace($arCategory['title'], $arCategory['title'].' '.$typeObj->title, $arCategory[$field]);             
                } else {
                    $category[$field] = $arCategory[$field];
                }
            }
        }    
    }
    
    /**
     * 
     * @param array $arParent
     * @param object $typeObj
     * @return array
     */  
    public function createCategory($arParent, $typeObj) {
        if(($categoryID = $this->createEmptyCategory())) {
            $arCategory = $this->copyCategory(unScreenData($arParent), $typeObj);
            $arCategory['id'] = $categoryID;
            $arCategory['treepath'] = CatalogHelper::createTreePath($categoryID, $arParent['treepath']);
            $arCategory['seo_path'] = UrlWL::generateIdentifySeoPath($categoryID, UrlWL::CATEGORY_SEOPREFIX);         
            $this->_DB->postToDB($arCategory, MAIN_TABLE, 'WHERE `id`='.$categoryID, array('id'), 'update', true);                
            $this->_DB->postToDB(array(
                'category_id' => $categoryID,
                'type_id' => $typeObj->property_type_id,
                'attribute_id' => NULL,
                'value_id' => $typeObj->id
            ), CATEGORY_PROPERTIES_TABLE);
            return $arCategory;
        }
        return array();
    }

    /**
     * @param int $levelCategoryID
    */
    public function createLevel($levelCategoryID) {
        //если не найдена среди дочерних категорий категория по бренду, то создаем
        if($this->getBrand()->id && !($brandCategoryID = CatalogHelper::getChildrenIDByMainProperty($levelCategoryID, CatalogMainProperty::TYPE_BRAND, $this->getBrand()->id))) {
            $arCategory = CatalogHelper::getCategory($levelCategoryID);
            //создаем категорию по бренду
            if(($arBrandCategory = $this->createCategory($arCategory, $this->getBrand())) && $this->getSeries()->id) {
                //создаем категорию по серии
                $this->createCategory($arBrandCategory, $this->getSeries());
            }
        //иначе, ищем в дочерних категории по бренду категорию по серии, если она не найдена, то создаем
        } else if($this->getSeries()->id && !($seriesCategoryID = CatalogHelper::getChildrenIDByMainProperty($brandCategoryID, CatalogMainProperty::TYPE_SERIES, $this->getSeries()->id))) {
            $arBrandCategory = CatalogHelper::getCategory($brandCategoryID);
            $this->createCategory($arBrandCategory, $this->getSeries());
        }
    }
}

class CatalogMainProperty {
    /**
     * @var int category main property hit type id
     */
    const TYPE_UNDEFINED = 0;
    
    /**
     * @var int category main property hit type id
     */
    const TYPE_HIT = 1;
    
    /**
     * @var int category main property new type id
     */
    const TYPE_NEW = 2;
    
    /**
     * @var int category main property top type id
     */
    const TYPE_TOP = 3;
    
    /**
     * @var int category main property stock type id
     */
    const TYPE_STOCK = 4;
    
    /**
     * @var int category main property sale type id
     */
    const TYPE_SALE = 5;
    
    /**
     * @var int category main property review type id
     */
    const TYPE_REVIEW = 6;
    
    /**
     * @var int category main property attribute type id
     */
    const TYPE_ATTRIBUTE = 7;
    
    /**
     * @var int category main property brand type id
     */
    const TYPE_BRAND = 8;
    
    /**
     * @var int category main property series type id
     */
    const TYPE_SERIES = 9;
    
    static public $ESENTIAL_TYPES = array(
        self::TYPE_BRAND,
        self::TYPE_SERIES,
        self::TYPE_ATTRIBUTE,
    );
    
    private $typeID;
    private $valueID;
    private $categoryID;
    private $attributeID;
    private $isAuto;
    private $isEmpty;
    
    private static $OPTIONS = array(self::TYPE_HIT, self::TYPE_NEW, self::TYPE_TOP, self::TYPE_STOCK, self::TYPE_SALE, self::TYPE_REVIEW);
    
    public function __construct($typeID=0, $valueID=0, $categoryID=0, $attributeID=0) {
        $this->attributeID = $this->valueID = 0;
        $this->isAuto = $this->isEmpty = false;
        $this->categoryID = (int)$categoryID;
        switch ($typeID) {
            case self::TYPE_HIT:
            case self::TYPE_NEW:
            case self::TYPE_TOP:
            case self::TYPE_STOCK:
            case self::TYPE_SALE:
            case self::TYPE_REVIEW:
                $this->typeID = (int)$typeID;
                $this->isEmpty = true;
                break;
            case self::TYPE_ATTRIBUTE:
                $this->typeID = (int)$typeID;
                $this->valueID = (int)$valueID;
                $this->attributeID = (int)$attributeID;
                break;
            case self::TYPE_BRAND:
            case self::TYPE_SERIES:
                $this->typeID = (int)$typeID;
                $this->valueID = (int)$valueID;
                $this->isAuto = true;
                if($typeID==self::TYPE_SERIES){
                    $this->isEmpty = true;
                }
                break;
            default:
                $this->typeID = $typeID > 0 ? self::TYPE_UNDEFINED : null;
                break;
        }
    }
    
    public function getTypeID() {
        return $this->typeID;
    }
    
    public function getCategoryID() {
        return $this->categoryID;
    }

    public function getAttributeID() {
        return $this->attributeID;
    }

    public function getValueID() {
        return $this->valueID;
    }

    public function getKey() {
        return $this->typeID . '_' . $this->valueID;
    }

    public static function getOptionsSet($separator = ',') {
        return implode($separator, self::$OPTIONS);
    }
    /**
     * Проверяет, является ли данный обьект с ошибочным typeID в MainProperty 
     * @return bool
     */
    public function isNull() {
        return ($this->typeID === null);
    }
    /**
     * Проверяет, является ли данный обьект с неустановленным typeID в MainProperty 
     * @return bool
     */
    public function isUndefine() {
        return ($this->typeID === self::TYPE_UNDEFINED);
    }
    /**
     * Проверяет, является ли данный обьект со свойством, которое подразумевает автоматическую установку
     * @return bool
     */
    public function isAuto() {
        return $this->isAuto;
    }
    /**
     * Проверяет, является ли данный обьект со свойством, которое подразумевает невозможность установить дочерние елементы
     * @return bool
     */
    public function isEmpty() {
        return $this->isEmpty;
    }
    /**
     * Проверяет, является ли данный обьект со свойством, которое определено правильно и можно использовать
     * @return bool
     */
    public function isCorrect() {
        return !($this->isNull() || $this->isUndefine());
    }

    public function isOption() {
        return in_array($this->typeID, self::$OPTIONS);
    }

    public function isAttribute() {
        return ($this->typeID == self::TYPE_ATTRIBUTE);
    }

    public function isBrand() {
        return ($this->typeID == self::TYPE_BRAND);
    }

    public function isSeries() {
        return ($this->typeID == self::TYPE_SERIES);
    }

    public function checkOption() {
        return $this->isOption();
    }

    public function checkAttribute() {
        return ($this->attributeID > 0 && $this->checkValue());
    }

    public function checkBrand() {
        return $this->checkValue();
    }

    public function checkSeries() {
        return $this->checkValue();
    }

    public function checkValue() {
        return ($this->valueID > 0);
    }

    /**
     * Метод для самопроверки значений свойства
     * @return string error message
     */
    public function validate() {
        if ($this->isAttribute() && !$this->checkAttribute()){
            return 'Не определен ID атрибута или значение атрибута';
        } elseif ($this->isBrand() && !$this->checkBrand()){
            return 'Не определен ID бренда';
        } elseif ($this->isSeries() && !$this->checkSeries()){
            return 'Не определен ID серии';
        } elseif ($this->isUndefine()) {
            return 'Некорректно определен тип добавляемого ключевого свойства!';
        } return '';
    }
}

class CatalogMainProperties {
    
    private $brandID; // Бренд на ветке
    private $seriesID; // Серия на ветке
    private $optionID; // Опция - типа Новинка, хит...
    private $attributes; // Атрибуты: ключ - это ид атрибута и значение - это ид значения
    private $errors; // ошибки добавления
    /**
     * @var CatalogMainProperty Последний тип ключевой опции в ветке
     */
    private $lastType;
    /**
     * @var CatalogMainPropertiesSet  Основные и Дочерние свойства
     */
    private $propertiesSet;

    public function __construct() {
        $this->brandID = $this->seriesID = $this->optionID = 0;
        $this->attributes = $this->errors = array();
    }

    public function __clone() {
        if($this->lastType){
            $this->lastType = clone $this->lastType;
        }
        if($this->propertiesSet){
            $this->propertiesSet = clone $this->propertiesSet;
        }
    }
    
    /**
     * @return CatalogMainPropertiesSet
     */
    private function getPropertiesSet() {
        if($this->propertiesSet === null){
            $this->propertiesSet = new CatalogMainPropertiesSet();
        }
        return $this->propertiesSet;
    }

    public function isSetByType($typeID, $valueID=0) {
        $property = new CatalogMainProperty($typeID, $valueID);
        if ($property->isOption()){
            return ($this->optionID == $property->getTypeID());
        } elseif ($property->isAttribute()){
            return in_array($property->getValueID(), $this->attributes);
        } elseif ($property->isBrand()){
            return ($this->brandID == $property->getValueID());
        } elseif ($property->isSeries()){
            return ($this->seriesID == $property->getValueID());
        } else {
            return false;
        }
    }

    public function getBrandID() {
        return $this->brandID;
    }

    public function getSeriesID() {
        return $this->seriesID;
    }

    public function getOptionID() {
        return $this->optionID;
    }

    public function getAttributes() {
        return $this->attributes;
    }

    public function getAllBrands() {
        return array_keys($this->getPropertiesSet()->getBrands());
    }

    public function getAllSeries() {
        return array_keys($this->getPropertiesSet()->getSeries());
    }

    public function getAllOptions() {
        return array_keys($this->getPropertiesSet()->getOptions());
    }

    public function getAllAttributes() {
        return array_keys($this->getPropertiesSet()->getAttributes());
    }


    /**
     * @return CatalogMainPropertiesQueryBuilder
     */
    public function getQueryBuilder($treepath='', $checkAvailable = false) {
        return new CatalogMainPropertiesQueryBuilder(array (
            'treepath' => $treepath,
            'checkAvailable' => $checkAvailable,
            'propertiesSet' => $this->getPropertiesSet(),
        ));
    }
    
    public function getErrors($key = null, $sep = PHP_EOL) {
        $errors = null;
        if($key === null){
            foreach($this->errors as $key => $val){
                $errors[$key] = implode($sep, $val);
            }
        } elseif(array_key_exists($key, $this->errors)){
            $errors = implode($sep, $this->errors[$key]);
        }
        return $errors;
    }
    /**
     * метод для проверки свойства
     * pre-order walk - свойства до текущего узла (включая текущий)
     * post-order walk - свойства после текущего узла
     * @param CatalogMainProperty $property
     * @param bool $isPreOrder
     * @return string error message
     */
    public function validate(CatalogMainProperty $property, $isPreOrder) {
        $error = '';
        // общее правило для любого свойства
        if($this->lastType && $this->lastType->isEmpty()){
            $error = 'Нельзя добавлять новый раздел в категорию где ключевое свойство не подразумевает подразделов!';
        // общая проверка свойства
        } elseif(($mess = $this->getPropertiesSet()->validate($property, $isPreOrder)) != ''){
            $error = $mess;
        // если все еще ошибок нет - то добавляем еще проверки по конкретному типу 
        } elseif ($isPreOrder) {
            if ($property->isOption()){
                // на всяк случай еще раз проверяем, хотя это условие здесь уже не нужно так как есть проверка в $this->getPropertiesSet()->validate()
                if($this->optionID){ 
                    $error = 'Опция уже установлена ранее. Нельзя устанавливать более одной опции на ветку!';
                } elseif($this->lastType && $this->lastType->isAuto()){
                    $error = 'Нельзя добавлять новый раздел в автоматически создаваемые категории!';
                }
            } elseif ($property->isAttribute()){
                // на всяк случай еще раз проверяем, хотя это условие здесь уже не нужно так как есть проверка в $this->getPropertiesSet()->validate()
                // но там идет проверка только по значению атрибута, а здесь идет проверка только по атрибуту!
                if(array_key_exists($property->getAttributeID(), $this->attributes)){
                    $error = 'В ветке уже установлен аналогичный атрибут (нельзя устанавливать один и тот самый атрибут на ветку)!';
                } elseif($this->lastType && $this->lastType->isAuto()){
                    $error = 'Нельзя добавлять новый раздел в автоматически создаваемые категории!';
                }
            } elseif ($property->isBrand()){
                if($this->brandID){
                    $error = 'Ключевое свойство данного типа уже установлено ранее. Нельзя устанавливать более одного бренда на ветку!';
                } elseif($this->seriesID){
                    $error = 'Ключевое свойство данного типа не может быть установлено, так как в родительской ветке уже присуствует серия!';
                } elseif($this->lastType && $this->lastType->isAuto()){
                    $error = 'Нельзя добавлять новый раздел в автоматически создаваемые категории!';
                }
            } elseif ($property->isSeries()){
                if($this->seriesID){
                    $error = 'Ключевое свойство данного типа уже установлено ранее. Нельзя устанавливать более одной серии на ветку!';
                } elseif(!$this->brandID){
                    $error = 'Ключевое свойство бренд еще не установлено. Вначале нужно установить бренд а потом серию!';
                } elseif(!$this->lastType || !$this->lastType->isBrand() || !$this->lastType->checkBrand()){
                    $error = 'Ключевое свойство серии должно быть дочерним бренда!';
                }
            }
        } else {
            if ($this->lastType && $this->lastType->isAuto() && ($property->isOption() || $property->isAttribute() || $property->isBrand())){
                $error = 'Нельзя добавлять новый раздел в автоматически создаваемые категории!';
            } elseif ($property->isSeries()){
                if(!$this->brandID){
                    $error = 'Ключевое свойство бренд еще не установлено. Вначале нужно установить бренд а потом серию!';
                } elseif(!$this->lastType || !$this->lastType->isBrand() || !$this->lastType->checkBrand()){
                    $error = 'Ключевое свойство серии должно быть дочерним бренда!';
                }
            }
        } return $error;
    }
    /**
     * pre-order walk - метод для добавления всех свойств до текущего узла (включая текущий)
     * @param CatalogMainProperty $property
     * @return boolean - если ошибок нет и свойство корректное - true, в противном случае false
     */
    public function add(CatalogMainProperty $property) {
        $error = $this->validate($property, true);
        // если ошибок не обнаружено - то инициализируем по отдельным переменным 
        if(empty($error)){
            // вначале добавляем в набор основных ключевых свойств
            $this->getPropertiesSet()->add($property, true);
            // затем в отдельные переменные для упрощенного анализа дерева
            if ($property->isOption()){
                $this->optionID = $property->getTypeID();
            } elseif ($property->isAttribute()){
                $this->attributes[$property->getAttributeID()] = $property->getValueID();
            } elseif ($property->isBrand()){
                $this->brandID = $property->getValueID();
            } elseif ($property->isSeries()){
                $this->seriesID = $property->getValueID();
            }
            $this->lastType = $property;
            return $property->isCorrect();
        } else {
            $this->errors[$property->getKey()][] = $error;
            return false;
        }
    }

    /**
     * post-order walk - метод для добавления свойств после текущего узла
     * @param CatalogMainProperty $property
     * @param boolean $validate
     * @return boolean - если ошибок нет и свойство корректное - true, в противном случае false
     */
    public function addChild(CatalogMainProperty $property, $validate = true) {
        // если нужна проверка - то проверяем полностью или проверяем только само свойство
        $error = $validate ? $this->validate($property, false) : $property->validate();
        // если ошибок не обнаружено - то 
        // добавляем в набор основных ключевых свойств с пометкой что эти узлы - это дети
        if(empty($error)){
            $this->getPropertiesSet()->add($property, false);
            return $property->isCorrect();
        } else {
            $this->errors[$property->getKey()][] = $error;
            return false;
        }
    }

    public function setLastType(CatalogMainProperty $lastType) {
        $this->lastType = $lastType;
        return $this;
    }

    public static function getBrandedInstance($brandID) {
        $CMPs = new CatalogMainProperties();
        $CMPs->add(new CatalogMainProperty(CatalogMainProperty::TYPE_BRAND, $brandID));
        return $CMPs;
    }

}
/**
 * Значения в массивах хранятся следующим образом
 * key => value
 * где key - это бренд, серия, опция или значение атррибута
 * а value - это bool, т.е. является ли данное значение до текущего узла (pre-order walk),
 * включая текущий узел, или его потомком (post-order walk)
 */
class CatalogMainPropertiesSet {
    private $attributes;
    private $options;
    private $brands;
    private $series;

    public function __construct() {
        $this->attributes = $this->options = $this->brands = $this->series = array();
    }

    public function isSetBrands() {
        return !empty($this->brands);
    }

    public function isSetSeries() {
        return !empty($this->series);
    }

    public function isSetOptions() {
        return !empty($this->options);
    }

    public function isSetAttributes() {
        return !empty($this->attributes);
    }

    public function getBrands() {
        return $this->brands;
    }

    public function getSeries() {
        return $this->series;
    }

    public function getOptions() {
        return $this->options;
    }

    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * Метод для предварительной проверки свойства
     * @param CatalogMainProperty $property
     * @param bool $isPreOrder
     * @return string error message
     */
    public function validate(CatalogMainProperty $property, $isPreOrder) {
        // вначале проверяем само свойство
        $error = $property->validate();
        // если ошибок не найдено, то добавляем дополнительные проверки относящиеся к набору свойств
        if(empty($error) && $isPreOrder){
            if ($property->isOption() && array_key_exists($property->getTypeID(), $this->options)){
                $error = 'В ветке уже установлено аналогичное свойство (нельзя устанавливать одно и то же самые свойство на ветку)!';
            } elseif ($property->isAttribute() && array_key_exists($property->getValueID(), $this->attributes)){
                $error = 'В ветке уже установлено аналогичное значение атрибута (нельзя устанавливать одно и то же самое значение атрибута на ветку)!';
            } elseif ($property->isBrand() && array_key_exists($property->getValueID(), $this->brands)){
                $error = 'Ключевое свойство данного типа уже установлено ранее. Нельзя устанавливать более одного бренда на ветку!';
            } elseif ($property->isSeries() && array_key_exists($property->getValueID(), $this->series)){
                $error = 'Ключевое свойство данного типа уже установлено ранее. Нельзя устанавливать более одной серии на ветку!';
            }
        } return $error;
    }

    /**
     * Метод для добавления свойства  в PropertySet. 
     * Свойство должно быть проверенное заранее!
     * @param CatalogMainProperty $property
     * @param bool $isPreOrder
     * @return boolean - added or not
     */
    public function add(CatalogMainProperty $property, $isPreOrder) {
        if ($property->isOption() && !array_key_exists($property->getTypeID(), $this->options)){
            $this->options[$property->getTypeID()] = $isPreOrder;
        } elseif ($property->isAttribute() && !array_key_exists($property->getValueID(), $this->attributes)){
            $this->attributes[$property->getValueID()] = $isPreOrder;
        } elseif ($property->isBrand() && !array_key_exists($property->getValueID(), $this->brands)){
            $this->brands[$property->getValueID()] = $isPreOrder;
        } elseif ($property->isSeries() && !array_key_exists($property->getValueID(), $this->series)){
            $this->series[$property->getValueID()] = $isPreOrder;
        } else {
            return false;
        } return true;
    }
}

class CatalogTreePath {

    /**
     * @var int root id
     */
    const ROOT_ID = 0;
    
    /**
     * @var int fictive id
     */
    const EMPTY_ID = 0;
    
    /**
     * @var string separator in path
     */
    const DELIMITER = ',';

    /**
     * Get root seopath
     * @param int $categoryID
     * @param string $parentTreePath
     * @return string
     */
    public static function getRoot() {
        return self::createLevel(CatalogTreePath::ROOT_ID, '');
    }
    
    /**
     * Get parent seopath
     * @param string $treePath
     * @param bool $withRoot
     * @return string
     */
    public static function getParent($treePath, $withRoot = true) {
        if($treePath){
            // получаем массив
            $arr = self::toArray($treePath);
            // удаляем последний уровень
            array_pop($arr);
            // удаляем первый уровень если нужно без него
            if(!$withRoot) array_shift($arr);
            // новое построение
            $treePath = self::fromArray($arr);
        }
        return $treePath;
    }
    
    /**
     * Get Category ID from treepath
     * @param string $treePath
     * @return string
     */
    public static function getCategoryID($treePath) {
        return ($treePath && ($arr = self::toArray($treePath))) ? array_pop($arr) : self::EMPTY_ID;
    }

    /**
     * Append last delimiter
     * @param string $treePath
     * @return string
     */
    public static function appendLD($treePath) {
        return $treePath.CatalogTreePath::DELIMITER;
    }

    /**
     * Delete last delimiter
     * @param string $treePath
     * @return string
     */
    public static function deleteLD($treePath) {
        return rtrim($treePath, CatalogTreePath::DELIMITER);
    }
    
    /**
     * Create one level 
     * @param int $levelID
     * @param string $parentPath
     * @return string
     */
    public static function createLevel($levelID, $parentPath) {
        return $parentPath.$levelID.CatalogTreePath::DELIMITER;
    }
    
    /**
     * Convert array to Tree path
     * @param array $arr
     * @return string
     */
    public static function fromArray(array $arr) {
        return $arr ? self::appendLD(implode(CatalogTreePath::DELIMITER, $arr)) : '';
    }
    
    /**
     * Convert tree path to array with levels ID
     * @param string $treePath
     * @return array
     */
    public static function toArray($treePath) {
        return explode(CatalogTreePath::DELIMITER, self::deleteLD($treePath));
    }

    /**
     * Tree path to string with levels ID with comma separated
     * @param string $treePath
     * @param bool $trim
     * @return string
     */
    public static function toSelect($treePath, $trim = true) {
        return self::deleteLD($trim ? trim($treePath) : $treePath);
    }
    
    /**
     * get level by treepath
     * @param int 
     */
    public static function getLevel($treePath) {
        return 0;
    }
}

abstract class CatalogQueryBuilder {
    const OPERATOR_AND = 'AND';
    const OPERATOR_OR = 'OR';
    const OPERATOR_PLUS = '+';
    const OPERATOR_MINUS = '-';
    const WORDS_SEPARATOR = ' ';
    /**
     * @var string
     */
    protected $treepath;
    /**
     * @var int
     */
    protected $brandID;
    /**
     * @var int
     */
    protected $seriesID;
    /**
     * @var int
     */
    protected $optionID;
    /**
     * @var int
     */
    protected $attributeID;
    /**
     * @var int
     */
    protected $attributeValueID;
    /**
     * @var int
     */
    protected $popularity = 0;
    /**
     * @var bool
     */
    protected $checkGoods = true;
    /**
     * @var bool
     */
    protected $checkActive = true;
    /**
     * @var bool
     */
    protected $checkAvailable = false;

    /**
     *
     * @param array $properties with keys: treepath, brandID, seriesID, optionID and nested other
     */
    public function __construct(array $properties = array()) {
        foreach($properties as $key => $val){
            if(property_exists($this, $key)){
                $func = 'set'.$key;
                $this->$func($val);
            }
        }
    }
    
    public function getTreepath() {
        return $this->treepath;
    }
    
    public function getBrandID() {
        return $this->brandID;
    }

    public function getSeriesID() {
        return $this->seriesID;
    }

    public function getOptionID() {
        return $this->optionID;
    }

    public function getAttributeID() {
        return $this->attributeID;
    }

    public function getAttributeValueID() {
        return $this->attributeValueID;
    }

    public function getPopularity() {
        return $this->popularity;
    }

    public function getCheckGoods() {
        return $this->checkGoods;
    }

    public function getCheckActive() {
        return $this->checkActive;
    }

    public function getCheckAvailable() {
        return $this->checkAvailable;
    }

    /**
     * @param string $treepath
     * @return $this
     */
    public function setTreepath($treepath) {
        $this->treepath = trim($treepath);
        return $this;
    }

    /**
     * @param int $brandID
     * @return $this
     */
    public function setBrandID($brandID) {
        $this->brandID = (int)$brandID;
        return $this;
    }

    /**
     * @param int $seriesID
     * @return $this
     */
    public function setSeriesID($seriesID) {
        $this->seriesID = (int)$seriesID;
        return $this;
    }

    /**
     * @param int $optionID
     * @return $this
     */
    private function setOptionID($optionID) {
        $this->optionID = $optionID;
    }

    /**
     * @param int $attributeID
     * @return $this
     */
    public function setAttributeID($attributeID) {
        $this->attributeID = $attributeID;
        return $this;
    }

    /**
     * @param int $attributeValueID
     * @return $this
     */
    public function setAttributeValueID($attributeValueID) {
        $this->attributeValueID = $attributeValueID;
        return $this;
    }

    /**
     * @param int $popularity
     * @return $this
     */
    public function setPopularity($popularity) {
        $this->popularity = intval($popularity);
        return $this;
    }

    /**
     * @param bool $checkGoods
     * @return $this
     */
    public function setCheckGoods($checkGoods) {
        $this->checkGoods = $checkGoods;
        return $this;
    }

    /**
     * @param bool $checkActive
     * @return $this
     */
    public function setCheckActive($checkActive) {
        $this->checkActive = $checkActive;
        return $this;
    }

    /**
     * @param bool $checkAvailable
     * @return $this
     */
    public function setCheckAvailable($checkAvailable) {
        $this->checkAvailable = $checkAvailable;
        return $this;
    }
    
    abstract protected function getConditions();
    
    public function getQuery($select = 't.`id`') {
        // получаем условия от наследуемых классов
        $arConditions = $this->getConditions();
        // определения по treepath
        if (!is_null($this->treepath) && $this->treepath !== '')
            array_push($arConditions, self::generateTreepathCondition($this->treepath));
        // определения по бренду
        if ($this->brandID > 0) 
            array_push($arConditions, 't.`brand_id`=' . $this->brandID);
        // определения по серии
        if ($this->seriesID > 0)
            array_push($arConditions, 't.`series_id`=' . $this->seriesID);
        // добавляем по опции
        if ($this->optionID > 0 && ($condition = self::generateOptionCondition($this->optionID)))
            array_push($arConditions, $condition);
        // определения по атрибуту или по значению атрибута
        if ($this->attributeID > 0 || $this->attributeValueID > 0)
            array_push($arConditions, '(SELECT COUNT(`id`) FROM `' . PRODUCT_ATTRIBUTE_TABLE . '` WHERE `pid`=t.`id`' . ($this->attributeID > 0 ? ' AND `aid`='.$this->attributeID : '') . ($this->attributeValueID > 0 ? ' AND `value`='.$this->attributeValueID : '') . ')>0');
        // добавляем условие отбора по популярности
        if ($this->popularity > 0)
            array_push($arConditions, 't.`popularity`>=' . $this->popularity);
        // определяем что только с ассортиментами могут быть включены
        if ($this->checkGoods)
            array_unshift($arConditions, 't.`goods`>0');
        // определяем что только активные могут быть включены
        if ($this->checkActive)
            array_unshift($arConditions, 't.`active`=1');
        // определяем что только с ассортиментами могут быть включены
        if ($this->checkAvailable)
            array_unshift($arConditions, 't.`available`>0');
        // строим основной запрос
        $from  = '`'.CATALOG_TABLE.'` t';
        $where = self::mergeConditions($arConditions, self::OPERATOR_AND, false);
        // возвращаем результат
        return "SELECT $select FROM $from WHERE $where";
    }

    public function getCountQuery($select = 'COUNT(t.`id`)') {
        return $this->getQuery($select);
    }
    
    public static function escapeString($text) {
        return mysql_real_escape_string($text);
    }
    
    public static function normalizeNumber($number) {
        return str_replace(',', '.', $number);
    }
    
    public static function searchWords($searchtext, $limit=10, $minLength=1) {
        $words = $searchtext ? array_unique(explode(self::WORDS_SEPARATOR, $searchtext)) : array();
        foreach($words as $key => $val){
            if(strlen($val) > $minLength){
                $words[$key] = self::escapeString($val);
            } else {
                unset($words[$key]);
            }
        }
        if($words){
            $words = array_slice($words, 0, $limit);
        }
        return $words;
    }
    /**
     * @param string $treepath
     * @return string
     */
    public static function generateTreepathCondition($treepath) {
        return 't.`cid` IN (SELECT `id` FROM `' . MAIN_TABLE . '` WHERE `active`=1 AND `treepath` LIKE "'.$treepath.'%")';
    }
    /**
     * @param array $words
     * @param bool $group
     * @param int $weight from 1 to 10
     * @param string $suffix
     * @return string
     */
    public static function generateWordsCondition(array $words, $group=true, $weight=1, $suffix='') {
        $cnt = count($words);
        $nums = array(); $code = $title = '';
        if($weight < 1) $weight = 1;
        elseif($weight > 10) $weight = 10;
        foreach($words as $key => $word){
            if(is_numeric($word)){
                $word = self::normalizeNumber($word);
                if($cnt == 1){
                    $code = $word;
                } else {
                    $nums[] = $word;
                }
            } elseif (strpos($word, self::WORDS_SEPARATOR)!==FALSE) {
                $title = $word;
                unset($words[$key]);
                $cnt--;
            }
        }
        $arConditions = array();  
        // поиск по ID товаров
        if($code > 0){
            $arConditions[] = 'IF(t.`id`='.$code.', '.(9+$weight+$cnt).', 0)'.PHP_EOL;
        }
        if($nums){
            if($group){
                $arConditions[] = 'IF(t.`id`='.implode(' OR t.`id`=', $words).', '.$weight.', 0)'.PHP_EOL;
            } else {
                foreach($nums as $num){
                    $arConditions[] = 'IF(t.`id`='.$num.', '.$weight.', 0)'.PHP_EOL;
                }
            }
        }
        // поиск по точному совпадению заголовка товара
        if($title){
            $arConditions[] = 'IF(LOWER(t.`title`)="'.$title.'", '.(9+$weight+$cnt).', 0)'.PHP_EOL;
        }
        // поиск по всем словам в остальных свойствах товара
        if($words){
            if($group){
                // поиск по заголовкам товаров
                $arConditions[] = 'IF((LOWER(t.`title`) LIKE "%'.implode('%" OR LOWER(t.`title`) LIKE "%', $words).'%"), '.$weight.', 0)'.PHP_EOL;
                // поиск по краткому описанию товаров
                $arConditions[] = 'IF((LOWER(t.`descr`) LIKE "%'.implode('%" OR LOWER(t.`descr`) LIKE "%', $words).'%"), '.$weight.', 0)'.PHP_EOL;
                // поиск по полному описанию товаров
//                $arConditions[] = 'IF((LOWER(t.`fulldescr`) LIKE "%'.implode('%" OR LOWER(t.`fulldescr`) LIKE "%', $words).'%"), '.$weight.', 0)'.PHP_EOL;
            } else {
                foreach($words as $word){
                    // поиск по заголовкам товаров
                    $arConditions[] = 'IF(LOWER(t.`title`) LIKE "%'.$word.'%", '.$weight.', 0)'.PHP_EOL;
                    // поиск по краткому описанию товаров
                    $arConditions[] = 'IF(LOWER(t.`descr`) LIKE "%'.$word.'%", '.$weight.', 0)'.PHP_EOL;
                    // поиск по полному описанию товаров
//                    $arConditions[] = 'IF(LOWER(t.`fulldescr`) LIKE "%'.$word.'%", '.$weight.', 0)'.PHP_EOL;
                }
            }
            // поиск по брендам товаров
            $arConditions[] = 'IF((SELECT COUNT(`id`) FROM `'.BRANDS_TABLE.'` WHERE `id`=t.`brand_id` AND `active`=1 AND (LOWER(`title`) LIKE "%'.implode('%" OR LOWER(`title`) LIKE "%', $words).'%"))>0, '.$weight.', 0)'.PHP_EOL;
            // поиск по сериям товаров
            $arConditions[] = 'IF((SELECT COUNT(`id`) FROM `'.SERIES_TABLE.'` WHERE `id`=t.`series_id` AND `active`=1 AND (LOWER(`title`) LIKE "%'.implode('%" OR LOWER(`title`) LIKE "%', $words).'%"))>0, '.$weight.', 0)'.PHP_EOL;
            // поиск по значениям атрибутов товаров
            $arConditions[] = 'IF((SELECT COUNT(avtx.`id`) FROM `'.ATTRIBUTES_VALUES_TABLE.'` avtx JOIN `'.PRODUCT_ATTRIBUTE_TABLE.'` patx ON (patx.`value`=avtx.`id`) '
                    . 'WHERE patx.`pid`=t.`id` AND (LOWER(avtx.`title`) LIKE "%'.implode('%" OR LOWER(avtx.`title`) LIKE "%', $words).'%"))>0, '.$weight.', 0)'.PHP_EOL;
        }
        return self::mergeConditions($arConditions, self::OPERATOR_PLUS, true).$suffix;
    }
    /**
     * @param int $option
     * @param bool $exludeOther
     * @return string
     */
    protected static function generateOptionCondition($option, $exludeOther = true) {
        /**
         * @tutorial 
         * Здесь желательно избавится от отрицания всех остальных опций если выбирается какая то одна опция
         * @todo Нужно будет или в индексную таблицу или на стороне 1с делать так чтобы товар имел только одно значение
         */
        $arConditions = array();
        switch ($option) {
            case CatalogMainProperty::TYPE_HIT:
                $arConditions[] = 't.`is_hit`=1';
                if($exludeOther) 
                    $arConditions[] = 't.`is_new`=0 AND t.`is_top`=0 AND t.`is_stock`=0 AND t.`is_sale`=0';
                break;
            case CatalogMainProperty::TYPE_NEW:
                $arConditions[] = 't.`is_new`=1';
                if($exludeOther) 
                    $arConditions[] = 't.`is_hit`=0 AND t.`is_top`=0 AND t.`is_stock`=0 AND t.`is_sale`=0';
                break;
            case CatalogMainProperty::TYPE_TOP:
                $arConditions[] = 't.`is_top`=1 AND t.`discount`>0';
                if($exludeOther) 
                    $arConditions[] = 't.`is_hit`=0 AND t.`is_new`=0 AND t.`is_stock`=0 AND t.`is_sale`=0';
                break;
            case CatalogMainProperty::TYPE_STOCK:
                $arConditions[] = 't.`is_stock`=1 AND t.`discount`>0';
                if($exludeOther) 
                    $arConditions[] = 't.`is_hit`=0 AND t.`is_new`=0 AND t.`is_top`=0 AND t.`is_sale`=0';
                break;
            case CatalogMainProperty::TYPE_SALE:
                $arConditions[] = 't.`is_sale`=1 AND t.`discount`>0';
                if($exludeOther) 
                    $arConditions[] = 't.`is_hit`=0 AND t.`is_new`=0 AND t.`is_top`=0 AND t.`is_stock`=0';
                break;
            case CatalogMainProperty::TYPE_REVIEW:
                $arConditions[] = '(SELECT COUNT(`id`) FROM `' . COMMENTS_TABLE . '` WHERE `pid`=t.`id` AND `active`=1 AND `module`="catalog")>0';
                break;
            default:
                break;
        }
        return self::mergeConditions($arConditions, self::OPERATOR_AND, true);
    }
    /**
     * @param array $conditions
     * @param String $operator
     * @return string
     */
    protected static function mergeConditions(array $conditions = array(), $operator = self::OPERATOR_AND, $group = true) {
        $condition = '';
        if(($cnt = count($conditions))) {
            $condition = implode(' '.$operator.' ', $conditions);
            if($group && $cnt > 1) $condition = '('.$condition.')';
        }
        return $condition;
    }

}

class CatalogCommonQueryBuilder extends CatalogQueryBuilder {

    public function getConditions() {
        return array();
    }
}

class CatalogItemsQueryBuilder extends CatalogQueryBuilder {
    /**
     * @var string
     */
    private $productsSet;
    /**
     * @var string
     */
    private $filterСonditions;

    public function getConditions() {
        $conditions = array();
        // если есть уже заранее отобранные товары - пишем условия по ним
        if($this->getProductsSet()){
            $conditions[] = 't.`id` IN ('.$this->getProductsSet().')';
        }
        // Если есть условия по фильтрам  - добавляем их
        if($this->getFilterСonditions()){
            $conditions[] = $this->getFilterСonditions();
        }
        return $conditions;
    }

    public function getQuery($select = null) {
        return parent::getQuery($select ? $select : self::getSelect());
    }
    
    public function getProductsSet() {
        return $this->productsSet;
    }

    public function getFilterСonditions() {
        return $this->filterСonditions;
    }

    public function setProductsSet($productsSet) {
        $this->productsSet = trim($productsSet);
        return $this;
    }

    public function setFilterСonditions($filterСonditions) {
        $this->filterСonditions = trim($filterСonditions);
        return $this;
    }

    public static function getSelect($withImage = false, $select = 't.*, t.`order` `itemOrder`') {
        if ($withImage) {
            $select .= ', (SELECT `filename` FROM `' . CATALOGFILES_TABLE . '` WHERE `pid`=t.`id` ORDER BY `isdefault` DESC, `fileorder` LIMIT 1) `image`';
        }
        return $select;
    }
}

class CatalogSearchQueryBuilder extends CatalogQueryBuilder {
    /**
     * @var string
     */
    private $searchtext;
    /**
     * @var array
     */
    private $_searchWords = array();
    /**
     * @var int
     */
    private $_searchWordsCount = 0;

    public function getConditions() {
        // если есть поисковая строка то
        return (($words = $this->getSearchwords()) ? array(self::generateWordsCondition($words, true, 1, '>0')) : array());
    }

    public function getSearchText() {
        return $this->searchtext;
    }

    public function getSearchWords() {
        return $this->_searchWords;
    }

    public function getSearchWordsCount() {
        return $this->_searchWordsCount;
    }

    public function setSearchText($searchtext) {
        $this->searchtext = trim($searchtext);
        $this->_searchWords = self::searchWords($this->searchtext);
        $this->_searchWordsCount = count($this->_searchWords);
        return $this;
    }

    public function getOrderCondition() {
        $searchWords = $this->_searchWords;
        if($this->_searchWordsCount>1){
            $searchWords[] = self::escapeString($this->searchtext);
        }
        return self::generateWordsCondition($searchWords, false) . ' DESC';
    }

}

class CatalogMainPropertiesQueryBuilder extends CatalogQueryBuilder {
    /**
     * @var string
     */
    private $_treepath;
    /**
     * @var CatalogMainPropertiesSet  Основные и Дочерние свойства
     */
    private $propertiesSet;
    
    public function getConditions() {
        // задаем массив куда будем слаживать условия
        $andConditions = array();
        // определяем есть ли в условия по ключевым свойствам
        if(($condition = $this->generatePropertiesSetCondition())){
            $this->_treepath = trim($this->getTreepath());
            // смотрим есть ли treepath в условиях, если нет то просто добавляем
            if (empty($this->_treepath)) {
                $andConditions[] = $condition;
            // если же есть - то нужно treepath добавить в проверку через или с ключевыми свойствами
            } else {
                $andConditions[] = self::mergeConditions(array(
                    self::generateTreepathCondition($this->_treepath),
                    $condition,
                ), self::OPERATOR_OR, true);
                // обнуляем treepath чтобы в родительском классе не использовался больше
                $this->setTreepath('');
            }
        }
        // возвращаем результат
        return $andConditions;
    }
    
    public function getTreepath() {
        return $this->_treepath===null ? $this->treepath : $this->_treepath;
    }
    
    public function getPropertiesSet() {
        return $this->propertiesSet;
    }

    /**
     * @param CatalogMainPropertiesSet $propertiesSet
     * @return $this
     */
    public function setPropertiesSet(CatalogMainPropertiesSet $propertiesSet) {
        $this->propertiesSet = $propertiesSet;
        return $this;
    }
    
    private function generatePropertiesSetCondition() {
        // Обявляем необходимые массивы: 
        //      массив для условий по pre-order свойств (которые точно должны присуствовать)
        //      массив для условий по post-order свойств (которые могут присуствовать)
        $ands = $ors = array();
        // если набор свойств есть - то собираем по нему условия
        if($this->propertiesSet){
            // поиск по брендам
            $preSet = $postSet = array();
            foreach($this->propertiesSet->getBrands() as $brandID => $isPreOrder){
                if($isPreOrder) $preSet[] = $brandID;
                else $postSet[] = $brandID;
            }
            if($preSet) $ands[] = 't.`brand_id` IN (' . implode(',', $preSet) . ')';
            if($postSet) $ors[] = 't.`brand_id` IN (' . implode(',', $postSet) . ')';

            // поиск по сериям
            $preSet = $postSet = array();
            foreach($this->propertiesSet->getSeries() as $seriesID => $isPreOrder){
                if($isPreOrder) $preSet[] = $seriesID;
                else $postSet[] = $seriesID;
            }
            if($preSet) $ands[] = 't.`series_id` IN (' . implode(',', $preSet) . ')';
            if($postSet) $ors[] = 't.`series_id` IN (' . implode(',', $postSet) . ')';

            // поиск по опциям
            $preSet = $postSet = array();
            foreach($this->propertiesSet->getOptions() as $optionID => $isPreOrder){
                if($isPreOrder) $preSet[] = $optionID;
                else $postSet[] = $optionID;
            }
            if($preSet && ($condition = self::generateOptionsCondition($preSet, true, true))) $ands[] = $condition;
            if($postSet && ($condition = self::generateOptionsCondition($postSet, true, true))) $ors[] = $condition;

            /**
             * @tutorial 
             * поиск по значениям атрибутов: должно быть хотябы одно значение
             * придется разбивать на два похожих подзапроса, так как в первом случае должно быть обязательно
             * во втором случае, может быть одно из этих значений
             */
            $preSet = $postSet = array();
            foreach($this->propertiesSet->getAttributes() as $attributeValue => $isPreOrder){
                if($isPreOrder) $preSet[] = $attributeValue;
                else $postSet[] = $attributeValue;
            }
            if (($preCnt = count($preSet)) > 0) {
                $ands[] = '(SELECT IF(COUNT(DISTINCT `id`)>='.$preCnt.', 1, 0) FROM `' . PRODUCT_ATTRIBUTE_TABLE . '` WHERE `pid`=t.`id` AND `value` IN ('.implode(',', $preSet).'))>0';
            }
            if (($postCnt = count($postSet)) > 0) {
                $ors[] = '(SELECT COUNT(`id`) FROM `' . PRODUCT_ATTRIBUTE_TABLE . '` WHERE `pid`=t.`id` AND `value` IN ('.implode(',', $postSet).'))>0';
            }
        }
        
        // Подытоживаем условия
        $arConditions = array();
        if($ands) $arConditions[] = self::mergeConditions($ands, self::OPERATOR_AND, empty($ors));
        if($ors) $arConditions[] = self::mergeConditions($ors, self::OPERATOR_OR, true);
        
        // возвращаем результат
        return self::mergeConditions($arConditions, self::OPERATOR_AND, true);
    }
    
    private static function generateOptionsCondition(array $options, $exludeOther = true, $group = true) {
        $arConditions = array();
        foreach($options as $option){
            if(($condition = self::generateOptionCondition($option, $exludeOther))){
                $arConditions[] = $condition;
            }
        }
        return self::mergeConditions($arConditions, self::OPERATOR_OR, $group);
    }
    
}

/**
 * 
    1. берем seo атрибуты категории товара
    2. отбрасываем бренд и серию и те атрибуты, которые не заполнены в товаре
    3. ищем по всем категориям те, у которых назначеное ключевое свойство совпадает с seo атрибутом категории и его значением из товара
    4. в найденных категориях получаем значение seo атрибутов
    5. опять отбрасываем бренд и серию и те атрибуты, которые не заполнены в товаре
    6. из оставшихся seo атрибутов формируем ссылки на категории как ссылки на фильтр seo атрибут + значение атрибута из товара 
    7. в найденных основных категориях проверяем на личие подкатегорий бренда и серии (из товарных значений)
 */
class CatalogProductLinks {
    
    private static function getProductAttributes($itemID) {
        $arProductAttributes = array();
        // set attributes and values
        $query = 'SELECT pa.`aid`, av.`id`, av.`title`, 
                    IF(LENGTH(av.`he`)>0, av.`he`, av.`title`) `he`,
                    IF(LENGTH(av.`she`)>0, av.`she`, av.`title`) `she`,
                    IF(LENGTH(av.`it`)>0, av.`it`, av.`title`) `it`,
                    IF(LENGTH(av.`they`)>0, av.`they`, av.`title`) `they` 
                  FROM `'.PRODUCT_ATTRIBUTE_TABLE.'` pa 
                  LEFT JOIN '.ATTRIBUTES_VALUES_TABLE.' av ON av.`id` = pa.`value` 
                  WHERE pa.`pid`='.$itemID;
        $result = mysql_query($query);
        if($result && mysql_num_rows($result)) {
            while(($row = mysql_fetch_assoc($result))) {                
                if(!isset($arProductAttributes[$row['aid']])) {
                    $arProductAttributes[$row['aid']] = array();
                }
                $arProductAttributes[$row['aid']][$row['id']] = $row;
            }
        } 
        return $arProductAttributes;
    }
    
    private static function sliceCategoryAttributeValues(array $arProductAttributes, array $arrCategoryFilters) {
        $attributes = array();
        foreach($arrCategoryFilters as $filter){
            if(isset($filter['aid']) && array_key_exists($filter['aid'], $arProductAttributes)){
                $attributes[$filter['aid']] = array_keys($arProductAttributes[$filter['aid']]);
            }
        }
        return $attributes;
    }
    
    public static function getCategorySeoAttributes($cid, $productAttributes) {
        $filters = array();
        if(!empty($productAttributes)) {
            $query = 'SELECT f.`aid`, f.`id` FROM `'.CATEGORY_FILTERS_TABLE.'` cf 
                      LEFT JOIN `'.FILTERS_TABLE.'` f ON(f.`id`=cf.`fid`) 
                      WHERE cf.`cid`='.$cid.' AND cf.`type`='.UrlFilters::LIST_TYPE_SEO.' 
                      AND f.`aid` IN('.implode(',', $productAttributes).')';
            $result = mysql_query($query);
            if($result && mysql_num_rows($result)) {
                while(($row = mysql_fetch_assoc($result))) {  
                    $attributes[$row['aid']] = $row['id'];
                }
            }
        } 
        return $attributes;
    }
    
    private static function getCategoryFilters(array $arCategory, array $arBrand, array $arSeries, array $arProductAttributes) {      
        $arrCategoryFilters = UrlWL::getCategoryFilters($arCategory, UrlFilters::LIST_TYPE_SEO, array(), false);
        foreach($arrCategoryFilters as &$filter){
            if($filter['tid']==UrlFilters::TYPE_BRAND && $arBrand){
                $filter['values'][$arBrand['id']] = $arBrand;
            } elseif ($filter['tid']==UrlFilters::TYPE_SERIES && $arSeries){
                $filter['values'][$arSeries['id']] = $arSeries;
            } elseif (isset($filter['aid']) && array_key_exists($filter['aid'], $arProductAttributes)){
                $filter['values'] = $arProductAttributes[$filter['aid']];
            }
        }
        return $arrCategoryFilters;
    }
    
    private static function getCategoriesByAttributes(array $arAttributeValues) {        
        if(!empty($arAttributeValues)) {
            $conditions = array();            
            foreach($arAttributeValues as $aid => $values) {
                $conditions[] = '(cpt.attribute_id='.$aid.' AND cpt.value_id IN('.implode(',', $values).'))';
            }
            if($conditions){
                $where = 'type_id='.CatalogMainProperty::TYPE_ATTRIBUTE.' AND ('.implode(' OR ', $conditions).')';
                return getRowItems(CATEGORY_PROPERTIES_TABLE.' cpt JOIN '.MAIN_TABLE.' mt ON mt.id=cpt.category_id', 'cpt.*, mt.*', $where, 'mt.treepath');
            }
        } 
        return array();
    }
    
    private static function buildTitle($categoryTitle, array $item, array $arCategory, UrlFilters $Filters) {
        $title = $categoryTitle;
        if(!$title){
            // если в категории titlecase не определено
            if(empty($arCategory["titlecase"])) {
                $arCategory["titlecase"] = UrlFilters::KEY_TITLE_DEFAULT;
            }
            // берем стандартные настройки по фильтрам
            if(!empty($arCategory["filter_title"]) && ($seoFilterTitles = $Filters->getSelectedSeoTitles($arCategory["titlecase"]))){
                $title = PHPHelper::BuildFilterMetaData($arCategory["filter_title"], $seoFilterTitles);
            }
            if(!$title){
                // генерируем из того что есть
                if(!empty($item[$arCategory["titlecase"]])){
                    $title = $arCategory['title'].' '.$item[$arCategory["titlecase"]];
                } elseif(!empty($item[UrlFilters::KEY_TITLE_DEFAULT])){
                    $title = $arCategory['title'].' '.$item[UrlFilters::KEY_TITLE_DEFAULT];
                } else {
                    $title = $arCategory['title'].' '.$item['id'];
                }
            }
        }
        return $title;
    }
    
    
    public static function setLinks(&$item, UrlWL $UrlWL) {
        $key = CacheWL::KEY_CATALOG_LINKS.$item['id'];
        $item['arLinks'] = PHPHelper::getCache()->get($key);
        if($item['arLinks'] === false) {
            $arLinks = $arManufactures = array();
            // получаем заполненные атрибуты товара
            if(($arProductAttributes = self::getProductAttributes($item['id']))) {
                // устанавливаем имена бренда и серии
                isset($item['arBrand']) OR $item['arBrand'] = getItemRow(BRANDS_TABLE, '*', 'WHERE `id`='.$item['brand_id']);
                isset($item['arSeries']) OR $item['arSeries'] = getItemRow(SERIES_TABLE, '*', 'WHERE `id`='.$item['series_id']);
                // подготавливаем категорию товара
                isset($item['arCategory']) OR $item['arCategory'] = $UrlWL->getCategoryById($item['cid']);
                // проводим инициализацию основных свойств категории
                if(!isset($item['arCategory']['mainProperty']) || !isset($item['arCategory']['mainProperties'])){
                    CatalogHelper::initProperties($item['arCategory']);
                }
                // создаем копию UrlWL и устанавливаем путь текущей категории
                $cloneUrlWL = $UrlWL->copy();
                // обнуляем фильтры и заполняем фильтрами категории
                $cloneUrlWL->getFilters()->reset()->setCategoryFilters(self::getCategoryFilters($item['arCategory'], $item['arBrand'], $item['arSeries'], $arProductAttributes));
                // по найденным категориям ищем все категории с такими же ключевыми значениями как атрибуты категории и значения товара
                $arrCategories = self::getCategoriesByAttributes(self::sliceCategoryAttributeValues($arProductAttributes, $cloneUrlWL->getFilters()->getCategoryFilters()));
                foreach($arrCategories as $categoryRow) {
                    if($categoryRow['category_id'] == $item['cid']){
                        $arCategory = $item['arCategory'];
                    } else {
                        $arCategory = $categoryRow;
                        // проводим инициализацию основных свойств категории
                        CatalogHelper::initProperties($arCategory);
                        // определяем фильтры категории и их значения
                        $cloneUrlWL->getFilters()->reset()->setCategoryFilters(self::getCategoryFilters($arCategory, $item['arBrand'], $item['arSeries'], $arProductAttributes));
                    }
                    // устанавливаем сеопуть и удаляем выбранные атрибуты для текущего шага
                    $cloneUrlWL->setPath(UrlWL::buildCategoryPath($arCategory))->getFilters()->removeAttributes();
                    // Init filters
                    $Filters = new Filters(CatalogHelper::getCategoryProductsSet($arCategory), $cloneUrlWL);
                    // Проверяем есть ли в данной категории товары
                    if($Filters->getFilteredProductsCount()){
                        // получаем все дочерние категории
                        $levelCategories = CatalogHelper::getChildrenWithMainPropertiesByTreepath($arCategory['treepath'], CatalogMainProperty::$ESENTIAL_TYPES);
                        $brandProperty = new CatalogMainProperty(CatalogMainProperty::TYPE_BRAND, $item['brand_id']);
                        if(isset($levelCategories[$brandProperty->getKey()])){
                            $seriesProperty = new CatalogMainProperty(CatalogMainProperty::TYPE_SERIES, $item['series_id']);
                            if(empty($levelCategories[$seriesProperty->getKey()])){
                                if(($row = CatalogHelper::getChildByMainProperty($levelCategories[$brandProperty->getKey()]['treepath'], $seriesProperty->getTypeID(), $seriesProperty->getValueID()))){
                                    $levelCategories[$seriesProperty->getKey()] = $row;
                                }
                            }
                        }
                        // Дополнительная инициализация свойств для этого модуля
                        $Filters->setLevelCategories($levelCategories)->setMainProperties($arCategory['mainProperties']);
                        // создаем ссылку на категории
                        $arLinks[$arCategory['id']][$UrlWL->buildCategoryUrl($arCategory)] = $arCategory['title'];
                        // инициализируем есть ли фильтры по бренду и серии. незабываем о зависимости
                        $filterBrandID = $filterSeriesID = 0;
                        // получаем фильтры для переопределения
                        $UrlFilters = $cloneUrlWL->copyFilters();
                        //по каждому атрибуту строим ссылку на фильтр
                        foreach($UrlFilters->getCategoryFilters() as $filter) {
                            if(isset($filter['aid']) && array_key_exists($filter['aid'], $arProductAttributes)) {
                                // создаем пример елемента фильтра
                                $FE = new FilterElement($filter['id'], $filter['tid']);
                                foreach(array_keys($arProductAttributes[$filter['aid']]) as $value_id) {
                                    if($arCategory['mainProperty']->getValueID() != $value_id){
                                        $FE->change($value_id);
                                        $UrlFilters->removeAttributes()->appendAttribute($FE->getFilterID(), $FE->getValueID());
                                        if($Filters->getFilterCnt($UrlFilters->getSelected()) && ($url = $Filters->getSeoUrl($FE, $UrlFilters, false))){
                                            $arLinks[$arCategory['id']][$url] = self::buildTitle($Filters->getChildCategoryTitle($FE), $arProductAttributes[$filter['aid']][$value_id], $arCategory, $UrlFilters);
                                        }
                                    }
                                }
                            } elseif ($filter['tid']==UrlFilters::TYPE_BRAND && $item['arBrand']){
                                $filterBrandID = $filter['id'];

                            } elseif ($filter['tid']==UrlFilters::TYPE_SERIES && $item['arSeries']){
                                $filterSeriesID = $filter['id'];
                            }
                        }
                        if($filterBrandID){
                            // создаем пример елемента фильтра
                            $FE = new FilterElement($filterBrandID, UrlFilters::TYPE_BRAND);
                            $FE->change($item['brand_id']);
                            $UrlFilters->removeAttributes()->appendAttribute($FE->getFilterID(), $FE->getValueID());
                            if($Filters->getFilterCnt($UrlFilters->getSelected()) && ($url = $Filters->getSeoUrl($FE, $UrlFilters, false))){
                                $arManufactures[0][$url] = self::buildTitle($Filters->getChildCategoryTitle($FE), $item['arBrand'], $arCategory, $UrlFilters);
                                if($filterSeriesID){
                                    // добавляем выбранный бренд в selected в $cloneUrlWL для построения правильной ссылки
                                    $cloneUrlWL->getFilters()->appendAttribute($FE->getFilterID(), $FE->getValueID());
                                    // создаем пример елемента фильтра
                                    $FE = new FilterElement($filterSeriesID, UrlFilters::TYPE_SERIES, $FE);
                                    $FE->change($item['series_id']);
                                    $UrlFilters->appendAttribute($FE->getFilterID(), $FE->getValueID());
                                    if($Filters->getFilterCnt($UrlFilters->getSelected()) && ($url = $Filters->getSeoUrl($FE, $UrlFilters, false))){
                                        $arManufactures[0][$url] = self::buildTitle($Filters->getChildCategoryTitle($FE), $item['arSeries'], $arCategory, $UrlFilters);
                                    }
                                }
                            }
                        }
                    }
                } 
            }
            $item['arLinks'] = array_merge($arLinks, $arManufactures);
            PHPHelper::getCache()->set($key, $item['arLinks'], 3600);
        }
    }
}