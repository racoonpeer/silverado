<?php defined('WEBlife') or die( 'Restricted access' );

$itemID = $UrlWL->getItemID();
$action = $UrlWL->getParam("action");

$arrPageData["headCss"][] = "/css/public/liqpay.css";

// Check payment result
if ($itemID and $action=="result") {
    $status = getValueFromDB(ORDERS_TABLE, "payment_status", 'WHERE `id`='.$itemID);
    if ($status > 0) Redirect("/");
    $liqpay = new LiqPay(LIQPAY_PUBLIC_KEY, LIQPAY_PRIVATE_KEY);
    $data = PHPHelper::dataConv((array)$liqpay->api("payment/status", array(
        "version"  => "3",
        "order_id" => $itemID
    )), "utf-8", "windows-1251");
    if (!empty($data) and isset($data["status"]) and ($data["status"]=="success" or $data["status"]=="sandbox")) {
        $arrPageData["messages"][] = LIQPAY_PAYMENT_COMPLETE;
        updateRecords(ORDERS_TABLE, '`payment_status`=1', 'WHERE `id`='.$itemID);
    } else {
        $arrPageData["errors"][]   = sprintf(LIQPAY_PAYMENT_ERROR, $UrlWL->buildCategoryUrl($arCategory)."$itemID/");
    }
}
// Send request
elseif ($itemID and $item=getSimpleItemRow($itemID, ORDERS_TABLE)) {
    $item["seo_path"] = UrlWL::ORDER_SEOPREFIX.$itemID;
    if ($item["payment_status"]>0) {
        $arrPageData["errors"][] = "Заказ №{$itemID} уже оплачен! Повторная оплата невозможна";
        Redirect("/");
    }
    $arrPageData['result_url'] = WLCMS_HTTP_HOST.$UrlWL->buildItemUrl($arCategory, $item, "action=result"); // для переадресации покупателя
    $arrPageData['server_url'] = $arrPageData['result_url']; // для ответа сервера liqPay (прием и обработка ответа выполняется в фоновом режиме)
    $data = array(
        'version'     => '3',
        'amount'      => ceil($item["price"]),
        'currency'    => 'UAH',
        'description' => "Интернет-магазин SILVERADO: заказ №{$itemID} от {$item["firstname"]} {$item["surname"]}, ".$HTMLHelper->RuDateFormat($item["created"]),
        'order_id'    => $itemID,
        'server_url'  => $arrPageData['server_url'],
        'result_url'  => $arrPageData['result_url'],
        'language'    => 'ru',
        'sandbox'     => LIQPAY_SANDBOX_MODE
    );
    $liqpay = new LiqPay(LIQPAY_PUBLIC_KEY, LIQPAY_PRIVATE_KEY);
    $arrPageData['form'] = $liqpay->cnb_form(PHPHelper::dataConv($data))
        .'<script type="text/javascript">
            function initRedirect(timeout){
                if (typeof jQuery != "undefined") {
                    $(function(){
                        var Form = document.getElementById("liqPayForm");
                        $(Form).submit();
                    });
                } else {
                    setTimeout(function(){
                        initRedirect(timeout);
                    },timeout);
                }
            } initRedirect(100);
        </script>';
}