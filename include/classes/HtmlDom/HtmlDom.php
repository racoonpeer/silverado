<?php

// include necessary classes
include_once('simple_html_dom.php');


/**
 * Description of this class
 *
 * HtmlDom is a wrapper class to simple_html_dom
 * http://sourceforge.net/projects/simplehtmldom/
 * Created on 04.09.2014, 13:02:36
 * @author Andreas, WebLife
 * @copyright 2014
 */
class HtmlDom {

    public static function load($url, $use_include_path = false, $context=null, $offset = -1, $maxLen=-1, $lowercase = true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT){
        $str = $maxLen>0 ? file_get_contents($url, $use_include_path, $context, $offset, $maxLen) : file_get_contents($url, $use_include_path, $context, $offset);
        if(!$str) $str = '';
        $str = self::cleanHtml($str);
        return str_get_html($str, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
    }

    public static function loadFromFile($url, $use_include_path = false, $context=null, $offset = -1, $maxLen=-1, $lowercase = true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT){
        return file_get_html($url, $use_include_path, $context, $offset, $maxLen, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
    }

    public static function loadFromString($str, $lowercase=true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT){
        return str_get_html($str, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
    }

    public static function dumpTree($node, $show_attr=true, $deep=0){
        dump_html_tree($node, $show_attr=true, $deep=0);
    }


    public static function cleanHtml($str){
        if($str){
            $str = preg_replace("'<script[^>]*>(.*?)</script>'is", '', $str);
            $str = preg_replace("'<noscript[^>]*>(.*?)</noscript>'is", '', $str);
            $str = preg_replace("'<!--(.*?)-->'is", '', $str);
            $str = trim($str);
        }
        return $str;
    }

}