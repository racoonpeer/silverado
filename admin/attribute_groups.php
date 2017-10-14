<?php defined('WEBlife') or die( 'Restricted access' );

# ##############################################################################
// //////////////////////// OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\
// SET from $_GET Global Array Item ID Var = integer
$itemID        = (isset($_GET['itemID']) and intval($_GET['itemID'])) ? intval($_GET['itemID']) : 0;
$copyID        = (isset($_GET['copyID']) and intval($_GET['copyID'])) ? intval($_GET['copyID']) : 0;
$item          = array(); // Item Info Array
$items         = array(); // Items Array of items Info arrays
$hasAccess     = $UserAccess->getAccessToModule($arrPageData['module']);
// /////////////////////// END OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################

# ##############################################################################
// ///////////// REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\\
$arrPageData['itemID']        = $itemID;
$arrPageData['current_url']   = $arrPageData['admin_url'].$arrPageData['page_url'];
$arrPageData['headTitle']     = ATTRIBUTE_GROUPS.$arrPageData['seo_separator'].$arrPageData['headTitle'];
$arrPageData['items_on_page'] = 20;
$categoryTree = getRowItems(ATTRIBUTE_GROUPS_TABLE);
if(!empty($categoryTree)) {
    foreach($categoryTree as $key => $group) {
        $categoryTree[$key]['children'] = getRowItems(ATTRIBUTES_TABLE, '*', '`gid`='.$group['id']);
    }
}
// ////////// END REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\
# ##############################################################################

# ##############################################################################
// ////////////////////////// POST AND GET OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\
// SET Reorder
$item_title = $itemID ? getValueFromDB(ATTRIBUTE_GROUPS_TABLE, 'title', 'WHERE `id`='.$itemID) : '';
if($task=='reorderItems' and !empty($_POST)) {
    if($hasAccess) {
        $result = reorderItems($_POST['arOrder'], 'order', 'id', ATTRIBUTE_GROUPS_TABLE, array('action'=>ActionsLog::ACTION_EDIT, 'comment'=>'�������� ����������', 'lang'=>$lang, 'module'=>$arrPageData['module']));
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
        $result = deleteDBLangsSync(ATTRIBUTE_GROUPS_TABLE, ' WHERE id='.$itemID);
        if(!$result) {
            $arrPageData['errors'][] = '������ �� ������� �������. ��������� ������� - <p>MySQL Error Delete: '.mysql_errno().'</b> Error:'.mysql_error().'</p>';
        } elseif($result) {
            foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, '������� "'.$item_title.'"', $key, $item_title, 0, $arrPageData['module']);
            deleteDBLangsSync(PRODUCT_ATTRIBUTE_TABLE, 'WHERE `aid` IN(SELECT `id` FROM `'.ATTRIBUTES_TABLE.'` WHERE `gid`='.$itemID.')');
            deleteDBLangsSync(FILTERS_TABLE, 'WHERE `aid` IN(SELECT `id` FROM `'.ATTRIBUTES_TABLE.'` WHERE `gid`='.$itemID.')');
            deleteDBLangsSync(ATTRIBUTES_TABLE, 'WHERE `gid`='.$itemID);
            Redirect($arrPageData['current_url']);
        }
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Set Active Status Item
elseif($itemID and $task=='publishItem' and isset($_GET['status'])) {
    if($hasAccess) {
        $result = updateRecords(ATTRIBUTE_GROUPS_TABLE, "`active`='{$_GET['status']}'", 'WHERE `id`='.$itemID);
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
            $arPostData = $_POST;

            $result = $DB->postToDB($arPostData, ATTRIBUTE_GROUPS_TABLE, $conditions,  $arUnusedKeys, $query_type, ($itemID ? false : true));
            if($result){
                if(!$itemID and $result and is_int($result)) {
                    $itemID = $result;
                }
                if(mysql_affected_rows()) {
                    $item_title = getValueFromDB(ATTRIBUTE_GROUPS_TABLE, 'title', 'WHERE `id`='.$itemID);
                    if($task=='addItem'){
                        foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                            ActionsLog::getInstance()->save(ActionsLog::ACTION_CREATE, '������� "'.$item_title.'"', $key, $item_title, $itemID, $arrPageData['module']);
                    } else {
                         ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, '��������������� "'.$item_title.'"', $lang, $item_title, $itemID, $arrPageData['module']);
                    }
                }  
                setSessionMessage('������ ������� ���������!');
                Redirect($arrPageData['current_url'].(isset($_POST['submit_add']) ? '&task=addItem' : ((isset($_POST['submit_apply']) and $itemID) ? '&task=editItem&itemID='.$itemID : '')) );
            } else {
                $arrPageData['errors'][] = '������ <font color="red">�� ���� ���������</font>!';
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
        if($hasAccess) {
            if($copyID) {
                $item = getSimpleItemRow($copyID, ATTRIBUTE_GROUPS_TABLE);
                $item = array_merge($item, array('id'=>''));
            } else {    
                $item = array_combine_multi($DB->getTableColumnsNames(ATTRIBUTE_GROUPS_TABLE), '');
            }
            $item['order']  = getMaxPosition(null, 'order', 'cid', ATTRIBUTE_GROUPS_TABLE);
            $item['active'] = 1;
            $item['arHistory'] = array();
        } else {
            setSessionErrors($UserAccess->getAccessError()); 
            Redirect($arrPageData['current_url']);
        }
    } elseif($itemID) {
        $query = "SELECT * FROM ".ATTRIBUTE_GROUPS_TABLE." WHERE id = $itemID LIMIT 1";
        $result = mysql_query($query);
        if(!$result) {
            $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
        } elseif(!mysql_num_rows($result)) {
            $arrPageData['errors'][] = "SELECT OPERATIONS: No this Item in DataBase";
        } else {
            $item = mysql_fetch_assoc($result);
            $item['arHistory'] = ActionsLog::getInstance()->getHistory(array('modules'=>array($arrPageData['module']), 'oid'=>$item['id'], 'langs'=>array($lang)));
        }
    }
    
    if(!empty($_POST)) {
        $item = array_merge($item, $_POST);
    }

    // Include Need CSS and Scripts For This Page To Array
    $arrPageData['headCss'][]       = '<link href="/js/jquery/themes/base/jquery.ui.all.css" type="text/css" rel="stylesheet" />';
    $arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.core.js" type="text/javascript"></script>';
    $arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.widget.js" type="text/javascript"></script>';
    $arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.datepicker.js" type="text/javascript"></script>';
    $arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/1251/jquery.ui.datepicker-ru.js" type="text/javascript"></script>';

} else {
    // Create Order Links
    $arrPageData['arrOrderLinks'] = getOrdersLinks(
            array('default'=>HEAD_LINK_SORT_DEFAULT, 'title'=>HEAD_LINK_SORT_TITLE),
            $arrOrder['get'], $arrPageData['admin_url'], 'pageorder', '_');

    // Display Items List Data
    $where = "";
    
    // Total pages and Pager
    $arrPageData['total_items'] = intval(getValueFromDB(ATTRIBUTE_GROUPS_TABLE." t", 'COUNT(*)', $where, 'count'));
    $arrPageData['pager']       = getPager($page, $arrPageData['total_items'], $arrPageData['items_on_page'], $arrPageData['admin_url'].$arrPageData['filter_url']);
    $arrPageData['total_pages'] = $arrPageData['pager']['count'];
    $arrPageData['offset']      = ($page-1)*$arrPageData['items_on_page'];
    // END Total pages and Pager

    $order = "ORDER BY ".(!empty($arrOrder['mysql']) ? 't.'.implode(', t.', $arrOrder['mysql']) : "t.order, t.id");
    $limit = "LIMIT {$arrPageData['offset']}, {$arrPageData['items_on_page']}";

    $query  = "SELECT t.* FROM `".ATTRIBUTE_GROUPS_TABLE."` t $where $order $limit";
    $result = mysql_query($query);
    if(!$result) {
        $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
    } else {
        while ($row = mysql_fetch_assoc($result)) {
            $row['attributes'] = getComplexRowItems(ATTRIBUTES_TABLE, '*', 'WHERE `gid`='.(int)$row['id']);
            $row['products']   = array();
            $row['filters']    = array();
            if(!empty($row['attributes'])) {
                foreach ($row['attributes'] as $attribute) {
                    $row['products'][] = getItemRow(CATALOG_TABLE, '*', 'WHERE `id` IN(SELECT `pid` FROM `'.PRODUCT_ATTRIBUTE_TABLE.'` WHERE `aid`='.(int)$attribute['id'].')');
                    $row['filters'][] = getItemRow(FILTERS_TABLE, '*', 'WHERE `aid`='.(int)$attribute['id']);
                }
            }
            $items[]           = $row;
        }
    }
}
// /////////////////////// END LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################

# ##############################################################################
///////////////////// SMARTY BASE PAGE VARIABLES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$smarty->assign('item',          $item);
$smarty->assign('items',         $items);
$smarty->assign('categoryTree', $categoryTree);
//\\\\\\\\\\\\\\\\\ END SMARTY BASE PAGE VARIABLES /////////////////////////////
# ##############################################################################