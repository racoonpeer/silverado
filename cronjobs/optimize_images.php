<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('WEBlife',    1); //Set flag that this is a parent file
define('WLCMS_EXEC', 1);//Set flag that this process by exec
define('WLCMS_ZONE', 'BACKEND'); //Set flag that this is a admin area
// change to current work file dir  [fix for exec, that current work dir is user dir]
chdir(dirname(__FILE__));
// change to root WLCMS dir
chdir("..".DIRECTORY_SEPARATOR);
// Set DOCUMENT_ROOT in global $_SERVER var if empty
if(empty($_SERVER['DOCUMENT_ROOT'])) $_SERVER['DOCUMENT_ROOT'] = rtrim(getcwd(), '/\\').DIRECTORY_SEPARATOR;

# ##############################################################################
// /// INCLUDE LIST SOME REQUIRED FILES AND INITIAL GLOBAL VARS BLOCK \\\\\\\\\\
require_once('include/functions/base.php');         // 1. Include base functions
require_once('include/classes/ImageOptimizer.php'); // 2. Include image optimizer class
$logfile = $_SERVER['DOCUMENT_ROOT'].'/temp/runtime/optimization.log';
$images_hashsum = $_SERVER['DOCUMENT_ROOT'].'/temp/runtime/images_hashsum.php';
$log_message = "Оптимизация изображений".PHP_EOL;
$mctime = microtime(true); 
$argv = array_merge(isset($argv[1]) ? getopt('', array('test::', 'print::', 'limit:', 'command:', 'debug')) : array(), array('argv'=>$argv));
$test = !empty($argv['test']);
$print = !empty($argv['print']);
$limit = (isset($argv['limit']) ? intval($argv['limit']) : ($test ? 5 : 0));
$command = (isset($argv['command']) ? trim($argv['command']) : '');
$debug = (isset($argv['debug']) ? (bool)$argv['debug'] : true);
/*
$argv = array_merge(isset($argv[1]) ? getopt_compatible('t::p::l:c:d', $argv, $usegetopt) : array(), array('argv'=>$argv)); // изза старой версии пришлось использовать только короткие нотации параметров
$test = !empty($argv['t']);
$print = !empty($argv['p']);
$limit = (isset($argv['l']) ? intval($argv['l']) : ($test ? 5 : 0));
$command = (isset($argv['c']) ? trim($argv['c']) : '');
$debug = (isset($argv['d']) ? (bool)$argv['d'] : false);
 */

// check hash array
$arCurrentHash = file_exists($images_hashsum) ? include_once $images_hashsum : array();
$startdate = strtotime('2017-07-20 10:00:00'); 
$checkdate = date('Y-m-d', strtotime("-1 year")); 
$exts = array('jpg','png','gif'); 
$idx = 0; 
$num = 0;

try {
    $optimizer = new ImageOptimizer(/*getenv('IS_DEV') ? */array(
        ImageOptimizer::OPTIMIZER_OPTIPNG   => '/usr/local/Cellar/optipng/0.7.6/bin/optipng',
        ImageOptimizer::OPTIMIZER_JPEGOPTIM => '/usr/local/Cellar/jpegoptim/1.4.4_1/bin/jpegoptim',
        ImageOptimizer::OPTIMIZER_GIFSICLE  => '/usr/local/Cellar/gifsicle/1.90/bin/gifsicle',
    )/* : array()*/);
    $dirs = array(
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/attributes', 
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/brands', 
        $_SERVER['DOCUMENT_ROOT'].'/uploads/banners',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/catalog', 
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/files',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/gallery',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/homeslider',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/main',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/mcith',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/news',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/options',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/stocks',
//        $_SERVER['DOCUMENT_ROOT'].'/uploads/users',
        $_SERVER['DOCUMENT_ROOT'].'/images/site/smart', 
    );
    $log_message .= 'на дату: '.$checkdate.'; в папках: '.implode(', ', $dirs).PHP_EOL;
    while(NULL !== ($dir = array_pop($dirs))) {
        if($dh = opendir($dir)) {
            $log_message .= "  ".$dir.PHP_EOL;
            while(false !== ($file = readdir($dh))) {
                if($file == '.' || $file == '..') continue;
                $path = $dir . '/' . $file;
                if(is_dir($path)) {
                    $dirs[] = $path;
                } else {
                    $idx++;
                    $ext = getFileExt($file);
                    if(in_array($ext, $exts)) {
                        $filtetime = filemtime($path);
                        if(date('Y-m-d', $filtetime) != $checkdate && $filtetime > $startdate) {
                            $key = md5($path);
                            $hash = md5_file($path);
                            $size = filesize($path);  
                            if(!isset($arCurrentHash[$key]) || ($arCurrentHash[$key]['hash'] != $hash || $arCurrentHash[$key]['size'] != $size)) {
                                $mess = "    ".$path.' -> ';
                                try {
                                    $mess .= trim($optimizer->optimize($path, null, $test));
                                    $arCurrentHash[$key] = array('hash'=>md5_file($path),'size'=>filesize($path));
                                } catch (Exception $e) {
                                    $mess .= trim($e->getMessage());
                                }   
                                $log_message .= $mess.PHP_EOL;
                                if($limit > 0 && $limit == $num) { break 2; }
                                $num++;
                            }
                        }
                    }
                }
            }
            closedir($dh);
        }
    }
} catch (Exception $e) {
    $log_message .= 'ERROR: '.$e->getMessage().PHP_EOL;
}
$log_message .= str_repeat('-', 50).PHP_EOL.'Работа завершена за ' . (microtime(true) - $mctime) .' s. '.PHP_EOL.'Всего обработано файлов '.$num.' из '.$idx.PHP_EOL;

// save hash array
if (($fp = @fopen($images_hashsum, 'w'))) {
    fwrite($fp, '<?php'.PHP_EOL.'return '.var_export($arCurrentHash, true).';'.PHP_EOL.'?>');
    fclose($fp);
}

//Write log file
if (($fp = @fopen($logfile, 'a'))) {
    fwrite($fp, $log_message);
    fclose($fp);
}

if($print || isset($_GET['print'])) {
    echo $log_message;
}