<?php defined('WEBlife') or die( 'Restricted access' ); // no direct access

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SeoManager
 *
 * @author user5
 */
class SeoManager {
    //put your code here
    const INTERNAL_ENCODING = "CP1251";
    /**
     * 
     * @param string $url
     * @param int $mode
     * @return string
     */
    public function ConvertUriCase ($url, $mode = MB_CASE_LOWER) {
        return mb_convert_case($url, $mode, self::INTERNAL_ENCODING);
    }
    /**
     * 
     * @param string $url
     * @param string $query
     * @return string
     */
    public function AddEndingSlash ($url, $query = "", $sep = "?") {
        return $url."/".($query ? $sep.$query : '');
    }
    /**
     * 
     * @param string $url
     * @return string
     */
    public function RemoveSlashes ($url) {
        $url =  preg_replace("/\/{2,}/", "/", $url);
        return $url;
    }
    /**
     * 
     * @param string $url
     */
    public function Redirect301 ($url) {
        header('HTTP/1.1 301 Moved Permanently');
        header("Request-URI: {$url}");
        header("Content-Location: {$url}");
        header("Location: {$url}");
        exit();
    }
    
}
