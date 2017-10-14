<?php defined('WEBlife') or die( 'Restricted access' );

$itemID = !empty($_GET["itemID"]) ? intval($_GET["itemID"]) : false;

$arrPageData['itemID']      = $itemID;
$arrPageData['current_url'] = $arrPageData['admin_url'];
$arrPageData['headTitle']   = ATTRIBUTES.$arrPageData['seo_separator'].$arrPageData['headTitle'];
$arrPageData['files_url']   = UPLOAD_URL_DIR.'attributes/';
$arrPageData['files_path']  = prepareDirPath($arrPageData["files_url"], true);
// Include Need CSS and Scripts For This Page To Array
$arrPageData['headCss'][]     = '<link href="/js/jquery/themes/base/jquery.ui.all.css" type="text/css" rel="stylesheet" />';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/jquery.ui.core.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/jquery.ui.widget.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/jquery.ui.datepicker.js" type="text/javascript"></script>';
$arrPageData['headScripts'][] = '<script src="/js/jquery/ui/1251/jquery.ui.datepicker-ru.js" type="text/javascript"></script>';

if ($itemID) {
    $item = getSimpleItemRow($itemID, ATTRIBUTES_TABLE);
    if (!empty($item)) {
        $item['arValues'] = getRowItemsInKey('id', ATTRIBUTES_VALUES_TABLE, '*', 'WHERE `aid`='.$itemID, 'ORDER BY `order`');
        if(!empty($item['arValues'])){
            foreach($item['arValues'] as $key => $val) {
                $item['arValues'][$key]['edit'] = count(getRowItems(PRODUCT_ATTRIBUTE_TABLE, '*', '`aid`='.$itemID.' AND `value`="'.$val['id'].'"')) > 0 ? false : true;
            }
        }
        $item['arValuesMaxID'] = intval(getValueFromDB(ATTRIBUTES_VALUES_TABLE, 'MAX(id)', 'WHERE `aid`='.$itemID, 'max'));
        $item['seo_path'] = $UrlWL->strToUrl(($item['title'] ? $item['title'] : $item['descr']), 'attr');
        $item_title = $item["title"];
        $item_seopath = $item["seo_path"];
        if (!empty($_POST) AND $task=="editItem") {
            $arResults = array();
            if (!empty($_POST['arValues'])) {
                $order = 1;
                foreach ($_POST['arValues'] as $key => $arValue) {
                    $valueItem = array();
                    if (!empty($arValue['id']) and $arValue['id']>0) {
                        $valueItem = getItemRow(ATTRIBUTES_VALUES_TABLE, '*', 'WHERE `id`='.$arValue['id']." AND `aid`={$itemID}");                            
                    }
                    $arValue['image'] = !empty($valueItem) ? $valueItem['image'] : '';
                    $new_name = '';
                    if (isset($arValue['delete_image']) AND !empty($valueItem)) {
                        unlinkImage($valueItem['id'], ATTRIBUTES_VALUES_TABLE, $arrPageData['files_url'], false, false);
                        ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, 'Удалено изображение для значения аттрибута "'.$arValue['title'].'"', $lang, $item_title, $itemID, $arrPageData['module']);
                        $arValue['image'] = "";
                    }
                    if (isset($_FILES['arValues']['tmp_name'][$key])) {     
                        $iname        = $_FILES['arValues']['name'][$key]['image']; //имя файла до его отправки на сервер (pict.gif)
                        $itmp_name    = $_FILES['arValues']['tmp_name'][$key]['image']; //содержит имя файла во временном каталоге (/tmp/phpV3b3qY)
                        $arExtAllowed = array('jpeg','jpg','gif','png');
                        if ($iname AND $itmp_name) {
                            $file_ext = getFileExt($iname);
                            if (in_array($file_ext, $arExtAllowed)) {
                                if (!empty($valueItem)) unlinkImage($valueItem['id'], ATTRIBUTES_VALUES_TABLE, $arrPageData['files_url']);
                                $new_name = createUniqueFileName($arrPageData['files_url'], $file_ext, basename($iname, '.'.$file_ext));
                                $image = WideImage::load($itmp_name);
                                $image->saveToFile($arrPageData['files_path'].$new_name);
                                ActionsLog::getInstance()->save(ActionsLog::ACTION_EDIT, 'Добавлено изображение для значения аттрибута "'.$arValue['title'].'"', $lang, $item_title, $itemID, $arrPageData['module']);
                                if (file_exists($arrPageData['files_path'].$new_name)) $arValue['image'] = $new_name;
                            }
                        }
                    }
                    // SEO path manipulation
                    if (($arValue["seo_path"] = trim($arValue["seo_path"]))!=='' and ($arValue["seo_path"] = Url::stringToUrl($arValue["seo_path"]))!==''){
                        $arValue['seo_path']  = $UrlWL->strToUniqueUrl($DB, $arValue['seo_path'], $item_seopath, ATTRIBUTES_VALUES_TABLE, (empty($arValue['id']) ? 0 : $arValue['id']), empty($arValue['id']));
                    }
                    $arData = array(
                        'aid'      => $itemID,
                        'title'    => $arValue['title'],
                        'seo_path' => $arValue['seo_path'],
                        'image'    => $arValue['image'],
                        'order'    => $order++
                    );
                    $result = $DB->postToDB($arData, ATTRIBUTES_VALUES_TABLE, !empty($valueItem) ? 'WHERE `id`='.$valueItem['id'] : '', array(), (!empty($valueItem) ? 'update' : 'insert'), (!empty($valueItem) ? false : true));
                    $arResults[] = !empty($valueItem) ? $valueItem['id'] : intval($result);
                }
                deleteItemsAndFilesFromDB('image', ATTRIBUTES_VALUES_TABLE, 'WHERE `aid`='.$itemID.(!empty($arResults) ? ' AND `id` NOT IN ('.implode(',', $arResults).')' : ''), $arrPageData['files_url'], true);
                deleteDBLangsSync(PRODUCT_ATTRIBUTE_TABLE, "WHERE `aid`=$itemID AND `value` NOT IN(".implode(',', $arResults).")");
                Redirect($arrPageData["admin_url"]."&task=editItem&itemID={$itemID}&ajax=1");
            }
        }
    }
}

$smarty->assign("item", $item);