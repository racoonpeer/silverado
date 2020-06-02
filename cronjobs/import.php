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
require_once('include/helpers/PHPHelper.php');      //12. Custom PHP functions
require_once('include/helpers/HTMLHelper.php');     //13. Custom HTML functions
require_once('include/classes/PHPExcel.php');
require_once('include/classes/PHPExcel/IOFactory.php');

if (!defined("CATALOG_ROOT_ID")) define ("CATALOG_ROOT_ID", 88);

$DB = new DbConnector();
$Validator = new Validator();

$files_url  = "/temp/import/";
$files_path = prepareDirPath($files_url);

$affected = 0;
$items = array();

$arSpreadSheets = array(
//    "SZgLFBBMmiZrr02YCrRIVJ8TEQizA0XkCS09kKTgDqAjz4FFy0m7y75zpGKbOyZzAGQACXNO3LZO-v", // Водопьян
//    "T0_f5syKKwfUoRRdNoVWlADerk5jSaxWS2ywc_-bLobwZPmtIhqYDJxNnRTUVpKeSIEAgQcTM7H0sr", // Устименко
//    "RgRfF9YkWXJ0hF4c2zeBHwSio6KguhZAjXy7VnRuYraVVe9uWN96mhwswRxoPEy_DHJQqz-x3Rng0K", // Бигсан
    "Q3YSxi5UEtzUBy5mxL93eqxcsH7WlbF7fOk3RHZ58Vp9q34PtfCE-xV-RHKTaK_i9kZoUoZbUTiemk", // Silverado
);
$pColNames = array(
    "Артикул"      => "pcode",
    "Название"     => "title",
    "Цена Продажа" => "price",
    "Цена Акция"   => "cprice"
);
// Read data from Google sheets
foreach ($arSpreadSheets as $spreadID) {
    $spreadURL = "https://docs.google.com/spreadsheets/d/e/2PACX-1v{$spreadID}/pub?output=xlsx";
    $spreadSourceData = file_get_contents($spreadURL);
    if (!$spreadSourceData) $Validator->addError("Ошибка чтения файла-источника!");
    else {
        $fpath = $files_path.$spreadID.".xlsx";
        $fput  = file_put_contents($fpath, $spreadSourceData);
        if (!file_exists($fpath)) $Validator->addError("Ошибка записи файла-источника!");
        else {
            $PHPExcel = PHPExcel_IOFactory::load($fpath);
            $numSheets = $PHPExcel->getSheetCount();
            for ($sn = 0; $sn < $numSheets; $sn++) {
                $PHPExcel->setActiveSheetIndex($sn);
                $sheet = $PHPExcel->getActiveSheet();
                $columnStack = $optionStack = $attrStack = array();
                $rows  = $sheet->getHighestDataRow();
                $cols  = PHPExcel_Cell::columnIndexFromString($sheet->getHighestDataColumn());
                foreach ($sheet->getRowIterator() as $key=>$row) {
                    if ($key > $rows) break;
                    // fill stacks
                    if ($key==1) {
                        foreach($row->getCellIterator() as $i=>$cell) {
                            if ($i > $cols) break;
                            $cellText = !empty($cell) ? trim(PHPHelper::mb_dataConv($cell->getValue())) : '';
                            // Search in attributes firstly
                            $exists = getItemRow(ATTRIBUTES_TABLE, "*", "WHERE `colname`='{$cellText}'");
                            if (!empty($exists)) {
                                $attrStack[$i] = $exists;
                                unset($exists);
                                continue;
                            } unset($exists);
                            // If not found - search in options
                            $exists2 = getItemRow(OPTIONS_TABLE, "*", "WHERE `colname`='{$cellText}'");
                            if (!empty($exists2)) {
                                $optionStack[$i] = $exists2;
                                unset($exists2);
                                continue;
                            } unset($exists2);
                            // Columns
                            if (array_key_exists($cellText, $pColNames)) $columnStack[$i] = $pColNames[$cellText];
                        }
                    }
                    // Fill items
                    else {
                        $item = array();
                        $item["cid"]        = 0;
                        $item["options"]    = array();
                        $item["attributes"] = array();
                        foreach($row->getCellIterator() as $i=>$cell) {
                            if ($i > $cols) break;
                            $cellText = !empty($cell) ? trim(PHPHelper::mb_dataConv($cell->getValue())) : '';
                            // Fill product columns
                            if (array_key_exists($i, $columnStack)) {
                                $colname = $columnStack[$i];
                                if ($colname=="pcode") $cellText = mb_strtoupper($cellText, WLCMS_SYSTEM_ENCODING);
                                elseif ($colname=="price" or $colname=="cprice") $cellText = (float)$cell->getValue();
                                elseif ($columnStack[$i]=="title") $cellText = mb_ucfirst($cellText, WLCMS_SYSTEM_ENCODING);
                                $item[$colname] = $cellText;
                            }
                            // Fill options
                            elseif (array_key_exists($i, $optionStack)) {
                                $option = $optionStack[$i];
                                $item["options"][$option["id"]] = array_map('trim', explode(',', $cellText));
                                continue;
                            }
                            // Fill attributes
                            elseif (array_key_exists($i, $attrStack)) {
                                $attribute = $attrStack[$i];
                                $item["attributes"][$attribute["id"]] = array_map('trim', explode(',', $cellText));
                                continue;
                            }
                        }
                        if (empty($item["title"]) or empty($item["pcode"])) continue;
                        // Insert new options values
                        if (!empty($item["options"])) {
                            foreach ($item["options"] as $oid => $values) {
                                if (empty($values)) continue;
                                foreach ($values as $val) {
                                    if (empty($val)) continue;
                                    // Search exists options value and insert if not exists
                                    $exVal = getValueFromDB(OPTIONS_VALUES_TABLE, "id", "WHERE `option_id`=$oid AND `title`='{$val}'");
                                    if (!$exVal) {
                                        $arPost = array(
                                            "option_id" => $oid,
                                            "title"     => $val,
                                            "order"     => getMaxPosition($oid, "order", "option_id", OPTIONS_VALUES_TABLE)
                                        );
                                        $DB->postToDB($arPost, OPTIONS_VALUES_TABLE);
                                    }
                                }
                            }
                        }
                        // Get item category and insert new attributes values
                        if (!empty($item["attributes"])) {
                            foreach ($item["attributes"] as $aid => $values) {
                                if (empty($values)) continue;
                                foreach ($values as $val) {
                                    if (empty($val)) continue;
                                    // Search exists attribute value and insert if not exists
                                    $exVal = getValueFromDB(ATTRIBUTES_VALUES_TABLE, "id", "WHERE `aid`=$aid AND `title`='{$val}'");
                                    if (!$exVal) {
                                        $arPost = array(
                                            "aid"   => $aid,
                                            "title" => $val,
                                            "order" => getMaxPosition($aid, "order", "aid", ATTRIBUTES_VALUES_TABLE)
                                        );
                                        $result = $DB->postToDB($arPost, ATTRIBUTES_VALUES_TABLE);
                                        if ($result and is_int($result)) $exVal = $result;
                                    }
                                    if (!$exVal or $item["cid"]>0) continue;
                                    $query  = "SELECT m.`id` FROM `".MAIN_TABLE."` m "
                                        . "INNER JOIN `".CATEGORY_PROPERTIES_TABLE."` cp ON(cp.`category_id`=m.`id` AND cp.`attribute_id`=$aid AND cp.`value_id`=$exVal) "
                                        . "INNER JOIN `".CATEGORY_PROPERTIES_TYPES_TABLE."` cpt ON(cpt.`id`=cp.`type_id` AND cpt.`typename`='attribute') "
                                        . "WHERE m.`module`='catalog' AND cp.`attribute_id`=15 AND m.`pid`=".CATALOG_ROOT_ID." LIMIT 1";
                                    $result = mysql_query($query);
                                    if ($result and mysql_num_rows($result)>0) {
                                        $row = mysql_fetch_assoc($result);
                                        $item["cid"] = $row["id"];
                                    }
                                }
                            }
                        }
                        $items[] = $item;
                    }
                }
                $sheet->disconnectCells();
            }
            $PHPExcel->disconnectWorksheets();
            unset($PHPExcel);
        }
        if (file_exists($fpath)) unlinkFile($spreadID.".xlsx", $files_path);
    }
}
// Write data to DB
if (!empty($items)) {
    foreach ($items as $item) {
        if (!isset($item["pcode"]) or (isset($item["pcode"]) and empty($item["pcode"]))) continue; // Skip if product code not set
        if (!isset($item["title"]) or (isset($item["title"]) and empty($item["title"]))) continue; // Skip if product title not set
        $itemID           = (int)getValueFromDB(CATALOG_TABLE, "id", "WHERE UPPER(`pcode`)='{$item["pcode"]}'");
        $query_type       = $itemID ? "update" : "insert";
        $whereOptions     = $itemID ? "WHERE `id`='{$itemID}'" : "";
        $arUnusedKeys     = $itemID ? array("id", "created", "seo_path") : array("id");
        $seo_path         = $itemID ? getValueFromDB(CATALOG_TABLE, "seo_path", "WHERE `id`='{$itemID}'") : "{$item['title']}-{$item['pcode']}";
        $item["seo_path"] = $UrlWL->strToUniqueUrl($DB, $seo_path, "catalog", CATALOG_TABLE, $itemID, empty($itemID));
        $item["active"]   = $itemID ? (int)getValueFromDB(CATALOG_TABLE, "`active`", "WHERE `id`='{$itemID}'", "act") : 0;
        $item["created"]  = date("Y-m-d H:i:s");
        if (!$itemID and empty($item["cid"])) $item["cid"] = CATALOG_ROOT_ID;
        $result           = $DB->postToDB($item, CATALOG_TABLE, $whereOptions, $arUnusedKeys, $query_type, true);
        if ($result) {
            $affected++;
            if (is_int($result)) $itemID = $result;
            // Write options
            $arOptionsIdx = $arOptionsValuesIdx = array(0);
            if (!empty($item["options"])) {
                foreach ($item["options"] as $optionID=>$values) {
                    // Skip if empty values
                    if (empty($values)) continue;
                    // Get already added product option or insert new
                    $exists = (int)getValueFromDB(PRODUCT_OPTIONS_TABLE, "id", "WHERE `pid`={$itemID} AND `oid`={$optionID}");
                    if (!$exists) {
                        $arPost = array(
                            "pid" => $itemID,
                            "oid" => $optionID,
                            "required" => 1,
                            "order" => getMaxPosition($itemID, "order", "pid", PRODUCT_OPTIONS_TABLE)
                        );
                        $exists = $DB->postToDB($arPost, PRODUCT_OPTIONS_TABLE);
                    }
                    if (!$exists) continue;
                    else $arOptionsIdx[] = $exists;
                    // Get already added product option value or insert new
                    foreach ($values as $val) {
                        $valueID = (int)getValueFromDB(OPTIONS_VALUES_TABLE, "id", "WHERE `option_id`={$optionID} AND `title`='{$val}'");
                        if (!$valueID) continue;
                        $exists  = (int)getValueFromDB(PRODUCT_OPTIONS_VALUES_TABLE, "id", "WHERE `product_id`={$itemID} AND `option_id`={$optionID} AND `value_id`={$valueID}");
                        if (!$exists) {
                            $arPost = array(
                                "product_id" => $itemID,
                                "option_id" => $optionID,
                                "value_id" => $valueID,
                                "order" => getMaxPosition($optionID, "order", "option_id", PRODUCT_OPTIONS_VALUES_TABLE, " AND `product_id`={$itemID}")
                            );
                            $exists = $DB->postToDB($arPost, PRODUCT_OPTIONS_VALUES_TABLE);
                        }
                        if ($exists and is_int($exists)) $arOptionsValuesIdx[] = $exists;
                    }
                }
            }
            deleteRecords(PRODUCT_OPTIONS_TABLE, "WHERE `pid`={$itemID} AND `id` NOT IN(".implode(",", $arOptionsIdx).")");
            deleteRecords(PRODUCT_OPTIONS_VALUES_TABLE, "WHERE `product_id`={$itemID} AND `id` NOT IN(".implode(",", $arOptionsValuesIdx).")");
            // Write attributes
            $arAttributesValuesIdx = array(0);
            if (!empty($item["attributes"])) {
                foreach ($item["attributes"] as $aid=>$values) {
                    // Skip if empty values
                    if (empty($values)) continue;
                    foreach ($values as $val) {
                        $valueID = (int)getValueFromDB(ATTRIBUTES_VALUES_TABLE, "id", "WHERE `aid`={$aid} AND `title`='{$val}'");
                        if (!$valueID) continue;
                        $exists  = (int)getValueFromDB(PRODUCT_ATTRIBUTE_TABLE, "id", "WHERE `pid`={$itemID} AND `aid`={$aid} AND `value`={$valueID}");
                        if (!$exists) {
                            $arPost = array(
                                "pid" => $itemID,
                                "aid" => $aid,
                                "value" => $valueID,
                                "alias" => PHPHelper::makeAttributeAlias($val)
                            );
                            $exists = $DB->postToDB($arPost, PRODUCT_ATTRIBUTE_TABLE);
                        }
                        if ($exists and is_int($exists)) $arAttributesValuesIdx[] = $exists;
                    }
                }
            }
            deleteRecords(PRODUCT_ATTRIBUTE_TABLE, "WHERE `pid`={$itemID} AND `id` NOT IN(".implode(",", $arAttributesValuesIdx).")");
        }
    }
//    SetPrimaryOptionsValues();
}

print("Обновлено {$affected} записей");

function SetPrimaryOptionsValues() {
    $query  = "SELECT po.*, GROUP_CONCAT(pov.`id`) AS `idx` FROM `".PRODUCT_OPTIONS_TABLE."` po "
        . "INNER JOIN `".PRODUCT_OPTIONS_VALUES_TABLE."` pov ON(pov.`product_id`=po.`pid` AND pov.`option_id`=po.`oid`) "
        . "GROUP BY po.`id`";
    $result = mysql_query($query);
    if ($result AND mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            updateRecords(PRODUCT_OPTIONS_VALUES_TABLE, "`primary`=0", "WHERE `id` IN({$row["idx"]})");
            updateRecords(PRODUCT_OPTIONS_VALUES_TABLE, "`primary`=1", "WHERE `id` IN({$row["idx"]}) LIMIT 1");
        }
    }
}