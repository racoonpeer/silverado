<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

# ##############################################################################
// //////////////////////// OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\
$itemID        = (isset($_GET['itemID']) and intval($_GET['itemID'])) ? intval($_GET['itemID']) : 0;
$item          = array(); // Item Info Array
$items         = array(); // Items Array of items Info arrays
$filters       = !empty($_GET['filters'])? $_GET['filters']: array();
$hasAccess     = $UserAccess->getAccessToModule($arrPageData['module']);
// /////////////////////// END OPERATION PAGE VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


# ##############################################################################
// ///////////// REQUIRED LOCAL PAGE REINIALIZING VARIABLES \\\\\\\\\\\\\\\\\\\\
$arrOrder                     = getOrdersByKeyExplodeFilteredArray($_GET, 'pageorder', '_');
$arrPageData['itemID']        = $itemID;
$arrPageData['files_url']     = UPLOAD_URL_DIR."catalog/";
$arrPageData['files_path']    = prepareDirPath($arrPageData['files_url']);
$arrPageData['images_params'] = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="catalog"'));
$arrPageData['current_url']   = $arrPageData['admin_url'].$arrPageData['page_url'];
$arrPageData['headTitle']     = ORDERS.$arrPageData['seo_separator'].$arrPageData['headTitle'];
$arrPageData['items_on_page'] = 20;
$arrPageData['arStatus']      = getComplexRowItems(ORDER_STATUS_TABLE, '*', '', 'id');
$arrPageData['arPayments']    = getComplexRowItems(PAYMENT_TYPES_TABLE, '*', "WHERE `active`>0");
$arrPageData['arShippings']   = getComplexRowItems(SHIPPING_TYPES_TABLE, '*', "WHERE `active`>0");
$arrPageData['arTypes']       = getComplexRowItems(ORDER_TYPES_TABLE, '*');
$arrPageData['filters']       = $filters;
$arrPageData['orders_url']    = $arrOrder['get'] ? $arrOrder['get'] : array();
$arrPageData['options']       = array();
$query  = "SELECT * FROM `".OPTIONS_TABLE."` ORDER BY `order`";
$result = mysql_query($query);
if ($result and mysql_num_rows($result) > 0) {
    while ($option = mysql_fetch_assoc($result)) {
        $option["values"] = getRowItemsInKey("id", OPTIONS_VALUES_TABLE, "*", "WHERE `option_id`=".$option["id"], "ORDER BY `order`");
        $arrPageData['options'][$option["id"]] = $option;
    }
}
// Delete order
if ($itemID and $task=='deleteItem') {
    if ($hasAccess) {
        $result = deleteDBLangsSync(ORDERS_TABLE, ' WHERE `id`='.$itemID);
        if (!$result) {
            $arrPageData['errors'][] = 'Данные не удалось удалить. Возможная причина - <p>MySQL Error Delete: '.mysql_errno().'</b> Error:'.mysql_error().'</p>';
        } elseif($result) {
            deleteRecords(ORDER_PRODUCTS_TABLE, 'WHERE `order_id`='.$itemID);
            Redirect($arrPageData['current_url']);
        }
    } else {
        $arrPageData['errors'][] = $UserAccess->getAccessError(); 
    }
}
// Edit order
if ($itemID and ($task=='editItem' or $task=='sendConfirm')) {
    $query  ='SELECT * FROM `'.ORDERS_TABLE.'` WHERE `id`='.$itemID.' LIMIT 1';
    $result = mysql_query($query);
    if (!$result) {
        $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
    } elseif (!mysql_num_rows($result)) {
        $arrPageData['errors'][] = "SELECT OPERATIONS: No this Item in DataBase";
    } else {
        $item = mysql_fetch_assoc($result);
        $item['price']       = $item["price"]*1;
        $item['createdDate'] = date('Y-m-d', strtotime($item['created']));
        $item['createdTime'] = date('H:i:s', strtotime($item['created']));
        $item['arStatus']    = getItemRow(ORDER_STATUS_TABLE, '*', 'WHERE `id`='.$item['status']);
        $item['arPayment']   = getItemRow(PAYMENT_TYPES_TABLE, '*', 'WHERE `id`='.$item['payment_id']);
        $item['arShipping']  = getItemRow(SHIPPING_TYPES_TABLE, '*', 'WHERE `id`='.$item['shipping_id']);
        $item['shipping_price'] = 0;
        $item['arHistory'] = ActionsLog::getInstance()->getHistory(array('modules'=>array($arrPageData['module']), 'oid'=>$item['id'], 'langs'=>array($lang)));
        // order products
        $item['children'] = array();
        $select = 'SELECT op.* FROM `'.ORDER_PRODUCTS_TABLE.'` op ';
        $where  = 'WHERE op.`order_id`='.$itemID.' ';
        $order  = 'ORDER BY op.`id`';
        $query  = $select.$where.$order;
        $result = mysql_query($query);
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $row["price"]  = $row["price"]*1;
                $row["amount"] = $row["price"]*$row["qty"];
                $arOptions = unserialize(unScreenData($row["options"]));
                $product = getItemRow(CATALOG_TABLE, '*', 'WHERE `id`='.$row['pid']);
                if (!empty($product)) {
                    $row['link']            = $UrlWL->buildItemUrl($UrlWL->getCategoryById($product['cid']), $product);
                    $row['ptitle']          = "{$product['title']} {$product['pcode']}";
                    $row['pcode']           = $product['pcode'];
                    $row["selectedOptions"] = isset($arOptions[$product["id"]]) ? $arOptions[$product["id"]] : array();
                    $row["options"]         = PHPHelper::getProductOptions($product["id"], $row["selectedOptions"]);
                    $row["productItem"]     = PHPHelper::getProductItem($product, $UrlWL, $arrPageData['files_url'], $arrPageData['images_params']);
                    $row["image"]           = $row["productItem"]["image"];
                } else {
                    $row['link']            = null;
                    $row['ptitle']          = $row['title'];
                    $row['pcode']           = "";
                    $row["selectedOptions"] = array();
                    $row["options"]         = array();
                    $row["productItem"]     = array();
                    $row["image"]           = array();
                } $item['children'][]       = $row;
            }
        }
        if (!empty($_POST) and $task=='editItem') {
            $Validator->validateGeneral($_POST['firstname'], 'Укажите имя клиента');
            $Validator->validateGeneral($_POST['phone'], 'Укажите номер телефона клиента');
            if ($Validator->foundErrors()) {
                $arrPageData['errors'][] = "<font color='#990033'>Пожалуйста, введите правильное значение :  </font>".$Validator->getListedErrors();
            } else {
                $arPostData   = $_POST;
                $arUnusedKeys = array('id');
                $query_type   = "update";
                $whereOptions = "WHERE `id`=$itemID";
                $result = $DB->postToDB($arPostData, ORDERS_TABLE, $whereOptions, $arUnusedKeys, $query_type);
                if ($result) {
                    $item_title = "Заказ №$itemID";
                    ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, 'Отредактировано "'.$item_title.'"', $lang, $item_title, $itemID, $arrPageData['module']);
                    setSessionMessage("{$item_title} успешно сохранен!");
                    Redirect($arrPageData['admin_url']."&task={$arrPageData['task']}&itemID={$itemID}");
                }
            } $item = array_merge($item, $_POST);
        }
        // Send user confirmation
        elseif ($IS_AJAX and $task=="sendConfirm") {
            $json = [
                "messages" => [],
                "errors"   => [],
            ];
            $Validator->validateEmail($item["email"], "Не указан e-mail клиента!");
            if ($Validator->foundErrors()) $json["errors"] = $Validator->getErrors();
            else {
                $arData = [
                    "oid"       => $itemID,
                    "price"     => $item['price'],
                    "firstname" => $item['firstname'],
                    "payment"   => $item['arPayment'],
                    "shipping"  => $item['arShipping'],
                    "children"  => $item['children'],
                    "created"   => $item['created'],
                    "server"    => WLCMS_HTTP_PREFIX.$_SERVER['HTTP_HOST'],
                ];
                $smarty->assign('arData', $arData);
                $smarty->assign('UrlWL',  $UrlWL);
                $text = $smarty->fetch('mail/order_confirm.tpl');
                $subject = 'Подтверждение заказа №'.$itemID;
                // Send confirmation email
                $send = sendMail($item["email"], $subject, $text, $objSettingsInfo->siteEmail, 'html');
                if ($send) $json["messages"][] = "Письмо подтверждения отправлено!";
                // Send liqpay invoice
                if ($send and $item["payment_id"]==Checkout::LP_PAYMENT_ID) {
                    $liqpay = new LiqPay(LIQPAY_PUBLIC_KEY, LIQPAY_PRIVATE_KEY);
                    $data = [
                        'action'    => 'invoice_send',
                        'version'   => '3',
                        'email'     => $item["email"],
                        'amount'    => $item["price"],
                        'currency'  => 'UAH',
                        'order_id'  => $itemID,
                        "goods"     => []
                    ];
                    foreach ($item["children"] as $children) {
                        $data["goods"][] = [
                            "amount" => $children["amount"],
                            "count"  => $children["qty"],
                            "unit"   => "шт.",
                            "name"   => $children["ptitle"],
                        ];
                    } 
                    $res = $liqpay->api("request", PHPHelper::dataConv($data));
                    if ($res) $json["messages"][] = "Счет отправлен!";
                } 
            } if (empty($json["errors"])) updateRecords(ORDERS_TABLE, "`confirmed`=1", "WHERE `id`=$itemID"); 
            die (json_encode(PHPHelper::dataConv($json)));
        }
    }    
} else {
    // Display Items List Data
    $where = "";
    if (!empty($filters)) {
        if (!empty($filters['title'])) {
            $searchStr = PHPHelper::prepareSearchText($filters['title']);
            $arName    = explode(' ', $searchStr);
            if (count($arName)>1) {
                foreach ($arName as $name) {
                    $where .= ($where ? ' OR ' : ' WHERE ( ').' t.`firstname` LIKE "%'.$name.'%" OR t.`surname` LIKE "%'.$name.'%" ';
                } $where .= ') ';
            } else {
                $where .= (!empty($where)? ' AND ': ' WHERE ( ').' t.`firstname` LIKE "%'.$searchStr.'%" OR t.`surname` LIKE "%'.$searchStr.'%"  OR t.`id`="'.$searchStr.'" ) ';
            } $arrPageData['filter_url'] .= '&filters[title]='.$filters['title'];
        }
        if (!empty($filters['status'])) {
            $where_status = '';
            foreach($filters['status'] as $status){
                $where_status .= ($where_status ? ' OR ' : ' ').' t.`status`='.$status;
                $arrPageData['filter_url'] .= '&filters[status][]='.$status;
            } $where .= ($where ? ' AND ' : ' WHERE ').' ('.$where_status.') ';
        }
        if (!empty($filters['type'])) {
            $where .= ($where ? ' AND ' : ' WHERE ').' t.`type`="'.$filters['type'].'" ';
        }
        if (!empty($filters['date']) and ($filters['date']['from'] or $filters['date']['to'])) {
            $from = $filters['date']['from'] ? date("Y-m-d", strtotime($filters['date']['from'])) : '0';
            $to = $filters['date']['to'] ? date("Y-m-d", strtotime($filters['date']['to'])) : date("Y-m-d");
            $where .= ($where ? ' AND ' : ' WHERE ').' (t.`created` BETWEEN "'.$from.'" AND  "'.$to.'") ';
            $arrPageData['filter_url'] .= '&filters[date][from]='.$filters['date']['from'];
            $arrPageData['filter_url'] .= '&filters[date][to]='.$filters['date']['to'];
        }
    }
    // Total pages and Pager
    $arrPageData['total_items'] = intval(getValueFromDB(ORDERS_TABLE." t", 'COUNT(*)', $where, 'count'));
    $arrPageData['pager']       = getPager($page, $arrPageData['total_items'], $arrPageData['items_on_page'], $arrPageData['admin_url'].$arrPageData['filter_url']);
    $arrPageData['total_pages'] = $arrPageData['pager']['count'];
    $arrPageData['offset']      = ($page-1)*$arrPageData['items_on_page'];
    // END Total pages and Pager
    $order  = "ORDER BY t.`created` DESC, t.`id`";
    $limit  = "LIMIT {$arrPageData['offset']}, {$arrPageData['items_on_page']}";
    $query  = "SELECT t.*, "
            . "(SELECT `title` FROM `".ORDER_STATUS_TABLE."` WHERE `id`=t.`status`) AS `statusname`, "
            . "(SELECT `title` FROM `".ORDER_TYPES_TABLE."` WHERE `id`=t.`type`) AS `typename`, "
            . "(CASE WHEN (t.`status`=2) THEN 'order_progress' "
            . "     WHEN (t.`status`=3) THEN 'order_sent' "
            . "     WHEN (t.`status`=4) THEN 'order_completed' "
            . "     WHEN (t.`status`=5) THEN 'order_cancelled' "
            . "     ELSE 'order_new'"
            . "END) AS `classname` "
            . "FROM `".ORDERS_TABLE."` t $where $order $limit";
    $result = mysql_query($query);
    if (!$result) {
        $arrPageData['errors'][] = "SELECT OPERATIONS: " . mysql_error();
    } else {
        while ($row = mysql_fetch_assoc($result)) {
            $row['title'] = $row['firstname'].' '.$row['surname'];
            $items[]      = $row;
        }
    }
}
// Include Need CSS and Scripts For This Page To Array
$arrPageData['headCss'][]     = '<link href="/js/libs/highslide/highslide.css" type="text/css" rel="stylesheet"/>';
$arrPageData['headCss'][]     = '<link href="/js/jquery/themes/smoothness/jquery.ui.all.css" type="text/css" rel="stylesheet"/>';
$arrPageData['headScripts'][] = '<script src="/js/libs/highslide/highslide-full.packed.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/libs/highslide/langs/'.$lang.'.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/libs/highslide/highslide.config.admin.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/jquery.ui.core.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/jquery.ui.autocomplete.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/jquery.ui.widget.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/jquery.ui.datepicker.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/1251/jquery.ui.datepicker-ru.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/private/orders.js" type="text/javascript"></script>';

$smarty->assign('item',          $item);
$smarty->assign('items',         $items);