<?php defined('WEBlife') or die( 'Restricted access' );

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
@set_time_limit( 0 );
@ini_set('memory_limit','1G');

require_once 'include/classes/HtmlDom/HtmlDom.php';

$json  = array();
$items = array();
$sourceParamStack = array(
    "ustimenko" => array(
        "title" => "Устименко",
        "list_class" => "#content",
        "list_item_class" => "article",
        "flypage_class" => "article",
        "files_path" => "/grabber/ustimenko/"
    ),
    "svitozar" => array(
        "title" => "Свитозар",
        "list_class" => "#product_list",
        "list_item_class" => ".zt-divproduct",
        "flypage_class" => "article",
        "files_path" => "/grabber/svitozar/"
    ),
);

if ($IS_AJAX and !empty($_POST["sourceID"]) and !empty($_POST["sourceUrl"])) {
    array_key_exists($_POST["sourceID"], $sourceParamStack) or die ("Sorry, but source params are needed!");
    $affected = 0;
    $sourceParams = $sourceParamStack[$_POST["sourceID"]];
    $HtmlDom = HtmlDom::load($_POST["sourceUrl"]);
    foreach ($HtmlDom->find($sourceParams["list_item_class"]) as $list_item) {
        array_push($items, $list_item);
    }
    unset($HtmlDom);
    if (!empty($items)) {
        foreach ($items as $list_item) {
            if (($list_item instanceof simple_html_dom_node)===false) continue;
            switch ($_POST["sourceID"]) {
                case "ustimenko":
                    // Берем контент страницы по ссылке из списка
                    $title = PHPHelper::dataConv($list_item->find(".entry-title", 0)->plaintext, "utf-8", "windows-1251", true, true);
                    $link  = $list_item->find(".entry-content", 0)->find("a", 0)->href;
                    if (!preg_match("/\.jpg$/", $link)) {
                        $HtmlDom = HtmlDom::load($link);
                        if (($HtmlDom instanceof simple_html_dom)===false) continue;
                        $flypage = $HtmlDom->find($sourceParams["flypage_class"], 0);
                        if (($flypage instanceof simple_html_dom_node)===false) continue;
                        $title   = PHPHelper::dataConv($flypage->find(".entry-header", 0)->find(".entry-title", 0)->plaintext, "utf-8", "windows-1251", true, true);
                        $link    = $flypage->find(".entry-header", 0)->find(".attachment-details", 0)->find("a", 1)->href;
                    }
                    $image     = WideImage::load($link);
                    $filename  = UrlWL::stringToUrl($title).".jpg";
                    $file_path = prepareDirPath($sourceParams["files_path"], true);
                    $image->saveToFile($file_path.$filename);
                    if (file_exists($file_path.$filename)) $affected++;
                    break;
                case "svitozar":
                    $image = $list_item->find(".highslide", 0);
                    $title = $list_item->find(".browseProductTitle", 0);
                    if (($image instanceof simple_html_dom_node)===false or ($title instanceof simple_html_dom_node)===false) continue;
                    $link      = $image->href;
                    $title     = PHPHelper::dataConv($title->plaintext, "utf-8", "windows-1251", true, true);
                    $image     = WideImage::load($link);
                    $filename  = UrlWL::stringToUrl($title).".jpg";
                    $file_path = prepareDirPath($sourceParams["files_path"], true);
                    $image->saveToFile($file_path.$filename);
                    if (file_exists($file_path.$filename)) $affected++;
                    break;
            }
        }
    }
    $json["message"] = "Импортировано {$affected} изображений";
    echo json_encode(PHPHelper::dataConv($json));
    exit();
}

$arrPageData["headScripts"][] = "<script type=\"text/javascript\" src=\"/js/libs/jquery.form/jquery.form.min.js\"></script>";

$smarty->assign("sourceParamStack", $sourceParamStack);