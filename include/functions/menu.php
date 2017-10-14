<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

/*
* ***** Menu Types ***** *
$type = 1 :  ������� ����
$type = 2 :  ������� ����
$type = 3 :  ���� ������ �������
$type = 4 :  ������ ����
$type = 5 :  ���� ������� �������
$type = 6 :  ���� ��������
$type = 7 :  ���� ������������
$type = 8 :  ��������� ����
$type = 9 :  ������ ����
default   :  ���� �� ������� 
*
* ***** Menu Levels ***** *
 if $incLevels==0 - �������� ��� ���������
 else $incLevels>0 ����� �������� ������ ��� $level<$incLevels
*
*/
function getMenu($type, $pid=false, $incLevels=0, $level=1, $arPath=array()){
    global $catid, $UrlWL;
    $menu = array();
    $query = 'SELECT `id`, `pid`, `redirectid`, `title`, `image`, `menutype`, `pagetype`, `module`, TRIM(`redirecturl`) `redirecturl`, TRIM(`seo_path`) `seo_path`, `essential` 
                FROM `'.MAIN_TABLE.'` 
                WHERE `active` = 1 AND `menutype`='.$type.($pid!==false ? ' AND `pid`='.$pid : '').' 
                ORDER BY `order`, `id`';
    $result = mysql_query($query);
    while($row = mysql_fetch_assoc($result)) {
        $row['redirecturl']   = trim($row['redirecturl']);
        $row['redirectid']    = intval($row['redirectid']);
        
        if($row['redirecturl']!='') $row['redirectid'] = 0;
        $item = $UrlWL->getCategoryById($row['redirectid']);
        
        $row['arPath']    = $arPath;
        $row['arPath'][]  = trim($row['seo_path']);
        
        if(!empty($item['id'])){
            if(IsChild($row['id'], $item['id'])){
                $id           = $row['id'];
                $arr          = $row['arPath'];
            } else {
                $id           = $item['id'];
                $arr          = $item['arPath'];
            }
            $row['arPath']    = $item['arPath'];
        } else {
            $id               = $row['id'];
            $arr              = $row['arPath'];
        }
        
        $row['subcategories'] = (!$incLevels || $level<$incLevels) ? getMenu($type, $id, $incLevels, $level+1, $arr) : array();
        $row['opened']        = ($id==$catid || IsChild($row['id'], $catid)) ? 1 : 0;
        $row['level']         = $level;
        if(isset($row['image']) && !strlen(trim($row['image']))) { 
            $row['image'] = ''; 
        }
        $menu[] = $row;
    } return $menu;
}

################################################################################
// ///////////////////////// ADDITIONAL FUNCTIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function GetRootId($id) {
    $query = "SELECT `id`, `pid` FROM ".MAIN_TABLE." WHERE `id` = $id";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    if($row['pid']==0) { return $id;}
    else return GetRootId($row['pid']);
}

function IsChild($parent_id, $id, $level=0) {
    if($parent_id == $id) return true;
    $query = "SELECT `pid` FROM ".MAIN_TABLE." WHERE `id` = $id";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    if($row['pid'] == $parent_id) return true;
    if($row['pid'] == 0) return false; // terminal operation
    return IsChild($parent_id, $row['pid'], $level+1);
}

function getChildrensIDs($id, $recursively=false) {
    $query = "SELECT `id` FROM ".MAIN_TABLE." WHERE `active`=1 AND `pid` = ".$id;
    $result = mysql_query($query);
    $arIDs = array();
    if(mysql_num_rows($result)>0){
        while($row = mysql_fetch_assoc($result)){
            $arIDs[]=$row['id'];
            if($recursively) $arIDs = array_merge($arIDs, getChildrensIDs($row['id'], $recursively));
        }
    } return $arIDs;
}

function getParentTreeIDs($id, $recursively=false) {
    $query = "SELECT `pid` FROM ".MAIN_TABLE." WHERE `id` = ".$id;
    $result = mysql_query($query);
    $arIDs = array();
    if(mysql_num_rows($result)>0){
        while($row = mysql_fetch_assoc($result)){
            $arIDs[]=$row['id'];
            if($recursively) $arIDs = array_merge($arIDs, getChildrensIDs($row['id'], $recursively));
        }
    } return $arIDs;
}

function getParentId($id) {
    $query = "SELECT `pid` FROM ".MAIN_TABLE." WHERE `id`=".intval($id)." LIMIT 1";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    return intval($row['pid']);
}

function getParent($id) {
    $query = "SELECT `id`, `pid` FROM ".MAIN_TABLE." WHERE `id`=".intval($id)." LIMIT 1";
    $result = mysql_query($query);
    $item = mysql_num_rows($result) ? mysql_fetch_assoc($result) : array();
    $pid = !empty($item['pid']) ? $item['pid'] : 0;
    while ($pid > 0) {
        $item = getParent($pid);
    } return $item;
}

function setAccess($id, $access, $recursively=false, $debug=false) {
    $count = 0;
    if($id > 0){
        $query = "UPDATE `".MAIN_TABLE."` SET `access` = '{$access}' WHERE `id`='{$id}' LIMIT 1";
        $result = mysql_query($query);
        $count += mysql_affected_rows();
        if($debug && $result===FALSE)     die("�� ��������� �������: SQL [{$query}];<br/>MySQL Error #".mysql_errno()." - ".mysql_error()."\n");
        if($recursively){
            $query  = "SELECT `id` FROM `".MAIN_TABLE."` WHERE `pid`={$id}";
            $result = mysql_query($query);
            if($debug && $result===FALSE) die("�� ��������� �������: SQL [{$query}];<br/>MySQL Error #".mysql_errno()." - ".mysql_error()."\n");
            while($row = mysql_fetch_assoc($result)) {
                $count += setAccess($row['id'], $access, $recursively, $debug);
            }
        }
    } return $count;
}

function canAccess($id, $recursively=false, $debug=false) {
    if($id > 0){
        $query  = "SELECT `id`,`access`, `pid` FROM `".MAIN_TABLE."` WHERE `id`={$id} LIMIT 1";
        $result = mysql_query($query);
        if($debug && $result===FALSE) die("�� ��������� �������: SQL [{$query}];<br/>MySQL Error #".mysql_errno()." - ".mysql_error()."\n");
        if(mysql_num_rows($result)){
            $row = mysql_fetch_assoc($result);
            if($row['access']!=1)             return 0;
            if($recursively && $row['pid']>0) return canAccess($row['pid'], $recursively, $debug);
        }
    } return 1;
}

function getBreadCrumb($id, $skipItems=0, $mainRequired=false, $debug=false) {
    $arrBreadCrumb = array();
    while($id > 0){
        $query  = "SELECT mt.`id`, mt.`pid`, mt.`redirectid`, mt.`redirecturl`,
                    mt.`title`, mt.`module`, mt.`seo_path`, mt.`pagetype`,
                    rt.`pid` `rpid`, rt.`seo_path` `rpath` 
                FROM `".MAIN_TABLE."` mt
                LEFT JOIN `".MAIN_TABLE."` rt ON rt.`id`=mt.`redirectid`
                WHERE mt.`id`={$id} LIMIT 1";
        $result = mysql_query($query);
        if($debug && $result===FALSE)
            die("�� ��������� �������: SQL [{$query}];<br/>MySQL Error #".mysql_errno()." - ".mysql_error()."\n");
        if(mysql_num_rows($result)){
               $row = mysql_fetch_assoc($result);
               $arrBreadCrumb[] = $row;
               $id = ($mainRequired && $row['pid']==0 && $row['id']!=1) ? 1 : $row['pid'];
         } elseif($id>1) { $id = 1;
         } else            $id = 0;
    } 
    $count = sizeof($arrBreadCrumb);
    if($count){
        $arrBreadCrumb = array_reverse($arrBreadCrumb);
        if($skipItems!==0)
             $arrBreadCrumb = $skipItems>0 ? array_slice($arrBreadCrumb, $skipItems) : array_slice($arrBreadCrumb, 0, $skipItems);
        $arPath = array();
        foreach($arrBreadCrumb as $ind=>$arItem){
            if($arItem['id']==1) continue;
            $arPath[] = $arItem['seo_path'];
            $arrBreadCrumb[$ind]['arPath'] = $arPath;
            if($arrBreadCrumb[$ind]['redirectid']>0 && $arrBreadCrumb[$ind]['id']==$arrBreadCrumb[$ind]['rpid'])
                $arrBreadCrumb[$ind]['arPath'][] = $arrBreadCrumb[$ind]['rpath'];
        }
    } return $arrBreadCrumb;
}
// \\\\\\\\\\\\\\\\\\\\\\\ END ADDITIONAL FUNCTIONS ////////////////////////////
################################################################################
