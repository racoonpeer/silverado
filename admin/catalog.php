<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

# ##############################################################################
// //////////////////////// MODULE DATA VERIFICATION \\\\\\\\\\\\\\\\\\\\\\\\\\\
if(!$arrPageData['moduleRootID']) {
    $arrPageData['errors'][]    = sprintf(ADMIN_MODULE_ID_ERROR, CATALOG, $arrPageData['module']);
    $arrPageData['module']      = 'module_messages';
    $arrPageData['moduleTitle'] = CATALOG;
    return;
} else {
    foreach($arAcceptLangs as $ln) {
        $dbTable = replaceLang($ln, CATALOG_TABLE);
        if(!$DB->isSetDBTable($dbTable)){
            $arrPageData['errors'][]    = sprintf(ADMIN_MODULE_TABLE_ERROR, CATALOG, $arrPageData['module'], $dbTable);
            $arrPageData['module']      = 'module_messages';
            $arrPageData['moduleTitle'] = CATALOG;
            return;
        }
    }
}
// /////////////////////// END MODULE DATA VERIFICATION \\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// //////////////////////// OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\
// SET from $_GET Global Array Item ID Var = integer
$itemID        = (isset($_GET['itemID']) AND intval($_GET['itemID'])) ? intval($_GET['itemID']) : 0;
$copyID        = (isset($_GET['copyID']) AND intval($_GET['copyID'])) ? intval($_GET['copyID']) : 0;
$cid           = (isset($_GET['cid']) AND intval($_GET['cid']))       ? intval($_GET['cid'])    : 0;
$item          = array(); // Item Info Array
$items         = array(); // Items Array of items Info arrays
$categoryTree  = getCategoriesTreeWithItems($lang, CATALOG_TABLE, $arrPageData['moduleRootID'], 0, false, $module, '', '', array(), true);
$arCidCntItems = getItemsCountInCategories('cid', 'count', CATALOG_TABLE, '`cid`,COUNT(`cid`) as count', 'WHERE `active`=1 GROUP BY `cid`');
$filters       = !empty($_GET['filters'])? $_GET['filters']: array();
$hasAccess     = $UserAccess->getAccessToModule($arrPageData['module']); 
// /////////////////////// END OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ///////////// REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\\
$arrPageData['itemID']        = $itemID;
$arrPageData['cid']           = $cid;
$arrPageData['category_url']  = $cid ? '&cid='.$cid : '';
$arrPageData['current_url']   = $arrPageData['admin_url'].$arrPageData['category_url'].$arrPageData['page_url'];
$arrPageData['arrBreadCrumb'] = getBreadCrumb($cid, 1);
$arrPageData['arrParent']     = getItemRow(MAIN_TABLE, '*', 'WHERE id='.$cid);
$arrPageData['headTitle']     = CATALOGS.$arrPageData['seo_separator'].$arrPageData['headTitle'];
$arrPageData['files_url']     = UPLOAD_URL_DIR.$module.'/';
$arrPageData['files_path']    = prepareDirPath($arrPageData['files_url'], true);
$arrPageData['catalogfiles_url']  = UPLOAD_URL_DIR.$module.'/'.$itemID.'/';
$arrPageData['catalogfiles_path'] = prepareDirPath($arrPageData['catalogfiles_url'], true);
$arrPageData['items_on_page'] = 20;
$arrPageData['arBrands']      = array();
$arrPageData['attrGroups']    = getComplexRowItems(ATTRIBUTE_GROUPS_TABLE.' ag', 'ag.*', 'WHERE ag.`active`=1', 'ag.`order`');
if(!empty($arrPageData['attrGroups'])) {
    foreach ($arrPageData['attrGroups'] as $key => $value) {
        $arrPageData['attrGroups'][$key]['attributes'] = getComplexRowItems(ATTRIBUTES_TABLE.' a', 'a.*', 'WHERE a.`gid`='.$arrPageData['attrGroups'][$key]['id'], 'a.`order`');
        foreach ($arrPageData['attrGroups'][$key]['attributes'] as $k=>$v){
            $arrPageData['attrGroups'][$key]['attributes'][$k]['values'] = getComplexRowItems(ATTRIBUTES_VALUES_TABLE.' av', 'av.*', 'WHERE av.`aid`='.$v['id'], 'av.`order`');
        }
    }
}
$arrPageData['filters'] = $filters;

// available kit categories
$arrPageData['arKitCats'] = array();
$query  = "SELECT DISTINCT m.`id`, m.`title` FROM `".MAIN_TABLE."` m "
        . "LEFT JOIN `".CATALOG_TABLE."` c ON(c.`cid`=m.`id`) "
        . "WHERE m.`module`='catalog' AND c.`is_kit`<1 "
        . "ORDER BY m.`title`";
$result = mysql_query($query);
if ($result and mysql_num_rows($result)>0) {
    while ($row = mysql_fetch_assoc($result)) {
        $row['children'] = getComplexRowItems(CATALOG_TABLE.' c', 'c.*', 'WHERE c.`cid`='.$row['id'].' AND c.`is_kit`<1', 'c.`order`');
        $arrPageData['arKitCats'][] = $row;
    }
}
// available related categories
$arrPageData['arRelatedCats'] = getComplexRowItems(MAIN_TABLE.' m', 'm.*', 'WHERE m.`module`="'.$arrPageData['module'].'" AND m.`pid`>0', 'm.`order`');
if(!empty($arrPageData['arRelatedCats'])) {
    foreach ($arrPageData['arRelatedCats'] as $key => $value) {
        $arrPageData['arRelatedCats'][$key]['children'] = getComplexRowItems(CATALOG_TABLE.' c', 'c.*', 'WHERE c.`cid`='.$arrPageData['arRelatedCats'][$key]['id']);
        if(empty($arrPageData['arRelatedCats'][$key]['children'])) {
            unset($arrPageData['arRelatedCats'][$key]);
        }
    }
    ksort($arrPageData['arRelatedCats']);
}
// Available product options
$arrPageData['options'] = array();
$query  = "SELECT * FROM `".OPTIONS_TABLE."` ORDER BY `order`";
$result = mysql_query($query);
if ($result AND mysql_num_rows($result) > 0) {
    while ($option = mysql_fetch_assoc($result)) {
        $option["values"] = getRowItemsInKey("id", OPTIONS_VALUES_TABLE, "*", "WHERE `option_id`=".$option["id"], "ORDER BY `order`");
        $arrPageData['options'][$option["id"]] = $option;
    }
}

$item_title = $itemID ? getValueFromDB(CATALOG_TABLE, 'title', 'WHERE `id`='.$itemID) : '';
// SET Reorder
if($task=='reorderItems' AND !empty($_POST) AND isset($_POST['submit_order'])) {
    if($hasAccess) {
        if(!empty($_POST['arOrder'])){
            $result = reorderItems($_POST['arOrder'], 'order', 'id', CATALOG_TABLE, array('action'=>ActionsLog::ACTION_EDIT, 'comment'=>'Изменена сортировка', 'lang'=>$lang, 'module'=>$arrPageData['module']));
            if($result===true) {
                setSessionMessage('Новая сортировка елементов успешно сохранена!');
            } elseif($result) {
                setSessionErrors($result);
            }
        }
        if(!empty($_POST['arShortcutsOrder'])) {
            $result = reorderItems($_POST['arShortcutsOrder'], 'order', 'id', SHORTCUTS_TABLE, array('action'=>ActionsLog::ACTION_EDIT, 'comment'=>'Изменена сортировка', 'lang'=>$lang, 'module'=>$arrPageData['module']));
            if($result===true) {
                setSessionMessage('Новая сортировка елементов успешно сохранена!');
            } elseif($result) {
                setSessionErrors($result);
            }
        }

        if(!empty($_POST['arPrices'])) {
            $result = updateItems(array('price'=>$_POST['arPrices']), $_POST['arPrices'], 'id', CATALOG_TABLE, array('action'=>ActionsLog::ACTION_EDIT, 'comment'=>'Изменена цена', 'lang'=>$lang, 'module'=>$arrPageData['module']));
            if($result===true) {
                setSessionMessage('Новые цены сохранены!'); 
            } elseif($result) {
                setSessionErrors($result);
            }
        }

     /*   foreach($PHPHelper->SELECTIONS as $type => $title){
            deleteRecords(PRODUCT_SELECTIONS_TABLE, ' WHERE `type`="'.$type.'"');
            if(isset($_POST[$type])) {
                foreach($_POST[$type] as $itemID){
                    $arPostData['pid'] = $itemID;
                    $arPostData['type'] = $type;
                    $arPostData['order'] = getMaxPosition('"'.$type.'"', 'order', 'type', PRODUCT_SELECTIONS_TABLE);
                    $result = $DB->postToDB($arPostData, PRODUCT_SELECTIONS_TABLE, '',  '', 'insert');
                }
            }
        }
        if($result) $arrPageData['messages'][] = 'Новые состояния популярных и новейших елементов успешно сохранено!';*/
        Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}

elseif ($task=='reorderItems' AND (!empty($_POST['arItems']) OR !empty($_POST['arShortcuts'])) AND isset($_POST['allitems'])) {
    if ($hasAccess) {
        $arItems = !empty($_POST['arItems']) ? $_POST['arItems'] : array();
        $arShortcuts = !empty($_POST['arShortcuts'])? $_POST['arShortcuts'] : array();
        if ($_POST['allitems']=='delete'){
            if (!empty($arItems)) {
                foreach($arItems as $itemID => $val) {
                    PHPHelper::deleteProduct($itemID, $arrPageData['files_path'], $arrPageData['catalogfiles_path']);
                } 
            }
            if (!empty($arShortcuts)) {
                foreach($arShortcuts as $itemID => $val) {
                    $object = getItemRow(SHORTCUTS_TABLE.' st LEFT JOIN '.CATALOG_TABLE.' ct ON st.`pid`=ct.`id`', 'st.*, ct.`title`', 'WHERE st.`id`='.$itemID);
                    $result = deleteRecords(SHORTCUTS_TABLE, 'WHERE `id`='.$itemID);
                    if(!$result)  setSessionErrors('Данные не удалось удалить. Возможная причина - <p>MySQL Error Delete: '.mysql_errno().'</b> Error:'.mysql_error().'</p>');
                    else ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, 'Удален ярлык товара "'.$object['title'].'"', $lang, 'Ярлык товара "'.$object['title'].'"', 0, $object['module']);  
                } 
            }
            setSessionMessage('Товары успешно удалены!');
        } elseif ($_POST['allitems']=='publish' OR $_POST['allitems']=='unpublish') {
            if ($_POST['allitems']=='unpublish') {
                if (!empty($arItems)){
                    foreach($arItems as $itemID => $val){
                        $arItems[$itemID] = 0;
                    }
               }
                if(!empty($arShortcuts)){
                    foreach($arShortcuts as $itemID => $val){
                        $arShortcuts[$itemID] = 0;
                    }
                }
            }
            if (!empty($arItems)) {
                $result = updateItems(array('active'=>$arItems), $arItems, 'id', CATALOG_TABLE, array('action'=>ActionsLog::ACTION_EDIT, 'comment'=>'Изменена публикация на '.($_POST['allitems']=='publish' ? '"Опубликовано"' : '"Неопубликовано"'), 'lang'=>$lang, 'module'=>$arrPageData['module']));
                if($result === true) setSessionMessage('Новое состояние успешно сохранено!');
                elseif($result === false) setSessionMessage('Не нуждается в сохранении!');
                else  setSessionErrors($result);
            }
            if (!empty($arShortcuts)) {
                $result = updateItems(array('active'=>$arShortcuts), $arShortcuts, 'id', SHORTCUTS_TABLE, array('action'=>ActionsLog::ACTION_EDIT, 'comment'=>'Изменена публикация ярлыка на '.($_POST['allitems']=='publish' ? '"Опубликовано"' : '"Неопубликовано"'), 'lang'=>$lang, 'module'=>'shortcuts'));
                if($result === true) setSessionMessage('Новое состояние успешно сохранено!');
                elseif($result === false) setSessionMessage('Не нуждается в сохранении!');
                else  setSessionErrors($result);
            }
        }
        Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Delete Item
elseif ($itemID AND $task=='deleteItem') {
    if ($hasAccess) {
        $result = PHPHelper::deleteProduct($itemID, $arrPageData['files_path'], $arrPageData['catalogfiles_path']);
        if (!$result) setSessionErrors('Данные не удалось удалить. Возможная причина - <p>MySQL Error Delete: '.mysql_errno().'</b> Error:'.mysql_error().'</p>');
        Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Set Active Status Item
elseif ($itemID AND $task=='publishItem' AND isset($_GET['status'])) {
    if ($hasAccess) {
        $result = updateRecords(CATALOG_TABLE, "`active`='{$_GET['status']}'", 'WHERE `id`='.$itemID);
        if ($result===false) {
            setSessionErrors('Новое состояние <font color="red">НЕ было сохранено</font>! Error Update: '. mysql_error());
        } elseif($result) {
            setSessionMessage('Новое состояние успешно сохранено!');
            ActionsLog::getInstance()->save(ActionsLog::ACTION_PUBLICATION, 'Изменена публикация страницы на "'.($_GET['status']==1 ? 'Опубликована' : 'Неопубликована' ).'"', $lang, $item_title, $itemID, $arrPageData['module']);
        }
        Redirect($arrPageData['current_url']);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
//Copy item
elseif ($copyID AND $task=='addItem'){
    if ($hasAccess) {
        $arrPageData['messages'][] = 'Запись успешно скопирована!';
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Insert Or Update Item in Database
elseif (!empty($_POST) AND ($task=='addItem' OR $task=='editItem')) {
    if ($hasAccess) {
        $arUnusedKeys = array('id');
        $query_type   = $itemID ? 'update'            : 'insert';
        $conditions   = $itemID ? 'WHERE `id`='.$itemID : '';
        $Validator->validateGeneral($_POST['title'], 'Введите название товара!!!');
        $Validator->validateGeneral($_POST['pcode'], 'Введите артикул товара!!!');
        if ($Validator->foundErrors()) {
            $arrPageData['errors'][] = "<font color='#990033'>Пожалуйста, введите правильное значение :  </font>".$Validator->getListedErrors();
        } else {
            // SEO path manipulation
            $_POST['seo_path'] = $UrlWL->strToUniqueUrl($DB, (empty($_POST['seo_path']) ? "{$_POST['title']}-{$_POST['pcode']}" : $_POST['seo_path']), $module, CATALOG_TABLE, $itemID, empty($itemID));
            // copy post data
            $arPostData = $_POST;
            imageManipulationWithCrop($arPostData, $arUnusedKeys, $arrPageData['files_url'], $arrPageData['files_path'], $task, $itemID, $module);
            if (empty($arPostData['filename']))    $arUnusedKeys[] = 'filename';
            if (empty($arPostData['createdDate'])) $arPostData['createdDate'] = date('Y-m-d');
            if (empty($arPostData['createdTime'])) $arPostData['createdTime'] = date('H:i:s');
            foreach ($PHPHelper->SELECTIONS as $field => $ftitle) {
                $arPostData[$field] = isset($arPostData[$field]) ? (int)$arPostData[$field] : 0;
            }
            $arPostData['created'] = "{$arPostData['createdDate']} {$arPostData['createdTime']}";
            $result = $DB->postToDB($arPostData, CATALOG_TABLE, $conditions,  $arUnusedKeys, $query_type, ($itemID ? false : true));
            if ($result){
                if (!$itemID AND $result AND is_int($result)) $itemID = $result;
                if (mysql_affected_rows()) {
                    $item_title = getValueFromDB(CATALOG_TABLE, 'title', 'WHERE `id`='.$itemID);
                    if ($task=='addItem'){
                        foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                            ActionsLog::getInstance()->save(ActionsLog::ACTION_CREATE, 'Создано "'.$item_title.'"', $key, $item_title, $itemID, $arrPageData['module']);
                    } else {
                         ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, 'Отредактировано "'.$item_title.'"', $lang, $item_title, $itemID, $arrPageData['module']);
                    }  
                } 
                setSessionMessage('Запись успешно сохранена!');
                // operation with product attributes
                deleteRecords(PRODUCT_ATTRIBUTE_TABLE, 'WHERE `pid`='.(int)$itemID);
                if (!empty($arPostData['attributes'])) {
                    foreach ($arPostData['attributes'] as $key => $arValues) {
                        if (is_array($arValues)) {
                            foreach ($arValues as $value){
                                if (!empty($value)) {
                                    $DB->postToDB(array(
                                        'pid'       => $itemID,
                                        'aid'       => $key,
                                        'created'   => date('Y-m-d h:i:s'),
                                        'value'     => $value
                                    ), PRODUCT_ATTRIBUTE_TABLE, '', array('id'), 'insert', (($query_type=='insert')? true: false));
                                }
                            }
                        }
                    }
                }
                // operation with related & similar products
                deleteRecords(CATALOG_RELATED_TABLE, 'WHERE `pid`='.$itemID);
                if (!empty($arPostData['related'])) {
                    $arRelated = explode(',', $arPostData['related']);
                    foreach ($arRelated as $value) {
                        $arData = array(
                            'pid'       => $itemID,
                            'rid'       => (int)$value,
                            'type'      => 0
                        );                            
                        $DB->postToDB($arData, CATALOG_RELATED_TABLE);
                    }
                }
                if (!empty($arPostData['similar'])) {
                    $arSimilar = explode(',', $arPostData['similar']);
                    foreach ($arSimilar as $value) {
                        $arData = array(
                            'pid'       => $itemID,
                            'rid'       => (int)$value,
                            'type'      => 1
                        );                            
                        $DB->postToDB($arData, CATALOG_RELATED_TABLE);
                    }
                }
                if (!empty($arPostData['additions'])) {
                    $arSimilar = explode(',', $arPostData['additions']);
                    foreach ($arSimilar as $value) {
                        $arData = array(
                            'pid'       => $itemID,
                            'rid'       => (int)$value,
                            'type'      => 2
                        );                            
                        $DB->postToDB($arData, CATALOG_RELATED_TABLE);
                    }
                }
                // operation with product kits
                deleteRecords(CATALOG_KITS_TABLE, 'WHERE `pid`='.$itemID);
                if (!empty($arPostData['arKits'])) {
                    $arKits = explode(',', $arPostData['arKits']);
                    foreach ($arKits as $kid) {
                        $arData = array(
                            'pid'   => $itemID,
                            'kid'   => $kid
                        );
                        $DB->postToDB($arData, CATALOG_KITS_TABLE);
                    }
                }
                // operation with product options
                deleteDBLangsSync(PRODUCT_OPTIONS_TABLE, "WHERE `pid`={$itemID}");
                deleteDBLangsSync(PRODUCT_OPTIONS_VALUES_TABLE, "WHERE `product_id`={$itemID}");
                if (isset($arPostData["options"]) AND !empty($arPostData["options"]) AND is_array($arPostData["options"])) {
                    $arPostOptions = $arPostData["options"];
                    $cnt = 0;
                    foreach ($arPostOptions as $optionID => $arOption) {
                        if (isset($arOption["values"]) AND !empty($arOption["values"]) AND is_array($arOption["values"])) {
                            $cnt++;
                            $arData = array(
                                "oid"       => $optionID,
                                "pid"       => $itemID,
                                "required"  => isset($arOption["required"]) ? $arOption["required"] : 0,
                                "order"     => $cnt
                            );
                            if ($DB->postToDB($arData, PRODUCT_OPTIONS_TABLE, "", array(), "insert", true)) {
                                $cnt2 = 0;
                                foreach ($arOption["values"] as $arValue) {
                                    $cnt2++;
                                    $arData2 = array(
                                        "product_id" => $itemID,
                                        "option_id"  => $optionID,
                                        "value_id"   => $arValue["id"],
                                        "operator"   => $arValue["operator"],
                                        "price"      => $arValue["price"],
                                        "primary"    => isset($arValue["primary"]) ? $arValue["primary"] : 0,
                                        "order"      => $cnt2
                                    );
                                    $DB->postToDB($arData2, PRODUCT_OPTIONS_VALUES_TABLE, "", array(), "insert", true);
                                }
                            }
                        }
                    }
                }

                Redirect($arrPageData['current_url'].(isset($_POST['submit_add']) ? '&task=addItem' : ((isset($_POST['submit_apply']) AND $itemID) ? '&task=editItem&itemID='.$itemID : '')) );
            } else {
                $arrPageData['errors'][] = 'Запись <font color="red">НЕ была сохранена</font>!';
            //    unlinkUnUsedImage($arPostData['image'], $arrPageData['files_url'], $arrPageData['images_params']);
                unlinkFile($arPostData['filename'], $arrPageData['files_path']);            
            }
        }
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}

// Sorts and Filters block
$arrOrder = getOrdersByKeyExplodeFilteredArray($_GET, 'pageorder', '_');
$arrPageData['filter_url'] = !empty($arrOrder['url']) ? '&'.implode('&', $arrOrder['url']) : '';

if ($task=='addItem' OR $task=='editItem') {
    if (!$itemID) {
       if ($hasAccess) {
            $item = array_combine_multi($DB->getTableColumnsNames(CATALOG_TABLE), '');
            $item['attributes'] = $item['attrGroups'] = $item['related'] = $item['similar'] = $item['additions'] = $item['arKits'] = $item['options'] = array();
            $item['order']  = getMaxPosition($cid, 'order', 'cid', CATALOG_TABLE);
            $item['active'] = 1;
            $item['createdDate'] = date('Y-m-d');
            $item['createdTime'] = date('H:i:s');
            $item['arHistory'] = array();
        } else {
            setSessionErrors($UserAccess->getAccessError()); 
            Redirect($arrPageData['current_url']);
        }
    } elseif ($itemID and $item=getSimpleItemRow($itemID, CATALOG_TABLE)) {
        $item['createdDate'] = date('Y-m-d', strtotime($item['created']));
        $item['createdTime'] = date('H:i:s', strtotime($item['created']));
        $item['arImageData'] = $item['image'] ? getArrImageSize($arrPageData['files_url'], $item['image']) : array();
        $item['arHistory'] = ActionsLog::getInstance()->getHistory(array('modules'=>array($arrPageData['module']), 'oid'=>$item['id'], 'langs'=>array($lang)));
        // item attributes           
        $item["attributes"] = $item['attrGroups'] = array();
        $squery = "SELECT av.* FROM `".PRODUCT_ATTRIBUTE_TABLE."` pa "
                . "LEFT JOIN `".ATTRIBUTES_TABLE."` a ON(a.`id`=pa.`aid`) "
                . "LEFT JOIN `".ATTRIBUTES_VALUES_TABLE."` av ON(av.`aid`=a.`id` AND av.`id`=pa.`value`) "
                . "WHERE pa.`pid`={$itemID} "
                . "GROUP BY pa.`id`";
        $sresult = mysql_query($squery);
        if ($sresult and mysql_num_rows($sresult)>0) {
            while ($record = mysql_fetch_assoc($sresult)) {
                if (!array_key_exists($record["aid"], $item["attributes"])) $item["attributes"][$record["aid"]] = array();
                array_push($item["attributes"][$record["aid"]], $record["id"]);
            }
        }
        foreach ($arrPageData['attrGroups'] as $key=>$value) {
            if (!empty($arrPageData['attrGroups'][$key]['attributes'])) {
                foreach ($arrPageData['attrGroups'][$key]['attributes'] as $k=>$v) {
                    if (array_key_exists($arrPageData['attrGroups'][$key]['attributes'][$k]['id'], $item['attributes'])) {
                        $item['attrGroups'][] = $arrPageData['attrGroups'][$key]['id'];
                    }
                }
            }
        }
        // related & similar items
        $item['related'] = $item['similar'] = $item['additions'] = array();
        $select = 'SELECT c.*, m.`title` AS `ctitle`, cr.`type` FROM `'.CATALOG_RELATED_TABLE.'` cr ';
        $join = 'LEFT JOIN `'.CATALOG_TABLE.'` c ON(c.`id` = cr.`rid`) LEFT JOIN `'.MAIN_TABLE.'` m ON(m.`id` = c.`cid`) ';
        $where = 'WHERE cr.`pid`='.$itemID.' ';
        $order = 'ORDER BY cr.`id`';
        $query = $select.$join.$where.$order;
        $result = mysql_query($query);
        if ($result and mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                if ($row['type'] == 0) $item['related'][] = $row;
                elseif ($row['type'] == 1) $item['similar'][] = $row;
                elseif ($row['type'] == 2) $item['additions'][] = $row;
            }
        }
        // product kits            
        $item['arKits'] = getRowItems(CATALOG_TABLE.' c LEFT JOIN '.CATALOG_KITS_TABLE.' ck ON (ck.`kid`=c.`id`)', 'c.*', 'ck.`pid`='.$itemID.' GROUP BY c.`id`', 'ck.`id`');
        // item options
        $item['options'] = array();
        $query  = "SELECT o.*, po.`required` FROM `".OPTIONS_TABLE."` o ";
        $query .= "LEFT JOIN `".PRODUCT_OPTIONS_TABLE."` po ON(po.`oid`=o.`id`) ";
        $query .= "WHERE po.`pid`={$itemID} ";
        $query .= "GROUP BY o.`id` ORDER BY po.`order`";
        $result = mysql_query($query);
        if ($result AND mysql_num_rows($result) > 0) {
            while ($option = mysql_fetch_assoc($result)) {
                $option["values"] = array();
                $qry  = "SELECT pov.* FROM `".OPTIONS_VALUES_TABLE."` ov ";
                $qry .= "LEFT JOIN `".PRODUCT_OPTIONS_VALUES_TABLE."` pov ON(pov.`value_id`=ov.`id`) ";
                $qry .= "WHERE pov.`option_id`={$option["id"]} AND pov.`product_id`={$itemID} ";
                $qry .= "GROUP BY ov.`id` ORDER BY pov.`order`";
                $res  = mysql_query($qry);
                if ($res AND mysql_num_rows($res) > 0) {
                    while ($val = mysql_fetch_assoc($res)) {
                        $option["values"][$val["value_id"]] = $val;
                    }
                }
                $item['options'][$option["id"]] = $option;
            }
        }
        $item['imagesCount'] = intval(mysql_num_rows(mysql_query('SELECT * FROM '.CATALOGFILES_TABLE.' WHERE `pid`='.(int)$item['id'].' AND `active`=1 ORDER BY `fileorder`')));
    }
    
    if (!empty($_POST)) {
        $item = array_merge($item, $_POST);
    }
    $item['arImagesSettings'] = getRowItems(IMAGES_PARAMS_TABLE, '*', '`module`="'.$arrPageData['module'].'"');
    $arrPageData['arrBreadCrumb'][] = array('title'=>($task=='addItem' ? ADMIN_ADD_NEW_PAGE : ADMIN_EDIT_PAGE));

} else {
    // Create Order Links
    $arrPageData['arrOrderLinks'] = getOrdersLinks(
            array('default'=>HEAD_LINK_SORT_DEFAULT, 'title'=>HEAD_LINK_SORT_TITLE, 'created'=>HEAD_LINK_SORTDATEADD, 'price'=>HEAD_LINK_SORT_PRICE),
            $arrOrder['get'], $arrPageData['admin_url'].$arrPageData['category_url'], 'pageorder', '_');

    // Display Items List Data
    $cselect = 'SELECT t.*, m.`title` AS `cat_title`, "0" `isshortcut`, 0 `shortcutID`, t.`order` `shortcutOrder` , t.`active` `shortcutActive`
                FROM `'.CATALOG_TABLE.'` t 
                LEFT JOIN `'.MAIN_TABLE.'` m ON(m.`id` = t.`cid`) ';
    $cwhere = $cid ? "WHERE t.cid = $cid " : '';
    
    $sselect = 'SELECT t.*, m.`title` AS `cat_title`, "1" `isshortcut`, st.`id` `shortcutID`, st.`order` `shortcutOrder` , st.`active` `shortcutActive` 
                FROM '.CATALOG_TABLE.' t 
                LEFT JOIN '.SHORTCUTS_TABLE.' st ON t.`id`=st.`pid` 
                LEFT JOIN `'.MAIN_TABLE.'` m ON(m.`id` = st.`cid`)';
    $swhere  = 'WHERE st.`lang`="'.$lang.'" AND st.`module`="'.$arrPageData['module'].'" '.($cid ? " AND st.`cid` = $cid " : ' ');
    
    if (!empty($filters)) {
        if(!empty($filters['title'])) {
            $search = htmlspecialchars(strtolower(addslashes(trim($filters['title']))));
            $cwhere .= (!empty($cwhere)? 'AND': 'WHERE').' (t.`title` LIKE "%'.$search.'%" OR t.`pcode` LIKE "%'.$search.'%") ';
            $swhere .= (!empty($swhere)? 'AND': 'WHERE').' (t.`title` LIKE "%'.$search.'%" OR t.`pcode` LIKE "%'.$search.'%") ';
            $arrPageData['filter_url'] .= '&filters[title]='.$filters['title'];
        }
    }
    // Total pages and Pager
    $arrPageData['total_items'] = intval(mysql_num_rows(mysql_query('(' .$cselect.$cwhere.') UNION ALL ('.$sselect.$swhere.')')));
    $arrPageData['pager']       = getPager($page, $arrPageData['total_items'], $arrPageData['items_on_page'], $arrPageData['admin_url'].$arrPageData['category_url'].$arrPageData['filter_url']);
    $arrPageData['total_pages'] = $arrPageData['pager']['count'];
    $arrPageData['offset']      = ($page-1)*$arrPageData['items_on_page'];
    // END Total pages and Pager
    $order  = "ORDER BY ".(!empty($arrOrder['mysql']) ? implode(', ', $arrOrder['mysql']) : " `shortcutOrder` ");
    $limit  = "LIMIT {$arrPageData['offset']}, {$arrPageData['items_on_page']}";
    $result = mysql_query('(' .$cselect.$cwhere.$limit.') UNION ALL ('.$sselect.$swhere.$limit.') '.$order);
    
    if (!$result) {
        $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
    } else {
        while ($row = mysql_fetch_assoc($result)) {
            $items[] = $row;
        }
    }
}
// Include Need CSS and Scripts For This Page To Array
$arrPageData['headCss'][]       = '<link href="/js/jquery/themes/smoothness/jquery.ui.all.css" type="text/css" rel="stylesheet" />';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.core.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.autocomplete.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.widget.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.datepicker.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/1251/jquery.ui.datepicker-ru.js" type="text/javascript"></script>';

$smarty->assign('item',          $item);
$smarty->assign('items',         $items);
$smarty->assign('itemID',        $itemID);
$smarty->assign('categoryTree',  $categoryTree);
$smarty->assign('arCidCntItems', $arCidCntItems);
//\\\\\\\\\\\\\\\\\ END SMARTY BASE PAGE VARIABLES /////////////////////////////
# ##############################################################################

/*
DROP TABLE IF EXISTS `ru_catalog`;
CREATE TABLE IF NOT EXISTS `ru_catalog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `pcode` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descr` tinytext,
  `fulldescr` text,
  `price` float(24,2) NOT NULL DEFAULT '0.00',
  `image` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `meta_descr` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_robots` varchar(63) NOT NULL DEFAULT '',
  `seo_path` varchar(255) NOT NULL DEFAULT '',
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `order` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_cid` (`cid`),
  KEY `idx_productcode` (`pcode`),
  KEY `idx_title` (`title`),
  KEY `idx_price` (`price`),
  KEY `idx_order` (`order`),
  KEY `idx_active` (`active`),
  KEY `idx_created` (`created`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1;
 * 
DROP TABLE IF EXISTS `catalog_kit`;
CREATE TABLE IF NOT EXISTS `catalog_kit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL,
  `kid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pid` (`pid`),
  KEY `idx_kid` (`kid`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1;
 * 
 * 
DROP TABLE IF EXISTS `catalog_related`;
CREATE TABLE IF NOT EXISTS `catalog_related` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Relation type (0,1)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;
*/
