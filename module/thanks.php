<?php defined('WEBlife') or die( 'Restricted access' );

$itemID    = Checkout::getOrderID(!$IS_DEV);
$item      = array();
$purchases = array();
$files_url = UPLOAD_URL_DIR.'catalog/';
$arAliases = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="catalog"'));

$arrPageData["headingTitle"]  = "Заказ оформлен! Спасибо что выбрали нас";
$arrPageData["headCss"][]     = "/css/public/thanks.css";
$arrPageData["headScripts"][] = "/js/libs/jQuery.print/jQuery.print.min.js";
$arrPageData["headScripts"][] = "/js/public/{$modulename}".(!$IS_DEV ? ".min" : "").".js";

// Process order
if ($itemID and $item = getSimpleItemRow($itemID, ORDERS_TABLE)) {
    $item['payment']    = getItemRow(PAYMENT_TYPES_TABLE, '*', 'WHERE `id`='.$item['payment_id']);
    $item['shipping']   = getItemRow(SHIPPING_TYPES_TABLE, '*', 'WHERE `id`='.$item['shipping_id']);
    $item['mask_phone'] = preg_replace("/^[\d,\+]{8}/", "+380*****", $item["phone"]);
    $item['mask_email'] = !empty($item["email"]) ? str_replace(substr($item['email'], 1, strpos($item['email'], '@')-2), '*****', $item['email']) : "";
    $arrPageData["messages"][] = sprintf("<strong>Номер вашего заказа %s</strong><br>", $itemID);
    $arrPageData["messages"][] = sprintf("Ожидайте звонка нашего менеджера по номеру <strong>%s</strong>,<br>для подтверждения заказа<br>", $item["mask_phone"]);
    if (!empty($item["email"])) {
        $arrPageData["messages"][] = sprintf("Копия заявки отправлена на адрес <strong>%s</strong>.", $item["mask_email"]);
        $arrPageData["messages"][] = "Если письмо не пришло, проверьте папку «спам».";
    }
    // Get purchases
    $query  = "SELECT c.*, op.`price` AS `price`, "
            . "(op.`price` * op.`qty`) AS `amount`, op.`qty` "
            . "FROM `".ORDER_PRODUCTS_TABLE."` op "
            . "LEFT JOIN `".CATALOG_TABLE."` c ON(c.`id`=op.`pid`) "
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

$smarty->assign("item",      $item);
$smarty->assign("purchases", $purchases);