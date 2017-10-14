<?php defined('WEBlife') or die( 'Restricted access' ); // no direct access

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'include/classes/SeoManager.php';

$SeoManager = new SeoManager();
$RUri       = $_SERVER["REQUEST_URI"];
$QString    = $_SERVER['QUERY_STRING'];
$Hash       = (substr($RUri, -1, 1)=="#") ? "#" : false;

if (!empty($RUri)) {
    // replace & 
    if (strpos($RUri, '-&-') !== false) {
        $RUri = str_replace('-&-', '-', $RUri);
        $SeoManager->Redirect301($RUri);
    }    
    // Redirect without index.php in url
    if (!$IS_DEV and strpos($RUri, '/index.php')===0) {
        $RUri = "/".($QString ? '?'.$QString : '');
        $SeoManager->Redirect301($RUri);
    }
    // redirect to root from home seo path
    if (preg_match("/^\/home/", $RUri)) {
        $RUri = preg_replace("/^\/home/", "/", $RUri);
        $SeoManager->Redirect301($RUri);
    }
    // convert uri case with redirect 301
    $nUri = str_replace("?".$QString, "", $RUri);
    if ($SeoManager->ConvertUriCase($nUri) != $nUri) {
        $RUri = $SeoManager->ConvertUriCase($nUri).($QString ? "?".$QString : "");
        $SeoManager->Redirect301($RUri);
    }
    // add slash before query string
    $nUri = str_replace("?".$QString, "", $RUri);
    if (substr($nUri, -1, 1)!="/") {
        $RUri = $SeoManager->AddEndingSlash($nUri, $QString, "?");
        $SeoManager->Redirect301($RUri);
    }
    // add slash before hash without query string
    $nUri = str_replace($Hash, "", $RUri);
    if (empty($QString) AND !empty($Hash) AND substr($nUri, -1, 1)!="/") {
        $RUri = $SeoManager->AddEndingSlash($nUri, $Hash, "");
        $SeoManager->Redirect301($RUri);
    }
    // remove unnecessary slashes
    if (preg_match("/\/{2,}/", $RUri)) {
        $RUri = $SeoManager->RemoveSlashes($RUri);
        $SeoManager->Redirect301($RUri);
    }
    // redirect from old to new product uri
//    if (preg_match("/^\/\d+\-/", $RUri)) {
//        $seo_path = ltrim(rtrim(preg_replace("/^\/\d+\-/", "/", $RUri), "/"), "/");
//        $product  = getItemRow(CATALOG_TABLE, "*", "WHERE `active`=1 AND `seo_path`='{$seo_path}'");
//        if (!empty($product)) {
//            $product["arCategory"] = $UrlWL->getCategoryById($product["cid"]);
//            $RUri = $UrlWL->buildItemUrl($product["arCategory"], $product);
//            $SeoManager->Redirect301($RUri);
//        }
//    }
}