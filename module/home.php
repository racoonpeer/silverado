<?php defined('WEBlife') or die( 'Restricted access' ); // no direct access

$arrPageData['headScripts'][] = "/js/libs/slick-carousel/slick.min.js";
$arrPageData['headScripts'][] = "/js/public/home.js";

// ����������� ����������
$selections = PHPHelper::getCache()->get(CacheWL::KEY_HOME_SELECTIONS);
if ($selections === false) {
    // �������� ������ ������ ��������
    $selections = Selections::getSelections($UrlWL, 10);
    PHPHelper::getCache()->set(CacheWL::KEY_HOME_SELECTIONS, $selections, 3600);
}
$smarty->assign("selections", $selections);