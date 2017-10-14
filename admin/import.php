<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 1. Создание товаров или обновление (если существует)
 * 1.1 Связь товаров в базе и в прайс-листе по артикулу (pcode)
 * 1.2 Обновляются поля: название (title), цена (price), акционая цена (cprice), 
 * 
 */

@set_time_limit( 0 );
@ini_set('memory_limit','1G');

$json  = array();
$items = array();
$files_url = "/temp/import/";
$files_path = prepareDirPath($files_url);
$configStack = array(
    "kits" => array(
        "cid"   => 68,
        "title" => "Комплекты",
        "columns" => array(
            "Артикул"      => "pcode", 
            "Название"     => "title", 
            "Цена Закупка" => "buy_price", 
            "Цена Продажа" => "price", 
            "Цена Акция"   => "cprice"
        ),
        "options" => array(
            "Размер"       => "size", 
            "Вставка"      => "insertion", 
            "Цвет вставки" => "color", 
        ),
        "attributes" => array(
            "Тип изделия"      => "kind", 
            "Кому подходит"    => "gender", 
            "Металл"           => "metal", 
            "Средний вес"      => "midweight", 
            "Цвета"            => "gamma", 
            "Габариты изделия" => "dimensions", 
        ),
    ),
);

//require_once 'include/classes/Import.php';
require_once 'include/classes/PHPExcel.php';
require_once 'include/classes/PHPExcel/IOFactory.php';

if ($IS_AJAX and !empty($_POST["sourceID"]) and !empty($_POST["sourceUrl"])) {
    // Проверяем конфигурацию
    $config = array_key_exists($_POST["sourceID"], $configStack) ? $configStack[$_POST["sourceID"]] : false;
    if (!$config) $Validator->addError("Ошибка конфигурации!");
    // Считываем по ссылке исходный файл
    $sourceData = file_get_contents($_POST["sourceUrl"]);
    if (!$sourceData) $Validator->addError("Ошибка чтения файла-источника!");
    else {
        // Сохраняем исходный файл во временную папку
        $fput = file_put_contents("{$files_path}.{$_POST["sourceID"]}.xlsx", $sourceData);
        if (!file_exists("{$files_path}.{$_POST["sourceID"]}.xlsx")) $Validator->addError("Ошибка записи файла-источника!");
        else {
            $columnStack = $optionStack = $attrStack = array();
            $PHPExcel = PHPExcel_IOFactory::load("{$files_path}.{$_POST["sourceID"]}.xlsx");
            $PHPExcel->setActiveSheetIndex(0);
            $sheet = $PHPExcel->getActiveSheet();
            // Get column stack
            foreach ($sheet->getRowIterator() as $key=>$row) {
                // fill stacks
                if ($key==1) {
                     foreach($row->getCellIterator() as $i=>$cell) {
                         $cell = !empty($cell) ? trim(PHPHelper::dataConv($cell->getValue(), 'utf-8', WLCMS_SYSTEM_ENCODING, false, true)) : '';
                         if (empty($cell)) continue;
                         // Columns
                         if (array_key_exists($cell, $config["columns"])) $columnStack[$i] = $config["columns"][$cell];
                         // Otions
                         elseif (array_key_exists($cell, $config["options"])) $optionStack[$i] = $config["options"][$cell];
                         // Attributes
                         elseif (array_key_exists($cell, $config["attributes"])) $attrStack[$i] = $config["attributes"][$cell];
                     }
                }
                // Fill items
                else {
                    $item = array(
                        "cid"        => $config["cid"],
                        "options"    => array(),
                        "attributes" => array()
                    );
                    foreach ($row->getCellIterator() as $i=>$cell) {
                        $cellText = !empty($cell) ? trim(PHPHelper::dataConv($cell->getValue(), 'utf-8', WLCMS_SYSTEM_ENCODING, false, true)) : '';
                        if (array_key_exists($i, $columnStack)) {
                            if ($columnStack[$i]=="price" or $columnStack[$i]=="cprice") $cellText = (float)$cell->getOldCalculatedValue();
                            elseif ($columnStack[$i]=="buy_price") $cellText = (float)$cellText;
                            elseif ($columnStack[$i]=="is_new" or $columnStack[$i]=="is_stock" or $columnStack[$i]=="is_top") $cellText = (int)$cellText;
                            elseif ($columnStack[$i]=="title") $cellText = mb_convert_case($cellText, MB_CASE_TITLE, WLCMS_SYSTEM_ENCODING);
                            elseif ($columnStack[$i]=="pcode") $cellText = mb_strtoupper($cellText, WLCMS_SYSTEM_ENCODING);
                            $item[$columnStack[$i]] = $cellText;
                            continue;
                        }
                        elseif (array_key_exists($i, $optionStack)) {
                            $item["options"][$optionStack[$i]] = array_map('trim', explode(',', $cellText));
                            continue;
                        }
                        elseif (array_key_exists($i, $attrStack)) {
                            $item["attributes"][$attrStack[$i]] = array_map('trim', explode(',', $cellText));
                            continue;
                        }
                    }
                    $items[] = $item;
                }
            }
            $sheet->disconnectCells();
            $PHPExcel->disconnectWorksheets();
            unset($PHPExcel);
            // Write items
            if (!empty($items)) {
                $affected = 0;
                foreach ($items as $item) {
                    if (!isset($item["pcode"]) or (isset($item["pcode"]) and empty($item["pcode"]))) continue;
                    if (!isset($item["title"]) or (isset($item["title"]) and empty($item["title"]))) continue;
                    $itemID           = (int)getValueFromDB(CATALOG_TABLE, "id", "WHERE UPPER(`pcode`)='{$item["pcode"]}'");
                    $query_type       = $itemID ? "update" : "insert";
                    $arUnusedKeys     = $itemID ? array("title", "pcode", "created") : array();
                    $whereOptions     = $itemID ? "WHERE `id`='{$itemID}'" : "";
                    $seo_path         = $itemID ? getValueFromDB(CATALOG_TABLE, "seo_path", "WHERE `id`='{$itemID}'") : "{$item['title']}-{$item['pcode']}";
                    $item["seo_path"] = $UrlWL->strToUniqueUrl($DB, $seo_path, "catalog", CATALOG_TABLE, $itemID, empty($itemID));
                    $item["active"]   = $itemID ? (int)getValueFromDB(CATALOG_TABLE, "`active`", "WHERE `id`='{$itemID}'", "act") : 0;
                    $item["created"]  = date("Y-m-d H:i:s");
                    $result           = $DB->postToDB($item, CATALOG_TABLE, $whereOptions, $arUnusedKeys, $query_type, true);
                    if ($result) {
                        $affected++;
                        if (is_int($result)) $itemID = $result;
                        // Write options
                        if (!empty($item["options"])) {
                            foreach ($item["options"] as $colname=>$values) {
                                // Get option ID if exists
                                $optionID = (int)getValueFromDB(OPTIONS_TABLE, "id", "WHERE `colname`='{$colname}'");
                                // Add new option if not exists
                                if (!$optionID) {
                                    $arData = array(
                                        "title"   => array_search($colname, $config["options"]),
                                        "order"   => getMaxPosition(0, "order", false, OPTIONS_TABLE),
                                        "active"  => 1,
                                        "basket"  => 1,
                                        "list"    => 1,
                                        "created" => date("Y-m-d H:i:s"),
                                        "colname" => $colname,
                                    );
                                    $optionID = $DB->postToDB($arData, OPTIONS_TABLE);
                                }
                                if ($optionID and is_int($optionID)) {
                                    // Get option
//                                    $option = getItemRow(OPTIONS_TABLE, "*", "WHERE `id`={$optionID}");
                                    // Write Product options
                                    $productOptionID = (int)getValueFromDB(PRODUCT_OPTIONS_TABLE, "id", "WHERE `pid`='{$itemID}' AND `oid`='{$optionID}'");
                                    if (!$productOptionID and !empty($values)) {
                                        $arData = array(
                                            "pid"      => $itemID,
                                            "oid"      => $optionID,
                                            "order"    => getMaxPosition($itemID, "order", "pid", PRODUCT_OPTIONS_TABLE, " AND `oid`=$optionID"),
                                            "required" => 1
                                        );
                                        $productOptionID = $DB->postToDB($arData, PRODUCT_OPTIONS_TABLE);
                                    }
                                    // Clean product-option values
                                    if ($productOptionID) deleteRecords(PRODUCT_OPTIONS_VALUES_TABLE, "WHERE `product_id`='{$itemID}' AND `option_id`='{$optionID}'");
                                    // Write option values
                                    if (!empty($values)) {
                                        $i = 0;
                                        foreach ($values as $value) {
                                            if (!strlen($value)) continue;
                                            $valueID = (int)getValueFromDB(OPTIONS_VALUES_TABLE, "id", "WHERE `option_id`='{$optionID}' AND `title`='{$value}'");
                                            if (!$valueID) {
                                                $arData = array(
                                                    "option_id" => $optionID,
                                                    "title"     => $value,
                                                    "order"     => getMaxPosition($optionID, "order", "option_id", OPTIONS_VALUES_TABLE),
                                                    "seo_path"  => $UrlWL->strToUniqueUrl($DB, $value, $colname, OPTIONS_VALUES_TABLE, $optionID, false)
                                                );
                                                $valueID = $DB->postToDB($arData, OPTIONS_VALUES_TABLE);
                                            }
                                            if ($valueID) {
                                                $arData = array(
                                                    "product_id" => $itemID,
                                                    "option_id"  => $optionID,
                                                    "value_id"   => $valueID,
                                                    "order"      => $i+1,
                                                    "primary"    => (int)($i==0)
                                                );
                                                if ($DB->postToDB($arData, PRODUCT_OPTIONS_VALUES_TABLE)) $i++;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        // Write attributes
                        if (!empty($item["attributes"])) {
                            foreach ($item["attributes"] as $colname=>$values) {
                                // Get attribute ID if exists
                                $attributeID = (int)getValueFromDB(ATTRIBUTES_TABLE, "id", "WHERE `colname`='{$colname}'");
                                // Add new attribute if not exists
                                if (!$attributeID) {
                                    $arData = array(
                                        "gid"     => 1,
                                        "tid"     => 1,
                                        "title"   => array_search($colname, $config["attributes"]),
                                        "order"   => getMaxPosition(0, "order", false, ATTRIBUTES_TABLE),
                                        "colname" => $colname,
                                    );
                                    $attributeID = $DB->postToDB($arData, ATTRIBUTES_TABLE);
                                }
                                if ($attributeID and is_int($attributeID)) {
                                    // Write attribute values
                                    if (!empty($values)) {
                                        foreach ($values as $value) {
                                            if (!strlen($value)) continue;
                                            $valueID = (int)getValueFromDB(ATTRIBUTES_VALUES_TABLE, "id", "WHERE `aid`='{$attributeID}' AND `title`='{$value}'");
                                            if (!$valueID) {
                                                $arData = array(
                                                    "aid"      => $attributeID,
                                                    "title"    => $value,
                                                    "order"    => getMaxPosition($attributeID, "order", "aid", ATTRIBUTES_VALUES_TABLE),
                                                    "seo_path" => $UrlWL->strToUniqueUrl($DB, $value, $colname, ATTRIBUTES_VALUES_TABLE, $attributeID, false)
                                                );
                                                $valueID = $DB->postToDB($arData, ATTRIBUTES_VALUES_TABLE);
                                            }
                                            if ($valueID) {
                                                $arData = array(
                                                    "pid"     => $itemID,
                                                    "aid"     => $attributeID,
                                                    "value"   => $valueID,
                                                    "alias"   => PHPHelper::makeAttributeAlias($valueID),
                                                    "created" => date("Y-m-d H:i:s")
                                                );
                                                if ($DB->postToDB($arData, PRODUCT_ATTRIBUTE_TABLE)) $i++;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $Validator->addError("Импортировано $affected записей");
            }
        }
    }
    $json["message"] = $Validator->getListedErrors();
    echo json_encode(PHPHelper::dataConv($json));
    exit;
}

$arrPageData["headScripts"][] = "<script type=\"text/javascript\" src=\"/js/libs/jquery.form/jquery.form.min.js\"></script>";

$smarty->assign("configStack", $configStack);