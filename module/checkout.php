<?php defined('WEBlife') or die( 'Restricted access' );

$item                         = array();
$item['children']             = $Basket->getItems();
$arrPageData['arPayment']     = Checkout::getPaymentTypes();
$arrPageData['arShipping']    = Checkout::getShippingTypes();
$arrPageData['headScripts'][] = "/js/libs/jquery-steps/jquery.steps.min.js";
$arrPageData['headScripts'][] = "/js/smart/checkout.js";

if (!empty($_POST) and !empty($item['children'])) {
    foreach ($item['children'] as $key => $children) {
        $item['children'][$key]['link'] = $UrlWL->buildItemUrl($children['arCategory'], $children);
    }
    $_POST['descr'] = cleanText($_POST['descr']);
    $Validator->validateGeneral($_POST['firstname'], sprintf(ORDER_FILL_REQUIRED_FIELD, ORDER_FIRST_NAME));
    $Validator->validateEmail($_POST['email'], sprintf(ORDER_FILL_REQUIRED_FIELD, ORDER_EMAIL));
    $Validator->validateGeneral($_POST['phone'], sprintf(ORDER_FILL_REQUIRED_FIELD, ORDER_TEL));
    if ($Validator->foundErrors()) {
        $arrPageData['errors'][] = "<font color='#990033'>".ORDER_ERROR_INPUT_STRING."</font>".$Validator->getListedErrors();
    } else {
        $arPostData = screenData($_POST);
        $arPostData['created'] = date('Y-m-d H:i:s');
        $arPostData['price']   = $Basket->getTotalPrice();
        $arPostData['qty']     = $Basket->getTotalAmount();
        $result = $DB->postToDB($arPostData, ORDERS_TABLE);
        if ($result and is_int($result)) { 
            $orderID = $result;
            require_once('include/classes/ActionsLog.php');
            foreach(SystemComponent::getAcceptLangs() as $key => $arLang) {
                ActionsLog::getAuthInstance(ActionsLog::SYSTEM_USER, getRealIp())->save(ActionsLog::ACTION_CREATE, 'Создан новый заказ', $key, 'Заказ №'.$orderID, $orderID, 'orders');
            }
            $payment  = getItemRow(PAYMENT_TYPES_TABLE, '*', 'WHERE `id`='.(int)$arPostData['payment']);
            $shipping = getItemRow(SHIPPING_TYPES_TABLE, '*', 'WHERE `id`='.(int)$arPostData['shipping']);
            
            // Start Google Conversion 
            $GoogleConversion = new GoogleConversion($orderID, $arPostData['price'], $objSettingsInfo->websiteName, $shipping['price']);
                
            foreach ($item['children'] as $arItem) {
                $arOptions = array();
                if (!empty($arItem["options"])) {
                    $arOptions[$arItem["id"]] = PHPHelper::getSelectedOptions($arItem["options"]);
                }
                $data = array(
                    'oid'       => $orderID,
                    'pid'       => $arItem['id'],
                    'title'     => isset($arItem['set_title']) ? $arItem['set_title'] : $arItem['title'],
                    'qty'       => $arItem['quantity'],
                    'price'     => $arItem['price'],
                    'discount'  => $arItem['discount'],
                    'type'      => 'product'
                );
                $data["options"] = serialize($arOptions);
                // Add Google Conversion Item
                $GoogleConversion->addItem(new GoogleConversionItem($GoogleConversion->id, $arItem['pcode'], $arItem['price'], $arItem['quantity'], htmlspecialchars_decode($arItem['title'])));
                $DB->postToDB($data, ORDER_PRODUCTS_TABLE);
            }
            // email notifications
            $arData = array_merge($arPostData, $item);
            $arData['oid']      = $orderID;
            $arData['payment']  = $payment;
            $arData['shipping'] = $shipping;
            $arData['price']    = ($arData['price'] + $arData['shipping']['price']);
            $arData['server']   = 'http://'.$_SERVER['HTTP_HOST'];
            
            $smarty->assign('arData', $arData);
            $text    = $smarty->fetch('mail/order_admin.tpl');
            $subject = $objSettingsInfo->websiteName.': '.sprintf(NEW_ORDER_NUMBER, $orderID);
            
            if (sendMail($objSettingsInfo->notifyEmail, $subject, $text, $objSettingsInfo->siteEmail, 'html')){
                $text = $smarty->fetch('mail/order_user.tpl');
                $subject = $objSettingsInfo->websiteName.': '.sprintf(NEW_ORDER_COMPLETED, $orderID);
                sendMail($arData['email'], $subject, $text, $objSettingsInfo->siteEmail, 'html');
                $GoogleConversion->setPurchased(true);
            }
            $Basket->dropBasket();
            TrackingEcommerce::save($GoogleConversion, true);
            Checkout::saveOrderID($orderID);
            Redirect($UrlWL->buildCategoryUrl($arrModules["thanks"]));
        }
    }
} elseif (empty($item['children'])) {
    Redirect('/');
}

if (!empty($_POST)) {
    $item = array_merge($item, $_POST);
}

$smarty->assign('item', $item);