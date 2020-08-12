<?php

/**
 * WEBlife CMS
 * Created on 05.01.2011, 12:20:17
 * Developed by http://weblife.ua/
 */
defined('WEBlife') or die('Restricted access'); // no direct access

if(!defined('BASKET_TABLE')){ 
    define('BASKET_TABLE', 'basket'); 
}

/**
 * Description of Basket class
  Description: This class provides methods for add, remove, update and remove all items
  from a basket. The basket works with a session cookie, saving the product ID
  and quantity in an array for simple accesing it.
  There's an example in this category... called "Basket example using basket class"
 * @author WebLife
 * @copyright 2011
 */
class Basket {
    
    const IDKEY_KIT_SEPARATOR = ':';
    const IDKEY_OPTIONS_INDICATOR = '|';
    const IDKEY_OPTIONS_SEPARATOR = '/';
    const IDKEY_VALUES_INDICATOR = '=';
    const IDKEY_VALUES_SEPARATOR = ',';
    const COUPON_SESSION_KEY = 'coupon';
    const COUPON_MIN_LENGTH = 4;
    
    public $kitPrefix         = PRODUCT_KIT_PREFIX;
    public $kitIndicator      = ':';
    public $kitSeparator      = ':';
    public $kitOperator       = ' + ';
    
    public $optionsIndicator  = "|";
    public $optionsSeparator  = "/";
    public $valueSeparator    = "=";
    public $valueIterator     = ",";
    
    private $couponSessionKey = 'coupon';
    
    private $items            = array();
    private $products_count   = 0;
    private $amount           = 0;
    private $price            = 0.0;
    private $customerID       = 0;
    private $orderid          = 0;
    private $basketName       = 'basket';
    private $cookieName       = 'ckBasket';
    private $cookieExpire     = 86400; // One day In seconds
    private $itemsExpire      = 3600; // In seconds (60 min * 60 sec)
    private $bIsEmpty         = true;
    private $bSaveCookie      = true;
    private $bSaveDataBase    = true;
    private $basketItemsName  = 'basket_items';
    private $basketOrderIdName= 'basket_order_id';
    private $basketExpireName = 'basket_items_expire';
    public  $debug            = false;

    /**
     * Basket::__construct()
     *
     * Construct function.
     * @return
     */
    public function __construct($customer_id=0, $save_to_cookie=true, $basket_name='', $cookie_name='') {
        $this->customerID    = intval($customer_id);
        $this->bSaveDataBase = $this->customerID>0 ? true : false;
        $this->bSaveCookie   = $save_to_cookie;

        if(!empty($basketName))
            $this->basketName = $basket_name;
        if(!empty($cookie_name))
            $this->cookieName = $cookie_name;
        
        $this->basketItemsName  = $this->basketName.'_items';
        $this->basketExpireName = $this->basketItemsName.'_expire';

        $this->init();
    }

    /**
     * Basket::__destruct()
     *
     * Destruct function. Set to session basket items.
     * @return
     */
    public function __destruct() {
        if( (time()-$_SESSION[$this->basketExpireName]) > $this->itemsExpire && isset($_SESSION[$this->basketItemsName]) )
            unset($_SESSION[$this->basketItemsName], $_SESSION[$this->basketExpireName]);
        elseif( $this->amount )
            $_SESSION[$this->basketItemsName] = $this->items;
        
        $_SESSION[$this->basketOrderIdName] = $this->orderid;
        
        if($this->debug) {
            echo '<br/>'.$this->basketItemsName.' = ';  @print_r($_SESSION[$this->basketItemsName]);
            echo '<br/>'.$this->basketExpireName.' = '; @print_r($_SESSION[$this->basketExpireName]);
            echo '<br/>'.$this->basketOrderIdName.' = '; @print_r($_SESSION[$this->basketOrderIdName]);
        }
    }

    public function getName() {
        return $this->basketName;
    }

    public function getCookieName() {
        return $this->cookieName;
    }

    public function setCookieExpire($seconds) {
        if(is_int($expire)) $this->cookieExpire = $seconds;
    }

    public function getCookieExpire() {
        return $this->cookieExpire;
    }

    public function setSaveCookie($bool = true) {
        $this->bSaveCookie = $bool;
    }

    public function getSaveCookie() {
        return $this->bSaveCookie;
    }

    public function setItemsExpire($seconds) {
        if(is_int($expire)) $this->itemsExpire = $seconds;
    }

    public function getItemsExpire() {
        return $this->itemsExpire;
    }

    public function setSaveDataBase($customer_id = 0) {
        $this->customerID    = intval($customer_id);
        $this->bSaveDataBase = $this->customerID>0 ? true : false;
        $this->init();
    }

    public function getSaveDataBase() {
        return $this->bSaveDataBase;
    }

    public function isEmptyBasket() {
        return $this->bIsEmpty;
    }

    public function getTotalPrice() {
        return $this->price;
    }

    public function getTotalAmount() {
        return $this->amount;
    }

    public function getProductsCount() {
        return $this->products_count;
    }
    
    public function getItems() {
        return $this->items;
    }

    public function getOrderId() {
        return $this->orderid;
    }

    public function setOrderId($orderid) {
        $this->orderid = intval($orderid);
    }
    
    public function setupKitParams($kitPrefix='Kit') {
        $this->kitPrefix = $kitPrefix;
    }
        /**
     * Basket::get()
     *
     * Returns the basket session as an array of item => qty
     * @return array
     */
    public function get() {
        return isset($_SESSION[$this->basketName]) ? $_SESSION[$this->basketName] : array();
    }

    /**
     * Basket::add()
     *
     * Adds item to basket. If $id already exists in array then qty updated
     * @param mixed $id - ID of item
     * @param integer $qty - Qty of items to be added to cart
     * @return bool
     */
    public function add($id, $qty = 1, $setNewQty=0, $options = array()) {
        if($id == 0) return -1;
        if (isset($_SESSION[$this->basketName][$id]) && !$setNewQty) {
             $_SESSION[$this->basketName][$id] += $qty;
        }
        else {
            $_SESSION[$this->basketName][$id] = $qty;
        }
        $this->setOrderId(0);
        $this->recalc();
        $this->SetCookie();
        $this->SetDB();
    }

    /**
     * Basket::remove()
     *
     * Removes item from basket. If final qty less than 1 then item deleted.
     * @param mixed $id - Id of item
     * @param integer $qty - Qty of items to be removed to cart
     * @see delete()
     * @return bool
     */
    public function remove($id, $qty = 0) {
        if (isset($_SESSION[$this->basketName][$id])) {
            $_SESSION[$this->basketName][$id] = $qty ? $_SESSION[$this->basketName][$id] - $qty : 0;
            
            if ($_SESSION[$this->basketName][$id] <= 0) {
                $this->delete($id);
            }

            $this->recalc();
            $this->SetCookie();
            $this->SetDB();
        }
    }

    /**
     * Basket::updateItem()
     *
     * Updates a basket item with a specific qty
     * @param mixed $id - ID of item
     * @param mixed $qty - Qty of items in basket
     * @return bool
     */
    public function updateItem($id, $qty) {
        $qty = intval($qty);
        if (isset($_SESSION[$this->basketName][$id])) {
        $_SESSION[$this->basketName][$id] = $qty;
        if ($_SESSION[$this->basketName][$id] <= 0)
                $this->delete($id);
            $this->recalc();
            $this->SetCookie();
            $this->SetDB();
            return true;
        } return false;
    }

    /**
     * Basket::update()
     *
     * Updates a basket items
     * @param array $items Contains the array( array($id, $qty), ... )
     * @return bool
     */
    public function update(array $items) {
        if(sizeof($items)>0){
            foreach($items as $id=>$qty){
                if (isset($_SESSION[$this->basketName][$id])) {
                    $_SESSION[$this->basketName][$id] = $qty;
                    if ($_SESSION[$this->basketName][$id] <= 0)
                        $this->delete($id);
                }
            }
            $this->recalc();
            $this->SetCookie();
            $this->SetDB();
            return true;
        } return false;
    }

    /**
     * Basket::dropBasket()
     *
     * Completely removes the basket from session
     */
    public function dropBasket() {
        if(isset($_SESSION[$this->basketName])){
            unset($_SESSION[$this->basketName]);
            $this->recalc();
            $this->SetCookie();
            $this->SetDB();
        }
    }

    /**
     * Basket::isSetKey()
     *
     * Check if key exist in Basket
     * @param mixed $id
     * @param mixed $var_type  - Set if you want to determinate how check BASKET $id variable type
     * @return bool
     */
    public function isSetKey($key, $var_type=false) {
        if (strlen($key)>0 && !empty($_SESSION[$this->basketName])) {
            if($var_type===false) {
                return array_key_exists($key, $_SESSION[$this->basketName]);
            } else {
                foreach ($_SESSION[$this->basketName] as $id=>$qty) {
                    switch($var_type){
                        case 'intval':
                        case 'strval':
                        case 'floatval':
                        case 'doubleval':   if($var_type($id)===$key) return true; break;
                        case 'integer':     if((integer)$id===$key)   return true; break;
                        case 'int':         if((int)$id===$key)       return true; break;
                        case 'string':      if((string)$id===$key)    return true; break;
                        case 'float':       if((float)$id===$key)     return true; break;
                        case 'double':      if((double)$id===$key)    return true; break;
                        case 'boolean':     if((boolean)$id===$key)   return true; break;
                        case 'bool':        if((bool)$id===$key)      return true; break;
                        default:            if($id===$key)            return true; break;
                    }
                }                
            }
        } return false;
    }


    /**
     * Basket::init()
     *
     * Init function. Parses cookie if set and Set to session basket items.
     * @return
     */
    private function init() {
        if (!isset($_SESSION[$this->basketName]) && (isset($_COOKIE[$this->cookieName])))
            $_SESSION[$this->basketName] = unserialize(base64_decode($_COOKIE[$this->cookieName]));

        if (empty($_SESSION[$this->basketName]) && $this->bSaveDataBase)
            $_SESSION[$this->basketName] = $this->getDB();

        if (!isset($_SESSION[$this->basketName]))
            $_SESSION[$this->basketName] = array();

        if (!empty($_SESSION[$this->basketItemsName]))
            $this->items = $_SESSION[$this->basketItemsName];
        
        if (!isset($_SESSION[$this->basketExpireName]))
            $_SESSION[$this->basketExpireName] = time();
        
        $this->setOrderId(isset($_SESSION[$this->basketOrderIdName]) ? $_SESSION[$this->basketOrderIdName] : 0);
        
        $this->recalc();
    }

    /**
     * Basket::recalc()
     *
     * Returns the total amount of items in the basket
     * @return int quantity of items in basket
     */
    private function recalc() {
        $quantity    = 0;
        $products_count = 0;
        $total_price = (float)0;
        $items       = array();
        if (!empty($_SESSION[$this->basketName])) {
            foreach ($_SESSION[$this->basketName] as $id=>$qty) {
                $items[$id] = $this->getItemRow($id);
                
                if($items[$id]===false){
                    unset($items[$id]);
                    $this->delete($id);
                    $this->SetCookie();
                    $this->SetDB();
                    continue;
                }
                
                $price = isset($items[$id]['price']) ? (float)$items[$id]['price'] : 0;
                $items[$id]['price']    = $price;
                $items[$id]['amount']   = $price*$qty;
                $items[$id]['quantity'] = $qty;
                $items[$id]['qty']      = $qty;
                
                $total_price += $items[$id]['amount'];
                $quantity    += $qty;
                
                if(!empty($items[$id]['arKits'])) $products_count += $qty*2; // must be count($items[$id]['arKits']) but...
                else $products_count += $qty;
            }
        }
        $this->items    = $items;
        $this->price    = $total_price*1;
        $this->amount   = $quantity*1;
        $this->products_count   = $products_count*1;
        $this->bIsEmpty = !($this->amount>0);
    }

    /**
     * Basket::delete()
     *
     * Completely removes item from basket
     * @param mixed $id
     * @return bool
     */
    private function delete($id) {
        if(isset($_SESSION[$this->basketName][$id])) {
            unset($_SESSION[$this->basketName][$id]);
        }
    }

    /**
     * Basket::SetCookie()
     *
     * Creates cookie of basket items
     * @return bool
     */
    private function SetCookie() {
        if ($this->bSaveCookie) {
            $basket = @$_SESSION[$this->basketName];
            $string = base64_encode(serialize($basket));
            $expire = time() + ($basket ? $this->cookieExpire : -$this->cookieExpire);
            setcookie($this->cookieName, $string, $expire, '/');
            return true;
        }
        return false;
    }

    /**
     * Basket::getDB()
     *
     * get Variables from DataBase
     * @return array
     */
    private function getDB() {
        global $DB;
        $basket = array();
        if ($this->bSaveDataBase) {
            $DB->Query("SELECT * FROM `".BASKET_TABLE."` WHERE `uid`=".$this->customerID);
            while($item = $DB->fetchAssoc()){
                $basket[$item['code']] = $item['quantity'];
            }
        } return $basket;
    }

    /**
     * Basket::SetDB()
     *
     * Creates DB Rows of basket items
     * @return bool
     */
    private function SetDB() {
        global $DB;
        if ($this->bSaveDataBase) {
            $DB->Query("DELETE FROM `".BASKET_TABLE."` WHERE `uid`=".$this->customerID);
            $DB->Query("OPTIMIZE TABLE `".BASKET_TABLE);
            if(!empty($_SESSION[$this->basketName])){
                foreach($_SESSION[$this->basketName] as $code=>$qty){
                    $arFields = array(
                        'uid'   => $this->customerID,
                        'code'     => $code,
                        'quantity' => $qty
                    );
                    $DB->postToDB($arFields, BASKET_TABLE);
                }
            } return true;
        } return false;
    }

    /**
     * Basket::getItemRow()
     *
     * get Item Row For basket From DB : array
     */
    private function getItemRow ($id) {
        global $DB, $UrlWL;
        $files_url     = UPLOAD_URL_DIR.'catalog/';
        $files_path    = prepareDirPath($files_url);
        $images_params = SystemComponent::prepareImagesParams(getValueFromDB(IMAGES_PARAMS_TABLE, 'aliases', 'WHERE `module`="catalog"'));
        if (strlen($id)>0) {
            $idx  = self::parseIdKey($id, $id);      
            // формирование родительского элемента комплекта
            $query = 'SELECT c.* FROM `'.CATALOG_TABLE.'` c WHERE c.`id`='.$id.' LIMIT 1';
            $DB->Query($query);
            $item = $DB->fetchAssoc();
            if ($item) {
                $item = PHPHelper::getProductItem($item, $UrlWL, $files_url, $images_params);
                $item["options"]         = PHPHelper::getProductOptions($id, $idx[$id]);
                $item["selectedOptions"] = $idx[$id];
                $item['arKits']          = array();
            } return $item;
        } return false;
    }
    
    public function separateIdKey ($idKey) {
        if (strpos($idKey, $this->optionsIndicator)) return explode($this->optionsIndicator, $idKey);
        elseif (strpos($idKey, $this->optionsSeparator) AND strpos($idKey, $this->optionsIndicator)===false) return explode($this->optionsSeparator, $idKey);
        elseif (strpos($idKey, $this->valueSeparator) AND strpos($idKey, $this->optionsSeparator)===false) return explode($this->valueSeparator, $idKey);
        elseif (strpos($idKey, $this->valueIterator) AND strpos($idKey, $this->valueSeparator)===false) return explode($this->valueIterator, $idKey);
    }
    
    public static function generateIdKey ($id, array $options = array(), array $kitIdKeys = array()) {
        $parts = array();
        foreach ($options as $optionID => $values) {
            is_array($values) or $values = array($values);
            $parts[] = $optionID.self::IDKEY_VALUES_INDICATOR.implode(self::IDKEY_VALUES_SEPARATOR, $values);
        }
        $idKey = $id;
        if($parts) $idKey .= self::IDKEY_OPTIONS_INDICATOR.implode(self::IDKEY_OPTIONS_SEPARATOR, $parts);
        $idKeys = array($idKey);
        foreach($kitIdKeys as $idKey){
            $idKeys[] = $idKey;
        }
        return implode(self::IDKEY_KIT_SEPARATOR, $idKeys);
    }
    
    public static function parseIdKey ($idKey, & $id = null) {
        if(strpos($idKey, self::IDKEY_KIT_SEPARATOR)!==FALSE) {
            $idKeys = explode(self::IDKEY_KIT_SEPARATOR, $idKey);
        } else {
            $idKeys = array($idKey);
        }
        $arr = array();
        foreach ($idKeys as $idKey) {
            if (strpos($idKey, self::IDKEY_OPTIONS_INDICATOR)!==FALSE) {
                list($itemID, $options) = explode(self::IDKEY_OPTIONS_INDICATOR, $idKey);
                $itemID = intval($itemID);
                $arr[$itemID] = array();
                foreach (explode(self::IDKEY_OPTIONS_SEPARATOR, $options) as $option) {
                    if (strpos($option, self::IDKEY_VALUES_INDICATOR)!==FALSE) {
                        list($optionID, $values) = explode(self::IDKEY_VALUES_INDICATOR, $option);
                        if (strpos($values, self::IDKEY_VALUES_SEPARATOR)) {
                            $values = explode(self::IDKEY_VALUES_SEPARATOR, $values);
                        }
                        $arr[$itemID][intval($optionID)] = $values;
                    }
                }
            } else {
                $arr[intval($idKey)] = array();
            }
        }
        if($id!==null){
            $arr2 = $arr ? array_keys($arr) : array();
            $id  = $arr ? reset($arr2) : 0;
        }
        return $arr;
    }
    
    public function setCoupon ($coupon) {
        $res = '';
        if ($coupon && strlen($coupon)>3) {
            $check = getValueFromDB(COUPONS_TABLE, 'coupon', 'WHERE `active`=1 AND `coupon`="'.$coupon.'"');
            if ($check) {
                $_SESSION[$this->couponSessionKey] = $coupon; 
                $res = 'validate';
            } else { 
                unset($_SESSION[$this->couponSessionKey]); 
                $res = 'error';
            }
            $this->recalc();
            $this->SetCookie();
        } else {
            unset($_SESSION[$this->couponSessionKey]);
            $res = 'deleted';
        }
        return $res;
    }
       
    public function issetCoupon(){ 
        if (isset($_SESSION[$this->couponSessionKey]) AND !empty($_SESSION[$this->couponSessionKey])) return true;
        else return false;
    }
    
    public function getCoupon() {
        if ($this->issetCoupon()) {
            return $_SESSION[$this->couponSessionKey];
        } else return false;
    }

}

class Checkout {
    
    const COURIER_KIEV_SHIPPING_ID = 4;
    const COURIER_SHIPPING_ID      = 1;
    const SELF_SHIPPING_ID         = 3;
    const NP_SHIPPING_ID           = 2;
    const CASH_PAYMENT_ID          = 1;
    const LP_PAYMENT_ID            = 3;
    const P24_PAYMENT_ID           = 4;
    // Nova poshta API params
    const NP_API_URL               = "https://api.novaposhta.ua/v2.0/xml/";
    const NP_API_KEY               = "f062bc6a40c2b014512a5030ae2a0e09";

    public function __construct () {
    }
    
    public static function getInstance(){
        return new Checkout();
    }

    public static function getPaymentTypes () {
        $items = array();
        $query  = "SELECT * FROM `".PAYMENT_TYPES_TABLE."` WHERE `active`=1";
        $result = mysql_query($query);
        if ($result and mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) $items[] = $row;
        } return $items;
    }
    
    public static function getShippingTypes () {
        $items = array();
        $query  = "SELECT * FROM `".SHIPPING_TYPES_TABLE."` WHERE `active`=1 ORDER BY `order`";
        $result = mysql_query($query);
        if ($result and mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) $items[] = $row;
        } return $items;
    }
    /**
     * @example Checkout::np_getCities()
     * @param string $raw
     * @return array
     */
    public function np_getCities ($raw) {
        $items = array();
        if (!empty($raw)) {
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                    <file>
                        <apiKey>".self::NP_API_KEY."</apiKey>
                        <modelName>Address</modelName>
                        <calledMethod>getCities</calledMethod>
                        <methodProperties>
                            <FindByString>{$raw}</FindByString>
                        </methodProperties>
                    </file>";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, self::NP_API_URL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, PHPHelper::dataConv($xml));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            if (!@curl_errno($ch)) {
                $objXML = simplexml_load_string($response);
                if (is_object($objXML)) {
                    $arrXML = (array)$objXML;
                    if ($arrXML["success"]) {
                        foreach ($arrXML["data"]->item as $item) {
                            $items[] = array(
                                "id"   => PHPHelper::dataConv($item->DescriptionRu, "utf-8", "windows-1251"),
                                "ref"  => $item->Ref,
                                "name" => PHPHelper::dataConv($item->DescriptionRu, "utf-8", "windows-1251"),
                                "text" => PHPHelper::dataConv($item->DescriptionRu, "utf-8", "windows-1251")
                            );
                        }
                    }
                    //saveLogDebugFile($arrXML, "temp/cities.log");
                }
            } else exit (curl_error($ch));
        } 
        return $items;
    }
    /**
     * @example Checkout::np_getWareHouses()
     * @param string $ref
     * @return array
     */
    public function np_getWareHouses ($name = "") {
        $items = array();
        if (!empty($ref) or !empty($name)) {
            $xml    = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"
                    . "<file>"
                    . "<apiKey>".self::NP_API_KEY."</apiKey>"
                    . "<modelName>Address</modelName>"
                    . "<calledMethod>getWarehouses</calledMethod>"
                    . "<methodProperties>"
                    . (!empty($name) ? "<CityName>{$name}</CityName>" : "")
                    . "</methodProperties>"
                    . "</file>";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, self::NP_API_URL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, PHPHelper::dataConv($xml));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            if (!@curl_errno($ch)) {
                $objXML = simplexml_load_string($response);
                if (is_object($objXML)) {
                    $arrXML = (array)$objXML;
                    if ($arrXML["success"]) {
                        foreach ($arrXML["data"]->item as $item) {
                            $items[] = array(
                                "city_ref" => $item->CityRef,
                                "ref"  => $item->Ref,
                                "name" => PHPHelper::dataConv($item->DescriptionRu, "utf-8", "windows-1251"),
                                "text" => PHPHelper::dataConv($item->DescriptionRu, "utf-8", "windows-1251")
                            );
                        }
                    }
                    //saveLogDebugFile($arrXML, "temp/warehouses.log");
                }
            } else exit (curl_error($ch));
        } 
        return $items;
    }
    /**
     * 
     * @param type $orderid
     */
    public static function saveOrderID ($orderid) {
        $_SESSION['purchased_order_id'] = $orderid;
    }
    /**
     * 
     * @param type $delete
     * @return int
     */
    public static function getOrderID ($delete = true) {
        $orderid= 0;
        if(isset($_SESSION['purchased_order_id']))
            $orderid = intval($_SESSION['purchased_order_id']);
        if($delete)
            unset($_SESSION['purchased_order_id']);
        return $orderid;
    }
    /**
     * @example Checkout::addOrder()
     * @param ExternalDbConnector $DB
     * @param array $item
     */
    public static function addOrderToDB (DbConnector $DB, array $item) {
        return $DB->postToDB($item, ORDERS_TABLE, "", array("id"), "insert");
    }
}

/**
 * Liqpay Payment Module
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category        LiqPay
 * @package         liqpay/liqpay
 * @version         3.0
 * @author          Liqpay
 * @copyright       Copyright (c) 2014 Liqpay
 * @license         http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * EXTENSION INFORMATION
 *
 * LIQPAY API       https://www.liqpay.com/ru/doc
 * Payment method   liqpay process
 *
 * @author          Liqpay <support@liqpay.com>
 */
class LiqPay {

    private $_public_key;
    private $_private_key;
    private $_api_url      = 'https://www.liqpay.ua/api/';
    private $_checkout_url = 'https://www.liqpay.ua/api/checkout';
    protected $_supportedCurrencies = array('EUR', 'UAH', 'USD');
    /**
     * Constructor.
     *
     * @param string $public_key
     * @param string $private_key
     * 
     * @throws InvalidArgumentException
     */
    public function __construct($public_key, $private_key) {
        if (empty($public_key)) {
            throw new InvalidArgumentException('public_key is empty');
        }
        if (empty($private_key)) {
            throw new InvalidArgumentException('private_key is empty');
        }
        $this->_public_key = $public_key;
        $this->_private_key = $private_key;
    }
    /**
     * Call API
     *
     * @param string $url
     * @param array $params
     *
     * @return string
     */
    public function api($path, $params = array()) {
        if (!isset($params['version'])) {
            throw new InvalidArgumentException('version is null');
        }
        $url = $this->_api_url . $path;
        $public_key = $this->_public_key;
        $private_key = $this->_private_key;
        $data = base64_encode(json_encode(array_merge(compact('public_key'), $params)));
        $signature = base64_encode(sha1($private_key . $data . $private_key, 1));
        $postfields = http_build_query(array(
            'data' => $data,
            'signature' => $signature
        ));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return json_decode($server_output);
    }
    /**
     * cnb_form
     * @param array $params
     * @return string
     * @throws InvalidArgumentException
     */
    public function cnb_form($params) {
        $language = 'ru';
        if (isset($params['language']) && $params['language'] == 'en') {
            $language = 'en';
        }
        $private_key = $this->_private_key;
        $params = $this->cnb_params($params);
        $data = base64_encode(json_encode($params));
        $signature = $this->cnb_signature($params);
        return sprintf('
            <form method="POST" action="%s" accept-charset="utf-8" id="liqPayForm" style="display:none;">
                %s
                %s
                <input type="image" src="//static.liqpay.com/buttons/p1ru.radius.png" name="btn_text" />
            </form>', $this->_checkout_url, sprintf('<input type="hidden" name="%s" value="%s" />', 'data', $data), sprintf('<input type="hidden" name="%s" value="%s" />', 'signature', $signature), $language
        );
    }
    /**
     * cnb_signature
     *
     * @param array $params
     *
     * @return string
     */
    public function cnb_signature($params) {
        $params = $this->cnb_params($params);
        $private_key = $this->_private_key;
        $json = base64_encode(json_encode($params));
        $signature = $this->str_to_sign($private_key . $json . $private_key);
        return $signature;
    }
    /**
     * cnb_params
     *
     * @param array $params
     *
     * @return array $params
     */
    private function cnb_params($params) {
        $params['public_key'] = $this->_public_key;
        if (!isset($params['version'])) {
            throw new InvalidArgumentException('version is null');
        }
        if (!isset($params['amount'])) {
            throw new InvalidArgumentException('amount is null');
        }
        if (!isset($params['currency'])) {
            throw new InvalidArgumentException('currency is null');
        }
        if (!in_array($params['currency'], $this->_supportedCurrencies)) {
            throw new InvalidArgumentException('currency is not supported');
        }
        if ($params['currency'] == 'RUR') {
            $params['currency'] = 'RUB';
        }
        if (!isset($params['description'])) {
            throw new InvalidArgumentException('description is null');
        }
        return $params;
    }
    /**
     * str_to_sign
     *
     * @param string $str
     *
     * @return string
     */
    public function str_to_sign($str) {
        $signature = base64_encode(sha1($str, 1));
        return $signature;
    }
}


/*
DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `uid` int(11) unsigned NOT NULL,
  `code` tinytext NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL DEFAULT '0',
 KEY `idx_uid` (`uid`)
) ENGINE=MyISAM;
 */