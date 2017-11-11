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
$searchtext    = empty($_GET['stext']) ? "" : PHPHelper::prepareSearchText($_GET['stext'], $IS_AJAX, false);
$searchwhere   = !empty($_POST['swhere']) ? addslashes(trim($_POST['swhere'])) : 'catalog';
$items         = array(); // Items Array of items Info arrays
$images_params = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="catalog"'));
// /////////////////////// END OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################



# ##############################################################################
// ////////// OPERATION MANIPULATION WITH SESSION VARIABLE \\\\\\\\\\\\\\\\\\\\\
// Manipulation with Sort
if ($sort) {
    $sort = PHPHelper::getCorrectCatalogSort($sort);
    $_SESSION[MDATA_KNAME][$module][UrlWL::SORT_KEY_NAME] = &$sort;
} elseif (isset($_SESSION[MDATA_KNAME][$module][UrlWL::SORT_KEY_NAME])) {
    unset($_SESSION[MDATA_KNAME][$module][UrlWL::SORT_KEY_NAME]);
}
// Manipulation with Sort
if ($limit) {
    $limit = PHPHelper::getCorrectCatalogLimit($limit);
    $_SESSION[MDATA_KNAME][$module][UrlWL::LIMIT_KEY_NAME] = &$limit;
} elseif (isset($_SESSION[MDATA_KNAME][$module][UrlWL::LIMIT_KEY_NAME])) {
    unset($_SESSION[MDATA_KNAME][$module][UrlWL::LIMIT_KEY_NAME]);
}
// Manipulation with Page Number
if ($page>1) {
    $_SESSION[MDATA_KNAME][$module]['page'] = &$page;
} elseif ($page==1 && isset($_SESSION[MDATA_KNAME][$module]['page'])) {
    unset($_SESSION[MDATA_KNAME][$module]['page']);
} elseif (isset($_SESSION[MDATA_KNAME][$module]['page'])) {
    $page = &$_SESSION[MDATA_KNAME][$module]['page'];
}
// Manipulation with Show Pages All Session Var
if ($pages) {
    $_SESSION[MDATA_KNAME][$module]['pagesall'] = &$pages;
} elseif (isset($_SESSION[MDATA_KNAME][$module]['pagesall'])) {
    unset($_SESSION[MDATA_KNAME][$module]['pagesall']);
}
// Manipulation with Search text
if ($searchtext) {
    $_SESSION[MDATA_KNAME][$module]['stext'] = &$searchtext;
} elseif (!empty($_SESSION[MDATA_KNAME][$module]['stext'])) {
    $searchtext = &$_SESSION[MDATA_KNAME][$module]['stext'];
}

$arrPageData['files_url']     = UPLOAD_URL_DIR.'catalog/';
$arrPageData['files_path']    = prepareDirPath($arrPageData['files_url']);
$arrPageData['items_on_page']   = 12;
$arrPageData['selectedFilters'] = $UrlWL->getFilters()->getSelected();
$arrPageData['filters']         = array();
$arrPageData['stext']         = $searchtext;
$arrPageData['headScripts'][] = "/js/libs/noUiSlider/nouislider.min.js";
$arrPageData['headScripts'][] = "/js/public/catalog.js";

if ($searchtext and strlen($searchtext)>1) {
    // Include filters class
    require_once('include/classes/Filters.php');
    
    $arCatIdSet = CatalogHelper::getAllChildrenIDByID($arrModules["catalog"]["id"]);//getChildrensIDs($arrModules["catalog"]["id"], true);
    $Filters    = new Filters($UrlWL, $arrModules["catalog"]["id"], $arCatIdSet);
    $where = $Filters->generateWhereState($arrPageData['selectedFilters']);
    
    $itemsIDX = PHPHelper::getCatalogItems($arrModules["catalog"]["id"], $arCatIdSet, $lang, $module, '', '', '', true, $searchtext);
    $itemsFIDX = PHPHelper::getCatalogItems($arrModules["catalog"]["id"], $arCatIdSet, $lang, $module, $where,'', '', true, $searchtext);
    
    $Filters->setSearchText($searchtext);
    
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
    $limit  = $IS_AJAX ? "LIMIT 7" : (!$pages ? 'LIMIT '.$arrPageData['offset'].', '.$arrPageData['limit'] : '');
    $query  = PHPHelper::getCatalogItemsSql($arrModules["catalog"]["id"], $arCatIdSet, $lang, $module, $where, $order, $limit, false, $searchtext);
    $DB->Query($query);
    while ($row = $DB->fetchAssoc()) {
        $items[] = PHPHelper::getProductItem($row, $UrlWL, $arrPageData['files_url'], $images_params, true);
    } $DB->Free();
    
    $arCategory['title'] = 'По запросу "<span class="title-bold">'.$searchtext.'</span>" найдено '.$arrPageData['total_items'].' товаров';
    
} else $arCategory['title'] = 'Недостаточно символов для поиска!';

$smarty->assign('items', $items);

// Ajax response
if ($IS_AJAX) {
    $smarty->assign('UrlWL',      $UrlWL);
    $smarty->assign('arrModules', $arrModules);
    $smarty->assign('searchtext', $searchtext);
    $json['output'] = $smarty->fetch('ajax/live-search.tpl');
    echo json_encode(PHPHelper::dataConv($json));
    exit;
}