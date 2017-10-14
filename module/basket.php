<?php defined('WEBlife') or die( 'Restricted access' ); // no direct access

$action     = !empty($_GET['action'])                         ? trim(addslashes($_GET['action'])) : false;
$itemID     = !empty($_GET['itemID'])                         ? trim($_GET['itemID'])             : false;
$qty        = (!empty($_GET['qty']) and intval($_GET['qty'])) ? intval($_GET['qty'])              : 1;
$setNewQty  = isset($_GET['setNewQty'])                       ? $_GET['setNewQty']                : 0;
$list       = isset($_GET['list'])                            ? (bool)$_GET['list']               : false;
$json       = array();

if ($IS_AJAX) {
    $smarty->assign('Basket',      $Basket);
    $smarty->assign('UrlWL',       $UrlWL);
    $smarty->assign('HTMLHelper',  $HTMLHelper);
    $smarty->assign('arrModules',  $arrModules);
    $smarty->assign('arrPageData', $arrPageData); 
    $smarty->assign('list',        $list);
}

switch ($action) {
    // ADD -----------------------------------------------------------------
    case 'add':
        if ($itemID) $Basket->add($itemID, $qty, $setNewQty);
        break;
    // REMOVE --------------------------------------------------------------
    case 'remove':
        if ($itemID) $Basket->remove($itemID);
        $json['output'] = array(
            'isEmpty'  => $Basket->isEmptyBasket()
        );
        break;
    // UPDATE --------------------------------------------------------------
    case 'update':
        $json['output'] = array(
            'minicart' => $smarty->fetch('ajax/minicart.tpl'),
            'basket'   => $smarty->fetch('ajax/basket.tpl'),
            "items"    => $Basket->getItems(),
            'isEmpty'  => $Basket->isEmptyBasket()
        );
        break;
    // CLEAR ---------------------------------------------------------------
    case 'clear':
        $Basket->dropBasket();
        break;
    // DEFAULT -------------------------------------------------------------
    default: break;
}

if ($IS_AJAX) {
    $smarty->assign('Basket',      $Basket);
    $smarty->assign('UrlWL',       $UrlWL);
    $smarty->assign('HTMLHelper',  $HTMLHelper);
    $smarty->assign('arrModules',  $arrModules);
    $smarty->assign('arrPageData', $arrPageData); 
    $smarty->assign('list',        $list);
    echo json_encode(PHPHelper::dataConv($json));
    exit;
}

$smarty->assign('items', $Basket->getItems());