<?php defined('WEBlife') or die( 'Restricted access' ); // no direct access

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!$IS_AJAX) die ("Ajax requests only!");

$json          = array();
$item          = array();
$formData      = array();
$itemID        = $UrlWL->getParam("itemID");
$files_url     = UPLOAD_URL_DIR."catalog/";
$files_path    = prepareDirPath($files_url);

if ($itemID and $item=getSimpleItemRow($itemID, CATALOG_TABLE)) {
    $images_params = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="catalog"'));
    $item = PHPHelper::getProductItem($item, $UrlWL, $files_url, $images_params);
    // Post request
    if (!empty($_POST)) {
        $_POST = PHPHelper::dataConv($_POST, "utf-8", WLCMS_SYSTEM_ENCODING);
        $Validator->validateGeneral($_POST["firstname"], "Введите имя", "firstname");
        $Validator->validateGeneral($_POST["phone"], "Введите номер телефона", "phone");
        if ($Validator->foundErrors()) $arrPageData["errors"] = $Validator->getErrors();
        else {
            $arPostData = $_POST;
            $arPostData['phone']   = preg_replace("/\s/", "", $arPostData['phone']);
            $arPostData['created'] = date('Y-m-d H:i:s');
            $arPostData['price']   = $item["price"];
            $arPostData['qty']     = 1;
            $arPostData["type"]    = 2;
            $result = $DB->postToDB($arPostData, ORDERS_TABLE);
            if ($result and is_int($result)) {
                $orderID = $result;
                // Log new order
                require_once('include/classes/ActionsLog.php');
                foreach (SystemComponent::getAcceptLangs() as $key => $arLang) {
                    ActionsLog::getAuthInstance(ActionsLog::SYSTEM_USER, getRealIp())->save(ActionsLog::ACTION_CREATE, 'Создан новый заказ', $key, 'Заказ №'.$orderID, $orderID, 'orders');
                }
                // Start Google Conversion 
                $GoogleConversion = new GoogleConversion($orderID, $arPostData['price'], $objSettingsInfo->websiteName, 0, 0, "UAH");
                // Write order products
                $data = [
                    'order_id' => $orderID,
                    'pid'      => $item['id'],
                    'title'    => "{$item['title']} {$item['pcode']}",
                    'pcode'    => $item['pcode'],
                    'qty'      => 1,
                    'price'    => $item['price'],
                    'discount' => $item['discount'],
                    'type'     => 'product',
                    "options"  => serialize($item['selectedOptions'])
                ];
                // Add Google Conversion Item
                $GoogleConversion->addItem(new GoogleConversionItem($GoogleConversion->id, $item['pcode'], $item['price'], 1, htmlspecialchars_decode($item['title'])));
                $DB->postToDB($data, ORDER_PRODUCTS_TABLE);
                // email notifications
                $arData             = $arPostData;
                $arData['oid']      = $orderID;
                $arData['server']   = WLCMS_HTTP_PREFIX.$_SERVER['HTTP_HOST'];
                $data["image"]      = $item["image"];
                $data["pcode"]      = $item["pcode"];
                $data["seo_path"]   = $item["seo_path"];
                $data["arCategory"] = $item["arCategory"];
                $data["options"]    = $item["options"];
                $arData['children'] = [$data];
                $smarty->assign('arData', $arData);
                $smarty->assign('UrlWL', $UrlWL);
                $text    = $smarty->fetch('mail/order_admin.tpl');
                $subject = "Новый заказ №{$orderID}";
                $subject = sprintf(NEW_ORDER_NUMBER, $orderID);
                if (sendMail($objSettingsInfo->notifyEmail, $subject, $text, $objSettingsInfo->siteEmail, 'html')){
                    $GoogleConversion->setPurchased(true);
                    TrackingEcommerce::save($GoogleConversion, false);
                    $arrPageData["result"]  = "success";
                    $arrPageData["orderID"] = $orderID;
                } $smarty->assign('trackingEcommerceJS', TrackingEcommerce::OutputJS(ENABLE_TRACKING_ECOMMERCE));
            }
        } $formData = array_merge($formData, $_POST);
    }
} else die ("Item not selected!");

$arrPageData["itemID"] = $itemID;

$smarty->assign("item",            $item);
$smarty->assign("formData",        $formData);
$smarty->assign("arrPageData",     $arrPageData);
$smarty->assign('arCategory',      $arCategory);
$smarty->assign('arrModules',      $arrModules);
$smarty->assign("UrlWL",           $UrlWL);
$smarty->assign("objSettingsInfo", $objSettingsInfo);
$smarty->assign('HTMLHelper',      $HTMLHelper);
$smarty->assign('IS_DEV',          $IS_DEV);
$smarty->assign('IS_AJAX',         $IS_AJAX);
$json["output"] = $smarty->fetch("module/{$module}.tpl");

exit(json_encode(PHPHelper::dataConv($json)));