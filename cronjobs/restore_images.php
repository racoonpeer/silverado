<?php

define('WEBlife', 1); // no direct access
define('WLCMS_EXEC', 1);//Set flag that this process by exec
define('WLCMS_ZONE', 'BACKEND'); //Set flag that this is a admin area
@set_time_limit(0);
@ini_set('memory_limit', '1G');

define('SRV_NAME', (getenv("IS_DEV") ? 'silverado.loc' : 'silverado.com.ua')); //Set server name in hosting
// change to current work file dir  [fix for exec, that current work dir is user dir]
chdir(dirname(__FILE__));
// change to root WLCMS dir
chdir("..".DIRECTORY_SEPARATOR);
// Set DOCUMENT_ROOT in global $_SERVER var if empty
if(empty($_SERVER['DOCUMENT_ROOT'])) $_SERVER['DOCUMENT_ROOT'] = rtrim(getcwd(), '/\\').DIRECTORY_SEPARATOR;
// Set SERVER_NAME in global $_SERVER var if empty
if(empty($_SERVER['SERVER_NAME'])) $_SERVER['SERVER_NAME'] = (strpos(__FILE__, SRV_NAME)===false) ? substr(SRV_NAME, 0, strpos(SRV_NAME, '.')) : SRV_NAME;

require_once('include/functions/base.php');         // 1. Include base functions
require_once('include/functions/menu.php');         // 3. Include menu functions
require_once('include/classes/Cookie.php');         // 1. Include Cookie class file
$Cookie     = new CCookie();
require_once('include/system/SystemComponent.php'); // 2. Include DB configuration file Must be included before other
require_once('include/system/DefaultLang.php');     // 3. Include Languages File
require_once('include/system/tables.php');          // 4. Include DB tables File
require_once('include/classes/DbConnector.php');    // 6. Include DB class
require_once('include/classes/Validator.php');    // 6. Include DB class

$DB = new DbConnector();

$path = prepareDirPath(UPLOAD_URL_DIR . 'catalog/');

$directories = glob($path . '*', GLOB_ONLYDIR);

foreach ($directories as $directory) {

    $itemID = (int) $directory;

    if (!$itemID) {
        throw new \Exception('Item ID ' . $itemID . ' is invalid!!!');
    }

    $itemPath = $path . $itemID . '/';

    $files = scandir($itemPath);

    if (!is_dir($itemPath) || empty($files)) {
        continue;
    }

    deleteDBLangsSync(CATALOGFILES_TABLE, 'WHERE pid = '. $itemID);

    foreach ($files as $i => $file) {

        if (empty($file) || !is_file($itemPath . $file)) {
            continue;
        }

        $image = [
            'pid' => $itemID,
            'filename' => $file,
            'fileorder' => $i,
            'active' => 1,
            'isdefault' => (int) !$i
        ];

        try {
            $DB->postToDB($image, CATALOGFILES_TABLE);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}