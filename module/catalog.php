<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

# ##############################################################################
// //////////////////////// OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\
$sort          = intval($UrlWL->getParam(UrlWL::SORT_KEY_NAME, 0));
$limit         = intval($UrlWL->getParam(UrlWL::LIMIT_KEY_NAME, 0));
$pages         = trim(addslashes($UrlWL->getParam(UrlWL::PAGES_KEY_NAME, '')));
$itemID        = $UrlWL->getItemId();
$json          = array(); // Item Info Array
$item          = array(); // Item Info Array
$items         = array(); // Items Array of items Info arrays
$images_params = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="'.$module.'"'));
// /////////////////////// END OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ////////// OPERATION MANIPULATION WITH SESSION VARIABLE \\\\\\\\\\\\\\\\\\\\\
// Manipulation with Sort
if ($sort) {
    $sort = PHPHelper::getCorrectCatalogSort($sort);
    $_SESSION[MDATA_KNAME][$module][UrlWL::SORT_KEY_NAME] = &$sort;
} elseif ($itemID AND isset($_SESSION[MDATA_KNAME][$module][UrlWL::SORT_KEY_NAME]) ) {
    $sort = &$_SESSION[MDATA_KNAME][$module][UrlWL::SORT_KEY_NAME];
} elseif (isset($_SESSION[MDATA_KNAME][$module][UrlWL::SORT_KEY_NAME])) {
    unset($_SESSION[MDATA_KNAME][$module][UrlWL::SORT_KEY_NAME]);
}
// Manipulation with Sort
if ($limit) {
    $limit = PHPHelper::getCorrectCatalogLimit($limit);
    $_SESSION[MDATA_KNAME][$module][UrlWL::LIMIT_KEY_NAME] = &$limit;
} elseif ($itemID AND isset($_SESSION[MDATA_KNAME][$module][UrlWL::LIMIT_KEY_NAME]) ) {
    $limit = &$_SESSION[MDATA_KNAME][$module][UrlWL::LIMIT_KEY_NAME];
} elseif (isset($_SESSION[MDATA_KNAME][$module][UrlWL::LIMIT_KEY_NAME])) {
    unset($_SESSION[MDATA_KNAME][$module][UrlWL::LIMIT_KEY_NAME]);
}
// Manipulation with Page Number
if ($page > 1) {                                                         
    $_SESSION[MDATA_KNAME][$module]['page'] = &$page;
} elseif ($itemID AND isset($_SESSION[MDATA_KNAME][$module]['page']) ) {
    $page = &$_SESSION[MDATA_KNAME][$module]['page'];
} elseif (isset($_SESSION[MDATA_KNAME][$module]['page'])) {
    unset($_SESSION[MDATA_KNAME][$module]['page']);
}
// Manipulation with Show Pages All Session Var
if ($pages) {
    $_SESSION[MDATA_KNAME][$module]['pagesall'] = &$pages;
} elseif ($itemID AND isset($_SESSION[MDATA_KNAME][$module]['pagesall'])) {
    $pages = &$_SESSION[MDATA_KNAME][$module]['pagesall'];
} elseif (isset($_SESSION[MDATA_KNAME][$module]['pagesall'])) {
    unset($_SESSION[MDATA_KNAME][$module]['pagesall']);
}

$arrPageData['pagesall']        = &$pages;
$arrPageData['backurl']         = $UrlWL->buildCategoryUrl($arCategory, ($pages ? UrlWL::PAGES_KEY_NAME.'='.UrlWL::PAGES_ALL_VAL : '').($sort ? UrlWL::SORT_KEY_NAME.'='.$sort : '').($limit ? UrlWL::LIMIT_KEY_NAME.'='.$limit : ''), '', $page);
$arrPageData['files_url']       = UPLOAD_URL_DIR.$module.'/';
$arrPageData['files_path']      = prepareDirPath($arrPageData['files_url']);
$arrPageData['items_on_page']   = 12;
$arrPageData['selectedFilters'] = $UrlWL->getFilters()->getSelected();
$arrPageData['filters']         = array();

// Item Detailed View
if ($itemID and $item = getSimpleItemRow($itemID, CATALOG_TABLE) and !empty($item)) {
    // Get item
    $item = PHPHelper::getProductItem($item, $UrlWL, $arrPageData['files_url'], $images_params, false);
    // Ajax 
    if ($IS_AJAX) {
        // comment
        if (isset($_POST["comment"])) {
            $result = false;
            $formData = $errors = $messages = $json = array();
            $_POST = PHPHelper::dataConv($_POST, "UTF-8", "Windows-1251");
            $Validator->validateGeneral($_POST["descr"], "������� ����� ������", "descr");
            $Validator->validateGeneral($_POST["title"], "������� ���", "title");
            $Validator->validateEmail($_POST["email"], "������� ���", "email");
            if ($Validator->foundErrors()) {
                $formData = array_merge($formData, $_POST);
                $errors = $Validator->getErrors();
            } else {
                $arPostData = $_POST;
                $arPostData["module"] = $module;
                $arPostData["pid"]    = $itemID;
                $arPostData["isnew"]  = 1;
                $arPostData["active"] = 0;
                $arPostData["created"] = date("Y-m-d H:i:s");
                if ($DB->postToDB($arPostData, COMMENTS_TABLE)) {
                    $messages[] = "������� �� ��� �����!";
                    $messages[] = "��� ����� ������� �������� � ����� ����������� ����� ���������!";
                    $result = "success";
                }
            }
            $smarty->assign("item",     $item);
            $smarty->assign("IS_AJAX",  $IS_AJAX);
            $smarty->assign("formData", $formData);
            $smarty->assign("messages", $messages);
            $smarty->assign("errors",   $errors);
            $smarty->assign("result",   $result);
            $json["output"] = $smarty->fetch("ajax/comment-form.tpl");
            echo json_encode(PHPHelper::dataConv($json));
            exit;
        }
        // Get comments list by ajax
        if (!empty($_GET["action"]) and $_GET["action"]=="loadComments") {
            $limit = 5;
            $npage = !empty($_GET["npage"]) ? intval($_GET["npage"]) : 1;
            $offset = ($npage-1)*$limit;
            $total = intval(getValueFromDB(COMMENTS_TABLE, "COUNT(*)", "WHERE `active`>0 AND `module`='catalog' AND `pid`={$itemID} AND `cid`=0", "cnt"));
            $pages_total = $total ? ceil($total / $limit) : 0;
            PHPHelper::getProductComments($item, $offset, $limit);
            $smarty->assign("ajax",         true);
            $smarty->assign("pager",        array(
                "pages" => $pages_total,
                "page"  => $npage,
                "url"   => $UrlWL->buildItemUrl($item["arCategory"], $item, "action=loadComments")
            ));
            $smarty->assign("item",        $item);
            $smarty->assign("comments",    $item["comments"]);
            $smarty->assign("marginLevel", 0);
            $smarty->assign("UrlWL",       $UrlWL);
            $smarty->assign("IS_AJAX",     $IS_AJAX);
            $smarty->assign("HTMLHelper",  $HTMLHelper);
            $json["output"] = $smarty->fetch("core/product-comments.tpl");
            echo json_encode(PHPHelper::dataConv($json));
            exit;
        }
        // Get comments list by ajax
        if (!empty($_GET["action"]) and $_GET["action"]=="basketDialog") {
            // Add item to last watched
            PHPHelper::addToLastWatched($itemID);
            $smarty->assign("item",        $item);
            $smarty->assign("UrlWL",       $UrlWL);
            $smarty->assign("Basket",      $Basket);
            $smarty->assign("IS_AJAX",     $IS_AJAX);
            $smarty->assign("HTMLHelper",  $HTMLHelper);
            $smarty->assign("arrPageData", $arrPageData);
            $smarty->assign("arrModules",  $arrModules);
            $json["output"] = $smarty->fetch("core/product-dialog.tpl");
            echo json_encode(PHPHelper::dataConv($json));
            exit;
        }
    } else {
        // global page variables
        $arrPageData['headTitle']     = $item['title'];
        $arCategory['seo_title']      = $item['seo_title'];
        $arCategory['meta_descr']     = $item['meta_descr'];
        $arCategory['meta_key']       = $item['meta_key'];
        $arCategory['meta_robots']    = $item['meta_robots'];
        $arrPageData['headScripts'][] = "/js/libs/slick-carousel/slick.min.js";
        $arrPageData['headScripts'][] = "/js/libs/cshare/cshare.js";
        $arrPageData['headScripts'][] = "/js/smart/product.js";
        // related items
        $item['related'] = $item['similar'] = $item['additions'] = array();
        $query  = "SELECT DISTINCT c.*, cr.`type` FROM `".CATALOG_RELATED_TABLE."` cr "
                . "LEFT JOIN `".CATALOG_TABLE."` c ON(c.`id`=cr.`rid`) "
                . "WHERE c.`active`>0 AND cr.`pid`={$itemID}";
        $result = mysql_query($query);
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {                  
                if ($row['type'] == 0) {
                    $item['related'][] = PHPHelper::getProductItem($row, $UrlWL, $arrPageData['files_url'], $images_params, true, $catid);
                } elseif ($row['type'] == 1) {
                    $item['similar'][] = PHPHelper::getProductItem($row, $UrlWL, $arrPageData['files_url'], $images_params, true, $catid);
                } elseif ($row['type'] == 2) {
                    $item['additions'][] = PHPHelper::getProductItem($row, $UrlWL, $arrPageData['files_url'], $images_params, true, $catid);
                }
            }
        }
    }
    // Add item to last watched
    PHPHelper::addToLastWatched($itemID);
// List Items
} else {
    
    $arrPageData['headScripts'][] = "/js/libs/noUiSlider/nouislider.min.js";
    $arrPageData['headScripts'][] = "/js/smart/{$module}.js";
    
    require_once('include/classes/Filters.php');
    
    //IF you want to show all subcategories  products  - uncomment below line
    $arCatIdSet = CatalogHelper::getAllChildrenIDByID($catid, true, false);
    $Filters = new Filters($UrlWL, $catid, $arCatIdSet);
    
    $where = $Filters->generateWhereState($arrPageData['selectedFilters']);
    
    $itemsIDX = PHPHelper::getCatalogItems($catid, $arCatIdSet, $lang, $module, '', '', '', true);
    $itemsFIDX = PHPHelper::getCatalogItems($catid, $arCatIdSet, $lang, $module, $where,'', '', true);
    
    $arrPageData['sort']      = ($sort = PHPHelper::getCorrectCatalogSort($sort));
    $arrPageData['limit']     = ($limit = PHPHelper::getCorrectCatalogLimit($limit));
    $arrPageData['arSorting'] = PHPHelper::getCatalogSorting($UrlWL, $sort);
    $arrPageData['arLimit']   = PHPHelper::getCatalogLimit($UrlWL, $limit);
    $arrPageData['filters']   = $Filters->getFilters($itemsIDX, $itemsFIDX);
    
    // Total pages and Pager
    if (!$pages) {
        $arrPageData['total_items'] = count($itemsFIDX);
        $arrPageData['pager']       = new Pager($UrlWL, $page, $arrPageData['total_items'], $arrPageData['limit']);
        $arrPageData['total_pages'] = $arrPageData['pager']->getCount();
        $arrPageData['offset']      = ($page-1)*$arrPageData['limit'];
    }
    $order  = 'ORDER BY '.$arrPageData['arSorting'][$sort]['column'];
    $limit  = (!$pages ? 'LIMIT '.$arrPageData['offset'].', '.$arrPageData['limit'] : '');
    $query  = PHPHelper::getCatalogItemsSql($catid, $arCatIdSet, $lang, $module, $where, $order, $limit);
    $DB->Query($query);
    while ($row = $DB->fetchAssoc()) {
        $items[] = PHPHelper::getProductItem($row, $UrlWL, $arrPageData['files_url'], $images_params, true);
    } $DB->Free();
    
    $seoFilters = $UrlWL->getFilters()->getSelectedTitles();
    if (!empty($seoFilters)) {
        $arCategory["seo_title"]  = !empty($arCategory["filter_seo_title"]) ? PHPHelper::BuildFilterMetaData($arCategory["filter_seo_title"], $seoFilters) : $arCategory["seo_title"];
        $arCategory["seo_text"]   = !empty($arCategory["filter_seo_text"])  ? PHPHelper::BuildFilterMetaData($arCategory["filter_seo_text"], $seoFilters)  : $arCategory["seo_text"];
        $arCategory["meta_descr"] = !empty($arCategory["filter_meta_descr"])? PHPHelper::BuildFilterMetaData($arCategory["filter_meta_descr"], $seoFilters): $arCategory["meta_descr"];
        $arCategory["meta_key"]   = !empty($arCategory["filter_meta_key"])  ? PHPHelper::BuildFilterMetaData($arCategory["filter_meta_key"], $seoFilters)  : $arCategory["meta_key"];
    }
}

$smarty->assign('item',  $item);
$smarty->assign('items', $items);