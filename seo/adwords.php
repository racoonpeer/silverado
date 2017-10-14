<?php defined('WEBlife') or die( 'Restricted access' ); // no direct access

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$gclid = (isset($_GET["gclid"]) and !empty($_GET["gclid"])) ? trim(addslashes($_GET["gclid"])) : false;
if ($gclid and !$Cookie->isSetCookie("gclid")) $Cookie->add("gclid", $gclid, time()+2592000);
elseif ($Cookie->isSetCookie("gclid")) $gclid = $Cookie->getCookie("gclid");
$UrlWL->set_gclid($gclid);