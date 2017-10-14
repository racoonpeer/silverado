<?php defined('WEBlife') or die( 'Restricted access' ); // no direct access

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!$IS_AJAX) die ("Ajax requests only!");

$json = array();
$formData = array();

if (!empty($_POST)) {
    $_POST = PHPHelper::dataConv($_POST, "utf-8", WLCMS_SYSTEM_ENCODING);
    $Validator->validateEmail($_POST["email"], "¬ведите e-mail", "email");
    if ($Validator->foundErrors()) {
        $arrPageData["errors"] = $Validator->getErrors();
        $arrPageData["result"] = "error";
    } else {
        $arPostData = $_POST;
        $arPostData["created"] = date("Y-m-d H:i:s");
        if ($DB->postToDB($arPostData, SUBSCRIBERS_TABLE, '', array(), 'insert', false, true)) $arrPageData["result"] = "success";
    }
    $formData = array_merge($formData, $_POST);
}

$smarty->assign("formData",        $formData);
$smarty->assign("arrPageData",     $arrPageData);
$smarty->assign('arCategory',      $arCategory);
$smarty->assign('arrModules',      $arrModules);
$smarty->assign("UrlWL",           $UrlWL);
$smarty->assign("objSettingsInfo", $objSettingsInfo);
$smarty->assign('HTMLHelper',      $HTMLHelper);
$smarty->assign('IS_DEV',          $IS_DEV);
$smarty->assign('IS_AJAX',         $IS_AJAX);
$json["output"] = $smarty->fetch("ajax/{$module}.tpl");
$json["result"] = $arrPageData["result"];

echo json_encode(PHPHelper::dataConv($json));
exit;