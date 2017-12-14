<?php 

define('WEBlife', 1);  //Set flag that this is a parent file
define('WLCMS_ZONE', 'FRONTEND');

chdir("..".DIRECTORY_SEPARATOR);

require_once('include/functions/base.php');
require_once('include/classes/Cookie.php');         // 1. Include Cookie class file
$Cookie     = new CCookie();
require_once('include/system/SystemComponent.php'); // 2. Include DB configuration file Must be included before other
require_once('include/system/DefaultLang.php');     // 3. Include Languages File
require_once('include/system/tables.php');          // 4. Include DB tables File
require_once('include/classes/DbConnector.php');    // 5. Include DB class
require_once('include/helpers/PHPHelper.php');
require_once('include/classes/Basket.php');
require_once('include/classes/mySmarty.php');
require_once('include/classes/Validator.php');
$Validator       = new Validator();
$Basket          = new Basket();
$smarty          = new mySmarty(TPL_FRONTEND_NAME, WLCMS_DEBUG, WLCMS_SMARTY_ERROR_REPORTING, TPL_FRONTEND_FORSE_COMPILE, TPL_FRONTEND_CACHING);
$DB              = new DbConnector();
$objSettingsInfo = getSettings();
$arrModules      = getModules();
$action          =  (isset($_GET['action']) and !empty($_GET['action'])) ? addslashes($_GET['action']) : false;
$itemID          =  (isset($_GET['itemID']) and intval($_GET['itemID'])) ? intval($_GET['itemID']) : 0;
$IS_AJAX         = UrlWL::isAjaxRequest();
$Liqpay          = new LiqPay(LIQPAY_PUBLIC_KEY, LIQPAY_PRIVATE_KEY);
$json            = array();

switch ($action) {
    /**
     * Create liqpay invoice
     */
    case "createInvoice":
        $item = getSimpleItemRow($itemID, ORDERS_TABLE);
        if (!empty($item)) {
            $Validator->validateEmail($item["email"], "Не указан e-mail", "email");
            
        }
        break;
}