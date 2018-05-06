<?php defined('WEBlife') or die( 'Restricted access' );

$json                         = array();
$item                         = array();
$task                         = $UrlWL->getParam("task");
$term                         = $UrlWL->getParam("term");
$purchases                    = $Basket->getItems();
$arrPageData['arPayment']     = Checkout::getPaymentTypes();
$arrPageData['arShipping']    = Checkout::getShippingTypes();
$arrPageData["headCss"][]     = "/css/public/checkout.css";
$arrPageData['headScripts'][] = "/js/libs/jquery.validate/jquery.validate.min.js";
$arrPageData['headScripts'][] = "/js/libs/jquery.validate/additional-methods.min.js";
$arrPageData['headScripts'][] = "/js/libs/jquery.validate/localization/messages_ru.min.js";
$arrPageData['headScripts'][] = "/js/libs/jquery-steps/jquery.steps.min.js";
$arrPageData['headScripts'][] = "/js/libs/select2/js/select2.full.min.js";
$arrPageData['headScripts'][] = "/js/libs/select2/js/i18n/ru.js";
$arrPageData['headScripts'][] = "/js/public/checkout.js";
// Search cities
if ($IS_AJAX and !empty($term) and $task=="getCities") {
    $json = ["items"=>[]];
    $term = PHPHelper::prepareSearchText($term, true);
    if ($term and strlen($term)>2) {
        $query  = "SELECT DISTINCT * FROM `".NP_CITY_TABLE."` WHERE `title_ru` LIKE '%{$term}%' ORDER BY `title_ru`";
        $result = mysql_query($query);
        if ($result and mysql_num_rows($result)>0) {
            while ($row = mysql_fetch_assoc($result)) {
                $row["id"]   = unScreenData($row["title_ru"]);
                $row["text"] = $row["id"];
                $json["items"][] = $row;
            }
        }
    } die (json_encode(PHPHelper::dataConv($json)));
}
// Search warehouses
if ($IS_AJAX and !empty($term) and $task=="getAddress") {
    $json = ["items"=>[]];
    $term = PHPHelper::prepareSearchText($term, true);
    if ($term and strlen($term)>2) {
        $query  = "SELECT DISTINCT nw.* FROM `".NP_WAREHOUSE_TABLE."` nw "
                . "LEFT JOIN `".NP_CITY_TABLE."` nc ON(nc.`ref`=nw.`city_ref`) "
                . "WHERE nc.`title_ru`='{$term}'";
        $result = mysql_query($query);
        if ($result and mysql_num_rows($result)>0) {
            while ($row = mysql_fetch_assoc($result)) {
                $row["id"]   = unScreenData($row["title_ru"]);
                $row["text"] = $row["id"];
                $json["items"][] = $row;
            }
        }
    } die (json_encode(PHPHelper::dataConv($json)));
}
if (!empty($_POST) and !empty($purchases)) {
    $_POST['descr'] = cleanText($_POST['descr']);
    $Validator->validateGeneral($_POST['firstname'],    sprintf(ORDER_FILL_REQUIRED_FIELD, ORDER_FIRST_NAME));
    $Validator->validateEmail($_POST['email'],          sprintf(ORDER_FILL_REQUIRED_FIELD, ORDER_EMAIL));
    $Validator->validateGeneral($_POST['phone'],        sprintf(ORDER_FILL_REQUIRED_FIELD, ORDER_TEL));
    $Validator->validateGeneral($_POST['payment_id'],   sprintf(ORDER_FILL_REQUIRED_FIELD, ORDER_TEL));
    $Validator->validateGeneral($_POST['shipping_id'],  sprintf(ORDER_FILL_REQUIRED_FIELD, ORDER_TEL));
    if ($Validator->foundErrors()) {
        $arrPageData['errors'][] = "<font color='#990033'>".ORDER_ERROR_INPUT_STRING."</font>".$Validator->getListedErrors();
    } else {
        $arPostData            = screenData($_POST);
        $arPostData['phone']   = preg_replace("/\s/", "", $arPostData['phone']);
        $arPostData['created'] = date('Y-m-d H:i:s');
        $arPostData['price']   = $Basket->getTotalPrice();
        $arPostData['qty']     = $Basket->getTotalAmount();
        $result = $DB->postToDB($arPostData, ORDERS_TABLE);
        if ($result and is_int($result)) {
            $orderID = $result;
            require_once('include/classes/ActionsLog.php');
            foreach (SystemComponent::getAcceptLangs() as $key => $arLang) {
                ActionsLog::getAuthInstance(ActionsLog::SYSTEM_USER, getRealIp())->save(ActionsLog::ACTION_CREATE, 'Создан новый заказ', $key, 'Заказ №'.$orderID, $orderID, 'orders');
            }
            $payment  = getItemRow(PAYMENT_TYPES_TABLE, '*', 'WHERE `id`='.$arPostData['payment_id']);
            $shipping = getItemRow(SHIPPING_TYPES_TABLE, '*', 'WHERE `id`='.$arPostData['shipping_id']);
            // Start Google Conversion 
            $GoogleConversion = new GoogleConversion($orderID, $arPostData['price'], $objSettingsInfo->websiteName, $shipping['price'], 0, "UAH");
            // Write order products
            foreach ($purchases as $purchase) {
                $arOptions = array();
                if (!empty($purchase["options"])) {
                    $arOptions[$purchase["id"]] = PHPHelper::getSelectedOptions($purchase["options"]);
                }
                $data = [
                    'order_id' => $orderID,
                    'pid'      => $purchase['id'],
                    'title'    => "{$purchase['title']} {$purchase['pcode']}",
                    'pcode'    => $purchase['pcode'],
                    'qty'      => $purchase['quantity'],
                    'price'    => $purchase['price'],
                    'discount' => $purchase['discount'],
                    'type'     => 'product'
                ];
                $data["options"] = serialize($arOptions);
                // Add Google Conversion Item
                $GoogleConversion->addItem(new GoogleConversionItem($GoogleConversion->id, $purchase['pcode'], $purchase['price'], $purchase['quantity'], htmlspecialchars_decode("{$purchase['title']} {$purchase['pcode']}")));
                $DB->postToDB($data, ORDER_PRODUCTS_TABLE);
            }
            // email notifications
            $arData = array_merge($arPostData, $item);
            $arData['oid']      = $orderID;
            $arData['payment']  = $payment;
            $arData['shipping'] = $shipping;
            $arData['children'] = $purchases;
            $arData['server']   = WLCMS_HTTP_PREFIX.$_SERVER['HTTP_HOST'];
            $smarty->assign('arData', $arData);
            $smarty->assign('UrlWL', $UrlWL);
            $text    = $smarty->fetch('mail/order_admin.tpl');
            $subject = sprintf(NEW_ORDER_NUMBER, $orderID);
            if (sendMail($objSettingsInfo->notifyEmail, $subject, $text, $objSettingsInfo->siteEmail, 'html')){
                $text = $smarty->fetch('mail/order_user.tpl');
                $subject = sprintf(NEW_ORDER_COMPLETED, $orderID);
                sendMail($arData['email'], $subject, $text, $objSettingsInfo->siteEmail, 'html');
                // send admin sms notification
                require_once('include/classes/TurboSms.php');
                $TurboSms = new TurboSms();
                $TurboSms->send("SILVERADO", $objSettingsInfo->ownerPhone, "Noviy zakaz N$orderID", WLCMS_HTTP_HOST."/admin/index.php?module=orders&task=editItem&itemID=$orderID");
            }
            $GoogleConversion->setPurchased(true);
            TrackingEcommerce::save($GoogleConversion, false);
            Checkout::saveOrderID($orderID);
            $Basket->dropBasket();
            Redirect($UrlWL->buildCategoryUrl($arrModules["thanks"]));
        }
    }
} elseif (empty($purchases)) Redirect('/');

if (!empty($_POST)) $item = array_merge($item, $_POST);

$smarty->assign('item', $item);