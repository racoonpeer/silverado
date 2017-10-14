<?php
 /*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

require_once(WLCMS_ABS_ROOT.'include/functions/base.php');  // Include base functions

// TODO: check connect to datatbase, check files and folders right chmod
sys_verifications(WLCMS_DEBUG);

// ///////////////////////// FUNCTIONS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function sys_verifications($debug=false){
    if(!defined('WLCMS_EXEC')) checkWLCMS($debug);
}

function checkWLCMS($debug=false){
    $arCookie = SystemComponent::getTestCookie();
    $arrPath  = array(
        "backup"             => "��� ����� ������ ����� ���������� ".WLCMS_WRITABLE_CHMOD.". ��������� ���� dumper.cfg.php ����� �������!",
        "temp".DS."tpl_c"    => "��� ����� ������ ���� ����� � ������ ����� ���������� ".WLCMS_WRITABLE_CHMOD,
        "temp".DS."cache"    => "��� ����� ������ ���� ����� � ������ ����� ���������� ".WLCMS_WRITABLE_CHMOD,
        UPLOAD_DIR           => "��� ����� � ��� ��������� ����� (����� �����: index.html) ������ ����� ���������� ".WLCMS_WRITABLE_CHMOD,
        MAIN_CATEGORIES_DIR  => "��� ����� � ��� ��������� ����� (����� ����� index.html) ������ ����� ���������� ".WLCMS_WRITABLE_CHMOD
    );    
    
    if($debug || !SystemComponent::checkTestCookie($arCookie)){
        $arErrors = array_merge(checkDBConnection(), checkChmod($arrPath));
        if(sizeof($arErrors)>0){
            SystemComponent::setTestCookie($arCookie, false);
            echo @implode("<br/>".PHP_EOL, $arErrors);
            exit();            
        } else SystemComponent::setTestCookie($arCookie);
    }
}

function checkDBConnection(){
    /**
     * Description of TestDbConnector class
     * @author WebLife
     * @copyright 2010
     */
    class TestDbConnector extends SystemComponent {
        const DUMPER_FILENAME = 'dumper.php';
        private $arDBSettings = array();
        private $isConnected  = false;
        private $isSelectDB   = false;
        private $bExistTables = false;
        private $dblink       = false;
        public function __construct(){
            $this->arDBSettings = parent::getDBSettings();
            if(!empty($this->arDBSettings)){
                $this->dblink = @mysql_connect(
                                    $this->arDBSettings['dbhost'],
                                    $this->arDBSettings['dbusername'],
                                    $this->arDBSettings['dbpassword']
                                );
            }
            if($this->dblink){
                $this->isConnected = true;
                $this->isSelectDB  = mysql_select_db($this->arDBSettings['dbname']);
            }
            if($this->isConnected && $this->isSelectDB){
                $query = "SHOW TABLES FROM `{$this->arDBSettings['dbname']}`";
                $result = @mysql_query($query);
                if($result && mysql_num_rows($result)){
                    $this->bExistTables = true;
                    mysql_free_result($result);
                }
            }
            if($this->isConnected) { mysql_close($this->dblink); }
        }
        public function isConnected(){
            return $this->isConnected;
        }
        public function isDBSelected(){
            return $this->isSelectDB;
        }
        public function isTablesExist(){
            return $this->bExistTables;
        }
    }
    
    $testObj = new TestDbConnector;
    if(!$testObj->isConnected())
        return array("<font color='red'>������ ���������� � ����� ������! ��������� ������������ ������ �����, ������������, ������ � ����� ���� ������ � ���������������� �����!</font>");
    if(!$testObj->isDBSelected())
        return array("<font color='red'>������ ������ ���� ������! ��������� ������������ ����� ���� ������ � ���������������� �����!</font>");
    if(strpos($_SERVER['REQUEST_URI'], TestDbConnector::DUMPER_FILENAME)===false && !$testObj->isTablesExist())
        return array("<font color='red'>������! ��������� ������� ������ � ���� ������! �� ������ ������������ ���� ������ ������ �� <a href=\"/".TestDbConnector::DUMPER_FILENAME."\">������</a>.</font>");
    return array();
}

function checkChmod($arrPath){
    $arErrors = array();
    if(sizeof($arrPath)){
        foreach($arrPath as $path => $error){
            if(file_exists($path)){
                if(!SystemComponent::WLCMS_INSTALLED){
                    funcWithAccessLevelMode('chmod', $path, WLCMS_WRITABLE_CHMOD);
                    if($path == "backup"){
                        $dumper_cfg = 'dumper.cfg.php';
                        if(file_exists($path.DS.$dumper_cfg)) {
                            funcWithAccessLevelMode('chmod', $path.DS.$dumper_cfg, WLCMS_WRITABLE_CHMOD);
                            if(!is_writable($path.DS.$dumper_cfg))
                                $arErrors[] = "<font color='red'>������� ���� �� ���� [".$path.DS.$dumper_cfg."]</font>";
                        }
                    } elseif(strpos($path, 'temp') !== false && (strpos($path, 'tpl_c') !== false || strpos($path, 'cache') !== false)){
                        $hndl = opendir($path);
                        while ($file = readdir($hndl)) {
                            if($file!='.' && $file!='..' && $file!='index.html') @unlink($path.DS.$file);
                        } closedir($hndl);
                    } elseif($path == UPLOAD_DIR){
                        changeRecursivelyChmod($path, '', true, WLCMS_WRITABLE_CHMOD, array(
                            'index.html', 'noimage.jpg', 'small_noimage.jpg', 'middle_noimage.jpg',
                            'default.png', 'default.jpg',
                            'nofile.png', 'small_nofile.png', 'middle_nofile.png')
                        );
                    }
                }
                if(!is_writable($path))
                    $arErrors[] = "<font color='red'>���� [$path] - �� �������� �� ������. �������� ���������� ".WLCMS_WRITABLE_CHMOD."</font>";
                
            } else $arErrors[] = "<font color='red'>���� �� ����� [$path] - �� ����������. </font>";            
        }     
    }
    return $arErrors;
}
// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\//////////////////////////////////////////
