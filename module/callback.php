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
    $Validator->validateGeneral($_POST["firstname"], "Введите имя", "firstname");
    $Validator->validateGeneral($_POST["phone"], "Введите номер телефона", "phone");
    if ($Validator->foundErrors()) $arrPageData["errors"] = $Validator->getErrors();
    else {
        $_POST['phone']   = preg_replace("/\s/", "", $_POST['phone']);
        $smarty->assign("arData", $_POST);
        $text    = $smarty->fetch("mail/callback_admin.tpl");
        $subject = "Новый заказ обратного звонка с сайта {$_SERVER["HTTP_HOST"]}";
        $from    = "noreply@silverado.com.ua";
        $to      = $objSettingsInfo->notifyEmail;
        if (sendMail($to, $subject, $text, $from)) {
            $arrPageData["result"] = "success";
            // send admin sms notification
            require_once('include/classes/TurboSms.php');
            $TurboSms = new TurboSms();
            $TurboSms->send("SILVERADO", $objSettingsInfo->ownerPhone, "Zakaz obratnogo zvonka s sayta. Perezvonite po nomeru ".$_POST['phone']." (".$_POST["firstname"].")");
        }
    } $formData = array_merge($formData, $_POST);
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
$json["output"] = $smarty->fetch("module/{$module}.tpl");

die(json_encode(PHPHelper::dataConv($json)));