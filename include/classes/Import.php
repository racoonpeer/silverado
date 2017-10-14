<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import
 *
 * @author yyyaaazzz
 */
class Import {
    //put your code here
    protected $DB;
    protected $UrlWL;
    protected $PHPExcel;
    protected $ExcelData   = array();
    protected $Columns     = array();
    protected $Modules     = array();
    protected $Config      = array();
    protected $SkipColumns = array(0,1,2,3,4,5,6,7,8,9,10,11,12,16,17);
    /**
     * 
     * @param DbConnector $DB
     * @param UrlWL $UrlWL
     * @param array $arrModules
     */
    public function __construct(DbConnector $DB, UrlWL $UrlWL, $arrModules) {
        $this->DB      = $DB;
        $this->UrlWL   = $UrlWL;
        $this->Modules = $arrModules;
    }

    public function Read () {
        $this->PHPExcel = PHPExcel_IOFactory::load($_FILES["filename"]["tmp_name"]);
        $this->PHPExcel->setActiveSheetIndex(0);
        $sheet = $this->PHPExcel->getActiveSheet();
        $cellcnt = 0;
        foreach ($sheet->getRowIterator() as $key=>$row) {
            if ($key==1) {
                foreach($row->getCellIterator() as $cell) {
                    $cell = !empty($cell) ? trim(PHPHelper::dataConv($cell, 'utf-8', 'windows-1251', true)) : '';
                    $this->Columns[] = $cell;
                    $cellcnt++;
                }
            }  else {
                $this->ExcelData[$key] = array();
                for ($i = 0; $i < $cellcnt; $i++) {
                    $cellData = $sheet->getCellByColumnAndRow($i, $key)->getValue();
                    $cell = !empty($cellData) ? PHPHelper::dataConv(trim($cellData), 'utf-8', 'windows-1251', true) : "";
                    $this->ExcelData[$key][] = $cell;
                }
            }
        }
        $sheet->disconnectCells();
        $this->PHPExcel->disconnectWorksheets();
    }
    
    public function Write () {
        if (!empty($this->ExcelData)) {
            foreach ($this->ExcelData as $row) {
                if (empty($row[0])) continue; // skip if empty row
                // detect category
                $cid = $this->getCid($row);
                // detect brand & create if not exists
                $bid = $this->addBrand($row);
                // detect collection & create if not empty
                $colid = $this->addCollection($row);
                // update or insert product data
                // insert new product if not exists
                $this->addProductData($row, $cid, $bid, $colid);
            }
        }
    }
    /**
     * 
     * @param array $row
     * @return int
     */
    private function getCid ($row) {
        $cid = !empty($row[4]) ? getValueFromDB(MAIN_TABLE, "id", "WHERE `module`='catalog' AND `title`='$row[4]' AND `pid`!={$this->Modules["catalog"]["id"]}") : 0;
        if (empty($cid)) {
            $cid = !empty($row[3]) ? getValueFromDB(MAIN_TABLE, "id", "WHERE `module`='catalog' AND `title`='$row[3]' AND `pid`={$this->Modules["catalog"]["id"]}") : 0;
        }
        return $cid;
    }
    /**
     * 
     * @param array $row
     * @return int
     */
    private function addBrand ($row) {
        $bid = !empty($row[12]) ? (int)getValueFromDB(BRANDS_TABLE, "id", "WHERE `title`='$row[12]'") : 0;
        $exists = (bool)getValueFromDB(BRANDS_TABLE, "COUNT(*)", "WHERE `id`='$bid'", "cnt");
        if (!empty($row[12]) AND !$exists) {
            $record = array(
                "title"     => $row[12],
                "country"   => $row[13],
                "seo_path"  => getUniqueSeoPathFromDB($this->UrlWL->strToUrl($row[12]), microtime(), BRANDS_TABLE),
                "order"     => getMaxPosition(0, "order", false, BRANDS_TABLE),
                "active"    => 1,
                "created"   => date("Y-m-d H:i:s")
            );
            $result = $this->DB->postToDB($record, BRANDS_TABLE);
            if ($result AND is_int($result)) {
                $bid = (int)$result;
            }
        }
        return $bid;
    }
    /**
     * 
     * @param array $row
     * @return int
     */
    private function addCollection ($row) {
        $colid = !empty($row[16]) ? (int)getValueFromDB(COLLECTIONS_TABLE, "id", "WHERE `title`='$row[16]'") : 0;
        $exists = (bool)getValueFromDB(COLLECTIONS_TABLE, "COUNT(*)", "WHERE `id`='$colid'", "cnt");
        if (!empty($row[16]) AND !$exists) {
            $record = array(
                "title"     => $row[16],
                "seo_path"  => getUniqueSeoPathFromDB($this->UrlWL->strToUrl($row[16]), microtime(), COLLECTIONS_TABLE),
                "order"     => getMaxPosition(0, "order", false, COLLECTIONS_TABLE),
                "active"    => 1,
                "created"   => date("Y-m-d H:i:s")
            );
            $result = $this->DB->postToDB($record, COLLECTIONS_TABLE);
            if ($result AND is_int($result)) {
                $colid = (int)$result;
            }
        }
        return $colid;
    }
    /**
     * 
     * @param array $row
     * @param int $cid
     * @param int $bid
     * @param int $colid
     */
    private function addProductData ($row, $cid = 0, $bid = 0, $colid = 0) {
        $itemID = !empty($row[5]) ? (int)getValueFromDB(CATALOG_TABLE, "id", "WHERE `title`='$row[5]'") : 0;
        $exists = (bool)getValueFromDB(CATALOG_TABLE, "COUNT(*)", "WHERE `id`='$itemID'", "cnt");
        if (!empty($row[5]) AND !$exists) {
            $this->addProduct($row, $cid, $bid, $colid);
        } else {
            $this->updateProduct($row, $itemID, $cid, $bid, $colid);
        }
    }
    /**
     * 
     * @param array $row
     * @param int $cid
     * @param int $bid
     * @param int $colid
     */
    private function addProduct ($row, $cid, $bid, $colid) {
        $record = array(
            "cid"           => $cid,
            "bid"           => $bid,
            "collection_id" => $colid,
            "pcode"         => $row[0],
            "title"         => $row[5],
            "currency_price"=> $row[8],
            "currency"      => getValueFromDB(CURRENCY_TABLE, "id", "WHERE `code`='{$row[9]}'"),
            "available"     => (int)$row[6],
            "presence"      => $row[7],
            "active"        => 1,
            "created"       => date("Y-m-d H:i:s"),
            "seo_path"      => getUniqueSeoPathFromDB($this->UrlWL->strToUrl($row[5]), microtime(), CATALOG_TABLE),
            "order"         => getMaxPosition(0, "order", false, CATALOG_TABLE)
        );
        if (!empty($record["currency_price"]) AND !empty($record["currency"])) {
            $record["price"] = ($record["currency_price"] * getValueFromDB(CURRENCY_TABLE, "rate", "WHERE `id`={$record["currency"]}"));
        }
        $result = $this->DB->postToDB($record, CATALOG_TABLE);
        if ($result AND is_int($result)) {
            $itemID = (int)$result;
            // fill product attributes
            $this->addAttributesData($row, $itemID);
        }
    }
    /**
     * 
     * @param array $row
     * @param int $itemID
     * @param int $cid
     * @param int $bid
     * @param int $colid
     */
    private function updateProduct ($row, $itemID, $cid, $bid, $colid) {
        $record = array(
            "cid"           => $cid,
            "bid"           => $bid,
            "collection_id" => $colid,
            "pcode"         => $row[0],
            "title"         => $row[5],
            "currency_price"=> $row[8],
            "currency"      => getValueFromDB(CURRENCY_TABLE, "id", "WHERE `code`='{$row[9]}'"),
            "available"     => (int)$row[6],
            "presence"      => $row[7],
        );
        if (!empty($record["currency_price"]) AND !empty($record["currency"])) {
            $record["price"] = ($record["currency_price"] * getValueFromDB(CURRENCY_TABLE, "rate", "WHERE `id`={$record["currency"]}"));
        }
        $result = $this->DB->postToDB($record, CATALOG_TABLE, "WHERE `id`={$itemID}", array("id", "title", "seo_path", "created", "active", "descr", "fulldescr", "image"), "update");
        if ($result) {
            // fill product attributes
            $this->addAttributesData($row, $itemID);
        }
    }
    /**
     * 
     * @param array $row
     * @param int $itemID
     */
    private function addAttributesData ($row, $itemID) {
        deleteRecords(PRODUCT_ATTRIBUTE_TABLE, "WHERE `pid`={$itemID}");
        if (!empty($this->Columns)) {
            foreach ($this->Columns as $i=>$column) {
                if (in_array($i, $this->SkipColumns)) continue; // skip non-attribute columns
                $exists = getItemRow(ATTRIBUTES_TABLE, "*", "WHERE `title`='$column'", "cnt");
                if (!empty($exists)) {
                    $record = array(
                        "aid"   => $exists["id"],
                        "pid"   => $itemID,
                        "value" => $row[$i],
                        "alias" => PHPHelper::makeAttributeAlias($row[$i]),
                        "created" => date("Y-m-d H:i:s")
                    );
                    if (!empty($record["value"]) AND !empty($record["alias"])) {
                        $arVal = explode(",", $row[$i]);
                        if (!empty($arVal) AND is_array($arVal) AND count($arVal) > 0) {
                            foreach ($arVal as $val) {
                                $val   = trim($val);
                                if (empty($val)) continue;
                                $exVal = (bool)getValueFromDB(ATTRIBUTES_VALUES_TABLE, "id", "WHERE `aid`={$exists["id"]} AND `title`='{$val}'");
                                if (!$exVal) {
                                    $arPost = array(
                                        "aid"   => $exists["id"],
                                        "title" => $val,
                                        "order" => getMaxPosition($exists["id"], "order", "aid", ATTRIBUTES_VALUES_TABLE)
                                    );
                                    $this->DB->postToDB($arPost, ATTRIBUTES_VALUES_TABLE);
                                    unset($arPost);
                                }
                                $exVal = getItemRow(ATTRIBUTES_VALUES_TABLE, "*", "WHERE `aid`={$exists["id"]} AND `title`='{$val}'");
                                if (!empty($exVal)) {
                                    $arPost = array(
                                        "aid"   => $exVal["aid"],
                                        "pid"   => $itemID,
                                        "value" => $exVal["title"],
                                        "alias" => PHPHelper::makeAttributeAlias($exVal["title"]),
                                        "created" => date("Y-m-d H:i:s")
                                    );
                                    $this->DB->postToDB($arPost, PRODUCT_ATTRIBUTE_TABLE);
                                    unset($arPost);
                                }
                            }
                        } else {
                            $exVal = getItemRow(ATTRIBUTES_VALUES_TABLE, "*", "WHERE `aid`={$exists["id"]} AND `title`='{$row[$i]}'");
                            if (empty($exVal)) {
                                $arPost = array(
                                    "aid"   => $exists["id"],
                                    "title" => $row[$i],
                                    "order" => getMaxPosition($exists["id"], "order", "aid", ATTRIBUTES_VALUES_TABLE)
                                );
                                $this->DB->postToDB($arPost, ATTRIBUTES_VALUES_TABLE);
                                unset($arPost);
                            }
                            $exVal = getItemRow(ATTRIBUTES_VALUES_TABLE, "*", "WHERE `aid`={$exists["id"]} AND `title`='{$row[$i]}'");
                            if (empty($exVal)) {
                                $arPost = array(
                                    "aid"   => $exVal["aid"],
                                    "pid"   => $itemID,
                                    "value" => $exVal["title"],
                                    "alias" => PHPHelper::makeAttributeAlias($exVal["title"]),
                                    "created" => date("Y-m-d H:i:s")
                                );
                                $this->DB->postToDB($arPost, PRODUCT_ATTRIBUTE_TABLE);
                                unset($arPost);
                            }
                        }
                    }
                }
            }
        }
    }
}
