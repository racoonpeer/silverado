<?php defined('WEBlife') or die( 'Restricted access' );

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$json = array();

if ($IS_AJAX and !empty($_POST)) {
    $Validator->validateNumber($_POST["round"], "Введите диаметр окружности", "round");
    $Validator->validateGeneral($_POST["width"], "Выберите ширину кольца", "width");
    if ($Validator->foundErrors()) $json["errors"] = $Validator->getErrors();
    else {
        $json["result"] = ($_POST["round"] * 1) / pi();
        if ($_POST["width"]=="thin") $json["result"] = round($json["result"]);
        elseif ($_POST["width"]=="thick") $json["result"] = ceil($json["result"]);
    } die(json_encode($json));
}

$smarty->assign("UrlWL",            $UrlWL);
$smarty->assign("objSettingsInfo",  $objSettingsInfo);
$smarty->assign('HTMLHelper',       $HTMLHelper);
$smarty->assign('IS_DEV',           $IS_DEV);
$smarty->assign('IS_AJAX',          $IS_AJAX);
$smarty->assign("arCategory",       $arCategory);
$smarty->assign("arrPageData",      $arrPageData);
$smarty->assign("arrModules",       $arrModules);

$json["output"] = $smarty->fetch("module/{$module}.tpl");

die(json_encode(PHPHelper::dataConv($json)));