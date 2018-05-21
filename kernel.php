<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access


# ##############################################################################
// /// INCLUDE LIST SOME REQUIRED FILES AND INITIAL GLOBAL VARS BLOCK \\\\\\\\\\
require_once('include/functions/base.php');         // 1. Include base functions
require_once('include/functions/image.php');        // 2. Include image functions
require_once('include/functions/menu.php');         // 3. Include menu functions
require_once('include/classes/Cookie.php');         // 1. Include Cookie class file
$Cookie     = new CCookie();
require_once('include/system/SystemComponent.php'); // 2. Include DB configuration file Must be included before other
require_once('include/system/DefaultLang.php');     // 3. Include Languages File
require_once('include/system/tables.php');          // 4. Include DB tables File
require_once('include/classes/mySmarty.php');       // 5. Include mySmarty class
require_once('include/classes/DbConnector.php');    // 6. Include DB class
require_once('include/classes/Captcha.php');        // 7. Include Captcha class
require_once('include/classes/Validator.php');      // 8. Include Text Validator class
require_once('include/classes/Currencies.php');     // 9. Include Currencies class
require_once('include/classes/Banners.php');        //10. Include Banners class
require_once('include/classes/Basket.php');         //11. Include Banners class
require_once('include/helpers/PHPHelper.php');      //12. Custom PHP functions
require_once('include/helpers/HTMLHelper.php');     //13. Custom HTML functions
require_once('include/classes/TrackingEcommerce.php');
require_once('include/classes/yuicompressor/YUICompressor.php');
$DB         = new DbConnector(); //Initialize DbConnector class
$Captcha    = new Captcha(getIValidatorPefix(), CAPTCHA_TABLE, false);  //Initialize Captcha class
$Validator  = new Validator(); //Initialize Validator class
$smarty     = new mySmarty(TPL_FRONTEND_NAME, WLCMS_DEBUG, WLCMS_SMARTY_ERROR_REPORTING, TPL_FRONTEND_FORSE_COMPILE, TPL_FRONTEND_CACHING); //Initialize mySmarty class
$Currencies = new Currencies();  //Initialize Currencies class
$Banners    = new Banners($UrlWL, true);  //Initialize Banners class
$Basket     = new Basket();  //Initialize Basket class
$PHPHelper  = new PHPHelper();  //Initialize PHPHelper class with Custom PHP functions
$HTMLHelper = new HTMLHelper();  //Initialize HTMLHelper class with Custom HTML functions
$IS_DEV     = getenv("IS_DEV");
$IS_MAC     = getenv("IS_MAC");
$IS_AJAX    = UrlWL::isAjaxRequest();
// /// END INCLUDE LIST SOME REQUIRED FILES AND INITIAL GLOBAL VARS BLOCK \\\\\\
# ##############################################################################


# ##############################################################################
// ////////////////// OPERATION GLOBAL VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// Инициализируем обработчик URL 
$UrlWL->init($DB);
// Initialize Current Category ID
$catid  = $UrlWL->getCategoryId();
// SET from $_GET Global Array Page Offset Var = integer
$page   = $UrlWL->getPageNumber();
// SET from $_GET Global Array AJAX Mode Var = int
$ajax   = $UrlWL->getAjaxMode();
// SET from $_GET Global Array Module Of Page Var = string
$module = $UrlWL->getModuleName();
$Basket->setupKitParams(PRODUCT_KIT_PREFIX);
// Minify output
//if (!$IS_DEV) $smarty->loadFilter('output', 'trimwhitespace');
// Seo redirects
require_once 'seo/redirect.php';
// Seo adwords
require_once 'seo/adwords.php';
// //////////////// END OPERATION GLOBAL VARIABLE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


################################################################################
// /////////////////// IMPORTANT CACHE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$cacheID = getCacheId($catid); //cache ID of Smarty compiled template 
if($smarty->caching && $smarty->isCached(getTemplateFileName($ajax, $catid), $cacheID)){
    $smarty->display(getTemplateFileName($ajax, $catid), $cacheID);
    exit();
} // \\\\\\\\\\\\\\\ END IMPORTANT CACHE OPERATIONS ////////////////////////////
# ##############################################################################


################################################################################
// /////////////////// IMPORTANT GLOBAL VARIABLES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$objUserInfo     = getUserFromSession(); //user info object
$objSettingsInfo = PHPHelper::getCache()->get(CacheWL::KEY_OBJ_SETTINGS);//settings info object
if ($objSettingsInfo === false) {
    $objSettingsInfo = getSettings(); 
    PHPHelper::getCache()->set(CacheWL::KEY_OBJ_SETTINGS, $objSettingsInfo, 3600);
}
$arLangsUrls     = $UrlWL->createLangsUrls($DB); //Langs Array to redirect
$arrModules      = getModules(); //Modules Array where array key is module name
$arrPageData     = array( //Page data array
    'catid'         => &$catid,
    'page'          => &$page,
    'ajax'          => &$ajax,
    'itemID'        => 0,    // Item ID
    'backurl'       => '',
    'files_url'     => UPLOAD_URL_DIR,
    'files_path'    => UPLOAD_DIR,
    'def_img_param' => array('w'=>100, 'h'=>100),
    'images_params' => array(),
    'arrOrderLinks' => array(),
    'arrBreadCrumb' => array(),
    'items_on_page' => 10,
    'total_items'   => 0,
    'total_pages'   => 1,
    'seo_separator' => ' - ',
    'css_dir'       => '/css/'.TPL_FRONTEND_NAME.'/',
    'images_dir'    => '/images/site/'.TPL_FRONTEND_NAME.'/',
    'headTitle'     => '',
    'headScripts'       => array(
        "/js/libs/modernizr/modernizr.min.js",
        "/js/libs/detectizr/detectizr.min.js",
        "/js/libs/jquery/jquery.min.js",
        "/js/libs/jquery-migrate/jquery-migrate.min.js",
        "/js/libs/jqueryui/jquery-ui.min.js",
        "/js/libs/slidebars/slidebars.min.js",
        "/js/libs/jquery.form/jquery.form.min.js",
        "/js/libs/jquery.inputmask/inputmask/inputmask.min.js",
        "/js/libs/jquery.inputmask/inputmask/jquery.inputmask.min.js",
        "/js/libs/jquery.inputmask/inputmask/inputmask.regex.extensions.min.js",
        "/js/libs/jquery-steps/jquery.steps.min.js",
//        "/js/libs/jquery.lazyload/jquery.lazyload.min.js",
        "/js/libs/jquery-zoom/jquery.zoom.min.js",
        "/js/libs/jquery.touchswipe/jquery.touchSwipe.min.js",
        "/js/libs/Swiper/js/swiper.jquery.min.js",
        "/js/libs/remodal/remodal.min.js",
        "/js/libs/verge/verge.min.js",
        "/js/public/common".(!$IS_DEV ? ".min" : "").".js"
    ),
    'headCss'       => array(),
    'messages'      => getSessionMessages(),
    'errors'        => getSessionErrors(),
    'result'        => false,
    'success'       => false,
    'wishlist'      => array(),
    'compare'       => array(),
    'canonical'     => false,
    "link_prev"     => false,
    "link_next"     => false,
);
$arrPageData['offset']     = ($page-1)*$arrPageData['items_on_page'];
$arrPageData['path_arrow'] = '<img src="'.$arrPageData['images_dir'].'arrow.gif" alt=""/>';
// \\\\\\\\\\\\\\\\\ END IMPORTANT GLOBAL VARIABLES ////////////////////////////
################################################################################


################################################################################
// ///////////// INITIALIZE CATEGORY AND BREADCRUMB ARRAYS  \\\\\\\\\\\\\\\\\\\\
// Initialise the Current category array
$arCategory = getItemRow(MAIN_TABLE, '*', "WHERE id={$catid}");
//Anscreen Data From DB
$arCategory['text'] = unScreenData($arCategory['text']);
$arCategory['seo_text'] = unScreenData($arCategory['seo_text']);
// Set to Category array accsess variable taked recursively by parent
$arCategory['access'] = canAccess($catid, true);
// Set arPath to Category
$arCategory['arPath'] = $UrlWL->getCategoryNavPath();
// Set breadCrumb to array
$arrPageData['arrBreadCrumb'] = $UrlWL->getBreadCrumbs();
// Set current category module
$module = $arCategory['module'];
$modulename = $module;
// Init Banners By Current Category ID
$Banners->init($catid);
// Set Root Menu ID
$arrPageData['rootID'] = GetRootId($catid);
// Set Root Menu array
$arrPageData['arRootMenu'] = ($arrPageData['rootID']==$catid) ? $arCategory : getItemRow(MAIN_TABLE, '*', "WHERE id={$arrPageData['rootID']}");
// Set Captcha Default site parameters
$Captcha->SetCodeChars(str_split("abcdefghijknmpqrstuvwxyz0123456789"));
$Captcha->SetCodeLength(5);
// Set to Save basket to DB if user is logined
if ($objUserInfo->logined) {
    $Basket->setSaveDataBase($objUserInfo->id);
}
// Get wishlist from cookie
if ($Cookie->isSetCookie('wishlist')) {
    $arrPageData['wishlist'] = unserialize($_COOKIE['wishlist']);
}
// Get compare from cookies
if ($Cookie->isSetCookie('compare')) {
    $arrPageData['compare'] = unserialize($_COOKIE['compare']);
}
// check error catid
if($arCategory['id'] != UrlWL::ERROR_CATID) {
    // Set last site zone usage to session
    setZoneToSession();
} else if(!headers_sent()) {
    header('HTTP/1.0 404 Not Found');
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");// дата в прошлом
    header("Last-Modified: " . gmdate("D, d M Y H(idea)(worry)") . " GMT");
     // всегда модифицируется
    header("Cache-Control: no-store, no-cache, must-revalidate");// HTTP/1.1
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");// HTTP/1.0
}
// INCLUDE USER AUTHENTICATION FILE
if (file_exists("include".DS.getAuthFileName().".php")) include("include".DS.getAuthFileName().".php");
else die("Файл аутентификации невозможно подключить. Проверьте наличие файла, пути и правильность его подключения!");
// Check User can Accsess to this page
if (!$arCategory['access'] and !$arrPageData['auth']){
    $ajax
        ? RedirectAjax($UrlWL->buildCategoryUrl($arrModules['authorize']), $_SERVER['REQUEST_URI'])
        : Redirect($UrlWL->buildCategoryUrl($arrModules['authorize']), $_SERVER['REQUEST_URI'])
    ;
}
// INCLUDE CATEGORY  MODULE
if ($module && file_exists('module'.DS.$module.'.php')) {
    include_once('module'.DS.$module.'.php');
}
# ##############################################################################
// ///////////////////////// LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\
if(!empty($_SESSION[MDATA_KNAME])){ // Clear unUsed Session Modules Data
    foreach($_SESSION[MDATA_KNAME] as $mdkey=>$mdvalue){
        if($mdkey==$module || $mdkey=='search') continue;
        unset($_SESSION[MDATA_KNAME][$mdkey]);
    }
}
// Clear unUsed Session Basket of Modules Data
if(!in_array($arCategory['module'], array('catalog', 'search', 'basket', 'newest', 'popular'))){
    if(isset($_SESSION['basket_lastid'])) unset($_SESSION['basket_lastid']);
    if(isset($_SESSION['basket_lastpage']))  unset($_SESSION['basket_lastpage']);
    if(isset($_SESSION['basket_pagesall']))  unset($_SESSION['basket_pagesall']);
}
// Prepare styles & scripts for entire page
if (empty($arrPageData["headCss"])) $arrPageData["headCss"][] = "/css/public/common.css";
if ($IS_DEV) PHPHelper::generatePageScripts ($arrPageData["headScripts"], (!empty($modulename) ? $modulename : "common").".js");
$arrPageData["headScripts"][] = "/js/public/dom-extra".(!$IS_DEV ? ".min" : "").".js";

//$pageScriptName = !$mdname ? "common" : $mdname;
//if (!file_exists("js/min/{$pageScriptName}.js")) {
//    $yui = new YUICompressor("include/classes/yuicompressor/yuicompressor-2.4.8.jar", "js/min", array("semi"=>true));
//    foreach ($arrPageData["headScripts"] as $script) {
//        $scriptName = (!preg_match("/^http/", $script) ? $_SERVER["DOCUMENT_ROOT"] : "").$script;
//        $yui->addFile($scriptName);
//    }
//    $code   = $yui->compress();
//    $fName  = "js/min/{$pageScriptName}.js";
//    $fh     = fopen($fName, 'w') or die ("Can't create new file");
//    fwrite ($fh, $code);
//    fclose ($fh);
//}
//if (!$IS_DEV and file_exists("js/min/{$pageScriptName}.js")) $arrPageData["headScripts"] = array("/js/min/{$pageScriptName}.js");
// /////////////////////// END LOCAL PAGE OPERATIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\
# ##############################################################################


################################################################################
// //////////////// READY PARAMS TO SMARTY FLASH \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$smarty->assign('Basket',                   $Basket);
$smarty->assign('sessionID',                session_id());
$smarty->assign('Banners',                  $Banners);
$smarty->assign('Currencies',               $Currencies);
$smarty->assign('Captcha',                  $Captcha);
$smarty->assign('UrlWL',                    $UrlWL);
$smarty->assign('lang',                     $lang);
$smarty->assign('arLangsUrls',              $arLangsUrls);
$smarty->assign('arAcceptLangs',            $arAcceptLangs);
$smarty->assign('arrLangs',                 SystemComponent::getAcceptLangs());
$smarty->assign('arCategory',               $arCategory);
$smarty->assign('arrModules',               $arrModules);
$smarty->assign('arrPageData',              $arrPageData);
$smarty->assign('objUserInfo',              $objUserInfo);
$smarty->assign('objSettingsInfo',          $objSettingsInfo);
$smarty->assign('HTMLHelper',               $HTMLHelper);
$smarty->assign('trackingEcommerceJS',      TrackingEcommerce::OutputJS(ENABLE_TRACKING_ECOMMERCE));
$smarty->assign('IS_DEV',                   $IS_DEV);
$smarty->assign('IS_AJAX',                  $IS_AJAX);
// \\\\\\\\\\\\\\\\ END READY PARAMS TO SMARTY FLASH ///////////////////////////
################################################################################

$mainMenu = getMenu(1, 0, (strpos(TPL_FRONTEND_NAME, 'simple')!==false ? 1 : 0));
$catalogMenu = getMenu(6, $arrModules['catalog']['id']);

################################################################################
// ///////////// ADDITIONAL DYNAMIC PARAMS TO SMARTY FLASH \\\\\\\\\\\\\\\\\\\\\
// Menus: Main, Top, User, Bottom, etc.    getMenu($type, $pid, $incLevels)
$smarty->assign('mainMenu',             $mainMenu); // $type = 1 :  Главное меню
//$smarty->assign('subMenu',              getMenu(1, GetRootId($catid))); // $type = 1 :  Главное меню. Подменю
//$smarty->assign('topMenu',              getMenu(2)); // $type = 2 :  Верхнее меню
//$smarty->assign('leftMenu',             getMenu(3)); // $type = 3 :  Меню слевой стороны
//$smarty->assign('rightMenu',            getMenu(5)); // $type = 5 :  Меню справой стороны 
$smarty->assign('catalogMenu',          $catalogMenu); // $type = 6 :  Меню каталога
$smarty->assign('bottomMenu',           $catalogMenu); // $type = 4 :  Нижнее меню !IMPORTENT in this case this menu used us type 1
//$smarty->assign('userMenu',             getMenu(7)); // $type = 7 :  Меню пользователя
//$smarty->assign('systemMenu',           getMenu(8)); // $type = 8 :  Системное меню
//$smarty->assign('otherMenu',            getMenu(9)); // $type = 9 :  Другое меню

// \\\\\\\\\\\ END ADDITIONAL DYNAMIC PARAMS TO SMARTY FLASH ///////////////////
################################################################################
