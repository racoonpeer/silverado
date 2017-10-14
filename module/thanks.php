<?php defined('WEBlife') or die( 'Restricted access' );

$itemID    = Checkout::getOrderID(false);
$item      = array();
$purchases = array();
$files_url = UPLOAD_URL_DIR.'catalog/';
$arAliases = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="catalog"'));

$arrPageData["headingTitle"]  = $arCategory["title"];
$arrPageData["headCss"][]     = "/css/smart/thanks.css";

// Process order
if ($itemID and $item=getSimpleItemRow($itemID, ORDERS_TABLE)) {
    $item['phone'] = preg_replace("/^[\d,\+]{8}/", "+380*****", $item["phone"]);
    $item['email'] = !empty($item["email"]) ? str_replace(substr($item['email'], 1, strpos($item['email'], '@')-2), '*****', $item['email']) : "";
    $arrPageData["messages"][] = sprintf("Номер вашего заказа <strong>%s</strong>.", $itemID);
    $arrPageData["messages"][] = sprintf("Ожидайте звонка нашего менеджера по номеру <strong>%s</strong>.", $item["phone"]);
    if (!empty($item["email"])) {
        $arrPageData["messages"][] = sprintf("Копия заказа отправлена на адрес <strong>%s</strong>. Если письмо не пришло, проверьте папку «спам».", $item["email"]);
    }
    // Get purchases
    $query  = "SELECT c.*, op.`price` AS `price`, op.`old_price` AS `old_price`, op.`qty` AS `quantity`, "
            . "(op.`price` * op.`qty`) AS `amount`, op.`discount` AS `discount`, op.`assortment_id` "
            . "FROM `".ORDER_PRODUCTS_TABLE."` op "
            . "LEFT JOIN `".CATALOG_TABLE."` c ON(c.`id`=op.`product_id`) "
            . "WHERE op.`order_id`={$itemID} "
            . "GROUP BY op.`id`";
    $result = mysql_query($query);
    if ($result and mysql_num_rows($result)>0) {
        while ($row=mysql_fetch_assoc($result)) {
            $purchase = PHPHelper::getProductItem($row, $UrlWL, $files_url, $arAliases, true);
            $row["image"] = $purchase["image"];
            $purchase = array_merge($purchase, $row);
            $purchases[] = $purchase;
        }
    }
} else {
    Redirect("/");
}

$smarty->assign("item",                     $item);
$smarty->assign("purchases",                $purchases);
$smarty->assign("UrlWL",                    $UrlWL);
$smarty->assign('lang',                     $lang);
$smarty->assign('arLangsUrls',              $arLangsUrls);
$smarty->assign('arAcceptLangs',            $arAcceptLangs);
$smarty->assign('arrLangs',                 SystemComponent::getAcceptLangs());
$smarty->assign('arCategory',               $arCategory);
$smarty->assign("arrModules",               $arrModules);
$smarty->assign("arrPageData",              $arrPageData);
$smarty->assign('objUserInfo',              $objUserInfo);
$smarty->assign('objSettingsInfo',          $objSettingsInfo);
$smarty->assign('HTMLHelper',               $HTMLHelper);
$smarty->assign('trackingEcommerceJS',      TrackingEcommerce::OutputJS(ENABLE_TRACKING_ECOMMERCE));
$smarty->assign('IS_DEV',                   $IS_DEV);
$smarty->assign('IS_AJAX',                  $IS_AJAX);
$smarty->display("module/thanks.tpl",       $cacheID);
exit;