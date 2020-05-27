<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace NovaPoshta\City;
/**
 * Description of City
 *
 * @author oleksandr
 */
abstract class City  {
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $ref;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $category;
    
    abstract public function __clone();
    /**
     * 
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    /**
     * 
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }
    /**
     * 
     * @return string
     */
    public function getRef() {
        return $this->title;
    }
    /**
     * 
     * @param string $ref
     */
    public function setRef($ref) {
        $this->ref = $ref;
    }
    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    /**
     * 
     * @param string $id
     */
    public function setId($id) {
        $this->id = $id;
    }
}

class Capital extends NovaPoshta\City\City {
    /**
     *
     * @var string 
     */
    protected $category = "capital";
    
    public function __clone() {
    }
}

class Megapolis extends NovaPoshta\City\City {
    /**
     *
     * @var string 
     */
    protected $category = "megapolis";
    
    public function __clone() {
    }
}

class Town extends NovaPoshta\City\City {
    /**
     *
     * @var string 
     */
    protected $category = "town";
    
    public function __clone() {
    }
}

class Willage extends NovaPoshta\City\City {
    /**
     *
     * @var string 
     */
    protected $category = "willage";
    
    public function __clone() {
    }
}