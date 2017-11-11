<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

# ##############################################################################
// //////////////////////// OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\
// SET from $_GET Global Array Item ID Var = integer
$itemID        = (isset($_GET['itemID']) and intval($_GET['itemID'])) ? intval($_GET['itemID']) : 0;
$cid           = (isset($_GET['cid']) and intval($_GET['cid']))       ? intval($_GET['cid'])    : 0;
$object_module = (isset($_GET['object_module']))   ? trim($_GET['object_module'])    : 'catalog';
$table         = constant(strtoupper($object_module.'_table'));
$categoryTree  = getCategoriesTreeWithItems($lang, $table, $arrModules[$object_module]['id'], 0, false);
$hasAccess     = $UserAccess->getAccessToModule($arrPageData['module']); 
$item          = array();
// /////////////////////// END OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ///////////// REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\\
$arrPageData['itemID']        = $itemID;
$arrPageData['cid']           = $cid;
$arrPageData['object_module'] = $object_module;
$arrPageData['category_url']  = ($cid ? '&cid='.$cid : '').($object_module ? '&object_module='.$object_module : '');
$arrPageData['current_url']   = $arrPageData['admin_url'].$arrPageData['category_url'].$arrPageData['page_url'];
$arrPageData['arrBreadCrumb'] = getBreadCrumb($cid, 1);
// ////////// END REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ////////////////////////// POST AND GET OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\
$object_title = $itemID ? getValueFromDB(SHORTCUTS_TABLE.' st LEFT JOIN '.$table.' ct ON st.`pid`=ct.`id` ', 'ct.`title`', 'WHERE st.`id`='.$itemID,'title') : '';
// Delete Item
if($itemID and $task=='deleteItem') {
    if($hasAccess){
        $item = getItemRow(SHORTCUTS_TABLE, '*', 'WHERE `id`='.$itemID);
        if(isset($_GET['allLangs'])) {
            foreach(SystemComponent::getAcceptLangs() as $key => $arLang) {
                $result = deleteRecords(SHORTCUTS_TABLE, 'WHERE `cid`='.$item['cid'].' AND `pid`='.$item['pid'].' AND `lang`="'.$key.'" AND `module`="'.$item['module'].'"');
                if(!$result) {
                    setSessionErrors('������ �� ������� �������. ��������� ������� - <p>MySQL Error Delete: '.mysql_errno().'</b> Error:'.mysql_error().'</p>');
                    break;
                } else {
                    ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, '������ ����� ��� "'.$object_title.'"', $key, '����� ��� "'.$object_title.'"', 0, $arrPageData['module']);                
                }
            }
        } else {
            $result = deleteRecords(SHORTCUTS_TABLE, 'WHERE `id`='.$itemID);
            if(!$result)  setSessionErrors('������ �� ������� �������. ��������� ������� - <p>MySQL Error Delete: '.mysql_errno().'</b> Error:'.mysql_error().'</p>');
            else {
                setSessionMessage('����� ������!');
                ActionsLog::getInstance()->save(ActionsLog::ACTION_DELETE, '������ ����� ��� "'.$object_title.'"', $lang, '����� ��� "'.$object_title.'"', 0, $arrPageData['module']);  
            }
        }
        Redirect('/admin/?module='.$object_module);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Set Active Status Item
elseif($itemID and $task=='publishItem' and isset($_GET['status'])) {
    if($hasAccess) {
        $result = updateRecords(SHORTCUTS_TABLE, "`active`='{$_GET['status']}'", 'WHERE `id`='.$itemID);
        if($result===false) {
            setSessionErrors('����� ��������� <font color="red">�� ���� ���������</font>! Error Update: '. mysql_error());
        } elseif($result) {
            setSessionMessage('����� ��������� ������� ���������!');
            ActionsLog::getInstance()->save(ActionsLog::ACTION_PUBLICATION, '�������� ���������� �������� �� "'.($_GET['status']==1 ? '������������' : '��������������' ).'"', $lang, '����� ��� "'.$object_title.'"', $itemID, $arrPageData['module']);
        }
        Redirect('/admin/?module='.$object_module);
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Insert Or Update Item in Database
elseif(!empty($_POST) and ($task=='addItem' or $task=='editItem')) {
    if($hasAccess) {
        $Validator->validateGeneral($_POST['pid'], '�� �� ������� ������!!!');
        $Validator->validateGeneral($_POST['cid'], '�� �� ������� ���������!!!');
        if($_POST['cid']==0) $Validator->addError('�� �� ������� ���������!!!');
        
        if($task=='addItem'){
            $arIdx = array();
            $squery = 'SELECT `pid` as `id` FROM '.SHORTCUTS_TABLE.' 
                       WHERE `module`="'.$arrPageData['module'].'" AND `cid`='.$_POST['cid'].
                       ($_POST['pid'] ? ' OR (`cid`='.$_POST['cid'].' AND `pid`='.$_POST['pid'].')' : '');
            $cquery = 'SELECT `id` FROM '.$table.' WHERE `cid`='.$_POST['cid'];
            $result = mysql_query('('.$squery.') UNION ALL ('.$cquery.')');
            if(mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_assoc($result)) {
                    $arIdx[] = $row['id'];
                }
            }
            if(in_array($_POST['pid'], $arIdx))
                   $Validator->addError('����� �� ����� ���� ������, ��� ��� �� ��� ����������!');
        }
        
        if ($Validator->foundErrors()) {
            $arrPageData['errors'][] = "<font color='#990033'>����������, ������� ���������� �������� :  </font>".$Validator->getListedErrors();
        } else {
            $arPostData = $_POST;
            $arUnusedKeys = array('id', 'stext');
            $query_type   = $itemID ? 'update'            : 'insert';
            $conditions   = $itemID ? 'WHERE `id`='.$itemID : '';
            $arPostData['module'] = $object_module;
            if(isset($_POST['allLangs'])){
                $object = $itemID ? getItemRow(SHORTCUTS_TABLE,'*', 'WHERE `id`='.$itemID) : array();
                foreach(SystemComponent::getAcceptLangs() as $key => $arLang) {
                    $arPostData['lang'] = $key;
                    $conditions   = ($itemID and !empty($object)) ? 'WHERE `lang`="'.$key.'" AND `cid`='.$object['cid'].' AND `pid`='.$object['pid'].' AND `module`="'.$object_module.'"' : '';
                    $result = $DB->postToDB($arPostData, SHORTCUTS_TABLE, $conditions,  $arUnusedKeys, $query_type, false);
                    if(!$result) break;
                    else if (!$itemID and $result and $key==$lang) $itemID = $result;
                }
            } else {
                $arPostData['lang'] = $lang;
                $result = $DB->postToDB($arPostData, SHORTCUTS_TABLE, $conditions,  $arUnusedKeys, $query_type, false);
            }
            
            if($result){
                setSessionMessage('������ ������� ���������!');
                if(!$itemID and $result and is_int($result)) {
                    $itemID = $result;
                }
                if(isset($_POST['allLangs']) or $task=='addItem'){
                    $object_title = $arPostData['pid'] ? getValueFromDB(SHORTCUTS_TABLE.' st LEFT JOIN '.$table.' ct ON st.`pid`=ct.`id` ', 'ct.`title`', 'WHERE ct.`id`='.$arPostData['pid'],'title') : '';
                    foreach(SystemComponent::getAcceptLangs() as $key => $arLang)
                        ActionsLog::getInstance()->save(($task=='addItem' ? ActionsLog::ACTION_CREATE : ActionsLog::ACTION_EDIT), ($task=='addItem' ? '������ ����� ��� ������ ' : '�������������� ����� ').'"'.$object_title.'"', $key, '����� ��� "'.$object_title.'"', $itemID, $arrPageData['module']);
                } else {
                     ActionsLog::getInstance()->save(($task=='addItem' ? ActionsLog::ACTION_CREATE : ActionsLog::ACTION_EDIT), ($task=='addItem' ? '������ ����� ��� ������ ' : '�������������� ����� ').'"'.$object_title.'"', $lang, '����� ��� "'.$object_title.'"', $itemID, $arrPageData['module']);
                } 
                Redirect((isset($_POST['submit']) ? '/admin/?module='.$object_module : $arrPageData['current_url']).(isset($_POST['submit_add']) ? '&task=addItem' : ((isset($_POST['submit_apply']) and $itemID) ? '&task=editItem&itemID='.$itemID : '')) );
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
if($task=='addItem' or $task=='editItem'){
    if(!$itemID){
       if($hasAccess) {
            $item = array_combine_multi($DB->getTableColumnsNames(SHORTCUTS_TABLE), '');
            $item['order']  = getMaxPosition($cid, 'order', 'cid', SHORTCUTS_TABLE);
            $item['active'] = 1;
            $item['arHistory'] = array();
        } else {
            setSessionErrors($UserAccess->getAccessError()); 
            Redirect('/admin/?module='.$object_module);
        }
    } elseif($itemID) {
        $query = "SELECT * FROM ".SHORTCUTS_TABLE." WHERE id = $itemID LIMIT 1";
        $result = mysql_query($query);
        if(!$result) {
            $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
        } elseif(!mysql_num_rows($result)) {
            $arrPageData['errors'][] = "SELECT OPERATIONS: No this Item in DataBase";
        } else {
            $item = mysql_fetch_assoc($result);
            $item['title'] = $object_title;
            $item['arHistory'] = ActionsLog::getInstance()->getHistory(array('modules'=>array($arrPageData['module']), 'oid'=>$item['id'], 'langs'=>array($lang)));
        }
    }

    if(!empty($_POST)) {
        $item = array_merge($item, $_POST);
    }

    $arrPageData['arrBreadCrumb'][] = array('title'=>($task=='addItem' ? ADMIN_ADD_NEW_PAGE : ADMIN_EDIT_PAGE));
}
// /////////////////////// END LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################
// Include Need CSS and Scripts For This Page To Array
$arrPageData['headCss'][]       = '<link href="/js/jquery/themes/smoothness/jquery.ui.all.css" type="text/css" rel="stylesheet" />';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.core.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.autocomplete.js" type="text/javascript"></script>';
$arrPageData['headScripts'][]   = '<script src="/js/jquery/ui/jquery.ui.widget.js" type="text/javascript"></script>';


# ##############################################################################
///////////////////// SMARTY BASE PAGE VARIABLES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$smarty->assign('item',          $item);
$smarty->assign('categoryTree',  $categoryTree);
//\\\\\\\\\\\\\\\\\ END SMARTY BASE PAGE VARIABLES /////////////////////////////
# ##############################################################################

/*
DROP TABLE IF EXISTS `shortcuts`;
 CREATE TABLE IF NOT EXISTS `shortcuts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL,
  `cid` int(11) unsigned NOT NULL,
  `lang` varchar(10) NOT NULL,  
  `module` varchar(10) NOT NULL,  
  `active` int(2)  NOT NULL DEFAULT '1',
  `order` int(11)  NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pid` (`pid`),
  KEY `idx_cid` (`cid`),
  KEY `idx_lang` (`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ; 
  */
