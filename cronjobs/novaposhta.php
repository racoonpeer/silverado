<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('WEBlife',    1); //Set flag that this is a parent file
define('WLCMS_EXEC', 1);//Set flag that this process by exec
define('WLCMS_ZONE', 'BACKEND'); //Set flag that this is a admin area
define('SRV_NAME',   'silverado.com.ua'); //Set server name in hosting

// change to current work file dir  [fix for exec, that current work dir is user dir]
chdir(dirname(__FILE__));
// change to root WLCMS dir
chdir("..".DIRECTORY_SEPARATOR);
// Set DOCUMENT_ROOT in global $_SERVER var if empty
if(empty($_SERVER['DOCUMENT_ROOT'])) $_SERVER['DOCUMENT_ROOT'] = rtrim(getcwd(), '/\\').DIRECTORY_SEPARATOR;
// Set SERVER_NAME in global $_SERVER var if empty
if(empty($_SERVER['SERVER_NAME'])) $_SERVER['SERVER_NAME'] = (strpos(__FILE__, SRV_NAME)===false) ? substr(SRV_NAME, 0, strpos(SRV_NAME, '.')) : SRV_NAME;
if(empty($_SERVER['HTTP_HOST'])) $_SERVER['HTTP_HOST'] = (strpos(__FILE__, SRV_NAME)===false) ? substr(SRV_NAME, 0, strpos(SRV_NAME, '.')) : SRV_NAME;

require_once('include/functions/base.php');         // 1. Include base functions
require_once('include/functions/image.php');        // 2. Include image functions
require_once('include/functions/menu.php');         // 3. Include menu functions
require_once('include/system/SystemComponent.php'); // 2. Include DB configuration file Must be included before other
require_once('include/system/DefaultLang.php');     // 3. Include Languages File
require_once('include/system/tables.php');          // 4. Include DB tables File
require_once('include/classes/DbConnector.php');    // 6. Include DB class
require_once('include/classes/Novaposhta.php');
require_once('include/helpers/PHPHelper.php');

$DB = new DbConnector();
$db_settings = SystemComponent::initDBSettings();
$Api = new Novaposhta($db_settings["dbname"], $db_settings["dbhost"], $db_settings["dbusername"], $db_settings["dbpassword"], "cp1251");
$affected = 0;
// import cities
$Api->np_getCities();
$Api->saveItems(Novaposhta::NP_CITY_TABLE);
$affected += count($Api->getItems());
$Api->flush();
// import warehouses
$Api->np_getWarehouses();
$Api->saveItems(Novaposhta::NP_WAREHOUSE_TABLE);
$affected += count($Api->getItems());
$Api->flush();
// print result
print("Обработано {$affected} записей");