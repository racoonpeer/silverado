<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access


# ##############################################################################
// //////////////////////// OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\
// SET from $_GET Global Array Item ID Var = integer
$cid           = (isset($_GET['cid']) and intval($_GET['cid']))       ? intval($_GET['cid'])    : 0;
$itemID        = (isset($_GET['itemID']) and intval($_GET['itemID'])) ? intval($_GET['itemID']) : 0;
$copyID        = (isset($_GET['copyID']) and intval($_GET['copyID'])) ? intval($_GET['copyID']) : 0;
$item          = array(); // Item Info Array
$items         = array(); // Items Array of items Info arrays
$categoryTree  = getCategoriesTree($lang, $arrModules['catalog']['id'], 0, true, 'catalog');
$arCidCntItems = getItemsCountInCategories('cid', 'count', BRANDS_DESCR_TABLE, '`cid`,COUNT(`cid`) as count', 'GROUP BY `cid`');
$hasAccess    = $UserAccess->getAccessToModule($arrPageData['module']); 
// /////////////////////// END OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ///////////// REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\\
$arrPageData['cid']           = $cid;
$arrPageData['itemID']        = $itemID;
$arrPageData['category_url']  = $cid ? '&cid='.$cid : '';
$arrPageData['current_url']   = $arrPageData['admin_url'].$arrPageData['page_url'];
$arrPageData['headTitle']     = BRANDS.$arrPageData['seo_separator'].$arrPageData['headTitle'];
$arrPageData['files_url']     = UPLOAD_URL_DIR.$module.'/';
$arrPageData['files_path']    = prepareDirPath($arrPageData['files_url'], true);
$arrPageData['items_on_page'] = 20;
// ////////// END REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ////////////////////////// POST AND GET OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\
// SET Reorder
$item_title = $itemID ? getValueFromDB(BRANDS_TABLE, 'title', 'WHERE `id`='.$itemID) : '';
if($task=='reorderItems' and !empty($_POST)) {
    if($hasAccess) {
        $result = reorderItems($_POST['arOrder'], 'order', 'id', BRANDS_TABLE, array('action'=>ActionsLog::ACTION_EDIT, 'comment'=>'�������� ����������', 'lang'=>$lang, 'module'=>$arrPageData['module']));
        if($result===true) {
            $arrPageData['messages'][] = '����� ��������� ������� ���������!';
        } elseif($result) {
            $arrPageData['errors'][] = $result;
        }
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Delete Item
elseif($itemID and $task=='deleteItem') {
    if($hasAccess) {
      //  unlinkImageLangsSynchronize($itemID, BRANDS_TABLE, $arrPageData['files_path'], $arrPageData['images_params']);
        PHPHelper::deleteImages($itemID, $arrPageData['files_path'], $arrPageData['module']);
        $result = deleteDBLangsSync(BRANDS_TABLE, ' WHERE id='.$itemID);
        if(!$result) {
            $arrPageData['errors'][] = '������ �� ������� �������. ��������� ������� - <p>MySQL Error Delete: '.mysql_errno().'</b> Error:'.mysql_error().'</p>';
        } elseif($result) {
            foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, '������� "'.$item_title.'"', $key, $item_title, 0, $arrPageData['module']);
            updateDBLangsSync(CATALOG_TABLE, '`bid`=0', 'WHERE `bid`='.$itemID);
            deleteDBLangsSync(BRANDS_DESCR_TABLE, ' WHERE `pid`='.$itemID);
            Redirect($arrPageData['current_url']);
        }
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Set Active Status Item
elseif($itemID and $task=='publishItem' and isset($_GET['status'])) {
    if($hasAccess) {
        $result = updateRecords(BRANDS_TABLE, "`active`='{$_GET['status']}'", 'WHERE `id`='.$itemID);
        if($result===false) {
            $arrPageData['errors'][]   = '����� ��������� <font color="red">�� ���� ���������</font>! Error Update: '. mysql_error();
        } elseif($result) {
            ActionsLog::getInstance()->save(ActionsLog::ACTION_PUBLICATION, '�������� ���������� �� "'.($_GET['status']==1 ? '������������' : '��������������' ).'"', $lang, $item_title, $itemID, $arrPageData['module']);
            $arrPageData['messages'][] = '����� ��������� ������� ���������!';
        }
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
//Copy item
elseif($copyID and $task=='addItem'){
    if($hasAccess) {
        $arrPageData['messages'][] = '������ ������� �����������!';
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Insert Or Update Item in Database
elseif(!empty($_POST) and ($task=='addItem' or $task=='editItem')) {
    if($hasAccess) {
        $arUnusedKeys = array();
        $query_type   = $itemID ? 'update'            : 'insert';
        $conditions   = $itemID ? 'WHERE `id`='.$itemID : '';

        $Validator->validateGeneral($_POST['title'], '�� �� ����� �������� ��������!!!');
        $Validator->validateGeneral($_POST['order'], '�� �� ����� ���������� ����� ��������!!!');

        if ($Validator->foundErrors()) {
            $arrPageData['errors'][] = "<font color='#990033'>����������, ������� ���������� �������� :  </font>".$Validator->getListedErrors();
        } else {
            // SEO path manipulation
            $_POST['seo_path'] = $UrlWL->strToUniqueUrl($DB, (empty($_POST['seo_path']) ? $_POST['title'] : $_POST['seo_path']), $module, BRANDS_TABLE, $itemID, empty($itemID));
            // copy post data
            $arPostData = $_POST;
//            $arPostData['image'] = imageManipulation($itemID, BRANDS_TABLE, $arrPageData['files_url'], $arrPageData['images_params']);
            imageManipulationWithCrop($arPostData, $arUnusedKeys, $arrPageData['files_url'], $arrPageData['files_path'], $task, $itemID, $module);
            if(empty($arPostData['arDescr'])){
                $arUnusedKeys[] = 'arDescr';
                $arPostData['arDescr']=array();
            }

            if(empty($arPostData['createdDate'])) {
                $arPostData['createdDate'] = date('Y-m-d');
            }
            if(empty($arPostData['createdTime'])) {
                $arPostData['createdTime'] = date('H:i:s');
            }
            $arPostData['created'] = "{$arPostData['createdDate']} {$arPostData['createdTime']}";

            $result = $DB->postToDB($arPostData, BRANDS_TABLE, $conditions,  $arUnusedKeys, $query_type, ($itemID ? false : true));
            if($result){
                if(!$itemID and $result and is_int($result)) {
                    $itemID = $result;
                }
                if(mysql_affected_rows()) {
                    $item_title = getValueFromDB(BRANDS_TABLE, 'title', 'WHERE `id`='.$itemID);
                    if($task=='addItem'){
                        foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                            ActionsLog::getInstance()->save(ActionsLog::ACTION_CREATE, '������� "'.$item_title.'"', $key, $item_title, $itemID, $arrPageData['module']);
                    } else {
                         ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, '��������������� "'.$item_title.'"', $lang, $item_title, $itemID, $arrPageData['module']);
                    }  
                }
                setSessionMessage('������ ������� ���������!');
                // operation with brands description
                $descrIDX = array();
                foreach ($arPostData['arDescr'] as $descr_cid=>$arDescr) {
                    if (!empty($arDescr["fulldescr"])) {
                        $exists = getItemRow(BRANDS_DESCR_TABLE, "*", "WHERE `id`={$arDescr["id"]}");
                        $qtype  = !empty($exists) ? "update" : "insert";
                        $lnsync = !empty($exists) ? false    : true;
                        $where  = !empty($exists) ? "WHERE `id`={$arDescr["id"]}" : "";
                        $unkeys = array("id");
                        if (!empty($exists)) {
                            $unkeys[] = "cid";
                            $unkeys[] = "pid";
                        }
                        $arData = array(
                            'pid'       => $itemID,
                            'cid'       => $descr_cid,
                            'fulldescr' => $arDescr["fulldescr"]
                        );
                        $resID = $DB->postToDB($arData, BRANDS_DESCR_TABLE, $where, $unkeys, $qtype, $lnsync);
                        if ($resID AND is_int($resID)) $arDescr["id"] = $resID;
                        $descrIDX[] = $arDescr["id"];
                    }
                }
                deleteDBLangsSync(BRANDS_DESCR_TABLE, 'WHERE `pid`='.$itemID.(!empty($descrIDX) ? ' AND `id` NOT IN('.implode(",", $descrIDX).')' : ""));
                
                Redirect($arrPageData['current_url'].(isset($_POST['submit_add']) ? '&task=addItem' : ((isset($_POST['submit_apply']) and $itemID) ? '&task=editItem&itemID='.$itemID : '')) );
            } else {
                $arrPageData['errors'][] = '������ <font color="red">�� ���� ���������</font>!';
               // unlinkUnUsedImage($arPostData['image'], $arrPageData['files_url'], $arrPageData['images_params']);
            }
        }
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// \\\\\\\\\\\\\\\\\\\\\\\ END POST AND GET OPERATIONS /////////////////////////
# ##############################################################################


# ##############################################################################
// ///////////////////////// LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\

// Sorts and Filters block
$arrOrder = getOrdersByKeyExplodeFilteredArray($_GET, 'pageorder', '_');
$arrPageData['filter_url'] = !empty($arrOrder['url']) ? '&'.implode('&', $arrOrder['url']) : '';


if($task=='addItem' or $task=='editItem'){
    if(!$itemID){
        if($hasAccess){
            if($copyID){
                $item = getSimpleItemRow($copyID, BRANDS_TABLE);
                $item = array_merge($item, array('id'=>'', 'image'=>''));
                $item['arDescr'] = getRowItemsInKey('cid', BRANDS_DESCR_TABLE, '*, (1) AS `exists`', 'WHERE `pid`='.$copyID);
            } else {    
                $item = array_combine_multi($DB->getTableColumnsNames(BRANDS_TABLE), '');
                $item['arDescr'] = array();
            }
            $item['order']  = getMaxPosition(null, 'order', 'cid', BRANDS_TABLE);
            $item['active'] = 1;
            $item['createdDate'] = date('Y-m-d');
            $item['createdTime'] = date('H:i:s');
            $item['arHistory'] = array();
        } else {
            setSessionErrors($UserAccess->getAccessError()); 
            Redirect($arrPageData['current_url']);
        }
    } elseif($itemID) {
        $query = "SELECT * FROM ".BRANDS_TABLE." WHERE id = $itemID LIMIT 1";
        $result = mysql_query($query);
        if(!$result) {
            $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
        } elseif(!mysql_num_rows($result)) {
            $arrPageData['errors'][] = "SELECT OPERATIONS: No this Item in DataBase";
        } else {
            $item = mysql_fetch_assoc($result);
            $item['createdDate'] = date('Y-m-d', strtotime($item['created']));
            $item['createdTime'] = date('H:i:s', strtotime($item['created']));
            $item['arImageData'] = $item['image'] ? getArrImageSize($arrPageData['files_url'], $item['image']) : array();
            $item['arDescr']     = getRowItemsInKey('cid', BRANDS_DESCR_TABLE, '*, (1) AS `exists`', 'WHERE `pid`='.$itemID);
            $item['arHistory']   = ActionsLog::getInstance()->getHistory(array('modules'=>array($arrPageData['module']), 'oid'=>$item['id'], 'langs'=>array($lang)));
        }
    }
    
    if(!empty($_POST)) {
        $item = array_merge($item, $_POST);
    }
    $item['arImagesSettings'] = getRowItems(IMAGES_PARAMS_TABLE, '*', '`module`="'.$arrPageData['module'].'"');
    // Include Need CSS and Scripts For This Page To Array
    $arrPageData['headCss'][]       = '<link href="/js/jquery/themes/base/jquery.ui.all.css" type="text/css" rel="stylesheet" />';
    $arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.core.js" type="text/javascript"></script>';
    $arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.widget.js" type="text/javascript"></script>';
    $arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.datepicker.js" type="text/javascript"></script>';
    $arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/1251/jquery.ui.datepicker-ru.js" type="text/javascript"></script>';

} else {
    // Create Order Links
    $arrPageData['arrOrderLinks'] = getOrdersLinks(
            array('default'=>HEAD_LINK_SORT_DEFAULT, 'title'=>HEAD_LINK_SORT_TITLE, 'created'=>HEAD_LINK_SORTDATEADD),
            $arrOrder['get'], $arrPageData['admin_url'], 'pageorder', '_');

    // Display Items List Data
    $where = "";
    
    // Total pages and Pager
    $arrPageData['total_items'] = intval(getValueFromDB(BRANDS_TABLE." t", 'COUNT(*)', $where, 'count'));
    $arrPageData['pager']       = getPager($page, $arrPageData['total_items'], $arrPageData['items_on_page'], $arrPageData['admin_url'].$arrPageData['filter_url']);
    $arrPageData['total_pages'] = $arrPageData['pager']['count'];
    $arrPageData['offset']      = ($page-1)*$arrPageData['items_on_page'];
    // END Total pages and Pager

    $order = "ORDER BY ".(!empty($arrOrder['mysql']) ? 't.'.implode(', t.', $arrOrder['mysql']) : "t.order, t.id");
    $limit = "LIMIT {$arrPageData['offset']}, {$arrPageData['items_on_page']}";

    $query  = "SELECT t.* FROM `".BRANDS_TABLE."` t $where $order $limit";
    $result = mysql_query($query);
    if(!$result) {
        $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
    } else {
        while ($row = mysql_fetch_assoc($result)) {
            $items[] = $row;
        }
    }
}
// /////////////////////// END LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
///////////////////// SMARTY BASE PAGE VARIABLES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$smarty->assign('item',          $item);
$smarty->assign('items',         $items);
$smarty->assign('categoryTree',  $categoryTree);
$smarty->assign('arCidCntItems', $arCidCntItems);
//\\\\\\\\\\\\\\\\\ END SMARTY BASE PAGE VARIABLES /////////////////////////////
# ##############################################################################


/*
DROP TABLE IF EXISTS `ru_brands`;
CREATE TABLE IF NOT EXISTS `ru_brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `descr` text,
  `fulldescr` text,
  `image` varchar(255) DEFAULT NULL,
  `meta_descr` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_robots` varchar(63) NOT NULL DEFAULT '',
  `seo_path` varchar(255) NOT NULL DEFAULT '',
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `order` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_title` (`title`),
  KEY `idx_order` (`order`),
  KEY `idx_active` (`active`),
  KEY `idx_created` (`created`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;
 * 
DROP TABLE IF EXISTS `ru_brands_description`;
CREATE TABLE IF NOT EXISTS `ru_brands_description` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `fulldescr` text,
  PRIMARY KEY (`id`),
  KEY `idx_pid` (`pid`),
  KEY `idx_cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1;
 */