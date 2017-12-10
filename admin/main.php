<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

# ##############################################################################
// //////////////////////// OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\
// SET from $_GET Global Array Item ID Var = integer
$itemID       = (isset($_GET['itemID']) and intval($_GET['itemID'])) ? intval($_GET['itemID']) : 0;
$copyID       = (isset($_GET['copyID']) and intval($_GET['copyID'])) ? intval($_GET['copyID']) : 0;
$pid          = (isset($_GET['pid'])    and intval($_GET['pid']))    ? intval($_GET['pid'])    : 0;
$item         = array(); // Item Info Array
$items        = array(); // Items Array of items Info arrays
$arModules    = array(); // Item Modules Array
$arrPageTypes = getRowItemsInKey('pagetype', PAGETYPES_TABLE, "`pagetype`,`name`,`image`,`title_{$lang}` as title", 'WHERE `active`=1', 'ORDER BY `pagetype`');
$arrMenuTypes = getRowItemsInKey('menutype', MENUTYPES_TABLE, "`menutype`,`name`,`image`,`title_{$lang}` as title", 'WHERE `active`=1', 'ORDER BY `menutype`');
$arrRedirects = getCategoriesForRedirect($lang);
$categoryTree = getCategoriesTree($lang, 0, 0, false);
$hasAccess    = $UserAccess->getAccessToModule($arrPageData['module']); 
// /////////////////////// END OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ///////////// REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\\
$arrPageData['itemID']        = $itemID;
$arrPageData['pid']           = $pid;
$arrPageData['parent_url']    = $pid ? '&pid='.$pid : '';
$arrPageData['current_url']   = $arrPageData['admin_url'].$arrPageData['parent_url'].$arrPageData['page_url'];
$arrPageData['arrBreadCrumb'] = getBreadCrumb($pid);
$arrPageData['arParent']      = $pid ? getItemRow(MAIN_TABLE, '*', 'WHERE id='.$pid) : array();
$arrPageData['arBackpage']    = isset($arrPageData['arParent']['pid']) ? getItemRow(MAIN_TABLE, '*', 'WHERE id='.$arrPageData['arParent']['pid']) : array();
$arrPageData['headTitle']     = ADMIN_MAIN_TITLE.$arrPageData['seo_separator'].$arrPageData['headTitle'];
$arrPageData['files_url']     = MAIN_CATEGORIES_URL_DIR;
$arrPageData['files_path']    = prepareDirPath(MAIN_CATEGORIES_DIR, true);
$arrPageData['items_on_page'] = 20; 
// list of modules with allow creating subpages
$arrPageData['allowedSubPageModules'] = array('news', 'gallery', 'video', 'catalog');
// Variables, needed on edit page only
if ($itemID or $task=="addItem") {
    // Key property types
    $arrPageData['propertyTypes'] = getRowItemsInKey("id", CATEGORY_PROPERTIES_TYPES_TABLE, "*", "WHERE `active`>0");
    // Category attributes groups
    $arrPageData['attrGroups'] = getComplexRowItems(ATTRIBUTE_GROUPS_TABLE, '*');
    // Category attributes
    $arrPageData['attributes'] = getComplexRowItems(ATTRIBUTES_TABLE, '*');
    if(!empty($arrPageData['attributes'])) {
        foreach ($arrPageData['attributes'] as $key => $value) {
            $arrPageData['attributes'][$key]['gtitle'] = getValueFromDB(ATTRIBUTE_GROUPS_TABLE, 'title', 'WHERE `id`='.$arrPageData['attributes'][$key]['gid']);
        }
    }
    // Category filters
    $arrFilters = array();
    $query  = "SELECT f.*, CONCAT('{filter_', f.`id`, '}') AS `alias` FROM `".FILTERS_TABLE."` f ORDER BY f.`order`";
    $result = mysql_query($query);
    if ($result AND mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $arrFilters[] = $row;
        }
    }
    $arrPageData['filters'] = array(
        'all'   => $arrFilters, 
        'seo' => array()
    );
}
// SET Reorder
$item_title = $itemID ? getValueFromDB(MAIN_TABLE, 'title', 'WHERE `id`='.$itemID) : '';

if ($task=='reorderItems' and !empty($_POST)) {
    if($hasAccess) {
        $result = reorderItems($_POST['arOrder'], 'order', 'id', MAIN_TABLE, array('action'=>ActionsLog::ACTION_EDIT, 'comment'=>'Изменена сортировка', 'lang'=>$lang, 'module'=>$arrPageData['module']));
        if($result===true) {setSessionMessage ('Новое состояние успешно сохранено!');  }
        elseif($result)    setSessionErrors( $result);
        Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Delete Item
elseif ($itemID>10 and $task=='deleteItem') {
    if ($hasAccess) {
        $result = delCategoriesDBLangsSync($itemID, $arrPageData['files_path'], $arrPageData['images_params']);
        if ($result===false) setSessionErrors('<p>MySQL Error Delete: '.mysql_errno().'</b> Error:'.mysql_error().'</p>');
        elseif ($result) {
            foreach(SystemComponent::getAcceptLangs() as $key => $arLang) {
                ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, 'Удалено "'.$item_title.'"', $key, $item_title, 0, $arrPageData['module']);
            }
        }
        Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError();
    }
}
// Change Menu Type
elseif ($itemID and $task=='changeMenuType' and isset($_GET['status'])) {
    if ($hasAccess) {
        $result = updateRecords(MAIN_TABLE, "`menutype`='{$_GET['status']}'", 'WHERE `id`='.$itemID);
        if ($result===false) setSessionErrors('Новое состояние <font color="red">НЕ было сохранено</font>! Error Update: '. mysql_error());
        elseif ($result) {
            setSessionMessage('Новое состояние успешно сохранено!');
            ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, 'Изменен тип меню на "'.$arrMenuTypes[$_GET['status']]['title'].'"', $lang, $item_title, $itemID, $arrPageData['module']);
        }
        Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError();
    }
}
// Change Page Type
elseif ($itemID and $task=='changePageType' and isset($_GET['status']) and $_GET['status']!=8) {
    if ($hasAccess) {
        $result = updateRecords(MAIN_TABLE, "`pagetype`='{$_GET['status']}'", 'WHERE `id`='.$itemID);
        if ($result===false) setSessionErrors('Новое состояние <font color="red">НЕ было сохранено</font>! Error Update: '. mysql_error());
        elseif ($result) {
            setSessionMessage('Новое состояние успешно сохранено!');
            ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, 'Изменен тип страницы на "'.$arrPageTypes[$_GET['status']]['title'].'"', $lang, $item_title, $itemID, $arrPageData['module']);
        }
        Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError();
    }
}
// Set Active Status Item
elseif ($itemID and $task=='publishItem' and isset($_GET['status'])) {
    if ($hasAccess) {
        $result = updateRecords(MAIN_TABLE, "`active`='{$_GET['status']}'", 'WHERE `id`='.$itemID);
        if ($result===false) setSessionErrors('Новое состояние <font color="red">НЕ было сохранено</font>! Error Update: '. mysql_error());
        elseif ($result){ 
            setSessionMessage('Новое состояние успешно сохранено!');
            ActionsLog::getInstance()->save(ActionsLog::ACTION_PUBLICATION, 'Изменена публикация страницы на "'.($_GET['status']==1 ? 'Опубликована' : 'Неопубликована' ).'"', $lang, $item_title, $itemID, $arrPageData['module']);
        } Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError();
    }
}
//Copy item
elseif ($copyID and $task=='addItem'){
    if ($hasAccess) {
        $arrPageData['messages'][] = 'Запись успешно скопирована!';
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError();
    }
}
// Insert Or Update Item in Database
elseif (!empty($_POST) and ($task=='addItem' or $task=='editItem')) {
    // Check user access
    if (!$hasAccess) {
        setSessionErrors($UserAccess->getAccessError());
        Redirect($arrPageData["current_url"]);
    }
    $arUnusedKeys = array();
    $query_type   = $itemID ? 'update'            : 'insert';
    $conditions   = $itemID ? 'WHERE `id`='.$itemID : '';
    $Validator->validateGeneral($_POST['title'], 'Вы не ввели названия страницы!!!');
    $Validator->validateGeneral($_POST['order'], 'Вы не ввели порядковый номер страницы!!!');
    if (!empty($_POST['pid']) and !empty($_POST['redirectid']) and $_POST['pid'] == $_POST['redirectid']) {
        $Validator->addError("Нельзя устанавливать переадресацию на родительскую страницу!");
    }
    if (!empty($_POST['module']) and empty($_POST['pid']) and isset($arrModules[$_POST['module']]) and !$itemID) {
        $Validator->addError("Нельзя создавать несколько веток дерева с одним и тем же модулем!");
    }
    // SEO path manipulation
    if($Validator->foundErrors()==0){
        if (!empty($_POST['redirecturl']) or (!empty($_POST['redirectid']) and (!$itemID or !IsChild($itemID, $_POST['redirectid'])))){
            $_POST['seo_path'] = '';
        } else {
            $_POST['seo_path'] = $UrlWL->strToUniqueUrl($DB, (empty($_POST['seo_path']) ? $_POST['title'] : $_POST['seo_path']), $module, MAIN_TABLE, $itemID, empty($itemID));
        }
        if (!empty($_POST['redirectid']) and ($itemID or $_POST['pid']) and IsChild($_POST['redirectid'], ($itemID ? $itemID : $_POST['pid']))) {
            $Validator->addError("Нельзя устанавливать переадресацию на родительскую страницу!");
        }
        if ($itemID and !empty($_POST['module']) and isset($arrModules[$_POST['module']]) and $arrModules[$_POST['module']]['id']!=$itemID and !IsChild($arrModules[$_POST['module']]['id'], $itemID)) {
            $Validator->addError("Нельзя создавать несколько веток дерева с одним и тем же модулем!");
        }
    }
    // Operation with key properties
    if (isset($_POST["property_type"]) and intval($_POST["property_type"])>0) {
        if (in_array($_POST["property_type"], array(CatalogMainProperty::TYPE_BRAND, CatalogMainProperty::TYPE_SERIES, CatalogMainProperty::TYPE_ATTRIBUTE))) {
            if (!isset($_POST['property_value'])) {
                $Validator->addError("Вы не выбрали значение ключевого свойства!!!");
            } else {
                $Validator->validateNotEmpty($_POST['property_value'], 'Вы не выбрали значение ключевого свойства!!!');
            }
            if ($_POST["property_type"] == CatalogMainProperty::TYPE_ATTRIBUTE) {
                $Validator->validateNotEmpty($_POST['property_attribute'], 'Вы не выбрали атрибут ключевого свойства!!!');
            }                
        }
    }
    $arParentData = CatalogHelper::getCategory($_POST['pid']);
    if (!$Validator->foundErrors() and !empty($arParentData) and ($arParentData['module'] == 'catalog' or $_POST['module'] == 'catalog')) {
        if(($error = CatalogHelper::checkCategory($itemID, $_POST))) {
            $Validator->addError(implode(',',$error));
        }            
    }
    if ($Validator->foundErrors()) {
        $arrPageData['errors'][] = "<font color='#990033'>Пожалуйста, введите правильное значение :  </font>".$Validator->getListedErrors();
    } else {
            $arPostData = $_POST;

            imageManipulationWithCrop($arPostData, $arUnusedKeys, $arrPageData['files_url'], $arrPageData['files_path'], $task, $itemID, $module);

            if (empty($arPostData['redirecturl'])) $arPostData['redirecturl'] = '';
            else $arPostData['redirecturl'] = trim($arPostData['redirecturl']);
            if (empty($arPostData['redirectid']) or !empty($arPostData['redirecturl']))  $arPostData['redirectid']  = 0;
            if (!isset($arPostData['essential'])) $arPostData['essential'] = 0;
            if (!isset($arPostData['separate']))  $arPostData['separate'] = 0;

            $result = $DB->postToDB($arPostData, MAIN_TABLE, $conditions,  $arUnusedKeys, $query_type, ($itemID ? false : true));
            if ($result) {
                $arUpdate = array();               
                if (!$itemID and $result and is_int($result)) {
                    $itemID = $result;     
                    // generate treepath for new record
                    $arUpdate['treepath'] = CatalogHelper::createTreePath($itemID, isset($arParentData['treepath']) ? $arParentData['treepath'] : '');  
                }
                // update seopath for catalog item
                if ($arPostData["separate"]>0 and $arPostData['seo_path'] != UrlWL::generateIdentifySeoPath($itemID, UrlWL::CATEGORY_SEOPREFIX)) {
                    $arUpdate['seo_path'] = UrlWL::generateIdentifySeoPath($itemID, UrlWL::CATEGORY_SEOPREFIX);
                }
                // if new parent generate new treepath if not generated yet
                if($pid != $arPostData['pid'] and !isset($arUpdate['treepath'])) {
                    $arUpdate['treepath'] = CatalogHelper::createTreePath($itemID, isset($arParentData['treepath']) ? $arParentData['treepath'] : '');
                }
                // update item data
                if ($arUpdate) {
                    $DB->postToDB($arUpdate, MAIN_TABLE, 'WHERE `id`='.$itemID, array(), 'update', true);
                    $arPostData = array_merge($arPostData, $arUpdate);
                }
                // update item children
                if($pid != $arPostData['pid']) {
                    CatalogHelper::generateRecursiveTreePath($itemID, $arPostData['treepath']);
                }
                // Update product properties
                if (isset($arPostData['savePropertyInProducts']) and isset($arPostData["property_type"]) and $arPostData["property_type"] == CatalogMainProperty::TYPE_ATTRIBUTE) {
                    if (empty($arPostData['treepath'])) $arPostData['treepath'] = getValueFromDB(MAIN_TABLE, 'treepath', 'WHERE id='.$itemID);
                    if (!empty($arPostData["property_attribute"]) and !empty($arPostData["property_value"]) and !empty($arPostData['treepath'])){
                        $query = 'INSERT IGNORE INTO '.PRODUCT_ATTRIBUTE_TABLE.' (aid, pid, value) 
                            SELECT "'.$arPostData["property_attribute"].'" aid, c.id pid, "'.$arPostData["property_value"].'" value 
                            FROM '.CATALOG_TABLE.' c LEFT JOIN '.MAIN_TABLE.' m ON m.id=c.cid 
                            WHERE m.treepath LIKE "'.$arPostData['treepath'].'%"';
                        mysql_query($query);
                    }
                }
                // operation with category properties
                deleteRecords(CATEGORY_PROPERTIES_TABLE, "WHERE `category_id`={$itemID}");
                if (isset($arPostData["property_type"]) and intval($arPostData["property_type"])>0) {
                    if ($arPostData["property_type"] == CatalogMainProperty::TYPE_ATTRIBUTE) {
                        $attrID = getValueFromDB(ATTRIBUTES_TABLE, 'id', "WHERE `id`={$arPostData["property_attribute"]}");
                        $valID = getValueFromDB(ATTRIBUTES_VALUES_TABLE, 'id', "WHERE `id`={$arPostData["property_value"]}");
                        if ($attrID and $valID) {
                            $arData = array(
                                "category_id"  => $itemID,
                                "type_id"      => $arPostData["property_type"],
                                "attribute_id" => $arPostData["property_attribute"],
                                "value_id"     => $arPostData["property_value"]
                            );
                            $DB->postToDB($arData, CATEGORY_PROPERTIES_TABLE);
                        }
                    } elseif ($arPostData["property_type"] == CatalogMainProperty::TYPE_BRAND or $arPostData["property_type"] == CatalogMainProperty::TYPE_SERIES) {
                        $table = ($arPostData["property_type"] == CatalogMainProperty::TYPE_BRAND ? BRANDS_TABLE : SERIES_TABLE);
                        if (getValueFromDB($table, 'id', "WHERE `id`={$arPostData["property_value"]}") > 0) {
                            $arData = array(
                                "category_id"  => $itemID,
                                "type_id"      => $arPostData["property_type"],
                                "value_id"     => $arPostData["property_value"]
                            );
                            $DB->postToDB($arData, CATEGORY_PROPERTIES_TABLE);
                        }
                    } else {
                        $arData = array(
                            "category_id"  => $itemID,
                            "type_id"      => $arPostData["property_type"]
                        );
                        $DB->postToDB($arData, CATEGORY_PROPERTIES_TABLE);
                    }
                }
                // Write history record
                if (mysql_affected_rows()) {
                    $item_title = getValueFromDB(MAIN_TABLE, 'title', 'WHERE `id`='.$itemID);
                    if ($task=='addItem') {
                        foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                            ActionsLog::getInstance()->save(ActionsLog::ACTION_CREATE, 'Создано "'.$item_title.'"', $key, $item_title, $itemID, $arrPageData['module']);
                    } else {
                         ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, 'Отредактировано "'.$item_title.'"', $lang, $item_title, $itemID, $arrPageData['module']);
                    }  
                } 
                setAccess($itemID, $arPostData['access'], ((isset($arPostData['sub_access']) OR $arPostData['access']==0) ? true : false));
                setSessionMessage('Запись успешно сохранена!');
                // operation with attribute groups
                deleteRecords(CATEGORY_ATTRIBUTE_GROUPS_TABLE, 'WHERE `cid`='.$itemID);
                if (!empty($arPostData['attrGroups'])) {
                    $key = 0;
                    foreach ($arPostData['attrGroups'] as $value) {
                        $arData = array(
                            'cid'   => $itemID,
                            'gid'   => $value,
                            'order' => ++$key
                        );
                        $DB->postToDB($arData, CATEGORY_ATTRIBUTE_GROUPS_TABLE);
                    }
                }
                // operation with attributes
                deleteRecords(CATEGORY_ATTRIBUTES_TABLE, 'WHERE `cid`='.$itemID);
                if (!empty($arPostData['attributes'])) {
                    foreach ($arPostData['attributes'] as $key => $value) {
                        $arData = array(
                            'cid'   => $itemID,
                            'aid'   => $value,
                            'order' => $key + 1
                        );
                        $DB->postToDB($arData, CATEGORY_ATTRIBUTES_TABLE);
                    }
                }
                // operation with category filters
                deleteRecords(CATEGORY_FILTERS_TABLE, 'WHERE `cid`='.$itemID);
                if (!empty($arPostData['filters']['all'])) {
                    foreach ($arPostData['filters']['all'] as $key => $value) {
                        $arData = array(
                            'cid'   => $itemID,
                            'fid'   => $value,
                            'type'  => 1,
                            'order' => $key + 1
                        );
                        $DB->postToDB($arData, CATEGORY_FILTERS_TABLE);
                    }
                }
                if (!empty($arPostData['filters']['seo'])) {
                    foreach ($arPostData['filters']['seo'] as $key => $value) {
                        $arData = array(
                            'cid'   => $itemID,
                            'fid'   => $value,
                            'type'  => 2,
                            'order' => $key + 1
                        );
                        $DB->postToDB($arData, CATEGORY_FILTERS_TABLE);
                    }
                    updateRecords(CATEGORY_FILTERS_TABLE.' cf INNER JOIN '.FILTERS_TABLE.' f ON f.`id`=cf.`fid`', 'cf.`order`=0', 'WHERE f.`tid`=5 AND cf.`type`=2 AND cf.`cid`='.$itemID);
                }
                // Refresh form
                Redirect($arrPageData['current_url'].(isset($_POST['submit_add']) ? '&task=addItem' : ((isset($_POST['submit_apply']) and $itemID) ? '&task=editItem&itemID='.$itemID : '')) );
            } else {
                $arrPageData['errors'][] = 'Запись <font color="red">НЕ была сохранена</font>!';
            }
        }
}

if ($task=='addItem' or $task=='editItem') {
    // Check user access
    if (!$hasAccess) {
        setSessionErrors($UserAccess->getAccessError());
        Redirect($arrPageData["current_url"]);
    }
    if (!$itemID) {
        if ($copyID) {
            $item = getSimpleItemRow($copyID, MAIN_TABLE);
            if(!empty($item['module']) and !empty($arrPageData['arParent']) and $item['module']!=$arrPageData['arParent']['module']){
                $item['module'] = '';
            }
            $item = array_merge($item, array('id'=>'', 'image'=>'', 'seo_path'=>''));

            // category attribute groups
            $item['attrGroups'] = array();
            $query = 'SELECT cag.* FROM `'.CATEGORY_ATTRIBUTE_GROUPS_TABLE.'` cag ';
            $where = 'WHERE cag.`cid`='.$copyID.' ';
            $order = 'ORDER BY cag.`order`';
            $result = mysql_query($query.$where.$order);
            if(mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_assoc($result)) {
                    $item['attrGroups'][] = $row['gid'];
                }
            }

            // category attributes
            $item['attributes'] = array();
            $query = 'SELECT ca.* FROM `'.CATEGORY_ATTRIBUTES_TABLE.'` ca ';
            $where = 'WHERE ca.`cid`='.$copyID.' ';
            $order = 'ORDER BY ca.`order`';
            $result = mysql_query($query.$where.$order);
            if(mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_assoc($result)) {
                    $item['attributes'][] = $row['aid'];
                }
            }

            // category filters
            $item['filters'] = array(
                'all' => array(),
                'seo' => array()
            );
            $query = 'SELECT cf.*, CONCAT("{filter_", f.`id`, "}") AS `alias` FROM `'.CATEGORY_FILTERS_TABLE.'` cf ';
            $query.= 'LEFT JOIN `'.FILTERS_TABLE.'` f ON(f.`id`=cf.`fid`) ';
            $where = 'WHERE cf.`cid`='.$copyID.' ';
            $order = 'GROUP BY cf.`id` ORDER BY cf.`order`';
            $result = mysql_query($query.$where.$order);
            if(mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_assoc($result)) {
                    if($row['type'] == 1) {
                        $item['filters']['all'][] = $row['fid'];
                    } elseif ($row['type'] == 2) {
                        $item['filters']['seo'][] = $row['fid'];
                    }
                }
            }
        } else {    
            $item = array_combine_multi($DB->getTableColumnsNames(MAIN_TABLE), '');
            $item['pagetype'] = isset($arrPageData['arParent']['pagetype']) ? $arrPageData['arParent']['pagetype'] : '';
            $item['menutype'] = isset($arrPageData['arParent']['menutype']) ? $arrPageData['arParent']['menutype'] : '';
            $item['module']   = isset($arrPageData['arParent']['module'])   ? $arrPageData['arParent']['module']   : '';
            $item['active']   = 1;
            $item['access']   = 1;
            $item['attrGroups'] = array();
            $item['attributes'] = array();
            $item['filters'] = array(
                'all' => array(),
                'seo' => array()
            );
        }
        $item['keyProperty'] = array();
        $item['order']       = getMaxPosition($pid, 'order', 'pid', MAIN_TABLE);
        $item['created']     = date('Y-m-d H:i:s');
        $item['arHistory']   = array();
    } elseif($itemID) {
        $query = "SELECT * FROM ".MAIN_TABLE." WHERE id = $itemID LIMIT 1";
        $result = mysql_query($query);
        if(!$result) {
            $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
        } elseif(!mysql_num_rows($result)) {
            $arrPageData['errors'][] = "SELECT OPERATIONS: No this Item in DataBase";
        } else {
            $item = mysql_fetch_assoc($result);
            $item['submodules']  = $item['module'] ? getValueFromDB(MAIN_TABLE, 'COUNT(*)', " WHERE `module`='{$item['module']}' AND `pid`='{$item['id']}'", 'submodules') : 0;
            $item['arImageData'] = $item['image'] ? getArrImageSize($arrPageData['files_url'], $item['image']) : array();
        }

        $item['arHistory'] = ActionsLog::getInstance()->getHistory(array('modules'=>array($arrPageData['module']), 'oid'=>$item['id'], 'langs'=>array($lang)));
       
        // category attribute groups
        $item['attrGroups'] = array();
        $query = 'SELECT cag.* FROM `'.CATEGORY_ATTRIBUTE_GROUPS_TABLE.'` cag ';
        $where = 'WHERE cag.`cid`='.$itemID.' ';
        $order = 'ORDER BY cag.`order`';
        $result = mysql_query($query.$where.$order);
        if(mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $item['attrGroups'][] = $row['gid'];
            }
        }        
        // category attributes
        $item['attributes'] = array();
        $query = 'SELECT ca.* FROM `'.CATEGORY_ATTRIBUTES_TABLE.'` ca ';
        $where = 'WHERE ca.`cid`='.$itemID.' ';
        $order = 'ORDER BY ca.`order`';
        $result = mysql_query($query.$where.$order);
        if(mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $item['attributes'][] = $row['aid'];
            }
        }
        // category filters
        $item['filters'] = array(
            'all' => array(),
            'seo' => array()
        );
        $query = 'SELECT cf.*, CONCAT("{filter_", f.`id`, "}") AS `alias`, f.`tid` FROM `'.CATEGORY_FILTERS_TABLE.'` cf ';
        $query.= 'LEFT JOIN `'.FILTERS_TABLE.'` f ON(f.`id`=cf.`fid`) ';
        $where = 'WHERE cf.`cid`='.$itemID.' ';
        $order = 'GROUP BY cf.`id` ORDER BY cf.`order`';
        $result = mysql_query($query.$where.$order);
        if(mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                if($row['type'] == 1) {
                    $item['filters']['all'][] = $row['fid'];
                } elseif ($row['type'] == 2) {
                    $item['filters']['seo'][] = $row['fid'];
                }
            }
        }
    }
    $item['arImagesSettings'] = getRowItems(IMAGES_PARAMS_TABLE, '*', '`module`="'.$arrPageData['module'].'"');
    if(!empty($_POST)) {
        $item = array_merge($item, $_POST);
    }
    // filling array of Attribute Groups
    if (!empty($item['attrGroups']) and !empty($arrPageData['attrGroups'])) {
        $arr = array();
        foreach ($arrPageData['attrGroups'] as $key=>$value) {
            if (($idx = array_search($arrPageData['attrGroups'][$key]['id'], $item['attrGroups'], true))!==false) {
                $arr[$idx] = $arrPageData['attrGroups'][$key];
                unset($arrPageData['attrGroups'][$key]);
            }
        }
        ksort($arr, SORT_NUMERIC);
        $arrPageData['attrGroups'] = array_merge($arr, $arrPageData['attrGroups']);
    }
    // filling array of Attributes
    if (!empty($item['attributes']) and !empty($arrPageData['attributes'])) {
        $arr = array();
        foreach($arrPageData['attributes'] as $key=>$value){
            if(($idx = array_search($arrPageData['attributes'][$key]['id'], $item['attributes'], true))!==false){
                $arr[$idx] = $arrPageData['attributes'][$key];
                unset($arrPageData['attributes'][$key]);
            }
        }
        ksort($arr, SORT_NUMERIC);
        $arrPageData['attributes'] = array_merge($arr, $arrPageData['attributes']);
    }
    // filling array of Filters (all)
    if (!empty($item['filters']['all']) and !empty($arrPageData['filters']['all'])) {
        $arr = array();
        foreach ($arrPageData['filters']['all'] as $key => $value) {
            if(($idx = array_search($arrPageData['filters']['all'][$key]['id'], $item['filters']['all'], true))!==false){
                $arr[$idx] = $arrPageData['filters']['all'][$key];
                unset($arrPageData['filters']['all'][$key]);
            } else {
                unset($arrFilters[$key]);
            }
        }
        ksort($arr, SORT_NUMERIC);
        ksort($arrFilters);
        $arrPageData['filters']['all'] = array_merge($arr, $arrPageData['filters']['all']);
        $arrPageData['filters']['seo'] = array_merge($arrPageData['filters']['seo'], $arrFilters);
    }
    // filling array of Filters (seo)
    if (!empty($item['filters']['seo']) and !empty($arrPageData['filters']['seo'])) {
        $arr = array();
        foreach ($arrPageData['filters']['seo'] as $key => $value) {
            if(($idx = array_search($arrPageData['filters']['seo'][$key]['id'], $item['filters']['seo'], true))!==false){
                $arr[$idx] = $arrPageData['filters']['seo'][$key];
                unset($arrPageData['filters']['seo'][$key]);
            }
        }
        ksort($arr, SORT_NUMERIC);
        $arrPageData['filters']['seo'] = array_merge($arr, $arrPageData['filters']['seo']);
    }
    
    $item['arParentModules'] = array();
    if ($pid) {
        if (!empty($arrPageData['arParent']['module'])) $item['arParentModules'][] = $arrPageData['arParent']['module'];
        if (!empty($arrPageData['arParent']['pid'])) {
            $pparentID = $arrPageData['arParent']['pid'];
            while ($pparentID) {
                $objParent = getItemObj(MAIN_TABLE, '`pid`, `module`', ' WHERE id='.$pparentID);
                $pparentID = $objParent->pid;
                if (!empty($objParent->module)) $item['arParentModules'][] = $objParent->module;
            }
        }
    }
    $item['arMenuType'] = $arrMenuTypes[intval($item['menutype'])];
    $item['arPageType'] = $arrPageTypes[intval($item['pagetype'])];
    $arrPageData['arrBreadCrumb'][] = array('title'=>($task=='addItem' ? ADMIN_ADD_NEW_PAGE : ADMIN_EDIT_PAGE));

    $hndl = opendir(WLCMS_ABS_ROOT.'module/');
    while ($file = readdir($hndl)) {
        if ($file!='.' and $file!='..' and getFileExt($file) == 'php') $arModules[] = basename($file, '.php');
    } closedir($hndl);
    // Item key property
    $item['keyProperty'] = getItemRow(CATEGORY_PROPERTIES_TABLE.' cp LEFT JOIN '.CATEGORY_PROPERTIES_TYPES_TABLE.' cpt ON cpt.id=cp.type_id', 'cp.*, cpt.typename', 'WHERE cp.category_id='.$itemID);
    if(!empty($item['keyProperty'])) {
        $valueItem = array();
        if(!empty($item['keyProperty']['attribute_id']))
            $valueItem = getItemRow(ATTRIBUTES_VALUES_TABLE, "*", "WHERE `id`={$item['keyProperty']['value_id']} AND `aid`={$item['keyProperty']['attribute_id']}");
        else if ($item['keyProperty']['type_id'] == CatalogMainProperty::TYPE_BRAND or $item['keyProperty']['type_id'] == CatalogMainProperty::TYPE_SERIES) {
            $table = ($item['keyProperty']['type_id'] == CatalogMainProperty::TYPE_BRAND ? BRANDS_TABLE : SERIES_TABLE);
            $valueItem = getItemRow($table, "*", "WHERE `id`={$item['keyProperty']["value_id"]}");
        }
        $item['keyProperty']['valueItem'] = $valueItem;
    }
    
} else {
    // Display Items List Data
    $where = "WHERE t.pid = $pid ";
    // Total pages and Pager
    $arrPageData['total_items'] = intval(getValueFromDB(MAIN_TABLE." t", 'COUNT(*)', $where, 'count'));
    $arrPageData['pager']       = getPager($page, $arrPageData['total_items'], $arrPageData['items_on_page'], $arrPageData['admin_url'].$arrPageData['parent_url']);
    $arrPageData['total_pages'] = $arrPageData['pager']['count'];
    $arrPageData['offset']      = ($page-1)*$arrPageData['items_on_page'];
    // END Total pages and Pager
    $order = "ORDER BY  t.id, t.menutype, t.order";
    $limit = "LIMIT {$arrPageData['offset']}, {$arrPageData['items_on_page']}";
    $query = "SELECT *, (SELECT COUNT(*) FROM `".MAIN_TABLE."` subt WHERE subt.pid = t.id) as childrens 
        FROM `".MAIN_TABLE."` t
        $where $order $limit";
    $result = mysql_query($query);
    if(!$result) $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
    else {
        $i=0;
        while ($row = mysql_fetch_assoc($result)) {
            $row['mn_type']    = intval($row['menutype'])+1;
            $row['pn_type']    = intval($row['pagetype'])+1;
            $row['arMenuType'] = $arrMenuTypes[$row['menutype']];
            $row['arPageType'] = $arrPageTypes[$row['pagetype']];
            $items[]           = $row;
        }
    }
}

// Include Need CSS and Scripts For This Page To Array
$arrPageData['headCss'][]       = '<link href="/js/libs/highslide/highslide.css" type="text/css" rel="stylesheet" />';
$arrPageData['headScripts'][]   = '<script src="/js/libs/highslide/highslide-full.packed.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/libs/highslide/highslide.config.admin.js" type="text/javascript"></script>';
$arrPageData['headCss'][]       = '<link href="/js/jquery/themes/smoothness/jquery.ui.all.css" type="text/css" rel="stylesheet" />';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.core.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.autocomplete.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.widget.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.datepicker.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/1251/jquery.ui.datepicker-ru.js" type="text/javascript"></script>';
// /////////////////////// END LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
///////////////////// SMARTY BASE PAGE VARIABLES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$smarty->assign('item',         $item);
$smarty->assign('items',        $items);
$smarty->assign('itemID',       $itemID);
$smarty->assign('arModules',    $arModules);
$smarty->assign('arrPageTypes', $arrPageTypes);
$smarty->assign('arrMenuTypes', $arrMenuTypes);
$smarty->assign('arrRedirects', $arrRedirects);
$smarty->assign('categoryTree', $categoryTree);
//\\\\\\\\\\\\\\\\\ END SMARTY BASE PAGE VARIABLES /////////////////////////////
# ##############################################################################

