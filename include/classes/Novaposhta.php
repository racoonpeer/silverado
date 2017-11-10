<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Novaposhta
 *
 * @author user5
 */
class Novaposhta {
    // put your code here
    const NP_API_URL         = "https://api.novaposhta.ua/v2.0/xml/";
    const NP_API_KEY         = "f062bc6a40c2b014512a5030ae2a0e09";
    const NP_CITY_TABLE      = "np_city";
    const NP_WAREHOUSE_TABLE = "np_warehouse";

    protected $DB; // Database connector
    protected $items = array(); // Items array
    /**
     *
     * @param string $db_name
     * @param string $db_host
     * @param string $db_user
     * @param string $db_password
     * @param string $db_charset
     */
    public function __construct ($db_name, $db_host = "localhost", $db_user = "root", $db_password = "", $db_charset="utf8") {
        $dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $db_charset"
        );
        try {
            $this->DB = new PDO($dsn, $db_user, $db_password, $opt);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }
    /**
     * Get cities from API server
     * Required params
     * @param string apiKey
     * @param string modelName Address
     * @param string calledMethod getCities
     */
    public function np_getCities() {
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                <file>
                    <apiKey>".self::NP_API_KEY."</apiKey>
                    <modelName>Address</modelName>
                    <calledMethod>getCities</calledMethod>
                </file>";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::NP_API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
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
                        $this->items[] = array(
                            "city_id"       => $item->CityID,
                            "ref"           => $item->Ref,
                            "title_ua"      => PHPHelper::dataConv($item->Description, "UTF-8", WLCMS_SYSTEM_ENCODING),
                            "title_ru"      => PHPHelper::dataConv($item->DescriptionRu, "UTF-8", WLCMS_SYSTEM_ENCODING),
                            "area"          => $item->Area,
                            "settlement_ua" => PHPHelper::dataConv($item->SettlementTypeDescription, "UTF-8", WLCMS_SYSTEM_ENCODING),
                            "settlement_ru" => PHPHelper::dataConv($item->SettlementTypeDescriptionRu, "UTF-8", WLCMS_SYSTEM_ENCODING)
                        );
                    }
                }
//                saveLogDebugFile($arrXML, "temp/cities.log");
            }
        } else exit (curl_error($ch));
    }
    /**
     * Get warehouses from API server
     * Required params
     * @param string apiKey
     * @param string modelName Address
     * @param string calledMethod getWarehouses
     */
    public function np_getWarehouses() {
        $xml    = "<?xml version=\"1.0\" encoding=\"utf-8\"?>"
                    . "<file>"
                    . "<apiKey>".self::NP_API_KEY."</apiKey>"
                    . "<modelName>Address</modelName>"
                    . "<calledMethod>getWarehouses</calledMethod>"
                    . "</file>";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::NP_API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
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
                        $this->items[] = array(
                            "ref"           => $item->Ref,
                            "type"          => $item->TypeOfWarehouse,
                            "number"        => $item->Number,
                            "title_ua"      => PHPHelper::dataConv($item->Description, "UTF-8", WLCMS_SYSTEM_ENCODING),
                            "title_ru"      => PHPHelper::dataConv($item->DescriptionRu, "UTF-8", WLCMS_SYSTEM_ENCODING),
                            "city_ref"      => $item->CityRef,
                            "city_title_ua" => PHPHelper::dataConv($item->CityDescription, "UTF-8", WLCMS_SYSTEM_ENCODING),
                            "city_title_ru" => PHPHelper::dataConv($item->CityDescriptionRu, "UTF-8", WLCMS_SYSTEM_ENCODING)
                        );
                    }
                }
//                saveLogDebugFile($arrXML, "temp/warehouses.log");
            }
        } else exit (curl_error($ch));
    }
    /*
     * Save items to database
     * @param string $table
     */
    public function saveItems($table) {
        if (empty($this->items)) return false;
        foreach ($this->items as $item) {
            $columns = array_keys($item);
            if (!in_array("ref", $columns) or empty($item["ref"])) continue;
            // Проверяем, есть ли уже такая запись в базе
            $query  = $this->DB->query("SELECT `id` FROM `{$table}` WHERE `ref`='{$item["ref"]}'");
            $exists = $query->rowCount();
            if ($exists) $exists = $query->fetch();
            // Если не найдено - создаем новую запись
            $sq  = ($exists ? "UPDATE `{$table}` SET " : "INSERT INTO `{$table}` (").PHP_EOL;
            $sq1 = $sq2 = array();
            foreach ($columns as $key) {
                if ($exists) $sq1[] = "`{$key}`=:{$key}";
                else {
                    $sq1[] = "`{$key}`";
                    $sq2[] = ":{$key}";
                }
            }
            $sq .= (!$exists ? implode(", ", $sq1).") VALUES (".implode(", ", $sq2).")" : implode(", ", $sq1)." WHERE `ref`='{$item["ref"]}'");
            $query = $this->DB->prepare($sq);
            foreach ($columns as $key) {
                $query->bindParam(":{$key}", $item[$key]);
            }
            $query->execute();
        }
    }

    public function getItems() {
        return $this->items;
    }

    public function flush() {
        $this->items = array();
        flush();
    }
}

